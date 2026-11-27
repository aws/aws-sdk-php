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
 * Amazon S3 Select is no longer available to new customers. Existing customers of Amazon S3 Select can continue to use
 * the feature as usual. Learn more Describes the parameters for Select job types. Learn How to optimize querying your
 * data in Amazon S3 using Amazon Athena, S3 Object Lambda, or client-side filtering.
 */
final class SelectParameters implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#SelectParameters';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_INPUT_SERIALIZATION;
    private static Schema $SCHEMA_EXPRESSION_TYPE;
    private static Schema $SCHEMA_EXPRESSION;
    private static Schema $SCHEMA_OUTPUT_SERIALIZATION;

    public readonly ?ExpressionType $expressionType;

    /**
     * @param ?InputSerialization $inputSerialization Describes the serialization format of the object.
     * @param ?ExpressionType $expressionType The type of the provided expression (for example, SQL).
     * @param ?string $expression Amazon S3 Select is no longer available to new customers. Existing customers of Amazon S3
     *        Select can continue to use the feature as usual. Learn more The expression that is used to query the object.
     * @param ?OutputSerialization $outputSerialization Describes how the results of the Select job are serialized.
     */
    public function __construct(
        public readonly ?InputSerialization $inputSerialization = null,
        ExpressionType|string|null $expressionType = null,
        public readonly ?string $expression = null,
        public readonly ?OutputSerialization $outputSerialization = null
    ) {
        $this->expressionType = $expressionType === null || $expressionType instanceof ExpressionType ? $expressionType : ExpressionType::fromValue($expressionType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::selectParameters();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_INPUT_SERIALIZATION = $m[0];
        self::$SCHEMA_EXPRESSION_TYPE = $m[1];
        self::$SCHEMA_EXPRESSION = $m[2];
        self::$SCHEMA_OUTPUT_SERIALIZATION = $m[3];
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
        if (isset($this->inputSerialization)) {
            $serializer->serializeStruct(self::$SCHEMA_INPUT_SERIALIZATION, $this->inputSerialization, 0);
        }
        if (isset($this->expressionType)) {
            $serializer->serializeString(self::$SCHEMA_EXPRESSION_TYPE, $this->expressionType->value, 1);
        }
        if (isset($this->expression)) {
            $serializer->serializeString(self::$SCHEMA_EXPRESSION, $this->expression, 2);
        }
        if (isset($this->outputSerialization)) {
            $serializer->serializeStruct(self::$SCHEMA_OUTPUT_SERIALIZATION, $this->outputSerialization, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->inputSerialization,
            1 => $this->expressionType,
            2 => $this->expression,
            3 => $this->outputSerialization,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->inputSerialization,
            $this->expressionType,
            $this->expression,
            $this->outputSerialization
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
