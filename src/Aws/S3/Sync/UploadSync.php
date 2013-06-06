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

use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Aws\Common\Exception\RuntimeException;
use Aws\Common\Model\MultipartUpload\TransferInterface;
use Aws\S3\S3Client;
use Aws\S3\Command\S3Command;
use Aws\S3\Model\MultipartUpload\AbstractTransfer;
use Guzzle\Common\AbstractHasDispatcher;
use Guzzle\Http\EntityBody;
use Guzzle\Iterator\ChunkedIterator;

/**
 * Uploads a local directory tree to Amazon S3
 */
class UploadSync extends AbstractHasDispatcher
{
    const BEFORE_TRANSFER = 's3.sync.before_transfer';
    const AFTER_TRANSFER = 's3.sync.after_transfer';

    /** @var S3Client Client used to transfer requests */
    protected $client;

    /** @var string Bucket that will contain the objects */
    protected $bucket;

    /** @var \Iterator Iterator that returns SplFileInfo objects to upload */
    protected $fileIterator;

    /** @var int Number of files that can be transferred concurrently */
    protected $concurrency = 3;

    /** @var FilenameConverterInterface */
    protected $sourceConverter;

    /**
     * @param S3Client  $client   Client used to transfer requests
     * @param string    $bucket   Bucket that will contain the objects
     * @param \Iterator $iterator Iterator used to yield {@see \SplFileInfo} objects to upload
     * @param FilenameConverterInterface $sourceConverter Used to convert filenames to Amazon S3 keys
     * @param int       $multipartUploadSize Use a multipart upload when an object size is greater than or equal to
     *                                       this value
     */
    public function __construct(
        S3Client $client,
        $bucket,
        \Iterator $iterator,
        FilenameConverterInterface $sourceConverter,
        $multipartUploadSize = AbstractTransfer::MIN_PART_SIZE
    ) {
        $this->client = $client;
        $this->fileIterator = $iterator;
        $this->bucket = $bucket;
        $this->sourceConverter = $sourceConverter;
        $this->multipartUploadSize = $multipartUploadSize;
    }

    public static function getAllEvents()
    {
        return array(self::BEFORE_TRANSFER, self::AFTER_TRANSFER);
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
     * Begin transferring files
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
                $event['command'] = $command;
                $event['file'] = $file;
                $this->dispatch(self::BEFORE_TRANSFER, $event);
                if ($command instanceof TransferInterface) {
                    // Upload using a multi-part upload if the file is too large
                    $command->upload();
                    $this->dispatch(self::AFTER_TRANSFER, $event);
                } else {
                    $commands[] = $command;
                }
            }

            if ($commands) {
                // Execute the commands in parallel
                $this->client->execute($commands);
                // Notify listeners that each command finished
                unset($event['file']);
                foreach ($commands as $command) {
                    $event['command'] = $command;
                    $this->dispatch(self::AFTER_TRANSFER, $event);
                }
            }
        }
    }

    /**
     * Create an upload command or multipart upload transfer object based on a SplFileInfo object
     *
     * @param \SplFileInfo $file File object
     *
     * @return S3Command|TransferInterface
     * @throws RuntimeException If the file cannot be opened
     */
    protected function createUploadCommand(\SplFileInfo $file)
    {
        // Open the file for reading
        if (!($resource = fopen($file, 'r'))) {
            throw new RuntimeException("Could not open {$file} for reading");
        }

        $key = $this->sourceConverter->convert($file);
        $body = EntityBody::factory($resource);

        // Use a multi-part upload if the file is larger than the cutoff size
        if ($body->getSize() >= $this->multipartUploadSize) {
            return UploadBuilder::newInstance()
                ->setBucket($this->bucket)
                ->setBucket($this->bucket)
                ->setKey($key)
                ->setMinPartSize($this->multipartUploadSize)
                ->setOption('ACL', 'private')
                ->setClient($this->client)
                ->setSource($body)
                ->build();
        }

        return $this->client->getCommand('PutObject', array(
            'Bucket' => $this->bucket,
            'Key'    => $key,
            'Body'   => $body
        ));
    }
}
