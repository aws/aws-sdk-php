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

namespace Aws\Glacier\Model;

use Aws\Common\ChunkHash;
use Aws\Common\Exception\LogicException;

/**
 * An object that encapsulates the data for a Glacier upload operation
 */
class UploadContext implements \Serializable
{
    /**
     * @var TreeHash Tree hash context of the data
     */
    protected $treeHash;

    /**
     * @var ChunkHash Chunk hash context of the data
     */
    protected $chunkHash;

    /**
     * @var string The sha256 tree hash of the upload body
     */
    protected $checksum;

    /**
     * @var string The sha256 linear hash of the upload body
     */
    protected $contentHash;

    /**
     * @var int The size (or content-length) in bytes of the upload body
     */
    protected $size;

    /**
     * @var int The starting offset byte of the upload body
     */
    protected $offset;

    /**
     * @var int The maximum size of the upload in bytes
     */
    protected $maxSize;

    /**
     * @var bool Whether or not the UploadContext has been finalized
     */
    protected $isFinalized = false;

    /**
     * @param int $maxSize Maximum allowed size of this upload context
     * @param int $offset  The starting offset byte of the upload body
     */
    public function __construct($maxSize, $offset = 0)
    {
        $this->maxSize = $maxSize;
        $this->offset  = $offset;
        $this->size    = 0;

        $this->treeHash  = new TreeHash();
        $this->chunkHash = new ChunkHash();
    }

    /**
     * @return string
     * @throws LogicException when the context is not finalized
     */
    public function getChecksum()
    {
        if (!$this->isFinalized) {
            throw new LogicException('The UploadContext must be finalized before you can get the checksum.');
        }

        return $this->checksum;
    }

    /**
     * @return string
     * @throws LogicException when the context is not finalized
     */
    public function getContentHash()
    {
        if (!$this->isFinalized) {
            throw new LogicException('The UploadContext must be finalized before you can get the content hash.');
        }

        return $this->contentHash;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return array
     */
    public function getRange()
    {
        return array($this->offset, $this->offset + $this->size - 1);
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Adds data to the context. This adds data to both the tree and chunk hashes and increases the size
     *
     * @param string $data Data to add to the context
     *
     * @return self
     * @throws LogicException when the context is already finalized
     */
    public function addData($data)
    {
        $size = strlen($data);

        if ($this->isFinalized) {
            throw new LogicException('You cannot add data to a finalized UploadContext.');
        } elseif ($this->size + $size > $this->maxSize) {
            throw new LogicException('You cannot add data that will exceed the maximum size of this upload.');
        } else {
            $this->treeHash->addData($data);
            $this->chunkHash->addData($data);
            $this->size += strlen($data);
        }

        return $this;
    }

    /**
     * Finalizes the context by calculating the final hashes and ensuring no more data can be added
     *
     * @return self
     */
    public function finalize()
    {
        $this->checksum    = $this->treeHash->getHash();
        $this->contentHash = $this->chunkHash->getHash();
        $this->isFinalized = true;

        return $this;
    }

    /**
     * Checks if the size of the context is the same as the maximum size
     *
     * @return bool
     */
    public function isFull()
    {
        return $this->size === $this->maxSize;
    }

    /**
     * Checks if the size of the context is 0
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->size === 0;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        if (!$this->isFinalized) {
            throw new LogicException('The UploadContext must be finalized before you serialize it.');
        }

        return serialize(array(
            'checksum'    => $this->checksum,
            'contentHash' => $this->contentHash,
            'size'        => $this->size,
            'offset'      => $this->offset,
            'maxSize'     => $this->maxSize
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        $this->treeHash    = null;
        $this->chunkHash   = null;
        $this->checksum    = $data['checksum'];
        $this->contentHash = $data['contentHash'];
        $this->size        = $data['size'];
        $this->offset      = $data['offset'];
        $this->maxSize     = $data['maxSize'];
        $this->isFinalized = true;
    }
}
