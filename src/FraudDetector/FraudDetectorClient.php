<?php
namespace Aws\FraudDetector;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Fraud Detector** service.
 * @method \Aws\Result batchCreateVariable(array $args = [])
 * @phpstan-method \Aws\Result batchCreateVariable(array{
 *     variableEntries?: list<array{
 *         name?: string,
 *         dataType?: string,
 *         dataSource?: string,
 *         defaultValue?: string,
 *         description?: string,
 *         variableType?: string,
 *         ...,
 *     }>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateVariableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateVariableAsync(array{
 *     variableEntries?: list<array{
 *         name?: string,
 *         dataType?: string,
 *         dataSource?: string,
 *         defaultValue?: string,
 *         description?: string,
 *         variableType?: string,
 *         ...,
 *     }>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetVariable(array $args = [])
 * @phpstan-method \Aws\Result batchGetVariable(array{names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetVariableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetVariableAsync(array{names?: list<string>, ...} $args = [])
 * @method \Aws\Result cancelBatchImportJob(array $args = [])
 * @phpstan-method \Aws\Result cancelBatchImportJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelBatchImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelBatchImportJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result cancelBatchPredictionJob(array $args = [])
 * @phpstan-method \Aws\Result cancelBatchPredictionJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelBatchPredictionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelBatchPredictionJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result createBatchImportJob(array $args = [])
 * @phpstan-method \Aws\Result createBatchImportJob(array{
 *     jobId?: string,
 *     inputPath?: string,
 *     outputPath?: string,
 *     eventTypeName?: string,
 *     iamRoleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBatchImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBatchImportJobAsync(array{
 *     jobId?: string,
 *     inputPath?: string,
 *     outputPath?: string,
 *     eventTypeName?: string,
 *     iamRoleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBatchPredictionJob(array $args = [])
 * @phpstan-method \Aws\Result createBatchPredictionJob(array{
 *     jobId?: string,
 *     inputPath?: string,
 *     outputPath?: string,
 *     eventTypeName?: string,
 *     detectorName?: string,
 *     detectorVersion?: string,
 *     iamRoleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBatchPredictionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBatchPredictionJobAsync(array{
 *     jobId?: string,
 *     inputPath?: string,
 *     outputPath?: string,
 *     eventTypeName?: string,
 *     detectorName?: string,
 *     detectorVersion?: string,
 *     iamRoleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDetectorVersion(array $args = [])
 * @phpstan-method \Aws\Result createDetectorVersion(array{
 *     detectorId?: string,
 *     description?: string,
 *     externalModelEndpoints?: list<string>,
 *     rules?: list<array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...}>,
 *     modelVersions?: list<array{
 *         modelId?: string,
 *         modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *         modelVersionNumber?: string,
 *         arn?: string,
 *         ...,
 *     }>,
 *     ruleExecutionMode?: 'ALL_MATCHED'|'FIRST_MATCHED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDetectorVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDetectorVersionAsync(array{
 *     detectorId?: string,
 *     description?: string,
 *     externalModelEndpoints?: list<string>,
 *     rules?: list<array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...}>,
 *     modelVersions?: list<array{
 *         modelId?: string,
 *         modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *         modelVersionNumber?: string,
 *         arn?: string,
 *         ...,
 *     }>,
 *     ruleExecutionMode?: 'ALL_MATCHED'|'FIRST_MATCHED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createList(array $args = [])
 * @phpstan-method \Aws\Result createList(array{
 *     name?: string,
 *     elements?: list<string>,
 *     variableType?: string,
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createListAsync(array{
 *     name?: string,
 *     elements?: list<string>,
 *     variableType?: string,
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModel(array $args = [])
 * @phpstan-method \Aws\Result createModel(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     description?: string,
 *     eventTypeName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     description?: string,
 *     eventTypeName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelVersion(array $args = [])
 * @phpstan-method \Aws\Result createModelVersion(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     trainingDataSource?: 'EXTERNAL_EVENTS'|'INGESTED_EVENTS',
 *     trainingDataSchema?: array{
 *         modelVariables?: list<string>,
 *         labelSchema?: array{
 *             labelMapper?: array<string, list<string>>,
 *             unlabeledEventsTreatment?: 'AUTO'|'FRAUD'|'IGNORE'|'LEGIT',
 *             ...,
 *         },
 *         ...,
 *     },
 *     externalEventsDetail?: array{dataLocation?: string, dataAccessRoleArn?: string, ...},
 *     ingestedEventsDetail?: array{ingestedEventsTimeWindow?: array{startTime?: string, endTime?: string, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelVersionAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     trainingDataSource?: 'EXTERNAL_EVENTS'|'INGESTED_EVENTS',
 *     trainingDataSchema?: array{
 *         modelVariables?: list<string>,
 *         labelSchema?: array{
 *             labelMapper?: array<string, list<string>>,
 *             unlabeledEventsTreatment?: 'AUTO'|'FRAUD'|'IGNORE'|'LEGIT',
 *             ...,
 *         },
 *         ...,
 *     },
 *     externalEventsDetail?: array{dataLocation?: string, dataAccessRoleArn?: string, ...},
 *     ingestedEventsDetail?: array{ingestedEventsTimeWindow?: array{startTime?: string, endTime?: string, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @phpstan-method \Aws\Result createRule(array{
 *     ruleId?: string,
 *     detectorId?: string,
 *     description?: string,
 *     expression?: string,
 *     language?: 'DETECTORPL',
 *     outcomes?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleAsync(array{
 *     ruleId?: string,
 *     detectorId?: string,
 *     description?: string,
 *     expression?: string,
 *     language?: 'DETECTORPL',
 *     outcomes?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVariable(array $args = [])
 * @phpstan-method \Aws\Result createVariable(array{
 *     name?: string,
 *     dataType?: 'BOOLEAN'|'DATETIME'|'FLOAT'|'INTEGER'|'STRING',
 *     dataSource?: 'EVENT'|'EXTERNAL_MODEL_SCORE'|'MODEL_SCORE',
 *     defaultValue?: string,
 *     description?: string,
 *     variableType?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVariableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVariableAsync(array{
 *     name?: string,
 *     dataType?: 'BOOLEAN'|'DATETIME'|'FLOAT'|'INTEGER'|'STRING',
 *     dataSource?: 'EVENT'|'EXTERNAL_MODEL_SCORE'|'MODEL_SCORE',
 *     defaultValue?: string,
 *     description?: string,
 *     variableType?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBatchImportJob(array $args = [])
 * @phpstan-method \Aws\Result deleteBatchImportJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBatchImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBatchImportJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result deleteBatchPredictionJob(array $args = [])
 * @phpstan-method \Aws\Result deleteBatchPredictionJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBatchPredictionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBatchPredictionJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result deleteDetector(array $args = [])
 * @phpstan-method \Aws\Result deleteDetector(array{detectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDetectorAsync(array{detectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteDetectorVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteDetectorVersion(array{detectorId?: string, detectorVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDetectorVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDetectorVersionAsync(array{detectorId?: string, detectorVersionId?: string, ...} $args = [])
 * @method \Aws\Result deleteEntityType(array $args = [])
 * @phpstan-method \Aws\Result deleteEntityType(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEntityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEntityTypeAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteEvent(array $args = [])
 * @phpstan-method \Aws\Result deleteEvent(array{eventId?: string, eventTypeName?: string, deleteAuditHistory?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventAsync(array{eventId?: string, eventTypeName?: string, deleteAuditHistory?: bool, ...} $args = [])
 * @method \Aws\Result deleteEventType(array $args = [])
 * @phpstan-method \Aws\Result deleteEventType(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventTypeAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteEventsByEventType(array $args = [])
 * @phpstan-method \Aws\Result deleteEventsByEventType(array{eventTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventsByEventTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventsByEventTypeAsync(array{eventTypeName?: string, ...} $args = [])
 * @method \Aws\Result deleteExternalModel(array $args = [])
 * @phpstan-method \Aws\Result deleteExternalModel(array{modelEndpoint?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExternalModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExternalModelAsync(array{modelEndpoint?: string, ...} $args = [])
 * @method \Aws\Result deleteLabel(array $args = [])
 * @phpstan-method \Aws\Result deleteLabel(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLabelAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteList(array $args = [])
 * @phpstan-method \Aws\Result deleteList(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteListAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteModel(array $args = [])
 * @phpstan-method \Aws\Result deleteModel(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteModelVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteModelVersion(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     modelVersionNumber?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelVersionAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     modelVersionNumber?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteOutcome(array $args = [])
 * @phpstan-method \Aws\Result deleteOutcome(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOutcomeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOutcomeAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{rule?: array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{rule?: array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...}, ...} $args = [])
 * @method \Aws\Result deleteVariable(array $args = [])
 * @phpstan-method \Aws\Result deleteVariable(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVariableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVariableAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result describeDetector(array $args = [])
 * @phpstan-method \Aws\Result describeDetector(array{detectorId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDetectorAsync(array{detectorId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result describeModelVersions(array $args = [])
 * @phpstan-method \Aws\Result describeModelVersions(array{
 *     modelId?: string,
 *     modelVersionNumber?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelVersionsAsync(array{
 *     modelId?: string,
 *     modelVersionNumber?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getBatchImportJobs(array $args = [])
 * @phpstan-method \Aws\Result getBatchImportJobs(array{jobId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBatchImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBatchImportJobsAsync(array{jobId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getBatchPredictionJobs(array $args = [])
 * @phpstan-method \Aws\Result getBatchPredictionJobs(array{jobId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBatchPredictionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBatchPredictionJobsAsync(array{jobId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getDeleteEventsByEventTypeStatus(array $args = [])
 * @phpstan-method \Aws\Result getDeleteEventsByEventTypeStatus(array{eventTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeleteEventsByEventTypeStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeleteEventsByEventTypeStatusAsync(array{eventTypeName?: string, ...} $args = [])
 * @method \Aws\Result getDetectorVersion(array $args = [])
 * @phpstan-method \Aws\Result getDetectorVersion(array{detectorId?: string, detectorVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDetectorVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDetectorVersionAsync(array{detectorId?: string, detectorVersionId?: string, ...} $args = [])
 * @method \Aws\Result getDetectors(array $args = [])
 * @phpstan-method \Aws\Result getDetectors(array{detectorId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDetectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDetectorsAsync(array{detectorId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getEntityTypes(array $args = [])
 * @phpstan-method \Aws\Result getEntityTypes(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEntityTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEntityTypesAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getEvent(array $args = [])
 * @phpstan-method \Aws\Result getEvent(array{eventId?: string, eventTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventAsync(array{eventId?: string, eventTypeName?: string, ...} $args = [])
 * @method \Aws\Result getEventPrediction(array $args = [])
 * @phpstan-method \Aws\Result getEventPrediction(array{
 *     detectorId?: string,
 *     detectorVersionId?: string,
 *     eventId?: string,
 *     eventTypeName?: string,
 *     entities?: list<array{entityType?: string, entityId?: string, ...}>,
 *     eventTimestamp?: string,
 *     eventVariables?: array<string, string>,
 *     externalModelEndpointDataBlobs?: array<string, array{byteBuffer?: string|resource|\Psr\Http\Message\StreamInterface, contentType?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventPredictionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventPredictionAsync(array{
 *     detectorId?: string,
 *     detectorVersionId?: string,
 *     eventId?: string,
 *     eventTypeName?: string,
 *     entities?: list<array{entityType?: string, entityId?: string, ...}>,
 *     eventTimestamp?: string,
 *     eventVariables?: array<string, string>,
 *     externalModelEndpointDataBlobs?: array<string, array{byteBuffer?: string|resource|\Psr\Http\Message\StreamInterface, contentType?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEventPredictionMetadata(array $args = [])
 * @phpstan-method \Aws\Result getEventPredictionMetadata(array{
 *     eventId?: string,
 *     eventTypeName?: string,
 *     detectorId?: string,
 *     detectorVersionId?: string,
 *     predictionTimestamp?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventPredictionMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventPredictionMetadataAsync(array{
 *     eventId?: string,
 *     eventTypeName?: string,
 *     detectorId?: string,
 *     detectorVersionId?: string,
 *     predictionTimestamp?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEventTypes(array $args = [])
 * @phpstan-method \Aws\Result getEventTypes(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventTypesAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getExternalModels(array $args = [])
 * @phpstan-method \Aws\Result getExternalModels(array{modelEndpoint?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExternalModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExternalModelsAsync(array{modelEndpoint?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getKMSEncryptionKey(array $args = [])
 * @phpstan-method \Aws\Result getKMSEncryptionKey(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKMSEncryptionKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKMSEncryptionKeyAsync(array{...} $args = [])
 * @method \Aws\Result getLabels(array $args = [])
 * @phpstan-method \Aws\Result getLabels(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLabelsAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getListElements(array $args = [])
 * @phpstan-method \Aws\Result getListElements(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getListElementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getListElementsAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getListsMetadata(array $args = [])
 * @phpstan-method \Aws\Result getListsMetadata(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getListsMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getListsMetadataAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getModelVersion(array $args = [])
 * @phpstan-method \Aws\Result getModelVersion(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     modelVersionNumber?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelVersionAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     modelVersionNumber?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getModels(array $args = [])
 * @phpstan-method \Aws\Result getModels(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelsAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getOutcomes(array $args = [])
 * @phpstan-method \Aws\Result getOutcomes(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutcomesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOutcomesAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getRules(array $args = [])
 * @phpstan-method \Aws\Result getRules(array{ruleId?: string, detectorId?: string, ruleVersion?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRulesAsync(array{ruleId?: string, detectorId?: string, ruleVersion?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getVariables(array $args = [])
 * @phpstan-method \Aws\Result getVariables(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVariablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVariablesAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventPredictions(array $args = [])
 * @phpstan-method \Aws\Result listEventPredictions(array{
 *     eventId?: array{value?: string, ...},
 *     eventType?: array{value?: string, ...},
 *     detectorId?: array{value?: string, ...},
 *     detectorVersionId?: array{value?: string, ...},
 *     predictionTimeRange?: array{startTime?: string, endTime?: string, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventPredictionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventPredictionsAsync(array{
 *     eventId?: array{value?: string, ...},
 *     eventType?: array{value?: string, ...},
 *     detectorId?: array{value?: string, ...},
 *     detectorVersionId?: array{value?: string, ...},
 *     predictionTimeRange?: array{startTime?: string, endTime?: string, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putDetector(array $args = [])
 * @phpstan-method \Aws\Result putDetector(array{
 *     detectorId?: string,
 *     description?: string,
 *     eventTypeName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDetectorAsync(array{
 *     detectorId?: string,
 *     description?: string,
 *     eventTypeName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putEntityType(array $args = [])
 * @phpstan-method \Aws\Result putEntityType(array{name?: string, description?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEntityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEntityTypeAsync(array{name?: string, description?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result putEventType(array $args = [])
 * @phpstan-method \Aws\Result putEventType(array{
 *     name?: string,
 *     description?: string,
 *     eventVariables?: list<string>,
 *     labels?: list<string>,
 *     entityTypes?: list<string>,
 *     eventIngestion?: 'DISABLED'|'ENABLED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     eventOrchestration?: array{eventBridgeEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventTypeAsync(array{
 *     name?: string,
 *     description?: string,
 *     eventVariables?: list<string>,
 *     labels?: list<string>,
 *     entityTypes?: list<string>,
 *     eventIngestion?: 'DISABLED'|'ENABLED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     eventOrchestration?: array{eventBridgeEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putExternalModel(array $args = [])
 * @phpstan-method \Aws\Result putExternalModel(array{
 *     modelEndpoint?: string,
 *     modelSource?: 'SAGEMAKER',
 *     invokeModelEndpointRoleArn?: string,
 *     inputConfiguration?: array{
 *         eventTypeName?: string,
 *         format?: 'APPLICATION_JSON'|'TEXT_CSV',
 *         useEventVariables?: bool,
 *         jsonInputTemplate?: string,
 *         csvInputTemplate?: string,
 *         ...,
 *     },
 *     outputConfiguration?: array{
 *         format?: 'APPLICATION_JSONLINES'|'TEXT_CSV',
 *         jsonKeyToVariableMap?: array<string, string>,
 *         csvIndexToVariableMap?: array<string, string>,
 *         ...,
 *     },
 *     modelEndpointStatus?: 'ASSOCIATED'|'DISSOCIATED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putExternalModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putExternalModelAsync(array{
 *     modelEndpoint?: string,
 *     modelSource?: 'SAGEMAKER',
 *     invokeModelEndpointRoleArn?: string,
 *     inputConfiguration?: array{
 *         eventTypeName?: string,
 *         format?: 'APPLICATION_JSON'|'TEXT_CSV',
 *         useEventVariables?: bool,
 *         jsonInputTemplate?: string,
 *         csvInputTemplate?: string,
 *         ...,
 *     },
 *     outputConfiguration?: array{
 *         format?: 'APPLICATION_JSONLINES'|'TEXT_CSV',
 *         jsonKeyToVariableMap?: array<string, string>,
 *         csvIndexToVariableMap?: array<string, string>,
 *         ...,
 *     },
 *     modelEndpointStatus?: 'ASSOCIATED'|'DISSOCIATED',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putKMSEncryptionKey(array $args = [])
 * @phpstan-method \Aws\Result putKMSEncryptionKey(array{kmsEncryptionKeyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putKMSEncryptionKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putKMSEncryptionKeyAsync(array{kmsEncryptionKeyArn?: string, ...} $args = [])
 * @method \Aws\Result putLabel(array $args = [])
 * @phpstan-method \Aws\Result putLabel(array{name?: string, description?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLabelAsync(array{name?: string, description?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result putOutcome(array $args = [])
 * @phpstan-method \Aws\Result putOutcome(array{name?: string, description?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putOutcomeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putOutcomeAsync(array{name?: string, description?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result sendEvent(array $args = [])
 * @phpstan-method \Aws\Result sendEvent(array{
 *     eventId?: string,
 *     eventTypeName?: string,
 *     eventTimestamp?: string,
 *     eventVariables?: array<string, string>,
 *     assignedLabel?: string,
 *     labelTimestamp?: string,
 *     entities?: list<array{entityType?: string, entityId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendEventAsync(array{
 *     eventId?: string,
 *     eventTypeName?: string,
 *     eventTimestamp?: string,
 *     eventVariables?: array<string, string>,
 *     assignedLabel?: string,
 *     labelTimestamp?: string,
 *     entities?: list<array{entityType?: string, entityId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDetectorVersion(array $args = [])
 * @phpstan-method \Aws\Result updateDetectorVersion(array{
 *     detectorId?: string,
 *     detectorVersionId?: string,
 *     externalModelEndpoints?: list<string>,
 *     rules?: list<array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...}>,
 *     description?: string,
 *     modelVersions?: list<array{
 *         modelId?: string,
 *         modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *         modelVersionNumber?: string,
 *         arn?: string,
 *         ...,
 *     }>,
 *     ruleExecutionMode?: 'ALL_MATCHED'|'FIRST_MATCHED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDetectorVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDetectorVersionAsync(array{
 *     detectorId?: string,
 *     detectorVersionId?: string,
 *     externalModelEndpoints?: list<string>,
 *     rules?: list<array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...}>,
 *     description?: string,
 *     modelVersions?: list<array{
 *         modelId?: string,
 *         modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *         modelVersionNumber?: string,
 *         arn?: string,
 *         ...,
 *     }>,
 *     ruleExecutionMode?: 'ALL_MATCHED'|'FIRST_MATCHED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDetectorVersionMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateDetectorVersionMetadata(array{detectorId?: string, detectorVersionId?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDetectorVersionMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDetectorVersionMetadataAsync(array{detectorId?: string, detectorVersionId?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateDetectorVersionStatus(array $args = [])
 * @phpstan-method \Aws\Result updateDetectorVersionStatus(array{detectorId?: string, detectorVersionId?: string, status?: 'ACTIVE'|'DRAFT'|'INACTIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDetectorVersionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDetectorVersionStatusAsync(array{detectorId?: string, detectorVersionId?: string, status?: 'ACTIVE'|'DRAFT'|'INACTIVE', ...} $args = [])
 * @method \Aws\Result updateEventLabel(array $args = [])
 * @phpstan-method \Aws\Result updateEventLabel(array{eventId?: string, eventTypeName?: string, assignedLabel?: string, labelTimestamp?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventLabelAsync(array{eventId?: string, eventTypeName?: string, assignedLabel?: string, labelTimestamp?: string, ...} $args = [])
 * @method \Aws\Result updateList(array $args = [])
 * @phpstan-method \Aws\Result updateList(array{
 *     name?: string,
 *     elements?: list<string>,
 *     description?: string,
 *     updateMode?: 'APPEND'|'REMOVE'|'REPLACE',
 *     variableType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateListAsync(array{
 *     name?: string,
 *     elements?: list<string>,
 *     description?: string,
 *     updateMode?: 'APPEND'|'REMOVE'|'REPLACE',
 *     variableType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateModel(array $args = [])
 * @phpstan-method \Aws\Result updateModel(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateModelVersion(array $args = [])
 * @phpstan-method \Aws\Result updateModelVersion(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     majorVersionNumber?: string,
 *     externalEventsDetail?: array{dataLocation?: string, dataAccessRoleArn?: string, ...},
 *     ingestedEventsDetail?: array{ingestedEventsTimeWindow?: array{startTime?: string, endTime?: string, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelVersionAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     majorVersionNumber?: string,
 *     externalEventsDetail?: array{dataLocation?: string, dataAccessRoleArn?: string, ...},
 *     ingestedEventsDetail?: array{ingestedEventsTimeWindow?: array{startTime?: string, endTime?: string, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateModelVersionStatus(array $args = [])
 * @phpstan-method \Aws\Result updateModelVersionStatus(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     modelVersionNumber?: string,
 *     status?: 'ACTIVE'|'INACTIVE'|'TRAINING_CANCELLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelVersionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelVersionStatusAsync(array{
 *     modelId?: string,
 *     modelType?: 'ACCOUNT_TAKEOVER_INSIGHTS'|'ONLINE_FRAUD_INSIGHTS'|'TRANSACTION_FRAUD_INSIGHTS',
 *     modelVersionNumber?: string,
 *     status?: 'ACTIVE'|'INACTIVE'|'TRAINING_CANCELLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuleMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateRuleMetadata(array{
 *     rule?: array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleMetadataAsync(array{
 *     rule?: array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuleVersion(array $args = [])
 * @phpstan-method \Aws\Result updateRuleVersion(array{
 *     rule?: array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...},
 *     description?: string,
 *     expression?: string,
 *     language?: 'DETECTORPL',
 *     outcomes?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleVersionAsync(array{
 *     rule?: array{detectorId?: string, ruleId?: string, ruleVersion?: string, ...},
 *     description?: string,
 *     expression?: string,
 *     language?: 'DETECTORPL',
 *     outcomes?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVariable(array $args = [])
 * @phpstan-method \Aws\Result updateVariable(array{name?: string, defaultValue?: string, description?: string, variableType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVariableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVariableAsync(array{name?: string, defaultValue?: string, description?: string, variableType?: string, ...} $args = [])
 */
class FraudDetectorClient extends AwsClient {}
