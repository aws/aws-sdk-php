<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\ResultInterface;
use Aws\S3\Exception\S3Exception;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\RejectedPromise;

/**
 * A trait providing S3-specific functionality. This is meant to be used in
 * classes implementing \Aws\S3\S3ClientInterface
 */
trait S3ClientTrait
{
    /**
     * Upload a file, stream, or string to a bucket.
     *
     * @see Aws\S3\MultipartUploader for more info about multipart uploads.
     * @see S3ClientInterface::upload()
     */
    public function upload(
        $bucket,
        $key,
        $body,
        $acl = 'private',
        array $options = []
    ) {
        return $this
            ->uploadAsync($bucket, $key, $body, $acl, $options)
            ->wait();
    }

    /**
     *
     * @see self::upload
     * @see S3ClientInterface::uploadAsync()
     */
    public function uploadAsync(
        $bucket,
        $key,
        $body,
        $acl = 'private',
        array $options = []
    ) {
        return (new ObjectUploader($this, $bucket, $key, $body, $acl, $options))
            ->promise();
    }

    /**
     * Copy an object of any size to a different location.
     *
     * @see Aws\S3\MultipartCopy for more info about multipart uploads.
     * @see S3ClientInterface::copy()
     */
    public function copy(
        $fromBucket,
        $fromKey,
        $destBucket,
        $destKey,
        $acl = 'private',
        array $options = []
    ) {
        return $this->copyAsync($fromBucket, $fromKey, $destBucket, $destKey, $acl, $options)
            ->wait();
    }

    /**
     * Copy an object of any size to a different location asynchronously.
     *
     * @see self::copy
     * @see S3ClientInterface::copyAsync()
     */
    public function copyAsync(
        $fromBucket,
        $fromKey,
        $destBucket,
        $destKey,
        $acl = 'private',
        array $options = []
    ) {
        $source = [
            'Bucket' => $fromBucket,
            'Key' => $fromKey,
        ];
        if (isset($options['version_id'])) {
            $source['VersionId'] = $options['version_id'];
        }
        $destination = [
            'Bucket' => $destBucket,
            'Key' => $destKey
        ];

        return (new ObjectCopier($this, $source, $destination, $acl, $options))
            ->promise();
    }

    /**
     * Register the Amazon S3 stream wrapper with this client instance.
     * @see S3ClientInterface::registerStreamWrapper()
     */
    public function registerStreamWrapper()
    {
        StreamWrapper::register($this);
    }

    /**
     * Deletes objects from Amazon S3 that match the result of a ListObjects
     * operation. For example, this allows you to do things like delete all
     * objects that match a specific key prefix.
     *
     * @see Aws\S3\S3Client::listObjects
     * @see S3ClientInterface::deleteMatchingObjects()
     */
    public function deleteMatchingObjects(
        $bucket,
        $prefix = '',
        $regex = '',
        array $options = []
    ) {
        $this->deleteMatchingObjectsAsync($bucket, $prefix, $regex, $options)
            ->wait();
    }

    /**
     * Deletes objects from Amazon S3 that match the result of a ListObjects
     * operation. For example, this allows you to do things like delete all
     * objects that match a specific key prefix.
     * @see Aws\S3\S3Client::listObjects
     * @see S3ClientInterface::deleteMatchingObjectsAsync()
     *
     */
    public function deleteMatchingObjectsAsync(
        $bucket,
        $prefix = '',
        $regex = '',
        array $options = []
    ) {
        if (!$prefix && !$regex) {
            return new RejectedPromise(
                new \RuntimeException('A prefix or regex is required.')
            );
        }

        $params = ['Bucket' => $bucket, 'Prefix' => $prefix];
        $iter = $this->getIterator('ListObjects', $params);

        if ($regex) {
            $iter = \Aws\filter($iter, function ($c) use ($regex) {
                return preg_match($regex, $c['Key']);
            });
        }

        return BatchDelete::fromIterator($this, $bucket, $iter, $options)
            ->promise();
    }

    /**
     * Recursively uploads all files in a given directory to a given bucket.
     *
     * @see Aws\S3\Transfer for more options and customization
     * @see S3ClientInterface::uploadDirectory()        
     */
    public function uploadDirectory(
        $directory,
        $bucket,
        $keyPrefix = null,
        array $options = []
    ) {
        $this->uploadDirectoryAsync($directory, $bucket, $keyPrefix, $options)
            ->wait();
    }

