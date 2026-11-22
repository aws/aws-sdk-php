<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Utils;

use Aws\Core\Exception\AwsException;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Operation with empty input and output for retry tests.
 */
final class TestOperation implements OperationInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct() {}

    public function getName(): string
    {
        return 'TestOperation';
    }

    public function getId(): string
    {
        return 'smithy.tests#TestOperation';
    }

    public function getServiceId(): ?string
    {
        return null;
    }

    public function getServiceExceptionClass(): string
    {
        return AwsException::class;
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
        return TestInput::class;
    }

    public function getOutputClass(): string
    {
        return TestOutput::class;
    }

    public function getErrors(): array
    {
        return [];
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: 'smithy.tests#TestOperation',
            type: ShapeType::Operation
        );
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function inputSchema(): Schema
    {
        return TestInput::schema();
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    public static function outputSchema(): Schema
    {
        return TestOutput::schema();
    }

    public function getErrorSchemas(): array
    {
        return [];
    }

    public function createInput(array $members): \Smithy\Core\Serde\SerializableStructInterface
    {
        $inputClass = $this->getInputClass();

        return $inputClass === ""
            ? \Smithy\Core\Shape\Document\StructDocument::fromMembers(
                $this->getInputSchema(),
                $members
            )
            : new $inputClass(...$members);
    }

    public function createOutput(array $members): \Smithy\Core\Serde\SerializableStructInterface
    {
        $outputClass = $this->getOutputClass();

        return $outputClass === ""
            ? \Smithy\Core\Shape\Document\StructDocument::fromMembers(
                $this->getOutputSchema(),
                $members
            )
            : new $outputClass(...$members);
    }

    public function getRequestTarget(): ?string
    {
        return \defined(static::class . "::TARGET")
            ? \constant(static::class . "::TARGET")
            : $this->getName();
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        $errorMap = $this->getSchema()->getTrait(Schema::T_ERRORS) ?? [];
        $errorClass = $errorMap[$discriminator] ?? null;

        return \is_string($errorClass)
            && \method_exists($errorClass, "schema")
                ? $errorClass::schema()
                : null;
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
