<?php
namespace Aws\S3\Multipart;

use Aws\AwsCommandInterface;
use Aws\Common\Multipart\AbstractUploader;
use Aws\Common\Result;

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

    protected function handleResult(AwsCommandInterface $command, Result $result)
    {
        $partNumber = $command['PartNumber'];
        $this->state->markPartAsUploaded($partNumber, [
            'PartNumber' => $partNumber,
            'ETag'       => $result['ETag']
        ]);
    }
}
