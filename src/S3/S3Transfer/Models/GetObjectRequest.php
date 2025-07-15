<?php

namespace Aws\S3\S3Transfer\Models;

use function Aws\remove_nulls_from_array;

final class GetObjectRequest
{
    /** @var string|null */
    private ?string $bucket;

    /** @var string|null */
    private ?string $checksumMode;

    /** @var string|null */
    private ?string $expectedBucketOwner;

    /** @var string|null */
    private ?string $ifMatch;

    /** @var string|null */
    private ?string $ifModifiedSince;

    /** @var string|null */
    private ?string $ifNoneMatch;

    /** @var string|null */
    private ?string $ifUnmodifiedSince;

    /** @var string|null */
    private ?string $key;

    /** @var string|null */
    private ?string $requestPayer;

    /** @var string|null */
    private ?string $responseCacheControl;

    /** @var string|null */
    private ?string $responseContentDisposition;

    /** @var string|null */
    private ?string $responseContentEncoding;

    /** @var string|null */
    private ?string $responseContentLanguage;

    /** @var string|null */
    private ?string $responseContentType;

    /** @var string|null */
    private ?string $responseExpires;

    /** @var string|null */
    private ?string $sseCustomerAlgorithm;

    /** @var string|null */
    private ?string $sseCustomerKey;

    /** @var string|null */
    private ?string $sseCustomerKeyMD5;

    /** @var string|null */
    private ?string $versionId;

