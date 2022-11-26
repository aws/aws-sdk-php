<?php
namespace Aws\Test\Token;

use Aws\Exception\TokenException;
use Aws\LruArrayCache;
use Aws\Result;
use Aws\SSOOIDC\SSOOIDCClient;
use Aws\Test\UsesServiceTrait;
use Aws\Token\SsoToken;
use Aws\Token\SsoTokenProvider;
use Aws\Token\Token;
use Aws\Token\TokenProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

require_once __DIR__ . '/../Token/token_hack.php';

/**
 * @covers Aws\Token\TokenProvider
 */
class TokenProviderTest extends TestCase
{
    use UsesServiceTrait;

    public function tear_down()
    {
        parent::tear_down();
        unset($_SERVER['aws_time']);
        unset($_SERVER['aws_str_to_time']);
    }

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

    private function getHomeDir() {
        if ($homeDir = getenv('HOME')) {
            return $homeDir;
        }

        // Get the HOMEDRIVE and HOMEPATH values for Windows hosts
        $homeDrive = getenv('HOMEDRIVE');
        $homePath = getenv('HOMEPATH');

        return ($homeDrive && $homePath) ? $homeDrive . $homePath : null;
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
        $time =  gmdate(
            'Y-m-d\TH:i:s\Z',
            time() + 5000
        );
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
        $key = __CLASS__ . 'tokenCache';
        $token = new Token('string', PHP_INT_MAX);
        $saved = ['token' => $token];
        $cache->set($key, $saved, $token->getExpiration() - time());

        $explodingProvider = function () {
            throw new \BadFunctionCallException('This should never be called');
        };

        $found = call_user_func(
            TokenProvider::cache($explodingProvider, $cache, $key)
        )->wait();

        $this->assertSame($token->getToken(), $found->getToken());
        $this->assertEquals($token->getExpiration(), $found->getExpiration());
    }

    public function tokenProviderSuccessCases() {
        return [
            "Valid token with all fields" =>
                [
                    "cachedToken" => [
                        "startUrl" => "https://d-123.awsapps.com/start",
                        "region" => "us-west-2",
                        "accessToken" => "cachedtoken",
                        "expiresAt" => "2021-12-27T21:30:00Z",
                        "clientId" => "clientid",
                        "clientSecret" => "YSBzZWNyZXQ=",
                        "registrationExpiresAt" => "2022-12-25T13:30:00Z",
                        "refreshToken" => "cachedrefreshtoken",
                    ],
                    "expectedToken" => [
                        "token" => "cachedtoken",
                        "expiration" => "2021-12-27T21:30:00Z",
                    ],
                ],
            "Minimal valid cached token" =>
                [
                    "cachedToken" => [
                        "accessToken" => "cachedtoken",
                        "expiresAt" => "2021-12-25T21:30:00Z",
                    ],
                    "expectedToken" => [
                        "token" => "cachedtoken",
                        "expiration" => "2021-12-25T21:30:00Z",
                    ],
                ],
        ];
    }

    /**
     * @dataProvider tokenProviderSuccessCases
     */
    public function testTokenProviderCachedSuccess($cachedToken, $expectedToken)
    {
        $_SERVER['aws_time'] = 1640466950;
        $cache = new LruArrayCache;
        $key = 'aws_cached_sso_token';
        $token = new SsoToken(
            $cachedToken['accessToken'],
            strToTime($cachedToken['expiresAt']),
            isset($cachedToken['refreshToken']) ? $cachedToken['refreshToken'] : null,
            isset($cachedToken['clientId']) ? $cachedToken['clientId'] : null,
            isset($cachedToken['clientSecret']) ? $cachedToken['clientSecret'] : null,
            isset($cachedToken['registrationExpiresAt']) ? $cachedToken['registrationExpiresAt'] : null,
            isset($cachedToken['region']) ? $cachedToken['region'] : null,
            isset($cachedToken['startUrl']) ? $cachedToken['startUrl'] : null
        );
        $saved = ['token' => $token];
        $cache->set($key, $saved, $token->getExpiration());


        $found = call_user_func(
            TokenProvider::defaultProvider(['token' => $cache])
        )->wait();

        $this->assertSame($expectedToken['token'], $found->getToken());
        $this->assertEquals(strtotime($expectedToken['expiration']), $found->getExpiration());
    }

