<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Used to update the URL used for S3 requests to suport S3 Accelerate.
 *
 * IMPORTANT: this middleware must be added after the "build" step.
 *
 * @internal
 */
class AccelerateMiddleware
{
    private static $exclusions = [
        'CreateBucket' => true,
        'DeleteBucket' => true,
        'ListBuckets' => true,
    ];
    /** @var bool */
    private $accelerateByDefault;
    /** @var callable */
    private $nextHandler;

    /**
     * Create a middleware wrapper function.
     *
     * @param bool $accelerateByDefault
     *
     * @return callable
     */
    public static function wrap($accelerateByDefault = false)
    {
        return function (callable $handler) use ($accelerateByDefault) {
            return new self($handler, $accelerateByDefault);
        };
    }

    public function __construct(callable $nextHandler, $accelerateByDefault = false)
    {
        $this->accelerateByDefault = (bool) $accelerateByDefault;
        $this->nextHandler = $nextHandler;
    }

    public function __invoke(CommandInterface $command, RequestInterface $request)
    {
        if ($this->shouldAccelerate($command)) {
            $request = $request->withUri(
                $request->getUri()
                    ->withHost($this->getAccelerateHost($command))
                    ->withPath($this->getBucketlessPath(
                        $request->getUri()->getPath(),
                        $command
                    ))
            );
        }

        $nextHandler = $this->nextHandler;
        return $nextHandler($command, $request);
    }

    private function shouldAccelerate(CommandInterface $command)
    {
        if ($this->canAccelerate($command)) {
            return isset($command['@use_accelerate_endpoint'])
                ? $command['@use_accelerate_endpoint']
                : $this->accelerateByDefault;
        }

        return false;
    }

    private function canAccelerate(CommandInterface $command)
    {
        return empty(self::$exclusions[$command->getName()])
            && S3Client::isBucketDnsCompatible($command['Bucket']);
    }

    private function getAccelerateHost(CommandInterface $command)
    {
        return "{$command['Bucket']}.s3-accelerate.amazonaws.com";
    }

    private function getBucketlessPath($path, CommandInterface $command)
    {
        $pattern = '/^\\/' . preg_quote($command['Bucket'], '/') . '/';
        return preg_replace($pattern, '', $path) ?: '/';
    }
}
