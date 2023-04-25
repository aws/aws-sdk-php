<?php
namespace Aws\Test\Token;


use Aws\Exception\TokenException;
use Aws\LruArrayCache;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Aws\Token\SsoTokenProvider;
use Aws\Token\Token;
use Aws\Token\TokenProvider;
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

        return $dir;
    }

    public function set_up()
    {
        $this->home = getenv('HOME');
        $this->homedrive = getenv('HOMEDRIVE');
        $this->homepath = getenv('HOMEPATH');
    }

    public function tear_down()
    {
        putenv('HOME=' . $this->home);
        putenv('HOMEDRIVE=' . $this->homedrive);
        putenv('HOMEPATH=' . $this->homepath);
    }


    public function testSsoTokenProviderSuccess()
    {
        $dir = $this->clearEnv();
        $expiration = time() + 1000;
        $ini = <<<EOT
[default]
sso_account_id = 12345
sso_session = session-name
sso_role_name = roleName

[sso-session session-name]
sso_start_url = url.co.uk
sso_region = us-west-2
EOT;
        $tokenFile = <<<EOT
{
    "startUrl": "https://d-123.awsapps.com/start",
    "region": "us-west-2",
    "accessToken": "token",
    "expiresAt": "2500-12-25T21:30:00Z"
}
EOT;

        $configFilename = $dir . '/config';
        file_put_contents($configFilename, $ini);

        putenv('HOME=' . dirname($dir));

        $tokenLocation = SsoTokenProvider::getTokenLocation('session-name');
        if (!is_dir(dirname($tokenLocation))) {
            mkdir(dirname($tokenLocation), 0777, true);
        }

        file_put_contents($tokenLocation, $tokenFile);

        $result = [
            'roleCredentials' => [
                'accessKeyId'     => 'foo',
                'secretAccessKey' => 'assumedSecret',
                'sessionToken'    => null,
                'expiration'      => $expiration
            ],
        ];
        $sso = $this->getTestClient('SsoOidc', ['credentials' => false]);
        $this->addMockResults($sso, [
            new Result($result)
        ]);

        try {
            $token = call_user_func(TokenProvider::sso(
                'default',
                $configFilename,
                ['ssoClient' => $sso]
            ))->wait();
            $this->assertSame('token', $token->getToken());
            $this->assertSame('2500-12-25T21:30:00Z', $token->getExpiration());
            $this->assertNull($token->getRegistrationExpiresAt());

        } finally {
            unlink($dir . '/config');
            unlink($tokenLocation);
            rmdir(dirname($tokenLocation));
        }
    }

    public function testThrowsExceptionWithOnlyStartUrl()
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
            $tokenProvider = new SsoTokenProvider('test', $dir . '/config');
            $tokenProvider()->wait();
        } finally {
            unlink($dir . '/config');
        }
    }

    public function testThrowsExceptionWithOnlySsoRegion()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[profile test]
sso_session = admin
[sso-session admin]
sso_region = us-east-2
EOT;
        $configFilename = $dir . '/config';
        file_put_contents($configFilename, $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=test');

        $this->expectException(TokenException::class);
        $this->expectExceptionMessage("must contain the following keys: sso_start_url and sso_region.");
        try {
            $tokenProvider = new SsoTokenProvider('test', $dir . '/config');
            $tokenProvider()->wait();
        } finally {
            unlink($configFilename);
        }
    }

    public function testThrowsExceptionWithNonExistingSession()
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
            $tokenProvider = new SsoTokenProvider('test', $dir . '/config');
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



}