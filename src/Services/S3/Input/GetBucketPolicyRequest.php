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

final class GetBucketPolicyRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetBucketPolicyRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    /**
     * @param ?string $bucket The bucket name to get the bucket policy for. Directory buckets - When you use this operation
     *        with a directory bucket, you must use path-style requests in the format
     *        https://s3express-control.region-code.amazonaws.com/bucket-name . Virtual-hosted-style requests aren't
     * supported.
     *        Directory bucket names must be unique in the chosen Zone (Availability Zone or Local Zone). Bucket names must
     * also
     *        follow the format bucket-base-name--zone-id--x-s3 (for example, DOC-EXAMPLE-BUCKET--usw2-az1--x-s3). For
     * information
     *        about bucket naming restrictions, see Directory bucket naming rules in the Amazon S3 User Guide Access points
     * - When
     *        you use this API operation with an access point, provide the alias of the access point in place of the bucket
     * name.
     *        Object Lambda access points - When you use this API operation with an Object Lambda access point, provide the
     * alias
     *        of the Object Lambda access point in place of the bucket name. If the Object Lambda access point alias in a
     * request
     *        is not valid, the error code InvalidAccessPointAliasError is returned. For more information about
     *        InvalidAccessPointAliasError, see List of Error Codes. Object Lambda access points are not supported by
     * directory
     *        buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied). For directory buckets, this header is not supported in this API operation. If you specify this
     * header, the
     *        request fails with the HTTP status code 501 Not Implemented.
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
        $s = Schemas::getBucketPolicyRequest();
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
