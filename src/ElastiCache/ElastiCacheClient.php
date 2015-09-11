<?php
namespace Aws\ElastiCache;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon ElastiCache** service.
 *
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @method \Aws\Result authorizeCacheSecurityGroupIngress(array $args = [])
 * @method \Aws\Result copySnapshot(array $args = [])
 * @method \Aws\Result createCacheCluster(array $args = [])
 * @method \Aws\Result createCacheParameterGroup(array $args = [])
 * @method \Aws\Result createCacheSecurityGroup(array $args = [])
 * @method \Aws\Result createCacheSubnetGroup(array $args = [])
 * @method \Aws\Result createReplicationGroup(array $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @method \Aws\Result deleteCacheCluster(array $args = [])
 * @method \Aws\Result deleteCacheParameterGroup(array $args = [])
 * @method \Aws\Result deleteCacheSecurityGroup(array $args = [])
 * @method \Aws\Result deleteCacheSubnetGroup(array $args = [])
 * @method \Aws\Result deleteReplicationGroup(array $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @method \Aws\Result describeCacheClusters(array $args = [])
 * @method \Aws\Result describeCacheEngineVersions(array $args = [])
 * @method \Aws\Result describeCacheParameterGroups(array $args = [])
 * @method \Aws\Result describeCacheParameters(array $args = [])
 * @method \Aws\Result describeCacheSecurityGroups(array $args = [])
 * @method \Aws\Result describeCacheSubnetGroups(array $args = [])
 * @method \Aws\Result describeEngineDefaultParameters(array $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @method \Aws\Result describeReplicationGroups(array $args = [])
 * @method \Aws\Result describeReservedCacheNodes(array $args = [])
 * @method \Aws\Result describeReservedCacheNodesOfferings(array $args = [])
 * @method \Aws\Result describeSnapshots(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \Aws\Result modifyCacheCluster(array $args = [])
 * @method \Aws\Result modifyCacheParameterGroup(array $args = [])
 * @method \Aws\Result modifyCacheSubnetGroup(array $args = [])
 * @method \Aws\Result modifyReplicationGroup(array $args = [])
 * @method \Aws\Result purchaseReservedCacheNodesOffering(array $args = [])
 * @method \Aws\Result rebootCacheCluster(array $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @method \Aws\Result resetCacheParameterGroup(array $args = [])
 * @method \Aws\Result revokeCacheSecurityGroupIngress(array $args = [])
 */
class ElastiCacheClient extends AwsClient {}
