<?php
namespace Aws\EMRServerless;

use Aws\AwsClient;

/**
 * This client is used to interact with the **EMR Serverless** service.
 * @method \Aws\Result cancelJobRun(array $args = [])
 * @phpstan-method \Aws\Result cancelJobRun(array{applicationId?: string, jobRunId?: string, shutdownGracePeriodInSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobRunAsync(array{applicationId?: string, jobRunId?: string, shutdownGracePeriodInSeconds?: int, ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     name?: string,
 *     releaseLabel?: string,
 *     type?: string,
 *     clientToken?: string,
 *     initialCapacity?: array<string, array{workerCount?: int, workerConfiguration?: array, ...}>,
 *     maximumCapacity?: array{cpu?: string, memory?: string, disk?: string, ...},
 *     tags?: array<string, string>,
 *     autoStartConfiguration?: array{enabled?: bool, ...},
 *     autoStopConfiguration?: array{enabled?: bool, idleTimeoutMinutes?: int, ...},
 *     networkConfiguration?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     architecture?: 'ARM64'|'X86_64',
 *     imageConfiguration?: array{imageUri?: string, applicationLevelDigestResolution?: bool, ...},
 *     workerTypeSpecifications?: array<string, array{imageConfiguration?: array, ...}>,
 *     runtimeConfiguration?: list<array{classification?: string, properties?: array<string, string>, configurations?: list<array>, ...}>,
 *     monitoringConfiguration?: array{
 *         s3MonitoringConfiguration?: array{logUri?: string, encryptionKeyArn?: string, ...},
 *         managedPersistenceMonitoringConfiguration?: array{enabled?: bool, encryptionKeyArn?: string, ...},
 *         cloudWatchLoggingConfiguration?: array{
 *             enabled?: bool,
 *             logGroupName?: string,
 *             logStreamNamePrefix?: string,
 *             encryptionKeyArn?: string,
 *             logTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         prometheusMonitoringConfiguration?: array{remoteWriteUrl?: string, ...},
 *         ...,
 *     },
 *     diskEncryptionConfiguration?: array{encryptionContext?: array<string, string>, encryptionKeyArn?: string, ...},
 *     interactiveConfiguration?: array{studioEnabled?: bool, livyEndpointEnabled?: bool, sessionEnabled?: bool, ...},
 *     schedulerConfiguration?: array{queueTimeoutMinutes?: int, maxConcurrentRuns?: int, ...},
 *     identityCenterConfiguration?: array{identityCenterInstanceArn?: string, userBackgroundSessionsEnabled?: bool, ...},
 *     jobLevelCostAllocationConfiguration?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     name?: string,
 *     releaseLabel?: string,
 *     type?: string,
 *     clientToken?: string,
 *     initialCapacity?: array<string, array{workerCount?: int, workerConfiguration?: array, ...}>,
 *     maximumCapacity?: array{cpu?: string, memory?: string, disk?: string, ...},
 *     tags?: array<string, string>,
 *     autoStartConfiguration?: array{enabled?: bool, ...},
 *     autoStopConfiguration?: array{enabled?: bool, idleTimeoutMinutes?: int, ...},
 *     networkConfiguration?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     architecture?: 'ARM64'|'X86_64',
 *     imageConfiguration?: array{imageUri?: string, applicationLevelDigestResolution?: bool, ...},
 *     workerTypeSpecifications?: array<string, array{imageConfiguration?: array, ...}>,
 *     runtimeConfiguration?: list<array{classification?: string, properties?: array<string, string>, configurations?: list<array>, ...}>,
 *     monitoringConfiguration?: array{
 *         s3MonitoringConfiguration?: array{logUri?: string, encryptionKeyArn?: string, ...},
 *         managedPersistenceMonitoringConfiguration?: array{enabled?: bool, encryptionKeyArn?: string, ...},
 *         cloudWatchLoggingConfiguration?: array{
 *             enabled?: bool,
 *             logGroupName?: string,
 *             logStreamNamePrefix?: string,
 *             encryptionKeyArn?: string,
 *             logTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         prometheusMonitoringConfiguration?: array{remoteWriteUrl?: string, ...},
 *         ...,
 *     },
 *     diskEncryptionConfiguration?: array{encryptionContext?: array<string, string>, encryptionKeyArn?: string, ...},
 *     interactiveConfiguration?: array{studioEnabled?: bool, livyEndpointEnabled?: bool, sessionEnabled?: bool, ...},
 *     schedulerConfiguration?: array{queueTimeoutMinutes?: int, maxConcurrentRuns?: int, ...},
 *     identityCenterConfiguration?: array{identityCenterInstanceArn?: string, userBackgroundSessionsEnabled?: bool, ...},
 *     jobLevelCostAllocationConfiguration?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result getDashboardForJobRun(array $args = [])
 * @phpstan-method \Aws\Result getDashboardForJobRun(array{applicationId?: string, jobRunId?: string, attempt?: int, accessSystemProfileLogs?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDashboardForJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDashboardForJobRunAsync(array{applicationId?: string, jobRunId?: string, attempt?: int, accessSystemProfileLogs?: bool, ...} $args = [])
 * @method \Aws\Result getJobRun(array $args = [])
 * @phpstan-method \Aws\Result getJobRun(array{applicationId?: string, jobRunId?: string, attempt?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobRunAsync(array{applicationId?: string, jobRunId?: string, attempt?: int, ...} $args = [])
 * @method \Aws\Result getResourceDashboard(array $args = [])
 * @phpstan-method \Aws\Result getResourceDashboard(array{applicationId?: string, resourceId?: string, resourceType?: 'SESSION', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceDashboardAsync(array{applicationId?: string, resourceId?: string, resourceType?: 'SESSION', ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{applicationId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{applicationId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getSessionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getSessionEndpoint(array{applicationId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionEndpointAsync(array{applicationId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     states?: list<'CREATED'|'CREATING'|'STARTED'|'STARTING'|'STOPPED'|'STOPPING'|'TERMINATED'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     states?: list<'CREATED'|'CREATING'|'STARTED'|'STARTING'|'STOPPED'|'STOPPING'|'TERMINATED'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobRunAttempts(array $args = [])
 * @phpstan-method \Aws\Result listJobRunAttempts(array{applicationId?: string, jobRunId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobRunAttemptsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobRunAttemptsAsync(array{applicationId?: string, jobRunId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listJobRuns(array $args = [])
 * @phpstan-method \Aws\Result listJobRuns(array{
 *     applicationId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     createdAtAfter?: int|string|\DateTimeInterface,
 *     createdAtBefore?: int|string|\DateTimeInterface,
 *     states?: list<'CANCELLED'|'CANCELLING'|'FAILED'|'PENDING'|'QUEUED'|'RUNNING'|'SCHEDULED'|'SUBMITTED'|'SUCCESS'>,
 *     mode?: 'BATCH'|'STREAMING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobRunsAsync(array{
 *     applicationId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     createdAtAfter?: int|string|\DateTimeInterface,
 *     createdAtBefore?: int|string|\DateTimeInterface,
 *     states?: list<'CANCELLED'|'CANCELLING'|'FAILED'|'PENDING'|'QUEUED'|'RUNNING'|'SCHEDULED'|'SUBMITTED'|'SUCCESS'>,
 *     mode?: 'BATCH'|'STREAMING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{
 *     applicationId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     states?: list<'BUSY'|'FAILED'|'IDLE'|'STARTED'|'STARTING'|'SUBMITTED'|'TERMINATED'|'TERMINATING'>,
 *     createdAtAfter?: int|string|\DateTimeInterface,
 *     createdAtBefore?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{
 *     applicationId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     states?: list<'BUSY'|'FAILED'|'IDLE'|'STARTED'|'STARTING'|'SUBMITTED'|'TERMINATED'|'TERMINATING'>,
 *     createdAtAfter?: int|string|\DateTimeInterface,
 *     createdAtBefore?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startApplication(array $args = [])
 * @phpstan-method \Aws\Result startApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result startJobRun(array $args = [])
 * @phpstan-method \Aws\Result startJobRun(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     executionIamPolicy?: array{policy?: string, policyArns?: list<string>, ...},
 *     jobDriver?: array{
 *         sparkSubmit?: array{entryPoint?: string, entryPointArguments?: list<string>, sparkSubmitParameters?: string, ...},
 *         hive?: array{query?: string, initQueryFile?: string, parameters?: string, ...},
 *         ...,
 *     },
 *     configurationOverrides?: array{
 *         applicationConfiguration?: list<array>,
 *         monitoringConfiguration?: array{
 *             s3MonitoringConfiguration?: array,
 *             managedPersistenceMonitoringConfiguration?: array,
 *             cloudWatchLoggingConfiguration?: array,
 *             prometheusMonitoringConfiguration?: array,
 *             ...,
 *         },
 *         diskEncryptionConfiguration?: array{encryptionContext?: array<string, string>, encryptionKeyArn?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     executionTimeoutMinutes?: int,
 *     name?: string,
 *     mode?: 'BATCH'|'STREAMING',
 *     retryPolicy?: array{maxAttempts?: int, maxFailedAttemptsPerHour?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startJobRunAsync(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     executionIamPolicy?: array{policy?: string, policyArns?: list<string>, ...},
 *     jobDriver?: array{
 *         sparkSubmit?: array{entryPoint?: string, entryPointArguments?: list<string>, sparkSubmitParameters?: string, ...},
 *         hive?: array{query?: string, initQueryFile?: string, parameters?: string, ...},
 *         ...,
 *     },
 *     configurationOverrides?: array{
 *         applicationConfiguration?: list<array>,
 *         monitoringConfiguration?: array{
 *             s3MonitoringConfiguration?: array,
 *             managedPersistenceMonitoringConfiguration?: array,
 *             cloudWatchLoggingConfiguration?: array,
 *             prometheusMonitoringConfiguration?: array,
 *             ...,
 *         },
 *         diskEncryptionConfiguration?: array{encryptionContext?: array<string, string>, encryptionKeyArn?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     executionTimeoutMinutes?: int,
 *     name?: string,
 *     mode?: 'BATCH'|'STREAMING',
 *     retryPolicy?: array{maxAttempts?: int, maxFailedAttemptsPerHour?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSession(array $args = [])
 * @phpstan-method \Aws\Result startSession(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     configurationOverrides?: array{runtimeConfiguration?: list<array>, ...},
 *     tags?: array<string, string>,
 *     idleTimeoutMinutes?: int,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSessionAsync(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     configurationOverrides?: array{runtimeConfiguration?: list<array>, ...},
 *     tags?: array<string, string>,
 *     idleTimeoutMinutes?: int,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopApplication(array $args = [])
 * @phpstan-method \Aws\Result stopApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result terminateSession(array $args = [])
 * @phpstan-method \Aws\Result terminateSession(array{applicationId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateSessionAsync(array{applicationId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     initialCapacity?: array<string, array{workerCount?: int, workerConfiguration?: array, ...}>,
 *     maximumCapacity?: array{cpu?: string, memory?: string, disk?: string, ...},
 *     autoStartConfiguration?: array{enabled?: bool, ...},
 *     autoStopConfiguration?: array{enabled?: bool, idleTimeoutMinutes?: int, ...},
 *     networkConfiguration?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     architecture?: 'ARM64'|'X86_64',
 *     imageConfiguration?: array{imageUri?: string, applicationLevelDigestResolution?: bool, ...},
 *     workerTypeSpecifications?: array<string, array{imageConfiguration?: array, ...}>,
 *     interactiveConfiguration?: array{studioEnabled?: bool, livyEndpointEnabled?: bool, sessionEnabled?: bool, ...},
 *     releaseLabel?: string,
 *     runtimeConfiguration?: list<array{classification?: string, properties?: array<string, string>, configurations?: list<array>, ...}>,
 *     monitoringConfiguration?: array{
 *         s3MonitoringConfiguration?: array{logUri?: string, encryptionKeyArn?: string, ...},
 *         managedPersistenceMonitoringConfiguration?: array{enabled?: bool, encryptionKeyArn?: string, ...},
 *         cloudWatchLoggingConfiguration?: array{
 *             enabled?: bool,
 *             logGroupName?: string,
 *             logStreamNamePrefix?: string,
 *             encryptionKeyArn?: string,
 *             logTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         prometheusMonitoringConfiguration?: array{remoteWriteUrl?: string, ...},
 *         ...,
 *     },
 *     diskEncryptionConfiguration?: array{encryptionContext?: array<string, string>, encryptionKeyArn?: string, ...},
 *     schedulerConfiguration?: array{queueTimeoutMinutes?: int, maxConcurrentRuns?: int, ...},
 *     identityCenterConfiguration?: array{identityCenterInstanceArn?: string, userBackgroundSessionsEnabled?: bool, ...},
 *     jobLevelCostAllocationConfiguration?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     initialCapacity?: array<string, array{workerCount?: int, workerConfiguration?: array, ...}>,
 *     maximumCapacity?: array{cpu?: string, memory?: string, disk?: string, ...},
 *     autoStartConfiguration?: array{enabled?: bool, ...},
 *     autoStopConfiguration?: array{enabled?: bool, idleTimeoutMinutes?: int, ...},
 *     networkConfiguration?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     architecture?: 'ARM64'|'X86_64',
 *     imageConfiguration?: array{imageUri?: string, applicationLevelDigestResolution?: bool, ...},
 *     workerTypeSpecifications?: array<string, array{imageConfiguration?: array, ...}>,
 *     interactiveConfiguration?: array{studioEnabled?: bool, livyEndpointEnabled?: bool, sessionEnabled?: bool, ...},
 *     releaseLabel?: string,
 *     runtimeConfiguration?: list<array{classification?: string, properties?: array<string, string>, configurations?: list<array>, ...}>,
 *     monitoringConfiguration?: array{
 *         s3MonitoringConfiguration?: array{logUri?: string, encryptionKeyArn?: string, ...},
 *         managedPersistenceMonitoringConfiguration?: array{enabled?: bool, encryptionKeyArn?: string, ...},
 *         cloudWatchLoggingConfiguration?: array{
 *             enabled?: bool,
 *             logGroupName?: string,
 *             logStreamNamePrefix?: string,
 *             encryptionKeyArn?: string,
 *             logTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         prometheusMonitoringConfiguration?: array{remoteWriteUrl?: string, ...},
 *         ...,
 *     },
 *     diskEncryptionConfiguration?: array{encryptionContext?: array<string, string>, encryptionKeyArn?: string, ...},
 *     schedulerConfiguration?: array{queueTimeoutMinutes?: int, maxConcurrentRuns?: int, ...},
 *     identityCenterConfiguration?: array{identityCenterInstanceArn?: string, userBackgroundSessionsEnabled?: bool, ...},
 *     jobLevelCostAllocationConfiguration?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 */
class EMRServerlessClient extends AwsClient {}
