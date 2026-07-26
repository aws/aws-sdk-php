<?php
namespace Aws\Batch;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Batch** service.
 * @method \Aws\Result cancelJob(array $args = [])
 * @phpstan-method \Aws\Result cancelJob(array{jobId?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobAsync(array{jobId?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result createComputeEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createComputeEnvironment(array{
 *     computeEnvironmentName?: string,
 *     type?: 'MANAGED'|'UNMANAGED',
 *     state?: 'DISABLED'|'ENABLED',
 *     unmanagedvCpus?: int,
 *     computeResources?: array{
 *         type?: 'EC2'|'FARGATE'|'FARGATE_SPOT'|'SPOT',
 *         allocationStrategy?: 'BEST_FIT'|'BEST_FIT_PROGRESSIVE'|'BEST_FIT_PROGRESSIVE_ORDERED'|'SPOT_CAPACITY_OPTIMIZED'|'SPOT_CAPACITY_OPTIMIZED_PRIORITIZED'|'SPOT_PRICE_CAPACITY_OPTIMIZED',
 *         minvCpus?: int,
 *         maxvCpus?: int,
 *         desiredvCpus?: int,
 *         instanceTypes?: list<string>,
 *         imageId?: string,
 *         subnets?: list<string>,
 *         securityGroupIds?: list<string>,
 *         ec2KeyPair?: string,
 *         instanceRole?: string,
 *         tags?: array<string, string>,
 *         placementGroup?: string,
 *         bidPercentage?: int,
 *         spotIamFleetRole?: string,
 *         launchTemplate?: array{
 *             launchTemplateId?: string,
 *             launchTemplateName?: string,
 *             version?: string,
 *             overrides?: list<array>,
 *             userdataType?: 'EKS_BOOTSTRAP_SH'|'EKS_NODEADM',
 *             ...,
 *         },
 *         ec2Configuration?: list<array>,
 *         scalingPolicy?: array{minScaleDownDelayMinutes?: int, ...},
 *         ...,
 *     },
 *     serviceRole?: string,
 *     tags?: array<string, string>,
 *     eksConfiguration?: array{eksClusterArn?: string, kubernetesNamespace?: string, ...},
 *     context?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComputeEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComputeEnvironmentAsync(array{
 *     computeEnvironmentName?: string,
 *     type?: 'MANAGED'|'UNMANAGED',
 *     state?: 'DISABLED'|'ENABLED',
 *     unmanagedvCpus?: int,
 *     computeResources?: array{
 *         type?: 'EC2'|'FARGATE'|'FARGATE_SPOT'|'SPOT',
 *         allocationStrategy?: 'BEST_FIT'|'BEST_FIT_PROGRESSIVE'|'BEST_FIT_PROGRESSIVE_ORDERED'|'SPOT_CAPACITY_OPTIMIZED'|'SPOT_CAPACITY_OPTIMIZED_PRIORITIZED'|'SPOT_PRICE_CAPACITY_OPTIMIZED',
 *         minvCpus?: int,
 *         maxvCpus?: int,
 *         desiredvCpus?: int,
 *         instanceTypes?: list<string>,
 *         imageId?: string,
 *         subnets?: list<string>,
 *         securityGroupIds?: list<string>,
 *         ec2KeyPair?: string,
 *         instanceRole?: string,
 *         tags?: array<string, string>,
 *         placementGroup?: string,
 *         bidPercentage?: int,
 *         spotIamFleetRole?: string,
 *         launchTemplate?: array{
 *             launchTemplateId?: string,
 *             launchTemplateName?: string,
 *             version?: string,
 *             overrides?: list<array>,
 *             userdataType?: 'EKS_BOOTSTRAP_SH'|'EKS_NODEADM',
 *             ...,
 *         },
 *         ec2Configuration?: list<array>,
 *         scalingPolicy?: array{minScaleDownDelayMinutes?: int, ...},
 *         ...,
 *     },
 *     serviceRole?: string,
 *     tags?: array<string, string>,
 *     eksConfiguration?: array{eksClusterArn?: string, kubernetesNamespace?: string, ...},
 *     context?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConsumableResource(array $args = [])
 * @phpstan-method \Aws\Result createConsumableResource(array{
 *     consumableResourceName?: string,
 *     totalQuantity?: int,
 *     resourceType?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConsumableResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConsumableResourceAsync(array{
 *     consumableResourceName?: string,
 *     totalQuantity?: int,
 *     resourceType?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJobQueue(array $args = [])
 * @phpstan-method \Aws\Result createJobQueue(array{
 *     jobQueueName?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     schedulingPolicyArn?: string,
 *     priority?: int,
 *     computeEnvironmentOrder?: list<array{order?: int, computeEnvironment?: string, ...}>,
 *     serviceEnvironmentOrder?: list<array{order?: int, serviceEnvironment?: string, ...}>,
 *     jobQueueType?: 'ECS'|'ECS_FARGATE'|'EKS'|'SAGEMAKER_TRAINING',
 *     tags?: array<string, string>,
 *     jobStateTimeLimitActions?: list<array{reason?: string, state?: 'RUNNABLE', maxTimeSeconds?: int, action?: 'CANCEL'|'TERMINATE', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobQueueAsync(array{
 *     jobQueueName?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     schedulingPolicyArn?: string,
 *     priority?: int,
 *     computeEnvironmentOrder?: list<array{order?: int, computeEnvironment?: string, ...}>,
 *     serviceEnvironmentOrder?: list<array{order?: int, serviceEnvironment?: string, ...}>,
 *     jobQueueType?: 'ECS'|'ECS_FARGATE'|'EKS'|'SAGEMAKER_TRAINING',
 *     tags?: array<string, string>,
 *     jobStateTimeLimitActions?: list<array{reason?: string, state?: 'RUNNABLE', maxTimeSeconds?: int, action?: 'CANCEL'|'TERMINATE', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQuotaShare(array $args = [])
 * @phpstan-method \Aws\Result createQuotaShare(array{
 *     quotaShareName?: string,
 *     jobQueue?: string,
 *     capacityLimits?: list<array{maxCapacity?: int, capacityUnit?: string, ...}>,
 *     resourceSharingConfiguration?: array{strategy?: 'LEND'|'LEND_AND_BORROW'|'RESERVE', borrowLimit?: int, ...},
 *     preemptionConfiguration?: array{inSharePreemption?: 'DISABLED'|'ENABLED', ...},
 *     state?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuotaShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuotaShareAsync(array{
 *     quotaShareName?: string,
 *     jobQueue?: string,
 *     capacityLimits?: list<array{maxCapacity?: int, capacityUnit?: string, ...}>,
 *     resourceSharingConfiguration?: array{strategy?: 'LEND'|'LEND_AND_BORROW'|'RESERVE', borrowLimit?: int, ...},
 *     preemptionConfiguration?: array{inSharePreemption?: 'DISABLED'|'ENABLED', ...},
 *     state?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSchedulingPolicy(array $args = [])
 * @phpstan-method \Aws\Result createSchedulingPolicy(array{
 *     name?: string,
 *     quotaSharePolicy?: array{idleResourceAssignmentStrategy?: 'FIFO', ...},
 *     fairsharePolicy?: array{shareDecaySeconds?: int, computeReservation?: int, shareDistribution?: list<array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSchedulingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSchedulingPolicyAsync(array{
 *     name?: string,
 *     quotaSharePolicy?: array{idleResourceAssignmentStrategy?: 'FIFO', ...},
 *     fairsharePolicy?: array{shareDecaySeconds?: int, computeReservation?: int, shareDistribution?: list<array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createServiceEnvironment(array{
 *     serviceEnvironmentName?: string,
 *     serviceEnvironmentType?: 'SAGEMAKER_TRAINING',
 *     state?: 'DISABLED'|'ENABLED',
 *     capacityLimits?: list<array{maxCapacity?: int, capacityUnit?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceEnvironmentAsync(array{
 *     serviceEnvironmentName?: string,
 *     serviceEnvironmentType?: 'SAGEMAKER_TRAINING',
 *     state?: 'DISABLED'|'ENABLED',
 *     capacityLimits?: list<array{maxCapacity?: int, capacityUnit?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteComputeEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteComputeEnvironment(array{computeEnvironment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComputeEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComputeEnvironmentAsync(array{computeEnvironment?: string, ...} $args = [])
 * @method \Aws\Result deleteConsumableResource(array $args = [])
 * @phpstan-method \Aws\Result deleteConsumableResource(array{consumableResource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConsumableResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConsumableResourceAsync(array{consumableResource?: string, ...} $args = [])
 * @method \Aws\Result deleteJobQueue(array $args = [])
 * @phpstan-method \Aws\Result deleteJobQueue(array{jobQueue?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobQueueAsync(array{jobQueue?: string, ...} $args = [])
 * @method \Aws\Result deleteQuotaShare(array $args = [])
 * @phpstan-method \Aws\Result deleteQuotaShare(array{quotaShareArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQuotaShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQuotaShareAsync(array{quotaShareArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSchedulingPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteSchedulingPolicy(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSchedulingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSchedulingPolicyAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceEnvironment(array{serviceEnvironment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceEnvironmentAsync(array{serviceEnvironment?: string, ...} $args = [])
 * @method \Aws\Result deregisterJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result deregisterJobDefinition(array{jobDefinition?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterJobDefinitionAsync(array{jobDefinition?: string, ...} $args = [])
 * @method \Aws\Result describeComputeEnvironments(array $args = [])
 * @phpstan-method \Aws\Result describeComputeEnvironments(array{computeEnvironments?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComputeEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComputeEnvironmentsAsync(array{computeEnvironments?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeConsumableResource(array $args = [])
 * @phpstan-method \Aws\Result describeConsumableResource(array{consumableResource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConsumableResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConsumableResourceAsync(array{consumableResource?: string, ...} $args = [])
 * @method \Aws\Result describeJobDefinitions(array $args = [])
 * @phpstan-method \Aws\Result describeJobDefinitions(array{
 *     jobDefinitions?: list<string>,
 *     maxResults?: int,
 *     jobDefinitionName?: string,
 *     status?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobDefinitionsAsync(array{
 *     jobDefinitions?: list<string>,
 *     maxResults?: int,
 *     jobDefinitionName?: string,
 *     status?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeJobQueues(array $args = [])
 * @phpstan-method \Aws\Result describeJobQueues(array{jobQueues?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobQueuesAsync(array{jobQueues?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeJobs(array $args = [])
 * @phpstan-method \Aws\Result describeJobs(array{jobs?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobsAsync(array{jobs?: list<string>, ...} $args = [])
 * @method \Aws\Result describeQuotaShare(array $args = [])
 * @phpstan-method \Aws\Result describeQuotaShare(array{quotaShareArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQuotaShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQuotaShareAsync(array{quotaShareArn?: string, ...} $args = [])
 * @method \Aws\Result describeSchedulingPolicies(array $args = [])
 * @phpstan-method \Aws\Result describeSchedulingPolicies(array{arns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSchedulingPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSchedulingPoliciesAsync(array{arns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeServiceEnvironments(array $args = [])
 * @phpstan-method \Aws\Result describeServiceEnvironments(array{serviceEnvironments?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceEnvironmentsAsync(array{serviceEnvironments?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeServiceJob(array $args = [])
 * @phpstan-method \Aws\Result describeServiceJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result getJobQueueSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getJobQueueSnapshot(array{jobQueue?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobQueueSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobQueueSnapshotAsync(array{jobQueue?: string, ...} $args = [])
 * @method \Aws\Result listConsumableResources(array $args = [])
 * @phpstan-method \Aws\Result listConsumableResources(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConsumableResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConsumableResourcesAsync(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{
 *     jobQueue?: string,
 *     arrayJobId?: string,
 *     multiNodeJobId?: string,
 *     jobStatus?: 'FAILED'|'PENDING'|'RUNNABLE'|'RUNNING'|'STARTING'|'SUBMITTED'|'SUCCEEDED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{
 *     jobQueue?: string,
 *     arrayJobId?: string,
 *     multiNodeJobId?: string,
 *     jobStatus?: 'FAILED'|'PENDING'|'RUNNABLE'|'RUNNING'|'STARTING'|'SUBMITTED'|'SUCCEEDED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobsByConsumableResource(array $args = [])
 * @phpstan-method \Aws\Result listJobsByConsumableResource(array{
 *     consumableResource?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsByConsumableResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsByConsumableResourceAsync(array{
 *     consumableResource?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listQuotaShares(array $args = [])
 * @phpstan-method \Aws\Result listQuotaShares(array{jobQueue?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQuotaSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuotaSharesAsync(array{jobQueue?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSchedulingPolicies(array $args = [])
 * @phpstan-method \Aws\Result listSchedulingPolicies(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchedulingPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchedulingPoliciesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceJobs(array $args = [])
 * @phpstan-method \Aws\Result listServiceJobs(array{
 *     jobQueue?: string,
 *     jobStatus?: 'FAILED'|'PENDING'|'RUNNABLE'|'RUNNING'|'SCHEDULED'|'STARTING'|'SUBMITTED'|'SUCCEEDED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceJobsAsync(array{
 *     jobQueue?: string,
 *     jobStatus?: 'FAILED'|'PENDING'|'RUNNABLE'|'RUNNING'|'SCHEDULED'|'STARTING'|'SUBMITTED'|'SUCCEEDED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result registerJobDefinition(array{
 *     jobDefinitionName?: string,
 *     type?: 'container'|'multinode',
 *     parameters?: array<string, string>,
 *     schedulingPriority?: int,
 *     containerProperties?: array{
 *         image?: string,
 *         vcpus?: int,
 *         memory?: int,
 *         command?: list<string>,
 *         jobRoleArn?: string,
 *         executionRoleArn?: string,
 *         volumes?: list<array>,
 *         environment?: list<array>,
 *         mountPoints?: list<array>,
 *         readonlyRootFilesystem?: bool,
 *         privileged?: bool,
 *         ulimits?: list<array>,
 *         user?: string,
 *         instanceType?: string,
 *         resourceRequirements?: list<array>,
 *         linuxParameters?: array{
 *             devices?: list<array>,
 *             initProcessEnabled?: bool,
 *             sharedMemorySize?: int,
 *             tmpfs?: list<array>,
 *             maxSwap?: int,
 *             swappiness?: int,
 *             ...,
 *         },
 *         logConfiguration?: array{
 *             logDriver?: 'awsfirelens'|'awslogs'|'fluentd'|'gelf'|'journald'|'json-file'|'splunk'|'syslog',
 *             options?: array<string, string>,
 *             secretOptions?: list<array>,
 *             ...,
 *         },
 *         secrets?: list<array>,
 *         networkConfiguration?: array{assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         fargatePlatformConfiguration?: array{platformVersion?: string, ...},
 *         enableExecuteCommand?: bool,
 *         ephemeralStorage?: array{sizeInGiB?: int, ...},
 *         runtimePlatform?: array{operatingSystemFamily?: string, cpuArchitecture?: string, ...},
 *         repositoryCredentials?: array{credentialsParameter?: string, ...},
 *         ...,
 *     },
 *     nodeProperties?: array{numNodes?: int, mainNode?: int, nodeRangeProperties?: list<array>, ...},
 *     retryStrategy?: array{attempts?: int, evaluateOnExit?: list<array>, ...},
 *     propagateTags?: bool,
 *     timeout?: array{attemptDurationSeconds?: int, ...},
 *     tags?: array<string, string>,
 *     platformCapabilities?: list<'EC2'|'FARGATE'>,
 *     eksProperties?: array{
 *         podProperties?: array{
 *             serviceAccountName?: string,
 *             hostNetwork?: bool,
 *             dnsPolicy?: string,
 *             imagePullSecrets?: list<array>,
 *             containers?: list<array>,
 *             initContainers?: list<array>,
 *             volumes?: list<array>,
 *             metadata?: array,
 *             shareProcessNamespace?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ecsProperties?: array{taskProperties?: list<array>, ...},
 *     consumableResourceProperties?: array{consumableResourceList?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerJobDefinitionAsync(array{
 *     jobDefinitionName?: string,
 *     type?: 'container'|'multinode',
 *     parameters?: array<string, string>,
 *     schedulingPriority?: int,
 *     containerProperties?: array{
 *         image?: string,
 *         vcpus?: int,
 *         memory?: int,
 *         command?: list<string>,
 *         jobRoleArn?: string,
 *         executionRoleArn?: string,
 *         volumes?: list<array>,
 *         environment?: list<array>,
 *         mountPoints?: list<array>,
 *         readonlyRootFilesystem?: bool,
 *         privileged?: bool,
 *         ulimits?: list<array>,
 *         user?: string,
 *         instanceType?: string,
 *         resourceRequirements?: list<array>,
 *         linuxParameters?: array{
 *             devices?: list<array>,
 *             initProcessEnabled?: bool,
 *             sharedMemorySize?: int,
 *             tmpfs?: list<array>,
 *             maxSwap?: int,
 *             swappiness?: int,
 *             ...,
 *         },
 *         logConfiguration?: array{
 *             logDriver?: 'awsfirelens'|'awslogs'|'fluentd'|'gelf'|'journald'|'json-file'|'splunk'|'syslog',
 *             options?: array<string, string>,
 *             secretOptions?: list<array>,
 *             ...,
 *         },
 *         secrets?: list<array>,
 *         networkConfiguration?: array{assignPublicIp?: 'DISABLED'|'ENABLED', ...},
 *         fargatePlatformConfiguration?: array{platformVersion?: string, ...},
 *         enableExecuteCommand?: bool,
 *         ephemeralStorage?: array{sizeInGiB?: int, ...},
 *         runtimePlatform?: array{operatingSystemFamily?: string, cpuArchitecture?: string, ...},
 *         repositoryCredentials?: array{credentialsParameter?: string, ...},
 *         ...,
 *     },
 *     nodeProperties?: array{numNodes?: int, mainNode?: int, nodeRangeProperties?: list<array>, ...},
 *     retryStrategy?: array{attempts?: int, evaluateOnExit?: list<array>, ...},
 *     propagateTags?: bool,
 *     timeout?: array{attemptDurationSeconds?: int, ...},
 *     tags?: array<string, string>,
 *     platformCapabilities?: list<'EC2'|'FARGATE'>,
 *     eksProperties?: array{
 *         podProperties?: array{
 *             serviceAccountName?: string,
 *             hostNetwork?: bool,
 *             dnsPolicy?: string,
 *             imagePullSecrets?: list<array>,
 *             containers?: list<array>,
 *             initContainers?: list<array>,
 *             volumes?: list<array>,
 *             metadata?: array,
 *             shareProcessNamespace?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ecsProperties?: array{taskProperties?: list<array>, ...},
 *     consumableResourceProperties?: array{consumableResourceList?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result submitJob(array $args = [])
 * @phpstan-method \Aws\Result submitJob(array{
 *     jobName?: string,
 *     jobQueue?: string,
 *     shareIdentifier?: string,
 *     schedulingPriorityOverride?: int,
 *     arrayProperties?: array{size?: int, ...},
 *     dependsOn?: list<array{jobId?: string, type?: 'N_TO_N'|'SEQUENTIAL', ...}>,
 *     jobDefinition?: string,
 *     parameters?: array<string, string>,
 *     containerOverrides?: array{
 *         vcpus?: int,
 *         memory?: int,
 *         command?: list<string>,
 *         instanceType?: string,
 *         environment?: list<array>,
 *         resourceRequirements?: list<array>,
 *         ...,
 *     },
 *     nodeOverrides?: array{numNodes?: int, nodePropertyOverrides?: list<array>, ...},
 *     retryStrategy?: array{attempts?: int, evaluateOnExit?: list<array>, ...},
 *     propagateTags?: bool,
 *     timeout?: array{attemptDurationSeconds?: int, ...},
 *     tags?: array<string, string>,
 *     eksPropertiesOverride?: array{
 *         podProperties?: array{containers?: list<array>, initContainers?: list<array>, metadata?: array, ...},
 *         ...,
 *     },
 *     ecsPropertiesOverride?: array{taskProperties?: list<array>, ...},
 *     consumableResourcePropertiesOverride?: array{consumableResourceList?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitJobAsync(array{
 *     jobName?: string,
 *     jobQueue?: string,
 *     shareIdentifier?: string,
 *     schedulingPriorityOverride?: int,
 *     arrayProperties?: array{size?: int, ...},
 *     dependsOn?: list<array{jobId?: string, type?: 'N_TO_N'|'SEQUENTIAL', ...}>,
 *     jobDefinition?: string,
 *     parameters?: array<string, string>,
 *     containerOverrides?: array{
 *         vcpus?: int,
 *         memory?: int,
 *         command?: list<string>,
 *         instanceType?: string,
 *         environment?: list<array>,
 *         resourceRequirements?: list<array>,
 *         ...,
 *     },
 *     nodeOverrides?: array{numNodes?: int, nodePropertyOverrides?: list<array>, ...},
 *     retryStrategy?: array{attempts?: int, evaluateOnExit?: list<array>, ...},
 *     propagateTags?: bool,
 *     timeout?: array{attemptDurationSeconds?: int, ...},
 *     tags?: array<string, string>,
 *     eksPropertiesOverride?: array{
 *         podProperties?: array{containers?: list<array>, initContainers?: list<array>, metadata?: array, ...},
 *         ...,
 *     },
 *     ecsPropertiesOverride?: array{taskProperties?: list<array>, ...},
 *     consumableResourcePropertiesOverride?: array{consumableResourceList?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result submitServiceJob(array $args = [])
 * @phpstan-method \Aws\Result submitServiceJob(array{
 *     jobName?: string,
 *     jobQueue?: string,
 *     retryStrategy?: array{attempts?: int, evaluateOnExit?: list<array>, ...},
 *     schedulingPriority?: int,
 *     serviceRequestPayload?: string,
 *     serviceJobType?: 'SAGEMAKER_TRAINING',
 *     shareIdentifier?: string,
 *     quotaShareName?: string,
 *     preemptionConfiguration?: array{preemptionRetriesBeforeTermination?: int, ...},
 *     timeoutConfig?: array{attemptDurationSeconds?: int, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitServiceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitServiceJobAsync(array{
 *     jobName?: string,
 *     jobQueue?: string,
 *     retryStrategy?: array{attempts?: int, evaluateOnExit?: list<array>, ...},
 *     schedulingPriority?: int,
 *     serviceRequestPayload?: string,
 *     serviceJobType?: 'SAGEMAKER_TRAINING',
 *     shareIdentifier?: string,
 *     quotaShareName?: string,
 *     preemptionConfiguration?: array{preemptionRetriesBeforeTermination?: int, ...},
 *     timeoutConfig?: array{attemptDurationSeconds?: int, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result terminateJob(array $args = [])
 * @phpstan-method \Aws\Result terminateJob(array{jobId?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateJobAsync(array{jobId?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result terminateServiceJob(array $args = [])
 * @phpstan-method \Aws\Result terminateServiceJob(array{jobId?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateServiceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateServiceJobAsync(array{jobId?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateComputeEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateComputeEnvironment(array{
 *     computeEnvironment?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     unmanagedvCpus?: int,
 *     computeResources?: array{
 *         minvCpus?: int,
 *         maxvCpus?: int,
 *         desiredvCpus?: int,
 *         subnets?: list<string>,
 *         securityGroupIds?: list<string>,
 *         allocationStrategy?: 'BEST_FIT_PROGRESSIVE'|'BEST_FIT_PROGRESSIVE_ORDERED'|'SPOT_CAPACITY_OPTIMIZED'|'SPOT_CAPACITY_OPTIMIZED_PRIORITIZED'|'SPOT_PRICE_CAPACITY_OPTIMIZED',
 *         instanceTypes?: list<string>,
 *         ec2KeyPair?: string,
 *         instanceRole?: string,
 *         tags?: array<string, string>,
 *         placementGroup?: string,
 *         bidPercentage?: int,
 *         launchTemplate?: array{
 *             launchTemplateId?: string,
 *             launchTemplateName?: string,
 *             version?: string,
 *             overrides?: list<array>,
 *             userdataType?: 'EKS_BOOTSTRAP_SH'|'EKS_NODEADM',
 *             ...,
 *         },
 *         ec2Configuration?: list<array>,
 *         updateToLatestImageVersion?: bool,
 *         type?: 'EC2'|'FARGATE'|'FARGATE_SPOT'|'SPOT',
 *         imageId?: string,
 *         scalingPolicy?: array{minScaleDownDelayMinutes?: int, ...},
 *         ...,
 *     },
 *     serviceRole?: string,
 *     updatePolicy?: array{terminateJobsOnUpdate?: bool, jobExecutionTimeoutMinutes?: int, ...},
 *     context?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComputeEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComputeEnvironmentAsync(array{
 *     computeEnvironment?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     unmanagedvCpus?: int,
 *     computeResources?: array{
 *         minvCpus?: int,
 *         maxvCpus?: int,
 *         desiredvCpus?: int,
 *         subnets?: list<string>,
 *         securityGroupIds?: list<string>,
 *         allocationStrategy?: 'BEST_FIT_PROGRESSIVE'|'BEST_FIT_PROGRESSIVE_ORDERED'|'SPOT_CAPACITY_OPTIMIZED'|'SPOT_CAPACITY_OPTIMIZED_PRIORITIZED'|'SPOT_PRICE_CAPACITY_OPTIMIZED',
 *         instanceTypes?: list<string>,
 *         ec2KeyPair?: string,
 *         instanceRole?: string,
 *         tags?: array<string, string>,
 *         placementGroup?: string,
 *         bidPercentage?: int,
 *         launchTemplate?: array{
 *             launchTemplateId?: string,
 *             launchTemplateName?: string,
 *             version?: string,
 *             overrides?: list<array>,
 *             userdataType?: 'EKS_BOOTSTRAP_SH'|'EKS_NODEADM',
 *             ...,
 *         },
 *         ec2Configuration?: list<array>,
 *         updateToLatestImageVersion?: bool,
 *         type?: 'EC2'|'FARGATE'|'FARGATE_SPOT'|'SPOT',
 *         imageId?: string,
 *         scalingPolicy?: array{minScaleDownDelayMinutes?: int, ...},
 *         ...,
 *     },
 *     serviceRole?: string,
 *     updatePolicy?: array{terminateJobsOnUpdate?: bool, jobExecutionTimeoutMinutes?: int, ...},
 *     context?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConsumableResource(array $args = [])
 * @phpstan-method \Aws\Result updateConsumableResource(array{consumableResource?: string, operation?: string, quantity?: int, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConsumableResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConsumableResourceAsync(array{consumableResource?: string, operation?: string, quantity?: int, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateJobQueue(array $args = [])
 * @phpstan-method \Aws\Result updateJobQueue(array{
 *     jobQueue?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     schedulingPolicyArn?: string,
 *     priority?: int,
 *     computeEnvironmentOrder?: list<array{order?: int, computeEnvironment?: string, ...}>,
 *     serviceEnvironmentOrder?: list<array{order?: int, serviceEnvironment?: string, ...}>,
 *     jobStateTimeLimitActions?: list<array{reason?: string, state?: 'RUNNABLE', maxTimeSeconds?: int, action?: 'CANCEL'|'TERMINATE', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobQueueAsync(array{
 *     jobQueue?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     schedulingPolicyArn?: string,
 *     priority?: int,
 *     computeEnvironmentOrder?: list<array{order?: int, computeEnvironment?: string, ...}>,
 *     serviceEnvironmentOrder?: list<array{order?: int, serviceEnvironment?: string, ...}>,
 *     jobStateTimeLimitActions?: list<array{reason?: string, state?: 'RUNNABLE', maxTimeSeconds?: int, action?: 'CANCEL'|'TERMINATE', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQuotaShare(array $args = [])
 * @phpstan-method \Aws\Result updateQuotaShare(array{
 *     quotaShareArn?: string,
 *     capacityLimits?: list<array{maxCapacity?: int, capacityUnit?: string, ...}>,
 *     resourceSharingConfiguration?: array{strategy?: 'LEND'|'LEND_AND_BORROW'|'RESERVE', borrowLimit?: int, ...},
 *     preemptionConfiguration?: array{inSharePreemption?: 'DISABLED'|'ENABLED', ...},
 *     state?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuotaShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuotaShareAsync(array{
 *     quotaShareArn?: string,
 *     capacityLimits?: list<array{maxCapacity?: int, capacityUnit?: string, ...}>,
 *     resourceSharingConfiguration?: array{strategy?: 'LEND'|'LEND_AND_BORROW'|'RESERVE', borrowLimit?: int, ...},
 *     preemptionConfiguration?: array{inSharePreemption?: 'DISABLED'|'ENABLED', ...},
 *     state?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSchedulingPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateSchedulingPolicy(array{
 *     arn?: string,
 *     quotaSharePolicy?: array{idleResourceAssignmentStrategy?: 'FIFO', ...},
 *     fairsharePolicy?: array{shareDecaySeconds?: int, computeReservation?: int, shareDistribution?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSchedulingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSchedulingPolicyAsync(array{
 *     arn?: string,
 *     quotaSharePolicy?: array{idleResourceAssignmentStrategy?: 'FIFO', ...},
 *     fairsharePolicy?: array{shareDecaySeconds?: int, computeReservation?: int, shareDistribution?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateServiceEnvironment(array{
 *     serviceEnvironment?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     capacityLimits?: list<array{maxCapacity?: int, capacityUnit?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceEnvironmentAsync(array{
 *     serviceEnvironment?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     capacityLimits?: list<array{maxCapacity?: int, capacityUnit?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceJob(array $args = [])
 * @phpstan-method \Aws\Result updateServiceJob(array{jobId?: string, schedulingPriority?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceJobAsync(array{jobId?: string, schedulingPriority?: int, ...} $args = [])
 */
class BatchClient extends AwsClient {}
