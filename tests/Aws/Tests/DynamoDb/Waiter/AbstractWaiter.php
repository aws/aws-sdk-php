<?php

namespace Aws\Tests\DynamoDb\Waiter;

class AbstractWaiter extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getClient()
    {
        $client = $this->getServiceBuilder()->get('dynamodb', true);
        $client->getCredentials()
            ->setSecurityToken('foo')
            ->setExpiration(time() + 1000);

        return $client;
    }
}
