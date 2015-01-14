<?php

namespace Aws\Test\S3\Multipart;

use Aws\Multipart\UploadState;
use Aws\S3\Uploader;

/**
 * @covers Aws\S3\Uploader
 */
class UploaderTest extends \PHPUnit_Framework_TestCase
{
    public function getUploader(array $parts = [])
    {
        $client = $this->getMockBuilder('Aws\AwsClientInterface')
            ->setMethods(['getCommand'])
            ->getMockForAbstractClass();
        $client->expects($this->any())
            ->method('getCommand')
            ->willReturnArgument(1);

        $state = new UploadState([]);
        foreach ($parts as $num => $data) {
            $state->markPartAsUploaded($num, $data);
        }

        return new Uploader($client, $state, new \ArrayIterator([]));
    }

    public function testCreatingTheCompleteCommand()
    {
        // Instantiate the uploader with the necessary state.
        $parts = [
            1 => ['ETag' => 'foo'],
            2 => ['ETag' => 'bar'],
            3 => ['ETag' => 'baz'],
        ];
        $uploader = $this->getUploader($parts);

        // Make the method under test accessible.
        $reflection = new \ReflectionObject($uploader);
        $method = $reflection->getMethod('getCompleteCommand');
        $method->setAccessible(true);

        $command = $method->invoke($uploader);
        $this->assertTrue(isset($command['MultipartUpload']['Parts']));
        $this->assertEquals($parts, $command['MultipartUpload']['Parts']);
    }

    public function testHandlingTheResult()
    {
        $uploader = $this->getUploader();

        // Make the method under test accessible.
        $reflection = new \ReflectionObject($uploader);
        $method = $reflection->getMethod('handleResult');
        $method->setAccessible(true);

        // Mock arguments.
        $command = $this->getMockBuilder('GuzzleHttp\Command\Command')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())->method('offsetGet')
            ->willReturn(2);
        $result = $this->getMockBuilder('Aws\Result')
            ->disableOriginalConstructor()
            ->getMock();
        $result->expects($this->any())->method('offsetGet')
            ->willReturn('foo');

        $method->invoke($uploader, $command, $result);
        $uploadedParts = $uploader->getState()->getUploadedParts();
        $this->assertTrue(isset($uploadedParts[2]['ETag']));
        $this->assertEquals('foo', $uploadedParts[2]['ETag']);
    }
}
