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
                'AttemptCount' => [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => function (ResultInterface $result) {
                        return 1; // TODO get real value
                    }
                ],
                'Latency' => [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => function (ResultInterface $result) {
                        return 1; // TODO get real value
                    }
                ],
                'Type' => [
                    'valueAccessor' => function () {
                        return 'ApiCall';
                    }
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
