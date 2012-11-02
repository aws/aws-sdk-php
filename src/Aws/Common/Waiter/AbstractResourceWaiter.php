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

namespace Aws\Common\Waiter;

use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Exception\RuntimeException;

/**
 * Abstract waiter implementation used to wait on resources
 */
abstract class AbstractResourceWaiter extends AbstractWaiter implements ResourceWaiterInterface
{
    /**
     * @var AwsClientInterface
     */
    protected $client;

    /**
     * @var array Configuration data
     */
    protected $config;

    /**
     * @var string Resource identifier
     */
    protected $resourceId;

    /**
     * Set the client associated with the waiter
     *
     * @param AwsClientInterface $client Client to use with the waiter
     *
     * @return self
     */
    public function setClient(AwsClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Set the way in which a resource is uniquely identified
     *
     * @param string $resourceId Resource ID
     *
     * @return self
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function wait()
    {
        if (!$this->client) {
            throw new RuntimeException('No client has been specified on the waiter');
        }

        if (!$this->resourceId) {
            throw new RuntimeException('No resource ID has been specified on the waiter');
        }

        parent::wait();
    }
}
