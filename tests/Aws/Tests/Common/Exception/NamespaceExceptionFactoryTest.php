<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\Common\Exception;

use Aws\Common\Exception\NamespaceExceptionFactory;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Exception\NamespaceExceptionFactory
 */
class NamespaceExceptionFactoryTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testThrowsDefaultExceptionWhenMatchIsNotFound()
    {
        $request = new Request('POST', 'http://example.com');
        $response = new Response(200);
        $factory = new NamespaceExceptionFactory(new JsonQueryExceptionParser(), __NAMESPACE__);
        $this->assertInstanceOf(
            'Aws\Common\Exception\ServiceResponseException',
            $factory->fromResponse($request, $response)
        );
    }

    public function testThrowsNamespacedExceptionsThatAreNotServiceExceptions()
    {
        $request = new Request('POST', 'http://example.com');
        $response = new Response(200, array(), '{ "__type": "runtimeException", "code": "foo", "message": "bar" }');
        $factory = new NamespaceExceptionFactory(new JsonQueryExceptionParser(), 'Aws\Common\Exception');
        $this->assertInstanceOf('Aws\Common\Exception\RuntimeException', $factory->fromResponse($request, $response));
    }

    public function testThrowsNamespacedServiceResponseExceptions()
    {
        $request = new Request('POST', 'http://example.com');
        $response = new Response(400, array(), '{ "__type": "abc#ServiceResponse", "message": "bar" }');
        $factory = new NamespaceExceptionFactory(new JsonQueryExceptionParser(), 'Aws\Common\Exception');
        $exception = $factory->fromResponse($request, $response);
        $this->assertInstanceOf('Aws\Common\Exception\ServiceResponseException', $exception);
        $this->assertEquals('ServiceResponse', $exception->getExceptionCode());
        $this->assertEquals('client', $exception->getExceptionType());
    }
}
