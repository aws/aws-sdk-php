<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Aws\Core\Credentials\AwsConfigFile;
use Aws\Core\Credentials\AwsCredentialChainContext;
use Aws\Core\Credentials\AwsProfile;
use Aws\Core\Credentials\Provider\InstanceProfileProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\IdentityResolverInterface;

final class InstanceProfileProviderTest extends TestCase
{
    private const VARS = [
        'AWS_EC2_METADATA_DISABLED',
        'AWS_EC2_INSTANCE_PROFILE_NAME',
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

    public function testSetupDoesNotRegisterWhenDisabledByProperty(): void
    {
        $provider = new InstanceProfileProvider();
        $setup = new ChainSetup([
            AwsCredentialChainContext::DISABLE_EC2_METADATA => true,
        ]);
        $setup->setCurrentProvider($provider);

        $provider->setup($setup);

        $this->assertCount(0, $setup->registrations());
    }

    public function testSetupDoesNotRegisterWhenDisabledByProfileConfig(): void
    {
        $provider = new InstanceProfileProvider();
        $profile = new AwsProfile('default', ['disable_ec2_metadata' => 'true']);
        $setup = new ChainSetup([
            AwsCredentialChainContext::PROFILE => $profile,
            AwsCredentialChainContext::PROFILE_FILE => new AwsConfigFile(['default' => $profile]),
        ]);
        $setup->setCurrentProvider($provider);

        $provider->setup($setup);

        $this->assertCount(0, $setup->registrations());
    }

    public function testResolveIdentityDiscoversExtendedProfileAndParsesCredentials(): void
    {
        $calls = [];
        $provider = new InstanceProfileProvider(
            clientFactory: static function (array $options, ?AwsProfile $profile) use (&$calls): object {
                return new class ($calls) {
                    private array $calls;

                    public function __construct(array &$calls)
                    {
                        $this->calls =& $calls;
                    }

                    public function get(string $path): string
                    {
                        $this->calls[] = $path;
                        return match ($path) {
                            '/latest/meta-data/iam/security-credentials-extended' => 'my-profile',
                            '/latest/meta-data/iam/security-credentials-extended/my-profile' => json_encode([
                                'Code' => 'Success',
                                'AccessKeyId' => 'AKID',
                                'SecretAccessKey' => 'SECRET',
                                'Token' => 'TOKEN',
                                'Expiration' => gmdate('c', time() + 3600),
                                'AccountId' => '123456789012',
                            ]),
                            default => throw new \RuntimeException('not found', 404),
                        };
                    }
                };
            },
        );

        $identity = $provider->resolveIdentity()->unwrap();

        $this->assertSame('AKID', $identity->getAccessKeyId());
        $this->assertSame('123456789012', $identity->getAccountId());
        $this->assertSame([
            '/latest/meta-data/iam/security-credentials-extended',
            '/latest/meta-data/iam/security-credentials-extended/my-profile',
        ], $calls);
    }

    public function testResolveIdentityFallsBackToLegacyOnUnknownExtended404(): void
    {
        $calls = [];
        $provider = new InstanceProfileProvider(
            clientFactory: static function (array $options, ?AwsProfile $profile) use (&$calls): object {
                return new class ($calls) {
                    private array $calls;

                    public function __construct(array &$calls)
                    {
                        $this->calls =& $calls;
                    }

                    public function get(string $path): string
                    {
                        $this->calls[] = $path;
                        return match ($path) {
                            '/latest/meta-data/iam/security-credentials-extended' => throw new \RuntimeException('missing', 404),
                            '/latest/meta-data/iam/security-credentials' => 'legacy-profile',
                            '/latest/meta-data/iam/security-credentials/legacy-profile' => json_encode([
                                'Code' => 'Success',
                                'AccessKeyId' => 'LEGACY',
                                'SecretAccessKey' => 'SECRET',
                                'Token' => 'TOKEN',
                            ]),
                            default => throw new \RuntimeException('missing', 404),
                        };
                    }
                };
            },
        );

        $identity = $provider->resolveIdentity()->unwrap();

        $this->assertSame('LEGACY', $identity->getAccessKeyId());
        $this->assertSame([
            '/latest/meta-data/iam/security-credentials-extended',
            '/latest/meta-data/iam/security-credentials',
            '/latest/meta-data/iam/security-credentials/legacy-profile',
        ], $calls);
    }

    public function testResolveIdentityUsesExplicitProfileNameFromProperty(): void
    {
        $provider = $this->providerWithSetupProperties([
            AwsCredentialChainContext::EC2_INSTANCE_PROFILE_NAME => 'fixed-profile',
        ], static function (array $options, ?AwsProfile $profile): object {
            return new class {
                public function get(string $path): string
                {
                    if ($path !== '/latest/meta-data/iam/security-credentials-extended/fixed-profile') {
                        throw new \RuntimeException('unexpected path', 500);
                    }

                    return json_encode([
                        'Code' => 'Success',
                        'AccessKeyId' => 'FIXED',
                        'SecretAccessKey' => 'SECRET',
                        'Token' => 'TOKEN',
                    ]);
                }
            };
        });

        $identity = $provider->resolveIdentity([
            AwsCredentialChainContext::EC2_INSTANCE_PROFILE_NAME => 'fixed-profile',
        ])->unwrap();

        $this->assertSame('FIXED', $identity->getAccessKeyId());
    }

    public function testResolveIdentityClearsResolvedProfileOnCredential404AndRetries(): void
    {
        $calls = [];
        $provider = new InstanceProfileProvider(
            clientFactory: static function (array $options, ?AwsProfile $profile) use (&$calls): object {
                return new class ($calls) {
                    private array $calls;
                    private int $discoveries = 0;

                    public function __construct(array &$calls)
                    {
                        $this->calls =& $calls;
                    }

                    public function get(string $path): string
                    {
                        $this->calls[] = $path;
                        if ($path === '/latest/meta-data/iam/security-credentials-extended') {
                            $this->discoveries++;
                            return $this->discoveries === 1 ? 'old-profile' : 'new-profile';
                        }

                        if ($path === '/latest/meta-data/iam/security-credentials-extended/old-profile') {
                            throw new \RuntimeException('missing', 404);
                        }

                        if ($path === '/latest/meta-data/iam/security-credentials-extended/new-profile') {
                            return json_encode([
                                'Code' => 'Success',
                                'AccessKeyId' => 'NEWKEY',
                                'SecretAccessKey' => 'SECRET',
                            ]);
                        }

                        throw new \RuntimeException('missing', 404);
                    }
                };
            },
        );

        $identity = $provider->resolveIdentity()->unwrap();

        $this->assertSame('NEWKEY', $identity->getAccessKeyId());
        $this->assertSame([
            '/latest/meta-data/iam/security-credentials-extended',
            '/latest/meta-data/iam/security-credentials-extended/old-profile',
            '/latest/meta-data/iam/security-credentials-extended',
            '/latest/meta-data/iam/security-credentials-extended/new-profile',
        ], $calls);
    }

    public function testResolveIdentityRejectsDirectCallsWhenDisabledByProperty(): void
    {
        $provider = new InstanceProfileProvider(
            clientFactory: static function (array $options, ?AwsProfile $profile): object {
                throw new \LogicException('IMDS client should not be created when disabled');
            },
        );

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('EC2 metadata access is disabled');

        $provider->resolveIdentity([
            AwsCredentialChainContext::DISABLE_EC2_METADATA => true,
        ])->unwrap();
    }

    private function providerWithSetupProperties(array $properties, callable $clientFactory): IdentityResolverInterface
    {
        $provider = new InstanceProfileProvider($clientFactory);
        $setup = new ChainSetup($properties);
        $setup->setCurrentProvider($provider);
        $provider->setup($setup);

        return $setup->registrations()[0]['resolver'];
    }
}
