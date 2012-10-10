<?php

namespace Aws\Tests\DynamoDb;

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
