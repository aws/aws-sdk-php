<?php
namespace Aws\Test\Handler\GuzzleV5;

use Aws\Handler\GuzzleV5\GuzzleStream as GuzzleStreamAdapter;
use Aws\Handler\GuzzleV5\PsrStream as PsrStreamAdapter;
use GuzzleHttp\Psr7;
use GuzzleHttp\Stream\Stream as GuzzleStream;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Handler\GuzzleV5\GuzzleStream
 * @covers Aws\Handler\GuzzleV5\PsrStream
 */
class StreamTest extends TestCase
{
    public function set_up()
    {
        if (!class_exists('GuzzleHttp\Ring\Core')) {
            $this->markTestSkipped();
        }
    }

    public function testCanAdaptGuzzleStreamToPsr()
    {
        $stream = new PsrStreamAdapter(GuzzleStream::factory('foo'));
        $this->verify($stream, 'foo');
    }

    public function testCanAdaptPsrStreamToGuzzle()
    {
        $stream = new GuzzleStreamAdapter(Psr7\Utils::streamFor('foo'));
        $this->verify($stream, 'foo');
    }

    private function verify($stream, $expected)
    {
        $str1 = '';
        while (!$stream->eof()) {
            $str1 .= $stream->read(1);
        }

        $stream->rewind();
        $str2 = $stream->getContents();

        $this->assertSame($expected, $str1);
        $this->assertSame($expected, $str2);
    }
}
