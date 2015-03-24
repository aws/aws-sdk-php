<?php
namespace Aws\Test\Integ;

use Aws\Handler\GuzzleV5\GuzzleHandler;
use GuzzleHttp\Promise\RejectionException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class GuzzleV5HandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testSendRequest()
    {
        $handler = new GuzzleHandler();
        $request = new Request(
            'PUT',
            "http://httpbin.org/put?a=1&b=2",
            ['c' => '3', 'd' => '4', 'user-agent' => 'AWS/3'],
            Psr7\stream_for('{"f":6,"g":7}')
        );

        /** @var \GuzzleHttp\Promise\Promise $responsePromise */
        $responsePromise = $handler($request);
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
        $data = json_decode($response->getBody()->getContents(), true);

        // Check request data.
        $this->assertArrayHasKey('C', $data['headers']);
        $this->assertArrayHasKey('D', $data['headers']);
        $this->assertStringStartsWith('AWS/3 Guzzle/5', $data['headers']['User-Agent']);
        $this->assertArrayHasKey('a', $data['args']);
        $this->assertArrayHasKey('b', $data['args']);
        $this->assertArrayHasKey('f', $data['json']);
        $this->assertArrayHasKey('g', $data['json']);

        // Check response data.
        $this->assertTrue($response->hasHeader('E'));
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
