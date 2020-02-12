<?php
namespace Aws\Test;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Aws\Retry\Configuration;
use Aws\Retry\QuotaManager;
use Aws\RetryMiddlewareV2;
use GuzzleHttp\ClientInterface;
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

    public function testDeciderRetriesForCustomErrorCodes()
    {
        $decider = RetryMiddlewareV2::createDefaultDecider(
            new QuotaManager(),
            3,
            ['error_codes' => ['CustomRetryableException']]
        );
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $err = new AwsException('e', $command, [
            'code' => 'CustomRetryableException'
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

    public function testDelaysExponentiallyWithJitter()
    {
        $this->assertLessThanOrEqual(2000, RetryMiddlewareV2::exponentialDelayWithJitter(1));
        $this->assertLessThanOrEqual(4000, RetryMiddlewareV2::exponentialDelayWithJitter(2));
        $this->assertLessThanOrEqual(8000, RetryMiddlewareV2::exponentialDelayWithJitter(3));
        $this->assertLessThanOrEqual(20000, RetryMiddlewareV2::exponentialDelayWithJitter(10));
    }

    public function testDelaysWithSomeRandomness()
    {
        $maxDelay = 1000 * pow(2, 4);
        $values = array_map(function () {
            return RetryMiddlewareV2::exponentialDelayWithJitter(4);
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
