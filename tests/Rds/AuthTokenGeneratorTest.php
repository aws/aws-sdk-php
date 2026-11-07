<?php
namespace Aws\Test\Rds;

use Aws\Credentials\Credentials;
use Aws\Rds\AuthTokenGenerator;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

require_once __DIR__ . '/../Signature/sig_hack.php';

#[CoversClass(AuthTokenGenerator::class)]
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

    public function testTokenIsValidFor15MinutesDuringDstChange()
    {
        // 2026-10-25 01:45 CEST: "+15 minutes" falls into the repeated hour.
        $defaultTimezone = date_default_timezone_get();
        date_default_timezone_set('Europe/Berlin');
        $_SERVER['aws_time'] = strtotime('2026-10-24T23:45:00Z');
        $_SERVER['formatAwsTime'] = true;

        try {
            $token = (new AuthTokenGenerator(new Credentials('foo', 'bar')))->createToken(
                'prod-instance.us-east-1.rds.amazonaws.com:3306',
                'us-west-2',
                'myDBUser'
            );
        } finally {
            date_default_timezone_set($defaultTimezone);
            unset($_SERVER['aws_time'], $_SERVER['formatAwsTime']);
        }

        $this->assertStringContainsString('X-Amz-Date=20261024T234500Z', $token);
        $this->assertStringContainsString('X-Amz-Expires=900', $token);
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

    public static function lifetimeProvider(): array
    {
        return [
            [1],
            [14],
            ['14'],
            [15],
        ];
    }

    #[DataProvider('lifetimeProvider')]
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

    public static function lifetimeFailureProvider(): array
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

    #[DataProvider('lifetimeFailureProvider')]
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
