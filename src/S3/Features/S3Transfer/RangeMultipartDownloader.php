<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\CommandInterface;
use Aws\Result;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Psr\Http\Message\StreamInterface;

class RangeMultipartDownloader extends MultipartDownloader
{

    /** @var int */
    private int $partSize;

    /**
     * @param S3ClientInterface $s3Client
     * @param array $requestArgs
     * @param array $config
     * @param int $currentPartNo
     * @param int $objectPartsCount
     * @param int $objectCompletedPartsCount
     * @param int $objectSizeInBytes
     * @param int $objectBytesTransferred
     * @param string $eTag
     * @param string $objectKey
     * @param MultipartDownloadListener|null $listener
     * @param TransferListener|null $progressListener
     * @param StreamInterface|null $stream
     */
    public function __construct(
        S3ClientInterface $s3Client,
        array $requestArgs = [],
        array $config = [],
        int $currentPartNo = 0,
        int $objectPartsCount = 0,
        int $objectCompletedPartsCount = 0,
        int $objectSizeInBytes = 0,
        int $objectBytesTransferred = 0,
        string $eTag = "",
        string $objectKey = "",
        ?MultipartDownloadListener $listener = null,
        ?TransferListener $progressListener = null,
        ?StreamInterface $stream = null
    ) {
        parent::__construct(
            $s3Client,
            $requestArgs,
            $config,
            $currentPartNo,
            $objectPartsCount,
            $objectCompletedPartsCount,
            $objectSizeInBytes,
            $objectBytesTransferred,
            $eTag,
            $objectKey,
            $listener,
            $progressListener,
            $stream
        );
        if (empty($config['minimumPartSize'])) {
            throw new \RuntimeException('You must provide a valid minimum part size in bytes');
        }
        $this->partSize = $config['minimumPartSize'];
        // If object size is known at instantiation time then, we can compute
        // the object dimensions.
        if ($this->objectSizeInBytes !== 0) {
            $this->computeObjectDimensions(new Result(['ContentRange' => $this->objectSizeInBytes]));
        }
    }


    /**
     * @inheritDoc
     *
     * @return CommandInterface
     */
    protected function nextCommand(): CommandInterface
    {
        // If currentPartNo is not know then lets initialize it to 1
        // otherwise just increment it.
        if ($this->currentPartNo === 0) {
            $this->currentPartNo = 1;
        } else {
            $this->currentPartNo++;
        }

        $nextRequestArgs = array_slice($this->requestArgs, 0);
        $from = ($this->currentPartNo - 1) * $this->partSize;
        $to = ($this->currentPartNo * $this->partSize) - 1;
        if ($this->objectSizeInBytes !== 0) {
            $to = min($this->objectSizeInBytes, $to);
        }

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
        // Assign object size just if needed.
        if ($this->objectSizeInBytes === 0) {
            $this->objectSizeInBytes = $this->computeObjectSize($result['ContentRange'] ?? "");
        }

        if ($this->objectSizeInBytes > $this->partSize) {
            $this->objectPartsCount = intval(ceil($this->objectSizeInBytes / $this->partSize));
        } else {
            // Single download since partSize will be set to full object size.
            $this->partSize = $this->objectSizeInBytes;
            $this->objectPartsCount = 1;
            $this->currentPartNo = 1;
        }
    }
}