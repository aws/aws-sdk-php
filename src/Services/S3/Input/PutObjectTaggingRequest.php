<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\RequestPayer;
use Aws\Services\S3\Shape\Tagging;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutObjectTaggingRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutObjectTaggingRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_TAGGING;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_REQUEST_PAYER;

    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The bucket name containing the object. Access points - When you use this action with an access
     *        point for general purpose buckets, you must provide the alias of the access point in place of the bucket name
     * or
     *        specify the access point ARN. When you use this action with an access point for directory buckets, you must
     * provide
     *        the access point name in place of the bucket name. When using the access point ARN, you must direct requests
     * to the
     *        access point hostname. The access point hostname takes the form
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
     * @param ?string $key Name of the object key.
     * @param ?Tagging $tagging Container for the TagSet and Tag elements
     * @param ?string $versionId The versionId of the object that the tag-set will be added to.
     * @param ?string $contentMD5 The MD5 hash for the request body. For requests made using the Amazon Web Services Command
     *        Line Interface (CLI) or Amazon Web Services SDKs, this field is calculated automatically.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the object when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum or x-amz-trailer header sent. Otherwise, Amazon S3
     * fails
     *        the request with the HTTP status code 400 Bad Request. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide. If you provide an individual checksum, Amazon S3 ignores any provided ChecksumAlgorithm
     *        parameter.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?RequestPayer $requestPayer Confirms that the requester knows that she or he will be charged for the tagging
     *        object request. Bucket owners need not specify this parameter in their requests.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?Tagging $tagging = null,
        public readonly ?string $versionId = null,
        public readonly ?string $contentMD5 = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        public readonly ?string $expectedBucketOwner = null,
        RequestPayer|string|null $requestPayer = null
    ) {
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
        $s = Schemas::putObjectTaggingRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_TAGGING = $m[2];
        self::$SCHEMA_VERSION_ID = $m[3];
        self::$SCHEMA_CONTENT_MD5 = $m[4];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[5];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[6];
        self::$SCHEMA_REQUEST_PAYER = $m[7];
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
        if (isset($this->tagging)) {
            $serializer->serializeStruct(self::$SCHEMA_TAGGING, $this->tagging, 2);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 3);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 4);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 5);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 6);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 7);
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
            2 => $this->tagging,
            3 => $this->versionId,
            4 => $this->contentMD5,
            5 => $this->checksumAlgorithm,
            6 => $this->expectedBucketOwner,
            7 => $this->requestPayer,
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
            $this->tagging,
            $this->versionId,
            $this->contentMD5,
            $this->checksumAlgorithm,
            $this->expectedBucketOwner,
            $this->requestPayer
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
