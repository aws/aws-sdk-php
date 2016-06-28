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
    /**
     * @dataProvider getTestCases
     */

    public function testCanCreateMultipartException($source, $idx, $uncompleted)
    {
        $msg = "some error message";
        $inProgress = [
            'FileSource' => $source,
            'Index' => $idx,
            'Uncompleted' => $uncompleted,
        ];
        $prev = new AwsException($msg, new Command("cmd"));
        
        $exception = new TransferException($inProgress, $prev);
        $expectedMsg = "An error occurs in a S3 Transfer when transferring file: ";
            
        $this->assertEquals($expectedMsg . $inProgress['FileSource'], $exception->getMessage());
        $this->assertSame($prev, $exception->getPrevious());
        $this->assertSame($inProgress['FileSource'], $exception->getFileSource());
        $this->assertSame($inProgress['Uncompleted'], $exception->getUncompletedFiles());
    }
    
    public function getTestCases()
    {
        return [
            [ 'foo/bar/a.txt', 1, [] ],
            [ 'foo/bar/a.txt', 0, [ 'foo/bar/b.txt'] ]
        ];
    }
}