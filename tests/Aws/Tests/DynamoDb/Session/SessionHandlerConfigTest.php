<?php

namespace Aws\Tests\DynamoDb\Session;

use Aws\Tests\DynamoDb\Session\AbstractSessionTestCase;
use Aws\DynamoDb\Session\SessionHandlerConfig;

/**
 * @covers Aws\DynamoDb\Session\SessionHandlerConfig
 */
class SessionHandlerConfigTest extends AbstractSessionTestCase
{
    public function getConstructorTestCases()
    {
        return array(
            array(
                array(
                    'dynamo_db_client' => $this->getMockedClient()
                ),
                'Aws\DynamoDb\Session\SessionHandlerConfig'
            ),
            array(
                array(),
                'Aws\Common\Exception\InvalidArgumentException'
            )
        );
    }

    /**
     * @dataProvider getConstructorTestCases
     */
    public function testConstructorProperlyCreatesConfig(array $data, $expectedClass)
    {
        try {
            $config = new SessionHandlerConfig($data);
        } catch (\Aws\Common\Exception\InvalidArgumentException $e) {
            $config = $e;
        }

        $this->assertInstanceOf($expectedClass, $config);
    }

    public function testAddDefaultsPerformsMergeProperly()
    {
        $config = new SessionHandlerConfig(array(
            'dynamo_db_client' => $this->getMockedClient()
        ));

        $this->assertNull($config->get('foo_bar'));
        $config->addDefaults(array('foo_bar' => 'baz'));
        $this->assertEquals('baz', $config->get('foo_bar'));
        $config->addDefaults(array('foo_bar' => 'CHANGED'));
        $this->assertEquals('baz', $config->get('foo_bar'));
    }
}
