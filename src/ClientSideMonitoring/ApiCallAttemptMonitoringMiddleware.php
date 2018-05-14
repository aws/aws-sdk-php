<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Psr\Http\Message\RequestInterface;


class ApiCallAttemptMonitoringMiddleware extends AbstractMonitoringMiddleware
{

    /**
     * Data format for event properties to be sent to the monitoring agent.
     *
     * Associative array in the format:
     * - eventKey => subarray
     *
     *     Subarray keys:
     *     - 'objectType' => 'command|request|response'
     *     - 'objectKey' => string (or JMESPath expression for response object)
     *     - 'eventKey' => string
     *     - 'maxLength' => int|null
     *
     * @var array
     * @todo Populate with all data that fit the pattern
     */
    protected $dataFormat = [];


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

}