<?php

namespace Aws\Tests\S3\Command;

use Aws\S3\Command\CompleteMultipartUpload;

/**
 * @covers Aws\S3\Command\CompleteMultipartUpload
 */
class CompleteMultipartUploadTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        $client = $this->getServiceBuilder()->get('s3');

        return $client->getCommand('CompleteMultipartUpload', array(
            'bucket'   => 'bucket',
            'key'      => 'key',
            'UploadId' => '123'
        ));
    }

    public function testAddsParts()
    {
        $command = new CompleteMultipartUpload();
        $command->addPart(1, 'abc');

        $this->assertEquals(array(
            array(
                'PartNumber' => 1,
                'ETag'       => '"abc"'
            )
        ), $command['parts']);

        $command->addPart(2, '"123"');
        $this->assertEquals(array(
            array(
                'PartNumber' => 1,
                'ETag'       => '"abc"'
            ),
            array(
                'PartNumber' => 2,
                'ETag'       => '"123"'
            )
        ), $command['parts']);
    }

    public function testAllowsCustomBody()
    {
        $command = $this->getCommand();
        $command['body'] = 'foo';
        $request = $command->prepare();
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('foo', (string) $request->getBody());
        $this->assertContains('/key', $request->getPath(), 'URL does not contain the key: ' . $request->getUrl());
        $this->assertContains('uploadId=123', $request->getUrl());
        $this->assertContains('bucket', $request->getHost());
    }

    public function testBuildsBodyUsingParts()
    {
        $command = $this->getCommand();
        $command->addPart(1, 'abc');
        $command->addPart(2, '"123"');
        $request = $command->prepare();
        $body = (string) $request->getBody();
        // Ensure the body is valid XML
        $xml = new \SimpleXMLElement($body);
        $this->assertEquals('<CompleteMultipartUpload><Part><PartNumber>1</PartNumber><ETag>"abc"</ETag></Part><Part><PartNumber>2</PartNumber><ETag>"123"</ETag></Part></CompleteMultipartUpload>', $body);
    }
}
