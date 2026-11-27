<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\Delete;
use Aws\Services\S3\Shape\RequestPayer;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class DeleteObjectsRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DeleteObjectsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_DELETE;
    private static Schema $SCHEMA_MFA;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_BYPASS_GOVERNANCE_RETENTION;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;

    public readonly ?RequestPayer $requestPayer;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;

    /**
     * @param ?string $bucket The bucket name containing the objects to delete. Directory buckets - When you use this
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
     * @param ?Delete $delete Container for the request.
     * @param ?string $mFA The concatenation of the authentication device's serial number, a space, and the value that is
     *        displayed on your authentication device. Required to permanently delete a versioned object if versioning is
     *        configured with MFA delete enabled. When performing the DeleteObjects operation on an MFA delete enabled
     * bucket,
     *        which attempts to delete the specified versioned objects, you must include an MFA token. If you don't provide
     * an MFA
     *        token, the entire request will fail, even if there are non-versioned objects that you are trying to delete. If
     * you
     *        provide an invalid token, whether there are versioned object keys in the request or not, the entire
     * Multi-Object
     *        Delete request will fail. For information about MFA Delete, see MFA Delete in the Amazon S3 User Guide. This
     *        functionality is not supported for directory buckets.
     * @param ?bool $bypassGovernanceRetention Specifies whether you want to delete this object even if it has a
     *        Governance-type Object Lock in place. To use this header, you must have the s3:BypassGovernanceRetention
     * permission.
     *        This functionality is not supported for directory buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the object when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum-algorithm or x-amz-trailer header sent. Otherwise,
     * Amazon
     *        S3 fails the request with the HTTP status code 400 Bad Request. For the x-amz-checksum-algorithm header,
     * replace
     *        algorithm with the supported algorithm from the following list: CRC32 CRC32C CRC64NVME MD5 SHA1 SHA256 SHA512
     * XXHASH3
     *        XXHASH64 XXHASH128 For more information, see Checking object integrity in the Amazon S3 User Guide. If the
     * individual
     *        checksum value you provide through x-amz-checksum-algorithm doesn't match the checksum algorithm you set
     * through
     *        x-amz-sdk-checksum-algorithm, Amazon S3 fails the request with a BadDigest error. If you provide an individual
     *        checksum, Amazon S3 ignores any provided ChecksumAlgorithm parameter.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?Delete $delete = null,
        public readonly ?string $mFA = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?bool $bypassGovernanceRetention = null,
        public readonly ?string $expectedBucketOwner = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null
    ) {
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::deleteObjectsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_DELETE = $m[1];
        self::$SCHEMA_MFA = $m[2];
        self::$SCHEMA_REQUEST_PAYER = $m[3];
        self::$SCHEMA_BYPASS_GOVERNANCE_RETENTION = $m[4];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[5];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[6];
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
        if (isset($this->delete)) {
            $serializer->serializeStruct(self::$SCHEMA_DELETE, $this->delete, 1);
        }
        if (isset($this->mFA)) {
            $serializer->serializeString(self::$SCHEMA_MFA, $this->mFA, 2);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 3);
        }
        if (isset($this->bypassGovernanceRetention)) {
            $serializer->serializeBoolean(self::$SCHEMA_BYPASS_GOVERNANCE_RETENTION, $this->bypassGovernanceRetention, 4);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 5);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 6);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->delete,
            2 => $this->mFA,
            3 => $this->requestPayer,
            4 => $this->bypassGovernanceRetention,
            5 => $this->expectedBucketOwner,
            6 => $this->checksumAlgorithm,
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
            $this->delete,
            $this->mFA,
            $this->requestPayer,
            $this->bypassGovernanceRetention,
            $this->expectedBucketOwner,
            $this->checksumAlgorithm
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
