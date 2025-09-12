<?php
namespace Aws\Test\Sts;

use Aws\Api\DateTimeResult;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Credentials\CredentialSources;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\Exception\CredentialsException;
use Aws\LruArrayCache;
use Aws\Result;
use Aws\Sts\RegionalEndpoints\Configuration;
use Aws\Sts\StsClient;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Uri;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Sts\StsClient
 */
class StsClientTest extends TestCase
{
    private $originalEnv = [];
    private $tempFiles = [];

    protected function setUp(): void
    {
        parent::setUp();
        // Store original environment variables that might be modified
        $this->originalEnv = [
            CredentialProvider::ENV_ARN => getenv(CredentialProvider::ENV_ARN),
            CredentialProvider::ENV_ROLE_SESSION_NAME => getenv(CredentialProvider::ENV_ROLE_SESSION_NAME),
            CredentialProvider::ENV_TOKEN_FILE => getenv(CredentialProvider::ENV_TOKEN_FILE),
        ];
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Restore original environment variables
        foreach ($this->originalEnv as $key => $value) {
            if ($value !== false) {
                putenv("{$key}={$value}");
            } else {
                putenv("{$key}=");
            }
        }

        // Clean up temporary files
        foreach ($this->tempFiles as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $this->tempFiles = [];
    }

    public function testCanCreateCredentialsObjectFromStsResult()
    {
        $result = new Result([
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken' => 'baz',
                'Expiration' => DateTimeResult::fromEpoch(time() + 10),
            ]
        ]);

        $client = new StsClient(['region' => 'us-east-1', 'version' => 'latest']);
        $credentials = $client->createCredentials($result);
        $this->assertInstanceOf(
            CredentialsInterface::class,
            $credentials
        );
        $this->assertSame('foo', $credentials->getAccessKeyId());
        $this->assertSame('bar', $credentials->getSecretKey());
        $this->assertSame('baz', $credentials->getSecurityToken());
        $this->assertIsInt($credentials->getExpiration());
        $this->assertFalse($credentials->isExpired());
    }

    public function testThrowsExceptionWhenCreatingCredentialsFromInvalidInput()
    {
        $this->expectExceptionMessage("Result contains no credentials");
        $this->expectException(\InvalidArgumentException::class);
        $client = new StsClient(['region' => 'us-east-1', 'version' => 'latest']);
        $client->createCredentials(new Result());
    }

