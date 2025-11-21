<?php

namespace Aws\S3\S3Transfer;

use Aws\ResultInterface;
use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadDirectoryRequest;
use Aws\S3\S3Transfer\Models\DownloadDirectoryResult;
use Aws\S3\S3Transfer\Models\DownloadFileRequest;
use Aws\S3\S3Transfer\Models\DownloadRequest;
use Aws\S3\S3Transfer\Models\ResumableDownload;
use Aws\S3\S3Transfer\Models\ResumableTransfer;
use Aws\S3\S3Transfer\Models\ResumableUpload;
use Aws\S3\S3Transfer\Models\ResumeDownloadRequest;
use Aws\S3\S3Transfer\Models\ResumeUploadRequest;
use Aws\S3\S3Transfer\Models\S3TransferManagerConfig;
use Aws\S3\S3Transfer\Models\UploadDirectoryRequest;
use Aws\S3\S3Transfer\Models\UploadDirectoryResult;
use Aws\S3\S3Transfer\Models\UploadRequest;
use Aws\S3\S3Transfer\Models\UploadResult;
use Aws\S3\S3Transfer\Progress\MultiProgressTracker;
use Aws\S3\S3Transfer\Progress\SingleProgressTracker;
use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Aws\S3\S3Transfer\Utils\AbstractDownloadHandler;
use Aws\S3\S3Transfer\Utils\FileDownloadHandler;
use FilesystemIterator;
use GuzzleHttp\Promise\Each;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Throwable;
use function Aws\filter;
use function Aws\map;

final class S3TransferManager
{
    /** @var S3Client  */
    private S3ClientInterface $s3Client;

    /** @var S3TransferManagerConfig  */
    private S3TransferManagerConfig $config;

    /**
     * @param S3ClientInterface|null $s3Client If provided as null then,
     * a default client will be created where its region will be the one
     * resolved from either the default from the config or the provided.
     * @param array|S3TransferManagerConfig|null $config
     */
    public function __construct(
        ?S3ClientInterface $s3Client = null,
        array|S3TransferManagerConfig|null $config = null
    ) {
        if ($config === null || is_array($config)) {
            $this->config = S3TransferManagerConfig::fromArray($config ?? []);
        } else {
            $this->config = $config;
        }

        if ($s3Client === null) {
            $this->s3Client = $this->defaultS3Client();
        } else {
            $this->s3Client = $s3Client;
        }
    }

    /**
     * @return S3ClientInterface
     */
    public function getS3Client(): S3ClientInterface
    {
        return $this->s3Client;
    }

    /**
     * @return S3TransferManagerConfig
     */
    public function getConfig(): S3TransferManagerConfig
    {
        return $this->config;
    }

    /**
     * @param UploadRequest $uploadRequest
     *
     * @return PromiseInterface
     */
    public function upload(UploadRequest $uploadRequest): PromiseInterface
    {
        // Make sure it is a valid in path in case of a string
        $uploadRequest->validateSource();

        // Valid required parameters
        $uploadRequest->validateRequiredParameters();

        $uploadRequest->updateConfigWithDefaults(
            $this->config->toArray()
        );

        $uploadRequest->validateConfig();

        $config = $uploadRequest->getConfig();

        // Validate progress tracker
        $progressTracker = $uploadRequest->getProgressTracker();
        if ($progressTracker === null
            && ($config['track_progress']
                ?? $this->config->isTrackProgress())) {
            $progressTracker = new SingleProgressTracker();
        }

        // Append progress tracker to listeners if not null
        $listeners = $uploadRequest->getListeners();
        if ($progressTracker !== null) {
            $listeners[] = $progressTracker;
        }

        $listenerNotifier = new TransferListenerNotifier($listeners);

        // Validate multipart upload threshold
        $mupThreshold = $config['multipart_upload_threshold_bytes']
            ?? $this->config->getMultipartUploadThresholdBytes();
        if ($mupThreshold < AbstractMultipartUploader::PART_MIN_SIZE) {
            throw new InvalidArgumentException(
                "The provided config `multipart_upload_threshold_bytes`"
                ."must be greater than or equal to " . AbstractMultipartUploader::PART_MIN_SIZE
            );
        }

        if ($this->requiresMultipartUpload($uploadRequest->getSource(), $mupThreshold)) {
            return $this->tryMultipartUpload(
                $uploadRequest,
                $listenerNotifier
            );
        }

        return $this->trySingleUpload(
            $uploadRequest->getSource(),
            $uploadRequest->getUploadRequestArgs(),
            $listenerNotifier
        );
    }

