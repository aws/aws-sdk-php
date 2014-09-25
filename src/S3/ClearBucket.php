<?php
namespace Aws\S3;

use Aws\Common\AwsClientInterface;
use Aws\S3\Exception\ClearBucketException;
use Aws\S3\Exception\DeleteMultipleObjectsException;

/**
 * Deletes objects from a bucket.
 *
 * This class can be used to efficiently delete all objects of a bucket or
 * to delete only objects yielded by an iterator.
 *
 * If an error occurs while deleting objects, a ClearBucketException is thrown.
 * This exception allows you to resume the transfer if needed by inspecting the
 * failures and using the same iterator to continue deleting objects. The
 * iterator is not rewound in this class, so you can utilize non-seekable
 * iterators like Generators and still recover from failure.
 */
class ClearBucket
{
    /** @var AwsClientInterface */
    private $client;

    /** @var \Iterator */
    private $iterator;

    private $options = [];
    private $batchSize = 1000;
    private $before;

    /**
     * This function accepts a hash of options:
     *
     * - iterator: An \Iterator instance that yields associative arrays that
     *   contain a 'Key' and optional 'VersionId'.
     * - before: Callable to invoke before each delete is called. This callable
     *   accepts the underlying iterator being used and an array of the keys
     *   that are about to be deleted.
     * - batch_size: The size of each delete batch. Defaults to 1000.
     * - mfa: MFA token used when contacting the Amazon S3 API.
     *
     * @param AwsClientInterface $client  Client used to execute requests
     * @param string             $bucket  Name of the bucket to delete from
     * @param array              $options Hash of options used with the class
     * @throws \InvalidArgumentException if the provided iterator is invalid
     */
    public function __construct(
        AwsClientInterface $client,
        $bucket,
        array $options = []
    ) {
        $this->client = $client;
        $this->bucket = $bucket;
        $this->handleOptions($options);

        if (!$this->iterator) {
            $this->iterator = $this->client->getIterator('ListObjects', [
                'Bucket' => $this->bucket
            ]);
        }
    }

    /**
     * Removes the keys from the bucket that are yielded from the underlying
     * iterator.
     *
     * WARNING: If no iterator was provided in the constructor, then ALL keys
     * will be removed from the bucket!
     *
     * @throws ClearBucketException if an error occurs while transferring
     */
    public function clear()
    {
        $batch = new BatchDelete($this->client, $this->bucket, $this->options);

        while ($this->iterator->valid()) {

            $object = $this->validateObject($this->iterator->current());
            $batch->addObject(
                $object['Key'],
                isset($object['VersionId']) ? $object['VersionId'] : null
            );

            if (count($batch) >= $this->batchSize) {
                $this->sendBatch($batch);
            }

            $this->iterator->next();
        }

        if (count($batch)) {
            $this->sendBatch($batch);
        }
    }

    /**
     * Validate the provided options.
     *
     * Gets the iterator from the options hash or creates one to delete all
     * objects from the bucket.
     *
     * @throws \InvalidArgumentException if invalid options are provided.
     */
    private function handleOptions(array $options)
    {
        // Double dispatch on each provided option
        foreach ($options as $key => $value) {
            if (!method_exists($this, "handle_{$key}")) {
                throw new \InvalidArgumentException(
                    "Invalid option provided: $key"
                );
            }
            $this->{"handle_{$key}"}($value);
        }
    }

    private function handle_iterator($value)
    {
         if (!($value instanceof \Iterator)) {
            throw new \InvalidArgumentException('iterator must be an '
                . 'instance of Iterator');
        }

        $this->iterator = $value;
    }

    private function handle_batch_size($value)
    {
        if ($value <= 0) {
            throw new \InvalidArgumentException('batch_size must be > 0');
        }

        $this->batchSize = $this->options['batch_size'] = $value;
    }

    private function handle_before($value)
    {
        $this->before = $value;
    }

    private function handle_mfa($value)
    {
        $this->options['mfa'] = $value;
    }

    private function validateObject($object)
    {
        if (is_array($object) && isset($object['Key'])) {
            return $object;
        }

        throw new ClearBucketException(
            [
                [
                    'Key'     => null,
                    'Message' => 'Invalid value returned from iterator',
                    'Value'   => $object
                ]
            ],
            $this->iterator
        );
    }

    private function sendBatch(BatchDelete $batch)
    {
        try {
            if ($this->before) {
                call_user_func(
                    $this->before,
                    $this->iterator,
                    $batch->getQueue()
                );
            }
            $batch->delete();
        } catch (DeleteMultipleObjectsException $e) {
            throw new ClearBucketException(
                $e->getErrors(),
                $this->iterator,
                $e
            );
        }
    }
}
