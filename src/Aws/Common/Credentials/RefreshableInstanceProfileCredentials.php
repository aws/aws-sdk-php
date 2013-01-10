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

namespace Aws\Common\Credentials;

use Aws\Common\InstanceMetadata\InstanceMetadataClient;
use Aws\Common\Exception\InstanceProfileCredentialsException;

/**
 * Credentials decorator used to implement retrieving credentials from the
 * EC2 metadata server
 */
class RefreshableInstanceProfileCredentials extends AbstractRefreshableCredentials
{
    /**
     * @var InstanceMetadataClient
     */
    protected $client;

    /**
     * Constructs a new instance profile credentials decorator
     *
     * @param CredentialsInterface   $credentials Credentials to adapt
     * @param InstanceMetadataClient $client      Client used to get new credentials
     */
    public function __construct(CredentialsInterface $credentials, InstanceMetadataClient $client = null)
    {
        $this->credentials = $credentials;
        $this->client = $client ?: InstanceMetadataClient::factory();
    }

    /**
     * Attempt to get new credentials from the instance profile
     *
     * @throws InstanceProfileCredentialsException On error
     */
    protected function refresh()
    {
        try {

            $request = $this->client->get('meta-data/iam/security-credentials/');

            $request->getCurlOptions()
                ->set(CURLOPT_TIMEOUT, 1)
                ->set(CURLOPT_CONNECTTIMEOUT, 1);

            $credentials = trim($request->send()->getBody(true));
            $json = $this->client->get("meta-data/iam/security-credentials/{$credentials}")->send()->getBody(true);
            $result = json_decode($json, true);

        } catch (\Exception $e) {
            $message = 'Error retrieving credentials from the instance profile metadata server.  When you are not'
                . ' running inside of Amazon EC2, you must provide your AWS access key ID and secret access key in'
                . ' the "key" and "secret" options when creating a client or provide an instantiated'
                . ' Aws\\Common\\Credentials\\CredentialsInterface object.';
            throw new InstanceProfileCredentialsException($message, $e->getCode(), $e);
        }

        // Ensure that the status code was successful
        if ($result['Code'] !== 'Success') {
            $e = new InstanceProfileCredentialsException('Unexpected response code: ' . $result['Code']);
            $e->setStatusCode($result['Code']);
            throw $e;
        }

        $this->credentials
            ->setAccessKeyId($result['AccessKeyId'])
            ->setSecretKey($result['SecretAccessKey'])
            ->setSecurityToken($result['Token'])
            ->setExpiration(strtotime($result['Expiration']));
    }
}
