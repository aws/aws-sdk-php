<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\CommandInterface;
use Aws\Result;
use Aws\ResultInterface;

class RangeMultipartDownloader extends MultipartDownloader
{

    /** @var int */
    private int $partSize;

    /**
     * @inheritDoc
     *
     * @return CommandInterface
     */
    protected function nextCommand(): CommandInterface
    {
        if ($this->objectSizeInBytes !== 0) {
            $this->computeObjectDimensions(new Result(['ContentRange' => $this->totalBytes]));
        }

        if ($this->currentPartNo === 0) {
            $this->currentPartNo = 1;
            $this->partSize = $this->config['targetPartSizeBytes'];
        } else {
            $this->currentPartNo++;
        }

        $nextRequestArgs = array_slice($this->requestArgs, 0);
        $from = ($this->currentPartNo - 1) * ($this->partSize + 1);
        $to = $this->currentPartNo * $this->partSize;
        $nextRequestArgs['Range'] = "bytes=$from-$to";
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
        $this->objectSizeInBytes = $this->computeObjectSize($result['ContentRange'] ?? "");
        if ($this->objectSizeInBytes > $this->partSize) {
            $this->objectPartsCount = intval(ceil($this->objectSizeInBytes / $this->partSize));
        } else {
            $this->partSize = $this->objectSizeInBytes;
            $this->currentPartNo = 1;
        }
    }
}