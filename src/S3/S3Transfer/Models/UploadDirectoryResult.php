<?php

namespace Aws\S3\S3Transfer\Models;

final class UploadDirectoryResult
{
    /** @var int */
    private int $objectsUploaded;

    /** @var int */
    private int $objectsFailed;

    /**
     * @param int $objectsUploaded
     * @param int $objectsFailed
     */
    public function __construct(int $objectsUploaded, int $objectsFailed)
    {
        $this->objectsUploaded = $objectsUploaded;
        $this->objectsFailed = $objectsFailed;
    }

    /**
     * @return int
     */
    public function getObjectsUploaded(): int
    {
        return $this->objectsUploaded;
    }

    /**
     * @return int
     */
    public function getObjectsFailed(): int
    {
        return $this->objectsFailed;
    }
}
