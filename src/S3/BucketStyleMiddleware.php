<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Used to change the style in which buckets are inserted in to the URL
 * (path or virtual style) based on the context.
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
    public static function create($bucketEndpoint = false)
    {
        return function (callable $handler) use ($bucketEndpoint) {
            $f = new self();
            $f->bucketEndpoint = $bucketEndpoint;
            $f->nextHandler = $handler;
            return $f;
        };
    }

    public function __invoke(CommandInterface $command)
    {
        $nextHandler = $this->nextHandler;
        $bucket = $command['Bucket'];

        if (!$bucket || isset(self::$exclusions[$command->getName()])) {
            return $nextHandler($command);
        }

        // In the first middleware, modify the request so that the host or
        // path is changed based on the bucket.
        $command->getRequestHandlerStack()->unshift(
            function (callable $handler) use ($command) {
                return function (RequestInterface $request, array $options) use ($command, $handler) {
                    return $handler($this->modifyRequest($request, $command), $options);
                };
            }
        );

        return $nextHandler($command);
    }

    private function removeBucketFromPath($path, $bucket)
    {
        return preg_replace("#^/{$bucket}#", "/", $path);
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
