<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Generated\Operation;

use Aws\Tests\Core\Integ\Retry\Generated\Exception\ModeledRetryableException;
use Aws\Tests\Core\Integ\Retry\Generated\Exception\ModeledThrottlingException;
use Aws\Tests\Core\Integ\Retry\Generated\Exception\RetryFixtureException;
use Aws\Tests\Core\Integ\Retry\Generated\Input\RetryFixtureInput;
use Aws\Tests\Core\Integ\Retry\Generated\Output\RetryFixtureOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

final class PutObjectOperation implements OperationInterface
{
    public const NAME = 'PutObject';
    public const ID = 'aws.tests.retry#PutObject';
    public const INPUT_CLASS = RetryFixtureInput::class;
    public const OUTPUT_CLASS = RetryFixtureOutput::class;
    public const ERRORS = [
        ModeledRetryableException::class,
        ModeledThrottlingException::class
    ];

    private static ?self $instance = null;
    private static ?Schema $schema = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
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

    public function getServiceId(): ?string
    {
        return 'aws.tests.retry#RetryFixture';
    }

    public function getServiceExceptionClass(): string
    {
        return RetryFixtureException::class;
    }

    public function getRuntimeIdentity(): string
    {
        return self::class;
    }

    public function getEffectiveAuthSchemes(): array
    {
        return ['smithy.api#noAuth'];
    }

    public function getInputClass(): string
    {
        return self::INPUT_CLASS;
    }

    public function getOutputClass(): string
    {
        return self::OUTPUT_CLASS;
    }

    public function getErrors(): array
    {
        return self::ERRORS;
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: self::ID,
            type: ShapeType::Operation,
            traits: [Schema::T_ERRORS => self::ERRORS]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return RetryFixtureInput::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return RetryFixtureOutput::schema();
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    public function getErrorSchemas(): array
    {
        return [
            ModeledRetryableException::schema(),
            ModeledThrottlingException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return RetryFixtureInput::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return RetryFixtureOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'ModeledRetryableException' =>
                ModeledRetryableException::schema(),
            'ModeledThrottlingException' =>
                ModeledThrottlingException::schema(),
            default => null
        };
    }

    public function getInputStreamMember(): ?Schema
    {
        return null;
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
