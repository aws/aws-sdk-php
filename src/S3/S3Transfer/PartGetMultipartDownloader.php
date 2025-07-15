<?php

namespace Aws\S3\S3Transfer;

use Aws\CommandInterface;
use Aws\Result;
use Aws\ResultInterface;

/**
 * Multipart downloader using the part get approach.
 */
class PartGetMultipartDownloader extends MultipartDownloader
{

    /**
     * @inheritDoc
     *
     * @return CommandInterface
     */
    protected function nextCommand(): CommandInterface
    {
        if ($this->currentPartNo === 0) {
            $this->currentPartNo = 1;
        } else {
            $this->currentPartNo++;
        }

        $nextRequestArgs = $this->getObjectRequest->toArray();
        $nextRequestArgs['PartNumber'] = $this->currentPartNo;
        if ($this->config->getResponseChecksumValidationEnabled()) {
            $nextRequestArgs['ChecksumMode'] = 'ENABLED';
        }

        if (!empty($this->eTag)) {
            $nextRequestArgs['IfMatch'] = $this->eTag;
        }

        return $this->s3Client->getCommand(
            self::GET_OBJECT_COMMAND,
            $nextRequestArgs
        );
    }

    /**
     * @inheritDoc
     *
     * @param Result $result
     *
     * @return void
     */
    protected function computeObjectDimensions(ResultInterface $result): void
    {
        if (!empty($result['PartsCount'])) {
            $this->objectPartsCount = $result['PartsCount'];
        }

        $this->objectSizeInBytes = $this->computeObjectSizeFromContentRange(
            $result['ContentRange'] ?? ""
        );
    }
}
