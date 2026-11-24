<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials\Utils;

use Smithy\Auth\ChainIdentityProviderInterface;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\IdentityInterface;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\IdentityResult;
use Smithy\Auth\OrderingConstraint;

/**
 * Chain provider whose resolver never finds credentials.
 */
final class MissingChainProvider implements ChainIdentityProviderInterface
{
    public function __construct(
        private readonly string $name,
        private readonly string $slot,
        private readonly string $reason,
        private readonly ?string $detectedSlot = null
    ) {}

    public function name(): string
    {
        return $this->name;
    }

    public function ordering(): OrderingConstraint
    {
        return OrderingConstraint::standard($this->slot);
    }

    public function featureIds(): array
    {
        return [];
    }

    public function setup(ChainSetup $setup): void
    {
        if ($this->detectedSlot !== null) {
            $setup->markDetected($this->detectedSlot);
        }
        $reason = $this->reason;
        $setup->addResolver(new class($reason) implements IdentityResolverInterface {
            public function __construct(private readonly string $reason) {}

            public function resolveIdentity(array $properties = []): IdentityResult
            {
                return IdentityResult::notFound(self::class, $this->reason);
            }

            public function invalidate(IdentityInterface $rejectedIdentity): void {}
        });
    }
}
