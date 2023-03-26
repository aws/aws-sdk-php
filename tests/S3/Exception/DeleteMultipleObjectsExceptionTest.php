<?php
namespace Aws\Test\S3\Exception;

use Aws\S3\Exception\DeleteMultipleObjectsException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\S3\Exception\DeleteMultipleObjectsException
 */
class DeleteMultipleObjectsExceptionTest extends TestCase
{
    public function testReturnsData()
    {
        $del = [['Key' => 'foo']];
        $err = [['Key' => 'bar']];
        $e = new DeleteMultipleObjectsException($del, $err);
        $this->assertSame($del, $e->getDeleted());
        $this->assertSame($err, $e->getErrors());
        $this->assertStringContainsString(
            'Unable to delete certain keys when executing a',
            $e->getMessage()
        );
    }
}
