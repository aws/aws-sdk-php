<?php
namespace Aws\Common\Multipart;

use Aws\AwsClientInterface;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;

/**
 * Easily create a multipart uploader used to quickly and reliably upload a
 * large file or data stream to Amazon S3 using multipart uploads
 */
abstract class AbstractUploadBuilder
{
    /**
     * @var AwsClientInterface Client used to transfer requests
     */
    protected $client;

    /**
     * @var AbstractTransferState State of the transfer
     */
    protected $state;

    /**
     * @var StreamInterface Source of the data
     */
    protected $source;

    /**
     * @var int Concurrency level to transfer the parts
     */
    protected $concurrency = 1;

    /**
     * @var int Size of upload parts
     */
    protected $partSize;

    /**
     * @var array Array of headers to set on the object
     */
    protected $headers = [];

    /**
     * Set the client used to connect to the AWS service
     *
     * @param AwsClientInterface $client Client to use
     *
     * @return static
     */
    public function setClient(AwsClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Set the state of the upload. This is useful for resuming from a previously started multipart upload.
     * You must use a local file stream as the data source if you wish to resume from a previous upload.
     *
     * @param AbstractTransferState|string $state Pass a TransferStateInterface object or the ID of the initiated
     *                                             multipart upload. When an ID is passed, the builder will create a
     *                                             state object using the data from a ListParts API response.
     *
     * @return static
     */
    public function resumeFrom($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Set the data source of the transfer
     *
     * @param resource|string|StreamInterface $source Source of the transfer. Pass a string to transfer from a file on disk.
     *                                           You can also stream from a resource returned from fopen or a Guzzle
     *                                           {@see EntityBody} object.
     *
     * @return static
     * @throws \InvalidArgumentException when the source cannot be found or opened
     */
    public function setSource($source)
    {
        // Use the contents of a file as the data source
        if (is_string($source)) {
            if (!file_exists($source)) {
                throw new \InvalidArgumentException("File does not exist: {$source}");
            }
            // Clear the cache so that we send accurate file sizes
            clearstatcache(true, $source);
            $source = fopen($source, 'r');
        }

        $this->source = Stream::factory($source);

        if ($this->source->isSeekable() && $this->source->getSize() == 0) {
            throw new \InvalidArgumentException('Empty body provided to upload builder');
        }

        return $this;
    }

    /**
     * Set the upload part size
     *
     * @param int $partSize Upload part size
     *
     * @return self
     */
    public function setPartSize($partSize)
    {
        $this->partSize = (int) $partSize;

        return $this;
    }

    /**
     * Set the concurrency level to use when uploading parts. This affects how
     * many parts are uploaded in parallel. You must use a local file as your
     * data source when using a concurrency greater than 1.
     *
     * @param int $concurrency Concurrency level
     *
     * @return self
     */
    public function setConcurrency($concurrency)
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    /**
     * Specify the headers to set on the upload
     *
     * @param array $headers Headers to add to the uploaded object
     *
     * @return static
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Build the appropriate uploader based on the builder options
     *
     * @return AbstractTransfer
     */
    abstract public function build();

    /**
     * Initiate the multipart upload
     *
     * @return AbstractTransferState
     */
    abstract protected function initiateMultipartUpload();
}
