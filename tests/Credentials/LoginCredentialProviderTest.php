<?php
namespace Aws\Test\Credentials;

use Aws\CommandInterface;
use Aws\Credentials\LoginCredentialProvider;
use Aws\Credentials\CredentialSources;
use Aws\Exception\AwsException;
use Aws\Exception\CredentialsException;
use Aws\Result;
use Aws\Signin\SigninClient;
use Aws\Signin\Exception\SigninException;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Credentials\LoginCredentialProvider
 */
class LoginCredentialProviderTest extends TestCase
{
    use UsesServiceTrait;

    /** @var array<string, string|false> */
    private array $originalEnv = [];

    /** @var list<string> */
    private array $tempDirs = [];

    /**
     * Environment variables to track
     */
    private const ENV_VARS_TO_TRACK = [
        'HOME',
        'HOMEDRIVE',
        'HOMEPATH',
        'AWS_PROFILE',
        'AWS_REGION',
        'AWS_DEFAULT_REGION',
        'AWS_LOGIN_CACHE_DIRECTORY',
        'AWS_CONFIG_FILE',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        // Snapshot all tracked env vars
        foreach (self::ENV_VARS_TO_TRACK as $var) {
            $this->originalEnv[$var] = getenv($var);
        }

        // Clear AWS-specific env vars
        putenv('AWS_PROFILE=');
        putenv('AWS_REGION=');
        putenv('AWS_DEFAULT_REGION=');
        putenv('AWS_LOGIN_CACHE_DIRECTORY=');
        putenv('AWS_CONFIG_FILE=');
        unset($_SERVER['AWS_PROFILE'],
            $_SERVER['AWS_REGION'],
            $_SERVER['AWS_DEFAULT_REGION'],
            $_SERVER['AWS_LOGIN_CACHE_DIRECTORY'],
            $_SERVER['AWS_CONFIG_FILE']
        );
    }

    protected function tearDown(): void
    {
        // Restore all tracked env vars to their original values
        foreach ($this->originalEnv as $key => $value) {
            if ($value !== false) {
                putenv("$key=$value");
                $_SERVER[$key] = $value;
            } else {
                putenv("$key=");
                if (isset($_SERVER[$key])) {
                    unset($_SERVER[$key]);
                }
            }
        }
        $this->originalEnv = [];

        // Clean any temp dirs created during tests
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

    private function recursiveDelete(string $dir): void
    {
        $it = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $dir,
            \RecursiveDirectoryIterator::SKIP_DOTS
            ),
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

    private function createValidTokenCache(
        string $awsDir,
        string $loginSession,
        array $overrides = []
    ): string
    {
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() + 3600);
        $tokenData = array_merge([
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
            'dpopKey' => "-----BEGIN EC PRIVATE KEY-----\n" .
"MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
"AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
"rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
"-----END EC PRIVATE KEY-----"
        ], $overrides);
        
        file_put_contents($tokenFile, json_encode($tokenData));
        return $tokenFile;
    }

    private function createConfigFile(
        string $awsDir,
        string $profileName,
        string $loginSession
    ): string
    {
        $configFile = $awsDir . '/config';
        $prefix = $profileName === 'default' ? '' : 'profile ';
        $config = <<<EOT
[{$prefix}{$profileName}]
login_session = {$loginSession}
region = us-east-1
EOT;
        file_put_contents($configFile, $config);

        return $configFile;
    }

    public function testConstructorFailsWithMissingConfigFile(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Unable to load configuration file');
        
        $awsDir = $this->createAwsHome();
        // Don't create config file

        new LoginCredentialProvider('default', 'us-west-2');
    }

    public function testConstructorFailsWithMissingProfile(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage("Profile 'nonexistent' does not exist");
        
        $awsDir = $this->createAwsHome();
        $this->createConfigFile(
            $awsDir,
            'default',
            'arn:aws:iam::123456789012:user/TestUser'
        );

        new LoginCredentialProvider('nonexistent', 'us-west-2');
    }

    public function testConstructorFailsWithMissingLoginSession(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('did not contain a login_session value');
        
        $awsDir = $this->createAwsHome();
        $configFile = $awsDir . '/config';
        $config = <<<EOT
[default]
region = us-east-1
EOT;
        file_put_contents($configFile, $config);

        new LoginCredentialProvider('default');
    }

    public function testConstructorFailsWithMissingCacheFile(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Failed to load cached credentials');
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        // Don't create cache file

        new LoginCredentialProvider('default', 'us-west-2');
    }

    public function testConstructorHandlesProfilePrefix(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Failed to load cached credentials');
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'myprofile', $loginSession);

