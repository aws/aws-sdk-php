<?php

namespace Aws\Tests\Common\Iterator;

use Aws\S3\Iterator\AbstractS3ResourceIterator;
use Guzzle\Service\Command\AbstractCommand;

/**
 * @covers Aws\S3\Iterator\AbstractS3ResourceIterator
 */
class AbstractS3ResourceIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testPrepareRequestSetsPageSizeCorrectly()
    {
        $command = $this->getMockedCommand();
        $command->set('MaxKeys', 8);

        $iterator = $this->getMockedIterator($command);
        $iterator->setPageSize(10);

        $prepareRequest = new \ReflectionMethod($iterator, 'prepareRequest');
        $prepareRequest->setAccessible(true);
        $prepareRequest->invoke($iterator);

        $this->assertEquals(8, $command->get('MaxKeys'));
    }

    public function testApplyNextTokenSetsTokenCorrectly()
    {
        $command = $this->getMockedCommand();
        $iterator = $this->getMockedIterator($command);

        $property = new \ReflectionProperty($iterator, 'nextToken');
        $property->setAccessible(true);
        $property->setValue($iterator, array('foo' => 'bar'));

        $applyNextToken = new \ReflectionMethod($iterator, 'applyNextToken');
        $applyNextToken->setAccessible(true);
        $applyNextToken->invoke($iterator);

        $this->assertEquals('bar', $command->get('foo'));
    }

    /**
     * @return AbstractCommand
     */
    protected function getMockedCommand()
    {
        return $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->disableOriginalConstructor()
            ->setMethods(array('execute'))
            ->getMock();
    }

    /**
     * @return AbstractS3ResourceIterator
     */
    protected function getMockedIterator(AbstractCommand $command)
    {
        $iterator = $this->getMockForAbstractClass(
            'Aws\S3\Iterator\AbstractS3ResourceIterator', array(), '', false
        );

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        return $iterator;
    }
}
