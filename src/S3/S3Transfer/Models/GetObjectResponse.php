<?php

namespace Aws\S3\S3Transfer\Models;

use function Aws\remove_nulls_from_array;

class GetObjectResponse
{
    /** @var string|null */
    private ?string $acceptRanges;

    /** @var string|null */
    private ?string $bucketKeyEnabled;

    /** @var string|null */
    private ?string $cacheControl;

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
    private ?string $contentDisposition;

    /** @var string|null */
    private ?string $contentEncoding;

    /** @var string|null */
    private ?string $contentLanguage;

    /** @var string|null */
    private ?string $contentLength;

    /** @var string|null */
    private ?string $contentRange;

    /** @var string|null */
    private ?string $contentType;

    /** @var string|null */
    private ?string $deleteMarker;

    /** @var string|null */
    private ?string $eTag;

    /** @var string|null */
    private ?string $expiration;

    /** @var string|null */
    private ?string $expires;

    /** @var string|null */
    private ?string $lastModified;

    /** @var array|null */
    private ?array $metadata;

    /** @var string|null */
    private ?string $missingMeta;

    /** @var string|null */
    private ?string $objectLockLegalHoldStatus;

    /** @var string|null */
    private ?string $objectLockMode;

    /** @var string|null */
    private ?string $objectLockRetainUntilDate;

    /** @var string|null */
    private ?string $partsCount;

    /** @var string|null */
    private ?string $replicationStatus;

    /** @var string|null */
    private ?string $requestCharged;

    /** @var string|null */
    private ?string $restore;

    /** @var string|null */
    private ?string $sseCustomerAlgorithm;

    /** @var string|null */
    private ?string $sseCustomerKeyMD5;

    /** @var string|null */
    private ?string $sseKMSKeyId;

    /** @var string|null */
    private ?string $serverSideEncryption;

    /** @var string|null */
    private ?string $storageClass;

    /** @var string|null */
    private ?string $tagCount;

    /** @var string|null */
    private ?string $versionId;

    /** @var string|null */
    private ?string $websiteRedirectLocation;

    /**
     * @param string|null $acceptRanges
     * @param string|null $bucketKeyEnabled
     * @param string|null $cacheControl
     * @param string|null $checksumCRC32
     * @param string|null $checksumCRC32C
     * @param string|null $checksumCRC64NVME
     * @param string|null $checksumSHA1
     * @param string|null $checksumSHA256
     * @param string|null $checksumType
     * @param string|null $contentDisposition
     * @param string|null $contentEncoding
     * @param string|null $contentLanguage
     * @param string|null $contentLength
     * @param string|null $contentRange
     * @param string|null $contentType
     * @param string|null $deleteMarker
     * @param string|null $eTag
     * @param string|null $expiration
     * @param string|null $expires
     * @param string|null $lastModified
     * @param array|null $metadata
     * @param string|null $missingMeta
     * @param string|null $objectLockLegalHoldStatus
     * @param string|null $objectLockMode
     * @param string|null $objectLockRetainUntilDate
     * @param string|null $partsCount
     * @param string|null $replicationStatus
     * @param string|null $requestCharged
     * @param string|null $restore
     * @param string|null $sseCustomerAlgorithm
     * @param string|null $sseCustomerKeyMD5
     * @param string|null $sseKMSKeyId
     * @param string|null $serverSideEncryption
     * @param string|null $storageClass
     * @param string|null $tagCount
     * @param string|null $versionId
     * @param string|null $websiteRedirectLocation
     */
    public function __construct(
        ?string $acceptRanges = null,
        ?string $bucketKeyEnabled = null,
        ?string $cacheControl = null,
        ?string $checksumCRC32 = null,
        ?string $checksumCRC32C = null,
        ?string $checksumCRC64NVME = null,
        ?string $checksumSHA1 = null,
        ?string $checksumSHA256 = null,
        ?string $checksumType = null,
        ?string $contentDisposition = null,
        ?string $contentEncoding = null,
        ?string $contentLanguage = null,
        ?string $contentLength = null,
        ?string $contentRange = null,
        ?string $contentType = null,
        ?string $deleteMarker = null,
        ?string $eTag = null,
        ?string $expiration = null,
        ?string $expires = null,
        ?string $lastModified = null,
        ?array $metadata = null,
        ?string $missingMeta = null,
        ?string $objectLockLegalHoldStatus = null,
        ?string $objectLockMode = null,
        ?string $objectLockRetainUntilDate = null,
        ?string $partsCount = null,
        ?string $replicationStatus = null,
        ?string $requestCharged = null,
        ?string $restore = null,
        ?string $sseCustomerAlgorithm = null,
        ?string $sseCustomerKeyMD5 = null,
        ?string $sseKMSKeyId = null,
        ?string $serverSideEncryption = null,
        ?string $storageClass = null,
        ?string $tagCount = null,
        ?string $versionId = null,
        ?string $websiteRedirectLocation = null
    ) {
        $this->acceptRanges = $acceptRanges;
        $this->bucketKeyEnabled = $bucketKeyEnabled;
        $this->cacheControl = $cacheControl;
        $this->checksumCRC32 = $checksumCRC32;
        $this->checksumCRC32C = $checksumCRC32C;
        $this->checksumCRC64NVME = $checksumCRC64NVME;
        $this->checksumSHA1 = $checksumSHA1;
        $this->checksumSHA256 = $checksumSHA256;
        $this->checksumType = $checksumType;
        $this->contentDisposition = $contentDisposition;
        $this->contentEncoding = $contentEncoding;
        $this->contentLanguage = $contentLanguage;
        $this->contentLength = $contentLength;
        $this->contentRange = $contentRange;
        $this->contentType = $contentType;
        $this->deleteMarker = $deleteMarker;
        $this->eTag = $eTag;
        $this->expiration = $expiration;
        $this->expires = $expires;
        $this->lastModified = $lastModified;
        $this->metadata = $metadata;
        $this->missingMeta = $missingMeta;
        $this->objectLockLegalHoldStatus = $objectLockLegalHoldStatus;
        $this->objectLockMode = $objectLockMode;
        $this->objectLockRetainUntilDate = $objectLockRetainUntilDate;
        $this->partsCount = $partsCount;
        $this->replicationStatus = $replicationStatus;
        $this->requestCharged = $requestCharged;
        $this->restore = $restore;
        $this->sseCustomerAlgorithm = $sseCustomerAlgorithm;
        $this->sseCustomerKeyMD5 = $sseCustomerKeyMD5;
        $this->sseKMSKeyId = $sseKMSKeyId;
        $this->serverSideEncryption = $serverSideEncryption;
        $this->storageClass = $storageClass;
        $this->tagCount = $tagCount;
        $this->versionId = $versionId;
        $this->websiteRedirectLocation = $websiteRedirectLocation;
    }

