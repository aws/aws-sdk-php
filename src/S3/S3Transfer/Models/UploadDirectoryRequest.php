<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\Arn\ArnParser;
use Aws\S3\S3Transfer\Progress\TransferListener;
use InvalidArgumentException;

final class UploadDirectoryRequest extends TransferRequest
{
    /** @var string */
    private string $sourceDirectory;

    /** @var string */
    private string $targetBucket;

    /** @var array */
    private readonly array $uploadRequestArgs;

    /**
     * @param string $sourceDirectory The source directory to upload.
     * @param string $targetBucket The name of the bucket to upload objects to.
     * @param array $uploadRequestArgs The extract arguments to be passed in
     * each upload request.
     * @param array $config
     * - follow_symbolic_links: (boolean, optional) Whether to follow symbolic links when
     *   traversing the file tree.
     * - recursive: (boolean, optional) Whether to upload directories recursively.
     * - s3_prefix: (string, optional) The S3 key prefix to use for each object.
     *   If not provided, files will be uploaded to the root of the bucket.
     * - filter: (callable, optional) A callback to allow users to filter out unwanted files.
     *   It is invoked for each file. An example implementation is a predicate
     *   that takes a file and returns a boolean indicating whether this file
     *   should be uploaded.
     * - s3_delimiter: The S3 delimiter. A delimiter causes a list operation
     *   to roll up all the keys that share a common prefix into a single summary list result.
     * - put_object_request_callback: (callable, optional) A callback mechanism
     *   to allow customers to update individual putObjectRequest that the S3 Transfer Manager generates.
     * - failure_policy: (callable, optional) The failure policy to handle failed requests.
     * @param array $listeners For listening to transfer events such as transferInitiated.
     * @param TransferListener|null $progressTracker For showing progress in transfers.
     */
    public function __construct(
        string $sourceDirectory,
        string $targetBucket,
        array $uploadRequestArgs = [],
        array $config = [],
        array $listeners = [],
        ?TransferListener $progressTracker = null

    ) {
        parent::__construct($listeners, $progressTracker, $config);
        $this->sourceDirectory = $sourceDirectory;
        if (ArnParser::isArn($targetBucket)) {
            $targetBucket =  ArnParser::parse($targetBucket)->getResource();
        }
        $this->targetBucket = $targetBucket;
        $this->uploadRequestArgs = $uploadRequestArgs;
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getSourceDirectory(): string
    {
        return $this->sourceDirectory;
    }

    /**
     * @return string
     */
    public function getTargetBucket(): string
    {
        return $this->targetBucket;
    }

    /**
     * @return array
     */
    public function getUploadRequestArgs(): array
    {
        return $this->uploadRequestArgs;
    }

    /**
     * Helper method to validate source directory
     * @return void
     */
    public function validateSourceDirectory(): void
    {
        if (!is_dir($this->sourceDirectory)) {
            throw new InvalidArgumentException(
                "Please provide a valid directory path. "
                . "Provided = " . $this->sourceDirectory
            );
        }
    }
}
