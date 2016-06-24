<?php
namespace Aws\Test\Exception;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\Exception\TransferException;

/**
 * @covers Aws\Exception\TransferException
 */
class TransferExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testCanCreateMultipartException()
    {
        $msg = "some error message";
        $files = [
            'foo/bar',
            'foo/bar/a.txt'
        ];
        $prev = new AwsException($msg, new Command("cmd"));
        
        foreach ($files as $source) {
            $exception = new TransferException($source, $prev);
            $expectedMsg = "An error occurs in a S3 Transfer when transferring file: ";
            
            $this->assertEquals($expectedMsg . $source, $exception->getMessage());
            $this->assertSame($prev, $exception->getPrevious());
            $this->assertSame($source, $exception->getFileSource());
        }
    }
}