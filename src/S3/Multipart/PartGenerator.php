<?php
namespace Aws\S3\Multipart;

use Aws\Common\Multipart\AbstractPartGenerator;
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
    // An S3 upload part can be anywhere from 5 MB to 5 GB
    const MIN_PART_SIZE = 5242880;
    const MAX_PART_SIZE = 5368709120;
    const MAX_PARTS = 10000;

    public function __construct(StreamInterface $source, array $options = [])
    {
        // Ensure calculate_checksums option is set
        if (!isset($options['calculate_checksums'])) {
            $options['calculate_checksums'] = true;
        }

        // Ensure calculate_checksums option is set
        if (!isset($options['checksum_type'])) {
            $options['checksum_type'] = 'md5';
        }

        parent::__construct($source, $options);
    }

    protected function generatePartData()
    {
        // Initialize the array of part data that will be returned.
        $data = ['PartNumber' => $this->key()];

        // Limit what is read from the source to the part size.
        $source = new LimitStream($this->source, $this->partSize, $this->source->tell());

        // Decorate source stream with hashing logic if checksum is desired.
        if ($this->options['calculate_checksums']) {
            $this->enableChecksumCalculation($source, $data);
        }

        // Read from the source to create the body stream.
        $body = Stream\create('');
        Stream\copy_to_stream($source, $body);
        $body->seek(0);
        $data['Body'] = $body;
        $data['ContentLength'] = $body->getSize();

        return $data;
    }

    protected function determinePartSize()
    {
        // Make sure the part size is set.
        $this->partSize = isset($this->options['part_size'])
            ? $this->options['part_size']
            : self::MIN_PART_SIZE;

        // Adjust the part size to be larger for known, x-large uploads.
        if ($sourceSize = $this->source->getSize()) {
            $this->partSize = (int) max(
                $this->partSize,
                ceil($sourceSize / self::MAX_PARTS)
            );
        }

        // Ensure that the part size follows the rules: 5 MB <= size <= 5 GB
        if ($this->partSize < self::MIN_PART_SIZE
            || $this->partSize > self::MAX_PART_SIZE
        ) {
            throw new \InvalidArgumentException('The part size must be no less '
                . 'than 5 MB and not greater than 5 GB.');
        }
    }

    private function enableChecksumCalculation(StreamInterface $stream, array &$data)
    {
        $algorithm = $this->options['checksum_type'];
        $hash = new PhpHash($algorithm, ['base64' => true]);
        $onComplete = function ($result) use (&$data, $algorithm) {
            $data['Content' . strtoupper($algorithm)] = $result;
        };

        return new HashingStream($stream, $hash, $onComplete);
    }
}
