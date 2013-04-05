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

namespace Aws\Tests\S3;

use Aws\S3\S3Client;
use Aws\S3\StreamWrapper;
use Guzzle\Http\Message\Response;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\S3\StreamWrapper
 */
class StreamWrapperTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var S3Client
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('s3');
        StreamWrapper::register($this->client);
    }

    public function tearDown()
    {
        stream_wrapper_unregister('s3');
    }

    public function testRegistersStreamWrapper()
    {
        StreamWrapper::register($this->client);
        $this->assertContains('s3', stream_get_wrappers());
        // Ensure no error is thrown for registering twice
        StreamWrapper::register($this->client);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Cannot open a bucket
     */
    public function testCannotOpenBuckets()
    {
        fopen('s3://bucket', 'r');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage simultaneous reading and writing
     */
    public function testCannotReadWriteStreams()
    {
        fopen('s3://bucket/key', 'r+');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Mode not supported
     */
    public function testSupportsOnlyReadWriteXA()
    {
        fopen('s3://bucket/key', 'c');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage does not exist on Amazon S3
     */
    public function testValidatesXfileExists()
    {
        $this->setMockResponse($this->client, array(new Response(404)));
        fopen('s3://bucket/key', 'x');
    }

    /**
     * @expectedException RuntimeException
     * @expectedExceptionMessage simultaneous reading and writing
     */
    public function testCanThrowExceptionsInsteadOfErrors()
    {
        fopen('s3://bucket/key', 'r+', false, stream_context_create(array(
            's3' => array('throw_exceptions' => true)
        )));
    }

    public function testOpensNonSeekableReadStream()
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, 'testing 123');
        fseek($stream, 0);

        $mock = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->setConstructorArgs(array($stream))
            ->setMethods(array('seek'))
            ->getMock();

        $mock->expects($this->any())
            ->method('seek')
            ->will($this->returnValue(false));

        $f = $this->getMockBuilder('Guzzle\Stream\PhpStreamRequestFactory')
            ->setMethods(array('createStream'))
            ->getMock();
        $f->expects($this->once())
            ->method('createStream')
            ->will($this->returnValue($mock));

        $s = fopen('s3://bucket/ket', 'r', false, stream_context_create(array(
            's3' => array('stream_factory' => $f)
        )));

        $this->assertEquals(0, ftell($s));
        $this->assertFalse(feof($s));
        $this->assertEquals('test', fread($s, 4));
        $this->assertEquals(4, ftell($s));
        $this->assertEquals(-1, fseek($s, 0));
        $this->assertEquals('', stream_get_contents($s));
        $this->assertTrue(feof($s));
        $this->assertTrue(fclose($s));
    }

    public function testOpensSeekableReadStream()
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, 'testing 123');
        fseek($stream, 0);

        $mock = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->setConstructorArgs(array($stream))
            ->setMethods(array('seek'))
            ->getMock();

        $mock->expects($this->any())
            ->method('seek')
            ->will($this->returnValue(false));

        $f = $this->getMockBuilder('Guzzle\Stream\PhpStreamRequestFactory')
            ->setMethods(array('createStream'))
            ->getMock();
        $f->expects($this->once())
            ->method('createStream')
            ->will($this->returnValue($mock));

        $s = fopen('s3://bucket/ket;seekable', 'r', false, stream_context_create(array(
            's3' => array('stream_factory' => $f)
        )));

        $this->assertEquals(0, ftell($s));
        $this->assertFalse(feof($s));
        $this->assertEquals('test', fread($s, 4));
        $this->assertEquals(4, ftell($s));
        $this->assertEquals(0, fseek($s, 0));
        $this->assertEquals('testing 123', stream_get_contents($s));
        $this->assertTrue(feof($s));
        $this->assertTrue(fclose($s));
    }

    public function testCanOpenWriteOnlyStreams()
    {
        $this->setMockResponse($this->client, array(new Response(204)));

        $s = fopen('s3://bucket/key', 'w');
        $this->assertEquals(4, fwrite($s, 'test'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $requests = $this->getMockedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('test', (string) $requests[0]->getBody());
        $this->assertEquals(4, (string) $requests[0]->getHeader('Content-Length'));
    }

    public function testCanOpenAppendStreamsWithOriginalFile()
    {
        // Queue the 200 response that will load the original, and queue the 204 flush response
        $this->setMockResponse($this->client, array(
            new Response(200, null, 'test'),
            new Response(204)
        ));

        $s = fopen('s3://bucket/key', 'a');
        $this->assertEquals(4, ftell($s));
        $this->assertEquals(3, fwrite($s, 'ing'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $requests = $this->getMockedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('GET', $requests[0]->getMethod());
        $this->assertEquals('/key', $requests[0]->getResource());
        $this->assertEquals('PUT', $requests[1]->getMethod());
        $this->assertEquals('/key', $requests[1]->getResource());
        $this->assertEquals('testing', (string) $requests[1]->getBody());
        $this->assertEquals(7, (string) $requests[1]->getHeader('Content-Length'));
    }
}
