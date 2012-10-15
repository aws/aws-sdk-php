<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Tests\S3\Integration;

use Aws\S3\Enum\Group;
use Aws\S3\Enum\Permission;
use Aws\S3\Model\Acp;
use Aws\S3\Model\AcpBuilder;
use Aws\S3\Model\Grant;
use Aws\S3\Model\Grantee;
use Aws\S3\Model\PostObject;
use Aws\S3\S3Client;
use Aws\S3\Model\ClearBucket;
use Guzzle\Http\Client;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const TEST_KEY = 'foo';

    /**
     * @var S3Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $bucket;

    /**
     * @var Acp
     */
    protected $acp;

    protected static $ownerId;
    protected static $displayName;

    public static function setUpBeforeClass()
    {
        $client = self::getServiceBuilder()->get('s3');
        $bucket = self::getResourcePrefix() . '-s3-test';
        self::log("Creating the {$bucket} bucket");
        $client->createBucket(array(
            'Bucket' => $bucket
        ))->execute();
        // Create the bucket
        self::log("Waiting for the bucket to exist");
        $client->waitUntil('bucket_exists', $bucket);

        // Create the bucket
        self::log("Getting owner id and display name");
        $result = $client->listBuckets()->execute();
        self::$ownerId = $result['Owner']['ID'];
        self::$displayName = $result['Owner']['DisplayName'];
    }

    public static function tearDownAfterClass()
    {
        $client = self::getServiceBuilder()->get('s3');
        $bucket = self::getResourcePrefix() . '-s3-test';
        self::log("Clearing the contents of the {$bucket} bucket");
        // Delete the bucket
        $clear = new ClearBucket($client, $bucket);
        $clear->clear();
        self::log("Deleting the {$bucket} bucket");
        $client->deleteBucket(array(
            'Bucket' => $bucket
        ))->execute();
        self::log("Waiting for {$bucket} to not exist");
        $client->waitUntil('bucket_not_exists', $bucket);
    }

    public function setUp()
    {
        $this->bucket = self::getResourcePrefix() . '-s3-test';
        $this->client = $this->getServiceBuilder()->get('s3', true);
        //$this->client->addSubscriber(\Guzzle\Plugin\Log\LogPlugin::getDebugPlugin());
        //$this->client->addSubscriber(\Guzzle\Plugin\Log\LogPlugin::getDebugPlugin());
        $this->acp = AcpBuilder::newInstance()
            ->setOwner(self::$ownerId, self::$displayName)
            ->addGrantForGroup(Permission::READ, Group::AUTHENTICATED_USERS)
            ->addGrantForGroup(Permission::READ_ACP, Group::ALL_USERS)
            ->build();
    }

    public function testHeadBucket()
    {
        $result = $this->client->headBucket(array(
            'Bucket' => $this->bucket
        ))->execute();
        $this->assertEquals(200, $result['StatusCode']);
        $this->assertNotNull($result['Date']);
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetService()
    {
        $result = $this->client->listBuckets()->execute();
        $this->assertNotEmpty($result['Owner']);
        $this->assertNotEmpty($result['Owner']['ID']);
        $this->assertNotEmpty($result['Owner']['DisplayName']);
        $this->assertNotEmpty($result['Buckets']);
        $found = false;
        foreach ($result['Buckets'] as $bucket) {
            if ($bucket['Name'] == $this->bucket) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found);
    }

    /**
     * @depends testHeadBucket
     * @expectedException \Aws\S3\Exception\NoSuchCORSConfigurationException
     */
    public function testGetBucketCors()
    {
        $this->log(__METHOD__);
        $this->client->getBucketCors(array('Bucket' => $this->bucket))->execute();
    }

    /**
     * @depends testHeadBucket
     * @expectedException \Aws\S3\Exception\NoSuchLifecycleConfigurationException
     */
    public function testGetBucketLifecycle()
    {
        $this->log(__METHOD__);
        $this->client->getBucketLifecycle(array('Bucket' => $this->bucket))->execute();
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketLocation()
    {
        $this->log(__METHOD__);
        $result = $this->client->getBucketLocation(array('Bucket' => $this->bucket))->execute();
        $this->assertSame('', $result['Location']);
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketLogging()
    {
        $this->log(__METHOD__);
        $result = $this->client->getBucketLogging(array('Bucket' => $this->bucket))->execute();
        $this->assertNull($result['LoggingEnabled']);
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketNotification()
    {
        $this->log(__METHOD__);
        $this->client->getBucketNotification(array('Bucket' => $this->bucket))->execute();
    }

    /**
     * @depends testHeadBucket
     * @expectedException \Aws\S3\Exception\NoSuchBucketPolicyException
     */
    public function testGetBucketPolicy()
    {
        $this->log(__METHOD__);
        $this->client->getBucketPolicy(array('Bucket' => $this->bucket))->execute();
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketRequestPayment()
    {
        $this->log(__METHOD__);
        $result = $this->client->getBucketRequestPayment(array('Bucket' => $this->bucket))->execute();
        $this->assertEquals('BucketOwner', $result['Payer']);
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketVersioning()
    {
        $this->log(__METHOD__);
        $this->client->getBucketVersioning(array('Bucket' => $this->bucket))->execute();
    }

    /**
     * @depends testHeadBucket
     * @expectedException \Aws\S3\Exception\NoSuchWebsiteConfigurationException
     */
    public function testGetBucketWebsite()
    {
        $this->log(__METHOD__);
        $this->client->getBucketWebsite(array('Bucket' => $this->bucket))->execute();
    }

    /**
     * @depends testHeadBucket
     */
    public function testPutAndListObjects()
    {
        $command = $this->client->getCommand('PutObject', array(
            'Bucket'       => $this->bucket,
            'Key'          => self::TEST_KEY,
            'ContentMD5'   => true,
            'Body'         => 'åbc 123',
            'ContentType' => 'application/foo',
            'ACP'          => $this->acp,
            'Metadata'     => array(
                'test'  => '123',
                'abc'   => '@pples'
            )
        ));

        self::log("Uploading an object");
        $result = $command->execute();
        // make sure the expect header wasn't sent
        $this->assertNull($command->getRequest()->getHeader('Expect'));
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $result);
        $this->assertNotEmpty($result['ETag']);
        $this->client->waitUntil('object_exists', $this->bucket . '/' . self::TEST_KEY);

        self::log("HEAD the object");
        $result = $this->client->headObject(array(
            'Bucket' => $this->bucket,
            'Key'    => self::TEST_KEY
        ))->execute();
        $this->assertEquals('application/foo', $result['ContentType']);
        $this->assertEquals('123', $result['Metadata']['test']);
        $this->assertEquals('@pples', $result['Metadata']['abc']);

        // Ensure the object was created correctly
        self::log("GETting the object");
        $result = $this->client->getObject(array(
            'Bucket' => $this->bucket,
            'Key'    => self::TEST_KEY
        ))->execute();
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $result);
        $this->assertInstanceOf('Guzzle\Http\EntityBody', $result['Body']);
        $this->assertEquals('åbc 123', (string) $result['Body']);
        $this->assertEquals('application/foo', $result['ContentType']);
        $this->assertEquals('123', $result['Metadata']['test']);
        $this->assertEquals('@pples', $result['Metadata']['abc']);

        // Ensure the object was created and we can find it in the iterator
        self::log("Checking if the item is in the ListObjects results");
        $iterator = $this->client->getIterator('ListObjects', array(
            'Bucket' => $this->bucket,
            'Prefix' => self::TEST_KEY
        ));
        $objects = $iterator->toArray();
        $this->assertEquals(1, count($objects));
        $this->assertEquals('foo', $objects[0]['Key']);
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPutObjectAcl()
    {
        self::log("Setting a custom object ACL");
        $command = $this->client->putObjectAcl(array(
            'Bucket' => $this->bucket,
            'Key'    => self::TEST_KEY,
            'ACP'    => $this->acp
        ));
        $result = $command->execute();
        $this->assertContains('Grantee', (string) $command->getRequest()->getBody());
        $this->assertEquals(array(), $result->toArray());
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testGetObjectAcl()
    {
        self::log("Getting the object's ACL");
        $model = $this->client->getObjectAcl(array(
            'Bucket' => $this->bucket,
            'Key'    => self::TEST_KEY
        ))->execute();

        $data = array();
        foreach (Acp::fromArray($model->toArray()) as $grant) {
            $grantee = $grant->getGrantee();
            $data[$grantee->getGroupUri()] = array($grantee->getType(), $grant->getPermission());
        }

        $this->assertEquals(2, count($data));
        $this->assertArrayHasKey('http://acs.amazonaws.com/groups/global/AllUsers', $data);
        $this->assertArrayHasKey('http://acs.amazonaws.com/groups/global/AuthenticatedUsers', $data);
        $this->assertEquals(array('Group', 'READ_ACP'), $data['http://acs.amazonaws.com/groups/global/AllUsers']);
        $this->assertEquals(array('Group', 'READ'), $data['http://acs.amazonaws.com/groups/global/AuthenticatedUsers']);
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPutObjectsWithUtf8Keys()
    {
        self::log("Uploading an object with a UTF-8 key");
        $key = 'åbc';
        $this->client->putObject(array(
            'Bucket' => $this->bucket,
            'Key'    => $key,
            'Body'   => 'hi'
        ))->execute();
        $this->client->waitUntil('object_exists', "{$this->bucket}/{$key}");
    }

    /**
     * @depends testPutObjectsWithUtf8Keys
     */
    public function testCopiesObjects()
    {
        self::log("Copying the object");
        $command = $this->client->copyObject(array(
            'Bucket'               => $this->bucket,
            'Key'                  => 'copy-key',
            'CopySource'           => $this->bucket . '/' . self::TEST_KEY,
            'MetadataDirective'    => 'COPY',
            'ServerSideEncryption' => 'AES256'
        ));
        $result = $command->execute();
        $this->assertNotEmpty($result['ETag']);
        $this->assertEquals('AES256', $result['ServerSideEncryption']);
        $this->assertNotEmpty($result['LastModified']);
        $this->client->waitUntil('object_exists', "{$this->bucket}/copy-key");
    }

    /**
     * @depends testPutObjectsWithUtf8Keys
     */
    public function testMultipartUploads()
    {
        $this->log('Initiating an upload');
        $command = $this->client->createMultipartUpload(array(
            'Bucket'   => $this->bucket,
            'Key'      => 'big',
            'Metadata' => array(
                'foo' => 'bar'
            )
        ));
        $result = $command->execute();
        $this->assertNotEmpty($result['UploadId']);
        $this->assertNotEmpty($result['Key']);
        $this->assertNotEmpty($result['Bucket']);
        $uploadId = $result['UploadId'];
        sleep(1);

        $this->log('Getting uploads');
        $command = $this->client->listMultipartUploads(array(
            'Bucket'   => $this->bucket,
            'Key'      => 'big',
            'UploadId' => $uploadId
        ));
        $result = $command->execute();
        $this->assertEquals($this->bucket, $result['Bucket']);
        $this->assertInternalType('array', $result['Uploads']);
        $this->assertSame(false, $result['IsTruncated']);

        $this->log('Aborting the upload');
        $command = $this->client->abortMultipartUpload(array(
            'Bucket'   => $this->bucket,
            'Key'      => 'big',
            'UploadId' => $uploadId
        ));
        $result = $command->execute();
        $this->assertEquals(array(), $result->toArray());
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPutBucketTagging()
    {
        self::log("Adding tags to a bucket");
        $command = $this->client->getCommand('PutBucketTagging', array(
            'Bucket' => $this->bucket,
            'TagSet' => array(
                array(
                    'Key'   => 'Foo',
                    'Value' => 'Bar'
                ),
                array(
                    'Key'   => 'Baz',
                    'Value' => 'Boo'
                )
            )
        ));
        $command->execute();
        $this->assertNull($command->getRequest()->getHeader('Expect'));
    }

    /**
     * @depends testPutBucketTagging
     */
    public function testGetBucketTagging()
    {
        $this->log(__METHOD__);
        $result = $this->client->getBucketTagging(array('Bucket' => $this->bucket))->execute();
        $this->assertNotEmpty($result['TagSet']);
    }

    public function testPostObjectProducesCorrectParametersForPost()
    {
        $key = 'dummy.txt';

        // Create the PostObject and fetch the data
        $post = new PostObject($this->client, $this->bucket);
        $post->prepareData();
        $form = $post->getFormAttributes();
        $data = $post->getFormInputs();

        // Use Guzzle to simulate a browser POST upload to S3
        $http = new Client();
        /** @var $response \Guzzle\Http\Message\Response */
        $response = $http->post($form['action'], null, $data)
            ->addPostFiles(array('file' => __DIR__ . DIRECTORY_SEPARATOR . $key))
            ->send();

        // Verify that the response is as expected
        $this->assertEquals(204, $response->getStatusCode());
        $this->assertEquals("https://{$this->bucket}.s3.amazonaws.com/{$key}", $response->getLocation());

        // Delete the object
        $this->client->deleteObject(array('Bucket' => $this->bucket, 'Key' => $key))->execute();
    }
}
