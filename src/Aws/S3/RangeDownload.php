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
use Guzzle\Common\AbstractHasDispatcher;
use Guzzle\Http\EntityBody;
use Guzzle\Http\ReadLimitEntityBody;

/**
 * Downloads a large file from Amazon S3 in chunks using ranged downloads. This is useful for resuming partial
 * downloads or downloading files over 2GB on 32-bit systems.
 */
class RangeDownload extends AbstractHasDispatcher
{
    const BEFORE_SEND = 's3.range_download.before_send';
    const AFTER_SEND = 's3.range_download.after_send';
    protected $client;
    protected $meta;
    protected $params;
    protected $chunkSize;
    protected $target;

    /**
     * @param S3Client                            $client  Client to use when executing requests
     * @param string                              $bucket  Bucket that holds the object
     * @param string                              $key     Key of the object
     * @param string|resource|EntityBodyInterface $target  Where the object should be downloaded to. Pass a string to
     *                                                     save the object to a file.
     * @param array                               $options Associative array of options:
     *                                                     - chunk_size: The size of each chunk to download. Defaults
     *                                                                   to PHP's max integer size
     *                                                     - params:     Any additional GetObject parameters to use with
     *                                                                   each range GET request (e.g. Version to
     *                                                                   download a specific version of an object)
     * @throws RuntimeException if the target variable points to a file that cannot be opened
     */
    public function __construct(S3Client $client, $bucket, $key, $target, array $options = array())
    {
        $this->chunkSize = isset($options['chunk_size']) ? $options['chunk_size'] : PHP_INT_MAX;
        $this->params = isset($options['params']) ? $options['params'] : array();
        $this->client = $client;
        $this->params['Bucket'] = $bucket;
        $this->params['Key'] = $key;

        if (is_string($target)) {
            if (!($target = fopen($target, 'a+'))) {
                throw new RuntimeException("Unable to open {$target} for writing");
            }
            fseek($target, 0, SEEK_END);
        }

        $this->target = EntityBody::factory($target);
        $this->meta = $client->headObject($this->params);

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
     * Downloads the next chunk of the object
     *
     * @return bool Returns false if the download has completed or true if a download completed
     */
    public function downloadNext()
    {
        if (!$this->hasMore()) {
            return false;
        }

        $current = $this->target->ftell();
        $targetByte = min($this->meta['ContentLength'], $current + $this->chunkSize);
        $this->params['Range'] = "bytes={$current}-{$targetByte}";
        $this->params['SaveAs']->setOffset($current);
        $command = $this->client->getCommand('GetObject', $this->params);
        $event = array(
            'target'  => $this->target,
            'total'   => $this->meta['ContentLength'],
            'start'   => $current,
            'end'     => $targetByte,
            'command' => $command
        );

        $this->dispatch(self::BEFORE_SEND, $event);
        $command->execute();
        $this->dispatch(self::AFTER_SEND, $event);

        return true;
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
     * Performs an MD5 message integrity check if possible
     *
     * @throws \Aws\Common\Exception\RuntimeException
     */
    public function checkIntegrity()
    {
        if ($this->target->isReadable() && $expected = $this->meta['ContentMD5']) {
            $actual = $this->target->getContentMd5();
            if ($actual != $expected) {
                throw new RuntimeException("Message integrity check failed. Expected {$expected} but got {$actual}.");
            }
        }
    }
}
