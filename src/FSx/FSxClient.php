<?php
namespace Aws\FSx;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon FSx** service.
 * @method \Aws\Result associateFileSystemAliases(array $args = [])
 * @phpstan-method \Aws\Result associateFileSystemAliases(array{ClientRequestToken?: string, FileSystemId?: string, Aliases?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFileSystemAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFileSystemAliasesAsync(array{ClientRequestToken?: string, FileSystemId?: string, Aliases?: list<string>, ...} $args = [])
 * @method \Aws\Result cancelDataRepositoryTask(array $args = [])
 * @phpstan-method \Aws\Result cancelDataRepositoryTask(array{TaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDataRepositoryTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelDataRepositoryTaskAsync(array{TaskId?: string, ...} $args = [])
 * @method \Aws\Result copyBackup(array $args = [])
 * @phpstan-method \Aws\Result copyBackup(array{
 *     ClientRequestToken?: string,
 *     SourceBackupId?: string,
 *     SourceRegion?: string,
 *     KmsKeyId?: string,
 *     CopyTags?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyBackupAsync(array{
 *     ClientRequestToken?: string,
 *     SourceBackupId?: string,
 *     SourceRegion?: string,
 *     KmsKeyId?: string,
 *     CopyTags?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copySnapshotAndUpdateVolume(array $args = [])
 * @phpstan-method \Aws\Result copySnapshotAndUpdateVolume(array{
 *     ClientRequestToken?: string,
 *     VolumeId?: string,
 *     SourceSnapshotARN?: string,
 *     CopyStrategy?: 'CLONE'|'FULL_COPY'|'INCREMENTAL_COPY',
 *     Options?: list<'DELETE_CLONED_VOLUMES'|'DELETE_INTERMEDIATE_DATA'|'DELETE_INTERMEDIATE_SNAPSHOTS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copySnapshotAndUpdateVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copySnapshotAndUpdateVolumeAsync(array{
 *     ClientRequestToken?: string,
 *     VolumeId?: string,
 *     SourceSnapshotARN?: string,
 *     CopyStrategy?: 'CLONE'|'FULL_COPY'|'INCREMENTAL_COPY',
 *     Options?: list<'DELETE_CLONED_VOLUMES'|'DELETE_INTERMEDIATE_DATA'|'DELETE_INTERMEDIATE_SNAPSHOTS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAndAttachS3AccessPoint(array $args = [])
 * @phpstan-method \Aws\Result createAndAttachS3AccessPoint(array{
 *     ClientRequestToken?: string,
 *     Name?: string,
 *     Type?: 'ONTAP'|'OPENZFS',
 *     OpenZFSConfiguration?: array{VolumeId?: string, FileSystemIdentity?: array{Type?: 'POSIX', PosixUser?: array, ...}, ...},
 *     OntapConfiguration?: array{
 *         VolumeId?: string,
 *         FileSystemIdentity?: array{Type?: 'UNIX'|'WINDOWS', UnixUser?: array, WindowsUser?: array, ...},
 *         ...,
 *     },
 *     S3AccessPoint?: array{VpcConfiguration?: array{VpcId?: string, ...}, Policy?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAndAttachS3AccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAndAttachS3AccessPointAsync(array{
 *     ClientRequestToken?: string,
 *     Name?: string,
 *     Type?: 'ONTAP'|'OPENZFS',
 *     OpenZFSConfiguration?: array{VolumeId?: string, FileSystemIdentity?: array{Type?: 'POSIX', PosixUser?: array, ...}, ...},
 *     OntapConfiguration?: array{
 *         VolumeId?: string,
 *         FileSystemIdentity?: array{Type?: 'UNIX'|'WINDOWS', UnixUser?: array, WindowsUser?: array, ...},
 *         ...,
 *     },
 *     S3AccessPoint?: array{VpcConfiguration?: array{VpcId?: string, ...}, Policy?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBackup(array $args = [])
 * @phpstan-method \Aws\Result createBackup(array{
 *     FileSystemId?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VolumeId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackupAsync(array{
 *     FileSystemId?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VolumeId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataRepositoryAssociation(array $args = [])
 * @phpstan-method \Aws\Result createDataRepositoryAssociation(array{
 *     FileSystemId?: string,
 *     FileSystemPath?: string,
 *     DataRepositoryPath?: string,
 *     BatchImportMetaDataOnCreate?: bool,
 *     ImportedFileChunkSize?: int,
 *     S3?: array{
 *         AutoImportPolicy?: array{Events?: list<'CHANGED'|'DELETED'|'NEW'>, ...},
 *         AutoExportPolicy?: array{Events?: list<'CHANGED'|'DELETED'|'NEW'>, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataRepositoryAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataRepositoryAssociationAsync(array{
 *     FileSystemId?: string,
 *     FileSystemPath?: string,
 *     DataRepositoryPath?: string,
 *     BatchImportMetaDataOnCreate?: bool,
 *     ImportedFileChunkSize?: int,
 *     S3?: array{
 *         AutoImportPolicy?: array{Events?: list<'CHANGED'|'DELETED'|'NEW'>, ...},
 *         AutoExportPolicy?: array{Events?: list<'CHANGED'|'DELETED'|'NEW'>, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataRepositoryTask(array $args = [])
 * @phpstan-method \Aws\Result createDataRepositoryTask(array{
 *     Type?: 'AUTO_RELEASE_DATA'|'EXPORT_TO_REPOSITORY'|'IMPORT_METADATA_FROM_REPOSITORY'|'RELEASE_DATA_FROM_FILESYSTEM',
 *     Paths?: list<string>,
 *     FileSystemId?: string,
 *     Report?: array{Enabled?: bool, Path?: string, Format?: 'REPORT_CSV_20191124', Scope?: 'FAILED_FILES_ONLY', ...},
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CapacityToRelease?: int,
 *     ReleaseConfiguration?: array{DurationSinceLastAccess?: array{Unit?: 'DAYS', Value?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataRepositoryTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataRepositoryTaskAsync(array{
 *     Type?: 'AUTO_RELEASE_DATA'|'EXPORT_TO_REPOSITORY'|'IMPORT_METADATA_FROM_REPOSITORY'|'RELEASE_DATA_FROM_FILESYSTEM',
 *     Paths?: list<string>,
 *     FileSystemId?: string,
 *     Report?: array{Enabled?: bool, Path?: string, Format?: 'REPORT_CSV_20191124', Scope?: 'FAILED_FILES_ONLY', ...},
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CapacityToRelease?: int,
 *     ReleaseConfiguration?: array{DurationSinceLastAccess?: array{Unit?: 'DAYS', Value?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFileCache(array $args = [])
 * @phpstan-method \Aws\Result createFileCache(array{
 *     ClientRequestToken?: string,
 *     FileCacheType?: 'LUSTRE',
 *     FileCacheTypeVersion?: string,
 *     StorageCapacity?: int,
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CopyTagsToDataRepositoryAssociations?: bool,
 *     KmsKeyId?: string,
 *     LustreConfiguration?: array{
 *         PerUnitStorageThroughput?: int,
 *         DeploymentType?: 'CACHE_1',
 *         WeeklyMaintenanceStartTime?: string,
 *         MetadataConfiguration?: array{StorageCapacity?: int, ...},
 *         ...,
 *     },
 *     DataRepositoryAssociations?: list<array{
 *         FileCachePath?: string,
 *         DataRepositoryPath?: string,
 *         DataRepositorySubdirectories?: list<string>,
 *         NFS?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFileCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFileCacheAsync(array{
 *     ClientRequestToken?: string,
 *     FileCacheType?: 'LUSTRE',
 *     FileCacheTypeVersion?: string,
 *     StorageCapacity?: int,
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CopyTagsToDataRepositoryAssociations?: bool,
 *     KmsKeyId?: string,
 *     LustreConfiguration?: array{
 *         PerUnitStorageThroughput?: int,
 *         DeploymentType?: 'CACHE_1',
 *         WeeklyMaintenanceStartTime?: string,
 *         MetadataConfiguration?: array{StorageCapacity?: int, ...},
 *         ...,
 *     },
 *     DataRepositoryAssociations?: list<array{
 *         FileCachePath?: string,
 *         DataRepositoryPath?: string,
 *         DataRepositorySubdirectories?: list<string>,
 *         NFS?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFileSystem(array $args = [])
 * @phpstan-method \Aws\Result createFileSystem(array{
 *     ClientRequestToken?: string,
 *     FileSystemType?: 'LUSTRE'|'ONTAP'|'OPENZFS'|'WINDOWS',
 *     StorageCapacity?: int,
 *     StorageType?: 'HDD'|'INTELLIGENT_TIERING'|'SSD',
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     WindowsConfiguration?: array{
 *         ActiveDirectoryId?: string,
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         DeploymentType?: 'MULTI_AZ_1'|'SINGLE_AZ_1'|'SINGLE_AZ_2',
 *         PreferredSubnetId?: string,
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         Aliases?: list<string>,
 *         AuditLogConfiguration?: array{
 *             FileAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             FileShareAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             AuditLogDestination?: string,
 *             ...,
 *         },
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         FsrmConfiguration?: array{FsrmServiceEnabled?: bool, EventLogDestination?: string, ...},
 *         ...,
 *     },
 *     LustreConfiguration?: array{
 *         WeeklyMaintenanceStartTime?: string,
 *         ImportPath?: string,
 *         ExportPath?: string,
 *         ImportedFileChunkSize?: int,
 *         DeploymentType?: 'PERSISTENT_1'|'PERSISTENT_2'|'SCRATCH_1'|'SCRATCH_2',
 *         AutoImportPolicy?: 'NEW'|'NEW_CHANGED'|'NEW_CHANGED_DELETED'|'NONE',
 *         PerUnitStorageThroughput?: int,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         DriveCacheType?: 'NONE'|'READ',
 *         DataCompressionType?: 'LZ4'|'NONE',
 *         EfaEnabled?: bool,
 *         LogConfiguration?: array{Level?: 'DISABLED'|'ERROR_ONLY'|'WARN_ERROR'|'WARN_ONLY', Destination?: string, ...},
 *         RootSquashConfiguration?: array{RootSquash?: string, NoSquashNids?: list<string>, ...},
 *         MetadataConfiguration?: array{Iops?: int, Mode?: 'AUTOMATIC'|'USER_PROVISIONED', ...},
 *         ThroughputCapacity?: int,
 *         DataReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     OntapConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         DailyAutomaticBackupStartTime?: string,
 *         DeploymentType?: 'MULTI_AZ_1'|'MULTI_AZ_2'|'SINGLE_AZ_1'|'SINGLE_AZ_2',
 *         EndpointIpAddressRange?: string,
 *         FsxAdminPassword?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         PreferredSubnetId?: string,
 *         RouteTableIds?: list<string>,
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         HAPairs?: int,
 *         ThroughputCapacityPerHAPair?: int,
 *         EndpointIpv6AddressRange?: string,
 *         ...,
 *     },
 *     FileSystemTypeVersion?: string,
 *     OpenZFSConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         CopyTagsToVolumes?: bool,
 *         DailyAutomaticBackupStartTime?: string,
 *         DeploymentType?: 'MULTI_AZ_1'|'SINGLE_AZ_1'|'SINGLE_AZ_2'|'SINGLE_AZ_HA_1'|'SINGLE_AZ_HA_2',
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         RootVolumeConfiguration?: array{
 *             RecordSizeKiB?: int,
 *             DataCompressionType?: 'LZ4'|'NONE'|'ZSTD',
 *             NfsExports?: list<array>,
 *             UserAndGroupQuotas?: list<array>,
 *             CopyTagsToSnapshots?: bool,
 *             ReadOnly?: bool,
 *             ...,
 *         },
 *         PreferredSubnetId?: string,
 *         EndpointIpAddressRange?: string,
 *         EndpointIpv6AddressRange?: string,
 *         RouteTableIds?: list<string>,
 *         ReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     NetworkType?: 'DUAL'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFileSystemAsync(array{
 *     ClientRequestToken?: string,
 *     FileSystemType?: 'LUSTRE'|'ONTAP'|'OPENZFS'|'WINDOWS',
 *     StorageCapacity?: int,
 *     StorageType?: 'HDD'|'INTELLIGENT_TIERING'|'SSD',
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     WindowsConfiguration?: array{
 *         ActiveDirectoryId?: string,
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         DeploymentType?: 'MULTI_AZ_1'|'SINGLE_AZ_1'|'SINGLE_AZ_2',
 *         PreferredSubnetId?: string,
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         Aliases?: list<string>,
 *         AuditLogConfiguration?: array{
 *             FileAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             FileShareAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             AuditLogDestination?: string,
 *             ...,
 *         },
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         FsrmConfiguration?: array{FsrmServiceEnabled?: bool, EventLogDestination?: string, ...},
 *         ...,
 *     },
 *     LustreConfiguration?: array{
 *         WeeklyMaintenanceStartTime?: string,
 *         ImportPath?: string,
 *         ExportPath?: string,
 *         ImportedFileChunkSize?: int,
 *         DeploymentType?: 'PERSISTENT_1'|'PERSISTENT_2'|'SCRATCH_1'|'SCRATCH_2',
 *         AutoImportPolicy?: 'NEW'|'NEW_CHANGED'|'NEW_CHANGED_DELETED'|'NONE',
 *         PerUnitStorageThroughput?: int,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         DriveCacheType?: 'NONE'|'READ',
 *         DataCompressionType?: 'LZ4'|'NONE',
 *         EfaEnabled?: bool,
 *         LogConfiguration?: array{Level?: 'DISABLED'|'ERROR_ONLY'|'WARN_ERROR'|'WARN_ONLY', Destination?: string, ...},
 *         RootSquashConfiguration?: array{RootSquash?: string, NoSquashNids?: list<string>, ...},
 *         MetadataConfiguration?: array{Iops?: int, Mode?: 'AUTOMATIC'|'USER_PROVISIONED', ...},
 *         ThroughputCapacity?: int,
 *         DataReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     OntapConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         DailyAutomaticBackupStartTime?: string,
 *         DeploymentType?: 'MULTI_AZ_1'|'MULTI_AZ_2'|'SINGLE_AZ_1'|'SINGLE_AZ_2',
 *         EndpointIpAddressRange?: string,
 *         FsxAdminPassword?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         PreferredSubnetId?: string,
 *         RouteTableIds?: list<string>,
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         HAPairs?: int,
 *         ThroughputCapacityPerHAPair?: int,
 *         EndpointIpv6AddressRange?: string,
 *         ...,
 *     },
 *     FileSystemTypeVersion?: string,
 *     OpenZFSConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         CopyTagsToVolumes?: bool,
 *         DailyAutomaticBackupStartTime?: string,
 *         DeploymentType?: 'MULTI_AZ_1'|'SINGLE_AZ_1'|'SINGLE_AZ_2'|'SINGLE_AZ_HA_1'|'SINGLE_AZ_HA_2',
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         RootVolumeConfiguration?: array{
 *             RecordSizeKiB?: int,
 *             DataCompressionType?: 'LZ4'|'NONE'|'ZSTD',
 *             NfsExports?: list<array>,
 *             UserAndGroupQuotas?: list<array>,
 *             CopyTagsToSnapshots?: bool,
 *             ReadOnly?: bool,
 *             ...,
 *         },
 *         PreferredSubnetId?: string,
 *         EndpointIpAddressRange?: string,
 *         EndpointIpv6AddressRange?: string,
 *         RouteTableIds?: list<string>,
 *         ReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     NetworkType?: 'DUAL'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFileSystemFromBackup(array $args = [])
 * @phpstan-method \Aws\Result createFileSystemFromBackup(array{
 *     BackupId?: string,
 *     ClientRequestToken?: string,
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WindowsConfiguration?: array{
 *         ActiveDirectoryId?: string,
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         DeploymentType?: 'MULTI_AZ_1'|'SINGLE_AZ_1'|'SINGLE_AZ_2',
 *         PreferredSubnetId?: string,
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         Aliases?: list<string>,
 *         AuditLogConfiguration?: array{
 *             FileAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             FileShareAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             AuditLogDestination?: string,
 *             ...,
 *         },
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         FsrmConfiguration?: array{FsrmServiceEnabled?: bool, EventLogDestination?: string, ...},
 *         ...,
 *     },
 *     LustreConfiguration?: array{
 *         WeeklyMaintenanceStartTime?: string,
 *         ImportPath?: string,
 *         ExportPath?: string,
 *         ImportedFileChunkSize?: int,
 *         DeploymentType?: 'PERSISTENT_1'|'PERSISTENT_2'|'SCRATCH_1'|'SCRATCH_2',
 *         AutoImportPolicy?: 'NEW'|'NEW_CHANGED'|'NEW_CHANGED_DELETED'|'NONE',
 *         PerUnitStorageThroughput?: int,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         DriveCacheType?: 'NONE'|'READ',
 *         DataCompressionType?: 'LZ4'|'NONE',
 *         EfaEnabled?: bool,
 *         LogConfiguration?: array{Level?: 'DISABLED'|'ERROR_ONLY'|'WARN_ERROR'|'WARN_ONLY', Destination?: string, ...},
 *         RootSquashConfiguration?: array{RootSquash?: string, NoSquashNids?: list<string>, ...},
 *         MetadataConfiguration?: array{Iops?: int, Mode?: 'AUTOMATIC'|'USER_PROVISIONED', ...},
 *         ThroughputCapacity?: int,
 *         DataReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     StorageType?: 'HDD'|'INTELLIGENT_TIERING'|'SSD',
 *     KmsKeyId?: string,
 *     FileSystemTypeVersion?: string,
 *     OpenZFSConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         CopyTagsToVolumes?: bool,
 *         DailyAutomaticBackupStartTime?: string,
 *         DeploymentType?: 'MULTI_AZ_1'|'SINGLE_AZ_1'|'SINGLE_AZ_2'|'SINGLE_AZ_HA_1'|'SINGLE_AZ_HA_2',
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         RootVolumeConfiguration?: array{
 *             RecordSizeKiB?: int,
 *             DataCompressionType?: 'LZ4'|'NONE'|'ZSTD',
 *             NfsExports?: list<array>,
 *             UserAndGroupQuotas?: list<array>,
 *             CopyTagsToSnapshots?: bool,
 *             ReadOnly?: bool,
 *             ...,
 *         },
 *         PreferredSubnetId?: string,
 *         EndpointIpAddressRange?: string,
 *         EndpointIpv6AddressRange?: string,
 *         RouteTableIds?: list<string>,
 *         ReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     StorageCapacity?: int,
 *     NetworkType?: 'DUAL'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFileSystemFromBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFileSystemFromBackupAsync(array{
 *     BackupId?: string,
 *     ClientRequestToken?: string,
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WindowsConfiguration?: array{
 *         ActiveDirectoryId?: string,
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         DeploymentType?: 'MULTI_AZ_1'|'SINGLE_AZ_1'|'SINGLE_AZ_2',
 *         PreferredSubnetId?: string,
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         Aliases?: list<string>,
 *         AuditLogConfiguration?: array{
 *             FileAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             FileShareAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             AuditLogDestination?: string,
 *             ...,
 *         },
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         FsrmConfiguration?: array{FsrmServiceEnabled?: bool, EventLogDestination?: string, ...},
 *         ...,
 *     },
 *     LustreConfiguration?: array{
 *         WeeklyMaintenanceStartTime?: string,
 *         ImportPath?: string,
 *         ExportPath?: string,
 *         ImportedFileChunkSize?: int,
 *         DeploymentType?: 'PERSISTENT_1'|'PERSISTENT_2'|'SCRATCH_1'|'SCRATCH_2',
 *         AutoImportPolicy?: 'NEW'|'NEW_CHANGED'|'NEW_CHANGED_DELETED'|'NONE',
 *         PerUnitStorageThroughput?: int,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         DriveCacheType?: 'NONE'|'READ',
 *         DataCompressionType?: 'LZ4'|'NONE',
 *         EfaEnabled?: bool,
 *         LogConfiguration?: array{Level?: 'DISABLED'|'ERROR_ONLY'|'WARN_ERROR'|'WARN_ONLY', Destination?: string, ...},
 *         RootSquashConfiguration?: array{RootSquash?: string, NoSquashNids?: list<string>, ...},
 *         MetadataConfiguration?: array{Iops?: int, Mode?: 'AUTOMATIC'|'USER_PROVISIONED', ...},
 *         ThroughputCapacity?: int,
 *         DataReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     StorageType?: 'HDD'|'INTELLIGENT_TIERING'|'SSD',
 *     KmsKeyId?: string,
 *     FileSystemTypeVersion?: string,
 *     OpenZFSConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         CopyTagsToVolumes?: bool,
 *         DailyAutomaticBackupStartTime?: string,
 *         DeploymentType?: 'MULTI_AZ_1'|'SINGLE_AZ_1'|'SINGLE_AZ_2'|'SINGLE_AZ_HA_1'|'SINGLE_AZ_HA_2',
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         RootVolumeConfiguration?: array{
 *             RecordSizeKiB?: int,
 *             DataCompressionType?: 'LZ4'|'NONE'|'ZSTD',
 *             NfsExports?: list<array>,
 *             UserAndGroupQuotas?: list<array>,
 *             CopyTagsToSnapshots?: bool,
 *             ReadOnly?: bool,
 *             ...,
 *         },
 *         PreferredSubnetId?: string,
 *         EndpointIpAddressRange?: string,
 *         EndpointIpv6AddressRange?: string,
 *         RouteTableIds?: list<string>,
 *         ReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     StorageCapacity?: int,
 *     NetworkType?: 'DUAL'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createSnapshot(array{
 *     ClientRequestToken?: string,
 *     Name?: string,
 *     VolumeId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotAsync(array{
 *     ClientRequestToken?: string,
 *     Name?: string,
 *     VolumeId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStorageVirtualMachine(array $args = [])
 * @phpstan-method \Aws\Result createStorageVirtualMachine(array{
 *     ActiveDirectoryConfiguration?: array{
 *         NetBiosName?: string,
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     FileSystemId?: string,
 *     Name?: string,
 *     SvmAdminPassword?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     RootVolumeSecurityStyle?: 'MIXED'|'NTFS'|'UNIX',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStorageVirtualMachineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStorageVirtualMachineAsync(array{
 *     ActiveDirectoryConfiguration?: array{
 *         NetBiosName?: string,
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     FileSystemId?: string,
 *     Name?: string,
 *     SvmAdminPassword?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     RootVolumeSecurityStyle?: 'MIXED'|'NTFS'|'UNIX',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVolume(array $args = [])
 * @phpstan-method \Aws\Result createVolume(array{
 *     ClientRequestToken?: string,
 *     VolumeType?: 'ONTAP'|'OPENZFS',
 *     Name?: string,
 *     OntapConfiguration?: array{
 *         JunctionPath?: string,
 *         SecurityStyle?: 'MIXED'|'NTFS'|'UNIX',
 *         SizeInMegabytes?: int,
 *         StorageEfficiencyEnabled?: bool,
 *         StorageVirtualMachineId?: string,
 *         TieringPolicy?: array{CoolingPeriod?: int, Name?: 'ALL'|'AUTO'|'NONE'|'SNAPSHOT_ONLY', ...},
 *         OntapVolumeType?: 'DP'|'RW',
 *         SnapshotPolicy?: string,
 *         CopyTagsToBackups?: bool,
 *         SnaplockConfiguration?: array{
 *             AuditLogVolume?: bool,
 *             AutocommitPeriod?: array,
 *             PrivilegedDelete?: 'DISABLED'|'ENABLED'|'PERMANENTLY_DISABLED',
 *             RetentionPeriod?: array,
 *             SnaplockType?: 'COMPLIANCE'|'ENTERPRISE',
 *             VolumeAppendModeEnabled?: bool,
 *             ...,
 *         },
 *         VolumeStyle?: 'FLEXGROUP'|'FLEXVOL',
 *         AggregateConfiguration?: array{Aggregates?: list<string>, ConstituentsPerAggregate?: int, ...},
 *         SizeInBytes?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     OpenZFSConfiguration?: array{
 *         ParentVolumeId?: string,
 *         StorageCapacityReservationGiB?: int,
 *         StorageCapacityQuotaGiB?: int,
 *         RecordSizeKiB?: int,
 *         DataCompressionType?: 'LZ4'|'NONE'|'ZSTD',
 *         CopyTagsToSnapshots?: bool,
 *         OriginSnapshot?: array{SnapshotARN?: string, CopyStrategy?: 'CLONE'|'FULL_COPY'|'INCREMENTAL_COPY', ...},
 *         ReadOnly?: bool,
 *         NfsExports?: list<array>,
 *         UserAndGroupQuotas?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVolumeAsync(array{
 *     ClientRequestToken?: string,
 *     VolumeType?: 'ONTAP'|'OPENZFS',
 *     Name?: string,
 *     OntapConfiguration?: array{
 *         JunctionPath?: string,
 *         SecurityStyle?: 'MIXED'|'NTFS'|'UNIX',
 *         SizeInMegabytes?: int,
 *         StorageEfficiencyEnabled?: bool,
 *         StorageVirtualMachineId?: string,
 *         TieringPolicy?: array{CoolingPeriod?: int, Name?: 'ALL'|'AUTO'|'NONE'|'SNAPSHOT_ONLY', ...},
 *         OntapVolumeType?: 'DP'|'RW',
 *         SnapshotPolicy?: string,
 *         CopyTagsToBackups?: bool,
 *         SnaplockConfiguration?: array{
 *             AuditLogVolume?: bool,
 *             AutocommitPeriod?: array,
 *             PrivilegedDelete?: 'DISABLED'|'ENABLED'|'PERMANENTLY_DISABLED',
 *             RetentionPeriod?: array,
 *             SnaplockType?: 'COMPLIANCE'|'ENTERPRISE',
 *             VolumeAppendModeEnabled?: bool,
 *             ...,
 *         },
 *         VolumeStyle?: 'FLEXGROUP'|'FLEXVOL',
 *         AggregateConfiguration?: array{Aggregates?: list<string>, ConstituentsPerAggregate?: int, ...},
 *         SizeInBytes?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     OpenZFSConfiguration?: array{
 *         ParentVolumeId?: string,
 *         StorageCapacityReservationGiB?: int,
 *         StorageCapacityQuotaGiB?: int,
 *         RecordSizeKiB?: int,
 *         DataCompressionType?: 'LZ4'|'NONE'|'ZSTD',
 *         CopyTagsToSnapshots?: bool,
 *         OriginSnapshot?: array{SnapshotARN?: string, CopyStrategy?: 'CLONE'|'FULL_COPY'|'INCREMENTAL_COPY', ...},
 *         ReadOnly?: bool,
 *         NfsExports?: list<array>,
 *         UserAndGroupQuotas?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVolumeFromBackup(array $args = [])
 * @phpstan-method \Aws\Result createVolumeFromBackup(array{
 *     BackupId?: string,
 *     ClientRequestToken?: string,
 *     Name?: string,
 *     OntapConfiguration?: array{
 *         JunctionPath?: string,
 *         SecurityStyle?: 'MIXED'|'NTFS'|'UNIX',
 *         SizeInMegabytes?: int,
 *         StorageEfficiencyEnabled?: bool,
 *         StorageVirtualMachineId?: string,
 *         TieringPolicy?: array{CoolingPeriod?: int, Name?: 'ALL'|'AUTO'|'NONE'|'SNAPSHOT_ONLY', ...},
 *         OntapVolumeType?: 'DP'|'RW',
 *         SnapshotPolicy?: string,
 *         CopyTagsToBackups?: bool,
 *         SnaplockConfiguration?: array{
 *             AuditLogVolume?: bool,
 *             AutocommitPeriod?: array,
 *             PrivilegedDelete?: 'DISABLED'|'ENABLED'|'PERMANENTLY_DISABLED',
 *             RetentionPeriod?: array,
 *             SnaplockType?: 'COMPLIANCE'|'ENTERPRISE',
 *             VolumeAppendModeEnabled?: bool,
 *             ...,
 *         },
 *         VolumeStyle?: 'FLEXGROUP'|'FLEXVOL',
 *         AggregateConfiguration?: array{Aggregates?: list<string>, ConstituentsPerAggregate?: int, ...},
 *         SizeInBytes?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVolumeFromBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVolumeFromBackupAsync(array{
 *     BackupId?: string,
 *     ClientRequestToken?: string,
 *     Name?: string,
 *     OntapConfiguration?: array{
 *         JunctionPath?: string,
 *         SecurityStyle?: 'MIXED'|'NTFS'|'UNIX',
 *         SizeInMegabytes?: int,
 *         StorageEfficiencyEnabled?: bool,
 *         StorageVirtualMachineId?: string,
 *         TieringPolicy?: array{CoolingPeriod?: int, Name?: 'ALL'|'AUTO'|'NONE'|'SNAPSHOT_ONLY', ...},
 *         OntapVolumeType?: 'DP'|'RW',
 *         SnapshotPolicy?: string,
 *         CopyTagsToBackups?: bool,
 *         SnaplockConfiguration?: array{
 *             AuditLogVolume?: bool,
 *             AutocommitPeriod?: array,
 *             PrivilegedDelete?: 'DISABLED'|'ENABLED'|'PERMANENTLY_DISABLED',
 *             RetentionPeriod?: array,
 *             SnaplockType?: 'COMPLIANCE'|'ENTERPRISE',
 *             VolumeAppendModeEnabled?: bool,
 *             ...,
 *         },
 *         VolumeStyle?: 'FLEXGROUP'|'FLEXVOL',
 *         AggregateConfiguration?: array{Aggregates?: list<string>, ConstituentsPerAggregate?: int, ...},
 *         SizeInBytes?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBackup(array $args = [])
 * @phpstan-method \Aws\Result deleteBackup(array{BackupId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupAsync(array{BackupId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteDataRepositoryAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteDataRepositoryAssociation(array{AssociationId?: string, ClientRequestToken?: string, DeleteDataInFileSystem?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataRepositoryAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataRepositoryAssociationAsync(array{AssociationId?: string, ClientRequestToken?: string, DeleteDataInFileSystem?: bool, ...} $args = [])
 * @method \Aws\Result deleteFileCache(array $args = [])
 * @phpstan-method \Aws\Result deleteFileCache(array{FileCacheId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFileCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFileCacheAsync(array{FileCacheId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteFileSystem(array $args = [])
 * @phpstan-method \Aws\Result deleteFileSystem(array{
 *     FileSystemId?: string,
 *     ClientRequestToken?: string,
 *     WindowsConfiguration?: array{SkipFinalBackup?: bool, FinalBackupTags?: list<array>, ...},
 *     LustreConfiguration?: array{SkipFinalBackup?: bool, FinalBackupTags?: list<array>, ...},
 *     OpenZFSConfiguration?: array{
 *         SkipFinalBackup?: bool,
 *         FinalBackupTags?: list<array>,
 *         Options?: list<'DELETE_CHILD_VOLUMES_AND_SNAPSHOTS'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFileSystemAsync(array{
 *     FileSystemId?: string,
 *     ClientRequestToken?: string,
 *     WindowsConfiguration?: array{SkipFinalBackup?: bool, FinalBackupTags?: list<array>, ...},
 *     LustreConfiguration?: array{SkipFinalBackup?: bool, FinalBackupTags?: list<array>, ...},
 *     OpenZFSConfiguration?: array{
 *         SkipFinalBackup?: bool,
 *         FinalBackupTags?: list<array>,
 *         Options?: list<'DELETE_CHILD_VOLUMES_AND_SNAPSHOTS'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshot(array{ClientRequestToken?: string, SnapshotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array{ClientRequestToken?: string, SnapshotId?: string, ...} $args = [])
 * @method \Aws\Result deleteStorageVirtualMachine(array $args = [])
 * @phpstan-method \Aws\Result deleteStorageVirtualMachine(array{ClientRequestToken?: string, StorageVirtualMachineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStorageVirtualMachineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStorageVirtualMachineAsync(array{ClientRequestToken?: string, StorageVirtualMachineId?: string, ...} $args = [])
 * @method \Aws\Result deleteVolume(array $args = [])
 * @phpstan-method \Aws\Result deleteVolume(array{
 *     ClientRequestToken?: string,
 *     VolumeId?: string,
 *     OntapConfiguration?: array{SkipFinalBackup?: bool, FinalBackupTags?: list<array>, BypassSnaplockEnterpriseRetention?: bool, ...},
 *     OpenZFSConfiguration?: array{Options?: list<'DELETE_CHILD_VOLUMES_AND_SNAPSHOTS'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVolumeAsync(array{
 *     ClientRequestToken?: string,
 *     VolumeId?: string,
 *     OntapConfiguration?: array{SkipFinalBackup?: bool, FinalBackupTags?: list<array>, BypassSnaplockEnterpriseRetention?: bool, ...},
 *     OpenZFSConfiguration?: array{Options?: list<'DELETE_CHILD_VOLUMES_AND_SNAPSHOTS'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeBackups(array $args = [])
 * @phpstan-method \Aws\Result describeBackups(array{
 *     BackupIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'backup-type'|'data-repository-type'|'file-cache-id'|'file-cache-type'|'file-system-id'|'file-system-type'|'volume-id',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBackupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBackupsAsync(array{
 *     BackupIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'backup-type'|'data-repository-type'|'file-cache-id'|'file-cache-type'|'file-system-id'|'file-system-type'|'volume-id',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDataRepositoryAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeDataRepositoryAssociations(array{
 *     AssociationIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'backup-type'|'data-repository-type'|'file-cache-id'|'file-cache-type'|'file-system-id'|'file-system-type'|'volume-id',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataRepositoryAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataRepositoryAssociationsAsync(array{
 *     AssociationIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'backup-type'|'data-repository-type'|'file-cache-id'|'file-cache-type'|'file-system-id'|'file-system-type'|'volume-id',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDataRepositoryTasks(array $args = [])
 * @phpstan-method \Aws\Result describeDataRepositoryTasks(array{
 *     TaskIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'data-repository-association-id'|'file-cache-id'|'file-system-id'|'task-lifecycle',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataRepositoryTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataRepositoryTasksAsync(array{
 *     TaskIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'data-repository-association-id'|'file-cache-id'|'file-system-id'|'task-lifecycle',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFileCaches(array $args = [])
 * @phpstan-method \Aws\Result describeFileCaches(array{FileCacheIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFileCachesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFileCachesAsync(array{FileCacheIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeFileSystemAliases(array $args = [])
 * @phpstan-method \Aws\Result describeFileSystemAliases(array{ClientRequestToken?: string, FileSystemId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFileSystemAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFileSystemAliasesAsync(array{ClientRequestToken?: string, FileSystemId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeFileSystems(array $args = [])
 * @phpstan-method \Aws\Result describeFileSystems(array{FileSystemIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFileSystemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFileSystemsAsync(array{FileSystemIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeS3AccessPointAttachments(array $args = [])
 * @phpstan-method \Aws\Result describeS3AccessPointAttachments(array{
 *     Names?: list<string>,
 *     Filters?: list<array{Name?: 'file-system-id'|'type'|'volume-id', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeS3AccessPointAttachmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeS3AccessPointAttachmentsAsync(array{
 *     Names?: list<string>,
 *     Filters?: list<array{Name?: 'file-system-id'|'type'|'volume-id', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSharedVpcConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeSharedVpcConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSharedVpcConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSharedVpcConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result describeSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeSnapshots(array{
 *     SnapshotIds?: list<string>,
 *     Filters?: list<array{Name?: 'file-system-id'|'volume-id', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     IncludeShared?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array{
 *     SnapshotIds?: list<string>,
 *     Filters?: list<array{Name?: 'file-system-id'|'volume-id', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     IncludeShared?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeStorageVirtualMachines(array $args = [])
 * @phpstan-method \Aws\Result describeStorageVirtualMachines(array{
 *     StorageVirtualMachineIds?: list<string>,
 *     Filters?: list<array{Name?: 'file-system-id', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStorageVirtualMachinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStorageVirtualMachinesAsync(array{
 *     StorageVirtualMachineIds?: list<string>,
 *     Filters?: list<array{Name?: 'file-system-id', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeVolumes(array $args = [])
 * @phpstan-method \Aws\Result describeVolumes(array{
 *     VolumeIds?: list<string>,
 *     Filters?: list<array{Name?: 'file-system-id'|'storage-virtual-machine-id', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVolumesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVolumesAsync(array{
 *     VolumeIds?: list<string>,
 *     Filters?: list<array{Name?: 'file-system-id'|'storage-virtual-machine-id', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result detachAndDeleteS3AccessPoint(array $args = [])
 * @phpstan-method \Aws\Result detachAndDeleteS3AccessPoint(array{ClientRequestToken?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachAndDeleteS3AccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachAndDeleteS3AccessPointAsync(array{ClientRequestToken?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result disassociateFileSystemAliases(array $args = [])
 * @phpstan-method \Aws\Result disassociateFileSystemAliases(array{ClientRequestToken?: string, FileSystemId?: string, Aliases?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFileSystemAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFileSystemAliasesAsync(array{ClientRequestToken?: string, FileSystemId?: string, Aliases?: list<string>, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result releaseFileSystemNfsV3Locks(array $args = [])
 * @phpstan-method \Aws\Result releaseFileSystemNfsV3Locks(array{FileSystemId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise releaseFileSystemNfsV3LocksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise releaseFileSystemNfsV3LocksAsync(array{FileSystemId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result restoreVolumeFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreVolumeFromSnapshot(array{
 *     ClientRequestToken?: string,
 *     VolumeId?: string,
 *     SnapshotId?: string,
 *     Options?: list<'DELETE_CLONED_VOLUMES'|'DELETE_INTERMEDIATE_SNAPSHOTS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreVolumeFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreVolumeFromSnapshotAsync(array{
 *     ClientRequestToken?: string,
 *     VolumeId?: string,
 *     SnapshotId?: string,
 *     Options?: list<'DELETE_CLONED_VOLUMES'|'DELETE_INTERMEDIATE_SNAPSHOTS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMisconfiguredStateRecovery(array $args = [])
 * @phpstan-method \Aws\Result startMisconfiguredStateRecovery(array{ClientRequestToken?: string, FileSystemId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMisconfiguredStateRecoveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMisconfiguredStateRecoveryAsync(array{ClientRequestToken?: string, FileSystemId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDataRepositoryAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateDataRepositoryAssociation(array{
 *     AssociationId?: string,
 *     ClientRequestToken?: string,
 *     ImportedFileChunkSize?: int,
 *     S3?: array{
 *         AutoImportPolicy?: array{Events?: list<'CHANGED'|'DELETED'|'NEW'>, ...},
 *         AutoExportPolicy?: array{Events?: list<'CHANGED'|'DELETED'|'NEW'>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataRepositoryAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataRepositoryAssociationAsync(array{
 *     AssociationId?: string,
 *     ClientRequestToken?: string,
 *     ImportedFileChunkSize?: int,
 *     S3?: array{
 *         AutoImportPolicy?: array{Events?: list<'CHANGED'|'DELETED'|'NEW'>, ...},
 *         AutoExportPolicy?: array{Events?: list<'CHANGED'|'DELETED'|'NEW'>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFileCache(array $args = [])
 * @phpstan-method \Aws\Result updateFileCache(array{
 *     FileCacheId?: string,
 *     ClientRequestToken?: string,
 *     LustreConfiguration?: array{WeeklyMaintenanceStartTime?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFileCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFileCacheAsync(array{
 *     FileCacheId?: string,
 *     ClientRequestToken?: string,
 *     LustreConfiguration?: array{WeeklyMaintenanceStartTime?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFileSystem(array $args = [])
 * @phpstan-method \Aws\Result updateFileSystem(array{
 *     FileSystemId?: string,
 *     ClientRequestToken?: string,
 *     StorageCapacity?: int,
 *     WindowsConfiguration?: array{
 *         WeeklyMaintenanceStartTime?: string,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         ThroughputCapacity?: int,
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         AuditLogConfiguration?: array{
 *             FileAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             FileShareAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             AuditLogDestination?: string,
 *             ...,
 *         },
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         FsrmConfiguration?: array{FsrmServiceEnabled?: bool, EventLogDestination?: string, ...},
 *         ...,
 *     },
 *     LustreConfiguration?: array{
 *         WeeklyMaintenanceStartTime?: string,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         AutoImportPolicy?: 'NEW'|'NEW_CHANGED'|'NEW_CHANGED_DELETED'|'NONE',
 *         DataCompressionType?: 'LZ4'|'NONE',
 *         LogConfiguration?: array{Level?: 'DISABLED'|'ERROR_ONLY'|'WARN_ERROR'|'WARN_ONLY', Destination?: string, ...},
 *         RootSquashConfiguration?: array{RootSquash?: string, NoSquashNids?: list<string>, ...},
 *         PerUnitStorageThroughput?: int,
 *         MetadataConfiguration?: array{Iops?: int, Mode?: 'AUTOMATIC'|'USER_PROVISIONED', ...},
 *         ThroughputCapacity?: int,
 *         DataReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     OntapConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         DailyAutomaticBackupStartTime?: string,
 *         FsxAdminPassword?: string,
 *         WeeklyMaintenanceStartTime?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         ThroughputCapacity?: int,
 *         AddRouteTableIds?: list<string>,
 *         RemoveRouteTableIds?: list<string>,
 *         ThroughputCapacityPerHAPair?: int,
 *         HAPairs?: int,
 *         EndpointIpv6AddressRange?: string,
 *         ...,
 *     },
 *     OpenZFSConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         CopyTagsToVolumes?: bool,
 *         DailyAutomaticBackupStartTime?: string,
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         AddRouteTableIds?: list<string>,
 *         RemoveRouteTableIds?: list<string>,
 *         ReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         EndpointIpv6AddressRange?: string,
 *         ...,
 *     },
 *     StorageType?: 'HDD'|'INTELLIGENT_TIERING'|'SSD',
 *     FileSystemTypeVersion?: string,
 *     NetworkType?: 'DUAL'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFileSystemAsync(array{
 *     FileSystemId?: string,
 *     ClientRequestToken?: string,
 *     StorageCapacity?: int,
 *     WindowsConfiguration?: array{
 *         WeeklyMaintenanceStartTime?: string,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         ThroughputCapacity?: int,
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         AuditLogConfiguration?: array{
 *             FileAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             FileShareAccessAuditLogLevel?: 'DISABLED'|'FAILURE_ONLY'|'SUCCESS_AND_FAILURE'|'SUCCESS_ONLY',
 *             AuditLogDestination?: string,
 *             ...,
 *         },
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         FsrmConfiguration?: array{FsrmServiceEnabled?: bool, EventLogDestination?: string, ...},
 *         ...,
 *     },
 *     LustreConfiguration?: array{
 *         WeeklyMaintenanceStartTime?: string,
 *         DailyAutomaticBackupStartTime?: string,
 *         AutomaticBackupRetentionDays?: int,
 *         AutoImportPolicy?: 'NEW'|'NEW_CHANGED'|'NEW_CHANGED_DELETED'|'NONE',
 *         DataCompressionType?: 'LZ4'|'NONE',
 *         LogConfiguration?: array{Level?: 'DISABLED'|'ERROR_ONLY'|'WARN_ERROR'|'WARN_ONLY', Destination?: string, ...},
 *         RootSquashConfiguration?: array{RootSquash?: string, NoSquashNids?: list<string>, ...},
 *         PerUnitStorageThroughput?: int,
 *         MetadataConfiguration?: array{Iops?: int, Mode?: 'AUTOMATIC'|'USER_PROVISIONED', ...},
 *         ThroughputCapacity?: int,
 *         DataReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         ...,
 *     },
 *     OntapConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         DailyAutomaticBackupStartTime?: string,
 *         FsxAdminPassword?: string,
 *         WeeklyMaintenanceStartTime?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         ThroughputCapacity?: int,
 *         AddRouteTableIds?: list<string>,
 *         RemoveRouteTableIds?: list<string>,
 *         ThroughputCapacityPerHAPair?: int,
 *         HAPairs?: int,
 *         EndpointIpv6AddressRange?: string,
 *         ...,
 *     },
 *     OpenZFSConfiguration?: array{
 *         AutomaticBackupRetentionDays?: int,
 *         CopyTagsToBackups?: bool,
 *         CopyTagsToVolumes?: bool,
 *         DailyAutomaticBackupStartTime?: string,
 *         ThroughputCapacity?: int,
 *         WeeklyMaintenanceStartTime?: string,
 *         DiskIopsConfiguration?: array{Mode?: 'AUTOMATIC'|'USER_PROVISIONED', Iops?: int, ...},
 *         AddRouteTableIds?: list<string>,
 *         RemoveRouteTableIds?: list<string>,
 *         ReadCacheConfiguration?: array{SizingMode?: 'NO_CACHE'|'PROPORTIONAL_TO_THROUGHPUT_CAPACITY'|'USER_PROVISIONED', SizeGiB?: int, ...},
 *         EndpointIpv6AddressRange?: string,
 *         ...,
 *     },
 *     StorageType?: 'HDD'|'INTELLIGENT_TIERING'|'SSD',
 *     FileSystemTypeVersion?: string,
 *     NetworkType?: 'DUAL'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSharedVpcConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateSharedVpcConfiguration(array{EnableFsxRouteTableUpdatesFromParticipantAccounts?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSharedVpcConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSharedVpcConfigurationAsync(array{EnableFsxRouteTableUpdatesFromParticipantAccounts?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result updateSnapshot(array $args = [])
 * @phpstan-method \Aws\Result updateSnapshot(array{ClientRequestToken?: string, Name?: string, SnapshotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSnapshotAsync(array{ClientRequestToken?: string, Name?: string, SnapshotId?: string, ...} $args = [])
 * @method \Aws\Result updateStorageVirtualMachine(array $args = [])
 * @phpstan-method \Aws\Result updateStorageVirtualMachine(array{
 *     ActiveDirectoryConfiguration?: array{
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         NetBiosName?: string,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     StorageVirtualMachineId?: string,
 *     SvmAdminPassword?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStorageVirtualMachineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStorageVirtualMachineAsync(array{
 *     ActiveDirectoryConfiguration?: array{
 *         SelfManagedActiveDirectoryConfiguration?: array{
 *             UserName?: string,
 *             Password?: string,
 *             DnsIps?: list<string>,
 *             DomainName?: string,
 *             OrganizationalUnitDistinguishedName?: string,
 *             FileSystemAdministratorsGroup?: string,
 *             DomainJoinServiceAccountSecret?: string,
 *             ...,
 *         },
 *         NetBiosName?: string,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     StorageVirtualMachineId?: string,
 *     SvmAdminPassword?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVolume(array $args = [])
 * @phpstan-method \Aws\Result updateVolume(array{
 *     ClientRequestToken?: string,
 *     VolumeId?: string,
 *     OntapConfiguration?: array{
 *         JunctionPath?: string,
 *         SecurityStyle?: 'MIXED'|'NTFS'|'UNIX',
 *         SizeInMegabytes?: int,
 *         StorageEfficiencyEnabled?: bool,
 *         TieringPolicy?: array{CoolingPeriod?: int, Name?: 'ALL'|'AUTO'|'NONE'|'SNAPSHOT_ONLY', ...},
 *         SnapshotPolicy?: string,
 *         CopyTagsToBackups?: bool,
 *         SnaplockConfiguration?: array{
 *             AuditLogVolume?: bool,
 *             AutocommitPeriod?: array,
 *             PrivilegedDelete?: 'DISABLED'|'ENABLED'|'PERMANENTLY_DISABLED',
 *             RetentionPeriod?: array,
 *             VolumeAppendModeEnabled?: bool,
 *             ...,
 *         },
 *         SizeInBytes?: int,
 *         ...,
 *     },
 *     Name?: string,
 *     OpenZFSConfiguration?: array{
 *         StorageCapacityReservationGiB?: int,
 *         StorageCapacityQuotaGiB?: int,
 *         RecordSizeKiB?: int,
 *         DataCompressionType?: 'LZ4'|'NONE'|'ZSTD',
 *         NfsExports?: list<array>,
 *         UserAndGroupQuotas?: list<array>,
 *         ReadOnly?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVolumeAsync(array{
 *     ClientRequestToken?: string,
 *     VolumeId?: string,
 *     OntapConfiguration?: array{
 *         JunctionPath?: string,
 *         SecurityStyle?: 'MIXED'|'NTFS'|'UNIX',
 *         SizeInMegabytes?: int,
 *         StorageEfficiencyEnabled?: bool,
 *         TieringPolicy?: array{CoolingPeriod?: int, Name?: 'ALL'|'AUTO'|'NONE'|'SNAPSHOT_ONLY', ...},
 *         SnapshotPolicy?: string,
 *         CopyTagsToBackups?: bool,
 *         SnaplockConfiguration?: array{
 *             AuditLogVolume?: bool,
 *             AutocommitPeriod?: array,
 *             PrivilegedDelete?: 'DISABLED'|'ENABLED'|'PERMANENTLY_DISABLED',
 *             RetentionPeriod?: array,
 *             VolumeAppendModeEnabled?: bool,
 *             ...,
 *         },
 *         SizeInBytes?: int,
 *         ...,
 *     },
 *     Name?: string,
 *     OpenZFSConfiguration?: array{
 *         StorageCapacityReservationGiB?: int,
 *         StorageCapacityQuotaGiB?: int,
 *         RecordSizeKiB?: int,
 *         DataCompressionType?: 'LZ4'|'NONE'|'ZSTD',
 *         NfsExports?: list<array>,
 *         UserAndGroupQuotas?: list<array>,
 *         ReadOnly?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class FSxClient extends AwsClient {}
