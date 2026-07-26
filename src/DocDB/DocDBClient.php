<?php
namespace Aws\DocDB;

use Aws\AwsClient;
use Aws\PresignUrlMiddleware;

/**
 * This client is used to interact with the **Amazon DocumentDB with MongoDB compatibility** service.
 * @method \Aws\Result addSourceIdentifierToSubscription(array $args = [])
 * @phpstan-method \Aws\Result addSourceIdentifierToSubscription(array{SubscriptionName?: string, SourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addSourceIdentifierToSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addSourceIdentifierToSubscriptionAsync(array{SubscriptionName?: string, SourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addTagsToResource(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result applyPendingMaintenanceAction(array $args = [])
 * @phpstan-method \Aws\Result applyPendingMaintenanceAction(array{ResourceIdentifier?: string, ApplyAction?: string, OptInType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array{ResourceIdentifier?: string, ApplyAction?: string, OptInType?: string, ...} $args = [])
 * @method \Aws\Result copyDBClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result copyDBClusterParameterGroup(array{
 *     SourceDBClusterParameterGroupIdentifier?: string,
 *     TargetDBClusterParameterGroupIdentifier?: string,
 *     TargetDBClusterParameterGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyDBClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyDBClusterParameterGroupAsync(array{
 *     SourceDBClusterParameterGroupIdentifier?: string,
 *     TargetDBClusterParameterGroupIdentifier?: string,
 *     TargetDBClusterParameterGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyDBClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result copyDBClusterSnapshot(array{
 *     SourceDBClusterSnapshotIdentifier?: string,
 *     TargetDBClusterSnapshotIdentifier?: string,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     CopyTags?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyDBClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyDBClusterSnapshotAsync(array{
 *     SourceDBClusterSnapshotIdentifier?: string,
 *     TargetDBClusterSnapshotIdentifier?: string,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     CopyTags?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBCluster(array $args = [])
 * @phpstan-method \Aws\Result createDBCluster(array{
 *     AvailabilityZones?: list<string>,
 *     BackupRetentionPeriod?: int,
 *     DBClusterIdentifier?: string,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     DBSubnetGroupName?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DeletionProtection?: bool,
 *     GlobalClusterIdentifier?: string,
 *     StorageType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, ...},
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     NetworkType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBClusterAsync(array{
 *     AvailabilityZones?: list<string>,
 *     BackupRetentionPeriod?: int,
 *     DBClusterIdentifier?: string,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     DBSubnetGroupName?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StorageEncrypted?: bool,
 *     KmsKeyId?: string,
 *     PreSignedUrl?: string,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DeletionProtection?: bool,
 *     GlobalClusterIdentifier?: string,
 *     StorageType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, ...},
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     NetworkType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result createDBClusterParameterGroup(array{
 *     DBClusterParameterGroupName?: string,
 *     DBParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBClusterParameterGroupAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     DBParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createDBClusterSnapshot(array{
 *     DBClusterSnapshotIdentifier?: string,
 *     DBClusterIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBClusterSnapshotAsync(array{
 *     DBClusterSnapshotIdentifier?: string,
 *     DBClusterIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBInstance(array $args = [])
 * @phpstan-method \Aws\Result createDBInstance(array{
 *     DBInstanceIdentifier?: string,
 *     DBInstanceClass?: string,
 *     Engine?: string,
 *     AvailabilityZone?: string,
 *     PreferredMaintenanceWindow?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DBClusterIdentifier?: string,
 *     CopyTagsToSnapshot?: bool,
 *     PromotionTier?: int,
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     CACertificateIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBInstanceAsync(array{
 *     DBInstanceIdentifier?: string,
 *     DBInstanceClass?: string,
 *     Engine?: string,
 *     AvailabilityZone?: string,
 *     PreferredMaintenanceWindow?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DBClusterIdentifier?: string,
 *     CopyTagsToSnapshot?: bool,
 *     PromotionTier?: int,
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     CACertificateIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDBSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result createDBSubnetGroup(array{
 *     DBSubnetGroupName?: string,
 *     DBSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDBSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDBSubnetGroupAsync(array{
 *     DBSubnetGroupName?: string,
 *     DBSubnetGroupDescription?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
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
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
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
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlobalCluster(array $args = [])
 * @phpstan-method \Aws\Result createGlobalCluster(array{
 *     GlobalClusterIdentifier?: string,
 *     SourceDBClusterIdentifier?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DeletionProtection?: bool,
 *     DatabaseName?: string,
 *     StorageEncrypted?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlobalClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlobalClusterAsync(array{
 *     GlobalClusterIdentifier?: string,
 *     SourceDBClusterIdentifier?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DeletionProtection?: bool,
 *     DatabaseName?: string,
 *     StorageEncrypted?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDBCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteDBCluster(array{DBClusterIdentifier?: string, SkipFinalSnapshot?: bool, FinalDBSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBClusterAsync(array{DBClusterIdentifier?: string, SkipFinalSnapshot?: bool, FinalDBSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDBClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDBClusterParameterGroup(array{DBClusterParameterGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBClusterParameterGroupAsync(array{DBClusterParameterGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteDBClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteDBClusterSnapshot(array{DBClusterSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBClusterSnapshotAsync(array{DBClusterSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDBInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteDBInstance(array{DBInstanceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBInstanceAsync(array{DBInstanceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDBSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDBSubnetGroup(array{DBSubnetGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDBSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDBSubnetGroupAsync(array{DBSubnetGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteEventSubscription(array{SubscriptionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array{SubscriptionName?: string, ...} $args = [])
 * @method \Aws\Result deleteGlobalCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteGlobalCluster(array{GlobalClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlobalClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlobalClusterAsync(array{GlobalClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeCertificates(array $args = [])
 * @phpstan-method \Aws\Result describeCertificates(array{
 *     CertificateIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificatesAsync(array{
 *     CertificateIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterParameterGroups(array $args = [])
 * @phpstan-method \Aws\Result describeDBClusterParameterGroups(array{
 *     DBClusterParameterGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterParameterGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterParameterGroupsAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterParameters(array $args = [])
 * @phpstan-method \Aws\Result describeDBClusterParameters(array{
 *     DBClusterParameterGroupName?: string,
 *     Source?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterParametersAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     Source?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusterSnapshotAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeDBClusterSnapshotAttributes(array{DBClusterSnapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterSnapshotAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterSnapshotAttributesAsync(array{DBClusterSnapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeDBClusterSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeDBClusterSnapshots(array{
 *     DBClusterIdentifier?: string,
 *     DBClusterSnapshotIdentifier?: string,
 *     SnapshotType?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     IncludeShared?: bool,
 *     IncludePublic?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClusterSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClusterSnapshotsAsync(array{
 *     DBClusterIdentifier?: string,
 *     DBClusterSnapshotIdentifier?: string,
 *     SnapshotType?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     IncludeShared?: bool,
 *     IncludePublic?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBClusters(array $args = [])
 * @phpstan-method \Aws\Result describeDBClusters(array{
 *     DBClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBClustersAsync(array{
 *     DBClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBEngineVersions(array $args = [])
 * @phpstan-method \Aws\Result describeDBEngineVersions(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DefaultOnly?: bool,
 *     ListSupportedCharacterSets?: bool,
 *     ListSupportedTimezones?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBEngineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBEngineVersionsAsync(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     DefaultOnly?: bool,
 *     ListSupportedCharacterSets?: bool,
 *     ListSupportedTimezones?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBInstances(array $args = [])
 * @phpstan-method \Aws\Result describeDBInstances(array{
 *     DBInstanceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBInstancesAsync(array{
 *     DBInstanceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDBSubnetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeDBSubnetGroups(array{
 *     DBSubnetGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDBSubnetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDBSubnetGroupsAsync(array{
 *     DBSubnetGroupName?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEngineDefaultClusterParameters(array $args = [])
 * @phpstan-method \Aws\Result describeEngineDefaultClusterParameters(array{
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEngineDefaultClusterParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEngineDefaultClusterParametersAsync(array{
 *     DBParameterGroupFamily?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
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
 *     SourceType?: 'db-cluster'|'db-cluster-snapshot'|'db-instance'|'db-parameter-group'|'db-security-group'|'db-snapshot',
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
 *     SourceType?: 'db-cluster'|'db-cluster-snapshot'|'db-instance'|'db-parameter-group'|'db-security-group'|'db-snapshot',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     EventCategories?: list<string>,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeGlobalClusters(array $args = [])
 * @phpstan-method \Aws\Result describeGlobalClusters(array{
 *     GlobalClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGlobalClustersAsync(array{
 *     GlobalClusterIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOrderableDBInstanceOptions(array $args = [])
 * @phpstan-method \Aws\Result describeOrderableDBInstanceOptions(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DBInstanceClass?: string,
 *     LicenseModel?: string,
 *     Vpc?: bool,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrderableDBInstanceOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrderableDBInstanceOptionsAsync(array{
 *     Engine?: string,
 *     EngineVersion?: string,
 *     DBInstanceClass?: string,
 *     LicenseModel?: string,
 *     Vpc?: bool,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePendingMaintenanceActions(array $args = [])
 * @phpstan-method \Aws\Result describePendingMaintenanceActions(array{
 *     ResourceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array{
 *     ResourceIdentifier?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result failoverDBCluster(array $args = [])
 * @phpstan-method \Aws\Result failoverDBCluster(array{DBClusterIdentifier?: string, TargetDBInstanceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise failoverDBClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise failoverDBClusterAsync(array{DBClusterIdentifier?: string, TargetDBInstanceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result failoverGlobalCluster(array $args = [])
 * @phpstan-method \Aws\Result failoverGlobalCluster(array{
 *     GlobalClusterIdentifier?: string,
 *     TargetDbClusterIdentifier?: string,
 *     AllowDataLoss?: bool,
 *     Switchover?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise failoverGlobalClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise failoverGlobalClusterAsync(array{
 *     GlobalClusterIdentifier?: string,
 *     TargetDbClusterIdentifier?: string,
 *     AllowDataLoss?: bool,
 *     Switchover?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceName?: string, Filters?: list<array{Name?: string, Values?: list<string>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceName?: string, Filters?: list<array{Name?: string, Values?: list<string>, ...}>, ...} $args = [])
 * @method \Aws\Result modifyDBCluster(array $args = [])
 * @phpstan-method \Aws\Result modifyDBCluster(array{
 *     DBClusterIdentifier?: string,
 *     NewDBClusterIdentifier?: string,
 *     ApplyImmediately?: bool,
 *     BackupRetentionPeriod?: int,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Port?: int,
 *     MasterUserPassword?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     CloudwatchLogsExportConfiguration?: array{EnableLogTypes?: list<string>, DisableLogTypes?: list<string>, ...},
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     DeletionProtection?: bool,
 *     StorageType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, ...},
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     RotateMasterUserPassword?: bool,
 *     NetworkType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBClusterAsync(array{
 *     DBClusterIdentifier?: string,
 *     NewDBClusterIdentifier?: string,
 *     ApplyImmediately?: bool,
 *     BackupRetentionPeriod?: int,
 *     DBClusterParameterGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Port?: int,
 *     MasterUserPassword?: string,
 *     PreferredBackupWindow?: string,
 *     PreferredMaintenanceWindow?: string,
 *     CloudwatchLogsExportConfiguration?: array{EnableLogTypes?: list<string>, DisableLogTypes?: list<string>, ...},
 *     EngineVersion?: string,
 *     AllowMajorVersionUpgrade?: bool,
 *     DeletionProtection?: bool,
 *     StorageType?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, ...},
 *     ManageMasterUserPassword?: bool,
 *     MasterUserSecretKmsKeyId?: string,
 *     RotateMasterUserPassword?: bool,
 *     NetworkType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyDBClusterParameterGroup(array{
 *     DBClusterParameterGroupName?: string,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBClusterParameterGroupAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBClusterSnapshotAttribute(array $args = [])
 * @phpstan-method \Aws\Result modifyDBClusterSnapshotAttribute(array{
 *     DBClusterSnapshotIdentifier?: string,
 *     AttributeName?: string,
 *     ValuesToAdd?: list<string>,
 *     ValuesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBClusterSnapshotAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBClusterSnapshotAttributeAsync(array{
 *     DBClusterSnapshotIdentifier?: string,
 *     AttributeName?: string,
 *     ValuesToAdd?: list<string>,
 *     ValuesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBInstance(array $args = [])
 * @phpstan-method \Aws\Result modifyDBInstance(array{
 *     DBInstanceIdentifier?: string,
 *     DBInstanceClass?: string,
 *     ApplyImmediately?: bool,
 *     PreferredMaintenanceWindow?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     NewDBInstanceIdentifier?: string,
 *     CACertificateIdentifier?: string,
 *     CopyTagsToSnapshot?: bool,
 *     PromotionTier?: int,
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     CertificateRotationRestart?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBInstanceAsync(array{
 *     DBInstanceIdentifier?: string,
 *     DBInstanceClass?: string,
 *     ApplyImmediately?: bool,
 *     PreferredMaintenanceWindow?: string,
 *     AutoMinorVersionUpgrade?: bool,
 *     NewDBInstanceIdentifier?: string,
 *     CACertificateIdentifier?: string,
 *     CopyTagsToSnapshot?: bool,
 *     PromotionTier?: int,
 *     EnablePerformanceInsights?: bool,
 *     PerformanceInsightsKMSKeyId?: string,
 *     CertificateRotationRestart?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDBSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyDBSubnetGroup(array{DBSubnetGroupName?: string, DBSubnetGroupDescription?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDBSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDBSubnetGroupAsync(array{DBSubnetGroupName?: string, DBSubnetGroupDescription?: string, SubnetIds?: list<string>, ...} $args = [])
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
 * @method \Aws\Result modifyGlobalCluster(array $args = [])
 * @phpstan-method \Aws\Result modifyGlobalCluster(array{GlobalClusterIdentifier?: string, NewGlobalClusterIdentifier?: string, DeletionProtection?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyGlobalClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyGlobalClusterAsync(array{GlobalClusterIdentifier?: string, NewGlobalClusterIdentifier?: string, DeletionProtection?: bool, ...} $args = [])
 * @method \Aws\Result rebootDBInstance(array $args = [])
 * @phpstan-method \Aws\Result rebootDBInstance(array{DBInstanceIdentifier?: string, ForceFailover?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootDBInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootDBInstanceAsync(array{DBInstanceIdentifier?: string, ForceFailover?: bool, ...} $args = [])
 * @method \Aws\Result removeFromGlobalCluster(array $args = [])
 * @phpstan-method \Aws\Result removeFromGlobalCluster(array{GlobalClusterIdentifier?: string, DbClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFromGlobalClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeFromGlobalClusterAsync(array{GlobalClusterIdentifier?: string, DbClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result removeSourceIdentifierFromSubscription(array $args = [])
 * @phpstan-method \Aws\Result removeSourceIdentifierFromSubscription(array{SubscriptionName?: string, SourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeSourceIdentifierFromSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeSourceIdentifierFromSubscriptionAsync(array{SubscriptionName?: string, SourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromResource(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result resetDBClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result resetDBClusterParameterGroup(array{
 *     DBClusterParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resetDBClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetDBClusterParameterGroupAsync(array{
 *     DBClusterParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         ApplyType?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ApplyMethod?: 'immediate'|'pending-reboot',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDBClusterFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreDBClusterFromSnapshot(array{
 *     AvailabilityZones?: list<string>,
 *     DBClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     DBSubnetGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DeletionProtection?: bool,
 *     DBClusterParameterGroupName?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, ...},
 *     StorageType?: string,
 *     NetworkType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDBClusterFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDBClusterFromSnapshotAsync(array{
 *     AvailabilityZones?: list<string>,
 *     DBClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     Engine?: string,
 *     EngineVersion?: string,
 *     Port?: int,
 *     DBSubnetGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DeletionProtection?: bool,
 *     DBClusterParameterGroupName?: string,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, ...},
 *     StorageType?: string,
 *     NetworkType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDBClusterToPointInTime(array $args = [])
 * @phpstan-method \Aws\Result restoreDBClusterToPointInTime(array{
 *     DBClusterIdentifier?: string,
 *     RestoreType?: string,
 *     SourceDBClusterIdentifier?: string,
 *     RestoreToTime?: int|string|\DateTimeInterface,
 *     UseLatestRestorableTime?: bool,
 *     Port?: int,
 *     DBSubnetGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DeletionProtection?: bool,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, ...},
 *     StorageType?: string,
 *     NetworkType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDBClusterToPointInTimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDBClusterToPointInTimeAsync(array{
 *     DBClusterIdentifier?: string,
 *     RestoreType?: string,
 *     SourceDBClusterIdentifier?: string,
 *     RestoreToTime?: int|string|\DateTimeInterface,
 *     UseLatestRestorableTime?: bool,
 *     Port?: int,
 *     DBSubnetGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnableCloudwatchLogsExports?: list<string>,
 *     DeletionProtection?: bool,
 *     ServerlessV2ScalingConfiguration?: array{MinCapacity?: float, MaxCapacity?: float, ...},
 *     StorageType?: string,
 *     NetworkType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDBCluster(array $args = [])
 * @phpstan-method \Aws\Result startDBCluster(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDBClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDBClusterAsync(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopDBCluster(array $args = [])
 * @phpstan-method \Aws\Result stopDBCluster(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDBClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDBClusterAsync(array{DBClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result switchoverGlobalCluster(array $args = [])
 * @phpstan-method \Aws\Result switchoverGlobalCluster(array{GlobalClusterIdentifier?: string, TargetDbClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise switchoverGlobalClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise switchoverGlobalClusterAsync(array{GlobalClusterIdentifier?: string, TargetDbClusterIdentifier?: string, ...} $args = [])
 */
class DocDBClient extends AwsClient {
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerList()->appendInit(
                PresignUrlMiddleware::wrap(
                    $this,
                    $args['endpoint_provider'],
                    [
                        'operations' => [
                            'CopyDBClusterSnapshot',
                            'CreateDBCluster',
                        ],
                        'service' => 'rds',
                        'presign_param' => 'PreSignedUrl',
                        'require_different_region' => true,
                        'extra_query_params' => [
                            'CopyDBClusterSnapshot' => ['DestinationRegion'],
                            'CreateDBCluster' => ['DestinationRegion'],
                        ]
                    ]
                ),
                'rds.presigner'
            );
        };
        parent::__construct($args);
    }
}
