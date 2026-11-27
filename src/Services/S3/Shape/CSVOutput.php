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
 * Describes how uncompressed comma-separated values (CSV)-formatted results are formatted.
 */
final class CSVOutput implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CSVOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_QUOTE_FIELDS;
    private static Schema $SCHEMA_QUOTE_ESCAPE_CHARACTER;
    private static Schema $SCHEMA_RECORD_DELIMITER;
    private static Schema $SCHEMA_FIELD_DELIMITER;
    private static Schema $SCHEMA_QUOTE_CHARACTER;

    public readonly ?QuoteFields $quoteFields;

    /**
     * @param ?QuoteFields $quoteFields Indicates whether to use quotation marks around output fields. ALWAYS: Always use
     *        quotation marks for output fields. ASNEEDED: Use quotation marks for output fields when needed.
     * @param ?string $quoteEscapeCharacter The single character used for escaping the quote character inside an already
     *        escaped value.
     * @param ?string $recordDelimiter A single character used to separate individual records in the output. Instead of the
     *        default value, you can specify an arbitrary delimiter.
     * @param ?string $fieldDelimiter The value used to separate individual fields in a record. You can specify an arbitrary
     *        delimiter.
     * @param ?string $quoteCharacter A single character used for escaping when the field delimiter is part of the value.
     *        For example, if the value is a, b, Amazon S3 wraps this field value in quotation marks, as follows: " a , b ".
     */
    public function __construct(
        QuoteFields|string|null $quoteFields = null,
        public readonly ?string $quoteEscapeCharacter = null,
        public readonly ?string $recordDelimiter = null,
        public readonly ?string $fieldDelimiter = null,
        public readonly ?string $quoteCharacter = null
    ) {
        $this->quoteFields = $quoteFields === null || $quoteFields instanceof QuoteFields ? $quoteFields : QuoteFields::fromValue($quoteFields);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::cSVOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_QUOTE_FIELDS = $m[0];
        self::$SCHEMA_QUOTE_ESCAPE_CHARACTER = $m[1];
        self::$SCHEMA_RECORD_DELIMITER = $m[2];
        self::$SCHEMA_FIELD_DELIMITER = $m[3];
        self::$SCHEMA_QUOTE_CHARACTER = $m[4];
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
        if (isset($this->quoteFields)) {
            $serializer->serializeString(self::$SCHEMA_QUOTE_FIELDS, $this->quoteFields->value, 0);
        }
        if (isset($this->quoteEscapeCharacter)) {
            $serializer->serializeString(self::$SCHEMA_QUOTE_ESCAPE_CHARACTER, $this->quoteEscapeCharacter, 1);
        }
        if (isset($this->recordDelimiter)) {
            $serializer->serializeString(self::$SCHEMA_RECORD_DELIMITER, $this->recordDelimiter, 2);
        }
        if (isset($this->fieldDelimiter)) {
            $serializer->serializeString(self::$SCHEMA_FIELD_DELIMITER, $this->fieldDelimiter, 3);
        }
        if (isset($this->quoteCharacter)) {
            $serializer->serializeString(self::$SCHEMA_QUOTE_CHARACTER, $this->quoteCharacter, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->quoteFields,
            1 => $this->quoteEscapeCharacter,
            2 => $this->recordDelimiter,
            3 => $this->fieldDelimiter,
            4 => $this->quoteCharacter,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->quoteFields,
            $this->quoteEscapeCharacter,
            $this->recordDelimiter,
            $this->fieldDelimiter,
            $this->quoteCharacter
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
