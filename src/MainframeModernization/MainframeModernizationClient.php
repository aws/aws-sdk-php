<?php
namespace Aws\MainframeModernization;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWSMainframeModernization** service.
 * @method \Aws\Result cancelBatchJobExecution(array $args = [])
 * @phpstan-method \Aws\Result cancelBatchJobExecution(array{applicationId?: string, authSecretsManagerArn?: string, executionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelBatchJobExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelBatchJobExecutionAsync(array{applicationId?: string, authSecretsManagerArn?: string, executionId?: string, ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     clientToken?: string,
 *     definition?: array{content?: string, s3Location?: string, ...},
 *     description?: string,
 *     engineType?: 'bluage'|'microfocus',
 *     kmsKeyId?: string,
 *     name?: string,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     clientToken?: string,
 *     definition?: array{content?: string, s3Location?: string, ...},
 *     description?: string,
 *     engineType?: 'bluage'|'microfocus',
 *     kmsKeyId?: string,
 *     name?: string,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSetExportTask(array $args = [])
 * @phpstan-method \Aws\Result createDataSetExportTask(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     exportConfig?: array{dataSets?: list<array>, s3Location?: string, ...},
 *     kmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSetExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSetExportTaskAsync(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     exportConfig?: array{dataSets?: list<array>, s3Location?: string, ...},
 *     kmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSetImportTask(array $args = [])
 * @phpstan-method \Aws\Result createDataSetImportTask(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     importConfig?: array{dataSets?: list<array>, s3Location?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSetImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSetImportTaskAsync(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     importConfig?: array{dataSets?: list<array>, s3Location?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{applicationId?: string, applicationVersion?: int, clientToken?: string, environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{applicationId?: string, applicationVersion?: int, clientToken?: string, environmentId?: string, ...} $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     clientToken?: string,
 *     description?: string,
 *     engineType?: 'bluage'|'microfocus',
 *     engineVersion?: string,
 *     highAvailabilityConfig?: array{desiredCapacity?: int, ...},
 *     instanceType?: string,
 *     kmsKeyId?: string,
 *     name?: string,
 *     networkType?: 'dual'|'ipv4',
 *     preferredMaintenanceWindow?: string,
 *     publiclyAccessible?: bool,
 *     securityGroupIds?: list<string>,
 *     storageConfigurations?: list<array{efs?: array, fsx?: array, ...}>,
 *     subnetIds?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     clientToken?: string,
 *     description?: string,
 *     engineType?: 'bluage'|'microfocus',
 *     engineVersion?: string,
 *     highAvailabilityConfig?: array{desiredCapacity?: int, ...},
 *     instanceType?: string,
 *     kmsKeyId?: string,
 *     name?: string,
 *     networkType?: 'dual'|'ipv4',
 *     preferredMaintenanceWindow?: string,
 *     publiclyAccessible?: bool,
 *     securityGroupIds?: list<string>,
 *     storageConfigurations?: list<array{efs?: array, fsx?: array, ...}>,
 *     subnetIds?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteApplicationFromEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationFromEnvironment(array{applicationId?: string, environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationFromEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationFromEnvironmentAsync(array{applicationId?: string, environmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result getApplicationVersion(array $args = [])
 * @phpstan-method \Aws\Result getApplicationVersion(array{applicationId?: string, applicationVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationVersionAsync(array{applicationId?: string, applicationVersion?: int, ...} $args = [])
 * @method \Aws\Result getBatchJobExecution(array $args = [])
 * @phpstan-method \Aws\Result getBatchJobExecution(array{applicationId?: string, executionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBatchJobExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBatchJobExecutionAsync(array{applicationId?: string, executionId?: string, ...} $args = [])
 * @method \Aws\Result getDataSetDetails(array $args = [])
 * @phpstan-method \Aws\Result getDataSetDetails(array{applicationId?: string, dataSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSetDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSetDetailsAsync(array{applicationId?: string, dataSetName?: string, ...} $args = [])
 * @method \Aws\Result getDataSetExportTask(array $args = [])
 * @phpstan-method \Aws\Result getDataSetExportTask(array{applicationId?: string, taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSetExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSetExportTaskAsync(array{applicationId?: string, taskId?: string, ...} $args = [])
 * @method \Aws\Result getDataSetImportTask(array $args = [])
 * @phpstan-method \Aws\Result getDataSetImportTask(array{applicationId?: string, taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSetImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSetImportTaskAsync(array{applicationId?: string, taskId?: string, ...} $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{applicationId?: string, deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{applicationId?: string, deploymentId?: string, ...} $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result getSignedBluinsightsUrl(array $args = [])
 * @phpstan-method \Aws\Result getSignedBluinsightsUrl(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSignedBluinsightsUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSignedBluinsightsUrlAsync(array{...} $args = [])
 * @method \Aws\Result listApplicationVersions(array $args = [])
 * @phpstan-method \Aws\Result listApplicationVersions(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationVersionsAsync(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{environmentId?: string, maxResults?: int, names?: list<string>, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{environmentId?: string, maxResults?: int, names?: list<string>, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listBatchJobDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listBatchJobDefinitions(array{applicationId?: string, maxResults?: int, nextToken?: string, prefix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBatchJobDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBatchJobDefinitionsAsync(array{applicationId?: string, maxResults?: int, nextToken?: string, prefix?: string, ...} $args = [])
 * @method \Aws\Result listBatchJobExecutions(array $args = [])
 * @phpstan-method \Aws\Result listBatchJobExecutions(array{
 *     applicationId?: string,
 *     executionIds?: list<string>,
 *     jobName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     startedAfter?: int|string|\DateTimeInterface,
 *     startedBefore?: int|string|\DateTimeInterface,
 *     status?: 'Cancelled'|'Cancelling'|'Dispatching'|'Failed'|'Holding'|'Purged'|'Running'|'Submitting'|'Succeeded'|'Succeeded With Warning',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBatchJobExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBatchJobExecutionsAsync(array{
 *     applicationId?: string,
 *     executionIds?: list<string>,
 *     jobName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     startedAfter?: int|string|\DateTimeInterface,
 *     startedBefore?: int|string|\DateTimeInterface,
 *     status?: 'Cancelled'|'Cancelling'|'Dispatching'|'Failed'|'Holding'|'Purged'|'Running'|'Submitting'|'Succeeded'|'Succeeded With Warning',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBatchJobRestartPoints(array $args = [])
 * @phpstan-method \Aws\Result listBatchJobRestartPoints(array{applicationId?: string, authSecretsManagerArn?: string, executionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBatchJobRestartPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBatchJobRestartPointsAsync(array{applicationId?: string, authSecretsManagerArn?: string, executionId?: string, ...} $args = [])
 * @method \Aws\Result listDataSetExportHistory(array $args = [])
 * @phpstan-method \Aws\Result listDataSetExportHistory(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSetExportHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSetExportHistoryAsync(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataSetImportHistory(array $args = [])
 * @phpstan-method \Aws\Result listDataSetImportHistory(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSetImportHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSetImportHistoryAsync(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataSets(array $args = [])
 * @phpstan-method \Aws\Result listDataSets(array{applicationId?: string, maxResults?: int, nameFilter?: string, nextToken?: string, prefix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSetsAsync(array{applicationId?: string, maxResults?: int, nameFilter?: string, nextToken?: string, prefix?: string, ...} $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDeployments(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEngineVersions(array $args = [])
 * @phpstan-method \Aws\Result listEngineVersions(array{engineType?: 'bluage'|'microfocus', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngineVersionsAsync(array{engineType?: 'bluage'|'microfocus', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{engineType?: 'bluage'|'microfocus', maxResults?: int, names?: list<string>, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{engineType?: 'bluage'|'microfocus', maxResults?: int, names?: list<string>, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startApplication(array $args = [])
 * @phpstan-method \Aws\Result startApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result startBatchJob(array $args = [])
 * @phpstan-method \Aws\Result startBatchJob(array{
 *     applicationId?: string,
 *     authSecretsManagerArn?: string,
 *     batchJobIdentifier?: array{
 *         fileBatchJobIdentifier?: array{fileName?: string, folderPath?: string, ...},
 *         restartBatchJobIdentifier?: array{executionId?: string, jobStepRestartMarker?: array, ...},
 *         s3BatchJobIdentifier?: array{bucket?: string, identifier?: array, keyPrefix?: string, ...},
 *         scriptBatchJobIdentifier?: array{scriptName?: string, ...},
 *         ...,
 *     },
 *     jobParams?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startBatchJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBatchJobAsync(array{
 *     applicationId?: string,
 *     authSecretsManagerArn?: string,
 *     batchJobIdentifier?: array{
 *         fileBatchJobIdentifier?: array{fileName?: string, folderPath?: string, ...},
 *         restartBatchJobIdentifier?: array{executionId?: string, jobStepRestartMarker?: array, ...},
 *         s3BatchJobIdentifier?: array{bucket?: string, identifier?: array, keyPrefix?: string, ...},
 *         scriptBatchJobIdentifier?: array{scriptName?: string, ...},
 *         ...,
 *     },
 *     jobParams?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopApplication(array $args = [])
 * @phpstan-method \Aws\Result stopApplication(array{applicationId?: string, forceStop?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopApplicationAsync(array{applicationId?: string, forceStop?: bool, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     applicationId?: string,
 *     currentApplicationVersion?: int,
 *     definition?: array{content?: string, s3Location?: string, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     applicationId?: string,
 *     currentApplicationVersion?: int,
 *     definition?: array{content?: string, s3Location?: string, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     applyDuringMaintenanceWindow?: bool,
 *     desiredCapacity?: int,
 *     engineVersion?: string,
 *     environmentId?: string,
 *     forceUpdate?: bool,
 *     instanceType?: string,
 *     preferredMaintenanceWindow?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     applyDuringMaintenanceWindow?: bool,
 *     desiredCapacity?: int,
 *     engineVersion?: string,
 *     environmentId?: string,
 *     forceUpdate?: bool,
 *     instanceType?: string,
 *     preferredMaintenanceWindow?: string,
 *     ...,
 * } $args = [])
 */
class MainframeModernizationClient extends AwsClient {}
