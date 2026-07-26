<?php
namespace Aws\Scheduler;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EventBridge Scheduler** service.
 * @method \Aws\Result createSchedule(array $args = [])
 * @phpstan-method \Aws\Result createSchedule(array{
 *     ActionAfterCompletion?: 'DELETE'|'NONE',
 *     ClientToken?: string,
 *     Description?: string,
 *     EndDate?: int|string|\DateTimeInterface,
 *     FlexibleTimeWindow?: array{MaximumWindowInMinutes?: int, Mode?: 'FLEXIBLE'|'OFF', ...},
 *     GroupName?: string,
 *     KmsKeyArn?: string,
 *     Name?: string,
 *     ScheduleExpression?: string,
 *     ScheduleExpressionTimezone?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     State?: 'DISABLED'|'ENABLED',
 *     Target?: array{
 *         Arn?: string,
 *         DeadLetterConfig?: array{Arn?: string, ...},
 *         EcsParameters?: array{
 *             CapacityProviderStrategy?: list<array>,
 *             EnableECSManagedTags?: bool,
 *             EnableExecuteCommand?: bool,
 *             Group?: string,
 *             LaunchType?: 'EC2'|'EXTERNAL'|'FARGATE',
 *             NetworkConfiguration?: array,
 *             PlacementConstraints?: list<array>,
 *             PlacementStrategy?: list<array>,
 *             PlatformVersion?: string,
 *             PropagateTags?: 'TASK_DEFINITION',
 *             ReferenceId?: string,
 *             Tags?: list<array<string, string>>,
 *             TaskCount?: int,
 *             TaskDefinitionArn?: string,
 *             ...,
 *         },
 *         EventBridgeParameters?: array{DetailType?: string, Source?: string, ...},
 *         Input?: string,
 *         KinesisParameters?: array{PartitionKey?: string, ...},
 *         RetryPolicy?: array{MaximumEventAgeInSeconds?: int, MaximumRetryAttempts?: int, ...},
 *         RoleArn?: string,
 *         SageMakerPipelineParameters?: array{PipelineParameterList?: list<array>, ...},
 *         SqsParameters?: array{MessageGroupId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduleAsync(array{
 *     ActionAfterCompletion?: 'DELETE'|'NONE',
 *     ClientToken?: string,
 *     Description?: string,
 *     EndDate?: int|string|\DateTimeInterface,
 *     FlexibleTimeWindow?: array{MaximumWindowInMinutes?: int, Mode?: 'FLEXIBLE'|'OFF', ...},
 *     GroupName?: string,
 *     KmsKeyArn?: string,
 *     Name?: string,
 *     ScheduleExpression?: string,
 *     ScheduleExpressionTimezone?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     State?: 'DISABLED'|'ENABLED',
 *     Target?: array{
 *         Arn?: string,
 *         DeadLetterConfig?: array{Arn?: string, ...},
 *         EcsParameters?: array{
 *             CapacityProviderStrategy?: list<array>,
 *             EnableECSManagedTags?: bool,
 *             EnableExecuteCommand?: bool,
 *             Group?: string,
 *             LaunchType?: 'EC2'|'EXTERNAL'|'FARGATE',
 *             NetworkConfiguration?: array,
 *             PlacementConstraints?: list<array>,
 *             PlacementStrategy?: list<array>,
 *             PlatformVersion?: string,
 *             PropagateTags?: 'TASK_DEFINITION',
 *             ReferenceId?: string,
 *             Tags?: list<array<string, string>>,
 *             TaskCount?: int,
 *             TaskDefinitionArn?: string,
 *             ...,
 *         },
 *         EventBridgeParameters?: array{DetailType?: string, Source?: string, ...},
 *         Input?: string,
 *         KinesisParameters?: array{PartitionKey?: string, ...},
 *         RetryPolicy?: array{MaximumEventAgeInSeconds?: int, MaximumRetryAttempts?: int, ...},
 *         RoleArn?: string,
 *         SageMakerPipelineParameters?: array{PipelineParameterList?: list<array>, ...},
 *         SqsParameters?: array{MessageGroupId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScheduleGroup(array $args = [])
 * @phpstan-method \Aws\Result createScheduleGroup(array{ClientToken?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduleGroupAsync(array{ClientToken?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result deleteSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteSchedule(array{ClientToken?: string, GroupName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduleAsync(array{ClientToken?: string, GroupName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduleGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduleGroup(array{ClientToken?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduleGroupAsync(array{ClientToken?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getSchedule(array $args = [])
 * @phpstan-method \Aws\Result getSchedule(array{GroupName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScheduleAsync(array{GroupName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getScheduleGroup(array $args = [])
 * @phpstan-method \Aws\Result getScheduleGroup(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getScheduleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScheduleGroupAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result listScheduleGroups(array $args = [])
 * @phpstan-method \Aws\Result listScheduleGroups(array{MaxResults?: int, NamePrefix?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduleGroupsAsync(array{MaxResults?: int, NamePrefix?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSchedules(array $args = [])
 * @phpstan-method \Aws\Result listSchedules(array{
 *     GroupName?: string,
 *     MaxResults?: int,
 *     NamePrefix?: string,
 *     NextToken?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchedulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchedulesAsync(array{
 *     GroupName?: string,
 *     MaxResults?: int,
 *     NamePrefix?: string,
 *     NextToken?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateSchedule(array{
 *     ActionAfterCompletion?: 'DELETE'|'NONE',
 *     ClientToken?: string,
 *     Description?: string,
 *     EndDate?: int|string|\DateTimeInterface,
 *     FlexibleTimeWindow?: array{MaximumWindowInMinutes?: int, Mode?: 'FLEXIBLE'|'OFF', ...},
 *     GroupName?: string,
 *     KmsKeyArn?: string,
 *     Name?: string,
 *     ScheduleExpression?: string,
 *     ScheduleExpressionTimezone?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     State?: 'DISABLED'|'ENABLED',
 *     Target?: array{
 *         Arn?: string,
 *         DeadLetterConfig?: array{Arn?: string, ...},
 *         EcsParameters?: array{
 *             CapacityProviderStrategy?: list<array>,
 *             EnableECSManagedTags?: bool,
 *             EnableExecuteCommand?: bool,
 *             Group?: string,
 *             LaunchType?: 'EC2'|'EXTERNAL'|'FARGATE',
 *             NetworkConfiguration?: array,
 *             PlacementConstraints?: list<array>,
 *             PlacementStrategy?: list<array>,
 *             PlatformVersion?: string,
 *             PropagateTags?: 'TASK_DEFINITION',
 *             ReferenceId?: string,
 *             Tags?: list<array<string, string>>,
 *             TaskCount?: int,
 *             TaskDefinitionArn?: string,
 *             ...,
 *         },
 *         EventBridgeParameters?: array{DetailType?: string, Source?: string, ...},
 *         Input?: string,
 *         KinesisParameters?: array{PartitionKey?: string, ...},
 *         RetryPolicy?: array{MaximumEventAgeInSeconds?: int, MaximumRetryAttempts?: int, ...},
 *         RoleArn?: string,
 *         SageMakerPipelineParameters?: array{PipelineParameterList?: list<array>, ...},
 *         SqsParameters?: array{MessageGroupId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduleAsync(array{
 *     ActionAfterCompletion?: 'DELETE'|'NONE',
 *     ClientToken?: string,
 *     Description?: string,
 *     EndDate?: int|string|\DateTimeInterface,
 *     FlexibleTimeWindow?: array{MaximumWindowInMinutes?: int, Mode?: 'FLEXIBLE'|'OFF', ...},
 *     GroupName?: string,
 *     KmsKeyArn?: string,
 *     Name?: string,
 *     ScheduleExpression?: string,
 *     ScheduleExpressionTimezone?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     State?: 'DISABLED'|'ENABLED',
 *     Target?: array{
 *         Arn?: string,
 *         DeadLetterConfig?: array{Arn?: string, ...},
 *         EcsParameters?: array{
 *             CapacityProviderStrategy?: list<array>,
 *             EnableECSManagedTags?: bool,
 *             EnableExecuteCommand?: bool,
 *             Group?: string,
 *             LaunchType?: 'EC2'|'EXTERNAL'|'FARGATE',
 *             NetworkConfiguration?: array,
 *             PlacementConstraints?: list<array>,
 *             PlacementStrategy?: list<array>,
 *             PlatformVersion?: string,
 *             PropagateTags?: 'TASK_DEFINITION',
 *             ReferenceId?: string,
 *             Tags?: list<array<string, string>>,
 *             TaskCount?: int,
 *             TaskDefinitionArn?: string,
 *             ...,
 *         },
 *         EventBridgeParameters?: array{DetailType?: string, Source?: string, ...},
 *         Input?: string,
 *         KinesisParameters?: array{PartitionKey?: string, ...},
 *         RetryPolicy?: array{MaximumEventAgeInSeconds?: int, MaximumRetryAttempts?: int, ...},
 *         RoleArn?: string,
 *         SageMakerPipelineParameters?: array{PipelineParameterList?: list<array>, ...},
 *         SqsParameters?: array{MessageGroupId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class SchedulerClient extends AwsClient {}
