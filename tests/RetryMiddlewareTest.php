<?php
namespace Aws\Test;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Aws\RetryMiddleware;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\RetryMiddleware
 */
class RetryMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    public function testAddRetryHeader()
    {
        $nextHandler = function (CommandInterface $command, RequestInterface $request) {
            $this->assertTrue($request->hasHeader('aws-sdk-retry'));
            return new RejectedPromise(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };
        $retryMW = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider($retries = 3),
            [RetryMiddleware::class, 'exponentialDelay'],
            $nextHandler,
            true
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
        $request = new Request('GET', 'http://www.example.com');
        $result = new Result(['@metadata' => ['statusCode' => '500']]);
        $this->assertTrue($decider(0, $command, $request, $result, null));
        $result = new Result(['@metadata' => ['statusCode' => '503']]);
        $this->assertTrue($decider(0, $command, $request, $result, null));
    }

    public function testDeciderRetriesWhenConnectionError()
    {
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $err = new AwsException('e', $command, ['connection_error' => true]);
        $this->assertTrue($decider(0, $command, $request, null, $err));
        $err = new AwsException('e', $command, ['connection_error' => false]);
        $this->assertFalse($decider(0, $command, $request, null, $err));
    }

    public function testDeciderIgnoresNonAwsExceptions()
    {
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $err = new \Exception('e');
        $this->assertFalse($decider(0, $command, $request, null, $err));
    }

    public function testDeciderIgnoresPHPError()
    {
        if (interface_exists('Throwable', false)) {
            $decider = RetryMiddleware::createDefaultDecider();
            $command = new Command('foo');
            $request = new Request('GET', 'http://www.example.com');
            $err = new \Error('e');
            $this->assertFalse($decider(0, $command, $request, null, $err));
        }
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
            [new AwsException('e', $command, ['code' => 'BandwidthLimitExceeded'])]
        ];
    }
    /**
    * @param $err
    *
    * @dataProvider awsErrorCodeProvider
    */
    public function testDeciderRetriesWhenAwsErrorCodeMatches($err)
    {
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');

        $this->assertTrue($decider(0, $command, $request, null, $err));
    }

    public function testDeciderRetriesWhenExceptionStatusCodeMatches()
    {
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $err = new AwsException('e', $command, ['response' => new Response(500)]);
        $this->assertTrue($decider(0, $command, $request, null, $err));
        $err = new AwsException('e', $command, ['response' => new Response(502)]);
        $this->assertTrue($decider(0, $command, $request, null, $err));
        $err = new AwsException('e', $command, ['response' => new Response(503)]);
        $this->assertTrue($decider(0, $command, $request, null, $err));
        $err = new AwsException('e', $command, ['response' => new Response(504)]);
        $this->assertTrue($decider(0, $command, $request, null, $err));
        $err = new AwsException('e', $command, ['response' => new Response(403)]);
        $this->assertFalse($decider(0, $command, $request, null, $err));
    }

    public function testDeciderDoesNotRetryAfterMaxAttempts()
    {
        $decider = RetryMiddleware::createDefaultDecider();
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $err = new AwsException('e', $command, ['code' => 'RequestLimitExceeded']);
        $this->assertTrue($decider(0, $command, $request, null, $err));
        $this->assertFalse($decider(3, $command, $request, null, $err));
    }

    public function testDelaysExponentially()
    {
        $this->assertLessThanOrEqual(100, RetryMiddleware::exponentialDelay(0));
        $this->assertLessThanOrEqual(200, RetryMiddleware::exponentialDelay(1));
        $this->assertLessThanOrEqual(400, RetryMiddleware::exponentialDelay(2));
        $this->assertLessThanOrEqual(800, RetryMiddleware::exponentialDelay(3));
        $this->assertLessThanOrEqual(20000, RetryMiddleware::exponentialDelay(10));
    }

    public function testDelaysWithSomeRandomness()
    {
        $maxDelay = 100 * pow(2, 5);
        $values = array_map(function () {
            return RetryMiddleware::exponentialDelay(5);
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
                    $this->assertFalse(isset($command['@http']['delay']));
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
            RetryMiddleware::createDefaultDecider(),
            [RetryMiddleware::class, 'exponentialDelay'],
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
                    $this->assertFalse(isset($command['@http']['delay']));
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
            RetryMiddleware::createDefaultDecider(),
            [RetryMiddleware::class, 'exponentialDelay'],
            $mock
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
                    $this->assertFalse(isset($command['@http']['delay']));
                    return new AwsException('foo', $command);
                }
            ],
            function () use (&$called) { $called[] = func_get_args(); },
            function () use (&$called) { $called[] = func_get_args(); }
        );

        $wrapped = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider(),
            [RetryMiddleware::class, 'exponentialDelay'],
            $mock
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

        $wrapped = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider(),
            [RetryMiddleware::class, 'exponentialDelay'],
            $mock
        );

        $result = $wrapped($command, $request)->wait();
        $this->assertSame($res1, $result);
        $this->assertCount(1, $called);
    }

    public function testRetriesCanBeDisabledOnACommand()
    {
        $decider = RetryMiddleware::createDefaultDecider($retries = 3);
        $command = new Command('foo', ['@retries' => 0]);
        $request = new Request('GET', 'http://www.example.com');
        $err = new AwsException('e', $command, ['connection_error' => true]);
        $this->assertFalse($decider(0, $command, $request, null, $err));
    }

    public function testResultReportsTheNumberOfRetries()
    {
        $handler = new MockHandler([
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '200']]),
        ]);
        $retryMW = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider($retries = 3),
            [RetryMiddleware::class, 'exponentialDelay'],
            $handler,
            true
        );

        $result = $retryMW(new Command('SomeCommand'), new Request('GET', ''))
            ->wait();
        $this->assertTrue(isset($result['@metadata']['transferStats']['retries_attempted']));
        $this->assertSame(2, $result['@metadata']['transferStats']['retries_attempted']);
    }

    public function testExceptionReportsTheNumberOfRetries()
    {
        $nextHandler = function (CommandInterface $command) {
            return new RejectedPromise(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };
        $retryMW = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider($retries = 3),
            [RetryMiddleware::class, 'exponentialDelay'],
            $nextHandler,
            true
        );

        try {
            $retryMW(new Command('SomeCommand'), new Request('GET', ''))->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertSame(3, $e->getTransferInfo('retries_attempted'));
        }
    }

    public function testResultReportsTotalRetryDelay()
    {
        $handler = new MockHandler([
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '503']]),
            new Result(['@metadata' => ['statusCode' => '200']]),
        ]);
        $retryMW = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider($retries = 3),
            function () { return 100; },
            $handler,
            true
        );

        $result = $retryMW(new Command('SomeCommand'), new Request('GET', ''))
            ->wait();
        $this->assertTrue(isset($result['@metadata']['transferStats']['total_retry_delay']));
        $this->assertSame(200, $result['@metadata']['transferStats']['total_retry_delay']);
    }

    public function testExceptionReportsTotalRetryDelay()
    {
        $nextHandler = function (CommandInterface $command) {
            return new RejectedPromise(
                new AwsException('e', $command, ['connection_error' => true])
            );
        };
        $retryMW = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider($retries = 3),
            function () { return 100; },
            $nextHandler,
            true
        );

        try {
            $retryMW(new Command('SomeCommand'), new Request('GET', ''))->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertSame(300, $e->getTransferInfo('total_retry_delay'));
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
        $retryMW = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider($retries = 3),
            [RetryMiddleware::class, 'exponentialDelay'],
            $handler,
            true
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
        $retryMW = new RetryMiddleware(
            RetryMiddleware::createDefaultDecider($retries = 3),
            [RetryMiddleware::class, 'exponentialDelay'],
            $handler,
            false
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
