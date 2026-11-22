<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Generated\Output;

use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ShapeType;

final class RetryFixtureOutput implements SerializableStructInterface
{
    use \Smithy\Core\Shape\FromMembersTrait;

    private static ?Schema $schema = null;
    private static ?Schema $schemaResult = null;

    public function __construct(public readonly ?string $result = null)
    {
        self::schema();
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        if (self::$schema !== null) {
            return self::$schema;
        }

        $schema = new Schema(
            id: 'aws.tests.retry#RetryFixtureOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(
                    id: 'smithy.api#String',
                    type: ShapeType::String_,
                    memberName: 'result',
                    memberIndex: 0
                )
            ],
            targetClass: self::class
        );
        self::$schemaResult = $schema->getMemberByIndex(0);

        return self::$schema = $schema;
    }

    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->result)) {
            $serializer->serializeString(
                self::$schemaResult,
                $this->result,
                0
            );
        }
    }

    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->result,
            default => null,
        };
    }
}
