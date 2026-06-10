<?php
namespace Aws\Test;

use Aws\DebugResourceBoundStream;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\Attributes\CoversClass;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(DebugResourceBoundStream::class)]
class DebugResourceBoundStreamTest extends TestCase
{
    public function testDelegatesReadsToInnerStream()
    {
        $inner = Utils::streamFor('hello world');
        $debug = fopen('php://temp', 'w+');
        $stream = new DebugResourceBoundStream($inner, $debug);

        $this->assertSame('hello', $stream->read(5));
        $this->assertSame(' world', $stream->read(6));
        $this->assertSame('', $stream->read(1)); // past end → triggers EOF
        $this->assertTrue($stream->eof());
        $this->assertTrue(is_resource($debug), 'reads must not close the debug FD');

        $stream->close();
    }

    public function testToStringDelegates()
    {
        $inner = Utils::streamFor('payload');
        $debug = fopen('php://temp', 'w+');
        $stream = new DebugResourceBoundStream($inner, $debug);

        $this->assertSame('payload', (string) $stream);

        $stream->close();
    }

    public function testGetSizeAndMetadataDelegate()
    {
        $inner = Utils::streamFor('abcdef');
        $debug = fopen('php://temp', 'w+');
        $stream = new DebugResourceBoundStream($inner, $debug);

        $this->assertSame(6, $stream->getSize());
        $this->assertIsArray($stream->getMetadata());

        $stream->close();
    }

    public function testCloseReleasesDebugResource()
    {
        $inner = Utils::streamFor('data');
        $debug = fopen('php://temp', 'w+');
        $stream = new DebugResourceBoundStream($inner, $debug);

        $this->assertTrue(is_resource($debug));
        $stream->close();
        $this->assertFalse(
            is_resource($debug),
            'close() must fclose the debug FD'
        );
    }

    public function testCloseAlsoClosesInnerStream()
    {
        $innerHandle = fopen('php://temp', 'w+');
        fwrite($innerHandle, 'x');
        rewind($innerHandle);
        $inner = Utils::streamFor($innerHandle);

        $debug = fopen('php://temp', 'w+');
        $stream = new DebugResourceBoundStream($inner, $debug);

        $stream->close();
        $this->assertFalse(is_resource($innerHandle), 'inner stream must also close');
        $this->assertFalse(is_resource($debug));
    }

    public function testDestructReleasesDebugResource()
    {
        $inner = Utils::streamFor('abc');
        $debug = fopen('php://temp', 'w+');
        $stream = new DebugResourceBoundStream($inner, $debug);

        unset($stream);
        $this->assertFalse(
            is_resource($debug),
            '__destruct must fclose the debug FD'
        );
    }

    public function testDoubleCloseIsSafe()
    {
        $inner = Utils::streamFor('abc');
        $debug = fopen('php://temp', 'w+');
        $stream = new DebugResourceBoundStream($inner, $debug);

        $stream->close();
        // Second close must not warn or throw on the already-closed FD.
        $stream->close();

        $this->assertFalse(is_resource($debug));
    }

    public function testCloseFollowedByDestructIsSafe()
    {
        $inner = Utils::streamFor('abc');
        $debug = fopen('php://temp', 'w+');
        $stream = new DebugResourceBoundStream($inner, $debug);

        $stream->close();
        // Destructor should see a null debug resource and do nothing.
        unset($stream);

        $this->assertFalse(is_resource($debug));
    }

    public function testAlreadyClosedDebugResourceIsToleratedAtDestruct()
    {
        $inner = Utils::streamFor('abc');
        $debug = fopen('php://temp', 'w+');

        $stream = new DebugResourceBoundStream($inner, $debug);

        // Simulate a caller who closed the FD out of band — this is the
        // scenario that originally caused the regression (#2856).
        fclose($debug);
        $this->assertFalse(is_resource($debug));

        $caught = [];
        set_error_handler(static function ($severity, $message) use (&$caught) {
            $caught[] = $message;
            return true;
        });
        try {
            unset($stream);
        } finally {
            restore_error_handler();
        }

        $this->assertSame([], $caught);
    }

    public function testImplementsStreamInterface()
    {
        $stream = new DebugResourceBoundStream(
            Utils::streamFor(''),
            fopen('php://temp', 'w+')
        );
        $this->assertInstanceOf(StreamInterface::class, $stream);
        $stream->close();
    }
}
