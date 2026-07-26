<?php
namespace Aws\KinesisAnalytics;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Analytics** service.
 * @method \Aws\Result addApplicationCloudWatchLoggingOption(array $args = [])
 * @phpstan-method \Aws\Result addApplicationCloudWatchLoggingOption(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     CloudWatchLoggingOption?: array{LogStreamARN?: string, RoleARN?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addApplicationCloudWatchLoggingOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addApplicationCloudWatchLoggingOptionAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     CloudWatchLoggingOption?: array{LogStreamARN?: string, RoleARN?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result addApplicationInput(array $args = [])
 * @phpstan-method \Aws\Result addApplicationInput(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     Input?: array{
 *         NamePrefix?: string,
 *         InputProcessingConfiguration?: array{InputLambdaProcessor?: array, ...},
 *         KinesisStreamsInput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         KinesisFirehoseInput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         InputParallelism?: array{Count?: int, ...},
 *         InputSchema?: array{RecordFormat?: array, RecordEncoding?: string, RecordColumns?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addApplicationInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addApplicationInputAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     Input?: array{
 *         NamePrefix?: string,
 *         InputProcessingConfiguration?: array{InputLambdaProcessor?: array, ...},
 *         KinesisStreamsInput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         KinesisFirehoseInput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         InputParallelism?: array{Count?: int, ...},
 *         InputSchema?: array{RecordFormat?: array, RecordEncoding?: string, RecordColumns?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result addApplicationInputProcessingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result addApplicationInputProcessingConfiguration(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     InputId?: string,
 *     InputProcessingConfiguration?: array{InputLambdaProcessor?: array{ResourceARN?: string, RoleARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addApplicationInputProcessingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addApplicationInputProcessingConfigurationAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     InputId?: string,
 *     InputProcessingConfiguration?: array{InputLambdaProcessor?: array{ResourceARN?: string, RoleARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result addApplicationOutput(array $args = [])
 * @phpstan-method \Aws\Result addApplicationOutput(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     Output?: array{
 *         Name?: string,
 *         KinesisStreamsOutput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         KinesisFirehoseOutput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         LambdaOutput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         DestinationSchema?: array{RecordFormatType?: 'CSV'|'JSON', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addApplicationOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addApplicationOutputAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     Output?: array{
 *         Name?: string,
 *         KinesisStreamsOutput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         KinesisFirehoseOutput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         LambdaOutput?: array{ResourceARN?: string, RoleARN?: string, ...},
 *         DestinationSchema?: array{RecordFormatType?: 'CSV'|'JSON', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result addApplicationReferenceDataSource(array $args = [])
 * @phpstan-method \Aws\Result addApplicationReferenceDataSource(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     ReferenceDataSource?: array{
 *         TableName?: string,
 *         S3ReferenceDataSource?: array{BucketARN?: string, FileKey?: string, ReferenceRoleARN?: string, ...},
 *         ReferenceSchema?: array{RecordFormat?: array, RecordEncoding?: string, RecordColumns?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addApplicationReferenceDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addApplicationReferenceDataSourceAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     ReferenceDataSource?: array{
 *         TableName?: string,
 *         S3ReferenceDataSource?: array{BucketARN?: string, FileKey?: string, ReferenceRoleARN?: string, ...},
 *         ReferenceSchema?: array{RecordFormat?: array, RecordEncoding?: string, RecordColumns?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     ApplicationName?: string,
 *     ApplicationDescription?: string,
 *     Inputs?: list<array{
 *         NamePrefix?: string,
 *         InputProcessingConfiguration?: array,
 *         KinesisStreamsInput?: array,
 *         KinesisFirehoseInput?: array,
 *         InputParallelism?: array,
 *         InputSchema?: array,
 *         ...,
 *     }>,
 *     Outputs?: list<array{
 *         Name?: string,
 *         KinesisStreamsOutput?: array,
 *         KinesisFirehoseOutput?: array,
 *         LambdaOutput?: array,
 *         DestinationSchema?: array,
 *         ...,
 *     }>,
 *     CloudWatchLoggingOptions?: list<array{LogStreamARN?: string, RoleARN?: string, ...}>,
 *     ApplicationCode?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     ApplicationName?: string,
 *     ApplicationDescription?: string,
 *     Inputs?: list<array{
 *         NamePrefix?: string,
 *         InputProcessingConfiguration?: array,
 *         KinesisStreamsInput?: array,
 *         KinesisFirehoseInput?: array,
 *         InputParallelism?: array,
 *         InputSchema?: array,
 *         ...,
 *     }>,
 *     Outputs?: list<array{
 *         Name?: string,
 *         KinesisStreamsOutput?: array,
 *         KinesisFirehoseOutput?: array,
 *         LambdaOutput?: array,
 *         DestinationSchema?: array,
 *         ...,
 *     }>,
 *     CloudWatchLoggingOptions?: list<array{LogStreamARN?: string, RoleARN?: string, ...}>,
 *     ApplicationCode?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{ApplicationName?: string, CreateTimestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{ApplicationName?: string, CreateTimestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result deleteApplicationCloudWatchLoggingOption(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationCloudWatchLoggingOption(array{ApplicationName?: string, CurrentApplicationVersionId?: int, CloudWatchLoggingOptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationCloudWatchLoggingOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationCloudWatchLoggingOptionAsync(array{ApplicationName?: string, CurrentApplicationVersionId?: int, CloudWatchLoggingOptionId?: string, ...} $args = [])
 * @method \Aws\Result deleteApplicationInputProcessingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationInputProcessingConfiguration(array{ApplicationName?: string, CurrentApplicationVersionId?: int, InputId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationInputProcessingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationInputProcessingConfigurationAsync(array{ApplicationName?: string, CurrentApplicationVersionId?: int, InputId?: string, ...} $args = [])
 * @method \Aws\Result deleteApplicationOutput(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationOutput(array{ApplicationName?: string, CurrentApplicationVersionId?: int, OutputId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationOutputAsync(array{ApplicationName?: string, CurrentApplicationVersionId?: int, OutputId?: string, ...} $args = [])
 * @method \Aws\Result deleteApplicationReferenceDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationReferenceDataSource(array{ApplicationName?: string, CurrentApplicationVersionId?: int, ReferenceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationReferenceDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationReferenceDataSourceAsync(array{ApplicationName?: string, CurrentApplicationVersionId?: int, ReferenceId?: string, ...} $args = [])
 * @method \Aws\Result describeApplication(array $args = [])
 * @phpstan-method \Aws\Result describeApplication(array{ApplicationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationAsync(array{ApplicationName?: string, ...} $args = [])
 * @method \Aws\Result discoverInputSchema(array $args = [])
 * @phpstan-method \Aws\Result discoverInputSchema(array{
 *     ResourceARN?: string,
 *     RoleARN?: string,
 *     InputStartingPositionConfiguration?: array{InputStartingPosition?: 'LAST_STOPPED_POINT'|'NOW'|'TRIM_HORIZON', ...},
 *     S3Configuration?: array{RoleARN?: string, BucketARN?: string, FileKey?: string, ...},
 *     InputProcessingConfiguration?: array{InputLambdaProcessor?: array{ResourceARN?: string, RoleARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise discoverInputSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise discoverInputSchemaAsync(array{
 *     ResourceARN?: string,
 *     RoleARN?: string,
 *     InputStartingPositionConfiguration?: array{InputStartingPosition?: 'LAST_STOPPED_POINT'|'NOW'|'TRIM_HORIZON', ...},
 *     S3Configuration?: array{RoleARN?: string, BucketARN?: string, FileKey?: string, ...},
 *     InputProcessingConfiguration?: array{InputLambdaProcessor?: array{ResourceARN?: string, RoleARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{Limit?: int, ExclusiveStartApplicationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{Limit?: int, ExclusiveStartApplicationName?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result startApplication(array $args = [])
 * @phpstan-method \Aws\Result startApplication(array{
 *     ApplicationName?: string,
 *     InputConfigurations?: list<array{Id?: string, InputStartingPositionConfiguration?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startApplicationAsync(array{
 *     ApplicationName?: string,
 *     InputConfigurations?: list<array{Id?: string, InputStartingPositionConfiguration?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopApplication(array $args = [])
 * @phpstan-method \Aws\Result stopApplication(array{ApplicationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopApplicationAsync(array{ApplicationName?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     ApplicationUpdate?: array{
 *         InputUpdates?: list<array>,
 *         ApplicationCodeUpdate?: string,
 *         OutputUpdates?: list<array>,
 *         ReferenceDataSourceUpdates?: list<array>,
 *         CloudWatchLoggingOptionUpdates?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     ApplicationUpdate?: array{
 *         InputUpdates?: list<array>,
 *         ApplicationCodeUpdate?: string,
 *         OutputUpdates?: list<array>,
 *         ReferenceDataSourceUpdates?: list<array>,
 *         CloudWatchLoggingOptionUpdates?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class KinesisAnalyticsClient extends AwsClient {}
