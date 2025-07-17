<?php

namespace Aws\S3\S3Transfer;

use Aws\CommandInterface;
use Aws\CommandPool;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Models\S3TransferManagerConfig;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use GuzzleHttp\Promise\Coroutine;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\PromisorInterface;
use Throwable;

/**
 * Abstract base class for multipart operations (upload/copy).
 */
abstract class AbstractMultipartUploader implements PromisorInterface
{
    public const PART_MIN_SIZE = 5 * 1024 * 1024; // 5 MiB
    public const PART_MAX_SIZE = 5 * 1024 * 1024 * 1024; // 5 GiB
    public const PART_MAX_NUM = 10000;
    public const DEFAULT_CHECKSUM_CALCULATION_ALGORITHM = 'crc32';

    /** @var S3ClientInterface */
    protected readonly S3ClientInterface $s3Client;

    /** @var array @ */
    protected readonly array $putObjectRequestArgs;

    /** @var array @ */
    protected readonly array $config;

    /** @var string|null */
    protected string|null $uploadId;

    /** @var array @ */
    protected array $parts;

    /** @var array */
    protected array $onCompletionCallbacks = [];

    /** @var TransferListenerNotifier|null */
    protected ?TransferListenerNotifier $listenerNotifier;

    /** Tracking Members */
    /** @var TransferProgressSnapshot|null */
    protected ?TransferProgressSnapshot $currentSnapshot;

    /**
     * This will be used for custom or default checksum.
     *
     * @var string | null
     */
    protected ?string $requestChecksum;

    /**
     * This will be used for custom or default checksum.
     *
     * @var string | null
     */
    protected ?string $requestChecksumAlgorithm;

