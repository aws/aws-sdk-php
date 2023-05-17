<?php

namespace Aws\Test\RequestCompression\RequestMinCompressionSizeBytes;

use Aws\RequestCompression\RequestMinCompressionSizeBytes\Configuration;
use Aws\RequestCompression\Exception\ConfigurationException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Retry\Configuration
 */
class ConfigurationTest extends TestCase
{
    public function testGetsCorrectValues()
    {
        $config = new Configuration( 8);
        $this->assertSame(8, $config->getMinCompressionSize());
    }

    public function testToArray()
    {
        $config = new Configuration( 25);
        $expected = [
            'request_min_compression_size_bytes' => 25,
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    public function invalidMinRequestSizeProvider()
    {
        return [
            [-1],
            [10485761],
            [null],
            ['not a request size']
        ];
    }

    /**
     * @dataProvider invalidMinRequestSizeProvider
     *
     * @param $minRequestSize
     */
    public function testHandlesInvalidMinRequestSize($minRequestSize)
    {
        $this->expectExceptionMessage(
            "'min_compression_size_bytes' config option must be an integer between 0 and 10485760, inclusive."
        );
        $this->expectException(ConfigurationException::class);
        new Configuration( $minRequestSize);
    }
}