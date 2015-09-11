<?php
namespace Aws\MachineLearning;

use Aws\AwsClient;
use Aws\CommandInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

/**
 * Amazon Machine Learning client.
 *
 * @method \Aws\Result createBatchPrediction(array $args = [])
 * @method \Aws\Result createDataSourceFromRDS(array $args = [])
 * @method \Aws\Result createDataSourceFromRedshift(array $args = [])
 * @method \Aws\Result createDataSourceFromS3(array $args = [])
 * @method \Aws\Result createEvaluation(array $args = [])
 * @method \Aws\Result createMLModel(array $args = [])
 * @method \Aws\Result createRealtimeEndpoint(array $args = [])
 * @method \Aws\Result deleteBatchPrediction(array $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @method \Aws\Result deleteEvaluation(array $args = [])
 * @method \Aws\Result deleteMLModel(array $args = [])
 * @method \Aws\Result deleteRealtimeEndpoint(array $args = [])
 * @method \Aws\Result describeBatchPredictions(array $args = [])
 * @method \Aws\Result describeDataSources(array $args = [])
 * @method \Aws\Result describeEvaluations(array $args = [])
 * @method \Aws\Result describeMLModels(array $args = [])
 * @method \Aws\Result getBatchPrediction(array $args = [])
 * @method \Aws\Result getDataSource(array $args = [])
 * @method \Aws\Result getEvaluation(array $args = [])
 * @method \Aws\Result getMLModel(array $args = [])
 * @method \Aws\Result predict(array $args = [])
 * @method \Aws\Result updateBatchPrediction(array $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @method \Aws\Result updateEvaluation(array $args = [])
 * @method \Aws\Result updateMLModel(array $args = [])
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
                RequestInterface $request = null
            ) use ($handler) {
                if ($command->getName() === 'Predict') {
                    $request = $request->withUri(new Uri($command['PredictEndpoint']));
                }
                return $handler($command, $request);
            };
        };
    }
}
