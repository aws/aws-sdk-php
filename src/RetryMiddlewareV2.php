<?php
namespace Aws;

use Aws\Exception\AwsException;
use Aws\Retry\ConfigurationInterface;
use Aws\Retry\QuotaManager;
use Aws\Retry\RetryHelperTrait;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use Psr\Http\Message\RequestInterface;

/**
 * Middleware that retries failures. V2 implementation that supports 'standard'
 * and 'adaptive' modes.
 *
 * @internal
 */
class RetryMiddlewareV2
{
    use RetryHelperTrait;

    const MAX_BACKOFF = 20;

    private $collectStats;
    private $decider;
    private $delayer;
    private $maxAttempts;
    private $mode;
    private $nextHandler;
    private $quotaManager;

    public static function wrap($config, $decider, $delayer, $extraConfig)
    {
        return function (callable $handler) use (
            $config,
            $decider,
            $delayer,
            $extraConfig
        ) {
            return new static(
                $config,
                $handler,
                $decider,
                $delayer,
                $extraConfig
            );
        };
    }

    public static function createDefaultDecider(
        QuotaManager $quotaManager,
        $maxAttempts = 3,
        $extraConfig = []
    ) {
        $retryCurlErrors = [];
        if (extension_loaded('curl')) {
            $retryCurlErrors[CURLE_RECV_ERROR] = true;
        }

        return function(
            $attempts,
            CommandInterface $command,
            $result
        ) use ($extraConfig, $quotaManager, $retryCurlErrors, $maxAttempts) {

            // Release retry tokens back to quota on a successful result
            $quotaManager->releaseToQuota($result);

            // Allow command-level option to override this value
            // # of attempts = # of retries + 1
            $maxAttempts = (null !== $command['@retries'])
                ? $command['@retries'] + 1
                : $maxAttempts;

            $isRetryable = self::isRetryable(
                $result,
                $retryCurlErrors,
                $extraConfig
            );

            if ($isRetryable) {

                // Retrieve retry tokens and check if quota has been exceeded
                if (!$quotaManager->hasRetryQuota($result)) {
                    return false;
                }

                if ($attempts >= $maxAttempts) {
                    if (!empty($result) && $result instanceof AwsException) {
                        $result->setMaxRetriesExceeded();
                    }
                    return false;
                }
            }

            return $isRetryable;
        };
    }

    public function __construct(
        ConfigurationInterface $config,
        callable $handler,
        callable $decider = null,
        callable $delayer = null,
        $extraConfig = []
    ) {
        $this->delayer = $delayer;
        $this->maxAttempts = $config->getMaxAttempts();
        $this->mode = $config->getMode();
        $this->nextHandler = $handler;
        $this->quotaManager = new QuotaManager();
        $this->collectStats = isset($extraConfig['collect_stats'])
            ? (bool) $extraConfig['collect_stats']
            : false;
        $this->decider = is_null($decider)
            ? self::createDefaultDecider(
                $this->quotaManager,
                $this->maxAttempts,
                $extraConfig
              )
            : $decider;
        $this->delayer = is_null($delayer)
            ? function ($attempts) {
                return self::exponentialDelayWithJitter($attempts);
              }
            : $delayer;
    }

    public function __invoke(CommandInterface $cmd, RequestInterface $req)
    {
        $decider = $this->decider;
        $delayer = $this->delayer;
        $handler = $this->nextHandler;

        $attempts = 1;
        $monitoringEvents = [];
        $requestStats = [];

        $req = $this->addRetryHeader($req, 0, 0);

        $callback = function ($value) use (
            $handler,
            $cmd,
            $req,
            $decider,
            $delayer,
            &$attempts,
            &$requestStats,
            &$monitoringEvents,
            &$callback
        ) {
            $this->updateHttpStats($value, $requestStats);

            if ($value instanceof MonitoringEventsInterface) {
                $reversedEvents = array_reverse($monitoringEvents);
                $monitoringEvents = array_merge($monitoringEvents, $value->getMonitoringEvents());
                foreach ($reversedEvents as $event) {
                    $value->prependMonitoringEvent($event);
                }
            }
            if ($value instanceof \Exception || $value instanceof \Throwable) {
                if (!$decider($attempts, $cmd, $value)) {
                    return Promise\rejection_for(
                        $this->bindStatsToReturn($value, $requestStats)
                    );
                }
            } elseif ($value instanceof ResultInterface
                && !$decider($attempts, $cmd, $value)
            ) {
                return $this->bindStatsToReturn($value, $requestStats);
            }

            $delayBy = $delayer($attempts++);
            $command['@http']['delay'] = $delayBy;
            if ($this->collectStats) {
                $this->updateStats($attempts, $delayBy, $requestStats);
            }

            // Update retry header with retry count and delayBy
            $req = $this->addRetryHeader($req, $attempts, $delayBy);

            return $handler($cmd, $req)->then($callback, $callback);
        };

        return $handler($cmd, $req)->then($callback, $callback);
    }

    public function exponentialDelayWithJitter($attempts)
    {
        $rand = mt_rand() / mt_getrandmax();
        return min($rand * pow(2, $attempts) , self::MAX_BACKOFF);
    }

    private static function isRetryable(
        $result,
        $retryCurlErrors,
        $extraConfig = []
    ) {
        $errorCodes = self::$standardThrottlingErrors + self::$standardTransientErrors;
        if (!empty($extraConfig['errorCodes'])
            && is_array($extraConfig['errorCodes'])
        ) {
            foreach($extraConfig['errorCodes'] as $code) {
                $errorCodes[$code] = true;
            }
        }

        $statusCodes = self::$standardTransientStatusCodes;
        if (!empty($extraConfig['statusCodes'])
            && is_array($extraConfig['statusCodes'])
        ) {
            foreach($extraConfig['statusCodes'] as $code) {
                $statusCodes[$code] = true;
            }
        }

        if (!empty($extraConfig['curlErrors'])
            && is_array($extraConfig['curlErrors'])
        ) {
            foreach($extraConfig['curlErrors'] as $code) {
                $retryCurlErrors[$code] = true;
            }
        }

        if ($result instanceof \Exception || $result instanceof \Throwable) {
            $isError = true;
        } else {
            $isError = false;
        }

        if (!$isError) {
            if (!isset($result['@metadata']['statusCode'])) {
                return false;
            }
            return isset($statusCodes[$result['@metadata']['statusCode']]);
        }

        if (!($result instanceof AwsException)) {
            return false;
        }

        if ($result->isConnectionError()) {
            return true;
        }

        if (!empty($errorCodes[$result->getAwsErrorCode()])) {
            return true;
        }

        if (!empty($statusCodes[$result->getStatusCode()])) {
            return true;
        }

        if (count($retryCurlErrors)
            && ($previous = $result->getPrevious())
            && $previous instanceof RequestException
        ) {
            if (method_exists($previous, 'getHandlerContext')) {
                $context = $previous->getHandlerContext();
                return !empty($context['errno'])
                    && isset($retryCurlErrors[$context['errno']]);
            }

            $message = $previous->getMessage();
            foreach (array_keys($retryCurlErrors) as $curlError) {
                if (strpos($message, 'cURL error ' . $curlError . ':') === 0) {
                    return true;
                }
            }
        }

        return false;
    }
}
