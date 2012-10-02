<?php

namespace Aws\Tests\Glacier\Waiter;

/**
 * @covers Aws\Glacier\Waiter\VaultExists
 */
class VaultExistsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testReturnsTrueIfVaultExists()
    {
        $client = $this->getServiceBuilder()->get('glacier', true);
        $this->setMockResponse($client, 'glacier/describe_vault');
        $client->waitUntil('VaultExists', 'foo');
        $this->assertEquals(1, count($this->getMockedRequests()));
    }

    public function testRetriesUntilVaultExists()
    {
        $client = $this->getServiceBuilder()->get('glacier', true);
        $this->setMockResponse($client, array('glacier/describe_vault_error', 'glacier/describe_vault_error', 'glacier/describe_vault'));
        $client->waitUntil('VaultExists', 'foo', array('interval' => 0));
        $this->assertEquals(3, count($this->getMockedRequests()));
    }
}
