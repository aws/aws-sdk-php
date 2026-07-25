<?php
namespace Aws\S3;

use Aws\Api\ApiProvider;
use Aws\Api\DocModel;
use Aws\Api\Service;
use Aws\AwsClient;
use Aws\CacheInterface;
use Aws\ClientResolver;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Configuration\ConfigurationResolver;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\Identity\S3\S3ExpressIdentityProvider;
use Aws\InputValidationMiddleware;
use Aws\Middleware;
use Aws\ResultInterface;
use Aws\Retry\ConfigurationInterface as RetryConfigurationInterface;
use Aws\Retry\QuotaManager;
use Aws\Retry\V3\OptIn as NewRetriesOptIn;
use Aws\Retry\V3\RetryMiddleware as RetryV3Middleware;
use Aws\RetryMiddleware;
use Aws\RetryMiddlewareV2;
use Aws\S3\Parser\GetBucketLocationResultMutator;
use Aws\S3\Parser\S3Parser;
use Aws\S3\Parser\ValidateResponseChecksumResultMutator;
use Aws\S3\RegionalEndpoint\ConfigurationProvider;
use Aws\S3\UseArnRegion\Configuration;
use Aws\S3\UseArnRegion\ConfigurationInterface;
use Aws\S3\UseArnRegion\ConfigurationProvider as UseArnRegionConfigurationProvider;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Client used to interact with **Amazon Simple Storage Service (Amazon S3)**.
 *
 * @method \Aws\Result abortMultipartUpload(array $args = [])
 * @phpstan-method \Aws\Result abortMultipartUpload(array{
 *     Bucket?: string,
 *     Key?: string,
 *     UploadId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     IfMatchInitiatedTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise abortMultipartUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise abortMultipartUploadAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     UploadId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     IfMatchInitiatedTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result completeMultipartUpload(array $args = [])
 * @phpstan-method \Aws\Result completeMultipartUpload(array{
 *     Bucket?: string,
 *     Key?: string,
 *     MultipartUpload?: array{Parts?: list<array>, ...},
 *     UploadId?: string,
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     ChecksumType?: 'COMPOSITE'|'FULL_OBJECT',
 *     MpuObjectSize?: int,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     IfMatch?: string,
 *     IfNoneMatch?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise completeMultipartUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeMultipartUploadAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     MultipartUpload?: array{Parts?: list<array>, ...},
 *     UploadId?: string,
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     ChecksumType?: 'COMPOSITE'|'FULL_OBJECT',
 *     MpuObjectSize?: int,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     IfMatch?: string,
 *     IfNoneMatch?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyObject(array $args = [])
 * @phpstan-method \Aws\Result copyObject(array{
 *     ACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     Bucket?: string,
 *     CacheControl?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ContentDisposition?: string,
 *     ContentEncoding?: string,
 *     ContentLanguage?: string,
 *     ContentType?: string,
 *     CopySource?: string,
 *     CopySourceIfMatch?: string,
 *     CopySourceIfModifiedSince?: int|string|\DateTimeInterface,
 *     CopySourceIfNoneMatch?: string,
 *     CopySourceIfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     Expires?: int|string|\DateTimeInterface,
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWriteACP?: string,
 *     IfMatch?: string,
 *     IfNoneMatch?: string,
 *     Key?: string,
 *     Metadata?: array<string, string>,
 *     MetadataDirective?: 'COPY'|'REPLACE',
 *     TaggingDirective?: 'COPY'|'REPLACE',
 *     AnnotationDirective?: 'COPY'|'EXCLUDE',
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     StorageClass?: 'DEEP_ARCHIVE'|'EXPRESS_ONEZONE'|'FSX_ONTAP'|'FSX_OPENZFS'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'REDUCED_REDUNDANCY'|'SNOW'|'STANDARD'|'STANDARD_IA',
 *     WebsiteRedirectLocation?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     SSEKMSKeyId?: string,
 *     SSEKMSEncryptionContext?: string,
 *     BucketKeyEnabled?: bool,
 *     CopySourceSSECustomerAlgorithm?: string,
 *     CopySourceSSECustomerKey?: string,
 *     CopySourceSSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     Tagging?: string,
 *     ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *     ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *     ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *     ExpectedBucketOwner?: string,
 *     ExpectedSourceBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyObjectAsync(array{
 *     ACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     Bucket?: string,
 *     CacheControl?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ContentDisposition?: string,
 *     ContentEncoding?: string,
 *     ContentLanguage?: string,
 *     ContentType?: string,
 *     CopySource?: string,
 *     CopySourceIfMatch?: string,
 *     CopySourceIfModifiedSince?: int|string|\DateTimeInterface,
 *     CopySourceIfNoneMatch?: string,
 *     CopySourceIfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     Expires?: int|string|\DateTimeInterface,
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWriteACP?: string,
 *     IfMatch?: string,
 *     IfNoneMatch?: string,
 *     Key?: string,
 *     Metadata?: array<string, string>,
 *     MetadataDirective?: 'COPY'|'REPLACE',
 *     TaggingDirective?: 'COPY'|'REPLACE',
 *     AnnotationDirective?: 'COPY'|'EXCLUDE',
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     StorageClass?: 'DEEP_ARCHIVE'|'EXPRESS_ONEZONE'|'FSX_ONTAP'|'FSX_OPENZFS'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'REDUCED_REDUNDANCY'|'SNOW'|'STANDARD'|'STANDARD_IA',
 *     WebsiteRedirectLocation?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     SSEKMSKeyId?: string,
 *     SSEKMSEncryptionContext?: string,
 *     BucketKeyEnabled?: bool,
 *     CopySourceSSECustomerAlgorithm?: string,
 *     CopySourceSSECustomerKey?: string,
 *     CopySourceSSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     Tagging?: string,
 *     ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *     ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *     ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *     ExpectedBucketOwner?: string,
 *     ExpectedSourceBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBucket(array $args = [])
 * @phpstan-method \Aws\Result createBucket(array{
 *     ACL?: 'authenticated-read'|'private'|'public-read'|'public-read-write',
 *     Bucket?: string,
 *     CreateBucketConfiguration?: array{
 *         LocationConstraint?: 'EU'|'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-west-1'|'us-west-2',
 *         Location?: array{Type?: 'AvailabilityZone'|'LocalZone', Name?: string, ...},
 *         Bucket?: array{DataRedundancy?: 'SingleAvailabilityZone'|'SingleLocalZone', Type?: 'Directory', ...},
 *         Tags?: list<array>,
 *         ...,
 *     },
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWrite?: string,
 *     GrantWriteACP?: string,
 *     ObjectLockEnabledForBucket?: bool,
 *     ObjectOwnership?: 'BucketOwnerEnforced'|'BucketOwnerPreferred'|'ObjectWriter',
 *     BucketNamespace?: 'account-regional'|'global',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBucketAsync(array{
 *     ACL?: 'authenticated-read'|'private'|'public-read'|'public-read-write',
 *     Bucket?: string,
 *     CreateBucketConfiguration?: array{
 *         LocationConstraint?: 'EU'|'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-west-1'|'us-west-2',
 *         Location?: array{Type?: 'AvailabilityZone'|'LocalZone', Name?: string, ...},
 *         Bucket?: array{DataRedundancy?: 'SingleAvailabilityZone'|'SingleLocalZone', Type?: 'Directory', ...},
 *         Tags?: list<array>,
 *         ...,
 *     },
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWrite?: string,
 *     GrantWriteACP?: string,
 *     ObjectLockEnabledForBucket?: bool,
 *     ObjectOwnership?: 'BucketOwnerEnforced'|'BucketOwnerPreferred'|'ObjectWriter',
 *     BucketNamespace?: 'account-regional'|'global',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBucketMetadataConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createBucketMetadataConfiguration(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     MetadataConfiguration?: array{
 *         JournalTableConfiguration?: array{RecordExpiration?: array, EncryptionConfiguration?: array, ...},
 *         InventoryTableConfiguration?: array{ConfigurationState?: 'DISABLED'|'ENABLED', EncryptionConfiguration?: array, ...},
 *         AnnotationTableConfiguration?: array{ConfigurationState?: 'DISABLED'|'ENABLED', EncryptionConfiguration?: array, Role?: string, ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBucketMetadataConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBucketMetadataConfigurationAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     MetadataConfiguration?: array{
 *         JournalTableConfiguration?: array{RecordExpiration?: array, EncryptionConfiguration?: array, ...},
 *         InventoryTableConfiguration?: array{ConfigurationState?: 'DISABLED'|'ENABLED', EncryptionConfiguration?: array, ...},
 *         AnnotationTableConfiguration?: array{ConfigurationState?: 'DISABLED'|'ENABLED', EncryptionConfiguration?: array, Role?: string, ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBucketMetadataTableConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createBucketMetadataTableConfiguration(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     MetadataTableConfiguration?: array{S3TablesDestination?: array{TableBucketArn?: string, TableName?: string, ...}, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBucketMetadataTableConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBucketMetadataTableConfigurationAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     MetadataTableConfiguration?: array{S3TablesDestination?: array{TableBucketArn?: string, TableName?: string, ...}, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMultipartUpload(array $args = [])
 * @phpstan-method \Aws\Result createMultipartUpload(array{
 *     ACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     Bucket?: string,
 *     CacheControl?: string,
 *     ContentDisposition?: string,
 *     ContentEncoding?: string,
 *     ContentLanguage?: string,
 *     ContentType?: string,
 *     Expires?: int|string|\DateTimeInterface,
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWriteACP?: string,
 *     Key?: string,
 *     Metadata?: array<string, string>,
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     StorageClass?: 'DEEP_ARCHIVE'|'EXPRESS_ONEZONE'|'FSX_ONTAP'|'FSX_OPENZFS'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'REDUCED_REDUNDANCY'|'SNOW'|'STANDARD'|'STANDARD_IA',
 *     WebsiteRedirectLocation?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     SSEKMSKeyId?: string,
 *     SSEKMSEncryptionContext?: string,
 *     BucketKeyEnabled?: bool,
 *     RequestPayer?: 'requester',
 *     Tagging?: string,
 *     ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *     ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *     ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *     ExpectedBucketOwner?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ChecksumType?: 'COMPOSITE'|'FULL_OBJECT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMultipartUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMultipartUploadAsync(array{
 *     ACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     Bucket?: string,
 *     CacheControl?: string,
 *     ContentDisposition?: string,
 *     ContentEncoding?: string,
 *     ContentLanguage?: string,
 *     ContentType?: string,
 *     Expires?: int|string|\DateTimeInterface,
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWriteACP?: string,
 *     Key?: string,
 *     Metadata?: array<string, string>,
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     StorageClass?: 'DEEP_ARCHIVE'|'EXPRESS_ONEZONE'|'FSX_ONTAP'|'FSX_OPENZFS'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'REDUCED_REDUNDANCY'|'SNOW'|'STANDARD'|'STANDARD_IA',
 *     WebsiteRedirectLocation?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     SSEKMSKeyId?: string,
 *     SSEKMSEncryptionContext?: string,
 *     BucketKeyEnabled?: bool,
 *     RequestPayer?: 'requester',
 *     Tagging?: string,
 *     ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *     ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *     ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *     ExpectedBucketOwner?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ChecksumType?: 'COMPOSITE'|'FULL_OBJECT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSession(array $args = [])
 * @phpstan-method \Aws\Result createSession(array{
 *     SessionMode?: 'ReadOnly'|'ReadWrite',
 *     Bucket?: string,
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     SSEKMSKeyId?: string,
 *     SSEKMSEncryptionContext?: string,
 *     BucketKeyEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSessionAsync(array{
 *     SessionMode?: 'ReadOnly'|'ReadWrite',
 *     Bucket?: string,
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     SSEKMSKeyId?: string,
 *     SSEKMSEncryptionContext?: string,
 *     BucketKeyEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBucket(array $args = [])
 * @phpstan-method \Aws\Result deleteBucket(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketAnalyticsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketAnalyticsConfiguration(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketAnalyticsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketAnalyticsConfigurationAsync(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketCors(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketCors(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketCorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketCorsAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketEncryption(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketEncryption(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketEncryptionAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketIntelligentTieringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketIntelligentTieringConfiguration(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketIntelligentTieringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketIntelligentTieringConfigurationAsync(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketInventoryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketInventoryConfiguration(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketInventoryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketInventoryConfigurationAsync(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketLifecycle(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketLifecycle(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketLifecycleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketLifecycleAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketMetadataConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketMetadataConfiguration(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketMetadataConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketMetadataConfigurationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketMetadataTableConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketMetadataTableConfiguration(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketMetadataTableConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketMetadataTableConfigurationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketMetricsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketMetricsConfiguration(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketMetricsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketMetricsConfigurationAsync(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketOwnershipControls(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketOwnershipControls(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketOwnershipControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketOwnershipControlsAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketPolicy(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketPolicyAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketReplication(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketReplicationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketTagging(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketTagging(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketTaggingAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketWebsite(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketWebsite(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketWebsiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketWebsiteAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteObject(array $args = [])
 * @phpstan-method \Aws\Result deleteObject(array{
 *     Bucket?: string,
 *     Key?: string,
 *     MFA?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     BypassGovernanceRetention?: bool,
 *     ExpectedBucketOwner?: string,
 *     IfMatch?: string,
 *     IfMatchLastModifiedTime?: int|string|\DateTimeInterface,
 *     IfMatchSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteObjectAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     MFA?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     BypassGovernanceRetention?: bool,
 *     ExpectedBucketOwner?: string,
 *     IfMatch?: string,
 *     IfMatchLastModifiedTime?: int|string|\DateTimeInterface,
 *     IfMatchSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteObjectAnnotation(array $args = [])
 * @phpstan-method \Aws\Result deleteObjectAnnotation(array{
 *     Bucket?: string,
 *     Key?: string,
 *     AnnotationName?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ObjectIfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObjectAnnotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteObjectAnnotationAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     AnnotationName?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ObjectIfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteObjectTagging(array $args = [])
 * @phpstan-method \Aws\Result deleteObjectTagging(array{Bucket?: string, Key?: string, VersionId?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObjectTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteObjectTaggingAsync(array{Bucket?: string, Key?: string, VersionId?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result deleteObjects(array $args = [])
 * @phpstan-method \Aws\Result deleteObjects(array{
 *     Bucket?: string,
 *     Delete?: array{Objects?: list<array>, Quiet?: bool, ...},
 *     MFA?: string,
 *     RequestPayer?: 'requester',
 *     BypassGovernanceRetention?: bool,
 *     ExpectedBucketOwner?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteObjectsAsync(array{
 *     Bucket?: string,
 *     Delete?: array{Objects?: list<array>, Quiet?: bool, ...},
 *     MFA?: string,
 *     RequestPayer?: 'requester',
 *     BypassGovernanceRetention?: bool,
 *     ExpectedBucketOwner?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePublicAccessBlock(array $args = [])
 * @phpstan-method \Aws\Result deletePublicAccessBlock(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePublicAccessBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePublicAccessBlockAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketAbac(array $args = [])
 * @phpstan-method \Aws\Result getBucketAbac(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketAbacAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketAbacAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketAccelerateConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketAccelerateConfiguration(array{Bucket?: string, ExpectedBucketOwner?: string, RequestPayer?: 'requester', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketAccelerateConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketAccelerateConfigurationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, RequestPayer?: 'requester', ...} $args = [])
 * @method \Aws\Result getBucketAcl(array $args = [])
 * @phpstan-method \Aws\Result getBucketAcl(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketAclAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketAclAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketAnalyticsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketAnalyticsConfiguration(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketAnalyticsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketAnalyticsConfigurationAsync(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketCors(array $args = [])
 * @phpstan-method \Aws\Result getBucketCors(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketCorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketCorsAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketEncryption(array $args = [])
 * @phpstan-method \Aws\Result getBucketEncryption(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketEncryptionAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketIntelligentTieringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketIntelligentTieringConfiguration(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketIntelligentTieringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketIntelligentTieringConfigurationAsync(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketInventoryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketInventoryConfiguration(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketInventoryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketInventoryConfigurationAsync(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketLifecycle(array $args = [])
 * @phpstan-method \Aws\Result getBucketLifecycle(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLifecycleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketLifecycleAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketLifecycleConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketLifecycleConfiguration(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLifecycleConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketLifecycleConfigurationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketLocation(array $args = [])
 * @phpstan-method \Aws\Result getBucketLocation(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketLocationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketLogging(array $args = [])
 * @phpstan-method \Aws\Result getBucketLogging(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLoggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketLoggingAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketMetadataConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketMetadataConfiguration(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketMetadataConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketMetadataConfigurationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketMetadataTableConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketMetadataTableConfiguration(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketMetadataTableConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketMetadataTableConfigurationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketMetricsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketMetricsConfiguration(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketMetricsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketMetricsConfigurationAsync(array{Bucket?: string, Id?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketNotification(array $args = [])
 * @phpstan-method \Aws\Result getBucketNotification(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketNotificationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketNotificationConfiguration(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketNotificationConfigurationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketOwnershipControls(array $args = [])
 * @phpstan-method \Aws\Result getBucketOwnershipControls(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketOwnershipControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketOwnershipControlsAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result getBucketPolicy(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketPolicyAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketPolicyStatus(array $args = [])
 * @phpstan-method \Aws\Result getBucketPolicyStatus(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketPolicyStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketPolicyStatusAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result getBucketReplication(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketReplicationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketRequestPayment(array $args = [])
 * @phpstan-method \Aws\Result getBucketRequestPayment(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketRequestPaymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketRequestPaymentAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketTagging(array $args = [])
 * @phpstan-method \Aws\Result getBucketTagging(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketTaggingAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketVersioning(array $args = [])
 * @phpstan-method \Aws\Result getBucketVersioning(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketVersioningAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketVersioningAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getBucketWebsite(array $args = [])
 * @phpstan-method \Aws\Result getBucketWebsite(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketWebsiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketWebsiteAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getObject(array $args = [])
 * @phpstan-method \Aws\Result getObject(array{
 *     Bucket?: string,
 *     IfMatch?: string,
 *     IfModifiedSince?: int|string|\DateTimeInterface,
 *     IfNoneMatch?: string,
 *     IfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     Key?: string,
 *     Range?: string,
 *     ResponseCacheControl?: string,
 *     ResponseContentDisposition?: string,
 *     ResponseContentEncoding?: string,
 *     ResponseContentLanguage?: string,
 *     ResponseContentType?: string,
 *     ResponseExpires?: int|string|\DateTimeInterface,
 *     VersionId?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     PartNumber?: int,
 *     ExpectedBucketOwner?: string,
 *     ChecksumMode?: 'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectAsync(array{
 *     Bucket?: string,
 *     IfMatch?: string,
 *     IfModifiedSince?: int|string|\DateTimeInterface,
 *     IfNoneMatch?: string,
 *     IfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     Key?: string,
 *     Range?: string,
 *     ResponseCacheControl?: string,
 *     ResponseContentDisposition?: string,
 *     ResponseContentEncoding?: string,
 *     ResponseContentLanguage?: string,
 *     ResponseContentType?: string,
 *     ResponseExpires?: int|string|\DateTimeInterface,
 *     VersionId?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     PartNumber?: int,
 *     ExpectedBucketOwner?: string,
 *     ChecksumMode?: 'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectAcl(array $args = [])
 * @phpstan-method \Aws\Result getObjectAcl(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectAclAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectAclAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectAnnotation(array $args = [])
 * @phpstan-method \Aws\Result getObjectAnnotation(array{
 *     Bucket?: string,
 *     Key?: string,
 *     AnnotationName?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ChecksumMode?: 'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectAnnotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectAnnotationAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     AnnotationName?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ChecksumMode?: 'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectAttributes(array $args = [])
 * @phpstan-method \Aws\Result getObjectAttributes(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     MaxParts?: int,
 *     PartNumberMarker?: int,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ObjectAttributes?: list<'Checksum'|'ETag'|'ObjectParts'|'ObjectSize'|'StorageClass'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectAttributesAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     MaxParts?: int,
 *     PartNumberMarker?: int,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ObjectAttributes?: list<'Checksum'|'ETag'|'ObjectParts'|'ObjectSize'|'StorageClass'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectLegalHold(array $args = [])
 * @phpstan-method \Aws\Result getObjectLegalHold(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectLegalHoldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectLegalHoldAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectLockConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getObjectLockConfiguration(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectLockConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectLockConfigurationAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getObjectRetention(array $args = [])
 * @phpstan-method \Aws\Result getObjectRetention(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectRetentionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectRetentionAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectTagging(array $args = [])
 * @phpstan-method \Aws\Result getObjectTagging(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     ExpectedBucketOwner?: string,
 *     RequestPayer?: 'requester',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectTaggingAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     ExpectedBucketOwner?: string,
 *     RequestPayer?: 'requester',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectTorrent(array $args = [])
 * @phpstan-method \Aws\Result getObjectTorrent(array{Bucket?: string, Key?: string, RequestPayer?: 'requester', ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectTorrentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectTorrentAsync(array{Bucket?: string, Key?: string, RequestPayer?: 'requester', ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result getPublicAccessBlock(array $args = [])
 * @phpstan-method \Aws\Result getPublicAccessBlock(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPublicAccessBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPublicAccessBlockAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result headBucket(array $args = [])
 * @phpstan-method \Aws\Result headBucket(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise headBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise headBucketAsync(array{Bucket?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result headObject(array $args = [])
 * @phpstan-method \Aws\Result headObject(array{
 *     Bucket?: string,
 *     IfMatch?: string,
 *     IfModifiedSince?: int|string|\DateTimeInterface,
 *     IfNoneMatch?: string,
 *     IfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     Key?: string,
 *     Range?: string,
 *     ResponseCacheControl?: string,
 *     ResponseContentDisposition?: string,
 *     ResponseContentEncoding?: string,
 *     ResponseContentLanguage?: string,
 *     ResponseContentType?: string,
 *     ResponseExpires?: int|string|\DateTimeInterface,
 *     VersionId?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     PartNumber?: int,
 *     ExpectedBucketOwner?: string,
 *     ChecksumMode?: 'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise headObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise headObjectAsync(array{
 *     Bucket?: string,
 *     IfMatch?: string,
 *     IfModifiedSince?: int|string|\DateTimeInterface,
 *     IfNoneMatch?: string,
 *     IfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     Key?: string,
 *     Range?: string,
 *     ResponseCacheControl?: string,
 *     ResponseContentDisposition?: string,
 *     ResponseContentEncoding?: string,
 *     ResponseContentLanguage?: string,
 *     ResponseContentType?: string,
 *     ResponseExpires?: int|string|\DateTimeInterface,
 *     VersionId?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     PartNumber?: int,
 *     ExpectedBucketOwner?: string,
 *     ChecksumMode?: 'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBucketAnalyticsConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listBucketAnalyticsConfigurations(array{Bucket?: string, ContinuationToken?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBucketAnalyticsConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBucketAnalyticsConfigurationsAsync(array{Bucket?: string, ContinuationToken?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result listBucketIntelligentTieringConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listBucketIntelligentTieringConfigurations(array{Bucket?: string, ContinuationToken?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBucketIntelligentTieringConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBucketIntelligentTieringConfigurationsAsync(array{Bucket?: string, ContinuationToken?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result listBucketInventoryConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listBucketInventoryConfigurations(array{Bucket?: string, ContinuationToken?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBucketInventoryConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBucketInventoryConfigurationsAsync(array{Bucket?: string, ContinuationToken?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result listBucketMetricsConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listBucketMetricsConfigurations(array{Bucket?: string, ContinuationToken?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBucketMetricsConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBucketMetricsConfigurationsAsync(array{Bucket?: string, ContinuationToken?: string, ExpectedBucketOwner?: string, ...} $args = [])
 * @method \Aws\Result listBuckets(array $args = [])
 * @phpstan-method \Aws\Result listBuckets(array{MaxBuckets?: int, ContinuationToken?: string, Prefix?: string, BucketRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBucketsAsync(array{MaxBuckets?: int, ContinuationToken?: string, Prefix?: string, BucketRegion?: string, ...} $args = [])
 * @method \Aws\Result listDirectoryBuckets(array $args = [])
 * @phpstan-method \Aws\Result listDirectoryBuckets(array{ContinuationToken?: string, MaxDirectoryBuckets?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDirectoryBucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDirectoryBucketsAsync(array{ContinuationToken?: string, MaxDirectoryBuckets?: int, ...} $args = [])
 * @method \Aws\Result listMultipartUploads(array $args = [])
 * @phpstan-method \Aws\Result listMultipartUploads(array{
 *     Bucket?: string,
 *     Delimiter?: string,
 *     EncodingType?: 'url',
 *     KeyMarker?: string,
 *     MaxUploads?: int,
 *     Prefix?: string,
 *     UploadIdMarker?: string,
 *     ExpectedBucketOwner?: string,
 *     RequestPayer?: 'requester',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultipartUploadsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMultipartUploadsAsync(array{
 *     Bucket?: string,
 *     Delimiter?: string,
 *     EncodingType?: 'url',
 *     KeyMarker?: string,
 *     MaxUploads?: int,
 *     Prefix?: string,
 *     UploadIdMarker?: string,
 *     ExpectedBucketOwner?: string,
 *     RequestPayer?: 'requester',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectAnnotations(array $args = [])
 * @phpstan-method \Aws\Result listObjectAnnotations(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     MaxAnnotationResults?: int,
 *     AnnotationPrefix?: string,
 *     ContinuationToken?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectAnnotationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectAnnotationsAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     MaxAnnotationResults?: int,
 *     AnnotationPrefix?: string,
 *     ContinuationToken?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectVersions(array $args = [])
 * @phpstan-method \Aws\Result listObjectVersions(array{
 *     Bucket?: string,
 *     Delimiter?: string,
 *     EncodingType?: 'url',
 *     KeyMarker?: string,
 *     MaxKeys?: int,
 *     Prefix?: string,
 *     VersionIdMarker?: string,
 *     ExpectedBucketOwner?: string,
 *     RequestPayer?: 'requester',
 *     OptionalObjectAttributes?: list<'RestoreStatus'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectVersionsAsync(array{
 *     Bucket?: string,
 *     Delimiter?: string,
 *     EncodingType?: 'url',
 *     KeyMarker?: string,
 *     MaxKeys?: int,
 *     Prefix?: string,
 *     VersionIdMarker?: string,
 *     ExpectedBucketOwner?: string,
 *     RequestPayer?: 'requester',
 *     OptionalObjectAttributes?: list<'RestoreStatus'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjects(array $args = [])
 * @phpstan-method \Aws\Result listObjects(array{
 *     Bucket?: string,
 *     Delimiter?: string,
 *     EncodingType?: 'url',
 *     Marker?: string,
 *     MaxKeys?: int,
 *     Prefix?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     OptionalObjectAttributes?: list<'RestoreStatus'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectsAsync(array{
 *     Bucket?: string,
 *     Delimiter?: string,
 *     EncodingType?: 'url',
 *     Marker?: string,
 *     MaxKeys?: int,
 *     Prefix?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     OptionalObjectAttributes?: list<'RestoreStatus'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectsV2(array $args = [])
 * @phpstan-method \Aws\Result listObjectsV2(array{
 *     Bucket?: string,
 *     Delimiter?: string,
 *     EncodingType?: 'url',
 *     MaxKeys?: int,
 *     Prefix?: string,
 *     ContinuationToken?: string,
 *     FetchOwner?: bool,
 *     StartAfter?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     OptionalObjectAttributes?: list<'RestoreStatus'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectsV2Async(array{
 *     Bucket?: string,
 *     Delimiter?: string,
 *     EncodingType?: 'url',
 *     MaxKeys?: int,
 *     Prefix?: string,
 *     ContinuationToken?: string,
 *     FetchOwner?: bool,
 *     StartAfter?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     OptionalObjectAttributes?: list<'RestoreStatus'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listParts(array $args = [])
 * @phpstan-method \Aws\Result listParts(array{
 *     Bucket?: string,
 *     Key?: string,
 *     MaxParts?: int,
 *     PartNumberMarker?: int,
 *     UploadId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPartsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPartsAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     MaxParts?: int,
 *     PartNumberMarker?: int,
 *     UploadId?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketAbac(array $args = [])
 * @phpstan-method \Aws\Result putBucketAbac(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     AbacStatus?: array{Status?: 'Disabled'|'Enabled', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketAbacAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketAbacAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     AbacStatus?: array{Status?: 'Disabled'|'Enabled', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketAccelerateConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBucketAccelerateConfiguration(array{
 *     Bucket?: string,
 *     AccelerateConfiguration?: array{Status?: 'Enabled'|'Suspended', ...},
 *     ExpectedBucketOwner?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketAccelerateConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketAccelerateConfigurationAsync(array{
 *     Bucket?: string,
 *     AccelerateConfiguration?: array{Status?: 'Enabled'|'Suspended', ...},
 *     ExpectedBucketOwner?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketAcl(array $args = [])
 * @phpstan-method \Aws\Result putBucketAcl(array{
 *     ACL?: 'authenticated-read'|'private'|'public-read'|'public-read-write',
 *     AccessControlPolicy?: array{Grants?: list<array>, Owner?: array{DisplayName?: string, ID?: string, ...}, ...},
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWrite?: string,
 *     GrantWriteACP?: string,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketAclAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketAclAsync(array{
 *     ACL?: 'authenticated-read'|'private'|'public-read'|'public-read-write',
 *     AccessControlPolicy?: array{Grants?: list<array>, Owner?: array{DisplayName?: string, ID?: string, ...}, ...},
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWrite?: string,
 *     GrantWriteACP?: string,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketAnalyticsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBucketAnalyticsConfiguration(array{
 *     Bucket?: string,
 *     Id?: string,
 *     AnalyticsConfiguration?: array{
 *         Id?: string,
 *         Filter?: array{Prefix?: string, Tag?: array, And?: array, ...},
 *         StorageClassAnalysis?: array{DataExport?: array, ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketAnalyticsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketAnalyticsConfigurationAsync(array{
 *     Bucket?: string,
 *     Id?: string,
 *     AnalyticsConfiguration?: array{
 *         Id?: string,
 *         Filter?: array{Prefix?: string, Tag?: array, And?: array, ...},
 *         StorageClassAnalysis?: array{DataExport?: array, ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketCors(array $args = [])
 * @phpstan-method \Aws\Result putBucketCors(array{
 *     Bucket?: string,
 *     CORSConfiguration?: array{CORSRules?: list<array>, ...},
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketCorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketCorsAsync(array{
 *     Bucket?: string,
 *     CORSConfiguration?: array{CORSRules?: list<array>, ...},
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketEncryption(array $args = [])
 * @phpstan-method \Aws\Result putBucketEncryption(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ServerSideEncryptionConfiguration?: array{Rules?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketEncryptionAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ServerSideEncryptionConfiguration?: array{Rules?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketIntelligentTieringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBucketIntelligentTieringConfiguration(array{
 *     Bucket?: string,
 *     Id?: string,
 *     ExpectedBucketOwner?: string,
 *     IntelligentTieringConfiguration?: array{
 *         Id?: string,
 *         Filter?: array{Prefix?: string, Tag?: array, And?: array, ...},
 *         Status?: 'Disabled'|'Enabled',
 *         Tierings?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketIntelligentTieringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketIntelligentTieringConfigurationAsync(array{
 *     Bucket?: string,
 *     Id?: string,
 *     ExpectedBucketOwner?: string,
 *     IntelligentTieringConfiguration?: array{
 *         Id?: string,
 *         Filter?: array{Prefix?: string, Tag?: array, And?: array, ...},
 *         Status?: 'Disabled'|'Enabled',
 *         Tierings?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketInventoryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBucketInventoryConfiguration(array{
 *     Bucket?: string,
 *     Id?: string,
 *     InventoryConfiguration?: array{
 *         Destination?: array{S3BucketDestination?: array, ...},
 *         IsEnabled?: bool,
 *         Filter?: array{Prefix?: string, ...},
 *         Id?: string,
 *         IncludedObjectVersions?: 'All'|'Current',
 *         OptionalFields?: list<'BucketKeyStatus'|'ChecksumAlgorithm'|'ETag'|'EncryptionStatus'|'IntelligentTieringAccessTier'|'IsMultipartUploaded'|'LastModifiedDate'|'LifecycleExpirationDate'|'ObjectAccessControlList'|'ObjectLockLegalHoldStatus'|'ObjectLockMode'|'ObjectLockRetainUntilDate'|'ObjectOwner'|'ReplicationStatus'|'Size'|'StorageClass'>,
 *         Schedule?: array{Frequency?: 'Daily'|'Weekly', ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketInventoryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketInventoryConfigurationAsync(array{
 *     Bucket?: string,
 *     Id?: string,
 *     InventoryConfiguration?: array{
 *         Destination?: array{S3BucketDestination?: array, ...},
 *         IsEnabled?: bool,
 *         Filter?: array{Prefix?: string, ...},
 *         Id?: string,
 *         IncludedObjectVersions?: 'All'|'Current',
 *         OptionalFields?: list<'BucketKeyStatus'|'ChecksumAlgorithm'|'ETag'|'EncryptionStatus'|'IntelligentTieringAccessTier'|'IsMultipartUploaded'|'LastModifiedDate'|'LifecycleExpirationDate'|'ObjectAccessControlList'|'ObjectLockLegalHoldStatus'|'ObjectLockMode'|'ObjectLockRetainUntilDate'|'ObjectOwner'|'ReplicationStatus'|'Size'|'StorageClass'>,
 *         Schedule?: array{Frequency?: 'Daily'|'Weekly', ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketLifecycle(array $args = [])
 * @phpstan-method \Aws\Result putBucketLifecycle(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     LifecycleConfiguration?: array{Rules?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketLifecycleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketLifecycleAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     LifecycleConfiguration?: array{Rules?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketLifecycleConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBucketLifecycleConfiguration(array{
 *     Bucket?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     LifecycleConfiguration?: array{Rules?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     TransitionDefaultMinimumObjectSize?: 'all_storage_classes_128K'|'varies_by_storage_class',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketLifecycleConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketLifecycleConfigurationAsync(array{
 *     Bucket?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     LifecycleConfiguration?: array{Rules?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     TransitionDefaultMinimumObjectSize?: 'all_storage_classes_128K'|'varies_by_storage_class',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketLogging(array $args = [])
 * @phpstan-method \Aws\Result putBucketLogging(array{
 *     Bucket?: string,
 *     BucketLoggingStatus?: array{
 *         LoggingEnabled?: array{
 *             TargetBucket?: string,
 *             TargetGrants?: list<array>,
 *             TargetPrefix?: string,
 *             TargetObjectKeyFormat?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketLoggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketLoggingAsync(array{
 *     Bucket?: string,
 *     BucketLoggingStatus?: array{
 *         LoggingEnabled?: array{
 *             TargetBucket?: string,
 *             TargetGrants?: list<array>,
 *             TargetPrefix?: string,
 *             TargetObjectKeyFormat?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketMetricsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBucketMetricsConfiguration(array{
 *     Bucket?: string,
 *     Id?: string,
 *     MetricsConfiguration?: array{
 *         Id?: string,
 *         Filter?: array{Prefix?: string, Tag?: array, AccessPointArn?: string, And?: array, ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketMetricsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketMetricsConfigurationAsync(array{
 *     Bucket?: string,
 *     Id?: string,
 *     MetricsConfiguration?: array{
 *         Id?: string,
 *         Filter?: array{Prefix?: string, Tag?: array, AccessPointArn?: string, And?: array, ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketNotification(array $args = [])
 * @phpstan-method \Aws\Result putBucketNotification(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     NotificationConfiguration?: array{
 *         TopicConfiguration?: array{
 *             Id?: string,
 *             Events?: list<'s3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold'>,
 *             Event?: 's3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold',
 *             Topic?: string,
 *             ...,
 *         },
 *         QueueConfiguration?: array{
 *             Id?: string,
 *             Event?: 's3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold',
 *             Events?: list<'s3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold'>,
 *             Queue?: string,
 *             ...,
 *         },
 *         CloudFunctionConfiguration?: array{
 *             Id?: string,
 *             Event?: 's3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold',
 *             Events?: list<'s3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold'>,
 *             CloudFunction?: string,
 *             InvocationRole?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketNotificationAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     NotificationConfiguration?: array{
 *         TopicConfiguration?: array{
 *             Id?: string,
 *             Events?: list<'s3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold'>,
 *             Event?: 's3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold',
 *             Topic?: string,
 *             ...,
 *         },
 *         QueueConfiguration?: array{
 *             Id?: string,
 *             Event?: 's3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold',
 *             Events?: list<'s3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold'>,
 *             Queue?: string,
 *             ...,
 *         },
 *         CloudFunctionConfiguration?: array{
 *             Id?: string,
 *             Event?: 's3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold',
 *             Events?: list<'s3:IntelligentTiering'|'s3:LifecycleExpiration:*'|'s3:LifecycleExpiration:Delete'|'s3:LifecycleExpiration:DeleteMarkerCreated'|'s3:LifecycleTransition'|'s3:ObjectAcl:Put'|'s3:ObjectAnnotation:*'|'s3:ObjectAnnotation:Delete'|'s3:ObjectAnnotation:Put'|'s3:ObjectCreated:*'|'s3:ObjectCreated:CompleteMultipartUpload'|'s3:ObjectCreated:Copy'|'s3:ObjectCreated:Post'|'s3:ObjectCreated:Put'|'s3:ObjectRemoved:*'|'s3:ObjectRemoved:Delete'|'s3:ObjectRemoved:DeleteMarkerCreated'|'s3:ObjectRestore:*'|'s3:ObjectRestore:Completed'|'s3:ObjectRestore:Delete'|'s3:ObjectRestore:Post'|'s3:ObjectTagging:*'|'s3:ObjectTagging:Delete'|'s3:ObjectTagging:Put'|'s3:ReducedRedundancyLostObject'|'s3:Replication:*'|'s3:Replication:OperationFailedReplication'|'s3:Replication:OperationMissedThreshold'|'s3:Replication:OperationNotTracked'|'s3:Replication:OperationReplicatedAfterThreshold'>,
 *             CloudFunction?: string,
 *             InvocationRole?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBucketNotificationConfiguration(array{
 *     Bucket?: string,
 *     NotificationConfiguration?: array{
 *         TopicConfigurations?: list<array>,
 *         QueueConfigurations?: list<array>,
 *         LambdaFunctionConfigurations?: list<array>,
 *         EventBridgeConfiguration?: array,
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     SkipDestinationValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketNotificationConfigurationAsync(array{
 *     Bucket?: string,
 *     NotificationConfiguration?: array{
 *         TopicConfigurations?: list<array>,
 *         QueueConfigurations?: list<array>,
 *         LambdaFunctionConfigurations?: list<array>,
 *         EventBridgeConfiguration?: array,
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     SkipDestinationValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketOwnershipControls(array $args = [])
 * @phpstan-method \Aws\Result putBucketOwnershipControls(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ExpectedBucketOwner?: string,
 *     OwnershipControls?: array{Rules?: list<array>, ...},
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketOwnershipControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketOwnershipControlsAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ExpectedBucketOwner?: string,
 *     OwnershipControls?: array{Rules?: list<array>, ...},
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result putBucketPolicy(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ConfirmRemoveSelfBucketAccess?: bool,
 *     Policy?: string,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketPolicyAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ConfirmRemoveSelfBucketAccess?: bool,
 *     Policy?: string,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result putBucketReplication(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ReplicationConfiguration?: array{Role?: string, Rules?: list<array>, ...},
 *     Token?: string,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketReplicationAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ReplicationConfiguration?: array{Role?: string, Rules?: list<array>, ...},
 *     Token?: string,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketRequestPayment(array $args = [])
 * @phpstan-method \Aws\Result putBucketRequestPayment(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     RequestPaymentConfiguration?: array{Payer?: 'BucketOwner'|'Requester', ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketRequestPaymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketRequestPaymentAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     RequestPaymentConfiguration?: array{Payer?: 'BucketOwner'|'Requester', ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketTagging(array $args = [])
 * @phpstan-method \Aws\Result putBucketTagging(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     Tagging?: array{TagSet?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketTaggingAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     Tagging?: array{TagSet?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketVersioning(array $args = [])
 * @phpstan-method \Aws\Result putBucketVersioning(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     MFA?: string,
 *     VersioningConfiguration?: array{MFADelete?: 'Disabled'|'Enabled', Status?: 'Enabled'|'Suspended', ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketVersioningAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketVersioningAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     MFA?: string,
 *     VersioningConfiguration?: array{MFADelete?: 'Disabled'|'Enabled', Status?: 'Enabled'|'Suspended', ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketWebsite(array $args = [])
 * @phpstan-method \Aws\Result putBucketWebsite(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     WebsiteConfiguration?: array{
 *         ErrorDocument?: array{Key?: string, ...},
 *         IndexDocument?: array{Suffix?: string, ...},
 *         RedirectAllRequestsTo?: array{HostName?: string, Protocol?: 'http'|'https', ...},
 *         RoutingRules?: list<array>,
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketWebsiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketWebsiteAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     WebsiteConfiguration?: array{
 *         ErrorDocument?: array{Key?: string, ...},
 *         IndexDocument?: array{Suffix?: string, ...},
 *         RedirectAllRequestsTo?: array{HostName?: string, Protocol?: 'http'|'https', ...},
 *         RoutingRules?: list<array>,
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putObject(array $args = [])
 * @phpstan-method \Aws\Result putObject(array{
 *     ACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Bucket?: string,
 *     CacheControl?: string,
 *     ContentDisposition?: string,
 *     ContentEncoding?: string,
 *     ContentLanguage?: string,
 *     ContentLength?: int,
 *     ContentMD5?: string,
 *     ContentType?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     Expires?: int|string|\DateTimeInterface,
 *     IfMatch?: string,
 *     IfNoneMatch?: string,
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWriteACP?: string,
 *     Key?: string,
 *     WriteOffsetBytes?: int,
 *     Metadata?: array<string, string>,
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     StorageClass?: 'DEEP_ARCHIVE'|'EXPRESS_ONEZONE'|'FSX_ONTAP'|'FSX_OPENZFS'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'REDUCED_REDUNDANCY'|'SNOW'|'STANDARD'|'STANDARD_IA',
 *     WebsiteRedirectLocation?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     SSEKMSKeyId?: string,
 *     SSEKMSEncryptionContext?: string,
 *     BucketKeyEnabled?: bool,
 *     RequestPayer?: 'requester',
 *     Tagging?: string,
 *     ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *     ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *     ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putObjectAsync(array{
 *     ACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Bucket?: string,
 *     CacheControl?: string,
 *     ContentDisposition?: string,
 *     ContentEncoding?: string,
 *     ContentLanguage?: string,
 *     ContentLength?: int,
 *     ContentMD5?: string,
 *     ContentType?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     Expires?: int|string|\DateTimeInterface,
 *     IfMatch?: string,
 *     IfNoneMatch?: string,
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWriteACP?: string,
 *     Key?: string,
 *     WriteOffsetBytes?: int,
 *     Metadata?: array<string, string>,
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     StorageClass?: 'DEEP_ARCHIVE'|'EXPRESS_ONEZONE'|'FSX_ONTAP'|'FSX_OPENZFS'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'REDUCED_REDUNDANCY'|'SNOW'|'STANDARD'|'STANDARD_IA',
 *     WebsiteRedirectLocation?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     SSEKMSKeyId?: string,
 *     SSEKMSEncryptionContext?: string,
 *     BucketKeyEnabled?: bool,
 *     RequestPayer?: 'requester',
 *     Tagging?: string,
 *     ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *     ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *     ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putObjectAcl(array $args = [])
 * @phpstan-method \Aws\Result putObjectAcl(array{
 *     ACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     AccessControlPolicy?: array{Grants?: list<array>, Owner?: array{DisplayName?: string, ID?: string, ...}, ...},
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWrite?: string,
 *     GrantWriteACP?: string,
 *     Key?: string,
 *     RequestPayer?: 'requester',
 *     VersionId?: string,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectAclAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putObjectAclAsync(array{
 *     ACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     AccessControlPolicy?: array{Grants?: list<array>, Owner?: array{DisplayName?: string, ID?: string, ...}, ...},
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWrite?: string,
 *     GrantWriteACP?: string,
 *     Key?: string,
 *     RequestPayer?: 'requester',
 *     VersionId?: string,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putObjectAnnotation(array $args = [])
 * @phpstan-method \Aws\Result putObjectAnnotation(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     AnnotationName?: string,
 *     AnnotationPayload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ObjectIfMatch?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     ContentMD5?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectAnnotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putObjectAnnotationAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     AnnotationName?: string,
 *     AnnotationPayload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ObjectIfMatch?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     ContentMD5?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putObjectLegalHold(array $args = [])
 * @phpstan-method \Aws\Result putObjectLegalHold(array{
 *     Bucket?: string,
 *     Key?: string,
 *     LegalHold?: array{Status?: 'OFF'|'ON', ...},
 *     RequestPayer?: 'requester',
 *     VersionId?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectLegalHoldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putObjectLegalHoldAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     LegalHold?: array{Status?: 'OFF'|'ON', ...},
 *     RequestPayer?: 'requester',
 *     VersionId?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putObjectLockConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putObjectLockConfiguration(array{
 *     Bucket?: string,
 *     ObjectLockConfiguration?: array{ObjectLockEnabled?: 'Enabled', Rule?: array{DefaultRetention?: array, ...}, ...},
 *     RequestPayer?: 'requester',
 *     Token?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectLockConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putObjectLockConfigurationAsync(array{
 *     Bucket?: string,
 *     ObjectLockConfiguration?: array{ObjectLockEnabled?: 'Enabled', Rule?: array{DefaultRetention?: array, ...}, ...},
 *     RequestPayer?: 'requester',
 *     Token?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putObjectRetention(array $args = [])
 * @phpstan-method \Aws\Result putObjectRetention(array{
 *     Bucket?: string,
 *     Key?: string,
 *     Retention?: array{Mode?: 'COMPLIANCE'|'GOVERNANCE', RetainUntilDate?: int|string|\DateTimeInterface, ...},
 *     RequestPayer?: 'requester',
 *     VersionId?: string,
 *     BypassGovernanceRetention?: bool,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectRetentionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putObjectRetentionAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     Retention?: array{Mode?: 'COMPLIANCE'|'GOVERNANCE', RetainUntilDate?: int|string|\DateTimeInterface, ...},
 *     RequestPayer?: 'requester',
 *     VersionId?: string,
 *     BypassGovernanceRetention?: bool,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putObjectTagging(array $args = [])
 * @phpstan-method \Aws\Result putObjectTagging(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     Tagging?: array{TagSet?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     RequestPayer?: 'requester',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putObjectTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putObjectTaggingAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     Tagging?: array{TagSet?: list<array>, ...},
 *     ExpectedBucketOwner?: string,
 *     RequestPayer?: 'requester',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPublicAccessBlock(array $args = [])
 * @phpstan-method \Aws\Result putPublicAccessBlock(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     PublicAccessBlockConfiguration?: array{
 *         BlockPublicAcls?: bool,
 *         IgnorePublicAcls?: bool,
 *         BlockPublicPolicy?: bool,
 *         RestrictPublicBuckets?: bool,
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPublicAccessBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPublicAccessBlockAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     PublicAccessBlockConfiguration?: array{
 *         BlockPublicAcls?: bool,
 *         IgnorePublicAcls?: bool,
 *         BlockPublicPolicy?: bool,
 *         RestrictPublicBuckets?: bool,
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result renameObject(array $args = [])
 * @phpstan-method \Aws\Result renameObject(array{
 *     Bucket?: string,
 *     Key?: string,
 *     RenameSource?: string,
 *     DestinationIfMatch?: string,
 *     DestinationIfNoneMatch?: string,
 *     DestinationIfModifiedSince?: int|string|\DateTimeInterface,
 *     DestinationIfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     SourceIfMatch?: string,
 *     SourceIfNoneMatch?: string,
 *     SourceIfModifiedSince?: int|string|\DateTimeInterface,
 *     SourceIfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise renameObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise renameObjectAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     RenameSource?: string,
 *     DestinationIfMatch?: string,
 *     DestinationIfNoneMatch?: string,
 *     DestinationIfModifiedSince?: int|string|\DateTimeInterface,
 *     DestinationIfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     SourceIfMatch?: string,
 *     SourceIfNoneMatch?: string,
 *     SourceIfModifiedSince?: int|string|\DateTimeInterface,
 *     SourceIfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreObject(array $args = [])
 * @phpstan-method \Aws\Result restoreObject(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     RestoreRequest?: array{
 *         Days?: int,
 *         GlacierJobParameters?: array{Tier?: 'Bulk'|'Expedited'|'Standard', ...},
 *         Type?: 'SELECT',
 *         Tier?: 'Bulk'|'Expedited'|'Standard',
 *         Description?: string,
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
 *     RequestPayer?: 'requester',
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreObjectAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     RestoreRequest?: array{
 *         Days?: int,
 *         GlacierJobParameters?: array{Tier?: 'Bulk'|'Expedited'|'Standard', ...},
 *         Type?: 'SELECT',
 *         Tier?: 'Bulk'|'Expedited'|'Standard',
 *         Description?: string,
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
 *     RequestPayer?: 'requester',
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result selectObjectContent(array $args = [])
 * @phpstan-method \Aws\Result selectObjectContent(array{
 *     Bucket?: string,
 *     Key?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     Expression?: string,
 *     ExpressionType?: 'SQL',
 *     RequestProgress?: array{Enabled?: bool, ...},
 *     InputSerialization?: array{
 *         CSV?: array{
 *             FileHeaderInfo?: 'IGNORE'|'NONE'|'USE',
 *             Comments?: string,
 *             QuoteEscapeCharacter?: string,
 *             RecordDelimiter?: string,
 *             FieldDelimiter?: string,
 *             QuoteCharacter?: string,
 *             AllowQuotedRecordDelimiter?: bool,
 *             ...,
 *         },
 *         CompressionType?: 'BZIP2'|'GZIP'|'NONE',
 *         JSON?: array{Type?: 'DOCUMENT'|'LINES', ...},
 *         Parquet?: array,
 *         ...,
 *     },
 *     OutputSerialization?: array{
 *         CSV?: array{
 *             QuoteFields?: 'ALWAYS'|'ASNEEDED',
 *             QuoteEscapeCharacter?: string,
 *             RecordDelimiter?: string,
 *             FieldDelimiter?: string,
 *             QuoteCharacter?: string,
 *             ...,
 *         },
 *         JSON?: array{RecordDelimiter?: string, ...},
 *         ...,
 *     },
 *     ScanRange?: array{Start?: int, End?: int, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise selectObjectContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise selectObjectContentAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     Expression?: string,
 *     ExpressionType?: 'SQL',
 *     RequestProgress?: array{Enabled?: bool, ...},
 *     InputSerialization?: array{
 *         CSV?: array{
 *             FileHeaderInfo?: 'IGNORE'|'NONE'|'USE',
 *             Comments?: string,
 *             QuoteEscapeCharacter?: string,
 *             RecordDelimiter?: string,
 *             FieldDelimiter?: string,
 *             QuoteCharacter?: string,
 *             AllowQuotedRecordDelimiter?: bool,
 *             ...,
 *         },
 *         CompressionType?: 'BZIP2'|'GZIP'|'NONE',
 *         JSON?: array{Type?: 'DOCUMENT'|'LINES', ...},
 *         Parquet?: array,
 *         ...,
 *     },
 *     OutputSerialization?: array{
 *         CSV?: array{
 *             QuoteFields?: 'ALWAYS'|'ASNEEDED',
 *             QuoteEscapeCharacter?: string,
 *             RecordDelimiter?: string,
 *             FieldDelimiter?: string,
 *             QuoteCharacter?: string,
 *             ...,
 *         },
 *         JSON?: array{RecordDelimiter?: string, ...},
 *         ...,
 *     },
 *     ScanRange?: array{Start?: int, End?: int, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBucketMetadataAnnotationTableConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateBucketMetadataAnnotationTableConfiguration(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     AnnotationTableConfiguration?: array{
 *         ConfigurationState?: 'DISABLED'|'ENABLED',
 *         EncryptionConfiguration?: array{SseAlgorithm?: 'AES256'|'aws:kms', KmsKeyArn?: string, ...},
 *         Role?: string,
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBucketMetadataAnnotationTableConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBucketMetadataAnnotationTableConfigurationAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     AnnotationTableConfiguration?: array{
 *         ConfigurationState?: 'DISABLED'|'ENABLED',
 *         EncryptionConfiguration?: array{SseAlgorithm?: 'AES256'|'aws:kms', KmsKeyArn?: string, ...},
 *         Role?: string,
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBucketMetadataInventoryTableConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateBucketMetadataInventoryTableConfiguration(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     InventoryTableConfiguration?: array{
 *         ConfigurationState?: 'DISABLED'|'ENABLED',
 *         EncryptionConfiguration?: array{SseAlgorithm?: 'AES256'|'aws:kms', KmsKeyArn?: string, ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBucketMetadataInventoryTableConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBucketMetadataInventoryTableConfigurationAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     InventoryTableConfiguration?: array{
 *         ConfigurationState?: 'DISABLED'|'ENABLED',
 *         EncryptionConfiguration?: array{SseAlgorithm?: 'AES256'|'aws:kms', KmsKeyArn?: string, ...},
 *         ...,
 *     },
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBucketMetadataJournalTableConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateBucketMetadataJournalTableConfiguration(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     JournalTableConfiguration?: array{RecordExpiration?: array{Expiration?: 'DISABLED'|'ENABLED', Days?: int, ...}, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBucketMetadataJournalTableConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBucketMetadataJournalTableConfigurationAsync(array{
 *     Bucket?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     JournalTableConfiguration?: array{RecordExpiration?: array{Expiration?: 'DISABLED'|'ENABLED', Days?: int, ...}, ...},
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateObjectEncryption(array $args = [])
 * @phpstan-method \Aws\Result updateObjectEncryption(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     ObjectEncryption?: array{SSEKMS?: array{KMSKeyArn?: string, BucketKeyEnabled?: bool, ...}, ...},
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateObjectEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateObjectEncryptionAsync(array{
 *     Bucket?: string,
 *     Key?: string,
 *     VersionId?: string,
 *     ObjectEncryption?: array{SSEKMS?: array{KMSKeyArn?: string, BucketKeyEnabled?: bool, ...}, ...},
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ...,
 * } $args = [])
 * @method \Aws\Result uploadPart(array $args = [])
 * @phpstan-method \Aws\Result uploadPart(array{
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Bucket?: string,
 *     ContentLength?: int,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     Key?: string,
 *     PartNumber?: int,
 *     UploadId?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadPartAsync(array{
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Bucket?: string,
 *     ContentLength?: int,
 *     ContentMD5?: string,
 *     ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     Key?: string,
 *     PartNumber?: int,
 *     UploadId?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result uploadPartCopy(array $args = [])
 * @phpstan-method \Aws\Result uploadPartCopy(array{
 *     Bucket?: string,
 *     CopySource?: string,
 *     CopySourceIfMatch?: string,
 *     CopySourceIfModifiedSince?: int|string|\DateTimeInterface,
 *     CopySourceIfNoneMatch?: string,
 *     CopySourceIfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     CopySourceRange?: string,
 *     Key?: string,
 *     PartNumber?: int,
 *     UploadId?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     CopySourceSSECustomerAlgorithm?: string,
 *     CopySourceSSECustomerKey?: string,
 *     CopySourceSSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ExpectedSourceBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadPartCopyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadPartCopyAsync(array{
 *     Bucket?: string,
 *     CopySource?: string,
 *     CopySourceIfMatch?: string,
 *     CopySourceIfModifiedSince?: int|string|\DateTimeInterface,
 *     CopySourceIfNoneMatch?: string,
 *     CopySourceIfUnmodifiedSince?: int|string|\DateTimeInterface,
 *     CopySourceRange?: string,
 *     Key?: string,
 *     PartNumber?: int,
 *     UploadId?: string,
 *     SSECustomerAlgorithm?: string,
 *     SSECustomerKey?: string,
 *     SSECustomerKeyMD5?: string,
 *     CopySourceSSECustomerAlgorithm?: string,
 *     CopySourceSSECustomerKey?: string,
 *     CopySourceSSECustomerKeyMD5?: string,
 *     RequestPayer?: 'requester',
 *     ExpectedBucketOwner?: string,
 *     ExpectedSourceBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result writeGetObjectResponse(array $args = [])
 * @phpstan-method \Aws\Result writeGetObjectResponse(array{
 *     RequestRoute?: string,
 *     RequestToken?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     StatusCode?: int,
 *     ErrorCode?: string,
 *     ErrorMessage?: string,
 *     AcceptRanges?: string,
 *     CacheControl?: string,
 *     ContentDisposition?: string,
 *     ContentEncoding?: string,
 *     ContentLanguage?: string,
 *     ContentLength?: int,
 *     ContentRange?: string,
 *     ContentType?: string,
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     DeleteMarker?: bool,
 *     ETag?: string,
 *     Expires?: int|string|\DateTimeInterface,
 *     Expiration?: string,
 *     LastModified?: int|string|\DateTimeInterface,
 *     MissingMeta?: int,
 *     Metadata?: array<string, string>,
 *     ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *     ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *     ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *     PartsCount?: int,
 *     ReplicationStatus?: 'COMPLETE'|'COMPLETED'|'FAILED'|'PENDING'|'REPLICA',
 *     RequestCharged?: 'requester',
 *     Restore?: string,
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     SSECustomerAlgorithm?: string,
 *     SSEKMSKeyId?: string,
 *     SSECustomerKeyMD5?: string,
 *     StorageClass?: 'DEEP_ARCHIVE'|'EXPRESS_ONEZONE'|'FSX_ONTAP'|'FSX_OPENZFS'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'REDUCED_REDUNDANCY'|'SNOW'|'STANDARD'|'STANDARD_IA',
 *     TagCount?: int,
 *     VersionId?: string,
 *     BucketKeyEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise writeGetObjectResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise writeGetObjectResponseAsync(array{
 *     RequestRoute?: string,
 *     RequestToken?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     StatusCode?: int,
 *     ErrorCode?: string,
 *     ErrorMessage?: string,
 *     AcceptRanges?: string,
 *     CacheControl?: string,
 *     ContentDisposition?: string,
 *     ContentEncoding?: string,
 *     ContentLanguage?: string,
 *     ContentLength?: int,
 *     ContentRange?: string,
 *     ContentType?: string,
 *     ChecksumCRC32?: string,
 *     ChecksumCRC32C?: string,
 *     ChecksumCRC64NVME?: string,
 *     ChecksumSHA1?: string,
 *     ChecksumSHA256?: string,
 *     ChecksumSHA512?: string,
 *     ChecksumMD5?: string,
 *     ChecksumXXHASH64?: string,
 *     ChecksumXXHASH3?: string,
 *     ChecksumXXHASH128?: string,
 *     DeleteMarker?: bool,
 *     ETag?: string,
 *     Expires?: int|string|\DateTimeInterface,
 *     Expiration?: string,
 *     LastModified?: int|string|\DateTimeInterface,
 *     MissingMeta?: int,
 *     Metadata?: array<string, string>,
 *     ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *     ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *     ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *     PartsCount?: int,
 *     ReplicationStatus?: 'COMPLETE'|'COMPLETED'|'FAILED'|'PENDING'|'REPLICA',
 *     RequestCharged?: 'requester',
 *     Restore?: string,
 *     ServerSideEncryption?: 'AES256'|'aws:fsx'|'aws:kms'|'aws:kms:dsse',
 *     SSECustomerAlgorithm?: string,
 *     SSEKMSKeyId?: string,
 *     SSECustomerKeyMD5?: string,
 *     StorageClass?: 'DEEP_ARCHIVE'|'EXPRESS_ONEZONE'|'FSX_ONTAP'|'FSX_OPENZFS'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'REDUCED_REDUNDANCY'|'SNOW'|'STANDARD'|'STANDARD_IA',
 *     TagCount?: int,
 *     VersionId?: string,
 *     BucketKeyEnabled?: bool,
 *     ...,
 * } $args = [])
 */
class S3Client extends AwsClient implements S3ClientInterface
{
    private const DIRECTORY_BUCKET_REGEX = '/^[a-zA-Z0-9_-]+--[a-z0-9]+-az\d+--x-s3'
                                            .'(?!.*(?:-s3alias|--ol-s3|\.mrap))$/';
    use S3ClientTrait;

    /** @var array */
    private static $mandatoryAttributes = ['Bucket', 'Key'];

    /** @var array */
    private static $checksumOptionEnum = [
        'when_supported' => true,
        'when_required' => true
    ];

    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['retries']['fn'] = [__CLASS__, '_applyRetryConfig'];
        $args['api_provider']['fn'] = [__CLASS__, '_applyApiProvider'];

        return
            [
                'request_checksum_calculation' => [
                    'type' => 'config',
                    'valid' => ['string'],
                    'doc' => 'Valid values are `when_supported` and `when_required`. Default is `when_supported`.'
                        . ' `when_supported` results in checksum calculation when an operation has modeled checksum support.'
                        . ' `when_required` results in checksum calculation when an operation has modeled checksum support and'
                        . ' request checksums are modeled as required.',
                    'fn' => [__CLASS__, '_apply_request_checksum_calculation'],
                    'default' => [__CLASS__, '_default_request_checksum_calculation'],
                ],
                'response_checksum_validation' => [
                    'type' => 'config',
                    'valid' => ['string'],
                    'doc' => 'Valid values are `when_supported` and `when_required`. Default is `when_supported`.'
                        . ' `when_supported` results in checksum validation when an operation has modeled checksum support.'
                        . ' `when_required` results in checksum validation when an operation has modeled checksum support and'
                        . ' `CheckSumMode` is set to `enabled`.',
                    'fn' => [__CLASS__, '_apply_response_checksum_validation'],
                    'default' => [__CLASS__, '_default_response_checksum_validation'],
                ]
            ]
            + $args + [
                'bucket_endpoint' => [
                    'type'    => 'config',
                    'valid'   => ['bool'],
                    'doc'     => 'Set to true to send requests to a hardcoded '
                        . 'bucket endpoint rather than create an endpoint as a '
                        . 'result of injecting the bucket into the URL. This '
                        . 'option is useful for interacting with CNAME endpoints.',
                ],
                'use_arn_region' => [
                    'type'    => 'config',
                    'valid'   => [
                        'bool',
                        Configuration::class,
                        CacheInterface::class,
                        'callable'
                    ],
                    'doc'     => 'Set to true to allow passed in ARNs to override'
                        . ' client region. Accepts...',
                    'fn' => [__CLASS__, '_apply_use_arn_region'],
                    'default' => [UseArnRegionConfigurationProvider::class, 'defaultProvider'],
                ],
                'use_accelerate_endpoint' => [
                    'type' => 'config',
                    'valid' => ['bool'],
                    'doc' => 'Set to true to send requests to an S3 Accelerate'
                        . ' endpoint by default. Can be enabled or disabled on'
                        . ' individual operations by setting'
                        . ' \'@use_accelerate_endpoint\' to true or false. Note:'
                        . ' you must enable S3 Accelerate on a bucket before it can'
                        . ' be accessed via an Accelerate endpoint.',
                    'default' => false,
                ],
                'use_path_style_endpoint' => [
                    'type' => 'config',
                    'valid' => ['bool'],
                    'doc' => 'Set to true to send requests to an S3 path style'
                        . ' endpoint by default.'
                        . ' Can be enabled or disabled on individual operations by setting'
                        . ' \'@use_path_style_endpoint\' to true or false.',
                    'default' => false,
                ],
                'disable_multiregion_access_points' => [
                    'type' => 'config',
                    'valid' => ['bool'],
                    'doc' => 'Set to true to disable the usage of'
                        . ' multi region access points. These are enabled by default.'
                        . ' Can be enabled or disabled on individual operations by setting'
                        . ' \'@disable_multiregion_access_points\' to true or false.',
                    'default' => false,
                ],
                'disable_express_session_auth' => [
                    'type' => 'config',
                    'valid' => ['bool'],
                    'doc' => 'Set to true to disable the usage of'
                        . ' s3 express session authentication. This is enabled by default.',
                    'default' => [__CLASS__, '_default_disable_express_session_auth'],
                ],
                's3_express_identity_provider' => [
                    'type'    => 'config',
                    'valid'   => [
                        'bool',
                        'callable'
                    ],
                    'doc'     => 'Specifies the provider used to generate identities to sign s3 express requests.  '
                        . 'Set to `false` to disable s3 express auth, or a callable provider used to create s3 express '
                        . 'identities or return null.',
                    'default' => [__CLASS__, '_default_s3_express_identity_provider'],
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
     *   interacting with CNAME endpoints. Note: if you are using version 2.243.0
     *   and above and do not expect the bucket name to appear in the host, you will
     *   also need to set `use_path_style_endpoint` to `true`.
     * - calculate_md5: (bool) Set to false to disable calculating an MD5
     *   for all Amazon S3 signed uploads.
     * - s3_us_east_1_regional_endpoint:
     *   (Aws\S3\RegionalEndpoint\ConfigurationInterface|Aws\CacheInterface\|callable|string|array)
     *   Specifies whether to use regional or legacy endpoints for the us-east-1
     *   region. Provide an Aws\S3\RegionalEndpoint\ConfigurationInterface object, an
     *   instance of Aws\CacheInterface, a callable configuration provider used
     *   to create endpoint configuration, a string value of `legacy` or
     *   `regional`, or an associative array with the following keys:
     *   endpoint_types: (string)  Set to `legacy` or `regional`, defaults to
     *   `legacy`
     * - use_accelerate_endpoint: (bool) Set to true to send requests to an S3
     *   Accelerate endpoint by default. Can be enabled or disabled on
     *   individual operations by setting '@use_accelerate_endpoint' to true or
     *   false. Note: you must enable S3 Accelerate on a bucket before it can be
     *   accessed via an Accelerate endpoint.
     * - use_arn_region: (Aws\S3\UseArnRegion\ConfigurationInterface,
     *   Aws\CacheInterface, bool, callable) Set to true to enable the client
     *   to use the region from a supplied ARN argument instead of the client's
     *   region. Provide an instance of Aws\S3\UseArnRegion\ConfigurationInterface,
     *   an instance of Aws\CacheInterface, a callable that provides a promise for
     *   a Configuration object, or a boolean value. Defaults to false (i.e.
     *   the SDK will not follow the ARN region if it conflicts with the client
     *   region and instead throw an error).
     * - use_dual_stack_endpoint: (bool) Set to true to send requests to an S3
     *   Dual Stack endpoint by default, which enables IPv6 Protocol.
     *   Can be enabled or disabled on individual operations by setting
     *   '@use_dual_stack_endpoint\' to true or false. Note:
     *   you cannot use it together with an accelerate endpoint.
     * - use_path_style_endpoint: (bool) Set to true to send requests to an S3
     *   path style endpoint by default.
     *   Can be enabled or disabled on individual operations by setting
     *   '@use_path_style_endpoint\' to true or false. Note:
     *   you cannot use it together with an accelerate endpoint.
     * - disable_multiregion_access_points: (bool) Set to true to disable
     *   sending multi region requests.  They are enabled by default.
     *   Can be enabled or disabled on individual operations by setting
     *   '@disable_multiregion_access_points\' to true or false. Note:
     *   you cannot use it together with an accelerate or dualstack endpoint.
     *
     * @param array $args
     */
    public function __construct(array $args)
    {
        if (
            !isset($args['s3_us_east_1_regional_endpoint'])
            || $args['s3_us_east_1_regional_endpoint'] instanceof CacheInterface
        ) {
            $args['s3_us_east_1_regional_endpoint'] = ConfigurationProvider::defaultProvider($args);
        }
        $this->addBuiltIns($args);
        parent::__construct($args);
        $stack = $this->getHandlerList();
        $config = $this->getConfig();
        $stack->appendInit(SSECMiddleware::wrap($this->getEndpoint()->getScheme()), 's3.ssec');
        $stack->appendBuild(
            ApplyChecksumMiddleware::wrap($this->getApi(), $this->getConfig()),
            's3.checksum'
        );
        $stack->appendBuild(
            Middleware::contentType(['PutObject', 'UploadPart']),
            's3.content_type'
        );

        if ($this->getConfig('bucket_endpoint')) {
            $stack->appendBuild(BucketEndpointMiddleware::wrap(
                $this->isUseEndpointV2(), $args['endpoint'] ?? null), 's3.bucket_endpoint'
            );
        } elseif (!$this->isUseEndpointV2()) {
            $stack->appendBuild(
                S3EndpointMiddleware::wrap(
                    $this->getRegion(),
                    $this->getConfig('endpoint_provider'),
                    [
                        'accelerate' => $this->getConfig('use_accelerate_endpoint'),
                        'path_style' => $this->getConfig('use_path_style_endpoint'),
                        'use_fips_endpoint' => $this->getConfig('use_fips_endpoint'),
                        'dual_stack' =>
                            $this->getConfig('use_dual_stack_endpoint')->isUseDualStackEndpoint(),

                    ]
                ),
                's3.endpoint_middleware'
            );
        }

        $stack->appendBuild(
            BucketEndpointArnMiddleware::wrap(
                $this->getApi(),
                $this->getRegion(),
                [
                    'use_arn_region' => $this->getConfig('use_arn_region'),
                    'accelerate' => $this->getConfig('use_accelerate_endpoint'),
                    'path_style' => $this->getConfig('use_path_style_endpoint'),
                    'dual_stack' =>
                        $this->getConfig('use_dual_stack_endpoint')->isUseDualStackEndpoint(),
                    'use_fips_endpoint' => $this->getConfig('use_fips_endpoint'),
                    'disable_multiregion_access_points' =>
                        $this->getConfig('disable_multiregion_access_points'),
                    'endpoint' => $args['endpoint'] ?? null
                ],
                $this->isUseEndpointV2()
            ),
            's3.bucket_endpoint_arn'
        );
        if ($this->getConfig('disable_express_session_auth')) {
            $stack->prependSign(
                $this->getDisableExpressSessionAuthMiddleware(),
                's3.disable_express_session_auth'
            );
        }

        $stack->appendValidate(
            InputValidationMiddleware::wrap($this->getApi(), self::$mandatoryAttributes),
            'input_validation_middleware'
        );
        $stack->appendSign(ExpiresParsingMiddleware::wrap(), 's3.expires_parsing');
        $stack->appendSign(PutObjectUrlMiddleware::wrap(), 's3.put_object_url');
        $stack->appendSign(PermanentRedirectMiddleware::wrap(), 's3.permanent_redirect');
        $stack->appendInit(Middleware::sourceFile($this->getApi()), 's3.source_file');
        $stack->appendInit($this->getSaveAsParameter(), 's3.save_as');
        $stack->appendInit($this->getLocationConstraintMiddleware(), 's3.location');
        $stack->appendInit($this->getEncodingTypeMiddleware(), 's3.auto_encode');
        $stack->appendInit($this->getHeadObjectMiddleware(), 's3.head_object');
        $this->processModel($this->isUseEndpointV2());
        if ($this->isUseEndpointV2()) {
            $stack->after('builder',
                's3.check_empty_path_with_query',
                $this->getEmptyPathWithQuery());
        }
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
        if (!is_string($bucket)) {
            return false;
        }
        $bucketLen = strlen($bucket);

        return ($bucketLen >= 3 && $bucketLen <= 63) &&
            // Cannot look like an IP address
            !filter_var($bucket, FILTER_VALIDATE_IP) &&
            preg_match('/^[a-z0-9]([a-z0-9\-\.]*[a-z0-9])?$/', $bucket);
    }

    public static function _apply_use_arn_region($value, array &$args, HandlerList $list)
    {
        if ($value instanceof CacheInterface) {
            $value = UseArnRegionConfigurationProvider::defaultProvider($args);
        }
        if (is_callable($value)) {
            $value = $value();
        }
        if ($value instanceof PromiseInterface) {
            $value = $value->wait();
        }
        if ($value instanceof ConfigurationInterface) {
            $args['use_arn_region'] = $value;
        } else {
            // The Configuration class itself will validate other inputs
            $args['use_arn_region'] = new Configuration($value);
        }
    }

    public static function _default_request_checksum_calculation(array $args): string
    {
        return ConfigurationResolver::resolve(
            'request_checksum_calculation',
            ApplyChecksumMiddleware::DEFAULT_CALCULATION_MODE,
            'string',
            $args
        );
    }

    public static function _apply_request_checksum_calculation(
        string $value,
        array &$args
    ): void
    {
        $value = strtolower($value);
        if (array_key_exists($value, self::$checksumOptionEnum)) {
            $args['request_checksum_calculation'] = $value;
        } else {
            $validValues = implode(' | ', array_keys(self::$checksumOptionEnum));
            throw new \InvalidArgumentException(
                'invalid value provided for `request_checksum_calculation`.'
                . ' valid values are: ' . $validValues . '.'
            );
        }
    }

    public static function _default_response_checksum_validation(array $args): string
    {
        return ConfigurationResolver::resolve(
            'response_checksum_validation',
            ValidateResponseChecksumResultMutator::DEFAULT_VALIDATION_MODE,
            'string',
            $args
        );
    }

    public static function _apply_response_checksum_validation(
        $value,
        array &$args
    ): void
    {
        $value = strtolower($value);
        if (array_key_exists($value, self::$checksumOptionEnum)) {
            $args['response_checksum_validation'] = $value;
        } else {
            $validValues = implode(' | ', array_keys(self::$checksumOptionEnum));
            throw new \InvalidArgumentException(
                'invalid value provided for `response_checksum_validation`.'
                . ' valid values are: ' . $validValues . '.'
            );
        }
    }

    public static function _default_disable_express_session_auth(array &$args)
    {
        return ConfigurationResolver::resolve(
            's3_disable_express_session_auth',
            false,
            'bool',
            $args
        );
    }

    public static function _default_s3_express_identity_provider(array $args)
    {
        if ($args['config']['disable_express_session_auth']) {
            return false;
        }
        return new S3ExpressIdentityProvider($args['region']);
    }

    public function createPresignedRequest(CommandInterface $command, $expires, array $options = [])
    {
        $command = clone $command;
        $list = $command->getHandlerList();
        $list->remove('signer');

        //Removes checksum calculation behavior by default
        if (empty($command['ChecksumAlgorithm'])
            && empty($command['AddContentMD5'])
        ) {
            $list->remove('s3.checksum');
        }

        $request = \Aws\serialize($command);

        //Applies ContentSHA256 parameter, if provided and not applied
        // by middleware
        $commandName = $command->getName();
        if (!empty($command['ContentSHA256']
            && isset(ApplyChecksumMiddleware::$sha256[$commandName])
            && !$request->hasHeader('X-Amz-Content-Sha256')
        )) {
            $request = $request->withHeader(
                'X-Amz-Content-Sha256',
                $command['ContentSHA256']
            );
        }

        $signing_name = $command['@context']['signing_service']
            ?? $this->getSigningName($request->getUri()->getHost());
        $signature_version = $this->getSignatureVersionFromCommand($command);

        /** @var \Aws\Signature\SignatureInterface $signer */
        $signer = call_user_func(
            $this->getSignatureProvider(),
            $signature_version,
            $signing_name,
            $this->getConfig('signing_region')
        );
        if ($signature_version == 'v4-s3express') {
            $provider = $this->getConfig('s3_express_identity_provider');
            $credentials = $provider($command)->wait();
        } else {
            $credentials = $this->getCredentials()->wait();
        }
        return $signer->presign(
            $request,
            $credentials,
            $expires,
            $options
        );
    }

    /**
     * Returns the URL to an object identified by its bucket and key.
     *
     * The URL returned by this method is not signed nor does it ensure that the
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
     * Provides a middleware that removes the need to specify LocationConstraint on CreateBucket.
     *
     * @return \Closure
     */
    private function getLocationConstraintMiddleware()
    {
        $region = $this->getRegion();
        return static function (callable $handler) use ($region) {
            return function (Command $command, $request = null) use ($handler, $region) {
                if ($command->getName() === 'CreateBucket'
                    && !self::isDirectoryBucket($command['Bucket'])
                ) {
                    $locationConstraint = $command['CreateBucketConfiguration']['LocationConstraint']
                        ?? null;

                    if ($locationConstraint === 'us-east-1') {
                        unset($command['CreateBucketConfiguration']);
                    } elseif ('us-east-1' !== $region && empty($locationConstraint)) {
                        if (isset($command['CreateBucketConfiguration'])) {
                            $command['CreateBucketConfiguration']['LocationConstraint'] = $region;
                        } else {
                            $command['CreateBucketConfiguration'] = ['LocationConstraint' => $region];
                        }
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

    /**
     * Provides a middleware that disables content decoding on HeadObject
     * commands.
     *
     * @return \Closure
     */
    private function getHeadObjectMiddleware()
    {
        return static function (callable $handler) {
            return function (
                CommandInterface $command,
                ?RequestInterface $request = null
            ) use ($handler) {
                if ($command->getName() === 'HeadObject'
                    && !isset($command['@http']['decode_content'])
                ) {
                    $command['@http']['decode_content'] = false;
                }

                return $handler($command, $request);
            };
        };
    }

    /**
     * Provides a middleware that autopopulates the EncodingType parameter on
     * ListObjects commands.
     *
     * @return \Closure
     */
    private function getEncodingTypeMiddleware()
    {
        return static function (callable $handler) {
            return function (Command $command, $request = null) use ($handler) {
                $autoSet = false;
                if ($command->getName() === 'ListObjects'
                    && empty($command['EncodingType'])
                ) {
                    $command['EncodingType'] = 'url';
                    $autoSet = true;
                }

                return $handler($command, $request)
                    ->then(function (ResultInterface $result) use ($autoSet) {
                        if ($result['EncodingType'] === 'url' && $autoSet) {
                            static $topLevel = [
                                'Delimiter',
                                'Marker',
                                'NextMarker',
                                'Prefix',
                            ];
                            static $nested = [
                                ['Contents', 'Key'],
                                ['CommonPrefixes', 'Prefix'],
                            ];

                            foreach ($topLevel as $key) {
                                if (isset($result[$key])) {
                                    $result[$key] = urldecode($result[$key]);
                                }
                            }
                            foreach ($nested as $steps) {
                                if (isset($result[$steps[0]])) {
                                    foreach ($result[$steps[0]] as $key => $part) {
                                        if (isset($part[$steps[1]])) {
                                            $result[$steps[0]][$key][$steps[1]]
                                                = urldecode($part[$steps[1]]);
                                        }
                                    }
                                }
                            }

                        }

                        return $result;
                    });
            };
        };
    }

    /**
     * Provides a middleware that checks for an empty path and a
     * non-empty query string.
     *
     * @return \Closure
     */
    private function getEmptyPathWithQuery()
    {
        return static function (callable $handler) {
            return function (Command $command, RequestInterface $request) use ($handler) {
                $uri = $request->getUri();
                if (empty($uri->getPath()) && !empty($uri->getQuery())) {
                    $uri = $uri->withPath('/');
                    $request = $request->withUri($uri);
                }

                return $handler($command, $request);
            };
        };
    }

    /**
     * Provides a middleware that disables express session auth when
     * customers opt out of it.
     *
     * @return \Closure
     */
    private function getDisableExpressSessionAuthMiddleware()
    {
        return static function (callable $handler) {
            return static function (
                CommandInterface $command,
                ?RequestInterface $request = null
            ) use ($handler) {
                if (!empty($command['@context']['signature_version'])
                    && $command['@context']['signature_version'] === 'v4-s3express'
                ) {
                    $command['@context']['signature_version'] = 's3v4';
                }
                return $handler($command, $request);
            };
        };
    }

    /**
     * Special handling for when the service name is s3-object-lambda.
     * So, if the host contains s3-object-lambda, then the service name
     * returned is s3-object-lambda, otherwise the default signing service is returned.
     * @param string $host The host to validate if is a s3-object-lambda URL.
     * @return string returns the signing service name to be used
     */
    private function getSigningName($host)
    {
        if (strpos( $host, 's3-object-lambda')) {
            return 's3-object-lambda';
        }

        return $this->getConfig('signing_name');
    }

    /**
     * If EndpointProviderV2 is used, removes `Bucket` from request URIs.
     * This is now handled by the endpoint ruleset.
     *
     * Additionally adds a synthetic shape `ExpiresString` and modifies
     * `Expires` type to ensure it remains set to `timestamp`.
     *
     * @param array $args
     * @return void
     *
     * @internal
     */
    private function processModel(bool $isUseEndpointV2): void
    {
        $definition = $this->getApi()->getDefinition();

        if ($isUseEndpointV2) {
            foreach($definition['operations'] as &$operation) {
                if (isset($operation['http']['requestUri'])) {
                    $requestUri = $operation['http']['requestUri'];
                    if ($requestUri === "/{Bucket}") {
                        $requestUri = str_replace('/{Bucket}', '/', $requestUri);
                    } else {
                        $requestUri = str_replace('/{Bucket}', '', $requestUri);
                        // If we're left with just a query string, prepend '/'
                        if (str_starts_with($requestUri, '?')) {
                            $requestUri = '/' . $requestUri;
                        }
                    }
                    $operation['http']['requestUri'] = $requestUri;
                }
            }
        }

        foreach ($definition['shapes'] as $key => &$value) {
            $suffix = 'Output';
            if (str_ends_with($key, $suffix)) {
                if (isset($value['members']['Expires'])) {
                    $value['members']['Expires']['deprecated'] = true;
                    $value['members']['ExpiresString'] = [
                        'shape' => 'ExpiresString',
                        'location' => 'header',
                        'locationName' => 'Expires'
                    ];
                }
            }
        }
        $definition['shapes']['ExpiresString']['type'] = 'string';
        $definition['shapes']['Expires']['type'] = 'timestamp';

        $this->getApi()->setDefinition($definition);
    }

    /**
     * Adds service-specific client built-in values
     *
     * @return void
     */
    private function addBuiltIns($args)
    {
        if (isset($args['region'])
            && $args['region'] !== 'us-east-1'
        ) {
            return false;
        }

        if (!isset($args['region'])
            && ConfigurationResolver::resolve('region', '', 'string') !== 'us-east-1'
        ) {
            return false;
        }

        $key = 'AWS::S3::UseGlobalEndpoint';
        $result = $args['s3_us_east_1_regional_endpoint'] instanceof \Closure ?
            $args['s3_us_east_1_regional_endpoint']()->wait() : $args['s3_us_east_1_regional_endpoint'];

        if (is_string($result)) {
            if ($result === 'regional') {
                $value = false;
            } else if ($result === 'legacy') {
                $value = true;
            } else {
                return;
            }
        } else {
            if ($result->isFallback()
                || $result->getEndpointsType() === 'legacy'
            ) {
                $value = true;
            } else {
                $value = false;
            }
        }
        $this->clientBuiltIns[$key] = $value;
    }

    /**
     * Determines whether a bucket is a directory bucket.
     * Only considers the availability zone/suffix format
     *
     * @param string $bucket
     * @return bool
     */
    public static function isDirectoryBucket(string $bucket): bool
    {
        return preg_match(self::DIRECTORY_BUCKET_REGEX, $bucket) === 1;
    }

    /** @internal */
    public static function _applyRetryConfig($value, $args, HandlerList $list)
    {
        if (!$value) {
            return;
        }

        $config = \Aws\Retry\ConfigurationProvider::unwrap($value);

        if ($config->getMode() === 'legacy') {
            self::appendLegacyModeRetries($config, $list);
            return;
        }

        if (NewRetriesOptIn::isEnabled()) {
            self::appendStandardModeRetriesNew($config, $args, $list);
            return;
        }

        self::appendStandardModeRetries($config, $args, $list);
    }

    private static function appendLegacyModeRetries(
        RetryConfigurationInterface $config,
        HandlerList $list
    ): void
    {
        $maxRetries = $config->getMaxAttempts() - 1;
        $baseDecider = RetryMiddleware::createDefaultDecider($maxRetries);

        $decider = function ($retries, $command, $request, $result, $error) use ($baseDecider, $maxRetries) {
            $effectiveMax = $command['@retries'] ?? $maxRetries;

            if ($baseDecider($retries, $command, $request, $result, $error)) {
                return true;
            }

            if ($error instanceof AwsException && $retries < $effectiveMax) {
                return self::isS3SocketIssue($error, $command->getName());
            }

            return false;
        };

        $list->appendSign(
            Middleware::retry($decider, [RetryMiddleware::class, 'exponentialDelay']),
            'retry'
        );
    }

    private static function appendStandardModeRetries(
        RetryConfigurationInterface $config,
        $args,
        HandlerList $list
    ): void
    {
        // decider that combines V2's default decider with S3-specific checks.
        $defaultDecider = RetryMiddlewareV2::createDefaultDecider(
            new QuotaManager(),
            $config->getMaxAttempts()
        );

        $list->appendSign(
            RetryMiddlewareV2::wrap(
                $config,
                [
                    'collect_stats' => $args['stats']['retries'],
                    'decider' => function (
                        $attempts,
                        CommandInterface $cmd,
                        $result
                    ) use ($defaultDecider, $config) {
                        if ($defaultDecider($attempts, $cmd, $result)) {
                            return true;
                        }
                        if ($result instanceof AwsException
                            && $attempts < $config->getMaxAttempts()
                        ) {
                            return self::isS3SocketIssue($result, $cmd->getName());
                        }
                        return false;
                    },
                ]
            ),
            'retry'
        );
    }

    private static function appendStandardModeRetriesNew(
        RetryConfigurationInterface $config,
        $args,
        HandlerList $list
    ): void
    {
        // AWS_NEW_RETRIES_2026 path. The base middleware already handles
        // the standard retryable shapes, so this decider only adds the
        // S3-specific socket carve-out.
        $list->appendSign(
            RetryV3Middleware::wrap(
                $config,
                [
                    'collect_stats' => $args['stats']['retries'],
                    'service'       => $args['service'],
                    'decider' => function (
                        $attempts,
                        CommandInterface $cmd,
                        $result
                    ) {
                        return $result instanceof AwsException
                            && self::isS3SocketIssue($result, $cmd->getName());
                    },
                ]
            ),
            'retry'
        );
    }

    private static function isS3SocketIssue(AwsException $error, string $commandName): bool
    {
        $response = $error->getResponse();
        if (!empty($response) && $response->getStatusCode() >= 400) {
            return strpos(
                (string) $response->getBody(),
                'Your socket connection to the server'
            ) !== false;
        }

        // All commands except CompleteMultipartUpload are idempotent and may
        // be retried without worry if a networking error has occurred.
        return $error->getPrevious() instanceof RequestException
            && $commandName !== 'CompleteMultipartUpload';
    }

    /** @internal */
    public static function _applyApiProvider($value, array &$args, HandlerList $list)
    {
        ClientResolver::_apply_api_provider($value, $args);
        $s3Parser = new S3Parser(
            $args['parser'],
            $args['error_parser'],
            $args['api'],
            $args['exception_class']
        );
        $s3Parser->addS3ResultMutator(
            'get-bucket-location',
            new GetBucketLocationResultMutator()
        );
        $s3Parser->addS3ResultMutator(
            'validate-response-checksum',
            new ValidateResponseChecksumResultMutator(
                $args['api'],
                ['response_checksum_validation' => $args['response_checksum_validation']]
            )
        );
        $args['parser'] = $s3Parser;
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        $b64 = '<div class="alert alert-info">This value will be base64 encoded on your behalf.</div>';
        $opt = '<div class="alert alert-info">This value will be computed for you it is not supplied.</div>';

        // Add a note on the CopyObject docs
         $s3ExceptionRetryMessage = "<p>Additional info on response behavior: if there is"
            . " an internal error in S3 after the request was successfully received,"
            . " a 200 response will be returned with an <code>S3Exception</code> embedded"
            . " in it; this will still be caught and retried by"
            . " <code>RetryMiddleware.</code></p>";

        $docs['operations']['CopyObject'] .=  $s3ExceptionRetryMessage;
        $docs['operations']['CompleteMultipartUpload'] .=  $s3ExceptionRetryMessage;
        $docs['operations']['UploadPartCopy'] .=  $s3ExceptionRetryMessage;
        $docs['operations']['UploadPart'] .=  $s3ExceptionRetryMessage;

        // Add note about stream ownership in the putObject call
        $guzzleStreamMessage = "<p>Additional info on behavior of the stream"
            . " parameters: Psr7 takes ownership of streams and will automatically close"
            . " streams when this method is called with a stream as the <code>Body</code>"
            . " parameter.  To prevent this, set the <code>Body</code> using"
            . " <code>GuzzleHttp\Psr7\stream_for</code> method with a is an instance of"
            . " <code>Psr\Http\Message\StreamInterface</code>, and it will be returned"
            . " unmodified. This will allow you to keep the stream in scope. </p>";
        $docs['operations']['PutObject'] .=  $guzzleStreamMessage;

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
        $docs['shapes']['ContentSHA256']['append'] = $opt;

        // Add the AddContentMD5 parameter.
        $docs['shapes']['AddContentMD5']['base'] = 'Set to true to calculate the ContentMD5 for the upload.';
        $api['shapes']['AddContentMD5'] = ['type' => 'boolean'];
        $api['shapes']['PutObjectRequest']['members']['AddContentMD5'] = ['shape' => 'AddContentMD5'];
        $api['shapes']['UploadPartRequest']['members']['AddContentMD5'] = ['shape' => 'AddContentMD5'];

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

        // Add a note that the ContentMD5 is automatically computed, except for with PutObject and UploadPart
        $docs['shapes']['ContentMD5']['append'] = '<div class="alert alert-info">The value will be computed on '
            . 'your behalf.</div>';
        $docs['shapes']['ContentMD5']['excludeAppend'] = ['PutObjectRequest', 'UploadPartRequest'];

        //Add a note to ContentMD5 for PutObject and UploadPart that specifies the value is required
        // When uploading to a bucket with object lock enabled and that it is not computed automatically
        $objectLock = '<div class="alert alert-info">This value is required if uploading to a bucket '
            . 'which has Object Lock enabled. It will not be calculated for you automatically. If you wish to have '
            . 'the value calculated for you, use the `AddContentMD5` parameter.</div>';
        $docs['shapes']['ContentMD5']['appendOnly'] = [
            'message' => $objectLock,
            'shapes' => ['PutObjectRequest', 'UploadPartRequest']
        ];

        // Add `ExpiresString` shape to output structures which contain `Expires`
        // Deprecate existing `Expires` shapes in output structures
        // Add/Update documentation for both `ExpiresString` and `Expires`
        // Ensure `Expires` type remains timestamp
        foreach ($api['shapes'] as $key => &$value) {
            $suffix = 'Output';
            if (substr($key, -strlen($suffix)) === $suffix) {
                if (isset($value['members']['Expires'])) {
                    $value['members']['Expires']['deprecated'] = true;
                    $value['members']['ExpiresString'] = [
                        'shape' => 'ExpiresString',
                        'location' => 'header',
                        'locationName' => 'Expires'
                    ];
                    $docs['shapes']['Expires']['refs'][$key . '$Expires']
                        .= '<p>This output shape has been deprecated. Please refer to <code>ExpiresString</code> instead.</p>.';
                }
            }
        }
        $api['shapes']['ExpiresString']['type'] = 'string';
        $docs['shapes']['ExpiresString']['base'] = 'The unparsed string value of the <code>Expires</code> output member.';
        $api['shapes']['Expires']['type'] = 'timestamp';

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function addDocExamples($examples)
    {
        $getObjectExample = [
            'input' => [
                'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myaccesspoint',
                'Key' => 'my-key'
            ],
            'output' => [
                'Body' => 'class GuzzleHttp\Psr7\Stream#208 (7) {...}',
                'ContentLength' => '11',
                'ContentType' => 'application/octet-stream',
            ],
            'comments' => [
                'input' => '',
                'output' => 'Simplified example output'
            ],
            'description' => 'The following example retrieves an object by referencing the bucket via an S3 accesss point ARN. Result output is simplified for the example.',
            'id' => '',
            'title' => 'To get an object via an S3 access point ARN'
        ];
        if (isset($examples['GetObject'])) {
            $examples['GetObject'] []= $getObjectExample;
        } else {
            $examples['GetObject'] = [$getObjectExample];
        }

        $putObjectExample = [
            'input' => [
                'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myaccesspoint',
                'Key' => 'my-key',
                'Body' => 'my-body',
            ],
            'output' => [
                'ObjectURL' => 'https://my-bucket.s3.us-east-1.amazonaws.com/my-key'
            ],
            'comments' => [
                'input' => '',
                'output' => 'Simplified example output'
            ],
            'description' => 'The following example uploads an object by referencing the bucket via an S3 accesss point ARN. Result output is simplified for the example.',
            'id' => '',
            'title' => 'To upload an object via an S3 access point ARN'
        ];
        if (isset($examples['PutObject'])) {
            $examples['PutObject'] []= $putObjectExample;
        } else {
            $examples['PutObject'] = [$putObjectExample];
        }

        return $examples;
    }

    /**
     * @param CommandInterface $command
     * @return array|mixed|null
     */
    private function getSignatureVersionFromCommand(CommandInterface $command)
    {
        return $command['@context']['signature_version']
            ?? $this->getConfig('signature_version');
    }
}
