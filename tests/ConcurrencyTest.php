<?php
namespace Aws\Test;

use Aws\CommandPool;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Result;
use Aws\ResultInterface;
use Aws\S3\S3Client;
use Aws\Sqs\SqsClient;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;

class ConcurrencyTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testSendsNormalSynchronousRequest()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [new Result(['Owner' => ['ID' => 'id']])]);
        $result = $client->listBuckets();
        $this->assertInstanceOf(ResultInterface::class, $result);
        $this->assertInternalType('string', $result['Owner']['ID']);
    }

    public function testSendsPromisedSynchronousRequest()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [new Result(['Owner' => ['ID' => 'id']])]);
        $promise = $client->listBucketsAsync();
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $result = $promise->wait();
        $this->assertInternalType('string', $result['Owner']['ID']);
    }

    public function testSendsRequestsAsynchronously()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['Owner' => ['ID' => 'id']]),
            new Result(['Owner' => ['ID' => 'id']]),
            new Result(['Owner' => ['ID' => 'id']]),
        ]);

        $promise = Promise\all([
            $client->listBucketsAsync(),
            $client->listBucketsAsync(),
            $client->listBucketsAsync()
        ]);
        $results = $promise->wait();

        $this->assertCount(3, $results);
        $this->assertCount(1, array_unique(\JmesPath\search('[*].Owner.ID', $results)));
    }

    public function testSendsRequestsConcurrentlyWithPool()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['Owner' => ['ID' => 'id']]),
            new Result(['Owner' => ['ID' => 'id']]),
            new Result(['Owner' => ['ID' => 'id']]),
        ]);

        $commands = [
            $client->getCommand('ListBuckets'),
            $client->getCommand('ListBuckets'),
            $client->getCommand('ListBuckets')
        ];
        $results = CommandPool::batch($client, $commands);

        $this->assertCount(3, $results);
        $this->assertCount(1, array_unique(\JmesPath\search('[*].Owner.ID', $results)));
    }

    public function testSendsRequestsAsynchronouslyFromMultipleServices()
    {
        /** @var S3Client $s3 */
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [new Result]);
        /** @var DynamoDbClient $db */
        $db = $this->getTestClient('dynamodb');
        $this->addMockResults($db, [new Result]);
        /** @var SqsClient $sqs */
        $sqs = $this->getTestClient('sqs');
        $this->addMockResults($sqs, [new Result]);

        $promise = Promise\all([
            $s3->listBucketsAsync(),
            $db->listTablesAsync(),
            $sqs->listQueuesAsync()
        ]);
        $results = $promise->wait();

        $this->assertCount(3, $results);
    }
}
