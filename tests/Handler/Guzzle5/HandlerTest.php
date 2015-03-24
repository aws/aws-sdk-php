<?php
namespace GuzzleHttp\Aws\Test;

use Aws\Handler\GuzzleV5\GuzzleHandler;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Message\FutureResponse;
use GuzzleHttp\Message\Request as GuzzleRequest;
use GuzzleHttp\Message\Response as GuzzleResponse;
use GuzzleHttp\Psr7\Request as PsrRequest;
use GuzzleHttp\Stream\Stream;
use React\Promise\Deferred;

/**
 * @covers GuzzleHttp\Aws\GuzzleHandler
 */
class HandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testHandlerWorksWithSuccessfulRequest()
    {
        $deferred = new Deferred();
        $handler = $this->getHandler($deferred);
        $request = new PsrRequest('PUT', 'http://example.com');

        $promise = $handler($request, ['delay' => 500]);
        $this->assertInstanceOf('GuzzleHttp\\Promise\\PromiseInterface', $promise);
        $deferred->resolve(new GuzzleResponse(200, [], Stream::factory('foo')));

        $promise->then(function (GuzzleResponse $response) {
            $this->assertInstanceOf('GuzzleHttp\\Psr7\\Response', $response);
            $this->assertEquals(204, $response->getStatusCode());
        }, function () {
            $this->fail('The promise was rejected erroneously.');
        });
    }

    public function testHandlerWorksWithFailedRequest()
    {
        $deferred = new Deferred();
        $handler = $this->getHandler($deferred);

        $wasRejected = false;
        $promise = $handler(new PsrRequest('PUT', 'http://example.com'));
        $promise->then(
            function () {
                $this->fail('The promise was resolved erroneously.');
            },
            function (array $error) use (&$wasRejected) {
                $this->assertInstanceOf('GuzzleHttp\Exception\ConnectException', $error['exception']);
                $this->assertTrue($error['connection_error']);
                $this->assertInstanceOf('GuzzleHttp\Psr7\Response', $error['response']);
                $wasRejected = true;
            }
        );

        $deferred->reject(new ConnectException(
            'message',
            new GuzzleRequest('PUT', 'http://example.com'),
            new GuzzleResponse('500')
        ));

        $this->assertTrue($wasRejected, 'It looks like the reject callback was not triggered. :-(');
    }

    private function getHandler(Deferred $deferred)
    {
        $client = $this->getMock('GuzzleHttp\Client', ['send']);
        $future = new FutureResponse($deferred->promise());
        $client->method('send')->willReturn($future);

        return new GuzzleHandler($client);
    }
}