    /**
     * @param array $array
     * @return GetObjectResponse
     */
    public static function fromArray(array $array): GetObjectResponse
    {
        return new GetObjectResponse(
            acceptRanges: $array['AcceptRanges'] ?? null,
            bucketKeyEnabled: $array['BucketKeyEnabled'] ?? null,
            cacheControl: $array['CacheControl'] ?? null,
            checksumCRC32: $array['ChecksumCRC32'] ?? null,
            checksumCRC32C: $array['ChecksumCRC32C'] ?? null,
            checksumCRC64NVME: $array['ChecksumCRC64NVME'] ?? null,
            checksumSHA1: $array['ChecksumSHA1'] ?? null,
            checksumSHA256: $array['ChecksumSHA256'] ?? null,
            checksumType: $array['ChecksumType'] ?? null,
            contentDisposition: $array['ContentDisposition'] ?? null,
            contentEncoding: $array['ContentEncoding'] ?? null,
            contentLanguage: $array['ContentLanguage'] ?? null,
            contentLength: $array['ContentLength'] ?? null,
            contentRange: $array['ContentRange'] ?? null,
            contentType: $array['ContentType'] ?? null,
            deleteMarker: $array['DeleteMarker'] ?? null,
            eTag: $array['ETag'] ?? null,
            expiration: $array['Expiration'] ?? null,
            expires: $array['Expires'] ?? null,
            lastModified: $array['LastModified'] ?? null,
            metadata: $array['@metadata'] ?? null,
            missingMeta: $array['MissingMeta'] ?? null,
            objectLockLegalHoldStatus: $array['ObjectLockLegalHoldStatus'] ?? null,
            objectLockMode: $array['ObjectLockMode'] ?? null,
            objectLockRetainUntilDate: $array['ObjectLockRetainUntilDate'] ?? null,
            partsCount: $array['PartsCount'] ?? null,
            replicationStatus: $array['ReplicationStatus'] ?? null,
            requestCharged: $array['RequestCharged'] ?? null,
            restore: $array['Restore'] ?? null,
            sseCustomerAlgorithm: $array['SSECustomerAlgorithm'] ?? null,
            sseCustomerKeyMD5: $array['SSECustomerKeyMD5'] ?? null,
            sseKMSKeyId: $array['SSEKMSKeyId'] ?? null,
            serverSideEncryption: $array['ServerSideEncryption'] ?? null,
            storageClass: $array['StorageClass'] ?? null,
            tagCount: $array['TagCount'] ?? null,
            versionId: $array['VersionId'] ?? null,
            websiteRedirectLocation: $array['WebsiteRedirectLocation'] ?? null
        );
    }

