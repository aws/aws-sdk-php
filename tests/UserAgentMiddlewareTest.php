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
use Aws\Crypto\AesDecryptingStream;
use Aws\Crypto\AesGcmDecryptingStream;
use Aws\Crypto\MaterialsProvider;
use Aws\Crypto\KmsMaterialsProviderV2;
use Aws\Crypto\KmsMaterialsProvider;
use Aws\DynamoDb\DynamoDbClient;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\EndpointProviderV2;
use Aws\Kms\KmsClient;
use Aws\MetricsBuilder;
use Aws\Result;
use Aws\S3\Crypto\S3EncryptionClient;
use Aws\S3\Crypto\S3EncryptionClientV2;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;
use Aws\S3\S3Client;
use Aws\S3\S3Transfer\Models\DownloadDirectoryRequest;
use Aws\S3\S3Transfer\Models\DownloadRequest;
use Aws\S3\S3Transfer\Models\UploadDirectoryRequest;
use Aws\S3\S3Transfer\S3TransferManager;
use Aws\S3\Transfer;
use Aws\Sdk;
use Aws\SSO\SSOClient;
use Aws\Sts\StsClient;
use Aws\Token\SsoTokenProvider;
use Aws\UserAgentMiddleware;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

/**
 * @runInSeparateProcess

 */
#[CoversClass(\Aws\UserAgentMiddleware::class)]
class UserAgentMiddlewareTest extends TestCase
{
    use MetricsBuilderTestTrait;
    use S3\Crypto\S3EncryptionClientTestingTrait;
    use UsesServiceTrait;

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
      
        TestsUtility::cleanUpDir($this->tempDir);
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
     * @param array $args
     * @param string $expected
     *
     * @return void

 */
    #[DataProvider('userAgentCasesDataProvider')]
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
    public static function userAgentCasesDataProvider(): \Generator
    {
        yield 'sdkVersion' => [[], 'aws-sdk-php/' . Sdk::VERSION];

        yield 'userAgentVersion' => [[], 'ua/' . UserAgentMiddleware::AGENT_VERSION];

        yield 'hhvmVersion' => [[], defined('HHVM_VERSION') ? 'HHVM/' . HHVM_VERSION : ""];

        yield 'osName' => [[], self::getOsNameForUserAgent()];

        yield 'langVersion' => [[], 'lang/php#' . phpversion()];

        yield 'execEnv' => [[], self::getExecEnvForUserAgent()];

        yield 'appId' => [['app_id' => 'FooAppId'], 'app/FooAppId'];

        yield 'metricsWithEndpoint' => [
            ['endpoint' => 'https://foo-endpoint.com', 'endpoint_override' => true],
            'm/' . MetricsBuilder::ENDPOINT_OVERRIDE
        ];

        yield 'metricsWithRetryConfigArrayStandardMode' => [
            ['retries' => ['mode' => 'standard']],
            'm/' . MetricsBuilder::RETRY_MODE_STANDARD
        ];

        yield 'metricsWithRetryConfigArrayAdaptiveMode' => [
            ['retries' => ['mode' => 'adaptive']],
            'm/' . MetricsBuilder::RETRY_MODE_ADAPTIVE
        ];

        yield 'metricsWithRetryConfigArrayLegacyMode' => [
            ['retries' => ['mode' => 'legacy']],
            'm/' . MetricsBuilder::RETRY_MODE_LEGACY
        ];

        yield 'metricsWithRetryConfigStandardMode' => [
            ['retries' => new \Aws\Retry\Configuration('standard', 10)],
            'm/' . MetricsBuilder::RETRY_MODE_STANDARD
        ];

        yield 'metricsWithRetryConfigAdaptiveMode' => [
            ['retries' => new \Aws\Retry\Configuration('adaptive', 10)],
            'm/' . MetricsBuilder::RETRY_MODE_ADAPTIVE
        ];

        yield 'metricsWithRetryConfigLegacyMode' => [
            ['retries' => new \Aws\Retry\Configuration('legacy', 10)],
            'm/' . MetricsBuilder::RETRY_MODE_LEGACY
        ];

        yield 'cfgWithEndpointDiscoveryConfigArray' => [
            ['endpoint_discovery' => ['enabled' => true, 'cache_limit' => 1000]],
            'cfg/endpoint-discovery'
        ];

        yield 'cfgWithEndpointDiscoveryConfig' => [
            ['endpoint_discovery' => new \Aws\EndpointDiscovery\Configuration(true, 1000)],
            'cfg/endpoint-discovery'
        ];
    }

