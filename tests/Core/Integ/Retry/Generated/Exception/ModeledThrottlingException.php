<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Generated\Exception;

use Smithy\Core\Exception\ErrorFault;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ShapeType;

final class ModeledThrottlingException extends RetryFixtureException
    implements SerializableStructInterface
{
    use \Smithy\Core\Shape\FromMembersTrait;

    public const SHAPE_ID = 'aws.tests.retry#ModeledThrottlingException';

    private static ?Schema $schema = null;
    private static ?Schema $schemaMessage = null;

    public function __construct(
        public readonly ?string $modeledMessage = null,
        ErrorFault $fault = ErrorFault::Client,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($modeledMessage ?? '', $fault, $previous);
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
            id: self::SHAPE_ID,
            type: ShapeType::Structure,
            members: [
                new Schema(
                    id: 'smithy.api#String',
                    type: ShapeType::String_,
                    memberName: 'message',
                    memberIndex: 0
                )
            ],
            traits: [
                Schema::T_ERROR => 'client',
                Schema::T_RETRYABLE => '{"throttling":true}'
            ],
            targetClass: self::class
        );
        self::$schemaMessage = $schema->getMemberByIndex(0);

        return self::$schema = $schema;
    }

    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->modeledMessage)) {
            $serializer->serializeString(
                self::$schemaMessage,
                $this->modeledMessage,
                0
            );
        }
    }

    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->modeledMessage,
            default => null,
        };
    }
}
