<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Exception\S3TransferException;

/**
 * Represents the state of a resumable multipart download.
 * This class can be serialized to/from JSON to persist download progress.
 */
final class ResumableDownload
{
    private const VERSION = '1.0';

    /** @var string */
    private string $resumeFilePath;

    /** @var array */
    private array $requestArgs;

    /** @var array */
    private array $config;

    /** @var array */
    private array $initialRequestResult;

    /** @var array */
    private array $currentSnapshot;

    /** @var array */
    private array $partsCompleted;

    /** @var int */
    private int $totalNumberOfParts;

    /** @var string */
    private string $temporaryFile;

    /** @var string */
    private string $eTag;

    /** @var int */
    private int $objectSizeInBytes;

    /** @var int */
    private int $fixedPartSize;

    /** @var string */
    private string $destination;

    /**
     * @param array $requestArgs The request arguments used for the download
     * @param array $config The config used in the request
     * @param array $initialRequestResult The response from the initial request
     * @param array $currentSnapshot The current progress snapshot
     * @param array $partsCompleted Map of completed part numbers (partNo => true)
     * @param int $totalNumberOfParts Total number of parts in the download
     * @param string $temporaryFile Path to the temporary file being downloaded to
     * @param string $eTag ETag of the S3 object for consistency verification
     * @param int $objectSizeInBytes Total size of the object in bytes
     * @param int $fixedPartSize Size of each part in bytes
     * @param string $destination Final destination path for the downloaded file
     */
    public function __construct(
        string $resumeFilePath,
        array $requestArgs,
        array $config,
        array $initialRequestResult,
        array $currentSnapshot,
        array $partsCompleted,
        int $totalNumberOfParts,
        string $temporaryFile,
        string $eTag,
        int $objectSizeInBytes,
        int $fixedPartSize,
        string $destination
    ) {
        // Resume files must end in .resume
        if (!str_ends_with($resumeFilePath, '.resume')) {
            $resumeFilePath .= '.resume';
        }
        $this->resumeFilePath = $resumeFilePath;
        $this->requestArgs = $requestArgs;
        $this->config = $config;
        $this->initialRequestResult = $initialRequestResult;
        $this->currentSnapshot = $currentSnapshot;
        $this->partsCompleted = $partsCompleted;
        $this->totalNumberOfParts = $totalNumberOfParts;
        $this->temporaryFile = $temporaryFile;
        $this->eTag = $eTag;
        $this->objectSizeInBytes = $objectSizeInBytes;
        $this->fixedPartSize = $fixedPartSize;
        $this->destination = $destination;
    }

