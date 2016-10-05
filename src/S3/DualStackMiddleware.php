<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Dual Stack Endpoints enables customers to access AWS services with IPv6
 *
 * @internal
 */
class DualStackMiddleware
{
    private static $exclusions = [
        'CreateBucket' => true,
        'DeleteBucket' => true,
        'ListBuckets' => true,
    ];
    /** @var bool */
    private $dualStackByDefault;
    /** @var bool */
    private $accelerateByDefault;
    /** @var string */
    private $region;
    /** @var callable */
    private $nextHandler;

    /**
     * Create a middleware wrapper function
     *
     * @param string $region
     * @param bool $dualStackByDefault
     * @param bool $accelerateByDefault
     *
     * @return callable
     */
    public static function wrap($region, $dualStackByDefault = false, $accelerateByDefault = false)
    {
        return function (callable $handler) use ($dualStackByDefault, $region, $accelerateByDefault) {
          return new self($handler, $region, $dualStackByDefault, $accelerateByDefault);
        };
    }

    public function __construct(
        callable $nextHandler,
        $region,
        $dualStackByDefault = false,
        $accelerateByDefault = false
    ) {
        $this->dualStackByDefault = (bool) $dualStackByDefault;
        $this->accelerateByDefault = (bool) $accelerateByDefault;
        $this->region = (string) $region;
        $this->nextHandler = $nextHandler;
    }

    public function __invoke(CommandInterface $command, RequestInterface $request)
    {
        if ($this->shouldApplyDualStack($command)) {
            $request = $request->withUri(
                $request->getUri()
                    ->withHost($this->getDualStackHost())
            );
        }

        $nextHandler = $this->nextHandler;
        return $nextHandler($command, $request);
    }

    private function shouldApplyDualStack(CommandInterface $command)
    {
        $accelerateEnabled = isset($command['@use_accelerate_endpoint'])
                            ? $command['@use_accelerate_endpoint']
                            : $this->accelerateByDefault;
        $accelerateSucceed = $accelerateEnabled
                            && empty(self::$exclusions[$command->getName()])
                            && S3Client::isBucketDnsCompatible($command['Bucket']);
        if ($accelerateSucceed) {
            // If accelerate succeeds, enabled dual_stack at same time is already taken of
            return false;
        }

        return isset($command['@use_dual_stack_endpoint'])
            ? $command['@use_dual_stack_endpoint']
            : $this->dualStackByDefault;
    }

    private function getDualStackHost()
    {
        return "s3.dualstack.{$this->region}.amazonaws.com";
    }
}
