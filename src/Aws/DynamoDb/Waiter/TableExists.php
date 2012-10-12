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

namespace Aws\DynamoDb\Waiter;

use Aws\Common\Enum\UaString as Ua;
use Aws\Common\Waiter\AbstractResourceWaiter;
use Aws\DynamoDb\Exception\ResourceNotFoundException;

/**
 * Returns true when the table exists and optionally matches a particular status
 */
class TableExists extends AbstractResourceWaiter
{
    protected $interval = 20;
    protected $maxAttempts = 25;
    protected $maxFailures = 0;

    /**
     * Wait until a table exists, and optionally has a status of ACTIVE
     */
    protected function doWait()
    {
        try {
            $result = $this->client->getCommand('DescribeTable', array(
                'TableName' => $this->resourceId,
                Ua::OPTION  => Ua::WAITER
            ))->execute();

            $this->config['status'] = isset($this->config['status']) ? $this->config['status'] : 'ACTIVE';

            // If a status was specified, check if the table has that status
            // Otherwise, return true because the table exists
            return isset($this->config['status'])
                ? !strcasecmp($result['Table']['TableStatus'], $this->config['status'])
                : true;

        } catch (ResourceNotFoundException $e) {
            return false;
        }
    }
}
