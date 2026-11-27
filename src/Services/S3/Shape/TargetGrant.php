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
 * Container for granting information. Buckets that use the bucket owner enforced setting for Object Ownership don't
 * support target grants. For more information, see Permissions server access log delivery in the Amazon S3 User Guide.
 */
final class TargetGrant implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#TargetGrant';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_GRANTEE;
    private static Schema $SCHEMA_PERMISSION;

    public readonly ?BucketLogsPermission $permission;

    /**
     * @param ?Grantee $grantee Container for the person being granted permissions.
     * @param ?BucketLogsPermission $permission Logging permissions assigned to the grantee for the bucket.
     */
    public function __construct(
        public readonly ?Grantee $grantee = null,
        BucketLogsPermission|string|null $permission = null
    ) {
        $this->permission = $permission === null || $permission instanceof BucketLogsPermission ? $permission : BucketLogsPermission::fromValue($permission);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::targetGrant();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_GRANTEE = $m[0];
        self::$SCHEMA_PERMISSION = $m[1];
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
        if (isset($this->grantee)) {
            $serializer->serializeStruct(self::$SCHEMA_GRANTEE, $this->grantee, 0);
        }
        if (isset($this->permission)) {
            $serializer->serializeString(self::$SCHEMA_PERMISSION, $this->permission->value, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->grantee,
            1 => $this->permission,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->grantee,
            $this->permission
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