    /**
     * @param UploadDirectoryRequest $uploadDirectoryRequest
     *
     * @return PromiseInterface
     */
    public function uploadDirectory(
        UploadDirectoryRequest $uploadDirectoryRequest,
    ): PromiseInterface
    {
        $uploadDirectoryRequest->validateSourceDirectory();

        $uploadDirectoryRequest->updateConfigWithDefaults(
            $this->config->toArray()
        );

        $uploadDirectoryRequest->validateConfig();

        $config = $uploadDirectoryRequest->getConfig();

        $filter = $config['filter'] ?? null;
        $uploadObjectRequestModifier = $config['upload_object_request_modifier']
            ?? null;
        $failurePolicyCallback = $config['failure_policy'] ?? null;

        $sourceDirectory = $uploadDirectoryRequest->getSourceDirectory();
        $dirIterator = new RecursiveDirectoryIterator(
            $sourceDirectory
        );

        $flags = FilesystemIterator::SKIP_DOTS;
        if ($config['follow_symbolic_links'] ?? false) {
            $flags |= FilesystemIterator::FOLLOW_SYMLINKS;
        }

        $dirIterator->setFlags($flags);

        if ($config['recursive'] ?? false) {
            $dirIterator = new RecursiveIteratorIterator(
                $dirIterator,
                RecursiveIteratorIterator::SELF_FIRST
            );
            if (isset($config['max_depth'])) {
                $dirIterator->setMaxDepth($config['max_depth']);
            }
        }

        $dirVisited = [];
        $files = filter(
            $dirIterator,
            function ($file) use ($filter, &$dirVisited) {
                if (is_dir($file)) {
                    // To avoid circular symbolic links traversal
                    $dirRealPath = realpath($file);
                    if ($dirRealPath !== false) {
                        if ($dirVisited[$dirRealPath] ?? false) {
                            throw new S3TransferException(
                                "A circular symbolic link traversal has been detected at $file -> $dirRealPath"
                            );
                        }

                        $dirVisited[$dirRealPath] = true;
                    }
                }

                if ($filter !== null) {
                    return !is_dir($file) && $filter($file);
                }

                return !is_dir($file);
            }
        );

        $objectsUploaded = 0;
        $objectsFailed = 0;
        $promises = [];
        $baseDir = rtrim($sourceDirectory, '/') . DIRECTORY_SEPARATOR;
        $delimiter = $config['s3_delimiter'] ?? '/';
        $s3Prefix = $config['s3_prefix'] ?? '';
        if ($s3Prefix !== '' && !str_ends_with($s3Prefix, '/')) {
            $s3Prefix .= '/';
        }
        $targetBucket = $uploadDirectoryRequest->getTargetBucket();
        $progressTracker = $uploadDirectoryRequest->getProgressTracker();
        if ($progressTracker === null
            && ($config['track_progress'] ?? $this->config->isTrackProgress())) {
            $progressTracker = new MultiProgressTracker();
        }
        foreach ($files as $file) {
            $relativePath = substr($file, strlen($baseDir));
            if (str_contains($relativePath, $delimiter) && $delimiter !== '/') {
                throw new S3TransferException(
                    "The filename `$relativePath` must not contain the provided delimiter `$delimiter`"
                );
            }
            $objectKey = $s3Prefix.$relativePath;
            $objectKey = str_replace(
                DIRECTORY_SEPARATOR,
                $delimiter,
                $objectKey
            );
            $uploadRequestArgs = $uploadDirectoryRequest->getUploadRequestArgs();
            $uploadRequestArgs['Bucket'] = $targetBucket;
            $uploadRequestArgs['Key'] = $objectKey;

            if ($uploadObjectRequestModifier !== null) {
                $uploadObjectRequestModifier($uploadRequestArgs);
            }

            $promises[] = $this->upload(
                new UploadRequest(
                    $file,
                    $uploadRequestArgs,
                    $config,
                    array_map(
                        fn($listener) => clone $listener,
                        $uploadDirectoryRequest->getListeners()
                    ),
                    $progressTracker
                )
            )->then(function (UploadResult $response) use (&$objectsUploaded) {
                $objectsUploaded++;

                return $response;
            })->otherwise(function (Throwable $reason) use (
                $targetBucket,
                $sourceDirectory,
                $failurePolicyCallback,
                $uploadRequestArgs,
                &$objectsUploaded,
                &$objectsFailed
            ) {
                $objectsFailed++;
                if($failurePolicyCallback !== null) {
                    call_user_func(
                        $failurePolicyCallback,
                        $uploadRequestArgs,
                        [
                            "source_directory" => $sourceDirectory,
                            "bucket_to" => $targetBucket,
                        ],
                        $reason,
                        new UploadDirectoryResult(
                            $objectsUploaded,
                            $objectsFailed
                        )
                    );

                    return;
                }

                throw $reason;
            });
        }

        $maxConcurrency = $config['max_concurrency']
            ?? UploadDirectoryRequest::DEFAULT_MAX_CONCURRENCY;

        return Each::ofLimitAll($promises, $maxConcurrency)
            ->then(function () use (&$objectsUploaded, &$objectsFailed) {
                return new UploadDirectoryResult($objectsUploaded, $objectsFailed);
            })->otherwise(function (Throwable $reason)
            use (&$objectsUploaded, &$objectsFailed) {
                return new UploadDirectoryResult(
                    $objectsUploaded,
                    $objectsFailed,
                    $reason
                );
            });
    }

