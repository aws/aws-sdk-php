<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class ListBucketIntelligentTieringConfigurationsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_NEXT_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_INTELLIGENT_TIERING_CONFIGURATION_LIST;

    /**
     * @param ?bool $isTruncated Indicates whether the returned list of analytics configurations is complete. A value of
     *        true indicates that the list is not complete and the NextContinuationToken will be provided for a subsequent
     * request.
     * @param ?string $continuationToken The ContinuationToken that represents a placeholder from where this request should
     *        begin.
     * @param ?string $nextContinuationToken The marker used to continue this inventory configuration listing. Use the
     *        NextContinuationToken from this response to continue the listing in a subsequent request. The continuation
     * token is
     *        an opaque value that Amazon S3 understands.
     * @param list<\Aws\Services\S3\Shape\IntelligentTieringConfiguration>|null $intelligentTieringConfigurationList
     */
    public function __construct(
        public readonly ?bool $isTruncated = null,
        public readonly ?string $continuationToken = null,
        public readonly ?string $nextContinuationToken = null,
        public readonly ?array $intelligentTieringConfigurationList = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listBucketIntelligentTieringConfigurationsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_IS_TRUNCATED = $m[0];
        self::$SCHEMA_CONTINUATION_TOKEN = $m[1];
        self::$SCHEMA_NEXT_CONTINUATION_TOKEN = $m[2];
        self::$SCHEMA_INTELLIGENT_TIERING_CONFIGURATION_LIST = $m[3];
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
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 1);
        }
        if (isset($this->nextContinuationToken)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_CONTINUATION_TOKEN, $this->nextContinuationToken, 2);
        }
        if (isset($this->intelligentTieringConfigurationList)) {
            $serializer->serializeList(self::$SCHEMA_INTELLIGENT_TIERING_CONFIGURATION_LIST, $this->intelligentTieringConfigurationList, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->isTruncated,
            1 => $this->continuationToken,
            2 => $this->nextContinuationToken,
            3 => $this->intelligentTieringConfigurationList,
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
            $this->continuationToken,
            $this->nextContinuationToken,
            $this->intelligentTieringConfigurationList
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
