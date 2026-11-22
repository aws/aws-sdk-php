<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Utils;

use Psr\Http\Message\StreamInterface;

/**
 * Readable stream that cannot seek or rewind.
 */
final class NonSeekableTestStream implements StreamInterface
{
    private int $offset = 0;

    public function __construct(private readonly string $content) {}

    public function __toString(): string
    {
        return \substr($this->content, $this->offset);
    }

    public function close(): void {}

    public function detach()
    {
        return null;
    }

    public function getSize(): ?int
    {
        return \strlen($this->content);
    }

    public function tell(): int
    {
        return $this->offset;
    }

    public function eof(): bool
    {
        return $this->offset >= \strlen($this->content);
    }

    public function isSeekable(): bool
    {
        return false;
    }

    public function seek(int $offset, int $whence = SEEK_SET): void
    {
        throw new \RuntimeException('Stream is not seekable.');
    }

    public function rewind(): void
    {
        throw new \RuntimeException('Stream is not seekable.');
    }

    public function isWritable(): bool
    {
        return false;
    }

    public function write(string $string): int
    {
        throw new \RuntimeException('Stream is not writable.');
    }

    public function isReadable(): bool
    {
        return true;
    }

    public function read(int $length): string
    {
        $chunk = \substr($this->content, $this->offset, $length);
        $this->offset += \strlen($chunk);

        return $chunk;
    }

    public function getContents(): string
    {
        $contents = \substr($this->content, $this->offset);
        $this->offset = \strlen($this->content);

        return $contents;
    }

    public function getMetadata(?string $key = null)
    {
        return $key === null ? [] : null;
    }
}
