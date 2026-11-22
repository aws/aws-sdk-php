<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Generated;

use Aws\Tests\Core\Integ\Retry\Generated\Operation\PutObjectOperation;
use Aws\Tests\Core\Integ\Retry\Generated\Operation\ReceiveMessageOperation;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Shape\ShapeType;

final class RetryFixtureService implements ServiceInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    public function getName(): string
    {
        return 'RetryFixture';
    }

    public function getId(): string
    {
        return 'aws.tests.retry#RetryFixture';
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
            traitsById: ['aws.tests.retry#retryFixture' => true]
        );
    }

    public function getOperations(): array
    {
        return [
            PutObjectOperation::instance(),
            ReceiveMessageOperation::instance()
        ];
    }

    public function getOperation(string $name): ?OperationInterface
    {
        foreach ($this->getOperations() as $operation) {
            if ($operation->getName() === $name) {
                return $operation;
            }
        }

        return null;
    }
}
