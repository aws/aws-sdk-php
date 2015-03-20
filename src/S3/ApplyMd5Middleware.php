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
    ];

    private static $canMd5 = [
        'PutObject',
        'UploadPart'
    ];

    private $nextHandler;
    private $byDefault;

    /**
     * Create a middleware wrapper function.
     *
     * @param bool $calculateMd5 Set to true to calculate optional MD5 hashes.
     *
     * @return callable
     */
    public static function wrap($calculateMd5)
    {
        return function (callable $handler) use ($calculateMd5) {
            return new self($calculateMd5, $handler);
        };
    }

    public function __construct($calculateMd5, callable $nextHandler)
    {
        $this->nextHandler = $nextHandler;
        $this->byDefault = $calculateMd5;
    }

    public function __invoke(
        CommandInterface $command,
        RequestInterface $request
    ) {
        $name = $command->getName();

        if (!$request->hasHeader('Content-MD5')
            && $request->getBody()->getSize()
        ) {
            $request = $this->addMd5($name, $request);
        }

        $next = $this->nextHandler;
        return $next($command, $request);
    }

    private function addMd5($name, RequestInterface $request)
    {
        // If and MD5 is required or enabled, add one.
        $optional = $this->byDefault && in_array($name, self::$canMd5);

        if (in_array($name, self::$requireMd5) || $optional) {
            $body = $request->getBody();
            // Throw exception is calculating and MD5 would result in an error.
            if (!$body->isSeekable()) {
                throw new CouldNotCreateChecksumException('md5');
            }
            return $request->withHeader(
                'Content-MD5',
                base64_encode(Psr7\hash($body, 'md5', true))
            );
        }

        return $request;
    }
}
