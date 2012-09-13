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

namespace Aws\Glacier;

use Guzzle\Common\Event;
use Guzzle\Service\Command\AbstractCommand;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener used to set the x-amz-content-sha256 header to a hash of the payload when appropriate
 */
class PayloadHashListener implements EventSubscriberInterface
{
    /**
     * @var array Commands that should include the x-amz-content-sha256 header
     */
    protected static $whitelist = array('UploadArchive', 'UploadMultipartPart');

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
     * Add the x-amz-content-sha256 header to streaming uploads
     *
     * @param Event $event Event emitted
     */
    public function onCommandBeforeSend(Event $event)
    {
        /** @var $command AbstractCommand */
        $command = $event['command'];
        if (in_array($command->getName(), self::$whitelist)) {
            $request = $command->getRequest();
            $hash = TreeHashGenerator::linearHash($request->getBody());
            $request->setHeader('x-amz-content-sha256', $hash);
        }
    }
}
