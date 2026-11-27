<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutObjectTaggingRequest;
use Aws\Services\S3\Output\PutObjectTaggingOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Sets the supplied tag-set to an object that already exists in
 * a bucket. A tag is a key-value pair. For more information, see Object Tagging. You can associate tags with an object
 * by sending a PUT request against the tagging subresource that is associated with the object. You can retrieve tags by
 * sending a GET request. For more information, see GetObjectTagging. For tagging-related restrictions related to
 * characters and encodings, see Tag Restrictions. Note that Amazon S3 limits the maximum number of tags to 10 tags per
 * object. To use this operation, you must have permission to perform the s3:PutObjectTagging action. By default, the
 * bucket owner has this permission and can grant this permission to others. To put tags of any other version, use the
 * versionId query parameter. You also need permission for the s3:PutObjectVersionTagging action. PutObjectTagging has
 * the following special errors. For more Amazon S3 errors see, Error Responses. InvalidTag - The tag provided was not a
 * valid tag. This error can occur if the tag did not pass input validation. For more information, see Object Tagging.
 * MalformedXML - The XML provided does not match the schema. OperationAborted - A conflicting conditional action is
 * currently in progress against this resource. Please try again. InternalError - The service was unable to apply the
 * provided tag to the object. The following operations are related to PutObjectTagging: GetObjectTagging
 * DeleteObjectTagging You must URL encode any signed header values that contain spaces. For example, if your header
 * value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutObjectTaggingOperation implements OperationInterface
{
    public const NAME = 'PutObjectTagging';
    public const ID = 'com.amazonaws.s3#PutObjectTagging';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutObjectTaggingRequest::class;
    public const OUTPUT_CLASS = PutObjectTaggingOutput::class;
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
            id: 'com.amazonaws.s3#PutObjectTagging',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '/{Key+}?tagging',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'tagging'
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
        return PutObjectTaggingRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return PutObjectTaggingOutput::schema();
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
        return PutObjectTaggingRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return PutObjectTaggingOutput::fromMembers($members);
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
