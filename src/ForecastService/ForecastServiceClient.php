<?php
namespace Aws\ForecastService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Forecast Service** service.
 * @method \Aws\Result createAutoPredictor(array $args = [])
 * @phpstan-method \Aws\Result createAutoPredictor(array{
 *     PredictorName?: string,
 *     ForecastHorizon?: int,
 *     ForecastTypes?: list<string>,
 *     ForecastDimensions?: list<string>,
 *     ForecastFrequency?: string,
 *     DataConfig?: array{DatasetGroupArn?: string, AttributeConfigs?: list<array>, AdditionalDatasets?: list<array>, ...},
 *     EncryptionConfig?: array{RoleArn?: string, KMSKeyArn?: string, ...},
 *     ReferencePredictorArn?: string,
 *     OptimizationMetric?: 'AverageWeightedQuantileLoss'|'MAPE'|'MASE'|'RMSE'|'WAPE',
 *     ExplainPredictor?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MonitorConfig?: array{MonitorName?: string, ...},
 *     TimeAlignmentBoundary?: array{
 *         Month?: 'APRIL'|'AUGUST'|'DECEMBER'|'FEBRUARY'|'JANUARY'|'JULY'|'JUNE'|'MARCH'|'MAY'|'NOVEMBER'|'OCTOBER'|'SEPTEMBER',
 *         DayOfMonth?: int,
 *         DayOfWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         Hour?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutoPredictorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutoPredictorAsync(array{
 *     PredictorName?: string,
 *     ForecastHorizon?: int,
 *     ForecastTypes?: list<string>,
 *     ForecastDimensions?: list<string>,
 *     ForecastFrequency?: string,
 *     DataConfig?: array{DatasetGroupArn?: string, AttributeConfigs?: list<array>, AdditionalDatasets?: list<array>, ...},
 *     EncryptionConfig?: array{RoleArn?: string, KMSKeyArn?: string, ...},
 *     ReferencePredictorArn?: string,
 *     OptimizationMetric?: 'AverageWeightedQuantileLoss'|'MAPE'|'MASE'|'RMSE'|'WAPE',
 *     ExplainPredictor?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MonitorConfig?: array{MonitorName?: string, ...},
 *     TimeAlignmentBoundary?: array{
 *         Month?: 'APRIL'|'AUGUST'|'DECEMBER'|'FEBRUARY'|'JANUARY'|'JULY'|'JUNE'|'MARCH'|'MAY'|'NOVEMBER'|'OCTOBER'|'SEPTEMBER',
 *         DayOfMonth?: int,
 *         DayOfWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         Hour?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     DatasetName?: string,
 *     Domain?: 'CUSTOM'|'EC2_CAPACITY'|'INVENTORY_PLANNING'|'METRICS'|'RETAIL'|'WEB_TRAFFIC'|'WORK_FORCE',
 *     DatasetType?: 'ITEM_METADATA'|'RELATED_TIME_SERIES'|'TARGET_TIME_SERIES',
 *     DataFrequency?: string,
 *     Schema?: array{Attributes?: list<array>, ...},
 *     EncryptionConfig?: array{RoleArn?: string, KMSKeyArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     DatasetName?: string,
 *     Domain?: 'CUSTOM'|'EC2_CAPACITY'|'INVENTORY_PLANNING'|'METRICS'|'RETAIL'|'WEB_TRAFFIC'|'WORK_FORCE',
 *     DatasetType?: 'ITEM_METADATA'|'RELATED_TIME_SERIES'|'TARGET_TIME_SERIES',
 *     DataFrequency?: string,
 *     Schema?: array{Attributes?: list<array>, ...},
 *     EncryptionConfig?: array{RoleArn?: string, KMSKeyArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDatasetGroup(array $args = [])
 * @phpstan-method \Aws\Result createDatasetGroup(array{
 *     DatasetGroupName?: string,
 *     Domain?: 'CUSTOM'|'EC2_CAPACITY'|'INVENTORY_PLANNING'|'METRICS'|'RETAIL'|'WEB_TRAFFIC'|'WORK_FORCE',
 *     DatasetArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetGroupAsync(array{
 *     DatasetGroupName?: string,
 *     Domain?: 'CUSTOM'|'EC2_CAPACITY'|'INVENTORY_PLANNING'|'METRICS'|'RETAIL'|'WEB_TRAFFIC'|'WORK_FORCE',
 *     DatasetArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDatasetImportJob(array $args = [])
 * @phpstan-method \Aws\Result createDatasetImportJob(array{
 *     DatasetImportJobName?: string,
 *     DatasetArn?: string,
 *     DataSource?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     TimestampFormat?: string,
 *     TimeZone?: string,
 *     UseGeolocationForTimeZone?: bool,
 *     GeolocationFormat?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ImportMode?: 'FULL'|'INCREMENTAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetImportJobAsync(array{
 *     DatasetImportJobName?: string,
 *     DatasetArn?: string,
 *     DataSource?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     TimestampFormat?: string,
 *     TimeZone?: string,
 *     UseGeolocationForTimeZone?: bool,
 *     GeolocationFormat?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ImportMode?: 'FULL'|'INCREMENTAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExplainability(array $args = [])
 * @phpstan-method \Aws\Result createExplainability(array{
 *     ExplainabilityName?: string,
 *     ResourceArn?: string,
 *     ExplainabilityConfig?: array{TimeSeriesGranularity?: 'ALL'|'SPECIFIC', TimePointGranularity?: 'ALL'|'SPECIFIC', ...},
 *     DataSource?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Schema?: array{Attributes?: list<array>, ...},
 *     EnableVisualization?: bool,
 *     StartDateTime?: string,
 *     EndDateTime?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExplainabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExplainabilityAsync(array{
 *     ExplainabilityName?: string,
 *     ResourceArn?: string,
 *     ExplainabilityConfig?: array{TimeSeriesGranularity?: 'ALL'|'SPECIFIC', TimePointGranularity?: 'ALL'|'SPECIFIC', ...},
 *     DataSource?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Schema?: array{Attributes?: list<array>, ...},
 *     EnableVisualization?: bool,
 *     StartDateTime?: string,
 *     EndDateTime?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExplainabilityExport(array $args = [])
 * @phpstan-method \Aws\Result createExplainabilityExport(array{
 *     ExplainabilityExportName?: string,
 *     ExplainabilityArn?: string,
 *     Destination?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExplainabilityExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExplainabilityExportAsync(array{
 *     ExplainabilityExportName?: string,
 *     ExplainabilityArn?: string,
 *     Destination?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createForecast(array $args = [])
 * @phpstan-method \Aws\Result createForecast(array{
 *     ForecastName?: string,
 *     PredictorArn?: string,
 *     ForecastTypes?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TimeSeriesSelector?: array{TimeSeriesIdentifiers?: array{DataSource?: array, Schema?: array, Format?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createForecastAsync(array{
 *     ForecastName?: string,
 *     PredictorArn?: string,
 *     ForecastTypes?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TimeSeriesSelector?: array{TimeSeriesIdentifiers?: array{DataSource?: array, Schema?: array, Format?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createForecastExportJob(array $args = [])
 * @phpstan-method \Aws\Result createForecastExportJob(array{
 *     ForecastExportJobName?: string,
 *     ForecastArn?: string,
 *     Destination?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createForecastExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createForecastExportJobAsync(array{
 *     ForecastExportJobName?: string,
 *     ForecastArn?: string,
 *     Destination?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMonitor(array $args = [])
 * @phpstan-method \Aws\Result createMonitor(array{MonitorName?: string, ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMonitorAsync(array{MonitorName?: string, ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createPredictor(array $args = [])
 * @phpstan-method \Aws\Result createPredictor(array{
 *     PredictorName?: string,
 *     AlgorithmArn?: string,
 *     ForecastHorizon?: int,
 *     ForecastTypes?: list<string>,
 *     PerformAutoML?: bool,
 *     AutoMLOverrideStrategy?: 'AccuracyOptimized'|'LatencyOptimized',
 *     PerformHPO?: bool,
 *     TrainingParameters?: array<string, string>,
 *     EvaluationParameters?: array{NumberOfBacktestWindows?: int, BackTestWindowOffset?: int, ...},
 *     HPOConfig?: array{
 *         ParameterRanges?: array{
 *             CategoricalParameterRanges?: list<array>,
 *             ContinuousParameterRanges?: list<array>,
 *             IntegerParameterRanges?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     InputDataConfig?: array{DatasetGroupArn?: string, SupplementaryFeatures?: list<array>, ...},
 *     FeaturizationConfig?: array{ForecastFrequency?: string, ForecastDimensions?: list<string>, Featurizations?: list<array>, ...},
 *     EncryptionConfig?: array{RoleArn?: string, KMSKeyArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     OptimizationMetric?: 'AverageWeightedQuantileLoss'|'MAPE'|'MASE'|'RMSE'|'WAPE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPredictorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPredictorAsync(array{
 *     PredictorName?: string,
 *     AlgorithmArn?: string,
 *     ForecastHorizon?: int,
 *     ForecastTypes?: list<string>,
 *     PerformAutoML?: bool,
 *     AutoMLOverrideStrategy?: 'AccuracyOptimized'|'LatencyOptimized',
 *     PerformHPO?: bool,
 *     TrainingParameters?: array<string, string>,
 *     EvaluationParameters?: array{NumberOfBacktestWindows?: int, BackTestWindowOffset?: int, ...},
 *     HPOConfig?: array{
 *         ParameterRanges?: array{
 *             CategoricalParameterRanges?: list<array>,
 *             ContinuousParameterRanges?: list<array>,
 *             IntegerParameterRanges?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     InputDataConfig?: array{DatasetGroupArn?: string, SupplementaryFeatures?: list<array>, ...},
 *     FeaturizationConfig?: array{ForecastFrequency?: string, ForecastDimensions?: list<string>, Featurizations?: list<array>, ...},
 *     EncryptionConfig?: array{RoleArn?: string, KMSKeyArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     OptimizationMetric?: 'AverageWeightedQuantileLoss'|'MAPE'|'MASE'|'RMSE'|'WAPE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPredictorBacktestExportJob(array $args = [])
 * @phpstan-method \Aws\Result createPredictorBacktestExportJob(array{
 *     PredictorBacktestExportJobName?: string,
 *     PredictorArn?: string,
 *     Destination?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPredictorBacktestExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPredictorBacktestExportJobAsync(array{
 *     PredictorBacktestExportJobName?: string,
 *     PredictorArn?: string,
 *     Destination?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWhatIfAnalysis(array $args = [])
 * @phpstan-method \Aws\Result createWhatIfAnalysis(array{
 *     WhatIfAnalysisName?: string,
 *     ForecastArn?: string,
 *     TimeSeriesSelector?: array{TimeSeriesIdentifiers?: array{DataSource?: array, Schema?: array, Format?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWhatIfAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWhatIfAnalysisAsync(array{
 *     WhatIfAnalysisName?: string,
 *     ForecastArn?: string,
 *     TimeSeriesSelector?: array{TimeSeriesIdentifiers?: array{DataSource?: array, Schema?: array, Format?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWhatIfForecast(array $args = [])
 * @phpstan-method \Aws\Result createWhatIfForecast(array{
 *     WhatIfForecastName?: string,
 *     WhatIfAnalysisArn?: string,
 *     TimeSeriesTransformations?: list<array{Action?: array, TimeSeriesConditions?: list<array>, ...}>,
 *     TimeSeriesReplacementsDataSource?: array{
 *         S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...},
 *         Schema?: array{Attributes?: list<array>, ...},
 *         Format?: string,
 *         TimestampFormat?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWhatIfForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWhatIfForecastAsync(array{
 *     WhatIfForecastName?: string,
 *     WhatIfAnalysisArn?: string,
 *     TimeSeriesTransformations?: list<array{Action?: array, TimeSeriesConditions?: list<array>, ...}>,
 *     TimeSeriesReplacementsDataSource?: array{
 *         S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...},
 *         Schema?: array{Attributes?: list<array>, ...},
 *         Format?: string,
 *         TimestampFormat?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWhatIfForecastExport(array $args = [])
 * @phpstan-method \Aws\Result createWhatIfForecastExport(array{
 *     WhatIfForecastExportName?: string,
 *     WhatIfForecastArns?: list<string>,
 *     Destination?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWhatIfForecastExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWhatIfForecastExportAsync(array{
 *     WhatIfForecastExportName?: string,
 *     WhatIfForecastArns?: list<string>,
 *     Destination?: array{S3Config?: array{Path?: string, RoleArn?: string, KMSKeyArn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Format?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{DatasetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{DatasetArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDatasetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDatasetGroup(array{DatasetGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetGroupAsync(array{DatasetGroupArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDatasetImportJob(array $args = [])
 * @phpstan-method \Aws\Result deleteDatasetImportJob(array{DatasetImportJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetImportJobAsync(array{DatasetImportJobArn?: string, ...} $args = [])
 * @method \Aws\Result deleteExplainability(array $args = [])
 * @phpstan-method \Aws\Result deleteExplainability(array{ExplainabilityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExplainabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExplainabilityAsync(array{ExplainabilityArn?: string, ...} $args = [])
 * @method \Aws\Result deleteExplainabilityExport(array $args = [])
 * @phpstan-method \Aws\Result deleteExplainabilityExport(array{ExplainabilityExportArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExplainabilityExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExplainabilityExportAsync(array{ExplainabilityExportArn?: string, ...} $args = [])
 * @method \Aws\Result deleteForecast(array $args = [])
 * @phpstan-method \Aws\Result deleteForecast(array{ForecastArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteForecastAsync(array{ForecastArn?: string, ...} $args = [])
 * @method \Aws\Result deleteForecastExportJob(array $args = [])
 * @phpstan-method \Aws\Result deleteForecastExportJob(array{ForecastExportJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteForecastExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteForecastExportJobAsync(array{ForecastExportJobArn?: string, ...} $args = [])
 * @method \Aws\Result deleteMonitor(array $args = [])
 * @phpstan-method \Aws\Result deleteMonitor(array{MonitorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array{MonitorArn?: string, ...} $args = [])
 * @method \Aws\Result deletePredictor(array $args = [])
 * @phpstan-method \Aws\Result deletePredictor(array{PredictorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePredictorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePredictorAsync(array{PredictorArn?: string, ...} $args = [])
 * @method \Aws\Result deletePredictorBacktestExportJob(array $args = [])
 * @phpstan-method \Aws\Result deletePredictorBacktestExportJob(array{PredictorBacktestExportJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePredictorBacktestExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePredictorBacktestExportJobAsync(array{PredictorBacktestExportJobArn?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceTree(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceTree(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceTreeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceTreeAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteWhatIfAnalysis(array $args = [])
 * @phpstan-method \Aws\Result deleteWhatIfAnalysis(array{WhatIfAnalysisArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWhatIfAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWhatIfAnalysisAsync(array{WhatIfAnalysisArn?: string, ...} $args = [])
 * @method \Aws\Result deleteWhatIfForecast(array $args = [])
 * @phpstan-method \Aws\Result deleteWhatIfForecast(array{WhatIfForecastArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWhatIfForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWhatIfForecastAsync(array{WhatIfForecastArn?: string, ...} $args = [])
 * @method \Aws\Result deleteWhatIfForecastExport(array $args = [])
 * @phpstan-method \Aws\Result deleteWhatIfForecastExport(array{WhatIfForecastExportArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWhatIfForecastExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWhatIfForecastExportAsync(array{WhatIfForecastExportArn?: string, ...} $args = [])
 * @method \Aws\Result describeAutoPredictor(array $args = [])
 * @phpstan-method \Aws\Result describeAutoPredictor(array{PredictorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutoPredictorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutoPredictorAsync(array{PredictorArn?: string, ...} $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @phpstan-method \Aws\Result describeDataset(array{DatasetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetAsync(array{DatasetArn?: string, ...} $args = [])
 * @method \Aws\Result describeDatasetGroup(array $args = [])
 * @phpstan-method \Aws\Result describeDatasetGroup(array{DatasetGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetGroupAsync(array{DatasetGroupArn?: string, ...} $args = [])
 * @method \Aws\Result describeDatasetImportJob(array $args = [])
 * @phpstan-method \Aws\Result describeDatasetImportJob(array{DatasetImportJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetImportJobAsync(array{DatasetImportJobArn?: string, ...} $args = [])
 * @method \Aws\Result describeExplainability(array $args = [])
 * @phpstan-method \Aws\Result describeExplainability(array{ExplainabilityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExplainabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExplainabilityAsync(array{ExplainabilityArn?: string, ...} $args = [])
 * @method \Aws\Result describeExplainabilityExport(array $args = [])
 * @phpstan-method \Aws\Result describeExplainabilityExport(array{ExplainabilityExportArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExplainabilityExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExplainabilityExportAsync(array{ExplainabilityExportArn?: string, ...} $args = [])
 * @method \Aws\Result describeForecast(array $args = [])
 * @phpstan-method \Aws\Result describeForecast(array{ForecastArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeForecastAsync(array{ForecastArn?: string, ...} $args = [])
 * @method \Aws\Result describeForecastExportJob(array $args = [])
 * @phpstan-method \Aws\Result describeForecastExportJob(array{ForecastExportJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeForecastExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeForecastExportJobAsync(array{ForecastExportJobArn?: string, ...} $args = [])
 * @method \Aws\Result describeMonitor(array $args = [])
 * @phpstan-method \Aws\Result describeMonitor(array{MonitorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMonitorAsync(array{MonitorArn?: string, ...} $args = [])
 * @method \Aws\Result describePredictor(array $args = [])
 * @phpstan-method \Aws\Result describePredictor(array{PredictorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePredictorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePredictorAsync(array{PredictorArn?: string, ...} $args = [])
 * @method \Aws\Result describePredictorBacktestExportJob(array $args = [])
 * @phpstan-method \Aws\Result describePredictorBacktestExportJob(array{PredictorBacktestExportJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePredictorBacktestExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePredictorBacktestExportJobAsync(array{PredictorBacktestExportJobArn?: string, ...} $args = [])
 * @method \Aws\Result describeWhatIfAnalysis(array $args = [])
 * @phpstan-method \Aws\Result describeWhatIfAnalysis(array{WhatIfAnalysisArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWhatIfAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWhatIfAnalysisAsync(array{WhatIfAnalysisArn?: string, ...} $args = [])
 * @method \Aws\Result describeWhatIfForecast(array $args = [])
 * @phpstan-method \Aws\Result describeWhatIfForecast(array{WhatIfForecastArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWhatIfForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWhatIfForecastAsync(array{WhatIfForecastArn?: string, ...} $args = [])
 * @method \Aws\Result describeWhatIfForecastExport(array $args = [])
 * @phpstan-method \Aws\Result describeWhatIfForecastExport(array{WhatIfForecastExportArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWhatIfForecastExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWhatIfForecastExportAsync(array{WhatIfForecastExportArn?: string, ...} $args = [])
 * @method \Aws\Result getAccuracyMetrics(array $args = [])
 * @phpstan-method \Aws\Result getAccuracyMetrics(array{PredictorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccuracyMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccuracyMetricsAsync(array{PredictorArn?: string, ...} $args = [])
 * @method \Aws\Result listDatasetGroups(array $args = [])
 * @phpstan-method \Aws\Result listDatasetGroups(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetGroupsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDatasetImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listDatasetImportJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetImportJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listExplainabilities(array $args = [])
 * @phpstan-method \Aws\Result listExplainabilities(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExplainabilitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExplainabilitiesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listExplainabilityExports(array $args = [])
 * @phpstan-method \Aws\Result listExplainabilityExports(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExplainabilityExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExplainabilityExportsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listForecastExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listForecastExportJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listForecastExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listForecastExportJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listForecasts(array $args = [])
 * @phpstan-method \Aws\Result listForecasts(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listForecastsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listForecastsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMonitorEvaluations(array $args = [])
 * @phpstan-method \Aws\Result listMonitorEvaluations(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     MonitorArn?: string,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitorEvaluationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitorEvaluationsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     MonitorArn?: string,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMonitors(array $args = [])
 * @phpstan-method \Aws\Result listMonitors(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitorsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPredictorBacktestExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listPredictorBacktestExportJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPredictorBacktestExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPredictorBacktestExportJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPredictors(array $args = [])
 * @phpstan-method \Aws\Result listPredictors(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPredictorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPredictorsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWhatIfAnalyses(array $args = [])
 * @phpstan-method \Aws\Result listWhatIfAnalyses(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWhatIfAnalysesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWhatIfAnalysesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWhatIfForecastExports(array $args = [])
 * @phpstan-method \Aws\Result listWhatIfForecastExports(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWhatIfForecastExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWhatIfForecastExportsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWhatIfForecasts(array $args = [])
 * @phpstan-method \Aws\Result listWhatIfForecasts(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWhatIfForecastsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWhatIfForecastsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Value?: string, Condition?: 'IS'|'IS_NOT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resumeResource(array $args = [])
 * @phpstan-method \Aws\Result resumeResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result stopResource(array $args = [])
 * @phpstan-method \Aws\Result stopResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDatasetGroup(array $args = [])
 * @phpstan-method \Aws\Result updateDatasetGroup(array{DatasetGroupArn?: string, DatasetArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasetGroupAsync(array{DatasetGroupArn?: string, DatasetArns?: list<string>, ...} $args = [])
 */
class ForecastServiceClient extends AwsClient {}
