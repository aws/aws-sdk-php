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

use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Credentials\RefreshableInstanceProfileCredentials;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Common\Collection;

/**
 * Configures credentials for a configuration collection.
 *
 * If an 'key' and 'secret' are provided, then this resolver will instantiate
 * a default credentials object for the config. If a 'credential' option is
 * provided, then this resolver will ensure that the 'credential' option is
 * valid and implements {@see CredentialsInterface}.
 *
 * If none of the above are provided, then this resolver will add credentials
 * to the configuration that attempt to get credentials from an Amazon EC2
 * instance profile server.
 */
class CredentialsOptionResolver extends AbstractMissingFunctionOptionResolver
{
    /**
     * @param string $missingFunction Provide a callable function to call if the 'credentials' parameter is not set.
     * @param string $mustImplement   Provide the name of a class or interface that the 'signature' option must extend
     */
    public function __construct(
        $missingFunction = null,
        $mustImplement = 'Aws\\Common\\Credentials\\CredentialsInterface'
    ) {
        if ($missingFunction) {
            $this->setMissingFunction($missingFunction);
        } else {
            $this->setMissingFunction(array($this, 'defaultMissingFunction'));
        }
        $this->setMustImplement($mustImplement);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(Collection $config, AwsClientInterface $client = null)
    {
        $credentials = $config->get(Options::CREDENTIALS);

        if (!$credentials && $this->missingFunction) {
            $credentials = call_user_func($this->missingFunction, $config);
            $config->set(Options::CREDENTIALS, $credentials);
        }

        // Ensure that the credentials are valid
        if ($credentials && !($credentials instanceof $this->mustImplement)) {
            throw new InvalidArgumentException('The credentials you provided do not implement ' . $this->mustImplement);
        }
    }

    /**
     * Default method to execute when credentials are not specified
     *
     * @param Collection $config Config options
     *
     * @return CredentialsInterface
     */
    protected function defaultMissingFunction(Collection $config)
    {
        if ($config->get(Options::KEY) && $config->get(Options::SECRET)) {
            // Credentials were not provided, so create them using keys
            return Credentials::factory($config->getAll());
        }

        // Attempt to get credentials from the EC2 instance profile server
        return new RefreshableInstanceProfileCredentials(new Credentials('', '', '', 1));
    }
}
