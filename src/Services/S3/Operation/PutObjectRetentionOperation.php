<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutObjectRetentionRequest;
use Aws\Services\S3\Output\PutObjectRetentionOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Places an Object Retention configuration on an object. For
 * more information, see Locking Objects. Users or accounts require the s3:PutObjectRetention permission in order to
 * place an Object Retention configuration on objects. Bypassing a Governance Retention configuration requires the
 * s3:BypassGovernanceRetention permission. This functionality is not supported for Amazon S3 on Outposts. You must URL
 * encode any signed header values that contain spaces. For example, if your header value is my file.txt, containing two
 * spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutObjectRetentionOperation implements OperationInterface
{
    public const NAME = 'PutObjectRetention';
    public const ID = 'com.amazonaws.s3#PutObjectRetention';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutObjectRetentionRequest::class;
    public const OUTPUT_CLASS = PutObjectRetentionOutput::class;
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
            id: 'com.amazonaws.s3#PutObjectRetention',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '/{Key+}?retention',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'retention'
                ],
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return PutObjectRetentionRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return PutObjectRetentionOutput::schema();
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
        return PutObjectRetentionRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return PutObjectRetentionOutput::fromMembers($members);
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
