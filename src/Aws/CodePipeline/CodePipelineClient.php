<?php

namespace Aws\CodePipeline;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS CodePipeline
 *
 * @method Model acknowledgeJob(array $args = array()) {@command CodePipeline AcknowledgeJob}
 * @method Model acknowledgeThirdPartyJob(array $args = array()) {@command CodePipeline AcknowledgeThirdPartyJob}
 * @method Model createCustomActionType(array $args = array()) {@command CodePipeline CreateCustomActionType}
 * @method Model createPipeline(array $args = array()) {@command CodePipeline CreatePipeline}
 * @method Model deleteCustomActionType(array $args = array()) {@command CodePipeline DeleteCustomActionType}
 * @method Model deletePipeline(array $args = array()) {@command CodePipeline DeletePipeline}
 * @method Model disableStageTransition(array $args = array()) {@command CodePipeline DisableStageTransition}
 * @method Model enableStageTransition(array $args = array()) {@command CodePipeline EnableStageTransition}
 * @method Model getJobDetails(array $args = array()) {@command CodePipeline GetJobDetails}
 * @method Model getPipeline(array $args = array()) {@command CodePipeline GetPipeline}
 * @method Model getPipelineState(array $args = array()) {@command CodePipeline GetPipelineState}
 * @method Model getThirdPartyJobDetails(array $args = array()) {@command CodePipeline GetThirdPartyJobDetails}
 * @method Model listActionTypes(array $args = array()) {@command CodePipeline ListActionTypes}
 * @method Model listPipelines(array $args = array()) {@command CodePipeline ListPipelines}
 * @method Model pollForJobs(array $args = array()) {@command CodePipeline PollForJobs}
 * @method Model pollForThirdPartyJobs(array $args = array()) {@command CodePipeline PollForThirdPartyJobs}
 * @method Model putActionRevision(array $args = array()) {@command CodePipeline PutActionRevision}
 * @method Model putJobFailureResult(array $args = array()) {@command CodePipeline PutJobFailureResult}
 * @method Model putJobSuccessResult(array $args = array()) {@command CodePipeline PutJobSuccessResult}
 * @method Model putThirdPartyJobFailureResult(array $args = array()) {@command CodePipeline PutThirdPartyJobFailureResult}
 * @method Model putThirdPartyJobSuccessResult(array $args = array()) {@command CodePipeline PutThirdPartyJobSuccessResult}
 * @method Model startPipelineExecution(array $args = array()) {@command CodePipeline StartPipelineExecution}
 * @method Model updatePipeline(array $args = array()) {@command CodePipeline UpdatePipeline}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-codepipeline.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.CodePipeline.CodePipelineClient.html API docs
 */
class CodePipelineClient extends AbstractClient
{
    const LATEST_API_VERSION = '2015-07-09';

    /**
     * Factory method to create a new AWS CodePipeline client using an array of configuration options.
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
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/codepipeline-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
