<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use GuzzleHttp\Promise\Coroutine;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\PromisorInterface;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;

abstract class MultipartDownloader implements PromisorInterface
{
    use MultipartDownloaderTrait;
    public const GET_OBJECT_COMMAND = "GetObject";
    public const PART_GET_MULTIPART_DOWNLOADER = "partGet";
    public const RANGE_GET_MULTIPART_DOWNLOADER = "rangeGet";

    /**
     * @param S3ClientInterface $s3Client
     * @param array $requestArgs
     * @param array $config
     * - minimumPartSize: The minimum part size for a multipart download
     *   using range get. This option MUST be set when using range get.
     * @param int $currentPartNo
     * @param int $objectPartsCount
     * @param int $objectCompletedPartsCount
     * @param int $objectSizeInBytes
     * @param int $objectBytesTransferred
     * @param string $eTag
     * @param string $objectKey
     * @param MultipartDownloadListener|null $listener
     * @param TransferListener|null $progressListener
     * @param StreamInterface|null $stream
     */
    public function __construct(
        protected readonly S3ClientInterface $s3Client,
        protected array $requestArgs,
        protected readonly array $config = [],
        protected int $currentPartNo = 0,
        protected int $objectPartsCount = 0,
        protected int $objectCompletedPartsCount = 0,
        protected int $objectSizeInBytes = 0,
        protected int $objectBytesTransferred = 0,
        protected string $eTag = "",
        protected string $objectKey = "",
        private readonly ?MultipartDownloadListener $listener = null,
        private readonly ?TransferListener $progressListener = null,
        private ?StreamInterface $stream = null
    ) {
        if ($stream === null) {
            $this->stream = Utils::streamFor(
                fopen('php://temp', 'w+')
            );
        }
    }

    /**
     * @return int
     */
    public function getCurrentPartNo(): int
    {
        return $this->currentPartNo;
    }

    /**
     * @return int
     */
    public function getObjectPartsCount(): int
    {
        return $this->objectPartsCount;
    }

