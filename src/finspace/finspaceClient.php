<?php
namespace Aws\finspace;

use Aws\AwsClient;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **FinSpace User Environment Management service** service.
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     name?: string,
 *     description?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     federationMode?: 'FEDERATED'|'LOCAL',
 *     federationParameters?: array{
 *         samlMetadataDocument?: string,
 *         samlMetadataURL?: string,
 *         applicationCallBackURL?: string,
 *         federationURN?: string,
 *         federationProviderName?: string,
 *         attributeMap?: array<string, string>,
 *         ...,
 *     },
 *     superuserParameters?: array{emailAddress?: string, firstName?: string, lastName?: string, ...},
 *     dataBundles?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     name?: string,
 *     description?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     federationMode?: 'FEDERATED'|'LOCAL',
 *     federationParameters?: array{
 *         samlMetadataDocument?: string,
 *         samlMetadataURL?: string,
 *         applicationCallBackURL?: string,
 *         federationURN?: string,
 *         federationProviderName?: string,
 *         attributeMap?: array<string, string>,
 *         ...,
 *     },
 *     superuserParameters?: array{emailAddress?: string, firstName?: string, lastName?: string, ...},
 *     dataBundles?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKxChangeset(array $args = [])
 * @phpstan-method \Aws\Result createKxChangeset(array{
 *     environmentId?: string,
 *     databaseName?: string,
 *     changeRequests?: list<array{changeType?: 'DELETE'|'PUT', s3Path?: string, dbPath?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKxChangesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKxChangesetAsync(array{
 *     environmentId?: string,
 *     databaseName?: string,
 *     changeRequests?: list<array{changeType?: 'DELETE'|'PUT', s3Path?: string, dbPath?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKxCluster(array $args = [])
 * @phpstan-method \Aws\Result createKxCluster(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     clusterName?: string,
 *     clusterType?: 'GATEWAY'|'GP'|'HDB'|'RDB'|'TICKERPLANT',
 *     tickerplantLogConfiguration?: array{tickerplantLogVolumes?: list<string>, ...},
 *     databases?: list<array{
 *         databaseName?: string,
 *         cacheConfigurations?: list<array>,
 *         changesetId?: string,
 *         dataviewName?: string,
 *         dataviewConfiguration?: array,
 *         ...,
 *     }>,
 *     cacheStorageConfigurations?: list<array{type?: string, size?: int, ...}>,
 *     autoScalingConfiguration?: array{
 *         minNodeCount?: int,
 *         maxNodeCount?: int,
 *         autoScalingMetric?: 'CPU_UTILIZATION_PERCENTAGE',
 *         metricTarget?: float,
 *         scaleInCooldownSeconds?: float,
 *         scaleOutCooldownSeconds?: float,
 *         ...,
 *     },
 *     clusterDescription?: string,
 *     capacityConfiguration?: array{nodeType?: string, nodeCount?: int, ...},
 *     releaseLabel?: string,
 *     vpcConfiguration?: array{vpcId?: string, securityGroupIds?: list<string>, subnetIds?: list<string>, ipAddressType?: 'IP_V4', ...},
 *     initializationScript?: string,
 *     commandLineArguments?: list<array{key?: string, value?: string, ...}>,
 *     code?: array{s3Bucket?: string, s3Key?: string, s3ObjectVersion?: string, ...},
 *     executionRole?: string,
 *     savedownStorageConfiguration?: array{type?: 'SDS01', size?: int, volumeName?: string, ...},
 *     azMode?: 'MULTI'|'SINGLE',
 *     availabilityZoneId?: string,
 *     tags?: array<string, string>,
 *     scalingGroupConfiguration?: array{
 *         scalingGroupName?: string,
 *         memoryLimit?: int,
 *         memoryReservation?: int,
 *         nodeCount?: int,
 *         cpu?: float,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKxClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKxClusterAsync(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     clusterName?: string,
 *     clusterType?: 'GATEWAY'|'GP'|'HDB'|'RDB'|'TICKERPLANT',
 *     tickerplantLogConfiguration?: array{tickerplantLogVolumes?: list<string>, ...},
 *     databases?: list<array{
 *         databaseName?: string,
 *         cacheConfigurations?: list<array>,
 *         changesetId?: string,
 *         dataviewName?: string,
 *         dataviewConfiguration?: array,
 *         ...,
 *     }>,
 *     cacheStorageConfigurations?: list<array{type?: string, size?: int, ...}>,
 *     autoScalingConfiguration?: array{
 *         minNodeCount?: int,
 *         maxNodeCount?: int,
 *         autoScalingMetric?: 'CPU_UTILIZATION_PERCENTAGE',
 *         metricTarget?: float,
 *         scaleInCooldownSeconds?: float,
 *         scaleOutCooldownSeconds?: float,
 *         ...,
 *     },
 *     clusterDescription?: string,
 *     capacityConfiguration?: array{nodeType?: string, nodeCount?: int, ...},
 *     releaseLabel?: string,
 *     vpcConfiguration?: array{vpcId?: string, securityGroupIds?: list<string>, subnetIds?: list<string>, ipAddressType?: 'IP_V4', ...},
 *     initializationScript?: string,
 *     commandLineArguments?: list<array{key?: string, value?: string, ...}>,
 *     code?: array{s3Bucket?: string, s3Key?: string, s3ObjectVersion?: string, ...},
 *     executionRole?: string,
 *     savedownStorageConfiguration?: array{type?: 'SDS01', size?: int, volumeName?: string, ...},
 *     azMode?: 'MULTI'|'SINGLE',
 *     availabilityZoneId?: string,
 *     tags?: array<string, string>,
 *     scalingGroupConfiguration?: array{
 *         scalingGroupName?: string,
 *         memoryLimit?: int,
 *         memoryReservation?: int,
 *         nodeCount?: int,
 *         cpu?: float,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKxDatabase(array $args = [])
 * @phpstan-method \Aws\Result createKxDatabase(array{
 *     environmentId?: string,
 *     databaseName?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKxDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKxDatabaseAsync(array{
 *     environmentId?: string,
 *     databaseName?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKxDataview(array $args = [])
 * @phpstan-method \Aws\Result createKxDataview(array{
 *     environmentId?: string,
 *     databaseName?: string,
 *     dataviewName?: string,
 *     azMode?: 'MULTI'|'SINGLE',
 *     availabilityZoneId?: string,
 *     changesetId?: string,
 *     segmentConfigurations?: list<array{dbPaths?: list<string>, volumeName?: string, onDemand?: bool, ...}>,
 *     autoUpdate?: bool,
 *     readWrite?: bool,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKxDataviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKxDataviewAsync(array{
 *     environmentId?: string,
 *     databaseName?: string,
 *     dataviewName?: string,
 *     azMode?: 'MULTI'|'SINGLE',
 *     availabilityZoneId?: string,
 *     changesetId?: string,
 *     segmentConfigurations?: list<array{dbPaths?: list<string>, volumeName?: string, onDemand?: bool, ...}>,
 *     autoUpdate?: bool,
 *     readWrite?: bool,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKxEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createKxEnvironment(array{
 *     name?: string,
 *     description?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKxEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKxEnvironmentAsync(array{
 *     name?: string,
 *     description?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKxScalingGroup(array $args = [])
 * @phpstan-method \Aws\Result createKxScalingGroup(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     scalingGroupName?: string,
 *     hostType?: string,
 *     availabilityZoneId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKxScalingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKxScalingGroupAsync(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     scalingGroupName?: string,
 *     hostType?: string,
 *     availabilityZoneId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKxUser(array $args = [])
 * @phpstan-method \Aws\Result createKxUser(array{
 *     environmentId?: string,
 *     userName?: string,
 *     iamRole?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKxUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKxUserAsync(array{
 *     environmentId?: string,
 *     userName?: string,
 *     iamRole?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKxVolume(array $args = [])
 * @phpstan-method \Aws\Result createKxVolume(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     volumeType?: 'NAS_1',
 *     volumeName?: string,
 *     description?: string,
 *     nas1Configuration?: array{type?: 'HDD_12'|'SSD_1000'|'SSD_250', size?: int, ...},
 *     azMode?: 'MULTI'|'SINGLE',
 *     availabilityZoneIds?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKxVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKxVolumeAsync(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     volumeType?: 'NAS_1',
 *     volumeName?: string,
 *     description?: string,
 *     nas1Configuration?: array{type?: 'HDD_12'|'SSD_1000'|'SSD_250', size?: int, ...},
 *     azMode?: 'MULTI'|'SINGLE',
 *     availabilityZoneIds?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteKxCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteKxCluster(array{environmentId?: string, clusterName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKxClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKxClusterAsync(array{environmentId?: string, clusterName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteKxClusterNode(array $args = [])
 * @phpstan-method \Aws\Result deleteKxClusterNode(array{environmentId?: string, clusterName?: string, nodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKxClusterNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKxClusterNodeAsync(array{environmentId?: string, clusterName?: string, nodeId?: string, ...} $args = [])
 * @method \Aws\Result deleteKxDatabase(array $args = [])
 * @phpstan-method \Aws\Result deleteKxDatabase(array{environmentId?: string, databaseName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKxDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKxDatabaseAsync(array{environmentId?: string, databaseName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteKxDataview(array $args = [])
 * @phpstan-method \Aws\Result deleteKxDataview(array{environmentId?: string, databaseName?: string, dataviewName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKxDataviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKxDataviewAsync(array{environmentId?: string, databaseName?: string, dataviewName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteKxEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteKxEnvironment(array{environmentId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKxEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKxEnvironmentAsync(array{environmentId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteKxScalingGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteKxScalingGroup(array{environmentId?: string, scalingGroupName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKxScalingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKxScalingGroupAsync(array{environmentId?: string, scalingGroupName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteKxUser(array $args = [])
 * @phpstan-method \Aws\Result deleteKxUser(array{userName?: string, environmentId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKxUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKxUserAsync(array{userName?: string, environmentId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteKxVolume(array $args = [])
 * @phpstan-method \Aws\Result deleteKxVolume(array{environmentId?: string, volumeName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKxVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKxVolumeAsync(array{environmentId?: string, volumeName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result getKxChangeset(array $args = [])
 * @phpstan-method \Aws\Result getKxChangeset(array{environmentId?: string, databaseName?: string, changesetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxChangesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxChangesetAsync(array{environmentId?: string, databaseName?: string, changesetId?: string, ...} $args = [])
 * @method \Aws\Result getKxCluster(array $args = [])
 * @phpstan-method \Aws\Result getKxCluster(array{environmentId?: string, clusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxClusterAsync(array{environmentId?: string, clusterName?: string, ...} $args = [])
 * @method \Aws\Result getKxConnectionString(array $args = [])
 * @phpstan-method \Aws\Result getKxConnectionString(array{userArn?: string, environmentId?: string, clusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxConnectionStringAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxConnectionStringAsync(array{userArn?: string, environmentId?: string, clusterName?: string, ...} $args = [])
 * @method \Aws\Result getKxDatabase(array $args = [])
 * @phpstan-method \Aws\Result getKxDatabase(array{environmentId?: string, databaseName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxDatabaseAsync(array{environmentId?: string, databaseName?: string, ...} $args = [])
 * @method \Aws\Result getKxDataview(array $args = [])
 * @phpstan-method \Aws\Result getKxDataview(array{environmentId?: string, databaseName?: string, dataviewName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxDataviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxDataviewAsync(array{environmentId?: string, databaseName?: string, dataviewName?: string, ...} $args = [])
 * @method \Aws\Result getKxEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getKxEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result getKxScalingGroup(array $args = [])
 * @phpstan-method \Aws\Result getKxScalingGroup(array{environmentId?: string, scalingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxScalingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxScalingGroupAsync(array{environmentId?: string, scalingGroupName?: string, ...} $args = [])
 * @method \Aws\Result getKxUser(array $args = [])
 * @phpstan-method \Aws\Result getKxUser(array{userName?: string, environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxUserAsync(array{userName?: string, environmentId?: string, ...} $args = [])
 * @method \Aws\Result getKxVolume(array $args = [])
 * @phpstan-method \Aws\Result getKxVolume(array{environmentId?: string, volumeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKxVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKxVolumeAsync(array{environmentId?: string, volumeName?: string, ...} $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listKxChangesets(array $args = [])
 * @phpstan-method \Aws\Result listKxChangesets(array{environmentId?: string, databaseName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxChangesetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxChangesetsAsync(array{environmentId?: string, databaseName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listKxClusterNodes(array $args = [])
 * @phpstan-method \Aws\Result listKxClusterNodes(array{environmentId?: string, clusterName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxClusterNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxClusterNodesAsync(array{environmentId?: string, clusterName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listKxClusters(array $args = [])
 * @phpstan-method \Aws\Result listKxClusters(array{
 *     environmentId?: string,
 *     clusterType?: 'GATEWAY'|'GP'|'HDB'|'RDB'|'TICKERPLANT',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxClustersAsync(array{
 *     environmentId?: string,
 *     clusterType?: 'GATEWAY'|'GP'|'HDB'|'RDB'|'TICKERPLANT',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listKxDatabases(array $args = [])
 * @phpstan-method \Aws\Result listKxDatabases(array{environmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxDatabasesAsync(array{environmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listKxDataviews(array $args = [])
 * @phpstan-method \Aws\Result listKxDataviews(array{environmentId?: string, databaseName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxDataviewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxDataviewsAsync(array{environmentId?: string, databaseName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listKxEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listKxEnvironments(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxEnvironmentsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listKxScalingGroups(array $args = [])
 * @phpstan-method \Aws\Result listKxScalingGroups(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxScalingGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxScalingGroupsAsync(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listKxUsers(array $args = [])
 * @phpstan-method \Aws\Result listKxUsers(array{environmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxUsersAsync(array{environmentId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listKxVolumes(array $args = [])
 * @phpstan-method \Aws\Result listKxVolumes(array{environmentId?: string, maxResults?: int, nextToken?: string, volumeType?: 'NAS_1', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKxVolumesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKxVolumesAsync(array{environmentId?: string, maxResults?: int, nextToken?: string, volumeType?: 'NAS_1', ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     environmentId?: string,
 *     name?: string,
 *     description?: string,
 *     federationMode?: 'FEDERATED'|'LOCAL',
 *     federationParameters?: array{
 *         samlMetadataDocument?: string,
 *         samlMetadataURL?: string,
 *         applicationCallBackURL?: string,
 *         federationURN?: string,
 *         federationProviderName?: string,
 *         attributeMap?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     environmentId?: string,
 *     name?: string,
 *     description?: string,
 *     federationMode?: 'FEDERATED'|'LOCAL',
 *     federationParameters?: array{
 *         samlMetadataDocument?: string,
 *         samlMetadataURL?: string,
 *         applicationCallBackURL?: string,
 *         federationURN?: string,
 *         federationProviderName?: string,
 *         attributeMap?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKxClusterCodeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateKxClusterCodeConfiguration(array{
 *     environmentId?: string,
 *     clusterName?: string,
 *     clientToken?: string,
 *     code?: array{s3Bucket?: string, s3Key?: string, s3ObjectVersion?: string, ...},
 *     initializationScript?: string,
 *     commandLineArguments?: list<array{key?: string, value?: string, ...}>,
 *     deploymentConfiguration?: array{deploymentStrategy?: 'FORCE'|'NO_RESTART'|'ROLLING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKxClusterCodeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKxClusterCodeConfigurationAsync(array{
 *     environmentId?: string,
 *     clusterName?: string,
 *     clientToken?: string,
 *     code?: array{s3Bucket?: string, s3Key?: string, s3ObjectVersion?: string, ...},
 *     initializationScript?: string,
 *     commandLineArguments?: list<array{key?: string, value?: string, ...}>,
 *     deploymentConfiguration?: array{deploymentStrategy?: 'FORCE'|'NO_RESTART'|'ROLLING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKxClusterDatabases(array $args = [])
 * @phpstan-method \Aws\Result updateKxClusterDatabases(array{
 *     environmentId?: string,
 *     clusterName?: string,
 *     clientToken?: string,
 *     databases?: list<array{
 *         databaseName?: string,
 *         cacheConfigurations?: list<array>,
 *         changesetId?: string,
 *         dataviewName?: string,
 *         dataviewConfiguration?: array,
 *         ...,
 *     }>,
 *     deploymentConfiguration?: array{deploymentStrategy?: 'NO_RESTART'|'ROLLING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKxClusterDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKxClusterDatabasesAsync(array{
 *     environmentId?: string,
 *     clusterName?: string,
 *     clientToken?: string,
 *     databases?: list<array{
 *         databaseName?: string,
 *         cacheConfigurations?: list<array>,
 *         changesetId?: string,
 *         dataviewName?: string,
 *         dataviewConfiguration?: array,
 *         ...,
 *     }>,
 *     deploymentConfiguration?: array{deploymentStrategy?: 'NO_RESTART'|'ROLLING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKxDatabase(array $args = [])
 * @phpstan-method \Aws\Result updateKxDatabase(array{environmentId?: string, databaseName?: string, description?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKxDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKxDatabaseAsync(array{environmentId?: string, databaseName?: string, description?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateKxDataview(array $args = [])
 * @phpstan-method \Aws\Result updateKxDataview(array{
 *     environmentId?: string,
 *     databaseName?: string,
 *     dataviewName?: string,
 *     description?: string,
 *     changesetId?: string,
 *     segmentConfigurations?: list<array{dbPaths?: list<string>, volumeName?: string, onDemand?: bool, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKxDataviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKxDataviewAsync(array{
 *     environmentId?: string,
 *     databaseName?: string,
 *     dataviewName?: string,
 *     description?: string,
 *     changesetId?: string,
 *     segmentConfigurations?: list<array{dbPaths?: list<string>, volumeName?: string, onDemand?: bool, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKxEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateKxEnvironment(array{environmentId?: string, name?: string, description?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKxEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKxEnvironmentAsync(array{environmentId?: string, name?: string, description?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateKxEnvironmentNetwork(array $args = [])
 * @phpstan-method \Aws\Result updateKxEnvironmentNetwork(array{
 *     environmentId?: string,
 *     transitGatewayConfiguration?: array{
 *         transitGatewayID?: string,
 *         routableCIDRSpace?: string,
 *         attachmentNetworkAclConfiguration?: list<array>,
 *         ...,
 *     },
 *     customDNSConfiguration?: list<array{customDNSServerName?: string, customDNSServerIP?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKxEnvironmentNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKxEnvironmentNetworkAsync(array{
 *     environmentId?: string,
 *     transitGatewayConfiguration?: array{
 *         transitGatewayID?: string,
 *         routableCIDRSpace?: string,
 *         attachmentNetworkAclConfiguration?: list<array>,
 *         ...,
 *     },
 *     customDNSConfiguration?: list<array{customDNSServerName?: string, customDNSServerIP?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKxUser(array $args = [])
 * @phpstan-method \Aws\Result updateKxUser(array{environmentId?: string, userName?: string, iamRole?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKxUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKxUserAsync(array{environmentId?: string, userName?: string, iamRole?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateKxVolume(array $args = [])
 * @phpstan-method \Aws\Result updateKxVolume(array{
 *     environmentId?: string,
 *     volumeName?: string,
 *     description?: string,
 *     clientToken?: string,
 *     nas1Configuration?: array{type?: 'HDD_12'|'SSD_1000'|'SSD_250', size?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKxVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKxVolumeAsync(array{
 *     environmentId?: string,
 *     volumeName?: string,
 *     description?: string,
 *     clientToken?: string,
 *     nas1Configuration?: array{type?: 'HDD_12'|'SSD_1000'|'SSD_250', size?: int, ...},
 *     ...,
 * } $args = [])
 */
class finspaceClient extends AwsClient {}
