<?php
namespace Aws\Glacier;

use Aws\Api\ApiProvider;
use Aws\Api\DocModel;
use Aws\Api\Service;
use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\Exception\CouldNotCreateChecksumException;
use Aws\HashingStream;
use Aws\Middleware;
use Aws\PhpHash;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **Amazon Glacier** service.
 *
 * @method \Aws\Result abortMultipartUpload(array $args = [])
 * @phpstan-method \Aws\Result abortMultipartUpload(array{accountId?: string, vaultName?: string, uploadId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise abortMultipartUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise abortMultipartUploadAsync(array{accountId?: string, vaultName?: string, uploadId?: string, ...} $args = [])
 * @method \Aws\Result abortVaultLock(array $args = [])
 * @phpstan-method \Aws\Result abortVaultLock(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise abortVaultLockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise abortVaultLockAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result addTagsToVault(array $args = [])
 * @phpstan-method \Aws\Result addTagsToVault(array{accountId?: string, vaultName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToVaultAsync(array{accountId?: string, vaultName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result completeMultipartUpload(array $args = [])
 * @phpstan-method \Aws\Result completeMultipartUpload(array{accountId?: string, vaultName?: string, uploadId?: string, archiveSize?: string, checksum?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeMultipartUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeMultipartUploadAsync(array{accountId?: string, vaultName?: string, uploadId?: string, archiveSize?: string, checksum?: string, ...} $args = [])
 * @method \Aws\Result completeVaultLock(array $args = [])
 * @phpstan-method \Aws\Result completeVaultLock(array{accountId?: string, vaultName?: string, lockId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeVaultLockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeVaultLockAsync(array{accountId?: string, vaultName?: string, lockId?: string, ...} $args = [])
 * @method \Aws\Result createVault(array $args = [])
 * @phpstan-method \Aws\Result createVault(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVaultAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result deleteArchive(array $args = [])
 * @phpstan-method \Aws\Result deleteArchive(array{accountId?: string, vaultName?: string, archiveId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteArchiveAsync(array{accountId?: string, vaultName?: string, archiveId?: string, ...} $args = [])
 * @method \Aws\Result deleteVault(array $args = [])
 * @phpstan-method \Aws\Result deleteVault(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVaultAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result deleteVaultAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteVaultAccessPolicy(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVaultAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVaultAccessPolicyAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result deleteVaultNotifications(array $args = [])
 * @phpstan-method \Aws\Result deleteVaultNotifications(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVaultNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVaultNotificationsAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result describeJob(array $args = [])
 * @phpstan-method \Aws\Result describeJob(array{accountId?: string, vaultName?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobAsync(array{accountId?: string, vaultName?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result describeVault(array $args = [])
 * @phpstan-method \Aws\Result describeVault(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVaultAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result getDataRetrievalPolicy(array $args = [])
 * @phpstan-method \Aws\Result getDataRetrievalPolicy(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataRetrievalPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataRetrievalPolicyAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result getJobOutput(array $args = [])
 * @phpstan-method \Aws\Result getJobOutput(array{accountId?: string, vaultName?: string, jobId?: string, range?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobOutputAsync(array{accountId?: string, vaultName?: string, jobId?: string, range?: string, ...} $args = [])
 * @method \Aws\Result getVaultAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result getVaultAccessPolicy(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVaultAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVaultAccessPolicyAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result getVaultLock(array $args = [])
 * @phpstan-method \Aws\Result getVaultLock(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVaultLockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVaultLockAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result getVaultNotifications(array $args = [])
 * @phpstan-method \Aws\Result getVaultNotifications(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVaultNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVaultNotificationsAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result initiateJob(array $args = [])
 * @phpstan-method \Aws\Result initiateJob(array{
 *     accountId?: string,
 *     vaultName?: string,
 *     jobParameters?: array{
 *         Format?: string,
 *         Type?: string,
 *         ArchiveId?: string,
 *         Description?: string,
 *         SNSTopic?: string,
 *         RetrievalByteRange?: string,
 *         Tier?: string,
 *         InventoryRetrievalParameters?: array{StartDate?: string, EndDate?: string, Limit?: string, Marker?: string, ...},
 *         SelectParameters?: array{
 *             InputSerialization?: array,
 *             ExpressionType?: 'SQL',
 *             Expression?: string,
 *             OutputSerialization?: array,
 *             ...,
 *         },
 *         OutputLocation?: array{S3?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise initiateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initiateJobAsync(array{
 *     accountId?: string,
 *     vaultName?: string,
 *     jobParameters?: array{
 *         Format?: string,
 *         Type?: string,
 *         ArchiveId?: string,
 *         Description?: string,
 *         SNSTopic?: string,
 *         RetrievalByteRange?: string,
 *         Tier?: string,
 *         InventoryRetrievalParameters?: array{StartDate?: string, EndDate?: string, Limit?: string, Marker?: string, ...},
 *         SelectParameters?: array{
 *             InputSerialization?: array,
 *             ExpressionType?: 'SQL',
 *             Expression?: string,
 *             OutputSerialization?: array,
 *             ...,
 *         },
 *         OutputLocation?: array{S3?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result initiateMultipartUpload(array $args = [])
 * @phpstan-method \Aws\Result initiateMultipartUpload(array{accountId?: string, vaultName?: string, archiveDescription?: string, partSize?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise initiateMultipartUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initiateMultipartUploadAsync(array{accountId?: string, vaultName?: string, archiveDescription?: string, partSize?: string, ...} $args = [])
 * @method \Aws\Result initiateVaultLock(array $args = [])
 * @phpstan-method \Aws\Result initiateVaultLock(array{accountId?: string, vaultName?: string, policy?: array{Policy?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise initiateVaultLockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initiateVaultLockAsync(array{accountId?: string, vaultName?: string, policy?: array{Policy?: string, ...}, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{
 *     accountId?: string,
 *     vaultName?: string,
 *     limit?: string,
 *     marker?: string,
 *     statuscode?: string,
 *     completed?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{
 *     accountId?: string,
 *     vaultName?: string,
 *     limit?: string,
 *     marker?: string,
 *     statuscode?: string,
 *     completed?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMultipartUploads(array $args = [])
 * @phpstan-method \Aws\Result listMultipartUploads(array{accountId?: string, vaultName?: string, marker?: string, limit?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultipartUploadsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMultipartUploadsAsync(array{accountId?: string, vaultName?: string, marker?: string, limit?: string, ...} $args = [])
 * @method \Aws\Result listParts(array $args = [])
 * @phpstan-method \Aws\Result listParts(array{accountId?: string, vaultName?: string, uploadId?: string, marker?: string, limit?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPartsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPartsAsync(array{accountId?: string, vaultName?: string, uploadId?: string, marker?: string, limit?: string, ...} $args = [])
 * @method \Aws\Result listProvisionedCapacity(array $args = [])
 * @phpstan-method \Aws\Result listProvisionedCapacity(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisionedCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisionedCapacityAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result listTagsForVault(array $args = [])
 * @phpstan-method \Aws\Result listTagsForVault(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForVaultAsync(array{accountId?: string, vaultName?: string, ...} $args = [])
 * @method \Aws\Result listVaults(array $args = [])
 * @phpstan-method \Aws\Result listVaults(array{accountId?: string, marker?: string, limit?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVaultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVaultsAsync(array{accountId?: string, marker?: string, limit?: string, ...} $args = [])
 * @method \Aws\Result purchaseProvisionedCapacity(array $args = [])
 * @phpstan-method \Aws\Result purchaseProvisionedCapacity(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseProvisionedCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseProvisionedCapacityAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result removeTagsFromVault(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromVault(array{accountId?: string, vaultName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromVaultAsync(array{accountId?: string, vaultName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result setDataRetrievalPolicy(array $args = [])
 * @phpstan-method \Aws\Result setDataRetrievalPolicy(array{accountId?: string, Policy?: array{Rules?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDataRetrievalPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDataRetrievalPolicyAsync(array{accountId?: string, Policy?: array{Rules?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result setVaultAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result setVaultAccessPolicy(array{accountId?: string, vaultName?: string, policy?: array{Policy?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setVaultAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setVaultAccessPolicyAsync(array{accountId?: string, vaultName?: string, policy?: array{Policy?: string, ...}, ...} $args = [])
 * @method \Aws\Result setVaultNotifications(array $args = [])
 * @phpstan-method \Aws\Result setVaultNotifications(array{
 *     accountId?: string,
 *     vaultName?: string,
 *     vaultNotificationConfig?: array{SNSTopic?: string, Events?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setVaultNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setVaultNotificationsAsync(array{
 *     accountId?: string,
 *     vaultName?: string,
 *     vaultNotificationConfig?: array{SNSTopic?: string, Events?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result uploadArchive(array $args = [])
 * @phpstan-method \Aws\Result uploadArchive(array{
 *     vaultName?: string,
 *     accountId?: string,
 *     archiveDescription?: string,
 *     checksum?: string,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadArchiveAsync(array{
 *     vaultName?: string,
 *     accountId?: string,
 *     archiveDescription?: string,
 *     checksum?: string,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result uploadMultipartPart(array $args = [])
 * @phpstan-method \Aws\Result uploadMultipartPart(array{
 *     accountId?: string,
 *     vaultName?: string,
 *     uploadId?: string,
 *     checksum?: string,
 *     range?: string,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadMultipartPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadMultipartPartAsync(array{
 *     accountId?: string,
 *     vaultName?: string,
 *     uploadId?: string,
 *     checksum?: string,
 *     range?: string,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class GlacierClient extends AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);

        // Setup middleware.
        $stack = $this->getHandlerList();
        $stack->appendBuild($this->getApiVersionMiddleware(), 'glacier.api_version');
        $stack->appendBuild($this->getChecksumsMiddleware(), 'glacier.checksum');
        $stack->appendBuild(
            Middleware::contentType(['UploadArchive', 'UploadPart']),
            'glacier.content_type'
        );
        $stack->appendInit(
            Middleware::sourceFile($this->getApi(), 'body', 'sourceFile'),
            'glacier.source_file'
        );
    }

    /**
     * {@inheritdoc}
     *
     * Sets the default accountId to "-" for all operations.
     */
    public function getCommand($name, array $args = [])
    {
        return parent::getCommand($name, $args + ['accountId' => '-']);
    }

    /**
     * Creates a middleware that updates a command with the content and tree
     * hash headers for upload operations.
     *
     * @return callable
     * @throws CouldNotCreateChecksumException if the body is not seekable.
     */
    private function getChecksumsMiddleware()
    {
        return static function (callable $handler) {
            return static function (
                CommandInterface $command,
                ?RequestInterface $request = null
            ) use ($handler) {
                // Accept "ContentSHA256" with a lowercase "c" to match other Glacier params.
                if (!$command['ContentSHA256'] && $command['contentSHA256']) {
                    $command['ContentSHA256'] = $command['contentSHA256'];
                    unset($command['contentSHA256']);
                }

                // If uploading, then make sure checksums are added.
                $name = $command->getName();
                if (($name === 'UploadArchive' || $name === 'UploadMultipartPart')
                    && (!$command['checksum'] || !$command['ContentSHA256'])
                ) {
                    $body = $request->getBody();
                    if (!$body->isSeekable()) {
                        throw new CouldNotCreateChecksumException('sha256');
                    }

                    // Add a tree hash if not provided.
                    if (!$command['checksum']) {
                        $body = new HashingStream(
                            $body, new TreeHash(),
                            function ($result) use (&$request) {
                                $request = $request->withHeader(
                                    'x-amz-sha256-tree-hash',
                                    bin2hex($result)
                                );
                            }
                        );
                    }

                    // Add a linear content hash if not provided.
                    if (!$command['ContentSHA256']) {
                        $body = new HashingStream(
                            $body, new PhpHash('sha256'),
                            function ($result) use ($command) {
                                $command['ContentSHA256'] = bin2hex($result);
                            }
                        );
                    }

                    // Read the stream in order to calculate the hashes.
                    while (!$body->eof()) {
                        $body->read(1048576);
                    }
                    $body->seek(0);
                }

                // Set the content hash header if a value is in the command.
                if ($command['ContentSHA256']) {
                    $request = $request->withHeader(
                        'x-amz-content-sha256',
                        $command['ContentSHA256']
                    );
                }

                return $handler($command, $request);
            };
        };
    }

    /**
     * Creates a middleware that adds the API version header for all requests.
     *
     * @return callable
     */
    private function getApiVersionMiddleware()
    {
        $apiVersion = $this->getApi()->getMetadata('apiVersion');
        return static function (callable $handler) use ($apiVersion)  {
            return static function (
                CommandInterface $command,
                ?RequestInterface $request = null
            ) use ($handler, $apiVersion) {
                return $handler($command, $request->withHeader(
                    'x-amz-glacier-version',
                    $apiVersion
                ));
            };
        };
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Add the SourceFile parameter.
        $docs['shapes']['SourceFile']['base'] = 'The path to a file on disk to use instead of the body parameter.';
        $api['shapes']['SourceFile'] = ['type' => 'string'];
        $api['shapes']['UploadArchiveInput']['members']['sourceFile'] = ['shape' => 'SourceFile'];
        $api['shapes']['UploadMultipartPartInput']['members']['sourceFile'] = ['shape' => 'SourceFile'];

        // Add the ContentSHA256 parameter.
        $docs['shapes']['ContentSHA256']['base'] = 'A SHA256 hash of the content of the request body';
        $api['shapes']['ContentSHA256'] = ['type' => 'string'];
        $api['shapes']['UploadArchiveInput']['members']['contentSHA256'] = ['shape' => 'ContentSHA256'];
        $api['shapes']['UploadMultipartPartInput']['members']['contentSHA256'] = ['shape' => 'ContentSHA256'];

        // Add information about "checksum" and "ContentSHA256" being optional.
        $optional = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf if it is not supplied.</div>';
        $docs['shapes']['checksum']['append'] = $optional;
        $docs['shapes']['ContentSHA256']['append'] = $optional;

        // Make "accountId" optional for all operations.
        foreach ($api['operations'] as $operation) {
            $inputShape =& $api['shapes'][$operation['input']['shape']];
            $accountIdIndex = array_search('accountId', $inputShape['required']);
            unset($inputShape['required'][$accountIdIndex]);
        }
        // Add information about the default value for "accountId".
        $optional = '<div class="alert alert-info">The SDK will set this value to "-" by default.</div>';
        foreach ($docs['shapes']['string']['refs'] as $name => &$ref) {
            if (strpos($name, 'accountId')) {
                $ref .= $optional;
            }
        }

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
