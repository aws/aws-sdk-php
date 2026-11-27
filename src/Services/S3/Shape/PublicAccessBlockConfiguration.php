<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * The PublicAccessBlock configuration that you want to apply to this Amazon S3 bucket. You can enable the configuration
 * options in any combination. Bucket-level settings work alongside account-level settings (which may inherit from
 * organization-level policies). For more information about when Amazon S3 considers a bucket or object public, see The
 * Meaning of "Public" in the Amazon S3 User Guide.
 */
final class PublicAccessBlockConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PublicAccessBlockConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BLOCK_PUBLIC_ACLS;
    private static Schema $SCHEMA_IGNORE_PUBLIC_ACLS;
    private static Schema $SCHEMA_BLOCK_PUBLIC_POLICY;
    private static Schema $SCHEMA_RESTRICT_PUBLIC_BUCKETS;

    /**
     * @param ?bool $blockPublicAcls Specifies whether Amazon S3 should block public access control lists (ACLs) for this
     *        bucket and objects in this bucket. Setting this element to TRUE causes the following behavior: PUT Bucket ACL
     * and PUT
     *        Object ACL calls fail if the specified ACL is public. PUT Object calls fail if the request includes a public
     * ACL. PUT
     *        Bucket calls fail if the request includes a public ACL. Enabling this setting doesn't affect existing policies
     * or
     *        ACLs.
     * @param ?bool $ignorePublicAcls Specifies whether Amazon S3 should ignore public ACLs for this bucket and objects in
     *        this bucket. Setting this element to TRUE causes Amazon S3 to ignore all public ACLs on this bucket and
     * objects in
     *        this bucket. Enabling this setting doesn't affect the persistence of any existing ACLs and doesn't prevent new
     * public
     *        ACLs from being set.
     * @param ?bool $blockPublicPolicy Specifies whether Amazon S3 should block public bucket policies for this bucket.
     *        Setting this element to TRUE causes Amazon S3 to reject calls to PUT Bucket policy if the specified bucket
     * policy
     *        allows public access. Enabling this setting doesn't affect existing bucket policies.
     * @param ?bool $restrictPublicBuckets Specifies whether Amazon S3 should restrict public bucket policies for this
     *        bucket. Setting this element to TRUE restricts access to this bucket to only Amazon Web Services service
     * principals
     *        and authorized users within this account if the bucket has a public policy. Enabling this setting doesn't
     * affect
     *        previously stored bucket policies, except that public and cross-account access within any public bucket
     * policy,
     *        including non-public delegation to specific accounts, is blocked.
     */
    public function __construct(
        public readonly ?bool $blockPublicAcls = null,
        public readonly ?bool $ignorePublicAcls = null,
        public readonly ?bool $blockPublicPolicy = null,
        public readonly ?bool $restrictPublicBuckets = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::publicAccessBlockConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BLOCK_PUBLIC_ACLS = $m[0];
        self::$SCHEMA_IGNORE_PUBLIC_ACLS = $m[1];
        self::$SCHEMA_BLOCK_PUBLIC_POLICY = $m[2];
        self::$SCHEMA_RESTRICT_PUBLIC_BUCKETS = $m[3];
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
        if (isset($this->blockPublicAcls)) {
            $serializer->serializeBoolean(self::$SCHEMA_BLOCK_PUBLIC_ACLS, $this->blockPublicAcls, 0);
        }
        if (isset($this->ignorePublicAcls)) {
            $serializer->serializeBoolean(self::$SCHEMA_IGNORE_PUBLIC_ACLS, $this->ignorePublicAcls, 1);
        }
        if (isset($this->blockPublicPolicy)) {
            $serializer->serializeBoolean(self::$SCHEMA_BLOCK_PUBLIC_POLICY, $this->blockPublicPolicy, 2);
        }
        if (isset($this->restrictPublicBuckets)) {
            $serializer->serializeBoolean(self::$SCHEMA_RESTRICT_PUBLIC_BUCKETS, $this->restrictPublicBuckets, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->blockPublicAcls,
            1 => $this->ignorePublicAcls,
            2 => $this->blockPublicPolicy,
            3 => $this->restrictPublicBuckets,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->blockPublicAcls,
            $this->ignorePublicAcls,
            $this->blockPublicPolicy,
            $this->restrictPublicBuckets
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
