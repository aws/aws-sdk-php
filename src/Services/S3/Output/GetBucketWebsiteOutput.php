<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ErrorDocument;
use Aws\Services\S3\Shape\IndexDocument;
use Aws\Services\S3\Shape\RedirectAllRequestsTo;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class GetBucketWebsiteOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetBucketWebsiteOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_REDIRECT_ALL_REQUESTS_TO;
    private static Schema $SCHEMA_INDEX_DOCUMENT;
    private static Schema $SCHEMA_ERROR_DOCUMENT;
    private static Schema $SCHEMA_ROUTING_RULES;

    /**
     * @param ?RedirectAllRequestsTo $redirectAllRequestsTo Specifies the redirect behavior of all requests to a website
     *        endpoint of an Amazon S3 bucket.
     * @param ?IndexDocument $indexDocument The name of the index document for the website (for example index.html).
     * @param ?ErrorDocument $errorDocument The object key name of the website error document to use for 4XX class errors.
     * @param list<\Aws\Services\S3\Shape\RoutingRule>|null $routingRules
     */
    public function __construct(
        public readonly ?RedirectAllRequestsTo $redirectAllRequestsTo = null,
        public readonly ?IndexDocument $indexDocument = null,
        public readonly ?ErrorDocument $errorDocument = null,
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
        $s = Schemas::getBucketWebsiteOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_REDIRECT_ALL_REQUESTS_TO = $m[0];
        self::$SCHEMA_INDEX_DOCUMENT = $m[1];
        self::$SCHEMA_ERROR_DOCUMENT = $m[2];
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
        if (isset($this->redirectAllRequestsTo)) {
            $serializer->serializeStruct(self::$SCHEMA_REDIRECT_ALL_REQUESTS_TO, $this->redirectAllRequestsTo, 0);
        }
        if (isset($this->indexDocument)) {
            $serializer->serializeStruct(self::$SCHEMA_INDEX_DOCUMENT, $this->indexDocument, 1);
        }
        if (isset($this->errorDocument)) {
            $serializer->serializeStruct(self::$SCHEMA_ERROR_DOCUMENT, $this->errorDocument, 2);
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
            0 => $this->redirectAllRequestsTo,
            1 => $this->indexDocument,
            2 => $this->errorDocument,
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
            $this->redirectAllRequestsTo,
            $this->indexDocument,
            $this->errorDocument,
            $this->routingRules
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
