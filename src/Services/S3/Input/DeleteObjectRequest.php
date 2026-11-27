<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\RequestPayer;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class DeleteObjectRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DeleteObjectRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_MFA;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_BYPASS_GOVERNANCE_RETENTION;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_IF_MATCH;
    private static Schema $SCHEMA_IF_MATCH_LAST_MODIFIED_TIME;
    private static Schema $SCHEMA_IF_MATCH_SIZE;

    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The bucket name of the bucket containing the object. Directory buckets - When you use this
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
     * @param ?string $key Key name of the object to delete.
     * @param ?string $mFA The concatenation of the authentication device's serial number, a space, and the value that is
     *        displayed on your authentication device. Required to permanently delete a versioned object if versioning is
     *        configured with MFA delete enabled. This functionality is not supported for directory buckets.
     * @param ?string $versionId Version ID used to reference a specific version of the object. For directory buckets in
     *        this API operation, only the null value of the version ID is supported.
     * @param ?bool $bypassGovernanceRetention Indicates whether S3 Object Lock should bypass Governance-mode restrictions
     *        to process this operation. To use this header, you must have the s3:BypassGovernanceRetention permission. This
     *        functionality is not supported for directory buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?string $ifMatch Deletes the object if the ETag (entity tag) value provided during the delete operation
     *        matches the ETag of the object in S3. If the ETag values do not match, the operation returns a 412
     * Precondition
     *        Failed error. Expects the ETag value as a string. If-Match does accept a string value of an '*' (asterisk)
     * character
     *        to denote a match of any ETag. For more information about conditional requests, see RFC 7232.
     * @param ?float $ifMatchLastModifiedTime If present, the object is deleted only if its modification times matches the
     *        provided Timestamp. If the Timestamp values do not match, the operation returns a 412 Precondition Failed
     * error. If
     *        the Timestamp matches or if the object doesn’t exist, the operation returns a 204 Success (No Content)
     * response.
     *        This functionality is only supported for directory buckets.
     * @param ?int $ifMatchSize If present, the object is deleted only if its size matches the provided size in bytes. If
     *        the Size value does not match, the operation returns a 412 Precondition Failed error. If the Size matches or
     * if the
     *        object doesn’t exist, the operation returns a 204 Success (No Content) response. This functionality is only
     *        supported for directory buckets. You can use the If-Match, x-amz-if-match-last-modified-time and
     * x-amz-if-match-size
     *        conditional headers in conjunction with each-other or individually.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $mFA = null,
        public readonly ?string $versionId = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?bool $bypassGovernanceRetention = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?string $ifMatch = null,
        public readonly ?float $ifMatchLastModifiedTime = null,
        public readonly ?int $ifMatchSize = null
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
        $s = Schemas::deleteObjectRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_MFA = $m[2];
        self::$SCHEMA_VERSION_ID = $m[3];
        self::$SCHEMA_REQUEST_PAYER = $m[4];
        self::$SCHEMA_BYPASS_GOVERNANCE_RETENTION = $m[5];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[6];
        self::$SCHEMA_IF_MATCH = $m[7];
        self::$SCHEMA_IF_MATCH_LAST_MODIFIED_TIME = $m[8];
        self::$SCHEMA_IF_MATCH_SIZE = $m[9];
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
        if (isset($this->mFA)) {
            $serializer->serializeString(self::$SCHEMA_MFA, $this->mFA, 2);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 3);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 4);
        }
        if (isset($this->bypassGovernanceRetention)) {
            $serializer->serializeBoolean(self::$SCHEMA_BYPASS_GOVERNANCE_RETENTION, $this->bypassGovernanceRetention, 5);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 6);
        }
        if (isset($this->ifMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_MATCH, $this->ifMatch, 7);
        }
        if (isset($this->ifMatchLastModifiedTime)) {
            $serializer->serializeTimestamp(self::$SCHEMA_IF_MATCH_LAST_MODIFIED_TIME, $this->ifMatchLastModifiedTime, 8);
        }
        if (isset($this->ifMatchSize)) {
            $serializer->serializeInteger(self::$SCHEMA_IF_MATCH_SIZE, $this->ifMatchSize, 9);
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
            2 => $this->mFA,
            3 => $this->versionId,
            4 => $this->requestPayer,
            5 => $this->bypassGovernanceRetention,
            6 => $this->expectedBucketOwner,
            7 => $this->ifMatch,
            8 => $this->ifMatchLastModifiedTime,
            9 => $this->ifMatchSize,
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
            $this->mFA,
            $this->versionId,
            $this->requestPayer,
            $this->bypassGovernanceRetention,
            $this->expectedBucketOwner,
            $this->ifMatch,
            $this->ifMatchLastModifiedTime,
            $this->ifMatchSize
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
