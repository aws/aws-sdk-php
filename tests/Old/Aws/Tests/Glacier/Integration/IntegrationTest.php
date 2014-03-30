<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\Glacier\Integration;

use Aws\Common\Enum\Size;
use Aws\Common\Exception\MultipartUploadException;
use Aws\Glacier\GlacierClient;
use Aws\Glacier\Model\MultipartUpload\AbstractTransfer as Transfer;
use Aws\Glacier\Model\MultipartUpload\UploadBuilder;
use Aws\Glacier\Model\MultipartUpload\UploadPart;
use Aws\Glacier\Model\MultipartUpload\UploadPartGenerator;
use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use Guzzle\Http\ReadLimitEntityBody;

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
            $this->client->waitUntil('VaultExists', array('vaultName' => $vault, 'waiter.max_attempts' => 3));
        }
        $listVaults = $this->client->getIterator('ListVaults', array('limit' => '5'));
        $vaultList = array_filter(iterator_to_array($listVaults), $getVaultList);
        $this->assertCount(5, $vaultList);

        // Delete vaults and verify deletion
        foreach ($vaults as $vault) {
            $this->client->deleteVault(array('vaultName' => $vault));
            $this->client->waitUntil('VaultNotExists', array('vaultName' => $vault));
        }
        $listVaults = $this->client->getIterator('ListVaults');
        $vaultList = array_filter(iterator_to_array($listVaults), $getVaultList);
        $this->assertCount(0, $vaultList);
    }

    public function testUploadAndDeleteArchives()
    {
        self::log('Create a 6MB+ string of test data to upload.');
        $length   = 6 * Size::MB + 425;
        $content  = EntityBody::factory(str_repeat('x', $length));
        $partSize = 4 * Size::MB;

        self::log('Perform a single upload.');
        $archiveId = $this->client->uploadArchive(array(
            'vaultName'          => self::TEST_VAULT,
            'archiveDescription' => 'Foo   bar   1',
            'body'               => $content,
        ))->get('archiveId');
        $this->assertNotEmpty($archiveId);

        self::log('Delete the archive that was just uploaded.');
        $this->client->deleteArchive(array(
            'vaultName' => self::TEST_VAULT,
            'archiveId' => $archiveId
        ));

        sleep(3);

        self::log('Initiate a multipart upload with a part size of ' . $partSize . ' bytes.');
        $generator = UploadPartGenerator::factory($content, $partSize);
        $this->assertEquals($length, $generator->getArchiveSize());
        $uploadId = $this->client->initiateMultipartUpload(array(
            'vaultName'          => self::TEST_VAULT,
            'archiveDescription' => 'Foo   bar   2',
            'partSize'           => $partSize,
        ))->get('uploadId');
        /** @var $part UploadPart */
        foreach ($generator as $part) {
            self::log('Upload bytes ' . join('-', $part->getRange()) . '.');
            $this->client->uploadMultipartPart(array(
                'vaultName'     => self::TEST_VAULT,
                'uploadId'      => $uploadId,
                'range'         => $part->getFormattedRange(),
                'checksum'      => $part->getChecksum(),
                'ContentSHA256' => $part->getContentHash(),
                'body'          => new ReadLimitEntityBody($content, $part->getSize(), $part->getOffset()),
            ));
            sleep(3);
        }
        self::log('Complete the multipart upload.');
        $archiveId = $this->client->completeMultipartUpload(array(
            'vaultName'   => self::TEST_VAULT,
            'uploadId'    => $uploadId,
            'archiveSize' => $generator->getArchiveSize(),
            'checksum'    => $generator->getRootChecksum(),
        ))->get('archiveId');
        $this->assertNotEmpty($archiveId);

        self::log('Delete the archive that was just uploaded in parts.');
        $this->client->deleteArchive(array(
            'vaultName' => self::TEST_VAULT,
            'archiveId' => $archiveId
        ));
    }

    public function testMultipartUploadAbstractions()
    {
        $source = EntityBody::factory(str_repeat('x', 6 * Size::MB + 425));

        /** @var $transfer Transfer */
        $transfer = UploadBuilder::newInstance()
            ->setClient($this->client)
            ->setSource($source)
            ->setVaultName(self::TEST_VAULT)
            ->setPartSize(Size::MB)
            ->setArchiveDescription('Foo   bar   3')
            ->build();

        $transfer->getEventDispatcher()->addListener($transfer::BEFORE_PART_UPLOAD, function ($event) {
            static $count = 0;
            if ($count > 2) {
                throw new \Exception;
            }
            $count++;
        });

        try {
            $transfer->upload();
            $serializedState = null;
            $this->fail('Unexpected code execution - exit point 1');
        } catch (MultipartUploadException $e) {
            $serializedState = serialize($e->getState());
        }

        $state = unserialize($serializedState);
        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\TransferState', $state);

        /** @var $transfer Transfer */
        $transfer = UploadBuilder::newInstance()
            ->setClient($this->client)
            ->setSource($source)
            ->setVaultName(self::TEST_VAULT)
            ->resumeFrom($state)
            ->build();

        try {
            $result = $transfer->upload();
        } catch (MultipartUploadException $e) {
            $result = null;
            $this->fail('Unexpected code execution - exit point 2');
        }

        $this->assertNotEmpty($result['archiveId']);
        $this->assertEquals($result['checksum'], $transfer->getState()->getPartGenerator()->getRootChecksum());

        $this->client->deleteArchive(array(
            'vaultName' => self::TEST_VAULT,
            'archiveId' => $result['archiveId']
        ));
    }
}
