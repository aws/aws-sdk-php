<?php

namespace Aws\S3\S3Transfer\Models;

class MultipartUploaderConfig
{

    /** @var int */
    private int $targetPartSizeBytes;

    /** @var int */
    private int $concurrency;

    /** @var string */
    private string $requestChecksumCalculation;

    /**
     * @param int $targetPartSizeBytes
     * @param int $concurrency
     * @param string $requestChecksumCalculation
     */
    public function __construct(
        int $targetPartSizeBytes,
        int $concurrency,
        string $requestChecksumCalculation
    )
    {
        $this->targetPartSizeBytes = $targetPartSizeBytes;
        $this->concurrency = $concurrency;
        $this->requestChecksumCalculation = $requestChecksumCalculation;
    }

    /**
     * @return int
     */
    public function getTargetPartSizeBytes(): int {
        return $this->targetPartSizeBytes;
    }

    /**
     * @return int
     */
    public function getConcurrency(): int {
        return $this->concurrency;
    }

    /**
     * @return string
     */
    public function getRequestChecksumCalculation(): string {
        return $this->requestChecksumCalculation;
    }

    /**
     * Convert the configuration to an array
     *
     * @return array<string, int>
     */
    public function toArray(): array
    {
        return [
            'target_part_size_bytes' => $this->targetPartSizeBytes,
            'concurrency' => $this->concurrency,
            'request_checksum_calculation' => $this->requestChecksumCalculation,
        ];
    }

    /**
     * Create an MultipartUploaderConfig instance from an array
     *
     * @param array<string, int> $data Array containing configuration data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['target_part_size_bytes']
                ?? S3TransferManagerConfig::DEFAULT_TARGET_PART_SIZE_BYTES,
            $data['concurrency']
                ?? S3TransferManagerConfig::DEFAULT_CONCURRENCY,
            $data['request_checksum_calculation']
                ?? S3TransferManagerConfig::DEFAULT_REQUEST_CHECKSUM_CALCULATION
        );
    }
}