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

namespace Aws\Tests\Glacier\Model\MultipartUpload;

use Aws\Glacier\Model\MultipartUpload\UploadPartContext;

class UploadContextTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Glacier\Model\MultipartUpload\UploadPartContext::__construct
     */
    public function testConstructorInitializesObject()
    {
        $context = new UploadPartContext(10, 5);

        $this->assertEquals(10, $this->readAttribute($context, 'maxSize'));
        $this->assertEquals(5, $this->readAttribute($context, 'offset'));
        $this->assertEquals(0, $this->readAttribute($context, 'size'));
        $this->assertInstanceOf('Aws\Common\Hash\TreeHash', $this->readAttribute($context, 'treeHash'));
        $this->assertInstanceOf('Aws\Common\Hash\ChunkHash', $this->readAttribute($context, 'chunkHash'));
    }

    /**
     * @covers Aws\Glacier\Model\MultipartUpload\UploadPartContext::isEmpty
     * @covers Aws\Glacier\Model\MultipartUpload\UploadPartContext::isFull
     */
    public function testIsEmptyAndFullAsExpected()
    {
        $context = new UploadPartContext(10);

        $this->assertTrue($context->isEmpty());
        $this->assertFalse($context->isFull());
        $this->assertEquals(0, $this->readAttribute($context, 'size'));

        $context->addData('abcde');

        $this->assertFalse($context->isEmpty());
        $this->assertFalse($context->isFull());
        $this->assertEquals(5, $this->readAttribute($context, 'size'));

        $context->addData('fghij');

        $this->assertFalse($context->isEmpty());
        $this->assertTrue($context->isFull());
        $this->assertEquals(10, $this->readAttribute($context, 'size'));
    }

    public function testCanCreateUploadPart()
    {
        $context = new UploadPartContext(10);
        $context->addData('abcdefghij');
        $part = $context->generatePart();

        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\UploadPart', $part);
    }

//    /**
//     * @covers Aws\Glacier\Model\UploadPartContext::addData
//     * @covers Aws\Glacier\Model\UploadPartContext::finalize
//     * @covers Aws\Glacier\Model\UploadPartContext::getChecksum
//     * @covers Aws\Glacier\Model\UploadPartContext::getContentHash
//     * @covers Aws\Glacier\Model\UploadPartContext::getRange
//     * @covers Aws\Glacier\Model\UploadPartContext::getSize
//     */
//    public function testCanRetrieveFinalHashes()
//    {
//        $context = new UploadContext(6);
//        $context->addData('foobar');
//        $context->finalize();
//
//        $this->assertInternalType('string', $context->getChecksum());
//        $this->assertInternalType('string', $context->getContentHash());
//        $this->assertEquals(array(0, 5), $context->getRange());
//        $this->assertEquals(6, $context->getSize());
//    }
//
//    /**
//     * @covers Aws\Glacier\Model\UploadPartContext::serialize
//     * @covers Aws\Glacier\Model\UploadPartContext::unserialize
//     */
//    public function testCanSerializeAndUnserialize()
//    {
//        $getArray = function (UploadContext $context) {
//            return array(
//                $context->getChecksum(),
//                $context->getContentHash(),
//                $context->getSize(),
//                $context->getOffset(),
//                $context->getRange()
//            );
//        };
//
//        $context1 = new UploadContext(3);
//        $context1->addData('foo');
//        $context1->finalize();
//        $array1 = $getArray($context1);
//
//        $context2 = unserialize(serialize($context1));
//        $array2 = $getArray($context2);
//
//        $this->assertEquals($array1, $array2);
//    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Glacier\Model\MultipartUpload\UploadPartContext::addData
     */
    public function testCannotAddDataAfterFinalized()
    {
        $context = new UploadPartContext(6);
        $context->addData('foo');
        $context->generatePart();

        $context->addData('bar');
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Glacier\Model\MultipartUpload\UploadPartContext::addData
     */
    public function testCannotAddTooMuchData()
    {
        $context = new UploadPartContext(3);
        $context->addData('foo');
        $context->addData('bar');
    }

//    /**
//     * @expectedException \LogicException
//     * @covers Aws\Glacier\Model\UploadPartContext::getChecksum
//     */
//    public function testCannotGetChecksumBeforeItIsCalculated()
//    {
//        $context = new UploadContext(3);
//        $context->getChecksum();
//    }
//
//    /**
//     * @expectedException \LogicException
//     * @covers Aws\Glacier\Model\UploadPartContext::getContentHash
//     */
//    public function testCannotGetContextHashBeforeItIsCalculated()
//    {
//        $context = new UploadContext(3);
//        $context->getContentHash();
//    }
//
//    /**
//     * @covers Aws\Glacier\Model\UploadPartContext::serialize
//     */
//    public function testCannotSerializeUntilItsFinalized()
//    {
//        $context = new UploadContext(3);
//        try {
//            serialize($context);
//            $this->fail();
//        } catch (\Exception $e) {
//            // Success!
//        }
//    }
}
