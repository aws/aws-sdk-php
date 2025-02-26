<?php
namespace Aws\S3\S3Transfer;

use Aws\CommandInterface;
use Aws\CommandPool;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use GuzzleHttp\Promise\Coroutine;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\PromisorInterface;
use GuzzleHttp\Psr7\LazyOpenStream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use Throwable;

/**
 * Multipart uploader implementation.
 */
class MultipartUploader implements PromisorInterface
{
    const PART_MIN_SIZE = 5242880;
    const PART_MAX_SIZE = 5368709120;
    public const PART_MAX_NUM = 10000;

    /** @var S3ClientInterface */
    private readonly S3ClientInterface $s3Client;

    /** @var array */
    private readonly array $createMultipartArgs;

    /** @var array */
    private readonly array $config;

    /** @var string | null */
    private string | null $uploadId;

    /** @var array */
    private array $parts;

    /** @var StreamInterface */
    private StreamInterface $body;

    /** @var int */
    private int $calculatedObjectSize;

    /** @var array */
    private array $deferFns = [];

    /** @var TransferListenerNotifier | null */
    private ?TransferListenerNotifier $listenerNotifier;

    /** Tracking Members */
    /** @var TransferProgressSnapshot|null */
    private ?TransferProgressSnapshot $currentSnapshot;

    /**
     * @param S3ClientInterface $s3Client
     * @param array $createMultipartArgs
     * @param array $config
     * @param string | StreamInterface $source
     * @param string|null $uploadId
     * @param array $parts
     * @param TransferProgressSnapshot|null $currentSnapshot
     * @param TransferListenerNotifier|null $listenerNotifier
     */
    public function __construct(
        S3ClientInterface $s3Client,
        array $createMultipartArgs,
        array $config,
        string | StreamInterface $source,
        ?string $uploadId = null,
        array $parts = [],
        ?TransferProgressSnapshot $currentSnapshot = null,
        ?TransferListenerNotifier $listenerNotifier = null,
    ) {
        $this->s3Client = $s3Client;
        $this->createMultipartArgs = $createMultipartArgs;
        $this->config = $config;
        $this->body = $this->parseBody($source);
        $this->uploadId = $uploadId;
        $this->parts = $parts;
        $this->currentSnapshot = $currentSnapshot;
        $this->listenerNotifier = $listenerNotifier;
    }

    /**
     * @return string|null
     */
    public function getUploadId(): ?string
    {
        return $this->uploadId;
    }

    /**
     * @return array
     */
    public function getParts(): array
    {
        return $this->parts;
    }

    /**
     * @return int
     */
    public function getCalculatedObjectSize(): int
    {
        return $this->calculatedObjectSize;
    }

    /**
     * @return TransferProgressSnapshot|null
     */
    public function getCurrentSnapshot(): ?TransferProgressSnapshot
    {
        return $this->currentSnapshot;
    }

    /**
     * @return PromiseInterface
     */
    public function promise(): PromiseInterface
    {
        return Coroutine::of(function () {
            try {
                yield $this->createMultipartUpload();
                yield $this->uploadParts();
                $result = yield $this->completeMultipartUpload();
                yield Create::promiseFor(
                    new UploadResponse($result->toArray())
                );
            } catch (Throwable $e) {
                $this->uploadFailed($e);
                yield Create::rejectionFor($e);
            } finally {
                $this->callDeferredFns();
            }
        });
    }

    /**
     * @return PromiseInterface
     */
    public function createMultipartUpload(): PromiseInterface
    {
        $requestArgs = [...$this->createMultipartArgs];
        $this->uploadInitiated($requestArgs);
        $command = $this->s3Client->getCommand(
            'CreateMultipartUpload',
            $requestArgs
        );

        return $this->s3Client->executeAsync($command)
            ->then(function (ResultInterface $result) {
                $this->uploadId = $result['UploadId'];

                return $result;
            });
    }

