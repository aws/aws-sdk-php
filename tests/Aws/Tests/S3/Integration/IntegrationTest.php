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
use Guzzle\Http\Message\Request;
use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Guzzle\Plugin\History\HistoryPlugin;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const TEST_KEY = 'foo';
    const LARGE_OBJECT = '/tmp/large-object.jpg';

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
        $client->createBucket(array('Bucket' => $bucket));
        // Create the bucket
        self::log("Waiting for the bucket to exist");
        $client->waitUntil('bucket_exists', array('Bucket' => $bucket));
        sleep(5);
        // Create the bucket
        self::log("Getting owner id and display name");
        $result = $client->listBuckets();
        self::$ownerId = $result['Owner']['ID'];
        self::$displayName = $result['Owner']['DisplayName'];
    }

    public static function tearDownAfterClass()
    {
        unlink(self::LARGE_OBJECT);
        $client = self::getServiceBuilder()->get('s3');
        $bucket = self::getResourcePrefix() . '-s3-test';
        self::log("Clearing the contents of the {$bucket} bucket");
        // Delete the bucket
        $clear = new ClearBucket($client, $bucket);
        $clear->clear();
        self::log("Deleting the {$bucket} bucket");
        $client->deleteBucket(array('Bucket' => $bucket));
        self::log("Waiting for {$bucket} to not exist");
        $client->waitUntil('bucket_not_exists', array('Bucket' => $bucket));
        // Delete the other bucket
        $bucket = self::getResourcePrefix() . '_path';
        $clear = new ClearBucket($client, $bucket);
        $clear->clear();
        self::log("Deleting the {$bucket} bucket");
        $client->deleteBucket(array('Bucket' => $bucket));
        self::log("Waiting for {$bucket} to not exist");
        $client->waitUntil('bucket_not_exists', array('Bucket' => $bucket));
    }

    public function setUp()
    {
        $this->bucket = self::getResourcePrefix() . '-s3-test';
        $this->client = $this->getServiceBuilder()->get('s3', true);
        $this->acp = AcpBuilder::newInstance()
            ->setOwner(self::$ownerId, self::$displayName)
            ->addGrantForGroup(Permission::READ, Group::AUTHENTICATED_USERS)
            ->addGrantForGroup(Permission::READ_ACP, Group::ALL_USERS)
            ->build();
    }

    public function testSignsPathBucketsCorrectly()
    {
        try {
            $client = self::getServiceBuilder()->get('s3');
            $bucket = self::getResourcePrefix() . '_path';
            self::log("Creating the {$bucket} bucket");
            $client->createBucket(array('Bucket' => $bucket));
            // Create the bucket
            self::log("Waiting for the bucket to exist");
            $client->waitUntil('bucket_exists', array('Bucket' => $bucket));
            $this->client->putObject(array(
                'Bucket' => $bucket,
                'Key'    => self::TEST_KEY,
                'Body'   => '123'
            ));
            $this->client->waitUntil('bucket_exists', array('Bucket' => $bucket));
            $this->client->getBucketLocation(array('Bucket' => $bucket));
        } catch (\Aws\S3\Exception\SignatureDoesNotMatchException $e) {
            echo $e->getResponse()->getRequest()->getParams()->get('aws.string_to_sign') . "\n";
            echo $e->getResponse() . "\n";
            throw $e;
        }
    }

    public function testHeadBucket()
    {
        $result = $this->client->headBucket(array('Bucket' => $this->bucket));
        $this->assertNotNull($result['RequestId']);
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetService()
    {
        $result = $this->client->listBuckets();
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
        $this->client->getBucketCors(array('Bucket' => $this->bucket));
    }

    /**
     * @depends testHeadBucket
     * @expectedException \Aws\S3\Exception\NoSuchLifecycleConfigurationException
     */
    public function testGetBucketLifecycle()
    {
        $this->log(__METHOD__);
        $this->client->getBucketLifecycle(array('Bucket' => $this->bucket));
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketLocation()
    {
        $this->log(__METHOD__);
        $result = $this->client->getBucketLocation(array('Bucket' => $this->bucket));
        $this->assertSame('', $result['Location']);
    }

    /**
     * @depends testHeadBucket
     */
    public function testPutBucketLocation()
    {
        $this->log(__METHOD__);
        $bucketName = self::getResourcePrefix() . '-s3eutest';
        try {
            $this->client->headBucket(array('Bucket' => $bucketName));
        } catch (\Exception $e) {
            $this->client->createBucket(array(
                'Bucket'             => $bucketName,
                'LocationConstraint' => 'EU'
            ));
        }
        $this->client->waitUntil('bucket_exists', array('Bucket' => $bucketName));
        $result = $this->client->getBucketLocation(array('Bucket' => $bucketName));
        $this->assertEquals('EU', $result['Location']);
        $this->client->deleteBucket(array('Bucket' => $bucketName));
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketLogging()
    {
        $this->log(__METHOD__);
        $result = $this->client->getBucketLogging(array('Bucket' => $this->bucket));
        $this->assertNull($result['LoggingEnabled']);
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketNotification()
    {
        $this->log(__METHOD__);
        $this->client->getBucketNotification(array('Bucket' => $this->bucket));
    }

    /**
     * @depends testHeadBucket
     * @expectedException \Aws\S3\Exception\NoSuchBucketPolicyException
     */
    public function testGetBucketPolicy()
    {
        $this->log(__METHOD__);
        $this->client->getBucketPolicy(array('Bucket' => $this->bucket));
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketRequestPayment()
    {
        $this->log(__METHOD__);
        $result = $this->client->getBucketRequestPayment(array('Bucket' => $this->bucket));
        $this->assertEquals('BucketOwner', $result['Payer']);
    }

    /**
     * @depends testHeadBucket
     */
    public function testGetBucketVersioning()
    {
        $this->log(__METHOD__);
        $this->client->getBucketVersioning(array('Bucket' => $this->bucket));
    }

    /**
     * @depends testHeadBucket
     * @expectedException \Aws\S3\Exception\NoSuchWebsiteConfigurationException
     */
    public function testGetBucketWebsite()
    {
        $this->log(__METHOD__);
        $this->client->getBucketWebsite(array('Bucket' => $this->bucket));
    }

    /**
     * @depends testHeadBucket
     */
    public function testPutAndListObjects()
    {
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $command = $this->client->getCommand('PutObject', array(
            'Bucket'       => $this->bucket,
            'Key'          => self::TEST_KEY,
            'ContentMD5'   => true,
            'Body'         => 'åbc 123',
            'ContentType' => 'application/foo',
            'ACP'          => $this->acp,
            'Metadata'     => array(
                'test'  => '123',
                'abc'   => '@pples',
                'foo'   => '',
                'null'  => null,
                'space' => ' ',
                'zero'  => '0',
                'trim'  => ' hi '
            )
        ));

        self::log("Uploading an object");
        $result = $command->execute();
        // make sure the expect header wasn't sent
        $this->assertNull($command->getRequest()->getHeader('Expect'));
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $result);
        $this->assertNotEmpty($result['ETag']);
        $this->client->waitUntil('object_exists', array('Bucket' => $this->bucket, 'Key' => self::TEST_KEY));

        self::log("HEAD the object");
        $result = $this->client->headObject(array(
            'Bucket' => $this->bucket,
            'Key'    => self::TEST_KEY
        ));
        $this->assertEquals('application/foo', $result['ContentType']);
        $this->assertEquals('123', $result['Metadata']['test']);
        $this->assertEquals('@pples', $result['Metadata']['abc']);

        // Ensure the object was created correctly
        self::log("GETting the object");
        $result = $this->client->getObject(array(
            'Bucket' => $this->bucket,
            'Key'    => self::TEST_KEY
        ));
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
     * @depends testSignsPathBucketsCorrectly
     */
    public function testCanSendRawHttpRequests()
    {
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $this->assertEquals(200, $this->client->get('/')->send()->getStatusCode());
        $this->assertEquals(200, $this->client->put('/' . $this->bucket . '/hello', array(), 'testing')->send()->getStatusCode());
        $this->client->get('/' . self::getResourcePrefix() . '_path')->send();
        $path = self::getResourcePrefix() . '_path/' . self::TEST_KEY;
        $this->client->get("/{$path}")->send();
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPutObjectAcl()
    {
        self::log("Setting a custom object ACL");
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $command = $this->client->getCommand('PutObjectAcl', array(
            'Bucket' => $this->bucket,
            'Key'    => self::TEST_KEY,
            'ACP'    => $this->acp
        ));
        $result = $command->execute();
        $this->assertContains('Grantee', (string) $command->getRequest()->getBody());
        $this->assertEquals(array('RequestId'), array_keys($result->toArray()));
        // Ensure that the RequestId model value is being populated correctly
        $this->assertEquals((string) $command->getResponse()->getHeader('x-amz-request-id'), $result['RequestId']);
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
        ));

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
    public function testUploadsObjectsWithKeysMatchingBucketName()
    {
        self::log("Uploading an object with a name the same as the bucket");
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $key = $this->bucket . '-foo';
        $command = $this->client->getCommand('PutObject', array(
            'Bucket' => $this->bucket,
            'Key'    => $key,
            'Body'   => 'hi'
        ));
        $command->execute();
        $this->assertEquals("/{$this->bucket}-foo", $command->getRequest()->getPath());
        $this->assertEquals("{$this->bucket}.s3.amazonaws.com", $command->getRequest()->getHost());
        $this->client->waitUntil('object_exists', array('Bucket' => $this->bucket, 'Key' => $key));
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPutObjectsWithUtf8Keys()
    {
        self::log("Uploading an object with a UTF-8 key");
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $key = 'åbc';

        try {
            $result = $this->client->putObject(array(
                'Bucket' => $this->bucket,
                'Key'    => $key,
                'Body'   => 'hi'
            ));
            $this->assertContains($this->bucket, $result['ObjectURL']);
        } catch (\Aws\S3\Exception\SignatureDoesNotMatchException $e) {
            echo $e->getResponse()->getRequest()->getParams()->get('aws.string_to_sign') . "\n";
            echo $e->getResponse() . "\n";
            throw $e;
        }
        $this->client->waitUntil('object_exists', array('Bucket' => $this->bucket, 'Key' => $key));
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPutObjectGuessesContentType()
    {
        self::log("Uploading an object and guessing Content-Type");
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $key = 'file';
        $command = $this->client->getCommand('PutObject', array(
            'Bucket' => $this->bucket,
            'Key'    => $key,
            'Body'   => fopen(__FILE__, 'r')
        ));
        $command->execute();
        $this->assertEquals('text/x-php', (string) $command->getRequest()->getHeader('Content-Type'));
    }

    /**
     * @depends testPutObjectsWithUtf8Keys
     */
    public function testCopiesObjects()
    {
        self::log("Copying the object");
        $result = $this->client->copyObject(array(
            'Bucket'               => $this->bucket,
            'Key'                  => 'copy-key',
            'CopySource'           => $this->bucket . '/' . self::TEST_KEY,
            'MetadataDirective'    => 'COPY',
            'ServerSideEncryption' => 'AES256'
        ));
        $this->assertNotEmpty($result['ETag']);
        $this->assertEquals('AES256', $result['ServerSideEncryption']);
        $this->assertNotEmpty($result['LastModified']);
        $this->client->waitUntil('object_exists', array('Bucket' => $this->bucket, 'Key' => 'copy-key'));
    }

    /**
     * @depends testPutObjectsWithUtf8Keys
     */
    public function testMultipartUploads()
    {
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $this->log('Initiating an upload');
        $result = $this->client->createMultipartUpload(array(
            'Bucket'   => $this->bucket,
            'Key'      => 'big',
            'Metadata' => array('foo' => 'bar')
        ));
        $this->assertNotEmpty($result['UploadId']);
        $this->assertNotEmpty($result['Key']);
        $this->assertNotEmpty($result['Bucket']);
        $uploadId = $result['UploadId'];
        sleep(1);

        $this->log('Getting uploads');
        $command = $this->client->getCommand('ListMultipartUploads', array(
            'Bucket'   => $this->bucket,
            'UploadId' => $uploadId
        ));
        $result = $command->execute();
        $this->assertEquals($this->bucket, $result['Bucket']);
        $this->assertInternalType('array', $result['Uploads']);
        $this->assertSame(false, $result['IsTruncated']);
        $this->log('Aborting the upload');
        sleep(2);
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $command = $this->client->getCommand('AbortMultipartUpload', array(
            'Bucket'   => $this->bucket,
            'Key'      => 'big',
            'UploadId' => $uploadId
        ));
        $result = $command->execute();
        $this->assertEquals(array('RequestId'), array_keys($result->toArray()));
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPutBucketTagging()
    {
        self::log("Adding tags to a bucket");
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
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
        $result = $this->client->getBucketTagging(array('Bucket' => $this->bucket));
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
        $http = new Client(array('ssl.certificate_authority' => false));
        /** @var $response \Guzzle\Http\Message\Response */
        $response = $http->post($form['action'], null, $data)
            ->addPostFiles(array('file' => __DIR__ . DIRECTORY_SEPARATOR . $key))
            ->send();

        // Verify that the response is as expected
        $this->assertEquals(204, $response->getStatusCode());
        $this->assertEquals("https://{$this->bucket}.s3.amazonaws.com/{$key}", $response->getLocation());

        // Delete the object
        $this->client->deleteObject(array('Bucket' => $this->bucket, 'Key' => $key));
    }

    public function testUsesTieredStorage()
    {
        self::log("Uploading an object then placing in Glacier");
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $key = 'abc';
        $this->client->putObject(array(
            'Bucket' => $this->bucket,
            'Key'    => $key,
            'Body'   => 'hi'
        ));
        self::log("Waiting until the object exists");
        $this->client->waitUntil('object_exists', array('Bucket' => $this->bucket, 'Key' => $key));
        self::log("Moving the object to glacier by setting a lifecycle policy on the object");
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $command = $this->client->getCommand('PutBucketLifecycle', array(
            'Bucket' => $this->bucket,
            'Rules' => array(
                array(
                    'ID' => 'foo-rule',
                    'Status' => 'Enabled',
                    'Prefix' => 'a',
                    'Transition' => array(
                        'Days'         => 0,
                        'StorageClass' => 'GLACIER'
                    )
                )
            )
        ));

        $result = $command->execute();
        $this->assertNotNull($result['RequestId']);
        $this->assertContains(
            '<Transition><Days>0</Days><StorageClass>GLACIER</StorageClass></Transition>',
            (string) $command->getRequest()
        );
    }

    public function testMultipartUpload()
    {
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        self::log('Creating a 100MB object in /tmp/large-object.jpg');
        $handle = fopen('/tmp/large-object.jpg', 'w+');
        $part = str_repeat('.', 1000);
        for ($i = 0; $i < (1024 * 1024 * 5) / 1000; $i++) {
            fwrite($handle, $part);
        }
        fclose($handle);

        $history = new HistoryPlugin();
        $this->client->addSubscriber($history);

        self::log('Initiating transfer');
        $transfer = UploadBuilder::newInstance()
            ->setBucket($this->bucket)
            ->setKey('large_key')
            ->setSource(self::LARGE_OBJECT)
            ->calculateMd5(true)
            ->calculatePartMd5(true)
            ->setOption('ACL', 'public-read')
            ->setClient($this->client)
            ->build();

        $this->assertEquals(1, $history->count());
        $this->assertTrue($history->getLastRequest()->getQuery()->hasKey('uploads'));
        $this->assertEquals('image/jpeg', (string) $history->getLastRequest()->getHeader('Content-Type'));
        $history->clear();

        self::log('Uploading parts');
        $transfer->upload();
        $this->assertEquals(3, $history->count());
        $requests = $history->getIterator()->getArrayCopy();
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('PUT', $requests[1]->getMethod());
        $this->assertEquals('POST', $requests[2]->getMethod());
    }

    public function prefixKeyProvider()
    {
        return array(
            array('foo /baz/bar!', 'foo /baz/bar!', '/foo%20/baz/bar%21'),
            array('/foo', 'foo', '/foo')
        );
    }

    /**
     * @depends testPutAndListObjects
     * @dataProvider prefixKeyProvider
     */
    public function testWorksWithPrefixKeys($key, $cleaned, $encoded)
    {
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $command = $this->client->getCommand('PutObject', array(
            'Bucket'     => $this->bucket,
            'Key'        => $key,
            'SourceFile' => __FILE__
        ));
        $command->execute();
        // Ensure the path is correct
        $this->assertEquals($encoded, $command->getRequest()->getPath());
        // Ensure the key is not an array and is returned to it's previous value
        $this->assertEquals($key, $command['Key']);

        $this->client->waitUntil('object_exists', array('Bucket' => $this->bucket, 'Key' => $key));
        $result = $this->client->getObject(array('Bucket' => $this->bucket, 'Key' => $key));
        $this->assertEquals(file_get_contents(__FILE__), (string) $result['Body']);

        // Test using path style hosting
        $command = $this->client->getCommand('DeleteObject', array(
            'Bucket'    => $this->bucket,
            'Key'       => $key,
            'PathStyle' => true
        ));
        $command->execute();
        $this->assertEquals('/' . $this->bucket . $encoded, $command->getRequest()->getPath());
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPreSignedUrlAllowsLiterals()
    {
        self::log('Uploading an object with a space in the key and literals');
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $key = 'foo baz%20bar!';
        $this->client->putObject(array(
            'Bucket' => $this->bucket,
            'Key'    => $key,
            'Body'   => 'hi'
        ));
        $this->client->waitUntil('object_exists', array('Bucket' => $this->bucket, 'Key' => $key));
        self::log('Creating an downloading using a pre-signed URL');
        $extra = urlencode("attachment; filename=\"{$key}\"");
        $encodedKey = rawurlencode($key);
        $request = $this->client->get("{$this->bucket}/{$encodedKey}?response-content-disposition={$extra}");
        $url = $this->client->createPresignedUrl($request, '+10 minutes');
        self::log($url);
        $client = new Client();
        $this->assertEquals('hi', file_get_contents($url));
        $this->assertEquals('hi', $client->get($url)->send()->getBody(true));
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testPreSignedUrlAllowsSpecialCharacters()
    {
        self::log('Uploading an object with a space in the key');
        $this->client->waitUntil('bucket_exists', array('Bucket' => $this->bucket));
        $key = 'foo baz bar!';
        $this->client->putObject(array(
            'Bucket' => $this->bucket,
            'Key'    => $key,
            'Body'   => 'hi'
        ));
        $this->client->waitUntil('object_exists', array('Bucket' => $this->bucket, 'Key' => $key));

        self::log('Creating an downloading using a pre-signed URL with command');
        $command = $this->client->getCommand('GetObject', array(
            'Bucket' => $this->bucket,
            'Key'    => $key
        ));
        $url = $command->createPresignedUrl('+100 minutes');
        self::log($url);
        $this->assertEquals('hi', file_get_contents($url));

        self::log('Creating an downloading using a pre-signed URL');
        $extra = urlencode("attachment; filename=\"{$key}\"");
        $request = $this->client->get("{$this->bucket}/{$key}?response-content-disposition={$extra}");
        $url = $this->client->createPresignedUrl($request, '+10 minutes');
        self::log($url);
        $client = new Client();
        $this->assertEquals('hi', file_get_contents($url));
        $this->assertEquals('hi', $client->get($url)->send()->getBody(true));
    }
}
