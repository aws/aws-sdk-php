<?php
namespace Aws\Test\Common\Api\Parser;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @covers Aws\Common\Api\Parser\AbstractParser
 */
class AbstractParserTest extends \PHPUnit_Framework_TestCase
{
    public function testDoesNotMessWithExistingResults()
    {
        $mock = $this->getMockBuilder('Aws\Common\Api\Parser\AbstractParser')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $mockClient = $this->getMockBuilder('GuzzleHttp\Command\AbstractClient')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $event = new ProcessEvent(new Command('foo'), $mockClient);
        $event->setResult('foo');
        $mock->onProcess($event);
        $this->assertSame('foo', $event->getResult());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testThrowsWhenNoResultOrResponseIsPresent()
    {
        $mock = $this->getMockBuilder('Aws\Common\Api\Parser\AbstractParser')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $mockClient = $this->getMockBuilder('GuzzleHttp\Command\AbstractClient')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $event = new ProcessEvent(new Command('foo'), $mockClient);
        $mock->onProcess($event);
    }
}
