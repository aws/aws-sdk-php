<?php

namespace Aws\Test\Retry;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\Result;
use Aws\Retry\QuotaManager;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Retry\QuotaManager
 */
class QuotaManagerTest extends TestCase
{
    public function testReturnsFalseWithNoCapacity()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 0,
            'no_retry_increment' => 1,
            'retry_cost' => 1,
            'timeout_retry_cost' => 1
        ]);

        $result = new Result([]);
        $this->assertFalse($quota->hasRetryQuota($result));
    }

    public function testCorrectlyDecrementsForNonConnectionErrors()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 4,
            'no_retry_increment' => 1,
            'retry_cost' => 1,
            'timeout_retry_cost' => 4
        ]);

        $result = new AwsException('Foo message', new Command('Foo'));

        // Should decrement for retry_cost, allowing 4 retry attempts
        for ($i = 1; $i <= 4; $i++) {
            $this->assertTrue($quota->hasRetryQuota($result));
        }
        $this->assertFalse($quota->hasRetryQuota($result));
    }

    public function testCorrectlyDecrementsForConnectionErrors()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 4,
            'no_retry_increment' => 1,
            'retry_cost' => 2,
            'timeout_retry_cost' => 1
        ]);

        $result = new AwsException(
            'Foo message',
            new Command('Foo'),
            [
                'connection_error' => true
            ]
        );

        // Should decrement for retry_cost, allowing 4 retry attempts
        for ($i = 1; $i <= 4; $i++) {
            $this->assertTrue($quota->hasRetryQuota($result));
        }
        $this->assertFalse($quota->hasRetryQuota($result));
    }

    public function testReleasesToQuotaTakenAmount()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 10,
            'no_retry_increment' => 1,
            'retry_cost' => 5,
            'timeout_retry_cost' => 2
        ]);

        $exception = new AwsException(
            'Foo message',
            new Command('Foo')
        );
        $result = new Result([
            '@metadata' => [
                'statusCode' => 200
            ]
        ]);

        $quota->hasRetryQuota($exception);
        $this->assertEquals(5, $quota->releaseToQuota($result));

        // Verify that the available capacity is indeed set back to 10
        for ($i = 5; $i <= 10; $i += 5) {
            $this->assertTrue($quota->hasRetryQuota($exception));
        }
        $this->assertFalse($quota->hasRetryQuota($exception));
    }

    public function testReleasesToQuotaForTakenAndNoRetryIncrements()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 10,
            'no_retry_increment' => 1,
            'retry_cost' => 5,
            'timeout_retry_cost' => 2
        ]);

        // Should decrement by 1
        $exception = new AwsException(
            'Foo message',
            new Command('Foo')
        );

        // Should decrement by 2
        $connectionException = new AwsException(
            'Foo message',
            new Command('Foo'),
            [
                'connection_error' => true
            ]
        );

        $result = new Result([
            '@metadata' => [
                'statusCode' => 200
            ]
        ]);

        $quota->hasRetryQuota($exception);
        $quota->hasRetryQuota($exception);

        // First call should return taken capacity
        $this->assertEquals(5, $quota->releaseToQuota($result));

        // Subsequent calls should return no_retry_incerement
        $this->assertEquals(1, $quota->releaseToQuota($result));
        $this->assertEquals(1, $quota->releaseToQuota($result));
        $this->assertEquals(1, $quota->releaseToQuota($result));

        // Verify that available capacity is now at 8
        for ($i = 2; $i <= 8; $i += 2) {
            $this->assertTrue($quota->hasRetryQuota($connectionException));
        }
        $this->assertFalse($quota->hasRetryQuota($exception));
    }

    public function testDoesNotExceedMaxCapacity()
    {
        $quota = new QuotaManager([
            'initial_retry_tokens' => 5,
            'no_retry_increment' => 5,
            'retry_cost' => 5,
            'timeout_retry_cost' => 5
        ]);

        $exception = new AwsException('Foo message', new Command('Foo'));
        $result = new Result([
            '@metadata' => [
                'statusCode' => 200
            ]
        ]);

        // This should allow a 2nd retry if allowed to go above max capacity
        $quota->releaseToQuota($result);

        $this->assertTrue($quota->hasRetryQuota($exception));
        $this->assertFalse($quota->hasRetryQuota($exception));
    }
}
