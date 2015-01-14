<?php
namespace Aws\S3;

use Aws\AwsClientInterface;
use Aws\Result;
use Aws\S3\Exception\DeleteMultipleObjectsException;
use GuzzleHttp\Command\Event\PreparedEvent;

/**
 * Implements a queue for deleting objects from an Amazon S3 bucket.
 *
 * You can enqueue objects to delete using the addObject() method by passing
 * the object key and optional version ID. Call the delete() method of
 * BatchDelete when you are ready to delete the queued objects.
 */
class BatchDelete implements \Countable
{
    private $client;
    private $bucket;
    private $mfa;
    private $batchSize = 1000;
    private $objects = [];

    /**
     * The constructor accepts an optional hash of configuration options:
     *
     * - mfa: MFA token used when contacting the Amazon S3 API.
     * - batch_size: The size of each delete batch. Defaults to 1000.
     *
     * @param AwsClientInterface $client  Client used to transfer the requests
     * @param string             $bucket  Bucket that stores the objects
     * @param array              $options Hash of options used with the batch
     * @throws \InvalidArgumentException if the provided batch_size is <= 0
     */
    public function __construct(
        AwsClientInterface $client,
        $bucket,
        array $options = []
    ) {
        $this->client = $client;
        $this->bucket = $bucket;

        if (isset($options['mfa'])) {
            $this->mfa = $options['mfa'];
        }

        if (isset($options['batch_size'])) {
            if ($options['batch_size'] <= 0) {
                throw new \InvalidArgumentException('batch_size is not > 0');
            }
            $this->batchSize = $options['batch_size'];
        }
    }

    /**
     * Add an object to the batch to be deleted.
     *
     * @param string $key       Key name of the object to delete.
     * @param string $versionId VersionId for the specific version of the
     *                          object to delete.
     */
    public function addObject($key, $versionId = null)
    {
        if (!$versionId) {
            $this->objects[] = ['Key' => $key];
        } else {
            $this->objects[] = ['Key' => $key, 'VersionId' => $versionId];
        }
    }

    /**
     * Returns an array of the objects that are queued for deletion.
     *
     * @return array
     */
    public function getQueue()
    {
        return $this->objects;
    }

    /**
     * Returns the number of enqueued objects to delete
     *
     * @return int
     */
    public function count()
    {
        return count($this->objects);
    }

    /**
     * Deletes the queued objects.
     *
     * @return array Returns an array of deleted key information. Each value
     *               in the array contains a 'Key' and optionally
     *               'DeleteMarker' and 'DeleteMarkerVersionId' keys.
     *
     * @throws DeleteMultipleObjectsException
     */
    public function delete()
    {
        $results = [];

        while ($batch = $this->getNextBatch()) {
            $result = $this->deleteBatch($batch);
            $results = array_merge($results, (array) $result['Deleted']);
        }

        return $results;
    }

    private function getNextBatch()
    {
        $batch = [];

        for ($i = 0; $i < $this->batchSize && $this->objects; $i++) {
            $batch[] = array_shift($this->objects);
        }

        return $batch;
    }

    private function deleteBatch(array $batch)
    {
        $command = $this->client->getCommand('DeleteObjects', [
            'Bucket' => $this->bucket,
            'Delete' => [
                'Objects' => $batch
            ]
        ]);

        if ($this->mfa) {
            $command->getEmitter()->on('prepared', function (PreparedEvent $e) {
                $e->getRequest()->setHeader('x-amz-mfa', $this->mfa);
            });
        }

        return $this->process($this->client->execute($command));
    }

    private function process(Result $result)
    {
        if (!empty($result['Errors'])) {
            throw new DeleteMultipleObjectsException(
                $result['Deleted'] ?: [],
                $result['Errors']
            );
        }

        return $result;
    }
}
