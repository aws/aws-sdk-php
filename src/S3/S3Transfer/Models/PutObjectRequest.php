<?php

namespace Aws\S3\S3Transfer\Models;

class PutObjectRequest
{
    /** @var string|null */
    private ?string $acl;

    /** @var string|null */
    private ?string $bucket;

    /** @var bool|null */
    private ?bool $bucketKeyEnabled;

    /** @var string|null */
    private ?string $cacheControl;

    /** @var string|null */
    private ?string $checksumAlgorithm;

    /** @var string|null */
    private ?string $contentDisposition;

    /** @var string|null */
    private ?string $contentEncoding;

    /** @var string|null */
    private ?string $contentLanguage;

    /** @var string|null */
    private ?string $contentType;

    /** @var string|null */
    private ?string $expectedBucketOwner;

    /** @var string|null */
    private ?string $expires;

    /** @var string|null */
    private ?string $grantFullControl;

    /** @var string|null */
    private ?string $grantRead;

    /** @var string|null */
    private ?string $grantReadACP;

    /** @var string|null */
    private ?string $grantWriteACP;

    /** @var string|null */
    private ?string $key;

    /** @var string|null */
    private ?string $metadata;

    /** @var string|null */
    private ?string $objectLockLegalHoldStatus;

    /** @var string|null */
    private ?string $objectLockMode;

    /** @var string|null */
    private ?string $objectLockRetainUntilDate;

    /** @var string|null */
    private ?string $requestPayer;

    /** @var string|null */
    private ?string $sseCustomerAlgorithm;

    /** @var string|null */
    private ?string $sseCustomerKey;

    /** @var string|null */
    private ?string $sseCustomerKeyMD5;

    /** @var string|null */
    private ?string $ssekmsEncryptionContext;

    /** @var string|null */
    private ?string $ssekmsKeyId;

    /** @var string|null */
    private ?string $serverSideEncryption;

    /** @var string|null */
    private ?string $storageClass;

    /** @var string|null */
    private ?string $tagging;

    /** @var string|null */
    private ?string $websiteRedirectLocation;

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
    private ?string $ifMatch;

    /** @var string|null */
    private ?string $ifNoneMatch;

