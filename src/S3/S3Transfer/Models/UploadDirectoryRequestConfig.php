<?php

namespace Aws\S3\S3Transfer\Models;

use Closure;

class UploadDirectoryRequestConfig extends TransferRequestConfig
{
    /** @var bool */
    private bool $followSymbolicLinks;

    /** @var bool */
    private bool $recursive;

    /** @var string|null */
    private ?string $s3Prefix;

    /** @var Closure|null */
    private ?Closure $filter;

    /** @var string */
    private string $s3Delimiter;

    /** @var Closure|null */
    private ?Closure $putObjectRequestCallback;

    /** @var Closure|null */
    private ?Closure $failurePolicy;

    /**
     * @param bool $followSymbolicLinks
     * @param bool $recursive
     * @param string|null $s3Prefix
     * @param Closure|null $filter
     * @param string $s3Delimiter
     * @param Closure|null $failurePolicy
     * @param bool $trackProgress
     */
    public function __construct(
        bool $followSymbolicLinks = false,
        bool $recursive = false,
        ?string $s3Prefix = null,
        ?Closure $filter = null,
        string $s3Delimiter = '/',
        ?Closure $putObjectRequestCallback = null,
        ?Closure $failurePolicy = null,
        bool $trackProgress = false
    ) {
        parent::__construct($trackProgress);
        $this->followSymbolicLinks = $followSymbolicLinks;
        $this->recursive = $recursive;
        $this->s3Prefix = $s3Prefix;
        $this->filter = $filter;
        $this->s3Delimiter = $s3Delimiter;
        $this->putObjectRequestCallback = $putObjectRequestCallback;
        $this->failurePolicy = $failurePolicy;
    }

    /*
     * @param array $config The config options for this request that are:
     * - follow_symbolic_links: (bool, optional, defaulted to false)
     * - recursive: (bool, optional, defaulted to false)
     * - s3_prefix: (string, optional, defaulted to null)
     * - filter: (Closure(SplFileInfo|string), optional)
     *   By default an instance of SplFileInfo will be provided, however
     *   you can annotate the parameter with a string type and by doing
     *   so you will get the full path of the file.
     * - s3_delimiter: (string, optional, defaulted to `/`)
     * - put_object_request_callback: (Closure, optional) A callback function
     *   to be invoked right before the request initiates and that will receive
     *   as parameter the request arguments for each upload request.
     * - failure_policy: (Closure, optional) A function that will be invoked
     *   on an upload failure and that will receive as parameters:
     *   - $requestArgs: (array) The arguments for the request that originated
     *        the failure.
     *   - $uploadDirectoryRequestArgs: (array) The arguments for the upload
     *     directory request.
     *   - $reason: (Throwable) The exception that originated the request failure.
     *   - $uploadDirectoryResponse: (UploadDirectoryResponse) The upload response
     *     to that point in the upload process.
     * - track_progress: (bool, optional) To override the default option for
     *   enabling progress tracking. If this option is resolved as true and
     *   a progressTracker parameter is not provided then, a default implementation
     *   will be resolved.
     */
    public static function fromArray(array $array): UploadDirectoryRequestConfig {
        return new self(
            $array['follow_symbolic_links'] ?? false,
            $array['recursive'] ?? false,
            $array['s3_prefix'] ?? null,
            $array['filter'] ?? null,
            $array['s3_delimiter'] ?? '/',
            $array['failure_policy'] ?? null,
            $array['track_progress'] ?? false
        );
    }

    /**
     * @return bool
     */
    public function isFollowSymbolicLinks(): bool
    {
        return $this->followSymbolicLinks;
    }

    /**
     * @return bool
     */
    public function isRecursive(): bool
    {
        return $this->recursive;
    }

    /**
     * @return string|null
     */
    public function getS3Prefix(): ?string
    {
        return $this->s3Prefix;
    }

    /**
     * @return Closure|null
     */
    public function getFilter(): ?Closure
    {
        return $this->filter;
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
    public function getPutObjectRequestCallback(): ?Closure {
        return $this->putObjectRequestCallback;
    }

    /**
     * @return Closure|null
     */
    public function getFailurePolicy(): ?Closure
    {
        return $this->failurePolicy;
    }

    /**
     * @return array
     */
    public function toArray(): array {
        return [
            'follow_symbolic_links' => $this->followSymbolicLinks,
            'recursive' => $this->recursive,
            's3_prefix' => $this->s3Prefix,
            'filter' => $this->filter,
            's3_delimiter' => $this->s3Delimiter,
            'failure_policy' => $this->failurePolicy,
            'track_progress' => $this->trackProgress,
        ];
    }
}