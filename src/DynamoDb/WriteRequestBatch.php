<?php

namespace Aws\DynamoDb;

use Aws\AwsCommand;
use GuzzleHttp\Command\Event\CommandErrorEvent;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * The WriteRequestBatch is an object that is capable of efficiently sending
 * DynamoDB BatchWriteItem requests from queued up put and delete item requests.
 * requests. The batch attempts to send the requests with the fewest requests
 * to DynamoDB as possible and also re-queues any unprocessed items to ensure
 * that all items are sent.
 */
class WriteRequestBatch
{
    /** @var DynamoDbClient DynamoDB client used to perform write operations. */
    private $client;

    /** @var array Configuration options for the batch. */
    private $config;

    /** @var array Queue of pending put/delete requests in the batch. */
    private $queue;

    /**
     * Creates a WriteRequestBatch object that is capable of efficiently sending
     * DynamoDB BatchWriteItem requests from queued up Put and Delete requests.
     *
     * @param DynamoDbClient $client DynamoDB client used to send batches.
     * @param array          $config Batch configuration options.
     *     - table: DynamoDB table used by the batch, this can be overridden for
     *       each individual put() or delete() call.
     *     - size: The size of each batch (default: 25). The batch size must be
     *       between 2 and 25. If you are sending batches of large items, you
     *       may consider lowering the batch size, otherwise, you should use 25.
     *     - parallel: This number dictates how many BatchWriteItem requests you
     *       would like to do in parallel. For example, if the "size" is 25, and
     *       "parallel" is 3, then you would send 3 BatchWriteItem requests at a
     *       time, each with 25 items. Please keep your provisioned throughput
     *       in mind when increasing the "parallel" option.
     *     - autoflush: This option allows the batch to automatically flush once
     *       there are enough items (i.e., "size" * "parallel"). This defaults
     *       to true, so you must set this to false to stop autoflush.
     *     - error: Set this to a callback to handle errors from the commands
     *       executed by the batch, otherwise errors are ignored. The callback
     *       should accept a \GuzzleHttp\Command\Event\CommandErrorEvent as its
     *       argument.
     *     - flush: Set this to a callback to perform an action after the batch
     *       has been autoflushed. The callback will not be triggered on manual
     *       flushes.
     *
     * @throws \DomainException if the batch size is not between 2 and 25.
     */
    public function __construct(DynamoDbClient $client, array $config = [])
    {
        // Apply defaults
        $config += [
            'table'     => null,
            'size'      => 25,
            'parallel'  => 1,
            'autoflush' => true,
            'error'     => null,
            'flush'     => null
        ];

        // Ensure the batch size is valid
        if ($config['size'] > 25 || $config['size'] < 2) {
            throw new \DomainException('Batch size must be between 2 and 25.');
        }

        // If autoflush is enabled, set the threshold
        if ($config['autoflush']) {
            $config['threshold'] = $config['size'] * $config['parallel'];
        }

        $this->client = $client;
        $this->config = $config;
        $this->queue = [];
    }

    /**
     * Adds a put item request to the batch.
     *
     * @param array       $item  Data for an item to put. Format:
     *     [
     *         'attribute1' => ['type' => 'value'],
     *         'attribute2' => ['type' => 'value'],
     *         ...
     *     ]
     * @param string|null $table The name of the table. This must be specified
     *                           unless the "table" option was provided in the
     *                           config of the WriteRequestBatch.
     *
     * @return $this
     */
    public function put(array $item, $table = null)
    {
        $this->queue[] = [
            'table' => $this->determineTable($table),
            'data'  => ['PutRequest' => ['Item' => $item]],
        ];

        $this->autoFlush();

        return $this;
    }

