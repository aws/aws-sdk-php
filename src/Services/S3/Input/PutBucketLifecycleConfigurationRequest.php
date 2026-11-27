<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\BucketLifecycleConfiguration;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\TransitionDefaultMinimumObjectSize;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutBucketLifecycleConfigurationRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutBucketLifecycleConfigurationRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_LIFECYCLE_CONFIGURATION;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_TRANSITION_DEFAULT_MINIMUM_OBJECT_SIZE;

    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?TransitionDefaultMinimumObjectSize $transitionDefaultMinimumObjectSize;

    /**
     * @param ?string $bucket The name of the bucket for which to set the configuration.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the request when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum or x-amz-trailer header sent. Otherwise, Amazon S3
     * fails
     *        the request with the HTTP status code 400 Bad Request. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide. If you provide an individual checksum, Amazon S3 ignores any provided ChecksumAlgorithm
     *        parameter.
     * @param ?BucketLifecycleConfiguration $lifecycleConfiguration Container for lifecycle rules. You can add as many as
     *        1,000 rules.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied). This parameter applies to general purpose buckets only. It is not supported for directory bucket
     * lifecycle
     *        configurations.
     * @param ?TransitionDefaultMinimumObjectSize $transitionDefaultMinimumObjectSize Indicates which default minimum object
     *        size behavior is applied to the lifecycle configuration. This parameter applies to general purpose buckets
     * only. It
     *        is not supported for directory bucket lifecycle configurations. all_storage_classes_128K - Objects smaller
     * than 128
     *        KB will not transition to any storage class by default. varies_by_storage_class - Objects smaller than 128 KB
     * will
     *        transition to Glacier Flexible Retrieval or Glacier Deep Archive storage classes. By default, all other
     * storage
     *        classes will prevent transitions smaller than 128 KB. To customize the minimum object size for any transition
     * you can
     *        add a filter that specifies a custom ObjectSizeGreaterThan or ObjectSizeLessThan in the body of your
     * transition rule.
     *        Custom filters always take precedence over the default transition behavior.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        public readonly ?BucketLifecycleConfiguration $lifecycleConfiguration = null,
        public readonly ?string $expectedBucketOwner = null,
        TransitionDefaultMinimumObjectSize|string|null $transitionDefaultMinimumObjectSize = null
    ) {
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
        $this->transitionDefaultMinimumObjectSize = $transitionDefaultMinimumObjectSize === null || $transitionDefaultMinimumObjectSize instanceof TransitionDefaultMinimumObjectSize ? $transitionDefaultMinimumObjectSize : TransitionDefaultMinimumObjectSize::fromValue($transitionDefaultMinimumObjectSize);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::putBucketLifecycleConfigurationRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[1];
        self::$SCHEMA_LIFECYCLE_CONFIGURATION = $m[2];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[3];
        self::$SCHEMA_TRANSITION_DEFAULT_MINIMUM_OBJECT_SIZE = $m[4];
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
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 1);
        }
        if (isset($this->lifecycleConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_LIFECYCLE_CONFIGURATION, $this->lifecycleConfiguration, 2);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 3);
        }
        if (isset($this->transitionDefaultMinimumObjectSize)) {
            $serializer->serializeString(self::$SCHEMA_TRANSITION_DEFAULT_MINIMUM_OBJECT_SIZE, $this->transitionDefaultMinimumObjectSize->value, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->checksumAlgorithm,
            2 => $this->lifecycleConfiguration,
            3 => $this->expectedBucketOwner,
            4 => $this->transitionDefaultMinimumObjectSize,
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
            $this->checksumAlgorithm,
            $this->lifecycleConfiguration,
            $this->expectedBucketOwner,
            $this->transitionDefaultMinimumObjectSize
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
