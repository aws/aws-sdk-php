<?php
namespace Aws\TimestreamQuery;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Timestream Query** service.
 * @method \Aws\Result cancelQuery(array $args = [])
 * @phpstan-method \Aws\Result cancelQuery(array{QueryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelQueryAsync(array{QueryId?: string, ...} $args = [])
 * @method \Aws\Result createScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result createScheduledQuery(array{
 *     Name?: string,
 *     QueryString?: string,
 *     ScheduleConfiguration?: array{ScheduleExpression?: string, ...},
 *     NotificationConfiguration?: array{SnsConfiguration?: array{TopicArn?: string, ...}, ...},
 *     TargetConfiguration?: array{
 *         TimestreamConfiguration?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             TimeColumn?: string,
 *             DimensionMappings?: list<array>,
 *             MultiMeasureMappings?: array,
 *             MixedMeasureMappings?: list<array>,
 *             MeasureNameColumn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ScheduledQueryExecutionRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     ErrorReportConfiguration?: array{
 *         S3Configuration?: array{BucketName?: string, ObjectKeyPrefix?: string, EncryptionOption?: 'SSE_KMS'|'SSE_S3', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduledQueryAsync(array{
 *     Name?: string,
 *     QueryString?: string,
 *     ScheduleConfiguration?: array{ScheduleExpression?: string, ...},
 *     NotificationConfiguration?: array{SnsConfiguration?: array{TopicArn?: string, ...}, ...},
 *     TargetConfiguration?: array{
 *         TimestreamConfiguration?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             TimeColumn?: string,
 *             DimensionMappings?: list<array>,
 *             MultiMeasureMappings?: array,
 *             MixedMeasureMappings?: list<array>,
 *             MeasureNameColumn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ScheduledQueryExecutionRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     ErrorReportConfiguration?: array{
 *         S3Configuration?: array{BucketName?: string, ObjectKeyPrefix?: string, EncryptionOption?: 'SSE_KMS'|'SSE_S3', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduledQuery(array{ScheduledQueryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduledQueryAsync(array{ScheduledQueryArn?: string, ...} $args = [])
 * @method \Aws\Result describeAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result describeAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result describeEndpoints(array $args = [])
 * @phpstan-method \Aws\Result describeEndpoints(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array{...} $args = [])
 * @method \Aws\Result describeScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result describeScheduledQuery(array{ScheduledQueryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScheduledQueryAsync(array{ScheduledQueryArn?: string, ...} $args = [])
 * @method \Aws\Result executeScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result executeScheduledQuery(array{
 *     ScheduledQueryArn?: string,
 *     InvocationTime?: int|string|\DateTimeInterface,
 *     ClientToken?: string,
 *     QueryInsights?: array{Mode?: 'DISABLED'|'ENABLED_WITH_RATE_CONTROL', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeScheduledQueryAsync(array{
 *     ScheduledQueryArn?: string,
 *     InvocationTime?: int|string|\DateTimeInterface,
 *     ClientToken?: string,
 *     QueryInsights?: array{Mode?: 'DISABLED'|'ENABLED_WITH_RATE_CONTROL', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listScheduledQueries(array $args = [])
 * @phpstan-method \Aws\Result listScheduledQueries(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduledQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduledQueriesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result prepareQuery(array $args = [])
 * @phpstan-method \Aws\Result prepareQuery(array{QueryString?: string, ValidateOnly?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise prepareQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise prepareQueryAsync(array{QueryString?: string, ValidateOnly?: bool, ...} $args = [])
 * @method \Aws\Result query(array $args = [])
 * @phpstan-method \Aws\Result query(array{
 *     QueryString?: string,
 *     ClientToken?: string,
 *     NextToken?: string,
 *     MaxRows?: int,
 *     QueryInsights?: array{Mode?: 'DISABLED'|'ENABLED_WITH_RATE_CONTROL', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryAsync(array{
 *     QueryString?: string,
 *     ClientToken?: string,
 *     NextToken?: string,
 *     MaxRows?: int,
 *     QueryInsights?: array{Mode?: 'DISABLED'|'ENABLED_WITH_RATE_CONTROL', ...},
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
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSettings(array{
 *     MaxQueryTCU?: int,
 *     QueryPricingModel?: 'BYTES_SCANNED'|'COMPUTE_UNITS',
 *     QueryCompute?: array{
 *         ComputeMode?: 'ON_DEMAND'|'PROVISIONED',
 *         ProvisionedCapacity?: array{TargetQueryTCU?: int, NotificationConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array{
 *     MaxQueryTCU?: int,
 *     QueryPricingModel?: 'BYTES_SCANNED'|'COMPUTE_UNITS',
 *     QueryCompute?: array{
 *         ComputeMode?: 'ON_DEMAND'|'PROVISIONED',
 *         ProvisionedCapacity?: array{TargetQueryTCU?: int, NotificationConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result updateScheduledQuery(array{ScheduledQueryArn?: string, State?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduledQueryAsync(array{ScheduledQueryArn?: string, State?: 'DISABLED'|'ENABLED', ...} $args = [])
 */
class TimestreamQueryClient extends AwsClient {}
