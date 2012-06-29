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

use Aws\DynamoDb\Model\Item;
use Aws\Common\Exception\InvalidArgumentException;

/**
 * Represents a batch put request. It is composed of a table name and item
 */
class PutRequest extends AbstractWriteRequest
{
    /**
     * @var Item The item to be inserted into the DynamoDB table
     */
    protected $item;

    /**
     * Constructs a nee put request
     *
     * @param Item   $item      The item to put into DynamoDB
     * @param string $tableName The name of the table which has the item
     * @throw InvalidArgumentException If the table name is not provided
     */
    public function __construct(Item $item, $tableName = null)
    {
        $this->item      = $item;
        $this->tableName = $tableName ?: $item->getTableName();

        if (!$this->tableName) {
            throw new InvalidArgumentException('A table name is required to create a PutRequest.');
        }
    }

    /**
     * The parameter form of the request
     *
     * @return array
     */
    public function toArray()
    {
        return array('PutRequest' => array('Item' => $this->item->toArray()));
    }

    /**
     * Get the item
     *
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }
}
