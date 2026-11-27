<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketCorsRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Sets the cors configuration for your bucket. If the
 * configuration exists, Amazon S3 replaces it. To use this operation, you must be allowed to perform the
 * s3:PutBucketCORS action. By default, the bucket owner has this permission and can grant it to others. You set this
 * configuration on a bucket so that the bucket can service cross-origin requests. For example, you might want to enable
 * a request whose origin is http://www.example.com to access your Amazon S3 bucket at my.example.bucket.com by using
 * the browser's XMLHttpRequest capability. To enable cross-origin resource sharing (CORS) on a bucket, you add the cors
 * subresource to the bucket. The cors subresource is an XML document in which you configure rules that identify origins
 * and the HTTP methods that can be executed on your bucket. The document is limited to 64 KB in size. When Amazon S3
 * receives a cross-origin request (or a pre-flight OPTIONS request) against a bucket, it evaluates the cors
 * configuration on the bucket and uses the first CORSRule rule that matches the incoming browser request to enable a
 * cross-origin request. For a rule to match, the following conditions must be met: The request's Origin header must
 * match AllowedOrigin elements. The request method (for example, GET, PUT, HEAD, and so on) or the
 * Access-Control-Request-Method header in case of a pre-flight OPTIONS request must be one of the AllowedMethod
 * elements. Every header specified in the Access-Control-Request-Headers request header of a pre-flight request must
 * match an AllowedHeader element. For more information about CORS, go to Enabling Cross-Origin Resource Sharing in the
 * Amazon S3 User Guide. The following operations are related to PutBucketCors: GetBucketCors DeleteBucketCors
 * RESTOPTIONSobject You must URL encode any signed header values that contain spaces. For example, if your header value
 * is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketCorsOperation implements OperationInterface
{
    public const NAME = 'PutBucketCors';
    public const ID = 'com.amazonaws.s3#PutBucketCors';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketCorsRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketCors',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?cors',
                    'code' => 200,
                    'pathQueryString' => 'cors'
                ],
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
            ],
            directTraitsById: [
                'smithy.rules#staticContextParams' => ['UseS3ExpressControlEndpoint' => ['value' => true]]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return PutBucketCorsRequest::schema();
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
        return PutBucketCorsRequest::fromMembers($members);
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

    public function getInputStreamMember(): ?Schema
    {
        return null;
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
