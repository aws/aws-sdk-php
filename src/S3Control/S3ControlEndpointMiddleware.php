<?php
namespace Aws\S3Control;

use Aws\CommandInterface;
use GuzzleHttp\Exception\InvalidArgumentException;
use Psr\Http\Message\RequestInterface;

/**
 * Used to update the URL used for S3 Control requests to support S3 Control
 * DualStack. It will build to host style paths, including for S3 Control
 * DualStack.
 *
 * IMPORTANT: this middleware must be added after the "build" step.
 *
 * @internal
 */
class S3ControlEndpointMiddleware
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
     * @param array  $options
     *
     * @return callable
     */
    public static function wrap($region, array $options)
    {
        return function (callable $handler) use ($region, $options) {
            return new self($handler, $region, $options);
        };
    }

    public function __construct(
        callable $nextHandler,
        $region,
        array $options
    ) {
        $this->dualStackByDefault = isset($options['dual_stack'])
            ? (bool) $options['dual_stack'] : false;
        $this->region = (string) $region;
        $this->nextHandler = $nextHandler;
        $this->endpoint = isset($options['endpoint'])
            ? $options['endpoint'] : null;
    }

    public function __invoke(CommandInterface $command, RequestInterface $request)
    {
        if ($this->isDualStackRequest($command, $request)) {
            $request = $this->applyDualStackEndpoint($command, $request);
        } else if (!empty($this->endpoint)) {
            $uri = $request->getUri();
            $host = $uri->getHost() . $this->endpoint;
            $request = $request->withUri($uri->withHost($host));
        }

        $nextHandler = $this->nextHandler;
        return $nextHandler($command, $request);
    }

    private function isDualStackRequest(
        CommandInterface $command,
        RequestInterface $request
    ) {
        return isset($command['@use_dual_stack_endpoint'])
            ? $command['@use_dual_stack_endpoint'] : $this->dualStackByDefault;
    }

    private function getDualStackHost($host)
    {
        $parts = explode(".{$this->region}.", $host);
        $host = $parts[0] . ".dualstack.{$this->region}";
        if (sizeof($parts) > 1) {
            $host .= "." . $parts[1];
        }
        return $host;
    }

    private function applyDualStackEndpoint(
        CommandInterface $command,
        RequestInterface $request
    ) {
        $uri = $request->getUri();
        return $request->withUri(
            $uri->withHost($this->getDualStackHost(
                $uri->getHost()
            ))
        );
    }
}
