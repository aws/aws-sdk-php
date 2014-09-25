<?php
namespace Aws\S3\Multipart;

use Aws\Common\Multipart\AbstractUploader;
use Aws\Common\Result;
use GuzzleHttp\Command\CommandInterface;

/**
 * Abstract class for transfer commonalities
 */
class Uploader extends AbstractUploader
{
    protected function getCompleteCommand()
    {
        return $this->createCommand(static::COMPLETE, [
            'MultipartUpload' => ['Parts' => $this->state->getUploadedParts()]
        ]);
    }

    protected function handleResult(CommandInterface $command, Result $result)
    {
        $partNumber = $command['PartNumber'];
        $this->state->markPartAsUploaded($partNumber, [
            'PartNumber' => $partNumber,
            'ETag'       => $result['ETag']
        ]);
    }
}
