<?php
namespace Aws\S3;

use Aws\AwsClient;
use Aws\Result;
use Aws\S3\Model\ClearBucket;
use Aws\S3\Model\MultipartUpload\AbstractTransfer as AbstractMulti;
use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Aws\S3\Sync\DownloadSyncBuilder;
use Aws\S3\Sync\UploadSyncBuilder;
use GuzzleHttp\Collection;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream;
use GuzzleHttp\Command\CommandInterface;

/**
 * Client to interact with Amazon Simple Storage Service.
 */
class S3Client extends AwsClient
{
    /**
     * Determine if a string is a valid name for a DNS compatible Amazon S3
     * bucket.
     *
     * DNS compatible bucket names can be used as a subdomain in a URL (e.g.,
     * "<bucket>.s3.amazonaws.com").
     *
     * @param string $bucket Bucke name to check.
     *
     * @return bool
     */
    public static function isValidBucketName($bucket)
    {
        $bucketLen = strlen($bucket);

        return ($bucketLen >= 3 && $bucketLen <= 63) &&
            // Cannot look like an IP address
            !preg_match('/(\d+\.){3}\d+$/', $bucket) &&
            preg_match('/^[a-z0-9]([a-z0-9\-\.]*[a-z0-9])?$/', $bucket);
    }

    /**
     * Create a pre-signed URL for a request.
     *
     * @param RequestInterface $request     Request to generate the URL for.
     *                                      Use the factory methods of the
     *                                      client to create this request object
     * @param int|string|\DateTime $expires The time at which the URL should
     *                                      expire. This can be a Unix
     *                                      timestamp, a PHP DateTime object,
     *                                      or a string that can be evaluated
     *                                      by strtotime
     * @return string
     */
    public function createPresignedUrl(RequestInterface $request, $expires)
    {
        return $this->getSignature()->createPresignedUrl(
            $request,
            $this->getCredentials(),
            $expires
        );
    }

    /**
     * Returns the URL to an object identified by its bucket and key.
     *
     * If an expiration time is provided, the URL will be signed and set to
     * expire at the provided time.
     *
     * @param string $bucket  The name of the bucket where the object is located
     * @param string $key     The key of the object
     * @param mixed  $expires The time at which the URL should expire
     * @param array  $args    Arguments to the GetObject command. Additionally
     *                        you can specify a "Scheme" if you would like the
     *                        URL to use a different scheme than what the
     *                        client is configured to use
     *
     * @return string The URL to the object
     */
    public function getObjectUrl(
        $bucket,
        $key,
        $expires = null,
        array $args = []
    ) {
        $args = ['Bucket' => $bucket, 'Key' => $key] + $args;
        $command = $this->getCommand('GetObject', $args);
        $request = $command->prepare();

        if (isset($command['Scheme'])) {
            $request->setScheme($command['Scheme']);
        }

        return $expires
            ? $this->createPresignedUrl($request, $expires)
            : $request->getUrl();
    }

    /**
     * @deprecated Use ClearBucket directly.
     */
    public function clearBucket($bucket)
    {
        return (new ClearBucket($this, $bucket))->clear();
    }

    /**
     * Determines whether or not a bucket exists by name.
     *
     * Note: This method cannot give a 100% accurate result as to whether or
     * not a bucket exists. It provides only a best-effort attempt.
     *
     * @param string $bucket    The name of the bucket
     * @param bool   $accept403 Set to true if 403s are acceptable
     * @param array  $options   Additional command options to add
     *
     * @return bool
     */
    public function doesBucketExist(
        $bucket,
        $accept403 = true,
        array $options = []
    ) {
        return $this->checkExistenceWithCommand(
            $this->getCommand('HeadBucket', array_merge($options, [
                'Bucket' => $bucket
            ])), $accept403
        );
    }

    /**
     * Determines whether or not an object exists by name.
     *
     * Note: This method cannot give a 100% accurate result as to whether or
     * not an object exists. It provides only a best-effort attempt.
     *
     * @param string $bucket  The name of the bucket
     * @param string $key     The key of the object
     * @param array  $options Additional options to add to the executed command
     *
     * @return bool
     */
    public function doesObjectExist($bucket, $key, array $options = [])
    {
        return $this->checkExistenceWithCommand(
            $this->getCommand('HeadObject', array_merge($options, [
                'Bucket' => $bucket,
                'Key'    => $key
            ]))
        );
    }

