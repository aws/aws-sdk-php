<?php

namespace Aws\Tests\DynamoDb\Session;

use Aws\DynamoDb\DynamoDbClient;

class AbstractSessionTestCase extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @return \Aws\DynamoDb\DynamoDbClient
     */
    public function getMockedClient()
    {
        $client = $this->getMockBuilder('Aws\DynamoDb\DynamoDbClient')
            ->disableOriginalConstructor()
            ->getMock();

        return $client;
    }

    /**
     * @return \Aws\DynamoDb\Session\SessionHandlerConfig
     */
    public function getMockedConfig()
    {
        $config = $this->getMockBuilder('Aws\DynamoDb\Session\SessionHandlerConfig')
            ->disableOriginalConstructor()
            ->getMock();

        return $config;
    }

    /**
     * @return \Aws\Common\Command\JsonCommand
     */
    public function getMockedCommand(DynamoDbClient $client)
    {
        $command = $this->getMock('Aws\Common\Command\JsonCommand');
        $client->expects($this->any())
            ->method('getCommand')
            ->will($this->returnValue($command));

        return $command;
    }

}
