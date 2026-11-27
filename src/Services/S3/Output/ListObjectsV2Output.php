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
final class ListObjectsV2Output implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListObjectsV2Output';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_CONTENTS;
    private static Schema $SCHEMA_NAME;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_DELIMITER;
    private static Schema $SCHEMA_MAX_KEYS;
    private static Schema $SCHEMA_COMMON_PREFIXES;
    private static Schema $SCHEMA_ENCODING_TYPE;
    private static Schema $SCHEMA_KEY_COUNT;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_NEXT_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_START_AFTER;
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?EncodingType $encodingType;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?bool $isTruncated Set to false if all of the results were returned. Set to true if more keys are available to
     *        return. If the number of results exceeds that specified by MaxKeys, all of the results might not be returned.
     * @param list<\Aws\Services\S3\Shape\S3Object>|null $contents
     * @param ?string $name The bucket name.
     * @param ?string $prefix Keys that begin with the indicated prefix. Directory buckets - For directory buckets, only
     *        prefixes that end in a delimiter (/) are supported.
     * @param ?string $delimiter Causes keys that contain the same string between the prefix and the first occurrence of the
     *        delimiter to be rolled up into a single result element in the CommonPrefixes collection. These rolled-up keys
     * are not
     *        returned elsewhere in the response. Each rolled-up result counts as only one return against the MaxKeys value.
     *        Directory buckets - For directory buckets, / is the only supported delimiter.
     * @param ?int $maxKeys Sets the maximum number of keys returned in the response. By default, the action returns up to
     *        1,000 key names. The response might contain fewer keys but will never contain more.
     * @param list<\Aws\Services\S3\Shape\CommonPrefix>|null $commonPrefixes
     * @param ?EncodingType $encodingType Encoding type used by Amazon S3 to encode object key names in the XML response. If
     *        you specify the encoding-type request parameter, Amazon S3 includes this element in the response, and returns
     * encoded
     *        key name values in the following response elements: Delimiter, Prefix, Key, and StartAfter.
     * @param ?int $keyCount KeyCount is the number of keys returned with this request. KeyCount will always be less than or
     *        equal to the MaxKeys field. For example, if you ask for 50 keys, your result will include 50 keys or fewer.
     * @param ?string $continuationToken If ContinuationToken was sent with the request, it is included in the response. You
     *        can use the returned ContinuationToken for pagination of the list response.
     * @param ?string $nextContinuationToken NextContinuationToken is sent when isTruncated is true, which means there are
     *        more keys in the bucket that can be listed. The next list requests to Amazon S3 can be continued with this
     *        NextContinuationToken. NextContinuationToken is obfuscated and is not a real key
     * @param ?string $startAfter If StartAfter was sent with the request, it is included in the response. This
     *        functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?bool $isTruncated = null,
        public readonly ?array $contents = null,
        public readonly ?string $name = null,
        public readonly ?string $prefix = null,
        public readonly ?string $delimiter = null,
        public readonly ?int $maxKeys = null,
        public readonly ?array $commonPrefixes = null,
        EncodingType|string|null $encodingType = null,
        public readonly ?int $keyCount = null,
        public readonly ?string $continuationToken = null,
        public readonly ?string $nextContinuationToken = null,
        public readonly ?string $startAfter = null,
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
        $s = Schemas::listObjectsV2Output();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_IS_TRUNCATED = $m[0];
        self::$SCHEMA_CONTENTS = $m[1];
        self::$SCHEMA_NAME = $m[2];
        self::$SCHEMA_PREFIX = $m[3];
        self::$SCHEMA_DELIMITER = $m[4];
        self::$SCHEMA_MAX_KEYS = $m[5];
        self::$SCHEMA_COMMON_PREFIXES = $m[6];
        self::$SCHEMA_ENCODING_TYPE = $m[7];
        self::$SCHEMA_KEY_COUNT = $m[8];
        self::$SCHEMA_CONTINUATION_TOKEN = $m[9];
        self::$SCHEMA_NEXT_CONTINUATION_TOKEN = $m[10];
        self::$SCHEMA_START_AFTER = $m[11];
        self::$SCHEMA_REQUEST_CHARGED = $m[12];
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
        if (isset($this->contents)) {
            $serializer->serializeList(self::$SCHEMA_CONTENTS, $this->contents, 1);
        }
        if (isset($this->name)) {
            $serializer->serializeString(self::$SCHEMA_NAME, $this->name, 2);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 3);
        }
        if (isset($this->delimiter)) {
            $serializer->serializeString(self::$SCHEMA_DELIMITER, $this->delimiter, 4);
        }
        if (isset($this->maxKeys)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_KEYS, $this->maxKeys, 5);
        }
        if (isset($this->commonPrefixes)) {
            $serializer->serializeList(self::$SCHEMA_COMMON_PREFIXES, $this->commonPrefixes, 6);
        }
        if (isset($this->encodingType)) {
            $serializer->serializeString(self::$SCHEMA_ENCODING_TYPE, $this->encodingType->value, 7);
        }
        if (isset($this->keyCount)) {
            $serializer->serializeInteger(self::$SCHEMA_KEY_COUNT, $this->keyCount, 8);
        }
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 9);
        }
        if (isset($this->nextContinuationToken)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_CONTINUATION_TOKEN, $this->nextContinuationToken, 10);
        }
        if (isset($this->startAfter)) {
            $serializer->serializeString(self::$SCHEMA_START_AFTER, $this->startAfter, 11);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 12);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->isTruncated,
            1 => $this->contents,
            2 => $this->name,
            3 => $this->prefix,
            4 => $this->delimiter,
            5 => $this->maxKeys,
            6 => $this->commonPrefixes,
            7 => $this->encodingType,
            8 => $this->keyCount,
            9 => $this->continuationToken,
            10 => $this->nextContinuationToken,
            11 => $this->startAfter,
            12 => $this->requestCharged,
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
            $this->contents,
            $this->name,
            $this->prefix,
            $this->delimiter,
            $this->maxKeys,
            $this->commonPrefixes,
            $this->encodingType,
            $this->keyCount,
            $this->continuationToken,
            $this->nextContinuationToken,
            $this->startAfter,
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
