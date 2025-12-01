<?php
namespace Aws\Test\Credentials;

use Aws\Api\DateTimeResult;
use Aws\Credentials\AssumeRoleWithWebIdentityCredentialProvider;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialSources;
use Aws\Credentials\EcsCredentialProvider;
use Aws\Credentials\InstanceProfileProvider;
use Aws\Exception\CredentialsException;
use Aws\History;
use Aws\LruArrayCache;
use Aws\Result;
use Aws\SSO\SSOClient;
use Aws\Sts\StsClient;
use Aws\Token\SsoTokenProvider;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Credentials\CredentialProvider
 */
class CredentialProviderTest extends TestCase
{
    use UsesServiceTrait;

    /** @var array<string, string|false> */
    private array $originalEnv = [];

    /** @var list<string> */
    private array $tempDirs = [];

    private static string $standardIni = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_session_token = baz
EOT;

    /**
     * All env vars we snapshot & restore.
     * We do NOT clear HOME/HOMEDRIVE/HOMEPATH in setUp() (we only snapshot/restore them).
     */
    private const ENV_VARS_TO_TRACK = [
        'HOME',
        'HOMEDRIVE',
        'HOMEPATH',
        CredentialProvider::ENV_KEY,
        CredentialProvider::ENV_SECRET,
        CredentialProvider::ENV_SESSION,
        CredentialProvider::ENV_PROFILE,
        CredentialProvider::ENV_ACCOUNT_ID,
        CredentialProvider::ENV_ARN,
        CredentialProvider::ENV_TOKEN_FILE,
        CredentialProvider::ENV_ROLE_SESSION_NAME,
        CredentialProvider::ENV_REGION,
        'AWS_CONTAINER_CREDENTIALS_RELATIVE_URI',
        'AWS_CONTAINER_CREDENTIALS_FULL_URI',
        'AWS_CONTAINER_AUTHORIZATION_TOKEN',
        'AWS_SDK_LOAD_NONDEFAULT_CONFIG',
        'AWS_WEB_IDENTITY_TOKEN_FILE',
        'AWS_ROLE_ARN',
        'AWS_ROLE_SESSION_NAME',
        'AWS_SHARED_CREDENTIALS_FILE',
        'AWS_CONFIG_FILE',
        'AWS_ACCESS_KEY_ID',
        'AWS_SECRET_ACCESS_KEY',
    ];

    /**
     * Only these are cleared in setUp(); HOME et al are left as-is unless a test sets them.
     */
    private const CREDENTIAL_ENV_VARS = [
        CredentialProvider::ENV_KEY,
        CredentialProvider::ENV_SECRET,
        CredentialProvider::ENV_SESSION,
        CredentialProvider::ENV_PROFILE,
        CredentialProvider::ENV_ACCOUNT_ID,
        CredentialProvider::ENV_ARN,
        CredentialProvider::ENV_TOKEN_FILE,
        CredentialProvider::ENV_ROLE_SESSION_NAME,
        CredentialProvider::ENV_REGION,
        'AWS_CONTAINER_CREDENTIALS_RELATIVE_URI',
        'AWS_CONTAINER_CREDENTIALS_FULL_URI',
        'AWS_CONTAINER_AUTHORIZATION_TOKEN',
        'AWS_SDK_LOAD_NONDEFAULT_CONFIG',
        'AWS_WEB_IDENTITY_TOKEN_FILE',
        'AWS_ROLE_ARN',
        'AWS_ROLE_SESSION_NAME',
        'AWS_SHARED_CREDENTIALS_FILE',
        'AWS_CONFIG_FILE',
        'AWS_ACCESS_KEY_ID',
        'AWS_SECRET_ACCESS_KEY',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        // Snapshot all tracked env vars (including HOME/HOMEDRIVE/HOMEPATH).
        foreach (self::ENV_VARS_TO_TRACK as $var) {
            $this->originalEnv[$var] = getenv($var);
        }

        // Start tests from a blank credential-related env
        foreach (self::CREDENTIAL_ENV_VARS as $var) {
            putenv("$var=");
            if (isset($_SERVER[$var])) {
                unset($_SERVER[$var]);
            }
        }
    }

    protected function tearDown(): void
    {
        // Restore ALL tracked env vars to their original values.
        foreach ($this->originalEnv as $key => $value) {
            if ($value !== false) {
                putenv("$key=$value");
                $_SERVER[$key] = $value; // keep $_SERVER mirror consistent when it exists
            } else {
                putenv("$key=");
                if (isset($_SERVER[$key])) {
                    unset($_SERVER[$key]);
                }
            }
        }
        $this->originalEnv = [];

        // Clean any temp dirs created during tests.
        foreach ($this->tempDirs as $dir) {
            if (is_dir($dir)) {
                $this->recursiveDelete($dir);
            }
        }
        $this->tempDirs = [];

        parent::tearDown();
    }

    /**
     * Create an isolated temp HOME with a `.aws` dir.
     * Sets HOME to the temp base dir and returns the `.aws` path.
     */
    private function createAwsHome(): string
    {
        $base = sys_get_temp_dir() . '/aws_test_' . uniqid('', true);
        $awsDir = $base . '/.aws';
        mkdir($awsDir, 0777, true);
        $this->tempDirs[] = $base;
        putenv('HOME=' . $base);
        $_SERVER['HOME'] = $base;
        return $awsDir;
    }

    private function createTempDir(string $prefix = 'aws_test_'): string
    {
        $dir = sys_get_temp_dir() . '/' . $prefix . uniqid('', true);
        mkdir($dir, 0777, true);
        $this->tempDirs[] = $dir;
        return $dir;
    }

    private function recursiveDelete(string $dir): void
    {
        $it = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($it as $file) {
            $path = $file->getPathname();
            if ($file->isDir()) {
                @rmdir($path);
            } else {
                @unlink($path);
            }
        }
        @rmdir($dir);
    }

