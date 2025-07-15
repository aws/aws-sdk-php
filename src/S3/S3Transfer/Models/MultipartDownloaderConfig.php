<?php

namespace Aws\S3\S3Transfer\Models;

final class MultipartDownloaderConfig
{
    /** @var int */
    private int $targetPartSizeBytes;

    /** @var bool */
    private bool $responseChecksumValidationEnabled;

    /** @var string */
    private string $multipartDownloadType;

    /**
     * @param int $targetPartSizeBytes
     * @param bool $responseChecksumValidationEnabled
     * @param string $multipartDownloadType
     */
    public function __construct(
        int $targetPartSizeBytes,
        bool $responseChecksumValidationEnabled,
        string $multipartDownloadType
    ) {
        $this->targetPartSizeBytes = $targetPartSizeBytes;
        $this->responseChecksumValidationEnabled = $responseChecksumValidationEnabled;
        $this->multipartDownloadType = $multipartDownloadType;
    }

    /**
     * @param array $array
     *
     * @return MultipartDownloaderConfig
     */
    public static function fromArray(array $array): MultipartDownloaderConfig {
        return new self(
            $array['target_part_size_bytes']
            ?? S3TransferManagerConfig::DEFAULT_TARGET_PART_SIZE_BYTES,
            $array['response_checksum_validation_enabled']
            ?? true,
            $array['multipart_download_type']
            ?? S3TransferManagerConfig::DEFAULT_MULTIPART_DOWNLOAD_TYPE
        );
    }

    /**
     * @return int
     */
    public function getTargetPartSizeBytes(): int
    {
        return $this->targetPartSizeBytes;
    }

    /**
     * @return bool
     */
    public function getResponseChecksumValidationEnabled(): bool
    {
        return $this->responseChecksumValidationEnabled;
    }

    /**
     * @return string
     */
    public function getMultipartDownloadType(): string
    {
        return $this->multipartDownloadType;
    }

    /**
     * @return array
     */
    public function toArray(): array {
        return [
            'target_part_size_bytes' => $this->targetPartSizeBytes,
            'response_checksum_validation_enabled' => $this->responseChecksumValidationEnabled,
            'multipart_download_type' => $this->multipartDownloadType,
        ];
    }
}
