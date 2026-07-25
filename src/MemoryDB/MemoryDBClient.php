<?php
namespace Aws\MemoryDB;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon MemoryDB** service.
 * @method \Aws\Result batchUpdateCluster(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateCluster(array{ClusterNames?: list<string>, ServiceUpdate?: array{ServiceUpdateNameToApply?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateClusterAsync(array{ClusterNames?: list<string>, ServiceUpdate?: array{ServiceUpdateNameToApply?: string, ...}, ...} $args = [])
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
 * @method \Aws\Result createACL(array $args = [])
 * @phpstan-method \Aws\Result createACL(array{ACLName?: string, UserNames?: list<string>, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createACLAsync(array{ACLName?: string, UserNames?: list<string>, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     ClusterName?: string,
 *     NodeType?: string,
 *     MultiRegionClusterName?: string,
 *     ParameterGroupName?: string,
 *     Description?: string,
 *     NumShards?: int,
 *     NumReplicasPerShard?: int,
 *     SubnetGroupName?: string,
 *     SecurityGroupIds?: list<string>,
 *     MaintenanceWindow?: string,
 *     Port?: int,
 *     SnsTopicArn?: string,
 *     TLSEnabled?: bool,
 *     KmsKeyId?: string,
 *     SnapshotArns?: list<string>,
 *     SnapshotName?: string,
 *     SnapshotRetentionLimit?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SnapshotWindow?: string,
 *     ACLName?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     DataTiering?: bool,
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     ClusterName?: string,
 *     NodeType?: string,
 *     MultiRegionClusterName?: string,
 *     ParameterGroupName?: string,
 *     Description?: string,
 *     NumShards?: int,
 *     NumReplicasPerShard?: int,
 *     SubnetGroupName?: string,
 *     SecurityGroupIds?: list<string>,
 *     MaintenanceWindow?: string,
 *     Port?: int,
 *     SnsTopicArn?: string,
 *     TLSEnabled?: bool,
 *     KmsKeyId?: string,
 *     SnapshotArns?: list<string>,
 *     SnapshotName?: string,
 *     SnapshotRetentionLimit?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SnapshotWindow?: string,
 *     ACLName?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     DataTiering?: bool,
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMultiRegionCluster(array $args = [])
 * @phpstan-method \Aws\Result createMultiRegionCluster(array{
 *     MultiRegionClusterNameSuffix?: string,
 *     Description?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     NodeType?: string,
 *     MultiRegionParameterGroupName?: string,
 *     NumShards?: int,
 *     TLSEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMultiRegionClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMultiRegionClusterAsync(array{
 *     MultiRegionClusterNameSuffix?: string,
 *     Description?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     NodeType?: string,
 *     MultiRegionParameterGroupName?: string,
 *     NumShards?: int,
 *     TLSEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result createParameterGroup(array{
 *     ParameterGroupName?: string,
 *     Family?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createParameterGroupAsync(array{
 *     ParameterGroupName?: string,
 *     Family?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createSnapshot(array{
 *     ClusterName?: string,
 *     SnapshotName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotAsync(array{
 *     ClusterName?: string,
 *     SnapshotName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result createSubnetGroup(array{
 *     SubnetGroupName?: string,
 *     Description?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubnetGroupAsync(array{
 *     SubnetGroupName?: string,
 *     Description?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     UserName?: string,
 *     AuthenticationMode?: array{Type?: 'iam'|'password', Passwords?: list<string>, ...},
 *     AccessString?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     UserName?: string,
 *     AuthenticationMode?: array{Type?: 'iam'|'password', Passwords?: list<string>, ...},
 *     AccessString?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteACL(array $args = [])
 * @phpstan-method \Aws\Result deleteACL(array{ACLName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteACLAsync(array{ACLName?: string, ...} $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{ClusterName?: string, MultiRegionClusterName?: string, FinalSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{ClusterName?: string, MultiRegionClusterName?: string, FinalSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteMultiRegionCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteMultiRegionCluster(array{MultiRegionClusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMultiRegionClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMultiRegionClusterAsync(array{MultiRegionClusterName?: string, ...} $args = [])
 * @method \Aws\Result deleteParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteParameterGroup(array{ParameterGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteParameterGroupAsync(array{ParameterGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshot(array{SnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array{SnapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteSubnetGroup(array{SubnetGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubnetGroupAsync(array{SubnetGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{UserName?: string, ...} $args = [])
 * @method \Aws\Result describeACLs(array $args = [])
 * @phpstan-method \Aws\Result describeACLs(array{ACLName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeACLsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeACLsAsync(array{ACLName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeClusters(array $args = [])
 * @phpstan-method \Aws\Result describeClusters(array{ClusterName?: string, MaxResults?: int, NextToken?: string, ShowShardDetails?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClustersAsync(array{ClusterName?: string, MaxResults?: int, NextToken?: string, ShowShardDetails?: bool, ...} $args = [])
 * @method \Aws\Result describeEngineVersions(array $args = [])
 * @phpstan-method \Aws\Result describeEngineVersions(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     ParameterGroupFamily?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     DefaultOnly?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEngineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEngineVersionsAsync(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     ParameterGroupFamily?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     DefaultOnly?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     SourceName?: string,
 *     SourceType?: 'acl'|'cluster'|'node'|'parameter-group'|'subnet-group'|'user',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsAsync(array{
 *     SourceName?: string,
 *     SourceType?: 'acl'|'cluster'|'node'|'parameter-group'|'subnet-group'|'user',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMultiRegionClusters(array $args = [])
 * @phpstan-method \Aws\Result describeMultiRegionClusters(array{MultiRegionClusterName?: string, MaxResults?: int, NextToken?: string, ShowClusterDetails?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMultiRegionClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMultiRegionClustersAsync(array{MultiRegionClusterName?: string, MaxResults?: int, NextToken?: string, ShowClusterDetails?: bool, ...} $args = [])
 * @method \Aws\Result describeMultiRegionParameterGroups(array $args = [])
 * @phpstan-method \Aws\Result describeMultiRegionParameterGroups(array{MultiRegionParameterGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMultiRegionParameterGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMultiRegionParameterGroupsAsync(array{MultiRegionParameterGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeMultiRegionParameters(array $args = [])
 * @phpstan-method \Aws\Result describeMultiRegionParameters(array{MultiRegionParameterGroupName?: string, Source?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMultiRegionParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMultiRegionParametersAsync(array{MultiRegionParameterGroupName?: string, Source?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeParameterGroups(array $args = [])
 * @phpstan-method \Aws\Result describeParameterGroups(array{ParameterGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeParameterGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeParameterGroupsAsync(array{ParameterGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeParameters(array $args = [])
 * @phpstan-method \Aws\Result describeParameters(array{ParameterGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeParametersAsync(array{ParameterGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeReservedNodes(array $args = [])
 * @phpstan-method \Aws\Result describeReservedNodes(array{
 *     ReservationId?: string,
 *     ReservedNodesOfferingId?: string,
 *     NodeType?: string,
 *     Duration?: string,
 *     OfferingType?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedNodesAsync(array{
 *     ReservationId?: string,
 *     ReservedNodesOfferingId?: string,
 *     NodeType?: string,
 *     Duration?: string,
 *     OfferingType?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReservedNodesOfferings(array $args = [])
 * @phpstan-method \Aws\Result describeReservedNodesOfferings(array{
 *     ReservedNodesOfferingId?: string,
 *     NodeType?: string,
 *     Duration?: string,
 *     OfferingType?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedNodesOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedNodesOfferingsAsync(array{
 *     ReservedNodesOfferingId?: string,
 *     NodeType?: string,
 *     Duration?: string,
 *     OfferingType?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeServiceUpdates(array $args = [])
 * @phpstan-method \Aws\Result describeServiceUpdates(array{
 *     ServiceUpdateName?: string,
 *     ClusterNames?: list<string>,
 *     Status?: list<'available'|'complete'|'in-progress'|'scheduled'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceUpdatesAsync(array{
 *     ServiceUpdateName?: string,
 *     ClusterNames?: list<string>,
 *     Status?: list<'available'|'complete'|'in-progress'|'scheduled'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeSnapshots(array{
 *     ClusterName?: string,
 *     SnapshotName?: string,
 *     Source?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ShowDetail?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array{
 *     ClusterName?: string,
 *     SnapshotName?: string,
 *     Source?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ShowDetail?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSubnetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeSubnetGroups(array{SubnetGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSubnetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSubnetGroupsAsync(array{SubnetGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeUsers(array $args = [])
 * @phpstan-method \Aws\Result describeUsers(array{
 *     UserName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUsersAsync(array{
 *     UserName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result failoverShard(array $args = [])
 * @phpstan-method \Aws\Result failoverShard(array{ClusterName?: string, ShardName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise failoverShardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise failoverShardAsync(array{ClusterName?: string, ShardName?: string, ...} $args = [])
 * @method \Aws\Result listAllowedMultiRegionClusterUpdates(array $args = [])
 * @phpstan-method \Aws\Result listAllowedMultiRegionClusterUpdates(array{MultiRegionClusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAllowedMultiRegionClusterUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAllowedMultiRegionClusterUpdatesAsync(array{MultiRegionClusterName?: string, ...} $args = [])
 * @method \Aws\Result listAllowedNodeTypeUpdates(array $args = [])
 * @phpstan-method \Aws\Result listAllowedNodeTypeUpdates(array{ClusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAllowedNodeTypeUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAllowedNodeTypeUpdatesAsync(array{ClusterName?: string, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result purchaseReservedNodesOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseReservedNodesOffering(array{
 *     ReservedNodesOfferingId?: string,
 *     ReservationId?: string,
 *     NodeCount?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseReservedNodesOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseReservedNodesOfferingAsync(array{
 *     ReservedNodesOfferingId?: string,
 *     ReservationId?: string,
 *     NodeCount?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resetParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result resetParameterGroup(array{ParameterGroupName?: string, AllParameters?: bool, ParameterNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetParameterGroupAsync(array{ParameterGroupName?: string, AllParameters?: bool, ParameterNames?: list<string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateACL(array $args = [])
 * @phpstan-method \Aws\Result updateACL(array{ACLName?: string, UserNamesToAdd?: list<string>, UserNamesToRemove?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateACLAsync(array{ACLName?: string, UserNamesToAdd?: list<string>, UserNamesToRemove?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{
 *     ClusterName?: string,
 *     Description?: string,
 *     SecurityGroupIds?: list<string>,
 *     MaintenanceWindow?: string,
 *     SnsTopicArn?: string,
 *     SnsTopicStatus?: string,
 *     ParameterGroupName?: string,
 *     SnapshotWindow?: string,
 *     SnapshotRetentionLimit?: int,
 *     NodeType?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     ReplicaConfiguration?: array{ReplicaCount?: int, ...},
 *     ShardConfiguration?: array{ShardCount?: int, ...},
 *     ACLName?: string,
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     ClusterName?: string,
 *     Description?: string,
 *     SecurityGroupIds?: list<string>,
 *     MaintenanceWindow?: string,
 *     SnsTopicArn?: string,
 *     SnsTopicStatus?: string,
 *     ParameterGroupName?: string,
 *     SnapshotWindow?: string,
 *     SnapshotRetentionLimit?: int,
 *     NodeType?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     ReplicaConfiguration?: array{ReplicaCount?: int, ...},
 *     ShardConfiguration?: array{ShardCount?: int, ...},
 *     ACLName?: string,
 *     IpDiscovery?: 'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMultiRegionCluster(array $args = [])
 * @phpstan-method \Aws\Result updateMultiRegionCluster(array{
 *     MultiRegionClusterName?: string,
 *     NodeType?: string,
 *     Description?: string,
 *     EngineVersion?: string,
 *     ShardConfiguration?: array{ShardCount?: int, ...},
 *     MultiRegionParameterGroupName?: string,
 *     UpdateStrategy?: 'coordinated'|'uncoordinated',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMultiRegionClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMultiRegionClusterAsync(array{
 *     MultiRegionClusterName?: string,
 *     NodeType?: string,
 *     Description?: string,
 *     EngineVersion?: string,
 *     ShardConfiguration?: array{ShardCount?: int, ...},
 *     MultiRegionParameterGroupName?: string,
 *     UpdateStrategy?: 'coordinated'|'uncoordinated',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result updateParameterGroup(array{
 *     ParameterGroupName?: string,
 *     ParameterNameValues?: list<array{ParameterName?: string, ParameterValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateParameterGroupAsync(array{
 *     ParameterGroupName?: string,
 *     ParameterNameValues?: list<array{ParameterName?: string, ParameterValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result updateSubnetGroup(array{SubnetGroupName?: string, Description?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubnetGroupAsync(array{SubnetGroupName?: string, Description?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     UserName?: string,
 *     AuthenticationMode?: array{Type?: 'iam'|'password', Passwords?: list<string>, ...},
 *     AccessString?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     UserName?: string,
 *     AuthenticationMode?: array{Type?: 'iam'|'password', Passwords?: list<string>, ...},
 *     AccessString?: string,
 *     ...,
 * } $args = [])
 */
class MemoryDBClient extends AwsClient {}
