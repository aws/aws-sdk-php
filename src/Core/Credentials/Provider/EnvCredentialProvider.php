<?php

declare(strict_types=1);

namespace Aws\Core\Credentials\Provider;

use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Aws\Core\Credentials\AwsCredentialSource;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\ChainIdentityProviderInterface;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\IdentityInterface;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\IdentityResult;
use Smithy\Auth\OrderingConstraint;

/**
 * Resolve credentials from process environment variables.
 *
 * This provider implements the standard AWS env source used by the CLI and
 * the other SDKs. It requires `AWS_ACCESS_KEY_ID` and
 * `AWS_SECRET_ACCESS_KEY`, and includes `AWS_SESSION_TOKEN` when present.
 *
 * Direct calls to {@see resolveIdentity()} read the current process env each
 * time. When the provider is assembled into a chain through {@see setup()},
 * it snapshots the values until matching rejected credentials require a
 * refresh.
 *
 * @implements ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>
 * @implements IdentityResolverInterface<AwsCredentialsIdentityInterface>
 */
final class EnvCredentialProvider implements
    ChainIdentityProviderInterface,
    IdentityResolverInterface
{
    public const ACCESS_KEY_ENV = 'AWS_ACCESS_KEY_ID';
    public const SECRET_KEY_ENV = 'AWS_SECRET_ACCESS_KEY';
    public const SESSION_TOKEN_ENV = 'AWS_SESSION_TOKEN';

    private ?AwsCredentials $credentials = null;

    /**
     * Return the provider name.
     */
    public function name(): string
    {
        return AwsCredentialSource::ENVIRONMENT->canonicalName();
    }

    /**
     * Return the provider ordering.
     */
    public function ordering(): OrderingConstraint
    {
        return OrderingConstraint::standard(AwsCredentialSource::ENVIRONMENT->value);
    }

    /**
     * Return the emitted feature IDs.
     *
     * @return list<string>
     */
    public function featureIds(): array
    {
        return ['g'];
    }

    /**
     * Register the provider when env credentials are present.
     *
     * @return void
     */
    public function setup(ChainSetup $setup): void
    {
        $credentials = self::readCurrentCredentials();
        if ($credentials === null) {
            return;
        }

        $resolver = clone $this;
        $resolver->credentials = $credentials;

        $setup->addTerminalResolver($resolver);
    }

    /**
     * Resolve credentials from env.
     */
    public function resolveIdentity(array $properties = []): IdentityResult
    {
        $credentials = $this->credentials ?? self::readCurrentCredentials();
        if ($credentials === null) {
            return IdentityResult::notFound(
                self::class,
                sprintf(
                    'AWS credentials not found in environment. Set %s and %s.',
                    self::ACCESS_KEY_ENV,
                    self::SECRET_KEY_ENV
                )
            );
        }

        return IdentityResult::success($credentials);
    }

    public function invalidate(IdentityInterface $rejectedIdentity): void
    {
        if ($this->credentials !== null
            && $rejectedIdentity instanceof AwsCredentialsIdentityInterface
            && $this->credentials->getAccessKeyId()
                === $rejectedIdentity->getAccessKeyId()
        ) {
            $this->credentials = null;
        }
    }

    private static function readCurrentCredentials(): ?AwsCredentials
    {
        $accessKey = self::readEnv(self::ACCESS_KEY_ENV);
        $secretKey = self::readEnv(self::SECRET_KEY_ENV);
        if ($accessKey === null || $secretKey === null) {
            return null;
        }

        return new AwsCredentials(
            accessKeyId: $accessKey,
            secretAccessKey: $secretKey,
            sessionToken: self::readEnv(self::SESSION_TOKEN_ENV)
        );
    }

    /**
     * Read an env var.
     */
    private static function readEnv(string $name): ?string
    {
        $value = $_ENV[$name] ?? getenv($name);
        if ($value === false || $value === null || $value === '') {
            return null;
        }

        return (string) $value;
    }
}
