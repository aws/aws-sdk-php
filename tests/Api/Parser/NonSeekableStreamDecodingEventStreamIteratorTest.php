<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\Parser\NonSeekableStreamDecodingEventStreamIterator;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\StreamDecoratorTrait;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class NonSeekableStreamDecodingEventStreamIteratorTest extends TestCase
{
    const EVENT_STREAMS_DIR = __DIR__ . '/event-streams/';
    const CASES_FILE = self::EVENT_STREAMS_DIR . 'cases.json';

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

    /**
     * @param string $eventName
     * @param array $expected
     *
     * @dataProvider readAndHashBytesHandlesPartialReadsProvider
     *
     * @return void
     */
    public function testReadAndHashBytesHandlesPartialReads(
        string $eventName,
        array $expected
    ): void
    {
        $eventPath = self::EVENT_STREAMS_DIR . "events/$eventName";
        $eventStream = Utils::streamFor(
            base64_decode(
                file_get_contents($eventPath)
            )
        );
        $partialReadStream = new class($eventStream) implements StreamInterface {
            use StreamDecoratorTrait;

            private int $position = 0;
            private int $maxBytesPerRead;
            private StreamInterface $stream;

            /**
             * @param StreamInterface $stream
             * @param int $maxBytesPerRead
             */
            public function __construct(StreamInterface $stream, int $maxBytesPerRead = 20)
            {
                $this->stream = $stream;
                $this->maxBytesPerRead = $maxBytesPerRead;
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
                return $this->stream->read($readLength);
            }
        };
        $noSeekStreamDecodingEventStreamIterator = new NonSeekableStreamDecodingEventStreamIterator(
            $partialReadStream
        );
        $noSeekStreamDecodingEventStreamIterator->next();
        $event = $noSeekStreamDecodingEventStreamIterator->current();
        $this->assertEquals(
            $expected['headers'],
            $event['headers']
        );
        $decodedPayload = json_decode(
            $event['payload']->getContents(),
            true
        );
        $this->assertEquals(
            $expected['payload'],
            $decodedPayload
        );
    }

    /**
     * @return \Generator
     */
    public function readAndHashBytesHandlesPartialReadsProvider(): \Generator
    {
        $cases = json_decode(
            file_get_contents(self::CASES_FILE),
            true
        );
        foreach ($cases as $case) {
            yield $case['eventName'] => [
                'eventName' => $case['eventName'],
                'expected' => $case['expected'],
            ];
        }
    }
}

