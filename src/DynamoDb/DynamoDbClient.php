<?php
namespace Aws\DynamoDb;

use Aws\Api\Parser\Crc32ValidatingParser;
use Aws\AwsClient;
use Aws\ClientResolver;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\Middleware;
use Aws\Retry\Configuration as RetryConfiguration;
use Aws\Retry\ConfigurationInterface as RetryConfigurationInterface;
use Aws\Retry\ConfigurationProvider as RetryConfigurationProvider;
use Aws\Retry\V3\OptIn as NewRetriesOptIn;
use Aws\Retry\V3\RetryMiddleware as RetryV3Middleware;
use Aws\RetryMiddleware;
use Aws\RetryMiddlewareV2;
use GuzzleHttp\Promise\Create;

/**
 * This client is used to interact with the **Amazon DynamoDB** service.
 *
 * @method \Aws\Result batchGetItem(array $args = [])
 * @phpstan-method \Aws\Result batchGetItem(array{
 *     RequestItems?: array<string, array{
 *         Keys?: list<array<string, array>>,
 *         AttributesToGet?: list<string>,
 *         ConsistentRead?: bool,
 *         ProjectionExpression?: string,
 *         ExpressionAttributeNames?: array<string, string>,
 *         ...,
 *     }>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetItemAsync(array{
 *     RequestItems?: array<string, array{
 *         Keys?: list<array<string, array>>,
 *         AttributesToGet?: list<string>,
 *         ConsistentRead?: bool,
 *         ProjectionExpression?: string,
 *         ExpressionAttributeNames?: array<string, string>,
 *         ...,
 *     }>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchWriteItem(array $args = [])
 * @phpstan-method \Aws\Result batchWriteItem(array{
 *     RequestItems?: array<string, list<array>>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchWriteItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchWriteItemAsync(array{
 *     RequestItems?: array<string, list<array>>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTable(array $args = [])
 * @phpstan-method \Aws\Result createTable(array{
 *     AttributeDefinitions?: list<array{AttributeName?: string, AttributeType?: 'B'|'N'|'S', ...}>,
 *     TableName?: string,
 *     KeySchema?: list<array{AttributeName?: string, KeyType?: 'HASH'|'RANGE', ...}>,
 *     LocalSecondaryIndexes?: list<array{IndexName?: string, KeySchema?: list<array>, Projection?: array, ...}>,
 *     GlobalSecondaryIndexes?: list<array{
 *         IndexName?: string,
 *         KeySchema?: list<array>,
 *         Projection?: array,
 *         ProvisionedThroughput?: array,
 *         OnDemandThroughput?: array,
 *         WarmThroughput?: array,
 *         ...,
 *     }>,
 *     BillingMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     ProvisionedThroughput?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *     StreamSpecification?: array{StreamEnabled?: bool, StreamViewType?: 'KEYS_ONLY'|'NEW_AND_OLD_IMAGES'|'NEW_IMAGE'|'OLD_IMAGE', ...},
 *     SSESpecification?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TableClass?: 'STANDARD'|'STANDARD_INFREQUENT_ACCESS',
 *     DeletionProtectionEnabled?: bool,
 *     WarmThroughput?: array{ReadUnitsPerSecond?: int, WriteUnitsPerSecond?: int, ...},
 *     ResourcePolicy?: string,
 *     OnDemandThroughput?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *     GlobalTableSourceArn?: string,
 *     GlobalTableSettingsReplicationMode?: 'DISABLED'|'ENABLED'|'ENABLED_WITH_OVERRIDES',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTableAsync(array{
 *     AttributeDefinitions?: list<array{AttributeName?: string, AttributeType?: 'B'|'N'|'S', ...}>,
 *     TableName?: string,
 *     KeySchema?: list<array{AttributeName?: string, KeyType?: 'HASH'|'RANGE', ...}>,
 *     LocalSecondaryIndexes?: list<array{IndexName?: string, KeySchema?: list<array>, Projection?: array, ...}>,
 *     GlobalSecondaryIndexes?: list<array{
 *         IndexName?: string,
 *         KeySchema?: list<array>,
 *         Projection?: array,
 *         ProvisionedThroughput?: array,
 *         OnDemandThroughput?: array,
 *         WarmThroughput?: array,
 *         ...,
 *     }>,
 *     BillingMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     ProvisionedThroughput?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *     StreamSpecification?: array{StreamEnabled?: bool, StreamViewType?: 'KEYS_ONLY'|'NEW_AND_OLD_IMAGES'|'NEW_IMAGE'|'OLD_IMAGE', ...},
 *     SSESpecification?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TableClass?: 'STANDARD'|'STANDARD_INFREQUENT_ACCESS',
 *     DeletionProtectionEnabled?: bool,
 *     WarmThroughput?: array{ReadUnitsPerSecond?: int, WriteUnitsPerSecond?: int, ...},
 *     ResourcePolicy?: string,
 *     OnDemandThroughput?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *     GlobalTableSourceArn?: string,
 *     GlobalTableSettingsReplicationMode?: 'DISABLED'|'ENABLED'|'ENABLED_WITH_OVERRIDES',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteItem(array $args = [])
 * @phpstan-method \Aws\Result deleteItem(array{
 *     TableName?: string,
 *     Key?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     Expected?: array<string, array{
 *         Value?: array,
 *         Exists?: bool,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         AttributeValueList?: list<array>,
 *         ...,
 *     }>,
 *     ConditionalOperator?: 'AND'|'OR',
 *     ReturnValues?: 'ALL_NEW'|'ALL_OLD'|'NONE'|'UPDATED_NEW'|'UPDATED_OLD',
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     ConditionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteItemAsync(array{
 *     TableName?: string,
 *     Key?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     Expected?: array<string, array{
 *         Value?: array,
 *         Exists?: bool,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         AttributeValueList?: list<array>,
 *         ...,
 *     }>,
 *     ConditionalOperator?: 'AND'|'OR',
 *     ReturnValues?: 'ALL_NEW'|'ALL_OLD'|'NONE'|'UPDATED_NEW'|'UPDATED_OLD',
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     ConditionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteTable(array $args = [])
 * @phpstan-method \Aws\Result deleteTable(array{TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableAsync(array{TableName?: string, ...} $args = [])
 * @method \Aws\Result describeTable(array $args = [])
 * @phpstan-method \Aws\Result describeTable(array{TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTableAsync(array{TableName?: string, ...} $args = [])
 * @method \Aws\Result getItem(array $args = [])
 * @phpstan-method \Aws\Result getItem(array{
 *     TableName?: string,
 *     Key?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     AttributesToGet?: list<string>,
 *     ConsistentRead?: bool,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ProjectionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getItemAsync(array{
 *     TableName?: string,
 *     Key?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     AttributesToGet?: list<string>,
 *     ConsistentRead?: bool,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ProjectionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTables(array $args = [])
 * @phpstan-method \Aws\Result listTables(array{ExclusiveStartTableName?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTablesAsync(array{ExclusiveStartTableName?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result putItem(array $args = [])
 * @phpstan-method \Aws\Result putItem(array{
 *     TableName?: string,
 *     Item?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     Expected?: array<string, array{
 *         Value?: array,
 *         Exists?: bool,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         AttributeValueList?: list<array>,
 *         ...,
 *     }>,
 *     ReturnValues?: 'ALL_NEW'|'ALL_OLD'|'NONE'|'UPDATED_NEW'|'UPDATED_OLD',
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     ConditionalOperator?: 'AND'|'OR',
 *     ConditionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putItemAsync(array{
 *     TableName?: string,
 *     Item?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     Expected?: array<string, array{
 *         Value?: array,
 *         Exists?: bool,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         AttributeValueList?: list<array>,
 *         ...,
 *     }>,
 *     ReturnValues?: 'ALL_NEW'|'ALL_OLD'|'NONE'|'UPDATED_NEW'|'UPDATED_OLD',
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     ConditionalOperator?: 'AND'|'OR',
 *     ConditionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result query(array $args = [])
 * @phpstan-method \Aws\Result query(array{
 *     TableName?: string,
 *     IndexName?: string,
 *     Select?: 'ALL_ATTRIBUTES'|'ALL_PROJECTED_ATTRIBUTES'|'COUNT'|'SPECIFIC_ATTRIBUTES',
 *     AttributesToGet?: list<string>,
 *     Limit?: int,
 *     ConsistentRead?: bool,
 *     KeyConditions?: array<string, array{
 *         AttributeValueList?: list<array>,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         ...,
 *     }>,
 *     QueryFilter?: array<string, array{
 *         AttributeValueList?: list<array>,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         ...,
 *     }>,
 *     ConditionalOperator?: 'AND'|'OR',
 *     ScanIndexForward?: bool,
 *     ExclusiveStartKey?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ProjectionExpression?: string,
 *     FilterExpression?: string,
 *     KeyConditionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryAsync(array{
 *     TableName?: string,
 *     IndexName?: string,
 *     Select?: 'ALL_ATTRIBUTES'|'ALL_PROJECTED_ATTRIBUTES'|'COUNT'|'SPECIFIC_ATTRIBUTES',
 *     AttributesToGet?: list<string>,
 *     Limit?: int,
 *     ConsistentRead?: bool,
 *     KeyConditions?: array<string, array{
 *         AttributeValueList?: list<array>,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         ...,
 *     }>,
 *     QueryFilter?: array<string, array{
 *         AttributeValueList?: list<array>,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         ...,
 *     }>,
 *     ConditionalOperator?: 'AND'|'OR',
 *     ScanIndexForward?: bool,
 *     ExclusiveStartKey?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ProjectionExpression?: string,
 *     FilterExpression?: string,
 *     KeyConditionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result scan(array $args = [])
 * @phpstan-method \Aws\Result scan(array{
 *     TableName?: string,
 *     IndexName?: string,
 *     AttributesToGet?: list<string>,
 *     Limit?: int,
 *     Select?: 'ALL_ATTRIBUTES'|'ALL_PROJECTED_ATTRIBUTES'|'COUNT'|'SPECIFIC_ATTRIBUTES',
 *     ScanFilter?: array<string, array{
 *         AttributeValueList?: list<array>,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         ...,
 *     }>,
 *     ConditionalOperator?: 'AND'|'OR',
 *     ExclusiveStartKey?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     TotalSegments?: int,
 *     Segment?: int,
 *     ProjectionExpression?: string,
 *     FilterExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ConsistentRead?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise scanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise scanAsync(array{
 *     TableName?: string,
 *     IndexName?: string,
 *     AttributesToGet?: list<string>,
 *     Limit?: int,
 *     Select?: 'ALL_ATTRIBUTES'|'ALL_PROJECTED_ATTRIBUTES'|'COUNT'|'SPECIFIC_ATTRIBUTES',
 *     ScanFilter?: array<string, array{
 *         AttributeValueList?: list<array>,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         ...,
 *     }>,
 *     ConditionalOperator?: 'AND'|'OR',
 *     ExclusiveStartKey?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     TotalSegments?: int,
 *     Segment?: int,
 *     ProjectionExpression?: string,
 *     FilterExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ConsistentRead?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateItem(array $args = [])
 * @phpstan-method \Aws\Result updateItem(array{
 *     TableName?: string,
 *     Key?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     AttributeUpdates?: array<string, array{Value?: array, Action?: 'ADD'|'DELETE'|'PUT', ...}>,
 *     Expected?: array<string, array{
 *         Value?: array,
 *         Exists?: bool,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         AttributeValueList?: list<array>,
 *         ...,
 *     }>,
 *     ConditionalOperator?: 'AND'|'OR',
 *     ReturnValues?: 'ALL_NEW'|'ALL_OLD'|'NONE'|'UPDATED_NEW'|'UPDATED_OLD',
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     UpdateExpression?: string,
 *     ConditionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateItemAsync(array{
 *     TableName?: string,
 *     Key?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     AttributeUpdates?: array<string, array{Value?: array, Action?: 'ADD'|'DELETE'|'PUT', ...}>,
 *     Expected?: array<string, array{
 *         Value?: array,
 *         Exists?: bool,
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS'|'NOT_NULL'|'NULL',
 *         AttributeValueList?: list<array>,
 *         ...,
 *     }>,
 *     ConditionalOperator?: 'AND'|'OR',
 *     ReturnValues?: 'ALL_NEW'|'ALL_OLD'|'NONE'|'UPDATED_NEW'|'UPDATED_OLD',
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     UpdateExpression?: string,
 *     ConditionExpression?: string,
 *     ExpressionAttributeNames?: array<string, string>,
 *     ExpressionAttributeValues?: array<string, array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTable(array $args = [])
 * @phpstan-method \Aws\Result updateTable(array{
 *     AttributeDefinitions?: list<array{AttributeName?: string, AttributeType?: 'B'|'N'|'S', ...}>,
 *     TableName?: string,
 *     BillingMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     ProvisionedThroughput?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *     GlobalSecondaryIndexUpdates?: list<array{Update?: array, Create?: array, Delete?: array, ...}>,
 *     StreamSpecification?: array{StreamEnabled?: bool, StreamViewType?: 'KEYS_ONLY'|'NEW_AND_OLD_IMAGES'|'NEW_IMAGE'|'OLD_IMAGE', ...},
 *     SSESpecification?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *     ReplicaUpdates?: list<array{Create?: array, Update?: array, Delete?: array, ...}>,
 *     TableClass?: 'STANDARD'|'STANDARD_INFREQUENT_ACCESS',
 *     DeletionProtectionEnabled?: bool,
 *     MultiRegionConsistency?: 'EVENTUAL'|'STRONG',
 *     GlobalTableWitnessUpdates?: list<array{Create?: array, Delete?: array, ...}>,
 *     OnDemandThroughput?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *     WarmThroughput?: array{ReadUnitsPerSecond?: int, WriteUnitsPerSecond?: int, ...},
 *     GlobalTableSettingsReplicationMode?: 'DISABLED'|'ENABLED'|'ENABLED_WITH_OVERRIDES',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableAsync(array{
 *     AttributeDefinitions?: list<array{AttributeName?: string, AttributeType?: 'B'|'N'|'S', ...}>,
 *     TableName?: string,
 *     BillingMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     ProvisionedThroughput?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *     GlobalSecondaryIndexUpdates?: list<array{Update?: array, Create?: array, Delete?: array, ...}>,
 *     StreamSpecification?: array{StreamEnabled?: bool, StreamViewType?: 'KEYS_ONLY'|'NEW_AND_OLD_IMAGES'|'NEW_IMAGE'|'OLD_IMAGE', ...},
 *     SSESpecification?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *     ReplicaUpdates?: list<array{Create?: array, Update?: array, Delete?: array, ...}>,
 *     TableClass?: 'STANDARD'|'STANDARD_INFREQUENT_ACCESS',
 *     DeletionProtectionEnabled?: bool,
 *     MultiRegionConsistency?: 'EVENTUAL'|'STRONG',
 *     GlobalTableWitnessUpdates?: list<array{Create?: array, Delete?: array, ...}>,
 *     OnDemandThroughput?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *     WarmThroughput?: array{ReadUnitsPerSecond?: int, WriteUnitsPerSecond?: int, ...},
 *     GlobalTableSettingsReplicationMode?: 'DISABLED'|'ENABLED'|'ENABLED_WITH_OVERRIDES',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchExecuteStatement(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result batchExecuteStatement(array{
 *     Statements?: list<array{
 *         Statement?: string,
 *         Parameters?: list<array>,
 *         ConsistentRead?: bool,
 *         ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *         ...,
 *     }>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchExecuteStatementAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise batchExecuteStatementAsync(array{
 *     Statements?: list<array{
 *         Statement?: string,
 *         Parameters?: list<array>,
 *         ConsistentRead?: bool,
 *         ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *         ...,
 *     }>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBackup(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result createBackup(array{TableName?: string, BackupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackupAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackupAsync(array{TableName?: string, BackupName?: string, ...} $args = [])
 * @method \Aws\Result createGlobalTable(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result createGlobalTable(array{GlobalTableName?: string, ReplicationGroup?: list<array{RegionName?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlobalTableAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlobalTableAsync(array{GlobalTableName?: string, ReplicationGroup?: list<array{RegionName?: string, ...}>, ...} $args = [])
 * @method \Aws\Result deleteBackup(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result deleteBackup(array{BackupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackupAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupAsync(array{BackupArn?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ExpectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ExpectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result describeBackup(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeBackup(array{BackupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBackupAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBackupAsync(array{BackupArn?: string, ...} $args = [])
 * @method \Aws\Result describeContinuousBackups(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeContinuousBackups(array{TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContinuousBackupsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContinuousBackupsAsync(array{TableName?: string, ...} $args = [])
 * @method \Aws\Result describeContributorInsights(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeContributorInsights(array{TableName?: string, IndexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContributorInsightsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContributorInsightsAsync(array{TableName?: string, IndexName?: string, ...} $args = [])
 * @method \Aws\Result describeEndpoints(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeEndpoints(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array{...} $args = [])
 * @method \Aws\Result describeExport(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeExport(array{ExportArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExportAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExportAsync(array{ExportArn?: string, ...} $args = [])
 * @method \Aws\Result describeGlobalTable(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeGlobalTable(array{GlobalTableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalTableAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGlobalTableAsync(array{GlobalTableName?: string, ...} $args = [])
 * @method \Aws\Result describeGlobalTableSettings(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeGlobalTableSettings(array{GlobalTableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalTableSettingsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGlobalTableSettingsAsync(array{GlobalTableName?: string, ...} $args = [])
 * @method \Aws\Result describeImport(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeImport(array{ImportArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImportAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImportAsync(array{ImportArn?: string, ...} $args = [])
 * @method \Aws\Result describeKinesisStreamingDestination(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeKinesisStreamingDestination(array{TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKinesisStreamingDestinationAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKinesisStreamingDestinationAsync(array{TableName?: string, ...} $args = [])
 * @method \Aws\Result describeLimits(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeLimits(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLimitsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLimitsAsync(array{...} $args = [])
 * @method \Aws\Result describeTableReplicaAutoScaling(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeTableReplicaAutoScaling(array{TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTableReplicaAutoScalingAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTableReplicaAutoScalingAsync(array{TableName?: string, ...} $args = [])
 * @method \Aws\Result describeTimeToLive(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result describeTimeToLive(array{TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTimeToLiveAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTimeToLiveAsync(array{TableName?: string, ...} $args = [])
 * @method \Aws\Result disableKinesisStreamingDestination(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result disableKinesisStreamingDestination(array{
 *     TableName?: string,
 *     StreamArn?: string,
 *     EnableKinesisStreamingConfiguration?: array{ApproximateCreationDateTimePrecision?: 'MICROSECOND'|'MILLISECOND', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disableKinesisStreamingDestinationAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise disableKinesisStreamingDestinationAsync(array{
 *     TableName?: string,
 *     StreamArn?: string,
 *     EnableKinesisStreamingConfiguration?: array{ApproximateCreationDateTimePrecision?: 'MICROSECOND'|'MILLISECOND', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableKinesisStreamingDestination(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result enableKinesisStreamingDestination(array{
 *     TableName?: string,
 *     StreamArn?: string,
 *     EnableKinesisStreamingConfiguration?: array{ApproximateCreationDateTimePrecision?: 'MICROSECOND'|'MILLISECOND', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableKinesisStreamingDestinationAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise enableKinesisStreamingDestinationAsync(array{
 *     TableName?: string,
 *     StreamArn?: string,
 *     EnableKinesisStreamingConfiguration?: array{ApproximateCreationDateTimePrecision?: 'MICROSECOND'|'MILLISECOND', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeStatement(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result executeStatement(array{
 *     Statement?: string,
 *     Parameters?: list<array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ConsistentRead?: bool,
 *     NextToken?: string,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     Limit?: int,
 *     ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeStatementAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise executeStatementAsync(array{
 *     Statement?: string,
 *     Parameters?: list<array{
 *         S?: string,
 *         N?: string,
 *         B?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SS?: list<string>,
 *         NS?: list<string>,
 *         BS?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         M?: array<string, array>,
 *         L?: list<array>,
 *         NULL?: bool,
 *         BOOL?: bool,
 *         ...,
 *     }>,
 *     ConsistentRead?: bool,
 *     NextToken?: string,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     Limit?: int,
 *     ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeTransaction(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result executeTransaction(array{
 *     TransactStatements?: list<array{
 *         Statement?: string,
 *         Parameters?: list<array>,
 *         ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *         ...,
 *     }>,
 *     ClientRequestToken?: string,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeTransactionAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise executeTransactionAsync(array{
 *     TransactStatements?: list<array{
 *         Statement?: string,
 *         Parameters?: list<array>,
 *         ReturnValuesOnConditionCheckFailure?: 'ALL_OLD'|'NONE',
 *         ...,
 *     }>,
 *     ClientRequestToken?: string,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportTableToPointInTime(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result exportTableToPointInTime(array{
 *     TableArn?: string,
 *     ExportTime?: int|string|\DateTimeInterface,
 *     ClientToken?: string,
 *     S3Bucket?: string,
 *     S3BucketOwner?: string,
 *     S3Prefix?: string,
 *     S3SseAlgorithm?: 'AES256'|'KMS',
 *     S3SseKmsKeyId?: string,
 *     ExportFormat?: 'DYNAMODB_JSON'|'ION',
 *     ExportType?: 'FULL_EXPORT'|'INCREMENTAL_EXPORT',
 *     IncrementalExportSpecification?: array{
 *         ExportFromTime?: int|string|\DateTimeInterface,
 *         ExportToTime?: int|string|\DateTimeInterface,
 *         ExportViewType?: 'NEW_AND_OLD_IMAGES'|'NEW_IMAGE',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportTableToPointInTimeAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise exportTableToPointInTimeAsync(array{
 *     TableArn?: string,
 *     ExportTime?: int|string|\DateTimeInterface,
 *     ClientToken?: string,
 *     S3Bucket?: string,
 *     S3BucketOwner?: string,
 *     S3Prefix?: string,
 *     S3SseAlgorithm?: 'AES256'|'KMS',
 *     S3SseKmsKeyId?: string,
 *     ExportFormat?: 'DYNAMODB_JSON'|'ION',
 *     ExportType?: 'FULL_EXPORT'|'INCREMENTAL_EXPORT',
 *     IncrementalExportSpecification?: array{
 *         ExportFromTime?: int|string|\DateTimeInterface,
 *         ExportToTime?: int|string|\DateTimeInterface,
 *         ExportViewType?: 'NEW_AND_OLD_IMAGES'|'NEW_IMAGE',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result importTable(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result importTable(array{
 *     ClientToken?: string,
 *     S3BucketSource?: array{S3BucketOwner?: string, S3Bucket?: string, S3KeyPrefix?: string, ...},
 *     InputFormat?: 'CSV'|'DYNAMODB_JSON'|'ION',
 *     InputFormatOptions?: array{Csv?: array{Delimiter?: string, HeaderList?: list<string>, ...}, ...},
 *     InputCompressionType?: 'GZIP'|'NONE'|'ZSTD',
 *     TableCreationParameters?: array{
 *         TableName?: string,
 *         AttributeDefinitions?: list<array>,
 *         KeySchema?: list<array>,
 *         BillingMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *         ProvisionedThroughput?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *         OnDemandThroughput?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *         SSESpecification?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *         GlobalSecondaryIndexes?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importTableAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise importTableAsync(array{
 *     ClientToken?: string,
 *     S3BucketSource?: array{S3BucketOwner?: string, S3Bucket?: string, S3KeyPrefix?: string, ...},
 *     InputFormat?: 'CSV'|'DYNAMODB_JSON'|'ION',
 *     InputFormatOptions?: array{Csv?: array{Delimiter?: string, HeaderList?: list<string>, ...}, ...},
 *     InputCompressionType?: 'GZIP'|'NONE'|'ZSTD',
 *     TableCreationParameters?: array{
 *         TableName?: string,
 *         AttributeDefinitions?: list<array>,
 *         KeySchema?: list<array>,
 *         BillingMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *         ProvisionedThroughput?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *         OnDemandThroughput?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *         SSESpecification?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *         GlobalSecondaryIndexes?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBackups(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result listBackups(array{
 *     TableName?: string,
 *     Limit?: int,
 *     TimeRangeLowerBound?: int|string|\DateTimeInterface,
 *     TimeRangeUpperBound?: int|string|\DateTimeInterface,
 *     ExclusiveStartBackupArn?: string,
 *     BackupType?: 'ALL'|'AWS_BACKUP'|'SYSTEM'|'USER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackupsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackupsAsync(array{
 *     TableName?: string,
 *     Limit?: int,
 *     TimeRangeLowerBound?: int|string|\DateTimeInterface,
 *     TimeRangeUpperBound?: int|string|\DateTimeInterface,
 *     ExclusiveStartBackupArn?: string,
 *     BackupType?: 'ALL'|'AWS_BACKUP'|'SYSTEM'|'USER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listContributorInsights(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result listContributorInsights(array{TableName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContributorInsightsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise listContributorInsightsAsync(array{TableName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listExports(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result listExports(array{TableArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportsAsync(array{TableArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGlobalTables(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result listGlobalTables(array{ExclusiveStartGlobalTableName?: string, Limit?: int, RegionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGlobalTablesAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise listGlobalTablesAsync(array{ExclusiveStartGlobalTableName?: string, Limit?: int, RegionName?: string, ...} $args = [])
 * @method \Aws\Result listImports(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result listImports(array{TableArn?: string, PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportsAsync(array{TableArn?: string, PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsOfResource(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result listTagsOfResource(array{ResourceArn?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsOfResourceAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsOfResourceAsync(array{ResourceArn?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result putResourcePolicy(array{
 *     ResourceArn?: string,
 *     Policy?: string,
 *     ExpectedRevisionId?: string,
 *     ConfirmRemoveSelfResourceAccess?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{
 *     ResourceArn?: string,
 *     Policy?: string,
 *     ExpectedRevisionId?: string,
 *     ConfirmRemoveSelfResourceAccess?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreTableFromBackup(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result restoreTableFromBackup(array{
 *     TargetTableName?: string,
 *     BackupArn?: string,
 *     BillingModeOverride?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     GlobalSecondaryIndexOverride?: list<array{
 *         IndexName?: string,
 *         KeySchema?: list<array>,
 *         Projection?: array,
 *         ProvisionedThroughput?: array,
 *         OnDemandThroughput?: array,
 *         WarmThroughput?: array,
 *         ...,
 *     }>,
 *     LocalSecondaryIndexOverride?: list<array{IndexName?: string, KeySchema?: list<array>, Projection?: array, ...}>,
 *     ProvisionedThroughputOverride?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *     OnDemandThroughputOverride?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *     SSESpecificationOverride?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreTableFromBackupAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreTableFromBackupAsync(array{
 *     TargetTableName?: string,
 *     BackupArn?: string,
 *     BillingModeOverride?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     GlobalSecondaryIndexOverride?: list<array{
 *         IndexName?: string,
 *         KeySchema?: list<array>,
 *         Projection?: array,
 *         ProvisionedThroughput?: array,
 *         OnDemandThroughput?: array,
 *         WarmThroughput?: array,
 *         ...,
 *     }>,
 *     LocalSecondaryIndexOverride?: list<array{IndexName?: string, KeySchema?: list<array>, Projection?: array, ...}>,
 *     ProvisionedThroughputOverride?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *     OnDemandThroughputOverride?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *     SSESpecificationOverride?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreTableToPointInTime(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result restoreTableToPointInTime(array{
 *     SourceTableArn?: string,
 *     SourceTableName?: string,
 *     TargetTableName?: string,
 *     UseLatestRestorableTime?: bool,
 *     RestoreDateTime?: int|string|\DateTimeInterface,
 *     BillingModeOverride?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     GlobalSecondaryIndexOverride?: list<array{
 *         IndexName?: string,
 *         KeySchema?: list<array>,
 *         Projection?: array,
 *         ProvisionedThroughput?: array,
 *         OnDemandThroughput?: array,
 *         WarmThroughput?: array,
 *         ...,
 *     }>,
 *     LocalSecondaryIndexOverride?: list<array{IndexName?: string, KeySchema?: list<array>, Projection?: array, ...}>,
 *     ProvisionedThroughputOverride?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *     OnDemandThroughputOverride?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *     SSESpecificationOverride?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreTableToPointInTimeAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreTableToPointInTimeAsync(array{
 *     SourceTableArn?: string,
 *     SourceTableName?: string,
 *     TargetTableName?: string,
 *     UseLatestRestorableTime?: bool,
 *     RestoreDateTime?: int|string|\DateTimeInterface,
 *     BillingModeOverride?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     GlobalSecondaryIndexOverride?: list<array{
 *         IndexName?: string,
 *         KeySchema?: list<array>,
 *         Projection?: array,
 *         ProvisionedThroughput?: array,
 *         OnDemandThroughput?: array,
 *         WarmThroughput?: array,
 *         ...,
 *     }>,
 *     LocalSecondaryIndexOverride?: list<array{IndexName?: string, KeySchema?: list<array>, Projection?: array, ...}>,
 *     ProvisionedThroughputOverride?: array{ReadCapacityUnits?: int, WriteCapacityUnits?: int, ...},
 *     OnDemandThroughputOverride?: array{MaxReadRequestUnits?: int, MaxWriteRequestUnits?: int, ...},
 *     SSESpecificationOverride?: array{Enabled?: bool, SSEType?: 'AES256'|'KMS', KMSMasterKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result transactGetItems(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result transactGetItems(array{TransactItems?: list<array{Get?: array, ...}>, ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise transactGetItemsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise transactGetItemsAsync(array{TransactItems?: list<array{Get?: array, ...}>, ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL', ...} $args = [])
 * @method \Aws\Result transactWriteItems(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result transactWriteItems(array{
 *     TransactItems?: list<array{ConditionCheck?: array, Put?: array, Delete?: array, Update?: array, ...}>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise transactWriteItemsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise transactWriteItemsAsync(array{
 *     TransactItems?: list<array{ConditionCheck?: array, Put?: array, Delete?: array, Update?: array, ...}>,
 *     ReturnConsumedCapacity?: 'INDEXES'|'NONE'|'TOTAL',
 *     ReturnItemCollectionMetrics?: 'NONE'|'SIZE',
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateContinuousBackups(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result updateContinuousBackups(array{
 *     TableName?: string,
 *     PointInTimeRecoverySpecification?: array{PointInTimeRecoveryEnabled?: bool, RecoveryPeriodInDays?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContinuousBackupsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContinuousBackupsAsync(array{
 *     TableName?: string,
 *     PointInTimeRecoverySpecification?: array{PointInTimeRecoveryEnabled?: bool, RecoveryPeriodInDays?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContributorInsights(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result updateContributorInsights(array{
 *     TableName?: string,
 *     IndexName?: string,
 *     ContributorInsightsAction?: 'DISABLE'|'ENABLE',
 *     ContributorInsightsMode?: 'ACCESSED_AND_THROTTLED_KEYS'|'THROTTLED_KEYS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContributorInsightsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContributorInsightsAsync(array{
 *     TableName?: string,
 *     IndexName?: string,
 *     ContributorInsightsAction?: 'DISABLE'|'ENABLE',
 *     ContributorInsightsMode?: 'ACCESSED_AND_THROTTLED_KEYS'|'THROTTLED_KEYS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGlobalTable(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result updateGlobalTable(array{GlobalTableName?: string, ReplicaUpdates?: list<array{Create?: array, Delete?: array, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalTableAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlobalTableAsync(array{GlobalTableName?: string, ReplicaUpdates?: list<array{Create?: array, Delete?: array, ...}>, ...} $args = [])
 * @method \Aws\Result updateGlobalTableSettings(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result updateGlobalTableSettings(array{
 *     GlobalTableName?: string,
 *     GlobalTableBillingMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     GlobalTableProvisionedWriteCapacityUnits?: int,
 *     GlobalTableProvisionedWriteCapacityAutoScalingSettingsUpdate?: array{
 *         MinimumUnits?: int,
 *         MaximumUnits?: int,
 *         AutoScalingDisabled?: bool,
 *         AutoScalingRoleArn?: string,
 *         ScalingPolicyUpdate?: array{PolicyName?: string, TargetTrackingScalingPolicyConfiguration?: array, ...},
 *         ...,
 *     },
 *     GlobalTableGlobalSecondaryIndexSettingsUpdate?: list<array{
 *         IndexName?: string,
 *         ProvisionedWriteCapacityUnits?: int,
 *         ProvisionedWriteCapacityAutoScalingSettingsUpdate?: array,
 *         ...,
 *     }>,
 *     ReplicaSettingsUpdate?: list<array{
 *         RegionName?: string,
 *         ReplicaProvisionedReadCapacityUnits?: int,
 *         ReplicaProvisionedReadCapacityAutoScalingSettingsUpdate?: array,
 *         ReplicaGlobalSecondaryIndexSettingsUpdate?: list<array>,
 *         ReplicaTableClass?: 'STANDARD'|'STANDARD_INFREQUENT_ACCESS',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalTableSettingsAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlobalTableSettingsAsync(array{
 *     GlobalTableName?: string,
 *     GlobalTableBillingMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *     GlobalTableProvisionedWriteCapacityUnits?: int,
 *     GlobalTableProvisionedWriteCapacityAutoScalingSettingsUpdate?: array{
 *         MinimumUnits?: int,
 *         MaximumUnits?: int,
 *         AutoScalingDisabled?: bool,
 *         AutoScalingRoleArn?: string,
 *         ScalingPolicyUpdate?: array{PolicyName?: string, TargetTrackingScalingPolicyConfiguration?: array, ...},
 *         ...,
 *     },
 *     GlobalTableGlobalSecondaryIndexSettingsUpdate?: list<array{
 *         IndexName?: string,
 *         ProvisionedWriteCapacityUnits?: int,
 *         ProvisionedWriteCapacityAutoScalingSettingsUpdate?: array,
 *         ...,
 *     }>,
 *     ReplicaSettingsUpdate?: list<array{
 *         RegionName?: string,
 *         ReplicaProvisionedReadCapacityUnits?: int,
 *         ReplicaProvisionedReadCapacityAutoScalingSettingsUpdate?: array,
 *         ReplicaGlobalSecondaryIndexSettingsUpdate?: list<array>,
 *         ReplicaTableClass?: 'STANDARD'|'STANDARD_INFREQUENT_ACCESS',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKinesisStreamingDestination(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result updateKinesisStreamingDestination(array{
 *     TableName?: string,
 *     StreamArn?: string,
 *     UpdateKinesisStreamingConfiguration?: array{ApproximateCreationDateTimePrecision?: 'MICROSECOND'|'MILLISECOND', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKinesisStreamingDestinationAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKinesisStreamingDestinationAsync(array{
 *     TableName?: string,
 *     StreamArn?: string,
 *     UpdateKinesisStreamingConfiguration?: array{ApproximateCreationDateTimePrecision?: 'MICROSECOND'|'MILLISECOND', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTableReplicaAutoScaling(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result updateTableReplicaAutoScaling(array{
 *     GlobalSecondaryIndexUpdates?: list<array{IndexName?: string, ProvisionedWriteCapacityAutoScalingUpdate?: array, ...}>,
 *     TableName?: string,
 *     ProvisionedWriteCapacityAutoScalingUpdate?: array{
 *         MinimumUnits?: int,
 *         MaximumUnits?: int,
 *         AutoScalingDisabled?: bool,
 *         AutoScalingRoleArn?: string,
 *         ScalingPolicyUpdate?: array{PolicyName?: string, TargetTrackingScalingPolicyConfiguration?: array, ...},
 *         ...,
 *     },
 *     ReplicaUpdates?: list<array{
 *         RegionName?: string,
 *         ReplicaGlobalSecondaryIndexUpdates?: list<array>,
 *         ReplicaProvisionedReadCapacityAutoScalingUpdate?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableReplicaAutoScalingAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableReplicaAutoScalingAsync(array{
 *     GlobalSecondaryIndexUpdates?: list<array{IndexName?: string, ProvisionedWriteCapacityAutoScalingUpdate?: array, ...}>,
 *     TableName?: string,
 *     ProvisionedWriteCapacityAutoScalingUpdate?: array{
 *         MinimumUnits?: int,
 *         MaximumUnits?: int,
 *         AutoScalingDisabled?: bool,
 *         AutoScalingRoleArn?: string,
 *         ScalingPolicyUpdate?: array{PolicyName?: string, TargetTrackingScalingPolicyConfiguration?: array, ...},
 *         ...,
 *     },
 *     ReplicaUpdates?: list<array{
 *         RegionName?: string,
 *         ReplicaGlobalSecondaryIndexUpdates?: list<array>,
 *         ReplicaProvisionedReadCapacityAutoScalingUpdate?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTimeToLive(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \Aws\Result updateTimeToLive(array{TableName?: string, TimeToLiveSpecification?: array{Enabled?: bool, AttributeName?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTimeToLiveAsync(array $args = []) (supported in versions 2012-08-10)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTimeToLiveAsync(array{TableName?: string, TimeToLiveSpecification?: array{Enabled?: bool, AttributeName?: string, ...}, ...} $args = [])
 */