    /**
     * @param DownloadRequest $downloadRequest
     *
     * @return PromiseInterface
     */
    public function download(DownloadRequest $downloadRequest): PromiseInterface
    {
        $sourceArgs = $downloadRequest->normalizeSourceAsArray();
        $getObjectRequestArgs = $downloadRequest->getObjectRequestArgs();

        $downloadRequest->updateConfigWithDefaults($this->config->toArray());

        $downloadRequest->validateConfig();

        $config = $downloadRequest->getConfig();

        $progressTracker = $downloadRequest->getProgressTracker();
        if ($progressTracker === null && $config['track_progress']) {
            $progressTracker = new SingleProgressTracker();
        }

        $listeners = $downloadRequest->getListeners();
        if ($progressTracker !== null) {
            $listeners[] = $progressTracker;
        }

        // Build listener notifier for notifying listeners
        $listenerNotifier = new TransferListenerNotifier($listeners);

        // Assign source
        foreach ($sourceArgs as $key => $value) {
            $getObjectRequestArgs[$key] = $value;
        }

        return $this->tryMultipartDownload(
            $getObjectRequestArgs,
            $config,
            $downloadRequest->getDownloadHandler(),
            $listenerNotifier,
        );
    }

    /**
     * @param ResumeDownloadRequest $resumeDownloadRequest
     *
     * @return PromiseInterface
     */
    public function resumeDownload(
        ResumeDownloadRequest $resumeDownloadRequest
    ): PromiseInterface
    {
        $resumableDownload = $resumeDownloadRequest->getResumableDownload();
        if (is_string($resumableDownload)) {
            if (!ResumableTransfer::isResumeFile($resumableDownload)) {
                throw new S3TransferException(
                    "Resume file `$resumableDownload` is not a valid resumable file."
                );
            }

            $resumableDownload = ResumableDownload::fromFile($resumableDownload);
        }

        // Verify that temporary file still exists
        if (!file_exists($resumableDownload->getTemporaryFile())) {
            throw new S3TransferException(
                "Cannot resume download: temporary file does not exist: "
                . $resumableDownload->getTemporaryFile()
            );
        }

        // Verify object ETag hasn't changed
        $headResult = $this->s3Client->headObject([
            'Bucket' => $resumableDownload->getBucket(),
            'Key' => $resumableDownload->getKey(),
        ]);

        $currentETag = $headResult['ETag'] ?? null;
        $resumeETag = $resumableDownload->getETag();
        if (empty($currentETag) || empty($resumeETag)) {
            throw new S3TransferException(
                "Cannot resume download: missing eTag in resumable download"
            );
        }

        if ($currentETag !== $resumableDownload->getETag()) {
            throw new S3TransferException(
                "Cannot resume download: S3 object has changed (ETag mismatch). "
                . "Expected: {$resumableDownload->getETag()}, "
                . "Current: {$currentETag}"
            );
        }

        // Make sure it uses a supported file download handler
        $downloadHandlerClass = $resumeDownloadRequest->getDownloadHandlerClass();
        if (!class_exists($downloadHandlerClass)) {
            throw new S3TransferException(
                "Download handler class `$downloadHandlerClass` does not exist"
            );
        }

        if ($downloadHandlerClass !== FileDownloadHandler::class
            && !is_subclass_of($downloadHandlerClass, FileDownloadHandler::class)) {
            throw new S3TransferException(
                "Download handler class `$downloadHandlerClass` must extend `FileDownloadHandler`"
            );
        }

        $config = $resumableDownload->getConfig();
        $downloadHandler = new $downloadHandlerClass(
            $resumableDownload->getDestination(),
            $config['fails_when_destination_exists'] ?? false,
            $config['resume_enabled'] ?? false,
            $resumableDownload->getTemporaryFile(),
            $resumableDownload->getFixedPartSize()
        );

        $progressTracker = $resumeDownloadRequest->getProgressTracker();
        $listeners = $resumeDownloadRequest->getListeners();

        if ($progressTracker === null
            && ($resumableDownload->getConfig()['track_progress']
                ?? $this->config->isTrackProgress())) {
            $progressTracker = new SingleProgressTracker();
            $listeners[] = $progressTracker;
        }

        $listenerNotifier = new TransferListenerNotifier(
            $listeners,
        );

        return $this->tryMultipartDownload(
            $resumableDownload->getRequestArgs(),
            $resumableDownload->getConfig(),
            $downloadHandler,
            $listenerNotifier,
            $resumableDownload,
        );
    }