    /**
     * Raw URL encode a key and allow for '/' characters
     *
     * @param string $key Key to encode
     *
     * @return string Returns the encoded key
     */
    public static function encodeKey($key)
    {
        return str_replace('%2F', '/', rawurlencode($key));
    }

    /**
     * Register the Amazon S3 stream wrapper and associates it with this client
     * object.
     *
     * @return self
     */
    public function registerStreamWrapper()
    {
        StreamWrapper::register($this);

        return $this;
    }

    /**
     * Upload a file, stream, or string to a bucket. If the upload size exceeds
     * the specified threshold, the upload will be performed using parallel
     * multipart uploads.
     *
     * @param string $bucket  Bucket to upload the object
     * @param string $key     Key of the object
     * @param mixed  $body    Object data to upload. Can be a
     *                        GuzzleHttp\Stream\StreamInterface, PHP stream
     *                        resource, or a string of data to upload.
     * @param string $acl     ACL to apply to the object
     * @param array  $options Custom options used when executing commands:
     *
     *     - params: Custom parameters to use with the upload. The parameters
     *       must map to a PutObject or InitiateMultipartUpload operation
     *       parameters.
     *     - min_part_size: Minimum size to allow for each uploaded part when
     *       performing a multipart upload.
     *     - concurrency: Maximum number of concurrent multipart uploads.
     *     - before_upload: Callback to invoke before each multipart upload.
     *       The callback will receive a relevant Guzzle Event object.
     *
     * @see Aws\S3\Model\MultipartUpload\UploadBuilder for more information.
     * @return Result Returns the modeled result of the performed operation.
     */
    public function upload(
        $bucket,
        $key,
        $body,
        $acl = 'private',
        array $options = []
    ) {
        $body = Stream\create($body);
        $options = Collection::fromConfig(array_change_key_case($options), [
            'min_part_size' => AbstractMulti::MIN_PART_SIZE,
            'params'        => [],
            'concurrency'   => $body->getWrapper() == 'plainfile' ? 3 : 1
        ]);

        if ($body->getSize() < $options['min_part_size']) {
            // Perform a simple PutObject operation
            return $this->putObject([
                'Bucket' => $bucket,
                'Key'    => $key,
                'Body'   => $body,
                'ACL'    => $acl
            ] + $options['params']);
        }

        // Perform a multipart upload if the file is large enough
        $transfer = UploadBuilder::newInstance()
            ->setBucket($bucket)
            ->setKey($key)
            ->setMinPartSize($options['min_part_size'])
            ->setConcurrency($options['concurrency'])
            ->setClient($this)
            ->setSource($body)
            ->setTransferOptions($options->toArray())
            ->addOptions($options['params'])
            ->setOption('ACL', $acl)
            ->build()
            ->upload();

        if ($options['before_upload']) {
            $transfer->getEmitter()->on('prepare', $options['before_upload']);
        }

        return $transfer;
    }

    /**
     * Recursively uploads all files in a given directory to a given bucket.
     *
     * @param string $directory Full path to a directory to upload
     * @param string $bucket    Name of the bucket
     * @param string $keyPrefix Virtual directory key prefix to add to each upload
     * @param array  $options   Associative array of upload options
     *
     *     - params: Array of parameters to use with each PutObject operation
     *       performed during the transfer.
     *     - base_dir: Base directory to remove from each object key
     *     - force: Set to true to upload every file, even if the file is
     *       already in Amazon S3 and has not changed.
     *     - concurrency: Maximum number of parallel uploads (defaults to 10)
     *     - debug: Set to true or an fopen resource to enable debug mode to
     *       print information about each upload.
     *     - multipart_upload_size: When the size of a file exceeds this value,
     *       the file will be uploaded using a multipart upload.
     *
     * @see Aws\S3\S3Sync\S3Sync for more options and customization
     */
    public function uploadDirectory(
        $directory,
        $bucket,
        $keyPrefix = null,
        array $options = []
    ) {
        $this->validateSyncInstalled();

        return UploadSyncBuilder::uploadDirectory(
            $directory,
            $bucket,
            $keyPrefix,
            $options
        );
    }

