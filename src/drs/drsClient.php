<?php
namespace Aws\drs;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Elastic Disaster Recovery Service** service.
 * @method \Aws\Result associateSourceNetworkStack(array $args = [])
 * @phpstan-method \Aws\Result associateSourceNetworkStack(array{sourceNetworkID?: string, cfnStackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSourceNetworkStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSourceNetworkStackAsync(array{sourceNetworkID?: string, cfnStackName?: string, ...} $args = [])
 * @method \Aws\Result createExtendedSourceServer(array $args = [])
 * @phpstan-method \Aws\Result createExtendedSourceServer(array{sourceServerArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createExtendedSourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExtendedSourceServerAsync(array{sourceServerArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createLaunchConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result createLaunchConfigurationTemplate(array{
 *     tags?: array<string, string>,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'IN_AWS'|'NONE',
 *     copyPrivateIp?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     exportBucketArn?: string,
 *     postLaunchEnabled?: bool,
 *     launchIntoSourceInstance?: bool,
 *     recoveryMode?: 'FAST'|'OPTIMAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLaunchConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLaunchConfigurationTemplateAsync(array{
 *     tags?: array<string, string>,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'IN_AWS'|'NONE',
 *     copyPrivateIp?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     exportBucketArn?: string,
 *     postLaunchEnabled?: bool,
 *     launchIntoSourceInstance?: bool,
 *     recoveryMode?: 'FAST'|'OPTIMAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReplicationConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result createReplicationConfigurationTemplate(array{
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'AUTO'|'GP2'|'GP3'|'ST1',
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT'|'NONE',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     pitPolicy?: list<array{
 *         ruleID?: int,
 *         units?: 'DAY'|'HOUR'|'MINUTE',
 *         interval?: int,
 *         retentionDuration?: int,
 *         enabled?: bool,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     autoReplicateNewDisks?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicationConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationConfigurationTemplateAsync(array{
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'AUTO'|'GP2'|'GP3'|'ST1',
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT'|'NONE',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     pitPolicy?: list<array{
 *         ruleID?: int,
 *         units?: 'DAY'|'HOUR'|'MINUTE',
 *         interval?: int,
 *         retentionDuration?: int,
 *         enabled?: bool,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     autoReplicateNewDisks?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSourceNetwork(array $args = [])
 * @phpstan-method \Aws\Result createSourceNetwork(array{vpcID?: string, originAccountID?: string, originRegion?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSourceNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSourceNetworkAsync(array{vpcID?: string, originAccountID?: string, originRegion?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @phpstan-method \Aws\Result deleteJob(array{jobID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobAsync(array{jobID?: string, ...} $args = [])
 * @method \Aws\Result deleteLaunchAction(array $args = [])
 * @phpstan-method \Aws\Result deleteLaunchAction(array{resourceId?: string, actionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLaunchActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLaunchActionAsync(array{resourceId?: string, actionId?: string, ...} $args = [])
 * @method \Aws\Result deleteLaunchConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteLaunchConfigurationTemplate(array{launchConfigurationTemplateID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLaunchConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLaunchConfigurationTemplateAsync(array{launchConfigurationTemplateID?: string, ...} $args = [])
 * @method \Aws\Result deleteRecoveryInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteRecoveryInstance(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecoveryInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecoveryInstanceAsync(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicationConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationConfigurationTemplate(array{replicationConfigurationTemplateID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationConfigurationTemplateAsync(array{replicationConfigurationTemplateID?: string, ...} $args = [])
 * @method \Aws\Result deleteSourceNetwork(array $args = [])
 * @phpstan-method \Aws\Result deleteSourceNetwork(array{sourceNetworkID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSourceNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSourceNetworkAsync(array{sourceNetworkID?: string, ...} $args = [])
 * @method \Aws\Result deleteSourceServer(array $args = [])
 * @phpstan-method \Aws\Result deleteSourceServer(array{sourceServerID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSourceServerAsync(array{sourceServerID?: string, ...} $args = [])
 * @method \Aws\Result describeJobLogItems(array $args = [])
 * @phpstan-method \Aws\Result describeJobLogItems(array{jobID?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobLogItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobLogItemsAsync(array{jobID?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeJobs(array $args = [])
 * @phpstan-method \Aws\Result describeJobs(array{
 *     filters?: array{jobIDs?: list<string>, fromDate?: string, toDate?: string, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobsAsync(array{
 *     filters?: array{jobIDs?: list<string>, fromDate?: string, toDate?: string, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLaunchConfigurationTemplates(array $args = [])
 * @phpstan-method \Aws\Result describeLaunchConfigurationTemplates(array{launchConfigurationTemplateIDs?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLaunchConfigurationTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLaunchConfigurationTemplatesAsync(array{launchConfigurationTemplateIDs?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeRecoveryInstances(array $args = [])
 * @phpstan-method \Aws\Result describeRecoveryInstances(array{
 *     filters?: array{recoveryInstanceIDs?: list<string>, sourceServerIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecoveryInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecoveryInstancesAsync(array{
 *     filters?: array{recoveryInstanceIDs?: list<string>, sourceServerIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRecoverySnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeRecoverySnapshots(array{
 *     sourceServerID?: string,
 *     filters?: array{fromDateTime?: string, toDateTime?: string, ...},
 *     order?: 'ASC'|'DESC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecoverySnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecoverySnapshotsAsync(array{
 *     sourceServerID?: string,
 *     filters?: array{fromDateTime?: string, toDateTime?: string, ...},
 *     order?: 'ASC'|'DESC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReplicationConfigurationTemplates(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationConfigurationTemplates(array{replicationConfigurationTemplateIDs?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationConfigurationTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationConfigurationTemplatesAsync(array{replicationConfigurationTemplateIDs?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeSourceNetworks(array $args = [])
 * @phpstan-method \Aws\Result describeSourceNetworks(array{
 *     filters?: array{sourceNetworkIDs?: list<string>, originAccountID?: string, originRegion?: string, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSourceNetworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSourceNetworksAsync(array{
 *     filters?: array{sourceNetworkIDs?: list<string>, originAccountID?: string, originRegion?: string, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSourceServers(array $args = [])
 * @phpstan-method \Aws\Result describeSourceServers(array{
 *     filters?: array{sourceServerIDs?: list<string>, hardwareId?: string, stagingAccountIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSourceServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSourceServersAsync(array{
 *     filters?: array{sourceServerIDs?: list<string>, hardwareId?: string, stagingAccountIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disconnectRecoveryInstance(array $args = [])
 * @phpstan-method \Aws\Result disconnectRecoveryInstance(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disconnectRecoveryInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disconnectRecoveryInstanceAsync(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \Aws\Result disconnectSourceServer(array $args = [])
 * @phpstan-method \Aws\Result disconnectSourceServer(array{sourceServerID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disconnectSourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disconnectSourceServerAsync(array{sourceServerID?: string, ...} $args = [])
 * @method \Aws\Result exportSourceNetworkCfnTemplate(array $args = [])
 * @phpstan-method \Aws\Result exportSourceNetworkCfnTemplate(array{sourceNetworkID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportSourceNetworkCfnTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportSourceNetworkCfnTemplateAsync(array{sourceNetworkID?: string, ...} $args = [])
 * @method \Aws\Result getFailbackReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getFailbackReplicationConfiguration(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFailbackReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFailbackReplicationConfigurationAsync(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \Aws\Result getLaunchConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLaunchConfiguration(array{sourceServerID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLaunchConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLaunchConfigurationAsync(array{sourceServerID?: string, ...} $args = [])
 * @method \Aws\Result getReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getReplicationConfiguration(array{sourceServerID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReplicationConfigurationAsync(array{sourceServerID?: string, ...} $args = [])
 * @method \Aws\Result initializeService(array $args = [])
 * @phpstan-method \Aws\Result initializeService(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise initializeServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initializeServiceAsync(array{...} $args = [])
 * @method \Aws\Result listExtensibleSourceServers(array $args = [])
 * @phpstan-method \Aws\Result listExtensibleSourceServers(array{stagingAccountID?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExtensibleSourceServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExtensibleSourceServersAsync(array{stagingAccountID?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listLaunchActions(array $args = [])
 * @phpstan-method \Aws\Result listLaunchActions(array{
 *     resourceId?: string,
 *     filters?: array{actionIds?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLaunchActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLaunchActionsAsync(array{
 *     resourceId?: string,
 *     filters?: array{actionIds?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStagingAccounts(array $args = [])
 * @phpstan-method \Aws\Result listStagingAccounts(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStagingAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStagingAccountsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putLaunchAction(array $args = [])
 * @phpstan-method \Aws\Result putLaunchAction(array{
 *     resourceId?: string,
 *     actionCode?: string,
 *     order?: int,
 *     actionId?: string,
 *     optional?: bool,
 *     active?: bool,
 *     name?: string,
 *     actionVersion?: string,
 *     category?: 'CONFIGURATION'|'MONITORING'|'OTHER'|'SECURITY'|'VALIDATION',
 *     parameters?: array<string, array{value?: string, type?: 'DYNAMIC'|'SSM_STORE', ...}>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putLaunchActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLaunchActionAsync(array{
 *     resourceId?: string,
 *     actionCode?: string,
 *     order?: int,
 *     actionId?: string,
 *     optional?: bool,
 *     active?: bool,
 *     name?: string,
 *     actionVersion?: string,
 *     category?: 'CONFIGURATION'|'MONITORING'|'OTHER'|'SECURITY'|'VALIDATION',
 *     parameters?: array<string, array{value?: string, type?: 'DYNAMIC'|'SSM_STORE', ...}>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result retryDataReplication(array $args = [])
 * @phpstan-method \Aws\Result retryDataReplication(array{sourceServerID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retryDataReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retryDataReplicationAsync(array{sourceServerID?: string, ...} $args = [])
 * @method \Aws\Result reverseReplication(array $args = [])
 * @phpstan-method \Aws\Result reverseReplication(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise reverseReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reverseReplicationAsync(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \Aws\Result startFailbackLaunch(array $args = [])
 * @phpstan-method \Aws\Result startFailbackLaunch(array{recoveryInstanceIDs?: list<string>, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startFailbackLaunchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFailbackLaunchAsync(array{recoveryInstanceIDs?: list<string>, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result startRecovery(array $args = [])
 * @phpstan-method \Aws\Result startRecovery(array{
 *     sourceServers?: list<array{sourceServerID?: string, recoverySnapshotID?: string, ...}>,
 *     isDrill?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRecoveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRecoveryAsync(array{
 *     sourceServers?: list<array{sourceServerID?: string, recoverySnapshotID?: string, ...}>,
 *     isDrill?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startReplication(array $args = [])
 * @phpstan-method \Aws\Result startReplication(array{sourceServerID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReplicationAsync(array{sourceServerID?: string, ...} $args = [])
 * @method \Aws\Result startSourceNetworkRecovery(array $args = [])
 * @phpstan-method \Aws\Result startSourceNetworkRecovery(array{
 *     sourceNetworks?: list<array{sourceNetworkID?: string, cfnStackName?: string, ...}>,
 *     deployAsNew?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSourceNetworkRecoveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSourceNetworkRecoveryAsync(array{
 *     sourceNetworks?: list<array{sourceNetworkID?: string, cfnStackName?: string, ...}>,
 *     deployAsNew?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSourceNetworkReplication(array $args = [])
 * @phpstan-method \Aws\Result startSourceNetworkReplication(array{sourceNetworkID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSourceNetworkReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSourceNetworkReplicationAsync(array{sourceNetworkID?: string, ...} $args = [])
 * @method \Aws\Result stopFailback(array $args = [])
 * @phpstan-method \Aws\Result stopFailback(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopFailbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopFailbackAsync(array{recoveryInstanceID?: string, ...} $args = [])
 * @method \Aws\Result stopReplication(array $args = [])
 * @phpstan-method \Aws\Result stopReplication(array{sourceServerID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopReplicationAsync(array{sourceServerID?: string, ...} $args = [])
 * @method \Aws\Result stopSourceNetworkReplication(array $args = [])
 * @phpstan-method \Aws\Result stopSourceNetworkReplication(array{sourceNetworkID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSourceNetworkReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSourceNetworkReplicationAsync(array{sourceNetworkID?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result terminateRecoveryInstances(array $args = [])
 * @phpstan-method \Aws\Result terminateRecoveryInstances(array{recoveryInstanceIDs?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateRecoveryInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateRecoveryInstancesAsync(array{recoveryInstanceIDs?: list<string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateFailbackReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateFailbackReplicationConfiguration(array{
 *     recoveryInstanceID?: string,
 *     name?: string,
 *     bandwidthThrottling?: int,
 *     usePrivateIP?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFailbackReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFailbackReplicationConfigurationAsync(array{
 *     recoveryInstanceID?: string,
 *     name?: string,
 *     bandwidthThrottling?: int,
 *     usePrivateIP?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLaunchConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateLaunchConfiguration(array{
 *     sourceServerID?: string,
 *     name?: string,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'IN_AWS'|'NONE',
 *     copyPrivateIp?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     postLaunchEnabled?: bool,
 *     launchIntoInstanceProperties?: array{launchIntoEC2InstanceID?: string, ...},
 *     recoveryMode?: 'FAST'|'OPTIMAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLaunchConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLaunchConfigurationAsync(array{
 *     sourceServerID?: string,
 *     name?: string,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'IN_AWS'|'NONE',
 *     copyPrivateIp?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     postLaunchEnabled?: bool,
 *     launchIntoInstanceProperties?: array{launchIntoEC2InstanceID?: string, ...},
 *     recoveryMode?: 'FAST'|'OPTIMAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLaunchConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateLaunchConfigurationTemplate(array{
 *     launchConfigurationTemplateID?: string,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'IN_AWS'|'NONE',
 *     copyPrivateIp?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     exportBucketArn?: string,
 *     postLaunchEnabled?: bool,
 *     launchIntoSourceInstance?: bool,
 *     recoveryMode?: 'FAST'|'OPTIMAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLaunchConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLaunchConfigurationTemplateAsync(array{
 *     launchConfigurationTemplateID?: string,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'IN_AWS'|'NONE',
 *     copyPrivateIp?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     exportBucketArn?: string,
 *     postLaunchEnabled?: bool,
 *     launchIntoSourceInstance?: bool,
 *     recoveryMode?: 'FAST'|'OPTIMAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateReplicationConfiguration(array{
 *     sourceServerID?: string,
 *     name?: string,
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'AUTO'|'GP2'|'GP3'|'ST1',
 *     replicatedDisks?: list<array{
 *         deviceName?: string,
 *         isBootDisk?: bool,
 *         stagingDiskType?: 'AUTO'|'GP2'|'GP3'|'IO1'|'SC1'|'ST1'|'STANDARD',
 *         iops?: int,
 *         throughput?: int,
 *         optimizedStagingDiskType?: 'AUTO'|'GP2'|'GP3'|'IO1'|'SC1'|'ST1'|'STANDARD',
 *         ...,
 *     }>,
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT'|'NONE',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     pitPolicy?: list<array{
 *         ruleID?: int,
 *         units?: 'DAY'|'HOUR'|'MINUTE',
 *         interval?: int,
 *         retentionDuration?: int,
 *         enabled?: bool,
 *         ...,
 *     }>,
 *     autoReplicateNewDisks?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReplicationConfigurationAsync(array{
 *     sourceServerID?: string,
 *     name?: string,
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'AUTO'|'GP2'|'GP3'|'ST1',
 *     replicatedDisks?: list<array{
 *         deviceName?: string,
 *         isBootDisk?: bool,
 *         stagingDiskType?: 'AUTO'|'GP2'|'GP3'|'IO1'|'SC1'|'ST1'|'STANDARD',
 *         iops?: int,
 *         throughput?: int,
 *         optimizedStagingDiskType?: 'AUTO'|'GP2'|'GP3'|'IO1'|'SC1'|'ST1'|'STANDARD',
 *         ...,
 *     }>,
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT'|'NONE',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     pitPolicy?: list<array{
 *         ruleID?: int,
 *         units?: 'DAY'|'HOUR'|'MINUTE',
 *         interval?: int,
 *         retentionDuration?: int,
 *         enabled?: bool,
 *         ...,
 *     }>,
 *     autoReplicateNewDisks?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReplicationConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateReplicationConfigurationTemplate(array{
 *     replicationConfigurationTemplateID?: string,
 *     arn?: string,
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'AUTO'|'GP2'|'GP3'|'ST1',
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT'|'NONE',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     pitPolicy?: list<array{
 *         ruleID?: int,
 *         units?: 'DAY'|'HOUR'|'MINUTE',
 *         interval?: int,
 *         retentionDuration?: int,
 *         enabled?: bool,
 *         ...,
 *     }>,
 *     autoReplicateNewDisks?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReplicationConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReplicationConfigurationTemplateAsync(array{
 *     replicationConfigurationTemplateID?: string,
 *     arn?: string,
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'AUTO'|'GP2'|'GP3'|'ST1',
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT'|'NONE',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     pitPolicy?: list<array{
 *         ruleID?: int,
 *         units?: 'DAY'|'HOUR'|'MINUTE',
 *         interval?: int,
 *         retentionDuration?: int,
 *         enabled?: bool,
 *         ...,
 *     }>,
 *     autoReplicateNewDisks?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     ...,
 * } $args = [])
 */
class drsClient extends AwsClient {}
