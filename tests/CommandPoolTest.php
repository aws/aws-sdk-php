<?php
namespace Aws\Test;

use Aws\Command;
use Aws\CommandPool;
use Aws\Exception\AwsException;
use Aws\Result;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\CommandPool
 */
class CommandPoolTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Each value yielded by the iterator must be an Aws\CommandInterface
     */
    public function testEnsuresEachIsCommand()
    {
        $client = $this->getTestClient('s3');
        $iter = ['a'];
        $pool = new CommandPool($client, $iter);
        $pool->promise()->wait();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage before must be callable
     */
    public function testEnsuresBeforeIsCallable()
    {
        $client = $this->getTestClient('s3');
        new CommandPool($client, [], ['before' => 'foo']);
    }

    public function testInvokesBefore()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [new Result(), new Result()]);
        $iter = [
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo']),
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo'])
        ];
        $pool = new CommandPool($client, $iter, [
            'before' => function ($command, $key) use (&$called) {
                $called[$key] = $command;
            }
        ]);
        $pool->promise()->wait();
        $this->assertSame($iter, $called);
    }

    public function testInvokesFulfilled()
    {
        $results = [new Result(), new Result()];
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, $results);
        $iter = [
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo']),
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo'])
        ];
        $pool = new CommandPool($client, $iter, [
            'fulfilled' => function ($result) use (&$called) {
                $called[] = $result;
            }
        ]);
        $pool->promise()->wait();
        $this->assertSame($results, $called);
    }

    public function testInvokesFulfilledIgnoreKeys()
    {
        $results = [new Result(), new Result()];
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, $results);
        $iter = [
            'A' => $client->getCommand('HeadBucket', ['Bucket' => 'Foo']),
            'B' => $client->getCommand('HeadBucket', ['Bucket' => 'Foo'])
        ];
        $pool = new CommandPool($client, $iter, [
            'fulfilled' => function ($result, $key) use (&$called) {
                $called[$key] = $result;
            },
            'preserve_iterator_keys' => false,
        ]);
        $pool->promise()->wait();
        $this->assertSame($results, $called);
    }

    public function testInvokesFulfilledKeys()
     {
         $results = ['A' => new Result(), 'B' => new Result()];
         $client = $this->getTestClient('s3');
         $this->addMockResults($client, $results);
         $iter = [
             'A' => $client->getCommand('HeadBucket', ['Bucket' => 'Foo']),
             'B' => $client->getCommand('HeadBucket', ['Bucket' => 'Foo'])
         ];
         $pool = new CommandPool($client, $iter, [
             'fulfilled' => function ($result, $key) use (&$called) {
                 $called[$key] = $result;
             },
             'preserve_iterator_keys' => true,
        ]);
        $pool->promise()->wait();
        $this->assertSame($results, $called);
    }

    public function testInvokesRejected()
    {
        $client = $this->getTestClient('s3');
        $results = [
            new AwsException('Error', new Command('foo')),
            new Result()
        ];
        $this->addMockResults($client, $results);
        $commands = [
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo']),
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo'])
        ];
        $fulfilled = $rejected = [];
        $pool = new CommandPool($client, $commands, [
            'fulfilled' => function ($result) use (&$fulfilled) {
                $fulfilled[] = $result;
            },
            'rejected' => function ($result) use (&$rejected) {
                $rejected[] = $result;
            }
        ]);
        $pool->promise()->wait();
        $this->assertCount(1, $fulfilled);
        $this->assertCount(1, $rejected);
        $this->assertSame($results[0], $rejected[0]);
        $this->assertSame($results[1], $fulfilled[0]);
    }

    public function testCanBatchResults()
    {
        $client = $this->getTestClient('s3');
        $resultQueue = [new Result(), new Result()];
        $this->addMockResults($client, $resultQueue);
        $iter = [
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo']),
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo'])
        ];
        $results = CommandPool::batch($client, $iter);
        $this->assertSame($resultQueue, $results);
    }

    public function testCanComposeBatchCallbacks()
    {
        $client = $this->getTestClient('s3');
        $resultQueue = [new Result(), new Result()];
        $fulfilled = [];
        $this->addMockResults($client, $resultQueue);
        $iter = [
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo']),
            $client->getCommand('HeadBucket', ['Bucket' => 'Foo'])
        ];
        $results = CommandPool::batch($client, $iter, [
            'fulfilled' => function ($result) use (&$fulfilled) {
                $fulfilled[] = $result;
            }
        ]);
        $this->assertSame($resultQueue, $results);
        $this->assertSame($resultQueue, $fulfilled);
    }
}
