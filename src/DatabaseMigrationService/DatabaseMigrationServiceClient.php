<?php
namespace Aws\DatabaseMigrationService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Database Migration Service** service.
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addTagsToResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>, ...} $args = [])
 * @method \Aws\Result applyPendingMaintenanceAction(array $args = [])
 * @phpstan-method \Aws\Result applyPendingMaintenanceAction(array{ReplicationInstanceArn?: string, ApplyAction?: string, OptInType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array{ReplicationInstanceArn?: string, ApplyAction?: string, OptInType?: string, ...} $args = [])
 * @method \Aws\Result batchStartRecommendations(array $args = [])
 * @phpstan-method \Aws\Result batchStartRecommendations(array{Data?: list<array{DatabaseId?: string, Settings?: array, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchStartRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchStartRecommendationsAsync(array{Data?: list<array{DatabaseId?: string, Settings?: array, ...}>, ...} $args = [])
 * @method \Aws\Result cancelMetadataModelConversion(array $args = [])
 * @phpstan-method \Aws\Result cancelMetadataModelConversion(array{MigrationProjectIdentifier?: string, RequestIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMetadataModelConversionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMetadataModelConversionAsync(array{MigrationProjectIdentifier?: string, RequestIdentifier?: string, ...} $args = [])
 * @method \Aws\Result cancelMetadataModelCreation(array $args = [])
 * @phpstan-method \Aws\Result cancelMetadataModelCreation(array{MigrationProjectIdentifier?: string, RequestIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMetadataModelCreationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMetadataModelCreationAsync(array{MigrationProjectIdentifier?: string, RequestIdentifier?: string, ...} $args = [])
 * @method \Aws\Result cancelReplicationTaskAssessmentRun(array $args = [])
 * @phpstan-method \Aws\Result cancelReplicationTaskAssessmentRun(array{ReplicationTaskAssessmentRunArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelReplicationTaskAssessmentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelReplicationTaskAssessmentRunAsync(array{ReplicationTaskAssessmentRunArn?: string, ...} $args = [])
 * @method \Aws\Result createDataMigration(array $args = [])
 * @phpstan-method \Aws\Result createDataMigration(array{
 *     DataMigrationName?: string,
 *     MigrationProjectIdentifier?: string,
 *     DataMigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     ServiceAccessRoleArn?: string,
 *     EnableCloudwatchLogs?: bool,
 *     SourceDataSettings?: list<array{
 *         CDCStartPosition?: string,
 *         CDCStartTime?: int|string|\DateTimeInterface,
 *         CDCStopTime?: int|string|\DateTimeInterface,
 *         SlotName?: string,
 *         ...,
 *     }>,
 *     TargetDataSettings?: list<array{TablePreparationMode?: 'do-nothing'|'drop-tables-on-target'|'truncate', ...}>,
 *     NumberOfJobs?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     SelectionRules?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataMigrationAsync(array{
 *     DataMigrationName?: string,
 *     MigrationProjectIdentifier?: string,
 *     DataMigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     ServiceAccessRoleArn?: string,
 *     EnableCloudwatchLogs?: bool,
 *     SourceDataSettings?: list<array{
 *         CDCStartPosition?: string,
 *         CDCStartTime?: int|string|\DateTimeInterface,
 *         CDCStopTime?: int|string|\DateTimeInterface,
 *         SlotName?: string,
 *         ...,
 *     }>,
 *     TargetDataSettings?: list<array{TablePreparationMode?: 'do-nothing'|'drop-tables-on-target'|'truncate', ...}>,
 *     NumberOfJobs?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     SelectionRules?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataProvider(array $args = [])
 * @phpstan-method \Aws\Result createDataProvider(array{
 *     DataProviderName?: string,
 *     Description?: string,
 *     Engine?: string,
 *     Virtual?: bool,
 *     Settings?: array{
 *         RedshiftSettings?: array{ServerName?: string, Port?: int, DatabaseName?: string, S3Path?: string, S3AccessRoleArn?: string, ...},
 *         PostgreSqlSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         MySqlSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         OracleSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             AsmServer?: string,
 *             SecretsManagerOracleAsmSecretId?: string,
 *             SecretsManagerOracleAsmAccessRoleArn?: string,
 *             SecretsManagerSecurityDbEncryptionSecretId?: string,
 *             SecretsManagerSecurityDbEncryptionAccessRoleArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         SybaseAseSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             EncryptPassword?: bool,
 *             CertificateArn?: string,
 *             ...,
 *         },
 *         MicrosoftSqlServerSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         DocDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             ...,
 *         },
 *         MariaDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         IbmDb2LuwSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             EncryptionAlgorithm?: int,
 *             SecurityMechanism?: int,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         IbmDb2zOsSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         MongoDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             AuthType?: 'no'|'password',
 *             AuthSource?: string,
 *             AuthMechanism?: 'default'|'mongodb_cr'|'scram_sha_1',
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataProviderAsync(array{
 *     DataProviderName?: string,
 *     Description?: string,
 *     Engine?: string,
 *     Virtual?: bool,
 *     Settings?: array{
 *         RedshiftSettings?: array{ServerName?: string, Port?: int, DatabaseName?: string, S3Path?: string, S3AccessRoleArn?: string, ...},
 *         PostgreSqlSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         MySqlSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         OracleSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             AsmServer?: string,
 *             SecretsManagerOracleAsmSecretId?: string,
 *             SecretsManagerOracleAsmAccessRoleArn?: string,
 *             SecretsManagerSecurityDbEncryptionSecretId?: string,
 *             SecretsManagerSecurityDbEncryptionAccessRoleArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         SybaseAseSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             EncryptPassword?: bool,
 *             CertificateArn?: string,
 *             ...,
 *         },
 *         MicrosoftSqlServerSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         DocDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             ...,
 *         },
 *         MariaDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         IbmDb2LuwSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             EncryptionAlgorithm?: int,
 *             SecurityMechanism?: int,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         IbmDb2zOsSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         MongoDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             AuthType?: 'no'|'password',
 *             AuthSource?: string,
 *             AuthMechanism?: 'default'|'mongodb_cr'|'scram_sha_1',
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createEndpoint(array{
 *     EndpointIdentifier?: string,
 *     EndpointType?: 'source'|'target',
 *     EngineName?: string,
 *     Username?: string,
 *     Password?: string,
 *     ServerName?: string,
 *     Port?: int,
 *     DatabaseName?: string,
 *     ExtraConnectionAttributes?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     CertificateArn?: string,
 *     SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *     ServiceAccessRoleArn?: string,
 *     ExternalTableDefinition?: string,
 *     DynamoDbSettings?: array{ServiceAccessRoleArn?: string, ...},
 *     S3Settings?: array{
 *         ServiceAccessRoleArn?: string,
 *         ExternalTableDefinition?: string,
 *         CsvRowDelimiter?: string,
 *         CsvDelimiter?: string,
 *         BucketFolder?: string,
 *         BucketName?: string,
 *         CompressionType?: 'gzip'|'none',
 *         EncryptionMode?: 'sse-kms'|'sse-s3',
 *         ServerSideEncryptionKmsKeyId?: string,
 *         DataFormat?: 'csv'|'parquet',
 *         EncodingType?: 'plain'|'plain-dictionary'|'rle-dictionary',
 *         DictPageSizeLimit?: int,
 *         RowGroupLength?: int,
 *         DataPageSize?: int,
 *         ParquetVersion?: 'parquet-1-0'|'parquet-2-0',
 *         EnableStatistics?: bool,
 *         IncludeOpForFullLoad?: bool,
 *         CdcInsertsOnly?: bool,
 *         TimestampColumnName?: string,
 *         ParquetTimestampInMillisecond?: bool,
 *         CdcInsertsAndUpdates?: bool,
 *         DatePartitionEnabled?: bool,
 *         DatePartitionSequence?: 'DDMMYYYY'|'MMYYYYDD'|'YYYYMM'|'YYYYMMDD'|'YYYYMMDDHH',
 *         DatePartitionDelimiter?: 'DASH'|'NONE'|'SLASH'|'UNDERSCORE',
 *         UseCsvNoSupValue?: bool,
 *         CsvNoSupValue?: string,
 *         PreserveTransactions?: bool,
 *         CdcPath?: string,
 *         UseTaskStartTimeForFullLoadTimestamp?: bool,
 *         CannedAclForObjects?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'none'|'private'|'public-read'|'public-read-write',
 *         AddColumnName?: bool,
 *         CdcMaxBatchInterval?: int,
 *         CdcMinFileSize?: int,
 *         CsvNullValue?: string,
 *         IgnoreHeaderRows?: int,
 *         MaxFileSize?: int,
 *         Rfc4180?: bool,
 *         DatePartitionTimezone?: string,
 *         AddTrailingPaddingCharacter?: bool,
 *         ExpectedBucketOwner?: string,
 *         GlueCatalogGeneration?: bool,
 *         ...,
 *     },
 *     DmsTransferSettings?: array{ServiceAccessRoleArn?: string, BucketName?: string, ...},
 *     MongoDbSettings?: array{
 *         Username?: string,
 *         Password?: string,
 *         ServerName?: string,
 *         Port?: int,
 *         DatabaseName?: string,
 *         AuthType?: 'no'|'password',
 *         AuthMechanism?: 'default'|'mongodb_cr'|'scram_sha_1',
 *         NestingLevel?: 'none'|'one',
 *         ExtractDocId?: string,
 *         DocsToInvestigate?: string,
 *         AuthSource?: string,
 *         KmsKeyId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         UseUpdateLookUp?: bool,
 *         ReplicateShardCollections?: bool,
 *         ...,
 *     },
 *     KinesisSettings?: array{
 *         StreamArn?: string,
 *         MessageFormat?: 'json'|'json-unformatted',
 *         ServiceAccessRoleArn?: string,
 *         IncludeTransactionDetails?: bool,
 *         IncludePartitionValue?: bool,
 *         PartitionIncludeSchemaTable?: bool,
 *         IncludeTableAlterOperations?: bool,
 *         IncludeControlDetails?: bool,
 *         IncludeNullAndEmpty?: bool,
 *         NoHexPrefix?: bool,
 *         UseLargeIntegerValue?: bool,
 *         ...,
 *     },
 *     KafkaSettings?: array{
 *         Broker?: string,
 *         Topic?: string,
 *         MessageFormat?: 'json'|'json-unformatted',
 *         IncludeTransactionDetails?: bool,
 *         IncludePartitionValue?: bool,
 *         PartitionIncludeSchemaTable?: bool,
 *         IncludeTableAlterOperations?: bool,
 *         IncludeControlDetails?: bool,
 *         MessageMaxBytes?: int,
 *         IncludeNullAndEmpty?: bool,
 *         SecurityProtocol?: 'plaintext'|'sasl-ssl'|'ssl-authentication'|'ssl-encryption',
 *         SslClientCertificateArn?: string,
 *         SslClientKeyArn?: string,
 *         SslClientKeyPassword?: string,
 *         SslCaCertificateArn?: string,
 *         SaslUsername?: string,
 *         SaslPassword?: string,
 *         NoHexPrefix?: bool,
 *         SaslMechanism?: 'plain'|'scram-sha-512',
 *         SslEndpointIdentificationAlgorithm?: 'https'|'none',
 *         UseLargeIntegerValue?: bool,
 *         ...,
 *     },
 *     ElasticsearchSettings?: array{
 *         ServiceAccessRoleArn?: string,
 *         EndpointUri?: string,
 *         FullLoadErrorPercentage?: int,
 *         ErrorRetryDuration?: int,
 *         UseNewMappingType?: bool,
 *         ...,
 *     },
 *     NeptuneSettings?: array{
 *         ServiceAccessRoleArn?: string,
 *         S3BucketName?: string,
 *         S3BucketFolder?: string,
 *         ErrorRetryDuration?: int,
 *         MaxFileSize?: int,
 *         MaxRetryCount?: int,
 *         IamAuthEnabled?: bool,
 *         ...,
 *     },
 *     RedshiftSettings?: array{
 *         AcceptAnyDate?: bool,
 *         AfterConnectScript?: string,
 *         BucketFolder?: string,
 *         BucketName?: string,
 *         CaseSensitiveNames?: bool,
 *         CompUpdate?: bool,
 *         ConnectionTimeout?: int,
 *         DatabaseName?: string,
 *         DateFormat?: string,
 *         EmptyAsNull?: bool,
 *         EncryptionMode?: 'sse-kms'|'sse-s3',
 *         ExplicitIds?: bool,
 *         FileTransferUploadStreams?: int,
 *         LoadTimeout?: int,
 *         MaxFileSize?: int,
 *         Password?: string,
 *         Port?: int,
 *         RemoveQuotes?: bool,
 *         ReplaceInvalidChars?: string,
 *         ReplaceChars?: string,
 *         ServerName?: string,
 *         ServiceAccessRoleArn?: string,
 *         ServerSideEncryptionKmsKeyId?: string,
 *         TimeFormat?: string,
 *         TrimBlanks?: bool,
 *         TruncateColumns?: bool,
 *         Username?: string,
 *         WriteBufferSize?: int,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         MapBooleanAsBoolean?: bool,
 *         ...,
 *     },
 *     PostgreSQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CaptureDdls?: bool,
 *         MaxFileSize?: int,
 *         DatabaseName?: string,
 *         DdlArtifactsSchema?: string,
 *         ExecuteTimeout?: int,
 *         FailTasksOnLobTruncation?: bool,
 *         HeartbeatEnable?: bool,
 *         HeartbeatSchema?: string,
 *         HeartbeatFrequency?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         Username?: string,
 *         SlotName?: string,
 *         PluginName?: 'no-preference'|'pglogical'|'test-decoding',
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         MapBooleanAsBoolean?: bool,
 *         MapJsonbAsClob?: bool,
 *         MapLongVarcharAs?: 'clob'|'nclob'|'wstring',
 *         DatabaseMode?: 'babelfish'|'default',
 *         BabelfishDatabaseName?: string,
 *         DisableUnicodeSourceFilter?: bool,
 *         ServiceAccessRoleArn?: string,
 *         AuthenticationMethod?: 'iam'|'password',
 *         ...,
 *     },
 *     MySQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CleanSourceMetadataOnMismatch?: bool,
 *         DatabaseName?: string,
 *         EventsPollInterval?: int,
 *         TargetDbType?: 'multiple-databases'|'specific-database',
 *         MaxFileSize?: int,
 *         ParallelLoadThreads?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         ServerTimezone?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ExecuteTimeout?: int,
 *         ServiceAccessRoleArn?: string,
 *         AuthenticationMethod?: 'iam'|'password',
 *         ...,
 *     },
 *     OracleSettings?: array{
 *         AddSupplementalLogging?: bool,
 *         ArchivedLogDestId?: int,
 *         AdditionalArchivedLogDestId?: int,
 *         ExtraArchivedLogDestIds?: list<int>,
 *         AllowSelectNestedTables?: bool,
 *         ParallelAsmReadThreads?: int,
 *         ReadAheadBlocks?: int,
 *         AccessAlternateDirectly?: bool,
 *         UseAlternateFolderForOnline?: bool,
 *         OraclePathPrefix?: string,
 *         UsePathPrefix?: string,
 *         ReplacePathPrefix?: bool,
 *         EnableHomogenousTablespace?: bool,
 *         DirectPathNoLog?: bool,
 *         ArchivedLogsOnly?: bool,
 *         AsmPassword?: string,
 *         AsmServer?: string,
 *         AsmUser?: string,
 *         CharLengthSemantics?: 'byte'|'char'|'default',
 *         DatabaseName?: string,
 *         DirectPathParallelLoad?: bool,
 *         FailTasksOnLobTruncation?: bool,
 *         NumberDatatypeScale?: int,
 *         Password?: string,
 *         Port?: int,
 *         ReadTableSpaceName?: bool,
 *         RetryInterval?: int,
 *         SecurityDbEncryption?: string,
 *         SecurityDbEncryptionName?: string,
 *         ServerName?: string,
 *         SpatialDataOptionToGeoJsonFunctionName?: string,
 *         StandbyDelayTime?: int,
 *         Username?: string,
 *         UseBFile?: bool,
 *         UseDirectPathFullLoad?: bool,
 *         UseLogminerReader?: bool,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerOracleAsmAccessRoleArn?: string,
 *         SecretsManagerOracleAsmSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         ConvertTimestampWithZoneToUTC?: bool,
 *         OpenTransactionWindow?: int,
 *         AuthenticationMethod?: 'kerberos'|'password',
 *         ...,
 *     },
 *     SybaseSettings?: array{
 *         DatabaseName?: string,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ...,
 *     },
 *     MicrosoftSQLServerSettings?: array{
 *         Port?: int,
 *         BcpPacketSize?: int,
 *         DatabaseName?: string,
 *         ControlTablesFileGroup?: string,
 *         Password?: string,
 *         QuerySingleAlwaysOnNode?: bool,
 *         ReadBackupOnly?: bool,
 *         SafeguardPolicy?: 'exclusive-automatic-truncation'|'rely-on-sql-server-replication-agent'|'shared-automatic-truncation',
 *         ServerName?: string,
 *         Username?: string,
 *         UseBcpFullLoad?: bool,
 *         UseThirdPartyBackupDevice?: bool,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         TlogAccessMode?: 'BackupOnly'|'PreferBackup'|'PreferTlog'|'TlogOnly',
 *         ForceLobLookup?: bool,
 *         AuthenticationMethod?: 'kerberos'|'password',
 *         ...,
 *     },
 *     IBMDb2Settings?: array{
 *         DatabaseName?: string,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         SetDataCaptureChanges?: bool,
 *         CurrentLsn?: string,
 *         MaxKBytesPerRead?: int,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         LoadTimeout?: int,
 *         WriteBufferSize?: int,
 *         MaxFileSize?: int,
 *         KeepCsvFiles?: bool,
 *         ...,
 *     },
 *     ResourceIdentifier?: string,
 *     DocDbSettings?: array{
 *         Username?: string,
 *         Password?: string,
 *         ServerName?: string,
 *         Port?: int,
 *         DatabaseName?: string,
 *         NestingLevel?: 'none'|'one',
 *         ExtractDocId?: bool,
 *         DocsToInvestigate?: int,
 *         KmsKeyId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         UseUpdateLookUp?: bool,
 *         ReplicateShardCollections?: bool,
 *         ...,
 *     },
 *     RedisSettings?: array{
 *         ServerName?: string,
 *         Port?: int,
 *         SslSecurityProtocol?: 'plaintext'|'ssl-encryption',
 *         AuthType?: 'auth-role'|'auth-token'|'none',
 *         AuthUserName?: string,
 *         AuthPassword?: string,
 *         SslCaCertificateArn?: string,
 *         ...,
 *     },
 *     GcpMySQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CleanSourceMetadataOnMismatch?: bool,
 *         DatabaseName?: string,
 *         EventsPollInterval?: int,
 *         TargetDbType?: 'multiple-databases'|'specific-database',
 *         MaxFileSize?: int,
 *         ParallelLoadThreads?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         ServerTimezone?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ...,
 *     },
 *     TimestreamSettings?: array{
 *         DatabaseName?: string,
 *         MemoryDuration?: int,
 *         MagneticDuration?: int,
 *         CdcInsertsAndUpdates?: bool,
 *         EnableMagneticStoreWrites?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointAsync(array{
 *     EndpointIdentifier?: string,
 *     EndpointType?: 'source'|'target',
 *     EngineName?: string,
 *     Username?: string,
 *     Password?: string,
 *     ServerName?: string,
 *     Port?: int,
 *     DatabaseName?: string,
 *     ExtraConnectionAttributes?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     CertificateArn?: string,
 *     SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *     ServiceAccessRoleArn?: string,
 *     ExternalTableDefinition?: string,
 *     DynamoDbSettings?: array{ServiceAccessRoleArn?: string, ...},
 *     S3Settings?: array{
 *         ServiceAccessRoleArn?: string,
 *         ExternalTableDefinition?: string,
 *         CsvRowDelimiter?: string,
 *         CsvDelimiter?: string,
 *         BucketFolder?: string,
 *         BucketName?: string,
 *         CompressionType?: 'gzip'|'none',
 *         EncryptionMode?: 'sse-kms'|'sse-s3',
 *         ServerSideEncryptionKmsKeyId?: string,
 *         DataFormat?: 'csv'|'parquet',
 *         EncodingType?: 'plain'|'plain-dictionary'|'rle-dictionary',
 *         DictPageSizeLimit?: int,
 *         RowGroupLength?: int,
 *         DataPageSize?: int,
 *         ParquetVersion?: 'parquet-1-0'|'parquet-2-0',
 *         EnableStatistics?: bool,
 *         IncludeOpForFullLoad?: bool,
 *         CdcInsertsOnly?: bool,
 *         TimestampColumnName?: string,
 *         ParquetTimestampInMillisecond?: bool,
 *         CdcInsertsAndUpdates?: bool,
 *         DatePartitionEnabled?: bool,
 *         DatePartitionSequence?: 'DDMMYYYY'|'MMYYYYDD'|'YYYYMM'|'YYYYMMDD'|'YYYYMMDDHH',
 *         DatePartitionDelimiter?: 'DASH'|'NONE'|'SLASH'|'UNDERSCORE',
 *         UseCsvNoSupValue?: bool,
 *         CsvNoSupValue?: string,
 *         PreserveTransactions?: bool,
 *         CdcPath?: string,
 *         UseTaskStartTimeForFullLoadTimestamp?: bool,
 *         CannedAclForObjects?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'none'|'private'|'public-read'|'public-read-write',
 *         AddColumnName?: bool,
 *         CdcMaxBatchInterval?: int,
 *         CdcMinFileSize?: int,
 *         CsvNullValue?: string,
 *         IgnoreHeaderRows?: int,
 *         MaxFileSize?: int,
 *         Rfc4180?: bool,
 *         DatePartitionTimezone?: string,
 *         AddTrailingPaddingCharacter?: bool,
 *         ExpectedBucketOwner?: string,
 *         GlueCatalogGeneration?: bool,
 *         ...,
 *     },
 *     DmsTransferSettings?: array{ServiceAccessRoleArn?: string, BucketName?: string, ...},
 *     MongoDbSettings?: array{
 *         Username?: string,
 *         Password?: string,
 *         ServerName?: string,
 *         Port?: int,
 *         DatabaseName?: string,
 *         AuthType?: 'no'|'password',
 *         AuthMechanism?: 'default'|'mongodb_cr'|'scram_sha_1',
 *         NestingLevel?: 'none'|'one',
 *         ExtractDocId?: string,
 *         DocsToInvestigate?: string,
 *         AuthSource?: string,
 *         KmsKeyId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         UseUpdateLookUp?: bool,
 *         ReplicateShardCollections?: bool,
 *         ...,
 *     },
 *     KinesisSettings?: array{
 *         StreamArn?: string,
 *         MessageFormat?: 'json'|'json-unformatted',
 *         ServiceAccessRoleArn?: string,
 *         IncludeTransactionDetails?: bool,
 *         IncludePartitionValue?: bool,
 *         PartitionIncludeSchemaTable?: bool,
 *         IncludeTableAlterOperations?: bool,
 *         IncludeControlDetails?: bool,
 *         IncludeNullAndEmpty?: bool,
 *         NoHexPrefix?: bool,
 *         UseLargeIntegerValue?: bool,
 *         ...,
 *     },
 *     KafkaSettings?: array{
 *         Broker?: string,
 *         Topic?: string,
 *         MessageFormat?: 'json'|'json-unformatted',
 *         IncludeTransactionDetails?: bool,
 *         IncludePartitionValue?: bool,
 *         PartitionIncludeSchemaTable?: bool,
 *         IncludeTableAlterOperations?: bool,
 *         IncludeControlDetails?: bool,
 *         MessageMaxBytes?: int,
 *         IncludeNullAndEmpty?: bool,
 *         SecurityProtocol?: 'plaintext'|'sasl-ssl'|'ssl-authentication'|'ssl-encryption',
 *         SslClientCertificateArn?: string,
 *         SslClientKeyArn?: string,
 *         SslClientKeyPassword?: string,
 *         SslCaCertificateArn?: string,
 *         SaslUsername?: string,
 *         SaslPassword?: string,
 *         NoHexPrefix?: bool,
 *         SaslMechanism?: 'plain'|'scram-sha-512',
 *         SslEndpointIdentificationAlgorithm?: 'https'|'none',
 *         UseLargeIntegerValue?: bool,
 *         ...,
 *     },
 *     ElasticsearchSettings?: array{
 *         ServiceAccessRoleArn?: string,
 *         EndpointUri?: string,
 *         FullLoadErrorPercentage?: int,
 *         ErrorRetryDuration?: int,
 *         UseNewMappingType?: bool,
 *         ...,
 *     },
 *     NeptuneSettings?: array{
 *         ServiceAccessRoleArn?: string,
 *         S3BucketName?: string,
 *         S3BucketFolder?: string,
 *         ErrorRetryDuration?: int,
 *         MaxFileSize?: int,
 *         MaxRetryCount?: int,
 *         IamAuthEnabled?: bool,
 *         ...,
 *     },
 *     RedshiftSettings?: array{
 *         AcceptAnyDate?: bool,
 *         AfterConnectScript?: string,
 *         BucketFolder?: string,
 *         BucketName?: string,
 *         CaseSensitiveNames?: bool,
 *         CompUpdate?: bool,
 *         ConnectionTimeout?: int,
 *         DatabaseName?: string,
 *         DateFormat?: string,
 *         EmptyAsNull?: bool,
 *         EncryptionMode?: 'sse-kms'|'sse-s3',
 *         ExplicitIds?: bool,
 *         FileTransferUploadStreams?: int,
 *         LoadTimeout?: int,
 *         MaxFileSize?: int,
 *         Password?: string,
 *         Port?: int,
 *         RemoveQuotes?: bool,
 *         ReplaceInvalidChars?: string,
 *         ReplaceChars?: string,
 *         ServerName?: string,
 *         ServiceAccessRoleArn?: string,
 *         ServerSideEncryptionKmsKeyId?: string,
 *         TimeFormat?: string,
 *         TrimBlanks?: bool,
 *         TruncateColumns?: bool,
 *         Username?: string,
 *         WriteBufferSize?: int,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         MapBooleanAsBoolean?: bool,
 *         ...,
 *     },
 *     PostgreSQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CaptureDdls?: bool,
 *         MaxFileSize?: int,
 *         DatabaseName?: string,
 *         DdlArtifactsSchema?: string,
 *         ExecuteTimeout?: int,
 *         FailTasksOnLobTruncation?: bool,
 *         HeartbeatEnable?: bool,
 *         HeartbeatSchema?: string,
 *         HeartbeatFrequency?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         Username?: string,
 *         SlotName?: string,
 *         PluginName?: 'no-preference'|'pglogical'|'test-decoding',
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         MapBooleanAsBoolean?: bool,
 *         MapJsonbAsClob?: bool,
 *         MapLongVarcharAs?: 'clob'|'nclob'|'wstring',
 *         DatabaseMode?: 'babelfish'|'default',
 *         BabelfishDatabaseName?: string,
 *         DisableUnicodeSourceFilter?: bool,
 *         ServiceAccessRoleArn?: string,
 *         AuthenticationMethod?: 'iam'|'password',
 *         ...,
 *     },
 *     MySQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CleanSourceMetadataOnMismatch?: bool,
 *         DatabaseName?: string,
 *         EventsPollInterval?: int,
 *         TargetDbType?: 'multiple-databases'|'specific-database',
 *         MaxFileSize?: int,
 *         ParallelLoadThreads?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         ServerTimezone?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ExecuteTimeout?: int,
 *         ServiceAccessRoleArn?: string,
 *         AuthenticationMethod?: 'iam'|'password',
 *         ...,
 *     },
 *     OracleSettings?: array{
 *         AddSupplementalLogging?: bool,
 *         ArchivedLogDestId?: int,
 *         AdditionalArchivedLogDestId?: int,
 *         ExtraArchivedLogDestIds?: list<int>,
 *         AllowSelectNestedTables?: bool,
 *         ParallelAsmReadThreads?: int,
 *         ReadAheadBlocks?: int,
 *         AccessAlternateDirectly?: bool,
 *         UseAlternateFolderForOnline?: bool,
 *         OraclePathPrefix?: string,
 *         UsePathPrefix?: string,
 *         ReplacePathPrefix?: bool,
 *         EnableHomogenousTablespace?: bool,
 *         DirectPathNoLog?: bool,
 *         ArchivedLogsOnly?: bool,
 *         AsmPassword?: string,
 *         AsmServer?: string,
 *         AsmUser?: string,
 *         CharLengthSemantics?: 'byte'|'char'|'default',
 *         DatabaseName?: string,
 *         DirectPathParallelLoad?: bool,
 *         FailTasksOnLobTruncation?: bool,
 *         NumberDatatypeScale?: int,
 *         Password?: string,
 *         Port?: int,
 *         ReadTableSpaceName?: bool,
 *         RetryInterval?: int,
 *         SecurityDbEncryption?: string,
 *         SecurityDbEncryptionName?: string,
 *         ServerName?: string,
 *         SpatialDataOptionToGeoJsonFunctionName?: string,
 *         StandbyDelayTime?: int,
 *         Username?: string,
 *         UseBFile?: bool,
 *         UseDirectPathFullLoad?: bool,
 *         UseLogminerReader?: bool,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerOracleAsmAccessRoleArn?: string,
 *         SecretsManagerOracleAsmSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         ConvertTimestampWithZoneToUTC?: bool,
 *         OpenTransactionWindow?: int,
 *         AuthenticationMethod?: 'kerberos'|'password',
 *         ...,
 *     },
 *     SybaseSettings?: array{
 *         DatabaseName?: string,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ...,
 *     },
 *     MicrosoftSQLServerSettings?: array{
 *         Port?: int,
 *         BcpPacketSize?: int,
 *         DatabaseName?: string,
 *         ControlTablesFileGroup?: string,
 *         Password?: string,
 *         QuerySingleAlwaysOnNode?: bool,
 *         ReadBackupOnly?: bool,
 *         SafeguardPolicy?: 'exclusive-automatic-truncation'|'rely-on-sql-server-replication-agent'|'shared-automatic-truncation',
 *         ServerName?: string,
 *         Username?: string,
 *         UseBcpFullLoad?: bool,
 *         UseThirdPartyBackupDevice?: bool,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         TlogAccessMode?: 'BackupOnly'|'PreferBackup'|'PreferTlog'|'TlogOnly',
 *         ForceLobLookup?: bool,
 *         AuthenticationMethod?: 'kerberos'|'password',
 *         ...,
 *     },
 *     IBMDb2Settings?: array{
 *         DatabaseName?: string,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         SetDataCaptureChanges?: bool,
 *         CurrentLsn?: string,
 *         MaxKBytesPerRead?: int,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         LoadTimeout?: int,
 *         WriteBufferSize?: int,
 *         MaxFileSize?: int,
 *         KeepCsvFiles?: bool,
 *         ...,
 *     },
 *     ResourceIdentifier?: string,
 *     DocDbSettings?: array{
 *         Username?: string,
 *         Password?: string,
 *         ServerName?: string,
 *         Port?: int,
 *         DatabaseName?: string,
 *         NestingLevel?: 'none'|'one',
 *         ExtractDocId?: bool,
 *         DocsToInvestigate?: int,
 *         KmsKeyId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         UseUpdateLookUp?: bool,
 *         ReplicateShardCollections?: bool,
 *         ...,
 *     },
 *     RedisSettings?: array{
 *         ServerName?: string,
 *         Port?: int,
 *         SslSecurityProtocol?: 'plaintext'|'ssl-encryption',
 *         AuthType?: 'auth-role'|'auth-token'|'none',
 *         AuthUserName?: string,
 *         AuthPassword?: string,
 *         SslCaCertificateArn?: string,
 *         ...,
 *     },
 *     GcpMySQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CleanSourceMetadataOnMismatch?: bool,
 *         DatabaseName?: string,
 *         EventsPollInterval?: int,
 *         TargetDbType?: 'multiple-databases'|'specific-database',
 *         MaxFileSize?: int,
 *         ParallelLoadThreads?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         ServerTimezone?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ...,
 *     },
 *     TimestreamSettings?: array{
 *         DatabaseName?: string,
 *         MemoryDuration?: int,
 *         MagneticDuration?: int,
 *         CdcInsertsAndUpdates?: bool,
 *         EnableMagneticStoreWrites?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result createEventSubscription(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     EventCategories?: list<string>,
 *     SourceIds?: list<string>,
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     EventCategories?: list<string>,
 *     SourceIds?: list<string>,
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFleetAdvisorCollector(array $args = [])
 * @phpstan-method \Aws\Result createFleetAdvisorCollector(array{CollectorName?: string, Description?: string, ServiceAccessRoleArn?: string, S3BucketName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetAdvisorCollectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFleetAdvisorCollectorAsync(array{CollectorName?: string, Description?: string, ServiceAccessRoleArn?: string, S3BucketName?: string, ...} $args = [])
 * @method \Aws\Result createInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result createInstanceProfile(array{
 *     AvailabilityZone?: string,
 *     KmsKeyArn?: string,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     NetworkType?: string,
 *     InstanceProfileName?: string,
 *     Description?: string,
 *     SubnetGroupIdentifier?: string,
 *     VpcSecurityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstanceProfileAsync(array{
 *     AvailabilityZone?: string,
 *     KmsKeyArn?: string,
 *     PubliclyAccessible?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     NetworkType?: string,
 *     InstanceProfileName?: string,
 *     Description?: string,
 *     SubnetGroupIdentifier?: string,
 *     VpcSecurityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMigrationProject(array $args = [])
 * @phpstan-method \Aws\Result createMigrationProject(array{
 *     MigrationProjectName?: string,
 *     SourceDataProviderDescriptors?: list<array{
 *         DataProviderIdentifier?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         ...,
 *     }>,
 *     TargetDataProviderDescriptors?: list<array{
 *         DataProviderIdentifier?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         ...,
 *     }>,
 *     InstanceProfileIdentifier?: string,
 *     TransformationRules?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     SchemaConversionApplicationAttributes?: array{S3BucketPath?: string, S3BucketRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMigrationProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMigrationProjectAsync(array{
 *     MigrationProjectName?: string,
 *     SourceDataProviderDescriptors?: list<array{
 *         DataProviderIdentifier?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         ...,
 *     }>,
 *     TargetDataProviderDescriptors?: list<array{
 *         DataProviderIdentifier?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         ...,
 *     }>,
 *     InstanceProfileIdentifier?: string,
 *     TransformationRules?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     SchemaConversionApplicationAttributes?: array{S3BucketPath?: string, S3BucketRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReplicationConfig(array $args = [])
 * @phpstan-method \Aws\Result createReplicationConfig(array{
 *     ReplicationConfigIdentifier?: string,
 *     SourceEndpointArn?: string,
 *     TargetEndpointArn?: string,
 *     ComputeConfig?: array{
 *         AvailabilityZone?: string,
 *         DnsNameServers?: string,
 *         KmsKeyId?: string,
 *         MaxCapacityUnits?: int,
 *         MinCapacityUnits?: int,
 *         MultiAZ?: bool,
 *         PreferredMaintenanceWindow?: string,
 *         ReplicationSubnetGroupId?: string,
 *         VpcSecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     ReplicationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     TableMappings?: string,
 *     ReplicationSettings?: string,
 *     SupplementalSettings?: string,
 *     ResourceIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationConfigAsync(array{
 *     ReplicationConfigIdentifier?: string,
 *     SourceEndpointArn?: string,
 *     TargetEndpointArn?: string,
 *     ComputeConfig?: array{
 *         AvailabilityZone?: string,
 *         DnsNameServers?: string,
 *         KmsKeyId?: string,
 *         MaxCapacityUnits?: int,
 *         MinCapacityUnits?: int,
 *         MultiAZ?: bool,
 *         PreferredMaintenanceWindow?: string,
 *         ReplicationSubnetGroupId?: string,
 *         VpcSecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     ReplicationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     TableMappings?: string,
 *     ReplicationSettings?: string,
 *     SupplementalSettings?: string,
 *     ResourceIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReplicationInstance(array $args = [])
 * @phpstan-method \Aws\Result createReplicationInstance(array{
 *     ReplicationInstanceIdentifier?: string,
 *     AllocatedStorage?: int,
 *     ReplicationInstanceClass?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     AvailabilityZone?: string,
 *     ReplicationSubnetGroupIdentifier?: string,
 *     PreferredMaintenanceWindow?: string,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     KmsKeyId?: string,
 *     PubliclyAccessible?: bool,
 *     DnsNameServers?: string,
 *     ResourceIdentifier?: string,
 *     NetworkType?: string,
 *     KerberosAuthenticationSettings?: array{KeyCacheSecretId?: string, KeyCacheSecretIamArn?: string, Krb5FileContents?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicationInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationInstanceAsync(array{
 *     ReplicationInstanceIdentifier?: string,
 *     AllocatedStorage?: int,
 *     ReplicationInstanceClass?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     AvailabilityZone?: string,
 *     ReplicationSubnetGroupIdentifier?: string,
 *     PreferredMaintenanceWindow?: string,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     KmsKeyId?: string,
 *     PubliclyAccessible?: bool,
 *     DnsNameServers?: string,
 *     ResourceIdentifier?: string,
 *     NetworkType?: string,
 *     KerberosAuthenticationSettings?: array{KeyCacheSecretId?: string, KeyCacheSecretIamArn?: string, Krb5FileContents?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReplicationSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result createReplicationSubnetGroup(array{
 *     ReplicationSubnetGroupIdentifier?: string,
 *     ReplicationSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicationSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationSubnetGroupAsync(array{
 *     ReplicationSubnetGroupIdentifier?: string,
 *     ReplicationSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReplicationTask(array $args = [])
 * @phpstan-method \Aws\Result createReplicationTask(array{
 *     ReplicationTaskIdentifier?: string,
 *     SourceEndpointArn?: string,
 *     TargetEndpointArn?: string,
 *     ReplicationInstanceArn?: string,
 *     MigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     TableMappings?: string,
 *     ReplicationTaskSettings?: string,
 *     CdcStartTime?: int|string|\DateTimeInterface,
 *     CdcStartPosition?: string,
 *     CdcStopPosition?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     TaskData?: string,
 *     ResourceIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationTaskAsync(array{
 *     ReplicationTaskIdentifier?: string,
 *     SourceEndpointArn?: string,
 *     TargetEndpointArn?: string,
 *     ReplicationInstanceArn?: string,
 *     MigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     TableMappings?: string,
 *     ReplicationTaskSettings?: string,
 *     CdcStartTime?: int|string|\DateTimeInterface,
 *     CdcStartPosition?: string,
 *     CdcStopPosition?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     TaskData?: string,
 *     ResourceIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteCertificate(array{CertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array{CertificateArn?: string, ...} $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{EndpointArn?: string, ReplicationInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{EndpointArn?: string, ReplicationInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDataMigration(array $args = [])
 * @phpstan-method \Aws\Result deleteDataMigration(array{DataMigrationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataMigrationAsync(array{DataMigrationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDataProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteDataProvider(array{DataProviderIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataProviderAsync(array{DataProviderIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpoint(array{EndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array{EndpointArn?: string, ...} $args = [])
 * @method \Aws\Result deleteEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteEventSubscription(array{SubscriptionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array{SubscriptionName?: string, ...} $args = [])
 * @method \Aws\Result deleteFleetAdvisorCollector(array $args = [])
 * @phpstan-method \Aws\Result deleteFleetAdvisorCollector(array{CollectorReferencedId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetAdvisorCollectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetAdvisorCollectorAsync(array{CollectorReferencedId?: string, ...} $args = [])
 * @method \Aws\Result deleteFleetAdvisorDatabases(array $args = [])
 * @phpstan-method \Aws\Result deleteFleetAdvisorDatabases(array{DatabaseIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetAdvisorDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetAdvisorDatabasesAsync(array{DatabaseIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteInstanceProfile(array{InstanceProfileIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceProfileAsync(array{InstanceProfileIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteMigrationProject(array $args = [])
 * @phpstan-method \Aws\Result deleteMigrationProject(array{MigrationProjectIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMigrationProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMigrationProjectAsync(array{MigrationProjectIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicationConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationConfig(array{ReplicationConfigArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationConfigAsync(array{ReplicationConfigArn?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicationInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationInstance(array{ReplicationInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationInstanceAsync(array{ReplicationInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicationSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationSubnetGroup(array{ReplicationSubnetGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationSubnetGroupAsync(array{ReplicationSubnetGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicationTask(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationTask(array{ReplicationTaskArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationTaskAsync(array{ReplicationTaskArn?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicationTaskAssessmentRun(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationTaskAssessmentRun(array{ReplicationTaskAssessmentRunArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationTaskAssessmentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationTaskAssessmentRunAsync(array{ReplicationTaskAssessmentRunArn?: string, ...} $args = [])
 * @method \Aws\Result describeAccountAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeAccountAttributes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array{...} $args = [])
 * @method \Aws\Result describeApplicableIndividualAssessments(array $args = [])
 * @phpstan-method \Aws\Result describeApplicableIndividualAssessments(array{
 *     ReplicationTaskArn?: string,
 *     ReplicationInstanceArn?: string,
 *     ReplicationConfigArn?: string,
 *     SourceEngineName?: string,
 *     TargetEngineName?: string,
 *     MigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicableIndividualAssessmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicableIndividualAssessmentsAsync(array{
 *     ReplicationTaskArn?: string,
 *     ReplicationInstanceArn?: string,
 *     ReplicationConfigArn?: string,
 *     SourceEngineName?: string,
 *     TargetEngineName?: string,
 *     MigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCertificates(array $args = [])
 * @phpstan-method \Aws\Result describeCertificates(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificatesAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeConnections(array $args = [])
 * @phpstan-method \Aws\Result describeConnections(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeConversionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeConversionConfiguration(array{MigrationProjectIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConversionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConversionConfigurationAsync(array{MigrationProjectIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeDataMigrations(array $args = [])
 * @phpstan-method \Aws\Result describeDataMigrations(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     WithoutSettings?: bool,
 *     WithoutStatistics?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataMigrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataMigrationsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     WithoutSettings?: bool,
 *     WithoutStatistics?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDataProviders(array $args = [])
 * @phpstan-method \Aws\Result describeDataProviders(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataProvidersAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEndpointSettings(array $args = [])
 * @phpstan-method \Aws\Result describeEndpointSettings(array{EngineName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointSettingsAsync(array{EngineName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeEndpointTypes(array $args = [])
 * @phpstan-method \Aws\Result describeEndpointTypes(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointTypesAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEndpoints(array $args = [])
 * @phpstan-method \Aws\Result describeEndpoints(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEngineVersions(array $args = [])
 * @phpstan-method \Aws\Result describeEngineVersions(array{MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEngineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEngineVersionsAsync(array{MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeEventCategories(array $args = [])
 * @phpstan-method \Aws\Result describeEventCategories(array{SourceType?: string, Filters?: list<array{Name?: string, Values?: list<string>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array{SourceType?: string, Filters?: list<array{Name?: string, Values?: list<string>, ...}>, ...} $args = [])
 * @method \Aws\Result describeEventSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result describeEventSubscriptions(array{
 *     SubscriptionName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array{
 *     SubscriptionName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     SourceIdentifier?: string,
 *     SourceType?: 'replication-instance',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     EventCategories?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsAsync(array{
 *     SourceIdentifier?: string,
 *     SourceType?: 'replication-instance',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     EventCategories?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeExtensionPackAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeExtensionPackAssociations(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExtensionPackAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExtensionPackAssociationsAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFleetAdvisorCollectors(array $args = [])
 * @phpstan-method \Aws\Result describeFleetAdvisorCollectors(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetAdvisorCollectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetAdvisorCollectorsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFleetAdvisorDatabases(array $args = [])
 * @phpstan-method \Aws\Result describeFleetAdvisorDatabases(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetAdvisorDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetAdvisorDatabasesAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFleetAdvisorLsaAnalysis(array $args = [])
 * @phpstan-method \Aws\Result describeFleetAdvisorLsaAnalysis(array{MaxRecords?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetAdvisorLsaAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetAdvisorLsaAnalysisAsync(array{MaxRecords?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeFleetAdvisorSchemaObjectSummary(array $args = [])
 * @phpstan-method \Aws\Result describeFleetAdvisorSchemaObjectSummary(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetAdvisorSchemaObjectSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetAdvisorSchemaObjectSummaryAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFleetAdvisorSchemas(array $args = [])
 * @phpstan-method \Aws\Result describeFleetAdvisorSchemas(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetAdvisorSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetAdvisorSchemasAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInstanceProfiles(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceProfiles(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceProfilesAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMetadataModel(array $args = [])
 * @phpstan-method \Aws\Result describeMetadataModel(array{SelectionRules?: string, MigrationProjectIdentifier?: string, Origin?: 'SOURCE'|'TARGET', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetadataModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetadataModelAsync(array{SelectionRules?: string, MigrationProjectIdentifier?: string, Origin?: 'SOURCE'|'TARGET', ...} $args = [])
 * @method \Aws\Result describeMetadataModelAssessments(array $args = [])
 * @phpstan-method \Aws\Result describeMetadataModelAssessments(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetadataModelAssessmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetadataModelAssessmentsAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMetadataModelChildren(array $args = [])
 * @phpstan-method \Aws\Result describeMetadataModelChildren(array{
 *     SelectionRules?: string,
 *     MigrationProjectIdentifier?: string,
 *     Origin?: 'SOURCE'|'TARGET',
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetadataModelChildrenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetadataModelChildrenAsync(array{
 *     SelectionRules?: string,
 *     MigrationProjectIdentifier?: string,
 *     Origin?: 'SOURCE'|'TARGET',
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMetadataModelConversions(array $args = [])
 * @phpstan-method \Aws\Result describeMetadataModelConversions(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetadataModelConversionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetadataModelConversionsAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMetadataModelCreations(array $args = [])
 * @phpstan-method \Aws\Result describeMetadataModelCreations(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     MigrationProjectIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetadataModelCreationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetadataModelCreationsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     MigrationProjectIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMetadataModelExportsAsScript(array $args = [])
 * @phpstan-method \Aws\Result describeMetadataModelExportsAsScript(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetadataModelExportsAsScriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetadataModelExportsAsScriptAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMetadataModelExportsToTarget(array $args = [])
 * @phpstan-method \Aws\Result describeMetadataModelExportsToTarget(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetadataModelExportsToTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetadataModelExportsToTargetAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMetadataModelImports(array $args = [])
 * @phpstan-method \Aws\Result describeMetadataModelImports(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetadataModelImportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetadataModelImportsAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMigrationProjects(array $args = [])
 * @phpstan-method \Aws\Result describeMigrationProjects(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMigrationProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMigrationProjectsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOrderableReplicationInstances(array $args = [])
 * @phpstan-method \Aws\Result describeOrderableReplicationInstances(array{MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrderableReplicationInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrderableReplicationInstancesAsync(array{MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describePendingMaintenanceActions(array $args = [])
 * @phpstan-method \Aws\Result describePendingMaintenanceActions(array{
 *     ReplicationInstanceArn?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array{
 *     ReplicationInstanceArn?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRecommendationLimitations(array $args = [])
 * @phpstan-method \Aws\Result describeRecommendationLimitations(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecommendationLimitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecommendationLimitationsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRecommendations(array $args = [])
 * @phpstan-method \Aws\Result describeRecommendations(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecommendationsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRefreshSchemasStatus(array $args = [])
 * @phpstan-method \Aws\Result describeRefreshSchemasStatus(array{EndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRefreshSchemasStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRefreshSchemasStatusAsync(array{EndpointArn?: string, ...} $args = [])
 * @method \Aws\Result describeReplicationConfigs(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationConfigs(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationConfigsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReplicationInstanceTaskLogs(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationInstanceTaskLogs(array{ReplicationInstanceArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationInstanceTaskLogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationInstanceTaskLogsAsync(array{ReplicationInstanceArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeReplicationInstances(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationInstances(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationInstancesAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReplicationSubnetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationSubnetGroups(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationSubnetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationSubnetGroupsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReplicationTableStatistics(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationTableStatistics(array{
 *     ReplicationConfigArn?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationTableStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationTableStatisticsAsync(array{
 *     ReplicationConfigArn?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReplicationTaskAssessmentResults(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationTaskAssessmentResults(array{ReplicationTaskArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationTaskAssessmentResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationTaskAssessmentResultsAsync(array{ReplicationTaskArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeReplicationTaskAssessmentRuns(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationTaskAssessmentRuns(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationTaskAssessmentRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationTaskAssessmentRunsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReplicationTaskIndividualAssessments(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationTaskIndividualAssessments(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationTaskIndividualAssessmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationTaskIndividualAssessmentsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReplicationTasks(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationTasks(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     WithoutSettings?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationTasksAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     WithoutSettings?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReplications(array $args = [])
 * @phpstan-method \Aws\Result describeReplications(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSchemas(array $args = [])
 * @phpstan-method \Aws\Result describeSchemas(array{EndpointArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSchemasAsync(array{EndpointArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeTableStatistics(array $args = [])
 * @phpstan-method \Aws\Result describeTableStatistics(array{
 *     ReplicationTaskArn?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTableStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTableStatisticsAsync(array{
 *     ReplicationTaskArn?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportMetadataModelAssessment(array $args = [])
 * @phpstan-method \Aws\Result exportMetadataModelAssessment(array{
 *     MigrationProjectIdentifier?: string,
 *     SelectionRules?: string,
 *     FileName?: string,
 *     AssessmentReportTypes?: list<'csv'|'pdf'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportMetadataModelAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportMetadataModelAssessmentAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     SelectionRules?: string,
 *     FileName?: string,
 *     AssessmentReportTypes?: list<'csv'|'pdf'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTargetSelectionRules(array $args = [])
 * @phpstan-method \Aws\Result getTargetSelectionRules(array{MigrationProjectIdentifier?: string, SelectionRules?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTargetSelectionRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTargetSelectionRulesAsync(array{MigrationProjectIdentifier?: string, SelectionRules?: string, ...} $args = [])
 * @method \Aws\Result importCertificate(array $args = [])
 * @phpstan-method \Aws\Result importCertificate(array{
 *     CertificateIdentifier?: string,
 *     CertificatePem?: string,
 *     CertificateWallet?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     KmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importCertificateAsync(array{
 *     CertificateIdentifier?: string,
 *     CertificatePem?: string,
 *     CertificateWallet?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     KmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ResourceArnList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ResourceArnList?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyConversionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result modifyConversionConfiguration(array{MigrationProjectIdentifier?: string, ConversionConfiguration?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyConversionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyConversionConfigurationAsync(array{MigrationProjectIdentifier?: string, ConversionConfiguration?: string, ...} $args = [])
 * @method \Aws\Result modifyDataMigration(array $args = [])
 * @phpstan-method \Aws\Result modifyDataMigration(array{
 *     DataMigrationIdentifier?: string,
 *     DataMigrationName?: string,
 *     EnableCloudwatchLogs?: bool,
 *     ServiceAccessRoleArn?: string,
 *     DataMigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     SourceDataSettings?: list<array{
 *         CDCStartPosition?: string,
 *         CDCStartTime?: int|string|\DateTimeInterface,
 *         CDCStopTime?: int|string|\DateTimeInterface,
 *         SlotName?: string,
 *         ...,
 *     }>,
 *     TargetDataSettings?: list<array{TablePreparationMode?: 'do-nothing'|'drop-tables-on-target'|'truncate', ...}>,
 *     NumberOfJobs?: int,
 *     SelectionRules?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDataMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDataMigrationAsync(array{
 *     DataMigrationIdentifier?: string,
 *     DataMigrationName?: string,
 *     EnableCloudwatchLogs?: bool,
 *     ServiceAccessRoleArn?: string,
 *     DataMigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     SourceDataSettings?: list<array{
 *         CDCStartPosition?: string,
 *         CDCStartTime?: int|string|\DateTimeInterface,
 *         CDCStopTime?: int|string|\DateTimeInterface,
 *         SlotName?: string,
 *         ...,
 *     }>,
 *     TargetDataSettings?: list<array{TablePreparationMode?: 'do-nothing'|'drop-tables-on-target'|'truncate', ...}>,
 *     NumberOfJobs?: int,
 *     SelectionRules?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDataProvider(array $args = [])
 * @phpstan-method \Aws\Result modifyDataProvider(array{
 *     DataProviderIdentifier?: string,
 *     DataProviderName?: string,
 *     Description?: string,
 *     Engine?: string,
 *     Virtual?: bool,
 *     ExactSettings?: bool,
 *     Settings?: array{
 *         RedshiftSettings?: array{ServerName?: string, Port?: int, DatabaseName?: string, S3Path?: string, S3AccessRoleArn?: string, ...},
 *         PostgreSqlSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         MySqlSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         OracleSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             AsmServer?: string,
 *             SecretsManagerOracleAsmSecretId?: string,
 *             SecretsManagerOracleAsmAccessRoleArn?: string,
 *             SecretsManagerSecurityDbEncryptionSecretId?: string,
 *             SecretsManagerSecurityDbEncryptionAccessRoleArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         SybaseAseSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             EncryptPassword?: bool,
 *             CertificateArn?: string,
 *             ...,
 *         },
 *         MicrosoftSqlServerSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         DocDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             ...,
 *         },
 *         MariaDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         IbmDb2LuwSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             EncryptionAlgorithm?: int,
 *             SecurityMechanism?: int,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         IbmDb2zOsSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         MongoDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             AuthType?: 'no'|'password',
 *             AuthSource?: string,
 *             AuthMechanism?: 'default'|'mongodb_cr'|'scram_sha_1',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDataProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDataProviderAsync(array{
 *     DataProviderIdentifier?: string,
 *     DataProviderName?: string,
 *     Description?: string,
 *     Engine?: string,
 *     Virtual?: bool,
 *     ExactSettings?: bool,
 *     Settings?: array{
 *         RedshiftSettings?: array{ServerName?: string, Port?: int, DatabaseName?: string, S3Path?: string, S3AccessRoleArn?: string, ...},
 *         PostgreSqlSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         MySqlSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         OracleSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             AsmServer?: string,
 *             SecretsManagerOracleAsmSecretId?: string,
 *             SecretsManagerOracleAsmAccessRoleArn?: string,
 *             SecretsManagerSecurityDbEncryptionSecretId?: string,
 *             SecretsManagerSecurityDbEncryptionAccessRoleArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         SybaseAseSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             EncryptPassword?: bool,
 *             CertificateArn?: string,
 *             ...,
 *         },
 *         MicrosoftSqlServerSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         DocDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             ...,
 *         },
 *         MariaDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         IbmDb2LuwSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             EncryptionAlgorithm?: int,
 *             SecurityMechanism?: int,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         IbmDb2zOsSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             S3Path?: string,
 *             S3AccessRoleArn?: string,
 *             ...,
 *         },
 *         MongoDbSettings?: array{
 *             ServerName?: string,
 *             Port?: int,
 *             DatabaseName?: string,
 *             SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *             CertificateArn?: string,
 *             AuthType?: 'no'|'password',
 *             AuthSource?: string,
 *             AuthMechanism?: 'default'|'mongodb_cr'|'scram_sha_1',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyEndpoint(array $args = [])
 * @phpstan-method \Aws\Result modifyEndpoint(array{
 *     EndpointArn?: string,
 *     EndpointIdentifier?: string,
 *     EndpointType?: 'source'|'target',
 *     EngineName?: string,
 *     Username?: string,
 *     Password?: string,
 *     ServerName?: string,
 *     Port?: int,
 *     DatabaseName?: string,
 *     ExtraConnectionAttributes?: string,
 *     CertificateArn?: string,
 *     SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *     ServiceAccessRoleArn?: string,
 *     ExternalTableDefinition?: string,
 *     DynamoDbSettings?: array{ServiceAccessRoleArn?: string, ...},
 *     S3Settings?: array{
 *         ServiceAccessRoleArn?: string,
 *         ExternalTableDefinition?: string,
 *         CsvRowDelimiter?: string,
 *         CsvDelimiter?: string,
 *         BucketFolder?: string,
 *         BucketName?: string,
 *         CompressionType?: 'gzip'|'none',
 *         EncryptionMode?: 'sse-kms'|'sse-s3',
 *         ServerSideEncryptionKmsKeyId?: string,
 *         DataFormat?: 'csv'|'parquet',
 *         EncodingType?: 'plain'|'plain-dictionary'|'rle-dictionary',
 *         DictPageSizeLimit?: int,
 *         RowGroupLength?: int,
 *         DataPageSize?: int,
 *         ParquetVersion?: 'parquet-1-0'|'parquet-2-0',
 *         EnableStatistics?: bool,
 *         IncludeOpForFullLoad?: bool,
 *         CdcInsertsOnly?: bool,
 *         TimestampColumnName?: string,
 *         ParquetTimestampInMillisecond?: bool,
 *         CdcInsertsAndUpdates?: bool,
 *         DatePartitionEnabled?: bool,
 *         DatePartitionSequence?: 'DDMMYYYY'|'MMYYYYDD'|'YYYYMM'|'YYYYMMDD'|'YYYYMMDDHH',
 *         DatePartitionDelimiter?: 'DASH'|'NONE'|'SLASH'|'UNDERSCORE',
 *         UseCsvNoSupValue?: bool,
 *         CsvNoSupValue?: string,
 *         PreserveTransactions?: bool,
 *         CdcPath?: string,
 *         UseTaskStartTimeForFullLoadTimestamp?: bool,
 *         CannedAclForObjects?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'none'|'private'|'public-read'|'public-read-write',
 *         AddColumnName?: bool,
 *         CdcMaxBatchInterval?: int,
 *         CdcMinFileSize?: int,
 *         CsvNullValue?: string,
 *         IgnoreHeaderRows?: int,
 *         MaxFileSize?: int,
 *         Rfc4180?: bool,
 *         DatePartitionTimezone?: string,
 *         AddTrailingPaddingCharacter?: bool,
 *         ExpectedBucketOwner?: string,
 *         GlueCatalogGeneration?: bool,
 *         ...,
 *     },
 *     DmsTransferSettings?: array{ServiceAccessRoleArn?: string, BucketName?: string, ...},
 *     MongoDbSettings?: array{
 *         Username?: string,
 *         Password?: string,
 *         ServerName?: string,
 *         Port?: int,
 *         DatabaseName?: string,
 *         AuthType?: 'no'|'password',
 *         AuthMechanism?: 'default'|'mongodb_cr'|'scram_sha_1',
 *         NestingLevel?: 'none'|'one',
 *         ExtractDocId?: string,
 *         DocsToInvestigate?: string,
 *         AuthSource?: string,
 *         KmsKeyId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         UseUpdateLookUp?: bool,
 *         ReplicateShardCollections?: bool,
 *         ...,
 *     },
 *     KinesisSettings?: array{
 *         StreamArn?: string,
 *         MessageFormat?: 'json'|'json-unformatted',
 *         ServiceAccessRoleArn?: string,
 *         IncludeTransactionDetails?: bool,
 *         IncludePartitionValue?: bool,
 *         PartitionIncludeSchemaTable?: bool,
 *         IncludeTableAlterOperations?: bool,
 *         IncludeControlDetails?: bool,
 *         IncludeNullAndEmpty?: bool,
 *         NoHexPrefix?: bool,
 *         UseLargeIntegerValue?: bool,
 *         ...,
 *     },
 *     KafkaSettings?: array{
 *         Broker?: string,
 *         Topic?: string,
 *         MessageFormat?: 'json'|'json-unformatted',
 *         IncludeTransactionDetails?: bool,
 *         IncludePartitionValue?: bool,
 *         PartitionIncludeSchemaTable?: bool,
 *         IncludeTableAlterOperations?: bool,
 *         IncludeControlDetails?: bool,
 *         MessageMaxBytes?: int,
 *         IncludeNullAndEmpty?: bool,
 *         SecurityProtocol?: 'plaintext'|'sasl-ssl'|'ssl-authentication'|'ssl-encryption',
 *         SslClientCertificateArn?: string,
 *         SslClientKeyArn?: string,
 *         SslClientKeyPassword?: string,
 *         SslCaCertificateArn?: string,
 *         SaslUsername?: string,
 *         SaslPassword?: string,
 *         NoHexPrefix?: bool,
 *         SaslMechanism?: 'plain'|'scram-sha-512',
 *         SslEndpointIdentificationAlgorithm?: 'https'|'none',
 *         UseLargeIntegerValue?: bool,
 *         ...,
 *     },
 *     ElasticsearchSettings?: array{
 *         ServiceAccessRoleArn?: string,
 *         EndpointUri?: string,
 *         FullLoadErrorPercentage?: int,
 *         ErrorRetryDuration?: int,
 *         UseNewMappingType?: bool,
 *         ...,
 *     },
 *     NeptuneSettings?: array{
 *         ServiceAccessRoleArn?: string,
 *         S3BucketName?: string,
 *         S3BucketFolder?: string,
 *         ErrorRetryDuration?: int,
 *         MaxFileSize?: int,
 *         MaxRetryCount?: int,
 *         IamAuthEnabled?: bool,
 *         ...,
 *     },
 *     RedshiftSettings?: array{
 *         AcceptAnyDate?: bool,
 *         AfterConnectScript?: string,
 *         BucketFolder?: string,
 *         BucketName?: string,
 *         CaseSensitiveNames?: bool,
 *         CompUpdate?: bool,
 *         ConnectionTimeout?: int,
 *         DatabaseName?: string,
 *         DateFormat?: string,
 *         EmptyAsNull?: bool,
 *         EncryptionMode?: 'sse-kms'|'sse-s3',
 *         ExplicitIds?: bool,
 *         FileTransferUploadStreams?: int,
 *         LoadTimeout?: int,
 *         MaxFileSize?: int,
 *         Password?: string,
 *         Port?: int,
 *         RemoveQuotes?: bool,
 *         ReplaceInvalidChars?: string,
 *         ReplaceChars?: string,
 *         ServerName?: string,
 *         ServiceAccessRoleArn?: string,
 *         ServerSideEncryptionKmsKeyId?: string,
 *         TimeFormat?: string,
 *         TrimBlanks?: bool,
 *         TruncateColumns?: bool,
 *         Username?: string,
 *         WriteBufferSize?: int,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         MapBooleanAsBoolean?: bool,
 *         ...,
 *     },
 *     PostgreSQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CaptureDdls?: bool,
 *         MaxFileSize?: int,
 *         DatabaseName?: string,
 *         DdlArtifactsSchema?: string,
 *         ExecuteTimeout?: int,
 *         FailTasksOnLobTruncation?: bool,
 *         HeartbeatEnable?: bool,
 *         HeartbeatSchema?: string,
 *         HeartbeatFrequency?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         Username?: string,
 *         SlotName?: string,
 *         PluginName?: 'no-preference'|'pglogical'|'test-decoding',
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         MapBooleanAsBoolean?: bool,
 *         MapJsonbAsClob?: bool,
 *         MapLongVarcharAs?: 'clob'|'nclob'|'wstring',
 *         DatabaseMode?: 'babelfish'|'default',
 *         BabelfishDatabaseName?: string,
 *         DisableUnicodeSourceFilter?: bool,
 *         ServiceAccessRoleArn?: string,
 *         AuthenticationMethod?: 'iam'|'password',
 *         ...,
 *     },
 *     MySQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CleanSourceMetadataOnMismatch?: bool,
 *         DatabaseName?: string,
 *         EventsPollInterval?: int,
 *         TargetDbType?: 'multiple-databases'|'specific-database',
 *         MaxFileSize?: int,
 *         ParallelLoadThreads?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         ServerTimezone?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ExecuteTimeout?: int,
 *         ServiceAccessRoleArn?: string,
 *         AuthenticationMethod?: 'iam'|'password',
 *         ...,
 *     },
 *     OracleSettings?: array{
 *         AddSupplementalLogging?: bool,
 *         ArchivedLogDestId?: int,
 *         AdditionalArchivedLogDestId?: int,
 *         ExtraArchivedLogDestIds?: list<int>,
 *         AllowSelectNestedTables?: bool,
 *         ParallelAsmReadThreads?: int,
 *         ReadAheadBlocks?: int,
 *         AccessAlternateDirectly?: bool,
 *         UseAlternateFolderForOnline?: bool,
 *         OraclePathPrefix?: string,
 *         UsePathPrefix?: string,
 *         ReplacePathPrefix?: bool,
 *         EnableHomogenousTablespace?: bool,
 *         DirectPathNoLog?: bool,
 *         ArchivedLogsOnly?: bool,
 *         AsmPassword?: string,
 *         AsmServer?: string,
 *         AsmUser?: string,
 *         CharLengthSemantics?: 'byte'|'char'|'default',
 *         DatabaseName?: string,
 *         DirectPathParallelLoad?: bool,
 *         FailTasksOnLobTruncation?: bool,
 *         NumberDatatypeScale?: int,
 *         Password?: string,
 *         Port?: int,
 *         ReadTableSpaceName?: bool,
 *         RetryInterval?: int,
 *         SecurityDbEncryption?: string,
 *         SecurityDbEncryptionName?: string,
 *         ServerName?: string,
 *         SpatialDataOptionToGeoJsonFunctionName?: string,
 *         StandbyDelayTime?: int,
 *         Username?: string,
 *         UseBFile?: bool,
 *         UseDirectPathFullLoad?: bool,
 *         UseLogminerReader?: bool,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerOracleAsmAccessRoleArn?: string,
 *         SecretsManagerOracleAsmSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         ConvertTimestampWithZoneToUTC?: bool,
 *         OpenTransactionWindow?: int,
 *         AuthenticationMethod?: 'kerberos'|'password',
 *         ...,
 *     },
 *     SybaseSettings?: array{
 *         DatabaseName?: string,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ...,
 *     },
 *     MicrosoftSQLServerSettings?: array{
 *         Port?: int,
 *         BcpPacketSize?: int,
 *         DatabaseName?: string,
 *         ControlTablesFileGroup?: string,
 *         Password?: string,
 *         QuerySingleAlwaysOnNode?: bool,
 *         ReadBackupOnly?: bool,
 *         SafeguardPolicy?: 'exclusive-automatic-truncation'|'rely-on-sql-server-replication-agent'|'shared-automatic-truncation',
 *         ServerName?: string,
 *         Username?: string,
 *         UseBcpFullLoad?: bool,
 *         UseThirdPartyBackupDevice?: bool,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         TlogAccessMode?: 'BackupOnly'|'PreferBackup'|'PreferTlog'|'TlogOnly',
 *         ForceLobLookup?: bool,
 *         AuthenticationMethod?: 'kerberos'|'password',
 *         ...,
 *     },
 *     IBMDb2Settings?: array{
 *         DatabaseName?: string,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         SetDataCaptureChanges?: bool,
 *         CurrentLsn?: string,
 *         MaxKBytesPerRead?: int,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         LoadTimeout?: int,
 *         WriteBufferSize?: int,
 *         MaxFileSize?: int,
 *         KeepCsvFiles?: bool,
 *         ...,
 *     },
 *     DocDbSettings?: array{
 *         Username?: string,
 *         Password?: string,
 *         ServerName?: string,
 *         Port?: int,
 *         DatabaseName?: string,
 *         NestingLevel?: 'none'|'one',
 *         ExtractDocId?: bool,
 *         DocsToInvestigate?: int,
 *         KmsKeyId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         UseUpdateLookUp?: bool,
 *         ReplicateShardCollections?: bool,
 *         ...,
 *     },
 *     RedisSettings?: array{
 *         ServerName?: string,
 *         Port?: int,
 *         SslSecurityProtocol?: 'plaintext'|'ssl-encryption',
 *         AuthType?: 'auth-role'|'auth-token'|'none',
 *         AuthUserName?: string,
 *         AuthPassword?: string,
 *         SslCaCertificateArn?: string,
 *         ...,
 *     },
 *     ExactSettings?: bool,
 *     GcpMySQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CleanSourceMetadataOnMismatch?: bool,
 *         DatabaseName?: string,
 *         EventsPollInterval?: int,
 *         TargetDbType?: 'multiple-databases'|'specific-database',
 *         MaxFileSize?: int,
 *         ParallelLoadThreads?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         ServerTimezone?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ...,
 *     },
 *     TimestreamSettings?: array{
 *         DatabaseName?: string,
 *         MemoryDuration?: int,
 *         MagneticDuration?: int,
 *         CdcInsertsAndUpdates?: bool,
 *         EnableMagneticStoreWrites?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyEndpointAsync(array{
 *     EndpointArn?: string,
 *     EndpointIdentifier?: string,
 *     EndpointType?: 'source'|'target',
 *     EngineName?: string,
 *     Username?: string,
 *     Password?: string,
 *     ServerName?: string,
 *     Port?: int,
 *     DatabaseName?: string,
 *     ExtraConnectionAttributes?: string,
 *     CertificateArn?: string,
 *     SslMode?: 'none'|'require'|'verify-ca'|'verify-full',
 *     ServiceAccessRoleArn?: string,
 *     ExternalTableDefinition?: string,
 *     DynamoDbSettings?: array{ServiceAccessRoleArn?: string, ...},
 *     S3Settings?: array{
 *         ServiceAccessRoleArn?: string,
 *         ExternalTableDefinition?: string,
 *         CsvRowDelimiter?: string,
 *         CsvDelimiter?: string,
 *         BucketFolder?: string,
 *         BucketName?: string,
 *         CompressionType?: 'gzip'|'none',
 *         EncryptionMode?: 'sse-kms'|'sse-s3',
 *         ServerSideEncryptionKmsKeyId?: string,
 *         DataFormat?: 'csv'|'parquet',
 *         EncodingType?: 'plain'|'plain-dictionary'|'rle-dictionary',
 *         DictPageSizeLimit?: int,
 *         RowGroupLength?: int,
 *         DataPageSize?: int,
 *         ParquetVersion?: 'parquet-1-0'|'parquet-2-0',
 *         EnableStatistics?: bool,
 *         IncludeOpForFullLoad?: bool,
 *         CdcInsertsOnly?: bool,
 *         TimestampColumnName?: string,
 *         ParquetTimestampInMillisecond?: bool,
 *         CdcInsertsAndUpdates?: bool,
 *         DatePartitionEnabled?: bool,
 *         DatePartitionSequence?: 'DDMMYYYY'|'MMYYYYDD'|'YYYYMM'|'YYYYMMDD'|'YYYYMMDDHH',
 *         DatePartitionDelimiter?: 'DASH'|'NONE'|'SLASH'|'UNDERSCORE',
 *         UseCsvNoSupValue?: bool,
 *         CsvNoSupValue?: string,
 *         PreserveTransactions?: bool,
 *         CdcPath?: string,
 *         UseTaskStartTimeForFullLoadTimestamp?: bool,
 *         CannedAclForObjects?: 'authenticated-read'|'aws-exec-read'|'bucket-owner-full-control'|'bucket-owner-read'|'none'|'private'|'public-read'|'public-read-write',
 *         AddColumnName?: bool,
 *         CdcMaxBatchInterval?: int,
 *         CdcMinFileSize?: int,
 *         CsvNullValue?: string,
 *         IgnoreHeaderRows?: int,
 *         MaxFileSize?: int,
 *         Rfc4180?: bool,
 *         DatePartitionTimezone?: string,
 *         AddTrailingPaddingCharacter?: bool,
 *         ExpectedBucketOwner?: string,
 *         GlueCatalogGeneration?: bool,
 *         ...,
 *     },
 *     DmsTransferSettings?: array{ServiceAccessRoleArn?: string, BucketName?: string, ...},
 *     MongoDbSettings?: array{
 *         Username?: string,
 *         Password?: string,
 *         ServerName?: string,
 *         Port?: int,
 *         DatabaseName?: string,
 *         AuthType?: 'no'|'password',
 *         AuthMechanism?: 'default'|'mongodb_cr'|'scram_sha_1',
 *         NestingLevel?: 'none'|'one',
 *         ExtractDocId?: string,
 *         DocsToInvestigate?: string,
 *         AuthSource?: string,
 *         KmsKeyId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         UseUpdateLookUp?: bool,
 *         ReplicateShardCollections?: bool,
 *         ...,
 *     },
 *     KinesisSettings?: array{
 *         StreamArn?: string,
 *         MessageFormat?: 'json'|'json-unformatted',
 *         ServiceAccessRoleArn?: string,
 *         IncludeTransactionDetails?: bool,
 *         IncludePartitionValue?: bool,
 *         PartitionIncludeSchemaTable?: bool,
 *         IncludeTableAlterOperations?: bool,
 *         IncludeControlDetails?: bool,
 *         IncludeNullAndEmpty?: bool,
 *         NoHexPrefix?: bool,
 *         UseLargeIntegerValue?: bool,
 *         ...,
 *     },
 *     KafkaSettings?: array{
 *         Broker?: string,
 *         Topic?: string,
 *         MessageFormat?: 'json'|'json-unformatted',
 *         IncludeTransactionDetails?: bool,
 *         IncludePartitionValue?: bool,
 *         PartitionIncludeSchemaTable?: bool,
 *         IncludeTableAlterOperations?: bool,
 *         IncludeControlDetails?: bool,
 *         MessageMaxBytes?: int,
 *         IncludeNullAndEmpty?: bool,
 *         SecurityProtocol?: 'plaintext'|'sasl-ssl'|'ssl-authentication'|'ssl-encryption',
 *         SslClientCertificateArn?: string,
 *         SslClientKeyArn?: string,
 *         SslClientKeyPassword?: string,
 *         SslCaCertificateArn?: string,
 *         SaslUsername?: string,
 *         SaslPassword?: string,
 *         NoHexPrefix?: bool,
 *         SaslMechanism?: 'plain'|'scram-sha-512',
 *         SslEndpointIdentificationAlgorithm?: 'https'|'none',
 *         UseLargeIntegerValue?: bool,
 *         ...,
 *     },
 *     ElasticsearchSettings?: array{
 *         ServiceAccessRoleArn?: string,
 *         EndpointUri?: string,
 *         FullLoadErrorPercentage?: int,
 *         ErrorRetryDuration?: int,
 *         UseNewMappingType?: bool,
 *         ...,
 *     },
 *     NeptuneSettings?: array{
 *         ServiceAccessRoleArn?: string,
 *         S3BucketName?: string,
 *         S3BucketFolder?: string,
 *         ErrorRetryDuration?: int,
 *         MaxFileSize?: int,
 *         MaxRetryCount?: int,
 *         IamAuthEnabled?: bool,
 *         ...,
 *     },
 *     RedshiftSettings?: array{
 *         AcceptAnyDate?: bool,
 *         AfterConnectScript?: string,
 *         BucketFolder?: string,
 *         BucketName?: string,
 *         CaseSensitiveNames?: bool,
 *         CompUpdate?: bool,
 *         ConnectionTimeout?: int,
 *         DatabaseName?: string,
 *         DateFormat?: string,
 *         EmptyAsNull?: bool,
 *         EncryptionMode?: 'sse-kms'|'sse-s3',
 *         ExplicitIds?: bool,
 *         FileTransferUploadStreams?: int,
 *         LoadTimeout?: int,
 *         MaxFileSize?: int,
 *         Password?: string,
 *         Port?: int,
 *         RemoveQuotes?: bool,
 *         ReplaceInvalidChars?: string,
 *         ReplaceChars?: string,
 *         ServerName?: string,
 *         ServiceAccessRoleArn?: string,
 *         ServerSideEncryptionKmsKeyId?: string,
 *         TimeFormat?: string,
 *         TrimBlanks?: bool,
 *         TruncateColumns?: bool,
 *         Username?: string,
 *         WriteBufferSize?: int,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         MapBooleanAsBoolean?: bool,
 *         ...,
 *     },
 *     PostgreSQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CaptureDdls?: bool,
 *         MaxFileSize?: int,
 *         DatabaseName?: string,
 *         DdlArtifactsSchema?: string,
 *         ExecuteTimeout?: int,
 *         FailTasksOnLobTruncation?: bool,
 *         HeartbeatEnable?: bool,
 *         HeartbeatSchema?: string,
 *         HeartbeatFrequency?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         Username?: string,
 *         SlotName?: string,
 *         PluginName?: 'no-preference'|'pglogical'|'test-decoding',
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         MapBooleanAsBoolean?: bool,
 *         MapJsonbAsClob?: bool,
 *         MapLongVarcharAs?: 'clob'|'nclob'|'wstring',
 *         DatabaseMode?: 'babelfish'|'default',
 *         BabelfishDatabaseName?: string,
 *         DisableUnicodeSourceFilter?: bool,
 *         ServiceAccessRoleArn?: string,
 *         AuthenticationMethod?: 'iam'|'password',
 *         ...,
 *     },
 *     MySQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CleanSourceMetadataOnMismatch?: bool,
 *         DatabaseName?: string,
 *         EventsPollInterval?: int,
 *         TargetDbType?: 'multiple-databases'|'specific-database',
 *         MaxFileSize?: int,
 *         ParallelLoadThreads?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         ServerTimezone?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ExecuteTimeout?: int,
 *         ServiceAccessRoleArn?: string,
 *         AuthenticationMethod?: 'iam'|'password',
 *         ...,
 *     },
 *     OracleSettings?: array{
 *         AddSupplementalLogging?: bool,
 *         ArchivedLogDestId?: int,
 *         AdditionalArchivedLogDestId?: int,
 *         ExtraArchivedLogDestIds?: list<int>,
 *         AllowSelectNestedTables?: bool,
 *         ParallelAsmReadThreads?: int,
 *         ReadAheadBlocks?: int,
 *         AccessAlternateDirectly?: bool,
 *         UseAlternateFolderForOnline?: bool,
 *         OraclePathPrefix?: string,
 *         UsePathPrefix?: string,
 *         ReplacePathPrefix?: bool,
 *         EnableHomogenousTablespace?: bool,
 *         DirectPathNoLog?: bool,
 *         ArchivedLogsOnly?: bool,
 *         AsmPassword?: string,
 *         AsmServer?: string,
 *         AsmUser?: string,
 *         CharLengthSemantics?: 'byte'|'char'|'default',
 *         DatabaseName?: string,
 *         DirectPathParallelLoad?: bool,
 *         FailTasksOnLobTruncation?: bool,
 *         NumberDatatypeScale?: int,
 *         Password?: string,
 *         Port?: int,
 *         ReadTableSpaceName?: bool,
 *         RetryInterval?: int,
 *         SecurityDbEncryption?: string,
 *         SecurityDbEncryptionName?: string,
 *         ServerName?: string,
 *         SpatialDataOptionToGeoJsonFunctionName?: string,
 *         StandbyDelayTime?: int,
 *         Username?: string,
 *         UseBFile?: bool,
 *         UseDirectPathFullLoad?: bool,
 *         UseLogminerReader?: bool,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerOracleAsmAccessRoleArn?: string,
 *         SecretsManagerOracleAsmSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         ConvertTimestampWithZoneToUTC?: bool,
 *         OpenTransactionWindow?: int,
 *         AuthenticationMethod?: 'kerberos'|'password',
 *         ...,
 *     },
 *     SybaseSettings?: array{
 *         DatabaseName?: string,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ...,
 *     },
 *     MicrosoftSQLServerSettings?: array{
 *         Port?: int,
 *         BcpPacketSize?: int,
 *         DatabaseName?: string,
 *         ControlTablesFileGroup?: string,
 *         Password?: string,
 *         QuerySingleAlwaysOnNode?: bool,
 *         ReadBackupOnly?: bool,
 *         SafeguardPolicy?: 'exclusive-automatic-truncation'|'rely-on-sql-server-replication-agent'|'shared-automatic-truncation',
 *         ServerName?: string,
 *         Username?: string,
 *         UseBcpFullLoad?: bool,
 *         UseThirdPartyBackupDevice?: bool,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         TrimSpaceInChar?: bool,
 *         TlogAccessMode?: 'BackupOnly'|'PreferBackup'|'PreferTlog'|'TlogOnly',
 *         ForceLobLookup?: bool,
 *         AuthenticationMethod?: 'kerberos'|'password',
 *         ...,
 *     },
 *     IBMDb2Settings?: array{
 *         DatabaseName?: string,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         SetDataCaptureChanges?: bool,
 *         CurrentLsn?: string,
 *         MaxKBytesPerRead?: int,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         LoadTimeout?: int,
 *         WriteBufferSize?: int,
 *         MaxFileSize?: int,
 *         KeepCsvFiles?: bool,
 *         ...,
 *     },
 *     DocDbSettings?: array{
 *         Username?: string,
 *         Password?: string,
 *         ServerName?: string,
 *         Port?: int,
 *         DatabaseName?: string,
 *         NestingLevel?: 'none'|'one',
 *         ExtractDocId?: bool,
 *         DocsToInvestigate?: int,
 *         KmsKeyId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         UseUpdateLookUp?: bool,
 *         ReplicateShardCollections?: bool,
 *         ...,
 *     },
 *     RedisSettings?: array{
 *         ServerName?: string,
 *         Port?: int,
 *         SslSecurityProtocol?: 'plaintext'|'ssl-encryption',
 *         AuthType?: 'auth-role'|'auth-token'|'none',
 *         AuthUserName?: string,
 *         AuthPassword?: string,
 *         SslCaCertificateArn?: string,
 *         ...,
 *     },
 *     ExactSettings?: bool,
 *     GcpMySQLSettings?: array{
 *         AfterConnectScript?: string,
 *         CleanSourceMetadataOnMismatch?: bool,
 *         DatabaseName?: string,
 *         EventsPollInterval?: int,
 *         TargetDbType?: 'multiple-databases'|'specific-database',
 *         MaxFileSize?: int,
 *         ParallelLoadThreads?: int,
 *         Password?: string,
 *         Port?: int,
 *         ServerName?: string,
 *         ServerTimezone?: string,
 *         Username?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         SecretsManagerSecretId?: string,
 *         ...,
 *     },
 *     TimestreamSettings?: array{
 *         DatabaseName?: string,
 *         MemoryDuration?: int,
 *         MagneticDuration?: int,
 *         CdcInsertsAndUpdates?: bool,
 *         EnableMagneticStoreWrites?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result modifyEventSubscription(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     EventCategories?: list<string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     EventCategories?: list<string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result modifyInstanceProfile(array{
 *     InstanceProfileIdentifier?: string,
 *     AvailabilityZone?: string,
 *     KmsKeyArn?: string,
 *     PubliclyAccessible?: bool,
 *     NetworkType?: string,
 *     InstanceProfileName?: string,
 *     Description?: string,
 *     SubnetGroupIdentifier?: string,
 *     VpcSecurityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyInstanceProfileAsync(array{
 *     InstanceProfileIdentifier?: string,
 *     AvailabilityZone?: string,
 *     KmsKeyArn?: string,
 *     PubliclyAccessible?: bool,
 *     NetworkType?: string,
 *     InstanceProfileName?: string,
 *     Description?: string,
 *     SubnetGroupIdentifier?: string,
 *     VpcSecurityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyMigrationProject(array $args = [])
 * @phpstan-method \Aws\Result modifyMigrationProject(array{
 *     MigrationProjectIdentifier?: string,
 *     MigrationProjectName?: string,
 *     SourceDataProviderDescriptors?: list<array{
 *         DataProviderIdentifier?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         ...,
 *     }>,
 *     TargetDataProviderDescriptors?: list<array{
 *         DataProviderIdentifier?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         ...,
 *     }>,
 *     InstanceProfileIdentifier?: string,
 *     TransformationRules?: string,
 *     Description?: string,
 *     SchemaConversionApplicationAttributes?: array{S3BucketPath?: string, S3BucketRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyMigrationProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyMigrationProjectAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     MigrationProjectName?: string,
 *     SourceDataProviderDescriptors?: list<array{
 *         DataProviderIdentifier?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         ...,
 *     }>,
 *     TargetDataProviderDescriptors?: list<array{
 *         DataProviderIdentifier?: string,
 *         SecretsManagerSecretId?: string,
 *         SecretsManagerAccessRoleArn?: string,
 *         ...,
 *     }>,
 *     InstanceProfileIdentifier?: string,
 *     TransformationRules?: string,
 *     Description?: string,
 *     SchemaConversionApplicationAttributes?: array{S3BucketPath?: string, S3BucketRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyReplicationConfig(array $args = [])
 * @phpstan-method \Aws\Result modifyReplicationConfig(array{
 *     ReplicationConfigArn?: string,
 *     ReplicationConfigIdentifier?: string,
 *     ReplicationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     TableMappings?: string,
 *     ReplicationSettings?: string,
 *     SupplementalSettings?: string,
 *     ComputeConfig?: array{
 *         AvailabilityZone?: string,
 *         DnsNameServers?: string,
 *         KmsKeyId?: string,
 *         MaxCapacityUnits?: int,
 *         MinCapacityUnits?: int,
 *         MultiAZ?: bool,
 *         PreferredMaintenanceWindow?: string,
 *         ReplicationSubnetGroupId?: string,
 *         VpcSecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     SourceEndpointArn?: string,
 *     TargetEndpointArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyReplicationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyReplicationConfigAsync(array{
 *     ReplicationConfigArn?: string,
 *     ReplicationConfigIdentifier?: string,
 *     ReplicationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     TableMappings?: string,
 *     ReplicationSettings?: string,
 *     SupplementalSettings?: string,
 *     ComputeConfig?: array{
 *         AvailabilityZone?: string,
 *         DnsNameServers?: string,
 *         KmsKeyId?: string,
 *         MaxCapacityUnits?: int,
 *         MinCapacityUnits?: int,
 *         MultiAZ?: bool,
 *         PreferredMaintenanceWindow?: string,
 *         ReplicationSubnetGroupId?: string,
 *         VpcSecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     SourceEndpointArn?: string,
 *     TargetEndpointArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyReplicationInstance(array $args = [])
 * @phpstan-method \Aws\Result modifyReplicationInstance(array{
 *     ReplicationInstanceArn?: string,
 *     AllocatedStorage?: int,
 *     ApplyImmediately?: bool,
 *     ReplicationInstanceClass?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     ReplicationInstanceIdentifier?: string,
 *     NetworkType?: string,
 *     KerberosAuthenticationSettings?: array{KeyCacheSecretId?: string, KeyCacheSecretIamArn?: string, Krb5FileContents?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyReplicationInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyReplicationInstanceAsync(array{
 *     ReplicationInstanceArn?: string,
 *     AllocatedStorage?: int,
 *     ApplyImmediately?: bool,
 *     ReplicationInstanceClass?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     MultiAZ?: bool,
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     AutoMinorVersionUpgrade?: bool,
 *     ReplicationInstanceIdentifier?: string,
 *     NetworkType?: string,
 *     KerberosAuthenticationSettings?: array{KeyCacheSecretId?: string, KeyCacheSecretIamArn?: string, Krb5FileContents?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyReplicationSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyReplicationSubnetGroup(array{
 *     ReplicationSubnetGroupIdentifier?: string,
 *     ReplicationSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyReplicationSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyReplicationSubnetGroupAsync(array{
 *     ReplicationSubnetGroupIdentifier?: string,
 *     ReplicationSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyReplicationTask(array $args = [])
 * @phpstan-method \Aws\Result modifyReplicationTask(array{
 *     ReplicationTaskArn?: string,
 *     ReplicationTaskIdentifier?: string,
 *     MigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     TableMappings?: string,
 *     ReplicationTaskSettings?: string,
 *     CdcStartTime?: int|string|\DateTimeInterface,
 *     CdcStartPosition?: string,
 *     CdcStopPosition?: string,
 *     TaskData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyReplicationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyReplicationTaskAsync(array{
 *     ReplicationTaskArn?: string,
 *     ReplicationTaskIdentifier?: string,
 *     MigrationType?: 'cdc'|'full-load'|'full-load-and-cdc',
 *     TableMappings?: string,
 *     ReplicationTaskSettings?: string,
 *     CdcStartTime?: int|string|\DateTimeInterface,
 *     CdcStartPosition?: string,
 *     CdcStopPosition?: string,
 *     TaskData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result moveReplicationTask(array $args = [])
 * @phpstan-method \Aws\Result moveReplicationTask(array{ReplicationTaskArn?: string, TargetReplicationInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise moveReplicationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise moveReplicationTaskAsync(array{ReplicationTaskArn?: string, TargetReplicationInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result rebootReplicationInstance(array $args = [])
 * @phpstan-method \Aws\Result rebootReplicationInstance(array{ReplicationInstanceArn?: string, ForceFailover?: bool, ForcePlannedFailover?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootReplicationInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootReplicationInstanceAsync(array{ReplicationInstanceArn?: string, ForceFailover?: bool, ForcePlannedFailover?: bool, ...} $args = [])
 * @method \Aws\Result refreshSchemas(array $args = [])
 * @phpstan-method \Aws\Result refreshSchemas(array{EndpointArn?: string, ReplicationInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise refreshSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise refreshSchemasAsync(array{EndpointArn?: string, ReplicationInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result reloadReplicationTables(array $args = [])
 * @phpstan-method \Aws\Result reloadReplicationTables(array{
 *     ReplicationConfigArn?: string,
 *     TablesToReload?: list<array{SchemaName?: string, TableName?: string, ...}>,
 *     ReloadOption?: 'data-reload'|'validate-only',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise reloadReplicationTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reloadReplicationTablesAsync(array{
 *     ReplicationConfigArn?: string,
 *     TablesToReload?: list<array{SchemaName?: string, TableName?: string, ...}>,
 *     ReloadOption?: 'data-reload'|'validate-only',
 *     ...,
 * } $args = [])
 * @method \Aws\Result reloadTables(array $args = [])
 * @phpstan-method \Aws\Result reloadTables(array{
 *     ReplicationTaskArn?: string,
 *     TablesToReload?: list<array{SchemaName?: string, TableName?: string, ...}>,
 *     ReloadOption?: 'data-reload'|'validate-only',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise reloadTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reloadTablesAsync(array{
 *     ReplicationTaskArn?: string,
 *     TablesToReload?: list<array{SchemaName?: string, TableName?: string, ...}>,
 *     ReloadOption?: 'data-reload'|'validate-only',
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result runFleetAdvisorLsaAnalysis(array $args = [])
 * @phpstan-method \Aws\Result runFleetAdvisorLsaAnalysis(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise runFleetAdvisorLsaAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise runFleetAdvisorLsaAnalysisAsync(array{...} $args = [])
 * @method \Aws\Result startDataMigration(array $args = [])
 * @phpstan-method \Aws\Result startDataMigration(array{
 *     DataMigrationIdentifier?: string,
 *     StartType?: 'reload-target'|'resume-processing'|'start-replication',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataMigrationAsync(array{
 *     DataMigrationIdentifier?: string,
 *     StartType?: 'reload-target'|'resume-processing'|'start-replication',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startExtensionPackAssociation(array $args = [])
 * @phpstan-method \Aws\Result startExtensionPackAssociation(array{MigrationProjectIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startExtensionPackAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExtensionPackAssociationAsync(array{MigrationProjectIdentifier?: string, ...} $args = [])
 * @method \Aws\Result startMetadataModelAssessment(array $args = [])
 * @phpstan-method \Aws\Result startMetadataModelAssessment(array{MigrationProjectIdentifier?: string, SelectionRules?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetadataModelAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetadataModelAssessmentAsync(array{MigrationProjectIdentifier?: string, SelectionRules?: string, ...} $args = [])
 * @method \Aws\Result startMetadataModelConversion(array $args = [])
 * @phpstan-method \Aws\Result startMetadataModelConversion(array{MigrationProjectIdentifier?: string, SelectionRules?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetadataModelConversionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetadataModelConversionAsync(array{MigrationProjectIdentifier?: string, SelectionRules?: string, ...} $args = [])
 * @method \Aws\Result startMetadataModelCreation(array $args = [])
 * @phpstan-method \Aws\Result startMetadataModelCreation(array{
 *     MigrationProjectIdentifier?: string,
 *     SelectionRules?: string,
 *     MetadataModelName?: string,
 *     Properties?: array{StatementProperties?: array{Definition?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetadataModelCreationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetadataModelCreationAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     SelectionRules?: string,
 *     MetadataModelName?: string,
 *     Properties?: array{StatementProperties?: array{Definition?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMetadataModelExportAsScript(array $args = [])
 * @phpstan-method \Aws\Result startMetadataModelExportAsScript(array{
 *     MigrationProjectIdentifier?: string,
 *     SelectionRules?: string,
 *     Origin?: 'SOURCE'|'TARGET',
 *     FileName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetadataModelExportAsScriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetadataModelExportAsScriptAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     SelectionRules?: string,
 *     Origin?: 'SOURCE'|'TARGET',
 *     FileName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMetadataModelExportToTarget(array $args = [])
 * @phpstan-method \Aws\Result startMetadataModelExportToTarget(array{MigrationProjectIdentifier?: string, SelectionRules?: string, OverwriteExtensionPack?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetadataModelExportToTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetadataModelExportToTargetAsync(array{MigrationProjectIdentifier?: string, SelectionRules?: string, OverwriteExtensionPack?: bool, ...} $args = [])
 * @method \Aws\Result startMetadataModelImport(array $args = [])
 * @phpstan-method \Aws\Result startMetadataModelImport(array{
 *     MigrationProjectIdentifier?: string,
 *     SelectionRules?: string,
 *     Origin?: 'SOURCE'|'TARGET',
 *     Refresh?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetadataModelImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetadataModelImportAsync(array{
 *     MigrationProjectIdentifier?: string,
 *     SelectionRules?: string,
 *     Origin?: 'SOURCE'|'TARGET',
 *     Refresh?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startRecommendations(array $args = [])
 * @phpstan-method \Aws\Result startRecommendations(array{DatabaseId?: string, Settings?: array{InstanceSizingType?: string, WorkloadType?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRecommendationsAsync(array{DatabaseId?: string, Settings?: array{InstanceSizingType?: string, WorkloadType?: string, ...}, ...} $args = [])
 * @method \Aws\Result startReplication(array $args = [])
 * @phpstan-method \Aws\Result startReplication(array{
 *     ReplicationConfigArn?: string,
 *     StartReplicationType?: string,
 *     PremigrationAssessmentSettings?: string,
 *     CdcStartTime?: int|string|\DateTimeInterface,
 *     CdcStartPosition?: string,
 *     CdcStopPosition?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReplicationAsync(array{
 *     ReplicationConfigArn?: string,
 *     StartReplicationType?: string,
 *     PremigrationAssessmentSettings?: string,
 *     CdcStartTime?: int|string|\DateTimeInterface,
 *     CdcStartPosition?: string,
 *     CdcStopPosition?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startReplicationTask(array $args = [])
 * @phpstan-method \Aws\Result startReplicationTask(array{
 *     ReplicationTaskArn?: string,
 *     StartReplicationTaskType?: 'reload-target'|'resume-processing'|'start-replication',
 *     CdcStartTime?: int|string|\DateTimeInterface,
 *     CdcStartPosition?: string,
 *     CdcStopPosition?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startReplicationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReplicationTaskAsync(array{
 *     ReplicationTaskArn?: string,
 *     StartReplicationTaskType?: 'reload-target'|'resume-processing'|'start-replication',
 *     CdcStartTime?: int|string|\DateTimeInterface,
 *     CdcStartPosition?: string,
 *     CdcStopPosition?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startReplicationTaskAssessment(array $args = [])
 * @phpstan-method \Aws\Result startReplicationTaskAssessment(array{ReplicationTaskArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startReplicationTaskAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReplicationTaskAssessmentAsync(array{ReplicationTaskArn?: string, ...} $args = [])
 * @method \Aws\Result startReplicationTaskAssessmentRun(array $args = [])
 * @phpstan-method \Aws\Result startReplicationTaskAssessmentRun(array{
 *     ReplicationTaskArn?: string,
 *     ServiceAccessRoleArn?: string,
 *     ResultLocationBucket?: string,
 *     ResultLocationFolder?: string,
 *     ResultEncryptionMode?: string,
 *     ResultKmsKeyArn?: string,
 *     AssessmentRunName?: string,
 *     IncludeOnly?: list<string>,
 *     Exclude?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startReplicationTaskAssessmentRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReplicationTaskAssessmentRunAsync(array{
 *     ReplicationTaskArn?: string,
 *     ServiceAccessRoleArn?: string,
 *     ResultLocationBucket?: string,
 *     ResultLocationFolder?: string,
 *     ResultEncryptionMode?: string,
 *     ResultKmsKeyArn?: string,
 *     AssessmentRunName?: string,
 *     IncludeOnly?: list<string>,
 *     Exclude?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ResourceArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopDataMigration(array $args = [])
 * @phpstan-method \Aws\Result stopDataMigration(array{DataMigrationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDataMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDataMigrationAsync(array{DataMigrationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopReplication(array $args = [])
 * @phpstan-method \Aws\Result stopReplication(array{ReplicationConfigArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopReplicationAsync(array{ReplicationConfigArn?: string, ...} $args = [])
 * @method \Aws\Result stopReplicationTask(array $args = [])
 * @phpstan-method \Aws\Result stopReplicationTask(array{ReplicationTaskArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopReplicationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopReplicationTaskAsync(array{ReplicationTaskArn?: string, ...} $args = [])
 * @method \Aws\Result testConnection(array $args = [])
 * @phpstan-method \Aws\Result testConnection(array{ReplicationInstanceArn?: string, EndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testConnectionAsync(array{ReplicationInstanceArn?: string, EndpointArn?: string, ...} $args = [])
 * @method \Aws\Result updateSubscriptionsToEventBridge(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriptionsToEventBridge(array{ForceMove?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionsToEventBridgeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriptionsToEventBridgeAsync(array{ForceMove?: bool, ...} $args = [])
 */
class DatabaseMigrationServiceClient extends AwsClient {}
