<?php

namespace Aws\Test\Retry;

use Aws\Retry\RateLimiter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Retry\RateLimiter
 */
class RateLimiterTest extends TestCase
{
    /**
     * Safety buffer (seconds) built-in for tests based on timing, to account for
     * hiccups in process execution
     */
    const TEST_TIMING_BUFFER = 0.5;

    public function testGetsTokenInInitialState()
    {
        $rateLimiter = new RateLimiter();
        $time = microtime(true);
        $rateLimiter->getSendToken();
        $this->assertLessThan(self::TEST_TIMING_BUFFER, microtime(true) - $time);
    }

    public function testCorrectlyCalculatesSendingRate()
    {
        $rateLimiter = new RateLimiter([
            'time_provider' => function() {
                static $i;
                $times = [5, 5, 5, 5, 5, 6, 6, 6, 7, 7, 7, 8, 8, 8];
                if (is_null($i)) {
                    $i = 0;
                } else {
                    $i++;
                }
                return $times[$i];
            }
        ]);
        $ref = new \ReflectionClass($rateLimiter);
        $refLastMaxRate = $ref->getProperty('lastMaxRate');
        $refLastMaxRate->setAccessible(true);
        $refLastMaxRate->setValue($rateLimiter, 10);
        $refLastLastThrottleTime = $ref->getProperty('lastThrottleTime');
        $refLastLastThrottleTime->setAccessible(true);
        $refLastLastThrottleTime->setValue($rateLimiter, 5);

        $this->assertEquals(0, $rateLimiter->updateSendingRate(false));
        $this->assertEquals(3.2, $rateLimiter->updateSendingRate(false));
        $this->assertEquals(2.24, $rateLimiter->updateSendingRate(false));
        $this->assertEquals(2.048, $rateLimiter->updateSendingRate(false));
    }

    public function cubicSuccessProvider()
    {
        return [
            [5, 7],
            [6, 9.6],
            [7, 10],
            [8, 10.5],
            [9, 13.4],
            [10, 21.3],
            [11, 36.4],
        ];
    }

    /**
     * @dataProvider cubicSuccessProvider
     *
     * @param $timestamp
     * @param $expectedRate
     * @throws \ReflectionException
     */
    public function testCalculatesCubicSuccessValues($timestamp, $expectedRate)
    {
        $rateLimiter = new RateLimiter();
        $ref = new \ReflectionClass($rateLimiter);
        $refLastMaxRate = $ref->getProperty('lastMaxRate');
        $refLastMaxRate->setAccessible(true);
        $refLastMaxRate->setValue($rateLimiter, 10);
        $refLastLastThrottleTime = $ref->getProperty('lastThrottleTime');
        $refLastLastThrottleTime->setAccessible(true);
        $refLastLastThrottleTime->setValue($rateLimiter, 5);
        $refCalculateTimeWindow = $ref->getMethod('calculateTimeWindow');
        $refCalculateTimeWindow->setAccessible(true);
        $refCubicSuccess = $ref->getMethod('cubicSuccess');
        $refCubicSuccess->setAccessible(true);

        $refCalculateTimeWindow->invoke($rateLimiter);
        $this->assertLessThanOrEqual(
            0.3,
            abs($expectedRate - $refCubicSuccess->invoke($rateLimiter, $timestamp))
        );
    }

