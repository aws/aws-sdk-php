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

namespace Aws\DynamoDb\Model;

use Guzzle\Service\Resource\ResourceIterator;

/**
 * Iterate over a ListTables command
 */
class ListTablesIterator extends ResourceIterator
{
    protected function sendRequest()
    {
        // If a next token is set, then add it to the command
        if ($this->nextToken) {
            $this->command->set('ExclusiveStartTableName', $this->nextToken);
        }

        // Execute the command and parse the result
        $this->command->execute();
        $result = $this->command->getResult();

        // Parse the next token
        $this->nextToken = isset($result['LastEvaluatedTableName']) ? $result['LastEvaluatedTableName'] : false;

        return $result['TableNames'];
    }
}
