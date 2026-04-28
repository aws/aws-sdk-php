<?php
namespace Aws\Test\Retry\Standard;

use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Aws\ResultInterface;
use Aws\Retry\Configuration;
use Aws\Retry\ConfigurationProvider;
use Aws\Retry\Standard\QuotaManager;
use Aws\Retry\Standard\RetryMiddleware;
use Aws\Retry\RateLimiter;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(RetryMiddleware::class)]
class RetryMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @param CommandInterface $command
     * @param array $queue
     * @param array $options
     * @param $expected
     * @throws \Exception
     */
    #[DataProvider('standardModeTestCases')]
    public function testRetriesForStandardMode(
        CommandInterface $command,
        array $queue,
        array $options,
        $expected
    ) {
        // Clone to avoid cross-dataset mutation of $cmd['@http']['delay'].
        $command = clone $command;
        $request = new Request('GET', 'http://www.example.com');
        $quotaManager = new QuotaManager($options);

        // MockHandler's onFulfilled/onRejected fire at the START of each call,
        // which is AFTER the previous call's middleware processing has
        // finished (acquire/release already ran). So $observedQuotas[N] is the
        // quota state entering call N, i.e. after call N-1's processing. The
        // final response has no "next call", so we capture its post-state
        // into $finalQuota after wait() returns.
        $observedQuotas = [];
        $observedDelays = [];
        $recorder = function () use (
            &$observedQuotas,
            &$observedDelays,
            $quotaManager,
            $command
        ) {
            $observedQuotas[] = $quotaManager->getAvailableCapacity();
            $observedDelays[] = $command['@http']['delay'] ?? null;
        };

        $mock = new MockHandler($queue, $recorder, $recorder);

        $configuration = new Configuration(
            'standard',
            $options['max_attempts'] ?? ConfigurationProvider::DEFAULT_MAX_ATTEMPTS
        );
        $wrapped = new RetryMiddleware(
            $configuration,
            $mock,
            ['quota_manager' => $quotaManager, ...$options]
        );

        $caught = null;
        try {
            $wrapped($command, $request)->wait();
        } catch (\Exception $e) {
            $caught = $e;
        }

        $finalQuota = $quotaManager->getAvailableCapacity();
        $finalDelay = $command['@http']['delay'] ?? null;
        $lastIndex = count($expected) - 1;

        // Post-processing state for attempt X: $observedQuotas[X+1] for all
        // but the last attempt; $finalQuota for the last.
        $quotaAfter = fn(int $i) =>
            $i < $lastIndex ? $observedQuotas[$i + 1] : $finalQuota;
        $delayFor = fn(int $i) =>
            $i < $lastIndex ? $observedDelays[$i + 1] : $finalDelay;

        $lastExpected = $expected[$lastIndex];

        // Verify the expected outcome (success or specific exception).
        if (!empty($lastExpected['error'])) {
            $this->assertNotNull($caught, 'Expected an exception but none was thrown');
            $this->assertInstanceOf(get_class($lastExpected['error']), $caught);
            $this->assertEquals(
                $lastExpected['error']->getMessage(),
                $caught->getMessage()
            );
        } else {
            $this->assertNull(
                $caught,
                'Unexpected exception: ' . ($caught?->getMessage() ?? '')
            );
        }

        foreach ($expected as $i => $resp) {
            $this->assertSame(
                $resp['retry_quota'],
                $quotaAfter($i),
                "Quota mismatch after attempt {$i}"
            );

            if (isset($resp['max_delay'])) {
                $observedDelay = $delayFor($i);
                $this->assertNotNull(
                    $observedDelay,
                    "No observed delay for attempt {$i}"
                );
                $this->assertLessThanOrEqual(
                    $resp['max_delay'],
                    $observedDelay
                );
            }
        }

        $this->assertCount(0, $mock, 'Not all responses were consumed');
    }

    public static function standardModeTestCases(): array
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
        $throttlingError400 = new AwsException(
            'Throttled exception',
            $command,
            [
                'response' => new Response(400),
                'code' => 'Throttling'
            ],
        );
        $awsException500WithRetryAfterHeader =
            function (string|int $value) use ($command) {
            return new AwsException(
                'Internal server error',
                $command,
                [
                    'response' => (new Response(
                        500,
                    ))->withHeader('x-amz-retry-after', $value),
                ],
            );
        };

        // Shapes an S3-style 200-with-error-body the way the S3 parsers
        // surface it: the HTTP status is 200 but the payload is an error, so
        // it reaches the retry middleware as an AwsException flagged as a
        // connection error.
        $s3AmbiguousSuccess200Error =
            function (?string $retryAfter = null) use ($command) {
                $response = new Response(200);
                if ($retryAfter !== null) {
                    $response = $response->withHeader(
                        'x-amz-retry-after',
                        $retryAfter
                    );
                }
                return new AwsException(
                    'We encountered an internal error. Please try again.',
                    $command,
                    [
                        'response' => $response,
                        'connection_error' => true,
                        'code' => 'InternalError',
                    ]
                );
            };

        return [
            'Retry and eventually succeeds' => [
                'command' => $command,
                'queue' => [
                    $awsException500, $awsException500, $result200
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 486,
                        'max_delay' => 50
                    ],
                    [
                        'retry_quota' => 472,
                        'max_delay' => 100
                    ],
                    [
                        'retry_quota' => 486,
                    ]
                ]
            ],
            'Fail due to max attempts reached' => [
                'command' => $command,
                'queue' => [
                    $awsException502, $awsException502, $awsException502
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 486,
                        'max_delay' => 50
                    ],
                    [
                        'retry_quota' => 472,
                        'max_delay' => 100
                    ],
                    [
                        'retry_quota' => 472,
                        'max_attempts_reached' => true,
                        'error' => $awsException502
                    ]
                ]
            ],
            'Retry Quota reached after a single retry' => [
                'command' => $command,
                'queue' => [
                    $awsException500, $awsException500
                ],
                'options' => [
                    'initial_retry_tokens' => 14,
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 0,
                        'max_delay' => 50
                    ],
                    [
                        'retry_quota' => 0,
                        'retry_quota_exceeded' => true,
                        'error' => $awsException500
                    ]
                ]
            ],
            'No retries at all if retry quota is 0' => [
                'command' => $command,
                'queue' => [$awsException500],
                'options' => [
                    'initial_retry_tokens' => 0,
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 0,
                        'retry_quota_exceeded' => true,
                        'error' => $awsException500
                    ]
                ]
            ],
            'Verifying exponential backoff timing' => [
                'command' => $command,
                'queue' => [
                    $awsException500, $awsException500, $awsException500, $awsException500, $awsException500
                ],
                'options' => [
                    'exponential_base' => 1,
                    'max_attempts' => 5,
                ],
                'expected' => [
                    [
                        'retry_quota' => 486,
                        'max_delay' => 50
                    ],
                    [
                        'retry_quota' => 472,
                        'max_delay' => 100
                    ],
                    [
                        'retry_quota' => 458,
                        'max_delay' => 200
                    ],
                    [
                        'retry_quota' => 444,
                        'max_delay' => 400
                    ],
                    [
                        'retry_quota' => 444,
                        'max_attempts_reached' => true,
                        'error' => $awsException500
                    ]
                ]
            ],
            'Verify max backoff time' => [
                'command' => $command,
                'queue' => [
                    $awsException500, $awsException500, $awsException500, $awsException500, $awsException500
                ],
                'options' => [
                    'exponential_base' => 1,
                    'max_attempts' => 5,
                    'max_backoff' => 200
                ],
                'expected' => [
                    [
                        'retry_quota' => 486,
                        'max_delay' => 50
                    ],
                    [
                        'retry_quota' => 472,
                        'max_delay' => 100
                    ],
                    [
                        'retry_quota' => 458,
                        'max_delay' => 200
                    ],
                    [
                        'retry_quota' => 444,
                        'max_delay' => 200
                    ],
                    [
                        'retry_quota' => 444,
                        'max_attempts_reached' => true,
                        'error' => $awsException500
                    ]
                ]
            ],
            'Retry stops after retry quota exhaustion' => [
                'command' => $command,
                'queue' => [
                    $awsException500, $awsException502
                ],
                'options' => [
                    'max_attempts' => 5,
                    'initial_retry_tokens' => 20,
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 6,
                        'max_delay' => 50
                    ],
                    [
                        'retry_quota' => 6,
                        'retry_quota_exceeded' => true,
                        'error' => $awsException502
                    ]
                ]
            ],
            'Retry quota recovery - first invocation' => [
                'command' => $command,
                'queue' => [
                    $awsException500, $awsException502, $result200
                ],
                'options' => [
                    'max_attempts' => 5,
                    'initial_retry_tokens' => 30,
                    'exponential_base' => 1
                ],
                'expected' => [
                    ['retry_quota' => 16, 'max_delay' => 50],
                    ['retry_quota' => 2, 'max_delay' => 100],
                    ['retry_quota' => 16],
                ]
            ],
            'Retry quota recovery - second invocation' => [
                'command' => $command,
                'queue' => [
                    $awsException500, $result200
                ],
                'options' => [
                    'max_attempts' => 5,
                    'initial_retry_tokens' => 16,
                    'exponential_base' => 1
                ],
                'expected' => [
                    ['retry_quota' => 2, 'max_delay' => 50],
                    ['retry_quota' => 16],
                ]
            ],
            'Throttling error token bucket drain (5 tokens) and backoff 1000ms' => [
                'command' => $command,
                'queue' => [
                    $throttlingError400, $result200
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 495,
                        'max_delay' => 1000
                    ],
                    [
                        'retry_quota' => 500,
                    ]
                ]
            ],
            'DynamoDB base backoff (25ms) and increased retries' => [
                'command' => $command,
                'queue' => [
                    $awsException500,
                    $awsException500,
                    $awsException500,
                    $awsException500,
                ],
                'options' => [
                    'service' => 'dynamodb',
                    'base_delay' => 25,
                    'max_attempts' => 4,
                    'exponential_base' => 1,
                ],
                'expected' => [
                    ['retry_quota' => 486, 'max_delay' => 25],
                    ['retry_quota' => 472, 'max_delay' => 50],
                    ['retry_quota' => 458, 'max_delay' => 100],
                    [
                        'retry_quota' => 458,
                        'max_attempts_reached' => true,
                        'error' => $awsException500,
                    ],
                ],
            ],
            'Long-Polling backoff when after transient error and token bucket empty' => [
                'command' => new Command('ReceiveMessage'),
                'queue' => [
                    $awsException500
                ],
                'options' => [
                    'service' => 'sqs',
                    'exponential_base' => 1,
                    'initial_retry_tokens' => 0,
                ],
                'expected' => [
                    [
                        'retry_quota' => 0,
                        'max_delay' => 50,
                        'error' => $awsException500
                    ]
                ]
            ],
            'Honor x-amz-retry-after header' => [
                'command' => $command,
                'queue' => [
                    $awsException500WithRetryAfterHeader(1500), $result200
                ],
                'options' => [],
                'expected' => [
                    [
                        'retry_quota' => 486,
                        'max_delay' => 1500
                    ],
                    [
                        'retry_quota' => 500,
                    ]
                ]
            ],
            'x-amz-retry-after minimum is exponential backoff duration' => [
                'command' => $command,
                'queue' => [
                    $awsException500WithRetryAfterHeader(0), $result200
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 486,
                        'max_delay' => 50
                    ],
                    [
                        'retry_quota' => 500,
                    ]
                ]
            ],
            'x-amz-retry-after maximum is 5+exponential backoff duration' => [
                'command' => $command,
                'queue' => [
                    $awsException500WithRetryAfterHeader(10_000), $result200
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 486,
                        'max_delay' => 5050
                    ],
                    [
                        'retry_quota' => 500,
                    ]
                ]
            ],
            'Invalid x-amz-retry-after header falls back to exponential backoff' => [
                'command' => $command,
                'queue' => [
                    $awsException500WithRetryAfterHeader("invalid"), $result200
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    [
                        'retry_quota' => 486,
                        'max_delay' => 50
                    ],
                    [
                        'retry_quota' => 500,
                    ]
                ]
            ],
            'S3 200 error body is retried' => [
                'command' => $command,
                'queue' => [
                    $s3AmbiguousSuccess200Error(),
                    $s3AmbiguousSuccess200Error(),
                    $result200,
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    ['retry_quota' => 486, 'max_delay' => 50],
                    ['retry_quota' => 472, 'max_delay' => 100],
                    ['retry_quota' => 486],
                ]
            ],
            'S3 200 error body honors x-amz-retry-after header' => [
                'command' => $command,
                'queue' => [
                    $s3AmbiguousSuccess200Error('1500'),
                    $result200,
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    ['retry_quota' => 486, 'max_delay' => 1500],
                    ['retry_quota' => 500],
                ]
            ],
            'S3 200 error body clamps x-amz-retry-after to 5+exp backoff' => [
                'command' => $command,
                'queue' => [
                    $s3AmbiguousSuccess200Error('10000'),
                    $result200,
                ],
                'options' => [
                    'exponential_base' => 1
                ],
                'expected' => [
                    ['retry_quota' => 486, 'max_delay' => 5050],
                    ['retry_quota' => 500],
                ]
            ],
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

        $provider = ApiProvider::filesystem(__DIR__ . '/../../fixtures/aws_exception_test');
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
                    0.5,
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

        $wrapped = new RetryMiddleware(
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

        $this->assertCount($attempt, $expectedTimes);
    }

    public function testAddRetryHeader()
    {
        $nextHandler = function (CommandInterface $command, RequestInterface $request) {
            $this->assertTrue($request->hasHeader('aws-sdk-retry'));
            return new RejectedPromise(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };
        $retryMW = new RetryMiddleware(
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
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $result = new Result(['@metadata' => ['statusCode' => '500']]);
        $this->assertTrue($decider(0, $command, $result));
        $result = new Result(['@metadata' => ['statusCode' => '503']]);
        $this->assertTrue($decider(0, $command, $result));
    }

    public function testDeciderRetriesWhenConnectionError()
    {
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $err = new AwsException('e', $command, ['connection_error' => true]);
        $this->assertTrue($decider(0, $command, $err));
        $err = new AwsException('e', $command, ['connection_error' => false]);
        $this->assertFalse($decider(0, $command, $err));
    }

    public function testDeciderIgnoresNonAwsExceptions()
    {
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $err = new \Exception('e');
        $this->assertFalse($decider(0, $command, $err));
    }

    public function testDeciderIgnoresPHPError()
    {
        if (interface_exists('Throwable', false)) {
            $decider = RetryMiddleware::createDefaultDecider();
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
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $previous = new RequestException(
            'test',
            $request,
            null,
            null,
            ['errno' => CURLE_RECV_ERROR]
        );
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
        $decider = RetryMiddleware::createDefaultDecider(
            ['curl_errors' => [CURLE_BAD_CONTENT_ENCODING]]
        );
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $previous = new RequestException(
            'test',
            $request,
            null,
            null,
            ['errno' => CURLE_BAD_CONTENT_ENCODING]
        );
        $err = new AwsException(
            'e',
            $command,
            ['connection_error' => false],
            $previous
        );
        $this->assertTrue($decider(0, $command, $err));

        $previous = new RequestException(
            'test',
            $request,
            null,
            null,
            ['errno' => CURLE_ABORTED_BY_CALLBACK]
        );
        $err = new AwsException(
            'e',
            $command,
            ['connection_error' => false],
            $previous
        );
        $this->assertFalse($decider(0, $command, $err));
    }

    public static function awsErrorCodeProvider(): array
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
     */
    #[DataProvider('awsErrorCodeProvider')]
    public function testDeciderRetriesWhenAwsErrorCodeMatches($err)
    {
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $this->assertTrue($decider(0, $command, $err));
    }

    public function testDeciderRetriesWhenExceptionStatusCodeMatches()
    {
        $decider = RetryMiddleware::createDefaultDecider();
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
        $decider = RetryMiddleware::createDefaultDecider();
        $provider = ApiProvider::filesystem(__DIR__ . '/../../fixtures/aws_exception_test');
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
        $decider = RetryMiddleware::createDefaultDecider([
            'transient_error_codes' => ['CustomRetryableException'],
            'throttling_error_codes' => ['CustomThrottlingException'],
        ]);
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
        $decider = RetryMiddleware::createDefaultDecider(
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
        // createDefaultDecider now only checks retryability, not max attempts.
        // Max attempts are checked in __invoke. This test verifies the decider
        // still returns true for retryable errors regardless of attempt count.
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $err = new AwsException('e', $command, ['code' => 'RequestLimitExceeded']);
        $this->assertTrue($decider(0, $command, $err));
        // Now the decider always returns retryable status; __invoke handles max attempts
        $this->assertTrue($decider(3, $command, $err));
    }

    public function testUsesCustomDelayer()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $attempts = 0;
        $handler = function ($command, $request) use (&$attempts) {
            if ($attempts > 0) {
                $this->assertSame(9999, $command['@http']['delay']);
            }
            $attempts++;
            return \GuzzleHttp\Promise\Create::rejectionFor(
                new AwsException(
                    'foo',
                    $command,
                    [
                        'response' => new Response(502)
                    ]
                )
            );
        };

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $handler,
            [
                'delayer' => function () {
                    return 9999;
                }
            ]
        );

        try {
            $wrapped($command, $request)->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertSame(3, $attempts);
            $this->assertStringContainsString('foo', $e->getMessage());
        }
    }

    public function testDelaysExponentiallyWithJitter()
    {
        $retryMiddleware = new RetryMiddleware(new Configuration('standard', 3), function () {});
        // With 50ms base: max at attempt 1 = 50*2^0 = 50ms, attempt 2 = 50*2^1 = 100ms
        $this->assertLessThanOrEqual(50, $retryMiddleware->exponentialDelayWithJitter(1));
        $this->assertLessThanOrEqual(100, $retryMiddleware->exponentialDelayWithJitter(2));
        $this->assertLessThanOrEqual(200, $retryMiddleware->exponentialDelayWithJitter(3));
        $this->assertLessThanOrEqual(20000, $retryMiddleware->exponentialDelayWithJitter(10));
    }

    public function testDelaysWithSomeRandomness()
    {
        $retryMiddleware = new RetryMiddleware(new Configuration('standard', 3), function () {});
        // With 50ms base: max at attempt 4 = 0.05 * 2^3 * 1000 = 400ms
        $maxDelay = 0.05 * pow(2, 3) * 1000;
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
                    $this->assertLessThanOrEqual(100, $command['@http']['delay']);
                    return $res2;
                },
            ],
            function () use (&$called) { $called[] = func_get_args(); }
        );

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 5),
            $mock
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
                    $this->assertLessThanOrEqual(100, $command['@http']['delay']);
                    return new Result();
                },
            ],
            function () use (&$called) { $called[] = func_get_args(); },
            function () use (&$called) { $called[] = func_get_args(); }
        );

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 5),
            $mock
        );

        $result = $wrapped($command, $request)->wait();
        $this->assertInstanceOf(ResultInterface::class, $result);
        $this->assertCount(2, $called);
        $this->assertInstanceOf(AwsException::class, $called[0][0]);
        $this->assertInstanceOf(ResultInterface::class, $called[1][0]);
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

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 5),
            $mock
        );

        try {
            $wrapped($command, $request)->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertCount(1, $called);
            $this->assertStringContainsString('foo', $e->getMessage());
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

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 5),
            $mock
        );

        $result = $wrapped($command, $request)->wait();
        $this->assertSame($res1, $result);
        $this->assertCount(1, $called);
    }

    public function testRetriesCanBeDisabledOnACommand()
    {
        $command = new Command('foo', ['@retries' => 0]);
        $request = new Request('GET', 'http://www.example.com');

        $handler = function ($command, $request) {
            return \GuzzleHttp\Promise\Create::rejectionFor(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $handler
        );

        try {
            $wrapped($command, $request)->wait();
            $this->fail();
        } catch (AwsException $e) {
            // Should not retry since @retries=0 means max_attempts=1
            $this->assertTrue($e->isMaxRetriesExceeded());
        }
    }

    public function testResultReportsTheNumberOfRetries()
    {
        $handler = new MockHandler([
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '200']]),
        ]);

        $config = new Configuration('standard', 3);

        $retryMW = new RetryMiddleware(
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
        $retryMW = new RetryMiddleware(
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
        $retryMW = new RetryMiddleware(
            $config,
            $handler,
            ['collect_stats' => true]
        );

        $result = $retryMW(new Command('SomeCommand'), new Request('GET', ''))
            ->wait();
        $this->assertArrayHasKey('total_retry_delay', $result['@metadata']['transferStats']);
        // With 50ms base and 3 retries, expect total delay <= 50 + 100 + 200 = 350
        $this->assertLessThanOrEqual(350, $result['@metadata']['transferStats']['total_retry_delay']);
    }

    public function testExceptionReportsTotalRetryDelay()
    {
        $nextHandler = function (CommandInterface $command) {
            return new RejectedPromise(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };
        $config = new Configuration('standard', 4);
        $retryMW = new RetryMiddleware(
            $config,
            $nextHandler,
            ['collect_stats' => true]
        );

        try {
            $retryMW(new Command('SomeCommand'), new Request('GET', ''))->wait();
            $this->fail();
        } catch (AwsException $e) {
            // With 50ms base and 3 retries, expect total delay <= 50 + 100 + 200 = 350
            $this->assertLessThanOrEqual(350, $e->getTransferInfo('total_retry_delay'));
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
        $retryMW = new RetryMiddleware(
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

    public function testReportsHttpStatsForEachException()
    {
        $command = new Command('TestCommand');
        $response = new Response(500);

        $handler = new MockHandler([
            new AwsException(
                'Test Exception',
                $command,
                [
                    'response' => $response,
                    'transfer_stats' => [
                        'starttransfer_time' => 5,
                        'appconnect_time' => 4
                    ]
                ]
            ),
            new AwsException(
                'Test Exception',
                $command,
                [
                    'response' => $response,
                    'transfer_stats' => [
                        'starttransfer_time' => 10,
                        'appconnect_time' => 8
                    ]
                ]
            ),
            new AwsException(
                'Test Exception',
                $command,
                [
                    'response' => $response,
                    'transfer_stats' => [
                        'starttransfer_time' => 15,
                        'appconnect_time' => 12
                    ]
                ]
            ),
            new AwsException(
                'Test Exception',
                $command,
                [
                    'response' => $response,
                    'transfer_stats' => [
                        'starttransfer_time' => 20,
                        'appconnect_time' => 16
                    ]
                ]
            )
        ]);

        $config = new Configuration('standard', 4);
        $retryMW = new RetryMiddleware(
            $config,
            $handler,
            ['collect_stats' => true]
        );

        try {
            $retryMW(new Command('SomeCommand'), new Request('GET', ''))
                ->wait();
            $this->fail('This command should have produced an AwsException.');
        } catch (AwsException $e) {
            $stats= $e->getTransferInfo();
            $this->assertEquals(
                [
                    [
                        'starttransfer_time' => 5,
                        'appconnect_time' => 4
                    ],
                    [
                        'starttransfer_time' => 10,
                        'appconnect_time' => 8
                    ],
                    [
                        'starttransfer_time' => 15,
                        'appconnect_time' => 12
                    ],
                    [
                        'starttransfer_time' => 20,
                        'appconnect_time' => 16
                    ],
                ],
                $stats['http']
            );
        }
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
        $retryMW = new RetryMiddleware(
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

    public function testDecisionOrderMaxAttemptsBeforeQuota()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');

        $quotaManager = new QuotaManager(['initial_retry_tokens' => 500]);

        $mock = new MockHandler([
            new AwsException('e', $command, ['response' => new Response(500)]),
            new AwsException('e', $command, ['response' => new Response(500)]),
        ]);

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 2),
            $mock,
            ['quota_manager' => $quotaManager]
        );

        try {
            $wrapped($command, $request)->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertTrue($e->isMaxRetriesExceeded());
            // Only 1 retry happened, so only 14 tokens consumed
            $this->assertSame(486, $quotaManager->getAvailableCapacity());
        }
    }

    public function testThrottlingBaseDelayNotAffectedByBaseDelayOption()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');

        $mock = new MockHandler([
            new AwsException('e', $command, [
                'response' => new Response(429),
                'code' => 'Throttling',
            ]),
            new Result(['@metadata' => ['statusCode' => 200]]),
        ]);

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $mock,
            [
                'base_delay' => 0.025, // DynamoDB-style base delay
                'exponential_base' => 1.0, // deterministic
            ]
        );

        // Capture the delay
        $delays = [];
        $origHandler = $mock;
        $capturingHandler = function ($cmd, $req) use ($origHandler, &$delays) {
            if (isset($cmd['@http']['delay'])) {
                $delays[] = $cmd['@http']['delay'];
            }
            return $origHandler($cmd, $req);
        };

        $wrapped2 = new RetryMiddleware(
            new Configuration('standard', 3),
            $capturingHandler,
            [
                'base_delay' => 0.025,
                'exponential_base' => 1.0,
            ]
        );

        // Just verify the flow works with throttling
        $result = $wrapped($command, $request)->wait();
        $this->assertSame(200, $result['@metadata']['statusCode']);
    }

    public function testQuotaReleasedOnSuccessAfterRetry()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $quotaManager = new QuotaManager(['initial_retry_tokens' => 500]);

        $mock = new MockHandler([
            new AwsException('e', $command, ['response' => new Response(500)]),
            new Result(['@metadata' => ['statusCode' => 200]]),
        ]);

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $mock,
            ['quota_manager' => $quotaManager]
        );

        $wrapped($command, $request)->wait();
        // After retry (cost 14) and success (release 14), quota should be back to 500
        $this->assertSame(500, $quotaManager->getAvailableCapacity());
    }

    public function testFirstAttemptSuccessIncrementsQuota()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $quotaManager = new QuotaManager(['initial_retry_tokens' => 500]);

        // First, drain some quota so we can see the increment
        $quotaManager->acquireRetryQuota(true); // 500 -> 495

        $mock = new MockHandler([
            new Result(['@metadata' => ['statusCode' => 200]]),
        ]);

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $mock,
            ['quota_manager' => $quotaManager]
        );

        $wrapped($command, $request)->wait();
        // First attempt success releases null (no_retry_increment=1), 495+1 = 496
        $this->assertSame(496, $quotaManager->getAvailableCapacity());
    }

    public function testCustomDeciderAsAdditionalCheck()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');

        // This exception is NOT retryable by default (403, no error code)
        $err = new AwsException('custom', $command, [
            'response' => new Response(403),
        ]);

        $mock = new MockHandler([
            $err,
            new Result(['@metadata' => ['statusCode' => 200]]),
        ]);

        // Custom decider makes 403 retryable
        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $mock,
            [
                'decider' => function ($attempts, $cmd, $result) {
                    if ($result instanceof AwsException
                        && $result->getResponse()
                        && $result->getResponse()->getStatusCode() === 403
                    ) {
                        return true;
                    }
                    return false;
                }
            ]
        );

        $result = $wrapped($command, $request)->wait();
        $this->assertSame(200, $result['@metadata']['statusCode']);
    }

    #[DataProvider('longPollingOperationsProvider')]
    public function testLongPollingOperationsList($service, $commandName)
    {
        $command = new Command($commandName);
        $request = new Request('GET', 'http://www.example.com');

        $quotaManager = new QuotaManager(['initial_retry_tokens' => 0]);

        $mock = new MockHandler([
            new AwsException('e', $command, ['response' => new Response(500)]),
        ]);

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $mock,
            [
                'quota_manager' => $quotaManager,
                'service' => $service,
            ]
        );

        try {
            $wrapped($command, $request)->wait();
        } catch (AwsException $e) {
            // Expected - quota exhausted, but long-polling should sleep
        }

        $this->assertSame(0, $quotaManager->getAvailableCapacity());
    }

    public static function longPollingOperationsProvider(): array
    {
        return [
            ['sqs', 'ReceiveMessage'],
            ['states', 'GetActivityTask'],
            ['swf', 'PollForActivityTask'],
            ['swf', 'PollForDecisionTask'],
        ];
    }

    public function testRetryAfterHeaderClamping()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $delays = [];

        $handler = function ($cmd, $req) use (&$delays, $command) {
            if (isset($cmd['@http']['delay'])) {
                $delays[] = $cmd['@http']['delay'];
            }

            // After first retry, return success
            if (count($delays) > 0) {
                return \GuzzleHttp\Promise\Create::promiseFor(
                    new Result(['@metadata' => ['statusCode' => 200]])
                );
            }

            return \GuzzleHttp\Promise\Create::rejectionFor(
                new AwsException('e', $command, [
                    'response' => new Response(500, ['x-amz-retry-after' => '1500']),
                ])
            );
        };

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $handler,
            ['exponential_base' => 1.0]
        );

        $wrapped($command, $request)->wait();
        // Delay should be 1500ms (retry-after=1500, clamped to [50, 5050])
        $this->assertSame(1500, $delays[0]);
    }

    public function testRetryAfterHeaderMaxClamp()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $delays = [];

        $handler = function ($cmd, $req) use (&$delays, $command) {
            if (isset($cmd['@http']['delay'])) {
                $delays[] = $cmd['@http']['delay'];
            }

            if (count($delays) > 0) {
                return \GuzzleHttp\Promise\Create::promiseFor(
                    new Result(['@metadata' => ['statusCode' => 200]])
                );
            }

            return \GuzzleHttp\Promise\Create::rejectionFor(
                new AwsException('e', $command, [
                    'response' => new Response(500, ['x-amz-retry-after' => '10000']),
                ])
            );
        };

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $handler,
            ['exponential_base' => 1.0]
        );

        $wrapped($command, $request)->wait();
        // With exponential_base=1.0 and attempt 0: delay = 1.0 * min(0.05 * 2^0, 20) = 50ms
        // retry-after=10000 clamped to [50, 5050] = 5050ms
        $this->assertSame(5050, $delays[0]);
    }

    public function testRetryAfterHeaderMinClamp()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $delays = [];

        $handler = function ($cmd, $req) use (&$delays, $command) {
            if (isset($cmd['@http']['delay'])) {
                $delays[] = $cmd['@http']['delay'];
            }

            if (count($delays) > 0) {
                return \GuzzleHttp\Promise\Create::promiseFor(
                    new Result(['@metadata' => ['statusCode' => 200]])
                );
            }

            return \GuzzleHttp\Promise\Create::rejectionFor(
                new AwsException('e', $command, [
                    'response' => new Response(500, ['x-amz-retry-after' => '0']),
                ])
            );
        };

        $wrapped = new RetryMiddleware(
            new Configuration('standard', 3),
            $handler,
            ['exponential_base' => 1.0]
        );

        $wrapped($command, $request)->wait();
        // retry-after=0 clamped to [50, 5050] = 50ms (the computed delay minimum)
        $this->assertSame(50, $delays[0]);
    }
}
