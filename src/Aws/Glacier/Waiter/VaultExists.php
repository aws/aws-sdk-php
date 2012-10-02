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

namespace Aws\Glacier\Waiter;

use Aws\Common\Enum\UaString as Ua;
use Aws\Common\Waiter\AbstractResourceWaiter;
use Aws\Glacier\Exception\ResourceNotFoundException;

/**
 * Returns true when the bucket exists
 */
class VaultExists extends AbstractResourceWaiter
{
    protected $interval = 3;
    protected $maxAttempts = 15;
    protected $maxFailures = 15;

    /**
     * Wait until a bucket exists
     */
    protected function doWait()
    {
        try {
            $this->client->getCommand('DescribeVault', array(
                'vaultName' => $this->resourceId,
                Ua::OPTION  => Ua::WAITER
            ))->execute();

            return true;
        } catch (ResourceNotFoundException $e) {
            return false;
        }
    }
}
