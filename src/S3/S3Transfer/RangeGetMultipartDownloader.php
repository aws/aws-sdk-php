<?php

namespace Aws\S3\S3Transfer;

use Aws\CommandInterface;
use Aws\Result;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Exceptions\S3TransferException;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Psr\Http\Message\StreamInterface;

class RangeGetMultipartDownloader extends MultipartDownloader
{

    /** @var int */
    private int $partSize;

    /**
     * @param S3ClientInterface $s3Client
     * @param array $requestArgs
     * @param array $config
     * - minimum_part_size: The minimum part size for a multipart download
     *   using range get. This option MUST be set when using range get.
     * @param int $currentPartNo
     * @param int $objectPartsCount
     * @param int $objectSizeInBytes
     * @param string $eTag
     * @param StreamInterface|null $stream
     * @param TransferProgressSnapshot|null $currentSnapshot
     * @param TransferListenerNotifier|null $listenerNotifier
     */
    public function __construct(
        S3ClientInterface $s3Client,
        array $requestArgs,
        array $config = [],
        int $currentPartNo = 0,
        int $objectPartsCount = 0,
        int $objectSizeInBytes = 0,
        string $eTag = "",
        ?StreamInterface $stream = null,
        ?TransferProgressSnapshot $currentSnapshot = null,
        ?TransferListenerNotifier $listenerNotifier  = null,
    ) {
        parent::__construct(
            $s3Client,
            $requestArgs,
            $config,
            $currentPartNo,
            $objectPartsCount,
            $objectSizeInBytes,
            $eTag,
            $stream,
            $currentSnapshot,
            $listenerNotifier,
        );
        if (empty($config['minimum_part_size'])) {
            throw new S3TransferException(
                'You must provide a valid minimum part size in bytes'
            );
        }
        $this->partSize = $config['minimum_part_size'];
        // If object size is known at instantiation time then, we can compute
        // the object dimensions.
        if ($this->objectSizeInBytes !== 0) {
            $this->computeObjectDimensions(
                new Result(['ContentRange' => $this->objectSizeInBytes])
            );
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

        $nextRequestArgs = [...$this->requestArgs];
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
            $this->objectSizeInBytes = $this->computeObjectSize(
                $result['ContentRange'] ?? ""
            );
        }

        if ($this->objectSizeInBytes > $this->partSize) {
            $this->objectPartsCount = intval(
                ceil($this->objectSizeInBytes / $this->partSize)
            );
        } else {
            // Single download since partSize will be set to full object size.
            $this->partSize = $this->objectSizeInBytes;
            $this->objectPartsCount = 1;
            $this->currentPartNo = 1;
        }
    }
}