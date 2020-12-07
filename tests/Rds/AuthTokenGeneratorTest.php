<?php
namespace Aws\Test\Rds;

use Aws\Credentials\Credentials;
use Aws\Rds\AuthTokenGenerator;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Rds\AuthTokenGenerator
 */
class AuthTokenGeneratorTest extends TestCase
{
    public function testCanCreateAuthTokenWthCredentialInstance()
    {
        $creds = new Credentials('foo', 'bar', 'baz');
        $connect = new AuthTokenGenerator($creds);
        $token = $connect->createToken(
            'prod-instance.us-east-1.rds.amazonaws.com:3306',
            'us-west-2',
            'myDBUser'
        );

        $this->assertContains('prod-instance.us-east-1.rds.amazonaws.com:3306', $token);
        $this->assertContains('us-west-2', $token);
        $this->assertContains('X-Amz-Credential=foo', $token);
        $this->assertContains('X-Amz-Expires=900', $token);
        $this->assertContains('X-Amz-SignedHeaders=host', $token);
        $this->assertContains('DBUser=myDBUser', $token);
        $this->assertContains('Action=connect', $token);
    }

    public function testCanCreateAuthTokenWthCredentialProvider()
    {
        $accessKeyId = 'AKID';
        $secretKeyId = 'SECRET';
        $provider = function () use ($accessKeyId, $secretKeyId) {
            return Promise\promise_for(
                new Credentials($accessKeyId, $secretKeyId)
            );
        };

        $connect = new AuthTokenGenerator($provider);
        $token = $connect->createToken(
            'prod-instance.us-east-1.rds.amazonaws.com:3306',
            'us-west-2',
            'myDBUser'
        );

        $this->assertContains('prod-instance.us-east-1.rds.amazonaws.com:3306', $token);
        $this->assertContains('us-west-2', $token);
        $this->assertContains('X-Amz-Credential=AKID', $token);
        $this->assertContains('X-Amz-Expires=900', $token);
        $this->assertContains('X-Amz-SignedHeaders=host', $token);
        $this->assertContains('DBUser=myDBUser', $token);
        $this->assertContains('Action=connect', $token);
    }

    public function lifetimeProvider()
    {
        return [
            [1],
            [14],
            ['14'],
            [15],
        ];
    }

    /**
     * @dataProvider lifetimeProvider
     *
     * @param $lifetime
     */
    public function testCanCreateAuthTokenWthNonDefaultLifetime($lifetime)
    {
        $creds = new Credentials('foo', 'bar', 'baz');
        $connect = new AuthTokenGenerator($creds);
        $token = $connect->createToken(
            'prod-instance.us-east-1.rds.amazonaws.com:3306',
            'us-west-2',
            'myDBUser',
            $lifetime
        );
        $lifetimeInSeconds = $lifetime * 60;
        $this->assertContains('prod-instance.us-east-1.rds.amazonaws.com:3306', $token);
        $this->assertContains('us-west-2', $token);
        $this->assertContains('X-Amz-Credential=foo', $token);
        $this->assertContains("X-Amz-Expires={$lifetimeInSeconds}", $token);
        $this->assertContains('X-Amz-SignedHeaders=host', $token);
        $this->assertContains('DBUser=myDBUser', $token);
        $this->assertContains('Action=connect', $token);
    }

    public function lifetimeFailureProvider()
    {
        return [
            [0],
            ['0'],
            [''],
            [16],
            ['16'],
            [10000],
            [null],
        ];
    }

    /**
     * @dataProvider lifetimeFailureProvider
     * @param $lifetime
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Lifetime must be a positive number less than or equal to 15, was
     */
    public function testThrowsExceptionWithInvalidLifetime($lifetime)
    {
        $creds = new Credentials('foo', 'bar', 'baz');
        $connect = new AuthTokenGenerator($creds);
        $connect->createToken(
            'prod-instance.us-east-1.rds.amazonaws.com:3306',
            'us-west-2',
            'myDBUser',
            $lifetime
        );
    }
}