    /**
     * @return string|null
     */
    public function getAcceptRanges(): ?string
    {
        return $this->acceptRanges;
    }

    /**
     * @return string|null
     */
    public function getBucketKeyEnabled(): ?string
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
    public function getContentLength(): ?string
    {
        return $this->contentLength;
    }

    /**
     * @return string|null
     */
    public function getContentRange(): ?string
    {
        return $this->contentRange;
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
    public function getDeleteMarker(): ?string
    {
        return $this->deleteMarker;
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
    public function getExpires(): ?string
    {
        return $this->expires;
    }

    /**
     * @return string|null
     */
    public function getLastModified(): ?string
    {
        return $this->lastModified;
    }

    /**
     * @return array|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @return string|null
     */
    public function getMissingMeta(): ?string
    {
        return $this->missingMeta;
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
    public function getPartsCount(): ?string
    {
        return $this->partsCount;
    }

    /**
     * @return string|null
     */
    public function getReplicationStatus(): ?string
    {
        return $this->replicationStatus;
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
    public function getRestore(): ?string
    {
        return $this->restore;
    }

    /**
     * @return string|null
     */
    public function getSSECustomerAlgorithm(): ?string
    {
        return $this->sseCustomerAlgorithm;
    }

    /**
     * @return string|null
     */
    public function getSSECustomerKeyMD5(): ?string
    {
        return $this->sseCustomerKeyMD5;
    }

    /**
     * @return string|null
     */
    public function getSSEKMSKeyId(): ?string
    {
        return $this->sseKMSKeyId;
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
    public function getTagCount(): ?string
    {
        return $this->tagCount;
    }

    /**
     * @return string|null
     */
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }

    /**
     * @return string|null
     */
    public function getWebsiteRedirectLocation(): ?string
    {
        return $this->websiteRedirectLocation;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = [
            'AcceptRanges' => $this->acceptRanges,
            'BucketKeyEnabled' => $this->bucketKeyEnabled,
            'CacheControl' => $this->cacheControl,
            'ChecksumCRC32' => $this->checksumCRC32,
            'ChecksumCRC32C' => $this->checksumCRC32C,
            'ChecksumCRC64NVME' => $this->checksumCRC64NVME,
            'ChecksumSHA1' => $this->checksumSHA1,
            'ChecksumSHA256' => $this->checksumSHA256,
            'ChecksumType' => $this->checksumType,
            'ContentDisposition' => $this->contentDisposition,
            'ContentEncoding' => $this->contentEncoding,
            'ContentLanguage' => $this->contentLanguage,
            'ContentLength' => $this->contentLength,
            'ContentRange' => $this->contentRange,
            'ContentType' => $this->contentType,
            'DeleteMarker' => $this->deleteMarker,
            'ETag' => $this->eTag,
            'Expiration' => $this->expiration,
            'Expires' => $this->expires,
            'LastModified' => $this->lastModified,
            'Metadata' => $this->metadata,
            'MissingMeta' => $this->missingMeta,
            'ObjectLockLegalHoldStatus' => $this->objectLockLegalHoldStatus,
            'ObjectLockMode' => $this->objectLockMode,
            'ObjectLockRetainUntilDate' => $this->objectLockRetainUntilDate,
            'PartsCount' => $this->partsCount,
            'ReplicationStatus' => $this->replicationStatus,
            'RequestCharged' => $this->requestCharged,
            'Restore' => $this->restore,
            'SSECustomerAlgorithm' => $this->sseCustomerAlgorithm,
            'SSECustomerKeyMD5' => $this->sseCustomerKeyMD5,
            'SSEKMSKeyId' => $this->sseKMSKeyId,
            'ServerSideEncryption' => $this->serverSideEncryption,
            'StorageClass' => $this->storageClass,
            'TagCount' => $this->tagCount,
            'VersionId' => $this->versionId,
            'WebsiteRedirectLocation' => $this->websiteRedirectLocation,
        ];

        remove_nulls_from_array($array);

        return $array;
    }
}