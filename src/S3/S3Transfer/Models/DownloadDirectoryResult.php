<?php

namespace Aws\S3\S3Transfer\Models;

final class DownloadDirectoryResult
{
    /** @var int */
    private int $objectsDownloaded;

    /** @var int */
    private int $objectsFailed;

    /** @var array */
    private array $reasons;

    /**
     * @param int $objectsDownloaded
     * @param int $objectsFailed
     * @param array $reasons
     */
    public function __construct(
        int $objectsDownloaded,
        int $objectsFailed,
        array $reasons = []
    ) {
        $this->objectsDownloaded = $objectsDownloaded;
        $this->objectsFailed = $objectsFailed;
        $this->reasons = $reasons;
    }

    /**
     * @return int
     */
    public function getObjectsDownloaded(): int
    {
        return $this->objectsDownloaded;
    }

    /**
     * @return int
     */
    public function getObjectsFailed(): int
    {
        return $this->objectsFailed;
    }

    /**
     * @return array
     */
    public function getReasons(): array
    {
        return $this->reasons;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            "DownloadDirectoryResult: %d objects downloaded, %d objects failed",
            $this->objectsDownloaded,
            $this->objectsFailed
        );
    }
}
