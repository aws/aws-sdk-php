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
 * @covers Aws\Token\SsoTokenProvider
 */
class SsoTokenProviderTest extends TestCase
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

    public function testThrowsExceptonWithOnlyStartUrl()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[profile test]
sso_session = admin
[sso-session admin]
sso_start_url = https://d-abc123.awsapps.com/start
EOT;
        file_put_contents($dir . '/config', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=test');

        $this->expectException(TokenException::class);
        $this->expectExceptionMessage("must contain the following keys: sso_start_url and sso_region.");
        try {
            $tokenProvider = new SsoTokenProvider();
            $tokenProvider()->wait();
        } finally {
            unlink($dir . '/config');
        }
    }

    public function testThrowsExceptonWithOnlySsoRegion()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[profile test]
sso_session = admin
[sso-session admin]
sso_region = us-east-2
EOT;
        file_put_contents($dir . '/config', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=test');

        $this->expectException(TokenException::class);
        $this->expectExceptionMessage("must contain the following keys: sso_start_url and sso_region.");
        try {
            $tokenProvider = new SsoTokenProvider();
            $tokenProvider()->wait();
        } finally {
            unlink($dir . '/config');
        }
    }

    public function testThrowsExceptonWithNonExistingSession()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[profile test]
sso_session = admin
EOT;
        file_put_contents($dir . '/config', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=test');

        $this->expectException(TokenException::class);
        $this->expectExceptionMessage("Profile test does not exist");
        try {
            $tokenProvider = new SsoTokenProvider();
            $tokenProvider()->wait();
        } finally {
            unlink($dir . '/config');
        }
    }

    public function testSsoSessionUnspecified()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[profile test]
region = us-east-2
[sso-session admin]
sso_region = us-east-1
sso_start_url = https://d-abc123.awsapps.com/start
EOT;

        file_put_contents($dir . '/config', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=test');

        try {
            $token = call_user_func(TokenProvider::defaultProvider())->wait();
            $this->assertNull($token);
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/config');
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
}