<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\MonitoringEventsInterface;
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
    public static function getRequestDataConfiguration()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public static function getResponseDataConfiguration()
    {
        return [
            'AttemptCount' => [
                'valueAccessors' => [
                    ResultInterface::class => function (ResultInterface $result) {
                        if (isset($result['@metadata']['transferStats']['http'])) {
                            return count($result['@metadata']['transferStats']['http']);
                        }
                        return 1;
                    },
                    \Exception::class => function(\Exception $exception) {
                        $attemptCount = 0;
                        if ($exception instanceof MonitoringEventsInterface) {
                            foreach ($exception->getMonitoringEvents() as $event) {
                                if (isset($event['Type']) &&
                                    $event['Type'] === 'ApiCallAttempt') {
                                    $attemptCount++;
                                }
                            }

                        }
                        return $attemptCount;
                    }
                ],
            ],
        ];
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
        $event['Latency'] = (int) (floor(microtime(true) * 1000) - $event['Timestamp']);
        unset($event['Region']);
        return $event;
    }
}
