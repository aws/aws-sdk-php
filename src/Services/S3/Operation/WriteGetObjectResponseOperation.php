<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\WriteGetObjectResponseRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Passes transformed objects to a GetObject operation when using
 * Object Lambda access points. For information about Object Lambda access points, see Transforming objects with Object
 * Lambda access points in the Amazon S3 User Guide. This operation supports metadata that can be returned by GetObject,
 * in addition to RequestRoute, RequestToken, StatusCode, ErrorCode, and ErrorMessage. The GetObject response metadata
 * is supported so that the WriteGetObjectResponse caller, typically an Lambda function, can provide the same metadata
 * when it internally invokes GetObject. When WriteGetObjectResponse is called by a customer-owned Lambda function, the
 * metadata returned to the end user GetObject call might differ from what Amazon S3 would normally return. You can
 * include any number of metadata headers. When including a metadata header, it should be prefaced with x-amz-meta. For
 * example, x-amz-meta-my-custom-header: MyCustomValue. The primary use case for this is to forward GetObject metadata.
 * Amazon Web Services provides some prebuilt Lambda functions that you can use with S3 Object Lambda to detect and
 * redact personally identifiable information (PII) and decompress S3 objects. These Lambda functions are available in
 * the Amazon Web Services Serverless Application Repository, and can be selected through the Amazon Web Services
 * Management Console when you create your Object Lambda access point. Example 1: PII Access Control - This Lambda
 * function uses Amazon Comprehend, a natural language processing (NLP) service using machine learning to find insights
 * and relationships in text. It automatically detects personally identifiable information (PII) such as names,
 * addresses, dates, credit card numbers, and social security numbers from documents in your Amazon S3 bucket. Example
 * 2: PII Redaction - This Lambda function uses Amazon Comprehend, a natural language processing (NLP) service using
 * machine learning to find insights and relationships in text. It automatically redacts personally identifiable
 * information (PII) such as names, addresses, dates, credit card numbers, and social security numbers from documents in
 * your Amazon S3 bucket. Example 3: Decompression - The Lambda function S3ObjectLambdaDecompression, is equipped to
 * decompress objects stored in S3 in one of six compressed file formats including bzip2, gzip, snappy, zlib, zstandard
 * and ZIP. For information on how to view and use these functions, see Using Amazon Web Services built Lambda functions
 * in the Amazon S3 User Guide. You must URL encode any signed header values that contain spaces. For example, if your
 * header value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class WriteGetObjectResponseOperation implements OperationInterface
{
    public const NAME = 'WriteGetObjectResponse';
    public const ID = 'com.amazonaws.s3#WriteGetObjectResponse';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = WriteGetObjectResponseRequest::class;
    public const OUTPUT_CLASS = Unit::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [];

    private static ?self $INSTANCE = null;
    private static ?Schema $SCHEMA = null;

    public static function instance(): self
    {
        return self::$INSTANCE ??= new self();
    }

    private function __construct() {}

    public function getName(): string
    {
        return self::NAME;
    }

    public function getId(): string
    {
        return self::ID;
    }

    public function getServiceId(): string
    {
        return self::SERVICE_ID;
    }

    public function getServiceExceptionClass(): string
    {
        return S3Exception::class;
    }

    public function getRuntimeIdentity(): string
    {
        return self::class;
    }

    public function getEffectiveAuthSchemes(): array
    {
        return self::AUTH_SCHEMES;
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return self::$SCHEMA ??= new Schema(
            id: 'com.amazonaws.s3#WriteGetObjectResponse',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'POST',
                    'uri' => '/WriteGetObjectResponse',
                    'code' => 200
                ],
                31 => []
            ],
            traitsById: [
                'aws.auth#unsignedPayload' => []
            ],
            directTraitsById: [
                'smithy.rules#staticContextParams' => ['UseObjectLambdaEndpoint' => ['value' => true]]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return WriteGetObjectResponseRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return Unit::schema();
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    /**
     * @return list<Schema> Modeled error schemas.
     */
    public function getErrorSchemas(): array
    {
        return [];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return WriteGetObjectResponseRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return Unit::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return null;
    }

    public function getInputStreamMember(): Schema
    {
        return WriteGetObjectResponseRequest::schema()->getMembersByIndex()[2];
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
