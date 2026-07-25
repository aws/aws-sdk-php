<?php
namespace Aws\S3;

use Aws\AwsClientInterface;
use Aws\CommandInterface;
use Aws\ResultInterface;
use Aws\S3\Exception\S3Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * **Amazon Simple Storage Service** client.
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
interface S3ClientInterface extends AwsClientInterface
{
    /**
     * Create a pre-signed URL for the given S3 command object.
     *
     * @param CommandInterface              $command Command to create a pre-signed
     *                                               URL for.
     * @param int|string|\DateTimeInterface $expires The time at which the URL should
     *                                               expire. This can be a Unix
     *                                               timestamp, a PHP DateTime object,
     *                                               or a string that can be evaluated
     *                                               by strtotime().
     *
     * @return RequestInterface
     */
    public function createPresignedRequest(CommandInterface $command, $expires, array $options = []);

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
    public function getObjectUrl($bucket, $key);

    /**
     * @deprecated Use doesBucketExistV2() instead
     *
     * Determines whether or not a bucket exists by name.
     *
     * @param string $bucket  The name of the bucket
     *
     * @return bool
     */
    public function doesBucketExist($bucket);

    /**
     * Determines whether or not a bucket exists by name. This method uses S3's
     * HeadBucket operation and requires the relevant bucket permissions in the
     * default case to prevent errors.
     *
     * @param string $bucket  The name of the bucket
     * @param bool $accept403 Set to true for this method to return true in the case of
     *                        invalid bucket-level permissions. Credentials MUST be valid
     *                        to avoid inaccuracies. Using the default value of false will
     *                        cause an exception to be thrown instead.
     *
     * @return bool
     * @throws S3Exception|\Exception if there is an unhandled exception
     */
    public function doesBucketExistV2($bucket, $accept403);

    /**
     * @deprecated Use doesObjectExistV2() instead
     *
     * Determines whether or not an object exists by name.
     *
     * @param string $bucket  The name of the bucket
     * @param string $key     The key of the object
     * @param array  $options Additional options available in the HeadObject
     *                        operation (e.g., VersionId).
     *
     * @return bool
     */
    public function doesObjectExist($bucket, $key, array $options = []);

    /**
     * Determines whether or not an object exists by name. This method uses S3's HeadObject
     * operation and requires the relevant bucket and object permissions to prevent errors.
     *
     * @param string $bucket The name of the bucket
     * @param string $key The key of the object
     * @param bool $includeDeleteMarkers Set to true to consider delete markers
     *                                   existing objects. Using the default value
     *                                   of false will ignore delete markers and
     *                                   return false.
     * @param array $options Additional options available in the HeadObject
     *                        operation (e.g., VersionId).
     *
     * @return bool
     * @throws S3Exception|\Exception if there is an unhandled exception
     */
    public function doesObjectExistV2($bucket, $key, $includeDeleteMarkers = false, array $options = []);

    /**
     * Register the Amazon S3 stream wrapper with this client instance.
     */
    public function registerStreamWrapper();

    /**
     * Registers the Amazon S3 stream wrapper with this client instance.
     *
     *This version uses doesObjectExistV2 and doesBucketExistV2 to check
     * resource existence.
     */
    public function registerStreamWrapperV2();

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
    );

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
     *
     * @return PromiseInterface     A promise that is settled when matching
     *                              objects are deleted.
     */
    public function deleteMatchingObjectsAsync(
        $bucket,
        $prefix = '',
        $regex = '',
        array $options = []
    );

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
    );

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
    );

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
    );

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
    );

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
    );

    /**
     * Recursively uploads all files in a given directory to a given bucket.
     *
     * @param string $directory Full path to a directory to upload
     * @param string $bucket    Name of the bucket
     * @param string $keyPrefix Virtual directory key prefix to add to each upload
     * @param array  $options   Options available in Aws\S3\Transfer::__construct
     *
     * @see Aws\S3\Transfer for more options and customization
     *
     * @return PromiseInterface A promise that is settled when the upload is
     *                          complete.
     */
    public function uploadDirectoryAsync(
        $directory,
        $bucket,
        $keyPrefix = null,
        array $options = []
    );

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
    );

    /**
     * Downloads a bucket to the local filesystem
     *
     * @param string $directory Directory to download to
     * @param string $bucket    Bucket to download from
     * @param string $keyPrefix Only download objects that use this key prefix
     * @param array  $options   Options available in Aws\S3\Transfer::__construct
     *
     * @return PromiseInterface A promise that is settled when the download is
     *                          complete.
     */
    public function downloadBucketAsync(
        $directory,
        $bucket,
        $keyPrefix = '',
        array $options = []
    );

    /**
     * Returns the region in which a given bucket is located.
     *
     * @param string $bucketName
     *
     * @return string
     */
    public function determineBucketRegion($bucketName);

    /**
     * Returns a promise fulfilled with the region in which a given bucket is
     * located.
     *
     * @param string $bucketName
     *
     * @return PromiseInterface
     */
    public function determineBucketRegionAsync($bucketName);
}
