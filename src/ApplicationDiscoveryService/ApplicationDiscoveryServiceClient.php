<?php
namespace Aws\ApplicationDiscoveryService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Application Discovery Service** service.
 * @method \Aws\Result associateConfigurationItemsToApplication(array $args = [])
 * @phpstan-method \Aws\Result associateConfigurationItemsToApplication(array{applicationConfigurationId?: string, configurationIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateConfigurationItemsToApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateConfigurationItemsToApplicationAsync(array{applicationConfigurationId?: string, configurationIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeleteAgents(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteAgents(array{deleteAgents?: list<array{agentId?: string, force?: bool, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteAgentsAsync(array{deleteAgents?: list<array{agentId?: string, force?: bool, ...}>, ...} $args = [])
 * @method \Aws\Result batchDeleteImportData(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteImportData(array{importTaskIds?: list<string>, deleteHistory?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteImportDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteImportDataAsync(array{importTaskIds?: list<string>, deleteHistory?: bool, ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{name?: string, description?: string, wave?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{name?: string, description?: string, wave?: string, ...} $args = [])
 * @method \Aws\Result createTags(array $args = [])
 * @phpstan-method \Aws\Result createTags(array{configurationIds?: list<string>, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTagsAsync(array{configurationIds?: list<string>, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result deleteApplications(array $args = [])
 * @phpstan-method \Aws\Result deleteApplications(array{configurationIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationsAsync(array{configurationIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{configurationIds?: list<string>, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{configurationIds?: list<string>, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result describeAgents(array $args = [])
 * @phpstan-method \Aws\Result describeAgents(array{
 *     agentIds?: list<string>,
 *     filters?: list<array{name?: string, values?: list<string>, condition?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAgentsAsync(array{
 *     agentIds?: list<string>,
 *     filters?: list<array{name?: string, values?: list<string>, condition?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeBatchDeleteConfigurationTask(array $args = [])
 * @phpstan-method \Aws\Result describeBatchDeleteConfigurationTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBatchDeleteConfigurationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBatchDeleteConfigurationTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result describeConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeConfigurations(array{configurationIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationsAsync(array{configurationIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeContinuousExports(array $args = [])
 * @phpstan-method \Aws\Result describeContinuousExports(array{exportIds?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContinuousExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContinuousExportsAsync(array{exportIds?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeExportConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeExportConfigurations(array{exportIds?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExportConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExportConfigurationsAsync(array{exportIds?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeExportTasks(array $args = [])
 * @phpstan-method \Aws\Result describeExportTasks(array{
 *     exportIds?: list<string>,
 *     filters?: list<array{name?: string, values?: list<string>, condition?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExportTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExportTasksAsync(array{
 *     exportIds?: list<string>,
 *     filters?: list<array{name?: string, values?: list<string>, condition?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeImportTasks(array $args = [])
 * @phpstan-method \Aws\Result describeImportTasks(array{
 *     filters?: list<array{name?: 'FILE_CLASSIFICATION'|'IMPORT_TASK_ID'|'NAME'|'STATUS', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImportTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImportTasksAsync(array{
 *     filters?: list<array{name?: 'FILE_CLASSIFICATION'|'IMPORT_TASK_ID'|'NAME'|'STATUS', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateConfigurationItemsFromApplication(array $args = [])
 * @phpstan-method \Aws\Result disassociateConfigurationItemsFromApplication(array{applicationConfigurationId?: string, configurationIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateConfigurationItemsFromApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateConfigurationItemsFromApplicationAsync(array{applicationConfigurationId?: string, configurationIds?: list<string>, ...} $args = [])
 * @method \Aws\Result exportConfigurations(array $args = [])
 * @phpstan-method \Aws\Result exportConfigurations(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportConfigurationsAsync(array{...} $args = [])
 * @method \Aws\Result getDiscoverySummary(array $args = [])
 * @phpstan-method \Aws\Result getDiscoverySummary(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDiscoverySummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDiscoverySummaryAsync(array{...} $args = [])
 * @method \Aws\Result listConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listConfigurations(array{
 *     configurationType?: 'APPLICATION'|'CONNECTION'|'PROCESS'|'SERVER',
 *     filters?: list<array{name?: string, values?: list<string>, condition?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     orderBy?: list<array{fieldName?: string, sortOrder?: 'ASC'|'DESC', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array{
 *     configurationType?: 'APPLICATION'|'CONNECTION'|'PROCESS'|'SERVER',
 *     filters?: list<array{name?: string, values?: list<string>, condition?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     orderBy?: list<array{fieldName?: string, sortOrder?: 'ASC'|'DESC', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServerNeighbors(array $args = [])
 * @phpstan-method \Aws\Result listServerNeighbors(array{
 *     configurationId?: string,
 *     portInformationNeeded?: bool,
 *     neighborConfigurationIds?: list<string>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServerNeighborsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServerNeighborsAsync(array{
 *     configurationId?: string,
 *     portInformationNeeded?: bool,
 *     neighborConfigurationIds?: list<string>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startBatchDeleteConfigurationTask(array $args = [])
 * @phpstan-method \Aws\Result startBatchDeleteConfigurationTask(array{configurationType?: 'SERVER', configurationIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startBatchDeleteConfigurationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBatchDeleteConfigurationTaskAsync(array{configurationType?: 'SERVER', configurationIds?: list<string>, ...} $args = [])
 * @method \Aws\Result startContinuousExport(array $args = [])
 * @phpstan-method \Aws\Result startContinuousExport(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startContinuousExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContinuousExportAsync(array{...} $args = [])
 * @method \Aws\Result startDataCollectionByAgentIds(array $args = [])
 * @phpstan-method \Aws\Result startDataCollectionByAgentIds(array{agentIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataCollectionByAgentIdsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataCollectionByAgentIdsAsync(array{agentIds?: list<string>, ...} $args = [])
 * @method \Aws\Result startExportTask(array $args = [])
 * @phpstan-method \Aws\Result startExportTask(array{
 *     exportDataFormat?: list<'CSV'>,
 *     filters?: list<array{name?: string, values?: list<string>, condition?: string, ...}>,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     preferences?: array{
 *         ec2RecommendationsPreferences?: array{
 *             enabled?: bool,
 *             cpuPerformanceMetricBasis?: array,
 *             ramPerformanceMetricBasis?: array,
 *             tenancy?: 'DEDICATED'|'SHARED',
 *             excludedInstanceTypes?: list<string>,
 *             preferredRegion?: string,
 *             reservedInstanceOptions?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExportTaskAsync(array{
 *     exportDataFormat?: list<'CSV'>,
 *     filters?: list<array{name?: string, values?: list<string>, condition?: string, ...}>,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     preferences?: array{
 *         ec2RecommendationsPreferences?: array{
 *             enabled?: bool,
 *             cpuPerformanceMetricBasis?: array,
 *             ramPerformanceMetricBasis?: array,
 *             tenancy?: 'DEDICATED'|'SHARED',
 *             excludedInstanceTypes?: list<string>,
 *             preferredRegion?: string,
 *             reservedInstanceOptions?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startImportTask(array $args = [])
 * @phpstan-method \Aws\Result startImportTask(array{clientRequestToken?: string, name?: string, importUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportTaskAsync(array{clientRequestToken?: string, name?: string, importUrl?: string, ...} $args = [])
 * @method \Aws\Result stopContinuousExport(array $args = [])
 * @phpstan-method \Aws\Result stopContinuousExport(array{exportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopContinuousExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopContinuousExportAsync(array{exportId?: string, ...} $args = [])
 * @method \Aws\Result stopDataCollectionByAgentIds(array $args = [])
 * @phpstan-method \Aws\Result stopDataCollectionByAgentIds(array{agentIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDataCollectionByAgentIdsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDataCollectionByAgentIdsAsync(array{agentIds?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{configurationId?: string, name?: string, description?: string, wave?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{configurationId?: string, name?: string, description?: string, wave?: string, ...} $args = [])
 */
class ApplicationDiscoveryServiceClient extends AwsClient {}
