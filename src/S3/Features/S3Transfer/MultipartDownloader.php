<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\CommandInterface;
use Aws\Result;
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

    /** @var S3ClientInterface */
    protected S3ClientInterface $s3Client;

    /** @var array */
    protected array $requestArgs;

    /** @var array */
    protected array $config;

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

    /** @var ?MultipartDownloadListener */
    protected ?MultipartDownloadListener $listener;

    /** @var ?TransferListener */
    protected ?TransferListener $progressListener;

    /** @var StreamInterface */
    private StreamInterface $stream;

    /** @var string */
    protected string $eTag;

    /** @var string */
    protected string $objectKey;

    /**
     * @param S3ClientInterface $s3Client
     * @param array $requestArgs
     * @param array $config
     * - targetPartSizeBytes: The minimum part size for a multipart download
     *   using range get.
     * @param int $currentPartNo
     * @param ?MultipartDownloadListener $listener
     * @param ?TransferListener $transferListener
     */
    public function __construct(
        S3ClientInterface $s3Client,
        array $requestArgs,
        array $config,
        int $currentPartNo = 0,
        ?MultipartDownloadListener $listener = null,
        ?TransferListener $progressListener = null
    ) {
        $this->clear();
        $this->s3Client = $s3Client;
        $this->requestArgs = $requestArgs;
        $this->config = $config;
        $this->currentPartNo = $currentPartNo;
        $this->listener = $listener;
        $this->progressListener = $progressListener;
        $this->stream = Utils::streamFor(
            fopen('php://temp', 'w+')
        );
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
            yield Create::promiseFor($this->stream);
        });
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
    ): void {
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
    private function partDownloadInitiated(CommandInterface $partDownloadCommand, int $partNo): void {
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
    private function partDownloadCompleted(ResultInterface $result, int $partNo): void {
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
    ): void {
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
    private function _notifyMultipartDownloadListeners(string $listenerMethod, array $args): void
    {
        $this->listener?->{$listenerMethod}(...$args);
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
        if (gettype($sizeSource) === "integer") {
            return (int) $sizeSource;
        }

        if (empty($sizeSource)) {
            throw new \RuntimeException('Range must not be empty');
        }

        if (preg_match("/\/(\d+)$/", $sizeSource, $matches)) {
            return $matches[1];
        }

        throw new \RuntimeException('Invalid range format');
    }
    
    private function clear(): void {
        $this->currentPartNo = 0;
        $this->objectPartsCount = 0;
        $this->objectCompletedPartsCount = 0;
        $this->objectSizeInBytes = 0;
        $this->objectBytesTransferred = 0;
        $this->eTag = "";
        $this->objectKey = "";
    }

    /**
     * MultipartDownloader factory method to return an instance
     * of MultipartDownloader based on the multipart download type.
     *
     * @param S3ClientInterface $s3Client
     * @param string $multipartDownloadType
     * @param array $requestArgs
     * @param array $config
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
        ?MultipartDownloadListener $listener = null,
        ?TransferListener $progressTracker = null
    ) : MultipartDownloader
    {
        if ($multipartDownloadType === self::PART_GET_MULTIPART_DOWNLOADER) {
            return new GetMultipartDownloader(
                $s3Client,
                $requestArgs,
                $config,
                0,
                $listener,
                $progressTracker
            );
        } elseif ($multipartDownloadType === self::RANGE_GET_MULTIPART_DOWNLOADER) {
            return new RangeMultipartDownloader(
                $s3Client,
                $requestArgs,
                $config,
                0,
                $listener,
                $progressTracker
            );
        }

        throw new \RuntimeException("Unsupported download type $multipartDownloadType");
    }
}