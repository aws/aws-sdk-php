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
 * Describes how an uncompressed comma-separated values (CSV)-formatted input object is formatted.
 */
final class CSVInput implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CSVInput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_FILE_HEADER_INFO;
    private static Schema $SCHEMA_COMMENTS;
    private static Schema $SCHEMA_QUOTE_ESCAPE_CHARACTER;
    private static Schema $SCHEMA_RECORD_DELIMITER;
    private static Schema $SCHEMA_FIELD_DELIMITER;
    private static Schema $SCHEMA_QUOTE_CHARACTER;
    private static Schema $SCHEMA_ALLOW_QUOTED_RECORD_DELIMITER;

    public readonly ?FileHeaderInfo $fileHeaderInfo;

    /**
     * @param ?FileHeaderInfo $fileHeaderInfo Describes the first line of input. Valid values are: NONE: First line is not a
     *        header. IGNORE: First line is a header, but you can't use the header values to indicate the column in an
     * expression.
     *        You can use column position (such as _1, _2, …) to indicate the column (SELECT s._1 FROM OBJECT s). Use:
     * First line
     *        is a header, and you can use the header value to identify a column in an expression (SELECT "name" FROM
     * OBJECT).
     * @param ?string $comments A single character used to indicate that a row should be ignored when the character is
     *        present at the start of that row. You can specify any character to indicate a comment line. The default
     * character is
     *        #. Default: #
     * @param ?string $quoteEscapeCharacter A single character used for escaping the quotation mark character inside an
     *        already escaped value. For example, the value """ a , b """ is parsed as " a , b ".
     * @param ?string $recordDelimiter A single character used to separate individual records in the input. Instead of the
     *        default value, you can specify an arbitrary delimiter.
     * @param ?string $fieldDelimiter A single character used to separate individual fields in a record. You can specify an
     *        arbitrary delimiter.
     * @param ?string $quoteCharacter A single character used for escaping when the field delimiter is part of the value.
     *        For example, if the value is a, b, Amazon S3 wraps this field value in quotation marks, as follows: " a , b ".
     * Type:
     *        String Default: " Ancestors: CSV
     * @param ?bool $allowQuotedRecordDelimiter Specifies that CSV field values may contain quoted record delimiters and
     *        such records should be allowed. Default value is FALSE. Setting this value to TRUE may lower performance.
     */
    public function __construct(
        FileHeaderInfo|string|null $fileHeaderInfo = null,
        public readonly ?string $comments = null,
        public readonly ?string $quoteEscapeCharacter = null,
        public readonly ?string $recordDelimiter = null,
        public readonly ?string $fieldDelimiter = null,
        public readonly ?string $quoteCharacter = null,
        public readonly ?bool $allowQuotedRecordDelimiter = null
    ) {
        $this->fileHeaderInfo = $fileHeaderInfo === null || $fileHeaderInfo instanceof FileHeaderInfo ? $fileHeaderInfo : FileHeaderInfo::fromValue($fileHeaderInfo);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::cSVInput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_FILE_HEADER_INFO = $m[0];
        self::$SCHEMA_COMMENTS = $m[1];
        self::$SCHEMA_QUOTE_ESCAPE_CHARACTER = $m[2];
        self::$SCHEMA_RECORD_DELIMITER = $m[3];
        self::$SCHEMA_FIELD_DELIMITER = $m[4];
        self::$SCHEMA_QUOTE_CHARACTER = $m[5];
        self::$SCHEMA_ALLOW_QUOTED_RECORD_DELIMITER = $m[6];
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
        if (isset($this->fileHeaderInfo)) {
            $serializer->serializeString(self::$SCHEMA_FILE_HEADER_INFO, $this->fileHeaderInfo->value, 0);
        }
        if (isset($this->comments)) {
            $serializer->serializeString(self::$SCHEMA_COMMENTS, $this->comments, 1);
        }
        if (isset($this->quoteEscapeCharacter)) {
            $serializer->serializeString(self::$SCHEMA_QUOTE_ESCAPE_CHARACTER, $this->quoteEscapeCharacter, 2);
        }
        if (isset($this->recordDelimiter)) {
            $serializer->serializeString(self::$SCHEMA_RECORD_DELIMITER, $this->recordDelimiter, 3);
        }
        if (isset($this->fieldDelimiter)) {
            $serializer->serializeString(self::$SCHEMA_FIELD_DELIMITER, $this->fieldDelimiter, 4);
        }
        if (isset($this->quoteCharacter)) {
            $serializer->serializeString(self::$SCHEMA_QUOTE_CHARACTER, $this->quoteCharacter, 5);
        }
        if (isset($this->allowQuotedRecordDelimiter)) {
            $serializer->serializeBoolean(self::$SCHEMA_ALLOW_QUOTED_RECORD_DELIMITER, $this->allowQuotedRecordDelimiter, 6);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->fileHeaderInfo,
            1 => $this->comments,
            2 => $this->quoteEscapeCharacter,
            3 => $this->recordDelimiter,
            4 => $this->fieldDelimiter,
            5 => $this->quoteCharacter,
            6 => $this->allowQuotedRecordDelimiter,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->fileHeaderInfo,
            $this->comments,
            $this->quoteEscapeCharacter,
            $this->recordDelimiter,
            $this->fieldDelimiter,
            $this->quoteCharacter,
            $this->allowQuotedRecordDelimiter
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
