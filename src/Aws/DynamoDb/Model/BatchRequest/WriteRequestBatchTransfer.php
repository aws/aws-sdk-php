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
use Aws\Common\Exception\DomainException;
use Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
use Guzzle\Common\Batch\BatchTransferInterface;

/**
 * Transfer logic for executing the write request batch
 */
class WriteRequestBatchTransfer implements BatchTransferInterface
{
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
        if (empty($batch)) {
            return;
        } elseif (count($batch) > WriteRequestBatch::MAX_BATCH_SIZE) {
            throw new DomainException('The batch size cannot exceed the maximum'
                . ' allowed batch size for the BatchWriteItem operation.');
        }

        // Convert the request items into the format required by the dynamo client
        $requestItems = array();
        foreach ($batch as $requestItem) {
            /** @var $requestItem AbstractWriteRequest */
            $table = $requestItem->getTableName();
            if (!isset($requestItems[$table])) {
                $requestItems[$table] = array();
            }
            $requestItems[$table][] = $requestItem->toArray();
        }

        // Execute the BatchWriteItem request
        $result = $this->client->getCommand('BatchWriteItem')
            ->set('RequestItems', $requestItems)
            ->execute();

        // Re-queue any unsuccessful batched requests
        if (isset($result['UnprocessedItems'])) {
            $exception = new UnprocessedWriteRequestsException('There were unprocessed'
                . ' items in the batch_write_item operation.');

            foreach ($result['UnprocessedItems'] as $table => $unprocessed) {
                foreach ($unprocessed as $data) {
                    $exception->addItem(new UnprocessedRequest($data, $table));
                }
            }

            throw $exception;
        }
    }
}
