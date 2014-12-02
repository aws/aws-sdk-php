<?php
namespace Aws\Test\Common\Credentials;

use Aws\Common\Credentials\Provider;
use Aws\Common\Credentials\Credentials;

/**
 * @covers \Aws\Common\Credentials\Provider
 */
class ProviderTest extends \PHPUnit_Framework_TestCase
{
    private $home, $homedrive, $homepath, $key, $secret, $profile;

    private function clearEnv()
    {
        putenv(Provider::ENV_KEY . '=');
        putenv(Provider::ENV_SECRET . '=');
        putenv(Provider::ENV_PROFILE . '=');
    }

    public function setUp()
    {
        $this->home = getenv('HOME');
        $this->homedrive = getenv('HOMEDRIVE');
        $this->homepath = getenv('HOMEPATH');
        $this->key = getenv(Provider::ENV_KEY);
        $this->secret = getenv(Provider::ENV_SECRET);
        $this->profile = getenv(Provider::ENV_PROFILE);
    }

    public function tearDown()
    {
        putenv('HOME=' . $this->home);
        putenv('HOMEDRIVE=' . $this->homedrive);
        putenv('HOMEPATH=' . $this->homepath);
        putenv(Provider::ENV_KEY . '=' . $this->key);
        putenv(Provider::ENV_SECRET . '=' . $this->secret);
        putenv(Provider::ENV_PROFILE . '=' . $this->profile);
    }

    /**
     * @expectedException \Aws\Common\Exception\CredentialsException
     */
    public function testEnsuresCredentialsAreFound()
    {
        Provider::resolve(function () {});
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        putenv(Provider::ENV_KEY . '=abc');
        putenv(Provider::ENV_SECRET . '=123');
        $creds = Provider::resolve(Provider::env());
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
        $creds = Provider::resolve(Provider::ini());
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        unlink($dir . '/credentials');
    }

    /**
     * @expectedException \Aws\Common\Exception\CredentialsException
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
            @Provider::resolve(Provider::ini());
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    /**
     * @expectedException \Aws\Common\Exception\CredentialsException
     */
    public function testEnsuresIniFileExists()
    {
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        Provider::resolve(Provider::ini());
    }

    /**
     * @expectedException \Aws\Common\Exception\CredentialsException
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
            Provider::resolve(Provider::ini('foo'));
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    public function testCreatesFromInstanceProfileProvider()
    {
        $p = Provider::instanceProfile();
        $this->assertInstanceOf('Aws\Common\Credentials\InstanceProfileProvider', $p);
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\Michael\\Home');
        $ref = new \ReflectionClass('Aws\Common\Credentials\Provider');
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
        $p = Provider::memoize($f);
        $this->assertSame($creds, $p());
        $this->assertEquals(1, $called);
        $this->assertSame($creds, $p());
        $this->assertEquals(1, $called);
    }

    public function testProvidesChains()
    {
        $ar = [];
        $creds = new Credentials('a', 'b');
        $a = function () use (&$ar) { $ar[] = 'a'; };
        $b = function () use (&$ar) { $ar[] = 'b'; };
        $c = function () use (&$ar) { $ar[] = 'c'; };
        $d = function () use ($creds) { return $creds; };
        $chain = Provider::chain($a, $b, $c, $d);
        $result = $chain();
        $this->assertSame($result, $creds);
        $this->assertEquals(['a', 'b', 'c'], $ar);
    }

    public function testCallsDefaultsCreds()
    {
        $k = getenv(Provider::ENV_KEY);
        $s = getenv(Provider::ENV_SECRET);
        putenv(Provider::ENV_KEY . '=abc');
        putenv(Provider::ENV_SECRET . '=123');
        $provider = Provider::defaultProvider();
        $creds = $provider();
        putenv(Provider::ENV_KEY . "={$k}");
        putenv(Provider::ENV_SECRET . "={$s}");
        $this->assertEquals('abc', $creds->getAccessKeyId());
        $this->assertEquals('123', $creds->getSecretKey());
    }
}
