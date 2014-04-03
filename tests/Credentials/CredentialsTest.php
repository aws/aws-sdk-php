<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\Credentials;

/**
 * @covers Aws\Credentials\Credentials
 */
class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    public function testHasGetters()
    {
        $exp = time() + 500;
        $creds = new Credentials('foo', 'baz', 'tok', $exp);
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        $this->assertEquals($exp, $creds->getExpiration());
        $this->assertEquals([
            'key'     => 'foo',
            'secret'  => 'baz',
            'token'   => 'tok',
            'expires' => $exp
        ], $creds->toArray());
    }

    public function testCreatesFromArray()
    {
        $exp = time() + 500;
        $creds = Credentials::factory([
            'key'     => 'foo',
            'secret'  => 'baz',
            'token'   => 'tok',
            'expires' => $exp
        ]);
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        $this->assertEquals($exp, $creds->getExpiration());
    }

    public function testDeterminesIfExpired()
    {
        $this->assertFalse((new Credentials('foo', 'baz'))->isExpired());
        $this->assertFalse(
            (new Credentials('foo', 'baz', 'tok', time() + 100))->isExpired()
        );
        $this->assertTrue(
            (new Credentials('foo', 'baz', 'tok', time() - 1000))->isExpired()
        );
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $_SERVER[Credentials::ENV_KEY] = 'abc';
        $_SERVER[Credentials::ENV_SECRET] = '123';
        $creds = Credentials::factory();
        $this->assertEquals('abc', $creds->getAccessKeyId());
        $this->assertEquals('abc', $creds->getAccessKeyId());
    }

    public function testCreatesFromIniFile()
    {
        unset($_SERVER[Credentials::ENV_KEY],
            $_SERVER[Credentials::ENV_SECRET]);
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
        $_SERVER['HOME'] = dirname($dir);
        $creds = Credentials::factory();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        unlink($dir . '/credentials');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Invalid AWS credentials file
     */
    public function testEnsuresIniFileIsValid()
    {
        unset($_SERVER[Credentials::ENV_KEY],
        $_SERVER[Credentials::ENV_SECRET]);
        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        file_put_contents($dir . '/credentials', "wef \n=\nwef");
        $_SERVER['HOME'] = dirname($dir);
        try {
            @Credentials::fromIni();
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Credentials file not found:
     */
    public function testEnsuresIniFileExists()
    {
        unset($_SERVER[Credentials::ENV_KEY],
            $_SERVER[Credentials::ENV_SECRET]);
        $_SERVER['HOME'] = '/does/not/exist';
        Credentials::fromIni();
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Invalid AWS credentials profile foo in
     */
    public function testEnsuresProfileIsNotEmpty()
    {
        unset($_SERVER[Credentials::ENV_KEY],
        $_SERVER[Credentials::ENV_SECRET]);
        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $ini = "[default]\naws_access_key_id = foo\n"
            . "aws_secret_access_key = baz\n[foo]";
        file_put_contents($dir . '/credentials', $ini);
        $_SERVER['HOME'] = dirname($dir);
        try {
            Credentials::fromIni('foo');
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    public function testCreatesFromInstanceProfileCredentials()
    {
        unset($_SERVER['HOME']);
        $this->assertInstanceOf(
            'Aws\Credentials\InstanceProfileCredentials',
            Credentials::factory()
        );
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        unset($_SERVER['HOME']);
        $_SERVER['HOMEDRIVE'] = 'C:';
        $_SERVER['HOMEPATH'] = '\\Michael\\Home';
        $ref = new \ReflectionClass('Aws\Credentials\Credentials');
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertEquals('C:\\Michael\\Home', $meth->invoke(null));
    }
}
