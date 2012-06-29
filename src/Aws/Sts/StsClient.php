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

namespace Aws\Sts;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Client\CredentialsOptionResolver;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Signature\SignatureV4;
use Guzzle\Common\Collection;
use Guzzle\Service\Inspector;
use Guzzle\Service\Description\ServiceDescription;

/**
 * Client to interact with the AWS Security Token Service
 *
 * @method array getSessionToken(array $args = array()) {@command sts get_session_token}
 * @method array getFederationToken(array $args = array()) {@command sts get_federation_token}
 */
class StsClient extends AbstractClient
{
    /**
     * @var string Default base URL of Amazon STS
     */
    const DEFAULT_BASE_URL = 'https://sts.amazonaws.com';

    /**
     * Factory method to create a new StsClient using an array of configuration
     * options.  The following array keys and values are available options:
     * - base_url:          Set to override the default base URL
     * - access_key_id:     AWS Access Key ID
     * - secret_access_key: AWS secret access key
     * - credentials:       Service credential object (optional)
     * - service.name:      Set to explicitly override the service name
     * - service.region:    Set to explicitly override the region name
     *
     * @param array|Collection $config Configuration data. You must either
     *     supply a {@see Guzzle\Common\Credentials\CredentialsInterface}
     *     object in the 'credentials' key or supply both your AWS access key
     *     ID and AWS secret access key in the 'access_key_id' and
     *     'secret_access_key' options.
     *
     * @return StsClient
     */
    public static function factory($config = array())
    {
        // Construct the STS client with the client builder
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                'base_url' => self::DEFAULT_BASE_URL
            ))
            ->setCredentialsResolver(new CredentialsOptionResolver(function (Collection $config) {
                // Always need long term credentials
                if ($config->get('access_key_id') && $config->get('secret_access_key') && !$config->get('token')) {
                    return Credentials::factory($config->getAll(array_keys(Credentials::getConfigDefaults())));
                }
            }))
            ->setSignature(new SignatureV4())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function __construct(CredentialsInterface $credentials, SignatureInterface $signature, Collection $config)
    {
        parent::__construct($credentials, $signature, $config);

        // Filters used for the cache plugin
        $config->set('params.cache.key_filter', 'header=date,x-amz-date,x-amz-security-token,authorization');

        // Add the service description to the client
        $this->setDescription(ServiceDescription::factory(__DIR__ . '/Resources/client.json'));
    }
}
