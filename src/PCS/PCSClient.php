<?php
namespace Aws\PCS;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Parallel Computing Service** service.
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     clusterName?: string,
 *     scheduler?: array{type?: 'SLURM', version?: string, ...},
 *     size?: 'LARGE'|'MEDIUM'|'SMALL',
 *     networking?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, networkType?: 'IPV4'|'IPV6', ...},
 *     slurmConfiguration?: array{
 *         scaleDownIdleTimeInSeconds?: int,
 *         slurmCustomSettings?: list<array>,
 *         slurmdbdCustomSettings?: list<array>,
 *         cgroupCustomSettings?: list<array>,
 *         accounting?: array{defaultPurgeTimeInDays?: int, mode?: 'NONE'|'STANDARD', ...},
 *         slurmRest?: array{mode?: 'NONE'|'STANDARD', ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     clusterName?: string,
 *     scheduler?: array{type?: 'SLURM', version?: string, ...},
 *     size?: 'LARGE'|'MEDIUM'|'SMALL',
 *     networking?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, networkType?: 'IPV4'|'IPV6', ...},
 *     slurmConfiguration?: array{
 *         scaleDownIdleTimeInSeconds?: int,
 *         slurmCustomSettings?: list<array>,
 *         slurmdbdCustomSettings?: list<array>,
 *         cgroupCustomSettings?: list<array>,
 *         accounting?: array{defaultPurgeTimeInDays?: int, mode?: 'NONE'|'STANDARD', ...},
 *         slurmRest?: array{mode?: 'NONE'|'STANDARD', ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createComputeNodeGroup(array $args = [])
 * @phpstan-method \Aws\Result createComputeNodeGroup(array{
 *     clusterIdentifier?: string,
 *     computeNodeGroupName?: string,
 *     amiId?: string,
 *     subnetIds?: list<string>,
 *     purchaseOption?: 'CAPACITY_BLOCK'|'INTERRUPTIBLE_CAPACITY_RESERVATION'|'ONDEMAND'|'SPOT',
 *     customLaunchTemplate?: array{id?: string, version?: string, ...},
 *     iamInstanceProfileArn?: string,
 *     scalingConfiguration?: array{minInstanceCount?: int, maxInstanceCount?: int, ...},
 *     instanceConfigs?: list<array{instanceType?: string, ...}>,
 *     spotOptions?: array{allocationStrategy?: 'capacity-optimized'|'lowest-price'|'price-capacity-optimized', ...},
 *     slurmConfiguration?: array{scaleDownIdleTimeInSeconds?: int, slurmCustomSettings?: list<array>, ...},
 *     nodeLifecycleActions?: array{
 *         stages?: array{nodeBootstrapped?: list<array>, nodeReady?: list<array>, ...},
 *         scriptCachingPolicy?: 'CACHE_ONCE'|'REFRESH_ON_REBOOT',
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComputeNodeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComputeNodeGroupAsync(array{
 *     clusterIdentifier?: string,
 *     computeNodeGroupName?: string,
 *     amiId?: string,
 *     subnetIds?: list<string>,
 *     purchaseOption?: 'CAPACITY_BLOCK'|'INTERRUPTIBLE_CAPACITY_RESERVATION'|'ONDEMAND'|'SPOT',
 *     customLaunchTemplate?: array{id?: string, version?: string, ...},
 *     iamInstanceProfileArn?: string,
 *     scalingConfiguration?: array{minInstanceCount?: int, maxInstanceCount?: int, ...},
 *     instanceConfigs?: list<array{instanceType?: string, ...}>,
 *     spotOptions?: array{allocationStrategy?: 'capacity-optimized'|'lowest-price'|'price-capacity-optimized', ...},
 *     slurmConfiguration?: array{scaleDownIdleTimeInSeconds?: int, slurmCustomSettings?: list<array>, ...},
 *     nodeLifecycleActions?: array{
 *         stages?: array{nodeBootstrapped?: list<array>, nodeReady?: list<array>, ...},
 *         scriptCachingPolicy?: 'CACHE_ONCE'|'REFRESH_ON_REBOOT',
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQueue(array $args = [])
 * @phpstan-method \Aws\Result createQueue(array{
 *     clusterIdentifier?: string,
 *     queueName?: string,
 *     computeNodeGroupConfigurations?: list<array{computeNodeGroupId?: string, ...}>,
 *     slurmConfiguration?: array{slurmCustomSettings?: list<array>, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueueAsync(array{
 *     clusterIdentifier?: string,
 *     queueName?: string,
 *     computeNodeGroupConfigurations?: list<array{computeNodeGroupId?: string, ...}>,
 *     slurmConfiguration?: array{slurmCustomSettings?: list<array>, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{clusterIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{clusterIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteComputeNodeGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteComputeNodeGroup(array{clusterIdentifier?: string, computeNodeGroupIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComputeNodeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComputeNodeGroupAsync(array{clusterIdentifier?: string, computeNodeGroupIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteQueue(array $args = [])
 * @phpstan-method \Aws\Result deleteQueue(array{clusterIdentifier?: string, queueIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueueAsync(array{clusterIdentifier?: string, queueIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getCluster(array $args = [])
 * @phpstan-method \Aws\Result getCluster(array{clusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterAsync(array{clusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getComputeNodeGroup(array $args = [])
 * @phpstan-method \Aws\Result getComputeNodeGroup(array{clusterIdentifier?: string, computeNodeGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComputeNodeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComputeNodeGroupAsync(array{clusterIdentifier?: string, computeNodeGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getQueue(array $args = [])
 * @phpstan-method \Aws\Result getQueue(array{clusterIdentifier?: string, queueIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueueAsync(array{clusterIdentifier?: string, queueIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listComputeNodeGroups(array $args = [])
 * @phpstan-method \Aws\Result listComputeNodeGroups(array{clusterIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputeNodeGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComputeNodeGroupsAsync(array{clusterIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueues(array $args = [])
 * @phpstan-method \Aws\Result listQueues(array{clusterIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueuesAsync(array{clusterIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerComputeNodeGroupInstance(array $args = [])
 * @phpstan-method \Aws\Result registerComputeNodeGroupInstance(array{clusterIdentifier?: string, bootstrapId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerComputeNodeGroupInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerComputeNodeGroupInstanceAsync(array{clusterIdentifier?: string, bootstrapId?: string, ...} $args = [])
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
 *     clusterIdentifier?: string,
 *     clientToken?: string,
 *     slurmConfiguration?: array{
 *         scaleDownIdleTimeInSeconds?: int,
 *         slurmCustomSettings?: list<array>,
 *         slurmdbdCustomSettings?: list<array>,
 *         cgroupCustomSettings?: list<array>,
 *         accounting?: array{defaultPurgeTimeInDays?: int, mode?: 'NONE'|'STANDARD', ...},
 *         slurmRest?: array{mode?: 'NONE'|'STANDARD', ...},
 *         ...,
 *     },
 *     scheduler?: array{version?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     clusterIdentifier?: string,
 *     clientToken?: string,
 *     slurmConfiguration?: array{
 *         scaleDownIdleTimeInSeconds?: int,
 *         slurmCustomSettings?: list<array>,
 *         slurmdbdCustomSettings?: list<array>,
 *         cgroupCustomSettings?: list<array>,
 *         accounting?: array{defaultPurgeTimeInDays?: int, mode?: 'NONE'|'STANDARD', ...},
 *         slurmRest?: array{mode?: 'NONE'|'STANDARD', ...},
 *         ...,
 *     },
 *     scheduler?: array{version?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateComputeNodeGroup(array $args = [])
 * @phpstan-method \Aws\Result updateComputeNodeGroup(array{
 *     clusterIdentifier?: string,
 *     computeNodeGroupIdentifier?: string,
 *     amiId?: string,
 *     subnetIds?: list<string>,
 *     customLaunchTemplate?: array{id?: string, version?: string, ...},
 *     purchaseOption?: 'CAPACITY_BLOCK'|'INTERRUPTIBLE_CAPACITY_RESERVATION'|'ONDEMAND'|'SPOT',
 *     spotOptions?: array{allocationStrategy?: 'capacity-optimized'|'lowest-price'|'price-capacity-optimized', ...},
 *     scalingConfiguration?: array{minInstanceCount?: int, maxInstanceCount?: int, ...},
 *     iamInstanceProfileArn?: string,
 *     slurmConfiguration?: array{scaleDownIdleTimeInSeconds?: int, slurmCustomSettings?: list<array>, ...},
 *     nodeLifecycleActions?: array{
 *         stages?: array{nodeBootstrapped?: list<array>, nodeReady?: list<array>, ...},
 *         scriptCachingPolicy?: 'CACHE_ONCE'|'REFRESH_ON_REBOOT',
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComputeNodeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComputeNodeGroupAsync(array{
 *     clusterIdentifier?: string,
 *     computeNodeGroupIdentifier?: string,
 *     amiId?: string,
 *     subnetIds?: list<string>,
 *     customLaunchTemplate?: array{id?: string, version?: string, ...},
 *     purchaseOption?: 'CAPACITY_BLOCK'|'INTERRUPTIBLE_CAPACITY_RESERVATION'|'ONDEMAND'|'SPOT',
 *     spotOptions?: array{allocationStrategy?: 'capacity-optimized'|'lowest-price'|'price-capacity-optimized', ...},
 *     scalingConfiguration?: array{minInstanceCount?: int, maxInstanceCount?: int, ...},
 *     iamInstanceProfileArn?: string,
 *     slurmConfiguration?: array{scaleDownIdleTimeInSeconds?: int, slurmCustomSettings?: list<array>, ...},
 *     nodeLifecycleActions?: array{
 *         stages?: array{nodeBootstrapped?: list<array>, nodeReady?: list<array>, ...},
 *         scriptCachingPolicy?: 'CACHE_ONCE'|'REFRESH_ON_REBOOT',
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQueue(array $args = [])
 * @phpstan-method \Aws\Result updateQueue(array{
 *     clusterIdentifier?: string,
 *     queueIdentifier?: string,
 *     computeNodeGroupConfigurations?: list<array{computeNodeGroupId?: string, ...}>,
 *     slurmConfiguration?: array{slurmCustomSettings?: list<array>, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueAsync(array{
 *     clusterIdentifier?: string,
 *     queueIdentifier?: string,
 *     computeNodeGroupConfigurations?: list<array{computeNodeGroupId?: string, ...}>,
 *     slurmConfiguration?: array{slurmCustomSettings?: list<array>, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 */
class PCSClient extends AwsClient {}