    /**
     * @return int
     */
    public function getObjectCompletedPartsCount(): int
    {
        return $this->objectCompletedPartsCount;
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
     * @return string
     */
    public function getObjectKey(): string
    {
        return $this->objectKey;
    }

    /**
     * Returns that resolves a multipart download operation,
     * or to a rejection in case of any failures.
     *
     * @return PromiseInterface
     */
    public function promise(): PromiseInterface
    {
        return Coroutine::of(function () {
            $this->downloadInitiated($this->requestArgs, $this->currentPartNo);
            $initialCommand = $this->nextCommand();
            $this->partDownloadInitiated($initialCommand, $this->currentPartNo);
            try {
                yield $this->s3Client->executeAsync($initialCommand)
                    ->then(function (ResultInterface $result) {
                        // Calculate object size and parts count.
                        $this->computeObjectDimensions($result);
                        // Trigger first part completed
                        $this->partDownloadCompleted($result, $this->currentPartNo);
                    })->otherwise(function ($reason) use ($initialCommand) {
                        $this->partDownloadFailed($initialCommand, $reason, $this->currentPartNo);

                        throw $reason;
                    });
            } catch (\Throwable $e) {
                $this->downloadFailed($e, $this->objectCompletedPartsCount, $this->objectBytesTransferred, $this->currentPartNo);
                // TODO: yield transfer exception modeled with a transfer failed response.
                yield Create::rejectionFor($e);
            }

            while ($this->currentPartNo < $this->objectPartsCount) {
                $nextCommand = $this->nextCommand();
                $this->partDownloadInitiated($nextCommand, $this->currentPartNo);
                try {
                    yield $this->s3Client->executeAsync($nextCommand)
                        ->then(function ($result) {
                            $this->partDownloadCompleted($result, $this->currentPartNo);

                            return $result;
                        })->otherwise(function ($reason) use ($nextCommand) {
                            $this->partDownloadFailed($nextCommand, $reason, $this->currentPartNo);

                            return $reason;
                        });
                } catch (\Throwable $e) {
                    $this->downloadFailed($e, $this->objectCompletedPartsCount, $this->objectBytesTransferred, $this->currentPartNo);
                    // TODO: yield transfer exception modeled with a transfer failed response.
                    yield Create::rejectionFor($e);
                }

                $lastPartIncrement = $this->currentPartNo;
            }

            // Transfer completed
            $this->objectDownloadCompleted();

            // TODO: yield the stream wrapped in a modeled transfer success response.
            yield Create::promiseFor($this->stream);
        });
    }

    /**
     * Returns the next command for fetching the next object part.
     *
     * @return CommandInterface
     */
    abstract protected function nextCommand() : CommandInterface;

    /**
     * Compute the object dimensions, such as size and parts count.
     *
     * @param ResultInterface $result
     *
     * @return void
     */
    abstract protected function computeObjectDimensions(ResultInterface $result): void;

    /**
     * Calculates the object size dynamically.
     *
     * @param $sizeSource
     *
     * @return int
     */
    protected function computeObjectSize($sizeSource): int {
        if (is_int($sizeSource)) {
            return (int) $sizeSource;
        }

        if (empty($sizeSource)) {
            throw new \RuntimeException('Range must not be empty');
        }

        // For extracting the object size from the ContentRange header value.
        if (preg_match("/\/(\d+)$/", $sizeSource, $matches)) {
            return $matches[1];
        }

        throw new \RuntimeException('Invalid source size format');
    }

    /**
     * MultipartDownloader factory method to return an instance
     * of MultipartDownloader based on the multipart download type.
     *
     * @param S3ClientInterface $s3Client
     * @param string $multipartDownloadType
     * @param array $requestArgs
     * @param array $config
     * @param int $currentPartNo
     * @param int $objectPartsCount
     * @param int $objectCompletedPartsCount
     * @param int $objectSizeInBytes
     * @param int $objectBytesTransferred
     * @param string $eTag
     * @param string $objectKey
     * @param MultipartDownloadListener|null $listener
     * @param TransferListener|null $progressTracker
     *
     * @return MultipartDownloader
     */
    public static function chooseDownloader(
        S3ClientInterface $s3Client,
        string $multipartDownloadType,
        array $requestArgs,
        array $config,
        int $currentPartNo = 0,
        int $objectPartsCount = 0,
        int $objectCompletedPartsCount = 0,
        int $objectSizeInBytes = 0,
        int $objectBytesTransferred = 0,
        string $eTag = "",
        string $objectKey = "",
        ?MultipartDownloadListener $listener = null,
        ?TransferListener $progressTracker = null
    ) : MultipartDownloader
    {
        return match ($multipartDownloadType) {
            self::PART_GET_MULTIPART_DOWNLOADER => new GetMultipartDownloader(
                s3Client: $s3Client,
                requestArgs: $requestArgs,
                config: $config,
                currentPartNo: $currentPartNo,
                objectPartsCount: $objectPartsCount,
                objectCompletedPartsCount: $objectCompletedPartsCount,
                objectSizeInBytes: $objectSizeInBytes,
                objectBytesTransferred: $objectBytesTransferred,
                eTag: $eTag,
                objectKey: $objectKey,
                listener: $listener,
                progressListener: $progressTracker
            ),
            self::RANGE_GET_MULTIPART_DOWNLOADER => new RangeMultipartDownloader(
                s3Client: $s3Client,
                requestArgs: $requestArgs,
                config: $config,
                currentPartNo: 0,
                objectPartsCount: 0,
                objectCompletedPartsCount: 0,
                objectSizeInBytes: 0,
                objectBytesTransferred: 0,
                eTag: "",
                objectKey: "",
                listener: $listener,
                progressListener: $progressTracker
            ),
            default => throw new \RuntimeException(
                "Unsupported download type $multipartDownloadType."
                ."It should be either " . self::PART_GET_MULTIPART_DOWNLOADER .
                " or " . self::RANGE_GET_MULTIPART_DOWNLOADER . ".")
        };
    }
}