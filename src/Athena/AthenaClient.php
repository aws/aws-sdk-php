<?php
namespace Aws\Athena;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Athena** service.
 * @method \Aws\Result batchGetNamedQuery(array $args = [])
 * @phpstan-method \Aws\Result batchGetNamedQuery(array{NamedQueryIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetNamedQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetNamedQueryAsync(array{NamedQueryIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetPreparedStatement(array $args = [])
 * @phpstan-method \Aws\Result batchGetPreparedStatement(array{PreparedStatementNames?: list<string>, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetPreparedStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetPreparedStatementAsync(array{PreparedStatementNames?: list<string>, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result batchGetQueryExecution(array $args = [])
 * @phpstan-method \Aws\Result batchGetQueryExecution(array{QueryExecutionIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetQueryExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetQueryExecutionAsync(array{QueryExecutionIds?: list<string>, ...} $args = [])
 * @method \Aws\Result cancelCapacityReservation(array $args = [])
 * @phpstan-method \Aws\Result cancelCapacityReservation(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelCapacityReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelCapacityReservationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result createCapacityReservation(array $args = [])
 * @phpstan-method \Aws\Result createCapacityReservation(array{TargetDpus?: int, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCapacityReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCapacityReservationAsync(array{TargetDpus?: int, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createDataCatalog(array $args = [])
 * @phpstan-method \Aws\Result createDataCatalog(array{
 *     Name?: string,
 *     Type?: 'FEDERATED'|'GLUE'|'HIVE'|'LAMBDA',
 *     Description?: string,
 *     Parameters?: array<string, string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataCatalogAsync(array{
 *     Name?: string,
 *     Type?: 'FEDERATED'|'GLUE'|'HIVE'|'LAMBDA',
 *     Description?: string,
 *     Parameters?: array<string, string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNamedQuery(array $args = [])
 * @phpstan-method \Aws\Result createNamedQuery(array{
 *     Name?: string,
 *     Description?: string,
 *     Database?: string,
 *     QueryString?: string,
 *     ClientRequestToken?: string,
 *     WorkGroup?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNamedQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNamedQueryAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Database?: string,
 *     QueryString?: string,
 *     ClientRequestToken?: string,
 *     WorkGroup?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotebook(array $args = [])
 * @phpstan-method \Aws\Result createNotebook(array{WorkGroup?: string, Name?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotebookAsync(array{WorkGroup?: string, Name?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createPreparedStatement(array $args = [])
 * @phpstan-method \Aws\Result createPreparedStatement(array{StatementName?: string, WorkGroup?: string, QueryStatement?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPreparedStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPreparedStatementAsync(array{StatementName?: string, WorkGroup?: string, QueryStatement?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result createPresignedNotebookUrl(array $args = [])
 * @phpstan-method \Aws\Result createPresignedNotebookUrl(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPresignedNotebookUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPresignedNotebookUrlAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result createWorkGroup(array $args = [])
 * @phpstan-method \Aws\Result createWorkGroup(array{
 *     Name?: string,
 *     Configuration?: array{
 *         ResultConfiguration?: array{
 *             OutputLocation?: string,
 *             EncryptionConfiguration?: array,
 *             ExpectedBucketOwner?: string,
 *             AclConfiguration?: array,
 *             ...,
 *         },
 *         ManagedQueryResultsConfiguration?: array{Enabled?: bool, EncryptionConfiguration?: array, ...},
 *         EnforceWorkGroupConfiguration?: bool,
 *         PublishCloudWatchMetricsEnabled?: bool,
 *         BytesScannedCutoffPerQuery?: int,
 *         RequesterPaysEnabled?: bool,
 *         EngineVersion?: array{SelectedEngineVersion?: string, EffectiveEngineVersion?: string, ...},
 *         AdditionalConfiguration?: string,
 *         ExecutionRole?: string,
 *         MonitoringConfiguration?: array{
 *             CloudWatchLoggingConfiguration?: array,
 *             ManagedLoggingConfiguration?: array,
 *             S3LoggingConfiguration?: array,
 *             ...,
 *         },
 *         EngineConfiguration?: array{
 *             CoordinatorDpuSize?: int,
 *             MaxConcurrentDpus?: int,
 *             DefaultExecutorDpuSize?: int,
 *             AdditionalConfigs?: array<string, string>,
 *             SparkProperties?: array<string, string>,
 *             Classifications?: list<array>,
 *             ...,
 *         },
 *         CustomerContentEncryptionConfiguration?: array{KmsKey?: string, ...},
 *         EnableMinimumEncryptionConfiguration?: bool,
 *         IdentityCenterConfiguration?: array{EnableIdentityCenter?: bool, IdentityCenterInstanceArn?: string, ...},
 *         QueryResultsS3AccessGrantsConfiguration?: array{
 *             EnableS3AccessGrants?: bool,
 *             CreateUserLevelPrefix?: bool,
 *             AuthenticationType?: 'DIRECTORY_IDENTITY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkGroupAsync(array{
 *     Name?: string,
 *     Configuration?: array{
 *         ResultConfiguration?: array{
 *             OutputLocation?: string,
 *             EncryptionConfiguration?: array,
 *             ExpectedBucketOwner?: string,
 *             AclConfiguration?: array,
 *             ...,
 *         },
 *         ManagedQueryResultsConfiguration?: array{Enabled?: bool, EncryptionConfiguration?: array, ...},
 *         EnforceWorkGroupConfiguration?: bool,
 *         PublishCloudWatchMetricsEnabled?: bool,
 *         BytesScannedCutoffPerQuery?: int,
 *         RequesterPaysEnabled?: bool,
 *         EngineVersion?: array{SelectedEngineVersion?: string, EffectiveEngineVersion?: string, ...},
 *         AdditionalConfiguration?: string,
 *         ExecutionRole?: string,
 *         MonitoringConfiguration?: array{
 *             CloudWatchLoggingConfiguration?: array,
 *             ManagedLoggingConfiguration?: array,
 *             S3LoggingConfiguration?: array,
 *             ...,
 *         },
 *         EngineConfiguration?: array{
 *             CoordinatorDpuSize?: int,
 *             MaxConcurrentDpus?: int,
 *             DefaultExecutorDpuSize?: int,
 *             AdditionalConfigs?: array<string, string>,
 *             SparkProperties?: array<string, string>,
 *             Classifications?: list<array>,
 *             ...,
 *         },
 *         CustomerContentEncryptionConfiguration?: array{KmsKey?: string, ...},
 *         EnableMinimumEncryptionConfiguration?: bool,
 *         IdentityCenterConfiguration?: array{EnableIdentityCenter?: bool, IdentityCenterInstanceArn?: string, ...},
 *         QueryResultsS3AccessGrantsConfiguration?: array{
 *             EnableS3AccessGrants?: bool,
 *             CreateUserLevelPrefix?: bool,
 *             AuthenticationType?: 'DIRECTORY_IDENTITY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCapacityReservation(array $args = [])
 * @phpstan-method \Aws\Result deleteCapacityReservation(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCapacityReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCapacityReservationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteDataCatalog(array $args = [])
 * @phpstan-method \Aws\Result deleteDataCatalog(array{Name?: string, DeleteCatalogOnly?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataCatalogAsync(array{Name?: string, DeleteCatalogOnly?: bool, ...} $args = [])
 * @method \Aws\Result deleteNamedQuery(array $args = [])
 * @phpstan-method \Aws\Result deleteNamedQuery(array{NamedQueryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNamedQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNamedQueryAsync(array{NamedQueryId?: string, ...} $args = [])
 * @method \Aws\Result deleteNotebook(array $args = [])
 * @phpstan-method \Aws\Result deleteNotebook(array{NotebookId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotebookAsync(array{NotebookId?: string, ...} $args = [])
 * @method \Aws\Result deletePreparedStatement(array $args = [])
 * @phpstan-method \Aws\Result deletePreparedStatement(array{StatementName?: string, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePreparedStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePreparedStatementAsync(array{StatementName?: string, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkGroup(array{WorkGroup?: string, RecursiveDeleteOption?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkGroupAsync(array{WorkGroup?: string, RecursiveDeleteOption?: bool, ...} $args = [])
 * @method \Aws\Result exportNotebook(array $args = [])
 * @phpstan-method \Aws\Result exportNotebook(array{NotebookId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportNotebookAsync(array{NotebookId?: string, ...} $args = [])
 * @method \Aws\Result getCalculationExecution(array $args = [])
 * @phpstan-method \Aws\Result getCalculationExecution(array{CalculationExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCalculationExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCalculationExecutionAsync(array{CalculationExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getCalculationExecutionCode(array $args = [])
 * @phpstan-method \Aws\Result getCalculationExecutionCode(array{CalculationExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCalculationExecutionCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCalculationExecutionCodeAsync(array{CalculationExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getCalculationExecutionStatus(array $args = [])
 * @phpstan-method \Aws\Result getCalculationExecutionStatus(array{CalculationExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCalculationExecutionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCalculationExecutionStatusAsync(array{CalculationExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getCapacityAssignmentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getCapacityAssignmentConfiguration(array{CapacityReservationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCapacityAssignmentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCapacityAssignmentConfigurationAsync(array{CapacityReservationName?: string, ...} $args = [])
 * @method \Aws\Result getCapacityReservation(array $args = [])
 * @phpstan-method \Aws\Result getCapacityReservation(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCapacityReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCapacityReservationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getDataCatalog(array $args = [])
 * @phpstan-method \Aws\Result getDataCatalog(array{Name?: string, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataCatalogAsync(array{Name?: string, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result getDatabase(array $args = [])
 * @phpstan-method \Aws\Result getDatabase(array{CatalogName?: string, DatabaseName?: string, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDatabaseAsync(array{CatalogName?: string, DatabaseName?: string, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result getNamedQuery(array $args = [])
 * @phpstan-method \Aws\Result getNamedQuery(array{NamedQueryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNamedQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNamedQueryAsync(array{NamedQueryId?: string, ...} $args = [])
 * @method \Aws\Result getNotebookMetadata(array $args = [])
 * @phpstan-method \Aws\Result getNotebookMetadata(array{NotebookId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotebookMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotebookMetadataAsync(array{NotebookId?: string, ...} $args = [])
 * @method \Aws\Result getPreparedStatement(array $args = [])
 * @phpstan-method \Aws\Result getPreparedStatement(array{StatementName?: string, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPreparedStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPreparedStatementAsync(array{StatementName?: string, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result getQueryExecution(array $args = [])
 * @phpstan-method \Aws\Result getQueryExecution(array{QueryExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryExecutionAsync(array{QueryExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getQueryResults(array $args = [])
 * @phpstan-method \Aws\Result getQueryResults(array{
 *     QueryExecutionId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QueryResultType?: 'DATA_MANIFEST'|'DATA_ROWS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array{
 *     QueryExecutionId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QueryResultType?: 'DATA_MANIFEST'|'DATA_ROWS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getQueryRuntimeStatistics(array $args = [])
 * @phpstan-method \Aws\Result getQueryRuntimeStatistics(array{QueryExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryRuntimeStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryRuntimeStatisticsAsync(array{QueryExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getResourceDashboard(array $args = [])
 * @phpstan-method \Aws\Result getResourceDashboard(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceDashboardAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result getSessionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getSessionEndpoint(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionEndpointAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result getSessionStatus(array $args = [])
 * @phpstan-method \Aws\Result getSessionStatus(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionStatusAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result getTableMetadata(array $args = [])
 * @phpstan-method \Aws\Result getTableMetadata(array{CatalogName?: string, DatabaseName?: string, TableName?: string, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableMetadataAsync(array{CatalogName?: string, DatabaseName?: string, TableName?: string, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result getWorkGroup(array $args = [])
 * @phpstan-method \Aws\Result getWorkGroup(array{WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkGroupAsync(array{WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result importNotebook(array $args = [])
 * @phpstan-method \Aws\Result importNotebook(array{
 *     WorkGroup?: string,
 *     Name?: string,
 *     Payload?: string,
 *     Type?: 'IPYNB',
 *     NotebookS3LocationUri?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importNotebookAsync(array{
 *     WorkGroup?: string,
 *     Name?: string,
 *     Payload?: string,
 *     Type?: 'IPYNB',
 *     NotebookS3LocationUri?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplicationDPUSizes(array $args = [])
 * @phpstan-method \Aws\Result listApplicationDPUSizes(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationDPUSizesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationDPUSizesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCalculationExecutions(array $args = [])
 * @phpstan-method \Aws\Result listCalculationExecutions(array{
 *     SessionId?: string,
 *     StateFilter?: 'CANCELED'|'CANCELING'|'COMPLETED'|'CREATED'|'CREATING'|'FAILED'|'QUEUED'|'RUNNING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCalculationExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCalculationExecutionsAsync(array{
 *     SessionId?: string,
 *     StateFilter?: 'CANCELED'|'CANCELING'|'COMPLETED'|'CREATED'|'CREATING'|'FAILED'|'QUEUED'|'RUNNING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCapacityReservations(array $args = [])
 * @phpstan-method \Aws\Result listCapacityReservations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCapacityReservationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCapacityReservationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataCatalogs(array $args = [])
 * @phpstan-method \Aws\Result listDataCatalogs(array{NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataCatalogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataCatalogsAsync(array{NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result listDatabases(array $args = [])
 * @phpstan-method \Aws\Result listDatabases(array{CatalogName?: string, NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatabasesAsync(array{CatalogName?: string, NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result listEngineVersions(array $args = [])
 * @phpstan-method \Aws\Result listEngineVersions(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngineVersionsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listExecutors(array $args = [])
 * @phpstan-method \Aws\Result listExecutors(array{
 *     SessionId?: string,
 *     ExecutorStateFilter?: 'CREATED'|'CREATING'|'FAILED'|'REGISTERED'|'TERMINATED'|'TERMINATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExecutorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExecutorsAsync(array{
 *     SessionId?: string,
 *     ExecutorStateFilter?: 'CREATED'|'CREATING'|'FAILED'|'REGISTERED'|'TERMINATED'|'TERMINATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNamedQueries(array $args = [])
 * @phpstan-method \Aws\Result listNamedQueries(array{NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNamedQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNamedQueriesAsync(array{NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result listNotebookMetadata(array $args = [])
 * @phpstan-method \Aws\Result listNotebookMetadata(array{Filters?: array{Name?: string, ...}, NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotebookMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotebookMetadataAsync(array{Filters?: array{Name?: string, ...}, NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result listNotebookSessions(array $args = [])
 * @phpstan-method \Aws\Result listNotebookSessions(array{NotebookId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotebookSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotebookSessionsAsync(array{NotebookId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPreparedStatements(array $args = [])
 * @phpstan-method \Aws\Result listPreparedStatements(array{WorkGroup?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPreparedStatementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPreparedStatementsAsync(array{WorkGroup?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueryExecutions(array $args = [])
 * @phpstan-method \Aws\Result listQueryExecutions(array{NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueryExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueryExecutionsAsync(array{NextToken?: string, MaxResults?: int, WorkGroup?: string, ...} $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{
 *     WorkGroup?: string,
 *     StateFilter?: 'BUSY'|'CREATED'|'CREATING'|'DEGRADED'|'FAILED'|'IDLE'|'TERMINATED'|'TERMINATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{
 *     WorkGroup?: string,
 *     StateFilter?: 'BUSY'|'CREATED'|'CREATING'|'DEGRADED'|'FAILED'|'IDLE'|'TERMINATED'|'TERMINATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTableMetadata(array $args = [])
 * @phpstan-method \Aws\Result listTableMetadata(array{
 *     CatalogName?: string,
 *     DatabaseName?: string,
 *     Expression?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkGroup?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTableMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTableMetadataAsync(array{
 *     CatalogName?: string,
 *     DatabaseName?: string,
 *     Expression?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkGroup?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listWorkGroups(array $args = [])
 * @phpstan-method \Aws\Result listWorkGroups(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkGroupsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result putCapacityAssignmentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putCapacityAssignmentConfiguration(array{
 *     CapacityReservationName?: string,
 *     CapacityAssignments?: list<array{WorkGroupNames?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putCapacityAssignmentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putCapacityAssignmentConfigurationAsync(array{
 *     CapacityReservationName?: string,
 *     CapacityAssignments?: list<array{WorkGroupNames?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCalculationExecution(array $args = [])
 * @phpstan-method \Aws\Result startCalculationExecution(array{
 *     SessionId?: string,
 *     Description?: string,
 *     CalculationConfiguration?: array{CodeBlock?: string, ...},
 *     CodeBlock?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCalculationExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCalculationExecutionAsync(array{
 *     SessionId?: string,
 *     Description?: string,
 *     CalculationConfiguration?: array{CodeBlock?: string, ...},
 *     CodeBlock?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startQueryExecution(array $args = [])
 * @phpstan-method \Aws\Result startQueryExecution(array{
 *     QueryString?: string,
 *     ClientRequestToken?: string,
 *     QueryExecutionContext?: array{Database?: string, Catalog?: string, ...},
 *     ResultConfiguration?: array{
 *         OutputLocation?: string,
 *         EncryptionConfiguration?: array{EncryptionOption?: 'CSE_KMS'|'SSE_KMS'|'SSE_S3', KmsKey?: string, ...},
 *         ExpectedBucketOwner?: string,
 *         AclConfiguration?: array{S3AclOption?: 'BUCKET_OWNER_FULL_CONTROL', ...},
 *         ...,
 *     },
 *     WorkGroup?: string,
 *     ExecutionParameters?: list<string>,
 *     ResultReuseConfiguration?: array{ResultReuseByAgeConfiguration?: array{Enabled?: bool, MaxAgeInMinutes?: int, ...}, ...},
 *     EngineConfiguration?: array{
 *         CoordinatorDpuSize?: int,
 *         MaxConcurrentDpus?: int,
 *         DefaultExecutorDpuSize?: int,
 *         AdditionalConfigs?: array<string, string>,
 *         SparkProperties?: array<string, string>,
 *         Classifications?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startQueryExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryExecutionAsync(array{
 *     QueryString?: string,
 *     ClientRequestToken?: string,
 *     QueryExecutionContext?: array{Database?: string, Catalog?: string, ...},
 *     ResultConfiguration?: array{
 *         OutputLocation?: string,
 *         EncryptionConfiguration?: array{EncryptionOption?: 'CSE_KMS'|'SSE_KMS'|'SSE_S3', KmsKey?: string, ...},
 *         ExpectedBucketOwner?: string,
 *         AclConfiguration?: array{S3AclOption?: 'BUCKET_OWNER_FULL_CONTROL', ...},
 *         ...,
 *     },
 *     WorkGroup?: string,
 *     ExecutionParameters?: list<string>,
 *     ResultReuseConfiguration?: array{ResultReuseByAgeConfiguration?: array{Enabled?: bool, MaxAgeInMinutes?: int, ...}, ...},
 *     EngineConfiguration?: array{
 *         CoordinatorDpuSize?: int,
 *         MaxConcurrentDpus?: int,
 *         DefaultExecutorDpuSize?: int,
 *         AdditionalConfigs?: array<string, string>,
 *         SparkProperties?: array<string, string>,
 *         Classifications?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSession(array $args = [])
 * @phpstan-method \Aws\Result startSession(array{
 *     Description?: string,
 *     WorkGroup?: string,
 *     EngineConfiguration?: array{
 *         CoordinatorDpuSize?: int,
 *         MaxConcurrentDpus?: int,
 *         DefaultExecutorDpuSize?: int,
 *         AdditionalConfigs?: array<string, string>,
 *         SparkProperties?: array<string, string>,
 *         Classifications?: list<array>,
 *         ...,
 *     },
 *     ExecutionRole?: string,
 *     MonitoringConfiguration?: array{
 *         CloudWatchLoggingConfiguration?: array{
 *             Enabled?: bool,
 *             LogGroup?: string,
 *             LogStreamNamePrefix?: string,
 *             LogTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         ManagedLoggingConfiguration?: array{Enabled?: bool, KmsKey?: string, ...},
 *         S3LoggingConfiguration?: array{Enabled?: bool, KmsKey?: string, LogLocation?: string, ...},
 *         ...,
 *     },
 *     NotebookVersion?: string,
 *     SessionIdleTimeoutInMinutes?: int,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CopyWorkGroupTags?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSessionAsync(array{
 *     Description?: string,
 *     WorkGroup?: string,
 *     EngineConfiguration?: array{
 *         CoordinatorDpuSize?: int,
 *         MaxConcurrentDpus?: int,
 *         DefaultExecutorDpuSize?: int,
 *         AdditionalConfigs?: array<string, string>,
 *         SparkProperties?: array<string, string>,
 *         Classifications?: list<array>,
 *         ...,
 *     },
 *     ExecutionRole?: string,
 *     MonitoringConfiguration?: array{
 *         CloudWatchLoggingConfiguration?: array{
 *             Enabled?: bool,
 *             LogGroup?: string,
 *             LogStreamNamePrefix?: string,
 *             LogTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         ManagedLoggingConfiguration?: array{Enabled?: bool, KmsKey?: string, ...},
 *         S3LoggingConfiguration?: array{Enabled?: bool, KmsKey?: string, LogLocation?: string, ...},
 *         ...,
 *     },
 *     NotebookVersion?: string,
 *     SessionIdleTimeoutInMinutes?: int,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CopyWorkGroupTags?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopCalculationExecution(array $args = [])
 * @phpstan-method \Aws\Result stopCalculationExecution(array{CalculationExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCalculationExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCalculationExecutionAsync(array{CalculationExecutionId?: string, ...} $args = [])
 * @method \Aws\Result stopQueryExecution(array $args = [])
 * @phpstan-method \Aws\Result stopQueryExecution(array{QueryExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopQueryExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopQueryExecutionAsync(array{QueryExecutionId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result terminateSession(array $args = [])
 * @phpstan-method \Aws\Result terminateSession(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateSessionAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCapacityReservation(array $args = [])
 * @phpstan-method \Aws\Result updateCapacityReservation(array{TargetDpus?: int, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCapacityReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCapacityReservationAsync(array{TargetDpus?: int, Name?: string, ...} $args = [])
 * @method \Aws\Result updateDataCatalog(array $args = [])
 * @phpstan-method \Aws\Result updateDataCatalog(array{
 *     Name?: string,
 *     Type?: 'FEDERATED'|'GLUE'|'HIVE'|'LAMBDA',
 *     Description?: string,
 *     Parameters?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataCatalogAsync(array{
 *     Name?: string,
 *     Type?: 'FEDERATED'|'GLUE'|'HIVE'|'LAMBDA',
 *     Description?: string,
 *     Parameters?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNamedQuery(array $args = [])
 * @phpstan-method \Aws\Result updateNamedQuery(array{NamedQueryId?: string, Name?: string, Description?: string, QueryString?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNamedQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNamedQueryAsync(array{NamedQueryId?: string, Name?: string, Description?: string, QueryString?: string, ...} $args = [])
 * @method \Aws\Result updateNotebook(array $args = [])
 * @phpstan-method \Aws\Result updateNotebook(array{
 *     NotebookId?: string,
 *     Payload?: string,
 *     Type?: 'IPYNB',
 *     SessionId?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotebookAsync(array{
 *     NotebookId?: string,
 *     Payload?: string,
 *     Type?: 'IPYNB',
 *     SessionId?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNotebookMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateNotebookMetadata(array{NotebookId?: string, ClientRequestToken?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotebookMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotebookMetadataAsync(array{NotebookId?: string, ClientRequestToken?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updatePreparedStatement(array $args = [])
 * @phpstan-method \Aws\Result updatePreparedStatement(array{StatementName?: string, WorkGroup?: string, QueryStatement?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePreparedStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePreparedStatementAsync(array{StatementName?: string, WorkGroup?: string, QueryStatement?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateWorkGroup(array $args = [])
 * @phpstan-method \Aws\Result updateWorkGroup(array{
 *     WorkGroup?: string,
 *     Description?: string,
 *     ConfigurationUpdates?: array{
 *         EnforceWorkGroupConfiguration?: bool,
 *         ResultConfigurationUpdates?: array{
 *             OutputLocation?: string,
 *             RemoveOutputLocation?: bool,
 *             EncryptionConfiguration?: array,
 *             RemoveEncryptionConfiguration?: bool,
 *             ExpectedBucketOwner?: string,
 *             RemoveExpectedBucketOwner?: bool,
 *             AclConfiguration?: array,
 *             RemoveAclConfiguration?: bool,
 *             ...,
 *         },
 *         ManagedQueryResultsConfigurationUpdates?: array{Enabled?: bool, EncryptionConfiguration?: array, RemoveEncryptionConfiguration?: bool, ...},
 *         PublishCloudWatchMetricsEnabled?: bool,
 *         BytesScannedCutoffPerQuery?: int,
 *         RemoveBytesScannedCutoffPerQuery?: bool,
 *         RequesterPaysEnabled?: bool,
 *         EngineVersion?: array{SelectedEngineVersion?: string, EffectiveEngineVersion?: string, ...},
 *         RemoveCustomerContentEncryptionConfiguration?: bool,
 *         AdditionalConfiguration?: string,
 *         ExecutionRole?: string,
 *         CustomerContentEncryptionConfiguration?: array{KmsKey?: string, ...},
 *         EnableMinimumEncryptionConfiguration?: bool,
 *         QueryResultsS3AccessGrantsConfiguration?: array{
 *             EnableS3AccessGrants?: bool,
 *             CreateUserLevelPrefix?: bool,
 *             AuthenticationType?: 'DIRECTORY_IDENTITY',
 *             ...,
 *         },
 *         MonitoringConfiguration?: array{
 *             CloudWatchLoggingConfiguration?: array,
 *             ManagedLoggingConfiguration?: array,
 *             S3LoggingConfiguration?: array,
 *             ...,
 *         },
 *         EngineConfiguration?: array{
 *             CoordinatorDpuSize?: int,
 *             MaxConcurrentDpus?: int,
 *             DefaultExecutorDpuSize?: int,
 *             AdditionalConfigs?: array<string, string>,
 *             SparkProperties?: array<string, string>,
 *             Classifications?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     State?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkGroupAsync(array{
 *     WorkGroup?: string,
 *     Description?: string,
 *     ConfigurationUpdates?: array{
 *         EnforceWorkGroupConfiguration?: bool,
 *         ResultConfigurationUpdates?: array{
 *             OutputLocation?: string,
 *             RemoveOutputLocation?: bool,
 *             EncryptionConfiguration?: array,
 *             RemoveEncryptionConfiguration?: bool,
 *             ExpectedBucketOwner?: string,
 *             RemoveExpectedBucketOwner?: bool,
 *             AclConfiguration?: array,
 *             RemoveAclConfiguration?: bool,
 *             ...,
 *         },
 *         ManagedQueryResultsConfigurationUpdates?: array{Enabled?: bool, EncryptionConfiguration?: array, RemoveEncryptionConfiguration?: bool, ...},
 *         PublishCloudWatchMetricsEnabled?: bool,
 *         BytesScannedCutoffPerQuery?: int,
 *         RemoveBytesScannedCutoffPerQuery?: bool,
 *         RequesterPaysEnabled?: bool,
 *         EngineVersion?: array{SelectedEngineVersion?: string, EffectiveEngineVersion?: string, ...},
 *         RemoveCustomerContentEncryptionConfiguration?: bool,
 *         AdditionalConfiguration?: string,
 *         ExecutionRole?: string,
 *         CustomerContentEncryptionConfiguration?: array{KmsKey?: string, ...},
 *         EnableMinimumEncryptionConfiguration?: bool,
 *         QueryResultsS3AccessGrantsConfiguration?: array{
 *             EnableS3AccessGrants?: bool,
 *             CreateUserLevelPrefix?: bool,
 *             AuthenticationType?: 'DIRECTORY_IDENTITY',
 *             ...,
 *         },
 *         MonitoringConfiguration?: array{
 *             CloudWatchLoggingConfiguration?: array,
 *             ManagedLoggingConfiguration?: array,
 *             S3LoggingConfiguration?: array,
 *             ...,
 *         },
 *         EngineConfiguration?: array{
 *             CoordinatorDpuSize?: int,
 *             MaxConcurrentDpus?: int,
 *             DefaultExecutorDpuSize?: int,
 *             AdditionalConfigs?: array<string, string>,
 *             SparkProperties?: array<string, string>,
 *             Classifications?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     State?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 */
class AthenaClient extends AwsClient {}
