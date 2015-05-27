<?php
namespace Aws\Test\Integ;

use Aws\CommandPool;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;

class ConcurrencyTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function testSendsNormalSynchronousRequest()
    {
        $client = $this->getSdk()->createClient('s3');
        $result = $client->listBuckets();
        $this->assertInstanceOf('Aws\Result', $result);
        $this->assertInternalType('string', $result['Owner']['ID']);
    }

    public function testSendsPromisedSynchronousRequest()
    {
        $client = $this->getSdk()->createClient('s3');
        $promise = $client->listBucketsAsync();
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $result = $promise->wait();
        $this->assertInternalType('string', $result['Owner']['ID']);
    }

    public function testSendsRequestsAsynchronously()
    {
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

    public function testSendsRequestsAsynchronouslyFromMultipleServices()
    {
        $s3 = $this->getSdk()->createS3();
        $db = $this->getSdk()->createDynamoDb();
        $sqs = $this->getSdk()->createSqs();

        $promise = Promise\all([
            $s3->listBucketsAsync(),
            $db->listTablesAsync(),
            $sqs->listQueuesAsync()
        ]);
        $results = $promise->wait();

        $this->assertCount(3, $results);
    }
}
