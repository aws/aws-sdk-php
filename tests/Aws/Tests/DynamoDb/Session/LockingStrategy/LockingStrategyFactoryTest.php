<?php

namespace Aws\Tests\DynamoDb\Session\LockingStrategy;

use Aws\Tests\DynamoDb\Session\AbstractSessionTestCase;
use Aws\DynamoDb\Session\LockingStrategy\LockingStrategyFactory;

/**
 * @covers Aws\DynamoDb\Session\LockingStrategy\LockingStrategyFactory
 */
class LockingStrategyFactoryTest extends AbstractSessionTestCase
{
    public function getFactoryTestCases()
    {
        return array(
            array(null,          'Aws\DynamoDb\Session\LockingStrategy\LockingStrategyInterface'),
            array('null',        'Aws\DynamoDb\Session\LockingStrategy\LockingStrategyInterface'),
            array('pessimistic', 'Aws\DynamoDb\Session\LockingStrategy\LockingStrategyInterface'),
            array('foo',         'Aws\Common\Exception\InvalidArgumentException'),
            array(5,             'Aws\Common\Exception\InvalidArgumentException')
        );
    }

    /**
     * @dataProvider getFactoryTestCases
     */
    public function testFactoryWorksCorrectly($strategyName, $class)
    {
        // Setup mocks
        $config = $this->getMockedConfig();
        $client = $this->getMockedClient();
        $config->expects($this->any())
            ->method('get')
            ->will($this->returnCallback(function ($key) use ($client) {
                return ($key === 'dynamo_db_client') ? $client : null;
            }));

        $factory = new LockingStrategyFactory('Aws\DynamoDb\Session\LockingStrategy');

        try {
            $strategy = $factory->factory($strategyName, $config);
        } catch (\Aws\Common\Exception\InvalidArgumentException $e) {
            $strategy = $e;
        }

        $this->assertInstanceOf($class, $strategy);
    }
}
