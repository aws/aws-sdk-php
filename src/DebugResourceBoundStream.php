<?php
namespace Aws;

use GuzzleHttp\Psr7\StreamDecoratorTrait;
use Psr\Http\Message\StreamInterface;

/**
 * PSR-7 stream decorator that owns a secondary "debug" resource and keeps it
 * open for the lifetime of the decorated body.
 *
 * {@see TraceMiddleware} hands the resource it allocated for HTTP-level debug
 * output to this decorator whenever the response body is streamed
 * (`@http.stream = true`). Guzzle's StreamHandler captures that resource in a
 * stream_notification callback that fires on every read of the body, so the
 * resource must outlive the middleware chain — closing it eagerly triggered
 * "fprintf(): supplied resource is not a valid stream resource"
 *
 * The resource is closed exactly once when the body is closed or destroyed.
 *
 * @internal
 */
final class DebugResourceBoundStream implements StreamInterface
{
    use StreamDecoratorTrait;

    /** @var StreamInterface */
    private $stream;

    /** @var resource|null */
    private $debugResource;

    /**
     * @param StreamInterface $stream         Underlying response body.
     * @param resource        $debugResource  Open php://temp resource still
     *                                        referenced by the HTTP adapter's
     *                                        stream notification callback.
     */
    public function __construct(StreamInterface $stream, $debugResource)
    {
        $this->stream = $stream;
        $this->debugResource = $debugResource;
    }

    public function close(): void
    {
        $this->stream->close();
        $this->releaseDebugResource();
    }

    public function __destruct()
    {
        $this->releaseDebugResource();
    }

    private function releaseDebugResource(): void
    {
        if (is_resource($this->debugResource)) {
            @fclose($this->debugResource);
        }
        $this->debugResource = null;
    }
}
