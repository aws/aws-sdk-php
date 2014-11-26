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
        putenv(Credentials::ENV_KEY . '=');
        putenv(Credentials::ENV_SECRET . '=');
        putenv(Credentials::ENV_PROFILE . '=');
    }

    public function setUp()
    {
        $this->home = getenv('HOME');
        $this->homedrive = getenv('HOMEDRIVE');
        $this->homepath = getenv('HOMEPATH');
        $this->key = getenv(Credentials::ENV_KEY);
        $this->secret = getenv(Credentials::ENV_SECRET);
        $this->profile = getenv(Credentials::ENV_PROFILE);
    }

    public function tearDown()
    {
        putenv('HOME=' . $this->home);
        putenv('HOMEDRIVE=' . $this->homedrive);
        putenv('HOMEPATH=' . $this->homepath);
        putenv(Credentials::ENV_KEY . '=' . $this->key);
        putenv(Credentials::ENV_SECRET . '=' . $this->secret);
        putenv(Credentials::ENV_PROFILE . '=' . $this->profile);
    }

    /**
     * @expectedException \Aws\Common\Exception\CredentialsException
     */
    public function testEnsuresCredentialsAreFound()
    {
        Provider::fromChain([]);
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        putenv(Credentials::ENV_KEY . '=abc');
        putenv(Credentials::ENV_SECRET . '=123');
        $creds = Provider::fromChain([Provider::env()]);
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
        $creds = Provider::fromChain([Provider::ini()]);
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
            @Provider::fromChain([Provider::ini()]);
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
        Provider::fromChain([Provider::ini()]);
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
            Provider::fromChain([Provider::ini('foo')]);
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

    public function testReturnsHardcodedCreds()
    {
        $p = Provider::hardcoded('a', 'b');
        $c = $p();
        $this->assertEquals('a', $c->getAccessKeyId());
        $this->assertEquals('b', $c->getSecretKey());
    }
}
