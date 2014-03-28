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

namespace Aws\Service\Sqs;

use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Url;

/**
 * Listener used to change the endpoint to the queue URL
 */
class QueueUrlListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['prepare' => ['onPrepare', RequestEvents::EARLY]];
    }

    public function onPrepare(PrepareEvent $event)
    {
        $command = $event->getCommand();
        if ($queueUrl = $command['QueueUrl']) {
            $request = $event->getRequest();
            $url = Url::fromString($request->getUrl())->combine($queueUrl);
            $request->setUrl($url);
        }
    }
}
