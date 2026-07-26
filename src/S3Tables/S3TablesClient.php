<?php
namespace Aws\S3Tables;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon S3 Tables** service.
 * @method \Aws\Result createNamespace(array $args = [])
 * @phpstan-method \Aws\Result createNamespace(array{tableBucketARN?: string, namespace?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNamespaceAsync(array{tableBucketARN?: string, namespace?: list<string>, ...} $args = [])
 * @method \Aws\Result createTable(array $args = [])
 * @phpstan-method \Aws\Result createTable(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     name?: string,
 *     format?: 'ICEBERG',
 *     metadata?: array{
 *         iceberg?: array{
 *             schema?: array,
 *             schemaV2?: array,
 *             partitionSpec?: array,
 *             writeOrder?: array,
 *             properties?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     encryptionConfiguration?: array{sseAlgorithm?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     storageClassConfiguration?: array{storageClass?: 'INTELLIGENT_TIERING'|'STANDARD', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTableAsync(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     name?: string,
 *     format?: 'ICEBERG',
 *     metadata?: array{
 *         iceberg?: array{
 *             schema?: array,
 *             schemaV2?: array,
 *             partitionSpec?: array,
 *             writeOrder?: array,
 *             properties?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     encryptionConfiguration?: array{sseAlgorithm?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     storageClassConfiguration?: array{storageClass?: 'INTELLIGENT_TIERING'|'STANDARD', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTableBucket(array $args = [])
 * @phpstan-method \Aws\Result createTableBucket(array{
 *     name?: string,
 *     encryptionConfiguration?: array{sseAlgorithm?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     storageClassConfiguration?: array{storageClass?: 'INTELLIGENT_TIERING'|'STANDARD', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTableBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTableBucketAsync(array{
 *     name?: string,
 *     encryptionConfiguration?: array{sseAlgorithm?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     storageClassConfiguration?: array{storageClass?: 'INTELLIGENT_TIERING'|'STANDARD', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteNamespace(array{tableBucketARN?: string, namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array{tableBucketARN?: string, namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteTable(array $args = [])
 * @phpstan-method \Aws\Result deleteTable(array{tableBucketARN?: string, namespace?: string, name?: string, versionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableAsync(array{tableBucketARN?: string, namespace?: string, name?: string, versionToken?: string, ...} $args = [])
 * @method \Aws\Result deleteTableBucket(array $args = [])
 * @phpstan-method \Aws\Result deleteTableBucket(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableBucketAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result deleteTableBucketEncryption(array $args = [])
 * @phpstan-method \Aws\Result deleteTableBucketEncryption(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableBucketEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableBucketEncryptionAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result deleteTableBucketMetricsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteTableBucketMetricsConfiguration(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableBucketMetricsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableBucketMetricsConfigurationAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result deleteTableBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteTableBucketPolicy(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableBucketPolicyAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result deleteTableBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result deleteTableBucketReplication(array{tableBucketARN?: string, versionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableBucketReplicationAsync(array{tableBucketARN?: string, versionToken?: string, ...} $args = [])
 * @method \Aws\Result deleteTablePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteTablePolicy(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTablePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTablePolicyAsync(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result deleteTableReplication(array $args = [])
 * @phpstan-method \Aws\Result deleteTableReplication(array{tableArn?: string, versionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableReplicationAsync(array{tableArn?: string, versionToken?: string, ...} $args = [])
 * @method \Aws\Result getNamespace(array $args = [])
 * @phpstan-method \Aws\Result getNamespace(array{tableBucketARN?: string, namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNamespaceAsync(array{tableBucketARN?: string, namespace?: string, ...} $args = [])
 * @method \Aws\Result getTable(array $args = [])
 * @phpstan-method \Aws\Result getTable(array{tableBucketARN?: string, namespace?: string, name?: string, tableArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableAsync(array{tableBucketARN?: string, namespace?: string, name?: string, tableArn?: string, ...} $args = [])
 * @method \Aws\Result getTableBucket(array $args = [])
 * @phpstan-method \Aws\Result getTableBucket(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableBucketAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result getTableBucketEncryption(array $args = [])
 * @phpstan-method \Aws\Result getTableBucketEncryption(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableBucketEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableBucketEncryptionAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result getTableBucketMaintenanceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getTableBucketMaintenanceConfiguration(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableBucketMaintenanceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableBucketMaintenanceConfigurationAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result getTableBucketMetricsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getTableBucketMetricsConfiguration(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableBucketMetricsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableBucketMetricsConfigurationAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result getTableBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result getTableBucketPolicy(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableBucketPolicyAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result getTableBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result getTableBucketReplication(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableBucketReplicationAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result getTableBucketStorageClass(array $args = [])
 * @phpstan-method \Aws\Result getTableBucketStorageClass(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableBucketStorageClassAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableBucketStorageClassAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result getTableEncryption(array $args = [])
 * @phpstan-method \Aws\Result getTableEncryption(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableEncryptionAsync(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getTableMaintenanceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getTableMaintenanceConfiguration(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableMaintenanceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableMaintenanceConfigurationAsync(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getTableMaintenanceJobStatus(array $args = [])
 * @phpstan-method \Aws\Result getTableMaintenanceJobStatus(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableMaintenanceJobStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableMaintenanceJobStatusAsync(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getTableMetadataLocation(array $args = [])
 * @phpstan-method \Aws\Result getTableMetadataLocation(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableMetadataLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableMetadataLocationAsync(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getTablePolicy(array $args = [])
 * @phpstan-method \Aws\Result getTablePolicy(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTablePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTablePolicyAsync(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getTableRecordExpirationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getTableRecordExpirationConfiguration(array{tableArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableRecordExpirationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableRecordExpirationConfigurationAsync(array{tableArn?: string, ...} $args = [])
 * @method \Aws\Result getTableRecordExpirationJobStatus(array $args = [])
 * @phpstan-method \Aws\Result getTableRecordExpirationJobStatus(array{tableArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableRecordExpirationJobStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableRecordExpirationJobStatusAsync(array{tableArn?: string, ...} $args = [])
 * @method \Aws\Result getTableReplication(array $args = [])
 * @phpstan-method \Aws\Result getTableReplication(array{tableArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableReplicationAsync(array{tableArn?: string, ...} $args = [])
 * @method \Aws\Result getTableReplicationStatus(array $args = [])
 * @phpstan-method \Aws\Result getTableReplicationStatus(array{tableArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableReplicationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableReplicationStatusAsync(array{tableArn?: string, ...} $args = [])
 * @method \Aws\Result getTableStorageClass(array $args = [])
 * @phpstan-method \Aws\Result getTableStorageClass(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableStorageClassAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableStorageClassAsync(array{tableBucketARN?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result listNamespaces(array $args = [])
 * @phpstan-method \Aws\Result listNamespaces(array{tableBucketARN?: string, prefix?: string, continuationToken?: string, maxNamespaces?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNamespacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNamespacesAsync(array{tableBucketARN?: string, prefix?: string, continuationToken?: string, maxNamespaces?: int, ...} $args = [])
 * @method \Aws\Result listTableBuckets(array $args = [])
 * @phpstan-method \Aws\Result listTableBuckets(array{prefix?: string, continuationToken?: string, maxBuckets?: int, type?: 'aws'|'customer', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTableBucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTableBucketsAsync(array{prefix?: string, continuationToken?: string, maxBuckets?: int, type?: 'aws'|'customer', ...} $args = [])
 * @method \Aws\Result listTables(array $args = [])
 * @phpstan-method \Aws\Result listTables(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     prefix?: string,
 *     continuationToken?: string,
 *     maxTables?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTablesAsync(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     prefix?: string,
 *     continuationToken?: string,
 *     maxTables?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putTableBucketEncryption(array $args = [])
 * @phpstan-method \Aws\Result putTableBucketEncryption(array{
 *     tableBucketARN?: string,
 *     encryptionConfiguration?: array{sseAlgorithm?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableBucketEncryptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableBucketEncryptionAsync(array{
 *     tableBucketARN?: string,
 *     encryptionConfiguration?: array{sseAlgorithm?: 'AES256'|'aws:kms', kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTableBucketMaintenanceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putTableBucketMaintenanceConfiguration(array{
 *     tableBucketARN?: string,
 *     type?: 'icebergUnreferencedFileRemoval',
 *     value?: array{status?: 'disabled'|'enabled', settings?: array{icebergUnreferencedFileRemoval?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableBucketMaintenanceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableBucketMaintenanceConfigurationAsync(array{
 *     tableBucketARN?: string,
 *     type?: 'icebergUnreferencedFileRemoval',
 *     value?: array{status?: 'disabled'|'enabled', settings?: array{icebergUnreferencedFileRemoval?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTableBucketMetricsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putTableBucketMetricsConfiguration(array{tableBucketARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableBucketMetricsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableBucketMetricsConfigurationAsync(array{tableBucketARN?: string, ...} $args = [])
 * @method \Aws\Result putTableBucketPolicy(array $args = [])
 * @phpstan-method \Aws\Result putTableBucketPolicy(array{tableBucketARN?: string, resourcePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableBucketPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableBucketPolicyAsync(array{tableBucketARN?: string, resourcePolicy?: string, ...} $args = [])
 * @method \Aws\Result putTableBucketReplication(array $args = [])
 * @phpstan-method \Aws\Result putTableBucketReplication(array{
 *     tableBucketARN?: string,
 *     versionToken?: string,
 *     configuration?: array{role?: string, rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableBucketReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableBucketReplicationAsync(array{
 *     tableBucketARN?: string,
 *     versionToken?: string,
 *     configuration?: array{role?: string, rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTableBucketStorageClass(array $args = [])
 * @phpstan-method \Aws\Result putTableBucketStorageClass(array{
 *     tableBucketARN?: string,
 *     storageClassConfiguration?: array{storageClass?: 'INTELLIGENT_TIERING'|'STANDARD', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableBucketStorageClassAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableBucketStorageClassAsync(array{
 *     tableBucketARN?: string,
 *     storageClassConfiguration?: array{storageClass?: 'INTELLIGENT_TIERING'|'STANDARD', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTableMaintenanceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putTableMaintenanceConfiguration(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     name?: string,
 *     type?: 'icebergCompaction'|'icebergSnapshotManagement',
 *     value?: array{
 *         status?: 'disabled'|'enabled',
 *         settings?: array{icebergCompaction?: array, icebergSnapshotManagement?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableMaintenanceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableMaintenanceConfigurationAsync(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     name?: string,
 *     type?: 'icebergCompaction'|'icebergSnapshotManagement',
 *     value?: array{
 *         status?: 'disabled'|'enabled',
 *         settings?: array{icebergCompaction?: array, icebergSnapshotManagement?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTablePolicy(array $args = [])
 * @phpstan-method \Aws\Result putTablePolicy(array{tableBucketARN?: string, namespace?: string, name?: string, resourcePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putTablePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTablePolicyAsync(array{tableBucketARN?: string, namespace?: string, name?: string, resourcePolicy?: string, ...} $args = [])
 * @method \Aws\Result putTableRecordExpirationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putTableRecordExpirationConfiguration(array{
 *     tableArn?: string,
 *     value?: array{status?: 'disabled'|'enabled', settings?: array{days?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableRecordExpirationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableRecordExpirationConfigurationAsync(array{
 *     tableArn?: string,
 *     value?: array{status?: 'disabled'|'enabled', settings?: array{days?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTableReplication(array $args = [])
 * @phpstan-method \Aws\Result putTableReplication(array{
 *     tableArn?: string,
 *     versionToken?: string,
 *     configuration?: array{role?: string, rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTableReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTableReplicationAsync(array{
 *     tableArn?: string,
 *     versionToken?: string,
 *     configuration?: array{role?: string, rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result renameTable(array $args = [])
 * @phpstan-method \Aws\Result renameTable(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     name?: string,
 *     newNamespaceName?: string,
 *     newName?: string,
 *     versionToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise renameTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise renameTableAsync(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     name?: string,
 *     newNamespaceName?: string,
 *     newName?: string,
 *     versionToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateTableMetadataLocation(array $args = [])
 * @phpstan-method \Aws\Result updateTableMetadataLocation(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     name?: string,
 *     versionToken?: string,
 *     metadataLocation?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableMetadataLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableMetadataLocationAsync(array{
 *     tableBucketARN?: string,
 *     namespace?: string,
 *     name?: string,
 *     versionToken?: string,
 *     metadataLocation?: string,
 *     ...,
 * } $args = [])
 */
class S3TablesClient extends AwsClient {}
