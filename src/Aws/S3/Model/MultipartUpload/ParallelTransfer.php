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

namespace Aws\S3\Model\MultipartUpload;

use Aws\Common\Exception\RuntimeException;
use Aws\Common\Enum\DateFormat;
use Aws\Common\Enum\UaString as Ua;
use Guzzle\Http\EntityBody;
use Guzzle\Http\ReadLimitEntityBody;

/**
 * Transfers multipart upload parts in parallel
 */
class ParallelTransfer extends AbstractTransfer
{
    /**
     * @var array Array of {@see ReadLimitEntityBody} objects
     */
    protected $parts;

    /**
     * @var int Concurrency level to use
     */
    protected $concurrency;

    /**
     * @var int Total number of parts to upload
     */
    protected $totalParts;

    /**
     * {@inheritdoc}
     */
    protected function init()
    {
        if (!$this->source->isLocal() || $this->source->getWrapper() != 'plainfile') {
            throw new RuntimeException('The source data must be a local file stream when uploading in parallel');
        }

        if (empty($this->options['concurrency'])) {
            throw new RuntimeException('The `concurrency` option must be specified when instantiating');
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function transfer()
    {
        $this->prepareParts();
        $eventData = $this->getEventData();

        while (!$this->stopped && count($this->state) < $this->totalParts) {

            $currentTotal = count($this->state);
            $commands = array();

            for ($i = 0; $i < $this->concurrency && $i + $currentTotal < $this->totalParts; $i++) {

                // Move the offset to the correct position
                $this->parts[$i]->setOffset(($currentTotal + $i) * $this->partSize);

                // @codeCoverageIgnoreStart
                if ($this->parts[$i]->getContentLength() == 0) {
                    break;
                }
                // @codeCoverageIgnoreEnd

                $eventData['command'] = $this->client->getCommand('UploadPart', array(
                    'Bucket'     => $this->state->getBucket(),
                    'Key'        => $this->state->getKey(),
                    'PartNumber' => count($this->state) + 1 + $i,
                    'UploadId'   => $this->state->getUploadId(),
                    'Body'       => $this->parts[$i],
                    'ContentMD5' => (bool) $this->options['part_md5'],
                    Ua::OPTION   => Ua::MULTIPART_UPLOAD
                ));
                $commands[] = $eventData['command'];
                // Notify any listeners of the part upload
                $this->dispatch(self::BEFORE_PART_UPLOAD, $eventData);
            }

            // Allow listeners to stop the transfer if needed
            if ($this->stopped) {
                break;
            }

            // Execute each command, iterate over the results, and add to the transfer state
            foreach ($this->client->execute($commands) as $command) {
                $this->state->addPart(
                    count($this->state) + 1,
                    (string) $command->getResponse()->getHeader('ETag'),
                    (int) (string) $command->getRequest()->getHeader('Content-Length'),
                    gmdate(\DateTime::RFC2822)
                );
                $eventData['command'] = $command;
                // Notify any listeners the the part was uploaded
                $this->dispatch(self::AFTER_PART_UPLOAD, $eventData);
            }
        }
    }

    /**
     * Prepare the entity body handles to use while transferring
     */
    protected function prepareParts()
    {
        $this->totalParts = (int) ceil($this->source->getContentLength() / $this->partSize);
        $this->concurrency = min($this->totalParts, $this->options['concurrency']);
        $url = $this->source->getUri();
        // Use the source EntityBody as the first part
        $this->parts = array(new ReadLimitEntityBody($this->source, $this->partSize));
        // Open EntityBody handles for each part to upload in parallel
        for ($i = 1; $i < $this->concurrency; $i++) {
            $this->parts[] = new ReadLimitEntityBody(new EntityBody(fopen($url, 'r')), $this->partSize);
        }
    }
}
