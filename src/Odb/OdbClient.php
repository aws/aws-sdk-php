<?php
namespace Aws\Odb;

use Aws\AwsClient;

/**
 * This client is used to interact with the **odb** service.
 * @method \Aws\Result acceptMarketplaceRegistration(array $args = [])
 * @phpstan-method \Aws\Result acceptMarketplaceRegistration(array{marketplaceRegistrationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptMarketplaceRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptMarketplaceRegistrationAsync(array{marketplaceRegistrationToken?: string, ...} $args = [])
 * @method \Aws\Result associateIamRoleToResource(array $args = [])
 * @phpstan-method \Aws\Result associateIamRoleToResource(array{iamRoleArn?: string, awsIntegration?: 'KmsTde', resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateIamRoleToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateIamRoleToResourceAsync(array{iamRoleArn?: string, awsIntegration?: 'KmsTde', resourceArn?: string, ...} $args = [])
 * @method \Aws\Result createAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result createAutonomousDatabase(array{
 *     odbNetworkId?: string,
 *     displayName?: string,
 *     dbName?: string,
 *     adminPassword?: string,
 *     computeCount?: float,
 *     dataStorageSizeInTBs?: int,
 *     dataStorageSizeInGBs?: int,
 *     dbWorkload?: 'AJD'|'APEX'|'LH'|'OLTP',
 *     isAutoScalingEnabled?: bool,
 *     isAutoScalingForStorageEnabled?: bool,
 *     licenseModel?: 'BRING_YOUR_OWN_LICENSE'|'LICENSE_INCLUDED',
 *     characterSet?: string,
 *     ncharacterSet?: string,
 *     dbVersion?: string,
 *     databaseEdition?: 'ENTERPRISE_EDITION'|'STANDARD_EDITION',
 *     standbyAllowlistedIpsSource?: 'NOT_APPLICABLE'|'PRIMARY'|'SEPARATE',
 *     autonomousMaintenanceScheduleType?: 'EARLY'|'REGULAR',
 *     backupRetentionPeriodInDays?: int,
 *     byolComputeCountLimit?: float,
 *     cpuCoreCount?: int,
 *     customerContactsToSendToOCI?: list<array{email?: string, ...}>,
 *     privateEndpointIp?: string,
 *     privateEndpointLabel?: string,
 *     resourcePoolLeaderId?: string,
 *     resourcePoolSummary?: array{
 *         isDisabled?: bool,
 *         poolSize?: int,
 *         poolStorageSizeInTBs?: int,
 *         availableStorageCapacityInTBs?: float,
 *         totalComputeCapacity?: int,
 *         availableComputeCapacity?: int,
 *         ...,
 *     },
 *     scheduledOperations?: list<array{dayOfWeek?: array, scheduledStartTime?: string, scheduledStopTime?: string, ...}>,
 *     standbyAllowlistedIps?: list<string>,
 *     allowlistedIps?: list<string>,
 *     transportableTablespace?: array{ttsBundleUrl?: string, ...},
 *     isBackupRetentionLocked?: bool,
 *     isLocalDataGuardEnabled?: bool,
 *     isMtlsConnectionRequired?: bool,
 *     dbToolsDetails?: list<array{isEnabled?: bool, name?: string, computeCount?: float, maxIdleTimeInMinutes?: int, ...}>,
 *     source?: 'BACKUP_FROM_ID'|'BACKUP_FROM_TIMESTAMP'|'CLONE_TO_REFRESHABLE'|'CROSS_REGION_DATAGUARD'|'CROSS_REGION_DISASTER_RECOVERY'|'DATABASE'|'NONE',
 *     sourceConfiguration?: array{
 *         databaseClone?: array{sourceAutonomousDatabaseId?: string, cloneType?: 'FULL'|'METADATA'|'PARTIAL', ...},
 *         restoreFromBackup?: array{
 *             autonomousDatabaseBackupId?: string,
 *             cloneType?: 'FULL'|'METADATA'|'PARTIAL',
 *             cloneTableSpaceList?: list<int>,
 *             ...,
 *         },
 *         pointInTimeRestore?: array{
 *             sourceAutonomousDatabaseId?: string,
 *             cloneType?: 'FULL'|'METADATA'|'PARTIAL',
 *             timestamp?: int|string|\DateTimeInterface,
 *             useLatestAvailableBackupTimestamp?: bool,
 *             cloneTableSpaceList?: list<int>,
 *             ...,
 *         },
 *         crossRegionDataGuard?: array{sourceAutonomousDatabaseArn?: string, ...},
 *         crossRegionDisasterRecovery?: array{
 *             sourceAutonomousDatabaseArn?: string,
 *             remoteDisasterRecoveryType?: 'ADG'|'BACKUP_BASED',
 *             isReplicateAutomaticBackups?: bool,
 *             ...,
 *         },
 *         cloneToRefreshable?: array{
 *             sourceAutonomousDatabaseId?: string,
 *             refreshableMode?: 'AUTOMATIC'|'MANUAL',
 *             autoRefreshFrequencyInSeconds?: int,
 *             autoRefreshPointLagInSeconds?: int,
 *             timeOfAutoRefreshStart?: int|string|\DateTimeInterface,
 *             openMode?: 'READ_ONLY'|'READ_WRITE',
 *             cloneType?: 'FULL'|'METADATA'|'PARTIAL',
 *             ...,
 *         },
 *         ...,
 *     },
 *     encryptionKeyProvider?: 'AWS_KMS'|'ORACLE_MANAGED',
 *     encryptionKeyConfiguration?: array{
 *         awsEncryptionKey?: array{
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             kmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     adminPasswordSource?: 'API_REQUEST_PARAMETER'|'CUSTOMER_MANAGED_AWS_SECRET',
 *     adminPasswordSourceConfiguration?: array{
 *         customerManagedAwsSecret?: array{
 *             secretId?: string,
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutonomousDatabaseAsync(array{
 *     odbNetworkId?: string,
 *     displayName?: string,
 *     dbName?: string,
 *     adminPassword?: string,
 *     computeCount?: float,
 *     dataStorageSizeInTBs?: int,
 *     dataStorageSizeInGBs?: int,
 *     dbWorkload?: 'AJD'|'APEX'|'LH'|'OLTP',
 *     isAutoScalingEnabled?: bool,
 *     isAutoScalingForStorageEnabled?: bool,
 *     licenseModel?: 'BRING_YOUR_OWN_LICENSE'|'LICENSE_INCLUDED',
 *     characterSet?: string,
 *     ncharacterSet?: string,
 *     dbVersion?: string,
 *     databaseEdition?: 'ENTERPRISE_EDITION'|'STANDARD_EDITION',
 *     standbyAllowlistedIpsSource?: 'NOT_APPLICABLE'|'PRIMARY'|'SEPARATE',
 *     autonomousMaintenanceScheduleType?: 'EARLY'|'REGULAR',
 *     backupRetentionPeriodInDays?: int,
 *     byolComputeCountLimit?: float,
 *     cpuCoreCount?: int,
 *     customerContactsToSendToOCI?: list<array{email?: string, ...}>,
 *     privateEndpointIp?: string,
 *     privateEndpointLabel?: string,
 *     resourcePoolLeaderId?: string,
 *     resourcePoolSummary?: array{
 *         isDisabled?: bool,
 *         poolSize?: int,
 *         poolStorageSizeInTBs?: int,
 *         availableStorageCapacityInTBs?: float,
 *         totalComputeCapacity?: int,
 *         availableComputeCapacity?: int,
 *         ...,
 *     },
 *     scheduledOperations?: list<array{dayOfWeek?: array, scheduledStartTime?: string, scheduledStopTime?: string, ...}>,
 *     standbyAllowlistedIps?: list<string>,
 *     allowlistedIps?: list<string>,
 *     transportableTablespace?: array{ttsBundleUrl?: string, ...},
 *     isBackupRetentionLocked?: bool,
 *     isLocalDataGuardEnabled?: bool,
 *     isMtlsConnectionRequired?: bool,
 *     dbToolsDetails?: list<array{isEnabled?: bool, name?: string, computeCount?: float, maxIdleTimeInMinutes?: int, ...}>,
 *     source?: 'BACKUP_FROM_ID'|'BACKUP_FROM_TIMESTAMP'|'CLONE_TO_REFRESHABLE'|'CROSS_REGION_DATAGUARD'|'CROSS_REGION_DISASTER_RECOVERY'|'DATABASE'|'NONE',
 *     sourceConfiguration?: array{
 *         databaseClone?: array{sourceAutonomousDatabaseId?: string, cloneType?: 'FULL'|'METADATA'|'PARTIAL', ...},
 *         restoreFromBackup?: array{
 *             autonomousDatabaseBackupId?: string,
 *             cloneType?: 'FULL'|'METADATA'|'PARTIAL',
 *             cloneTableSpaceList?: list<int>,
 *             ...,
 *         },
 *         pointInTimeRestore?: array{
 *             sourceAutonomousDatabaseId?: string,
 *             cloneType?: 'FULL'|'METADATA'|'PARTIAL',
 *             timestamp?: int|string|\DateTimeInterface,
 *             useLatestAvailableBackupTimestamp?: bool,
 *             cloneTableSpaceList?: list<int>,
 *             ...,
 *         },
 *         crossRegionDataGuard?: array{sourceAutonomousDatabaseArn?: string, ...},
 *         crossRegionDisasterRecovery?: array{
 *             sourceAutonomousDatabaseArn?: string,
 *             remoteDisasterRecoveryType?: 'ADG'|'BACKUP_BASED',
 *             isReplicateAutomaticBackups?: bool,
 *             ...,
 *         },
 *         cloneToRefreshable?: array{
 *             sourceAutonomousDatabaseId?: string,
 *             refreshableMode?: 'AUTOMATIC'|'MANUAL',
 *             autoRefreshFrequencyInSeconds?: int,
 *             autoRefreshPointLagInSeconds?: int,
 *             timeOfAutoRefreshStart?: int|string|\DateTimeInterface,
 *             openMode?: 'READ_ONLY'|'READ_WRITE',
 *             cloneType?: 'FULL'|'METADATA'|'PARTIAL',
 *             ...,
 *         },
 *         ...,
 *     },
 *     encryptionKeyProvider?: 'AWS_KMS'|'ORACLE_MANAGED',
 *     encryptionKeyConfiguration?: array{
 *         awsEncryptionKey?: array{
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             kmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     adminPasswordSource?: 'API_REQUEST_PARAMETER'|'CUSTOMER_MANAGED_AWS_SECRET',
 *     adminPasswordSourceConfiguration?: array{
 *         customerManagedAwsSecret?: array{
 *             secretId?: string,
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutonomousDatabaseBackup(array $args = [])
 * @phpstan-method \Aws\Result createAutonomousDatabaseBackup(array{
 *     autonomousDatabaseId?: string,
 *     displayName?: string,
 *     retentionPeriodInDays?: int,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutonomousDatabaseBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutonomousDatabaseBackupAsync(array{
 *     autonomousDatabaseId?: string,
 *     displayName?: string,
 *     retentionPeriodInDays?: int,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutonomousDatabaseWallet(array $args = [])
 * @phpstan-method \Aws\Result createAutonomousDatabaseWallet(array{
 *     autonomousDatabaseId?: string,
 *     walletType?: 'INSTANCE'|'REGIONAL',
 *     password?: string,
 *     passwordSource?: 'API_REQUEST_PARAMETER'|'CUSTOMER_MANAGED_AWS_SECRET',
 *     passwordSourceConfiguration?: array{
 *         customerManagedAwsSecret?: array{
 *             secretId?: string,
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutonomousDatabaseWalletAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutonomousDatabaseWalletAsync(array{
 *     autonomousDatabaseId?: string,
 *     walletType?: 'INSTANCE'|'REGIONAL',
 *     password?: string,
 *     passwordSource?: 'API_REQUEST_PARAMETER'|'CUSTOMER_MANAGED_AWS_SECRET',
 *     passwordSourceConfiguration?: array{
 *         customerManagedAwsSecret?: array{
 *             secretId?: string,
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudAutonomousVmCluster(array $args = [])
 * @phpstan-method \Aws\Result createCloudAutonomousVmCluster(array{
 *     cloudExadataInfrastructureId?: string,
 *     odbNetworkId?: string,
 *     displayName?: string,
 *     clientToken?: string,
 *     autonomousDataStorageSizeInTBs?: float,
 *     cpuCoreCountPerNode?: int,
 *     dbServers?: list<string>,
 *     description?: string,
 *     isMtlsEnabledVmCluster?: bool,
 *     licenseModel?: 'BRING_YOUR_OWN_LICENSE'|'LICENSE_INCLUDED',
 *     maintenanceWindow?: array{
 *         customActionTimeoutInMins?: int,
 *         daysOfWeek?: list<array>,
 *         hoursOfDay?: list<int>,
 *         isCustomActionTimeoutEnabled?: bool,
 *         leadTimeInWeeks?: int,
 *         months?: list<array>,
 *         patchingMode?: 'NONROLLING'|'ROLLING',
 *         preference?: 'CUSTOM_PREFERENCE'|'NO_PREFERENCE',
 *         skipRu?: bool,
 *         weeksOfMonth?: list<int>,
 *         ...,
 *     },
 *     memoryPerOracleComputeUnitInGBs?: int,
 *     scanListenerPortNonTls?: int,
 *     scanListenerPortTls?: int,
 *     tags?: array<string, string>,
 *     timeZone?: string,
 *     totalContainerDatabases?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudAutonomousVmClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudAutonomousVmClusterAsync(array{
 *     cloudExadataInfrastructureId?: string,
 *     odbNetworkId?: string,
 *     displayName?: string,
 *     clientToken?: string,
 *     autonomousDataStorageSizeInTBs?: float,
 *     cpuCoreCountPerNode?: int,
 *     dbServers?: list<string>,
 *     description?: string,
 *     isMtlsEnabledVmCluster?: bool,
 *     licenseModel?: 'BRING_YOUR_OWN_LICENSE'|'LICENSE_INCLUDED',
 *     maintenanceWindow?: array{
 *         customActionTimeoutInMins?: int,
 *         daysOfWeek?: list<array>,
 *         hoursOfDay?: list<int>,
 *         isCustomActionTimeoutEnabled?: bool,
 *         leadTimeInWeeks?: int,
 *         months?: list<array>,
 *         patchingMode?: 'NONROLLING'|'ROLLING',
 *         preference?: 'CUSTOM_PREFERENCE'|'NO_PREFERENCE',
 *         skipRu?: bool,
 *         weeksOfMonth?: list<int>,
 *         ...,
 *     },
 *     memoryPerOracleComputeUnitInGBs?: int,
 *     scanListenerPortNonTls?: int,
 *     scanListenerPortTls?: int,
 *     tags?: array<string, string>,
 *     timeZone?: string,
 *     totalContainerDatabases?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudExadataInfrastructure(array $args = [])
 * @phpstan-method \Aws\Result createCloudExadataInfrastructure(array{
 *     displayName?: string,
 *     shape?: string,
 *     availabilityZone?: string,
 *     availabilityZoneId?: string,
 *     tags?: array<string, string>,
 *     computeCount?: int,
 *     customerContactsToSendToOCI?: list<array{email?: string, ...}>,
 *     maintenanceWindow?: array{
 *         customActionTimeoutInMins?: int,
 *         daysOfWeek?: list<array>,
 *         hoursOfDay?: list<int>,
 *         isCustomActionTimeoutEnabled?: bool,
 *         leadTimeInWeeks?: int,
 *         months?: list<array>,
 *         patchingMode?: 'NONROLLING'|'ROLLING',
 *         preference?: 'CUSTOM_PREFERENCE'|'NO_PREFERENCE',
 *         skipRu?: bool,
 *         weeksOfMonth?: list<int>,
 *         ...,
 *     },
 *     storageCount?: int,
 *     clientToken?: string,
 *     databaseServerType?: string,
 *     storageServerType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudExadataInfrastructureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudExadataInfrastructureAsync(array{
 *     displayName?: string,
 *     shape?: string,
 *     availabilityZone?: string,
 *     availabilityZoneId?: string,
 *     tags?: array<string, string>,
 *     computeCount?: int,
 *     customerContactsToSendToOCI?: list<array{email?: string, ...}>,
 *     maintenanceWindow?: array{
 *         customActionTimeoutInMins?: int,
 *         daysOfWeek?: list<array>,
 *         hoursOfDay?: list<int>,
 *         isCustomActionTimeoutEnabled?: bool,
 *         leadTimeInWeeks?: int,
 *         months?: list<array>,
 *         patchingMode?: 'NONROLLING'|'ROLLING',
 *         preference?: 'CUSTOM_PREFERENCE'|'NO_PREFERENCE',
 *         skipRu?: bool,
 *         weeksOfMonth?: list<int>,
 *         ...,
 *     },
 *     storageCount?: int,
 *     clientToken?: string,
 *     databaseServerType?: string,
 *     storageServerType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudVmCluster(array $args = [])
 * @phpstan-method \Aws\Result createCloudVmCluster(array{
 *     cloudExadataInfrastructureId?: string,
 *     cpuCoreCount?: int,
 *     displayName?: string,
 *     giVersion?: string,
 *     hostname?: string,
 *     sshPublicKeys?: list<string>,
 *     odbNetworkId?: string,
 *     clusterName?: string,
 *     dataCollectionOptions?: array{isDiagnosticsEventsEnabled?: bool, isHealthMonitoringEnabled?: bool, isIncidentLogsEnabled?: bool, ...},
 *     dataStorageSizeInTBs?: float,
 *     dbNodeStorageSizeInGBs?: int,
 *     dbServers?: list<string>,
 *     tags?: array<string, string>,
 *     isLocalBackupEnabled?: bool,
 *     isSparseDiskgroupEnabled?: bool,
 *     licenseModel?: 'BRING_YOUR_OWN_LICENSE'|'LICENSE_INCLUDED',
 *     memorySizeInGBs?: int,
 *     systemVersion?: string,
 *     timeZone?: string,
 *     clientToken?: string,
 *     scanListenerPortTcp?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudVmClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudVmClusterAsync(array{
 *     cloudExadataInfrastructureId?: string,
 *     cpuCoreCount?: int,
 *     displayName?: string,
 *     giVersion?: string,
 *     hostname?: string,
 *     sshPublicKeys?: list<string>,
 *     odbNetworkId?: string,
 *     clusterName?: string,
 *     dataCollectionOptions?: array{isDiagnosticsEventsEnabled?: bool, isHealthMonitoringEnabled?: bool, isIncidentLogsEnabled?: bool, ...},
 *     dataStorageSizeInTBs?: float,
 *     dbNodeStorageSizeInGBs?: int,
 *     dbServers?: list<string>,
 *     tags?: array<string, string>,
 *     isLocalBackupEnabled?: bool,
 *     isSparseDiskgroupEnabled?: bool,
 *     licenseModel?: 'BRING_YOUR_OWN_LICENSE'|'LICENSE_INCLUDED',
 *     memorySizeInGBs?: int,
 *     systemVersion?: string,
 *     timeZone?: string,
 *     clientToken?: string,
 *     scanListenerPortTcp?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOdbNetwork(array $args = [])
 * @phpstan-method \Aws\Result createOdbNetwork(array{
 *     displayName?: string,
 *     availabilityZone?: string,
 *     availabilityZoneId?: string,
 *     clientSubnetCidr?: string,
 *     backupSubnetCidr?: string,
 *     customDomainName?: string,
 *     defaultDnsPrefix?: string,
 *     clientToken?: string,
 *     s3Access?: 'DISABLED'|'ENABLED',
 *     zeroEtlAccess?: 'DISABLED'|'ENABLED',
 *     stsAccess?: 'DISABLED'|'ENABLED',
 *     kmsAccess?: 'DISABLED'|'ENABLED',
 *     s3PolicyDocument?: string,
 *     stsPolicyDocument?: string,
 *     kmsPolicyDocument?: string,
 *     crossRegionS3RestoreSourcesToEnable?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOdbNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOdbNetworkAsync(array{
 *     displayName?: string,
 *     availabilityZone?: string,
 *     availabilityZoneId?: string,
 *     clientSubnetCidr?: string,
 *     backupSubnetCidr?: string,
 *     customDomainName?: string,
 *     defaultDnsPrefix?: string,
 *     clientToken?: string,
 *     s3Access?: 'DISABLED'|'ENABLED',
 *     zeroEtlAccess?: 'DISABLED'|'ENABLED',
 *     stsAccess?: 'DISABLED'|'ENABLED',
 *     kmsAccess?: 'DISABLED'|'ENABLED',
 *     s3PolicyDocument?: string,
 *     stsPolicyDocument?: string,
 *     kmsPolicyDocument?: string,
 *     crossRegionS3RestoreSourcesToEnable?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOdbPeeringConnection(array $args = [])
 * @phpstan-method \Aws\Result createOdbPeeringConnection(array{
 *     odbNetworkId?: string,
 *     peerNetworkId?: string,
 *     displayName?: string,
 *     peerNetworkCidrsToBeAdded?: list<string>,
 *     peerNetworkRouteTableIds?: list<string>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOdbPeeringConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOdbPeeringConnectionAsync(array{
 *     odbNetworkId?: string,
 *     peerNetworkId?: string,
 *     displayName?: string,
 *     peerNetworkCidrsToBeAdded?: list<string>,
 *     peerNetworkRouteTableIds?: list<string>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result deleteAutonomousDatabase(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteAutonomousDatabaseBackup(array $args = [])
 * @phpstan-method \Aws\Result deleteAutonomousDatabaseBackup(array{autonomousDatabaseBackupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutonomousDatabaseBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutonomousDatabaseBackupAsync(array{autonomousDatabaseBackupId?: string, ...} $args = [])
 * @method \Aws\Result deleteCloudAutonomousVmCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCloudAutonomousVmCluster(array{cloudAutonomousVmClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCloudAutonomousVmClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCloudAutonomousVmClusterAsync(array{cloudAutonomousVmClusterId?: string, ...} $args = [])
 * @method \Aws\Result deleteCloudExadataInfrastructure(array $args = [])
 * @phpstan-method \Aws\Result deleteCloudExadataInfrastructure(array{cloudExadataInfrastructureId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCloudExadataInfrastructureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCloudExadataInfrastructureAsync(array{cloudExadataInfrastructureId?: string, ...} $args = [])
 * @method \Aws\Result deleteCloudVmCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCloudVmCluster(array{cloudVmClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCloudVmClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCloudVmClusterAsync(array{cloudVmClusterId?: string, ...} $args = [])
 * @method \Aws\Result deleteOdbNetwork(array $args = [])
 * @phpstan-method \Aws\Result deleteOdbNetwork(array{odbNetworkId?: string, deleteAssociatedResources?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOdbNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOdbNetworkAsync(array{odbNetworkId?: string, deleteAssociatedResources?: bool, ...} $args = [])
 * @method \Aws\Result deleteOdbPeeringConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteOdbPeeringConnection(array{odbPeeringConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOdbPeeringConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOdbPeeringConnectionAsync(array{odbPeeringConnectionId?: string, ...} $args = [])
 * @method \Aws\Result disassociateIamRoleFromResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateIamRoleFromResource(array{iamRoleArn?: string, awsIntegration?: 'KmsTde', resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateIamRoleFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateIamRoleFromResourceAsync(array{iamRoleArn?: string, awsIntegration?: 'KmsTde', resourceArn?: string, ...} $args = [])
 * @method \Aws\Result failoverAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result failoverAutonomousDatabase(array{autonomousDatabaseId?: string, peerDbArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise failoverAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise failoverAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, peerDbArn?: string, ...} $args = [])
 * @method \Aws\Result getAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result getAutonomousDatabase(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \Aws\Result getAutonomousDatabaseBackup(array $args = [])
 * @phpstan-method \Aws\Result getAutonomousDatabaseBackup(array{autonomousDatabaseBackupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutonomousDatabaseBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutonomousDatabaseBackupAsync(array{autonomousDatabaseBackupId?: string, ...} $args = [])
 * @method \Aws\Result getAutonomousDatabaseWalletDetails(array $args = [])
 * @phpstan-method \Aws\Result getAutonomousDatabaseWalletDetails(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutonomousDatabaseWalletDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutonomousDatabaseWalletDetailsAsync(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \Aws\Result getCloudAutonomousVmCluster(array $args = [])
 * @phpstan-method \Aws\Result getCloudAutonomousVmCluster(array{cloudAutonomousVmClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudAutonomousVmClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudAutonomousVmClusterAsync(array{cloudAutonomousVmClusterId?: string, ...} $args = [])
 * @method \Aws\Result getCloudExadataInfrastructure(array $args = [])
 * @phpstan-method \Aws\Result getCloudExadataInfrastructure(array{cloudExadataInfrastructureId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudExadataInfrastructureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudExadataInfrastructureAsync(array{cloudExadataInfrastructureId?: string, ...} $args = [])
 * @method \Aws\Result getCloudExadataInfrastructureUnallocatedResources(array $args = [])
 * @phpstan-method \Aws\Result getCloudExadataInfrastructureUnallocatedResources(array{cloudExadataInfrastructureId?: string, dbServers?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudExadataInfrastructureUnallocatedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudExadataInfrastructureUnallocatedResourcesAsync(array{cloudExadataInfrastructureId?: string, dbServers?: list<string>, ...} $args = [])
 * @method \Aws\Result getCloudVmCluster(array $args = [])
 * @phpstan-method \Aws\Result getCloudVmCluster(array{cloudVmClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudVmClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudVmClusterAsync(array{cloudVmClusterId?: string, ...} $args = [])
 * @method \Aws\Result getDbNode(array $args = [])
 * @phpstan-method \Aws\Result getDbNode(array{cloudVmClusterId?: string, dbNodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDbNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDbNodeAsync(array{cloudVmClusterId?: string, dbNodeId?: string, ...} $args = [])
 * @method \Aws\Result getDbServer(array $args = [])
 * @phpstan-method \Aws\Result getDbServer(array{cloudExadataInfrastructureId?: string, dbServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDbServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDbServerAsync(array{cloudExadataInfrastructureId?: string, dbServerId?: string, ...} $args = [])
 * @method \Aws\Result getOciOnboardingStatus(array $args = [])
 * @phpstan-method \Aws\Result getOciOnboardingStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOciOnboardingStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOciOnboardingStatusAsync(array{...} $args = [])
 * @method \Aws\Result getOdbNetwork(array $args = [])
 * @phpstan-method \Aws\Result getOdbNetwork(array{odbNetworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOdbNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOdbNetworkAsync(array{odbNetworkId?: string, ...} $args = [])
 * @method \Aws\Result getOdbPeeringConnection(array $args = [])
 * @phpstan-method \Aws\Result getOdbPeeringConnection(array{odbPeeringConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOdbPeeringConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOdbPeeringConnectionAsync(array{odbPeeringConnectionId?: string, ...} $args = [])
 * @method \Aws\Result initializeService(array $args = [])
 * @phpstan-method \Aws\Result initializeService(array{ociIdentityDomain?: bool, autonomousDatabaseOciAwsSecretsManagerIntegration?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise initializeServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initializeServiceAsync(array{ociIdentityDomain?: bool, autonomousDatabaseOciAwsSecretsManagerIntegration?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result listAutonomousDatabaseBackups(array $args = [])
 * @phpstan-method \Aws\Result listAutonomousDatabaseBackups(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     autonomousDatabaseId?: string,
 *     status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING',
 *     type?: 'CUMULATIVE_INCREMENTAL'|'FULL'|'INCREMENTAL'|'LONGTERM'|'ROLL_FORWARD_IMAGE_COPY'|'VIRTUAL_FULL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutonomousDatabaseBackupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutonomousDatabaseBackupsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     autonomousDatabaseId?: string,
 *     status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING',
 *     type?: 'CUMULATIVE_INCREMENTAL'|'FULL'|'INCREMENTAL'|'LONGTERM'|'ROLL_FORWARD_IMAGE_COPY'|'VIRTUAL_FULL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAutonomousDatabaseCharacterSets(array $args = [])
 * @phpstan-method \Aws\Result listAutonomousDatabaseCharacterSets(array{maxResults?: int, nextToken?: string, characterSetType?: 'DATABASE'|'NATIONAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutonomousDatabaseCharacterSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutonomousDatabaseCharacterSetsAsync(array{maxResults?: int, nextToken?: string, characterSetType?: 'DATABASE'|'NATIONAL', ...} $args = [])
 * @method \Aws\Result listAutonomousDatabaseClones(array $args = [])
 * @phpstan-method \Aws\Result listAutonomousDatabaseClones(array{maxResults?: int, nextToken?: string, autonomousDatabaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutonomousDatabaseClonesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutonomousDatabaseClonesAsync(array{maxResults?: int, nextToken?: string, autonomousDatabaseId?: string, ...} $args = [])
 * @method \Aws\Result listAutonomousDatabasePeers(array $args = [])
 * @phpstan-method \Aws\Result listAutonomousDatabasePeers(array{maxResults?: int, nextToken?: string, autonomousDatabaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutonomousDatabasePeersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutonomousDatabasePeersAsync(array{maxResults?: int, nextToken?: string, autonomousDatabaseId?: string, ...} $args = [])
 * @method \Aws\Result listAutonomousDatabaseVersions(array $args = [])
 * @phpstan-method \Aws\Result listAutonomousDatabaseVersions(array{maxResults?: int, nextToken?: string, dbWorkload?: 'AJD'|'APEX'|'LH'|'OLTP', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutonomousDatabaseVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutonomousDatabaseVersionsAsync(array{maxResults?: int, nextToken?: string, dbWorkload?: 'AJD'|'APEX'|'LH'|'OLTP', ...} $args = [])
 * @method \Aws\Result listAutonomousDatabases(array $args = [])
 * @phpstan-method \Aws\Result listAutonomousDatabases(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutonomousDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutonomousDatabasesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAutonomousVirtualMachines(array $args = [])
 * @phpstan-method \Aws\Result listAutonomousVirtualMachines(array{maxResults?: int, nextToken?: string, cloudAutonomousVmClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutonomousVirtualMachinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutonomousVirtualMachinesAsync(array{maxResults?: int, nextToken?: string, cloudAutonomousVmClusterId?: string, ...} $args = [])
 * @method \Aws\Result listCloudAutonomousVmClusters(array $args = [])
 * @phpstan-method \Aws\Result listCloudAutonomousVmClusters(array{maxResults?: int, nextToken?: string, cloudExadataInfrastructureId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCloudAutonomousVmClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCloudAutonomousVmClustersAsync(array{maxResults?: int, nextToken?: string, cloudExadataInfrastructureId?: string, ...} $args = [])
 * @method \Aws\Result listCloudExadataInfrastructures(array $args = [])
 * @phpstan-method \Aws\Result listCloudExadataInfrastructures(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCloudExadataInfrastructuresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCloudExadataInfrastructuresAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCloudVmClusters(array $args = [])
 * @phpstan-method \Aws\Result listCloudVmClusters(array{maxResults?: int, nextToken?: string, cloudExadataInfrastructureId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCloudVmClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCloudVmClustersAsync(array{maxResults?: int, nextToken?: string, cloudExadataInfrastructureId?: string, ...} $args = [])
 * @method \Aws\Result listDbNodes(array $args = [])
 * @phpstan-method \Aws\Result listDbNodes(array{maxResults?: int, nextToken?: string, cloudVmClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDbNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDbNodesAsync(array{maxResults?: int, nextToken?: string, cloudVmClusterId?: string, ...} $args = [])
 * @method \Aws\Result listDbServers(array $args = [])
 * @phpstan-method \Aws\Result listDbServers(array{cloudExadataInfrastructureId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDbServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDbServersAsync(array{cloudExadataInfrastructureId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDbSystemShapes(array $args = [])
 * @phpstan-method \Aws\Result listDbSystemShapes(array{maxResults?: int, nextToken?: string, availabilityZone?: string, availabilityZoneId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDbSystemShapesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDbSystemShapesAsync(array{maxResults?: int, nextToken?: string, availabilityZone?: string, availabilityZoneId?: string, ...} $args = [])
 * @method \Aws\Result listGiVersions(array $args = [])
 * @phpstan-method \Aws\Result listGiVersions(array{maxResults?: int, nextToken?: string, shape?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGiVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGiVersionsAsync(array{maxResults?: int, nextToken?: string, shape?: string, ...} $args = [])
 * @method \Aws\Result listOdbNetworks(array $args = [])
 * @phpstan-method \Aws\Result listOdbNetworks(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOdbNetworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOdbNetworksAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listOdbPeeringConnections(array $args = [])
 * @phpstan-method \Aws\Result listOdbPeeringConnections(array{maxResults?: int, nextToken?: string, odbNetworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOdbPeeringConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOdbPeeringConnectionsAsync(array{maxResults?: int, nextToken?: string, odbNetworkId?: string, ...} $args = [])
 * @method \Aws\Result listSystemVersions(array $args = [])
 * @phpstan-method \Aws\Result listSystemVersions(array{maxResults?: int, nextToken?: string, giVersion?: string, shape?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSystemVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSystemVersionsAsync(array{maxResults?: int, nextToken?: string, giVersion?: string, shape?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result rebootAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result rebootAutonomousDatabase(array{autonomousDatabaseId?: string, isOnlineReboot?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, isOnlineReboot?: bool, ...} $args = [])
 * @method \Aws\Result rebootDbNode(array $args = [])
 * @phpstan-method \Aws\Result rebootDbNode(array{cloudVmClusterId?: string, dbNodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootDbNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootDbNodeAsync(array{cloudVmClusterId?: string, dbNodeId?: string, ...} $args = [])
 * @method \Aws\Result restoreAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result restoreAutonomousDatabase(array{autonomousDatabaseId?: string, timestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, timestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result shrinkAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result shrinkAutonomousDatabase(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise shrinkAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise shrinkAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \Aws\Result startAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result startAutonomousDatabase(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \Aws\Result startDbNode(array $args = [])
 * @phpstan-method \Aws\Result startDbNode(array{cloudVmClusterId?: string, dbNodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDbNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDbNodeAsync(array{cloudVmClusterId?: string, dbNodeId?: string, ...} $args = [])
 * @method \Aws\Result stopAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result stopAutonomousDatabase(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, ...} $args = [])
 * @method \Aws\Result stopDbNode(array $args = [])
 * @phpstan-method \Aws\Result stopDbNode(array{cloudVmClusterId?: string, dbNodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDbNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDbNodeAsync(array{cloudVmClusterId?: string, dbNodeId?: string, ...} $args = [])
 * @method \Aws\Result switchoverAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result switchoverAutonomousDatabase(array{autonomousDatabaseId?: string, peerDbArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise switchoverAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise switchoverAutonomousDatabaseAsync(array{autonomousDatabaseId?: string, peerDbArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAutonomousDatabase(array $args = [])
 * @phpstan-method \Aws\Result updateAutonomousDatabase(array{
 *     autonomousDatabaseId?: string,
 *     adminPassword?: string,
 *     computeCount?: float,
 *     cpuCoreCount?: int,
 *     dataStorageSizeInTBs?: int,
 *     dataStorageSizeInGBs?: int,
 *     displayName?: string,
 *     dbName?: string,
 *     dbVersion?: string,
 *     dbWorkload?: 'AJD'|'APEX'|'LH'|'OLTP',
 *     dbToolsDetails?: list<array{isEnabled?: bool, name?: string, computeCount?: float, maxIdleTimeInMinutes?: int, ...}>,
 *     databaseEdition?: 'ENTERPRISE_EDITION'|'STANDARD_EDITION',
 *     licenseModel?: 'BRING_YOUR_OWN_LICENSE'|'LICENSE_INCLUDED',
 *     isAutoScalingEnabled?: bool,
 *     isAutoScalingForStorageEnabled?: bool,
 *     isBackupRetentionLocked?: bool,
 *     isLocalDataGuardEnabled?: bool,
 *     isMtlsConnectionRequired?: bool,
 *     isRefreshableClone?: bool,
 *     isDisconnectPeer?: bool,
 *     backupRetentionPeriodInDays?: int,
 *     byolComputeCountLimit?: float,
 *     localAdgAutoFailoverMaxDataLossLimit?: int,
 *     autonomousMaintenanceScheduleType?: 'EARLY'|'REGULAR',
 *     customerContactsToSendToOCI?: list<array{email?: string, ...}>,
 *     scheduledOperations?: list<array{dayOfWeek?: array, scheduledStartTime?: string, scheduledStopTime?: string, ...}>,
 *     longTermBackupSchedule?: array{
 *         isDisabled?: bool,
 *         repeatCadence?: 'MONTHLY'|'ONE_TIME'|'WEEKLY'|'YEARLY',
 *         retentionPeriodInDays?: int,
 *         timeOfBackup?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     openMode?: 'READ_ONLY'|'READ_WRITE',
 *     permissionLevel?: 'RESTRICTED'|'UNRESTRICTED',
 *     refreshableMode?: 'AUTOMATIC'|'MANUAL',
 *     privateEndpointIp?: string,
 *     privateEndpointLabel?: string,
 *     peerDbId?: string,
 *     resourcePoolLeaderId?: string,
 *     resourcePoolSummary?: array{
 *         isDisabled?: bool,
 *         poolSize?: int,
 *         poolStorageSizeInTBs?: int,
 *         availableStorageCapacityInTBs?: float,
 *         totalComputeCapacity?: int,
 *         availableComputeCapacity?: int,
 *         ...,
 *     },
 *     standbyAllowlistedIpsSource?: 'NOT_APPLICABLE'|'PRIMARY'|'SEPARATE',
 *     standbyAllowlistedIps?: list<string>,
 *     allowlistedIps?: list<string>,
 *     autoRefreshFrequencyInSeconds?: int,
 *     autoRefreshPointLagInSeconds?: int,
 *     timeOfAutoRefreshStart?: int|string|\DateTimeInterface,
 *     encryptionKeyProvider?: 'AWS_KMS'|'ORACLE_MANAGED',
 *     encryptionKeyConfiguration?: array{
 *         awsEncryptionKey?: array{
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             kmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     adminPasswordSource?: 'API_REQUEST_PARAMETER'|'CUSTOMER_MANAGED_AWS_SECRET',
 *     adminPasswordSourceConfiguration?: array{
 *         customerManagedAwsSecret?: array{
 *             secretId?: string,
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutonomousDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutonomousDatabaseAsync(array{
 *     autonomousDatabaseId?: string,
 *     adminPassword?: string,
 *     computeCount?: float,
 *     cpuCoreCount?: int,
 *     dataStorageSizeInTBs?: int,
 *     dataStorageSizeInGBs?: int,
 *     displayName?: string,
 *     dbName?: string,
 *     dbVersion?: string,
 *     dbWorkload?: 'AJD'|'APEX'|'LH'|'OLTP',
 *     dbToolsDetails?: list<array{isEnabled?: bool, name?: string, computeCount?: float, maxIdleTimeInMinutes?: int, ...}>,
 *     databaseEdition?: 'ENTERPRISE_EDITION'|'STANDARD_EDITION',
 *     licenseModel?: 'BRING_YOUR_OWN_LICENSE'|'LICENSE_INCLUDED',
 *     isAutoScalingEnabled?: bool,
 *     isAutoScalingForStorageEnabled?: bool,
 *     isBackupRetentionLocked?: bool,
 *     isLocalDataGuardEnabled?: bool,
 *     isMtlsConnectionRequired?: bool,
 *     isRefreshableClone?: bool,
 *     isDisconnectPeer?: bool,
 *     backupRetentionPeriodInDays?: int,
 *     byolComputeCountLimit?: float,
 *     localAdgAutoFailoverMaxDataLossLimit?: int,
 *     autonomousMaintenanceScheduleType?: 'EARLY'|'REGULAR',
 *     customerContactsToSendToOCI?: list<array{email?: string, ...}>,
 *     scheduledOperations?: list<array{dayOfWeek?: array, scheduledStartTime?: string, scheduledStopTime?: string, ...}>,
 *     longTermBackupSchedule?: array{
 *         isDisabled?: bool,
 *         repeatCadence?: 'MONTHLY'|'ONE_TIME'|'WEEKLY'|'YEARLY',
 *         retentionPeriodInDays?: int,
 *         timeOfBackup?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     openMode?: 'READ_ONLY'|'READ_WRITE',
 *     permissionLevel?: 'RESTRICTED'|'UNRESTRICTED',
 *     refreshableMode?: 'AUTOMATIC'|'MANUAL',
 *     privateEndpointIp?: string,
 *     privateEndpointLabel?: string,
 *     peerDbId?: string,
 *     resourcePoolLeaderId?: string,
 *     resourcePoolSummary?: array{
 *         isDisabled?: bool,
 *         poolSize?: int,
 *         poolStorageSizeInTBs?: int,
 *         availableStorageCapacityInTBs?: float,
 *         totalComputeCapacity?: int,
 *         availableComputeCapacity?: int,
 *         ...,
 *     },
 *     standbyAllowlistedIpsSource?: 'NOT_APPLICABLE'|'PRIMARY'|'SEPARATE',
 *     standbyAllowlistedIps?: list<string>,
 *     allowlistedIps?: list<string>,
 *     autoRefreshFrequencyInSeconds?: int,
 *     autoRefreshPointLagInSeconds?: int,
 *     timeOfAutoRefreshStart?: int|string|\DateTimeInterface,
 *     encryptionKeyProvider?: 'AWS_KMS'|'ORACLE_MANAGED',
 *     encryptionKeyConfiguration?: array{
 *         awsEncryptionKey?: array{
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             kmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     adminPasswordSource?: 'API_REQUEST_PARAMETER'|'CUSTOMER_MANAGED_AWS_SECRET',
 *     adminPasswordSourceConfiguration?: array{
 *         customerManagedAwsSecret?: array{
 *             secretId?: string,
 *             iamRoleArn?: string,
 *             externalIdType?: 'compartment_ocid'|'database_ocid'|'tenant_ocid',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAutonomousDatabaseBackup(array $args = [])
 * @phpstan-method \Aws\Result updateAutonomousDatabaseBackup(array{autonomousDatabaseBackupId?: string, retentionPeriodInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutonomousDatabaseBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutonomousDatabaseBackupAsync(array{autonomousDatabaseBackupId?: string, retentionPeriodInDays?: int, ...} $args = [])
 * @method \Aws\Result updateCloudExadataInfrastructure(array $args = [])
 * @phpstan-method \Aws\Result updateCloudExadataInfrastructure(array{
 *     cloudExadataInfrastructureId?: string,
 *     maintenanceWindow?: array{
 *         customActionTimeoutInMins?: int,
 *         daysOfWeek?: list<array>,
 *         hoursOfDay?: list<int>,
 *         isCustomActionTimeoutEnabled?: bool,
 *         leadTimeInWeeks?: int,
 *         months?: list<array>,
 *         patchingMode?: 'NONROLLING'|'ROLLING',
 *         preference?: 'CUSTOM_PREFERENCE'|'NO_PREFERENCE',
 *         skipRu?: bool,
 *         weeksOfMonth?: list<int>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCloudExadataInfrastructureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCloudExadataInfrastructureAsync(array{
 *     cloudExadataInfrastructureId?: string,
 *     maintenanceWindow?: array{
 *         customActionTimeoutInMins?: int,
 *         daysOfWeek?: list<array>,
 *         hoursOfDay?: list<int>,
 *         isCustomActionTimeoutEnabled?: bool,
 *         leadTimeInWeeks?: int,
 *         months?: list<array>,
 *         patchingMode?: 'NONROLLING'|'ROLLING',
 *         preference?: 'CUSTOM_PREFERENCE'|'NO_PREFERENCE',
 *         skipRu?: bool,
 *         weeksOfMonth?: list<int>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOdbNetwork(array $args = [])
 * @phpstan-method \Aws\Result updateOdbNetwork(array{
 *     odbNetworkId?: string,
 *     displayName?: string,
 *     peeredCidrsToBeAdded?: list<string>,
 *     peeredCidrsToBeRemoved?: list<string>,
 *     s3Access?: 'DISABLED'|'ENABLED',
 *     zeroEtlAccess?: 'DISABLED'|'ENABLED',
 *     stsAccess?: 'DISABLED'|'ENABLED',
 *     kmsAccess?: 'DISABLED'|'ENABLED',
 *     s3PolicyDocument?: string,
 *     stsPolicyDocument?: string,
 *     kmsPolicyDocument?: string,
 *     crossRegionS3RestoreSourcesToEnable?: list<string>,
 *     crossRegionS3RestoreSourcesToDisable?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOdbNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOdbNetworkAsync(array{
 *     odbNetworkId?: string,
 *     displayName?: string,
 *     peeredCidrsToBeAdded?: list<string>,
 *     peeredCidrsToBeRemoved?: list<string>,
 *     s3Access?: 'DISABLED'|'ENABLED',
 *     zeroEtlAccess?: 'DISABLED'|'ENABLED',
 *     stsAccess?: 'DISABLED'|'ENABLED',
 *     kmsAccess?: 'DISABLED'|'ENABLED',
 *     s3PolicyDocument?: string,
 *     stsPolicyDocument?: string,
 *     kmsPolicyDocument?: string,
 *     crossRegionS3RestoreSourcesToEnable?: list<string>,
 *     crossRegionS3RestoreSourcesToDisable?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOdbPeeringConnection(array $args = [])
 * @phpstan-method \Aws\Result updateOdbPeeringConnection(array{
 *     odbPeeringConnectionId?: string,
 *     displayName?: string,
 *     peerNetworkCidrsToBeAdded?: list<string>,
 *     peerNetworkCidrsToBeRemoved?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOdbPeeringConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOdbPeeringConnectionAsync(array{
 *     odbPeeringConnectionId?: string,
 *     displayName?: string,
 *     peerNetworkCidrsToBeAdded?: list<string>,
 *     peerNetworkCidrsToBeRemoved?: list<string>,
 *     ...,
 * } $args = [])
 */
class OdbClient extends AwsClient {}
