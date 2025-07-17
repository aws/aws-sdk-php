<?php

namespace Aws\S3\S3Transfer;

use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadDirectoryRequest;
use Aws\S3\S3Transfer\Models\DownloadDirectoryResponse;
use Aws\S3\S3Transfer\Models\DownloadFileRequest;
use Aws\S3\S3Transfer\Models\DownloadRequest;
use Aws\S3\S3Transfer\Models\S3TransferManagerConfig;
use Aws\S3\S3Transfer\Models\UploadDirectoryRequest;
use Aws\S3\S3Transfer\Models\UploadDirectoryResponse;
use Aws\S3\S3Transfer\Models\UploadRequest;
use Aws\S3\S3Transfer\Models\UploadResult;
use Aws\S3\S3Transfer\Progress\MultiProgressTracker;
use Aws\S3\S3Transfer\Progress\SingleProgressTracker;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Aws\S3\S3Transfer\Utils\DownloadHandler;
use FilesystemIterator;
use GuzzleHttp\Promise\Each;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use function Aws\filter;
use function Aws\map;

class S3TransferManager
{
    /** @var S3Client  */
    private S3ClientInterface $s3Client;

    /** @var S3TransferManagerConfig  */
    private S3TransferManagerConfig $config;

    /**
     * @param S3ClientInterface | null $s3Client If provided as null then,
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
            $uploadRequest->getPutObjectRequestArgs(),
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
        $targetBucket = $uploadDirectoryRequest->getTargetBucket();

        $uploadDirectoryRequest->updateConfigWithDefaults(
            $this->config->toArray()
        );

        $config = $uploadDirectoryRequest->getConfig();
        $progressTracker = $uploadDirectoryRequest->getProgressTracker();
        if ($progressTracker === null
            && ($config['track_progress'] ?? $this->config->isTrackProgress())) {
            $progressTracker = new MultiProgressTracker();
        }

        $filter = null;
        if (isset($config['filter'])) {
            if (!is_callable($config['filter'])) {
                throw new InvalidArgumentException(
                    "The provided config `filter` must be callable."
                );
            }

            $filter = $config['filter'];
        }

        $putObjectRequestCallback = null;
        if (isset($config['put_object_request_callback'])) {
            if (!is_callable($config['put_object_request_callback'])) {
                throw new InvalidArgumentException(
                    "The provided config `put_object_request_callback` must be callable."
                );
            }

            $putObjectRequestCallback = $config['put_object_request_callback'];
        }

        $failurePolicyCallback = null;
        if (isset($config['failure_policy'])) {
            if (!is_callable($config['failure_policy'])) {
                throw new InvalidArgumentException(
                    "The provided config `failure_policy` must be callable."
                );
            }

            $failurePolicyCallback = $config['failure_policy'];
        }

        $sourceDirectory = $uploadDirectoryRequest->getSourceDirectory();
        $dirIterator = new RecursiveDirectoryIterator(
            $sourceDirectory
        );
        $dirIterator->setFlags(FilesystemIterator::SKIP_DOTS);
        if ($config['follow_symbolic_links'] ?? false) {
            $dirIterator->setFlags(FilesystemIterator::FOLLOW_SYMLINKS);
        }

        if ($config['recursive'] ?? false) {
            $dirIterator = new RecursiveIteratorIterator($dirIterator);
        }

        $files = filter(
            $dirIterator,
            function ($file) use ($filter) {
                if ($filter !== null) {
                    return !is_dir($file) && $filter($file);
                }

                return !is_dir($file);
            }
        );

        $prefix = $config['s3_prefix'] ?? '';
        if ($prefix !== '' && !str_ends_with($prefix, '/')) {
            $prefix .= '/';
        }

        $delimiter = $config['s3_delimiter'] ?? '/';
        $promises = [];
        $objectsUploaded = 0;
        $objectsFailed = 0;
        foreach ($files as $file) {
            $baseDir = rtrim($sourceDirectory, '/') . DIRECTORY_SEPARATOR;
            $relativePath = substr($file, strlen($baseDir));
            if (str_contains($relativePath, $delimiter) && $delimiter !== '/') {
                throw new S3TransferException(
                    "The filename `$relativePath` must not contain the provided delimiter `$delimiter`"
                );
            }
            $objectKey = $prefix.$relativePath;
            $objectKey = str_replace(
                DIRECTORY_SEPARATOR,
                $delimiter,
                $objectKey
            );
            $putObjectRequestArgs = $uploadDirectoryRequest->getPutObjectRequestArgs();
            $putObjectRequestArgs['Bucket'] = $targetBucket;
            $putObjectRequestArgs['Key'] = $objectKey;

            if ($putObjectRequestCallback !== null) {
                $putObjectRequestCallback($putObjectRequestArgs);
            }

            $promises[] = $this->upload(
                UploadRequest::fromLegacyArgs(
                    $file,
                    $putObjectRequestArgs,
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
            })->otherwise(function ($reason) use (
                $targetBucket,
                $sourceDirectory,
                $failurePolicyCallback,
                $putObjectRequestArgs,
                &$objectsUploaded,
                &$objectsFailed
            ) {
                $objectsFailed++;
                if($failurePolicyCallback !== null) {
                    call_user_func(
                        $failurePolicyCallback,
                        $putObjectRequestArgs,
                        [
                            "source_directory" => $sourceDirectory,
                            "bucket_to" => $targetBucket,
                        ],
                        $reason,
                        new UploadDirectoryResponse(
                            $objectsUploaded,
                            $objectsFailed
                        )
                    );

                    return;
                }

                throw $reason;
            });
        }

        return Each::ofLimitAll($promises, $this->config->getConcurrency())
            ->then(function ($_) use (&$objectsUploaded, &$objectsFailed) {
                return new UploadDirectoryResponse($objectsUploaded, $objectsFailed);
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
        $config = $downloadDirectoryRequest->getConfig();
        if ($progressTracker === null && $config['track_progress']) {
            $progressTracker = new MultiProgressTracker();
        }

        $listArgs = [
            'Bucket' => $sourceBucket,
        ]  + ($config['list_object_v2_args'] ?? []);
        $s3Prefix = $config['s3_prefix'] ?? null;
        if (empty($listArgs['Prefix']) && $s3Prefix !== null) {
            $listArgs['Prefix'] = $s3Prefix;
        }

        $listArgs['Delimiter'] = $listArgs['Delimiter']
            ?? $config['s3_delimiter'] ?? null;

        $objects = $this->s3Client
            ->getPaginator('ListObjectsV2', $listArgs)
            ->search('Contents[].Key');

        if (isset($config['filter'])) {
            if (!is_callable($config['filter'])) {
                throw new InvalidArgumentException(
                    "The provided config `filter` must be callable."
                );
            }

            $filter = $config['filter'];
            $objects = filter($objects, function (string $key) use ($filter) {
                return call_user_func($filter, $key) && !str_ends_with($key, "/");
            });
        } else {
            $objects = filter($objects, function (string $key) {
                return !str_ends_with($key, "/");
            });
        }

        $objects = map($objects, function (string $key) use ($sourceBucket) {
            return  self::formatAsS3URI($sourceBucket, $key);
        });

        $getObjectRequestCallback = null;
        if (isset($config['get_object_request_callback'])) {
            if (!is_callable($config['get_object_request_callback'])) {
                throw new InvalidArgumentException(
                    "The provided config `get_object_request_callback` must be callable."
                );
            }

            $getObjectRequestCallback = $config['get_object_request_callback'];
        }

        $failurePolicyCallback = null;
        if (isset($config['failure_policy'])) {
            if (!is_callable($config['failure_policy'])) {
                throw new InvalidArgumentException(
                    "The provided config `failure_policy` must be callable."
                );
            }
            
            $failurePolicyCallback = $config['failure_policy'];
        }

        $promises = [];
        $objectsDownloaded = 0;
        $objectsFailed = 0;
        foreach ($objects as $object) {
            $bucketAndKeyArray = self::s3UriAsBucketAndKey($object);
            $objectKey = $bucketAndKeyArray['Key'];
            $destinationFile = $destinationDirectory . DIRECTORY_SEPARATOR . $objectKey;
            if ($this->resolvesOutsideTargetDirectory($destinationFile, $objectKey)) {
                throw new S3TransferException(
                    "Cannot download key ' . $objectKey
                    . ', its relative path resolves outside the'
                    . ' parent directory"
                );
            }

            $requestArgs = $downloadDirectoryRequest->getGetObjectRequestArgs();
            foreach ($bucketAndKeyArray as $key => $value) {
                $requestArgs[$key] = $value;
            }
            if ($getObjectRequestCallback !== null) {
                call_user_func($getObjectRequestCallback, $requestArgs);
            }

            $promises[] = $this->downloadFile(
                new DownloadFileRequest(
                    $destinationFile,
                    $config['fails_when_destination_exists'] ?? false,
                    new DownloadRequest(
                        null,
                        $requestArgs,
                        [
                            'target_part_size_bytes' => $config['target_part_size_bytes'] ?? 0,
                        ],
                        null,
                        array_map(
                            fn($listener) => clone $listener,
                            $downloadDirectoryRequest->getListeners()
                        ),
                        $progressTracker,
                    )
                ),
            )->then(function () use (
                &$objectsDownloaded
            ) {
                $objectsDownloaded++;
            })->otherwise(function ($reason) use (
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
                        new DownloadDirectoryResponse(
                            $objectsDownloaded,
                            $objectsFailed
                        )
                    );

                    return;
                }

                throw $reason;
            });
        }

        return Each::ofLimitAll($promises, $this->config->getConcurrency())
            ->then(function ($_) use (&$objectsFailed, &$objectsDownloaded) {
                return new DownloadDirectoryResponse(
                    $objectsDownloaded,
                    $objectsFailed
                );
            });
    }

    /**
     * Tries an object multipart download.
     *
     * @param array $getObjectRequestArgs
     * @param array $config
     * @param DownloadHandler $downloadHandler
     * @param TransferListenerNotifier|null $listenerNotifier
     *
     * @return PromiseInterface
     */
    private function tryMultipartDownload(
        array $getObjectRequestArgs,
        array $config,
        DownloadHandler $downloadHandler,
        ?TransferListenerNotifier $listenerNotifier = null,
    ): PromiseInterface
    {
        $downloaderClassName = MultipartDownloader::chooseDownloaderClass(
            $config['multipart_download_type']
        );
        $multipartDownloader = new $downloaderClassName(
            $this->s3Client,
            $getObjectRequestArgs,
            $config,
            $downloadHandler,
            listenerNotifier: $listenerNotifier,
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
        ?TransferListenerNotifier $listenerNotifier  = null
    ): PromiseInterface {
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
                    TransferListener::REQUEST_ARGS_KEY => $requestArgs,
                    TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                        $requestArgs['Key'],
                        0,
                        $objectSize,
                    ),
                ]
            );

            $command = $this->s3Client->getCommand('PutObject', $requestArgs);
            return $this->s3Client->executeAsync($command)->then(
                function ($result) use ($objectSize, $listenerNotifier, $requestArgs) {
                    $listenerNotifier->bytesTransferred(
                        [
                            TransferListener::REQUEST_ARGS_KEY => $requestArgs,
                            TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
                                $requestArgs['Key'],
                                $objectSize,
                                $objectSize,
                            ),
                        ]
                    );

                    $listenerNotifier->transferComplete(
                        [
                            TransferListener::REQUEST_ARGS_KEY => $requestArgs,
                            TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
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
            )->otherwise(function ($reason) use ($objectSize, $requestArgs, $listenerNotifier) {
                $listenerNotifier->transferFail(
                    [
                        TransferListener::REQUEST_ARGS_KEY => $requestArgs,
                        TransferListener::PROGRESS_SNAPSHOT_KEY => new TransferProgressSnapshot(
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
            ->then(function ($result) {
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
    ): PromiseInterface {
        return (new MultipartUploader(
            $this->s3Client,
            $uploadRequest->getPutObjectRequestArgs(),
            $uploadRequest->getConfig(),
            $uploadRequest->getSource(),
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
        string | StreamInterface $source,
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
        return new S3Client([
            'region' => $this->config->getDefaultRegion(),
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
     * @param $bucket
     * @param $key
     *
     * @return string
     */
    private static function formatAsS3URI($bucket, $key): string
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