    /**
     * @param ResumeUploadRequest $resumeUploadRequest
     *
     * @return PromiseInterface
     */
    public function resumeUpload(
        ResumeUploadRequest $resumeUploadRequest
    ): PromiseInterface
    {
        $resumableUpload = $resumeUploadRequest->getResumableUpload();
        if (is_string($resumableUpload)) {
            if (!ResumableTransfer::isResumeFile($resumableUpload)) {
                throw new S3TransferException(
                    "Resume file `$resumableUpload` is not a valid resumable file."
                );
            }

            $resumableUpload = ResumableUpload::fromFile($resumableUpload);
        }

        // Verify that source file still exists
        if (!file_exists($resumableUpload->getSource())) {
            throw new S3TransferException(
                "Cannot resume upload: source file does not exist: "
                . $resumableUpload->getSource()
            );
        }

        // Verify upload still exists in S3 by checking uploadId
        $uploads = $this->s3Client->listMultipartUploads([
            'Bucket' => $resumableUpload->getBucket(),
            'Prefix' => $resumableUpload->getKey(),
        ]);

        $uploadExists = false;
        foreach ($uploads['Uploads'] ?? [] as $upload) {
            if ($upload['UploadId'] === $resumableUpload->getUploadId()
                && $upload['Key'] === $resumableUpload->getKey()) {
                $uploadExists = true;
                break;
            }
        }

        if (!$uploadExists) {
            throw new S3TransferException(
                "Cannot resume upload: multipart upload no longer exists (UploadId: "
                . $resumableUpload->getUploadId() . ")"
            );
        }

        $config = $resumableUpload->getConfig();
        $progressTracker = $resumeUploadRequest->getProgressTracker();
        $listeners = $resumeUploadRequest->getListeners();

        if ($progressTracker === null
            && ($config['track_progress'] ?? $this->config->isTrackProgress())) {
            $progressTracker = new SingleProgressTracker();
            $listeners[] = $progressTracker;
        }

        $listenerNotifier = new TransferListenerNotifier($listeners);

        return (new MultipartUploader(
            $this->s3Client,
            $resumableUpload->getRequestArgs(),
            $resumableUpload->getSource(),
            $config,
            listenerNotifier: $listenerNotifier,
            resumableUpload: $resumableUpload,
        ))->promise();
    }

    /**
     * @param DownloadFileRequest $downloadFileRequest
     *
     * @return PromiseInterface
     */
    public function downloadFile(
        DownloadFileRequest $downloadFileRequest
    ): PromiseInterface
    {
        return $this->download($downloadFileRequest->getDownloadRequest());
    }

