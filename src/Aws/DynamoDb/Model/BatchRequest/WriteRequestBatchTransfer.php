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
use Aws\Common\Enum\UaString as Ua;
use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
use Guzzle\Common\Batch\BatchTransferInterface;
use Guzzle\Common\Exception\ExceptionCollection;
use Guzzle\Http\Message\EntityEnclosingRequest;
use Guzzle\Service\Command\CommandInterface;

/**
 * Transfer logic for executing the write request batch
 */
class WriteRequestBatchTransfer implements BatchTransferInterface
{
    /**
     * The maximum number of items allowed in a BatchWriteItem operation
     */
    const BATCH_WRITE_MAX_SIZE = 25;

    /**
     * @var AwsClientInterface The DynamoDB client for doing transfers
     */
    protected $client;

    /**
     * Constructs a transfer using the injected client
     *
     * @param AwsClientInterface $client
     */
    public function __construct(AwsClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function transfer(array $batch)
    {
        // Do nothing if the batch is empty
        if (empty($batch)) {
            return;
        }

        // Chunk the array and prepare a set of parallel commands
        $commands = array();
        foreach (array_chunk($batch, self::BATCH_WRITE_MAX_SIZE) as $chunk) {
            // Convert the request items into the format required by the client
            $items = array();
            foreach ($chunk as $item) {
                if ($item instanceof AbstractWriteRequest) {
                    /** @var $item AbstractWriteRequest */
                    $table = $item->getTableName();
                    if (!isset($items[$table])) {
                        $items[$table] = array();
                    }
                    $items[$table][] = $item->toArray();
                }
            }

            // Create the BatchWriteItem request
            $commands[] = $this->client->getCommand('BatchWriteItem', array(
                'RequestItems' => $items,
                Ua::OPTION     => Ua::BATCH
            ));
        }

        // Execute the commands and handle exceptions
        try {
            $commands = $this->client->execute($commands);
        } catch (ExceptionCollection $exceptions) {
            $this->handleRequestTooLargeExceptions($exceptions);
        }

        // Throw exception to make sure any unsuccessful requests get re-queued
        $this->handleUnprocessedItemsFromCommands($commands);
    }

    /**
     * Collects and creates unprocessed request objects from data collected from
     * erroneous cases.
     *
     * @param array $items Data formatted under "RequestItems" or "UnprocessedItems" keys
     *
     * @return array
     */
    protected function convertResultsToUnprocessedRequests(array $items)
    {
        $unprocessed = array();
        foreach ($items as $table => $requests) {
            foreach ($requests as $request) {
                $unprocessed[] = new UnprocessedRequest($request, $table);
            }
        }

        return $unprocessed;
    }

    /**
     * Handles unprocessed items from the executed commands. Unprocessed items
     * can be collected and thrown in an UnprocessedWriteRequestsException
     *
     * @param array $commands Array of commands
     *
     * @throw UnprocessedWriteRequestsException if there are unprocessed items
     */
    protected function handleUnprocessedItemsFromCommands(array $commands)
    {
        $unprocessed = array();

        /** @var $command CommandInterface */
        foreach ($commands as $command) {
            if ($command instanceof CommandInterface && $command->isExecuted()) {
                $result = $command->getResult();
                $items = $this->convertResultsToUnprocessedRequests($result['UnprocessedItems']);
                foreach ($items as $request) {
                    $unprocessed[] = $request;
                }
            }
        }

        // Throw exception to make sure any unprocessed requests get re-queued
        if (count($unprocessed)) {
            throw new UnprocessedWriteRequestsException($unprocessed);
        }
    }

    /**
     * Handles exceptions caused by the request being too large (over 1 MB). The
     * response will have a status code of 413. In this case the batch should be
     * split up into smaller batches and retried.
     *
     * @param ExceptionCollection $exceptions The collection of exceptions from the batch execution
     *
     * @throw ExceptionCollection if there were exceptions that weren't handled
     */
    protected function handleRequestTooLargeExceptions(ExceptionCollection $exceptions)
    {
        // The exception collection to be returned
        $unhandledExceptions = new ExceptionCollection();

        /** @var $e DynamoDbException */
        foreach ($exceptions as $e) {
            if ($e instanceof DynamoDbException && $e->getStatusCode() === 413) {
                // Get the items that were not successful
                /** @var $request EntityEnclosingRequest */
                $request = $e->getResponse()->getRequest();
                $items = json_decode($request->getBody(true), true);
                $items = $this->convertResultsToUnprocessedRequests($items['RequestItems']);

                // Divide these up into 3 smaller batches and transfer them
                // NOTE: Dividing by 3 (instead of 2) resulted in fewer
                // recursive calls during testing
                if ($items) {
                    $newBatches = array_chunk($items, ceil(count($items) / 3));
                    foreach ($newBatches as $newBatch) {
                        $this->transfer($newBatch);
                    }
                }
            } else {
                $unhandledExceptions->add($e);
            }
        }

        if (count($unhandledExceptions)) {
            throw $unhandledExceptions;
        }
    }
}
