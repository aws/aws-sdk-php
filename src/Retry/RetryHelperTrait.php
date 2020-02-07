<?php
namespace Aws\Retry;

use Aws\Exception\AwsException;
use Aws\ResultInterface;

trait RetryHelperTrait
{
    private static $standardThrottlingErrors = [
        'Throttling'                                => true,
        'ThrottlingException'                       => true,
        'ThrottledException'                        => true,
        'RequestThrottledException'                 => true,
        'TooManyRequestsException'                  => true,
        'ProvisionedThroughputExceededException'    => true,
        'TransactionInProgressException'            => true,
        'RequestLimitExceeded'                      => true,
        'BandwidthLimitExceeded'                    => true,
        'LimitExceededException'                    => true,
        'RequestThrottled'                          => true,
        'SlowDown'                                  => true,
        'PriorRequestNotComplete'                   => true,
        'EC2ThrottledException'                     => true,
    ];

    private static $standardTransientErrors = [
        'RequestTimeout'            => true,
        'RequestTimeoutException'   => true,
    ];

    private static $standardTransientStatusCodes = [
        500 => true,
        502 => true,
        503 => true,
        504 => true,
    ];

    private function addRetryHeader($request, $retries, $delayBy)
    {
        return $request->withHeader('aws-sdk-retry', "{$retries}/{$delayBy}");
    }


    private function updateStats($retries, $delay, array &$stats)
    {
        if (!isset($stats['total_retry_delay'])) {
            $stats['total_retry_delay'] = 0;
        }

        $stats['total_retry_delay'] += $delay;
        $stats['retries_attempted'] = $retries;
    }

    private function updateHttpStats($value, array &$stats)
    {
        if (empty($stats['http'])) {
            $stats['http'] = [];
        }

        if ($value instanceof AwsException) {
            $resultStats = isset($value->getTransferInfo('http')[0])
                ? $value->getTransferInfo('http')[0]
                : [];
            $stats['http'] []= $resultStats;
        } elseif ($value instanceof ResultInterface) {
            $resultStats = isset($value['@metadata']['transferStats']['http'][0])
                ? $value['@metadata']['transferStats']['http'][0]
                : [];
            $stats['http'] []= $resultStats;
        }
    }

    private function bindStatsToReturn($return, array $stats)
    {
        if ($return instanceof ResultInterface) {
            if (!isset($return['@metadata'])) {
                $return['@metadata'] = [];
            }

            $return['@metadata']['transferStats'] = $stats;
        } elseif ($return instanceof AwsException) {
            $return->setTransferInfo($stats);
        }

        return $return;
    }
}
