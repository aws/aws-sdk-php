<?php
namespace Aws\Test\Credentials;

use Aws\Configuration\ConfigurationResolver;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Credentials\InstanceProfileProvider;
use Aws\Exception\CredentialsException;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Sdk;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Aws\Credentials\InstanceProfileProvider
 */
class InstanceProfileProviderTest extends TestCase
{
    private $originalEnv = [];
    private $tempFiles = [];
    private $capturedUri = null;
    private static $originalDisableFlag;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        self::$originalDisableFlag = getenv(InstanceProfileProvider::ENV_DISABLE) ?: '';
        putenv(InstanceProfileProvider::ENV_DISABLE . '=false');
    }

    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
        putenv(InstanceProfileProvider::ENV_DISABLE . '=' . self::$originalDisableFlag);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->capturedUri = null;
        $this->originalEnv = [
            'AWS_' . strtoupper(InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE) =>
                getenv('AWS_' . strtoupper(InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE)),
            'AWS_' . strtoupper(InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT) =>
                getenv('AWS_' . strtoupper(InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT)),
            ConfigurationResolver::ENV_CONFIG_FILE => getenv(ConfigurationResolver::ENV_CONFIG_FILE)
        ];
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        foreach ($this->originalEnv as $key => $value) {
            if ($value !== false) {
                putenv("{$key}={$value}");
            } else {
                putenv("{$key}=");
            }
        }

        foreach ($this->tempFiles as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $this->tempFiles = [];
    }

    private function getCredentialArray(
        $key,
        $secret,
        $token = null,
        $time = null,
        $success = true
    ) {
        return [
            'Code' => $success ? 'Success' : 'Failed',
            'AccessKeyId' => $key,
            'SecretAccessKey' => $secret,
            'Token' => $token,
            'Expiration' => $time
        ];
    }

    private function getRequestClass()
    {
        return "\GuzzleHttp\Psr7\Request";
    }

    private function getResponseClass()
    {
        return "\GuzzleHttp\Psr7\Response";
    }

    private function getRequestException()
    {
        return new RequestException('test', new Psr7\Request('GET', 'http://www.example.com'));
    }

    /**
     * Test client for secure data flow with metadata token requirement
     *
     * @param array $responses
     * @param string $profile
     * @param array $creds
     * @param bool $throwConnectException
     * @return \Closure
     */
    private function getSecureTestClient(
        $responses = [],
        $profile = 'MockProfile',
        $creds = ['foo_key', 'baz_secret', 'qux_token', null],
        $throwConnectException = false
    ) {
        $putRequests = 0;
        $getProfileRequests = 0;
        $getCredsRequests = 0;

        return function (RequestInterface $request) use (
            $responses,
            $profile,
            $creds,
            $throwConnectException,
            &$putRequests,
            &$getProfileRequests,
            &$getCredsRequests
        ) {
            if ($request->getMethod() === 'PUT'
                && $request->getUri()->getPath() === '/latest/api/token'
            ) {
                if (empty($request->getHeader('x-aws-ec2-metadata-token-ttl-seconds'))) {
                    return Promise\Create::rejectionFor([
                        'exception' => new \Exception('400 Bad Request - TTL header required')
                    ]);
                }
                if (isset($responses['put'])) {
                    return $responses['put'][$putRequests++];
                } else {
                    return Promise\Create::promiseFor(
                        new Response(
                            200,
                            [],
                            Psr7\Utils::streamFor('MOCK_TOKEN_VALUE')
                        )
                    );
                }
            }
            if ($request->getMethod() === 'GET') {
                if (empty($request->getHeader('x-aws-ec2-metadata-token'))
                    || $request->getHeader('x-aws-ec2-metadata-token')[0]
                    !== 'MOCK_TOKEN_VALUE'
                ) {
                    if ($throwConnectException) {
                        $exception = new ConnectException(
                            '401 Unauthorized - Valid unexpired token required',
                            $request
                        );
                    } else {
                        $exception = new RequestException(
                            '401 Unauthorized - Valid unexpired token required',
                            $request,
                            new Response(401)
                        );
                    }

                    return Promise\Create::rejectionFor(['exception' => $exception]);
                }
                switch ($request->getUri()->getPath()) {
                    case '/latest/meta-data/iam/security-credentials':
                    case '/latest/meta-data/iam/security-credentials/':
                        if (isset($responses['get_profile'])) {
                            return $responses['get_profile'][$getProfileRequests++];
                        }
                        return Promise\Create::promiseFor(
                            new Response(200, [], Psr7\Utils::streamFor($profile))
                        );
                        break;

                    case "/latest/meta-data/iam/security-credentials/{$profile}":
                    case "/latest/meta-data/iam/security-credentials/{$profile}/":
                        if (isset($responses['get_creds'])) {
                            return $responses['get_creds'][$getCredsRequests++];
                        }
                        return Promise\Create::promiseFor(
                            new Response(
                                200,
                                [],
                                Psr7\Utils::streamFor(
                                    json_encode(call_user_func_array(
                                        [$this, 'getCredentialArray'],
                                        array_values($creds)
                                    ))
                                )
                            )
                        );
                        break;
                }
            }

            return Promise\Create::rejectionFor([
                'exception' => new \Exception(
                    'Invalid path passed to test server'
                )
            ]);
        };
    }

    /**
     * Test client for insecure data flow with no token requirement
     *
     * @param array $responses
     * @param string $profile
     * @param array $creds
     * @param bool $throwConnectException
     * @return \Closure
     */
    private function getInsecureTestClient(
        $responses = [],
        $profile = 'MockProfile',
        $creds = ['foo_key', 'baz_secret', 'qux_token', null],
        $throwConnectException = false
    ) {
        $requestClass = $this->getRequestClass();
        $responseClass = $this->getResponseClass();
        $getProfileRequests = 0;
        $getCredsRequests = 0;

        return function (RequestInterface $request) use (
            $responses,
            $responseClass,
            $requestClass,
            $profile,
            $creds,
            $throwConnectException,
            &$getProfileRequests,
            &$getCredsRequests
        ) {
            if ($request->getMethod() === 'PUT'
                && $request->getUri()->getPath() === '/latest/api/token'
            ) {
                if ($throwConnectException) {
                    $exception = new ConnectException(
                        '404 Not Found',
                        // Needed for different interfaces in Guzzle V5 & V6
                        new $requestClass(
                            $request->getMethod(),
                            $request->getUri()->getPath()
                        )
                    );
                } else {
                    $exception = new RequestException(
                        '404 Not Found',
                        // Needed for different interfaces in Guzzle V5 & V6
                        new $requestClass(
                            $request->getMethod(),
                            $request->getUri()->getPath()
                        ),
                        new $responseClass(404)
                    );
                }

                return Promise\Create::rejectionFor(['exception' => $exception]);
            }
            if ($request->getMethod() === 'GET') {
                switch ($request->getUri()->getPath()) {
                    case '/latest/meta-data/iam/security-credentials':
                    case '/latest/meta-data/iam/security-credentials/':
                        if (isset($responses['get_profile'])) {
                            return $responses['get_profile'][$getProfileRequests++];
                        }
                        return Promise\Create::promiseFor(
                            new Response(200, [], Psr7\Utils::streamFor($profile))
                        );
                        break;

                    case "/latest/meta-data/iam/security-credentials/{$profile}":
                    case "/latest/meta-data/iam/security-credentials/{$profile}/":
                        if (isset($responses['get_creds'])) {
                            return $responses['get_creds'][$getCredsRequests++];
                        }
                        return Promise\Create::promiseFor(
                            new Response(
                                200,
                                [],
                                Psr7\Utils::streamFor(
                                    json_encode(call_user_func_array(
                                        [$this, 'getCredentialArray'],
                                        $creds
                                    ))
                                )
                            )
                        );
                        break;
                }
            }

            return Promise\Create::rejectionFor([
                'exception' => new \Exception(
                    'Invalid path passed to test server'
                )
            ]);
        };
    }

    /**
     * @dataProvider successTestCases
     *
     * @param $client
     * @param $expected
     */
    public function testHandlesSuccessScenarios(
        callable $client,
        CredentialsInterface $expected,
        $expectedAttempts = null
    ) {
        $provider = new InstanceProfileProvider([
            'client' => $client,
            'retries' => 5
        ]);

        /** @var CredentialsInterface $credentials */
        $credentials = $provider()->wait();
        $this->assertSame(
            $expected->getAccessKeyId(),
            $credentials->getAccessKeyId()
        );
        $this->assertSame(
            $expected->getSecretKey(),
            $credentials->getSecretKey()
        );
        $this->assertEquals(
            $expected->getSecurityToken(),
            $credentials->getSecurityToken()
        );
        $this->assertEquals(
            $expected->getExpiration(),
            $credentials->getExpiration()
        );
        if ($expectedAttempts) {
            $this->assertEquals($expectedAttempts, $this->getPropertyValue($provider, 'attempts'));
        }
    }

    public function successTestCases()
    {
        $expiry = time() + 1000;
        $creds = ['foo_key', 'baz_secret', 'qux_token', "@{$expiry}"];
        $credsObject = new Credentials($creds[0], $creds[1], $creds[2], $expiry);

        $requestClass = $this->getRequestClass();
        $responseClass = $this->getResponseClass();
        $getRequest = new $requestClass('GET', '/latest/meta-data/foo');
        $putRequest = new $requestClass('PUT', '/latest/meta-data/foo');
        $throttledResponse = new $responseClass(503);

        $getThrottleException = new RequestException(
            '503 ThrottlingException',
            $getRequest,
            $throttledResponse
        );
        $putThrottleException = new RequestException(
            '503 ThrottlingException',
            $putRequest,
            $throttledResponse
        );

        $promiseProfile = Promise\Create::promiseFor(
            new Response(200, [], Psr7\Utils::streamFor('MockProfile'))
        );
        $promiseCreds = Promise\Create::promiseFor(
            new Response(200, [], Psr7\Utils::streamFor(
                json_encode(call_user_func_array(
                    [$this, 'getCredentialArray'],
                    $creds
                )))
            )
        );
        $promiseBadJsonCreds = Promise\Create::promiseFor(
            new Response(200, [], Psr7\Utils::streamFor('{'))
        );

        $rejectionThrottleProfile = Promise\Create::rejectionFor([
            'exception' => $getThrottleException
        ]);
        $rejectionThrottleCreds = Promise\Create::rejectionFor([
            'exception' => $getThrottleException
        ]);

        return [
            // Secure data flow, happy path
            [
                $this->getSecureTestClient([], 'MockProfile', $creds),
                $credsObject
            ],

            // Insecure data flow, happy path
            [
                $this->getInsecureTestClient([], 'MockProfile', $creds),
                $credsObject
            ],

            // Secure data flow, with retries for request exception
            [
                $this->getSecureTestClient(
                    [
                        'put' => [
                            Promise\Create::rejectionFor([
                                'exception' => $putThrottleException
                            ]),
                            Promise\Create::promiseFor(
                                new Response(200, [], Psr7\Utils::streamFor('MOCK_TOKEN_VALUE'))
                            )
                        ],
                        'get_profile' => [
                            $rejectionThrottleProfile,
                            $promiseProfile
                        ],
                        'get_creds' => [
                            $rejectionThrottleCreds,
                            $promiseCreds
                        ],
                    ],
                    'MockProfile',
                    $creds
                ),
                $credsObject,
                6
            ],

            // Insecure data flow, with retries for request exception
            [
                $this->getInsecureTestClient(
                    [
                        'get_profile' => [
                            $rejectionThrottleProfile,
                            $promiseProfile
                        ],
                        'get_creds' => [
                            $rejectionThrottleCreds,
                            $promiseCreds
                        ],
                    ],
                    'MockProfile',
                    $creds
                ),
                $credsObject,
                5
            ],

            // Secure data flow, with retries for json exception
            [
                $this->getSecureTestClient(
                    [
                        'get_creds' => [
                            $promiseBadJsonCreds,
                            $promiseCreds
                        ],
                    ],
                    'MockProfile',
                    $creds
                ),
                $credsObject,
                4
            ],

            // Insecure data flow, with retries for json exception
            [
                $this->getInsecureTestClient(
                    [
                        'get_creds' => [
                            $promiseBadJsonCreds,
                            $promiseCreds
                        ],
                    ],
                    'MockProfile',
                    $creds
                ),
                $credsObject,
                4
            ],

            // Secure data flow, with retries for ConnectException (Guzzle 7)
            [
                $this->getSecureTestClient(
                    [
                        'put' => [
                            Promise\Create::rejectionFor([
                                'exception' => $putThrottleException
                            ]),
                            Promise\Create::promiseFor(
                                new Response(200, [], Psr7\Utils::streamFor('MOCK_TOKEN_VALUE'))
                            )
                        ],
                        'get_profile' => [
                            $rejectionThrottleProfile,
                            $promiseProfile
                        ],
                        'get_creds' => [
                            $rejectionThrottleCreds,
                            $promiseCreds
                        ],
                    ],
                    'MockProfile',
                    $creds,
                    true
                ),
                $credsObject,
                6
            ],

            // Insecure data flow, with retries for ConnectException (Guzzle 7)
            [
                $this->getInsecureTestClient(
                    [
                        'get_profile' => [
                            $rejectionThrottleProfile,
                            $promiseProfile
                        ],
                        'get_creds' => [
                            $rejectionThrottleCreds,
                            $promiseCreds
                        ],
                    ],
                    'MockProfile',
                    $creds,
                    true
                ),
                $credsObject,
                5
            ],
        ];
    }

    /**
     * @dataProvider failureTestCases
     *
     * @param $client
     * @param \Exception $expected
     */
    public function testHandlesFailureScenarios($client, \Exception $expected)
    {
        $provider = new InstanceProfileProvider([
            'client' => $client,
            'retries' => 1,
        ]);

        try {
            $provider()->wait();
            $this->fail('Provider should have thrown an exception.');
        } catch (\Exception $e) {
            $this->assertInstanceOf(get_class($expected), $e);
            $this->assertSame($expected->getMessage(), $e->getMessage());
        }
    }

    public function failureTestCases()
    {
        $requestClass = $this->getRequestClass();
        $responseClass = $this->getResponseClass();
        $getRequest = new $requestClass('GET', '/latest/meta-data/foo');
        $putRequest = new $requestClass('PUT', '/latest/meta-data/foo');

        $promiseBadJsonCreds = Promise\Create::promiseFor(
            new Response(200, [], Psr7\Utils::streamFor('{'))
        );
        $rejectionThrottleToken = Promise\Create::rejectionFor([
            'exception' => new RequestException(
                '503 ThrottlingException',
                $putRequest,
                new $responseClass(503)
            )
        ]);
        $rejectionProfile = Promise\Create::rejectionFor([
            'exception' => new RequestException(
                '401 Unathorized',
                $getRequest,
                new $responseClass(401)
            )
        ]);
        $rejectionThrottleProfile = Promise\Create::rejectionFor([
            'exception' => new RequestException(
                '503 ThrottlingException',
                $getRequest,
                new $responseClass(503)
            )
        ]);
        $rejectionCreds = Promise\Create::rejectionFor([
            'exception' => new RequestException(
                '401 Unathorized',
                $getRequest,
                new $responseClass(401)
            )
        ]);
        $rejectionThrottleCreds = Promise\Create::rejectionFor([
            'exception' => new RequestException(
                '503 ThrottlingException',
                $getRequest,
                new $responseClass(503)
            )
        ]);

        return [

            // Secure data flow, profile call, non-retryable error
            [
                $this->getSecureTestClient(
                    [
                        'get_profile' => [$rejectionProfile]
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (401 Unathorized)'
                )
            ],

            // Insecure data flow, profile call, non-retryable error
            [
                $this->getInsecureTestClient(
                    [
                        'get_profile' => [$rejectionProfile]
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (401 Unathorized)'
                )
            ],

            // Secure data flow, profile call, non-retryable error, ConnectException (Guzzle 7)
            [
                $this->getSecureTestClient(
                    [
                        'get_profile' => [$rejectionProfile]
                    ],
                    'MockProfile',
                    ['foo_key', 'baz_secret', 'qux_token', null],
                    true
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (401 Unathorized)'
                )
            ],

            // Insecure data flow, profile call, non-retryable error, ConnectException (Guzzle 7)
            [
                $this->getInsecureTestClient(
                    [
                        'get_profile' => [$rejectionProfile]
                    ],
                    'MockProfile',
                    ['foo_key', 'baz_secret', 'qux_token', null],
                    true
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (401 Unathorized)'
                )
            ],

            // Secure data flow, credentials call, non-retryable error
            [
                $this->getSecureTestClient(
                    [
                        'get_creds' => [$rejectionCreds]
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (401 Unathorized)'
                )
            ],

            // Insecure data flow, credentials call, non-retryable error
            [
                $this->getInsecureTestClient(
                    [
                        'get_creds' => [$rejectionCreds]
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (401 Unathorized)'
                )
            ],

            // Secure data flow, token call, retryable error
            [
                $this->getSecureTestClient(
                    [
                        'put' => [
                            $rejectionThrottleToken,
                            $rejectionThrottleToken,
                            $rejectionThrottleToken,
                        ]
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (Error retrieving metadata token)'
                )
            ],

            // Secure data flow, profile call, retryable error
            [
                $this->getSecureTestClient(
                    [
                        'get_profile' => [
                            $rejectionThrottleProfile,
                            $rejectionThrottleProfile,
                            $rejectionThrottleProfile,
                        ]
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (503 ThrottlingException)'
                )
            ],

            // Insecure data flow, profile call, retryable error
            [
                $this->getInsecureTestClient(
                    [
                        'get_profile' => [
                            $rejectionThrottleProfile,
                            $rejectionThrottleProfile,
                            $rejectionThrottleProfile,
                        ],
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (503 ThrottlingException)'
                )
            ],

            // Secure data flow, credentials call, retryable error
            [
                $this->getSecureTestClient(
                    [
                        'get_creds' => [
                            $rejectionThrottleCreds,
                            $rejectionThrottleCreds,
                            $rejectionThrottleCreds,
                        ],
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (503 ThrottlingException)'
                )
            ],

            // Insecure data flow, credentials call, retryable error
            [
                $this->getInsecureTestClient(
                    [
                        'get_creds' => [
                            $rejectionThrottleCreds,
                            $rejectionThrottleCreds,
                            $rejectionThrottleCreds,
                        ],
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (503 ThrottlingException)'
                )
            ],

            // Secure data flow, credentials call, retryable invalid json error
            [
                $this->getSecureTestClient(
                    [
                        'get_creds' => [
                            $promiseBadJsonCreds,
                            $promiseBadJsonCreds,
                            $promiseBadJsonCreds
                        ]
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (Invalid JSON response, retries exhausted)'
                )
            ],

            // Insecure data flow, credentials call, retryable invalid json error
            [
                $this->getInsecureTestClient(
                    [
                        'get_creds' => [
                            $promiseBadJsonCreds,
                            $promiseBadJsonCreds,
                            $promiseBadJsonCreds
                        ]
                    ],
                    'MockProfile'
                ),
                new CredentialsException(
                    'Error retrieving credentials from the instance profile '
                    . 'metadata service. (Invalid JSON response, retries exhausted)'
                )
            ],
        ];
    }

    public function testSwitchesBackToSecureModeOn401()
    {
        $this->expectExceptionMessage("Error retrieving credentials from the instance profile metadata service. (999 Expected Exception)");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $requestClass = $this->getRequestClass();
        $responseClass = $this->getResponseClass();
        $getRequest = new $requestClass('GET', '/latest/meta-data/foo');
        $putRequest = new $requestClass('PUT', '/latest/meta-data/foo');
        $reqNumber = 0;

        $client = function ($request) use (
            &$reqNumber,
            $responseClass,
            $getRequest,
            $putRequest
        ) {
            $reqNumber++;
            if ($request->getMethod() === 'PUT'
                && $request->getUri()->getPath() === '/latest/api/token'
            ) {
                if ($reqNumber === 1) {
                    return Promise\Create::rejectionFor([
                        'exception' => new RequestException('404 Not Found',
                            $putRequest,
                            new $responseClass(404)
                        )
                    ]);
                }

                return Promise\Create::rejectionFor([
                    'exception' => new \Exception('999 Expected Exception')
                ]);
            }
            if ($request->getMethod() === 'GET') {
                return Promise\Create::rejectionFor([
                    'exception' => new RequestException(
                        '401 Unauthorized - Valid unexpired token required',
                        $getRequest,
                        new $responseClass(401)
                    )
                ]);
            }
        };

        $provider = new InstanceProfileProvider([
            'client' => $client,
            'retries' => 1,
        ]);

        try {
            // 1st pass should fall back to insecure mode, then switch back to
            // secure mode on hitting the 401
            $provider()->wait();
            $this->fail('Provider should have thrown an exception.');
        } catch (\Exception $e) {
            // If secure mode is set, this should hit the PUT request again
            $provider()->wait();
        }
    }

    private function getTestCreds(
        $result,
        $profile = null,
        array $args = []
    ) {
        $args['profile'] = $profile;
        $args['client'] = $this->getSecureTestClient([], $profile, $result);
        $provider = new InstanceProfileProvider($args);

        return $provider();
    }

    public function testAddsUserAgentToRequest()
    {
        $response = new Response(200, [], Psr7\Utils::streamFor('test'));
        $client = function (RequestInterface $request) use ($response) {
            $this->assertSame(
                'aws-sdk-php/' . Sdk::VERSION . ' ' . \Aws\default_user_agent(),
                $request->getHeader('User-Agent')[0]
            );

            return Promise\Create::promiseFor($response);
        };
        $provider = new InstanceProfileProvider(['client' => $client]);
        return $provider();
    }

    public function testSeedsInitialCredentials()
    {
        $t = time() + 1000;
        $c = $this->getTestCreds(
            ['foo', 'baz', null, "@{$t}"],
            'foo'
        )->wait();
        $this->assertSame('foo', $c->getAccessKeyId());
        $this->assertSame('baz', $c->getSecretKey());
        $this->assertNull($c->getSecurityToken());
        $this->assertSame($t, $c->getExpiration());
    }

    public function testThrowsExceptionOnInvalidMetadata()
    {
        $this->expectExceptionMessage("Unexpected instance profile response");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $this->getTestCreds(
            $this->getCredentialArray(null, null, null, null, false),
            'foo'
        )->wait();
    }

    /** @doesNotPerformAssertions */
    public function testDoesNotRequireConfig()
    {
        new InstanceProfileProvider();
    }

    /** @doesNotPerformAssertions */
    public function testEnvDisableFlag()
    {
        $flag = getenv(InstanceProfileProvider::ENV_DISABLE);

        try {
            putenv(InstanceProfileProvider::ENV_DISABLE . '=true');
            $t = time() + 1000;
            $this->getTestCreds(
                json_encode($this->getCredentialArray('foo', 'baz', null, "@{$t}"))
            )->wait();
            $this->fail('Did not throw expected CredentialException.');
        } catch (CredentialsException $e) {
            if (strstr($e->getMessage(), 'EC2 metadata service access disabled') === false) {
                $this->fail('Did not throw expected CredentialException when '
                    . 'provider is disabled.');
            }
        } finally {
            putenv(InstanceProfileProvider::ENV_DISABLE . '=' . $flag);
        }
    }

    public function testRetriesEnvVarIsUsed()
    {
        putenv(InstanceProfileProvider::ENV_RETRIES . '=1');
        $retries = (int) getenv(InstanceProfileProvider::ENV_RETRIES);

        $t = time() + 1000;
        $result = json_encode($this->getCredentialArray('foo', 'baz', null, "@{$t}"));
        $responses = [new Response(200, [], Psr7\Utils::streamFor($result))];

        $client = function () use (&$retries, $responses) {
            if (0 === $retries--) {
                return Promise\Create::promiseFor(array_shift($responses));
            }

            return Promise\Create::rejectionFor([
                'exception' => $this->getRequestException()
            ]);
        };

        $args = [
            'profile' => 'foo',
            'client' => $client
        ];
        $provider = new InstanceProfileProvider($args);
        $c = $provider()->wait();
        $this->assertSame('foo', $c->getAccessKeyId());
        $this->assertSame('baz', $c->getSecretKey());
        $this->assertNull($c->getSecurityToken());
        $this->assertSame($t, $c->getExpiration());
    }

    /**
     * @dataProvider returnsExpiredCredsProvider
     *
     * @param $client
     */
    public function testExtendsExpirationAndSendsRequestIfImdsYieldsExpiredCreds($client)
    {
        //expect warning emitted from extension
        $this->expectWarning();
        $this->expectWarningMessageMatches(
            '/Attempting credential expiration extension/'
        );

        $provider = new InstanceProfileProvider([
            'client' => $client
        ]);
        $creds = $provider()->wait();

        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('baz', $creds->getSecretKey());
        $this->assertFalse($creds->isExpired());

        $requestHandler = new MockHandler([
            new Result(['message' => 'Request sent']),
            new Result(['message' => 'Request sent']),
            new Result(['message' => 'Request sent'])
        ]);

        $s3Client = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => $creds,
            'handler' => $requestHandler
        ]);
        $s3Client->listBuckets();
        $s3Client->listBuckets();
        $result = $s3Client->listBuckets();

        $this->assertEquals('Request sent', $result['message']);
        $this->assertLessThanOrEqual(3,$this->getPropertyValue($provider,'attempts'));
    }

    public function returnsExpiredCredsProvider()
    {
        $expiredTime = time() - 1000;
        $expiredCreds = ['foo', 'baz', null, "@{$expiredTime}"];

        $promiseCreds = Promise\Create::promiseFor(
            new Response(200, [], Psr7\Utils::streamFor(
                json_encode(call_user_func_array(
                    [$this, 'getCredentialArray'],
                    $expiredCreds
                )))
            )
        );

        return [
            [
                $client = $this->getSecureTestClient(
                    [
                        'get_creds' => [
                            $promiseCreds
                        ]
                    ],
                    'MockProfile',
                    $expiredCreds
                )
            ],
            [
                $client = $this->getInsecureTestClient(
                    [
                        'get_creds' => [
                            $promiseCreds
                        ]
                    ],
                    'MockProfile',
                    $expiredCreds
                )
            ]
        ];
    }

    /**
     * @dataProvider imdsUnavailableProvider
     *
     * @param $client
     */
    public function testExtendsExpirationAndSendsRequestIfImdsUnavailable($client)
    {
        //expect warning emitted from extension
        $this->expectWarning();
        $this->expectWarningMessageMatches(
            '/Attempting credential expiration extension/'
        );

        $expiredTime = time() - 1000;
        $expiredCreds = new Credentials('foo', 'baz', null, $expiredTime);
        $this->assertTrue($expiredCreds->isExpired());

        $provider = new InstanceProfileProvider([
            'client' => $client
        ]);
        $creds = $provider($expiredCreds)->wait();
        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('baz', $creds->getSecretKey());
        $this->assertFalse($expiredCreds->isExpired());

        $requestHandler = new MockHandler([
            new Result(['message' => 'Request sent']),
            new Result(['message' => 'Request sent']),
            new Result(['message' => 'Request sent'])
        ]);

        $s3Client = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => $creds,
            'handler' => $requestHandler
        ]);
        $s3Client -> listBuckets();
        $s3Client -> listBuckets();
        $result = $s3Client->listBuckets();

        $this->assertEquals('Request sent', $result['message']);
        $this->assertLessThanOrEqual(3,$this->getPropertyValue($provider,'attempts'));
    }

    public function imdsUnavailableProvider()
    {
        $requestClass = $this->getRequestClass();
        $responseClass = $this->getResponseClass();
        $getRequest = new $requestClass('GET', '/latest/meta-data/foo');
        $putRequest = new $requestClass('PUT', '/latest/meta-data/foo');

        $profileRejection500 = Promise\Create::rejectionFor([
            'exception' => new RequestException(
                '500 internal server error',
                $putRequest,
                new $responseClass(500)
            )
        ]);
        $credsRejection500 = Promise\Create::rejectionFor([
            'exception' => new RequestException(
                '500 internal server error',
                $getRequest,
                new $responseClass(500)
            )
        ]);
        $credsRejectionReadTimeout = Promise\Create::rejectionFor([
            'exception' => new ConnectException(
                'cURL error 28: Operation timed out',
                $getRequest
            )
        ]);

        return [
            [
                $client = $this->getSecureTestClient(
                    [
                        'put' => [
                            $profileRejection500
                        ]
                    ],
                    'MockProfile'
                )
            ],
            [
                $client = $this->getSecureTestClient(
                    [
                        'get_creds' => [
                            $credsRejection500
                        ]
                    ],
                    'MockProfile'
                )
            ],
            [
                $client = $this->getSecureTestClient(
                    [
                        'get_creds' => [
                            $credsRejectionReadTimeout
                        ]
                    ],
                    'MockProfile'
                )
            ],
            [
                $client = $this->getInsecureTestClient(
                    [
                        'get_creds' => [
                            $credsRejection500
                        ]
                    ],
                    'MockProfile'
                )
            ],
            [
                $client = $this->getInsecureTestClient(
                    [
                        'get_creds' => [
                            $credsRejectionReadTimeout
                        ]
                    ],
                    'MockProfile'
                )
            ]
        ];
    }

    public function testResetsAttempts()
    {
        $now = time() + 10000;
        $creds = ['foo', 'baz', null, "@{$now}"];

        $client = $this->getSecureTestClient(
            [],
            'MockProfile',
            $creds
        );

        $provider = new InstanceProfileProvider([
            'client' => $client
        ]);

        $provider()->wait();
        $provider()->wait();
        $this->assertLessThanOrEqual(3, $this->getPropertyValue($provider, 'attempts'));
    }

    /**
     * This test checks for disabling IMDSv1 fallback by explicit client config passing.
     *
     * @return void
     */
    public function testIMDSv1DisabledByExplicitConfig() {
        $config = [InstanceProfileProvider::CFG_EC2_METADATA_V1_DISABLED => true];
        $wereCredentialsFetched = $this->fetchMockedCredentialsAndAlwaysExpectAToken($config);

        $this->assertTrue($wereCredentialsFetched);
    }

    /**
     * This test checks for disabling IMDSv1 fallback by setting AWS_EC2_METADATA_V1_DISABLED to true.
     *
     * @return void
     */
    public function testIMDSv1DisabledByEnvironment() {
        $ec2MetadataV1Disabled = ConfigurationResolver::env(InstanceProfileProvider::CFG_EC2_METADATA_V1_DISABLED, 'string');
        putenv('AWS_' . strtoupper(InstanceProfileProvider::CFG_EC2_METADATA_V1_DISABLED) . '=' . 'true');
        try {
            $wereCredentialsFetched = $this->fetchMockedCredentialsAndAlwaysExpectAToken();
            $this->assertTrue($wereCredentialsFetched);
        } finally {
            putenv('AWS_' . strtoupper(InstanceProfileProvider::CFG_EC2_METADATA_V1_DISABLED) . '=' . $ec2MetadataV1Disabled);
        }
    }

    /**
     * This test checks for disabling IMDSv1 fallback by looking into the config file
     * for the property aws_ec2_metadata_v1_disabled expected set to true.
     *
     * @return void
     */
    public function testIMDSv1DisabledByConfigFile() {
        $currentConfigFile = getenv(ConfigurationResolver::ENV_CONFIG_FILE);
        $mockConfigFile = "./mock-config";
        try {
            putenv(ConfigurationResolver::ENV_CONFIG_FILE . '=' . $mockConfigFile);
            $configContent = "[default]" . "\n" . InstanceProfileProvider::CFG_EC2_METADATA_V1_DISABLED . "=" . "true";
            file_put_contents($mockConfigFile, $configContent);
            $wereCredentialsFetched = $this->fetchMockedCredentialsAndAlwaysExpectAToken();
            $this->assertTrue($wereCredentialsFetched);
        } finally {
            unlink($mockConfigFile);
            putenv(ConfigurationResolver::ENV_CONFIG_FILE . '=' . $currentConfigFile);
        }
    }

    /**
     * This test checks for having IMDSv1 fallback enabled by default.
     * In this case credentials will not be fetched since it is expected to
     * always use the secure mode, which means the assertion will be done against false.
     *
     * @return void
     */
    public function testIMDSv1EnabledByDefault() {
        $wereCredentialsFetched = $this->fetchMockedCredentialsAndAlwaysExpectAToken();
        $this->assertFalse($wereCredentialsFetched);
    }

    /**
     * This function simulates the process for retrieving credential from the instance metadata
     * service but always expecting a token, which means that the credentials should be retrieved
     * in secure mode. It returns true if credentials were fetched with not exceptions;
     * otherwise false will be returned.
     * To accomplish this we pass a dummy http handler with the following steps:
     * 1 - retrieve the token:
     *   -- If $firstTokenTry is set to true then it will set $firstTokenTry to false, and
     *      it will return a 401 error response to make this request to fail.
     *   --- then, when catching the exception from this failed request, the provider
     *       will check if it is allowed to switch to insecure mode (IMDSv1). And if so then,
     *       it will jump to step 2, otherwise step 1:
     *   -- If $firstTokenTry is set to false then a token will be returned.
     * 2 - retrieve profile:
     *   -- If a valid token was not provided, which in this case it needs to be equal
     *      to $mockToken, then an exception will be thrown.
     *   -- If a valid token is provided then, it will jump to step 3.
     * 3 - retrieve credentials:
     *   -- If a valid token was not provided, which in this case it needs to be equal
     *      to $mockToken, then an exception will be thrown.
     *   -- If a valid token is provided then, test credentials are returned.
     *
     * @param array $config the configuration to be passed to the provider.
     *
     * @return bool
     */
    private function fetchMockedCredentialsAndAlwaysExpectAToken($config=[]) {
        $TOKEN_HEADER_KEY = 'x-aws-ec2-metadata-token';
        $firstTokenTry = true;
        $mockToken = 'MockToken';
        $mockHandler = function (RequestInterface $request) use (&$firstTokenTry, $mockToken, $TOKEN_HEADER_KEY) {
            $fnRejectionTokenNotProvided = function () use ($mockToken, $TOKEN_HEADER_KEY, $request) {
                return Promise\Create::rejectionFor(
                    ['exception' => new RequestException("Token with value $mockToken is expected as header $TOKEN_HEADER_KEY", $request, new Response(400))]
                );
            };
            if ($request->getMethod() === 'PUT' && $request->getUri()->getPath() === '/latest/api/token') {
                if ($firstTokenTry) {
                    $firstTokenTry = false;

                    return Promise\Create::rejectionFor(['exception' => new RequestException("Unexpected error!", $request, new Response(401))]);
                } else {
                    return Promise\Create::promiseFor(new Response(200, [], Psr7\Utils::streamFor($mockToken)));
                }
            } elseif ($request->getMethod() === 'GET') {
                switch ($request->getUri()->getPath()) {
                    case '/latest/meta-data/iam/security-credentials/':
                        if ($mockToken !== ($request->getHeader($TOKEN_HEADER_KEY)[0] ?? '')) {
                            return $fnRejectionTokenNotProvided();
                        }

                        return Promise\Create::promiseFor(new Response(200, [], Psr7\Utils::streamFor('MockProfile')));
                    case '/latest/meta-data/iam/security-credentials/MockProfile':
                        if ($mockToken !== ($request->getHeader($TOKEN_HEADER_KEY)[0] ?? '')) {
                            return $fnRejectionTokenNotProvided();
                        }

                        $expiration = time() + 10000;

                        return Promise\Create::promiseFor(
                            new Response(
                                200,
                                [],
                                Psr7\Utils::streamFor(
                                    json_encode($this->getCredentialArray('foo', 'baz', null, "@$expiration"))
                                )
                            )
                        );
                }
            }

            return Promise\Create::rejectionFor(['exception' => new \Exception('Unexpected error!')]);
        };
        $config['use_aws_shared_config_files'] = true;
        $provider = new InstanceProfileProvider(array_merge(($config ?? []), ['client' => $mockHandler]));
        try {
            $provider()->wait();

            return true;
        } catch (\Exception $ignored) {
            return false;
        }
    }

    /**
     * This test checks for endpoint resolution mode based on the different sources
     * from which this option can be configured/customized.
     * @param string|null $endpointModeClientConfig if this parameter is not null then, we will set this
     * parameter within the client config parameters.
     * @param string|null $endpointModeEnv if this parameter is not null then, we will set its value in an
     * environment variable called "AWS_EC2_METADATA_SERVICE_ENDPOINT_MODE".
     * @param string|null $endpointModeConfig if this parameter is not null then, we will set its value within
     * a test config file with the property name ec2_metadata_service_endpoint_mode, and we will make
     * the ConfigurationResolver to resolve configuration from that test config file by setting AWS_CONFIG_FILE to the
     * test config file name.
     * @param string $expectedEndpointMode this parameter is the endpoint mode that is expected to be resolved by
     * the credential provider.
     *
     * @dataProvider endpointModeCasesProvider
     */
    public function testEndpointModeResolution(
      ?string $endpointModeClientConfig,
      ?string $endpointModeEnv,
      ?string $endpointModeConfig,
      string $expectedEndpointMode
    ): void
    {
        if ($endpointModeEnv !== null) {
            putenv('AWS_' . strtoupper(InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE) . '=' . $endpointModeEnv);
        }

        if ($endpointModeConfig !== null) {
            $mockConfigFile = tempnam(sys_get_temp_dir(), 'aws_config_');
            $this->tempFiles[] = $mockConfigFile;

            $configContent = "[default]\n" . InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE . "=" . $endpointModeConfig;
            file_put_contents($mockConfigFile, $configContent);

            putenv(ConfigurationResolver::ENV_CONFIG_FILE . '=' . $mockConfigFile);
        }

        $providerConfig = [
            'client' => $this->createMockHandlerWithUriCapture(),
            'use_aws_shared_config_files' => true
        ];

        if ($endpointModeClientConfig !== null) {
            $providerConfig[InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE] = $endpointModeClientConfig;
        }

        $instanceProfileProvider = new InstanceProfileProvider($providerConfig);
        $instanceProfileProvider()->wait();

        $this->assertNotNull($this->capturedUri, 'Expected URI to be captured');
        $host = $this->capturedUri->getHost();

        switch ($expectedEndpointMode) {
            case InstanceProfileProvider::ENDPOINT_MODE_IPv4:
                $this->assertTrue(
                    filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false,
                    "Expected IPv4 address but got: {$host}"
                );
                break;
            case InstanceProfileProvider::ENDPOINT_MODE_IPv6:
                $hostWithoutBrackets = trim($host, '[]');
                $this->assertTrue(
                    filter_var($hostWithoutBrackets, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false,
                    "Expected IPv6 address but got: {$host}"
                );
                break;
            default:
                $this->fail("The expected endpoint_mode should be either IPv4 or IPv6");
        }
    }

    /**
     * This method is the data provider that returns the different scenarios
     * for resolving the endpoint mode.
     *
     * @return array[]
     */
    public function endpointModeCasesProvider() : array
    {
        return [
            'endpoint_mode_not_specified' => [
                'client_configuration' => null,
                'environment_variable' => null,
                'config' => null,
                'expected' => InstanceProfileProvider::ENDPOINT_MODE_IPv4
            ],
            'endpoint_mode_ipv4_client_config' => [
                'client_configuration' => InstanceProfileProvider::ENDPOINT_MODE_IPv4,
                'environment_variable' => InstanceProfileProvider::ENDPOINT_MODE_IPv6,
                'config' => InstanceProfileProvider::ENDPOINT_MODE_IPv6,
                'expected' => InstanceProfileProvider::ENDPOINT_MODE_IPv4
            ],
            'endpoint_mode_ipv6_client_config' => [
                'client_configuration' => InstanceProfileProvider::ENDPOINT_MODE_IPv6,
                'environment_variable' => InstanceProfileProvider::ENDPOINT_MODE_IPv4,
                'config' => InstanceProfileProvider::ENDPOINT_MODE_IPv4,
                'expected' => InstanceProfileProvider::ENDPOINT_MODE_IPv6
            ],
            'endpoint_mode_ipv4_env' => [
                'client_configuration' => null,
                'environment_variable' => InstanceProfileProvider::ENDPOINT_MODE_IPv4,
                'config' => InstanceProfileProvider::ENDPOINT_MODE_IPv6,
                'expected' => InstanceProfileProvider::ENDPOINT_MODE_IPv4
            ],
            'endpoint_mode_ipv6_env' => [
                'client_configuration' => null,
                'environment_variable' => InstanceProfileProvider::ENDPOINT_MODE_IPv6,
                'config' => InstanceProfileProvider::ENDPOINT_MODE_IPv4,
                'expected' => InstanceProfileProvider::ENDPOINT_MODE_IPv6
            ],
            'endpoint_mode_ipv4_config' => [
                'client_configuration' => null,
                'environment_variable' => null,
                'config' => InstanceProfileProvider::ENDPOINT_MODE_IPv4,
                'expected' => InstanceProfileProvider::ENDPOINT_MODE_IPv4
            ],
            'endpoint_mode_ipv6_config' => [
                'client_configuration' => null,
                'environment_variable' => null,
                'config' => InstanceProfileProvider::ENDPOINT_MODE_IPv6,
                'expected' => InstanceProfileProvider::ENDPOINT_MODE_IPv6
            ]
        ];
    }

    /**
     * This test checks for endpoint resolution based on the different sources from
     * which this option can be configured/customized.
     * @param string $endpointMode the endpoint mode that we will be used to resolve
     * the default endpoint, in case the endpoint is not explicitly specified.
     * @param string|null $endpointEnv if this parameter is not null then we will set its value
     * in an environment variable called AWS_EC2_METADATA_SERVICE_ENDPOINT.
     * @param string|null $endpointConfig if this parameter is not null then, we will set its value within
     *  a test config file with the property name ec2_metadata_service_endpoint_mode, and we will make
     *  the ConfigurationResolver to resolve configuration from that test config file by setting AWS_CONFIG_FILE to the
     *  test config file name.
     * @param string $expectedEndpoint this parameter is the endpoint that is expected to be resolved
     * by the credential provider.
     *
     * @dataProvider endpointCasesProvider
     */
    public function testEndpointResolution(
        string  $endpointMode,
        ?string $endpointEnv,
        ?string  $endpointConfig,
        string $expectedEndpoint
    ): void
    {
        if ($endpointEnv !== null) {
            putenv('AWS_' . strtoupper(InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT) . '=' . $endpointEnv);
        }

        if ($endpointConfig !== null) {
            $mockConfigFile = tempnam(sys_get_temp_dir(), 'aws_config_');
            $this->tempFiles[] = $mockConfigFile;

            $configContent = "[default]\n" . InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT . "=" . $endpointConfig;
            file_put_contents($mockConfigFile, $configContent);

            putenv(ConfigurationResolver::ENV_CONFIG_FILE . '=' . $mockConfigFile);
        }

        $providerConfig = [
            InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE => $endpointMode,
            'client' => $this->createMockHandlerWithUriCapture(),
            'use_aws_shared_config_files' => true
        ];

        $instanceProfileProvider = new InstanceProfileProvider($providerConfig);
        $instanceProfileProvider()->wait();

        $this->assertNotNull($this->capturedUri, 'Expected URI to be captured');
        $actualEndpoint = $this->capturedUri->getScheme() . '://' . $this->capturedUri->getHost();
        $this->assertSame($expectedEndpoint, $actualEndpoint);
    }

    /**
     * This method is the data provider  that returns the different scenarios
     * for resolving endpoint.
     *
     * @return array[]
     */
    public function endpointCasesProvider() : array
    {
        return [
            'with_endpoint_mode_ipv4' => [
                'endpoint_mode' => InstanceProfileProvider::ENDPOINT_MODE_IPv4,
                'endpoint_env' => null,
                'endpoint_config' => null,
                'expected' => 'http://169.254.169.254'
            ],
            'with_endpoint_mode_ipv6' => [
                'endpoint_mode' => InstanceProfileProvider::ENDPOINT_MODE_IPv6,
                'endpoint_env' => null,
                'endpoint_config' => null,
                'expected' => 'http://[fd00:ec2::254]'
            ],
            'with_endpoint_env' => [
                'endpoint_mode' => InstanceProfileProvider::ENDPOINT_MODE_IPv6,
                'endpoint_env' => 'https://169.254.169.200',
                'endpoint_config' => 'http://[fd00:ec2::254]',
                'expected' => 'https://169.254.169.200'
            ],
            'with_endpoint_config' => [
                'endpoint_mode' => InstanceProfileProvider::ENDPOINT_MODE_IPv4,
                'endpoint_env' => null,
                'endpoint_config' => 'https://[fd00:ec2::200]',
                'expected' => 'https://[fd00:ec2::200]'
            ]
        ];
    }


    public function testEndpointNotValid()
    {
        $invalidEndpoint = 'htt://10.0.0.1';
        $this->expectExceptionMessage(
            'The provided URI "'
            . $invalidEndpoint . '" is invalid, or contains an unsupported host'
        );

        $providerConfig = [
            InstanceProfileProvider::CFG_EC2_METADATA_SERVICE_ENDPOINT => $invalidEndpoint,
            'client' => $this->createMockHandlerWithUriCapture()
        ];

        $instanceProfileProvider = new InstanceProfileProvider($providerConfig);
        $instanceProfileProvider()->wait();
    }

    public function testResolveCredentialsWithAccountId()
    {
        $testAccountId = 'foo';
        $expiration = time() + 1000;
        $testHandler = function (RequestInterface $request) use ($expiration, $testAccountId) {
            if ($request->getMethod() === 'PUT' && $request->getUri()->getPath() === '/latest/api/token') {
                return Promise\Create::promiseFor(new Response(200, [], Psr7\Utils::streamFor('')));
            } elseif ($request->getMethod() === 'GET') {
                switch ($request->getUri()->getPath()) {
                    case '/latest/meta-data/iam/security-credentials/':
                        return Promise\Create::promiseFor(new Response(200, [], Psr7\Utils::streamFor('MockProfile')));
                    case '/latest/meta-data/iam/security-credentials/MockProfile':
                        $jsonResponse = <<<EOF
{
    "Code": "Success",
    "AccessKeyId": "foo",
    "SecretAccessKey": "foo",
    "Token": "bazz",
    "Expiration": "@$expiration",
    "AccountId": "$testAccountId"
}
EOF;
                        return Promise\Create::promiseFor(
                            new Response(
                                200,
                                [],
                                Psr7\Utils::streamFor(
                                    $jsonResponse
                                )
                            )
                        );
                }
            }

            return Promise\Create::rejectionFor(['exception' => new \Exception('Unexpected error!')]);
        };
        $provider = new InstanceProfileProvider([
            'client' => $testHandler
        ]);
        /** @var Credentials $credentials */
        $credentials = $provider()->wait();
        $this->assertSame('foo', $credentials->getAccessKeyId());
        $this->assertSame('foo', $credentials->getSecretKey());
        $this->assertSame('bazz', $credentials->getSecurityToken());
        $this->assertSame($expiration, $credentials->getExpiration());
        $this->assertSame($testAccountId, $credentials->getAccountId());
    }

    private function createMockHandlerWithUriCapture(): callable
    {
        return function (RequestInterface $request) {
            if ($request->getMethod() === 'PUT' && $request->getUri()->getPath() === '/latest/api/token') {
                $this->capturedUri = $request->getUri();
                return Promise\Create::promiseFor(new Response(200, [], Psr7\Utils::streamFor('')));
            }

            if ($request->getMethod() === 'GET') {
                switch ($request->getUri()->getPath()) {
                    case '/latest/meta-data/iam/security-credentials/':
                        return Promise\Create::promiseFor(
                            new Response(200, [], Psr7\Utils::streamFor('MockProfile'))
                        );
                    case '/latest/meta-data/iam/security-credentials/MockProfile':
                        $expiration = time() + 10000;
                        return Promise\Create::promiseFor(
                            new Response(
                                200,
                                [],
                                Psr7\Utils::streamFor(
                                    json_encode($this->getCredentialArray('foo', 'baz', null, "@$expiration"))
                                )
                            )
                        );
                }
            }

            return Promise\Create::rejectionFor(['exception' => new \Exception('Unexpected error!')]);
        };
    }
}
