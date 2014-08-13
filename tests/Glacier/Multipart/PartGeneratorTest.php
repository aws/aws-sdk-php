<?php

namespace Aws\Test\Glacier\Multipart;

use Aws\Glacier\Multipart\PartGenerator;
use GuzzleHttp\Stream;
use GuzzleHttp\Stream\NoSeekStream;

/**
 * @covers Aws\Glacier\Multipart\PartGenerator
 */
class PartGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public static $tmp;

    public static function setUpBeforeClass()
    {
        self::$tmp = sys_get_temp_dir() . '/' . uniqid('awssdkphp-test-stream-');
        file_put_contents(self::$tmp, str_repeat('x', 3146752)); // 3MB+1KB
    }

    public static function tearDownAfterClass()
    {
        @unlink(self::$tmp);
    }

    public function testThrowsExceptionOnBadPartSize()
    {
        $this->setExpectedException('InvalidArgumentException');
        new PartGenerator(Stream\create(fopen(__FILE__, 'r')), [
            'part_size' => 1024 * 1024 * 5
        ]);
    }

    public function getStreamTestCases()
    {
        return [
            [ true, 'GuzzleHttp\Stream\LimitStream'], // Seekable
            [ false, 'GuzzleHttp\Stream\Stream'], // Non-seekable
        ];
    }

    /**
     * @dataProvider getStreamTestCases
     */
    public function testCanGeneratePartsForStream($seekable, $bodyClass)
    {
        $source = Stream\create(fopen(self::$tmp, 'r'));
        if (!$seekable) {
            $source = new NoSeekStream($source);
        }

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
}
