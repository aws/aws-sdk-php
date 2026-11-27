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

final class GetObjectTaggingRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetObjectTaggingRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_REQUEST_PAYER;

    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The bucket name containing the object for which to get the tagging information. Access points
     *        - When you use this action with an access point for general purpose buckets, you must provide the alias of the
     * access
     *        point in place of the bucket name or specify the access point ARN. When you use this action with an access
     * point for
     *        directory buckets, you must provide the access point name in place of the bucket name. When using the access
     * point
     *        ARN, you must direct requests to the access point hostname. The access point hostname takes the form
     *        AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using this action with an access point
     * through
     *        the Amazon Web Services SDKs, you provide the access point ARN in place of the bucket name. For more
     * information
     *        about access point ARNs, see Using access points in the Amazon S3 User Guide. S3 on Outposts - When you use
     * this
     *        action with S3 on Outposts, you must direct requests to the S3 on Outposts hostname. The S3 on Outposts
     * hostname
     *        takes the form AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. When you use this action
     * with S3
     *        on Outposts, the destination bucket must be the Outposts access point ARN or the access point alias. For more
     *        information about S3 on Outposts, see What is S3 on Outposts? in the Amazon S3 User Guide.
     * @param ?string $key Object key for which to get the tagging information.
     * @param ?string $versionId The versionId of the object for which to get the tagging information.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $versionId = null,
        public readonly ?string $expectedBucketOwner = null,
        RequestPayer|string|null $requestPayer = null
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
        $s = Schemas::getObjectTaggingRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_VERSION_ID = $m[2];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[3];
        self::$SCHEMA_REQUEST_PAYER = $m[4];
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
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 2);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 3);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 4);
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
            2 => $this->versionId,
            3 => $this->expectedBucketOwner,
            4 => $this->requestPayer,
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
            $this->versionId,
            $this->expectedBucketOwner,
            $this->requestPayer
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
