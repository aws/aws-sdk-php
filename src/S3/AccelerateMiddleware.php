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
    /** @var bool */
    private $dualStackByDefault;
    /** @var callable */
    private $nextHandler;

    /**
     * Create a middleware wrapper function.
     *
     * @param bool $accelerateByDefault
     * @param bool $dualStackByDefault
     *
     * @return callable
     */
    public static function wrap($accelerateByDefault = false, $dualStackByDefault = false)
    {
        return function (callable $handler) use ($accelerateByDefault, $dualStackByDefault) {
            return new self($handler, $accelerateByDefault, $dualStackByDefault);
        };
    }

    public function __construct(
        callable $nextHandler,
        $accelerateByDefault = false,
        $dualStackByDefault = false
    ) {
        $this->accelerateByDefault = (bool) $accelerateByDefault;
        $this->dualStackByDefault = (bool) $dualStackByDefault;
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
        $shouldApplyDualStack = isset($command['@use_dual_stack_endpoint'])
            ? $command['@use_dual_stack_endpoint']
            : $this->dualStackByDefault;
        $pattern = $shouldApplyDualStack ? "s3-accelerate.dualstack" : "s3-accelerate";

        return "{$command['Bucket']}.{$pattern}.amazonaws.com";
    }

    private function getBucketlessPath($path, CommandInterface $command)
    {
        $pattern = '/^\\/' . preg_quote($command['Bucket'], '/') . '/';
        return preg_replace($pattern, '', $path) ?: '/';
    }
}
