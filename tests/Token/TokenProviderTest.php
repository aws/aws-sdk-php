<?php
namespace Aws\Test\Token;

use Aws\LruArrayCache;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Aws\Token\SsoToken;
use Aws\Token\SsoTokenProvider;
use Aws\Token\Token;
use Aws\Token\TokenInterface;
use Aws\Token\TokenProvider;
use GuzzleHttp\Promise;
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
        $ssoSessionName = 'admin';
        $ini = <<<EOT
[profile testCachedSuccess]
sso_session = $ssoSessionName
[sso-session $ssoSessionName]
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
        $cachedFileName = $this->getHomeDir() . '/.aws/sso/cache/' . mb_convert_encoding(sha1($ssoSessionName), "UTF-8") . '.json';
        $dir = sys_get_temp_dir() . '/.aws';
        $iniFileName = $dir . '/config';

        try {
            file_put_contents($iniFileName, $ini);
            if (!is_dir($this->getHomeDir() . '/.aws/sso/cache/')) {
                mkdir($this->getHomeDir() . '/sso/cache/', 0777, true);
            }
            file_put_contents($cachedFileName, $token);

            $ssoTokenProvider = new SsoTokenProvider('profile testCachedSuccess', $dir . '/config', $ssooidc);
            $ssoTokenProvider(); // This is done because before a refresh happens, the provider should have been invoked at least once.

            // This is needed to make the refresh to happen. The validation states that
            // the token needs to be refreshed at least 30 seconds after the previous refresh.
            unlink($cachedFileName);
            file_put_contents($cachedFileName, $token);
            touch($cachedFileName, strtotime('-35 seconds'));

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
                    return SsoToken::fromTokenData(
                        $ssoTokenProvider->refresh()
                    );
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

    public function testCacheWritesAndReadsCorrectFormat()
    {
        $cache = new LruArrayCache;
        $key = 'test_write_read';
        $token = new Token('test-token', strtotime('+1 hour'));
        $providerCallCount = 0;

        $provider = function() use ($token, &$providerCallCount) {
            $providerCallCount++;
            return Promise\Create::promiseFor($token);
        };

        $cachedProvider = TokenProvider::cache($provider, $cache, $key);

        // First call should invoke provider and write to cache
        $result1 = $cachedProvider()->wait();
        $this->assertEquals(1, $providerCallCount);
        $this->assertEquals('test-token', $result1->getToken());

        // Verify cache structure
        $cachedValue = $cache->get($key);
        $this->assertIsArray($cachedValue, 'Cache should store an array');
        $this->assertArrayHasKey('token', $cachedValue, 'Cached array should have token key');
        $this->assertInstanceOf(TokenInterface::class, $cachedValue['token']);

        // Second call should use cache without invoking provider
        $result2 = $cachedProvider()->wait();
        $this->assertEquals(1, $providerCallCount, 'Provider should not be called again');
        $this->assertEquals('test-token', $result2->getToken());
    }
}
