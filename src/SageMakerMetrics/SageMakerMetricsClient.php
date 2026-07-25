<?php
namespace Aws\SageMakerMetrics;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Metrics Service** service.
 * @method \Aws\Result batchGetMetrics(array $args = [])
 * @phpstan-method \Aws\Result batchGetMetrics(array{
 *     MetricQueries?: list<array{
 *         MetricName?: string,
 *         ResourceArn?: string,
 *         MetricStat?: 'Avg'|'Count'|'Last'|'Max'|'Min'|'StdDev',
 *         Period?: 'FiveMinute'|'IterationNumber'|'OneHour'|'OneMinute',
 *         XAxisType?: 'IterationNumber'|'Timestamp',
 *         Start?: int,
 *         End?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetMetricsAsync(array{
 *     MetricQueries?: list<array{
 *         MetricName?: string,
 *         ResourceArn?: string,
 *         MetricStat?: 'Avg'|'Count'|'Last'|'Max'|'Min'|'StdDev',
 *         Period?: 'FiveMinute'|'IterationNumber'|'OneHour'|'OneMinute',
 *         XAxisType?: 'IterationNumber'|'Timestamp',
 *         Start?: int,
 *         End?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchPutMetrics(array $args = [])
 * @phpstan-method \Aws\Result batchPutMetrics(array{
 *     TrialComponentName?: string,
 *     MetricData?: list<array{MetricName?: string, Timestamp?: int|string|\DateTimeInterface, Step?: int, Value?: float, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutMetricsAsync(array{
 *     TrialComponentName?: string,
 *     MetricData?: list<array{MetricName?: string, Timestamp?: int|string|\DateTimeInterface, Step?: int, Value?: float, ...}>,
 *     ...,
 * } $args = [])
 */
class SageMakerMetricsClient extends AwsClient {}
