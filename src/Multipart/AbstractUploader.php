<?php
namespace Aws\Multipart;

use Aws\AwsClientInterface as Client;
use Aws\CommandInterface;
use Aws\CommandPool;
use Aws\Exception\AwsException;
use Aws\Exception\MultipartUploadException;
use Aws\Result;
use Aws\ResultInterface;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7;
use InvalidArgumentException as IAE;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface as Stream;

/**
 * Encapsulates the execution of a multipart upload to S3 or Glacier.
 */
abstract class AbstractUploader implements Promise\PromisorInterface
{
    const DEFAULT_CONCURRENCY = 5;

    /** @var array Default values for base multipart configuration */
    private static $defaultConfig = [
        'part_size'       => null,
        'state'           => null,
        'concurrency'     => self::DEFAULT_CONCURRENCY,
        'before_initiate' => null,
        'before_upload'   => null,
        'before_complete' => null,
    ];

    /** @var Client Client used for the upload. */
    protected $client;

    /** @var array Configuration used to perform the upload. */
    protected $config;

    /** @var array Service-specific information about the upload workflow. */
    protected $info;

    /** @var PromiseInterface Promise that represents the multipart upload. */
    protected $promise;

    /** @var Stream Source of the data to be uploaded. */
    protected $source;

    /** @var UploadState State used to manage the upload. */
    protected $state;

    /**
     * @param Client $client
     * @param mixed  $source
     * @param array  $config
     */
    public function __construct(Client $client, $source, array $config = [])
    {
        $this->client = $client;
        $this->info = $this->loadUploadWorkflowInfo();
        $this->config = $config + self::$defaultConfig;
        $this->source = $this->determineSource($source);
        $this->state = $this->determineState();
    }

    /**
     * Returns the current state of the upload
     *
     * @return UploadState
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Upload the source using multipart upload operations.
     *
     * @return Result The result of the CompleteMultipartUpload operation.
     * @throws \LogicException if the upload is already complete or aborted.
     * @throws MultipartUploadException if an upload operation fails.
     */
    public function upload()
    {
        return $this->promise()->wait();
    }

    /**
     * Upload the source asynchronously using multipart upload operations.
     *
     * @return PromiseInterface
     */
    public function promise()
    {
        if ($this->promise) {
            return $this->promise;
        }

        return $this->promise = Promise\coroutine(function () {
            // Initiate the upload.
            if ($this->state->isCompleted()) {
                throw new \LogicException('This multipart upload has already '
                    . 'been completed or aborted.'
                );
            } elseif (!$this->state->isInitiated()) {
                $result = (yield $this->execCommand('initiate', $this->getInitiateParams()));
                $this->state->setUploadId(
                    $this->info['id']['upload_id'],
                    $result[$this->info['id']['upload_id']]
                );
                $this->state->setStatus(UploadState::INITIATED);
            }

            // Create a command pool from a generator that yields UploadPart
            // commands for each upload part.
            $resultHandler = $this->getResultHandler($errors);
            $commands = new CommandPool(
                $this->client,
                $this->getUploadCommands($resultHandler),
                [
                    'concurrency' => $this->config['concurrency'],
                    'before'      => $this->config['before_upload'],
                ]
            );

            // Execute the pool of commands concurrently, and process errors.
            yield $commands->promise();
            if ($errors) {
                throw new MultipartUploadException($this->state, $errors);
            }

            // Complete the multipart upload.
            yield $this->execCommand('complete', $this->getCompleteParams());
            $this->state->setStatus(UploadState::COMPLETED);
        })->otherwise(function (\Exception $e) {
            // Throw errors from the operations as a specific Multipart error.
            if ($e instanceof AwsException) {
                $e = new MultipartUploadException($this->state, $e);
            }
            throw $e;
        });
    }

    /**
     * Create a stream for a part that starts at the current position and
     * has a length of the upload part size (or less with the final part).
     *
     * @param Stream $stream
     *
     * @return Psr7\LimitStream
     */
    protected function limitPartStream(Stream $stream)
    {
        // Limit what is read from the stream to the part size.
        return new Psr7\LimitStream(
            $stream,
            $this->state->getPartSize(),
            $this->source->tell()
        );
    }

    /**
     * Provides service-specific information about the multipart upload
     * workflow.
     *
     * This array of data should include the keys: 'command', 'id', and 'part_num'.
     *
     * @return array
     */
    abstract protected function loadUploadWorkflowInfo();

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
     * Generates the parameters for an upload part by analyzing a range of the
     * source starting from the current offset up to the part size.
     *
     * @param bool $seekable
     * @param int  $number
     *
     * @return array|null
     */
    abstract protected function createPart($seekable, $number);

    /**
     * Uses information from the Command and Result to determine which part was
     * uploaded and mark it as uploaded in the upload's state.
     *
     * @param CommandInterface $command
     * @param ResultInterface  $result
     */
    abstract protected function handleResult(
        CommandInterface $command,
        ResultInterface $result
    );

