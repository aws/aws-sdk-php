<?php

declare(strict_types=1);

namespace Aws\Core\Credentials\Provider;

use Smithy\Auth\{
    IdentityInterface,
    IdentityResolverInterface,
    IdentityResult
};

/**
 * Decorates any {@see IdentityResolverInterface} with a bound-properties
 * bag that is merged into the caller-supplied `$properties` on every
 * `resolveIdentity()` invocation.
 *
 * This is how the AWS client-config layer surfaces its resolved
 * environment (region, useFips, useDualStack, signingName, ...) to
 * credential providers that care — for example, the future EC2/ECS
 * IMDS provider, an STS AssumeRole provider (which needs to know
 * the target region to sign STS calls), or a filesystem-based
 * shared-config provider that varies by profile.
 *
 * Caller-supplied properties take precedence over the bound bag
 * so per-call overrides win.
 *
 * @template TIdentity of IdentityInterface
 * @implements IdentityResolverInterface<TIdentity>
 */
final class BoundContextCredentialProvider implements IdentityResolverInterface
{
    /**
     * @param IdentityResolverInterface<TIdentity> $inner
     * @param array<string, mixed> $boundContext
     */
    public function __construct(
        private readonly IdentityResolverInterface $inner,
        private readonly array $boundContext,
    ) {}

    public function resolveIdentity(array $properties = []): IdentityResult
    {
        // Caller wins on collisions.
        return $this->inner->resolveIdentity($properties + $this->boundContext);
    }

    public function invalidate(IdentityInterface $rejectedIdentity): void
    {
        $this->inner->invalidate($rejectedIdentity);
    }
}
