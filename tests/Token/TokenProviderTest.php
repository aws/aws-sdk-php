<?php
namespace Aws\Test\Token;


use Aws\Exception\TokenException;
use Aws\LruArrayCache;
use Aws\Result;
use Aws\SSOOIDC\SSOOIDCClient;
use Aws\Test\UsesServiceTrait;
use Aws\Token\SsoTokenProvider;
use Aws\Token\Token;
use Aws\Token\TokenProvider;
use Aws\Token\SsoToken;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

require_once __DIR__ . '/../Token/token_hack.php';

/**
 * @covers Aws\Token\TokenProvider
 */
class TokenProviderTest extends TestCase
{
    use UsesServiceTrait;

    private function clearEnv() {
        putenv('AWS_SHARED_CREDENTIALS_FILE');
        putenv('HOME');
        putenv('AWS_PROFILE');
        unset($_SERVER['AWS_SHARED_CREDENTIALS_FILE']);
        unset($_SERVER['HOME']);
        unset($_SERVER['AWS_PROFILE']);

        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $ssoDir = $dir . '/sso/cache';
        if (!is_dir($ssoDir)) {
            mkdir($ssoDir, 0777, true);
        }

        return $dir;
    }

    public function testSsoResolvesWithDefaultProvider()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[profile test]
sso_session = admin
[sso-session admin]
sso_region = us-east-1
sso_start_url = https://d-abc123.awsapps.com/start
EOT;
        $time = time();
        $token = <<<EOT
{
    "accessToken": "string",
    "expiresAt": "{$time}",
    "refreshToken": "string",
    "clientId": "ABCDEFG323242423121312312312312312",
    "clientSecret": "ABCDE123",
    "registrationExpiresAt": "2022-03-06T19:53:17Z",
    "region": "us-west-2",
    "startUrl": "https://d-abc123.awsapps.com/start"
}
EOT;

        file_put_contents($dir . '/config', $ini);
        file_put_contents($dir . '/sso/cache/d033e22ae348aeb5660fc2140aec35850c4da997.json', $token);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=test');

        try {
            $token = call_user_func(TokenProvider::defaultProvider())->wait();
            $this->assertSame("string", $token->getToken());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/config');
            unlink($dir . '/sso/cache/d033e22ae348aeb5660fc2140aec35850c4da997.json');
        }
    }

    public function testCreatesFromCache()
    {
        $cache = new LruArrayCache;
        $key = __CLASS__ . 'tokenCacahe';
        $saved = new Token('string', PHP_INT_MAX);
        $cache->set($key, $saved, $saved->getExpiration() - time());

        $explodingProvider = function () {
            throw new \BadFunctionCallException('This should never be called');
        };

        $found = call_user_func(
            TokenProvider::cache($explodingProvider, $cache, $key)
        )->wait();

        $this->assertSame($saved->getToken(), $found->getToken());
        $this->assertEquals($saved->getExpiration(), $found->getExpiration());
    }

    public function tokenProviderFailureCases() {
        return [
            "Minimal expired cached token" =>
                [
                    "cachedToken" => [
                        "accessToken" => "cachedtoken",
                        "expiresAt" => "2021-12-25T13:00:00Z",
                    ],
                    "expectedException" => 'ExpiredToken'
                ],
            "Token missing the expiresAt field" =>
                [
                    "cachedToken" => [
                        "accessToken" => "cachedtoken",
                    ],
                    "expectedException" => 'InvalidToken'
                ],
            "Token missing the accessToken field" =>
                [
                    "cachedToken" => [
                        "expiresAt" => "2021-12-25T13:00:00Z",
                    ],
                    "expectedException" => 'InvalidToken'
                ],
            "Expired token and expired client registration" =>
                [
                    "cachedToken" => [
                        "startUrl" => "https://d-123.awsapps.com/start",
                        "region" => "us-west-2",
                        "accessToken" => "cachedtoken",
                        "expiresAt" => "2021-10-25T13:00:00Z",
                        "clientId" => "clientid",
                        "clientSecret" => "YSBzZWNyZXQ=",
                        "registrationExpiresAt" => "2021-11-25T13:30:00Z",
                        "refreshToken" => "cachedrefreshtoken",
                    ],
                    "expectedException" => 'ExpiredToken'
                ],
        ];
    }


    /**
     * @dataProvider tokenProviderFailureCases
     */
    public function testTokenProviderFailureCases($cachedToken, $expectedException)
    {
        $cache = new LruArrayCache;
        $key = __CLASS__ . 'tokenCache';
        $saved = new SsoToken(
            'string',
            PHP_INT_MAX,
            isset($cachedToken['refreshToken']) ? $cachedToken['refreshToken'] : null,
            isset($cachedToken['clientId']) ? $cachedToken['clientId'] : null,
            isset($cachedToken['clientSecret']) ? $cachedToken['clientSecret'] : null,
            isset($cachedToken['registrationExpiresAt']) ? $cachedToken['registrationExpiresAt'] : null,
            isset($cachedToken['region']) ? $cachedToken['region'] : null,
            isset($cachedToken['startUrl']) ? $cachedToken['startUrl'] : null
        );
        $cache->set($key, $saved, $saved->getExpiration() - time());

        $explodingProvider = function () {
            throw new \BadFunctionCallException('This should never be called');
        };

        $found = call_user_func(
            TokenProvider::cache($explodingProvider, $cache, $key)
        )->wait();

        $this->assertSame($saved->getToken(), $found->getToken());
        $this->assertEquals($saved->getExpiration(), $found->getExpiration());
    }
}