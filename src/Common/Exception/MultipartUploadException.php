<?php
namespace Aws\Common\Exception;

use Aws\Common\Multipart\UploadState;

class MultipartUploadException extends \RuntimeException
{
    /**
     * @var UploadState State of the transfer when the error was encountered
     */
    protected $state;

    /**
     * @param UploadState $state  Upload state at time of the exception.
     * @param string              $action Action being taken.
     * @param \Exception          $prev   Exception being thrown.
     */
    public function __construct(
        UploadState $state,
        $action = 'performing',
        \Exception $prev = null
    ) {
        $message = "An exception occurred while {$action} a multipart upload.";
        parent::__construct($message, 0, $prev);

        $this->state = $state;
    }

    /**
     * Get the state of the transfer
     *
     * @return UploadState
     */
    public function getState()
    {
        return $this->state;
    }
}
