<?php
namespace Aws\DocDBElastic;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DocumentDB Elastic Clusters** service.
 * @method \Aws\Result applyPendingMaintenanceAction(array $args = [])
 * @phpstan-method \Aws\Result applyPendingMaintenanceAction(array{
 *     applyAction?: string,
 *     applyOn?: string,
 *     optInType?: 'APPLY_ON'|'IMMEDIATE'|'NEXT_MAINTENANCE'|'UNDO_OPT_IN',
 *     resourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array{
 *     applyAction?: string,
 *     applyOn?: string,
 *     optInType?: 'APPLY_ON'|'IMMEDIATE'|'NEXT_MAINTENANCE'|'UNDO_OPT_IN',
 *     resourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result copyClusterSnapshot(array{
 *     copyTags?: bool,
 *     kmsKeyId?: string,
 *     snapshotArn?: string,
 *     tags?: array<string, string>,
 *     targetSnapshotName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyClusterSnapshotAsync(array{
 *     copyTags?: bool,
 *     kmsKeyId?: string,
 *     snapshotArn?: string,
 *     tags?: array<string, string>,
 *     targetSnapshotName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     adminUserName?: string,
 *     adminUserPassword?: string,
 *     authType?: 'PLAIN_TEXT'|'SECRET_ARN',
 *     backupRetentionPeriod?: int,
 *     clientToken?: string,
 *     clusterName?: string,
 *     kmsKeyId?: string,
 *     preferredBackupWindow?: string,
 *     preferredMaintenanceWindow?: string,
 *     shardCapacity?: int,
 *     shardCount?: int,
 *     shardInstanceCount?: int,
 *     subnetIds?: list<string>,
 *     tags?: array<string, string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     adminUserName?: string,
 *     adminUserPassword?: string,
 *     authType?: 'PLAIN_TEXT'|'SECRET_ARN',
 *     backupRetentionPeriod?: int,
 *     clientToken?: string,
 *     clusterName?: string,
 *     kmsKeyId?: string,
 *     preferredBackupWindow?: string,
 *     preferredMaintenanceWindow?: string,
 *     shardCapacity?: int,
 *     shardCount?: int,
 *     shardInstanceCount?: int,
 *     subnetIds?: list<string>,
 *     tags?: array<string, string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createClusterSnapshot(array{clusterArn?: string, snapshotName?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterSnapshotAsync(array{clusterArn?: string, snapshotName?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{clusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{clusterArn?: string, ...} $args = [])
 * @method \Aws\Result deleteClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteClusterSnapshot(array{snapshotArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterSnapshotAsync(array{snapshotArn?: string, ...} $args = [])
 * @method \Aws\Result getCluster(array $args = [])
 * @phpstan-method \Aws\Result getCluster(array{clusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterAsync(array{clusterArn?: string, ...} $args = [])
 * @method \Aws\Result getClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getClusterSnapshot(array{snapshotArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterSnapshotAsync(array{snapshotArn?: string, ...} $args = [])
 * @method \Aws\Result getPendingMaintenanceAction(array $args = [])
 * @phpstan-method \Aws\Result getPendingMaintenanceAction(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPendingMaintenanceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPendingMaintenanceActionAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listClusterSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listClusterSnapshots(array{clusterArn?: string, maxResults?: int, nextToken?: string, snapshotType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClusterSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClusterSnapshotsAsync(array{clusterArn?: string, maxResults?: int, nextToken?: string, snapshotType?: string, ...} $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPendingMaintenanceActions(array $args = [])
 * @phpstan-method \Aws\Result listPendingMaintenanceActions(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPendingMaintenanceActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPendingMaintenanceActionsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result restoreClusterFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreClusterFromSnapshot(array{
 *     clusterName?: string,
 *     kmsKeyId?: string,
 *     shardCapacity?: int,
 *     shardInstanceCount?: int,
 *     snapshotArn?: string,
 *     subnetIds?: list<string>,
 *     tags?: array<string, string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreClusterFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreClusterFromSnapshotAsync(array{
 *     clusterName?: string,
 *     kmsKeyId?: string,
 *     shardCapacity?: int,
 *     shardInstanceCount?: int,
 *     snapshotArn?: string,
 *     subnetIds?: list<string>,
 *     tags?: array<string, string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCluster(array $args = [])
 * @phpstan-method \Aws\Result startCluster(array{clusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startClusterAsync(array{clusterArn?: string, ...} $args = [])
 * @method \Aws\Result stopCluster(array $args = [])
 * @phpstan-method \Aws\Result stopCluster(array{clusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopClusterAsync(array{clusterArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{
 *     adminUserPassword?: string,
 *     authType?: 'PLAIN_TEXT'|'SECRET_ARN',
 *     backupRetentionPeriod?: int,
 *     clientToken?: string,
 *     clusterArn?: string,
 *     preferredBackupWindow?: string,
 *     preferredMaintenanceWindow?: string,
 *     shardCapacity?: int,
 *     shardCount?: int,
 *     shardInstanceCount?: int,
 *     subnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     adminUserPassword?: string,
 *     authType?: 'PLAIN_TEXT'|'SECRET_ARN',
 *     backupRetentionPeriod?: int,
 *     clientToken?: string,
 *     clusterArn?: string,
 *     preferredBackupWindow?: string,
 *     preferredMaintenanceWindow?: string,
 *     shardCapacity?: int,
 *     shardCount?: int,
 *     shardInstanceCount?: int,
 *     subnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 */
class DocDBElasticClient extends AwsClient {}
