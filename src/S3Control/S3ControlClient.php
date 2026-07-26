<?php
namespace Aws\S3Control;

use Aws\AwsClient;
use Aws\CacheInterface;
use Aws\HandlerList;
use Aws\S3\UseArnRegion\Configuration;
use Aws\S3\UseArnRegion\ConfigurationInterface;
use Aws\S3\UseArnRegion\ConfigurationProvider as UseArnRegionConfigurationProvider;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * This client is used to interact with the **AWS S3 Control** service.
 * @method \Aws\Result associateAccessGrantsIdentityCenter(array $args = [])
 * @phpstan-method \Aws\Result associateAccessGrantsIdentityCenter(array{AccountId?: string, IdentityCenterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAccessGrantsIdentityCenterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAccessGrantsIdentityCenterAsync(array{AccountId?: string, IdentityCenterArn?: string, ...} $args = [])
 * @method \Aws\Result createAccessGrant(array $args = [])
 * @phpstan-method \Aws\Result createAccessGrant(array{
 *     AccountId?: string,
 *     AccessGrantsLocationId?: string,
 *     AccessGrantsLocationConfiguration?: array{S3SubPrefix?: string, ...},
 *     Grantee?: array{GranteeType?: 'DIRECTORY_GROUP'|'DIRECTORY_USER'|'IAM', GranteeIdentifier?: string, ...},
 *     Permission?: 'READ'|'READWRITE'|'WRITE',
 *     ApplicationArn?: string,
 *     S3PrefixType?: 'Object',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessGrantAsync(array{
 *     AccountId?: string,
 *     AccessGrantsLocationId?: string,
 *     AccessGrantsLocationConfiguration?: array{S3SubPrefix?: string, ...},
 *     Grantee?: array{GranteeType?: 'DIRECTORY_GROUP'|'DIRECTORY_USER'|'IAM', GranteeIdentifier?: string, ...},
 *     Permission?: 'READ'|'READWRITE'|'WRITE',
 *     ApplicationArn?: string,
 *     S3PrefixType?: 'Object',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessGrantsInstance(array $args = [])
 * @phpstan-method \Aws\Result createAccessGrantsInstance(array{
 *     AccountId?: string,
 *     IdentityCenterArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessGrantsInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessGrantsInstanceAsync(array{
 *     AccountId?: string,
 *     IdentityCenterArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessGrantsLocation(array $args = [])
 * @phpstan-method \Aws\Result createAccessGrantsLocation(array{
 *     AccountId?: string,
 *     LocationScope?: string,
 *     IAMRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessGrantsLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessGrantsLocationAsync(array{
 *     AccountId?: string,
 *     LocationScope?: string,
 *     IAMRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result createAccessPoint(array{
 *     AccountId?: string,
 *     Name?: string,
 *     Bucket?: string,
 *     VpcConfiguration?: array{VpcId?: string, ...},
 *     PublicAccessBlockConfiguration?: array{
 *         BlockPublicAcls?: bool,
 *         IgnorePublicAcls?: bool,
 *         BlockPublicPolicy?: bool,
 *         RestrictPublicBuckets?: bool,
 *         ...,
 *     },
 *     BucketAccountId?: string,
 *     Scope?: array{
 *         Prefixes?: list<string>,
 *         Permissions?: list<'AbortMultipartUpload'|'DeleteObject'|'GetObject'|'GetObjectAttributes'|'ListBucket'|'ListBucketMultipartUploads'|'ListMultipartUploadParts'|'PutObject'>,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessPointAsync(array{
 *     AccountId?: string,
 *     Name?: string,
 *     Bucket?: string,
 *     VpcConfiguration?: array{VpcId?: string, ...},
 *     PublicAccessBlockConfiguration?: array{
 *         BlockPublicAcls?: bool,
 *         IgnorePublicAcls?: bool,
 *         BlockPublicPolicy?: bool,
 *         RestrictPublicBuckets?: bool,
 *         ...,
 *     },
 *     BucketAccountId?: string,
 *     Scope?: array{
 *         Prefixes?: list<string>,
 *         Permissions?: list<'AbortMultipartUpload'|'DeleteObject'|'GetObject'|'GetObjectAttributes'|'ListBucket'|'ListBucketMultipartUploads'|'ListMultipartUploadParts'|'PutObject'>,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessPointForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result createAccessPointForObjectLambda(array{
 *     AccountId?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         SupportingAccessPoint?: string,
 *         CloudWatchMetricsEnabled?: bool,
 *         AllowedFeatures?: list<'GetObject-PartNumber'|'GetObject-Range'|'HeadObject-PartNumber'|'HeadObject-Range'>,
 *         TransformationConfigurations?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessPointForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessPointForObjectLambdaAsync(array{
 *     AccountId?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         SupportingAccessPoint?: string,
 *         CloudWatchMetricsEnabled?: bool,
 *         AllowedFeatures?: list<'GetObject-PartNumber'|'GetObject-Range'|'HeadObject-PartNumber'|'HeadObject-Range'>,
 *         TransformationConfigurations?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBucket(array $args = [])
 * @phpstan-method \Aws\Result createBucket(array{
 *     ACL?: 'authenticated-read'|'private'|'public-read'|'public-read-write',
 *     Bucket?: string,
 *     CreateBucketConfiguration?: array{
 *         LocationConstraint?: 'EU'|'ap-northeast-1'|'ap-south-1'|'ap-southeast-1'|'ap-southeast-2'|'cn-north-1'|'eu-central-1'|'eu-west-1'|'sa-east-1'|'us-west-1'|'us-west-2',
 *         ...,
 *     },
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWrite?: string,
 *     GrantWriteACP?: string,
 *     ObjectLockEnabledForBucket?: bool,
 *     OutpostId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBucketAsync(array{
 *     ACL?: 'authenticated-read'|'private'|'public-read'|'public-read-write',
 *     Bucket?: string,
 *     CreateBucketConfiguration?: array{
 *         LocationConstraint?: 'EU'|'ap-northeast-1'|'ap-south-1'|'ap-southeast-1'|'ap-southeast-2'|'cn-north-1'|'eu-central-1'|'eu-west-1'|'sa-east-1'|'us-west-1'|'us-west-2',
 *         ...,
 *     },
 *     GrantFullControl?: string,
 *     GrantRead?: string,
 *     GrantReadACP?: string,
 *     GrantWrite?: string,
 *     GrantWriteACP?: string,
 *     ObjectLockEnabledForBucket?: bool,
 *     OutpostId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     AccountId?: string,
 *     ConfirmationRequired?: bool,
 *     Operation?: array{
 *         LambdaInvoke?: array{FunctionArn?: string, InvocationSchemaVersion?: string, UserArguments?: array<string, string>, ...},
 *         S3PutObjectCopy?: array{
 *             TargetResource?: string,
 *             CannedAccessControlList?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *             AccessControlGrants?: list<array>,
 *             MetadataDirective?: 'COPY'|'REPLACE',
 *             ModifiedSinceConstraint?: int|string|\DateTimeInterface,
 *             NewObjectMetadata?: array,
 *             NewObjectTagging?: list<array>,
 *             RedirectLocation?: string,
 *             RequesterPays?: bool,
 *             StorageClass?: 'DEEP_ARCHIVE'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'STANDARD'|'STANDARD_IA',
 *             UnModifiedSinceConstraint?: int|string|\DateTimeInterface,
 *             SSEAwsKmsKeyId?: string,
 *             TargetKeyPrefix?: string,
 *             ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *             ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *             ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *             BucketKeyEnabled?: bool,
 *             ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *             ...,
 *         },
 *         S3PutObjectAcl?: array{AccessControlPolicy?: array, ...},
 *         S3PutObjectTagging?: array{TagSet?: list<array>, ...},
 *         S3DeleteObjectTagging?: array,
 *         S3InitiateRestoreObject?: array{ExpirationInDays?: int, GlacierJobTier?: 'BULK'|'STANDARD', ...},
 *         S3PutObjectLegalHold?: array{LegalHold?: array, ...},
 *         S3PutObjectRetention?: array{BypassGovernanceRetention?: bool, Retention?: array, ...},
 *         S3ReplicateObject?: array,
 *         S3ComputeObjectChecksum?: array{
 *             ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *             ChecksumType?: 'COMPOSITE'|'FULL_OBJECT',
 *             ...,
 *         },
 *         S3UpdateObjectEncryption?: array{ObjectEncryption?: array, ...},
 *         ...,
 *     },
 *     Report?: array{
 *         Bucket?: string,
 *         Format?: 'Report_CSV_20180820',
 *         Enabled?: bool,
 *         Prefix?: string,
 *         ReportScope?: 'AllTasks'|'FailedTasksOnly',
 *         ExpectedBucketOwner?: string,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Manifest?: array{
 *         Spec?: array{
 *             Format?: 'S3BatchOperations_CSV_20180820'|'S3InventoryReport_CSV_20161130',
 *             Fields?: list<'Bucket'|'Ignore'|'Key'|'VersionId'>,
 *             ...,
 *         },
 *         Location?: array{ObjectArn?: string, ObjectVersionId?: string, ETag?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     Priority?: int,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ManifestGenerator?: array{
 *         S3JobManifestGenerator?: array{
 *             ExpectedBucketOwner?: string,
 *             SourceBucket?: string,
 *             ManifestOutputLocation?: array,
 *             Filter?: array,
 *             EnableManifestOutput?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     AccountId?: string,
 *     ConfirmationRequired?: bool,
 *     Operation?: array{
 *         LambdaInvoke?: array{FunctionArn?: string, InvocationSchemaVersion?: string, UserArguments?: array<string, string>, ...},
 *         S3PutObjectCopy?: array{
 *             TargetResource?: string,
 *             CannedAccessControlList?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *             AccessControlGrants?: list<array>,
 *             MetadataDirective?: 'COPY'|'REPLACE',
 *             ModifiedSinceConstraint?: int|string|\DateTimeInterface,
 *             NewObjectMetadata?: array,
 *             NewObjectTagging?: list<array>,
 *             RedirectLocation?: string,
 *             RequesterPays?: bool,
 *             StorageClass?: 'DEEP_ARCHIVE'|'GLACIER'|'GLACIER_IR'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'STANDARD'|'STANDARD_IA',
 *             UnModifiedSinceConstraint?: int|string|\DateTimeInterface,
 *             SSEAwsKmsKeyId?: string,
 *             TargetKeyPrefix?: string,
 *             ObjectLockLegalHoldStatus?: 'OFF'|'ON',
 *             ObjectLockMode?: 'COMPLIANCE'|'GOVERNANCE',
 *             ObjectLockRetainUntilDate?: int|string|\DateTimeInterface,
 *             BucketKeyEnabled?: bool,
 *             ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *             ...,
 *         },
 *         S3PutObjectAcl?: array{AccessControlPolicy?: array, ...},
 *         S3PutObjectTagging?: array{TagSet?: list<array>, ...},
 *         S3DeleteObjectTagging?: array,
 *         S3InitiateRestoreObject?: array{ExpirationInDays?: int, GlacierJobTier?: 'BULK'|'STANDARD', ...},
 *         S3PutObjectLegalHold?: array{LegalHold?: array, ...},
 *         S3PutObjectRetention?: array{BypassGovernanceRetention?: bool, Retention?: array, ...},
 *         S3ReplicateObject?: array,
 *         S3ComputeObjectChecksum?: array{
 *             ChecksumAlgorithm?: 'CRC32'|'CRC32C'|'CRC64NVME'|'MD5'|'SHA1'|'SHA256'|'SHA512'|'XXHASH128'|'XXHASH3'|'XXHASH64',
 *             ChecksumType?: 'COMPOSITE'|'FULL_OBJECT',
 *             ...,
 *         },
 *         S3UpdateObjectEncryption?: array{ObjectEncryption?: array, ...},
 *         ...,
 *     },
 *     Report?: array{
 *         Bucket?: string,
 *         Format?: 'Report_CSV_20180820',
 *         Enabled?: bool,
 *         Prefix?: string,
 *         ReportScope?: 'AllTasks'|'FailedTasksOnly',
 *         ExpectedBucketOwner?: string,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Manifest?: array{
 *         Spec?: array{
 *             Format?: 'S3BatchOperations_CSV_20180820'|'S3InventoryReport_CSV_20161130',
 *             Fields?: list<'Bucket'|'Ignore'|'Key'|'VersionId'>,
 *             ...,
 *         },
 *         Location?: array{ObjectArn?: string, ObjectVersionId?: string, ETag?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     Priority?: int,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ManifestGenerator?: array{
 *         S3JobManifestGenerator?: array{
 *             ExpectedBucketOwner?: string,
 *             SourceBucket?: string,
 *             ManifestOutputLocation?: array,
 *             Filter?: array,
 *             EnableManifestOutput?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMultiRegionAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result createMultiRegionAccessPoint(array{
 *     AccountId?: string,
 *     ClientToken?: string,
 *     Details?: array{
 *         Name?: string,
 *         PublicAccessBlock?: array{
 *             BlockPublicAcls?: bool,
 *             IgnorePublicAcls?: bool,
 *             BlockPublicPolicy?: bool,
 *             RestrictPublicBuckets?: bool,
 *             ...,
 *         },
 *         Regions?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMultiRegionAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMultiRegionAccessPointAsync(array{
 *     AccountId?: string,
 *     ClientToken?: string,
 *     Details?: array{
 *         Name?: string,
 *         PublicAccessBlock?: array{
 *             BlockPublicAcls?: bool,
 *             IgnorePublicAcls?: bool,
 *             BlockPublicPolicy?: bool,
 *             RestrictPublicBuckets?: bool,
 *             ...,
 *         },
 *         Regions?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStorageLensGroup(array $args = [])
 * @phpstan-method \Aws\Result createStorageLensGroup(array{
 *     AccountId?: string,
 *     StorageLensGroup?: array{
 *         Name?: string,
 *         Filter?: array{
 *             MatchAnyPrefix?: list<string>,
 *             MatchAnySuffix?: list<string>,
 *             MatchAnyTag?: list<array>,
 *             MatchObjectAge?: array,
 *             MatchObjectSize?: array,
 *             And?: array,
 *             Or?: array,
 *             ...,
 *         },
 *         StorageLensGroupArn?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStorageLensGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStorageLensGroupAsync(array{
 *     AccountId?: string,
 *     StorageLensGroup?: array{
 *         Name?: string,
 *         Filter?: array{
 *             MatchAnyPrefix?: list<string>,
 *             MatchAnySuffix?: list<string>,
 *             MatchAnyTag?: list<array>,
 *             MatchObjectAge?: array,
 *             MatchObjectSize?: array,
 *             And?: array,
 *             Or?: array,
 *             ...,
 *         },
 *         StorageLensGroupArn?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessGrant(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessGrant(array{AccountId?: string, AccessGrantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessGrantAsync(array{AccountId?: string, AccessGrantId?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessGrantsInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessGrantsInstance(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessGrantsInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessGrantsInstanceAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessGrantsInstanceResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessGrantsInstanceResourcePolicy(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessGrantsInstanceResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessGrantsInstanceResourcePolicyAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessGrantsLocation(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessGrantsLocation(array{AccountId?: string, AccessGrantsLocationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessGrantsLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessGrantsLocationAsync(array{AccountId?: string, AccessGrantsLocationId?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPoint(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPointAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessPointForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPointForObjectLambda(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessPointForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPointForObjectLambdaAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessPointPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPointPolicy(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessPointPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPointPolicyAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessPointPolicyForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPointPolicyForObjectLambda(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessPointPolicyForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPointPolicyForObjectLambdaAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessPointScope(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPointScope(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessPointScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPointScopeAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteBucket(array $args = [])
 * @phpstan-method \Aws\Result deleteBucket(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketLifecycleConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketLifecycleConfiguration(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketLifecycleConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketLifecycleConfigurationAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketPolicy(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketPolicyAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketReplication(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketReplicationAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result deleteBucketTagging(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketTagging(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketTaggingAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result deleteJobTagging(array $args = [])
 * @phpstan-method \Aws\Result deleteJobTagging(array{AccountId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobTaggingAsync(array{AccountId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result deleteMultiRegionAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result deleteMultiRegionAccessPoint(array{AccountId?: string, ClientToken?: string, Details?: array{Name?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMultiRegionAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMultiRegionAccessPointAsync(array{AccountId?: string, ClientToken?: string, Details?: array{Name?: string, ...}, ...} $args = [])
 * @method \Aws\Result deletePublicAccessBlock(array $args = [])
 * @phpstan-method \Aws\Result deletePublicAccessBlock(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePublicAccessBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePublicAccessBlockAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteStorageLensConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteStorageLensConfiguration(array{ConfigId?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStorageLensConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStorageLensConfigurationAsync(array{ConfigId?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteStorageLensConfigurationTagging(array $args = [])
 * @phpstan-method \Aws\Result deleteStorageLensConfigurationTagging(array{ConfigId?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStorageLensConfigurationTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStorageLensConfigurationTaggingAsync(array{ConfigId?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteStorageLensGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteStorageLensGroup(array{Name?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStorageLensGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStorageLensGroupAsync(array{Name?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeJob(array $args = [])
 * @phpstan-method \Aws\Result describeJob(array{AccountId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobAsync(array{AccountId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result describeMultiRegionAccessPointOperation(array $args = [])
 * @phpstan-method \Aws\Result describeMultiRegionAccessPointOperation(array{AccountId?: string, RequestTokenARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMultiRegionAccessPointOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMultiRegionAccessPointOperationAsync(array{AccountId?: string, RequestTokenARN?: string, ...} $args = [])
 * @method \Aws\Result dissociateAccessGrantsIdentityCenter(array $args = [])
 * @phpstan-method \Aws\Result dissociateAccessGrantsIdentityCenter(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise dissociateAccessGrantsIdentityCenterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise dissociateAccessGrantsIdentityCenterAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getAccessGrant(array $args = [])
 * @phpstan-method \Aws\Result getAccessGrant(array{AccountId?: string, AccessGrantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessGrantAsync(array{AccountId?: string, AccessGrantId?: string, ...} $args = [])
 * @method \Aws\Result getAccessGrantsInstance(array $args = [])
 * @phpstan-method \Aws\Result getAccessGrantsInstance(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessGrantsInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessGrantsInstanceAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getAccessGrantsInstanceForPrefix(array $args = [])
 * @phpstan-method \Aws\Result getAccessGrantsInstanceForPrefix(array{AccountId?: string, S3Prefix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessGrantsInstanceForPrefixAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessGrantsInstanceForPrefixAsync(array{AccountId?: string, S3Prefix?: string, ...} $args = [])
 * @method \Aws\Result getAccessGrantsInstanceResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getAccessGrantsInstanceResourcePolicy(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessGrantsInstanceResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessGrantsInstanceResourcePolicyAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getAccessGrantsLocation(array $args = [])
 * @phpstan-method \Aws\Result getAccessGrantsLocation(array{AccountId?: string, AccessGrantsLocationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessGrantsLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessGrantsLocationAsync(array{AccountId?: string, AccessGrantsLocationId?: string, ...} $args = [])
 * @method \Aws\Result getAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result getAccessPoint(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getAccessPointConfigurationForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result getAccessPointConfigurationForObjectLambda(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPointConfigurationForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointConfigurationForObjectLambdaAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getAccessPointForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result getAccessPointForObjectLambda(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPointForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointForObjectLambdaAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getAccessPointPolicy(array $args = [])
 * @phpstan-method \Aws\Result getAccessPointPolicy(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPointPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointPolicyAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getAccessPointPolicyForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result getAccessPointPolicyForObjectLambda(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPointPolicyForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointPolicyForObjectLambdaAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getAccessPointPolicyStatus(array $args = [])
 * @phpstan-method \Aws\Result getAccessPointPolicyStatus(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPointPolicyStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointPolicyStatusAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getAccessPointPolicyStatusForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result getAccessPointPolicyStatusForObjectLambda(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPointPolicyStatusForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointPolicyStatusForObjectLambdaAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getAccessPointScope(array $args = [])
 * @phpstan-method \Aws\Result getAccessPointScope(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPointScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointScopeAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getBucket(array $args = [])
 * @phpstan-method \Aws\Result getBucket(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result getBucketLifecycleConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBucketLifecycleConfiguration(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketLifecycleConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketLifecycleConfigurationAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result getBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result getBucketPolicy(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketPolicyAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result getBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result getBucketReplication(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketReplicationAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result getBucketTagging(array $args = [])
 * @phpstan-method \Aws\Result getBucketTagging(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketTaggingAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result getBucketVersioning(array $args = [])
 * @phpstan-method \Aws\Result getBucketVersioning(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketVersioningAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketVersioningAsync(array{AccountId?: string, Bucket?: string, ...} $args = [])
 * @method \Aws\Result getDataAccess(array $args = [])
 * @phpstan-method \Aws\Result getDataAccess(array{
 *     AccountId?: string,
 *     Target?: string,
 *     Permission?: 'READ'|'READWRITE'|'WRITE',
 *     DurationSeconds?: int,
 *     Privilege?: 'Default'|'Minimal',
 *     TargetType?: 'Object',
 *     AuditContext?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataAccessAsync(array{
 *     AccountId?: string,
 *     Target?: string,
 *     Permission?: 'READ'|'READWRITE'|'WRITE',
 *     DurationSeconds?: int,
 *     Privilege?: 'Default'|'Minimal',
 *     TargetType?: 'Object',
 *     AuditContext?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getJobTagging(array $args = [])
 * @phpstan-method \Aws\Result getJobTagging(array{AccountId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobTaggingAsync(array{AccountId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result getMultiRegionAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result getMultiRegionAccessPoint(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMultiRegionAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMultiRegionAccessPointAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getMultiRegionAccessPointPolicy(array $args = [])
 * @phpstan-method \Aws\Result getMultiRegionAccessPointPolicy(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMultiRegionAccessPointPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMultiRegionAccessPointPolicyAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getMultiRegionAccessPointPolicyStatus(array $args = [])
 * @phpstan-method \Aws\Result getMultiRegionAccessPointPolicyStatus(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMultiRegionAccessPointPolicyStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMultiRegionAccessPointPolicyStatusAsync(array{AccountId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getMultiRegionAccessPointRoutes(array $args = [])
 * @phpstan-method \Aws\Result getMultiRegionAccessPointRoutes(array{AccountId?: string, Mrap?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMultiRegionAccessPointRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMultiRegionAccessPointRoutesAsync(array{AccountId?: string, Mrap?: string, ...} $args = [])
 * @method \Aws\Result getPublicAccessBlock(array $args = [])
 * @phpstan-method \Aws\Result getPublicAccessBlock(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPublicAccessBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPublicAccessBlockAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getStorageLensConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getStorageLensConfiguration(array{ConfigId?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStorageLensConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStorageLensConfigurationAsync(array{ConfigId?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result getStorageLensConfigurationTagging(array $args = [])
 * @phpstan-method \Aws\Result getStorageLensConfigurationTagging(array{ConfigId?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStorageLensConfigurationTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStorageLensConfigurationTaggingAsync(array{ConfigId?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result getStorageLensGroup(array $args = [])
 * @phpstan-method \Aws\Result getStorageLensGroup(array{Name?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStorageLensGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStorageLensGroupAsync(array{Name?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result listAccessGrants(array $args = [])
 * @phpstan-method \Aws\Result listAccessGrants(array{
 *     AccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     GranteeType?: 'DIRECTORY_GROUP'|'DIRECTORY_USER'|'IAM',
 *     GranteeIdentifier?: string,
 *     Permission?: 'READ'|'READWRITE'|'WRITE',
 *     GrantScope?: string,
 *     ApplicationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessGrantsAsync(array{
 *     AccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     GranteeType?: 'DIRECTORY_GROUP'|'DIRECTORY_USER'|'IAM',
 *     GranteeIdentifier?: string,
 *     Permission?: 'READ'|'READWRITE'|'WRITE',
 *     GrantScope?: string,
 *     ApplicationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccessGrantsInstances(array $args = [])
 * @phpstan-method \Aws\Result listAccessGrantsInstances(array{AccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessGrantsInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessGrantsInstancesAsync(array{AccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAccessGrantsLocations(array $args = [])
 * @phpstan-method \Aws\Result listAccessGrantsLocations(array{AccountId?: string, NextToken?: string, MaxResults?: int, LocationScope?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessGrantsLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessGrantsLocationsAsync(array{AccountId?: string, NextToken?: string, MaxResults?: int, LocationScope?: string, ...} $args = [])
 * @method \Aws\Result listAccessPoints(array $args = [])
 * @phpstan-method \Aws\Result listAccessPoints(array{
 *     AccountId?: string,
 *     Bucket?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DataSourceId?: string,
 *     DataSourceType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPointsAsync(array{
 *     AccountId?: string,
 *     Bucket?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DataSourceId?: string,
 *     DataSourceType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccessPointsForDirectoryBuckets(array $args = [])
 * @phpstan-method \Aws\Result listAccessPointsForDirectoryBuckets(array{AccountId?: string, DirectoryBucket?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPointsForDirectoryBucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPointsForDirectoryBucketsAsync(array{AccountId?: string, DirectoryBucket?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAccessPointsForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result listAccessPointsForObjectLambda(array{AccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPointsForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPointsForObjectLambdaAsync(array{AccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listCallerAccessGrants(array $args = [])
 * @phpstan-method \Aws\Result listCallerAccessGrants(array{
 *     AccountId?: string,
 *     GrantScope?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AllowedByApplication?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCallerAccessGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCallerAccessGrantsAsync(array{
 *     AccountId?: string,
 *     GrantScope?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AllowedByApplication?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{
 *     AccountId?: string,
 *     JobStatuses?: list<'Active'|'Cancelled'|'Cancelling'|'Complete'|'Completing'|'Failed'|'Failing'|'New'|'Paused'|'Pausing'|'Preparing'|'Ready'|'Suspended'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{
 *     AccountId?: string,
 *     JobStatuses?: list<'Active'|'Cancelled'|'Cancelling'|'Complete'|'Completing'|'Failed'|'Failing'|'New'|'Paused'|'Pausing'|'Preparing'|'Ready'|'Suspended'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMultiRegionAccessPoints(array $args = [])
 * @phpstan-method \Aws\Result listMultiRegionAccessPoints(array{AccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultiRegionAccessPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMultiRegionAccessPointsAsync(array{AccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRegionalBuckets(array $args = [])
 * @phpstan-method \Aws\Result listRegionalBuckets(array{AccountId?: string, NextToken?: string, MaxResults?: int, OutpostId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegionalBucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegionalBucketsAsync(array{AccountId?: string, NextToken?: string, MaxResults?: int, OutpostId?: string, ...} $args = [])
 * @method \Aws\Result listStorageLensConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listStorageLensConfigurations(array{AccountId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStorageLensConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStorageLensConfigurationsAsync(array{AccountId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listStorageLensGroups(array $args = [])
 * @phpstan-method \Aws\Result listStorageLensGroups(array{AccountId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStorageLensGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStorageLensGroupsAsync(array{AccountId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{AccountId?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{AccountId?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putAccessGrantsInstanceResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putAccessGrantsInstanceResourcePolicy(array{AccountId?: string, Policy?: string, Organization?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccessGrantsInstanceResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccessGrantsInstanceResourcePolicyAsync(array{AccountId?: string, Policy?: string, Organization?: string, ...} $args = [])
 * @method \Aws\Result putAccessPointConfigurationForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result putAccessPointConfigurationForObjectLambda(array{
 *     AccountId?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         SupportingAccessPoint?: string,
 *         CloudWatchMetricsEnabled?: bool,
 *         AllowedFeatures?: list<'GetObject-PartNumber'|'GetObject-Range'|'HeadObject-PartNumber'|'HeadObject-Range'>,
 *         TransformationConfigurations?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccessPointConfigurationForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccessPointConfigurationForObjectLambdaAsync(array{
 *     AccountId?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         SupportingAccessPoint?: string,
 *         CloudWatchMetricsEnabled?: bool,
 *         AllowedFeatures?: list<'GetObject-PartNumber'|'GetObject-Range'|'HeadObject-PartNumber'|'HeadObject-Range'>,
 *         TransformationConfigurations?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAccessPointPolicy(array $args = [])
 * @phpstan-method \Aws\Result putAccessPointPolicy(array{AccountId?: string, Name?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccessPointPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccessPointPolicyAsync(array{AccountId?: string, Name?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result putAccessPointPolicyForObjectLambda(array $args = [])
 * @phpstan-method \Aws\Result putAccessPointPolicyForObjectLambda(array{AccountId?: string, Name?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccessPointPolicyForObjectLambdaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccessPointPolicyForObjectLambdaAsync(array{AccountId?: string, Name?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result putAccessPointScope(array $args = [])
 * @phpstan-method \Aws\Result putAccessPointScope(array{
 *     AccountId?: string,
 *     Name?: string,
 *     Scope?: array{
 *         Prefixes?: list<string>,
 *         Permissions?: list<'AbortMultipartUpload'|'DeleteObject'|'GetObject'|'GetObjectAttributes'|'ListBucket'|'ListBucketMultipartUploads'|'ListMultipartUploadParts'|'PutObject'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccessPointScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccessPointScopeAsync(array{
 *     AccountId?: string,
 *     Name?: string,
 *     Scope?: array{
 *         Prefixes?: list<string>,
 *         Permissions?: list<'AbortMultipartUpload'|'DeleteObject'|'GetObject'|'GetObjectAttributes'|'ListBucket'|'ListBucketMultipartUploads'|'ListMultipartUploadParts'|'PutObject'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketLifecycleConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBucketLifecycleConfiguration(array{AccountId?: string, Bucket?: string, LifecycleConfiguration?: array{Rules?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketLifecycleConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketLifecycleConfigurationAsync(array{AccountId?: string, Bucket?: string, LifecycleConfiguration?: array{Rules?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result putBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result putBucketPolicy(array{AccountId?: string, Bucket?: string, ConfirmRemoveSelfBucketAccess?: bool, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketPolicyAsync(array{AccountId?: string, Bucket?: string, ConfirmRemoveSelfBucketAccess?: bool, Policy?: string, ...} $args = [])
 * @method \Aws\Result putBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result putBucketReplication(array{
 *     AccountId?: string,
 *     Bucket?: string,
 *     ReplicationConfiguration?: array{Role?: string, Rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketReplicationAsync(array{
 *     AccountId?: string,
 *     Bucket?: string,
 *     ReplicationConfiguration?: array{Role?: string, Rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBucketTagging(array $args = [])
 * @phpstan-method \Aws\Result putBucketTagging(array{AccountId?: string, Bucket?: string, Tagging?: array{TagSet?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketTaggingAsync(array{AccountId?: string, Bucket?: string, Tagging?: array{TagSet?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result putBucketVersioning(array $args = [])
 * @phpstan-method \Aws\Result putBucketVersioning(array{
 *     AccountId?: string,
 *     Bucket?: string,
 *     MFA?: string,
 *     VersioningConfiguration?: array{MFADelete?: 'Disabled'|'Enabled', Status?: 'Enabled'|'Suspended', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBucketVersioningAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBucketVersioningAsync(array{
 *     AccountId?: string,
 *     Bucket?: string,
 *     MFA?: string,
 *     VersioningConfiguration?: array{MFADelete?: 'Disabled'|'Enabled', Status?: 'Enabled'|'Suspended', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putJobTagging(array $args = [])
 * @phpstan-method \Aws\Result putJobTagging(array{AccountId?: string, JobId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putJobTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putJobTaggingAsync(array{AccountId?: string, JobId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result putMultiRegionAccessPointPolicy(array $args = [])
 * @phpstan-method \Aws\Result putMultiRegionAccessPointPolicy(array{AccountId?: string, ClientToken?: string, Details?: array{Name?: string, Policy?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putMultiRegionAccessPointPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMultiRegionAccessPointPolicyAsync(array{AccountId?: string, ClientToken?: string, Details?: array{Name?: string, Policy?: string, ...}, ...} $args = [])
 * @method \Aws\Result putPublicAccessBlock(array $args = [])
 * @phpstan-method \Aws\Result putPublicAccessBlock(array{
 *     PublicAccessBlockConfiguration?: array{
 *         BlockPublicAcls?: bool,
 *         IgnorePublicAcls?: bool,
 *         BlockPublicPolicy?: bool,
 *         RestrictPublicBuckets?: bool,
 *         ...,
 *     },
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPublicAccessBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPublicAccessBlockAsync(array{
 *     PublicAccessBlockConfiguration?: array{
 *         BlockPublicAcls?: bool,
 *         IgnorePublicAcls?: bool,
 *         BlockPublicPolicy?: bool,
 *         RestrictPublicBuckets?: bool,
 *         ...,
 *     },
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putStorageLensConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putStorageLensConfiguration(array{
 *     ConfigId?: string,
 *     AccountId?: string,
 *     StorageLensConfiguration?: array{
 *         Id?: string,
 *         AccountLevel?: array{
 *             ActivityMetrics?: array,
 *             BucketLevel?: array,
 *             AdvancedCostOptimizationMetrics?: array,
 *             AdvancedDataProtectionMetrics?: array,
 *             DetailedStatusCodesMetrics?: array,
 *             AdvancedPerformanceMetrics?: array,
 *             StorageLensGroupLevel?: array,
 *             ...,
 *         },
 *         Include?: array{Buckets?: list<string>, Regions?: list<string>, ...},
 *         Exclude?: array{Buckets?: list<string>, Regions?: list<string>, ...},
 *         DataExport?: array{S3BucketDestination?: array, CloudWatchMetrics?: array, StorageLensTableDestination?: array, ...},
 *         ExpandedPrefixesDataExport?: array{S3BucketDestination?: array, StorageLensTableDestination?: array, ...},
 *         IsEnabled?: bool,
 *         AwsOrg?: array{Arn?: string, ...},
 *         StorageLensArn?: string,
 *         PrefixDelimiter?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putStorageLensConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putStorageLensConfigurationAsync(array{
 *     ConfigId?: string,
 *     AccountId?: string,
 *     StorageLensConfiguration?: array{
 *         Id?: string,
 *         AccountLevel?: array{
 *             ActivityMetrics?: array,
 *             BucketLevel?: array,
 *             AdvancedCostOptimizationMetrics?: array,
 *             AdvancedDataProtectionMetrics?: array,
 *             DetailedStatusCodesMetrics?: array,
 *             AdvancedPerformanceMetrics?: array,
 *             StorageLensGroupLevel?: array,
 *             ...,
 *         },
 *         Include?: array{Buckets?: list<string>, Regions?: list<string>, ...},
 *         Exclude?: array{Buckets?: list<string>, Regions?: list<string>, ...},
 *         DataExport?: array{S3BucketDestination?: array, CloudWatchMetrics?: array, StorageLensTableDestination?: array, ...},
 *         ExpandedPrefixesDataExport?: array{S3BucketDestination?: array, StorageLensTableDestination?: array, ...},
 *         IsEnabled?: bool,
 *         AwsOrg?: array{Arn?: string, ...},
 *         StorageLensArn?: string,
 *         PrefixDelimiter?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putStorageLensConfigurationTagging(array $args = [])
 * @phpstan-method \Aws\Result putStorageLensConfigurationTagging(array{ConfigId?: string, AccountId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putStorageLensConfigurationTaggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putStorageLensConfigurationTaggingAsync(array{ConfigId?: string, AccountId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result submitMultiRegionAccessPointRoutes(array $args = [])
 * @phpstan-method \Aws\Result submitMultiRegionAccessPointRoutes(array{
 *     AccountId?: string,
 *     Mrap?: string,
 *     RouteUpdates?: list<array{Bucket?: string, Region?: string, TrafficDialPercentage?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitMultiRegionAccessPointRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitMultiRegionAccessPointRoutesAsync(array{
 *     AccountId?: string,
 *     Mrap?: string,
 *     RouteUpdates?: list<array{Bucket?: string, Region?: string, TrafficDialPercentage?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{AccountId?: string, ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{AccountId?: string, ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{AccountId?: string, ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{AccountId?: string, ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccessGrantsLocation(array $args = [])
 * @phpstan-method \Aws\Result updateAccessGrantsLocation(array{AccountId?: string, AccessGrantsLocationId?: string, IAMRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessGrantsLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessGrantsLocationAsync(array{AccountId?: string, AccessGrantsLocationId?: string, IAMRoleArn?: string, ...} $args = [])
 * @method \Aws\Result updateJobPriority(array $args = [])
 * @phpstan-method \Aws\Result updateJobPriority(array{AccountId?: string, JobId?: string, Priority?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobPriorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobPriorityAsync(array{AccountId?: string, JobId?: string, Priority?: int, ...} $args = [])
 * @method \Aws\Result updateJobStatus(array $args = [])
 * @phpstan-method \Aws\Result updateJobStatus(array{
 *     AccountId?: string,
 *     JobId?: string,
 *     RequestedJobStatus?: 'Cancelled'|'Ready',
 *     StatusUpdateReason?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobStatusAsync(array{
 *     AccountId?: string,
 *     JobId?: string,
 *     RequestedJobStatus?: 'Cancelled'|'Ready',
 *     StatusUpdateReason?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStorageLensGroup(array $args = [])
 * @phpstan-method \Aws\Result updateStorageLensGroup(array{
 *     Name?: string,
 *     AccountId?: string,
 *     StorageLensGroup?: array{
 *         Name?: string,
 *         Filter?: array{
 *             MatchAnyPrefix?: list<string>,
 *             MatchAnySuffix?: list<string>,
 *             MatchAnyTag?: list<array>,
 *             MatchObjectAge?: array,
 *             MatchObjectSize?: array,
 *             And?: array,
 *             Or?: array,
 *             ...,
 *         },
 *         StorageLensGroupArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStorageLensGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStorageLensGroupAsync(array{
 *     Name?: string,
 *     AccountId?: string,
 *     StorageLensGroup?: array{
 *         Name?: string,
 *         Filter?: array{
 *             MatchAnyPrefix?: list<string>,
 *             MatchAnySuffix?: list<string>,
 *             MatchAnyTag?: list<array>,
 *             MatchObjectAge?: array,
 *             MatchObjectSize?: array,
 *             And?: array,
 *             Or?: array,
 *             ...,
 *         },
 *         StorageLensGroupArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class S3ControlClient extends AwsClient 
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        return $args + [
            'use_dual_stack_endpoint' => [
                'type' => 'config',
                'valid' => ['bool'],
                'doc' => 'Set to true to send requests to an S3 Control Dual Stack'
                    . ' endpoint by default, which enables IPv6 Protocol.'
                    . ' Can be enabled or disabled on individual operations by setting'
                    . ' \'@use_dual_stack_endpoint\' to true or false.',
                'default' => false,
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
        ];
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

    /**
     * {@inheritdoc}
     *
     * In addition to the options available to
     * {@see Aws\AwsClient::__construct}, S3ControlClient accepts the following
     * option:
     *
     * - use_dual_stack_endpoint: (bool) Set to true to send requests to an S3
     *   Control Dual Stack endpoint by default, which enables IPv6 Protocol.
     *   Can be enabled or disabled on individual operations by setting
     *   '@use_dual_stack_endpoint\' to true or false. Note:
     *   you cannot use it together with an accelerate endpoint.
     *
     * @param array $args
     */
    public function __construct(array $args)
    {
        parent::__construct($args);

        if ($this->isUseEndpointV2()) {
            $this->processEndpointV2Model();
        } else {
            $stack = $this->getHandlerList();
            $stack->appendBuild(
                EndpointArnMiddleware::wrap(
                    $this->getApi(),
                    $this->getRegion(),
                    [
                        'use_arn_region' => $this->getConfig('use_arn_region'),
                        'dual_stack' =>
                            $this->getConfig('use_dual_stack_endpoint')->isUseDualStackEndpoint(),
                        'endpoint' => isset($args['endpoint'])
                            ? $args['endpoint']
                            : null,
                        'use_fips_endpoint' => $this->getConfig('use_fips_endpoint'),
                    ],
                    $this->isUseEndpointV2()
                ),
                's3control.endpoint_arn_middleware'
            );
        }
    }

    /**
     * Modifies API definition to remove `AccountId`
     * host prefix.  This is now handled by the endpoint ruleset.
     *
     * @return void
     *
     * @internal
     */
    private function processEndpointV2Model()
    {
        $definition = $this->getApi()->getDefinition();
        $this->removeHostPrefix($definition);
        $this->removeRequiredMember($definition);
        $this->getApi()->setDefinition($definition);
    }

    private function removeHostPrefix(&$definition)
    {
        foreach($definition['operations'] as &$operation) {
            if (isset($operation['endpoint']['hostPrefix'])
                && $operation['endpoint']['hostPrefix'] === '{AccountId}.'
            ) {
                $operation['endpoint']['hostPrefix'] = str_replace(
                    '{AccountId}.',
                    '',
                    $operation['endpoint']['hostPrefix']
                );
            }
        }
    }

    private function removeRequiredMember(&$definition)
    {
        foreach($definition['shapes'] as &$shape) {
            if (isset($shape['required'])
            ) {
                $found = array_search('AccountId', $shape['required']);

                if ($found !== false) {
                    unset($shape['required'][$found]);
                }
            }
        }
    }
}
