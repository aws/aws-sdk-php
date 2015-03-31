<?php
namespace Aws\Test\Handler\GuzzleV5;

use Aws\Handler\GuzzleV5\GuzzleHandler;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Message\FutureResponse;
use GuzzleHttp\Message\Request as GuzzleRequest;
use GuzzleHttp\Message\Response as GuzzleResponse;
use GuzzleHttp\Promise\RejectionException;
use GuzzleHttp\Psr7\Request as PsrRequest;
use GuzzleHttp\Psr7\Response as PsrResponse;
use GuzzleHttp\Stream\Stream;
use React\Promise\Deferred;

/**
 * @covers Aws\Handler\GuzzleV5\GuzzleHandler
 */
class HandlerTest extends \PHPUnit_Framework_TestCase
{
    public function setup()
    {
        if (class_exists('GuzzleHttp\Promise\Promise')) {
            $this->markTestSkipped();
        }
    }

    public function testHandlerWorksWithSuccessfulRequest()
    {
        $deferred = new Deferred();
        $handler = $this->getHandler($deferred);
        $request = new PsrRequest('PUT', 'http://example.com', [], '{}');

        $promise = $handler($request, ['delay' => 500]);
        $this->assertInstanceOf('GuzzleHttp\\Promise\\PromiseInterface', $promise);
        $deferred->resolve(new GuzzleResponse(200, [], Stream::factory('foo')));

        /** @var $response PsrResponse */
        $response = $promise->wait();
        $this->assertInstanceOf(PsrResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(200, $response->getStatusCode());
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

    private function getHandler(Deferred $deferred)
    {
        $client = $this->getMock('GuzzleHttp\Client', ['send']);
        $future = new FutureResponse($deferred->promise());
        $client->method('send')->willReturn($future);

        /** @var $client \GuzzleHttp\Client */
        return new GuzzleHandler($client);
    }
}
