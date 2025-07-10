<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Progress\TransferListener;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;

class UploadRequest extends TransferRequest
{
    /** @var StreamInterface|string  */
    private StreamInterface | string $source;

    /** @var PutObjectRequest  */
    private PutObjectRequest $putObjectRequest;

    /** @var UploadRequestConfig */
    private UploadRequestConfig $config;

    /**
     * @param StreamInterface|string $source
     * @param PutObjectRequest $putObjectRequest
     * @param UploadRequestConfig $config
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     */
    public function __construct(
        StreamInterface|string $source,
        PutObjectRequest $putObjectRequest,
        UploadRequestConfig $config,
        array $listeners = [],
        ?TransferListener $progressTracker  = null
    ) {
        parent::__construct($listeners, $progressTracker);
        $this->source = $source;
        $this->putObjectRequest = $putObjectRequest;
        $this->config = $config;
    }

    /**
     * Get the source.
     *
     * @return StreamInterface|string
     */
    public function getSource(): StreamInterface|string
    {
        return $this->source;
    }

    /**
     * Get the put object request.
     *
     * @return PutObjectRequest
     */
    public function getPutObjectRequest(): PutObjectRequest
    {
        return $this->putObjectRequest;
    }

    public function getConfig(): UploadRequestConfig {
        return $this->config;
    }

    /**
     * Helper method for validating the given source.
     *
     * @return void
     */
    public function validateSource(): void
    {
        if (is_string($this->getSource()) && !is_readable($this->getSource())) {
            throw new InvalidArgumentException(
                "Please provide a valid readable file path or a valid stream as source."
            );
        }
    }

    /**
     * Helper method for validating required parameters.
     *
     * @param string|null $customMessage
     * @return void
     */
    public function validateRequiredParameters(
        ?string $customMessage = null
    ): void
    {
        $requiredParametersWithArgs = [
            'Bucket' => $this->getPutObjectRequest()->getBucket(),
            'Key' => $this->getPutObjectRequest()->getKey()
        ];
        foreach ($requiredParametersWithArgs as $key => $value) {
            if (empty($value)) {
                if ($customMessage !== null) {
                    throw new InvalidArgumentException($customMessage);
                }

                // Fallback to default error message
                throw new InvalidArgumentException(
                    "The `$key` parameter must be provided as part of the request arguments."
                );
            }
        }
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
     * - target_part_size_bytes: (int, optional) To override the default
     *   target part size in bytes.
     * - track_progress: (bool, optional) To override the default option for
     *   enabling progress tracking. If this option is resolved as true and
     *   a progressTracker parameter is not provided then, a default implementation
     *   will be resolved. This option is intended to make the operation to use
     *   a default progress tracker implementation when $progressTracker is null.
     * @param TransferListener[]|null $listeners
     * @param TransferListener|null $progressTracker
     *
     * @return UploadRequest
     */
    public static function fromLegacyArgs(string | StreamInterface $source,
                                     array $requestArgs = [],
                                     array $config = [],
                                     array $listeners = [],
                                     ?TransferListener $progressTracker = null): UploadRequest {
        return new UploadRequest(
            $source,
            PutObjectRequest::fromArray($requestArgs),
            UploadRequestConfig::fromArray($config),
            $listeners,
            $progressTracker
        );
    }
}