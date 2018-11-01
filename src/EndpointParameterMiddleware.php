<?php
namespace Aws;

use Aws\Api\Service;
use Psr\Http\Message\RequestInterface;

/**
 * Used to update the host based on a modeled endpoint trait
 *
 * IMPORTANT: this middleware must be added after the "build" step.
 *
 * @internal
 */
class EndpointParameterMiddleware
{

    /**
     * Create a middleware wrapper function
     *
     * @param Service $service
     * @param $region
     * @return \Closure
     */
    public static function wrap(Service $service, $region)
    {
        return function (callable $handler) use ($region, $service) {
            return new self($handler, $region, $service);
        };
    }

    public function __construct(callable $nextHandler, $region, Service $service)
    {
        $this->nextHandler = $nextHandler;
        $this->region = (string) $region;
        $this->service = $service;
    }

    public function __invoke(CommandInterface $command, RequestInterface $request)
    {
        $nextHandler = $this->nextHandler;
        $operation = $this->service->getOperation($command->getName());

        if (!empty($operation['endpoint']['host'])) {
            $host = $operation['endpoint']['host'];
            preg_match_all("/\{([a-zA-Z0-9]+)}/", $host, $parameters);

            if (!empty($parameters[1])) {
                foreach ($parameters[1] as $index => $parameter) {
                    if (empty($command[$parameter])) {
                        throw new \InvalidArgumentException("The parameter '{$parameter}' must be set and not empty.");
                    }
                    $host = str_replace(
                        $parameters[0][$index],
                        $command[$parameter],
                        $host
                    );
                }
            }

            $uri = $request->getUri();
            $host = str_replace('{@}', $uri->getHost(), $host);
            $request = $request->withUri($uri->withHost($host));
        }

        return $nextHandler($command, $request);
    }
}
