<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\Arn\ArnParser;
use Aws\S3\S3Transfer\Progress\TransferListener;
use InvalidArgumentException;

class DownloadDirectoryRequest extends TransferRequest
{
    /** @var string */
    private string $sourceBucket;

    /** @var string */
    private string $destinationDirectory;

    /** @var array  */
    private readonly array $getObjectRequestArgs;

    /**
     * @param string $sourceBucket The bucket from where the files are going to be
     * downloaded from.
     * @param string $destinationDirectory The destination path where the downloaded
     * files will be placed in.
     * @param array $getObjectRequestArgs
     * @param array $config The config options for this download directory operation.
     *  - s3_prefix: (string, optional) This parameter will be considered just if
     *    not provided as part of the list_object_v2_args config option.
     *  - s3_delimiter: (string, optional, defaulted to '/') This parameter will be
     *    considered just if not provided as part of the list_object_v2_args config
     *    option.
     *  - filter: (Closure, optional) A callable which will receive an object key as
     *    parameter and should return true or false in order to determine
     *    whether the object should be downloaded.
     *  - get_object_request_callback: (Closure, optional) A function that will
     *    be invoked right before the download request is performed and that will
     *    receive as parameter the request arguments for each request.
     *  - failure_policy: (Closure, optional) A function that will be invoked
     *    on a download failure and that will receive as parameters:
     *    - $requestArgs: (array) The arguments for the request that originated
     *      the failure.
     *    - $downloadDirectoryRequestArgs: (array) The arguments for the download
     *      directory request.
     *    - $reason: (Throwable) The exception that originated the request failure.
     *    - $downloadDirectoryResponse: (DownloadDirectoryResponse) The download response
     *      to that point in the upload process.
     *  - track_progress: (bool, optional) Overrides the config option set
     *    in the transfer manager instantiation to decide whether transfer
     *    progress should be tracked.
     *  - minimum_part_size: (int, optional) The minimum part size in bytes
     *    to be used in a range multipart download.
     *  - list_object_v2_args: (array, optional) The arguments to be included
     *    as part of the listObjectV2 request in order to fetch the objects to
     *    be downloaded. The most common arguments would be:
     *    - MaxKeys: (int) Sets the maximum number of keys returned in the response.
     *    - Prefix: (string) To limit the response to keys that begin with the
     *      specified prefix.
     * @param TransferListener[] $listeners The listeners for watching
     * transfer events. Each listener will be cloned per file upload.
     * @param TransferListener|null $progressTracker Ideally the progress
     * tracker implementation provided here should be able to track multiple
     * transfers at once. Please see MultiProgressTracker implementation.
     */
    public function __construct(
        string $sourceBucket,
        string $destinationDirectory,
        array $getObjectRequestArgs,
        array $config = [],
        array $listeners = [],
        ?TransferListener $progressTracker = null
    ) {
        parent::__construct($listeners, $progressTracker, $config);
        if (ArnParser::isArn($sourceBucket)) {
            $sourceBucket = ArnParser::parse($sourceBucket)->getResource();
        }

        $this->sourceBucket = $sourceBucket;
        $this->destinationDirectory = $destinationDirectory;
        $this->getObjectRequestArgs = $getObjectRequestArgs;
    }

    /**
     * @param string $sourceBucket
     * @param string $destinationDirectory
     * @param array $downloadDirectoryArgs
     * @param array $config
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     *
     * @return DownloadDirectoryRequest
     */
    public static function fromLegacyArgs(
        string            $sourceBucket,
        string            $destinationDirectory,
        array             $downloadDirectoryArgs = [],
        array             $config = [],
        array             $listeners = [],
        ?TransferListener $progressTracker = null,
    ): DownloadDirectoryRequest
    {
        return new self(
            $sourceBucket,
            $destinationDirectory,
            $downloadDirectoryArgs,
            $config,
            $listeners,
            $progressTracker
        );
    }

    /**
     * @return string
     */
    public function getSourceBucket(): string
    {
        return $this->sourceBucket;
    }

    /**
     * @return string
     */
    public function getDestinationDirectory(): string
    {
        return $this->destinationDirectory;
    }

    /**
     * @return array
     */
    public function getGetObjectRequestArgs(): array
    {
        return $this->getObjectRequestArgs;
    }

    /**
     * Helper method to validate the destination directory exists.
     *
     * @return void
     */
    public function validateDestinationDirectory(): void
    {
        if (!file_exists($this->destinationDirectory)) {
            mkdir($this->destinationDirectory, 0755, true);
        }

        if (!is_dir($this->destinationDirectory)) {
            throw new InvalidArgumentException(
                "Destination directory `$this->destinationDirectory` is not a directory."
            );
        }
    }
}
