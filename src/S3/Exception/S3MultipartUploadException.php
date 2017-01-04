<?php
namespace Aws\S3\Exception;

use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\Multipart\UploadState;

class S3MultipartUploadException extends \Aws\Exception\MultipartUploadException
{
    /** @var string File path of transfer object */
    private $filePath;

    /**
     * @param UploadState      $state Upload state at time of the exception.
     * @param \Exception|array $prev  Exception being thrown. Could be an array of
     *                                AwsExceptions being thrown when uploading parts
     *                                for one object, or an instance of AwsException
     *                                for a specific Multipart error being thrown in
     *                                the MultipartUpload process.
     */
    public function __construct(UploadState $state, $prev = null) {
        if (is_array($prev)) {
            foreach ($prev as $part => $error) {
                $this->collectPathInfo($error->getCommand());
            }
        } elseif ($prev instanceof AwsException) {
            $this->collectPathInfo($prev->getCommand());
        }
        parent::__construct($state, $prev);
    }

    /**
     * Get file path of S3 transfer
     *
     * @return string|null Returns null when 'Bucket' or 'Key' information
     *                     are unavailable.
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Construct file path
     *
     * @param CommandInterface $cmd
     */
    private function collectPathInfo(CommandInterface $cmd)
    {
        if (empty($this->filePath) && isset($cmd['Bucket']) && isset($cmd['Key'])) {
            $this->filePath = $cmd['Bucket'] . '/' . $cmd['Key'];
        }
    }
}
