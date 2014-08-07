<?php
namespace Aws\Test\S3\Exception;

use Aws\S3\Exception\ClearBucketException;

/**
 * @covers Aws\S3\Exception\ClearBucketException
 */
class ClearBucketExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsData()
    {
        $p = new \Exception('a');
        $i = new \ArrayIterator([]);
        $e = new ClearBucketException([
            ['Key' => 'foo']
        ], $i, $p);
        $this->assertSame([['Key' => 'foo']], $e->getErrors());
        $this->assertSame($i, $e->getIterator());
        $this->assertSame($p, $e->getPrevious());
    }
}
