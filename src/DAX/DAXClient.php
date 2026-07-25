<?php
namespace Aws\DAX;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DynamoDB Accelerator (DAX)** service.
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     ClusterName?: string,
 *     NodeType?: string,
 *     Description?: string,
 *     ReplicationFactor?: int,
 *     AvailabilityZones?: list<string>,
 *     SubnetGroupName?: string,
 *     SecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     NotificationTopicArn?: string,
 *     IamRoleArn?: string,
 *     ParameterGroupName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SSESpecification?: array{Enabled?: bool, ...},
 *     ClusterEndpointEncryptionType?: 'NONE'|'TLS',
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     ClusterName?: string,
 *     NodeType?: string,
 *     Description?: string,
 *     ReplicationFactor?: int,
 *     AvailabilityZones?: list<string>,
 *     SubnetGroupName?: string,
 *     SecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     NotificationTopicArn?: string,
 *     IamRoleArn?: string,
 *     ParameterGroupName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SSESpecification?: array{Enabled?: bool, ...},
 *     ClusterEndpointEncryptionType?: 'NONE'|'TLS',
 *     NetworkType?: 'dual_stack'|'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result createParameterGroup(array{ParameterGroupName?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createParameterGroupAsync(array{ParameterGroupName?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result createSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result createSubnetGroup(array{SubnetGroupName?: string, Description?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubnetGroupAsync(array{SubnetGroupName?: string, Description?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \Aws\Result decreaseReplicationFactor(array $args = [])
 * @phpstan-method \Aws\Result decreaseReplicationFactor(array{
 *     ClusterName?: string,
 *     NewReplicationFactor?: int,
 *     AvailabilityZones?: list<string>,
 *     NodeIdsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise decreaseReplicationFactorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise decreaseReplicationFactorAsync(array{
 *     ClusterName?: string,
 *     NewReplicationFactor?: int,
 *     AvailabilityZones?: list<string>,
 *     NodeIdsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{ClusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{ClusterName?: string, ...} $args = [])
 * @method \Aws\Result deleteParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteParameterGroup(array{ParameterGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteParameterGroupAsync(array{ParameterGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteSubnetGroup(array{SubnetGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubnetGroupAsync(array{SubnetGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeClusters(array $args = [])
 * @phpstan-method \Aws\Result describeClusters(array{ClusterNames?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClustersAsync(array{ClusterNames?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeDefaultParameters(array $args = [])
 * @phpstan-method \Aws\Result describeDefaultParameters(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDefaultParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDefaultParametersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     SourceName?: string,
 *     SourceType?: 'CLUSTER'|'PARAMETER_GROUP'|'SUBNET_GROUP',
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
 *     SourceType?: 'CLUSTER'|'PARAMETER_GROUP'|'SUBNET_GROUP',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeParameterGroups(array $args = [])
 * @phpstan-method \Aws\Result describeParameterGroups(array{ParameterGroupNames?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeParameterGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeParameterGroupsAsync(array{ParameterGroupNames?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeParameters(array $args = [])
 * @phpstan-method \Aws\Result describeParameters(array{ParameterGroupName?: string, Source?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeParametersAsync(array{ParameterGroupName?: string, Source?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeSubnetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeSubnetGroups(array{SubnetGroupNames?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSubnetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSubnetGroupsAsync(array{SubnetGroupNames?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result increaseReplicationFactor(array $args = [])
 * @phpstan-method \Aws\Result increaseReplicationFactor(array{ClusterName?: string, NewReplicationFactor?: int, AvailabilityZones?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise increaseReplicationFactorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise increaseReplicationFactorAsync(array{ClusterName?: string, NewReplicationFactor?: int, AvailabilityZones?: list<string>, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ResourceName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ResourceName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result rebootNode(array $args = [])
 * @phpstan-method \Aws\Result rebootNode(array{ClusterName?: string, NodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootNodeAsync(array{ClusterName?: string, NodeId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{
 *     ClusterName?: string,
 *     Description?: string,
 *     PreferredMaintenanceWindow?: string,
 *     NotificationTopicArn?: string,
 *     NotificationTopicStatus?: string,
 *     ParameterGroupName?: string,
 *     SecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     ClusterName?: string,
 *     Description?: string,
 *     PreferredMaintenanceWindow?: string,
 *     NotificationTopicArn?: string,
 *     NotificationTopicStatus?: string,
 *     ParameterGroupName?: string,
 *     SecurityGroupIds?: list<string>,
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
 */
class DAXClient extends AwsClient {}
