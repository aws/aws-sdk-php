<?php
namespace Aws\Test\Integ;

use Aws\Handler\GuzzleV5\GuzzleHandler;
use GuzzleHttp\Promise\RejectionException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GuzzleV5HandlerTest extends TestCase
{
    public function setUp()
    {
        if (!class_exists('GuzzleHttp\Ring\Core')) {
            $this->markTestSkipped();
        }
    }

    public function testSendRequest()
    {
        $handler = new GuzzleHandler();
        $request = new Request(
            'PUT',
            "http://httpbin.org/put?a=1&b=2",
            ['c' => '3', 'd' => '4'],
            Psr7\stream_for('{"f":6,"g":7}')
        );
        $sink = Psr7\stream_for();

        /** @var \GuzzleHttp\Promise\Promise $responsePromise */
        $responsePromise = $handler($request, ['sink' => $sink, 'foo' => 'bar']);
        $responsePromise = $responsePromise->then(
            function (Response $resp) {
                return $resp->withHeader('e', '5');
            },
            function (array $error) {
                $this->fail('The request failed.');
            }
        );

        /** @var Response $response */
        $response = $responsePromise->wait();
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);

        // Check response data.
        $this->assertArrayHasKey('C', $data['headers']);
        $this->assertArrayHasKey('D', $data['headers']);
        $this->assertArrayHasKey('a', $data['args']);
        $this->assertArrayHasKey('b', $data['args']);
        $this->assertArrayHasKey('f', $data['json']);
        $this->assertArrayHasKey('g', $data['json']);

        // Check response data.
        $this->assertTrue($response->hasHeader('E'));

        // Check the sink.
        $sink->seek(0);
        $this->assertEquals($body, $sink->getContents());
    }

    public function testProduceErrorData()
    {
        $handler = new GuzzleHandler();
        $request = new Request('GET', 'http://httpbin.org/delay/3');

        try {
            $handler($request, ['timeout' => 1])->wait();
        } catch (RejectionException $e) {
            $error = $e->getReason();
            $this->assertInstanceOf(
                'GuzzleHttp\Exception\ConnectException',
                $error['exception']
            );
            $this->assertTrue($error['connection_error']);
            $this->assertArrayHasKey('response', $error);
            return;
        }

        $this->fail('A RejectionException should have been thrown.');
    }
}
