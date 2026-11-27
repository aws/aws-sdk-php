<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\AnnotationLimitExceededException;
use Aws\Services\S3\Exception\AnnotationNameTooLongException;
use Aws\Services\S3\Exception\InvalidAnnotationNameException;
use Aws\Services\S3\Exception\InvalidRequestException;
use Aws\Services\S3\Exception\NoSuchBucketException;
use Aws\Services\S3\Exception\NoSuchKeyException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Exception\UnsupportedMediaTypeException;
use Aws\Services\S3\Input\PutObjectAnnotationRequest;
use Aws\Services\S3\Output\PutObjectAnnotationOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Attaches an annotation to an Amazon S3 object. An annotation is a named payload of 1 byte to 1 MiB that you can
 * associate with a specific object or object version. Each object can have up to 1,000 annotations. For annotation
 * naming rules and restrictions, see Annotation naming guidelines in the Amazon S3 User Guide. Annotations inherit the
 * encryption of their parent object. For objects without server-side encryption, annotations are encrypted with SSE-S3
 * (the default for new objects). Objects encrypted with SSE-C cannot have annotations. To use this operation, you must
 * have the s3:PutObjectAnnotation permission. If the bucket has Requester Pays enabled, you must include the
 * x-amz-request-payer header. Annotations are not supported by the following features: S3 Inventory Reports, API
 * Gateway, S3 Storage Lens, Amazon S3 File Gateway, Amazon FSx, S3 on Outposts, and S3 Express One Zone (directory
 * buckets). The following operations are related to PutObjectAnnotation: GetObjectAnnotation ListObjectAnnotations
 * DeleteObjectAnnotation
 */
final class PutObjectAnnotationOperation implements OperationInterface
{
    public const NAME = 'PutObjectAnnotation';
    public const ID = 'com.amazonaws.s3#PutObjectAnnotation';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutObjectAnnotationRequest::class;
    public const OUTPUT_CLASS = PutObjectAnnotationOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#AnnotationLimitExceeded' => 'com.amazonaws.s3#AnnotationLimitExceeded',
        'AnnotationLimitExceeded' => 'com.amazonaws.s3#AnnotationLimitExceeded',
        'com.amazonaws.s3#AnnotationNameTooLong' => 'com.amazonaws.s3#AnnotationNameTooLong',
        'AnnotationNameTooLong' => 'com.amazonaws.s3#AnnotationNameTooLong',
        'com.amazonaws.s3#InvalidAnnotationName' => 'com.amazonaws.s3#InvalidAnnotationName',
        'InvalidAnnotationName' => 'com.amazonaws.s3#InvalidAnnotationName',
        'com.amazonaws.s3#InvalidRequest' => 'com.amazonaws.s3#InvalidRequest',
        'InvalidRequest' => 'com.amazonaws.s3#InvalidRequest',
        'com.amazonaws.s3#NoSuchBucket' => 'com.amazonaws.s3#NoSuchBucket',
        'NoSuchBucket' => 'com.amazonaws.s3#NoSuchBucket',
        'com.amazonaws.s3#NoSuchKey' => 'com.amazonaws.s3#NoSuchKey',
        'NoSuchKey' => 'com.amazonaws.s3#NoSuchKey',
        'com.amazonaws.s3#UnsupportedMediaType' => 'com.amazonaws.s3#UnsupportedMediaType',
        'UnsupportedMediaType' => 'com.amazonaws.s3#UnsupportedMediaType'
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
            id: 'com.amazonaws.s3#PutObjectAnnotation',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '/{Key+}?annotation',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'annotation'
                ],
                Schema::T_ERRORS => self::ERRORS,
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm']
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm']
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return PutObjectAnnotationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return PutObjectAnnotationOutput::schema();
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
            AnnotationLimitExceededException::schema(),
            AnnotationNameTooLongException::schema(),
            InvalidAnnotationNameException::schema(),
            InvalidRequestException::schema(),
            NoSuchBucketException::schema(),
            NoSuchKeyException::schema(),
            UnsupportedMediaTypeException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return PutObjectAnnotationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return PutObjectAnnotationOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#AnnotationLimitExceeded' => AnnotationLimitExceededException::schema(),
            'AnnotationLimitExceeded' => AnnotationLimitExceededException::schema(),
            'com.amazonaws.s3#AnnotationNameTooLong' => AnnotationNameTooLongException::schema(),
            'AnnotationNameTooLong' => AnnotationNameTooLongException::schema(),
            'com.amazonaws.s3#InvalidAnnotationName' => InvalidAnnotationNameException::schema(),
            'InvalidAnnotationName' => InvalidAnnotationNameException::schema(),
            'com.amazonaws.s3#InvalidRequest' => InvalidRequestException::schema(),
            'InvalidRequest' => InvalidRequestException::schema(),
            'com.amazonaws.s3#NoSuchBucket' => NoSuchBucketException::schema(),
            'NoSuchBucket' => NoSuchBucketException::schema(),
            'com.amazonaws.s3#NoSuchKey' => NoSuchKeyException::schema(),
            'NoSuchKey' => NoSuchKeyException::schema(),
            'com.amazonaws.s3#UnsupportedMediaType' => UnsupportedMediaTypeException::schema(),
            'UnsupportedMediaType' => UnsupportedMediaTypeException::schema(),
            default => null
        };
    }

    public function getInputStreamMember(): Schema
    {
        return PutObjectAnnotationRequest::schema()->getMembersByIndex()[3];
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
