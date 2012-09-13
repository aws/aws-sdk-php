<?php

namespace Aws\Tests\Glacier\Integration;

use Aws\Glacier\GlacierClient;
use Aws\Glacier\TreeHashGenerator;
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
        // Create vault names
        $vaultPrefix = self::getResourcePrefix() . '-php-glacier-test-';
        $vaults = array();
        for ($i = 1; $i <= 5; $i++) {
            $vaults[] = $vaultPrefix . $i;
        }

        // Establish vault filter
        $getVaultList = function ($vault) use ($vaultPrefix) {
            return (strpos($vault['VaultName'], $vaultPrefix) === 0);
        };

        // Create vaults and verify existence
        foreach ($vaults as $vault) {
            $this->client->createVault(array('vaultName' => $vault));
            $this->client->waitUntil('VaultExists', $vault);
        }
        $listVaults = $this->client->getIterator('ListVaults', array('limit' => '5'));
        $vaultList = array_filter(iterator_to_array($listVaults), $getVaultList);
        $this->assertCount(5, $vaultList);

        // Delete vaults and verify deletion
        foreach ($vaults as $vault) {
            $this->client->deleteVault(array('vaultName' => $vault));
            $this->client->waitUntil('VaultNotExists', $vault);
        }
        $listVaults = $this->client->getIterator('ListVaults');
        $vaultList = array_filter(iterator_to_array($listVaults), $getVaultList);
        $this->assertCount(0, $vaultList);
    }

    /**
     * @TODO finish
     */
    public function XXXtestUploadAndDeleteArchive()
    {
        $vaultName = self::getResourcePrefix() . '-php-glacier-test-vault';
        $this->client->createVault(array('vaultName' => $vaultName));

        $body = 'cheese';
        $hash = new TreeHashGenerator($body);

        $result = $this->client->uploadArchive(array(
            'vaultName' => $vaultName,
            'archiveDescription' => 'Foo   Bar', // Make sure that having spaces works (SigV4 should collapse them)
            'body' => $body,
            'checksum' => $hash->getTreeHash()
        ));

        // Get archiveID from result and then delete it
    }

//    public function testCrudJobs()
//    {
//        $vaultName = self::getResourcePrefix() . '-php-glacier-test-vault-for-jobs';
//        $this->client->createVault(array('vaultName' => $vaultName));
//
//        $this->client->initiateJob(array(
//            'vaultName' => $vaultName,
//            'Type' => 'inventory-retrieval',
//            'Description' => 'Fishing for archives'
//        ));
//
//        $result = $this->client->listJobs(array('vaultName' => $vaultName));
//        print_r($result);
//    }
}
