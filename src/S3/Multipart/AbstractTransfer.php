<?php
namespace Aws\S3\Multipart;

use Aws\Common\Multipart\AbstractTransfer as CommonAbstractTransfer;
use Aws\AwsCommandInterface;

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
     * @throws \RuntimeException if the part size can not be calculated from the provided data
     */
    protected function init()
    {
        // Merge provided options onto the default option values
        $this->options = array_replace([
            'part_size' => self::MIN_PART_SIZE,
            'part_md5'  => true
        ], $this->options);

        // Make sure the part size can be calculated somehow
        if (!$this->options['part_size'] && !$this->source->getSize()) {
            throw new \RuntimeException('The ContentLength of the data source could not be determined, and no '
                . 'part_size option was provided');
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function calculatePartSize()
    {
        $partSize = $this->source->getSize()
            ? (int) ceil(($this->source->getSize() / self::MAX_PARTS))
            : self::MIN_PART_SIZE;
        $partSize = max($this->options['part_size'], $partSize);
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
        $parts = [];
        foreach ($this->state as $index => $part) {
            $parts[$index] = [
                'PartNumber' => $part->getPartNumber(),
                'ETag'       => $part->getETag(),
            ];
        }
        ksort($parts);

        $params = $this->state->getUploadId()->toParams();
        $params['MultipartUpload'] = ['Parts' => $parts];
        $command = $this->client->getCommand('CompleteMultipartUpload', $params);

        return $this->client->execute($command);
    }

    protected function getAbortCommand()
    {
        $params = $this->state->getUploadId()->toParams();

        /** @var $command AwsCommandInterface */
        $command = $this->client->getCommand('AbortMultipartUpload', $params);

        return $command;
    }
}
