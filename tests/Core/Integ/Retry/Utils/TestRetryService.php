<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Utils;

use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Service with one test operation for retry tests.
 */
final class TestRetryService implements ServiceInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    private function __construct() {}

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    public function getName(): string
    {
        return 'RetryTest';
    }

    public function getId(): string
    {
        return 'smithy.tests#RetryTest';
    }

    public function getVersion(): string
    {
        return '1';
    }

    public function getSchema(): Schema
    {
        return self::$schema ??= new Schema(
            id: $this->getId(),
            type: ShapeType::Service,
            traitsById: ['smithy.tests#retryTest' => true]
        );
    }

    public function getOperations(): array
    {
        return [TestOperation::instance()];
    }

    public function getOperation(string $name): ?OperationInterface
    {
        return \strcasecmp($name, TestOperation::instance()->getName()) === 0
            ? TestOperation::instance()
            : null;
    }
}
