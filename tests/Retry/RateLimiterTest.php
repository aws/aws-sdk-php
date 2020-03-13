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
            echo "pass\n";
        }
    }

}
