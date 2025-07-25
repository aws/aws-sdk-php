<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\Arn\ArnParser;
use Aws\S3\S3Transfer\Progress\TransferListener;
use InvalidArgumentException;

class UploadDirectoryRequest extends TransferRequest
{
    /** @var string */
    private string $sourceDirectory;

    /** @var string */
    private string $targetBucket;

    /** @var array */
    private readonly array $putObjectRequestArgs;

    /**
     * @param string $sourceDirectory
     * @param string $targetBucket
     * @param array $putObjectRequestArgs
     * @param array $config
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     */
    public function __construct(
        string $sourceDirectory,
        string $targetBucket,
        array $putObjectRequestArgs = [],
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
        $this->putObjectRequestArgs = $putObjectRequestArgs;
        $this->config = $config;
    }

    /**
     * @param string $sourceDirectory
     * @param string $targetBucket
     * @param array $uploadDirectoryRequestArgs
     * @param array $config
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     *
     * @return UploadDirectoryRequest
     */
    public static function fromLegacyArgs(
        string            $sourceDirectory,
        string            $targetBucket,
        array             $uploadDirectoryRequestArgs = [],
        array             $config = [],
        array             $listeners = [],
        ?TransferListener $progressTracker = null,
    ): UploadDirectoryRequest
    {
        return new self(
            $sourceDirectory,
            $targetBucket,
            $uploadDirectoryRequestArgs,
            $config,
            $listeners,
            $progressTracker
        );
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
    public function getPutObjectRequestArgs(): array
    {
        return $this->putObjectRequestArgs;
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
