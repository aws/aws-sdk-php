<?php
namespace Aws\Test\Integ;

use Aws\Exception\AwsException;
use GuzzleHttp\Promise;

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

    public function testWaiterWorkflows()
    {
        self::log('Testing complicated waiter workflows.');
        $sdk = self::getSdk();
        $promises = [];

        self::log('Creating a DynamoDB table.');
        $client = $sdk->createDynamoDb();
        $table = self::getResourcePrefix() . '-test-table';
        $promises[] = $client->createTableAsync([
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
        ])->then(
            function () use ($client, $table) {
                self::log('Waiting for the table to be active.');
                return $client->getWaiter('TableExists', ['TableName' => $table])
                    ->promise()
                    ->then(null, null, function ($attempt) {
                        self::log("TableExists waiter has made {$attempt} attempts.");
                    });
            }
        )->then(
            function () use ($client, $table) {
                return $client->deleteTableAsync(['TableName' => $table]);
            }
        )->then(
            function () use ($client, $table) {
                self::log('Deleting table.');
                self::log('Waiting for the table to be deleted.');
                return $client->getWaiter('TableNotExists', ['TableName' => $table])
                    ->promise()
                    ->then(null, null, function ($attempt) {
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

        self::log('Initiating an S3 ListBuckets operation.');
        $promises[] = $sdk->createS3()
            ->listBucketsAsync()
            ->then(function () {
                self::log('Completed the ListBuckets operation.');
            });

        try {
            Promise\all($promises)->then(function () {
                self::log('Done with everything!');
            })->wait();
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }
    }
}
