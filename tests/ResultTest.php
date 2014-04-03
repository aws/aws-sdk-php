<?php
namespace Aws\Test;

use Aws\Result;

/**
 * @covers Aws\Result
 */
class ResultTest extends \PHPUnit_Framework_TestCase
{
    public function testThatSearchUsesJmesPath()
    {
        $result = new Result([
            'foo' => [
                'target' => 1,
            ],
            'bar' => [
                'target' => 2,
            ]
        ]);

        $this->assertEquals([1, 2], $result->search('*.target'));
    }
}
