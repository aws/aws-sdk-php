<?php
namespace Aws\Test\DynamoDb;

use Aws\Common\Result;
use Aws\DynamoDb\WriteRequestBatch;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\DynamoDb\WriteRequestBatch
 */
class WriteRequestBatchTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testInstantiateWriteRequestBatch()
    {
        // Ensure threshold is correctly calculated
        $batch = new WriteRequestBatch($this->getMockClient(), ['parallel' => 2]);
        $this->assertEquals(
            50,
            $this->readAttribute($batch, 'config')['threshold']
        );

        // Ensure exception is thrown if batch size is invalid
        $this->setExpectedException('DomainException');
        $batch = new WriteRequestBatch($this->getMockClient(), ['size' => 1]);
    }

    public function testAddItems()
    {
        $batch = new WriteRequestBatch($this->getMockClient(), [
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

    public function testMustProvideTable()
    {
        $batch = new WriteRequestBatch($this->getMockClient());

        $this->setExpectedException('RuntimeException');
        $batch->put(['a' => 'b']);
    }

    public function testCreateCommandsFromQueueViaAutoflush()
    {
        $commandCount = 0;
        $flushCount = 0;

        // Setup client to not actually execute any commands, just keep track
        // of how many commands are created.
        $client = $this->getMockClient();
        $client->expects($this->any())
            ->method('executeAll')
            ->willReturnCallback(function($commands) use (&$commandCount) {
                $commandCount = count($commands);
            });

        // Configure batch such so autoflush will happen for every 4 items.
        // The flush callback will keep track of how many flushed happen.
        $batch = new WriteRequestBatch($client, [
            'size'     => 2,
            'parallel' => 2,
            'table'    => 'foo',
            'flush'    => function() use (&$flushCount) {
                $flushCount++;
            }
        ]);

        // Adding 5 items (Note: only 4 should be flushed)
        $batch->put(['letter' => ['S' => 'a']]);
        $batch->put(['letter' => ['S' => 'b']]);
        $batch->put(['letter' => ['S' => 'c']]);
        $batch->put(['letter' => ['S' => 'd']]);
        $batch->put(['letter' => ['S' => 'e']]);

        // Ensure that 2 commands and 1 flush happened, with 1 left in queue.
        $this->assertEquals(2, $commandCount);
        $this->assertEquals(1, $flushCount);
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
            ]]]),
            new Result([])
        ]);

        $batch = new WriteRequestBatch($client, ['table' => 'foo']);

        $batch->put(['id' => ['S' => 'a']]);
        $batch->put(['id' => ['S' => 'b']]);
        $batch->flush();

        $this->assertCount(0, $this->readAttribute($batch, 'queue'));
    }

    public function testErrorsAreHandled()
    {
        $unhandledErrors = 0;

        // Setup client with 3 error responses. The first should cause the items
        // to be re-queued; then second and third should trigger the callback.
        $client = $this->getTestClient('dynamodb');
        $this->addMockResponses($client, [
            new Response(400, [], Stream::factory('{"__type":"ProvisionedThroughputExceededException","message":"foo"}')),
            new Response(400, [], Stream::factory('{"__type":"ValidationError","message":"foo"}')),
            new Response(413),
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

    private function getMockClient()
    {
        return $this->getMockBuilder('Aws\DynamoDb\DynamoDbClient')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
