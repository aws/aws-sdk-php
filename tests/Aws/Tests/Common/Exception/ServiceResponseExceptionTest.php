<?php

namespace Aws\Tests\Common\Exception;

use Aws\Common\Exception\ServiceResponseException;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Exception\ServiceResponseException
 */
class ServiceResponseExceptionTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testRepresentsException()
    {
        $e = new ServiceResponseException('Foo!');
        $e->setExceptionCode('foo');
        $this->assertEquals('foo', $e->getExceptionCode());
        $e->setExceptionType('client');
        $this->assertEquals('client', $e->getExceptionType());
        $e->setRequestId('xyz');
        $this->assertEquals('xyz', $e->getRequestId());

        $response = new Response(200);
        $e->setResponse($response);
        $this->assertSame($response, $e->getResponse());

        $this->assertEquals('Aws\Common\Exception\ServiceResponseException: AWS Error Code: foo, Status Code: 200, AWS Request ID: xyz, AWS Error Type: client, AWS Error Message: Foo!', (string) $e);
    }
}
