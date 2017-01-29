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

namespace Aws\S3;

use Aws\Common\Exception\RuntimeException;
use Aws\Common\Exception\UnexpectedValueException;
use Aws\S3\Command\S3Command;
use Guzzle\Common\AbstractHasDispatcher;
use Guzzle\Http\EntityBody;
use Guzzle\Http\ReadLimitEntityBody;

/**
 * Allows you to resume the download of a partially downloaded object.
 *
 * Downloads objects from Amazon S3 in using "Range" downloads. This allows a partially downloaded object to be resumed
 * so that only the remaining portion of the object is downloaded.
 */
class ResumableDownload extends AbstractHasDispatcher
{
    const BEFORE_SEND = 's3.resumable_download.before_send';
    const AFTER_SEND = 's3.resumable_download.after_send';

    /**
     * @var S3Client The S3 client to use to download objects and issue HEAD requests
     */
    protected $client;

    /**
     * @var \Guzzle\Service\Model The Model object returned when the initial HeadObject operation was called
     */
    protected $meta;

    /**
     * @var array Array of parameters to pass to a GetObject operation
     */
    protected $params;

    /**
     * @var int Size of each Range download chunk
     */
    protected $chunkSize;

    /**
     * @var \Guzzle\Http\EntityBody Where the object will be downloaded
     */
    protected $target;

    /**
     * @param S3Client                            $client  Client to use when executing requests
     * @param string                              $bucket  Bucket that holds the object
     * @param string                              $key     Key of the object
     * @param string|resource|EntityBodyInterface $target  Where the object should be downloaded to. Pass a string to
     *                                                     save the object to a file, pass a resource returned by
     *                                                     fopen() to save the object to a stream resource, or pass a
     *                                                     Guzzle EntityBody object to save the contents to an
     *                                                     EntityBody.
     * @param array                               $options Associative array of options:
     *                                                     - chunk_size: The size of each chunk to download. Defaults
     *                                                                   to PHP's max integer size
     *                                                     - params:     Any additional GetObject or HeadObject
     *                                                                   parameters to use with each command issued by
     *                                                                   the client. (e.g. pass "Version" to download a
     *                                                                   specific version of an object)
     * @throws RuntimeException if the target variable points to a file that cannot be opened
     */
    public function __construct(S3Client $client, $bucket, $key, $target, array $options = array())
    {
        $this->chunkSize = isset($options['chunk_size']) ? $options['chunk_size'] : PHP_INT_MAX;
        $this->params = isset($options['params']) ? $options['params'] : array();
        $this->client = $client;
        $this->params['Bucket'] = $bucket;
        $this->params['Key'] = $key;

        // If a string is passed, then assume that the download should stream to a file on disk
        if (is_string($target)) {
            if (!($target = fopen($target, 'a+'))) {
                throw new RuntimeException("Unable to open {$target} for writing");
            }
            // Always append to the file
            fseek($target, 0, SEEK_END);
        }

        // Get the metadata and Content-MD5 of the object
        $this->target = EntityBody::factory($target);
        $command = $this->client->getCommand('HeadObject', $this->params);
        $this->meta = $command->execute();
        $this->meta['ContentMD5'] = (string) $command->getResponse()->getHeader('Content-MD5');

        // Use a ReadLimitEntityBody so that rewinding the stream after an error does not cause the file pointer
        // to enter an inconsistent state with the data being downloaded
        $this->params['SaveAs'] = new ReadLimitEntityBody(
            $this->target,
            $this->meta['ContentLength'],
            $this->target->ftell()
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getAllEvents()
    {
        return array(self::BEFORE_SEND, self::AFTER_SEND);
    }

    /**
     * Returns true if there is more data to download
     *
     * @return bool
     */
    public function hasMore()
    {
        return $this->target->ftell() < $this->meta['ContentLength'];
    }

    /**
     * Download the remainder of the object from Amazon S3
     *
     * Performs a message integrity check if possible
     */
    public function download()
    {
        while ($this->downloadNext());
        $this->checkIntegrity();
    }

    /**
     * Get the operation command that will next be executed
     *
     * @return S3Command|bool
     */
    public function getNextCommand()
    {
        if (!$this->hasMore()) {
            return false;
        }

        $current = $this->target->ftell();
        $targetByte = min($this->meta['ContentLength'], $current + $this->chunkSize) - 1;
        $this->params['Range'] = "bytes={$current}-{$targetByte}";

        // Don't do a Range request if the range is the full request
        if ($current == 0 && $targetByte == ($this->meta['ContentLength'] - 1)) {
            unset($this->params['Range']);
        }

        // Set the starting offset so that the body is never seeked to before this point in the event of a retry
        $this->params['SaveAs']->setOffset($current);

        $command = $this->client->getCommand('GetObject', $this->params);

        $event = array(
            'target'     => $this->target,
            'total'      => $this->meta['ContentLength'],
            'start_byte' => $current,
            'end_byte'   => $targetByte,
            'command'    => $command,
            'chunk_size' => $this->chunkSize,
            'metadata'   => $this->meta
        );

        $that = $this;
        $clientDispatcher = $this->client->getEventDispatcher();

        // Add a listener to ensure that the before event is dispatched only once
        $clientDispatcher->addListener(
            'command.before_send',
            $before = function ($e) use ($command, $event, $that, &$before, $clientDispatcher) {
                if ($e['command'] === $command) {
                    $clientDispatcher->removeListener('command.before_send', $before);
                    $that->dispatch(ResumableDownload::BEFORE_SEND, $event);
                }
            }
        );

        // Add a listener to ensure that the after event is dispatched only once
        $clientDispatcher->addListener(
            'command.after_send',
            $after = function ($e) use ($command, $event, $that, &$after, $clientDispatcher) {
                if ($e['command'] === $command) {
                    $clientDispatcher->removeListener('command.after_send', $after);
                    $that->dispatch(ResumableDownload::AFTER_SEND, $event);
                }
            }
        );

        return $command;
    }

    /**
     * Downloads the next chunk of the object
     *
     * @return bool Returns false if the download has completed or true if a download completed
     */
    protected function downloadNext()
    {
        if (!($command = $this->getNextCommand())) {
            return false;
        }

        $command->execute();

        return true;
    }

    /**
     * Performs an MD5 message integrity check if possible
     *
     * @throws UnexpectedValueException if the message does not validate
     */
    protected function checkIntegrity()
    {
        if ($this->target->isReadable() && $expected = $this->meta['ContentMD5']) {
            $actual = $this->target->getContentMd5();
            if ($actual != $expected) {
                throw new UnexpectedValueException("Message integrity check failed. Expected {$expected} but got {$actual}.");
            }
        }
    }
}
