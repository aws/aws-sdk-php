<?php
namespace Aws\ElastiCache;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon ElastiCache** service.
 *
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addTagsToResource(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result authorizeCacheSecurityGroupIngress(array $args = [])
 * @phpstan-method \Aws\Result authorizeCacheSecurityGroupIngress(array{CacheSecurityGroupName?: string, EC2SecurityGroupName?: string, EC2SecurityGroupOwnerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeCacheSecurityGroupIngressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeCacheSecurityGroupIngressAsync(array{CacheSecurityGroupName?: string, EC2SecurityGroupName?: string, EC2SecurityGroupOwnerId?: string, ...} $args = [])
 * @method \Aws\Result batchApplyUpdateAction(array $args = [])
 * @phpstan-method \Aws\Result batchApplyUpdateAction(array{ReplicationGroupIds?: list<string>, CacheClusterIds?: list<string>, ServiceUpdateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchApplyUpdateActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchApplyUpdateActionAsync(array{ReplicationGroupIds?: list<string>, CacheClusterIds?: list<string>, ServiceUpdateName?: string, ...} $args = [])
 * @method \Aws\Result batchStopUpdateAction(array $args = [])
 * @phpstan-method \Aws\Result batchStopUpdateAction(array{ReplicationGroupIds?: list<string>, CacheClusterIds?: list<string>, ServiceUpdateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchStopUpdateActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchStopUpdateActionAsync(array{ReplicationGroupIds?: list<string>, CacheClusterIds?: list<string>, ServiceUpdateName?: string, ...} $args = [])
 * @method \Aws\Result completeMigration(array $args = [])
 * @phpstan-method \Aws\Result completeMigration(array{ReplicationGroupId?: string, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeMigrationAsync(array{ReplicationGroupId?: string, Force?: bool, ...} $args = [])
 * @method \Aws\Result copyServerlessCacheSnapshot(array $args = [])
 * @phpstan-method \Aws\Result copyServerlessCacheSnapshot(array{
 *     SourceServerlessCacheSnapshotName?: string,
 *     TargetServerlessCacheSnapshotName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyServerlessCacheSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyServerlessCacheSnapshotAsync(array{
 *     SourceServerlessCacheSnapshotName?: string,
 *     TargetServerlessCacheSnapshotName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copySnapshot(array $args = [])
 * @phpstan-method \Aws\Result copySnapshot(array{
 *     SourceSnapshotName?: string,
 *     TargetSnapshotName?: string,
 *     TargetBucket?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copySnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copySnapshotAsync(array{
 *     SourceSnapshotName?: string,
 *     TargetSnapshotName?: string,
 *     TargetBucket?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCacheCluster(array $args = [])
 * @phpstan-method \Aws\Result createCacheCluster(array{
 *     CacheClusterId?: string,
 *     ReplicationGroupId?: string,
 *     AZMode?: 'cross-az'|'single-az',
 *     PreferredAvailabilityZone?: string,
 *     PreferredAvailabilityZones?: list<string>,
 *     NumCacheNodes?: int,
 *     CacheNodeType?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     CacheParameterGroupName?: string,
 *     CacheSubnetGroupName?: string,
 *     CacheSecurityGroupNames?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SnapshotArns?: list<string>,
 *     SnapshotName?: string,
 *     PreferredMaintenanceWindow?: string,
 *     Port?: int,
 *     NotificationTopicArn?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     SnapshotRetentionLimit?: int,
 *     SnapshotWindow?: string,
 *     AuthToken?: string,
 *     OutpostMode?: 'cross-outpost'|'single-outpost',
 *     PreferredOutpostArn?: string,
 *     PreferredOutpostArns?: list<string>,
 *     LogDeliveryConfigurations?: list<array{
 *         LogType?: 'engine-log'|'slow-log',
 *         DestinationType?: 'cloudwatch-logs'|'kinesis-firehose',
 *         DestinationDetails?: array,
 *         LogFormat?: 'json'|'text',
 *         Enabled?: bool,
 *         ...,
 *     }>,
 *     TransitEncryptionEnabled?: bool,
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCacheClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCacheClusterAsync(array{
 *     CacheClusterId?: string,
 *     ReplicationGroupId?: string,
 *     AZMode?: 'cross-az'|'single-az',
 *     PreferredAvailabilityZone?: string,
 *     PreferredAvailabilityZones?: list<string>,
 *     NumCacheNodes?: int,
 *     CacheNodeType?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     CacheParameterGroupName?: string,
 *     CacheSubnetGroupName?: string,
 *     CacheSecurityGroupNames?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SnapshotArns?: list<string>,
 *     SnapshotName?: string,
 *     PreferredMaintenanceWindow?: string,
 *     Port?: int,
 *     NotificationTopicArn?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     SnapshotRetentionLimit?: int,
 *     SnapshotWindow?: string,
 *     AuthToken?: string,
 *     OutpostMode?: 'cross-outpost'|'single-outpost',
 *     PreferredOutpostArn?: string,
 *     PreferredOutpostArns?: list<string>,
 *     LogDeliveryConfigurations?: list<array{
 *         LogType?: 'engine-log'|'slow-log',
 *         DestinationType?: 'cloudwatch-logs'|'kinesis-firehose',
 *         DestinationDetails?: array,
 *         LogFormat?: 'json'|'text',
 *         Enabled?: bool,
 *         ...,
 *     }>,
 *     TransitEncryptionEnabled?: bool,
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCacheParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result createCacheParameterGroup(array{
 *     CacheParameterGroupName?: string,
 *     CacheParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCacheParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCacheParameterGroupAsync(array{
 *     CacheParameterGroupName?: string,
 *     CacheParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCacheSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result createCacheSecurityGroup(array{
 *     CacheSecurityGroupName?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCacheSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCacheSecurityGroupAsync(array{
 *     CacheSecurityGroupName?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCacheSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result createCacheSubnetGroup(array{
 *     CacheSubnetGroupName?: string,
 *     CacheSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCacheSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCacheSubnetGroupAsync(array{
 *     CacheSubnetGroupName?: string,
 *     CacheSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlobalReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result createGlobalReplicationGroup(array{
 *     GlobalReplicationGroupIdSuffix?: string,
 *     GlobalReplicationGroupDescription?: string,
 *     PrimaryReplicationGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlobalReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlobalReplicationGroupAsync(array{
 *     GlobalReplicationGroupIdSuffix?: string,
 *     GlobalReplicationGroupDescription?: string,
 *     PrimaryReplicationGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result createReplicationGroup(array{
 *     ReplicationGroupId?: string,
 *     ReplicationGroupDescription?: string,
 *     GlobalReplicationGroupId?: string,
 *     PrimaryClusterId?: string,
 *     AutomaticFailoverEnabled?: bool,
 *     MultiAZEnabled?: bool,
 *     NumCacheClusters?: int,
 *     PreferredCacheClusterAZs?: list<string>,
 *     NumNodeGroups?: int,
 *     ReplicasPerNodeGroup?: int,
 *     NodeGroupConfiguration?: list<array{
 *         NodeGroupId?: string,
 *         Slots?: string,
 *         ReplicaCount?: int,
 *         PrimaryAvailabilityZone?: string,
 *         ReplicaAvailabilityZones?: list<string>,
 *         PrimaryOutpostArn?: string,
 *         ReplicaOutpostArns?: list<string>,
 *         ...,
 *     }>,
 *     CacheNodeType?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     CacheParameterGroupName?: string,
 *     CacheSubnetGroupName?: string,
 *     CacheSecurityGroupNames?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SnapshotArns?: list<string>,
 *     SnapshotName?: string,
 *     PreferredMaintenanceWindow?: string,
 *     Port?: int,
 *     NotificationTopicArn?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     SnapshotRetentionLimit?: int,
 *     SnapshotWindow?: string,
 *     AuthToken?: string,
 *     TransitEncryptionEnabled?: bool,
 *     AtRestEncryptionEnabled?: bool,
 *     KmsKeyId?: string,
 *     UserGroupIds?: list<string>,
 *     LogDeliveryConfigurations?: list<array{
 *         LogType?: 'engine-log'|'slow-log',
 *         DestinationType?: 'cloudwatch-logs'|'kinesis-firehose',
 *         DestinationDetails?: array,
 *         LogFormat?: 'json'|'text',
 *         Enabled?: bool,
 *         ...,
 *     }>,
 *     DataTieringEnabled?: bool,
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     TransitEncryptionMode?: 'preferred'|'required',
 *     ClusterMode?: 'compatible'|'disabled'|'enabled',
 *     ServerlessCacheSnapshotName?: string,
 *     Durability?: 'async'|'default'|'disabled'|'sync',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationGroupAsync(array{
 *     ReplicationGroupId?: string,
 *     ReplicationGroupDescription?: string,
 *     GlobalReplicationGroupId?: string,
 *     PrimaryClusterId?: string,
 *     AutomaticFailoverEnabled?: bool,
 *     MultiAZEnabled?: bool,
 *     NumCacheClusters?: int,
 *     PreferredCacheClusterAZs?: list<string>,
 *     NumNodeGroups?: int,
 *     ReplicasPerNodeGroup?: int,
 *     NodeGroupConfiguration?: list<array{
 *         NodeGroupId?: string,
 *         Slots?: string,
 *         ReplicaCount?: int,
 *         PrimaryAvailabilityZone?: string,
 *         ReplicaAvailabilityZones?: list<string>,
 *         PrimaryOutpostArn?: string,
 *         ReplicaOutpostArns?: list<string>,
 *         ...,
 *     }>,
 *     CacheNodeType?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     CacheParameterGroupName?: string,
 *     CacheSubnetGroupName?: string,
 *     CacheSecurityGroupNames?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SnapshotArns?: list<string>,
 *     SnapshotName?: string,
 *     PreferredMaintenanceWindow?: string,
 *     Port?: int,
 *     NotificationTopicArn?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     SnapshotRetentionLimit?: int,
 *     SnapshotWindow?: string,
 *     AuthToken?: string,
 *     TransitEncryptionEnabled?: bool,
 *     AtRestEncryptionEnabled?: bool,
 *     KmsKeyId?: string,
 *     UserGroupIds?: list<string>,
 *     LogDeliveryConfigurations?: list<array{
 *         LogType?: 'engine-log'|'slow-log',
 *         DestinationType?: 'cloudwatch-logs'|'kinesis-firehose',
 *         DestinationDetails?: array,
 *         LogFormat?: 'json'|'text',
 *         Enabled?: bool,
 *         ...,
 *     }>,
 *     DataTieringEnabled?: bool,
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     TransitEncryptionMode?: 'preferred'|'required',
 *     ClusterMode?: 'compatible'|'disabled'|'enabled',
 *     ServerlessCacheSnapshotName?: string,
 *     Durability?: 'async'|'default'|'disabled'|'sync',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServerlessCache(array $args = [])
 * @phpstan-method \Aws\Result createServerlessCache(array{
 *     ServerlessCacheName?: string,
 *     Description?: string,
 *     Engine?: string,
 *     MajorEngineVersion?: string,
 *     CacheUsageLimits?: array{
 *         DataStorage?: array{Maximum?: int, Minimum?: int, Unit?: 'GB', ...},
 *         ECPUPerSecond?: array{Maximum?: int, Minimum?: int, ...},
 *         ...,
 *     },
 *     KmsKeyId?: string,
 *     SecurityGroupIds?: list<string>,
 *     SnapshotArnsToRestore?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UserGroupId?: string,
 *     SubnetIds?: list<string>,
 *     SnapshotRetentionLimit?: int,
 *     DailySnapshotTime?: string,
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServerlessCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServerlessCacheAsync(array{
 *     ServerlessCacheName?: string,
 *     Description?: string,
 *     Engine?: string,
 *     MajorEngineVersion?: string,
 *     CacheUsageLimits?: array{
 *         DataStorage?: array{Maximum?: int, Minimum?: int, Unit?: 'GB', ...},
 *         ECPUPerSecond?: array{Maximum?: int, Minimum?: int, ...},
 *         ...,
 *     },
 *     KmsKeyId?: string,
 *     SecurityGroupIds?: list<string>,
 *     SnapshotArnsToRestore?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UserGroupId?: string,
 *     SubnetIds?: list<string>,
 *     SnapshotRetentionLimit?: int,
 *     DailySnapshotTime?: string,
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServerlessCacheSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createServerlessCacheSnapshot(array{
 *     ServerlessCacheSnapshotName?: string,
 *     ServerlessCacheName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServerlessCacheSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServerlessCacheSnapshotAsync(array{
 *     ServerlessCacheSnapshotName?: string,
 *     ServerlessCacheName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createSnapshot(array{
 *     ReplicationGroupId?: string,
 *     CacheClusterId?: string,
 *     SnapshotName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotAsync(array{
 *     ReplicationGroupId?: string,
 *     CacheClusterId?: string,
 *     SnapshotName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     UserId?: string,
 *     UserName?: string,
 *     Engine?: string,
 *     Passwords?: list<string>,
 *     AccessString?: string,
 *     NoPasswordRequired?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AuthenticationMode?: array{Type?: 'iam'|'no-password-required'|'password', Passwords?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     UserId?: string,
 *     UserName?: string,
 *     Engine?: string,
 *     Passwords?: list<string>,
 *     AccessString?: string,
 *     NoPasswordRequired?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AuthenticationMode?: array{Type?: 'iam'|'no-password-required'|'password', Passwords?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserGroup(array $args = [])
 * @phpstan-method \Aws\Result createUserGroup(array{
 *     UserGroupId?: string,
 *     Engine?: string,
 *     UserIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserGroupAsync(array{
 *     UserGroupId?: string,
 *     Engine?: string,
 *     UserIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result decreaseNodeGroupsInGlobalReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result decreaseNodeGroupsInGlobalReplicationGroup(array{
 *     GlobalReplicationGroupId?: string,
 *     NodeGroupCount?: int,
 *     GlobalNodeGroupsToRemove?: list<string>,
 *     GlobalNodeGroupsToRetain?: list<string>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise decreaseNodeGroupsInGlobalReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise decreaseNodeGroupsInGlobalReplicationGroupAsync(array{
 *     GlobalReplicationGroupId?: string,
 *     NodeGroupCount?: int,
 *     GlobalNodeGroupsToRemove?: list<string>,
 *     GlobalNodeGroupsToRetain?: list<string>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result decreaseReplicaCount(array $args = [])
 * @phpstan-method \Aws\Result decreaseReplicaCount(array{
 *     ReplicationGroupId?: string,
 *     NewReplicaCount?: int,
 *     ReplicaConfiguration?: list<array{
 *         NodeGroupId?: string,
 *         NewReplicaCount?: int,
 *         PreferredAvailabilityZones?: list<string>,
 *         PreferredOutpostArns?: list<string>,
 *         ...,
 *     }>,
 *     ReplicasToRemove?: list<string>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise decreaseReplicaCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise decreaseReplicaCountAsync(array{
 *     ReplicationGroupId?: string,
 *     NewReplicaCount?: int,
 *     ReplicaConfiguration?: list<array{
 *         NodeGroupId?: string,
 *         NewReplicaCount?: int,
 *         PreferredAvailabilityZones?: list<string>,
 *         PreferredOutpostArns?: list<string>,
 *         ...,
 *     }>,
 *     ReplicasToRemove?: list<string>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCacheCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCacheCluster(array{CacheClusterId?: string, FinalSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCacheClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCacheClusterAsync(array{CacheClusterId?: string, FinalSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteCacheParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteCacheParameterGroup(array{CacheParameterGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCacheParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCacheParameterGroupAsync(array{CacheParameterGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteCacheSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteCacheSecurityGroup(array{CacheSecurityGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCacheSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCacheSecurityGroupAsync(array{CacheSecurityGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteCacheSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteCacheSubnetGroup(array{CacheSubnetGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCacheSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCacheSubnetGroupAsync(array{CacheSubnetGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteGlobalReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGlobalReplicationGroup(array{GlobalReplicationGroupId?: string, RetainPrimaryReplicationGroup?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlobalReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlobalReplicationGroupAsync(array{GlobalReplicationGroupId?: string, RetainPrimaryReplicationGroup?: bool, ...} $args = [])
 * @method \Aws\Result deleteReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationGroup(array{ReplicationGroupId?: string, RetainPrimaryCluster?: bool, FinalSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationGroupAsync(array{ReplicationGroupId?: string, RetainPrimaryCluster?: bool, FinalSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteServerlessCache(array $args = [])
 * @phpstan-method \Aws\Result deleteServerlessCache(array{ServerlessCacheName?: string, FinalSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServerlessCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServerlessCacheAsync(array{ServerlessCacheName?: string, FinalSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteServerlessCacheSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteServerlessCacheSnapshot(array{ServerlessCacheSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServerlessCacheSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServerlessCacheSnapshotAsync(array{ServerlessCacheSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshot(array{SnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array{SnapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{UserId?: string, ...} $args = [])
 * @method \Aws\Result deleteUserGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteUserGroup(array{UserGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserGroupAsync(array{UserGroupId?: string, ...} $args = [])
 * @method \Aws\Result describeCacheClusters(array $args = [])
 * @phpstan-method \Aws\Result describeCacheClusters(array{
 *     CacheClusterId?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ShowCacheNodeInfo?: bool,
 *     ShowCacheClustersNotInReplicationGroups?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCacheClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCacheClustersAsync(array{
 *     CacheClusterId?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ShowCacheNodeInfo?: bool,
 *     ShowCacheClustersNotInReplicationGroups?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCacheEngineVersions(array $args = [])
 * @phpstan-method \Aws\Result describeCacheEngineVersions(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     CacheParameterGroupFamily?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DefaultOnly?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCacheEngineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCacheEngineVersionsAsync(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     CacheParameterGroupFamily?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DefaultOnly?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCacheParameterGroups(array $args = [])
 * @phpstan-method \Aws\Result describeCacheParameterGroups(array{CacheParameterGroupName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCacheParameterGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCacheParameterGroupsAsync(array{CacheParameterGroupName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeCacheParameters(array $args = [])
 * @phpstan-method \Aws\Result describeCacheParameters(array{CacheParameterGroupName?: string, Source?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCacheParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCacheParametersAsync(array{CacheParameterGroupName?: string, Source?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeCacheSecurityGroups(array $args = [])
 * @phpstan-method \Aws\Result describeCacheSecurityGroups(array{CacheSecurityGroupName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCacheSecurityGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCacheSecurityGroupsAsync(array{CacheSecurityGroupName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeCacheSubnetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeCacheSubnetGroups(array{CacheSubnetGroupName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCacheSubnetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCacheSubnetGroupsAsync(array{CacheSubnetGroupName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeEngineDefaultParameters(array $args = [])
 * @phpstan-method \Aws\Result describeEngineDefaultParameters(array{CacheParameterGroupFamily?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEngineDefaultParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEngineDefaultParametersAsync(array{CacheParameterGroupFamily?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     SourceIdentifier?: string,
 *     SourceType?: 'cache-cluster'|'cache-parameter-group'|'cache-security-group'|'cache-subnet-group'|'replication-group'|'serverless-cache'|'serverless-cache-snapshot'|'user'|'user-group',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsAsync(array{
 *     SourceIdentifier?: string,
 *     SourceType?: 'cache-cluster'|'cache-parameter-group'|'cache-security-group'|'cache-subnet-group'|'replication-group'|'serverless-cache'|'serverless-cache-snapshot'|'user'|'user-group',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeGlobalReplicationGroups(array $args = [])
 * @phpstan-method \Aws\Result describeGlobalReplicationGroups(array{GlobalReplicationGroupId?: string, MaxRecords?: int, Marker?: string, ShowMemberInfo?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalReplicationGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGlobalReplicationGroupsAsync(array{GlobalReplicationGroupId?: string, MaxRecords?: int, Marker?: string, ShowMemberInfo?: bool, ...} $args = [])
 * @method \Aws\Result describeReplicationGroups(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationGroups(array{ReplicationGroupId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationGroupsAsync(array{ReplicationGroupId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeReservedCacheNodes(array $args = [])
 * @phpstan-method \Aws\Result describeReservedCacheNodes(array{
 *     ReservedCacheNodeId?: string,
 *     ReservedCacheNodesOfferingId?: string,
 *     CacheNodeType?: string,
 *     Duration?: string,
 *     ProductDescription?: string,
 *     OfferingType?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedCacheNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedCacheNodesAsync(array{
 *     ReservedCacheNodeId?: string,
 *     ReservedCacheNodesOfferingId?: string,
 *     CacheNodeType?: string,
 *     Duration?: string,
 *     ProductDescription?: string,
 *     OfferingType?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReservedCacheNodesOfferings(array $args = [])
 * @phpstan-method \Aws\Result describeReservedCacheNodesOfferings(array{
 *     ReservedCacheNodesOfferingId?: string,
 *     CacheNodeType?: string,
 *     Duration?: string,
 *     ProductDescription?: string,
 *     OfferingType?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedCacheNodesOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedCacheNodesOfferingsAsync(array{
 *     ReservedCacheNodesOfferingId?: string,
 *     CacheNodeType?: string,
 *     Duration?: string,
 *     ProductDescription?: string,
 *     OfferingType?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeServerlessCacheSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeServerlessCacheSnapshots(array{
 *     ServerlessCacheName?: string,
 *     ServerlessCacheSnapshotName?: string,
 *     SnapshotType?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServerlessCacheSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServerlessCacheSnapshotsAsync(array{
 *     ServerlessCacheName?: string,
 *     ServerlessCacheSnapshotName?: string,
 *     SnapshotType?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeServerlessCaches(array $args = [])
 * @phpstan-method \Aws\Result describeServerlessCaches(array{ServerlessCacheName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServerlessCachesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServerlessCachesAsync(array{ServerlessCacheName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeServiceUpdates(array $args = [])
 * @phpstan-method \Aws\Result describeServiceUpdates(array{
 *     ServiceUpdateName?: string,
 *     ServiceUpdateStatus?: list<'available'|'cancelled'|'expired'>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceUpdatesAsync(array{
 *     ServiceUpdateName?: string,
 *     ServiceUpdateStatus?: list<'available'|'cancelled'|'expired'>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeSnapshots(array{
 *     ReplicationGroupId?: string,
 *     CacheClusterId?: string,
 *     SnapshotName?: string,
 *     SnapshotSource?: string,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ShowNodeGroupConfig?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array{
 *     ReplicationGroupId?: string,
 *     CacheClusterId?: string,
 *     SnapshotName?: string,
 *     SnapshotSource?: string,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ShowNodeGroupConfig?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeUpdateActions(array $args = [])
 * @phpstan-method \Aws\Result describeUpdateActions(array{
 *     ServiceUpdateName?: string,
 *     ReplicationGroupIds?: list<string>,
 *     CacheClusterIds?: list<string>,
 *     Engine?: string,
 *     ServiceUpdateStatus?: list<'available'|'cancelled'|'expired'>,
 *     ServiceUpdateTimeRange?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UpdateActionStatus?: list<'complete'|'in-progress'|'not-applicable'|'not-applied'|'scheduled'|'scheduling'|'stopped'|'stopping'|'waiting-to-start'>,
 *     ShowNodeLevelUpdateStatus?: bool,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUpdateActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUpdateActionsAsync(array{
 *     ServiceUpdateName?: string,
 *     ReplicationGroupIds?: list<string>,
 *     CacheClusterIds?: list<string>,
 *     Engine?: string,
 *     ServiceUpdateStatus?: list<'available'|'cancelled'|'expired'>,
 *     ServiceUpdateTimeRange?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UpdateActionStatus?: list<'complete'|'in-progress'|'not-applicable'|'not-applied'|'scheduled'|'scheduling'|'stopped'|'stopping'|'waiting-to-start'>,
 *     ShowNodeLevelUpdateStatus?: bool,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeUserGroups(array $args = [])
 * @phpstan-method \Aws\Result describeUserGroups(array{UserGroupId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserGroupsAsync(array{UserGroupId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeUsers(array $args = [])
 * @phpstan-method \Aws\Result describeUsers(array{
 *     Engine?: string,
 *     UserId?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUsersAsync(array{
 *     Engine?: string,
 *     UserId?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateGlobalReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result disassociateGlobalReplicationGroup(array{GlobalReplicationGroupId?: string, ReplicationGroupId?: string, ReplicationGroupRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateGlobalReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateGlobalReplicationGroupAsync(array{GlobalReplicationGroupId?: string, ReplicationGroupId?: string, ReplicationGroupRegion?: string, ...} $args = [])
 * @method \Aws\Result exportServerlessCacheSnapshot(array $args = [])
 * @phpstan-method \Aws\Result exportServerlessCacheSnapshot(array{ServerlessCacheSnapshotName?: string, S3BucketName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportServerlessCacheSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportServerlessCacheSnapshotAsync(array{ServerlessCacheSnapshotName?: string, S3BucketName?: string, ...} $args = [])
 * @method \Aws\Result failoverGlobalReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result failoverGlobalReplicationGroup(array{GlobalReplicationGroupId?: string, PrimaryRegion?: string, PrimaryReplicationGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise failoverGlobalReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise failoverGlobalReplicationGroupAsync(array{GlobalReplicationGroupId?: string, PrimaryRegion?: string, PrimaryReplicationGroupId?: string, ...} $args = [])
 * @method \Aws\Result increaseNodeGroupsInGlobalReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result increaseNodeGroupsInGlobalReplicationGroup(array{
 *     GlobalReplicationGroupId?: string,
 *     NodeGroupCount?: int,
 *     RegionalConfigurations?: list<array{
 *         ReplicationGroupId?: string,
 *         ReplicationGroupRegion?: string,
 *         ReshardingConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise increaseNodeGroupsInGlobalReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise increaseNodeGroupsInGlobalReplicationGroupAsync(array{
 *     GlobalReplicationGroupId?: string,
 *     NodeGroupCount?: int,
 *     RegionalConfigurations?: list<array{
 *         ReplicationGroupId?: string,
 *         ReplicationGroupRegion?: string,
 *         ReshardingConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result increaseReplicaCount(array $args = [])
 * @phpstan-method \Aws\Result increaseReplicaCount(array{
 *     ReplicationGroupId?: string,
 *     NewReplicaCount?: int,
 *     ReplicaConfiguration?: list<array{
 *         NodeGroupId?: string,
 *         NewReplicaCount?: int,
 *         PreferredAvailabilityZones?: list<string>,
 *         PreferredOutpostArns?: list<string>,
 *         ...,
 *     }>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise increaseReplicaCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise increaseReplicaCountAsync(array{
 *     ReplicationGroupId?: string,
 *     NewReplicaCount?: int,
 *     ReplicaConfiguration?: list<array{
 *         NodeGroupId?: string,
 *         NewReplicaCount?: int,
 *         PreferredAvailabilityZones?: list<string>,
 *         PreferredOutpostArns?: list<string>,
 *         ...,
 *     }>,
 *     ApplyImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAllowedNodeTypeModifications(array $args = [])
 * @phpstan-method \Aws\Result listAllowedNodeTypeModifications(array{CacheClusterId?: string, ReplicationGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAllowedNodeTypeModificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAllowedNodeTypeModificationsAsync(array{CacheClusterId?: string, ReplicationGroupId?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceName?: string, ...} $args = [])
 * @method \Aws\Result modifyCacheCluster(array $args = [])
 * @phpstan-method \Aws\Result modifyCacheCluster(array{
 *     CacheClusterId?: string,
 *     NumCacheNodes?: int,
 *     CacheNodeIdsToRemove?: list<string>,
 *     AZMode?: 'cross-az'|'single-az',
 *     NewAvailabilityZones?: list<string>,
 *     CacheSecurityGroupNames?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     NotificationTopicArn?: string,
 *     CacheParameterGroupName?: string,
 *     NotificationTopicStatus?: string,
 *     ApplyImmediately?: bool,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     SnapshotRetentionLimit?: int,
 *     SnapshotWindow?: string,
 *     CacheNodeType?: string,
 *     AuthToken?: string,
 *     AuthTokenUpdateStrategy?: 'DELETE'|'ROTATE'|'SET',
 *     LogDeliveryConfigurations?: list<array{
 *         LogType?: 'engine-log'|'slow-log',
 *         DestinationType?: 'cloudwatch-logs'|'kinesis-firehose',
 *         DestinationDetails?: array,
 *         LogFormat?: 'json'|'text',
 *         Enabled?: bool,
 *         ...,
 *     }>,
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     ScaleConfig?: array{ScalePercentage?: int, ScaleIntervalMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCacheClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCacheClusterAsync(array{
 *     CacheClusterId?: string,
 *     NumCacheNodes?: int,
 *     CacheNodeIdsToRemove?: list<string>,
 *     AZMode?: 'cross-az'|'single-az',
 *     NewAvailabilityZones?: list<string>,
 *     CacheSecurityGroupNames?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     NotificationTopicArn?: string,
 *     CacheParameterGroupName?: string,
 *     NotificationTopicStatus?: string,
 *     ApplyImmediately?: bool,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     SnapshotRetentionLimit?: int,
 *     SnapshotWindow?: string,
 *     CacheNodeType?: string,
 *     AuthToken?: string,
 *     AuthTokenUpdateStrategy?: 'DELETE'|'ROTATE'|'SET',
 *     LogDeliveryConfigurations?: list<array{
 *         LogType?: 'engine-log'|'slow-log',
 *         DestinationType?: 'cloudwatch-logs'|'kinesis-firehose',
 *         DestinationDetails?: array,
 *         LogFormat?: 'json'|'text',
 *         Enabled?: bool,
 *         ...,
 *     }>,
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     ScaleConfig?: array{ScalePercentage?: int, ScaleIntervalMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyCacheParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyCacheParameterGroup(array{
 *     CacheParameterGroupName?: string,
 *     ParameterNameValues?: list<array{ParameterName?: string, ParameterValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCacheParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCacheParameterGroupAsync(array{
 *     CacheParameterGroupName?: string,
 *     ParameterNameValues?: list<array{ParameterName?: string, ParameterValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyCacheSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyCacheSubnetGroup(array{CacheSubnetGroupName?: string, CacheSubnetGroupDescription?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCacheSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCacheSubnetGroupAsync(array{CacheSubnetGroupName?: string, CacheSubnetGroupDescription?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyGlobalReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyGlobalReplicationGroup(array{
 *     GlobalReplicationGroupId?: string,
 *     ApplyImmediately?: bool,
 *     CacheNodeType?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     CacheParameterGroupName?: string,
 *     GlobalReplicationGroupDescription?: string,
 *     AutomaticFailoverEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyGlobalReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyGlobalReplicationGroupAsync(array{
 *     GlobalReplicationGroupId?: string,
 *     ApplyImmediately?: bool,
 *     CacheNodeType?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     CacheParameterGroupName?: string,
 *     GlobalReplicationGroupDescription?: string,
 *     AutomaticFailoverEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyReplicationGroup(array{
 *     ReplicationGroupId?: string,
 *     ReplicationGroupDescription?: string,
 *     PrimaryClusterId?: string,
 *     SnapshottingClusterId?: string,
 *     AutomaticFailoverEnabled?: bool,
 *     MultiAZEnabled?: bool,
 *     NodeGroupId?: string,
 *     CacheSecurityGroupNames?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     NotificationTopicArn?: string,
 *     CacheParameterGroupName?: string,
 *     NotificationTopicStatus?: string,
 *     ApplyImmediately?: bool,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     SnapshotRetentionLimit?: int,
 *     SnapshotWindow?: string,
 *     CacheNodeType?: string,
 *     AuthToken?: string,
 *     AuthTokenUpdateStrategy?: 'DELETE'|'ROTATE'|'SET',
 *     UserGroupIdsToAdd?: list<string>,
 *     UserGroupIdsToRemove?: list<string>,
 *     RemoveUserGroups?: bool,
 *     LogDeliveryConfigurations?: list<array{
 *         LogType?: 'engine-log'|'slow-log',
 *         DestinationType?: 'cloudwatch-logs'|'kinesis-firehose',
 *         DestinationDetails?: array,
 *         LogFormat?: 'json'|'text',
 *         Enabled?: bool,
 *         ...,
 *     }>,
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     TransitEncryptionEnabled?: bool,
 *     TransitEncryptionMode?: 'preferred'|'required',
 *     ClusterMode?: 'compatible'|'disabled'|'enabled',
 *     Durability?: 'async'|'default'|'disabled'|'sync',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyReplicationGroupAsync(array{
 *     ReplicationGroupId?: string,
 *     ReplicationGroupDescription?: string,
 *     PrimaryClusterId?: string,
 *     SnapshottingClusterId?: string,
 *     AutomaticFailoverEnabled?: bool,
 *     MultiAZEnabled?: bool,
 *     NodeGroupId?: string,
 *     CacheSecurityGroupNames?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     NotificationTopicArn?: string,
 *     CacheParameterGroupName?: string,
 *     NotificationTopicStatus?: string,
 *     ApplyImmediately?: bool,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     SnapshotRetentionLimit?: int,
 *     SnapshotWindow?: string,
 *     CacheNodeType?: string,
 *     AuthToken?: string,
 *     AuthTokenUpdateStrategy?: 'DELETE'|'ROTATE'|'SET',
 *     UserGroupIdsToAdd?: list<string>,
 *     UserGroupIdsToRemove?: list<string>,
 *     RemoveUserGroups?: bool,
 *     LogDeliveryConfigurations?: list<array{
 *         LogType?: 'engine-log'|'slow-log',
 *         DestinationType?: 'cloudwatch-logs'|'kinesis-firehose',
 *         DestinationDetails?: array,
 *         LogFormat?: 'json'|'text',
 *         Enabled?: bool,
 *         ...,
 *     }>,
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     TransitEncryptionEnabled?: bool,
 *     TransitEncryptionMode?: 'preferred'|'required',
 *     ClusterMode?: 'compatible'|'disabled'|'enabled',
 *     Durability?: 'async'|'default'|'disabled'|'sync',
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyReplicationGroupShardConfiguration(array $args = [])
 * @phpstan-method \Aws\Result modifyReplicationGroupShardConfiguration(array{
 *     ReplicationGroupId?: string,
 *     NodeGroupCount?: int,
 *     ApplyImmediately?: bool,
 *     ReshardingConfiguration?: list<array{NodeGroupId?: string, PreferredAvailabilityZones?: list<string>, ...}>,
 *     NodeGroupsToRemove?: list<string>,
 *     NodeGroupsToRetain?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyReplicationGroupShardConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyReplicationGroupShardConfigurationAsync(array{
 *     ReplicationGroupId?: string,
 *     NodeGroupCount?: int,
 *     ApplyImmediately?: bool,
 *     ReshardingConfiguration?: list<array{NodeGroupId?: string, PreferredAvailabilityZones?: list<string>, ...}>,
 *     NodeGroupsToRemove?: list<string>,
 *     NodeGroupsToRetain?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyServerlessCache(array $args = [])
 * @phpstan-method \Aws\Result modifyServerlessCache(array{
 *     ServerlessCacheName?: string,
 *     Description?: string,
 *     CacheUsageLimits?: array{
 *         DataStorage?: array{Maximum?: int, Minimum?: int, Unit?: 'GB', ...},
 *         ECPUPerSecond?: array{Maximum?: int, Minimum?: int, ...},
 *         ...,
 *     },
 *     RemoveUserGroup?: bool,
 *     UserGroupId?: string,
 *     SecurityGroupIds?: list<string>,
 *     SnapshotRetentionLimit?: int,
 *     DailySnapshotTime?: string,
 *     Engine?: string,
 *     MajorEngineVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyServerlessCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyServerlessCacheAsync(array{
 *     ServerlessCacheName?: string,
 *     Description?: string,
 *     CacheUsageLimits?: array{
 *         DataStorage?: array{Maximum?: int, Minimum?: int, Unit?: 'GB', ...},
 *         ECPUPerSecond?: array{Maximum?: int, Minimum?: int, ...},
 *         ...,
 *     },
 *     RemoveUserGroup?: bool,
 *     UserGroupId?: string,
 *     SecurityGroupIds?: list<string>,
 *     SnapshotRetentionLimit?: int,
 *     DailySnapshotTime?: string,
 *     Engine?: string,
 *     MajorEngineVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyUser(array $args = [])
 * @phpstan-method \Aws\Result modifyUser(array{
 *     UserId?: string,
 *     AccessString?: string,
 *     AppendAccessString?: string,
 *     Passwords?: list<string>,
 *     NoPasswordRequired?: bool,
 *     AuthenticationMode?: array{Type?: 'iam'|'no-password-required'|'password', Passwords?: list<string>, ...},
 *     Engine?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyUserAsync(array{
 *     UserId?: string,
 *     AccessString?: string,
 *     AppendAccessString?: string,
 *     Passwords?: list<string>,
 *     NoPasswordRequired?: bool,
 *     AuthenticationMode?: array{Type?: 'iam'|'no-password-required'|'password', Passwords?: list<string>, ...},
 *     Engine?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyUserGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyUserGroup(array{UserGroupId?: string, UserIdsToAdd?: list<string>, UserIdsToRemove?: list<string>, Engine?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyUserGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyUserGroupAsync(array{UserGroupId?: string, UserIdsToAdd?: list<string>, UserIdsToRemove?: list<string>, Engine?: string, ...} $args = [])
 * @method \Aws\Result purchaseReservedCacheNodesOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseReservedCacheNodesOffering(array{
 *     ReservedCacheNodesOfferingId?: string,
 *     ReservedCacheNodeId?: string,
 *     CacheNodeCount?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseReservedCacheNodesOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseReservedCacheNodesOfferingAsync(array{
 *     ReservedCacheNodesOfferingId?: string,
 *     ReservedCacheNodeId?: string,
 *     CacheNodeCount?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rebalanceSlotsInGlobalReplicationGroup(array $args = [])
 * @phpstan-method \Aws\Result rebalanceSlotsInGlobalReplicationGroup(array{GlobalReplicationGroupId?: string, ApplyImmediately?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebalanceSlotsInGlobalReplicationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebalanceSlotsInGlobalReplicationGroupAsync(array{GlobalReplicationGroupId?: string, ApplyImmediately?: bool, ...} $args = [])
 * @method \Aws\Result rebootCacheCluster(array $args = [])
 * @phpstan-method \Aws\Result rebootCacheCluster(array{CacheClusterId?: string, CacheNodeIdsToReboot?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootCacheClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootCacheClusterAsync(array{CacheClusterId?: string, CacheNodeIdsToReboot?: list<string>, ...} $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromResource(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result resetCacheParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result resetCacheParameterGroup(array{
 *     CacheParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     ParameterNameValues?: list<array{ParameterName?: string, ParameterValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resetCacheParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetCacheParameterGroupAsync(array{
 *     CacheParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     ParameterNameValues?: list<array{ParameterName?: string, ParameterValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result revokeCacheSecurityGroupIngress(array $args = [])
 * @phpstan-method \Aws\Result revokeCacheSecurityGroupIngress(array{CacheSecurityGroupName?: string, EC2SecurityGroupName?: string, EC2SecurityGroupOwnerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeCacheSecurityGroupIngressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeCacheSecurityGroupIngressAsync(array{CacheSecurityGroupName?: string, EC2SecurityGroupName?: string, EC2SecurityGroupOwnerId?: string, ...} $args = [])
 * @method \Aws\Result startMigration(array $args = [])
 * @phpstan-method \Aws\Result startMigration(array{
 *     ReplicationGroupId?: string,
 *     CustomerNodeEndpointList?: list<array{Address?: string, Port?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMigrationAsync(array{
 *     ReplicationGroupId?: string,
 *     CustomerNodeEndpointList?: list<array{Address?: string, Port?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result testFailover(array $args = [])
 * @phpstan-method \Aws\Result testFailover(array{ReplicationGroupId?: string, NodeGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testFailoverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testFailoverAsync(array{ReplicationGroupId?: string, NodeGroupId?: string, ...} $args = [])
 * @method \Aws\Result testMigration(array $args = [])
 * @phpstan-method \Aws\Result testMigration(array{
 *     ReplicationGroupId?: string,
 *     CustomerNodeEndpointList?: list<array{Address?: string, Port?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testMigrationAsync(array{
 *     ReplicationGroupId?: string,
 *     CustomerNodeEndpointList?: list<array{Address?: string, Port?: int, ...}>,
 *     ...,
 * } $args = [])
 */
class ElastiCacheClient extends AwsClient {}
