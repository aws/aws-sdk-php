<?php

namespace Aws\S3\S3Transfer\Models;

class DownloadRequestConfig extends TransferRequestConfig
{
    /** @var string|null */
    private ?string $multipartDownloadType;

    /** @var string|null */
    private ?string $requestChecksumValidation;

    /**
     * Override the default target part size in bytes
     *
     * @var int|null
     */
    private ?int $targetPartSizeBytes;

    /**
     * @param string|null $multipartDownloadType
     * @param string|null $requestChecksumValidation
     * @param int|null $targetPartSizeBytes
     * @param bool|null $trackProgress
     */
    public function __construct(
        ?string $multipartDownloadType,
        ?string $requestChecksumValidation,
        ?int $targetPartSizeBytes,
        ?bool $trackProgress
    ) {
        parent::__construct($trackProgress);
        $this->multipartDownloadType = $multipartDownloadType;
        $this->requestChecksumValidation = $requestChecksumValidation;
        $this->targetPartSizeBytes = $targetPartSizeBytes;
    }

    /**
     * Convert the DownloadRequestConfig instance to an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'multipart_download_type' => $this->multipartDownloadType,
            'request_checksum_validation' => $this->requestChecksumValidation,
            'target_part_size_bytes' => $this->targetPartSizeBytes,
            'track_progress' => $this->getTrackProgress(), // Assuming this getter exists in parent class
        ];
    }

    /**
     * Create a DownloadRequestConfig instance from an array
     *
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data): static
    {
        return new self(
            $data['multipart_download_type'] ?? null,
            $data['request_checksum_validation'] ?? null,
            $data['target_part_size_bytes'] ?? null,
            $data['track_progress'] ?? null
        );
    }

    /**
     * @return string|null
     */
    public function getMultipartDownloadType(): ?string
    {
        return $this->multipartDownloadType;
    }

    /**
     * @return string|null
     */
    public function getRequestChecksumValidation(): ?string
    {
        return $this->requestChecksumValidation;
    }

    /**
     * @return int|null
     */
    public function getTargetPartSizeBytes(): ?int
    {
        return $this->targetPartSizeBytes;
    }
}
