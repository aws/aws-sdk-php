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

namespace Aws\DynamoDb\Exception;

use Aws\Common\Exception\RuntimeException;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface;

/**
 * This exception may contain unprocessed write request items
 */
class UnprocessedWriteRequestsException extends RuntimeException
{
    /**
     * @var array Unprocessed write requests
     */
    private $items = array();

    /**
     * Adds an unprocessed write request to the collection
     *
     * @param WriteRequestInterface $unprocessedItem
     *
     * @return UnprocessedWriteRequestsException
     */
    public function addItem(WriteRequestInterface $unprocessedItem)
    {
        $this->items[] = $unprocessedItem;

        return $this;
    }

    /**
     * Returns the collection of unprocessed write requests
     *
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}