    public function testCreatesFromCache(): void
    {
        $cache = new LruArrayCache();
        $key = __CLASS__ . 'credentialsCache';
        $saved = new Credentials('foo', 'bar', 'baz', PHP_INT_MAX);
        $cache->set($key, $saved, $saved->getExpiration() - time());

        $explodingProvider = static function () {
            throw new \BadFunctionCallException('This should never be called');
        };

        $found = call_user_func(
            CredentialProvider::cache($explodingProvider, $cache, $key)
        )->wait();

        $this->assertSame($saved->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertSame($saved->getSecretKey(), $found->getSecretKey());
        $this->assertEquals($saved->getSecurityToken(), $found->getSecurityToken());
        $this->assertEquals($saved->getExpiration(), $found->getExpiration());
    }

    public function testRefreshesCacheWhenCredsExpired(): void
    {
        $cache = new LruArrayCache();
        $key = __CLASS__ . 'credentialsCache';
        $saved = new Credentials('foo', 'bar', 'baz', time() - 1);
        $cache->set($key, $saved);

        $timesCalled = 0;
        $recordKeepingProvider = static function () use (&$timesCalled) {
            ++$timesCalled;
            return Create::promiseFor(new Credentials('foo', 'bar', 'baz', PHP_INT_MAX));
        };

        call_user_func(
            CredentialProvider::cache($recordKeepingProvider, $cache, $key)
        )->wait();

        $this->assertSame(1, $timesCalled);
    }

    public function testPersistsToCache(): void
    {
        $cache = new LruArrayCache();
        $key = __CLASS__ . 'credentialsCache';
        $creds = new Credentials('foo', 'bar', 'baz', PHP_INT_MAX);

        $timesCalled = 0;
        $volatileProvider = static function () use ($creds, &$timesCalled) {
            if (0 === $timesCalled) {
                ++$timesCalled;
                return Create::promiseFor($creds);
            }
            throw new \BadFunctionCallException('I was called too many times!');
        };

        for ($i = 0; $i < 10; $i++) {
            $found = call_user_func(
                CredentialProvider::cache($volatileProvider, $cache, $key)
            )->wait();
        }

        $this->assertSame(1, $timesCalled);
        $this->assertCount(1, $cache);
        $this->assertSame($creds->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertSame($creds->getSecretKey(), $found->getSecretKey());
        $this->assertEquals($creds->getSecurityToken(), $found->getSecurityToken());
        $this->assertEquals($creds->getExpiration(), $found->getExpiration());
    }

    public function testCreatesFromEnvironmentVariables(): void
    {
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SECRET . '=123');
        putenv(CredentialProvider::ENV_SESSION . '=456');
        $testAccountId = 'foo';
        putenv(CredentialProvider::ENV_ACCOUNT_ID . "=$testAccountId");

        $creds = call_user_func(CredentialProvider::env())->wait();
        $this->assertSame('abc', $creds->getAccessKeyId());
        $this->assertSame('123', $creds->getSecretKey());
        $this->assertSame('456', $creds->getSecurityToken());
        $this->assertSame($testAccountId, $creds->getAccountId());
    }

    public function testCreatesFromEnvironmentVariablesNullToken(): void
    {
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
     */
    public function testCreatesFromIniFile(
        string $iniFile,
        Credentials $expectedCreds
    ): void
    {
        $awsDir = $this->createAwsHome();
        file_put_contents($awsDir . '/credentials', $iniFile);

        $creds = call_user_func(CredentialProvider::ini('default'))->wait();
        $this->assertEquals($expectedCreds->toArray(), $creds->toArray());
    }

    public function iniFileProvider(): array
    {
        $credentials = new Credentials(
            'foo',
            'bar', 'baz',
            null,
            null,
            CredentialSources::PROFILE
        );
        $testAccountId = 'foo';
        $credentialsWithAccountId = new Credentials(
            'foo',
            'bar',
            'baz',
            null,
            $testAccountId,
            CredentialSources::PROFILE
        );
        $credentialsWithEquals = new Credentials(
            'foo',
            'bar',
            'baz=', null,
            null, CredentialSources::PROFILE
        );

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
        $standardIniWithAccountId = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_session_token = baz
aws_account_id = $testAccountId
EOT;

        return [
            [$standardIni, $credentials],
            [$oldIni, $credentials],
            [$mixedIni, $credentials],
            [$standardWithEqualsIni, $credentialsWithEquals],
            [$standardWithEqualsQuotedIni, $credentialsWithEquals],
            [$standardIniWithAccountId, $credentialsWithAccountId],
        ];
    }

    public function testUsesIniWithUseAwsConfigFileTrue(): void
    {
        $awsDir = $this->createAwsHome();
        file_put_contents($awsDir . '/credentials', self::$standardIni);

        $expectedCreds = [
            "key" => "foo",
            "secret" => "bar",
            "token" => "baz",
            "expires" => null,
            "accountId" => null,
            'source' => CredentialSources::PROFILE
        ];

        $creds = call_user_func(
            CredentialProvider::defaultProvider(['use_aws_shared_config_files' => true])
        )->wait();
        $this->assertEquals($expectedCreds, $creds->toArray());
    }

    public function testIgnoresIniWithUseAwsConfigFileFalse(): void
    {
        $this->expectExceptionMessage(
            "Error retrieving credentials from the instance profile metadata service"
        );
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        file_put_contents($awsDir . '/credentials', self::$standardIni);

        call_user_func(
            CredentialProvider::defaultProvider(['use_aws_shared_config_files' => false])
        )->wait();
    }

    public function testEnsuresIniFileIsValid(): void
    {
        $this->expectExceptionMessage("Invalid credentials file:");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        file_put_contents($awsDir . '/credentials', "wef \n=\nwef");

        @call_user_func(CredentialProvider::ini())->wait();
    }

    public function testEnsuresIniFileExists(): void
    {
        $this->expectException(\Aws\Exception\CredentialsException::class);

        // Point HOME to a non-existent path (no .aws there)
        putenv('HOME=/does/not/exist');
        $_SERVER['HOME'] = '/does/not/exist';

        call_user_func(CredentialProvider::ini())->wait();
    }

    public function testEnsuresProfileIsNotEmpty(): void
    {
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = "[default]\naws_access_key_id = foo\naws_secret_access_key = baz\n[foo]";
        file_put_contents($awsDir . '/credentials', $ini);

        call_user_func(CredentialProvider::ini('foo'))->wait();
    }

    public function testEnsuresFileIsNotEmpty(): void
    {
        $this->expectExceptionMessage("'foo' not found in");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        file_put_contents($awsDir . '/credentials', '');

        call_user_func(CredentialProvider::ini('foo'))->wait();
    }

    public function testCreatesFromProcessCredentialProvider(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[foo]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $creds = call_user_func(CredentialProvider::process('foo'))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('bar', $creds->getSecretKey());
    }

    public function testCreatesFromProcessCredentialProviderWithAccountId(): void
    {
        $testAccountId = 'foo';
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[foo]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1, "AccountId": "$testAccountId"}'
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $creds = call_user_func(CredentialProvider::process('foo'))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('bar', $creds->getSecretKey());
        $this->assertSame($testAccountId, $creds->getAccountId());
    }

    public function testCreatesFromProcessCredentialWithFilename(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[baz]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($awsDir . '/mycreds', $ini);

        $creds = call_user_func(CredentialProvider::process('baz', $awsDir . '/mycreds'))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('bar', $creds->getSecretKey());
    }

    public function testCreatesFromProcessCredentialWithFilenameParameterOverSharedFilename(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[baz]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($awsDir . '/mycreds', $ini);
        putenv("AWS_SHARED_CREDENTIALS_FILE={$awsDir}/badfilename");

        $creds = call_user_func(
            CredentialProvider::process('baz', $awsDir . '/mycreds')
        )->wait();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesFromProcessCredentialWithSharedFilename(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[baz]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($awsDir . '/mycreds', $ini);
        putenv("AWS_SHARED_CREDENTIALS_FILE={$awsDir}/mycreds");

        $creds = call_user_func(CredentialProvider::process('baz'))->wait();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesFromIniCredentialWithSharedFilename(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[baz]
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
EOT;
        file_put_contents($awsDir . '/mycreds', $ini);
        putenv("AWS_SHARED_CREDENTIALS_FILE={$awsDir}/mycreds");

        $creds = call_user_func(CredentialProvider::ini('default'))->wait();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testCreatesFromIniCredentialWithDefaultProvider(): void
    {
        $testAccountId = 'foo';
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[baz]
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_account_id = $testAccountId
EOT;
        file_put_contents($awsDir . '/mycreds', $ini);
        putenv("AWS_SHARED_CREDENTIALS_FILE={$awsDir}/mycreds");

        $creds = call_user_func(CredentialProvider::defaultProvider([]))->wait();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
        $this->assertEquals($testAccountId, $creds->getAccountId());
    }

    public function testCreatesTemporaryFromProcessCredential(): void
    {
        $awsDir = $this->createAwsHome();
        $expiration = new DateTimeResult("+1 hour");
        $expires = $expiration->getTimestamp();
        $ini = <<<EOT
[foo]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "SessionToken": "baz", "Expiration":"$expiration", "Version":1}'
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $creds = call_user_func(CredentialProvider::process('foo'))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('bar', $creds->getSecretKey());
        $this->assertSame('baz', $creds->getSecurityToken());
        $this->assertSame($expires, $creds->getExpiration());
    }

    public function testEnsuresProcessCredentialIsPresent(): void
    {
        $this->expectExceptionMessage("No credential_process present in INI profile");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = baz
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        call_user_func(CredentialProvider::process())->wait();
    }

    public function testEnsuresProcessCredentialVersion(): void
    {
        $this->expectExceptionMessage("credential_process does not return Version == 1");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":2}'
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        call_user_func(CredentialProvider::process())->wait();
    }

    public function testEnsuresProcessCredentialsAreCurrent(): void
    {
        $this->expectExceptionMessage("credential_process returned expired credentials");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "SessionToken":"baz","Version":1, "Expiration":"1970-01-01T00:00:00.000Z"}'
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        call_user_func(CredentialProvider::process())->wait();
    }

    public function testEnsuresProcessCredentialsExpirationIsValid(): void
    {
        $this->expectExceptionMessage("credential_process returned invalid expiration");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
credential_process = echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "SessionToken":"baz","Version":1, "Expiration":"invalid_date_format"}'
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        call_user_func(CredentialProvider::process())->wait();
    }

    public function testCreatesFromInstanceProfileProvider(): void
    {
        $p = CredentialProvider::instanceProfile();
        $this->assertInstanceOf(InstanceProfileProvider::class, $p);
    }

    public function testCreatesFromEcsCredentialProvider(): void
    {
        $p = CredentialProvider::ecsCredentials();
        $this->assertInstanceOf(EcsCredentialProvider::class, $p);
    }

    public function testCreatesFromRoleArn(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = defaultSecret
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
role_session_name = foobar
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];

        $sts = $this->getTestClient('Sts');
        $this->addMockResults($sts, [new Result($result)]);

        $history = new History();
        $sts->getHandlerList()->appendSign(\Aws\Middleware::history($history));

        $config = ['stsClient' => $sts];
        $creds = call_user_func(CredentialProvider::ini('assume', null, $config))->wait();

        $body = (string)$history->getLastRequest()->getBody();
        $this->assertStringContainsString('RoleSessionName=foobar', $body);
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertIsInt($creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    public function testCreatesFromRoleArnWithSourceProfileEmitsNoticeOnFallbackRegion(): void
    {
        $this->expectNotice();
        $this->expectNoticeMessage(
            'NOTICE: STS client created without explicit `region` configuration'
        );

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = defaultSecret
[assume]
role_arn = arn:aws:iam::foo:role/role_name
source_profile = default
role_session_name = foobar
EOT;
        file_put_contents($awsDir . '/credentials', $ini);
        call_user_func(CredentialProvider::ini('assume', null))->wait();
    }

    public function testCreatesFromRoleArnWithCredentialSourceEmitsNoticeOnFallbackRegion(): void
    {
        $this->expectNotice();
        $this->expectNoticeMessage(
            'NOTICE: STS client created without explicit `region` configuration'
        );

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[assume-with-credential-source]
role_arn=arn:aws:iam::foo:role/role_name
credential_source=Environment
role_session_name=test_session
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        // Set up environment credentials for credential_source=Environment
        putenv(CredentialProvider::ENV_KEY . '=foo');
        putenv(CredentialProvider::ENV_SECRET . '=bar');


        call_user_func(CredentialProvider::ini('assume-with-credential-source', null))->wait();
    }

    public function testCreatesFromRoleArnCatchesCircular(): void
    {
        $this->expectExceptionMessage("Circular source_profile reference found.");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
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
        file_put_contents($awsDir . '/credentials', $ini);

        call_user_func(CredentialProvider::ini('assume2', null, []))->wait();
    }

    public function testSetsRoleSessionNameToDefault(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = defaultSecret
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];

        $sts = $this->getTestClient('Sts');
        $this->addMockResults($sts, [new Result($result)]);

        $history = new History();
        $sts->getHandlerList()->appendSign(\Aws\Middleware::history($history));

        $config = ['stsClient' => $sts];
        call_user_func(CredentialProvider::ini('assume', null, $config))->wait();

        $body = (string)$history->getLastRequest()->getBody();
        $this->assertMatchesRegularExpression('/RoleSessionName=aws-sdk-php-\d{13}/', $body);
    }

    public function testEnsuresAssumeRoleCanBeDisabled(): void
    {
        $this->expectExceptionMessage("Role assumption profiles are disabled. Failed to load profile assume");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = baz
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($awsDir . '/credentials', $ini);
        putenv('AWS_PROFILE=assume');

        $config = [
            'preferStaticCredentials' => false,
            'disableAssumeRole' => true
        ];
        call_user_func(CredentialProvider::ini("assume", null, $config))->wait();
    }

    public function testEnsuresSourceProfileIsSpecified(): void
    {
        $this->expectExceptionMessage("Either source_profile or credential_source must be set using profile assume, but not both");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = baz
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
EOT;
        file_put_contents($awsDir . '/credentials', $ini);
        putenv('AWS_PROFILE=assume');

        call_user_func(CredentialProvider::ini())->wait();
    }

    public function testAssumeRoleInConfigFromCredentialSourceNoRoleArn(): void
    {
        $this->expectExceptionMessage("A role_arn must be provided with credential_source in");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SESSION . '');

        $credentials = <<<EOT
[assume]
credential_source = Environment
role_arn = 
EOT;
        file_put_contents($awsDir . '/credentials', $credentials);

        call_user_func(CredentialProvider::ini('assume', $awsDir . '/credentials', []))->wait();
    }

