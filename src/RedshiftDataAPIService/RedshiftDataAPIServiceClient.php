<?php
namespace Aws\RedshiftDataAPIService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Redshift Data API Service** service.
 * @method \Aws\Result batchExecuteStatement(array $args = [])
 * @phpstan-method \Aws\Result batchExecuteStatement(array{
 *     Sqls?: list<string>,
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     WithEvent?: bool,
 *     StatementName?: string,
 *     Parameters?: list<array{name?: string, value?: string, ...}>,
 *     WorkgroupName?: string,
 *     ClientToken?: string,
 *     ResultFormat?: 'CSV'|'JSON',
 *     SessionKeepAliveSeconds?: int,
 *     SessionId?: string,
 *     ExecutionMode?: 'AUTO_COMMIT'|'TRANSACTION',
 *     WaitTimeSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchExecuteStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchExecuteStatementAsync(array{
 *     Sqls?: list<string>,
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     WithEvent?: bool,
 *     StatementName?: string,
 *     Parameters?: list<array{name?: string, value?: string, ...}>,
 *     WorkgroupName?: string,
 *     ClientToken?: string,
 *     ResultFormat?: 'CSV'|'JSON',
 *     SessionKeepAliveSeconds?: int,
 *     SessionId?: string,
 *     ExecutionMode?: 'AUTO_COMMIT'|'TRANSACTION',
 *     WaitTimeSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelStatement(array $args = [])
 * @phpstan-method \Aws\Result cancelStatement(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelStatementAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describeStatement(array $args = [])
 * @phpstan-method \Aws\Result describeStatement(array{Id?: string, WaitTimeSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStatementAsync(array{Id?: string, WaitTimeSeconds?: int, ...} $args = [])
 * @method \Aws\Result describeTable(array $args = [])
 * @phpstan-method \Aws\Result describeTable(array{
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     ConnectedDatabase?: string,
 *     Schema?: string,
 *     Table?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTableAsync(array{
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     ConnectedDatabase?: string,
 *     Schema?: string,
 *     Table?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeStatement(array $args = [])
 * @phpstan-method \Aws\Result executeStatement(array{
 *     Sql?: string,
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     WithEvent?: bool,
 *     StatementName?: string,
 *     Parameters?: list<array{name?: string, value?: string, ...}>,
 *     WorkgroupName?: string,
 *     ClientToken?: string,
 *     ResultFormat?: 'CSV'|'JSON',
 *     SessionKeepAliveSeconds?: int,
 *     SessionId?: string,
 *     WaitTimeSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeStatementAsync(array{
 *     Sql?: string,
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     WithEvent?: bool,
 *     StatementName?: string,
 *     Parameters?: list<array{name?: string, value?: string, ...}>,
 *     WorkgroupName?: string,
 *     ClientToken?: string,
 *     ResultFormat?: 'CSV'|'JSON',
 *     SessionKeepAliveSeconds?: int,
 *     SessionId?: string,
 *     WaitTimeSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getStatementResult(array $args = [])
 * @phpstan-method \Aws\Result getStatementResult(array{Id?: string, NextToken?: string, WaitTimeSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStatementResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStatementResultAsync(array{Id?: string, NextToken?: string, WaitTimeSeconds?: int, ...} $args = [])
 * @method \Aws\Result getStatementResultV2(array $args = [])
 * @phpstan-method \Aws\Result getStatementResultV2(array{Id?: string, NextToken?: string, WaitTimeSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStatementResultV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStatementResultV2Async(array{Id?: string, NextToken?: string, WaitTimeSeconds?: int, ...} $args = [])
 * @method \Aws\Result listDatabases(array $args = [])
 * @phpstan-method \Aws\Result listDatabases(array{
 *     ClusterIdentifier?: string,
 *     Database?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatabasesAsync(array{
 *     ClusterIdentifier?: string,
 *     Database?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSchemas(array $args = [])
 * @phpstan-method \Aws\Result listSchemas(array{
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     ConnectedDatabase?: string,
 *     SchemaPattern?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemasAsync(array{
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     ConnectedDatabase?: string,
 *     SchemaPattern?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SessionId?: string,
 *     Status?: 'AVAILABLE'|'BUSY'|'CLOSED',
 *     RoleLevel?: bool,
 *     ClusterIdentifier?: string,
 *     WorkgroupName?: string,
 *     Database?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SessionId?: string,
 *     Status?: 'AVAILABLE'|'BUSY'|'CLOSED',
 *     RoleLevel?: bool,
 *     ClusterIdentifier?: string,
 *     WorkgroupName?: string,
 *     Database?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStatements(array $args = [])
 * @phpstan-method \Aws\Result listStatements(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StatementName?: string,
 *     Status?: 'ABORTED'|'ALL'|'FAILED'|'FINISHED'|'PICKED'|'STARTED'|'SUBMITTED',
 *     RoleLevel?: bool,
 *     Database?: string,
 *     ClusterIdentifier?: string,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStatementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStatementsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StatementName?: string,
 *     Status?: 'ABORTED'|'ALL'|'FAILED'|'FINISHED'|'PICKED'|'STARTED'|'SUBMITTED',
 *     RoleLevel?: bool,
 *     Database?: string,
 *     ClusterIdentifier?: string,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTables(array $args = [])
 * @phpstan-method \Aws\Result listTables(array{
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     ConnectedDatabase?: string,
 *     SchemaPattern?: string,
 *     TablePattern?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTablesAsync(array{
 *     ClusterIdentifier?: string,
 *     SecretArn?: string,
 *     DbUser?: string,
 *     Database?: string,
 *     ConnectedDatabase?: string,
 *     SchemaPattern?: string,
 *     TablePattern?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     WorkgroupName?: string,
 *     ...,
 * } $args = [])
 */
class RedshiftDataAPIServiceClient extends AwsClient {}
