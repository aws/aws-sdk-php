<?php

namespace Aws\Exception;

class TransferException extends \RuntimeException
{
    /** @var string file source path */
    private $source;
    /** @var array files haven't been transferred yet */
    private $uncompleted = [];

    /**
     * TransferException constructor.
     *
     * @param array $inProgress
     * @param \Exception|array $prev Exception being thrown
     */
    public function __construct(array $inProgress, $prev = null)
    {
        $msg = "An error occurs in a S3 Transfer when transferring file: ";

        $this->source = $inProgress['Failed'];
        $this->uncompleted = $inProgress['Uncompleted'];

        $msg .= $this->source;

        parent::__construct($msg, 0, $prev);
    }

    /**
     * Get the source file path that cause error
     *
     * @return string
     */
    public function getFileSource()
    {
        return $this->source;
    }

    /**
     * Get remaining file names that haven't been transferred
     *
     * @return array
     */
    public function getUncompletedFiles()
    {
        return $this->uncompleted;
    }
}
