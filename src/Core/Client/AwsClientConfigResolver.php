<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Client;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Credentials\AwsConfigFile;
use Aws\Core\Credentials\AwsCredentialChain;
use Aws\Core\Credentials\AwsCredentialChainContext;
use Aws\Core\Credentials\AwsCredentialProviderRegistry;
use Aws\Core\Credentials\AwsProfile;
use Aws\Core\Credentials\Provider\SharedConfigProvider;
use Smithy\Auth\IdentityChainInterface;
use Smithy\Client\Plugin\RequestCompressionPlugin as CompressionPlugin;
use Smithy\Client\Retry\StandardRetryStrategy;

/**
 * Resolve AWS-wide client config inputs once at construction time.
 */
final class AwsClientConfigResolver
{
    public const CONTEXT_KEY = 'aws.clientConfigContext';

    public const ENV_RETRY_MODE = 'AWS_RETRY_MODE';
    public const ENV_MAX_ATTEMPTS = 'AWS_MAX_ATTEMPTS';
    public const ENV_UA_APP_ID = 'AWS_SDK_UA_APP_ID';
    public const ENV_REGION = 'AWS_REGION';
    public const ENV_DEFAULT_REGION = 'AWS_DEFAULT_REGION';
    public const ENV_AUTH_SCHEME_PREFERENCE =
        'AWS_AUTH_SCHEME_PREFERENCE';
    public const ENV_REQUEST_CHECKSUM_CALCULATION =
        'AWS_REQUEST_CHECKSUM_CALCULATION';
    public const ENV_RESPONSE_CHECKSUM_VALIDATION =
        'AWS_RESPONSE_CHECKSUM_VALIDATION';
    public const ENV_DISABLE_REQUEST_COMPRESSION =
        'AWS_DISABLE_REQUEST_COMPRESSION';
    public const ENV_REQUEST_MIN_COMPRESSION_SIZE_BYTES =
        'AWS_REQUEST_MIN_COMPRESSION_SIZE_BYTES';

    /**
     * Build the AWS config context for one client.
     */
    public function buildContext(array $context): AwsClientConfigContext
    {
        $stored = $this->storedContextFromContext($context);
        if ($stored instanceof AwsClientConfigContext) {
            return $stored;
        }

        $env = $this->snapshotEnv();
        $profileName = $this->resolveProfileName($context, $env);
        $profileFile = $this->resolveProfileFile($context, $env);
        $profile = $this->resolveProfile($context, $profileFile, $profileName);

        return new AwsClientConfigContext(
            env: $env,
            profileName: $profileName,
            credentialsFilePath: $profileFile->credentialsFilePath,
            configFilePath: $profileFile->configFilePath,
            profileFile: $profileFile,
            profile: $profile
        );
    }

    /**
     * Build default credentials from the resolved AWS context.
     */
    public function resolveCredentials(
        AwsClientConfigContext $context,
        ?AwsCredentialProviderRegistry $registry = null
    ): IdentityChainInterface
    {
        return new AwsCredentialChain(
            $registry,
            $this->credentialChainProperties($context)
        );
    }

    /**
     * Resolve the AWS region from env or shared config.
     */
    public function resolveRegion(AwsClientConfigContext $context): string
    {
        $region = $context->env(self::ENV_REGION)
            ?? $context->env(self::ENV_DEFAULT_REGION)
            ?? $context->profile?->get('region');
        if ($region !== null) {
            return $region;
        }

        throw new \InvalidArgumentException(
            'AWS region is required. Set region explicitly, set '
            . self::ENV_REGION . ' or ' . self::ENV_DEFAULT_REGION
            . ', or configure region in the selected profile.'
        );
    }

    /**
     * Resolve retry mode from env or shared config.
     */
    public function resolveRetryMode(AwsClientConfigContext $context): string
    {
        $envRetryMode = $context->env(self::ENV_RETRY_MODE);
        if ($envRetryMode !== null) {
            return $this->normalizeRetryMode($envRetryMode);
        }

        $profileRetryMode = $context->profile?->get('retry_mode');
        if ($profileRetryMode !== null) {
            return $this->normalizeRetryMode($profileRetryMode);
        }

        return 'standard';
    }

