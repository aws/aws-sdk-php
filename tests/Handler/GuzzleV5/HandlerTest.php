<?php
namespace Aws\Test\Handler\GuzzleV5;

use Aws\Handler\GuzzleV5\GuzzleHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Message\FutureResponse;
use GuzzleHttp\Message\Request as GuzzleRequest;
use GuzzleHttp\Message\Response as GuzzleResponse;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Promise\RejectionException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request as PsrRequest;
use GuzzleHttp\Psr7\Response as PsrResponse;
use GuzzleHttp\Ring\Client\MockHandler;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Tests\Ring\Client\MockHandlerTest;
use React\Promise\Deferred;

/**
 * @covers Aws\Handler\GuzzleV5\GuzzleHandler
 */
class HandlerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (!class_exists('GuzzleHttp\Ring\Core')) {
            $this->markTestSkipped();
        }
    }

    public function testHandlerWorksWithSuccessfulRequest()
    {
        $deferred = new Deferred();
        $handler = $this->getHandler($deferred);
        $request = new PsrRequest('PUT', 'http://example.com', [], '{}');
        $sink = Psr7\stream_for();

        $promise = $handler($request, ['delay' => 500, 'sink' => $sink]);
        $this->assertInstanceOf('GuzzleHttp\\Promise\\PromiseInterface', $promise);
        $deferred->resolve(new GuzzleResponse(200, [], Stream::factory('foo')));

        /** @var $response PsrResponse */
        $response = $promise->wait();
        $this->assertInstanceOf(PsrResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('foo', $response->getBody()->getContents());
        $this->assertEquals('foo', (string) $sink);
    }

    public function testHandlerWorksWithFailedRequest()
    {
        $deferred = new Deferred();
        $handler = $this->getHandler($deferred);
        $wasRejected = false;

        $promise = $handler(new PsrRequest('PUT', 'http://example.com'));
        $promise->then(null, function (array $error) use (&$wasRejected) {
            $wasRejected = true;
        });

        $deferred->reject(new ConnectException(
            'message',
            new GuzzleRequest('PUT', 'http://example.com'),
            new GuzzleResponse('500')
        ));

        try {
            $promise->wait();
            $this->fail('An exception should have been thrown.');
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertInstanceOf(ConnectException::class, $error['exception']);
            $this->assertTrue($error['connection_error']);
            $this->assertInstanceOf(PsrResponse::class, $error['response']);
            $this->assertEquals(500, $error['response']->getStatusCode());
        }

        $this->assertTrue($wasRejected, 'Reject callback was not triggered.');
    }

    public function testHandlerWorksWithEmptyBody()
    {
        $deferred = new Deferred();
        $handler = $this->getHandler($deferred);
        $promise = $handler(new PsrRequest('HEAD', 'http://example.com'));
        $deferred->resolve(new GuzzleResponse(200));
        $this->assertInstanceOf(PsrResponse::class, $promise->wait());
    }

    public function testHandlerWillInvokeOnTransferStatsCallback()
    {
        $client = new Client(['handler' => new MockHandler(['status' => 200])]);
        $handler = new GuzzleHandler($client);

        $request = new PsrRequest('PUT', 'http://example.com', [], '{}');
        $wasCalled = false;
        $options = [
            'http_stats_receiver' => function (array $stats) use (&$wasCalled) {
                $wasCalled = true;
            },
        ];
        $promise = $handler($request, $options);
        $promise->wait();
        $this->assertTrue($wasCalled);
    }

    private function getHandler(Deferred $deferred)
    {
        $client = $this->getMock('GuzzleHttp\Client', ['send']);
        $future = new FutureResponse($deferred->promise());
        $client->method('send')->willReturn($future);

        return function ($request, $options = []) use ($client) {
            /** @var $client \GuzzleHttp\Client */
            if (isset($options['sink'])) {
                $options['sink']->write('foo');
            }
            return call_user_func(new GuzzleHandler($client), $request, $options);
        };
    }
}
