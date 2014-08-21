<?php

namespace Aws\Test\S3\Multipart;

use Aws\S3\Multipart\PartGenerator;
use GuzzleHttp\Stream\FnStream;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\S3\Multipart\PartGenerator
 */
class PartGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testThrowsExceptionOnBadPartSize()
    {
        $this->setExpectedException('InvalidArgumentException');
        new PartGenerator(Stream::factory(fopen(__FILE__, 'r')), [
            'part_size' => 1024
        ]);
    }

    public function testKnowsWhenToCalculateChecksums()
    {
        $generator = new PartGenerator(Stream::factory(fopen(__FILE__, 'r')), [
            'calculate_md5' => false
        ]);
        $this->assertFalse($this->readAttribute($generator, 'calculateChecksums'));

        $generator = new PartGenerator(Stream::factory(fopen(__FILE__, 'r')), [
            'checksum_type' => 'sha256'
        ]);
        $this->assertTrue($this->readAttribute($generator, 'calculateChecksums'));
    }

    /**
     * @dataProvider getStreamTestCases
     */
    public function testCanGeneratePartsForStream($source, $bodyClass, $dataKeys)
    {
        $generator = new PartGenerator($source);
        $parts = iterator_to_array($generator);
        $this->assertCount(2, $parts);

        $part = reset($parts);
        // Has all the part data.
        $this->assertEquals($dataKeys, array_keys($part));
        // Verify the body is of the expected stream class.
        $this->assertInstanceOf($bodyClass, $part['Body']);
    }

    public function getStreamTestCases()
    {
        return [
            [ // Seekable
                $this->createStream(true),
                'GuzzleHttp\Stream\LimitStream',
                ['PartNumber', 'Body']
            ],
            [ // Non-seekable
                $this->createStream(false),
                'GuzzleHttp\Stream\Stream',
                ['PartNumber', 'ContentMD5', 'ContentLength', 'Body']
            ],
        ];
    }

    private function createStream($seekable)
    {
        $stream = Stream::factory(str_repeat('.', 5243904));

        return FnStream::decorate($stream, [
            'isSeekable' => function () use ($seekable) {return $seekable;},
            'getMetadata' => function ($key = null) use ($seekable, $stream) {
                return ($seekable && $key === 'wrapper_type')
                    ? 'plainfile'
                    : $stream->getMetadata($key);
            },
            '__toString' => function () {return '[...]';},
        ]);
    }
}
