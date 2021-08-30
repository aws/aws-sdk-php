<?php
namespace Aws\Test\Handler\GuzzleV5;

use Aws\Handler\GuzzleV5\GuzzleHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\FutureResponse;
use GuzzleHttp\Message\Request as GuzzleRequest;
use GuzzleHttp\Message\Response as GuzzleResponse;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Promise\RejectionException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Stream as PsrStream;
use GuzzleHttp\Psr7\Request as PsrRequest;
use GuzzleHttp\Psr7\Response as PsrResponse;
use GuzzleHttp\Ring\Client\MockHandler;
use GuzzleHttp\Stream\Stream;
use React\Promise\Deferred;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Handler\GuzzleV5\GuzzleHandler
 */
class HandlerTest extends TestCase
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
        $sink = Psr7\Utils::streamFor();

        $promise = $handler($request, ['delay' => 500, 'sink' => $sink]);
        $this->assertInstanceOf('GuzzleHttp\\Promise\\PromiseInterface', $promise);
        $deferred->resolve(new GuzzleResponse(200, [], Stream::factory('foo')));

        /** @var $response PsrResponse */
        $response = $promise->wait();
        $this->assertInstanceOf(PsrResponse::class, $response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('foo', $response->getBody()->getContents());
        $this->assertSame('foo', (string) $sink);
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
            $this->assertSame(500, $error['response']->getStatusCode());
        }

        $this->assertTrue($wasRejected, 'Reject callback was not triggered.');
    }

    private function getErrorXml()
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<Error>
  <Code>NoSuchKey</Code>
  <Message>The specified key does not exist.</Message>
  <Key>test.png</Key>
  <RequestId>656c76696e6727732072657175657374</RequestId>
  <HostId>Uuag1LuByRx9e6j5Onimru9pO4ZVKnJ2Qz7/C1NPcfTWAtRPfTaOFg==</HostId>
</Error>
EOXML;
    }

    public function testHandlerWorksWithFailedRequestFileSink()
    {
        $xml = $this->getErrorXml();
        $sink = sys_get_temp_dir() . '/test_error_sink.txt';
        $deferred = new Deferred();
        $handler = $this->getHandler($deferred, $xml);
        $wasRejected = false;

        $promise = $handler(
            new PsrRequest('GET', 'http://example.com'),
            ['delay' => 500, 'sink' => $sink]
        );
        $promise->then(null, function (array $error) use (&$wasRejected) {
            $wasRejected = true;
        });

        $deferred->reject(new RequestException(
            'message',
            new GuzzleRequest('GET', 'http://example.com'),
            new GuzzleResponse('404')
        ));

        try {
            $promise->wait();
            unlink($sink);
            $this->fail('An exception should have been thrown.');
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertInstanceOf(RequestException::class, $error['exception']);
            $this->assertFalse($error['connection_error']);
            $this->assertInstanceOf(PsrResponse::class, $error['response']);
            $this->assertSame(404, $error['response']->getStatusCode());
            $this->assertEquals($xml, $error['response']->getBody());
            $this->assertStringEqualsFile($sink, $xml);
            unlink($sink);
        }

        $this->assertTrue($wasRejected, 'Reject callback was not triggered.');
    }

    public function testHandlerWorksWithFailedRequestStreamSink()
    {
        $xml = $this->getErrorXml();
        $sink = Psr7\Utils::streamFor();
        $deferred = new Deferred();
        $handler = $this->getHandler($deferred, $xml);
        $wasRejected = false;

        $promise = $handler(
            new PsrRequest('GET', 'http://example.com'),
            ['delay' => 500, 'sink' => $sink]
        );
        $promise->then(null, function (array $error) use (&$wasRejected) {
            $wasRejected = true;
        });

        $deferred->reject(new RequestException(
            'message',
            new GuzzleRequest('GET', 'http://example.com'),
            new GuzzleResponse('404', [], Stream::factory($xml))
        ));

        try {
            $promise->wait();
            $this->fail('An exception should have been thrown.');
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertInstanceOf(RequestException::class, $error['exception']);
            $this->assertFalse($error['connection_error']);
            $this->assertInstanceOf(PsrResponse::class, $error['response']);
            $this->assertSame(404, $error['response']->getStatusCode());
            $this->assertEquals($xml, (string)$error['response']->getBody());
            $this->assertEquals($xml, (string)$sink);
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

    private function getHandler(Deferred $deferred, $output = 'foo')
    {
        $client = $this->getMockBuilder('GuzzleHttp\Client')->setMethods(['send'])->getMock();
        $future = new FutureResponse($deferred->promise());
        $client->method('send')->willReturn($future);

        return function ($request, $options = []) use ($client, $output) {
            /** @var $client \GuzzleHttp\Client */
            if (isset($options['sink'])) {
                if ($options['sink'] instanceof PsrStream) {
                    $options['sink']->write($output);
                } else {
                    file_put_contents($options['sink'], $output);
                }
            }
            return call_user_func(new GuzzleHandler($client), $request, $options);
        };
    }
}