    /**
     * @param string|null $bucket
     * @param string|null $checksumMode
     * @param string|null $expectedBucketOwner
     * @param string|null $ifMatch
     * @param string|null $ifModifiedSince
     * @param string|null $ifNoneMatch
     * @param string|null $ifUnmodifiedSince
     * @param string|null $key
     * @param string|null $requestPayer
     * @param string|null $responseCacheControl
     * @param string|null $responseContentDisposition
     * @param string|null $responseContentEncoding
     * @param string|null $responseContentLanguage
     * @param string|null $responseContentType
     * @param string|null $responseExpires
     * @param string|null $sseCustomerAlgorithm
     * @param string|null $sseCustomerKey
     * @param string|null $sseCustomerKeyMD5
     * @param string|null $versionId
     */
    public function __construct(
        ?string $bucket,
        ?string $checksumMode,
        ?string $expectedBucketOwner,
        ?string $ifMatch,
        ?string $ifModifiedSince,
        ?string $ifNoneMatch,
        ?string $ifUnmodifiedSince,
        ?string $key,
        ?string $requestPayer,
        ?string $responseCacheControl,
        ?string $responseContentDisposition,
        ?string $responseContentEncoding,
        ?string $responseContentLanguage,
        ?string $responseContentType,
        ?string $responseExpires,
        ?string $sseCustomerAlgorithm,
        ?string $sseCustomerKey,
        ?string $sseCustomerKeyMD5,
        ?string $versionId
    ) {
        $this->bucket = $bucket;
        $this->checksumMode = $checksumMode;
        $this->expectedBucketOwner = $expectedBucketOwner;
        $this->ifMatch = $ifMatch;
        $this->ifModifiedSince = $ifModifiedSince;
        $this->ifNoneMatch = $ifNoneMatch;
        $this->ifUnmodifiedSince = $ifUnmodifiedSince;
        $this->key = $key;
        $this->requestPayer = $requestPayer;
        $this->responseCacheControl = $responseCacheControl;
        $this->responseContentDisposition = $responseContentDisposition;
        $this->responseContentEncoding = $responseContentEncoding;
        $this->responseContentLanguage = $responseContentLanguage;
        $this->responseContentType = $responseContentType;
        $this->responseExpires = $responseExpires;
        $this->sseCustomerAlgorithm = $sseCustomerAlgorithm;
        $this->sseCustomerKey = $sseCustomerKey;
        $this->sseCustomerKeyMD5 = $sseCustomerKeyMD5;
        $this->versionId = $versionId;
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
            $data['Bucket'] ?? null,
            $data['ChecksumMode'] ?? null,
            $data['ExpectedBucketOwner'] ?? null,
            $data['IfMatch'] ?? null,
            $data['IfModifiedSince'] ?? null,
            $data['IfNoneMatch'] ?? null,
            $data['IfUnmodifiedSince'] ?? null,
            $data['Key'] ?? null,
            $data['RequestPayer'] ?? null,
            $data['ResponseCacheControl'] ?? null,
            $data['ResponseContentDisposition'] ?? null,
            $data['ResponseContentEncoding'] ?? null,
            $data['ResponseContentLanguage'] ?? null,
            $data['ResponseContentType'] ?? null,
            $data['ResponseExpires'] ?? null,
            $data['SSECustomerAlgorithm'] ?? null,
            $data['SSECustomerKey'] ?? null,
            $data['SSECustomerKeyMD5'] ?? null,
            $data['VersionId'] ?? null
        );
    }

    /**
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }

    /**
     * @return string|null
     */
    public function getChecksumMode(): ?string
    {
        return $this->checksumMode;
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
    public function getIfMatch(): ?string
    {
        return $this->ifMatch;
    }

    /**
     * @return string|null
     */
    public function getIfModifiedSince(): ?string
    {
        return $this->ifModifiedSince;
    }

    /**
     * @return string|null
     */
    public function getIfNoneMatch(): ?string
    {
        return $this->ifNoneMatch;
    }

    /**
     * @return string|null
     */
    public function getIfUnmodifiedSince(): ?string
    {
        return $this->ifUnmodifiedSince;
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
    public function getRequestPayer(): ?string
    {
        return $this->requestPayer;
    }

    /**
     * @return string|null
     */
    public function getResponseCacheControl(): ?string
    {
        return $this->responseCacheControl;
    }

    /**
     * @return string|null
     */
    public function getResponseContentDisposition(): ?string
    {
        return $this->responseContentDisposition;
    }

    /**
     * @return string|null
     */
    public function getResponseContentEncoding(): ?string
    {
        return $this->responseContentEncoding;
    }

    /**
     * @return string|null
     */
    public function getResponseContentLanguage(): ?string
    {
        return $this->responseContentLanguage;
    }

    /**
     * @return string|null
     */
    public function getResponseContentType(): ?string
    {
        return $this->responseContentType;
    }

    /**
     * @return string|null
     */
    public function getResponseExpires(): ?string
    {
        return $this->responseExpires;
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
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }

    /**
     * Convert the object to an array format suitable for AWS S3 API request
     *
     * @return array Array containing AWS S3 request fields with their corresponding values
     */
    public function toArray(): array
    {
        $array = [
            'Bucket' => $this->bucket,
            'ChecksumMode' => $this->checksumMode,
            'ExpectedBucketOwner' => $this->expectedBucketOwner,
            'IfMatch' => $this->ifMatch,
            'IfModifiedSince' => $this->ifModifiedSince,
            'IfNoneMatch' => $this->ifNoneMatch,
            'IfUnmodifiedSince' => $this->ifUnmodifiedSince,
            'Key' => $this->key,
            'RequestPayer' => $this->requestPayer,
            'ResponseCacheControl' => $this->responseCacheControl,
            'ResponseContentDisposition' => $this->responseContentDisposition,
            'ResponseContentEncoding' => $this->responseContentEncoding,
            'ResponseContentLanguage' => $this->responseContentLanguage,
            'ResponseContentType' => $this->responseContentType,
            'ResponseExpires' => $this->responseExpires,
            'SSECustomerAlgorithm' => $this->sseCustomerAlgorithm,
            'SSECustomerKey' => $this->sseCustomerKey,
            'SSECustomerKeyMD5' => $this->sseCustomerKeyMD5,
            'VersionId' => $this->versionId
        ];

        remove_nulls_from_array($array);

        return $array;
    }
}