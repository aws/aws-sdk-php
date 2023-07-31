<?php
namespace Aws\Test\Credentials;

use Aws\Api\DateTimeResult;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Credentials\EcsCredentialProvider;
use Aws\Credentials\InstanceProfileProvider;
use Aws\History;
use Aws\LruArrayCache;
use Aws\Result;
use Aws\Token\SsoTokenProvider;
use GuzzleHttp\Promise;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;


/**
 * @covers Aws\Credentials\CredentialProvider
 */
class CredentialProviderTest extends TestCase
{
    private $home, $homedrive, $homepath, $key, $secret, $profile;

    private static $standardIni = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_session_token = baz
EOT;

    use UsesServiceTrait;

    private function clearEnv()
    {
        putenv(CredentialProvider::ENV_KEY . '=');
        putenv(CredentialProvider::ENV_SECRET . '=');
        putenv(CredentialProvider::ENV_PROFILE . '=');
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI');
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI');
        putenv('AWS_CONTAINER_AUTHORIZATION_TOKEN');
        putenv('AWS_SDK_LOAD_NONDEFAULT_CONFIG');
        putenv('AWS_WEB_IDENTITY_TOKEN_FILE');
        putenv('AWS_ROLE_ARN');
        putenv('AWS_ROLE_SESSION_NAME');
        putenv('AWS_SHARED_CREDENTIALS_FILE');

        unset($_SERVER[CredentialProvider::ENV_KEY]);
        unset($_SERVER[CredentialProvider::ENV_SECRET]);
        unset($_SERVER[CredentialProvider::ENV_PROFILE]);
        unset($_SERVER['AWS_CONTAINER_CREDENTIALS_RELATIVE_URI']);
        unset($_SERVER['AWS_CONTAINER_CREDENTIALS_FULL_URI']);
        unset($_SERVER['AWS_CONTAINER_AUTHORIZATION_TOKEN']);
        unset($_SERVER['AWS_SDK_LOAD_NONDEFAULT_CONFIG']);
        unset($_SERVER['AWS_WEB_IDENTITY_TOKEN_FILE']);
        unset($_SERVER['AWS_ROLE_ARN']);
        unset($_SERVER['AWS_ROLE_SESSION_NAME']);
        unset($_SERVER['AWS_SHARED_CREDENTIALS_FILE']);

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
        $this->key = getenv(CredentialProvider::ENV_KEY);
        $this->secret = getenv(CredentialProvider::ENV_SECRET);
        $this->profile = getenv(CredentialProvider::ENV_PROFILE);
    }

    public function tear_down()
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

        $this->assertSame($saved->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertSame($saved->getSecretKey(), $found->getSecretKey());
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
            return Promise\Create::promiseFor(new Credentials('foo', 'bar', 'baz', PHP_INT_MAX));
        };

        call_user_func(
            CredentialProvider::cache($recordKeepingProvider, $cache, $key)
        )
            ->wait();

        $this->assertSame(1, $timesCalled);
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