    public function testAssumeRoleInConfigFromFailingCredentialsSource(): void
    {
        $this->expectExceptionMessage("Could not find environment variable credentials in AWS_ACCESS_KEY_ID/AWS_SECRET_ACCESS_KEY");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SESSION . '');

        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = Environment
EOT;
        file_put_contents($awsDir . '/credentials', $credentials);

        $result = CredentialProvider::getCredentialsFromSource('assume', $awsDir . '/credentials', []);
        self::assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
        $result->wait();
    }

    public function testAssumeRoleInConfigFromCredentialsSourceEnvironment(): void
    {
        $awsDir = $this->createAwsHome();
        putenv(CredentialProvider::ENV_KEY . '=abc');
        putenv(CredentialProvider::ENV_SECRET . '=123');
        putenv(CredentialProvider::ENV_SESSION . '');

        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = Environment
EOT;
        file_put_contents($awsDir . '/credentials', $credentials);

        $creds = call_user_func(CredentialProvider::getCredentialsFromSource('assume', $awsDir . '/credentials', []))->wait();
        $this->assertSame('abc', $creds->getAccessKeyId());
        $this->assertSame('123', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
    }

    public function testAssumeRoleInConfigFromCredentialsSourceEc2InstanceMetadata(): void
    {
        $this->expectExceptionMessage("Error retrieving credentials from the instance profile metadata service");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = Ec2InstanceMetadata
EOT;
        file_put_contents($awsDir . '/credentials', $credentials);

        $result = CredentialProvider::getCredentialsFromSource('assume', $awsDir . '/credentials', []);
        self::assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
        $result->wait();
    }

    public function testAssumeRoleInConfigFromCredentialsSourceEcsContainer(): void
    {
        $this->expectExceptionMessage("Error retrieving credentials from container metadata");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = EcsContainer
EOT;
        file_put_contents($awsDir . '/credentials', $credentials);

        $result = CredentialProvider::getCredentialsFromSource('assume', $awsDir . '/credentials', []);
        self::assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
        $result->wait();
    }

    public function testAssumeRoleInConfigFromInvalidCredentialsSource(): void
    {
        $this->expectExceptionMessage("Invalid credential_source found in config file: InvalidSource. Valid inputs include Environment, Ec2InstanceMetadata, and EcsContainer.");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $credentials = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = InvalidSource
EOT;
        file_put_contents($awsDir . '/credentials', $credentials);

        $result = CredentialProvider::getCredentialsFromSource('assume', $awsDir . '/credentials', []);
        self::assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
        $result->wait();
    }

    public function testAssumeRoleInConfigFromCredentialsSourceAndSourceProfile(): void
    {
        $this->expectExceptionMessage("Either source_profile or credential_source must be set using profile assume, but not both");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
credential_source = Environment
source_profile = default
EOT;
        file_put_contents($awsDir . '/credentials', $ini);
        putenv('AWS_PROFILE=assume');

        call_user_func(CredentialProvider::ini())->wait();
    }

    public function testEnsuresSourceProfileConfigIsSpecified(): void
    {
        $this->expectExceptionMessage("source_profile default using profile assume does not exist");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($awsDir . '/credentials', $ini);
        putenv('AWS_PROFILE=assume');

        call_user_func(CredentialProvider::ini())->wait();
    }

    public function testEnsuresSourceProfileHasCredentials(): void
    {
        $this->expectExceptionMessage("No credentials present in INI profile 'default'");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($awsDir . '/credentials', $ini);
        putenv('AWS_PROFILE=assume');

        call_user_func(CredentialProvider::ini())->wait();
    }

    public function testLegacySsoProfileProvider(): void
    {
        $awsDir = $this->createAwsHome();
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

        $configFilename = $awsDir . '/config';
        file_put_contents($configFilename, $ini);

        $tokenFileDirectory = $awsDir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenFileName = $tokenFileDirectory . sha1("url.co.uk") . '.json';
        file_put_contents($tokenFileName, $tokenFile);

        $result = [
            'roleCredentials' => [
                'accessKeyId' => 'foo',
                'secretAccessKey' => 'assumedSecret',
                'sessionToken' => null,
                'expiration' => $expiration
            ],
        ];

        $sso = $this->getTestClient('Sso', ['credentials' => false]);
        $this->addMockResults($sso, [new Result($result)]);

        $creds = call_user_func(CredentialProvider::sso('default', $configFilename, ['ssoClient' => $sso]))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertGreaterThan(DateTimeResult::fromEpoch(time())->getTimestamp(), $creds->getExpiration());
    }

    public function testSsoProfileProviderWithNewFileFormat(): void
    {
        $awsDir = $this->createAwsHome();
        $expiration = time() + 1000;
        $expirationMilliseconds = $expiration * 1000;
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

        file_put_contents($awsDir . '/config', $ini);

        $tokenFileDirectory = $awsDir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenLocation = SsoTokenProvider::getTokenLocation('session-name');
        if (!is_dir(dirname($tokenLocation))) {
            mkdir(dirname($tokenLocation), 0777, true);
        }
        file_put_contents($tokenLocation, $tokenFile);

        $result = [
            'roleCredentials' => [
                'accessKeyId' => 'foo',
                'secretAccessKey' => 'assumedSecret',
                'sessionToken' => null,
                'expiration' => $expirationMilliseconds
            ],
        ];

        $sso = $this->getTestClient('Sso', ['credentials' => false]);
        $this->addMockResults($sso, [new Result($result)]);

        $creds = call_user_func(CredentialProvider::sso('default', $awsDir . '/config', ['ssoClient' => $sso]))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertGreaterThan(DateTimeResult::fromEpoch(time())->getTimestamp(), $creds->getExpiration());
        $this->assertEquals($creds->getExpiration(), $expiration);
    }

    public function testSsoProfileProviderAddedToDefaultChain(): void
    {
        $awsDir = $this->createAwsHome();
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

        file_put_contents($awsDir . '/config', $ini);

        $tokenFileDirectory = $awsDir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenFileName = $tokenFileDirectory . sha1("url.co.uk") . '.json';
        file_put_contents($tokenFileName, $tokenFile);

        $sso = $this->getTestClient('Sso', ['credentials' => false]);
        $this->addMockResults($sso, [new Result(['roleCredentials' => [
            'accessKeyId' => 'foo',
            'secretAccessKey' => 'assumedSecret',
            'sessionToken' => null,
            'expiration' => $expiration
        ]])]);

        $creds = call_user_func(CredentialProvider::defaultProvider(['ssoClient' => $sso]))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertGreaterThan(DateTimeResult::fromEpoch(time())->getTimestamp(), $creds->getExpiration());
    }

    public function testSsoProfileProviderMissingTokenData(): void
    {
        $this->expectExceptionMessage("must contain an access token and an expiration");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
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

        file_put_contents($awsDir . '/config', $ini);

        $tokenFileDirectory = $awsDir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenFileName = $tokenFileDirectory . sha1("url.co.uk") . '.json';
        file_put_contents($tokenFileName, $tokenFile);

        call_user_func(CredentialProvider::sso('default', $awsDir . '/config'))->wait();
    }

    public function testSsoProfileProviderMissingProfile(): void
    {
        $this->expectExceptionMessage("Profile nonExistingProfile does not exist in");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
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

        file_put_contents($awsDir . '/config', $ini);

        $tokenFileDirectory = $awsDir . "/sso/cache/";
        if (!is_dir($tokenFileDirectory)) {
            mkdir($tokenFileDirectory, 0777, true);
        }
        $tokenFileName = $tokenFileDirectory . sha1("url.co.uk") . '.json';
        file_put_contents($tokenFileName, $tokenFile);

        call_user_func(CredentialProvider::sso('nonExistingProfile', $awsDir . '/config'))->wait();
    }

    public function testSsoProfileProviderBadFile(): void
    {
        $this->expectExceptionMessage("Cannot read credentials from");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $filename = $awsDir . '/config'; // intentionally not created

        call_user_func(CredentialProvider::sso('default', $filename))->wait();
    }

    public function testSsoProfileProviderFailsWithBadSsoSessionName(): void
    {
        $this->expectExceptionMessage("Could not find sso-session fakeSessionName in");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
sso_session = fakeSessionName
EOT;
        $filename = $awsDir . '/config';
        file_put_contents($filename, $ini);

        call_user_func(CredentialProvider::sso('default', $filename))->wait();
    }

    public function testSsoProfileProviderMissingData(): void
    {
        $this->expectExceptionMessage("must contain the following keys: sso_start_url, sso_region, sso_account_id, and sso_role_name");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
sso_start_url = https://url.co.uk
EOT;
        $filename = $awsDir . '/config';
        file_put_contents($filename, $ini);

        call_user_func(CredentialProvider::sso('default', $filename))->wait();
    }

    public function testPreferRoleArnToStaticCredentialsInBaseProfile(): void
    {
        $awsDir = $this->createAwsHome();
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
        file_put_contents($awsDir . '/credentials', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];

        $sts = $this->getTestClient('Sts');
        $this->addMockResults($sts, [new Result($result)]);

        $config = ['stsClient' => $sts];
        $creds = call_user_func(CredentialProvider::ini('assume', null, $config))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertIsInt($creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    public function testAssumeRoleInCredentialsFromSourceInConfig(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = credentialSecret
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = configProfile
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $config = <<<EOT
[configProfile]
aws_access_key_id = foo
aws_secret_access_key = configSecret
EOT;
        file_put_contents($awsDir . '/config', $config);
        putenv('AWS_SDK_LOAD_NONDEFAULT_CONFIG=1');

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts');
        $this->addMockResults($sts, [new Result($result)]);

        $creds = call_user_func(CredentialProvider::ini('assume', null, ['stsClient' => $sts]))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertIsInt($creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    public function testAssumeRoleInConfigFromSourceInCredentials(): void
    {
        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = credentialSecret
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $config = <<<EOT
[assume]
role_arn = arn:aws:iam::012345678910:role/role_name
source_profile = default
EOT;
        file_put_contents($awsDir . '/config', $config);
        putenv('AWS_SDK_LOAD_NONDEFAULT_CONFIG=1');

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts');
        $this->addMockResults($sts, [new Result($result)]);

        $creds = call_user_func(CredentialProvider::ini('assume', null, ['stsClient' => $sts]))->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertIsInt($creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    public function testPrefersEnvToProfileInAssumeRoleWebIdentity(): void
    {
        $awsDir = $this->createAwsHome();
        $tokenPath = $awsDir . '/token';
        file_put_contents($tokenPath, 'token');

        putenv('AWS_WEB_IDENTITY_TOKEN_FILE=' . $tokenPath);
        putenv('AWS_ROLE_ARN=arn:aws:iam::012345678910:role/role_name');
        putenv('AWS_ROLE_SESSION_NAME=fooEnv');

        $ini = <<<EOT
[default]
web_identity_token_file = /invalid/path
role_arn = arn:aws:iam::012345678910:role/role_name
role_session_name = barSession
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(function ($c, $r) use ($result) {
            $this->assertSame('fooEnv', $c->toArray()['RoleSessionName']);
            return Create::promiseFor(new Result($result));
        });

        $creds = call_user_func(
            CredentialProvider::assumeRoleWithWebIdentityCredentialProvider(['stsClient' => $sts])
        )->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertIsInt($creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    public function testAssumeRoleWebIdentityFromCredentials(): void
    {
        $awsDir = $this->createAwsHome();
        $tokenPath = $awsDir . '/token';
        file_put_contents($tokenPath, 'token');
        putenv('AWS_PROFILE=credentials');

        $ini = <<<EOT
[credentials]
web_identity_token_file = $tokenPath
role_arn = arn:aws:iam::012345678910:role/role_name
role_session_name = fooCreds
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(function ($c, $r) use ($result) {
            $this->assertSame('fooCreds', $c->toArray()['RoleSessionName']);
            return Create::promiseFor(new Result($result));
        });

        $creds = call_user_func(
            CredentialProvider::assumeRoleWithWebIdentityCredentialProvider(['stsClient' => $sts])
        )->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertIsInt($creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    public function testAssumeRoleWebIdentityFromConfig(): void
    {
        $awsDir = $this->createAwsHome();
        $tokenPath = $awsDir . '/token';
        file_put_contents($tokenPath, 'token');
        putenv('AWS_PROFILE=config');

        $ini = <<<EOT
[profile config]
web_identity_token_file = $tokenPath
role_arn = arn:aws:iam::012345678910:role/role_name
role_session_name = fooConfig
EOT;
        file_put_contents($awsDir . '/config', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(function ($c, $r) use ($result) {
            $this->assertSame('fooConfig', $c->toArray()['RoleSessionName']);
            return Create::promiseFor(new Result($result));
        });

        $creds = call_user_func(CredentialProvider::assumeRoleWithWebIdentityCredentialProvider(
            ['stsClient' => $sts])
        )->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertIsInt($creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    public function testAssumeRoleWebIdentityFromFilename(): void
    {
        $awsDir = $this->createAwsHome();
        $tokenPath = $awsDir . '/token';
        file_put_contents($tokenPath, 'token');
        putenv('AWS_PROFILE=fooProfile');

        $ini = <<<EOT
[fooProfile]
web_identity_token_file = $tokenPath
role_arn = arn:aws:iam::012345678910:role/role_name
role_session_name = fooRole
EOT;
        file_put_contents($awsDir . '/fooCreds', $ini);

        $result = [
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'assumedSecret',
                'SessionToken' => null,
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(function ($c, $r) use ($result) {
            $this->assertSame('fooRole', $c->toArray()['RoleSessionName']);
            return Create::promiseFor(new Result($result));
        });

        $config = [
            'stsClient' => $sts,
            'filename' => $awsDir . '/fooCreds'
        ];
        $creds = call_user_func(
            CredentialProvider::assumeRoleWithWebIdentityCredentialProvider($config)
        )->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('assumedSecret', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertIsInt($creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    public function testEnsuresAssumeRoleWebIdentityProfileIsPresent(): void
    {
        $this->expectExceptionMessage("Unknown profile: fooProfile");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        putenv('AWS_PROFILE=fooProfile');

        $ini = <<<EOT
[barProfile]
web_identity_token_file = /token/path
role_arn = arn:aws:iam::012345678910:role/role_name
EOT;
        file_put_contents($awsDir . '/credentials', $ini);

        call_user_func(
            CredentialProvider::assumeRoleWithWebIdentityCredentialProvider()
        )->wait();
    }

    public function testEnsuresAssumeRoleWebIdentityProfileInDefaultFiles(): void
    {
        $this->expectExceptionMessage("Unknown profile: fooProfile");
        $this->expectException(\Aws\Exception\CredentialsException::class);

        $awsDir = $this->createAwsHome();
        putenv('AWS_PROFILE=fooProfile');
        touch($awsDir . '/credentials');
        touch($awsDir . '/config');

        call_user_func(
            CredentialProvider::assumeRoleWithWebIdentityCredentialProvider()
        )->wait();
    }

    public function testGetsHomeDirectoryForWindowsUsers(): void
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\Michael\\Home');
        $ref = new \ReflectionClass(CredentialProvider::class);
        $meth = $ref->getMethod('getHomeDir');
        $this->assertSame('C:\\Michael\\Home', $meth->invoke(null));
    }

    public function testMemoizes(): void
    {
        $called = 0;
        $creds = new Credentials('foo', 'bar');
        $f = static function () use (&$called, $creds) {
            $called++;
            return Create::promiseFor($creds);
        };
        $p = CredentialProvider::memoize($f);
        $this->assertSame($creds, $p()->wait());
        $this->assertSame(1, $called);
        $this->assertSame($creds, $p()->wait());
        $this->assertSame(1, $called);
    }

    public function testMemoizesCleansUpOnError(): void
    {
        $called = 0;
        $f = static function () use (&$called) {
            $called++;
            return Create::rejectionFor('Error');
        };
        $p = CredentialProvider::memoize($f);
        $p()->wait(false);
        $p()->wait(false);
        $this->assertSame(2, $called);
    }

    public function testMemoizeRefreshesWhenExpiringWithinThreshold(): void
    {
        $called = 0;
        $creds1 = new Credentials('foo', 'bar', null, time() + 30);
        $creds2 = new Credentials('baz', 'qux', null, time() + 3600);

        $f = static function () use (&$called, $creds1, $creds2): Promise\PromiseInterface {
            $called++;
            return Create::promiseFor($called === 1 ? $creds1 : $creds2);
        };

        $p = CredentialProvider::memoize($f);

        $result = $p()->wait();
        $this->assertSame($creds2, $result);
        $this->assertSame(2, $called);

        $result = $p()->wait();
        $this->assertSame($creds2, $result);
        $this->assertSame(2, $called);
    }

    public function testMemoizeDoesNotRefreshWhenExpiringAfterThreshold(): void
    {
        $called = 0;
        $creds = new Credentials('foo', 'bar', null, time() + 90);

        $f = static function () use (&$called, $creds): Promise\PromiseInterface {
            $called++;
            return Create::promiseFor($creds);
        };

        $p = CredentialProvider::memoize($f);

        $result = $p()->wait();
        $this->assertSame($creds, $result);
        $this->assertSame(1, $called);

        $result = $p()->wait();
        $this->assertSame($creds, $result);
        $this->assertSame(1, $called);
    }

    public function testMemoizeRefreshesExpiredCredentials(): void
    {
        $called = 0;
        $creds1 = new Credentials('foo', 'bar', null, time() - 10);
        $creds2 = new Credentials('baz', 'qux', null, time() + 3600);

        $f = static function () use (&$called, $creds1, $creds2): Promise\PromiseInterface {
            $called++;
            return Create::promiseFor($called === 1 ? $creds1 : $creds2);
        };

        $p = CredentialProvider::memoize($f);

        $result = $p()->wait();
        $this->assertSame($creds2, $result);
        $this->assertSame(2, $called);
    }

    public function testMemoizeRefreshesAtExactThreshold(): void
    {
        $called = 0;
        $creds1 = new Credentials('foo', 'bar', null, time() + 60);
        $creds2 = new Credentials('baz', 'qux', null, time() + 3600);

        $f = static function () use (&$called, $creds1, $creds2): Promise\PromiseInterface {
            $called++;
            return Create::promiseFor($called === 1 ? $creds1 : $creds2);
        };

        $p = CredentialProvider::memoize($f);

        $result = $p()->wait();
        $this->assertSame($creds2, $result);
        $this->assertSame(2, $called);
    }

    public function testCallsDefaultsCreds(): void
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

    public function testCachesCacheableInDefaultChain(): void
    {
        $this->createAwsHome();
        
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
            if ($provider === 'ecs') {
                putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/latest');
            }
            $cache = new LruArrayCache();
            $cache->set('aws_cached_' . $provider . '_credentials', $credsForCache);
            $credentials = call_user_func(CredentialProvider::defaultProvider([
                'credentials' => $cache,
            ]))->wait();

            $this->assertSame($credsForCache->getAccessKeyId(), $credentials->getAccessKeyId());
            $this->assertSame($credsForCache->getSecretKey(), $credentials->getSecretKey());

            // reset ECS env between iterations to avoid bleeding state
            putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=');
            unset($_SERVER['AWS_CONTAINER_CREDENTIALS_RELATIVE_URI']);
        }
    }

    public function testCachesAsPartOfDefaultChain(): void
    {
        $this->createAwsHome();
        
        $instanceCredential = new Credentials(
            'instance_foo',
            'instance_bar',
            'instance_baz',
            PHP_INT_MAX
        );
        $ecsCredential = new Credentials(
            'ecs_foo',
            'ecs_bar',
            'ecs_baz',
            PHP_INT_MAX
        );

        $cache = new LruArrayCache;
        $cache->set('aws_cached_instance_credentials', $instanceCredential);
        $cache->set('aws_cached_ecs_credentials', $ecsCredential);

        $credentials = call_user_func(CredentialProvider::defaultProvider([
            'credentials' => $cache,
        ]))->wait();
        $this->assertSame(
            $instanceCredential->getAccessKeyId(),
            $credentials->getAccessKeyId()
        );
        $this->assertSame(
            $instanceCredential->getSecretKey(),
            $credentials->getSecretKey()
        );

        // Switch to ECS path (relative URI)
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/latest');

        $credentials = call_user_func(CredentialProvider::defaultProvider([
            'credentials' => $cache,
        ]))->wait();

        $this->assertSame(
            $ecsCredential->getAccessKeyId(),
            $credentials->getAccessKeyId()
        );
        $this->assertSame(
            $ecsCredential->getSecretKey(),
            $credentials->getSecretKey()
        );

        // Full URI + auth token path
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI='); // clear relative
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://localhost/test/metadata');
        putenv('AWS_CONTAINER_AUTHORIZATION_TOKEN=1AAA+BBBBB=');

        $credentials = call_user_func(CredentialProvider::defaultProvider([
            'credentials' => $cache,
        ]))->wait();

        $this->assertSame(
            $ecsCredential->getAccessKeyId(),
            $credentials->getAccessKeyId()
        );
        $this->assertSame($ecsCredential->getSecretKey(), $credentials->getSecretKey());
    }

    public function testChainsCredentials(): void
    {
        $awsDir = $this->createTempDir('aws_') . '/.aws';
        mkdir($awsDir, 0777, true);

        $ini = "[default]\naws_access_key_id = foo\naws_secret_access_key = baz\n[foo]";
        file_put_contents($awsDir . '/credentials', $ini);
        putenv('HOME=' . dirname($awsDir));

        $a = CredentialProvider::ini('foo');
        $b = CredentialProvider::ini();
        $c = function (): void { $this->fail('Should not have called'); };

        $provider = CredentialProvider::chain($a, $b, $c);
        $creds = $provider()->wait();

        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('baz', $creds->getSecretKey());
    }

    public function testProcessCredentialDefaultChain(): void
    {
        $awsDir = $this->createTempDir('aws_') . '/.aws';
        mkdir($awsDir, 0777, true);

        $credentialsIni = <<<EOT
[default]
credential_process = echo '{"AccessKeyId":"credentialsFoo","SecretAccessKey":"bar", "Version":1}'
EOT;
        file_put_contents($awsDir . '/credentials', $credentialsIni);
        putenv('HOME=' . dirname($awsDir));

        $provider = CredentialProvider::defaultProvider();
        $creds = $provider()->wait();

        $this->assertSame('credentialsFoo', $creds->getAccessKeyId());
    }

    public function testProcessCredentialConfigDefaultChain(): void
    {
        $awsDir = $this->createTempDir('aws_') . '/.aws';
        mkdir($awsDir, 0777, true);

        $configIni = <<<EOT
[profile default]
credential_process = echo '{"AccessKeyId":"configFoo","SecretAccessKey":"baz", "Version":1}'
EOT;

        file_put_contents($awsDir . '/config', $configIni);
        putenv('HOME=' . dirname($awsDir));

        $provider = CredentialProvider::defaultProvider();
        $creds = $provider()->wait();

        $this->assertSame('configFoo', $creds->getAccessKeyId());
    }

    /**
     * @dataProvider shouldUseEcsProvider
     */
    public function testShouldUseEcs(
        string $relative,
        string $serverRelative,
        string $full,
        string $serverFull,
        bool $expected
    ): void {
        // Start from a blank slate for these specific envs
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=');
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=');
        unset(
            $_SERVER['AWS_CONTAINER_CREDENTIALS_RELATIVE_URI'],
            $_SERVER['AWS_CONTAINER_CREDENTIALS_FULL_URI']
        );

        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI' . $relative);
        $_SERVER['AWS_CONTAINER_CREDENTIALS_RELATIVE_URI'] = $serverRelative;

        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI' . $full);
        $_SERVER['AWS_CONTAINER_CREDENTIALS_FULL_URI'] = $serverFull;

        $result = CredentialProvider::shouldUseEcs();
        $this->assertEquals($expected, $result);
    }

    public function shouldUseEcsProvider(): array
    {
        return [
            ['=foo', '', '', '', true],
            ['', 'foo', '', '', true],
            ['', '', '=bar', '', true],
            ['', '', '', 'bar', true],
            ['', '', '', '', false],
        ];
    }

    public function testCredentialsSourceFromStatic(): void
    {
        $credentials = new Credentials('foo', 'foo');

        $this->assertEquals(
            CredentialSources::STATIC,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromEnv(): void
    {
        putenv('AWS_ACCESS_KEY_ID=foo');
        putenv('AWS_SECRET_ACCESS_KEY=bazz');

        $credentialsProvider = CredentialProvider::env();
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::ENVIRONMENT,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromStsWebIdToken(): void
    {
        $home = $this->createTempDir('home_');
        $awsDir = $home . '/.aws';
        mkdir($awsDir, 0777, true);
        putenv('HOME=' . $home);

        $tokenPath = $awsDir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');

        $roleArn = 'arn:aws:iam::123456789012:role/role_name';
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => time() + 1000
            ],
            'AssumedRoleUser' => [
                'AssumedRoleId' => 'test_user_621903f1f21f5.01530789',
                'Arn' => $roleArn
            ]
        ];

        $stsClient = new StsClient([
            'region' => 'us-east-1',
            'credentials' => false,
            'handler' => function ($command, $request) use ($result) {
                return Create::promiseFor(new Result($result));
            }
        ]);

        $credentialsProvider = new AssumeRoleWithWebIdentityCredentialProvider([
            'RoleArn' => $roleArn,
            'WebIdentityTokenFile' => $tokenPath,
            'client' => $stsClient
        ]);
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::STS_WEB_ID_TOKEN,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromEnvStsWebIdToken(): void
    {
        $home = $this->createTempDir('home_');
        $awsDir = $home . '/.aws';
        mkdir($awsDir, 0777, true);
        putenv('HOME=' . $home);

        $tokenPath = $awsDir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');
        $roleArn = 'arn:aws:iam::123456789012:role/role_name';

        putenv(CredentialProvider::ENV_ARN . "={$roleArn}");
        putenv(CredentialProvider::ENV_TOKEN_FILE . "={$tokenPath}");
        putenv(CredentialProvider::ENV_ROLE_SESSION_NAME . "=TestSession");

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => time() + 1000
            ],
            'AssumedRoleUser' => [
                'AssumedRoleId' => 'test_user_621903f1f21f5.01530789',
                'Arn' => $roleArn
            ]
        ];

        $stsClient = new StsClient([
            'region' => 'us-east-1',
            'credentials' => false,
            'handler' => function ($command, $request) use ($result) {
                return Create::promiseFor(new Result($result));
            }
        ]);

        $credentialsProvider = CredentialProvider::assumeRoleWithWebIdentityCredentialProvider([
            'stsClient' => $stsClient
        ]);
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::ENVIRONMENT_STS_WEB_ID_TOKEN,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromProfileStsWebIdToken(): void
    {
        $home = $this->createTempDir('home_');
        $awsDir = $home . '/.aws';
        mkdir($awsDir, 0777, true);
        putenv('HOME=' . $home);

        $tokenPath = $awsDir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');
        $roleArn = 'arn:aws:iam::123456789012:role/role_name';
        $profile = "test-profile";
        $configPath = $awsDir . '/my-config';
        $configData = <<<EOF
[$profile]
web_identity_token_file={$tokenPath}
role_arn=$roleArn
role_session_name=TestSession
EOF;
        file_put_contents($configPath, $configData);
        putenv(CredentialProvider::ENV_PROFILE . "=$profile");

        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => time() + 1000
            ],
            'AssumedRoleUser' => [
                'AssumedRoleId' => 'test_user_621903f1f21f5.01530789',
                'Arn' => $roleArn
            ]
        ];

        $stsClient = new StsClient([
            'region' => 'us-east-1',
            'credentials' => false,
            'handler' => function ($command, $request) use ($result) {
                return Create::promiseFor(new Result($result));
            }
        ]);

        $credentialsProvider = CredentialProvider::assumeRoleWithWebIdentityCredentialProvider([
            'stsClient' => $stsClient,
            'filename' => $configPath
        ]);
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::PROFILE_STS_WEB_ID_TOKEN,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromStsAssumeRole(): void
    {
        $stsClient = new StsClient([
            'region' => 'us-east-2',
            'credentials' => false,
            'handler' => function ($command, $request) {
                return Create::promiseFor(
                    new Result([
                        'Credentials' => [
                            'AccessKeyId'     => 'foo',
                            'SecretAccessKey' => 'foo',
                            'SessionToken'    => 'token',
                            'Expiration'      => DateTimeResult::fromEpoch(time() + 600),
                        ],
                        'AssumedRoleUser' => [
                            'Arn'           => 'arn:aws:sts::123456789012:assumed-role/role-name/foo_session',
                            'AssumedRoleId' => 'AROAAAAAAA:foo_session',
                        ],
                    ])
                );
            },
        ]);

        $credentialsProvider = CredentialProvider::assumeRole([
            'assume_role_params' => [
                'RoleArn'         => 'arn:aws:iam::account-id:role/role-name',
                'RoleSessionName' => 'foo_session',
            ],
            'client' => $stsClient,
        ]);

        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::STS_ASSUME_ROLE,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromProfile(): void
    {
        $home = $this->createTempDir('home_');
        $awsDir = $home . '/.aws';
        mkdir($awsDir, 0777, true);
        putenv('HOME=' . $home);

        $profile = 'test-profile';
        $configPath = $awsDir . '/credentials';
        $configData = <<<EOF
[$profile]
aws_access_key_id=foo
aws_secret_access_key=foo
EOF;
        file_put_contents($configPath, $configData);

        $credentialsProvider = CredentialProvider::ini($profile, $configPath);
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(CredentialSources::PROFILE, $credentials->getSource());
    }

    public function testCredentialsSourceFromIMDS(): void
    {
        $imdsHandler = static function ($request) {
            $path = $request->getUri()->getPath();
            if ($path === '/latest/api/token') {
                return Create::promiseFor(
                    new Response(200, [], Utils::streamFor(''))
                );
            } elseif ($path === '/latest/meta-data/iam/security-credentials/'
                || $path === '/latest/meta-data/iam/security-credentials-extended/'
            ) {
                return Create::promiseFor(
                    new Response(200, [], Utils::streamFor('testProfile'))
                );
            } elseif ($path === '/latest/meta-data/iam/security-credentials/testProfile'
                || $path === '/latest/meta-data/iam/security-credentials-extended/testProfile'
            ) {
                $expiration = time() + 1000;
                return Create::promiseFor(
                    new Response(
                        200,
                        [],
                        Utils::streamFor(
                            <<<EOF
{
    "Code": "Success",
    "AccessKeyId": "foo",
    "SecretAccessKey": "foo",
    "Token": "bazz",
    "Expiration": "@$expiration",
    "AccountId": "123456789012"
}
EOF
                        )
                    )
                );
            }

            throw new \RuntimeException("Unknown request to $path");
        };
        $credentialsProvider = CredentialProvider::instanceProfile([
            'client' => $imdsHandler,
        ]);
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::IMDS,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromECS(): void
    {
        $ecsHandler = static function ($request) {
            $expiration = time() + 1000;
            return Create::promiseFor(
                new Response(
                    200,
                    [],
                    <<<EOF
{
    "AccessKeyId": "foo",
    "SecretAccessKey": "foo",
    "Token": "bazz",
    "Expiration": "@$expiration",
    "AccountId": "123456789012"
}
EOF
                )
            );
        };
        $credentialsProvider = CredentialProvider::ecsCredentials([
            'client' => $ecsHandler,
        ]);
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::ECS,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromProcess(): void
    {
        $home = $this->createTempDir('home_');
        $awsDir = $home . '/.aws';
        mkdir($awsDir, 0777, true);
        putenv('HOME=' . $home);

        $profile = 'test-profile';
        $configData = <<<EOF
[$profile]
credential_process= echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOF;
        $configPath = $awsDir . '/config';
        file_put_contents($configPath, $configData);

        $credentialsProvider = CredentialProvider::process($profile, $configPath);
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::PROFILE_PROCESS,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromSso(): void
    {
        $home = $this->createTempDir('home_');
        $awsDir = $home . '/.aws';
        mkdir($awsDir, 0777, true);
        putenv('HOME=' . $home);

        $expiration = time() + 1000;
        $expirationMilliseconds = $expiration * 1000;
        $ini = <<<EOF
[default]
sso_account_id = 123456789012
sso_session = TestSession
sso_role_name = TestRole

[sso-session TestSession]
sso_start_url = testssosession.url.com
sso_region = us-east-1
EOF;
        $tokenFile = <<<EOF
{
    "startUrl": "https://d-123456789012.awsapps.com/start",
    "region": "us-east-1",
    "accessToken": "token",
    "expiresAt": "2500-12-25T21:30:00Z"
}
EOF;
        $configPath = $awsDir . '/config';
        file_put_contents($configPath, $ini);

        $tokenLocation = SsoTokenProvider::getTokenLocation('TestSession');
        if (!is_dir(dirname($tokenLocation))) {
            mkdir(dirname($tokenLocation), 0777, true);
        }
        file_put_contents($tokenLocation, $tokenFile);

        $result = [
            'roleCredentials' => [
                'accessKeyId'     => 'Foo',
                'secretAccessKey' => 'Bazz',
                'sessionToken'    => null,
                'expiration'      => $expirationMilliseconds
            ],
        ];
        $ssoClient = new SSOClient([
            'region' => 'us-east-1',
            'credentials' => false,
            'handler' => function ($command, $request) use ($result) {
                return Create::promiseFor(new Result($result));
            }
        ]);

        $credentialsProvider = CredentialProvider::sso('default', $configPath, [
            'ssoClient' => $ssoClient
        ]);
        $credentials = $credentialsProvider()->wait();
        $this->assertEquals($credentials->getExpiration(), $expiration);

        $this->assertEquals(
            CredentialSources::PROFILE_SSO,
            $credentials->getSource()
        );
    }

    public function testCredentialsSourceFromSsoLegacy(): void
    {
        $home = $this->createTempDir('home_');
        $awsDir = $home . '/.aws';
        mkdir($awsDir, 0777, true);
        putenv('HOME=' . $home);

        $expiration = time() + 1000;
        $ini = <<<EOF
[default]
sso_start_url = testssosession.url.com
sso_region = us-east-1
sso_account_id = 123456789012
sso_role_name = TestSession
EOF;
        $tokenFile = <<<EOF
{
    "startUrl": "https://d-123456789012.awsapps.com/start",
    "region": "us-east-1",
    "accessToken": "token",
    "expiresAt": "2500-12-25T21:30:00Z"
}
EOF;
        $configPath = $awsDir . '/config';
        file_put_contents($configPath, $ini);

        $tokenFileDir = $awsDir . "/sso/cache/";
        if (!is_dir($tokenFileDir)) {
            mkdir($tokenFileDir, 0777, true);
        }
        $tokenFileName = $tokenFileDir . sha1("testssosession.url.com") . '.json';
        file_put_contents($tokenFileName, $tokenFile);

        $result = [
            'roleCredentials' => [
                'accessKeyId'     => 'Foo',
                'secretAccessKey' => 'Bazz',
                'sessionToken'    => null,
                'expiration'      => $expiration
            ],
        ];
        $ssoClient = new SSOClient([
            'region' => 'us-east-1',
            'credentials' => false,
            'handler' => function ($command, $request) use ($result) {
                return Create::promiseFor(new Result($result));
            }
        ]);

        $credentialsProvider = CredentialProvider::sso('default', $configPath, [
            'ssoClient' => $ssoClient
        ]);
        $credentials = $credentialsProvider()->wait();

        $this->assertEquals(
            CredentialSources::PROFILE_SSO_LEGACY,
            $credentials->getSource()
        );
    }

    public function testLoginResolvesRegionFromConfig(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Failed to load cached credentials');
        
        $awsDir = $this->createAwsHome();

        $ini = <<<EOT
[profile testProfile]
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        $provider = CredentialProvider::login(
            'testProfile',
            ['region' => 'us-west-2']
        );
        
        $this->assertIsCallable($provider);

        $provider()->wait();
    }

    public function testLoginResolvesRegionFromEnv(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Failed to load cached credentials');
        
        $awsDir = $this->createAwsHome();

        $ini = <<<EOT
[profile testProfile]
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        putenv(CredentialProvider::ENV_REGION . '=eu-west-1');
        
        $provider = CredentialProvider::login('testProfile');
        $this->assertIsCallable($provider);

        $provider()->wait();
    }

    public function testLogintResolvesRegionFromProfile(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Failed to load cached credentials');

        $awsDir = $this->createAwsHome();
        $ini = <<<EOT
[profile testProfile]
region = ap-south-1
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);

        $provider = CredentialProvider::login('testProfile');
        $this->assertIsCallable($provider);

        $provider()->wait();
    }

    public function testLoginFailsWithMissingRegion(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Unable to determine region');
        
        $awsDir = $this->createAwsHome();
        
        // Create a profile without region
        $ini = <<<EOT
[profile testProfile]
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        $provider = CredentialProvider::login('testProfile');

        $provider()->wait();
    }

    public function testLoginUsesDefaultProfileWhenNotSpecified(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('default');
        
        $awsDir = $this->createAwsHome();

        file_put_contents($awsDir . '/config', '');
        
        // Test with no profile argument - should use 'default'
        $provider = CredentialProvider::login(
            null,
            ['region' => 'us-east-1']
        );
        
        $this->assertIsCallable($provider);

        $provider()->wait();
    }

    public function testLoginUsesProfileFromEnvWhenNotSpecified(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('envProfile');
        
        $awsDir = $this->createAwsHome();

        file_put_contents($awsDir . '/config', '');
        
        putenv(CredentialProvider::ENV_PROFILE . '=envProfile');
        
        $provider = CredentialProvider::login(
            null,
            ['region' => 'us-east-1']
        );
        
        $this->assertIsCallable($provider);

        $provider()->wait();
    }

    public function testLoginHandlesClientCreationFailure(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Unable to determine region');
        
        $awsDir = $this->createAwsHome();

        $ini = <<<EOT
[profile testProfile]
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        // Empty region should trigger "No region configured" error
        $provider = CredentialProvider::login(
            'testProfile',
            ['region' => '']
        );

        $provider()->wait();
    }

    public function testLoginHandlesInvalidProfileName(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('nonExistentProfile');
        
        $awsDir = $this->createAwsHome();
        
        // Create empty config file
        file_put_contents($awsDir . '/config', '');
        
        $provider = CredentialProvider::login(
            'nonExistentProfile',
            ['region' => 'us-east-1']
        );

        $provider()->wait();
    }

    public function testLoginSuccessfullyRetrievesCredentialsFromCache(): void
    {
        $awsDir = $this->createAwsHome();
        
        // Create config with login_session
        $ini = <<<EOT
[default]
region = us-east-1
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        // Create cache directory and token file
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim('arn:aws:iam::123456789012:user/TestUser'));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        $expiration = (new DateTimeResult('+1 hour'))->format('Y-m-d\TH:i:s\Z');
        $tokenData = json_encode([
            'accessToken' => [
                'accessKeyId' => 'testKey',
                'secretAccessKey' => 'testSecret',
                'sessionToken' => 'testToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ],
            'tokenType' => 'aws_sigv4',
            'refreshToken' => 'testRefresh',
            'idToken' => 'testId',
            'clientId' => 'arn:aws:signin:::devtools/same-device',
            'dpopKey' => '-----BEGIN EC PRIVATE KEY-----
MHcCAQEEIFDZHUzOG1Pzq+6F0mjMlOSp1syN9LRPBuHMoCFXTcXhoAoGCCqGSM49
AwEHoUQDQgAE9qhj+KtcdHj1kVgwxWWWw++tqoh7H7UHs7oXh8jBbgF47rrYGC+t
djiIaHK3dBvvdE7MGj5HsepzLm3Kj91bqA==
-----END EC PRIVATE KEY-----'
        ]);
        
        file_put_contents($tokenFile, $tokenData);
        
        $provider = CredentialProvider::login('default', ['region' => 'us-west-2']);
        $credentials = $provider()->wait();
        
        $this->assertEquals(CredentialSources::PROFILE_LOGIN, $credentials->getSource());
        $this->assertEquals('testKey', $credentials->getAccessKeyId());
        $this->assertEquals('testSecret', $credentials->getSecretKey());
        $this->assertEquals('testToken', $credentials->getSecurityToken());
        $this->assertEquals('123456789012', $credentials->getAccountId());
    }

    public function testLoginAddedToDefaultChain(): void
    {
        $awsDir = $this->createAwsHome();
        
        // Create config with login_session
        $ini = <<<EOT
[default]
region = us-east-1
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        // Create cache directory and token file
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim('arn:aws:iam::123456789012:user/TestUser'));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        $expiration = (new DateTimeResult('+1 hour'))->format('Y-m-d\TH:i:s\Z');
        $tokenData = json_encode([
            'accessToken' => [
                'accessKeyId' => 'loginKey',
                'secretAccessKey' => 'loginSecret',
                'sessionToken' => 'loginToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ],
            'tokenType' => 'aws_sigv4',
            'refreshToken' => 'testRefresh',
            'idToken' => 'testId',
            'clientId' => 'arn:aws:signin:::devtools/same-device',
            'dpopKey' => '-----BEGIN EC PRIVATE KEY-----
MHcCAQEEIFDZHUzOG1Pzq+6F0mjMlOSp1syN9LRPBuHMoCFXTcXhoAoGCCqGSM49
AwEHoUQDQgAE9qhj+KtcdHj1kVgwxWWWw++tqoh7H7UHs7oXh8jBbgF47rrYGC+t
djiIaHK3dBvvdE7MGj5HsepzLm3Kj91bqA==
-----END EC PRIVATE KEY-----'
        ]);
        
        file_put_contents($tokenFile, $tokenData);
        
        $creds = call_user_func(CredentialProvider::defaultProvider())->wait();

        $this->assertSame('loginKey', $creds->getAccessKeyId());
        $this->assertSame('loginSecret', $creds->getSecretKey());
        $this->assertSame('loginToken', $creds->getSecurityToken());
    }

    public function testLoginUsedFromCacheInDefaultChain(): void
    {
        $this->createAwsHome();
        
        $cache = new LruArrayCache();
        $cachedCreds = new Credentials(
            'cachedLoginKey',
            'cachedLoginSecret',
            'cachedLoginToken',
            PHP_INT_MAX
        );
        $cache->set('aws_cached_login_credentials', $cachedCreds);
        
        $credentials = call_user_func(CredentialProvider::defaultProvider([
            'credentials' => $cache,
        ]))->wait();
        
        $this->assertSame('cachedLoginKey', $credentials->getAccessKeyId());
        $this->assertSame('cachedLoginSecret', $credentials->getSecretKey());
        $this->assertSame('cachedLoginToken', $credentials->getSecurityToken());
    }

    /**
     * @dataProvider loginInvalidCacheProvider
     */
    public function testLoginWithInvalidCache(
        string $cacheContent,
        string $expectedMessage,
        string $testDescription
    ): void {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage($expectedMessage);
        
        $awsDir = $this->createAwsHome();
        
        $ini = <<<EOT
[default]
region = us-east-1
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        // Create cache directory and token file
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim('arn:aws:iam::123456789012:user/TestUser'));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        file_put_contents($tokenFile, $cacheContent);
        
        $provider = CredentialProvider::login('default');
        $provider()->wait();
    }

    public function loginInvalidCacheProvider(): array
    {
        $validDpopKey = '-----BEGIN EC PRIVATE KEY-----
MHcCAQEEIFDZHUzOG1Pzq+6F0mjMlOSp1syN9LRPBuHMoCFXTcXhoAoGCCqGSM49
AwEHoUQDQgAE9qhj+KtcdHj1kVgwxWWWw++tqoh7H7UHs7oXh8jBbgF47rrYGC+t
djiIaHK3dBvvdE7MGj5HsepzLm3Kj91bqA==
-----END EC PRIVATE KEY-----';

        return [
            'invalid JSON' => [
                'not valid json {',
                'Invalid JSON',
                'Cache file contains invalid JSON'
            ],
            'missing refreshToken' => [
                json_encode([
                    'accessToken' => [
                        'accessKeyId' => 'testKey',
                        'secretAccessKey' => 'testSecret',
                        'sessionToken' => 'testToken',
                        'accountId' => '123456789012',
                        'expiresAt' => '2500-01-01T00:00:00Z'
                    ],
                    'tokenType' => 'aws_sigv4',
                    // Missing refreshToken
                    'idToken' => 'testId',
                    'clientId' => 'arn:aws:signin:::devtools/same-device',
                    'dpopKey' => $validDpopKey
                ]),
                'Missing required keys',
                'Cache file missing required refreshToken key'
            ],
            'missing accessKeyId' => [
                json_encode([
                    'accessToken' => [
                        // Missing accessKeyId
                        'secretAccessKey' => 'testSecret',
                        'sessionToken' => 'testToken',
                        'accountId' => '123456789012',
                        'expiresAt' => '2500-01-01T00:00:00Z'
                    ],
                    'tokenType' => 'aws_sigv4',
                    'refreshToken' => 'testRefresh',
                    'idToken' => 'testId',
                    'clientId' => 'arn:aws:signin:::devtools/same-device',
                    'dpopKey' => $validDpopKey
                ]),
                'Missing required keys',
                'Cache file missing required accessKeyId in accessToken'
            ],
            'invalid DPoP key' => [
                json_encode([
                    'accessToken' => [
                        'accessKeyId' => 'testKey',
                        'secretAccessKey' => 'testSecret',
                        'sessionToken' => 'testToken',
                        'accountId' => '123456789012',
                        'expiresAt' => '2500-01-01T00:00:00Z'
                    ],
                    'tokenType' => 'aws_sigv4',
                    'refreshToken' => 'testRefresh',
                    'idToken' => 'testId',
                    'clientId' => 'arn:aws:signin:::devtools/same-device',
                    'dpopKey' => 'invalid key data'
                ]),
                'Failed to load DPoP private key',
                'Cache file contains invalid DPoP private key'
            ],
        ];
    }

    public function testLoginWithProfilePrefix(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Failed to load cached credentials');
        
        $awsDir = $this->createAwsHome();
        
        // Use "profile myprofile" prefix format
        $ini = <<<EOT
[profile myprofile]
region = us-east-1
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        $provider = CredentialProvider::login('myprofile');
        $this->assertIsCallable($provider);
        
        $provider()->wait();
    }

    public function testLoginMemoizes(): void
    {
        $awsDir = $this->createAwsHome();
        
        $ini = <<<EOT
[default]
region = us-east-1
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        // Create cache directory and token file
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim('arn:aws:iam::123456789012:user/TestUser'));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        $expiration = (new DateTimeResult('+1 hour'))->format('Y-m-d\TH:i:s\Z');
        $tokenData = json_encode([
            'accessToken' => [
                'accessKeyId' => 'testKey',
                'secretAccessKey' => 'testSecret',
                'sessionToken' => 'testToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ],
            'tokenType' => 'aws_sigv4',
            'refreshToken' => 'testRefresh',
            'idToken' => 'testId',
            'clientId' => 'arn:aws:signin:::devtools/same-device',
            'dpopKey' => '-----BEGIN EC PRIVATE KEY-----
MHcCAQEEIFDZHUzOG1Pzq+6F0mjMlOSp1syN9LRPBuHMoCFXTcXhoAoGCCqGSM49
AwEHoUQDQgAE9qhj+KtcdHj1kVgwxWWWw++tqoh7H7UHs7oXh8jBbgF47rrYGC+t
djiIaHK3dBvvdE7MGj5HsepzLm3Kj91bqA==
-----END EC PRIVATE KEY-----'
        ]);
        
        file_put_contents($tokenFile, $tokenData);
        
        $called = 0;
        $baseProvider = function () use (&$called) {
            $called++;
            return call_user_func(CredentialProvider::login('default',));
        };
        
        $memoized = CredentialProvider::memoize($baseProvider);
        
        $creds1 = $memoized()->wait();
        $creds2 = $memoized()->wait();
        
        $this->assertSame(1, $called);
        $this->assertSame($creds1->getAccessKeyId(), $creds2->getAccessKeyId());
        $this->assertSame($creds1->getSecretKey(), $creds2->getSecretKey());
    }

    public function testLoginMemoizeCleansUpOnError(): void
    {
        $awsDir = $this->createAwsHome();
        
        $ini = <<<EOT
[default]
region = us-east-1
login_session = arn:aws:iam::123456789012:user/TestUser
EOT;
        file_put_contents($awsDir . '/config', $ini);
        // No cache file, so it will fail
        
        $called = 0;
        $baseProvider = function () use (&$called) {
            $called++;
            return call_user_func(CredentialProvider::login('default'));
        };
        
        $memoized = CredentialProvider::memoize($baseProvider);
        
        $memoized()->wait(false);
        $memoized()->wait(false);
        
        $this->assertSame(2, $called);
    }

    public function testLoginWithMissingConfigFile(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Unable to load configuration file');
        
        $awsDir = $this->createAwsHome();
        // Don't create  config file
        
        $provider = CredentialProvider::login('default', ['region' => 'us-west-2']);
        $provider()->wait();
    }

    public function testLoginWithEmptyLoginSession(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('login_session');
        
        $awsDir = $this->createAwsHome();
        
        $ini = <<<EOT
[default]
region = us-east-1
login_session = 
EOT;
        file_put_contents($awsDir . '/config', $ini);
        
        $provider = CredentialProvider::login('default');
        $provider()->wait();
    }
}
