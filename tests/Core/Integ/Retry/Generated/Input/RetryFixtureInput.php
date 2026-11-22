<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Generated\Input;

use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ShapeType;

final class RetryFixtureInput implements SerializableStructInterface
{
    use \Smithy\Core\Shape\FromMembersTrait;

    private static ?Schema $schema = null;

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: 'aws.tests.retry#RetryFixtureInput',
            type: ShapeType::Structure,
            targetClass: self::class
        );
    }

    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    public function serializeMembers(ShapeSerializerInterface $serializer): void {}

    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}
