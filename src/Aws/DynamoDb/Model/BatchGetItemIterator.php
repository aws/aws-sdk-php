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
 * Iterate over a BatchGetItem command
 */
class BatchGetItemIterator extends ResourceIterator
{
    /**
     * {@inheritdoc}
     */
    protected function sendRequest()
    {
        while(true) {

            if ($this->nextToken) {
                $this->command->set('RequestItems', $this->nextToken);
            }

            // Execute the command and parse the result
            $result = $this->command->execute();

            // Parse the next token (unprocessed keys)
            $this->nextToken = isset($result['UnprocessedKeys']) ? $result['UnprocessedKeys'] : false;

            // Add each item to the iterator
            $items = array();
            if (isset($result['Responses'])) {
                foreach ($result['Responses'] as $table) {
                    foreach ($table['Items'] as $item) {
                        $items[] = $item;
                    }
                }
            }

            if (empty($items) && $this->nextToken) {
                // If the results are empty and there is a next token, then
                // issue another request with a new command.
                $this->command = clone $this->originalCommand;
            } else {
                // Exit the loop if there are no more results and no next token
                break;
            }

        };

        return $items;
    }
}
