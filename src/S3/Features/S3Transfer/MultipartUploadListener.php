<?php

namespace Aws\S3\Features\S3Transfer;

use Closure;

class MultipartUploadListener
{
    /**
     * @param Closure|null $onUploadInitiated
     *  Parameters that will be passed when invoked:
     *  - &$commandArgs: A pointer to the initial request arguments.
     *  - $initialPart: The number of the part from where the upload will start.
     *
     * @param Closure|null $onUploadFailed
     *  Parameters that will be passed when invoked:
     *  - $reason: The throwable with the reason why the upload failed.
     *  - $totalPartsUploaded: The total of parts uploaded before failure.
     *  - $totalBytesUploaded: The total of bytes uploaded before failure.
     *  - $lastPartUploaded: The number of the last part that was uploaded
     *    before failure.
     *
     * @param Closure|null $onUploadCompleted
     *  Parameters that will be passed when invoked:
     *  - $stream: The stream which holds the bytes for the file uploaded.
     *  - $totalPartsUploaded: The number of parts that were uploaded.
     *  - $totalBytesUploaded: The total of bytes that were uploaded.
     *
     * @param Closure|null $onPartUploadInitiated
     *  Parameters that will be passed when invoked:
     *  - $partUploadCommand: The command for uploading the current part.
     *  - $partNo: The part to be uploaded.
     *
     * @param Closure|null $onPartUploadCompleted
     *  Parameters that will be passed when invoked:
     *  - $result: The result received from the service for that part upload .
     *  - $partNo: The part number just uploaded.
     *  - $partTotalBytes: The size of the part just uploaded.
     *  - $totalParts: The total parts for the full object to be uploaded.
     *  - $objectBytesUploaded: The total in bytes already uploaded.
     *  - $objectSizeInBytes: The total in bytes for the full object to be uploaded.
     *
     * @param Closure|null $onPartUploadFailed
     *  Parameters that will be passed when invoked:
     *  - $partUploadCommand: The command that initiated the upload request.
     *  - $reason: The throwable exception gotten which should contain why the
     *             request failed.
     *  - $partNo: The part number for which the request failed.
     */
    public function __construct(
        public ?Closure $onUploadInitiated = null,
        public ?Closure $onUploadFailed = null,
        public ?Closure $onUploadCompleted = null,
        public ?Closure $onPartUploadInitiated = null,
        public ?Closure $onPartUploadCompleted = null,
        public ?Closure $onPartUploadFailed = null
    ) {}
}