    /**
     * Resolve the opaque user agent app ID.
     *
     * Precedence: explicit client value, `AWS_SDK_UA_APP_ID`, then
     * `sdk_ua_app_id` from the selected profile.
     */
    public function resolveUserAgentAppId(
        AwsClientConfigContext $context,
        ?string $explicit
    ): ?string
    {
        foreach ([
            $explicit,
            $context->env(self::ENV_UA_APP_ID),
            $context->profile?->get('sdk_ua_app_id')
        ] as $candidate) {
            if ($candidate !== null && $candidate !== '') {
                return $candidate;
            }
        }

        return null;
    }

    /**
     * Resolve max attempts from env or shared config.
     */
    public function resolveMaxAttempts(
        AwsClientConfigContext $context,
        string $signingName
    ): int
    {
        $envMaxAttempts = $context->env(self::ENV_MAX_ATTEMPTS);
        if ($envMaxAttempts !== null) {
            return $this->parseMaxAttempts(
                $envMaxAttempts,
                'environment variable ' . self::ENV_MAX_ATTEMPTS
            );
        }

        $profileMaxAttempts = $context->profile?->get('max_attempts');
        if ($profileMaxAttempts !== null) {
            return $this->parseMaxAttempts(
                $profileMaxAttempts,
                'shared config max_attempts'
            );
        }

        return $this->defaultMaxAttempts($signingName);
    }

    /**
     * Resolve auth scheme preference from env or shared config.
     *
     * @return list<string>
     */
    public function resolveAuthSchemePreference(
        AwsClientConfigContext $context
    ): array
    {
        $envValue = $context->env(self::ENV_AUTH_SCHEME_PREFERENCE);
        if ($envValue !== null) {
            return $this->parseAuthSchemePreference(
                $envValue,
                'environment variable '
                    . self::ENV_AUTH_SCHEME_PREFERENCE
            );
        }

        $profileValue = $context->profile?->get(
            'auth_scheme_preference'
        );
        if ($profileValue !== null) {
            return $this->parseAuthSchemePreference(
                $profileValue,
                'shared config auth_scheme_preference'
            );
        }

        return [];
    }

    /**
     * Resolve request checksum calculation from env or shared config.
     */
    public function resolveRequestChecksumCalculation(
        AwsClientConfigContext $context
    ): RequestChecksumCalculation
    {
        $envValue = $context->env(
            self::ENV_REQUEST_CHECKSUM_CALCULATION
        );
        if ($envValue !== null) {
            return RequestChecksumCalculation::fromString($envValue);
        }

        $profileValue = $context->profile?->get(
            'request_checksum_calculation'
        );
        if ($profileValue !== null) {
            return RequestChecksumCalculation::fromString($profileValue);
        }

        return RequestChecksumCalculation::WHEN_SUPPORTED;
    }

    /**
     * Resolve response checksum validation from env or shared config.
     */
    public function resolveResponseChecksumValidation(
        AwsClientConfigContext $context
    ): ResponseChecksumValidation
    {
        $envValue = $context->env(
            self::ENV_RESPONSE_CHECKSUM_VALIDATION
        );
        if ($envValue !== null) {
            return ResponseChecksumValidation::fromString($envValue);
        }

        $profileValue = $context->profile?->get(
            'response_checksum_validation'
        );
        if ($profileValue !== null) {
            return ResponseChecksumValidation::fromString($profileValue);
        }

        return ResponseChecksumValidation::WHEN_SUPPORTED;
    }

    /**
     * Return the AWS context stored in the context bag, if present.
     *
     * @param array<string, mixed> $context
     */
    public function storedContextFromContext(
        array $context
    ): ?AwsClientConfigContext
    {
        $stored = $context[self::CONTEXT_KEY] ?? null;

        return $stored instanceof AwsClientConfigContext ? $stored : null;
    }

    /**
     * Return the context bag with the AWS context stored in it.
     *
     * @param array<string, mixed> $context
     * @return array<string, mixed>
     */
    public function storeContext(
        array $context,
        AwsClientConfigContext $awsContext
    ): array
    {
        return [
            ...$context,
            self::CONTEXT_KEY => $awsContext
        ];
    }

    /**
     * Build the AWS config context for one client.
     */
    public function resolveContext(
        AbstractAwsClientConfig $config
    ): AwsClientConfigContext
    {
        return $this->buildContext($config->context);
    }

