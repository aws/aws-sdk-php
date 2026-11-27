<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\AccessControlPolicy;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\ObjectCannedACL;
use Aws\Services\S3\Shape\RequestPayer;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutObjectAclRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutObjectAclRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_ACL;
    private static Schema $SCHEMA_ACCESS_CONTROL_POLICY;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_GRANT_FULL_CONTROL;
    private static Schema $SCHEMA_GRANT_READ;
    private static Schema $SCHEMA_GRANT_READ_ACP;
    private static Schema $SCHEMA_GRANT_WRITE;
    private static Schema $SCHEMA_GRANT_WRITE_ACP;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?ObjectCannedACL $aCL;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The bucket name that contains the object to which you want to attach the ACL. Access points -
     *        When you use this action with an access point for general purpose buckets, you must provide the alias of the
     * access
     *        point in place of the bucket name or specify the access point ARN. When you use this action with an access
     * point for
     *        directory buckets, you must provide the access point name in place of the bucket name. When using the access
     * point
     *        ARN, you must direct requests to the access point hostname. The access point hostname takes the form
     *        AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using this action with an access point
     * through
     *        the Amazon Web Services SDKs, you provide the access point ARN in place of the bucket name. For more
     * information
     *        about access point ARNs, see Using access points in the Amazon S3 User Guide. S3 on Outposts - When you use
     * this
     *        action with S3 on Outposts, you must direct requests to the S3 on Outposts hostname. The S3 on Outposts
     * hostname
     *        takes the form AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. When you use this action
     * with S3
     *        on Outposts, the destination bucket must be the Outposts access point ARN or the access point alias. For more
     *        information about S3 on Outposts, see What is S3 on Outposts? in the Amazon S3 User Guide.
     * @param ?string $key Key for which the PUT action was initiated.
     * @param ?ObjectCannedACL $aCL The canned ACL to apply to the object. For more information, see Canned ACL.
     * @param ?AccessControlPolicy $accessControlPolicy Contains the elements that set the ACL permissions for an object per
     *        grantee.
     * @param ?string $contentMD5 The Base64 encoded 128-bit MD5 digest of the data. This header must be used as a message
     *        integrity check to verify that the request body was not corrupted in transit. For more information, go to RFC
     * 1864.>
     *        For requests made using the Amazon Web Services Command Line Interface (CLI) or Amazon Web Services SDKs, this
     * field
     *        is calculated automatically.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the object when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum or x-amz-trailer header sent. Otherwise, Amazon S3
     * fails
     *        the request with the HTTP status code 400 Bad Request. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide. If you provide an individual checksum, Amazon S3 ignores any provided ChecksumAlgorithm
     *        parameter.
     * @param ?string $grantFullControl Allows grantee the read, write, read ACP, and write ACP permissions on the bucket.
     *        This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $grantRead Allows grantee to list the objects in the bucket. This functionality is not supported for
     *        Amazon S3 on Outposts.
     * @param ?string $grantReadACP Allows grantee to read the bucket ACL. This functionality is not supported for Amazon S3
     *        on Outposts.
     * @param ?string $grantWrite Allows grantee to create new objects in the bucket. For the bucket and object owners of
     *        existing objects, also allows deletions and overwrites of those objects.
     * @param ?string $grantWriteACP Allows grantee to write the ACL for the applicable bucket. This functionality is not
     *        supported for Amazon S3 on Outposts.
     * @param ?string $versionId Version ID used to reference a specific version of the object. This functionality is not
     *        supported for directory buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        ObjectCannedACL|string|null $aCL = null,
        public readonly ?AccessControlPolicy $accessControlPolicy = null,
        public readonly ?string $contentMD5 = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        public readonly ?string $grantFullControl = null,
        public readonly ?string $grantRead = null,
        public readonly ?string $grantReadACP = null,
        public readonly ?string $grantWrite = null,
        public readonly ?string $grantWriteACP = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $versionId = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
        $this->aCL = $aCL === null || $aCL instanceof ObjectCannedACL ? $aCL : ObjectCannedACL::fromValue($aCL);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::putObjectAclRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_ACL = $m[2];
        self::$SCHEMA_ACCESS_CONTROL_POLICY = $m[3];
        self::$SCHEMA_CONTENT_MD5 = $m[4];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[5];
        self::$SCHEMA_GRANT_FULL_CONTROL = $m[6];
        self::$SCHEMA_GRANT_READ = $m[7];
        self::$SCHEMA_GRANT_READ_ACP = $m[8];
        self::$SCHEMA_GRANT_WRITE = $m[9];
        self::$SCHEMA_GRANT_WRITE_ACP = $m[10];
        self::$SCHEMA_REQUEST_PAYER = $m[11];
        self::$SCHEMA_VERSION_ID = $m[12];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[13];
        return self::$SCHEMA = $s;
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    /**
     * Serialize the shape members to the desired wire format.
     *
     * @return void
     */
    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 0);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 1);
        }
        if (isset($this->aCL)) {
            $serializer->serializeString(self::$SCHEMA_ACL, $this->aCL->value, 2);
        }
        if (isset($this->accessControlPolicy)) {
            $serializer->serializeStruct(self::$SCHEMA_ACCESS_CONTROL_POLICY, $this->accessControlPolicy, 3);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 4);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 5);
        }
        if (isset($this->grantFullControl)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_FULL_CONTROL, $this->grantFullControl, 6);
        }
        if (isset($this->grantRead)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ, $this->grantRead, 7);
        }
        if (isset($this->grantReadACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ_ACP, $this->grantReadACP, 8);
        }
        if (isset($this->grantWrite)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE, $this->grantWrite, 9);
        }
        if (isset($this->grantWriteACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE_ACP, $this->grantWriteACP, 10);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 11);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 12);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 13);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->key,
            2 => $this->aCL,
            3 => $this->accessControlPolicy,
            4 => $this->contentMD5,
            5 => $this->checksumAlgorithm,
            6 => $this->grantFullControl,
            7 => $this->grantRead,
            8 => $this->grantReadACP,
            9 => $this->grantWrite,
            10 => $this->grantWriteACP,
            11 => $this->requestPayer,
            12 => $this->versionId,
            13 => $this->expectedBucketOwner,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucket,
            $this->key,
            $this->aCL,
            $this->accessControlPolicy,
            $this->contentMD5,
            $this->checksumAlgorithm,
            $this->grantFullControl,
            $this->grantRead,
            $this->grantReadACP,
            $this->grantWrite,
            $this->grantWriteACP,
            $this->requestPayer,
            $this->versionId,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
