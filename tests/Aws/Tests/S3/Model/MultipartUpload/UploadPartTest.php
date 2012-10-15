<?php

namespace Aws\Tests\S3\Model\MultipartUpload;

use Aws\Common\Enum\DateFormat;
use Aws\S3\Model\MultipartUpload\UploadPart;

/**
 * @covers Aws\S3\Model\MultipartUpload\UploadPart
 */
class UploadPartTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testBasicOperations()
    {
        $date = gmdate(DateFormat::RFC2822);

        /** @var $part UploadPart */
        $part = UploadPart::fromArray(array(
            'PartNumber'   => 3,
            'ETag'         => 'aaa',
            'LastModified' => $date,
            'Size'         => 5
        ));

        $this->assertEquals(3, $part->getPartNumber());
        $this->assertEquals('aaa', $part->getETag());
        $this->assertEquals($date, $part->getLastModified());
        $this->assertEquals(5, $part->getSize());
    }
}
