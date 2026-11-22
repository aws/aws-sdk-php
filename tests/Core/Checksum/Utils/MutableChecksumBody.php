<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum\Utils;

use Smithy\Http\Message\RequestStreamInterface;

/**
 * Replayable request body whose content a test can change between attempts.
 */
final class MutableChecksumBody implements RequestStreamInterface
{
    public int $hashCount = 0;
    private int $position = 0;

    public function __construct(public string $content) {}

    public function __toString(): string
    {
        return $this->content;
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

    public function length(): ?int
    {
        return $this->getSize();
    }

    public function tell(): int
    {
        return $this->position;
    }

    public function eof(): bool
    {
        return $this->position >= \strlen($this->content);
    }

    public function isSeekable(): bool
    {
        return true;
    }

    public function seek(int $offset, int $whence = SEEK_SET): void
    {
        $this->position = match ($whence) {
            SEEK_SET => $offset,
            SEEK_CUR => $this->position + $offset,
            SEEK_END => \strlen($this->content) + $offset,
            default => throw new \InvalidArgumentException(
                'Invalid seek mode.'
            ),
        };
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function rewindForRetry(): void
    {
        $this->rewind();
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
        $chunk = \substr($this->content, $this->position, $length);
        $this->position += \strlen($chunk);

        return $chunk;
    }

    public function getContents(): string
    {
        return $this->read(\strlen($this->content) - $this->position);
    }

    public function getMetadata(?string $key = null)
    {
        return $key === null ? [] : null;
    }

    public function hash(string $algo = 'sha256', bool $raw = false): string
    {
        ++$this->hashCount;

        return \hash($algo, $this->content, $raw);
    }

    public function isReplayable(): bool
    {
        return true;
    }

    public function isAvailable(): bool
    {
        return true;
    }

    public function started(): bool
    {
        return $this->position > 0;
    }

    public function fullyConsumed(): bool
    {
        return $this->eof();
    }
}
