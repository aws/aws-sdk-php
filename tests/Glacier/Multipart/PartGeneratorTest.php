<?php

namespace Aws\Test\Glacier\Multipart;

use Aws\Glacier\Multipart\PartGenerator;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\FnStream;

/**
 * @covers Aws\Glacier\Multipart\PartGenerator
 */
class PartGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testThrowsExceptionOnBadPartSize()
    {
        $this->setExpectedException('InvalidArgumentException');
        new PartGenerator(Stream::factory(fopen(__FILE__, 'r')), [
            'part_size' => 1024 * 1024 * 5
        ]);
    }

    public function getStreamTestCases()
    {
        return [
            [$this->createStream(true), 'GuzzleHttp\Stream\LimitStream'],
            [$this->createStream(false), 'GuzzleHttp\Stream\Stream'],
        ];
    }

    /**
     * @dataProvider getStreamTestCases
     */
    public function testCanGeneratePartsForStream($source, $bodyClass)
    {
        $generator = new PartGenerator($source);
        $parts = iterator_to_array($generator);
        $this->assertCount(4, $parts);

        $part = reset($parts);
        // Has all the part data.
        $this->assertEquals(
            ['checksum', 'ContentSHA256', 'body', 'range'],
            array_keys($part)
        );
        // For 1 MB parts, the checksums should be the same.
        $this->assertEquals($part['checksum'], $part['ContentSHA256']);
        // Verify the body is of the expected stream class.
        $this->assertInstanceOf($bodyClass, $part['body']);
    }

    private function createStream($seekable)
    {
        $stream = Stream::factory(str_repeat('.', 3146752)); // 3 MB + 1 KB

        return FnStream::decorate($stream, [
            'seek' => function ($pos) use ($seekable, $stream) {
                    return $seekable ? $stream->seek($pos) : false;
                },
            'isSeekable' => function () use ($seekable) {return $seekable;},
            'getMetadata' => function ($key = null) use ($seekable, $stream) {
                return ($seekable && $key === 'wrapper_type')
                    ? 'plainfile'
                    : $stream->getMetadata($key);
            }
        ]);
    }
}
