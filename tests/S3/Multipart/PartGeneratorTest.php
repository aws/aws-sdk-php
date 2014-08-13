<?php

namespace Aws\Test\S3\Multipart;

use Aws\S3\Multipart\PartGenerator;
use GuzzleHttp\Stream;
use GuzzleHttp\Stream\NoSeekStream;

/**
 * @covers Aws\S3\Multipart\PartGenerator
 */
class PartGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public static $tmp;

    public static function setUpBeforeClass()
    {
        self::$tmp = sys_get_temp_dir() . '/' . uniqid('awssdkphp-test-stream-');
        file_put_contents(self::$tmp, str_repeat('x', 5243904)); // 5MB+1KB
    }

    public static function tearDownAfterClass()
    {
        @unlink(self::$tmp);
    }

    public function testThrowsExceptionOnBadPartSize()
    {
        $this->setExpectedException('InvalidArgumentException');
        new PartGenerator(Stream\create(fopen(__FILE__, 'r')), [
            'part_size' => 1024
        ]);
    }

    public function testKnowsWhenToCalculateChecksums()
    {
        $generator = new PartGenerator(Stream\create(fopen(__FILE__, 'r')), [
            'calculate_md5' => false
        ]);
        $this->assertFalse($this->readAttribute($generator, 'calculateChecksums'));

        $generator = new PartGenerator(Stream\create(fopen(__FILE__, 'r')), [
            'checksum_type' => 'sha256'
        ]);
        $this->assertTrue($this->readAttribute($generator, 'calculateChecksums'));
    }

    public function getStreamTestCases()
    {
        return [
            [ // Seekable
                true,
                'GuzzleHttp\Stream\LimitStream',
                ['PartNumber', 'Body']
            ],
            [ // Non-seekable
                false,
                'GuzzleHttp\Stream\Stream',
                ['PartNumber', 'ContentMD5', 'ContentLength', 'Body']
            ],
        ];
    }

    /**
     * @dataProvider getStreamTestCases
     */
    public function testCanGeneratePartsForStream($seekable, $bodyClass, $dataKeys)
    {
        $source = Stream\create(fopen(self::$tmp, 'r'));
        if (!$seekable) {
            $source = new NoSeekStream($source);
        }

        $generator = new PartGenerator($source);
        $parts = iterator_to_array($generator);
        $this->assertCount(2, $parts);

        $part = reset($parts);
        // Has all the part data.
        $this->assertEquals($dataKeys, array_keys($part));
        // Verify the body is of the expected stream class.
        $this->assertInstanceOf($bodyClass, $part['Body']);
    }
}
