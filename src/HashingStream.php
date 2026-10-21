<?php
namespace Aws;

use GuzzleHttp\Psr7\StreamDecoratorTrait;
use Psr\Http\Message\StreamInterface;

/**
 * Stream decorator that calculates a rolling hash of the stream as it is read.
 */
class HashingStream implements StreamInterface
{
    use StreamDecoratorTrait;

    /** @var StreamInterface */
    private $stream;

    /** @var HashInterface */
    private $hash;

    /** @var callable|null */
    private $callback;

    /** @var bool */
    private $complete = false;

    /** @var \Throwable|null */
    private $completionException;

    /**
     * @param StreamInterface $stream     Stream that is being read.
     * @param HashInterface   $hash       Hash used to calculate checksum.
     * @param callable        $onComplete Optional function invoked when the
     *                                    hash calculation is completed.
     */
    public function __construct(
        StreamInterface $stream,
        HashInterface $hash,
        ?callable $onComplete = null
    ) {
        $this->stream = $stream;
        $this->hash = $hash;
        $this->callback = $onComplete;
    }

    public function read($length): string
    {
        if ($this->completionException !== null) {
            throw $this->completionException;
        }

        $data = $this->stream->read($length);

        if (!$this->complete) {
            $this->hash->update($data);
        }

        if (!$this->complete && $this->eof()) {
            $this->complete = true;
            try {
                $result = $this->hash->complete();
                if ($this->callback) {
                    call_user_func($this->callback, $result);
                }
            } catch (\Throwable $e) {
                $this->completionException = $e;
                throw $e;
            }
        }

        return $data;
    }

    public function seek($offset, $whence = SEEK_SET): void
    {
        // Seeking arbitrarily is not supported.
        if ($offset !== 0) {
            return;
        }

        $this->stream->seek($offset);
        $this->hash->reset();
        $this->complete = false;
        $this->completionException = null;
    }
}
