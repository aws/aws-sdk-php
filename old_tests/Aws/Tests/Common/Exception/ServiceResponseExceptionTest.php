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

use Aws\Common\Exception\ServiceResponseException;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Message\Request;

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

    public function testAddsUserAgentIfAvailable()
    {
        $request = new Request('GET', 'http://www.foo.com', array('User-Agent' => 'Foo/Bar'));
        $response = new Response(200);
        $e = new ServiceResponseException('Foo!');
        $e->setExceptionCode('foo');
        $e->setExceptionType('client');
        $e->setRequestId('xyz');
        $e->setRequest($request);
        $e->setResponse($response);
        $this->assertEquals('Aws\Common\Exception\ServiceResponseException: AWS Error Code: foo, Status Code: 200, AWS Request ID: xyz, AWS Error Type: client, AWS Error Message: Foo!, User-Agent: Foo/Bar', (string) $e);
    }
}
