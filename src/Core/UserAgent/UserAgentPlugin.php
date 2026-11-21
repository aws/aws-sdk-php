<?php

declare(strict_types=1);

namespace Aws\Core\UserAgent;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientConfigContext;
use Aws\Core\Client\AwsClientConfigResolver;
use Smithy\Auth\IdentityChainInterface;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Plugin\AbstractPlugin;
use Smithy\Client\Plugin\PluginPhase;
use Smithy\Core\Shape\ServiceInterface;

/**
 * Install the {@see UserAgentInterceptor} for AWS clients.
 *
 * Every per-client value is resolved here once and encoded into the
 * interceptor's prefix, suffix, and config metric IDs.
 */
final class UserAgentPlugin extends AbstractPlugin
{
    public const MAX_APP_ID_LENGTH = 50;

    private const SERVICE_TRAIT = 'aws.api#service';

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
    public function configure(ClientConfig $config): ClientConfig
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

        $prefix = UserAgentStatics::sdkToken();
        if ($config->service !== null) {
            $prefix .= ' ' . self::apiToken($config->service);
        }
        $prefix .= ' ' . UserAgentStatics::osAndLanguage();
        $execEnv = $context->env('AWS_EXECUTION_ENV');
        if ($execEnv !== null && $execEnv !== '') {
            $prefix .= ' exec-env/' . UserAgentStatics::sanitize($execEnv);
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
            $suffix = ' app/' . UserAgentStatics::sanitize($appId);
        }

        $chain = $config->credentials instanceof IdentityChainInterface
            ? $config->credentials
            : null;

        return $config->withInterceptor(new UserAgentInterceptor(
            $prefix,
            $suffix,
            $this->configIds($config, $context, $chain !== null),
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
        AwsClientConfigContext $context,
        bool $hasChain
    ): array
    {
        $ids = [match (\strtolower(
            $config->retryMode ?? $this->resolver->resolveRetryMode($context)
        )) {
            'legacy' => 'D',
            'adaptive' => 'F',
            default => 'E'
        }];

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
     * fallback when the package is not installed on its own.
     */
    private static function apiToken(ServiceInterface $service): string
    {
        $sdkId = $service->getSchema()
            ->getTraitById(self::SERVICE_TRAIT)['sdkId'] ?? $service->getName();
        $segments = \explode('\\', $service::class);
        $segment = $segments[1] ?? '';
        $package = 'aws/aws-sdk-php-'
            . (self::PACKAGE_SUFFIXES[$segment] ?? \strtolower($segment));
        $version = UserAgentStatics::packageVersion($package)
            ?? $service->getVersion();

        return 'api/' . UserAgentStatics::serviceToken($sdkId)
            . '#' . UserAgentStatics::sanitize($version);
    }
}
