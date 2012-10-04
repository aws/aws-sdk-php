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
use Aws\Glacier\Model\MultipartUpload\TransferState;
use Aws\Glacier\Model\MultipartUpload\UploadPartGenerator;
use Guzzle\Http\ReadLimitEntityBody;
use Guzzle\Service\Command\OperationCommand;

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

    /**
     * Creates an UploadMultipartPart command from an UploadPart object
     *
     * @param UploadPart $part
     *
     * @return OperationCommand
     */
    protected function getCommandForPart(UploadPart $part)
    {
        // Setup the command with identifying parameters (accountId, vaultName, and uploadId)
        /** @var $command OperationCommand */
        $command = $this->client->getCommand('UploadMultipartPart', $this->state->getIdParams());
        $command->set(Ua::OPTION, Ua::MULTIPART_UPLOAD);

        // Add the range, checksum, and the body limited by the range
        $command->set('range', $part->getFormattedRange());
        $command->set('checksum', $part->getChecksum());
        $command->set('body', new ReadLimitEntityBody($this->source, $part->getSize(), $part->getOffset()));

        // Add the required headers including the linear hash of the body
        $command->set('command.headers', array(
            'x-amz-content-sha256' => $part->getContentHash(),
            'Content-Length'       => $part->getSize()
        ));

        return $command;
    }
}
