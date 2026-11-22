<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Aws\Core\Credentials\AwsCredentialChain;
use Aws\Core\Credentials\AwsCredentialChainContext;
use Aws\Core\Credentials\AwsCredentialProviderRegistry;
use Aws\Core\Credentials\Provider\ContainerCredentialProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\ChainIdentityProviderInterface;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\IdentityResult;
use Smithy\Auth\OrderingConstraint;
use Smithy\Http\Message\Response;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class AwsCredentialChainTest extends TestCase
{
    private const VARS = [
        'AWS_ACCESS_KEY_ID',
        'AWS_SECRET_ACCESS_KEY',
        'AWS_SESSION_TOKEN',
        'AWS_WEB_IDENTITY_TOKEN_FILE',
        'AWS_ROLE_ARN',
        'AWS_ROLE_SESSION_NAME',
        'AWS_REGION',
        'AWS_DEFAULT_REGION',
        'AWS_STS_REGIONAL_ENDPOINTS',
        'AWS_CONTAINER_CREDENTIALS_FULL_URI',
    ];

    /** @var array<string, string|false> */
    private array $originalEnv = [];

    protected function setUp(): void
    {
        foreach (self::VARS as $name) {
            $this->originalEnv[$name] = getenv($name);
            putenv($name);
            unset($_ENV[$name]);
        }
    }

    protected function tearDown(): void
    {
        foreach (self::VARS as $name) {
            $prior = $this->originalEnv[$name] ?? false;
            if ($prior === false) {
                putenv($name);
                unset($_ENV[$name]);
            } else {
                putenv("{$name}={$prior}");
                $_ENV[$name] = $prior;
            }
        }
    }

    public function testDefaultChainSnapshotsEnvironmentAtAssemblyTime(): void
    {
        putenv('AWS_ACCESS_KEY_ID=FIRST');
        putenv('AWS_SECRET_ACCESS_KEY=SECRET');
        putenv('AWS_SESSION_TOKEN=TOKEN');

        $chain = new AwsCredentialChain();

        putenv('AWS_ACCESS_KEY_ID=SECOND');

        $identity = $chain->resolveIdentity()->unwrap();

        $this->assertInstanceOf(AwsCredentialsIdentityInterface::class, $identity);
        $this->assertSame('FIRST', $identity->getAccessKeyId());
        $this->assertSame('SECRET', $identity->getSecretAccessKey());
        $this->assertSame('TOKEN', $identity->getSessionToken());
    }

    public function testDefaultChainTracksWinningProviderMetadata(): void
    {
        putenv('AWS_ACCESS_KEY_ID=AKID');
        putenv('AWS_SECRET_ACCESS_KEY=SECRET');

        $chain = new AwsCredentialChain();
        $chain->resolveIdentity()->unwrap();

        $this->assertSame('Environment', $chain->getLastResolvedMetadata()?->providerName);
        $this->assertSame(['g'], $chain->getLastResolvedMetadata()?->featureIds);
    }

    public function testDefaultChainResolvesStaticKeysFromSharedCredentialsFile(): void
    {
        $dir = $this->makeTempDir();
        $credentials = $dir . '/credentials';
        file_put_contents($credentials, "[default]\naws_access_key_id = AKID\naws_secret_access_key = SECRET\n");

        $chain = new AwsCredentialChain(properties: [
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH => $credentials,
            AwsCredentialChainContext::CONFIG_FILE_PATH => $dir . '/config',
        ]);

        $identity = $chain->resolveIdentity()->unwrap();

        $this->assertSame('AKID', $identity->getAccessKeyId());
        $this->assertSame('SECRET', $identity->getSecretAccessKey());
        $this->assertNull($identity->getSessionToken());
        $this->assertSame('Profile', $chain->getLastResolvedMetadata()?->providerName);
    }

    public function testDefaultChainResolvesSessionKeysFromSharedCredentialsFile(): void
    {
        $dir = $this->makeTempDir();
        $credentials = $dir . '/credentials';
        file_put_contents($credentials, "[default]\naws_access_key_id = AKID\naws_secret_access_key = SECRET\naws_session_token = TOKEN\n");

        $chain = new AwsCredentialChain(properties: [
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH => $credentials,
            AwsCredentialChainContext::CONFIG_FILE_PATH => $dir . '/config',
        ]);

        $identity = $chain->resolveIdentity()->unwrap();

        $this->assertSame('TOKEN', $identity->getSessionToken());
        $this->assertSame('Profile', $chain->getLastResolvedMetadata()?->providerName);
    }

    public function testDefaultChainResolvesCredentialProcessFromSelectedProfile(): void
    {
        $dir = $this->makeTempDir();
        $config = $dir . '/config';
        $script = $this->makeProcessScript(<<<'PHP'
<?php
echo json_encode([
    'Version' => 1,
    'AccessKeyId' => 'PROC',
    'SecretAccessKey' => 'SECRET',
    'SessionToken' => 'TOKEN',
]);
PHP);
        $command = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($script);
        file_put_contents($config, "[profile testing]\ncredential_process = {$command}\n");

        $chain = new AwsCredentialChain(properties: [
            AwsCredentialChainContext::CONFIG_FILE_PATH => $config,
            AwsCredentialChainContext::CREDENTIALS_FILE_PATH => $dir . '/credentials',
            AwsCredentialChainContext::PROFILE_NAME_OVERRIDE => 'testing',
        ]);

        $identity = $chain->resolveIdentity()->unwrap();

        $this->assertSame('PROC', $identity->getAccessKeyId());
        $this->assertSame('Profile', $chain->getLastResolvedMetadata()?->providerName);
    }

    public function testExplicitRegistryCanInstallCustomProviders(): void
    {
        $registry = (new AwsCredentialProviderRegistry())->withProvider(
            new class implements ChainIdentityProviderInterface {
                public function name(): string { return 'custom'; }
                public function ordering(): OrderingConstraint { return OrderingConstraint::standard('ENVIRONMENT'); }
                public function featureIds(): array { return ['x']; }
                public function setup(ChainSetup $setup): void
                {
                    $setup->addTerminalResolver(new class implements IdentityResolverInterface {
                        public function resolveIdentity(
                            array $properties = []
                        ): IdentityResult
                        {
                            return IdentityResult::success(
                                new AwsCredentials('CUSTOM', 'SECRET')
                            );
                        }

                        public function invalidate(
                            \Smithy\Auth\IdentityInterface
                                $rejectedIdentity
                        ): void
                        {
                        }
                    });
                }
            },
        );

        $chain = new AwsCredentialChain($registry);
        $identity = $chain->resolveIdentity()->unwrap();

        $this->assertSame('CUSTOM', $identity->getAccessKeyId());
        $this->assertSame('custom', $chain->getLastResolvedMetadata()?->providerName);
    }

    public function testInvalidateRefreshesMatchingAccessKeyAndRetainsMetadata(): void
    {
        putenv('AWS_ACCESS_KEY_ID=AKID');
        putenv('AWS_SECRET_ACCESS_KEY=SECRET');

        $chain = new AwsCredentialChain();
        $identity = $chain->resolveIdentity()->unwrap();
        $this->assertSame('SECRET', $identity->getSecretAccessKey());
        $this->assertNotNull($chain->getLastResolvedMetadata());

        putenv('AWS_SECRET_ACCESS_KEY=NEW_SECRET');
        $chain->invalidate(new AwsCredentials('AKID', 'REJECTED_SECRET'));

        $refreshed = $chain->resolveIdentity()->unwrap();
        $this->assertSame('NEW_SECRET', $refreshed->getSecretAccessKey());
        $this->assertNotNull($chain->getLastResolvedMetadata());
    }

    public function testInvalidateRefreshesRejectedContainerCredentials(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(
            200,
            [],
            '{"AccessKeyId":"first","SecretAccessKey":"secret-1"}'
        ));
        $httpClient->queueResponse(new Response(
            200,
            [],
            '{"AccessKeyId":"second","SecretAccessKey":"secret-2"}'
        ));
        $chain = new AwsCredentialChain(new AwsCredentialProviderRegistry([
            new ContainerCredentialProvider($httpClient),
        ]));

        $first = $chain->resolveIdentity()->unwrap();
        $this->assertSame($first, $chain->resolveIdentity()->unwrap());
        $this->assertSame(1, $httpClient->sendCallCount);

        $chain->invalidate($first);

        $this->assertSame('second', $chain->resolveIdentity()->unwrap()->getAccessKeyId());
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testFailedRefreshInChainedProviderReturnsCachedCredentials(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $nearExpiry = (new \DateTimeImmutable('+60 seconds', new \DateTimeZone('UTC')))
            ->format('Y-m-d\TH:i:s.v\Z');
        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(
            200,
            [],
            sprintf('{"AccessKeyId":"first","SecretAccessKey":"s","Expiration":"%s"}', $nearExpiry)
        ));
        $httpClient->queueResponse(new Response(500, [], ''));
        $chain = new AwsCredentialChain(new AwsCredentialProviderRegistry([
            new ContainerCredentialProvider($httpClient),
        ]));

        $first = $chain->resolveIdentity()->unwrap();

        $this->assertSame($first, $chain->resolveIdentity()->unwrap());
        $this->assertSame($first, $chain->resolveIdentity()->unwrap());
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    private function makeTempDir(): string
    {
        $dir = sys_get_temp_dir() . '/aws-chain-test-' . bin2hex(random_bytes(6));
        mkdir($dir, 0777, true);
        return $dir;
    }

    private function makeProcessScript(string $contents): string
    {
        $path = sys_get_temp_dir() . '/aws-chain-process-' . bin2hex(random_bytes(6)) . '.php';
        file_put_contents($path, $contents);
        return $path;
    }
}
