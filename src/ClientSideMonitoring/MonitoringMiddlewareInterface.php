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
     * @return array
     */
    public static function getRequestDataConfiguration();


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
    public static function getResponseDataConfiguration();

    public function __invoke(CommandInterface $cmd, RequestInterface $request);
}