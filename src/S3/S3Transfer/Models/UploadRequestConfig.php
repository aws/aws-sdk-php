<?php

namespace Aws\S3\S3Transfer\Models;

/**
 * Configuration class for upload operations
 */
class UploadRequestConfig extends TransferRequestConfig
{
    /**
     * Override the default threshold for when to use multipart upload
     *
     * @var int|null
     */
    private ?int $multipartUploadThresholdBytes;

    /**
     * Override the default target part size in bytes
     *
     * @var int|null
     */
    private ?int $targetPartSizeBytes;

    /** @var int|null */
    private ?int $concurrency;

    /** @var string|null */
    private ?string $requestChecksumCalculation;

    /**
     * Constructor
     *
     * @param int|null $multipartUploadThresholdBytes Override threshold for multipart upload
     * @param int|null $targetPartSizeBytes Override target part size in bytes
     * @param bool|null $trackProgress Override progress tracking option
     */
    public function __construct(
        ?int $multipartUploadThresholdBytes = null,
        ?int $targetPartSizeBytes = null,
        ?bool $trackProgress = null,
        ?int $concurrency = null,
        ?string $requestChecksumCalculation = null,
    ) {
        parent::__construct($trackProgress);
        $this->multipartUploadThresholdBytes = $multipartUploadThresholdBytes;
        $this->targetPartSizeBytes = $targetPartSizeBytes;
        $this->concurrency = $concurrency;
        $this->requestChecksumCalculation = $requestChecksumCalculation;
    }

    /**
     * Create an UploadConfig instance from an array
     *
     * @param array<string, mixed> $data Array containing configuration data
     *
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['multipart_upload_threshold_bytes'] ?? null,
            $data['target_part_size_bytes'] ?? null,
            $data['track_progress'] ?? null,
            $data['concurrency'] ?? null,
            $data['request_checksum_calculation'] ?? null,
        );
    }

    /**
     * Get the multipart upload threshold in bytes
     *
     * @return int|null
     */
    public function getMultipartUploadThresholdBytes(): ?int
    {
        return $this->multipartUploadThresholdBytes;
    }

    /**
     * Get the target part size in bytes
     *
     * @return int|null
     */
    public function getTargetPartSizeBytes(): ?int
    {
        return $this->targetPartSizeBytes;
    }

    /**
     * @return int|null
     */
    public function getConcurrency(): ?int
    {
        return $this->concurrency;
    }

    /**
     * @return string|null
     */
    public function getRequestChecksumCalculation(): ?string
    {
        return $this->requestChecksumCalculation;
    }

    /**
     * Convert the configuration to an array
     *
     * @return array<string, int|bool|null>
     */
    public function toArray(): array
    {
        return [
            'multipart_upload_threshold_bytes' => $this->multipartUploadThresholdBytes,
            'target_part_size_bytes' => $this->targetPartSizeBytes,
            'track_progress' => $this->trackProgress,
            'concurrency' => $this->concurrency,
            'request_checksum_calculation' => $this->requestChecksumCalculation,
        ];
    }
}