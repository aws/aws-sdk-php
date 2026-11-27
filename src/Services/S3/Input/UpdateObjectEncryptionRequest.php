<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\ObjectEncryption;
use Aws\Services\S3\Shape\RequestPayer;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class UpdateObjectEncryptionRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#UpdateObjectEncryptionRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_OBJECT_ENCRYPTION;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;

    public readonly ?RequestPayer $requestPayer;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;

    /**
     * @param ?string $bucket The name of the general purpose bucket that contains the specified object key name. When you
     *        use this operation with an access point attached to a general purpose bucket, you must either provide the
     * alias of
     *        the access point in place of the bucket name or you must specify the access point Amazon Resource Name (ARN).
     * When
     *        using the access point ARN, you must direct requests to the access point hostname. The access point hostname
     * takes
     *        the form AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using this operation with an
     * access
     *        point through the Amazon Web Services SDKs, you provide the access point ARN in place of the bucket name. For
     * more
     *        information about access point ARNs, see Referencing access points in the Amazon S3 User Guide.
     * @param ?string $key The key name of the object that you want to update the server-side encryption type for.
     * @param ?ObjectEncryption $objectEncryption The updated server-side encryption type for this object. The
     *        UpdateObjectEncryption operation supports the SSE-S3 and SSE-KMS encryption types. Valid Values: SSES3 |
     * SSEKMS
     * @param ?string $versionId The version ID of the object that you want to update the server-side encryption type for.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        doesn't match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?string $contentMD5 The MD5 hash for the request body. For requests made using the Amazon Web Services Command
     *        Line Interface (CLI) or Amazon Web Services SDKs, this field is calculated automatically.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the object when
     *        you use an Amazon Web Services SDK. This header doesn't provide any additional functionality if you don't use
     * the
     *        SDK. When you send this header, there must be a corresponding x-amz-checksum or x-amz-trailer header sent.
     * Otherwise,
     *        Amazon S3 fails the request with the HTTP status code 400 Bad Request. For more information, see Checking
     * object
     *        integrity in the Amazon S3 User Guide. If you provide an individual checksum, Amazon S3 ignores any provided
     *        ChecksumAlgorithm parameter.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?ObjectEncryption $objectEncryption = null,
        public readonly ?string $versionId = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?string $contentMD5 = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null
    ) {
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::updateObjectEncryptionRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_OBJECT_ENCRYPTION = $m[2];
        self::$SCHEMA_VERSION_ID = $m[3];
        self::$SCHEMA_REQUEST_PAYER = $m[4];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[5];
        self::$SCHEMA_CONTENT_MD5 = $m[6];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[7];
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
        if (isset($this->objectEncryption)) {
            $serializer->serializeUnion(self::$SCHEMA_OBJECT_ENCRYPTION, $this->objectEncryption, 2);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 3);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 4);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 5);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 6);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 7);
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
            2 => $this->objectEncryption,
            3 => $this->versionId,
            4 => $this->requestPayer,
            5 => $this->expectedBucketOwner,
            6 => $this->contentMD5,
            7 => $this->checksumAlgorithm,
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
            $this->objectEncryption,
            $this->versionId,
            $this->requestPayer,
            $this->expectedBucketOwner,
            $this->contentMD5,
            $this->checksumAlgorithm
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
