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
 * Returns true when a table does not exist
 */
class TableNotExists extends AbstractResourceWaiter
{
    protected $interval = 30;
    protected $maxAttempts = 60;
    protected $maxFailures = 0;

    /**
     * Wait until a table exists, and optionally has a status of ACTIVE
     */
    protected function doWait()
    {
        try {

            $this->client->getCommand('DescribeTable', array(
                'TableName' => $this->resourceId,
                Ua::OPTION  => Ua::WAITER
            ))->execute();

            return false;

        } catch (ResourceNotFoundException $e) {
            return true;
        }
    }
}
