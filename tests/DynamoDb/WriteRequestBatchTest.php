<?php
namespace Aws\Test\DynamoDb;

use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Aws\DynamoDb\WriteRequestBatch;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\DynamoDb\WriteRequestBatch
 */
class WriteRequestBatchTest extends TestCase
{
    use UsesServiceTrait;

    public function testInstantiateWriteRequestBatch()
    {
        // Ensure threshold is correctly calculated
        $batch = new WriteRequestBatch($this->getTestClient('DynamoDb'), ['pool_size' => 2]);
        $this->assertEquals(50, $this->readAttribute($batch, 'config')['threshold']);
    }

    /**
     * @dataProvider getInvalidArgUseCases
     * @expectedException \InvalidArgumentException
     */
    public function testInstantiationFailsOnInvalidArgs($config)
    {
        new WriteRequestBatch($this->getTestClient('DynamoDb'), $config);
    }

    public function getInvalidArgUseCases()
    {
        return [
            [['batch_size' => 1]],
            [['before' => 'cheese']],
            [['error' => 'cheese']],
        ];
    }

    public function testAddItems()
    {
        $batch = new WriteRequestBatch($this->getTestClient('DynamoDb'), [
            'autoflush' => false,
            'table'     => 'foo',
        ]);
        $batch->put(['a' => 'b']);
        $batch->delete(['c' => 'd'], 'bar');

        $this->assertEquals(
            [
                [
                    'table' => 'foo',
                    'data'  => ['PutRequest' => ['Item' => ['a' => 'b']]],
                ],
                [
                    'table' => 'bar',
                    'data'  => ['DeleteRequest' => ['Key' => ['c' => 'd']]],
                ]
            ],
            $this->readAttribute($batch, 'queue')
        );
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testMustProvideTable()
    {
        $batch = new WriteRequestBatch($this->getTestClient('DynamoDb'));
        $batch->put(['a' => 'b']);
    }

    public function testCreateCommandsFromQueueViaAutoflush()
    {
        $commandCount = [];

        $client = $this->getTestClient('DynamoDb');
        $client->getHandlerList()->appendSign(\Aws\Middleware::tap(
            function (CommandInterface $command) use (&$commandCount) {
                if ($command->getName() == 'BatchWriteItem') {
                    $commandCount[] = count($command['RequestItems']);
                }
            }
        ));

        $client->getHandlerList()->setHandler(new MockHandler([
            new Result(),
            new Result()
        ]));

        // Configure batch such so autoflush will happen for every 4 items.
        $batch = new WriteRequestBatch($client, [
            'batch_size' => 2,
            'pool_size'  => 2,
            'table'      => 'foo'
        ]);

        // Adding 5 items (Note: only 4 should be flushed)
        $batch->put(['letter' => ['S' => 'a']]);
        $batch->put(['letter' => ['S' => 'b']]);
        $batch->put(['letter' => ['S' => 'c']]);
        $batch->put(['letter' => ['S' => 'd']]);
        $batch->put(['letter' => ['S' => 'e']]);

        // Ensure that 2 commands and 1 flush happened, with 1 left in queue.
        $this->assertEquals([1, 1], $commandCount);
        $this->assertCount(1, $this->readAttribute($batch, 'queue'));
    }

    public function testUnprocessedItemsAreRequeued()
    {
        // Setup client with successful (200) responses, but the first one will
        // return UnprocessedItems
        $client = $this->getTestClient('dynamodb');
        $this->addMockResults($client, [
            new Result(['UnprocessedItems' => ['foo' => [
                ['PutRequest' => ['Item' => ['id' => ['S' => 'b']]]],
                ['DeleteRequest' => ['Key' => ['id' => ['S' => 'c']]]],
            ]]]),
            new Result([])
        ]);

        $batch = new WriteRequestBatch($client, ['table' => 'foo']);

        $batch->put(['id' => ['S' => 'a']]);
        $batch->put(['id' => ['S' => 'b']]);
        $batch->delete(['id' => ['S' => 'c']]);

        $batch->flush(false);
        $this->assertEquals(
            [
                [
                    'table' => 'foo',
                    'data'  => ['PutRequest' => ['Item' => ['id' => ['S' => 'b']]]],
                ],
                [
                    'table' => 'foo',
                    'data'  => ['DeleteRequest' => ['Key' => ['id' => ['S' => 'c']]]],
                ]
            ],
            $this->readAttribute($batch, 'queue')
        );

        $batch->flush();
        $this->assertCount(0, $this->readAttribute($batch, 'queue'));
    }

    public function testErrorsAreHandled()
    {
        $unhandledErrors = 0;

        // Setup client with 3 error responses. The first should cause the items
        // to be re-queued; then second and third should trigger the callback.
        $client = $this->getTestClient('dynamodb');

        $this->addMockResults($client, [
            function ($command, $request) {
                return new AwsException('error', $command, [
                    'request' => $request,
                    'code'    => 'ProvisionedThroughputExceededException'
                ]);
            },
            function ($command, $request) {
                return new AwsException('error', $command, [
                    'request' => $request,
                    'code'    => 'ValidationError'
                ]);
            },
            function ($command, $request) {
                return new AwsException('error', $command, [
                    'request' => $request,
                    'code'    => 'ServerError'
                ]);
            }
        ]);

        $batch = new WriteRequestBatch($client, [
            'table' => 'foo',
            'error' => function($e) use (&$unhandledErrors) {
                $unhandledErrors++;
            }
        ]);

        $batch->put(['id' => ['S' => 'a']]);
        $batch->put(['id' => ['S' => 'b']]);

        // There should be two items in the queue before we flush.
        $this->assertCount(2, $this->readAttribute($batch, 'queue'));

        $batch->flush(false);

        // The 1st response should be a ProvisionedThroughputExceededException,
        // which means the items should be re-queued, keeping the count at 2.
        $this->assertCount(2, $this->readAttribute($batch, 'queue'));

        $batch->flush();
        $batch->put(['id' => ['S' => 'c']]);
        $batch->flush();

        // After 2 complete flushes, the queue should be empty, and there should
        // been 2 unhandled errors that would have triggered the callback.
        $this->assertCount(0, $this->readAttribute($batch, 'queue'));
        $this->assertEquals(2, $unhandledErrors);
    }
}
