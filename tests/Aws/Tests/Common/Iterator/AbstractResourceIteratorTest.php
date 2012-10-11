<?php

namespace Aws\Tests\Common\Iterator;

use Aws\Common\Iterator\AbstractResourceIterator;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\Common\Iterator\AbstractResourceIterator
 */
class AbstractResourceIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testSendRequest()
    {
        // Mock Command
        $command = $this->getMockBuilder('Aws\Common\Command\JsonCommand')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(array()));

        // Mock the iterator
        $iterator = $this->getMockForAbstractClass(
            'Aws\Common\Iterator\AbstractResourceIterator',
            array(), '', false
        );
        $iterator->expects($this->any())
            ->method('handleResults')
            ->will($this->onConsecutiveCalls(array(), array('foo')));

        // Setup state
        $property = new \ReflectionProperty($iterator, 'nextToken');
        $property->setAccessible(true);
        $property->setValue($iterator, 'foo');

        $property = new \ReflectionProperty($iterator, 'originalCommand');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        // Execute method under test
        $sendRequest = new \ReflectionMethod($iterator, 'sendRequest');
        $sendRequest->setAccessible(true);
        $result = $sendRequest->invoke($iterator);

        $this->assertEquals(array('foo'), $result);
        $this->assertNull($iterator->getLastResult());
    }
}
