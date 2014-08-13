<?php
namespace Aws\Glacier\Multipart;

use Aws\Common\Multipart\AbstractPartGenerator;
use Aws\Glacier\TreeHash;
use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;
use GuzzleHttp\Stream\Utils;
use GuzzleHttp\Subscriber\MessageIntegrity\PhpHash;
use GuzzleHttp\Subscriber\MessageIntegrity\HashingStream;

/**
 * Generates data/params needed to make S3 multipart upload requests.
 */
class PartGenerator extends AbstractPartGenerator
{
    // An Glacier upload part can be anywhere from 1 MB to 4 GB
    const MIN_PART_SIZE = 1048576;
    const MAX_PART_SIZE = 4294967296;
    const MAX_PARTS = 10000;

    protected function generatePartData()
    {
        $data = [];
        $firstByte = $this->getOffset();

        // Read from the source to create the body stream. This also calculates
        // the linear and tree hashes as the data is read.
        if ($this->seekableSource) {
            // Case 1: Stream is seekable, can make stream from new handle.
            $body = Utils::open($this->source->getMetadata('uri'), 'r');
            $body = new LimitStream(
                Stream::factory($body),
                $this->partSize,
                $this->getOffset()
            );
            // Decorate the body with hashing streams and read through it. The
            // body should be returned without the hashing streams though, so it
            // is not hashed again when it is read for sending.
            $decoratedBody = $this->addHashingDecorators($body, $data);
            while (!$decoratedBody->eof()) $decoratedBody->read(1048576);
            $this->advanceOffset();
        } else {
            // Case 2: Stream is not seekable, must store part in temp stream.
            $source = new LimitStream(
                $this->source,
                $this->partSize,
                $this->getOffset()
            );
            $source = $this->addHashingDecorators($source, $data);
            $body = Stream::factory();
            Utils::copyToStream($source, $body);
        }

        $body->seek(0);
        $data['body'] = $body;
        $lastByte = $this->getOffset() - 1;
        $data['range'] = "bytes {$firstByte}-{$lastByte}/*";

        return $data;
    }

    protected function determinePartSize()
    {
        // Make sure the part size is set.
        $this->partSize = isset($this->options['part_size'])
            ? $this->options['part_size']
            : self::MIN_PART_SIZE;

        // Calculate list of valid part sizes.
        static $validSizes;
        if (!$validSizes) {
            $validSizes = array_map(function ($n) {
                return pow(2, $n) * self::MIN_PART_SIZE;
            }, range(0, 12));
        }

        // Ensure that the part size is valid.
        if (!in_array($this->partSize, $validSizes)) {
            throw new \InvalidArgumentException('The part size must be a power '
                . 'of 2, in megabytes, such that 1 MB <= PART_SIZE <= 4 GB.');
        }
    }

    private function addHashingDecorators(StreamInterface $stream, array &$data)
    {
        // Limit what is read from the source to the part size.
        $stream = new LimitStream($stream, $this->partSize, $this->getOffset());

        // Make sure that a tree hash is calculated.
        $stream = new HashingStream(
            $stream,
            new TreeHash(),
            function ($result) use (&$data) {
                $data['checksum'] = bin2hex($result);
            }
        );

        // Make sure that a linear SHA256 hash is calculated.
        $stream = new HashingStream(
            $stream,
            new PhpHash('sha256'),
            function ($result) use (&$data) {
                $data['ContentSHA256'] = bin2hex($result);
            }
        );

        return $stream;
    }
}
