<?php
namespace Aws\Braket;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Braket** service.
 * @method \Aws\Result cancelJob(array $args = [])
 * @phpstan-method \Aws\Result cancelJob(array{jobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobAsync(array{jobArn?: string, ...} $args = [])
 * @method \Aws\Result cancelQuantumTask(array $args = [])
 * @phpstan-method \Aws\Result cancelQuantumTask(array{quantumTaskArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelQuantumTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelQuantumTaskAsync(array{quantumTaskArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     clientToken?: string,
 *     algorithmSpecification?: array{
 *         scriptModeConfig?: array{entryPoint?: string, s3Uri?: string, compressionType?: 'GZIP'|'NONE', ...},
 *         containerImage?: array{uri?: string, ...},
 *         ...,
 *     },
 *     inputDataConfig?: list<array{channelName?: string, contentType?: string, dataSource?: array, ...}>,
 *     outputDataConfig?: array{kmsKeyId?: string, s3Path?: string, ...},
 *     checkpointConfig?: array{localPath?: string, s3Uri?: string, ...},
 *     jobName?: string,
 *     roleArn?: string,
 *     stoppingCondition?: array{maxRuntimeInSeconds?: int, ...},
 *     instanceConfig?: array{
 *         instanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.xlarge',
 *         volumeSizeInGb?: int,
 *         instanceCount?: int,
 *         ...,
 *     },
 *     hyperParameters?: array<string, string>,
 *     deviceConfig?: array{device?: string, ...},
 *     tags?: array<string, string>,
 *     associations?: list<array{arn?: string, type?: 'RESERVATION_TIME_WINDOW_ARN', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     clientToken?: string,
 *     algorithmSpecification?: array{
 *         scriptModeConfig?: array{entryPoint?: string, s3Uri?: string, compressionType?: 'GZIP'|'NONE', ...},
 *         containerImage?: array{uri?: string, ...},
 *         ...,
 *     },
 *     inputDataConfig?: list<array{channelName?: string, contentType?: string, dataSource?: array, ...}>,
 *     outputDataConfig?: array{kmsKeyId?: string, s3Path?: string, ...},
 *     checkpointConfig?: array{localPath?: string, s3Uri?: string, ...},
 *     jobName?: string,
 *     roleArn?: string,
 *     stoppingCondition?: array{maxRuntimeInSeconds?: int, ...},
 *     instanceConfig?: array{
 *         instanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.xlarge',
 *         volumeSizeInGb?: int,
 *         instanceCount?: int,
 *         ...,
 *     },
 *     hyperParameters?: array<string, string>,
 *     deviceConfig?: array{device?: string, ...},
 *     tags?: array<string, string>,
 *     associations?: list<array{arn?: string, type?: 'RESERVATION_TIME_WINDOW_ARN', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQuantumTask(array $args = [])
 * @phpstan-method \Aws\Result createQuantumTask(array{
 *     clientToken?: string,
 *     deviceArn?: string,
 *     deviceParameters?: string,
 *     shots?: int,
 *     outputS3Bucket?: string,
 *     outputS3KeyPrefix?: string,
 *     action?: string,
 *     tags?: array<string, string>,
 *     jobToken?: string,
 *     associations?: list<array{arn?: string, type?: 'RESERVATION_TIME_WINDOW_ARN', ...}>,
 *     experimentalCapabilities?: array{enabled?: 'ALL'|'NONE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuantumTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuantumTaskAsync(array{
 *     clientToken?: string,
 *     deviceArn?: string,
 *     deviceParameters?: string,
 *     shots?: int,
 *     outputS3Bucket?: string,
 *     outputS3KeyPrefix?: string,
 *     action?: string,
 *     tags?: array<string, string>,
 *     jobToken?: string,
 *     associations?: list<array{arn?: string, type?: 'RESERVATION_TIME_WINDOW_ARN', ...}>,
 *     experimentalCapabilities?: array{enabled?: 'ALL'|'NONE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSpendingLimit(array $args = [])
 * @phpstan-method \Aws\Result createSpendingLimit(array{
 *     clientToken?: string,
 *     deviceArn?: string,
 *     spendingLimit?: string,
 *     timePeriod?: array{startAt?: int|string|\DateTimeInterface, endAt?: int|string|\DateTimeInterface, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSpendingLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSpendingLimitAsync(array{
 *     clientToken?: string,
 *     deviceArn?: string,
 *     spendingLimit?: string,
 *     timePeriod?: array{startAt?: int|string|\DateTimeInterface, endAt?: int|string|\DateTimeInterface, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSpendingLimit(array $args = [])
 * @phpstan-method \Aws\Result deleteSpendingLimit(array{spendingLimitArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSpendingLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSpendingLimitAsync(array{spendingLimitArn?: string, ...} $args = [])
 * @method \Aws\Result getDevice(array $args = [])
 * @phpstan-method \Aws\Result getDevice(array{deviceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceAsync(array{deviceArn?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{jobArn?: string, additionalAttributeNames?: list<'QueueInfo'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{jobArn?: string, additionalAttributeNames?: list<'QueueInfo'>, ...} $args = [])
 * @method \Aws\Result getQuantumTask(array $args = [])
 * @phpstan-method \Aws\Result getQuantumTask(array{quantumTaskArn?: string, additionalAttributeNames?: list<'QueueInfo'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQuantumTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQuantumTaskAsync(array{quantumTaskArn?: string, additionalAttributeNames?: list<'QueueInfo'>, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result searchDevices(array $args = [])
 * @phpstan-method \Aws\Result searchDevices(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchDevicesAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchJobs(array $args = [])
 * @phpstan-method \Aws\Result searchJobs(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         name?: string,
 *         values?: list<string>,
 *         operator?: 'BETWEEN'|'CONTAINS'|'EQUAL'|'GT'|'GTE'|'LT'|'LTE',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchJobsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         name?: string,
 *         values?: list<string>,
 *         operator?: 'BETWEEN'|'CONTAINS'|'EQUAL'|'GT'|'GTE'|'LT'|'LTE',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchQuantumTasks(array $args = [])
 * @phpstan-method \Aws\Result searchQuantumTasks(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: string, values?: list<string>, operator?: 'BETWEEN'|'EQUAL'|'GT'|'GTE'|'LT'|'LTE', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchQuantumTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchQuantumTasksAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: string, values?: list<string>, operator?: 'BETWEEN'|'EQUAL'|'GT'|'GTE'|'LT'|'LTE', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchSpendingLimits(array $args = [])
 * @phpstan-method \Aws\Result searchSpendingLimits(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: string, values?: list<string>, operator?: 'EQUAL', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSpendingLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSpendingLimitsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{name?: string, values?: list<string>, operator?: 'EQUAL', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateSpendingLimit(array $args = [])
 * @phpstan-method \Aws\Result updateSpendingLimit(array{
 *     spendingLimitArn?: string,
 *     clientToken?: string,
 *     spendingLimit?: string,
 *     timePeriod?: array{startAt?: int|string|\DateTimeInterface, endAt?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpendingLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpendingLimitAsync(array{
 *     spendingLimitArn?: string,
 *     clientToken?: string,
 *     spendingLimit?: string,
 *     timePeriod?: array{startAt?: int|string|\DateTimeInterface, endAt?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 */
class BraketClient extends AwsClient {}
