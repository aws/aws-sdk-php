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

use Aws\Service\Exception\SqsException;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Listener used to validate the MD5 of the ReceiveMessage body.
 */
class Md5ValidatorListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['process' => ['onProcess', RequestEvents::LATE]];
    }

    public function onProcess(ProcessEvent $event)
    {
        if ($event->getCommand()->getName() !== 'ReceiveMessage') {
            return;
        }

        $result = $event->getResult();
        if (isset($result['Messages'])) {
            foreach ($result['Messages'] as $message) {
                if ($message['MD5OfBody'] != md5($message['Body'])) {
                    throw new SqsException(
                        'Body MD5 mismatch for ' . var_export($message, true),
                        $event->getClient(),
                        $event->getCommand(),
                        $event->getRequest(),
                        $event->getResponse()
                    );
                }
            }
        }
    }
}
