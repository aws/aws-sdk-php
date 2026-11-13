<?php
namespace Aws\Scheduler;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EventBridge Scheduler** service.
 * @method \Aws\Result createSchedule(array $args = [])
 * @phpstan-method \Aws\Result createSchedule(array{
 *     Name?: string,
 *     GroupName?: string,
 *     ScheduleExpression?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     ScheduleExpressionTimezone?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     KmsKeyArn?: string,
 *     Target?: array{
 *         Arn?: string,
 *         RoleArn?: string,
 *         DeadLetterConfig?: array{Arn?: string, ...},
 *         RetryPolicy?: array{MaximumEventAgeInSeconds?: int, MaximumRetryAttempts?: int, ...},
 *         Input?: string,
 *         EcsParameters?: array{
 *             TaskDefinitionArn?: string,
 *             TaskCount?: int,
 *             LaunchType?: 'EC2'|'EXTERNAL'|'FARGATE',
 *             NetworkConfiguration?: array,
 *             PlatformVersion?: string,
 *             Group?: string,
 *             CapacityProviderStrategy?: list<array>,
 *             EnableECSManagedTags?: bool,
 *             EnableExecuteCommand?: bool,
 *             PlacementConstraints?: list<array>,
 *             PlacementStrategy?: list<array>,
 *             PropagateTags?: 'TASK_DEFINITION',
 *             ReferenceId?: string,
 *             Tags?: list<array<string, string>>,
 *             ...,
 *         },
 *         EventBridgeParameters?: array{DetailType?: string, Source?: string, ...},
 *         EventBridgePutEventsV2Parameters?: array{DetailType?: string, Source?: string, ...},
 *         EventBridgePutRawEventsParameters?: array{Metadata?: array<string, string>, ...},
 *         KinesisParameters?: array{PartitionKey?: string, ...},
 *         SageMakerPipelineParameters?: array{PipelineParameterList?: list<array>, ...},
 *         SqsParameters?: array{MessageGroupId?: string, ...},
 *         ...,
 *     },
 *     FlexibleTimeWindow?: array{Mode?: 'FLEXIBLE'|'OFF', MaximumWindowInMinutes?: int, ...},
 *     ClientToken?: string,
 *     ActionAfterCompletion?: 'DELETE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduleAsync(array{
 *     Name?: string,
 *     GroupName?: string,
 *     ScheduleExpression?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     ScheduleExpressionTimezone?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     KmsKeyArn?: string,
 *     Target?: array{
 *         Arn?: string,
 *         RoleArn?: string,
 *         DeadLetterConfig?: array{Arn?: string, ...},
 *         RetryPolicy?: array{MaximumEventAgeInSeconds?: int, MaximumRetryAttempts?: int, ...},
 *         Input?: string,
 *         EcsParameters?: array{
 *             TaskDefinitionArn?: string,
 *             TaskCount?: int,
 *             LaunchType?: 'EC2'|'EXTERNAL'|'FARGATE',
 *             NetworkConfiguration?: array,
 *             PlatformVersion?: string,
 *             Group?: string,
 *             CapacityProviderStrategy?: list<array>,
 *             EnableECSManagedTags?: bool,
 *             EnableExecuteCommand?: bool,
 *             PlacementConstraints?: list<array>,
 *             PlacementStrategy?: list<array>,
 *             PropagateTags?: 'TASK_DEFINITION',
 *             ReferenceId?: string,
 *             Tags?: list<array<string, string>>,
 *             ...,
 *         },
 *         EventBridgeParameters?: array{DetailType?: string, Source?: string, ...},
 *         EventBridgePutEventsV2Parameters?: array{DetailType?: string, Source?: string, ...},
 *         EventBridgePutRawEventsParameters?: array{Metadata?: array<string, string>, ...},
 *         KinesisParameters?: array{PartitionKey?: string, ...},
 *         SageMakerPipelineParameters?: array{PipelineParameterList?: list<array>, ...},
 *         SqsParameters?: array{MessageGroupId?: string, ...},
 *         ...,
 *     },
 *     FlexibleTimeWindow?: array{Mode?: 'FLEXIBLE'|'OFF', MaximumWindowInMinutes?: int, ...},
 *     ClientToken?: string,
 *     ActionAfterCompletion?: 'DELETE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScheduleGroup(array $args = [])
 * @phpstan-method \Aws\Result createScheduleGroup(array{Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduleGroupAsync(array{Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteSchedule(array{Name?: string, GroupName?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduleAsync(array{Name?: string, GroupName?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduleGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduleGroup(array{Name?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduleGroupAsync(array{Name?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result getSchedule(array $args = [])
 * @phpstan-method \Aws\Result getSchedule(array{Name?: string, GroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScheduleAsync(array{Name?: string, GroupName?: string, ...} $args = [])
 * @method \Aws\Result getScheduleGroup(array $args = [])
 * @phpstan-method \Aws\Result getScheduleGroup(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getScheduleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScheduleGroupAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result listScheduleGroups(array $args = [])
 * @phpstan-method \Aws\Result listScheduleGroups(array{NamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduleGroupsAsync(array{NamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSchedules(array $args = [])
 * @phpstan-method \Aws\Result listSchedules(array{
 *     GroupName?: string,
 *     NamePrefix?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchedulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchedulesAsync(array{
 *     GroupName?: string,
 *     NamePrefix?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     NextToken?: string,
 *     MaxResults?: int,
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
 *     Name?: string,
 *     GroupName?: string,
 *     ScheduleExpression?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     ScheduleExpressionTimezone?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     KmsKeyArn?: string,
 *     Target?: array{
 *         Arn?: string,
 *         RoleArn?: string,
 *         DeadLetterConfig?: array{Arn?: string, ...},
 *         RetryPolicy?: array{MaximumEventAgeInSeconds?: int, MaximumRetryAttempts?: int, ...},
 *         Input?: string,
 *         EcsParameters?: array{
 *             TaskDefinitionArn?: string,
 *             TaskCount?: int,
 *             LaunchType?: 'EC2'|'EXTERNAL'|'FARGATE',
 *             NetworkConfiguration?: array,
 *             PlatformVersion?: string,
 *             Group?: string,
 *             CapacityProviderStrategy?: list<array>,
 *             EnableECSManagedTags?: bool,
 *             EnableExecuteCommand?: bool,
 *             PlacementConstraints?: list<array>,
 *             PlacementStrategy?: list<array>,
 *             PropagateTags?: 'TASK_DEFINITION',
 *             ReferenceId?: string,
 *             Tags?: list<array<string, string>>,
 *             ...,
 *         },
 *         EventBridgeParameters?: array{DetailType?: string, Source?: string, ...},
 *         EventBridgePutEventsV2Parameters?: array{DetailType?: string, Source?: string, ...},
 *         EventBridgePutRawEventsParameters?: array{Metadata?: array<string, string>, ...},
 *         KinesisParameters?: array{PartitionKey?: string, ...},
 *         SageMakerPipelineParameters?: array{PipelineParameterList?: list<array>, ...},
 *         SqsParameters?: array{MessageGroupId?: string, ...},
 *         ...,
 *     },
 *     FlexibleTimeWindow?: array{Mode?: 'FLEXIBLE'|'OFF', MaximumWindowInMinutes?: int, ...},
 *     ClientToken?: string,
 *     ActionAfterCompletion?: 'DELETE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduleAsync(array{
 *     Name?: string,
 *     GroupName?: string,
 *     ScheduleExpression?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     ScheduleExpressionTimezone?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     KmsKeyArn?: string,
 *     Target?: array{
 *         Arn?: string,
 *         RoleArn?: string,
 *         DeadLetterConfig?: array{Arn?: string, ...},
 *         RetryPolicy?: array{MaximumEventAgeInSeconds?: int, MaximumRetryAttempts?: int, ...},
 *         Input?: string,
 *         EcsParameters?: array{
 *             TaskDefinitionArn?: string,
 *             TaskCount?: int,
 *             LaunchType?: 'EC2'|'EXTERNAL'|'FARGATE',
 *             NetworkConfiguration?: array,
 *             PlatformVersion?: string,
 *             Group?: string,
 *             CapacityProviderStrategy?: list<array>,
 *             EnableECSManagedTags?: bool,
 *             EnableExecuteCommand?: bool,
 *             PlacementConstraints?: list<array>,
 *             PlacementStrategy?: list<array>,
 *             PropagateTags?: 'TASK_DEFINITION',
 *             ReferenceId?: string,
 *             Tags?: list<array<string, string>>,
 *             ...,
 *         },
 *         EventBridgeParameters?: array{DetailType?: string, Source?: string, ...},
 *         EventBridgePutEventsV2Parameters?: array{DetailType?: string, Source?: string, ...},
 *         EventBridgePutRawEventsParameters?: array{Metadata?: array<string, string>, ...},
 *         KinesisParameters?: array{PartitionKey?: string, ...},
 *         SageMakerPipelineParameters?: array{PipelineParameterList?: list<array>, ...},
 *         SqsParameters?: array{MessageGroupId?: string, ...},
 *         ...,
 *     },
 *     FlexibleTimeWindow?: array{Mode?: 'FLEXIBLE'|'OFF', MaximumWindowInMinutes?: int, ...},
 *     ClientToken?: string,
 *     ActionAfterCompletion?: 'DELETE'|'NONE',
 *     ...,
 * } $args = [])
 */
class SchedulerClient extends AwsClient {}
