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
 * Iterate over a Scan command
 */
class ScanIterator extends ResourceIterator
{
    /**
     * @var int Total number of scanned items
     */
    protected $scannedCount = 0;

    /**
     * {@inheritdoc}
     */
    protected function sendRequest()
    {
        while(true) {

            // If a next token is set, then add it to the command
            if ($this->nextToken) {
                $this->command->set('ExclusiveStartKey', $this->nextToken);
            }

            // Execute the command and parse the result
            $result = $this->command->execute();

            // Parse the next token
            $this->nextToken = isset($result['LastEvaluatedKey']) ? $result['LastEvaluatedKey'] : false;
            $this->scannedCount += isset($result['ScannedCount']) ? $result['ScannedCount'] : 0;

            $items = isset($result['Items']) ? $result['Items'] : array();

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

    /**
     * Get the total number of scanned items
     *
     * @return int
     */
    public function getScannedCount()
    {
        return $this->scannedCount;
    }
}