    /**
     * @return PromiseInterface
     */
    public function uploadParts(): PromiseInterface
    {
        $this->calculatedObjectSize = 0;
        $isSeekable = $this->body->isSeekable();
        $partSize = $this->config['part_size'] ?? self::PART_MIN_SIZE;
        if ($partSize > self::PART_MAX_SIZE) {
            return Create::rejectionFor(
                "The part size should not exceed " . self::PART_MAX_SIZE . " bytes."
            );
        }

        $commands = [];
        for ($partNo = 1;
             $isSeekable
                 ? $this->body->tell() < $this->body->getSize()
                 : !$this->body->eof();
             $partNo++
        ) {
            if ($isSeekable) {
                $readSize = min($partSize, $this->body->getSize() - $this->body->tell());
            } else {
                $readSize = $partSize;
            }

            $partBody  = Utils::streamFor(
                $this->body->read($readSize)
            );
            // To make sure we do not create an empty part when
            // we already reached the end of file.
            if (!$isSeekable && $this->body->eof() && $partBody->getSize() === 0) {
                break;
            }

            $uploadPartCommandArgs = [
                ...$this->createMultipartArgs,
                'UploadId' => $this->uploadId,
                'PartNumber' => $partNo,
                'Body' => $partBody,
                'ContentLength' => $partBody->getSize(),
            ];
            // To get `requestArgs` when notifying the bytesTransfer listeners.
            $uploadPartCommandArgs['requestArgs'] = $uploadPartCommandArgs;
            $command = $this->s3Client->getCommand('UploadPart', $uploadPartCommandArgs);
            $commands[] = $command;
            $this->calculatedObjectSize += $partBody->getSize();
            if ($partNo > self::PART_MAX_NUM) {
                return Create::rejectionFor(
                    "The max number of parts has been exceeded. " .
                    "Max = " . self::PART_MAX_NUM
                );
            }
        }

        return (new CommandPool(
            $this->s3Client,
            $commands,
            [
                'concurrency' => $this->config['concurrency'],
                'fulfilled'   => function (ResultInterface $result, $index)
                    use ($commands) {
                        $command = $commands[$index];
                        $this->collectPart(
                            $result,
                            $command
                        );
                        // Part Upload Completed Event
                        $this->partUploadCompleted(
                            $command['ContentLength'],
                            $command['requestArgs']
                        );
                },
                'rejected'     => function (Throwable $e) {
                    $this->partUploadFailed($e);
                }
            ]
        ))->promise();
    }

    /**
     * @return PromiseInterface
     */
    public function completeMultipartUpload(): PromiseInterface
    {
        $this->sortParts();
        $completeMultipartUploadArgs = [
            ...$this->createMultipartArgs,
            'UploadId' => $this->uploadId,
            'MpuObjectSize' => $this->calculatedObjectSize,
            'MultipartUpload' => [
                'Parts' => $this->parts,
            ]
        ];
        if ($this->containsChecksum($this->createMultipartArgs)) {
            $completeMultipartUploadArgs['ChecksumType'] = 'FULL_OBJECT';
        }

        $command = $this->s3Client->getCommand(
            'CompleteMultipartUpload',
            $completeMultipartUploadArgs
        );

        return $this->s3Client->executeAsync($command)
            ->then(function (ResultInterface $result) {
                $this->uploadCompleted($result);

                return $result;
            });
    }

    /**
     * @return PromiseInterface
     */
    public function abortMultipartUpload(): PromiseInterface
    {
        $command = $this->s3Client->getCommand('AbortMultipartUpload', [
            ...$this->createMultipartArgs,
            'UploadId' => $this->uploadId,
        ]);

        return $this->s3Client->executeAsync($command);
    }

    /**
     * @param ResultInterface $result
     * @param CommandInterface $command
     *
     * @return void
     */
    private function collectPart(
        ResultInterface $result,
        CommandInterface $command,
    ): void
    {
        $checksumResult = $command->getName() === 'UploadPart'
            ? $result
            : $result[$command->getName() . 'Result'];
        $partData =  [
            'PartNumber' => $command['PartNumber'],
            'ETag' => $result['ETag'],
        ];
        if (isset($command['ChecksumAlgorithm'])) {
            $checksumMemberName = 'Checksum' . strtoupper($command['ChecksumAlgorithm']);
            $partData[$checksumMemberName] = $checksumResult[$checksumMemberName] ?? null;
        }

        $this->parts[] = $partData;
    }