    /**
     * @param string|null $acl
     * @param string|null $bucket
     * @param bool|null $bucketKeyEnabled
     * @param string|null $cacheControl
     * @param string|null $checksumAlgorithm
     * @param string|null $contentDisposition
     * @param string|null $contentEncoding
     * @param string|null $contentLanguage
     * @param string|null $contentType
     * @param string|null $expectedBucketOwner
     * @param string|null $expires
     * @param string|null $grantFullControl
     * @param string|null $grantRead
     * @param string|null $grantReadACP
     * @param string|null $grantWriteACP
     * @param string|null $key
     * @param string|null $metadata
     * @param string|null $objectLockLegalHoldStatus
     * @param string|null $objectLockMode
     * @param string|null $objectLockRetainUntilDate
     * @param string|null $requestPayer
     * @param string|null $sseCustomerAlgorithm
     * @param string|null $sseCustomerKey
     * @param string|null $sseCustomerKeyMD5
     * @param string|null $ssekmsEncryptionContext
     * @param string|null $ssekmsKeyId
     * @param string|null $serverSideEncryption
     * @param string|null $storageClass
     * @param string|null $tagging
     * @param string|null $websiteRedirectLocation
     * @param string|null $checksumCRC32
     * @param string|null $checksumCRC32C
     * @param string|null $checksumCRC64NVME
     * @param string|null $checksumSHA1
     * @param string|null $checksumSHA256
     * @param string|null $ifMatch
     * @param string|null $ifNoneMatch
     */
    public function __construct(
        ?string $acl,
        ?string $bucket,
        ?bool   $bucketKeyEnabled,
        ?string $cacheControl,
        ?string $checksumAlgorithm,
        ?string $contentDisposition,
        ?string $contentEncoding,
        ?string $contentLanguage,
        ?string $contentType,
        ?string $expectedBucketOwner,
        ?string $expires,
        ?string $grantFullControl,
        ?string $grantRead,
        ?string $grantReadACP,
        ?string $grantWriteACP,
        ?string $key,
        ?string $metadata,
        ?string $objectLockLegalHoldStatus,
        ?string $objectLockMode,
        ?string $objectLockRetainUntilDate,
        ?string $requestPayer,
        ?string $sseCustomerAlgorithm,
        ?string $sseCustomerKey,
        ?string $sseCustomerKeyMD5,
        ?string $ssekmsEncryptionContext,
        ?string $ssekmsKeyId,
        ?string $serverSideEncryption,
        ?string $storageClass,
        ?string $tagging,
        ?string $websiteRedirectLocation,
        ?string $checksumCRC32,
        ?string $checksumCRC32C,
        ?string $checksumCRC64NVME,
        ?string $checksumSHA1,
        ?string $checksumSHA256,
        ?string $ifMatch,
        ?string $ifNoneMatch
    )
    {
        $this->acl = $acl;
        $this->bucket = $bucket;
        $this->bucketKeyEnabled = $bucketKeyEnabled;
        $this->cacheControl = $cacheControl;
        $this->checksumAlgorithm = $checksumAlgorithm;
        $this->contentDisposition = $contentDisposition;
        $this->contentEncoding = $contentEncoding;
        $this->contentLanguage = $contentLanguage;
        $this->contentType = $contentType;
        $this->expectedBucketOwner = $expectedBucketOwner;
        $this->expires = $expires;
        $this->grantFullControl = $grantFullControl;
        $this->grantRead = $grantRead;
        $this->grantReadACP = $grantReadACP;
        $this->grantWriteACP = $grantWriteACP;
        $this->key = $key;
        $this->metadata = $metadata;
        $this->objectLockLegalHoldStatus = $objectLockLegalHoldStatus;
        $this->objectLockMode = $objectLockMode;
        $this->objectLockRetainUntilDate = $objectLockRetainUntilDate;
        $this->requestPayer = $requestPayer;
        $this->sseCustomerAlgorithm = $sseCustomerAlgorithm;
        $this->sseCustomerKey = $sseCustomerKey;
        $this->sseCustomerKeyMD5 = $sseCustomerKeyMD5;
        $this->ssekmsEncryptionContext = $ssekmsEncryptionContext;
        $this->ssekmsKeyId = $ssekmsKeyId;
        $this->serverSideEncryption = $serverSideEncryption;
        $this->storageClass = $storageClass;
        $this->tagging = $tagging;
        $this->websiteRedirectLocation = $websiteRedirectLocation;
        $this->checksumCRC32 = $checksumCRC32;
        $this->checksumCRC32C = $checksumCRC32C;
        $this->checksumCRC64NVME = $checksumCRC64NVME;
        $this->checksumSHA1 = $checksumSHA1;
        $this->checksumSHA256 = $checksumSHA256;
        $this->ifMatch = $ifMatch;
        $this->ifNoneMatch = $ifNoneMatch;
    }

    /**
     * @return string|null
     */
    public function getAcl(): ?string
    {
        return $this->acl;
    }

    /**
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
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
    public function getCacheControl(): ?string
    {
        return $this->cacheControl;
    }

    /**
     * @return string|null
     */
    public function getChecksumAlgorithm(): ?string
    {
        return $this->checksumAlgorithm;
    }

    /**
     * @return string|null
     */
    public function getContentDisposition(): ?string
    {
        return $this->contentDisposition;
    }

    /**
     * @return string|null
     */
    public function getContentEncoding(): ?string
    {
        return $this->contentEncoding;
    }

    /**
     * @return string|null
     */
    public function getContentLanguage(): ?string
    {
        return $this->contentLanguage;
    }

    /**
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @return string|null
     */
    public function getExpectedBucketOwner(): ?string
    {
        return $this->expectedBucketOwner;
    }

    /**
     * @return string|null
     */
    public function getExpires(): ?string
    {
        return $this->expires;
    }

