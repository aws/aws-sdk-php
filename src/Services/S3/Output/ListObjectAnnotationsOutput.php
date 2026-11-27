<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\RequestCharged;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class ListObjectAnnotationsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListObjectAnnotationsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ANNOTATIONS;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_OBJECT_VERSION_ID;
    private static Schema $SCHEMA_ANNOTATION_PREFIX;
    private static Schema $SCHEMA_MAX_ANNOTATION_RESULTS;
    private static Schema $SCHEMA_ANNOTATION_COUNT;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_NEXT_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?RequestCharged $requestCharged;

    /**
     * @param list<\Aws\Services\S3\Shape\AnnotationEntry>|null $annotations
     * @param ?string $bucket The bucket name.
     * @param ?string $key The object key.
     * @param ?string $objectVersionId The version ID of the object.
     * @param ?string $annotationPrefix The prefix used to filter the response.
     * @param ?int $maxAnnotationResults The maximum number of annotations returned in the response.
     * @param ?int $annotationCount The number of annotations returned.
     * @param ?string $continuationToken The continuation token used in this request.
     * @param ?string $nextContinuationToken The continuation token to use to retrieve the next page of results.
     */
    public function __construct(
        public readonly ?array $annotations = null,
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $objectVersionId = null,
        public readonly ?string $annotationPrefix = null,
        public readonly ?int $maxAnnotationResults = null,
        public readonly ?int $annotationCount = null,
        public readonly ?string $continuationToken = null,
        public readonly ?string $nextContinuationToken = null,
        RequestCharged|string|null $requestCharged = null
    ) {
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listObjectAnnotationsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ANNOTATIONS = $m[0];
        self::$SCHEMA_BUCKET = $m[1];
        self::$SCHEMA_KEY = $m[2];
        self::$SCHEMA_OBJECT_VERSION_ID = $m[3];
        self::$SCHEMA_ANNOTATION_PREFIX = $m[4];
        self::$SCHEMA_MAX_ANNOTATION_RESULTS = $m[5];
        self::$SCHEMA_ANNOTATION_COUNT = $m[6];
        self::$SCHEMA_CONTINUATION_TOKEN = $m[7];
        self::$SCHEMA_NEXT_CONTINUATION_TOKEN = $m[8];
        self::$SCHEMA_REQUEST_CHARGED = $m[9];
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
        if (isset($this->annotations)) {
            $serializer->serializeList(self::$SCHEMA_ANNOTATIONS, $this->annotations, 0);
        }
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 1);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 2);
        }
        if (isset($this->objectVersionId)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_VERSION_ID, $this->objectVersionId, 3);
        }
        if (isset($this->annotationPrefix)) {
            $serializer->serializeString(self::$SCHEMA_ANNOTATION_PREFIX, $this->annotationPrefix, 4);
        }
        if (isset($this->maxAnnotationResults)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_ANNOTATION_RESULTS, $this->maxAnnotationResults, 5);
        }
        if (isset($this->annotationCount)) {
            $serializer->serializeInteger(self::$SCHEMA_ANNOTATION_COUNT, $this->annotationCount, 6);
        }
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 7);
        }
        if (isset($this->nextContinuationToken)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_CONTINUATION_TOKEN, $this->nextContinuationToken, 8);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 9);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->annotations,
            1 => $this->bucket,
            2 => $this->key,
            3 => $this->objectVersionId,
            4 => $this->annotationPrefix,
            5 => $this->maxAnnotationResults,
            6 => $this->annotationCount,
            7 => $this->continuationToken,
            8 => $this->nextContinuationToken,
            9 => $this->requestCharged,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->annotations,
            $this->bucket,
            $this->key,
            $this->objectVersionId,
            $this->annotationPrefix,
            $this->maxAnnotationResults,
            $this->annotationCount,
            $this->continuationToken,
            $this->nextContinuationToken,
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
