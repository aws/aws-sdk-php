<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ExpressionType;
use Aws\Services\S3\Shape\InputSerialization;
use Aws\Services\S3\Shape\OutputSerialization;
use Aws\Services\S3\Shape\RequestProgress;
use Aws\Services\S3\Shape\ScanRange;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * Learn Amazon S3 Select is no longer available to new customers. Existing customers of Amazon S3 Select can continue
 * to use the feature as usual. Learn more Request to filter the contents of an Amazon S3 object based on a simple
 * Structured Query Language (SQL) statement. In the request, along with the SQL expression, you must specify a data
 * serialization format (JSON or CSV) of the object. Amazon S3 uses this to parse object data into records. It returns
 * only records that match the specified SQL expression. You must also specify the data serialization format for the
 * response. For more information, see S3Select API Documentation.
 */
final class SelectObjectContentRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#SelectObjectContentRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_EXPRESSION;
    private static Schema $SCHEMA_EXPRESSION_TYPE;
    private static Schema $SCHEMA_INPUT_SERIALIZATION;
    private static Schema $SCHEMA_OUTPUT_SERIALIZATION;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_REQUEST_PROGRESS;
    private static Schema $SCHEMA_SCAN_RANGE;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?ExpressionType $expressionType;

    /**
     * @param ?string $bucket The S3 bucket.
     * @param ?string $key The object key.
     * @param ?string $expression The expression that is used to query the object.
     * @param ?ExpressionType $expressionType The type of the provided expression (for example, SQL).
     * @param ?InputSerialization $inputSerialization Describes the format of the data in the object that is being queried.
     * @param ?OutputSerialization $outputSerialization Describes the format of the data that you want Amazon S3 to return
     *        in response.
     * @param ?string $sSECustomerAlgorithm The server-side encryption (SSE) algorithm used to encrypt the object. This
     *        parameter is needed only when the object was created using a checksum algorithm. For more information, see
     * Protecting
     *        data using SSE-C keys in the Amazon S3 User Guide.
     * @param ?string $sSECustomerKey The server-side encryption (SSE) customer managed key. This parameter is needed only
     *        when the object was created using a checksum algorithm. For more information, see Protecting data using SSE-C
     * keys in
     *        the Amazon S3 User Guide.
     * @param ?string $sSECustomerKeyMD5 The MD5 server-side encryption (SSE) customer managed key. This parameter is needed
     *        only when the object was created using a checksum algorithm. For more information, see Protecting data using
     * SSE-C
     *        keys in the Amazon S3 User Guide.
     * @param ?RequestProgress $requestProgress Specifies if periodic request progress information should be enabled.
     * @param ?ScanRange $scanRange Specifies the byte range of the object to get the records from. A record is processed
     *        when its first byte is contained by the range. This parameter is optional, but when specified, it must not be
     * empty.
     *        See RFC 2616, Section 14.35.1 about how to specify the start and end of the range. ScanRangemay be used in the
     *        following ways: 50100 - process only the records starting between the bytes 50 and 100 (inclusive, counting
     * from
     *        zero) 50 - process only the records starting after the byte 50 50 - process only the records within the last
     * 50 bytes
     *        of the file.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $expression = null,
        ExpressionType|string|null $expressionType = null,
        public readonly ?InputSerialization $inputSerialization = null,
        public readonly ?OutputSerialization $outputSerialization = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSECustomerKey = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        public readonly ?RequestProgress $requestProgress = null,
        public readonly ?ScanRange $scanRange = null,
        public readonly ?string $expectedBucketOwner = null
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
        $s = Schemas::selectObjectContentRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_EXPRESSION = $m[2];
        self::$SCHEMA_EXPRESSION_TYPE = $m[3];
        self::$SCHEMA_INPUT_SERIALIZATION = $m[4];
        self::$SCHEMA_OUTPUT_SERIALIZATION = $m[5];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[6];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[7];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[8];
        self::$SCHEMA_REQUEST_PROGRESS = $m[9];
        self::$SCHEMA_SCAN_RANGE = $m[10];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[11];
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
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 0);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 1);
        }
        if (isset($this->expression)) {
            $serializer->serializeString(self::$SCHEMA_EXPRESSION, $this->expression, 2);
        }
        if (isset($this->expressionType)) {
            $serializer->serializeString(self::$SCHEMA_EXPRESSION_TYPE, $this->expressionType->value, 3);
        }
        if (isset($this->inputSerialization)) {
            $serializer->serializeStruct(self::$SCHEMA_INPUT_SERIALIZATION, $this->inputSerialization, 4);
        }
        if (isset($this->outputSerialization)) {
            $serializer->serializeStruct(self::$SCHEMA_OUTPUT_SERIALIZATION, $this->outputSerialization, 5);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 6);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 7);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 8);
        }
        if (isset($this->requestProgress)) {
            $serializer->serializeStruct(self::$SCHEMA_REQUEST_PROGRESS, $this->requestProgress, 9);
        }
        if (isset($this->scanRange)) {
            $serializer->serializeStruct(self::$SCHEMA_SCAN_RANGE, $this->scanRange, 10);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 11);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->key,
            2 => $this->expression,
            3 => $this->expressionType,
            4 => $this->inputSerialization,
            5 => $this->outputSerialization,
            6 => $this->sSECustomerAlgorithm,
            7 => $this->sSECustomerKey,
            8 => $this->sSECustomerKeyMD5,
            9 => $this->requestProgress,
            10 => $this->scanRange,
            11 => $this->expectedBucketOwner,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucket,
            $this->key,
            $this->expression,
            $this->expressionType,
            $this->inputSerialization,
            $this->outputSerialization,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5,
            $this->requestProgress,
            $this->scanRange,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
