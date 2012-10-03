<?php

namespace Aws\Tests\DynamoDb;

use Aws\Glacier\Model\UploadContext;

class UploadContextTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Glacier\Model\UploadPartContext::__construct
     * @covers Aws\Glacier\Model\UploadPartContext::getOffset
     * @covers Aws\Glacier\Model\UploadPartContext::getSize
     */
    public function testConstructorInitializesObject()
    {
        $context = new UploadContext(10, 5);

        $this->assertEquals(10, $this->readAttribute($context, 'maxSize'));
        $this->assertEquals(5, $context->getOffset());
        $this->assertEquals(0, $context->getSize());
        $this->assertInstanceOf('Aws\Glacier\Model\TreeHash', $this->readAttribute($context, 'treeHash'));
        $this->assertInstanceOf('Aws\Common\ChunkHash', $this->readAttribute($context, 'chunkHash'));
    }

    /**
     * @covers Aws\Glacier\Model\UploadPartContext::getSize
     * @covers Aws\Glacier\Model\UploadPartContext::isEmpty
     * @covers Aws\Glacier\Model\UploadPartContext::isFull
     */
    public function testIsEmptyAndFullAsExpected()
    {
        $context = new UploadContext(10);

        $this->assertTrue($context->isEmpty());
        $this->assertFalse($context->isFull());
        $this->assertEquals(0, $context->getSize());

        $context->addData('abcde');

        $this->assertFalse($context->isEmpty());
        $this->assertFalse($context->isFull());
        $this->assertEquals(5, $context->getSize());

        $context->addData('fghij');

        $this->assertFalse($context->isEmpty());
        $this->assertTrue($context->isFull());
        $this->assertEquals(10, $context->getSize());
    }

    /**
     * @covers Aws\Glacier\Model\UploadPartContext::addData
     * @covers Aws\Glacier\Model\UploadPartContext::finalize
     * @covers Aws\Glacier\Model\UploadPartContext::getChecksum
     * @covers Aws\Glacier\Model\UploadPartContext::getContentHash
     * @covers Aws\Glacier\Model\UploadPartContext::getRange
     * @covers Aws\Glacier\Model\UploadPartContext::getSize
     */
    public function testCanRetrieveFinalHashes()
    {
        $context = new UploadContext(6);
        $context->addData('foobar');
        $context->finalize();

        $this->assertInternalType('string', $context->getChecksum());
        $this->assertInternalType('string', $context->getContentHash());
        $this->assertEquals(array(0, 5), $context->getRange());
        $this->assertEquals(6, $context->getSize());
    }

    /**
     * @covers Aws\Glacier\Model\UploadPartContext::serialize
     * @covers Aws\Glacier\Model\UploadPartContext::unserialize
     */
    public function testCanSerializeAndUnserialize()
    {
        $getArray = function (UploadContext $context) {
            return array(
                $context->getChecksum(),
                $context->getContentHash(),
                $context->getSize(),
                $context->getOffset(),
                $context->getRange()
            );
        };

        $context1 = new UploadContext(3);
        $context1->addData('foo');
        $context1->finalize();
        $array1 = $getArray($context1);

        $context2 = unserialize(serialize($context1));
        $array2 = $getArray($context2);

        $this->assertEquals($array1, $array2);
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Glacier\Model\UploadPartContext::addData
     */
    public function testCannotAddDataAfterFinalized()
    {
        $context = new UploadContext(6);
        $context->addData('foo');
        $context->finalize();

        $context->addData('bar');
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Glacier\Model\UploadPartContext::addData
     */
    public function testCannotAddTooMuchData()
    {
        $context = new UploadContext(3);
        $context->addData('foo');
        $context->addData('bar');
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Glacier\Model\UploadPartContext::getChecksum
     */
    public function testCannotGetChecksumBeforeItIsCalculated()
    {
        $context = new UploadContext(3);
        $context->getChecksum();
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Glacier\Model\UploadPartContext::getContentHash
     */
    public function testCannotGetContextHashBeforeItIsCalculated()
    {
        $context = new UploadContext(3);
        $context->getContentHash();
    }

    /**
     * @covers Aws\Glacier\Model\UploadPartContext::serialize
     */
    public function testCannotSerializeUntilItsFinalized()
    {
        $context = new UploadContext(3);
        try {
            serialize($context);
            $this->fail();
        } catch (\Exception $e) {
            // Success!
        }
    }
}
