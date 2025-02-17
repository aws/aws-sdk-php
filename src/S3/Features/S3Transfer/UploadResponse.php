<?php

namespace Aws\S3\Features\S3Transfer;

class UploadResponse
{
    private array $uploadResponse;

    /**
     * @param array $uploadResponse
     */
    public function __construct(array $uploadResponse)
    {
        $this->uploadResponse = $uploadResponse;
    }

    public function getUploadResponse(): array
    {
        return $this->uploadResponse;
    }
}