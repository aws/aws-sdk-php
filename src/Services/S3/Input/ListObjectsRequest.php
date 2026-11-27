<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\EncodingType;
use Aws\Services\S3\Shape\RequestPayer;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class ListObjectsRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListObjectsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_DELIMITER;
    private static Schema $SCHEMA_ENCODING_TYPE;
    private static Schema $SCHEMA_MARKER;
    private static Schema $SCHEMA_MAX_KEYS;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES;

    public readonly ?EncodingType $encodingType;
    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The name of the bucket containing the objects. Directory buckets - When you use this operation
     *        with a directory bucket, you must use virtual-hosted-style requests in the format
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
     * @param ?string $delimiter A delimiter is a character that you use to group keys. CommonPrefixes is filtered out from
     *        results if it is not lexicographically greater than the key-marker.
     * @param ?string $marker Marker is where you want Amazon S3 to start listing from. Amazon S3 starts listing after this
     *        specified key. Marker can be any key in the bucket.
     * @param ?int $maxKeys Sets the maximum number of keys returned in the response. By default, the action returns up to
     *        1,000 key names. The response might contain fewer keys but will never contain more.
     * @param ?string $prefix Limits the response to keys that begin with the specified prefix.
     * @param ?RequestPayer $requestPayer Confirms that the requester knows that she or he will be charged for the list
     *        objects request. Bucket owners need not specify this parameter in their requests.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param list<\Aws\Services\S3\Shape\OptionalObjectAttributes>|null $optionalObjectAttributes
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $delimiter = null,
        EncodingType|string|null $encodingType = null,
        public readonly ?string $marker = null,
        public readonly ?int $maxKeys = null,
        public readonly ?string $prefix = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?array $optionalObjectAttributes = null
    ) {
        $this->encodingType = $encodingType === null || $encodingType instanceof EncodingType ? $encodingType : EncodingType::fromValue($encodingType);
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
        $s = Schemas::listObjectsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_DELIMITER = $m[1];
        self::$SCHEMA_ENCODING_TYPE = $m[2];
        self::$SCHEMA_MARKER = $m[3];
        self::$SCHEMA_MAX_KEYS = $m[4];
        self::$SCHEMA_PREFIX = $m[5];
        self::$SCHEMA_REQUEST_PAYER = $m[6];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[7];
        self::$SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES = $m[8];
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
        if (isset($this->delimiter)) {
            $serializer->serializeString(self::$SCHEMA_DELIMITER, $this->delimiter, 1);
        }
        if (isset($this->encodingType)) {
            $serializer->serializeString(self::$SCHEMA_ENCODING_TYPE, $this->encodingType->value, 2);
        }
        if (isset($this->marker)) {
            $serializer->serializeString(self::$SCHEMA_MARKER, $this->marker, 3);
        }
        if (isset($this->maxKeys)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_KEYS, $this->maxKeys, 4);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 5);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 6);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 7);
        }
        if (isset($this->optionalObjectAttributes)) {
            $serializer->serializeList(self::$SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES, $this->optionalObjectAttributes, 8);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->delimiter,
            2 => $this->encodingType,
            3 => $this->marker,
            4 => $this->maxKeys,
            5 => $this->prefix,
            6 => $this->requestPayer,
            7 => $this->expectedBucketOwner,
            8 => $this->optionalObjectAttributes,
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
            $this->delimiter,
            $this->encodingType,
            $this->marker,
            $this->maxKeys,
            $this->prefix,
            $this->requestPayer,
            $this->expectedBucketOwner,
            $this->optionalObjectAttributes
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
