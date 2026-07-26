<?php
namespace Aws\ARCRegionSwitch;

use Aws\AwsClient;

/**
 * This client is used to interact with the **ARC - Region switch** service.
 * @method \Aws\Result approvePlanExecutionStep(array $args = [])
 * @phpstan-method \Aws\Result approvePlanExecutionStep(array{
 *     planArn?: string,
 *     executionId?: string,
 *     stepName?: string,
 *     approval?: 'approve'|'decline',
 *     comment?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise approvePlanExecutionStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise approvePlanExecutionStepAsync(array{
 *     planArn?: string,
 *     executionId?: string,
 *     stepName?: string,
 *     approval?: 'approve'|'decline',
 *     comment?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelPlanExecution(array $args = [])
 * @phpstan-method \Aws\Result cancelPlanExecution(array{planArn?: string, executionId?: string, comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelPlanExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelPlanExecutionAsync(array{planArn?: string, executionId?: string, comment?: string, ...} $args = [])
 * @method \Aws\Result createPlan(array $args = [])
 * @phpstan-method \Aws\Result createPlan(array{
 *     description?: string,
 *     workflows?: list<array{
 *         steps?: list<array>,
 *         workflowTargetAction?: 'activate'|'deactivate'|'postRecovery',
 *         workflowTargetRegion?: string,
 *         workflowDescription?: string,
 *         ...,
 *     }>,
 *     executionRole?: string,
 *     recoveryTimeObjectiveMinutes?: int,
 *     associatedAlarms?: array<string, array{
 *         crossAccountRole?: string,
 *         externalId?: string,
 *         resourceIdentifier?: string,
 *         alarmType?: 'applicationHealth'|'trigger',
 *         ...,
 *     }>,
 *     triggers?: list<array{
 *         description?: string,
 *         targetRegion?: string,
 *         action?: 'activate'|'deactivate'|'postRecovery',
 *         conditions?: list<array>,
 *         minDelayMinutesBetweenExecutions?: int,
 *         ...,
 *     }>,
 *     reportConfiguration?: array{reportOutput?: list<array>, ...},
 *     name?: string,
 *     regions?: list<string>,
 *     recoveryApproach?: 'activeActive'|'activePassive',
 *     primaryRegion?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPlanAsync(array{
 *     description?: string,
 *     workflows?: list<array{
 *         steps?: list<array>,
 *         workflowTargetAction?: 'activate'|'deactivate'|'postRecovery',
 *         workflowTargetRegion?: string,
 *         workflowDescription?: string,
 *         ...,
 *     }>,
 *     executionRole?: string,
 *     recoveryTimeObjectiveMinutes?: int,
 *     associatedAlarms?: array<string, array{
 *         crossAccountRole?: string,
 *         externalId?: string,
 *         resourceIdentifier?: string,
 *         alarmType?: 'applicationHealth'|'trigger',
 *         ...,
 *     }>,
 *     triggers?: list<array{
 *         description?: string,
 *         targetRegion?: string,
 *         action?: 'activate'|'deactivate'|'postRecovery',
 *         conditions?: list<array>,
 *         minDelayMinutesBetweenExecutions?: int,
 *         ...,
 *     }>,
 *     reportConfiguration?: array{reportOutput?: list<array>, ...},
 *     name?: string,
 *     regions?: list<string>,
 *     recoveryApproach?: 'activeActive'|'activePassive',
 *     primaryRegion?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePlan(array $args = [])
 * @phpstan-method \Aws\Result deletePlan(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePlanAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getPlan(array $args = [])
 * @phpstan-method \Aws\Result getPlan(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlanAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getPlanEvaluationStatus(array $args = [])
 * @phpstan-method \Aws\Result getPlanEvaluationStatus(array{planArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanEvaluationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlanEvaluationStatusAsync(array{planArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getPlanExecution(array $args = [])
 * @phpstan-method \Aws\Result getPlanExecution(array{planArn?: string, executionId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlanExecutionAsync(array{planArn?: string, executionId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getPlanInRegion(array $args = [])
 * @phpstan-method \Aws\Result getPlanInRegion(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanInRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlanInRegionAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result listPlanExecutionEvents(array $args = [])
 * @phpstan-method \Aws\Result listPlanExecutionEvents(array{planArn?: string, executionId?: string, maxResults?: int, nextToken?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlanExecutionEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlanExecutionEventsAsync(array{planArn?: string, executionId?: string, maxResults?: int, nextToken?: string, name?: string, ...} $args = [])
 * @method \Aws\Result listPlanExecutions(array $args = [])
 * @phpstan-method \Aws\Result listPlanExecutions(array{
 *     planArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'canceled'|'completed'|'completedMonitoringApplicationHealth'|'completedWithExceptions'|'failed'|'inProgress'|'pausedByFailedStep'|'pausedByOperator'|'pending'|'pendingManualApproval'|'planExecutionTimedOut',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlanExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlanExecutionsAsync(array{
 *     planArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'canceled'|'completed'|'completedMonitoringApplicationHealth'|'completedWithExceptions'|'failed'|'inProgress'|'pausedByFailedStep'|'pausedByOperator'|'pending'|'pendingManualApproval'|'planExecutionTimedOut',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPlans(array $args = [])
 * @phpstan-method \Aws\Result listPlans(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlansAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPlansInRegion(array $args = [])
 * @phpstan-method \Aws\Result listPlansInRegion(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlansInRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlansInRegionAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRoute53HealthChecks(array $args = [])
 * @phpstan-method \Aws\Result listRoute53HealthChecks(array{arn?: string, hostedZoneId?: string, recordName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoute53HealthChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoute53HealthChecksAsync(array{arn?: string, hostedZoneId?: string, recordName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRoute53HealthChecksInRegion(array $args = [])
 * @phpstan-method \Aws\Result listRoute53HealthChecksInRegion(array{arn?: string, hostedZoneId?: string, recordName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoute53HealthChecksInRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoute53HealthChecksInRegionAsync(array{arn?: string, hostedZoneId?: string, recordName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result startPlanExecution(array $args = [])
 * @phpstan-method \Aws\Result startPlanExecution(array{
 *     planArn?: string,
 *     targetRegion?: string,
 *     action?: 'activate'|'deactivate'|'postRecovery',
 *     mode?: 'graceful'|'ungraceful',
 *     comment?: string,
 *     latestVersion?: string,
 *     recoveryExecutionId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPlanExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPlanExecutionAsync(array{
 *     planArn?: string,
 *     targetRegion?: string,
 *     action?: 'activate'|'deactivate'|'postRecovery',
 *     mode?: 'graceful'|'ungraceful',
 *     comment?: string,
 *     latestVersion?: string,
 *     recoveryExecutionId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{arn?: string, resourceTagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{arn?: string, resourceTagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updatePlan(array $args = [])
 * @phpstan-method \Aws\Result updatePlan(array{
 *     arn?: string,
 *     description?: string,
 *     workflows?: list<array{
 *         steps?: list<array>,
 *         workflowTargetAction?: 'activate'|'deactivate'|'postRecovery',
 *         workflowTargetRegion?: string,
 *         workflowDescription?: string,
 *         ...,
 *     }>,
 *     executionRole?: string,
 *     recoveryTimeObjectiveMinutes?: int,
 *     associatedAlarms?: array<string, array{
 *         crossAccountRole?: string,
 *         externalId?: string,
 *         resourceIdentifier?: string,
 *         alarmType?: 'applicationHealth'|'trigger',
 *         ...,
 *     }>,
 *     triggers?: list<array{
 *         description?: string,
 *         targetRegion?: string,
 *         action?: 'activate'|'deactivate'|'postRecovery',
 *         conditions?: list<array>,
 *         minDelayMinutesBetweenExecutions?: int,
 *         ...,
 *     }>,
 *     reportConfiguration?: array{reportOutput?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePlanAsync(array{
 *     arn?: string,
 *     description?: string,
 *     workflows?: list<array{
 *         steps?: list<array>,
 *         workflowTargetAction?: 'activate'|'deactivate'|'postRecovery',
 *         workflowTargetRegion?: string,
 *         workflowDescription?: string,
 *         ...,
 *     }>,
 *     executionRole?: string,
 *     recoveryTimeObjectiveMinutes?: int,
 *     associatedAlarms?: array<string, array{
 *         crossAccountRole?: string,
 *         externalId?: string,
 *         resourceIdentifier?: string,
 *         alarmType?: 'applicationHealth'|'trigger',
 *         ...,
 *     }>,
 *     triggers?: list<array{
 *         description?: string,
 *         targetRegion?: string,
 *         action?: 'activate'|'deactivate'|'postRecovery',
 *         conditions?: list<array>,
 *         minDelayMinutesBetweenExecutions?: int,
 *         ...,
 *     }>,
 *     reportConfiguration?: array{reportOutput?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePlanExecution(array $args = [])
 * @phpstan-method \Aws\Result updatePlanExecution(array{
 *     planArn?: string,
 *     executionId?: string,
 *     action?: 'pause'|'resume'|'switchToGraceful'|'switchToUngraceful',
 *     comment?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePlanExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePlanExecutionAsync(array{
 *     planArn?: string,
 *     executionId?: string,
 *     action?: 'pause'|'resume'|'switchToGraceful'|'switchToUngraceful',
 *     comment?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePlanExecutionStep(array $args = [])
 * @phpstan-method \Aws\Result updatePlanExecutionStep(array{
 *     planArn?: string,
 *     executionId?: string,
 *     comment?: string,
 *     stepName?: string,
 *     actionToTake?: 'skip'|'switchToUngraceful',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePlanExecutionStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePlanExecutionStepAsync(array{
 *     planArn?: string,
 *     executionId?: string,
 *     comment?: string,
 *     stepName?: string,
 *     actionToTake?: 'skip'|'switchToUngraceful',
 *     ...,
 * } $args = [])
 */
class ARCRegionSwitchClient extends AwsClient {}
