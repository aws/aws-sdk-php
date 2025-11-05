<?php
namespace Aws\S3\S3Transfer;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadResult;
use Aws\S3\S3Transfer\Models\S3TransferManagerConfig;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Aws\S3\S3Transfer\Utils\DownloadHandler;
use Aws\S3\S3Transfer\Utils\StreamDownloadHandler;
use GuzzleHttp\Promise\Coroutine;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\Each;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\PromisorInterface;
use Throwable;

abstract class AbstractMultipartDownloader implements PromisorInterface
{
    public const GET_OBJECT_COMMAND = "GetObject";
    public const PART_GET_MULTIPART_DOWNLOADER = "part";
    public const RANGED_GET_MULTIPART_DOWNLOADER = "ranged";
    private const OBJECT_SIZE_REGEX = "/\/(\d+)$/";
    
    /** @var array */
    protected readonly array $downloadRequestArgs;

    /** @var array */
    protected readonly array $config;

    /** @var DownloadHandler */
    private DownloadHandler $downloadHandler;

    /** @var int */
    protected int $currentPartNo;

    /** @var int */
    protected int $objectPartsCount;

    /** @var int */
    protected int $objectSizeInBytes;

    /** @var string|null */
    protected ?string $eTag;

    /** @var TransferListenerNotifier|null */
    private readonly ?TransferListenerNotifier $listenerNotifier;

    /** Tracking Members */
    private ?TransferProgressSnapshot $currentSnapshot;

    /**
     * @param S3ClientInterface $s3Client
     * @param array $downloadRequestArgs
     * @param array $config
     * @param ?DownloadHandler $downloadHandler
     * @param int $currentPartNo
     * @param int $objectPartsCount
     * @param int $objectSizeInBytes
     * @param string|null $eTag
     * @param TransferProgressSnapshot|null $currentSnapshot
     * @param TransferListenerNotifier|null $listenerNotifier
     */
    public function __construct(
        protected readonly S3ClientInterface $s3Client,
        array $downloadRequestArgs,
        array $config = [],
        ?DownloadHandler $downloadHandler = null,
        int $currentPartNo = 0,
        int $objectPartsCount = 0,
        int $objectSizeInBytes = 0,
        ?string $eTag = null,
        ?TransferProgressSnapshot $currentSnapshot = null,
        ?TransferListenerNotifier $listenerNotifier  = null
    ) {
        $this->downloadRequestArgs = $downloadRequestArgs;
        $this->validateConfig($config);
        $this->config = $config;
        if ($downloadHandler === null) {
            $downloadHandler = new StreamDownloadHandler();
        }
        $this->downloadHandler = $downloadHandler;
        $this->currentPartNo = $currentPartNo;
        $this->objectPartsCount = $objectPartsCount;
        $this->objectSizeInBytes = $objectSizeInBytes;
        $this->eTag = $eTag;
        $this->currentSnapshot = $currentSnapshot;
        if ($listenerNotifier === null) {
            $listenerNotifier = new TransferListenerNotifier();
        }
        // Add download handler to the listener notifier
        $listenerNotifier->addListener($downloadHandler);
        $this->listenerNotifier  = $listenerNotifier;
    }

    /**
     * Returns the next command for fetching the next object part.
     *
     * @return CommandInterface
     */
    abstract protected function nextCommand(): CommandInterface;

    /**
     * Compute the object dimensions, such as size and parts count.
     *
     * @param ResultInterface $result
     *
     * @return void
     */
    abstract protected function computeObjectDimensions(ResultInterface $result): void;

