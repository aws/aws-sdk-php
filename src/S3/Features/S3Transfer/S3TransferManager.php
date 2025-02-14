<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\Command;
use Aws\S3\Features\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use GuzzleHttp\Promise\Each;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use function Aws\filter;
use function Aws\map;

class S3TransferManager
{
    private static array $defaultConfig = [
        'targetPartSizeBytes' => 8 * 1024 * 1024,
        'multipartUploadThresholdBytes' => 16 * 1024 * 1024,
        'checksumValidationEnabled' => true,
        'checksumAlgorithm' => 'crc32',
        'multipartDownloadType' => 'partGet',
        'concurrency' => 5,
        'trackProgress' => false,
        'region' => 'us-east-1',
    ];

    private const MIN_PART_SIZE = 5 * 1024 * 1024;

    /** @var S3Client  */
    private S3ClientInterface $s3Client;

    /** @var array  */
    private array $config;

    /**
     * @param ?S3ClientInterface $s3Client
     * @param array $config
     * - targetPartSizeBytes: (int, default=(8388608 `8MB`)) \
     *   The minimum part size to be used in a multipart upload/download.
     * - multipartUploadThresholdBytes: (int, default=(16777216 `16 MB`)) \
     *   The threshold to decided whether a multipart upload is needed.
     * - checksumValidationEnabled: (bool, default=true) \
     *   To decide whether a checksum validation will be applied to the response.
     * - checksumAlgorithm: (string, default='crc32') \
     *   The checksum algorithm to be used in an upload request.
     * - multipartDownloadType: (string, default='partGet')
     *   The download type to be used in a multipart download.
     * - concurrency: (int, default=5) \
     *   Maximum number of concurrent operations allowed during a multipart
     *   upload/download.
     * - trackProgress: (bool, default=false) \
     *   To enable progress tracker in a multipart upload/download.
     * - progressTrackerFactory: (callable|TransferListenerFactory) \
     *   A factory to create the listener which will receive notifications
     *   based in the different stages an upload/download is.
     */
    public function __construct(?S3ClientInterface $s3Client, array $config = [])
    {
        if ($s3Client === null) {
            $this->s3Client = $this->defaultS3Client();
        } else {
            $this->s3Client = $s3Client;
        }

        $this->config = $config + self::$defaultConfig;
    }

    /**
     * @param string|array $source The object to be downloaded from S3.
     * It can be either a string with a S3 URI or an array with a Bucket and Key
     * properties set.
     * @param array $downloadArgs The getObject request arguments to be provided as part
     * of each get object operation, except for the bucket and key, which
     * are already provided as the source.
     * @param array $config The configuration to be used for this operation.
     *  - trackProgress: (bool) \
     *    Overrides the config option set in the transfer manager instantiation
     *    to decide whether transfer progress should be tracked. If a `progressListenerFactory`
     *    was not provided when the transfer manager instance was created
     *    and trackProgress resolved as true then, a default progress listener
     *    implementation will be used.
     *  - minimumPartSize: (int) \
     *    The minimum part size in bytes to be used in a range multipart download.
     * @param MultipartDownloadListener|null $downloadListener A multipart download
     * specific listener of the different states a multipart download can be.
     * @param TransferListener|null $progressTracker A transfer listener implementation
     * aimed to track the progress of a transfer. If not provided and trackProgress
     * is resolved as true then, the default progressTrackerFactory will be used.
     *
     * @return PromiseInterface
     */
    public function download(
        string | array $source,
        array $downloadArgs = [],
        array $config = [],
        ?MultipartDownloadListener $downloadListener = null,
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
            throw new \InvalidArgumentException('Source must be a string or an array of strings');
        }

        if ($progressTracker === null
            && ($config['trackProgress'] ?? $this->config['trackProgress'])) {
            $progressTracker = $this->resolveDefaultProgressTracker(
                DefaultProgressTracker::TRACKING_OPERATION_DOWNLOADING
            );
        }

