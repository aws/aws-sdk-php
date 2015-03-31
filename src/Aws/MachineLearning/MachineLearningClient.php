<?php

namespace Aws\MachineLearning;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\MachineLearning\PredictEndpointListener;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon Machine Learning
 *
 * @method Model createBatchPrediction(array $args = array()) {@command MachineLearning CreateBatchPrediction}
 * @method Model createDataSourceFromRDS(array $args = array()) {@command MachineLearning CreateDataSourceFromRDS}
 * @method Model createDataSourceFromRedshift(array $args = array()) {@command MachineLearning CreateDataSourceFromRedshift}
 * @method Model createDataSourceFromS3(array $args = array()) {@command MachineLearning CreateDataSourceFromS3}
 * @method Model createEvaluation(array $args = array()) {@command MachineLearning CreateEvaluation}
 * @method Model createMLModel(array $args = array()) {@command MachineLearning CreateMLModel}
 * @method Model createRealtimeEndpoint(array $args = array()) {@command MachineLearning CreateRealtimeEndpoint}
 * @method Model deleteBatchPrediction(array $args = array()) {@command MachineLearning DeleteBatchPrediction}
 * @method Model deleteDataSource(array $args = array()) {@command MachineLearning DeleteDataSource}
 * @method Model deleteEvaluation(array $args = array()) {@command MachineLearning DeleteEvaluation}
 * @method Model deleteMLModel(array $args = array()) {@command MachineLearning DeleteMLModel}
 * @method Model deleteRealtimeEndpoint(array $args = array()) {@command MachineLearning DeleteRealtimeEndpoint}
 * @method Model describeBatchPredictions(array $args = array()) {@command MachineLearning DescribeBatchPredictions}
 * @method Model describeDataSources(array $args = array()) {@command MachineLearning DescribeDataSources}
 * @method Model describeEvaluations(array $args = array()) {@command MachineLearning DescribeEvaluations}
 * @method Model describeMLModels(array $args = array()) {@command MachineLearning DescribeMLModels}
 * @method Model getBatchPrediction(array $args = array()) {@command MachineLearning GetBatchPrediction}
 * @method Model getDataSource(array $args = array()) {@command MachineLearning GetDataSource}
 * @method Model getEvaluation(array $args = array()) {@command MachineLearning GetEvaluation}
 * @method Model getMLModel(array $args = array()) {@command MachineLearning GetMLModel}
 * @method Model predict(array $args = array()) {@command MachineLearning Predict}
 * @method Model updateBatchPrediction(array $args = array()) {@command MachineLearning UpdateBatchPrediction}
 * @method Model updateDataSource(array $args = array()) {@command MachineLearning UpdateDataSource}
 * @method Model updateEvaluation(array $args = array()) {@command MachineLearning UpdateEvaluation}
 * @method Model updateMLModel(array $args = array()) {@command MachineLearning UpdateMLModel}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-machinelearning.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.MachineLearning.MachineLearningClient.html API docs
 */
class MachineLearningClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-12-12';

    /**
     * Factory method to create a new Amazon Machine Learning client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/machinelearning-%s.php',
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();

        $client->addSubscriber(new PredictEndpointListener());

        return $client;
    }
}
