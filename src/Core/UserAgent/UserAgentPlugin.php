<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\UserAgent;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientConfigResolver;
use Composer\InstalledVersions;
use Smithy\Auth\IdentityChainInterface;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Plugin\AbstractPlugin;
use Smithy\Client\Plugin\PluginPhase;
use Smithy\Core\Shape\ServiceInterface;

/**
 * Install the {@see UserAgentInterceptor} for AWS clients.
 *
 * Every per-client value is resolved here once and encoded into the
 * interceptor's prefix, suffix, and config metric IDs. Tokens that stay
 * constant for the process are built once and kept in static memos.
 */
final class UserAgentPlugin extends AbstractPlugin
{
    public const MAX_APP_ID_LENGTH = 50;

    private const SERVICE_TRAIT = 'aws.api#service';

    /** Metric ID for standard retry, the only supported retry mode. */
    private const STANDARD_RETRY_ID = 'E';

    private const CORE_PACKAGE = 'aws/aws-sdk-php-core';
    private const ROOT_PACKAGE = 'aws/aws-sdk-php-v4';
    private const FALLBACK_VERSION = '4.0.0-dev';
    private const ILLEGAL = '/[^!#$%&\'*+\-.^_`|~0-9A-Za-z\/]/';

    /**
     * @var array<string, string> Namespace segment to package suffix.
     *
     * SSO and SSO OIDC ship together as `aws/aws-sdk-php-sso-oidc`.
     */
    private const PACKAGE_SUFFIXES = [
        'Sso' => 'sso-oidc',
        'SsoOidc' => 'sso-oidc',
    ];

    private static ?self $instance = null;

    private static ?string $sdkToken = null;
    private static ?string $osAndLanguage = null;

    /** @var array<string, string|null> */
    private static array $packageVersions = [];

    private readonly AwsClientConfigResolver $resolver;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct()
    {
        $this->resolver = new AwsClientConfigResolver();
    }

    /** @inheritDoc */
    public function configure(AbstractClientConfig $config): AbstractClientConfig
    {
        if (!$config instanceof AbstractAwsClientConfig
            || $config->interceptorChain->contains(
                UserAgentInterceptor::class
            )
        ) {
            return $config;
        }

        $context = $this->resolver->storedContext($config);
        if ($context === null) {
            $context = $this->resolver->resolveContext($config);
            $config = $this->resolver->withContext($config, $context);
        }

        $prefix = self::sdkToken();
        if ($config->service !== null) {
            $prefix .= ' ' . self::apiToken($config->service);
        }
        $prefix .= ' ' . self::osAndLanguage();
        $execEnv = $context->env('AWS_EXECUTION_ENV');
        if ($execEnv !== null && $execEnv !== '') {
            $prefix .= ' exec-env/' . self::sanitize($execEnv);
        }

        $suffix = '';
        $appId = $this->resolver->resolveUserAgentAppId(
            $context,
            $config->userAgentAppId
        );
        if ($appId !== null) {
            if (\strlen($appId) > self::MAX_APP_ID_LENGTH) {
                \trigger_error(
                    'The user agent app ID exceeds the recommended maximum '
                    . 'length of ' . self::MAX_APP_ID_LENGTH . ' characters.',
                    \E_USER_WARNING
                );
            }
            $suffix = ' app/' . self::sanitize($appId);
        }

        $chain = $config->credentials instanceof IdentityChainInterface
            ? $config->credentials
            : null;

        return $config->withInterceptor(new UserAgentInterceptor(
            $prefix,
            $suffix,
            $this->configIds($config, $chain !== null),
            $chain,
            $config->supportsFlexibleChecksums()
        ));
    }

    /** @inheritDoc */
    public function getPluginPhase(): PluginPhase
    {
        return PluginPhase::Last;
    }

    /**
     * @return list<string>
     */
    private function configIds(
        AbstractAwsClientConfig $config,
        bool $hasChain
    ): array
    {
        $ids = [self::STANDARD_RETRY_ID];

        if ($config->supportsFlexibleChecksums()) {
            $ids[] = $config->requestChecksumCalculation
                === RequestChecksumCalculation::WHEN_REQUIRED ? 'a' : 'Z';
            $ids[] = $config->responseChecksumValidation
                === ResponseChecksumValidation::WHEN_REQUIRED ? 'c' : 'b';
        }

        $parameters = $config->context[
            EndpointResolverInterface::CONTEXT_PARAMETERS
        ] ?? [];
        if (\is_array($parameters) && ($parameters['Endpoint'] ?? null) !== null) {
            $ids[] = 'N';
        }

        if (!$hasChain) {
            $ids[] = 'e';
        }

        return $ids;
    }

    /**
     * Return `api/<service>#<package version>`.
     *
     * The service package version comes from Composer. The API date is the
     * fallback version for a service that ships inside another package.
     */
    private static function apiToken(ServiceInterface $service): string
    {
        $sdkId = $service->getSchema()
            ->getTraitById(self::SERVICE_TRAIT)['sdkId'] ?? $service->getName();
        $segments = \explode('\\', $service::class);
        $segment = $segments[1] ?? '';
        $package = 'aws/aws-sdk-php-'
            . (self::PACKAGE_SUFFIXES[$segment] ?? \strtolower($segment));
        $version = self::packageVersion($package)
            ?? $service->getVersion();

        return 'api/' . self::serviceToken($sdkId)
            . '#' . self::sanitize($version);
    }

    /**
     * Return `aws-sdk-php/<version> ua/2.1`.
     */
    private static function sdkToken(): string
    {
        return self::$sdkToken ??= 'aws-sdk-php/'
            . self::sanitize(
                self::packageVersion(self::CORE_PACKAGE)
                    ?? self::packageVersion(self::ROOT_PACKAGE)
                    ?? self::FALLBACK_VERSION
            )
            . ' ua/2.1';
    }

    /**
     * Return `os/<family>#<version> lang/php#<version>`.
     */
    private static function osAndLanguage(): string
    {
        return self::$osAndLanguage ??= 'os/' . match (\PHP_OS_FAMILY) {
            'Linux' => 'linux',
            'Darwin' => 'macos',
            'Windows' => 'windows',
            default => 'other'
        }
            . '#' . self::sanitize(\php_uname('r'))
            . ' lang/php#' . self::sanitize(\PHP_VERSION);
    }

    /**
     * Return the installed version of a Composer package, or null.
     */
    private static function packageVersion(string $package): ?string
    {
        if (\array_key_exists($package, self::$packageVersions)) {
            return self::$packageVersions[$package];
        }

        $version = null;
        if (\class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled($package)
        ) {
            $version = InstalledVersions::getPrettyVersion($package);
        }

        if ($package === self::ROOT_PACKAGE && $version === null) {
            $version = InstalledVersions::getRootPackage()['pretty_version']
                ?? null;
        }

        return self::$packageVersions[$package] = $version;
    }

    /**
     * Replace characters outside the User-Agent token set with `-`.
     */
    private static function sanitize(string $value): string
    {
        return \preg_replace(self::ILLEGAL, '-', $value) ?? '';
    }

    /**
     * Return the `api/` token value for a service ID.
     *
     * Spaces become underscores and letters become lower case.
     */
    private static function serviceToken(string $sdkId): string
    {
        return self::sanitize(\strtolower(\str_replace(' ', '_', $sdkId)));
    }
}
