<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\Parser\NonSeekableStreamDecodingEventStreamIterator;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Utils;
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
}