    /**
     * @return string|null
     */
    public function getGrantFullControl(): ?string
    {
        return $this->grantFullControl;
    }

    /**
     * @return string|null
     */
    public function getGrantRead(): ?string
    {
        return $this->grantRead;
    }

    /**
     * @return string|null
     */
    public function getGrantReadACP(): ?string
    {
        return $this->grantReadACP;
    }

    /**
     * @return string|null
     */
    public function getGrantWriteACP(): ?string
    {
        return $this->grantWriteACP;
    }

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @return string|null
     */
    public function getMetadata(): ?string
    {
        return $this->metadata;
    }

    /**
     * @return string|null
     */
    public function getObjectLockLegalHoldStatus(): ?string
    {
        return $this->objectLockLegalHoldStatus;
    }

    /**
     * @return string|null
     */
    public function getObjectLockMode(): ?string
    {
        return $this->objectLockMode;
    }

    /**
     * @return string|null
     */
    public function getObjectLockRetainUntilDate(): ?string
    {
        return $this->objectLockRetainUntilDate;
    }

    /**
     * @return string|null
     */
    public function getRequestPayer(): ?string
    {
        return $this->requestPayer;
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
    public function getSseCustomerKey(): ?string
    {
        return $this->sseCustomerKey;
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
     * @return string|null
     */
    public function getStorageClass(): ?string
    {
        return $this->storageClass;
    }

    /**
     * @return string|null
     */
    public function getTagging(): ?string
    {
        return $this->tagging;
    }

    /**
     * @return string|null
     */
    public function getWebsiteRedirectLocation(): ?string
    {
        return $this->websiteRedirectLocation;
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
    public function getIfMatch(): ?string
    {
        return $this->ifMatch;
    }

    /**
     * @return string|null
     */
    public function getIfNoneMatch(): ?string
    {
        return $this->ifNoneMatch;
    }

    /**
     * Convert to single object request array
     *
     * @return array
     */
    public function toSingleObjectRequest(): array
    {
        $requestArgs = [];

        if ($this->bucket !== null) {
            $requestArgs['Bucket'] = $this->bucket;
        }

        if ($this->checksumAlgorithm !== null) {
            $requestArgs['ChecksumAlgorithm'] = $this->checksumAlgorithm;
        }

        if ($this->checksumCRC32 !== null) {
            $requestArgs['ChecksumCRC32'] = $this->checksumCRC32;
        }

        if ($this->checksumCRC32C !== null) {
            $requestArgs['ChecksumCRC32C'] = $this->checksumCRC32C;
        }

        if ($this->checksumCRC64NVME !== null) {
            $requestArgs['ChecksumCRC64NVME'] = $this->checksumCRC64NVME;
        }

        if ($this->checksumSHA1 !== null) {
            $requestArgs['ChecksumSHA1'] = $this->checksumSHA1;
        }

        if ($this->checksumSHA256 !== null) {
            $requestArgs['ChecksumSHA256'] = $this->checksumSHA256;
        }

        if ($this->expectedBucketOwner !== null) {
            $requestArgs['ExpectedBucketOwner'] = $this->expectedBucketOwner;
        }

        if ($this->key !== null) {
            $requestArgs['Key'] = $this->key;
        }

        if ($this->requestPayer !== null) {
            $requestArgs['RequestPayer'] = $this->requestPayer;
        }

        if ($this->sseCustomerAlgorithm !== null) {
            $requestArgs['SSECustomerAlgorithm'] = $this->sseCustomerAlgorithm;
        }

        if ($this->sseCustomerKey !== null) {
            $requestArgs['SSECustomerKey'] = $this->sseCustomerKey;
        }

        if ($this->sseCustomerKeyMD5 !== null) {
            $requestArgs['SSECustomerKeyMD5'] = $this->sseCustomerKeyMD5;
        }

        return $requestArgs;
    }

    /**
     * Convert to create multipart request array
     *
     * @return array
     */
    public function toCreateMultipartRequest(): array
    {
        $requestArgs = [];

        if ($this->acl !== null) {
            $requestArgs['ACL'] = $this->acl;
        }

        if ($this->bucket !== null) {
            $requestArgs['Bucket'] = $this->bucket;
        }

        if ($this->bucketKeyEnabled !== null) {
            $requestArgs['BucketKeyEnabled'] = $this->bucketKeyEnabled;
        }

        if ($this->cacheControl !== null) {
            $requestArgs['CacheControl'] = $this->cacheControl;
        }

        if ($this->checksumAlgorithm !== null) {
            $requestArgs['ChecksumAlgorithm'] = $this->checksumAlgorithm;
        }

        if ($this->contentDisposition !== null) {
            $requestArgs['ContentDisposition'] = $this->contentDisposition;
        }

        if ($this->contentEncoding !== null) {
            $requestArgs['ContentEncoding'] = $this->contentEncoding;
        }

        if ($this->contentLanguage !== null) {
            $requestArgs['ContentLanguage'] = $this->contentLanguage;
        }

        if ($this->contentType !== null) {
            $requestArgs['ContentType'] = $this->contentType;
        }

        if ($this->expectedBucketOwner !== null) {
            $requestArgs['ExpectedBucketOwner'] = $this->expectedBucketOwner;
        }

        if ($this->expires !== null) {
            $requestArgs['Expires'] = $this->expires;
        }

        if ($this->grantFullControl !== null) {
            $requestArgs['GrantFullControl'] = $this->grantFullControl;
        }

        if ($this->grantRead !== null) {
            $requestArgs['GrantRead'] = $this->grantRead;
        }

        if ($this->grantReadACP !== null) {
            $requestArgs['GrantReadACP'] = $this->grantReadACP;
        }

        if ($this->grantWriteACP !== null) {
            $requestArgs['GrantWriteACP'] = $this->grantWriteACP;
        }

        if ($this->key !== null) {
            $requestArgs['Key'] = $this->key;
        }

        if ($this->metadata !== null) {
            $requestArgs['Metadata'] = $this->metadata;
        }

        if ($this->objectLockLegalHoldStatus !== null) {
            $requestArgs['ObjectLockLegalHoldStatus'] = $this->objectLockLegalHoldStatus;
        }

        if ($this->objectLockMode !== null) {
            $requestArgs['ObjectLockMode'] = $this->objectLockMode;
        }

        if ($this->objectLockRetainUntilDate !== null) {
            $requestArgs['ObjectLockRetainUntilDate'] = $this->objectLockRetainUntilDate;
        }

        if ($this->requestPayer !== null) {
            $requestArgs['RequestPayer'] = $this->requestPayer;
        }

        if ($this->sseCustomerAlgorithm !== null) {
            $requestArgs['SSECustomerAlgorithm'] = $this->sseCustomerAlgorithm;
        }

        if ($this->sseCustomerKey !== null) {
            $requestArgs['SSECustomerKey'] = $this->sseCustomerKey;
        }

        if ($this->sseCustomerKeyMD5 !== null) {
            $requestArgs['SSECustomerKeyMD5'] = $this->sseCustomerKeyMD5;
        }

        if ($this->ssekmsEncryptionContext !== null) {
            $requestArgs['SSEKMSEncryptionContext'] = $this->ssekmsEncryptionContext;
        }

        if ($this->ssekmsKeyId !== null) {
            $requestArgs['SSEKMSKeyId'] = $this->ssekmsKeyId;
        }

        if ($this->serverSideEncryption !== null) {
            $requestArgs['ServerSideEncryption'] = $this->serverSideEncryption;
        }

        if ($this->storageClass !== null) {
            $requestArgs['StorageClass'] = $this->storageClass;
        }

        if ($this->tagging !== null) {
            $requestArgs['Tagging'] = $this->tagging;
        }

        if ($this->websiteRedirectLocation !== null) {
            $requestArgs['WebsiteRedirectLocation'] = $this->websiteRedirectLocation;
        }

        return $requestArgs;
    }

    /**
     * Convert to upload part request array
     *
     * @return array
     */
    public function toUploadPartRequest(): array
    {
        $requestArgs = [];

        if ($this->bucket !== null) {
            $requestArgs['Bucket'] = $this->bucket;
        }

        if ($this->checksumAlgorithm !== null) {
            $requestArgs['ChecksumAlgorithm'] = $this->checksumAlgorithm;
        }

        if ($this->expectedBucketOwner !== null) {
            $requestArgs['ExpectedBucketOwner'] = $this->expectedBucketOwner;
        }

        if ($this->key !== null) {
            $requestArgs['Key'] = $this->key;
        }

        if ($this->requestPayer !== null) {
            $requestArgs['RequestPayer'] = $this->requestPayer;
        }

        if ($this->sseCustomerAlgorithm !== null) {
            $requestArgs['SSECustomerAlgorithm'] = $this->sseCustomerAlgorithm;
        }

        if ($this->sseCustomerKey !== null) {
            $requestArgs['SSECustomerKey'] = $this->sseCustomerKey;
        }

        if ($this->sseCustomerKeyMD5 !== null) {
            $requestArgs['SSECustomerKeyMD5'] = $this->sseCustomerKeyMD5;
        }

        return $requestArgs;
    }

    /**
     * Convert to complete multipart upload request array
     *
     * @return array
     */
    public function toCompleteMultipartUploadRequest(): array
    {
        $requestArgs = [];

        if ($this->bucket !== null) {
            $requestArgs['Bucket'] = $this->bucket;
        }

        if ($this->checksumCRC32 !== null) {
            $requestArgs['ChecksumCRC32'] = $this->checksumCRC32;
        }

        if ($this->checksumCRC32C !== null) {
            $requestArgs['ChecksumCRC32C'] = $this->checksumCRC32C;
        }

        if ($this->checksumCRC64NVME !== null) {
            $requestArgs['ChecksumCRC64NVME'] = $this->checksumCRC64NVME;
        }

        if ($this->checksumSHA1 !== null) {
            $requestArgs['ChecksumSHA1'] = $this->checksumSHA1;
        }

        if ($this->checksumSHA256 !== null) {
            $requestArgs['ChecksumSHA256'] = $this->checksumSHA256;
        }

        if ($this->expectedBucketOwner !== null) {
            $requestArgs['ExpectedBucketOwner'] = $this->expectedBucketOwner;
        }

        if ($this->ifMatch !== null) {
            $requestArgs['IfMatch'] = $this->ifMatch;
        }

        if ($this->ifNoneMatch !== null) {
            $requestArgs['IfNoneMatch'] = $this->ifNoneMatch;
        }

        if ($this->key !== null) {
            $requestArgs['Key'] = $this->key;
        }

        if ($this->requestPayer !== null) {
            $requestArgs['RequestPayer'] = $this->requestPayer;
        }

        if ($this->sseCustomerAlgorithm !== null) {
            $requestArgs['SSECustomerAlgorithm'] = $this->sseCustomerAlgorithm;
        }

        if ($this->sseCustomerKey !== null) {
            $requestArgs['SSECustomerKey'] = $this->sseCustomerKey;
        }

        if ($this->sseCustomerKeyMD5 !== null) {
            $requestArgs['SSECustomerKeyMD5'] = $this->sseCustomerKeyMD5;
        }

        return $requestArgs;
    }

    /**
     * Convert to abort multipart upload request array
     *
     * @return array
     */
    public function toAbortMultipartRequest(): array
    {
        $requestArgs = [];

        if ($this->bucket !== null) {
            $requestArgs['Bucket'] = $this->bucket;
        }

        if ($this->expectedBucketOwner !== null) {
            $requestArgs['ExpectedBucketOwner'] = $this->expectedBucketOwner;
        }

        if ($this->key !== null) {
            $requestArgs['Key'] = $this->key;
        }

        if ($this->requestPayer !== null) {
            $requestArgs['RequestPayer'] = $this->requestPayer;
        }

        return $requestArgs;
    }

    /**
     * Convert the object to an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'ACL' => $this->acl,
            'Bucket' => $this->bucket,
            'BucketKeyEnabled' => $this->bucketKeyEnabled,
            'CacheControl' => $this->cacheControl,
            'ChecksumAlgorithm' => $this->checksumAlgorithm,
            'ContentDisposition' => $this->contentDisposition,
            'ContentEncoding' => $this->contentEncoding,
            'ContentLanguage' => $this->contentLanguage,
            'ContentType' => $this->contentType,
            'ExpectedBucketOwner' => $this->expectedBucketOwner,
            'Expires' => $this->expires,
            'GrantFullControl' => $this->grantFullControl,
            'GrantRead' => $this->grantRead,
            'GrantReadACP' => $this->grantReadACP,
            'GrantWriteACP' => $this->grantWriteACP,
            'Key' => $this->key,
            'Metadata' => $this->metadata,
            'ObjectLockLegalHoldStatus' => $this->objectLockLegalHoldStatus,
            'ObjectLockMode' => $this->objectLockMode,
            'ObjectLockRetainUntilDate' => $this->objectLockRetainUntilDate,
            'RequestPayer' => $this->requestPayer,
            'SSECustomerAlgorithm' => $this->sseCustomerAlgorithm,
            'SSECustomerKey' => $this->sseCustomerKey,
            'SSECustomerKeyMD5' => $this->sseCustomerKeyMD5,
            'SSEKMSEncryptionContext' => $this->ssekmsEncryptionContext,
            'SSEKMSKeyId' => $this->ssekmsKeyId,
            'ServerSideEncryption' => $this->serverSideEncryption,
            'StorageClass' => $this->storageClass,
            'Tagging' => $this->tagging,
            'WebsiteRedirectLocation' => $this->websiteRedirectLocation,
            'ChecksumCRC32' => $this->checksumCRC32,
            'ChecksumCRC32C' => $this->checksumCRC32C,
            'ChecksumCRC64NVME' => $this->checksumCRC64NVME,
            'ChecksumSHA1' => $this->checksumSHA1,
            'ChecksumSHA256' => $this->checksumSHA256,
            'IfMatch' => $this->ifMatch,
            'IfNoneMatch' => $this->ifNoneMatch,
        ];
    }

    /**
     * Create instance from array
     *
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data): static
    {
        return new static(
            $data['ACL'] ?? null,
            $data['Bucket'] ?? null,
            $data['BucketKeyEnabled'] ?? null,
            $data['CacheControl'] ?? null,
            $data['ChecksumAlgorithm'] ?? null,
            $data['ContentDisposition'] ?? null,
            $data['ContentEncoding'] ?? null,
            $data['ContentLanguage'] ?? null,
            $data['ContentType'] ?? null,
            $data['ExpectedBucketOwner'] ?? null,
            $data['Expires'] ?? null,
            $data['GrantFullControl'] ?? null,
            $data['GrantRead'] ?? null,
            $data['GrantReadACP'] ?? null,
            $data['GrantWriteACP'] ?? null,
            $data['Key'] ?? null,
            $data['Metadata'] ?? null,
            $data['ObjectLockLegalHoldStatus'] ?? null,
            $data['ObjectLockMode'] ?? null,
            $data['ObjectLockRetainUntilDate'] ?? null,
            $data['RequestPayer'] ?? null,
            $data['SSECustomerAlgorithm'] ?? null,
            $data['SSECustomerKey'] ?? null,
            $data['SSECustomerKeyMD5'] ?? null,
            $data['SSEKMSEncryptionContext'] ?? null,
            $data['SSEKMSKeyId'] ?? null,
            $data['ServerSideEncryption'] ?? null,
            $data['StorageClass'] ?? null,
            $data['Tagging'] ?? null,
            $data['WebsiteRedirectLocation'] ?? null,
            $data['ChecksumCRC32'] ?? null,
            $data['ChecksumCRC32C'] ?? null,
            $data['ChecksumCRC64NVME'] ?? null,
            $data['ChecksumSHA1'] ?? null,
            $data['ChecksumSHA256'] ?? null,
            $data['IfMatch'] ?? null,
            $data['IfNoneMatch'] ?? null
        );
    }
}