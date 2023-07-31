<?php
namespace Aws\Test\Rds;

use Aws\Credentials\Credentials;
use Aws\Rds\AuthTokenGenerator;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

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

        $this->assertStringContainsString('prod-instance.us-east-1.rds.amazonaws.com:3306', $token);
        $this->assertStringContainsString('us-west-2', $token);
        $this->assertStringContainsString('X-Amz-Credential=foo', $token);
        $this->assertStringContainsString('X-Amz-Expires=900', $token);
        $this->assertStringContainsString('X-Amz-SignedHeaders=host', $token);
        $this->assertStringContainsString('DBUser=myDBUser', $token);
        $this->assertStringContainsString('Action=connect', $token);
    }

    public function testCanCreateAuthTokenWthCredentialProvider()
    {
        $accessKeyId = 'AKID';
        $secretKeyId = 'SECRET';
        $provider = function () use ($accessKeyId, $secretKeyId) {
            return Promise\Create::promiseFor(
                new Credentials($accessKeyId, $secretKeyId)
            );
        };

        $connect = new AuthTokenGenerator($provider);
        $token = $connect->createToken(
            'prod-instance.us-east-1.rds.amazonaws.com:3306',
            'us-west-2',
            'myDBUser'
        );

        $this->assertStringContainsString('prod-instance.us-east-1.rds.amazonaws.com:3306', $token);
        $this->assertStringContainsString('us-west-2', $token);
        $this->assertStringContainsString('X-Amz-Credential=AKID', $token);
        $this->assertStringContainsString('X-Amz-Expires=900', $token);
        $this->assertStringContainsString('X-Amz-SignedHeaders=host', $token);
        $this->assertStringContainsString('DBUser=myDBUser', $token);
        $this->assertStringContainsString('Action=connect', $token);
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
        $this->assertStringContainsString('prod-instance.us-east-1.rds.amazonaws.com:3306', $token);
        $this->assertStringContainsString('us-west-2', $token);
        $this->assertStringContainsString('X-Amz-Credential=foo', $token);
        $this->assertStringContainsString("X-Amz-Expires={$lifetimeInSeconds}", $token);
        $this->assertStringContainsString('X-Amz-SignedHeaders=host', $token);
        $this->assertStringContainsString('DBUser=myDBUser', $token);
        $this->assertStringContainsString('Action=connect', $token);
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
     *
     * @param $lifetime
     */
    public function testThrowsExceptionWithInvalidLifetime($lifetime)
    {
        $this->expectExceptionMessage("Lifetime must be a positive number less than or equal to 15, was");
        $this->expectException(\InvalidArgumentException::class);
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
