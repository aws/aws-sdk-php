<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials;

use Aws\Core\Credentials\Provider\ContainerCredentialProvider;
use Aws\Core\Credentials\Provider\EnvCredentialProvider;
use Aws\Core\Credentials\Provider\InstanceProfileProvider;
use Aws\Core\Credentials\Provider\ProfileCredentialProvider;
use Aws\Core\Credentials\Provider\SharedConfigProvider;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\ChainIdentityProviderInterface;

/**
 * Collect AWS credential-chain providers.
 *
 * The registry is immutable so callers can assemble one shared provider set
 * and reuse it across clients. {@see self::standard()} returns the default
 * provider composition for the AWS credential chain.
 *
 * Core holds the providers that resolve credentials locally, from the
 * environment, the shared files, a process, or an HTTP metadata endpoint. The
 * providers that call STS or SSO (AssumeRole, WebIdentity, SSO session, legacy
 * SSO) live in the `aws/aws-sdk-php-credentials` package, which assembles the
 * full standard chain and passes the extra providers plus their claimed slots
 * into this registry. That keeps core's imports within core and Smithy, and
 * keeps the dependency between core and STS/SSO one-way.
 */
final class AwsCredentialProviderRegistry
{
    /** @var array<string, true> */
    private readonly array $claimedSlotNames;

    /**
     * Create a provider registry.
     *
     * @param list<ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>>
     *     $providers
     * @param list<AwsCredentialSource> $claimedSlots
     */
    public function __construct(
        private readonly array $providers = [],
        array $claimedSlots = []
    ) {
        $this->claimedSlotNames = $this->normalizeClaimedSlots($claimedSlots);
    }

    /**
     * Create the standard provider registry.
     */
    public static function standard(): self
    {
        return new self(self::standardProviders());
    }

    /**
     * Return a registry extended with one provider.
     *
     * @param ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>
     *     $provider
     * @param list<AwsCredentialSource> $claimedSlots
     */
    public function withProvider(
        ChainIdentityProviderInterface $provider,
        array $claimedSlots = []
    ): self
    {
        return new self([
            ...$this->providers,
            $provider
        ], $claimedSlots);
    }

    /**
     * Return the registered providers.
     *
     * @return list<ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>>
     */
    public function providers(): array
    {
        return $this->providers;
    }

    /**
     * Return the names of all claimed slots.
     *
     * @return array<string, true>
     */
    public function claimedSlotNames(): array
    {
        return $this->claimedSlotNames;
    }

    /**
     * @return list<ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>>
     */
    private static function standardProviders(): array
    {
        return [
            new EnvCredentialProvider(),
            new SharedConfigProvider(),
            new ProfileCredentialProvider(),
            new ContainerCredentialProvider(),
            new InstanceProfileProvider()
        ];
    }

    /**
     * @param list<AwsCredentialSource> $claimedSlots
     * @return array<string, true>
     */
    private function normalizeClaimedSlots(array $claimedSlots): array
    {
        $normalized = [];

        foreach ($this->providers as $provider) {
            foreach (self::inferClaimedSlots($provider) as $slot) {
                $normalized[$slot->value] = true;
            }
        }

        foreach ($claimedSlots as $slot) {
            $normalized[$slot->value] = true;
        }

        return $normalized;
    }

    /**
     * @param ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>
     *     $provider
     * @return list<AwsCredentialSource>
     */
    private static function inferClaimedSlots(
        ChainIdentityProviderInterface $provider
    ): array
    {
        return match (true) {
            $provider instanceof EnvCredentialProvider => [
                AwsCredentialSource::ENVIRONMENT
            ],
            $provider instanceof SharedConfigProvider => [
                AwsCredentialSource::SHARED_CONFIG
            ],
            $provider instanceof ProfileCredentialProvider => [
                AwsCredentialSource::PROFILE_STATIC_KEYS,
                AwsCredentialSource::PROFILE_SESSION_KEYS,
                AwsCredentialSource::PROFILE_CREDENTIAL_PROCESS
            ],
            $provider instanceof ContainerCredentialProvider => [
                AwsCredentialSource::ECS_CONTAINER
            ],
            $provider instanceof InstanceProfileProvider => [
                AwsCredentialSource::EC2_INSTANCE_METADATA
            ],
            default => []
        };
    }
}
