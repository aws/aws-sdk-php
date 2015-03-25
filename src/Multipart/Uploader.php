<?php
namespace Aws\Multipart;

use Aws\AwsClientInterface;
use Aws\CommandPool;
use Aws\Exception\AwsException;
use Aws\Exception\MultipartUploadException;
use Aws\Result;
use Aws\CommandInterface;
use Aws\ResultInterface;
use Psr\Http\Message\RequestInterface;
use transducers as t;

/**
 * Encapsulates the execution of a multipart upload to S3 or Glacier.
 */
class Uploader
{
    /** @var AwsClientInterface Client used for the upload. */
    private $client;

    /** @var UploadState State used to manage the upload. */
    private $state;

    /** @var \Traversable Generator that yields sets of upload part params. */
    private $parts;

    /** @var array Service-specific configuration used to perform the upload. */
    private $config;

    /**
     * Construct a new transfer object
     *
     * @param AwsClientInterface $client Client used for the upload.
     * @param UploadState        $state  State used to manage the upload.
     * @param \Traversable       $parts  Generator that yields sets of params
     *                                   for each upload part operation,
     *                                   including the upload body.
     * @param array              $config Service-specific configuration relevant
     *                                   to performing the upload.
     */
    public function __construct(
        AwsClientInterface $client,
        UploadState $state,
        \Traversable $parts,
        array $config = []
    ) {
        $this->client = $client;
        $this->state = $state;
        $this->parts = $parts;
        $this->config = $config;
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
            $result = $this->client->execute($this->createCommand('abort'));
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
            $result = $this->client->execute($this->createCommand('initiate'));
            $params = $this->state->getUploadId();
            $params[$this->config['id'][2]] = $result[$this->config['id'][2]];
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
            $result = $this->client->execute($this->createCommand('complete',
                $this->config['fn']['complete']()
            ));
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
        $commands = t\to_iter($this->parts, t\map(function (array $partData) {
            return $this->createCommand('upload', $partData);
        }));

        // Execute the commands concurrently and process results.
        $results = CommandPool::batch($this->client, $commands, [
            'concurrency' => $concurrency,
            'before'      => $before,
        ]);

        // Process errors out from the batch results and throw exception if any.
        $errors = [];
        foreach ($results as $result) {
            if ($result instanceof AwsException) {
                $num = $result->getCommand()[$this->config['part']['param']];
                $errors[$num] = $result;
            }
        }
        if ($errors) {
            throw new MultipartUploadException($this->state, $errors);
        }

        return $this->complete();
    }

    /**
     * Creates a command with all of the relevant parameters from the operation
     * name and an array of additional parameters.
     *
     * @param string $operation      Name of the operation (e.g., UploadPart).
     * @param array  $computedParams Extra params not stored in the Uploader.
     *
     * @return CommandInterface
     */
    private function createCommand($operation, array $computedParams = [])
    {
        $configuredParams = $this->state->getUploadId() + $this->config[$operation]['params'];

        $command = $this->client->getCommand(
            $this->config[$operation]['command'],
            $computedParams + $configuredParams
        );

        if ($operation === 'upload') {
            $middleware = function (callable $handler) {
                return function (
                    CommandInterface $command,
                    RequestInterface $request = null
                ) use ($handler) {
                    return $handler($command, $request)->then(
                        function (ResultInterface $result) use ($command) {
                            $this->config['fn']['result']($command, $result);
                            return $result;
                        }
                    );
                };
            };
            $command->getHandlerList()->append('sign:s3.mups', $middleware);
        }

        return $command;
    }
}
