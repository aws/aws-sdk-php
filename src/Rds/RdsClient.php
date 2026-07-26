<?php
namespace Aws\Rds;

use Aws\AwsClient;
use Aws\Api\Service;
use Aws\Api\DocModel;
use Aws\Api\ApiProvider;
use Aws\PresignUrlMiddleware;

/**
 * This client is used to interact with the **Amazon Relational Database Service (Amazon RDS)**.
 *
 * @method \Aws\Result addSourceIdentifierToSubscription(array $args = [])
 * @phpstan-method \Aws\Result addSourceIdentifierToSubscription(array{SubscriptionName?: string, SourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addSourceIdentifierToSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addSourceIdentifierToSubscriptionAsync(array{SubscriptionName?: string, SourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addTagsToResource(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result authorizeDBSecurityGroupIngress(array $args = [])
 * @phpstan-method \Aws\Result authorizeDBSecurityGroupIngress(array{
 *     DBSecurityGroupName?: string,
 *     CIDRIP?: string,
 *     EC2SecurityGroupName?: string,
 *     EC2SecurityGroupId?: string,
 *     EC2SecurityGroupOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeDBSecurityGroupIngressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeDBSecurityGroupIngressAsync(array{
 *     DBSecurityGroupName?: string,
 *     CIDRIP?: string,
 *     EC2SecurityGroupName?: string,
 *     EC2SecurityGroupId?: string,
 *     EC2SecurityGroupOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyDBParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result copyDBParameterGroup(array{
 *     SourceDBParameterGroupIdentifier?: string,
 *     TargetDBParameterGroupIdentifier?: string,
 *     TargetDBParameterGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyDBParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyDBParameterGroupAsync(array{
 *     SourceDBParameterGroupIdentifier?: string,
 *     TargetDBParameterGroupIdentifier?: string,
 *     TargetDBParameterGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyDBSnapshot(array $args = [])
 * @phpstan-method \Aws\Result copyDBSnapshot(array{
 *     SourceDBSnapshotIdentifier?: string,
 *     TargetDBSnapshotIdentifier?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CopyTags?: bool,
 *     PreSignedUrl?: string,
 *     OptionGroupName?: string,
 *     TargetCustomAvailabilityZone?: string,
 *     SnapshotTarget?: string,
 *     CopyOptionGroup?: bool,
 *     SnapshotAvailabilityZone?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyDBSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyDBSnapshotAsync(array{
 *     SourceDBSnapshotIdentifier?: string,
 *     TargetDBSnapshotIdentifier?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CopyTags?: bool,
 *     PreSignedUrl?: string,
 *     OptionGroupName?: string,
 *     TargetCustomAvailabilityZone?: string,
 *     SnapshotTarget?: string,
 *     CopyOptionGroup?: bool,
 *     SnapshotAvailabilityZone?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyOptionGroup(array $args = [])
 * @phpstan-method \Aws\Result copyOptionGroup(array{
 *     SourceOptionGroupIdentifier?: string,
 *     TargetOptionGroupIdentifier?: string,
 *     TargetOptionGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyOptionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyOptionGroupAsync(array{
 *     SourceOptionGroupIdentifier?: string,
 *     TargetOptionGroupIdentifier?: string,
 *     TargetOptionGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBInstance(array $args = [])
 * @phpstan-method \Aws\Result createDBInstance(array{
 *     DBName?: string,
 *     DBInstanceIdentifier?: string,
 *     AllocatedStorage?: int,
 *     DBInstanceClass?: string,
 *     Engine?: string,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     DBSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     AvailabilityZone?: string,
 *     DBSubnetGroupName?: string,
 *     PreferredMaintenanceWindow?: string,
 *     DBParameterGroupName?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     Port?: int,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     CharacterSetName?: string,
 *     NcharCharacterSetName?: string,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DBClusterIdentifier?: string,
 *     StorageType?: string,
 *     TdeCredentialArn?: string,
 *     TdeCredentialPassword?: string,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     Domain?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     CopyTagsToSnapshot?: bool,
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     DomainIAMRoleName?: string,
 *     PromotionTier?: int,
 *     Timezone?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     DeletionProtection?: bool,
 *     MaxAllocatedStorage?: int,
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     BackupTarget?: string,
 *     CustomIamInstanceProfile?: string,
 *     DBSystemId?: string,
 *     CACertificateIdentifier?: string,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     MultiTenant?: bool,
 *     DedicatedLogVolume?: bool,
 *     EngineLifecycleSupport?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     MasterUserAuthenticationType?: 'iam-db-auth'|'password',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBInstanceAsync(array{
 *     DBName?: string,
 *     DBInstanceIdentifier?: string,
 *     AllocatedStorage?: int,
 *     DBInstanceClass?: string,
 *     Engine?: string,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     DBSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     AvailabilityZone?: string,
 *     DBSubnetGroupName?: string,
 *     PreferredMaintenanceWindow?: string,
 *     DBParameterGroupName?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     Port?: int,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     CharacterSetName?: string,
 *     NcharCharacterSetName?: string,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DBClusterIdentifier?: string,
 *     StorageType?: string,
 *     TdeCredentialArn?: string,
 *     TdeCredentialPassword?: string,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     Domain?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     CopyTagsToSnapshot?: bool,
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     DomainIAMRoleName?: string,
 *     PromotionTier?: int,
 *     Timezone?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     DeletionProtection?: bool,
 *     MaxAllocatedStorage?: int,
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     BackupTarget?: string,
 *     CustomIamInstanceProfile?: string,
 *     DBSystemId?: string,
 *     CACertificateIdentifier?: string,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     MultiTenant?: bool,
 *     DedicatedLogVolume?: bool,
 *     EngineLifecycleSupport?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     MasterUserAuthenticationType?: 'iam-db-auth'|'password',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBInstanceReadReplica(array $args = [])
 * @phpstan-method \Aws\Result createDBInstanceReadReplica(array{
 *     DBInstanceIdentifier?: string,
 *     SourceDBInstanceIdentifier?: string,
 *     DBInstanceClass?: string,
 *     AvailabilityZone?: string,
 *     Port?: int,
 *     MultiAZ?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     DBParameterGroupName?: string,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DBSubnetGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     StorageType?: string,
 *     CopyTagsToSnapshot?: bool,
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DeletionProtection?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     ReplicaMode?: 'mounted'|'open-read-only',
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     MaxAllocatedStorage?: int,
 *     BackupTarget?: string,
 *     CustomIamInstanceProfile?: string,
 *     AllocatedStorage?: int,
 *     SourceDBClusterIdentifier?: string,
 *     DedicatedLogVolume?: bool,
 *     UpgradeStorageConfig?: bool,
 *     CACertificateIdentifier?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBInstanceReadReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBInstanceReadReplicaAsync(array{
 *     DBInstanceIdentifier?: string,
 *     SourceDBInstanceIdentifier?: string,
 *     DBInstanceClass?: string,
 *     AvailabilityZone?: string,
 *     Port?: int,
 *     MultiAZ?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     DBParameterGroupName?: string,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DBSubnetGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     StorageType?: string,
 *     CopyTagsToSnapshot?: bool,
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DeletionProtection?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     ReplicaMode?: 'mounted'|'open-read-only',
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     MaxAllocatedStorage?: int,
 *     BackupTarget?: string,
 *     CustomIamInstanceProfile?: string,
 *     AllocatedStorage?: int,
 *     SourceDBClusterIdentifier?: string,
 *     DedicatedLogVolume?: bool,
 *     UpgradeStorageConfig?: bool,
 *     CACertificateIdentifier?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result createDBParameterGroup(array{
 *     DBParameterGroupName?: string,
 *     DBParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBParameterGroupAsync(array{
 *     DBParameterGroupName?: string,
 *     DBParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result createDBSecurityGroup(array{
 *     DBSecurityGroupName?: string,
 *     DBSecurityGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBSecurityGroupAsync(array{
 *     DBSecurityGroupName?: string,
 *     DBSecurityGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createDBSnapshot(array{
 *     DBSnapshotIdentifier?: string,
 *     DBInstanceIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBSnapshotAsync(array{
 *     DBSnapshotIdentifier?: string,
 *     DBInstanceIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result createDBSubnetGroup(array{
 *     DBSubnetGroupName?: string,
 *     DBSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBSubnetGroupAsync(array{
 *     DBSubnetGroupName?: string,
 *     DBSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result createEventSubscription(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     EventCategories?: list<string>,
 *     SourceIds?: list<string>,
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     EventCategories?: list<string>,
 *     SourceIds?: list<string>,
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOptionGroup(array $args = [])
 * @phpstan-method \Aws\Result createOptionGroup(array{
 *     OptionGroupName?: string,
 *     EngineName?: string,
 *     MajorEngineVersion?: string,
 *     OptionGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOptionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOptionGroupAsync(array{
 *     OptionGroupName?: string,
 *     EngineName?: string,
 *     MajorEngineVersion?: string,
 *     OptionGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDBInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteDBInstance(array{
 *     DBInstanceIdentifier?: string,
 *     SkipFinalSnapshot?: bool,
 *     FinalDBSnapshotIdentifier?: string,
 *     DeleteAutomatedBackups?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBInstanceAsync(array{
 *     DBInstanceIdentifier?: string,
 *     SkipFinalSnapshot?: bool,
 *     FinalDBSnapshotIdentifier?: string,
 *     DeleteAutomatedBackups?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDBParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDBParameterGroup(array{DBParameterGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBParameterGroupAsync(array{DBParameterGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteDBSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDBSecurityGroup(array{DBSecurityGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBSecurityGroupAsync(array{DBSecurityGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteDBSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteDBSnapshot(array{DBSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBSnapshotAsync(array{DBSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDBSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDBSubnetGroup(array{DBSubnetGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBSubnetGroupAsync(array{DBSubnetGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteEventSubscription(array{SubscriptionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array{SubscriptionName?: string, ...} $args = [])
 * @method \Aws\Result deleteOptionGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteOptionGroup(array{OptionGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOptionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOptionGroupAsync(array{OptionGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeDBEngineVersions(array $args = [])
 * @phpstan-method \Aws\Result describeDBEngineVersions(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DefaultOnly?: bool,
 *     ListSupportedCharacterSets?: bool,
 *     ListSupportedTimezones?: bool,
 *     IncludeAll?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBEngineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBEngineVersionsAsync(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DefaultOnly?: bool,
 *     ListSupportedCharacterSets?: bool,
 *     ListSupportedTimezones?: bool,
 *     IncludeAll?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBInstances(array $args = [])
 * @phpstan-method \Aws\Result describeDBInstances(array{
 *     DBInstanceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBInstancesAsync(array{
 *     DBInstanceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBLogFiles(array $args = [])
 * @phpstan-method \Aws\Result describeDBLogFiles(array{
 *     DBInstanceIdentifier?: string,
 *     FilenameContains?: string,
 *     FileLastWritten?: int,
 *     FileSize?: int,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBLogFilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBLogFilesAsync(array{
 *     DBInstanceIdentifier?: string,
 *     FilenameContains?: string,
 *     FileLastWritten?: int,
 *     FileSize?: int,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBParameterGroups(array $args = [])
 * @phpstan-method \Aws\Result describeDBParameterGroups(array{
 *     DBParameterGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBParameterGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBParameterGroupsAsync(array{
 *     DBParameterGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBParameters(array $args = [])
 * @phpstan-method \Aws\Result describeDBParameters(array{
 *     DBParameterGroupName?: string,
 *     Source?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBParametersAsync(array{
 *     DBParameterGroupName?: string,
 *     Source?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBSecurityGroups(array $args = [])
 * @phpstan-method \Aws\Result describeDBSecurityGroups(array{
 *     DBSecurityGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBSecurityGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBSecurityGroupsAsync(array{
 *     DBSecurityGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeDBSnapshots(array{
 *     DBInstanceIdentifier?: string,
 *     DBSnapshotIdentifier?: string,
 *     SnapshotType?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     IncludeShared?: bool,
 *     IncludePublic?: bool,
 *     DbiResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBSnapshotsAsync(array{
 *     DBInstanceIdentifier?: string,
 *     DBSnapshotIdentifier?: string,
 *     SnapshotType?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     IncludeShared?: bool,
 *     IncludePublic?: bool,
 *     DbiResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBSubnetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeDBSubnetGroups(array{
 *     DBSubnetGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBSubnetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBSubnetGroupsAsync(array{
 *     DBSubnetGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEngineDefaultParameters(array $args = [])
 * @phpstan-method \Aws\Result describeEngineDefaultParameters(array{
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEngineDefaultParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEngineDefaultParametersAsync(array{
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEventCategories(array $args = [])
 * @phpstan-method \Aws\Result describeEventCategories(array{SourceType?: string, Filters?: list<array{Name?: string, Values?: list<string>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array{SourceType?: string, Filters?: list<array{Name?: string, Values?: list<string>, ...}>, ...} $args = [])
 * @method \Aws\Result describeEventSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result describeEventSubscriptions(array{
 *     SubscriptionName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array{
 *     SubscriptionName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     SourceIdentifier?: string,
 *     SourceType?: 'blue-green-deployment'|'custom-engine-version'|'db-cluster'|'db-cluster-snapshot'|'db-instance'|'db-parameter-group'|'db-proxy'|'db-security-group'|'db-shard-group'|'db-snapshot'|'zero-etl',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     EventCategories?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsAsync(array{
 *     SourceIdentifier?: string,
 *     SourceType?: 'blue-green-deployment'|'custom-engine-version'|'db-cluster'|'db-cluster-snapshot'|'db-instance'|'db-parameter-group'|'db-proxy'|'db-security-group'|'db-shard-group'|'db-snapshot'|'zero-etl',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     EventCategories?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOptionGroupOptions(array $args = [])
 * @phpstan-method \Aws\Result describeOptionGroupOptions(array{
 *     EngineName?: string,
 *     MajorEngineVersion?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOptionGroupOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOptionGroupOptionsAsync(array{
 *     EngineName?: string,
 *     MajorEngineVersion?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOptionGroups(array $args = [])
 * @phpstan-method \Aws\Result describeOptionGroups(array{
 *     OptionGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     EngineName?: string,
 *     MajorEngineVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOptionGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOptionGroupsAsync(array{
 *     OptionGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     EngineName?: string,
 *     MajorEngineVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOrderableDBInstanceOptions(array $args = [])
 * @phpstan-method \Aws\Result describeOrderableDBInstanceOptions(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DBInstanceClass?: string,
 *     LicenseModel?: string,
 *     AvailabilityZoneGroup?: string,
 *     Vpc?: bool,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrderableDBInstanceOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrderableDBInstanceOptionsAsync(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DBInstanceClass?: string,
 *     LicenseModel?: string,
 *     AvailabilityZoneGroup?: string,
 *     Vpc?: bool,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReservedDBInstances(array $args = [])
 * @phpstan-method \Aws\Result describeReservedDBInstances(array{
 *     ReservedDBInstanceId?: string,
 *     ReservedDBInstancesOfferingId?: string,
 *     DBInstanceClass?: string,
 *     Duration?: string,
 *     ProductDescription?: string,
 *     OfferingType?: string,
 *     MultiAZ?: bool,
 *     LeaseId?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedDBInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedDBInstancesAsync(array{
 *     ReservedDBInstanceId?: string,
 *     ReservedDBInstancesOfferingId?: string,
 *     DBInstanceClass?: string,
 *     Duration?: string,
 *     ProductDescription?: string,
 *     OfferingType?: string,
 *     MultiAZ?: bool,
 *     LeaseId?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReservedDBInstancesOfferings(array $args = [])
 * @phpstan-method \Aws\Result describeReservedDBInstancesOfferings(array{
 *     ReservedDBInstancesOfferingId?: string,
 *     DBInstanceClass?: string,
 *     Duration?: string,
 *     ProductDescription?: string,
 *     OfferingType?: string,
 *     MultiAZ?: bool,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedDBInstancesOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedDBInstancesOfferingsAsync(array{
 *     ReservedDBInstancesOfferingId?: string,
 *     DBInstanceClass?: string,
 *     Duration?: string,
 *     ProductDescription?: string,
 *     OfferingType?: string,
 *     MultiAZ?: bool,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result downloadDBLogFilePortion(array $args = [])
 * @phpstan-method \Aws\Result downloadDBLogFilePortion(array{DBInstanceIdentifier?: string, LogFileName?: string, Marker?: string, NumberOfLines?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise downloadDBLogFilePortionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise downloadDBLogFilePortionAsync(array{DBInstanceIdentifier?: string, LogFileName?: string, Marker?: string, NumberOfLines?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceName?: string, Filters?: list<array{Name?: string, Values?: list<string>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceName?: string, Filters?: list<array{Name?: string, Values?: list<string>, ...}>, ...} $args = [])
 * @method \Aws\Result modifyDBInstance(array $args = [])
 * @phpstan-method \Aws\Result modifyDBInstance(array{
 *     DBInstanceIdentifier?: string,
 *     AllocatedStorage?: int,
 *     DBInstanceClass?: string,
 *     DBSubnetGroupName?: string,
 *     DBSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     ApplyImmediately?: bool,
 *     MasterUserPassword?: string,
 *     DBParameterGroupName?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     NewDBInstanceIdentifier?: string,
 *     StorageType?: string,
 *     TdeCredentialArn?: string,
 *     TdeCredentialPassword?: string,
 *     CACertificateIdentifier?: string,
 *     Domain?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     DisableDomain?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     MonitoringInterval?: int,
 *     DBPortNumber?: int,
 *     PubliclyAccessible?: bool,
 *     MonitoringRoleArn?: string,
 *     DomainIAMRoleName?: string,
 *     PromotionTier?: int,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     CloudwatchLogsExportConfiguration?: array{EnableLogTypes?: list<string>, DisableLogTypes?: list<string>, ...},
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DeletionProtection?: bool,
 *     MaxAllocatedStorage?: int,
 *     CertificateRotationRestart?: bool,
 *     ReplicaMode?: 'mounted'|'open-read-only',
 *     AutomationMode?: 'all-paused'|'full',
 *     ResumeFullAutomationModeMinutes?: int,
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     AwsBackupRecoveryPointArn?: string,
 *     ManageMasterUserPassword?: bool,
 *     RotateMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     MultiTenant?: bool,
 *     DedicatedLogVolume?: bool,
 *     Engine?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         SetForDelete?: bool,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     MasterUserAuthenticationType?: 'iam-db-auth'|'password',
 *     EngineLifecycleSupport?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBInstanceAsync(array{
 *     DBInstanceIdentifier?: string,
 *     AllocatedStorage?: int,
 *     DBInstanceClass?: string,
 *     DBSubnetGroupName?: string,
 *     DBSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     ApplyImmediately?: bool,
 *     MasterUserPassword?: string,
 *     DBParameterGroupName?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     NewDBInstanceIdentifier?: string,
 *     StorageType?: string,
 *     TdeCredentialArn?: string,
 *     TdeCredentialPassword?: string,
 *     CACertificateIdentifier?: string,
 *     Domain?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     DisableDomain?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     MonitoringInterval?: int,
 *     DBPortNumber?: int,
 *     PubliclyAccessible?: bool,
 *     MonitoringRoleArn?: string,
 *     DomainIAMRoleName?: string,
 *     PromotionTier?: int,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     CloudwatchLogsExportConfiguration?: array{EnableLogTypes?: list<string>, DisableLogTypes?: list<string>, ...},
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DeletionProtection?: bool,
 *     MaxAllocatedStorage?: int,
 *     CertificateRotationRestart?: bool,
 *     ReplicaMode?: 'mounted'|'open-read-only',
 *     AutomationMode?: 'all-paused'|'full',
 *     ResumeFullAutomationModeMinutes?: int,
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     AwsBackupRecoveryPointArn?: string,
 *     ManageMasterUserPassword?: bool,
 *     RotateMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     MultiTenant?: bool,
 *     DedicatedLogVolume?: bool,
 *     Engine?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         SetForDelete?: bool,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     MasterUserAuthenticationType?: 'iam-db-auth'|'password',
 *     EngineLifecycleSupport?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyDBParameterGroup(array{
 *     DBParameterGroupName?: string,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         SupportedEngineModes?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBParameterGroupAsync(array{
 *     DBParameterGroupName?: string,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         SupportedEngineModes?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyDBSubnetGroup(array{DBSubnetGroupName?: string, DBSubnetGroupDescription?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBSubnetGroupAsync(array{DBSubnetGroupName?: string, DBSubnetGroupDescription?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result modifyEventSubscription(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     EventCategories?: list<string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     EventCategories?: list<string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyOptionGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyOptionGroup(array{
 *     OptionGroupName?: string,
 *     OptionsToInclude?: list<array{
 *         OptionName?: string,
 *         Port?: int,
 *         OptionVersion?: string,
 *         DBSecurityGroupMemberships?: list<string>,
 *         VpcSecurityGroupMemberships?: list<string>,
 *         OptionSettings?: list<array>,
 *         ...,
 *     }>,
 *     OptionsToRemove?: list<string>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyOptionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyOptionGroupAsync(array{
 *     OptionGroupName?: string,
 *     OptionsToInclude?: list<array{
 *         OptionName?: string,
 *         Port?: int,
 *         OptionVersion?: string,
 *         DBSecurityGroupMemberships?: list<string>,
 *         VpcSecurityGroupMemberships?: list<string>,
 *         OptionSettings?: list<array>,
 *         ...,
 *     }>,
 *     OptionsToRemove?: list<string>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result promoteReadReplica(array $args = [])
 * @phpstan-method \Aws\Result promoteReadReplica(array{
 *     DBInstanceIdentifier?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise promoteReadReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise promoteReadReplicaAsync(array{
 *     DBInstanceIdentifier?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result purchaseReservedDBInstancesOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseReservedDBInstancesOffering(array{
 *     ReservedDBInstancesOfferingId?: string,
 *     ReservedDBInstanceId?: string,
 *     DBInstanceCount?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseReservedDBInstancesOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseReservedDBInstancesOfferingAsync(array{
 *     ReservedDBInstancesOfferingId?: string,
 *     ReservedDBInstanceId?: string,
 *     DBInstanceCount?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rebootDBInstance(array $args = [])
 * @phpstan-method \Aws\Result rebootDBInstance(array{DBInstanceIdentifier?: string, ForceFailover?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootDBInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootDBInstanceAsync(array{DBInstanceIdentifier?: string, ForceFailover?: bool, ...} $args = [])
 * @method \Aws\Result removeSourceIdentifierFromSubscription(array $args = [])
 * @phpstan-method \Aws\Result removeSourceIdentifierFromSubscription(array{SubscriptionName?: string, SourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeSourceIdentifierFromSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeSourceIdentifierFromSubscriptionAsync(array{SubscriptionName?: string, SourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromResource(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result resetDBParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result resetDBParameterGroup(array{
 *     DBParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         SupportedEngineModes?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resetDBParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetDBParameterGroupAsync(array{
 *     DBParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         SupportedEngineModes?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDBInstanceFromDBSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreDBInstanceFromDBSnapshot(array{
 *     DBInstanceIdentifier?: string,
 *     DBSnapshotIdentifier?: string,
 *     DBInstanceClass?: string,
 *     Port?: int,
 *     AvailabilityZone?: string,
 *     DBSubnetGroupName?: string,
 *     MultiAZ?: bool,
 *     PubliclyAccessible?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     DBName?: string,
 *     Engine?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageType?: string,
 *     TdeCredentialArn?: string,
 *     TdeCredentialPassword?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Domain?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     CopyTagsToSnapshot?: bool,
 *     DomainIAMRoleName?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DBParameterGroupName?: string,
 *     DeletionProtection?: bool,
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     BackupTarget?: string,
 *     CustomIamInstanceProfile?: string,
 *     AllocatedStorage?: int,
 *     DBClusterSnapshotIdentifier?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     DedicatedLogVolume?: bool,
 *     CACertificateIdentifier?: string,
 *     EngineLifecycleSupport?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDBInstanceFromDBSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDBInstanceFromDBSnapshotAsync(array{
 *     DBInstanceIdentifier?: string,
 *     DBSnapshotIdentifier?: string,
 *     DBInstanceClass?: string,
 *     Port?: int,
 *     AvailabilityZone?: string,
 *     DBSubnetGroupName?: string,
 *     MultiAZ?: bool,
 *     PubliclyAccessible?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     DBName?: string,
 *     Engine?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageType?: string,
 *     TdeCredentialArn?: string,
 *     TdeCredentialPassword?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Domain?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     CopyTagsToSnapshot?: bool,
 *     DomainIAMRoleName?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DBParameterGroupName?: string,
 *     DeletionProtection?: bool,
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     BackupTarget?: string,
 *     CustomIamInstanceProfile?: string,
 *     AllocatedStorage?: int,
 *     DBClusterSnapshotIdentifier?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     DedicatedLogVolume?: bool,
 *     CACertificateIdentifier?: string,
 *     EngineLifecycleSupport?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDBInstanceToPointInTime(array $args = [])
 * @phpstan-method \Aws\Result restoreDBInstanceToPointInTime(array{
 *     SourceDBInstanceIdentifier?: string,
 *     TargetDBInstanceIdentifier?: string,
 *     RestoreTime?: int|string|\DateTimeInterface,
 *     UseLatestRestorableTime?: bool,
 *     DBInstanceClass?: string,
 *     Port?: int,
 *     AvailabilityZone?: string,
 *     DBSubnetGroupName?: string,
 *     MultiAZ?: bool,
 *     PubliclyAccessible?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     DBName?: string,
 *     Engine?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     CopyTagsToSnapshot?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageType?: string,
 *     TdeCredentialArn?: string,
 *     TdeCredentialPassword?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DBParameterGroupName?: string,
 *     DeletionProtection?: bool,
 *     SourceDbiResourceId?: string,
 *     MaxAllocatedStorage?: int,
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     SourceDBInstanceAutomatedBackupsArn?: string,
 *     BackupTarget?: string,
 *     CustomIamInstanceProfile?: string,
 *     AllocatedStorage?: int,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     DedicatedLogVolume?: bool,
 *     CACertificateIdentifier?: string,
 *     EngineLifecycleSupport?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDBInstanceToPointInTimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDBInstanceToPointInTimeAsync(array{
 *     SourceDBInstanceIdentifier?: string,
 *     TargetDBInstanceIdentifier?: string,
 *     RestoreTime?: int|string|\DateTimeInterface,
 *     UseLatestRestorableTime?: bool,
 *     DBInstanceClass?: string,
 *     Port?: int,
 *     AvailabilityZone?: string,
 *     DBSubnetGroupName?: string,
 *     MultiAZ?: bool,
 *     PubliclyAccessible?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     DBName?: string,
 *     Engine?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     CopyTagsToSnapshot?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageType?: string,
 *     TdeCredentialArn?: string,
 *     TdeCredentialPassword?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     DomainFqdn?: string,
 *     DomainOu?: string,
 *     DomainAuthSecretArn?: string,
 *     DomainDnsIps?: list<string>,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DBParameterGroupName?: string,
 *     DeletionProtection?: bool,
 *     SourceDbiResourceId?: string,
 *     MaxAllocatedStorage?: int,
 *     EnableCustomerOwnedIp?: bool,
 *     NetworkType?: string,
 *     SourceDBInstanceAutomatedBackupsArn?: string,
 *     BackupTarget?: string,
 *     CustomIamInstanceProfile?: string,
 *     AllocatedStorage?: int,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     DedicatedLogVolume?: bool,
 *     CACertificateIdentifier?: string,
 *     EngineLifecycleSupport?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result revokeDBSecurityGroupIngress(array $args = [])
 * @phpstan-method \Aws\Result revokeDBSecurityGroupIngress(array{
 *     DBSecurityGroupName?: string,
 *     CIDRIP?: string,
 *     EC2SecurityGroupName?: string,
 *     EC2SecurityGroupId?: string,
 *     EC2SecurityGroupOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeDBSecurityGroupIngressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeDBSecurityGroupIngressAsync(array{
 *     DBSecurityGroupName?: string,
 *     CIDRIP?: string,
 *     EC2SecurityGroupName?: string,
 *     EC2SecurityGroupId?: string,
 *     EC2SecurityGroupOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addRoleToDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result addRoleToDBCluster(array{DBClusterIdentifier?: string, RoleArn?: string, FeatureName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addRoleToDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise addRoleToDBClusterAsync(array{DBClusterIdentifier?: string, RoleArn?: string, FeatureName?: string, ...} $args = [])
 * @method \Aws\Result addRoleToDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result addRoleToDBInstance(array{DBInstanceIdentifier?: string, RoleArn?: string, FeatureName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addRoleToDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise addRoleToDBInstanceAsync(array{DBInstanceIdentifier?: string, RoleArn?: string, FeatureName?: string, ...} $args = [])
 * @method \Aws\Result applyPendingMaintenanceAction(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result applyPendingMaintenanceAction(array{ResourceIdentifier?: string, ApplyAction?: string, OptInType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array{ResourceIdentifier?: string, ApplyAction?: string, OptInType?: string, ...} $args = [])
 * @method \Aws\Result backtrackDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result backtrackDBCluster(array{
 *     DBClusterIdentifier?: string,
 *     BacktrackTo?: int|string|\DateTimeInterface,
 *     Force?: bool,
 *     UseEarliestTimeOnPointInTimeUnavailable?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise backtrackDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise backtrackDBClusterAsync(array{
 *     DBClusterIdentifier?: string,
 *     BacktrackTo?: int|string|\DateTimeInterface,
 *     Force?: bool,
 *     UseEarliestTimeOnPointInTimeUnavailable?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelExportTask(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result cancelExportTask(array{ExportTaskIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelExportTaskAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelExportTaskAsync(array{ExportTaskIdentifier?: string, ...} $args = [])
 * @method \Aws\Result copyDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result copyDBClusterParameterGroup(array{
 *     SourceDBClusterParameterGroupIdentifier?: string,
 *     TargetDBClusterParameterGroupIdentifier?: string,
 *     TargetDBClusterParameterGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise copyDBClusterParameterGroupAsync(array{
 *     SourceDBClusterParameterGroupIdentifier?: string,
 *     TargetDBClusterParameterGroupIdentifier?: string,
 *     TargetDBClusterParameterGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result copyDBClusterSnapshot(array{
 *     SourceDBClusterSnapshotIdentifier?: string,
 *     TargetDBClusterSnapshotIdentifier?: string,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     CopyTags?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise copyDBClusterSnapshotAsync(array{
 *     SourceDBClusterSnapshotIdentifier?: string,
 *     TargetDBClusterSnapshotIdentifier?: string,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     CopyTags?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBlueGreenDeployment(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createBlueGreenDeployment(array{
 *     BlueGreenDeploymentName?: string,
 *     Source?: string,
 *     TargetEngineVersion?: string,
 *     TargetDBParameterGroupName?: string,
 *     TargetDBClusterParameterGroupName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TargetDBInstanceClass?: string,
 *     UpgradeTargetStorageConfig?: bool,
 *     TargetIops?: int,
 *     TargetStorageType?: string,
 *     TargetAllocatedStorage?: int,
 *     TargetStorageThroughput?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBlueGreenDeploymentAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createBlueGreenDeploymentAsync(array{
 *     BlueGreenDeploymentName?: string,
 *     Source?: string,
 *     TargetEngineVersion?: string,
 *     TargetDBParameterGroupName?: string,
 *     TargetDBClusterParameterGroupName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TargetDBInstanceClass?: string,
 *     UpgradeTargetStorageConfig?: bool,
 *     TargetIops?: int,
 *     TargetStorageType?: string,
 *     TargetAllocatedStorage?: int,
 *     TargetStorageThroughput?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createCustomDBEngineVersion(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DatabaseInstallationFilesS3BucketName?: string,
 *     DatabaseInstallationFilesS3Prefix?: string,
 *     DatabaseInstallationFiles?: list<string>,
 *     ImageId?: string,
 *     KMSKeyId?: string,
 *     SourceCustomDbEngineVersionIdentifier?: string,
 *     UseAwsProvidedLatestImage?: bool,
 *     Description?: string,
 *     Manifest?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomDBEngineVersionAsync(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DatabaseInstallationFilesS3BucketName?: string,
 *     DatabaseInstallationFilesS3Prefix?: string,
 *     DatabaseInstallationFiles?: list<string>,
 *     ImageId?: string,
 *     KMSKeyId?: string,
 *     SourceCustomDbEngineVersionIdentifier?: string,
 *     UseAwsProvidedLatestImage?: bool,
 *     Description?: string,
 *     Manifest?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createDBCluster(array{
 *     AvailabilityZones?: list<string>,
 *     BackupRetentionPeriod?: int,
 *     CharacterSetName?: string,
 *     DatabaseName?: string,
 *     DBClusterIdentifier?: string,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     DBSubnetGroupName?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     OptionGroupName?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     ReplicationSourceIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     BacktrackWindow?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     EngineMode?: string,
 *     ScalingConfiguration?: array{
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         AutoPause?: bool,
 *         SecondsUntilAutoPause?: int,
 *         TimeoutAction?: string,
 *         SecondsBeforeTimeout?: int,
 *         ...,
 *     },
 *     RdsCustomClusterConfiguration?: array{
 *         InterconnectSubnetId?: string,
 *         TransitGatewayMulticastDomainId?: string,
 *         ReplicaMode?: 'mounted'|'open-read-only',
 *         ...,
 *     },
 *     DBClusterInstanceClass?: string,
 *     AllocatedStorage?: int,
 *     StorageType?: string,
 *     Iops?: int,
 *     PubliclyAccessible?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     DeletionProtection?: bool,
 *     GlobalClusterIdentifier?: string,
 *     EnableHttpEndpoint?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     EnableGlobalWriteForwarding?: bool,
 *     NetworkType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     EnableLimitlessDatabase?: bool,
 *     ClusterScalabilityType?: 'limitless'|'standard',
 *     DBSystemId?: string,
 *     ManageMasterUserPassword?: bool,
 *     EnableLocalWriteForwarding?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     CACertificateIdentifier?: string,
 *     EngineLifecycleSupport?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     MasterUserAuthenticationType?: 'iam-db-auth'|'password',
 *     WithExpressConfiguration?: bool,
 *     AssociatedRoles?: list<array{RoleArn?: string, FeatureName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBClusterAsync(array{
 *     AvailabilityZones?: list<string>,
 *     BackupRetentionPeriod?: int,
 *     CharacterSetName?: string,
 *     DatabaseName?: string,
 *     DBClusterIdentifier?: string,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     DBSubnetGroupName?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     OptionGroupName?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     ReplicationSourceIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     BacktrackWindow?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     EngineMode?: string,
 *     ScalingConfiguration?: array{
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         AutoPause?: bool,
 *         SecondsUntilAutoPause?: int,
 *         TimeoutAction?: string,
 *         SecondsBeforeTimeout?: int,
 *         ...,
 *     },
 *     RdsCustomClusterConfiguration?: array{
 *         InterconnectSubnetId?: string,
 *         TransitGatewayMulticastDomainId?: string,
 *         ReplicaMode?: 'mounted'|'open-read-only',
 *         ...,
 *     },
 *     DBClusterInstanceClass?: string,
 *     AllocatedStorage?: int,
 *     StorageType?: string,
 *     Iops?: int,
 *     PubliclyAccessible?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     DeletionProtection?: bool,
 *     GlobalClusterIdentifier?: string,
 *     EnableHttpEndpoint?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     EnableGlobalWriteForwarding?: bool,
 *     NetworkType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     EnableLimitlessDatabase?: bool,
 *     ClusterScalabilityType?: 'limitless'|'standard',
 *     DBSystemId?: string,
 *     ManageMasterUserPassword?: bool,
 *     EnableLocalWriteForwarding?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     CACertificateIdentifier?: string,
 *     EngineLifecycleSupport?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     MasterUserAuthenticationType?: 'iam-db-auth'|'password',
 *     WithExpressConfiguration?: bool,
 *     AssociatedRoles?: list<array{RoleArn?: string, FeatureName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createDBClusterEndpoint(array{
 *     DBClusterIdentifier?: string,
 *     DBClusterEndpointIdentifier?: string,
 *     EndpointType?: string,
 *     StaticMembers?: list<string>,
 *     ExcludedMembers?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBClusterEndpointAsync(array{
 *     DBClusterIdentifier?: string,
 *     DBClusterEndpointIdentifier?: string,
 *     EndpointType?: string,
 *     StaticMembers?: list<string>,
 *     ExcludedMembers?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createDBClusterParameterGroup(array{
 *     DBClusterParameterGroupName?: string,
 *     DBParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBClusterParameterGroupAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     DBParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createDBClusterSnapshot(array{
 *     DBClusterSnapshotIdentifier?: string,
 *     DBClusterIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBClusterSnapshotAsync(array{
 *     DBClusterSnapshotIdentifier?: string,
 *     DBClusterIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createDBProxy(array{
 *     DBProxyName?: string,
 *     EngineFamily?: 'MYSQL'|'POSTGRESQL'|'SQLSERVER',
 *     DefaultAuthScheme?: 'IAM_AUTH'|'NONE',
 *     Auth?: list<array{
 *         Description?: string,
 *         UserName?: string,
 *         AuthScheme?: 'SECRETS',
 *         SecretArn?: string,
 *         IAMAuth?: 'DISABLED'|'ENABLED'|'REQUIRED',
 *         ClientPasswordAuthType?: 'MYSQL_CACHING_SHA2_PASSWORD'|'MYSQL_NATIVE_PASSWORD'|'POSTGRES_MD5'|'POSTGRES_SCRAM_SHA_256'|'SQL_SERVER_AUTHENTICATION',
 *         ...,
 *     }>,
 *     RoleArn?: string,
 *     VpcSubnetIds?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     RequireTLS?: bool,
 *     IdleClientTimeout?: int,
 *     DebugLogging?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EndpointNetworkType?: 'DUAL'|'IPV4'|'IPV6',
 *     TargetConnectionNetworkType?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBProxyAsync(array{
 *     DBProxyName?: string,
 *     EngineFamily?: 'MYSQL'|'POSTGRESQL'|'SQLSERVER',
 *     DefaultAuthScheme?: 'IAM_AUTH'|'NONE',
 *     Auth?: list<array{
 *         Description?: string,
 *         UserName?: string,
 *         AuthScheme?: 'SECRETS',
 *         SecretArn?: string,
 *         IAMAuth?: 'DISABLED'|'ENABLED'|'REQUIRED',
 *         ClientPasswordAuthType?: 'MYSQL_CACHING_SHA2_PASSWORD'|'MYSQL_NATIVE_PASSWORD'|'POSTGRES_MD5'|'POSTGRES_SCRAM_SHA_256'|'SQL_SERVER_AUTHENTICATION',
 *         ...,
 *     }>,
 *     RoleArn?: string,
 *     VpcSubnetIds?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     RequireTLS?: bool,
 *     IdleClientTimeout?: int,
 *     DebugLogging?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EndpointNetworkType?: 'DUAL'|'IPV4'|'IPV6',
 *     TargetConnectionNetworkType?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createDBProxyEndpoint(array{
 *     DBProxyName?: string,
 *     DBProxyEndpointName?: string,
 *     VpcSubnetIds?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     TargetRole?: 'READ_ONLY'|'READ_WRITE',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EndpointNetworkType?: 'DUAL'|'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBProxyEndpointAsync(array{
 *     DBProxyName?: string,
 *     DBProxyEndpointName?: string,
 *     VpcSubnetIds?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     TargetRole?: 'READ_ONLY'|'READ_WRITE',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EndpointNetworkType?: 'DUAL'|'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBShardGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createDBShardGroup(array{
 *     DBShardGroupIdentifier?: string,
 *     DBClusterIdentifier?: string,
 *     ComputeRedundancy?: int,
 *     MaxACU?: float,
 *     MinACU?: float,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBShardGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBShardGroupAsync(array{
 *     DBShardGroupIdentifier?: string,
 *     DBClusterIdentifier?: string,
 *     ComputeRedundancy?: int,
 *     MaxACU?: float,
 *     MinACU?: float,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createGlobalCluster(array{
 *     GlobalClusterIdentifier?: string,
 *     SourceDBClusterIdentifier?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     EngineLifecycleSupport?: string,
 *     DeletionProtection?: bool,
 *     DatabaseName?: string,
 *     StorageEncrypted?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlobalClusterAsync(array{
 *     GlobalClusterIdentifier?: string,
 *     SourceDBClusterIdentifier?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     EngineLifecycleSupport?: string,
 *     DeletionProtection?: bool,
 *     DatabaseName?: string,
 *     StorageEncrypted?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegration(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createIntegration(array{
 *     SourceArn?: string,
 *     TargetArn?: string,
 *     IntegrationName?: string,
 *     KMSKeyId?: string,
 *     AdditionalEncryptionContext?: array<string, string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataFilter?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationAsync(array{
 *     SourceArn?: string,
 *     TargetArn?: string,
 *     IntegrationName?: string,
 *     KMSKeyId?: string,
 *     AdditionalEncryptionContext?: array<string, string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataFilter?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTenantDatabase(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result createTenantDatabase(array{
 *     DBInstanceIdentifier?: string,
 *     TenantDBName?: string,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     CharacterSetName?: string,
 *     NcharCharacterSetName?: string,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTenantDatabaseAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createTenantDatabaseAsync(array{
 *     DBInstanceIdentifier?: string,
 *     TenantDBName?: string,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     CharacterSetName?: string,
 *     NcharCharacterSetName?: string,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBlueGreenDeployment(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteBlueGreenDeployment(array{BlueGreenDeploymentIdentifier?: string, DeleteTarget?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBlueGreenDeploymentAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBlueGreenDeploymentAsync(array{BlueGreenDeploymentIdentifier?: string, DeleteTarget?: bool, ...} $args = [])
 * @method \Aws\Result deleteCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteCustomDBEngineVersion(array{Engine?: string, EngineVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomDBEngineVersionAsync(array{Engine?: string, EngineVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBCluster(array{
 *     DBClusterIdentifier?: string,
 *     SkipFinalSnapshot?: bool,
 *     FinalDBSnapshotIdentifier?: string,
 *     DeleteAutomatedBackups?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBClusterAsync(array{
 *     DBClusterIdentifier?: string,
 *     SkipFinalSnapshot?: bool,
 *     FinalDBSnapshotIdentifier?: string,
 *     DeleteAutomatedBackups?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDBClusterAutomatedBackup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBClusterAutomatedBackup(array{DbClusterResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBClusterAutomatedBackupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBClusterAutomatedBackupAsync(array{DbClusterResourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBClusterEndpoint(array{DBClusterEndpointIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBClusterEndpointAsync(array{DBClusterEndpointIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBClusterParameterGroup(array{DBClusterParameterGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBClusterParameterGroupAsync(array{DBClusterParameterGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBClusterSnapshot(array{DBClusterSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBClusterSnapshotAsync(array{DBClusterSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDBInstanceAutomatedBackup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBInstanceAutomatedBackup(array{DbiResourceId?: string, DBInstanceAutomatedBackupsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBInstanceAutomatedBackupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBInstanceAutomatedBackupAsync(array{DbiResourceId?: string, DBInstanceAutomatedBackupsArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBProxy(array{DBProxyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBProxyAsync(array{DBProxyName?: string, ...} $args = [])
 * @method \Aws\Result deleteDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBProxyEndpoint(array{DBProxyEndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBProxyEndpointAsync(array{DBProxyEndpointName?: string, ...} $args = [])
 * @method \Aws\Result deleteDBShardGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteDBShardGroup(array{DBShardGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBShardGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBShardGroupAsync(array{DBShardGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteGlobalCluster(array{GlobalClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlobalClusterAsync(array{GlobalClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteIntegration(array{IntegrationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{IntegrationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTenantDatabase(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deleteTenantDatabase(array{
 *     DBInstanceIdentifier?: string,
 *     TenantDBName?: string,
 *     SkipFinalSnapshot?: bool,
 *     FinalDBSnapshotIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTenantDatabaseAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTenantDatabaseAsync(array{
 *     DBInstanceIdentifier?: string,
 *     TenantDBName?: string,
 *     SkipFinalSnapshot?: bool,
 *     FinalDBSnapshotIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deregisterDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result deregisterDBProxyTargets(array{
 *     DBProxyName?: string,
 *     TargetGroupName?: string,
 *     DBInstanceIdentifiers?: list<string>,
 *     DBClusterIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterDBProxyTargetsAsync(array{
 *     DBProxyName?: string,
 *     TargetGroupName?: string,
 *     DBInstanceIdentifiers?: list<string>,
 *     DBClusterIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAccountAttributes(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeAccountAttributes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array{...} $args = [])
 * @method \Aws\Result describeBlueGreenDeployments(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeBlueGreenDeployments(array{
 *     BlueGreenDeploymentIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBlueGreenDeploymentsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBlueGreenDeploymentsAsync(array{
 *     BlueGreenDeploymentIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCertificates(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeCertificates(array{
 *     CertificateIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificatesAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificatesAsync(array{
 *     CertificateIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterAutomatedBackups(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBClusterAutomatedBackups(array{
 *     DbClusterResourceId?: string,
 *     DBClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterAutomatedBackupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterAutomatedBackupsAsync(array{
 *     DbClusterResourceId?: string,
 *     DBClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterBacktracks(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBClusterBacktracks(array{
 *     DBClusterIdentifier?: string,
 *     BacktrackIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterBacktracksAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterBacktracksAsync(array{
 *     DBClusterIdentifier?: string,
 *     BacktrackIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterEndpoints(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBClusterEndpoints(array{
 *     DBClusterIdentifier?: string,
 *     DBClusterEndpointIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterEndpointsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterEndpointsAsync(array{
 *     DBClusterIdentifier?: string,
 *     DBClusterEndpointIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterParameterGroups(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBClusterParameterGroups(array{
 *     DBClusterParameterGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterParameterGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterParameterGroupsAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterParameters(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBClusterParameters(array{
 *     DBClusterParameterGroupName?: string,
 *     Source?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterParametersAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterParametersAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     Source?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterSnapshotAttributes(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBClusterSnapshotAttributes(array{DBClusterSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterSnapshotAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterSnapshotAttributesAsync(array{DBClusterSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeDBClusterSnapshots(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBClusterSnapshots(array{
 *     DBClusterIdentifier?: string,
 *     DBClusterSnapshotIdentifier?: string,
 *     SnapshotType?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     IncludeShared?: bool,
 *     IncludePublic?: bool,
 *     DbClusterResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterSnapshotsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterSnapshotsAsync(array{
 *     DBClusterIdentifier?: string,
 *     DBClusterSnapshotIdentifier?: string,
 *     SnapshotType?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     IncludeShared?: bool,
 *     IncludePublic?: bool,
 *     DbClusterResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusters(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBClusters(array{
 *     DBClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     IncludeShared?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClustersAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClustersAsync(array{
 *     DBClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     IncludeShared?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBInstanceAutomatedBackups(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBInstanceAutomatedBackups(array{
 *     DbiResourceId?: string,
 *     DBInstanceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DBInstanceAutomatedBackupsArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBInstanceAutomatedBackupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBInstanceAutomatedBackupsAsync(array{
 *     DbiResourceId?: string,
 *     DBInstanceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DBInstanceAutomatedBackupsArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBMajorEngineVersions(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBMajorEngineVersions(array{Engine?: string, MajorEngineVersion?: string, Marker?: string, MaxRecords?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBMajorEngineVersionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBMajorEngineVersionsAsync(array{Engine?: string, MajorEngineVersion?: string, Marker?: string, MaxRecords?: int, ...} $args = [])
 * @method \Aws\Result describeDBProxies(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBProxies(array{
 *     DBProxyName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBProxiesAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBProxiesAsync(array{
 *     DBProxyName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBProxyEndpoints(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBProxyEndpoints(array{
 *     DBProxyName?: string,
 *     DBProxyEndpointName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBProxyEndpointsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBProxyEndpointsAsync(array{
 *     DBProxyName?: string,
 *     DBProxyEndpointName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBProxyTargetGroups(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBProxyTargetGroups(array{
 *     DBProxyName?: string,
 *     TargetGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBProxyTargetGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBProxyTargetGroupsAsync(array{
 *     DBProxyName?: string,
 *     TargetGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBProxyTargets(array{
 *     DBProxyName?: string,
 *     TargetGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBProxyTargetsAsync(array{
 *     DBProxyName?: string,
 *     TargetGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBRecommendations(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBRecommendations(array{
 *     LastUpdatedAfter?: int|string|\DateTimeInterface,
 *     LastUpdatedBefore?: int|string|\DateTimeInterface,
 *     Locale?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBRecommendationsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBRecommendationsAsync(array{
 *     LastUpdatedAfter?: int|string|\DateTimeInterface,
 *     LastUpdatedBefore?: int|string|\DateTimeInterface,
 *     Locale?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBShardGroups(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBShardGroups(array{
 *     DBShardGroupIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBShardGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBShardGroupsAsync(array{
 *     DBShardGroupIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBSnapshotAttributes(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBSnapshotAttributes(array{DBSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBSnapshotAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBSnapshotAttributesAsync(array{DBSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeDBSnapshotTenantDatabases(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeDBSnapshotTenantDatabases(array{
 *     DBInstanceIdentifier?: string,
 *     DBSnapshotIdentifier?: string,
 *     SnapshotType?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DbiResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBSnapshotTenantDatabasesAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBSnapshotTenantDatabasesAsync(array{
 *     DBInstanceIdentifier?: string,
 *     DBSnapshotIdentifier?: string,
 *     SnapshotType?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DbiResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEngineDefaultClusterParameters(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeEngineDefaultClusterParameters(array{
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEngineDefaultClusterParametersAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEngineDefaultClusterParametersAsync(array{
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeExportTasks(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeExportTasks(array{
 *     ExportTaskIdentifier?: string,
 *     SourceArn?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     SourceType?: 'CLUSTER'|'SNAPSHOT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExportTasksAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExportTasksAsync(array{
 *     ExportTaskIdentifier?: string,
 *     SourceArn?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     SourceType?: 'CLUSTER'|'SNAPSHOT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeGlobalClusters(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeGlobalClusters(array{
 *     GlobalClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalClustersAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGlobalClustersAsync(array{
 *     GlobalClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeIntegrations(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeIntegrations(array{
 *     IntegrationIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIntegrationsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIntegrationsAsync(array{
 *     IntegrationIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePendingMaintenanceActions(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describePendingMaintenanceActions(array{
 *     ResourceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array{
 *     ResourceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeServerlessV2PlatformVersions(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeServerlessV2PlatformVersions(array{
 *     ServerlessV2PlatformVersion?: string,
 *     Engine?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     DefaultOnly?: bool,
 *     IncludeAll?: bool,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServerlessV2PlatformVersionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServerlessV2PlatformVersionsAsync(array{
 *     ServerlessV2PlatformVersion?: string,
 *     Engine?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     DefaultOnly?: bool,
 *     IncludeAll?: bool,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSourceRegions(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeSourceRegions(array{
 *     RegionName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSourceRegionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSourceRegionsAsync(array{
 *     RegionName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTenantDatabases(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeTenantDatabases(array{
 *     DBInstanceIdentifier?: string,
 *     TenantDBName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTenantDatabasesAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTenantDatabasesAsync(array{
 *     DBInstanceIdentifier?: string,
 *     TenantDBName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeValidDBInstanceModifications(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result describeValidDBInstanceModifications(array{DBInstanceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeValidDBInstanceModificationsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeValidDBInstanceModificationsAsync(array{DBInstanceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disableHttpEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result disableHttpEndpoint(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableHttpEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise disableHttpEndpointAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result enableHttpEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result enableHttpEndpoint(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableHttpEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise enableHttpEndpointAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result failoverDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result failoverDBCluster(array{DBClusterIdentifier?: string, TargetDBInstanceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise failoverDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise failoverDBClusterAsync(array{DBClusterIdentifier?: string, TargetDBInstanceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result failoverGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result failoverGlobalCluster(array{
 *     GlobalClusterIdentifier?: string,
 *     TargetDbClusterIdentifier?: string,
 *     AllowDataLoss?: bool,
 *     Switchover?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise failoverGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise failoverGlobalClusterAsync(array{
 *     GlobalClusterIdentifier?: string,
 *     TargetDbClusterIdentifier?: string,
 *     AllowDataLoss?: bool,
 *     Switchover?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyActivityStream(array{ResourceArn?: string, AuditPolicyState?: 'locked'|'unlocked', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyActivityStreamAsync(array{ResourceArn?: string, AuditPolicyState?: 'locked'|'unlocked', ...} $args = [])
 * @method \Aws\Result modifyCertificates(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyCertificates(array{CertificateIdentifier?: string, RemoveCustomerOverride?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCertificatesAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCertificatesAsync(array{CertificateIdentifier?: string, RemoveCustomerOverride?: bool, ...} $args = [])
 * @method \Aws\Result modifyCurrentDBClusterCapacity(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyCurrentDBClusterCapacity(array{DBClusterIdentifier?: string, Capacity?: int, SecondsBeforeTimeout?: int, TimeoutAction?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCurrentDBClusterCapacityAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCurrentDBClusterCapacityAsync(array{DBClusterIdentifier?: string, Capacity?: int, SecondsBeforeTimeout?: int, TimeoutAction?: string, ...} $args = [])
 * @method \Aws\Result modifyCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyCustomDBEngineVersion(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Description?: string,
 *     Status?: 'available'|'inactive'|'inactive-except-restore',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCustomDBEngineVersionAsync(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Description?: string,
 *     Status?: 'available'|'inactive'|'inactive-except-restore',
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBCluster(array{
 *     DBClusterIdentifier?: string,
 *     NewDBClusterIdentifier?: string,
 *     ApplyImmediately?: bool,
 *     BackupRetentionPeriod?: int,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Port?: int,
 *     MasterUserPassword?: string,
 *     OptionGroupName?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     BacktrackWindow?: int,
 *     CloudwatchLogsExportConfiguration?: array{EnableLogTypes?: list<string>, DisableLogTypes?: list<string>, ...},
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     DBInstanceParameterGroupName?: string,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     ScalingConfiguration?: array{
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         AutoPause?: bool,
 *         SecondsUntilAutoPause?: int,
 *         TimeoutAction?: string,
 *         SecondsBeforeTimeout?: int,
 *         ...,
 *     },
 *     DeletionProtection?: bool,
 *     EnableHttpEndpoint?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     EnableGlobalWriteForwarding?: bool,
 *     DBClusterInstanceClass?: string,
 *     AllocatedStorage?: int,
 *     StorageType?: string,
 *     Iops?: int,
 *     AutoMinorVersionUpgrade?: bool,
 *     NetworkType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     ManageMasterUserPassword?: bool,
 *     RotateMasterUserPassword?: bool,
 *     EnableLocalWriteForwarding?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     EngineMode?: string,
 *     AllowEngineModeChange?: bool,
 *     AwsBackupRecoveryPointArn?: string,
 *     EnableLimitlessDatabase?: bool,
 *     CACertificateIdentifier?: string,
 *     MasterUserAuthenticationType?: 'iam-db-auth'|'password',
 *     EngineLifecycleSupport?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBClusterAsync(array{
 *     DBClusterIdentifier?: string,
 *     NewDBClusterIdentifier?: string,
 *     ApplyImmediately?: bool,
 *     BackupRetentionPeriod?: int,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Port?: int,
 *     MasterUserPassword?: string,
 *     OptionGroupName?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     BacktrackWindow?: int,
 *     CloudwatchLogsExportConfiguration?: array{EnableLogTypes?: list<string>, DisableLogTypes?: list<string>, ...},
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     DBInstanceParameterGroupName?: string,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     ScalingConfiguration?: array{
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         AutoPause?: bool,
 *         SecondsUntilAutoPause?: int,
 *         TimeoutAction?: string,
 *         SecondsBeforeTimeout?: int,
 *         ...,
 *     },
 *     DeletionProtection?: bool,
 *     EnableHttpEndpoint?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     EnableGlobalWriteForwarding?: bool,
 *     DBClusterInstanceClass?: string,
 *     AllocatedStorage?: int,
 *     StorageType?: string,
 *     Iops?: int,
 *     AutoMinorVersionUpgrade?: bool,
 *     NetworkType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     ManageMasterUserPassword?: bool,
 *     RotateMasterUserPassword?: bool,
 *     EnableLocalWriteForwarding?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     EngineMode?: string,
 *     AllowEngineModeChange?: bool,
 *     AwsBackupRecoveryPointArn?: string,
 *     EnableLimitlessDatabase?: bool,
 *     CACertificateIdentifier?: string,
 *     MasterUserAuthenticationType?: 'iam-db-auth'|'password',
 *     EngineLifecycleSupport?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBClusterEndpoint(array{
 *     DBClusterEndpointIdentifier?: string,
 *     EndpointType?: string,
 *     StaticMembers?: list<string>,
 *     ExcludedMembers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBClusterEndpointAsync(array{
 *     DBClusterEndpointIdentifier?: string,
 *     EndpointType?: string,
 *     StaticMembers?: list<string>,
 *     ExcludedMembers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBClusterParameterGroup(array{
 *     DBClusterParameterGroupName?: string,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         SupportedEngineModes?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBClusterParameterGroupAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         SupportedEngineModes?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBClusterSnapshotAttribute(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBClusterSnapshotAttribute(array{
 *     DBClusterSnapshotIdentifier?: string,
 *     AttributeName?: string,
 *     ValuesToAdd?: list<string>,
 *     ValuesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBClusterSnapshotAttributeAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBClusterSnapshotAttributeAsync(array{
 *     DBClusterSnapshotIdentifier?: string,
 *     AttributeName?: string,
 *     ValuesToAdd?: list<string>,
 *     ValuesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBProxy(array{
 *     DBProxyName?: string,
 *     NewDBProxyName?: string,
 *     DefaultAuthScheme?: 'IAM_AUTH'|'NONE',
 *     Auth?: list<array{
 *         Description?: string,
 *         UserName?: string,
 *         AuthScheme?: 'SECRETS',
 *         SecretArn?: string,
 *         IAMAuth?: 'DISABLED'|'ENABLED'|'REQUIRED',
 *         ClientPasswordAuthType?: 'MYSQL_CACHING_SHA2_PASSWORD'|'MYSQL_NATIVE_PASSWORD'|'POSTGRES_MD5'|'POSTGRES_SCRAM_SHA_256'|'SQL_SERVER_AUTHENTICATION',
 *         ...,
 *     }>,
 *     RequireTLS?: bool,
 *     IdleClientTimeout?: int,
 *     DebugLogging?: bool,
 *     RoleArn?: string,
 *     SecurityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBProxyAsync(array{
 *     DBProxyName?: string,
 *     NewDBProxyName?: string,
 *     DefaultAuthScheme?: 'IAM_AUTH'|'NONE',
 *     Auth?: list<array{
 *         Description?: string,
 *         UserName?: string,
 *         AuthScheme?: 'SECRETS',
 *         SecretArn?: string,
 *         IAMAuth?: 'DISABLED'|'ENABLED'|'REQUIRED',
 *         ClientPasswordAuthType?: 'MYSQL_CACHING_SHA2_PASSWORD'|'MYSQL_NATIVE_PASSWORD'|'POSTGRES_MD5'|'POSTGRES_SCRAM_SHA_256'|'SQL_SERVER_AUTHENTICATION',
 *         ...,
 *     }>,
 *     RequireTLS?: bool,
 *     IdleClientTimeout?: int,
 *     DebugLogging?: bool,
 *     RoleArn?: string,
 *     SecurityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBProxyEndpoint(array{DBProxyEndpointName?: string, NewDBProxyEndpointName?: string, VpcSecurityGroupIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBProxyEndpointAsync(array{DBProxyEndpointName?: string, NewDBProxyEndpointName?: string, VpcSecurityGroupIds?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyDBProxyTargetGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBProxyTargetGroup(array{
 *     TargetGroupName?: string,
 *     DBProxyName?: string,
 *     ConnectionPoolConfig?: array{
 *         MaxConnectionsPercent?: int,
 *         MaxIdleConnectionsPercent?: int,
 *         ConnectionBorrowTimeout?: int,
 *         SessionPinningFilters?: list<string>,
 *         InitQuery?: string,
 *         ...,
 *     },
 *     NewName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBProxyTargetGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBProxyTargetGroupAsync(array{
 *     TargetGroupName?: string,
 *     DBProxyName?: string,
 *     ConnectionPoolConfig?: array{
 *         MaxConnectionsPercent?: int,
 *         MaxIdleConnectionsPercent?: int,
 *         ConnectionBorrowTimeout?: int,
 *         SessionPinningFilters?: list<string>,
 *         InitQuery?: string,
 *         ...,
 *     },
 *     NewName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBRecommendation(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBRecommendation(array{
 *     RecommendationId?: string,
 *     Locale?: string,
 *     Status?: string,
 *     RecommendedActionUpdates?: list<array{ActionId?: string, Status?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBRecommendationAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBRecommendationAsync(array{
 *     RecommendationId?: string,
 *     Locale?: string,
 *     Status?: string,
 *     RecommendedActionUpdates?: list<array{ActionId?: string, Status?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBShardGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBShardGroup(array{DBShardGroupIdentifier?: string, MaxACU?: float, MinACU?: float, ComputeRedundancy?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBShardGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBShardGroupAsync(array{DBShardGroupIdentifier?: string, MaxACU?: float, MinACU?: float, ComputeRedundancy?: int, ...} $args = [])
 * @method \Aws\Result modifyDBSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBSnapshot(array{DBSnapshotIdentifier?: string, EngineVersion?: string, OptionGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBSnapshotAsync(array{DBSnapshotIdentifier?: string, EngineVersion?: string, OptionGroupName?: string, ...} $args = [])
 * @method \Aws\Result modifyDBSnapshotAttribute(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyDBSnapshotAttribute(array{
 *     DBSnapshotIdentifier?: string,
 *     AttributeName?: string,
 *     ValuesToAdd?: list<string>,
 *     ValuesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBSnapshotAttributeAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBSnapshotAttributeAsync(array{
 *     DBSnapshotIdentifier?: string,
 *     AttributeName?: string,
 *     ValuesToAdd?: list<string>,
 *     ValuesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyGlobalCluster(array{
 *     GlobalClusterIdentifier?: string,
 *     NewGlobalClusterIdentifier?: string,
 *     DeletionProtection?: bool,
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyGlobalClusterAsync(array{
 *     GlobalClusterIdentifier?: string,
 *     NewGlobalClusterIdentifier?: string,
 *     DeletionProtection?: bool,
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyIntegration(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyIntegration(array{
 *     IntegrationIdentifier?: string,
 *     IntegrationName?: string,
 *     DataFilter?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyIntegrationAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyIntegrationAsync(array{
 *     IntegrationIdentifier?: string,
 *     IntegrationName?: string,
 *     DataFilter?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyTenantDatabase(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result modifyTenantDatabase(array{
 *     DBInstanceIdentifier?: string,
 *     TenantDBName?: string,
 *     MasterUserPassword?: string,
 *     NewTenantDBName?: string,
 *     ManageMasterUserPassword?: bool,
 *     RotateMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyTenantDatabaseAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyTenantDatabaseAsync(array{
 *     DBInstanceIdentifier?: string,
 *     TenantDBName?: string,
 *     MasterUserPassword?: string,
 *     NewTenantDBName?: string,
 *     ManageMasterUserPassword?: bool,
 *     RotateMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result promoteReadReplicaDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result promoteReadReplicaDBCluster(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise promoteReadReplicaDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise promoteReadReplicaDBClusterAsync(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result rebootDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result rebootDBCluster(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootDBClusterAsync(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result rebootDBShardGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result rebootDBShardGroup(array{DBShardGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootDBShardGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootDBShardGroupAsync(array{DBShardGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result registerDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result registerDBProxyTargets(array{
 *     DBProxyName?: string,
 *     TargetGroupName?: string,
 *     DBInstanceIdentifiers?: list<string>,
 *     DBClusterIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDBProxyTargetsAsync(array{
 *     DBProxyName?: string,
 *     TargetGroupName?: string,
 *     DBInstanceIdentifiers?: list<string>,
 *     DBClusterIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeFromGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result removeFromGlobalCluster(array{GlobalClusterIdentifier?: string, DbClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFromGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise removeFromGlobalClusterAsync(array{GlobalClusterIdentifier?: string, DbClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result removeRoleFromDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result removeRoleFromDBCluster(array{DBClusterIdentifier?: string, RoleArn?: string, FeatureName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeRoleFromDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise removeRoleFromDBClusterAsync(array{DBClusterIdentifier?: string, RoleArn?: string, FeatureName?: string, ...} $args = [])
 * @method \Aws\Result removeRoleFromDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result removeRoleFromDBInstance(array{DBInstanceIdentifier?: string, RoleArn?: string, FeatureName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeRoleFromDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise removeRoleFromDBInstanceAsync(array{DBInstanceIdentifier?: string, RoleArn?: string, FeatureName?: string, ...} $args = [])
 * @method \Aws\Result resetDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result resetDBClusterParameterGroup(array{
 *     DBClusterParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         SupportedEngineModes?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resetDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise resetDBClusterParameterGroupAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         SupportedEngineModes?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDBClusterFromS3(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result restoreDBClusterFromS3(array{
 *     AvailabilityZones?: list<string>,
 *     BackupRetentionPeriod?: int,
 *     CharacterSetName?: string,
 *     DatabaseName?: string,
 *     DBClusterIdentifier?: string,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     DBSubnetGroupName?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     OptionGroupName?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     SourceEngine?: string,
 *     SourceEngineVersion?: string,
 *     S3BucketName?: string,
 *     S3Prefix?: string,
 *     S3IngestionRoleArn?: string,
 *     BacktrackWindow?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DeletionProtection?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     StorageType?: string,
 *     NetworkType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     EngineLifecycleSupport?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     AssociatedRoles?: list<array{RoleArn?: string, FeatureName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDBClusterFromS3Async(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDBClusterFromS3Async(array{
 *     AvailabilityZones?: list<string>,
 *     BackupRetentionPeriod?: int,
 *     CharacterSetName?: string,
 *     DatabaseName?: string,
 *     DBClusterIdentifier?: string,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     DBSubnetGroupName?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     OptionGroupName?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     SourceEngine?: string,
 *     SourceEngineVersion?: string,
 *     S3BucketName?: string,
 *     S3Prefix?: string,
 *     S3IngestionRoleArn?: string,
 *     BacktrackWindow?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DeletionProtection?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     StorageType?: string,
 *     NetworkType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     EngineLifecycleSupport?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     AssociatedRoles?: list<array{RoleArn?: string, FeatureName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDBClusterFromSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result restoreDBClusterFromSnapshot(array{
 *     AvailabilityZones?: list<string>,
 *     DBClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     DBSubnetGroupName?: string,
 *     DatabaseName?: string,
 *     OptionGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     BacktrackWindow?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     EngineMode?: string,
 *     ScalingConfiguration?: array{
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         AutoPause?: bool,
 *         SecondsUntilAutoPause?: int,
 *         TimeoutAction?: string,
 *         SecondsBeforeTimeout?: int,
 *         ...,
 *     },
 *     DBClusterParameterGroupName?: string,
 *     DeletionProtection?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     DBClusterInstanceClass?: string,
 *     StorageType?: string,
 *     Iops?: int,
 *     PubliclyAccessible?: bool,
 *     NetworkType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     RdsCustomClusterConfiguration?: array{
 *         InterconnectSubnetId?: string,
 *         TransitGatewayMulticastDomainId?: string,
 *         ReplicaMode?: 'mounted'|'open-read-only',
 *         ...,
 *     },
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     EngineLifecycleSupport?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     EnableVPCNetworking?: bool,
 *     EnableInternetAccessGateway?: bool,
 *     AssociatedRoles?: list<array{RoleArn?: string, FeatureName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDBClusterFromSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDBClusterFromSnapshotAsync(array{
 *     AvailabilityZones?: list<string>,
 *     DBClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     DBSubnetGroupName?: string,
 *     DatabaseName?: string,
 *     OptionGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     BacktrackWindow?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     EngineMode?: string,
 *     ScalingConfiguration?: array{
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         AutoPause?: bool,
 *         SecondsUntilAutoPause?: int,
 *         TimeoutAction?: string,
 *         SecondsBeforeTimeout?: int,
 *         ...,
 *     },
 *     DBClusterParameterGroupName?: string,
 *     DeletionProtection?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     DBClusterInstanceClass?: string,
 *     StorageType?: string,
 *     Iops?: int,
 *     PubliclyAccessible?: bool,
 *     NetworkType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     RdsCustomClusterConfiguration?: array{
 *         InterconnectSubnetId?: string,
 *         TransitGatewayMulticastDomainId?: string,
 *         ReplicaMode?: 'mounted'|'open-read-only',
 *         ...,
 *     },
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     EngineLifecycleSupport?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     EnableVPCNetworking?: bool,
 *     EnableInternetAccessGateway?: bool,
 *     AssociatedRoles?: list<array{RoleArn?: string, FeatureName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDBClusterToPointInTime(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result restoreDBClusterToPointInTime(array{
 *     DBClusterIdentifier?: string,
 *     RestoreType?: string,
 *     SourceDBClusterIdentifier?: string,
 *     RestoreToTime?: int|string|\DateTimeInterface,
 *     UseLatestRestorableTime?: bool,
 *     Port?: int,
 *     DBSubnetGroupName?: string,
 *     OptionGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     BacktrackWindow?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DBClusterParameterGroupName?: string,
 *     DeletionProtection?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     DBClusterInstanceClass?: string,
 *     StorageType?: string,
 *     PubliclyAccessible?: bool,
 *     Iops?: int,
 *     NetworkType?: string,
 *     SourceDbClusterResourceId?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     ScalingConfiguration?: array{
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         AutoPause?: bool,
 *         SecondsUntilAutoPause?: int,
 *         TimeoutAction?: string,
 *         SecondsBeforeTimeout?: int,
 *         ...,
 *     },
 *     EngineMode?: string,
 *     RdsCustomClusterConfiguration?: array{
 *         InterconnectSubnetId?: string,
 *         TransitGatewayMulticastDomainId?: string,
 *         ReplicaMode?: 'mounted'|'open-read-only',
 *         ...,
 *     },
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     EngineLifecycleSupport?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     EnableVPCNetworking?: bool,
 *     EnableInternetAccessGateway?: bool,
 *     AssociatedRoles?: list<array{RoleArn?: string, FeatureName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDBClusterToPointInTimeAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDBClusterToPointInTimeAsync(array{
 *     DBClusterIdentifier?: string,
 *     RestoreType?: string,
 *     SourceDBClusterIdentifier?: string,
 *     RestoreToTime?: int|string|\DateTimeInterface,
 *     UseLatestRestorableTime?: bool,
 *     Port?: int,
 *     DBSubnetGroupName?: string,
 *     OptionGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     BacktrackWindow?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DBClusterParameterGroupName?: string,
 *     DeletionProtection?: bool,
 *     CopyTagsToSnapshot?: bool,
 *     Domain?: string,
 *     DomainIAMRoleName?: string,
 *     DBClusterInstanceClass?: string,
 *     StorageType?: string,
 *     PubliclyAccessible?: bool,
 *     Iops?: int,
 *     NetworkType?: string,
 *     SourceDbClusterResourceId?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, SecondsUntilAutoPause?: int, ...},
 *     ScalingConfiguration?: array{
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         AutoPause?: bool,
 *         SecondsUntilAutoPause?: int,
 *         TimeoutAction?: string,
 *         SecondsBeforeTimeout?: int,
 *         ...,
 *     },
 *     EngineMode?: string,
 *     RdsCustomClusterConfiguration?: array{
 *         InterconnectSubnetId?: string,
 *         TransitGatewayMulticastDomainId?: string,
 *         ReplicaMode?: 'mounted'|'open-read-only',
 *         ...,
 *     },
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     EngineLifecycleSupport?: string,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     EnableVPCNetworking?: bool,
 *     EnableInternetAccessGateway?: bool,
 *     AssociatedRoles?: list<array{RoleArn?: string, FeatureName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDBInstanceFromS3(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result restoreDBInstanceFromS3(array{
 *     DBName?: string,
 *     DBInstanceIdentifier?: string,
 *     AllocatedStorage?: int,
 *     DBInstanceClass?: string,
 *     Engine?: string,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     DBSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     AvailabilityZone?: string,
 *     DBSubnetGroupName?: string,
 *     PreferredMaintenanceWindow?: string,
 *     DBParameterGroupName?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     Port?: int,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageType?: string,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     CopyTagsToSnapshot?: bool,
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     SourceEngine?: string,
 *     SourceEngineVersion?: string,
 *     S3BucketName?: string,
 *     S3Prefix?: string,
 *     S3IngestionRoleArn?: string,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DeletionProtection?: bool,
 *     MaxAllocatedStorage?: int,
 *     NetworkType?: string,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     DedicatedLogVolume?: bool,
 *     CACertificateIdentifier?: string,
 *     EngineLifecycleSupport?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDBInstanceFromS3Async(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDBInstanceFromS3Async(array{
 *     DBName?: string,
 *     DBInstanceIdentifier?: string,
 *     AllocatedStorage?: int,
 *     DBInstanceClass?: string,
 *     Engine?: string,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     DBSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     AvailabilityZone?: string,
 *     DBSubnetGroupName?: string,
 *     PreferredMaintenanceWindow?: string,
 *     DBParameterGroupName?: string,
 *     BackupRetentionPeriod?: int,
 *     PreferredBackupWindow?: string,
 *     Port?: int,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     LicenseModel?: string,
 *     Iops?: int,
 *     StorageThroughput?: int,
 *     OptionGroupName?: string,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageType?: string,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     CopyTagsToSnapshot?: bool,
 *     MonitoringInterval?: int,
 *     MonitoringRoleArn?: string,
 *     EnableIAMDatabaseAuthentication?: bool,
 *     SourceEngine?: string,
 *     SourceEngineVersion?: string,
 *     S3BucketName?: string,
 *     S3Prefix?: string,
 *     S3IngestionRoleArn?: string,
 *     DatabaseInsightsMode?: 'advanced'|'standard',
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     PerformanceInsightsRetentionPeriod?: int,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     ProcessorFeatures?: list<array{Name?: string, Value?: string, ...}>,
 *     UseDefaultProcessorFeatures?: bool,
 *     DeletionProtection?: bool,
 *     MaxAllocatedStorage?: int,
 *     NetworkType?: string,
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     DedicatedLogVolume?: bool,
 *     CACertificateIdentifier?: string,
 *     EngineLifecycleSupport?: string,
 *     AdditionalStorageVolumes?: list<array{
 *         VolumeName?: string,
 *         AllocatedStorage?: int,
 *         IOPS?: int,
 *         MaxAllocatedStorage?: int,
 *         StorageThroughput?: int,
 *         StorageType?: string,
 *         ...,
 *     }>,
 *     TagSpecifications?: list<array{ResourceType?: string, Tags?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result startActivityStream(array{
 *     ResourceArn?: string,
 *     Mode?: 'async'|'sync',
 *     KmsKeyId?: string,
 *     ApplyImmediately?: bool,
 *     EngineNativeAuditFieldsIncluded?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise startActivityStreamAsync(array{
 *     ResourceArn?: string,
 *     Mode?: 'async'|'sync',
 *     KmsKeyId?: string,
 *     ApplyImmediately?: bool,
 *     EngineNativeAuditFieldsIncluded?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result startDBCluster(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise startDBClusterAsync(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result startDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result startDBInstance(array{DBInstanceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise startDBInstanceAsync(array{DBInstanceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result startDBInstanceAutomatedBackupsReplication(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result startDBInstanceAutomatedBackupsReplication(array{
 *     SourceDBInstanceArn?: string,
 *     BackupRetentionPeriod?: int,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDBInstanceAutomatedBackupsReplicationAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise startDBInstanceAutomatedBackupsReplicationAsync(array{
 *     SourceDBInstanceArn?: string,
 *     BackupRetentionPeriod?: int,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startExportTask(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result startExportTask(array{
 *     ExportTaskIdentifier?: string,
 *     SourceArn?: string,
 *     S3BucketName?: string,
 *     IamRoleArn?: string,
 *     KmsKeyId?: string,
 *     S3Prefix?: string,
 *     ExportOnly?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startExportTaskAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise startExportTaskAsync(array{
 *     ExportTaskIdentifier?: string,
 *     SourceArn?: string,
 *     S3BucketName?: string,
 *     IamRoleArn?: string,
 *     KmsKeyId?: string,
 *     S3Prefix?: string,
 *     ExportOnly?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result stopActivityStream(array{ResourceArn?: string, ApplyImmediately?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise stopActivityStreamAsync(array{ResourceArn?: string, ApplyImmediately?: bool, ...} $args = [])
 * @method \Aws\Result stopDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result stopDBCluster(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDBClusterAsync(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result stopDBInstance(array{DBInstanceIdentifier?: string, DBSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDBInstanceAsync(array{DBInstanceIdentifier?: string, DBSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopDBInstanceAutomatedBackupsReplication(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result stopDBInstanceAutomatedBackupsReplication(array{SourceDBInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDBInstanceAutomatedBackupsReplicationAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDBInstanceAutomatedBackupsReplicationAsync(array{SourceDBInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result switchoverBlueGreenDeployment(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result switchoverBlueGreenDeployment(array{BlueGreenDeploymentIdentifier?: string, SwitchoverTimeout?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise switchoverBlueGreenDeploymentAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise switchoverBlueGreenDeploymentAsync(array{BlueGreenDeploymentIdentifier?: string, SwitchoverTimeout?: int, ...} $args = [])
 * @method \Aws\Result switchoverGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result switchoverGlobalCluster(array{GlobalClusterIdentifier?: string, TargetDbClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise switchoverGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise switchoverGlobalClusterAsync(array{GlobalClusterIdentifier?: string, TargetDbClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result switchoverReadReplica(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \Aws\Result switchoverReadReplica(array{DBInstanceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise switchoverReadReplicaAsync(array $args = []) (supported in versions 2014-10-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise switchoverReadReplicaAsync(array{DBInstanceIdentifier?: string, ...} $args = [])
 */
