<?php

namespace Aws\Tests\Common\Model\MultipartUpload;

use Aws\Common\Model\MultipartUpload\AbstractUploadPart;

/**
 * Concrete test fixture
 */
class UploadPart extends AbstractUploadPart
{
    protected static $keyMap = array('PARTNUMBER' => 'partNumber', 'fOObAR' => 'fooBar');
    protected $fooBar;
}

/**
 * @covers Aws\Common\Model\MultipartUpload\AbstractUploadPart
 */
class AbstractUploadPartTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testUploadPartCorrectlyManagesData()
    {
        $startingData = array('PARTNUMBER' => 5, 'fOObAR' => 10);
        $uploadPart = UploadPart::fromArray($startingData);
        $this->assertEquals(5, $uploadPart->getPartNumber());
        $serialized = serialize($uploadPart);
        $unserialized = unserialize($serialized);
        $endingData = $unserialized->toArray();

        $this->assertEquals($startingData, $endingData);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionWhenMissingData()
    {
        UploadPart::fromArray(array('wrongKey' => 'dummyData'));
    }
}
