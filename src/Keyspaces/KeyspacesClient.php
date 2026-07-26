<?php
namespace Aws\Keyspaces;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Keyspaces** service.
 * @method \Aws\Result createKeyspace(array $args = [])
 * @phpstan-method \Aws\Result createKeyspace(array{
 *     keyspaceName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     replicationSpecification?: array{replicationStrategy?: 'MULTI_REGION'|'SINGLE_REGION', regionList?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeyspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeyspaceAsync(array{
 *     keyspaceName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     replicationSpecification?: array{replicationStrategy?: 'MULTI_REGION'|'SINGLE_REGION', regionList?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTable(array $args = [])
 * @phpstan-method \Aws\Result createTable(array{
 *     keyspaceName?: string,
 *     tableName?: string,
 *     schemaDefinition?: array{
 *         allColumns?: list<array>,
 *         partitionKeys?: list<array>,
 *         clusteringKeys?: list<array>,
 *         staticColumns?: list<array>,
 *         ...,
 *     },
 *     comment?: array{message?: string, ...},
 *     capacitySpecification?: array{
 *         throughputMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *         readCapacityUnits?: int,
 *         writeCapacityUnits?: int,
 *         ...,
 *     },
 *     encryptionSpecification?: array{type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyIdentifier?: string, ...},
 *     pointInTimeRecovery?: array{status?: 'DISABLED'|'ENABLED', ...},
 *     ttl?: array{status?: 'ENABLED', ...},
 *     defaultTimeToLive?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientSideTimestamps?: array{status?: 'ENABLED', ...},
 *     autoScalingSpecification?: array{
 *         writeCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         readCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         ...,
 *     },
 *     replicaSpecifications?: list<array{region?: string, readCapacityUnits?: int, readCapacityAutoScaling?: array, ...}>,
 *     cdcSpecification?: array{
 *         status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING',
 *         viewType?: 'KEYS_ONLY'|'NEW_AND_OLD_IMAGES'|'NEW_IMAGE'|'OLD_IMAGE',
 *         tags?: list<array>,
 *         propagateTags?: 'NONE'|'TABLE',
 *         ...,
 *     },
 *     warmThroughputSpecification?: array{readUnitsPerSecond?: int, writeUnitsPerSecond?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTableAsync(array{
 *     keyspaceName?: string,
 *     tableName?: string,
 *     schemaDefinition?: array{
 *         allColumns?: list<array>,
 *         partitionKeys?: list<array>,
 *         clusteringKeys?: list<array>,
 *         staticColumns?: list<array>,
 *         ...,
 *     },
 *     comment?: array{message?: string, ...},
 *     capacitySpecification?: array{
 *         throughputMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *         readCapacityUnits?: int,
 *         writeCapacityUnits?: int,
 *         ...,
 *     },
 *     encryptionSpecification?: array{type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyIdentifier?: string, ...},
 *     pointInTimeRecovery?: array{status?: 'DISABLED'|'ENABLED', ...},
 *     ttl?: array{status?: 'ENABLED', ...},
 *     defaultTimeToLive?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientSideTimestamps?: array{status?: 'ENABLED', ...},
 *     autoScalingSpecification?: array{
 *         writeCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         readCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         ...,
 *     },
 *     replicaSpecifications?: list<array{region?: string, readCapacityUnits?: int, readCapacityAutoScaling?: array, ...}>,
 *     cdcSpecification?: array{
 *         status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING',
 *         viewType?: 'KEYS_ONLY'|'NEW_AND_OLD_IMAGES'|'NEW_IMAGE'|'OLD_IMAGE',
 *         tags?: list<array>,
 *         propagateTags?: 'NONE'|'TABLE',
 *         ...,
 *     },
 *     warmThroughputSpecification?: array{readUnitsPerSecond?: int, writeUnitsPerSecond?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createType(array $args = [])
 * @phpstan-method \Aws\Result createType(array{
 *     keyspaceName?: string,
 *     typeName?: string,
 *     fieldDefinitions?: list<array{name?: string, type?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTypeAsync(array{
 *     keyspaceName?: string,
 *     typeName?: string,
 *     fieldDefinitions?: list<array{name?: string, type?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteKeyspace(array $args = [])
 * @phpstan-method \Aws\Result deleteKeyspace(array{keyspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeyspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeyspaceAsync(array{keyspaceName?: string, ...} $args = [])
 * @method \Aws\Result deleteTable(array $args = [])
 * @phpstan-method \Aws\Result deleteTable(array{keyspaceName?: string, tableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableAsync(array{keyspaceName?: string, tableName?: string, ...} $args = [])
 * @method \Aws\Result deleteType(array $args = [])
 * @phpstan-method \Aws\Result deleteType(array{keyspaceName?: string, typeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTypeAsync(array{keyspaceName?: string, typeName?: string, ...} $args = [])
 * @method \Aws\Result getKeyspace(array $args = [])
 * @phpstan-method \Aws\Result getKeyspace(array{keyspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyspaceAsync(array{keyspaceName?: string, ...} $args = [])
 * @method \Aws\Result getTable(array $args = [])
 * @phpstan-method \Aws\Result getTable(array{keyspaceName?: string, tableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableAsync(array{keyspaceName?: string, tableName?: string, ...} $args = [])
 * @method \Aws\Result getTableAutoScalingSettings(array $args = [])
 * @phpstan-method \Aws\Result getTableAutoScalingSettings(array{keyspaceName?: string, tableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableAutoScalingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableAutoScalingSettingsAsync(array{keyspaceName?: string, tableName?: string, ...} $args = [])
 * @method \Aws\Result getType(array $args = [])
 * @phpstan-method \Aws\Result getType(array{keyspaceName?: string, typeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTypeAsync(array{keyspaceName?: string, typeName?: string, ...} $args = [])
 * @method \Aws\Result listKeyspaces(array $args = [])
 * @phpstan-method \Aws\Result listKeyspaces(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeyspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeyspacesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTables(array $args = [])
 * @phpstan-method \Aws\Result listTables(array{nextToken?: string, maxResults?: int, keyspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTablesAsync(array{nextToken?: string, maxResults?: int, keyspaceName?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTypes(array $args = [])
 * @phpstan-method \Aws\Result listTypes(array{nextToken?: string, maxResults?: int, keyspaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTypesAsync(array{nextToken?: string, maxResults?: int, keyspaceName?: string, ...} $args = [])
 * @method \Aws\Result restoreTable(array $args = [])
 * @phpstan-method \Aws\Result restoreTable(array{
 *     sourceKeyspaceName?: string,
 *     sourceTableName?: string,
 *     targetKeyspaceName?: string,
 *     targetTableName?: string,
 *     restoreTimestamp?: int|string|\DateTimeInterface,
 *     capacitySpecificationOverride?: array{
 *         throughputMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *         readCapacityUnits?: int,
 *         writeCapacityUnits?: int,
 *         ...,
 *     },
 *     encryptionSpecificationOverride?: array{type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyIdentifier?: string, ...},
 *     pointInTimeRecoveryOverride?: array{status?: 'DISABLED'|'ENABLED', ...},
 *     tagsOverride?: list<array{key?: string, value?: string, ...}>,
 *     autoScalingSpecification?: array{
 *         writeCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         readCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         ...,
 *     },
 *     replicaSpecifications?: list<array{region?: string, readCapacityUnits?: int, readCapacityAutoScaling?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreTableAsync(array{
 *     sourceKeyspaceName?: string,
 *     sourceTableName?: string,
 *     targetKeyspaceName?: string,
 *     targetTableName?: string,
 *     restoreTimestamp?: int|string|\DateTimeInterface,
 *     capacitySpecificationOverride?: array{
 *         throughputMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *         readCapacityUnits?: int,
 *         writeCapacityUnits?: int,
 *         ...,
 *     },
 *     encryptionSpecificationOverride?: array{type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyIdentifier?: string, ...},
 *     pointInTimeRecoveryOverride?: array{status?: 'DISABLED'|'ENABLED', ...},
 *     tagsOverride?: list<array{key?: string, value?: string, ...}>,
 *     autoScalingSpecification?: array{
 *         writeCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         readCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         ...,
 *     },
 *     replicaSpecifications?: list<array{region?: string, readCapacityUnits?: int, readCapacityAutoScaling?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result updateKeyspace(array $args = [])
 * @phpstan-method \Aws\Result updateKeyspace(array{
 *     keyspaceName?: string,
 *     replicationSpecification?: array{replicationStrategy?: 'MULTI_REGION'|'SINGLE_REGION', regionList?: list<string>, ...},
 *     clientSideTimestamps?: array{status?: 'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKeyspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKeyspaceAsync(array{
 *     keyspaceName?: string,
 *     replicationSpecification?: array{replicationStrategy?: 'MULTI_REGION'|'SINGLE_REGION', regionList?: list<string>, ...},
 *     clientSideTimestamps?: array{status?: 'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTable(array $args = [])
 * @phpstan-method \Aws\Result updateTable(array{
 *     keyspaceName?: string,
 *     tableName?: string,
 *     addColumns?: list<array{name?: string, type?: string, ...}>,
 *     capacitySpecification?: array{
 *         throughputMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *         readCapacityUnits?: int,
 *         writeCapacityUnits?: int,
 *         ...,
 *     },
 *     encryptionSpecification?: array{type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyIdentifier?: string, ...},
 *     pointInTimeRecovery?: array{status?: 'DISABLED'|'ENABLED', ...},
 *     ttl?: array{status?: 'ENABLED', ...},
 *     defaultTimeToLive?: int,
 *     clientSideTimestamps?: array{status?: 'ENABLED', ...},
 *     autoScalingSpecification?: array{
 *         writeCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         readCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         ...,
 *     },
 *     replicaSpecifications?: list<array{region?: string, readCapacityUnits?: int, readCapacityAutoScaling?: array, ...}>,
 *     cdcSpecification?: array{
 *         status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING',
 *         viewType?: 'KEYS_ONLY'|'NEW_AND_OLD_IMAGES'|'NEW_IMAGE'|'OLD_IMAGE',
 *         tags?: list<array>,
 *         propagateTags?: 'NONE'|'TABLE',
 *         ...,
 *     },
 *     warmThroughputSpecification?: array{readUnitsPerSecond?: int, writeUnitsPerSecond?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableAsync(array{
 *     keyspaceName?: string,
 *     tableName?: string,
 *     addColumns?: list<array{name?: string, type?: string, ...}>,
 *     capacitySpecification?: array{
 *         throughputMode?: 'PAY_PER_REQUEST'|'PROVISIONED',
 *         readCapacityUnits?: int,
 *         writeCapacityUnits?: int,
 *         ...,
 *     },
 *     encryptionSpecification?: array{type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyIdentifier?: string, ...},
 *     pointInTimeRecovery?: array{status?: 'DISABLED'|'ENABLED', ...},
 *     ttl?: array{status?: 'ENABLED', ...},
 *     defaultTimeToLive?: int,
 *     clientSideTimestamps?: array{status?: 'ENABLED', ...},
 *     autoScalingSpecification?: array{
 *         writeCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         readCapacityAutoScaling?: array{autoScalingDisabled?: bool, minimumUnits?: int, maximumUnits?: int, scalingPolicy?: array, ...},
 *         ...,
 *     },
 *     replicaSpecifications?: list<array{region?: string, readCapacityUnits?: int, readCapacityAutoScaling?: array, ...}>,
 *     cdcSpecification?: array{
 *         status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING',
 *         viewType?: 'KEYS_ONLY'|'NEW_AND_OLD_IMAGES'|'NEW_IMAGE'|'OLD_IMAGE',
 *         tags?: list<array>,
 *         propagateTags?: 'NONE'|'TABLE',
 *         ...,
 *     },
 *     warmThroughputSpecification?: array{readUnitsPerSecond?: int, writeUnitsPerSecond?: int, ...},
 *     ...,
 * } $args = [])
 */
class KeyspacesClient extends AwsClient {}
