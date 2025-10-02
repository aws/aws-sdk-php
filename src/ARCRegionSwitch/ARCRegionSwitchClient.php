<?php
namespace Aws\ARCRegionSwitch;

use Aws\AwsClient;

/**
 * This client is used to interact with the **ARC - Region switch** service.
 * @method \Aws\Result approvePlanExecutionStep(array $args = [])
 * @method \GuzzleHttp\Promise\Promise approvePlanExecutionStepAsync(array $args = [])
 * @method \Aws\Result cancelPlanExecution(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelPlanExecutionAsync(array $args = [])
 * @method \Aws\Result createPlan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlanAsync(array $args = [])
 * @method \Aws\Result deletePlan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePlanAsync(array $args = [])
 * @method \Aws\Result getPlan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanAsync(array $args = [])
 * @method \Aws\Result getPlanEvaluationStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanEvaluationStatusAsync(array $args = [])
 * @method \Aws\Result getPlanExecution(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanExecutionAsync(array $args = [])
 * @method \Aws\Result getPlanInRegion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanInRegionAsync(array $args = [])
 * @method \Aws\Result listPlanExecutionEvents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlanExecutionEventsAsync(array $args = [])
 * @method \Aws\Result listPlanExecutions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlanExecutionsAsync(array $args = [])
 * @method \Aws\Result listPlans(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlansAsync(array $args = [])
 * @method \Aws\Result listPlansInRegion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlansInRegionAsync(array $args = [])
 * @method \Aws\Result listRoute53HealthChecks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoute53HealthChecksAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result startPlanExecution(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startPlanExecutionAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updatePlan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePlanAsync(array $args = [])
 * @method \Aws\Result updatePlanExecution(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePlanExecutionAsync(array $args = [])
 * @method \Aws\Result updatePlanExecutionStep(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePlanExecutionStepAsync(array $args = [])
 */
class ARCRegionSwitchClient extends AwsClient {}
