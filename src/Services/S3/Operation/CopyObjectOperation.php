<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\ObjectNotInActiveTierErrorException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\CopyObjectRequest;
use Aws\Services\S3\Output\CopyObjectOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Creates a copy of an object that is already stored in Amazon S3. End of support notice: As of October 1, 2025, Amazon
 * S3 has discontinued support for Email Grantee Access Control Lists (ACLs). If you attempt to use an Email Grantee ACL
 * in a request after October 1, 2025, the request will receive an HTTP 405 (Method Not Allowed) error. This change
 * affects the following Amazon Web Services Regions: US East (N. Virginia), US West (N. California), US West (Oregon),
 * Asia Pacific (Singapore), Asia Pacific (Sydney), Asia Pacific (Tokyo), Europe (Ireland), and South America (São
 * Paulo). You can store individual objects of up to 50 TB in Amazon S3. You create a copy of your object up to 5 GB in
 * size in a single atomic action using this API. However, to copy an object greater than 5 GB, you must use the
 * multipart upload Upload Part - Copy (UploadPartCopy) API. For more information, see Copy Object Using the REST
 * Multipart Upload API. You can copy individual objects between general purpose buckets, between directory buckets, and
 * between general purpose buckets and directory buckets. Amazon S3 supports copy operations using Multi-Region Access
 * Points only as a destination when using the Multi-Region Access Point ARN. Directory buckets - For directory buckets,
 * you must make requests for this API operation to the Zonal endpoint. These endpoints support virtual-hosted-style
 * requests in the format https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style
 * requests are not supported. For more information about endpoints in Availability Zones, see Regional and Zonal
 * endpoints for directory buckets in Availability Zones in the Amazon S3 User Guide. For more information about
 * endpoints in Local Zones, see Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. VPC
 * endpoints don't support cross-Region requests (including copies). If you're using VPC endpoints, your source and
 * destination buckets should be in the same Amazon Web Services Region as your VPC endpoint. Both the Region that you
 * want to copy the object from and the Region that you want to copy the object to must be enabled for your account. For
 * more information about how to enable a Region for your account, see Enable or disable a Region for standalone
 * accounts in the Amazon Web Services Account Management Guide. Amazon S3 transfer acceleration does not support
 * cross-Region copies. If you request a cross-Region copy using a transfer acceleration endpoint, you get a 400 Bad
 * Request error. For more information, see Transfer Acceleration. Authentication and authorization All CopyObject
 * requests must be authenticated and signed by using IAM credentials (access key ID and secret access key for the IAM
 * identities). All headers with the x-amz- prefix, including x-amz-copy-source, must be signed. For more information,
 * see REST Authentication. Directory buckets - You must use the IAM credentials to authenticate and authorize your
 * access to the CopyObject API operation, instead of using the temporary security credentials through the CreateSession
 * API operation. Amazon Web Services CLI or SDKs handles authentication and authorization on your behalf. Permissions
 * You must have read access to the source object and write access to the destination bucket. General purpose bucket
 * permissions - You must have permissions in an IAM policy based on the source and destination bucket types in a
 * CopyObject operation. If the source object is in a general purpose bucket, you must have s3:GetObject permission to
 * read the source object that is being copied. If the destination bucket is a general purpose bucket, you must have
 * s3:PutObject permission to write the object copy to the destination bucket. Directory bucket permissions - You must
 * have permissions in a bucket policy or an IAM identity-based policy based on the source and destination bucket types
 * in a CopyObject operation. If the source object that you want to copy is in a directory bucket, you must have the
 * s3express:CreateSession permission in the Action element of a policy to read the object. If no session mode is
 * specified, the session will be created with the maximum allowable privilege, attempting ReadWrite first, then
 * ReadOnly if ReadWrite is not permitted. If you want to explicitly restrict the access to be read-only, you can set
 * the s3express:SessionMode condition key to ReadOnly on the copy source bucket. If the copy destination is a directory
 * bucket, you must have the s3express:CreateSession permission in the Action element of a policy to write the object to
 * the destination. The s3express:SessionMode condition key can't be set to ReadOnly on the copy destination bucket. If
 * the object is encrypted with SSE-KMS, you must also have the kms:GenerateDataKey and kms:Decrypt permissions in IAM
 * identity-based policies and KMS key policies for the KMS key. For example policies, see Example bucket policies for
 * S3 Express One Zone and Amazon Web Services Identity and Access Management (IAM) identity-based policies for S3
 * Express One Zone in the Amazon S3 User Guide. Response and special errors When the request is an HTTP 1.1 request,
 * the response is chunk encoded. When the request is not an HTTP 1.1 request, the response would not contain the
 * Content-Length. You always need to read the entire response body to check if the copy succeeds. If the copy is
 * successful, you receive a response with information about the copied object. A copy request might return an error
 * when Amazon S3 receives the copy request or while Amazon S3 is copying the files. A 200 OK response can contain
 * either a success or an error. If the error occurs before the copy action starts, you receive a standard Amazon S3
 * error. If the error occurs during the copy operation, the error response is embedded in the 200 OK response. For
 * example, in a cross-region copy, you may encounter throttling and receive a 200 OK response. For more information,
 * see Resolve the Error 200 response when copying objects to Amazon S3. The 200 OK status code means the copy was
 * accepted, but it doesn't mean the copy is complete. Another example is when you disconnect from Amazon S3 before the
 * copy is complete, Amazon S3 might cancel the copy and you may receive a 200 OK response. You must stay connected to
 * Amazon S3 until the entire response is successfully received and processed. If you call this API operation directly,
 * make sure to design your application to parse the content of the response and handle it appropriately. If you use
 * Amazon Web Services SDKs, SDKs handle this condition. The SDKs detect the embedded error and apply error handling per
 * your configuration settings (including automatically retrying the request as appropriate). If the condition persists,
 * the SDKs throw an exception (or, for the SDKs that don't use exceptions, they return an error). Charge The copy
 * request charge is based on the storage class and Region that you specify for the destination object. The request can
 * also result in a data retrieval charge for the source if the source storage class bills for data retrieval. If the
 * copy source is in a different region, the data transfer is billed to the copy source account. For pricing
 * information, see Amazon S3 pricing. HTTP Host header syntax Directory buckets - The HTTP Host header syntax is
 * Bucket-name.s3express-zone-id.region-code.amazonaws.com. Amazon S3 on Outposts - When you use this action with S3 on
 * Outposts through the REST API, you must direct requests to the S3 on Outposts hostname. The S3 on Outposts hostname
 * takes the form AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. The hostname isn't required when
 * you use the Amazon Web Services CLI or SDKs. The following operations are related to CopyObject: PutObject GetObject
 * You must URL encode any signed header values that contain spaces. For example, if your header value is my file.txt,
 * containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class CopyObjectOperation implements OperationInterface
{
    public const NAME = 'CopyObject';
    public const ID = 'com.amazonaws.s3#CopyObject';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = CopyObjectRequest::class;
    public const OUTPUT_CLASS = CopyObjectOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#ObjectNotInActiveTierError' => 'com.amazonaws.s3#ObjectNotInActiveTierError',
        'ObjectNotInActiveTierError' => 'com.amazonaws.s3#ObjectNotInActiveTierError'
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
            id: 'com.amazonaws.s3#CopyObject',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '/{Key+}?x-id=CopyObject',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 2, true]],
                    'pathQueryString' => 'x-id=CopyObject'
                ],
                Schema::T_ERRORS => self::ERRORS
            ],
            directTraitsById: [
                'smithy.rules#staticContextParams' => ['DisableS3ExpressSessionAuth' => ['value' => true]]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return CopyObjectRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return CopyObjectOutput::schema();
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
            ObjectNotInActiveTierErrorException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return CopyObjectRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return CopyObjectOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#ObjectNotInActiveTierError' => ObjectNotInActiveTierErrorException::schema(),
            'ObjectNotInActiveTierError' => ObjectNotInActiveTierErrorException::schema(),
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
