<?php
namespace Aws\Test\Handler;

use Aws\Handler\HttpHandlerError;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\NetworkException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ResponseException;
use GuzzleHttp\Exception\ResponseTransferException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\CoversClass;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(HttpHandlerError::class)]
class HttpHandlerErrorTest extends TestCase
{
    public function testDetectsConnectException()
    {
        $exception = new ConnectException(
            'test',
            new Request('GET', 'http://example.com')
        );

        $this->assertTrue(HttpHandlerError::isConnectionError($exception));
    }

    public function testDetectsNetworkException()
    {
        if (!class_exists(NetworkException::class)) {
            $this->markTestSkipped('NetworkException is only available in Guzzle 8.');
        }

        $exception = new NetworkException(
            'test',
            new Request('GET', 'http://example.com')
        );

        $this->assertTrue(HttpHandlerError::isConnectionError($exception));
    }

    public function testDetectsGuzzle7CurlRecvErrorFromRequestException()
    {
        $exception = new class ('test', new Request('GET', 'http://example.com')) extends RequestException {
            public function getHandlerContext(): array
            {
                return ['errno' => 56];
            }
        };

        $this->assertTrue(HttpHandlerError::isConnectionError($exception));
    }

    public function testIgnoresGuzzle7NonRecvCurlErrorFromRequestException()
    {
        $exception = new class ('test', new Request('GET', 'http://example.com')) extends RequestException {
            public function getHandlerContext(): array
            {
                return ['errno' => 23];
            }
        };

        $this->assertFalse(HttpHandlerError::isConnectionError($exception));
    }

    public function testDetectsResponseTransferExceptionAndResponse()
    {
        if (!class_exists(ResponseTransferException::class)) {
            $this->markTestSkipped('ResponseTransferException is only available in Guzzle 8.');
        }

        $response = new Response(200);
        $exception = new ResponseTransferException(
            'test',
            new Request('GET', 'http://example.com'),
            $response
        );

        $this->assertTrue(HttpHandlerError::isConnectionError($exception));
        $this->assertSame($response, HttpHandlerError::getResponse($exception));
    }

    public function testGenericResponseExceptionIsNotConnectionError()
    {
        if (!class_exists(ResponseException::class)) {
            $this->markTestSkipped('ResponseException is only available in Guzzle 8.');
        }

        $response = new Response(500);
        $exception = new ResponseException(
            'test',
            new Request('GET', 'http://example.com'),
            $response
        );

        $this->assertFalse(HttpHandlerError::isConnectionError($exception));
        $this->assertSame($response, HttpHandlerError::getResponse($exception));
    }
}
