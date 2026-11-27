<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\EncodingType;
use Aws\Services\S3\Shape\RequestCharged;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class ListObjectsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListObjectsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_MARKER;
    private static Schema $SCHEMA_NEXT_MARKER;
    private static Schema $SCHEMA_CONTENTS;
    private static Schema $SCHEMA_NAME;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_DELIMITER;
    private static Schema $SCHEMA_MAX_KEYS;
    private static Schema $SCHEMA_COMMON_PREFIXES;
    private static Schema $SCHEMA_ENCODING_TYPE;
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?EncodingType $encodingType;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?bool $isTruncated A flag that indicates whether Amazon S3 returned all of the results that satisfied the
     *        search criteria.
     * @param ?string $marker Indicates where in the bucket listing begins. Marker is included in the response if it was
     *        sent with the request.
     * @param ?string $nextMarker When the response is truncated (the IsTruncated element value in the response is true),
     *        you can use the key name in this field as the marker parameter in the subsequent request to get the next set
     * of
     *        objects. Amazon S3 lists objects in alphabetical order. This element is returned only if you have the
     * delimiter
     *        request parameter specified. If the response does not include the NextMarker element and it is truncated, you
     * can use
     *        the value of the last Key element in the response as the marker parameter in the subsequent request to get the
     * next
     *        set of object keys.
     * @param list<\Aws\Services\S3\Shape\S3Object>|null $contents
     * @param ?string $name The bucket name.
     * @param ?string $prefix Keys that begin with the indicated prefix.
     * @param ?string $delimiter Causes keys that contain the same string between the prefix and the first occurrence of the
     *        delimiter to be rolled up into a single result element in the CommonPrefixes collection. These rolled-up keys
     * are not
     *        returned elsewhere in the response. Each rolled-up result counts as only one return against the MaxKeys value.
     * @param ?int $maxKeys The maximum number of keys returned in the response body.
     * @param list<\Aws\Services\S3\Shape\CommonPrefix>|null $commonPrefixes
     * @param ?EncodingType $encodingType Encoding type used by Amazon S3 to encode the object keys in the response.
     *        Responses are encoded only in UTF-8. An object key can contain any Unicode character. However, the XML 1.0
     * parser
     *        can't parse certain characters, such as characters with an ASCII value from 0 to 10. For characters that
     * aren't
     *        supported in XML 1.0, you can add this parameter to request that Amazon S3 encode the keys in the response.
     * For more
     *        information about characters to avoid in object key names, see Object key naming guidelines. When using the
     * URL
     *        encoding type, non-ASCII characters that are used in an object's key name will be percent-encoded according to
     * UTF-8
     *        code values. For example, the object test_file(3).png will appear as test_file%283%29.png.
     */
    public function __construct(
        public readonly ?bool $isTruncated = null,
        public readonly ?string $marker = null,
        public readonly ?string $nextMarker = null,
        public readonly ?array $contents = null,
        public readonly ?string $name = null,
        public readonly ?string $prefix = null,
        public readonly ?string $delimiter = null,
        public readonly ?int $maxKeys = null,
        public readonly ?array $commonPrefixes = null,
        EncodingType|string|null $encodingType = null,
        RequestCharged|string|null $requestCharged = null
    ) {
        $this->encodingType = $encodingType === null || $encodingType instanceof EncodingType ? $encodingType : EncodingType::fromValue($encodingType);
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listObjectsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_IS_TRUNCATED = $m[0];
        self::$SCHEMA_MARKER = $m[1];
        self::$SCHEMA_NEXT_MARKER = $m[2];
        self::$SCHEMA_CONTENTS = $m[3];
        self::$SCHEMA_NAME = $m[4];
        self::$SCHEMA_PREFIX = $m[5];
        self::$SCHEMA_DELIMITER = $m[6];
        self::$SCHEMA_MAX_KEYS = $m[7];
        self::$SCHEMA_COMMON_PREFIXES = $m[8];
        self::$SCHEMA_ENCODING_TYPE = $m[9];
        self::$SCHEMA_REQUEST_CHARGED = $m[10];
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
        if (isset($this->isTruncated)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_TRUNCATED, $this->isTruncated, 0);
        }
        if (isset($this->marker)) {
            $serializer->serializeString(self::$SCHEMA_MARKER, $this->marker, 1);
        }
        if (isset($this->nextMarker)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_MARKER, $this->nextMarker, 2);
        }
        if (isset($this->contents)) {
            $serializer->serializeList(self::$SCHEMA_CONTENTS, $this->contents, 3);
        }
        if (isset($this->name)) {
            $serializer->serializeString(self::$SCHEMA_NAME, $this->name, 4);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 5);
        }
        if (isset($this->delimiter)) {
            $serializer->serializeString(self::$SCHEMA_DELIMITER, $this->delimiter, 6);
        }
        if (isset($this->maxKeys)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_KEYS, $this->maxKeys, 7);
        }
        if (isset($this->commonPrefixes)) {
            $serializer->serializeList(self::$SCHEMA_COMMON_PREFIXES, $this->commonPrefixes, 8);
        }
        if (isset($this->encodingType)) {
            $serializer->serializeString(self::$SCHEMA_ENCODING_TYPE, $this->encodingType->value, 9);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 10);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->isTruncated,
            1 => $this->marker,
            2 => $this->nextMarker,
            3 => $this->contents,
            4 => $this->name,
            5 => $this->prefix,
            6 => $this->delimiter,
            7 => $this->maxKeys,
            8 => $this->commonPrefixes,
            9 => $this->encodingType,
            10 => $this->requestCharged,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->isTruncated,
            $this->marker,
            $this->nextMarker,
            $this->contents,
            $this->name,
            $this->prefix,
            $this->delimiter,
            $this->maxKeys,
            $this->commonPrefixes,
            $this->encodingType,
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
