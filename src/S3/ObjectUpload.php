<?php
namespace Aws\S3;

use GuzzleHttp\Promise\PromisorInterface;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;

class ObjectUpload implements PromisorInterface
{
    private $client;
    private $bucket;
    private $key;
    private $body;
    private $acl;
    private $options;
    private static $defaults = [
        'before_upload' => null,
        'concurrency'   => 3,
        'mup_threshold' => 16777216,
        'params'        => [],
        'part_size'     => null,
    ];

    public function __construct(
        S3ClientInterface $client,
        $bucket,
        $key,
        $body,
        $acl = 'private',
        array $options = []
    ) {
        $this->client = $client;
        $this->bucket = $bucket;
        $this->key = $key;
        $this->body = Psr7\stream_for($body);
        $this->acl = $acl;
        $this->options = array_intersect_key(
            $options + self::$defaults,
            self::$defaults
        );
    }

    public function promise()
    {
        /** @var int $mup_threshold */
        $mup_threshold = $this->options['mup_threshold'];
        if ($this->requiresMultipart($this->body, $mup_threshold)) {
            // Perform a multipart upload.
            $this->options['before_initiate'] = function ($command) {
                foreach ($this->options['params'] as $k => $v) {
                    $command[$k] = $v;
                }
            };
            return (new MultipartUploader($this->client, $this->body, [
                    'bucket' => $this->bucket,
                    'key'    => $this->key,
                    'acl'    => $this->acl
                ] + $this->options))->promise();
        } else {
            // Perform a regular PutObject operation.
            $command = $this->client->getCommand('PutObject', [
                    'Bucket' => $this->bucket,
                    'Key'    => $this->key,
                    'Body'   => $this->body,
                    'ACL'    => $this->acl,
                ] + $this->options['params']);
            if (is_callable($this->options['before_upload'])) {
                $this->options['before_upload']($command);
            }
            return $this->client->executeAsync($command);
        }
    }

    public function upload()
    {
        return $this->promise()->wait();
    }

    /**
     * Determines if the body should be uploaded using PutObject or the
     * Multipart Upload System. It also modifies the passed-in $body as needed
     * to support the upload.
     *
     * @param StreamInterface $body      Stream representing the body.
     * @param integer             $threshold Minimum bytes before using Multipart.
     *
     * @return bool
     */
    private function requiresMultipart(StreamInterface &$body, $threshold)
    {
        // If body size known, compare to threshold to determine if Multipart.
        if ($body->getSize() !== null) {
            return $body->getSize() >= $threshold;
        }

        /**
         * Handle the situation where the body size is unknown.
         * Read up to 5MB into a buffer to determine how to upload the body.
         * @var StreamInterface $buffer
         */
        $buffer = Psr7\stream_for();
        Psr7\copy_to_stream($body, $buffer, MultipartUploader::PART_MIN_SIZE);

        // If body < 5MB, use PutObject with the buffer.
        if ($buffer->getSize() < MultipartUploader::PART_MIN_SIZE) {
            $buffer->seek(0);
            $body = $buffer;
            return false;
        }

        // If body >= 5 MB, then use multipart. [YES]
        if ($body->isSeekable()) {
            // If the body is seekable, just rewind the body.
            $body->seek(0);
        } else {
            // If the body is non-seekable, stitch the rewind the buffer and
            // the partially read body together into one stream. This avoids
            // unnecessary disc usage and does not require seeking on the
            // original stream.
            $buffer->seek(0);
            $body = new Psr7\AppendStream([$buffer, $body]);
        }

        return true;
    }
}