    public function tokenProviderSuccessCasesWithRefresh() {
        return [
            "Expired token refresh with refresh token" =>
                [
                    "currentTime" => "2021-12-25T13:30:00Z",
                    "cachedToken" => [
                        "startUrl" => "https://d-123.awsapps.com/start",
                        "region" => "us-west-2",
                        "accessToken" => "expiredcachedtoken",
                        "expiresAt" => "2021-12-25T13:00:00Z",
                        "clientId" => "clientid",
                        "clientSecret" => "ABCDE123",
                        "registrationExpiresAt" => "2022-12-25T13:30:00Z",
                        "refreshToken" => "expiredcachedrefreshtoken",
                    ],
                    "refreshResponse" => [
                        "tokenType" => "Bearer",
                        "accessToken" => "newtoken",
                        "expiresIn" => "28800",
                        "refreshToken" => "newrefreshtoken",
                    ],
                    "expectedTokenWriteback" => '{
                    "startUrl": "https://d-abc123.awsapps.com/start",
                    "region": "us-west-2",
                    "accessToken": "newtoken",
                    "expiresAt": "2021-12-25T21:30:00Z",
                    "clientId": "clientid",
                    "clientSecret": "ABCDE123",
                    "registrationExpiresAt": "2022-12-25T13:30:00Z",
                    "refreshToken": "newrefreshtoken"
                }',
                    "expectedToken" => [
                        "token" => "newtoken",
                        "expiration" => "2021-12-25T21:30:00Z",
                    ],
                ],
            "Expired token refresh without new refresh token" =>
                [
                    "currentTime" => "2021-12-25T13:30:00Z",
                    "cachedToken" => [
                        "startUrl" => "https://d-123.awsapps.com/start",
                        "region" => "us-west-2",
                        "accessToken" => "expiredcachedtoken",
                        "expiresAt" => "2021-12-25T13:00:00Z",
                        "clientId" => "clientid",
                        "clientSecret" => "ABCDE123",
                        "registrationExpiresAt" => "2022-12-25T13:30:00Z",
                        "refreshToken" => "expiredcachedrefreshtoken",
                    ],
                    "refreshResponse" => [
                        "tokenType" => "Bearer",
                        "accessToken" => "newtoken",
                        "expiresIn" => "28800",
                    ],
                    "expectedTokenWriteback" => '{
                "startUrl": "https://d-abc123.awsapps.com/start",
                "region": "us-west-2",
                "accessToken": "newtoken",
                "expiresAt": "2021-12-25T21:30:00Z",
                "clientId": "clientid",
                "clientSecret": "ABCDE123",
                "registrationExpiresAt": "2022-12-25T13:30:00Z"
            }',
                    "expectedToken" => [
                        "token" => "newtoken",
                        "expiration" => "2021-12-25T21:30:00Z",
                    ],
                ],
        ];
    }

    /**
     * @dataProvider tokenProviderSuccessCasesWithRefresh
     */
    public function testTokenProviderCachedSuccessWithRefresh(
        $currentTime,
        $cachedToken,
        $refreshResponse,
        $expectedTokenWriteback,
        $expectedToken)
    {
        $_SERVER['aws_time'] = \strtotime('2021-12-25T13:30:00Z');
        $_SERVER['aws_str_to_time'] = \strtotime('2021-12-25T13:25:00Z');
        $cache = new LruArrayCache;
        $key = __CLASS__ . 'tokenCache';

        $ssooidc = $this->getTestClient('ssooidc', ['credentials' => false]);
        $fiveMinAgo = date(DATE_ISO8601, strtotime("-5min"));
        $this->addMockResults($ssooidc, [
            new Result($refreshResponse)
        ]);
        $ini = <<<EOT
[profile testCachedSuccess]
sso_session = admin
[sso-session admin]
sso_region = us-east-1
sso_start_url = https://d-abc123.awsapps.com/start
EOT;
        $token = <<<EOT
{
    "accessToken": "{$cachedToken['accessToken']}",
    "expiresAt": "{$fiveMinAgo}",
    "refreshToken": "string",
    "clientId": "clientid",
    "clientSecret": "ABCDE123",
    "registrationExpiresAt": "2022-12-25T13:30:00Z",
    "region": "us-west-2",
    "startUrl": "https://d-abc123.awsapps.com/start"
}
EOT;
        $cachedFileName = $this->getHomeDir() . '/.aws/sso/cache/62404d1783c218061f00887eb8f75121dbdef861.json';
        $dir = sys_get_temp_dir() . '/.aws';
        $iniFileName = $dir . '/config';

        try {
            file_put_contents($iniFileName, $ini);
            if (!is_dir($this->getHomeDir() . '/.aws/sso/cache/')) {
                mkdir($this->getHomeDir() . '/sso/cache/', 0777, true);
            }
            file_put_contents($cachedFileName, $token);

            $ssoTokenProvider = new SsoTokenProvider('profile testCachedSuccess', $dir . '/config', $ssooidc);

            $token = new SsoToken(
                $cachedToken['accessToken'],
                strToTime($cachedToken['expiresAt']),
                isset($cachedToken['refreshToken']) ? $cachedToken['refreshToken'] : null,
                isset($cachedToken['clientId']) ? $cachedToken['clientId'] : null,
                isset($cachedToken['clientSecret']) ? $cachedToken['clientSecret'] : null,
                isset($cachedToken['registrationExpiresAt']) ? strToTime($cachedToken['registrationExpiresAt']) : null,
                isset($cachedToken['region']) ? $cachedToken['region'] : null,
                isset($cachedToken['startUrl']) ? $cachedToken['startUrl'] : null
                );
            $saved = [
                'token' => $token,
                'refreshMethod' => function () use ($ssoTokenProvider) {
                    return $ssoTokenProvider->refresh();
                }
            ];
            $cache->set($key, $saved, $token->getExpiration());

            $found = call_user_func(
                TokenProvider::cache(TokenProvider::defaultProvider(), $cache, $key)
            )->wait();

            $this->assertJsonStringEqualsJsonString($expectedTokenWriteback, file_get_contents($cachedFileName));
            $this->assertSame($expectedToken['token'], $found->getToken());
            $this->assertEquals(strtotime($expectedToken['expiration']), $found->getExpiration());
        } finally {
            unlink($cachedFileName);
        }
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
        $token = new SsoToken(
            'string',
            PHP_INT_MAX,
            isset($cachedToken['refreshToken']) ? $cachedToken['refreshToken'] : null,
            isset($cachedToken['clientId']) ? $cachedToken['clientId'] : null,
            isset($cachedToken['clientSecret']) ? $cachedToken['clientSecret'] : null,
            isset($cachedToken['registrationExpiresAt']) ? $cachedToken['registrationExpiresAt'] : null,
            isset($cachedToken['region']) ? $cachedToken['region'] : null,
            isset($cachedToken['startUrl']) ? $cachedToken['startUrl'] : null
        );
        $saved = ['token' => $token];
        $cache->set($key, $saved, $token->getExpiration() - time());

        $explodingProvider = function () {
            throw new \BadFunctionCallException('This should never be called');
        };

        $found = call_user_func(
            TokenProvider::cache($explodingProvider, $cache, $key)
        )->wait();

        $this->assertSame($token->getToken(), $found->getToken());
        $this->assertEquals($token->getExpiration(), $found->getExpiration());
    }
}