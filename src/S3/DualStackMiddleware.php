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
    /** @var bool */
    private $dualStackByDefault;
    /** @var string */
    private $region;
    /** @var callable */
    private $nextHandler;

    /**
     * Create a middleware wrapper function
     *
     * @param string $region
     * @param bool $dualStackByDefault
     *
     * @return callable
     */
    public static function wrap($region, $dualStackByDefault = false)
    {
        return function (callable $handler) use ($dualStackByDefault, $region) {
          return new self($handler, $region, $dualStackByDefault);
        };
    }

    public function __construct(callable $nextHandler, $region, $dualStackByDefault = false)
    {
        $this->dualStackByDefault = (bool) $dualStackByDefault;
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
        return isset($command['@use_dual_stack_endpoint'])
            ? $command['@use_dual_stack_endpoint']
            : $this->dualStackByDefault;
    }

    private function getDualStackHost()
    {
        return "s3.dualstack.{$this->region}.amazonaws.com";
    }
}
