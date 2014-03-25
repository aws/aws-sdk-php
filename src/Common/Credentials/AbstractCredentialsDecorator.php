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

/**
 * Abstract credentials decorator
 */
class AbstractCredentialsDecorator implements CredentialsInterface
{
    /** @var CredentialsInterface Wrapped credentials object */
    protected $credentials;

    /**
     * Constructs a new BasicAWSCredentials object, with the specified AWS
     * access key and AWS secret key
     *
     * @param CredentialsInterface $credentials
     */
    public function __construct(CredentialsInterface $credentials)
    {
        $this->credentials = $credentials;
    }

    public function toArray()
    {
        return $this->credentials->toArray();
    }

    public function getAccessKeyId()
    {
        return $this->credentials->getAccessKeyId();
    }

    public function getSecretKey()
    {
        return $this->credentials->getSecretKey();
    }

    public function getSecurityToken()
    {
        return $this->credentials->getSecurityToken();
    }

    public function getExpiration()
    {
        return $this->credentials->getExpiration();
    }

    public function isExpired()
    {
        return $this->credentials->isExpired();
    }
}
