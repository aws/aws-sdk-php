<?php

namespace Aws\ClientSideMonitoring;

use Aws\ResultInterface;

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
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => function (ResultInterface $result) {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'AttemptCount',
                ],
                [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => function (ResultInterface $result) {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'Latency',
                ],
                [
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
    protected function populateResultEventData(
        ResultInterface $result,
        array $event
    ) {
        $event = parent::populateResultEventData($result, $event);
        unset($event['Region']);
        return $event;
    }
}
