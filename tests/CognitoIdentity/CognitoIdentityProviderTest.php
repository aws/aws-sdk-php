<?php
namespace Aws\Test\CognitoIdentity;

use Aws\Api\DateTimeResult;
use Aws\CognitoIdentity\CognitoIdentityProvider;
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