        new LoginCredentialProvider('myprofile', 'us-west-2');
    }

    public function testUsesCustomCacheDirectory(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Failed to load cached credentials');
        
        $awsDir = $this->createAwsHome();
        $customCacheDir = sys_get_temp_dir() . '/custom_cache_' . uniqid('', true);
        $this->tempDirs[] = $customCacheDir;
        
        putenv('AWS_LOGIN_CACHE_DIRECTORY=' . $customCacheDir);
        
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);

        new LoginCredentialProvider('default', 'us-west-2');
    }

    public function testLoadCredentialsFromValidCache(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        $this->createValidTokenCache($awsDir, $loginSession);

        $provider = new LoginCredentialProvider('default', 'us-west-2');
        
        $credentials = $provider()->wait();
        
        $this->assertEquals(CredentialSources::PROFILE_LOGIN, $credentials->getSource());
        $this->assertEquals('testKey', $credentials->getAccessKeyId());
        $this->assertEquals('testSecret', $credentials->getSecretKey());
        $this->assertEquals('testToken', $credentials->getSecurityToken());
        $this->assertEquals('123456789012', $credentials->getAccountId());
    }

    public function testLoadTokenFailsWithInvalidJson(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Invalid JSON in cache file');
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        file_put_contents($tokenFile, 'invalid json {');
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $provider()->wait();
    }

    /**
     * @dataProvider missingCacheKeysProvider
     */
    public function testLoadTokenFailsWithMissingOrEmptyCacheKeys(
        array $tokenData,
        string $expectedMessage
    ): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage($expectedMessage);
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        file_put_contents($tokenFile, json_encode($tokenData));
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $provider()->wait();
    }
    
    public function missingCacheKeysProvider(): array
    {
        $validDpopKey = "-----BEGIN EC PRIVATE KEY-----\n" .
            "MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
            "AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
            "rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
            "-----END EC PRIVATE KEY-----";
            
        return [
            'missing refreshToken' => [
                [
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
                ],
                'Missing required keys in cached token'
            ],
            'missing secretAccessKey in accessToken' => [
                [
                    'accessToken' => [
                        'accessKeyId' => 'testKey',
                        // Missing secretAccessKey
                        'sessionToken' => 'testToken',
                        'accountId' => '123456789012',
                        'expiresAt' => '2500-01-01T00:00:00Z'
                    ],
                    'tokenType' => 'aws_sigv4',
                    'refreshToken' => 'testRefresh',
                    'idToken' => 'testId',
                    'clientId' => 'arn:aws:signin:::devtools/same-device',
                    'dpopKey' => $validDpopKey
                ],
                'Missing required keys in cached token'
            ],
            'empty accessToken array' => [
                [
                    'accessToken' => [],
                    'tokenType' => 'aws_sigv4',
                    'refreshToken' => 'testRefresh',
                    'idToken' => 'testId',
                    'clientId' => 'arn:aws:signin:::devtools/same-device',
                    'dpopKey' => $validDpopKey
                ],
                'Missing required keys in cached token'
            ],
            'empty string sessionToken' => [
                [
                    'accessToken' => [
                        'accessKeyId' => 'testKey',
                        'secretAccessKey' => 'testSecret',
                        'sessionToken' => '', // Empty string session token
                        'accountId' => '123456789012',
                        'expiresAt' => '2500-01-01T00:00:00Z'
                    ],
                    'tokenType' => 'aws_sigv4',
                    'refreshToken' => 'testRefresh',
                    'idToken' => 'testId',
                    'clientId' => 'arn:aws:signin:::devtools/same-device',
                    'dpopKey' => $validDpopKey
                ],
                'Missing required keys in cached token'
            ],
            'missing dpopKey' => [
                [
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
                    // Missing dpopKey
                ],
                'Missing required keys in cached token'
            ],
            'missing clientId' => [
                [
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
                    // Missing clientId
                    'dpopKey' => $validDpopKey
                ],
                'Missing required keys in cached token'
            ]
        ];
    }

    public function testLoadTokenFailsWithInvalidDpopKey(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Failed to load DPoP private key');
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        $tokenData = json_encode(
            [
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
            ],
            JSON_THROW_ON_ERROR
        );
        
        file_put_contents($tokenFile, $tokenData);
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $provider()->wait();
    }


    public function testShouldRefreshReturnsTrueForExpiringCredentials(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        // Create credentials expiring in 2 minutes (within 3 minute threshold)
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() + 120);
        $this->createValidTokenCache($awsDir, $loginSession, [
            'accessToken' => [
                'accessKeyId' => 'testKey',
                'secretAccessKey' => 'testSecret',
                'sessionToken' => 'testToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ]
        ]);
        
        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );

        $refreshResult = new Result([
            'tokenOutput' => [
                'refreshToken' => 'newRefresh',
                'accessToken' => [
                    'accessKeyId' => 'refreshedKey',
                    'secretAccessKey' => 'refreshedSecret',
                    'sessionToken' => 'refreshedToken',
                ],
                'expiresIn' => 3600
            ]
        ]);
        
        $this->addMockResults($mockClient, [$refreshResult]);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');

        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        $credentials = $provider()->wait();
        
        // Should have refreshed
        $this->assertEquals('refreshedKey', $credentials->getAccessKeyId());
    }

    public function testShouldRefreshReturnsFalseForFreshCredentials(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        // Create credentials expiring in 10 minutes (outside 3 minute threshold)
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() + 600);
        $this->createValidTokenCache($awsDir, $loginSession, [
            'accessToken' => [
                'accessKeyId' => 'testKey',
                'secretAccessKey' => 'testSecret',
                'sessionToken' => 'testToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ]
        ]);
        
        $mockClient = $this->createMock(SigninClient::class);
        // Should not call refresh
        $mockClient->expects($this->never())->method('__call');
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');

        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        $credentials = $provider()->wait();
        
        // Should use existing credentials
        $this->assertEquals('testKey', $credentials->getAccessKeyId());
    }

    public function testRefreshUpdatesCredentialsCorrectly(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Create expired credentials
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $tokenData = json_encode(
            [
                'accessToken' => [
                    'accessKeyId' => 'expiredKey',
                    'secretAccessKey' => 'expiredSecret',
                    'sessionToken' => 'expiredToken',
                    'accountId' => '123456789012',
                    'expiresAt' => $expiration
                ],
                'tokenType' => 'aws_sigv4',
                'refreshToken' => 'testRefresh',
                'idToken' => 'testId',
                'clientId' => 'arn:aws:signin:::devtools/same-device',
                'dpopKey' => "-----BEGIN PRIVATE KEY-----\n" .
    "MIGHAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBG0wawIBAQQgUCM6wO00sOZ3xv1I\n" .
    "HUZQk6Owz3nW+TPqxFHKzsli6VOhRANCAASB46Rm/KSro0ieDm88ztr43WflZZN5\n" .
    "ttLT1iSB4ORVJ7mRJ0MVrk7phe/nK6oLp925JsYfzdJyGqYJEGmD+TwC\n" .
    "-----END PRIVATE KEY-----"
            ],
            JSON_THROW_ON_ERROR
        );
        
        file_put_contents($tokenFile, $tokenData);

        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        $refreshResult = new Result([
            'tokenOutput' => [
                'refreshToken' => 'newRefresh',
                'accessToken' => [
                    'accessKeyId' => 'refreshedKey',
                    'secretAccessKey' => 'refreshedSecret',
                    'sessionToken' => 'refreshedToken',
                ],
                'expiresIn' => 3600
            ]
        ]);
        
        $this->addMockResults($mockClient, [$refreshResult]);
        
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');

        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        $credentials = $provider()->wait();
        
        $this->assertEquals('refreshedKey', $credentials->getAccessKeyId());
        $this->assertEquals('refreshedSecret', $credentials->getSecretKey());
        $this->assertEquals('refreshedToken', $credentials->getSecurityToken());
    }

    public function testContinuesWithExistingTokenAfterRefreshFailure(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        // Create credentials expiring in 5 minutes (within refresh window)
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() + 300);
        $this->createValidTokenCache($awsDir, $loginSession, [
            'accessToken' => [
                'accessKeyId' => 'existingKey',
                'secretAccessKey' => 'existingSecret',
                'sessionToken' => 'existingToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ]
        ]);
        
        // Use test client with mock handler that returns a network error
        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        // Add a generic network error to the mock handler
        $mockCommand = $this->getMockBuilder(CommandInterface::class)->getMock();
        $exception = new AwsException(
            'Network error',
            $mockCommand,
            [
                'code' => 'Network error',
            ]
        );
        $this->addMockResults($mockClient, [$exception]);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');

        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        $credentials = @$provider()->wait();
        
        // Should use existing credentials despite refresh failure
        $this->assertEquals('existingKey', $credentials->getAccessKeyId());
        $this->assertEquals('existingSecret', $credentials->getSecretKey());
        $this->assertEquals('existingToken', $credentials->getSecurityToken());
    }

    public function testRefreshThrowsOnTokenExpiredError(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage(
            'Your session has expired. Please reauthenticate using `aws login`'
        );
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        // Create expired credentials to force refresh
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $this->createValidTokenCache($awsDir, $loginSession, [
            'accessToken' => [
                'accessKeyId' => 'expiredKey',
                'secretAccessKey' => 'expiredSecret',
                'sessionToken' => 'expiredToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ]
        ]);

        $mockClient = $this->getTestClient(
            'Signin', 
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        $mockCommand = $this->getMockBuilder(CommandInterface::class)->getMock();
        $exception = new SigninException(
            'Token expired',
            $mockCommand,
            [
                'code' => 'AccessDeniedException',
                'body' => ['error' => 'token_expired']
            ]
        );
        
        $this->addMockResults($mockClient, [$exception]);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        @$provider()->wait();
    }

    public function testRefreshThrowsOnUserCredentialsChangedError(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage('Unable to refresh credentials because of a change in your password');
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        // Create expired credentials to force refresh
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $this->createValidTokenCache($awsDir, $loginSession, [
            'accessToken' => [
                'accessKeyId' => 'expiredKey',
                'secretAccessKey' => 'expiredSecret',
                'sessionToken' => 'expiredToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ]
        ]);

        $mockClient = $this->getTestClient(
            'Signin', 
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        $mockCommand = $this->getMockBuilder(CommandInterface::class)->getMock();
        $exception = new SigninException(
            'User credentials changed',
            $mockCommand,
            [
                'code' => 'AccessDeniedException',
                'body' => ['error' => 'user_credentials_changed']
            ]
        );
        
        $this->addMockResults($mockClient, [$exception]);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        @$provider()->wait();
    }

    public function testRefreshThrowsOnInsufficientPermissionsError(): void
    {
        $this->expectException(CredentialsException::class);
        $this->expectExceptionMessage(
            'Unable to refresh credentials due to insufficient permissions'
        );
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        // Create expired credentials to force refresh
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $this->createValidTokenCache($awsDir, $loginSession, [
            'accessToken' => [
                'accessKeyId' => 'expiredKey',
                'secretAccessKey' => 'expiredSecret',
                'sessionToken' => 'expiredToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ]
        ]);

        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );

        $mockCommand = $this->getMockBuilder(CommandInterface::class)->getMock();
        $exception = new SigninException(
            'Insufficient permissions',
            $mockCommand,
            [
                'code' => 'AccessDeniedException',
                'body' => ['error' => 'insufficient_permissions']
            ]
        );
        
        $this->addMockResults($mockClient, [$exception]);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        @$provider()->wait();
    }

    public function testRefreshRethrowsOtherRefreshExceptions(): void
    {
        $this->expectException(CredentialsException::class);
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        // Create expired credentials to force refresh
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $this->createValidTokenCache($awsDir, $loginSession, [
            'accessToken' => [
                'accessKeyId' => 'expiredKey',
                'secretAccessKey' => 'expiredSecret',
                'sessionToken' => 'expiredToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ]
        ]);

        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        $mockCommand = $this->getMockBuilder(CommandInterface::class)->getMock();
        $exception = new SigninException(
            'Some other error',
            $mockCommand,
            [
                'code' => 'SomeOtherError',
                'body' => []
            ]
        );
        
        $this->addMockResults($mockClient, [$exception]);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        @$provider()->wait();
    }

    public function testRefreshUpdatesInMemoryAndFileCache(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Create expired credentials
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $tokenData = json_encode(
            [
                'accessToken' => [
                    'accessKeyId' => 'expiredKey',
                    'secretAccessKey' => 'expiredSecret',
                    'sessionToken' => 'expiredToken',
                    'accountId' => '123456789012',
                    'expiresAt' => $expiration
                ],
                'tokenType' => 'aws_sigv4',
                'refreshToken' => 'testRefresh',
                'idToken' => 'testId',
                'clientId' => 'arn:aws:signin:::devtools/same-device',
                'dpopKey' => "-----BEGIN PRIVATE KEY-----\n" .
    "MIGHAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBG0wawIBAQQgUCM6wO00sOZ3xv1I\n" .
    "HUZQk6Owz3nW+TPqxFHKzsli6VOhRANCAASB46Rm/KSro0ieDm88ztr43WflZZN5\n" .
    "ttLT1iSB4ORVJ7mRJ0MVrk7phe/nK6oLp925JsYfzdJyGqYJEGmD+TwC\n" .
    "-----END PRIVATE KEY-----"
            ],
            JSON_THROW_ON_ERROR
        );
        
        file_put_contents($tokenFile, $tokenData);
        
        $this->createConfigFile($awsDir, 'default', $loginSession);
        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        $refreshResult = new Result([
            'tokenOutput' => [
                'refreshToken' => 'newRefresh',
                'accessToken' => [
                    'accessKeyId' => 'refreshedKey',
                    'secretAccessKey' => 'refreshedSecret',
                    'sessionToken' => 'refreshedToken',
                    'accountId' => '123456789012'
                ],
                'expiresIn' => 3600
            ]
        ]);
        
        $this->addMockResults($mockClient, [$refreshResult]);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');

        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        $credentials = $provider()->wait();
        
        // Should have refreshed
        $this->assertEquals('refreshedKey', $credentials->getAccessKeyId());
        $this->assertEquals('refreshedSecret', $credentials->getSecretKey());
        $this->assertEquals('refreshedToken', $credentials->getSecurityToken());
        
        // Verify cache file was updated
        $updatedCache = json_decode(file_get_contents($tokenFile), true);
        $this->assertEquals('newRefresh', $updatedCache['refreshToken']);
        $this->assertEquals('refreshedKey', $updatedCache['accessToken']['accessKeyId']);
    }

    public function testProviderCachesCredentialsInMemory(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Create expired credentials
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $tokenData = json_encode(
            [
                'accessToken' => [
                    'accessKeyId' => 'expiredKey',
                    'secretAccessKey' => 'expiredSecret',
                    'sessionToken' => 'expiredToken',
                    'accountId' => '123456789012',
                    'expiresAt' => $expiration
                ],
                'tokenType' => 'aws_sigv4',
                'refreshToken' => 'testRefresh',
                'idToken' => 'testId',
                'clientId' => 'arn:aws:signin:::devtools/same-device',
                'dpopKey' => "-----BEGIN EC PRIVATE KEY-----\n" .
    "MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
    "AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
    "rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
    "-----END EC PRIVATE KEY-----"
            ],
            JSON_THROW_ON_ERROR
        );
        
        file_put_contents($tokenFile, $tokenData);

        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        $refreshResult = new Result([
            'tokenOutput' => [
                'refreshToken' => 'newRefresh',
                'accessToken' => [
                    'accessKeyId' => 'refreshedKey',
                    'secretAccessKey' => 'refreshedSecret',
                    'sessionToken' => 'refreshedToken',
                    'accountId' => '123456789012'
                ],
                'expiresIn' => 3600
            ]
        ]);
        
        $this->addMockResults($mockClient, [$refreshResult]);
        
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');

        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        // First call should trigger refresh
        $credentials1 = $provider()->wait();
        $this->assertEquals('refreshedKey', $credentials1->getAccessKeyId());
        
        // Second call should use in-memory cache, not call refresh again
        $credentials2 = $provider()->wait();
        $this->assertEquals('refreshedKey', $credentials2->getAccessKeyId());
        $this->assertSame($credentials1, $credentials2); // Should be the same object
    }


    public function testLoadsCredentialsWithValidCacheAndAccountId(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Test various date formats
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() + 7200);
        $tokenData = json_encode(
            [
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
                'dpopKey' => "-----BEGIN EC PRIVATE KEY-----\n" .
    "MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
    "AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
    "rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
    "-----END EC PRIVATE KEY-----"
            ],
            JSON_THROW_ON_ERROR
        );
        
        file_put_contents($tokenFile, $tokenData);
        $this->createConfigFile($awsDir, 'default', $loginSession);
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        
        $credentials = $provider()->wait();
        
        // Verify expiration is parsed correctly
        $this->assertGreaterThan(time(), $credentials->getExpiration());
        $this->assertLessThan(time() + 10000, $credentials->getExpiration());
    }

    public function testInvalidExpirationFormatThrowsException(): void
    {
        $this->expectException(CredentialsException::class);
        
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Create credentials with invalid expiration format
        $tokenData = json_encode(
            [
                'accessToken' => [
                    'accessKeyId' => 'testKey',
                    'secretAccessKey' => 'testSecret',
                    'sessionToken' => 'testToken',
                    'accountId' => '123456789012',
                    'expiresAt' => 'invalid-date-format' // This will cause strtotime to fail
                ],
                'tokenType' => 'aws_sigv4',
                'refreshToken' => 'testRefresh',
                'idToken' => 'testId',
                'clientId' => 'arn:aws:signin:::devtools/same-device',
                'dpopKey' => "-----BEGIN EC PRIVATE KEY-----\n" .
    "MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
    "AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
    "rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
    "-----END EC PRIVATE KEY-----"
            ],
            JSON_THROW_ON_ERROR
        );
        
        file_put_contents($tokenFile, $tokenData);
        
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        
        // This should throw due to invalid date format when loading the token
        $provider()->wait();
    }

    public function testWriteToCacheMergesWithExistingCache(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Create expired credentials with extra fields
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $tokenData = json_encode(
            [
                'accessToken' => [
                    'accessKeyId' => 'expiredKey',
                    'secretAccessKey' => 'expiredSecret',
                    'sessionToken' => 'expiredToken',
                    'accountId' => '123456789012',
                    'expiresAt' => $expiration
                ],
                'tokenType' => 'aws_sigv4',
                'refreshToken' => 'testRefresh',
                'idToken' => 'testId',
                'clientId' => 'arn:aws:signin:::devtools/same-device',
                'dpopKey' => "-----BEGIN PRIVATE KEY-----\n" .
    "MIGHAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBG0wawIBAQQgUCM6wO00sOZ3xv1I\n" .
    "HUZQk6Owz3nW+TPqxFHKzsli6VOhRANCAASB46Rm/KSro0ieDm88ztr43WflZZN5\n" .
    "ttLT1iSB4ORVJ7mRJ0MVrk7phe/nK6oLp925JsYfzdJyGqYJEGmD+TwC\n" .
    "-----END PRIVATE KEY-----",
                'extraField' => 'shouldBePreserved'
            ],
        JSON_THROW_ON_ERROR
        );
        
        file_put_contents($tokenFile, $tokenData);

        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        $refreshResult = new Result([
            'tokenOutput' => [
                'refreshToken' => 'newRefresh',
                'accessToken' => [
                    'accessKeyId' => 'refreshedKey',
                    'secretAccessKey' => 'refreshedSecret',
                    'sessionToken' => 'refreshedToken',
                ],
                'expiresIn' => 3600
            ]
        ]);
        
        $this->addMockResults($mockClient, [$refreshResult]);
        
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');

        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        $credentials = $provider()->wait();
        
        // Check that file was updated and extra fields preserved
        $updatedData = json_decode(
            file_get_contents($tokenFile),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $this->assertEquals('newRefresh', $updatedData['refreshToken']);
        $this->assertEquals('refreshedKey', $updatedData['accessToken']['accessKeyId']);
        $this->assertEquals('refreshedSecret', $updatedData['accessToken']['secretAccessKey']);
        $this->assertEquals('refreshedToken', $updatedData['accessToken']['sessionToken']);
        $this->assertEquals('shouldBePreserved', $updatedData['extraField']); // Extra fields should be preserved
    }

    /**
     * Test that a key with specifiedCurve parameters works correctly
     */
    public function testLoadCredentialsWithSpecifiedCurveKey(): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() + 3600);
        
        // Key with specifiedCurve parameters
        $specifiedCurveKey = "-----BEGIN EC PRIVATE KEY-----\n" .
            "MIIBUQIBAQQgW2JEXxOdj8dFip0hyS6SHr9dHciiZQyoTZoe6sox1KGggeMwgeAC\n" .
            "AQEwLAYHKoZIzj0BAQIhAP////8AAAABAAAAAAAAAAAAAAAA////////////////\n" .
            "MEQEIP////8AAAABAAAAAAAAAAAAAAAA///////////////8BCBaxjXYqjqT57Pr\n" .
            "vVV2mIa8ZR0GsMxTsPY7zjw+J9JgSwRBBGsX0fLhLEJH+Lzm5WOkQPJ3A32BLesz\n" .
            "oPShOUXYmMKWT+NC4v4af5uO5+tKfA+eFivOM1drMV7Oy7ZAaDe/UfUCIQD/////\n" .
            "AAAAAP//////////vOb6racXnoTzucrC/GMlUQIBAaFEA0IABFqlTnAPfLQfFrmn\n" .
            "uJFbpcMA89r5uhBzUe+KvRCCPpscjMats1NUCB64qslJ3QYEGuAx2BP2gOeQBUbl\n" .
            "rSdm4F4=\n" .
            "-----END EC PRIVATE KEY-----";
        
        $tokenData = json_encode(
            [
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
                'dpopKey' => $specifiedCurveKey
            ],
            JSON_THROW_ON_ERROR
        );
        
        file_put_contents($tokenFile, $tokenData);
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        
        $credentials = $provider()->wait();
        
        $this->assertEquals(CredentialSources::PROFILE_LOGIN, $credentials->getSource());
        $this->assertEquals('testKey', $credentials->getAccessKeyId());
        $this->assertEquals('testSecret', $credentials->getSecretKey());
        $this->assertEquals('testToken', $credentials->getSecurityToken());
        $this->assertEquals('123456789012', $credentials->getAccountId());
    }

    /**
     * @dataProvider loginTestCasesProvider
     */
    public function testLoginCredentialProviderFromTestCases(
        string $documentation,
        string $configContents,
        array $cacheContents,
        array $mockApiCalls,
        array $outcomes
    ): void
    {
        $awsDir = $this->createAwsHome();

        // Write the config file
        file_put_contents($awsDir . '/config', $configContents);

        // Set up cache files
        if (!empty($cacheContents)) {
            $cacheDir = $awsDir . '/login/cache';
            mkdir($cacheDir, 0777, true);

            foreach ($cacheContents as $filename => $content) {
                file_put_contents($cacheDir . '/' . $filename, json_encode($content));
            }
        } else {
            $this->expectException(CredentialsException::class);
            $this->expectExceptionMessage(
                "Failed to load cached credentials for profile 'signin'. "
                . "Please reauthenticate using `aws login`."
            );
        }

        $provider = new LoginCredentialProvider('signin', 'us-west-2');
        if (!empty($mockApiCalls)) {
            $mockClient = $this->getTestClient(
                'Signin',
                ['credentials' => false, 'signature_version' => 'dpop']
            );

            $mockResults = [];
            foreach ($mockApiCalls as $call) {
                if (isset($call['responseCode']) && $call['responseCode'] >= 400) {
                    // Create an error response
                    $mockCommand = $this->getMockBuilder(CommandInterface::class)->getMock();
                    $exception = new SigninException(
                        'API Error',
                        $mockCommand,
                        ['code' => 'Error', 'statusCode' => $call['responseCode']]
                    );
                    $mockResults[] = $exception;
                } elseif (isset($call['response'])) {
                    $mockResults[] = new Result($call['response']);
                }
            }

            if (!empty($mockResults)) {
                $this->addMockResults($mockClient, $mockResults);

                $reflection = new \ReflectionClass($provider);
                $clientProperty = $reflection->getProperty('client');
                $clientProperty->setValue($provider, $mockClient);
            }
        }

        foreach ($outcomes as $outcome) {
            switch ($outcome['result']) {
                case 'error':
                    $this->expectException(CredentialsException::class);
                    @$provider()->wait();

                    break;

                case 'credentials':
                    $credentials = $provider()->wait();

                    $this->assertEquals($outcome['accessKeyId'], $credentials->getAccessKeyId());
                    $this->assertEquals($outcome['secretAccessKey'], $credentials->getSecretKey());
                    $this->assertEquals($outcome['sessionToken'], $credentials->getSecurityToken());
                    $this->assertEquals($outcome['accountId'], $credentials->getAccountId());
                    $this->assertEquals(CredentialSources::PROFILE_LOGIN, $credentials->getSource());

                    break;

                case 'cacheContents':
                    foreach ($outcome as $filename => $expectedContent) {
                        if ($filename === 'result') {
                            continue;
                        }

                        $actualPath = $awsDir . '/login/cache/' . $filename;
                        if (file_exists($actualPath)) {
                            $actualContent = json_decode(file_get_contents($actualPath), true);
                            if (isset($expectedContent['accessToken'])) {
                                $this->assertArrayHasKey('accessToken', $actualContent);

                                $expectedToken = $expectedContent['accessToken'];
                                $actualToken = $actualContent['accessToken'];

                                $this->assertEquals(
                                    $expectedToken['accessKeyId'],
                                    $actualToken['accessKeyId']
                                );
                                $this->assertEquals(
                                    $expectedToken['secretAccessKey'],
                                    $actualToken['secretAccessKey']
                                );
                                $this->assertEquals(
                                    $expectedToken['sessionToken'],
                                    $actualToken['sessionToken']
                                );
                            }

                            if (isset($expectedContent['refreshToken'])) {
                                $this->assertEquals(
                                    $expectedContent['refreshToken'],
                                    $actualContent['refreshToken']
                                );
                            }
                        }
                    }

                    break;
            }
        }
    }

    /**
     * Provider for test cases from JSON file
     *
     * @return \Generator
     * @throws \JsonException
     */
    public function loginTestCasesProvider(): \Generator
    {
        $testCasesFile = __DIR__ . '/fixtures/login/test-cases.json';

        if (!file_exists($testCasesFile)) {
            throw new \RuntimeException("Test cases file not found: {$testCasesFile}");
        }

        $testCases = json_decode(
            file_get_contents($testCasesFile),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        foreach ($testCases as $index => $testCase) {
            yield $testCase['documentation'] => [
                $testCase['documentation'],
                $testCase['configContents'],
                $testCase['cacheContents'] ?? [],
                $testCase['mockApiCalls'] ?? [],
                $testCase['outcomes']
            ];
        }
    }

    /**
     * @dataProvider externalRefreshProvider
     */
    public function testExternalRefreshBehavior(
        string $scenario,
        int $currentExpiryMinutes,
        int $diskExpiryMinutes,
        bool $sameRefreshToken,
        bool $shouldUseExternal
    ): void
    {
        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Create initial token that will expire and trigger refresh
        $currentExpiration = gmdate('Y-m-d\TH:i:s\Z', time() + ($currentExpiryMinutes * 60));
        $initialTokenData = [
            'accessToken' => [
                'accessKeyId' => 'currentKey',
                'secretAccessKey' => 'currentSecret',
                'sessionToken' => 'currentToken',
                'accountId' => '123456789012',
                'expiresAt' => $currentExpiration
            ],
            'tokenType' => 'aws_sigv4',
            'refreshToken' => 'currentRefresh',
            'idToken' => 'testId',
            'clientId' => 'arn:aws:signin:::devtools/same-device',
            'dpopKey' => "-----BEGIN EC PRIVATE KEY-----\n" .
                "MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
                "AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
                "rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
                "-----END EC PRIVATE KEY-----"
        ];
        
        file_put_contents($tokenFile, json_encode($initialTokenData));
        
        // Create provider and let it load the initial token
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $reflection = new \ReflectionClass($provider);
        
        // Set up mock client
        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        // First call will trigger refresh due to 2-minute expiry
        // Return credentials that also expire soon so second call triggers refresh
        $firstRefreshResult = new Result([
            'tokenOutput' => [
                'refreshToken' => 'firstRefresh',
                'accessToken' => [
                    'accessKeyId' => 'firstKey',
                    'secretAccessKey' => 'firstSecret',
                    'sessionToken' => 'firstToken',
                ],
                'expiresIn' => 120  // 2 minutes - will trigger refresh on second call
            ]
        ]);
        
        if (!$shouldUseExternal) {
            // Second call should also use API for refresh
            $secondRefreshResult = new Result([
                'tokenOutput' => [
                    'refreshToken' => 'apiRefresh',
                    'accessToken' => [
                        'accessKeyId' => 'apiKey',
                        'secretAccessKey' => 'apiSecret',
                        'sessionToken' => 'apiToken',
                    ],
                    'expiresIn' => 3600
                ]
            ]);
            
            $this->addMockResults($mockClient, [$firstRefreshResult, $secondRefreshResult]);
        } else {
            // Only the first call needs a mock result
            $this->addMockResults($mockClient, [$firstRefreshResult]);
        }
        
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        // Force load the initial token
        $provider()->wait();
        
        // Now modify the cache file to simulate external refresh
        $diskExpiration = gmdate('Y-m-d\TH:i:s\Z', time() + ($diskExpiryMinutes * 60));
        $externalTokenData = array_merge($initialTokenData, [
            'accessToken' => [
                'accessKeyId' => 'externalKey',
                'secretAccessKey' => 'externalSecret',
                'sessionToken' => 'externalToken',
                'accountId' => '123456789012',
                'expiresAt' => $diskExpiration
            ],
            'refreshToken' => $sameRefreshToken ? 'firstRefresh' : 'externalRefresh'
        ]);
        
        file_put_contents($tokenFile, json_encode($externalTokenData));
        
        // Now invoke again - this should trigger refresh logic
        $credentials = $provider()->wait();
        
        if ($shouldUseExternal) {
            // Should have used the external token
            $this->assertEquals('externalKey', $credentials->getAccessKeyId());
            $this->assertEquals('externalSecret', $credentials->getSecretKey());
            $this->assertEquals('externalToken', $credentials->getSecurityToken());
        } else {
            // Should have used API refresh
            $this->assertEquals('apiKey', $credentials->getAccessKeyId());
            $this->assertEquals('apiSecret', $credentials->getSecretKey());
            $this->assertEquals('apiToken', $credentials->getSecurityToken());
        }
    }

    public function externalRefreshProvider(): array
    {
        return [
            'external refresh detected - all conditions met' => [
                'scenario' => 'valid external refresh',
                'currentExpiryMinutes' => 2,  // Triggers refresh
                'diskExpiryMinutes' => 10,     // Fresh token
                'sameRefreshToken' => false,
                'shouldUseExternal' => true
            ],
            'same refresh token - no external refresh' => [
                'scenario' => 'same refresh token',
                'currentExpiryMinutes' => 2,
                'diskExpiryMinutes' => 10,
                'sameRefreshToken' => true,
                'shouldUseExternal' => false
            ],
            'older expiration - no external refresh' => [
                'scenario' => 'older expiration',
                'currentExpiryMinutes' => 2,
                'diskExpiryMinutes' => 1,      // Older than current
                'sameRefreshToken' => false,
                'shouldUseExternal' => false
            ],
            'external token needs refresh - no external refresh' => [
                'scenario' => 'external token needs refresh',
                'currentExpiryMinutes' => 2,
                'diskExpiryMinutes' => 2,      // Also within 3-minute threshold
                'sameRefreshToken' => false,
                'shouldUseExternal' => false
            ]
        ];
    }

    public function testRefreshContinuesWhenDiskReadFails(): void
    {
        // Skip test if running as root. chmod() will not work
        if (function_exists('posix_geteuid') && posix_geteuid() === 0) {
            $this->markTestSkipped('Test cannot run test as root user');
        }

        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile($awsDir, 'default', $loginSession);
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Create expiring token
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() + 120); // 2 minutes
        $tokenData = [
            'accessToken' => [
                'accessKeyId' => 'expiredKey',
                'secretAccessKey' => 'expiredSecret',
                'sessionToken' => 'expiredToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ],
            'tokenType' => 'aws_sigv4',
            'refreshToken' => 'testRefresh',
            'idToken' => 'testId',
            'clientId' => 'arn:aws:signin:::devtools/same-device',
            'dpopKey' => "-----BEGIN EC PRIVATE KEY-----\n" .
                "MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
                "AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
                "rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
                "-----END EC PRIVATE KEY-----"
        ];
        
        file_put_contents($tokenFile, json_encode($tokenData));
        
        $provider = new LoginCredentialProvider('default', 'us-west-2');
        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        $refreshResult = new Result([
            'tokenOutput' => [
                'refreshToken' => 'newRefresh',
                'accessToken' => [
                    'accessKeyId' => 'refreshedKey',
                    'secretAccessKey' => 'refreshedSecret',
                    'sessionToken' => 'refreshedToken',
                ],
                'expiresIn' => 3600
            ]
        ]);
        
        $this->addMockResults($mockClient, [$refreshResult]);
        
        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        // Load token first (will trigger refresh due to 2-minute expiry)
        $provider()->wait();
        
        // Make file unreadable for the second refresh attempt
        chmod($tokenFile, 0000);
        
        // Now call again - should use API refresh since disk read fails
        $credentials = @$provider()->wait();
        
        // Restore permissions before assertions
        chmod($tokenFile, 0644);
        
        // Verify API was called (not external token)
        $this->assertEquals('refreshedKey', $credentials->getAccessKeyId());
        $this->assertEquals('refreshedSecret', $credentials->getSecretKey());
        $this->assertEquals('refreshedToken', $credentials->getSecurityToken());
    }

    public function testRefreshSucceedsWhenCacheWriteFails(): void
    {
        // Skip test if running as root. chmod() will not work
        if (function_exists('posix_geteuid') && posix_geteuid() === 0) {
            $this->markTestSkipped('Test cannot run test as root user');
        }

        $awsDir = $this->createAwsHome();
        $loginSession = 'arn:aws:iam::123456789012:user/TestUser';
        $this->createConfigFile(
            $awsDir,
            'default',
            $loginSession
        );
        
        $cacheDir = $awsDir . '/login/cache';
        mkdir($cacheDir, 0777, true);
        
        $sessionHash = hash('sha256', trim($loginSession));
        $tokenFile = $cacheDir . '/' . $sessionHash . '.json';
        
        // Create expired credentials to force refresh
        $expiration = gmdate('Y-m-d\TH:i:s\Z', time() - 3600);
        $tokenData = [
            'accessToken' => [
                'accessKeyId' => 'expiredKey',
                'secretAccessKey' => 'expiredSecret',
                'sessionToken' => 'expiredToken',
                'accountId' => '123456789012',
                'expiresAt' => $expiration
            ],
            'tokenType' => 'aws_sigv4',
            'refreshToken' => 'testRefresh',
            'idToken' => 'testId',
            'clientId' => 'arn:aws:signin:::devtools/same-device',
            'dpopKey' => "-----BEGIN EC PRIVATE KEY-----\n" .
                "MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
                "AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
                "rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
                "-----END EC PRIVATE KEY-----"
        ];
        
        file_put_contents($tokenFile, json_encode($tokenData));
        
        // Set up mock client with successful refresh
        $mockClient = $this->getTestClient(
            'Signin',
            ['credentials' => false, 'signature_version' => 'dpop']
        );
        
        $refreshResult = new Result([
            'tokenOutput' => [
                'refreshToken' => 'newRefresh',
                'accessToken' => [
                    'accessKeyId' => 'refreshedKey',
                    'secretAccessKey' => 'refreshedSecret',
                    'sessionToken' => 'refreshedToken',
                ],
                'expiresIn' => 3600
            ]
        ]);
        
        $this->addMockResults($mockClient, [$refreshResult]);
        
        $provider = new LoginCredentialProvider(
            'default',
            'us-west-2'
        );
        
        $reflection = new \ReflectionClass($provider);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setValue($provider, $mockClient);
        
        // Make cache file read-only to prevent writes
        chmod($tokenFile, 0444);

        // This should succeed despite write failure
        $credentials = @$provider()->wait();
        
        // refreshed credentials
        $this->assertEquals('refreshedKey', $credentials->getAccessKeyId());
        $this->assertEquals('refreshedSecret', $credentials->getSecretKey());
        $this->assertEquals('refreshedToken', $credentials->getSecurityToken());
        $this->assertEquals('123456789012', $credentials->getAccountId());
        
        // cache file was not updated
        $cacheContent = json_decode(file_get_contents($tokenFile), true);
        $this->assertEquals('expiredKey', $cacheContent['accessToken']['accessKeyId']);
        $this->assertEquals('testRefresh', $cacheContent['refreshToken']); // Old refresh token
    }
}
