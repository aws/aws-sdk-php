<?php

namespace Aws\S3\S3Transfer;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Models\DownloadResponse;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
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
    private const OBJECT_SIZE_REGEX = "/\/(\d+)$/";
    
    /** @var array */
    protected array $requestArgs;

    /** @var int */
    protected int $currentPartNo;

    /** @var int */
    protected int $objectPartsCount;

    /** @var int */
    protected int $objectSizeInBytes;

    /** @var string */
    protected string $eTag;

    /** @var StreamInterface */
    private StreamInterface $stream;

    /** @var TransferListenerNotifier | null */
    private readonly ?TransferListenerNotifier $listenerNotifier;

    /** Tracking Members */
    private ?TransferProgressSnapshot $currentSnapshot;

    /**
     * @param S3ClientInterface $s3Client
     * @param array $requestArgs
     * @param array $config
     * - minimum_part_size: The minimum part size for a multipart download
     *   using range get. This option MUST be set when using range get.
     * @param int $currentPartNo
     * @param int $objectPartsCount
     * @param int $objectSizeInBytes
     * @param string $eTag
     * @param StreamInterface|null $stream
     * @param TransferProgressSnapshot|null $currentSnapshot
     * @param TransferListenerNotifier|null $listenerNotifier
     */
    public function __construct(
        protected readonly S3ClientInterface $s3Client,
        array $requestArgs,
        protected readonly array $config = [],
        int $currentPartNo = 0,
        int $objectPartsCount = 0,
        int $objectSizeInBytes = 0,
        string $eTag = "",
        ?StreamInterface $stream = null,
        ?TransferProgressSnapshot $currentSnapshot = null,
        ?TransferListenerNotifier $listenerNotifier  = null,
    ) {
        $this->requestArgs = $requestArgs;
        $this->currentPartNo = $currentPartNo;
        $this->objectPartsCount = $objectPartsCount;
        $this->objectSizeInBytes = $objectSizeInBytes;
        $this->eTag = $eTag;
        if ($stream === null) {
            $this->stream = Utils::streamFor(
                fopen('php://temp', 'w+')
            );
        } else {
            $this->stream = $stream;
            // Position at the end of the stream
            $this->stream->seek($stream->getSize());
        }
        $this->currentSnapshot = $currentSnapshot;
        $this->listenerNotifier  = $listenerNotifier;
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
    public function getObjectSizeInBytes(): int
    {
        return $this->objectSizeInBytes;
    }

    /**
     * @return TransferProgressSnapshot
     */
    public function getCurrentSnapshot(): TransferProgressSnapshot
    {
        return $this->currentSnapshot;
    }

    /**
     * @return DownloadResponse
     */
    public function download(): DownloadResponse {
        return $this->promise()->wait();
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
            $this->downloadInitiated($this->requestArgs);
            $result = ['@metadata'=>[]];
            try {
                $result = yield $this->s3Client->executeAsync($this->nextCommand())
                    ->then(function (ResultInterface $result) {
                        // Calculate object size and parts count.
                        $this->computeObjectDimensions($result);
                        // Trigger first part completed
                        $this->partDownloadCompleted($result);

                        return $result;
                    })->otherwise(function ($reason)  {
                        $this->partDownloadFailed($reason);

                        throw $reason;
                    });
            } catch (\Throwable $e) {
                $this->downloadFailed($e);
                // TODO: yield transfer exception modeled with a transfer failed response.
                yield Create::rejectionFor($e);
            }

            while ($this->currentPartNo < $this->objectPartsCount) {
                try {
                    yield $this->s3Client->executeAsync($this->nextCommand())
                        ->then(function ($result) {
                            $this->partDownloadCompleted($result);

                            return $result;
                        })->otherwise(function ($reason) {
                            $this->partDownloadFailed($reason);

                            throw $reason;
                        });
                } catch (\Throwable $reason) {
                    $this->downloadFailed($reason);
                    // TODO: yield transfer exception modeled with a transfer failed response.
                    yield Create::rejectionFor($reason);
                }

            }

            // Transfer completed
            $this->downloadComplete();

            unset($result['Body']);
            yield Create::promiseFor(new DownloadResponse(
                $this->stream,
                $result['@metadata'] ?? []
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
            return 0;
        }

        // For extracting the object size from the ContentRange header value.
        if (preg_match(self::OBJECT_SIZE_REGEX, $sizeSource, $matches)) {
            return $matches[1];
        }

        throw new \RuntimeException('Invalid source size format');
    }

    /**
     * Main purpose of this method is to propagate
     * the download-initiated event to listeners, but
     * also it does some computation regarding internal states
     * that need to be maintained.
     *
     * @param array $commandArgs
     *
     * @return void
     */
    private function downloadInitiated(array $commandArgs): void
    {
       if ($this->currentSnapshot === null) {
           $this->currentSnapshot = new TransferProgressSnapshot(
               $commandArgs['Key'],
               0,
               $this->objectSizeInBytes
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
            TransferListener::REQUEST_ARGS_KEY => $commandArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
        ]);
    }

    /**
     * Propagates download-failed event to listeners.
     *
     * @param \Throwable $reason
     *
     * @return void
     */
    private function downloadFailed(\Throwable $reason): void
    {
        // Event already propagated.
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
        $this->stream->close();
        $this->listenerNotifier?->transferFail([
            TransferListener::REQUEST_ARGS_KEY => $this->requestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
            'reason' => $reason,
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
     *
     * @return void
     */
    private function partDownloadCompleted(
        ResultInterface $result
    ): void
    {
        $partDownloadBytes = $result['ContentLength'];
        if (isset($result['ETag'])) {
            $this->eTag = $result['ETag'];
        }
        Utils::copyToStream($result['Body'], $this->stream);
        $newSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes() + $partDownloadBytes,
            $this->objectSizeInBytes,
            $result->toArray()
        );
        $this->currentSnapshot = $newSnapshot;
        $this->listenerNotifier?->bytesTransferred([
            TransferListener::REQUEST_ARGS_KEY => $this->requestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
        ]);
    }

    /**
     * Propagates part-download-failed event to listeners.
     *
     * @param \Throwable $reason
     *
     * @return void
     */
    private function partDownloadFailed(
        \Throwable $reason,
    ): void
    {
        $this->downloadFailed($reason);
    }

    /**
     * Propagates object-download-completed event to listeners.
     * It also resets the pointer of the stream to the first position,
     * so that the stream is ready to be consumed once returned.
     *
     * @return void
     */
    private function downloadComplete(): void
    {
        $this->stream->rewind();
        $newSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes(),
            $this->objectSizeInBytes,
            $this->currentSnapshot->getResponse()
        );
        $this->currentSnapshot = $newSnapshot;
        $this->listenerNotifier?->transferComplete([
            TransferListener::REQUEST_ARGS_KEY => $this->requestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
        ]);
    }

    /**
     * @param mixed $multipartDownloadType
     *
     * @return string
     */
    public static function chooseDownloaderClass(
        string $multipartDownloadType
    ): string
    {
        return match ($multipartDownloadType) {
            MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER => PartGetMultipartDownloader::class,
            MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER => RangeGetMultipartDownloader::class,
            default => throw new \InvalidArgumentException(
                "The config value for `multipart_download_type` must be one of:\n"
                . "\t* " . MultipartDownloader::PART_GET_MULTIPART_DOWNLOADER
                ."\n"
                . "\t* " . MultipartDownloader::RANGE_GET_MULTIPART_DOWNLOADER
            )
        };
    }
}