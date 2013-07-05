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

use Aws\Glacier\Model\MultipartUpload\UploadPartGenerator;
use Aws\Common\Enum\Size;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\Glacier\Model\MultipartUpload\UploadPartGenerator
 */
class UploadPartGeneratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected $bodyContent;
    protected $bodySize;

    public function setUp()
    {
        $this->bodySize    = intval(1.25 * Size::MB);
        $this->bodyContent = str_repeat('x', $this->bodySize);
    }

    public function testCanGenerateUploadPartData()
    {
        $generator = UploadPartGenerator::factory($this->bodyContent, Size::MB);
        $parts = $generator->getAllParts();

        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\UploadPartGenerator', $generator);
        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\UploadPart', $generator->getUploadPart(1));
        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\UploadPart', $parts[0]);
        $this->assertSame($parts[0], $generator->getUploadPart(1));
        $this->assertCount(2, $parts);
        $this->assertCount(2, $generator);
        $this->assertCount(2, $generator->getIterator());
        $this->assertInternalType('string', $generator->getRootChecksum());
        $this->assertEquals($this->bodySize, $generator->getArchiveSize());
        $this->assertEquals(Size::MB, $generator->getPartSize());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionWhenPartSizeInvalid()
    {
        $generator = UploadPartGenerator::factory($this->bodyContent, 13.2 * Size::MB);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionWhenBodyIsNotSeekable()
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, $this->bodyContent);
        rewind($stream);

        $body = $this->getMock('Guzzle\Http\EntityBody', array('isSeekable'), array($stream));
        $body->expects($this->any())
            ->method('isSeekable')
            ->will($this->returnValue(false));

        UploadPartGenerator::factory($body, Size::MB);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionWhenBodyIsTooSmall()
    {
        UploadPartGenerator::factory('', Size::MB);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testExceptionUnserializationIsUnsuccessful()
    {
        $generator  = UploadPartGenerator::factory($this->bodyContent, Size::MB);
        $serialized = str_replace('partSize', 'xxxxxxxx', serialize($generator));
        unserialize($serialized);
    }

    /**
     * @expectedException \OutOfBoundsException
     */
    public function testExceptionWhenUploadIndexDoesntExist()
    {
        $generator = UploadPartGenerator::factory($this->bodyContent, Size::MB);
        $generator->getUploadPart(10);
    }

    public function testCanCreateSinglePart()
    {
        $part = UploadPartGenerator::createSingleUploadPart($this->bodyContent);
        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\UploadPart', $part);
        $this->assertEquals($this->bodySize, $part->getSize());
    }

    public function testSerializationAndUnserializationWorks()
    {
        $generator = UploadPartGenerator::factory($this->bodyContent, Size::MB);
        $startingSize = $generator->getArchiveSize();

        $serialized = serialize($generator);

        $newGenerator = unserialize($serialized);
        $endingSize = $newGenerator->getArchiveSize();

        $this->assertEquals($startingSize, $endingSize);
    }
}
