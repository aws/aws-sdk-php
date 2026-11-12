<?php

namespace Aws\Test\Exception;

use Aws\Exception\EventStreamDataException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(EventStreamDataException::class)]
class EventStreamDataExceptionTest extends TestCase
{
    public function testAccessors()
    {
        $e = new EventStreamDataException('Code', 'This is a message.');
        $this->assertSame('Code', $e->getAwsErrorCode());
        $this->assertSame('This is a message.', $e->getAwsErrorMessage());
    }

    public function testCarriesModeledMembers()
    {
        $e = new EventStreamDataException('Code', 'A message.', ['message' => 'A message.', 'code' => 57]);
        $this->assertSame('Code', $e->getAwsErrorCode());
        $this->assertSame('A message.', $e->getAwsErrorMessage());
        $this->assertTrue($e->hasKey('code'));
        $this->assertSame(57, $e->get('code'));
        $this->assertFalse($e->hasKey('other'));
        $this->assertNull($e->get('other'));

        $twoArguments = new EventStreamDataException('Code', 'A message.');
        $this->assertFalse($twoArguments->hasKey('code'));
        $this->assertNull($twoArguments->get('code'));
    }
}
