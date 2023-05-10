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

    protected $progressBar = [
        "Transfer initiated...\n|                    | 0.0%\n",
        "|==                  | 12.5%\n",
        "|=====               | 25.0%\n",
        "|=======             | 37.5%\n",
        "|==========          | 50.0%\n",
        "|============        | 62.5%\n",
        "|===============     | 75.0%\n",
        "|=================   | 87.5%\n",
        "|====================| 100.0%\nTransfer complete!\n"
    ];

    /** @var array Params used to identity the upload. */
    private $id;

    /** @var int Part size being used by the upload. */
    private $partSize;

    /** @var array Parts that have been uploaded. */
    private $uploadedParts = [];

    /** @var int Identifies the status the upload. */
    private $status = self::CREATED;

    private $progressThresholds = [];

//    private $displayUploadProgress;

    /**
     * @param array $id Params used to identity the upload.
     */
    public function __construct(array $id)
    {
        $this->id = $id;
    }

    /**
     * Get the upload's ID, which is a tuple of parameters that can uniquely
     * identify the upload.
     *
     * @return array
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set's the "upload_id", or 3rd part of the upload's ID. This typically
     * only needs to be done after initiating an upload.
     *
     * @param string $key   The param key of the upload_id.
     * @param string $value The param value of the upload_id.
     */
    public function setUploadId($key, $value)
    {
        $this->id[$key] = $value;
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
     * @param $partSize int Size of upload parts.
     */
    public function setPartSize($partSize)
    {
        $this->partSize = $partSize;
    }

    public function setProgressThresholds($totalSize)
    {
        if(!is_int($totalSize)) {
            throw new \InvalidArgumentException('The total size of the upload must be an int.');
        }

        $this->progressThresholds[0] = 0;
        for ($i=1;$i<=8;$i++) {
            $this->progressThresholds []= round($totalSize*($i/8));
        }
        $this->progressBar = array_combine($this->progressThresholds, $this->progressBar);
        return $this->progressThresholds;
    }

    public function displayProgress($totalUploaded)
    {
        if(!is_int($totalUploaded)) {
            throw new \InvalidArgumentException('The size of the bytes being uploaded must be an int.');
        }

        while ($this->progressThresholds
                && !empty($this->progressBar)
                && $totalUploaded >= array_key_first($this->progressBar))
        {
            echo $this->progressBar[array_key_first($this->progressBar)];
            unset($this->progressBar[array_key_first($this->progressBar)]);
        }
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
     * @param int $status Status is an integer code defined by the constants
     *                    CREATED, INITIATED, and COMPLETED on this class.
     */

    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Determines whether the upload state is in the INITIATED status.
     *
     * @return bool
     */
    public function isInitiated()
    {
        return $this->status === self::INITIATED;
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