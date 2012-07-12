<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\DynamoDb\Model\BatchRequest;

use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
use Aws\DynamoDb\Model\Item;
use Aws\DynamoDb\Model\Key;
use Guzzle\Common\Batch\AbstractBatchDecorator;
use Guzzle\Common\Batch\BatchBuilder;
use Guzzle\Common\Batch\BatchSizeDivisor;
use Guzzle\Common\Batch\FlushingBatch;
use Guzzle\Common\Exception\BatchTransferException;
use Guzzle\Service\Command\AbstractCommand;

/**
 * The BatchWriteItemQueue is a BatchDecorator for Guzzle that implements a
 * queue for sending DynamoDB DeleteItem and PutItem requests. You can add
 * requests to the queue using the easy-to-use DeleteRequest and PutRequest
 * objects, or you can add DeleteItem and PutItem commands which will be
 * converted into the proper format for you. This queue attempts to send the
 * requests with the fewest service calls as possible and also re-queues any
 * unprocessed items.
 */
class WriteRequestBatch extends AbstractBatchDecorator
{
    /**
     * Factory for creating a DynamoDB BatchWriteItemQueue
     *
     * @param AwsClientInterface $client    Client used to transfer requests
     * @param int                $batchSize Size of each batch. The WriteRequestBatch works most efficiently with a
     *                                      batch size that is a multiple of 25
     * @param mixed              $notify    Callback to be run after each flush
     *
     * @return WriteRequestBatch
     */
    public static function factory(
        AwsClientInterface $client,
        $batchSize = WriteRequestBatchTransfer::BATCH_WRITE_MAX_SIZE,
        $notify = null
    ) {
        $builder = BatchBuilder::factory()
            ->createBatchesWith(new BatchSizeDivisor($batchSize))
            ->transferWith(new WriteRequestBatchTransfer($client));

        if ($notify) {
            $builder->notify($notify);
        }

        $batch = new self($builder->build());

        return new FlushingBatch($batch, $batchSize);
    }

    /**
     * {@inheritdoc}
     */
    public function add($item)
    {
        if ($item instanceof WriteRequestInterface) {
            return $this->addRequest($item);
        } elseif ($item instanceof AbstractCommand) {
            return $this->addCommand($item);
        } else {
            throw new InvalidArgumentException('The item are are trying to add to the batch queue is invalid.');
        }
    }

    /**
     * Adds a command to the batch queue by extracting the put or delete request data
     *
     * @param AbstractCommand $command The command. Should be a PutItem or DeleteItem command
     *
     * @return self
     *
     * @throws InvalidArgumentException
     */
    public function addCommand(AbstractCommand $command)
    {
        // Convert PutItem and DeleteItem into the correct format
        $name = $command->getName();
        if (in_array($name, array('PutItem', 'DeleteItem'))) {
            $class   = __NAMESPACE__ . '\\' . str_replace('Item', 'Request', $name);
            $request = $class::fromCommand($command);
        } else {
            throw new InvalidArgumentException('The command provided was not a PutItem or DeleteItem command.');
        }

        return $this->addRequest($request);
    }

    /**
     * Adds an item to be put to the batch queue
     *
     * @param string    $table The DynamoDB table name
     * @param Key|array $item  The item to be put
     *
     * @return self
     */
    public function addItemToPut($table, $item)
    {
        if (!($item instanceof Item)) {
            $item = Item::fromArray($item);
        }

        return $this->addRequest(new PutRequest($item, $table));
    }

    /**
     * Adds a key to be deleted to the batch queue
     *
     * @param string      $table    The DynamoDB table name
     * @param Key|string  $hashKey  The hash key or key object
     * @param string|null $rangeKey The range key
     *
     * @return self
     */
    public function addKeyToDelete($table, $hashKey, $rangeKey = null)
    {
        $key = $hashKey;
        if (!($key instanceof Key)) {
            $key = new Key($hashKey, $rangeKey);
        }

        return $this->addRequest(new DeleteRequest($key, $table));
    }

    /**
     * Adds a WriteRequest to the batch queue
     *
     * @param WriteRequestInterface $request A request object to be added
     *
     * @return self
     */
    public function addRequest(WriteRequestInterface $request)
    {
        $this->decoratedBatch->add($request);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
        // Flush the queue
        $items = array();
        while (!$this->decoratedBatch->isEmpty()) {
            try {
                $items = array_merge($items, $this->decoratedBatch->flush());
            } catch (BatchTransferException $e) {
                $unprocessed = $e->getPrevious();
                if ($unprocessed instanceof UnprocessedWriteRequestsException) {
                    // Handles the UnprocessedItemsException that may occur for
                    // throttled items the batch. These are re-queued here
                    foreach ($unprocessed as $unprocessedItem) {
                        $this->add($unprocessedItem);
                    }
                } else {
                    // Re-throw the exception if not handled
                    throw $e;
                }
            }
        }

        return $items;
    }
}
