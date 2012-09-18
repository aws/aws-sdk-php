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

use Aws\Common\Enum\Size;
use Guzzle\Http\EntityBodyInterface;

/**
 * A value object that encapsulates the data for a Glacier upload operation
 */
class GlacierUpload
{
    /**
     * @var string The sha256 tree hash of the upload body
     */
    protected $treeHash;

    /**
     * @var string The sha256 linear hash of the upload body
     */
    protected $contentHash;

    /**
     * @var int The size (or content-length) in bytes of the upload body
     */
    protected $size;

    /**
     * @var array The range (starting byte and ending byte) of the upload body
     */
    protected $range;

    /**
     * @var EntityBodyInterface The body of the upload as a Guzzle EntityBody
     */
    protected $body;

    /**
     * @param string              $treeHash    Tree hash of body
     * @param string              $contentHash Linear hash of body
     * @param int                 $size        Body size in bytes
     * @param array               $range       Starting and ending bytes
     * @param EntityBodyInterface $body        Upload body
     */
    public function __construct($treeHash, $contentHash, $size, array $range, EntityBodyInterface $body)
    {
        $this->treeHash = $treeHash;
        $this->contentHash = $contentHash;
        $this->size = $size;
        $this->range = $range;
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getTreeHash()
    {
        return $this->treeHash;
    }

    /**
     * @return string
     */
    public function getContentHash()
    {
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
        return $this->range;
    }

    /**
     * @return EntityBodyInterface
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return int The starting offset of the content range
     */
    public function getOffset()
    {
        return $this->range[0];
    }
}
