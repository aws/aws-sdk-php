<?php

namespace Aws\Test;

use Aws\Exception\EventStreamDataException;

/**
 * @covers Aws\Exception\EventStreamDataException
 */
class EventStreamDataExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessors()
    {
        $e = new EventStreamDataException('Code', 'This is a message.');
        $this->assertEquals('Code', $e->getAwsErrorCode());
        $this->assertEquals('This is a message.', $e->getAwsErrorMessage());
    }
}
