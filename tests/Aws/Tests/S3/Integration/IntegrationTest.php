<?php

namespace Aws\Tests\S3\Integration;

use Aws\S3\Enum\Group;
use Aws\S3\Enum\Permission;
use Aws\S3\Model\Acl;
use Aws\S3\Model\AclBuilder;
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

    public static function setUpBeforeClass()
    {
        $client = self::getServiceBuilder()->get('s3');
        $bucket = self::getResourcePrefix() . '-s3-test';
        self::log("Creating the {$bucket} bucket");
        $client->createBucket(array('bucket' => $bucket))->execute();
        // Create the bucket
        self::log("Waiting for the bucket to exist");
        $client->waitUntil('bucket_exists', $bucket);
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
        $client->deleteBucket(array('bucket' => $bucket))->execute();
        self::log("Waiting for {$bucket} to not exist");
        $client->waitUntil('bucket_not_exists', $bucket);
    }

    public function setUp()
    {
        $this->bucket = self::getResourcePrefix() . '-s3-test';
        $this->client = $this->getServiceBuilder()->get('s3');
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
        $this->client->deleteObject(array('bucket' => $this->bucket, 'key' => $key))->execute();
    }

    public function testCreatingAclWithModelsProducesCorrectXml()
    {
        // Setup grantees
        $owner    = new Grantee('owner-id', 'owner-display-name');
        $grantee1 = new Grantee('user-id', 'user-display-name');
        $grantee2 = new Grantee('foo@example.com');
        $grantee3 = new Grantee(Group::AUTHENTICATED_USERS);

        // Setup grants
        $grant1 = new Grant($grantee1, Permission::READ);
        $grant2 = new Grant($grantee2, Permission::WRITE);
        $grant3 = new Grant($grantee3, Permission::FULL_CONTROL);

        // Setup ACL
        $acl = new Acl($owner);
        $acl->addGrant($grant1);
        $acl->addGrant($grant2);
        $acl->addGrant($grant3);

        $this->assertEquals($this->fetchExpectedAclXml(), (string) $acl);
    }

    public function testCreatingAclWithBuilderProducesCorrectXml()
    {
        $acl = AclBuilder::newInstance()
            ->setOwner('owner-id', 'owner-display-name')
            ->addGrantForUser(Permission::READ, 'user-id', 'user-display-name')
            ->addGrantForEmail(Permission::WRITE, 'foo@example.com')
            ->addGrantForGroup(Permission::FULL_CONTROL, Group::AUTHENTICATED_USERS)
            ->build();

         $this->assertEquals($this->fetchExpectedAclXml(), (string) $acl);
    }

    public function testCreatingAclWithBuilderProducesCorrectHeaders()
    {
        $acl = AclBuilder::newInstance()
            ->setOwner('owner-id', 'owner-display-name')
            ->addGrantForUser(Permission::READ, 'user-id', 'user-display-name')
            ->addGrantForEmail(Permission::WRITE, 'foo@example.com')
            ->addGrantForGroup(Permission::WRITE, Group::AUTHENTICATED_USERS)
            ->build();

        $headers = array(
            'x-amz-grant-read'  => 'id="user-id"',
            'x-amz-grant-write' => 'emailAddress="foo@example.com", uri="http://acs.amazonaws.com/groups/global/AuthenticatedUsers"'
        );

        $this->assertSame($headers, $acl->getGrantHeaders());
    }

    public function testPutAndListObjects()
    {
        $acl = AclBuilder::newInstance()
            ->setOwner('owner-id', 'owner-display-name')
            ->addGrantForGroup(Permission::READ, Group::AUTHENTICATED_USERS)
            ->addGrantForGroup(Permission::READ_ACP, Group::ALL_USERS)
            ->build();

        $command = $this->client->getCommand('PutObject', array(
            'bucket'       => $this->bucket,
            'key'          => self::TEST_KEY,
            'use_md5'      => true,
            'use_expect'   => false,
            'body'         => 'åbc 123',
            'Content-Type' => 'application/foo',
            'acl'          => $acl,
            'metadata'     => array(
                'test'  => '123',
                'abc'   => '@pples'
            )
        ));

        self::log("Uploading an object");
        $result = $command->execute();
        $this->assertInstanceOf('Guzzle\Http\Message\Response', $result);
        $this->client->waitUntil('object_exists', $this->bucket . '/' . self::TEST_KEY);

        // Ensure the object was created correctly
        self::log("GETting the object");
        $result = $this->client->getObject(array(
            'bucket' => $this->bucket,
            'key'    => self::TEST_KEY
        ))->execute();
        $this->assertInstanceOf('Guzzle\Http\Message\Response', $result);
        $this->assertEquals('åbc 123', $result->getBody(true));
        $this->assertEquals('application/foo', $result->getContentType());
        $this->assertEquals('123', (string) $result->getHeader('x-amz-meta-test'));
        $this->assertEquals('@pples', (string) $result->getHeader('x-amz-meta-abc'));

        // Ensure the object was created and we can find it in the iterator
        self::log("Checking if the item is in the ListObjects results");
        $iterator = $this->client->getIterator('ListObjects', array(
            'bucket' => $this->bucket,
            'prefix' => self::TEST_KEY
        ));
        $objects = $iterator->toArray();
        $this->assertEquals(1, count($objects));
        $this->assertEquals('foo', $objects[0]['Key']);
    }

    /**
     * @depends testPutAndListObjects
     */
    public function testGetObjectAcl()
    {
        self::log("Getting the object's ACL");
        $xml = $this->client->getObjectAcl(array(
            'bucket' => $this->bucket,
            'key'    => self::TEST_KEY,
            'command.response_processing' => 'native'
        ))->execute();

        $data = array();
        foreach (Acl::fromXml($xml) as $grant) {
            $grantee = $grant->getGrantee();
            $data[$grantee->getGroupUri()] = array($grantee->getType(), $grant->getPermission());
        }

        $this->assertEquals(2, count($data));
        $this->assertArrayHasKey('http://acs.amazonaws.com/groups/global/AllUsers', $data);
        $this->assertArrayHasKey('http://acs.amazonaws.com/groups/global/AuthenticatedUsers', $data);
        $this->assertEquals(array('Group', 'READ_ACP'), $data['http://acs.amazonaws.com/groups/global/AllUsers']);
        $this->assertEquals(array('Group', 'READ'), $data['http://acs.amazonaws.com/groups/global/AuthenticatedUsers']);
    }

    public function testPutObjectsWithUtf8Keys()
    {
        self::log("Uploading an object with a UTF-8 key");
        $key = 'åbc';
        $this->client->putObject(array(
            'bucket' => $this->bucket,
            'key'    => $key,
            'body'   => 'hi'
        ))->execute();
        $this->client->waitUntil('object_exists', "{$this->bucket}/{$key}");
    }

    public function testPutCostTagging()
    {
        self::log("Adding cost tagging to a bucket");
        $command = $this->client->getCommand('PutBucketTagging');
        $command->setBucket($this->bucket)
            ->addTag('Foo', 'Bar')
            ->addTag('Baz', 'Boo');
        $command->execute();
    }

    protected function fetchExpectedAclXml()
    {
        $dir = __DIR__ . DIRECTORY_SEPARATOR;
        $xml = file_get_contents($dir . 'AccessControlPolicySample.xml');
        $xml = preg_replace('/\>\s+\</', '><', trim($xml));
        $xml = preg_replace('/\s+/', ' ', $xml);

        return $xml;
    }
}
