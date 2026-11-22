<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\S3\Utils;

use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Protocol\Aws\AwsProtocolException;

/**
 * Operation that reports an AWS service exception class, like an S3
 * operation, and delegates everything else to a modeled operation.
 */
final class AwsExceptionOperation implements OperationInterface
{
    public function __construct(
        private readonly OperationInterface $operation
    ) {}

    public function getName(): string
    {
        return $this->operation->getName();
    }

    public function getId(): string
    {
        return $this->operation->getId();
    }

    public function getServiceId(): ?string
    {
        return $this->operation->getServiceId();
    }

    public function getServiceExceptionClass(): string
    {
        return AwsProtocolException::class;
    }

    public function getRuntimeIdentity(): string
    {
        return $this->operation->getRuntimeIdentity();
    }

    public function getEffectiveAuthSchemes(): array
    {
        return $this->operation->getEffectiveAuthSchemes();
    }

    public function getSchema(): Schema
    {
        return $this->operation->getSchema();
    }

    public function getInputSchema(): Schema
    {
        return $this->operation->getInputSchema();
    }

    public function getOutputSchema(): Schema
    {
        return $this->operation->getOutputSchema();
    }

    public function getErrorSchemas(): array
    {
        return $this->operation->getErrorSchemas();
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return $this->operation->createInput($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return $this->operation->createOutput($members);
    }

    public function getRequestTarget(): ?string
    {
        return $this->operation->getRequestTarget();
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return $this->operation->resolveErrorSchema($discriminator);
    }

    public function getInputStreamMember(): ?Schema
    {
        return $this->operation->getInputStreamMember();
    }

    public function getOutputStreamMember(): ?Schema
    {
        return $this->operation->getOutputStreamMember();
    }
}
