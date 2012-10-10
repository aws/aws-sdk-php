<?php

namespace Aws\Tests\DynamoDb;

use Aws\Glacier\Model\MultipartUpload\UploadPart;

/**
 * @covers Aws\Glacier\Model\MultipartUpload\UploadPart
 */
class UploadPartTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testBasicOperations()
    {
        /** @var $part UploadPart */
        $part = UploadPart::fromArray(array(
            'partNumber'  => 3,
            'checksum'    => 'aaa',
            'contentHash' => 'bbb',
            'size'        => 5,
            'offset'      => 2
        ));

        $this->assertEquals(3, $part->getPartNumber());
        $this->assertEquals('aaa', $part->getChecksum());
        $this->assertEquals('bbb', $part->getContentHash());
        $this->assertEquals(5, $part->getSize());
        $this->assertEquals(2, $part->getOffset());
        $this->assertEquals(array(2, 6), $part->getRange());
        $this->assertEquals('bytes 2-6/*', $part->getFormattedRange());
    }
}
