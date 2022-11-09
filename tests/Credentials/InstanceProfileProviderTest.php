<?php
namespace Aws\Test\Credentials;

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
    static $originalFlag;

    public static function set_up_before_class()
    {
        self::$originalFlag = getenv(InstanceProfileProvider::ENV_DISABLE) ?: '';
        putenv(InstanceProfileProvider::ENV_DISABLE. '=false');
    }

    public static function tear_down_after_class()
    {
        putenv(InstanceProfileProvider::ENV_DISABLE. '=' . self::$originalFlag);
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
        // Guzzle 5 vs 6 namespace differences
        $version = \Aws\guzzle_major_version();
        if ($version === 5) {
            return "\GuzzleHttp\Message\Request";
        }
        return "\GuzzleHttp\Psr7\Request";
    }

    private function getResponseClass()
    {
        // Guzzle 5 vs 6 namespace differences
        $version = \Aws\guzzle_major_version();
        if ($version === 5) {
            return "\GuzzleHttp\Message\Response";
        }
        return "\GuzzleHttp\Psr7\Response";
    }

    private function getRequestException()
    {
        $version = \Aws\guzzle_major_version();
        if ($version === 6 || $version === 7) {
            return new RequestException(
                'test',
                new Psr7\Request('GET', 'http://www.example.com')
            );
        } elseif ($version === 5) {
            return new RequestException(
                'test',
                new \GuzzleHttp\Message\Request('GET', 'http://www.example.com')
            );
        }
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
}
