<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Psr\Http\Message\RequestInterface;

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
                    'valueAccessor' => [
                        ResultInterface::class => function (ResultInterface $result) {
                            if (isset($result['@metadata']['transferStats']['http'])) {
                                return count($result['@metadata']['transferStats']['http']);
                            }
                            return null;
                        }
                    ]
                ],
                'Latency' => [
                    'valueAccessor' => [
                        ResultInterface::class => function (ResultInterface $result) {
                            return null; // TODO get real value
                        }
                    ]
                ],
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
    protected function populateRequestEventData(
        CommandInterface $cmd,
        RequestInterface $request,
        array $event
    ) {
        $event = parent::populateRequestEventData($cmd, $request, $event);
        $event['Type'] = 'ApiCall';
        return $event;
    }

    /**
     * @inheritdoc
     */
    protected function populateResultEventData(
        $result,
        array $event
    ) {
        $event = parent::populateResultEventData($result, $event);
        unset($event['Region']);
        return $event;
    }
}
