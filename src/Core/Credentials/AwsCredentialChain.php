<?php

declare(strict_types=1);

namespace Aws\Core\Credentials;

use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\IdentityChain;
use Smithy\Auth\IdentityChainInterface;
use Smithy\Auth\IdentityInterface;
use Smithy\Auth\IdentityResult;
use Smithy\Auth\ResolvedIdentityMetadata;

/**
 * Resolve identities through the AWS credential chain.
 *
 * This wraps Smithy's generic {@see IdentityChain} with AWS-specific slot
 * ordering and error handling. When resolution fails because a detected slot
 * is missing its provider, it appends the matching module suggestion.
 *
 * @implements IdentityChainInterface<AwsCredentialsIdentityInterface>
 */
final class AwsCredentialChain implements IdentityChainInterface
{
    /** @var IdentityChain<AwsCredentialsIdentityInterface> */
    private readonly IdentityChain $inner;
    private readonly AwsCredentialProviderRegistry $registry;

    /**
     * Create a credential chain.
     *
     * @param array<string, mixed> $properties Shared assembly-time state.
     */
    public function __construct(
        ?AwsCredentialProviderRegistry $registry = null,
        array $properties = []
    )
    {
        $this->registry = $registry ?? AwsCredentialProviderRegistry::standard();
        $this->inner = new IdentityChain(
            providers: $this->registry->providers(),
            slotOrder: AwsCredentialSource::slotOrder(),
            properties: $properties,
            identityMatcher: self::sameCredential(...)
        );
    }

    /**
     * Return true when both identities are credentials with one access key.
     */
    public static function sameCredential(
        IdentityInterface $cached,
        IdentityInterface $rejected
    ): bool
    {
        return $cached instanceof AwsCredentialsIdentityInterface
            && $rejected instanceof AwsCredentialsIdentityInterface
            && $cached->getAccessKeyId() === $rejected->getAccessKeyId();
    }

    /**
     * Resolve an identity.
     *
     * @return IdentityResult<AwsCredentialsIdentityInterface>
     */
    public function resolveIdentity(array $properties = []): IdentityResult
    {
        $result = $this->inner->resolveIdentity($properties);
        if ($result->identity !== null
            || !$this->canAppendModuleHints($result->error)
        ) {
            return $result;
        }

        $hints = $this->detectedButMissingHints();

        return $hints === ''
            ? $result
            : IdentityResult::notFound(
                self::class,
                $result->error . $hints
            );
    }

    /** @inheritDoc */
    public function invalidate(IdentityInterface $rejectedIdentity): void
    {
        $this->inner->invalidate($rejectedIdentity);
    }

    /**
     * Return the metadata for the last resolved identity.
     */
    public function getLastResolvedMetadata(): ?ResolvedIdentityMetadata
    {
        return $this->inner->getLastResolvedMetadata();
    }

    /**
     * Return the assembled Smithy identity chain.
     *
     * @return IdentityChainInterface<AwsCredentialsIdentityInterface>
     */
    public function getInner(): IdentityChainInterface
    {
        return $this->inner;
    }

    private function detectedButMissingHints(): string
    {
        $claimed = $this->registry->claimedSlotNames();
        $detected = \array_fill_keys($this->inner->getDetectedSlots(), true);
        $hints = [];

        foreach (AwsCredentialSource::cases() as $slot) {
            if ($slot->moduleSuggestion() === '') {
                continue;
            }

            if (isset($claimed[$slot->value])) {
                continue;
            }

            if (!isset($detected[$slot->value]) && !$slot->isDetected()) {
                continue;
            }

            $hints[] = sprintf(
                "Detected %s credentials; add '%s' to your dependencies.",
                $slot->value,
                $slot->moduleSuggestion()
            );
        }

        if ($hints === []) {
            return '';
        }

        return ' ' . implode(' ', $hints);
    }

    private function canAppendModuleHints(?string $message): bool
    {
        if ($message === null) {
            return false;
        }

        return str_starts_with(
            $message,
            'No identity resolvers were registered in the chain.'
        ) || str_starts_with(
            $message,
            'Unable to resolve identity from any provider in the chain.'
        );
    }
}
