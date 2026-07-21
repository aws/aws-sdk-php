<?php
namespace Aws\Test\Handler\Guzzle;

use Aws\Handler\Guzzle\GuzzleHandler;
use Aws\Test\CreatesGuzzleExceptionsTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\NetworkException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ResponseTransferException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Promise\RejectionException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\TransferStats;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(GuzzleHandler::class)]
class HandlerTest extends TestCase
{
    use CreatesGuzzleExceptionsTrait;

    public function testHandlerWorksWithSuccessfulRequest()
    {
        $mock = new MockHandler([new Response(200, [], Psr7\Utils::streamFor('foo'))]);
        $client = new Client(['handler' => $mock]);
        $handler = new GuzzleHandler($client);

        $request = new Request('PUT', 'http://example.com', [], '{}');
        $promise = $handler($request, ['delay' => 500]);
        $this->assertInstanceOf('GuzzleHttp\\Promise\\PromiseInterface', $promise);

        /** @var $response Response */
        $response = $promise->wait();
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('foo', $response->getBody()->getContents());
    }

    public function testHandlerWorksWithFailedRequest()
    {
        $wasRejected = false;
        $request = new Request('PUT', 'http://example.com');
        $mock = new MockHandler([self::createRequestException(
            'message',
            $request,
            new Response(500)
        )]);
        $client = new Client(['handler' => $mock]);
        $handler = new GuzzleHandler($client);

        $promise = $handler(new Request('PUT', 'http://example.com'));
        $promise->then(null, function (array $error) use (&$wasRejected) {
            $wasRejected = true;
        });

        try {
            $promise->wait();
            $this->fail('An exception should have been thrown.');
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertInstanceOf(RequestException::class, $error['exception']);
            $this->assertFalse($error['connection_error']);
            $this->assertInstanceOf(Response::class, $error['response']);
            $this->assertSame(500, $error['response']->getStatusCode());
        }

        $this->assertTrue($wasRejected, 'Reject callback was not triggered.');
    }

    public function testHandlerMarksConnectExceptionAsConnectionError()
    {
        $request = new Request('PUT', 'http://example.com');
        $mock = new MockHandler([
            new ConnectException('message', $request),
        ]);
        $client = new Client(['handler' => $mock]);
        $handler = new GuzzleHandler($client);

        $promise = $handler($request);

        try {
            $promise->wait();
            $this->fail('An exception should have been thrown.');
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertTrue($error['connection_error']);
            $this->assertNull($error['response']);
        }
    }

    public function testHandlerMarksCurlRecvErrorAsConnectionError()
    {
        $request = new Request('PUT', 'http://example.com');
        $exception = new class ('message', $request) extends RequestException {
            public function getHandlerContext(): array
            {
                return ['errno' => 56];
            }
        };
        $mock = new MockHandler([$exception]);
        $client = new Client(['handler' => $mock]);
        $handler = new GuzzleHandler($client);

        $promise = $handler($request);

        try {
            $promise->wait();
            $this->fail('An exception should have been thrown.');
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertTrue($error['connection_error']);
            $this->assertNull($error['response']);
        }
    }

    public function testHandlerMarksNetworkExceptionAsConnectionError()
    {
        if (!class_exists(NetworkException::class)) {
            $this->markTestSkipped('NetworkException is only available in Guzzle 8.');
        }

        $request = new Request('PUT', 'http://example.com');
        $mock = new MockHandler([
            new NetworkException('message', $request),
        ]);
        $client = new Client(['handler' => $mock]);
        $handler = new GuzzleHandler($client);

        $promise = $handler($request);

        try {
            $promise->wait();
            $this->fail('An exception should have been thrown.');
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertTrue($error['connection_error']);
            $this->assertNull($error['response']);
        }
    }

    public function testHandlerMarksResponseTransferExceptionAsConnectionError()
    {
        if (!class_exists(ResponseTransferException::class)) {
            $this->markTestSkipped('ResponseTransferException is only available in Guzzle 8.');
        }

        $request = new Request('PUT', 'http://example.com');
        $response = new Response(200);
        $mock = new MockHandler([
            new ResponseTransferException('message', $request, $response),
        ]);
        $client = new Client(['handler' => $mock]);
        $handler = new GuzzleHandler($client);

        $promise = $handler($request);

        try {
            $promise->wait();
            $this->fail('An exception should have been thrown.');
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertTrue($error['connection_error']);
            $this->assertSame($response, $error['response']);
        }
    }

    public function testHandlerWillInvokeOnTransferStatsCallback()
    {
        $mock = new MockHandler([new Response(200, [], Psr7\Utils::streamFor('foo'))]);
        $client = new Client(['handler' => $mock]);
        $handler = new GuzzleHandler($client);

        $request = new Request('PUT', 'http://example.com');
        $wasCalled = false;
        $options = [
            'http_stats_receiver' => function (array $stats) use (&$wasCalled) {
                $this->assertArrayHasKey('total_time', $stats);
                $wasCalled = true;
            },
        ];
        $handler($request, $options)->wait();

        $this->assertTrue($wasCalled);
    }

    public function testHandlerWillStillInvokeOnStatsCallback()
    {
        $mock = new MockHandler([new Response(200, [], Psr7\Utils::streamFor('foo'))]);
        $client = new Client(['handler' => $mock]);
        $handler = new GuzzleHandler($client);

        $request = new Request('PUT', 'http://example.com');
        $wasCalled = false;
        $options = [
            'http_stats_receiver' => function () {},
            'on_stats' => function (TransferStats $stats) use (&$wasCalled) {
                $wasCalled = true;
            },
        ];
        $handler($request, $options)->wait();

        $this->assertTrue($wasCalled);
    }
}
