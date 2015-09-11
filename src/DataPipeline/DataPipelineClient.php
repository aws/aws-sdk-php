<?php
namespace Aws\DataPipeline;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Data Pipeline** service.
 *
 * @method \Aws\Result activatePipeline(array $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @method \Aws\Result createPipeline(array $args = [])
 * @method \Aws\Result deactivatePipeline(array $args = [])
 * @method \Aws\Result deletePipeline(array $args = [])
 * @method \Aws\Result describeObjects(array $args = [])
 * @method \Aws\Result describePipelines(array $args = [])
 * @method \Aws\Result evaluateExpression(array $args = [])
 * @method \Aws\Result getPipelineDefinition(array $args = [])
 * @method \Aws\Result listPipelines(array $args = [])
 * @method \Aws\Result pollForTask(array $args = [])
 * @method \Aws\Result putPipelineDefinition(array $args = [])
 * @method \Aws\Result queryObjects(array $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @method \Aws\Result reportTaskProgress(array $args = [])
 * @method \Aws\Result reportTaskRunnerHeartbeat(array $args = [])
 * @method \Aws\Result setStatus(array $args = [])
 * @method \Aws\Result setTaskStatus(array $args = [])
 * @method \Aws\Result validatePipelineDefinition(array $args = [])
 */
class DataPipelineClient extends AwsClient {}