    /**
     * Serialize the resumable download state to JSON format.
     *
     * @return string JSON-encoded state
     */
    public function toJson(): string
    {
        $data = [
            'version' => self::VERSION,
            'resumeFilePath' => $this->resumeFilePath,
            'requestArgs' => $this->requestArgs,
            'config' => $this->config,
            'initialRequestResult' => $this->initialRequestResult,
            'currentSnapshot' => $this->currentSnapshot,
            'partsCompleted' => $this->partsCompleted,
            'totalNumberOfParts' => $this->totalNumberOfParts,
            'temporaryFile' => $this->temporaryFile,
            'eTag' => $this->eTag,
            'objectSizeInBytes' => $this->objectSizeInBytes,
            'fixedPartSize' => $this->fixedPartSize,
            'destination' => $this->destination,
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Deserialize a resumable download state from JSON format.
     *
     * @param string $json JSON-encoded state
     * @return self
     * @throws S3TransferException If the JSON is invalid or missing required fields
     */
    public static function fromJson(string $json): self
    {
        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new S3TransferException(
                'Failed to parse resume file: ' . json_last_error_msg()
            );
        }

        if (!is_array($data)) {
            throw new S3TransferException(
                'Invalid resume file format: expected JSON object'
            );
        }

        // Validate version
        if (!isset($data['version']) || $data['version'] !== self::VERSION) {
            throw new S3TransferException(
                'Invalid or unsupported resume file version'
            );
        }

        // Validate required fields
        $requiredFields = [
            'resumeFilePath',
            'requestArgs',
            'config',
            'initialRequestResult',
            'currentSnapshot',
            'partsCompleted',
            'totalNumberOfParts',
            'temporaryFile',
            'eTag',
            'objectSizeInBytes',
            'fixedPartSize',
            'destination',
        ];

        foreach ($requiredFields as $field) {
            if (!array_key_exists($field, $data)) {
                throw new S3TransferException(
                    "Invalid resume file: missing required field '$field'"
                );
            }
        }

        return new self(
            $data['resumeFilePath'],
            $data['requestArgs'],
            $data['config'],
            $data['initialRequestResult'],
            $data['currentSnapshot'],
            $data['partsCompleted'],
            $data['totalNumberOfParts'],
            $data['temporaryFile'],
            $data['eTag'],
            $data['objectSizeInBytes'],
            $data['fixedPartSize'],
            $data['destination']
        );
    }

    /**
     * Load a resumable download state from a file.
     *
     * @param string $filePath Path to the resume file
     * @return self
     * @throws S3TransferException If the file cannot be read or is invalid
     */
    public static function fromFile(string $filePath): self
    {
        if (!file_exists($filePath)) {
            throw new S3TransferException(
                "Resume file does not exist: $filePath"
            );
        }

        if (!is_readable($filePath)) {
            throw new S3TransferException(
                "Resume file is not readable: $filePath"
            );
        }

        $json = file_get_contents($filePath);
        if ($json === false) {
            throw new S3TransferException(
                "Failed to read resume file: $filePath"
            );
        }

        return self::fromJson($json);
    }

    /**
     * Save the resumable download state to a file.
     * When a file path is not provided by default it will use
     * the `resumeFilePath` property.
     *
     * @param string|null $filePath Path where the resume file should be saved
     */
    public function toFile(?string $filePath = null): void
    {
        $saveFileToPath = $filePath ?? $this->resumeFilePath;
        $json = $this->toJson();
        $result = file_put_contents($saveFileToPath, $json, LOCK_EX);
        if ($result === false) {
            throw new S3TransferException(
                "Failed to write resume file: $saveFileToPath"
            );
        }
    }

    /**
     * @return string
     */
    public function getResumeFilePath(): string
    {
        return $this->resumeFilePath;
    }


    /**
     * @return array
     */
    public function getRequestArgs(): array
    {
        return $this->requestArgs;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @return array
     */
    public function getInitialRequestResult(): array
    {
        return $this->initialRequestResult;
    }

    /**
     * @return array
     */
    public function getCurrentSnapshot(): array
    {
        return $this->currentSnapshot;
    }

    /**
     * @return array
     */
    public function getPartsCompleted(): array
    {
        return $this->partsCompleted;
    }

    /**
     * @return int
     */
    public function getTotalNumberOfParts(): int
    {
        return $this->totalNumberOfParts;
    }

    /**
     * @return string
     */
    public function getTemporaryFile(): string
    {
        return $this->temporaryFile;
    }

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return $this->requestArgs['Bucket'];
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->requestArgs['Key'];
    }

    /**
     * @return string
     */
    public function getETag(): string
    {
        return $this->eTag;
    }

    /**
     * @return int
     */
    public function getObjectSizeInBytes(): int
    {
        return $this->objectSizeInBytes;
    }

    /**
     * @return int
     */
    public function getFixedPartSize(): int
    {
        return $this->fixedPartSize;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * Update the current snapshot.
     *
     * @param array $snapshot The new snapshot data
     */
    public function updateCurrentSnapshot(array $snapshot): void
    {
        $this->currentSnapshot = $snapshot;
    }

    /**
     * Mark a part as completed.
     *
     * @param int $partNumber The part number to mark as completed
     */
    public function markPartCompleted(int $partNumber): void
    {
        $this->partsCompleted[$partNumber] = true;
    }
}
