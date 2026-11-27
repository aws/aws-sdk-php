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
 * A container for describing a condition that must be met for the specified redirect to apply. For example, 1. If
 * request is for pages in the /docs folder, redirect to the /documents folder. 2. If request results in HTTP error 4xx,
 * redirect request to another host where you might process the error.
 */
final class Condition implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Condition';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_HTTP_ERROR_CODE_RETURNED_EQUALS;
    private static Schema $SCHEMA_KEY_PREFIX_EQUALS;

    /**
     * @param ?string $httpErrorCodeReturnedEquals The HTTP error code when the redirect is applied. In the event of an
     *        error, if the error code equals this value, then the specified redirect is applied. Required when parent
     * element
     *        Condition is specified and sibling KeyPrefixEquals is not specified. If both are specified, then both must be
     * true
     *        for the redirect to be applied.
     * @param ?string $keyPrefixEquals The object key name prefix when the redirect is applied. For example, to redirect
     *        requests for ExamplePage.html, the key prefix will be ExamplePage.html. To redirect request for all pages with
     * the
     *        prefix docs/, the key prefix will be /docs, which identifies all objects in the docs/ folder. Required when
     * the
     *        parent element Condition is specified and sibling HttpErrorCodeReturnedEquals is not specified. If both
     * conditions
     *        are specified, both must be true for the redirect to be applied. Replacement must be made for object keys
     * containing
     *        special characters (such as carriage returns) when using XML requests. For more information, see XML related
     * object
     *        key constraints.
     */
    public function __construct(
        public readonly ?string $httpErrorCodeReturnedEquals = null,
        public readonly ?string $keyPrefixEquals = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::condition();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_HTTP_ERROR_CODE_RETURNED_EQUALS = $m[0];
        self::$SCHEMA_KEY_PREFIX_EQUALS = $m[1];
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
        if (isset($this->httpErrorCodeReturnedEquals)) {
            $serializer->serializeString(self::$SCHEMA_HTTP_ERROR_CODE_RETURNED_EQUALS, $this->httpErrorCodeReturnedEquals, 0);
        }
        if (isset($this->keyPrefixEquals)) {
            $serializer->serializeString(self::$SCHEMA_KEY_PREFIX_EQUALS, $this->keyPrefixEquals, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->httpErrorCodeReturnedEquals,
            1 => $this->keyPrefixEquals,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->httpErrorCodeReturnedEquals,
            $this->keyPrefixEquals
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
