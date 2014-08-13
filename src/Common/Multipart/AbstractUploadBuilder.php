<?php
namespace Aws\Common\Multipart;

use Aws\AwsClientInterface;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;
use GuzzleHttp\Stream\MetadataStreamInterface;

abstract class AbstractUploadBuilder
{
    /** @var array Set of three parameters required to identify an upload. */
    protected $uploadParams;

    /** @var AwsClientInterface Client used to transfer requests. */
    protected $client;

    /** @var UploadState State of the transfer. */
    protected $state;

    /** @var StreamInterface|MetadataStreamInterface Source of the data. */
    protected $source;

    /** @var int Size, in bytes, of each part. */
    protected $partSize;

    /** @var array Parameters for executed commands. */
    protected $params = [];

    /**
     * Set the client used to connect to the AWS service.
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
     * Set the state of the upload. This is useful for resuming from a
     * previously started multipart upload. It is the responsibility to provide
     * the source that correlates to the provided state.
     *
     * @param UploadState $state Upload state to resume from.
     *
     * @return static
     */
    public function setState(UploadState $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Set the data source of the transfer.
     *
     * @param resource|string|StreamInterface $source Source of the upload.
     *     Pass a string to transfer from a file on disk. You can also stream
     *     from a resource returned from fopen or a Guzzle StreamInterface.
     *
     * @return static
     * @throws \InvalidArgumentException when the source cannot be opened/read.
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

        if (!$this->source->isReadable()) {
            throw new \InvalidArgumentException('Source stream must be readable.');
        }

        return $this;
    }

    /**
     * Set the upload ID of the upload.
     *
     * @param string $uploadId ID of the upload.
     *
     * @return self
     */
    public function setUploadId($uploadId)
    {
        $this->uploadParams[array_keys($this->uploadParams)[2]] = $uploadId;

        return $this;
    }

    /**
     * Set the size of the upload parts.
     *
     * @param int $partSize Part size, in bytes.
     *
     * @return static
     */
    public function setPartSize($partSize)
    {
        $this->partSize = $partSize;

        return $this;
    }

    /**
     * Set additional parameters to be used with the specified command.
     *
     * @param string $commandName Name of the command to set parameters for.
     * @param array  $params      Parameters to include for the command.
     *
     * @return static
     */
    public function setParams($commandName, array $params)
    {
        $this->params[$commandName] = $params;

        return $this;
    }

    /**
     * Set a single additional parameter to be used with the specified command.
     *
     * @param string $commandName Name of the command to set parameters for.
     * @param string $param       Parameter to include for the command.
     * @param mixed  $value       Parameter value
     *
     * @return static
     */
    public function addParam($commandName, $param, $value)
    {
        if (!isset($this->params[$commandName])) {
            $this->params[$commandName] = [];
        }

        $this->params[$commandName][$param] = $value;

        return $this;
    }

    /**
     * Build the uploader based on the provided configuration.
     *
     * @return AbstractUploader
     */
     public function build()
     {
         $this->determineUploadState();

         return $this->createUploader();
     }

    /**
     * Creates an upload state by listing existing parts to assemble a state.
     *
     * @param array $params Parameters used to identify an upload.
     *
     * @return UploadState
     */
    abstract protected function loadStateFromParams(array $params = []);

    /**
     * Creates the service-specific Uploader object.
     *
     * @return AbstractUploader
     */
    abstract protected function createUploader();

    /**
     * Determines the upload state using the provided upload params.
     *
     * @throws \InvalidArgumentException if required upload params not included.
     */
    private function determineUploadState()
    {
        if (!($this->state instanceof UploadState)) {
            // Get the required and uploadId param names.
            $requiredParams = array_keys($this->uploadParams);
            $uploadIdParam = array_pop($requiredParams);

            // Make sure that essential upload params are set.
            foreach ($requiredParams as $param) {
                if (!isset($this->uploadParams[$param])) {
                    throw new \InvalidArgumentException('You must provide an '
                        . $param . ' value to the UploadBuilder.');
                }
            }

            // Create a state from the upload params.
            if (isset($this->uploadParams[$uploadIdParam])) {
                $this->state = $this->loadStateFromParams($this->uploadParams);
                $this->partSize = $this->state->getPartSize();
            } else {
                unset($this->uploadParams[$uploadIdParam]);
                $this->state = new UploadState($this->uploadParams);
            }
        }
    }
}
