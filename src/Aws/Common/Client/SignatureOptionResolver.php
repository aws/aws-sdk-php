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

namespace Aws\Common\Client;

use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Signature\EndpointSignatureInterface;
use Guzzle\Common\Collection;

/**
 * Ensures that a 'signature' option is present on a configuration collection.
 *
 * If a 'signature' option is present in the configuration, then this resolver
 * ensures that the option implements a specific class passed in the constructor
 * or by default a {@see Aws\Common\Signature\SignatureInterace}.
 *
 * If the option is not present, a default signature object will be instantiated
 * and added to the configuration using a callable method that provided the
 * object.
 */
class SignatureOptionResolver extends AbstractMissingFunctionOptionResolver
{
    /**
     * @param string $missingFunction Provide a callable function to call if the 'signature' parameter is not set
     * @param string $mustImplement   Provide the name of a class or interface that the 'signature' option must extend
     */
    public function __construct(
        $missingFunction = null,
        $mustImplement = 'Aws\\Common\\Signature\\SignatureInterface')
    {
        if ($missingFunction) {
            $this->setMissingFunction($missingFunction);
        }
        $this->setMustImplement($mustImplement);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(Collection $config, AwsClientInterface $client = null)
    {
        $signature = $config->get(Options::SIGNATURE);

        // Ensure that a signature object is passed to the client
        if (!$signature && $this->missingFunction) {
            // The signature was not provided, so use the callback to get one
            $signature = call_user_func($this->missingFunction, $config);
            $config->set(Options::SIGNATURE, $signature);
        } elseif (!($signature instanceof $this->mustImplement)) {
            throw new InvalidArgumentException(
                'An explicitly provided ' . Options::SIGNATURE . ' option must implement SignatureInterface'
            );
        }

        // If this is a region and service specific signature object then add
        // these values to the signature object if they are present in the config
        if ($signature instanceof EndpointSignatureInterface) {
            if ($serviceName = $config->get(Options::SIGNATURE_SERVICE)) {
                $signature->setServiceName($serviceName);
            }
            if ($regionName = $config->get(Options::SIGNATURE_REGION)) {
                $signature->setRegionName($regionName);
            }
        }
    }
}
