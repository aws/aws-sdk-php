<?php

namespace Aws\Tests\Common\Exception;

use Aws\Common\Exception\NamespaceExceptionFactory;
use Aws\Common\Exception\Parser\DefaultJsonExceptionParser;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Exception\NamespaceExceptionFactory
 */
class NamespaceExceptionFactoryTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testThrowsDefaultExceptionWhenMatchIsNotFound()
    {
        $response = new Response(200);
        $factory = new NamespaceExceptionFactory(new DefaultJsonExceptionParser(), __NAMESPACE__);
        $this->assertInstanceOf('Aws\Common\Exception\ServiceResponseException', $factory->fromResponse($response));
    }

    public function testThrowsNamespacedExceptionsThatAreNotServiceExceptions()
    {
        $response = new Response(200, array(), '{ "__type": "runtimeException", "code": "foo", "message": "bar" }');
        $factory = new NamespaceExceptionFactory(new DefaultJsonExceptionParser(), 'Aws\Common\Exception');
        $this->assertInstanceOf('Aws\Common\Exception\RuntimeException', $factory->fromResponse($response));
    }

    public function testThrowsNamespacedServiceResponseExceptions()
    {
        $response = new Response(400, array(), '{ "__type": "abc#ServiceResponse", "message": "bar" }');
        $factory = new NamespaceExceptionFactory(new DefaultJsonExceptionParser(), 'Aws\Common\Exception');
        $exception = $factory->fromResponse($response);
        $this->assertInstanceOf('Aws\Common\Exception\ServiceResponseException', $exception);
        $this->assertEquals('ServiceResponse', $exception->getExceptionCode());
        $this->assertEquals('client', $exception->getExceptionType());
    }
}
