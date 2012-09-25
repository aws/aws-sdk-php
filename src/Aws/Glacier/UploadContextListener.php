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

use Aws\Common\Enum\Size;
use Aws\Glacier\Model\UploadContext;
use Guzzle\Common\Event;
use Guzzle\Http\Message\EntityEnclosingRequest;
use Guzzle\Http\ReadLimitEntityBody;
use Guzzle\Service\Command\AbstractCommand;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener that handles converting UploadContext objects into command parameters for Glacier's upload operations
 */
class UploadContextListener implements EventSubscriberInterface
{
    /**
     * @var array Commands that should include the hash header
     */
    protected static $whitelist = array('UploadArchive', 'UploadMultipartPart');

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'command.before_prepare' => array('onCommandBeforePrepare'),
        );
    }

    /**
     * Retrieve bodies passed in as UploadContext objects and set the real hash, length, etc. values on the command
     *
     * @param Event $event Event emitted
     */
    public function onCommandBeforePrepare(Event $event)
    {
        /** @var $command AbstractCommand */
        $command   = $event['command'];
        $operation = $command->getName();

        /** @var $upload UploadContext */
        $context = $command->get('glacier.context');

        if (in_array($operation, self::$whitelist) && $context instanceof UploadContext) {
            // Add required data for uploads
            $command->set('checksum', $context->getChecksum());
            $command->set('body', $context->getBody());
            $command->set('command.headers', array(
                'x-amz-content-sha256' => $context->getContentHash(),
                'Content-Length'       => $context->getSize()
            ));

            // Add range only for multipart upload parts
            if ($operation === 'UploadMultipartPart') {
                list($start, $end) = $context->getRange();
                $command->set('range', "bytes {$start}-${end}/*");
                $command->set('body', new ReadLimitEntityBody(
                    $context->getBody(),
                    $context->getSize(),
                    $context->getOffset()
                ));
            }
        }
    }
}
