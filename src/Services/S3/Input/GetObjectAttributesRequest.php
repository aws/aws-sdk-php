<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\RequestPayer;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class GetObjectAttributesRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetObjectAttributesRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_OBJECT_ATTRIBUTES;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_MAX_PARTS;
    private static Schema $SCHEMA_PART_NUMBER_MARKER;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The name of the bucket that contains the object. Directory buckets - When you use this
     *        operation with a directory bucket, you must use virtual-hosted-style requests in the format
     *        Bucket-name.s3express-zone-id.region-code.amazonaws.com. Path-style requests are not supported. Directory
     * bucket
     *        names must be unique in the chosen Zone (Availability Zone or Local Zone). Bucket names must follow the format
     *        bucket-base-name--zone-id--x-s3 (for example, amzn-s3-demo-bucket--usw2-az1--x-s3). For information about
     * bucket
     *        naming restrictions, see Directory bucket naming rules in the Amazon S3 User Guide. Access points - When you
     * use this
     *        action with an access point for general purpose buckets, you must provide the alias of the access point in
     * place of
     *        the bucket name or specify the access point ARN. When you use this action with an access point for directory
     * buckets,
     *        you must provide the access point name in place of the bucket name. When using the access point ARN, you must
     * direct
     *        requests to the access point hostname. The access point hostname takes the form
     *        AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using this action with an access point
     * through
     *        the Amazon Web Services SDKs, you provide the access point ARN in place of the bucket name. For more
     * information
     *        about access point ARNs, see Using access points in the Amazon S3 User Guide. Object Lambda access points are
     * not
     *        supported by directory buckets. S3 on Outposts - When you use this action with S3 on Outposts, you must direct
     *        requests to the S3 on Outposts hostname. The S3 on Outposts hostname takes the form
     *        AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. When you use this action with S3 on
     * Outposts,
     *        the destination bucket must be the Outposts access point ARN or the access point alias. For more information
     * about S3
     *        on Outposts, see What is S3 on Outposts? in the Amazon S3 User Guide.
     * @param ?string $key The object key.
     * @param list<\Aws\Services\S3\Shape\ObjectAttributes>|null $objectAttributes
     * @param ?string $versionId The version ID used to reference a specific version of the object. S3 Versioning isn't
     *        enabled and supported for directory buckets. For this API operation, only the null value of the version ID is
     *        supported by directory buckets. You can only specify null to the versionId query parameter in the request.
     * @param ?int $maxParts Sets the maximum number of parts to return. For more information, see Uploading and copying
     *        objects using multipart upload in Amazon S3 in the Amazon Simple Storage Service user guide.
     * @param ?string $partNumberMarker Specifies the part after which listing should begin. Only parts with higher part
     *        numbers will be listed. For more information, see Uploading and copying objects using multipart upload in
     * Amazon S3
     *        in the Amazon Simple Storage Service user guide.
     * @param ?string $sSECustomerAlgorithm Specifies the algorithm to use when encrypting the object (for example, AES256).
     *        This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerKey Specifies the customer-provided encryption key for Amazon S3 to use in encrypting
     *        data. This value is used to store the object and then it is discarded; Amazon S3 does not store the encryption
     * key.
     *        The key must be appropriate for use with the algorithm specified in the
     *        x-amz-server-side-encryption-customer-algorithm header. This functionality is not supported for directory
     * buckets.
     * @param ?string $sSECustomerKeyMD5 Specifies the 128-bit MD5 digest of the encryption key according to RFC 1321.
     *        Amazon S3 uses this header for a message integrity check to ensure that the encryption key was transmitted
     * without
     *        error. This functionality is not supported for directory buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?array $objectAttributes = null,
        public readonly ?string $versionId = null,
        public readonly ?int $maxParts = null,
        public readonly ?string $partNumberMarker = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSECustomerKey = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getObjectAttributesRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_OBJECT_ATTRIBUTES = $m[2];
        self::$SCHEMA_VERSION_ID = $m[3];
        self::$SCHEMA_MAX_PARTS = $m[4];
        self::$SCHEMA_PART_NUMBER_MARKER = $m[5];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[6];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[7];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[8];
        self::$SCHEMA_REQUEST_PAYER = $m[9];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[10];
        return self::$SCHEMA = $s;
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    /**
     * Serialize the shape members to the desired wire format.
     *
     * @return void
     */
    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 0);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 1);
        }
        if (isset($this->objectAttributes)) {
            $serializer->serializeList(self::$SCHEMA_OBJECT_ATTRIBUTES, $this->objectAttributes, 2);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 3);
        }
        if (isset($this->maxParts)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_PARTS, $this->maxParts, 4);
        }
        if (isset($this->partNumberMarker)) {
            $serializer->serializeString(self::$SCHEMA_PART_NUMBER_MARKER, $this->partNumberMarker, 5);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 6);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 7);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 8);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 9);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 10);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->key,
            2 => $this->objectAttributes,
            3 => $this->versionId,
            4 => $this->maxParts,
            5 => $this->partNumberMarker,
            6 => $this->sSECustomerAlgorithm,
            7 => $this->sSECustomerKey,
            8 => $this->sSECustomerKeyMD5,
            9 => $this->requestPayer,
            10 => $this->expectedBucketOwner,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucket,
            $this->key,
            $this->objectAttributes,
            $this->versionId,
            $this->maxParts,
            $this->partNumberMarker,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5,
            $this->requestPayer,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
