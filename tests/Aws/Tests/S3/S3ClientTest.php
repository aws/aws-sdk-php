<?php

namespace Aws\Tests\S3;

use Aws\S3\S3Client;
use Guzzle\Http\Url;

/**
 * @covers Aws\S3\S3Client
 */
class S3ClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * Data provider for testing if a bucket name is valid
     *
     * @return array
     */
    public function bucketNameProvider()
    {
        return array(
            array('.bucket', false),
            array('bucket.', false),
            array('192.168.1.1', false),
            array('test@42!@$5_', false),
            array('ab', false),
            array('12', false),
            array('bucket_name', false),
            array('bucket-name', true),
            array('bucket', true),
            array('my.bucket.com', true)
        );
    }

    /**
     * @covers Aws\S3\S3Client::isValidBucketName
     * @dataProvider bucketNameProvider
     */
    public function testValidatesBucketNames($bucketName, $isValid)
    {
        $this->assertEquals($isValid, s3Client::isValidBucketName($bucketName));
    }

    /**
     * @covers Aws\S3\S3Client::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = S3Client::factory(array(
            'scheme' => 'http',
            'region' => 'ap-southeast-1'
        ));
        $this->assertEquals('http://s3-ap-southeast-1.amazonaws.com', $client->getBaseUrl());
    }

    /**
     * @covers Aws\S3\S3Client::createPresignedUrl
     */
    public function testCreatesPresignedUrls()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3');
        $request = $client->get('/foobar');
        $original = (string) $request;
        $url = $client->createPresignedUrl($request, 1342138769);
        $this->assertContains('https://s3.amazonaws.com/foobar?AWSAccessKeyId=', $url);
        $this->assertContains('Expires=', $url);
        $this->assertContains('Signature=', $url);
        $this->assertSame($original, (string) $request);
    }

    public function testCreatesPresignedUrlsWithStrtotime()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3');
        $url = Url::factory($client->createPresignedUrl($client->get('/foobar'), '10 minutes'));
        $this->assertTrue(time() < $url->getQuery()->get('Expires'));
    }

    public function testDoesBucketExistReturnsCorrectBooleanValue()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($client, array(
            's3/head_success',
            's3/head_access_denied',
            's3/head_failure'
        ));

        $this->assertTrue($client->doesBucketExist('bucket'));
        $this->assertTrue($client->doesBucketExist('bucket'));
        $this->assertFalse($client->doesBucketExist('bucket'));
    }

    public function testDoesObjectExistReturnsCorrectBooleanValue()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($client, array(
            's3/head_success',
            's3/head_access_denied',
            's3/head_failure'
        ));

        $this->assertTrue($client->doesObjectExist('bucket', 'key'));
        $this->assertFalse($client->doesObjectExist('bucket', 'key'));
        $this->assertFalse($client->doesObjectExist('bucket', 'key'));
    }

    public function testDoesBucketPolicyExistReturnsCorrectBooleanValue()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($client, array(
            's3/get_bucket_policy_success',
            's3/get_bucket_policy_failure'
        ));

        $this->assertTrue($client->doesBucketPolicyExist('bucket'));
        $this->assertFalse($client->doesBucketPolicyExist('bucket'));
    }

    public function testClearsBucketHelper()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/get_bucket_object_versions_page_2',
            's3/delete_multiple_objects'
        ));
        $client->clearBucket('foo');
        $requests = $mock->getReceivedRequests();
        foreach ($requests as $request) {
            $this->assertEquals('foo.s3.amazonaws.com', $request->getHost());
        }
        $this->assertEquals(2, count($requests));
        $this->assertTrue($requests[0]->getQuery()->hasKey('versions'));
        $this->assertTrue($requests[1]->getQuery()->hasKey('delete'));
    }
}
