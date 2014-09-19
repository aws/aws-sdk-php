<?php
namespace Aws\S3;

use Aws\Result;
use GuzzleHttp\Collection;
use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;
use GuzzleHttp\Stream\Utils;

/**
 * Allows you to resume the download of a partially downloaded object.
 *
 * Downloads objects from Amazon S3 in using "Range" downloads. This allows a
 * partially downloaded object to be resumed so that only the remaining portion
 * of the object is downloaded.
 */
class ResumableDownload
{
    /** @var S3Client */
    private $client;

    /** @var \Aws\Result HeadObject operation result */
    private $meta;

    /** @var array Array of parameters to pass to a GetObject operation */
    private $params;

    /** @var StreamInterface */
    private $target;

    /**
     * Accepts an associative array of the following options. Each option is
     * required.
     *
     * - client: The Amazon S3 client to use to download the object
     * - target: Where the object should be downloaded to. Pass a string to
     *   save the object to a file, pass a resource returned by fopen() to save
     *   the object to a stream resource, or pass a StreamInterface object to
     *   save the contents to a stream.
     * - params: Associative array of GetObject operation parameters, including
     *   the required Key and Bucket key value pairs.
     *
     * @param array $config Associative array of configuration data.
     *
     * @throws \RuntimeException if the target variable points to a file that
     *                           cannot be opened
     */
    public function __construct(array $config)
    {
        $config = Collection::fromConfig(
            $config, [], ['client', 'target', 'params']
        );

        $this->params = $config['params'];
        $this->client = $config['client'];
        $this->target = $config['target'];

        // If a string is passed, then assume that the download should stream
        // to a file on disk.
        if (is_string($this->target)) {
            $this->target = Utils::open($this->target, 'a+');
            fseek($this->target, 0, SEEK_END);
        }

        // Get the metadata and Content-MD5 of the object
        $this->target = Stream::factory($this->target);
    }

    /**
     * Download the remainder of the object from Amazon S3.
     *
     * @return Result|bool Returns false if the file does not need to be
     *                     downloaded or returns a Result object of a GetObject
     *                     operation if the file was downloaded.
     */
    public function __invoke()
    {
        $this->meta = $this->client->headObject($this->params);

        if ($this->target->tell() >= $this->meta['ContentLength']) {
            return false;
        }

        // Use a ReadLimitEntityBody so that rewinding the stream after an
        // error does not cause the file pointer to enter an inconsistent state
        // with the data being downloaded.
        $this->params['SaveAs'] = new LimitStream(
            $this->target,
            $this->meta['ContentLength'],
            $this->target->tell()
        );

        $result = $this->getRemaining();
        $this->checkIntegrity();

        return $result;
    }

    /**
     * @see __invoke
     */
    public function transfer()
    {
        return $this();
    }

    /**
     * Send the command to get the remainder of the object
     *
     * @return Result
     */
    private function getRemaining()
    {
        $current = $this->target->tell();
        $targetByte = $this->meta['ContentLength'] - 1;
        $this->params['Range'] = "bytes={$current}-{$targetByte}";
        // Set the starting offset so that the body is never seeked to before
        // this point in the event of a retry.
        $this->params['SaveAs']->setOffset($current);

        return $this->client->getObject($this->params);
    }

    /**
     * Performs an MD5 message integrity check if possible
     *
     * @throws \UnexpectedValueException if the message does not validate
     */
    private function checkIntegrity()
    {
        $etag = trim($this->meta['ETag'], '" ');

        if (!$this->target->isReadable() ||
            !$etag ||
            !preg_match('/^[0-9a-f]+$/', $etag)) {
            return;
        }

        $actual = Utils::hash($this->target, 'md5');

        if ($actual !== $etag) {
            throw new \UnexpectedValueException("Message integrity check "
                . "failed. Expected $etag but got $actual.");
        }
    }
}
