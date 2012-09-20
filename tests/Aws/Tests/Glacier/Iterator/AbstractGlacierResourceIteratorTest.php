<?php

namespace Aws\Tests\Common\Iterator;

use Aws\Glacier\Iterator\AbstractGlacierResourceIterator;
use Guzzle\Service\Command\AbstractCommand;

/**
 * @covers Aws\Glacier\Iterator\AbstractGlacierResourceIterator
 */
class AbstractGlacierResourceIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function getDataForPageSizeTest()
    {
        return array(
            array(null, null, null),
            array(8, null, 8),
            array(null, 4, null),
            array(8, 4, 4),
            array(4, 8, 4),
            array(8, 8, 8),
        );
    }

    /**
     * @dataProvider getDataForPageSizeTest
     */
    public function testPrepareRequestSetsPageSizeCorrectly($limit, $pageSize, $resultingLimit)
    {
        $command = $this->getMockedCommand();
        if ($limit) {
            $command->set('limit', $limit);
        }

        $iterator = $this->getMockedIterator($command);
        if ($pageSize) {
            $iterator->setPageSize($pageSize);
        }

        $prepareRequest = new \ReflectionMethod($iterator, 'prepareRequest');
        $prepareRequest->setAccessible(true);
        $prepareRequest->invoke($iterator);

        $this->assertEquals($resultingLimit, $command->get('limit'));
    }

    public function testApplyNextTokenSetsTokenCorrectly()
    {
        $command = $this->getMockedCommand();
        $iterator = $this->getMockedIterator($command);

        $property = new \ReflectionProperty($iterator, 'nextToken');
        $property->setAccessible(true);
        $property->setValue($iterator, '[MARKER]');

        $applyNextToken = new \ReflectionMethod($iterator, 'applyNextToken');
        $applyNextToken->setAccessible(true);
        $applyNextToken->invoke($iterator);

        $this->assertEquals('[MARKER]', $command->get('marker'));
    }

    public function testResultsAreHandledCorrectly()
    {
        $result = array(
            'VaultList' => array(
                array(/* ... */),
                array(/* ... */),
                array(/* ... */),
                array(/* ... */),
                array(/* ... */)
            ),
            'Marker' => '[MARKER]'
        );

        $command = $this->getMockedCommand();
        $iterator = $this->getMockedIterator($command);

        $handleResults = new \ReflectionMethod($iterator, 'handleResults');
        $handleResults->setAccessible(true);
        $this->assertCount(5, $handleResults->invoke($iterator, $result));

        $determineNextToken = new \ReflectionMethod($iterator, 'determineNextToken');
        $determineNextToken->setAccessible(true);
        $determineNextToken->invoke($iterator, $result);
        $nextToken = new \ReflectionProperty($iterator, 'nextToken');
        $nextToken->setAccessible(true);
        $this->assertEquals('[MARKER]', $nextToken->getValue($iterator));
    }

    /**
     * @covers \Aws\Glacier\Iterator\ListVaultsIterator
     * @covers \Aws\Glacier\Iterator\ListPartsIterator
     * @covers \Aws\Glacier\Iterator\ListJobsIterator
     */
    public function testInstantiateGlacierIterators()
    {
        $glacier = $this->getServiceBuilder()->get('glacier');
        $this->assertInstanceOf('\Aws\Glacier\Iterator\ListVaultsIterator', $glacier->getIterator('ListVaults'));
        $this->assertInstanceOf('\Aws\Glacier\Iterator\ListPartsIterator', $glacier->getIterator('ListParts'));
        $this->assertInstanceOf('\Aws\Glacier\Iterator\ListJobsIterator', $glacier->getIterator('ListJobs'));
    }

    /**
     * @return AbstractCommand
     */
    protected function getMockedCommand()
    {
        return $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->disableOriginalConstructor()
            ->setMethods(array('execute'))
            ->getMock()
            ->set('foo', 'bar');
    }

    /**
     * @return AbstractGlacierResourceIterator
     */
    protected function getMockedIterator(AbstractCommand $command)
    {
        $iterator = $this->getMockForAbstractClass(
            'Aws\Glacier\Iterator\AbstractGlacierResourceIterator', array(), '', false
        );

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        return $iterator;
    }
}
