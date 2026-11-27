<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class HeadBucketRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#HeadBucketRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    /**
     * @param ?string $bucket The bucket name. Directory buckets - When you use this operation with a directory bucket, you
     *        must use virtual-hosted-style requests in the format Bucket-name.s3express-zone-id.region-code.amazonaws.com.
     *        Path-style requests are not supported. Directory bucket names must be unique in the chosen Zone (Availability
     * Zone or
     *        Local Zone). Bucket names must follow the format bucket-base-name--zone-id--x-s3 (for example,
     *        amzn-s3-demo-bucket--usw2-az1--x-s3). For information about bucket naming restrictions, see Directory bucket
     * naming
     *        rules in the Amazon S3 User Guide. Access points - When you use this action with an access point for general
     * purpose
     *        buckets, you must provide the alias of the access point in place of the bucket name or specify the access
     * point ARN.
     *        When you use this action with an access point for directory buckets, you must provide the access point name in
     * place
     *        of the bucket name. When using the access point ARN, you must direct requests to the access point hostname.
     * The
     *        access point hostname takes the form AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using
     * this
     *        action with an access point through the Amazon Web Services SDKs, you provide the access point ARN in place of
     * the
     *        bucket name. For more information about access point ARNs, see Using access points in the Amazon S3 User
     * Guide.
     *        Object Lambda access points - When you use this API operation with an Object Lambda access point, provide the
     * alias
     *        of the Object Lambda access point in place of the bucket name. If the Object Lambda access point alias in a
     * request
     *        is not valid, the error code InvalidAccessPointAliasError is returned. For more information about
     *        InvalidAccessPointAliasError, see List of Error Codes. Object Lambda access points are not supported by
     * directory
     *        buckets. S3 on Outposts - When you use this action with S3 on Outposts, you must direct requests to the S3 on
     *        Outposts hostname. The S3 on Outposts hostname takes the form
     *        AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. When you use this action with S3 on
     * Outposts,
     *        the destination bucket must be the Outposts access point ARN or the access point alias. For more information
     * about S3
     *        on Outposts, see What is S3 on Outposts? in the Amazon S3 User Guide.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $expectedBucketOwner = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::headBucketRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[1];
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
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->expectedBucketOwner,
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
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