class RdsClient extends AwsClient
{
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerList()->appendInit(
                PresignUrlMiddleware::wrap(
                    $this,
                    $args['endpoint_provider'],
                    [
                        'operations' => [
                            'CopyDBSnapshot',
                            'CreateDBInstanceReadReplica',
                            'CopyDBClusterSnapshot',
                            'CreateDBCluster',
                            'StartDBInstanceAutomatedBackupsReplication'
                        ],
                        'service' => 'rds',
                        'presign_param' => 'PreSignedUrl',
                        'require_different_region' => true,
                        'extra_query_params' => [
                            'CopyDBSnapshot' => ['DestinationRegion'],
                            'CreateDBInstanceReadReplica' => ['DestinationRegion'],
                            'CopyDBClusterSnapshot' => ['DestinationRegion'],
                            'CreateDBCluster' => ['DestinationRegion'],
                            'StartDBInstanceAutomatedBackupsReplication' => ['DestinationRegion']
                        ]
                    ]
                ),
                'rds.presigner'
            );
        };

        parent::__construct($args);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Add the SourceRegion parameter
        $docs['shapes']['SourceRegion']['base'] = 'A required parameter that indicates '
            . 'the region that the DB snapshot will be copied from.';
        $api['shapes']['SourceRegion'] = ['type' => 'string'];
        $api['shapes']['CopyDBSnapshotMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];
        $api['shapes']['CreateDBInstanceReadReplicaMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];

        // Add the DestinationRegion parameter
        $docs['shapes']['DestinationRegion']['base']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';
        $api['shapes']['DestinationRegion'] = ['type' => 'string'];
        $api['shapes']['CopyDBSnapshotMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];
        $api['shapes']['CreateDBInstanceReadReplicaMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];

        // Several parameters in presign APIs are optional.
        $docs['shapes']['String']['refs']['CopyDBSnapshotMessage$PreSignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CopyDBSnapshotMessage$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        // Several parameters in presign APIs are optional.
        $docs['shapes']['String']['refs']['CreateDBInstanceReadReplicaMessage$PreSignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CreateDBInstanceReadReplicaMessage$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        if ($api['metadata']['apiVersion'] != '2014-09-01') {
            $api['shapes']['CopyDBClusterSnapshotMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];
            $api['shapes']['CreateDBClusterMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];

            $api['shapes']['CopyDBClusterSnapshotMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];
            $api['shapes']['CreateDBClusterMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];

            // Several parameters in presign APIs are optional.
            $docs['shapes']['String']['refs']['CopyDBClusterSnapshotMessage$PreSignedUrl']
                = '<div class="alert alert-info">The SDK will compute this value '
                . 'for you on your behalf.</div>';
            $docs['shapes']['String']['refs']['CopyDBClusterSnapshotMessage$DestinationRegion']
                = '<div class="alert alert-info">The SDK will populate this '
                . 'parameter on your behalf using the configured region value of '
                . 'the client.</div>';

            // Several parameters in presign APIs are optional.
            $docs['shapes']['String']['refs']['CreateDBClusterMessage$PreSignedUrl']
                = '<div class="alert alert-info">The SDK will compute this value '
                . 'for you on your behalf.</div>';
            $docs['shapes']['String']['refs']['CreateDBClusterMessage$DestinationRegion']
                = '<div class="alert alert-info">The SDK will populate this '
                . 'parameter on your behalf using the configured region value of '
                . 'the client.</div>';
        }

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
