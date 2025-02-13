<?php

namespace Aws\S3\Features\S3Transfer;

use Psr\Http\Message\StreamInterface;

class DownloadResult
{
    public function __construct(
        private readonly StreamInterface $content,
        private readonly array $metadata = []
    ) {}

    public function getContent(): StreamInterface
    {
        return $this->content;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }
}