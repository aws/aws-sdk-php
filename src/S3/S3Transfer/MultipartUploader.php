<?php
namespace Aws\S3\S3Transfer;

use Aws\CommandInterface;
use Aws\CommandPool;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use GuzzleHttp\Promise\Coroutine;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\PromisorInterface;
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
    private readonly array $uploadPartArgs;

    /** @var array */
    private readonly array $completeMultipartArgs;

    /** @var array */
    private readonly array $config;

    /** @var string | null */
    private string | null $uploadId;

    /** @var array */
    private array $parts;

    /** @var StreamInterface */
    private StreamInterface $body;

    /** @var int */
    private int $objectSizeInBytes;

    /** @var array */
    private array $deferFns = [];

    /** @var TransferListener | null */
    private TransferListener | null $progressTracker;

    /** Tracking Members */
    /** @var string */
    private string $objectKey;

    /** @var int */
    private int $objectBytesTransferred = 0;

    /**
     * @param S3ClientInterface $s3Client
     * @param array $createMultipartArgs
     * @param array $uploadPartArgs
     * @param array $completeMultipartArgs
     * @param array $config
     * @param string | StreamInterface $source
     * @param int $objectSizeInBytes
     * @param string|null $uploadId
     * @param array $parts
     * @param TransferListener|null $progressTracker
     */
    public function __construct(
        S3ClientInterface $s3Client,
        array $createMultipartArgs,
        array $uploadPartArgs,
        array $completeMultipartArgs,
        array $config,
        string | StreamInterface $source,
        int $objectSizeInBytes = 0,
        ?string $uploadId = null,
        array $parts = [],
        ?TransferListener $progressTracker = null
    ) {
        $this->s3Client = $s3Client;
        $this->createMultipartArgs = $createMultipartArgs;
        $this->uploadPartArgs = $uploadPartArgs;
        $this->completeMultipartArgs = $completeMultipartArgs;
        $this->config = $config;
        $this->body = $this->parseBody($source);
        $this->objectSizeInBytes = $objectSizeInBytes;
        $this->uploadId = $uploadId;
        $this->parts = $parts;
        $this->progressTracker = $progressTracker;
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
    public function getObjectSizeInBytes(): int
    {
        return $this->objectSizeInBytes;
    }

    /**
     * @return int
     */
    public function getObjectBytesTransferred(): int
    {
        return $this->objectBytesTransferred;
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
                throw $e;
            } finally {
                $this->callDeferredFns();
            }
        });
    }

    /**
     * @return PromiseInterface
     */
    public function createMultipartUpload(): PromiseInterface {
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
        $this->objectSizeInBytes = 0; // To repopulate
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
            // we already reached end of file.
            if (!$isSeekable && $this->body->eof() && $partBody->getSize() === 0) {
                break;
            }

            $uploadPartCommandArgs = [
                    'UploadId' => $this->uploadId,
                    'PartNumber' => $partNo,
                    'Body' => $partBody,
                    'ContentLength' => $partBody->getSize(),
                ] + $this->uploadPartArgs;

            $command = $this->s3Client->getCommand('UploadPart', $uploadPartCommandArgs);
            $commands[] = $command;
            $this->objectSizeInBytes += $partBody->getSize();

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
                        $this->partUploadCompleted($result, $command['ContentLength']);
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
        $command = $this->s3Client->getCommand('CompleteMultipartUpload', [
                'UploadId' => $this->uploadId,
                'MpuObjectSize' => $this->objectSizeInBytes,
                'MultipartUpload' => [
                    'Parts' => $this->parts,
                ]
            ] + $this->completeMultipartArgs
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
    public function abortMultipartUpload(): PromiseInterface {
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
            return $partOne['PartNumber'] <=> $partTwo['PartNumber']; // Ascending order by age
        });
    }

    /**
     * @param string|StreamInterface $source
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
            $file = Utils::tryFopen($source, 'r');
            // To make sure the resource is closed.
            $this->deferFns[] = function () use ($file) {
                fclose($file);
            };
            $body = Utils::streamFor($file);
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
     * @return void
     */
    private function uploadInitiated(array &$requestArgs): void {
        $this->objectKey = $this->createMultipartArgs['Key'];
        $this->progressTracker?->objectTransferInitiated(
            $this->objectKey,
            $requestArgs
        );
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
        $this->progressTracker?->objectTransferFailed(
            $this->objectKey,
            $this->objectBytesTransferred,
            $reason
        );
    }

    /**
     * @param ResultInterface $result
     *
     * @return void
     */
    private function uploadCompleted(ResultInterface $result): void {
        $this->progressTracker?->objectTransferCompleted(
            $this->objectKey,
            $this->objectBytesTransferred,
        );
    }

    /**
     * @param ResultInterface $result
     * @param int $partSize
     *
     * @return void
     */
    private function partUploadCompleted(ResultInterface $result, int $partSize): void {
        $this->objectBytesTransferred = $this->objectBytesTransferred + $partSize;
        $this->progressTracker?->objectTransferProgress(
            $this->objectKey,
            $partSize,
            $this->objectSizeInBytes
        );
    }

    /**
     * @param Throwable $reason
     *
     * @return void
     */
    private function partUploadFailed(Throwable $reason): void
    {
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
}
