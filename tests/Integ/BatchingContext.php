<?php

namespace Aws\Test\Integ;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\WriteRequestBatch;
use Aws\Exception\AwsException;
use Aws\Result;
use Aws\Sqs\SqsClient;
use Behat\Behat\Hook\Scope\AfterFeatureScope;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

class BatchingContext extends \PHPUnit_Framework_Assert implements
    Context,
    SnippetAcceptingContext
{
    use IntegUtils;

    private static $resource;

    /** @var DynamoDbClient|SqsClient */
    private $client;
    /** @var WriteRequestBatch */
    private $batch;
    /** @var int */
    private $flushCount;
    /** @var Result */
    private $response;

    /**
     * @Given I have a :service client
     */
    public function iHaveAClient($service)
    {
        $this->client = self::getSdk()->createClient($service);
    }

    /**
     * @BeforeFeature @dynamodb
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpDynamoTable(BeforeFeatureScope $scope)
    {
        self::$resource = self::getResourcePrefix()
            . str_replace(' ', '-', strtolower($scope->getName()));

        $client = self::getSdk()->createDynamoDb();
        $client->createTable([
            'TableName' => self::$resource,
            'AttributeDefinitions' => [
                ['AttributeName' => 'id', 'AttributeType' => 'N']
            ],
            'KeySchema' => [
                ['AttributeName' => 'id', 'KeyType' => 'HASH']
            ],
            'ProvisionedThroughput' => [
                'ReadCapacityUnits'  => 1,
                'WriteCapacityUnits' => 1
            ]
        ]);

        $client->waitUntil('TableExists', ['TableName' => self::$resource]);
    }

    /**
     * @AfterFeature @dynamodb
     *
     * @param AfterFeatureScope $scope
     */
    public static function tearDownDynamoTable(AfterFeatureScope $scope)
    {
        self::getSdk()
            ->createDynamoDb()
            ->deleteTable(['TableName' => self::$resource]);

        self::$resource = null;
    }

    /**
     * @BeforeFeature @sqs
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpQueue(BeforeFeatureScope $scope)
    {
        $sqs = self::getSdk()->createSqs();
        self::$resource = self::getResourcePrefix()
            . preg_replace('/\W/', '-', strtolower($scope->getName()));

        $sqs->createQueue(['QueueName' => self::$resource]);
        $sqs->waitUntil('QueueExists', ['QueueName' => self::$resource]);
    }

    /**
     * @AfterFeature @sqs
     *
     * @param AfterFeatureScope $scope
     */
    public static function tearDownQueue(AfterFeatureScope $scope)
    {
        $sqs = self::getSdk()
            ->createSqs();

        $sqs->deleteQueue([
            'QueueUrl' => $sqs->getQueueUrl([
                'QueueName' => self::$resource,
            ])['QueueUrl']
        ]);

        self::$resource = null;
    }

    /**
     * @When /^I create a WriteRequestBatch with a batch size of (\d+) and a pool size of (\d+)$/
     */
    public function iCreateAWriteRequestBatch($batchSize, $poolSize)
    {
        $this->batch = new WriteRequestBatch($this->client, [
            'table' => self::$resource,
            'batch_size' => $batchSize,
            'pool_size' => $poolSize,
            'before' => function () {
                $this->flushCount++;
            },
            'error' => function (AwsException $e) {
                trigger_error($e->getMessage(), E_USER_WARNING);
            }
        ]);
    }

    /**
     * @When /^I put (\d+) items in the batch$/
     */
    public function iPutItemsInTheBatch($itemCount)
    {
        for ($i = 0; $i < $itemCount; $i++) {
            $this->batch->put(['id' => ['N' => (string) $i]]);
        }
    }

    /**
     * @When I flush the batch
     */
    public function iFlushTheBatch()
    {
        $this->batch->flush();
    }

    /**
     * @Then /^(\d+) items should have been written$/
     */
    public function itemsShouldHaveBeenWritten($itemCount)
    {
        $actualItems = $this->client->getIterator('Scan', [
            'TableName' => self::$resource,
        ]);

        $this->assertSame((int) $itemCount, iterator_count($actualItems));
    }

    /**
     * @Then /^the batch should have been flushed at least (\d+) times$/
     */
    public function theBatchShouldHaveBeenFlushedTimes($flushCount)
    {
        $this->assertGreaterThanOrEqual((int) $flushCount, $this->flushCount);
    }

    /**
     * @Given /^I have put (\d+) messages in a queue$/
     */
    public function iHavePutMessagesInAQueue($messageCount)
    {
        $queueUrl = $this->client
            ->getQueueUrl(['QueueName' => self::$resource])['QueueUrl'];
        for ($i = 0; $i < $messageCount; $i++) {
            $this->client->sendMessage([
                'QueueUrl' => $queueUrl,
                'MessageBody' => json_encode(['testing' => 'testing']),
            ]);
        }
    }

    /**
     * @When /^I delete a batch of (\d+) messages$/
     */
    public function iDeleteABatchOfMessages($messageCount)
    {
        $queueUrl = $this->client
            ->getQueueUrl(['QueueName' => self::$resource])['QueueUrl'];
        $messages = [];
        while (count($messages) < $messageCount) {
            $result = $this->client->receiveMessage([
                'QueueUrl' => $queueUrl,
                'MaxNumberOfMessages' => $messageCount,
            ]);

            foreach ($result['Messages'] as $message) {
                $messages[$message['MessageId']] = [
                    'Id' => $message['MessageId'],
                    'ReceiptHandle' => $message['ReceiptHandle'],
                ];
            }
        }

        $this->response = $this->client
            ->deleteMessageBatch([
                'QueueUrl' => $queueUrl,
                'Entries' => array_values($messages),
            ]);
    }

    /**
     * @Then /^(\d+) messages should have been deleted from the queue$/
     */
    public function messagesShouldHaveBeenDeletedFromTheQueue($messageCount)
    {
        $this->assertSame((int) $messageCount, count($this->response['Failed'])
            + count($this->response['Successful']));
    }
}
