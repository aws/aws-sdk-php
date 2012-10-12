<?php

namespace Aws\Tests\Common\Model\MultipartUpload;

use Aws\Common\Model\MultipartUpload\AbstractUploadId;

/**
 * Concrete test fixture
 */
class UploadId extends AbstractUploadId
{
    protected static $expectedValues = array('foo' => null, 'bar' => null);
}

/**
 * @covers Aws\Common\Model\MultipartUpload\AbstractUploadId
 */
class AbstractUploadIdTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testUploadIdCorrectlyManagesData()
    {
        $startingParams = array('foo' => 1, 'bar' => 2);
        $uploadId = UploadId::fromParams($startingParams);
        $serialized = serialize($uploadId);
        $unserialized = unserialize($serialized);
        $endingParams = $unserialized->toParams();

        $this->assertEquals($startingParams, $endingParams);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionWhenMissingData()
    {
        UploadId::fromParams(array('wrongKey' => 'dummyData'));
    }
}