    public function testCalculatesCubicThrottleValues()
    {
        $rateLimiter = new RateLimiter();
        $ref = new \ReflectionClass($rateLimiter);
        $refLastMaxRate = $ref->getProperty('lastMaxRate');
        $refLastMaxRate->setAccessible(true);
        $refLastMaxRate->setValue($rateLimiter, 10);
        $refLastLastThrottleTime = $ref->getProperty('lastThrottleTime');
        $refLastLastThrottleTime->setAccessible(true);
        $refLastLastThrottleTime->setValue($rateLimiter, 5);
        $refCalculateTimeWindow = $ref->getMethod('calculateTimeWindow');
        $refCalculateTimeWindow->setAccessible(true);
        $refCubicSuccess = $ref->getMethod('cubicSuccess');
        $refCubicSuccess->setAccessible(true);
        $refCubicThrottle = $ref->getMethod('cubicThrottle');
        $refCubicThrottle->setAccessible(true);

        $cases = [
            ['timestamp' => 5, 'rate' => 7, 'type' => 'success'],
            ['timestamp' => 6, 'rate' => 9.6, 'type' => 'success'],
            ['timestamp' => 7, 'rate' => 6.8, 'type' => 'throttle'],
            ['timestamp' => 8, 'rate' => 4.7, 'type' => 'throttle'],
            ['timestamp' => 9, 'rate' => 6.6, 'type' => 'success'],
            ['timestamp' => 10, 'rate' => 6.8, 'type' => 'success'],
            ['timestamp' => 11, 'rate' => 7.6, 'type' => 'success'],
            ['timestamp' => 12, 'rate' => 11.5, 'type' => 'success'],
        ];

        $calculatedRate = null;
        foreach ($cases as $case) {
            $refCalculateTimeWindow->invoke($rateLimiter);

            if ($case['type'] === 'success') {
                $calculatedRate = $refCubicSuccess->invoke($rateLimiter, $case['timestamp']);
            } else {
                $refLastMaxRate->setValue($rateLimiter, $calculatedRate);
                $refLastLastThrottleTime->setValue($rateLimiter, $case['timestamp']);
                $calculatedRate = $refCubicThrottle->invoke($rateLimiter, $calculatedRate);
            }

            $this->assertLessThanOrEqual(
                0.3,
                abs($case['rate'] - $calculatedRate)
            );
        }
    }

    public function testCorrectlySleepsForThrottling()
    {
        $cases = [
            ['is_throttled' => false, 'sleep_time' => 0],
            ['is_throttled' => true, 'sleep_time' => 0],
            ['is_throttled' => true, 'sleep_time' => 0.89],
            ['is_throttled' => true, 'sleep_time' => 1.88],
            ['is_throttled' => false, 'sleep_time' => 2.88],
            ['is_throttled' => false, 'sleep_time' => 3.81],
            ['is_throttled' => false, 'sleep_time' => 1.82],
            ['is_throttled' => false, 'sleep_time' => 1.04],
            ['is_throttled' => false, 'sleep_time' => 0.54],
            ['is_throttled' => false, 'sleep_time' => 0.05],
            ['is_throttled' => false, 'sleep_time' => 0],
        ];

        $times = [0, 0];
        foreach ($cases as $index => $case) {
            for ($i = 0; $i < 4; $i++) {
                $times[] = ($index + 1);
            }
        }

        $rateLimiter = new RateLimiter([
            'time_provider' => function() use ($times) {
                static $i;
                if (is_null($i)) {
                    $i = 0;
                } else {
                    $i++;
                }
                return $times[$i];
            },
        ]);

        $time = microtime(true);

        foreach ($cases as $case) {
            $rateLimiter->getSendToken();
            $rateLimiter->updateSendingRate($case['is_throttled']);
            $this->assertLessThanOrEqual(
                self::TEST_TIMING_BUFFER,
                abs(microtime(true) - ($time + $case['sleep_time']))
            );
            $time = microtime(true);
        }
    }

