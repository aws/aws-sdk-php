<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;

class S3TransferManager
{
    use S3TransferManagerTrait;
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
     * - multipartDownloadThresholdBytes: (int, default=(16777216 `16 MB`)) \
     *   The threshold to decided whether a multipart download is needed.
     * - checksumValidationEnabled: (bool, default=true) \
     *   To decide whether a checksum validation will be applied to the response.
     * - checksumAlgorithm: (string, default='crc32') \
     *   The checksum algorithm to be used in an upload request.
     * - multipartDownloadType: (string, default='partGet')
     *   The download type to be used in a multipart download.
     * - concurrency: (int, default=5) \
     *   Maximum number of concurrent operations allowed during a multipart
     *   upload/download.
     * - trackProgress: (bool, default=true) \
     *   To enable progress tracker in a multipart upload/download.
     * - progressListenerFactory: (callable|TransferListenerFactory)
     *   A factory to create the listener which will receive notifications
     *   based in the different stages in an upload/download operation.
     */
    public function __construct(?S3ClientInterface $s3Client, array $config = []) {
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
     * @param array $downloadArgs The request arguments to be provided as part
     * of the service client operation.
     * @param array $config The configuration to be used for this operation.
     * - listener: (null|MultipartDownloadListener) \
     *   A listener to be notified in every stage of a multipart download operation.
     * - trackProgress: (bool) \
     *   Overrides the config option set in the transfer manager instantiation
     *   to decide whether transfer progress should be tracked. If not
     *   transfer tracker factory is provided and trackProgress is true then,
     *   the default progress listener implementation will be used.
     *
     * @return PromiseInterface
     */
    public function download(
        string | array $source,
        array $downloadArgs,
        array $config = []
    ): PromiseInterface {
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

        $requestArgs = $sourceArgs + $downloadArgs;
        if (empty($downloadArgs['PartNumber']) && empty($downloadArgs['Range'])) {
            return $this->tryMultipartDownload($requestArgs, $config);
        }

        return $this->trySingleDownload($requestArgs);
    }

    /**
     * Tries an object multipart download.
     *
     * @param array $requestArgs
     * @param array $config
     * - listener: (?MultipartDownloadListener) \
     *   A multipart download listener for watching every multipart download
     *   stage.
     *
     * @return PromiseInterface
     */
    private function tryMultipartDownload(
        array $requestArgs,
        array $config
    ): PromiseInterface {
        $trackProgress = $config['trackProgress']
            ?? $this->config['trackProgress']
            ?? false;
        $progressListenerFactory = $this->config['progressListenerFactory'] ?? null;
        $progressListener = null;
        if ($trackProgress) {
            if ($progressListenerFactory !== null) {
                $progressListener = $progressListenerFactory();
            } else {
                $progressListener = new DefaultProgressTracker();
            }
        }
        $multipartDownloader = MultipartDownloader::chooseDownloader(
            $this->s3Client,
            $this->config['multipartDownloadType'],
            $requestArgs,
            $this->config,
            $config['listener'] ?? null,
            $progressListener?->getTransferListener()
        );

        return $multipartDownloader->promise();
    }

    /**
     * Does a single object download.
     *
     * @param $requestArgs
     *
     * @return PromiseInterface
     */
    private function trySingleDownload($requestArgs): PromiseInterface {
        $command = $this->s3Client->getCommand(MultipartDownloader::GET_OBJECT_COMMAND, $requestArgs);

        return $this->s3Client->executeAsync($requestArgs);
    }
}