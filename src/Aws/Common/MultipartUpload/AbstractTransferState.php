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

namespace Aws\Common\MultipartUpload;

use Aws\Common\Client\AwsClientInterface;

/**
 * State of a multipart upload
 */
abstract class AbstractTransferState implements TransferStateInterface
{
    /**
     * @var array Array of params used in a command to identity the upload part
     */
    protected $idParams;

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
     * @param array $params An array of identifier params
     */
    public function __construct(array $params)
    {
        $this->idParams = $params;
    }

    /**
     * {@inheritdoc}
     */
    public function getIdParams()
    {
        return $this->idParams;
    }

    /**
     * {@inheritdoc}
     */
    public function getPart($partNumber)
    {
        return isset($this->parts[$partNumber]) ? $this->parts[$partNumber] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function addPart(UploadPartInterface $part)
    {
        $partNumber = $part->getPartNumber();
        $this->parts[$partNumber] = $part;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasPart($partNumber)
    {
        return isset($this->parts[$partNumber]);
    }

    /**
     * {@inheritdoc}
     */
    public function getPartNumbers()
    {
        return array_keys($this->parts);
    }

    /**
     * {@inheritdoc}
     */
    public function setAborted($aborted)
    {
        $this->aborted = (bool) $aborted;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isAborted()
    {
        return $this->aborted;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->parts);
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parts);
    }
}
