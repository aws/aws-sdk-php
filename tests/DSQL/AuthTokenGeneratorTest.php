<?php

namespace Aws\Tests\DSQL;

use Aws\Credentials\Credentials;
use Aws\DSQL\AuthTokenGenerator;
use GuzzleHttp\Promise;
use TypeError;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\DSQL\AuthTokenGenerator
 */
class AuthTokenGeneratorTest extends TestCase
{
    /**
     * @param $endpoint
     * @param $credentials
     * @param $action
     * @return void
     *
     * @dataProvider generateAuthTokenProvider
     */
    public function testGeneratesAuthToken($credentials, $action)
    {
        $tokenGenerator = new AuthTokenGenerator($credentials);
        $token = $tokenGenerator->$action('peccy.dsql.us-east-1.on.aws', 'us-east-1', 450);

        $this->assertStringContainsString(
            'peccy.dsql.us-east-1.on.aws/?Action='
            . preg_match('/generate(.*?)AuthToken/', $action, $m) && $m[1],
            $token
        );
        $this->assertStringContainsString('X-Amz-Credential=AKID', $token);
        $this->assertStringContainsString('X-Amz-Expires=450', $token);
        $this->assertStringContainsString('us-east-1%2Fdsql', $token);
        $this->assertStringNotContainsString('http://', $token);
        $this->assertStringNotContainsString('https://', $token);
    }

    public function generateAuthTokenProvider()
    {   $accessKeyId = 'AKID';
        $secretKeyId = 'SECRET';
        $credentials = new Credentials($accessKeyId, $secretKeyId);
        $credentialProvider = static function () use ($accessKeyId, $secretKeyId) {
            return Promise\Create::promiseFor(
                new Credentials($accessKeyId, $secretKeyId)
            );
        };

        return [
            [$credentials, 'generateDbConnectAuthToken'],
            [$credentialProvider, 'generateDbConnectAuthToken'],
            [$credentials, 'generateDbConnectAdminAuthToken'],
            [$credentialProvider, 'generateDbConnectAdminAuthToken'],
        ];
    }

    /**
     * @param $action
     * @param $endpoint
     * @param $region
     * @return void
     *
     * @dataProvider missingInputProvider
     */
    public function testThrowsOnMissingInput($action, $endpoint, $region)
    {
        $this->expectException(TypeError::class);
        $creds = new Credentials('foo', 'bar', 'baz');
        $connect = new AuthTokenGenerator($creds);
        $connect->$action(
            $endpoint,
            $region,
        );
    }

    public function missingInputProvider()
    {
        return [
            ['generateDbConnectAuthToken', 'foo.bar.baz', null],
            ['generateDbConnectAdminAuthToken', 'foo.bar.baz', null],
            ['generateDbConnectAuthToken', null, 'foo-region'],
            ['generateDbConnectAdminAuthToken', null, 'foo-region']
        ];
    }

    /**
     * @param $action
     * @param $endpoint
     * @param $region
     *
     * @return void
     *
     * @dataProvider emptyInputProvider
     */
    public function testThrowsOnEmptyInput($action, $endpoint, $region)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('must be a non-empty string.');
        $creds = new Credentials('foo', 'bar', 'baz');
        $connect = new AuthTokenGenerator($creds);
        $connect->$action(
            $endpoint,
            $region,
        );
    }

    public function emptyInputProvider()
    {
        return [
            ['generateDbConnectAuthToken', 'foo.bar.baz', ''],
            ['generateDbConnectAdminAuthToken', 'foo.bar.baz', ''],
            ['generateDbConnectAuthToken', '', 'foo-region'],
            ['generateDbConnectAdminAuthToken', '', 'foo-region']
        ];
    }

    public function lifetimeFailureProvider()
    {
        return [
            [0, 'generateDbConnectAuthToken'],
            [0, 'generateDbConnectAdminAuthToken'],
            [-16, 'generateDbConnectAuthToken'],
            [-16, 'generateDbConnectAdminAuthToken'],
        ];
    }

    /**
     * @dataProvider lifetimeFailureProvider
     *
     * @param $lifetime
     */
    public function testThrowsExceptionWithInvalidLifetime($expiration, $action)
    {
        $this->expectExceptionMessage("Lifetime must be a positive number, was");
        $this->expectException(\InvalidArgumentException::class);
        $creds = new Credentials('foo', 'bar', 'baz');
        $connect = new AuthTokenGenerator($creds);
        $connect->$action(
            'foo.bar.baz',
            'us-west-2',
            $expiration
        );
    }

    public function testTokenGenerationDefaultExpiration()
    {
        $accessKeyId = 'AKID';
        $secretKeyId = 'SECRET';
        $credentials = new Credentials($accessKeyId, $secretKeyId);
        $tokenGenerator = new AuthTokenGenerator($credentials);
        $token = $tokenGenerator->generateDbConnectAuthToken(
            'peccy.dsql.us-east-1.on.aws',
            'us-east-1'
        );

        $this->assertStringContainsString('X-Amz-Credential=AKID', $token);
        $this->assertStringContainsString('X-Amz-Expires=900', $token);
        $this->assertStringContainsString('us-east-1%2Fdsql', $token);
    }
}
