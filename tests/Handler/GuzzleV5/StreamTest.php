<?php
namespace Aws\Test\Handler\GuzzleV5;

use Aws\Handler\GuzzleV5\GuzzleStream as GuzzleStreamAdapter;
use Aws\Handler\GuzzleV5\PsrStream as PsrStreamAdapter;
use GuzzleHttp\Psr7;
use GuzzleHttp\Stream\Stream as GuzzleStream;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Handler\GuzzleV5\GuzzleStream
 * @covers Aws\Handler\GuzzleV5\PsrStream
 */
class StreamTest extends TestCase
{
    public function setUp()
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
        $stream = new GuzzleStreamAdapter(Psr7\stream_for('foo'));
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

        $this->assertEquals($expected, $str1);
        $this->assertEquals($expected, $str2);
    }
}
