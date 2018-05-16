<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Psr\Http\Message\RequestInterface;


class ApiCallMonitoringMiddleware extends AbstractMonitoringMiddleware
{
    protected static function getDataConfiguration()
    {
        static $callDataConfig = [
//            [
//                'valueObject' => CommandInterface::class,
//                'valueLocation' => 'name',
//                'eventKey' => 'Api',
//            ],
        ];
        static $dataConfig;

        if (!$dataConfig) {
            $dataConfig = array_merge(
                $callDataConfig,
                parent::getDataConfiguration()
            );
        }
        return $dataConfig;
    }

    /**
     * Returns $eventData array with information from the request and command.
     *
     * @param CommandInterface $cmd
     * @param RequestInterface $request
     * @return array
     */
    protected function populateRequestEventData(
        CommandInterface $cmd,
        RequestInterface $request,
        array $event
    ) {
        $event = parent::populateRequestEventData($cmd, $request, $event);
        // Do local changes
        return $event;
    }

    /**
     * Returns $eventData array with information from the response, including the calculation
     * for attempt latency
     *
     * @param array $event
     * @param ResultInterface $result
     * @return array
     */
    protected function populateResponseEventData(
        ResultInterface $result,
        array $event
    ) {
        $event = parent::populateResponseEventData($result, $event);
        // Do local changes
        return $event;
    }
}