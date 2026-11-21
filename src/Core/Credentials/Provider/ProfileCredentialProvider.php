<?php

declare(strict_types=1);

namespace Aws\Core\Credentials\Provider;

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
 * Resolve credentials from the selected shared-config profile.
 *
 * This provider handles the profile-backed sources that resolve locally. It
 * resolves static keys first, then session keys, then
 * `credential_process` as defined by the profile configuration.
 *
 * @implements ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>
 * @implements IdentityResolverInterface<AwsCredentialsIdentityInterface>
 */
final class ProfileCredentialProvider implements
    ChainIdentityProviderInterface,
    IdentityResolverInterface
{
    private ?AwsProfile $profile = null;

    /**
     * Create a profile credential provider.
     *
     * @param int|null $refreshWindowSeconds Advisory refresh window passed to
     *     the caching resolver. Null derives it from the credential lifetime.
     */
    public function __construct(
        private readonly ?int $refreshWindowSeconds = null
    ) {}

    /**
     * Return the provider name.
     */
    public function name(): string
    {
        return 'Profile';
    }

    /**
     * Return the provider ordering.
     */
    public function ordering(): OrderingConstraint
    {
        return OrderingConstraint::after(AwsCredentialSource::SHARED_CONFIG->value);
    }

    /**
     * Return the emitted feature IDs.
     *
     * @return list<string>
     */
    public function featureIds(): array
    {
        return [];
    }

    /**
     * Register the provider for supported profile sources.
     *
     * @return void
     */
    public function setup(ChainSetup $setup): void
    {
        $profile = $setup->getProperty(AwsCredentialChainContext::PROFILE);
        if (!$profile instanceof AwsProfile) {
            return;
        }

        if (!$this->supportsProfile($profile)) {
            return;
        }

        $resolver = clone $this;
        $resolver->profile = $profile;

        $setup->addResolver(
            new CachingIdentityResolver(
                $resolver,
                $this->refreshWindowSeconds,
                AwsCredentialChain::sameCredential(...)
            ),
            self::profileFeatureIds($profile)
        );
    }

    /**
     * Resolve credentials from the bound profile.
     */
    public function resolveIdentity(array $properties = []): IdentityResult
    {
        $profile = $this->profile;
        if (!$profile instanceof AwsProfile) {
            return IdentityResult::notFound(
                self::class,
                'No shared-config profile is available'
            );
        }

        $staticCredentials = $this->resolveStaticCredentials($profile);
        if ($staticCredentials instanceof AwsCredentials) {
            return IdentityResult::success($staticCredentials);
        }

        $command = $profile->get('credential_process');
        if ($command !== null) {
            return IdentityResult::success(
                $this->resolveCredentialProcessCommand($command)
            );
        }

        return IdentityResult::notFound(
            self::class,
            'No supported profile credentials are configured'
        );
    }

    /**
     * Resolve credentials from a `credential_process` command.
     */
    public function resolveCredentialProcessCommand(string $command): AwsCredentials
    {
        $output = $this->runCommand($command);

        return $this->parseCredentialProcessCredentials($output);
    }

    /**
     * Return the feature IDs for the credential kind the profile resolves.
     *
     * Static keys (`n`) win over `credential_process` (`v`), matching
     * {@see resolveIdentity()}. A profile with neither kind returns an empty
     * list.
     *
     * @return list<string>
     */
    private static function profileFeatureIds(AwsProfile $profile): array
    {
        if ($profile->get('aws_access_key_id') !== null
            && $profile->get('aws_secret_access_key') !== null
        ) {
            return ['n'];
        }

        return $profile->get('credential_process') !== null ? ['v'] : [];
    }

    private function resolveStaticCredentials(AwsProfile $profile): ?AwsCredentials
    {
        $accessKey = $profile->get('aws_access_key_id');
        $secretKey = $profile->get('aws_secret_access_key');
        if ($accessKey === null || $secretKey === null) {
            return null;
        }

        return new AwsCredentials(
            $accessKey,
            $secretKey,
            $profile->get('aws_session_token')
        );
    }

    private function parseCredentialProcessCredentials(string $output): AwsCredentials
    {
        $data = json_decode($output, true);
        if (!\is_array($data)) {
            throw new \RuntimeException('credential_process returned invalid JSON');
        }

        if (isset($data['Version']) && $data['Version'] !== 1) {
            throw new \RuntimeException('credential_process does not return Version == 1');
        }

        $accessKey = $data['AccessKeyId'] ?? null;
        $secretKey = $data['SecretAccessKey'] ?? null;
        if (!\is_string($accessKey) || $accessKey === '') {
            throw new \RuntimeException('credential_process does not return valid credentials');
        }

        if (!\is_string($secretKey) || $secretKey === '') {
            throw new \RuntimeException('credential_process does not return valid credentials');
        }

        $sessionToken = $data['SessionToken'] ?? null;
        if ($sessionToken !== null && !\is_string($sessionToken)) {
            $sessionToken = null;
        }

        return new AwsCredentials(
            $accessKey,
            $secretKey,
            $sessionToken,
            $this->parseExpiration($data['Expiration'] ?? null)
        );
    }

    private function parseExpiration(mixed $expiration): ?float
    {
        if ($expiration === null) {
            return null;
        }

        if (!\is_string($expiration) || $expiration === '') {
            throw new \RuntimeException('credential_process returned invalid expiration');
        }

        try {
            $expirationTime = new \DateTimeImmutable($expiration);
        } catch (\Exception) {
            throw new \RuntimeException('credential_process returned invalid expiration');
        }

        $timestamp = (float) $expirationTime->getTimestamp();
        if ($timestamp <= microtime(true)) {
            throw new \RuntimeException('credential_process returned expired credentials');
        }

        return $timestamp;
    }

    /**
     * Leave invalidation to the wrapping cache, which holds the identity state.
     */
    public function invalidate(IdentityInterface $rejectedIdentity): void
    {
    }

    private function runCommand(string $command): string
    {
        $descriptorSpec = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];

        $process = proc_open($command, $descriptorSpec, $pipes);
        if (!is_resource($process)) {
            throw new \RuntimeException('Unable to execute credential_process command');
        }

        fclose($pipes[0]);
        $stdout = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[2]);
        $exitCode = proc_close($process);

        if ($exitCode !== 0) {
            $message = trim((string) $stderr);
            if ($message === '') {
                $message = 'credential_process exited with code ' . $exitCode;
            }

            throw new \RuntimeException($message);
        }

        return (string) $stdout;
    }

    private function supportsProfile(AwsProfile $profile): bool
    {
        $accessKey = $profile->get('aws_access_key_id');
        $secretKey = $profile->get('aws_secret_access_key');
        if ($accessKey !== null && $secretKey !== null) {
            return true;
        }

        return $profile->get('credential_process') !== null;
    }
}