    /**
     * Resolve retry settings from explicit config, env, profile, and defaults.
     *
     * @return array{mode: string, maxAttempts: int, baseDelay: float}
     */
    public function resolveRetrySettings(
        AbstractAwsClientConfig $config,
        AwsClientConfigContext $context
    ): array
    {
        return [
            'mode' => $config->retryMode !== null
                ? $this->normalizeRetryMode($config->retryMode)
                : $this->resolveRetryMode($context),
            'maxAttempts' => $config->maxAttempts !== null
                ? $this->validateMaxAttempts($config->maxAttempts)
                : $this->resolveMaxAttempts($context, $config->signingName),
            'baseDelay' => $this->defaultBaseDelay($config->signingName)
        ];
    }

    /**
     * Resolve checksum settings from explicit config, env, profile, and defaults.
     *
     * @return array{
     *     requestChecksumCalculation: RequestChecksumCalculation,
     *     responseChecksumValidation: ResponseChecksumValidation
     * }
     */
    public function resolveChecksumSettings(
        AbstractAwsClientConfig $config,
        AwsClientConfigContext $context
    ): array
    {
        return [
            'requestChecksumCalculation' => $config->requestChecksumCalculation
                ?? $this->resolveRequestChecksumCalculation($context),
            'responseChecksumValidation' => $config->responseChecksumValidation
                ?? $this->resolveResponseChecksumValidation($context)
        ];
    }

    /**
     * Copy AWS request-compression environment values into generic config.
     */
    public function withRequestCompressionSettings(
        AbstractAwsClientConfig $config,
        AwsClientConfigContext $context
    ): AbstractAwsClientConfig
    {
        $disableKey =
            CompressionPlugin::CONFIG_DISABLE_REQUEST_COMPRESSION;
        $minimumSizeKey =
            CompressionPlugin::CONFIG_REQUEST_MIN_COMPRESSION_SIZE_BYTES;
        $settings = [
            $disableKey =>
                $context->env(self::ENV_DISABLE_REQUEST_COMPRESSION),
            $minimumSizeKey =>
                $context->env(
                    self::ENV_REQUEST_MIN_COMPRESSION_SIZE_BYTES
                )
        ];
        foreach ($settings as $name => $value) {
            if ($value !== null
                && !\array_key_exists($name, $config->context)
            ) {
                $config = $config->withContext($name, $value);
            }
        }

        return $config;
    }

    /**
     * Return the config context stored on the client config, if present.
     */
    public function storedContext(
        AbstractAwsClientConfig $config
    ): ?AwsClientConfigContext
    {
        return $this->storedContextFromContext($config->context);
    }

    /**
     * Return the config with the resolved AWS context stored in its context.
     */
    public function withContext(
        AbstractAwsClientConfig $config,
        AwsClientConfigContext $context
    ): AbstractAwsClientConfig
    {
        return $config->withContext(self::CONTEXT_KEY, $context);
    }

    /**
     * Return the context values used to assemble the default credential chain.
     *
     * @return array<string, mixed>
     */
    private function credentialChainProperties(
        AwsClientConfigContext $context
    ): array
    {
        return [
            AwsCredentialChainContext::PROFILE_NAME_OVERRIDE =>
                $context->profileName,
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH =>
                $context->credentialsFilePath,
            AwsCredentialChainContext::CONFIG_FILE_PATH =>
                $context->configFilePath,
            AwsCredentialChainContext::PROFILE_FILE =>
                $context->profileFile,
            AwsCredentialChainContext::PROFILE => $context->profile
        ];
    }

    /**
     * @param array<string, ?string> $env
     */
    private function resolveProfileName(
        array $context,
        array $env
    ): string
    {
        $profileName = $context[
            AwsCredentialChainContext::PROFILE_NAME_OVERRIDE
        ] ?? null;
        if (\is_string($profileName) && $profileName !== '') {
            return $profileName;
        }

        return $env[SharedConfigProvider::ENV_PROFILE] ?? 'default';
    }