    /**
     * Recursively uploads all files in a given directory to a given bucket.
     *
     * @see Aws\S3\Transfer for more options and customization
     * @see S3ClientInterface::uploadDirectoryAsync()
     */
    public function uploadDirectoryAsync(
        $directory,
        $bucket,
        $keyPrefix = null,
        array $options = []
    ) {
        $d = "s3://$bucket" . ($keyPrefix ? '/' . ltrim($keyPrefix, '/') : '');
        return (new Transfer($this, $directory, $d, $options))->promise();
    }

    /**
     * Downloads a bucket to the local filesystem
     *
     * @see S3ClientInterface::downloadBucket()
     */
    public function downloadBucket(
        $directory,
        $bucket,
        $keyPrefix = '',
        array $options = []
    ) {
        $this->downloadBucketAsync($directory, $bucket, $keyPrefix, $options)
            ->wait();
    }

    /**
     * Downloads a bucket to the local filesystem
     *
     * @see S3ClientInterface::downloadBucketAsync()
     */
    public function downloadBucketAsync(
        $directory,
        $bucket,
        $keyPrefix = '',
        array $options = []
    ) {
        $s = "s3://$bucket" . ($keyPrefix ? '/' . ltrim($keyPrefix, '/') : '');
        return (new Transfer($this, $s, $directory, $options))->promise();
    }

    /**
     * Returns the region in which a given bucket is located.
     * @see S3ClientInterface::determineBucketRegion()
     */
    public function determineBucketRegion($bucketName)
    {
        return $this->determineBucketRegionAsync($bucketName)->wait();
    }

    /**
     * Returns a promise fulfilled with the region in which a given bucket is
     * located.
     *
     * @see S3ClientInterface::determineBucketRegionAsync()
     */
    public function determineBucketRegionAsync($bucketName)
    {
        $command = $this->getCommand('HeadBucket', ['Bucket' => $bucketName]);
        $handlerList = clone $this->getHandlerList();
        $handlerList->remove('s3.permanent_redirect');
        $handlerList->remove('signer');
        $handler = $handlerList->resolve();

        return $handler($command)
            ->then(static function (ResultInterface $result) {
                return $result['@metadata']['headers']['x-amz-bucket-region'];
            }, static function (AwsException $exception) {
                $response = $exception->getResponse();
                if ($response === null) {
                    throw $exception;
                }
                return $response->getHeaderLine('x-amz-bucket-region');
            });
    }

    /**
     * Determines whether or not a bucket exists by name.
     *
     * @see S3ClientInterface::doesBucketExist()
     */
    public function doesBucketExist($bucket)
    {
        return $this->checkExistenceWithCommand(
            $this->getCommand('HeadBucket', ['Bucket' => $bucket])
        );
    }

    /**
     * Determines whether or not an object exists by name.
     *
     * @see S3ClientInterface::doesObjectExist()
     */
    public function doesObjectExist($bucket, $key, array $options = [])
    {
        return $this->checkExistenceWithCommand(
            $this->getCommand('HeadObject', [
                    'Bucket' => $bucket,
                    'Key'    => $key
                ] + $options)
        );
    }

    /**
     * Determines whether or not a resource exists using a command
     *
     * @param CommandInterface $command Command used to poll for the resource
     *
     * @return bool
     * @throws S3Exception|\Exception if there is an unhandled exception
     */
    private function checkExistenceWithCommand(CommandInterface $command)
    {
        try {
            $this->execute($command);
            return true;
        } catch (S3Exception $e) {
            if ($e->getAwsErrorCode() == 'AccessDenied') {
                return true;
            }
            if ($e->getStatusCode() >= 500) {
                throw $e;
            }
            return false;
        }
    }

    /**     
     * @see S3ClientInterface::execute()      
     */
    abstract public function execute(CommandInterface $command);

    /**     
     * @see S3ClientInterface::getCommand()       
     */
    abstract public function getCommand($name, array $args = []);

    /**
     * @return HandlerList
     *
     * @see S3ClientInterface::getHandlerList()
     */
    abstract public function getHandlerList();

    /**
     * @return \Iterator
     *
     * @see S3ClientInterface::getIterator()
     */
    abstract public function getIterator($name, array $args = []);
}
