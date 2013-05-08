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

namespace Aws\S3\Sync;

use Aws\Common\Exception\RuntimeException;
use Aws\S3\S3Client;
use Guzzle\Common\AbstractHasDispatcher;
use Guzzle\Iterator\ChunkedIterator;

/**
 * Uploads a local directory tree to Amazon S3
 */
class S3Sync extends AbstractHasDispatcher
{
    const BEFORE_UPLOAD_EVENT = 's3.sync.before_upload';
    const AFTER_UPLOAD_EVENT = 's3.sync.after_upload';
    const PROGRESS_EVENT = 's3.sync.progress';

    /**
     * @var S3Client Client used to transfer requests
     */
    protected $client;

    /**
     * @var string Bucket that will contain the objects
     */
    protected $bucket;

    /**
     * @var \Iterator Iterator that returns SplFileInfo objects to upload
     */
    protected $fileIterator;

    /**
     * @var int Number of files that can be transferred concurrently
     */
    protected $concurrency = 3;

    /**
     * @var FileNameObjectKeyProviderInterface
     */
    protected $keyProvider;

    /**
     * Create a new S3Sync object that recursively uploads all of the files from a directory
     *
     * @param S3Client  $client   Client used to transfer requests
     * @param string    $bucket   Bucket that will contain the objects
     * @param \Iterator $iterator Iterator used to yield {@see \SplFileInfo} objects to upload
     * @param FileNameObjectKeyProviderInterface $keyProvider Object used to convert filenames to object keys
     *
     * @return self
     */
    public function __construct(
        S3Client $client,
        $bucket,
        \Iterator $iterator,
        FilenameObjectKeyProviderInterface $keyProvider
    ) {
        $this->client = $client;
        $this->fileIterator = $iterator;
        $this->bucket = $bucket;
        $this->keyProvider = $keyProvider;
    }

    /**
     * {@inheritdoc}
     */
    public static function getAllEvents()
    {
        return array(self::BEFORE_UPLOAD_EVENT, self::AFTER_UPLOAD_EVENT, self::PROGRESS_EVENT);
    }

    /**
     * Set the number of files that can be transferred concurrently
     *
     * @param int $concurrency Number of concurrent transfers
     *
     * @return self
     */
    public function setConcurrency($concurrency)
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    /**
     * Begin uploading files to Amazon S3
     */
    public function transfer()
    {
        // Pull out chunks of uploads to upload in parallel
        $iterator = new ChunkedIterator($this->fileIterator, $this->concurrency);
        // Create the base event data object
        $event = array('sync' => $this, 'client' => $this->client);

        foreach ($iterator as $files) {
            $commands = array();
            foreach ($files as $file) {
                $command = $this->createUploadCommand($file);
                // Emit a before upload event for any listeners
                $event['command'] = $command;
                $event['file'] = $file;
                $this->dispatch(self::BEFORE_UPLOAD_EVENT, $event);
                $commands[] = $command;
            }
            // Execute the commands in parallel
            $this->client->execute($commands);
            // Notify listeners that each command finished
            unset($event['file']);
            foreach ($commands as $command) {
                $event['command'] = $command;
                $this->dispatch(self::AFTER_UPLOAD_EVENT, $event);
            }
        }
    }

    /**
     * Create an upload command based on a SplFileInfo object
     *
     * @param \SplFileInfo $file File object
     *
     * @return S3Command
     * @throws RuntimeException If the file cannot be opened
     */
    protected function createUploadCommand(\SplFileInfo $file)
    {
        // Open the file for reading
        if (!($resource = fopen($file, 'r'))) {
            throw new RuntimeException("Could not open {$file} for reading");
        }

        $command = $this->client->getCommand('PutObject', array(
            'Bucket' => $this->bucket,
            'Key'    => $this->keyProvider->generateKey($file),
            'Body'   => $resource
        ));

        return $command;
    }
}