    /**
     * @return void
     */
    private function sortParts(): void
    {
        usort($this->parts, function($partOne, $partTwo) {
            return $partOne['PartNumber'] <=> $partTwo['PartNumber'];
        });
    }

    /**
     * @param string|StreamInterface $source
     *
     * @return StreamInterface
     */
    private function parseBody(string | StreamInterface $source): StreamInterface
    {
        if (is_string($source)) {
            // Make sure the files exists
            if (!is_readable($source)) {
                throw new \InvalidArgumentException(
                    "The source for this upload must be either a readable file or a valid stream."
                );
            }
            $body = new LazyOpenStream($source, 'r');
            // To make sure the resource is closed.
            $this->deferFns[] = function () use ($body) {
                $body->close();
            };
        } elseif ($source instanceof StreamInterface) {
            $body = $source;
        } else {
            throw new \InvalidArgumentException(
                "The source must be a string or a StreamInterface."
            );
        }

        return $body;
    }

    /**
     * @param array $requestArgs
     *
     * @return void
     */
    private function uploadInitiated(array $requestArgs): void
    {
        if ($this->currentSnapshot === null) {
            $this->currentSnapshot = new TransferProgressSnapshot(
                $requestArgs['Key'],
                0,
                $this->body->getSize(),
            );
        } else {
            $this->currentSnapshot = new TransferProgressSnapshot(
                $this->currentSnapshot->getIdentifier(),
                $this->currentSnapshot->getTransferredBytes(),
                $this->currentSnapshot->getTotalBytes(),
                $this->currentSnapshot->getResponse()
            );
        }

        $this->listenerNotifier?->transferInitiated([
            'request_args' => $requestArgs,
            'progress_snapshot' => $this->currentSnapshot
        ]);
    }

    /**
     * @param Throwable $reason
     *
     * @return void
     */
    private function uploadFailed(Throwable $reason): void {
        if (!empty($this->uploadId)) {
            $this->abortMultipartUpload()->wait();
        }
        $this->listenerNotifier?->transferFail([
            'request_args' => $this->createMultipartArgs,
            'progress_snapshot' => $this->currentSnapshot,
            'reason' => $reason,
        ]);
    }

    /**
     * @param ResultInterface $result
     *
     * @return void
     */
    private function uploadCompleted(ResultInterface $result): void {
        $newSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes(),
            $this->currentSnapshot->getTotalBytes(),
            $result->toArray()
        );
        $this->currentSnapshot = $newSnapshot;
        $this->listenerNotifier?->transferComplete([
            'request_args' => $this->createMultipartArgs,
            'progress_snapshot' => $this->currentSnapshot,
        ]);
    }

    /**
     * @param int $partCompletedBytes
     * @param array $requestArgs
     *
     * @return void
     */
    private function partUploadCompleted(
        int $partCompletedBytes,
        array $requestArgs
    ): void
    {
        $newSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes() + $partCompletedBytes,
            $this->currentSnapshot->getTotalBytes()
        );
        $this->currentSnapshot = $newSnapshot;
        $this->listenerNotifier?->bytesTransferred([
            'request_args' => $requestArgs,
            'progress_snapshot' => $this->currentSnapshot,
            $this->currentSnapshot
        ]);
    }

    /**
     * @param Throwable $reason
     *
     * @return void
     */
    private function partUploadFailed(Throwable $reason): void
    {
        $this->uploadFailed($reason);
    }

    /**
     * @return void
     */
    private function callDeferredFns(): void
    {
        foreach ($this->deferFns as $fn) {
            $fn();
        }

        $this->deferFns = [];
    }

    /**
     * Verifies if a checksum was provided.
     *
     * @param array $requestArgs
     *
     * @return bool
     */
    private function containsChecksum(array $requestArgs): bool
    {
        static $algorithms = [
            'ChecksumCRC32',
            'ChecksumCRC32C',
            'ChecksumCRC64NVME',
            'ChecksumSHA1',
            'ChecksumSHA256',
        ];
        foreach ($algorithms as $algorithm) {
            if (isset($requestArgs[$algorithm])) {
                return true;
            }
        }

        return false;
    }
}
