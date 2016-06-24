<?php

namespace Aws\Exception;

class TransferException extends \RuntimeException
{
    /** @var string file source path */
    private $source;

    /**
     * TransferException constructor.
     * 
     * @param string $source file source that generates exception
     * @param \Exception|array $prev Exception being thrown
     */
    public function __construct($source, $prev = null)
    {
        $msg = "An error occurs in a S3 Transfer when transferring file: ";
        
        $this->source = $source;
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
}