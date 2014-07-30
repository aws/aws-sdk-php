<?php
namespace Aws\Common\Exception;

use Aws\Common\Multipart\AbstractTransferState;

class MultipartUploadException extends \RuntimeException
{
    /**
     * @var AbstractTransferState State of the transfer when the error was encountered
     */
    protected $state;

    /**
     * @param AbstractTransferState $state     Transfer state
     * @param \Exception            $exception Last encountered exception
     */
    public function __construct(AbstractTransferState $state, \Exception $exception = null)
    {
        parent::__construct(
            'An error was encountered while performing a multipart upload: ' . $exception->getMessage(),
            0,
            $exception
        );

        $this->state = $state;
    }

    /**
     * Get the state of the transfer
     *
     * @return AbstractTransferState
     */
    public function getState()
    {
        return $this->state;
    }
}
