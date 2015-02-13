<?php
namespace Aws\Test\Integ;

use Aws\Exception\AwsException;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Command\Event\ProcessEvent;

class WaitersTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function testNormalWaiters()
    {
        $client = self::getSdk()->createDynamoDb();
        $table = self::getResourcePrefix() . '-test-table';

        self::log('Testing synchronous waiters.');

        try {
            self::log('Creating table.');
            $client->createTable([
                'TableName' => $table,
                'AttributeDefinitions' => [
                    ['AttributeName' => 'id', 'AttributeType' => 'N']
                ],
                'KeySchema' => [
                    ['AttributeName' => 'id', 'KeyType' => 'HASH']
                ],
                'ProvisionedThroughput' => [
                    'ReadCapacityUnits'  => 20,
                    'WriteCapacityUnits' => 20
                ]
            ]);

            self::log('Waiting for the table to be active.');
            $client->waitUntil(
                'TableExists',
                ['TableName' => $table],
                ['retry' => function ($attempt) {
                    self::log("TableExists waiter has made {$attempt} attempts.");
                }]
            );

            self::log('Deleting table.');
            $client->deleteTable(['TableName' => $table]);

            self::log('Waiting for the table to be deleted.');
            $client->waitUntil(
                'TableNotExists',
                ['TableName' => $table],
                [
                    'initDelay' => 1,
                    'retry' => function ($attempt) {
                        self::log("TableNotExists waiter has made {$attempt} attempts.");
                    }
                ]
            );

            self::log('All done waiting.');
        } catch (\Exception $e) {
            self::log($e->getMessage());
            $this->fail('Synchronous waiters failed.');
        }
    }

    public function asyncTestAsyncWaiters()
    {
        $sdk = self::getSdk();

        $client = $sdk->createDynamoDb();
        $table = self::getResourcePrefix() . '-test-table';

        self::log('Testing asynchronous waiters.');

        $promises = [];

        $promises[] = $client->createTable([
            'TableName' => $table,
            'AttributeDefinitions' => [
                ['AttributeName' => 'id', 'AttributeType' => 'N']
            ],
            'KeySchema' => [
                ['AttributeName' => 'id', 'KeyType' => 'HASH']
            ],
                'ProvisionedThroughput' => [
                'ReadCapacityUnits'  => 20,
                'WriteCapacityUnits' => 20
            ],
            '@future' => true
        ])->then(
            function () use ($client, $table) {
                self::log('Creating table.');
                self::log('Waiting for the table to be active.');
                return $client->waitUntil('TableExists', [
                    'TableName' => $table,
                    '@future'   => true,
                ])->then(null, null, function ($attempt) {
                    self::log("TableExists waiter has made {$attempt} attempts.");
                });
            }
        )->then(
            function () use ($client, $table) {
                return $client->deleteTable([
                    'TableName' => $table,
                    '@future'   => true
                ])->promise();
            }
        )->then(
            function () use ($client, $table) {
                self::log('Deleting table.');
                self::log('Waiting for the table to be deleted.');
                return $client->waitUntil('TableNotExists', [
                    'TableName' => $table,
                    '@future'   => true,
                ])->then(null, null, function ($attempt) {
                    self::log("TableNotExists waiter has made {$attempt} attempts.");
                });
            }
        )->then(
            function () use ($client, $table) {
                self::log('All done waiting.');
            },
            function (AwsException $error) {
                self::log($error->getMessage());
                $this->fail('Asynchronous waiters failed.');
            }
        );

        $s3 = $sdk->getS3();
        $command = $s3->getCommand('ListBuckets', ['@future' => true]);
        $command->getEmitter()->on('prepared', function (PreparedEvent $event) {
            self::log('Initiating a ListBuckets operation.');
            $event->getRequest()->getConfig()->set('delay', 20000);
        });
        $command->getEmitter()->on('process', function (ProcessEvent $event) {
            self::log('Completed the ListBuckets operation.');
        });
        $promises[] = $s3->execute($command);

        \React\Promise\all($promises)->then(function () {
            self::log('Done with everything!');
        });
    }
}
