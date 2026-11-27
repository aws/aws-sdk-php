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

final class RenameObjectRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#RenameObjectRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_RENAME_SOURCE;
    private static Schema $SCHEMA_DESTINATION_IF_MATCH;
    private static Schema $SCHEMA_DESTINATION_IF_NONE_MATCH;
    private static Schema $SCHEMA_DESTINATION_IF_MODIFIED_SINCE;
    private static Schema $SCHEMA_DESTINATION_IF_UNMODIFIED_SINCE;
    private static Schema $SCHEMA_SOURCE_IF_MATCH;
    private static Schema $SCHEMA_SOURCE_IF_NONE_MATCH;
    private static Schema $SCHEMA_SOURCE_IF_MODIFIED_SINCE;
    private static Schema $SCHEMA_SOURCE_IF_UNMODIFIED_SINCE;
    private static Schema $SCHEMA_CLIENT_TOKEN;

    /**
     * @param ?string $bucket The bucket name of the directory bucket containing the object. You must use
     *        virtual-hosted-style requests in the format Bucket-name.s3express-zone-id.region-code.amazonaws.com.
     * Path-style
     *        requests are not supported. Directory bucket names must be unique in the chosen Availability Zone. Bucket
     * names must
     *        follow the format bucket-base-name--zone-id--x-s3 (for example, amzn-s3-demo-bucket--usw2-az1--x-s3). For
     * information
     *        about bucket naming restrictions, see Directory bucket naming rules in the Amazon S3 User Guide.
     * @param ?string $key Key name of the object to rename.
     * @param ?string $renameSource Specifies the source for the rename operation. The value must be URL encoded.
     * @param ?string $destinationIfMatch Renames the object only if the ETag (entity tag) value provided during the
     *        operation matches the ETag of the object in S3. The If-Match header field makes the request method conditional
     * on
     *        ETags. If the ETag values do not match, the operation returns a 412 Precondition Failed error. Expects the
     * ETag value
     *        as a string.
     * @param ?string $destinationIfNoneMatch Renames the object only if the destination does not already exist in the
     *        specified directory bucket. If the object does exist when you send a request with If-None-Match:*, the S3 API
     * will
     *        return a 412 Precondition Failed error, preventing an overwrite. The If-None-Match header prevents overwrites
     * of
     *        existing data by validating that there's not an object with the same key name already in your directory
     * bucket.
     *        Expects the * character (asterisk).
     * @param ?float $destinationIfModifiedSince Renames the object if the destination exists and if it has been modified
     *        since the specified time.
     * @param ?float $destinationIfUnmodifiedSince Renames the object if it hasn't been modified since the specified time.
     * @param ?string $sourceIfMatch Renames the object if the source exists and if its entity tag (ETag) matches the
     *        specified ETag.
     * @param ?string $sourceIfNoneMatch Renames the object if the source exists and if its entity tag (ETag) is different
     *        than the specified ETag. If an asterisk (*) character is provided, the operation will fail and return a 412
     *        Precondition Failed error.
     * @param ?float $sourceIfModifiedSince Renames the object if the source exists and if it has been modified since the
     *        specified time.
     * @param ?float $sourceIfUnmodifiedSince Renames the object if the source exists and hasn't been modified since the
     *        specified time.
     * @param ?string $clientToken A unique string with a max of 64 ASCII characters in the ASCII range of 33 - 126.
     *        RenameObject supports idempotency using a client token. To make an idempotent API request using RenameObject,
     * specify
     *        a client token in the request. You should not reuse the same client token for other API requests. If you retry
     * a
     *        request that completed successfully using the same client token and the same parameters, the retry succeeds
     * without
     *        performing any further actions. If you retry a successful request using the same client token, but one or more
     * of the
     *        parameters are different, the retry fails and an IdempotentParameterMismatch error is returned.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $renameSource = null,
        public readonly ?string $destinationIfMatch = null,
        public readonly ?string $destinationIfNoneMatch = null,
        public readonly ?float $destinationIfModifiedSince = null,
        public readonly ?float $destinationIfUnmodifiedSince = null,
        public readonly ?string $sourceIfMatch = null,
        public readonly ?string $sourceIfNoneMatch = null,
        public readonly ?float $sourceIfModifiedSince = null,
        public readonly ?float $sourceIfUnmodifiedSince = null,
        public readonly ?string $clientToken = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::renameObjectRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_RENAME_SOURCE = $m[2];
        self::$SCHEMA_DESTINATION_IF_MATCH = $m[3];
        self::$SCHEMA_DESTINATION_IF_NONE_MATCH = $m[4];
        self::$SCHEMA_DESTINATION_IF_MODIFIED_SINCE = $m[5];
        self::$SCHEMA_DESTINATION_IF_UNMODIFIED_SINCE = $m[6];
        self::$SCHEMA_SOURCE_IF_MATCH = $m[7];
        self::$SCHEMA_SOURCE_IF_NONE_MATCH = $m[8];
        self::$SCHEMA_SOURCE_IF_MODIFIED_SINCE = $m[9];
        self::$SCHEMA_SOURCE_IF_UNMODIFIED_SINCE = $m[10];
        self::$SCHEMA_CLIENT_TOKEN = $m[11];
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
        if (isset($this->renameSource)) {
            $serializer->serializeString(self::$SCHEMA_RENAME_SOURCE, $this->renameSource, 2);
        }
        if (isset($this->destinationIfMatch)) {
            $serializer->serializeString(self::$SCHEMA_DESTINATION_IF_MATCH, $this->destinationIfMatch, 3);
        }
        if (isset($this->destinationIfNoneMatch)) {
            $serializer->serializeString(self::$SCHEMA_DESTINATION_IF_NONE_MATCH, $this->destinationIfNoneMatch, 4);
        }
        if (isset($this->destinationIfModifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_DESTINATION_IF_MODIFIED_SINCE, $this->destinationIfModifiedSince, 5);
        }
        if (isset($this->destinationIfUnmodifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_DESTINATION_IF_UNMODIFIED_SINCE, $this->destinationIfUnmodifiedSince, 6);
        }
        if (isset($this->sourceIfMatch)) {
            $serializer->serializeString(self::$SCHEMA_SOURCE_IF_MATCH, $this->sourceIfMatch, 7);
        }
        if (isset($this->sourceIfNoneMatch)) {
            $serializer->serializeString(self::$SCHEMA_SOURCE_IF_NONE_MATCH, $this->sourceIfNoneMatch, 8);
        }
        if (isset($this->sourceIfModifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_SOURCE_IF_MODIFIED_SINCE, $this->sourceIfModifiedSince, 9);
        }
        if (isset($this->sourceIfUnmodifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_SOURCE_IF_UNMODIFIED_SINCE, $this->sourceIfUnmodifiedSince, 10);
        }
        if (isset($this->clientToken)) {
            $serializer->serializeString(self::$SCHEMA_CLIENT_TOKEN, $this->clientToken, 11);
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
            2 => $this->renameSource,
            3 => $this->destinationIfMatch,
            4 => $this->destinationIfNoneMatch,
            5 => $this->destinationIfModifiedSince,
            6 => $this->destinationIfUnmodifiedSince,
            7 => $this->sourceIfMatch,
            8 => $this->sourceIfNoneMatch,
            9 => $this->sourceIfModifiedSince,
            10 => $this->sourceIfUnmodifiedSince,
            11 => $this->clientToken,
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
            $this->renameSource,
            $this->destinationIfMatch,
            $this->destinationIfNoneMatch,
            $this->destinationIfModifiedSince,
            $this->destinationIfUnmodifiedSince,
            $this->sourceIfMatch,
            $this->sourceIfNoneMatch,
            $this->sourceIfModifiedSince,
            $this->sourceIfUnmodifiedSince,
            $this->clientToken
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
