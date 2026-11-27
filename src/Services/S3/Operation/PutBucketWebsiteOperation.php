<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketWebsiteRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Sets the configuration of the website that is specified in the
 * website subresource. To configure a bucket as a website, you can add this subresource on the bucket with website
 * configuration information such as the file name of the index document and any redirect rules. For more information,
 * see Hosting Websites on Amazon S3. This PUT action requires the S3:PutBucketWebsite permission. By default, only the
 * bucket owner can configure the website attached to a bucket; however, bucket owners can allow other users to set the
 * website configuration by writing a bucket policy that grants them the S3:PutBucketWebsite permission. To redirect all
 * website requests sent to the bucket's website endpoint, you add a website configuration with the following elements.
 * Because all requests are sent to another website, you don't need to provide index document name for the bucket.
 * WebsiteConfiguration RedirectAllRequestsTo HostName Protocol If you want granular control over redirects, you can use
 * the following elements to add routing rules that describe conditions for redirecting requests and information about
 * the redirect destination. In this case, the website configuration must provide an index document for the bucket,
 * because some requests might not be redirected. WebsiteConfiguration IndexDocument Suffix ErrorDocument Key
 * RoutingRules RoutingRule Condition HttpErrorCodeReturnedEquals KeyPrefixEquals Redirect Protocol HostName
 * ReplaceKeyPrefixWith ReplaceKeyWith HttpRedirectCode Amazon S3 has a limitation of 50 routing rules per website
 * configuration. If you require more than 50 routing rules, you can use object redirect. For more information, see
 * Configuring an Object Redirect in the Amazon S3 User Guide. The maximum request length is limited to 128 KB. You must
 * URL encode any signed header values that contain spaces. For example, if your header value is my file.txt, containing
 * two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketWebsiteOperation implements OperationInterface
{
    public const NAME = 'PutBucketWebsite';
    public const ID = 'com.amazonaws.s3#PutBucketWebsite';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketWebsiteRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketWebsite',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?website',
                    'code' => 200,
                    'pathQueryString' => 'website'
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
        return PutBucketWebsiteRequest::schema();
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
        return PutBucketWebsiteRequest::fromMembers($members);
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
