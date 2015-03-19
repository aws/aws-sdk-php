<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Used to change the style in which buckets are inserted in to the URL
 * (path or virtual style) based on the context.
 *
 * IMPORTANT: this middleware must be added after the "build" step.
 *
 * @internal
 */
class BucketStyleMiddleware
{
    private static $exclusions = ['GetBucketLocation' => true];
    private $bucketEndpoint;
    private $nextHandler;

    /**
     * Create a middleware wrapper function.
     *
     * @param bool $bucketEndpoint Set to true to send requests to a bucket
     *                             specific endpoint and not inject a bucket
     *                             in the request host or path.
     *
     * @return callable
     */
    public static function wrap($bucketEndpoint = false)
    {
        return function (callable $handler) use ($bucketEndpoint) {
            return new self($bucketEndpoint, $handler);
        };
    }

    public function __construct($bucketEndpoint, callable $nextHandler)
    {
        $this->bucketEndpoint = $bucketEndpoint;
        $this->nextHandler = $nextHandler;
    }

    public function __invoke(CommandInterface $command, RequestInterface $request)
    {
        $nextHandler = $this->nextHandler;
        $bucket = $command['Bucket'];

        if ($bucket && !isset(self::$exclusions[$command->getName()])) {
            $request = $this->modifyRequest($request, $command);
        }

        return $nextHandler($command, $request);
    }

    private function removeBucketFromPath($path, $bucket)
    {
        $len = strlen($bucket) + 1;
        if (substr($path, 0, $len) === "/{$bucket}") {
            $path = substr($path, $len);
        }

        return $path ?: '/';
    }

    private function modifyRequest(
        RequestInterface $request,
        CommandInterface $command
    ) {
        $uri = $request->getUri();
        $path = $uri->getPath();
        $bucket = $command['Bucket'];

        if ($this->bucketEndpoint) {
            $path = $this->removeBucketFromPath($path, $bucket);
        } elseif (!$command['PathStyle']
            && S3Client::isBucketDnsCompatible($bucket)
            && !($uri->getScheme() == 'https' && strpos($bucket, '.'))
        ) {
            // Switch to virtual if PathStyle is disabled, or not a DNS
            // compatible bucket name, or the scheme is https and there are no
            // dots in the hostheader (avoids SSL issues).
            $uri = $uri->withHost($bucket . '.' . $uri->getHost());
            $path = $this->removeBucketFromPath($path, $bucket);
        }

        // Modify the Key to make sure the key is encoded, but slashes are not.
        if ($command['Key']) {
            $path = S3Client::encodeKey(rawurldecode($path));
        }

        return $request->withUri($uri->withPath($path));
    }
}
