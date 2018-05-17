<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
class ApiCallMonitoringMiddleware extends AbstractMonitoringMiddleware
{
    /**
     * @inheritdoc
     */
    public static function getDataConfiguration()
    {
        static $callDataConfig;
        if (empty($callDataConfig)) {
            $callDataConfig = [
                [
                    'valueObject' => ResponseInterface::class,
                    'valueAccessor' => function (ResponseInterface $response) {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'AttemptCount',
                ],
                [
                    'valueObject' => ResponseInterface::class,
                    'valueAccessor' => function (ResponseInterface $response) {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'Latency',
                ],
                [
                    'valueObject' => null,
                    'valueAccessor' => function () {
                        return 'ApiCall';
                    },
                    'eventKey' => 'Type',
                ]
            ];
        }

        static $dataConfig;
        if (empty($dataConfig)) {
            $dataConfig = array_merge(
                $callDataConfig,
                parent::getDataConfiguration()
            );
        }

        return $dataConfig;
    }

    /**
     * @inheritdoc
     */
    protected function populateResponseEventData(
        ResultInterface $result,
        array $event
    ) {
        $event = parent::populateResponseEventData($result, $event);
        unset($event['AccessKey'], $event['Region']);
        return $event;
    }
}
