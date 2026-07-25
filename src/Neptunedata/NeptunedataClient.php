<?php
namespace Aws\Neptunedata;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon NeptuneData** service.
 * @method \Aws\Result cancelGremlinQuery(array $args = [])
 * @phpstan-method \Aws\Result cancelGremlinQuery(array{queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelGremlinQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelGremlinQueryAsync(array{queryId?: string, ...} $args = [])
 * @method \Aws\Result cancelLoaderJob(array $args = [])
 * @phpstan-method \Aws\Result cancelLoaderJob(array{loadId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelLoaderJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelLoaderJobAsync(array{loadId?: string, ...} $args = [])
 * @method \Aws\Result cancelMLDataProcessingJob(array $args = [])
 * @phpstan-method \Aws\Result cancelMLDataProcessingJob(array{id?: string, neptuneIamRoleArn?: string, clean?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMLDataProcessingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMLDataProcessingJobAsync(array{id?: string, neptuneIamRoleArn?: string, clean?: bool, ...} $args = [])
 * @method \Aws\Result cancelMLModelTrainingJob(array $args = [])
 * @phpstan-method \Aws\Result cancelMLModelTrainingJob(array{id?: string, neptuneIamRoleArn?: string, clean?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMLModelTrainingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMLModelTrainingJobAsync(array{id?: string, neptuneIamRoleArn?: string, clean?: bool, ...} $args = [])
 * @method \Aws\Result cancelMLModelTransformJob(array $args = [])
 * @phpstan-method \Aws\Result cancelMLModelTransformJob(array{id?: string, neptuneIamRoleArn?: string, clean?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMLModelTransformJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMLModelTransformJobAsync(array{id?: string, neptuneIamRoleArn?: string, clean?: bool, ...} $args = [])
 * @method \Aws\Result cancelOpenCypherQuery(array $args = [])
 * @phpstan-method \Aws\Result cancelOpenCypherQuery(array{queryId?: string, silent?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelOpenCypherQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelOpenCypherQueryAsync(array{queryId?: string, silent?: bool, ...} $args = [])
 * @method \Aws\Result createMLEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createMLEndpoint(array{
 *     id?: string,
 *     mlModelTrainingJobId?: string,
 *     mlModelTransformJobId?: string,
 *     update?: bool,
 *     neptuneIamRoleArn?: string,
 *     modelName?: string,
 *     instanceType?: string,
 *     instanceCount?: int,
 *     volumeEncryptionKMSKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMLEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMLEndpointAsync(array{
 *     id?: string,
 *     mlModelTrainingJobId?: string,
 *     mlModelTransformJobId?: string,
 *     update?: bool,
 *     neptuneIamRoleArn?: string,
 *     modelName?: string,
 *     instanceType?: string,
 *     instanceCount?: int,
 *     volumeEncryptionKMSKey?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteMLEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteMLEndpoint(array{id?: string, neptuneIamRoleArn?: string, clean?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMLEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMLEndpointAsync(array{id?: string, neptuneIamRoleArn?: string, clean?: bool, ...} $args = [])
 * @method \Aws\Result deletePropertygraphStatistics(array $args = [])
 * @phpstan-method \Aws\Result deletePropertygraphStatistics(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePropertygraphStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePropertygraphStatisticsAsync(array{...} $args = [])
 * @method \Aws\Result deleteSparqlStatistics(array $args = [])
 * @phpstan-method \Aws\Result deleteSparqlStatistics(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSparqlStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSparqlStatisticsAsync(array{...} $args = [])
 * @method \Aws\Result executeFastReset(array $args = [])
 * @phpstan-method \Aws\Result executeFastReset(array{action?: 'initiateDatabaseReset'|'performDatabaseReset', token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeFastResetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeFastResetAsync(array{action?: 'initiateDatabaseReset'|'performDatabaseReset', token?: string, ...} $args = [])
 * @method \Aws\Result executeGremlinExplainQuery(array $args = [])
 * @phpstan-method \Aws\Result executeGremlinExplainQuery(array{gremlinQuery?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeGremlinExplainQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeGremlinExplainQueryAsync(array{gremlinQuery?: string, ...} $args = [])
 * @method \Aws\Result executeGremlinProfileQuery(array $args = [])
 * @phpstan-method \Aws\Result executeGremlinProfileQuery(array{gremlinQuery?: string, results?: bool, chop?: int, serializer?: string, indexOps?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeGremlinProfileQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeGremlinProfileQueryAsync(array{gremlinQuery?: string, results?: bool, chop?: int, serializer?: string, indexOps?: bool, ...} $args = [])
 * @method \Aws\Result executeGremlinQuery(array $args = [])
 * @phpstan-method \Aws\Result executeGremlinQuery(array{gremlinQuery?: string, serializer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeGremlinQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeGremlinQueryAsync(array{gremlinQuery?: string, serializer?: string, ...} $args = [])
 * @method \Aws\Result executeOpenCypherExplainQuery(array $args = [])
 * @phpstan-method \Aws\Result executeOpenCypherExplainQuery(array{openCypherQuery?: string, parameters?: string, explainMode?: 'details'|'dynamic'|'static', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeOpenCypherExplainQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeOpenCypherExplainQueryAsync(array{openCypherQuery?: string, parameters?: string, explainMode?: 'details'|'dynamic'|'static', ...} $args = [])
 * @method \Aws\Result executeOpenCypherQuery(array $args = [])
 * @phpstan-method \Aws\Result executeOpenCypherQuery(array{openCypherQuery?: string, parameters?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeOpenCypherQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeOpenCypherQueryAsync(array{openCypherQuery?: string, parameters?: string, ...} $args = [])
 * @method \Aws\Result getEngineStatus(array $args = [])
 * @phpstan-method \Aws\Result getEngineStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEngineStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEngineStatusAsync(array{...} $args = [])
 * @method \Aws\Result getGremlinQueryStatus(array $args = [])
 * @phpstan-method \Aws\Result getGremlinQueryStatus(array{queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGremlinQueryStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGremlinQueryStatusAsync(array{queryId?: string, ...} $args = [])
 * @method \Aws\Result getLoaderJobStatus(array $args = [])
 * @phpstan-method \Aws\Result getLoaderJobStatus(array{loadId?: string, details?: bool, errors?: bool, page?: int, errorsPerPage?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoaderJobStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoaderJobStatusAsync(array{loadId?: string, details?: bool, errors?: bool, page?: int, errorsPerPage?: int, ...} $args = [])
 * @method \Aws\Result getMLDataProcessingJob(array $args = [])
 * @phpstan-method \Aws\Result getMLDataProcessingJob(array{id?: string, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLDataProcessingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLDataProcessingJobAsync(array{id?: string, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \Aws\Result getMLEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getMLEndpoint(array{id?: string, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLEndpointAsync(array{id?: string, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \Aws\Result getMLModelTrainingJob(array $args = [])
 * @phpstan-method \Aws\Result getMLModelTrainingJob(array{id?: string, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLModelTrainingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLModelTrainingJobAsync(array{id?: string, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \Aws\Result getMLModelTransformJob(array $args = [])
 * @phpstan-method \Aws\Result getMLModelTransformJob(array{id?: string, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLModelTransformJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLModelTransformJobAsync(array{id?: string, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \Aws\Result getOpenCypherQueryStatus(array $args = [])
 * @phpstan-method \Aws\Result getOpenCypherQueryStatus(array{queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpenCypherQueryStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpenCypherQueryStatusAsync(array{queryId?: string, ...} $args = [])
 * @method \Aws\Result getPropertygraphStatistics(array $args = [])
 * @phpstan-method \Aws\Result getPropertygraphStatistics(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPropertygraphStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPropertygraphStatisticsAsync(array{...} $args = [])
 * @method \Aws\Result getPropertygraphStream(array $args = [])
 * @phpstan-method \Aws\Result getPropertygraphStream(array{
 *     limit?: int,
 *     iteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'LATEST'|'TRIM_HORIZON',
 *     commitNum?: int,
 *     opNum?: int,
 *     encoding?: 'gzip',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPropertygraphStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPropertygraphStreamAsync(array{
 *     limit?: int,
 *     iteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'LATEST'|'TRIM_HORIZON',
 *     commitNum?: int,
 *     opNum?: int,
 *     encoding?: 'gzip',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPropertygraphSummary(array $args = [])
 * @phpstan-method \Aws\Result getPropertygraphSummary(array{mode?: 'basic'|'detailed', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPropertygraphSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPropertygraphSummaryAsync(array{mode?: 'basic'|'detailed', ...} $args = [])
 * @method \Aws\Result getRDFGraphSummary(array $args = [])
 * @phpstan-method \Aws\Result getRDFGraphSummary(array{mode?: 'basic'|'detailed', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRDFGraphSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRDFGraphSummaryAsync(array{mode?: 'basic'|'detailed', ...} $args = [])
 * @method \Aws\Result getSparqlStatistics(array $args = [])
 * @phpstan-method \Aws\Result getSparqlStatistics(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSparqlStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSparqlStatisticsAsync(array{...} $args = [])
 * @method \Aws\Result getSparqlStream(array $args = [])
 * @phpstan-method \Aws\Result getSparqlStream(array{
 *     limit?: int,
 *     iteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'LATEST'|'TRIM_HORIZON',
 *     commitNum?: int,
 *     opNum?: int,
 *     encoding?: 'gzip',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSparqlStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSparqlStreamAsync(array{
 *     limit?: int,
 *     iteratorType?: 'AFTER_SEQUENCE_NUMBER'|'AT_SEQUENCE_NUMBER'|'LATEST'|'TRIM_HORIZON',
 *     commitNum?: int,
 *     opNum?: int,
 *     encoding?: 'gzip',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGremlinQueries(array $args = [])
 * @phpstan-method \Aws\Result listGremlinQueries(array{includeWaiting?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGremlinQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGremlinQueriesAsync(array{includeWaiting?: bool, ...} $args = [])
 * @method \Aws\Result listLoaderJobs(array $args = [])
 * @phpstan-method \Aws\Result listLoaderJobs(array{limit?: int, includeQueuedLoads?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLoaderJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLoaderJobsAsync(array{limit?: int, includeQueuedLoads?: bool, ...} $args = [])
 * @method \Aws\Result listMLDataProcessingJobs(array $args = [])
 * @phpstan-method \Aws\Result listMLDataProcessingJobs(array{maxItems?: int, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMLDataProcessingJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMLDataProcessingJobsAsync(array{maxItems?: int, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \Aws\Result listMLEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listMLEndpoints(array{maxItems?: int, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMLEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMLEndpointsAsync(array{maxItems?: int, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \Aws\Result listMLModelTrainingJobs(array $args = [])
 * @phpstan-method \Aws\Result listMLModelTrainingJobs(array{maxItems?: int, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMLModelTrainingJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMLModelTrainingJobsAsync(array{maxItems?: int, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \Aws\Result listMLModelTransformJobs(array $args = [])
 * @phpstan-method \Aws\Result listMLModelTransformJobs(array{maxItems?: int, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMLModelTransformJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMLModelTransformJobsAsync(array{maxItems?: int, neptuneIamRoleArn?: string, ...} $args = [])
 * @method \Aws\Result listOpenCypherQueries(array $args = [])
 * @phpstan-method \Aws\Result listOpenCypherQueries(array{includeWaiting?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpenCypherQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpenCypherQueriesAsync(array{includeWaiting?: bool, ...} $args = [])
 * @method \Aws\Result managePropertygraphStatistics(array $args = [])
 * @phpstan-method \Aws\Result managePropertygraphStatistics(array{mode?: 'disableAutoCompute'|'enableAutoCompute'|'refresh', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise managePropertygraphStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise managePropertygraphStatisticsAsync(array{mode?: 'disableAutoCompute'|'enableAutoCompute'|'refresh', ...} $args = [])
 * @method \Aws\Result manageSparqlStatistics(array $args = [])
 * @phpstan-method \Aws\Result manageSparqlStatistics(array{mode?: 'disableAutoCompute'|'enableAutoCompute'|'refresh', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise manageSparqlStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise manageSparqlStatisticsAsync(array{mode?: 'disableAutoCompute'|'enableAutoCompute'|'refresh', ...} $args = [])
 * @method \Aws\Result startLoaderJob(array $args = [])
 * @phpstan-method \Aws\Result startLoaderJob(array{
 *     source?: string,
 *     format?: 'csv'|'nquads'|'ntriples'|'opencypher'|'rdfxml'|'turtle',
 *     s3BucketRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-west-1'|'us-west-2',
 *     iamRoleArn?: string,
 *     mode?: 'AUTO'|'NEW'|'RESUME',
 *     failOnError?: bool,
 *     parallelism?: 'HIGH'|'LOW'|'MEDIUM'|'OVERSUBSCRIBE',
 *     parserConfiguration?: array<string, string>,
 *     updateSingleCardinalityProperties?: bool,
 *     queueRequest?: bool,
 *     dependencies?: list<string>,
 *     userProvidedEdgeIds?: bool,
 *     edgeOnlyLoad?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startLoaderJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startLoaderJobAsync(array{
 *     source?: string,
 *     format?: 'csv'|'nquads'|'ntriples'|'opencypher'|'rdfxml'|'turtle',
 *     s3BucketRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-west-1'|'us-west-2',
 *     iamRoleArn?: string,
 *     mode?: 'AUTO'|'NEW'|'RESUME',
 *     failOnError?: bool,
 *     parallelism?: 'HIGH'|'LOW'|'MEDIUM'|'OVERSUBSCRIBE',
 *     parserConfiguration?: array<string, string>,
 *     updateSingleCardinalityProperties?: bool,
 *     queueRequest?: bool,
 *     dependencies?: list<string>,
 *     userProvidedEdgeIds?: bool,
 *     edgeOnlyLoad?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMLDataProcessingJob(array $args = [])
 * @phpstan-method \Aws\Result startMLDataProcessingJob(array{
 *     id?: string,
 *     previousDataProcessingJobId?: string,
 *     inputDataS3Location?: string,
 *     processedDataS3Location?: string,
 *     sagemakerIamRoleArn?: string,
 *     neptuneIamRoleArn?: string,
 *     processingInstanceType?: string,
 *     processingInstanceVolumeSizeInGB?: int,
 *     processingTimeOutInSeconds?: int,
 *     modelType?: string,
 *     configFileName?: string,
 *     subnets?: list<string>,
 *     securityGroupIds?: list<string>,
 *     volumeEncryptionKMSKey?: string,
 *     s3OutputEncryptionKMSKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMLDataProcessingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMLDataProcessingJobAsync(array{
 *     id?: string,
 *     previousDataProcessingJobId?: string,
 *     inputDataS3Location?: string,
 *     processedDataS3Location?: string,
 *     sagemakerIamRoleArn?: string,
 *     neptuneIamRoleArn?: string,
 *     processingInstanceType?: string,
 *     processingInstanceVolumeSizeInGB?: int,
 *     processingTimeOutInSeconds?: int,
 *     modelType?: string,
 *     configFileName?: string,
 *     subnets?: list<string>,
 *     securityGroupIds?: list<string>,
 *     volumeEncryptionKMSKey?: string,
 *     s3OutputEncryptionKMSKey?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMLModelTrainingJob(array $args = [])
 * @phpstan-method \Aws\Result startMLModelTrainingJob(array{
 *     id?: string,
 *     previousModelTrainingJobId?: string,
 *     dataProcessingJobId?: string,
 *     trainModelS3Location?: string,
 *     sagemakerIamRoleArn?: string,
 *     neptuneIamRoleArn?: string,
 *     baseProcessingInstanceType?: string,
 *     trainingInstanceType?: string,
 *     trainingInstanceVolumeSizeInGB?: int,
 *     trainingTimeOutInSeconds?: int,
 *     maxHPONumberOfTrainingJobs?: int,
 *     maxHPOParallelTrainingJobs?: int,
 *     subnets?: list<string>,
 *     securityGroupIds?: list<string>,
 *     volumeEncryptionKMSKey?: string,
 *     s3OutputEncryptionKMSKey?: string,
 *     enableManagedSpotTraining?: bool,
 *     customModelTrainingParameters?: array{
 *         sourceS3DirectoryPath?: string,
 *         trainingEntryPointScript?: string,
 *         transformEntryPointScript?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMLModelTrainingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMLModelTrainingJobAsync(array{
 *     id?: string,
 *     previousModelTrainingJobId?: string,
 *     dataProcessingJobId?: string,
 *     trainModelS3Location?: string,
 *     sagemakerIamRoleArn?: string,
 *     neptuneIamRoleArn?: string,
 *     baseProcessingInstanceType?: string,
 *     trainingInstanceType?: string,
 *     trainingInstanceVolumeSizeInGB?: int,
 *     trainingTimeOutInSeconds?: int,
 *     maxHPONumberOfTrainingJobs?: int,
 *     maxHPOParallelTrainingJobs?: int,
 *     subnets?: list<string>,
 *     securityGroupIds?: list<string>,
 *     volumeEncryptionKMSKey?: string,
 *     s3OutputEncryptionKMSKey?: string,
 *     enableManagedSpotTraining?: bool,
 *     customModelTrainingParameters?: array{
 *         sourceS3DirectoryPath?: string,
 *         trainingEntryPointScript?: string,
 *         transformEntryPointScript?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMLModelTransformJob(array $args = [])
 * @phpstan-method \Aws\Result startMLModelTransformJob(array{
 *     id?: string,
 *     dataProcessingJobId?: string,
 *     mlModelTrainingJobId?: string,
 *     trainingJobName?: string,
 *     modelTransformOutputS3Location?: string,
 *     sagemakerIamRoleArn?: string,
 *     neptuneIamRoleArn?: string,
 *     customModelTransformParameters?: array{sourceS3DirectoryPath?: string, transformEntryPointScript?: string, ...},
 *     baseProcessingInstanceType?: string,
 *     baseProcessingInstanceVolumeSizeInGB?: int,
 *     subnets?: list<string>,
 *     securityGroupIds?: list<string>,
 *     volumeEncryptionKMSKey?: string,
 *     s3OutputEncryptionKMSKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMLModelTransformJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMLModelTransformJobAsync(array{
 *     id?: string,
 *     dataProcessingJobId?: string,
 *     mlModelTrainingJobId?: string,
 *     trainingJobName?: string,
 *     modelTransformOutputS3Location?: string,
 *     sagemakerIamRoleArn?: string,
 *     neptuneIamRoleArn?: string,
 *     customModelTransformParameters?: array{sourceS3DirectoryPath?: string, transformEntryPointScript?: string, ...},
 *     baseProcessingInstanceType?: string,
 *     baseProcessingInstanceVolumeSizeInGB?: int,
 *     subnets?: list<string>,
 *     securityGroupIds?: list<string>,
 *     volumeEncryptionKMSKey?: string,
 *     s3OutputEncryptionKMSKey?: string,
 *     ...,
 * } $args = [])
 */
class NeptunedataClient extends AwsClient {}
