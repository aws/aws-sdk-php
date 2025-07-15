<?php

namespace Aws\S3\S3Transfer;

use Aws\Arn\ArnParser;
use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadDirectoryRequest;
use Aws\S3\S3Transfer\Models\DownloadDirectoryResponse;
use Aws\S3\S3Transfer\Models\DownloadFileRequest;
use Aws\S3\S3Transfer\Models\DownloadHandler;
use Aws\S3\S3Transfer\Models\DownloadRequest;
use Aws\S3\S3Transfer\Models\DownloadResponse;
use Aws\S3\S3Transfer\Models\GetObjectRequest;
use Aws\S3\S3Transfer\Models\MultipartDownloaderConfig;
use Aws\S3\S3Transfer\Models\MultipartUploaderConfig;
use Aws\S3\S3Transfer\Models\PutObjectRequest;
use Aws\S3\S3Transfer\Models\PutObjectResponse;
use Aws\S3\S3Transfer\Models\S3TransferManagerConfig;
use Aws\S3\S3Transfer\Models\UploadDirectoryRequest;
use Aws\S3\S3Transfer\Models\UploadDirectoryResponse;
use Aws\S3\S3Transfer\Models\UploadRequest;
use Aws\S3\S3Transfer\Models\UploadResponse;
use Aws\S3\S3Transfer\Progress\MultiProgressTracker;
use Aws\S3\S3Transfer\Progress\SingleProgressTracker;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
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
     * @param S3TransferManagerConfig|null $config
     */
    public function __construct(
        ?S3ClientInterface $s3Client = null,
        ?S3TransferManagerConfig $config = null
    ) {
        $this->config = $config ?? S3TransferManagerConfig::fromArray([]);
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

        $config = $uploadRequest->getConfig();

        // Validate progress tracker
        $progressTracker = $uploadRequest->getProgressTracker();
        if ($progressTracker === null
            && ($config->getTrackProgress()
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
        $mupThreshold = $config->getMultipartUploadThresholdBytes()
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
            $uploadRequest->getPutObjectRequest()->toSingleObjectRequest(),
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
        $config = $uploadDirectoryRequest->getConfig();
        $progressTracker = $uploadDirectoryRequest->getProgressTracker();
        if ($progressTracker === null
            && ($config->getTrackProgress() ?? $this->config->isTrackProgress())) {
            $progressTracker = new MultiProgressTracker();
        }

        $filter = null;
        if ($config->getFilter() !== null) {
            $filter = $config->getFilter();
        }

        $putObjectRequestCallback = null;
        if ($config->getPutObjectRequestCallback() !== null) {
            $putObjectRequestCallback = $config->getPutObjectRequestCallback();
        }

        $failurePolicyCallback = null;
        if ($config->getFailurePolicy() !== null) {
            $failurePolicyCallback = $config->getFailurePolicy();
        }

        $sourceDirectory = $uploadDirectoryRequest->getSourceDirectory();
        $dirIterator = new RecursiveDirectoryIterator(
            $sourceDirectory
        );
        $dirIterator->setFlags(FilesystemIterator::SKIP_DOTS);
        if ($config->isFollowSymbolicLinks()) {
            $dirIterator->setFlags(FilesystemIterator::FOLLOW_SYMLINKS);
        }

        if ($config->isRecursive()) {
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

        $prefix = $config->getS3Prefix() ?? '';
        if ($prefix !== '' && !str_ends_with($prefix, '/')) {
            $prefix .= '/';
        }

        $delimiter = $config->getS3Delimiter();
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
            $putObjectRequestArgs = [
                ...$uploadDirectoryRequest->getPutObjectRequest()->toArray(),
                'Bucket' => $targetBucket,
                'Key' => $objectKey
            ];
            if ($putObjectRequestCallback !== null) {
                $putObjectRequestCallback($putObjectRequestArgs);
            }

            $promises[] = $this->upload(
                UploadRequest::fromLegacyArgs(
                    $file,
                    $putObjectRequestArgs,
                    $config->toArray(),
                    array_map(
                        function ($listener) { return clone $listener; },
                        $uploadDirectoryRequest->getListeners()
                    ),
                    $progressTracker
                )
            )->then(function (UploadResponse $response) use (&$objectsUploaded) {
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

        return Each::ofLimitAll($promises, $this->config['concurrency'])
            ->then(function ($_) use ($objectsUploaded, $objectsFailed) {
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
        $getObjectRequest = $downloadRequest->getGetObjectRequest();
        $config = [
            'response_checksum_validation_enabled' => false
        ];
        if (empty($getObjectRequest->getChecksumMode())) {
            $requestChecksumValidation =
                $downloadRequest->getConfig()->getRequestChecksumValidation()
                ?? $this->config->getRequestChecksumCalculation();

            if ($requestChecksumValidation === 'when_supported') {
                $config['response_checksum_validation_enabled'] = true;
            }
        } else {
            $config['response_checksum_validation_enabled'] = true;
        }

        $config['multipart_download_type'] = $downloadRequest->getConfig()
            ->getMultipartDownloadType() ?? $this->config->getMultipartDownloadType();

        $progressTracker = $downloadRequest->getProgressTracker();
        if ($progressTracker === null
            && ($downloadRequest->getConfig()->getTrackProgress()
                ?? $this->getConfig()->isTrackProgress())) {
            $progressTracker = new SingleProgressTracker();
        }

        $listeners = $downloadRequest->getListeners();
        if ($progressTracker !== null) {
            $listeners[] = $progressTracker;
        }

        // Build listener notifier for notifying listeners
        $listenerNotifier = new TransferListenerNotifier($listeners);

        // Assign source
        $getObjectRequestArray = $getObjectRequest->toArray();
        foreach ($sourceArgs as $key => $value) {
            $getObjectRequestArray[$key] = $value;
        }

        return $this->tryMultipartDownload(
            GetObjectRequest::fromArray($getObjectRequestArray),
            MultipartDownloaderConfig::fromArray($config),
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
        $config = $downloadDirectoryRequest->getConfig();
        if ($progressTracker === null
            && ($config->getTrackProgress() ?? $this->config->isTrackProgress())) {
            $progressTracker = new MultiProgressTracker();
        }

        $listArgs = [
            'Bucket' => $sourceBucket,
        ]  + ($config->getListObjectV2Args());
        $s3Prefix = $config->getEffectivePrefix();
        if ($s3Prefix !== null) {
            $listArgs['Prefix'] = $s3Prefix;
        }

        $listArgs['Delimiter'] = $listArgs['Delimiter'] ?? null;

        $objects = $this->s3Client
            ->getPaginator('ListObjectsV2', $listArgs)
            ->search('Contents[].Key');

        $filter = $config->getFilter();
        if ($filter !== null) {
            $objects = filter($objects, function (string $key) use ($filter) {
                return call_user_func($filter, $key) && !str_ends_with($key, "/");
            });
        } else {
            $objects = filter($objects, function (string $key) use ($filter) {
                return !str_ends_with($key, "/");
            });
        }

        $objects = map($objects, function (string $key) use ($sourceBucket) {
            return  self::formatAsS3URI($sourceBucket, $key);
        });
        $getObjectRequestCallback = null;
        if ($config->getGetObjectRequestCallback() !== null) {
            $getObjectRequestCallback = $config->getGetObjectRequestCallback();
        }

        $failurePolicyCallback = null;
        if ($config->getFailurePolicy() !== null) {
            $failurePolicyCallback = $config->getFailurePolicy();
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

            $requestArgs = $downloadDirectoryRequest->getGetObjectRequest()->toArray();
            foreach ($bucketAndKeyArray as $key => $value) {
                $requestArgs[$key] = $value;
            }
            if ($getObjectRequestCallback !== null) {
                call_user_func($getObjectRequestCallback, $requestArgs);
            }

            $promises[] = $this->downloadFile(
                new DownloadFileRequest(
                    $destinationFile,
                    $config->isFailsWhenDestinationExists(),
                    DownloadRequest::fromLegacyArgs(
                        null,
                        $requestArgs,
                        [
                            'target_part_size_bytes' => $config->getTargetPartSizeBytes() ?? 0,
                        ],
                        null,
                        array_map(
                            function ($listener) { return clone $listener; },
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
     * @param GetObjectRequest $getObjectRequest
     * @param MultipartDownloaderConfig $config
     * @param DownloadHandler $downloadHandler
     * @param TransferListenerNotifier|null $listenerNotifier
     *
     * @return PromiseInterface
     */
    private function tryMultipartDownload(
        GetObjectRequest $getObjectRequest,
        MultipartDownloaderConfig $config,
        DownloadHandler $downloadHandler,
        ?TransferListenerNotifier $listenerNotifier = null,
    ): PromiseInterface
    {
        $downloaderClassName = MultipartDownloader::chooseDownloaderClass(
            $config->getMultipartDownloadType()
        );
        $multipartDownloader = new $downloaderClassName(
            $this->s3Client,
            $getObjectRequest,
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
        string | StreamInterface $source,
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

                    return new UploadResponse(
                        PutObjectResponse::fromArray(
                            $result->toArray()
                        )->toSingleUploadResponse()
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
                return new UploadResponse($result->toArray());
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
            $uploadRequest->getPutObjectRequest(),
            MultipartUploaderConfig::fromArray(
                $uploadRequest->getConfig()->toArray()
            ),
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
            'region' => $this->config['region'],
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