    /**
     * Gets the service-specific parameters used to initiate the upload.
     *
     * @return array
     */
    abstract protected function getInitiateParams();

    /**
     * Gets the service-specific parameters used to complete the upload.
     *
     * @return array
     */
    abstract protected function getCompleteParams();

    /**
     * Based on the config and service-specific workflow info, creates a
     * `Promise` for an `UploadState` object.
     *
     * @return PromiseInterface A `Promise` that resolves to an `UploadState`.
     */
    private function determineState()
    {
        // If the state was provided via config, then just use it.
        if ($this->config['state'] instanceof UploadState) {
            return $this->config['state'];
        }

        // Otherwise, construct a new state from the provided identifiers.
        $required = $this->info['id'];
        $id = [$required['upload_id'] => null];
        unset($required['upload_id']);
        foreach ($required as $key => $param) {
            if (!$this->config[$key]) {
                throw new IAE('You must provide a value for "' . $key . '" in '
                    . 'your config for the MultipartUploader for '
                    . $this->client->getApi()->getServiceFullName() . '.');
            }
            $id[$param] = $this->config[$key];
        }
        $state = new UploadState($id);
        $state->setPartSize($this->determinePartSize());

        return $state;
    }

    /**
     * Turns the provided source into a stream and stores it.
     *
     * If a string is provided, it is assumed to be a filename, otherwise, it
     * passes the value directly to `Psr7\stream_for()`.
     *
     * @param mixed $source
     *
     * @return Stream
     */
    private function determineSource($source)
    {
        // Use the contents of a file as the data source.
        if (is_string($source)) {
            $source = Psr7\try_fopen($source, 'r');
        }

        // Create a source stream.
        $stream = Psr7\stream_for($source);
        if (!$stream->isReadable()) {
            throw new IAE('Source stream must be readable.');
        }

        return $stream;
    }

    /**
     * Executes a MUP command with all of the parameters for the operation.
     *
     * @param string $operation Name of the operation.
     * @param array  $params    Service-specific params for the operation.
     *
     * @return PromiseInterface
     */
    private function execCommand($operation, array $params)
    {
        // Create the command.
        $command = $this->client->getCommand(
            $this->info['command'][$operation],
            $params + $this->state->getId()
        );

        // Execute the before callback.
        if (is_callable($this->config["before_{$operation}"])) {
            $this->config["before_{$operation}"]($command);
        }

        // Execute the command asynchronously and return the promise.
        return $this->client->executeAsync($command);
    }

    /**
     * Returns a middleware for processing responses of part upload operations.
     *
     * - Adds an onFulfilled callback that calls the service-specific
     *   handleResult method on the Result of the operation.
     * - Adds an onRejected callback that adds the error to an array of errors.
     * - Has a passedByRef $errors arg that the exceptions get added to. The
     *   caller should use that &$errors array to do error handling.
     *
     * @param array $errors Errors from upload operations are added to this.
     *
     * @return callable
     */
    private function getResultHandler(&$errors = [])
    {
        return function (callable $handler) use (&$errors) {
            return function (
                CommandInterface $command,
                RequestInterface $request = null
            ) use ($handler, &$errors) {
                return $handler($command, $request)->then(
                    function (ResultInterface $result) use ($command) {
                        $this->handleResult($command, $result);
                        return $result;
                    },
                    function (AwsException $e) use (&$errors) {
                        $errors[$e->getCommand()[$this->info['part_num']]] = $e;
                        return new Result();
                    }
                );
            };
        };
    }

    /**
     * Creates a generator that yields part data for the upload's source.
     *
     * Yields associative arrays of parameters that are ultimately merged in
     * with others to form the complete parameters of an UploadPart (or
     * UploadMultipartPart for Glacier) command. This includes the Body
     * parameter, which is a limited stream (i.e., a Stream object, decorated
     * with a LimitStream).
     **
     * @return \Generator
     */
    private function getUploadCommands($resultHandler)
    {
        // Determine if the source can be seeked.
        $seekable = $this->source->isSeekable()
            && $this->source->getMetadata('wrapper_type') === 'plainfile';

        for ($partNumber = 1; $this->isEof($seekable); $partNumber++) {
            // If we haven't already uploaded this part, yield a new part.
            if (!$this->state->hasPartBeenUploaded($partNumber)) {
                $partStartPos = $this->source->tell();
                if (!($data = $this->createPart($seekable, $partNumber))) {
                    break;
                }
                $command = $this->client->getCommand(
                    $this->info['command']['upload'],
                    $data + $this->state->getId()
                );
                $command->getHandlerList()->appendSign($resultHandler, 'mup');
                yield $command;
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

    /**
     * Checks if the source is at EOF.
     *
     * @param bool $seekable
     *
     * @return bool
     */
    private function isEof($seekable)
    {
        return $seekable
            ? $this->source->tell() < $this->source->getSize()
            : !$this->source->eof();
    }
}
