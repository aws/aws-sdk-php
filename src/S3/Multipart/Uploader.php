<?php
namespace Aws\S3\Multipart;

use Aws\Common\Multipart\AbstractUploader;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * Abstract class for transfer commonalities
 */
class Uploader extends AbstractUploader
{
    protected function getCompleteCommand()
    {
        $parts = $this->state->getUploadedParts();
        ksort($parts);

        return $this->createCommand(static::COMPLETE, [
            'MultipartUpload' => ['Parts' => $parts]
        ]);
    }

    protected function getResultHandler()
    {
        return function (ProcessEvent $event) {
            $partNumber = $event->getCommand()['PartNumber'];
            $this->state->markPartAsUploaded($partNumber, [
                'PartNumber' => $partNumber,
                'ETag'       => $event->getResult()['ETag']
            ]);
        };
    }
}
