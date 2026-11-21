<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Aws\Core\Credentials\AwsCredentialChain;
use Aws\Core\Credentials\AwsProfile;
use Aws\Core\Credentials\Provider\ProfileCredentialProvider;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\CachingIdentityResolver;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\IdentityResolverInterface;

final class ProfileCredentialProviderTest extends TestCase
{
    public function testSetupRegistersResolverForSupportedProfile(): void
    {
        $provider = new ProfileCredentialProvider();
        $setup = new ChainSetup([
            'aws.profile' => new AwsProfile('default', [
                'aws_access_key_id' => 'AKID',
                'aws_secret_access_key' => 'SECRET'
            ])
        ]);
        $setup->setCurrentProvider($provider);

        $provider->setup($setup);

        $this->assertCount(1, $setup->registrations());
        $identity = $setup->registrations()[0]['resolver']
            ->resolveIdentity()
            ->unwrap();
        $this->assertSame('AKID', $identity->getAccessKeyId());
    }

    public function testReturnsCredentialsFromCredentialProcessJsonOutput(): void
    {
        $script = $this->makeScript(<<<'PHP'
<?php
echo json_encode([
    'Version' => 1,
    'AccessKeyId' => 'AKID',
    'SecretAccessKey' => 'SECRET',
    'SessionToken' => 'TOKEN',
    'Expiration' => gmdate('c', time() + 3600),
]);
PHP);

        $provider = $this->providerForProfile(new AwsProfile('default', [
            'credential_process' => $this->phpCommand($script),
        ]));

        $identity = $provider->resolveIdentity()->unwrap();

        $this->assertInstanceOf(AwsCredentials::class, $identity);
        $this->assertSame('AKID', $identity->getAccessKeyId());
        $this->assertSame('SECRET', $identity->getSecretAccessKey());
        $this->assertSame('TOKEN', $identity->getSessionToken());
        $this->assertNotNull($identity->getExpirationTime());
    }

    public function testRejectsInvalidVersion(): void
    {
        $script = $this->makeScript(
            "<?php echo json_encode(['Version' => 2, 'AccessKeyId' => 'A', 'SecretAccessKey' => 'B']);"
        );
        $provider = $this->providerForProfile(new AwsProfile('default', [
            'credential_process' => $this->phpCommand($script),
        ]));

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('credential_process does not return Version == 1');

        $provider->resolveIdentity()->unwrap();
    }

    public function testRejectsExpiredCredentials(): void
    {
        $script = $this->makeScript(<<<'PHP'
<?php
echo json_encode([
    'AccessKeyId' => 'AKID',
    'SecretAccessKey' => 'SECRET',
    'Expiration' => gmdate('c', time() - 60),
]);
PHP);
        $provider = $this->providerForProfile(new AwsProfile('default', [
            'credential_process' => $this->phpCommand($script),
        ]));

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('credential_process returned expired credentials');

        $provider->resolveIdentity()->unwrap();
    }

    public function testCachesCredentialProcessResultsUntilInvalidated(): void
    {
        $stateFile = tempnam(sys_get_temp_dir(), 'profile-process-state-');
        self::assertNotFalse($stateFile);

        try {
            file_put_contents($stateFile, json_encode([
                'Version' => 1,
                'AccessKeyId' => 'FIRST',
                'SecretAccessKey' => 'SECRET',
                'Expiration' => gmdate('c', time() + 3600),
            ]));

            $script = $this->makeScript(
                '<?php echo file_get_contents(' . var_export($stateFile, true) . ');'
            );
            $provider = $this->providerForProfile(new AwsProfile('default', [
                'credential_process' => $this->phpCommand($script),
            ]));

            $first = $provider->resolveIdentity()->unwrap();

            file_put_contents($stateFile, json_encode([
                'Version' => 1,
                'AccessKeyId' => 'SECOND',
                'SecretAccessKey' => 'SECRET',
                'Expiration' => gmdate('c', time() + 3600),
            ]));

            $second = $provider->resolveIdentity()->unwrap();
            $provider->invalidate($first);
            $third = $provider->resolveIdentity()->unwrap();

            $this->assertSame('FIRST', $first->getAccessKeyId());
            $this->assertSame('FIRST', $second->getAccessKeyId());
            $this->assertSame('SECOND', $third->getAccessKeyId());
        } finally {
            @unlink($stateFile);
        }
    }

    public function testRefreshesCredentialProcessResultsInsideRefreshWindow(): void
    {
        $stateFile = tempnam(sys_get_temp_dir(), 'profile-process-state-');
        self::assertNotFalse($stateFile);

        try {
            file_put_contents($stateFile, json_encode([
                'Version' => 1,
                'AccessKeyId' => 'FIRST',
                'SecretAccessKey' => 'SECRET',
                'Expiration' => gmdate('c', time() + 60),
            ]));

            $script = $this->makeScript(
                '<?php echo file_get_contents(' . var_export($stateFile, true) . ');'
            );
            $provider = $this->providerForProfile(
                new AwsProfile('default', ['credential_process' => $this->phpCommand($script)]),
                300,
            );

            $first = $provider->resolveIdentity()->unwrap();

            file_put_contents($stateFile, json_encode([
                'Version' => 1,
                'AccessKeyId' => 'SECOND',
                'SecretAccessKey' => 'SECRET',
                'Expiration' => gmdate('c', time() + 3600),
            ]));

            $second = $provider->resolveIdentity()->unwrap();

            $this->assertSame('FIRST', $first->getAccessKeyId());
            $this->assertSame('SECOND', $second->getAccessKeyId());
        } finally {
            @unlink($stateFile);
        }
    }

    private function providerForProfile(
        AwsProfile $profile,
        int $refreshWindowSeconds = 300
    ): IdentityResolverInterface
    {
        $provider = new ProfileCredentialProvider($refreshWindowSeconds);
        $reflection = new ReflectionClass($provider);
        $property = $reflection->getProperty('profile');
        $property->setValue($provider, $profile);

        return new CachingIdentityResolver(
            $provider,
            $refreshWindowSeconds,
            AwsCredentialChain::sameCredential(...)
        );
    }

    private function makeScript(string $contents): string
    {
        $path = sys_get_temp_dir() . '/profile-process-' . bin2hex(random_bytes(6)) . '.php';
        file_put_contents($path, $contents);
        return $path;
    }

    private function phpCommand(string $script): string
    {
        return escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($script);
    }
}
