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

use Aws\Common\Client\AwsClientInterface;

/**
 * State of a multipart upload
 */
class TransferState implements \Countable, \IteratorAggregate
{
    /**
     * @var string Bucket to upload to
     */
    protected $bucket;

    /**
     * @var string Key of the object
     */
    protected $key;

    /**
     * @var string Upload ID of the initiated multipart upload
     */
    protected $uploadId;

    /**
     * @var array Array of parts where the part number is the index and the ETag is the value
     */
    protected $parts = array();

    /**
     * @var bool Whether or not the transfer was aborted
     */
    protected $aborted = false;

    /**
     * Construct a new transfer state object
     *
     * @param string $bucket   Bucket used to store the completed upload
     * @param string $key      Key of the object to upload
     * @param string $uploadId Upload ID of the initiated multipart upload
     */
    public function __construct($bucket, $key, $uploadId)
    {
        $this->bucket = $bucket;
        $this->key = $key;
        $this->uploadId = $uploadId;
    }

    /**
     * Create the transfer state from a ListParts response
     *
     * @param AwsClientInterface $client Client used to send the request
     * @param string             $bucket Bucket of the upload
     * @param string             $key    Key of the object
     * @param string             $id     Upload ID to resume from
     *
     * @return self
     */
    public static function fromUploadId(AwsClientInterface $client, $bucket, $key, $id)
    {
        $transferState = new self($bucket, $key, $id);
        $iterator = $client->getIterator('ListParts', array(
            'bucket'   => $bucket,
            'key'      => $key,
            'UploadId' => $id
        ));

        foreach ($iterator as $part) {
            $transferState->addPart($part['PartNumber'], $part['ETag'], $part['Size'], $part['LastModified']);
        }

        return $transferState;
    }

    /**
     * Get the bucket of the upload
     *
     * @return string
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * Get the key of the upload
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get the upload ID of the transfer
     *
     * @return string
     */
    public function getUploadId()
    {
        return $this->uploadId;
    }

    /**
     * Get the part information of a specific part
     *
     * @param int $partNumber Part to retrieve
     *
     * @return array|null
     */
    public function getPart($partNumber)
    {
        return isset($this->parts[$partNumber]) ? $this->parts[$partNumber] : null;
    }

    /**
     * Add a part to the transfer state
     *
     * @param int    $number       Part number
     * @param string $etag         ETag of the part
     * @param int    $size         Size of the part
     * @param string $lastModified Date the part was lost modified
     *
     * @return self
     */
    public function addPart($number, $etag, $size, $lastModified)
    {
        $this->parts[$number] = array(
            'ETag'         => $etag,
            'PartNumber'   => $number,
            'Size'         => $size,
            'LastModified' => $lastModified
        );

        return $this;
    }

    /**
     * Check if a specific part has been uploaded
     *
     * @param int $partNumber Part to check
     *
     * @return bool
     */
    public function hasPart($partNumber)
    {
        return isset($this->parts[$partNumber]);
    }

    /**
     * Get a list of all of the uploaded part numbers
     *
     * @return array
     */
    public function getPartNumbers()
    {
        return array_keys($this->parts);
    }

    /**
     * Set whether or not the transfer has been aborted
     *
     * @param bool $aborted Set to true to mark the transfer as aborted
     *
     * @return self
     */
    public function setAborted($aborted)
    {
        $this->aborted = $aborted;

        return $this;
    }

    /**
     * Check if the transfer has been marked as aborted
     *
     * @return bool
     */
    public function isAborted()
    {
        return $this->aborted;
    }

    /**
     * Get the number of parts
     *
     * @return int
     */
    public function count()
    {
        return count($this->parts);
    }

    /**
     * Get the iterator
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parts);
    }
}
