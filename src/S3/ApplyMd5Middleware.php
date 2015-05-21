<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Aws\Exception\CouldNotCreateChecksumException;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * Apply required or optional MD5s to requests before sending.
 *
 * IMPORTANT: This middleware must be added after the "build" step.
 *
 * @internal
 */
class ApplyMd5Middleware
{
    private static $requireMd5 = [
        'DeleteObjects',
        'PutBucketCors',
        'PutBucketLifecycle',
        'PutBucketPolicy',
        'PutBucketTagging',
    ];

    private $nextHandler;

    /**
     * Create a middleware wrapper function.
     *
     * @return callable
     */
    public static function wrap()
    {
        return function (callable $handler) {
            return new self($handler);
        };
    }

    public function __construct(callable $nextHandler)
    {
        $this->nextHandler = $nextHandler;
    }

    public function __invoke(
        CommandInterface $command,
        RequestInterface $request
    ) {
        $name = $command->getName();
        $body = $request->getBody();
        if (!$request->hasHeader('Content-MD5')
            && $body->getSize()
            && in_array($name, self::$requireMd5)
        ) {
            $request = $request->withHeader(
                'Content-MD5',
                base64_encode(Psr7\hash($body, 'md5', true))
            );
        }

        $next = $this->nextHandler;
        return $next($command, $request);
    }
}
