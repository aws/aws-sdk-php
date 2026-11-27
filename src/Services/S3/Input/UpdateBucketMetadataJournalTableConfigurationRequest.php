<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\JournalTableConfigurationUpdates;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class UpdateBucketMetadataJournalTableConfigurationRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#UpdateBucketMetadataJournalTableConfigurationRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_JOURNAL_TABLE_CONFIGURATION;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?ChecksumAlgorithm $checksumAlgorithm;

    /**
     * @param ?string $bucket The general purpose bucket that corresponds to the metadata configuration that you want to
     *        enable or disable journal table record expiration for.
     * @param ?JournalTableConfigurationUpdates $journalTableConfiguration The contents of your journal table configuration.
     * @param ?string $contentMD5 The Content-MD5 header for the journal table configuration.
     * @param ?ChecksumAlgorithm $checksumAlgorithm The checksum algorithm to use with your journal table configuration.
     * @param ?string $expectedBucketOwner The expected owner of the general purpose bucket that corresponds to the metadata
     *        table configuration that you want to enable or disable journal table record expiration for.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?JournalTableConfigurationUpdates $journalTableConfiguration = null,
        public readonly ?string $contentMD5 = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::updateBucketMetadataJournalTableConfigurationRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_JOURNAL_TABLE_CONFIGURATION = $m[1];
        self::$SCHEMA_CONTENT_MD5 = $m[2];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[3];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[4];
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
        if (isset($this->journalTableConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_JOURNAL_TABLE_CONFIGURATION, $this->journalTableConfiguration, 1);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 2);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 3);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->journalTableConfiguration,
            2 => $this->contentMD5,
            3 => $this->checksumAlgorithm,
            4 => $this->expectedBucketOwner,
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
            $this->journalTableConfiguration,
            $this->contentMD5,
            $this->checksumAlgorithm,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
