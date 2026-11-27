<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * A lifecycle rule for individual objects in an Amazon S3 bucket. For more information see, Managing your storage
 * lifecycle in the Amazon S3 User Guide.
 */
final class LifecycleRule implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#LifecycleRule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STATUS;
    private static Schema $SCHEMA_EXPIRATION;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_FILTER;
    private static Schema $SCHEMA_TRANSITIONS;
    private static Schema $SCHEMA_NONCURRENT_VERSION_TRANSITIONS;
    private static Schema $SCHEMA_NONCURRENT_VERSION_EXPIRATION;
    private static Schema $SCHEMA_ABORT_INCOMPLETE_MULTIPART_UPLOAD;

    public readonly ?ExpirationStatus $status;

    /**
     * @param ?ExpirationStatus $status If 'Enabled', the rule is currently being applied. If 'Disabled', the rule is not
     *        currently being applied.
     * @param ?LifecycleExpiration $expiration Specifies the expiration for the lifecycle of the object in the form of date,
     *        days and, whether the object has a delete marker.
     * @param ?string $iD Unique identifier for the rule. The value cannot be longer than 255 characters.
     * @param ?string $prefix The general purpose bucket prefix that identifies one or more objects to which the rule
     *        applies. We recommend using Filter instead of Prefix for new PUTs. Previous configurations where a prefix is
     * defined
     *        will continue to operate as before. Replacement must be made for object keys containing special characters
     * (such as
     *        carriage returns) when using XML requests. For more information, see XML related object key constraints.
     * @param ?LifecycleRuleFilter $filter The Filter is used to identify objects that a Lifecycle Rule applies to. A Filter
     *        must have exactly one of Prefix, Tag, ObjectSizeGreaterThan, ObjectSizeLessThan, or And specified. Filter is
     * required
     *        if the LifecycleRule does not contain a Prefix element. For more information about Tag filters, see Adding
     * filters to
     *        Lifecycle rules in the Amazon S3 User Guide. Tag filters are not supported for directory buckets.
     * @param list<\Aws\Services\S3\Shape\Transition>|null $transitions
     * @param list<\Aws\Services\S3\Shape\NoncurrentVersionTransition>|null $noncurrentVersionTransitions
     */
    public function __construct(
        ExpirationStatus|string|null $status = null,
        public readonly ?LifecycleExpiration $expiration = null,
        public readonly ?string $iD = null,
        /** @deprecated */
        public readonly ?string $prefix = null,
        public readonly ?LifecycleRuleFilter $filter = null,
        public readonly ?array $transitions = null,
        public readonly ?array $noncurrentVersionTransitions = null,
        public readonly ?NoncurrentVersionExpiration $noncurrentVersionExpiration = null,
        public readonly ?AbortIncompleteMultipartUpload $abortIncompleteMultipartUpload = null
    ) {
        $this->status = $status === null || $status instanceof ExpirationStatus ? $status : ExpirationStatus::fromValue($status);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::lifecycleRule();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_STATUS = $m[0];
        self::$SCHEMA_EXPIRATION = $m[1];
        self::$SCHEMA_ID = $m[2];
        self::$SCHEMA_PREFIX = $m[3];
        self::$SCHEMA_FILTER = $m[4];
        self::$SCHEMA_TRANSITIONS = $m[5];
        self::$SCHEMA_NONCURRENT_VERSION_TRANSITIONS = $m[6];
        self::$SCHEMA_NONCURRENT_VERSION_EXPIRATION = $m[7];
        self::$SCHEMA_ABORT_INCOMPLETE_MULTIPART_UPLOAD = $m[8];
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
        if (isset($this->status)) {
            $serializer->serializeString(self::$SCHEMA_STATUS, $this->status->value, 0);
        }
        if (isset($this->expiration)) {
            $serializer->serializeStruct(self::$SCHEMA_EXPIRATION, $this->expiration, 1);
        }
        if (isset($this->iD)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->iD, 2);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 3);
        }
        if (isset($this->filter)) {
            $serializer->serializeStruct(self::$SCHEMA_FILTER, $this->filter, 4);
        }
        if (isset($this->transitions)) {
            $serializer->serializeList(self::$SCHEMA_TRANSITIONS, $this->transitions, 5);
        }
        if (isset($this->noncurrentVersionTransitions)) {
            $serializer->serializeList(self::$SCHEMA_NONCURRENT_VERSION_TRANSITIONS, $this->noncurrentVersionTransitions, 6);
        }
        if (isset($this->noncurrentVersionExpiration)) {
            $serializer->serializeStruct(self::$SCHEMA_NONCURRENT_VERSION_EXPIRATION, $this->noncurrentVersionExpiration, 7);
        }
        if (isset($this->abortIncompleteMultipartUpload)) {
            $serializer->serializeStruct(self::$SCHEMA_ABORT_INCOMPLETE_MULTIPART_UPLOAD, $this->abortIncompleteMultipartUpload, 8);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->status,
            1 => $this->expiration,
            2 => $this->iD,
            3 => $this->prefix,
            4 => $this->filter,
            5 => $this->transitions,
            6 => $this->noncurrentVersionTransitions,
            7 => $this->noncurrentVersionExpiration,
            8 => $this->abortIncompleteMultipartUpload,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->status,
            $this->expiration,
            $this->iD,
            $this->prefix,
            $this->filter,
            $this->transitions,
            $this->noncurrentVersionTransitions,
            $this->noncurrentVersionExpiration,
            $this->abortIncompleteMultipartUpload
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