                return Promise\Create::promiseFor($creds);
            }

            throw new \BadFunctionCallException('I was called too many times!');
        };

        for ($i = 0; $i < 10; $i++) {
            $found = call_user_func(
                CredentialProvider::cache($volatileProvider, $cache, $key)
            )
                ->wait();
        }

        $this->assertSame(1, $timesCalled);
        $this->assertCount(1, $cache);
        $this->assertSame($creds->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertSame($creds->getSecretKey(), $found->getSecretKey());
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
        $this->assertSame('abc', $creds->getAccessKeyId());
        $this->assertSame('123', $creds->getSecretKey());
        $this->assertSame('456', $creds->getSecurityToken());
    }

    public function testCreatesFromEnvironmentVariablesNullToken()
    {
        $this->clearEnv();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SECRET . '=123');
        putenv(CredentialProvider::ENV_SESSION . '');
        $creds = call_user_func(CredentialProvider::env())->wait();
        $this->assertSame('abc', $creds->getAccessKeyId());
        $this->assertSame('123', $creds->getSecretKey());
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

    public function testUsesIniWithUseAwsConfigFileTrue()
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/credentials', self::$standardIni);
        $expectedCreds = [
            "key" => "foo",
            "secret" => "bar",
            "token" => "baz",
            "expires" => null
        ];
        putenv('HOME=' . dirname($dir));
        $creds = call_user_func(
            CredentialProvider::defaultProvider(['use_aws_shared_config_files' => true])
        )->wait();
        $this->assertEquals($expectedCreds, $creds->toArray());
        unlink($dir . '/credentials');
    }

    public function testIgnoresIniWithUseAwsConfigFileFalse()
    {
        $this->expectExceptionMessage("Error retrieving credentials from the instance profile metadata service");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        file_put_contents($dir . '/credentials', self::$standardIni);
        $expectedCreds = [
            "key" => "foo",
            "secret" => "bar",
            "token" => null,
            "expires" => null,
        ];

        putenv('HOME=' . dirname($dir));
        $creds = call_user_func(
            CredentialProvider::defaultProvider(['use_aws_shared_config_files' => false])
        )->wait();
        $this->assertEquals($expectedCreds, $creds->toArray());
        unlink($dir . '/credentials');
    }

    public function testEnsuresIniFileIsValid()
    {
        $this->expectExceptionMessage("Invalid credentials file:");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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

    public function testEnsuresIniFileExists()
    {
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        call_user_func(CredentialProvider::ini())->wait();
    }

    public function testEnsuresProfileIsNotEmpty()
    {
        $this->expectException(\Aws\Exception\CredentialsException::class);
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

    public function testEnsuresFileIsNotEmpty()
    {
        $this->expectExceptionMessage("'foo' not found in");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('bar', $creds->getSecretKey());
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
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('bar', $creds->getSecretKey());
    }

    public function testCreatesFromProcessCredentialWithFilenameParameterOverSharedFilename()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[baz]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($dir . '/mycreds', $ini);
        putenv('HOME=' . dirname($dir));
        putenv("AWS_SHARED_CREDENTIALS_FILE={$dir}/badfilename");

        $creds = call_user_func(
            CredentialProvider::process('baz', $dir . '/mycreds')
        )->wait();
        unlink($dir . '/mycreds');
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesFromProcessCredentialWithSharedFilename()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[baz]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($dir . '/mycreds', $ini);
        putenv('HOME=' . dirname($dir));
        putenv("AWS_SHARED_CREDENTIALS_FILE={$dir}/mycreds");

        $creds = call_user_func(
            CredentialProvider::process('baz')
        )->wait();
        unlink($dir . '/mycreds');
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesFromIniCredentialWithSharedFilename()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[baz]
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
EOT;
        file_put_contents($dir . '/mycreds', $ini);
        putenv('HOME=' . dirname($dir));
        putenv("AWS_SHARED_CREDENTIALS_FILE={$dir}/mycreds");

        $creds = call_user_func(
            CredentialProvider::ini('default')
        )->wait();
        unlink($dir . '/mycreds');
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesFromIniCredentialWithDefaultProvider()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[baz]
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
EOT;
        file_put_contents($dir . '/mycreds', $ini);
        putenv('HOME=' . dirname($dir));
        putenv("AWS_SHARED_CREDENTIALS_FILE={$dir}/mycreds");

        $creds = call_user_func(
            CredentialProvider::defaultProvider([])
        )->wait();
        unlink($dir . '/mycreds');
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesTemporaryFromProcessCredential()
    {
        $dir = $this->clearEnv();
        $expiration = new DateTimeResult("+1 hour");
        $expires = $expiration->getTimestamp();
        $ini = <<<EOT
[foo]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "SessionToken": "baz", "Expiration":"$expiration", "Version":1}'
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        $creds = call_user_func(CredentialProvider::process('foo'))->wait();
        unlink($dir . '/credentials');
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('bar', $creds->getSecretKey());
        $this->assertSame('baz', $creds->getSecurityToken());
        $this->assertSame($expires, $creds->getExpiration());
    }

    public function testEnsuresProcessCredentialIsPresent()
    {
        $this->expectExceptionMessage("No credential_process present in INI profile");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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

    public function testEnsuresProcessCredentialVersion()
    {
        $this->expectExceptionMessage("credential_process does not return Version == 1");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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

    public function testEnsuresProcessCredentialsAreCurrent()
    {
        $this->expectExceptionMessage("credential_process returned expired credentials");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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

    public function testEnsuresProcessCredentialsExpirationIsValid()
    {
        $this->expectExceptionMessage("credential_process returned invalid expiration");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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
        $this->assertInstanceOf(InstanceProfileProvider::class, $p);
    }

    public function testCreatesFromEcsCredentialProvider()
    {
        $p = CredentialProvider::ecsCredentials();
        $this->assertInstanceOf(EcsCredentialProvider::class, $p);
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
            $this->assertStringContainsString('RoleSessionName=foobar', $body);
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testCreatesFromRoleArnCatchesCircular()
    {
        $this->expectExceptionMessage("Circular source_profile reference found.");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $ini = <<<EOT
[assume1]
role_arn = arn:aws:iam::012345678910:role/role_name1
source_profile = assume2
role_session_name = foobar1
[assume2]
role_arn = arn:aws:iam::012345678910:role/role_name2
source_profile = assume1
role_session_name = foobar2
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(CredentialProvider::ini(
                'assume2',
                null,
                []
            ))->wait();
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
            $this->assertMatchesRegularExpression('/RoleSessionName=aws-sdk-php-\d{13}/', $body);
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testEnsuresAssumeRoleCanBeDisabled()
    {
        $this->expectExceptionMessage("Role assumption profiles are disabled. Failed to load profile assume");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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

    public function testEnsuresSourceProfileIsSpecified()
    {
        $this->expectExceptionMessage("Either source_profile or credential_source must be set using profile assume, but not both");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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

    public function testAssumeRoleInConfigFromCredentialSourceNoRoleArn()
    {
        $this->expectExceptionMessage("A role_arn must be provided with credential_source in");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SESSION . '');

        $credentials = <<<EOT
[assume]
credential_source = Environment
role_arn = 
EOT;
        file_put_contents($dir . '/credentials', $credentials);
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(CredentialProvider::ini(
                'assume',
                $dir . '/credentials',
                []
            ))->wait();
        }  finally {
            unlink($dir . '/credentials');
        }
    }

    public function testAssumeRoleInConfigFromFailingCredentialsSource()
    {
        $this->expectExceptionMessage("Could not find environment variable credentials in AWS_ACCESS_KEY_ID/AWS_SECRET_ACCESS_KEY");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SESSION . '');

        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = Environment
EOT;
        file_put_contents($dir . '/credentials', $credentials);
        putenv('HOME=' . dirname($dir));

        try {
            $result = CredentialProvider::getCredentialsFromSource(
                'assume',
                $dir . '/credentials',
                []
            );
            self::assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
            $result->wait();
        } catch (\Exception $exception) {
            throw $exception;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testAssumeRoleInConfigFromCredentialsSourceEnvironment()
    {
        $dir = $this->clearEnv();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SECRET . '=123');
        putenv(CredentialProvider::ENV_SESSION . '');

        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = Environment
EOT;
        file_put_contents($dir . '/credentials', $credentials);
        putenv('HOME=' . dirname($dir));

        try {
            $creds = call_user_func(CredentialProvider::getCredentialsFromSource(
                'assume',
                $dir . '/credentials',
                []
            ))->wait();
            $this->assertSame('abc', $creds->getAccessKeyId());
            $this->assertSame('123', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testAssumeRoleInConfigFromCredentialsSourceEc2InstanceMetadata()
    {
        $this->expectExceptionMessage("Error retrieving credentials from the instance profile metadata service");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();

        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = Ec2InstanceMetadata
EOT;
        file_put_contents($dir . '/credentials', $credentials);
        putenv('HOME=' . dirname($dir));

        try {
            $result = CredentialProvider::getCredentialsFromSource(
                'assume',
                $dir . '/credentials',
                []
            );
            self::assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
            $result->wait();
        } catch (\Exception $exception) {
            throw $exception;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testAssumeRoleInConfigFromCredentialsSourceEcsContainer()
    {
        $this->expectExceptionMessage("Error retrieving credential from ECS");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();

        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = EcsContainer
EOT;
        file_put_contents($dir . '/credentials', $credentials);
        putenv('HOME=' . dirname($dir));

        try {
            $result = CredentialProvider::getCredentialsFromSource(
                'assume',
                $dir . '/credentials',
                []
            );
            self::assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
            $result->wait();
        } catch (\Exception $exception) {
            throw $exception;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testAssumeRoleInConfigFromInvalidCredentialsSource()
    {
        $this->expectExceptionMessage("Invalid credential_source found in config file: InvalidSource. Valid inputs include Environment, Ec2InstanceMetadata, and EcsContainer.");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();

        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = InvalidSource
EOT;
        file_put_contents($dir . '/credentials', $credentials);
        putenv('HOME=' . dirname($dir));
        try {
            $result = CredentialProvider::getCredentialsFromSource(
                'assume',
                $dir . '/credentials',
                []
            );
            self::assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
            $result->wait();
        } catch (\Exception $exception) {
            throw $exception;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testAssumeRoleInConfigFromCredentialsSourceAndSourceProfile()
    {
        $this->expectExceptionMessage("Either source_profile or credential_source must be set using profile assume, but not both");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $ini = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = Environment
source_profile = default
EOT;
        file_put_contents($dir . '/credentials', $ini);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=assume');

        try {
            call_user_func(CredentialProvider::ini())->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testEnsuresSourceProfileConfigIsSpecified()
    {
        $this->expectExceptionMessage("source_profile default using profile assume does not exist");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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

    public function testEnsuresSourceProfileHasCredentials()
    {
        $this->expectExceptionMessage("No credentials present in INI profile 'default'");
        $this->expectException(\Aws\Exception\CredentialsException::class);
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


    public function testLegacySsoProfileProvider()
    {
        $dir = $this->clearEnv();
        $expiration = DateTimeResult::fromEpoch(time() + 1000);
        $ini = <<<EOT
[default]
sso_start_url = url.co.uk
sso_region = us-west-2
sso_account_id = 12345
sso_role_name = roleName
EOT;
        $tokenFile = <<<EOT
{"startUrl" : "url.com", "accessToken" : "token", "expiresAt": "$expiration" }
EOT;

        $configFilename = $dir . '/config';
        file_put_contents($configFilename, $ini);

        $tokenFileDirectory = $dir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenFileName = $tokenFileDirectory . sha1("url.co.uk") . '.json';
        file_put_contents(
            $tokenFileName, $tokenFile
        );

        $configFilename = $dir . '/config';
        putenv('HOME=' . dirname($dir));

        $result = [
            'roleCredentials' => [
                'accessKeyId'     => 'foo',
                'secretAccessKey' => 'assumedSecret',
                'sessionToken'    => null,
                'expiration'      => $expiration
            ],
        ];

        $sso = $this->getTestClient('Sso', ['credentials' => false]);
        $this->addMockResults($sso, [
            new Result($result)
        ]);

        try {
            $creds = call_user_func(CredentialProvider::sso(
                'default',
                $configFilename,
                ['ssoClient' => $sso]
            ))->wait();
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertGreaterThan(
                DateTimeResult::fromEpoch(time())->getTimestamp(),
                $creds->getExpiration()
            );
        } finally {
            unlink($dir . '/config');
            unlink($tokenFileName);
            rmdir($tokenFileDirectory);
            rmdir($dir . "/sso/");
        }
    }

    public function testSsoProfileProviderWithNewFileFormat()
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

        putenv('HOME=' . dirname($dir));

        $configFilename = $dir . '/config';
        file_put_contents($configFilename, $ini);

        $tokenFileDirectory = $dir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenLocation = SsoTokenProvider::getTokenLocation('session-name');
        if (!is_dir(dirname($tokenLocation))) {
            mkdir(dirname($tokenLocation), 0777, true);
        }
        file_put_contents(
            $tokenLocation, $tokenFile
        );

        $configFilename = $dir . '/config';

        $result = [
            'roleCredentials' => [
                'accessKeyId'     => 'foo',
                'secretAccessKey' => 'assumedSecret',
                'sessionToken'    => null,
                'expiration'      => $expiration
            ],
        ];

        $sso = $this->getTestClient('Sso', ['credentials' => false]);
        $this->addMockResults($sso, [
            new Result($result)
        ]);

        try {
            $creds = call_user_func(CredentialProvider::sso(
                'default',
                $configFilename,
                [
                    'ssoClient' => $sso
                ]
            ))->wait();
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertGreaterThan(
                DateTimeResult::fromEpoch(time())->getTimestamp(),
                $creds->getExpiration()
            );
        } finally {
            unlink($dir . '/config');
            unlink($tokenLocation);
            rmdir($tokenFileDirectory);
            rmdir($dir . "/sso/");
        }
    }


    public function testSsoProfileProviderAddedToDefaultChain()
    {
        $dir = $this->clearEnv();
        $expiration = DateTimeResult::fromEpoch(time() + 1000);
        $ini = <<<EOT
[profile default]
sso_start_url = url.co.uk
sso_region = us-west-2
sso_account_id = 12345
sso_role_name = roleName
EOT;
        $tokenFile = <<<EOT
{"startUrl" : "url.com", "accessToken" : "token", "expiresAt": "$expiration" }
EOT;

        $configFilename = $dir . '/config';
        file_put_contents($configFilename, $ini);

        $tokenFileDirectory = $dir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenFileName = $tokenFileDirectory . sha1("url.co.uk") . '.json';
        file_put_contents(
            $tokenFileName, $tokenFile
        );

        $configFilename = $dir . '/config';
        putenv('HOME=' . dirname($dir));

        $result = [
            'roleCredentials' => [
                'accessKeyId'     => 'foo',
                'secretAccessKey' => 'assumedSecret',
                'sessionToken'    => null,
                'expiration'      => $expiration
            ],
        ];

        $sso = $this->getTestClient('Sso', ['credentials' => false]);
        $this->addMockResults($sso, [
            new Result($result)
        ]);

        try {
            $creds = call_user_func(CredentialProvider::defaultProvider(
                ['ssoClient' => $sso]
            ))->wait();
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertGreaterThan(
                DateTimeResult::fromEpoch(time())->getTimestamp(),
                $creds->getExpiration()
            );
        } finally {
            unlink($dir . '/config');
            unlink($tokenFileName);
            rmdir($tokenFileDirectory);
            rmdir($dir . "/sso/");
        }
    }

    public function testSsoProfileProviderMissingTokenData()
    {
        $this->expectExceptionMessage("must contain an access token and an expiration");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
sso_start_url = url.co.uk
sso_region = us-west-2
sso_account_id = 12345
sso_role_name = roleName
EOT;
        $tokenFile = <<<EOT
{"startUrl" : "url.com", "accessToken" : "token"}
EOT;

        $configFilename = $dir . '/config';
        file_put_contents($configFilename, $ini);

        $tokenFileDirectory = $dir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenFileName = $tokenFileDirectory . sha1("url.co.uk") . '.json';
        file_put_contents(
            $tokenFileName, $tokenFile
        );

        $configFilename = $dir . '/config';
        putenv('HOME=' . dirname($dir));

        $result = [
            'roleCredentials' => [
                'accessKeyId'     => 'foo',
                'secretAccessKey' => 'assumedSecret',
                'sessionToken'    => null,
                'expiration'      => DateTimeResult::fromEpoch(time() + 1000)
            ],
        ];

        $sso = $this->getTestClient('Sso', ['credentials' => false]);
        $this->addMockResults($sso, [
            new Result($result)
        ]);

        try {
            call_user_func(CredentialProvider::sso(
                'default',
                $configFilename,
                ['ssoClient' => $sso]
            ))->wait();
        } finally {
            unlink($dir . '/config');
            unlink($tokenFileName);
            rmdir($tokenFileDirectory);
            rmdir($dir . "/sso/");
        }
    }

    public function testSsoProfileProviderMissingProfile()
    {
        $this->expectExceptionMessage("Profile nonExistingProfile does not exist in");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
sso_start_url = url.co.uk
sso_region = us-west-2
sso_account_id = 12345
sso_role_name = roleName
EOT;
        $tokenFile = <<<EOT
{"startUrl" : "url.com", "accessToken" : "token"}
EOT;

        $configFilename = $dir . '/config';
        file_put_contents($configFilename, $ini);

        $tokenFileDirectory = $dir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenFileName = $tokenFileDirectory . sha1("url.co.uk") . '.json';
        file_put_contents(
            $tokenFileName, $tokenFile
        );
        putenv('HOME=' . dirname($dir));
        $configFilename = $dir . '/config';
        putenv('HOME=' . dirname($dir));

        $result = [
            'roleCredentials' => [
                'accessKeyId'     => 'foo',
                'secretAccessKey' => 'assumedSecret',
                'sessionToken'    => null,
                'expiration'      => DateTimeResult::fromEpoch(time() + 1000)
            ],
        ];

        $sso = $this->getTestClient('Sso', ['credentials' => false]);
        $this->addMockResults($sso, [
            new Result($result)
        ]);

        try {
            call_user_func(CredentialProvider::sso(
                'nonExistingProfile',
                $configFilename,
                ['ssoClient' => $sso]
            ))->wait();
        } finally {
            unlink($dir . '/config');
            unlink($tokenFileName);
            rmdir($tokenFileDirectory);
            rmdir($dir . "/sso/");
        }
    }

    public function testSsoProfileProviderBadFile()
    {
        $this->expectExceptionMessage("Cannot read credentials from");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();

        $filename = $dir . '/config';
        putenv('HOME=' . dirname($dir));

        call_user_func(CredentialProvider::sso('default', $filename))->wait();

    }

    public function testSsoProfileProviderFailsWithBadSsoSessionName()
    {
        $this->expectExceptionMessage("Could not find sso-session fakeSessionName in");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
sso_session = fakeSessionName
EOT;
        $filename = $dir . '/config';
        file_put_contents($filename, $ini);
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(CredentialProvider::sso('default', $filename))->wait();
        } finally {
            unlink($dir . '/config');
        }
    }

    public function testSsoProfileProviderMissingData()
    {
        $this->expectExceptionMessage("must contain the following keys: sso_start_url, sso_region, sso_account_id, and sso_role_name");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
sso_start_url = https://url.co.uk
EOT;
        $filename = $dir . '/config';
        file_put_contents($filename, $ini);
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(CredentialProvider::sso('default', $filename))->wait();
        } finally {
            unlink($dir . '/config');
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
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testAssumeRoleInCredentialsFromSourceInConfig()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = credentialSecret
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = configProfile
EOT;
        file_put_contents($dir . '/credentials', $ini);
        $config = <<<EOT
[configProfile]
aws_access_key_id = foo
aws_secret_access_key = configSecret
EOT;
        file_put_contents($dir . '/config', $config);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_SDK_LOAD_NONDEFAULT_CONFIG=1');
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
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
            unlink($dir . '/config');
        }
    }
    public function testAssumeRoleInConfigFromSourceInCredentials()
    {
        $dir = $this->clearEnv();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = credentialSecret
EOT;
        file_put_contents($dir . '/credentials', $ini);
        $config = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($dir . '/config', $config);
        putenv('HOME=' . dirname($dir));
        putenv('AWS_SDK_LOAD_NONDEFAULT_CONFIG=1');
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
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
            unlink($dir . '/config');
        }
    }

    public function testPrefersEnvToProfileInAssumeRoleWebIdentity()
    {
        $dir = $this->clearEnv();
        $tokenPath = $dir . '/token';
        file_put_contents($tokenPath, 'token');
        putenv('HOME=' . dirname($dir));
        putenv('AWS_WEB_IDENTITY_TOKEN_FILE=' . $tokenPath);
        putenv('AWS_ROLE_ARN=arn:aws:iam::012345678910:role/role_name');
        putenv('AWS_ROLE_SESSION_NAME=fooEnv');

        $ini = <<<EOT
[default]
web_identity_token_file = /invalid/path
role_arn = arn:aws:iam::012345678910:role/role_name
role_session_name = barSession
EOT;
        file_put_contents($dir . '/credentials', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken'    => null,
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(
            function ($c, $r) use ($result) {
                $this->assertSame('fooEnv', $c->toArray()['RoleSessionName']);
                return Promise\Create::promiseFor(new Result($result));
            }
        );

        try {
            $config = [
                'stsClient' => $sts
            ];
            $creds = call_user_func(CredentialProvider::assumeRoleWithWebIdentityCredentialProvider(
                $config
            ))->wait();
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
            unlink($tokenPath);
        }
    }

    public function testAssumeRoleWebIdentityFromCredentials()
    {
        $dir = $this->clearEnv();
        $tokenPath = $dir . '/token';
        file_put_contents($tokenPath, 'token');
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=credentials');

        $ini = <<<EOT
[credentials]
web_identity_token_file = $tokenPath
role_arn = arn:aws:iam::012345678910:role/role_name
role_session_name = fooCreds
EOT;
        file_put_contents($dir . '/credentials', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken'    => null,
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(
            function ($c, $r) use ($result) {
                $this->assertSame('fooCreds', $c->toArray()['RoleSessionName']);
                return Promise\Create::promiseFor(new Result($result));
            }
        );

        try {
            $config = [
                'stsClient' => $sts
            ];
            $creds = call_user_func(CredentialProvider::assumeRoleWithWebIdentityCredentialProvider(
                $config
            ))->wait();
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
            unlink($tokenPath);
        }
    }

    public function testAssumeRoleWebIdentityFromConfig()
    {
        $dir = $this->clearEnv();
        $tokenPath = $dir . '/token';
        file_put_contents($tokenPath, 'token');
        putenv('HOME=' . dirname($dir));
        putenv('AWS_PROFILE=config');

        $ini = <<<EOT
[profile config]
web_identity_token_file = $tokenPath
role_arn = arn:aws:iam::012345678910:role/role_name
role_session_name = fooConfig
EOT;
        file_put_contents($dir . '/config', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken'    => null,
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(
            function ($c, $r) use ($result) {
                $this->assertSame('fooConfig', $c->toArray()['RoleSessionName']);
                return Promise\Create::promiseFor(new Result($result));
            }
        );

        try {
            $config = [
                'stsClient' => $sts
            ];
            $creds = call_user_func(CredentialProvider::assumeRoleWithWebIdentityCredentialProvider(
                $config
            ))->wait();
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/config');
            unlink($tokenPath);
        }
    }

    public function testAssumeRoleWebIdentityFromFilename()
    {
        $dir = $this->clearEnv();
        $tokenPath = $dir . '/token';
        file_put_contents($tokenPath, 'token');
        putenv('AWS_PROFILE=fooProfile');

        $ini = <<<EOT
[fooProfile]
web_identity_token_file = $tokenPath
role_arn = arn:aws:iam::012345678910:role/role_name
role_session_name = fooRole
EOT;
        file_put_contents($dir . '/fooCreds', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken'    => null,
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(
            function ($c, $r) use ($result) {
                $this->assertSame('fooRole', $c->toArray()['RoleSessionName']);
                return Promise\Create::promiseFor(new Result($result));
            }
        );

        try {
            $config = [
                'stsClient' => $sts,
                'filename' => $dir . '/fooCreds'
            ];
            $creds = call_user_func(CredentialProvider::assumeRoleWithWebIdentityCredentialProvider(
                $config
            ))->wait();
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('assumedSecret', $creds->getSecretKey());
            $this->assertNull($creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/fooCreds');
            unlink($tokenPath);
        }
    }

    public function testEnsuresAssumeRoleWebIdentityProfileIsPresent()
    {
        $this->expectExceptionMessage("Unknown profile: fooProfile");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        putenv('AWS_PROFILE=fooProfile');

        $ini = <<<EOT
[barProfile]
web_identity_token_file = /token/path
role_arn = arn:aws:iam::012345678910:role/role_name
EOT;
        file_put_contents($dir . '/credentials', $ini);

        try {
            $creds = call_user_func(
                CredentialProvider::assumeRoleWithWebIdentityCredentialProvider()
            )->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
        }
    }

    public function testEnsuresAssumeRoleWebIdentityProfileInDefaultFiles()
    {
        $this->expectExceptionMessage("Unknown profile: fooProfile");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        putenv('AWS_PROFILE=fooProfile');
        touch($dir . '/credentials');
        touch($dir . '/config');

        try {
            $creds = call_user_func(
                CredentialProvider::assumeRoleWithWebIdentityCredentialProvider()
            )->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($dir . '/credentials');
            unlink($dir . '/config');
        }
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\Michael\\Home');
        $ref = new \ReflectionClass(CredentialProvider::class);
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertSame('C:\\Michael\\Home', $meth->invoke(null));
    }

    public function testMemoizes()
    {
        $called = 0;
        $creds = new Credentials('foo', 'bar');
        $f = function () use (&$called, $creds) {
            $called++;
            return Promise\Create::promiseFor($creds);
        };
        $p = CredentialProvider::memoize($f);
        $this->assertSame($creds, $p()->wait());
        $this->assertSame(1, $called);
        $this->assertSame($creds, $p()->wait());
        $this->assertSame(1, $called);
    }

    public function testMemoizesCleansUpOnError()
    {
        $called = 0;
        $f = function () use (&$called) {
            $called++;
            return Promise\Create::rejectionFor('Error');
        };
        $p = CredentialProvider::memoize($f);
        $p()->wait(false);
        $p()->wait(false);
        $this->assertSame(2, $called);
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
        $this->assertSame('abc', $creds->getAccessKeyId());
        $this->assertSame('123', $creds->getSecretKey());
    }

    public function testCachesCacheableInDefaultChain()
    {
        $cacheable = [
            'web_identity',
            'sso',
            'process_credentials',
            'process_config',
            'ecs',
            'instance'
        ];

        $credsForCache = new Credentials('foo', 'bar', 'baz', PHP_INT_MAX);
        foreach ($cacheable as $provider) {
            $this->clearEnv();

            if ($provider == 'ecs') putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/latest');
            $cache = new LruArrayCache;
            $cache->set('aws_cached_' . $provider . '_credentials', $credsForCache);
            $credentials = call_user_func(CredentialProvider::defaultProvider([
                'credentials' => $cache,
            ]))
                ->wait();

            $this->assertSame($credsForCache->getAccessKeyId(), $credentials->getAccessKeyId());
            $this->assertSame($credsForCache->getSecretKey(), $credentials->getSecretKey());
        }
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
        $this->assertSame($instanceCredential->getAccessKeyId(), $credentials->getAccessKeyId());
        $this->assertSame($instanceCredential->getSecretKey(), $credentials->getSecretKey());

        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/latest');
        $credentials = call_user_func(CredentialProvider::defaultProvider([
            'credentials' => $cache,
        ]))
            ->wait();
    
        $this->assertSame($ecsCredential->getAccessKeyId(), $credentials->getAccessKeyId());
        $this->assertSame($ecsCredential->getSecretKey(), $credentials->getSecretKey());

        $this->clearEnv();
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://localhost/test/metadata');
        putenv('AWS_CONTAINER_AUTHORIZATION_TOKEN=1AAA+BBBBB=');
        $credentials = call_user_func(CredentialProvider::defaultProvider([
            'credentials' => $cache,
        ]))
            ->wait();
            
        $this->assertSame($ecsCredential->getAccessKeyId(), $credentials->getAccessKeyId());
        $this->assertSame($ecsCredential->getSecretKey(), $credentials->getSecretKey());
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
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('baz', $creds->getSecretKey());
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
        $this->assertSame('credentialsFoo', $creds->getAccessKeyId());
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
        $this->assertSame('configFoo', $creds->getAccessKeyId());
    }

    /**
     * @dataProvider shouldUseEcsProvider
     *
     * @param string $relative
     * @param string $serverRelative
     * @param string $full
     * @param string $serverFull
     * @param bool $expected
     */
    public function testShouldUseEcs(
        $relative, $serverRelative, $full, $serverFull, $expected
    )
    {
        $this->clearEnv();
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI' . $relative);
        $_SERVER['AWS_CONTAINER_CREDENTIALS_RELATIVE_URI'] = $serverRelative;
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI' . $full);
        $_SERVER['AWS_CONTAINER_CREDENTIALS_FULL_URI'] = $serverFull;
        $result = CredentialProvider::shouldUseEcs();
        $this->assertEquals($expected, $result);
    }

    public function shouldUseEcsProvider()
    {
        return [
            ['=foo', '', '', '', true],
            ['', 'foo', '', '', true],
            ['', '', '=bar', '', true],
            ['', '', '', 'bar', true],
            ['', '', '', '', false]
        ];
    }
}
