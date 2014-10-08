<?php
namespace Aws\Test\Common\Credentials;

use Aws\Common\Credentials\Credentials;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;

/**
 * @covers Aws\Common\Credentials\Credentials
 */
class CredentialsTest extends \PHPUnit_Framework_TestCase
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
        $this->clearEnv();
        putenv(Credentials::ENV_KEY . '=abc');
        putenv(Credentials::ENV_SECRET . '=123');
        $creds = Credentials::factory();
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
        $creds = Credentials::factory();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        unlink($dir . '/credentials');
    }

    /**
     * @expectedException \RuntimeException
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
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        Credentials::fromIni();
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Invalid AWS credentials profile "foo" in
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
            Credentials::fromIni('foo');
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Unexpected instance profile response code:
     */
    public function testCreatesFromInstanceProfileCredentials()
    {
        $this->clearEnv();
        putenv('HOME=');
        $client = new Client();
        $client->getEmitter()->attach(new Mock([
            new Response(200, [], Stream::factory(''))
        ]));
        $this->assertInstanceOf(
            'Aws\Common\Credentials\InstanceProfileCredentials',
            Credentials::factory(['profile' => 'foo', 'client' => $client])
        );
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\Michael\\Home');
        $ref = new \ReflectionClass('Aws\Common\Credentials\Credentials');
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertEquals('C:\\Michael\\Home', $meth->invoke(null));
    }
}
