<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\Parser\NonSeekableStreamDecodingEventStreamIterator;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class NonSeekableStreamDecodingEventStreamIteratorTest extends TestCase
{
    public function testFailOnNonSeekableStream()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The stream provided must be not seekable.');

        $stream = Utils::streamFor('Foo');
        new NonSeekableStreamDecodingEventStreamIterator($stream);
    }

    public function testParseEventFromNonSeekableStream()
    {
        $encodedEvent = <<<EOF
AAAAhQAAAExjTu0wDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcABnBlcnNvbg06Y29udGVudC10eXBlBwAQYXBwbGljYXRpb24vanNvbnsibmFtZSI6ImZvbyIsImxhc3ROYW1lIjo
iZnV6eiIsImFnZSI6Mjh9+hfixw==
EOF;
        $stream = new NoSeekStream(
            Utils::streamFor(
                base64_decode($encodedEvent)
            )
        );
        $iterator = new NonSeekableStreamDecodingEventStreamIterator($stream);
        $iterator->rewind();
        $expected = [
            'headers' => [
                ':message-type' => 'event',
                ':event-type' => 'person',
                ':content-type' => 'application/json'
            ],
            'payload' => Utils::streamFor("{\"name\":\"foo\",\"lastName\":\"fuzz\",\"age\":28}")
        ];
        $event = $iterator->current();

        $this->assertEquals($expected['headers'], $event['headers']);
        $this->assertEquals($expected['payload']->getContents(), $event['payload']->getContents());
    }

    /**
     * This test will provide a single event, which means a next event can't be parsed.
     * Therefore, valid should return false once that single event gets parsed.
     *
     * @return void
     */
    public function testValidReturnsTrueOnEOF()
    {
        $encodedEvent = <<<EOF
AAAAhQAAAExjTu0wDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcABnBlcnNvbg06Y29udGVudC10eXBlBwAQYXBwbGljYXRpb24vanNvbnsibmFtZSI6ImZvbyIsImxhc3ROYW1lIjo
iZnV6eiIsImFnZSI6Mjh9+hfixw==
EOF;
        $stream = new NoSeekStream(
            Utils::streamFor(
                base64_decode($encodedEvent)
            )
        );
        $iterator = new NonSeekableStreamDecodingEventStreamIterator($stream);
        $iterator->rewind();
        $iterator->next();
        $this->assertFalse($iterator->valid());
    }

    public function testReadAndHashBytesHandlesPartialReads()
    {
        $payload = str_repeat('A', 1024);
        $stream = new NoSeekStream(new PartialReadStream($payload));

        $iterator = new NonSeekableStreamDecodingEventStreamIterator($stream);

        $reflect = new \ReflectionClass($iterator);
        $hashContextProperty = $reflect->getProperty('hashContext');
        $hashContextProperty->setAccessible(true);
        $hashContextProperty->setValue($iterator, hash_init('crc32c'));

        $method = $reflect->getMethod('readAndHashBytes');
        $method->setAccessible(true);
        
        $result = $method->invoke($iterator, 1024);

        $this->assertEquals($payload, $result);
    }
}
/**
 * Simulates partial reads by limiting each read() call to a maximum number of bytes,
 * regardless of what is requested.
 */
class PartialReadStream implements StreamInterface
{
    private string $data;
    private int $position = 0;
    private int $maxBytesPerRead;

    public function __construct(string $data, int $maxBytesPerRead = 100)
    {
        $this->data = $data;
        $this->maxBytesPerRead = $maxBytesPerRead;
    }

    public function __toString(): string
    {
        return $this->data;
    }

    public function close(): void
    {
        // No resources to close
    }

    public function detach()
    {
        return null;
    }

    public function getSize(): ?int
    {
        return strlen($this->data);
    }

    public function tell(): int
    {
        return $this->position;
    }

    public function eof(): bool
    {
        return $this->position >= strlen($this->data);
    }

    public function isSeekable(): bool
    {
        return false;
    }

    public function seek($offset, $whence = SEEK_SET): void
    {
        throw new \RuntimeException("Stream is not seekable");
    }

    public function rewind(): void
    {
        throw new \RuntimeException("Stream is not seekable");
    }

    public function isWritable(): bool
    {
        return false;
    }

    public function write($string): int
    {
        throw new \RuntimeException("Stream is not writable");
    }

    public function isReadable(): bool
    {
        return true;
    }

    public function read($length): string
    {
        if ($this->eof()) {
            return '';
        }

        // Read only up to maxBytesPerRead
        $readLength = min($length, $this->maxBytesPerRead);
        $chunk = substr($this->data, $this->position, $readLength);
        $this->position += strlen($chunk);

        return $chunk;
    }

    public function getContents(): string
    {
        if ($this->eof()) {
            return '';
        }

        $contents = substr($this->data, $this->position);
        $this->position = strlen($this->data);

        return $contents;
    }

    public function getMetadata($key = null): mixed
    {
        return null;
    }
}

