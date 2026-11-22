<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum\Utils;

use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Service with one checksum-required operation for retry tests.
 */
final class RetryFlexibleChecksumService implements ServiceInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    public function getName(): string
    {
        return 'RetryFlexibleChecksumService';
    }

    public function getId(): string
    {
        return 'aws.tests#RetryFlexibleChecksumService';
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
            traitsById: ['aws.tests#retryChecksum' => true]
        );
    }

    public function getOperations(): array
    {
        return [RetryFlexibleChecksumOperation::instance()];
    }

    public function getOperation(string $name): ?OperationInterface
    {
        return $name === RetryFlexibleChecksumOperation::instance()->getName()
            ? RetryFlexibleChecksumOperation::instance()
            : null;
    }
}
