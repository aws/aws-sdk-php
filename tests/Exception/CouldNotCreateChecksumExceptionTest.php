<?php
namespace Aws\Test\Exception;

use Aws\Exception\CouldNotCreateChecksumException;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Exception\CouldNotCreateChecksumException
 */
class CouldNotCreateChecksumExceptionTest extends TestCase
{
    public function testUsesCorrectWords()
    {
        $e = new CouldNotCreateChecksumException('md5');
        $this->assertStringStartsWith('An md5', $e->getMessage());

        $e = new CouldNotCreateChecksumException('sha256');
        $this->assertStringStartsWith('A sha256', $e->getMessage());
    }
}
