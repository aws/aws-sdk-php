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
     * Standard middleware wrapper function with CSM options passed in.
     *
     * @param callable $credentialProvider
     * @param mixed  $options
     * @param string $region
     * @param string $service
     * @return callable
     */
    public static function wrap(
        callable $credentialProvider,
        $options,
        $region,
        $service
    ) {
        return function (callable $handler) use (
            $credentialProvider,
            $options,
            $region,
            $service
        ) {
            return new static(
                $handler,
                $credentialProvider,
                $options,
                $region,
                $service
            );
        };
    }

    /**
     * {@inheritdoc}
     */
    public static function getRequestData(RequestInterface $request)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getResponseData($klass)
    {
        if ($klass instanceof ResultInterface) {
            return [
                'AttemptCount' => self::getResultAttemptCount($klass),
                'MaxRetriesExceeded' => 0,
            ];
        }

        if ($klass instanceof \Exception) {
            return [
                'AttemptCount' => self::getExceptionAttemptCount($klass),
                'MaxRetriesExceeded' => self::getMaxRetriesExceeded($klass),
            ];
        }

        throw new \InvalidArgumentException('Parameter must be an instance of ResultInterface or Exception.');
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

    private static function getMaxRetriesExceeded($klass)
    {
        if ($klass instanceof AwsException && $klass->isMaxRetriesExceeded()) {
            return 1;
        }
        return 0;
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    protected function populateResultEventData(
        $result,
        array $event
    ) {
        $event = parent::populateResultEventData($result, $event);
        $event['Latency'] = (int) (floor(microtime(true) * 1000) - $event['Timestamp']);
        return $event;
    }
}
