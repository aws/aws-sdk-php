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

use Aws\Common\Enum\UaString as Ua;
use Aws\Common\Exception\RuntimeException;
use Aws\Common\Model\MultipartUpload\AbstractTransfer as CommonAbstractTransfer;
use Aws\Glacier\Model\MultipartUpload\UploadPartGenerator;
use Aws\Glacier\Model\MultipartUpload\TransferState;

/**
 * Abstract class for transfer commonalities
 */
abstract class AbstractTransfer extends CommonAbstractTransfer
{
    /**
     * {@inheritdoc}
     */
    protected function calculatePartSize()
    {
        return $this->state->getPartGenerator()->getPartSize();
    }

    /**
     * {@inheritdoc}
     */
    protected function complete()
    {
        /** @var UploadPartGenerator $partGenerator */
        $partGenerator = $this->state->getPartGenerator();

        $params = array_replace($this->state->getIdParams(), array(
            'archiveSize' => $partGenerator->getArchiveSize(),
            'checksum'    => $partGenerator->getRootChecksum(),
            Ua::OPTION    => Ua::MULTIPART_UPLOAD
        ));

        return $this->client->getCommand('CompleteMultipartUpload', $params)->getResult();
    }
}
