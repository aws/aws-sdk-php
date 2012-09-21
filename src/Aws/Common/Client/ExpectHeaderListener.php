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

use Guzzle\Common\Event;
use Guzzle\Service\Command\AbstractCommand;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener used to set (or remove) the Expect header for specified commands
 */
class ExpectHeaderListener implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'command.before_send' => array('onCommandBeforeSend')
        );
    }

    /**
     * Add or remove the expect header before sending the command
     *
     * @param Event $event Event emitted
     */
    public function onCommandBeforeSend(Event $event)
    {
        /** @var $command AbstractCommand */
        $command = $event['command'];
        if ($command->get('command.use_expect')) {
            $command->getRequest()->setHeader('Expect', '100-Continue');
        } else {
            $command->getRequest()->removeHeader('Expect');
        }
    }
}
