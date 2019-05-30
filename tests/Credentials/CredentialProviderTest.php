<?php
namespace Aws\Test\Credentials;

use Aws\Api\DateTimeResult;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\History;
use Aws\LruArrayCache;
use Aws\Middleware;
use Aws\Result;
use Aws\Sts\StsClient;
use GuzzleHttp\Promise;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;


/**
 * @covers \Aws\Credentials\CredentialProvider
 */
class CredentialProviderTest extends TestCase
{
    private $home, $homedrive, $homepath, $key, $secret, $profile;

    use UsesServiceTrait;

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
        $this->assertCount(1, $cache);
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
        $this->assertNull($creds->getSecurityToken());
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
        $credentialsWithEquals = new Credentials('foo', 'bar', 'baz=');
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
        $standardWithEqualsIni = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_session_token = baz=
EOT;
        $standardWithEqualsQuotedIni = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_session_token = "baz="
EOT;

        return [
            [$standardIni, $credentials],
            [$oldIni, $credentials],
            [$mixedIni, $credentials],
            [$standardWithEqualsIni, $credentialsWithEquals],
            [$standardWithEqualsQuotedIni, $credentialsWithEquals],
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

    public function testCreatesFromProcessCredentialProvider()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[foo]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        $creds = call_user_func(CredentialProvider::process('foo'))->wait();
        unlink($dir . '/credentials');
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesFromProcessCredentialWithFilename()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[baz]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($dir . '/mycreds', $ini);
        putenv('HOME=' . dirname($dir));

        $creds = call_user_func(CredentialProvider::process('baz', $dir . '/mycreds'))->wait();
        unlink($dir . '/mycreds');
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesTemporaryFromProcessCredential()
    {
        $dir = $this->clearEnv();
        $expiration = new DateTimeResult("+1 hour");
        $ini = <<<EOT
[foo]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "SessionToken": "baz", "Expiration":"$expiration", "Version":1}'
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        $creds = call_user_func(CredentialProvider::process('foo'))->wait();
        unlink($dir . '/credentials');
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
        $this->assertEquals('baz', $creds->getSecurityToken());
        $this->assertEquals($expiration, $creds->getExpiration());
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage No credential_process present in INI profile
     */
    public function testEnsuresProcessCredentialIsPresent()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = baz
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            $creds = call_user_func(CredentialProvider::process())->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage credential_process does not return Version == 1
     */
    public function testEnsuresProcessCredentialVersion()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":2}'
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            $creds = call_user_func(CredentialProvider::process())->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage credential_process returned expired credentials
     */
    public function testEnsuresProcessCredentialsAreCurrent()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "SessionToken":"baz","Version":1, "Expiration":"1970-01-01T00:00:00.000Z"}'
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            $creds = call_user_func(CredentialProvider::process())->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage credential_process returned invalid expiration
     */
    public function testEnsuresProcessCredentialsExpirationIsValid()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "SessionToken":"baz","Version":1, "Expiration":"invalid_date_format"}'
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            $creds = call_user_func(CredentialProvider::process())->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
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

    public function testCreatesFromRoleArn()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = defaultSecret
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
role_session_name = foobar
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken'    => null,
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];

        $sts = $this->getTestClient('Sts');
        $this->addMockResults($sts, [
            new Result($result)
        ]);

        $history = new History();
        $sts->getHandlerList()->appendSign(\Aws\Middleware::history($history));

        try {
            $config = [
                'stsClient' => $sts
            ];
            $creds = call_user_func(CredentialProvider::ini(
                'assume',
                null,
                $config
            ))->wait();

            $body = (string) $history->getLastRequest()->getBody();
            $this->assertContains('RoleSessionName=foobar', $body);
            $this->assertEquals('foo', $creds->getAccessKeyId());
            $this->assertEquals('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertInternalType('int', $creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testSetsRoleSessionNameToDefault()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = defaultSecret
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken'    => null,
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];

        $sts = $this->getTestClient('Sts');
        $this->addMockResults($sts, [
            new Result($result)
        ]);

        $history = new History();
        $sts->getHandlerList()->appendSign(\Aws\Middleware::history($history));

        try {
            $config = [
                'stsClient' => $sts
            ];
            $creds = call_user_func(CredentialProvider::ini(
                'assume',
                null,
                $config
            ))->wait();

            $last = $history->getLastRequest();
            $body = (string) $history->getLastRequest()->getBody();
            $this->assertRegExp('/RoleSessionName=aws-sdk-php-\d{13}/', $body);
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Role assumption profiles are disabled. Failed to load profile assume
     */
    public function testEnsuresAssumeRoleCanBeDisabled()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = baz
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=assume');

        try {
            $config = [
                'preferStaticCredentials' => false,
                'disableAssumeRole' => true
            ];
            $creds = call_user_func(CredentialProvider::ini(
                "assume",
                null,
                $config
            ))->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage source_profile is not set using profile assume
     */
    public function testEnsuresSourceProfileIsSpecified()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = baz
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=assume');

        try {
            $creds = call_user_func(CredentialProvider::ini())->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage source_profile default using profile assume does not exist
     */
    public function testEnsuresSourceProfileConfigIsSpecified()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=assume');

        try {
            $creds = call_user_func(CredentialProvider::ini())->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage No credentials present in INI profile 'default'
     */
    public function testEnsuresSourceProfileHasCredentials()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=assume');

        try {
            $creds = call_user_func(CredentialProvider::ini())->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testPreferRoleArnToStaticCredentialsInBaseProfile()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = baz
[assume]
aws_access_key_id = foo
aws_secret_access_key = staticSecret
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken'    => null,
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];

        $sts = $this->getTestClient('Sts');
        $this->addMockResults($sts, [
            new Result($result)
        ]);

        try {
            $config = [
                'stsClient' => $sts
            ];
            $creds = call_user_func(CredentialProvider::ini(
                'assume',
                null,
                $config
            ))->wait();
            $this->assertEquals('foo', $creds->getAccessKeyId());
            $this->assertEquals('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertInternalType('int', $creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
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
            return Promise\promise_for($creds);
        };
        $p = CredentialProvider::memoize($f);
        $this->assertSame($creds, $p()->wait());
        $this->assertEquals(1, $called);
        $this->assertSame($creds, $p()->wait());
        $this->assertEquals(1, $called);
    }

    public function testMemoizesCleansUpOnError()
    {
        $called = 0;
        $f = function () use (&$called) {
            $called++;
            return Promise\rejection_for('Error');
        };
        $p = CredentialProvider::memoize($f);
        $p()->wait(false);
        $p()->wait(false);
        $this->assertEquals(2, $called);
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

    public function testProcessCredentialDefaultChain()
    {
        $dir = $this->clearEnv();
        $credentialsIni = <<<EOT
[default]
credential_process = echo '{"AccessKeyId":"credentialsFoo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($dir . '/credentials', $credentialsIni);
        putenv('HOME=' . dirname($dir));
        $provider = CredentialProvider::defaultProvider();
        $creds = $provider()->wait();
        unlink($dir . '/credentials');
        $this->assertEquals('credentialsFoo', $creds->getAccessKeyId());
    }

    public function testProcessCredentialConfigDefaultChain()
    {
        $dir = $this->clearEnv();
        $configIni = <<<EOT
[profile default]
credential_process = echo '{"AccessKeyId":"configFoo","SecretAccessKey":"baz", "Version":1}'
EOT;

        file_put_contents($dir . '/config', $configIni);
        putenv('HOME=' . dirname($dir));
        $provider = CredentialProvider::defaultProvider();
        $creds = $provider()->wait();
        unlink($dir . '/config');
        $this->assertEquals('configFoo', $creds->getAccessKeyId());
    }
}
