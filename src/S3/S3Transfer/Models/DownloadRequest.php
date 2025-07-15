<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\S3TransferManager;
use Aws\S3\S3Transfer\Utils\FileDownloadHandler;
use Aws\S3\S3Transfer\Utils\StreamDownloadHandler;

final class DownloadRequest extends TransferRequest
{
    /** @var string|array|null */
    private string|array|null $source;

    /** @var GetObjectRequest */
    private GetObjectRequest $getObjectRequest;

    /** @var DownloadRequestConfig */
    private DownloadRequestConfig $config;

    /** @var DownloadHandler|null */
    private ?DownloadHandler $downloadHandler;

    /**
     * @param string|array|null $source
     * @param GetObjectRequest $getObjectRequest
     * @param DownloadRequestConfig $config
     * @param DownloadHandler|null $downloadHandler
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     */
    public function __construct(
        string|array|null $source,
        GetObjectRequest $getObjectRequest,
        DownloadRequestConfig $config,
        ?DownloadHandler $downloadHandler,
        array $listeners = [],
        ?TransferListener $progressTracker  = null
    ) {
        parent::__construct($listeners, $progressTracker);
        $this->source = $source;
        $this->getObjectRequest = $getObjectRequest;
        $this->config = $config;
        if ($downloadHandler === null) {
            $downloadHandler = new StreamDownloadHandler();
        }
        $this->downloadHandler = $downloadHandler;
    }

    /**
     * @param string|array|null $source The object to be downloaded from S3.
     * It can be either a string with a S3 URI or an array with a Bucket and Key
     * properties set.
     * @param array $downloadRequestArgs The getObject request arguments to be provided as part
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
     * @param DownloadHandler|null $downloadHandler
     * @param TransferListener[]|null $listeners
     * @param TransferListener|null $progressTracker
     *
     * @return static
     */
    public static function fromLegacyArgs(
        string | array | null    $source,
        array             $downloadRequestArgs = [],
        array             $config = [],
        ?DownloadHandler $downloadHandler = null,
        array             $listeners = [],
        ?TransferListener $progressTracker = null,
    ): DownloadRequest
    {
        return new DownloadRequest(
            $source,
            GetObjectRequest::fromArray($downloadRequestArgs),
            DownloadRequestConfig::fromArray($config),
            $downloadHandler,
            $listeners,
            $progressTracker
        );
    }

    /**
     * @param DownloadRequest $downloadRequest
     * @param FileDownloadHandler $downloadHandler
     *
     * @return DownloadRequest
     */
    public static function fromDownloadRequestAndDownloadHandler(
        DownloadRequest $downloadRequest,
        FileDownloadHandler $downloadHandler
    ): DownloadRequest
    {
        return new DownloadRequest(
            $downloadRequest->getSource(),
            $downloadRequest->getGetObjectRequest(),
            $downloadRequest->getConfig(),
            $downloadHandler,
            $downloadRequest->getListeners(),
            $downloadRequest->getProgressTracker()
        );
    }

    /**
     * @return array|string|null
     */
    public function getSource(): array|string|null
    {
        return $this->source;
    }

    /**
     * @return GetObjectRequest
     */
    public function getGetObjectRequest(): GetObjectRequest
    {
        return $this->getObjectRequest;
    }

    /**
     * @return DownloadRequestConfig
     */
    public function getConfig(): DownloadRequestConfig
    {
        return $this->config;
    }

    /**
     * @return DownloadHandler
     */
    public function getDownloadHandler(): DownloadHandler {
        return $this->downloadHandler;
    }

    /**
     * Helper method to normalize the source as an array with:
     *  - Bucket
     *  - Key
     *
     * @return array
     */
    public function normalizeSourceAsArray(): array {
        // If source is null then fall back to getObjectRequest.
        $source = $this->getSource() ?? [
            'Bucket' => $this->getObjectRequest->getBucket(),
            'Key'    => $this->getObjectRequest->getKey(),
        ];
        if (is_string($source)) {
            $sourceAsArray = S3TransferManager::s3UriAsBucketAndKey($source);
        } elseif (is_array($source)) {
            $sourceAsArray = $source;
        } else {
            throw new S3TransferException(
                "Unsupported source type `" . gettype($source) . "`"
            );
        }

        foreach (['Bucket', 'Key'] as $reqKey) {
            if (empty($sourceAsArray[$reqKey])) {
                throw new \InvalidArgumentException(
                    "`$reqKey` is required but not provided in "
                    . implode(', ', array_keys($sourceAsArray)) . "."
                );
            }
        }

        return $sourceAsArray;
    }
}