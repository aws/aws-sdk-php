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
 * Specifies the redirect behavior and when a redirect is applied. For more information about routing rules, see
 * Configuring advanced conditional redirects in the Amazon S3 User Guide.
 */
final class RoutingRule implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#RoutingRule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_REDIRECT;
    private static Schema $SCHEMA_CONDITION;

    /**
     * @param ?Redirect $redirect Container for redirect information. You can redirect requests to another host, to another
     *        page, or with another protocol. In the event of an error, you can specify a different error code to return.
     * @param ?Condition $condition A container for describing a condition that must be met for the specified redirect to
     *        apply. For example, 1. If request is for pages in the /docs folder, redirect to the /documents folder. 2. If
     * request
     *        results in HTTP error 4xx, redirect request to another host where you might process the error.
     */
    public function __construct(
        public readonly ?Redirect $redirect = null,
        public readonly ?Condition $condition = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::routingRule();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_REDIRECT = $m[0];
        self::$SCHEMA_CONDITION = $m[1];
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
        if (isset($this->redirect)) {
            $serializer->serializeStruct(self::$SCHEMA_REDIRECT, $this->redirect, 0);
        }
        if (isset($this->condition)) {
            $serializer->serializeStruct(self::$SCHEMA_CONDITION, $this->condition, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->redirect,
            1 => $this->condition,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->redirect,
            $this->condition
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
