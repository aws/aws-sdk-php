<?php
namespace Aws\RDSDataService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS RDS DataService** service.
 * @method \Aws\Result batchExecuteStatement(array $args = [])
 * @phpstan-method \Aws\Result batchExecuteStatement(array{
 *     resourceArn?: string,
 *     secretArn?: string,
 *     sql?: string,
 *     database?: string,
 *     schema?: string,
 *     parameterSets?: list<list<array>>,
 *     transactionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchExecuteStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchExecuteStatementAsync(array{
 *     resourceArn?: string,
 *     secretArn?: string,
 *     sql?: string,
 *     database?: string,
 *     schema?: string,
 *     parameterSets?: list<list<array>>,
 *     transactionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result beginTransaction(array $args = [])
 * @phpstan-method \Aws\Result beginTransaction(array{resourceArn?: string, secretArn?: string, database?: string, schema?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise beginTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise beginTransactionAsync(array{resourceArn?: string, secretArn?: string, database?: string, schema?: string, ...} $args = [])
 * @method \Aws\Result commitTransaction(array $args = [])
 * @phpstan-method \Aws\Result commitTransaction(array{resourceArn?: string, secretArn?: string, transactionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise commitTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise commitTransactionAsync(array{resourceArn?: string, secretArn?: string, transactionId?: string, ...} $args = [])
 * @method \Aws\Result executeSql(array $args = [])
 * @phpstan-method \Aws\Result executeSql(array{
 *     dbClusterOrInstanceArn?: string,
 *     awsSecretStoreArn?: string,
 *     sqlStatements?: string,
 *     database?: string,
 *     schema?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeSqlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeSqlAsync(array{
 *     dbClusterOrInstanceArn?: string,
 *     awsSecretStoreArn?: string,
 *     sqlStatements?: string,
 *     database?: string,
 *     schema?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeStatement(array $args = [])
 * @phpstan-method \Aws\Result executeStatement(array{
 *     resourceArn?: string,
 *     secretArn?: string,
 *     sql?: string,
 *     database?: string,
 *     schema?: string,
 *     parameters?: list<array{name?: string, value?: array, typeHint?: 'DATE'|'DECIMAL'|'JSON'|'TIME'|'TIMESTAMP'|'UUID', ...}>,
 *     transactionId?: string,
 *     includeResultMetadata?: bool,
 *     continueAfterTimeout?: bool,
 *     resultSetOptions?: array{decimalReturnType?: 'DOUBLE_OR_LONG'|'STRING', longReturnType?: 'LONG'|'STRING', ...},
 *     formatRecordsAs?: 'JSON'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeStatementAsync(array{
 *     resourceArn?: string,
 *     secretArn?: string,
 *     sql?: string,
 *     database?: string,
 *     schema?: string,
 *     parameters?: list<array{name?: string, value?: array, typeHint?: 'DATE'|'DECIMAL'|'JSON'|'TIME'|'TIMESTAMP'|'UUID', ...}>,
 *     transactionId?: string,
 *     includeResultMetadata?: bool,
 *     continueAfterTimeout?: bool,
 *     resultSetOptions?: array{decimalReturnType?: 'DOUBLE_OR_LONG'|'STRING', longReturnType?: 'LONG'|'STRING', ...},
 *     formatRecordsAs?: 'JSON'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result rollbackTransaction(array $args = [])
 * @phpstan-method \Aws\Result rollbackTransaction(array{resourceArn?: string, secretArn?: string, transactionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rollbackTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rollbackTransactionAsync(array{resourceArn?: string, secretArn?: string, transactionId?: string, ...} $args = [])
 */
class RDSDataServiceClient extends AwsClient {}
