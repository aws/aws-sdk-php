<?php
namespace Aws\RedshiftServerless;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Redshift Serverless** service.
 * @method \Aws\Result convertRecoveryPointToSnapshot(array $args = [])
 * @phpstan-method \Aws\Result convertRecoveryPointToSnapshot(array{
 *     recoveryPointId?: string,
 *     retentionPeriod?: int,
 *     snapshotName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise convertRecoveryPointToSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise convertRecoveryPointToSnapshotAsync(array{
 *     recoveryPointId?: string,
 *     retentionPeriod?: int,
 *     snapshotName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result createCustomDomainAssociation(array{customDomainCertificateArn?: string, customDomainName?: string, workgroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomDomainAssociationAsync(array{customDomainCertificateArn?: string, customDomainName?: string, workgroupName?: string, ...} $args = [])
 * @method \Aws\Result createEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result createEndpointAccess(array{
 *     endpointName?: string,
 *     ownerAccount?: string,
 *     subnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointAccessAsync(array{
 *     endpointName?: string,
 *     ownerAccount?: string,
 *     subnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNamespace(array $args = [])
 * @phpstan-method \Aws\Result createNamespace(array{
 *     adminPasswordSecretKmsKeyId?: string,
 *     adminUserPassword?: string,
 *     adminUsername?: string,
 *     dbName?: string,
 *     defaultIamRoleArn?: string,
 *     iamRoles?: list<string>,
 *     kmsKeyId?: string,
 *     logExports?: list<'connectionlog'|'useractivitylog'|'userlog'>,
 *     manageAdminPassword?: bool,
 *     namespaceName?: string,
 *     redshiftIdcApplicationArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNamespaceAsync(array{
 *     adminPasswordSecretKmsKeyId?: string,
 *     adminUserPassword?: string,
 *     adminUsername?: string,
 *     dbName?: string,
 *     defaultIamRoleArn?: string,
 *     iamRoles?: list<string>,
 *     kmsKeyId?: string,
 *     logExports?: list<'connectionlog'|'useractivitylog'|'userlog'>,
 *     manageAdminPassword?: bool,
 *     namespaceName?: string,
 *     redshiftIdcApplicationArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReservation(array $args = [])
 * @phpstan-method \Aws\Result createReservation(array{capacity?: int, clientToken?: string, offeringId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReservationAsync(array{capacity?: int, clientToken?: string, offeringId?: string, ...} $args = [])
 * @method \Aws\Result createScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result createScheduledAction(array{
 *     enabled?: bool,
 *     endTime?: int|string|\DateTimeInterface,
 *     namespaceName?: string,
 *     roleArn?: string,
 *     schedule?: array{at?: int|string|\DateTimeInterface, cron?: string, ...},
 *     scheduledActionDescription?: string,
 *     scheduledActionName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     targetAction?: array{
 *         createSnapshot?: array{namespaceName?: string, retentionPeriod?: int, snapshotNamePrefix?: string, tags?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduledActionAsync(array{
 *     enabled?: bool,
 *     endTime?: int|string|\DateTimeInterface,
 *     namespaceName?: string,
 *     roleArn?: string,
 *     schedule?: array{at?: int|string|\DateTimeInterface, cron?: string, ...},
 *     scheduledActionDescription?: string,
 *     scheduledActionName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     targetAction?: array{
 *         createSnapshot?: array{namespaceName?: string, retentionPeriod?: int, snapshotNamePrefix?: string, tags?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createSnapshot(array{
 *     namespaceName?: string,
 *     retentionPeriod?: int,
 *     snapshotName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotAsync(array{
 *     namespaceName?: string,
 *     retentionPeriod?: int,
 *     snapshotName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshotCopyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createSnapshotCopyConfiguration(array{
 *     destinationKmsKeyId?: string,
 *     destinationRegion?: string,
 *     namespaceName?: string,
 *     snapshotRetentionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotCopyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotCopyConfigurationAsync(array{
 *     destinationKmsKeyId?: string,
 *     destinationRegion?: string,
 *     namespaceName?: string,
 *     snapshotRetentionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUsageLimit(array $args = [])
 * @phpstan-method \Aws\Result createUsageLimit(array{
 *     amount?: int,
 *     breachAction?: 'deactivate'|'emit-metric'|'log',
 *     period?: 'daily'|'monthly'|'weekly',
 *     resourceArn?: string,
 *     usageType?: 'cross-region-datasharing'|'serverless-compute',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUsageLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUsageLimitAsync(array{
 *     amount?: int,
 *     breachAction?: 'deactivate'|'emit-metric'|'log',
 *     period?: 'daily'|'monthly'|'weekly',
 *     resourceArn?: string,
 *     usageType?: 'cross-region-datasharing'|'serverless-compute',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkgroup(array $args = [])
 * @phpstan-method \Aws\Result createWorkgroup(array{
 *     baseCapacity?: int,
 *     configParameters?: list<array{parameterKey?: string, parameterValue?: string, ...}>,
 *     enhancedVpcRouting?: bool,
 *     extraComputeForAutomaticOptimization?: bool,
 *     ipAddressType?: string,
 *     maxCapacity?: int,
 *     namespaceName?: string,
 *     port?: int,
 *     pricePerformanceTarget?: array{level?: int, status?: 'DISABLED'|'ENABLED', ...},
 *     publiclyAccessible?: bool,
 *     securityGroupIds?: list<string>,
 *     subnetIds?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     trackName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkgroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkgroupAsync(array{
 *     baseCapacity?: int,
 *     configParameters?: list<array{parameterKey?: string, parameterValue?: string, ...}>,
 *     enhancedVpcRouting?: bool,
 *     extraComputeForAutomaticOptimization?: bool,
 *     ipAddressType?: string,
 *     maxCapacity?: int,
 *     namespaceName?: string,
 *     port?: int,
 *     pricePerformanceTarget?: array{level?: int, status?: 'DISABLED'|'ENABLED', ...},
 *     publiclyAccessible?: bool,
 *     securityGroupIds?: list<string>,
 *     subnetIds?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     trackName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCustomDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomDomainAssociation(array{customDomainName?: string, workgroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomDomainAssociationAsync(array{customDomainName?: string, workgroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpointAccess(array{endpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAccessAsync(array{endpointName?: string, ...} $args = [])
 * @method \Aws\Result deleteNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteNamespace(array{finalSnapshotName?: string, finalSnapshotRetentionPeriod?: int, namespaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array{finalSnapshotName?: string, finalSnapshotRetentionPeriod?: int, namespaceName?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduledAction(array{scheduledActionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array{scheduledActionName?: string, ...} $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshot(array{snapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array{snapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteSnapshotCopyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshotCopyConfiguration(array{snapshotCopyConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotCopyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotCopyConfigurationAsync(array{snapshotCopyConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result deleteUsageLimit(array $args = [])
 * @phpstan-method \Aws\Result deleteUsageLimit(array{usageLimitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUsageLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUsageLimitAsync(array{usageLimitId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkgroup(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkgroup(array{workgroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkgroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkgroupAsync(array{workgroupName?: string, ...} $args = [])
 * @method \Aws\Result getDbCredentials(array $args = [])
 * @phpstan-method \Aws\Result getDbCredentials(array{customDomainName?: string, dbName?: string, durationSeconds?: int, workgroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDbCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDbCredentialsAsync(array{customDomainName?: string, dbName?: string, durationSeconds?: int, workgroupName?: string, ...} $args = [])
 * @method \Aws\Result getCustomDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result getCustomDomainAssociation(array{customDomainName?: string, workgroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomDomainAssociationAsync(array{customDomainName?: string, workgroupName?: string, ...} $args = [])
 * @method \Aws\Result getEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result getEndpointAccess(array{endpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEndpointAccessAsync(array{endpointName?: string, ...} $args = [])
 * @method \Aws\Result getIdentityCenterAuthToken(array $args = [])
 * @phpstan-method \Aws\Result getIdentityCenterAuthToken(array{workgroupNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityCenterAuthTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityCenterAuthTokenAsync(array{workgroupNames?: list<string>, ...} $args = [])
 * @method \Aws\Result getNamespace(array $args = [])
 * @phpstan-method \Aws\Result getNamespace(array{namespaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNamespaceAsync(array{namespaceName?: string, ...} $args = [])
 * @method \Aws\Result getRecoveryPoint(array $args = [])
 * @phpstan-method \Aws\Result getRecoveryPoint(array{recoveryPointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecoveryPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecoveryPointAsync(array{recoveryPointId?: string, ...} $args = [])
 * @method \Aws\Result getReservation(array $args = [])
 * @phpstan-method \Aws\Result getReservation(array{reservationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReservationAsync(array{reservationId?: string, ...} $args = [])
 * @method \Aws\Result getReservationOffering(array $args = [])
 * @phpstan-method \Aws\Result getReservationOffering(array{offeringId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservationOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReservationOfferingAsync(array{offeringId?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result getScheduledAction(array{scheduledActionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScheduledActionAsync(array{scheduledActionName?: string, ...} $args = [])
 * @method \Aws\Result getSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getSnapshot(array{ownerAccount?: string, snapshotArn?: string, snapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSnapshotAsync(array{ownerAccount?: string, snapshotArn?: string, snapshotName?: string, ...} $args = [])
 * @method \Aws\Result getTableRestoreStatus(array $args = [])
 * @phpstan-method \Aws\Result getTableRestoreStatus(array{tableRestoreRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableRestoreStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableRestoreStatusAsync(array{tableRestoreRequestId?: string, ...} $args = [])
 * @method \Aws\Result getTrack(array $args = [])
 * @phpstan-method \Aws\Result getTrack(array{trackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrackAsync(array{trackName?: string, ...} $args = [])
 * @method \Aws\Result getUsageLimit(array $args = [])
 * @phpstan-method \Aws\Result getUsageLimit(array{usageLimitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsageLimitAsync(array{usageLimitId?: string, ...} $args = [])
 * @method \Aws\Result getWorkgroup(array $args = [])
 * @phpstan-method \Aws\Result getWorkgroup(array{workgroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkgroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkgroupAsync(array{workgroupName?: string, ...} $args = [])
 * @method \Aws\Result listCustomDomainAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCustomDomainAssociations(array{
 *     customDomainCertificateArn?: string,
 *     customDomainName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomDomainAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomDomainAssociationsAsync(array{
 *     customDomainCertificateArn?: string,
 *     customDomainName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result listEndpointAccess(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     ownerAccount?: string,
 *     vpcId?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEndpointAccessAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     ownerAccount?: string,
 *     vpcId?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listManagedWorkgroups(array $args = [])
 * @phpstan-method \Aws\Result listManagedWorkgroups(array{maxResults?: int, nextToken?: string, sourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedWorkgroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedWorkgroupsAsync(array{maxResults?: int, nextToken?: string, sourceArn?: string, ...} $args = [])
 * @method \Aws\Result listNamespaces(array $args = [])
 * @phpstan-method \Aws\Result listNamespaces(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNamespacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNamespacesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRecoveryPoints(array $args = [])
 * @phpstan-method \Aws\Result listRecoveryPoints(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     namespaceArn?: string,
 *     namespaceName?: string,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecoveryPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecoveryPointsAsync(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     namespaceArn?: string,
 *     namespaceName?: string,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReservationOfferings(array $args = [])
 * @phpstan-method \Aws\Result listReservationOfferings(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReservationOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReservationOfferingsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listReservations(array $args = [])
 * @phpstan-method \Aws\Result listReservations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReservationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReservationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listScheduledActions(array $args = [])
 * @phpstan-method \Aws\Result listScheduledActions(array{maxResults?: int, namespaceName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduledActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduledActionsAsync(array{maxResults?: int, namespaceName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSnapshotCopyConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listSnapshotCopyConfigurations(array{maxResults?: int, namespaceName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSnapshotCopyConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSnapshotCopyConfigurationsAsync(array{maxResults?: int, namespaceName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listSnapshots(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     namespaceArn?: string,
 *     namespaceName?: string,
 *     nextToken?: string,
 *     ownerAccount?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSnapshotsAsync(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     namespaceArn?: string,
 *     namespaceName?: string,
 *     nextToken?: string,
 *     ownerAccount?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTableRestoreStatus(array $args = [])
 * @phpstan-method \Aws\Result listTableRestoreStatus(array{maxResults?: int, namespaceName?: string, nextToken?: string, workgroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTableRestoreStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTableRestoreStatusAsync(array{maxResults?: int, namespaceName?: string, nextToken?: string, workgroupName?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTracks(array $args = [])
 * @phpstan-method \Aws\Result listTracks(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTracksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTracksAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listUsageLimits(array $args = [])
 * @phpstan-method \Aws\Result listUsageLimits(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     resourceArn?: string,
 *     usageType?: 'cross-region-datasharing'|'serverless-compute',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsageLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsageLimitsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     resourceArn?: string,
 *     usageType?: 'cross-region-datasharing'|'serverless-compute',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkgroups(array $args = [])
 * @phpstan-method \Aws\Result listWorkgroups(array{maxResults?: int, nextToken?: string, ownerAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkgroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkgroupsAsync(array{maxResults?: int, nextToken?: string, ownerAccount?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{policy?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{policy?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result restoreFromRecoveryPoint(array $args = [])
 * @phpstan-method \Aws\Result restoreFromRecoveryPoint(array{
 *     maintainIntegration?: bool,
 *     namespaceName?: string,
 *     recoveryPointId?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreFromRecoveryPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreFromRecoveryPointAsync(array{
 *     maintainIntegration?: bool,
 *     namespaceName?: string,
 *     recoveryPointId?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreFromSnapshot(array{
 *     adminPasswordSecretKmsKeyId?: string,
 *     maintainIntegration?: bool,
 *     manageAdminPassword?: bool,
 *     namespaceName?: string,
 *     ownerAccount?: string,
 *     snapshotArn?: string,
 *     snapshotName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreFromSnapshotAsync(array{
 *     adminPasswordSecretKmsKeyId?: string,
 *     maintainIntegration?: bool,
 *     manageAdminPassword?: bool,
 *     namespaceName?: string,
 *     ownerAccount?: string,
 *     snapshotArn?: string,
 *     snapshotName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreTableFromRecoveryPoint(array $args = [])
 * @phpstan-method \Aws\Result restoreTableFromRecoveryPoint(array{
 *     activateCaseSensitiveIdentifier?: bool,
 *     namespaceName?: string,
 *     newTableName?: string,
 *     recoveryPointId?: string,
 *     sourceDatabaseName?: string,
 *     sourceSchemaName?: string,
 *     sourceTableName?: string,
 *     targetDatabaseName?: string,
 *     targetSchemaName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreTableFromRecoveryPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreTableFromRecoveryPointAsync(array{
 *     activateCaseSensitiveIdentifier?: bool,
 *     namespaceName?: string,
 *     newTableName?: string,
 *     recoveryPointId?: string,
 *     sourceDatabaseName?: string,
 *     sourceSchemaName?: string,
 *     sourceTableName?: string,
 *     targetDatabaseName?: string,
 *     targetSchemaName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreTableFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreTableFromSnapshot(array{
 *     activateCaseSensitiveIdentifier?: bool,
 *     namespaceName?: string,
 *     newTableName?: string,
 *     snapshotName?: string,
 *     sourceDatabaseName?: string,
 *     sourceSchemaName?: string,
 *     sourceTableName?: string,
 *     targetDatabaseName?: string,
 *     targetSchemaName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreTableFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreTableFromSnapshotAsync(array{
 *     activateCaseSensitiveIdentifier?: bool,
 *     namespaceName?: string,
 *     newTableName?: string,
 *     snapshotName?: string,
 *     sourceDatabaseName?: string,
 *     sourceSchemaName?: string,
 *     sourceTableName?: string,
 *     targetDatabaseName?: string,
 *     targetSchemaName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCustomDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateCustomDomainAssociation(array{customDomainCertificateArn?: string, customDomainName?: string, workgroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomDomainAssociationAsync(array{customDomainCertificateArn?: string, customDomainName?: string, workgroupName?: string, ...} $args = [])
 * @method \Aws\Result updateEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result updateEndpointAccess(array{endpointName?: string, vpcSecurityGroupIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEndpointAccessAsync(array{endpointName?: string, vpcSecurityGroupIds?: list<string>, ...} $args = [])
 * @method \Aws\Result updateLakehouseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateLakehouseConfiguration(array{
 *     catalogName?: string,
 *     dryRun?: bool,
 *     lakehouseIdcApplicationArn?: string,
 *     lakehouseIdcRegistration?: 'Associate'|'Disassociate',
 *     lakehouseRegistration?: 'Deregister'|'Register',
 *     namespaceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLakehouseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLakehouseConfigurationAsync(array{
 *     catalogName?: string,
 *     dryRun?: bool,
 *     lakehouseIdcApplicationArn?: string,
 *     lakehouseIdcRegistration?: 'Associate'|'Disassociate',
 *     lakehouseRegistration?: 'Deregister'|'Register',
 *     namespaceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNamespace(array $args = [])
 * @phpstan-method \Aws\Result updateNamespace(array{
 *     adminPasswordSecretKmsKeyId?: string,
 *     adminUserPassword?: string,
 *     adminUsername?: string,
 *     defaultIamRoleArn?: string,
 *     iamRoles?: list<string>,
 *     kmsKeyId?: string,
 *     logExports?: list<'connectionlog'|'useractivitylog'|'userlog'>,
 *     manageAdminPassword?: bool,
 *     namespaceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNamespaceAsync(array{
 *     adminPasswordSecretKmsKeyId?: string,
 *     adminUserPassword?: string,
 *     adminUsername?: string,
 *     defaultIamRoleArn?: string,
 *     iamRoles?: list<string>,
 *     kmsKeyId?: string,
 *     logExports?: list<'connectionlog'|'useractivitylog'|'userlog'>,
 *     manageAdminPassword?: bool,
 *     namespaceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result updateScheduledAction(array{
 *     enabled?: bool,
 *     endTime?: int|string|\DateTimeInterface,
 *     roleArn?: string,
 *     schedule?: array{at?: int|string|\DateTimeInterface, cron?: string, ...},
 *     scheduledActionDescription?: string,
 *     scheduledActionName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     targetAction?: array{
 *         createSnapshot?: array{namespaceName?: string, retentionPeriod?: int, snapshotNamePrefix?: string, tags?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduledActionAsync(array{
 *     enabled?: bool,
 *     endTime?: int|string|\DateTimeInterface,
 *     roleArn?: string,
 *     schedule?: array{at?: int|string|\DateTimeInterface, cron?: string, ...},
 *     scheduledActionDescription?: string,
 *     scheduledActionName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     targetAction?: array{
 *         createSnapshot?: array{namespaceName?: string, retentionPeriod?: int, snapshotNamePrefix?: string, tags?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSnapshot(array $args = [])
 * @phpstan-method \Aws\Result updateSnapshot(array{retentionPeriod?: int, snapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSnapshotAsync(array{retentionPeriod?: int, snapshotName?: string, ...} $args = [])
 * @method \Aws\Result updateSnapshotCopyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateSnapshotCopyConfiguration(array{snapshotCopyConfigurationId?: string, snapshotRetentionPeriod?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSnapshotCopyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSnapshotCopyConfigurationAsync(array{snapshotCopyConfigurationId?: string, snapshotRetentionPeriod?: int, ...} $args = [])
 * @method \Aws\Result updateUsageLimit(array $args = [])
 * @phpstan-method \Aws\Result updateUsageLimit(array{amount?: int, breachAction?: 'deactivate'|'emit-metric'|'log', usageLimitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUsageLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUsageLimitAsync(array{amount?: int, breachAction?: 'deactivate'|'emit-metric'|'log', usageLimitId?: string, ...} $args = [])
 * @method \Aws\Result updateWorkgroup(array $args = [])
 * @phpstan-method \Aws\Result updateWorkgroup(array{
 *     baseCapacity?: int,
 *     configParameters?: list<array{parameterKey?: string, parameterValue?: string, ...}>,
 *     enhancedVpcRouting?: bool,
 *     extraComputeForAutomaticOptimization?: bool,
 *     ipAddressType?: string,
 *     maxCapacity?: int,
 *     port?: int,
 *     pricePerformanceTarget?: array{level?: int, status?: 'DISABLED'|'ENABLED', ...},
 *     publiclyAccessible?: bool,
 *     securityGroupIds?: list<string>,
 *     subnetIds?: list<string>,
 *     trackName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkgroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkgroupAsync(array{
 *     baseCapacity?: int,
 *     configParameters?: list<array{parameterKey?: string, parameterValue?: string, ...}>,
 *     enhancedVpcRouting?: bool,
 *     extraComputeForAutomaticOptimization?: bool,
 *     ipAddressType?: string,
 *     maxCapacity?: int,
 *     port?: int,
 *     pricePerformanceTarget?: array{level?: int, status?: 'DISABLED'|'ENABLED', ...},
 *     publiclyAccessible?: bool,
 *     securityGroupIds?: list<string>,
 *     subnetIds?: list<string>,
 *     trackName?: string,
 *     workgroupName?: string,
 *     ...,
 * } $args = [])
 */
class RedshiftServerlessClient extends AwsClient {}
