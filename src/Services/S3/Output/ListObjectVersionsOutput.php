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
final class ListObjectVersionsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListObjectVersionsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_KEY_MARKER;
    private static Schema $SCHEMA_VERSION_ID_MARKER;
    private static Schema $SCHEMA_NEXT_KEY_MARKER;
    private static Schema $SCHEMA_NEXT_VERSION_ID_MARKER;
    private static Schema $SCHEMA_VERSIONS;
    private static Schema $SCHEMA_DELETE_MARKERS;
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
     *        search criteria. If your results were truncated, you can make a follow-up paginated request by using the
     *        NextKeyMarker and NextVersionIdMarker response parameters as a starting place in another request to return the
     * rest
     *        of the results.
     * @param ?string $keyMarker Marks the last key returned in a truncated response.
     * @param ?string $versionIdMarker Marks the last version of the key returned in a truncated response.
     * @param ?string $nextKeyMarker When the number of responses exceeds the value of MaxKeys, NextKeyMarker specifies the
     *        first key not returned that satisfies the search criteria. Use this value for the key-marker request parameter
     * in a
     *        subsequent request.
     * @param ?string $nextVersionIdMarker When the number of responses exceeds the value of MaxKeys, NextVersionIdMarker
     *        specifies the first object version not returned that satisfies the search criteria. Use this value for the
     *        version-id-marker request parameter in a subsequent request.
     * @param list<\Aws\Services\S3\Shape\ObjectVersion>|null $versions
     * @param list<\Aws\Services\S3\Shape\DeleteMarkerEntry>|null $deleteMarkers
     * @param ?string $name The bucket name.
     * @param ?string $prefix Selects objects that start with the value supplied by this parameter.
     * @param ?string $delimiter The delimiter grouping the included keys. A delimiter is a character that you specify to
     *        group keys. All keys that contain the same string between the prefix and the first occurrence of the delimiter
     * are
     *        grouped under a single result element in CommonPrefixes. These groups are counted as one result against the
     * max-keys
     *        limitation. These keys are not returned elsewhere in the response.
     * @param ?int $maxKeys Specifies the maximum number of objects to return.
     * @param list<\Aws\Services\S3\Shape\CommonPrefix>|null $commonPrefixes
     * @param ?EncodingType $encodingType Encoding type used by Amazon S3 to encode object key names in the XML response. If
     *        you specify the encoding-type request parameter, Amazon S3 includes this element in the response, and returns
     * encoded
     *        key name values in the following response elements: KeyMarker, NextKeyMarker, Prefix, Key, and Delimiter.
     */
    public function __construct(
        public readonly ?bool $isTruncated = null,
        public readonly ?string $keyMarker = null,
        public readonly ?string $versionIdMarker = null,
        public readonly ?string $nextKeyMarker = null,
        public readonly ?string $nextVersionIdMarker = null,
        public readonly ?array $versions = null,
        public readonly ?array $deleteMarkers = null,
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
        $s = Schemas::listObjectVersionsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_IS_TRUNCATED = $m[0];
        self::$SCHEMA_KEY_MARKER = $m[1];
        self::$SCHEMA_VERSION_ID_MARKER = $m[2];
        self::$SCHEMA_NEXT_KEY_MARKER = $m[3];
        self::$SCHEMA_NEXT_VERSION_ID_MARKER = $m[4];
        self::$SCHEMA_VERSIONS = $m[5];
        self::$SCHEMA_DELETE_MARKERS = $m[6];
        self::$SCHEMA_NAME = $m[7];
        self::$SCHEMA_PREFIX = $m[8];
        self::$SCHEMA_DELIMITER = $m[9];
        self::$SCHEMA_MAX_KEYS = $m[10];
        self::$SCHEMA_COMMON_PREFIXES = $m[11];
        self::$SCHEMA_ENCODING_TYPE = $m[12];
        self::$SCHEMA_REQUEST_CHARGED = $m[13];
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
        if (isset($this->keyMarker)) {
            $serializer->serializeString(self::$SCHEMA_KEY_MARKER, $this->keyMarker, 1);
        }
        if (isset($this->versionIdMarker)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID_MARKER, $this->versionIdMarker, 2);
        }
        if (isset($this->nextKeyMarker)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_KEY_MARKER, $this->nextKeyMarker, 3);
        }
        if (isset($this->nextVersionIdMarker)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_VERSION_ID_MARKER, $this->nextVersionIdMarker, 4);
        }
        if (isset($this->versions)) {
            $serializer->serializeList(self::$SCHEMA_VERSIONS, $this->versions, 5);
        }
        if (isset($this->deleteMarkers)) {
            $serializer->serializeList(self::$SCHEMA_DELETE_MARKERS, $this->deleteMarkers, 6);
        }
        if (isset($this->name)) {
            $serializer->serializeString(self::$SCHEMA_NAME, $this->name, 7);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 8);
        }
        if (isset($this->delimiter)) {
            $serializer->serializeString(self::$SCHEMA_DELIMITER, $this->delimiter, 9);
        }
        if (isset($this->maxKeys)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_KEYS, $this->maxKeys, 10);
        }
        if (isset($this->commonPrefixes)) {
            $serializer->serializeList(self::$SCHEMA_COMMON_PREFIXES, $this->commonPrefixes, 11);
        }
        if (isset($this->encodingType)) {
            $serializer->serializeString(self::$SCHEMA_ENCODING_TYPE, $this->encodingType->value, 12);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 13);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->isTruncated,
            1 => $this->keyMarker,
            2 => $this->versionIdMarker,
            3 => $this->nextKeyMarker,
            4 => $this->nextVersionIdMarker,
            5 => $this->versions,
            6 => $this->deleteMarkers,
            7 => $this->name,
            8 => $this->prefix,
            9 => $this->delimiter,
            10 => $this->maxKeys,
            11 => $this->commonPrefixes,
            12 => $this->encodingType,
            13 => $this->requestCharged,
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
            $this->keyMarker,
            $this->versionIdMarker,
            $this->nextKeyMarker,
            $this->nextVersionIdMarker,
            $this->versions,
            $this->deleteMarkers,
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
