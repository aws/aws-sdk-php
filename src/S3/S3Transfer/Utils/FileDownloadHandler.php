<?php

namespace Aws\S3\S3Transfer\Utils;

use Aws\S3\S3Transfer\AbstractMultipartDownloader;
use Aws\S3\S3Transfer\Exception\FileDownloadException;
use Aws\S3\S3Transfer\Progress\TransferListener;

class FileDownloadHandler extends DownloadHandler
{
    private const IDENTIFIER_LENGTH = 8;
    private const TEMP_INFIX = '.s3tmp.';
    private const MAX_UNIQUE_ID_ATTEMPTS = 100;

    /** @var string */
    private string $destination;

    /** @var bool */
    private bool $failsWhenDestinationExists;

    /** @var string */
    private string $temporaryDestination = '';

    /** @var mixed|null */
    protected mixed $handle = null;

    /** @var int */
    protected int $fixedPartSize = 0;

    /**
     * @param string $destination
     * @param bool $failsWhenDestinationExists
     */
    public function __construct(
        string $destination,
        bool $failsWhenDestinationExists
    ) {
        $this->destination = $destination;
        $this->failsWhenDestinationExists = $failsWhenDestinationExists;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @return bool
     */
    public function isFailsWhenDestinationExists(): bool
    {
        return $this->failsWhenDestinationExists;
    }

    /**
     * @param array $context
     *
     * @return void
     */
    public function transferInitiated(array $context): void
    {
        $this->validateDestination();
        $this->ensureDirectoryExists();
        $this->temporaryDestination = $this->generateTemporaryFilePath();
    }

    /**
     * @param array $context
     *
     * @return void
     */
    public function bytesTransferred(array $context): void
    {
        $snapshot = $context[TransferListener::PROGRESS_SNAPSHOT_KEY];
        $response = $snapshot->getResponse();

        if ($this->handle === null) {
            $this->fixedPartSize = $response['ContentLength'];
            $this->initializeDestination($response);
        }

        if ($this->handle === null) {
            throw new FileDownloadException(
                "Failed to initialize destination for downloading."
            );
        }

        $this->writePartToDestinationHandle($response);
    }

    /**
     * @param array $context
     *
     * @return void
     */
    public function transferComplete(array $context): void
    {
        $this->closeDestinationHandle();
        $this->replaceDestinationFile();
    }

    /**
     * @param array $context
     *
     * @return void
     */
    public function transferFail(array $context): void
    {
        $this->closeDestinationHandle();
        $this->cleanupAfterFailure($context);
    }

    /**
     * @param array $response
     *
     * @return void
     */
    public function initializeDestination(array $response): void
    {
        $objectSize = AbstractMultipartDownloader::computeObjectSizeFromContentRange(
            $response['ContentRange'] ?? ""
        );

        $this->createTruncatedFile($objectSize);
    }

    /**
     * @param array $response
     *
     * @return void
     */
    protected function writePartToDestinationHandle(array $response): void
    {
        $contentRange = $response['ContentRange'] ?? null;
        if ($contentRange === null) {
            throw new FileDownloadException(
                "Unable to get content range from response."
            );
        }

        $partNo = (int) ceil(
            self::getRangeTo($contentRange) / $this->fixedPartSize
        );
        $position = ($partNo - 1) * $this->fixedPartSize;

        if (!flock($this->handle, LOCK_EX)) {
            throw new FileDownloadException("Failed to acquire file lock.");
        }

        try {
            fseek($this->handle, $position);

            $body = $response['Body'];
            while (!$body->eof()) {
                $chunk = $body->read(self::READ_BUFFER_SIZE);

                if (fwrite($this->handle, $chunk) === false) {
                    throw new FileDownloadException("Failed to write data to temporary file.");
                }
            }
        } finally {
            flock($this->handle, LOCK_UN);
        }
    }

    /**
     * @return void
     */
    protected function closeDestinationHandle(): void
    {
        if (is_resource($this->handle)) {
            fclose($this->handle);
            $this->handle = null;
        }
    }

    /**
     * @return string
     */
    public function getHandlerResult(): string
    {
        return $this->destination;
    }

    /**
     * @return void
     */
    private function validateDestination(): void
    {
        if ($this->failsWhenDestinationExists && file_exists($this->destination)) {
            throw new FileDownloadException(
                "The destination '{$this->destination}' already exists."
            );
        }

        if (is_dir($this->destination)) {
            throw new FileDownloadException(
                "The destination '{$this->destination}' can't be a directory."
            );
        }
    }

    /**
     * @return void
     */
    private function ensureDirectoryExists(): void
    {
        $directory = dirname($this->destination);

        if (!is_dir($directory) && !mkdir($directory, 0755, true)
            && !is_dir($directory)) {
            throw new FileDownloadException(
                "Failed to create directory '{$directory}'."
            );
        }
    }

    /**
     * @return string
     */
    private function generateTemporaryFilePath(): string
    {
        for ($attempt = 0; $attempt < self::MAX_UNIQUE_ID_ATTEMPTS; $attempt++) {
            $uniqueId = $this->generateUniqueIdentifier();
            $temporaryPath = $this->destination . self::TEMP_INFIX . $uniqueId;

            if (!file_exists($temporaryPath)) {
                return $temporaryPath;
            }
        }

        throw new FileDownloadException(
            "Unable to generate a unique temporary file name after " . self::MAX_UNIQUE_ID_ATTEMPTS . " attempts."
        );
    }

    /**
     * @return string
     */
    private function generateUniqueIdentifier(): string
    {
        $uniqueId = uniqid();

        if (strlen($uniqueId) > self::IDENTIFIER_LENGTH) {
            return substr($uniqueId, 0, self::IDENTIFIER_LENGTH);
        }

        return str_pad($uniqueId, self::IDENTIFIER_LENGTH, "0");
    }

    /**
     * @param array $response
     *
     * @return void
     */
    private function initializeFile(array $response): void
    {
        $this->fixedPartSize = $response['ContentLength'];
        $objectSize = AbstractMultipartDownloader::computeObjectSizeFromContentRange(
            $response['ContentRange'] ?? ""
        );

        $this->createTruncatedFile($objectSize);
    }

    /**
     * @param int $size
     *
     * @return void
     */
    private function createTruncatedFile(int $size): void
    {
        $handle = fopen($this->temporaryDestination, 'w+');

        if ($handle === false) {
            throw new FileDownloadException(
                "Failed to open temporary file '{$this->temporaryDestination}' for writing."
            );
        }

        $this->handle = $handle;

        if (!ftruncate($this->handle, $size)) {
            throw new FileDownloadException(
                "Failed to allocate {$size} bytes for temporary file."
            );
        }
    }

    /**
     * @return void
     */
    private function replaceDestinationFile(): void
    {
        if (file_exists($this->destination)) {
            if ($this->failsWhenDestinationExists) {
                throw new FileDownloadException(
                    "The destination '{$this->destination}' already exists."
                );
            }

            if (!unlink($this->destination)) {
                throw new FileDownloadException(
                    "Failed to delete existing file '{$this->destination}'."
                );
            }
        }

        if (!rename($this->temporaryDestination, $this->destination)) {
            throw new FileDownloadException(
                "Unable to rename the file '{$this->temporaryDestination}' to '{$this->destination}'."
            );
        }
    }

    /**
     * @param array $context
     *
     * @return void
     */
    private function cleanupAfterFailure(array $context): void
    {
        if (file_exists($this->temporaryDestination)) {
            unlink($this->temporaryDestination);
            return;
        }

        $reason = $context[self::REASON_KEY] ?? '';
        $isDestinationExistsError = str_contains(
            $reason,
            "The destination '{$this->destination}' already exists."
        );

        if (file_exists($this->destination) && !$isDestinationExistsError) {
            unlink($this->destination);
        }
    }

    /**
     * @inheritDoc
     */
    public function isConcurrencySupported(): bool
    {
        return true;
    }
}