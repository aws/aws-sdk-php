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
 * Specifies website configuration parameters for an Amazon S3 bucket.
 */
final class WebsiteConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#WebsiteConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ERROR_DOCUMENT;
    private static Schema $SCHEMA_INDEX_DOCUMENT;
    private static Schema $SCHEMA_REDIRECT_ALL_REQUESTS_TO;
    private static Schema $SCHEMA_ROUTING_RULES;

    /**
     * @param ?ErrorDocument $errorDocument The name of the error document for the website.
     * @param ?IndexDocument $indexDocument The name of the index document for the website.
     * @param ?RedirectAllRequestsTo $redirectAllRequestsTo The redirect behavior for every request to this bucket's website
     *        endpoint. If you specify this property, you can't specify any other property.
     * @param list<\Aws\Services\S3\Shape\RoutingRule>|null $routingRules
     */
    public function __construct(
        public readonly ?ErrorDocument $errorDocument = null,
        public readonly ?IndexDocument $indexDocument = null,
        public readonly ?RedirectAllRequestsTo $redirectAllRequestsTo = null,
        public readonly ?array $routingRules = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::websiteConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ERROR_DOCUMENT = $m[0];
        self::$SCHEMA_INDEX_DOCUMENT = $m[1];
        self::$SCHEMA_REDIRECT_ALL_REQUESTS_TO = $m[2];
        self::$SCHEMA_ROUTING_RULES = $m[3];
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
        if (isset($this->errorDocument)) {
            $serializer->serializeStruct(self::$SCHEMA_ERROR_DOCUMENT, $this->errorDocument, 0);
        }
        if (isset($this->indexDocument)) {
            $serializer->serializeStruct(self::$SCHEMA_INDEX_DOCUMENT, $this->indexDocument, 1);
        }
        if (isset($this->redirectAllRequestsTo)) {
            $serializer->serializeStruct(self::$SCHEMA_REDIRECT_ALL_REQUESTS_TO, $this->redirectAllRequestsTo, 2);
        }
        if (isset($this->routingRules)) {
            $serializer->serializeList(self::$SCHEMA_ROUTING_RULES, $this->routingRules, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->errorDocument,
            1 => $this->indexDocument,
            2 => $this->redirectAllRequestsTo,
            3 => $this->routingRules,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->errorDocument,
            $this->indexDocument,
            $this->redirectAllRequestsTo,
            $this->routingRules
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
