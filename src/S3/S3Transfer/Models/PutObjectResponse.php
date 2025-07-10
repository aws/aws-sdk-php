<?php

namespace Aws\S3\S3Transfer\Models;

class PutObjectResponse
{
    /** @var bool|null */
    private ?bool $bucketKeyEnabled;

    /** @var string|null */
    private ?string $checksumCRC32;

    /** @var string|null */
    private ?string $checksumCRC32C;

    /** @var string|null */
    private ?string $checksumCRC64NVME;

    /** @var string|null */
    private ?string $checksumSHA1;

    /** @var string|null */
    private ?string $checksumSHA256;

    /** @var string|null */
    private ?string $checksumType;

    /** @var string|null */
    private ?string $eTag;

    /** @var string|null */
    private ?string $expiration;

    /** @var string|null */
    private ?string $requestCharged;

    /** @var string|null */
    private ?string $sseCustomerAlgorithm;

    /** @var string|null */
    private ?string $sseCustomerKeyMD5;

    /** @var string|null */
    private ?string $ssekmsEncryptionContext;

    /** @var string|null */
    private ?string $ssekmsKeyId;

    /** @var string|null */
    private ?string $serverSideEncryption;

    /** @var int|null */
    private ?int $size;

    /** @var string|null */
    private ?string $versionId;

    public function __construct(
        ?bool $bucketKeyEnabled,
        ?string $checksumCRC32,
        ?string $checksumCRC32C,
        ?string $checksumCRC64NVME,
        ?string $checksumSHA1,
        ?string $checksumSHA256,
        ?string $checksumType,
        ?string $eTag,
        ?string $expiration,
        ?string $requestCharged,
        ?string $sseCustomerAlgorithm,
        ?string $sseCustomerKeyMD5,
        ?string $ssekmsEncryptionContext,
        ?string $ssekmsKeyId,
        ?string $serverSideEncryption,
        ?int $size,
        ?string $versionId
    ) {
        $this->bucketKeyEnabled = $bucketKeyEnabled;
        $this->checksumCRC32 = $checksumCRC32;
        $this->checksumCRC32C = $checksumCRC32C;
        $this->checksumCRC64NVME = $checksumCRC64NVME;
        $this->checksumSHA1 = $checksumSHA1;
        $this->checksumSHA256 = $checksumSHA256;
        $this->checksumType = $checksumType;
        $this->eTag = $eTag;
        $this->expiration = $expiration;
        $this->requestCharged = $requestCharged;
        $this->sseCustomerAlgorithm = $sseCustomerAlgorithm;
        $this->sseCustomerKeyMD5 = $sseCustomerKeyMD5;
        $this->ssekmsEncryptionContext = $ssekmsEncryptionContext;
        $this->ssekmsKeyId = $ssekmsKeyId;
        $this->serverSideEncryption = $serverSideEncryption;
        $this->size = $size;
        $this->versionId = $versionId;
    }

    /**
     * @return bool|null
     */
    public function getBucketKeyEnabled(): ?bool
    {
        return $this->bucketKeyEnabled;
    }

    /**
     * @return string|null
     */
    public function getChecksumCRC32(): ?string
    {
        return $this->checksumCRC32;
    }

    /**
     * @return string|null
     */
    public function getChecksumCRC32C(): ?string
    {
        return $this->checksumCRC32C;
    }

    /**
     * @return string|null
     */
    public function getChecksumCRC64NVME(): ?string
    {
        return $this->checksumCRC64NVME;
    }

    /**
     * @return string|null
     */
    public function getChecksumSHA1(): ?string
    {
        return $this->checksumSHA1;
    }

    /**
     * @return string|null
     */
    public function getChecksumSHA256(): ?string
    {
        return $this->checksumSHA256;
    }

    /**
     * @return string|null
     */
    public function getChecksumType(): ?string
    {
        return $this->checksumType;
    }

    /**
     * @return string|null
     */
    public function getETag(): ?string
    {
        return $this->eTag;
    }

