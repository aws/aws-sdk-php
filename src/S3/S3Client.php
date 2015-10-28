<?php
namespace Aws\S3;

use Aws\Api\ApiProvider;
use Aws\Api\DocModel;
use Aws\Api\Service;
use Aws\AwsClient;
use Aws\ClientResolver;
use Aws\Command;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\Middleware;
use Aws\RetryMiddleware;
use Aws\S3\Exception\S3Exception;
use Aws\ResultInterface;
use Aws\CommandInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Client used to interact with **Amazon Simple Storage Service (Amazon S3)**.
 *
 * @method \Aws\Result abortMultipartUpload(array $args = [])
 * @method \GuzzleHttp\Promise\Promise abortMultipartUploadAsync(array $args = [])
 * @method \Aws\Result completeMultipartUpload(array $args = [])
 * @method \GuzzleHttp\Promise\Promise completeMultipartUploadAsync(array $args = [])
 * @method \Aws\Result copyObject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise copyObjectAsync(array $args = [])
 * @method \Aws\Result createBucket(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createBucketAsync(array $args = [])
 * @method \Aws\Result createMultipartUpload(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMultipartUploadAsync(array $args = [])
 * @method \Aws\Result deleteBucket(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketAsync(array $args = [])
 * @method \Aws\Result deleteBucketCors(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketCorsAsync(array $args = [])
 * @method \Aws\Result deleteBucketLifecycle(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketLifecycleAsync(array $args = [])
 * @method \Aws\Result deleteBucketPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketPolicyAsync(array $args = [])
 * @method \Aws\Result deleteBucketReplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketReplicationAsync(array $args = [])
 * @method \Aws\Result deleteBucketTagging(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketTaggingAsync(array $args = [])
 * @method \Aws\Result deleteBucketWebsite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketWebsiteAsync(array $args = [])
 * @method \Aws\Result deleteObject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObjectAsync(array $args = [])
 * @method \Aws\Result deleteObjects(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObjectsAsync(array $args = [])
 * @method \Aws\Result getBucketAcl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketAclAsync(array $args = [])
 * @method \Aws\Result getBucketCors(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketCorsAsync(array $args = [])
 * @method \Aws\Result getBucketLifecycle(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLifecycleAsync(array $args = [])
 * @method \Aws\Result getBucketLifecycleConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLifecycleConfigurationAsync(array $args = [])
 * @method \Aws\Result getBucketLocation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLocationAsync(array $args = [])
 * @method \Aws\Result getBucketLogging(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLoggingAsync(array $args = [])
 * @method \Aws\Result getBucketNotification(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketNotificationAsync(array $args = [])
 * @method \Aws\Result getBucketNotificationConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketNotificationConfigurationAsync(array $args = [])
 * @method \Aws\Result getBucketPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketPolicyAsync(array $args = [])
 * @method \Aws\Result getBucketReplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketReplicationAsync(array $args = [])
 * @method \Aws\Result getBucketRequestPayment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketRequestPaymentAsync(array $args = [])
 * @method \Aws\Result getBucketTagging(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketTaggingAsync(array $args = [])
 * @method \Aws\Result getBucketVersioning(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketVersioningAsync(array $args = [])
 * @method \Aws\Result getBucketWebsite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketWebsiteAsync(array $args = [])
 * @method \Aws\Result getObject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectAsync(array $args = [])
 * @method \Aws\Result getObjectAcl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectAclAsync(array $args = [])
 * @method \Aws\Result getObjectTorrent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectTorrentAsync(array $args = [])
 * @method \Aws\Result headBucket(array $args = [])
 * @method \GuzzleHttp\Promise\Promise headBucketAsync(array $args = [])
 * @method \Aws\Result headObject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise headObjectAsync(array $args = [])
 * @method \Aws\Result listBuckets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listBucketsAsync(array $args = [])
 * @method \Aws\Result listMultipartUploads(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultipartUploadsAsync(array $args = [])
 * @method \Aws\Result listObjectVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectVersionsAsync(array $args = [])
 * @method \Aws\Result listObjects(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectsAsync(array $args = [])
 * @method \Aws\Result listParts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPartsAsync(array $args = [])
 * @method \Aws\Result putBucketAcl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketAclAsync(array $args = [])
 * @method \Aws\Result putBucketCors(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketCorsAsync(array $args = [])
 * @method \Aws\Result putBucketLifecycle(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketLifecycleAsync(array $args = [])
 * @method \Aws\Result putBucketLifecycleConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketLifecycleConfigurationAsync(array $args = [])
 * @method \Aws\Result putBucketLogging(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketLoggingAsync(array $args = [])
 * @method \Aws\Result putBucketNotification(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketNotificationAsync(array $args = [])
 * @method \Aws\Result putBucketNotificationConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketNotificationConfigurationAsync(array $args = [])
 * @method \Aws\Result putBucketPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketPolicyAsync(array $args = [])
 * @method \Aws\Result putBucketReplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketReplicationAsync(array $args = [])
 * @method \Aws\Result putBucketRequestPayment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketRequestPaymentAsync(array $args = [])
 * @method \Aws\Result putBucketTagging(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketTaggingAsync(array $args = [])
 * @method \Aws\Result putBucketVersioning(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketVersioningAsync(array $args = [])
 * @method \Aws\Result putBucketWebsite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketWebsiteAsync(array $args = [])
 * @method \Aws\Result putObject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectAsync(array $args = [])
 * @method \Aws\Result putObjectAcl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectAclAsync(array $args = [])
 * @method \Aws\Result restoreObject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreObjectAsync(array $args = [])
 * @method \Aws\Result uploadPart(array $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadPartAsync(array $args = [])
 * @method \Aws\Result uploadPartCopy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadPartCopyAsync(array $args = [])
 */
class S3Client extends AwsClient
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['retries']['fn'] = [__CLASS__, '_applyRetryConfig'];
        $args['api_provider']['fn'] = [__CLASS__, '_applyApiProvider'];

        return $args + [
            'bucket_endpoint' => [
                'type'    => 'config',
                'valid'   => ['bool'],
                'doc'     => 'Set to true to send requests to a hardcoded '
                    . 'bucket endpoint rather than create an endpoint as a '
                    . 'result of injecting the bucket into the URL. This '
                    . 'option is useful for interacting with CNAME endpoints.',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * In addition to the options available to
     * {@see Aws\AwsClient::__construct}, S3Client accepts the following
     * options:
     *
     * - bucket_endpoint: (bool) Set to true to send requests to a
     *   hardcoded bucket endpoint rather than create an endpoint as a result
     *   of injecting the bucket into the URL. This option is useful for
     *   interacting with CNAME endpoints.
     * - calculate_md5: (bool) Set to false to disable calculating an MD5
     *   for all Amazon S3 signed uploads.
     *
     * @param array $args
     */
    public function __construct(array $args)
    {
        parent::__construct($args);
        $stack = $this->getHandlerList();
        $stack->appendInit(SSECMiddleware::wrap($this->getEndpoint()->getScheme()), 's3.ssec');
        $stack->appendBuild(ApplyChecksumMiddleware::wrap(), 's3.checksum');
        $stack->appendBuild(
            Middleware::contentType(['PutObject', 'UploadPart']),
            's3.content_type'
        );

        // Use the bucket style middleware when using a "bucket_endpoint" (for cnames)
        if ($this->getConfig('bucket_endpoint')) {
            $stack->appendBuild(BucketEndpointMiddleware::wrap(), 's3.bucket_endpoint');
        }

        $stack->appendSign(PutObjectUrlMiddleware::wrap(), 's3.put_object_url');
        $stack->appendSign(PermanentRedirectMiddleware::wrap(), 's3.permanent_redirect');
        $stack->appendInit(Middleware::sourceFile($this->getApi()), 's3.source_file');
        $stack->appendInit($this->getSaveAsParameter(), 's3.save_as');
        $stack->appendInit($this->getLocationConstraintMiddleware(), 's3.location');
    }

    /**
     * Determine if a string is a valid name for a DNS compatible Amazon S3
     * bucket.
     *
     * DNS compatible bucket names can be used as a subdomain in a URL (e.g.,
     * "<bucket>.s3.amazonaws.com").
     *
     * @param string $bucket Bucket name to check.
     *
     * @return bool
     */
    public static function isBucketDnsCompatible($bucket)
    {
        $bucketLen = strlen($bucket);

        return ($bucketLen >= 3 && $bucketLen <= 63) &&
            // Cannot look like an IP address
            !filter_var($bucket, FILTER_VALIDATE_IP) &&
            preg_match('/^[a-z0-9]([a-z0-9\-\.]*[a-z0-9])?$/', $bucket);
    }

    /**
     * Create a pre-signed URL for the given S3 command object.
     *
     * @param CommandInterface $command     Command to create a pre-signed
     *                                      URL for.
     * @param int|string|\DateTime $expires The time at which the URL should
     *                                      expire. This can be a Unix
     *                                      timestamp, a PHP DateTime object,
     *                                      or a string that can be evaluated
     *                                      by strtotime().
     *
     * @return RequestInterface
     */
    public function createPresignedRequest(CommandInterface $command, $expires)
    {
        /** @var \Aws\Signature\SignatureInterface $signer */
        $signer = call_user_func(
            $this->getSignatureProvider(),
            $this->getConfig('signature_version'),
            $this->getApi()->getSigningName(),
            $this->getRegion()
        );

        return $signer->presign(
            \Aws\serialize($command),
            $this->getCredentials()->wait(),
            $expires
        );
    }

    /**
     * Returns the URL to an object identified by its bucket and key.
     *
     * The URL returned by this method is not signed nor does it ensure the the
     * bucket and key given to the method exist. If you need a signed URL, then
     * use the {@see \Aws\S3\S3Client::createPresignedRequest} method and get
     * the URI of the signed request.
     *
     * @param string $bucket  The name of the bucket where the object is located
     * @param string $key     The key of the object
     *
     * @return string The URL to the object
     */
    public function getObjectUrl($bucket, $key)
    {
        $command = $this->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key'    => $key
        ]);

        return (string) \Aws\serialize($command)->getUri();
    }

    /**
     * Determines whether or not a bucket exists by name.
     *
     * @param string $bucket  The name of the bucket
     *
     * @return bool
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
     * @param string $bucket  The name of the bucket
     * @param string $key     The key of the object
     * @param array  $options Additional options available in the HeadObject
     *                        operation (e.g., VersionId).
     *
     * @return bool
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
     * Register the Amazon S3 stream wrapper with this client instance.
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
     * @param string $bucket  Bucket that contains the object keys
     * @param string $prefix  Optionally delete only objects under this key prefix
     * @param string $regex   Delete only objects that match this regex
     * @param array  $options Aws\S3\BatchDelete options array.
     *
     * @see Aws\S3\S3Client::listObjects
     * @throws \RuntimeException if no prefix and no regex is given
     */
    public function deleteMatchingObjects(
        $bucket,
        $prefix = '',
        $regex = '',
        array $options = []
    ) {
        if (!$prefix && !$regex) {
            throw new \RuntimeException('A prefix or regex is required.');
        }

        $params = ['Bucket' => $bucket, 'Prefix' => $prefix];
        $iter = $this->getIterator('ListObjects', $params);

        if ($regex) {
            $iter = \Aws\filter($iter, function ($c) use ($regex) {
                return preg_match($regex, $c['Key']);
            });
        }

        BatchDelete::fromIterator($this, $bucket, $iter, $options)->delete();
    }

    /**
     * Upload a file, stream, or string to a bucket.
     *
     * If the upload size exceeds the specified threshold, the upload will be
     * performed using concurrent multipart uploads.
     *
     * The options array accepts the following options:
     *
     * - before_upload: (callable) Callback to invoke before any upload
     *   operations during the upload process. The callback should have a
     *   function signature like `function (Aws\Command $command) {...}`.
     * - concurrency: (int, default=int(3)) Maximum number of concurrent
     *   `UploadPart` operations allowed during a multipart upload.
     * - mup_threshold: (int, default=int(16777216)) The size, in bytes, allowed
     *   before the upload must be sent via a multipart upload. Default: 16 MB.
     * - params: (array, default=array([])) Custom parameters to use with the
     *   upload. For single uploads, they must correspond to those used for the
     *   `PutObject` operation. For multipart uploads, they correspond to the
     *   parameters of the `CreateMultipartUpload` operation.
     * - part_size: (int) Part size to use when doing a multipart upload.
     *
     * @param string $bucket  Bucket to upload the object.
     * @param string $key     Key of the object.
     * @param mixed  $body    Object data to upload. Can be a
     *                        StreamInterface, PHP stream resource, or a
     *                        string of data to upload.
     * @param string $acl     ACL to apply to the object (default: private).
     * @param array  $options Options used to configure the upload process.
     *
     * @see Aws\S3\MultipartUploader for more info about multipart uploads.
     * @return ResultInterface Returns the result of the upload.
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
     * Upload a file, stream, or string to a bucket asynchronously.
     *
     * @param string $bucket  Bucket to upload the object.
     * @param string $key     Key of the object.
     * @param mixed  $body    Object data to upload. Can be a
     *                        StreamInterface, PHP stream resource, or a
     *                        string of data to upload.
     * @param string $acl     ACL to apply to the object (default: private).
     * @param array  $options Options used to configure the upload process.
     *
     * @see self::upload
     * @return PromiseInterface     Returns a promise that will be fulfilled
     *                              with the result of the upload.
     */
    public function uploadAsync(
        $bucket,
        $key,
        $body,
        $acl = 'private',
        array $options = []
    ) {
        // Prepare the options.
        static $defaults = [
            'before_upload' => null,
            'concurrency'   => 3,
            'mup_threshold' => 16777216,
            'params'        => [],
            'part_size'     => null,
        ];
        $options = array_intersect_key($options + $defaults, $defaults);

        // Perform the required operations to upload the S3 Object.
        $body = Psr7\stream_for($body);
        if ($this->requiresMultipart($body, $options['mup_threshold'])) {
            // Perform a multipart upload.
            $options['before_initiate'] = function ($command) use ($options) {
                foreach ($options['params'] as $k => $v) {
                    $command[$k] = $v;
                }
            };
            return (new MultipartUploader($this, $body, [
                'bucket' => $bucket,
                'key'    => $key,
                'acl'    => $acl
            ] + $options))->promise();
        } else {
            // Perform a regular PutObject operation.
            $command = $this->getCommand('PutObject', [
                'Bucket' => $bucket,
                'Key'    => $key,
                'Body'   => $body,
                'ACL'    => $acl,
            ] + $options['params']);
            if (is_callable($options['before_upload'])) {
                $options['before_upload']($command);
            }
            return $this->executeAsync($command);
        }
    }

    /**
     * Copy an object of any size to a different location.
     *
     * If the upload size exceeds the maximum allowable size for direct S3
     * copying, a multipart copy will be used.
     *
     * The options array accepts the following options:
     *
     * - before_upload: (callable) Callback to invoke before any upload
     *   operations during the upload process. The callback should have a
     *   function signature like `function (Aws\Command $command) {...}`.
     * - concurrency: (int, default=int(5)) Maximum number of concurrent
     *   `UploadPart` operations allowed during a multipart upload.
     * - params: (array, default=array([])) Custom parameters to use with the
     *   upload. For single uploads, they must correspond to those used for the
     *   `CopyObject` operation. For multipart uploads, they correspond to the
     *   parameters of the `CreateMultipartUpload` operation.
     * - part_size: (int) Part size to use when doing a multipart upload.
     *
     * @param string $fromBucket    Bucket where the copy source resides.
     * @param string $fromKey       Key of the copy source.
     * @param string $destBucket    Bucket to which to copy the object.
     * @param string $destKey       Key to which to copy the object.
     * @param string $acl           ACL to apply to the copy (default: private).
     * @param array  $options       Options used to configure the upload process.
     *
     * @see Aws\S3\MultipartCopy for more info about multipart uploads.
     * @return ResultInterface Returns the result of the copy.
     */
    public function copy(
        $fromBucket,
        $fromKey,
        $destBucket,
        $destKey,
        $acl = 'private',
        array $options = []
    ) {
        return $this
            ->copyAsync($fromBucket, $fromKey, $destBucket, $destKey, $acl, $options)
            ->wait();
    }

    /**
     * Copy an object of any size to a different location asynchronously.
     *
     * @param string $fromBucket    Bucket where the copy source resides.
     * @param string $fromKey       Key of the copy source.
     * @param string $destBucket    Bucket to which to copy the object.
     * @param string $destKey       Key to which to copy the object.
     * @param string $acl           ACL to apply to the copy (default: private).
     * @param array  $options       Options used to configure the upload process.
     *
     * @see self::copy for more info about the parameters above.
     * @return PromiseInterface     Returns a promise that will be fulfilled
     *                              with the result of the copy.
     */
    public function copyAsync(
        $fromBucket,
        $fromKey,
        $destBucket,
        $destKey,
        $acl = 'private',
        array $options = []
    ) {
        // Prepare the options.
        static $defaults = [
            'before_upload' => null,
            'concurrency'   => 5,
            'mup_threshold' => MultipartUploader::PART_MAX_SIZE,
            'params'        => [],
            'part_size'     => null,
            'version_id'    => null,
        ];

        return Promise\coroutine($this->doCopyAsync(
            ['Bucket' => $fromBucket, 'Key' => $fromKey],
            ['Bucket' => $destBucket, 'Key' => $destKey],
            $acl,
            $options + $defaults
        ));
    }

    private function doCopyAsync(
        array $source,
        array $destination,
        $acl,
        array $options
    ) {
        return function () use ($source, $destination, $acl, $options) {
            $sourcePath = '/' . $source['Bucket'] . '/' . rawurlencode($source['Key']);
            if ($options['version_id']) {
                $sourcePath .= "?versionId={$options['version_id']}";
                $source['VersionId'] = $options['version_id'];
            }

            $objectStats = (yield $this->headObjectAsync($source));

            if ($objectStats['ContentLength'] > $options['mup_threshold']) {
                $mup = new MultipartCopy($this, $sourcePath, $destination + [
                    'source_metadata' => $objectStats,
                    'acl' => $acl,
                ] + $options);

                yield $mup->promise();
            } else {
                yield $this->copyObjectAsync($options + $destination + [
                    'ACL'               => $acl,
                    'MetadataDirective' => 'COPY',
                    'CopySource'        => $sourcePath,
                ] + $options['params']);
            }
        };
    }

    /**
     * Recursively uploads all files in a given directory to a given bucket.
     *
     * @param string $directory Full path to a directory to upload
     * @param string $bucket    Name of the bucket
     * @param string $keyPrefix Virtual directory key prefix to add to each upload
     * @param array  $options   Options available in Aws\S3\Transfer::__construct
     *
     * @see Aws\S3\Transfer for more options and customization
     */
    public function uploadDirectory(
        $directory,
        $bucket,
        $keyPrefix = null,
        array $options = []
    ) {
        $d = "s3://$bucket" . ($keyPrefix ? '/' . ltrim($keyPrefix, '/') : '');
        (new Transfer($this, $directory, $d, $options))->transfer();
    }

    /**
     * Downloads a bucket to the local filesystem
     *
     * @param string $directory Directory to download to
     * @param string $bucket    Bucket to download from
     * @param string $keyPrefix Only download objects that use this key prefix
     * @param array  $options   Options available in Aws\S3\Transfer::__construct
     */
    public function downloadBucket(
        $directory,
        $bucket,
        $keyPrefix = '',
        array $options = []
    ) {
        $s = "s3://$bucket" . ($keyPrefix ? '/' . ltrim($keyPrefix, '/') : '');
        (new Transfer($this, $s, $directory, $options))->transfer();
    }

    /**
     * Determines if the body should be uploaded using PutObject or the
     * Multipart Upload System. It also modifies the passed-in $body as needed
     * to support the upload.
     *
     * @param StreamInterface $body      Stream representing the body.
     * @param integer             $threshold Minimum bytes before using Multipart.
     *
     * @return bool
     */
    private function requiresMultipart(StreamInterface &$body, $threshold)
    {
        // If body size known, compare to threshold to determine if Multipart.
        if ($body->getSize() !== null) {
            return $body->getSize() >= $threshold;
        }

        // Handle the situation where the body size is unknown.
        // Read up to 5MB into a buffer to determine how to upload the body.
        $buffer = Psr7\stream_for();
        Psr7\copy_to_stream($body, $buffer, MultipartUploader::PART_MIN_SIZE);

        // If body < 5MB, use PutObject with the buffer.
        if ($buffer->getSize() < MultipartUploader::PART_MIN_SIZE) {
            $buffer->seek(0);
            $body = $buffer;
            return false;
        }

        // If body >= 5 MB, then use multipart. [YES]
        if ($body->isSeekable()) {
            // If the body is seekable, just rewind the body.
            $body->seek(0);
        } else {
            // If the body is non-seekable, stitch the rewind the buffer and
            // the partially read body together into one stream. This avoids
            // unnecessary disc usage and does not require seeking on the
            // original stream.
            $buffer->seek(0);
            $body = new Psr7\AppendStream([$buffer, $body]);
        }

        return true;
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
     * Provides a middleware that removes the need to specify LocationConstraint on CreateBucket.
     *
     * @return \Closure
     */
    private function getLocationConstraintMiddleware()
    {
        $region = $this->getRegion();
        return static function (callable $handler) use ($region) {
            return function (Command $command, $request = null) use ($handler, $region) {
                if ($command->getName() === 'CreateBucket') {
                    $locationConstraint = isset($command['CreateBucketConfiguration']['LocationConstraint'])
                        ? $command['CreateBucketConfiguration']['LocationConstraint']
                        : null;

                    if ($locationConstraint === 'us-east-1') {
                        unset($command['CreateBucketConfiguration']);
                    } elseif ('us-east-1' !== $region && empty($locationConstraint)) {
                        $command['CreateBucketConfiguration'] = ['LocationConstraint' => $region];
                    }
                }

                return $handler($command, $request);
            };
        };
    }

    /**
     * Provides a middleware that supports the `SaveAs` parameter.
     *
     * @return \Closure
     */
    private function getSaveAsParameter()
    {
        return static function (callable $handler) {
            return function (Command $command, $request = null) use ($handler) {
                if ($command->getName() === 'GetObject' && isset($command['SaveAs'])) {
                    $command['@http']['sink'] = $command['SaveAs'];
                    unset($command['SaveAs']);
                }

                return $handler($command, $request);
            };
        };
    }

    /** @internal */
    public static function _applyRetryConfig($value, $_, HandlerList $list)
    {
        if (!$value) {
            return;
        }

        $decider = RetryMiddleware::createDefaultDecider($value);
        $decider = function ($retries, $command, $request, $result, $error) use ($decider, $value) {
            $maxRetries = null !== $command['@retries']
                ? $command['@retries']
                : $value;

            if ($decider($retries, $command, $request, $result, $error)) {
                return true;
            } elseif ($error instanceof AwsException
                && $retries < $maxRetries
            ) {
                if ($error->getResponse()) {
                    return strpos(
                        $error->getResponse()->getBody(),
                        'Your socket connection to the server'
                    ) !== false;
                } elseif ($error->getPrevious() instanceof RequestException) {
                    // All commands except CompleteMultipartUpload are
                    // idempotent and may be retried without worry if a
                    // networking error has occurred.
                    return $command->getName() !== 'CompleteMultipartUpload';
                }
            }
            return false;
        };

        $delay = [RetryMiddleware::class, 'exponentialDelay'];
        $list->appendSign(Middleware::retry($decider, $delay), 'retry');
    }

    /** @internal */
    public static function _applyApiProvider($value, array &$args, HandlerList $list)
    {
        ClientResolver::_apply_api_provider($value, $args, $list);
        $args['parser'] = new GetBucketLocationParser(
            new AmbiguousSuccessParser(
                new RetryableMalformedResponseParser(
                    $args['parser'],
                    $args['exception_class']
                ),
                $args['error_parser'],
                $args['exception_class']
            )
        );
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        $b64 = '<div class="alert alert-info">This value will be base64 encoded on your behalf.</div>';
        $opt = '<div class="alert alert-info">This value will be computed for you it is not supplied.</div>';

        // Add the SourceFile parameter.
        $docs['shapes']['SourceFile']['base'] = 'The path to a file on disk to use instead of the Body parameter.';
        $api['shapes']['SourceFile'] = ['type' => 'string'];
        $api['shapes']['PutObjectRequest']['members']['SourceFile'] = ['shape' => 'SourceFile'];
        $api['shapes']['UploadPartRequest']['members']['SourceFile'] = ['shape' => 'SourceFile'];

        // Add the ContentSHA256 parameter.
        $docs['shapes']['ContentSHA256']['base'] = 'A SHA256 hash of the body content of the request.';
        $api['shapes']['ContentSHA256'] = ['type' => 'string'];
        $api['shapes']['PutObjectRequest']['members']['ContentSHA256'] = ['shape' => 'ContentSHA256'];
        $api['shapes']['UploadPartRequest']['members']['ContentSHA256'] = ['shape' => 'ContentSHA256'];
        unset($api['shapes']['PutObjectRequest']['members']['ContentMD5']);
        unset($api['shapes']['UploadPartRequest']['members']['ContentMD5']);
        $docs['shapes']['ContentSHA256']['append'] = $opt;

        // Add the SaveAs parameter.
        $docs['shapes']['SaveAs']['base'] = 'The path to a file on disk to save the object data.';
        $api['shapes']['SaveAs'] = ['type' => 'string'];
        $api['shapes']['GetObjectRequest']['members']['SaveAs'] = ['shape' => 'SaveAs'];

        // Several SSECustomerKey documentation updates.
        $docs['shapes']['SSECustomerKey']['append'] = $b64;
        $docs['shapes']['CopySourceSSECustomerKey']['append'] = $b64;
        $docs['shapes']['SSECustomerKeyMd5']['append'] = $opt;

        // Add the ObjectURL to various output shapes and documentation.
        $docs['shapes']['ObjectURL']['base'] = 'The URI of the created object.';
        $api['shapes']['ObjectURL'] = ['type' => 'string'];
        $api['shapes']['PutObjectOutput']['members']['ObjectURL'] = ['shape' => 'ObjectURL'];
        $api['shapes']['CopyObjectOutput']['members']['ObjectURL'] = ['shape' => 'ObjectURL'];
        $api['shapes']['CompleteMultipartUploadOutput']['members']['ObjectURL'] = ['shape' => 'ObjectURL'];

        // Fix references to Location Constraint.
        unset($api['shapes']['CreateBucketRequest']['payload']);
        $api['shapes']['BucketLocationConstraint']['enum'] = [
            "ap-northeast-1",
            "ap-southeast-2",
            "ap-southeast-1",
            "cn-north-1",
            "eu-central-1",
            "eu-west-1",
            "us-east-1",
            "us-west-1",
            "us-west-2",
            "sa-east-1",
        ];

        // Add a note that the ContentMD5 is optional.
        $docs['shapes']['ContentMD5']['append'] = '<div class="alert alert-info">The value will be computed on '
            . 'your behalf.</div>';

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
