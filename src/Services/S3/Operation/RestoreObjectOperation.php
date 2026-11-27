<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\ObjectAlreadyInActiveTierErrorException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\RestoreObjectRequest;
use Aws\Services\S3\Output\RestoreObjectOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Restores an archived copy of an object back into Amazon S3
 * This functionality is not supported for Amazon S3 on Outposts. This action performs the following types of requests:
 * restore an archive - Restore an archived object For more information about the S3 structure in the request body, see
 * the following: PutObject Managing Access with ACLs in the Amazon S3 User Guide Protecting Data Using Server-Side
 * Encryption in the Amazon S3 User Guide Permissions To use this operation, you must have permissions to perform the
 * s3:RestoreObject action. The bucket owner has this permission by default and can grant this permission to others. For
 * more information about permissions, see Permissions Related to Bucket Subresource Operations and Managing Access
 * Permissions to Your Amazon S3 Resources in the Amazon S3 User Guide. Restoring objects Objects that you archive to
 * the S3 Glacier Flexible Retrieval or S3 Glacier Deep Archive storage class, and S3 Intelligent-Tiering Archive or S3
 * Intelligent-Tiering Deep Archive tiers, are not accessible in real time. For objects in the S3 Glacier Flexible
 * Retrieval or S3 Glacier Deep Archive storage classes, you must first initiate a restore request, and then wait until
 * a temporary copy of the object is available. If you want a permanent copy of the object, create a copy of it in the
 * Amazon S3 Standard storage class in your S3 bucket. To access an archived object, you must restore the object for the
 * duration (number of days) that you specify. For objects in the Archive Access or Deep Archive Access tiers of S3
 * Intelligent-Tiering, you must first initiate a restore request, and then wait until the object is moved into the
 * Frequent Access tier. To restore a specific object version, you can provide a version ID. If you don't provide a
 * version ID, Amazon S3 restores the current version. When restoring an archived object, you can specify one of the
 * following data access tier options in the Tier element of the request body: Expedited - Expedited retrievals allow
 * you to quickly access your data stored in the S3 Glacier Flexible Retrieval storage class or S3 Intelligent-Tiering
 * Archive tier when occasional urgent requests for restoring archives are required. For all but the largest archived
 * objects (250 MB+), data accessed using Expedited retrievals is typically made available within 1–5 minutes.
 * Provisioned capacity ensures that retrieval capacity for Expedited retrievals is available when you need it.
 * Expedited retrievals and provisioned capacity are not available for objects stored in the S3 Glacier Deep Archive
 * storage class or S3 Intelligent-Tiering Deep Archive tier. Standard - Standard retrievals allow you to access any of
 * your archived objects within several hours. This is the default option for retrieval requests that do not specify the
 * retrieval option. Standard retrievals typically finish within 3–5 hours for objects stored in the S3 Glacier
 * Flexible Retrieval storage class or S3 Intelligent-Tiering Archive tier. They typically finish within 12 hours for
 * objects stored in the S3 Glacier Deep Archive storage class or S3 Intelligent-Tiering Deep Archive tier. Standard
 * retrievals are free for objects stored in S3 Intelligent-Tiering. Bulk - Bulk retrievals free for objects stored in
 * the S3 Glacier Flexible Retrieval and S3 Intelligent-Tiering storage classes, enabling you to retrieve large amounts,
 * even petabytes, of data at no cost. Bulk retrievals typically finish within 5–12 hours for objects stored in the S3
 * Glacier Flexible Retrieval storage class or S3 Intelligent-Tiering Archive tier. Bulk retrievals are also the
 * lowest-cost retrieval option when restoring objects from S3 Glacier Deep Archive. They typically finish within 48
 * hours for objects stored in the S3 Glacier Deep Archive storage class or S3 Intelligent-Tiering Deep Archive tier.
 * For more information about archive retrieval options and provisioned capacity for Expedited data access, see
 * Restoring Archived Objects in the Amazon S3 User Guide. You can use Amazon S3 restore speed upgrade to change the
 * restore speed to a faster speed while it is in progress. For more information, see Upgrading the speed of an
 * in-progress restore in the Amazon S3 User Guide. To get the status of object restoration, you can send a HEAD
 * request. Operations return the x-amz-restore header, which provides information about the restoration status, in the
 * response. You can use Amazon S3 event notifications to notify you when a restore is initiated or completed. For more
 * information, see Configuring Amazon S3 Event Notifications in the Amazon S3 User Guide. After restoring an archived
 * object, you can update the restoration period by reissuing the request with a new period. Amazon S3 updates the
 * restoration period relative to the current time and charges only for the request-there are no data transfer charges.
 * You cannot update the restoration period when Amazon S3 is actively processing your current restore request for the
 * object. If your bucket has a lifecycle configuration with a rule that includes an expiration action, the object
 * expiration overrides the life span that you specify in a restore request. For example, if you restore an object copy
 * for 10 days, but the object is scheduled to expire in 3 days, Amazon S3 deletes the object in 3 days. For more
 * information about lifecycle configuration, see PutBucketLifecycleConfiguration and Object Lifecycle Management in
 * Amazon S3 User Guide. Responses A successful action returns either the 200 OK or 202 Accepted status code. If the
 * object is not previously restored, then Amazon S3 returns 202 Accepted in the response. If the object is previously
 * restored, Amazon S3 returns 200 OK in the response. Special errors: Code: RestoreAlreadyInProgress Cause: Object
 * restore is already in progress. HTTP Status Code: 409 Conflict Code: GlacierExpeditedRetrievalNotAvailable Cause:
 * expedited retrievals are currently not available. Try again later. (Returned if there is insufficient capacity to
 * process the Expedited request. This error applies only to Expedited retrievals and not to S3 Standard or Bulk
 * retrievals.) HTTP Status Code: 503 The following operations are related to RestoreObject:
 * PutBucketLifecycleConfiguration GetBucketNotificationConfiguration You must URL encode any signed header values that
 * contain spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode
 * this value to my%20%20file.txt.
 */
final class RestoreObjectOperation implements OperationInterface
{
    public const NAME = 'RestoreObject';
    public const ID = 'com.amazonaws.s3#RestoreObject';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = RestoreObjectRequest::class;
    public const OUTPUT_CLASS = RestoreObjectOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#ObjectAlreadyInActiveTierError' => 'com.amazonaws.s3#ObjectAlreadyInActiveTierError',
        'ObjectAlreadyInActiveTierError' => 'com.amazonaws.s3#ObjectAlreadyInActiveTierError'
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
            id: 'com.amazonaws.s3#RestoreObject',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'POST',
                    'uri' => '/{Key+}?restore',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'restore'
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
        return RestoreObjectRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return RestoreObjectOutput::schema();
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
            ObjectAlreadyInActiveTierErrorException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return RestoreObjectRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return RestoreObjectOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#ObjectAlreadyInActiveTierError' => ObjectAlreadyInActiveTierErrorException::schema(),
            'ObjectAlreadyInActiveTierError' => ObjectAlreadyInActiveTierErrorException::schema(),
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