    private function validateConfig(array &$config): void
    {
        if (!isset($config['target_part_size_bytes'])) {
            $config['target_part_size_bytes'] = S3TransferManagerConfig::DEFAULT_TARGET_PART_SIZE_BYTES;
        }

        if (!isset($config['concurrency'])) {
            $config['concurrency'] = S3TransferManagerConfig::DEFAULT_CONCURRENCY;
        }

        if (!isset($config['response_checksum_validation'])) {
            $config['response_checksum_validation'] = S3TransferManagerConfig::DEFAULT_RESPONSE_CHECKSUM_VALIDATION;
        }
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
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
     * @return DownloadResult
     */
    public function download(): DownloadResult
    {
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
            $initialRequestResult = yield $this->initialRequest();

            $partsDownloadPromises = $this->partDownloadRequests();

            // When concurrency is not supported by the download handler
            // Then the number of concurrency will be just one.
            $concurrency = $this->downloadHandler->isConcurrencySupported()
                ? $this->config['concurrency']
                : 1;

            yield Each::ofLimitAll(
                $partsDownloadPromises,
                $concurrency,
            )->then(function () use ($initialRequestResult) {
                // Transfer completed
                $this->downloadComplete();

                return Create::promiseFor(new DownloadResult(
                    $this->downloadHandler->getHandlerResult(),
                    $initialRequestResult->toArray(),
                ));
            })->otherwise(function (Throwable $e) {
                $this->downloadFailed($e);

                throw $e;
            });
        });
    }

    /**
     * Perform the initial download request.
     *
     * @return PromiseInterface
     */
    protected function initialRequest(): PromiseInterface
    {
        $command = $this->nextCommand();
        // Notify download initiated
        $this->downloadInitiated($command->toArray());

        return $this->s3Client->executeAsync($command)
            ->then(function (ResultInterface $result) use ($command) {
                // Compute object dimensions such as parts count and object size
                $this->computeObjectDimensions($result);

                // If there are more than one part then save the ETag
                if ($this->objectPartsCount > 1) {
                    $this->eTag = $result['ETag'];
                }

                // Notify listeners
                $this->partDownloadCompleted(
                    $result,
                    $command->toArray()
                );

                // Assign custom fields in the result
                $result['ContentLength'] = $this->objectSizeInBytes;
                $result['ContentRange'] = "0-"
                    . ($this->objectSizeInBytes - 1)
                    . "/"
                    . $this->objectPartsCount;

                unset($result['Body']);

                return $result;
            })->otherwise(function ($reason)  {
                $this->partDownloadFailed($reason);

                throw $reason;
            });
    }

    /**
     * @return \Generator
     */
    private function partDownloadRequests(): \Generator
    {
        // To prevent infinite loops
        $prevPartNo = $this->currentPartNo - 1;
        while ($this->currentPartNo < $this->objectPartsCount) {
            if ($prevPartNo !== $this->currentPartNo - 1) {
                throw new S3TransferException(
                    "Current part `$this->currentPartNo` MUST increment."
                );
            }

            $prevPartNo = $this->currentPartNo;

            $command = $this->nextCommand();
            yield $this->s3Client->executeAsync($command)
                ->then(function (ResultInterface $result) use ($command) {
                    $this->partDownloadCompleted(
                        $result,
                        $command->toArray()
                    );

                    return $result;
                });
        }

        if ($this->currentPartNo !== $this->objectPartsCount) {
            throw new S3TransferException(
                "Expected number of parts `$this->objectPartsCount`"
                . " to have been transferred but got `$this->currentPartNo`."
            );
        }
    }

    /**
     * Calculates the object size from content range.
     *
     * @param string $contentRange
     * @return int
     */
    public static function computeObjectSizeFromContentRange(
        string $contentRange
    ): int
    {
        if (empty($contentRange)) {
            return 0;
        }

        // For extracting the object size from the ContentRange header value.
        if (preg_match(self::OBJECT_SIZE_REGEX, $contentRange, $matches)) {
            return $matches[1];
        }

        throw new S3TransferException(
            "Invalid content range \"$contentRange\""
        );
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

        $this->listenerNotifier?->transferFail([
            TransferListener::REQUEST_ARGS_KEY => $this->downloadRequestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
            'reason' => $reason,
        ]);
    }

    /**
     * Propagates part-download-completed to listeners.
     * It also does some computation in order to maintain internal states.
     *
     * @param ResultInterface $result
     *
     * @return void
     */
    private function partDownloadCompleted(
        ResultInterface $result,
        array $requestArgs
    ): void
    {
        $partDownloadBytes = $result['ContentLength'];
        $newSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes() + $partDownloadBytes,
            $this->objectSizeInBytes,
            $result->toArray()
        );
        $this->currentSnapshot = $newSnapshot;
        $this->listenerNotifier?->bytesTransferred([
            TransferListener::REQUEST_ARGS_KEY => $requestArgs,
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
     *
     * @return void
     */
    private function downloadComplete(): void
    {
        $newSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes(),
            $this->objectSizeInBytes,
            $this->currentSnapshot->getResponse()
        );
        $this->currentSnapshot = $newSnapshot;
        $this->listenerNotifier?->transferComplete([
            TransferListener::REQUEST_ARGS_KEY => $this->downloadRequestArgs,
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
            AbstractMultipartDownloader::PART_GET_MULTIPART_DOWNLOADER => PartGetMultipartDownloader::class,
            AbstractMultipartDownloader::RANGED_GET_MULTIPART_DOWNLOADER => RangeGetMultipartDownloader::class,
            default => throw new \InvalidArgumentException(
                "The config value for `multipart_download_type` must be one of:\n"
                . "\t* " . AbstractMultipartDownloader::PART_GET_MULTIPART_DOWNLOADER
                ."\n"
                . "\t* " . AbstractMultipartDownloader::RANGED_GET_MULTIPART_DOWNLOADER
            )
        };
    }
}
