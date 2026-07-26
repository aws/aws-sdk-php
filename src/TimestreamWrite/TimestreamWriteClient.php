<?php
namespace Aws\TimestreamWrite;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Timestream Write** service.
 * @method \Aws\Result createBatchLoadTask(array $args = [])
 * @phpstan-method \Aws\Result createBatchLoadTask(array{
 *     ClientToken?: string,
 *     DataModelConfiguration?: array{
 *         DataModel?: array{
 *             TimeColumn?: string,
 *             TimeUnit?: 'MICROSECONDS'|'MILLISECONDS'|'NANOSECONDS'|'SECONDS',
 *             DimensionMappings?: list<array>,
 *             MultiMeasureMappings?: array,
 *             MixedMeasureMappings?: list<array>,
 *             MeasureNameColumn?: string,
 *             ...,
 *         },
 *         DataModelS3Configuration?: array{BucketName?: string, ObjectKey?: string, ...},
 *         ...,
 *     },
 *     DataSourceConfiguration?: array{
 *         DataSourceS3Configuration?: array{BucketName?: string, ObjectKeyPrefix?: string, ...},
 *         CsvConfiguration?: array{
 *             ColumnSeparator?: string,
 *             EscapeChar?: string,
 *             QuoteChar?: string,
 *             NullValue?: string,
 *             TrimWhiteSpace?: bool,
 *             ...,
 *         },
 *         DataFormat?: 'CSV',
 *         ...,
 *     },
 *     ReportConfiguration?: array{
 *         ReportS3Configuration?: array{
 *             BucketName?: string,
 *             ObjectKeyPrefix?: string,
 *             EncryptionOption?: 'SSE_KMS'|'SSE_S3',
 *             KmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     TargetDatabaseName?: string,
 *     TargetTableName?: string,
 *     RecordVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBatchLoadTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBatchLoadTaskAsync(array{
 *     ClientToken?: string,
 *     DataModelConfiguration?: array{
 *         DataModel?: array{
 *             TimeColumn?: string,
 *             TimeUnit?: 'MICROSECONDS'|'MILLISECONDS'|'NANOSECONDS'|'SECONDS',
 *             DimensionMappings?: list<array>,
 *             MultiMeasureMappings?: array,
 *             MixedMeasureMappings?: list<array>,
 *             MeasureNameColumn?: string,
 *             ...,
 *         },
 *         DataModelS3Configuration?: array{BucketName?: string, ObjectKey?: string, ...},
 *         ...,
 *     },
 *     DataSourceConfiguration?: array{
 *         DataSourceS3Configuration?: array{BucketName?: string, ObjectKeyPrefix?: string, ...},
 *         CsvConfiguration?: array{
 *             ColumnSeparator?: string,
 *             EscapeChar?: string,
 *             QuoteChar?: string,
 *             NullValue?: string,
 *             TrimWhiteSpace?: bool,
 *             ...,
 *         },
 *         DataFormat?: 'CSV',
 *         ...,
 *     },
 *     ReportConfiguration?: array{
 *         ReportS3Configuration?: array{
 *             BucketName?: string,
 *             ObjectKeyPrefix?: string,
 *             EncryptionOption?: 'SSE_KMS'|'SSE_S3',
 *             KmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     TargetDatabaseName?: string,
 *     TargetTableName?: string,
 *     RecordVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDatabase(array $args = [])
 * @phpstan-method \Aws\Result createDatabase(array{DatabaseName?: string, KmsKeyId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatabaseAsync(array{DatabaseName?: string, KmsKeyId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createTable(array $args = [])
 * @phpstan-method \Aws\Result createTable(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     RetentionProperties?: array{MemoryStoreRetentionPeriodInHours?: int, MagneticStoreRetentionPeriodInDays?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MagneticStoreWriteProperties?: array{
 *         EnableMagneticStoreWrites?: bool,
 *         MagneticStoreRejectedDataLocation?: array{S3Configuration?: array, ...},
 *         ...,
 *     },
 *     Schema?: array{CompositePartitionKey?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTableAsync(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     RetentionProperties?: array{MemoryStoreRetentionPeriodInHours?: int, MagneticStoreRetentionPeriodInDays?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MagneticStoreWriteProperties?: array{
 *         EnableMagneticStoreWrites?: bool,
 *         MagneticStoreRejectedDataLocation?: array{S3Configuration?: array, ...},
 *         ...,
 *     },
 *     Schema?: array{CompositePartitionKey?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDatabase(array $args = [])
 * @phpstan-method \Aws\Result deleteDatabase(array{DatabaseName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatabaseAsync(array{DatabaseName?: string, ...} $args = [])
 * @method \Aws\Result deleteTable(array $args = [])
 * @phpstan-method \Aws\Result deleteTable(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableAsync(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result describeBatchLoadTask(array $args = [])
 * @phpstan-method \Aws\Result describeBatchLoadTask(array{TaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBatchLoadTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBatchLoadTaskAsync(array{TaskId?: string, ...} $args = [])
 * @method \Aws\Result describeDatabase(array $args = [])
 * @phpstan-method \Aws\Result describeDatabase(array{DatabaseName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatabaseAsync(array{DatabaseName?: string, ...} $args = [])
 * @method \Aws\Result describeEndpoints(array $args = [])
 * @phpstan-method \Aws\Result describeEndpoints(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array{...} $args = [])
 * @method \Aws\Result describeTable(array $args = [])
 * @phpstan-method \Aws\Result describeTable(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTableAsync(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result listBatchLoadTasks(array $args = [])
 * @phpstan-method \Aws\Result listBatchLoadTasks(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     TaskStatus?: 'CREATED'|'FAILED'|'IN_PROGRESS'|'PENDING_RESUME'|'PROGRESS_STOPPED'|'SUCCEEDED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBatchLoadTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBatchLoadTasksAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     TaskStatus?: 'CREATED'|'FAILED'|'IN_PROGRESS'|'PENDING_RESUME'|'PROGRESS_STOPPED'|'SUCCEEDED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDatabases(array $args = [])
 * @phpstan-method \Aws\Result listDatabases(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatabasesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTables(array $args = [])
 * @phpstan-method \Aws\Result listTables(array{DatabaseName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTablesAsync(array{DatabaseName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result resumeBatchLoadTask(array $args = [])
 * @phpstan-method \Aws\Result resumeBatchLoadTask(array{TaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeBatchLoadTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeBatchLoadTaskAsync(array{TaskId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDatabase(array $args = [])
 * @phpstan-method \Aws\Result updateDatabase(array{DatabaseName?: string, KmsKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatabaseAsync(array{DatabaseName?: string, KmsKeyId?: string, ...} $args = [])
 * @method \Aws\Result updateTable(array $args = [])
 * @phpstan-method \Aws\Result updateTable(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     RetentionProperties?: array{MemoryStoreRetentionPeriodInHours?: int, MagneticStoreRetentionPeriodInDays?: int, ...},
 *     MagneticStoreWriteProperties?: array{
 *         EnableMagneticStoreWrites?: bool,
 *         MagneticStoreRejectedDataLocation?: array{S3Configuration?: array, ...},
 *         ...,
 *     },
 *     Schema?: array{CompositePartitionKey?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableAsync(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     RetentionProperties?: array{MemoryStoreRetentionPeriodInHours?: int, MagneticStoreRetentionPeriodInDays?: int, ...},
 *     MagneticStoreWriteProperties?: array{
 *         EnableMagneticStoreWrites?: bool,
 *         MagneticStoreRejectedDataLocation?: array{S3Configuration?: array, ...},
 *         ...,
 *     },
 *     Schema?: array{CompositePartitionKey?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result writeRecords(array $args = [])
 * @phpstan-method \Aws\Result writeRecords(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     CommonAttributes?: array{
 *         Dimensions?: list<array>,
 *         MeasureName?: string,
 *         MeasureValue?: string,
 *         MeasureValueType?: 'BIGINT'|'BOOLEAN'|'DOUBLE'|'MULTI'|'TIMESTAMP'|'VARCHAR',
 *         Time?: string,
 *         TimeUnit?: 'MICROSECONDS'|'MILLISECONDS'|'NANOSECONDS'|'SECONDS',
 *         Version?: int,
 *         MeasureValues?: list<array>,
 *         ...,
 *     },
 *     Records?: list<array{
 *         Dimensions?: list<array>,
 *         MeasureName?: string,
 *         MeasureValue?: string,
 *         MeasureValueType?: 'BIGINT'|'BOOLEAN'|'DOUBLE'|'MULTI'|'TIMESTAMP'|'VARCHAR',
 *         Time?: string,
 *         TimeUnit?: 'MICROSECONDS'|'MILLISECONDS'|'NANOSECONDS'|'SECONDS',
 *         Version?: int,
 *         MeasureValues?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise writeRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise writeRecordsAsync(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     CommonAttributes?: array{
 *         Dimensions?: list<array>,
 *         MeasureName?: string,
 *         MeasureValue?: string,
 *         MeasureValueType?: 'BIGINT'|'BOOLEAN'|'DOUBLE'|'MULTI'|'TIMESTAMP'|'VARCHAR',
 *         Time?: string,
 *         TimeUnit?: 'MICROSECONDS'|'MILLISECONDS'|'NANOSECONDS'|'SECONDS',
 *         Version?: int,
 *         MeasureValues?: list<array>,
 *         ...,
 *     },
 *     Records?: list<array{
 *         Dimensions?: list<array>,
 *         MeasureName?: string,
 *         MeasureValue?: string,
 *         MeasureValueType?: 'BIGINT'|'BOOLEAN'|'DOUBLE'|'MULTI'|'TIMESTAMP'|'VARCHAR',
 *         Time?: string,
 *         TimeUnit?: 'MICROSECONDS'|'MILLISECONDS'|'NANOSECONDS'|'SECONDS',
 *         Version?: int,
 *         MeasureValues?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class TimestreamWriteClient extends AwsClient {}
