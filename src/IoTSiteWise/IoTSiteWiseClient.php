<?php
namespace Aws\IoTSiteWise;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT SiteWise** service.
 * @method \Aws\Result associateAssets(array $args = [])
 * @phpstan-method \Aws\Result associateAssets(array{assetId?: string, hierarchyId?: string, childAssetId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAssetsAsync(array{assetId?: string, hierarchyId?: string, childAssetId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result associateTimeSeriesToAssetProperty(array $args = [])
 * @phpstan-method \Aws\Result associateTimeSeriesToAssetProperty(array{alias?: string, assetId?: string, propertyId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTimeSeriesToAssetPropertyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateTimeSeriesToAssetPropertyAsync(array{alias?: string, assetId?: string, propertyId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result batchAssociateDataSegmentsToDataset(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateDataSegmentsToDataset(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     associateDataSegmentEntries?: list<array{sourceDatasetId?: string, timeSeriesId?: string, startTimestamp?: array, endTimestamp?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateDataSegmentsToDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateDataSegmentsToDatasetAsync(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     associateDataSegmentEntries?: list<array{sourceDatasetId?: string, timeSeriesId?: string, startTimestamp?: array, endTimestamp?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchAssociateProjectAssets(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateProjectAssets(array{projectId?: string, assetIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateProjectAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateProjectAssetsAsync(array{projectId?: string, assetIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result batchDeleteDatasetDataSegments(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteDatasetDataSegments(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     deleteDataSegmentEntries?: list<array{timeSeriesId?: string, startTimestamp?: array, endTimestamp?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteDatasetDataSegmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteDatasetDataSegmentsAsync(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     deleteDataSegmentEntries?: list<array{timeSeriesId?: string, startTimestamp?: array, endTimestamp?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDisassociateDataSegmentsFromDataset(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateDataSegmentsFromDataset(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     disassociateDataSegmentEntries?: list<array{sourceDatasetId?: string, timeSeriesId?: string, startTimestamp?: array, endTimestamp?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateDataSegmentsFromDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateDataSegmentsFromDatasetAsync(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     disassociateDataSegmentEntries?: list<array{sourceDatasetId?: string, timeSeriesId?: string, startTimestamp?: array, endTimestamp?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDisassociateProjectAssets(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateProjectAssets(array{projectId?: string, assetIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateProjectAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateProjectAssetsAsync(array{projectId?: string, assetIds?: list<string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result batchGetAssetPropertyAggregates(array $args = [])
 * @phpstan-method \Aws\Result batchGetAssetPropertyAggregates(array{
 *     entries?: list<array{
 *         entryId?: string,
 *         assetId?: string,
 *         propertyId?: string,
 *         propertyAlias?: string,
 *         aggregateTypes?: list<'AVERAGE'|'COUNT'|'MAXIMUM'|'MINIMUM'|'STANDARD_DEVIATION'|'SUM'>,
 *         resolution?: string,
 *         startDate?: int|string|\DateTimeInterface,
 *         endDate?: int|string|\DateTimeInterface,
 *         qualities?: list<'BAD'|'GOOD'|'UNCERTAIN'>,
 *         timeOrdering?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAssetPropertyAggregatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetAssetPropertyAggregatesAsync(array{
 *     entries?: list<array{
 *         entryId?: string,
 *         assetId?: string,
 *         propertyId?: string,
 *         propertyAlias?: string,
 *         aggregateTypes?: list<'AVERAGE'|'COUNT'|'MAXIMUM'|'MINIMUM'|'STANDARD_DEVIATION'|'SUM'>,
 *         resolution?: string,
 *         startDate?: int|string|\DateTimeInterface,
 *         endDate?: int|string|\DateTimeInterface,
 *         qualities?: list<'BAD'|'GOOD'|'UNCERTAIN'>,
 *         timeOrdering?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetAssetPropertyValue(array $args = [])
 * @phpstan-method \Aws\Result batchGetAssetPropertyValue(array{
 *     entries?: list<array{entryId?: string, assetId?: string, propertyId?: string, propertyAlias?: string, ...}>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAssetPropertyValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetAssetPropertyValueAsync(array{
 *     entries?: list<array{entryId?: string, assetId?: string, propertyId?: string, propertyAlias?: string, ...}>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetAssetPropertyValueHistory(array $args = [])
 * @phpstan-method \Aws\Result batchGetAssetPropertyValueHistory(array{
 *     entries?: list<array{
 *         entryId?: string,
 *         assetId?: string,
 *         propertyId?: string,
 *         propertyAlias?: string,
 *         startDate?: int|string|\DateTimeInterface,
 *         endDate?: int|string|\DateTimeInterface,
 *         qualities?: list<'BAD'|'GOOD'|'UNCERTAIN'>,
 *         timeOrdering?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAssetPropertyValueHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetAssetPropertyValueHistoryAsync(array{
 *     entries?: list<array{
 *         entryId?: string,
 *         assetId?: string,
 *         propertyId?: string,
 *         propertyAlias?: string,
 *         startDate?: int|string|\DateTimeInterface,
 *         endDate?: int|string|\DateTimeInterface,
 *         qualities?: list<'BAD'|'GOOD'|'UNCERTAIN'>,
 *         timeOrdering?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchPutAssetPropertyValue(array $args = [])
 * @phpstan-method \Aws\Result batchPutAssetPropertyValue(array{
 *     enablePartialEntryProcessing?: bool,
 *     entries?: list<array{
 *         entryId?: string,
 *         assetId?: string,
 *         propertyId?: string,
 *         propertyAlias?: string,
 *         propertyValues?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutAssetPropertyValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutAssetPropertyValueAsync(array{
 *     enablePartialEntryProcessing?: bool,
 *     entries?: list<array{
 *         entryId?: string,
 *         assetId?: string,
 *         propertyId?: string,
 *         propertyAlias?: string,
 *         propertyValues?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelEnrichmentJob(array $args = [])
 * @phpstan-method \Aws\Result cancelEnrichmentJob(array{workspaceName?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelEnrichmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelEnrichmentJobAsync(array{workspaceName?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result cancelPipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result cancelPipelineExecution(array{workspaceName?: string, pipelineName?: string, pipelineExecutionId?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelPipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelPipelineExecutionAsync(array{workspaceName?: string, pipelineName?: string, pipelineExecutionId?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result cancelQuery(array $args = [])
 * @phpstan-method \Aws\Result cancelQuery(array{workspaceName?: string, queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelQueryAsync(array{workspaceName?: string, queryId?: string, ...} $args = [])
 * @method \Aws\Result createAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result createAccessPolicy(array{
 *     accessPolicyIdentity?: array{
 *         user?: array{id?: string, ...},
 *         group?: array{id?: string, ...},
 *         iamUser?: array{arn?: string, ...},
 *         iamRole?: array{arn?: string, ...},
 *         ...,
 *     },
 *     accessPolicyResource?: array{portal?: array{id?: string, ...}, project?: array{id?: string, ...}, ...},
 *     accessPolicyPermission?: 'ADMINISTRATOR'|'VIEWER',
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessPolicyAsync(array{
 *     accessPolicyIdentity?: array{
 *         user?: array{id?: string, ...},
 *         group?: array{id?: string, ...},
 *         iamUser?: array{arn?: string, ...},
 *         iamRole?: array{arn?: string, ...},
 *         ...,
 *     },
 *     accessPolicyResource?: array{portal?: array{id?: string, ...}, project?: array{id?: string, ...}, ...},
 *     accessPolicyPermission?: 'ADMINISTRATOR'|'VIEWER',
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     clientToken?: string,
 *     idcInstanceArn?: string,
 *     workspaceName?: string,
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     clientToken?: string,
 *     idcInstanceArn?: string,
 *     workspaceName?: string,
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAsset(array $args = [])
 * @phpstan-method \Aws\Result createAsset(array{
 *     assetName?: string,
 *     assetModelId?: string,
 *     assetId?: string,
 *     assetExternalId?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     assetDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetAsync(array{
 *     assetName?: string,
 *     assetModelId?: string,
 *     assetId?: string,
 *     assetExternalId?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     assetDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssetModel(array $args = [])
 * @phpstan-method \Aws\Result createAssetModel(array{
 *     assetModelName?: string,
 *     assetModelType?: 'ASSET_MODEL'|'COMPONENT_MODEL'|'INTERFACE',
 *     assetModelId?: string,
 *     assetModelExternalId?: string,
 *     assetModelDescription?: string,
 *     assetModelProperties?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         dataType?: 'ANNOTATION'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'JSON'|'STRING'|'STRUCT'|'VIDEO',
 *         dataTypeSpec?: string,
 *         unit?: string,
 *         type?: array,
 *         ...,
 *     }>,
 *     assetModelHierarchies?: list<array{id?: string, externalId?: string, name?: string, childAssetModelId?: string, ...}>,
 *     assetModelCompositeModels?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         description?: string,
 *         type?: string,
 *         properties?: list<array>,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetModelAsync(array{
 *     assetModelName?: string,
 *     assetModelType?: 'ASSET_MODEL'|'COMPONENT_MODEL'|'INTERFACE',
 *     assetModelId?: string,
 *     assetModelExternalId?: string,
 *     assetModelDescription?: string,
 *     assetModelProperties?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         dataType?: 'ANNOTATION'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'JSON'|'STRING'|'STRUCT'|'VIDEO',
 *         dataTypeSpec?: string,
 *         unit?: string,
 *         type?: array,
 *         ...,
 *     }>,
 *     assetModelHierarchies?: list<array{id?: string, externalId?: string, name?: string, childAssetModelId?: string, ...}>,
 *     assetModelCompositeModels?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         description?: string,
 *         type?: string,
 *         properties?: list<array>,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssetModelCompositeModel(array $args = [])
 * @phpstan-method \Aws\Result createAssetModelCompositeModel(array{
 *     assetModelId?: string,
 *     assetModelCompositeModelExternalId?: string,
 *     parentAssetModelCompositeModelId?: string,
 *     assetModelCompositeModelId?: string,
 *     assetModelCompositeModelDescription?: string,
 *     assetModelCompositeModelName?: string,
 *     assetModelCompositeModelType?: string,
 *     clientToken?: string,
 *     composedAssetModelId?: string,
 *     assetModelCompositeModelProperties?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         dataType?: 'ANNOTATION'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'JSON'|'STRING'|'STRUCT'|'VIDEO',
 *         dataTypeSpec?: string,
 *         unit?: string,
 *         type?: array,
 *         ...,
 *     }>,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetModelCompositeModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetModelCompositeModelAsync(array{
 *     assetModelId?: string,
 *     assetModelCompositeModelExternalId?: string,
 *     parentAssetModelCompositeModelId?: string,
 *     assetModelCompositeModelId?: string,
 *     assetModelCompositeModelDescription?: string,
 *     assetModelCompositeModelName?: string,
 *     assetModelCompositeModelType?: string,
 *     clientToken?: string,
 *     composedAssetModelId?: string,
 *     assetModelCompositeModelProperties?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         dataType?: 'ANNOTATION'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'JSON'|'STRING'|'STRUCT'|'VIDEO',
 *         dataTypeSpec?: string,
 *         unit?: string,
 *         type?: array,
 *         ...,
 *     }>,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBulkImportJob(array $args = [])
 * @phpstan-method \Aws\Result createBulkImportJob(array{
 *     jobName?: string,
 *     jobRoleArn?: string,
 *     files?: list<array{
 *         bucket?: string,
 *         key?: string,
 *         versionId?: string,
 *         alias?: string,
 *         startTime?: array,
 *         fileFormat?: array,
 *         ...,
 *     }>,
 *     errorReportLocation?: array{bucket?: string, prefix?: string, ...},
 *     jobConfiguration?: array{fileFormat?: array{csv?: array, parquet?: array, mp4?: array, annotation?: array, ...}, ...},
 *     adaptiveIngestion?: bool,
 *     deleteFilesAfterImport?: bool,
 *     datasetId?: string,
 *     workspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBulkImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBulkImportJobAsync(array{
 *     jobName?: string,
 *     jobRoleArn?: string,
 *     files?: list<array{
 *         bucket?: string,
 *         key?: string,
 *         versionId?: string,
 *         alias?: string,
 *         startTime?: array,
 *         fileFormat?: array,
 *         ...,
 *     }>,
 *     errorReportLocation?: array{bucket?: string, prefix?: string, ...},
 *     jobConfiguration?: array{fileFormat?: array{csv?: array, parquet?: array, mp4?: array, annotation?: array, ...}, ...},
 *     adaptiveIngestion?: bool,
 *     deleteFilesAfterImport?: bool,
 *     datasetId?: string,
 *     workspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createComputationModel(array $args = [])
 * @phpstan-method \Aws\Result createComputationModel(array{
 *     computationModelName?: string,
 *     computationModelDescription?: string,
 *     computationModelConfiguration?: array{anomalyDetection?: array{inputProperties?: string, resultProperty?: string, ...}, ...},
 *     computationModelDataBinding?: array<string, array{assetModelProperty?: array, assetProperty?: array, list?: list<array>, ...}>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComputationModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComputationModelAsync(array{
 *     computationModelName?: string,
 *     computationModelDescription?: string,
 *     computationModelConfiguration?: array{anomalyDetection?: array{inputProperties?: string, resultProperty?: string, ...}, ...},
 *     computationModelDataBinding?: array<string, array{assetModelProperty?: array, assetProperty?: array, list?: list<array>, ...}>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDashboard(array $args = [])
 * @phpstan-method \Aws\Result createDashboard(array{
 *     projectId?: string,
 *     dashboardName?: string,
 *     dashboardDescription?: string,
 *     dashboardDefinition?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDashboardAsync(array{
 *     projectId?: string,
 *     dashboardName?: string,
 *     dashboardDescription?: string,
 *     dashboardDefinition?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     datasetId?: string,
 *     datasetName?: string,
 *     datasetDescription?: string,
 *     datasetType?: 'CURATED'|'EXTERNAL'|'SESSION',
 *     datasetConfig?: array{session?: array{sessionStartTimestamp?: array, sessionEndTimestamp?: array, ...}, ...},
 *     workspaceName?: string,
 *     metadata?: array<string, string>,
 *     datasetSource?: array{
 *         sourceType?: 'KENDRA'|'SITEWISE',
 *         sourceFormat?: 'KNOWLEDGE_BASE'|'TIMESERIES',
 *         sourceDetail?: array{kendra?: array, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     datasetId?: string,
 *     datasetName?: string,
 *     datasetDescription?: string,
 *     datasetType?: 'CURATED'|'EXTERNAL'|'SESSION',
 *     datasetConfig?: array{session?: array{sessionStartTimestamp?: array, sessionEndTimestamp?: array, ...}, ...},
 *     workspaceName?: string,
 *     metadata?: array<string, string>,
 *     datasetSource?: array{
 *         sourceType?: 'KENDRA'|'SITEWISE',
 *         sourceFormat?: 'KNOWLEDGE_BASE'|'TIMESERIES',
 *         sourceDetail?: array{kendra?: array, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDatasetExportJob(array $args = [])
 * @phpstan-method \Aws\Result createDatasetExportJob(array{
 *     workspaceName?: string,
 *     clientToken?: string,
 *     destinationS3Uri?: string,
 *     input?: array{
 *         timeseries?: list<array>,
 *         dataset?: array{datasetId?: string, trimSettings?: array, exportDataTypes?: list<'ANNOTATION'|'TELEMETRY'|'VIDEO'>, ...},
 *         ...,
 *     },
 *     jobName?: string,
 *     errorReportLocation?: array{s3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetExportJobAsync(array{
 *     workspaceName?: string,
 *     clientToken?: string,
 *     destinationS3Uri?: string,
 *     input?: array{
 *         timeseries?: list<array>,
 *         dataset?: array{datasetId?: string, trimSettings?: array, exportDataTypes?: list<'ANNOTATION'|'TELEMETRY'|'VIDEO'>, ...},
 *         ...,
 *     },
 *     jobName?: string,
 *     errorReportLocation?: array{s3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnrichmentJob(array $args = [])
 * @phpstan-method \Aws\Result createEnrichmentJob(array{
 *     workspaceName?: string,
 *     jobConfiguration?: array{
 *         eventDetection?: array{datasetId?: string, timeSeriesId?: string, propertyAlias?: string, trimSettings?: array, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnrichmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnrichmentJobAsync(array{
 *     workspaceName?: string,
 *     jobConfiguration?: array{
 *         eventDetection?: array{datasetId?: string, timeSeriesId?: string, propertyAlias?: string, trimSettings?: array, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGateway(array $args = [])
 * @phpstan-method \Aws\Result createGateway(array{
 *     gatewayName?: string,
 *     gatewayPlatform?: array{
 *         greengrass?: array{groupArn?: string, ...},
 *         greengrassV2?: array{
 *             coreDeviceThingName?: string,
 *             coreDeviceOperatingSystem?: 'LINUX_AARCH64'|'LINUX_AMD64'|'WINDOWS_AMD64',
 *             ...,
 *         },
 *         siemensIE?: array{iotCoreThingName?: string, ...},
 *         ...,
 *     },
 *     gatewayVersion?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGatewayAsync(array{
 *     gatewayName?: string,
 *     gatewayPlatform?: array{
 *         greengrass?: array{groupArn?: string, ...},
 *         greengrassV2?: array{
 *             coreDeviceThingName?: string,
 *             coreDeviceOperatingSystem?: 'LINUX_AARCH64'|'LINUX_AMD64'|'WINDOWS_AMD64',
 *             ...,
 *         },
 *         siemensIE?: array{iotCoreThingName?: string, ...},
 *         ...,
 *     },
 *     gatewayVersion?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPipeline(array $args = [])
 * @phpstan-method \Aws\Result createPipeline(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     description?: string,
 *     environmentVariables?: array<string, string>,
 *     computations?: list<array{
 *         computeNodeName?: string,
 *         taskName?: string,
 *         environmentVariables?: array<string, string>,
 *         dependsOn?: list<string>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPipelineAsync(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     description?: string,
 *     environmentVariables?: array<string, string>,
 *     computations?: list<array{
 *         computeNodeName?: string,
 *         taskName?: string,
 *         environmentVariables?: array<string, string>,
 *         dependsOn?: list<string>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPortal(array $args = [])
 * @phpstan-method \Aws\Result createPortal(array{
 *     portalName?: string,
 *     portalDescription?: string,
 *     portalContactEmail?: string,
 *     clientToken?: string,
 *     portalLogoImageFile?: array{data?: string|resource|\Psr\Http\Message\StreamInterface, type?: 'PNG', ...},
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     portalAuthMode?: 'IAM'|'SSO',
 *     notificationSenderEmail?: string,
 *     alarms?: array{alarmRoleArn?: string, notificationLambdaArn?: string, ...},
 *     portalType?: 'SITEWISE_PORTAL_V1'|'SITEWISE_PORTAL_V2',
 *     portalTypeConfiguration?: array<string, array{portalTools?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPortalAsync(array{
 *     portalName?: string,
 *     portalDescription?: string,
 *     portalContactEmail?: string,
 *     clientToken?: string,
 *     portalLogoImageFile?: array{data?: string|resource|\Psr\Http\Message\StreamInterface, type?: 'PNG', ...},
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     portalAuthMode?: 'IAM'|'SSO',
 *     notificationSenderEmail?: string,
 *     alarms?: array{alarmRoleArn?: string, notificationLambdaArn?: string, ...},
 *     portalType?: 'SITEWISE_PORTAL_V1'|'SITEWISE_PORTAL_V2',
 *     portalTypeConfiguration?: array<string, array{portalTools?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @phpstan-method \Aws\Result createProject(array{
 *     portalId?: string,
 *     projectName?: string,
 *     projectDescription?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectAsync(array{
 *     portalId?: string,
 *     projectName?: string,
 *     projectDescription?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTask(array $args = [])
 * @phpstan-method \Aws\Result createTask(array{
 *     workspaceName?: string,
 *     taskName?: string,
 *     description?: string,
 *     taskConfiguration?: array{
 *         containerTaskConfiguration?: array{
 *             ecrUri?: string,
 *             taskExecutionRole?: string,
 *             processingType?: 'GENERIC_COMPUTE_PROCESSING'|'HARDWARE_ACCELERATED_PROCESSING',
 *             processingUnit?: 'UNITS_12'|'UNITS_16'|'UNITS_2'|'UNITS_24'|'UNITS_32'|'UNITS_36'|'UNITS_4'|'UNITS_48'|'UNITS_60'|'UNITS_64'|'UNITS_72'|'UNITS_8'|'UNITS_84'|'UNITS_96',
 *             ephemeralStorageConfiguration?: array,
 *             command?: list<string>,
 *             timeoutSeconds?: int,
 *             environmentVariables?: array<string, string>,
 *             mounts?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTaskAsync(array{
 *     workspaceName?: string,
 *     taskName?: string,
 *     description?: string,
 *     taskConfiguration?: array{
 *         containerTaskConfiguration?: array{
 *             ecrUri?: string,
 *             taskExecutionRole?: string,
 *             processingType?: 'GENERIC_COMPUTE_PROCESSING'|'HARDWARE_ACCELERATED_PROCESSING',
 *             processingUnit?: 'UNITS_12'|'UNITS_16'|'UNITS_2'|'UNITS_24'|'UNITS_32'|'UNITS_36'|'UNITS_4'|'UNITS_48'|'UNITS_60'|'UNITS_64'|'UNITS_72'|'UNITS_8'|'UNITS_84'|'UNITS_96',
 *             ephemeralStorageConfiguration?: array,
 *             command?: list<string>,
 *             timeoutSeconds?: int,
 *             environmentVariables?: array<string, string>,
 *             mounts?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspace(array $args = [])
 * @phpstan-method \Aws\Result createWorkspace(array{
 *     workspaceName?: string,
 *     workspaceDescription?: string,
 *     encryptionConfiguration?: array{encryptionType?: 'KMS_BASED_ENCRYPTION'|'SITEWISE_DEFAULT_ENCRYPTION', kmsKeyId?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array{
 *     workspaceName?: string,
 *     workspaceDescription?: string,
 *     encryptionConfiguration?: array{encryptionType?: 'KMS_BASED_ENCRYPTION'|'SITEWISE_DEFAULT_ENCRYPTION', kmsKeyId?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPolicy(array{accessPolicyId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPolicyAsync(array{accessPolicyId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{workspaceName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{workspaceName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result deleteAsset(array $args = [])
 * @phpstan-method \Aws\Result deleteAsset(array{assetId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetAsync(array{assetId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteAssetModel(array $args = [])
 * @phpstan-method \Aws\Result deleteAssetModel(array{
 *     assetModelId?: string,
 *     clientToken?: string,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetModelAsync(array{
 *     assetModelId?: string,
 *     clientToken?: string,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAssetModelCompositeModel(array $args = [])
 * @phpstan-method \Aws\Result deleteAssetModelCompositeModel(array{
 *     assetModelId?: string,
 *     assetModelCompositeModelId?: string,
 *     clientToken?: string,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetModelCompositeModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetModelCompositeModelAsync(array{
 *     assetModelId?: string,
 *     assetModelCompositeModelId?: string,
 *     clientToken?: string,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAssetModelInterfaceRelationship(array $args = [])
 * @phpstan-method \Aws\Result deleteAssetModelInterfaceRelationship(array{assetModelId?: string, interfaceAssetModelId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetModelInterfaceRelationshipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetModelInterfaceRelationshipAsync(array{assetModelId?: string, interfaceAssetModelId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteComputationModel(array $args = [])
 * @phpstan-method \Aws\Result deleteComputationModel(array{computationModelId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComputationModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComputationModelAsync(array{computationModelId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteDashboard(array $args = [])
 * @phpstan-method \Aws\Result deleteDashboard(array{dashboardId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array{dashboardId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{datasetId?: string, workspaceName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{datasetId?: string, workspaceName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteGateway(array{gatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array{gatewayId?: string, ...} $args = [])
 * @method \Aws\Result deletePipeline(array $args = [])
 * @phpstan-method \Aws\Result deletePipeline(array{workspaceName?: string, pipelineName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePipelineAsync(array{workspaceName?: string, pipelineName?: string, ...} $args = [])
 * @method \Aws\Result deletePortal(array $args = [])
 * @phpstan-method \Aws\Result deletePortal(array{portalId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePortalAsync(array{portalId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @phpstan-method \Aws\Result deleteProject(array{projectId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectAsync(array{projectId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteTask(array $args = [])
 * @phpstan-method \Aws\Result deleteTask(array{workspaceName?: string, taskName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTaskAsync(array{workspaceName?: string, taskName?: string, ...} $args = [])
 * @method \Aws\Result deleteTimeSeries(array $args = [])
 * @phpstan-method \Aws\Result deleteTimeSeries(array{
 *     alias?: string,
 *     assetId?: string,
 *     propertyId?: string,
 *     clientToken?: string,
 *     workspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTimeSeriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTimeSeriesAsync(array{
 *     alias?: string,
 *     assetId?: string,
 *     propertyId?: string,
 *     clientToken?: string,
 *     workspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteWorkspace(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspace(array{workspaceName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array{workspaceName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result describeAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result describeAccessPolicy(array{accessPolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccessPolicyAsync(array{accessPolicyId?: string, ...} $args = [])
 * @method \Aws\Result describeAction(array $args = [])
 * @phpstan-method \Aws\Result describeAction(array{actionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActionAsync(array{actionId?: string, ...} $args = [])
 * @method \Aws\Result describeApplication(array $args = [])
 * @phpstan-method \Aws\Result describeApplication(array{workspaceName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationAsync(array{workspaceName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result describeAsset(array $args = [])
 * @phpstan-method \Aws\Result describeAsset(array{assetId?: string, excludeProperties?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetAsync(array{assetId?: string, excludeProperties?: bool, ...} $args = [])
 * @method \Aws\Result describeAssetCompositeModel(array $args = [])
 * @phpstan-method \Aws\Result describeAssetCompositeModel(array{assetId?: string, assetCompositeModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetCompositeModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetCompositeModelAsync(array{assetId?: string, assetCompositeModelId?: string, ...} $args = [])
 * @method \Aws\Result describeAssetModel(array $args = [])
 * @phpstan-method \Aws\Result describeAssetModel(array{assetModelId?: string, excludeProperties?: bool, assetModelVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetModelAsync(array{assetModelId?: string, excludeProperties?: bool, assetModelVersion?: string, ...} $args = [])
 * @method \Aws\Result describeAssetModelCompositeModel(array $args = [])
 * @phpstan-method \Aws\Result describeAssetModelCompositeModel(array{assetModelId?: string, assetModelCompositeModelId?: string, assetModelVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetModelCompositeModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetModelCompositeModelAsync(array{assetModelId?: string, assetModelCompositeModelId?: string, assetModelVersion?: string, ...} $args = [])
 * @method \Aws\Result describeAssetModelInterfaceRelationship(array $args = [])
 * @phpstan-method \Aws\Result describeAssetModelInterfaceRelationship(array{assetModelId?: string, interfaceAssetModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetModelInterfaceRelationshipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetModelInterfaceRelationshipAsync(array{assetModelId?: string, interfaceAssetModelId?: string, ...} $args = [])
 * @method \Aws\Result describeAssetProperty(array $args = [])
 * @phpstan-method \Aws\Result describeAssetProperty(array{assetId?: string, propertyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetPropertyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetPropertyAsync(array{assetId?: string, propertyId?: string, ...} $args = [])
 * @method \Aws\Result describeBulkImportJob(array $args = [])
 * @phpstan-method \Aws\Result describeBulkImportJob(array{jobId?: string, workspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBulkImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBulkImportJobAsync(array{jobId?: string, workspaceName?: string, ...} $args = [])
 * @method \Aws\Result describeComputationModel(array $args = [])
 * @phpstan-method \Aws\Result describeComputationModel(array{computationModelId?: string, computationModelVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComputationModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComputationModelAsync(array{computationModelId?: string, computationModelVersion?: string, ...} $args = [])
 * @method \Aws\Result describeComputationModelExecutionSummary(array $args = [])
 * @phpstan-method \Aws\Result describeComputationModelExecutionSummary(array{computationModelId?: string, resolveToResourceType?: 'ASSET', resolveToResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComputationModelExecutionSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComputationModelExecutionSummaryAsync(array{computationModelId?: string, resolveToResourceType?: 'ASSET', resolveToResourceId?: string, ...} $args = [])
 * @method \Aws\Result describeDashboard(array $args = [])
 * @phpstan-method \Aws\Result describeDashboard(array{dashboardId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDashboardAsync(array{dashboardId?: string, ...} $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @phpstan-method \Aws\Result describeDataset(array{datasetId?: string, workspaceName?: string, datasetVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetAsync(array{datasetId?: string, workspaceName?: string, datasetVersion?: string, ...} $args = [])
 * @method \Aws\Result describeDatasetExportJob(array $args = [])
 * @phpstan-method \Aws\Result describeDatasetExportJob(array{workspaceName?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetExportJobAsync(array{workspaceName?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result describeDefaultEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeDefaultEncryptionConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDefaultEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDefaultEncryptionConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result describeEnrichmentJob(array $args = [])
 * @phpstan-method \Aws\Result describeEnrichmentJob(array{workspaceName?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnrichmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnrichmentJobAsync(array{workspaceName?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result describeExecution(array $args = [])
 * @phpstan-method \Aws\Result describeExecution(array{executionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExecutionAsync(array{executionId?: string, ...} $args = [])
 * @method \Aws\Result describeGateway(array $args = [])
 * @phpstan-method \Aws\Result describeGateway(array{gatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGatewayAsync(array{gatewayId?: string, ...} $args = [])
 * @method \Aws\Result describeGatewayCapabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeGatewayCapabilityConfiguration(array{gatewayId?: string, capabilityNamespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGatewayCapabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGatewayCapabilityConfigurationAsync(array{gatewayId?: string, capabilityNamespace?: string, ...} $args = [])
 * @method \Aws\Result describeLoggingOptions(array $args = [])
 * @phpstan-method \Aws\Result describeLoggingOptions(array{workspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoggingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoggingOptionsAsync(array{workspaceName?: string, ...} $args = [])
 * @method \Aws\Result describePipeline(array $args = [])
 * @phpstan-method \Aws\Result describePipeline(array{workspaceName?: string, pipelineName?: string, pipelineVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePipelineAsync(array{workspaceName?: string, pipelineName?: string, pipelineVersion?: string, ...} $args = [])
 * @method \Aws\Result describePipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result describePipelineExecution(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     pipelineExecutionId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePipelineExecutionAsync(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     pipelineExecutionId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePortal(array $args = [])
 * @phpstan-method \Aws\Result describePortal(array{portalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePortalAsync(array{portalId?: string, ...} $args = [])
 * @method \Aws\Result describeProject(array $args = [])
 * @phpstan-method \Aws\Result describeProject(array{projectId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProjectAsync(array{projectId?: string, ...} $args = [])
 * @method \Aws\Result describeQuery(array $args = [])
 * @phpstan-method \Aws\Result describeQuery(array{workspaceName?: string, queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQueryAsync(array{workspaceName?: string, queryId?: string, ...} $args = [])
 * @method \Aws\Result describeSearch(array $args = [])
 * @phpstan-method \Aws\Result describeSearch(array{workspaceName?: string, searchId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSearchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSearchAsync(array{workspaceName?: string, searchId?: string, ...} $args = [])
 * @method \Aws\Result describeStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeStorageConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStorageConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result describeTask(array $args = [])
 * @phpstan-method \Aws\Result describeTask(array{workspaceName?: string, taskName?: string, taskVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTaskAsync(array{workspaceName?: string, taskName?: string, taskVersion?: string, ...} $args = [])
 * @method \Aws\Result describeTimeSeries(array $args = [])
 * @phpstan-method \Aws\Result describeTimeSeries(array{alias?: string, assetId?: string, propertyId?: string, workspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTimeSeriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTimeSeriesAsync(array{alias?: string, assetId?: string, propertyId?: string, workspaceName?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspace(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspace(array{workspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceAsync(array{workspaceName?: string, ...} $args = [])
 * @method \Aws\Result disassociateAssets(array $args = [])
 * @phpstan-method \Aws\Result disassociateAssets(array{assetId?: string, hierarchyId?: string, childAssetId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAssetsAsync(array{assetId?: string, hierarchyId?: string, childAssetId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateTimeSeriesFromAssetProperty(array $args = [])
 * @phpstan-method \Aws\Result disassociateTimeSeriesFromAssetProperty(array{alias?: string, assetId?: string, propertyId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTimeSeriesFromAssetPropertyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateTimeSeriesFromAssetPropertyAsync(array{alias?: string, assetId?: string, propertyId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result executeAction(array $args = [])
 * @phpstan-method \Aws\Result executeAction(array{
 *     targetResource?: array{assetId?: string, computationModelId?: string, ...},
 *     actionDefinitionId?: string,
 *     actionPayload?: array{stringValue?: string, ...},
 *     clientToken?: string,
 *     resolveTo?: array{assetId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeActionAsync(array{
 *     targetResource?: array{assetId?: string, computationModelId?: string, ...},
 *     actionDefinitionId?: string,
 *     actionPayload?: array{stringValue?: string, ...},
 *     clientToken?: string,
 *     resolveTo?: array{assetId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeQuery(array $args = [])
 * @phpstan-method \Aws\Result executeQuery(array{queryStatement?: string, nextToken?: string, maxResults?: int, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeQueryAsync(array{queryStatement?: string, nextToken?: string, maxResults?: int, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getAssetPropertyAggregates(array $args = [])
 * @phpstan-method \Aws\Result getAssetPropertyAggregates(array{
 *     assetId?: string,
 *     propertyId?: string,
 *     propertyAlias?: string,
 *     aggregateTypes?: list<'AVERAGE'|'COUNT'|'MAXIMUM'|'MINIMUM'|'STANDARD_DEVIATION'|'SUM'>,
 *     resolution?: string,
 *     qualities?: list<'BAD'|'GOOD'|'UNCERTAIN'>,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     timeOrdering?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetPropertyAggregatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetPropertyAggregatesAsync(array{
 *     assetId?: string,
 *     propertyId?: string,
 *     propertyAlias?: string,
 *     aggregateTypes?: list<'AVERAGE'|'COUNT'|'MAXIMUM'|'MINIMUM'|'STANDARD_DEVIATION'|'SUM'>,
 *     resolution?: string,
 *     qualities?: list<'BAD'|'GOOD'|'UNCERTAIN'>,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     timeOrdering?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAssetPropertyValue(array $args = [])
 * @phpstan-method \Aws\Result getAssetPropertyValue(array{assetId?: string, propertyId?: string, propertyAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetPropertyValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetPropertyValueAsync(array{assetId?: string, propertyId?: string, propertyAlias?: string, ...} $args = [])
 * @method \Aws\Result getAssetPropertyValueHistory(array $args = [])
 * @phpstan-method \Aws\Result getAssetPropertyValueHistory(array{
 *     assetId?: string,
 *     propertyId?: string,
 *     propertyAlias?: string,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     qualities?: list<'BAD'|'GOOD'|'UNCERTAIN'>,
 *     timeOrdering?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetPropertyValueHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetPropertyValueHistoryAsync(array{
 *     assetId?: string,
 *     propertyId?: string,
 *     propertyAlias?: string,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     qualities?: list<'BAD'|'GOOD'|'UNCERTAIN'>,
 *     timeOrdering?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCaptureData(array $args = [])
 * @phpstan-method \Aws\Result getCaptureData(array{
 *     workspaceName?: string,
 *     startTime?: array{timeInSeconds?: int, offsetInNanos?: int, ...},
 *     endTime?: array{timeInSeconds?: int, offsetInNanos?: int, ...},
 *     timeSeriesId?: string,
 *     propertyAlias?: string,
 *     formatSettings?: array{framesPerSecond?: int, widthInPixels?: int, heightInPixels?: int, ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCaptureDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCaptureDataAsync(array{
 *     workspaceName?: string,
 *     startTime?: array{timeInSeconds?: int, offsetInNanos?: int, ...},
 *     endTime?: array{timeInSeconds?: int, offsetInNanos?: int, ...},
 *     timeSeriesId?: string,
 *     propertyAlias?: string,
 *     formatSettings?: array{framesPerSecond?: int, widthInPixels?: int, heightInPixels?: int, ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getInterpolatedAssetPropertyValues(array $args = [])
 * @phpstan-method \Aws\Result getInterpolatedAssetPropertyValues(array{
 *     assetId?: string,
 *     propertyId?: string,
 *     propertyAlias?: string,
 *     startTimeInSeconds?: int,
 *     startTimeOffsetInNanos?: int,
 *     endTimeInSeconds?: int,
 *     endTimeOffsetInNanos?: int,
 *     quality?: 'BAD'|'GOOD'|'UNCERTAIN',
 *     intervalInSeconds?: int,
 *     nextToken?: string,
 *     maxResults?: int,
 *     type?: string,
 *     intervalWindowInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getInterpolatedAssetPropertyValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInterpolatedAssetPropertyValuesAsync(array{
 *     assetId?: string,
 *     propertyId?: string,
 *     propertyAlias?: string,
 *     startTimeInSeconds?: int,
 *     startTimeOffsetInNanos?: int,
 *     endTimeInSeconds?: int,
 *     endTimeOffsetInNanos?: int,
 *     quality?: 'BAD'|'GOOD'|'UNCERTAIN',
 *     intervalInSeconds?: int,
 *     nextToken?: string,
 *     maxResults?: int,
 *     type?: string,
 *     intervalWindowInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getQueryResults(array $args = [])
 * @phpstan-method \Aws\Result getQueryResults(array{workspaceName?: string, queryId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array{workspaceName?: string, queryId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getSearchResults(array $args = [])
 * @phpstan-method \Aws\Result getSearchResults(array{searchId?: string, workspaceName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSearchResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSearchResultsAsync(array{searchId?: string, workspaceName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result invokeAssistant(array $args = [])
 * @phpstan-method \Aws\Result invokeAssistant(array{conversationId?: string, message?: string, enableTrace?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeAssistantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeAssistantAsync(array{conversationId?: string, message?: string, enableTrace?: bool, ...} $args = [])
 * @method \Aws\Result listAccessPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAccessPolicies(array{
 *     identityType?: 'GROUP'|'IAM'|'USER',
 *     identityId?: string,
 *     resourceType?: 'PORTAL'|'PROJECT',
 *     resourceId?: string,
 *     iamArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPoliciesAsync(array{
 *     identityType?: 'GROUP'|'IAM'|'USER',
 *     identityId?: string,
 *     resourceType?: 'PORTAL'|'PROJECT',
 *     resourceId?: string,
 *     iamArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listActions(array $args = [])
 * @phpstan-method \Aws\Result listActions(array{
 *     targetResourceType?: 'ASSET'|'COMPUTATION_MODEL',
 *     targetResourceId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     resolveToResourceType?: 'ASSET',
 *     resolveToResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActionsAsync(array{
 *     targetResourceType?: 'ASSET'|'COMPUTATION_MODEL',
 *     targetResourceId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     resolveToResourceType?: 'ASSET',
 *     resolveToResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssetModelCompositeModels(array $args = [])
 * @phpstan-method \Aws\Result listAssetModelCompositeModels(array{assetModelId?: string, nextToken?: string, maxResults?: int, assetModelVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetModelCompositeModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetModelCompositeModelsAsync(array{assetModelId?: string, nextToken?: string, maxResults?: int, assetModelVersion?: string, ...} $args = [])
 * @method \Aws\Result listAssetModelProperties(array $args = [])
 * @phpstan-method \Aws\Result listAssetModelProperties(array{
 *     assetModelId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: 'ALL'|'BASE',
 *     assetModelVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetModelPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetModelPropertiesAsync(array{
 *     assetModelId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: 'ALL'|'BASE',
 *     assetModelVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssetModels(array $args = [])
 * @phpstan-method \Aws\Result listAssetModels(array{
 *     assetModelTypes?: list<'ASSET_MODEL'|'COMPONENT_MODEL'|'INTERFACE'>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     assetModelVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetModelsAsync(array{
 *     assetModelTypes?: list<'ASSET_MODEL'|'COMPONENT_MODEL'|'INTERFACE'>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     assetModelVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssetProperties(array $args = [])
 * @phpstan-method \Aws\Result listAssetProperties(array{assetId?: string, nextToken?: string, maxResults?: int, filter?: 'ALL'|'BASE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetPropertiesAsync(array{assetId?: string, nextToken?: string, maxResults?: int, filter?: 'ALL'|'BASE', ...} $args = [])
 * @method \Aws\Result listAssetRelationships(array $args = [])
 * @phpstan-method \Aws\Result listAssetRelationships(array{assetId?: string, traversalType?: 'PATH_TO_ROOT', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetRelationshipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetRelationshipsAsync(array{assetId?: string, traversalType?: 'PATH_TO_ROOT', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssets(array $args = [])
 * @phpstan-method \Aws\Result listAssets(array{nextToken?: string, maxResults?: int, assetModelId?: string, filter?: 'ALL'|'TOP_LEVEL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetsAsync(array{nextToken?: string, maxResults?: int, assetModelId?: string, filter?: 'ALL'|'TOP_LEVEL', ...} $args = [])
 * @method \Aws\Result listAssociatedAssets(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedAssets(array{
 *     assetId?: string,
 *     hierarchyId?: string,
 *     traversalDirection?: 'CHILD'|'PARENT',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedAssetsAsync(array{
 *     assetId?: string,
 *     hierarchyId?: string,
 *     traversalDirection?: 'CHILD'|'PARENT',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBulkImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listBulkImportJobs(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: 'ALL'|'CANCELLED'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'PENDING'|'RUNNING',
 *     workspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBulkImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBulkImportJobsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: 'ALL'|'CANCELLED'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'PENDING'|'RUNNING',
 *     workspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCompositionRelationships(array $args = [])
 * @phpstan-method \Aws\Result listCompositionRelationships(array{assetModelId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCompositionRelationshipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCompositionRelationshipsAsync(array{assetModelId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listComputationModelDataBindingUsages(array $args = [])
 * @phpstan-method \Aws\Result listComputationModelDataBindingUsages(array{
 *     dataBindingValueFilter?: array{
 *         asset?: array{assetId?: string, ...},
 *         assetModel?: array{assetModelId?: string, ...},
 *         assetProperty?: array{assetId?: string, propertyId?: string, ...},
 *         assetModelProperty?: array{assetModelId?: string, propertyId?: string, ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputationModelDataBindingUsagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComputationModelDataBindingUsagesAsync(array{
 *     dataBindingValueFilter?: array{
 *         asset?: array{assetId?: string, ...},
 *         assetModel?: array{assetModelId?: string, ...},
 *         assetProperty?: array{assetId?: string, propertyId?: string, ...},
 *         assetModelProperty?: array{assetModelId?: string, propertyId?: string, ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listComputationModelResolveToResources(array $args = [])
 * @phpstan-method \Aws\Result listComputationModelResolveToResources(array{computationModelId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputationModelResolveToResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComputationModelResolveToResourcesAsync(array{computationModelId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listComputationModels(array $args = [])
 * @phpstan-method \Aws\Result listComputationModels(array{computationModelType?: 'ANOMALY_DETECTION', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputationModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComputationModelsAsync(array{computationModelType?: 'ANOMALY_DETECTION', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDashboards(array $args = [])
 * @phpstan-method \Aws\Result listDashboards(array{projectId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDashboardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDashboardsAsync(array{projectId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDatasetDataSegmentRelationships(array $args = [])
 * @phpstan-method \Aws\Result listDatasetDataSegmentRelationships(array{datasetId?: string, workspaceName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetDataSegmentRelationshipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetDataSegmentRelationshipsAsync(array{datasetId?: string, workspaceName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDatasetDataSegments(array $args = [])
 * @phpstan-method \Aws\Result listDatasetDataSegments(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     datasetVersion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetDataSegmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetDataSegmentsAsync(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     datasetVersion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDatasetExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listDatasetExportJobs(array{
 *     workspaceName?: string,
 *     filter?: 'ALL'|'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'RUNNING'|'SUBMITTED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetExportJobsAsync(array{
 *     workspaceName?: string,
 *     filter?: 'ALL'|'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'RUNNING'|'SUBMITTED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{
 *     sourceType?: 'KENDRA'|'SITEWISE',
 *     workspaceName?: string,
 *     datasetType?: 'CURATED'|'EXTERNAL'|'SESSION',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{
 *     sourceType?: 'KENDRA'|'SITEWISE',
 *     workspaceName?: string,
 *     datasetType?: 'CURATED'|'EXTERNAL'|'SESSION',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnrichmentJobs(array $args = [])
 * @phpstan-method \Aws\Result listEnrichmentJobs(array{
 *     workspaceName?: string,
 *     datasetId?: string,
 *     propertyAlias?: string,
 *     timeSeriesId?: string,
 *     status?: 'CANCELLED'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING'|'TIMED_OUT',
 *     jobType?: 'EVENT_DETECTION',
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnrichmentJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnrichmentJobsAsync(array{
 *     workspaceName?: string,
 *     datasetId?: string,
 *     propertyAlias?: string,
 *     timeSeriesId?: string,
 *     status?: 'CANCELLED'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING'|'TIMED_OUT',
 *     jobType?: 'EVENT_DETECTION',
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listExecutions(array $args = [])
 * @phpstan-method \Aws\Result listExecutions(array{
 *     targetResourceType?: 'ASSET'|'COMPUTATION_MODEL',
 *     targetResourceId?: string,
 *     resolveToResourceType?: 'ASSET',
 *     resolveToResourceId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     actionType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExecutionsAsync(array{
 *     targetResourceType?: 'ASSET'|'COMPUTATION_MODEL',
 *     targetResourceId?: string,
 *     resolveToResourceType?: 'ASSET',
 *     resolveToResourceId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     actionType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGateways(array $args = [])
 * @phpstan-method \Aws\Result listGateways(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewaysAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listInterfaceRelationships(array $args = [])
 * @phpstan-method \Aws\Result listInterfaceRelationships(array{interfaceAssetModelId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInterfaceRelationshipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInterfaceRelationshipsAsync(array{interfaceAssetModelId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPipelineExecutions(array $args = [])
 * @phpstan-method \Aws\Result listPipelineExecutions(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     state?: 'CANCELLED'|'CANCELLING'|'FAILED'|'NOT_STARTED'|'RUNNING'|'SUCCEEDED',
 *     startTimeAfter?: int|string|\DateTimeInterface,
 *     startTimeBefore?: int|string|\DateTimeInterface,
 *     endTimeAfter?: int|string|\DateTimeInterface,
 *     endTimeBefore?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelineExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineExecutionsAsync(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     state?: 'CANCELLED'|'CANCELLING'|'FAILED'|'NOT_STARTED'|'RUNNING'|'SUCCEEDED',
 *     startTimeAfter?: int|string|\DateTimeInterface,
 *     startTimeBefore?: int|string|\DateTimeInterface,
 *     endTimeAfter?: int|string|\DateTimeInterface,
 *     endTimeBefore?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPipelines(array $args = [])
 * @phpstan-method \Aws\Result listPipelines(array{workspaceName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelinesAsync(array{workspaceName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPortals(array $args = [])
 * @phpstan-method \Aws\Result listPortals(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPortalsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listProjectAssets(array $args = [])
 * @phpstan-method \Aws\Result listProjectAssets(array{projectId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectAssetsAsync(array{projectId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @phpstan-method \Aws\Result listProjects(array{portalId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectsAsync(array{portalId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueries(array $args = [])
 * @phpstan-method \Aws\Result listQueries(array{workspaceName?: string, filter?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueriesAsync(array{workspaceName?: string, filter?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSearches(array $args = [])
 * @phpstan-method \Aws\Result listSearches(array{
 *     workspaceName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     listSearchesFilters?: array{
 *         statusFilter?: list<'FAILED'|'QUEUED'|'RUNNING'|'SUCCEEDED'>,
 *         startedAfter?: int|string|\DateTimeInterface,
 *         startedBefore?: int|string|\DateTimeInterface,
 *         groupIdFilter?: list<string>,
 *         searchTypeFilter?: list<'DEEP'|'QUICK'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSearchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSearchesAsync(array{
 *     workspaceName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     listSearchesFilters?: array{
 *         statusFilter?: list<'FAILED'|'QUEUED'|'RUNNING'|'SUCCEEDED'>,
 *         startedAfter?: int|string|\DateTimeInterface,
 *         startedBefore?: int|string|\DateTimeInterface,
 *         groupIdFilter?: list<string>,
 *         searchTypeFilter?: list<'DEEP'|'QUICK'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTasks(array $args = [])
 * @phpstan-method \Aws\Result listTasks(array{workspaceName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTasksAsync(array{workspaceName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTimeSeries(array $args = [])
 * @phpstan-method \Aws\Result listTimeSeries(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     assetId?: string,
 *     aliasPrefix?: string,
 *     timeSeriesType?: 'ASSOCIATED'|'DISASSOCIATED',
 *     workspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTimeSeriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTimeSeriesAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     assetId?: string,
 *     aliasPrefix?: string,
 *     timeSeriesType?: 'ASSOCIATED'|'DISASSOCIATED',
 *     workspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaces(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putAssetModelInterfaceRelationship(array $args = [])
 * @phpstan-method \Aws\Result putAssetModelInterfaceRelationship(array{
 *     assetModelId?: string,
 *     interfaceAssetModelId?: string,
 *     propertyMappingConfiguration?: array{matchByPropertyName?: bool, createMissingProperty?: bool, overrides?: list<array>, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAssetModelInterfaceRelationshipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAssetModelInterfaceRelationshipAsync(array{
 *     assetModelId?: string,
 *     interfaceAssetModelId?: string,
 *     propertyMappingConfiguration?: array{matchByPropertyName?: bool, createMissingProperty?: bool, overrides?: list<array>, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDefaultEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putDefaultEncryptionConfiguration(array{encryptionType?: 'KMS_BASED_ENCRYPTION'|'SITEWISE_DEFAULT_ENCRYPTION', kmsKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDefaultEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDefaultEncryptionConfigurationAsync(array{encryptionType?: 'KMS_BASED_ENCRYPTION'|'SITEWISE_DEFAULT_ENCRYPTION', kmsKeyId?: string, ...} $args = [])
 * @method \Aws\Result putLoggingOptions(array $args = [])
 * @phpstan-method \Aws\Result putLoggingOptions(array{loggingOptions?: array{level?: 'ERROR'|'INFO'|'OFF', ...}, workspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putLoggingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLoggingOptionsAsync(array{loggingOptions?: array{level?: 'ERROR'|'INFO'|'OFF', ...}, workspaceName?: string, ...} $args = [])
 * @method \Aws\Result putStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putStorageConfiguration(array{
 *     storageType?: 'MULTI_LAYER_STORAGE'|'SITEWISE_DEFAULT_STORAGE',
 *     multiLayerStorage?: array{customerManagedS3Storage?: array{s3ResourceArn?: string, roleArn?: string, ...}, ...},
 *     disassociatedDataStorage?: 'DISABLED'|'ENABLED',
 *     retentionPeriod?: array{numberOfDays?: int, unlimited?: bool, ...},
 *     warmTier?: 'DISABLED'|'ENABLED',
 *     warmTierRetentionPeriod?: array{numberOfDays?: int, unlimited?: bool, ...},
 *     disallowIngestNullNaN?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putStorageConfigurationAsync(array{
 *     storageType?: 'MULTI_LAYER_STORAGE'|'SITEWISE_DEFAULT_STORAGE',
 *     multiLayerStorage?: array{customerManagedS3Storage?: array{s3ResourceArn?: string, roleArn?: string, ...}, ...},
 *     disassociatedDataStorage?: 'DISABLED'|'ENABLED',
 *     retentionPeriod?: array{numberOfDays?: int, unlimited?: bool, ...},
 *     warmTier?: 'DISABLED'|'ENABLED',
 *     warmTierRetentionPeriod?: array{numberOfDays?: int, unlimited?: bool, ...},
 *     disallowIngestNullNaN?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startPipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result startPipelineExecution(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     executionEnvironmentVariableOverrides?: array{global?: array<string, string>, computeNodes?: array<string, array<string, string>>, ...},
 *     executionMountOverrides?: array{computeNodes?: array<string, list<array>>, ...},
 *     executionPriority?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPipelineExecutionAsync(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     executionEnvironmentVariableOverrides?: array{global?: array<string, string>, computeNodes?: array<string, array<string, string>>, ...},
 *     executionMountOverrides?: array{computeNodes?: array<string, list<array>>, ...},
 *     executionPriority?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startQuery(array $args = [])
 * @phpstan-method \Aws\Result startQuery(array{clientToken?: string, workspaceName?: string, queryStatement?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryAsync(array{clientToken?: string, workspaceName?: string, queryStatement?: string, ...} $args = [])
 * @method \Aws\Result startSearch(array $args = [])
 * @phpstan-method \Aws\Result startSearch(array{
 *     workspaceName?: string,
 *     queryStatement?: string,
 *     clientToken?: string,
 *     searchType?: 'DEEP'|'QUICK',
 *     searchFilters?: array{timeSeriesIds?: list<string>, datasetIds?: list<string>, timeIntervals?: list<array>, ...},
 *     groupId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSearchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSearchAsync(array{
 *     workspaceName?: string,
 *     queryStatement?: string,
 *     clientToken?: string,
 *     searchType?: 'DEEP'|'QUICK',
 *     searchFilters?: array{timeSeriesIds?: list<string>, datasetIds?: list<string>, timeIntervals?: list<array>, ...},
 *     groupId?: string,
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
 * @method \Aws\Result updateAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateAccessPolicy(array{
 *     accessPolicyId?: string,
 *     accessPolicyIdentity?: array{
 *         user?: array{id?: string, ...},
 *         group?: array{id?: string, ...},
 *         iamUser?: array{arn?: string, ...},
 *         iamRole?: array{arn?: string, ...},
 *         ...,
 *     },
 *     accessPolicyResource?: array{portal?: array{id?: string, ...}, project?: array{id?: string, ...}, ...},
 *     accessPolicyPermission?: 'ADMINISTRATOR'|'VIEWER',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessPolicyAsync(array{
 *     accessPolicyId?: string,
 *     accessPolicyIdentity?: array{
 *         user?: array{id?: string, ...},
 *         group?: array{id?: string, ...},
 *         iamUser?: array{arn?: string, ...},
 *         iamRole?: array{arn?: string, ...},
 *         ...,
 *     },
 *     accessPolicyResource?: array{portal?: array{id?: string, ...}, project?: array{id?: string, ...}, ...},
 *     accessPolicyPermission?: 'ADMINISTRATOR'|'VIEWER',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAsset(array $args = [])
 * @phpstan-method \Aws\Result updateAsset(array{
 *     assetId?: string,
 *     assetExternalId?: string,
 *     assetName?: string,
 *     clientToken?: string,
 *     assetDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetAsync(array{
 *     assetId?: string,
 *     assetExternalId?: string,
 *     assetName?: string,
 *     clientToken?: string,
 *     assetDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssetModel(array $args = [])
 * @phpstan-method \Aws\Result updateAssetModel(array{
 *     assetModelId?: string,
 *     assetModelExternalId?: string,
 *     assetModelName?: string,
 *     assetModelDescription?: string,
 *     assetModelProperties?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         dataType?: 'ANNOTATION'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'JSON'|'STRING'|'STRUCT'|'VIDEO',
 *         dataTypeSpec?: string,
 *         unit?: string,
 *         type?: array,
 *         path?: list<array>,
 *         ...,
 *     }>,
 *     assetModelHierarchies?: list<array{id?: string, externalId?: string, name?: string, childAssetModelId?: string, ...}>,
 *     assetModelCompositeModels?: list<array{
 *         name?: string,
 *         description?: string,
 *         type?: string,
 *         properties?: list<array>,
 *         id?: string,
 *         externalId?: string,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetModelAsync(array{
 *     assetModelId?: string,
 *     assetModelExternalId?: string,
 *     assetModelName?: string,
 *     assetModelDescription?: string,
 *     assetModelProperties?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         dataType?: 'ANNOTATION'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'JSON'|'STRING'|'STRUCT'|'VIDEO',
 *         dataTypeSpec?: string,
 *         unit?: string,
 *         type?: array,
 *         path?: list<array>,
 *         ...,
 *     }>,
 *     assetModelHierarchies?: list<array{id?: string, externalId?: string, name?: string, childAssetModelId?: string, ...}>,
 *     assetModelCompositeModels?: list<array{
 *         name?: string,
 *         description?: string,
 *         type?: string,
 *         properties?: list<array>,
 *         id?: string,
 *         externalId?: string,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssetModelCompositeModel(array $args = [])
 * @phpstan-method \Aws\Result updateAssetModelCompositeModel(array{
 *     assetModelId?: string,
 *     assetModelCompositeModelId?: string,
 *     assetModelCompositeModelExternalId?: string,
 *     assetModelCompositeModelDescription?: string,
 *     assetModelCompositeModelName?: string,
 *     clientToken?: string,
 *     assetModelCompositeModelProperties?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         dataType?: 'ANNOTATION'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'JSON'|'STRING'|'STRUCT'|'VIDEO',
 *         dataTypeSpec?: string,
 *         unit?: string,
 *         type?: array,
 *         path?: list<array>,
 *         ...,
 *     }>,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetModelCompositeModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetModelCompositeModelAsync(array{
 *     assetModelId?: string,
 *     assetModelCompositeModelId?: string,
 *     assetModelCompositeModelExternalId?: string,
 *     assetModelCompositeModelDescription?: string,
 *     assetModelCompositeModelName?: string,
 *     clientToken?: string,
 *     assetModelCompositeModelProperties?: list<array{
 *         id?: string,
 *         externalId?: string,
 *         name?: string,
 *         dataType?: 'ANNOTATION'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'JSON'|'STRING'|'STRUCT'|'VIDEO',
 *         dataTypeSpec?: string,
 *         unit?: string,
 *         type?: array,
 *         path?: list<array>,
 *         ...,
 *     }>,
 *     ifMatch?: string,
 *     ifNoneMatch?: string,
 *     matchForVersionType?: 'ACTIVE'|'LATEST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssetProperty(array $args = [])
 * @phpstan-method \Aws\Result updateAssetProperty(array{
 *     assetId?: string,
 *     propertyId?: string,
 *     propertyAlias?: string,
 *     propertyNotificationState?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     propertyUnit?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetPropertyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetPropertyAsync(array{
 *     assetId?: string,
 *     propertyId?: string,
 *     propertyAlias?: string,
 *     propertyNotificationState?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     propertyUnit?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateComputationModel(array $args = [])
 * @phpstan-method \Aws\Result updateComputationModel(array{
 *     computationModelId?: string,
 *     computationModelName?: string,
 *     computationModelDescription?: string,
 *     computationModelConfiguration?: array{anomalyDetection?: array{inputProperties?: string, resultProperty?: string, ...}, ...},
 *     computationModelDataBinding?: array<string, array{assetModelProperty?: array, assetProperty?: array, list?: list<array>, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComputationModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComputationModelAsync(array{
 *     computationModelId?: string,
 *     computationModelName?: string,
 *     computationModelDescription?: string,
 *     computationModelConfiguration?: array{anomalyDetection?: array{inputProperties?: string, resultProperty?: string, ...}, ...},
 *     computationModelDataBinding?: array<string, array{assetModelProperty?: array, assetProperty?: array, list?: list<array>, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDashboard(array $args = [])
 * @phpstan-method \Aws\Result updateDashboard(array{
 *     dashboardId?: string,
 *     dashboardName?: string,
 *     dashboardDescription?: string,
 *     dashboardDefinition?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDashboardAsync(array{
 *     dashboardId?: string,
 *     dashboardName?: string,
 *     dashboardDescription?: string,
 *     dashboardDefinition?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataset(array $args = [])
 * @phpstan-method \Aws\Result updateDataset(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     datasetName?: string,
 *     datasetDescription?: string,
 *     datasetConfig?: array{session?: array{sessionStartTimestamp?: array, sessionEndTimestamp?: array, ...}, ...},
 *     metadata?: array<string, string>,
 *     datasetSource?: array{
 *         sourceType?: 'KENDRA'|'SITEWISE',
 *         sourceFormat?: 'KNOWLEDGE_BASE'|'TIMESERIES',
 *         sourceDetail?: array{kendra?: array, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasetAsync(array{
 *     datasetId?: string,
 *     workspaceName?: string,
 *     datasetName?: string,
 *     datasetDescription?: string,
 *     datasetConfig?: array{session?: array{sessionStartTimestamp?: array, sessionEndTimestamp?: array, ...}, ...},
 *     metadata?: array<string, string>,
 *     datasetSource?: array{
 *         sourceType?: 'KENDRA'|'SITEWISE',
 *         sourceFormat?: 'KNOWLEDGE_BASE'|'TIMESERIES',
 *         sourceDetail?: array{kendra?: array, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGateway(array $args = [])
 * @phpstan-method \Aws\Result updateGateway(array{gatewayId?: string, gatewayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayAsync(array{gatewayId?: string, gatewayName?: string, ...} $args = [])
 * @method \Aws\Result updateGatewayCapabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateGatewayCapabilityConfiguration(array{gatewayId?: string, capabilityNamespace?: string, capabilityConfiguration?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayCapabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayCapabilityConfigurationAsync(array{gatewayId?: string, capabilityNamespace?: string, capabilityConfiguration?: string, ...} $args = [])
 * @method \Aws\Result updatePipeline(array $args = [])
 * @phpstan-method \Aws\Result updatePipeline(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     description?: string,
 *     environmentVariables?: array<string, string>,
 *     computations?: list<array{
 *         computeNodeName?: string,
 *         taskName?: string,
 *         environmentVariables?: array<string, string>,
 *         dependsOn?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePipelineAsync(array{
 *     workspaceName?: string,
 *     pipelineName?: string,
 *     description?: string,
 *     environmentVariables?: array<string, string>,
 *     computations?: list<array{
 *         computeNodeName?: string,
 *         taskName?: string,
 *         environmentVariables?: array<string, string>,
 *         dependsOn?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePortal(array $args = [])
 * @phpstan-method \Aws\Result updatePortal(array{
 *     portalId?: string,
 *     portalName?: string,
 *     portalDescription?: string,
 *     portalContactEmail?: string,
 *     portalLogoImage?: array{
 *         id?: string,
 *         file?: array{data?: string|resource|\Psr\Http\Message\StreamInterface, type?: 'PNG', ...},
 *         ...,
 *     },
 *     roleArn?: string,
 *     clientToken?: string,
 *     notificationSenderEmail?: string,
 *     alarms?: array{alarmRoleArn?: string, notificationLambdaArn?: string, ...},
 *     portalType?: 'SITEWISE_PORTAL_V1'|'SITEWISE_PORTAL_V2',
 *     portalTypeConfiguration?: array<string, array{portalTools?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePortalAsync(array{
 *     portalId?: string,
 *     portalName?: string,
 *     portalDescription?: string,
 *     portalContactEmail?: string,
 *     portalLogoImage?: array{
 *         id?: string,
 *         file?: array{data?: string|resource|\Psr\Http\Message\StreamInterface, type?: 'PNG', ...},
 *         ...,
 *     },
 *     roleArn?: string,
 *     clientToken?: string,
 *     notificationSenderEmail?: string,
 *     alarms?: array{alarmRoleArn?: string, notificationLambdaArn?: string, ...},
 *     portalType?: 'SITEWISE_PORTAL_V1'|'SITEWISE_PORTAL_V2',
 *     portalTypeConfiguration?: array<string, array{portalTools?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @phpstan-method \Aws\Result updateProject(array{projectId?: string, projectName?: string, projectDescription?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectAsync(array{projectId?: string, projectName?: string, projectDescription?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateTask(array $args = [])
 * @phpstan-method \Aws\Result updateTask(array{
 *     workspaceName?: string,
 *     taskName?: string,
 *     description?: string,
 *     taskConfiguration?: array{
 *         containerTaskConfiguration?: array{
 *             ecrUri?: string,
 *             taskExecutionRole?: string,
 *             processingType?: 'GENERIC_COMPUTE_PROCESSING'|'HARDWARE_ACCELERATED_PROCESSING',
 *             processingUnit?: 'UNITS_12'|'UNITS_16'|'UNITS_2'|'UNITS_24'|'UNITS_32'|'UNITS_36'|'UNITS_4'|'UNITS_48'|'UNITS_60'|'UNITS_64'|'UNITS_72'|'UNITS_8'|'UNITS_84'|'UNITS_96',
 *             ephemeralStorageConfiguration?: array,
 *             command?: list<string>,
 *             timeoutSeconds?: int,
 *             environmentVariables?: array<string, string>,
 *             mounts?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTaskAsync(array{
 *     workspaceName?: string,
 *     taskName?: string,
 *     description?: string,
 *     taskConfiguration?: array{
 *         containerTaskConfiguration?: array{
 *             ecrUri?: string,
 *             taskExecutionRole?: string,
 *             processingType?: 'GENERIC_COMPUTE_PROCESSING'|'HARDWARE_ACCELERATED_PROCESSING',
 *             processingUnit?: 'UNITS_12'|'UNITS_16'|'UNITS_2'|'UNITS_24'|'UNITS_32'|'UNITS_36'|'UNITS_4'|'UNITS_48'|'UNITS_60'|'UNITS_64'|'UNITS_72'|'UNITS_8'|'UNITS_84'|'UNITS_96',
 *             ephemeralStorageConfiguration?: array,
 *             command?: list<string>,
 *             timeoutSeconds?: int,
 *             environmentVariables?: array<string, string>,
 *             mounts?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkspace(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspace(array{
 *     workspaceName?: string,
 *     workspaceDescription?: string,
 *     encryptionConfiguration?: array{encryptionType?: 'KMS_BASED_ENCRYPTION'|'SITEWISE_DEFAULT_ENCRYPTION', kmsKeyId?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceAsync(array{
 *     workspaceName?: string,
 *     workspaceDescription?: string,
 *     encryptionConfiguration?: array{encryptionType?: 'KMS_BASED_ENCRYPTION'|'SITEWISE_DEFAULT_ENCRYPTION', kmsKeyId?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 */
class IoTSiteWiseClient extends AwsClient {}
