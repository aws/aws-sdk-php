<?php

declare(strict_types=1);

namespace Aws\Tests\Core\UserAgent\Utils;

use Smithy\Auth\{IdentityChainInterface, IdentityInterface, IdentityResult};
use Smithy\Auth\ResolvedIdentityMetadata;

/**
 * Credential chain double that reports settable last-resolved metadata.
 *
 * @implements IdentityChainInterface<IdentityInterface>
 */
final class FixedMetadataChain implements IdentityChainInterface
{
    public ?ResolvedIdentityMetadata $metadata = null;

    /** @inheritDoc */
    public function resolveIdentity(array $properties = []): IdentityResult
    {
        return IdentityResult::notFound(self::class, 'Not used.');
    }

    /** @inheritDoc */
    public function invalidate(IdentityInterface $rejectedIdentity): void
    {
    }

    /** @inheritDoc */
    public function getLastResolvedMetadata(): ?ResolvedIdentityMetadata
    {
        return $this->metadata;
    }
}
