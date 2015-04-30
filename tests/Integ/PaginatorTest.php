<?php
namespace Aws\Test\Integ;

use Aws\CommandPool;
use Aws\Result;
use Aws\S3\BatchDelete;
use Aws\S3\S3Client;
use GuzzleHttp\Promise;

class PaginatorTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    private function getCommands(S3Client $client, $bucket, $count)
    {
        for ($i = 0; $i < $count; $i++) {
            yield $client->getCommand('PutObject', [
                'Bucket' => $bucket,
                'Key'    => 'object' . $i,
                'Body'   => 'foo'
            ]);
        }
    }

    public function testNormalPaginators()
    {
        $client = self::getSdk()->createS3();
        $bucket = self::getResourcePrefix() . '-php-sdk-test-bucket';

        self::log('Testing synchronous paginators.');

        try {
            self::log('Creating bucket.');
            $client->createBucket(['Bucket' => $bucket]);

            self::log('Waiting for the bucket to be available.');
            $client->waitUntil('BucketExists', ['Bucket' => $bucket]);

            self::log('Uploading objects.');
            CommandPool::batch($client, $this->getCommands($client, $bucket, 100));

            self::log('List the objects.');
            $results = $client->getPaginator('ListObjects', [
                'Bucket'  => $bucket,
                'MaxKeys' => 20
            ]);
            $objects = $results->search('Contents[].Key');
            $this->assertEquals(100, iterator_count($objects));

            self::log('Deleting objects.');
            BatchDelete::fromListObjects($client, ['Bucket'  => $bucket])->delete();

            self::log('Deleting bucket.');
            $client->deleteBucket(['Bucket' => $bucket]);

            self::log('Waiting for the bucket to be deleted.');
            $client->waitUntil('BucketNotExists', ['Bucket' => $bucket], ['initDelay' => 1]);

            self::log('All done waiting.');
        } catch (\Exception $e) {
            self::log($e->getMessage());
            $this->fail('Synchronous paginators failed.');
        }
    }

    public function testAsyncPaginators()
    {
        $sdk = self::getSdk();
        $client = $sdk->createS3();
        $bucket = self::getResourcePrefix() . '-php-sdk-test-bucket-async';

        self::log('Testing asynchronous paginators.');
        $promises = [];
        $promises[] = Promise\coroutine(function () use ($client, $bucket) {
            self::log('Creating bucket.');
            yield $client->createBucketAsync(['Bucket' => $bucket]);

            self::log('Waiting for the bucket to be available.');
            yield $client->getWaiter('BucketExists', ['Bucket' => $bucket])->promise();

            self::log('Uploading objects.');
            yield (new CommandPool($client, $this->getCommands($client, $bucket, 100)))->promise();

            self::log('List the objects.');
            $pages = 0;
            yield $client->getPaginator('ListObjects', [
                'Bucket'  => $bucket,
                'MaxKeys' => 20
            ])->each(function (Result $result) use (&$pages) {
                $pages++;
            });
            $this->assertEquals(5, $pages);

            self::log('Deleting objects.');
            yield BatchDelete::fromListObjects($client, ['Bucket'  => $bucket])->promise();

            self::log('Deleting bucket.');
            yield $client->deleteBucketAsync(['Bucket' => $bucket]);

            self::log('Waiting for the bucket to be deleted.');
            yield $client->getWaiter('BucketNotExists', ['Bucket' => $bucket])->promise();
        });

        self::log('Initiating a DynamoDB ListTables operation.');
        $promises[] = $sdk->createDynamoDb()
            ->listTablesAsync()
            ->then(function () {
                self::log('Completed the DynamoDB ListTables operation.');
            });

        try {
            Promise\all($promises)->wait();
            self::log('Done with everything!');
        } catch (\Exception $e) {
            self::log($e->getMessage());
            $this->fail('Asynchronous paginators failed.');
        }
    }
}
