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
        $this->client->getConfig()->set('curl.CURLOPT_VERBOSE', true);
    }

    public function testCrudVaults()
    {
        $vaults = array(
            self::getResourcePrefix() . '-php-glacier-test-1',
            self::getResourcePrefix() . '-php-glacier-test-2',
            self::getResourcePrefix() . '-php-glacier-test-3',
            self::getResourcePrefix() . '-php-glacier-test-4',
            self::getResourcePrefix() . '-php-glacier-test-5',
        );

        // Create vaults and verify existence
        foreach ($vaults as $vault) {
            $this->client->createVault(array('vaultName' => $vault));
            $this->client->waitUntil('VaultExists', $vault);
        }
        $listVaults = $this->client->getIterator('ListVaults', array('limit' => '2'));
        $this->assertCount(5, iterator_to_array($listVaults));

        // Delete vaults and verify deletion
        foreach ($vaults as $vault) {
            $this->client->deleteVault(array('vaultName' => $vault));
            $this->client->waitUntil('VaultNotExists', $vault);
        }
        $result = $this->client->listVaults();
        $this->assertCount(0, $result['VaultList']);
    }
}
