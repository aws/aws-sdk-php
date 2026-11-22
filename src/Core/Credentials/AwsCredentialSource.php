<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials;

use Aws\Core\Credentials\Provider\EnvCredentialProvider;

/**
 * Define the canonical credential-chain slots.
 *
 * The enum case order is the AWS credential precedence order used when the
 * chain is assembled. Each slot also carries its canonical provider name and,
 * when applicable, the install hint for a missing provider module.
 */
enum AwsCredentialSource: string
{
    case SYSTEM_PROPERTIES = 'SYSTEM_PROPERTIES';
    case ENVIRONMENT = 'ENVIRONMENT';
    case WEB_IDENTITY_TOKEN_ENV = 'WEB_IDENTITY_TOKEN_ENV';
    case SHARED_CONFIG = 'SHARED_CONFIG';
    case PROFILE_STATIC_KEYS = 'PROFILE_STATIC_KEYS';
    case PROFILE_SESSION_KEYS = 'PROFILE_SESSION_KEYS';
    case PROFILE_ASSUME_ROLE = 'PROFILE_ASSUME_ROLE';
    case PROFILE_WEB_IDENTITY = 'PROFILE_WEB_IDENTITY';
    case PROFILE_SSO_SESSION = 'PROFILE_SSO_SESSION';
    case PROFILE_LEGACY_SSO = 'PROFILE_LEGACY_SSO';
    case PROFILE_LOGIN = 'PROFILE_LOGIN';
    case PROFILE_CREDENTIAL_PROCESS = 'PROFILE_CREDENTIAL_PROCESS';
    case ECS_CONTAINER = 'ECS_CONTAINER';
    case EC2_INSTANCE_METADATA = 'EC2_INSTANCE_METADATA';

    /**
     * Return the canonical slot order.
     *
     * @return list<string>
     */
    public static function slotOrder(): array
    {
        return \array_map(
            static fn (self $slot): string => $slot->value,
            self::cases()
        );
    }

    /**
     * Return the canonical provider name for this slot.
     */
    public function canonicalName(): string
    {
        return match ($this) {
            self::SYSTEM_PROPERTIES => 'JavaSystemProperties',
            self::ENVIRONMENT => 'Environment',
            self::WEB_IDENTITY_TOKEN_ENV => 'WebIdentityTokenEnv',
            self::SHARED_CONFIG => 'SharedConfig',
            self::PROFILE_STATIC_KEYS => 'ProfileStaticKeys',
            self::PROFILE_SESSION_KEYS => 'ProfileSessionKeys',
            self::PROFILE_ASSUME_ROLE => 'ProfileAssumeRole',
            self::PROFILE_WEB_IDENTITY => 'ProfileWebIdentity',
            self::PROFILE_SSO_SESSION => 'ProfileSsoSession',
            self::PROFILE_LEGACY_SSO => 'ProfileLegacySso',
            self::PROFILE_LOGIN => 'Login',
            self::PROFILE_CREDENTIAL_PROCESS => 'ProfileCredentialProcess',
            self::ECS_CONTAINER => 'EcsContainer',
            self::EC2_INSTANCE_METADATA => 'Ec2InstanceMetadata',
        };
    }

    /**
     * Return the module name that implements this slot.
     */
    public function moduleSuggestion(): string
    {
        return match ($this) {
            self::SYSTEM_PROPERTIES,
            self::ENVIRONMENT,
            self::SHARED_CONFIG,
            self::PROFILE_STATIC_KEYS,
            self::PROFILE_SESSION_KEYS,
            self::PROFILE_CREDENTIAL_PROCESS => 'aws-credentials-core',
            self::WEB_IDENTITY_TOKEN_ENV,
            self::PROFILE_ASSUME_ROLE,
            self::PROFILE_WEB_IDENTITY => 'aws-credentials-sts',
            self::PROFILE_SSO_SESSION,
            self::PROFILE_LEGACY_SSO => 'aws-credentials-sso',
            self::PROFILE_LOGIN => 'aws-credentials-login',
            self::ECS_CONTAINER => 'aws-credentials-ecs',
            self::EC2_INSTANCE_METADATA => 'aws-credentials-imds',
        };
    }

    /**
     * Detect a cheap environment-backed source.
     *
     * @param null|callable(string):(?string) $getEnv Optional test seam for
     *        environment lookup.
     */
    public function isDetected(?callable $getEnv = null): bool
    {
        return match ($this) {
            self::SYSTEM_PROPERTIES => false,
            self::ENVIRONMENT => self::readEnv(
                EnvCredentialProvider::ACCESS_KEY_ENV,
                $getEnv
            ) !== null
                && self::readEnv(EnvCredentialProvider::SECRET_KEY_ENV, $getEnv) !== null,
            self::WEB_IDENTITY_TOKEN_ENV => self::readEnv(
                'AWS_WEB_IDENTITY_TOKEN_FILE',
                $getEnv
            ) !== null
                && self::readEnv('AWS_ROLE_ARN', $getEnv) !== null,
            self::ECS_CONTAINER => self::readEnv(
                'AWS_CONTAINER_CREDENTIALS_FULL_URI',
                $getEnv
            ) !== null
                || self::readEnv(
                    'AWS_CONTAINER_CREDENTIALS_RELATIVE_URI',
                    $getEnv
                ) !== null,
            self::SHARED_CONFIG,
            self::PROFILE_STATIC_KEYS,
            self::PROFILE_SESSION_KEYS,
            self::PROFILE_ASSUME_ROLE,
            self::PROFILE_WEB_IDENTITY,
            self::PROFILE_SSO_SESSION,
            self::PROFILE_LEGACY_SSO,
            self::PROFILE_LOGIN,
            self::PROFILE_CREDENTIAL_PROCESS,
            self::EC2_INSTANCE_METADATA => false,
        };
    }

    /**
     * @param null|callable(string):(?string) $getEnv
     */
    private static function readEnv(string $name, ?callable $getEnv): ?string
    {
        $value = $getEnv !== null
            ? $getEnv($name)
            : ($_ENV[$name] ?? getenv($name));

        if ($value === false || $value === null || $value === '') {
            return null;
        }

        return (string) $value;
    }
}
