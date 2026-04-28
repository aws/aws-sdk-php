<?php

namespace Aws\Test\Retry\Standard;

use Aws\Retry\Standard\QuotaManager;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(QuotaManager::class)]
class QuotaManagerTest extends TestCase
{
    public function testAcquireReturnsCapacityForNonThrottling()
    {
        $quota = new QuotaManager(['initial_retry_tokens' => 500]);
        $cost = $quota->acquireRetryQuota(false);
        $this->assertSame(14, $cost);
        $this->assertSame(486, $quota->getAvailableCapacity());
    }

    public function testAcquireReturnsCapacityForThrottling()
    {
        $quota = new QuotaManager(['initial_retry_tokens' => 500]);
        $cost = $quota->acquireRetryQuota(true);
        $this->assertSame(5, $cost);
        $this->assertSame(495, $quota->getAvailableCapacity());
    }

    public function testAcquireReturnsFalseWhenInsufficient()
    {
        $quota = new QuotaManager(['initial_retry_tokens' => 10]);
        $this->assertFalse($quota->acquireRetryQuota(false));
    }

    public function testReleaseQuotaWithCapacity()
    {
        $quota = new QuotaManager(['initial_retry_tokens' => 500]);
        $cost = $quota->acquireRetryQuota(false);
        $this->assertSame(14, $cost);
        $this->assertSame(486, $quota->getAvailableCapacity());

        $quota->releaseQuota(14);
        $this->assertSame(500, $quota->getAvailableCapacity());
    }

    public function testReleaseQuotaWithNullUsesIncrement()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 500,
            'no_retry_increment' => 1,
        ]);
        $quota->acquireRetryQuota(false);
        $quota->releaseQuota(null);
        $this->assertSame(487, $quota->getAvailableCapacity());
    }

    public function testCapacityNeverExceedsMax()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 500,
            'no_retry_increment' => 100,
        ]);
        $quota->releaseQuota(null);
        $this->assertSame(500, $quota->getAvailableCapacity());

        $quota->acquireRetryQuota(true);
        $quota->releaseQuota(100);
        $this->assertSame(500, $quota->getAvailableCapacity());
    }

    public function testCustomCosts()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 100,
            'retry_cost' => 20,
            'throttling_retry_cost' => 10,
            'no_retry_increment' => 5,
        ]);

        $cost = $quota->acquireRetryQuota(false);
        $this->assertSame(20, $cost);
        $this->assertSame(80, $quota->getAvailableCapacity());

        $cost = $quota->acquireRetryQuota(true);
        $this->assertSame(10, $cost);
        $this->assertSame(70, $quota->getAvailableCapacity());

        $quota->releaseQuota(null);
        $this->assertSame(75, $quota->getAvailableCapacity());
    }

    public function testThrottlingAcquireWithInsufficientQuota()
    {
        $quota = new QuotaManager(['initial_retry_tokens' => 3]);
        $this->assertFalse($quota->acquireRetryQuota(true));
    }

    public function testMultipleAcquiresDepleteQuota()
    {
        $quota = new QuotaManager(['initial_retry_tokens' => 30]);

        $this->assertSame(14, $quota->acquireRetryQuota(false));
        $this->assertSame(14, $quota->acquireRetryQuota(false));
        $this->assertFalse($quota->acquireRetryQuota(false));
    }
}
