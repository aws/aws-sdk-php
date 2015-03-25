<?php
namespace Aws\Test\S3;

use Aws\MockHandler;
use Aws\Result;
use Aws\S3\BatchDelete;
use Aws\S3\Exception\DeleteMultipleObjectsException;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\S3\BatchDelete
 */
class BatchDeleteTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesBatchSizeIsGreatherThanZero()
    {
        $client = $this->getTestClient('s3');
        new BatchDelete($client, 'foo', new \ArrayIterator(), ['batch_size' => 0]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesBeforeIsCallable()
    {
        $client = $this->getTestClient('s3');
        new BatchDelete($client, 'foo', new \ArrayIterator(), ['before' => 0]);
    }

    public function testReturnsSamePromiseInstance()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [[]]);
        $batch = new BatchDelete($client, 'foo', new \ArrayIterator());
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
        $batch = new BatchDelete($client, 'foo', new \ArrayIterator($keys), [
            'batch_size' => 40,
            'before'     => function ($cmd) use (&$cmds) {
                $cmds[] = $cmd;
            }
        ]);
        $batch->delete();
        $this->assertCount(3, $cmds);
        $this->assertCount(40, $cmds[0]['Delete']['Objects']);
        $this->assertCount(40, $cmds[1]['Delete']['Objects']);
        $this->assertCount(20, $cmds[2]['Delete']['Objects']);
    }

    public function testThrowsWhenErrors()
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
        $batch = new BatchDelete($client, 'foo', new \ArrayIterator($keys));
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
        $this->assertEquals(2, count($last['Delete']['Objects']));
        $this->assertEquals('foo', $last['Bucket']);
    }
}