class DynamoDbClient extends AwsClient
{
    /** @internal Default attempts for the AWS_NEW_RETRIES_2026 path. */
    private const DYNAMODB_MAX_ATTEMPTS = 4;
    /** @internal Base backoff in ms for the AWS_NEW_RETRIES_2026 path. */
    private const DEFAULT_BASE_DELAY_MS = 25;
    /**
     * @internal Legacy-mode fallback when an array config does not specify
     *           max_attempts. Only consulted on the AWS_NEW_RETRIES_2026 path.
     */
    public const DEFAULT_LEGACY_MAX_ATTEMPTS = 10;

    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['retries']['default'] = NewRetriesOptIn::isEnabled()
            ? [__CLASS__, '_defaultRetries']
            : self::DEFAULT_LEGACY_MAX_ATTEMPTS;
        $args['retries']['fn'] = [__CLASS__, '_applyRetryConfig'];
        $args['api_provider']['fn'] = [__CLASS__, '_applyApiProvider'];

        return $args;
    }

    /**
     * @internal Default retry-config provider for the AWS_NEW_RETRIES_2026
     *           path. Falls through to env/INI before applying the DynamoDB
     *           default of {@see self::DYNAMODB_MAX_ATTEMPTS} attempts in
     *           the specs standard mode.
     */
    public static function _defaultRetries()
    {
        return RetryConfigurationProvider::chain(
            RetryConfigurationProvider::env(),
            RetryConfigurationProvider::ini(),
            function () {
                return Create::promiseFor(
                    new RetryConfiguration(
                        RetryConfigurationProvider::getDefaultMode(),
                        self::DYNAMODB_MAX_ATTEMPTS
                    )
                );
            }
        );
    }

    /**
     * Convenience method for instantiating and registering the DynamoDB
     * Session handler with this DynamoDB client object.
     *
     * @param array $config Array of options for the session handler factory
     *
     * @return SessionHandler
     */
    public function registerSessionHandler(array $config = [])
    {
        $handler = SessionHandler::fromClient($this, $config);
        $handler->register();

        return $handler;
    }

    /** @internal */
    public static function _applyRetryConfig($value, array &$args, HandlerList $list)
    {
        if (!$value) {
            return;
        }

        $config = RetryConfigurationProvider::unwrap($value);

        if ($config->getMode() === 'legacy') {
            self::appendLegacyModeRetries($value, $config, $args, $list);
            return;
        }

        if (NewRetriesOptIn::isEnabled()) {
            self::appendStandardModeRetriesNew($config, $args, $list);
            return;
        }

        self::appendStandardModeRetries($config, $args, $list);
    }

    private static function appendLegacyModeRetries(
        $value,
        RetryConfigurationInterface $config,
        array &$args,
        HandlerList $list
    ): void
    {
        $maxRetries = self::resolveLegacyModeMaxRetries($value, $config);

        $list->appendSign(
            Middleware::retry(
                RetryMiddleware::createDefaultDecider(
                    $maxRetries,
                    ['error_codes' => ['TransactionInProgressException']]
                ),
                function ($retries) {
                    return $retries
                        ? RetryMiddleware::exponentialDelay($retries) / 2
                        : 0;
                },
                isset($args['stats']['retries']) ? (bool) $args['stats']['retries'] : false
            ),
            'retry'
        );
    }

    private static function resolveLegacyModeMaxRetries(
        $value,
        RetryConfigurationInterface $config
    ): int
    {
        if (
            NewRetriesOptIn::isEnabled()
            && is_array($value)
            && !isset($value['max_attempts'])
        ) {
            return self::DEFAULT_LEGACY_MAX_ATTEMPTS;
        }

        return $config->getMaxAttempts() - 1;
    }

    private static function appendStandardModeRetries(
        RetryConfigurationInterface $config,
        array &$args,
        HandlerList $list
    ): void
    {
        $list->appendSign(
            RetryMiddlewareV2::wrap(
                $config,
                [
                    'collect_stats' => $args['stats']['retries'],
                    'transient_error_codes' => ['TransactionInProgressException'],
                ]
            ),
            'retry'
        );
    }

    private static function appendStandardModeRetriesNew(
        RetryConfigurationInterface $config,
        array &$args,
        HandlerList $list
    ): void
    {
        $list->appendSign(
            RetryV3Middleware::wrap(
                $config,
                [
                    'collect_stats' => $args['stats']['retries'],
                    'service'       => $args['service'],
                    'base_delay'    => self::DEFAULT_BASE_DELAY_MS,
                    'transient_error_codes' => ['TransactionInProgressException'],
                ]
            ),
            'retry'
        );
    }

    /** @internal */
    public static function _applyApiProvider($value, array &$args, HandlerList $list)
    {
        ClientResolver::_apply_api_provider($value, $args);
        $args['parser'] = new Crc32ValidatingParser($args['parser']);
    }
}