    public function testUpdatesClientSendingRatesCorrectly()
    {
        $times = [0, 0];
        for ($timestamp = 0.2; $timestamp <= 3.5; $timestamp += 0.2) {
            for ($i = 0; $i < 3; $i++) {
                $times[] = $timestamp;
            }
        }

        $rateLimiter = new RateLimiter([
            'time_provider' => function() use ($times) {
                static $i;
                if (is_null($i)) {
                    $i = 0;
                } else {
                    $i++;
                }
                return $times[$i];
            }
        ]);
        $ref = new \ReflectionClass($rateLimiter);
        $refLastMaxRate = $ref->getProperty('lastMaxRate');
        $refLastMaxRate->setAccessible(true);
        $refLastLastThrottleTime = $ref->getProperty('lastThrottleTime');
        $refLastLastThrottleTime->setAccessible(true);
        $refFillRate = $ref->getProperty('fillRate');
        $refFillRate->setAccessible(true);
        $refTxRate = $ref->getProperty('measuredTxRate');
        $refTxRate->setAccessible(true);
        $refCalculateTimeWindow = $ref->getMethod('calculateTimeWindow');
        $refCalculateTimeWindow->setAccessible(true);
        $refCubicSuccess = $ref->getMethod('cubicSuccess');
        $refCubicSuccess->setAccessible(true);
        $refCubicThrottle = $ref->getMethod('cubicThrottle');
        $refCubicThrottle->setAccessible(true);

        $cases = [
            ['timestamp' => 0.2, 'measured_tx_rate' => 0, 'new_token_bucket_rate' => 0.5, 'type' => 'success'],
            ['timestamp' => 0.4, 'measured_tx_rate' => 0, 'new_token_bucket_rate' => 0.5, 'type' => 'success'],
            ['timestamp' => 0.6, 'measured_tx_rate' => 4.8, 'new_token_bucket_rate' => 0.5, 'type' => 'success'],
            ['timestamp' => 0.8, 'measured_tx_rate' => 4.8, 'new_token_bucket_rate' => 0.5, 'type' => 'success'],
            ['timestamp' => 1.0, 'measured_tx_rate' => 4.16, 'new_token_bucket_rate' => 0.5, 'type' => 'success'],
            ['timestamp' => 1.2, 'measured_tx_rate' => 4.16, 'new_token_bucket_rate' => 0.6912, 'type' => 'success'],
            ['timestamp' => 1.4, 'measured_tx_rate' => 4.16, 'new_token_bucket_rate' => 1.0976, 'type' => 'success'],
            ['timestamp' => 1.6, 'measured_tx_rate' => 5.632, 'new_token_bucket_rate' => 1.6384, 'type' => 'success'],
            ['timestamp' => 1.8, 'measured_tx_rate' => 5.632, 'new_token_bucket_rate' => 2.3328, 'type' => 'success'],
            ['timestamp' => 2.0, 'measured_tx_rate' => 4.3264, 'new_token_bucket_rate' => 3.02848, 'type' => 'throttle'],
            ['timestamp' => 2.2, 'measured_tx_rate' => 4.3264, 'new_token_bucket_rate' => 3.486639, 'type' => 'success'],
            ['timestamp' => 2.4, 'measured_tx_rate' => 4.3264, 'new_token_bucket_rate' => 3.821874, 'type' => 'success'],
            ['timestamp' => 2.6, 'measured_tx_rate' => 5.66528, 'new_token_bucket_rate' => 4.053386, 'type' => 'success'],
            ['timestamp' => 2.8, 'measured_tx_rate' => 5.66528, 'new_token_bucket_rate' => 4.200373, 'type' => 'success'],
            ['timestamp' => 3.0, 'measured_tx_rate' => 4.333056, 'new_token_bucket_rate' => 4.282037, 'type' => 'success'],
            ['timestamp' => 3.2, 'measured_tx_rate' => 4.333056, 'new_token_bucket_rate' => 2.997426, 'type' => 'throttle'],
            ['timestamp' => 3.4, 'measured_tx_rate' => 4.333056, 'new_token_bucket_rate' => 3.452226, 'type' => 'success'],
        ];

        foreach ($cases as $case) {
            $rateLimiter->updateSendingRate($case['type'] === 'throttle');
            $this->assertLessThanOrEqual(
                0.1,
                abs($case['measured_tx_rate'] - $refTxRate->getValue($rateLimiter))
            );
            $this->assertLessThanOrEqual(
                0.1,
                abs($case['new_token_bucket_rate'] - $refFillRate->getValue($rateLimiter))
            );
        }
    }

}