    /**
     * Downloads a bucket to the local filesystem
     *
     * @param string $directory Directory to download to
     * @param string $bucket    Bucket to download from
     * @param string $keyPrefix Only download objects that use this key prefix
     * @param array  $options   Associative array of download options
     *
     *     - params: Array of parameters to use with each GetObject operation
     *       performed during the transfer
     *     - base_dir: Base directory to remove from each object key when
     *       storing in the local filesystem
     *     - force: Set to true to download every file, even if the file is
     *       already on the local filesystem and has not changed
     *     - concurrency: Maximum number of parallel downloads (defaults to 10)
     *     - debug: Set to true or a fopen resource to enable debug mode to
     *       print information about each download
     *     - allow_resumable: Set to true to allow previously interrupted
     *       downloads to be resumed using a Range GET
     */
    public function downloadBucket(
        $directory,
        $bucket,
        $keyPrefix = '',
        array $options = []
    ) {
        $this->validateSyncInstalled();

        return DownloadSyncBuilder::downloadBucket(
            $directory,
            $bucket,
            $keyPrefix,
            $options
        );
    }

    /**
     * Deletes objects from Amazon S3 that match the result of a ListObjects
     * operation.
     *
     * For example, this allows you to do things like delete all objects that
     * match a specific key prefix.
     *
     * @param string $bucket  Bucket that contains the object keys
     * @param string $prefix  Optionally delete only objects under this key prefix
     * @param string $regex   Delete only objects that match this regex
     * @param array  $options Options used when deleting the object:
     *
     *     - before_delete: Callback to invoke before each delete. The callback
     *       will receive a relevant Guzzle event object.
     *
     * @see Aws\S3\S3Client::listObjects
     * @see Aws\S3\Model\ClearBucket For more options or customization
     * @return int Returns the number of deleted keys
     * @throws \RuntimeException if no prefix and no regex is given
     */
    public function deleteMatchingObjects(
        $bucket,
        $prefix = '',
        $regex = '',
        array $options = []
    ) {
        if (!$prefix && !$regex) {
            throw new \RuntimeException('A prefix or regex is required, or '
                . 'use S3Client::clearBucket().');
        }

        $clear = new ClearBucket($this, $bucket);
        $iterator = $this->getIterator('ListObjects', [
            'Bucket' => $bucket,
            'Prefix' => $prefix
        ]);

        if ($regex) {
            $iterator = new \CallbackFilterIterator(
                $iterator,
                function ($current) use ($regex) {
                    return preg_match($regex, $current['Key']);
                }
            );
        }

        $clear->setIterator($iterator);
        if (isset($options['before_delete'])) {
            $clear->getEmitter()->on(
                ClearBucket::BEFORE_CLEAR,
                $options['before_delete']
            );
        }

        return $clear->clear();
    }

    /**
     * Determines whether or not a resource exists using a command
     *
     * @param CommandInterface $command   Command used to poll for the resource
     * @param bool             $accept403 Set to true if 403s are acceptable
     *
     * @return bool
     * @throws S3Exception|\Exception if there is an unhandled exception
     */
    private function checkExistenceWithCommand(
        CommandInterface $command,
        $accept403 = false
    ) {
        try {
            $this->execute($command);
            $exists = true;
        } catch (S3Exception $e) {
            if ($e->getAwsErrorCode('AccessDenied')) {
                return (bool) $accept403;
            }
            $exists = false;
            if ($e->getResponse()->getStatusCode() >= 500) {
                throw $e;
            }
        }

        return $exists;
    }

    private function validateSyncInstalled()
    {
        if (class_exists('Aws\S3\Sync\AbstractSync')) {
            return;
        }

        $caller = debug_backtrace()[2]['function'];

        throw new \RuntimeException("The aws/s3-sync Composer package must "
            . " be installed in order to use the {$caller} function.");
    }
}
