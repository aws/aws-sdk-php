<?php
namespace Aws\Common\Multipart;

/**
 * Representation of the multipart upload.
 *
 * This object keeps track of the state of the upload, including the status and
 * which parts have been uploaded.
 */
class UploadState
{
    const CREATED = 0;
    const INITIATED = 1;
    const COMPLETED = 2;
    const ABORTED = 3;

    /** @var array Params used to identity the upload. */
    private $uploadId;

    /** @var int Part size being used by the upload. */
    private $partSize;

    /** @var array Parts that have been uploaded. */
    private $uploadedParts = [];

    /** @var int Identifies the status the upload. */
    private $status = self::CREATED;

    /**
     * @param array $uploadId
     */
    public function __construct(array $uploadId)
    {
        $this->uploadId = $uploadId;
    }

    /**
     * Returns
     *
     * @return array
     */
    public function getUploadId()
    {
        return $this->uploadId;
    }

    public function getPartSize()
    {
        return $this->partSize;
    }

    public function setPartSize($partSize)
    {
        $this->partSize = $partSize;
    }

    public function markPartAsUploaded($partNumber, array $partData = [])
    {
        $this->uploadedParts[$partNumber] = $partData;
    }

    public function getUploadedParts()
    {
        ksort($this->uploadedParts);

        return $this->uploadedParts;
    }

    public function setStatus($status, array $newUploadId = null)
    {
        $this->status = $status;
        if (is_array($newUploadId)) {
            $this->uploadId = $newUploadId;
        }
    }

    public function isInitiated()
    {
        return $this->status >= self::INITIATED;
    }

    public function isAborted()
    {
        return $this->status === self::ABORTED;
    }

    public function isCompleted()
    {
        return $this->status === self::COMPLETED;
    }
}
