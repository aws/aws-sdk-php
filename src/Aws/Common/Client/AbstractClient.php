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

use Aws\Common\Aws;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Signature\SignatureListener;
use Aws\Common\Waiter\WaiterFactoryInterface;
use Aws\Common\Waiter\WaiterClassFactory;
use Guzzle\Common\Collection;
use Guzzle\Service\Client;

/**
 * Abstract AWS client
 */
abstract class AbstractClient extends Client implements AwsClientInterface
{
    /**
     * @var int Ensure that missing methods are executed using service descriptions
     */
    protected $magicMethodBehavior = self::MAGIC_CALL_EXECUTE;

    /**
     * @var CredentialsInterface AWS credentials
     */
    protected $credentials;

    /**
     * @var SignatureInterface Signature implementation of the service
     */
    protected $signature;

    /**
     * @var WaiterFactoryInterface Factory used to create waiter classes
     */
    protected $waiterFactory;

    /**
     * @param CredentialsInterface $credentials AWS credentials
     * @param SignatureInterface   $signature   Signature implementation
     * @param Collection           $config      Configuration options
     */
    public function __construct(CredentialsInterface $credentials, SignatureInterface $signature, Collection $config)
    {
        // Bootstrap with Guzzle
        parent::__construct($config->get('base_url'), $config);
        $this->credentials = $credentials;
        $this->signature = $signature;

        // Add the event listener so that requests are signed before they are sent
        $this->getEventDispatcher()->addSubscriber(new SignatureListener($credentials, $signature));

        // Resolve any config options on the client that require a client to
        // be instantiated in order to resolve config options
        $resolvers = $config->get('client.resolvers');
        if ($resolvers) {
            foreach ($resolvers as $resolver) {
                $resolver->resolve($config, $this);
            }
            $config->remove('client.resolvers');
        }

        // Make sure the user agent is prefixed by the SDK version
        $this->setUserAgent('aws-sdk-php/' . Aws::VERSION, true);
    }

    /**
     * {@inheritdoc}
     */
    public function __call($method, $args = null)
    {
        return parent::__call(ucfirst($method), $args);
    }

    /**
     * Get the AWS credentials used with the client
     *
     * @return CredentialsInterface
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * Get the signature implementation used with the client
     *
     * @return SignatureInterface
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Wait until a resource is available or an associated waiter returns true
     *
     * @param string $waiter  Name of the waiter in snake_case
     * @param mixed  $value   Value to pass to the waiter
     * @param array  $options Options to pass to the waiter
     *
     * @return self
     */
    public function waitUntil($waiter, $value = null, array $options = array())
    {
        $this->getWaiterFactory()->factory($waiter)
            ->setResourceId($value)
            ->setClient($this)
            ->setConfig($options)
            ->wait();

        return $this;
    }

    /**
     * Set the waiter factory to use with the client
     *
     * @param WaiterFactoryInterface $waiterFactory Factory used to create waiters
     *
     * @return self
     */
    public function setWaiterFactory(WaiterFactoryInterface $waiterFactory)
    {
        $this->waiterFactory = $waiterFactory;

        return $this;
    }

    /**
     * Get the waiter factory used with the class
     *
     * @return WaiterFactoryInterface
     */
    protected function getWaiterFactory()
    {
        if (!$this->waiterFactory) {
            $clientClass = get_class($this);
            $this->waiterFactory = new WaiterClassFactory(substr($clientClass, 0, strrpos($clientClass, '\\')) . '\\Waiter');
        }

        return $this->waiterFactory;
    }
}
