<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\InvalidPrefixException;
use Aws\Services\S3\Exception\NoSuchBucketException;
use Aws\Services\S3\Exception\NoSuchKeyException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListObjectAnnotationsRequest;
use Aws\Services\S3\Output\ListObjectAnnotationsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Lists the annotations attached to an Amazon S3 object. Results are paginated, with a maximum of 1,000 annotations per
 * object. Use the AnnotationPrefix parameter to filter the results by name prefix. To use this operation, you must have
 * the s3:ListObjectAnnotations permission. Annotations are not supported by the following features: S3 Inventory
 * Reports, API Gateway, S3 Storage Lens, Amazon S3 File Gateway, Amazon FSx, S3 on Outposts, and S3 Express One Zone
 * (directory buckets). The following operations are related to ListObjectAnnotations: PutObjectAnnotation
 * GetObjectAnnotation DeleteObjectAnnotation
 */
final class ListObjectAnnotationsOperation implements OperationInterface
{
    public const NAME = 'ListObjectAnnotations';
    public const ID = 'com.amazonaws.s3#ListObjectAnnotations';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListObjectAnnotationsRequest::class;
    public const OUTPUT_CLASS = ListObjectAnnotationsOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#InvalidPrefix' => 'com.amazonaws.s3#InvalidPrefix',
        'InvalidPrefix' => 'com.amazonaws.s3#InvalidPrefix',
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
            id: 'com.amazonaws.s3#ListObjectAnnotations',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '/{Key+}?annotation&x-id=ListObjectAnnotations',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'annotation&x-id=ListObjectAnnotations'
                ],
                Schema::T_PAGINATED => [
                    'inputToken' => 'ContinuationToken',
                    'outputToken' => 'NextContinuationToken',
                    'items' => 'Annotations',
                    'pageSize' => 'MaxAnnotationResults'
                ],
                Schema::T_ERRORS => self::ERRORS
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return ListObjectAnnotationsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListObjectAnnotationsOutput::schema();
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
            InvalidPrefixException::schema(),
            NoSuchBucketException::schema(),
            NoSuchKeyException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return ListObjectAnnotationsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListObjectAnnotationsOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#InvalidPrefix' => InvalidPrefixException::schema(),
            'InvalidPrefix' => InvalidPrefixException::schema(),
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

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
