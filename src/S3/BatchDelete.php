<?php
namespace Aws\S3;

use Aws\AwsClientInterface;
use Aws\ResultInterface;
use Aws\S3\Exception\DeleteMultipleObjectsException;
use GuzzleHttp\Promise\PromisorInterface;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Efficiently deletes many objects from a single Amazon S3 bucket using an
 * iterator that yields keys. Deletes are made using the DeleteMultipleObjects
 * API operation.
 *
 * The easiest way to use this class using through the static fromListObjects()
 * method. For example:
 *
 *     $s3 = new Aws\S3\Client([
 *         'region' => 'us-west-2',
 *         'version' => 'latest'
 *     ]);
 *
 *     $listObjectsParams = ['Bucket' => 'foo', 'Prefix' => 'starts/with/'];
 *     $delete = Aws\S3\BatchDelete::fromListObjects($s3, $listObjectsParams);
 *     // Asynchronously delete
 *     $promise = $delete->promise();
 *     // Force synchronous completion
 *     $delete->delete();
 *
 * @link http://docs.aws.amazon.com/AmazonS3/latest/API/multiobjectdeleteapi.html
 */
class BatchDelete implements PromisorInterface
{
    private $bucket;
    /** @var AwsClientInterface */
    private $client;
    /** @var \Iterator */
    private $iterator;
    /** @var callable */
    private $before;
    /** @var PromiseInterface */
    private $cachedPromise;
    private $batchSize = 1000;
    private $queue = [];

    /**
     * Each value yielded by the iterator must be an associative array that
     * contains a "Key" key mapping to the Key in the bucket to delete.
     * Additional parameters may be present (e.g., "VersionId').
     *
     * The constructor accepts an optional hash of configuration options:
     *
     * - before: Function invoked before executing a command. The function is
     *   passed the command that is about to be executed. This can be useful
     *   for logging, adding custom request headers, etc.
     * - batch_size: The size of each delete batch. Defaults to 1000.
     *
     * @param AwsClientInterface $client   Client used to transfer the requests
     * @param string             $bucket   Bucket to delete from.
     * @param \Iterator          $iterator Yields assoc of keys to delete.
     * @param array              $options  Hash of options used with the batch
     *
     * @throws \InvalidArgumentException if the provided batch_size is <= 0
     */
    public function __construct(
        AwsClientInterface $client,
        $bucket,
        \Iterator $iterator,
        array $options = []
    ) {
        $this->client = $client;
        $this->bucket = $bucket;
        $this->iterator = $iterator;

        if (isset($options['before'])) {
            if (!is_callable($options['before'])) {
                throw new \InvalidArgumentException('before must be callable');
            }
            $this->before = $options['before'];
        }

        if (isset($options['batch_size'])) {
            if ($options['batch_size'] <= 0) {
                throw new \InvalidArgumentException('batch_size is not > 0');
            }
            $this->batchSize = min($options['batch_size'], 1000);
        }
    }

    /**
     * Creates a BatchDelete object from all of the paginated results of a
     * ListObjects operation. Each result that is returned by the ListObjects
     * operation will be deleted.
     *
     * @param AwsClientInterface $client            AWS Client to use.
     * @param array              $listObjectsParams ListObjects API parameters
     * @param array              $options           BatchDelete options.
     *
     * @return BatchDelete
     */
    public static function fromListObjects(
        AwsClientInterface $client,
        array $listObjectsParams,
        array $options = []
    ) {
        $iter = $client->getIterator('ListObjects', $listObjectsParams);

        return new self(
            $client,
            $listObjectsParams['Bucket'],
            $iter,
            $options
        );
    }

    public function promise()
    {
        if (!$this->cachedPromise) {
            $this->cachedPromise = $this->createPromise();
        }

        return $this->cachedPromise;
    }

    /**
     * Synchronously deletes all of the objects.
     *
     * @throws DeleteMultipleObjectsException on error.
     */
    public function delete()
    {
        $this->promise()->wait();
    }

    private function process(ResultInterface $result)
    {
        if (!empty($result['Errors'])) {
            throw new DeleteMultipleObjectsException(
                $result['Deleted'] ?: [],
                $result['Errors']
            );
        }
    }

    private function enqueue(array $obj)
    {
        $this->queue[] = $obj;
        return count($this->queue) >= $this->batchSize
            ? $this->flushQueue()
            : null;
    }

    private function flushQueue()
    {
        static $validKeys = ['Key' => true, 'VersionId' => true];

        if (count($this->queue) === 0) {
            return null;
        }

        $batch = [];
        while ($obj = array_shift($this->queue)) {
            $batch[] = array_intersect_key($obj, $validKeys);
        }

        $command = $this->client->getCommand('DeleteObjects', [
            'Bucket' => $this->bucket,
            'Delete' => ['Objects' => $batch]
        ]);

        if ($this->before) {
            call_user_func($this->before, $command);
        }

        return $this->client->executeAsync($command);
    }

    /**
     * Returns a promise that will clean up any references when it completes.
     *
     * @return PromiseInterface
     */
    private function createPromise()
    {
        return \GuzzleHttp\Promise\coroutine(function () {
            foreach ($this->iterator as $obj) {
                if ($promise = $this->enqueue($obj)) {
                    $this->process((yield $promise));
                }
            }
            if ($promise = $this->flushQueue()) {
                $this->process((yield $promise));
            }
            yield null;
        })->then(
            function ($value) {
                $this->iterator = $this->before = $this->client = null;
                return $value;
            },
            function ($reason) {
                $this->iterator = $this->before = $this->client = null;
                return \GuzzleHttp\Promise\rejection_for($reason);
            }
        );
    }
}
