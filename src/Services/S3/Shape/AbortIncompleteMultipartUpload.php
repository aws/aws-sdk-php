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
 * Specifies the days since the initiation of an incomplete multipart upload that Amazon S3 will wait before permanently
 * removing all parts of the upload. For more information, see Aborting Incomplete Multipart Uploads Using a Bucket
 * Lifecycle Configuration in the Amazon S3 User Guide.
 */
final class AbortIncompleteMultipartUpload implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AbortIncompleteMultipartUpload';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DAYS_AFTER_INITIATION;

    /**
     * @param ?int $daysAfterInitiation Specifies the number of days after which Amazon S3 aborts an incomplete multipart
     *        upload.
     */
    public function __construct(
        public readonly ?int $daysAfterInitiation = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::abortIncompleteMultipartUpload();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DAYS_AFTER_INITIATION = $m[0];
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
        if (isset($this->daysAfterInitiation)) {
            $serializer->serializeInteger(self::$SCHEMA_DAYS_AFTER_INITIATION, $this->daysAfterInitiation, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->daysAfterInitiation,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->daysAfterInitiation
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
