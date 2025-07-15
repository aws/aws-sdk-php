<?php

namespace Aws\S3\S3Transfer\Models;

use Closure;

class DownloadDirectoryRequestConfig extends TransferRequestConfig
{
    /** @var string|null */
    private ?string $s3Prefix;

    /** @var string */
    private string $s3Delimiter;

    /** @var Closure|null */
    private ?Closure $filter;

    /** @var Closure|null */
    private ?Closure $getObjectRequestCallback;

    /** @var Closure|null */
    private ?Closure $failurePolicy;

    /** @var int|null */
    private ?int $targetPartSizeBytes;

    /** @var array */
    private array $listObjectV2Args;

    /** @var bool */
    private bool $failsWhenDestinationExists;

    /**
     * @param string|null $s3Prefix
     * @param string $s3Delimiter
     * @param Closure|null $filter
     * @param Closure|null $getObjectRequestCallback
     * @param Closure|null $failurePolicy
     * @param int|null $targetPartSizeBytes
     * @param array $listObjectV2Args
     * @param bool $failsWhenDestinationExists
     * @param bool|null $trackProgress
     */
    public function __construct(
        ?string  $s3Prefix = null,
        string   $s3Delimiter = '/',
        ?Closure $filter = null,
        ?Closure $getObjectRequestCallback = null,
        ?Closure $failurePolicy = null,
        ?int     $targetPartSizeBytes = null,
        array    $listObjectV2Args = [],
        bool      $failsWhenDestinationExists = false,
        ?bool    $trackProgress = null
    ) {
        parent::__construct($trackProgress);
        $this->s3Prefix = $s3Prefix;
        $this->s3Delimiter = $s3Delimiter;
        $this->filter = $filter;
        $this->getObjectRequestCallback = $getObjectRequestCallback;
        $this->failurePolicy = $failurePolicy;
        $this->trackProgress = $trackProgress;
        $this->targetPartSizeBytes = $targetPartSizeBytes;
        $this->listObjectV2Args = $listObjectV2Args;
        $this->failsWhenDestinationExists = $failsWhenDestinationExists;
    }

    /**
     * @param array $config
     * @return DownloadDirectoryRequestConfig
     */
    public static function fromArray(array $config): DownloadDirectoryRequestConfig
    {
        return new self(
            s3Prefix: $config['s3_prefix'] ?? null,
            s3Delimiter: $config['s3_delimiter'] ?? '/',
            filter: $config['filter'] ?? null,
            getObjectRequestCallback: $config['get_object_request_callback'] ?? null,
            failurePolicy: $config['failure_policy'] ?? null,
            targetPartSizeBytes: $config['target_part_size_bytes'] ?? null,
            listObjectV2Args: $config['list_object_v2_args'] ?? [],
            failsWhenDestinationExists: $config['fails_when_destination_exists'] ?? false,
            trackProgress: $config['track_progress'] ?? null
        );
    }

    /**
     * @return string|null
     */
    public function getS3Prefix(): ?string
    {
        return $this->s3Prefix;
    }

    /**
     * @return string
     */
    public function getS3Delimiter(): string
    {
        return $this->s3Delimiter;
    }

    /**
     * @return Closure|null
     */
    public function getFilter(): ?Closure
    {
        return $this->filter;
    }

    /**
     * @return Closure|null
     */
    public function getGetObjectRequestCallback(): ?Closure
    {
        return $this->getObjectRequestCallback;
    }

    /**
     * @return Closure|null
     */
    public function getFailurePolicy(): ?Closure
    {
        return $this->failurePolicy;
    }

    /**
     * @return int|null
     */
    public function getTargetPartSizeBytes(): ?int
    {
        return $this->targetPartSizeBytes;
    }

    /**
     * @return array
     */
    public function getListObjectV2Args(): array
    {
        return $this->listObjectV2Args;
    }


    /**
     * @return string|null
     */
    public function getEffectivePrefix(): ?string
    {
        return $this->listObjectV2Args['Prefix'] ?? $this->s3Prefix;
    }

    /**
     * @return string
     */
    public function getEffectiveDelimiter(): string
    {
        return $this->listObjectV2Args['Delimiter'] ?? $this->s3Delimiter;
    }

    /**
     * @return bool
     */
    public function isFailsWhenDestinationExists(): bool
    {
        return $this->failsWhenDestinationExists;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            's3_prefix' => $this->s3Prefix,
            's3_delimiter' => $this->s3Delimiter,
            'filter' => $this->filter,
            'get_object_request_callback' => $this->getObjectRequestCallback,
            'failure_policy' => $this->failurePolicy,
            'track_progress' => $this->trackProgress,
            'target_part_size_bytes' => $this->targetPartSizeBytes,
            'list_object_v2_args' => $this->listObjectV2Args,
            'fails_when_destination_exists' => $this->failsWhenDestinationExists,
        ];
    }
}
