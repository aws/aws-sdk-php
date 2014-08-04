<?php
namespace Aws\Glacier\Multipart;

use Aws\Common\Multipart\AbstractUploader;
use Aws\Glacier\TreeHash;
use GuzzleHttp\Command\Event\ProcessEvent;

class Uploader extends AbstractUploader
{
    const INITIATE = 'InitiateMultipartUpload';
    const UPLOAD = 'UploadMultipartPart';

    protected static $uploadIdParam = 'uploadId';

    protected function getCompleteCommand()
    {
        $treeHash = new TreeHash();
        $archiveSize = 0;
        $parts = $this->state->getUploadedParts();
        ksort($parts);
        foreach ($parts as $part) {
            $archiveSize += $part['size'];
            $treeHash->addChecksum($part['checksum']);
        }

        return $this->createCommand(static::COMPLETE, [
            'archiveSize' => $archiveSize,
            'checksum'    => bin2hex($treeHash->complete()),
        ]);
    }

    protected function getResultHandler()
    {
        return function (ProcessEvent $event) {
            // Get data from the range.
            $rangeData = self::parseRange(
                $event->getCommand()['range'],
                $this->parts->getPartSize()
            );

            // Store the data we need for later.
            $this->state->markPartAsUploaded($rangeData['PartNumber'], [
                'size'     => $rangeData['Size'],
                'checksum' => $event->getCommand()['checksum']
            ]);
        };
    }

    /**
     * Parses a Glacier range string into a size and part number.
     *
     * @param string $range    Glacier range string (e.g., "bytes 5-5000/*")
     * @param int    $partSize The part size
     *
     * @return array
     */
    public static function parseRange($range, $partSize)
    {
        // Strip away the prefix and suffix.
        if (strpos($range, 'bytes') !== false) {
            $range = substr($range, 6, -2);
        }

        // Split that range into it's parts.
        list($firstByte, $lastByte) = explode('-', $range);

        // Calculate and return data from the range.
        return [
            'Size'       => $lastByte - $firstByte + 1,
            'PartNumber' => intval($firstByte / $partSize),
        ];
    }
}
