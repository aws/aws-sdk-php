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
     * @var array Previously loaded list object data
     */
    protected $listedObjects = array();

    /**
     * @var \Iterator
     */
    protected $bucketIterator;

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

    public function accept()
    {
        $current = $this->current();
        $key = $this->keyProvider->generateKey((string) $current);
        if (!($data = $this->getS3Data($key))) {
            return true;
        }
        unset($this->listedObjects[$key]);
        // Ensure the Content-Length matches and it hasn't been modified since the mtime
        return $current->getSize() != $data['s'] || $current->getMTime() > strtotime($data['l']);
    }

    /**
     * @return \Iterator
     */
    protected function getBucketIterator()
    {
        if (!$this->bucketIterator) {
            $this->bucketIterator = $this->client->getIterator('ListObjects', array(
                'Bucket' => $this->bucket,
                'Prefix' => $this->keyProvider->getPrefix()
            ));
            $this->bucketIterator->rewind();
        }

        return $this->bucketIterator;
    }

    /**
     * Get key information from Amazon S3 either from cache or from a ListObjects iterator
     *
     * @param $key Amazon S3 key
     *
     * @return array|bool Returns an array of key data, or false if the key is not in S3
     */
    protected function getS3Data($key)
    {
        if (isset($this->listedObjects[$key])) {
            return $this->listedObjects[$key];
        }

        $it = $this->getBucketIterator();

        while ($it->valid()) {
            $value = $it->current();
            $data = array('l' => $value['LastModified'], 's' => (int) $value['Size']);
            if ($value['Key'] == $key) {
                return $data;
            } else {
                $this->listedObjects[$value['Key']] = $data;
            }
            $it->next();
        }

        return false;
    }
}
