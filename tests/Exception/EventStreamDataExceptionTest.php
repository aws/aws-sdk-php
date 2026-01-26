<?php

namespace Aws\Test\Exception;

use Aws\Exception\EventStreamDataException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

/**

 */
#[CoversClass(EventStreamDataException::class)]
class EventStreamDataExceptionTest extends TestCase
{
    public function testAccessors()
    {
        $e = new EventStreamDataException('Code', 'This is a message.');
        $this->assertSame('Code', $e->getAwsErrorCode());
        $this->assertSame('This is a message.', $e->getAwsErrorMessage());
    }
}
