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

use Aws\DynamoDb\Model\Key;
use Aws\DynamoDb\Model\Item;
use Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Common\Batch\BatchBuilder;
use Guzzle\Common\Batch\BatchSizeDivisor;
use Guzzle\Common\Batch\AbstractBatchDecorator;
use Guzzle\Common\Exception\BatchTransferException;
use Guzzle\Http\Exception\ClientErrorResponseException;

/**
 * The BatchWriteItemQueue is a BatchDecorator for Guzzle that implements a
 * queue for sending DynamoDB DeleteItem and PutItem requests. You can add
 * requests to the queue using the easy-to-use DeleteRequest and PutRequest
 * objects, or you can add delete_item and put_item commands which will be
 * converted into the proper format for you. This queue attempts to send the
 * requests with the fewest service calls as possible and also re-queues any
 * unprocessed items.
 *
 * @method WriteRequestBatch setThreshold($threshold)
 */
class WriteRequestBatch extends AbstractBatchDecorator
{
    /**
     * Defines the maximum allowed batch size
     */
    const MAX_BATCH_SIZE = 25;

    /**
     * Defines how much to change the batch size if the request is too large
     */
    const BATCH_SIZE_STEP = 2;

    /**
     * Factory for creating a DynamoDB BatchWriteItemQueue
     *
     * @param AwsClientInterface $client    Client used to transfer requests
     * @param int                $batchSize Size of each batch
     * @param mixed              $notify    Callable function to be notified on each flush
     *
     * @return WriteRequestBatch
     */
    public static function factory(AwsClientInterface $client, $batchSize = self::MAX_BATCH_SIZE, $notify = null)
    {
        $batch = BatchBuilder::factory()
            ->createBatchesWith(new BatchSizeDivisor($batchSize))
            ->transferWith(new WriteRequestBatchTransfer($client))
            ->autoFlushAt($batchSize);

        if ($notify) {
            $batch->notify($notify);
        }

        return new self($batch->build());
    }

    /**
     * {@inheritdoc}
     */
    public function add($item)
    {
        if ($item instanceof AbstractCommand) {
            $item = $this->convertCommandToWriteRequest($item);
        }

        if (!($item instanceof WriteRequestInterface)) {
            throw new InvalidArgumentException('All items in the batch must be'
                . ' a type of WriteRequestInterface.');
        }

        return $this->decoratedBatch->add($item);
    }

    /**
     * {@inheritdoc}
     * Note: Since the items that were successfully processed are hard to
     * determine, and since the queue re-queues any unprocessed items,
     * this flush function will always return an empty array.
     */
    public function flush()
    {
        // Flush the queue
        while (count($this->decoratedBatch)) {
            try {
                $this->decoratedBatch->flush();
            } catch (BatchTransferException $eTransfer) {
                // Get the exception that the BatchTransferException is wrapping
                $ePrevious = $eTransfer->getPrevious();
                $isHandled = false;

                // Handle specific exceptions
                if ($ePrevious instanceof UnprocessedWriteRequestsException) {
                    $isHandled = $this->handleUnprocessedItemsException($ePrevious, $eTransfer);
                } elseif ($ePrevious instanceof ClientErrorResponseException) {
                    $isHandled = $this->handleClientErrorResponseException($ePrevious, $eTransfer);
                }

                // Re-throw any unhandled exceptions
                if (!$isHandled) {
                    throw $eTransfer;
                }
            }
        }

        return array();
    }

    /**
     * Convert a command into the appropriate write request from its data
     *
     * @param AbstractCommand $command The command to be converted
     *
     * @return AbstractWriteRequest|null
     */
    protected function convertCommandToWriteRequest(AbstractCommand $command)
    {
        $request = null;

        if ($command->getName() === 'DeleteItem') {
            // Get relevant data for a DeleteRequest
            $table = $command->get('TableName');
            $key   = $command->get('Key');

            // Create a Key object from the 'key' command data
            if (!($key instanceof Key)) {
                $key = new Key($key);
            }

            // Return an instantiated DeleteRequest object
            $request = new DeleteRequest($key, $table);
        } elseif ($command->getName() === 'PutItem') {
            // Get relevant data for a PutRequest
            $table = $command->get('TableName');
            $item  = $command->get('Item');

            // Create an Item object from the 'item' command data
            if (!($item instanceof Item)) {
                $item = new Item($item, $table);
            }

            // Return an instantiated PutRequest object
            $request = new PutRequest($item, $table);
        }

        return $request;
    }

    /**
     * Handles UnprocessedItemsException that may occur in the course of
     * flushing the queue. Unprocessed items are re-queued by the handler.
     *
     * @param UnprocessedWriteRequestsException $exception The exception during the transfer
     *
     * @return bool
     */
    protected function handleUnprocessedItemsException(UnprocessedWriteRequestsException $exception)
    {
        /** @var $item UnprocessedRequest */
        foreach ($exception->getItems() as $item) {
            $this->add($item);
        }

        return true;
    }

    /**
     * Handles ClientErrorResponseException with status code 413 that may occur
     * in the course of flushing the queue. This indicates that the request was
     * rejected because it was larger than 1 MB, the DynamoDB limit for batch
     * operations. In this case, all the failed and remaining items are re-
     * queued, and we decrease the batch size and auto-flush threshold.
     *
     * @param ClientErrorResponseException $exception   The exception during the transfer
     * @param BatchTransferException $transferException The transfer exception
     *
     * @return bool
     */
    protected function handleClientErrorResponseException(
        ClientErrorResponseException $exception,
        BatchTransferException $transferException
    )
    {
        $handled = false;

        if ($exception->getResponse()->getStatusCode() == 413) {
            // Get the divisor and calculate a new batch size
            /** @var $divisor BatchSizeDivisor */
            $divisor = $transferException->getDivisorStrategy();
            $newSize = $divisor->getSize() - self::BATCH_SIZE_STEP;

            if ($newSize > 0) {
                // Set the batch size to be smaller
                $divisor->setSize($newSize);

                // Set the auto-flush threshold to the new batch size
                $this->setThreshold($newSize);

                $handled = true;
            }
        }

        return $handled;
    }
}
