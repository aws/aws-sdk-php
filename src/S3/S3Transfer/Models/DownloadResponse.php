<?php

namespace Aws\S3\S3Transfer\Models;

class DownloadResponse
{
    /**
     * @param mixed $downloadDataResult
     * @param array $downloadResponse
     */
    public function __construct(
        private readonly mixed $downloadDataResult,
        private readonly array           $downloadResponse = []
    ) {}

    /**
     * @return mixed
     */
    public function getDownloadDataResult(): mixed
    {
        return $this->downloadDataResult;
    }

    /**
     * @return array
     */
    public function getDownloadResponse(): array
    {
        return $this->downloadResponse;
    }
}