<?php
namespace Aws\Test\Credentials;

use Aws\AwsClient;
use Aws\CognitoIdentity\CognitoIdentityProvider;
use Aws\Credentials\AssumeRoleWithWebIdentityCredentialProvider;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsUtils;
use Aws\Credentials\LoginCredentialProvider;
use Aws\Result;
use GuzzleHttp\Promise\Create;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CredentialsUtils::class)]
class CredentialsUtilsTest extends TestCase
{
    #[DataProvider('loopBackAddressCasesProvider')]
    public function testLoopBackAddressCases(string $host, bool $expectedResult)
    {
        $isLoopBack = CredentialsUtils::isLoopBackAddress($host);
        $this->assertEquals($expectedResult, $isLoopBack);
    }

    /**
     * @return array<string, array{host: string, expected: bool}>
     */
    public static function loopBackAddressCasesProvider(): array
    {
        return [
            'IPv6_invalid_loopBack' =>
            [
                'host' => '::2',
                'expected' => false
            ],
            'IPv6_valid_loopBack' =>
                [
                    'host' => '::1',
                    'expected' => true
                ],
            'IPv4_invalid_loopBack' =>
                [
                    'host' => '192.168.0.1',
                    'expected' => false
                ],
            'IPv4_valid_loopBack' =>
                [
                    'host' => '127.0.0.1',
                    'expected' => true
                ],
            'IPv4_valid_loopBack_2' =>
                [
                    'host' => '127.0.0.255',
                    'expected' => true
                ],
        ];
    }

    public function testSourceClientTimeoutsAreAdded(): void
    {
        $this->assertSame(
            ['timeout' => 30],
            CredentialsUtils::withSourceClientTimeouts()
        );
    }

    public function testSourceClientTimeoutsKeepCallerValues(): void
    {
        $this->assertSame(
            ['timeout' => 5, 'verify' => false],
            CredentialsUtils::withSourceClientTimeouts(['timeout' => 5, 'verify' => false])
        );
    }

    public static function internalSourceClientProvider(): array
    {
        return [
            'role-profile STS client' => [static function (): AwsClient {
                $m = new \ReflectionMethod(CredentialProvider::class, 'createDefaultStsClient');
                return $m->invoke(null, new Credentials('foo', 'bar'), 'us-west-2');
            }, 'GetCallerIdentity'],
            'web identity STS client' => [static function (): AwsClient {
                $provider = new AssumeRoleWithWebIdentityCredentialProvider([
                    'RoleArn' => 'arn:aws:iam::123456789012:role/role_name',
                    'WebIdentityTokenFile' => '/tmp/unused-token',
                    'region' => 'us-west-2',
                ]);
                $p = new \ReflectionProperty($provider, 'client');
                return $p->getValue($provider);
            }, 'GetCallerIdentity'],
            'Sign-In client' => [static function (): AwsClient {
                $m = new \ReflectionMethod(LoginCredentialProvider::class, 'buildSigninClient');
                return $m->invoke(null, 'us-west-2');
            }, 'CreateOAuth2Token'],
        ];
    }

    #[DataProvider('internalSourceClientProvider')]
    public function testInternalSourceClientsHaveTimeouts(callable $build, string $operation): void
    {
        $client = $build();
        $http = $this->captureHttpOptions($client, $operation);
        $this->assertSame(30, $http['timeout']);
        $this->assertArrayNotHasKey('connect_timeout', $http);
    }

    public function testCognitoProviderAddsTimeoutsAndKeepsCallerValues(): void
    {
        $captured = [];
        $handler = static function ($command) use (&$captured) {
            $captured[] = $command['@http'];
            return Create::promiseFor(new Result(['IdentityId' => 'id']));
        };

        $provider = new CognitoIdentityProvider('poolId', ['region' => 'us-west-2', 'handler' => $handler]);
        $client = (new \ReflectionProperty($provider, 'client'))->getValue($provider);
        $client->getId(['IdentityPoolId' => 'poolId']);
        $this->assertSame(30, $captured[0]['timeout']);

        $provider = new CognitoIdentityProvider('poolId', [
            'region' => 'us-west-2', 'handler' => $handler, 'http' => ['timeout' => 7],
        ]);
        $client = (new \ReflectionProperty($provider, 'client'))->getValue($provider);
        $client->getId(['IdentityPoolId' => 'poolId']);
        $this->assertSame(7, $captured[1]['timeout']);
    }

    /**
     * Returns the `@http` options the client applies to its commands.
     */
    private function captureHttpOptions(AwsClient $client, string $operation): array
    {
        return $client->getCommand($operation)['@http'];
    }
}
