<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\LruArrayCache;
use Aws\Sts\StsClient;
use GuzzleHttp\Promise;
/**
 * @covers \Aws\Credentials\CredentialProvider
 */
class CredentialProviderTest extends \PHPUnit_Framework_TestCase
{
    private $home, $homedrive, $homepath, $key, $secret, $profile;

    private function clearEnv()
    {
        putenv(CredentialProvider::ENV_KEY . '=');
        putenv(CredentialProvider::ENV_SECRET . '=');
        putenv(CredentialProvider::ENV_PROFILE . '=');
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI');

        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    public function setUp()
    {
        $this->home = getenv('HOME');
        $this->homedrive = getenv('HOMEDRIVE');
        $this->homepath = getenv('HOMEPATH');
        $this->key = getenv(CredentialProvider::ENV_KEY);
        $this->secret = getenv(CredentialProvider::ENV_SECRET);
        $this->profile = getenv(CredentialProvider::ENV_PROFILE);
    }

    public function tearDown()
    {
        putenv('HOME=' . $this->home);
        putenv('HOMEDRIVE=' . $this->homedrive);
        putenv('HOMEPATH=' . $this->homepath);
        putenv(CredentialProvider::ENV_KEY . '=' . $this->key);
        putenv(CredentialProvider::ENV_SECRET . '=' . $this->secret);
        putenv(CredentialProvider::ENV_PROFILE . '=' . $this->profile);
    }

    public function testCreatesFromCache()
    {
        $cache = new LruArrayCache;
        $key = __CLASS__ . 'credentialsCache';
        $saved = new Credentials('foo', 'bar', 'baz', PHP_INT_MAX);
        $cache->set($key, $saved, $saved->getExpiration() - time());

        $explodingProvider = function () {
            throw new \BadFunctionCallException('This should never be called');
        };

        $found = call_user_func(
            CredentialProvider::cache($explodingProvider, $cache, $key)
        )
            ->wait();

        $this->assertEquals($saved->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertEquals($saved->getSecretKey(), $found->getSecretKey());
        $this->assertEquals($saved->getSecurityToken(), $found->getSecurityToken());
        $this->assertEquals($saved->getExpiration(), $found->getExpiration());
    }

    public function testRefreshesCacheWhenCredsExpired()
    {
        $cache = new LruArrayCache;
        $key = __CLASS__ . 'credentialsCache';
        $saved = new Credentials('foo', 'bar', 'baz', time() - 1);
        $cache->set($key, $saved);

        $timesCalled = 0;
        $recordKeepingProvider = function () use (&$timesCalled) {
            ++$timesCalled;
            return Promise\promise_for(new Credentials('foo', 'bar', 'baz', PHP_INT_MAX));
        };

        call_user_func(
            CredentialProvider::cache($recordKeepingProvider, $cache, $key)
        )
            ->wait();

        $this->assertEquals(1, $timesCalled);
    }

    public function testPersistsToCache()
    {
        $cache = new LruArrayCache;
        $key = __CLASS__ . 'credentialsCache';
        $creds = new Credentials('foo', 'bar', 'baz', PHP_INT_MAX);

        $timesCalled = 0;
        $volatileProvider = function () use ($creds, &$timesCalled) {
            if (0 === $timesCalled) {
                ++$timesCalled;

                return Promise\promise_for($creds);
            }

            throw new \BadFunctionCallException('I was called too many times!');
        };

        for ($i = 0; $i < 10; $i++) {
            $found = call_user_func(
                CredentialProvider::cache($volatileProvider, $cache, $key)
            )
                ->wait();
        }

        $this->assertEquals(1, $timesCalled);
        $this->assertEquals(1, count($cache));
        $this->assertEquals($creds->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertEquals($creds->getSecretKey(), $found->getSecretKey());
        $this->assertEquals($creds->getSecurityToken(), $found->getSecurityToken());
        $this->assertEquals($creds->getExpiration(), $found->getExpiration());
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SECRET . '=123');
        putenv(CredentialProvider::ENV_SESSION . '=456');
        $creds = call_user_func(CredentialProvider::env())->wait();
        $this->assertEquals('abc', $creds->getAccessKeyId());
        $this->assertEquals('123', $creds->getSecretKey());
        $this->assertEquals('456', $creds->getSecurityToken());
    }

    public function testCreatesFromEnvironmentVariablesNullToken()
    {
        $this->clearEnv();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SECRET . '=123');
        putenv(CredentialProvider::ENV_SESSION . '');
        $creds = call_user_func(CredentialProvider::env())->wait();
        $this->assertEquals('abc', $creds->getAccessKeyId());
        $this->assertEquals('123', $creds->getSecretKey());
        $this->assertEquals(NULL, $creds->getSecurityToken());
    }

    /**
     * @dataProvider iniFileProvider
     *
     * @param string $iniFile
     * @param Credentials $expectedCreds
     */
    public function testCreatesFromIniFile($iniFile, Credentials $expectedCreds)
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/credentials', $iniFile);
        putenv('HOME=' . dirname($dir));
        $creds = call_user_func(CredentialProvider::ini('default'))
            ->wait();
        $this->assertEquals($expectedCreds->toArray(), $creds->toArray());
        unlink($dir . '/credentials');
    }

