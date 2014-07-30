<?php
namespace Aws\S3\Multipart;

use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\Stream;

/**
 * Transfers multipart upload parts serially
 */
class SerialTransfer extends AbstractTransfer
{
    protected function transfer()
    {
        while (!$this->stopped && !$this->source->eof()) {

            if ($this->source->getSize() && $this->source->isSeekable()) {
                // If the stream is seekable and the Content-Length known, then stream from the data source
                $body = new LimitStream($this->source, $this->partSize, $this->source->tell());
            } else {
                // We need to read the data source into a temporary buffer before streaming
                $body = Stream::factory();
                while ($body->getSize() < $this->partSize
                    && $body->write(
                        $this->source->read(max(1, min(10 * 1024, $this->partSize - $body->getSize())))
                    ));
            }

            // @codeCoverageIgnoreStart
            if ($body->getSize() == 0) {
                break;
            }
            // @codeCoverageIgnoreEnd

            $partNumber = count($this->state) + 1;
            $command = $this->client->getCommand('UploadPart', [
                'PartNumber' => $partNumber,
                'Body'       => $body,
            ] + $this->state->getUploadId()->toParams());

            $result = $this->client->execute($command);

            $this->state->addPart(UploadPart::fromArray(array(
                'PartNumber'   => $partNumber,
                'ETag'         => $result['ETag'],
                'Size'         => $body->getSize(),
                'LastModified' => gmdate(\DateTime::RFC2822)
            )));
        }
    }
}
