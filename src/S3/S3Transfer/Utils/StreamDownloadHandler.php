<?php

namespace Aws\S3\S3Transfer\Utils;

use Aws\S3\S3Transfer\Progress\TransferListener;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;

final class StreamDownloadHandler extends DownloadHandler
{
    /** @var StreamInterface|null */
    private ?StreamInterface $stream;

    /**
     * @param StreamInterface|null $stream
     */
    public function __construct(?StreamInterface $stream = null)
    {
        $this->stream = $stream;
    }

    /**
     * @param array $context
     *
     * @return void
     */
    public function transferInitiated(array $context): void
    {
        if (is_null($this->stream)) {
            $this->stream = Utils::streamFor(
                fopen('php://temp', 'w+')
            );
        } else {
            $this->stream->seek($this->stream->getSize());
        }
    }

    /**
     * @param array $context
     *
     * @return void
     */
    public function bytesTransferred(array $context): void
    {
        $snapshot = $context[TransferListener::PROGRESS_SNAPSHOT_KEY];
        $response = $snapshot->getResponse();
        Utils::copyToStream(
            $response['Body'],
            $this->stream
        );
    }

    /**
     * @param array $context
     *
     * @return void
     */
    public function transferComplete(array $context): void
    {
        $this->stream->rewind();
    }

    /**
     * @param array $context
     *
     * @return void
     */
    public function transferFail(array $context): void
    {
        $this->stream->close();
        $this->stream = null;
    }

    /**
     * @inheritDoc
     *
     * @return StreamInterface
     */
    public function getHandlerResult(): StreamInterface
    {
        return $this->stream;
    }
}
