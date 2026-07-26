<?php
namespace Aws\StorageGateway;

use Aws\AwsClient;

/**
 * AWS Storage Gateway client.
 *
 * @method \Aws\Result activateGateway(array $args = [])
 * @phpstan-method \Aws\Result activateGateway(array{
 *     ActivationKey?: string,
 *     GatewayName?: string,
 *     GatewayTimezone?: string,
 *     GatewayRegion?: string,
 *     GatewayType?: string,
 *     TapeDriveType?: string,
 *     MediumChangerType?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise activateGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateGatewayAsync(array{
 *     ActivationKey?: string,
 *     GatewayName?: string,
 *     GatewayTimezone?: string,
 *     GatewayRegion?: string,
 *     GatewayType?: string,
 *     TapeDriveType?: string,
 *     MediumChangerType?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addCache(array $args = [])
 * @phpstan-method \Aws\Result addCache(array{GatewayARN?: string, DiskIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addCacheAsync(array{GatewayARN?: string, DiskIds?: list<string>, ...} $args = [])
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addTagsToResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result addUploadBuffer(array $args = [])
 * @phpstan-method \Aws\Result addUploadBuffer(array{GatewayARN?: string, DiskIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addUploadBufferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addUploadBufferAsync(array{GatewayARN?: string, DiskIds?: list<string>, ...} $args = [])
 * @method \Aws\Result addWorkingStorage(array $args = [])
 * @phpstan-method \Aws\Result addWorkingStorage(array{GatewayARN?: string, DiskIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addWorkingStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addWorkingStorageAsync(array{GatewayARN?: string, DiskIds?: list<string>, ...} $args = [])
 * @method \Aws\Result assignTapePool(array $args = [])
 * @phpstan-method \Aws\Result assignTapePool(array{TapeARN?: string, PoolId?: string, BypassGovernanceRetention?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assignTapePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assignTapePoolAsync(array{TapeARN?: string, PoolId?: string, BypassGovernanceRetention?: bool, ...} $args = [])
 * @method \Aws\Result associateFileSystem(array $args = [])
 * @phpstan-method \Aws\Result associateFileSystem(array{
 *     UserName?: string,
 *     Password?: string,
 *     ClientToken?: string,
 *     GatewayARN?: string,
 *     LocationARN?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AuditDestinationARN?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     EndpointNetworkConfiguration?: array{IpAddresses?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFileSystemAsync(array{
 *     UserName?: string,
 *     Password?: string,
 *     ClientToken?: string,
 *     GatewayARN?: string,
 *     LocationARN?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AuditDestinationARN?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     EndpointNetworkConfiguration?: array{IpAddresses?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result attachVolume(array $args = [])
 * @phpstan-method \Aws\Result attachVolume(array{
 *     GatewayARN?: string,
 *     TargetName?: string,
 *     VolumeARN?: string,
 *     NetworkInterfaceId?: string,
 *     DiskId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachVolumeAsync(array{
 *     GatewayARN?: string,
 *     TargetName?: string,
 *     VolumeARN?: string,
 *     NetworkInterfaceId?: string,
 *     DiskId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelArchival(array $args = [])
 * @phpstan-method \Aws\Result cancelArchival(array{GatewayARN?: string, TapeARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelArchivalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelArchivalAsync(array{GatewayARN?: string, TapeARN?: string, ...} $args = [])
 * @method \Aws\Result cancelCacheReport(array $args = [])
 * @phpstan-method \Aws\Result cancelCacheReport(array{CacheReportARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelCacheReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelCacheReportAsync(array{CacheReportARN?: string, ...} $args = [])
 * @method \Aws\Result cancelRetrieval(array $args = [])
 * @phpstan-method \Aws\Result cancelRetrieval(array{GatewayARN?: string, TapeARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelRetrievalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelRetrievalAsync(array{GatewayARN?: string, TapeARN?: string, ...} $args = [])
 * @method \Aws\Result createCachediSCSIVolume(array $args = [])
 * @phpstan-method \Aws\Result createCachediSCSIVolume(array{
 *     GatewayARN?: string,
 *     VolumeSizeInBytes?: int,
 *     SnapshotId?: string,
 *     TargetName?: string,
 *     SourceVolumeARN?: string,
 *     NetworkInterfaceId?: string,
 *     ClientToken?: string,
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCachediSCSIVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCachediSCSIVolumeAsync(array{
 *     GatewayARN?: string,
 *     VolumeSizeInBytes?: int,
 *     SnapshotId?: string,
 *     TargetName?: string,
 *     SourceVolumeARN?: string,
 *     NetworkInterfaceId?: string,
 *     ClientToken?: string,
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNFSFileShare(array $args = [])
 * @phpstan-method \Aws\Result createNFSFileShare(array{
 *     ClientToken?: string,
 *     NFSFileShareDefaults?: array{FileMode?: string, DirectoryMode?: string, GroupId?: int, OwnerId?: int, ...},
 *     GatewayARN?: string,
 *     EncryptionType?: 'DsseKms'|'SseKms'|'SseS3',
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     Role?: string,
 *     LocationARN?: string,
 *     DefaultStorageClass?: string,
 *     ObjectACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     ClientList?: list<string>,
 *     Squash?: string,
 *     ReadOnly?: bool,
 *     GuessMIMETypeEnabled?: bool,
 *     RequesterPays?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FileShareName?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     NotificationPolicy?: string,
 *     VPCEndpointDNSName?: string,
 *     BucketRegion?: string,
 *     AuditDestinationARN?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNFSFileShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNFSFileShareAsync(array{
 *     ClientToken?: string,
 *     NFSFileShareDefaults?: array{FileMode?: string, DirectoryMode?: string, GroupId?: int, OwnerId?: int, ...},
 *     GatewayARN?: string,
 *     EncryptionType?: 'DsseKms'|'SseKms'|'SseS3',
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     Role?: string,
 *     LocationARN?: string,
 *     DefaultStorageClass?: string,
 *     ObjectACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     ClientList?: list<string>,
 *     Squash?: string,
 *     ReadOnly?: bool,
 *     GuessMIMETypeEnabled?: bool,
 *     RequesterPays?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FileShareName?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     NotificationPolicy?: string,
 *     VPCEndpointDNSName?: string,
 *     BucketRegion?: string,
 *     AuditDestinationARN?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSMBFileShare(array $args = [])
 * @phpstan-method \Aws\Result createSMBFileShare(array{
 *     ClientToken?: string,
 *     GatewayARN?: string,
 *     EncryptionType?: 'DsseKms'|'SseKms'|'SseS3',
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     Role?: string,
 *     LocationARN?: string,
 *     DefaultStorageClass?: string,
 *     ObjectACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     ReadOnly?: bool,
 *     GuessMIMETypeEnabled?: bool,
 *     RequesterPays?: bool,
 *     SMBACLEnabled?: bool,
 *     AccessBasedEnumeration?: bool,
 *     AdminUserList?: list<string>,
 *     ValidUserList?: list<string>,
 *     InvalidUserList?: list<string>,
 *     AuditDestinationARN?: string,
 *     Authentication?: string,
 *     CaseSensitivity?: 'CaseSensitive'|'ClientSpecified',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FileShareName?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     NotificationPolicy?: string,
 *     VPCEndpointDNSName?: string,
 *     BucketRegion?: string,
 *     OplocksEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSMBFileShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSMBFileShareAsync(array{
 *     ClientToken?: string,
 *     GatewayARN?: string,
 *     EncryptionType?: 'DsseKms'|'SseKms'|'SseS3',
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     Role?: string,
 *     LocationARN?: string,
 *     DefaultStorageClass?: string,
 *     ObjectACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     ReadOnly?: bool,
 *     GuessMIMETypeEnabled?: bool,
 *     RequesterPays?: bool,
 *     SMBACLEnabled?: bool,
 *     AccessBasedEnumeration?: bool,
 *     AdminUserList?: list<string>,
 *     ValidUserList?: list<string>,
 *     InvalidUserList?: list<string>,
 *     AuditDestinationARN?: string,
 *     Authentication?: string,
 *     CaseSensitivity?: 'CaseSensitive'|'ClientSpecified',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FileShareName?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     NotificationPolicy?: string,
 *     VPCEndpointDNSName?: string,
 *     BucketRegion?: string,
 *     OplocksEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createSnapshot(array{
 *     VolumeARN?: string,
 *     SnapshotDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotAsync(array{
 *     VolumeARN?: string,
 *     SnapshotDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshotFromVolumeRecoveryPoint(array $args = [])
 * @phpstan-method \Aws\Result createSnapshotFromVolumeRecoveryPoint(array{
 *     VolumeARN?: string,
 *     SnapshotDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotFromVolumeRecoveryPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotFromVolumeRecoveryPointAsync(array{
 *     VolumeARN?: string,
 *     SnapshotDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStorediSCSIVolume(array $args = [])
 * @phpstan-method \Aws\Result createStorediSCSIVolume(array{
 *     GatewayARN?: string,
 *     DiskId?: string,
 *     SnapshotId?: string,
 *     PreserveExistingData?: bool,
 *     TargetName?: string,
 *     NetworkInterfaceId?: string,
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStorediSCSIVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStorediSCSIVolumeAsync(array{
 *     GatewayARN?: string,
 *     DiskId?: string,
 *     SnapshotId?: string,
 *     PreserveExistingData?: bool,
 *     TargetName?: string,
 *     NetworkInterfaceId?: string,
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTapePool(array $args = [])
 * @phpstan-method \Aws\Result createTapePool(array{
 *     PoolName?: string,
 *     StorageClass?: 'DEEP_ARCHIVE'|'GLACIER',
 *     RetentionLockType?: 'COMPLIANCE'|'GOVERNANCE'|'NONE',
 *     RetentionLockTimeInDays?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTapePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTapePoolAsync(array{
 *     PoolName?: string,
 *     StorageClass?: 'DEEP_ARCHIVE'|'GLACIER',
 *     RetentionLockType?: 'COMPLIANCE'|'GOVERNANCE'|'NONE',
 *     RetentionLockTimeInDays?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTapeWithBarcode(array $args = [])
 * @phpstan-method \Aws\Result createTapeWithBarcode(array{
 *     GatewayARN?: string,
 *     TapeSizeInBytes?: int,
 *     TapeBarcode?: string,
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     PoolId?: string,
 *     Worm?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTapeWithBarcodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTapeWithBarcodeAsync(array{
 *     GatewayARN?: string,
 *     TapeSizeInBytes?: int,
 *     TapeBarcode?: string,
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     PoolId?: string,
 *     Worm?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTapes(array $args = [])
 * @phpstan-method \Aws\Result createTapes(array{
 *     GatewayARN?: string,
 *     TapeSizeInBytes?: int,
 *     ClientToken?: string,
 *     NumTapesToCreate?: int,
 *     TapeBarcodePrefix?: string,
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     PoolId?: string,
 *     Worm?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTapesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTapesAsync(array{
 *     GatewayARN?: string,
 *     TapeSizeInBytes?: int,
 *     ClientToken?: string,
 *     NumTapesToCreate?: int,
 *     TapeBarcodePrefix?: string,
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     PoolId?: string,
 *     Worm?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAutomaticTapeCreationPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAutomaticTapeCreationPolicy(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutomaticTapeCreationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutomaticTapeCreationPolicyAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result deleteBandwidthRateLimit(array $args = [])
 * @phpstan-method \Aws\Result deleteBandwidthRateLimit(array{GatewayARN?: string, BandwidthType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBandwidthRateLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBandwidthRateLimitAsync(array{GatewayARN?: string, BandwidthType?: string, ...} $args = [])
 * @method \Aws\Result deleteCacheReport(array $args = [])
 * @phpstan-method \Aws\Result deleteCacheReport(array{CacheReportARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCacheReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCacheReportAsync(array{CacheReportARN?: string, ...} $args = [])
 * @method \Aws\Result deleteChapCredentials(array $args = [])
 * @phpstan-method \Aws\Result deleteChapCredentials(array{TargetARN?: string, InitiatorName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChapCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChapCredentialsAsync(array{TargetARN?: string, InitiatorName?: string, ...} $args = [])
 * @method \Aws\Result deleteFileShare(array $args = [])
 * @phpstan-method \Aws\Result deleteFileShare(array{FileShareARN?: string, ForceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFileShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFileShareAsync(array{FileShareARN?: string, ForceDelete?: bool, ...} $args = [])
 * @method \Aws\Result deleteGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteGateway(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result deleteSnapshotSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshotSchedule(array{VolumeARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotScheduleAsync(array{VolumeARN?: string, ...} $args = [])
 * @method \Aws\Result deleteTape(array $args = [])
 * @phpstan-method \Aws\Result deleteTape(array{GatewayARN?: string, TapeARN?: string, BypassGovernanceRetention?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTapeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTapeAsync(array{GatewayARN?: string, TapeARN?: string, BypassGovernanceRetention?: bool, ...} $args = [])
 * @method \Aws\Result deleteTapeArchive(array $args = [])
 * @phpstan-method \Aws\Result deleteTapeArchive(array{TapeARN?: string, BypassGovernanceRetention?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTapeArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTapeArchiveAsync(array{TapeARN?: string, BypassGovernanceRetention?: bool, ...} $args = [])
 * @method \Aws\Result deleteTapePool(array $args = [])
 * @phpstan-method \Aws\Result deleteTapePool(array{PoolARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTapePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTapePoolAsync(array{PoolARN?: string, ...} $args = [])
 * @method \Aws\Result deleteVolume(array $args = [])
 * @phpstan-method \Aws\Result deleteVolume(array{VolumeARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVolumeAsync(array{VolumeARN?: string, ...} $args = [])
 * @method \Aws\Result describeAvailabilityMonitorTest(array $args = [])
 * @phpstan-method \Aws\Result describeAvailabilityMonitorTest(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAvailabilityMonitorTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAvailabilityMonitorTestAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result describeBandwidthRateLimit(array $args = [])
 * @phpstan-method \Aws\Result describeBandwidthRateLimit(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBandwidthRateLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBandwidthRateLimitAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result describeBandwidthRateLimitSchedule(array $args = [])
 * @phpstan-method \Aws\Result describeBandwidthRateLimitSchedule(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBandwidthRateLimitScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBandwidthRateLimitScheduleAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result describeCache(array $args = [])
 * @phpstan-method \Aws\Result describeCache(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCacheAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result describeCacheReport(array $args = [])
 * @phpstan-method \Aws\Result describeCacheReport(array{CacheReportARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCacheReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCacheReportAsync(array{CacheReportARN?: string, ...} $args = [])
 * @method \Aws\Result describeCachediSCSIVolumes(array $args = [])
 * @phpstan-method \Aws\Result describeCachediSCSIVolumes(array{VolumeARNs?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCachediSCSIVolumesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCachediSCSIVolumesAsync(array{VolumeARNs?: list<string>, ...} $args = [])
 * @method \Aws\Result describeChapCredentials(array $args = [])
 * @phpstan-method \Aws\Result describeChapCredentials(array{TargetARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChapCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChapCredentialsAsync(array{TargetARN?: string, ...} $args = [])
 * @method \Aws\Result describeFileSystemAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeFileSystemAssociations(array{FileSystemAssociationARNList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFileSystemAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFileSystemAssociationsAsync(array{FileSystemAssociationARNList?: list<string>, ...} $args = [])
 * @method \Aws\Result describeGatewayInformation(array $args = [])
 * @phpstan-method \Aws\Result describeGatewayInformation(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGatewayInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGatewayInformationAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result describeMaintenanceStartTime(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceStartTime(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceStartTimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceStartTimeAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result describeNFSFileShares(array $args = [])
 * @phpstan-method \Aws\Result describeNFSFileShares(array{FileShareARNList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNFSFileSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNFSFileSharesAsync(array{FileShareARNList?: list<string>, ...} $args = [])
 * @method \Aws\Result describeSMBFileShares(array $args = [])
 * @phpstan-method \Aws\Result describeSMBFileShares(array{FileShareARNList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSMBFileSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSMBFileSharesAsync(array{FileShareARNList?: list<string>, ...} $args = [])
 * @method \Aws\Result describeSMBSettings(array $args = [])
 * @phpstan-method \Aws\Result describeSMBSettings(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSMBSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSMBSettingsAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result describeSnapshotSchedule(array $args = [])
 * @phpstan-method \Aws\Result describeSnapshotSchedule(array{VolumeARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSnapshotScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSnapshotScheduleAsync(array{VolumeARN?: string, ...} $args = [])
 * @method \Aws\Result describeStorediSCSIVolumes(array $args = [])
 * @phpstan-method \Aws\Result describeStorediSCSIVolumes(array{VolumeARNs?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStorediSCSIVolumesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStorediSCSIVolumesAsync(array{VolumeARNs?: list<string>, ...} $args = [])
 * @method \Aws\Result describeTapeArchives(array $args = [])
 * @phpstan-method \Aws\Result describeTapeArchives(array{TapeARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTapeArchivesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTapeArchivesAsync(array{TapeARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeTapeRecoveryPoints(array $args = [])
 * @phpstan-method \Aws\Result describeTapeRecoveryPoints(array{GatewayARN?: string, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTapeRecoveryPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTapeRecoveryPointsAsync(array{GatewayARN?: string, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeTapes(array $args = [])
 * @phpstan-method \Aws\Result describeTapes(array{GatewayARN?: string, TapeARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTapesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTapesAsync(array{GatewayARN?: string, TapeARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeUploadBuffer(array $args = [])
 * @phpstan-method \Aws\Result describeUploadBuffer(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUploadBufferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUploadBufferAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result describeVTLDevices(array $args = [])
 * @phpstan-method \Aws\Result describeVTLDevices(array{GatewayARN?: string, VTLDeviceARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVTLDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVTLDevicesAsync(array{GatewayARN?: string, VTLDeviceARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeWorkingStorage(array $args = [])
 * @phpstan-method \Aws\Result describeWorkingStorage(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkingStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkingStorageAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result detachVolume(array $args = [])
 * @phpstan-method \Aws\Result detachVolume(array{VolumeARN?: string, ForceDetach?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachVolumeAsync(array{VolumeARN?: string, ForceDetach?: bool, ...} $args = [])
 * @method \Aws\Result disableGateway(array $args = [])
 * @phpstan-method \Aws\Result disableGateway(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableGatewayAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result disassociateFileSystem(array $args = [])
 * @phpstan-method \Aws\Result disassociateFileSystem(array{FileSystemAssociationARN?: string, ForceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFileSystemAsync(array{FileSystemAssociationARN?: string, ForceDelete?: bool, ...} $args = [])
 * @method \Aws\Result evictFilesFailingUpload(array $args = [])
 * @phpstan-method \Aws\Result evictFilesFailingUpload(array{FileShareARN?: string, ForceRemove?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise evictFilesFailingUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise evictFilesFailingUploadAsync(array{FileShareARN?: string, ForceRemove?: bool, ...} $args = [])
 * @method \Aws\Result joinDomain(array $args = [])
 * @phpstan-method \Aws\Result joinDomain(array{
 *     GatewayARN?: string,
 *     DomainName?: string,
 *     OrganizationalUnit?: string,
 *     DomainControllers?: list<string>,
 *     TimeoutInSeconds?: int,
 *     UserName?: string,
 *     Password?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise joinDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise joinDomainAsync(array{
 *     GatewayARN?: string,
 *     DomainName?: string,
 *     OrganizationalUnit?: string,
 *     DomainControllers?: list<string>,
 *     TimeoutInSeconds?: int,
 *     UserName?: string,
 *     Password?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAutomaticTapeCreationPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAutomaticTapeCreationPolicies(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomaticTapeCreationPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomaticTapeCreationPoliciesAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result listCacheReports(array $args = [])
 * @phpstan-method \Aws\Result listCacheReports(array{Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCacheReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCacheReportsAsync(array{Marker?: string, ...} $args = [])
 * @method \Aws\Result listFileShares(array $args = [])
 * @phpstan-method \Aws\Result listFileShares(array{GatewayARN?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFileSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFileSharesAsync(array{GatewayARN?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result listFileSystemAssociations(array $args = [])
 * @phpstan-method \Aws\Result listFileSystemAssociations(array{GatewayARN?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFileSystemAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFileSystemAssociationsAsync(array{GatewayARN?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result listGateways(array $args = [])
 * @phpstan-method \Aws\Result listGateways(array{Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewaysAsync(array{Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listLocalDisks(array $args = [])
 * @phpstan-method \Aws\Result listLocalDisks(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLocalDisksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLocalDisksAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listTapePools(array $args = [])
 * @phpstan-method \Aws\Result listTapePools(array{PoolARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTapePoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTapePoolsAsync(array{PoolARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listTapes(array $args = [])
 * @phpstan-method \Aws\Result listTapes(array{TapeARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTapesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTapesAsync(array{TapeARNs?: list<string>, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listVolumeInitiators(array $args = [])
 * @phpstan-method \Aws\Result listVolumeInitiators(array{VolumeARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVolumeInitiatorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVolumeInitiatorsAsync(array{VolumeARN?: string, ...} $args = [])
 * @method \Aws\Result listVolumeRecoveryPoints(array $args = [])
 * @phpstan-method \Aws\Result listVolumeRecoveryPoints(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVolumeRecoveryPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVolumeRecoveryPointsAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result listVolumes(array $args = [])
 * @phpstan-method \Aws\Result listVolumes(array{GatewayARN?: string, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVolumesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVolumesAsync(array{GatewayARN?: string, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result notifyWhenUploaded(array $args = [])
 * @phpstan-method \Aws\Result notifyWhenUploaded(array{FileShareARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyWhenUploadedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyWhenUploadedAsync(array{FileShareARN?: string, ...} $args = [])
 * @method \Aws\Result refreshCache(array $args = [])
 * @phpstan-method \Aws\Result refreshCache(array{FileShareARN?: string, FolderList?: list<string>, Recursive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise refreshCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise refreshCacheAsync(array{FileShareARN?: string, FolderList?: list<string>, Recursive?: bool, ...} $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result resetCache(array $args = [])
 * @phpstan-method \Aws\Result resetCache(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetCacheAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result retrieveTapeArchive(array $args = [])
 * @phpstan-method \Aws\Result retrieveTapeArchive(array{TapeARN?: string, GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveTapeArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveTapeArchiveAsync(array{TapeARN?: string, GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result retrieveTapeRecoveryPoint(array $args = [])
 * @phpstan-method \Aws\Result retrieveTapeRecoveryPoint(array{TapeARN?: string, GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveTapeRecoveryPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveTapeRecoveryPointAsync(array{TapeARN?: string, GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result setLocalConsolePassword(array $args = [])
 * @phpstan-method \Aws\Result setLocalConsolePassword(array{GatewayARN?: string, LocalConsolePassword?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setLocalConsolePasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setLocalConsolePasswordAsync(array{GatewayARN?: string, LocalConsolePassword?: string, ...} $args = [])
 * @method \Aws\Result setSMBGuestPassword(array $args = [])
 * @phpstan-method \Aws\Result setSMBGuestPassword(array{GatewayARN?: string, Password?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setSMBGuestPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setSMBGuestPasswordAsync(array{GatewayARN?: string, Password?: string, ...} $args = [])
 * @method \Aws\Result shutdownGateway(array $args = [])
 * @phpstan-method \Aws\Result shutdownGateway(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise shutdownGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise shutdownGatewayAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result startAvailabilityMonitorTest(array $args = [])
 * @phpstan-method \Aws\Result startAvailabilityMonitorTest(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAvailabilityMonitorTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAvailabilityMonitorTestAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result startCacheReport(array $args = [])
 * @phpstan-method \Aws\Result startCacheReport(array{
 *     FileShareARN?: string,
 *     Role?: string,
 *     LocationARN?: string,
 *     BucketRegion?: string,
 *     VPCEndpointDNSName?: string,
 *     InclusionFilters?: list<array{Name?: 'UploadFailureReason'|'UploadState', Values?: list<string>, ...}>,
 *     ExclusionFilters?: list<array{Name?: 'UploadFailureReason'|'UploadState', Values?: list<string>, ...}>,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCacheReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCacheReportAsync(array{
 *     FileShareARN?: string,
 *     Role?: string,
 *     LocationARN?: string,
 *     BucketRegion?: string,
 *     VPCEndpointDNSName?: string,
 *     InclusionFilters?: list<array{Name?: 'UploadFailureReason'|'UploadState', Values?: list<string>, ...}>,
 *     ExclusionFilters?: list<array{Name?: 'UploadFailureReason'|'UploadState', Values?: list<string>, ...}>,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startGateway(array $args = [])
 * @phpstan-method \Aws\Result startGateway(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startGatewayAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result updateAutomaticTapeCreationPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateAutomaticTapeCreationPolicy(array{
 *     AutomaticTapeCreationRules?: list<array{
 *         TapeBarcodePrefix?: string,
 *         PoolId?: string,
 *         TapeSizeInBytes?: int,
 *         MinimumNumTapes?: int,
 *         Worm?: bool,
 *         ...,
 *     }>,
 *     GatewayARN?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutomaticTapeCreationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutomaticTapeCreationPolicyAsync(array{
 *     AutomaticTapeCreationRules?: list<array{
 *         TapeBarcodePrefix?: string,
 *         PoolId?: string,
 *         TapeSizeInBytes?: int,
 *         MinimumNumTapes?: int,
 *         Worm?: bool,
 *         ...,
 *     }>,
 *     GatewayARN?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBandwidthRateLimit(array $args = [])
 * @phpstan-method \Aws\Result updateBandwidthRateLimit(array{
 *     GatewayARN?: string,
 *     AverageUploadRateLimitInBitsPerSec?: int,
 *     AverageDownloadRateLimitInBitsPerSec?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBandwidthRateLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBandwidthRateLimitAsync(array{
 *     GatewayARN?: string,
 *     AverageUploadRateLimitInBitsPerSec?: int,
 *     AverageDownloadRateLimitInBitsPerSec?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBandwidthRateLimitSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateBandwidthRateLimitSchedule(array{
 *     GatewayARN?: string,
 *     BandwidthRateLimitIntervals?: list<array{
 *         StartHourOfDay?: int,
 *         StartMinuteOfHour?: int,
 *         EndHourOfDay?: int,
 *         EndMinuteOfHour?: int,
 *         DaysOfWeek?: list<int>,
 *         AverageUploadRateLimitInBitsPerSec?: int,
 *         AverageDownloadRateLimitInBitsPerSec?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBandwidthRateLimitScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBandwidthRateLimitScheduleAsync(array{
 *     GatewayARN?: string,
 *     BandwidthRateLimitIntervals?: list<array{
 *         StartHourOfDay?: int,
 *         StartMinuteOfHour?: int,
 *         EndHourOfDay?: int,
 *         EndMinuteOfHour?: int,
 *         DaysOfWeek?: list<int>,
 *         AverageUploadRateLimitInBitsPerSec?: int,
 *         AverageDownloadRateLimitInBitsPerSec?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChapCredentials(array $args = [])
 * @phpstan-method \Aws\Result updateChapCredentials(array{
 *     TargetARN?: string,
 *     SecretToAuthenticateInitiator?: string,
 *     InitiatorName?: string,
 *     SecretToAuthenticateTarget?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChapCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChapCredentialsAsync(array{
 *     TargetARN?: string,
 *     SecretToAuthenticateInitiator?: string,
 *     InitiatorName?: string,
 *     SecretToAuthenticateTarget?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFileSystemAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateFileSystemAssociation(array{
 *     FileSystemAssociationARN?: string,
 *     UserName?: string,
 *     Password?: string,
 *     AuditDestinationARN?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFileSystemAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFileSystemAssociationAsync(array{
 *     FileSystemAssociationARN?: string,
 *     UserName?: string,
 *     Password?: string,
 *     AuditDestinationARN?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGatewayInformation(array $args = [])
 * @phpstan-method \Aws\Result updateGatewayInformation(array{
 *     GatewayARN?: string,
 *     GatewayName?: string,
 *     GatewayTimezone?: string,
 *     CloudWatchLogGroupARN?: string,
 *     GatewayCapacity?: 'Large'|'Medium'|'Small',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayInformationAsync(array{
 *     GatewayARN?: string,
 *     GatewayName?: string,
 *     GatewayTimezone?: string,
 *     CloudWatchLogGroupARN?: string,
 *     GatewayCapacity?: 'Large'|'Medium'|'Small',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGatewaySoftwareNow(array $args = [])
 * @phpstan-method \Aws\Result updateGatewaySoftwareNow(array{GatewayARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewaySoftwareNowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewaySoftwareNowAsync(array{GatewayARN?: string, ...} $args = [])
 * @method \Aws\Result updateMaintenanceStartTime(array $args = [])
 * @phpstan-method \Aws\Result updateMaintenanceStartTime(array{
 *     GatewayARN?: string,
 *     HourOfDay?: int,
 *     MinuteOfHour?: int,
 *     DayOfWeek?: int,
 *     DayOfMonth?: int,
 *     SoftwareUpdatePreferences?: array{AutomaticUpdatePolicy?: 'ALL_VERSIONS'|'EMERGENCY_VERSIONS_ONLY', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMaintenanceStartTimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMaintenanceStartTimeAsync(array{
 *     GatewayARN?: string,
 *     HourOfDay?: int,
 *     MinuteOfHour?: int,
 *     DayOfWeek?: int,
 *     DayOfMonth?: int,
 *     SoftwareUpdatePreferences?: array{AutomaticUpdatePolicy?: 'ALL_VERSIONS'|'EMERGENCY_VERSIONS_ONLY', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNFSFileShare(array $args = [])
 * @phpstan-method \Aws\Result updateNFSFileShare(array{
 *     FileShareARN?: string,
 *     EncryptionType?: 'DsseKms'|'SseKms'|'SseS3',
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     NFSFileShareDefaults?: array{FileMode?: string, DirectoryMode?: string, GroupId?: int, OwnerId?: int, ...},
 *     DefaultStorageClass?: string,
 *     ObjectACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     ClientList?: list<string>,
 *     Squash?: string,
 *     ReadOnly?: bool,
 *     GuessMIMETypeEnabled?: bool,
 *     RequesterPays?: bool,
 *     FileShareName?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     NotificationPolicy?: string,
 *     AuditDestinationARN?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNFSFileShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNFSFileShareAsync(array{
 *     FileShareARN?: string,
 *     EncryptionType?: 'DsseKms'|'SseKms'|'SseS3',
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     NFSFileShareDefaults?: array{FileMode?: string, DirectoryMode?: string, GroupId?: int, OwnerId?: int, ...},
 *     DefaultStorageClass?: string,
 *     ObjectACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     ClientList?: list<string>,
 *     Squash?: string,
 *     ReadOnly?: bool,
 *     GuessMIMETypeEnabled?: bool,
 *     RequesterPays?: bool,
 *     FileShareName?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     NotificationPolicy?: string,
 *     AuditDestinationARN?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSMBFileShare(array $args = [])
 * @phpstan-method \Aws\Result updateSMBFileShare(array{
 *     FileShareARN?: string,
 *     EncryptionType?: 'DsseKms'|'SseKms'|'SseS3',
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     DefaultStorageClass?: string,
 *     ObjectACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     ReadOnly?: bool,
 *     GuessMIMETypeEnabled?: bool,
 *     RequesterPays?: bool,
 *     SMBACLEnabled?: bool,
 *     AccessBasedEnumeration?: bool,
 *     AdminUserList?: list<string>,
 *     ValidUserList?: list<string>,
 *     InvalidUserList?: list<string>,
 *     AuditDestinationARN?: string,
 *     CaseSensitivity?: 'CaseSensitive'|'ClientSpecified',
 *     FileShareName?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     NotificationPolicy?: string,
 *     OplocksEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSMBFileShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSMBFileShareAsync(array{
 *     FileShareARN?: string,
 *     EncryptionType?: 'DsseKms'|'SseKms'|'SseS3',
 *     KMSEncrypted?: bool,
 *     KMSKey?: string,
 *     DefaultStorageClass?: string,
 *     ObjectACL?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'private'|'public-read'|'public-read-write',
 *     ReadOnly?: bool,
 *     GuessMIMETypeEnabled?: bool,
 *     RequesterPays?: bool,
 *     SMBACLEnabled?: bool,
 *     AccessBasedEnumeration?: bool,
 *     AdminUserList?: list<string>,
 *     ValidUserList?: list<string>,
 *     InvalidUserList?: list<string>,
 *     AuditDestinationARN?: string,
 *     CaseSensitivity?: 'CaseSensitive'|'ClientSpecified',
 *     FileShareName?: string,
 *     CacheAttributes?: array{CacheStaleTimeoutInSeconds?: int, ...},
 *     NotificationPolicy?: string,
 *     OplocksEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSMBFileShareVisibility(array $args = [])
 * @phpstan-method \Aws\Result updateSMBFileShareVisibility(array{GatewayARN?: string, FileSharesVisible?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSMBFileShareVisibilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSMBFileShareVisibilityAsync(array{GatewayARN?: string, FileSharesVisible?: bool, ...} $args = [])
 * @method \Aws\Result updateSMBLocalGroups(array $args = [])
 * @phpstan-method \Aws\Result updateSMBLocalGroups(array{GatewayARN?: string, SMBLocalGroups?: array{GatewayAdmins?: list<string>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSMBLocalGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSMBLocalGroupsAsync(array{GatewayARN?: string, SMBLocalGroups?: array{GatewayAdmins?: list<string>, ...}, ...} $args = [])
 * @method \Aws\Result updateSMBSecurityStrategy(array $args = [])
 * @phpstan-method \Aws\Result updateSMBSecurityStrategy(array{
 *     GatewayARN?: string,
 *     SMBSecurityStrategy?: 'ClientSpecified'|'MandatoryEncryption'|'MandatoryEncryptionNoAes128'|'MandatorySigning',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSMBSecurityStrategyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSMBSecurityStrategyAsync(array{
 *     GatewayARN?: string,
 *     SMBSecurityStrategy?: 'ClientSpecified'|'MandatoryEncryption'|'MandatoryEncryptionNoAes128'|'MandatorySigning',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSnapshotSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateSnapshotSchedule(array{
 *     VolumeARN?: string,
 *     StartAt?: int,
 *     RecurrenceInHours?: int,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSnapshotScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSnapshotScheduleAsync(array{
 *     VolumeARN?: string,
 *     StartAt?: int,
 *     RecurrenceInHours?: int,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVTLDeviceType(array $args = [])
 * @phpstan-method \Aws\Result updateVTLDeviceType(array{VTLDeviceARN?: string, DeviceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVTLDeviceTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVTLDeviceTypeAsync(array{VTLDeviceARN?: string, DeviceType?: string, ...} $args = [])
 */
class StorageGatewayClient extends AwsClient {}
