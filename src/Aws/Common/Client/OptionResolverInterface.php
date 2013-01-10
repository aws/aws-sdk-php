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

use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Common\Collection;

/**
 * Validates and prepares configuration options for a client
 */
interface OptionResolverInterface
{
    /**
     * Ensures that a configuration collection has required parameters and
     * if not tries to add default values based on context,
     *
     * @param Collection         $config Configuration data to check and update
     * @param AwsClientInterface $client Client to pass to the resolver
     *
     * @throws InvalidArgumentException if the provided configuration is invalid
     */
    public function resolve(Collection $config, AwsClientInterface $client = null);
}
