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

namespace Aws\Service\Glacier;

use Aws\Service\Glacier\Multipart\UploadPartGenerator;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Adds the content sha256 and tree hash to Glacier upload requests if not set
 */
class GlacierUploadListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['prepare' => ['onPrepare', RequestEvents::EARLY]];
    }

    /**
     * Retrieve bodies passed in as UploadPartContext objects and set the real
     * hash, length, etc. values on the command
     *
     * @param PrepareEvent $event Event emitted
     */
    public function onPrepare(PrepareEvent $event)
    {
        $command = $event->getCommand();
        $contentHash = $command['ContentSHA256'];
        if ($contentHash === true) {
            $request = $event->getRequest();
            $upload = UploadPartGenerator::createSingleUploadPart(
                $request->getBody()
            );
            $request->setHeader(
                'x-amz-content-sha256',
                $upload->getContentHash()
            );
            if (!$command['checksum']) {
                $request->setHeader(
                    'x-amz-sha256-tree-hash',
                    $upload->getChecksum()
                );
            }
        } elseif (is_string($contentHash)) {
            $request = $event->getRequest();
            $request->addHeader('x-amz-content-sha256', $contentHash);
        }
    }
}
