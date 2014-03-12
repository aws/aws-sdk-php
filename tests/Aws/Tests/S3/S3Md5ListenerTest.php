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

use Aws\S3\S3Md5Listener;
use Aws\S3\S3Signature;
use Aws\S3\S3SignatureV4;
use Guzzle\Common\Event;

/**
 * @covers Aws\S3\S3Md5Listener
 */
class S3Md5ListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @param bool   $contentMd5Data Set to true to set the contentMd5 data
     *                               value to true.
     * @param int    $md5Param       Set to 1 to mark the ContentMD5 param as
     *                               true, 2 to mark it as null, and 3 to mark
     *                               it as false.
     * @param bool   $useBody        Set to true to add a body to the request.
     * @param string $md5            Set to a string that the MD5 will be
     *                               calculated as.
     * @param int    $bodySize       What size to return for the body
     *
     * @return array
     */
    private function getCommand(
        $contentMd5Data,
        $md5Param,
        $useBody,
        $md5,
        $bodySize = 1
    ) {
        $operation = $this->getMockBuilder('Guzzle\Service\Description\Operation')
            ->disableOriginalConstructor()
            ->setMethods(array('getData', 'hasParam'))
            ->getMockForAbstractClass();

        $operation->expects($this->once())
            ->method('getData')
            ->with('contentMd5')
            ->will($this->returnValue($contentMd5Data));

        if (!$contentMd5Data) {
            $operation->expects($this->once())
                ->method('hasParam')
                ->with('ContentMD5')
                ->will($this->returnValue(true));
        }

        $request = $this->getMockBuilder('Guzzle\Http\Message\EntityEnclosingRequest')
            ->setConstructorArgs(array('PUT', 'http://foo.com'))
            ->setMethods(array('getBody'))
            ->getMock();

        $body = null;
        if ($useBody) {
            $stream = fopen('php://temp', 'r+');
            fwrite($stream, 'f');
            rewind($stream);
            $body = $this->getMockBuilder('Guzzle\Http\EntityBody')
                ->setConstructorArgs(array($stream, $bodySize))
                ->setMethods(array('getContentMd5'))
                ->getMock();
            $body->expects($this->any())
                ->method('getContentMd5')
                ->with(true, true)
                ->will($this->returnValue($md5));
        }

        $request->expects($this->any())
            ->method('getBody')
            ->will($this->returnValue($body));

        $data = array();
        if ($md5Param) {
            if ($md5Param === 1) {
                $data = array('ContentMD5' => true);
            } elseif ($md5Param === 2) {
                $data = array('ContentMD5' => null);
            } elseif ($md5Param === 3) {
                $data = array('ContentMD5' => false);
            } else {
                $this->fail('Invalid md5Param value');
            }
        }

        $command = $this->getMockBuilder('Guzzle\Service\Command\AbstractCommand')
            ->setConstructorArgs(array($data, $operation))
            ->setMethods(array('getRequest'))
            ->getMockForAbstractClass();

        $command->expects($this->any())
            ->method('getRequest')
            ->will($this->returnValue($request));

        return array($command, $request);
    }

    public function testAddsMd5WhenDataAttributeIsPresent()
    {
        list($command, $request) = $this->getCommand(true, false, true, 'abcd');
        $event = new Event(array('command' => $command));
        $signature = new S3SignatureV4();
        $listener = new S3Md5Listener($signature);
        $listener->onCommandAfterPrepare($event);
        $this->assertEquals('abcd', $request->getHeader('Content-MD5'));
    }

    public function testDoesNotAddWhenMd5CannotBeAdded()
    {
        list($command, $request) = $this->getCommand(true, false, true, false);
        $event = new Event(array('command' => $command));
        $signature = new S3SignatureV4();
        $listener = new S3Md5Listener($signature);
        $listener->onCommandAfterPrepare($event);
        $this->assertNull($request->getHeader('Content-MD5'));
    }

    public function testAddsContentMd5WhenSetToTrue()
    {
        list($command, $request) = $this->getCommand(false, 1, true, 'abcd');
        $event = new Event(array('command' => $command));
        $signature = new S3SignatureV4();
        $listener = new S3Md5Listener($signature);
        $listener->onCommandAfterPrepare($event);
        $this->assertEquals('abcd', $request->getHeader('Content-MD5'));
    }

    public function testDoesNotAddContentMd5WhenSetToNullAndSigV4()
    {
        list($command, $request) = $this->getCommand(false, 2, true, 'abcd');
        $event = new Event(array('command' => $command));
        $signature = new S3SignatureV4();
        $listener = new S3Md5Listener($signature);
        $listener->onCommandAfterPrepare($event);
        $this->assertNull($request->getHeader('Content-MD5'));
    }

    public function testAddsContentMd5WhenSetToNull()
    {
        list($command, $request) = $this->getCommand(false, 2, true, 'abcd');
        $event = new Event(array('command' => $command));
        $signature = new S3Signature();
        $listener = new S3Md5Listener($signature);
        $listener->onCommandAfterPrepare($event);
        $this->assertEquals('abcd', $request->getHeader('Content-MD5'));
    }

    public function testDoesNotAddContentMd5WhenSetToFalse()
    {
        list($command, $request) = $this->getCommand(false, 3, false, 'abcd');
        $event = new Event(array('command' => $command));
        $signature = new S3Signature();
        $listener = new S3Md5Listener($signature);
        $listener->onCommandAfterPrepare($event);
        $this->assertNull($request->getHeader('Content-MD5'));
    }

    public function testDoesNotAddContentMd5WhenNoBodyIsSet()
    {
        list($command, $request) = $this->getCommand(false, 1, false, 'abcd');
        $event = new Event(array('command' => $command));
        $signature = new S3Signature();
        $listener = new S3Md5Listener($signature);
        $listener->onCommandAfterPrepare($event);
        $this->assertNull($request->getHeader('Content-MD5'));
    }

    public function testDoesNotAddContentMd5WhenBodyIsZeroLength()
    {
        list($command, $request) = $this->getCommand(false, 1, true, null, 0);
        $event = new Event(array('command' => $command));
        $signature = new S3Signature();
        $listener = new S3Md5Listener($signature);
        $listener->onCommandAfterPrepare($event);
        $this->assertNull($request->getHeader('Content-MD5'));
    }
}
