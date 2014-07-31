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
use Aws\S3\Sync\KeyConverter;

/**
 * @covers Aws\S3\Sync\DownloadSync
 * @covers Aws\S3\Sync\AbstractSync
 */
class DownloadSyncTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function setUp()
    {
        if (!\can_mock_internal_classes()) {
            $this->markTestSkipped('Cannot mock internal classes');
        }
    }

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

    public function keyConverterProvider()
    {
        return array(
            // base dir           prefix  given key         result
            array('C:/foo/bar',   '',     's3://foo/baz',   's3://foo/baz'),
            array('C:\\foo\\bar', '',     's3://foo/baz',   's3://foo/baz'),
            array('/foo/bar',     '',     's3://foo/baz',   's3://foo/baz'),
            array('',             '',     's3://foo/baz',   's3://foo/baz'),
            array('',             '',     's3://foo//baz',  's3://foo/baz'),
            array('',             'foo/', '../../tmp/test', 'foo/../../tmp/test'),
            array('../',          'foo/', '../../tmp/test', 'foo/../tmp/test'),
            array('',             'a',    '//foo/baz',       'a/foo/baz'),
        );
    }

    /**
     * @dataProvider keyConverterProvider
     */
    public function testDoesNotAddLeadingSlash($base, $prefix, $path, $result)
    {
        $converter = new KeyConverter($base, $prefix);
        $sync = $this->getMockBuilder('Aws\S3\Sync\DownloadSync')
            ->setConstructorArgs(array(
                array(
                    'client' => $this->getServiceBuilder()->get('s3', true),
                    'bucket' => 'foo',
                    'iterator' => null,
                    'source_converter' => $converter
                )
            ))
            ->setMethods(array('createDirectory'))
            ->getMock();

        $sync->expects($this->any())
            ->method('createDirectory')
            ->will($this->returnCallback(function() {
                throw new \Exception(func_get_arg(0));
            }));

        $ref = new \ReflectionMethod($sync, 'createTransferAction');
        $ref->setAccessible(true);

        try {
            $ref->invoke($sync, $this->getSplFile($path));
            $this->fail('Did not throw');
        } catch (\Exception $e) {
            $this->assertEquals($result, $e->getMessage());
        }
    }

    public function testCreatesResumableDownloadWhenFileExists()
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

    public function testDoesNotTransferFilesInBatchWithSameNameAsDir()
    {
        $client = $this->getServiceBuilder()->get('s3', true);

        $actualCommands = array(
            $client->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'bar', 'SaveAs' => '/tmp/test')),
            $client->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'bar', 'SaveAs' => '/tmp/foo')),
            $client->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'bar', 'SaveAs' => '/tmp/foo/bar.jpg')),
            $client->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'bar', 'SaveAs' => '/tmp/foo/baz/bam')),
            $client->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'bar', 'SaveAs' => '/tmp/foo/baz/bam/a'))
        );

        $sync = $this->getMockBuilder('Aws\S3\Sync\DownloadSync')
            ->disableOriginalConstructor()
            ->getMock();

        $ref = new \ReflectionMethod($sync, 'filterCommands');
        $ref->setAccessible(true);
        $result = array_values(array_map(function ($command) {
            return $command['SaveAs'];
        }, $ref->invoke($sync, $actualCommands)));
        $this->assertEquals(array(
            '/tmp/test',
            '/tmp/foo/bar.jpg',
            '/tmp/foo/baz/bam/a'
        ), $result);
    }
}
