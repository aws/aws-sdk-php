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

namespace Aws\S3\Waiter;

use Aws\Common\Enum\UaString as Ua;
use Aws\Common\Waiter\AbstractResourceWaiter;

/**
 * Returns true when the bucket exists
 */
class BucketExists extends AbstractResourceWaiter
{
    protected $interval = 5;
    protected $maxAttempts = 20;
    protected $maxFailures = 0;

    /**
     * Wait until a bucket exists
     */
    protected function doWait()
    {
       return $this->client->doesBucketExist($this->resourceId, true, array(Ua::OPTION => Ua::WAITER));
    }
}
