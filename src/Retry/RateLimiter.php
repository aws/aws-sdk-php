<?php
namespace Aws\Retry;


/**
 * @internal
 */
class RateLimiter
{
    // User-configurable constants
    private $beta;
    private $minCapacity;
    private $minFillRate;
    private $scaleConstant;
    private $smooth;

    // Pre-set state variables
    private $currentCapacity = 0;
    private $enabled = false;
    private $lastMaxRate = 0;
    private $measuredTxRate = 0;
    private $requestCount = 0;

    // Other state variables
    private $fillRate;
    private $lastThrottleTime;
    private $lastTimestamp;
    private $lastTxRateBucket;
    private $maxCapacity;
    private $timeWindow;

    public function __construct($options = [])
    {
        $this->beta = isset($options['beta'])
            ? $options['beta']
            : 0.7;
        $this->minCapacity = isset($options['min_capacity'])
            ? $options['min_capacity']
            : 1;
        $this->minFillRate = isset($options['min_fill_rate'])
            ? $options['min_fill_rate']
            : 0.5;
        $this->scaleConstant = isset($options['scale_constant'])
            ? $options['scale_constant']
            : 0.4;
        $this->smooth = isset($options['smooth'])
            ? $options['smooth']
            : 0.8;

        $this->lastTxRateBucket = floor(microtime(true));
        $this->lastThrottleTime = microtime(true);
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    public function getSendToken()
    {
        $this->acquireToken(1);
    }

    public function updateSendingRate($isThrottled)
    {
        $this->updateMeasuredRate();

        if ($isThrottled) {
            if (!$this->enabled) {
                $rateToUse = $this->measuredTxRate;
            } else {
                $rateToUse = min($this->measuredTxRate, $this->fillRate);
            }

            $this->lastMaxRate = $rateToUse;
            $this->calculateTimeWindow();
            $this->lastThrottleTime = microtime(true);
            $calculatedRate = $this->cubicThrottle($rateToUse);
            $this->enableTokenBucket();
        } else {
            $calculatedRate = $this->cubicSuccess(microtime(true));
        }

        $this->updateTokenBucketRate(min($calculatedRate, 2 * $this->measuredTxRate));
    }

    private function acquireToken($amount)
    {
        if (!$this->enabled) {
            return true;
        }

        $this->refillTokenBucket();

        if ($amount > $this->currentCapacity) {
            usleep(($amount - $this->currentCapacity) / $this->fillRate);
        }

        $this->currentCapacity -= $amount;

        return true;
    }

    private function calculateTimeWindow()
    {
        $this->timeWindow = pow(($this->lastMaxRate * (1 - $this->beta) / $this->scaleConstant), 1/3);
    }

    private function cubicSuccess($timestamp)
    {
        $dt = $timestamp - $this->lastThrottleTime;
        return $this->scaleConstant * pow($dt - $this->timeWindow, 3) + $this->lastMaxRate;
    }

    private function cubicThrottle($rateToUse)
    {
        return $rateToUse * $this->beta;
    }

    private function enableTokenBucket()
    {
        $this->enabled = true;
    }

    private function refillTokenBucket()
    {
        $timestamp = microtime(true);
        if (!isset($this->lastTimestamp)) {
            $this->lastTimestamp = $timestamp;
        }
        $fillAmount = ($timestamp - $this->lastTimestamp) * $this->fillRate;
        $this->currentCapacity = min(
            $this->maxCapacity,
            $this->currentCapacity + $fillAmount
        );
        $this->lastTimestamp = $timestamp;
    }

    private function updateMeasuredRate()
    {
        $timestamp = microtime(true);
        $timeBucket = floor($timestamp * 2) / 2;
        $this->requestCount++;
        if ($timeBucket > $this->lastTxRateBucket) {
            $currentRate = $this->requestCount / ($timeBucket - $this->lastTxRateBucket);
            $this->measuredTxRate = ($currentRate * $this->smooth)
                + ($this->measuredTxRate * (1 - $this->smooth));
            $this->requestCount = 0;
            $this->lastTxRateBucket = $timeBucket;
        }
    }

    private function updateTokenBucketRate($newRps)
    {
        $this->refillTokenBucket();
        $this->fillRate = max($newRps, $this->minFillRate);
        $this->maxCapacity = max($newRps, $this->minCapacity);
        $this->currentCapacity = min($this->currentCapacity, $this->maxCapacity);
    }
}
