<?php
namespace Aws\Common\Multipart;

use Aws\Common\AwsClientInterface;
use Aws\Common\Exception\AwsException;
use Aws\Common\Exception\MultipartUploadException;
use Aws\Common\MapIterator;
use Aws\Common\Result;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * Templates the generic multipart upload logic for S3 and Glacier.
 */
abstract class AbstractUploader
{
    // Constants for operation names.
    const INITIATE = 'CreateMultipartUpload';
    const UPLOAD = 'UploadPart';
    const COMPLETE = 'CompleteMultipartUpload';
    const ABORT = 'AbortMultipartUpload';

    /** @var string Parameter that holds the upload ID. */
    protected static $uploadIdParam = 'UploadId';

    /** @var string Parameter that holds the part number. */
    protected static $partNumberParam = 'PartNumber';

    /** @var AwsClientInterface Client used for the upload. */
    protected $client;

    /** @var UploadState State used to manage the upload. */
    protected $state;

    /** @var PartGenerator Generator that yields upload parts data. */
    protected $parts;

    /** @var array Associative Array of parameters for executed commands. */
    protected $params;

    /**
     * Construct a new transfer object
     *
     * @param AwsClientInterface $client Client used for the upload.
     * @param UploadState        $state  State used to manage the upload.
     * @param \Iterator          $parts Iterator that yields sets of parameters
     *     for each upload part operation, including the upload body.
     * @param array              $params Array of parameters where the key
     *     is the name of an operation, and the value is an array of the
     *     parameters that should be included when the Uploader executes that
     *     type of operation.
     */
    public function __construct(
        AwsClientInterface $client,
        UploadState $state,
        \Iterator $parts,
        array $params = []
    ) {
        $this->client = $client;
        $this->state = $state;
        $this->parts = $parts;
        $this->params = $params;
    }

    public function __invoke($concurrency = 1, callable $before = null)
    {
        return $this->upload($concurrency, $before);
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
     * Abort the multipart upload.
     *
     * @return Result
     * @throws \LogicException if the upload has not been initiated yet.
     * @throws MultipartUploadException if the abort operation fails.
     */
    public function abort()
    {
        if (!$this->state->isInitiated()) {
            throw new \LogicException('The upload has not been initiated.');
        }

        try {
            $result = $this->client->execute($this->createCommand(static::ABORT));
            $this->state->setStatus(UploadState::ABORTED);
            return $result;
        } catch (AwsException $e) {
            throw new MultipartUploadException($this->state, 'aborting', $e);
        }
    }

    /**
     * Initiate the multipart upload.
     *
     * @throws MultipartUploadException if the initiate operation fails.
     */
    private function initiate()
    {
        try {
            $result = $this->client->execute($this->createCommand(static::INITIATE));
            $params = $this->state->getUploadId();
            $params[static::$uploadIdParam] = $result[static::$uploadIdParam];
            $this->state->setStatus(UploadState::INITIATED, $params);
        } catch (AwsException $e) {
            throw new MultipartUploadException($this->state, 'initiating', $e);
        }
    }

    /**
     * Complete the multipart upload.
     *
     * @return Result
     * @throws MultipartUploadException if the complete operation fails.
     */
    private function complete()
    {
        try {
            $result = $this->client->execute($this->getCompleteCommand());
            $this->state->setStatus(UploadState::COMPLETED);
            return $result;
        } catch (AwsException $e) {
            throw new MultipartUploadException($this->state, 'completing', $e);
        }
    }

    /**
     * Upload the source to S3 using multipart upload operations.
     *
     * @param int $concurrency Number of parts that the Uploader will upload
     *     concurrently (in parallel). This defaults to 1. You may need to do
     *     some experimenting to find the most optimum concurrency value
     *     for your system, but using 20-25 usually yields decent results.
     * @param callable|null $before Callback to execute before each upload.
     *     This callback will receive a PreparedEvent object as its argument.
     *
     * @return Result The result of the CompleteMultipartUpload operation.
     * @throws \LogicException if the upload is already complete or aborted.
     * @throws MultipartUploadException if an upload operation fails.
     */
    public function upload($concurrency = 1, callable $before = null)
    {
        // Ensure the upload is in a valid state for uploading parts.
        if (!$this->state->isInitiated()) {
            $this->initiate();
        } elseif ($this->state->isCompleted()) {
            throw new \LogicException('The upload has been completed.');
        } elseif ($this->state->isAborted()) {
            throw new \LogicException('This upload has been aborted.');
        }

        // Create iterator that will yield UploadPart commands for each part.
        $commands = new MapIterator($this->parts, function (array $partData) {
            return $this->createCommand(static::UPLOAD, $partData);
        });

        // This is needed to get the MapIterator ready for the valid() method.
        $commands->rewind();

        // Execute the commands in parallel and process results. This collects
        // unhandled errors along the way and throws an exception at the end
        // that contains the state and a list of the failed parts.
        $errors = [];
        $this->client->executeAll($commands, [
            'pool_size' => $concurrency,
            'prepared'  => $before,
            'process'   => [
                'fn' => function (ProcessEvent $event) use (&$errors) {
                    $command = $event->getCommand();
                    if ($ex = $event->getException()) {
                        $key = $command[static::$partNumberParam];
                        $errors[$key] = $ex->getMessage();
                    } else {
                        //unset($errors[$command[static::$partNumberParam]]);
                        $this->handleResult($command, $event->getResult());
                    }
                },
                'priority' => 'last'
            ]
        ]);

        if ($errors) {
            throw new MultipartUploadException($this->state, $errors);
        }

        return $this->complete();
    }

    /**
     * Creates a command with all of the relevant parameters from the operation
     * name and an array of additional parameters.
     *
     * @param string $operation        Name of the operation (e.g., UploadPart).
     * @param array  $additionalParams Extra params not stored in the Uploader.
     *
     * @return CommandInterface
     */
    protected function createCommand($operation, array $additionalParams = [])
    {
        $params = $additionalParams + $this->state->getUploadId();
        if (isset($this->params[$operation])) {
            $params += $this->params[$operation];
        }

        return $this->client->getCommand($operation, $params);
    }

    /**
     * Get the command for completing the multipart upload.
     *
     * @return CommandInterface
     */
    abstract protected function getCompleteCommand();

    /**
     * Uses information from the Command and Result to determine which part was
     * uploaded and mark it as such.
     */
    abstract protected function handleResult(
        CommandInterface $command,
        Result $result
    );
}
