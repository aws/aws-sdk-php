<?php
namespace Aws\Multipart;

use Aws\AwsClientInterface;
use GuzzleHttp\Psr7\LimitStream;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\StreamableInterface;

/**
 * Base class for the service-specific UploadBuilders
 *
 * @internal
 */
abstract class AbstractUploadBuilder
{
    /** @var array Set of three parameters required to identify an upload. */
    protected $uploadId = [];

    /** @var AwsClientInterface Client used to transfer requests. */
    protected $client;

    /** @var UploadState State of the transfer. */
    protected $state;

    /** @var StreamableInterface Source of the data. */
    protected $source;

    /** @var int Size, in bytes, of each part. */
    protected $specifiedPartSize;

    /** @var array Service-specific configuration for uploader. */
    protected $config = [];

    /**
     * Sets up an empty upload identity.
     */
    public function __construct()
    {
        foreach ($this->config['id'] as $param) {
            $this->uploadId[$param] = null;
        }
    }

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
     * @param resource|string|StreamableInterface $source Source of the upload.
     *     Pass a string to transfer from a file on disk. You can also stream
     *     from a resource returned from fopen or a Guzzle StreamableInterface.
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
     * Set the size of the upload parts.
     *
     * @param int $partSize Part size, in bytes.
     *
     * @return static
     */
    public function setPartSize($partSize)
    {
        $this->specifiedPartSize = $partSize;

        return $this;
    }

    /**
     * Set additional parameters to be used with an operation.
     *
     * @param string $operation Operation type to add parameters to. Should be
     *                          "initiate", "upload", "complete", or "abort".
     * @param array $params     Parameters to include for the operation.
     *
     * @return static
     */
    public function addParams($operation, array $params)
    {
        foreach ($params as $key => $value) {
            $this->config[$operation]['params'][$key] = $value;
        }

        return $this;
    }

    /**
     * Build the uploader based on the provided configuration.
     *
     * @return Uploader
     */
    public function build()
    {
        // Determine the state, including the part size.
        $this->determineUploadState();

        // Prepare the parameters.
        $this->prepareParams();

        // Prepare the config.
        $this->config['fn'] = [
            'complete' => $this->getCompleteParamsFn(),
            'result'   => $this->getResultHandlerFn()
        ];

        // Create an uploader object to encapsulate this upload.
        return new Uploader(
            $this->client,
            $this->state,
            $this->getPartGenerator($this->getCreatePartFn()),
            $this->config
        );
    }

    /**
     * Create a stream for a part that starts at the current position and
     * has a length of the upload part size (or less with the final part).
     *
     * @param StreamableInterface $stream
     *
     * @return LimitStream
     */
    protected function limitPartStream(StreamableInterface $stream)
    {
        // Limit what is read from the stream to the part size.
        return new LimitStream(
            $stream,
            $this->state->getPartSize(),
            $this->source->tell()
        );
    }

    /**
     * Creates an upload state by listing existing parts to assemble a state.
     *
     * @param array $params Parameters used to identify an upload.
     *
     * @return UploadState
     */
    abstract protected function loadStateByUploadId(array $params = []);

    /**
     * Performs service-specific logic to prepare parameters.
     */
    abstract protected function prepareParams();

    /**
     * Determines the part size to use for upload parts.
     *
     * Examines the provided partSize value and the source to determine the
     * best possible part size.
     *
     * @throws \InvalidArgumentException if the part size is invalid.
     *
     * @return int
     */
    abstract protected function determinePartSize();

    /**
     * Creates a function used to generate an upload part's parameters.
     *
     * This function callable passed into PartGenerator and must analyze a range
     * of the source starting from the current offset up to the part size to
     * create a set of parameters that will be required to create an upload part
     * command. This should include a seekable stream, representing the analyzed
     * range, that will will be sent as the body.
     *
     * @return callable
     */
    abstract protected function getCreatePartFn();

    /**
     * Creates a service-specific callback function for getting the command
     * params for completing a multipart upload.
     *
     * @return callable
     */
    abstract protected function getCompleteParamsFn();

    /**
     * Creates a service-specific callback function that uses information from
     * the Command and Result to determine which part was uploaded and mark it
     * as uploaded in the upload's state.
     *
     * @return callable
     */
    abstract protected function getResultHandlerFn();

    /**
     * Determines the upload state using the provided upload params.
     *
     * @throws \InvalidArgumentException if required upload params not included.
     */
    private function determineUploadState()
    {
        if (!($this->state instanceof UploadState)) {
            // Get the required and uploadId param names.
            $requiredParams = $this->config['id'];
            $uploadIdParam = array_pop($requiredParams);

            // Make sure that essential upload params are set.
            foreach ($requiredParams as $param) {
                if (!isset($this->uploadId[$param])) {
                    throw new \InvalidArgumentException('You must provide an '
                        . $param . ' value to the UploadBuilder.');
                }
            }

            // Create a state from the upload params.
            if (isset($this->uploadId[$uploadIdParam])) {
                $this->state = $this->loadStateByUploadId($this->uploadId);
            } else {
                $this->state = new UploadState($this->uploadId);
            }
        }

        if (!$this->state->getPartSize()) {
            $this->state->setPartSize($this->determinePartSize());
        }
    }

    /**
     * Creates a generator that yields part data for the provided source.
     *
     * Yields associative arrays of parameters that are ultimately merged in
     * with others to form the complete parameters of an UploadPart (or
     * UploadMultipartPart for Glacier) command. This includes the Body
     * parameter, which is a limited stream (i.e., a Stream object, decorated
     * with a LimitStream).
     *
     * @param callable $createPart Service-specific logic for defining a part.
     *
     * @return \Generator
     */
    private function getPartGenerator(callable $createPart)
    {
        // Determine if the source can be seeked.
        $seekable = $this->source->isSeekable()
            && $this->source->getMetadata('wrapper_type') === 'plainfile';

        for (
            $partNumber = 1;
            $seekable ?
                $this->source->tell() < $this->source->getSize() :
                !$this->source->eof();
            $partNumber++
        ) {
            // If we haven't already uploaded this part, yield a new part.
            if (!$this->state->hasPartBeenUploaded($partNumber)) {
                $partStartPos = $this->source->tell();
                yield $partNumber => $createPart($seekable, $partNumber);
                if ($this->source->tell() > $partStartPos) {
                    continue;
                }
            }

            // Advance the source's offset if not already advanced.
            if ($seekable) {
                $this->source->seek(min(
                    $this->source->tell() + $this->state->getPartSize(),
                    $this->source->getSize()
                ));
            } else {
                $this->source->read($this->state->getPartSize());
            }
        }
    }
}
