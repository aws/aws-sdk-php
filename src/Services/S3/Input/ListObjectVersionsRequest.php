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

final class ListObjectVersionsRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListObjectVersionsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_DELIMITER;
    private static Schema $SCHEMA_ENCODING_TYPE;
    private static Schema $SCHEMA_KEY_MARKER;
    private static Schema $SCHEMA_MAX_KEYS;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_VERSION_ID_MARKER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES;

    public readonly ?EncodingType $encodingType;
    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The bucket name that contains the objects.
     * @param ?string $delimiter A delimiter is a character that you specify to group keys. All keys that contain the same
     *        string between the prefix and the first occurrence of the delimiter are grouped under a single result element
     * in
     *        CommonPrefixes. These groups are counted as one result against the max-keys limitation. These keys are not
     * returned
     *        elsewhere in the response. CommonPrefixes is filtered out from results if it is not lexicographically greater
     * than
     *        the key-marker.
     * @param ?string $keyMarker Specifies the key to start with when listing objects in a bucket.
     * @param ?int $maxKeys Sets the maximum number of keys returned in the response. By default, the action returns up to
     *        1,000 key names. The response might contain fewer keys but will never contain more. If additional keys satisfy
     * the
     *        search criteria, but were not returned because max-keys was exceeded, the response contains true. To return
     * the
     *        additional keys, see key-marker and version-id-marker.
     * @param ?string $prefix Use this parameter to select only those keys that begin with the specified prefix. You can use
     *        prefixes to separate a bucket into different groupings of keys. (You can think of using prefix to make groups
     * in the
     *        same way that you'd use a folder in a file system.) You can use prefix with delimiter to roll up numerous
     * objects
     *        into a single result under CommonPrefixes.
     * @param ?string $versionIdMarker Specifies the object version you want to start listing from.
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
        public readonly ?string $keyMarker = null,
        public readonly ?int $maxKeys = null,
        public readonly ?string $prefix = null,
        public readonly ?string $versionIdMarker = null,
        public readonly ?string $expectedBucketOwner = null,
        RequestPayer|string|null $requestPayer = null,
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
        $s = Schemas::listObjectVersionsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_DELIMITER = $m[1];
        self::$SCHEMA_ENCODING_TYPE = $m[2];
        self::$SCHEMA_KEY_MARKER = $m[3];
        self::$SCHEMA_MAX_KEYS = $m[4];
        self::$SCHEMA_PREFIX = $m[5];
        self::$SCHEMA_VERSION_ID_MARKER = $m[6];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[7];
        self::$SCHEMA_REQUEST_PAYER = $m[8];
        self::$SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES = $m[9];
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
        if (isset($this->keyMarker)) {
            $serializer->serializeString(self::$SCHEMA_KEY_MARKER, $this->keyMarker, 3);
        }
        if (isset($this->maxKeys)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_KEYS, $this->maxKeys, 4);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 5);
        }
        if (isset($this->versionIdMarker)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID_MARKER, $this->versionIdMarker, 6);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 7);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 8);
        }
        if (isset($this->optionalObjectAttributes)) {
            $serializer->serializeList(self::$SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES, $this->optionalObjectAttributes, 9);
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
            3 => $this->keyMarker,
            4 => $this->maxKeys,
            5 => $this->prefix,
            6 => $this->versionIdMarker,
            7 => $this->expectedBucketOwner,
            8 => $this->requestPayer,
            9 => $this->optionalObjectAttributes,
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
            $this->keyMarker,
            $this->maxKeys,
            $this->prefix,
            $this->versionIdMarker,
            $this->expectedBucketOwner,
            $this->requestPayer,
            $this->optionalObjectAttributes
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
