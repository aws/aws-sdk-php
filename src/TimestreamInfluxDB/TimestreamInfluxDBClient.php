<?php
namespace Aws\TimestreamInfluxDB;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Timestream InfluxDB** service.
 * @method \Aws\Result createDbCluster(array $args = [])
 * @phpstan-method \Aws\Result createDbCluster(array{
 *     name?: string,
 *     username?: string,
 *     password?: string,
 *     organization?: string,
 *     bucket?: string,
 *     port?: int,
 *     dbParameterGroupIdentifier?: string,
 *     dbInstanceType?: 'db.influx.12xlarge'|'db.influx.16xlarge'|'db.influx.24xlarge'|'db.influx.2xlarge'|'db.influx.4xlarge'|'db.influx.8xlarge'|'db.influx.large'|'db.influx.medium'|'db.influx.xlarge',
 *     dbStorageType?: 'InfluxIOIncludedT1'|'InfluxIOIncludedT2'|'InfluxIOIncludedT3',
 *     allocatedStorage?: int,
 *     networkType?: 'DUAL'|'IPV4',
 *     publiclyAccessible?: bool,
 *     vpcSubnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     deploymentType?: 'MULTI_NODE_READ_REPLICAS',
 *     failoverMode?: 'AUTOMATIC'|'NO_FAILOVER',
 *     logDeliveryConfiguration?: array{s3Configuration?: array{bucketName?: string, enabled?: bool, ...}, ...},
 *     maintenanceSchedule?: array{timezone?: string, preferredMaintenanceWindow?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDbClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDbClusterAsync(array{
 *     name?: string,
 *     username?: string,
 *     password?: string,
 *     organization?: string,
 *     bucket?: string,
 *     port?: int,
 *     dbParameterGroupIdentifier?: string,
 *     dbInstanceType?: 'db.influx.12xlarge'|'db.influx.16xlarge'|'db.influx.24xlarge'|'db.influx.2xlarge'|'db.influx.4xlarge'|'db.influx.8xlarge'|'db.influx.large'|'db.influx.medium'|'db.influx.xlarge',
 *     dbStorageType?: 'InfluxIOIncludedT1'|'InfluxIOIncludedT2'|'InfluxIOIncludedT3',
 *     allocatedStorage?: int,
 *     networkType?: 'DUAL'|'IPV4',
 *     publiclyAccessible?: bool,
 *     vpcSubnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     deploymentType?: 'MULTI_NODE_READ_REPLICAS',
 *     failoverMode?: 'AUTOMATIC'|'NO_FAILOVER',
 *     logDeliveryConfiguration?: array{s3Configuration?: array{bucketName?: string, enabled?: bool, ...}, ...},
 *     maintenanceSchedule?: array{timezone?: string, preferredMaintenanceWindow?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDbInstance(array $args = [])
 * @phpstan-method \Aws\Result createDbInstance(array{
 *     name?: string,
 *     username?: string,
 *     password?: string,
 *     organization?: string,
 *     bucket?: string,
 *     dbInstanceType?: 'db.influx.12xlarge'|'db.influx.16xlarge'|'db.influx.24xlarge'|'db.influx.2xlarge'|'db.influx.4xlarge'|'db.influx.8xlarge'|'db.influx.large'|'db.influx.medium'|'db.influx.xlarge',
 *     vpcSubnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     publiclyAccessible?: bool,
 *     dbStorageType?: 'InfluxIOIncludedT1'|'InfluxIOIncludedT2'|'InfluxIOIncludedT3',
 *     allocatedStorage?: int,
 *     dbParameterGroupIdentifier?: string,
 *     deploymentType?: 'SINGLE_AZ'|'WITH_MULTIAZ_STANDBY',
 *     logDeliveryConfiguration?: array{s3Configuration?: array{bucketName?: string, enabled?: bool, ...}, ...},
 *     maintenanceSchedule?: array{timezone?: string, preferredMaintenanceWindow?: string, ...},
 *     tags?: array<string, string>,
 *     port?: int,
 *     networkType?: 'DUAL'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDbInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDbInstanceAsync(array{
 *     name?: string,
 *     username?: string,
 *     password?: string,
 *     organization?: string,
 *     bucket?: string,
 *     dbInstanceType?: 'db.influx.12xlarge'|'db.influx.16xlarge'|'db.influx.24xlarge'|'db.influx.2xlarge'|'db.influx.4xlarge'|'db.influx.8xlarge'|'db.influx.large'|'db.influx.medium'|'db.influx.xlarge',
 *     vpcSubnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     publiclyAccessible?: bool,
 *     dbStorageType?: 'InfluxIOIncludedT1'|'InfluxIOIncludedT2'|'InfluxIOIncludedT3',
 *     allocatedStorage?: int,
 *     dbParameterGroupIdentifier?: string,
 *     deploymentType?: 'SINGLE_AZ'|'WITH_MULTIAZ_STANDBY',
 *     logDeliveryConfiguration?: array{s3Configuration?: array{bucketName?: string, enabled?: bool, ...}, ...},
 *     maintenanceSchedule?: array{timezone?: string, preferredMaintenanceWindow?: string, ...},
 *     tags?: array<string, string>,
 *     port?: int,
 *     networkType?: 'DUAL'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDbParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result createDbParameterGroup(array{
 *     name?: string,
 *     description?: string,
 *     parameters?: array{
 *         InfluxDBv2?: array{
 *             fluxLogEnabled?: bool,
 *             logLevel?: 'debug'|'error'|'info',
 *             noTasks?: bool,
 *             queryConcurrency?: int,
 *             queryQueueSize?: int,
 *             tracingType?: 'disabled'|'jaeger'|'log',
 *             metricsDisabled?: bool,
 *             httpIdleTimeout?: array,
 *             httpReadHeaderTimeout?: array,
 *             httpReadTimeout?: array,
 *             httpWriteTimeout?: array,
 *             influxqlMaxSelectBuckets?: int,
 *             influxqlMaxSelectPoint?: int,
 *             influxqlMaxSelectSeries?: int,
 *             pprofDisabled?: bool,
 *             queryInitialMemoryBytes?: int,
 *             queryMaxMemoryBytes?: int,
 *             queryMemoryBytes?: int,
 *             sessionLength?: int,
 *             sessionRenewDisabled?: bool,
 *             storageCacheMaxMemorySize?: int,
 *             storageCacheSnapshotMemorySize?: int,
 *             storageCacheSnapshotWriteColdDuration?: array,
 *             storageCompactFullWriteColdDuration?: array,
 *             storageCompactThroughputBurst?: int,
 *             storageMaxConcurrentCompactions?: int,
 *             storageMaxIndexLogFileSize?: int,
 *             storageNoValidateFieldSize?: bool,
 *             storageRetentionCheckInterval?: array,
 *             storageSeriesFileMaxConcurrentSnapshotCompactions?: int,
 *             storageSeriesIdSetCacheSize?: int,
 *             storageWalMaxConcurrentWrites?: int,
 *             storageWalMaxWriteDelay?: array,
 *             uiDisabled?: bool,
 *             ...,
 *         },
 *         InfluxDBv3Core?: array{
 *             queryFileLimit?: int,
 *             queryLogSize?: int,
 *             logFilter?: string,
 *             logFormat?: 'full',
 *             dataFusionNumThreads?: int,
 *             dataFusionRuntimeType?: 'multi-thread'|'multi-thread-alt',
 *             dataFusionRuntimeDisableLifoSlot?: bool,
 *             dataFusionRuntimeEventInterval?: int,
 *             dataFusionRuntimeGlobalQueueInterval?: int,
 *             dataFusionRuntimeMaxBlockingThreads?: int,
 *             dataFusionRuntimeMaxIoEventsPerTick?: int,
 *             dataFusionRuntimeThreadKeepAlive?: array,
 *             dataFusionRuntimeThreadPriority?: int,
 *             dataFusionMaxParquetFanout?: int,
 *             dataFusionUseCachedParquetLoader?: bool,
 *             dataFusionConfig?: string,
 *             maxHttpRequestSize?: int,
 *             forceSnapshotMemThreshold?: array,
 *             walSnapshotSize?: int,
 *             walMaxWriteBufferSize?: int,
 *             snapshottedWalFilesToKeep?: int,
 *             preemptiveCacheAge?: array,
 *             parquetMemCachePrunePercentage?: float,
 *             parquetMemCachePruneInterval?: array,
 *             disableParquetMemCache?: bool,
 *             parquetMemCacheQueryPathDuration?: array,
 *             lastCacheEvictionInterval?: array,
 *             distinctCacheEvictionInterval?: array,
 *             gen1Duration?: array,
 *             execMemPoolBytes?: array,
 *             parquetMemCacheSize?: array,
 *             walReplayFailOnError?: bool,
 *             walReplayConcurrencyLimit?: int,
 *             tableIndexCacheMaxEntries?: int,
 *             tableIndexCacheConcurrencyLimit?: int,
 *             gen1LookbackDuration?: array,
 *             retentionCheckInterval?: array,
 *             deleteGracePeriod?: array,
 *             hardDeleteDefaultDuration?: array,
 *             pluginRepositoryUrl?: string,
 *             pluginRepositorySecretArn?: string,
 *             ...,
 *         },
 *         InfluxDBv3Enterprise?: array{
 *             queryFileLimit?: int,
 *             queryLogSize?: int,
 *             logFilter?: string,
 *             logFormat?: 'full',
 *             dataFusionNumThreads?: int,
 *             dataFusionRuntimeType?: 'multi-thread'|'multi-thread-alt',
 *             dataFusionRuntimeDisableLifoSlot?: bool,
 *             dataFusionRuntimeEventInterval?: int,
 *             dataFusionRuntimeGlobalQueueInterval?: int,
 *             dataFusionRuntimeMaxBlockingThreads?: int,
 *             dataFusionRuntimeMaxIoEventsPerTick?: int,
 *             dataFusionRuntimeThreadKeepAlive?: array,
 *             dataFusionRuntimeThreadPriority?: int,
 *             dataFusionMaxParquetFanout?: int,
 *             dataFusionUseCachedParquetLoader?: bool,
 *             dataFusionConfig?: string,
 *             maxHttpRequestSize?: int,
 *             forceSnapshotMemThreshold?: array,
 *             walSnapshotSize?: int,
 *             walMaxWriteBufferSize?: int,
 *             snapshottedWalFilesToKeep?: int,
 *             preemptiveCacheAge?: array,
 *             parquetMemCachePrunePercentage?: float,
 *             parquetMemCachePruneInterval?: array,
 *             disableParquetMemCache?: bool,
 *             parquetMemCacheQueryPathDuration?: array,
 *             lastCacheEvictionInterval?: array,
 *             distinctCacheEvictionInterval?: array,
 *             gen1Duration?: array,
 *             execMemPoolBytes?: array,
 *             parquetMemCacheSize?: array,
 *             walReplayFailOnError?: bool,
 *             walReplayConcurrencyLimit?: int,
 *             tableIndexCacheMaxEntries?: int,
 *             tableIndexCacheConcurrencyLimit?: int,
 *             gen1LookbackDuration?: array,
 *             retentionCheckInterval?: array,
 *             deleteGracePeriod?: array,
 *             hardDeleteDefaultDuration?: array,
 *             pluginRepositoryUrl?: string,
 *             pluginRepositorySecretArn?: string,
 *             ingestQueryInstances?: int,
 *             queryOnlyInstances?: int,
 *             dedicatedCompactor?: bool,
 *             compactionRowLimit?: int,
 *             compactionMaxNumFilesPerPlan?: int,
 *             compactionGen2Duration?: array,
 *             compactionMultipliers?: string,
 *             compactionCleanupWait?: array,
 *             compactionCheckInterval?: array,
 *             lastValueCacheDisableFromHistory?: bool,
 *             distinctValueCacheDisableFromHistory?: bool,
 *             replicationInterval?: array,
 *             catalogSyncInterval?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDbParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDbParameterGroupAsync(array{
 *     name?: string,
 *     description?: string,
 *     parameters?: array{
 *         InfluxDBv2?: array{
 *             fluxLogEnabled?: bool,
 *             logLevel?: 'debug'|'error'|'info',
 *             noTasks?: bool,
 *             queryConcurrency?: int,
 *             queryQueueSize?: int,
 *             tracingType?: 'disabled'|'jaeger'|'log',
 *             metricsDisabled?: bool,
 *             httpIdleTimeout?: array,
 *             httpReadHeaderTimeout?: array,
 *             httpReadTimeout?: array,
 *             httpWriteTimeout?: array,
 *             influxqlMaxSelectBuckets?: int,
 *             influxqlMaxSelectPoint?: int,
 *             influxqlMaxSelectSeries?: int,
 *             pprofDisabled?: bool,
 *             queryInitialMemoryBytes?: int,
 *             queryMaxMemoryBytes?: int,
 *             queryMemoryBytes?: int,
 *             sessionLength?: int,
 *             sessionRenewDisabled?: bool,
 *             storageCacheMaxMemorySize?: int,
 *             storageCacheSnapshotMemorySize?: int,
 *             storageCacheSnapshotWriteColdDuration?: array,
 *             storageCompactFullWriteColdDuration?: array,
 *             storageCompactThroughputBurst?: int,
 *             storageMaxConcurrentCompactions?: int,
 *             storageMaxIndexLogFileSize?: int,
 *             storageNoValidateFieldSize?: bool,
 *             storageRetentionCheckInterval?: array,
 *             storageSeriesFileMaxConcurrentSnapshotCompactions?: int,
 *             storageSeriesIdSetCacheSize?: int,
 *             storageWalMaxConcurrentWrites?: int,
 *             storageWalMaxWriteDelay?: array,
 *             uiDisabled?: bool,
 *             ...,
 *         },
 *         InfluxDBv3Core?: array{
 *             queryFileLimit?: int,
 *             queryLogSize?: int,
 *             logFilter?: string,
 *             logFormat?: 'full',
 *             dataFusionNumThreads?: int,
 *             dataFusionRuntimeType?: 'multi-thread'|'multi-thread-alt',
 *             dataFusionRuntimeDisableLifoSlot?: bool,
 *             dataFusionRuntimeEventInterval?: int,
 *             dataFusionRuntimeGlobalQueueInterval?: int,
 *             dataFusionRuntimeMaxBlockingThreads?: int,
 *             dataFusionRuntimeMaxIoEventsPerTick?: int,
 *             dataFusionRuntimeThreadKeepAlive?: array,
 *             dataFusionRuntimeThreadPriority?: int,
 *             dataFusionMaxParquetFanout?: int,
 *             dataFusionUseCachedParquetLoader?: bool,
 *             dataFusionConfig?: string,
 *             maxHttpRequestSize?: int,
 *             forceSnapshotMemThreshold?: array,
 *             walSnapshotSize?: int,
 *             walMaxWriteBufferSize?: int,
 *             snapshottedWalFilesToKeep?: int,
 *             preemptiveCacheAge?: array,
 *             parquetMemCachePrunePercentage?: float,
 *             parquetMemCachePruneInterval?: array,
 *             disableParquetMemCache?: bool,
 *             parquetMemCacheQueryPathDuration?: array,
 *             lastCacheEvictionInterval?: array,
 *             distinctCacheEvictionInterval?: array,
 *             gen1Duration?: array,
 *             execMemPoolBytes?: array,
 *             parquetMemCacheSize?: array,
 *             walReplayFailOnError?: bool,
 *             walReplayConcurrencyLimit?: int,
 *             tableIndexCacheMaxEntries?: int,
 *             tableIndexCacheConcurrencyLimit?: int,
 *             gen1LookbackDuration?: array,
 *             retentionCheckInterval?: array,
 *             deleteGracePeriod?: array,
 *             hardDeleteDefaultDuration?: array,
 *             pluginRepositoryUrl?: string,
 *             pluginRepositorySecretArn?: string,
 *             ...,
 *         },
 *         InfluxDBv3Enterprise?: array{
 *             queryFileLimit?: int,
 *             queryLogSize?: int,
 *             logFilter?: string,
 *             logFormat?: 'full',
 *             dataFusionNumThreads?: int,
 *             dataFusionRuntimeType?: 'multi-thread'|'multi-thread-alt',
 *             dataFusionRuntimeDisableLifoSlot?: bool,
 *             dataFusionRuntimeEventInterval?: int,
 *             dataFusionRuntimeGlobalQueueInterval?: int,
 *             dataFusionRuntimeMaxBlockingThreads?: int,
 *             dataFusionRuntimeMaxIoEventsPerTick?: int,
 *             dataFusionRuntimeThreadKeepAlive?: array,
 *             dataFusionRuntimeThreadPriority?: int,
 *             dataFusionMaxParquetFanout?: int,
 *             dataFusionUseCachedParquetLoader?: bool,
 *             dataFusionConfig?: string,
 *             maxHttpRequestSize?: int,
 *             forceSnapshotMemThreshold?: array,
 *             walSnapshotSize?: int,
 *             walMaxWriteBufferSize?: int,
 *             snapshottedWalFilesToKeep?: int,
 *             preemptiveCacheAge?: array,
 *             parquetMemCachePrunePercentage?: float,
 *             parquetMemCachePruneInterval?: array,
 *             disableParquetMemCache?: bool,
 *             parquetMemCacheQueryPathDuration?: array,
 *             lastCacheEvictionInterval?: array,
 *             distinctCacheEvictionInterval?: array,
 *             gen1Duration?: array,
 *             execMemPoolBytes?: array,
 *             parquetMemCacheSize?: array,
 *             walReplayFailOnError?: bool,
 *             walReplayConcurrencyLimit?: int,
 *             tableIndexCacheMaxEntries?: int,
 *             tableIndexCacheConcurrencyLimit?: int,
 *             gen1LookbackDuration?: array,
 *             retentionCheckInterval?: array,
 *             deleteGracePeriod?: array,
 *             hardDeleteDefaultDuration?: array,
 *             pluginRepositoryUrl?: string,
 *             pluginRepositorySecretArn?: string,
 *             ingestQueryInstances?: int,
 *             queryOnlyInstances?: int,
 *             dedicatedCompactor?: bool,
 *             compactionRowLimit?: int,
 *             compactionMaxNumFilesPerPlan?: int,
 *             compactionGen2Duration?: array,
 *             compactionMultipliers?: string,
 *             compactionCleanupWait?: array,
 *             compactionCheckInterval?: array,
 *             lastValueCacheDisableFromHistory?: bool,
 *             distinctValueCacheDisableFromHistory?: bool,
 *             replicationInterval?: array,
 *             catalogSyncInterval?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDbCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteDbCluster(array{dbClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDbClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDbClusterAsync(array{dbClusterId?: string, ...} $args = [])
 * @method \Aws\Result deleteDbInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteDbInstance(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDbInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDbInstanceAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getDbCluster(array $args = [])
 * @phpstan-method \Aws\Result getDbCluster(array{dbClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDbClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDbClusterAsync(array{dbClusterId?: string, ...} $args = [])
 * @method \Aws\Result getDbInstance(array $args = [])
 * @phpstan-method \Aws\Result getDbInstance(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDbInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDbInstanceAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getDbParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result getDbParameterGroup(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDbParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDbParameterGroupAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result listDbClusters(array $args = [])
 * @phpstan-method \Aws\Result listDbClusters(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDbClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDbClustersAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDbInstances(array $args = [])
 * @phpstan-method \Aws\Result listDbInstances(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDbInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDbInstancesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDbInstancesForCluster(array $args = [])
 * @phpstan-method \Aws\Result listDbInstancesForCluster(array{dbClusterId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDbInstancesForClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDbInstancesForClusterAsync(array{dbClusterId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDbParameterGroups(array $args = [])
 * @phpstan-method \Aws\Result listDbParameterGroups(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDbParameterGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDbParameterGroupsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result rebootDbCluster(array $args = [])
 * @phpstan-method \Aws\Result rebootDbCluster(array{dbClusterId?: string, instanceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootDbClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootDbClusterAsync(array{dbClusterId?: string, instanceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result rebootDbInstance(array $args = [])
 * @phpstan-method \Aws\Result rebootDbInstance(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootDbInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootDbInstanceAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDbCluster(array $args = [])
 * @phpstan-method \Aws\Result updateDbCluster(array{
 *     dbClusterId?: string,
 *     logDeliveryConfiguration?: array{s3Configuration?: array{bucketName?: string, enabled?: bool, ...}, ...},
 *     dbParameterGroupIdentifier?: string,
 *     port?: int,
 *     dbInstanceType?: 'db.influx.12xlarge'|'db.influx.16xlarge'|'db.influx.24xlarge'|'db.influx.2xlarge'|'db.influx.4xlarge'|'db.influx.8xlarge'|'db.influx.large'|'db.influx.medium'|'db.influx.xlarge',
 *     failoverMode?: 'AUTOMATIC'|'NO_FAILOVER',
 *     maintenanceSchedule?: array{timezone?: string, preferredMaintenanceWindow?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDbClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDbClusterAsync(array{
 *     dbClusterId?: string,
 *     logDeliveryConfiguration?: array{s3Configuration?: array{bucketName?: string, enabled?: bool, ...}, ...},
 *     dbParameterGroupIdentifier?: string,
 *     port?: int,
 *     dbInstanceType?: 'db.influx.12xlarge'|'db.influx.16xlarge'|'db.influx.24xlarge'|'db.influx.2xlarge'|'db.influx.4xlarge'|'db.influx.8xlarge'|'db.influx.large'|'db.influx.medium'|'db.influx.xlarge',
 *     failoverMode?: 'AUTOMATIC'|'NO_FAILOVER',
 *     maintenanceSchedule?: array{timezone?: string, preferredMaintenanceWindow?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDbInstance(array $args = [])
 * @phpstan-method \Aws\Result updateDbInstance(array{
 *     identifier?: string,
 *     logDeliveryConfiguration?: array{s3Configuration?: array{bucketName?: string, enabled?: bool, ...}, ...},
 *     dbParameterGroupIdentifier?: string,
 *     port?: int,
 *     dbInstanceType?: 'db.influx.12xlarge'|'db.influx.16xlarge'|'db.influx.24xlarge'|'db.influx.2xlarge'|'db.influx.4xlarge'|'db.influx.8xlarge'|'db.influx.large'|'db.influx.medium'|'db.influx.xlarge',
 *     deploymentType?: 'SINGLE_AZ'|'WITH_MULTIAZ_STANDBY',
 *     dbStorageType?: 'InfluxIOIncludedT1'|'InfluxIOIncludedT2'|'InfluxIOIncludedT3',
 *     allocatedStorage?: int,
 *     maintenanceSchedule?: array{timezone?: string, preferredMaintenanceWindow?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDbInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDbInstanceAsync(array{
 *     identifier?: string,
 *     logDeliveryConfiguration?: array{s3Configuration?: array{bucketName?: string, enabled?: bool, ...}, ...},
 *     dbParameterGroupIdentifier?: string,
 *     port?: int,
 *     dbInstanceType?: 'db.influx.12xlarge'|'db.influx.16xlarge'|'db.influx.24xlarge'|'db.influx.2xlarge'|'db.influx.4xlarge'|'db.influx.8xlarge'|'db.influx.large'|'db.influx.medium'|'db.influx.xlarge',
 *     deploymentType?: 'SINGLE_AZ'|'WITH_MULTIAZ_STANDBY',
 *     dbStorageType?: 'InfluxIOIncludedT1'|'InfluxIOIncludedT2'|'InfluxIOIncludedT3',
 *     allocatedStorage?: int,
 *     maintenanceSchedule?: array{timezone?: string, preferredMaintenanceWindow?: string, ...},
 *     ...,
 * } $args = [])
 */
class TimestreamInfluxDBClient extends AwsClient {}
