<?php

namespace Aws\S3\S3Transfer\Models;

use Psr\Http\Message\StreamInterface;

class DownloadResponse
{
    /**
     * @param StreamInterface $data
     * @param array $metadata
     */
    public function __construct(
        private readonly StreamInterface $data,
        private readonly array           $metadata = []
    ) {}

    /**
     * @return StreamInterface
     */
    public function getData(): StreamInterface
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }
}