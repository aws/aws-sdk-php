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

namespace Aws\Sts;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS Security Token Service
 *
 * @method Model assumeRole(array $args = array()) {@command Sts AssumeRole}
 * @method Model assumeRoleWithWebIdentity(array $args = array()) {@command Sts AssumeRoleWithWebIdentity}
 * @method Model decodeAuthorizationMessage(array $args = array()) {@command Sts DecodeAuthorizationMessage}
 * @method Model getFederationToken(array $args = array()) {@command Sts GetFederationToken}
 * @method Model getSessionToken(array $args = array()) {@command Sts GetSessionToken}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-sts.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.Sts.StsClient.html API docs
 */
class StsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2011-06-15';

    /**
     * Factory method to create a new Amazon STS client using an array of configuration options:
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @throws InvalidArgumentException
     * @see \Aws\Common\Client\DefaultClient for a list of available configuration options
     */
    public static function factory($config = array())
    {
        // Always need long term credentials
        if (!isset($config[Options::CREDENTIALS]) && isset($config[Options::TOKEN])) {
            throw new InvalidArgumentException('You must use long-term credentials with Amazon STS');
        }

        // Construct the STS client with the client builder
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/sts-%s.php'
            ))
            ->build();
    }

    /**
     * Creates a credentials object from the credential data return by an STS operation
     *
     * @param Model $result The result of an STS operation
     *
     * @return Credentials
     * @throws InvalidArgumentException if the result does not contain credential data
     */
    public function createCredentials(Model $result)
    {
        if (!$result->hasKey('Credentials')) {
            throw new InvalidArgumentException('The modeled result provided contained no credentials.');
        }

        return new Credentials(
            $result->getPath('Credentials/AccessKeyId'),
            $result->getPath('Credentials/SecretAccessKey'),
            $result->getPath('Credentials/SessionToken'),
            $result->getPath('Credentials/Expiration')
        );
    }
}
