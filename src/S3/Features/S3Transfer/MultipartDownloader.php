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
    public const GET_OBJECT_COMMAND = "GetObject";
    public const PART_GET_MULTIPART_DOWNLOADER = "partGet";
    public const RANGE_GET_MULTIPART_DOWNLOADER = "rangeGet";

    /** @var array */
    protected array $requestArgs;

    /** @var int */
    protected int $currentPartNo;

    /** @var int */
    protected int $objectPartsCount;

    /** @var int */
    protected int $objectCompletedPartsCount;

    /** @var int */
    protected int $objectSizeInBytes;

    /** @var int */
    protected int $objectBytesTransferred;

    /** @var string */
    protected string $eTag;

    /** @var  string */
    protected string $objectKey;

    /** @var StreamInterface */
    private StreamInterface $stream;

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
        array $requestArgs,
        protected readonly array $config = [],
        int $currentPartNo = 0,
        int $objectPartsCount = 0,
        int $objectCompletedPartsCount = 0,
        int $objectSizeInBytes = 0,
        int $objectBytesTransferred = 0,
        string $eTag = "",
        string $objectKey = "",
        private readonly ?MultipartDownloadListener $listener = null,
        private readonly ?TransferListener $progressListener = null,
        ?StreamInterface $stream = null
    ) {
        $this->requestArgs = $requestArgs;
        $this->currentPartNo = $currentPartNo;
        $this->objectPartsCount = $objectPartsCount;
        $this->objectCompletedPartsCount = $objectCompletedPartsCount;
        $this->objectSizeInBytes = $objectSizeInBytes;
        $this->objectBytesTransferred = $objectBytesTransferred;
        $this->eTag = $eTag;
        $this->objectKey = $objectKey;
        if ($stream === null) {
            $this->stream = Utils::streamFor(
                fopen('php://temp', 'w+')
            );
        } else {
            $this->stream = $stream;
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

            }

            // Transfer completed
            $this->objectDownloadCompleted();

            // TODO: yield the stream wrapped in a modeled transfer success response.
            yield Create::promiseFor(new DownloadResponse(
                $this->stream,
                []
            ));
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
    protected function computeObjectSize($sizeSource): int
    {
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
            self::PART_GET_MULTIPART_DOWNLOADER => new PartGetMultipartDownloader(
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
            self::RANGE_GET_MULTIPART_DOWNLOADER => new RangeGetMultipartDownloader(
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

    /**
     * Main purpose of this method is to propagate
     * the download-initiated event to listeners, but
     * also it does some computation regarding internal states
     * that need to be maintained.
     *
     * @param array $commandArgs
     * @param int|null $currentPartNo
     *
     * @return void
     */
    private function downloadInitiated(array &$commandArgs, ?int $currentPartNo): void
    {
        $this->objectKey = $commandArgs['Key'];
        $this->progressListener?->objectTransferInitiated(
            $this->objectKey,
            $commandArgs
        );
        $this->_notifyMultipartDownloadListeners('downloadInitiated', [
            &$commandArgs,
            $currentPartNo
        ]);
    }

    /**
     * Propagates download-failed event to listeners.
     * It may also do some computation in order to maintain internal states.
     *
     * @param \Throwable $reason
     * @param int $totalPartsTransferred
     * @param int $totalBytesTransferred
     * @param int $lastPartTransferred
     *
     * @return void
     */
    private function downloadFailed(
        \Throwable $reason,
        int $totalPartsTransferred,
        int $totalBytesTransferred,
        int $lastPartTransferred
    ): void
    {
        $this->progressListener?->objectTransferFailed(
            $this->objectKey,
            $totalBytesTransferred,
            $reason
        );
        $this->_notifyMultipartDownloadListeners('downloadFailed', [
            $reason,
            $totalPartsTransferred,
            $totalBytesTransferred,
            $lastPartTransferred
        ]);
    }

    /**
     * Propagates part-download-initiated event to listeners.
     *
     * @param CommandInterface $partDownloadCommand
     * @param int $partNo
     *
     * @return void
     */
    private function partDownloadInitiated(
        CommandInterface $partDownloadCommand,
        int $partNo
    ): void
    {
        $this->_notifyMultipartDownloadListeners('partDownloadInitiated', [
            $partDownloadCommand,
            $partNo
        ]);
    }

    /**
     * Propagates part-download-completed to listeners.
     * It also does some computation in order to maintain internal states.
     * In this specific method we move each part content into an accumulative
     * stream, which is meant to hold the full object content once the download
     * is completed.
     *
     * @param ResultInterface $result
     * @param int $partNo
     *
     * @return void
     */
    private function partDownloadCompleted(
        ResultInterface $result,
        int $partNo
    ): void
    {
        $this->objectCompletedPartsCount++;
        $partDownloadBytes = $result['ContentLength'];
        $this->objectBytesTransferred = $this->objectBytesTransferred + $partDownloadBytes;
        if (isset($result['ETag'])) {
            $this->eTag = $result['ETag'];
        }
        Utils::copyToStream($result['Body'], $this->stream);

        $this->progressListener?->objectTransferProgress(
            $this->objectKey,
            $partDownloadBytes,
            $this->objectSizeInBytes
        );

        $this->_notifyMultipartDownloadListeners('partDownloadCompleted', [
            $result,
            $partNo,
            $partDownloadBytes,
            $this->objectCompletedPartsCount,
            $this->objectBytesTransferred,
            $this->objectSizeInBytes
        ]);
    }

    /**
     * Propagates part-download-failed event to listeners.
     *
     * @param CommandInterface $partDownloadCommand
     * @param \Throwable $reason
     * @param int $partNo
     *
     * @return void
     */
    private function partDownloadFailed(
        CommandInterface $partDownloadCommand,
        \Throwable $reason,
        int $partNo
    ): void
    {
        $this->progressListener?->objectTransferFailed(
            $this->objectKey,
            $this->objectBytesTransferred,
            $reason
        );
        $this->_notifyMultipartDownloadListeners(
            'partDownloadFailed',
            [$partDownloadCommand, $reason, $partNo]);
    }

    /**
     * Propagates object-download-completed event to listeners.
     * It also resets the pointer of the stream to the first position,
     * so that the stream is ready to be consumed once returned.
     *
     * @return void
     */
    private function objectDownloadCompleted(): void
    {
        $this->stream->rewind();
        $this->progressListener?->objectTransferCompleted(
            $this->objectKey,
            $this->objectBytesTransferred
        );
        $this->_notifyMultipartDownloadListeners('downloadCompleted', [
            $this->stream,
            $this->objectCompletedPartsCount,
            $this->objectBytesTransferred
        ]);
    }

    /**
     * Internal helper method for notifying listeners of specific events.
     *
     * @param string $listenerMethod
     * @param array $args
     *
     * @return void
     */
    private function _notifyMultipartDownloadListeners(
        string $listenerMethod,
        array $args
    ): void
    {
        $this->listener?->{$listenerMethod}(...$args);
    }
}