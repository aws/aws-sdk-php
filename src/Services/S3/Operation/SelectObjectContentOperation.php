<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\SelectObjectContentRequest;
use Aws\Services\S3\Output\SelectObjectContentOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. This action filters the contents of an Amazon S3 object based
 * on a simple structured query language (SQL) statement. In the request, along with the SQL expression, you must also
 * specify a data serialization format (JSON, CSV, or Apache Parquet) of the object. Amazon S3 uses this format to parse
 * object data into records, and returns only records that match the specified SQL expression. You must also specify the
 * data serialization format for the response. This functionality is not supported for Amazon S3 on Outposts. For more
 * information about Amazon S3 Select, see Selecting Content from Objects and SELECT Command in the Amazon S3 User
 * Guide. Permissions You must have the s3:GetObject permission for this operation. Amazon S3 Select does not support
 * anonymous access. For more information about permissions, see Specifying Permissions in a Policy in the Amazon S3
 * User Guide. Object Data Formats You can use Amazon S3 Select to query objects that have the following format
 * properties: CSV, JSON, and Parquet - Objects must be in CSV, JSON, or Parquet format. UTF-8 - UTF-8 is the only
 * encoding type Amazon S3 Select supports. GZIP or BZIP2 - CSV and JSON files can be compressed using GZIP or BZIP2.
 * GZIP and BZIP2 are the only compression formats that Amazon S3 Select supports for CSV and JSON files. Amazon S3
 * Select supports columnar compression for Parquet using GZIP or Snappy. Amazon S3 Select does not support whole-object
 * compression for Parquet objects. Server-side encryption - Amazon S3 Select supports querying objects that are
 * protected with server-side encryption. For objects that are encrypted with customer-provided encryption keys (SSE-C),
 * you must use HTTPS, and you must use the headers that are documented in the GetObject. For more information about
 * SSE-C, see Server-Side Encryption (Using Customer-Provided Encryption Keys) in the Amazon S3 User Guide. For objects
 * that are encrypted with Amazon S3 managed keys (SSE-S3) and Amazon Web Services KMS keys (SSE-KMS), server-side
 * encryption is handled transparently, so you don't need to specify anything. For more information about server-side
 * encryption, including SSE-S3 and SSE-KMS, see Protecting Data Using Server-Side Encryption in the Amazon S3 User
 * Guide. Working with the Response Body Given the response size is unknown, Amazon S3 Select streams the response as a
 * series of messages and includes a Transfer-Encoding header with chunked as its value in the response. For more
 * information, see Appendix: SelectObjectContent Response. GetObject Support The SelectObjectContent action does not
 * support the following GetObject functionality. For more information, see GetObject. Range: Although you can specify a
 * scan range for an Amazon S3 Select request (see SelectObjectContentRequest - ScanRange in the request parameters),
 * you cannot specify the range of bytes of an object to return. The GLACIER, DEEP_ARCHIVE, and REDUCED_REDUNDANCY
 * storage classes, or the ARCHIVE_ACCESS and DEEP_ARCHIVE_ACCESS access tiers of the INTELLIGENT_TIERING storage class:
 * You cannot query objects in the GLACIER, DEEP_ARCHIVE, or REDUCED_REDUNDANCY storage classes, nor objects in the
 * ARCHIVE_ACCESS or DEEP_ARCHIVE_ACCESS access tiers of the INTELLIGENT_TIERING storage class. For more information
 * about storage classes, see Using Amazon S3 storage classes in the Amazon S3 User Guide. Special Errors For a list of
 * special errors for this operation, see List of SELECT Object Content Error Codes The following operations are related
 * to SelectObjectContent: GetObject GetBucketLifecycleConfiguration PutBucketLifecycleConfiguration You must URL encode
 * any signed header values that contain spaces. For example, if your header value is my file.txt, containing two spaces
 * after my, you must URL encode this value to my%20%20file.txt.
 */
final class SelectObjectContentOperation implements OperationInterface
{
    public const NAME = 'SelectObjectContent';
    public const ID = 'com.amazonaws.s3#SelectObjectContent';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = SelectObjectContentRequest::class;
    public const OUTPUT_CLASS = SelectObjectContentOutput::class;
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
            id: 'com.amazonaws.s3#SelectObjectContent',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'POST',
                    'uri' => '/{Key+}?select&select-type=2',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'select&select-type=2'
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
        return SelectObjectContentRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return SelectObjectContentOutput::schema();
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
        return SelectObjectContentRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return SelectObjectContentOutput::fromMembers($members);
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

    public function getOutputStreamMember(): Schema
    {
        return SelectObjectContentOutput::schema()->getMembersByIndex()[0];
    }
}
