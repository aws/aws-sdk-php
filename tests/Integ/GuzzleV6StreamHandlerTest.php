<?php
namespace Aws\Test\Integ;

use GuzzleHttp\Handler\StreamHandler;

class GuzzleV6StreamHandlerTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function setUp()
    {
        if (!class_exists('GuzzleHttp\Handler\StreamHandler')) {
            $this->markTestSkipped();
        }
    }

    public function testCanUseStreamForBasicRequests()
    {
        $handler = new StreamHandler();

        $s3 = $this->getSdk()->createS3([
            'http_handler' => $handler,
            'use_path_style_endpoint' => true
        ]);
        $result = $s3->listBuckets();
        $this->assertNotEmpty($result->search('Owner.ID'));

        $ddb = $this->getSdk()->createDynamoDb(['http_handler' => $handler]);
        $result = $ddb->listTables();
        $this->assertArrayHasKey('TableNames', $result);
    }

    public function testCanUseStreamForComplexWorkflow()
    {
        $handler = new StreamHandler();
        $bucket = 'aws-sdk-php-test-stream-handler';
        $s3 = $this->getSdk()->createS3(['http_handler' => $handler]);
        self::log("Creating bucket {$bucket}.");
        $promise = $s3
            ->createBucketAsync(['Bucket' => $bucket])
            ->then(function () use ($s3, $bucket) {
                self::log("Waiting for bucket {$bucket}.");
                return $s3->getWaiter('BucketExists', ['Bucket' => $bucket])->promise();
            })
            ->then(function () use ($s3, $bucket) {
                self::log("Uploading object to bucket {$bucket}.");
                return $s3->putObjectAsync([
                    'Bucket' => $bucket,
                    'Key'    => 'foo',
                    'Body'   => 'bar'
                ]);
            })
            ->then(function () use ($s3, $bucket) {
                self::log("Deleting object from bucket {$bucket}.");
                return $s3->deleteObjectAsync([
                    'Bucket' => $bucket,
                    'Key'    => 'foo',
                ]);
            })
            ->then(function () use ($s3, $bucket) {
                self::log("Deleting bucket {$bucket}.");
                return $s3->deleteBucketAsync([
                    'Bucket' => $bucket,
                ]);
            });
        /** @var \Aws\Result $result */
        $result = $promise->wait();
        $this->assertEquals(204, $result['@metadata']['statusCode']);
    }
}
