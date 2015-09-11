<?php
namespace Aws\CodePipeline;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodePipeline** service.
 *
 * @method \Aws\Result acknowledgeJob(array $args = [])
 * @method \Aws\Result acknowledgeThirdPartyJob(array $args = [])
 * @method \Aws\Result createCustomActionType(array $args = [])
 * @method \Aws\Result createPipeline(array $args = [])
 * @method \Aws\Result deleteCustomActionType(array $args = [])
 * @method \Aws\Result deletePipeline(array $args = [])
 * @method \Aws\Result disableStageTransition(array $args = [])
 * @method \Aws\Result enableStageTransition(array $args = [])
 * @method \Aws\Result getJobDetails(array $args = [])
 * @method \Aws\Result getPipeline(array $args = [])
 * @method \Aws\Result getPipelineState(array $args = [])
 * @method \Aws\Result getThirdPartyJobDetails(array $args = [])
 * @method \Aws\Result listActionTypes(array $args = [])
 * @method \Aws\Result listPipelines(array $args = [])
 * @method \Aws\Result pollForJobs(array $args = [])
 * @method \Aws\Result pollForThirdPartyJobs(array $args = [])
 * @method \Aws\Result putActionRevision(array $args = [])
 * @method \Aws\Result putJobFailureResult(array $args = [])
 * @method \Aws\Result putJobSuccessResult(array $args = [])
 * @method \Aws\Result putThirdPartyJobFailureResult(array $args = [])
 * @method \Aws\Result putThirdPartyJobSuccessResult(array $args = [])
 * @method \Aws\Result startPipelineExecution(array $args = [])
 * @method \Aws\Result updatePipeline(array $args = [])
 */
class CodePipelineClient extends AwsClient {}