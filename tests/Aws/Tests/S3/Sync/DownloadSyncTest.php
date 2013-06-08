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

namespace Aws\Tests\S3\Sync;

use Aws\S3\Sync\DownloadSync;

/**
 * @covers Aws\S3\Sync\DownloadSync
 * @covers Aws\S3\Sync\AbstractSync
 */
class DownloadSyncTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getSplFile($filename)
    {
        $file = $this->getMockBuilder('SplFileInfo')
            ->setMethods(array('getPathName'))
            ->disableOriginalConstructor()
            ->getMock();
        $file->expects($this->once())
            ->method('getPathName')
            ->will($this->returnValue($filename));

        return $file;
    }

    public function testCreatesSimpleCommand()
    {
        $converter = $this->getMockBuilder('Aws\S3\Sync\KeyConverter')
            ->setMethods(array('convert'))
            ->getMock();

        $converter->expects($this->once())
            ->method('convert')
            ->with('s3://foo/baz')
            ->will($this->returnValue('/foo/bar'));

        $sync = $this->getMockBuilder('Aws\S3\Sync\DownloadSync')
            ->setConstructorArgs(array(
                array(
                    'client' => $this->getServiceBuilder()->get('s3'),
                    'bucket' => 'foo',
                    'iterator' => null,
                    'source_converter' => $converter
                )
            ))
            ->setMethods(array('createDirectory'))
            ->getMock();

        $sync->expects($this->once())
            ->method('createDirectory')
            ->with('/foo/bar');

        $ref = new \ReflectionMethod($sync, 'createTransferAction');
        $ref->setAccessible(true);
        $command = $ref->invoke($sync, $this->getSplFile('s3://foo/baz'));
        $this->assertEquals('foo', $command['Bucket']);
        $this->assertEquals('baz', $command['Key']);
        $this->assertEquals('/foo/bar', $command['SaveAs']);
    }

    public function testCreatesResumableWhenFileExists()
    {
        $converter = $this->getMockBuilder('Aws\S3\Sync\KeyConverter')
            ->setMethods(array('convert'))
            ->getMock();

        $converter->expects($this->once())
            ->method('convert')
            ->with('s3://foo/baz')
            ->will($this->returnValue(__FILE__));

        $sync = $this->getMockBuilder('Aws\S3\Sync\DownloadSync')
            ->setConstructorArgs(array(
                array(
                    'client' => $this->getServiceBuilder()->get('s3'),
                    'bucket' => 'foo',
                    'iterator' => null,
                    'source_converter' => $converter,
                    'resumable' => true
                )
            ))
            ->setMethods(array('createDirectory'))
            ->getMock();

        $sync->expects($this->once())
            ->method('createDirectory')
            ->with(__FILE__);

        $ref = new \ReflectionMethod($sync, 'createTransferAction');
        $ref->setAccessible(true);
        $result = $ref->invoke($sync, $this->getSplFile('s3://foo/baz'));
        $this->assertInstanceOf('Aws\S3\ResumableDownload', $result);


    }
}
