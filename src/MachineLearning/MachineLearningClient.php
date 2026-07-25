<?php
namespace Aws\MachineLearning;

use Aws\AwsClient;
use Aws\CommandInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

/**
 * Amazon Machine Learning client.
 *
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ResourceId?: string,
 *     ResourceType?: 'BatchPrediction'|'DataSource'|'Evaluation'|'MLModel',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ResourceId?: string,
 *     ResourceType?: 'BatchPrediction'|'DataSource'|'Evaluation'|'MLModel',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBatchPrediction(array $args = [])
 * @phpstan-method \Aws\Result createBatchPrediction(array{
 *     BatchPredictionId?: string,
 *     BatchPredictionName?: string,
 *     MLModelId?: string,
 *     BatchPredictionDataSourceId?: string,
 *     OutputUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBatchPredictionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBatchPredictionAsync(array{
 *     BatchPredictionId?: string,
 *     BatchPredictionName?: string,
 *     MLModelId?: string,
 *     BatchPredictionDataSourceId?: string,
 *     OutputUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSourceFromRDS(array $args = [])
 * @phpstan-method \Aws\Result createDataSourceFromRDS(array{
 *     DataSourceId?: string,
 *     DataSourceName?: string,
 *     RDSData?: array{
 *         DatabaseInformation?: array{InstanceIdentifier?: string, DatabaseName?: string, ...},
 *         SelectSqlQuery?: string,
 *         DatabaseCredentials?: array{Username?: string, Password?: string, ...},
 *         S3StagingLocation?: string,
 *         DataRearrangement?: string,
 *         DataSchema?: string,
 *         DataSchemaUri?: string,
 *         ResourceRole?: string,
 *         ServiceRole?: string,
 *         SubnetId?: string,
 *         SecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     RoleARN?: string,
 *     ComputeStatistics?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceFromRDSAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceFromRDSAsync(array{
 *     DataSourceId?: string,
 *     DataSourceName?: string,
 *     RDSData?: array{
 *         DatabaseInformation?: array{InstanceIdentifier?: string, DatabaseName?: string, ...},
 *         SelectSqlQuery?: string,
 *         DatabaseCredentials?: array{Username?: string, Password?: string, ...},
 *         S3StagingLocation?: string,
 *         DataRearrangement?: string,
 *         DataSchema?: string,
 *         DataSchemaUri?: string,
 *         ResourceRole?: string,
 *         ServiceRole?: string,
 *         SubnetId?: string,
 *         SecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     RoleARN?: string,
 *     ComputeStatistics?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSourceFromRedshift(array $args = [])
 * @phpstan-method \Aws\Result createDataSourceFromRedshift(array{
 *     DataSourceId?: string,
 *     DataSourceName?: string,
 *     DataSpec?: array{
 *         DatabaseInformation?: array{DatabaseName?: string, ClusterIdentifier?: string, ...},
 *         SelectSqlQuery?: string,
 *         DatabaseCredentials?: array{Username?: string, Password?: string, ...},
 *         S3StagingLocation?: string,
 *         DataRearrangement?: string,
 *         DataSchema?: string,
 *         DataSchemaUri?: string,
 *         ...,
 *     },
 *     RoleARN?: string,
 *     ComputeStatistics?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceFromRedshiftAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceFromRedshiftAsync(array{
 *     DataSourceId?: string,
 *     DataSourceName?: string,
 *     DataSpec?: array{
 *         DatabaseInformation?: array{DatabaseName?: string, ClusterIdentifier?: string, ...},
 *         SelectSqlQuery?: string,
 *         DatabaseCredentials?: array{Username?: string, Password?: string, ...},
 *         S3StagingLocation?: string,
 *         DataRearrangement?: string,
 *         DataSchema?: string,
 *         DataSchemaUri?: string,
 *         ...,
 *     },
 *     RoleARN?: string,
 *     ComputeStatistics?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSourceFromS3(array $args = [])
 * @phpstan-method \Aws\Result createDataSourceFromS3(array{
 *     DataSourceId?: string,
 *     DataSourceName?: string,
 *     DataSpec?: array{
 *         DataLocationS3?: string,
 *         DataRearrangement?: string,
 *         DataSchema?: string,
 *         DataSchemaLocationS3?: string,
 *         ...,
 *     },
 *     ComputeStatistics?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceFromS3Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceFromS3Async(array{
 *     DataSourceId?: string,
 *     DataSourceName?: string,
 *     DataSpec?: array{
 *         DataLocationS3?: string,
 *         DataRearrangement?: string,
 *         DataSchema?: string,
 *         DataSchemaLocationS3?: string,
 *         ...,
 *     },
 *     ComputeStatistics?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEvaluation(array $args = [])
 * @phpstan-method \Aws\Result createEvaluation(array{
 *     EvaluationId?: string,
 *     EvaluationName?: string,
 *     MLModelId?: string,
 *     EvaluationDataSourceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEvaluationAsync(array{
 *     EvaluationId?: string,
 *     EvaluationName?: string,
 *     MLModelId?: string,
 *     EvaluationDataSourceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMLModel(array $args = [])
 * @phpstan-method \Aws\Result createMLModel(array{
 *     MLModelId?: string,
 *     MLModelName?: string,
 *     MLModelType?: 'BINARY'|'MULTICLASS'|'REGRESSION',
 *     Parameters?: array<string, string>,
 *     TrainingDataSourceId?: string,
 *     Recipe?: string,
 *     RecipeUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMLModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMLModelAsync(array{
 *     MLModelId?: string,
 *     MLModelName?: string,
 *     MLModelType?: 'BINARY'|'MULTICLASS'|'REGRESSION',
 *     Parameters?: array<string, string>,
 *     TrainingDataSourceId?: string,
 *     Recipe?: string,
 *     RecipeUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRealtimeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createRealtimeEndpoint(array{MLModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRealtimeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRealtimeEndpointAsync(array{MLModelId?: string, ...} $args = [])
 * @method \Aws\Result deleteBatchPrediction(array $args = [])
 * @phpstan-method \Aws\Result deleteBatchPrediction(array{BatchPredictionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBatchPredictionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBatchPredictionAsync(array{BatchPredictionId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSource(array{DataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array{DataSourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteEvaluation(array $args = [])
 * @phpstan-method \Aws\Result deleteEvaluation(array{EvaluationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEvaluationAsync(array{EvaluationId?: string, ...} $args = [])
 * @method \Aws\Result deleteMLModel(array $args = [])
 * @phpstan-method \Aws\Result deleteMLModel(array{MLModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMLModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMLModelAsync(array{MLModelId?: string, ...} $args = [])
 * @method \Aws\Result deleteRealtimeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteRealtimeEndpoint(array{MLModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRealtimeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRealtimeEndpointAsync(array{MLModelId?: string, ...} $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{
 *     TagKeys?: list<string>,
 *     ResourceId?: string,
 *     ResourceType?: 'BatchPrediction'|'DataSource'|'Evaluation'|'MLModel',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{
 *     TagKeys?: list<string>,
 *     ResourceId?: string,
 *     ResourceType?: 'BatchPrediction'|'DataSource'|'Evaluation'|'MLModel',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeBatchPredictions(array $args = [])
 * @phpstan-method \Aws\Result describeBatchPredictions(array{
 *     FilterVariable?: 'CreatedAt'|'DataSourceId'|'DataURI'|'IAMUser'|'LastUpdatedAt'|'MLModelId'|'Name'|'Status',
 *     EQ?: string,
 *     GT?: string,
 *     LT?: string,
 *     GE?: string,
 *     LE?: string,
 *     NE?: string,
 *     Prefix?: string,
 *     SortOrder?: 'asc'|'dsc',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBatchPredictionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBatchPredictionsAsync(array{
 *     FilterVariable?: 'CreatedAt'|'DataSourceId'|'DataURI'|'IAMUser'|'LastUpdatedAt'|'MLModelId'|'Name'|'Status',
 *     EQ?: string,
 *     GT?: string,
 *     LT?: string,
 *     GE?: string,
 *     LE?: string,
 *     NE?: string,
 *     Prefix?: string,
 *     SortOrder?: 'asc'|'dsc',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDataSources(array $args = [])
 * @phpstan-method \Aws\Result describeDataSources(array{
 *     FilterVariable?: 'CreatedAt'|'DataLocationS3'|'IAMUser'|'LastUpdatedAt'|'Name'|'Status',
 *     EQ?: string,
 *     GT?: string,
 *     LT?: string,
 *     GE?: string,
 *     LE?: string,
 *     NE?: string,
 *     Prefix?: string,
 *     SortOrder?: 'asc'|'dsc',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSourcesAsync(array{
 *     FilterVariable?: 'CreatedAt'|'DataLocationS3'|'IAMUser'|'LastUpdatedAt'|'Name'|'Status',
 *     EQ?: string,
 *     GT?: string,
 *     LT?: string,
 *     GE?: string,
 *     LE?: string,
 *     NE?: string,
 *     Prefix?: string,
 *     SortOrder?: 'asc'|'dsc',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEvaluations(array $args = [])
 * @phpstan-method \Aws\Result describeEvaluations(array{
 *     FilterVariable?: 'CreatedAt'|'DataSourceId'|'DataURI'|'IAMUser'|'LastUpdatedAt'|'MLModelId'|'Name'|'Status',
 *     EQ?: string,
 *     GT?: string,
 *     LT?: string,
 *     GE?: string,
 *     LE?: string,
 *     NE?: string,
 *     Prefix?: string,
 *     SortOrder?: 'asc'|'dsc',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEvaluationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEvaluationsAsync(array{
 *     FilterVariable?: 'CreatedAt'|'DataSourceId'|'DataURI'|'IAMUser'|'LastUpdatedAt'|'MLModelId'|'Name'|'Status',
 *     EQ?: string,
 *     GT?: string,
 *     LT?: string,
 *     GE?: string,
 *     LE?: string,
 *     NE?: string,
 *     Prefix?: string,
 *     SortOrder?: 'asc'|'dsc',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMLModels(array $args = [])
 * @phpstan-method \Aws\Result describeMLModels(array{
 *     FilterVariable?: 'Algorithm'|'CreatedAt'|'IAMUser'|'LastUpdatedAt'|'MLModelType'|'Name'|'RealtimeEndpointStatus'|'Status'|'TrainingDataSourceId'|'TrainingDataURI',
 *     EQ?: string,
 *     GT?: string,
 *     LT?: string,
 *     GE?: string,
 *     LE?: string,
 *     NE?: string,
 *     Prefix?: string,
 *     SortOrder?: 'asc'|'dsc',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMLModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMLModelsAsync(array{
 *     FilterVariable?: 'Algorithm'|'CreatedAt'|'IAMUser'|'LastUpdatedAt'|'MLModelType'|'Name'|'RealtimeEndpointStatus'|'Status'|'TrainingDataSourceId'|'TrainingDataURI',
 *     EQ?: string,
 *     GT?: string,
 *     LT?: string,
 *     GE?: string,
 *     LE?: string,
 *     NE?: string,
 *     Prefix?: string,
 *     SortOrder?: 'asc'|'dsc',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{ResourceId?: string, ResourceType?: 'BatchPrediction'|'DataSource'|'Evaluation'|'MLModel', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{ResourceId?: string, ResourceType?: 'BatchPrediction'|'DataSource'|'Evaluation'|'MLModel', ...} $args = [])
 * @method \Aws\Result getBatchPrediction(array $args = [])
 * @phpstan-method \Aws\Result getBatchPrediction(array{BatchPredictionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBatchPredictionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBatchPredictionAsync(array{BatchPredictionId?: string, ...} $args = [])
 * @method \Aws\Result getDataSource(array $args = [])
 * @phpstan-method \Aws\Result getDataSource(array{DataSourceId?: string, Verbose?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSourceAsync(array{DataSourceId?: string, Verbose?: bool, ...} $args = [])
 * @method \Aws\Result getEvaluation(array $args = [])
 * @phpstan-method \Aws\Result getEvaluation(array{EvaluationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvaluationAsync(array{EvaluationId?: string, ...} $args = [])
 * @method \Aws\Result getMLModel(array $args = [])
 * @phpstan-method \Aws\Result getMLModel(array{MLModelId?: string, Verbose?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLModelAsync(array{MLModelId?: string, Verbose?: bool, ...} $args = [])
 * @method \Aws\Result predict(array $args = [])
 * @phpstan-method \Aws\Result predict(array{MLModelId?: string, Record?: array<string, string>, PredictEndpoint?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise predictAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise predictAsync(array{MLModelId?: string, Record?: array<string, string>, PredictEndpoint?: string, ...} $args = [])
 * @method \Aws\Result updateBatchPrediction(array $args = [])
 * @phpstan-method \Aws\Result updateBatchPrediction(array{BatchPredictionId?: string, BatchPredictionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBatchPredictionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBatchPredictionAsync(array{BatchPredictionId?: string, BatchPredictionName?: string, ...} $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDataSource(array{DataSourceId?: string, DataSourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array{DataSourceId?: string, DataSourceName?: string, ...} $args = [])
 * @method \Aws\Result updateEvaluation(array $args = [])
 * @phpstan-method \Aws\Result updateEvaluation(array{EvaluationId?: string, EvaluationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEvaluationAsync(array{EvaluationId?: string, EvaluationName?: string, ...} $args = [])
 * @method \Aws\Result updateMLModel(array $args = [])
 * @phpstan-method \Aws\Result updateMLModel(array{MLModelId?: string, MLModelName?: string, ScoreThreshold?: float, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMLModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMLModelAsync(array{MLModelId?: string, MLModelName?: string, ScoreThreshold?: float, ...} $args = [])
 */
class MachineLearningClient extends AwsClient
{
    public function __construct(array $config)
    {
        parent::__construct($config);
        $list = $this->getHandlerList();
        $list->appendBuild($this->predictEndpoint(), 'ml.predict_endpoint');
    }

    /**
     * Changes the endpoint of the Predict operation to the provided endpoint.
     *
     * @return callable
     */
    private function predictEndpoint()
    {
        return static function (callable $handler) {
            return function (
                CommandInterface $command,
                ?RequestInterface $request = null
            ) use ($handler) {
                if ($command->getName() === 'Predict') {
                    $request = $request->withUri(new Uri($command['PredictEndpoint']));
                }
                return $handler($command, $request);
            };
        };
    }
}
