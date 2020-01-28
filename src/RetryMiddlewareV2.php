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
 * @internal Middleware that retries failures. V2 implementation that supports
 * 'standard' and 'adaptive' modes.
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

    public static function wrap($config, $decider, $delayer, $collectStats)
    {
        return function (callable $handler) use (
            $config,
            $decider,
            $delayer,
            $collectStats
        ) {
            return new static(
                $config,
                $handler,
                $decider,
                $delayer,
                $collectStats
            );
        };
    }

    public static function createDefaultDecider(
        QuotaManager $quotaManager,
        $maxAttempts = 3,
        $config = []
    ) {
        $retryCurlErrors = [];
        if (extension_loaded('curl')) {
            $retryCurlErrors[CURLE_RECV_ERROR] = true;
        }

        return function(
            $attempts,
            CommandInterface $command,
            $result = null
        ) use ($config, $quotaManager, $retryCurlErrors, $maxAttempts) {
            // Allow command-level option to override this value
            // # of attempts = # of retries + 1
            $maxAttempts = (null !== $command['@retries']) ?
                $command['@retries'] + 1
                : $maxAttempts;

            $isRetryable = self::isRetryable($result, $retryCurlErrors, $config);

            if (!$quotaManager->hasRetryQuota()) {
                return false;
            }

            if ($attempts >= $maxAttempts) {
                if (!empty($result)
                    && $result instanceof AwsException
                    && $isRetryable
                ) {
                    $result->setMaxRetriesExceeded();
                }
                return false;
            }

            return $isRetryable;
        };
    }

    public function __construct(
        ConfigurationInterface $config,
        callable $handler,
        callable $decider = null,
        callable $delayer = null,
        $collectStats = false,
        $additionalRetryConfig = []
    ) {
        $this->collectStats = (bool) $collectStats;
        $this->delayer = $delayer;
        $this->maxAttempts = $config->getMaxAttempts();
        $this->mode = $config->getMode();
        $this->nextHandler = $handler;
        $this->quotaManager = new QuotaManager();
        if (is_null($decider)) {
            $this->decider = self::createDefaultDecider(
                $this->quotaManager,
                $this->maxAttempts,
                $additionalRetryConfig
            );
        } else {
            $this->decider = $decider;
        }
        if (is_null($delayer)) {
            $this->delayer = function ($attempts) {
                return self::exponentialDelayWithJitter($attempts);
            };
        } else {
            $this->delayer = $delayer;
        }
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
        $additionalRetryConfig = []
    ) {
        $errorCodes = self::$standardThrottlingErrors + self::$standardTransientErrors;
        if (!empty($additionalRetryConfig['errorCodes'])
            && is_array($additionalRetryConfig['errorCodes'])
        ) {
            foreach($additionalRetryConfig['errorCodes'] as $code) {
                $errorCodes[$code] = true;
            }
        }

        $statusCodes = self::$standardTransientStatusCodes;
        if (!empty($additionalRetryConfig['statusCodes'])
            && is_array($additionalRetryConfig['statusCodes'])
        ) {
            foreach($additionalRetryConfig['statusCodes'] as $code) {
                $statusCodes[$code] = true;
            }
        }

        if (!empty($additionalRetryConfig['curlErrors'])
            && is_array($additionalRetryConfig['curlErrors'])
        ) {
            foreach($additionalRetryConfig['curlErrors'] as $code) {
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
