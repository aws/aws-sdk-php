<?php

namespace Aws\S3\S3Transfer\Models;

class DownloadDirectoryResponse
{
    /** @var int */
    private int $objectsDownloaded;

    /** @var int */
    private int $objectsFailed;

    /**
     * @param int $objectsUploaded
     * @param int $objectsFailed
     */
    public function __construct(int $objectsUploaded, int $objectsFailed)
    {
        $this->objectsDownloaded = $objectsUploaded;
        $this->objectsFailed = $objectsFailed;
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

    public function __toString(): string
    {
        return sprintf(
            "DownloadDirectoryResponse: %d objects downloaded, %d objects failed",
            $this->objectsDownloaded,
            $this->objectsFailed
        );
    }
}