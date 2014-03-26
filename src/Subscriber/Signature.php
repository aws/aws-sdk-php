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

namespace Aws\Subscriber;

use Aws\Signature\SignatureInterface;
use Aws\Credentials\CredentialsInterface;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Event\BeforeEvent;

/**
 * Listener used to sign requests before they are sent over the wire
 */
class Signature implements SubscriberInterface
{
    /** @var CredentialsInterface */
    private $credentials;

    /** @var SignatureInterface */
    private $signature;

    /**
     * Construct a new request signing plugin
     *
     * @param CredentialsInterface $credentials Credentials used for signing
     * @param SignatureInterface   $signature   Signature implementation
     */
    public function __construct(
        CredentialsInterface $credentials,
        SignatureInterface $signature
    ) {
        $this->credentials = $credentials;
        $this->signature = $signature;
    }

    public function getEvents()
    {
        return ['before' => ['onBefore', RequestEvents::SIGN_REQUEST]];
    }

    public function onBefore(BeforeEvent $event)
    {
        $this->signature->signRequest($event->getRequest(), $this->credentials);
    }
}
