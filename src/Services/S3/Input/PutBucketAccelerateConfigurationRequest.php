<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\AccelerateConfiguration;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutBucketAccelerateConfigurationRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutBucketAccelerateConfigurationRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_ACCELERATE_CONFIGURATION;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;

    public readonly ?ChecksumAlgorithm $checksumAlgorithm;

    /**
     * @param ?string $bucket The name of the bucket for which the accelerate configuration is set.
     * @param ?AccelerateConfiguration $accelerateConfiguration Container for setting the transfer acceleration state.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the request when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum or x-amz-trailer header sent. Otherwise, Amazon S3
     * fails
     *        the request with the HTTP status code 400 Bad Request. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide. If you provide an individual checksum, Amazon S3 ignores any provided ChecksumAlgorithm
     *        parameter.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?AccelerateConfiguration $accelerateConfiguration = null,
        public readonly ?string $expectedBucketOwner = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null
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
        $s = Schemas::putBucketAccelerateConfigurationRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_ACCELERATE_CONFIGURATION = $m[1];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[2];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[3];
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
        if (isset($this->accelerateConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_ACCELERATE_CONFIGURATION, $this->accelerateConfiguration, 1);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 2);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->accelerateConfiguration,
            2 => $this->expectedBucketOwner,
            3 => $this->checksumAlgorithm,
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
            $this->accelerateConfiguration,
            $this->expectedBucketOwner,
            $this->checksumAlgorithm
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
