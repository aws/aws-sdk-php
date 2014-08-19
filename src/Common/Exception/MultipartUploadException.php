<?php
namespace Aws\Common\Exception;

use Aws\Common\Multipart\UploadState;

class MultipartUploadException extends \RuntimeException
{
    const MSG_TEMPLATE = 'An exception occurred while %s a multipart upload.';

    /** @var UploadState State of the erroneous transfer */
    private $state;

    /**
     * @param UploadState $state  Upload state at time of the exception.
     * @param string      $action Action being taken.
     * @param \Exception  $prev   Exception being thrown.
     */
    public function __construct(
        UploadState $state,
        $action,
        \Exception $prev = null
    ) {
        if (is_array($action)) {
            $message = sprintf(self::MSG_TEMPLATE, 'uploading parts to');
            $message .= " The following parts had errors:\n";
            foreach ($action as $part => $error) {
                $message .= "- Part {$part}: {$error}\n";
            }
        } else {
            $message = sprintf(self::MSG_TEMPLATE, $action);
        }

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
