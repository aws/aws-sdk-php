<?php
namespace Aws\Glacier\Multipart;

use Aws\Common\Multipart\AbstractPartGenerator;
use Aws\Glacier\TreeHash;
use GuzzleHttp\Stream;
use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\StreamInterface;
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
        // checksum, ContentSHA256, range, body
        $data = [];
        $firstByte = $this->source->tell();

        // Limit what is read from the source to the part size.
        $source = new LimitStream($this->source, $this->partSize, $this->source->tell());
        $source = self::addHashDecorators($source, $data);

        // Read from the source to create the body stream.
        $body = Stream\create('');
        Stream\copy_to_stream($source, $body);
        $body->seek(0);
        $data['body'] = $body;

        $lastByte = $this->source->tell() - 1;
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

    public static function addHashDecorators(StreamInterface $stream, array &$data)
    {
        $stream = new HashingStream(
            $stream,
            new TreeHash(),
            function ($result) use (&$data) {
                $data['checksum'] = bin2hex($result);
            }
        );

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
