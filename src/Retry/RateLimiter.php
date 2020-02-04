<?php
namespace Aws\Retry;


/**
 * @internal
 */
class RateLimiter
{
    const BETA = 0.7;
    const MIN_CAPACITY = 1;
    const MIN_FILL_RATE = 0.5;
    const SCALE_CONSTANT = 0.4;
    const SMOOTH = 0.8;

    private $currentCapacity = 0;
    private $enabled = false;
    private $lastMaxRate = 0;
    private $measuredTxRate = 0;
    private $requestCount = 0;

    private $fillRate;
    private $lastThrottleTime;
    private $lastTimestamp;
    private $lastTxRateBucket;
    private $maxCapacity;
    private $timeWindow;

    public function __construct()
    {
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
        $this->timeWindow = pow(($this->lastMaxRate * (1 - self::BETA) / self::SCALE_CONSTANT), 1/3);
    }

    private function cubicSuccess($timestamp)
    {
        $dt = $timestamp - $this->lastThrottleTime;
        return self::SCALE_CONSTANT * pow($dt - $this->timeWindow, 3) + $this->lastMaxRate;
    }

    private function cubicThrottle($rateToUse)
    {
        return $rateToUse * self::BETA;
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
            $this->measuredTxRate = ($currentRate * self::SMOOTH)
                + ($this->measuredTxRate * (1 - self::SMOOTH));
            $this->requestCount = 0;
            $this->lastTxRateBucket = $timeBucket;
        }
    }

    private function updateTokenBucketRate($newRps)
    {
        $this->refillTokenBucket();
        $this->fillRate = max($newRps, self::MIN_FILL_RATE);
        $this->maxCapacity = max($newRps, self::MIN_CAPACITY);
        $this->currentCapacity = min($this->currentCapacity, $this->maxCapacity);
    }
}
