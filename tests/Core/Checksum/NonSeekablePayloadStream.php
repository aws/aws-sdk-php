<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum;

use Psr\Http\Message\StreamInterface;

/**
 * A forward-only payload stream of unknown size, like a pipe or socket.
 */
final class NonSeekablePayloadStream implements StreamInterface
{
    private int $offset = 0;

    public function __construct(private readonly string $content) {}

    public function __toString(): string
    {
        return $this->getContents();
    }

    public function close(): void {}

    public function detach(): mixed
    {
        return null;
    }

    public function getSize(): ?int
    {
        return null;
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
        $this->seek(0);
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
        $bytes = \substr($this->content, $this->offset, $length);
        $this->offset += \strlen($bytes);

        return $bytes;
    }

    public function getContents(): string
    {
        return $this->read(\strlen($this->content) - $this->offset);
    }

    public function getMetadata(?string $key = null): mixed
    {
        return $key === null ? [] : null;
    }
}
