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

use Aws\S3\Exception\NoSuchKeyException;
use Aws\S3\S3Client;

/**
 * Iterator used to filter an internal iterator to only yield files that do not exist in Amazon S3 or have been
 * updated since they were uploaded
 */
class ChangedFilesIterator extends \FilterIterator
{
    /**
     * @var S3Client
     */
    protected $client;

    /**
     * @var string Bucket that contains objects to check against
     */
    protected $bucket;

    /**
     * @var FilenameObjectKeyProviderInterface Object used to convert filenames to object keys
     */
    protected $keyProvider;

    /**
     * @param \Iterator                          $iterator    Iterator to wrap and filter
     * @param S3Client                           $client      Client used to send requests
     * @param string                             $bucket      Amazon S3 bucket
     * @param FilenameObjectKeyProviderInterface $keyProvider Key provider that converts filenames to object keys
     */
    public function __construct(
        \Iterator $iterator,
        S3Client $client,
        $bucket,
        FilenameObjectKeyProviderInterface $keyProvider
    ) {
        parent::__construct($iterator);
        $this->client = $client;
        $this->bucket = $bucket;
        $this->keyProvider = $keyProvider;
        $this->rewind();
    }

    /**
     * {@inheritdoc}
     */
    public function accept()
    {
        try {
            $current = $this->current();
            $result = $this->client->headObject(array(
                'Bucket' => $this->bucket,
                'Key'    => $this->keyProvider->generateKey((string) $current)
            ));

            // Ensure the Content-Length matches and it hasn't been modified since the mtime
            return $current->getSize() != $result['ContentLength'] ||
                $current->getMTime() > strtotime($result['LastModified']);
        } catch (NoSuchKeyException $e) {
            return true;
        }
    }
}
