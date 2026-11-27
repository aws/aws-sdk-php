<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\NoSuchAnnotationException;
use Aws\Services\S3\Exception\NoSuchBucketException;
use Aws\Services\S3\Exception\NoSuchKeyException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetObjectAnnotationRequest;
use Aws\Services\S3\Output\GetObjectAnnotationOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Retrieves an annotation from an Amazon S3 object. To use this operation, you must have the s3:GetObjectAnnotation
 * permission. If checksum mode is enabled via the x-amz-checksum-mode header, Amazon S3 returns the stored checksum in
 * the response headers for client-side validation. Annotations are not supported by the following features: S3
 * Inventory Reports, API Gateway, S3 Storage Lens, Amazon S3 File Gateway, Amazon FSx, S3 on Outposts, and S3 Express
 * One Zone (directory buckets). The following operations are related to GetObjectAnnotation: PutObjectAnnotation
 * ListObjectAnnotations DeleteObjectAnnotation
 */
final class GetObjectAnnotationOperation implements OperationInterface
{
    public const NAME = 'GetObjectAnnotation';
    public const ID = 'com.amazonaws.s3#GetObjectAnnotation';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetObjectAnnotationRequest::class;
    public const OUTPUT_CLASS = GetObjectAnnotationOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#NoSuchAnnotation' => 'com.amazonaws.s3#NoSuchAnnotation',
        'NoSuchAnnotation' => 'com.amazonaws.s3#NoSuchAnnotation',
        'com.amazonaws.s3#NoSuchBucket' => 'com.amazonaws.s3#NoSuchBucket',
        'NoSuchBucket' => 'com.amazonaws.s3#NoSuchBucket',
        'com.amazonaws.s3#NoSuchKey' => 'com.amazonaws.s3#NoSuchKey',
        'NoSuchKey' => 'com.amazonaws.s3#NoSuchKey'
    ];

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
            id: 'com.amazonaws.s3#GetObjectAnnotation',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '/{Key+}?annotation&x-id=GetObjectAnnotation',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'annotation&x-id=GetObjectAnnotation'
                ],
                Schema::T_ERRORS => self::ERRORS,
                28 => ['requestValidationModeMember' => 'ChecksumMode', 'responseAlgorithms' => ['CRC64NVME', 'CRC32', 'CRC32C', 'SHA256', 'SHA1', 'SHA512', 'MD5', 'XXHASH64', 'XXHASH3', 'XXHASH128']]
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestValidationModeMember' => 'ChecksumMode', 'responseAlgorithms' => ['CRC64NVME', 'CRC32', 'CRC32C', 'SHA256', 'SHA1', 'SHA512', 'MD5', 'XXHASH64', 'XXHASH3', 'XXHASH128']]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return GetObjectAnnotationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetObjectAnnotationOutput::schema();
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
        return [
            NoSuchAnnotationException::schema(),
            NoSuchBucketException::schema(),
            NoSuchKeyException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return GetObjectAnnotationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetObjectAnnotationOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#NoSuchAnnotation' => NoSuchAnnotationException::schema(),
            'NoSuchAnnotation' => NoSuchAnnotationException::schema(),
            'com.amazonaws.s3#NoSuchBucket' => NoSuchBucketException::schema(),
            'NoSuchBucket' => NoSuchBucketException::schema(),
            'com.amazonaws.s3#NoSuchKey' => NoSuchKeyException::schema(),
            'NoSuchKey' => NoSuchKeyException::schema(),
            default => null
        };
    }

    public function getInputStreamMember(): ?Schema
    {
        return null;
    }

    public function getOutputStreamMember(): Schema
    {
        return GetObjectAnnotationOutput::schema()->getMembersByIndex()[0];
    }
}
