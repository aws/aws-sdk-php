<?php

namespace Aws\S3\S3Transfer;

use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadDirectoryResponse;
use Aws\S3\S3Transfer\Models\DownloadResponse;
use Aws\S3\S3Transfer\Models\UploadDirectoryResponse;
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
use Throwable;
use function Aws\filter;
use function Aws\map;

class S3TransferManager
{
    private static array $defaultConfig = [
        'target_part_size_bytes' => 8 * 1024 * 1024,
        'multipart_upload_threshold_bytes' => 16 * 1024 * 1024,
        'checksum_validation_enabled' => true,
        'checksum_algorithm' => 'crc32',
        'multipart_download_type' => 'partGet',
        'concurrency' => 5,
        'track_progress' => false,
        'region' => 'us-east-1',
    ];

    /** @var S3Client  */
    private S3ClientInterface $s3Client;

    /** @var array  */
    private array $config;

    /**
     * @param S3ClientInterface | null $s3Client If provided as null then,
     * a default client will be created where its region will be the one
     * resolved from either the default from the config or the provided.
     * @param array $config
     * - target_part_size_bytes: (int, default=(8388608 `8MB`))
     *   The minimum part size to be used in a multipart upload/download.
     * - multipart_upload_threshold_bytes: (int, default=(16777216 `16 MB`))
     *   The threshold to decided whether a multipart upload is needed.
     * - checksum_validation_enabled: (bool, default=true)
     *   To decide whether a checksum validation will be applied to the response.
     * - checksum_algorithm: (string, default='crc32')
     *   The checksum algorithm to be used in an upload request.
     * - multipart_download_type: (string, default='partGet')
     *   The download type to be used in a multipart download.
     * - concurrency: (int, default=5)
     *   Maximum number of concurrent operations allowed during a multipart
     *   upload/download.
     * - track_progress: (bool, default=false)
     *   To enable progress tracker in a multipart upload/download, and or
     *   a directory upload/download operation.
     * - region: (string, default="us-east-2")
     */
    public function __construct(
        ?S3ClientInterface $s3Client = null,
        array $config = []
    ) {
        $this->config = $config + self::$defaultConfig;
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
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param string|StreamInterface $source
     * @param array $requestArgs The putObject request arguments.
     * Required parameters would be:
     * - Bucket: (string, required)
     * - Key: (string, required)
     * @param array $config The config options for this upload operation.
     * - multipart_upload_threshold_bytes: (int, optional)
     *   To override the default threshold for when to use multipart upload.
     * - part_size: (int, optional) To override the default
     *   target part size in bytes.
     * - track_progress: (bool, optional) To override the default option for
     *   enabling progress tracking. If this option is resolved as true and
     *   a progressTracker parameter is not provided then, a default implementation
     *   will be resolved. This option is intended to make the operation to use
     *   a default progress tracker implementation when $progressTracker is null.
     * - checksum_algorithm: (bool, optional) To override the default
     *   checksum algorithm.
     * @param TransferListener[]|null $listeners
     * @param TransferListener|null $progressTracker
     *
     * @return PromiseInterface
     */
    public function upload(
        string | StreamInterface $source,
        array $requestArgs = [],
        array $config = [],
        array $listeners = [],
        ?TransferListener $progressTracker = null,
    ): PromiseInterface
    {
        // Make sure it is a valid in path in case of a string
        if (is_string($source) && !is_readable($source)) {
            throw new InvalidArgumentException(
                "Please provide a valid readable file path or a valid stream as source."
            );
        }
        // Valid required parameters
        foreach (['Bucket', 'Key'] as $reqParam) {
            $this->requireNonEmpty(
                $requestArgs[$reqParam] ?? null,
                "The `$reqParam` parameter must be provided as part of the request arguments."
            );
        }

        $mupThreshold = $config['multipart_upload_threshold_bytes']
            ?? $this->config['multipart_upload_threshold_bytes'];
        if ($mupThreshold < MultipartUploader::PART_MIN_SIZE) {
            throw new InvalidArgumentException(
                "The provided config `multipart_upload_threshold_bytes`"
                ."must be greater than or equal to " . MultipartUploader::PART_MIN_SIZE
            );
        }

        if (!isset($requestArgs['ChecksumAlgorithm'])) {
            $algorithm = $config['checksum_algorithm']
                ?? $this->config['checksum_algorithm'];
            $requestArgs['ChecksumAlgorithm'] = strtoupper($algorithm);
        }

        if ($progressTracker === null
            && ($config['track_progress'] ?? $this->config['track_progress'])) {
            $progressTracker = new SingleProgressTracker();
        }

        if ($progressTracker !== null) {
            $listeners[] = $progressTracker;
        }

        $listenerNotifier = new TransferListenerNotifier($listeners);
        if ($this->requiresMultipartUpload($source, $mupThreshold)) {
            return $this->tryMultipartUpload(
                $source,
                $requestArgs,
                [
                    'part_size' => $config['part_size'] ?? $this->config['target_part_size_bytes'],
                    'concurrency' => $this->config['concurrency'],
                ],
                $listenerNotifier
            );
        }

        return $this->trySingleUpload(
            $source,
            $requestArgs,
            $listenerNotifier
        );
    }

    /**
     * @param string $directory
     * @param string $bucketTo
     * @param array $requestArgs
     * @param array $config The config options for this request that are:
     * - follow_symbolic_links: (bool, optional, defaulted to false)
     * - recursive: (bool, optional, defaulted to false)
     * - s3_prefix: (string, optional, defaulted to null)
     * - filter: (Closure(SplFileInfo|string), optional)
     *   By default an instance of SplFileInfo will be provided, however
     *   you can annotate the parameter with a string type and by doing
     *   so you will get the full path of the file.
     * - s3_delimiter: (string, optional, defaulted to `/`)
     * - put_object_request_callback: (Closure, optional) A callback function
     *   to be invoked right before the request initiates and that will receive
     *   as parameter the request arguments for each upload request.
     * - failure_policy: (Closure, optional) A function that will be invoked
     *   on an upload failure and that will receive as parameters:
     *   - $requestArgs: (array) The arguments for the request that originated
     *        the failure.
     *   - $uploadDirectoryRequestArgs: (array) The arguments for the upload
     *     directory request.
     *   - $reason: (Throwable) The exception that originated the request failure.
     *   - $uploadDirectoryResponse: (UploadDirectoryResponse) The upload response
     *     to that point in the upload process.
     * - track_progress: (bool, optional) To override the default option for
     *   enabling progress tracking. If this option is resolved as true and
     *   a progressTracker parameter is not provided then, a default implementation
     *   will be resolved.
     * @param TransferListener[]|null $listeners The listeners for watching
     * transfer events. Each listener will be cloned per file upload.
     * @param TransferListener|null $progressTracker Ideally the progress
     * tracker implementation provided here should be able to track multiple
     * transfers at once. Please see MultiProgressTracker implementation.
 *
     * @return PromiseInterface
     */
    public function uploadDirectory(
        string $directory,
        string $bucketTo,
        array $requestArgs = [],
        array $config = [],
        array $listeners = [],
        ?TransferListener $progressTracker = null,
    ): PromiseInterface
    {
        if (!is_dir($directory)) {
            throw new InvalidArgumentException(
                "Please provide a valid directory path. "
                . "Provided = " . $directory
            );
        }

        if ($progressTracker === null
            && ($config['track_progress'] ?? $this->config['track_progress'])) {
            $progressTracker = new MultiProgressTracker();
        }

        $filter = null;
        if (isset($config['filter'])) {
            if (!is_callable($config['filter'])) {
                throw new InvalidArgumentException("The parameter \$config['filter'] must be callable.");
            }

            $filter = $config['filter'];
        }

        $putObjectRequestCallback = null;
        if (isset($config['put_object_request_callback'])) {
            if (!is_callable($config['put_object_request_callback'])) {
                throw new InvalidArgumentException(
                    "The parameter \$config['put_object_request_callback'] must be callable."
                );
            }

            $putObjectRequestCallback = $config['put_object_request_callback'];
        }

        $failurePolicyCallback = null;
        if (isset($config['failure_policy']) && !is_callable($config['failure_policy'])) {
            throw new InvalidArgumentException(
                "The parameter \$config['failure_policy'] must be callable."
            );
        } elseif (isset($config['failure_policy'])) {
            $failurePolicyCallback = $config['failure_policy'];
        }

        $dirIterator = new \RecursiveDirectoryIterator($directory);
        $dirIterator->setFlags(FilesystemIterator::SKIP_DOTS);
        if (($config['follow_symbolic_links'] ?? false) === true) {
            $dirIterator->setFlags(FilesystemIterator::FOLLOW_SYMLINKS);
        }

        if (($config['recursive'] ?? false) === true) {
            $dirIterator = new \RecursiveIteratorIterator($dirIterator);
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
            $baseDir = rtrim($directory, '/') . '/';
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
            $uploadRequestArgs = [
                ...$requestArgs,
                'Bucket' => $bucketTo,
                'Key' => $objectKey,
            ];
            if ($putObjectRequestCallback !== null) {
                $putObjectRequestCallback($uploadRequestArgs);
            }

            $promises[] = $this->upload(
                $file,
                $uploadRequestArgs,
                $config,
                array_map(function ($listener) { return clone $listener; }, $listeners),
                $progressTracker,
            )->then(function (UploadResponse $response) use (&$objectsUploaded) {
                $objectsUploaded++;

                return $response;
            })->otherwise(function ($reason) use (
                $failurePolicyCallback,
                $uploadRequestArgs,
                $requestArgs,
                &$objectsUploaded,
                &$objectsFailed
            ) {
                $objectsFailed++;
                if($failurePolicyCallback !== null) {
                    call_user_func(
                        $failurePolicyCallback,
                        $requestArgs,
                        $uploadRequestArgs,
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
     * @param string|array $source The object to be downloaded from S3.
     * It can be either a string with a S3 URI or an array with a Bucket and Key
     * properties set.
     * @param array $downloadArgs The getObject request arguments to be provided as part
     * of each get object operation, except for the bucket and key, which
     * are already provided as the source.
     * @param array $config The configuration to be used for this operation:
     *  - multipart_download_type: (string, optional)
     *    Overrides the resolved value from the transfer manager config.
     *  - checksum_validation_enabled: (bool, optional) Overrides the resolved
     *    value from transfer manager config for whether checksum validation
     *    should be done. This option will be considered just if ChecksumMode
     *    is not present in the request args.
     *  - track_progress: (bool) Overrides the config option set in the transfer
     *    manager instantiation to decide whether transfer progress should be
     *    tracked.
     *  - minimum_part_size: (int) The minimum part size in bytes to be used
     *    in a range multipart download. If this parameter is not provided
     *    then it fallbacks to the transfer manager `target_part_size_bytes`
     *    config value.
     * @param TransferListener[]|null $listeners
     * @param TransferListener|null $progressTracker
     *
     * @return PromiseInterface
     */
    public function download(
        string | array $source,
        array $downloadArgs = [],
        array $config = [],
        array $listeners = [],
        ?TransferListener $progressTracker = null,
    ): PromiseInterface
    {
        if (is_string($source)) {
            $sourceArgs = $this->s3UriAsBucketAndKey($source);
        } elseif (is_array($source)) {
            $sourceArgs = [
                'Bucket' => $this->requireNonEmpty($source['Bucket'], "A valid bucket must be provided."),
                'Key' => $this->requireNonEmpty($source['Key'], "A valid key must be provided."),
            ];
        } else {
            throw new InvalidArgumentException('Source must be a string or an array of strings');
        }

        if (!isset($requestArgs['ChecksumMode'])) {
            $checksumEnabled = $config['checksum_validation_enabled']
                ?? $this->config['checksum_validation_enabled']
                ?? false;
            if ($checksumEnabled) {
                $requestArgs['ChecksumMode'] = 'enabled';
            }
        }

        if ($progressTracker === null
            && ($config['track_progress'] ?? $this->config['track_progress'])) {
            $progressTracker = new SingleProgressTracker();
        }

        if ($progressTracker !== null) {
            $listeners[] = $progressTracker;
        }

        $listenerNotifier = new TransferListenerNotifier($listeners);
        $requestArgs = $sourceArgs + $downloadArgs;
        if (empty($downloadArgs['PartNumber']) && empty($downloadArgs['Range'])) {
            return $this->tryMultipartDownload(
                $requestArgs,
                [
                    'minimum_part_size' => $config['minimum_part_size']
                        ?? $this->config['target_part_size_bytes'],
                    'multipart_download_type' => $config['multipart_download_type']
                        ?? $this->config['multipart_download_type'],
                ],
                $listenerNotifier,
            );
        }

        return $this->trySingleDownload($requestArgs, $progressTracker);
    }

    /**
     * @param string $bucket The bucket from where the files are going to be
     * downloaded from.
     * @param string $destinationDirectory The destination path where the downloaded
     * files will be placed in.
     * @param array $downloadArgs The getObject request arguments to be provided
     * as part of each get object request sent to the service, except for the
     * bucket and key which will be resolved internally.
     * @param array $config The config options for this download directory operation.
     *  - s3_prefix: (string, optional) This parameter will be considered just if
     *    not provided as part of the list_object_v2_args config option.
     *  - s3_delimiter: (string, optional, defaulted to '/') This parameter will be
     *    considered just if not provided as part of the list_object_v2_args config
     *    option.
     *  - filter: (Closure, optional) A callable which will receive an object key as
     *    parameter and should return true or false in order to determine
     *    whether the object should be downloaded.
     *  - get_object_request_callback: (Closure, optional) A function that will
     *    be invoked right before the download request is performed and that will
     *    receive as parameter the request arguments for each request.
     *  - failure_policy: (Closure, optional) A function that will be invoked
     *    on a download failure and that will receive as parameters:
     *    - $requestArgs: (array) The arguments for the request that originated
     *      the failure.
     *    - $downloadDirectoryRequestArgs: (array) The arguments for the download
     *      directory request.
     *    - $reason: (Throwable) The exception that originated the request failure.
     *    - $downloadDirectoryResponse: (DownloadDirectoryResponse) The download response
     *      to that point in the upload process.
     *  - track_progress: (bool, optional) Overrides the config option set
     *    in the transfer manager instantiation to decide whether transfer
     *    progress should be tracked.
     *  - minimum_part_size: (int, optional) The minimum part size in bytes
     *    to be used in a range multipart download.
     *  - list_object_v2_args: (array, optional) The arguments to be included
     *    as part of the listObjectV2 request in order to fetch the objects to
     *    be downloaded. The most common arguments would be:
     *    - MaxKeys: (int) Sets the maximum number of keys returned in the response.
     *    - Prefix: (string) To limit the response to keys that begin with the
     *      specified prefix.
     * @param TransferListener[] $listeners The listeners for watching
     * transfer events. Each listener will be cloned per file upload.
     * @param TransferListener|null $progressTracker Ideally the progress
     * tracker implementation provided here should be able to track multiple
     * transfers at once. Please see MultiProgressTracker implementation.
     *
     * @return PromiseInterface
     */
    public function downloadDirectory(
        string $bucket,
        string $destinationDirectory,
        array $downloadArgs,
        array $config = [],
        array $listeners = [],
        ?TransferListener $progressTracker = null,
    ): PromiseInterface
    {
        if (!file_exists($destinationDirectory)) {
            throw new InvalidArgumentException(
                "Destination directory '$destinationDirectory' MUST exists."
            );
        }

        if ($progressTracker === null
            && ($config['track_progress'] ?? $this->config['track_progress'])) {
            $progressTracker = new MultiProgressTracker();
        }

        $listArgs = [
            'Bucket' => $bucket
        ]  + ($config['list_object_v2_args'] ?? []);
        if (isset($config['s3_prefix']) && !isset($listArgs['Prefix'])) {
            $listArgs['Prefix'] = $config['s3_prefix'];
        }

        if (isset($config['s3_delimiter']) && !isset($listArgs['Delimiter'])) {
            $listArgs['Delimiter'] = $config['s3_delimiter'];
        }

        $objects = $this->s3Client
            ->getPaginator('ListObjectsV2', $listArgs)
            ->search('Contents[].Key');
        $objects = map($objects, function (string $key) use ($bucket) {
            return  "s3://$bucket/$key";
        });
        if (isset($config['filter'])) {
            if (!is_callable($config['filter'])) {
                throw new InvalidArgumentException("The parameter \$config['filter'] must be callable.");
            }

            $filter = $config['filter'];
            $objects = filter($objects, function (string $key) use ($filter) {
                return call_user_func($filter, $key);
            });
        }

        $promises = [];
        $objectsDownloaded = 0;
        $objectsFailed = 0;
        foreach ($objects as $object) {
            $objectKey = $this->s3UriAsBucketAndKey($object)['Key'];
            $destinationFile = $destinationDirectory . '/' . $objectKey;
            if ($this->resolvesOutsideTargetDirectory($destinationFile, $objectKey)) {
                throw new S3TransferException(
                    "Cannot download key ' . $objectKey
                    . ', its relative path resolves outside the'
                    . ' parent directory"
                );
            }

            $requestArgs = [...$downloadArgs];
            if (isset($config['get_object_request_callback'])) {
                if (!is_callable($config['get_object_request_callback'])) {
                    throw new InvalidArgumentException(
                        "The parameter \$config['get_object_request_callback'] must be callable."
                    );
                }

                call_user_func($config['get_object_request_callback'], $requestArgs);
            }

            $promises[] = $this->download(
                $object,
                $requestArgs,
                [
                    'minimum_part_size' => $config['minimum_part_size'] ?? 0,
                ],
                array_map(function ($listener) { return clone $listener; }, $listeners),
                $progressTracker,
            )->then(function (DownloadResponse $result) use (
                &$objectsDownloaded,
                $destinationFile
            ) {
                $directory = dirname($destinationFile);
                if (!is_dir($directory)) {
                    mkdir($directory, 0777, true);
                }

                file_put_contents($destinationFile, $result->getData());
                // Close the stream
                $result->getData()->close();
                $objectsDownloaded++;
            })->otherwise(function ($reason) use (
                &$objectsDownloaded,
                &$objectsFailed,
                $downloadArgs,
                $requestArgs
            ) {
                $objectsFailed++;
                if (isset($config['failure_policy']) && is_callable($config['failure_policy'])) {
                    call_user_func(
                        $config['failure_policy'],
                        $requestArgs,
                        $downloadArgs,
                        $reason,
                        new DownloadDirectoryResponse(
                            $objectsDownloaded,
                            $objectsFailed
                        )
                    );
                }

                throw $reason;
            });
        }

        return Each::ofLimitAll($promises, $this->config['concurrency'])
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
     * @param array $requestArgs
     * @param array $config
     *  - minimum_part_size: (int) The minimum part size in bytes for a
     *    range multipart download.
     * @param TransferListenerNotifier|null $listenerNotifier
     *
     * @return PromiseInterface
     */
    private function tryMultipartDownload(
        array $requestArgs,
        array $config = [],
        ?TransferListenerNotifier $listenerNotifier = null,
    ): PromiseInterface
    {
        $downloaderClassName = MultipartDownloader::chooseDownloaderClass(
            $config['multipart_download_type']
        );
        $multipartDownloader = new $downloaderClassName(
            $this->s3Client,
            $requestArgs,
            $config,
            listenerNotifier: $listenerNotifier,
        );

        return $multipartDownloader->promise();
    }

    /**
     * Does a single object download.
     *
     * @param array $requestArgs
     * @param TransferListenerNotifier|null $listenerNotifier
     *
     * @return PromiseInterface
     */
    private function trySingleDownload(
        array $requestArgs,
        ?TransferListenerNotifier $listenerNotifier = null,
    ): PromiseInterface
    {
        if ($listenerNotifier !== null) {
            $listenerNotifier->transferInitiated([
                'request_args' => $requestArgs,
                'progress_snapshot' => new TransferProgressSnapshot(
                    $requestArgs['Key'],
                    0,
                    0
                )
            ]);
            $command = $this->s3Client->getCommand(
                MultipartDownloader::GET_OBJECT_COMMAND,
                $requestArgs
            );

            return $this->s3Client->executeAsync($command)->then(
                function ($result) use ($requestArgs, $listenerNotifier) {
                    // Notify progress
                    $progressContext = [
                        'request_args' => $requestArgs,
                        'progress_snapshot' => new TransferProgressSnapshot(
                            $requestArgs['Key'],
                            $result['Content-Length'] ?? 0,
                            $result['Content-Length'] ?? 0,
                            $result->toArray()
                        )
                    ];
                    $listenerNotifier->bytesTransferred($progressContext);
                    // Notify Completion
                    $listenerNotifier->transferComplete($progressContext);

                    return new DownloadResponse(
                        data: $result['Body'],
                        metadata: $result['@metadata'],
                    );
                }
            )->otherwise(function ($reason) use ($requestArgs, $listenerNotifier) {
                $listenerNotifier->transferFail([
                    'request_args' => $requestArgs,
                    'progress_snapshot' => new TransferProgressSnapshot(
                        $requestArgs['Key'],
                        0,
                        0,
                    ),
                    'reason' => $reason
                ]);

                throw $reason;
            });
        }

        $command = $this->s3Client->getCommand(
            MultipartDownloader::GET_OBJECT_COMMAND,
            $requestArgs
        );

        return $this->s3Client->executeAsync($command)
            ->then(function ($result) {
                return new DownloadResponse(
                    data: $result['Body'],
                    metadata: $result['@metadata'],
                );
            });
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
                    'request_args' => $requestArgs,
                    'progress_snapshot' => new TransferProgressSnapshot(
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
                            'request_args' => $requestArgs,
                            'progress_snapshot' => new TransferProgressSnapshot(
                                $requestArgs['Key'],
                                $objectSize,
                                $objectSize,
                            ),
                        ]
                    );

                    $listenerNotifier->transferComplete(
                        [
                            'request_args' => $requestArgs,
                            'progress_snapshot' => new TransferProgressSnapshot(
                                $requestArgs['Key'],
                                $objectSize,
                                $objectSize,
                                $result->toArray()
                            ),
                        ]
                    );

                    return new UploadResponse($result->toArray());
                }
            )->otherwise(function ($reason) use ($objectSize, $requestArgs, $listenerNotifier) {
                $listenerNotifier->transferFail(
                    [
                        'request_args' => $requestArgs,
                        'progress_snapshot' => new TransferProgressSnapshot(
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
     * @param string|StreamInterface $source
     * @param array $requestArgs
     * @param array $config
     * @param TransferListenerNotifier|null $listenerNotifier
     *
     * @return PromiseInterface
     */
    private function tryMultipartUpload(
        string | StreamInterface $source,
        array $requestArgs,
        array $config = [],
        ?TransferListenerNotifier $listenerNotifier = null,
    ): PromiseInterface {
        $createMultipartArgs = [...$requestArgs];
        return (new MultipartUploader(
            $this->s3Client,
            $createMultipartArgs,
            $config,
            $source,
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

        throw new S3TransferException("Unable to determine if a multipart is required");
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
     * Validates a provided value is not empty, and if so then
     * it throws an exception with the provided message.
     * @param mixed $value
     * @param string $message
     *
     * @return mixed
     */
    private function requireNonEmpty(mixed $value, string $message): mixed
    {
        if (empty($value)) {
            throw new InvalidArgumentException($message);
        }

        return $value;
    }

    /**
     * Validates a string value is a valid S3 URI.
     * Valid S3 URI Example: S3://mybucket.dev/myobject.txt
     *
     * @param string $uri
     *
     * @return bool
     */
    private function isValidS3URI(string $uri): bool
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
    private function s3UriAsBucketAndKey(string $uri): array
    {
        $errorMessage = "Invalid URI: $uri. A valid S3 URI must be s3://bucket/key";
        if (!$this->isValidS3URI($uri)) {
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
