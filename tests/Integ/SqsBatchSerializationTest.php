<?php

namespace Aws\Test\Integ;

use Aws\Sqs\SqsClient;

class SqsBatchSerializationTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public static function setUpBeforeClass()
    {
        $queue = self::getIntegTestingQueueName();
        $client = self::getSdk()->createSqs();
        self::cleanup($client, $queue);
        self::log('Creating queue ' . $queue);
        $client->createQueue(['QueueName' => $queue]);
    }

    public static function tearDownAfterClass()
    {
        $queue = self::getIntegTestingQueueName();
        $client = self::getSdk()->createSqs();
        self::cleanup($client, $queue);
    }

    public function testDeleteMessageBatchSendsCorrectly()
    {
        $client = self::getSdk()->createSqs();

        $queue = $client->getQueueUrl(['QueueName' => self::getIntegTestingQueueName()]);
        for ($i = 0; $i < 10; $i++) {
            $client->sendMessage([
                'QueueUrl' => $queue->get('QueueUrl'),
                'MessageBody' => json_encode(['testing' => 'testing']),
            ]);
        }

        $messages = $client->receiveMessage([
            'QueueUrl' => $queue->get('QueueUrl'),
            'MaxNumberOfMessages' => 10,
        ]);

        $client->deleteMessageBatch([
            'QueueUrl' => $queue->get('QueueUrl'),
            'Entries' => array_map(
                function (array $message) {
                    return [
                        'Id' => $message['MessageId'],
                        'ReceiptHandle' => $message['ReceiptHandle'],
                    ];
                },
                $messages->get('Messages')
            )
        ]);
    }

    private static function cleanup(SqsClient $client, $queue)
    {
        try {
            $queue = $client->getQueueUrl([
                'QueueName' => $queue,
            ]);

            $client->deleteQueue(['QueueUrl' => $queue->get('QueueUrl')]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    private static function getIntegTestingQueueName()
    {
        return self::getResourcePrefix() . '-integ-testing-queue';
    }
}
