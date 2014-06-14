<?php
namespace Aws\S3\Multipart;

use Aws\Common\Enum\UaString as Ua;
use Aws\Common\Exception\RuntimeException;
use Aws\Common\MultipartUpload\AbstractTransfer as CommonAbstractTransfer;
use Guzzle\Service\Command\OperationCommand;

/**
 * Abstract class for transfer commonalities
 */
abstract class AbstractTransfer extends CommonAbstractTransfer
{
    // An S3 upload part can be anywhere from 5 MB to 5 GB, but you can only have 10000 parts per upload
    const MIN_PART_SIZE = 5242880;
    const MAX_PART_SIZE = 5368709120;
    const MAX_PARTS     = 10000;

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
    protected function calculatePartSize()
    {
        $partSize = $this->source->getContentLength()
            ? (int) ceil(($this->source->getContentLength() / self::MAX_PARTS))
            : self::MIN_PART_SIZE;
        $partSize = max($this->options['min_part_size'], $partSize);
        $partSize = min($partSize, self::MAX_PART_SIZE);
        $partSize = max($partSize, self::MIN_PART_SIZE);

        return $partSize;
    }

    /**
     * {@inheritdoc}
     */
    protected function complete()
    {
        /** @var $part UploadPart  */
        $parts = array();
        foreach ($this->state as $part) {
            $parts[] = array(
                'PartNumber' => $part->getPartNumber(),
                'ETag'       => $part->getETag(),
            );
        }

        $params = $this->state->getUploadId()->toParams();
        $params[Ua::OPTION] = Ua::MULTIPART_UPLOAD;
        $params['Parts'] = $parts;
        $command = $this->client->getCommand('CompleteMultipartUpload', $params);

        return $command->getResult();
    }

    /**
     * {@inheritdoc}
     */
    protected function getAbortCommand()
    {
        $params = $this->state->getUploadId()->toParams();
        $params[Ua::OPTION] = Ua::MULTIPART_UPLOAD;

        /** @var $command OperationCommand */
        $command = $this->client->getCommand('AbortMultipartUpload', $params);

        return $command;
    }
}
