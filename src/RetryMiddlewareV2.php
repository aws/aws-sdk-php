<?php
namespace Aws;

use Aws\Retry\ConfigurationInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @internal Middleware that retries failures. V2 implementation that supports
 * 'standard' and 'adaptive' modes.
 */
class RetryMiddlewareV2
{
    private $maxAttempts;
    private $mode;
    private $nextHandler;

    public static function wrap($config)
    {
        return function (callable $handler) use ($config) {
            return new static($handler, $config);
        };
    }

    public function __construct(callable $handler, ConfigurationInterface $config)
    {
        $this->nextHandler = $handler;
        $this->mode = $config->getMode();
        $this->maxAttempts = $config->getMaxAttempts();
    }

    public function __invoke(CommandInterface $cmd, RequestInterface $request)
    {
        $nextHandler = $this->nextHandler;
        return $nextHandler($cmd, $request);
    }
}
