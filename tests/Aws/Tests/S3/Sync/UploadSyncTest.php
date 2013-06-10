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

use Aws\S3\Sync\KeyConverter;
use Aws\S3\Sync\UploadSync;

/**
 * @covers Aws\S3\Sync\UploadSync
 * @covers Aws\S3\Sync\AbstractSync
 */
class UploadSyncTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage failed to open stream
     */
    public function testEnsuresFileExists()
    {
        $sync = $this->getMockBuilder('Aws\S3\Sync\UploadSync')
            ->setConstructorArgs(array(
                array(
                    'client' => $this->getServiceBuilder()->get('s3'),
                    'bucket' => 'foo',
                    'iterator' => null,
                    'source_converter' => new KeyConverter()
                )
            ))
            ->getMock();
        $ref = new \ReflectionMethod($sync, 'createTransferAction');
        $ref->setAccessible(true);
        $ref->invoke($sync, $this->getSplFile('/path/to/does/not/exist'));
    }

    public function testCreatesSimpleCommand()
    {
        $result = $this->getAction(1000, $this->getServiceBuilder()->get('s3', true));
        $this->assertEquals('foo', $result['Bucket']);
        $this->assertNotNull($result['Key']);
        $this->assertEquals('test', (string) $result['Body']);
    }

    public function testCreatesMultipartUpload()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, 's3/initiate_multipart_upload');
        $result = $this->getAction(2, $client);
        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\AbstractTransfer', $result);
    }

    protected function getSplFile($filename, $size = 4)
    {
        $file = $this->getMockBuilder('SplFileInfo')
            ->setMethods(array('getPathName', 'getSize'))
            ->disableOriginalConstructor()
            ->getMock();
        $file->expects($this->once())
            ->method('getPathName')
            ->will($this->returnValue($filename));
        $file->expects($this->any())
            ->method('getSize')
            ->will($this->returnValue($size));

        return $file;
    }

    protected function getAction($size, $client)
    {
        $sync = $this->getMockBuilder('Aws\S3\Sync\UploadSync')
            ->setConstructorArgs(array(
                array(
                    'client' => $client,
                    'bucket' => 'foo',
                    'iterator' => null,
                    'source_converter' => new KeyConverter(),
                    'multipart_upload_size' => $size
                )
            ))
            ->getMock();

        $path = tempnam('/tmp', 'test_simple');
        file_put_contents($path, 'test');
        $ref = new \ReflectionMethod($sync, 'createTransferAction');
        $ref->setAccessible(true);
        $result = $ref->invoke($sync, $this->getSplFile($path));
        unlink($path);

        return $result;
    }
}
