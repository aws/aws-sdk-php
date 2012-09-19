<?php

namespace Aws\Tests\Glacier\Integration;

use Aws\Common\Enum\Size;
use Aws\Glacier\GlacierClient;
use Aws\Glacier\Model\UploadGenerator;
use Guzzle\Http\Client;

use Guzzle\Plugin\Log\LogPlugin;
use Guzzle\Log\ClosureLogAdapter;

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
        /** @var $glacier GlacierClient */
        $glacier = self::getServiceBuilder()->get('glacier');
        $glacier->createVault(array('vaultName' => self::TEST_VAULT));
    }

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('glacier');
        //$this->client->getConfig()->set('curl.CURLOPT_VERBOSE', true);
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

    public function testUploadAndDeleteArchives()
    {
        $content = str_repeat('x', 6 * Size::MB + 425);
        $length = strlen($content);

        $singleGen = UploadGenerator::factory($content);
        $this->assertEquals($length, $singleGen->getSingleUpload()->getSize());
        $partSize = 2 * Size::MB;
        $multiGen = UploadGenerator::factory($content, $partSize);
        $this->assertEquals($length, $multiGen->getArchiveSize());

        // Single upload
        $uploadArchive = $this->client->getCommand('UploadArchive', array(
            'vaultName'          => self::TEST_VAULT,
            'archiveDescription' => 'Foo   bar',
            'body'               => $singleGen->getSingleUpload()
        ));
        $uploadArchive->execute();
        $archiveId = $uploadArchive->getResponse()->getHeader('x-amz-archive-id', true);
        $this->assertNotEmpty($archiveId);

        // Delete the archive
        $this->client->deleteArchive(array(
            'vaultName' => self::TEST_VAULT,
            'archiveId' => $archiveId
        ));

        sleep(5);

        // Multipart upload
        $initiateMultipartUpload = $this->client->getCommand('InitiateMultipartUpload', array(
            'vaultName' => self::TEST_VAULT,
            'partSize' => (string) $partSize
        ));
        $initiateMultipartUpload->execute();
        $uploadId = $initiateMultipartUpload->getResponse()->getHeader('x-amz-multipart-upload-id', true);
        foreach ($multiGen->getUploads() as $upload) {
            $this->client->uploadMultipartPart(array(
                'vaultName' => self::TEST_VAULT,
                'uploadId' => $uploadId,
                'body' => $upload
            ));
            sleep(5);
        }
        $completeMultipartUpload = $this->client->getCommand('CompleteMultipartUpload', array(
            'vaultName' => self::TEST_VAULT,
            'uploadId' => $uploadId,
            'archiveSize' => (string) $multiGen->getArchiveSize(),
            'checksum' => $multiGen->getRootChecksum()
        ));
        $completeMultipartUpload->execute();
        $archiveId = $completeMultipartUpload->getResponse()->getHeader('x-amz-archive-id', true);
        $this->assertNotEmpty($archiveId);

        // Delete the archive
        $this->client->deleteArchive(array(
            'vaultName' => self::TEST_VAULT,
            'archiveId' => $archiveId
        ));
    }
}
