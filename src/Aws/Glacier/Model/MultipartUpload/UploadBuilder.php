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

use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Enum\Size;
use Aws\Common\Enum\UaString as Ua;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Model\MultipartUpload\AbstractUploadBuilder;
use Aws\Glacier\Model\MultipartUpload\UploadPartGenerator;
use Guzzle\Http\EntityBody;

/**
 * Easily create a multipart uploader used to quickly and reliably upload a
 * large file or data stream to Amazon S3 using multipart uploads
 */
class UploadBuilder extends AbstractUploadBuilder
{
    /**
     * @var string Account ID to upload to
     */
    protected $accountId = '-';

    /**
     * @var string Name of the vault to upload to
     */
    protected $vaultName;

    /**
     * @var int Concurrency level to transfer the parts
     */
    protected $concurrency = 1;

    /**
     * @var int Size of upload parts
     */
    protected $partSize;

    /**
     * @var UploadPartGenerator Glacier upload helper object
     */
    protected $partGenerator;

    /**
     * Set the account ID to upload the part to
     *
     * @param string $accountId ID of the account
     *
     * @return self
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * Set the vault name to upload the part to
      *
      * @param string $vaultName Name of the vault
      *
      * @return self
     */
    public function setVaultName($vaultName)
    {
        $this->vaultName = $vaultName;

        return $this;
    }

    /**
     * Set the upload part size
     *
     * @param int $partSize Upload part size
     *
     * @return self
     */
    public function setPartSize($partSize)
    {
        $this->partSize = (int) $partSize;

        return $this;
    }

    /**
     * Set the concurrency level to use when uploading parts. This affects how many parts are uploaded in parallel. You
     * must use a local file as your data source when using a concurrency greater than 1
     *
     * @param int $concurrency Concurrency level
     *
     * @return self
     */
    public function setConcurrency($concurrency)
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    /**
     * Sets the Glacier upload helper object that pre-calculates hashes and sizes for all upload parts
     *
     * @param UploadPartGenerator $partGenerator Glacier upload helper object
     *
     * @return self
     */
    public function setPartGenerator(UploadPartGenerator $partGenerator)
    {
        $this->partGenerator = $partGenerator;

        return $this;
    }

    /**
     * {@inheritdoc}
     * @throws InvalidArgumentException when attempting to resume a transfer using a non-seekable stream
     * @throws InvalidArgumentException when missing required properties (bucket, key, client, source)
     */
    public function build()
    {
        // If a Glacier upload helper object was set, use the source and part size from it
        if ($this->partGenerator) {
            $this->partSize = $this->partGenerator->getPartSize();
            $this->source = $this->partGenerator->getBody();
        }

        if (!$this->vaultName || !$this->client || !$this->source) {
            throw new InvalidArgumentException('You must specify a vault name, client, and source.');
        }

        if ($this->state && !$this->source->isSeekable()) {
            throw new InvalidArgumentException('You cannot resume a transfer using a non-seekable stream');
        }

        // If no state was set, then create one by initiating or loading a multipart upload
        if (is_string($this->state)) {
            /** @var $state \Aws\Glacier\Model\MultipartUpload\TransferState */
            $state = TransferState::fromUploadId($this->client, array(
                'accountId' => $this->accountId,
                'vaultName' => $this->vaultName,
                'uploadId'  => $this->state
            ));
            $state->setPartGenerator($this->partGenerator);
            $this->state = $state;
        } elseif (!$this->state) {
            $this->state = $this->initiateMultipartUpload();
        }

        $options = array(
            'concurrency' => $this->concurrency
        );

        return $this->concurrency > 1
            ? new ParallelTransfer($this->client, $this->state, $this->source, $options)
            : new SerialTransfer($this->client, $this->state, $this->source, $options);
    }

    /**
     * {@inheritdoc}
     */
    protected function initiateMultipartUpload()
    {
        $params = array(
            'accountId' => $this->accountId,
            'vaultName' => $this->vaultName
        );

        $partGenerator = $this->partGenerator ?: UploadPartGenerator::factory($this->source, $this->partSize);
        $uploadId = $this->client->getCommand('InitiateMultipartUpload', array_replace($params, array(
            'command.headers' => $this->headers,
            'partSize'        => $partGenerator->getPartSize(),
            Ua::OPTION        => Ua::MULTIPART_UPLOAD
        )))->getResult()->get('uploadId');

        // Create a new state based on the initiated upload
        $params['uploadId'] = $uploadId;
        $state = new TransferState($params);
        $state->setPartGenerator($partGenerator);
        return $state;
    }
}
