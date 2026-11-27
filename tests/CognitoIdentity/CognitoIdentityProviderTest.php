<?php
namespace Aws\Test\CognitoIdentity;

use Aws\Api\DateTimeResult;
use Aws\CognitoIdentity\CognitoIdentityProvider;
use Aws\CognitoIdentity\Exception\CognitoIdentityException;
use Aws\Command;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\CredentialSources;
use Aws\MockHandler;
use Aws\Result;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CognitoIdentityProvider::class)]
class CognitoIdentityProviderTest extends TestCase
{
    public function testCreatesFromCognitoIdentity()
    {
        $options = [
            'region' => 'not-a-region',
            'version' => 'latest',
            'handler' => new MockHandler([
                new Result(['IdentityId' => 'foo:bar:baz']),
                new Result([
                    'Credentials' => [
                        'AccessKeyId' => 'foo',
                        'SecretKey' => 'bar',
                        'SessionToken' => 'baz',
                        'Expiration' => DateTimeResult::fromEpoch(time() + 10),
                    ]
                ]),
            ]),
        ];

        $provider = new CognitoIdentityProvider('poolId', $options);
        $credentials = call_user_func($provider)->wait();

        $this->assertSame('foo', $credentials->getAccessKeyId());
        $this->assertSame('bar', $credentials->getSecretKey());
        $this->assertSame('baz', $credentials->getSecurityToken());
        $this->assertFalse($credentials->isExpired());
        $this->assertSame(CredentialSources::COGNITO_IDENTITY, $credentials->getSource());
    }

    public function testMemoizedCognitoCredentialsKeepCachedCredentialsWhenRefreshFails()
    {
        $now = time();
        $options = [
            'region' => 'us-east-1',
            'version' => 'latest',
            'handler' => new MockHandler([
                new Result(['IdentityId' => 'foo:bar:baz']),
                new Result([
                    'Credentials' => [
                        'AccessKeyId' => 'foo',
                        'SecretKey' => 'bar',
                        'SessionToken' => 'baz',
                        // 2 minutes left puts the next call in the 5-minute advisory window.
                        'Expiration' => DateTimeResult::fromEpoch($now + 120),
                    ]
                ]),
                new CognitoIdentityException(
                    'unavailable',
                    new Command('GetId'),
                    ['code' => 'ServiceUnavailable']
                ),
            ]),
            'retries' => 0,
        ];
        $provider = CredentialProvider::memoize(
            new CognitoIdentityProvider('poolId', $options)
        );
        set_error_handler(static function () { return true; }, E_USER_WARNING);

        try {
            $first = $provider()->wait();
            // Cognito is in scope, so the failed refresh returns the cached credentials.
            $this->assertSame($first, $provider()->wait());
        } finally {
            restore_error_handler();
        }
    }

    public function testAccessTokensCanBeRefreshed()
    {
        $provider = new CognitoIdentityProvider(
            'poolId',
            ['region' => 'us-east-1',  'version' => 'latest'],
            [
                'www.amazon.com' => 'access-token-old',
                'graph.facebook.com' => 'access-token-fb',
            ]
        );

        $provider->updateLogin('www.amazon.com', 'access-token-new');
        
        $reflection = new \ReflectionClass($provider);
        $property = $reflection->getProperty('logins');
        $property->setAccessible(true);
        $logins = $property->getValue($provider);
        
        $this->assertSame(
            'access-token-new',
            $logins['www.amazon.com']
        );
    }
}
