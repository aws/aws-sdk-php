<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Aws\Exception\CouldNotCreateChecksumException;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;

/**
 * Apply required or optional MD5s to requests before sending.
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
    public static function create($calculateMd5)
    {
        return function (callable $handler) use ($calculateMd5) {
            return new self($handler, $calculateMd5);
        };
    }

    private function __construct(callable $nextHandler, $calculateMd5)
    {
        $this->nextHandler = $nextHandler;
        $this->byDefault = $calculateMd5;
    }

    public function __invoke(CommandInterface $command)
    {
        $name = $command->getName();
        $command->getRequestHandlerStack()->unshift(
            function (callable $handler) use ($name) {
                return function (
                    RequestInterface $request,
                    array $options
                ) use ($handler, $name) {
                    if (!$request->hasHeader('Content-MD5')
                        && $request->getBody()->getSize()
                    ) {
                        $request = $this->addMd5($name, $request);
                    }
                    return $handler($request, $options);
                };
            }
        );
        $next = $this->nextHandler;
        return $next($command);
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
                base64_encode(Utils::hash($body, 'md5', true))
            );
        }

        return $request;
    }
}