    /**
     * @param DownloadDirectoryRequest $downloadDirectoryRequest
     *
     * @return PromiseInterface
     */
    public function downloadDirectory(
        DownloadDirectoryRequest $downloadDirectoryRequest
    ): PromiseInterface
    {
        $downloadDirectoryRequest->validateDestinationDirectory();
        $destinationDirectory = $downloadDirectoryRequest->getDestinationDirectory();
        $sourceBucket = $downloadDirectoryRequest->getSourceBucket();
        $progressTracker = $downloadDirectoryRequest->getProgressTracker();

        $downloadDirectoryRequest->updateConfigWithDefaults(
            $this->config->toArray()
        );

        $downloadDirectoryRequest->validateConfig();

        $config = $downloadDirectoryRequest->getConfig();
        if ($progressTracker === null && $config['track_progress']) {
            $progressTracker = new MultiProgressTracker();
        }

        $listArgs = [
                'Bucket' => $sourceBucket,
            ]  + ($config['list_objects_v2_args'] ?? []);

        $s3Prefix = $config['s3_prefix'] ?? null;
        if (empty($listArgs['Prefix']) && $s3Prefix !== null) {
            $listArgs['Prefix'] = $s3Prefix;
        }

        // MUST BE NULL
        $listArgs['Delimiter'] = null;

        $objects = $this->s3Client
            ->getPaginator('ListObjectsV2', $listArgs)
            ->search('Contents[].Key');

        $filter = $config['filter'] ?? null;
        $objects = filter($objects, function (string $key) use ($filter) {
            if ($filter !== null) {
                return call_user_func($filter, $key) && !str_ends_with($key, "/");
            }

            return !str_ends_with($key, "/");
        });
        $objects = map($objects, function (string $key) use ($sourceBucket) {
            return  self::formatAsS3URI($sourceBucket, $key);
        });

        $downloadObjectRequestModifier = $config['download_object_request_modifier']
            ?? null;
        $failurePolicyCallback = $config['failure_policy'] ?? null;

        $s3Delimiter = '/';
        $objectsDownloaded = 0;
        $objectsFailed = 0;
        $promises = [];
        foreach ($objects as $object) {
            $bucketAndKeyArray = self::s3UriAsBucketAndKey($object);
            $objectKey = $bucketAndKeyArray['Key'];
            if ($s3Prefix !== null && str_contains($objectKey, $s3Delimiter)) {
                if (!str_ends_with($s3Prefix, $s3Delimiter)) {
                    $s3Prefix = $s3Prefix.$s3Delimiter;
                }

                $objectKey = substr($objectKey, strlen($s3Prefix));
            }

            // CONVERT THE KEY DIR SEPARATOR TO OS BASED DIR SEPARATOR
            if (DIRECTORY_SEPARATOR !== $s3Delimiter) {
                $objectKey = str_replace(
                    $s3Delimiter,
                    DIRECTORY_SEPARATOR,
                    $objectKey
                );
            }

            $destinationFile = $destinationDirectory . DIRECTORY_SEPARATOR . $objectKey;
            if ($this->resolvesOutsideTargetDirectory($destinationFile, $objectKey)) {
                throw new S3TransferException(
                    "Cannot download key $objectKey "
                    ."its relative path resolves outside the parent directory."
                );
            }

            $requestArgs = $downloadDirectoryRequest->getDownloadRequestArgs();
            foreach ($bucketAndKeyArray as $key => $value) {
                $requestArgs[$key] = $value;
            }
            if ($downloadObjectRequestModifier !== null) {
                call_user_func($downloadObjectRequestModifier, $requestArgs);
            }

            $promises[] = $this->downloadFile(
                new DownloadFileRequest(
                    destination: $destinationFile,
                    failsWhenDestinationExists: $config['fails_when_destination_exists'] ?? false,
                    downloadRequest: new DownloadRequest(
                        source: null, // Source has been provided in the request args
                        downloadRequestArgs: $requestArgs,
                        config: [
                            'target_part_size_bytes' => $config['target_part_size_bytes'] ?? 0,
                        ],
                        downloadHandler: null,
                        listeners: array_map(
                            fn($listener) => clone $listener,
                            $downloadDirectoryRequest->getListeners()
                        ),
                        progressTracker: $progressTracker,
                    )
                ),
            )->then(function () use (
                &$objectsDownloaded
            ) {
                $objectsDownloaded++;
            })->otherwise(function (Throwable $reason) use (
                $sourceBucket,
                $destinationDirectory,
                $failurePolicyCallback,
                &$objectsDownloaded,
                &$objectsFailed,
                $requestArgs
            ) {
                $objectsFailed++;
                if ($failurePolicyCallback !== null) {
                    call_user_func(
                        $failurePolicyCallback,
                        $requestArgs,
                        [
                            "destination_directory" => $destinationDirectory,
                            "bucket" => $sourceBucket,
                        ],
                        $reason,
                        new DownloadDirectoryResult(
                            $objectsDownloaded,
                            $objectsFailed
                        )
                    );

                    return;
                }

                throw $reason;
            });
        }

        $maxConcurrency = $config['max_concurrency']
            ?? DownloadDirectoryRequest::DEFAULT_MAX_CONCURRENCY;

        return Each::ofLimitAll($promises, $maxConcurrency)
            ->then(function () use (&$objectsFailed, &$objectsDownloaded) {
                return new DownloadDirectoryResult(
                    $objectsDownloaded,
                    $objectsFailed
                );
            })->otherwise(function (Throwable $reason)
            use (&$objectsFailed, &$objectsDownloaded) {
                return new DownloadDirectoryResult(
                    $objectsDownloaded,
                    $objectsFailed,
                );
            });
    }

