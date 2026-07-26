<?php
namespace Aws\KendraRanking;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kendra Intelligent Ranking** service.
 * @method \Aws\Result createRescoreExecutionPlan(array $args = [])
 * @phpstan-method \Aws\Result createRescoreExecutionPlan(array{
 *     Name?: string,
 *     Description?: string,
 *     CapacityUnits?: array{RescoreCapacityUnits?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRescoreExecutionPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRescoreExecutionPlanAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     CapacityUnits?: array{RescoreCapacityUnits?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteRescoreExecutionPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteRescoreExecutionPlan(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRescoreExecutionPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRescoreExecutionPlanAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describeRescoreExecutionPlan(array $args = [])
 * @phpstan-method \Aws\Result describeRescoreExecutionPlan(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRescoreExecutionPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRescoreExecutionPlanAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result listRescoreExecutionPlans(array $args = [])
 * @phpstan-method \Aws\Result listRescoreExecutionPlans(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRescoreExecutionPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRescoreExecutionPlansAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result rescore(array $args = [])
 * @phpstan-method \Aws\Result rescore(array{
 *     RescoreExecutionPlanId?: string,
 *     SearchQuery?: string,
 *     Documents?: list<array{
 *         Id?: string,
 *         GroupId?: string,
 *         Title?: string,
 *         Body?: string,
 *         TokenizedTitle?: list<string>,
 *         TokenizedBody?: list<string>,
 *         OriginalScore?: float,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise rescoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rescoreAsync(array{
 *     RescoreExecutionPlanId?: string,
 *     SearchQuery?: string,
 *     Documents?: list<array{
 *         Id?: string,
 *         GroupId?: string,
 *         Title?: string,
 *         Body?: string,
 *         TokenizedTitle?: list<string>,
 *         TokenizedBody?: list<string>,
 *         OriginalScore?: float,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateRescoreExecutionPlan(array $args = [])
 * @phpstan-method \Aws\Result updateRescoreExecutionPlan(array{
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     CapacityUnits?: array{RescoreCapacityUnits?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRescoreExecutionPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRescoreExecutionPlanAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     CapacityUnits?: array{RescoreCapacityUnits?: int, ...},
 *     ...,
 * } $args = [])
 */
class KendraRankingClient extends AwsClient {}