        $requestArgs = $sourceArgs + $downloadArgs;
        if (empty($downloadArgs['PartNumber']) && empty($downloadArgs['Range'])) {
            return $this->tryMultipartDownload(
                $requestArgs,
                [
                    'minimumPartSize' => $config['minimumPartSize']
                        ?? 0
                ],
                $downloadListener,
                $progressTracker,
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
     * @param array $config The config options for this download directory operation. \
     *  - trackProgress: (bool) \
     *    Overrides the config option set in the transfer manager instantiation
     *    to decide whether transfer progress should be tracked. If a `progressListenerFactory`
     *    was not provided when the transfer manager instance was created
     *    and trackProgress resolved as true then, a default progress listener
     *    implementation will be used.
     *  - minimumPartSize: (int) \
     *    The minimum part size in bytes to be used in a range multipart download.
     *  - listObjectV2Args: (array) \
     *    The arguments to be included as part of the listObjectV2 request in
     *    order to fetch the objects to be downloaded. The most common arguments
     *    would be:
     *    - MaxKeys: (int) Sets the maximum number of keys returned in the response.
     *    - Prefix: (string) To limit the response to keys that begin with the
     *      specified prefix.
     *  - filter: (Closure)  \
     *    A callable which will receive an object key as parameter and should return
     *    true or false in order to determine whether the object should be downloaded.
     * @param MultipartDownloadListenerFactory|null $downloadListenerFactory
     * A factory of multipart download listeners `MultipartDownloadListenerFactory`
     * for listening to multipart download events.
     * @param TransferListener|null $progressTracker
     *
     * @return PromiseInterface
     */
    public function downloadDirectory(
        string $bucket,
        string $destinationDirectory,
        array $downloadArgs,
        array $config = [],
        ?MultipartDownloadListenerFactory $downloadListenerFactory = null,
        ?TransferListener $progressTracker = null,
    ): PromiseInterface
    {
        if (!file_exists($destinationDirectory)) {
            throw new \InvalidArgumentException(
                "Destination directory '$destinationDirectory' MUST exists."
            );
        }

        if ($progressTracker === null
            && ($config['trackProgress'] ?? $this->config['trackProgress'])) {
            $progressTracker = $this->resolveDefaultProgressTracker(
                DefaultProgressTracker::TRACKING_OPERATION_DOWNLOADING
            );
        }

        $listArgs = [
            'Bucket' => $bucket
        ]  + ($config['listObjectV2Args'] ?? []);
        $objects = $this->s3Client
            ->getPaginator('ListObjectsV2', $listArgs)
            ->search('Contents[].Key');
        $objects = map($objects, function (string $key) use ($bucket) {
            return  "s3://$bucket/$key";
        });
        if (isset($config['filter'])) {
            if (!is_callable($config['filter'])) {
                throw new \InvalidArgumentException("The parameter \$config['filter'] must be callable.");
            }

            $filter = $config['filter'];
            $objects = filter($objects, function (string $key) use ($filter) {
                return call_user_func($filter, $key);
            });
        }

        $promises = [];
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

            $downloadListener = null;
            if ($downloadListenerFactory !== null) {
                $downloadListener = $downloadListenerFactory();
            }

            $promises[] = $this->download(
                $object,
                $downloadArgs,
                [
                    'minimumPartSize' => $config['minimumPartSize'] ?? 0,
                ],
                $downloadListener,
                $progressTracker,
            )->then(function (DownloadResult $result) use ($destinationFile) {
                $directory = dirname($destinationFile);
                if (!is_dir($directory)) {
                    mkdir($directory, 0777, true);
                }

                file_put_contents($destinationFile, $result->getContent());
            });
        }

        return Each::ofLimitAll($promises, $this->config['concurrency']);
    }

    /**
     * @param string|StreamInterface $source
     * @param string $bucketTo
     * @param string $key
     * @param array $requestArgs
     * @param array $config The config options for this upload operation.
     * - mup_threshold: (int, optional) To override the default threshold
     * for when to use multipart upload.
     * - trackProgress: (bool, optional) To override the
     *
     * @param MultipartUploadListener|null $uploadListener
     * @param TransferListener|null $progressTracker
     *
     * @return PromiseInterface
     */
    public function upload(
        string | StreamInterface $source,
        string $bucketTo,
        string $key,
        array $requestArgs = [],
        array $config = [],
        ?MultipartUploadListener $uploadListener = null,
        ?TransferListener $progressTracker = null,
    ): PromiseInterface
    {
        if (is_string($source) && !is_readable($source)) {
            throw new \InvalidArgumentException("Please provide a valid readable file path or a valid stream.");
        }

        $mupThreshold = $config['mup_threshold'] ?? $this->config['multipartUploadThresholdBytes'];
        if ($mupThreshold < self::MIN_PART_SIZE) {
            throw new \InvalidArgumentException("\$config['mup_threshold'] must be greater than or equal to " . self::MIN_PART_SIZE);
        }

        if ($source instanceof StreamInterface) {
            $sourceSize = $source->getSize();
            $requestArgs['Body'] = $source;
        } else {
            $sourceSize = filesize($source);
            $requestArgs['SourceFile'] = $source;
        }

        $requestArgs['Bucket'] = $bucketTo;
        $requestArgs['Key'] = $key;
        $requestArgs['Size'] = $sourceSize;
        if ($progressTracker === null
            && ($config['trackProgress'] ?? $this->config['trackProgress'])) {
            $progressTracker = $this->resolveDefaultProgressTracker(
                DefaultProgressTracker::TRACKING_OPERATION_UPLOADING
            );
        }

        if ($sourceSize < $mupThreshold) {
            return $this->trySingleUpload(
                $requestArgs,
                $progressTracker
            )->then(function ($result) {
                $streams = get_resources("stream");

                echo "Open file handles:\n";
                foreach ($streams as $stream) {
                    $metadata = stream_get_meta_data($stream);
                    echo "\nFile: " . ($metadata['uri'] ?? "") . "\n";
                }

                return $result;
            });
        }

        throw new S3TransferException("Not implemented yet.");
    }

    /**
     * Tries an object multipart download.
     *
     * @param array $requestArgs
     * @param array $config
     *  - minimumPartSize: (int) \
     *    The minimum part size in bytes for a range multipart download. If
     *    this parameter is not provided then it fallbacks to the transfer
     *    manager `targetPartSizeBytes` config value.
     * @param MultipartDownloadListener|null $downloadListener
     * @param TransferListener|null $progressTracker
     *
     * @return PromiseInterface
     */
    private function tryMultipartDownload(
        array $requestArgs,
        array $config = [],
        ?MultipartDownloadListener $downloadListener = null,
        ?TransferListener $progressTracker = null,
    ): PromiseInterface
    {
        $multipartDownloader = MultipartDownloader::chooseDownloader(
            s3Client: $this->s3Client,
            multipartDownloadType: $this->config['multipartDownloadType'],
            requestArgs: $requestArgs,
            config: [
                'minimumPartSize' => max(
                    $config['minimumPartSize'] ?? 0,
                    $this->config['targetPartSizeBytes']
                )
            ],
            listener:  $downloadListener,
            progressTracker:  $progressTracker,
        );

        return $multipartDownloader->promise();
    }

    /**
     * Does a single object download.
     *
     * @param array $requestArgs
     * @param TransferListener|null $progressTracker
     *
     * @return PromiseInterface
     */
    private function trySingleDownload(
        array $requestArgs,
        ?TransferListener $progressTracker
    ): PromiseInterface
    {
        if ($progressTracker !== null) {
            $progressTracker->objectTransferInitiated($requestArgs['Key'], $requestArgs);
            $command = $this->s3Client->getCommand(
                MultipartDownloader::GET_OBJECT_COMMAND,
                $requestArgs
            );

            return $this->s3Client->executeAsync($command)->then(
                function ($result) use ($progressTracker, $requestArgs) {
                    // Notify progress
                    $progressTracker->objectTransferProgress(
                        $requestArgs['Key'],
                        $result['Content-Length'] ?? 0,
                        $result['Content-Length'] ?? 0,
                    );

                    // Notify Completion
                    $progressTracker->objectTransferCompleted(
                        $requestArgs['Key'],
                        $result['Content-Length'] ?? 0,
                    );

                    return new DownloadResult(
                        content: $result['Body'],
                        metadata: $result['@metadata'],
                    );
                }
            )->otherwise(function ($reason) use ($requestArgs, $progressTracker) {
                $progressTracker->objectTransferFailed(
                    $requestArgs['Key'],
                    0,
                    $reason->getMessage(),
                );

                return $reason;
            });
        }

        $command = $this->s3Client->getCommand(
            MultipartDownloader::GET_OBJECT_COMMAND,
            $requestArgs
        );

        return $this->s3Client->executeAsync($command)
            ->then(function ($result) {
                return new DownloadResult(
                    content: $result['Body'],
                    metadata: $result['@metadata'],
                );
            });
    }

    /**
     * @param array $requestArgs
     * @param TransferListener|null $progressTracker
     *
     * @return PromiseInterface
     */
    private function trySingleUpload(
        array $requestArgs,
        ?TransferListener $progressTracker  = null
    ): PromiseInterface {
        if ($progressTracker !== null) {
            $progressTracker->objectTransferInitiated(
                $requestArgs['Key'],
                $requestArgs
            );
            $command = $this->s3Client->getCommand('PutObject', $requestArgs);
            return $this->s3Client->executeAsync($command)->then(
                function ($result) use ($progressTracker, $requestArgs) {
                    $progressTracker->objectTransferProgress(
                        $requestArgs['Key'],
                        $requestArgs['Size'],
                        $requestArgs['Size'],
                    );

                    $progressTracker->objectTransferCompleted(
                        $requestArgs['Key'],
                        $requestArgs['Size'],
                    );

                    return $result;
                }
            )->otherwise(function ($reason) use ($requestArgs, $progressTracker) {
                $progressTracker->objectTransferFailed(
                    $requestArgs['Key'],
                    0,
                    $reason->getMessage()
                );

                return $reason;
            });
        }

        $command = $this->s3Client->getCommand('PutObject', $requestArgs);

        return $this->s3Client->executeAsync($command);
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
            throw new \InvalidArgumentException($message);
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
            throw new \InvalidArgumentException($errorMessage);
        }

        $path = substr($uri, 5); // without s3://
        $parts = explode('/', $path, 2);

        if (count($parts) < 2) {
            throw new \InvalidArgumentException($errorMessage);
        }

        return [
            'Bucket' => $parts[0],
            'Key' => $parts[1],
        ];
    }

    /**
     * Resolves the progress tracker to be used in the
     * transfer operation if `$trackProgress` is true.
     *
     * @param string $trackingOperation
     *
     * @return TransferListener|null
     */
    private function resolveDefaultProgressTracker(
        string $trackingOperation
    ): ?TransferListener
    {
        $progressTrackerFactory = $this->config['progressTrackerFactory'] ?? null;
        if ($progressTrackerFactory === null) {
            return (new DefaultProgressTracker(trackingOperation: $trackingOperation))->getTransferListener();
        }

        return $progressTrackerFactory([]);
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