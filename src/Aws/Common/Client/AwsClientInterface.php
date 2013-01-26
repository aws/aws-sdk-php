<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Common\Client;

use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Region\EndpointProviderInterface;
use Aws\Common\Waiter\WaiterFactoryInterface;
use Guzzle\Service\ClientInterface;

/**
 * Interface that all AWS clients implement
 */
interface AwsClientInterface extends ClientInterface
{
    /**
     * Returns the AWS credentials associated with the client
     *
     * @return CredentialsInterface
     */
    public function getCredentials();

    /**
     * Returns the signature implementation used with the client
     *
     * @return SignatureInterface
     */
    public function getSignature();

    /**
     * Get the endpoint provider used with the client
     *
     * @return EndpointProviderInterface
     */
    public function getEndpointProvider();

    /**
     * Set the waiter factory to use with the client
     *
     * @param WaiterFactoryInterface $waiterFactory Factory used to create waiters
     *
     * @return self
     */
    public function setWaiterFactory(WaiterFactoryInterface $waiterFactory);

    /**
     * Wait until a resource is available or an associated waiter returns true
     *
     * @param string $waiter Name of the waiter in snake_case
     * @param array  $input  Values used as input for the underlying operation and values used to control the waiter
     *
     * @return self
     */
    public function waitUntil($waiter, array $input = array());
}
