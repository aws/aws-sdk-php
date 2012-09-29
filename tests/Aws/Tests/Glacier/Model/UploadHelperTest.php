<?php

namespace Aws\Tests\DynamoDb;

use Aws\Glacier\Model\UploadHelper;
use Aws\Common\Enum\Size;

/**
 * @covers Aws\Glacier\Model\UploadHelper
 */
class UploadHelperTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected $bodyContent;

    public function setUp()
    {
        $this->bodyContent = str_repeat('x', intval(1.25 * Size::MB));
    }

    public function testCanGenerateUploadData()
    {
        $helper = UploadHelper::factory($this->bodyContent, Size::MB);
        $contexts = $helper->getUploadContexts();

        $this->assertInstanceOf('Aws\Glacier\Model\UploadHelper', $helper);
        $this->assertInstanceOf('Guzzle\Http\EntityBodyInterface', $helper->getBody());
        $this->assertInstanceOf('Aws\Glacier\Model\UploadContext', $helper->getSingleUploadContext(0));
        $this->assertInstanceOf('Aws\Glacier\Model\UploadContext', $contexts[0]);
        $this->assertCount(2, $contexts);
        $this->assertInternalType('string', $helper->getRootChecksum());
        $this->assertEquals(intval(1.25 * Size::MB), $helper->getArchiveSize());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionWhenPartSizeInvalid()
    {
        $helper = UploadHelper::factory($this->bodyContent, 13.2 * Size::MB);
    }

    /**
     * @expectedException \OutOfBoundsException
     */
    public function testExceptionWhenUploadIndexDoesntExist()
    {
        $helper = UploadHelper::factory($this->bodyContent, Size::MB);
        $helper->getSingleUploadContext(10);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionWhenUploadIndexIsAmbiguous()
    {
        $helper = UploadHelper::factory($this->bodyContent, Size::MB);
        $helper->getSingleUploadContext();
    }

    public function testUploadIndexCanBeAssumedWhenOnlyOne()
    {
        $helper = UploadHelper::factory($this->bodyContent, 4 * Size::MB);
        $context = $helper->getSingleUploadContext();
        $this->assertInstanceOf('Aws\Glacier\Model\UploadContext', $context);
    }
}
