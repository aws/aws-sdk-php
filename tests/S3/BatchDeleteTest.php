<?php
namespace Aws\Test\S3;

use Aws\CommandInterface;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\BatchDelete;
use Aws\S3\Exception\DeleteMultipleObjectsException;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\BatchDelete
 */
class BatchDeleteTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesBatchSizeIsGreatherThanZero()
    {
        $client = $this->getTestClient('s3');
        BatchDelete::fromIterator($client, 'foo', new \ArrayIterator(), ['batch_size' => 0]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesBeforeIsCallable()
    {
        $client = $this->getTestClient('s3');
        BatchDelete::fromIterator($client, 'foo', new \ArrayIterator(), ['before' => 0]);
    }

    public function testReturnsSamePromiseInstance()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [[]]);
        $batch = BatchDelete::fromIterator($client, 'foo', new \ArrayIterator());
        $this->assertSame($batch->promise(), $batch->promise());
    }

    public function testBatchesInBatchSize()
    {
        $cmds = [];
        $client = $this->getTestClient('s3');
        // Executes three commands.
        $this->addMockResults($client, [[], [], []]);
        $keys = [];
        for ($i = 0; $i < 100; $i++) {
            $keys[] = ['Key' => 'foo/$i'];
        }

        $batch = BatchDelete::fromIterator(
            $client,
            'foo',
            new \ArrayIterator($keys),
            [
                'batch_size' => 40,
                'before'     => function ($cmd) use (&$cmds) {
                    $cmds[] = $cmd;
                }
            ]
        );

        $batch->delete();
        $this->assertCount(3, $cmds);
        $this->assertCount(40, $cmds[0]['Delete']['Objects']);
        $this->assertCount(40, $cmds[1]['Delete']['Objects']);
        $this->assertCount(20, $cmds[2]['Delete']['Objects']);
    }

    public function testThrowsWhenErrorsInIterator()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            [
                'Deleted' => [['Key' => 'baz']],
                'Errors'  => [
                    ['Key' => 'foo', 'Code' => 'bar', 'Message' => 'baz']
                ]
            ]
        ]);
        $keys = [['Key' => 'baz'], ['Key' => 'foo']];
        $batch = BatchDelete::fromIterator($client, 'foo', new \ArrayIterator($keys));
        try {
            $batch->delete();
            $this->fail();
        } catch (DeleteMultipleObjectsException $e) {
            $this->assertCount(1, $e->getErrors());
            $this->assertEquals('foo', $e->getErrors()[0]['Key']);
            $this->assertCount(1, $e->getDeleted());
            $this->assertEquals('baz', $e->getDeleted()[0]['Key']);
        }
    }

    public function testThrowsWhenErrorsInEach()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            [
                'Contents' => [
                    ['Key' => 'baz'],
                    ['Key' => 'foo']
                ]
            ],
            [
                'Deleted' => [['Key' => 'baz']],
                'Errors'  => [
                    ['Key' => 'foo', 'Code' => 'bar', 'Message' => 'baz']
                ]
            ]
        ]);
        $batch = BatchDelete::fromListObjects($client, ['Bucket' => 'foo']);
        try {
            $batch->delete();
            $this->fail();
        } catch (DeleteMultipleObjectsException $e) {
            $this->assertCount(1, $e->getErrors());
            $this->assertEquals('foo', $e->getErrors()[0]['Key']);
            $this->assertCount(1, $e->getDeleted());
            $this->assertEquals('baz', $e->getDeleted()[0]['Key']);
        }
    }

    public function testCanCreateFromListObjects()
    {
        $client = $this->getTestClient('s3');
        $mock = new MockHandler([
            new Result([
                'IsTruncated' => false,
                'Contents'    => [
                    ['Key' => 'foo'],
                    ['Key' => 'bar'],
                ]
            ]),
            new Result([])
        ]);
        $client->getHandlerList()->setHandler($mock);
        $params = ['Bucket' => 'foo'];
        $batch = BatchDelete::fromListObjects($client, $params);
        $batch->delete();
        $last = $mock->getLastCommand();
        $this->assertEquals('DeleteObjects', $last->getName());
        $this->assertCount(2, $last['Delete']['Objects']);
        $this->assertEquals('foo', $last['Bucket']);
    }

    public function testDeletesYieldedCommadnsWhenEachCallbackReturns()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            [
                'Contents' => [
                    ['Key' => 0],
                    ['Key' => 1],
                    ['Key' => 2],
                    ['Key' => 3],
                    ['Key' => 4],
                    ['Key' => 5],
                    ['Key' => 6],
                    ['Key' => 7],
                    ['Key' => 8],
                    ['Key' => 9],
                ]
            ],
            ['Deleted' => []],
            ['Deleted' => []],
            ['Deleted' => []],
            ['Deleted' => []],
        ]);

        $cmds = [];
        $batch = BatchDelete::fromListObjects(
            $client,
            ['Bucket' => 'foo'],
            [
                'batch_size' => 4,
                'before'     => function (CommandInterface $cmd) use (&$cmds) {
                    $cmds[] = $cmd;
                }
            ]
        );

        $batch->delete();
        $this->assertCount(3, $cmds);

        $keys = \JmesPath\search('[].Delete.Objects[].Key', $cmds);
        $this->assertEquals(range(0, 9), $keys);
    }
    
    public function testWithNoMatchingObjects()
    {
        $client = $this->getTestClient('s3');
        $mock = new MockHandler([
            new Result([
                'IsTruncated' => false,
                'Contents'    => null
            ]),
            new Result([])
        ]);
        $client->getHandlerList()->setHandler($mock);
        $params = ['Bucket' => 'foo'];
        $batch = BatchDelete::fromListObjects($client, $params);
        $batch->delete();
        $last = $mock->getLastCommand();
        $this->assertEquals('ListObjects', $last->getName());
        $this->assertFalse(isset($last['Delete']['Objects']));
        $this->assertEquals('foo', $last['Bucket']);
    }
}
