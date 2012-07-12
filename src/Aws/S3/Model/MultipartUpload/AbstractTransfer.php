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

use Aws\Common\Exception\RuntimeException;
use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Enum\UaString as Ua;
use Aws\S3\Exception\MultipartUploadException;
use Guzzle\Common\AbstractHasDispatcher;
use Guzzle\Http\EntityBody;

/**
 * Abstract class for transfer commonalities
 */
abstract class AbstractTransfer extends AbstractHasDispatcher implements TransferInterface
{
    /**
     * @var AwsClientInterface Client used for the transfers
     */
    protected $client;

    /**
     * @var TransferState State of the transfer
     */
    protected $state;

    /**
     * @var EntityBody Data source of the transfer
     */
    protected $source;

    /**
     * @var array Associative array of options
     */
    protected $options;

    /**
     * @var int Size of each part to upload
     */
    protected $partSize;

    /**
     * @var bool Whether or not the transfer has been stopped
     */
    protected $stopped = false;

    /**
     * Construct a new transfer object
     *
     * @param AwsClientInterface $client  Client used for the transfers
     * @param TransferState      $state   Used to transfer
     * @param EntityBody         $source  Data source of the transfer
     * @param array              $options Array of options to apply
     *
     * @throws RuntimeException if Content-Length cannot be determined and no min_part_size was provided in the options
     */
    public function __construct(
        AwsClientInterface $client,
        TransferState $state,
        EntityBody $source,
        array $options = array()
    ) {
        $this->client = $client;
        $this->state = $state;
        $this->source = $source;

        // Merge in place holders for the default option values
        $this->options = array_merge(array(
            'min_part_size' => TransferInterface::MIN_PART_SIZE,
            'part_md5'      => true
        ), $options);

        if (!$this->options['min_part_size'] && !$this->source->getContentLength()) {
            throw new RuntimeException('The ContentLength of the data source could not be determined, and no '
                . 'min_part_size option was provided');
        }

        $this->calculatePartSize();
        $this->init();
    }

    /**
     * {@inheritdoc}
     */
    public static function getAllEvents()
    {
        return array(
            self::BEFORE_PART_UPLOAD,
            self::AFTER_UPLOAD,
            self::AFTER_COMPLETE,
            self::BEFORE_PART_UPLOAD,
            self::AFTER_PART_UPLOAD
        );
    }

    /**
     * {@inheritdoc}
     */
    public function abort()
    {
        $this->client->getCommand('AbortMultipartUpload', array(
            'bucket'   => $this->state->getBucket(),
            'key'      => $this->state->getKey(),
            'UploadId' => $this->state->getUploadId(),
            Ua::OPTION => Ua::MULTIPART_UPLOAD
        ))->execute();
        $this->state->setAborted(true);
    }

    /**
     * {@inheritdoc}
     */
    public function stop()
    {
        $this->stopped = true;

        return $this->state;
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get the array of options associated with the transfer
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     * @throws MultipartUploadException when an error is encountered. Use getLastException() to get more information.
     * @throws RuntimeException when attempting to upload an aborted transfer
     */
    public function upload()
    {
        if ($this->state->isAborted()) {
            throw new RuntimeException('The transfer has been aborted and cannot be uploaded');
        }

        $this->stopped = false;
        $eventData = $this->getEventData();
        $this->dispatch(self::BEFORE_UPLOAD, $eventData);

        try {
            $this->transfer();
            $this->dispatch(self::AFTER_UPLOAD, $eventData);
            $result = $this->completeUpload();
            $this->dispatch(self::AFTER_COMPLETE, $eventData);
        } catch (\Exception $e) {
            throw new MultipartUploadException($this->state, $e);
        }

        return $result;
    }

    /**
     * Determine the upload part size based on the size of the source data and
     * taking into account the acceptable minimum and maximum part sizes.
     */
    protected function calculatePartSize()
    {
        $this->partSize = $this->source->getContentLength()
            ? (int) ceil(($this->source->getContentLength() / TransferInterface::MAX_PARTS))
            : TransferInterface::MIN_PART_SIZE;
        $this->partSize = max($this->options['min_part_size'], $this->partSize);
        $this->partSize = min($this->partSize, TransferInterface::MAX_PART_SIZE);
        $this->partSize = max($this->partSize, TransferInterface::MIN_PART_SIZE);
    }

    /**
     * Complete the multipart upload
     */
    protected function completeUpload()
    {
        $command = $this->client->getCommand('CompleteMultipartUpload', array(
            'bucket'   => $this->state->getBucket(),
            'key'      => $this->state->getKey(),
            'UploadId' => $this->state->getUploadId(),
            Ua::OPTION => Ua::MULTIPART_UPLOAD
        ));

        foreach ($this->state as $part) {
            $command->addPart($part['PartNumber'], $part['ETag']);
        }

        return $command->execute();
    }

    /**
     * Get an array used for event notifications
     *
     * @return array
     * @codeCoverageIgnore
     */
    protected function getEventData()
    {
        return array(
            'transfer'  => $this,
            'source'    => $this->source,
            'options'   => $this->options,
            'client'    => $this->client,
            'part_size' => $this->partSize,
            'state'     => $this->state
        );
    }

    /**
     * Hook to initialize the transfer
     */
    protected function init() {}

    /**
     * Hook to implement in subclasses to perform the actual transfer
     */
    abstract protected function transfer();
}
