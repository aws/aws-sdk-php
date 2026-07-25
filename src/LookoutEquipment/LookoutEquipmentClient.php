<?php
namespace Aws\LookoutEquipment;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lookout for Equipment** service.
 * @method \Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     DatasetName?: string,
 *     DatasetSchema?: array{InlineDataSchema?: string, ...},
 *     ServerSideKmsKeyId?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     DatasetName?: string,
 *     DatasetSchema?: array{InlineDataSchema?: string, ...},
 *     ServerSideKmsKeyId?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInferenceScheduler(array $args = [])
 * @phpstan-method \Aws\Result createInferenceScheduler(array{
 *     ModelName?: string,
 *     InferenceSchedulerName?: string,
 *     DataDelayOffsetInMinutes?: int,
 *     DataUploadFrequency?: 'PT10M'|'PT15M'|'PT1H'|'PT30M'|'PT5M',
 *     DataInputConfiguration?: array{
 *         S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...},
 *         InputTimeZoneOffset?: string,
 *         InferenceInputNameConfiguration?: array{TimestampFormat?: string, ComponentTimestampDelimiter?: string, ...},
 *         ...,
 *     },
 *     DataOutputConfiguration?: array{S3OutputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, KmsKeyId?: string, ...},
 *     RoleArn?: string,
 *     ServerSideKmsKeyId?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInferenceSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInferenceSchedulerAsync(array{
 *     ModelName?: string,
 *     InferenceSchedulerName?: string,
 *     DataDelayOffsetInMinutes?: int,
 *     DataUploadFrequency?: 'PT10M'|'PT15M'|'PT1H'|'PT30M'|'PT5M',
 *     DataInputConfiguration?: array{
 *         S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...},
 *         InputTimeZoneOffset?: string,
 *         InferenceInputNameConfiguration?: array{TimestampFormat?: string, ComponentTimestampDelimiter?: string, ...},
 *         ...,
 *     },
 *     DataOutputConfiguration?: array{S3OutputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, KmsKeyId?: string, ...},
 *     RoleArn?: string,
 *     ServerSideKmsKeyId?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLabel(array $args = [])
 * @phpstan-method \Aws\Result createLabel(array{
 *     LabelGroupName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Rating?: 'ANOMALY'|'NEUTRAL'|'NO_ANOMALY',
 *     FaultCode?: string,
 *     Notes?: string,
 *     Equipment?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLabelAsync(array{
 *     LabelGroupName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Rating?: 'ANOMALY'|'NEUTRAL'|'NO_ANOMALY',
 *     FaultCode?: string,
 *     Notes?: string,
 *     Equipment?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLabelGroup(array $args = [])
 * @phpstan-method \Aws\Result createLabelGroup(array{
 *     LabelGroupName?: string,
 *     FaultCodes?: list<string>,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLabelGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLabelGroupAsync(array{
 *     LabelGroupName?: string,
 *     FaultCodes?: list<string>,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModel(array $args = [])
 * @phpstan-method \Aws\Result createModel(array{
 *     ModelName?: string,
 *     DatasetName?: string,
 *     DatasetSchema?: array{InlineDataSchema?: string, ...},
 *     LabelsInputConfiguration?: array{S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, LabelGroupName?: string, ...},
 *     ClientToken?: string,
 *     TrainingDataStartTime?: int|string|\DateTimeInterface,
 *     TrainingDataEndTime?: int|string|\DateTimeInterface,
 *     EvaluationDataStartTime?: int|string|\DateTimeInterface,
 *     EvaluationDataEndTime?: int|string|\DateTimeInterface,
 *     RoleArn?: string,
 *     DataPreProcessingConfiguration?: array{
 *         TargetSamplingRate?: 'PT10M'|'PT10S'|'PT15M'|'PT15S'|'PT1H'|'PT1M'|'PT1S'|'PT30M'|'PT30S'|'PT5M'|'PT5S',
 *         ...,
 *     },
 *     ServerSideKmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     OffCondition?: string,
 *     ModelDiagnosticsOutputConfiguration?: array{S3OutputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, KmsKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelAsync(array{
 *     ModelName?: string,
 *     DatasetName?: string,
 *     DatasetSchema?: array{InlineDataSchema?: string, ...},
 *     LabelsInputConfiguration?: array{S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, LabelGroupName?: string, ...},
 *     ClientToken?: string,
 *     TrainingDataStartTime?: int|string|\DateTimeInterface,
 *     TrainingDataEndTime?: int|string|\DateTimeInterface,
 *     EvaluationDataStartTime?: int|string|\DateTimeInterface,
 *     EvaluationDataEndTime?: int|string|\DateTimeInterface,
 *     RoleArn?: string,
 *     DataPreProcessingConfiguration?: array{
 *         TargetSamplingRate?: 'PT10M'|'PT10S'|'PT15M'|'PT15S'|'PT1H'|'PT1M'|'PT1S'|'PT30M'|'PT30S'|'PT5M'|'PT5S',
 *         ...,
 *     },
 *     ServerSideKmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     OffCondition?: string,
 *     ModelDiagnosticsOutputConfiguration?: array{S3OutputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, KmsKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRetrainingScheduler(array $args = [])
 * @phpstan-method \Aws\Result createRetrainingScheduler(array{
 *     ModelName?: string,
 *     RetrainingStartDate?: int|string|\DateTimeInterface,
 *     RetrainingFrequency?: string,
 *     LookbackWindow?: string,
 *     PromoteMode?: 'MANAGED'|'MANUAL',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRetrainingSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRetrainingSchedulerAsync(array{
 *     ModelName?: string,
 *     RetrainingStartDate?: int|string|\DateTimeInterface,
 *     RetrainingFrequency?: string,
 *     LookbackWindow?: string,
 *     PromoteMode?: 'MANAGED'|'MANUAL',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{DatasetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{DatasetName?: string, ...} $args = [])
 * @method \Aws\Result deleteInferenceScheduler(array $args = [])
 * @phpstan-method \Aws\Result deleteInferenceScheduler(array{InferenceSchedulerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInferenceSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInferenceSchedulerAsync(array{InferenceSchedulerName?: string, ...} $args = [])
 * @method \Aws\Result deleteLabel(array $args = [])
 * @phpstan-method \Aws\Result deleteLabel(array{LabelGroupName?: string, LabelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLabelAsync(array{LabelGroupName?: string, LabelId?: string, ...} $args = [])
 * @method \Aws\Result deleteLabelGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteLabelGroup(array{LabelGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLabelGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLabelGroupAsync(array{LabelGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteModel(array $args = [])
 * @phpstan-method \Aws\Result deleteModel(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRetrainingScheduler(array $args = [])
 * @phpstan-method \Aws\Result deleteRetrainingScheduler(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRetrainingSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRetrainingSchedulerAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result describeDataIngestionJob(array $args = [])
 * @phpstan-method \Aws\Result describeDataIngestionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataIngestionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataIngestionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @phpstan-method \Aws\Result describeDataset(array{DatasetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetAsync(array{DatasetName?: string, ...} $args = [])
 * @method \Aws\Result describeInferenceScheduler(array $args = [])
 * @phpstan-method \Aws\Result describeInferenceScheduler(array{InferenceSchedulerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInferenceSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInferenceSchedulerAsync(array{InferenceSchedulerName?: string, ...} $args = [])
 * @method \Aws\Result describeLabel(array $args = [])
 * @phpstan-method \Aws\Result describeLabel(array{LabelGroupName?: string, LabelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLabelAsync(array{LabelGroupName?: string, LabelId?: string, ...} $args = [])
 * @method \Aws\Result describeLabelGroup(array $args = [])
 * @phpstan-method \Aws\Result describeLabelGroup(array{LabelGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLabelGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLabelGroupAsync(array{LabelGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeModel(array $args = [])
 * @phpstan-method \Aws\Result describeModel(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result describeModelVersion(array $args = [])
 * @phpstan-method \Aws\Result describeModelVersion(array{ModelName?: string, ModelVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelVersionAsync(array{ModelName?: string, ModelVersion?: int, ...} $args = [])
 * @method \Aws\Result describeResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result describeResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeRetrainingScheduler(array $args = [])
 * @phpstan-method \Aws\Result describeRetrainingScheduler(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRetrainingSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRetrainingSchedulerAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result importDataset(array $args = [])
 * @phpstan-method \Aws\Result importDataset(array{
 *     SourceDatasetArn?: string,
 *     DatasetName?: string,
 *     ClientToken?: string,
 *     ServerSideKmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importDatasetAsync(array{
 *     SourceDatasetArn?: string,
 *     DatasetName?: string,
 *     ClientToken?: string,
 *     ServerSideKmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importModelVersion(array $args = [])
 * @phpstan-method \Aws\Result importModelVersion(array{
 *     SourceModelVersionArn?: string,
 *     ModelName?: string,
 *     DatasetName?: string,
 *     LabelsInputConfiguration?: array{S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, LabelGroupName?: string, ...},
 *     ClientToken?: string,
 *     RoleArn?: string,
 *     ServerSideKmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     InferenceDataImportStrategy?: 'ADD_WHEN_EMPTY'|'NO_IMPORT'|'OVERWRITE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importModelVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importModelVersionAsync(array{
 *     SourceModelVersionArn?: string,
 *     ModelName?: string,
 *     DatasetName?: string,
 *     LabelsInputConfiguration?: array{S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, LabelGroupName?: string, ...},
 *     ClientToken?: string,
 *     RoleArn?: string,
 *     ServerSideKmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     InferenceDataImportStrategy?: 'ADD_WHEN_EMPTY'|'NO_IMPORT'|'OVERWRITE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataIngestionJobs(array $args = [])
 * @phpstan-method \Aws\Result listDataIngestionJobs(array{
 *     DatasetName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'FAILED'|'IMPORT_IN_PROGRESS'|'IN_PROGRESS'|'SUCCESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataIngestionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataIngestionJobsAsync(array{
 *     DatasetName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'FAILED'|'IMPORT_IN_PROGRESS'|'IN_PROGRESS'|'SUCCESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{NextToken?: string, MaxResults?: int, DatasetNameBeginsWith?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{NextToken?: string, MaxResults?: int, DatasetNameBeginsWith?: string, ...} $args = [])
 * @method \Aws\Result listInferenceEvents(array $args = [])
 * @phpstan-method \Aws\Result listInferenceEvents(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InferenceSchedulerName?: string,
 *     IntervalStartTime?: int|string|\DateTimeInterface,
 *     IntervalEndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInferenceEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInferenceEventsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InferenceSchedulerName?: string,
 *     IntervalStartTime?: int|string|\DateTimeInterface,
 *     IntervalEndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInferenceExecutions(array $args = [])
 * @phpstan-method \Aws\Result listInferenceExecutions(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InferenceSchedulerName?: string,
 *     DataStartTimeAfter?: int|string|\DateTimeInterface,
 *     DataEndTimeBefore?: int|string|\DateTimeInterface,
 *     Status?: 'FAILED'|'IN_PROGRESS'|'SUCCESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInferenceExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInferenceExecutionsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InferenceSchedulerName?: string,
 *     DataStartTimeAfter?: int|string|\DateTimeInterface,
 *     DataEndTimeBefore?: int|string|\DateTimeInterface,
 *     Status?: 'FAILED'|'IN_PROGRESS'|'SUCCESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInferenceSchedulers(array $args = [])
 * @phpstan-method \Aws\Result listInferenceSchedulers(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InferenceSchedulerNameBeginsWith?: string,
 *     ModelName?: string,
 *     Status?: 'PENDING'|'RUNNING'|'STOPPED'|'STOPPING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInferenceSchedulersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInferenceSchedulersAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InferenceSchedulerNameBeginsWith?: string,
 *     ModelName?: string,
 *     Status?: 'PENDING'|'RUNNING'|'STOPPED'|'STOPPING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLabelGroups(array $args = [])
 * @phpstan-method \Aws\Result listLabelGroups(array{LabelGroupNameBeginsWith?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLabelGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLabelGroupsAsync(array{LabelGroupNameBeginsWith?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listLabels(array $args = [])
 * @phpstan-method \Aws\Result listLabels(array{
 *     LabelGroupName?: string,
 *     IntervalStartTime?: int|string|\DateTimeInterface,
 *     IntervalEndTime?: int|string|\DateTimeInterface,
 *     FaultCode?: string,
 *     Equipment?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLabelsAsync(array{
 *     LabelGroupName?: string,
 *     IntervalStartTime?: int|string|\DateTimeInterface,
 *     IntervalEndTime?: int|string|\DateTimeInterface,
 *     FaultCode?: string,
 *     Equipment?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelVersions(array $args = [])
 * @phpstan-method \Aws\Result listModelVersions(array{
 *     ModelName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'CANCELED'|'FAILED'|'IMPORT_IN_PROGRESS'|'IN_PROGRESS'|'SUCCESS',
 *     SourceType?: 'IMPORT'|'RETRAINING'|'TRAINING',
 *     CreatedAtEndTime?: int|string|\DateTimeInterface,
 *     CreatedAtStartTime?: int|string|\DateTimeInterface,
 *     MaxModelVersion?: int,
 *     MinModelVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelVersionsAsync(array{
 *     ModelName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'CANCELED'|'FAILED'|'IMPORT_IN_PROGRESS'|'IN_PROGRESS'|'SUCCESS',
 *     SourceType?: 'IMPORT'|'RETRAINING'|'TRAINING',
 *     CreatedAtEndTime?: int|string|\DateTimeInterface,
 *     CreatedAtStartTime?: int|string|\DateTimeInterface,
 *     MaxModelVersion?: int,
 *     MinModelVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModels(array $args = [])
 * @phpstan-method \Aws\Result listModels(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'FAILED'|'IMPORT_IN_PROGRESS'|'IN_PROGRESS'|'SUCCESS',
 *     ModelNameBeginsWith?: string,
 *     DatasetNameBeginsWith?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'FAILED'|'IMPORT_IN_PROGRESS'|'IN_PROGRESS'|'SUCCESS',
 *     ModelNameBeginsWith?: string,
 *     DatasetNameBeginsWith?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRetrainingSchedulers(array $args = [])
 * @phpstan-method \Aws\Result listRetrainingSchedulers(array{
 *     ModelNameBeginsWith?: string,
 *     Status?: 'PENDING'|'RUNNING'|'STOPPED'|'STOPPING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRetrainingSchedulersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRetrainingSchedulersAsync(array{
 *     ModelNameBeginsWith?: string,
 *     Status?: 'PENDING'|'RUNNING'|'STOPPED'|'STOPPING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSensorStatistics(array $args = [])
 * @phpstan-method \Aws\Result listSensorStatistics(array{DatasetName?: string, IngestionJobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSensorStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSensorStatisticsAsync(array{DatasetName?: string, IngestionJobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, ResourcePolicy?: string, PolicyRevisionId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, ResourcePolicy?: string, PolicyRevisionId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result startDataIngestionJob(array $args = [])
 * @phpstan-method \Aws\Result startDataIngestionJob(array{
 *     DatasetName?: string,
 *     IngestionInputConfiguration?: array{S3InputConfiguration?: array{Bucket?: string, Prefix?: string, KeyPattern?: string, ...}, ...},
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataIngestionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataIngestionJobAsync(array{
 *     DatasetName?: string,
 *     IngestionInputConfiguration?: array{S3InputConfiguration?: array{Bucket?: string, Prefix?: string, KeyPattern?: string, ...}, ...},
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startInferenceScheduler(array $args = [])
 * @phpstan-method \Aws\Result startInferenceScheduler(array{InferenceSchedulerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startInferenceSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInferenceSchedulerAsync(array{InferenceSchedulerName?: string, ...} $args = [])
 * @method \Aws\Result startRetrainingScheduler(array $args = [])
 * @phpstan-method \Aws\Result startRetrainingScheduler(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startRetrainingSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRetrainingSchedulerAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result stopInferenceScheduler(array $args = [])
 * @phpstan-method \Aws\Result stopInferenceScheduler(array{InferenceSchedulerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopInferenceSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopInferenceSchedulerAsync(array{InferenceSchedulerName?: string, ...} $args = [])
 * @method \Aws\Result stopRetrainingScheduler(array $args = [])
 * @phpstan-method \Aws\Result stopRetrainingScheduler(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRetrainingSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRetrainingSchedulerAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateActiveModelVersion(array $args = [])
 * @phpstan-method \Aws\Result updateActiveModelVersion(array{ModelName?: string, ModelVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateActiveModelVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateActiveModelVersionAsync(array{ModelName?: string, ModelVersion?: int, ...} $args = [])
 * @method \Aws\Result updateInferenceScheduler(array $args = [])
 * @phpstan-method \Aws\Result updateInferenceScheduler(array{
 *     InferenceSchedulerName?: string,
 *     DataDelayOffsetInMinutes?: int,
 *     DataUploadFrequency?: 'PT10M'|'PT15M'|'PT1H'|'PT30M'|'PT5M',
 *     DataInputConfiguration?: array{
 *         S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...},
 *         InputTimeZoneOffset?: string,
 *         InferenceInputNameConfiguration?: array{TimestampFormat?: string, ComponentTimestampDelimiter?: string, ...},
 *         ...,
 *     },
 *     DataOutputConfiguration?: array{S3OutputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, KmsKeyId?: string, ...},
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInferenceSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInferenceSchedulerAsync(array{
 *     InferenceSchedulerName?: string,
 *     DataDelayOffsetInMinutes?: int,
 *     DataUploadFrequency?: 'PT10M'|'PT15M'|'PT1H'|'PT30M'|'PT5M',
 *     DataInputConfiguration?: array{
 *         S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...},
 *         InputTimeZoneOffset?: string,
 *         InferenceInputNameConfiguration?: array{TimestampFormat?: string, ComponentTimestampDelimiter?: string, ...},
 *         ...,
 *     },
 *     DataOutputConfiguration?: array{S3OutputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, KmsKeyId?: string, ...},
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLabelGroup(array $args = [])
 * @phpstan-method \Aws\Result updateLabelGroup(array{LabelGroupName?: string, FaultCodes?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLabelGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLabelGroupAsync(array{LabelGroupName?: string, FaultCodes?: list<string>, ...} $args = [])
 * @method \Aws\Result updateModel(array $args = [])
 * @phpstan-method \Aws\Result updateModel(array{
 *     ModelName?: string,
 *     LabelsInputConfiguration?: array{S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, LabelGroupName?: string, ...},
 *     RoleArn?: string,
 *     ModelDiagnosticsOutputConfiguration?: array{S3OutputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, KmsKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelAsync(array{
 *     ModelName?: string,
 *     LabelsInputConfiguration?: array{S3InputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, LabelGroupName?: string, ...},
 *     RoleArn?: string,
 *     ModelDiagnosticsOutputConfiguration?: array{S3OutputConfiguration?: array{Bucket?: string, Prefix?: string, ...}, KmsKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRetrainingScheduler(array $args = [])
 * @phpstan-method \Aws\Result updateRetrainingScheduler(array{
 *     ModelName?: string,
 *     RetrainingStartDate?: int|string|\DateTimeInterface,
 *     RetrainingFrequency?: string,
 *     LookbackWindow?: string,
 *     PromoteMode?: 'MANAGED'|'MANUAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRetrainingSchedulerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRetrainingSchedulerAsync(array{
 *     ModelName?: string,
 *     RetrainingStartDate?: int|string|\DateTimeInterface,
 *     RetrainingFrequency?: string,
 *     LookbackWindow?: string,
 *     PromoteMode?: 'MANAGED'|'MANUAL',
 *     ...,
 * } $args = [])
 */
class LookoutEquipmentClient extends AwsClient {}
