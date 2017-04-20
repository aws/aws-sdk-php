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

    public function testCanCreateMultipartException($source, $uncompleted)
    {
        $msg = "some error message";
        $inProgress = [
            'Failed' => $source,
            'Uncompleted' => $uncompleted,
        ];
        $prev = new AwsException($msg, new Command("cmd"));

        $exception = new TransferException($inProgress, $prev);
        $expectedMsg = "An error occurs in a S3 Transfer when transferring file: ";

        $this->assertEquals($expectedMsg . $inProgress['Failed'], $exception->getMessage());
        $this->assertSame($prev, $exception->getPrevious());
        $this->assertSame($inProgress['Failed'], $exception->getFileSource());
        $this->assertSame($inProgress['Uncompleted'], $exception->getUncompletedFiles());
    }

    public function getTestCases()
    {
        return [
            [ '/foo/bar/a.txt', [] ],
            [ '/foo/bar/a.txt', ['/foo/bar/b.txt', '/foo/bar/c.txt'] ]
        ];
    }
}
