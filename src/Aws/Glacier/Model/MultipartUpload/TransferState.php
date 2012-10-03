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

namespace Aws\Glacier\Model\MultipartUpload;

use Aws\Glacier\Model\MultipartUpload\UploadHelper;
use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Model\MultipartUpload\AbstractTransferState;

/**
 * State of a multipart upload
 */
class TransferState extends AbstractTransferState
{
    const ALREADY_UPLOADED = '*';

    /**
     * @var UploadHelper Glacier upload helper object that contains part information
     */
    protected $uploadHelper;

    /**
     * @param UploadHelper $uploadHelper Glacier upload helper object
     *
     * @return self
     */
    public function setUploadHelper(UploadHelper $uploadHelper)
    {
        $this->uploadHelper = $uploadHelper;

        return $this;
    }

    /**
     * @return UploadHelper Glacier upload helper object
     */
    public function getUploadHelper()
    {
        return $this->uploadHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * {@inheritdoc}
     */
    protected static function createPart($part)
    {
        $part['contentHash'] = self::ALREADY_UPLOADED;
        return UploadPart::fromArray($part);
    }
}
