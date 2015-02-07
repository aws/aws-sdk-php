<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\CredentialsProvider;
use Aws\Credentials\Credentials;

/**
 * @covers \Aws\Credentials\CredentialsProvider
 */
class CredentialsProviderTest extends \PHPUnit_Framework_TestCase
{
    private $home, $homedrive, $homepath, $key, $secret, $profile;

    private function clearEnv()
    {
        putenv(CredentialsProvider::ENV_KEY . '=');
        putenv(CredentialsProvider::ENV_SECRET . '=');
        putenv(CredentialsProvider::ENV_PROFILE . '=');
    }

    public function setUp()
    {
        $this->home = getenv('HOME');
        $this->homedrive = getenv('HOMEDRIVE');
        $this->homepath = getenv('HOMEPATH');
        $this->key = getenv(CredentialsProvider::ENV_KEY);
        $this->secret = getenv(CredentialsProvider::ENV_SECRET);
        $this->profile = getenv(CredentialsProvider::ENV_PROFILE);
    }

    public function tearDown()
    {
        putenv('HOME=' . $this->home);
        putenv('HOMEDRIVE=' . $this->homedrive);
        putenv('HOMEPATH=' . $this->homepath);
        putenv(CredentialsProvider::ENV_KEY . '=' . $this->key);
        putenv(CredentialsProvider::ENV_SECRET . '=' . $this->secret);
        putenv(CredentialsProvider::ENV_PROFILE . '=' . $this->profile);
    }

    /**
     * @expectedException \Aws\Exception\UnresolvedCredentialsException
     */
    public function testEnsuresCredentialsAreFound()
    {
        CredentialsProvider::resolve(function () {});
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        putenv(CredentialsProvider::ENV_KEY . '=abc');
        putenv(CredentialsProvider::ENV_SECRET . '=123');
        $creds = CredentialsProvider::resolve(CredentialsProvider::env());
        $this->assertEquals('abc', $creds->getAccessKeyId());
        $this->assertEquals('abc', $creds->getAccessKeyId());
    }

    public function testCreatesFromIniFile()
    {
        $this->clearEnv();

        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = baz
aws_security_token = tok
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));
        $creds = CredentialsProvider::resolve(CredentialsProvider::ini());
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        unlink($dir . '/credentials');
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Invalid credentials file:
     */
    public function testEnsuresIniFileIsValid()
    {
        $this->clearEnv();
        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        file_put_contents($dir . '/credentials', "wef \n=\nwef");
        putenv('HOME=' . dirname($dir));

        try {
            @CredentialsProvider::resolve(CredentialsProvider::ini());
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     */
    public function testEnsuresIniFileExists()
    {
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        CredentialsProvider::resolve(CredentialsProvider::ini());
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     */
    public function testEnsuresProfileIsNotEmpty()
    {
        $this->clearEnv();
        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $ini = "[default]\naws_access_key_id = foo\n"
            . "aws_secret_access_key = baz\n[foo]";
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            CredentialsProvider::resolve(CredentialsProvider::ini('foo'));
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    public function testCreatesFromInstanceProfileProvider()
    {
        $p = CredentialsProvider::instanceProfile();
        $this->assertInstanceOf('Aws\Credentials\InstanceProfileProvider', $p);
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\Michael\\Home');
        $ref = new \ReflectionClass('Aws\Credentials\CredentialsProvider');
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertEquals('C:\\Michael\\Home', $meth->invoke(null));
    }

    public function testMemoizes()
    {
        $called = 0;
        $creds = new Credentials('foo', 'bar');
        $f = function () use (&$called, $creds) {
            $called++;
            return $creds;
        };
        $p = CredentialsProvider::memoize($f);
        $this->assertSame($creds, $p());
        $this->assertEquals(1, $called);
        $this->assertSame($creds, $p());
        $this->assertEquals(1, $called);
    }

    public function testCallsDefaultsCreds()
    {
        $k = getenv(CredentialsProvider::ENV_KEY);
        $s = getenv(CredentialsProvider::ENV_SECRET);
        putenv(CredentialsProvider::ENV_KEY . '=abc');
        putenv(CredentialsProvider::ENV_SECRET . '=123');
        $provider = CredentialsProvider::defaultProvider();
        $creds = $provider();
        putenv(CredentialsProvider::ENV_KEY . "={$k}");
        putenv(CredentialsProvider::ENV_SECRET . "={$s}");
        $this->assertEquals('abc', $creds->getAccessKeyId());
        $this->assertEquals('123', $creds->getSecretKey());
    }
}
