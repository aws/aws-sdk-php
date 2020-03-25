<?php
namespace Aws\Test;

use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Aws\Retry\Configuration;
use Aws\Retry\QuotaManager;
use Aws\Retry\RateLimiter;
use Aws\RetryMiddlewareV2;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\RetryMiddlewareV2
 */
class RetryMiddlewareV2Test extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider standardModeTestCases
     *
     * @param CommandInterface $command
     * @param QuotaManager $quotaManager
     * @param array $queue
     * @param array $options
     * @param $expected
     * @throws \Exception
     */
    public function testRetriesForStandardMode(
        CommandInterface $command,
        QuotaManager $quotaManager,
        array $queue,
        array $options,
        $expected
    ) {
        $request = new Request('GET', 'http://www.example.com');
        $attempt = 0;

        // Errors within MockHandler closure get caught silently
        $errors = [];
        $mock = new MockHandler(
            $queue,
            function() use ($expected, &$attempt, $quotaManager, &$errors, $command) {
                try {
                    $this->assertEquals(
                        $expected[$attempt]['quota'],
                        $quotaManager->getAvailableCapacity()
                    );
                    if (!empty($expected[$attempt]['max_delay'])) {
                        $this->assertLessThanOrEqual(
                            $expected[$attempt]['max_delay'],
                            $command['@http']['delay']
                        );
                    }

                } catch (\Exception $e) {
                    // Catch errors manually for throwing later
                    $errors[] = $e;
                }
                $attempt++;
            },
            function() use ($expected, &$attempt, $quotaManager, &$errors, $command) {
                try {
                    $this->assertEquals(
                        $expected[$attempt]['quota'],
                        $quotaManager->getAvailableCapacity()
                    );
                    if (!empty($expected[$attempt]['max_delay'])) {
                        $this->assertLessThanOrEqual(
                            $expected[$attempt]['max_delay'],
                            $command['@http']['delay']
                        );
                    }
                } catch (\Exception $e) {
                    // Catch errors manually for throwing later
                    $errors[] = $e;
                }
                $attempt++;
            }
        );

        $wrapped = new RetryMiddlewareV2(
            new Configuration('standard', $options['max_attempts']),
            $mock,
            [
                'decider' => RetryMiddlewareV2::createDefaultDecider(
                    $quotaManager,
                    $options['max_attempts']
                ),
                'max_backoff' => $options['max_backoff']
            ]
        );

        try {
            $wrapped($command, $request)->wait();
            if (!empty($expected[$attempt - 1]['error'])) {
                $this->fail('This should have thrown an exception.');
            }
        } catch (\Exception $e) {
            if (!empty($expected[$attempt - 1]['error'])) {
                $this->assertEquals(
                    $expected[$attempt - 1]['error']->getMessage(),
                    $e->getMessage()
                );
                $this->assertEquals(
                    get_class($expected[$attempt - 1]['error']),
                    get_class($e)
                );
            } else {
                throw $e;
            }
        }

        // Throw first silently caught error if any
        if (!empty($errors)) {
            throw $errors[0];
        }

        $this->assertEquals($attempt, count($queue));
    }

    function standardModeTestCases()
    {
        $command = new Command('foo');
        $result200 = new Result([
            '@metadata' => [
                'statusCode' => 200
            ]
        ]);
        $awsException500 = new AwsException(
            'Internal server error',
            $command,
            [
                'response' => new Response(500)
            ]
        );
        $awsException502 = new AwsException(
            'Bad gateway',
            $command,
            [
                'response' => new Response(502)
            ]
        );

        return [
            // Retry eventually succeeds
            [
                $command,
                new QuotaManager([
                    'initial_retry_tokens' => 500
                ]),
                [ $awsException500, $awsException500, $result200 ],
                [
                    'max_attempts' => 3,
                    'max_backoff' => 20000,
                ],
                [
                    [
                        'quota' => 500
                    ],
                    [
                        'quota' => 495,
                        'max_delay' => 2000
                    ],
                    [
                        'quota' => 490,
                        'max_delay' => 4000
                    ]
                ]
            ],
            // Fail due to max attempts reached
            [
                $command,
                new QuotaManager([
                    'initial_retry_tokens' => 500
                ]),
                [$awsException502, $awsException502, $awsException502],
                [
                    'max_attempts' => 3,
                    'max_backoff' => 20000,
                ],
                [
                    [
                        'quota' => 500
                    ],
                    [
                        'quota' => 495,
                        'max_delay' => 2000
                    ],
                    [
                        'quota' => 490,
                        'max_delay' => 4000,
                        'error' => $awsException502
                    ]
                ]
            ],
            // Retry quota reached after a single retry
            [
                $command,
                new QuotaManager([
                    'initial_retry_tokens' => 5
                ]),
                [$awsException500, $awsException502],
                [
                    'max_attempts' => 3,
                    'max_backoff' => 20000,
                ],
                [
                    [
                        'quota' => 5
                    ],
                    [
                        'quota' => 0,
                        'max_delay' => 2000,
                        'error' => $awsException502
                    ],
                ]
            ],
            // No retry at all if quota is 0
            [
                $command,
                new QuotaManager([
                    'initial_retry_tokens' => 0
                ]),
                [$awsException500],
                [
                    'max_attempts' => 3,
                    'max_backoff' => 20000,
                ],
                [
                    [
                        'quota' => 0,
                        'max_delay' => 2000,
                        'error' => $awsException500
                    ],
                ]
            ],
            // Verify exponential backoff timing
            [
                $command,
                new QuotaManager([
                    'initial_retry_tokens' => 500
                ]),
                [
                    $awsException500,
                    $awsException500,
                    $awsException500,
                    $awsException500,
                    $awsException500
                ],
                [
                    'max_attempts' => 5,
                    'max_backoff' => 20000,
                ],
                [
                    [
                        'quota' => 500
                    ],
                    [
                        'quota' => 495,
                        'max_delay' => 2000
                    ],
                    [
                        'quota' => 490,
                        'max_delay' => 4000
                    ],
                    [
                        'quota' => 485,
                        'max_delay' => 8000
                    ],
                    [
                        'quota' => 480,
                        'max_delay' => 16000,
                        'error' => $awsException500
                    ],
                ],
            ],
            // Verify max backoff
            [
                $command,
                new QuotaManager([
                    'initial_retry_tokens' => 500
                ]),
                [
                    $awsException500,
                    $awsException500,
                    $awsException500,
                    $awsException500,
                    $awsException500
                ],
                [
                    'max_attempts' => 5,
                    'max_backoff' => 3000,
                ],
                [
                    [
                        'quota' => 500
                    ],
                    [
                        'quota' => 495,
                        'max_delay' => 2000
                    ],
                    [
                        'quota' => 490,
                        'max_delay' => 3000
                    ],
                    [
                        'quota' => 485,
                        'max_delay' => 3000
                    ],
                    [
                        'quota' => 480,
                        'max_delay' => 3000,
                        'error' => $awsException500
                    ],
                ],
            ]
        ];
    }

    public function testRetriesForAdapativeMode()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $result200 = new Result([
            '@metadata' => [
                'statusCode' => 200
            ]
        ]);
        $nonThrottlingException = new AwsException(
            'Internal server error',
            $command,
            [
                'response' => new Response(500),
                'code' => 'SomeException',
            ]
        );
        $throttlingException = new AwsException(
            'ThrottlingException',
            $command,
            [
                'response' => new Response(502),
                'code' => 'ThrottlingException',
            ]
        );
        $customThrottlingException = new AwsException(
            'CustomThrottlingException',
            $command,
            [
                'response' => new Response(502),
                'code' => 'CustomThrottlingException',
            ]
        );

        $provider = ApiProvider::filesystem(__DIR__ . '/fixtures/aws_exception_test');
        $definition = $provider('api', 'ec2', 'latest');
        $service = new Service($definition, $provider);
        $shapes = $service->getErrorShapes();
        $errorShape = null;
        foreach ($shapes as $shape) {
            $definition = $shape->toArray();
            if (!empty($definition['retryable']['throttling'])) {
                $errorShape = $shape;
                break;
            }
        }
        $throttlingErrorShapeException = new AwsException(
            'ThrottlingErrorShape',
            $command,
            [
                'response' => new Response(400),
                'code' => 'ThrottlingErrorShape',
                'error_shape' => $errorShape,
            ]
        );

        $time = microtime(true);
        $attempt = 0;
        $expectedTimes = [0, 0, 0, 1.9, 3.8, 5.7];

        // Errors within MockHandler closure get caught silently
        $errors = [];

        $assertFunction = function() use (&$time, &$attempt, &$errors, $expectedTimes) {
            try {
                $this->assertLessThanOrEqual(
                    0.1,
                    abs($expectedTimes[$attempt] - (microtime(true) - $time))
                );
            } catch (\Exception $e) {
                $errors[] = $e;
            }

            $time = microtime(true);
            $attempt++;
        };

        $mock = new MockHandler(
            [
                $nonThrottlingException,
                $nonThrottlingException,
                $throttlingException,
                $customThrottlingException,
                $throttlingErrorShapeException,
                $result200,
            ],
            $assertFunction,
            $assertFunction
        );

        $times = [0, 0];
        foreach ($expectedTimes as $index => $expected) {
            for ($i = 0; $i < 5; $i++) {
                $times[] = 0.1 * ($index + 1);
            }
        }

        $wrapped = new RetryMiddlewareV2(
            new Configuration('adaptive', 6),
            $mock,
            [
                'rate_limiter' => new RateLimiter([
                    'time_provider' => function() use ($times) {
                        static $i;
                        if (is_null($i)) {
                            $i = 0;
                        } else {
                            $i++;
                        }
                        return $times[$i];
                    }
                ]),
                'throttling_error_codes' => ['CustomThrottlingException']
            ]
        );

        $wrapped($command, $request)->wait();

        // Throw first silently caught error if any
        if (!empty($errors)) {
            throw $errors[0];
        }

        $this->assertEquals(count($expectedTimes), $attempt);
    }

    public function testAddRetryHeader()
    {
        $nextHandler = function (CommandInterface $command, RequestInterface $request) {
            $this->assertTrue($request->hasHeader('aws-sdk-retry'));
            return new RejectedPromise(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };
        $retryMW = new RetryMiddlewareV2(
            new Configuration(
                'standard',
                5
            ),
            $nextHandler
        );

        try {
            $retryMW(new Command('SomeCommand'), new Request('GET', ''))->wait();
            $this->fail();
        } catch (AwsException $e) { }
    }

    public function testDeciderRetriesWhenStatusCodeMatches()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
        $command = new Command('foo');
        $result = new Result(['@metadata' => ['statusCode' => '500']]);
        $this->assertTrue($decider(0, $command, $result));
        $result = new Result(['@metadata' => ['statusCode' => '503']]);
        $this->assertTrue($decider(0, $command, $result));
    }

    public function testDeciderRetriesWhenConnectionError()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
        $command = new Command('foo');
        $err = new AwsException('e', $command, ['connection_error' => true]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, ['connection_error' => false]);
        $this->assertFalse($decider(0, $command, $err));
    }

    public function testDeciderIgnoresNonAwsExceptions()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
        $command = new Command('foo');
        $err = new \Exception('e');
        $this->assertFalse($decider(0, $command, $err));
    }

    public function testDeciderIgnoresPHPError()
    {
        if (interface_exists('Throwable', false)) {
            $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
            $command = new Command('foo');
            $request = new Request('GET', 'http://www.example.com');
            $err = new \Error('e');
            $this->assertFalse($decider(0, $command, $err));
        }
    }

    public function testDeciderRetriesWhenCurlErrorCodeMatches()
    {
        if (!extension_loaded('curl')) {
            $this->markTestSkipped('Test skipped on no cURL extension');
        }
        $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $version = \Aws\guzzle_major_version();
        if ($version === 6 || $version === 7) {
            $previous = new RequestException(
                'test',
                $request,
                null,
                null,
                ['errno' => CURLE_RECV_ERROR]
            );
        } elseif ($version === 5) {
            $previous = new RequestException(
                'cURL error ' . CURLE_RECV_ERROR . ': test',
                new \GuzzleHttp\Message\Request('GET', 'http://www.example.com')
            );
        }
        $err = new AwsException(
            'e',
            $command,
            ['connection_error' => false],
            $previous
        );
        $this->assertTrue($decider(0, $command, $err));
    }

    public function testDeciderRetriesForCustomCurlErrors()
    {
        if (!extension_loaded('curl')) {
            $this->markTestSkipped('Test skipped on no cURL extension');
        }
        $decider = RetryMiddlewareV2::createDefaultDecider(
            new QuotaManager(),
            3,
            ['curl_errors' => [CURLE_BAD_CONTENT_ENCODING]]
        );
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $version = \Aws\guzzle_major_version();

        // Custom error passed in to decider config should result in a retry
        if ($version === 6 || $version === 7) {
            $previous = new RequestException(
                'test',
                $request,
                null,
                null,
                ['errno' => CURLE_BAD_CONTENT_ENCODING]
            );
        } elseif ($version === 5) {
            $previous = new RequestException(
                'cURL error ' . CURLE_BAD_CONTENT_ENCODING . ': test',
                new \GuzzleHttp\Message\Request('GET', 'http://www.example.com')
            );
        }
        $err = new AwsException(
            'e',
            $command,
            ['connection_error' => false],
            $previous
        );
        $this->assertTrue($decider(0, $command, $err));

        // Error not passed in to decider config should result in no retry
        if ($version === 6 || $version === 7) {
            $previous = new RequestException(
                'test',
                $request,
                null,
                null,
                ['errno' => CURLE_ABORTED_BY_CALLBACK]
            );
        } elseif ($version === 5) {
            $previous = new RequestException(
                'cURL error ' . CURLE_ABORTED_BY_CALLBACK . ': test',
                new \GuzzleHttp\Message\Request('GET', 'http://www.example.com')
            );
        }
        $err = new AwsException(
            'e',
            $command,
            ['connection_error' => false],
            $previous
        );
        $this->assertFalse($decider(0, $command, $err));
    }

    public function awsErrorCodeProvider()
    {
        $command = new Command('foo');
        return [
            [new AwsException('e', $command, ['code' => 'RequestLimitExceeded'])],
            [new AwsException('e', $command, ['code' => 'Throttling'])],
            [new AwsException('e', $command, ['code' => 'ThrottlingException'])],
            [new AwsException('e', $command, ['code' => 'ProvisionedThroughputExceededException'])],
            [new AwsException('e', $command, ['code' => 'RequestThrottled'])],
            [new AwsException('e', $command, ['code' => 'BandwidthLimitExceeded'])],
            [new AwsException('e', $command, ['code' => 'RequestThrottledException'])],
            [new AwsException('e', $command, ['code' => 'TooManyRequestsException'])],
            [new AwsException('e', $command, ['code' => 'EC2ThrottledException'])],
        ];
    }

    /**
    * @param $err
    *
    * @dataProvider awsErrorCodeProvider
    */
    public function testDeciderRetriesWhenAwsErrorCodeMatches($err)
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
        $command = new Command('foo');
        $this->assertTrue($decider(0, $command, $err));
    }

    public function testDeciderRetriesWhenExceptionStatusCodeMatches()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
        $command = new Command('foo');
        $err = new AwsException('e', $command, ['response' => new Response(500)]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, ['response' => new Response(502)]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, ['response' => new Response(503)]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, ['response' => new Response(504)]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, ['response' => new Response(403)]);
        $this->assertFalse($decider(0, $command, $err));
    }

    public function testDeciderRetriesForRetryableTrait()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
        $provider = ApiProvider::filesystem(__DIR__ . '/fixtures/aws_exception_test');
        $definition = $provider('api', 'ec2', 'latest');
        $service = new Service($definition, $provider);
        $shapes = $service->getErrorShapes();
        $errorShape = null;
        foreach ($shapes as $shape) {
            $definition = $shape->toArray();
            if (!empty($definition['retryable'])) {
                $errorShape = $shape;
                break;
            }
        }
        $command = new Command('foo');
        $err = new AwsException(
            'e',
            $command,
            [
                'response' => new Response(400),
                'error_shape' => $errorShape
            ]
        );
        $this->assertTrue($decider(0, $command, $err));
    }

    public function testDeciderRetriesForCustomErrorCodes()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(
            new QuotaManager(),
            3,
            [
                'transient_error_codes' => ['CustomRetryableException'],
                'throttling_error_codes' => ['CustomThrottlingException'],
            ]
        );
        $command = new Command('foo');
        $err = new AwsException('e', $command, [
            'code' => 'CustomRetryableException'
        ]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, [
            'code' => 'CustomThrottlingException'
        ]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, [
            'code' => 'CustomNonRetryableException'
        ]);
        $this->assertFalse($decider(0, $command, $err));
    }

    public function testDeciderRetriesForCustomStatusCodes()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(
            new QuotaManager(),
            3,
            ['status_codes' => [400]]
        );
        $command = new Command('foo');
        $err = new AwsException('e', $command, ['response' => new Response(400)]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, ['response' => new Response(401)]);
        $this->assertFalse($decider(0, $command, $err));
    }

    public function testDeciderDoesNotRetryAfterMaxAttempts()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(new QuotaManager());
        $command = new Command('foo');
        $err = new AwsException('e', $command, ['code' => 'RequestLimitExceeded']);
        $this->assertTrue($decider(0, $command, $err));
        $this->assertFalse($decider(3, $command, $err));
    }

    public function testUsesCustomDelayer()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $attempts = 0;
        $handler = function ($command, $request) use (&$attempts) {
            if ($attempts > 0) {
                $this->assertEquals(9999, $command['@http']['delay']);
            }
            $attempts++;
            return \GuzzleHttp\Promise\rejection_for(
                new AwsException(
                    'foo',
                    $command,
                    [
                        'response' => new Response(502)
                    ]
                )
            );
        };

        $wrapped = new RetryMiddlewareV2(
            new Configuration('standard', 3),
            $handler,
            [
                'decider' => RetryMiddlewareV2::createDefaultDecider(new QuotaManager()),
                'delayer' => function () {
                    return 9999;
                }
            ]
        );

        try {
            $wrapped($command, $request)->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertEquals(3, $attempts);
            $this->assertContains('foo', $e->getMessage());
        }
    }

    public function testDelaysExponentiallyWithJitter()
    {
        $retryMiddleware = new RetryMiddlewareV2(new Configuration('standard', 3), function () {});
        $this->assertLessThanOrEqual(2000, $retryMiddleware->exponentialDelayWithJitter(1));
        $this->assertLessThanOrEqual(4000, $retryMiddleware->exponentialDelayWithJitter(2));
        $this->assertLessThanOrEqual(8000, $retryMiddleware->exponentialDelayWithJitter(3));
        $this->assertLessThanOrEqual(20000, $retryMiddleware->exponentialDelayWithJitter(10));
    }

    public function testDelaysWithSomeRandomness()
    {
        $retryMiddleware = new RetryMiddlewareV2(new Configuration('standard', 3), function () {});
        $maxDelay = 1000 * pow(2, 4);
        $values = array_map(function () use ($retryMiddleware) {
            return $retryMiddleware->exponentialDelayWithJitter(4);
        }, range(1, 200));

        $this->assertGreaterThan(1, count(array_unique($values)));
        foreach ($values as $value) {
            $this->assertGreaterThanOrEqual(0, $value);
            $this->assertLessThanOrEqual($maxDelay, $value);
        }
    }

    public function testRetriesWhenResultMatches()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $res1 = new Result(['@metadata' => ['statusCode' => '503']]);
        $res2 = new Result(['@metadata' => ['statusCode' => '200']]);
        $mock = new MockHandler(
            [
                function ($command, $request) use ($res1) {
                    $this->assertArrayNotHasKey('delay', $command['@http']);
                    return $res1;
                },
                function ($command, $request) use ($res2) {
                    $this->assertLessThanOrEqual(2000, $command['@http']['delay']);
                    return $res2;
                },
            ],
            function () use (&$called) { $called[] = func_get_args(); }
        );

        $wrapped = new RetryMiddlewareV2(
            new Configuration('standard', 5),
            $mock,
            ['decider' => RetryMiddlewareV2::createDefaultDecider(new QuotaManager())]
        );

        $result = $wrapped($command, $request)->wait();
        $this->assertSame($res2, $result);
        $this->assertCount(2, $called);
        $this->assertSame([$res1], $called[0]);
        $this->assertSame([$res2], $called[1]);
    }

    public function testRetriesWhenExceptionMatches()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $mock = new MockHandler(
            [
                function ($command, $request) {
                    $this->assertArrayNotHasKey('delay', $command['@http']);
                    return new AwsException('foo', $command, [
                        'connection_error' => true
                    ]);
                },
                function ($command, $request) {
                    $this->assertLessThanOrEqual(2000, $command['@http']['delay']);
                    return new Result();
                },
            ],
            function () use (&$called) { $called[] = func_get_args(); },
            function () use (&$called) { $called[] = func_get_args(); }
        );

        $wrapped = new RetryMiddlewareV2(
            new Configuration('standard', 5),
            $mock,
            ['decider' => RetryMiddlewareV2::createDefaultDecider(new QuotaManager())]
        );

        $result = $wrapped($command, $request)->wait();
        $this->assertInstanceOf('Aws\ResultInterface', $result);
        $this->assertCount(2, $called);
        $this->assertInstanceOf('Aws\Exception\AwsException', $called[0][0]);
        $this->assertInstanceOf('Aws\ResultInterface', $called[1][0]);
    }

    public function testForwardRejectionWhenExceptionDoesNotMatch()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $mock = new MockHandler(
            [
                function ($command, $request) {
                    $this->assertArrayNotHasKey('delay', $command['@http']);
                    return new AwsException('foo', $command);
                }
            ],
            function () use (&$called) { $called[] = func_get_args(); },
            function () use (&$called) { $called[] = func_get_args(); }
        );

        $wrapped = new RetryMiddlewareV2(
            new Configuration('standard', 5),
            $mock,
            ['decider' => RetryMiddlewareV2::createDefaultDecider(new QuotaManager())]
        );

        try {
            $wrapped($command, $request)->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertCount(1, $called);
            $this->assertContains('foo', $e->getMessage());
        }
    }

    public function testForwardValueWhenResultDoesNotMatch()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $res1 = new Result();
        $mock = new MockHandler(
            [$res1],
            function () use (&$called) { $called[] = func_get_args(); },
            function () use (&$called) { $called[] = func_get_args(); }
        );

        $wrapped = new RetryMiddlewareV2(
            new Configuration('standard', 5),
            $mock,
            ['decider' => RetryMiddlewareV2::createDefaultDecider(new QuotaManager())]
        );

        $result = $wrapped($command, $request)->wait();
        $this->assertSame($res1, $result);
        $this->assertCount(1, $called);
    }

    public function testRetriesCanBeDisabledOnACommand()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(
            new QuotaManager(),
            3
        );
        $command = new Command('foo', ['@retries' => 0]);
        $err = new AwsException('e', $command, ['connection_error' => true]);
        $this->assertFalse($decider(1, $command, $err));
    }

    public function testResultReportsTheNumberOfRetries()
    {
        $handler = new MockHandler([
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '200']]),
        ]);

        $config = new Configuration('standard', 3);

        $retryMW = new RetryMiddlewareV2(
            $config,
            $handler,
            ['collect_stats' => true]
        );

        $result = $retryMW(new Command('SomeCommand'), new Request('GET', ''))
            ->wait();
        $this->assertArrayHasKey('retries_attempted', $result['@metadata']['transferStats']);
        $this->assertSame(2, $result['@metadata']['transferStats']['retries_attempted']);
    }

    public function testExceptionReportsTheNumberOfRetries()
    {
        $nextHandler = function (CommandInterface $command) {
            return new RejectedPromise(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };
        $config = new Configuration('standard', 3);
        $retryMW = new RetryMiddlewareV2(
            $config,
            $nextHandler,
            ['collect_stats' => true]
        );

        try {
            $retryMW(new Command('SomeCommand'), new Request('GET', ''))->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertSame(2, $e->getTransferInfo('retries_attempted'));
        }
    }

    public function testResultReportsTotalRetryDelay()
    {
        $handler = new MockHandler([
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '200']]),
        ]);
        $config = new Configuration('standard', 4);
        $retryMW = new RetryMiddlewareV2(
            $config,
            $handler,
            ['collect_stats' => true]
        );

        $result = $retryMW(new Command('SomeCommand'), new Request('GET', ''))
            ->wait();
        $this->assertArrayHasKey('total_retry_delay', $result['@metadata']['transferStats']);
        // With 3 retries, expect total delay <= 2000 + 4000 + 8000
        $this->assertLessThanOrEqual(14000, $result['@metadata']['transferStats']['total_retry_delay']);
    }

    public function testExceptionReportsTotalRetryDelay()
    {
        $nextHandler = function (CommandInterface $command) {
            return new RejectedPromise(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };
        $config = new Configuration('standard', 4);
        $retryMW = new RetryMiddlewareV2(
            $config,
            $nextHandler,
            ['collect_stats' => true]
        );

        try {
            $retryMW(new Command('SomeCommand'), new Request('GET', ''))->wait();
            $this->fail();
        } catch (AwsException $e) {
            // With 3 retries, expect total delay <= 2000 + 4000 + 8000
            $this->assertLessThanOrEqual(14000, $e->getTransferInfo('total_retry_delay'));
        }
    }

    public function testReportsHttpStatsForEachRequest()
    {
        $handler = new MockHandler([
            new Result(['@metadata' => [
                'statusCode' => '503',
                'transferStats' => ['http' => [['foo' => 'bar']]]
            ]]),
            new Result(['@metadata' => [
                'statusCode' => '503',
                'transferStats' => ['http' => [['baz' => 'quux']]]
            ]]),
            new Result(['@metadata' => [
                'statusCode' => '200',
                'transferStats' => ['http' => [['fizz' => 'buzz']]]
            ]]),
        ]);
        $config = new Configuration('standard', 4);
        $retryMW = new RetryMiddlewareV2(
            $config,
            $handler,
            ['collect_stats' => true]
        );

        $result = $retryMW(new Command('SomeCommand'), new Request('GET', ''))
            ->wait();
        $httpStats = $result['@metadata']['transferStats']['http'];
        $this->assertCount(3, $httpStats);
        $this->assertSame([
            ['foo' => 'bar'],
            ['baz' => 'quux'],
            ['fizz' => 'buzz'],
        ], $httpStats);
    }

    public function testReportsHttpStatsForEachRequestEvenIfRetryStatsDisabled()
    {
        $handler = new MockHandler([
            new Result(['@metadata' => [
                'statusCode' => '503',
                'transferStats' => ['http' => [['foo' => 'bar']]]
            ]]),
            new Result(['@metadata' => [
                'statusCode' => '503',
                'transferStats' => ['http' => [['baz' => 'quux']]]
            ]]),
            new Result(['@metadata' => [
                'statusCode' => '200',
                'transferStats' => ['http' => [['fizz' => 'buzz']]]
            ]]),
        ]);
        $config = new Configuration('standard', 4);
        $retryMW = new RetryMiddlewareV2(
            $config,
            $handler,
            ['collect_stats' => true]
        );

        $result = $retryMW(new Command('SomeCommand'), new Request('GET', ''))
            ->wait();
        $httpStats = $result['@metadata']['transferStats']['http'];
        $this->assertCount(3, $httpStats);
        $this->assertSame([
            ['foo' => 'bar'],
            ['baz' => 'quux'],
            ['fizz' => 'buzz'],
        ], $httpStats);
    }
}
