<?php
namespace Aws\Test;

use Aws\Api\ApiProvider;
use Aws\Api\DateTimeResult;
use Aws\CloudWatch\CloudWatchClient;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Credentials\AssumeRoleWithWebIdentityCredentialProvider;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Crypto\MaterialsProvider;
use Aws\Crypto\MaterialsProviderV2;
use Aws\DynamoDb\DynamoDbClient;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\EndpointProviderV2;
use Aws\MetricsBuilder;
use Aws\Result;
use Aws\S3\Crypto\S3EncryptionClient;
use Aws\S3\Crypto\S3EncryptionClientV2;
use Aws\S3\S3Client;
use Aws\S3\Transfer;
use Aws\Sdk;
use Aws\SSO\SSOClient;
use Aws\Sts\StsClient;
use Aws\Token\SsoTokenProvider;
use Aws\UserAgentMiddleware;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use function Aws\dir_iterator;

/**
 * @covers \Aws\UserAgentMiddleware
 * @runInSeparateProcess
 */
class UserAgentMiddlewareTest extends TestCase
{
    use MetricsBuilderTestTrait;

    /** @var string */
    private $tempDir;
    /** @var string */
    private $awsDir;
    /** @var array */
    private $envValues = [];

    protected function setUp(): void
    {
        $this->envValues = [
            'AWS_EXECUTION_ENV' => getenv('AWS_EXECUTION_ENV'),
            'AWS_ACCESS_KEY_ID' => getenv('AWS_ACCESS_KEY_ID'),
            'AWS_SECRET_ACCESS_KEY' => getenv('AWS_SECRET_ACCESS_KEY'),
            'HOME' => getenv('HOME'),
            CredentialProvider::ENV_ARN => getenv(
                CredentialProvider::ENV_ARN
            ),
            CredentialProvider::ENV_TOKEN_FILE => getenv(
                CredentialProvider::ENV_TOKEN_FILE
            ),
            CredentialProvider::ENV_ROLE_SESSION_NAME => getenv(
                CredentialProvider::ENV_ROLE_SESSION_NAME
            ),
            CredentialProvider::ENV_PROFILE => getenv(
                CredentialProvider::ENV_PROFILE
            ),
        ];
        // Create temp dirs
        $tempDir = sys_get_temp_dir() . '/test-user-agent';
        $awsDir = $tempDir . "/.aws";
        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0777, true);
            mkdir($awsDir, 0777, true);
        }

        $this->tempDir = $tempDir;
        $this->awsDir = $awsDir;
        // Clean up env
        putenv(CredentialProvider::ENV_ARN);
        putenv(CredentialProvider::ENV_TOKEN_FILE);
        putenv(CredentialProvider::ENV_ROLE_SESSION_NAME);
        putenv(CredentialProvider::ENV_PROFILE);
    }

    protected function tearDown(): void
    {
        foreach ($this->envValues as $key => $envValue) {
            if ($envValue === false) {
                putenv("$key");
            } else {
                putenv("$key=$envValue");
            }
        }

        if (is_dir($this->tempDir)) {
            $it = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($this->tempDir, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ($it as $file) {
                if ($file->isDir() && !is_link($file->getPathname())) {
                    @rmdir($file->getPathname());
                } else {
                    @unlink($file->getPathname());
                }
            }

            @rmdir($this->tempDir);
        }
    }

    /**
     * Tests the user agent header is appended into the request headers.
     *
     * @return void
     */
    public function testAppendsUserAgentHeader()
    {
        $handler = UserAgentMiddleware::wrap([]);
        $middleware = $handler(function (
            CommandInterface $command,
            RequestInterface $request
        ) {
            $userAgent = $request->getHeaderLine('User-Agent');

            $this->assertNotEmpty($userAgent);
        });
        $request = new Request('post', 'foo', [], 'buzz');
        $middleware(new Command('buzz'), $request);
    }

    /**
     * Tests the user agent header value contains the expected
     * component.
     *
     * @dataProvider userAgentCasesDataProvider
     * @param array $args
     * @param string $expected
     *
     * @return void
     */
    public function testUserAgentContainsValue(array $args, string $expected)
    {
        $handler = UserAgentMiddleware::wrap($args);
        $middleware = $handler(function (
            CommandInterface $command,
            RequestInterface $request
        ) use ($expected) {
            if (empty($expected)) {
                $this->markTestSkipped('Expected value is empty');
            }
            $userAgent = $request->getHeaderLine('User-Agent');
            $userAgentValues = explode(' ', $userAgent);

            $this->assertTrue(in_array($expected, $userAgentValues));
        });
        $request = new Request('post', 'foo', [], 'buzz');
        $middleware(new Command('buzz'), $request);
    }

    /**
     * It returns a generator that yields an argument and an expected value
     * per iteration.
     * Example: yield [$arguments, 'ExpectedValue']
     *
     * @return \Generator
     */
    public function userAgentCasesDataProvider(): \Generator
    {
        $userAgentCases = [
            'sdkVersion' => [[], 'aws-sdk-php/' . Sdk::VERSION],
            'userAgentVersion' => [
                [], 'ua/' . UserAgentMiddleware::AGENT_VERSION
            ],
            'hhvmVersion' => function (): array {
                if (defined('HHVM_VERSION')) {
                    return [[], 'HHVM/' . HHVM_VERSION];
                }

                return [[], ""];
            },
            'osName' => function (): array {
                $disabledFunctions = explode(
                    ',',
                    ini_get('disable_functions')
                );
                if (function_exists('php_uname')
                    && !in_array(
                        'php_uname',
                        $disabledFunctions,
                        true
                    )
                ) {
                    $osName = "OS/" . php_uname('s') . '#' . php_uname('r');
                    if (!empty($osName)) {
                        return [[], $osName];
                    }
                }

                return [[], ""];
            },
            'langVersion' => [[], 'lang/php#' . phpversion()],
            'execEnv' => function (): array {
                $expectedEnv = "LambdaFooEnvironment";
                putenv("AWS_EXECUTION_ENV={$expectedEnv}");

                return [[], $expectedEnv];
            },
            'appId' => function (): array {
                $expectedAppId = "FooAppId";
                $args = [
                    'app_id' => $expectedAppId
                ];

                return [$args, "app/{$expectedAppId}"];
            },
            'metricsWithEndpoint' => function (): array {
                $expectedEndpoint = "https://foo-endpoint.com";
                $args = [
                    'endpoint' => $expectedEndpoint,
                    'endpoint_override' => true,
                ];

                return [$args, 'm/' . MetricsBuilder::ENDPOINT_OVERRIDE];
            },
            'metricsWithRetryConfigArrayStandardMode' => function (): array {
                $args = [
                    'retries' => [
                        'mode' => 'standard'
                    ]
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_STANDARD];
            },
            'metricsWithRetryConfigArrayAdaptiveMode' => function (): array {
                $args = [
                    'retries' => [
                        'mode' => 'adaptive'
                    ]
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_ADAPTIVE];
            },
            'metricsWithRetryConfigArrayLegacyMode' => function (): array {
                $args = [
                    'retries' => [
                        'mode' => 'legacy'
                    ]
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_LEGACY];
            },
            'metricsWithRetryConfigStandardMode' => function (): array {
                $args = [
                    'retries' => new \Aws\Retry\Configuration(
                        'standard',
                        10
                    )
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_STANDARD];
            },
            'metricsWithRetryConfigAdaptiveMode' => function (): array {
                $args = [
                    'retries' => new \Aws\Retry\Configuration(
                    'adaptive',
                    10
                    )
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_ADAPTIVE];
            },
            'metricsWithRetryConfigLegacyMode' => function (): array {
                $args = [
                    'retries' => new \Aws\Retry\Configuration(
                        'legacy',
                        10
                    )
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_LEGACY];
            },
            'cfgWithEndpointDiscoveryConfigArray' => function (): array {
                $args = [
                    'endpoint_discovery' => [
                        'enabled' => true,
                        'cache_limit' => 1000
                    ]
                ];

                return [$args, 'cfg/endpoint-discovery'];
            },
            'cfgWithEndpointDiscoveryConfig' => function (): array {
                $args = [
                    'endpoint_discovery' => new \Aws\EndpointDiscovery\Configuration (
                        true,
                        1000
                    ),
                ];

                return [$args, 'cfg/endpoint-discovery'];
            }
        ];

        foreach ($userAgentCases as $key => $case) {
            if (is_callable($case)) {
                yield $key => $case();
            } else {
                yield  $key => $case;
            }
        }
    }

    /**
     * Tests the user agent header values starts with the SDK/version string.
     * Example: aws-sdk-php/3.x.x
     *
     * @return void
     */
    public function testUserAgentValueStartsWithSdkVersionString()
    {
        $handler = UserAgentMiddleware::wrap([]);
        $middleware = $handler(function (
            CommandInterface $command,
            RequestInterface $request
        ) {
            $userAgent = $request->getHeaderLine('User-Agent');
            $pattern = "aws-sdk-php/" . Sdk::VERSION;

            $this->assertTrue(
                substr($userAgent, 0, strlen($pattern)) === $pattern
            );
        });
        $request = new Request('post', 'foo', [], 'buzz');
        $middleware(new Command('buzz'), $request);
    }

    /**
     * Tests user agent captures the waiter metric.
     *
     * @return void
     */
    public function testUserAgentCaptureWaiterMetric()
    {
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (RequestInterface $request) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(in_array(MetricsBuilder::WAITER, $metrics));

                return new Response();
            }
        ]);
        $waiter = $s3Client->getWaiter('BucketExists', ['Bucket' => 'foo-bucket']);
        $waiter->promise()->wait();
    }

    /**
     * Tests user agent captures the paginator metric.
     *
     * @return void
     */
    public function testUserAgentCapturePaginatorMetric()
    {
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (RequestInterface $request) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::PAGINATOR, $metrics)
                );

                return new Response();
            }
        ]);
        $paginator = $s3Client->getPaginator('ListObjects', ['Bucket' => 'foo-bucket']);
        $paginator->current();
    }

    /**
     * Tests user agent captures retry config metric.
     *
     * @dataProvider retryConfigMetricProvider
     *
     * @return void
     */
    public function testUserAgentCaptureRetryConfigMetric(
        $retryMode,
        $expectedMetric
    )
    {
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'retries' => [
                'mode' => $retryMode
            ],
            'http_handler' => function (
                RequestInterface $request
            ) use($expectedMetric) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array($expectedMetric, $metrics)
                );

                return new Response();
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Retry config metrics provider.
     *
     * @return array[]
     */
    public function retryConfigMetricProvider(): array
    {
        return [
            'retryAdaptive' => [
                'mode' => 'adaptive',
                'metric' => MetricsBuilder::RETRY_MODE_ADAPTIVE
            ],
            'retryStandard' => [
                'mode' => 'standard',
                'metric' => MetricsBuilder::RETRY_MODE_STANDARD
            ],
            'retryLegacy' => [
                'mode' => 'legacy',
                'metric' => MetricsBuilder::RETRY_MODE_LEGACY
            ],
        ];
    }

    /**
     * Tests user agent captures the s3 transfer metric.
     *
     * @return void
     */
    public function testUserAgentCaptureS3TransferMetric()
    {
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::S3_TRANSFER, $metrics)
                );

                return new Response();
            }
        ]);
        $transfer = new Transfer($s3Client, 's3://foo', './buzz');
        $transfer->promise()->wait();
    }

    /**
     * Tests user agent captures the s3 encryption client v1 metric.
     *
     * @return void
     */
    public function testUserAgentCaptureS3CryptoV1Metric()
    {
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'handler' => function (
                CommandInterface $_,
                RequestInterface $request
            ) {

                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::S3_CRYPTO_V1N, $metrics)
                );

                return new Result([
                    'Body' => 'This is a test body'
                ]);
            }
        ]);
        $encryptionClient = $this->getMockBuilder(S3EncryptionClient::class)
            ->setConstructorArgs([$s3Client])
            ->setMethods(['decrypt'])
            ->getMock();
        $encryptionClient->expects($this->once())
            ->method('decrypt')
            ->withAnyParameters()
            ->willReturn(base64_encode('Test body'));
        $materialProvider = $this->createMock(MaterialsProvider::class);
        $materialProvider->expects($this->once())
            ->method('fromDecryptionEnvelope')
            ->withAnyParameters()
            ->willReturn($materialProvider);
        $encryptionClient->getObject([
            'Bucket' => 'foo',
            'Key' => 'foo',
            '@MaterialsProvider' => $materialProvider
        ]);
    }

    /**
     * Tests user agent captures the s3 crypto v2 metric.
     *
     * @return void
     */
    public function testUserAgentCaptureS3CryptoV2Metric()
    {
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'handler' => function (
                CommandInterface $_,
                RequestInterface $request
            ) {

                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::S3_CRYPTO_V2, $metrics)
                );

                return new Result([
                    'Body' => 'This is a test body'
                ]);
            }
        ]);
        $encryptionClient = $this->getMockBuilder(S3EncryptionClientV2::class)
            ->setConstructorArgs([$s3Client])
            ->setMethods(['decrypt'])
            ->getMock();
        $encryptionClient->expects($this->once())
            ->method('decrypt')
            ->withAnyParameters()
            ->willReturn(base64_encode('Test body'));
        $materialProvider = $this->createMock(MaterialsProviderV2::class);
        $encryptionClient->getObject([
            'Bucket' => 'foo',
            'Key' => 'foo',
            '@MaterialsProvider' => $materialProvider,
            '@SecurityProfile' => 'V2'
        ]);
    }

    /**
     * Tests user agent captures the s3 express signature metric.
     *
     * @return void
     */
    public function testUserAgentCaptureS3ExpressBucketMetric()
    {
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'signature_version' => 'v4-s3express',
            's3_express_identity_provider' => function ($_) {
                return Create::promiseFor(
                    new Credentials(
                        'foo',
                        'foo',
                        'foo',
                        null,
                        null
                    )
                );
            },
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::S3_EXPRESS_BUCKET, $metrics)
                );

                return new Response();
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Tests user agent captures the s3 v4a signature metric.
     *
     * @return void
     */
    public function testUserAgentCaptureSignatureV4AMetric()
    {
        if (!extension_loaded('awscrt')) {
            $this->markTestSkipped('awscrt extension is not loaded!');
        }

        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'signature_version' => 'v4a',
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::SIGV4A_SIGNING, $metrics)
                );

                return new Response();
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Tests user agent captures the gzip request compression format.
     *
     * @return void
     */
    public function testUserAgentCaptureGzipRequestCompressionMetric()
    {
        $cloudWatchClient = new CloudWatchClient([
            'region' => 'us-east-2',
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::GZIP_REQUEST_COMPRESSION, $metrics)
                );

                return new Response(
                    200,
                    [],
                    '<?xml version="1.0" encoding="UTF-8"?><Node></Node>'
                );
            }
        ]);
        $cloudWatchClient->putMetricData([
            'Namespace' => 'foo',
            'MetricData' => [],
            '@request_min_compression_size_bytes' => 8
        ]);
    }

    /**
     * Tests user agent captures a resolved account id metric.
     *
     * @return void
     */
    public function testUserAgentCaptureResolvedAccountIdMetric()
    {
        $dynamoDbClient = $this->getTestDynamoDBClient(
            [
                'credentials' => new Credentials(
                    'foo',
                    'foo',
                    'foo',
                    null,
                    '123456789012'
                ),
                'http_handler' => function (
                    RequestInterface $request
                ) {
                    $metrics = $this->getMetricsAsArray($request);

                    $this->assertTrue(
                        in_array(MetricsBuilder::RESOLVED_ACCOUNT_ID, $metrics)
                    );

                    return new Response(
                        200,
                        [],
                        '{}'
                    );
                }
            ]
        );
        $dynamoDbClient->listTables();
    }

    /**
     * Tests user agent captures the accountIdEndpointMode metric.
     *
     * @return void
     */
    public function testUserAgentCaptureResolvedAccountIdEndpointMode() {
        $accountIdModesMetrics = [
            'preferred' => MetricsBuilder::ACCOUNT_ID_MODE_PREFERRED,
            'required' => MetricsBuilder::ACCOUNT_ID_MODE_REQUIRED,
            'disabled' => MetricsBuilder::ACCOUNT_ID_MODE_DISABLED,
        ];
        foreach ($accountIdModesMetrics as $config => $metric) {
            $dynamoDbClient = $this->getTestDynamoDBClient(
                [
                    'account_id_endpoint_mode' => $config,
                    'credentials' => new Credentials(
                        'foo',
                        'foo',
                        'foo',
                        null,
                        '123456789012'
                    ),
                    'http_handler' => function (
                        RequestInterface $request
                    ) use ($metric) {
                        $metrics = $this->getMetricsAsArray($request);

                        $this->assertTrue(
                            in_array($metric, $metrics)
                        );

                        return new Response(
                            200,
                            [],
                            '{}'
                        );
                    }
                ]
            );
            $dynamoDbClient->listTables();
        }
    }

    /**
     * Tests user agent captures a resolved account id metric.
     *
     * @return void
     */
    public function testUserAgentCaptureAccountIdEndpointMetric()
    {
        $dynamoDbClient = $this->getTestDynamoDBClient(
            [
                'credentials' => new Credentials(
                    'foo',
                    'foo',
                    'foo',
                    null,
                    '123456789012'
                ),
                'http_handler' => function (
                    RequestInterface $request
                ) {
                    $metrics = $this->getMetricsAsArray($request);

                    $this->assertTrue(
                        in_array(MetricsBuilder::ACCOUNT_ID_ENDPOINT, $metrics)
                    );

                    return new Response(
                        200,
                        [],
                        '{}'
                    );
                }
            ]
        );
        $dynamoDbClient->listTables();
    }

    /**
     * Returns a test dynamodb client,
     * where rules for resolving account endpoints
     * are present.
     *
     * @param array $args
     *
     * @return DynamoDbClient
     */
    private function getTestDynamoDBClient(
        array $args
    ): DynamoDbClient
    {
        try {
            $ruleSet = $this->getDynamoDBTestRuleSet();
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }
        return new DynamoDbClient([
            'api_provider' => ApiProvider::filesystem(
                __DIR__ . '/fixtures/aws_client_test'
            ),
            'endpoint_provider' => new EndpointProviderV2(
                $ruleSet,
                EndpointDefinitionProvider::getPartitions()
            ),
            'region' => 'us-east-2',
        ] + $args);
    }

    /**
     * @throws \Exception
     */
    private function getDynamoDBTestRuleSet(): array
    {
        $baseDir = __DIR__ . '/fixtures/aws_client_test/dynamodb';
        $ruleSetFile = $baseDir . '/2012-08-10/endpoint-rule-set-1.json';
        if (!file_exists($ruleSetFile)) {
            throw new \Exception(
                'DynamoDB rule set file does not exist at: ' . $ruleSetFile
            );
        }

        return json_decode(file_get_contents($ruleSetFile), true);
    }

    /**
     * Tests user agent captures the flexible checksum metric.
     *
     * @param string $algorithm
     * @param string $checksumMetric
     * @param bool $supported
     *
     * @dataProvider flexibleChecksumTestProvider
     *
     * @return void
     */
    public function testUserAgentCaptureFlexibleChecksumMetric(
        string $algorithm,
        string $checksumMetric,
        bool $supported = true
    )
    {
        if (!$supported) {
            $this->markTestSkipped(
                "Algorithm {$algorithm} is not supported!"
            );
        }

        $s3Client = new S3Client([
            'region' => 'us-west-2',
            'api_provider' => ApiProvider::filesystem(__DIR__ . '/S3/fixtures'),
            'http_handler' => function (RequestInterface $request)
                use ($checksumMetric) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array($checksumMetric, $metrics)
                );

                return new Response(
                    200,
                    [],
                    '<?xml version="1.0" encoding="UTF-8"?><Node></Node>'
                );
            }
        ]);
        $s3Client->putObject([
            'Bucket' => 'foo',
            'Key' => 'foo',
            'Body' => 'Test body',
            'ChecksumAlgorithm' => $algorithm
        ]);
    }

    /**
     * Data provider to test the different checksum metrics.
     *
     * @return array[]
     */
    public function flexibleChecksumTestProvider(): array
    {
        return [
            'metric_checksum_crc32' => [
                'algorithm' => 'crc32',
                'expected_metric' => MetricsBuilder::FLEXIBLE_CHECKSUMS_REQ_CRC32
            ],
            'metric_checksum_crc32c' => [
                'algorithm' => 'crc32c',
                'expected_metric' => MetricsBuilder::FLEXIBLE_CHECKSUMS_REQ_CRC32C,
                'supported' => extension_loaded('awscrt'),
            ],
            'metric_checksum_crc64' => [
                'algorithm' => 'crc64',
                'expected_metric' => MetricsBuilder::FLEXIBLE_CHECKSUMS_REQ_CRC64,
                'supported' => false,
            ],
            'metric_checksum_sha1' => [
                'algorithm' => 'sha1',
                'expected_metric' => MetricsBuilder::FLEXIBLE_CHECKSUMS_REQ_SHA1
            ],
            'metric_checksum_sha256' => [
                'algorithm' => 'sha256',
                'expected_metric' =>
                    MetricsBuilder::FLEXIBLE_CHECKSUMS_REQ_SHA256
            ],
        ];
    }

    /**
     * Test user agent captures metric from client instantiation credentials.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsCodeMetric()
    {
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => [
                'key' => 'foo',
                'secret' => 'foo'
            ],
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_CODE, $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Test user agent captures metric from environment credentials.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsEnvMetric()
    {
        putenv('AWS_ACCESS_KEY_ID=foo');
        putenv('AWS_SECRET_ACCESS_KEY=foo');
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_ENV_VARS, $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Test user agent captures metric from web id token defined by env
     * variables.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function testUserAgentCaptureCredentialsEnvStsWebIdTokenMetric()
    {
        $tokenPath = $this->awsDir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');
        $roleArn = 'arn:aws:iam::123456789012:role/role_name';
        // Set temporary env values
        putenv(CredentialProvider::ENV_ARN . "={$roleArn}");
        putenv(CredentialProvider::ENV_TOKEN_FILE . "={$tokenPath}");
        putenv(
            CredentialProvider::ENV_ROLE_SESSION_NAME . "=TestSession"
        );
        // End setting env values
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
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
        $credentials = CredentialProvider::assumeRoleWithWebIdentityCredentialProvider([
            'stsClient' => $stsClient
        ]);
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => $credentials,
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(
                        MetricsBuilder::CREDENTIALS_ENV_VARS_STS_WEB_ID_TOKEN,
                        $metrics
                    )
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Test user agent captures metric from sts assume role credentials.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsStsAssumeRoleMetric()
    {
        $stsClient = new StsClient([
            'region' => 'us-east-2',
            'handler' => function ($command, $request) {
                return Create::promiseFor(
                    new Result([
                        'Credentials' => [
                            'AccessKeyId' => 'foo',
                            'SecretAccessKey' => 'foo'
                        ]
                    ])
                );
            }
        ]);
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => CredentialProvider::assumeRole([
                'assume_role_params' => [
                    'RoleArn' => 'arn:aws:iam::account-id:role/role-name',
                    'RoleSessionName' => 'foo_session'
                ],
                'client' => $stsClient
            ]),
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_STS_ASSUME_ROLE, $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Test user agent captures metric from sts assume role with web identity
     * but not sourced from either env vars or profile.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsStsAssumeRoleWebIdMetric()
    {
        $tokenPath = $this->awsDir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');
        $stsClient = new StsClient([
            'region' => 'us-east-2',
            'handler' => function ($command, $request) {
                return Create::promiseFor(
                    new Result([
                        'Credentials' => [
                            'AccessKeyId' => 'foo',
                            'SecretAccessKey' => 'foo'
                        ]
                    ])
                );
            }
        ]);
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => new AssumeRoleWithWebIdentityCredentialProvider([
                'RoleArn' => 'arn:aws:iam::account-id:role/role-name',
                'RoleSessionName' => 'foo_session',
                'WebIdentityTokenFile' => $tokenPath,
                'client' => $stsClient
            ]),
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_STS_ASSUME_ROLE_WEB_ID, $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Test user agent captures metric from web id token defined by profile.
     *
     * @runTestsInSeparateProcesses
     *
     * @return void
     *
     * @throws \Exception
     */
    public function testUserAgentCaptureCredentialsProfileStsWebIdTokenMetric()
    {
        $tokenPath = $this->awsDir . '/my-token.jwt';
        $configPath = $this->awsDir . '/my-config';
        file_put_contents($tokenPath, 'token');
        $roleArn = 'arn:aws:iam::123456789012:role/role_name';
        $profileContent = <<<EOF
[metric-test-profile]
web_identity_token_file={$tokenPath}
role_arn=$roleArn
role_session_name=TestSession
EOF;
        file_put_contents($configPath, $profileContent);
        // Set temporary env values
        putenv(CredentialProvider::ENV_PROFILE . "=metric-test-profile");
        // End setting env values
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
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
        $credentials = CredentialProvider::assumeRoleWithWebIdentityCredentialProvider([
            'stsClient' => $stsClient,
            'filename' => $configPath
        ]);
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => $credentials,
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(
                        MetricsBuilder::CREDENTIALS_PROFILE_STS_WEB_ID_TOKEN,
                        $metrics
                    )
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Helper method to clean up temporary dirs.
     *
     * @param $dirPath
     *
     * @return void
     */
    private function cleanUpDir($dirPath): void
    {
        if (!is_dir($dirPath)) {
            return;
        }

        $files = dir_iterator($dirPath);
        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $filePath  = $dirPath . '/' . $file;
            if (is_file($filePath) || !is_dir($filePath)) {
                unlink($filePath);
            } elseif (is_dir($filePath)) {
                $this->cleanUpDir($filePath);
            }
        }

        rmdir($dirPath);
    }

    /**
     * Test user agent captures metric for credentials resolved from
     * a profile.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsProfileMetric()
    {
        $profile = 'metric-test-profile';
        $configPath = $this->awsDir . '/credentials';
        putenv("AWS_PROFILE=$profile");
        putenv("HOME=" . $this->tempDir);
        putenv("AWS_ACCESS_KEY_ID");
        putenv("AWS_SECRET_ACCESS_KEY");
        $profileContent = <<<EOF
[$profile]
aws_access_key_id=foo
aws_secret_access_key=foo
EOF;
        file_put_contents($configPath, $profileContent);
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_PROFILE, $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Test user agent captures metric for credentials resolved from IMDS.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsIMDSMetric()
    {
        $imdsCredentials = CredentialProvider::instanceProfile([
            'client' => $this->imdsTestHandler()
        ]);
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => $imdsCredentials,
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_IMDS, $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Creates a test IMDS http handler to mock request/response to/from IMDS.
     *
     * @return callable
     */
    private function imdsTestHandler(): callable
    {
        return function (RequestInterface $request) {
            $expiration = time() + 1000;
            if ($request->getMethod() === 'PUT' && $request->getUri()->getPath() === '/latest/api/token') {
                return Create::promiseFor(new Response(200, [], Utils::streamFor('')));
            } elseif ($request->getMethod() === 'GET') {
                switch ($request->getUri()->getPath()) {
                    case '/latest/meta-data/iam/security-credentials/':
                    case '/latest/meta-data/iam/security-credentials-extended/':
                        return Create::promiseFor(new Response(200, [], Utils::streamFor('MockProfile')));
                    case '/latest/meta-data/iam/security-credentials/MockProfile':
                    case '/latest/meta-data/iam/security-credentials-extended/MockProfile':
                        $jsonResponse = <<<EOF
{
    "Code": "Success",
    "AccessKeyId": "foo",
    "SecretAccessKey": "foo",
    "Token": "bazz",
    "Expiration": "@$expiration",
    "AccountId": "123456789012"
}
EOF;
                        return Create::promiseFor(
                            new Response(
                                200,
                                [],
                                Utils::streamFor(
                                    $jsonResponse
                                )
                            )
                        );
                }
            }

            return Create::rejectionFor(['exception' => new \Exception('Unexpected error!')]);
        };
    }

    /**
     * Test user agent captures metric for credentials resolved from ECS.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsHTTPMetric()
    {
        $ecsCredentials = CredentialProvider::ecsCredentials([
            'client' => $this->ecsTestHandler()
        ]);
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => $ecsCredentials,
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_HTTP, $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Creates a test ECS http handler to mock request/response to/from ECS.
     *
     * @return callable
     */
    private function ecsTestHandler(): callable
    {
        return function (RequestInterface $_) {
            $expiration = time() + 1000;
            $jsonResponse = <<<EOF
{
    "AccessKeyId": "foo",
    "SecretAccessKey": "foo",
    "Token": "bazz",
    "Expiration": "@$expiration",
    "AccountId": "123456789012"
}
EOF;
            return Create::promiseFor(new Response(200, [], $jsonResponse));
        };
    }

    /**
     * Test user agent captures metric for credentials sourced from a process.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsProcessMetric()
    {
        $profile = 'metric-test-profile';
        $configPath = $this->awsDir . '/my-config';
        $profileContent = <<<EOF
[$profile]
credential_process= echo '{"AccessKeyId":"foo","SecretAccessKey":"bar", "Version":1}'
EOF;
        file_put_contents($configPath, $profileContent);
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => CredentialProvider::process($profile, $configPath),
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_PROFILE_PROCESS,
                        $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Test user agent captures metric for credentials sourced from sso.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsSSOMetric()
    {
        $expiration = time() + 1000;
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
        $configPath = $this->awsDir . '/my-config';
        file_put_contents($configPath, $ini);

        $tokenFileDir = $this->awsDir . "/sso/cache/";
        if (!is_dir($tokenFileDir)) {
            mkdir($tokenFileDir, 0777, true);
        }

        putenv('HOME=' . $this->tempDir);

        $tokenLocation = SsoTokenProvider::getTokenLocation('TestSession');
        if (!is_dir(dirname($tokenLocation))) {
            mkdir(dirname($tokenLocation), 0777, true);
        }
        file_put_contents(
            $tokenLocation, $tokenFile
        );
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
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => CredentialProvider::sso(
                'default',
                $configPath,
                [
                    'ssoClient' => $ssoClient
                ]
            ),
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_PROFILE_SSO, $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Test user agent captures metric for credentials sourced from sso legacy.
     *
     * @return void
     */
    public function testUserAgentCaptureCredentialsSSOLegacyMetric()
    {
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
        $configPath = $this->awsDir . '/my-config';
        file_put_contents($configPath, $ini);

        $tokenFileDir = $this->awsDir . "/sso/cache/";
        if (!is_dir($tokenFileDir)) {
            mkdir($tokenFileDir, 0777, true);
        }

        $tokenFileName = $tokenFileDir . sha1("testssosession.url.com") . '.json';
        file_put_contents(
            $tokenFileName, $tokenFile
        );

        putenv('HOME=' . $this->tempDir);

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
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'credentials' => CredentialProvider::sso(
                'default',
                $configPath,
                [
                    'ssoClient' => $ssoClient
                ]
            ),
            'http_handler' => function (
                RequestInterface $request
            ) {
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::CREDENTIALS_PROFILE_SSO_LEGACY,
                        $metrics)
                );

                return new Response(
                    200
                );
            }
        ]);
        $s3Client->listBuckets();
    }

    /**
     * Tests user agent captures the flexible checksum calculation metric.
     *
     * @return void
     */
    public function testUserAgentCaptureFlexibleChecksumCalculationMetric()
    {
        $checksumCalculationMetrics = [
            'when_supported' => MetricsBuilder::FLEXIBLE_CHECKSUMS_REQ_WHEN_SUPPORTED,
            'when_required' => MetricsBuilder::FLEXIBLE_CHECKSUMS_REQ_WHEN_REQUIRED
        ];
        foreach ($checksumCalculationMetrics as $config => $checksumCalculationMetric) {
            $s3Client = new S3Client([
                'region' => 'us-west-2',
                'api_provider' => ApiProvider::filesystem(__DIR__ . '/S3/fixtures'),
                'request_checksum_calculation' => $config,
                'http_handler' => function (RequestInterface $request)
                use ($checksumCalculationMetric) {
                    $metrics = $this->getMetricsAsArray($request);

                    $this->assertTrue(
                        in_array($checksumCalculationMetric, $metrics)
                    );

                    return new Response(
                        200,
                        [],
                        '<?xml version="1.0" encoding="UTF-8"?><Node></Node>'
                    );
                }
            ]);
            $s3Client->putObject([
                'Bucket' => 'foo',
                'Key' => 'foo',
                'Body' => 'Test body',
                'ChecksumAlgorithm' => 'crc32'
            ]);
        }
    }

    /**
     * Tests user agent captures the flexible checksum validation metric.
     *
     * @return void
     */
    public function testUserAgentCaptureFlexibleChecksumValidationMetric()
    {
        $checksumCalculationMetrics = [
            'when_supported' => MetricsBuilder::FLEXIBLE_CHECKSUMS_RES_WHEN_SUPPORTED,
            'when_required' => MetricsBuilder::FLEXIBLE_CHECKSUMS_RES_WHEN_REQUIRED
        ];
        foreach ($checksumCalculationMetrics as $config => $checksumCalculationMetric) {
            $s3Client = new S3Client([
                'region' => 'us-west-2',
                'api_provider' => ApiProvider::filesystem(__DIR__ . '/S3/fixtures'),
                'response_checksum_validation' => $config,
                'http_handler' => function (RequestInterface $request)
                use ($checksumCalculationMetric) {
                    $metrics = $this->getMetricsAsArray($request);

                    $this->assertTrue(
                        in_array($checksumCalculationMetric, $metrics)
                    );

                    return new Response(
                        200,
                        [],
                        '<?xml version="1.0" encoding="UTF-8"?><Node></Node>'
                    );
                }
            ]);
            $s3Client->putObject([
                'Bucket' => 'foo',
                'Key' => 'foo',
                'Body' => 'Test body',
                'ChecksumAlgorithm' => 'crc32'
            ]);
        }
    }
}
