<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Psr\Http\Message\RequestInterface;


class ApiCallMonitoringMiddleware extends AbstractMonitoringMiddleware
{

    /**
     * Returns $eventData array with information from the request and command.
     *
     * @param CommandInterface $cmd
     * @param RequestInterface $request
     * @return array
     */
    protected function populateRequestEventData(CommandInterface $cmd, RequestInterface $request)
    {
        return [];
    }


    /**
     * Returns $eventData array with information from the response, including the calculation
     * for attempt latency
     *
     * @param array $eventData
     * @param ResultInterface $result
     * @return array
     */
    protected function populateResponseEventData(array $eventData, ResultInterface $result)
    {
        return $eventData;
    }


    /**
     * Serializes the event data with string length limitations, returning a JSON-formatted string.
     *
     * @param array $eventData
     * @return string
     */
    protected function serializeEventData(array $eventData)
    {
        return '';
    }

}