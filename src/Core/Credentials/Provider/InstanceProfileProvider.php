<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials\Provider;

use Aws\Core\Credentials\AwsConfigFile;
use Aws\Core\Credentials\AwsCredentialChain;
use Aws\Core\Credentials\AwsCredentialChainContext;
use Aws\Core\Credentials\AwsCredentialSource;
use Aws\Core\Credentials\AwsProfile;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\CachingIdentityResolver;
use Smithy\Auth\ChainIdentityProviderInterface;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\IdentityInterface;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\IdentityResult;
use Smithy\Auth\OrderingConstraint;

/**
 * Resolve credentials from the EC2 Instance Metadata Service.
 *
 * This provider implements the IMDS credential specification on top of the internal
 * IMDS client. It supports disable flags, explicit profile-name selection,
 * extended-to-legacy fallback, and cached rediscovery when IMDS rotates the
 * instance profile name.
 *
 * @implements ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>
 * @implements IdentityResolverInterface<AwsCredentialsIdentityInterface>
 */
final class InstanceProfileProvider implements
    ChainIdentityProviderInterface,
    IdentityResolverInterface
{
    /** @var null|callable(array<string, mixed>, ?AwsProfile):object */
    private readonly mixed $clientFactory;
    private ?AwsProfile $profile = null;
    private ?AwsConfigFile $profileFile = null;
    private ?string $profileNameOverride = null;
    private ?string $credentialsFilePath = null;
    private ?string $configFilePath = null;
    private ?string $resolvedProfile = null;
    private string $apiVersion = 'unknown';
    private ?object $client = null;

    /**
     * Create an instance-profile credential provider.
     *
     * @param null|callable(array<string, mixed>, ?AwsProfile):object
     *     $clientFactory Create IMDS clients for resolved config.
     */
    public function __construct(
        ?callable $clientFactory = null,
        private readonly ?int $refreshWindowSeconds = null,
    ) {
        $this->clientFactory = $clientFactory;
    }

    /**
     * Return the provider name.
     */
    public function name(): string
    {
        return AwsCredentialSource::EC2_INSTANCE_METADATA->canonicalName();
    }

    /**
     * Return the provider ordering.
     */
    public function ordering(): OrderingConstraint
    {
        return OrderingConstraint::standard(AwsCredentialSource::EC2_INSTANCE_METADATA->value);
    }

    /**
     * Return the emitted feature IDs.
     *
     * @return list<string>
     */
    public function featureIds(): array
    {
        return ['0'];
    }

    /**
     * Register the provider when IMDS is enabled.
     *
     * @return void
     */
    public function setup(ChainSetup $setup): void
    {
        $resolver = clone $this;
        $resolver->profile = $this->resolveProfileFromSetup($setup);

        $profileFile = $setup->getProperty(AwsCredentialChainContext::PROFILE_FILE);
        $resolver->profileFile = $profileFile instanceof AwsConfigFile ? $profileFile : null;

        $profileName = $setup->getProperty(AwsCredentialChainContext::PROFILE_NAME_OVERRIDE);
        $resolver->profileNameOverride =
            \is_string($profileName) && $profileName !== '' ? $profileName : null;

        $credentialsFilePath = $setup->getProperty(
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH
        );
        $resolver->credentialsFilePath =
            \is_string($credentialsFilePath) && $credentialsFilePath !== ''
                ? $credentialsFilePath
                : null;

        $configFilePath = $setup->getProperty(AwsCredentialChainContext::CONFIG_FILE_PATH);
        $resolver->configFilePath = \is_string($configFilePath) && $configFilePath !== ''
            ? $configFilePath
            : null;

        if ($resolver->isDisabled(
            $setup->getProperty(AwsCredentialChainContext::DISABLE_EC2_METADATA),
            $resolver->profile,
        )) {
            return;
        }

        $setup->addTerminalResolver(new CachingIdentityResolver(
            $resolver,
            $this->refreshWindowSeconds,
            AwsCredentialChain::sameCredential(...)
        ));
    }

    /**
     * Resolve credentials from IMDS.
     */
    public function resolveIdentity(array $properties = []): IdentityResult
    {
        $profile = $this->loadProfile() ?? $this->profile;
        if ($this->isDisabled(
            $properties[AwsCredentialChainContext::DISABLE_EC2_METADATA] ?? null,
            $profile,
        )) {
            return IdentityResult::notFound(
                self::class,
                'EC2 metadata access is disabled'
            );
        }

        $requestedProfile = $this->resolveRequestedProfileName($properties);
        $basePath = $this->basePath();

        $profileName = $requestedProfile ?? $this->resolvedProfile;
        if ($profileName === null) {
            try {
                $profileName = trim($this->getClient($properties)->get($basePath));
                $this->resolvedProfile = $profileName;
                if ($this->apiVersion === 'unknown') {
                    $this->apiVersion = 'extended';
                }
            } catch (\RuntimeException $e) {
                if ($e->getCode() === 404 && $this->apiVersion === 'unknown') {
                    $this->apiVersion = 'legacy';
                    return $this->resolveIdentity($properties);
                }

                throw new \RuntimeException(
                    'Failed to discover IMDS instance profile name: '
                    . $e->getMessage(),
                    previous: $e,
                );
            }
        }

        try {
            $json = $this->getClient($properties)->get($basePath . '/' . $profileName);
            if ($this->apiVersion === 'unknown') {
                $this->apiVersion = 'extended';
            }
        } catch (\RuntimeException $e) {
            if ($e->getCode() === 404) {
                if ($this->apiVersion === 'unknown') {
                    $this->apiVersion = 'legacy';
                    return $this->resolveIdentity($properties);
                }

                if ($requestedProfile === null) {
                    $this->resolvedProfile = null;
                    return $this->resolveIdentity($properties);
                }

                throw new \RuntimeException(
                    'Invalid IMDS instance profile name: ' . $requestedProfile,
                    previous: $e,
                );
            }

            throw new \RuntimeException(
                'Failed to fetch credentials from IMDS: ' . $e->getMessage(),
                previous: $e,
            );
        }

        return IdentityResult::success($this->parseCredentials($json));
    }

    /**
     * Drop the IMDS client when the rejected credentials came from it.
     */
    public function invalidate(IdentityInterface $rejectedIdentity): void
    {
        $this->client = null;
    }

    private function parseCredentials(string $json): AwsCredentials
    {
        $data = json_decode($json, true);
        if (!is_array($data)) {
            throw new \RuntimeException('IMDS returned invalid JSON credentials');
        }

        $code = $data['Code'] ?? null;
        if ($code !== 'Success') {
            throw new \RuntimeException(
                'IMDS returned non-success code: '
                . (is_scalar($code) ? (string) $code : 'null')
            );
        }

        $accessKey = $data['AccessKeyId'] ?? null;
        $secretKey = $data['SecretAccessKey'] ?? null;
        if (!is_string($accessKey)
            || $accessKey === ''
            || !is_string($secretKey)
            || $secretKey === ''
        ) {
            throw new \RuntimeException('IMDS response missing AccessKeyId or SecretAccessKey');
        }

        $sessionToken = isset($data['Token']) && is_string($data['Token']) ? $data['Token'] : null;
        $expiration = null;
        if (isset($data['Expiration'])
            && is_string($data['Expiration'])
            && $data['Expiration'] !== ''
        ) {
            try {
                $expiration = (float) (new \DateTimeImmutable($data['Expiration']))->getTimestamp();
            } catch (\Exception) {
                $expiration = null;
            }
        }

        $accountId = isset($data['AccountId'])
            && is_string($data['AccountId'])
            && $data['AccountId'] !== ''
            ? $data['AccountId']
            : null;

        return new AwsCredentials($accessKey, $secretKey, $sessionToken, $expiration, $accountId);
    }

    /**
     * @param array<string, mixed> $properties
     * @return array{endpoint?:string, endpoint_mode?:string}
     */
    private function clientOptions(array $properties): array
    {
        $options = [];

        $endpoint = $properties[AwsCredentialChainContext::EC2_METADATA_SERVICE_ENDPOINT]
            ?? null;
        if (is_string($endpoint) && $endpoint !== '') {
            $options['endpoint'] = $endpoint;
        }

        $mode = $properties[AwsCredentialChainContext::EC2_METADATA_SERVICE_ENDPOINT_MODE]
            ?? null;
        if (is_string($mode) && $mode !== '') {
            $options['endpoint_mode'] = $mode;
        }

        return $options;
    }

    /**
     * @param array<string, mixed> $properties
     */
    private function getClient(array $properties): object
    {
        if ($this->client !== null) {
            return $this->client;
        }

        $profile = $this->loadProfile() ?? $this->profile;
        $options = $this->clientOptions($properties);

        $this->client = $this->clientFactory !== null
            ? ($this->clientFactory)($options, $profile)
            : new InstanceProfileClient($options, $profile);

        return $this->client;
    }

    /**
     * @param array<string, mixed> $properties
     */
    private function resolveRequestedProfileName(array $properties): ?string
    {
        $configured = $properties[AwsCredentialChainContext::EC2_INSTANCE_PROFILE_NAME] ?? null;
        if ($configured !== null) {
            return $this->ensureNotBlank(
                AwsCredentialChainContext::EC2_INSTANCE_PROFILE_NAME,
                $configured,
            );
        }

        $env = self::readEnv('AWS_EC2_INSTANCE_PROFILE_NAME');
        if ($env !== null) {
            return $this->ensureNotBlank('AWS_EC2_INSTANCE_PROFILE_NAME', $env);
        }

        $profile = $this->loadProfile() ?? $this->profile;
        $config = $profile?->get('ec2_instance_profile_name');
        if ($config !== null) {
            return $this->ensureNotBlank('ec2_instance_profile_name', $config);
        }

        return null;
    }

    private function isDisabled(mixed $configured, ?AwsProfile $profile): bool
    {
        if ($configured !== null) {
            return $this->toBool($configured);
        }

        $env = self::readEnv('AWS_EC2_METADATA_DISABLED');
        if ($env !== null) {
            return $this->toBool($env);
        }

        $config = $profile?->get('disable_ec2_metadata');

        return $config !== null && $this->toBool($config);
    }

    private function resolveProfileFromSetup(ChainSetup $setup): ?AwsProfile
    {
        $profile = $setup->getProperty(AwsCredentialChainContext::PROFILE);
        if ($profile instanceof AwsProfile) {
            return $profile;
        }

        $profileFile = $setup->getProperty(AwsCredentialChainContext::PROFILE_FILE);
        if (!$profileFile instanceof AwsConfigFile) {
            return null;
        }

        $profileName = $setup->getProperty(AwsCredentialChainContext::PROFILE_NAME_OVERRIDE);
        $resolvedProfileName = \is_string($profileName) && $profileName !== ''
            ? $profileName
            : (self::readEnv(SharedConfigProvider::ENV_PROFILE) ?? 'default');

        return $profileFile->getProfile($resolvedProfileName);
    }

    private function loadProfile(): ?AwsProfile
    {
        $profileFile = $this->loadProfileFile();
        $resolvedProfileName = $this->profileNameOverride
            ?? self::readEnv(SharedConfigProvider::ENV_PROFILE)
            ?? 'default';

        return $profileFile->getProfile($resolvedProfileName);
    }

    private function loadProfileFile(): AwsConfigFile
    {
        if ($this->profileFile instanceof AwsConfigFile) {
            return $this->profileFile;
        }

        return $this->profileFile = SharedConfigProvider::loadConfigFile(
            $this->credentialsFilePath,
            $this->configFilePath
        );
    }

    private function basePath(): string
    {
        return $this->apiVersion === 'legacy'
            ? '/latest/meta-data/iam/security-credentials'
            : '/latest/meta-data/iam/security-credentials-extended';
    }

    private function ensureNotBlank(string $name, mixed $value): string
    {
        $string = is_string($value) ? trim($value) : '';
        if ($string === '') {
            throw new \RuntimeException($name . ' is set but blank');
        }

        return $string;
    }

    private function toBool(mixed $value): bool
    {
        return is_bool($value)
            ? $value
            : is_string($value) && strcasecmp($value, 'true') === 0;
    }

    private static function readEnv(string $name): ?string
    {
        $value = $_ENV[$name] ?? getenv($name);
        if ($value === false || $value === null || $value === '') {
            return null;
        }

        return (string) $value;
    }
}
