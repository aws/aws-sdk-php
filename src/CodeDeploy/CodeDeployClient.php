<?php
namespace Aws\CodeDeploy;

use Aws\AwsClient;

/**
 * This client is used to interact with AWS CodeDeploy
 *
 * @method \Aws\Result addTagsToOnPremisesInstances(array $args = [])
 * @phpstan-method \Aws\Result addTagsToOnPremisesInstances(array{tags?: list<array{Key?: string, Value?: string, ...}>, instanceNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToOnPremisesInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToOnPremisesInstancesAsync(array{tags?: list<array{Key?: string, Value?: string, ...}>, instanceNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetApplicationRevisions(array $args = [])
 * @phpstan-method \Aws\Result batchGetApplicationRevisions(array{
 *     applicationName?: string,
 *     revisions?: list<array{
 *         revisionType?: 'AppSpecContent'|'GitHub'|'S3'|'String',
 *         s3Location?: array,
 *         gitHubLocation?: array,
 *         string?: array,
 *         appSpecContent?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetApplicationRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetApplicationRevisionsAsync(array{
 *     applicationName?: string,
 *     revisions?: list<array{
 *         revisionType?: 'AppSpecContent'|'GitHub'|'S3'|'String',
 *         s3Location?: array,
 *         gitHubLocation?: array,
 *         string?: array,
 *         appSpecContent?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetApplications(array $args = [])
 * @phpstan-method \Aws\Result batchGetApplications(array{applicationNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetApplicationsAsync(array{applicationNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetDeploymentGroups(array $args = [])
 * @phpstan-method \Aws\Result batchGetDeploymentGroups(array{applicationName?: string, deploymentGroupNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDeploymentGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDeploymentGroupsAsync(array{applicationName?: string, deploymentGroupNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetDeploymentInstances(array $args = [])
 * @phpstan-method \Aws\Result batchGetDeploymentInstances(array{deploymentId?: string, instanceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDeploymentInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDeploymentInstancesAsync(array{deploymentId?: string, instanceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetDeploymentTargets(array $args = [])
 * @phpstan-method \Aws\Result batchGetDeploymentTargets(array{deploymentId?: string, targetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDeploymentTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDeploymentTargetsAsync(array{deploymentId?: string, targetIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetDeployments(array $args = [])
 * @phpstan-method \Aws\Result batchGetDeployments(array{deploymentIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDeploymentsAsync(array{deploymentIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetOnPremisesInstances(array $args = [])
 * @phpstan-method \Aws\Result batchGetOnPremisesInstances(array{instanceNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetOnPremisesInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetOnPremisesInstancesAsync(array{instanceNames?: list<string>, ...} $args = [])
 * @method \Aws\Result continueDeployment(array $args = [])
 * @phpstan-method \Aws\Result continueDeployment(array{deploymentId?: string, deploymentWaitType?: 'READY_WAIT'|'TERMINATION_WAIT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise continueDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise continueDeploymentAsync(array{deploymentId?: string, deploymentWaitType?: 'READY_WAIT'|'TERMINATION_WAIT', ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     applicationName?: string,
 *     computePlatform?: 'ECS'|'Lambda'|'Server',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     applicationName?: string,
 *     computePlatform?: 'ECS'|'Lambda'|'Server',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{
 *     applicationName?: string,
 *     deploymentGroupName?: string,
 *     revision?: array{
 *         revisionType?: 'AppSpecContent'|'GitHub'|'S3'|'String',
 *         s3Location?: array{
 *             bucket?: string,
 *             key?: string,
 *             bundleType?: 'JSON'|'YAML'|'tar'|'tgz'|'zip',
 *             version?: string,
 *             eTag?: string,
 *             ...,
 *         },
 *         gitHubLocation?: array{repository?: string, commitId?: string, ...},
 *         string?: array{content?: string, sha256?: string, ...},
 *         appSpecContent?: array{content?: string, sha256?: string, ...},
 *         ...,
 *     },
 *     deploymentConfigName?: string,
 *     description?: string,
 *     ignoreApplicationStopFailures?: bool,
 *     targetInstances?: array{
 *         tagFilters?: list<array>,
 *         autoScalingGroups?: list<string>,
 *         ec2TagSet?: array{ec2TagSetList?: list<list<array>>, ...},
 *         ...,
 *     },
 *     autoRollbackConfiguration?: array{
 *         enabled?: bool,
 *         events?: list<'DEPLOYMENT_FAILURE'|'DEPLOYMENT_STOP_ON_ALARM'|'DEPLOYMENT_STOP_ON_REQUEST'>,
 *         ...,
 *     },
 *     updateOutdatedInstancesOnly?: bool,
 *     fileExistsBehavior?: 'DISALLOW'|'OVERWRITE'|'RETAIN',
 *     overrideAlarmConfiguration?: array{enabled?: bool, ignorePollAlarmFailure?: bool, alarms?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{
 *     applicationName?: string,
 *     deploymentGroupName?: string,
 *     revision?: array{
 *         revisionType?: 'AppSpecContent'|'GitHub'|'S3'|'String',
 *         s3Location?: array{
 *             bucket?: string,
 *             key?: string,
 *             bundleType?: 'JSON'|'YAML'|'tar'|'tgz'|'zip',
 *             version?: string,
 *             eTag?: string,
 *             ...,
 *         },
 *         gitHubLocation?: array{repository?: string, commitId?: string, ...},
 *         string?: array{content?: string, sha256?: string, ...},
 *         appSpecContent?: array{content?: string, sha256?: string, ...},
 *         ...,
 *     },
 *     deploymentConfigName?: string,
 *     description?: string,
 *     ignoreApplicationStopFailures?: bool,
 *     targetInstances?: array{
 *         tagFilters?: list<array>,
 *         autoScalingGroups?: list<string>,
 *         ec2TagSet?: array{ec2TagSetList?: list<list<array>>, ...},
 *         ...,
 *     },
 *     autoRollbackConfiguration?: array{
 *         enabled?: bool,
 *         events?: list<'DEPLOYMENT_FAILURE'|'DEPLOYMENT_STOP_ON_ALARM'|'DEPLOYMENT_STOP_ON_REQUEST'>,
 *         ...,
 *     },
 *     updateOutdatedInstancesOnly?: bool,
 *     fileExistsBehavior?: 'DISALLOW'|'OVERWRITE'|'RETAIN',
 *     overrideAlarmConfiguration?: array{enabled?: bool, ignorePollAlarmFailure?: bool, alarms?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeploymentConfig(array $args = [])
 * @phpstan-method \Aws\Result createDeploymentConfig(array{
 *     deploymentConfigName?: string,
 *     minimumHealthyHosts?: array{type?: 'FLEET_PERCENT'|'HOST_COUNT', value?: int, ...},
 *     trafficRoutingConfig?: array{
 *         type?: 'AllAtOnce'|'TimeBasedCanary'|'TimeBasedLinear',
 *         timeBasedCanary?: array{canaryPercentage?: int, canaryInterval?: int, ...},
 *         timeBasedLinear?: array{linearPercentage?: int, linearInterval?: int, ...},
 *         ...,
 *     },
 *     computePlatform?: 'ECS'|'Lambda'|'Server',
 *     zonalConfig?: array{
 *         firstZoneMonitorDurationInSeconds?: int,
 *         monitorDurationInSeconds?: int,
 *         minimumHealthyHostsPerZone?: array{type?: 'FLEET_PERCENT'|'HOST_COUNT', value?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentConfigAsync(array{
 *     deploymentConfigName?: string,
 *     minimumHealthyHosts?: array{type?: 'FLEET_PERCENT'|'HOST_COUNT', value?: int, ...},
 *     trafficRoutingConfig?: array{
 *         type?: 'AllAtOnce'|'TimeBasedCanary'|'TimeBasedLinear',
 *         timeBasedCanary?: array{canaryPercentage?: int, canaryInterval?: int, ...},
 *         timeBasedLinear?: array{linearPercentage?: int, linearInterval?: int, ...},
 *         ...,
 *     },
 *     computePlatform?: 'ECS'|'Lambda'|'Server',
 *     zonalConfig?: array{
 *         firstZoneMonitorDurationInSeconds?: int,
 *         monitorDurationInSeconds?: int,
 *         minimumHealthyHostsPerZone?: array{type?: 'FLEET_PERCENT'|'HOST_COUNT', value?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeploymentGroup(array $args = [])
 * @phpstan-method \Aws\Result createDeploymentGroup(array{
 *     applicationName?: string,
 *     deploymentGroupName?: string,
 *     deploymentConfigName?: string,
 *     ec2TagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     onPremisesInstanceTagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     autoScalingGroups?: list<string>,
 *     serviceRoleArn?: string,
 *     triggerConfigurations?: list<array{
 *         triggerName?: string,
 *         triggerTargetArn?: string,
 *         triggerEvents?: list<'DeploymentFailure'|'DeploymentReady'|'DeploymentRollback'|'DeploymentStart'|'DeploymentStop'|'DeploymentSuccess'|'InstanceFailure'|'InstanceReady'|'InstanceStart'|'InstanceSuccess'>,
 *         ...,
 *     }>,
 *     alarmConfiguration?: array{enabled?: bool, ignorePollAlarmFailure?: bool, alarms?: list<array>, ...},
 *     autoRollbackConfiguration?: array{
 *         enabled?: bool,
 *         events?: list<'DEPLOYMENT_FAILURE'|'DEPLOYMENT_STOP_ON_ALARM'|'DEPLOYMENT_STOP_ON_REQUEST'>,
 *         ...,
 *     },
 *     outdatedInstancesStrategy?: 'IGNORE'|'UPDATE',
 *     deploymentStyle?: array{
 *         deploymentType?: 'BLUE_GREEN'|'IN_PLACE',
 *         deploymentOption?: 'WITHOUT_TRAFFIC_CONTROL'|'WITH_TRAFFIC_CONTROL',
 *         ...,
 *     },
 *     blueGreenDeploymentConfiguration?: array{
 *         terminateBlueInstancesOnDeploymentSuccess?: array{action?: 'KEEP_ALIVE'|'TERMINATE', terminationWaitTimeInMinutes?: int, ...},
 *         deploymentReadyOption?: array{actionOnTimeout?: 'CONTINUE_DEPLOYMENT'|'STOP_DEPLOYMENT', waitTimeInMinutes?: int, ...},
 *         greenFleetProvisioningOption?: array{action?: 'COPY_AUTO_SCALING_GROUP'|'DISCOVER_EXISTING', ...},
 *         ...,
 *     },
 *     loadBalancerInfo?: array{
 *         elbInfoList?: list<array>,
 *         targetGroupInfoList?: list<array>,
 *         targetGroupPairInfoList?: list<array>,
 *         ...,
 *     },
 *     ec2TagSet?: array{ec2TagSetList?: list<list<array>>, ...},
 *     ecsServices?: list<array{serviceName?: string, clusterName?: string, ...}>,
 *     onPremisesTagSet?: array{onPremisesTagSetList?: list<list<array>>, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     terminationHookEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentGroupAsync(array{
 *     applicationName?: string,
 *     deploymentGroupName?: string,
 *     deploymentConfigName?: string,
 *     ec2TagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     onPremisesInstanceTagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     autoScalingGroups?: list<string>,
 *     serviceRoleArn?: string,
 *     triggerConfigurations?: list<array{
 *         triggerName?: string,
 *         triggerTargetArn?: string,
 *         triggerEvents?: list<'DeploymentFailure'|'DeploymentReady'|'DeploymentRollback'|'DeploymentStart'|'DeploymentStop'|'DeploymentSuccess'|'InstanceFailure'|'InstanceReady'|'InstanceStart'|'InstanceSuccess'>,
 *         ...,
 *     }>,
 *     alarmConfiguration?: array{enabled?: bool, ignorePollAlarmFailure?: bool, alarms?: list<array>, ...},
 *     autoRollbackConfiguration?: array{
 *         enabled?: bool,
 *         events?: list<'DEPLOYMENT_FAILURE'|'DEPLOYMENT_STOP_ON_ALARM'|'DEPLOYMENT_STOP_ON_REQUEST'>,
 *         ...,
 *     },
 *     outdatedInstancesStrategy?: 'IGNORE'|'UPDATE',
 *     deploymentStyle?: array{
 *         deploymentType?: 'BLUE_GREEN'|'IN_PLACE',
 *         deploymentOption?: 'WITHOUT_TRAFFIC_CONTROL'|'WITH_TRAFFIC_CONTROL',
 *         ...,
 *     },
 *     blueGreenDeploymentConfiguration?: array{
 *         terminateBlueInstancesOnDeploymentSuccess?: array{action?: 'KEEP_ALIVE'|'TERMINATE', terminationWaitTimeInMinutes?: int, ...},
 *         deploymentReadyOption?: array{actionOnTimeout?: 'CONTINUE_DEPLOYMENT'|'STOP_DEPLOYMENT', waitTimeInMinutes?: int, ...},
 *         greenFleetProvisioningOption?: array{action?: 'COPY_AUTO_SCALING_GROUP'|'DISCOVER_EXISTING', ...},
 *         ...,
 *     },
 *     loadBalancerInfo?: array{
 *         elbInfoList?: list<array>,
 *         targetGroupInfoList?: list<array>,
 *         targetGroupPairInfoList?: list<array>,
 *         ...,
 *     },
 *     ec2TagSet?: array{ec2TagSetList?: list<list<array>>, ...},
 *     ecsServices?: list<array{serviceName?: string, clusterName?: string, ...}>,
 *     onPremisesTagSet?: array{onPremisesTagSetList?: list<list<array>>, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     terminationHookEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{applicationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{applicationName?: string, ...} $args = [])
 * @method \Aws\Result deleteDeploymentConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteDeploymentConfig(array{deploymentConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentConfigAsync(array{deploymentConfigName?: string, ...} $args = [])
 * @method \Aws\Result deleteDeploymentGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDeploymentGroup(array{applicationName?: string, deploymentGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentGroupAsync(array{applicationName?: string, deploymentGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteGitHubAccountToken(array $args = [])
 * @phpstan-method \Aws\Result deleteGitHubAccountToken(array{tokenName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGitHubAccountTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGitHubAccountTokenAsync(array{tokenName?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcesByExternalId(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcesByExternalId(array{externalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcesByExternalIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcesByExternalIdAsync(array{externalId?: string, ...} $args = [])
 * @method \Aws\Result deregisterOnPremisesInstance(array $args = [])
 * @phpstan-method \Aws\Result deregisterOnPremisesInstance(array{instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterOnPremisesInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterOnPremisesInstanceAsync(array{instanceName?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{applicationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{applicationName?: string, ...} $args = [])
 * @method \Aws\Result getApplicationRevision(array $args = [])
 * @phpstan-method \Aws\Result getApplicationRevision(array{
 *     applicationName?: string,
 *     revision?: array{
 *         revisionType?: 'AppSpecContent'|'GitHub'|'S3'|'String',
 *         s3Location?: array{
 *             bucket?: string,
 *             key?: string,
 *             bundleType?: 'JSON'|'YAML'|'tar'|'tgz'|'zip',
 *             version?: string,
 *             eTag?: string,
 *             ...,
 *         },
 *         gitHubLocation?: array{repository?: string, commitId?: string, ...},
 *         string?: array{content?: string, sha256?: string, ...},
 *         appSpecContent?: array{content?: string, sha256?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationRevisionAsync(array{
 *     applicationName?: string,
 *     revision?: array{
 *         revisionType?: 'AppSpecContent'|'GitHub'|'S3'|'String',
 *         s3Location?: array{
 *             bucket?: string,
 *             key?: string,
 *             bundleType?: 'JSON'|'YAML'|'tar'|'tgz'|'zip',
 *             version?: string,
 *             eTag?: string,
 *             ...,
 *         },
 *         gitHubLocation?: array{repository?: string, commitId?: string, ...},
 *         string?: array{content?: string, sha256?: string, ...},
 *         appSpecContent?: array{content?: string, sha256?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{deploymentId?: string, ...} $args = [])
 * @method \Aws\Result getDeploymentConfig(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentConfig(array{deploymentConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentConfigAsync(array{deploymentConfigName?: string, ...} $args = [])
 * @method \Aws\Result getDeploymentGroup(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentGroup(array{applicationName?: string, deploymentGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentGroupAsync(array{applicationName?: string, deploymentGroupName?: string, ...} $args = [])
 * @method \Aws\Result getDeploymentInstance(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentInstance(array{deploymentId?: string, instanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentInstanceAsync(array{deploymentId?: string, instanceId?: string, ...} $args = [])
 * @method \Aws\Result getDeploymentTarget(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentTarget(array{deploymentId?: string, targetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentTargetAsync(array{deploymentId?: string, targetId?: string, ...} $args = [])
 * @method \Aws\Result getOnPremisesInstance(array $args = [])
 * @phpstan-method \Aws\Result getOnPremisesInstance(array{instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOnPremisesInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOnPremisesInstanceAsync(array{instanceName?: string, ...} $args = [])
 * @method \Aws\Result listApplicationRevisions(array $args = [])
 * @phpstan-method \Aws\Result listApplicationRevisions(array{
 *     applicationName?: string,
 *     sortBy?: 'firstUsedTime'|'lastUsedTime'|'registerTime',
 *     sortOrder?: 'ascending'|'descending',
 *     s3Bucket?: string,
 *     s3KeyPrefix?: string,
 *     deployed?: 'exclude'|'ignore'|'include',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationRevisionsAsync(array{
 *     applicationName?: string,
 *     sortBy?: 'firstUsedTime'|'lastUsedTime'|'registerTime',
 *     sortOrder?: 'ascending'|'descending',
 *     s3Bucket?: string,
 *     s3KeyPrefix?: string,
 *     deployed?: 'exclude'|'ignore'|'include',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeploymentConfigs(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentConfigs(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentConfigsAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeploymentGroups(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentGroups(array{applicationName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentGroupsAsync(array{applicationName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeploymentInstances(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentInstances(array{
 *     deploymentId?: string,
 *     nextToken?: string,
 *     instanceStatusFilter?: list<'Failed'|'InProgress'|'Pending'|'Ready'|'Skipped'|'Succeeded'|'Unknown'>,
 *     instanceTypeFilter?: list<'Blue'|'Green'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentInstancesAsync(array{
 *     deploymentId?: string,
 *     nextToken?: string,
 *     instanceStatusFilter?: list<'Failed'|'InProgress'|'Pending'|'Ready'|'Skipped'|'Succeeded'|'Unknown'>,
 *     instanceTypeFilter?: list<'Blue'|'Green'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDeploymentTargets(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentTargets(array{deploymentId?: string, nextToken?: string, targetFilters?: array<string, list<string>>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentTargetsAsync(array{deploymentId?: string, nextToken?: string, targetFilters?: array<string, list<string>>, ...} $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDeployments(array{
 *     applicationName?: string,
 *     deploymentGroupName?: string,
 *     externalId?: string,
 *     includeOnlyStatuses?: list<'Baking'|'Created'|'Failed'|'InProgress'|'Queued'|'Ready'|'Stopped'|'Succeeded'>,
 *     createTimeRange?: array{start?: int|string|\DateTimeInterface, end?: int|string|\DateTimeInterface, ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array{
 *     applicationName?: string,
 *     deploymentGroupName?: string,
 *     externalId?: string,
 *     includeOnlyStatuses?: list<'Baking'|'Created'|'Failed'|'InProgress'|'Queued'|'Ready'|'Stopped'|'Succeeded'>,
 *     createTimeRange?: array{start?: int|string|\DateTimeInterface, end?: int|string|\DateTimeInterface, ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGitHubAccountTokenNames(array $args = [])
 * @phpstan-method \Aws\Result listGitHubAccountTokenNames(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGitHubAccountTokenNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGitHubAccountTokenNamesAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listOnPremisesInstances(array $args = [])
 * @phpstan-method \Aws\Result listOnPremisesInstances(array{
 *     registrationStatus?: 'Deregistered'|'Registered',
 *     tagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOnPremisesInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOnPremisesInstancesAsync(array{
 *     registrationStatus?: 'Deregistered'|'Registered',
 *     tagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putLifecycleEventHookExecutionStatus(array $args = [])
 * @phpstan-method \Aws\Result putLifecycleEventHookExecutionStatus(array{
 *     deploymentId?: string,
 *     lifecycleEventHookExecutionId?: string,
 *     status?: 'Failed'|'InProgress'|'Pending'|'Skipped'|'Succeeded'|'Unknown',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putLifecycleEventHookExecutionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLifecycleEventHookExecutionStatusAsync(array{
 *     deploymentId?: string,
 *     lifecycleEventHookExecutionId?: string,
 *     status?: 'Failed'|'InProgress'|'Pending'|'Skipped'|'Succeeded'|'Unknown',
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerApplicationRevision(array $args = [])
 * @phpstan-method \Aws\Result registerApplicationRevision(array{
 *     applicationName?: string,
 *     description?: string,
 *     revision?: array{
 *         revisionType?: 'AppSpecContent'|'GitHub'|'S3'|'String',
 *         s3Location?: array{
 *             bucket?: string,
 *             key?: string,
 *             bundleType?: 'JSON'|'YAML'|'tar'|'tgz'|'zip',
 *             version?: string,
 *             eTag?: string,
 *             ...,
 *         },
 *         gitHubLocation?: array{repository?: string, commitId?: string, ...},
 *         string?: array{content?: string, sha256?: string, ...},
 *         appSpecContent?: array{content?: string, sha256?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerApplicationRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerApplicationRevisionAsync(array{
 *     applicationName?: string,
 *     description?: string,
 *     revision?: array{
 *         revisionType?: 'AppSpecContent'|'GitHub'|'S3'|'String',
 *         s3Location?: array{
 *             bucket?: string,
 *             key?: string,
 *             bundleType?: 'JSON'|'YAML'|'tar'|'tgz'|'zip',
 *             version?: string,
 *             eTag?: string,
 *             ...,
 *         },
 *         gitHubLocation?: array{repository?: string, commitId?: string, ...},
 *         string?: array{content?: string, sha256?: string, ...},
 *         appSpecContent?: array{content?: string, sha256?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerOnPremisesInstance(array $args = [])
 * @phpstan-method \Aws\Result registerOnPremisesInstance(array{instanceName?: string, iamSessionArn?: string, iamUserArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerOnPremisesInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerOnPremisesInstanceAsync(array{instanceName?: string, iamSessionArn?: string, iamUserArn?: string, ...} $args = [])
 * @method \Aws\Result removeTagsFromOnPremisesInstances(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromOnPremisesInstances(array{tags?: list<array{Key?: string, Value?: string, ...}>, instanceNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromOnPremisesInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromOnPremisesInstancesAsync(array{tags?: list<array{Key?: string, Value?: string, ...}>, instanceNames?: list<string>, ...} $args = [])
 * @method \Aws\Result skipWaitTimeForInstanceTermination(array $args = [])
 * @phpstan-method \Aws\Result skipWaitTimeForInstanceTermination(array{deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise skipWaitTimeForInstanceTerminationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise skipWaitTimeForInstanceTerminationAsync(array{deploymentId?: string, ...} $args = [])
 * @method \Aws\Result stopDeployment(array $args = [])
 * @phpstan-method \Aws\Result stopDeployment(array{deploymentId?: string, autoRollbackEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDeploymentAsync(array{deploymentId?: string, autoRollbackEnabled?: bool, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{applicationName?: string, newApplicationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{applicationName?: string, newApplicationName?: string, ...} $args = [])
 * @method \Aws\Result updateDeploymentGroup(array $args = [])
 * @phpstan-method \Aws\Result updateDeploymentGroup(array{
 *     applicationName?: string,
 *     currentDeploymentGroupName?: string,
 *     newDeploymentGroupName?: string,
 *     deploymentConfigName?: string,
 *     ec2TagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     onPremisesInstanceTagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     autoScalingGroups?: list<string>,
 *     serviceRoleArn?: string,
 *     triggerConfigurations?: list<array{
 *         triggerName?: string,
 *         triggerTargetArn?: string,
 *         triggerEvents?: list<'DeploymentFailure'|'DeploymentReady'|'DeploymentRollback'|'DeploymentStart'|'DeploymentStop'|'DeploymentSuccess'|'InstanceFailure'|'InstanceReady'|'InstanceStart'|'InstanceSuccess'>,
 *         ...,
 *     }>,
 *     alarmConfiguration?: array{enabled?: bool, ignorePollAlarmFailure?: bool, alarms?: list<array>, ...},
 *     autoRollbackConfiguration?: array{
 *         enabled?: bool,
 *         events?: list<'DEPLOYMENT_FAILURE'|'DEPLOYMENT_STOP_ON_ALARM'|'DEPLOYMENT_STOP_ON_REQUEST'>,
 *         ...,
 *     },
 *     outdatedInstancesStrategy?: 'IGNORE'|'UPDATE',
 *     deploymentStyle?: array{
 *         deploymentType?: 'BLUE_GREEN'|'IN_PLACE',
 *         deploymentOption?: 'WITHOUT_TRAFFIC_CONTROL'|'WITH_TRAFFIC_CONTROL',
 *         ...,
 *     },
 *     blueGreenDeploymentConfiguration?: array{
 *         terminateBlueInstancesOnDeploymentSuccess?: array{action?: 'KEEP_ALIVE'|'TERMINATE', terminationWaitTimeInMinutes?: int, ...},
 *         deploymentReadyOption?: array{actionOnTimeout?: 'CONTINUE_DEPLOYMENT'|'STOP_DEPLOYMENT', waitTimeInMinutes?: int, ...},
 *         greenFleetProvisioningOption?: array{action?: 'COPY_AUTO_SCALING_GROUP'|'DISCOVER_EXISTING', ...},
 *         ...,
 *     },
 *     loadBalancerInfo?: array{
 *         elbInfoList?: list<array>,
 *         targetGroupInfoList?: list<array>,
 *         targetGroupPairInfoList?: list<array>,
 *         ...,
 *     },
 *     ec2TagSet?: array{ec2TagSetList?: list<list<array>>, ...},
 *     ecsServices?: list<array{serviceName?: string, clusterName?: string, ...}>,
 *     onPremisesTagSet?: array{onPremisesTagSetList?: list<list<array>>, ...},
 *     terminationHookEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeploymentGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeploymentGroupAsync(array{
 *     applicationName?: string,
 *     currentDeploymentGroupName?: string,
 *     newDeploymentGroupName?: string,
 *     deploymentConfigName?: string,
 *     ec2TagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     onPremisesInstanceTagFilters?: list<array{Key?: string, Value?: string, Type?: 'KEY_AND_VALUE'|'KEY_ONLY'|'VALUE_ONLY', ...}>,
 *     autoScalingGroups?: list<string>,
 *     serviceRoleArn?: string,
 *     triggerConfigurations?: list<array{
 *         triggerName?: string,
 *         triggerTargetArn?: string,
 *         triggerEvents?: list<'DeploymentFailure'|'DeploymentReady'|'DeploymentRollback'|'DeploymentStart'|'DeploymentStop'|'DeploymentSuccess'|'InstanceFailure'|'InstanceReady'|'InstanceStart'|'InstanceSuccess'>,
 *         ...,
 *     }>,
 *     alarmConfiguration?: array{enabled?: bool, ignorePollAlarmFailure?: bool, alarms?: list<array>, ...},
 *     autoRollbackConfiguration?: array{
 *         enabled?: bool,
 *         events?: list<'DEPLOYMENT_FAILURE'|'DEPLOYMENT_STOP_ON_ALARM'|'DEPLOYMENT_STOP_ON_REQUEST'>,
 *         ...,
 *     },
 *     outdatedInstancesStrategy?: 'IGNORE'|'UPDATE',
 *     deploymentStyle?: array{
 *         deploymentType?: 'BLUE_GREEN'|'IN_PLACE',
 *         deploymentOption?: 'WITHOUT_TRAFFIC_CONTROL'|'WITH_TRAFFIC_CONTROL',
 *         ...,
 *     },
 *     blueGreenDeploymentConfiguration?: array{
 *         terminateBlueInstancesOnDeploymentSuccess?: array{action?: 'KEEP_ALIVE'|'TERMINATE', terminationWaitTimeInMinutes?: int, ...},
 *         deploymentReadyOption?: array{actionOnTimeout?: 'CONTINUE_DEPLOYMENT'|'STOP_DEPLOYMENT', waitTimeInMinutes?: int, ...},
 *         greenFleetProvisioningOption?: array{action?: 'COPY_AUTO_SCALING_GROUP'|'DISCOVER_EXISTING', ...},
 *         ...,
 *     },
 *     loadBalancerInfo?: array{
 *         elbInfoList?: list<array>,
 *         targetGroupInfoList?: list<array>,
 *         targetGroupPairInfoList?: list<array>,
 *         ...,
 *     },
 *     ec2TagSet?: array{ec2TagSetList?: list<list<array>>, ...},
 *     ecsServices?: list<array{serviceName?: string, clusterName?: string, ...}>,
 *     onPremisesTagSet?: array{onPremisesTagSetList?: list<list<array>>, ...},
 *     terminationHookEnabled?: bool,
 *     ...,
 * } $args = [])
 */
class CodeDeployClient extends AwsClient {}
