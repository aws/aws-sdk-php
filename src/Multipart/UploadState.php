<?php
namespace Aws\Multipart;

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
     * Get the upload's ID, which is a triad of parameters that can uniquely
     * identify the upload.
     *
     * @return array
     */
    public function getUploadId()
    {
        return $this->uploadId;
    }

    /**
     * Get the part size.
     *
     * @return int
     */
    public function getPartSize()
    {
        return $this->partSize;
    }

    /**
     * Set the part size.
     *
     * @param $partSize Size of upload parts.
     */
    public function setPartSize($partSize)
    {
        $this->partSize = $partSize;
    }

    /**
     * Marks a part as being uploaded.
     *
     * @param int   $partNumber The part number.
     * @param array $partData   Data from the upload operation that needs to be
     *                          recalled during the complete operation.
     */
    public function markPartAsUploaded($partNumber, array $partData = [])
    {
        $this->uploadedParts[$partNumber] = $partData;
    }

    /**
     * Returns whether a part has been uploaded.
     *
     * @param int $partNumber The part number.
     *
     * @return bool
     */
    public function hasPartBeenUploaded($partNumber)
    {
        return isset($this->uploadedParts[$partNumber]);
    }

    /**
     * Returns a sorted list of all the uploaded parts.
     *
     * @return array
     */
    public function getUploadedParts()
    {
        ksort($this->uploadedParts);

        return $this->uploadedParts;
    }

    /**
     * Set the status of the upload.
     *
     * @param int   $status      Status is an integer code defined by the
     *                           constants CREATED, INITIATED, COMPLETED, and
     *                           ABORTED defined on this class.
     * @param array $newUploadId An array representing an upload ID that you'd
     *                           like to set for this upload state at the time
     *                           of a status change. This is only when setting
     *                           the status to INITIATED.
     */
    public function setStatus($status, array $newUploadId = null)
    {
        $this->status = $status;
        if (is_array($newUploadId)) {
            $this->uploadId = $newUploadId;
        }
    }

    /**
     * Determines whether the upload state is in the INITIATED status.
     *
     * @return bool
     */
    public function isInitiated()
    {
        return $this->status >= self::INITIATED;
    }

    /**
     * Determines whether the upload state is in the ABORTED status.
     *
     * @return bool
     */
    public function isAborted()
    {
        return $this->status === self::ABORTED;
    }

    /**
     * Determines whether the upload state is in the COMPLETED status.
     *
     * @return bool
     */
    public function isCompleted()
    {
        return $this->status === self::COMPLETED;
    }
}
