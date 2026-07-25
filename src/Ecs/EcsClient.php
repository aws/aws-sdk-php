<?php
namespace Aws\Ecs;

use Aws\AwsClient;

/**
 * This client is used to interact with **Amazon ECS**.
 *
 * @method \Aws\Result continueServiceDeployment(array $args = [])
 * @phpstan-method \Aws\Result continueServiceDeployment(array{serviceDeploymentArn?: string, hookId?: string, action?: 'CONTINUE'|'ROLLBACK', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise continueServiceDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise continueServiceDeploymentAsync(array{serviceDeploymentArn?: string, hookId?: string, action?: 'CONTINUE'|'ROLLBACK', ...} $args = [])
 * @method \Aws\Result createCapacityProvider(array $args = [])
 * @phpstan-method \Aws\Result createCapacityProvider(array{
 *     name?: string,
 *     cluster?: string,
 *     autoScalingGroupProvider?: array{
 *         autoScalingGroupArn?: string,
 *         managedScaling?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             targetCapacity?: int,
 *             minimumScalingStepSize?: int,
 *             maximumScalingStepSize?: int,
 *             instanceWarmupPeriod?: int,
 *             ...,
 *         },
 *         managedTerminationProtection?: 'DISABLED'|'ENABLED',
 *         managedDraining?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     managedInstancesProvider?: array{
 *         infrastructureRoleArn?: string,
 *         instanceLaunchTemplate?: array{
 *             ec2InstanceProfileArn?: string,
 *             networkConfiguration?: array,
 *             storageConfiguration?: array,
 *             localStorageConfiguration?: array,
 *             monitoring?: 'BASIC'|'DETAILED',
 *             capacityOptionType?: 'ON_DEMAND'|'RESERVED'|'SPOT',
 *             instanceMetadataTagsPropagation?: bool,
 *             instanceRequirements?: array,
 *             fipsEnabled?: bool,
 *             capacityReservations?: array,
 *             ...,
 *         },
 *         propagateTags?: 'CAPACITY_PROVIDER'|'NONE',
 *         infrastructureOptimization?: array{scaleInAfter?: int, ...},
 *         autoRepairConfiguration?: array{actionsStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCapacityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCapacityProviderAsync(array{
 *     name?: string,
 *     cluster?: string,
 *     autoScalingGroupProvider?: array{
 *         autoScalingGroupArn?: string,
 *         managedScaling?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             targetCapacity?: int,
 *             minimumScalingStepSize?: int,
 *             maximumScalingStepSize?: int,
 *             instanceWarmupPeriod?: int,
 *             ...,
 *         },
 *         managedTerminationProtection?: 'DISABLED'|'ENABLED',
 *         managedDraining?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     managedInstancesProvider?: array{
 *         infrastructureRoleArn?: string,
 *         instanceLaunchTemplate?: array{
 *             ec2InstanceProfileArn?: string,
 *             networkConfiguration?: array,
 *             storageConfiguration?: array,
 *             localStorageConfiguration?: array,
 *             monitoring?: 'BASIC'|'DETAILED',
 *             capacityOptionType?: 'ON_DEMAND'|'RESERVED'|'SPOT',
 *             instanceMetadataTagsPropagation?: bool,
 *             instanceRequirements?: array,
 *             fipsEnabled?: bool,
 *             capacityReservations?: array,
 *             ...,
 *         },
 *         propagateTags?: 'CAPACITY_PROVIDER'|'NONE',
 *         infrastructureOptimization?: array{scaleInAfter?: int, ...},
 *         autoRepairConfiguration?: array{actionsStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     clusterName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     settings?: list<array{name?: 'containerInsights', value?: string, ...}>,
 *     configuration?: array{
 *         executeCommandConfiguration?: array{kmsKeyId?: string, logging?: 'DEFAULT'|'NONE'|'OVERRIDE', logConfiguration?: array, ...},
 *         managedStorageConfiguration?: array{kmsKeyId?: string, fargateEphemeralStorageKmsKeyId?: string, ...},
 *         ...,
 *     },
 *     capacityProviders?: list<string>,
 *     defaultCapacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     serviceConnectDefaults?: array{namespace?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     clusterName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     settings?: list<array{name?: 'containerInsights', value?: string, ...}>,
 *     configuration?: array{
 *         executeCommandConfiguration?: array{kmsKeyId?: string, logging?: 'DEFAULT'|'NONE'|'OVERRIDE', logConfiguration?: array, ...},
 *         managedStorageConfiguration?: array{kmsKeyId?: string, fargateEphemeralStorageKmsKeyId?: string, ...},
 *         ...,
 *     },
 *     capacityProviders?: list<string>,
 *     defaultCapacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     serviceConnectDefaults?: array{namespace?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDaemon(array $args = [])
 * @phpstan-method \Aws\Result createDaemon(array{
 *     daemonName?: string,
 *     clusterArn?: string,
 *     daemonTaskDefinitionArn?: string,
 *     capacityProviderArns?: list<string>,
 *     deploymentConfiguration?: array{
 *         drainPercent?: float,
 *         alarms?: array{alarmNames?: list<string>, enable?: bool, ...},
 *         bakeTimeInMinutes?: int,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     propagateTags?: 'DAEMON'|'NONE',
 *     enableECSManagedTags?: bool,
 *     enableExecuteCommand?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDaemonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDaemonAsync(array{
 *     daemonName?: string,
 *     clusterArn?: string,
 *     daemonTaskDefinitionArn?: string,
 *     capacityProviderArns?: list<string>,
 *     deploymentConfiguration?: array{
 *         drainPercent?: float,
 *         alarms?: array{alarmNames?: list<string>, enable?: bool, ...},
 *         bakeTimeInMinutes?: int,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     propagateTags?: 'DAEMON'|'NONE',
 *     enableECSManagedTags?: bool,
 *     enableExecuteCommand?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExpressGatewayService(array $args = [])
 * @phpstan-method \Aws\Result createExpressGatewayService(array{
 *     executionRoleArn?: string,
 *     infrastructureRoleArn?: string,
 *     serviceName?: string,
 *     cluster?: string,
 *     healthCheckPath?: string,
 *     primaryContainer?: array{
 *         image?: string,
 *         containerPort?: int,
 *         awsLogsConfiguration?: array{logGroup?: string, logStreamPrefix?: string, ...},
 *         repositoryCredentials?: array{credentialsParameter?: string, ...},
 *         command?: list<string>,
 *         environment?: list<array>,
 *         secrets?: list<array>,
 *         ...,
 *     },
 *     taskRoleArn?: string,
 *     networkConfiguration?: array{securityGroups?: list<string>, subnets?: list<string>, ...},
 *     cpu?: string,
 *     memory?: string,
 *     scalingTarget?: array{
 *         minTaskCount?: int,
 *         maxTaskCount?: int,
 *         autoScalingMetric?: 'AVERAGE_CPU'|'AVERAGE_MEMORY'|'REQUEST_COUNT_PER_TARGET',
 *         autoScalingTargetValue?: int,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     taskDefinitionArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExpressGatewayServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExpressGatewayServiceAsync(array{
 *     executionRoleArn?: string,
 *     infrastructureRoleArn?: string,
 *     serviceName?: string,
 *     cluster?: string,
 *     healthCheckPath?: string,
 *     primaryContainer?: array{
 *         image?: string,
 *         containerPort?: int,
 *         awsLogsConfiguration?: array{logGroup?: string, logStreamPrefix?: string, ...},
 *         repositoryCredentials?: array{credentialsParameter?: string, ...},
 *         command?: list<string>,
 *         environment?: list<array>,
 *         secrets?: list<array>,
 *         ...,
 *     },
 *     taskRoleArn?: string,
 *     networkConfiguration?: array{securityGroups?: list<string>, subnets?: list<string>, ...},
 *     cpu?: string,
 *     memory?: string,
 *     scalingTarget?: array{
 *         minTaskCount?: int,
 *         maxTaskCount?: int,
 *         autoScalingMetric?: 'AVERAGE_CPU'|'AVERAGE_MEMORY'|'REQUEST_COUNT_PER_TARGET',
 *         autoScalingTargetValue?: int,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     taskDefinitionArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @phpstan-method \Aws\Result createService(array{
 *     cluster?: string,
 *     serviceName?: string,
 *     taskDefinition?: string,
 *     availabilityZoneRebalancing?: 'DISABLED'|'ENABLED',
 *     loadBalancers?: list<array{
 *         targetGroupArn?: string,
 *         loadBalancerName?: string,
 *         containerName?: string,
 *         containerPort?: int,
 *         advancedConfiguration?: array,
 *         ...,
 *     }>,
 *     serviceRegistries?: list<array{registryArn?: string, port?: int, containerName?: string, containerPort?: int, ...}>,
 *     desiredCount?: int,
 *     clientToken?: string,
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     capacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     platformVersion?: string,
 *     role?: string,
 *     deploymentConfiguration?: array{
 *         deploymentCircuitBreaker?: array{enable?: bool, rollback?: bool, resetOnHealthyTask?: bool, thresholdConfiguration?: array, ...},
 *         maximumPercent?: int,
 *         minimumHealthyPercent?: int,
 *         alarms?: array{alarmNames?: list<string>, rollback?: bool, enable?: bool, ...},
 *         strategy?: 'BLUE_GREEN'|'CANARY'|'LINEAR'|'ROLLING',
 *         bakeTimeInMinutes?: int,
 *         lifecycleHooks?: list<array>,
 *         linearConfiguration?: array{stepPercent?: float, stepBakeTimeInMinutes?: int, ...},
 *         canaryConfiguration?: array{canaryPercent?: float, canaryBakeTimeInMinutes?: int, ...},
 *         ...,
 *     },
 *     placementConstraints?: list<array{type?: 'distinctInstance'|'memberOf', expression?: string, ...}>,
 *     placementStrategy?: list<array{type?: 'binpack'|'random'|'spread', field?: string, ...}>,
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     healthCheckGracePeriodSeconds?: int,
 *     schedulingStrategy?: 'DAEMON'|'REPLICA',
 *     deploymentController?: array{type?: 'CODE_DEPLOY'|'ECS'|'EXTERNAL', ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     enableECSManagedTags?: bool,
 *     propagateTags?: 'NONE'|'SERVICE'|'TASK_DEFINITION',
 *     enableExecuteCommand?: bool,
 *     serviceConnectConfiguration?: array{
 *         enabled?: bool,
 *         namespace?: string,
 *         services?: list<array>,
 *         logConfiguration?: array{
 *             logDriver?: 'awsfirelens'|'awslogs'|'fluentd'|'gelf'|'journald'|'json-file'|'splunk'|'syslog',
 *             options?: array<string, string>,
 *             secretOptions?: list<array>,
 *             ...,
 *         },
 *         accessLogConfiguration?: array{format?: 'JSON'|'TEXT', includeQueryParameters?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     volumeConfigurations?: list<array{name?: string, managedEBSVolume?: array, ...}>,
 *     vpcLatticeConfigurations?: list<array{roleArn?: string, targetGroupArn?: string, portName?: string, ...}>,
 *     monitoring?: array{metricConfigurations?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceAsync(array{
 *     cluster?: string,
 *     serviceName?: string,
 *     taskDefinition?: string,
 *     availabilityZoneRebalancing?: 'DISABLED'|'ENABLED',
 *     loadBalancers?: list<array{
 *         targetGroupArn?: string,
 *         loadBalancerName?: string,
 *         containerName?: string,
 *         containerPort?: int,
 *         advancedConfiguration?: array,
 *         ...,
 *     }>,
 *     serviceRegistries?: list<array{registryArn?: string, port?: int, containerName?: string, containerPort?: int, ...}>,
 *     desiredCount?: int,
 *     clientToken?: string,
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     capacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     platformVersion?: string,
 *     role?: string,
 *     deploymentConfiguration?: array{
 *         deploymentCircuitBreaker?: array{enable?: bool, rollback?: bool, resetOnHealthyTask?: bool, thresholdConfiguration?: array, ...},
 *         maximumPercent?: int,
 *         minimumHealthyPercent?: int,
 *         alarms?: array{alarmNames?: list<string>, rollback?: bool, enable?: bool, ...},
 *         strategy?: 'BLUE_GREEN'|'CANARY'|'LINEAR'|'ROLLING',
 *         bakeTimeInMinutes?: int,
 *         lifecycleHooks?: list<array>,
 *         linearConfiguration?: array{stepPercent?: float, stepBakeTimeInMinutes?: int, ...},
 *         canaryConfiguration?: array{canaryPercent?: float, canaryBakeTimeInMinutes?: int, ...},
 *         ...,
 *     },
 *     placementConstraints?: list<array{type?: 'distinctInstance'|'memberOf', expression?: string, ...}>,
 *     placementStrategy?: list<array{type?: 'binpack'|'random'|'spread', field?: string, ...}>,
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     healthCheckGracePeriodSeconds?: int,
 *     schedulingStrategy?: 'DAEMON'|'REPLICA',
 *     deploymentController?: array{type?: 'CODE_DEPLOY'|'ECS'|'EXTERNAL', ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     enableECSManagedTags?: bool,
 *     propagateTags?: 'NONE'|'SERVICE'|'TASK_DEFINITION',
 *     enableExecuteCommand?: bool,
 *     serviceConnectConfiguration?: array{
 *         enabled?: bool,
 *         namespace?: string,
 *         services?: list<array>,
 *         logConfiguration?: array{
 *             logDriver?: 'awsfirelens'|'awslogs'|'fluentd'|'gelf'|'journald'|'json-file'|'splunk'|'syslog',
 *             options?: array<string, string>,
 *             secretOptions?: list<array>,
 *             ...,
 *         },
 *         accessLogConfiguration?: array{format?: 'JSON'|'TEXT', includeQueryParameters?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     volumeConfigurations?: list<array{name?: string, managedEBSVolume?: array, ...}>,
 *     vpcLatticeConfigurations?: list<array{roleArn?: string, targetGroupArn?: string, portName?: string, ...}>,
 *     monitoring?: array{metricConfigurations?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTaskSet(array $args = [])
 * @phpstan-method \Aws\Result createTaskSet(array{
 *     service?: string,
 *     cluster?: string,
 *     externalId?: string,
 *     taskDefinition?: string,
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     loadBalancers?: list<array{
 *         targetGroupArn?: string,
 *         loadBalancerName?: string,
 *         containerName?: string,
 *         containerPort?: int,
 *         advancedConfiguration?: array,
 *         ...,
 *     }>,
 *     serviceRegistries?: list<array{registryArn?: string, port?: int, containerName?: string, containerPort?: int, ...}>,
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     capacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     platformVersion?: string,
 *     scale?: array{value?: float, unit?: 'PERCENT', ...},
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTaskSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTaskSetAsync(array{
 *     service?: string,
 *     cluster?: string,
 *     externalId?: string,
 *     taskDefinition?: string,
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     loadBalancers?: list<array{
 *         targetGroupArn?: string,
 *         loadBalancerName?: string,
 *         containerName?: string,
 *         containerPort?: int,
 *         advancedConfiguration?: array,
 *         ...,
 *     }>,
 *     serviceRegistries?: list<array{registryArn?: string, port?: int, containerName?: string, containerPort?: int, ...}>,
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     capacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     platformVersion?: string,
 *     scale?: array{value?: float, unit?: 'PERCENT', ...},
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountSetting(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountSetting(array{
 *     name?: 'awsvpcTrunking'|'containerInsights'|'containerInstanceLongArnFormat'|'defaultLogDriverMode'|'fargateEventWindows'|'fargateFIPSMode'|'fargateTaskRetirementWaitPeriod'|'guardDutyActivate'|'serviceLongArnFormat'|'tagResourceAuthorization'|'taskLongArnFormat',
 *     principalArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountSettingAsync(array{
 *     name?: 'awsvpcTrunking'|'containerInsights'|'containerInstanceLongArnFormat'|'defaultLogDriverMode'|'fargateEventWindows'|'fargateFIPSMode'|'fargateTaskRetirementWaitPeriod'|'guardDutyActivate'|'serviceLongArnFormat'|'tagResourceAuthorization'|'taskLongArnFormat',
 *     principalArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAttributes(array $args = [])
 * @phpstan-method \Aws\Result deleteAttributes(array{
 *     cluster?: string,
 *     attributes?: list<array{name?: string, value?: string, targetType?: 'container-instance', targetId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAttributesAsync(array{
 *     cluster?: string,
 *     attributes?: list<array{name?: string, value?: string, targetType?: 'container-instance', targetId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCapacityProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteCapacityProvider(array{capacityProvider?: string, cluster?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCapacityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCapacityProviderAsync(array{capacityProvider?: string, cluster?: string, ...} $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{cluster?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{cluster?: string, ...} $args = [])
 * @method \Aws\Result deleteDaemon(array $args = [])
 * @phpstan-method \Aws\Result deleteDaemon(array{daemonArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDaemonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDaemonAsync(array{daemonArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDaemonTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteDaemonTaskDefinition(array{daemonTaskDefinition?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDaemonTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDaemonTaskDefinitionAsync(array{daemonTaskDefinition?: string, ...} $args = [])
 * @method \Aws\Result deleteExpressGatewayService(array $args = [])
 * @phpstan-method \Aws\Result deleteExpressGatewayService(array{serviceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExpressGatewayServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExpressGatewayServiceAsync(array{serviceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @phpstan-method \Aws\Result deleteService(array{cluster?: string, service?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceAsync(array{cluster?: string, service?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deleteTaskDefinitions(array $args = [])
 * @phpstan-method \Aws\Result deleteTaskDefinitions(array{taskDefinitions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTaskDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTaskDefinitionsAsync(array{taskDefinitions?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteTaskSet(array $args = [])
 * @phpstan-method \Aws\Result deleteTaskSet(array{cluster?: string, service?: string, taskSet?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTaskSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTaskSetAsync(array{cluster?: string, service?: string, taskSet?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deregisterContainerInstance(array $args = [])
 * @phpstan-method \Aws\Result deregisterContainerInstance(array{cluster?: string, containerInstance?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterContainerInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterContainerInstanceAsync(array{cluster?: string, containerInstance?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deregisterTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result deregisterTaskDefinition(array{taskDefinition?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterTaskDefinitionAsync(array{taskDefinition?: string, ...} $args = [])
 * @method \Aws\Result describeCapacityProviders(array $args = [])
 * @phpstan-method \Aws\Result describeCapacityProviders(array{
 *     capacityProviders?: list<string>,
 *     cluster?: string,
 *     include?: list<'TAGS'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCapacityProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCapacityProvidersAsync(array{
 *     capacityProviders?: list<string>,
 *     cluster?: string,
 *     include?: list<'TAGS'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeClusters(array $args = [])
 * @phpstan-method \Aws\Result describeClusters(array{
 *     clusters?: list<string>,
 *     include?: list<'ATTACHMENTS'|'CONFIGURATIONS'|'SETTINGS'|'STATISTICS'|'TAGS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClustersAsync(array{
 *     clusters?: list<string>,
 *     include?: list<'ATTACHMENTS'|'CONFIGURATIONS'|'SETTINGS'|'STATISTICS'|'TAGS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeContainerInstances(array $args = [])
 * @phpstan-method \Aws\Result describeContainerInstances(array{
 *     cluster?: string,
 *     containerInstances?: list<string>,
 *     include?: list<'CONTAINER_INSTANCE_HEALTH'|'TAGS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContainerInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContainerInstancesAsync(array{
 *     cluster?: string,
 *     containerInstances?: list<string>,
 *     include?: list<'CONTAINER_INSTANCE_HEALTH'|'TAGS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDaemon(array $args = [])
 * @phpstan-method \Aws\Result describeDaemon(array{daemonArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDaemonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDaemonAsync(array{daemonArn?: string, ...} $args = [])
 * @method \Aws\Result describeDaemonDeployments(array $args = [])
 * @phpstan-method \Aws\Result describeDaemonDeployments(array{daemonDeploymentArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDaemonDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDaemonDeploymentsAsync(array{daemonDeploymentArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeDaemonRevisions(array $args = [])
 * @phpstan-method \Aws\Result describeDaemonRevisions(array{daemonRevisionArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDaemonRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDaemonRevisionsAsync(array{daemonRevisionArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeDaemonTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeDaemonTaskDefinition(array{daemonTaskDefinition?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDaemonTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDaemonTaskDefinitionAsync(array{daemonTaskDefinition?: string, ...} $args = [])
 * @method \Aws\Result describeExpressGatewayService(array $args = [])
 * @phpstan-method \Aws\Result describeExpressGatewayService(array{serviceArn?: string, include?: list<'TAGS'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExpressGatewayServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExpressGatewayServiceAsync(array{serviceArn?: string, include?: list<'TAGS'>, ...} $args = [])
 * @method \Aws\Result describeServiceDeployments(array $args = [])
 * @phpstan-method \Aws\Result describeServiceDeployments(array{serviceDeploymentArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceDeploymentsAsync(array{serviceDeploymentArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeServiceRevisions(array $args = [])
 * @phpstan-method \Aws\Result describeServiceRevisions(array{serviceRevisionArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceRevisionsAsync(array{serviceRevisionArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeServices(array $args = [])
 * @phpstan-method \Aws\Result describeServices(array{cluster?: string, services?: list<string>, include?: list<'TAGS'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServicesAsync(array{cluster?: string, services?: list<string>, include?: list<'TAGS'>, ...} $args = [])
 * @method \Aws\Result describeTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeTaskDefinition(array{taskDefinition?: string, include?: list<'TAGS'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTaskDefinitionAsync(array{taskDefinition?: string, include?: list<'TAGS'>, ...} $args = [])
 * @method \Aws\Result describeTaskSets(array $args = [])
 * @phpstan-method \Aws\Result describeTaskSets(array{cluster?: string, service?: string, taskSets?: list<string>, include?: list<'TAGS'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTaskSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTaskSetsAsync(array{cluster?: string, service?: string, taskSets?: list<string>, include?: list<'TAGS'>, ...} $args = [])
 * @method \Aws\Result describeTasks(array $args = [])
 * @phpstan-method \Aws\Result describeTasks(array{cluster?: string, tasks?: list<string>, include?: list<'TAGS'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTasksAsync(array{cluster?: string, tasks?: list<string>, include?: list<'TAGS'>, ...} $args = [])
 * @method \Aws\Result discoverPollEndpoint(array $args = [])
 * @phpstan-method \Aws\Result discoverPollEndpoint(array{containerInstance?: string, cluster?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise discoverPollEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise discoverPollEndpointAsync(array{containerInstance?: string, cluster?: string, ...} $args = [])
 * @method \Aws\Result executeCommand(array $args = [])
 * @phpstan-method \Aws\Result executeCommand(array{cluster?: string, container?: string, command?: string, interactive?: bool, task?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeCommandAsync(array{cluster?: string, container?: string, command?: string, interactive?: bool, task?: string, ...} $args = [])
 * @method \Aws\Result getTaskProtection(array $args = [])
 * @phpstan-method \Aws\Result getTaskProtection(array{cluster?: string, tasks?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTaskProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTaskProtectionAsync(array{cluster?: string, tasks?: list<string>, ...} $args = [])
 * @method \Aws\Result listAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result listAccountSettings(array{
 *     name?: 'awsvpcTrunking'|'containerInsights'|'containerInstanceLongArnFormat'|'defaultLogDriverMode'|'fargateEventWindows'|'fargateFIPSMode'|'fargateTaskRetirementWaitPeriod'|'guardDutyActivate'|'serviceLongArnFormat'|'tagResourceAuthorization'|'taskLongArnFormat',
 *     value?: string,
 *     principalArn?: string,
 *     effectiveSettings?: bool,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountSettingsAsync(array{
 *     name?: 'awsvpcTrunking'|'containerInsights'|'containerInstanceLongArnFormat'|'defaultLogDriverMode'|'fargateEventWindows'|'fargateFIPSMode'|'fargateTaskRetirementWaitPeriod'|'guardDutyActivate'|'serviceLongArnFormat'|'tagResourceAuthorization'|'taskLongArnFormat',
 *     value?: string,
 *     principalArn?: string,
 *     effectiveSettings?: bool,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAttributes(array $args = [])
 * @phpstan-method \Aws\Result listAttributes(array{
 *     cluster?: string,
 *     targetType?: 'container-instance',
 *     attributeName?: string,
 *     attributeValue?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttributesAsync(array{
 *     cluster?: string,
 *     targetType?: 'container-instance',
 *     attributeName?: string,
 *     attributeValue?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listContainerInstances(array $args = [])
 * @phpstan-method \Aws\Result listContainerInstances(array{
 *     cluster?: string,
 *     filter?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     status?: 'ACTIVE'|'DEREGISTERING'|'DRAINING'|'REGISTERING'|'REGISTRATION_FAILED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContainerInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContainerInstancesAsync(array{
 *     cluster?: string,
 *     filter?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     status?: 'ACTIVE'|'DEREGISTERING'|'DRAINING'|'REGISTERING'|'REGISTRATION_FAILED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDaemonDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDaemonDeployments(array{
 *     daemonArn?: string,
 *     status?: list<'IN_PROGRESS'|'PENDING'|'ROLLBACK_FAILED'|'ROLLBACK_IN_PROGRESS'|'ROLLBACK_SUCCESSFUL'|'STOPPED'|'STOP_REQUESTED'|'SUCCESSFUL'>,
 *     createdAt?: array{before?: int|string|\DateTimeInterface, after?: int|string|\DateTimeInterface, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDaemonDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDaemonDeploymentsAsync(array{
 *     daemonArn?: string,
 *     status?: list<'IN_PROGRESS'|'PENDING'|'ROLLBACK_FAILED'|'ROLLBACK_IN_PROGRESS'|'ROLLBACK_SUCCESSFUL'|'STOPPED'|'STOP_REQUESTED'|'SUCCESSFUL'>,
 *     createdAt?: array{before?: int|string|\DateTimeInterface, after?: int|string|\DateTimeInterface, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDaemonTaskDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listDaemonTaskDefinitions(array{
 *     familyPrefix?: string,
 *     family?: string,
 *     revision?: 'LAST_REGISTERED',
 *     status?: 'ACTIVE'|'ALL'|'DELETE_IN_PROGRESS',
 *     sort?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDaemonTaskDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDaemonTaskDefinitionsAsync(array{
 *     familyPrefix?: string,
 *     family?: string,
 *     revision?: 'LAST_REGISTERED',
 *     status?: 'ACTIVE'|'ALL'|'DELETE_IN_PROGRESS',
 *     sort?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDaemons(array $args = [])
 * @phpstan-method \Aws\Result listDaemons(array{clusterArn?: string, capacityProviderArns?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDaemonsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDaemonsAsync(array{clusterArn?: string, capacityProviderArns?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceDeployments(array $args = [])
 * @phpstan-method \Aws\Result listServiceDeployments(array{
 *     service?: string,
 *     cluster?: string,
 *     status?: list<'IN_PROGRESS'|'PENDING'|'ROLLBACK_FAILED'|'ROLLBACK_IN_PROGRESS'|'ROLLBACK_REQUESTED'|'ROLLBACK_SUCCESSFUL'|'STOPPED'|'STOP_REQUESTED'|'SUCCESSFUL'>,
 *     createdAt?: array{before?: int|string|\DateTimeInterface, after?: int|string|\DateTimeInterface, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceDeploymentsAsync(array{
 *     service?: string,
 *     cluster?: string,
 *     status?: list<'IN_PROGRESS'|'PENDING'|'ROLLBACK_FAILED'|'ROLLBACK_IN_PROGRESS'|'ROLLBACK_REQUESTED'|'ROLLBACK_SUCCESSFUL'|'STOPPED'|'STOP_REQUESTED'|'SUCCESSFUL'>,
 *     createdAt?: array{before?: int|string|\DateTimeInterface, after?: int|string|\DateTimeInterface, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{
 *     cluster?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     schedulingStrategy?: 'DAEMON'|'REPLICA',
 *     resourceManagementType?: 'CUSTOMER'|'ECS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{
 *     cluster?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     schedulingStrategy?: 'DAEMON'|'REPLICA',
 *     resourceManagementType?: 'CUSTOMER'|'ECS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServicesByNamespace(array $args = [])
 * @phpstan-method \Aws\Result listServicesByNamespace(array{namespace?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesByNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesByNamespaceAsync(array{namespace?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTaskDefinitionFamilies(array $args = [])
 * @phpstan-method \Aws\Result listTaskDefinitionFamilies(array{familyPrefix?: string, status?: 'ACTIVE'|'ALL'|'INACTIVE', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTaskDefinitionFamiliesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTaskDefinitionFamiliesAsync(array{familyPrefix?: string, status?: 'ACTIVE'|'ALL'|'INACTIVE', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTaskDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listTaskDefinitions(array{
 *     familyPrefix?: string,
 *     status?: 'ACTIVE'|'DELETE_IN_PROGRESS'|'INACTIVE',
 *     sort?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTaskDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTaskDefinitionsAsync(array{
 *     familyPrefix?: string,
 *     status?: 'ACTIVE'|'DELETE_IN_PROGRESS'|'INACTIVE',
 *     sort?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTasks(array $args = [])
 * @phpstan-method \Aws\Result listTasks(array{
 *     cluster?: string,
 *     containerInstance?: string,
 *     family?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     startedBy?: string,
 *     serviceName?: string,
 *     desiredStatus?: 'PENDING'|'RUNNING'|'STOPPED',
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     daemonName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTasksAsync(array{
 *     cluster?: string,
 *     containerInstance?: string,
 *     family?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     startedBy?: string,
 *     serviceName?: string,
 *     desiredStatus?: 'PENDING'|'RUNNING'|'STOPPED',
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     daemonName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAccountSetting(array $args = [])
 * @phpstan-method \Aws\Result putAccountSetting(array{
 *     name?: 'awsvpcTrunking'|'containerInsights'|'containerInstanceLongArnFormat'|'defaultLogDriverMode'|'fargateEventWindows'|'fargateFIPSMode'|'fargateTaskRetirementWaitPeriod'|'guardDutyActivate'|'serviceLongArnFormat'|'tagResourceAuthorization'|'taskLongArnFormat',
 *     value?: string,
 *     principalArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountSettingAsync(array{
 *     name?: 'awsvpcTrunking'|'containerInsights'|'containerInstanceLongArnFormat'|'defaultLogDriverMode'|'fargateEventWindows'|'fargateFIPSMode'|'fargateTaskRetirementWaitPeriod'|'guardDutyActivate'|'serviceLongArnFormat'|'tagResourceAuthorization'|'taskLongArnFormat',
 *     value?: string,
 *     principalArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAccountSettingDefault(array $args = [])
 * @phpstan-method \Aws\Result putAccountSettingDefault(array{
 *     name?: 'awsvpcTrunking'|'containerInsights'|'containerInstanceLongArnFormat'|'defaultLogDriverMode'|'fargateEventWindows'|'fargateFIPSMode'|'fargateTaskRetirementWaitPeriod'|'guardDutyActivate'|'serviceLongArnFormat'|'tagResourceAuthorization'|'taskLongArnFormat',
 *     value?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountSettingDefaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountSettingDefaultAsync(array{
 *     name?: 'awsvpcTrunking'|'containerInsights'|'containerInstanceLongArnFormat'|'defaultLogDriverMode'|'fargateEventWindows'|'fargateFIPSMode'|'fargateTaskRetirementWaitPeriod'|'guardDutyActivate'|'serviceLongArnFormat'|'tagResourceAuthorization'|'taskLongArnFormat',
 *     value?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAttributes(array $args = [])
 * @phpstan-method \Aws\Result putAttributes(array{
 *     cluster?: string,
 *     attributes?: list<array{name?: string, value?: string, targetType?: 'container-instance', targetId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAttributesAsync(array{
 *     cluster?: string,
 *     attributes?: list<array{name?: string, value?: string, targetType?: 'container-instance', targetId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putClusterCapacityProviders(array $args = [])
 * @phpstan-method \Aws\Result putClusterCapacityProviders(array{
 *     cluster?: string,
 *     capacityProviders?: list<string>,
 *     defaultCapacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putClusterCapacityProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putClusterCapacityProvidersAsync(array{
 *     cluster?: string,
 *     capacityProviders?: list<string>,
 *     defaultCapacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerContainerInstance(array $args = [])
 * @phpstan-method \Aws\Result registerContainerInstance(array{
 *     cluster?: string,
 *     instanceIdentityDocument?: string,
 *     instanceIdentityDocumentSignature?: string,
 *     totalResources?: list<array{
 *         name?: string,
 *         type?: string,
 *         doubleValue?: float,
 *         longValue?: int,
 *         integerValue?: int,
 *         stringSetValue?: list<string>,
 *         ...,
 *     }>,
 *     versionInfo?: array{agentVersion?: string, agentHash?: string, dockerVersion?: string, ...},
 *     containerInstanceArn?: string,
 *     attributes?: list<array{name?: string, value?: string, targetType?: 'container-instance', targetId?: string, ...}>,
 *     platformDevices?: list<array{id?: string, type?: 'GPU'|'NEURON_DEVICE', ...}>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerContainerInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerContainerInstanceAsync(array{
 *     cluster?: string,
 *     instanceIdentityDocument?: string,
 *     instanceIdentityDocumentSignature?: string,
 *     totalResources?: list<array{
 *         name?: string,
 *         type?: string,
 *         doubleValue?: float,
 *         longValue?: int,
 *         integerValue?: int,
 *         stringSetValue?: list<string>,
 *         ...,
 *     }>,
 *     versionInfo?: array{agentVersion?: string, agentHash?: string, dockerVersion?: string, ...},
 *     containerInstanceArn?: string,
 *     attributes?: list<array{name?: string, value?: string, targetType?: 'container-instance', targetId?: string, ...}>,
 *     platformDevices?: list<array{id?: string, type?: 'GPU'|'NEURON_DEVICE', ...}>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerDaemonTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result registerDaemonTaskDefinition(array{
 *     family?: string,
 *     taskRoleArn?: string,
 *     executionRoleArn?: string,
 *     containerDefinitions?: list<array{
 *         name?: string,
 *         image?: string,
 *         memory?: int,
 *         memoryReservation?: int,
 *         repositoryCredentials?: array,
 *         healthCheck?: array,
 *         cpu?: int,
 *         essential?: bool,
 *         entryPoint?: list<string>,
 *         command?: list<string>,
 *         workingDirectory?: string,
 *         environmentFiles?: list<array>,
 *         environment?: list<array>,
 *         secrets?: list<array>,
 *         readonlyRootFilesystem?: bool,
 *         mountPoints?: list<array>,
 *         logConfiguration?: array,
 *         firelensConfiguration?: array,
 *         privileged?: bool,
 *         user?: string,
 *         ulimits?: list<array>,
 *         linuxParameters?: array,
 *         dependsOn?: list<array>,
 *         startTimeout?: int,
 *         stopTimeout?: int,
 *         systemControls?: list<array>,
 *         interactive?: bool,
 *         pseudoTerminal?: bool,
 *         restartPolicy?: array,
 *         ...,
 *     }>,
 *     cpu?: string,
 *     memory?: string,
 *     volumes?: list<array{name?: string, host?: array, ...}>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     pidMode?: 'none'|'shared',
 *     ipcMode?: 'none'|'shared',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDaemonTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDaemonTaskDefinitionAsync(array{
 *     family?: string,
 *     taskRoleArn?: string,
 *     executionRoleArn?: string,
 *     containerDefinitions?: list<array{
 *         name?: string,
 *         image?: string,
 *         memory?: int,
 *         memoryReservation?: int,
 *         repositoryCredentials?: array,
 *         healthCheck?: array,
 *         cpu?: int,
 *         essential?: bool,
 *         entryPoint?: list<string>,
 *         command?: list<string>,
 *         workingDirectory?: string,
 *         environmentFiles?: list<array>,
 *         environment?: list<array>,
 *         secrets?: list<array>,
 *         readonlyRootFilesystem?: bool,
 *         mountPoints?: list<array>,
 *         logConfiguration?: array,
 *         firelensConfiguration?: array,
 *         privileged?: bool,
 *         user?: string,
 *         ulimits?: list<array>,
 *         linuxParameters?: array,
 *         dependsOn?: list<array>,
 *         startTimeout?: int,
 *         stopTimeout?: int,
 *         systemControls?: list<array>,
 *         interactive?: bool,
 *         pseudoTerminal?: bool,
 *         restartPolicy?: array,
 *         ...,
 *     }>,
 *     cpu?: string,
 *     memory?: string,
 *     volumes?: list<array{name?: string, host?: array, ...}>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     pidMode?: 'none'|'shared',
 *     ipcMode?: 'none'|'shared',
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result registerTaskDefinition(array{
 *     family?: string,
 *     taskRoleArn?: string,
 *     executionRoleArn?: string,
 *     networkMode?: 'awsvpc'|'bridge'|'host'|'none',
 *     containerDefinitions?: list<array{
 *         name?: string,
 *         image?: string,
 *         repositoryCredentials?: array,
 *         cpu?: int,
 *         memory?: int,
 *         memoryReservation?: int,
 *         links?: list<string>,
 *         portMappings?: list<array>,
 *         essential?: bool,
 *         restartPolicy?: array,
 *         entryPoint?: list<string>,
 *         command?: list<string>,
 *         environment?: list<array>,
 *         environmentFiles?: list<array>,
 *         mountPoints?: list<array>,
 *         volumesFrom?: list<array>,
 *         linuxParameters?: array,
 *         secrets?: list<array>,
 *         dependsOn?: list<array>,
 *         startTimeout?: int,
 *         stopTimeout?: int,
 *         versionConsistency?: 'disabled'|'enabled',
 *         hostname?: string,
 *         user?: string,
 *         workingDirectory?: string,
 *         disableNetworking?: bool,
 *         privileged?: bool,
 *         readonlyRootFilesystem?: bool,
 *         dnsServers?: list<string>,
 *         dnsSearchDomains?: list<string>,
 *         extraHosts?: list<array>,
 *         dockerSecurityOptions?: list<string>,
 *         interactive?: bool,
 *         pseudoTerminal?: bool,
 *         dockerLabels?: array<string, string>,
 *         ulimits?: list<array>,
 *         logConfiguration?: array,
 *         healthCheck?: array,
 *         systemControls?: list<array>,
 *         resourceRequirements?: list<array>,
 *         firelensConfiguration?: array,
 *         credentialSpecs?: list<string>,
 *         ...,
 *     }>,
 *     volumes?: list<array{
 *         name?: string,
 *         host?: array,
 *         dockerVolumeConfiguration?: array,
 *         efsVolumeConfiguration?: array,
 *         s3filesVolumeConfiguration?: array,
 *         fsxWindowsFileServerVolumeConfiguration?: array,
 *         configuredAtLaunch?: bool,
 *         ...,
 *     }>,
 *     placementConstraints?: list<array{type?: 'memberOf', expression?: string, ...}>,
 *     requiresCompatibilities?: list<'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES'>,
 *     cpu?: string,
 *     memory?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     pidMode?: 'host'|'task',
 *     ipcMode?: 'host'|'none'|'task',
 *     proxyConfiguration?: array{type?: 'APPMESH', containerName?: string, properties?: list<array>, ...},
 *     inferenceAccelerators?: list<array{deviceName?: string, deviceType?: string, ...}>,
 *     ephemeralStorage?: array{sizeInGiB?: int, ...},
 *     runtimePlatform?: array{
 *         cpuArchitecture?: 'ARM64'|'X86_64',
 *         operatingSystemFamily?: 'LINUX'|'WINDOWS_SERVER_2004_CORE'|'WINDOWS_SERVER_2016_FULL'|'WINDOWS_SERVER_2019_CORE'|'WINDOWS_SERVER_2019_FULL'|'WINDOWS_SERVER_2022_CORE'|'WINDOWS_SERVER_2022_FULL'|'WINDOWS_SERVER_2025_CORE'|'WINDOWS_SERVER_2025_FULL'|'WINDOWS_SERVER_20H2_CORE',
 *         ...,
 *     },
 *     enableFaultInjection?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerTaskDefinitionAsync(array{
 *     family?: string,
 *     taskRoleArn?: string,
 *     executionRoleArn?: string,
 *     networkMode?: 'awsvpc'|'bridge'|'host'|'none',
 *     containerDefinitions?: list<array{
 *         name?: string,
 *         image?: string,
 *         repositoryCredentials?: array,
 *         cpu?: int,
 *         memory?: int,
 *         memoryReservation?: int,
 *         links?: list<string>,
 *         portMappings?: list<array>,
 *         essential?: bool,
 *         restartPolicy?: array,
 *         entryPoint?: list<string>,
 *         command?: list<string>,
 *         environment?: list<array>,
 *         environmentFiles?: list<array>,
 *         mountPoints?: list<array>,
 *         volumesFrom?: list<array>,
 *         linuxParameters?: array,
 *         secrets?: list<array>,
 *         dependsOn?: list<array>,
 *         startTimeout?: int,
 *         stopTimeout?: int,
 *         versionConsistency?: 'disabled'|'enabled',
 *         hostname?: string,
 *         user?: string,
 *         workingDirectory?: string,
 *         disableNetworking?: bool,
 *         privileged?: bool,
 *         readonlyRootFilesystem?: bool,
 *         dnsServers?: list<string>,
 *         dnsSearchDomains?: list<string>,
 *         extraHosts?: list<array>,
 *         dockerSecurityOptions?: list<string>,
 *         interactive?: bool,
 *         pseudoTerminal?: bool,
 *         dockerLabels?: array<string, string>,
 *         ulimits?: list<array>,
 *         logConfiguration?: array,
 *         healthCheck?: array,
 *         systemControls?: list<array>,
 *         resourceRequirements?: list<array>,
 *         firelensConfiguration?: array,
 *         credentialSpecs?: list<string>,
 *         ...,
 *     }>,
 *     volumes?: list<array{
 *         name?: string,
 *         host?: array,
 *         dockerVolumeConfiguration?: array,
 *         efsVolumeConfiguration?: array,
 *         s3filesVolumeConfiguration?: array,
 *         fsxWindowsFileServerVolumeConfiguration?: array,
 *         configuredAtLaunch?: bool,
 *         ...,
 *     }>,
 *     placementConstraints?: list<array{type?: 'memberOf', expression?: string, ...}>,
 *     requiresCompatibilities?: list<'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES'>,
 *     cpu?: string,
 *     memory?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     pidMode?: 'host'|'task',
 *     ipcMode?: 'host'|'none'|'task',
 *     proxyConfiguration?: array{type?: 'APPMESH', containerName?: string, properties?: list<array>, ...},
 *     inferenceAccelerators?: list<array{deviceName?: string, deviceType?: string, ...}>,
 *     ephemeralStorage?: array{sizeInGiB?: int, ...},
 *     runtimePlatform?: array{
 *         cpuArchitecture?: 'ARM64'|'X86_64',
 *         operatingSystemFamily?: 'LINUX'|'WINDOWS_SERVER_2004_CORE'|'WINDOWS_SERVER_2016_FULL'|'WINDOWS_SERVER_2019_CORE'|'WINDOWS_SERVER_2019_FULL'|'WINDOWS_SERVER_2022_CORE'|'WINDOWS_SERVER_2022_FULL'|'WINDOWS_SERVER_2025_CORE'|'WINDOWS_SERVER_2025_FULL'|'WINDOWS_SERVER_20H2_CORE',
 *         ...,
 *     },
 *     enableFaultInjection?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result runTask(array $args = [])
 * @phpstan-method \Aws\Result runTask(array{
 *     capacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     cluster?: string,
 *     count?: int,
 *     enableECSManagedTags?: bool,
 *     enableExecuteCommand?: bool,
 *     group?: string,
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     overrides?: array{
 *         containerOverrides?: list<array>,
 *         cpu?: string,
 *         inferenceAcceleratorOverrides?: list<array>,
 *         executionRoleArn?: string,
 *         memory?: string,
 *         taskRoleArn?: string,
 *         ephemeralStorage?: array{sizeInGiB?: int, ...},
 *         ...,
 *     },
 *     placementConstraints?: list<array{type?: 'distinctInstance'|'memberOf', expression?: string, ...}>,
 *     placementStrategy?: list<array{type?: 'binpack'|'random'|'spread', field?: string, ...}>,
 *     platformVersion?: string,
 *     propagateTags?: 'NONE'|'SERVICE'|'TASK_DEFINITION',
 *     referenceId?: string,
 *     startedBy?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     taskDefinition?: string,
 *     clientToken?: string,
 *     volumeConfigurations?: list<array{name?: string, managedEBSVolume?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise runTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise runTaskAsync(array{
 *     capacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     cluster?: string,
 *     count?: int,
 *     enableECSManagedTags?: bool,
 *     enableExecuteCommand?: bool,
 *     group?: string,
 *     launchType?: 'EC2'|'EXTERNAL'|'FARGATE'|'MANAGED_INSTANCES',
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     overrides?: array{
 *         containerOverrides?: list<array>,
 *         cpu?: string,
 *         inferenceAcceleratorOverrides?: list<array>,
 *         executionRoleArn?: string,
 *         memory?: string,
 *         taskRoleArn?: string,
 *         ephemeralStorage?: array{sizeInGiB?: int, ...},
 *         ...,
 *     },
 *     placementConstraints?: list<array{type?: 'distinctInstance'|'memberOf', expression?: string, ...}>,
 *     placementStrategy?: list<array{type?: 'binpack'|'random'|'spread', field?: string, ...}>,
 *     platformVersion?: string,
 *     propagateTags?: 'NONE'|'SERVICE'|'TASK_DEFINITION',
 *     referenceId?: string,
 *     startedBy?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     taskDefinition?: string,
 *     clientToken?: string,
 *     volumeConfigurations?: list<array{name?: string, managedEBSVolume?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTask(array $args = [])
 * @phpstan-method \Aws\Result startTask(array{
 *     cluster?: string,
 *     containerInstances?: list<string>,
 *     enableECSManagedTags?: bool,
 *     enableExecuteCommand?: bool,
 *     group?: string,
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     overrides?: array{
 *         containerOverrides?: list<array>,
 *         cpu?: string,
 *         inferenceAcceleratorOverrides?: list<array>,
 *         executionRoleArn?: string,
 *         memory?: string,
 *         taskRoleArn?: string,
 *         ephemeralStorage?: array{sizeInGiB?: int, ...},
 *         ...,
 *     },
 *     propagateTags?: 'NONE'|'SERVICE'|'TASK_DEFINITION',
 *     referenceId?: string,
 *     startedBy?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     taskDefinition?: string,
 *     volumeConfigurations?: list<array{name?: string, managedEBSVolume?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTaskAsync(array{
 *     cluster?: string,
 *     containerInstances?: list<string>,
 *     enableECSManagedTags?: bool,
 *     enableExecuteCommand?: bool,
 *     group?: string,
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     overrides?: array{
 *         containerOverrides?: list<array>,
 *         cpu?: string,
 *         inferenceAcceleratorOverrides?: list<array>,
 *         executionRoleArn?: string,
 *         memory?: string,
 *         taskRoleArn?: string,
 *         ephemeralStorage?: array{sizeInGiB?: int, ...},
 *         ...,
 *     },
 *     propagateTags?: 'NONE'|'SERVICE'|'TASK_DEFINITION',
 *     referenceId?: string,
 *     startedBy?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     taskDefinition?: string,
 *     volumeConfigurations?: list<array{name?: string, managedEBSVolume?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopServiceDeployment(array $args = [])
 * @phpstan-method \Aws\Result stopServiceDeployment(array{serviceDeploymentArn?: string, stopType?: 'ABORT'|'ROLLBACK', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopServiceDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopServiceDeploymentAsync(array{serviceDeploymentArn?: string, stopType?: 'ABORT'|'ROLLBACK', ...} $args = [])
 * @method \Aws\Result stopTask(array $args = [])
 * @phpstan-method \Aws\Result stopTask(array{cluster?: string, task?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTaskAsync(array{cluster?: string, task?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result submitAttachmentStateChanges(array $args = [])
 * @phpstan-method \Aws\Result submitAttachmentStateChanges(array{cluster?: string, attachments?: list<array{attachmentArn?: string, status?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise submitAttachmentStateChangesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitAttachmentStateChangesAsync(array{cluster?: string, attachments?: list<array{attachmentArn?: string, status?: string, ...}>, ...} $args = [])
 * @method \Aws\Result submitContainerStateChange(array $args = [])
 * @phpstan-method \Aws\Result submitContainerStateChange(array{
 *     cluster?: string,
 *     task?: string,
 *     containerName?: string,
 *     runtimeId?: string,
 *     status?: string,
 *     exitCode?: int,
 *     reason?: string,
 *     networkBindings?: list<array{
 *         bindIP?: string,
 *         containerPort?: int,
 *         hostPort?: int,
 *         protocol?: 'tcp'|'udp',
 *         containerPortRange?: string,
 *         hostPortRange?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitContainerStateChangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitContainerStateChangeAsync(array{
 *     cluster?: string,
 *     task?: string,
 *     containerName?: string,
 *     runtimeId?: string,
 *     status?: string,
 *     exitCode?: int,
 *     reason?: string,
 *     networkBindings?: list<array{
 *         bindIP?: string,
 *         containerPort?: int,
 *         hostPort?: int,
 *         protocol?: 'tcp'|'udp',
 *         containerPortRange?: string,
 *         hostPortRange?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result submitTaskStateChange(array $args = [])
 * @phpstan-method \Aws\Result submitTaskStateChange(array{
 *     cluster?: string,
 *     task?: string,
 *     status?: string,
 *     reason?: string,
 *     containers?: list<array{
 *         containerName?: string,
 *         imageDigest?: string,
 *         runtimeId?: string,
 *         exitCode?: int,
 *         networkBindings?: list<array>,
 *         reason?: string,
 *         status?: string,
 *         ...,
 *     }>,
 *     attachments?: list<array{attachmentArn?: string, status?: string, ...}>,
 *     managedAgents?: list<array{containerName?: string, managedAgentName?: 'ExecuteCommandAgent', status?: string, reason?: string, ...}>,
 *     pullStartedAt?: int|string|\DateTimeInterface,
 *     pullStoppedAt?: int|string|\DateTimeInterface,
 *     executionStoppedAt?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitTaskStateChangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitTaskStateChangeAsync(array{
 *     cluster?: string,
 *     task?: string,
 *     status?: string,
 *     reason?: string,
 *     containers?: list<array{
 *         containerName?: string,
 *         imageDigest?: string,
 *         runtimeId?: string,
 *         exitCode?: int,
 *         networkBindings?: list<array>,
 *         reason?: string,
 *         status?: string,
 *         ...,
 *     }>,
 *     attachments?: list<array{attachmentArn?: string, status?: string, ...}>,
 *     managedAgents?: list<array{containerName?: string, managedAgentName?: 'ExecuteCommandAgent', status?: string, reason?: string, ...}>,
 *     pullStartedAt?: int|string|\DateTimeInterface,
 *     pullStoppedAt?: int|string|\DateTimeInterface,
 *     executionStoppedAt?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCapacityProvider(array $args = [])
 * @phpstan-method \Aws\Result updateCapacityProvider(array{
 *     name?: string,
 *     cluster?: string,
 *     autoScalingGroupProvider?: array{
 *         managedScaling?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             targetCapacity?: int,
 *             minimumScalingStepSize?: int,
 *             maximumScalingStepSize?: int,
 *             instanceWarmupPeriod?: int,
 *             ...,
 *         },
 *         managedTerminationProtection?: 'DISABLED'|'ENABLED',
 *         managedDraining?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     managedInstancesProvider?: array{
 *         infrastructureRoleArn?: string,
 *         instanceLaunchTemplate?: array{
 *             ec2InstanceProfileArn?: string,
 *             networkConfiguration?: array,
 *             storageConfiguration?: array,
 *             instanceMetadataTagsPropagation?: bool,
 *             localStorageConfiguration?: array,
 *             monitoring?: 'BASIC'|'DETAILED',
 *             instanceRequirements?: array,
 *             capacityReservations?: array,
 *             ...,
 *         },
 *         propagateTags?: 'CAPACITY_PROVIDER'|'NONE',
 *         infrastructureOptimization?: array{scaleInAfter?: int, ...},
 *         autoRepairConfiguration?: array{actionsStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCapacityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCapacityProviderAsync(array{
 *     name?: string,
 *     cluster?: string,
 *     autoScalingGroupProvider?: array{
 *         managedScaling?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             targetCapacity?: int,
 *             minimumScalingStepSize?: int,
 *             maximumScalingStepSize?: int,
 *             instanceWarmupPeriod?: int,
 *             ...,
 *         },
 *         managedTerminationProtection?: 'DISABLED'|'ENABLED',
 *         managedDraining?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     managedInstancesProvider?: array{
 *         infrastructureRoleArn?: string,
 *         instanceLaunchTemplate?: array{
 *             ec2InstanceProfileArn?: string,
 *             networkConfiguration?: array,
 *             storageConfiguration?: array,
 *             instanceMetadataTagsPropagation?: bool,
 *             localStorageConfiguration?: array,
 *             monitoring?: 'BASIC'|'DETAILED',
 *             instanceRequirements?: array,
 *             capacityReservations?: array,
 *             ...,
 *         },
 *         propagateTags?: 'CAPACITY_PROVIDER'|'NONE',
 *         infrastructureOptimization?: array{scaleInAfter?: int, ...},
 *         autoRepairConfiguration?: array{actionsStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{
 *     cluster?: string,
 *     settings?: list<array{name?: 'containerInsights', value?: string, ...}>,
 *     configuration?: array{
 *         executeCommandConfiguration?: array{kmsKeyId?: string, logging?: 'DEFAULT'|'NONE'|'OVERRIDE', logConfiguration?: array, ...},
 *         managedStorageConfiguration?: array{kmsKeyId?: string, fargateEphemeralStorageKmsKeyId?: string, ...},
 *         ...,
 *     },
 *     serviceConnectDefaults?: array{namespace?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     cluster?: string,
 *     settings?: list<array{name?: 'containerInsights', value?: string, ...}>,
 *     configuration?: array{
 *         executeCommandConfiguration?: array{kmsKeyId?: string, logging?: 'DEFAULT'|'NONE'|'OVERRIDE', logConfiguration?: array, ...},
 *         managedStorageConfiguration?: array{kmsKeyId?: string, fargateEphemeralStorageKmsKeyId?: string, ...},
 *         ...,
 *     },
 *     serviceConnectDefaults?: array{namespace?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClusterSettings(array $args = [])
 * @phpstan-method \Aws\Result updateClusterSettings(array{cluster?: string, settings?: list<array{name?: 'containerInsights', value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterSettingsAsync(array{cluster?: string, settings?: list<array{name?: 'containerInsights', value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result updateContainerAgent(array $args = [])
 * @phpstan-method \Aws\Result updateContainerAgent(array{cluster?: string, containerInstance?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContainerAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContainerAgentAsync(array{cluster?: string, containerInstance?: string, ...} $args = [])
 * @method \Aws\Result updateContainerInstancesState(array $args = [])
 * @phpstan-method \Aws\Result updateContainerInstancesState(array{
 *     cluster?: string,
 *     containerInstances?: list<string>,
 *     status?: 'ACTIVE'|'DEREGISTERING'|'DRAINING'|'REGISTERING'|'REGISTRATION_FAILED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContainerInstancesStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContainerInstancesStateAsync(array{
 *     cluster?: string,
 *     containerInstances?: list<string>,
 *     status?: 'ACTIVE'|'DEREGISTERING'|'DRAINING'|'REGISTERING'|'REGISTRATION_FAILED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDaemon(array $args = [])
 * @phpstan-method \Aws\Result updateDaemon(array{
 *     daemonArn?: string,
 *     daemonTaskDefinitionArn?: string,
 *     capacityProviderArns?: list<string>,
 *     deploymentConfiguration?: array{
 *         drainPercent?: float,
 *         alarms?: array{alarmNames?: list<string>, enable?: bool, ...},
 *         bakeTimeInMinutes?: int,
 *         ...,
 *     },
 *     propagateTags?: 'DAEMON'|'NONE',
 *     enableECSManagedTags?: bool,
 *     enableExecuteCommand?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDaemonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDaemonAsync(array{
 *     daemonArn?: string,
 *     daemonTaskDefinitionArn?: string,
 *     capacityProviderArns?: list<string>,
 *     deploymentConfiguration?: array{
 *         drainPercent?: float,
 *         alarms?: array{alarmNames?: list<string>, enable?: bool, ...},
 *         bakeTimeInMinutes?: int,
 *         ...,
 *     },
 *     propagateTags?: 'DAEMON'|'NONE',
 *     enableECSManagedTags?: bool,
 *     enableExecuteCommand?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExpressGatewayService(array $args = [])
 * @phpstan-method \Aws\Result updateExpressGatewayService(array{
 *     serviceArn?: string,
 *     executionRoleArn?: string,
 *     healthCheckPath?: string,
 *     primaryContainer?: array{
 *         image?: string,
 *         containerPort?: int,
 *         awsLogsConfiguration?: array{logGroup?: string, logStreamPrefix?: string, ...},
 *         repositoryCredentials?: array{credentialsParameter?: string, ...},
 *         command?: list<string>,
 *         environment?: list<array>,
 *         secrets?: list<array>,
 *         ...,
 *     },
 *     taskRoleArn?: string,
 *     networkConfiguration?: array{securityGroups?: list<string>, subnets?: list<string>, ...},
 *     cpu?: string,
 *     memory?: string,
 *     scalingTarget?: array{
 *         minTaskCount?: int,
 *         maxTaskCount?: int,
 *         autoScalingMetric?: 'AVERAGE_CPU'|'AVERAGE_MEMORY'|'REQUEST_COUNT_PER_TARGET',
 *         autoScalingTargetValue?: int,
 *         ...,
 *     },
 *     taskDefinitionArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExpressGatewayServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExpressGatewayServiceAsync(array{
 *     serviceArn?: string,
 *     executionRoleArn?: string,
 *     healthCheckPath?: string,
 *     primaryContainer?: array{
 *         image?: string,
 *         containerPort?: int,
 *         awsLogsConfiguration?: array{logGroup?: string, logStreamPrefix?: string, ...},
 *         repositoryCredentials?: array{credentialsParameter?: string, ...},
 *         command?: list<string>,
 *         environment?: list<array>,
 *         secrets?: list<array>,
 *         ...,
 *     },
 *     taskRoleArn?: string,
 *     networkConfiguration?: array{securityGroups?: list<string>, subnets?: list<string>, ...},
 *     cpu?: string,
 *     memory?: string,
 *     scalingTarget?: array{
 *         minTaskCount?: int,
 *         maxTaskCount?: int,
 *         autoScalingMetric?: 'AVERAGE_CPU'|'AVERAGE_MEMORY'|'REQUEST_COUNT_PER_TARGET',
 *         autoScalingTargetValue?: int,
 *         ...,
 *     },
 *     taskDefinitionArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateService(array $args = [])
 * @phpstan-method \Aws\Result updateService(array{
 *     cluster?: string,
 *     service?: string,
 *     desiredCount?: int,
 *     taskDefinition?: string,
 *     capacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     deploymentConfiguration?: array{
 *         deploymentCircuitBreaker?: array{enable?: bool, rollback?: bool, resetOnHealthyTask?: bool, thresholdConfiguration?: array, ...},
 *         maximumPercent?: int,
 *         minimumHealthyPercent?: int,
 *         alarms?: array{alarmNames?: list<string>, rollback?: bool, enable?: bool, ...},
 *         strategy?: 'BLUE_GREEN'|'CANARY'|'LINEAR'|'ROLLING',
 *         bakeTimeInMinutes?: int,
 *         lifecycleHooks?: list<array>,
 *         linearConfiguration?: array{stepPercent?: float, stepBakeTimeInMinutes?: int, ...},
 *         canaryConfiguration?: array{canaryPercent?: float, canaryBakeTimeInMinutes?: int, ...},
 *         ...,
 *     },
 *     availabilityZoneRebalancing?: 'DISABLED'|'ENABLED',
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     placementConstraints?: list<array{type?: 'distinctInstance'|'memberOf', expression?: string, ...}>,
 *     placementStrategy?: list<array{type?: 'binpack'|'random'|'spread', field?: string, ...}>,
 *     platformVersion?: string,
 *     forceNewDeployment?: bool,
 *     healthCheckGracePeriodSeconds?: int,
 *     deploymentController?: array{type?: 'CODE_DEPLOY'|'ECS'|'EXTERNAL', ...},
 *     enableExecuteCommand?: bool,
 *     enableECSManagedTags?: bool,
 *     loadBalancers?: list<array{
 *         targetGroupArn?: string,
 *         loadBalancerName?: string,
 *         containerName?: string,
 *         containerPort?: int,
 *         advancedConfiguration?: array,
 *         ...,
 *     }>,
 *     propagateTags?: 'NONE'|'SERVICE'|'TASK_DEFINITION',
 *     serviceRegistries?: list<array{registryArn?: string, port?: int, containerName?: string, containerPort?: int, ...}>,
 *     serviceConnectConfiguration?: array{
 *         enabled?: bool,
 *         namespace?: string,
 *         services?: list<array>,
 *         logConfiguration?: array{
 *             logDriver?: 'awsfirelens'|'awslogs'|'fluentd'|'gelf'|'journald'|'json-file'|'splunk'|'syslog',
 *             options?: array<string, string>,
 *             secretOptions?: list<array>,
 *             ...,
 *         },
 *         accessLogConfiguration?: array{format?: 'JSON'|'TEXT', includeQueryParameters?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     volumeConfigurations?: list<array{name?: string, managedEBSVolume?: array, ...}>,
 *     vpcLatticeConfigurations?: list<array{roleArn?: string, targetGroupArn?: string, portName?: string, ...}>,
 *     monitoring?: array{metricConfigurations?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceAsync(array{
 *     cluster?: string,
 *     service?: string,
 *     desiredCount?: int,
 *     taskDefinition?: string,
 *     capacityProviderStrategy?: list<array{capacityProvider?: string, weight?: int, base?: int, ...}>,
 *     deploymentConfiguration?: array{
 *         deploymentCircuitBreaker?: array{enable?: bool, rollback?: bool, resetOnHealthyTask?: bool, thresholdConfiguration?: array, ...},
 *         maximumPercent?: int,
 *         minimumHealthyPercent?: int,
 *         alarms?: array{alarmNames?: list<string>, rollback?: bool, enable?: bool, ...},
 *         strategy?: 'BLUE_GREEN'|'CANARY'|'LINEAR'|'ROLLING',
 *         bakeTimeInMinutes?: int,
 *         lifecycleHooks?: list<array>,
 *         linearConfiguration?: array{stepPercent?: float, stepBakeTimeInMinutes?: int, ...},
 *         canaryConfiguration?: array{canaryPercent?: float, canaryBakeTimeInMinutes?: int, ...},
 *         ...,
 *     },
 *     availabilityZoneRebalancing?: 'DISABLED'|'ENABLED',
 *     networkConfiguration?: array{
 *         awsvpcConfiguration?: array{subnets?: list<string>, securityGroups?: list<string>, assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     placementConstraints?: list<array{type?: 'distinctInstance'|'memberOf', expression?: string, ...}>,
 *     placementStrategy?: list<array{type?: 'binpack'|'random'|'spread', field?: string, ...}>,
 *     platformVersion?: string,
 *     forceNewDeployment?: bool,
 *     healthCheckGracePeriodSeconds?: int,
 *     deploymentController?: array{type?: 'CODE_DEPLOY'|'ECS'|'EXTERNAL', ...},
 *     enableExecuteCommand?: bool,
 *     enableECSManagedTags?: bool,
 *     loadBalancers?: list<array{
 *         targetGroupArn?: string,
 *         loadBalancerName?: string,
 *         containerName?: string,
 *         containerPort?: int,
 *         advancedConfiguration?: array,
 *         ...,
 *     }>,
 *     propagateTags?: 'NONE'|'SERVICE'|'TASK_DEFINITION',
 *     serviceRegistries?: list<array{registryArn?: string, port?: int, containerName?: string, containerPort?: int, ...}>,
 *     serviceConnectConfiguration?: array{
 *         enabled?: bool,
 *         namespace?: string,
 *         services?: list<array>,
 *         logConfiguration?: array{
 *             logDriver?: 'awsfirelens'|'awslogs'|'fluentd'|'gelf'|'journald'|'json-file'|'splunk'|'syslog',
 *             options?: array<string, string>,
 *             secretOptions?: list<array>,
 *             ...,
 *         },
 *         accessLogConfiguration?: array{format?: 'JSON'|'TEXT', includeQueryParameters?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     volumeConfigurations?: list<array{name?: string, managedEBSVolume?: array, ...}>,
 *     vpcLatticeConfigurations?: list<array{roleArn?: string, targetGroupArn?: string, portName?: string, ...}>,
 *     monitoring?: array{metricConfigurations?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServicePrimaryTaskSet(array $args = [])
 * @phpstan-method \Aws\Result updateServicePrimaryTaskSet(array{cluster?: string, service?: string, primaryTaskSet?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServicePrimaryTaskSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServicePrimaryTaskSetAsync(array{cluster?: string, service?: string, primaryTaskSet?: string, ...} $args = [])
 * @method \Aws\Result updateTaskProtection(array $args = [])
 * @phpstan-method \Aws\Result updateTaskProtection(array{cluster?: string, tasks?: list<string>, protectionEnabled?: bool, expiresInMinutes?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTaskProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTaskProtectionAsync(array{cluster?: string, tasks?: list<string>, protectionEnabled?: bool, expiresInMinutes?: int, ...} $args = [])
 * @method \Aws\Result updateTaskSet(array $args = [])
 * @phpstan-method \Aws\Result updateTaskSet(array{
 *     cluster?: string,
 *     service?: string,
 *     taskSet?: string,
 *     scale?: array{value?: float, unit?: 'PERCENT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTaskSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTaskSetAsync(array{
 *     cluster?: string,
 *     service?: string,
 *     taskSet?: string,
 *     scale?: array{value?: float, unit?: 'PERCENT', ...},
 *     ...,
 * } $args = [])
 */
class EcsClient extends AwsClient {}
