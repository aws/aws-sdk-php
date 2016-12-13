<?php
namespace Aws\Exception;

use Aws\CommandInterface;
use Aws\Multipart\UploadState;

class MultipartUploadException extends \RuntimeException
{
    /** @var UploadState State of the erroneous transfer */
    private $state;
    /** @var string File path of transfer object */
    private $filePath;

    /**
     * @param UploadState      $state Upload state at time of the exception.
     * @param \Exception|array $prev  Exception being thrown.
     */
    public function __construct(UploadState $state, $prev = null) {
        $msg = 'An exception occurred while performing a multipart upload';

        if (is_array($prev)) {
            $msg = strtr($msg, ['performing' => 'uploading parts to']);
            $msg .= ". The following parts had errors:\n";
            /** @var $error AwsException */
            foreach ($prev as $part => $error) {
                $msg .= "- Part {$part}: " . $error->getMessage(). "\n";
                $this->collectPathInfo($error->getCommand());
            }
        } elseif ($prev instanceof AwsException) {
            $this->collectPathInfo($prev->getCommand());
            switch ($prev->getCommand()->getName()) {
                case 'CreateMultipartUpload':
                case 'InitiateMultipartUpload':
                    $action = 'initiating';
                    break;
                case 'CompleteMultipartUpload':
                    $action = 'completing';
                    break;
            }
            if (isset($action)) {
                $msg = strtr($msg, ['performing' => $action]);
            }
            $msg .= ": {$prev->getMessage()}";
        }

        if (!$prev instanceof \Exception) {
            $prev = null;
        }

        parent::__construct($msg, 0, $prev);
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

    /**
     * Get file path of the transfer
     *
     * @return array
     */
    public function getFilePaths()
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
