<?php
namespace Aws\Test;

use GuzzleHttp\Psr7;
use Aws\PhpHash;
use Aws\HashingStream;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\HashingStream
 */
class HashingStreamTest extends TestCase
{
    public function testCanCreateRollingMd5()
    {
        $source = Psr7\stream_for('foobar');
        $hash = new PhpHash('md5');
        (new HashingStream($source, $hash))->getContents();
        $this->assertEquals(md5('foobar'), bin2hex($hash->complete()));
    }

    public function testCallbackTriggeredWhenComplete()
    {
        $source = Psr7\stream_for('foobar');
        $hash = new PhpHash('md5');
        $called = false;
        $stream = new HashingStream($source, $hash, function () use (&$called) {
            $called = true;
        });
        $stream->getContents();
        $this->assertTrue($called);
    }

    public function testCanOnlySeekToTheBeginning()
    {
        $source = Psr7\stream_for('foobar');
        $hash = new PhpHash('md5');
        $stream = new HashingStream($source, $hash);

        // Reading works fine
        $bytes = $stream->read(3);
        $this->assertEquals('foo', $bytes);

        // Seeking to 0 is fine
        $stream->seek(0);
        $stream->getContents();
        $this->assertEquals(md5('foobar'), bin2hex($hash->complete()));

        // Seeking arbitrarily is not fine
        $stream->seek(3);
    }
}
