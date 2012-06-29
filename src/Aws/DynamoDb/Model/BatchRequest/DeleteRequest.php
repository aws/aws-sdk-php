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

/**
 * Represents a batch delete request. It is composed of a table name and key
 */
class DeleteRequest extends AbstractWriteRequest
{
    /**
     * @var Key The key of the item to delete
     */
    protected $key;

    /**
     * Constructs a new delete request
     *
     * @param Key    $key       The key of the item to delete
     * @param string $tableName The name of the table which has the item
     */
    public function __construct(Key $key, $tableName)
    {
        $this->key       = $key;
        $this->tableName = $tableName;
    }

    /**
     * The parameter form of the request
     *
     * @return array
     */
    public function toArray()
    {
        return array('DeleteRequest' => array('Key' => $this->key->toArray()));
    }

    /**
     * Get the key
     *
     * @return Key
     */
    public function getKey()
    {
        return $this->key;
    }
}
