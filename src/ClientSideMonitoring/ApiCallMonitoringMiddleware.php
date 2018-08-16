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
    public static function getResponseDataConfiguration($klass)
    {
        if ($klass instanceof ResultInterface) {
            return self::getResultResponseData($klass);
        }

        if ($klass instanceof \Exception) {
            return self::getExceptionResponseData($klass);
        }
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

    private static function getResultResponseData($klass)
    {
        return [
            'AttemptCount' => [
                'value' => self::getResultAttemptCount($klass),
            ],
        ];
    }

    private static function getExceptionResponseData($klass)
    {
        return [
            'AttemptCount' => [
                'value' => self::getExceptionAttemptCount($klass),
            ],
        ];
    }

    private static function getResultAttemptCount(ResultInterface $result) {
        if (isset($result['@metadata']['transferStats']['http'])) {
            return count($result['@metadata']['transferStats']['http']);
        }
        return 1;
    }

    private static function getExceptionAttemptCount(\Exception $e) {
        $attemptCount = 0;
        if ($e instanceof MonitoringEventsInterface) {
            foreach ($e->getMonitoringEvents() as $event) {
                if (isset($event['Type']) &&
                    $event['Type'] === 'ApiCallAttempt') {
                    $attemptCount++;
                }
            }

        }
        return $attemptCount;
    }
}
