<?php
namespace Aws\KinesisAnalyticsV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Analytics** service.
 * @method \Aws\Result addApplicationCloudWatchLoggingOption(array $args = [])
 * @phpstan-method \Aws\Result addApplicationCloudWatchLoggingOption(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     CloudWatchLoggingOption?: array{LogStreamARN?: string, ...},
 *     ConditionalToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addApplicationCloudWatchLoggingOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addApplicationCloudWatchLoggingOptionAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     CloudWatchLoggingOption?: array{LogStreamARN?: string, ...},
 *     ConditionalToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addApplicationInput(array $args = [])
 * @phpstan-method \Aws\Result addApplicationInput(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     Input?: array{
 *         NamePrefix?: string,
 *         InputProcessingConfiguration?: array{InputLambdaProcessor?: array, ...},
 *         KinesisStreamsInput?: array{ResourceARN?: string, ...},
 *         KinesisFirehoseInput?: array{ResourceARN?: string, ...},
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
 *         KinesisStreamsInput?: array{ResourceARN?: string, ...},
 *         KinesisFirehoseInput?: array{ResourceARN?: string, ...},
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
 *     InputProcessingConfiguration?: array{InputLambdaProcessor?: array{ResourceARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addApplicationInputProcessingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addApplicationInputProcessingConfigurationAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     InputId?: string,
 *     InputProcessingConfiguration?: array{InputLambdaProcessor?: array{ResourceARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result addApplicationOutput(array $args = [])
 * @phpstan-method \Aws\Result addApplicationOutput(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     Output?: array{
 *         Name?: string,
 *         KinesisStreamsOutput?: array{ResourceARN?: string, ...},
 *         KinesisFirehoseOutput?: array{ResourceARN?: string, ...},
 *         LambdaOutput?: array{ResourceARN?: string, ...},
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
 *         KinesisStreamsOutput?: array{ResourceARN?: string, ...},
 *         KinesisFirehoseOutput?: array{ResourceARN?: string, ...},
 *         LambdaOutput?: array{ResourceARN?: string, ...},
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
 *         S3ReferenceDataSource?: array{BucketARN?: string, FileKey?: string, ...},
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
 *         S3ReferenceDataSource?: array{BucketARN?: string, FileKey?: string, ...},
 *         ReferenceSchema?: array{RecordFormat?: array, RecordEncoding?: string, RecordColumns?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result addApplicationVpcConfiguration(array $args = [])
 * @phpstan-method \Aws\Result addApplicationVpcConfiguration(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     VpcConfiguration?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     ConditionalToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addApplicationVpcConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addApplicationVpcConfigurationAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     VpcConfiguration?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     ConditionalToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     ApplicationName?: string,
 *     ApplicationDescription?: string,
 *     RuntimeEnvironment?: 'FLINK-1_11'|'FLINK-1_13'|'FLINK-1_15'|'FLINK-1_18'|'FLINK-1_19'|'FLINK-1_20'|'FLINK-1_6'|'FLINK-1_8'|'FLINK-2_2'|'FLINK-2_3'|'SQL-1_0'|'ZEPPELIN-FLINK-1_0'|'ZEPPELIN-FLINK-2_0'|'ZEPPELIN-FLINK-3_0',
 *     ServiceExecutionRole?: string,
 *     ApplicationConfiguration?: array{
 *         SqlApplicationConfiguration?: array{Inputs?: list<array>, Outputs?: list<array>, ReferenceDataSources?: list<array>, ...},
 *         FlinkApplicationConfiguration?: array{CheckpointConfiguration?: array, MonitoringConfiguration?: array, ParallelismConfiguration?: array, ...},
 *         EnvironmentProperties?: array{PropertyGroups?: list<array>, ...},
 *         ApplicationCodeConfiguration?: array{CodeContent?: array, CodeContentType?: 'PLAINTEXT'|'ZIPFILE', ...},
 *         ApplicationSnapshotConfiguration?: array{SnapshotsEnabled?: bool, ...},
 *         ApplicationSystemRollbackConfiguration?: array{RollbackEnabled?: bool, ...},
 *         VpcConfigurations?: list<array>,
 *         ZeppelinApplicationConfiguration?: array{
 *             MonitoringConfiguration?: array,
 *             CatalogConfiguration?: array,
 *             DeployAsApplicationConfiguration?: array,
 *             CustomArtifactsConfiguration?: list<array>,
 *             ...,
 *         },
 *         ApplicationEncryptionConfiguration?: array{KeyId?: string, KeyType?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KEY', ...},
 *         ...,
 *     },
 *     CloudWatchLoggingOptions?: list<array{LogStreamARN?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ApplicationMode?: 'INTERACTIVE'|'STREAMING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     ApplicationName?: string,
 *     ApplicationDescription?: string,
 *     RuntimeEnvironment?: 'FLINK-1_11'|'FLINK-1_13'|'FLINK-1_15'|'FLINK-1_18'|'FLINK-1_19'|'FLINK-1_20'|'FLINK-1_6'|'FLINK-1_8'|'FLINK-2_2'|'FLINK-2_3'|'SQL-1_0'|'ZEPPELIN-FLINK-1_0'|'ZEPPELIN-FLINK-2_0'|'ZEPPELIN-FLINK-3_0',
 *     ServiceExecutionRole?: string,
 *     ApplicationConfiguration?: array{
 *         SqlApplicationConfiguration?: array{Inputs?: list<array>, Outputs?: list<array>, ReferenceDataSources?: list<array>, ...},
 *         FlinkApplicationConfiguration?: array{CheckpointConfiguration?: array, MonitoringConfiguration?: array, ParallelismConfiguration?: array, ...},
 *         EnvironmentProperties?: array{PropertyGroups?: list<array>, ...},
 *         ApplicationCodeConfiguration?: array{CodeContent?: array, CodeContentType?: 'PLAINTEXT'|'ZIPFILE', ...},
 *         ApplicationSnapshotConfiguration?: array{SnapshotsEnabled?: bool, ...},
 *         ApplicationSystemRollbackConfiguration?: array{RollbackEnabled?: bool, ...},
 *         VpcConfigurations?: list<array>,
 *         ZeppelinApplicationConfiguration?: array{
 *             MonitoringConfiguration?: array,
 *             CatalogConfiguration?: array,
 *             DeployAsApplicationConfiguration?: array,
 *             CustomArtifactsConfiguration?: list<array>,
 *             ...,
 *         },
 *         ApplicationEncryptionConfiguration?: array{KeyId?: string, KeyType?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KEY', ...},
 *         ...,
 *     },
 *     CloudWatchLoggingOptions?: list<array{LogStreamARN?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ApplicationMode?: 'INTERACTIVE'|'STREAMING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplicationPresignedUrl(array $args = [])
 * @phpstan-method \Aws\Result createApplicationPresignedUrl(array{
 *     ApplicationName?: string,
 *     UrlType?: 'FLINK_DASHBOARD_URL'|'ZEPPELIN_UI_URL',
 *     SessionExpirationDurationInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationPresignedUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationPresignedUrlAsync(array{
 *     ApplicationName?: string,
 *     UrlType?: 'FLINK_DASHBOARD_URL'|'ZEPPELIN_UI_URL',
 *     SessionExpirationDurationInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplicationSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createApplicationSnapshot(array{ApplicationName?: string, SnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationSnapshotAsync(array{ApplicationName?: string, SnapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{ApplicationName?: string, CreateTimestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{ApplicationName?: string, CreateTimestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result deleteApplicationCloudWatchLoggingOption(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationCloudWatchLoggingOption(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     CloudWatchLoggingOptionId?: string,
 *     ConditionalToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationCloudWatchLoggingOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationCloudWatchLoggingOptionAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     CloudWatchLoggingOptionId?: string,
 *     ConditionalToken?: string,
 *     ...,
 * } $args = [])
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
 * @method \Aws\Result deleteApplicationSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationSnapshot(array{
 *     ApplicationName?: string,
 *     SnapshotName?: string,
 *     SnapshotCreationTimestamp?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationSnapshotAsync(array{
 *     ApplicationName?: string,
 *     SnapshotName?: string,
 *     SnapshotCreationTimestamp?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplicationVpcConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteApplicationVpcConfiguration(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     VpcConfigurationId?: string,
 *     ConditionalToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationVpcConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationVpcConfigurationAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     VpcConfigurationId?: string,
 *     ConditionalToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeApplication(array $args = [])
 * @phpstan-method \Aws\Result describeApplication(array{ApplicationName?: string, IncludeAdditionalDetails?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationAsync(array{ApplicationName?: string, IncludeAdditionalDetails?: bool, ...} $args = [])
 * @method \Aws\Result describeApplicationOperation(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationOperation(array{ApplicationName?: string, OperationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationOperationAsync(array{ApplicationName?: string, OperationId?: string, ...} $args = [])
 * @method \Aws\Result describeApplicationSnapshot(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationSnapshot(array{ApplicationName?: string, SnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationSnapshotAsync(array{ApplicationName?: string, SnapshotName?: string, ...} $args = [])
 * @method \Aws\Result describeApplicationVersion(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationVersion(array{ApplicationName?: string, ApplicationVersionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationVersionAsync(array{ApplicationName?: string, ApplicationVersionId?: int, ...} $args = [])
 * @method \Aws\Result discoverInputSchema(array $args = [])
 * @phpstan-method \Aws\Result discoverInputSchema(array{
 *     ResourceARN?: string,
 *     ServiceExecutionRole?: string,
 *     InputStartingPositionConfiguration?: array{InputStartingPosition?: 'LAST_STOPPED_POINT'|'NOW'|'TRIM_HORIZON', ...},
 *     S3Configuration?: array{BucketARN?: string, FileKey?: string, ...},
 *     InputProcessingConfiguration?: array{InputLambdaProcessor?: array{ResourceARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise discoverInputSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise discoverInputSchemaAsync(array{
 *     ResourceARN?: string,
 *     ServiceExecutionRole?: string,
 *     InputStartingPositionConfiguration?: array{InputStartingPosition?: 'LAST_STOPPED_POINT'|'NOW'|'TRIM_HORIZON', ...},
 *     S3Configuration?: array{BucketARN?: string, FileKey?: string, ...},
 *     InputProcessingConfiguration?: array{InputLambdaProcessor?: array{ResourceARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplicationOperations(array $args = [])
 * @phpstan-method \Aws\Result listApplicationOperations(array{
 *     ApplicationName?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     Operation?: string,
 *     OperationStatus?: 'CANCELLED'|'FAILED'|'IN_PROGRESS'|'SUCCESSFUL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationOperationsAsync(array{
 *     ApplicationName?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     Operation?: string,
 *     OperationStatus?: 'CANCELLED'|'FAILED'|'IN_PROGRESS'|'SUCCESSFUL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplicationSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listApplicationSnapshots(array{ApplicationName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationSnapshotsAsync(array{ApplicationName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplicationVersions(array $args = [])
 * @phpstan-method \Aws\Result listApplicationVersions(array{ApplicationName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationVersionsAsync(array{ApplicationName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result rollbackApplication(array $args = [])
 * @phpstan-method \Aws\Result rollbackApplication(array{ApplicationName?: string, CurrentApplicationVersionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rollbackApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rollbackApplicationAsync(array{ApplicationName?: string, CurrentApplicationVersionId?: int, ...} $args = [])
 * @method \Aws\Result startApplication(array $args = [])
 * @phpstan-method \Aws\Result startApplication(array{
 *     ApplicationName?: string,
 *     RunConfiguration?: array{
 *         FlinkRunConfiguration?: array{AllowNonRestoredState?: bool, ...},
 *         SqlRunConfigurations?: list<array>,
 *         ApplicationRestoreConfiguration?: array{
 *             ApplicationRestoreType?: 'RESTORE_FROM_CUSTOM_SNAPSHOT'|'RESTORE_FROM_LATEST_SNAPSHOT'|'SKIP_RESTORE_FROM_SNAPSHOT',
 *             SnapshotName?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startApplicationAsync(array{
 *     ApplicationName?: string,
 *     RunConfiguration?: array{
 *         FlinkRunConfiguration?: array{AllowNonRestoredState?: bool, ...},
 *         SqlRunConfigurations?: list<array>,
 *         ApplicationRestoreConfiguration?: array{
 *             ApplicationRestoreType?: 'RESTORE_FROM_CUSTOM_SNAPSHOT'|'RESTORE_FROM_LATEST_SNAPSHOT'|'SKIP_RESTORE_FROM_SNAPSHOT',
 *             SnapshotName?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopApplication(array $args = [])
 * @phpstan-method \Aws\Result stopApplication(array{ApplicationName?: string, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopApplicationAsync(array{ApplicationName?: string, Force?: bool, ...} $args = [])
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
 *     ApplicationConfigurationUpdate?: array{
 *         SqlApplicationConfigurationUpdate?: array{InputUpdates?: list<array>, OutputUpdates?: list<array>, ReferenceDataSourceUpdates?: list<array>, ...},
 *         ApplicationCodeConfigurationUpdate?: array{CodeContentTypeUpdate?: 'PLAINTEXT'|'ZIPFILE', CodeContentUpdate?: array, ...},
 *         FlinkApplicationConfigurationUpdate?: array{
 *             CheckpointConfigurationUpdate?: array,
 *             MonitoringConfigurationUpdate?: array,
 *             ParallelismConfigurationUpdate?: array,
 *             ...,
 *         },
 *         EnvironmentPropertyUpdates?: array{PropertyGroups?: list<array>, ...},
 *         ApplicationSnapshotConfigurationUpdate?: array{SnapshotsEnabledUpdate?: bool, ...},
 *         ApplicationSystemRollbackConfigurationUpdate?: array{RollbackEnabledUpdate?: bool, ...},
 *         VpcConfigurationUpdates?: list<array>,
 *         ZeppelinApplicationConfigurationUpdate?: array{
 *             MonitoringConfigurationUpdate?: array,
 *             CatalogConfigurationUpdate?: array,
 *             DeployAsApplicationConfigurationUpdate?: array,
 *             CustomArtifactsConfigurationUpdate?: list<array>,
 *             ...,
 *         },
 *         ApplicationEncryptionConfigurationUpdate?: array{KeyIdUpdate?: string, KeyTypeUpdate?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KEY', ...},
 *         ...,
 *     },
 *     ServiceExecutionRoleUpdate?: string,
 *     RunConfigurationUpdate?: array{
 *         FlinkRunConfiguration?: array{AllowNonRestoredState?: bool, ...},
 *         ApplicationRestoreConfiguration?: array{
 *             ApplicationRestoreType?: 'RESTORE_FROM_CUSTOM_SNAPSHOT'|'RESTORE_FROM_LATEST_SNAPSHOT'|'SKIP_RESTORE_FROM_SNAPSHOT',
 *             SnapshotName?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CloudWatchLoggingOptionUpdates?: list<array{CloudWatchLoggingOptionId?: string, LogStreamARNUpdate?: string, ...}>,
 *     ConditionalToken?: string,
 *     RuntimeEnvironmentUpdate?: 'FLINK-1_11'|'FLINK-1_13'|'FLINK-1_15'|'FLINK-1_18'|'FLINK-1_19'|'FLINK-1_20'|'FLINK-1_6'|'FLINK-1_8'|'FLINK-2_2'|'FLINK-2_3'|'SQL-1_0'|'ZEPPELIN-FLINK-1_0'|'ZEPPELIN-FLINK-2_0'|'ZEPPELIN-FLINK-3_0',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     ApplicationName?: string,
 *     CurrentApplicationVersionId?: int,
 *     ApplicationConfigurationUpdate?: array{
 *         SqlApplicationConfigurationUpdate?: array{InputUpdates?: list<array>, OutputUpdates?: list<array>, ReferenceDataSourceUpdates?: list<array>, ...},
 *         ApplicationCodeConfigurationUpdate?: array{CodeContentTypeUpdate?: 'PLAINTEXT'|'ZIPFILE', CodeContentUpdate?: array, ...},
 *         FlinkApplicationConfigurationUpdate?: array{
 *             CheckpointConfigurationUpdate?: array,
 *             MonitoringConfigurationUpdate?: array,
 *             ParallelismConfigurationUpdate?: array,
 *             ...,
 *         },
 *         EnvironmentPropertyUpdates?: array{PropertyGroups?: list<array>, ...},
 *         ApplicationSnapshotConfigurationUpdate?: array{SnapshotsEnabledUpdate?: bool, ...},
 *         ApplicationSystemRollbackConfigurationUpdate?: array{RollbackEnabledUpdate?: bool, ...},
 *         VpcConfigurationUpdates?: list<array>,
 *         ZeppelinApplicationConfigurationUpdate?: array{
 *             MonitoringConfigurationUpdate?: array,
 *             CatalogConfigurationUpdate?: array,
 *             DeployAsApplicationConfigurationUpdate?: array,
 *             CustomArtifactsConfigurationUpdate?: list<array>,
 *             ...,
 *         },
 *         ApplicationEncryptionConfigurationUpdate?: array{KeyIdUpdate?: string, KeyTypeUpdate?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KEY', ...},
 *         ...,
 *     },
 *     ServiceExecutionRoleUpdate?: string,
 *     RunConfigurationUpdate?: array{
 *         FlinkRunConfiguration?: array{AllowNonRestoredState?: bool, ...},
 *         ApplicationRestoreConfiguration?: array{
 *             ApplicationRestoreType?: 'RESTORE_FROM_CUSTOM_SNAPSHOT'|'RESTORE_FROM_LATEST_SNAPSHOT'|'SKIP_RESTORE_FROM_SNAPSHOT',
 *             SnapshotName?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CloudWatchLoggingOptionUpdates?: list<array{CloudWatchLoggingOptionId?: string, LogStreamARNUpdate?: string, ...}>,
 *     ConditionalToken?: string,
 *     RuntimeEnvironmentUpdate?: 'FLINK-1_11'|'FLINK-1_13'|'FLINK-1_15'|'FLINK-1_18'|'FLINK-1_19'|'FLINK-1_20'|'FLINK-1_6'|'FLINK-1_8'|'FLINK-2_2'|'FLINK-2_3'|'SQL-1_0'|'ZEPPELIN-FLINK-1_0'|'ZEPPELIN-FLINK-2_0'|'ZEPPELIN-FLINK-3_0',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApplicationMaintenanceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateApplicationMaintenanceConfiguration(array{
 *     ApplicationName?: string,
 *     ApplicationMaintenanceConfigurationUpdate?: array{ApplicationMaintenanceWindowStartTimeUpdate?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationMaintenanceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationMaintenanceConfigurationAsync(array{
 *     ApplicationName?: string,
 *     ApplicationMaintenanceConfigurationUpdate?: array{ApplicationMaintenanceWindowStartTimeUpdate?: string, ...},
 *     ...,
 * } $args = [])
 */
class KinesisAnalyticsV2Client extends AwsClient {}
