<?php
namespace Aws\Test\Integ;

use Aws\CommandPool;
use GuzzleHttp\Promise;

class ConcurrencyTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function testSendsRequestsAsynchronously()
    {
        /** @var \Aws\S3\S3Client $s3 */
        $s3 = $this->getSdk()->createS3();

        $promise = Promise\all([
            $s3->listBucketsAsync(),
            $s3->listBucketsAsync(),
            $s3->listBucketsAsync()
        ]);
        $results = $promise->wait();

        $this->assertCount(3, $results);
        $this->assertCount(1, array_unique(\JmesPath\search('[*].Owner.ID', $results)));
    }

    public function testSendsRequestsConcurrentlyWithPool()
    {
        /** @var \Aws\S3\S3Client $s3 */
        $s3 = $this->getSdk()->createS3();

        $commands = [
            $s3->getCommand('ListBuckets'),
            $s3->getCommand('ListBuckets'),
            $s3->getCommand('ListBuckets')
        ];
        $results = CommandPool::batch($s3, $commands);

        $this->assertCount(3, $results);
        $this->assertCount(1, array_unique(\JmesPath\search('[*].Owner.ID', $results)));
    }
}
