<?php
namespace Aws\Deadline;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWSDeadlineCloud** service.
 * @method \Aws\Result associateMemberToFarm(array $args = [])
 * @phpstan-method \Aws\Result associateMemberToFarm(array{
 *     farmId?: string,
 *     principalType?: 'GROUP'|'USER',
 *     identityStoreId?: string,
 *     membershipLevel?: 'CONTRIBUTOR'|'MANAGER'|'OWNER'|'VIEWER',
 *     principalId?: string,
 *     identityCenterRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMemberToFarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMemberToFarmAsync(array{
 *     farmId?: string,
 *     principalType?: 'GROUP'|'USER',
 *     identityStoreId?: string,
 *     membershipLevel?: 'CONTRIBUTOR'|'MANAGER'|'OWNER'|'VIEWER',
 *     principalId?: string,
 *     identityCenterRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateMemberToFleet(array $args = [])
 * @phpstan-method \Aws\Result associateMemberToFleet(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     principalType?: 'GROUP'|'USER',
 *     identityStoreId?: string,
 *     membershipLevel?: 'CONTRIBUTOR'|'MANAGER'|'OWNER'|'VIEWER',
 *     principalId?: string,
 *     identityCenterRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMemberToFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMemberToFleetAsync(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     principalType?: 'GROUP'|'USER',
 *     identityStoreId?: string,
 *     membershipLevel?: 'CONTRIBUTOR'|'MANAGER'|'OWNER'|'VIEWER',
 *     principalId?: string,
 *     identityCenterRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateMemberToJob(array $args = [])
 * @phpstan-method \Aws\Result associateMemberToJob(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     principalType?: 'GROUP'|'USER',
 *     identityStoreId?: string,
 *     membershipLevel?: 'CONTRIBUTOR'|'MANAGER'|'OWNER'|'VIEWER',
 *     principalId?: string,
 *     identityCenterRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMemberToJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMemberToJobAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     principalType?: 'GROUP'|'USER',
 *     identityStoreId?: string,
 *     membershipLevel?: 'CONTRIBUTOR'|'MANAGER'|'OWNER'|'VIEWER',
 *     principalId?: string,
 *     identityCenterRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateMemberToQueue(array $args = [])
 * @phpstan-method \Aws\Result associateMemberToQueue(array{
 *     farmId?: string,
 *     queueId?: string,
 *     principalType?: 'GROUP'|'USER',
 *     identityStoreId?: string,
 *     membershipLevel?: 'CONTRIBUTOR'|'MANAGER'|'OWNER'|'VIEWER',
 *     principalId?: string,
 *     identityCenterRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMemberToQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMemberToQueueAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     principalType?: 'GROUP'|'USER',
 *     identityStoreId?: string,
 *     membershipLevel?: 'CONTRIBUTOR'|'MANAGER'|'OWNER'|'VIEWER',
 *     principalId?: string,
 *     identityCenterRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result assumeFleetRoleForRead(array $args = [])
 * @phpstan-method \Aws\Result assumeFleetRoleForRead(array{farmId?: string, fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assumeFleetRoleForReadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeFleetRoleForReadAsync(array{farmId?: string, fleetId?: string, ...} $args = [])
 * @method \Aws\Result assumeFleetRoleForWorker(array $args = [])
 * @phpstan-method \Aws\Result assumeFleetRoleForWorker(array{farmId?: string, fleetId?: string, workerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assumeFleetRoleForWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeFleetRoleForWorkerAsync(array{farmId?: string, fleetId?: string, workerId?: string, ...} $args = [])
 * @method \Aws\Result assumeQueueRoleForRead(array $args = [])
 * @phpstan-method \Aws\Result assumeQueueRoleForRead(array{farmId?: string, queueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assumeQueueRoleForReadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeQueueRoleForReadAsync(array{farmId?: string, queueId?: string, ...} $args = [])
 * @method \Aws\Result assumeQueueRoleForUser(array $args = [])
 * @phpstan-method \Aws\Result assumeQueueRoleForUser(array{farmId?: string, queueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assumeQueueRoleForUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeQueueRoleForUserAsync(array{farmId?: string, queueId?: string, ...} $args = [])
 * @method \Aws\Result assumeQueueRoleForWorker(array $args = [])
 * @phpstan-method \Aws\Result assumeQueueRoleForWorker(array{farmId?: string, fleetId?: string, workerId?: string, queueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assumeQueueRoleForWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeQueueRoleForWorkerAsync(array{farmId?: string, fleetId?: string, workerId?: string, queueId?: string, ...} $args = [])
 * @method \Aws\Result batchGetJob(array $args = [])
 * @phpstan-method \Aws\Result batchGetJob(array{identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetJobAsync(array{identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchGetJobEntity(array $args = [])
 * @phpstan-method \Aws\Result batchGetJobEntity(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     workerId?: string,
 *     identifiers?: list<array{jobDetails?: array, jobAttachmentDetails?: array, stepDetails?: array, environmentDetails?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetJobEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetJobEntityAsync(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     workerId?: string,
 *     identifiers?: list<array{jobDetails?: array, jobAttachmentDetails?: array, stepDetails?: array, environmentDetails?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetSession(array $args = [])
 * @phpstan-method \Aws\Result batchGetSession(array{
 *     identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, sessionId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetSessionAsync(array{
 *     identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, sessionId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetSessionAction(array $args = [])
 * @phpstan-method \Aws\Result batchGetSessionAction(array{
 *     identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, sessionActionId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSessionActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetSessionActionAsync(array{
 *     identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, sessionActionId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetStep(array $args = [])
 * @phpstan-method \Aws\Result batchGetStep(array{identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, stepId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetStepAsync(array{identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, stepId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchGetTask(array $args = [])
 * @phpstan-method \Aws\Result batchGetTask(array{
 *     identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, stepId?: string, taskId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetTaskAsync(array{
 *     identifiers?: list<array{farmId?: string, queueId?: string, jobId?: string, stepId?: string, taskId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetWorker(array $args = [])
 * @phpstan-method \Aws\Result batchGetWorker(array{identifiers?: list<array{farmId?: string, fleetId?: string, workerId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetWorkerAsync(array{identifiers?: list<array{farmId?: string, fleetId?: string, workerId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchUpdateJob(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateJob(array{
 *     clientToken?: string,
 *     jobs?: list<array{
 *         farmId?: string,
 *         queueId?: string,
 *         jobId?: string,
 *         targetTaskRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *         priority?: int,
 *         maxFailedTasksCount?: int,
 *         maxRetriesPerTask?: int,
 *         lifecycleStatus?: 'ARCHIVED',
 *         maxWorkerCount?: int,
 *         name?: string,
 *         description?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateJobAsync(array{
 *     clientToken?: string,
 *     jobs?: list<array{
 *         farmId?: string,
 *         queueId?: string,
 *         jobId?: string,
 *         targetTaskRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *         priority?: int,
 *         maxFailedTasksCount?: int,
 *         maxRetriesPerTask?: int,
 *         lifecycleStatus?: 'ARCHIVED',
 *         maxWorkerCount?: int,
 *         name?: string,
 *         description?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateTask(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateTask(array{
 *     clientToken?: string,
 *     tasks?: list<array{
 *         farmId?: string,
 *         queueId?: string,
 *         jobId?: string,
 *         stepId?: string,
 *         taskId?: string,
 *         targetRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateTaskAsync(array{
 *     clientToken?: string,
 *     tasks?: list<array{
 *         farmId?: string,
 *         queueId?: string,
 *         jobId?: string,
 *         stepId?: string,
 *         taskId?: string,
 *         targetRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result copyJobTemplate(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     targetS3Location?: array{bucketName?: string, key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyJobTemplateAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     targetS3Location?: array{bucketName?: string, key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBudget(array $args = [])
 * @phpstan-method \Aws\Result createBudget(array{
 *     farmId?: string,
 *     displayName?: string,
 *     description?: string,
 *     clientToken?: string,
 *     usageTrackingResource?: array{queueId?: string, ...},
 *     approximateDollarLimit?: float,
 *     actions?: list<array{
 *         type?: 'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *         thresholdPercentage?: float,
 *         description?: string,
 *         ...,
 *     }>,
 *     schedule?: array{
 *         fixed?: array{startTime?: int|string|\DateTimeInterface, endTime?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBudgetAsync(array{
 *     farmId?: string,
 *     displayName?: string,
 *     description?: string,
 *     clientToken?: string,
 *     usageTrackingResource?: array{queueId?: string, ...},
 *     approximateDollarLimit?: float,
 *     actions?: list<array{
 *         type?: 'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *         thresholdPercentage?: float,
 *         description?: string,
 *         ...,
 *     }>,
 *     schedule?: array{
 *         fixed?: array{startTime?: int|string|\DateTimeInterface, endTime?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFarm(array $args = [])
 * @phpstan-method \Aws\Result createFarm(array{
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     costScaleFactor?: float,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFarmAsync(array{
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     costScaleFactor?: float,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFleet(array $args = [])
 * @phpstan-method \Aws\Result createFleet(array{
 *     farmId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     minWorkerCount?: int,
 *     maxWorkerCount?: int,
 *     configuration?: array{
 *         customerManaged?: array{
 *             mode?: 'EVENT_BASED_AUTO_SCALING'|'NO_SCALING',
 *             autoScalingConfiguration?: array,
 *             workerCapabilities?: array,
 *             storageProfileId?: string,
 *             tagPropagationMode?: 'NO_PROPAGATION'|'PROPAGATE_TAGS_TO_WORKERS_AT_LAUNCH',
 *             ...,
 *         },
 *         serviceManagedEc2?: array{
 *             instanceCapabilities?: array,
 *             instanceMarketOptions?: array,
 *             vpcConfiguration?: array,
 *             storageProfileId?: string,
 *             persistentVolumeConfiguration?: array,
 *             autoScalingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     hostConfiguration?: array{scriptBody?: string, scriptTimeoutSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFleetAsync(array{
 *     farmId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     minWorkerCount?: int,
 *     maxWorkerCount?: int,
 *     configuration?: array{
 *         customerManaged?: array{
 *             mode?: 'EVENT_BASED_AUTO_SCALING'|'NO_SCALING',
 *             autoScalingConfiguration?: array,
 *             workerCapabilities?: array,
 *             storageProfileId?: string,
 *             tagPropagationMode?: 'NO_PROPAGATION'|'PROPAGATE_TAGS_TO_WORKERS_AT_LAUNCH',
 *             ...,
 *         },
 *         serviceManagedEc2?: array{
 *             instanceCapabilities?: array,
 *             instanceMarketOptions?: array,
 *             vpcConfiguration?: array,
 *             storageProfileId?: string,
 *             persistentVolumeConfiguration?: array,
 *             autoScalingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     hostConfiguration?: array{scriptBody?: string, scriptTimeoutSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     farmId?: string,
 *     queueId?: string,
 *     clientToken?: string,
 *     template?: string,
 *     templateType?: 'JSON'|'YAML',
 *     priority?: int,
 *     parameters?: array<string, array{int?: string, float?: string, string?: string, path?: string, ...}>,
 *     attachments?: array{manifests?: list<array>, fileSystem?: 'COPIED'|'VIRTUAL', ...},
 *     storageProfileId?: string,
 *     targetTaskRunStatus?: 'READY'|'SUSPENDED',
 *     maxFailedTasksCount?: int,
 *     maxRetriesPerTask?: int,
 *     maxWorkerCount?: int,
 *     sourceJobId?: string,
 *     nameOverride?: string,
 *     descriptionOverride?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     clientToken?: string,
 *     template?: string,
 *     templateType?: 'JSON'|'YAML',
 *     priority?: int,
 *     parameters?: array<string, array{int?: string, float?: string, string?: string, path?: string, ...}>,
 *     attachments?: array{manifests?: list<array>, fileSystem?: 'COPIED'|'VIRTUAL', ...},
 *     storageProfileId?: string,
 *     targetTaskRunStatus?: 'READY'|'SUSPENDED',
 *     maxFailedTasksCount?: int,
 *     maxRetriesPerTask?: int,
 *     maxWorkerCount?: int,
 *     sourceJobId?: string,
 *     nameOverride?: string,
 *     descriptionOverride?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLicenseEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createLicenseEndpoint(array{
 *     clientToken?: string,
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLicenseEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLicenseEndpointAsync(array{
 *     clientToken?: string,
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLimit(array $args = [])
 * @phpstan-method \Aws\Result createLimit(array{
 *     farmId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     amountRequirementName?: string,
 *     maxCount?: int,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLimitAsync(array{
 *     farmId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     amountRequirementName?: string,
 *     maxCount?: int,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMonitor(array $args = [])
 * @phpstan-method \Aws\Result createMonitor(array{
 *     clientToken?: string,
 *     displayName?: string,
 *     identityCenterInstanceArn?: string,
 *     identityCenterRegion?: string,
 *     subdomain?: string,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMonitorAsync(array{
 *     clientToken?: string,
 *     displayName?: string,
 *     identityCenterInstanceArn?: string,
 *     identityCenterRegion?: string,
 *     subdomain?: string,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQueue(array $args = [])
 * @phpstan-method \Aws\Result createQueue(array{
 *     farmId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     defaultBudgetAction?: 'NONE'|'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *     jobAttachmentSettings?: array{s3BucketName?: string, rootPrefix?: string, ...},
 *     roleArn?: string,
 *     jobRunAsUser?: array{
 *         posix?: array{user?: string, group?: string, ...},
 *         windows?: array{user?: string, passwordArn?: string, ...},
 *         runAs?: 'QUEUE_CONFIGURED_USER'|'WORKER_AGENT_USER',
 *         ...,
 *     },
 *     requiredFileSystemLocationNames?: list<string>,
 *     allowedStorageProfileIds?: list<string>,
 *     tags?: array<string, string>,
 *     schedulingConfiguration?: array{
 *         priorityFifo?: array,
 *         priorityBalanced?: array{renderingTaskBuffer?: int, ...},
 *         weightedBalanced?: array{
 *             priorityWeight?: float,
 *             errorWeight?: float,
 *             submissionTimeWeight?: float,
 *             renderingTaskWeight?: float,
 *             renderingTaskBuffer?: int,
 *             maxPriorityOverride?: array,
 *             minPriorityOverride?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueueAsync(array{
 *     farmId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     defaultBudgetAction?: 'NONE'|'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *     jobAttachmentSettings?: array{s3BucketName?: string, rootPrefix?: string, ...},
 *     roleArn?: string,
 *     jobRunAsUser?: array{
 *         posix?: array{user?: string, group?: string, ...},
 *         windows?: array{user?: string, passwordArn?: string, ...},
 *         runAs?: 'QUEUE_CONFIGURED_USER'|'WORKER_AGENT_USER',
 *         ...,
 *     },
 *     requiredFileSystemLocationNames?: list<string>,
 *     allowedStorageProfileIds?: list<string>,
 *     tags?: array<string, string>,
 *     schedulingConfiguration?: array{
 *         priorityFifo?: array,
 *         priorityBalanced?: array{renderingTaskBuffer?: int, ...},
 *         weightedBalanced?: array{
 *             priorityWeight?: float,
 *             errorWeight?: float,
 *             submissionTimeWeight?: float,
 *             renderingTaskWeight?: float,
 *             renderingTaskBuffer?: int,
 *             maxPriorityOverride?: array,
 *             minPriorityOverride?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQueueEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createQueueEnvironment(array{
 *     farmId?: string,
 *     queueId?: string,
 *     clientToken?: string,
 *     priority?: int,
 *     templateType?: 'JSON'|'YAML',
 *     template?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueueEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueueEnvironmentAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     clientToken?: string,
 *     priority?: int,
 *     templateType?: 'JSON'|'YAML',
 *     template?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQueueFleetAssociation(array $args = [])
 * @phpstan-method \Aws\Result createQueueFleetAssociation(array{farmId?: string, queueId?: string, fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueueFleetAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueueFleetAssociationAsync(array{farmId?: string, queueId?: string, fleetId?: string, ...} $args = [])
 * @method \Aws\Result createQueueLimitAssociation(array $args = [])
 * @phpstan-method \Aws\Result createQueueLimitAssociation(array{farmId?: string, queueId?: string, limitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueueLimitAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueueLimitAssociationAsync(array{farmId?: string, queueId?: string, limitId?: string, ...} $args = [])
 * @method \Aws\Result createStorageProfile(array $args = [])
 * @phpstan-method \Aws\Result createStorageProfile(array{
 *     farmId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     osFamily?: 'LINUX'|'MACOS'|'WINDOWS',
 *     fileSystemLocations?: list<array{name?: string, path?: string, type?: 'LOCAL'|'SHARED', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStorageProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStorageProfileAsync(array{
 *     farmId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     osFamily?: 'LINUX'|'MACOS'|'WINDOWS',
 *     fileSystemLocations?: list<array{name?: string, path?: string, type?: 'LOCAL'|'SHARED', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorker(array $args = [])
 * @phpstan-method \Aws\Result createWorker(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     hostProperties?: array{
 *         ipAddresses?: array{ipV4Addresses?: list<string>, ipV6Addresses?: list<string>, ...},
 *         hostName?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkerAsync(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     hostProperties?: array{
 *         ipAddresses?: array{ipV4Addresses?: list<string>, ipV6Addresses?: list<string>, ...},
 *         hostName?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBudget(array $args = [])
 * @phpstan-method \Aws\Result deleteBudget(array{farmId?: string, budgetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBudgetAsync(array{farmId?: string, budgetId?: string, ...} $args = [])
 * @method \Aws\Result deleteFarm(array $args = [])
 * @phpstan-method \Aws\Result deleteFarm(array{farmId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFarmAsync(array{farmId?: string, ...} $args = [])
 * @method \Aws\Result deleteFleet(array $args = [])
 * @phpstan-method \Aws\Result deleteFleet(array{farmId?: string, fleetId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetAsync(array{farmId?: string, fleetId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteLicenseEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteLicenseEndpoint(array{licenseEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLicenseEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLicenseEndpointAsync(array{licenseEndpointId?: string, ...} $args = [])
 * @method \Aws\Result deleteLimit(array $args = [])
 * @phpstan-method \Aws\Result deleteLimit(array{farmId?: string, limitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLimitAsync(array{farmId?: string, limitId?: string, ...} $args = [])
 * @method \Aws\Result deleteMeteredProduct(array $args = [])
 * @phpstan-method \Aws\Result deleteMeteredProduct(array{licenseEndpointId?: string, productId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMeteredProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMeteredProductAsync(array{licenseEndpointId?: string, productId?: string, ...} $args = [])
 * @method \Aws\Result deleteMonitor(array $args = [])
 * @phpstan-method \Aws\Result deleteMonitor(array{monitorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array{monitorId?: string, ...} $args = [])
 * @method \Aws\Result deleteQueue(array $args = [])
 * @phpstan-method \Aws\Result deleteQueue(array{farmId?: string, queueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueueAsync(array{farmId?: string, queueId?: string, ...} $args = [])
 * @method \Aws\Result deleteQueueEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteQueueEnvironment(array{farmId?: string, queueId?: string, queueEnvironmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueueEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueueEnvironmentAsync(array{farmId?: string, queueId?: string, queueEnvironmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteQueueFleetAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteQueueFleetAssociation(array{farmId?: string, queueId?: string, fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueueFleetAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueueFleetAssociationAsync(array{farmId?: string, queueId?: string, fleetId?: string, ...} $args = [])
 * @method \Aws\Result deleteQueueLimitAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteQueueLimitAssociation(array{farmId?: string, queueId?: string, limitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueueLimitAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueueLimitAssociationAsync(array{farmId?: string, queueId?: string, limitId?: string, ...} $args = [])
 * @method \Aws\Result deleteStorageProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteStorageProfile(array{farmId?: string, storageProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStorageProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStorageProfileAsync(array{farmId?: string, storageProfileId?: string, ...} $args = [])
 * @method \Aws\Result deleteVolume(array $args = [])
 * @phpstan-method \Aws\Result deleteVolume(array{farmId?: string, fleetId?: string, volumeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVolumeAsync(array{farmId?: string, fleetId?: string, volumeId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorker(array $args = [])
 * @phpstan-method \Aws\Result deleteWorker(array{farmId?: string, fleetId?: string, workerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkerAsync(array{farmId?: string, fleetId?: string, workerId?: string, ...} $args = [])
 * @method \Aws\Result disassociateMemberFromFarm(array $args = [])
 * @phpstan-method \Aws\Result disassociateMemberFromFarm(array{farmId?: string, principalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMemberFromFarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMemberFromFarmAsync(array{farmId?: string, principalId?: string, ...} $args = [])
 * @method \Aws\Result disassociateMemberFromFleet(array $args = [])
 * @phpstan-method \Aws\Result disassociateMemberFromFleet(array{farmId?: string, fleetId?: string, principalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMemberFromFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMemberFromFleetAsync(array{farmId?: string, fleetId?: string, principalId?: string, ...} $args = [])
 * @method \Aws\Result disassociateMemberFromJob(array $args = [])
 * @phpstan-method \Aws\Result disassociateMemberFromJob(array{farmId?: string, queueId?: string, jobId?: string, principalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMemberFromJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMemberFromJobAsync(array{farmId?: string, queueId?: string, jobId?: string, principalId?: string, ...} $args = [])
 * @method \Aws\Result disassociateMemberFromQueue(array $args = [])
 * @phpstan-method \Aws\Result disassociateMemberFromQueue(array{farmId?: string, queueId?: string, principalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMemberFromQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMemberFromQueueAsync(array{farmId?: string, queueId?: string, principalId?: string, ...} $args = [])
 * @method \Aws\Result getBudget(array $args = [])
 * @phpstan-method \Aws\Result getBudget(array{farmId?: string, budgetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBudgetAsync(array{farmId?: string, budgetId?: string, ...} $args = [])
 * @method \Aws\Result getFarm(array $args = [])
 * @phpstan-method \Aws\Result getFarm(array{farmId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFarmAsync(array{farmId?: string, ...} $args = [])
 * @method \Aws\Result getFleet(array $args = [])
 * @phpstan-method \Aws\Result getFleet(array{farmId?: string, fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFleetAsync(array{farmId?: string, fleetId?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{farmId?: string, queueId?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{farmId?: string, queueId?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result getLicenseEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getLicenseEndpoint(array{licenseEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLicenseEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLicenseEndpointAsync(array{licenseEndpointId?: string, ...} $args = [])
 * @method \Aws\Result getLimit(array $args = [])
 * @phpstan-method \Aws\Result getLimit(array{farmId?: string, limitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLimitAsync(array{farmId?: string, limitId?: string, ...} $args = [])
 * @method \Aws\Result getMonitor(array $args = [])
 * @phpstan-method \Aws\Result getMonitor(array{monitorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMonitorAsync(array{monitorId?: string, ...} $args = [])
 * @method \Aws\Result getMonitorSettings(array $args = [])
 * @phpstan-method \Aws\Result getMonitorSettings(array{monitorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMonitorSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMonitorSettingsAsync(array{monitorId?: string, ...} $args = [])
 * @method \Aws\Result getQueue(array $args = [])
 * @phpstan-method \Aws\Result getQueue(array{farmId?: string, queueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueueAsync(array{farmId?: string, queueId?: string, ...} $args = [])
 * @method \Aws\Result getQueueEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getQueueEnvironment(array{farmId?: string, queueId?: string, queueEnvironmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueueEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueueEnvironmentAsync(array{farmId?: string, queueId?: string, queueEnvironmentId?: string, ...} $args = [])
 * @method \Aws\Result getQueueFleetAssociation(array $args = [])
 * @phpstan-method \Aws\Result getQueueFleetAssociation(array{farmId?: string, queueId?: string, fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueueFleetAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueueFleetAssociationAsync(array{farmId?: string, queueId?: string, fleetId?: string, ...} $args = [])
 * @method \Aws\Result getQueueLimitAssociation(array $args = [])
 * @phpstan-method \Aws\Result getQueueLimitAssociation(array{farmId?: string, queueId?: string, limitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueueLimitAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueueLimitAssociationAsync(array{farmId?: string, queueId?: string, limitId?: string, ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{farmId?: string, queueId?: string, jobId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{farmId?: string, queueId?: string, jobId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getSessionAction(array $args = [])
 * @phpstan-method \Aws\Result getSessionAction(array{farmId?: string, queueId?: string, jobId?: string, sessionActionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionActionAsync(array{farmId?: string, queueId?: string, jobId?: string, sessionActionId?: string, ...} $args = [])
 * @method \Aws\Result getSessionsStatisticsAggregation(array $args = [])
 * @phpstan-method \Aws\Result getSessionsStatisticsAggregation(array{farmId?: string, nextToken?: string, maxResults?: int, aggregationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionsStatisticsAggregationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionsStatisticsAggregationAsync(array{farmId?: string, nextToken?: string, maxResults?: int, aggregationId?: string, ...} $args = [])
 * @method \Aws\Result getStep(array $args = [])
 * @phpstan-method \Aws\Result getStep(array{farmId?: string, queueId?: string, jobId?: string, stepId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStepAsync(array{farmId?: string, queueId?: string, jobId?: string, stepId?: string, ...} $args = [])
 * @method \Aws\Result getStorageProfile(array $args = [])
 * @phpstan-method \Aws\Result getStorageProfile(array{farmId?: string, storageProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStorageProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStorageProfileAsync(array{farmId?: string, storageProfileId?: string, ...} $args = [])
 * @method \Aws\Result getStorageProfileForQueue(array $args = [])
 * @phpstan-method \Aws\Result getStorageProfileForQueue(array{farmId?: string, queueId?: string, storageProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStorageProfileForQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStorageProfileForQueueAsync(array{farmId?: string, queueId?: string, storageProfileId?: string, ...} $args = [])
 * @method \Aws\Result getTask(array $args = [])
 * @phpstan-method \Aws\Result getTask(array{farmId?: string, queueId?: string, jobId?: string, stepId?: string, taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTaskAsync(array{farmId?: string, queueId?: string, jobId?: string, stepId?: string, taskId?: string, ...} $args = [])
 * @method \Aws\Result getVolume(array $args = [])
 * @phpstan-method \Aws\Result getVolume(array{farmId?: string, fleetId?: string, volumeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVolumeAsync(array{farmId?: string, fleetId?: string, volumeId?: string, ...} $args = [])
 * @method \Aws\Result getWorker(array $args = [])
 * @phpstan-method \Aws\Result getWorker(array{farmId?: string, fleetId?: string, workerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkerAsync(array{farmId?: string, fleetId?: string, workerId?: string, ...} $args = [])
 * @method \Aws\Result listAvailableMeteredProducts(array $args = [])
 * @phpstan-method \Aws\Result listAvailableMeteredProducts(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableMeteredProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableMeteredProductsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBudgets(array $args = [])
 * @phpstan-method \Aws\Result listBudgets(array{farmId?: string, nextToken?: string, maxResults?: int, status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBudgetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBudgetsAsync(array{farmId?: string, nextToken?: string, maxResults?: int, status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \Aws\Result listFarmMembers(array $args = [])
 * @phpstan-method \Aws\Result listFarmMembers(array{farmId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFarmMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFarmMembersAsync(array{farmId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listFarms(array $args = [])
 * @phpstan-method \Aws\Result listFarms(array{nextToken?: string, maxResults?: int, principalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFarmsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFarmsAsync(array{nextToken?: string, maxResults?: int, principalId?: string, ...} $args = [])
 * @method \Aws\Result listFleetMembers(array $args = [])
 * @phpstan-method \Aws\Result listFleetMembers(array{farmId?: string, fleetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFleetMembersAsync(array{farmId?: string, fleetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listFleets(array $args = [])
 * @phpstan-method \Aws\Result listFleets(array{
 *     farmId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     principalId?: string,
 *     displayName?: string,
 *     status?: 'ACTIVE'|'CREATE_FAILED'|'CREATE_IN_PROGRESS'|'SUSPENDED'|'UPDATE_FAILED'|'UPDATE_IN_PROGRESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFleetsAsync(array{
 *     farmId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     principalId?: string,
 *     displayName?: string,
 *     status?: 'ACTIVE'|'CREATE_FAILED'|'CREATE_IN_PROGRESS'|'SUSPENDED'|'UPDATE_FAILED'|'UPDATE_IN_PROGRESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobMembers(array $args = [])
 * @phpstan-method \Aws\Result listJobMembers(array{farmId?: string, queueId?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobMembersAsync(array{farmId?: string, queueId?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listJobParameterDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listJobParameterDefinitions(array{farmId?: string, queueId?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobParameterDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobParameterDefinitionsAsync(array{farmId?: string, queueId?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{farmId?: string, queueId?: string, nextToken?: string, maxResults?: int, principalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{farmId?: string, queueId?: string, nextToken?: string, maxResults?: int, principalId?: string, ...} $args = [])
 * @method \Aws\Result listLicenseEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listLicenseEndpoints(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLicenseEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLicenseEndpointsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listLimits(array $args = [])
 * @phpstan-method \Aws\Result listLimits(array{farmId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLimitsAsync(array{farmId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listMeteredProducts(array $args = [])
 * @phpstan-method \Aws\Result listMeteredProducts(array{licenseEndpointId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMeteredProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMeteredProductsAsync(array{licenseEndpointId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listMonitors(array $args = [])
 * @phpstan-method \Aws\Result listMonitors(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitorsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueueEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listQueueEnvironments(array{farmId?: string, queueId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueueEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueueEnvironmentsAsync(array{farmId?: string, queueId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueueFleetAssociations(array $args = [])
 * @phpstan-method \Aws\Result listQueueFleetAssociations(array{farmId?: string, nextToken?: string, maxResults?: int, queueId?: string, fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueueFleetAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueueFleetAssociationsAsync(array{farmId?: string, nextToken?: string, maxResults?: int, queueId?: string, fleetId?: string, ...} $args = [])
 * @method \Aws\Result listQueueLimitAssociations(array $args = [])
 * @phpstan-method \Aws\Result listQueueLimitAssociations(array{farmId?: string, nextToken?: string, maxResults?: int, queueId?: string, limitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueueLimitAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueueLimitAssociationsAsync(array{farmId?: string, nextToken?: string, maxResults?: int, queueId?: string, limitId?: string, ...} $args = [])
 * @method \Aws\Result listQueueMembers(array $args = [])
 * @phpstan-method \Aws\Result listQueueMembers(array{farmId?: string, queueId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueueMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueueMembersAsync(array{farmId?: string, queueId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueues(array $args = [])
 * @phpstan-method \Aws\Result listQueues(array{
 *     farmId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     principalId?: string,
 *     status?: 'IDLE'|'SCHEDULING'|'SCHEDULING_BLOCKED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueuesAsync(array{
 *     farmId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     principalId?: string,
 *     status?: 'IDLE'|'SCHEDULING'|'SCHEDULING_BLOCKED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSessionActions(array $args = [])
 * @phpstan-method \Aws\Result listSessionActions(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sessionId?: string,
 *     taskId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionActionsAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sessionId?: string,
 *     taskId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{farmId?: string, queueId?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{farmId?: string, queueId?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSessionsForWorker(array $args = [])
 * @phpstan-method \Aws\Result listSessionsForWorker(array{farmId?: string, fleetId?: string, workerId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsForWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsForWorkerAsync(array{farmId?: string, fleetId?: string, workerId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStepConsumers(array $args = [])
 * @phpstan-method \Aws\Result listStepConsumers(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStepConsumersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStepConsumersAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStepDependencies(array $args = [])
 * @phpstan-method \Aws\Result listStepDependencies(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStepDependenciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStepDependenciesAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSteps(array $args = [])
 * @phpstan-method \Aws\Result listSteps(array{farmId?: string, queueId?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStepsAsync(array{farmId?: string, queueId?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStorageProfiles(array $args = [])
 * @phpstan-method \Aws\Result listStorageProfiles(array{farmId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStorageProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStorageProfilesAsync(array{farmId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStorageProfilesForQueue(array $args = [])
 * @phpstan-method \Aws\Result listStorageProfilesForQueue(array{farmId?: string, queueId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStorageProfilesForQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStorageProfilesForQueueAsync(array{farmId?: string, queueId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTasks(array $args = [])
 * @phpstan-method \Aws\Result listTasks(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTasksAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listVolumes(array $args = [])
 * @phpstan-method \Aws\Result listVolumes(array{farmId?: string, fleetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVolumesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVolumesAsync(array{farmId?: string, fleetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listWorkers(array $args = [])
 * @phpstan-method \Aws\Result listWorkers(array{farmId?: string, fleetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkersAsync(array{farmId?: string, fleetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putMeteredProduct(array $args = [])
 * @phpstan-method \Aws\Result putMeteredProduct(array{licenseEndpointId?: string, productId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putMeteredProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMeteredProductAsync(array{licenseEndpointId?: string, productId?: string, ...} $args = [])
 * @method \Aws\Result searchJobs(array $args = [])
 * @phpstan-method \Aws\Result searchJobs(array{
 *     farmId?: string,
 *     filterExpressions?: array{filters?: list<array>, operator?: 'AND'|'OR', ...},
 *     sortExpressions?: list<array{userJobsFirst?: array, fieldSort?: array, parameterSort?: array, ...}>,
 *     itemOffset?: int,
 *     pageSize?: int,
 *     queueIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchJobsAsync(array{
 *     farmId?: string,
 *     filterExpressions?: array{filters?: list<array>, operator?: 'AND'|'OR', ...},
 *     sortExpressions?: list<array{userJobsFirst?: array, fieldSort?: array, parameterSort?: array, ...}>,
 *     itemOffset?: int,
 *     pageSize?: int,
 *     queueIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchSteps(array $args = [])
 * @phpstan-method \Aws\Result searchSteps(array{
 *     farmId?: string,
 *     filterExpressions?: array{filters?: list<array>, operator?: 'AND'|'OR', ...},
 *     sortExpressions?: list<array{userJobsFirst?: array, fieldSort?: array, parameterSort?: array, ...}>,
 *     itemOffset?: int,
 *     pageSize?: int,
 *     queueIds?: list<string>,
 *     jobId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchStepsAsync(array{
 *     farmId?: string,
 *     filterExpressions?: array{filters?: list<array>, operator?: 'AND'|'OR', ...},
 *     sortExpressions?: list<array{userJobsFirst?: array, fieldSort?: array, parameterSort?: array, ...}>,
 *     itemOffset?: int,
 *     pageSize?: int,
 *     queueIds?: list<string>,
 *     jobId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchTasks(array $args = [])
 * @phpstan-method \Aws\Result searchTasks(array{
 *     farmId?: string,
 *     filterExpressions?: array{filters?: list<array>, operator?: 'AND'|'OR', ...},
 *     sortExpressions?: list<array{userJobsFirst?: array, fieldSort?: array, parameterSort?: array, ...}>,
 *     itemOffset?: int,
 *     pageSize?: int,
 *     queueIds?: list<string>,
 *     jobId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchTasksAsync(array{
 *     farmId?: string,
 *     filterExpressions?: array{filters?: list<array>, operator?: 'AND'|'OR', ...},
 *     sortExpressions?: list<array{userJobsFirst?: array, fieldSort?: array, parameterSort?: array, ...}>,
 *     itemOffset?: int,
 *     pageSize?: int,
 *     queueIds?: list<string>,
 *     jobId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchWorkers(array $args = [])
 * @phpstan-method \Aws\Result searchWorkers(array{
 *     farmId?: string,
 *     filterExpressions?: array{filters?: list<array>, operator?: 'AND'|'OR', ...},
 *     sortExpressions?: list<array{userJobsFirst?: array, fieldSort?: array, parameterSort?: array, ...}>,
 *     itemOffset?: int,
 *     pageSize?: int,
 *     fleetIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchWorkersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchWorkersAsync(array{
 *     farmId?: string,
 *     filterExpressions?: array{filters?: list<array>, operator?: 'AND'|'OR', ...},
 *     sortExpressions?: list<array{userJobsFirst?: array, fieldSort?: array, parameterSort?: array, ...}>,
 *     itemOffset?: int,
 *     pageSize?: int,
 *     fleetIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSessionsStatisticsAggregation(array $args = [])
 * @phpstan-method \Aws\Result startSessionsStatisticsAggregation(array{
 *     farmId?: string,
 *     resourceIds?: array{queueIds?: list<string>, fleetIds?: list<string>, ...},
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     timezone?: string,
 *     period?: 'DAILY'|'HOURLY'|'MONTHLY'|'WEEKLY',
 *     groupBy?: list<'FLEET_ID'|'INSTANCE_TYPE'|'JOB_ID'|'LICENSE_PRODUCT'|'QUEUE_ID'|'USAGE_TYPE'|'USER_ID'>,
 *     statistics?: list<'AVG'|'MAX'|'MIN'|'SUM'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSessionsStatisticsAggregationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSessionsStatisticsAggregationAsync(array{
 *     farmId?: string,
 *     resourceIds?: array{queueIds?: list<string>, fleetIds?: list<string>, ...},
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     timezone?: string,
 *     period?: 'DAILY'|'HOURLY'|'MONTHLY'|'WEEKLY',
 *     groupBy?: list<'FLEET_ID'|'INSTANCE_TYPE'|'JOB_ID'|'LICENSE_PRODUCT'|'QUEUE_ID'|'USAGE_TYPE'|'USER_ID'>,
 *     statistics?: list<'AVG'|'MAX'|'MIN'|'SUM'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBudget(array $args = [])
 * @phpstan-method \Aws\Result updateBudget(array{
 *     farmId?: string,
 *     budgetId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     status?: 'ACTIVE'|'INACTIVE',
 *     approximateDollarLimit?: float,
 *     actionsToAdd?: list<array{
 *         type?: 'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *         thresholdPercentage?: float,
 *         description?: string,
 *         ...,
 *     }>,
 *     actionsToRemove?: list<array{
 *         type?: 'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *         thresholdPercentage?: float,
 *         ...,
 *     }>,
 *     schedule?: array{
 *         fixed?: array{startTime?: int|string|\DateTimeInterface, endTime?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBudgetAsync(array{
 *     farmId?: string,
 *     budgetId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     status?: 'ACTIVE'|'INACTIVE',
 *     approximateDollarLimit?: float,
 *     actionsToAdd?: list<array{
 *         type?: 'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *         thresholdPercentage?: float,
 *         description?: string,
 *         ...,
 *     }>,
 *     actionsToRemove?: list<array{
 *         type?: 'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *         thresholdPercentage?: float,
 *         ...,
 *     }>,
 *     schedule?: array{
 *         fixed?: array{startTime?: int|string|\DateTimeInterface, endTime?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFarm(array $args = [])
 * @phpstan-method \Aws\Result updateFarm(array{farmId?: string, displayName?: string, description?: string, costScaleFactor?: float, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFarmAsync(array{farmId?: string, displayName?: string, description?: string, costScaleFactor?: float, ...} $args = [])
 * @method \Aws\Result updateFleet(array $args = [])
 * @phpstan-method \Aws\Result updateFleet(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     minWorkerCount?: int,
 *     maxWorkerCount?: int,
 *     configuration?: array{
 *         customerManaged?: array{
 *             mode?: 'EVENT_BASED_AUTO_SCALING'|'NO_SCALING',
 *             autoScalingConfiguration?: array,
 *             workerCapabilities?: array,
 *             storageProfileId?: string,
 *             tagPropagationMode?: 'NO_PROPAGATION'|'PROPAGATE_TAGS_TO_WORKERS_AT_LAUNCH',
 *             ...,
 *         },
 *         serviceManagedEc2?: array{
 *             instanceCapabilities?: array,
 *             instanceMarketOptions?: array,
 *             vpcConfiguration?: array,
 *             storageProfileId?: string,
 *             persistentVolumeConfiguration?: array,
 *             autoScalingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     hostConfiguration?: array{scriptBody?: string, scriptTimeoutSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFleetAsync(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     minWorkerCount?: int,
 *     maxWorkerCount?: int,
 *     configuration?: array{
 *         customerManaged?: array{
 *             mode?: 'EVENT_BASED_AUTO_SCALING'|'NO_SCALING',
 *             autoScalingConfiguration?: array,
 *             workerCapabilities?: array,
 *             storageProfileId?: string,
 *             tagPropagationMode?: 'NO_PROPAGATION'|'PROPAGATE_TAGS_TO_WORKERS_AT_LAUNCH',
 *             ...,
 *         },
 *         serviceManagedEc2?: array{
 *             instanceCapabilities?: array,
 *             instanceMarketOptions?: array,
 *             vpcConfiguration?: array,
 *             storageProfileId?: string,
 *             persistentVolumeConfiguration?: array,
 *             autoScalingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     hostConfiguration?: array{scriptBody?: string, scriptTimeoutSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateJob(array $args = [])
 * @phpstan-method \Aws\Result updateJob(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     clientToken?: string,
 *     targetTaskRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *     priority?: int,
 *     maxFailedTasksCount?: int,
 *     maxRetriesPerTask?: int,
 *     lifecycleStatus?: 'ARCHIVED',
 *     maxWorkerCount?: int,
 *     name?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     clientToken?: string,
 *     targetTaskRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *     priority?: int,
 *     maxFailedTasksCount?: int,
 *     maxRetriesPerTask?: int,
 *     lifecycleStatus?: 'ARCHIVED',
 *     maxWorkerCount?: int,
 *     name?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLimit(array $args = [])
 * @phpstan-method \Aws\Result updateLimit(array{farmId?: string, limitId?: string, displayName?: string, description?: string, maxCount?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLimitAsync(array{farmId?: string, limitId?: string, displayName?: string, description?: string, maxCount?: int, ...} $args = [])
 * @method \Aws\Result updateMonitor(array $args = [])
 * @phpstan-method \Aws\Result updateMonitor(array{monitorId?: string, subdomain?: string, displayName?: string, roleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMonitorAsync(array{monitorId?: string, subdomain?: string, displayName?: string, roleArn?: string, ...} $args = [])
 * @method \Aws\Result updateMonitorSettings(array $args = [])
 * @phpstan-method \Aws\Result updateMonitorSettings(array{monitorId?: string, settings?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMonitorSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMonitorSettingsAsync(array{monitorId?: string, settings?: array<string, string>, ...} $args = [])
 * @method \Aws\Result updateQueue(array $args = [])
 * @phpstan-method \Aws\Result updateQueue(array{
 *     farmId?: string,
 *     queueId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     defaultBudgetAction?: 'NONE'|'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *     jobAttachmentSettings?: array{s3BucketName?: string, rootPrefix?: string, ...},
 *     roleArn?: string,
 *     jobRunAsUser?: array{
 *         posix?: array{user?: string, group?: string, ...},
 *         windows?: array{user?: string, passwordArn?: string, ...},
 *         runAs?: 'QUEUE_CONFIGURED_USER'|'WORKER_AGENT_USER',
 *         ...,
 *     },
 *     requiredFileSystemLocationNamesToAdd?: list<string>,
 *     requiredFileSystemLocationNamesToRemove?: list<string>,
 *     allowedStorageProfileIdsToAdd?: list<string>,
 *     allowedStorageProfileIdsToRemove?: list<string>,
 *     schedulingConfiguration?: array{
 *         priorityFifo?: array,
 *         priorityBalanced?: array{renderingTaskBuffer?: int, ...},
 *         weightedBalanced?: array{
 *             priorityWeight?: float,
 *             errorWeight?: float,
 *             submissionTimeWeight?: float,
 *             renderingTaskWeight?: float,
 *             renderingTaskBuffer?: int,
 *             maxPriorityOverride?: array,
 *             minPriorityOverride?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     description?: string,
 *     defaultBudgetAction?: 'NONE'|'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *     jobAttachmentSettings?: array{s3BucketName?: string, rootPrefix?: string, ...},
 *     roleArn?: string,
 *     jobRunAsUser?: array{
 *         posix?: array{user?: string, group?: string, ...},
 *         windows?: array{user?: string, passwordArn?: string, ...},
 *         runAs?: 'QUEUE_CONFIGURED_USER'|'WORKER_AGENT_USER',
 *         ...,
 *     },
 *     requiredFileSystemLocationNamesToAdd?: list<string>,
 *     requiredFileSystemLocationNamesToRemove?: list<string>,
 *     allowedStorageProfileIdsToAdd?: list<string>,
 *     allowedStorageProfileIdsToRemove?: list<string>,
 *     schedulingConfiguration?: array{
 *         priorityFifo?: array,
 *         priorityBalanced?: array{renderingTaskBuffer?: int, ...},
 *         weightedBalanced?: array{
 *             priorityWeight?: float,
 *             errorWeight?: float,
 *             submissionTimeWeight?: float,
 *             renderingTaskWeight?: float,
 *             renderingTaskBuffer?: int,
 *             maxPriorityOverride?: array,
 *             minPriorityOverride?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQueueEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateQueueEnvironment(array{
 *     farmId?: string,
 *     queueId?: string,
 *     queueEnvironmentId?: string,
 *     clientToken?: string,
 *     priority?: int,
 *     templateType?: 'JSON'|'YAML',
 *     template?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueEnvironmentAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     queueEnvironmentId?: string,
 *     clientToken?: string,
 *     priority?: int,
 *     templateType?: 'JSON'|'YAML',
 *     template?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQueueFleetAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateQueueFleetAssociation(array{
 *     farmId?: string,
 *     queueId?: string,
 *     fleetId?: string,
 *     status?: 'ACTIVE'|'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueFleetAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueFleetAssociationAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     fleetId?: string,
 *     status?: 'ACTIVE'|'STOP_SCHEDULING_AND_CANCEL_TASKS'|'STOP_SCHEDULING_AND_COMPLETE_TASKS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQueueLimitAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateQueueLimitAssociation(array{
 *     farmId?: string,
 *     queueId?: string,
 *     limitId?: string,
 *     status?: 'ACTIVE'|'STOP_LIMIT_USAGE_AND_CANCEL_TASKS'|'STOP_LIMIT_USAGE_AND_COMPLETE_TASKS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueLimitAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueLimitAssociationAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     limitId?: string,
 *     status?: 'ACTIVE'|'STOP_LIMIT_USAGE_AND_CANCEL_TASKS'|'STOP_LIMIT_USAGE_AND_COMPLETE_TASKS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSession(array $args = [])
 * @phpstan-method \Aws\Result updateSession(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     sessionId?: string,
 *     clientToken?: string,
 *     targetLifecycleStatus?: 'ENDED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSessionAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     sessionId?: string,
 *     clientToken?: string,
 *     targetLifecycleStatus?: 'ENDED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStep(array $args = [])
 * @phpstan-method \Aws\Result updateStep(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     clientToken?: string,
 *     targetTaskRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStepAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     clientToken?: string,
 *     targetTaskRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStorageProfile(array $args = [])
 * @phpstan-method \Aws\Result updateStorageProfile(array{
 *     farmId?: string,
 *     storageProfileId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     osFamily?: 'LINUX'|'MACOS'|'WINDOWS',
 *     fileSystemLocationsToAdd?: list<array{name?: string, path?: string, type?: 'LOCAL'|'SHARED', ...}>,
 *     fileSystemLocationsToRemove?: list<array{name?: string, path?: string, type?: 'LOCAL'|'SHARED', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStorageProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStorageProfileAsync(array{
 *     farmId?: string,
 *     storageProfileId?: string,
 *     clientToken?: string,
 *     displayName?: string,
 *     osFamily?: 'LINUX'|'MACOS'|'WINDOWS',
 *     fileSystemLocationsToAdd?: list<array{name?: string, path?: string, type?: 'LOCAL'|'SHARED', ...}>,
 *     fileSystemLocationsToRemove?: list<array{name?: string, path?: string, type?: 'LOCAL'|'SHARED', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTask(array $args = [])
 * @phpstan-method \Aws\Result updateTask(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     taskId?: string,
 *     clientToken?: string,
 *     targetRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTaskAsync(array{
 *     farmId?: string,
 *     queueId?: string,
 *     jobId?: string,
 *     stepId?: string,
 *     taskId?: string,
 *     clientToken?: string,
 *     targetRunStatus?: 'CANCELED'|'FAILED'|'PENDING'|'READY'|'SUCCEEDED'|'SUSPENDED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorker(array $args = [])
 * @phpstan-method \Aws\Result updateWorker(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     workerId?: string,
 *     status?: 'STARTED'|'STOPPED'|'STOPPING',
 *     capabilities?: array{amounts?: list<array>, attributes?: list<array>, ...},
 *     hostProperties?: array{
 *         ipAddresses?: array{ipV4Addresses?: list<string>, ipV6Addresses?: list<string>, ...},
 *         hostName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkerAsync(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     workerId?: string,
 *     status?: 'STARTED'|'STOPPED'|'STOPPING',
 *     capabilities?: array{amounts?: list<array>, attributes?: list<array>, ...},
 *     hostProperties?: array{
 *         ipAddresses?: array{ipV4Addresses?: list<string>, ipV6Addresses?: list<string>, ...},
 *         hostName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkerSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateWorkerSchedule(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     workerId?: string,
 *     updatedSessionActions?: array<string, array{
 *         completedStatus?: 'CANCELED'|'FAILED'|'INTERRUPTED'|'NEVER_ATTEMPTED'|'SUCCEEDED',
 *         processExitCode?: int,
 *         progressMessage?: string,
 *         startedAt?: int|string|\DateTimeInterface,
 *         endedAt?: int|string|\DateTimeInterface,
 *         updatedAt?: int|string|\DateTimeInterface,
 *         progressPercent?: float,
 *         manifests?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkerScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkerScheduleAsync(array{
 *     farmId?: string,
 *     fleetId?: string,
 *     workerId?: string,
 *     updatedSessionActions?: array<string, array{
 *         completedStatus?: 'CANCELED'|'FAILED'|'INTERRUPTED'|'NEVER_ATTEMPTED'|'SUCCEEDED',
 *         processExitCode?: int,
 *         progressMessage?: string,
 *         startedAt?: int|string|\DateTimeInterface,
 *         endedAt?: int|string|\DateTimeInterface,
 *         updatedAt?: int|string|\DateTimeInterface,
 *         progressPercent?: float,
 *         manifests?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class DeadlineClient extends AwsClient {}