    public function iniFileProvider()
    {
        $credentials = new Credentials('foo', 'bar', 'baz');
        $standardIni = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_session_token = baz
EOT;
        $oldIni = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_security_token = baz
EOT;
        $mixedIni = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_session_token = baz
aws_security_token = fizz
EOT;

        return [
            [$standardIni, $credentials],
            [$oldIni, $credentials],
            [$mixedIni, $credentials],
        ];
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Invalid credentials file:
     */
    public function testEnsuresIniFileIsValid()
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/credentials', "wef \n=\nwef");
        putenv('HOME=' . dirname($dir));

        try {
            @call_user_func(CredentialProvider::ini())->wait();
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
        call_user_func(CredentialProvider::ini())->wait();
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     */
    public function testEnsuresProfileIsNotEmpty()
    {
        $dir = $this->clearEnv();
        $ini = "[default]\naws_access_key_id = foo\n"
            . "aws_secret_access_key = baz\n[foo]";
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(CredentialProvider::ini('foo'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage 'foo' not found in
     */
    public function testEnsuresFileIsNotEmpty()
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/credentials', '');
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(CredentialProvider::ini('foo'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/credentials');
            throw $e;
        }
    }

    public function testCreatesFromInstanceProfileProvider()
    {
        $p = CredentialProvider::instanceProfile();
        $this->assertInstanceOf('Aws\Credentials\InstanceProfileProvider', $p);
    }

    public function testCreatesFromEcsCredentialProvider()
    {
        $p = CredentialProvider::ecsCredentials();
        $this->assertInstanceOf('Aws\Credentials\EcsCredentialProvider', $p);
    }

    public function testCreatesFromAssumeRoleCredentialProvider()
    {
        $config = [
            'client' => new StsClient(['region' => 'foo', 'version' => 'latest']),
            'assume_role_params' => [ 'foo' => 'bar' ]
        ];
        $p = CredentialProvider::assumeRole($config);
        $this->assertInstanceOf('Aws\Credentials\AssumeRoleCredentialProvider', $p);
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\Michael\\Home');
        $ref = new \ReflectionClass('Aws\Credentials\CredentialProvider');
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
            return \GuzzleHttp\Promise\promise_for($creds);
        };
        $p = CredentialProvider::memoize($f);
        $this->assertSame($creds, $p()->wait());
        $this->assertEquals(1, $called);
        $this->assertSame($creds, $p()->wait());
        $this->assertEquals(1, $called);
    }

    public function testCallsDefaultsCreds()
    {
        $k = getenv(CredentialProvider::ENV_KEY);
        $s = getenv(CredentialProvider::ENV_SECRET);
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SECRET . '=123');
        $provider = CredentialProvider::defaultProvider();
        $creds = $provider()->wait();
        putenv(CredentialProvider::ENV_KEY . "={$k}");
        putenv(CredentialProvider::ENV_SECRET . "={$s}");
        $this->assertEquals('abc', $creds->getAccessKeyId());
        $this->assertEquals('123', $creds->getSecretKey());
    }

    public function testCachesAsPartOfDefaultChain()
    {
        $instanceCredential = new Credentials('instance_foo', 'instance_bar', 'instance_baz', PHP_INT_MAX);
        $ecsCredential = new Credentials('ecs_foo', 'ecs_bar', 'ecs_baz', PHP_INT_MAX);

        $cache = new LruArrayCache;
        $cache->set('aws_cached_instance_credentials', $instanceCredential);
        $cache->set('aws_cached_ecs_credentials', $ecsCredential);

        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        $credentials = call_user_func(CredentialProvider::defaultProvider([
            'credentials' => $cache,
        ]))
            ->wait();
        $this->assertEquals($instanceCredential->getAccessKeyId(), $credentials->getAccessKeyId());
        $this->assertEquals($instanceCredential->getSecretKey(), $credentials->getSecretKey());

        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/latest');
        $credentials = call_user_func(CredentialProvider::defaultProvider([
            'credentials' => $cache,
        ]))
            ->wait();
        $this->assertEquals($ecsCredential->getAccessKeyId(), $credentials->getAccessKeyId());
        $this->assertEquals($ecsCredential->getSecretKey(), $credentials->getSecretKey());
    }

    public function testChainsCredentials()
    {
        $dir = $this->clearEnv();
        $ini = "[default]\naws_access_key_id = foo\n"
            . "aws_secret_access_key = baz\n[foo]";
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));
        $a = CredentialProvider::ini('foo');
        $b = CredentialProvider::ini();
        $c = function () { $this->fail('Should not have called'); };
        $provider = CredentialProvider::chain($a, $b, $c);
        $creds = $provider()->wait();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
    }
}
