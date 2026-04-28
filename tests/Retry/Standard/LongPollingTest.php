<?php
namespace Aws\Test\Retry\Standard;

use Aws\Retry\Standard\LongPolling;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LongPolling::class)]
class LongPollingTest extends TestCase
{
    public function testKnownLongPollingOperations(): void
    {
        $this->assertTrue(LongPolling::isLongPolling('sqs', 'ReceiveMessage'));
        $this->assertTrue(LongPolling::isLongPolling('states', 'GetActivityTask'));
        $this->assertTrue(LongPolling::isLongPolling('swf', 'PollForActivityTask'));
        $this->assertTrue(LongPolling::isLongPolling('swf', 'PollForDecisionTask'));
    }

    public function testUnknownOperationOnKnownService(): void
    {
        $this->assertFalse(LongPolling::isLongPolling('sqs', 'SendMessage'));
        $this->assertFalse(LongPolling::isLongPolling('swf', 'StartWorkflowExecution'));
    }

    public function testUnknownService(): void
    {
        $this->assertFalse(LongPolling::isLongPolling('s3', 'GetObject'));
    }

    public function testNullServiceIsNotLongPolling(): void
    {
        $this->assertFalse(LongPolling::isLongPolling(null, 'ReceiveMessage'));
    }
}
