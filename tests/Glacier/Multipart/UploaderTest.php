<?php

namespace Aws\Test\Glacier\Multipart;

use Aws\Common\Multipart\UploadState;
use Aws\Glacier\Multipart\Uploader;
use Aws\Glacier\TreeHash;

/**
 * @covers Aws\Glacier\Multipart\Uploader
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
        $state->setPartSize(2097152);
        foreach ($parts as $num => $data) {
            $state->markPartAsUploaded($num, $data);
        }

        return new Uploader($client, $state, new \ArrayIterator([]));
    }

    public function testCreatingTheCompleteCommand()
    {
        // Create dummy hashes
        $checksums = [
            hash('sha256', 'a'),
            hash('sha256', 'b'),
            hash('sha256', 'c'),
        ];
        $treeHash = new TreeHash();
        foreach ($checksums as $checksum) {
            $treeHash->addChecksum($checksum);
        }
        $expectedChecksum = bin2hex($treeHash->complete());

        // Instantiate the uploader with the necessary state.
        $uploader = $this->getUploader([
            1 => ['size' => 3, 'checksum' => $checksums[0]],
            2 => ['size' => 1, 'checksum' => $checksums[1]],
            3 => ['size' => 5, 'checksum' => $checksums[2]],
        ]);

        // Make the method under test accessible.
        $reflection = new \ReflectionObject($uploader);
        $method = $reflection->getMethod('getCompleteCommand');
        $method->setAccessible(true);

        $command = $method->invoke($uploader);
        $this->assertEquals(9, $command['archiveSize']);
        $this->assertEquals($expectedChecksum, $command['checksum']);
    }

    public function testHandlingTheResult()
    {
        $uploader = $this->getUploader();

        // Make the method under test accessible.
        $reflection = new \ReflectionObject($uploader);
        $method = $reflection->getMethod('handleResult');
        $method->setAccessible(true);

        // Mock arguments.
        $command = $this->getMockBuilder('Aws\AwsCommand')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())->method('offsetGet')
            ->willReturnOnConsecutiveCalls('0-2097151', 'foo');
        $result = $this->getMockBuilder('Aws\Result')
            ->disableOriginalConstructor()
            ->getMock();

        $method->invoke($uploader, $command, $result);
        $uploadedParts = $uploader->getState()->getUploadedParts();
        $this->assertTrue(isset($uploadedParts[1]['checksum']));
        $this->assertEquals('foo', $uploadedParts[1]['checksum']);
    }

    public function testCanParseARange()
    {
        $data = Uploader::parseRange('bytes 2097152-4194303/*', 2097152);
        $this->assertEquals(2097152, $data['Size']);
        $this->assertEquals(2, $data['PartNumber']);
    }
}
