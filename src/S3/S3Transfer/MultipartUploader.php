<?php
namespace Aws\S3\S3Transfer;

use Aws\CommandInterface;
use Aws\CommandPool;
use Aws\HashingStream;
use Aws\PhpHash;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Models\UploadResponse;
use Aws\S3\S3Transfer\Progress\TransferListener;
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
    public const PART_MIN_SIZE = 5 * 1024 * 1024; // 5 MBs
    public const PART_MAX_SIZE = 5 * 1024 * 1024 * 1024; // 5 GBs
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
     * - part_size: (int, optional)
     * - concurrency: (int, required)
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
        $this->validateConfig($config);
        $this->config = $config;
        $this->body = $this->parseBody($source);
        $this->uploadId = $uploadId;
        $this->parts = $parts;
        $this->currentSnapshot = $currentSnapshot;
        $this->listenerNotifier = $listenerNotifier;
    }

    /**
     * @param array $config
     *
     * @return void
     */
    private function validateConfig(array &$config): void
    {
        if (isset($config['part_size'])) {
            if ($config['part_size'] < self::PART_MIN_SIZE
                || $config['part_size'] > self::PART_MAX_SIZE) {
                throw new \InvalidArgumentException(
                    "The config `part_size` value must be between "
                    . self::PART_MIN_SIZE . " and " . self::PART_MAX_SIZE
                    . " but ${config['part_size']} given."
                );
            }
        } else {
            $config['part_size'] = self::PART_MIN_SIZE;
        }
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
     * @return UploadResponse
     */
    public function upload(): UploadResponse {
        return $this->promise()->wait();
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
    private function createMultipartUpload(): PromiseInterface
    {
        $requestArgs = [...$this->createMultipartArgs];
        $checksum = $this->filterChecksum($requestArgs);
        // Customer provided checksum
        if ($checksum !== null) {
            $requestArgs['ChecksumType'] = 'FULL_OBJECT';
            $requestArgs['ChecksumAlgorithm'] = str_replace('Checksum', '', $checksum);
            $requestArgs['@context']['request_checksum_calculation'] = 'when_required';
            unset($requestArgs[$checksum]);
        }

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
    private function uploadParts(): PromiseInterface
    {
        $this->calculatedObjectSize = 0;
        $partSize = $this->config['part_size'];
        $commands = [];
        $partNo = count($this->parts);
        $baseUploadPartCommandArgs = [
            ...$this->createMultipartArgs,
            'UploadId' => $this->uploadId,
        ];
        // Customer provided checksum
        $checksum = $this->filterChecksum($this->createMultipartArgs);
        if ($checksum !== null) {
            unset($baseUploadPartCommandArgs['ChecksumAlgorithm']);
            unset($baseUploadPartCommandArgs[$checksum]);
            $baseUploadPartCommandArgs['@context']['request_checksum_calculation'] = 'when_required';
        }

        while (!$this->body->eof()) {
            $partNo++;
            $read = $this->body->read($partSize);
            // To make sure we do not create an empty part when
            // we already reached the end of file.
            if (empty($read) && $this->body->eof()) {
                break;
            }

            $partBody  = Utils::streamFor(
                $read
            );
            $uploadPartCommandArgs = [
                ...$baseUploadPartCommandArgs,
                'PartNumber' => $partNo,
                'ContentLength' => $partBody->getSize(),
            ];

            // To get `requestArgs` when notifying the bytesTransfer listeners.
            $uploadPartCommandArgs['requestArgs'] = [...$uploadPartCommandArgs];
            // Attach body
            $uploadPartCommandArgs['Body'] = $this->decorateWithHashes(
                $partBody,
                $uploadPartCommandArgs
            );
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

                    throw $e;
                }
            ]
        ))->promise();
    }

    /**
     * @return PromiseInterface
     */
    private function completeMultipartUpload(): PromiseInterface
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
        $checksum = $this->filterChecksum($completeMultipartUploadArgs);
        // Customer provided checksum
        if ($checksum !== null) {
            $completeMultipartUploadArgs['ChecksumAlgorithm'] = str_replace('Checksum', '', $checksum);
            $completeMultipartUploadArgs['ChecksumType'] = 'FULL_OBJECT';
            $completeMultipartUploadArgs['@context']['request_checksum_calculation'] = 'when_required';
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
    private function abortMultipartUpload(): PromiseInterface
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
                    "The source for this upload must be either a readable file path or a valid stream."
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
                "The source must be a valid string file path or a StreamInterface."
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
                $this->currentSnapshot->getResponse(),
                $this->currentSnapshot->getReason(),
            );
        }

        $this->listenerNotifier?->transferInitiated([
            TransferListener::REQUEST_ARGS_KEY => $requestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot
        ]);
    }

    /**
     * @param Throwable $reason
     *
     * @return void
     */
    private function uploadFailed(Throwable $reason): void {
        // Event has been already propagated
        if ($this->currentSnapshot->getReason() !== null) {
            return;
        }

        $this->currentSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes(),
            $this->currentSnapshot->getTotalBytes(),
            $this->currentSnapshot->getResponse(),
            $reason
        );

        if (!empty($this->uploadId)) {
            $this->abortMultipartUpload()->wait();
        }
        $this->listenerNotifier?->transferFail([
            TransferListener::REQUEST_ARGS_KEY => $this->createMultipartArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
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
            $result->toArray(),
            $this->currentSnapshot->getReason(),
        );
        $this->currentSnapshot = $newSnapshot;
        $this->listenerNotifier?->transferComplete([
            TransferListener::REQUEST_ARGS_KEY => $this->createMultipartArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
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
            $this->currentSnapshot->getTotalBytes(),
            $this->currentSnapshot->getResponse(),
            $this->currentSnapshot->getReason(),
        );
        $this->currentSnapshot = $newSnapshot;
        $this->listenerNotifier?->bytesTransferred([
            TransferListener::REQUEST_ARGS_KEY => $requestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
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
     * Filters a provided checksum if one was provided.
     *
     * @param array $requestArgs
     *
     * @return string | null
     */
    private function filterChecksum(array $requestArgs):? string
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
                return $algorithm;
            }
        }

        return null;
    }

    /**
     * @param StreamInterface $stream
     * @param array $data
     *
     * @return StreamInterface
     */
    private function decorateWithHashes(StreamInterface $stream, array &$data): StreamInterface
    {
        // Decorate source with a hashing stream
        $hash = new PhpHash('sha256');
        return new HashingStream($stream, $hash, function ($result) use (&$data) {
            $data['ContentSHA256'] = bin2hex($result);
        });
    }
}
