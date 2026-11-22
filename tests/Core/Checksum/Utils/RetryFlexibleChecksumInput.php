<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum\Utils;

use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Input with one streaming blob member.
 */
final class RetryFlexibleChecksumInput implements SerializableStructInterface
{
    use \Smithy\Core\Shape\WithMemberValueTrait;
    private static ?Schema $schema = null;

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: 'aws.tests#RetryFlexibleChecksumInput',
            type: ShapeType::Structure,
            members: [
                new Schema(
                    id: 'aws.tests#StreamingBlob',
                    type: ShapeType::Blob,
                    memberName: 'body',
                    memberIndex: 0,
                    traits: [Schema::T_STREAMING => true]
                )
            ]
        );
    }

    public function serialize(
        ShapeSerializerInterface $serializer,
        int $idx
    ): void
    {
    }

    public function serializeMembers(
        ShapeSerializerInterface $serializer
    ): void
    {
    }

    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}