    /**
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }

    /**
     * @return string|null
     */
    public function getRequestCharged(): ?string
    {
        return $this->requestCharged;
    }

    /**
     * @return string|null
     */
    public function getSseCustomerAlgorithm(): ?string
    {
        return $this->sseCustomerAlgorithm;
    }

    /**
     * @return string|null
     */
    public function getSseCustomerKeyMD5(): ?string
    {
        return $this->sseCustomerKeyMD5;
    }

    /**
     * @return string|null
     */
    public function getSsekmsEncryptionContext(): ?string
    {
        return $this->ssekmsEncryptionContext;
    }

    /**
     * @return string|null
     */
    public function getSsekmsKeyId(): ?string
    {
        return $this->ssekmsKeyId;
    }

    /**
     * @return string|null
     */
    public function getServerSideEncryption(): ?string
    {
        return $this->serverSideEncryption;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @return string|null
     */
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }

    /**
     * Convert the object to an array format suitable for multipart upload response
     *
     * @return array Array containing AWS S3 response fields with their corresponding values
     */
    public function toMultipartUploadResponse(): array {
        return [
            'BucketKeyEnabled' => $this->bucketKeyEnabled,
            'ChecksumCRC32' => $this->checksumCRC32,
            'ChecksumCRC32C' => $this->checksumCRC32C,
            'ChecksumCRC64NVME' => $this->checksumCRC64NVME,
            'ChecksumSHA1' => $this->checksumSHA1,
            'ChecksumSHA256' => $this->checksumSHA256,
            'ChecksumType' => $this->checksumType,
            'ETag' => $this->eTag,
            'Expiration' => $this->expiration,
            'RequestCharged' => $this->requestCharged,
            'SSEKMSKeyId' => $this->ssekmsKeyId,
            'ServerSideEncryption' => $this->serverSideEncryption,
            'VersionId' => $this->versionId
        ];
    }

    /**
     * Convert the object to an array format suitable for single upload response
     *
     * @return array Array containing AWS S3 response fields with their corresponding values
     */
    public function toSingleUploadResponse(): array {
        return [
            'BucketKeyEnabled' => $this->bucketKeyEnabled,
            'ChecksumCRC32' => $this->checksumCRC32,
            'ChecksumCRC32C' => $this->checksumCRC32C,
            'ChecksumCRC64NVME' => $this->checksumCRC64NVME,
            'ChecksumSHA1' => $this->checksumSHA1,
            'ChecksumSHA256' => $this->checksumSHA256,
            'ChecksumType' => $this->checksumType,
            'ETag' => $this->eTag,
            'Expiration' => $this->expiration,
            'RequestCharged' => $this->requestCharged,
            'SSECustomerAlgorithm' => $this->sseCustomerAlgorithm,
            'SSECustomerKeyMD5' => $this->sseCustomerKeyMD5,
            'SSEKMSEncryptionContext' => $this->ssekmsEncryptionContext,
            'SSEKMSKeyId' => $this->ssekmsKeyId,
            'ServerSideEncryption' => $this->serverSideEncryption,
            'Size' => $this->size,
            'VersionId' => $this->versionId
        ];
    }

    /**
     * Create an instance from an array of data
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['BucketKeyEnabled'] ?? null,
            $data['ChecksumCRC32'] ?? null,
            $data['ChecksumCRC32C'] ?? null,
            $data['ChecksumCRC64NVME'] ?? null,
            $data['ChecksumSHA1'] ?? null,
            $data['ChecksumSHA256'] ?? null,
            $data['ChecksumType'] ?? null,
            $data['ETag'] ?? null,
            $data['Expiration'] ?? null,
            $data['RequestCharged'] ?? null,
            $data['SSECustomerAlgorithm'] ?? null,
            $data['SSECustomerKeyMD5'] ?? null,
            $data['SSEKMSEncryptionContext'] ?? null,
            $data['SSEKMSKeyId'] ?? null,
            $data['ServerSideEncryption'] ?? null,
            $data['Size'] ?? null,
            $data['VersionId'] ?? null
        );
    }
}