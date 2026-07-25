<?php
namespace Aws\AutoScalingPlans;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Auto Scaling Plans** service.
 * @method \Aws\Result createScalingPlan(array $args = [])
 * @phpstan-method \Aws\Result createScalingPlan(array{
 *     ScalingPlanName?: string,
 *     ApplicationSource?: array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...},
 *     ScalingInstructions?: list<array{
 *         ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *         ResourceId?: string,
 *         ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         TargetTrackingConfigurations?: list<array>,
 *         PredefinedLoadMetricSpecification?: array,
 *         CustomizedLoadMetricSpecification?: array,
 *         ScheduledActionBufferTime?: int,
 *         PredictiveScalingMaxCapacityBehavior?: 'SetForecastCapacityToMaxCapacity'|'SetMaxCapacityAboveForecastCapacity'|'SetMaxCapacityToForecastCapacity',
 *         PredictiveScalingMaxCapacityBuffer?: int,
 *         PredictiveScalingMode?: 'ForecastAndScale'|'ForecastOnly',
 *         ScalingPolicyUpdateBehavior?: 'KeepExternalPolicies'|'ReplaceExternalPolicies',
 *         DisableDynamicScaling?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScalingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScalingPlanAsync(array{
 *     ScalingPlanName?: string,
 *     ApplicationSource?: array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...},
 *     ScalingInstructions?: list<array{
 *         ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *         ResourceId?: string,
 *         ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         TargetTrackingConfigurations?: list<array>,
 *         PredefinedLoadMetricSpecification?: array,
 *         CustomizedLoadMetricSpecification?: array,
 *         ScheduledActionBufferTime?: int,
 *         PredictiveScalingMaxCapacityBehavior?: 'SetForecastCapacityToMaxCapacity'|'SetMaxCapacityAboveForecastCapacity'|'SetMaxCapacityToForecastCapacity',
 *         PredictiveScalingMaxCapacityBuffer?: int,
 *         PredictiveScalingMode?: 'ForecastAndScale'|'ForecastOnly',
 *         ScalingPolicyUpdateBehavior?: 'KeepExternalPolicies'|'ReplaceExternalPolicies',
 *         DisableDynamicScaling?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteScalingPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteScalingPlan(array{ScalingPlanName?: string, ScalingPlanVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScalingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScalingPlanAsync(array{ScalingPlanName?: string, ScalingPlanVersion?: int, ...} $args = [])
 * @method \Aws\Result describeScalingPlanResources(array $args = [])
 * @phpstan-method \Aws\Result describeScalingPlanResources(array{ScalingPlanName?: string, ScalingPlanVersion?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingPlanResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingPlanResourcesAsync(array{ScalingPlanName?: string, ScalingPlanVersion?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeScalingPlans(array $args = [])
 * @phpstan-method \Aws\Result describeScalingPlans(array{
 *     ScalingPlanNames?: list<string>,
 *     ScalingPlanVersion?: int,
 *     ApplicationSources?: list<array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingPlansAsync(array{
 *     ScalingPlanNames?: list<string>,
 *     ScalingPlanVersion?: int,
 *     ApplicationSources?: list<array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getScalingPlanResourceForecastData(array $args = [])
 * @phpstan-method \Aws\Result getScalingPlanResourceForecastData(array{
 *     ScalingPlanName?: string,
 *     ScalingPlanVersion?: int,
 *     ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *     ResourceId?: string,
 *     ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *     ForecastDataType?: 'CapacityForecast'|'LoadForecast'|'ScheduledActionMaxCapacity'|'ScheduledActionMinCapacity',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getScalingPlanResourceForecastDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScalingPlanResourceForecastDataAsync(array{
 *     ScalingPlanName?: string,
 *     ScalingPlanVersion?: int,
 *     ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *     ResourceId?: string,
 *     ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *     ForecastDataType?: 'CapacityForecast'|'LoadForecast'|'ScheduledActionMaxCapacity'|'ScheduledActionMinCapacity',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScalingPlan(array $args = [])
 * @phpstan-method \Aws\Result updateScalingPlan(array{
 *     ScalingPlanName?: string,
 *     ScalingPlanVersion?: int,
 *     ApplicationSource?: array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...},
 *     ScalingInstructions?: list<array{
 *         ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *         ResourceId?: string,
 *         ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         TargetTrackingConfigurations?: list<array>,
 *         PredefinedLoadMetricSpecification?: array,
 *         CustomizedLoadMetricSpecification?: array,
 *         ScheduledActionBufferTime?: int,
 *         PredictiveScalingMaxCapacityBehavior?: 'SetForecastCapacityToMaxCapacity'|'SetMaxCapacityAboveForecastCapacity'|'SetMaxCapacityToForecastCapacity',
 *         PredictiveScalingMaxCapacityBuffer?: int,
 *         PredictiveScalingMode?: 'ForecastAndScale'|'ForecastOnly',
 *         ScalingPolicyUpdateBehavior?: 'KeepExternalPolicies'|'ReplaceExternalPolicies',
 *         DisableDynamicScaling?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScalingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScalingPlanAsync(array{
 *     ScalingPlanName?: string,
 *     ScalingPlanVersion?: int,
 *     ApplicationSource?: array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...},
 *     ScalingInstructions?: list<array{
 *         ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *         ResourceId?: string,
 *         ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         TargetTrackingConfigurations?: list<array>,
 *         PredefinedLoadMetricSpecification?: array,
 *         CustomizedLoadMetricSpecification?: array,
 *         ScheduledActionBufferTime?: int,
 *         PredictiveScalingMaxCapacityBehavior?: 'SetForecastCapacityToMaxCapacity'|'SetMaxCapacityAboveForecastCapacity'|'SetMaxCapacityToForecastCapacity',
 *         PredictiveScalingMaxCapacityBuffer?: int,
 *         PredictiveScalingMode?: 'ForecastAndScale'|'ForecastOnly',
 *         ScalingPolicyUpdateBehavior?: 'KeepExternalPolicies'|'ReplaceExternalPolicies',
 *         DisableDynamicScaling?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class AutoScalingPlansClient extends AwsClient {}
