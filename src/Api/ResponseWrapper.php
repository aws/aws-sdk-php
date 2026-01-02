<?php

namespace Aws\Api;

use GuzzleHttp\Psr7\CachingStream;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Wrapper response class that makes sure a stream is always
 * readable since the beginning. When a stream is non-seekable then
 * we wrapper it into a caching stream that will allow the stream
 * to rewind.
 *
 * @internal
 */
final class ResponseWrapper extends Response
{
    public function __construct(ResponseInterface $response)
    {
        $body = $response->getBody();
        if (!$body->isSeekable()) {
            $body = new CachingStream($response->getBody());
        }

        parent::__construct(
            $response->getStatusCode(),
            $response->getHeaders(),
            $body,
            $response->getProtocolVersion(),
            $response->getReasonPhrase()
        );
    }

    /**
     * @return StreamInterface
     */
    public function getBody(): StreamInterface
    {
        $stream = parent::getBody();
        $stream->rewind();

        return $stream;
    }
}
