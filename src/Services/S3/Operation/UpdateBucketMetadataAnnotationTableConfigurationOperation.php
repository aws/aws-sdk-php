<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\UpdateBucketMetadataAnnotationTableConfigurationRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Updates the annotation table configuration for an Amazon S3 bucket's metadata configuration. Use this operation to
 * enable or disable the annotation table, or to update its associated IAM role. An annotation table is a queryable
 * Iceberg table that contains records of all annotations attached to objects in the bucket. To use this operation, the
 * bucket must have an existing Amazon S3 Metadata configuration. To use this operation, you must have the
 * s3:UpdateBucketMetadataAnnotationTableConfiguration permission. If you are specifying or changing the IAM role, you
 * must also have iam:PassRole permission for the role. The IAM role must have a trust policy that allows the Amazon S3
 * metadata service to assume it, and a permissions policy that grants the actions needed to read annotations from your
 * bucket. The following examples show a trust policy and a permissions policy that you can adapt for your bucket and
 * account. The following operations are related to UpdateBucketMetadataAnnotationTableConfiguration:
 * CreateBucketMetadataConfiguration GetBucketMetadataConfiguration
 */
final class UpdateBucketMetadataAnnotationTableConfigurationOperation implements OperationInterface
{
    public const NAME = 'UpdateBucketMetadataAnnotationTableConfiguration';
    public const ID = 'com.amazonaws.s3#UpdateBucketMetadataAnnotationTableConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = UpdateBucketMetadataAnnotationTableConfigurationRequest::class;
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
            id: 'com.amazonaws.s3#UpdateBucketMetadataAnnotationTableConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?metadataAnnotationTable',
                    'code' => 200,
                    'pathQueryString' => 'metadataAnnotationTable'
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
        return UpdateBucketMetadataAnnotationTableConfigurationRequest::schema();
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
        return UpdateBucketMetadataAnnotationTableConfigurationRequest::fromMembers($members);
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
