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

use Aws\Common\Enum\UaString as Ua;
use Aws\Common\Exception\RuntimeException;
use Aws\Common\Model\MultipartUpload\AbstractTransfer as CommonAbstractTransfer;

/**
 * Abstract class for transfer commonalities
 */
abstract class AbstractTransfer extends CommonAbstractTransfer
{
    const MIN_PART_SIZE = 5242880; // 5MB
    const MAX_PART_SIZE = 5368709120; // 5GB
    const MAX_PARTS = 10000;

    /**
     * {@inheritdoc}
     * @throws RuntimeException if the part size can not be calculated from the provided data
     */
    protected function init()
    {
        // Merge provided options onto the default option values
        $this->options = array_replace(array(
            'min_part_size' => self::MIN_PART_SIZE,
            'part_md5'      => true
        ), $this->options);

        // Make sure the part size can be calculated somehow
        if (!$this->options['min_part_size'] && !$this->source->getContentLength()) {
            throw new RuntimeException('The ContentLength of the data source could not be determined, and no '
                . 'min_part_size option was provided');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function doAbort()
    {
        $params = $this->state->getIdParams();
        $params[Ua::OPTION] = Ua::MULTIPART_UPLOAD;

        return $this->client->getCommand('AbortMultipartUpload', $params)->getResult();
    }

    /**
     * {@inheritdoc}
     */
    protected function calculatePartSize()
    {
        $this->partSize = $this->source->getContentLength()
            ? (int) ceil(($this->source->getContentLength() / self::MAX_PARTS))
            : self::MIN_PART_SIZE;
        $this->partSize = max($this->options['min_part_size'], $this->partSize);
        $this->partSize = min($this->partSize, self::MAX_PART_SIZE);
        $this->partSize = max($this->partSize, self::MIN_PART_SIZE);
    }

    /**
     * {@inheritdoc}
     */
    protected function complete()
    {
        $params = $this->state->getIdParams();
        $params[Ua::OPTION] = Ua::MULTIPART_UPLOAD;

        /** @var $command \Aws\S3\Command\CompleteMultipartUpload */
        $command = $this->client->getCommand('CompleteMultipartUpload', $params);

        foreach ($this->state as $part) {
            $command->addPart($part['PartNumber'], $part['ETag']);
        }

        return $command->execute();
    }
}
