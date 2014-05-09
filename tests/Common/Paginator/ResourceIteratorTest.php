<?php
namespace Aws\Test\Common\Paginator;

use Aws\Common\Paginator\ResourceIterator;
use Aws\Common\Paginator\ResultPaginator;
use Aws\Result;

/**
 * @covers Aws\Common\Paginator\ResourceIterator
 */
class ResourceIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testStandardIterationWorkflowIncludingLimit()
    {
        $results = [
            // [$expectedLimit, $result]
            [4, new Result(['TableNames' => ['A', 'B']])],
            [2, new Result(['TableNames' => []])],
            [2, new Result(['TableNames' => ['C', 'D', 'E']])],
        ];

        // Mock the paginator
        $paginator = $this->getMockBuilder('Aws\Common\Paginator\ResultPaginator')
            ->disableOriginalConstructor()
            ->setMethods(['getNext', 'rewind', 'getConfig'])
            ->getMock();
        $paginator->expects($this->once())
            ->method('rewind');
        $paginator->expects($this->any())
            ->method('getConfig')
            ->with('limit_key')
            ->willReturn('Limit');
        $paginator->expects($this->exactly(3))
            ->method('getNext')
            ->will($this->returnCallback(function ($args) use (&$results) {
                list($expectedLimit, $result) = array_shift($results);
                $this->assertEquals($expectedLimit, $args['Limit']);
                return $result;
            }));

        // Create the resource iterator
        /** @var ResultPaginator $paginator */
        $iterator = new ResourceIterator($paginator, [
            'result_key' => 'TableNames',
            'limit'      => 4
        ]);

        // Verify that 4 (the limit) resources were iterated
        $this->assertEquals(['A', 'B', 'C', 'D'], iterator_to_array($iterator));
        $this->assertInstanceOf(
            'Aws\Common\Paginator\ResultPaginator',
            $iterator->getInnerIterator()
        );
    }
}
