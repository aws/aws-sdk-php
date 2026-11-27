<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\ChecksumType;
use Aws\Services\S3\Shape\Initiator;
use Aws\Services\S3\Shape\Owner;
use Aws\Services\S3\Shape\RequestCharged;
use Aws\Services\S3\Shape\StorageClass;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class ListPartsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListPartsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ABORT_DATE;
    private static Schema $SCHEMA_ABORT_RULE_ID;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_UPLOAD_ID;
    private static Schema $SCHEMA_PART_NUMBER_MARKER;
    private static Schema $SCHEMA_NEXT_PART_NUMBER_MARKER;
    private static Schema $SCHEMA_MAX_PARTS;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_PARTS;
    private static Schema $SCHEMA_INITIATOR;
    private static Schema $SCHEMA_OWNER;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_REQUEST_CHARGED;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CHECKSUM_TYPE;
    private static Schema $SCHEMA_VERSION_ID;

    public readonly ?StorageClass $storageClass;
    public readonly ?RequestCharged $requestCharged;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?ChecksumType $checksumType;

    /**
     * @param ?float $abortDate If the bucket has a lifecycle rule configured with an action to abort incomplete multipart
     *        uploads and the prefix in the lifecycle rule matches the object name in the request, then the response
     * includes this
     *        header indicating when the initiated multipart upload will become eligible for abort operation. For more
     * information,
     *        see Aborting Incomplete Multipart Uploads Using a Bucket Lifecycle Configuration. The response will also
     * include the
     *        x-amz-abort-rule-id header that will provide the ID of the lifecycle configuration rule that defines this
     * action.
     *        This functionality is not supported for directory buckets.
     * @param ?string $abortRuleId This header is returned along with the x-amz-abort-date header. It identifies applicable
     *        lifecycle configuration rule that defines the action to abort incomplete multipart uploads. This functionality
     * is not
     *        supported for directory buckets.
     * @param ?string $bucket The name of the bucket to which the multipart upload was initiated. Does not return the access
     *        point ARN or access point alias if used.
     * @param ?string $key Object key for which the multipart upload was initiated.
     * @param ?string $uploadId Upload ID identifying the multipart upload whose parts are being listed.
     * @param ?string $partNumberMarker Specifies the part after which listing should begin. Only parts with higher part
     *        numbers will be listed.
     * @param ?string $nextPartNumberMarker When a list is truncated, this element specifies the last part in the list, as
     *        well as the value to use for the part-number-marker request parameter in a subsequent request.
     * @param ?int $maxParts Maximum number of parts that were allowed in the response.
     * @param ?bool $isTruncated Indicates whether the returned list of parts is truncated. A true value indicates that the
     *        list was truncated. A list can be truncated if the number of parts exceeds the limit returned in the MaxParts
     *        element.
     * @param list<\Aws\Services\S3\Shape\Part>|null $parts
     * @param ?Initiator $initiator Container element that identifies who initiated the multipart upload. If the initiator
     *        is an Amazon Web Services account, this element provides the same information as the Owner element. If the
     * initiator
     *        is an IAM User, this element provides the user ARN.
     * @param ?Owner $owner Container element that identifies the object owner, after the object is created. If multipart
     *        upload is initiated by an IAM user, this element provides the parent account ID. Directory buckets - The
     * bucket owner
     *        is returned as the object owner for all the parts.
     * @param ?StorageClass $storageClass The class of storage used to store the uploaded object. Directory buckets -
     *        Directory buckets only support EXPRESS_ONEZONE (the S3 Express One Zone storage class) in Availability Zones
     * and
     *        ONEZONE_IA (the S3 One Zone-Infrequent Access storage class) in Dedicated Local Zones.
     * @param ?ChecksumAlgorithm $checksumAlgorithm The algorithm that was used to create a checksum of the object.
     * @param ?ChecksumType $checksumType The checksum type, which determines how part-level checksums are combined to
     *        create an object-level checksum for multipart objects. You can use this header response to verify that the
     * checksum
     *        type that is received is the same checksum type that was specified in CreateMultipartUpload request. For more
     *        information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $versionId Version ID of the object. Returns the Version ID of the object for the listed parts, if
     *        bucket versioning is enabled. This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?float $abortDate = null,
        public readonly ?string $abortRuleId = null,
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $uploadId = null,
        public readonly ?string $partNumberMarker = null,
        public readonly ?string $nextPartNumberMarker = null,
        public readonly ?int $maxParts = null,
        public readonly ?bool $isTruncated = null,
        public readonly ?array $parts = null,
        public readonly ?Initiator $initiator = null,
        public readonly ?Owner $owner = null,
        StorageClass|string|null $storageClass = null,
        RequestCharged|string|null $requestCharged = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        ChecksumType|string|null $checksumType = null,
        public readonly ?string $versionId = null
    ) {
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listPartsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ABORT_DATE = $m[0];
        self::$SCHEMA_ABORT_RULE_ID = $m[1];
        self::$SCHEMA_BUCKET = $m[2];
        self::$SCHEMA_KEY = $m[3];
        self::$SCHEMA_UPLOAD_ID = $m[4];
        self::$SCHEMA_PART_NUMBER_MARKER = $m[5];
        self::$SCHEMA_NEXT_PART_NUMBER_MARKER = $m[6];
        self::$SCHEMA_MAX_PARTS = $m[7];
        self::$SCHEMA_IS_TRUNCATED = $m[8];
        self::$SCHEMA_PARTS = $m[9];
        self::$SCHEMA_INITIATOR = $m[10];
        self::$SCHEMA_OWNER = $m[11];
        self::$SCHEMA_STORAGE_CLASS = $m[12];
        self::$SCHEMA_REQUEST_CHARGED = $m[13];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[14];
        self::$SCHEMA_CHECKSUM_TYPE = $m[15];
        self::$SCHEMA_VERSION_ID = $m[16];
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
        if (isset($this->abortDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_ABORT_DATE, $this->abortDate, 0);
        }
        if (isset($this->abortRuleId)) {
            $serializer->serializeString(self::$SCHEMA_ABORT_RULE_ID, $this->abortRuleId, 1);
        }
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 2);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 3);
        }
        if (isset($this->uploadId)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID, $this->uploadId, 4);
        }
        if (isset($this->partNumberMarker)) {
            $serializer->serializeString(self::$SCHEMA_PART_NUMBER_MARKER, $this->partNumberMarker, 5);
        }
        if (isset($this->nextPartNumberMarker)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_PART_NUMBER_MARKER, $this->nextPartNumberMarker, 6);
        }
        if (isset($this->maxParts)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_PARTS, $this->maxParts, 7);
        }
        if (isset($this->isTruncated)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_TRUNCATED, $this->isTruncated, 8);
        }
        if (isset($this->parts)) {
            $serializer->serializeList(self::$SCHEMA_PARTS, $this->parts, 9);
        }
        if (isset($this->initiator)) {
            $serializer->serializeStruct(self::$SCHEMA_INITIATOR, $this->initiator, 10);
        }
        if (isset($this->owner)) {
            $serializer->serializeStruct(self::$SCHEMA_OWNER, $this->owner, 11);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 12);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 13);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 14);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 15);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 16);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->abortDate,
            1 => $this->abortRuleId,
            2 => $this->bucket,
            3 => $this->key,
            4 => $this->uploadId,
            5 => $this->partNumberMarker,
            6 => $this->nextPartNumberMarker,
            7 => $this->maxParts,
            8 => $this->isTruncated,
            9 => $this->parts,
            10 => $this->initiator,
            11 => $this->owner,
            12 => $this->storageClass,
            13 => $this->requestCharged,
            14 => $this->checksumAlgorithm,
            15 => $this->checksumType,
            16 => $this->versionId,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->abortDate,
            $this->abortRuleId,
            $this->bucket,
            $this->key,
            $this->uploadId,
            $this->partNumberMarker,
            $this->nextPartNumberMarker,
            $this->maxParts,
            $this->isTruncated,
            $this->parts,
            $this->initiator,
            $this->owner,
            $this->storageClass,
            $this->requestCharged,
            $this->checksumAlgorithm,
            $this->checksumType,
            $this->versionId
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