    public function testAddsStsRegionalEndpointsArgument()
    {
        $this->expectExceptionMessage("Configuration parameter must either be 'legacy' or 'regional'.");
        $this->expectException(\InvalidArgumentException::class);
        new StsClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'sts_regional_endpoints' => 'trigger_exception'
        ]);
    }

    public function testAddsStsRegionalEndpointsCacheArgument()
    {
        // Create cache object
        $cache = new LruArrayCache();
        $cache->set('aws_sts_regional_endpoints_config', new Configuration('regional'));

        // Create client using cached endpoints config
        $client = new StsClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'sts_regional_endpoints' => $cache
        ]);

        // Get the expected Uri from the PartitionEndpointProvider
        $provider = PartitionEndpointProvider::defaultProvider([
            'sts_regional_endpoints' => 'regional'
        ]);
        $endpoint = $provider([
            'service' => 'sts',
            'region' => 'us-east-1',
        ]);
        $uri = new Uri($endpoint['endpoint']);

        $this->assertSame($uri->getHost(), $client->getEndpoint()->getHost());
    }

    public function testCanCreateCredentialsObjectFromStsResultWithAssumedRoleUser()
    {
        $testAccountId = '123456789012';
        $result = new Result([
            'AssumedRoleUser' => [
                'Arn' => "arn:aws:iam::$testAccountId:user/test-user-1"
            ],
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken' => 'baz',
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ]
        ]);

        $client = new StsClient(['region' => 'us-east-1', 'version' => 'latest']);
        $credentials = $client->createCredentials($result);
        $this->assertInstanceOf(
            CredentialsInterface::class,
            $credentials
        );
        $this->assertSame('foo', $credentials->getAccessKeyId());
        $this->assertSame('bar', $credentials->getSecretKey());
        $this->assertSame('baz', $credentials->getSecurityToken());
        $this->assertSame($testAccountId, $credentials->getAccountId());
        $this->assertIsInt($credentials->getExpiration());
        $this->assertFalse($credentials->isExpired());
    }

    public function testCanCreateCredentialsObjectFromStsResultWithFederatedUser()
    {
        $result = new Result([
            'FederatedUser' => [
                'Arn' => 'arn:aws:iam::foobar:user/test-user-1'
            ],
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken' => 'baz',
                'Expiration' => DateTimeResult::fromEpoch(time() + 10)
            ]
        ]);

        $client = new StsClient(['region' => 'us-east-1', 'version' => 'latest']);
        $credentials = $client->createCredentials($result);
        $this->assertInstanceOf(
            CredentialsInterface::class,
            $credentials
        );
        $this->assertSame('foo', $credentials->getAccessKeyId());
        $this->assertSame('bar', $credentials->getSecretKey());
        $this->assertSame('baz', $credentials->getSecurityToken());
        $this->assertSame('foobar', $credentials->getAccountId());
        $this->assertIsInt($credentials->getExpiration());
        $this->assertFalse($credentials->isExpired());
    }

    /**
     * @dataProvider stsAssumeRoleOperationsDataProvider
     *
     * @return void
     */
    public function testStsAssumeRoleOperationsWithAccountId($response, $expected)
    {
        $operation = 'assumeRole';
        $stsClient = $this->getTestStsClient($operation, $response);
        $params = [
            'client' => $stsClient,
            'assume_role_params' => [
                'RoleArn' => 'arn:aws:sts::123456789012:assumed-role/test-role/Name',
                'RoleSessionName' => 'TestSession'
            ]
        ];
        $provider = CredentialProvider::assumeRole($params);
        $response = $provider()->wait();
        $expected = $this->normalizeExpectedResponse($expected);

        self::assertSame($expected->toArray(), $response->toArray());
    }

    public function stsAssumeRoleOperationsDataProvider(): array
    {
        return [
            'Sts::AssumeRole' => [
                'response' => [
                    "AssumedRoleUser" => [
                        "AssumedRoleId" => "roleId",
                        "Arn" => "arn:aws:sts::foobar:assumed-role/assume-role-integration-test-role/Name"
                    ],
                    "Credentials" => [
                        "AccessKeyId" => "foo",
                        "SecretAccessKey" => "bar",
                        "SessionToken" => "baz"
                    ]
                ],
                'expected' => [
                    "accountId" => "foobar",
                    "accessKeyId" => "foo",
                    "secretAccessKey" => "bar",
                    "sessionToken" => "baz",
                    "source" => CredentialSources::STS_ASSUME_ROLE
                ]
            ]
        ];
    }

    /**
     * @dataProvider stsAssumeRoleWithSAMLOperationsDataProvider
     */
    public function testStsAssumeRoleWithSAMLOperationsWithAccountId(
        $response,
        $expected
    ): void
    {
        $operation = 'assumeRoleWithSAML';
        $stsClient = $this->getTestStsClient($operation, $response);
        $provider = function () use($stsClient) {
            $params = [
                'RoleArn' => 'arn:aws:sts::123456789012:assumed-role/test-role/Name',
                'PrincipalArn' => 'arn:aws:sts::123456789012:assumed-role/test-role/Name',
                'SAMLAssertion' => 'VGhpcyBpcyBhIHRlc3QgYXNzZXJ0aW9u'
            ];

            return $stsClient->assumeRoleWithSAMLAsync($params)
                -> then(function (Result $result) use ($stsClient) {
                    return $stsClient->createCredentials($result);
                }) -> otherwise(function (\RuntimeException $exception) {
                    throw new CredentialsException(
                        "Error in retrieving assume role credentials.",
                        0,
                        $exception
                    );
                });
        };
        $response = $provider()->wait();
        $expected = $this->normalizeExpectedResponse($expected);

        self::assertSame($expected->toArray(), $response->toArray());
    }

    public function stsAssumeRoleWithSAMLOperationsDataProvider(): array
    {
        return [
            'Sts::AssumeRoleWithSaml' => [
                'response' => [
                    "AssumedRoleUser" => [
                        "AssumedRoleId" => "roleId",
                        "Arn" => "arn:aws:sts::foobar:assumed-role/assume-role-integration-test-role/Name"
                    ],
                    "Credentials" => [
                        "AccessKeyId" => "foo",
                        "SecretAccessKey" => "bar",
                        "SessionToken" => "baz"
                    ]
                ],
                'expected' => [
                    "accountId" => "foobar",
                    "accessKeyId" => "foo",
                    "secretAccessKey" => "bar",
                    "sessionToken" => "baz"
                ]
            ]
        ];
    }

    /**
     * @dataProvider stsAssumeRoleWithWebIdentityOperationsDataProvider
     */
    public function testStsAssumeRoleWithWebIdentityOperationsWithAccountId(
        $response,
        $expected
    ) :void
    {
        $operation = 'assumeRoleWithWebIdentity';
        $stsClient = $this->getTestStsClient($operation, $response);

        // Create token file and track it for cleanup
        $tokenPath = $this->createTestWebIdentityToken();

        // Set environment variables
        putenv(CredentialProvider::ENV_ARN . '=arn:aws:sts::123456789012:assumed-role/test-role/Name');
        putenv(CredentialProvider::ENV_ROLE_SESSION_NAME . '=TestSession');
        putenv(CredentialProvider::ENV_TOKEN_FILE . '=' . $tokenPath);

        $params = [
            'stsClient' => $stsClient,
            'region' => 'us-east-1'
        ];
        $provider = CredentialProvider::assumeRoleWithWebIdentityCredentialProvider($params);
        $response = $provider()->wait();
        $expected = $this->normalizeExpectedResponse($expected);

        self::assertSame($expected->toArray(), $response->toArray());
    }

    public function stsAssumeRoleWithWebIdentityOperationsDataProvider(): array
    {
        return [
            'Sts::AssumeRoleWithWebIdentity' => [
                'response' => [
                    "AssumedRoleUser" => [
                        "AssumedRoleId" => "roleId",
                        "Arn" => "arn:aws:sts::foobar:assumed-role/assume-role-integration-test-role/Name"
                    ],
                    "Credentials" => [
                        "AccessKeyId" => "foo",
                        "SecretAccessKey" => "bar",
                        "SessionToken" => "baz"
                    ]
                ],
                'expected' => [
                    "accountId" => "foobar",
                    "accessKeyId" => "foo",
                    "secretAccessKey" => "bar",
                    "sessionToken" => "baz",
                    "source" => CredentialSources::ENVIRONMENT_STS_WEB_ID_TOKEN
                ]
            ]
        ];
    }

    /**
     * @dataProvider stsGetFederationTokenOperationsDataProvider
     */
    public function testStsGetFederationTokenOperationsWithAccountId(
        $response,
        $expected
    ): void
    {
        $operation = 'getFederationToken';
        $stsClient = $this->getTestStsClient($operation, $response);
        $provider = function () use ($stsClient) {
            $params = [
                'Name' => 'TestUserName'
            ];

            return $stsClient->getFederationTokenAsync($params)
                -> then(function (Result $result) use ($stsClient) {
                    return $stsClient->createCredentials($result);
                }) -> otherwise(function (\RuntimeException $exception) {
                    throw new CredentialsException(
                        "Error in retrieving assume role credentials.",
                        0,
                        $exception
                    );
                });
        };
        $response = $provider()->wait();
        $expected = $this->normalizeExpectedResponse($expected);

        self::assertSame($expected->toArray(), $response->toArray());
    }

    public function stsGetFederationTokenOperationsDataProvider(): array
    {
        return [
            'Sts::GetFederationToken' => [
                'response' => [
                    "FederatedUser" => [
                        "FederatedUserId" => "roleId",
                        "Arn" => "arn:aws:sts::foobar:assumed-role/assume-role-integration-test-role/Name"
                    ],
                    "Credentials" => [
                        "AccessKeyId" => "foo",
                        "SecretAccessKey" => "bar",
                        "SessionToken" => "baz"
                    ]
                ],
                'expected' => [
                    "accountId" => "foobar",
                    "accessKeyId" => "foo",
                    "secretAccessKey" => "bar",
                    "sessionToken" => "baz"
                ]
            ],
        ];
    }

    public function testCreateCredentialsAddSource(): void
    {
        $result = new Result([
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'foo'
            ]
        ]);
        $stsClient = new StsClient([
            'region' => 'us-east-1'
        ]);
        $credentials = $stsClient->createCredentials(
            $result,
            CredentialSources::PROFILE
        );
        $this->assertNotEmpty($credentials->getSource());
        $this->assertEquals(
            CredentialSources::PROFILE,
            $credentials->getSource()
        );
    }

    private function getTestStsClient($operation, $response)
    {
        $stsClient = $this->getMockBuilder(StsClient::class)
            -> disableOriginalConstructor()
            -> setMethods(['__call'])
            -> getMock();
        $stsClient->method('__call')
            -> willReturnCallback(function ($callOperation) use ($operation, $response) {
                if (($callOperation === $operation . 'Async')) {
                    return Create::promiseFor(
                        new Result(
                            $response
                        )
                    );
                }

                if (($callOperation === $operation)) {
                    return new Result(
                        $response
                    );
                }

                return null;
            });

        return $stsClient;
    }

    /**
     * This method normalize an expected response, supplied by data providers,
     * into a valid credentials object.
     *
     * @param array $expectedResponse the expected response to normalize.
     *
     * @return Credentials
     */
    private function normalizeExpectedResponse(array $expectedResponse): Credentials
    {
        return new Credentials(
            $expectedResponse['accessKeyId'] ?? null,
                $expectedResponse['secretAccessKey'] ?? null,
                $expectedResponse['sessionToken'] ?? null,
                $expectedResponse['expires'] ?? null,
                $expectedResponse['accountId'] ?? null,
            $expectedResponse['source'] ?? null
        );
    }

    /**
     * This method creates a test token file at a temporary location.
     *
     * @return string the path for the test token file created.
     */
    private function createTestWebIdentityToken(): string
    {
        $tokenPath = tempnam(sys_get_temp_dir(), 'aws_test_token_');
        file_put_contents($tokenPath, 'token');
        $this->tempFiles[] = $tokenPath; // Track for cleanup

        return $tokenPath;
    }
}
