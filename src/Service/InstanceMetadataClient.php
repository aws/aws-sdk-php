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

namespace Aws\Service;

use Aws\Credentials\Credentials;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Client used for interacting with the Amazon EC2 instance metadata server
 */
class InstanceMetadataClient
{
    /**
     * @param ClientInterface $client Optionally provide a client to customize
     *                                settings like timeouts.
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?: new Client([
            'base_url' => 'http://169.254.169.254/latest/',
            'defaults' => [
                'connect_timeout' => 5,
                'timeout'         => 10
            ]
        ]);
    }

    /**
     * Wait until the instance metadata server is responding to requests.
     *
     * @param int $maxWait Maximum number of seconds to wait
     */
    public function waitUntilRunning($maxWait = 120)
    {
        // @todo: Implement
    }

    /**
     * Get a specific data point from the instance metadata server.
     *
     * @param string $path Instance metadata path to retrieve
     *
     * @return mixed
     */
    public function get($path)
    {
        return $this->client->get($path)->json();
    }

    /**
     * Get instance profile credentials
     *
     * @return Credentials
     * @throws \RuntimeException
     */
    public function getInstanceProfileCredentials()
    {
        try {
            $result = $this->get(
                "meta-data/iam/security-credentials/"
                . $this->get('meta-data/iam/security-credentials/')
            );
        } catch (\Exception $e) {
            $message = sprintf('Error retrieving credentials from the instance'
                . ' profile metadata server. When you are not running inside of'
                . ' Amazon EC2, you must provide your AWS access key ID and '
                . ' secret access key in the "key" and "secret" options when '
                . ' creating a client or provide an instantiated '
                . ' Aws\\Common\\Credentials\\CredentialsInterface object.'
                . ' (%s)', $e->getMessage());
            throw new \RuntimeException($message, $e->getCode());
        }

        // Ensure that the status code was successful
        if ($result['Code'] !== 'Success') {
            throw new \RuntimeException('Unexpected instance profile response '
                . 'code: ' . $result['Code']);
        }

        return new Credentials(
            $result['AccessKeyId'],
            $result['SecretAccessKey'],
            $result['Token'],
            strtotime($result['Expiration'])
        );
    }
}
