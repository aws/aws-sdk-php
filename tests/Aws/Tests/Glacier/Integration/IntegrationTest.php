<?php

namespace Aws\Tests\Glacier\Integration;

use Aws\Common\Enum\Size;
use Aws\Glacier\GlacierClient;
use Aws\Glacier\Model\GlacierUploadGenerator;
use Guzzle\Http\Client;

use Guzzle\Common\Log\ClosureLogAdapter;
use Guzzle\Http\Plugin\LogPlugin;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const TEST_VAULT = 'php-test-vault';

    /**
     * @var GlacierClient
     */
    protected $client;

    public static function setUpBeforeClass()
    {
        return;
        /** @var $glacier GlacierClient */
        $glacier = self::getServiceBuilder()->get('glacier');

        // Remove any vaults where the name contains "php-" except for the long-existing TEST_VAULT
        foreach ($glacier->getIterator('ListVaults') as $vault) {
            $vault = $vault['VaultName'];
            if (strpos($vault, 'php-') !== false && $vault !== self::TEST_VAULT) {
                $glacier->deleteVault(array('vaultName' => $vault));
            }
        }

        // Ensure that the TEST_VAULT exists
        $glacier->createVault(array('vaultName' => self::TEST_VAULT));
    }

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('glacier');
        //$this->client->getConfig()->set('curl.CURLOPT_VERBOSE', true);

        $this->client->addSubscriber(new LogPlugin(new ClosureLogAdapter(function ($message, $priority) {
            echo "{$priority}: {$message}\n";
        }), LogPlugin::LOG_VERBOSE));
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
     * @group current
     */
    public function testUploadAndDeleteArchives()
    {
        $bm = function ($key = '__DEFAULT__')
        {
            static $times;
            if (!$times) $times = array();
            if (!isset($times[$key])) {
                return $times[$key] = microtime(true);
            } else {
                $temp = microtime(true) - $times[$key];
                $times[$key] = null;
                return $temp;
            }
        };

        $content = str_repeat('x', Size::MB + 23);
        $bm();
        $singleGen = GlacierUploadGenerator::factory($content);
        echo "\nTIME TO HASH: ".$bm()."\n\n";
        $this->assertEquals(strlen($content), $singleGen->getSingleUpload()->getSize());
        //$partSize = 2 * Size::MB;
        //$multiGen = GlacierUploadGenerator::factory($content, $partSize);

        try {

        // Single upload
        $bm();
        $uploadArchive = $this->client->getCommand('UploadArchive', array(
            'vaultName'          => self::TEST_VAULT,
            'archiveDescription' => 'Foo   bar',
            'body'               => $singleGen->getSingleUpload()
        ));
        $uploadArchive->execute();
        $archiveId = $uploadArchive->getResponse()->getHeader('x-amz-archive-id', true);
        echo "\nTIME TO UPLOAD: ".$bm()."\n\n";

        // Delete the archive
        $bm();
        $this->client->deleteArchive(array(
            'vaultName' => self::TEST_VAULT,
            'archiveId' => $archiveId
        ));
        echo "\nTIME TO DELETE: ".$bm()."\n\n";

        } catch (\Aws\Glacier\Exception\GlacierException $e) {
            var_dump(get_class($e), $e->getResponse()->getHeaders());
            print_r(json_decode($e->getResponse()->getBody(true), true));
        } catch (\Exception $e) {
            var_dump($e);
        }

        return;

        // Multipart upload
        $uploadId = $this->client->initiateMultipartUpload(array(
            'vaultName' => self::TEST_VAULT,
            'partSize' => (string) $partSize
        ))->getHeader('x-amz-multipart-upload-id');
        foreach ($multiGen->getUploads() as $upload) {
            $this->client->uploadMultipartPart(array(
                'vaultName' => self::TEST_VAULT,
                'uploadId' => $uploadId,
                'body' => $upload,
            ));
        }
        $archiveId = $this->client->completeMultipartUpload(array(
            'vaultName' => self::TEST_VAULT,
            'uploadId' => $uploadId,
            'archiveSize' => (string) $multiGen->getTotalSize(),
            'checksum' => $multiGen->getRootTreeHash()
        ))->getHeader('x-amz-archive-id');

        // Delete the archive
        $this->client->deleteArchive(array('archiveId' => $archiveId));
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