    private static function getOsNameForUserAgent(): string
    {
        $disabledFunctions = explode(',', ini_get('disable_functions'));
        if (function_exists('php_uname')
            && !in_array('php_uname', $disabledFunctions, true)
        ) {
            // Match what the middleware does - replace spaces with underscores
            $os = str_replace(' ', '_', php_uname('s'));
            $release = php_uname('r');
            $osName = "OS/{$os}#{$release}";

            return !empty($osName) ? $osName : "";
        }
        return "";
    }

    private static function getExecEnvForUserAgent(): string
    {
        $expectedEnv = "LambdaFooEnvironment";
        putenv("AWS_EXECUTION_ENV={$expectedEnv}");
        return $expectedEnv;
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
     * @return void

 */
    #[DataProvider('retryConfigMetricProvider')]
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
    public static function retryConfigMetricProvider(): array
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
        $kms = $this->getTestKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function ($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertSame('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'kms_cmk_id' => '11111111-2222-3333-4444-555555555555'
                ],
                $cmd['EncryptionContext']
            );
            return Create::promiseFor(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $provider = new KmsMaterialsProvider($kms, 'foo');

        $responded = false;
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
            },
            'http_handler' => function () use ($provider, &$responded) {
                if ($responded) {
                    return new FulfilledPromise(new Response(
                        200,
                        [],
                        json_encode(
                            $this->getValidV1GcmMetadataFields($provider)
                        )
                    ));
                }

                $responded = true;
                return new FulfilledPromise(new Response(
                    200,
                    [],
                    'test'
                ));
            },
        ]);
        $encryptionClient = @new S3EncryptionClient(
            $s3Client,
            InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX
        );
        $result = $encryptionClient->getObject([
            'Bucket' => 'foo',
            'Key' => 'foo',
            '@MaterialsProvider' => $provider,
        ]);
        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
    }

    /**
     * Tests user agent captures the s3 crypto v2 metric.
     *
     * @return void
     */
    public function testUserAgentCaptureS3CryptoV2Metric()
    {
        $kms = $this->getTestKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function ($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertSame('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'aws:x-amz-cek-alg' => 'AES/GCM/NoPadding'
                ],
                $cmd['EncryptionContext']
            );
            return Create::promiseFor(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $provider = new KmsMaterialsProviderV2($kms, 'foo');

        $responded = false;
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
            },
            'http_handler' => function () use ($provider, &$responded) {
                if ($responded) {
                    return new FulfilledPromise(new Response(
                        200,
                        [],
                        json_encode(
                            $this->getValidV2GcmMetadataFields($provider)
                        )
                    ));
                }

                $responded = true;
                return new FulfilledPromise(new Response(
                    200,
                    [],
                    'test'
                ));
            },
        ]);
        $encryptionClient = @new S3EncryptionClientV2(
            $s3Client,
            InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX
        );
        $result = $encryptionClient->getObject([
            'Bucket' => 'foo',
            'Key' => 'foo',
            '@MaterialsProvider' => $provider,
            '@SecurityProfile' => 'V2',
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT'
        ]);
        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
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
     * Returns a test kms client,
     *
     * @return KmsClient 
     */
    protected function getTestKmsClient(): mixed
    {
        static $client = null;

        if (!$client) {
            $client = $this->getTestClient('Kms');
        }

        return $client;
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
     * @return void

 */
    #[DataProvider('flexibleChecksumTestProvider')]
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
    public static function flexibleChecksumTestProvider(): array
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

        if (PHP_OS_FAMILY === 'Windows') {
            $profileContent = <<<EOF
[$profile]
credential_process= echo {"AccessKeyId":"foo","SecretAccessKey":"bar","Version":1}
EOF;
        } else {
            $profileContent = <<<EOF
[$profile]
credential_process= echo '{"AccessKeyId":"foo","SecretAccessKey":"bar","Version":1}'
EOF;
        }

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

    /**
     * Tests user agent captures the s3 transfer metric.
     *
     * @return void
     */
    public function testUserAgentCaptureS3TransferMetricInS3TransferManagerV2()
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
        $s3TransferManager = new S3TransferManager(
            $s3Client
        );
        $s3TransferManager->download(
            new DownloadRequest(
                [
                    'Bucket' => 'foo',
                    'Key' => 'foo',
                ]
            )
        )->wait();
    }

    /**
     * Tests user agent captures the upload directory metric.
     *
     * @return void
     */
    public function testUserAgentCaptureS3UploadDirectoryTransfer()
    {
        $directory = $this->tempDir . "/upload-directory-test";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $files = [
            $directory . "/dir-file-1.txt",
            $directory . "/dir-file-2.txt",
        ];
        foreach ($files as $file) {
            file_put_contents($file, "test");
        }

        $called = false;
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (
                RequestInterface $request
            ) use (&$called) {
                $called = true;
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::S3_TRANSFER, $metrics)
                );

                $this->assertTrue(
                    in_array(
                        MetricsBuilder::S3_TRANSFER_UPLOAD_DIRECTORY,
                        $metrics
                    )
                );

                return new Response();
            }
        ]);
        $manager = new S3TransferManager(
            $s3Client,
        );
        $manager->uploadDirectory(
            new UploadDirectoryRequest(
                $directory,
                "Bucket",
                [],
                []
            )
        )->wait();
        $this->assertTrue($called);
    }

    /**
     * Test user agent captures the download directory metric
     * @return void
     */
    public function testUserAgentCaptureS3DownloadDirectoryTransfer()
    {
        $destinationDirectory = $this->tempDir . "/download-directory-test";
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0777, true);
        }
        $called = false;
        $objects = [

        ];
        $s3Client = new S3Client([
            'region' => 'us-east-2',
            'http_handler' => function (
                RequestInterface $request
            ) use (&$called) {
                // ListObjectsV2 response
                $uri = $request->getUri();
                if ($uri->getQuery() === "list-type=2") {
                    $objectsResponse = <<<EOF
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>Bucket</Name>
    <Prefix></Prefix>
    <KeyCount>1</KeyCount>
    <MaxKeys>1000</MaxKeys>
    <IsTruncated>false</IsTruncated>
    <Contents>
        <Key>TestKey</Key>
        <Size>100</Size>
        <LastModified>2025-05-20T14:45:08.000Z</LastModified>
        <ETag>FixedETag</ETag>
        <ChecksumAlgorithm>CRC64NVME</ChecksumAlgorithm>
        <ChecksumType>FULL_OBJECT</ChecksumType>
        <StorageClass>STANDARD</StorageClass>
    </Contents>
</ListBucketResult>
EOF;

                    return new Response(
                        200,
                        [],
                        Utils::streamFor($objectsResponse)
                    );
                }

                // Validate metric
                $called = true;
                $metrics = $this->getMetricsAsArray($request);

                $this->assertTrue(
                    in_array(MetricsBuilder::S3_TRANSFER, $metrics)
                );

                $this->assertTrue(
                    in_array(
                        MetricsBuilder::S3_TRANSFER_DOWNLOAD_DIRECTORY,
                        $metrics
                    )
                );

                return new Response();
            }
        ]);
        $manager = new S3TransferManager(
            $s3Client,
        );
        $manager->downloadDirectory(
            new DownloadDirectoryRequest(
                "Bucket",
                $destinationDirectory,
            )
        )->wait();
        $this->assertTrue($called);
    }
}