    /**
     * @param array<string, ?string> $env
     */
    private function resolveProfileFile(
        array $context,
        array $env
    ): AwsConfigFile
    {
        $profileFile = $context[
            AwsCredentialChainContext::PROFILE_FILE
        ] ?? null;
        if ($profileFile instanceof AwsConfigFile) {
            return $profileFile;
        }

        $credentialsFile = $context[AwsCredentialChainContext::CREDENTIALS_FILE_PATH] ?? null;
        $configFile = $context[AwsCredentialChainContext::CONFIG_FILE_PATH] ?? null;

        return AwsConfigFile::fromEnvironment(
            $env,
            \is_string($credentialsFile) ? $credentialsFile : null,
            \is_string($configFile) ? $configFile : null
        );
    }

    private function resolveProfile(
        array $context,
        AwsConfigFile $profileFile,
        string $profileName
    ): ?AwsProfile
    {
        $profile = $context[AwsCredentialChainContext::PROFILE]
            ?? null;
        if ($profile instanceof AwsProfile) {
            return $profile;
        }

        return $profileFile->getProfile($profileName);
    }

    private function normalizeRetryMode(string $retryMode): string
    {
        $normalized = \strtolower(\trim($retryMode));
        if ($normalized === 'standard') {
            return $normalized;
        }

        if ($normalized === 'adaptive') {
            throw new \InvalidArgumentException(
                'AWS retry mode "adaptive" is outside this preview. '
                . 'Use the supported retry mode "standard".'
            );
        }

        if ($normalized === 'legacy') {
            throw new \InvalidArgumentException(
                'AWS retry mode "legacy" is not supported. '
                . 'Use the supported retry mode "standard".'
            );
        }

        throw new \InvalidArgumentException(
            'Unsupported AWS retry mode "' . $retryMode . '". '
            . 'Use the supported retry mode "standard".'
        );
    }

    private function parseMaxAttempts(string $value, string $source): int
    {
        $trimmed = \trim($value);
        if ($trimmed === '' || !\preg_match('/^\d+$/', $trimmed)) {
            throw new \InvalidArgumentException(
                'Invalid AWS max attempts value from ' . $source . '.'
            );
        }

        return $this->validateMaxAttempts((int) $trimmed);
    }

    /**
     * @return list<string>
     */
    private function parseAuthSchemePreference(
        string $value,
        string $source
    ): array
    {
        $normalized = \str_replace([' ', "\t"], '', $value);
        if ($normalized === '') {
            throw new \InvalidArgumentException(
                'Invalid AWS auth scheme preference from '
                . $source
                . ': expected a comma-delimited list of non-empty names.'
            );
        }

        $preference = [];
        foreach (\explode(',', $normalized) as $name) {
            if ($name === '') {
                throw new \InvalidArgumentException(
                    'Invalid AWS auth scheme preference from '
                    . $source
                    . ': expected a comma-delimited list of '
                    . 'non-empty names.'
                );
            }
            if (!\in_array($name, $preference, true)) {
                $preference[] = $name;
            }
        }

        return $preference;
    }

    private function validateMaxAttempts(int $maxAttempts): int
    {
        if ($maxAttempts < 1) {
            throw new \InvalidArgumentException(
                'AWS max attempts must be greater than zero.'
            );
        }

        return $maxAttempts;
    }

    private function defaultMaxAttempts(string $signingName): int
    {
        return $signingName === 'dynamodb'
            || $signingName === 'dynamodbstreams'
            ? 4
            : StandardRetryStrategy::MAX_ATTEMPTS;
    }

    private function defaultBaseDelay(string $signingName): float
    {
        return $signingName === 'dynamodb'
            || $signingName === 'dynamodbstreams'
            ? 0.025
            : StandardRetryStrategy::BASE_DELAY;
    }

    /**
     * @return array<string, string>
     */
    private function snapshotEnv(): array
    {
        $resolved = [];
        $system = getenv();
        if (is_array($system)) {
            foreach ($system as $name => $value) {
                if (!is_string($name)
                    || !is_string($value)
                    || $value === ''
                ) {
                    continue;
                }

                $resolved[$name] = $value;
            }
        }

        foreach ($_ENV as $name => $value) {
            if (!is_string($name)
                || !is_string($value)
                || $value === ''
            ) {
                continue;
            }

            $resolved[$name] = $value;
        }

        return $resolved;
    }
}
