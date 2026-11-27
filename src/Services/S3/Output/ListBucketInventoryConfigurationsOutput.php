<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class ListBucketInventoryConfigurationsOutput implements
    SerializableStructInterface,
    \ArrayAccess,
    JsonSerializable
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListBucketInventoryConfigurationsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_INVENTORY_CONFIGURATION_LIST;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_NEXT_CONTINUATION_TOKEN;

    /**
     * @param ?string $continuationToken If sent in the request, the marker that is used as a starting point for this
     *        inventory configuration list response.
     * @param list<\Aws\Services\S3\Shape\InventoryConfiguration>|null $inventoryConfigurationList
     * @param ?bool $isTruncated Tells whether the returned list of inventory configurations is complete. A value of true
     *        indicates that the list is not complete and the NextContinuationToken is provided for a subsequent request.
     * @param ?string $nextContinuationToken The marker used to continue this inventory configuration listing. Use the
     *        NextContinuationToken from this response to continue the listing in a subsequent request. The continuation
     * token is
     *        an opaque value that Amazon S3 understands.
     */
    public function __construct(
        public readonly ?string $continuationToken = null,
        public readonly ?array $inventoryConfigurationList = null,
        public readonly ?bool $isTruncated = null,
        public readonly ?string $nextContinuationToken = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listBucketInventoryConfigurationsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CONTINUATION_TOKEN = $m[0];
        self::$SCHEMA_INVENTORY_CONFIGURATION_LIST = $m[1];
        self::$SCHEMA_IS_TRUNCATED = $m[2];
        self::$SCHEMA_NEXT_CONTINUATION_TOKEN = $m[3];
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
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 0);
        }
        if (isset($this->inventoryConfigurationList)) {
            $serializer->serializeList(self::$SCHEMA_INVENTORY_CONFIGURATION_LIST, $this->inventoryConfigurationList, 1);
        }
        if (isset($this->isTruncated)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_TRUNCATED, $this->isTruncated, 2);
        }
        if (isset($this->nextContinuationToken)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_CONTINUATION_TOKEN, $this->nextContinuationToken, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->continuationToken,
            1 => $this->inventoryConfigurationList,
            2 => $this->isTruncated,
            3 => $this->nextContinuationToken,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->continuationToken,
            $this->inventoryConfigurationList,
            $this->isTruncated,
            $this->nextContinuationToken
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
