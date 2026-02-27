<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\Parser\AbstractParser;
use GuzzleHttp\Psr7\CachingStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

final class AbstractParserTest extends TestCase
{
    public function testGetBodyContentsWithSeekableStream()
    {
        $body = Utils::streamFor('test content');
        $body->read(4);
        $response = new Response(200, [], $body);

        $contents = AbstractParser::getBodyContents($response);

        $this->assertEquals('test content', $contents);
    }

    public function testGetBodyContentsWithNonSeekableStream()
    {
        $body = $this->createNonSeekableStream('test content');
        $response = new Response(200, [], $body);
        $response->getBody()->read(4);
        $contents = AbstractParser::getBodyContents($response);

        $this->assertEquals('test content', $contents);
    }

    public function testGetResponseWithCachingStreamForNonSeekable()
    {
        $body = $this->createNonSeekableStream('test content');
        $response = new Response(200, [], $body);

        $result = AbstractParser::getResponseWithCachingStream($response);

        $this->assertInstanceOf(CachingStream::class, $result->getBody());
    }

    public function testDoesNotWrapBodyInCachingStreamForSeekable()
    {
        $body = Utils::streamFor('test content');
        $response = new Response(200, [], $body);
        $result = AbstractParser::getResponseWithCachingStream($response);
        $this->assertSame($response, $result);
    }

    private function createNonSeekableStream(string $content): StreamInterface
    {
        $stream = $this->createMock(Stream::class);
        $stream->method('isSeekable')->willReturn(false);
        $stream->method('getContents')->willReturn($content);
        return $stream;
    }
}