    /**
     * Adds a delete item request to the batch.
     *
     * @param array       $key   Key of an item to delete. Format:
     *     [
     *         'key1' => ['type' => 'value'],
     *         ...
     *     ]
     * @param string|null $table The name of the table. This must be specified
     *                           unless the "table" option was provided in the
     *                           config of the WriteRequestBatch.
     *
     * @return $this
     */
    public function delete(array $key, $table = null)
    {
        $this->queue[] = [
            'table' => $this->determineTable($table),
            'data'  => ['DeleteRequest' => ['Key' => $key]],
        ];

        $this->autoFlush();

        return $this;
    }

    /**
     * Flushes the batch by combining all the queued put and delete requests
     * into BatchWriteItem commands and executing them. Unprocessed items are
     * automatically re-queued.
     *
     * @param bool $untilEmpty If true, flushing will continue until the queue
     *                         is completely empty. This will make sure that
     *                         unprocessed items are all eventually sent.
     *
     * @return $this
     */
    public function flush($untilEmpty = true)
    {
        // Send BatchWriteItem requests until the queue is empty
        $keepFlushing = true;
        while ($this->queue && $keepFlushing) {
            $commands = $this->prepareCommands();
            $this->client->executeAll($commands, [
                'parallel' => $this->config['parallel'],
                'process' => function (ProcessEvent $e) {
                    // Re-queue any unprocessed items
                    $result = $e->getResult();
                    if ($result->hasKey('UnprocessedItems')) {
                        $this->retryUnprocessed($result['UnprocessedItems']);
                    }
                },
                'error' => function (CommandErrorEvent $e) {
                    if ($e->getContext()['aws_error']['code'] === 'ProvisionedThroughputExceededException') {
                        $this->retryUnprocessed($e->getCommand()['RequestItems']);
                    } elseif (is_callable($this->config['error'])) {
                        $this->config['error']($e);
                    }
                },
            ]);
            $keepFlushing = (bool) $untilEmpty;
        }

        return $this;
    }

    /**
     * Creates BatchWriteItem commands from the items in the queue.
     *
     * @return AwsCommand[]
     */
    private function prepareCommands()
    {
        // Chunk the queue into batches
        $batches = array_chunk($this->queue, $this->config['size']);
        $this->queue = [];

        // Create BatchWriteItem commands for each batch
        $commands = [];
        foreach ($batches as $batch) {
            $requests = [];
            foreach ($batch as $item) {
                if (!isset($requests[$item['table']])) {
                    $requests[$item['table']] = [];
                }
                $requests[$item['table']][] = $item['data'];
            }
            $commands[] = $this->client->getCommand(
                'BatchWriteItem',
                ['RequestItems' => $requests]
            );
        }

        return $commands;
    }

    /**
     * Re-queues unprocessed results with the correct data.
     *
     * @param array $unprocessed Unprocessed items from a result.
     */
    private function retryUnprocessed(array $unprocessed)
    {
        foreach ($unprocessed as $table => $requests) {
            foreach ($requests as $request) {
                $this->queue[] = [
                    'table' => $table,
                    'data'  => isset($request['PutRequest'])
                        ? $request['PutRequest']
                        : $request['DeleteRequest']
                ];
            }
        }
    }

    /**
     * If autoflush is enabled and the threshold is met, flush the batch
     */
    private function autoFlush()
    {
        if ($this->config['autoflush']
            && count($this->queue) >= $this->config['threshold']
        ) {
            // Flush only once. Unprocessed items are handled in a later flush.
            $this->flush(false);

            // Call the flush callback if one was provided
            if (is_callable($this->config['flush'])) {
                $this->config['flush']();
            }
        }
    }

    /**
     * Determine the table name by looking at what was provided and what the
     * WriteRequestBatch was originally configured with.
     *
     * @param string|null $table The table name.
     *
     * @return string
     * @throws \RuntimeException if there was no table specified.
     */
    private function determineTable($table)
    {
        $table = $table ?: $this->config['table'];
        if (!$table) {
            throw new \RuntimeException('There was no table specified.');
        }

        return $table;
    }
}
