<?php
namespace Aws\S3;

use Aws\Result;
use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;

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
     * @param S3Client $client Client to use when executing requests
     * @param string   $bucket Bucket that holds the object
     * @param string   $key    Key of the object
     * @param mixed    $target Where the object should be downloaded to. Pass a
     *                         string to save the object to a file, pass a
     *                         resource returned by fopen() to save the object
     *                         to a stream resource, or pass a StreamInterface
     *                         object to save the contents to a stream.
     * @param array    $params Any additional GetObject or HeadObject
     *                         parameters to use with each command issued by
     *                         the client. (e.g. pass "Version" to download a
     *                         specific version of an object)
     *
     * @throws \RuntimeException if the target variable points to a file that
     *                           cannot be opened
     */
    public function __construct(
        S3Client $client,
        $bucket,
        $key,
        $target,
        array $params = []
    ) {
        $this->params = $params;
        $this->client = $client;
        $this->params['Bucket'] = $bucket;
        $this->params['Key'] = $key;

        // If a string is passed, then assume that the download should stream
        // to a file on disk.
        if (is_string($target)) {
            $target = fopen($target, 'a+');
            if (!$target) {
                throw new \RuntimeException("Unable to open {$target} for "
                    . "writing " . error_get_last()['message']);
            }
            // Always append to the file
            fseek($target, 0, SEEK_END);
        }

        // Get the metadata and Content-MD5 of the object
        $this->target = Stream::factory($target);
    }

    /**
     * Download the remainder of the object from Amazon S3
     *
     * Performs a message integrity check if possible
     *
     * @return Result
     */
    public function transfer()
    {
        $command = $this->client->getCommand('HeadObject', $this->params);
        $this->meta = $this->client->execute($command);

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
     * @deprecated
     */
    public function __invoke()
    {
        return $this->transfer();
    }

    /**
     * Get the bucket of the download
     *
     * @return string
     */
    public function getBucket()
    {
        return $this->params['Bucket'];
    }

    /**
     * Get the key of the download
     *
     * @return string
     */
    public function getKey()
    {
        return $this->params['Key'];
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
        $command = $this->client->getCommand('GetObject', $this->params);

        return $this->client->execute($command);
    }

    /**
     * Performs an MD5 message integrity check if possible
     *
     * @throws \UnexpectedValueException if the message does not validate
     */
    private function checkIntegrity()
    {
        if (!$this->target->isReadable() || !$this->meta['ContentMD5']) {
            return;
        }

        $actual = $this->target->getContentMd5();

        if ($actual != $this->meta['ContentMD5']) {
            throw new \UnexpectedValueException("Message integrity check "
                . "failed. Expected {$this->meta['ContentMD5']} but got "
                . "{$actual}.");
        }
    }
}
