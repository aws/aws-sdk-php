<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialDaemonProvider;
use Aws\Credentials\CredentialSources;
use Aws\Exception\AwsException;
use Aws\Exception\CredentialDaemonException;
use Aws\Exception\CredentialsException;
use Aws\LruArrayCache;
use Aws\MetricsBuilder;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Sts\StsClient;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(CredentialDaemonProvider::class)]
#[CoversClass(CredentialDaemonException::class)]
class CredentialDaemonProviderTest extends TestCase
{
    private const ENV_VARS = [
        'HOME',
        'AWS_PROFILE',
        'AWS_CONFIG_FILE',
        'AWS_SHARED_CREDENTIALS_FILE',
        'AWS_CREDENTIAL_DAEMON_SOCKET',
        'AWS_ACCESS_KEY_ID',
        'AWS_SECRET_ACCESS_KEY',
        'AWS_SESSION_TOKEN',
        'AWS_ACCOUNT_ID',
        'AWS_ROLE_ARN',
        'AWS_WEB_IDENTITY_TOKEN_FILE',
        'AWS_ROLE_SESSION_NAME',
        'AWS_CONTAINER_CREDENTIALS_RELATIVE_URI',
        'AWS_CONTAINER_CREDENTIALS_FULL_URI',
        'AWS_EC2_METADATA_DISABLED',
        'AWS_SDK_LOAD_NONDEFAULT_CONFIG',
        'AWS_ENDPOINT_URL_STS',
        'AWS_ENDPOINT_URL',
        'AWS_MAX_ATTEMPTS',
        'AWS_REGION',
    ];

    /** @var array<string, string|false> */
    private array $originalEnv = [];

    /** @var array<string, mixed> */
    private array $originalServer = [];

    /** @var list<string> */
    private array $dirs = [];

    /** @var list<resource> */
    private array $processes = [];

    /** @var list<resource> */
    private array $servers = [];

    private string $dir;

    private ?string $requestLog = null;

    /**
     * Tests that fake the platform and need no Unix domain socket, so they
     * also run on Windows.
     */
    private const PORTABLE_TESTS = [
        'testUnsupportedPlatform',
        'testUnsupportedPlatformOnlyForDaemonProfiles',
    ];

    private static function hasUnixSockets(): bool
    {
        return PHP_OS_FAMILY !== 'Windows'
            && in_array('unix', stream_get_transports(), true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        if (!self::hasUnixSockets() && !in_array($this->name(), self::PORTABLE_TESTS, true)) {
            $this->markTestSkipped('The credential daemon needs Unix domain sockets.');
        }
        foreach (self::ENV_VARS as $var) {
            $this->originalEnv[$var] = getenv($var);
            if (array_key_exists($var, $_SERVER)) {
                $this->originalServer[$var] = $_SERVER[$var];
            }
            putenv($var);
            unset($_SERVER[$var], $_ENV[$var]);
        }
        $this->dir = $this->makeDir();
        $this->setEnv('HOME', $this->dir);
        $this->setEnv('AWS_CONFIG_FILE', $this->dir . '/config');
        $this->setEnv('AWS_SHARED_CREDENTIALS_FILE', $this->dir . '/credentials');
        $this->setEnv('AWS_EC2_METADATA_DISABLED', 'true');
        // Never dial a real credential daemon.
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', $this->dir . '/missing.sock');
        file_put_contents($this->dir . '/credentials', '');
    }

    protected function tearDown(): void
    {
        foreach ($this->processes as $process) {
            @proc_terminate($process);
            @proc_close($process);
        }
        foreach ($this->servers as $server) {
            @fclose($server);
        }
        foreach ($this->originalEnv as $var => $value) {
            if ($value === false) {
                putenv($var);
            } else {
                putenv("$var=$value");
            }
            unset($_SERVER[$var]);
            if (array_key_exists($var, $this->originalServer)) {
                $_SERVER[$var] = $this->originalServer[$var];
            }
        }
        foreach (array_reverse($this->dirs) as $dir) {
            $this->deleteDir($dir);
        }
        $this->processes = $this->servers = $this->dirs = [];
        $this->originalEnv = $this->originalServer = [];
        parent::tearDown();
    }

    // ---------------------------------------------------------------------
    // Helpers
    // ---------------------------------------------------------------------

    private function setEnv(string $var, ?string $value): void
    {
        if ($value === null) {
            putenv($var);
            unset($_SERVER[$var]);
        } else {
            putenv("$var=$value");
            $_SERVER[$var] = $value;
        }
    }

    /**
     * Short base dir, because a socket path is limited to 104/108 bytes.
     */
    private function makeDir(): string
    {
        $base = sys_get_temp_dir();
        if (strlen($base) > 40 && self::hasUnixSockets()) {
            $base = '/tmp';
        }
        $dir = $base . '/cd' . bin2hex(random_bytes(4));
        mkdir($dir, 0700, true);
        $this->dirs[] = $dir;

        return $dir;
    }

    private function deleteDir(string $dir): void
    {
        if (!is_dir($dir) || is_link($dir)) {
            return;
        }
        foreach (scandir($dir) as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }
            $path = $dir . '/' . $entry;
            if (is_dir($path) && !is_link($path)) {
                $this->deleteDir($path);
            } else {
                @unlink($path);
            }
        }
        @rmdir($dir);
    }

    private function writeConfig(string $content): string
    {
        $file = $this->dir . '/config';
        file_put_contents($file, $content);

        return $file;
    }

    /**
     * Starts the fake daemon with one step per expected connection and
     * points AWS_CREDENTIAL_DAEMON_SOCKET at it. With $socket, it listens
     * there instead of in a new temporary folder.
     */
    private function startDaemon(
        array $steps,
        bool $setEnv = true,
        ?string $socket = null
    ): string {
        $dir = $this->makeDir();
        $socket = $socket ?? $dir . '/d.sock';
        $scenario = $dir . '/scenario.json';
        $this->requestLog = $dir . '/requests.log';
        file_put_contents($scenario, json_encode($steps));
        touch($this->requestLog);

        $process = proc_open(
            [
                PHP_BINARY,
                __DIR__ . '/fixtures/credential_daemon/fake_credential_daemon.php',
                $socket,
                $scenario,
                $this->requestLog,
            ],
            [0 => ['pipe', 'r'], 1 => ['file', '/dev/null', 'w'], 2 => STDERR],
            $pipes
        );
        $this->assertIsResource($process);
        $this->processes[] = $process;
        $until = microtime(true) + 5;
        while (!file_exists($socket) && microtime(true) < $until) {
            usleep(10000);
        }
        $this->assertFileExists($socket, 'fake credential daemon did not start');
        if ($setEnv) {
            $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', $socket);
        }

        return $socket;
    }

    /**
     * @return list<array>
     */
    private function requests(): array
    {
        $lines = array_filter(explode("\n", (string) file_get_contents($this->requestLog)));

        return array_values(array_map(function ($line) {
            return json_decode($line, true);
        }, $lines));
    }

    private static function expiresAt(int $offset = 3600): string
    {
        return gmdate('Y-m-d\TH:i:s\Z', time() + $offset);
    }

    private static function successReply(array $material = [], array $result = []): string
    {
        return json_encode([
            'jsonrpc' => '2.0',
            'id' => 1,
            'result' => $result + [
                'credential' => 'dev',
                'material' => $material + [
                    'type' => 'session_credentials',
                    'access_key_id' => 'ASIADAEMON',
                    'secret_access_key' => 'secret',
                    'session_token' => 'token',
                ],
                'expires_at' => self::expiresAt(),
            ],
        ]);
    }

    private static function errorReply(?string $code, string $message = 'nope'): string
    {
        $error = ['code' => -32000, 'message' => $message];
        if ($code !== null) {
            $error['data'] = ['code' => $code];
        }

        return json_encode(['jsonrpc' => '2.0', 'id' => 1, 'error' => $error]);
    }

    private function provider(array $config = []): CredentialDaemonProvider
    {
        return new CredentialDaemonProvider($config + ['profile' => 'dev']);
    }

    private function daemonError(callable $fn): CredentialDaemonException
    {
        try {
            $fn();
        } catch (CredentialDaemonException $e) {
            return $e;
        }
        $this->fail('Expected a CredentialDaemonException');
    }

    private function fetchError(
        CredentialDaemonProvider $provider,
        $previous = null
    ): CredentialDaemonException {
        return $this->daemonError(function () use ($provider, $previous) {
            $provider($previous)->wait();
        });
    }

