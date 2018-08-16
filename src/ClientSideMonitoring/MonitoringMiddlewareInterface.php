<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @internal
 */
interface MonitoringMiddlewareInterface
{

    /**
     * Data format for event properties to be sent to the monitoring agent.
     *
     * Associative array of associative arrays in the format:
     *     $eventKey => [
     *         'valueAccessors' => [class => callable, ...]
     *         'maxLength' => int
     *     ]
     *
     * Callable functions in valueAccessors should take the form of:
     *     function($command, $request)
     * with the valueAccessors key type hinted in the anonymous function.
     *
     * @param RequestInterface $request
     * @return array
     */
    public static function getRequestData(RequestInterface $request);


    /**
     * Data format for event properties to be sent to the monitoring agent.
     *
     * Associative array of associative arrays in the format:
     *     $eventKey => [
     *         'valueAccessors' => [class => callable, ...]
     *         'maxLength' => int
     *     ]
     * @return array
     */
    public static function getResponseDataConfiguration($klass);

    public function __invoke(CommandInterface $cmd, RequestInterface $request);
}