    /**
     * @param S3ClientInterface $s3Client
     * @param array $putObjectRequestArgs
     * @param array $config
     * - target_part_size_bytes: (int, optional)
     * - request_checksum_calculation: (string, optional)
     * - concurrency: (int, optional)
     * @param string|null $uploadId
     * @param array $parts
     * @param TransferProgressSnapshot|null $currentSnapshot
     * @param TransferListenerNotifier|null $listenerNotifier
     */
    public function __construct
    (
        S3ClientInterface $s3Client,
        array $putObjectRequestArgs,
        array $config,
        ?string $uploadId = null,
        array $parts = [],
        ?TransferProgressSnapshot $currentSnapshot = null,
        ?TransferListenerNotifier $listenerNotifier = null,
    )
    {
        $this->s3Client = $s3Client;
        $this->putObjectRequestArgs = $putObjectRequestArgs;
        $this->validateConfig($config);
        $this->config = $config;
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
    protected function validateConfig(array &$config): void
    {
        if (!isset($config['target_part_size_bytes'])) {
            $config['target_part_size_bytes'] = S3TransferManagerConfig::DEFAULT_TARGET_PART_SIZE_BYTES;
        }

        if (!isset($config['concurrency'])) {
            $config['concurrency'] = S3TransferManagerConfig::DEFAULT_CONCURRENCY;
        }

        if (!isset($config['request_checksum_calculation'])) {
            $config['request_checksum_calculation'] = 'when_supported';
        }

        $partSize = $config['target_part_size_bytes'];
        if ($partSize < self::PART_MIN_SIZE || $partSize > self::PART_MAX_SIZE) {
            throw new \InvalidArgumentException(
                "Part size config must be between " . self::PART_MIN_SIZE
                ." and " . self::PART_MAX_SIZE . " bytes "
                ."but it is configured to $partSize"
            );
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
     * Get the current progress snapshot.
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
                yield $this->processMultipartOperation();
                $result = yield $this->completeMultipartUpload();
                yield Create::promiseFor($this->createResponse($result));
            } catch (Throwable $e) {
                $this->operationFailed($e);
                yield Create::rejectionFor($e);
            } finally {
                $this->callOnCompletionCallbacks();
            }
        });
    }

    /**
     * @return PromiseInterface
     */
    protected function createMultipartUpload(): PromiseInterface
    {
        $createMultipartUploadArgs = $this->putObjectRequestArgs;
        if ($this->requestChecksum !== null) {
            $createMultipartUploadArgs['ChecksumType'] = 'FULL_OBJECT';
            $createMultipartUploadArgs['ChecksumAlgorithm'] = $this->requestChecksumAlgorithm;
        } elseif ($this->config['request_checksum_calculation'] === 'when_supported') {
            $this->requestChecksumAlgorithm = $createMultipartUploadArgs['ChecksumAlgorithm']
                ?? self::DEFAULT_CHECKSUM_CALCULATION_ALGORITHM;
            $createMultipartUploadArgs['ChecksumType'] = 'FULL_OBJECT';
            $createMultipartUploadArgs['ChecksumAlgorithm'] = $this->requestChecksumAlgorithm;
        }

        $this->operationInitiated($createMultipartUploadArgs);
        $command = $this->s3Client->getCommand(
            'CreateMultipartUpload',
            $createMultipartUploadArgs
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
    protected function completeMultipartUpload(): PromiseInterface
    {
        $this->sortParts();
        $completeMultipartUploadArgs = $this->putObjectRequestArgs;
        $completeMultipartUploadArgs['UploadId'] = $this->uploadId;
        $completeMultipartUploadArgs['MultipartUpload'] = [
            'Parts' => $this->parts
        ];
        $completeMultipartUploadArgs['MpuObjectSize'] = $this->getTotalSize();

        if ($this->requestChecksum !== null) {
            $completeMultipartUploadArgs['ChecksumType'] = 'FULL_OBJECT';
            $completeMultipartUploadArgs[
                'Checksum' . ucfirst($this->requestChecksumAlgorithm)
            ] = $this->requestChecksum;
        }

        $command = $this->s3Client->getCommand(
            'CompleteMultipartUpload',
            $completeMultipartUploadArgs
        );

        return $this->s3Client->executeAsync($command)
            ->then(function (ResultInterface $result) {
                $this->operationCompleted($result);
                return $result;
            });
    }

    /**
     * @return PromiseInterface
     */
    protected function abortMultipartUpload(): PromiseInterface
    {
        $abortMultipartUploadArgs = $this->putObjectRequestArgs;
        $abortMultipartUploadArgs['UploadId'] = $this->uploadId;
        $command = $this->s3Client->getCommand(
            'AbortMultipartUpload',
            $abortMultipartUploadArgs
        );

        return $this->s3Client->executeAsync($command);
    }

    /**
     * @return void
     */
    protected function sortParts(): void
    {
        usort($this->parts, function ($partOne, $partTwo) {
            return $partOne['PartNumber'] <=> $partTwo['PartNumber'];
        });
    }

    /**
     * @param ResultInterface $result
     * @param CommandInterface $command
     * @return void
     */
    protected function collectPart
    (
        ResultInterface $result,
        CommandInterface $command
    ): void
    {
        $checksumResult = match($command->getName()) {
            'UploadPart' => $result,
            'UploadPartCopy' => $result['CopyPartResult'],
            default => $result[$command->getName() . 'Result']
        };

        $partData = [
            'PartNumber' => $command['PartNumber'],
            'ETag' => $checksumResult['ETag'],
        ];

        if (isset($command['ChecksumAlgorithm'])) {
            $checksumMemberName = 'Checksum' . strtoupper($command['ChecksumAlgorithm']);
            $partData[$checksumMemberName] = $checksumResult[$checksumMemberName] ?? null;
        }

        $this->parts[] = $partData;
    }

    /**
     * @param array $commands
     * @param callable $fulfilledCallback
     * @param callable $rejectedCallback
     * @return PromiseInterface
     */
    protected function createCommandPool
    (
        array $commands,
        callable $fulfilledCallback,
        callable $rejectedCallback
    ): PromiseInterface
    {
        return (new CommandPool(
            $this->s3Client,
            $commands,
            [
                'concurrency' => $this->config['concurrency'],
                'fulfilled' => $fulfilledCallback,
                'rejected' => $rejectedCallback
            ]
        ))->promise();
    }

    /**
     * @param array $requestArgs
     * @return void
     */
    protected function operationInitiated(array $requestArgs): void
    {
        if ($this->currentSnapshot === null) {
            $this->currentSnapshot = new TransferProgressSnapshot(
                $requestArgs['Key'],
                0,
                $this->getTotalSize()
            );
        }

        $this->listenerNotifier?->transferInitiated([
            TransferListener::REQUEST_ARGS_KEY => $requestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot
        ]);
    }

    /**
     * @param ResultInterface $result
     * @return void
     */
    protected function operationCompleted(ResultInterface $result): void
    {
        $newSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes(),
            $this->currentSnapshot->getTotalBytes(),
            $result->toArray(),
            $this->currentSnapshot->getReason(),
        );

        $this->currentSnapshot = $newSnapshot;

        $this->listenerNotifier?->transferComplete([
            TransferListener::REQUEST_ARGS_KEY =>
                $this->putObjectRequestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot
        ]);
    }

    /**
     * @param Throwable $reason
     * @return void
     *
     */
    protected function operationFailed(Throwable $reason): void
    {
        // Event already propagated
        if ($this->currentSnapshot?->getReason() !== null) {
            return;
        }

        if ($this->currentSnapshot === null) {
            $this->currentSnapshot = new TransferProgressSnapshot(
                'Unknown',
                0,
                0,
            );
        }

        $this->currentSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes(),
            $this->currentSnapshot->getTotalBytes(),
            $this->currentSnapshot->getResponse(),
            $reason
        );

        if (!empty($this->uploadId)) {
            error_log(
                "Multipart Upload with id: " . $this->uploadId . " failed",
                E_USER_WARNING
            );
            $this->abortMultipartUpload()->wait();
        }

        $this->listenerNotifier?->transferFail([
            TransferListener::REQUEST_ARGS_KEY =>
                $this->putObjectRequestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot,
            'reason' => $reason,
        ]);
    }

    /**
     * @param int $partSize
     * @param array $requestArgs
     * @return void
     */
    protected function partCompleted(
        int $partSize,
        array $requestArgs
    ): void
    {
        $newSnapshot = new TransferProgressSnapshot(
            $this->currentSnapshot->getIdentifier(),
            $this->currentSnapshot->getTransferredBytes() + $partSize,
            $this->currentSnapshot->getTotalBytes(),
            $this->currentSnapshot->getResponse(),
            $this->currentSnapshot->getReason(),
        );

        $this->currentSnapshot = $newSnapshot;

        $this->listenerNotifier?->bytesTransferred([
            TransferListener::REQUEST_ARGS_KEY => $requestArgs,
            TransferListener::PROGRESS_SNAPSHOT_KEY => $this->currentSnapshot
        ]);
    }

    /**
     * @return void
     */
    protected function callOnCompletionCallbacks(): void
    {
        foreach ($this->onCompletionCallbacks as $fn) {
            $fn();
        }

        $this->onCompletionCallbacks = [];
    }

    /**
     * @param Throwable $reason
     * @return void
     */
    protected function partFailed(Throwable $reason): void
    {
        $this->operationFailed($reason);
    }

    /**
     * @return int
     */
    protected function calculatePartSize(): int
    {
        return max(
            $this->getTotalSize() / self::PART_MAX_NUM,
            $this->config['target_part_size_bytes']
        );
    }

    /**
     * @return PromiseInterface
     */
    abstract protected function processMultipartOperation(): PromiseInterface;

    /**
     * @return int
     */
    abstract protected function getTotalSize(): int;

    /**
     * @param ResultInterface $result
     *
     * @return mixed
     */
    abstract protected function createResponse(ResultInterface $result): mixed;
}