    /**
     * Tries an object multipart download.
     *
     * @param array $getObjectRequestArgs
     * @param array $config
     * @param AbstractDownloadHandler $downloadHandler
     * @param TransferListenerNotifier|null $listenerNotifier
     * @param ResumableDownload|null $resumableDownload
     * @return PromiseInterface
     */
    private function tryMultipartDownload(
        array                     $getObjectRequestArgs,
        array                     $config,
        AbstractDownloadHandler   $downloadHandler,
        ?TransferListenerNotifier $listenerNotifier = null,
        ?ResumableDownload $resumableDownload = null,
    ): PromiseInterface
    {
        $downloaderClassName = AbstractMultipartDownloader::chooseDownloaderClass(
            strtolower($config['multipart_download_type'])
        );
        $multipartDownloader = new $downloaderClassName(
            $this->s3Client,
            $getObjectRequestArgs,
            $config,
            $downloadHandler,
            listenerNotifier: $listenerNotifier,
            resumableDownload: $resumableDownload,
        );

        return $multipartDownloader->promise();
    }

    /**
     * @param string|StreamInterface $source
     * @param array $requestArgs
     * @param TransferListenerNotifier|null $listenerNotifier
     *
     * @return PromiseInterface
     */
    private function trySingleUpload(
        string|StreamInterface $source,
        array $requestArgs,
        ?TransferListenerNotifier $listenerNotifier = null
    ): PromiseInterface
    {
        if (is_string($source) && is_readable($source)) {
            $requestArgs['SourceFile'] = $source;
            $objectSize = filesize($source);
        } elseif ($source instanceof StreamInterface && $source->isSeekable()) {
            $requestArgs['Body'] = $source;
            $objectSize = $source->getSize();
        } else {
            throw new S3TransferException(
                "Unable to process upload request due to the type of the source"
            );
        }

        if (!empty($listenerNotifier)) {
            $listenerNotifier->transferInitiated(
                [
                    AbstractTransferListener::REQUEST_ARGS_KEY => $requestArgs,
                    AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                        $requestArgs['Key'],
                        0,
                        $objectSize,
                    ),
                ]
            );

            $command = $this->s3Client->getCommand('PutObject', $requestArgs);
            return $this->s3Client->executeAsync($command)->then(
                function (ResultInterface $result)
                use ($objectSize, $listenerNotifier, $requestArgs) {
                    $listenerNotifier->bytesTransferred(
                        [
                            AbstractTransferListener::REQUEST_ARGS_KEY => $requestArgs,
                            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                $requestArgs['Key'],
                                $objectSize,
                                $objectSize,
                            ),
                        ]
                    );

                    $listenerNotifier->transferComplete(
                        [
                            AbstractTransferListener::REQUEST_ARGS_KEY => $requestArgs,
                            AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                $requestArgs['Key'],
                                $objectSize,
                                $objectSize,
                                $result->toArray()
                            ),
                        ]
                    );

                    return new UploadResult(
                        $result->toArray()
                    );
                }
            )->otherwise(function (Throwable $reason)
            use ($objectSize, $requestArgs, $listenerNotifier) {
                $listenerNotifier->transferFail(
                    [
                        AbstractTransferListener::REQUEST_ARGS_KEY => $requestArgs,
                        AbstractTransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                            $requestArgs['Key'],
                            0,
                            $objectSize,
                        ),
                        'reason' => $reason,
                    ]
                );

                throw $reason;
            });
        }

        $command = $this->s3Client->getCommand('PutObject', $requestArgs);

        return $this->s3Client->executeAsync($command)
            ->then(function (ResultInterface $result) {
                return new UploadResult($result->toArray());
            });
    }

    /**
     * @param UploadRequest $uploadRequest
     * @param TransferListenerNotifier|null $listenerNotifier
     *
     * @return PromiseInterface
     */
    private function tryMultipartUpload(
        UploadRequest $uploadRequest,
        ?TransferListenerNotifier $listenerNotifier = null,
    ): PromiseInterface
    {
        return (new MultipartUploader(
            $this->s3Client,
            $uploadRequest->getUploadRequestArgs(),
            $uploadRequest->getSource(),
            $uploadRequest->getConfig(),
            listenerNotifier: $listenerNotifier,
        ))->promise();
    }

    /**
     * @param string|StreamInterface $source
     * @param int $mupThreshold
     *
     * @return bool
     */
    private function requiresMultipartUpload(
        string|StreamInterface $source,
        int $mupThreshold
    ): bool
    {
        if (is_string($source) && is_readable($source)) {
            return filesize($source) >= $mupThreshold;
        } elseif ($source instanceof StreamInterface) {
            // When the stream's size is unknown then we could try a multipart upload.
            if (empty($source->getSize())) {
                return true;
            }

            return $source->getSize() >= $mupThreshold;
        }

        throw new S3TransferException(
            "Unable to determine if a multipart is required"
        );
    }

    /**
     * Returns a default instance of S3Client.
     *
     * @return S3Client
     */
    private function defaultS3Client(): S3ClientInterface
    {
        $defaultRegion = $this->config->getDefaultRegion();
        if (empty($defaultRegion)) {
            throw new S3TransferException(
                "When using the default S3 Client you must define a default region."
                . "\nThe config parameter is `default_region`.`"
            );
        }

        return new S3Client([
            'region' => $defaultRegion,
        ]);
    }

    /**
     * Validates a string value is a valid S3 URI.
     * Valid S3 URI Example: S3://mybucket.dev/myobject.txt
     *
     * @param string $uri
     *
     * @return bool
     */
    public static function isValidS3URI(string $uri): bool
    {
        // in the expression `substr($uri, 5)))` the 5 belongs to the size of `s3://`.
        return str_starts_with(strtolower($uri), 's3://')
            && count(explode('/', substr($uri, 5))) > 1;
    }

    /**
     * Converts a S3 URI into an array with a Bucket and Key
     * properties set.
     *
     * @param string $uri: The S3 URI.
     *
     * @return array
     */
    public static function s3UriAsBucketAndKey(string $uri): array
    {
        $errorMessage = "Invalid URI: `$uri` provided. \nA valid S3 URI looks as `s3://bucket/key`";
        if (!self::isValidS3URI($uri)) {
            throw new InvalidArgumentException($errorMessage);
        }

        $path = substr($uri, 5); // without s3://
        $parts = explode('/', $path, 2);

        if (count($parts) < 2) {
            throw new InvalidArgumentException($errorMessage);
        }

        return [
            'Bucket' => $parts[0],
            'Key' => $parts[1],
        ];
    }

    /**
     * @param string $bucket
     * @param string $key
     *
     * @return string
     */
    private static function formatAsS3URI(string $bucket, string $key): string
    {
        return "s3://$bucket/$key";
    }

    /**
     * @param string $sink
     * @param string $objectKey
     *
     * @return bool
     */
    private function resolvesOutsideTargetDirectory(
        string $sink,
        string $objectKey
    ): bool
    {
        $resolved = [];
        $sections = explode('/', $sink);
        $targetSectionsLength = count(explode('/', $objectKey));
        $targetSections = array_slice($sections, -($targetSectionsLength + 1));
        $targetDirectory = $targetSections[0];

        foreach ($targetSections as $section) {
            if ($section === '.' || $section === '') {
                continue;
            }
            if ($section === '..') {
                array_pop($resolved);
                if (empty($resolved) || $resolved[0] !== $targetDirectory) {
                    return true;
                }
            } else {
                $resolved []= $section;
            }
        }

        return false;
    }
}
