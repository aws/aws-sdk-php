<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ShapeType;
use Smithy\Core\Shape\UnionInterface;
use Smithy\Core\Shape\Utils\ArrayShapeSerializer;

/**
 * The container for selecting objects from a content event stream.
 */
abstract readonly class SelectObjectContentEventStream implements UnionInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#SelectObjectContentEventStream';

    abstract public function getMemberIndex(): int;

    abstract public function tag(): string;

    abstract public function value(): mixed;

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeUnion(self::schema(), $this, $idx);
    }

    /**
     * <p>The Records Event.</p>
     */
    public static function records(RecordsEvent $value): self
    {
        return new SelectObjectContentEventStreamRecords($value);
    }

    /**
     * <p>The Stats Event.</p>
     */
    public static function stats(StatsEvent $value): self
    {
        return new SelectObjectContentEventStreamStats($value);
    }

    /**
     * <p>The Progress Event.</p>
     */
    public static function progress(ProgressEvent $value): self
    {
        return new SelectObjectContentEventStreamProgress($value);
    }

    /**
     * <p>The Continuation Event.</p>
     */
    public static function cont(ContinuationEvent $value): self
    {
        return new SelectObjectContentEventStreamCont($value);
    }

    /**
     * <p>The End Event.</p>
     */
    public static function end(EndEvent $value): self
    {
        return new SelectObjectContentEventStreamEnd($value);
    }

    /**
     * Create an unknown variant for forward-compatibility.
     */
    public static function unknown(string $tag, mixed $value): self
    {
        return new SelectObjectContentEventStreamUnknown($tag, $value);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return Schemas::selectObjectContentEventStream();
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }


    /**
     * Create a union variant from a tag and value.
     *
     * @param string $tag The variant name
     * @param mixed $value The variant value
     * @return self
     */
    public static function create(string $tag, mixed $value): self
    {
        return match ($tag) {
            'Records' => new SelectObjectContentEventStreamRecords($value instanceof RecordsEvent ? $value : ArrayShapeSerializer::fromArray(RecordsEvent::class, $value)),
            'Stats' => new SelectObjectContentEventStreamStats($value instanceof StatsEvent ? $value : ArrayShapeSerializer::fromArray(StatsEvent::class, $value)),
            'Progress' => new SelectObjectContentEventStreamProgress($value instanceof ProgressEvent ? $value : ArrayShapeSerializer::fromArray(ProgressEvent::class, $value)),
            'Cont' => new SelectObjectContentEventStreamCont($value instanceof ContinuationEvent ? $value : ArrayShapeSerializer::fromArray(ContinuationEvent::class, $value)),
            'End' => new SelectObjectContentEventStreamEnd($value instanceof EndEvent ? $value : ArrayShapeSerializer::fromArray(EndEvent::class, $value)),
            default => new SelectObjectContentEventStreamUnknown($tag, $value),
        };
    }

    /**
     * Create a known union variant from its schema member index.
     *
     * @param int $index The variant member index
     * @param mixed $value The variant value
     * @return self
     */
    public static function createByIndex(int $index, mixed $value): self
    {
        return match ($index) {
            0 => new SelectObjectContentEventStreamRecords($value instanceof RecordsEvent ? $value : ArrayShapeSerializer::fromArray(RecordsEvent::class, $value)),
            1 => new SelectObjectContentEventStreamStats($value instanceof StatsEvent ? $value : ArrayShapeSerializer::fromArray(StatsEvent::class, $value)),
            2 => new SelectObjectContentEventStreamProgress($value instanceof ProgressEvent ? $value : ArrayShapeSerializer::fromArray(ProgressEvent::class, $value)),
            3 => new SelectObjectContentEventStreamCont($value instanceof ContinuationEvent ? $value : ArrayShapeSerializer::fromArray(ContinuationEvent::class, $value)),
            4 => new SelectObjectContentEventStreamEnd($value instanceof EndEvent ? $value : ArrayShapeSerializer::fromArray(EndEvent::class, $value)),
            default => throw new \InvalidArgumentException('Unknown SelectObjectContentEventStream variant index: ' . $index),
        };
    }
}
