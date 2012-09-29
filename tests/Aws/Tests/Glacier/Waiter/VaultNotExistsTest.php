<?php

namespace Aws\Tests\Glacier\Waiter;

use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

/**
 * @covers Aws\Glacier\Waiter\VaultNotExists
 */
class VaultNotExistsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testReturnsTrueIfVaultNotExists()
    {
        $client = $this->getServiceBuilder()->get('glacier', true);
        $this->setMockResponse($client, 'glacier/describe_vault_error');
        $client->waitUntil('VaultNotExists', 'foo');
        $this->assertEquals(1, count($this->getMockedRequests()));
    }

    public function testRetriesUntilVaultNotExists()
    {
        $client = $this->getServiceBuilder()->get('glacier', true);
        $this->setMockResponse($client, array('glacier/describe_vault', 'glacier/describe_vault', 'glacier/describe_vault_error'));
        $client->waitUntil('VaultNotExists', 'foo', array('interval' => 0));
        $this->assertEquals(3, count($this->getMockedRequests()));
    }
}
