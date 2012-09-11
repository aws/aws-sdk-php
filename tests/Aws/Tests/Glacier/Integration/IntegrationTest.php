<?php

namespace Aws\Tests\Glacier\Integration;

use Aws\Glacier\GlacierClient;
use Guzzle\Http\Client;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var GlacierClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('glacier');
    }

    public function testCrudVaults()
    {
        $vault1 = self::getResourcePrefix() . '-php-glacier-test-1';
        $vault2 = self::getResourcePrefix() . '-php-glacier-test-2';

        // Create vaults and verify existence
        $this->client->createVault(array('vaultName' => $vault1));
        $this->client->createVault(array('vaultName' => $vault2));
        $this->client->waitUntil('VaultExists', $vault1);
        $this->client->waitUntil('VaultExists', $vault2);
        $vaults = $this->client->listVaults(array('limit' => '5'));
        $this->assertCount(2, $vaults['VaultList']);

        // Delete vaults and verify deletion
        $this->client->deleteVault(array('vaultName' => $vault1));
        $this->client->deleteVault(array('vaultName' => $vault2));
        $this->client->waitUntil('VaultNotExists', $vault1);
        $this->client->waitUntil('VaultNotExists', $vault2);
        $vaults = $this->client->listVaults();
        $this->assertCount(0, $vaults['VaultList']);
    }
}
