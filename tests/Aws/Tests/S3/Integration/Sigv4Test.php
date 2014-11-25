<?php
namespace Aws\Tests\S3\Integration;

use Aws\S3\S3Client;
use Aws\S3\Model\ClearBucket;

/**
 * @group integration
 */
class Sigv4Test extends \Aws\Tests\IntegrationTestCase
{
    /** @var S3Client */
    protected $client;

    /** @var string */
    protected $bucket;

    public static function setUpBeforeClass()
    {
        $client = self::getServiceBuilder()->get('s3', array('signature' => 'v4'));
        $bucket = self::getResourcePrefix() . '-s3-test';
        $client->createBucket(array('Bucket' => $bucket));
        self::log("Waiting for the bucket to exist");
        $client->waitUntil('bucket_exists', array('Bucket' => $bucket));
        sleep(5);
    }

    public static function tearDownAfterClass()
    {
        $client = self::getServiceBuilder()->get('s3', array('signature' => 'v4'));
        $bucket = self::getResourcePrefix() . '-s3-test';
        self::log("Clearing the contents of the {$bucket} bucket");
        $clear = new ClearBucket($client, $bucket);
        $clear->clear();
        self::log("Deleting the {$bucket} bucket");
        $client->deleteBucket(array('Bucket' => $bucket));
    }

    public function setUp()
    {
        $this->bucket = self::getResourcePrefix() . '-s3-test';
        $this->client = $this->getServiceBuilder()->get('s3', array('signature' => 'v4'));
    }

    public function testSignsEmptyRequests()
    {
        $this->client->headBucket(array('Bucket' => $this->bucket));
    }

    public function testSignsEmptyPayloadCorrectly()
    {
        $this->client->putObject(array(
            'Bucket' => $this->bucket,
            'Key'    => 'test',
            'Body'   => ''
        ));
        $this->client->deleteObject(array(
            'Bucket' => $this->bucket,
            'Key'    => 'test'
        ));
    }

    public function testSignsPayload()
    {
        $this->client->putObject(array(
            'Bucket' => $this->bucket,
            'Key'    => 'test2',
            'Body'   => 'testing...1234'
        ));
        $this->client->deleteObject(array(
            'Bucket' => $this->bucket,
            'Key'    => 'test2'
        ));
    }
}
