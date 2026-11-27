<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\DeleteObjectRequest;
use Aws\Services\S3\Output\DeleteObjectOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Removes an object from a bucket. The behavior depends on the bucket's versioning state: If bucket versioning is not
 * enabled, the operation permanently deletes the object. If bucket versioning is enabled, the operation inserts a
 * delete marker, which becomes the current version of the object. To permanently delete an object in a versioned
 * bucket, you must include the object’s versionId in the request. For more information about versioning-enabled
 * buckets, see Deleting object versions from a versioning-enabled bucket. If bucket versioning is suspended, the
 * operation removes the object that has a null versionId, if there is one, and inserts a delete marker that becomes the
 * current version of the object. If there isn't an object with a null versionId, and all versions of the object have a
 * versionId, Amazon S3 does not remove the object and only inserts a delete marker. To permanently delete an object
 * that has a versionId, you must include the object’s versionId in the request. For more information about
 * versioning-suspended buckets, see Deleting objects from versioning-suspended buckets. Directory buckets - S3
 * Versioning isn't enabled and supported for directory buckets. For this API operation, only the null value of the
 * version ID is supported by directory buckets. You can only specify null to the versionId query parameter in the
 * request. Directory buckets - For directory buckets, you must make requests for this API operation to the Zonal
 * endpoint. These endpoints support virtual-hosted-style requests in the format
 * https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. To remove a specific version, you must use
 * the versionId query parameter. Using this query parameter permanently deletes the version. If the object deleted is a
 * delete marker, Amazon S3 sets the response header x-amz-delete-marker to true. If the object you want to delete is in
 * a bucket where the bucket versioning configuration is MFA Delete enabled, you must include the x-amz-mfa request
 * header in the DELETE versionId request. Requests that include x-amz-mfa must use HTTPS. For more information about
 * MFA Delete, see Using MFA Delete in the Amazon S3 User Guide. To see sample requests that use versioning, see Sample
 * Request. Directory buckets - MFA delete is not supported by directory buckets. You can delete objects by explicitly
 * calling DELETE Object or calling (PutBucketLifecycle) to enable Amazon S3 to remove them for you. If you want to
 * block users or accounts from removing or deleting objects from your bucket, you must deny them the s3:DeleteObject,
 * s3:DeleteObjectVersion, and s3:PutLifeCycleConfiguration actions. Directory buckets - S3 Lifecycle is not supported
 * by directory buckets. Permissions General purpose bucket permissions - The following permissions are required in your
 * policies when your DeleteObjects request includes specific headers. s3:DeleteObject - To delete an object from a
 * bucket, you must always have the s3:DeleteObject permission. s3:DeleteObjectVersion - To delete a specific version of
 * an object from a versioning-enabled bucket, you must have the s3:DeleteObjectVersion permission. If the
 * s3:DeleteObject or s3:DeleteObjectVersion permissions are explicitly denied in your bucket policy, attempts to delete
 * any unversioned objects result in a 403 Access Denied error. Directory bucket permissions - To grant access to this
 * API operation on a directory bucket, we recommend that you use the CreateSession API operation for session-based
 * authorization. Specifically, you grant the s3express:CreateSession permission to the directory bucket in a bucket
 * policy or an IAM identity-based policy. Then, you make the CreateSession API call on the bucket to obtain a session
 * token. With the session token in your request header, you can make API requests to this operation. After the session
 * token expires, you make another CreateSession API call to generate a new session token for use. Amazon Web Services
 * CLI or SDKs create session and refresh the session token automatically to avoid service interruptions when a session
 * expires. For more information about authorization, see CreateSession . HTTP Host header syntax Directory buckets -
 * The HTTP Host header syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com. The following action is
 * related to DeleteObject: PutObject You must URL encode any signed header values that contain spaces. For example, if
 * your header value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 * The If-Match header is supported for both general purpose and directory buckets. IfMatchLastModifiedTime and
 * IfMatchSize is only supported for directory buckets.
 */
final class DeleteObjectOperation implements OperationInterface
{
    public const NAME = 'DeleteObject';
    public const ID = 'com.amazonaws.s3#DeleteObject';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = DeleteObjectRequest::class;
    public const OUTPUT_CLASS = DeleteObjectOutput::class;
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
            id: 'com.amazonaws.s3#DeleteObject',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'DELETE',
                    'uri' => '/{Key+}?x-id=DeleteObject',
                    'code' => 204,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'x-id=DeleteObject'
                ]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return DeleteObjectRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return DeleteObjectOutput::schema();
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
        return DeleteObjectRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return DeleteObjectOutput::fromMembers($members);
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