    private function bindSocket(string $path): void
    {
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0700, true);
        }
        $server = stream_socket_server('unix://' . $path, $errno, $errstr);
        $this->assertIsResource($server, $errstr);
        $this->servers[] = $server;
    }

    private const DEV = "[profile dev]\ndaemon_credential = dev\n";

    // ---------------------------------------------------------------------
    // Success
    // ---------------------------------------------------------------------

    public function testAcceptanceScenarioThroughDefaultProvider(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->startDaemon([['reply' => self::successReply()]]);

        $creds = CredentialProvider::defaultProvider()()->wait();

        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
        $this->assertSame('token', $creds->getSecurityToken());
        $this->assertSame(CredentialSources::CREDENTIAL_DAEMON, $creds->getSource());
    }

    public function testReturnsCredentialsAndSendsOneRequest(): void
    {
        $this->writeConfig(self::DEV);
        $expires = '2099-03-04T05:06:07Z';
        $this->startDaemon([[
            'reply' => self::successReply(
                ['account_id' => '123456789012'],
                ['expires_at' => $expires, 'provenance' => ['x' => 1]]
            ),
        ]]);

        $creds = $this->provider()()->wait();

        $this->assertInstanceOf(Credentials::class, $creds);
        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
        $this->assertSame('secret', $creds->getSecretKey());
        $this->assertSame('token', $creds->getSecurityToken());
        $this->assertSame('123456789012', $creds->getAccountId());
        $this->assertSame(gmmktime(5, 6, 7, 3, 4, 2099), $creds->getExpiration());
        $this->assertSame(CredentialSources::CREDENTIAL_DAEMON, $creds->getSource());

        $requests = $this->requests();
        $this->assertCount(1, $requests);
        $this->assertSame('2.0', $requests[0]['jsonrpc']);
        $this->assertSame('credential/get', $requests[0]['method']);
        $this->assertIsInt($requests[0]['id']);
        $this->assertSame(['credential' => 'dev'], $requests[0]['params']);
    }

    public function testEmptyOrMissingOptionalFieldsAreNull(): void
    {
        $this->writeConfig(self::DEV . "aws_account_id = 999999999999\n");
        $this->startDaemon([['reply' => self::successReply(['session_token' => ''])]]);

        $creds = $this->provider()()->wait();

        $this->assertNull($creds->getSecurityToken());
        // No fallback to the profile's aws_account_id.
        $this->assertNull($creds->getAccountId());
    }

    public function testDefaultSectionResolvesAndProfilePrefixWins(): void
    {
        $this->writeConfig(
            "[default]\ndaemon_credential = plain\n"
            . "[profile default]\ndaemon_credential = prefixed\n"
        );
        $this->startDaemon([['reply' => self::successReply()]]);

        $this->provider(['profile' => 'default'])()->wait();

        $this->assertSame('prefixed', $this->requests()[0]['params']['credential']);
    }

    public function testRereadsConfigOnEveryCall(): void
    {
        $this->writeConfig("[profile dev]\nregion = us-east-1\n");
        $provider = $this->provider();
        try {
            $provider()->wait();
            $this->fail('Expected a rejection');
        } catch (CredentialsException $e) {
            $this->assertNotInstanceOf(CredentialDaemonException::class, $e);
        }

        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => self::successReply()]]);
        $this->assertSame('ASIADAEMON', $provider()->wait()->getAccessKeyId());
    }

    public function testStaticFactory(): void
    {
        $this->assertInstanceOf(
            CredentialDaemonProvider::class,
            CredentialProvider::credentialDaemon()
        );
    }

    // ---------------------------------------------------------------------
    // SSO rules
    // ---------------------------------------------------------------------

    public function testSsoProfileWithBothKeysSendsThem(): void
    {
        $this->writeConfig(
            self::DEV
            . "sso_start_url = https://example.awsapps.com/start\n"
            . "sso_region = us-east-1\nsso_account_id = 111122223333\n"
            . "sso_role_name = Admin\n"
        );
        $this->startDaemon([['reply' => self::successReply()]]);

        $this->provider()()->wait();

        $this->assertSame(
            ['credential' => 'dev', 'account_id' => '111122223333', 'role_name' => 'Admin'],
            $this->requests()[0]['params']
        );
    }

    public static function exactlyOneSsoKeyProvider(): array
    {
        $legacy = "[profile dev]\nsso_start_url = https://example.awsapps.com/start\n"
            . "sso_region = us-east-1\n";
        $session = "[profile dev]\nsso_session = corp\n";
        $sessionSection = "[sso-session corp]\n"
            . "sso_start_url = https://corp.awsapps.com/start\nsso_region = us-east-1\n";

        return [
            'legacy, account only' => [$legacy . "sso_account_id = 111122223333\n", ''],
            'legacy, role only' => [$legacy . "sso_role_name = Admin\n", ''],
            'sso_session, account only' => [
                $session . "sso_account_id = 111122223333\n",
                $sessionSection,
            ],
            'sso_session, role only' => [
                $session . "sso_role_name = Admin\n",
                $sessionSection,
            ],
        ];
    }

    private static function chainError(callable $provider): \Throwable
    {
        try {
            $provider()->wait();
        } catch (\Throwable $e) {
            return $e;
        }
        self::fail('Expected a rejection');
    }

    #[DataProvider('exactlyOneSsoKeyProvider')]
    public function testSsoProfileWithExactlyOneKeyGivesSsoError(
        string $profile,
        string $rest
    ): void {
        $this->setEnv('AWS_PROFILE', 'dev');
        $role = "[profile admin]\nrole_arn = arn:aws:iam::123456789012:role/r\n"
            . "source_profile = dev\n";
        $file = $this->writeConfig($profile . $rest . $role);
        $ssoError = self::chainError(CredentialProvider::sso('profile dev', $file));
        $chainError = self::chainError(CredentialProvider::defaultProvider());

        $process = $this->makeDir() . '/process.sh';
        file_put_contents($process, "#!/bin/sh\necho '{\"Version\":1,"
            . "\"AccessKeyId\":\"AKIDPROCESS\",\"SecretAccessKey\":\"s\"}'\n");
        chmod($process, 0700);
        $this->writeConfig($profile . "daemon_credential = dev\n"
            . "aws_access_key_id = AKIDPLAIN\naws_secret_access_key = s\n"
            . "credential_process = {$process}\n" . $rest . $role);
        file_put_contents($this->dir . '/credentials',
            "[dev]\naws_access_key_id = AKIDCREDENTIALSFILE\naws_secret_access_key = s\n");
        $this->startDaemon([['reply' => self::successReply()]]);

        // The SSO provider's own error, which doesn't stop the chain.
        foreach ([
            $this->provider(),
            CredentialProvider::ini('profile dev', $file),
            CredentialProvider::ini('profile admin', $file),
        ] as $provider) {
            $e = self::chainError($provider);
            $this->assertNotInstanceOf(CredentialDaemonException::class, $e);
            $this->assertSame(get_class($ssoError), get_class($e));
            $this->assertSame($ssoError->getMessage(), $e->getMessage());
        }
        // The chain ends as it does for the profile without
        // `daemon_credential`: no other credential setting of the profile
        // is used.
        $e = self::chainError(CredentialProvider::defaultProvider());
        $this->assertSame(get_class($chainError), get_class($e));
        $this->assertSame($chainError->getMessage(), $e->getMessage());
        foreach ([
            CredentialProvider::ini('dev'),
            CredentialProvider::process('profile dev', $file),
            CredentialProvider::login('dev'),
        ] as $provider) {
            $e = self::chainError($provider);
            $this->assertNotInstanceOf(CredentialDaemonException::class, $e);
        }
        $this->assertSame([], $this->requests());
    }

    public function testSsoProfileWithNeitherKeyIgnoresDaemonCredential(): void
    {
        $this->writeConfig(
            "[profile dev]\nsso_session = s\ndaemon_credential = dev\nrole_arn = x\n"
            . "[sso-session s]\nsso_start_url = https://example.awsapps.com/start\n"
            . "sso_region = us-east-1\n"
        );
        $this->startDaemon([['reply' => self::successReply()]]);

        try {
            $this->provider()()->wait();
            $this->fail('Expected a rejection');
        } catch (CredentialsException $e) {
            $this->assertNotInstanceOf(CredentialDaemonException::class, $e);
        }
        $this->assertFalse(CredentialDaemonProvider::profileUsesDaemon('dev'));
        $this->assertSame([], $this->requests());
    }

    // ---------------------------------------------------------------------
    // Profile rules
    // ---------------------------------------------------------------------

    public function testDaemonProfileNeverUsesStaticKeys(): void
    {
        $this->writeConfig(
            self::DEV . "aws_access_key_id = AKIDSTATIC\naws_secret_access_key = s\n"
        );
        file_put_contents(
            $this->dir . '/credentials',
            "[dev]\naws_access_key_id = AKIDCREDS\naws_secret_access_key = s\n"
        );
        $this->setEnv('AWS_PROFILE', 'dev');

        $e = $this->daemonError(function () {
            CredentialProvider::defaultProvider()()->wait();
        });

        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString($this->dir . '/missing.sock', $e->getMessage());
    }

    public function testDaemonProfileWithRoleArnIsInvalid(): void
    {
        $this->writeConfig(self::DEV . "role_arn = arn:aws:iam::123456789012:role/r\n");
        $this->startDaemon([['reply' => self::successReply()]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::INVALID_CONFIG, $e->getErrorCode());
        $this->assertStringContainsString('role_arn', $e->getMessage());
        $this->assertStringContainsString('profile dev', $e->getMessage());
        $this->assertStringContainsString($this->dir . '/config', $e->getMessage());
        $this->assertStringContainsString('source_profile = dev', $e->getMessage());
        $this->assertSame([], $this->requests());
    }

    public function testWebIdentityProfileBranchDefersToDaemon(): void
    {
        // The web identity branch reads only the HOME files.
        $this->setEnv('AWS_CONFIG_FILE', null);
        $this->setEnv('AWS_SHARED_CREDENTIALS_FILE', null);
        mkdir($this->dir . '/.aws');
        $tokenFile = $this->dir . '/token';
        file_put_contents($tokenFile, 'token');
        file_put_contents(
            $this->dir . '/.aws/config',
            self::DEV . "role_arn = arn:aws:iam::123456789012:role/r\n"
            . "web_identity_token_file = {$tokenFile}\n"
        );
        $this->setEnv('AWS_PROFILE', 'dev');

        $stsCalled = false;
        $sts = new StsClient([
            'region' => 'us-east-1',
            'credentials' => false,
            'handler' => function () use (&$stsCalled) {
                $stsCalled = true;
                return Promise\Create::promiseFor(new Result([]));
            },
        ]);

        $e = $this->daemonError(function () use ($sts) {
            CredentialProvider::defaultProvider(['stsClient' => $sts])()->wait();
        });

        $this->assertSame(CredentialDaemonException::INVALID_CONFIG, $e->getErrorCode());
        $this->assertStringContainsString('two credential sources', $e->getMessage());
        $this->assertStringContainsString('web_identity_token_file', $e->getMessage());
        $this->assertStringContainsString('daemon_credential', $e->getMessage());
        $this->assertStringNotContainsString('source_profile', $e->getMessage());
        $this->assertFalse($stsCalled, 'AssumeRoleWithWebIdentity must not be called');
    }

    public static function webIdentityConflictProvider(): array
    {
        return [
            'web identity only' => ["web_identity_token_file = /tmp/token\n"],
            'role and web identity' => [
                "role_arn = arn:aws:iam::123456789012:role/r\n"
                . "web_identity_token_file = /tmp/token\n",
            ],
        ];
    }

    #[DataProvider('webIdentityConflictProvider')]
    public function testDaemonProfileWithWebIdentityTokenFileIsInvalid(string $lines): void
    {
        $this->writeConfig(self::DEV . $lines);
        $this->startDaemon([['reply' => self::successReply()]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::INVALID_CONFIG, $e->getErrorCode());
        $this->assertStringContainsString('two credential sources', $e->getMessage());
        $this->assertStringContainsString('web_identity_token_file', $e->getMessage());
        $this->assertStringContainsString('daemon_credential', $e->getMessage());
        $this->assertStringContainsString('Remove one', $e->getMessage());
        $this->assertStringContainsString('profile dev', $e->getMessage());
        $this->assertStringNotContainsString('source_profile', $e->getMessage());
        $this->assertSame([], $this->requests());
    }

    public function testDaemonWinsOverCredentialProcess(): void
    {
        $marker = $this->dir . '/process-ran';
        $script = $this->dir . '/process.sh';
        file_put_contents($script, "#!/bin/sh\ntouch '{$marker}'\nexec /bin/false\n");
        chmod($script, 0700);
        $this->writeConfig(self::DEV . "credential_process = {$script}\n");
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->startDaemon([['reply' => self::successReply()]]);

        $creds = CredentialProvider::defaultProvider()()->wait();

        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
        $this->assertSame(CredentialSources::CREDENTIAL_DAEMON, $creds->getSource());
        $this->assertCount(1, $this->requests());
        $this->assertFileDoesNotExist($marker, 'credential_process must not run');
    }

    public function testEnvWebIdentityErrorFallsThroughToDaemonProfile(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->setEnv('AWS_ROLE_ARN', 'arn:aws:iam::123456789012:role/r');
        $this->setEnv('AWS_WEB_IDENTITY_TOKEN_FILE', $this->dir . '/missing-token');
        $this->startDaemon([['reply' => self::successReply()]]);
        $stsCalled = false;
        $sts = new StsClient([
            'region' => 'us-east-1',
            'credentials' => false,
            'handler' => function () use (&$stsCalled) {
                $stsCalled = true;
                return Promise\Create::promiseFor(new Result([]));
            },
        ]);

        $creds = CredentialProvider::defaultProvider(['stsClient' => $sts])()->wait();

        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
        $this->assertSame(CredentialSources::CREDENTIAL_DAEMON, $creds->getSource());
        $this->assertCount(1, $this->requests());
        $this->assertFalse($stsCalled, 'AssumeRoleWithWebIdentity must not be called');
    }

    private const ROLE = "[profile role]\nrole_arn = arn:aws:iam::123456789012:role/r\n"
        . "source_profile = dev\n"
        . "[profile dev]\ndaemon_credential = dev\nregion = us-east-1\n";

    public function testRoleProfileWithDaemonSourceThrowsFromIni(): void
    {
        $file = $this->writeConfig(self::ROLE);

        $this->expectException(CredentialDaemonException::class);
        $this->expectExceptionMessage($this->dir . '/missing.sock');
        CredentialProvider::ini('profile role', $file)()->wait();
    }

    public function testRoleProfileWithDaemonSourceStopsDefaultChain(): void
    {
        $this->writeConfig(self::ROLE);
        $this->setEnv('AWS_PROFILE', 'role');

        $e = $this->daemonError(function () {
            CredentialProvider::defaultProvider()()->wait();
        });

        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
    }

    public function testRoleProfileUsesDaemonSourceCredentials(): void
    {
        $file = $this->writeConfig(self::ROLE);
        $this->startDaemon([['reply' => self::successReply()]]);
        $this->setEnv('AWS_ENDPOINT_URL_STS', 'http://127.0.0.1:1');
        $this->setEnv('AWS_MAX_ATTEMPTS', '1');

        try {
            CredentialProvider::ini('profile role', $file)()->wait();
            $this->fail('Expected the STS call to fail');
        } catch (\Exception $e) {
            $this->assertNotInstanceOf(CredentialDaemonException::class, $e);
        }

        $requests = $this->requests();
        $this->assertCount(1, $requests);
        $this->assertSame('dev', $requests[0]['params']['credential']);
    }

    public function testRoleInCredentialsFileUsesDaemonSourceOnlyInConfig(): void
    {
        file_put_contents($this->dir . '/credentials', "[role]\n"
            . "role_arn = arn:aws:iam::123456789012:role/r\nsource_profile = dev\n");
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'role');

        $e = $this->daemonError(function () {
            CredentialProvider::defaultProvider()()->wait();
        });

        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
    }

    public function testRoleChainFromDaemonSourceKeepsDaemonMetric(): void
    {
        $file = $this->writeConfig(self::DEV
            . "[profile role1]\nrole_arn = arn:aws:iam::123456789012:role/a\n"
            . "source_profile = dev\n"
            . "[profile role2]\nrole_arn = arn:aws:iam::123456789012:role/b\n"
            . "source_profile = role1\n");
        $this->setEnv('AWS_REGION', 'us-east-1');
        $this->startDaemon([['reply' => self::successReply()]]);
        $this->startSts();

        $creds = CredentialProvider::ini('profile role2', $file)()->wait();

        $this->assertSame(
            CredentialSources::STS_ASSUME_ROLE_CREDENTIAL_DAEMON,
            $creds->getSource()
        );
    }

    public function testRoleInCredentialsFileUsesDaemonSourceFromConfig(): void
    {
        file_put_contents($this->dir . '/credentials', "[role]\n"
            . "role_arn = arn:aws:iam::123456789012:role/r\nsource_profile = dev\n"
            . "[dev]\naws_access_key_id = AKIDPLAIN\naws_secret_access_key = s\n");
        $this->writeConfig(self::DEV);

        $e = $this->daemonError(function () {
            CredentialProvider::ini('role')()->wait();
        });

        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
    }

    public function testDaemonCredentialInCredentialsFileIsIgnoredForSource(): void
    {
        file_put_contents($this->dir . '/credentials', "[role]\n"
            . "role_arn = arn:aws:iam::123456789012:role/r\nsource_profile = dev\n"
            . "[dev]\ndaemon_credential = dev\n"
            . "credential_process = echo {}\n");
        $this->writeConfig('');

        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('credential_process does not return valid credentials');
        CredentialProvider::ini('role')()->wait();
    }

    private const ROLE_SSO_SOURCE = "[profile admin]\n"
        . "role_arn = arn:aws:iam::111111111111:role/Admin\n"
        . "source_profile = dev\n"
        . "[profile dev]\ndaemon_credential = dev\nsso_session = corp\n"
        . "sso_account_id = 111111111111\nsso_role_name = ReadOnly\nregion = us-east-1\n";

    public function testRoleProfileWithDaemonSsoSourceThrowsDaemonError(): void
    {
        $file = $this->writeConfig(self::ROLE_SSO_SOURCE);

        $e = $this->daemonError(function () use ($file) {
            CredentialProvider::ini('profile admin', $file)()->wait();
        });

        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
    }

    public function testRoleProfileUsesDaemonSsoSourceCredentials(): void
    {
        $file = $this->writeConfig(self::ROLE_SSO_SOURCE);
        $this->startDaemon([['reply' => self::successReply()]]);
        $this->setEnv('AWS_ENDPOINT_URL_STS', 'http://127.0.0.1:1');
        $this->setEnv('AWS_MAX_ATTEMPTS', '1');

        try {
            CredentialProvider::ini('profile admin', $file)()->wait();
            $this->fail('Expected the STS call to fail');
        } catch (\Exception $e) {
            $this->assertNotInstanceOf(CredentialDaemonException::class, $e);
            $this->assertNotInstanceOf(\Aws\Exception\TokenException::class, $e);
        }

        $requests = $this->requests();
        $this->assertCount(1, $requests);
        $this->assertSame('dev', $requests[0]['params']['credential']);
    }

    public function testDaemonSourceProfileWithRoleArnIsInvalid(): void
    {
        $file = $this->writeConfig(
            self::ROLE . "role_arn = arn:aws:iam::123456789012:role/other\n"
        );

        $this->expectException(CredentialDaemonException::class);
        $this->expectExceptionMessage('role_arn');
        CredentialProvider::ini('profile role', $file)()->wait();
    }

    public function testDirectIniOnDaemonProfileUsesDaemon(): void
    {
        $file = $this->writeConfig(
            self::DEV . "aws_access_key_id = AKIDSTATIC\naws_secret_access_key = s\n"
        );
        $this->startDaemon([['reply' => self::successReply()]]);

        $creds = CredentialProvider::ini('profile dev', $file)()->wait();

        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
    }

    public function testDaemonCredentialInCredentialsFileIsIgnored(): void
    {
        $this->writeConfig("[profile dev]\nregion = us-east-1\n");
        file_put_contents(
            $this->dir . '/credentials',
            "[dev]\ndaemon_credential = dev\naws_access_key_id = AKIDCREDS\n"
            . "aws_secret_access_key = s\n"
        );
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->startDaemon([['reply' => self::successReply()]]);

        $creds = CredentialProvider::defaultProvider()()->wait();

        $this->assertSame('AKIDCREDS', $creds->getAccessKeyId());
        $this->assertSame([], $this->requests());
    }

    public function testEnvCredentialsWinOverDaemonProfile(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->setEnv('AWS_ACCESS_KEY_ID', 'AKIDENV');
        $this->setEnv('AWS_SECRET_ACCESS_KEY', 'secret');
        $this->startDaemon([['reply' => self::successReply()]]);

        $creds = CredentialProvider::defaultProvider()()->wait();

        $this->assertSame('AKIDENV', $creds->getAccessKeyId());
        $this->assertSame([], $this->requests());
    }

    public static function invalidNameProvider(): array
    {
        return [
            'empty' => ["daemon_credential =\n"],
            'leading dot' => ["daemon_credential = .dev\n"],
            'too long' => ['daemon_credential = ' . str_repeat('a', 65) . "\n"],
            'space' => ["daemon_credential = \"a b\"\n"],
            'slash' => ["daemon_credential = a/b\n"],
            'array' => ["daemon_credential[] = x\n"],
        ];
    }

    #[DataProvider('invalidNameProvider')]
    public function testInvalidCredentialNameIsInvalidConfig(string $line): void
    {
        $this->writeConfig("[profile dev]\n" . $line);
        $this->startDaemon([['reply' => self::successReply()]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::INVALID_CONFIG, $e->getErrorCode());
        $this->assertStringContainsString('daemon_credential', $e->getMessage());
        $this->assertStringContainsString('profile dev', $e->getMessage());
        $this->assertSame([], $this->requests());
    }

    public function testLongestValidCredentialName(): void
    {
        $name = '_' . str_repeat('a.', 31) . 'b';
        $this->assertSame(64, strlen($name));
        $this->writeConfig("[profile dev]\ndaemon_credential = {$name}\n");
        $this->startDaemon([['reply' => self::successReply()]]);

        $this->provider()()->wait();

        $this->assertSame($name, $this->requests()[0]['params']['credential']);
    }

    // ---------------------------------------------------------------------
    // Socket location
    // ---------------------------------------------------------------------

    /**
     * `$HOME/.aws/credential-daemon.sock` for the test's HOME.
     */
    private function homeSocket(): string
    {
        return $this->dir . '/.aws/credential-daemon.sock';
    }

    /**
     * Creates the `.aws` folder under HOME and returns the home socket path.
     */
    private function prepareHomeSocket(): string
    {
        $path = $this->homeSocket();
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0700, true);
        }

        return $path;
    }

    private function linuxProvider(array $config = []): CredentialDaemonProvider
    {
        return $this->osProvider('Linux', true, $config);
    }

    /**
     * A provider for the given OS. connect() records the path it was given
     * in $dialed. With $failConnect, it then fails.
     */
    private function osProvider(
        string $os,
        bool $unix = true,
        array $config = [],
        bool $failConnect = false
    ): CredentialDaemonProvider {
        $provider = new class($config) extends CredentialDaemonProvider {
            public $os;
            public $unix;
            public $failConnect = false;
            public $dialed = [];
            protected function getOsFamily(): string
            {
                return $this->os;
            }
            protected function hasUnixTransport(): bool
            {
                return $this->unix;
            }
            protected function connect(string $path, float $timeout, &$errno, &$errstr)
            {
                $this->dialed[] = $path;
                if (!$this->failConnect) {
                    return parent::connect($path, $timeout, $errno, $errstr);
                }
                $errno = 2;
                $errstr = 'No such file or directory';
                return false;
            }
        };
        $provider->os = $os;
        $provider->unix = $unix;
        $provider->failConnect = $failConnect;

        return $provider;
    }

    private function assertNoLocationError(CredentialDaemonException $e): void
    {
        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString('Install the credential daemon', $e->getMessage());
        $this->assertStringContainsString('$HOME/.aws/credential-daemon.sock', $e->getMessage());
        $this->assertStringContainsString(CredentialDaemonProvider::ENV_SOCKET, $e->getMessage());
        $this->assertStringContainsString(CredentialDaemonProvider::DOC_LINK, $e->getMessage());
    }

    public static function ignoredEnvProvider(): array
    {
        return [
            'unset' => [null],
            'empty' => [''],
            'relative' => ['relative/d.sock'],
        ];
    }

    #[DataProvider('ignoredEnvProvider')]
    public function testNoLocationIsNotRunningWithoutDial(?string $value): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', $value);
        $provider = $this->linuxProvider(['profile' => 'dev']);

        $this->assertNull($provider->resolveSocketPath());
        $e = $this->fetchError($provider);

        $this->assertSame([], $provider->dialed);
        $this->assertNoLocationError($e);
    }

    public function testRelativeEnvSocketFallsBackToHomeSocket(): void
    {
        $cwd = getcwd();
        chdir($this->dir);
        try {
            $this->bindSocket($this->dir . '/relative/d.sock');
            $this->bindSocket($this->prepareHomeSocket());
            $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', 'relative/d.sock');
            $this->assertFileExists('relative/d.sock');

            $this->assertSame($this->homeSocket(), $this->linuxProvider()->resolveSocketPath());
        } finally {
            chdir($cwd);
        }
    }

    public function testEmptyEnvSocketFallsBackToHomeSocket(): void
    {
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', '');
        $this->bindSocket($this->prepareHomeSocket());

        $this->assertSame($this->homeSocket(), $this->osProvider('Darwin')->resolveSocketPath());
    }

    public function testEnvSocketWins(): void
    {
        $this->bindSocket($this->prepareHomeSocket());
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', '/some/where.sock');

        $this->assertSame('/some/where.sock', $this->linuxProvider()->resolveSocketPath());
    }

    public function testEnvSocketDialFailureDoesNotFallBack(): void
    {
        // env-file: a regular file at the env path, and a live home socket.
        $this->writeConfig(self::DEV);
        $env = $this->dir . '/e.sock';
        file_put_contents($env, '');
        $this->startDaemon([['reply' => self::successReply()]], false, $this->prepareHomeSocket());
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', $env);
        $provider = $this->linuxProvider(['profile' => 'dev']);

        $e = $this->fetchError($provider);

        $this->assertSame([$env], $provider->dialed);
        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString($env, $e->getMessage());
        $this->assertCount(0, $this->requests());
    }

    public static function homeSocketOsProvider(): array
    {
        return [
            'linux' => ['Linux'],
            'macos' => ['Darwin'],
        ];
    }

    #[DataProvider('homeSocketOsProvider')]
    public function testHomeSocketIsDialed(string $os): void
    {
        // home-socket
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $this->startDaemon([['reply' => self::successReply()]], false, $this->prepareHomeSocket());
        $provider = $this->osProvider($os, true, ['profile' => 'dev']);

        $this->assertSame('ASIADAEMON', $provider()->wait()->getAccessKeyId());
        $this->assertSame([$this->homeSocket()], $provider->dialed);
        $this->assertCount(1, $this->requests());
    }

    public function testHomeSocketIsDialedThroughDefaultProvider(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $this->startDaemon([['reply' => self::successReply()]], false, $this->prepareHomeSocket());

        $creds = CredentialProvider::defaultProvider()()->wait();

        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
        $this->assertSame(CredentialSources::CREDENTIAL_DAEMON, $creds->getSource());
    }

    public function testLinkIsDialedByItsOwnPath(): void
    {
        // link: the OS follows the link, and the provider dials the link.
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $target = $this->startDaemon([['reply' => self::successReply()]], false);
        symlink($target, $this->prepareHomeSocket());
        $provider = $this->linuxProvider(['profile' => 'dev']);

        $this->assertSame($this->homeSocket(), $provider->resolveSocketPath());
        $this->assertSame('ASIADAEMON', $provider()->wait()->getAccessKeyId());
        $this->assertSame([$this->homeSocket()], $provider->dialed);
        $this->assertCount(1, $this->requests());
    }

    public function testStaleLinkIsNotRunningAndNamesTheLink(): void
    {
        // link-stale: the link's target is a socket with no listener.
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $target = $this->makeDir() . '/stale.sock';
        fclose(stream_socket_server('unix://' . $target));
        $this->assertFileExists($target);
        symlink($target, $this->prepareHomeSocket());
        $provider = $this->linuxProvider(['profile' => 'dev']);

        $e = $this->fetchError($provider);

        $this->assertSame([$this->homeSocket()], $provider->dialed);
        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString($this->homeSocket(), $e->getMessage());
        $this->assertStringNotContainsString($target, $e->getMessage());
        $this->assertStringContainsString(CredentialDaemonProvider::DOC_LINK, $e->getMessage());
    }

    public function testDanglingLinkIsDialedAndNotRunning(): void
    {
        // link-dangling: the link points at missing-daemon.sock in a
        // temporary folder, which doesn't exist. The link is the first
        // location that applies, so it is dialed, and the error names the
        // link and its target.
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $target = $this->makeDir() . '/missing-daemon.sock';
        symlink($target, $this->prepareHomeSocket());
        $this->assertFileDoesNotExist($target);
        $provider = $this->linuxProvider(['profile' => 'dev']);

        $this->assertSame($this->homeSocket(), $provider->resolveSocketPath());
        $e = $this->fetchError($provider);

        $this->assertSame([$this->homeSocket()], $provider->dialed);
        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString($this->homeSocket(), $e->getMessage());
        $this->assertStringContainsString($target, $e->getMessage());
        $this->assertStringContainsString(CredentialDaemonProvider::DOC_LINK, $e->getMessage());
    }

    public function testDanglingLinkStopsDefaultChain(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        symlink($this->makeDir() . '/missing-daemon.sock', $this->prepareHomeSocket());

        $e = $this->daemonError(function () {
            CredentialProvider::defaultProvider()()->wait();
        });

        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString('missing-daemon.sock', $e->getMessage());
    }

    public function testRegularFileAtHomePathIsDialed(): void
    {
        // Anything at the path applies, so the dial fails as not running.
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        file_put_contents($this->prepareHomeSocket(), '');
        $provider = $this->linuxProvider(['profile' => 'dev']);

        $this->assertSame($this->homeSocket(), $provider->resolveSocketPath());
        $e = $this->fetchError($provider);

        $this->assertSame([$this->homeSocket()], $provider->dialed);
        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString($this->homeSocket(), $e->getMessage());
    }

    public function testStaleHomeSocketIsDialedAndNotRunning(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $path = $this->prepareHomeSocket();
        fclose(stream_socket_server('unix://' . $path));
        $this->assertFileExists($path);

        $e = $this->fetchError($this->linuxProvider(['profile' => 'dev']));

        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString($path, $e->getMessage());
        $this->assertStringContainsString(CredentialDaemonProvider::DOC_LINK, $e->getMessage());
    }

    public function testHomeDialFailureIsNotRunning(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $this->bindSocket($this->prepareHomeSocket());
        $provider = $this->osProvider('Linux', true, ['profile' => 'dev'], true);

        $e = $this->fetchError($provider);

        $this->assertSame([$this->homeSocket()], $provider->dialed);
        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString('No such file or directory', $e->getMessage());
    }

    public static function unusableHomeProvider(): array
    {
        return [
            'unset' => [null],
            'empty' => [''],
            'relative' => ['.'],
        ];
    }

    #[DataProvider('unusableHomeProvider')]
    public function testHomeSocketSkippedWithoutAbsoluteHome(?string $home): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $this->bindSocket($this->prepareHomeSocket());
        $this->setEnv('HOME', $home);
        $cwd = getcwd();
        chdir($this->dir);
        try {
            $this->assertFileExists('.aws/credential-daemon.sock');
            $provider = $this->linuxProvider(['profile' => 'dev', 'filename' => $this->dir . '/config']);

            $this->assertNull($provider->resolveSocketPath());
            $e = $this->fetchError($provider);

            $this->assertSame([], $provider->dialed);
            $this->assertNoLocationError($e);
        } finally {
            chdir($cwd);
        }
    }

    public function testLookupRunsOnEveryFetch(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_CREDENTIAL_DAEMON_SOCKET', null);
        $provider = $this->linuxProvider(['profile' => 'dev']);

        $this->assertNoLocationError($this->fetchError($provider));

        $this->startDaemon([['reply' => self::successReply()]], false, $this->prepareHomeSocket());

        $this->assertSame('ASIADAEMON', $provider()->wait()->getAccessKeyId());
        $this->assertSame([$this->homeSocket()], $provider->dialed);
    }

    // ---------------------------------------------------------------------
    // Error codes
    // ---------------------------------------------------------------------

    public function testErrorCodes(): void
    {
        $codes = [
            CredentialDaemonException::NOT_RUNNING,
            CredentialDaemonException::REAUTH_REQUIRED,
            CredentialDaemonException::CREDENTIAL_NOT_FOUND,
            CredentialDaemonException::REQUEST_REJECTED,
            CredentialDaemonException::UNSUPPORTED_MATERIAL,
            CredentialDaemonException::PROTOCOL_ERROR,
            CredentialDaemonException::INVALID_CONFIG,
            CredentialDaemonException::UNSUPPORTED_PLATFORM,
        ];
        foreach ($codes as $code) {
            $e = new CredentialDaemonException('m', $code);
            $this->assertInstanceOf(CredentialsException::class, $e);
            $this->assertSame($code, $e->getErrorCode());
        }
    }

    public static function daemonErrorProvider(): array
    {
        return [
            'reauth' => ['REAUTH_REQUIRED', CredentialDaemonException::REAUTH_REQUIRED],
            'not found' => ['CREDENTIAL_NOT_FOUND', CredentialDaemonException::CREDENTIAL_NOT_FOUND],
            'other code' => ['ACCESS_DENIED', CredentialDaemonException::REQUEST_REJECTED],
            'no code' => [null, CredentialDaemonException::REQUEST_REJECTED],
        ];
    }

    #[DataProvider('daemonErrorProvider')]
    public function testDaemonErrors(?string $daemonCode, string $code): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => self::errorReply($daemonCode, 'daemon says no')]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame($code, $e->getErrorCode());
        $this->assertStringContainsString('daemon says no', $e->getMessage());
        $this->assertStringContainsString('dev', $e->getMessage());
        if ($daemonCode === 'ACCESS_DENIED') {
            $this->assertStringContainsString('ACCESS_DENIED', $e->getMessage());
        }
    }

    public function testDaemonMessageControlCharactersAreStripped(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([[
            'reply' => self::errorReply("BAD\x1b\x00CODE", "line1\nline2\x07\x1b[31m\x7fred"),
        ]]);

        $message = $this->fetchError($this->provider())->getMessage();

        $this->assertStringContainsString('line1line2[31mred', $message);
        $this->assertStringContainsString('BADCODE', $message);
        $this->assertDoesNotMatchRegularExpression('/[\x00-\x1f\x7f]/', $message);
    }

    public function testUnsupportedMaterialComesBeforeFieldChecks(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([[
            'reply' => json_encode([
                'jsonrpc' => '2.0',
                'id' => 1,
                'result' => ['material' => ['type' => "x509\x07cert"]],
            ]),
        ]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::UNSUPPORTED_MATERIAL, $e->getErrorCode());
        $this->assertStringContainsString('x509cert', $e->getMessage());
        $this->assertStringContainsString('Update the SDK', $e->getMessage());
    }

    public static function unsupportedPlatformProvider(): array
    {
        return [
            'windows' => ['Windows', true],
            'bsd' => ['BSD', true],
            'no unix transport' => ['Linux', false],
        ];
    }

    #[DataProvider('unsupportedPlatformProvider')]
    public function testUnsupportedPlatform(string $os, bool $unix): void
    {
        // No fake daemon, so this test also runs on Windows.
        $this->writeConfig(self::DEV);
        $provider = $this->osProvider($os, $unix, ['profile' => 'dev']);

        $e = $this->fetchError($provider);

        $this->assertSame(CredentialDaemonException::UNSUPPORTED_PLATFORM, $e->getErrorCode());
        $this->assertStringContainsString(CredentialDaemonProvider::DOC_LINK, $e->getMessage());
        $this->assertSame([], $provider->dialed);
    }

    public function testUnsupportedPlatformOnlyForDaemonProfiles(): void
    {
        $this->writeConfig("[profile dev]\nregion = us-east-1\n");

        try {
            $this->osProvider('Windows', true, ['profile' => 'dev'])()->wait();
            $this->fail('Expected a rejection');
        } catch (CredentialsException $e) {
            $this->assertNotInstanceOf(CredentialDaemonException::class, $e);
        }
    }

    // ---------------------------------------------------------------------
    // Timeouts
    // ---------------------------------------------------------------------

    public function testCallTimeout(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => self::successReply(), 'delay' => 3]]);

        $start = microtime(true);
        $e = $this->fetchError($this->provider(['timeout' => 0.3]));
        $elapsed = microtime(true) - $start;

        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString('call timeout (0.3s)', $e->getMessage());
        $this->assertLessThan(2, $elapsed);
        $this->assertGreaterThanOrEqual(0.29, $elapsed);
    }

    public static function connectTimeoutProvider(): array
    {
        return [
            'connect timeout' => [0.2, 5, 'the connect timeout (0.2s)', 0.2],
            'call timeout shorter' => [1, 0.15, 'the call timeout (0.15s)', 0.15],
        ];
    }

    #[DataProvider('connectTimeoutProvider')]
    public function testConnectTimeout(
        float $connect,
        float $call,
        string $expected,
        float $budget
    ): void {
        $this->writeConfig(self::DEV);
        $provider = new class(['profile' => 'dev', 'connect_timeout' => $connect, 'timeout' => $call])
            extends CredentialDaemonProvider {
            public $budget;
            protected function connect(string $path, float $timeout, &$errno, &$errstr)
            {
                $this->budget = $timeout;
                usleep((int) ($timeout * 1e6));
                $errno = 110;
                $errstr = 'Connection timed out';
                return false;
            }
        };

        $e = $this->fetchError($provider);

        $this->assertEqualsWithDelta($budget, $provider->budget, 0.0001);
        $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        $this->assertStringContainsString($expected, $e->getMessage());
        $this->assertStringContainsString($this->dir . '/missing.sock', $e->getMessage());
    }

    public static function invalidTimeoutProvider(): array
    {
        return [
            'zero' => [['timeout' => 0]],
            'negative' => [['connect_timeout' => -1]],
            'text' => [['timeout' => 'abc']],
            'null' => [['timeout' => null]],
            'bool' => [['connect_timeout' => true]],
        ];
    }

    #[DataProvider('invalidTimeoutProvider')]
    public function testInvalidTimeoutOptions(array $config): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new CredentialDaemonProvider($config);
    }

    public function testDefaultProviderPassesTimeouts(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->startDaemon([['reply' => self::successReply(), 'delay' => 3]]);

        $start = microtime(true);
        $e = $this->daemonError(function () {
            CredentialProvider::defaultProvider(['credential_daemon_timeout' => 0.25])()->wait();
        });

        $this->assertStringContainsString('call timeout (0.25s)', $e->getMessage());
        $this->assertLessThan(2, microtime(true) - $start);

        $this->expectException(\InvalidArgumentException::class);
        CredentialProvider::defaultProvider(['credential_daemon_connect_timeout' => -1]);
    }

    // ---------------------------------------------------------------------
    // Reply size and format
    // ---------------------------------------------------------------------

    private static function paddedReply(int $length): string
    {
        $base = json_decode(self::successReply(), true);
        $base['result']['pad'] = '';
        $json = json_encode($base);

        return str_replace('"pad":""', '"pad":"' . str_repeat('a', $length - strlen($json)) . '"', $json);
    }

    public function testReplyOfExactlyMaxBytesIsAccepted(): void
    {
        $this->writeConfig(self::DEV);
        $reply = self::paddedReply(64000);
        $this->assertSame(64000, strlen($reply));
        $this->startDaemon([['reply' => $reply]]);

        $this->assertSame('ASIADAEMON', $this->provider()()->wait()->getAccessKeyId());
    }

    public function testReplyOverMaxBytesIsProtocolError(): void
    {
        $this->writeConfig(self::DEV);
        $reply = self::paddedReply(64001);
        $this->assertSame(64001, strlen($reply));
        $this->startDaemon([['reply' => $reply]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::PROTOCOL_ERROR, $e->getErrorCode());
        $this->assertStringContainsString('64000', $e->getMessage());
    }

    public function testEndlessReplyStopsAtLimit(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([[
            'reply' => '',
            'repeat' => ['char' => 'a', 'count' => 70000],
            'newline' => false,
            'hold' => 5,
        ]]);

        $start = microtime(true);
        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::PROTOCOL_ERROR, $e->getErrorCode());
        $this->assertLessThan(2, microtime(true) - $start);
    }

    public static function malformedReplyProvider(): array
    {
        $ok = json_decode(self::successReply(), true);
        $without = function (array $path) use ($ok) {
            $copy = $ok;
            $ref = &$copy;
            $last = array_pop($path);
            foreach ($path as $key) {
                $ref = &$ref[$key];
            }
            unset($ref[$last]);
            return json_encode($copy);
        };
        $with = function (array $path, $value) use ($ok) {
            $copy = $ok;
            $ref = &$copy;
            foreach ($path as $key) {
                $ref = &$ref[$key];
            }
            $ref = $value;
            return json_encode($copy);
        };

        return [
            'empty line' => [''],
            'not json' => ['SECRETMARKER {'],
            'array' => ['["SECRETMARKER"]'],
            'string' => ['"SECRETMARKER"'],
            'wrong jsonrpc' => [$with(['jsonrpc'], '1.0')],
            'no jsonrpc' => [$without(['jsonrpc'])],
            'neither result nor error' => [$without(['result'])],
            'null result alone' => ['{"jsonrpc":"2.0","id":1,"result":null}'],
            'null result and null error' => ['{"jsonrpc":"2.0","id":1,"result":null,"error":null}'],
            'both result and error' => [$with(['error'], ['message' => 'SECRETMARKER'])],
            'error not object' => [json_encode(['jsonrpc' => '2.0', 'id' => 1, 'error' => 'SECRETMARKER'])],
            'result not object' => [$with(['result'], 'SECRETMARKER')],
            'material missing' => [$without(['result', 'material'])],
            'type missing' => [$without(['result', 'material', 'type'])],
            'type empty' => [$with(['result', 'material', 'type'], '')],
            'access key missing' => [$without(['result', 'material', 'access_key_id'])],
            'access key empty' => [$with(['result', 'material', 'access_key_id'], '')],
            'secret null' => [$with(['result', 'material', 'secret_access_key'], null)],
            'expires missing' => [$without(['result', 'expires_at'])],
            'expires number' => [$with(['result', 'expires_at'], 4102444800)],
            'expires ten digit fraction' => [$with(['result', 'expires_at'], '2099-01-01T00:00:00.1234567890Z')],
            'expires offset' => [$with(['result', 'expires_at'], '2099-01-01T00:00:00+00:00')],
            'expires bad date' => [$with(['result', 'expires_at'], '2099-02-30T00:00:00Z')],
            'expires bad hour' => [$with(['result', 'expires_at'], '2099-01-01T24:00:00Z')],
            'expires bad minute' => [$with(['result', 'expires_at'], '2099-01-01T00:60:00Z')],
            'expires bad second' => [$with(['result', 'expires_at'], '2099-01-01T00:00:61Z')],
            'expires lowercase' => [$with(['result', 'expires_at'], '2099-01-01t00:00:00z')],
            'too deep' => ['{"jsonrpc":"2.0","result":' . str_repeat('[', 600) . str_repeat(']', 600) . '}'],
        ];
    }

    #[DataProvider('malformedReplyProvider')]
    public function testMalformedReplyIsProtocolError(string $reply): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => $reply]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::PROTOCOL_ERROR, $e->getErrorCode());
        $this->assertStringNotContainsString('SECRETMARKER', $e->getMessage());
        $this->assertStringNotContainsString('ASIADAEMON', $e->getMessage());
    }

    public static function malformedReplyMessageProvider(): array
    {
        $ok = json_decode(self::successReply(), true);
        $empty = $ok;
        $empty['result']['material']['access_key_id'] = '';
        $missing = $ok;
        unset($missing['result']['expires_at']);
        $null = $ok;
        $null['result']['expires_at'] = null;

        return [
            'material empty key' => [json_encode($empty), 'access_key_id'],
            'expiry missing' => [json_encode($missing), 'expires_at'],
            'expiry null' => [json_encode($null), 'expires_at'],
        ];
    }

    #[DataProvider('malformedReplyMessageProvider')]
    public function testMalformedReplyMessageNamesField(string $reply, string $field): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => $reply]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::PROTOCOL_ERROR, $e->getErrorCode());
        $this->assertStringContainsString($field, $e->getMessage());
        $this->assertStringNotContainsString('ASIADAEMON', $e->getMessage());
    }

    public function testReplyIdAndCredentialNameAreNotChecked(): void
    {
        $this->writeConfig(self::DEV);
        $reply = json_decode(self::successReply(), true);
        $reply['id'] = 999;
        $reply['result']['credential'] = 'other';
        $this->startDaemon([['reply' => json_encode($reply)]]);

        $creds = $this->provider()()->wait();

        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
        $this->assertNotSame(999, $this->requests()[0]['id']);
    }

    public static function closedConnectionProvider(): array
    {
        return [
            'eof before newline' => [['reply' => self::successReply(), 'newline' => false]],
            'closed without reply' => [['close_without_reply' => true]],
        ];
    }

    #[DataProvider('closedConnectionProvider')]
    public function testClosedConnectionIsProtocolError(array $step): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([$step]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::PROTOCOL_ERROR, $e->getErrorCode());
        $this->assertStringContainsString('closed', $e->getMessage());
        $this->assertStringNotContainsString('ASIADAEMON', $e->getMessage());
    }

    public function testReadErrorIsNotACleanClose(): void
    {
        if (PHP_OS_FAMILY !== 'Linux') {
            $this->markTestSkipped('Only Linux resets a Unix socket closed with unread data.');
        }
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reset' => true]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::PROTOCOL_ERROR, $e->getErrorCode());
        // PHP raises no warning for a failed socket read, so the message
        // gives the PHP error when there is one and "read failed" otherwise.
        $this->assertMatchesRegularExpression(
            '/closed before a full reply line was received'
            . ' \\((read failed|fread\\(\\): .*Connection reset by peer)\\)\\.$/',
            $e->getMessage()
        );
    }

    public function testWriteErrorIncludesOsError(): void
    {
        $this->writeConfig(self::DEV);
        $provider = new class(['profile' => 'dev']) extends CredentialDaemonProvider {
            protected function connect(string $path, float $timeout, &$errno, &$errstr)
            {
                [$client, $server] = stream_socket_pair(
                    STREAM_PF_UNIX,
                    STREAM_SOCK_STREAM,
                    STREAM_IPPROTO_IP
                );
                fclose($server);
                return $client;
            }
        };

        $e = $this->fetchError($provider);

        $this->assertSame(CredentialDaemonException::PROTOCOL_ERROR, $e->getErrorCode());
        $this->assertStringContainsString(
            'closed while sending the request (fwrite(): ',
            $e->getMessage()
        );
        $this->assertStringContainsString('Broken pipe', $e->getMessage());
    }

    public function testCleanCloseHasNoOsError(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['close_without_reply' => true]]);

        $e = $this->fetchError($this->provider());

        $this->assertStringEndsWith(
            'closed before a full reply line was received.',
            $e->getMessage()
        );
    }

    public static function validExpiryProvider(): array
    {
        return [
            'nine digit fraction' => ['2099-01-02T03:04:05.123456789Z', gmmktime(3, 4, 5, 1, 2, 2099)],
            'one digit fraction' => ['2099-01-02T03:04:05.9Z', gmmktime(3, 4, 5, 1, 2, 2099)],
            'leap second' => ['2099-01-02T03:04:60Z', gmmktime(3, 5, 0, 1, 2, 2099)],
            'leap day' => ['2096-02-29T00:00:00Z', gmmktime(0, 0, 0, 2, 29, 2096)],
        ];
    }

    #[DataProvider('validExpiryProvider')]
    public function testValidExpiry(string $expiresAt, int $expected): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => self::successReply([], ['expires_at' => $expiresAt])]]);

        $this->assertSame($expected, $this->provider()()->wait()->getExpiration());
    }

    public function testBytesAfterNewlineAreIgnored(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => self::successReply() . "\ngarbage"]]);

        $this->assertSame('ASIADAEMON', $this->provider()()->wait()->getAccessKeyId());
    }

    // ---------------------------------------------------------------------
    // Refresh
    // ---------------------------------------------------------------------

    private static function previous(int $expiresIn): Credentials
    {
        return new Credentials(
            'ASIAPREVIOUS',
            's',
            't',
            time() + $expiresIn,
            null,
            CredentialSources::CREDENTIAL_DAEMON
        );
    }

    public function testNullResultWithErrorIsMappedAsError(): void
    {
        $this->writeConfig(self::DEV);
        $reply = json_decode(self::errorReply('REAUTH_REQUIRED'), true);
        $reply['result'] = null;
        $this->startDaemon([['reply' => json_encode($reply)]]);

        $e = $this->fetchError($this->provider());

        $this->assertSame(CredentialDaemonException::REAUTH_REQUIRED, $e->getErrorCode());
    }

    public function testNullErrorWithResultReturnsCredentials(): void
    {
        $this->writeConfig(self::DEV);
        $reply = json_decode(self::successReply(), true);
        $reply['error'] = null;
        $this->startDaemon([['reply' => json_encode($reply)]]);

        $creds = $this->provider()()->wait();

        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
    }

    public function testNonRecoverableErrorDuringRefreshRejects(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => self::errorReply('REAUTH_REQUIRED')]]);

        $e = $this->fetchError($this->provider(), self::previous(3600));

        $this->assertSame(CredentialDaemonException::REAUTH_REQUIRED, $e->getErrorCode());
    }

    public function testExpiredReplyOnFirstFetchIsReturned(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([[
            'reply' => self::successReply([], ['expires_at' => self::expiresAt(-100)]),
        ]]);

        $creds = $this->provider()()->wait();

        $this->assertTrue($creds->isExpired());
    }

    public function testMemoizedDefaultProviderRefreshesThroughDaemon(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $soon = self::successReply([], ['expires_at' => self::expiresAt(30)]);
        $this->startDaemon([
            ['reply' => $soon],
            ['reply' => self::errorReply('ACCESS_DENIED')],
            ['reply' => self::successReply()],
        ]);
        $provider = CredentialProvider::defaultProvider();

        // The first reply expires within memoize()'s 60 second window, so
        // memoize() refreshes at once and the refresh error is returned.
        $e = $this->daemonError(function () use ($provider) {
            $provider()->wait();
        });
        $this->assertSame(CredentialDaemonException::REQUEST_REJECTED, $e->getErrorCode());
        $this->assertCount(2, $this->requests());

        // memoize() dropped the rejection, so the next call fetches anew.
        $creds = $provider()->wait();

        $this->assertSame('ASIADAEMON', $creds->getAccessKeyId());
        $this->assertGreaterThan(time() + 60, $creds->getExpiration());
        $this->assertCount(3, $this->requests());
    }

    // ---------------------------------------------------------------------
    // Cases that need credential refresh support, expected to fail until
    // it is released in this SDK. PHPUnit 10 has no expected-failure
    // marker, so each test asserts what the existing refresh code does
    // today and that the case's expected outcome does not hold.
    // ---------------------------------------------------------------------

    private function rejectedByService(callable $provider): void
    {
        $client = new StsClient([
            'region' => 'us-east-1',
            'retries' => 0,
            'credentials' => $provider,
            'handler' => new MockHandler([
                function ($command) {
                    return new AwsException(
                        'The security token included in the request is expired',
                        $command,
                        ['code' => 'ExpiredToken']
                    );
                },
            ]),
        ]);
        try {
            $client->getCallerIdentity();
            $this->fail('Expected the service to reject the call');
        } catch (AwsException $e) {
            $this->assertSame('ExpiredToken', $e->getAwsErrorCode());
        }
    }

    public function testInvalidatedRefreshesExpectedFailureUntilCredentialRefresh(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->startDaemon([
            ['reply' => self::successReply(['access_key_id' => 'ASIAREJECTED'])],
            ['reply' => self::successReply(['access_key_id' => 'ASIANEW'])],
        ]);
        $provider = CredentialProvider::defaultProvider();

        $this->rejectedByService($provider);
        $creds = $provider()->wait();

        // invalidated-refreshes expects a new daemon call that returns
        // ASIANEW. PHP has no Invalidate(), and a service rejection does not
        // touch memoize(), so the cached credentials come back.
        $this->assertNotSame('ASIANEW', $creds->getAccessKeyId());
        $this->assertSame('ASIAREJECTED', $creds->getAccessKeyId());
        $this->assertCount(1, $this->requests());
    }

    public function testInvalidatedSameKeyExpectedFailureUntilCredentialRefresh(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $reply = ['reply' => self::successReply(['access_key_id' => 'ASIAREJECTED'])];
        $this->startDaemon([$reply, $reply]);
        $provider = CredentialProvider::defaultProvider();

        $this->rejectedByService($provider);
        $creds = $provider()->wait();

        // invalidated-same-key expects a second daemon call, which returns
        // the same key. Today memoize() returns its cached credentials with
        // no daemon call.
        $this->assertSame('ASIAREJECTED', $creds->getAccessKeyId());
        $this->assertNotCount(2, $this->requests());
        $this->assertCount(1, $this->requests());
    }

    public function testExpiryPastExpectedFailureUntilCredentialRefresh(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $expiresAt = time() - 100;
        $this->startDaemon([[
            'reply' => self::successReply([], [
                'expires_at' => gmdate('Y-m-d\TH:i:s\Z', $expiresAt),
            ]),
        ]]);

        // expiry-past expects the expired reply as received, from one daemon
        // call. Today memoize() sees the expired credentials and refreshes at
        // once. The daemon has no second reply, so the refresh fails.
        $creds = null;
        $e = null;
        try {
            $creds = CredentialProvider::defaultProvider()()->wait();
        } catch (CredentialDaemonException $e) {
        }

        $this->assertFalse(
            $creds !== null
            && $creds->getAccessKeyId() === 'ASIADAEMON'
            && $creds->getExpiration() === $expiresAt,
            'expiry-past now passes. Remove the expected failure.'
        );
        $this->assertNull($creds);
        $this->assertInstanceOf(CredentialDaemonException::class, $e);
        $this->assertCount(1, $this->requests());
    }

    // ---------------------------------------------------------------------
    // Shared credential daemon provider test cases
    // ---------------------------------------------------------------------

    private const CASES_FILE = __DIR__
        . '/fixtures/credential_daemon/credential-daemon-provider-test-cases.json';

    /**
     * The clock the cases are written for. Each `expires_at` before 2050 is
     * moved by the distance from it to now, so a reply that expires 15
     * minutes after it expires 15 minutes from now.
     */
    private const CASE_CLOCK = '2026-11-01T00:00:00Z';

    /**
     * Expected outcomes, in full, that differ for this SDK. Every case here
     * is marked `sdkSpecific`, and the outcome given in the file is
     * botocore's.
     */
    private const PHP_OUTCOMES = [
        // This SDK's chain moves on after the SSO provider's error, as it
        // does for the profile without `daemon_credential`, and reaches the
        // stub next provider.
        'sso-only-account' => [
            'result' => 'notResolved',
            'source' => 'nextProvider',
            'dialed' => 'none',
        ],
    ];

    private const PHP_FEATURE_IDS = [
        'source-profile' => ['Aq', 'i'],
    ];

    private const ERROR_KINDS = [
        CredentialDaemonException::NOT_RUNNING => 'notRunning',
        CredentialDaemonException::REAUTH_REQUIRED => 'reauthRequired',
        CredentialDaemonException::CREDENTIAL_NOT_FOUND => 'notFound',
        CredentialDaemonException::REQUEST_REJECTED => 'rejected',
        CredentialDaemonException::UNSUPPORTED_MATERIAL => 'unsupportedMaterial',
        CredentialDaemonException::PROTOCOL_ERROR => 'protocol',
        CredentialDaemonException::INVALID_CONFIG => 'invalidConfig',
        CredentialDaemonException::UNSUPPORTED_PLATFORM => 'unsupportedPlatform',
    ];

    private const SOURCES = [
        CredentialSources::CREDENTIAL_DAEMON => 'daemon',
        CredentialSources::ENVIRONMENT => 'environment',
        CredentialSources::ECS => 'nextProvider',
        CredentialSources::STS_ASSUME_ROLE => 'assumeRole',
        CredentialSources::STS_ASSUME_ROLE_CREDENTIAL_DAEMON => 'assumeRole',
    ];

    private static function daemonCases(): array
    {
        return json_decode(
            file_get_contents(self::CASES_FILE),
            false,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    public static function daemonCaseProvider(): \Generator
    {
        foreach (self::daemonCases() as $case) {
            if (isset($case->appliesTo) && !in_array('php', $case->appliesTo, true)) {
                continue;
            }
            // The source-profile case has separate resolution and metric tests.
            if ($case->id === 'source-profile') {
                continue;
            }
            yield $case->id => [$case->id];
        }
    }

    public function testDaemonCasesAreAllRun(): void
    {
        $this->assertSame(
            '0b7a818a86d9878567809b93a680d710574e86bb6a8cba9e7ac886f09a54fd59',
            hash_file('sha256', self::CASES_FILE)
        );
        $ids = array_column(self::daemonCases(), 'id');
        $this->assertCount(54, $ids);
        $roles = ['home-socket', 'link', 'link-stale', 'link-dangling', 'env', 'env-file'];
        foreach (self::daemonCases() as $case) {
            foreach ($case->daemon->sockets as $role) {
                $this->assertContains($role, $roles, $case->id);
            }
            if (isset($case->outcome->dialed)) {
                $this->assertContains(
                    $case->outcome->dialed,
                    ['link', 'home-socket', 'env', 'none'],
                    $case->id
                );
            }
        }
        $caseIds = array_keys(iterator_to_array(self::daemonCaseProvider()));
        $caseIds[] = 'source-profile';
        $this->assertCount(54, $caseIds);
        $this->assertEqualsCanonicalizing($ids, $caseIds);
        $this->assertSame(
            [],
            array_diff(
                array_keys(self::PHP_OUTCOMES + self::PHP_FEATURE_IDS),
                $ids
            )
        );
    }

    /**
     * Runs one case from credential-daemon-provider-test-cases.json.
     *
     * Each case runs twice, with HOME set to a temporary folder and each
     * socket role mapped to a temporary path. A CredentialDaemonProvider
     * with the case's platform picks the socket and records the path it
     * dials. Then defaultProvider() runs in the same environment, with a
     * stub ECS endpoint as the next provider and a stub STS endpoint. The outcome
     * is read from defaultProvider(), and `dialed` from the first run when
     * defaultProvider() contacts the daemon.
     *
     * A case marked `requiresCredentialRefresh` is an expected failure
     * until credential refresh support is released in this SDK. The
     * source-profile case has separate resolution and metric tests.
     */
    #[DataProvider('daemonCaseProvider')]
    public function testDaemonCase(string $id): void
    {
        $outcome = $this->daemonCaseOutcome($id);

        if ($outcome['requiresCredentialRefresh']) {
            $this->assertNotEquals(
                $outcome['expected'],
                $outcome['actual'],
                "{$id} now passes. Run it as a normal case."
            );
        } else {
            $this->assertEquals(
                $outcome['expected'],
                $outcome['actual'],
                $outcome['documentation']
            );
        }
    }

    public function testSourceProfileResolvesThroughDaemon(): void
    {
        $outcome = $this->daemonCaseOutcome('source-profile');
        $expected = $outcome['expected'];
        $actual = $outcome['actual'];
        unset($expected['featureIds'], $actual['featureIds']);

        $this->assertEquals($expected, $actual, $outcome['documentation']);
    }

    public function testUserAgentCaptureDaemonSourceProfileMetrics(): void
    {
        $outcome = $this->daemonCaseOutcome('source-profile');
        $actualFeatures = $outcome['actual']['featureIds'] ?? null;

        $this->assertSame(
            self::PHP_FEATURE_IDS['source-profile'],
            $actualFeatures,
            'Source profile metrics changed. Update the deferred metrics coverage.'
        );
        $this->assertNotEquals(
            $outcome['expected']['featureIds'],
            $actualFeatures,
            'Expected failure: missing source-profile feature ID "o". '
            . 'Remove this exception when the modeled metrics match.'
        );
    }

    /**
     * @return array{
     *     expected: array,
     *     actual: array,
     *     documentation: string,
     *     requiresCredentialRefresh: bool
     * }
     */
    private function daemonCaseOutcome(string $id): array
    {
        $cases = array_column(self::daemonCases(), null, 'id');
        $case = $cases[$id];
        $expected = json_decode(json_encode($case->outcome), true);
        $expected = self::PHP_OUTCOMES[$id] ?? $expected;
        $clockShift = time() - strtotime(self::CASE_CLOCK);
        if (isset($expected['expiresAt'])) {
            $expected['expiresAt'] = self::shiftExpiry($expected['expiresAt'], $clockShift);
        }
        $refresh = !empty($case->requiresCredentialRefresh);

        $cwd = getcwd();
        chdir($this->dir);
        try {
            $actual = $this->runDaemonCase($case, $expected, $clockShift, $refresh);
        } finally {
            chdir($cwd);
        }

        return [
            'expected' => $expected,
            'actual' => $actual,
            'documentation' => $case->documentation,
            'requiresCredentialRefresh' => $refresh,
        ];
    }

    private function runDaemonCase(
        \stdClass $case,
        array $expected,
        int $clockShift,
        bool $refresh
    ): array {
        $this->setEnv('AWS_PROFILE', $case->profile);
        $this->setEnv('AWS_REGION', 'us-east-1');
        $this->setEnv('AWS_MAX_ATTEMPTS', '1');
        $this->setEnv('AWS_CONTAINER_CREDENTIALS_FULL_URI', 'http://127.0.0.1/creds');
        $this->writeConfig($case->configContents);
        file_put_contents($this->dir . '/credentials', $case->credentialsContents ?? '');

        // Environment, with the logical values mapped.
        $env = (array) ($case->environment ?? []);
        $home = $this->dir;
        foreach ($case->unsetEnvironment ?? [] as $var) {
            $this->setEnv($var, null);
        }
        foreach ($env as $var => $value) {
            if ($var === 'HOME' && $value === 'relative') {
                $this->setEnv('HOME', 'relative');
                $home = $this->dir . '/relative';
            } elseif ($var !== CredentialDaemonProvider::ENV_SOCKET) {
                $this->setEnv($var, $value);
            }
        }
        $homeSocket = $home . '/.aws/credential-daemon.sock';
        $envPath = $this->dir . '/e.sock';
        $envSocket = $env[CredentialDaemonProvider::ENV_SOCKET] ?? null;
        if ($envSocket === 'env') {
            $this->setEnv(CredentialDaemonProvider::ENV_SOCKET, $envPath);
        } else {
            $this->setEnv(CredentialDaemonProvider::ENV_SOCKET, $envSocket);
        }

        // Sockets, each with the exchange once for each run.
        $exchange = $this->exchangeStep($case, $clockShift, null);
        $steps = [$exchange, $exchange];
        if (isset($case->invalidatedAccessKeyId)) {
            array_splice(
                $steps,
                1,
                0,
                [$this->exchangeStep($case, $clockShift, $case->invalidatedAccessKeyId)]
            );
        }
        $logs = [];
        foreach ($case->daemon->sockets as $role) {
            if (!is_dir(dirname($homeSocket))) {
                mkdir(dirname($homeSocket), 0700, true);
            }
            switch ($role) {
                case 'home-socket':
                    $this->startDaemon($steps, false, $homeSocket);
                    $logs[] = $this->requestLog;
                    break;
                case 'link':
                    symlink($this->startDaemon($steps, false), $homeSocket);
                    $logs[] = $this->requestLog;
                    break;
                case 'link-stale':
                    $target = $this->makeDir() . '/stale.sock';
                    fclose(stream_socket_server('unix://' . $target));
                    symlink($target, $homeSocket);
                    break;
                case 'link-dangling':
                    symlink($this->makeDir() . '/missing-daemon.sock', $homeSocket);
                    break;
                case 'env':
                    $this->startDaemon($steps, false, $envPath);
                    $logs[] = $this->requestLog;
                    break;
                case 'env-file':
                    file_put_contents($envPath, '');
                    break;
                default:
                    $this->fail("Unknown socket role {$role}");
            }
        }
        $requestCount = function () use ($logs) {
            $count = 0;
            foreach ($logs as $log) {
                $count += count(array_filter(explode("\n", (string) file_get_contents($log))));
            }
            return $count;
        };
        $roleOf = function (?string $path) use ($envPath, $homeSocket) {
            if ($path === null) {
                return 'none';
            }
            if ($path === $envPath) {
                return 'env';
            }
            if ($path === $homeSocket) {
                return is_link($path) ? 'link' : 'home-socket';
            }
            return "unknown {$path}";
        };

        // First run: the provider for the case's platform picks and dials
        // the socket.
        $provider = $this->osProvider(
            $case->platform === 'macos' ? 'Darwin' : 'Linux',
            true,
            ['profile' => $case->profile]
        );
        $this->outcomeOf(function () use ($provider) {
            return $provider()->wait();
        });
        $providerDialed = $roleOf($provider->dialed[0] ?? null);
        $providerCounts = array_map(function ($log) {
            return count(array_filter(explode("\n", (string) file_get_contents($log))));
        }, $logs);

        // Second run: defaultProvider() with the same environment. The
        // socket lookup is the same on Linux and macOS.
        // Only a case that assumes a role reaches STS. In any other case an
        // STS call fails, so it cannot give the expected outcome.
        $stsLog = null;
        if (($expected['source'] ?? null) === 'assumeRole') {
            $stsLog = $this->startSts();
        } else {
            $this->setEnv('AWS_ENDPOINT_URL_STS', 'http://127.0.0.1:1');
        }
        $ecsCalled = false;
        $chain = CredentialProvider::defaultProvider([
            'client' => function () use (&$ecsCalled) {
                $ecsCalled = true;
                return Promise\Create::promiseFor(new Response(200, [], json_encode([
                    'AccessKeyId' => 'AKIDNEXTPROVIDER',
                    'SecretAccessKey' => 's',
                    'Token' => 't',
                    'Expiration' => gmdate('Y-m-d\TH:i:s\Z', time() + 3600),
                ])));
            },
        ]);
        if (isset($case->invalidatedAccessKeyId)) {
            $this->assertSame(
                $case->invalidatedAccessKeyId,
                $chain()->wait()->getAccessKeyId()
            );
            $this->rejectedByService($chain);
        }
        $before = $requestCount();
        $chainOutcome = @$this->outcomeOf(function () use ($chain) {
            return $chain()->wait();
        });
        // The socket does not depend on the profile, so a profile that
        // only names a daemon profile as source_profile dials it too.
        if ($requestCount() > $before) {
            $chainDialed = $roleOf($provider->dialed[0] ?? $provider->resolveSocketPath());
        } elseif ($chainOutcome['error'] instanceof CredentialDaemonException
            && $chainOutcome['error']->getErrorCode() === CredentialDaemonException::NOT_RUNNING
        ) {
            $chainDialed = $providerDialed;
        } else {
            $chainDialed = 'none';
        }

        $expectedRequest = $case->daemon->exchanges[0]->expectedRequest ?? null;
        foreach ($logs as $i => $log) {
            $lines = array_values(array_filter(explode("\n", (string) file_get_contents($log))));
            foreach ($lines as $n => $line) {
                if ($expectedRequest === null && $n < $providerCounts[$i]) {
                    // The first run dials whatever the chain would do first.
                    continue;
                }
                $this->assertNotNull($expectedRequest, "Unexpected daemon request {$line}");
                $request = json_decode($line, true);
                $this->assertSame($expectedRequest->method, $request['method']);
                $this->assertSame(
                    json_decode(json_encode($expectedRequest->params ?? []), true),
                    $request['params']
                );
            }
        }

        // The actual outcome, in the case file's terms.
        $actual = [];
        $error = $chainOutcome['error'];
        if ($chainOutcome['credentials'] !== null) {
            $creds = $chainOutcome['credentials'];
            $source = self::SOURCES[$creds->getSource()] ?? (string) $creds->getSource();
            $actual['result'] = $source === 'nextProvider' ? 'notResolved' : 'credentials';
            $actual['source'] = $source;
            $values = [
                'accessKeyId' => $creds->getAccessKeyId(),
                'secretAccessKey' => $creds->getSecretKey(),
                'sessionToken' => $creds->getSecurityToken(),
                'accountId' => $creds->getAccountId(),
                'expiresAt' => $creds->getExpiration(),
            ];
            $actual += array_intersect_key($values, $expected);
            if (isset($expected['featureIds'])) {
                $actual['featureIds'] = $this->featureIds($creds, $expected['featureIds']);
            }
        } else {
            $actual['result'] = 'error';
            $message = $error instanceof \Throwable ? $error->getMessage() : '';
            if ($error instanceof CredentialDaemonException) {
                $actual['errorKind'] = self::ERROR_KINDS[$error->getErrorCode()];
                $actual['errorCode'] = $error->getErrorCode();
                $actual['terminal'] = !$ecsCalled;
            } else {
                $actual['errorKind'] = $error === null ? 'none' : get_class($error);
                $actual['terminal'] = !$ecsCalled;
            }
            if (isset($expected['messageContains'])) {
                $actual['messageContains'] = array_values(array_filter(
                    $expected['messageContains'],
                    function ($s) use ($message) {
                        return strpos($message, $s) !== false;
                    }
                ));
            }
        }
        if (isset($expected['messageNotContains'])) {
            $message = $error instanceof \Throwable ? $error->getMessage() : '';
            $actual['messageNotContains'] = array_values(array_filter(
                $expected['messageNotContains'],
                function ($s) use ($message) {
                    return strpos($message, $s) === false;
                }
            ));
        }
        $actual['dialed'] = $chainDialed;
        if ($stsLog !== null) {
            $this->assertCount(
                ($actual['source'] ?? null) === 'assumeRole' ? 1 : 0,
                array_filter(explode("\n", (string) file_get_contents($stsLog))),
                'AssumeRole calls'
            );
        }

        return array_intersect_key($actual, $expected);
    }

    /**
     * The fake daemon step for a case's exchange. With $accessKeyId, the
     * reply's access key ID is replaced.
     */
    private function exchangeStep(\stdClass $case, int $clockShift, ?string $accessKeyId): array
    {
        $exchange = $case->daemon->exchanges[0] ?? null;
        if ($exchange === null) {
            return ['close_without_reply' => true];
        }
        $lines = [];
        foreach ($exchange->replyLines as $line) {
            if (is_string($line)) {
                $lines[] = ['text' => $line, 'pad_to' => null];
                continue;
            }
            $line = json_decode(json_encode($line));
            if (($line->id ?? null) === '$id') {
                $line->id = '{{ID}}';
            }
            if (isset($line->result->expires_at)
                && is_string($line->result->expires_at)
                && is_int(self::shiftExpiry($line->result->expires_at, $clockShift))
            ) {
                $line->result->expires_at = gmdate(
                    'Y-m-d\TH:i:s\Z',
                    self::shiftExpiry($line->result->expires_at, $clockShift)
                );
            }
            if ($accessKeyId !== null && isset($line->result->material)) {
                $line->result->material->access_key_id = $accessKeyId;
            }
            $padTo = null;
            if (isset($line->{'$padTo'})) {
                $padTo = $line->{'$padTo'};
                unset($line->{'$padTo'});
                $line->result->padding = '{{PAD}}';
            }
            $lines[] = ['text' => json_encode($line, JSON_UNESCAPED_SLASHES), 'pad_to' => $padTo];
        }
        if ($lines === [] && empty($exchange->close)) {
            return ['close_without_reply' => true];
        }

        return ['lines' => $lines];
    }

    /**
     * Moves an `expires_at` before 2050, with whole seconds, by the clock
     * shift and returns it as a timestamp. Any other value is returned as
     * a timestamp unchanged, or as given when it does not parse.
     *
     * @return int|string
     */
    private static function shiftExpiry(string $value, int $clockShift)
    {
        if (preg_match('/\A(\d{4})-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}Z\z/', $value, $m)) {
            return strtotime($value) + ((int) $m[1] < 2050 ? $clockShift : 0);
        }

        return $value;
    }

    /**
     * @return array{credentials: ?Credentials, error: ?\Throwable}
     */
    private function outcomeOf(callable $fn): array
    {
        try {
            return ['credentials' => $fn(), 'error' => null];
        } catch (\Throwable $e) {
            return ['credentials' => null, 'error' => $e];
        }
    }

    /**
     * Starts the fake STS endpoint and points AWS_ENDPOINT_URL_STS at it.
     * Returns its request log.
     */
    private function startSts(): string
    {
        $dir = $this->makeDir();
        $portFile = $dir . '/port';
        $log = $dir . '/sts.log';
        touch($log);
        $process = proc_open(
            [
                PHP_BINARY,
                __DIR__ . '/fixtures/credential_daemon/fake_sts.php',
                $portFile,
                $log,
            ],
            [0 => ['pipe', 'r'], 1 => ['file', '/dev/null', 'w'], 2 => STDERR],
            $pipes
        );
        $this->assertIsResource($process);
        $this->processes[] = $process;
        $until = microtime(true) + 5;
        while (!file_exists($portFile) && microtime(true) < $until) {
            usleep(10000);
        }
        $this->assertFileExists($portFile, 'fake STS did not start');
        $this->setEnv('AWS_ENDPOINT_URL_STS', 'http://127.0.0.1:' . file_get_contents($portFile));

        return $log;
    }

    /**
     * The case's feature IDs that a signed request with the credentials
     * carries, in the case's order.
     */
    private function featureIds(Credentials $creds, array $expected): array
    {
        $metrics = [];
        $client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => CredentialProvider::fromCredentials($creds),
            'http_handler' => function (RequestInterface $request) use (&$metrics) {
                preg_match('/(?:^| )m\/([^ ]+)/', $request->getHeaderLine('User-Agent'), $m);
                $metrics = explode(',', $m[1] ?? '');
                return Promise\Create::promiseFor(new Response(200));
            },
        ]);
        $client->listBuckets();
        return array_values(array_intersect($expected, $metrics));
    }

    // ---------------------------------------------------------------------
    // Chain and clients
    // ---------------------------------------------------------------------

    public function testDaemonErrorStopsChain(): void
    {
        $called = false;
        $chain = CredentialProvider::chain(
            function () {
                return new Promise\RejectedPromise(new CredentialDaemonException(
                    'down',
                    CredentialDaemonException::NOT_RUNNING
                ));
            },
            function () use (&$called) {
                $called = true;
                return Promise\Create::promiseFor(new Credentials('a', 'b'));
            }
        );

        $e = $this->daemonError(function () use ($chain) {
            $chain()->wait();
        });

        $this->assertSame('down', $e->getMessage());
        $this->assertFalse($called);
    }

    public function testChainStillPassesReasonToNextProvider(): void
    {
        $reason = new CredentialsException('plain');
        $seen = null;
        $chain = CredentialProvider::chain(
            function () use ($reason) {
                return new Promise\RejectedPromise($reason);
            },
            function ($arg = null) use (&$seen) {
                $seen = $arg;
                return Promise\Create::promiseFor(new Credentials('a', 'b'));
            }
        );

        $chain()->wait();

        $this->assertSame($reason, $seen);
    }

    public function testDefaultProviderCachesDaemonCredentials(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->startDaemon([['reply' => self::successReply()]]);
        $cache = new LruArrayCache();

        CredentialProvider::defaultProvider(['credentials' => $cache])()->wait();

        $cached = $cache->get('aws_cached_credential_daemon_credentials_'
            . sha1($this->dir . "/config\0dev"));
        $this->assertInstanceOf(Credentials::class, $cached);
        $this->assertSame('ASIADAEMON', $cached->getAccessKeyId());
    }

    public function testCachedDaemonCredentialsAreNotUsedForAnotherConfigFile(): void
    {
        $this->writeConfig(self::DEV);
        $other = $this->makeDir() . '/config';
        file_put_contents($other, "[profile dev]\n"
            . "aws_access_key_id = AKIDOTHERCONFIG\naws_secret_access_key = s\n");
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->startDaemon([['reply' => self::successReply()]]);
        $cache = new LruArrayCache();

        CredentialProvider::defaultProvider(['credentials' => $cache])()->wait();
        $this->setEnv('AWS_CONFIG_FILE', $other);
        $creds = CredentialProvider::defaultProvider(['credentials' => $cache])()->wait();

        $this->assertSame('AKIDOTHERCONFIG', $creds->getAccessKeyId());
    }

    public function testCachedDaemonCredentialsAreNotUsedOnceProfileStopsUsingDaemon(): void
    {
        $this->setEnv('AWS_PROFILE', 'dev');
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => self::successReply()]]);
        $cache = new LruArrayCache();

        CredentialProvider::defaultProvider(['credentials' => $cache])()->wait();
        $this->writeConfig("[profile dev]\n"
            . "aws_access_key_id = AKIDNODAEMON\naws_secret_access_key = s\n");
        $creds = CredentialProvider::defaultProvider(['credentials' => $cache])()->wait();

        $this->assertSame('AKIDNODAEMON', $creds->getAccessKeyId());
    }

    public function testCachedDaemonCredentialsAreNotUsedForAnotherProfile(): void
    {
        $this->writeConfig(self::DEV . "[profile static]\n"
            . "aws_access_key_id = AKIDSTATIC\naws_secret_access_key = s\n");
        $this->startDaemon([['reply' => self::successReply()]]);
        $cache = new LruArrayCache();

        $this->setEnv('AWS_PROFILE', 'dev');
        CredentialProvider::defaultProvider(['credentials' => $cache])()->wait();
        $this->setEnv('AWS_PROFILE', 'static');
        $creds = CredentialProvider::defaultProvider(['credentials' => $cache])()->wait();

        $this->assertSame('AKIDSTATIC', $creds->getAccessKeyId());
    }

    public function testNoRequestIsSentWhenDaemonFails(): void
    {
        $this->writeConfig(self::DEV);
        $this->setEnv('AWS_PROFILE', 'dev');
        $sent = false;
        $client = new StsClient([
            'region' => 'us-east-1',
            'http_handler' => function () use (&$sent) {
                $sent = true;
                return Promise\Create::promiseFor(new Response(200));
            },
        ]);

        try {
            $client->getCallerIdentity();
            $this->fail('Expected a CredentialDaemonException');
        } catch (CredentialDaemonException $e) {
            $this->assertSame(CredentialDaemonException::NOT_RUNNING, $e->getErrorCode());
        }
        $this->assertFalse($sent);
    }

    public function testUserAgentCarriesFeatureId(): void
    {
        $this->writeConfig(self::DEV);
        $this->startDaemon([['reply' => self::successReply()]]);
        $metrics = null;
        $client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => CredentialProvider::memoize($this->provider()),
            'http_handler' => function (RequestInterface $request) use (&$metrics) {
                preg_match('/(?:^| )m\/([^ ]+)/', $request->getHeaderLine('User-Agent'), $m);
                $metrics = explode(',', $m[1] ?? '');
                return Promise\Create::promiseFor(new Response(200));
            },
        ]);

        $client->listBuckets();

        $this->assertSame('Aq', MetricsBuilder::CREDENTIAL_DAEMON);
        $this->assertContains(MetricsBuilder::CREDENTIAL_DAEMON, $metrics);
    }
}
