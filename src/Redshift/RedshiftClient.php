<?php
namespace Aws\Redshift;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Redshift** service.
 *
 * @method \Aws\Result acceptReservedNodeExchange(array $args = [])
 * @phpstan-method \Aws\Result acceptReservedNodeExchange(array{ReservedNodeId?: string, TargetReservedNodeOfferingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptReservedNodeExchangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptReservedNodeExchangeAsync(array{ReservedNodeId?: string, TargetReservedNodeOfferingId?: string, ...} $args = [])
 * @method \Aws\Result addPartner(array $args = [])
 * @phpstan-method \Aws\Result addPartner(array{AccountId?: string, ClusterIdentifier?: string, DatabaseName?: string, PartnerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addPartnerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addPartnerAsync(array{AccountId?: string, ClusterIdentifier?: string, DatabaseName?: string, PartnerName?: string, ...} $args = [])
 * @method \Aws\Result associateDataShareConsumer(array $args = [])
 * @phpstan-method \Aws\Result associateDataShareConsumer(array{
 *     DataShareArn?: string,
 *     AssociateEntireAccount?: bool,
 *     ConsumerArn?: string,
 *     ConsumerRegion?: string,
 *     AllowWrites?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDataShareConsumerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDataShareConsumerAsync(array{
 *     DataShareArn?: string,
 *     AssociateEntireAccount?: bool,
 *     ConsumerArn?: string,
 *     ConsumerRegion?: string,
 *     AllowWrites?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result authorizeClusterSecurityGroupIngress(array $args = [])
 * @phpstan-method \Aws\Result authorizeClusterSecurityGroupIngress(array{
 *     ClusterSecurityGroupName?: string,
 *     CIDRIP?: string,
 *     EC2SecurityGroupName?: string,
 *     EC2SecurityGroupOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeClusterSecurityGroupIngressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeClusterSecurityGroupIngressAsync(array{
 *     ClusterSecurityGroupName?: string,
 *     CIDRIP?: string,
 *     EC2SecurityGroupName?: string,
 *     EC2SecurityGroupOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result authorizeDataShare(array $args = [])
 * @phpstan-method \Aws\Result authorizeDataShare(array{DataShareArn?: string, ConsumerIdentifier?: string, AllowWrites?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeDataShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeDataShareAsync(array{DataShareArn?: string, ConsumerIdentifier?: string, AllowWrites?: bool, ...} $args = [])
 * @method \Aws\Result authorizeEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result authorizeEndpointAccess(array{ClusterIdentifier?: string, Account?: string, VpcIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeEndpointAccessAsync(array{ClusterIdentifier?: string, Account?: string, VpcIds?: list<string>, ...} $args = [])
 * @method \Aws\Result authorizeSnapshotAccess(array $args = [])
 * @phpstan-method \Aws\Result authorizeSnapshotAccess(array{
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     SnapshotClusterIdentifier?: string,
 *     AccountWithRestoreAccess?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeSnapshotAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeSnapshotAccessAsync(array{
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     SnapshotClusterIdentifier?: string,
 *     AccountWithRestoreAccess?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteClusterSnapshots(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteClusterSnapshots(array{Identifiers?: list<array{SnapshotIdentifier?: string, SnapshotClusterIdentifier?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteClusterSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteClusterSnapshotsAsync(array{Identifiers?: list<array{SnapshotIdentifier?: string, SnapshotClusterIdentifier?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchModifyClusterSnapshots(array $args = [])
 * @phpstan-method \Aws\Result batchModifyClusterSnapshots(array{SnapshotIdentifierList?: list<string>, ManualSnapshotRetentionPeriod?: int, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchModifyClusterSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchModifyClusterSnapshotsAsync(array{SnapshotIdentifierList?: list<string>, ManualSnapshotRetentionPeriod?: int, Force?: bool, ...} $args = [])
 * @method \Aws\Result cancelResize(array $args = [])
 * @phpstan-method \Aws\Result cancelResize(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelResizeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelResizeAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result copyClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result copyClusterSnapshot(array{
 *     SourceSnapshotIdentifier?: string,
 *     SourceSnapshotClusterIdentifier?: string,
 *     TargetSnapshotIdentifier?: string,
 *     ManualSnapshotRetentionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyClusterSnapshotAsync(array{
 *     SourceSnapshotIdentifier?: string,
 *     SourceSnapshotClusterIdentifier?: string,
 *     TargetSnapshotIdentifier?: string,
 *     ManualSnapshotRetentionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAuthenticationProfile(array $args = [])
 * @phpstan-method \Aws\Result createAuthenticationProfile(array{AuthenticationProfileName?: string, AuthenticationProfileContent?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAuthenticationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAuthenticationProfileAsync(array{AuthenticationProfileName?: string, AuthenticationProfileContent?: string, ...} $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     DBName?: string,
 *     ClusterIdentifier?: string,
 *     ClusterType?: string,
 *     NodeType?: string,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     ClusterSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     ClusterSubnetGroupName?: string,
 *     AvailabilityZone?: string,
 *     PreferredMaintenanceWindow?: string,
 *     ClusterParameterGroupName?: string,
 *     AutomatedSnapshotRetentionPeriod?: int,
 *     ManualSnapshotRetentionPeriod?: int,
 *     Port?: int,
 *     ClusterVersion?: string,
 *     AllowVersionUpgrade?: bool,
 *     NumberOfNodes?: int,
 *     PubliclyAccessible?: bool,
 *     Encrypted?: bool,
 *     HsmClientCertificateIdentifier?: string,
 *     HsmConfigurationIdentifier?: string,
 *     ElasticIp?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnhancedVpcRouting?: bool,
 *     AdditionalInfo?: string,
 *     IamRoles?: list<string>,
 *     MaintenanceTrackName?: string,
 *     SnapshotScheduleIdentifier?: string,
 *     AvailabilityZoneRelocation?: bool,
 *     AquaConfigurationStatus?: 'auto'|'disabled'|'enabled',
 *     DefaultIamRoleArn?: string,
 *     LoadSampleData?: string,
 *     ManageMasterPassword?: bool,
 *     MasterPasswordSecretKmsKeyId?: string,
 *     IpAddressType?: string,
 *     MultiAZ?: bool,
 *     RedshiftIdcApplicationArn?: string,
 *     CatalogName?: string,
 *     ExtraComputeForAutomaticOptimization?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     DBName?: string,
 *     ClusterIdentifier?: string,
 *     ClusterType?: string,
 *     NodeType?: string,
 *     MasterUsername?: string,
 *     MasterUserPassword?: string,
 *     ClusterSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     ClusterSubnetGroupName?: string,
 *     AvailabilityZone?: string,
 *     PreferredMaintenanceWindow?: string,
 *     ClusterParameterGroupName?: string,
 *     AutomatedSnapshotRetentionPeriod?: int,
 *     ManualSnapshotRetentionPeriod?: int,
 *     Port?: int,
 *     ClusterVersion?: string,
 *     AllowVersionUpgrade?: bool,
 *     NumberOfNodes?: int,
 *     PubliclyAccessible?: bool,
 *     Encrypted?: bool,
 *     HsmClientCertificateIdentifier?: string,
 *     HsmConfigurationIdentifier?: string,
 *     ElasticIp?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     EnhancedVpcRouting?: bool,
 *     AdditionalInfo?: string,
 *     IamRoles?: list<string>,
 *     MaintenanceTrackName?: string,
 *     SnapshotScheduleIdentifier?: string,
 *     AvailabilityZoneRelocation?: bool,
 *     AquaConfigurationStatus?: 'auto'|'disabled'|'enabled',
 *     DefaultIamRoleArn?: string,
 *     LoadSampleData?: string,
 *     ManageMasterPassword?: bool,
 *     MasterPasswordSecretKmsKeyId?: string,
 *     IpAddressType?: string,
 *     MultiAZ?: bool,
 *     RedshiftIdcApplicationArn?: string,
 *     CatalogName?: string,
 *     ExtraComputeForAutomaticOptimization?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result createClusterParameterGroup(array{
 *     ParameterGroupName?: string,
 *     ParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterParameterGroupAsync(array{
 *     ParameterGroupName?: string,
 *     ParameterGroupFamily?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClusterSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result createClusterSecurityGroup(array{
 *     ClusterSecurityGroupName?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterSecurityGroupAsync(array{
 *     ClusterSecurityGroupName?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createClusterSnapshot(array{
 *     SnapshotIdentifier?: string,
 *     ClusterIdentifier?: string,
 *     ManualSnapshotRetentionPeriod?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterSnapshotAsync(array{
 *     SnapshotIdentifier?: string,
 *     ClusterIdentifier?: string,
 *     ManualSnapshotRetentionPeriod?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClusterSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result createClusterSubnetGroup(array{
 *     ClusterSubnetGroupName?: string,
 *     Description?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterSubnetGroupAsync(array{
 *     ClusterSubnetGroupName?: string,
 *     Description?: string,
 *     SubnetIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result createCustomDomainAssociation(array{CustomDomainName?: string, CustomDomainCertificateArn?: string, ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomDomainAssociationAsync(array{CustomDomainName?: string, CustomDomainCertificateArn?: string, ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result createEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result createEndpointAccess(array{
 *     ClusterIdentifier?: string,
 *     ResourceOwner?: string,
 *     EndpointName?: string,
 *     SubnetGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointAccessAsync(array{
 *     ClusterIdentifier?: string,
 *     ResourceOwner?: string,
 *     EndpointName?: string,
 *     SubnetGroupName?: string,
 *     VpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result createEventSubscription(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     SourceIds?: list<string>,
 *     EventCategories?: list<string>,
 *     Severity?: string,
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     SourceIds?: list<string>,
 *     EventCategories?: list<string>,
 *     Severity?: string,
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHsmClientCertificate(array $args = [])
 * @phpstan-method \Aws\Result createHsmClientCertificate(array{HsmClientCertificateIdentifier?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createHsmClientCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHsmClientCertificateAsync(array{HsmClientCertificateIdentifier?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createHsmConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createHsmConfiguration(array{
 *     HsmConfigurationIdentifier?: string,
 *     Description?: string,
 *     HsmIpAddress?: string,
 *     HsmPartitionName?: string,
 *     HsmPartitionPassword?: string,
 *     HsmServerPublicCertificate?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHsmConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHsmConfigurationAsync(array{
 *     HsmConfigurationIdentifier?: string,
 *     Description?: string,
 *     HsmIpAddress?: string,
 *     HsmPartitionName?: string,
 *     HsmPartitionPassword?: string,
 *     HsmServerPublicCertificate?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegration(array $args = [])
 * @phpstan-method \Aws\Result createIntegration(array{
 *     SourceArn?: string,
 *     TargetArn?: string,
 *     IntegrationName?: string,
 *     KMSKeyId?: string,
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     AdditionalEncryptionContext?: array<string, string>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationAsync(array{
 *     SourceArn?: string,
 *     TargetArn?: string,
 *     IntegrationName?: string,
 *     KMSKeyId?: string,
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     AdditionalEncryptionContext?: array<string, string>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQev2IdcApplication(array $args = [])
 * @phpstan-method \Aws\Result createQev2IdcApplication(array{
 *     IdcInstanceArn?: string,
 *     Qev2IdcApplicationName?: string,
 *     IdcDisplayName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQev2IdcApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQev2IdcApplicationAsync(array{
 *     IdcInstanceArn?: string,
 *     Qev2IdcApplicationName?: string,
 *     IdcDisplayName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRedshiftIdcApplication(array $args = [])
 * @phpstan-method \Aws\Result createRedshiftIdcApplication(array{
 *     IdcInstanceArn?: string,
 *     RedshiftIdcApplicationName?: string,
 *     IdentityNamespace?: string,
 *     IdcDisplayName?: string,
 *     IamRoleArn?: string,
 *     AuthorizedTokenIssuerList?: list<array{TrustedTokenIssuerArn?: string, AuthorizedAudiencesList?: list<string>, ...}>,
 *     ServiceIntegrations?: list<array{LakeFormation?: list<array>, S3AccessGrants?: list<array>, Redshift?: list<array>, ...}>,
 *     ApplicationType?: 'Lakehouse'|'None',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SsoTagKeys?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRedshiftIdcApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRedshiftIdcApplicationAsync(array{
 *     IdcInstanceArn?: string,
 *     RedshiftIdcApplicationName?: string,
 *     IdentityNamespace?: string,
 *     IdcDisplayName?: string,
 *     IamRoleArn?: string,
 *     AuthorizedTokenIssuerList?: list<array{TrustedTokenIssuerArn?: string, AuthorizedAudiencesList?: list<string>, ...}>,
 *     ServiceIntegrations?: list<array{LakeFormation?: list<array>, S3AccessGrants?: list<array>, Redshift?: list<array>, ...}>,
 *     ApplicationType?: 'Lakehouse'|'None',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SsoTagKeys?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result createScheduledAction(array{
 *     ScheduledActionName?: string,
 *     TargetAction?: array{
 *         ResizeCluster?: array{
 *             ClusterIdentifier?: string,
 *             ClusterType?: string,
 *             NodeType?: string,
 *             NumberOfNodes?: int,
 *             Classic?: bool,
 *             ReservedNodeId?: string,
 *             TargetReservedNodeOfferingId?: string,
 *             ...,
 *         },
 *         PauseCluster?: array{ClusterIdentifier?: string, ...},
 *         ResumeCluster?: array{ClusterIdentifier?: string, ...},
 *         ...,
 *     },
 *     Schedule?: string,
 *     IamRole?: string,
 *     ScheduledActionDescription?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Enable?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduledActionAsync(array{
 *     ScheduledActionName?: string,
 *     TargetAction?: array{
 *         ResizeCluster?: array{
 *             ClusterIdentifier?: string,
 *             ClusterType?: string,
 *             NodeType?: string,
 *             NumberOfNodes?: int,
 *             Classic?: bool,
 *             ReservedNodeId?: string,
 *             TargetReservedNodeOfferingId?: string,
 *             ...,
 *         },
 *         PauseCluster?: array{ClusterIdentifier?: string, ...},
 *         ResumeCluster?: array{ClusterIdentifier?: string, ...},
 *         ...,
 *     },
 *     Schedule?: string,
 *     IamRole?: string,
 *     ScheduledActionDescription?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Enable?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshotCopyGrant(array $args = [])
 * @phpstan-method \Aws\Result createSnapshotCopyGrant(array{
 *     SnapshotCopyGrantName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotCopyGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotCopyGrantAsync(array{
 *     SnapshotCopyGrantName?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshotSchedule(array $args = [])
 * @phpstan-method \Aws\Result createSnapshotSchedule(array{
 *     ScheduleDefinitions?: list<string>,
 *     ScheduleIdentifier?: string,
 *     ScheduleDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DryRun?: bool,
 *     NextInvocations?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotScheduleAsync(array{
 *     ScheduleDefinitions?: list<string>,
 *     ScheduleIdentifier?: string,
 *     ScheduleDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DryRun?: bool,
 *     NextInvocations?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTags(array $args = [])
 * @phpstan-method \Aws\Result createTags(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTagsAsync(array{ResourceName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createUsageLimit(array $args = [])
 * @phpstan-method \Aws\Result createUsageLimit(array{
 *     ClusterIdentifier?: string,
 *     FeatureType?: 'concurrency-scaling'|'cross-region-datasharing'|'extra-compute-for-automatic-optimization'|'spectrum',
 *     LimitType?: 'data-scanned'|'time',
 *     Amount?: int,
 *     Period?: 'daily'|'monthly'|'weekly',
 *     BreachAction?: 'disable'|'emit-metric'|'log',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUsageLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUsageLimitAsync(array{
 *     ClusterIdentifier?: string,
 *     FeatureType?: 'concurrency-scaling'|'cross-region-datasharing'|'extra-compute-for-automatic-optimization'|'spectrum',
 *     LimitType?: 'data-scanned'|'time',
 *     Amount?: int,
 *     Period?: 'daily'|'monthly'|'weekly',
 *     BreachAction?: 'disable'|'emit-metric'|'log',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deauthorizeDataShare(array $args = [])
 * @phpstan-method \Aws\Result deauthorizeDataShare(array{DataShareArn?: string, ConsumerIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deauthorizeDataShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deauthorizeDataShareAsync(array{DataShareArn?: string, ConsumerIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteAuthenticationProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteAuthenticationProfile(array{AuthenticationProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAuthenticationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAuthenticationProfileAsync(array{AuthenticationProfileName?: string, ...} $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{
 *     ClusterIdentifier?: string,
 *     SkipFinalClusterSnapshot?: bool,
 *     FinalClusterSnapshotIdentifier?: string,
 *     FinalClusterSnapshotRetentionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{
 *     ClusterIdentifier?: string,
 *     SkipFinalClusterSnapshot?: bool,
 *     FinalClusterSnapshotIdentifier?: string,
 *     FinalClusterSnapshotRetentionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteClusterParameterGroup(array{ParameterGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterParameterGroupAsync(array{ParameterGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteClusterSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteClusterSecurityGroup(array{ClusterSecurityGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterSecurityGroupAsync(array{ClusterSecurityGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteClusterSnapshot(array{SnapshotIdentifier?: string, SnapshotClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterSnapshotAsync(array{SnapshotIdentifier?: string, SnapshotClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteClusterSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteClusterSubnetGroup(array{ClusterSubnetGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterSubnetGroupAsync(array{ClusterSubnetGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomDomainAssociation(array{ClusterIdentifier?: string, CustomDomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomDomainAssociationAsync(array{ClusterIdentifier?: string, CustomDomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpointAccess(array{EndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAccessAsync(array{EndpointName?: string, ...} $args = [])
 * @method \Aws\Result deleteEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteEventSubscription(array{SubscriptionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array{SubscriptionName?: string, ...} $args = [])
 * @method \Aws\Result deleteHsmClientCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteHsmClientCertificate(array{HsmClientCertificateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHsmClientCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHsmClientCertificateAsync(array{HsmClientCertificateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteHsmConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteHsmConfiguration(array{HsmConfigurationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHsmConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHsmConfigurationAsync(array{HsmConfigurationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{IntegrationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{IntegrationArn?: string, ...} $args = [])
 * @method \Aws\Result deletePartner(array $args = [])
 * @phpstan-method \Aws\Result deletePartner(array{AccountId?: string, ClusterIdentifier?: string, DatabaseName?: string, PartnerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePartnerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePartnerAsync(array{AccountId?: string, ClusterIdentifier?: string, DatabaseName?: string, PartnerName?: string, ...} $args = [])
 * @method \Aws\Result deleteQev2IdcApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteQev2IdcApplication(array{Qev2IdcApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQev2IdcApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQev2IdcApplicationAsync(array{Qev2IdcApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRedshiftIdcApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteRedshiftIdcApplication(array{RedshiftIdcApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRedshiftIdcApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRedshiftIdcApplicationAsync(array{RedshiftIdcApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduledAction(array{ScheduledActionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array{ScheduledActionName?: string, ...} $args = [])
 * @method \Aws\Result deleteSnapshotCopyGrant(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshotCopyGrant(array{SnapshotCopyGrantName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotCopyGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotCopyGrantAsync(array{SnapshotCopyGrantName?: string, ...} $args = [])
 * @method \Aws\Result deleteSnapshotSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshotSchedule(array{ScheduleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotScheduleAsync(array{ScheduleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{ResourceName?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteUsageLimit(array $args = [])
 * @phpstan-method \Aws\Result deleteUsageLimit(array{UsageLimitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUsageLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUsageLimitAsync(array{UsageLimitId?: string, ...} $args = [])
 * @method \Aws\Result deregisterNamespace(array $args = [])
 * @phpstan-method \Aws\Result deregisterNamespace(array{
 *     NamespaceIdentifier?: array{
 *         ServerlessIdentifier?: array{NamespaceIdentifier?: string, WorkgroupIdentifier?: string, ...},
 *         ProvisionedIdentifier?: array{ClusterIdentifier?: string, ...},
 *         ...,
 *     },
 *     ConsumerIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterNamespaceAsync(array{
 *     NamespaceIdentifier?: array{
 *         ServerlessIdentifier?: array{NamespaceIdentifier?: string, WorkgroupIdentifier?: string, ...},
 *         ProvisionedIdentifier?: array{ClusterIdentifier?: string, ...},
 *         ...,
 *     },
 *     ConsumerIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAccountAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeAccountAttributes(array{AttributeNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array{AttributeNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeAuthenticationProfiles(array $args = [])
 * @phpstan-method \Aws\Result describeAuthenticationProfiles(array{AuthenticationProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAuthenticationProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAuthenticationProfilesAsync(array{AuthenticationProfileName?: string, ...} $args = [])
 * @method \Aws\Result describeClusterDbRevisions(array $args = [])
 * @phpstan-method \Aws\Result describeClusterDbRevisions(array{ClusterIdentifier?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterDbRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterDbRevisionsAsync(array{ClusterIdentifier?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeClusterParameterGroups(array $args = [])
 * @phpstan-method \Aws\Result describeClusterParameterGroups(array{
 *     ParameterGroupName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterParameterGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterParameterGroupsAsync(array{
 *     ParameterGroupName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeClusterParameters(array $args = [])
 * @phpstan-method \Aws\Result describeClusterParameters(array{ParameterGroupName?: string, Source?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterParametersAsync(array{ParameterGroupName?: string, Source?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeClusterSecurityGroups(array $args = [])
 * @phpstan-method \Aws\Result describeClusterSecurityGroups(array{
 *     ClusterSecurityGroupName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterSecurityGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterSecurityGroupsAsync(array{
 *     ClusterSecurityGroupName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeClusterSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeClusterSnapshots(array{
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     SnapshotType?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     OwnerAccount?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ClusterExists?: bool,
 *     SortingEntities?: list<array{Attribute?: 'CREATE_TIME'|'SOURCE_TYPE'|'TOTAL_SIZE', SortOrder?: 'ASC'|'DESC', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterSnapshotsAsync(array{
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     SnapshotType?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     OwnerAccount?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ClusterExists?: bool,
 *     SortingEntities?: list<array{Attribute?: 'CREATE_TIME'|'SOURCE_TYPE'|'TOTAL_SIZE', SortOrder?: 'ASC'|'DESC', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeClusterSubnetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeClusterSubnetGroups(array{
 *     ClusterSubnetGroupName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterSubnetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterSubnetGroupsAsync(array{
 *     ClusterSubnetGroupName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeClusterTracks(array $args = [])
 * @phpstan-method \Aws\Result describeClusterTracks(array{MaintenanceTrackName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterTracksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterTracksAsync(array{MaintenanceTrackName?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeClusterVersions(array $args = [])
 * @phpstan-method \Aws\Result describeClusterVersions(array{ClusterVersion?: string, ClusterParameterGroupFamily?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterVersionsAsync(array{ClusterVersion?: string, ClusterParameterGroupFamily?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeClusters(array $args = [])
 * @phpstan-method \Aws\Result describeClusters(array{
 *     ClusterIdentifier?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClustersAsync(array{
 *     ClusterIdentifier?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCustomDomainAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeCustomDomainAssociations(array{CustomDomainName?: string, CustomDomainCertificateArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomDomainAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomDomainAssociationsAsync(array{CustomDomainName?: string, CustomDomainCertificateArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeDataShares(array $args = [])
 * @phpstan-method \Aws\Result describeDataShares(array{DataShareArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSharesAsync(array{DataShareArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeDataSharesForConsumer(array $args = [])
 * @phpstan-method \Aws\Result describeDataSharesForConsumer(array{ConsumerArn?: string, Status?: 'ACTIVE'|'AVAILABLE', MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSharesForConsumerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSharesForConsumerAsync(array{ConsumerArn?: string, Status?: 'ACTIVE'|'AVAILABLE', MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeDataSharesForProducer(array $args = [])
 * @phpstan-method \Aws\Result describeDataSharesForProducer(array{
 *     ProducerArn?: string,
 *     Status?: 'ACTIVE'|'AUTHORIZED'|'DEAUTHORIZED'|'PENDING_AUTHORIZATION'|'REJECTED',
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSharesForProducerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSharesForProducerAsync(array{
 *     ProducerArn?: string,
 *     Status?: 'ACTIVE'|'AUTHORIZED'|'DEAUTHORIZED'|'PENDING_AUTHORIZATION'|'REJECTED',
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDefaultClusterParameters(array $args = [])
 * @phpstan-method \Aws\Result describeDefaultClusterParameters(array{ParameterGroupFamily?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDefaultClusterParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDefaultClusterParametersAsync(array{ParameterGroupFamily?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result describeEndpointAccess(array{
 *     ClusterIdentifier?: string,
 *     ResourceOwner?: string,
 *     EndpointName?: string,
 *     VpcId?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointAccessAsync(array{
 *     ClusterIdentifier?: string,
 *     ResourceOwner?: string,
 *     EndpointName?: string,
 *     VpcId?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEndpointAuthorization(array $args = [])
 * @phpstan-method \Aws\Result describeEndpointAuthorization(array{ClusterIdentifier?: string, Account?: string, Grantee?: bool, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointAuthorizationAsync(array{ClusterIdentifier?: string, Account?: string, Grantee?: bool, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeEventCategories(array $args = [])
 * @phpstan-method \Aws\Result describeEventCategories(array{SourceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array{SourceType?: string, ...} $args = [])
 * @method \Aws\Result describeEventSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result describeEventSubscriptions(array{
 *     SubscriptionName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array{
 *     SubscriptionName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     SourceIdentifier?: string,
 *     SourceType?: 'cluster'|'cluster-parameter-group'|'cluster-security-group'|'cluster-snapshot'|'scheduled-action',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsAsync(array{
 *     SourceIdentifier?: string,
 *     SourceType?: 'cluster'|'cluster-parameter-group'|'cluster-security-group'|'cluster-snapshot'|'scheduled-action',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Duration?: int,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeHsmClientCertificates(array $args = [])
 * @phpstan-method \Aws\Result describeHsmClientCertificates(array{
 *     HsmClientCertificateIdentifier?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHsmClientCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHsmClientCertificatesAsync(array{
 *     HsmClientCertificateIdentifier?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeHsmConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeHsmConfigurations(array{
 *     HsmConfigurationIdentifier?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHsmConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHsmConfigurationsAsync(array{
 *     HsmConfigurationIdentifier?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInboundIntegrations(array $args = [])
 * @phpstan-method \Aws\Result describeInboundIntegrations(array{IntegrationArn?: string, TargetArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInboundIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInboundIntegrationsAsync(array{IntegrationArn?: string, TargetArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeIntegrations(array $args = [])
 * @phpstan-method \Aws\Result describeIntegrations(array{
 *     IntegrationArn?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     Filters?: list<array{Name?: 'integration-arn'|'source-arn'|'source-types'|'status', Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIntegrationsAsync(array{
 *     IntegrationArn?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     Filters?: list<array{Name?: 'integration-arn'|'source-arn'|'source-types'|'status', Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLoggingStatus(array $args = [])
 * @phpstan-method \Aws\Result describeLoggingStatus(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoggingStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoggingStatusAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeNodeConfigurationOptions(array $args = [])
 * @phpstan-method \Aws\Result describeNodeConfigurationOptions(array{
 *     ActionType?: 'recommend-node-config'|'resize-cluster'|'restore-cluster',
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     OwnerAccount?: string,
 *     Filters?: list<array{
 *         Name?: 'EstimatedDiskUtilizationPercent'|'Mode'|'NodeType'|'NumberOfNodes',
 *         Operator?: 'between'|'eq'|'ge'|'gt'|'in'|'le'|'lt',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNodeConfigurationOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNodeConfigurationOptionsAsync(array{
 *     ActionType?: 'recommend-node-config'|'resize-cluster'|'restore-cluster',
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     OwnerAccount?: string,
 *     Filters?: list<array{
 *         Name?: 'EstimatedDiskUtilizationPercent'|'Mode'|'NodeType'|'NumberOfNodes',
 *         Operator?: 'between'|'eq'|'ge'|'gt'|'in'|'le'|'lt',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOrderableClusterOptions(array $args = [])
 * @phpstan-method \Aws\Result describeOrderableClusterOptions(array{ClusterVersion?: string, NodeType?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrderableClusterOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrderableClusterOptionsAsync(array{ClusterVersion?: string, NodeType?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describePartners(array $args = [])
 * @phpstan-method \Aws\Result describePartners(array{AccountId?: string, ClusterIdentifier?: string, DatabaseName?: string, PartnerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePartnersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePartnersAsync(array{AccountId?: string, ClusterIdentifier?: string, DatabaseName?: string, PartnerName?: string, ...} $args = [])
 * @method \Aws\Result describeQev2IdcApplications(array $args = [])
 * @phpstan-method \Aws\Result describeQev2IdcApplications(array{Qev2IdcApplicationArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQev2IdcApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQev2IdcApplicationsAsync(array{Qev2IdcApplicationArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeRedshiftIdcApplications(array $args = [])
 * @phpstan-method \Aws\Result describeRedshiftIdcApplications(array{RedshiftIdcApplicationArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRedshiftIdcApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRedshiftIdcApplicationsAsync(array{RedshiftIdcApplicationArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeReservedNodeExchangeStatus(array $args = [])
 * @phpstan-method \Aws\Result describeReservedNodeExchangeStatus(array{ReservedNodeId?: string, ReservedNodeExchangeRequestId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedNodeExchangeStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedNodeExchangeStatusAsync(array{ReservedNodeId?: string, ReservedNodeExchangeRequestId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeReservedNodeOfferings(array $args = [])
 * @phpstan-method \Aws\Result describeReservedNodeOfferings(array{ReservedNodeOfferingId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedNodeOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedNodeOfferingsAsync(array{ReservedNodeOfferingId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeReservedNodes(array $args = [])
 * @phpstan-method \Aws\Result describeReservedNodes(array{ReservedNodeId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedNodesAsync(array{ReservedNodeId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeResize(array $args = [])
 * @phpstan-method \Aws\Result describeResize(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResizeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResizeAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeScheduledActions(array $args = [])
 * @phpstan-method \Aws\Result describeScheduledActions(array{
 *     ScheduledActionName?: string,
 *     TargetActionType?: 'PauseCluster'|'ResizeCluster'|'ResumeCluster',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Active?: bool,
 *     Filters?: list<array{Name?: 'cluster-identifier'|'iam-role', Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScheduledActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScheduledActionsAsync(array{
 *     ScheduledActionName?: string,
 *     TargetActionType?: 'PauseCluster'|'ResizeCluster'|'ResumeCluster',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Active?: bool,
 *     Filters?: list<array{Name?: 'cluster-identifier'|'iam-role', Values?: list<string>, ...}>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSnapshotCopyGrants(array $args = [])
 * @phpstan-method \Aws\Result describeSnapshotCopyGrants(array{
 *     SnapshotCopyGrantName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSnapshotCopyGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSnapshotCopyGrantsAsync(array{
 *     SnapshotCopyGrantName?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSnapshotSchedules(array $args = [])
 * @phpstan-method \Aws\Result describeSnapshotSchedules(array{
 *     ClusterIdentifier?: string,
 *     ScheduleIdentifier?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSnapshotSchedulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSnapshotSchedulesAsync(array{
 *     ClusterIdentifier?: string,
 *     ScheduleIdentifier?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeStorage(array $args = [])
 * @phpstan-method \Aws\Result describeStorage(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStorageAsync(array{...} $args = [])
 * @method \Aws\Result describeTableRestoreStatus(array $args = [])
 * @phpstan-method \Aws\Result describeTableRestoreStatus(array{ClusterIdentifier?: string, TableRestoreRequestId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTableRestoreStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTableRestoreStatusAsync(array{ClusterIdentifier?: string, TableRestoreRequestId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{
 *     ResourceName?: string,
 *     ResourceType?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{
 *     ResourceName?: string,
 *     ResourceType?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeUsageLimits(array $args = [])
 * @phpstan-method \Aws\Result describeUsageLimits(array{
 *     UsageLimitId?: string,
 *     ClusterIdentifier?: string,
 *     FeatureType?: 'concurrency-scaling'|'cross-region-datasharing'|'extra-compute-for-automatic-optimization'|'spectrum',
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUsageLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUsageLimitsAsync(array{
 *     UsageLimitId?: string,
 *     ClusterIdentifier?: string,
 *     FeatureType?: 'concurrency-scaling'|'cross-region-datasharing'|'extra-compute-for-automatic-optimization'|'spectrum',
 *     MaxRecords?: int,
 *     Marker?: string,
 *     TagKeys?: list<string>,
 *     TagValues?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disableLogging(array $args = [])
 * @phpstan-method \Aws\Result disableLogging(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableLoggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableLoggingAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disableSnapshotCopy(array $args = [])
 * @phpstan-method \Aws\Result disableSnapshotCopy(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableSnapshotCopyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableSnapshotCopyAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disassociateDataShareConsumer(array $args = [])
 * @phpstan-method \Aws\Result disassociateDataShareConsumer(array{
 *     DataShareArn?: string,
 *     DisassociateEntireAccount?: bool,
 *     ConsumerArn?: string,
 *     ConsumerRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDataShareConsumerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDataShareConsumerAsync(array{
 *     DataShareArn?: string,
 *     DisassociateEntireAccount?: bool,
 *     ConsumerArn?: string,
 *     ConsumerRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableLogging(array $args = [])
 * @phpstan-method \Aws\Result enableLogging(array{
 *     ClusterIdentifier?: string,
 *     BucketName?: string,
 *     S3KeyPrefix?: string,
 *     LogDestinationType?: 'cloudwatch'|'s3',
 *     LogExports?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableLoggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableLoggingAsync(array{
 *     ClusterIdentifier?: string,
 *     BucketName?: string,
 *     S3KeyPrefix?: string,
 *     LogDestinationType?: 'cloudwatch'|'s3',
 *     LogExports?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableSnapshotCopy(array $args = [])
 * @phpstan-method \Aws\Result enableSnapshotCopy(array{
 *     ClusterIdentifier?: string,
 *     DestinationRegion?: string,
 *     RetentionPeriod?: int,
 *     SnapshotCopyGrantName?: string,
 *     ManualSnapshotRetentionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSnapshotCopyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableSnapshotCopyAsync(array{
 *     ClusterIdentifier?: string,
 *     DestinationRegion?: string,
 *     RetentionPeriod?: int,
 *     SnapshotCopyGrantName?: string,
 *     ManualSnapshotRetentionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result failoverPrimaryCompute(array $args = [])
 * @phpstan-method \Aws\Result failoverPrimaryCompute(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise failoverPrimaryComputeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise failoverPrimaryComputeAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getClusterCredentials(array $args = [])
 * @phpstan-method \Aws\Result getClusterCredentials(array{
 *     DbUser?: string,
 *     DbName?: string,
 *     ClusterIdentifier?: string,
 *     DurationSeconds?: int,
 *     AutoCreate?: bool,
 *     DbGroups?: list<string>,
 *     CustomDomainName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterCredentialsAsync(array{
 *     DbUser?: string,
 *     DbName?: string,
 *     ClusterIdentifier?: string,
 *     DurationSeconds?: int,
 *     AutoCreate?: bool,
 *     DbGroups?: list<string>,
 *     CustomDomainName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getClusterCredentialsWithIAM(array $args = [])
 * @phpstan-method \Aws\Result getClusterCredentialsWithIAM(array{DbName?: string, ClusterIdentifier?: string, DurationSeconds?: int, CustomDomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterCredentialsWithIAMAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterCredentialsWithIAMAsync(array{DbName?: string, ClusterIdentifier?: string, DurationSeconds?: int, CustomDomainName?: string, ...} $args = [])
 * @method \Aws\Result getIdentityCenterAuthToken(array $args = [])
 * @phpstan-method \Aws\Result getIdentityCenterAuthToken(array{ClusterIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityCenterAuthTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityCenterAuthTokenAsync(array{ClusterIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getReservedNodeExchangeConfigurationOptions(array $args = [])
 * @phpstan-method \Aws\Result getReservedNodeExchangeConfigurationOptions(array{
 *     ActionType?: 'resize-cluster'|'restore-cluster',
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservedNodeExchangeConfigurationOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReservedNodeExchangeConfigurationOptionsAsync(array{
 *     ActionType?: 'resize-cluster'|'restore-cluster',
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     MaxRecords?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getReservedNodeExchangeOfferings(array $args = [])
 * @phpstan-method \Aws\Result getReservedNodeExchangeOfferings(array{ReservedNodeId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservedNodeExchangeOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReservedNodeExchangeOfferingsAsync(array{ReservedNodeId?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listRecommendations(array{ClusterIdentifier?: string, NamespaceArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array{ClusterIdentifier?: string, NamespaceArn?: string, MaxRecords?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result modifyAquaConfiguration(array $args = [])
 * @phpstan-method \Aws\Result modifyAquaConfiguration(array{ClusterIdentifier?: string, AquaConfigurationStatus?: 'auto'|'disabled'|'enabled', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyAquaConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyAquaConfigurationAsync(array{ClusterIdentifier?: string, AquaConfigurationStatus?: 'auto'|'disabled'|'enabled', ...} $args = [])
 * @method \Aws\Result modifyAuthenticationProfile(array $args = [])
 * @phpstan-method \Aws\Result modifyAuthenticationProfile(array{AuthenticationProfileName?: string, AuthenticationProfileContent?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyAuthenticationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyAuthenticationProfileAsync(array{AuthenticationProfileName?: string, AuthenticationProfileContent?: string, ...} $args = [])
 * @method \Aws\Result modifyCluster(array $args = [])
 * @phpstan-method \Aws\Result modifyCluster(array{
 *     ClusterIdentifier?: string,
 *     ClusterType?: string,
 *     NodeType?: string,
 *     NumberOfNodes?: int,
 *     ClusterSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     MasterUserPassword?: string,
 *     ClusterParameterGroupName?: string,
 *     AutomatedSnapshotRetentionPeriod?: int,
 *     ManualSnapshotRetentionPeriod?: int,
 *     PreferredMaintenanceWindow?: string,
 *     ClusterVersion?: string,
 *     AllowVersionUpgrade?: bool,
 *     HsmClientCertificateIdentifier?: string,
 *     HsmConfigurationIdentifier?: string,
 *     NewClusterIdentifier?: string,
 *     PubliclyAccessible?: bool,
 *     ElasticIp?: string,
 *     EnhancedVpcRouting?: bool,
 *     MaintenanceTrackName?: string,
 *     Encrypted?: bool,
 *     KmsKeyId?: string,
 *     AvailabilityZoneRelocation?: bool,
 *     AvailabilityZone?: string,
 *     Port?: int,
 *     ManageMasterPassword?: bool,
 *     MasterPasswordSecretKmsKeyId?: string,
 *     IpAddressType?: string,
 *     MultiAZ?: bool,
 *     ExtraComputeForAutomaticOptimization?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterAsync(array{
 *     ClusterIdentifier?: string,
 *     ClusterType?: string,
 *     NodeType?: string,
 *     NumberOfNodes?: int,
 *     ClusterSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     MasterUserPassword?: string,
 *     ClusterParameterGroupName?: string,
 *     AutomatedSnapshotRetentionPeriod?: int,
 *     ManualSnapshotRetentionPeriod?: int,
 *     PreferredMaintenanceWindow?: string,
 *     ClusterVersion?: string,
 *     AllowVersionUpgrade?: bool,
 *     HsmClientCertificateIdentifier?: string,
 *     HsmConfigurationIdentifier?: string,
 *     NewClusterIdentifier?: string,
 *     PubliclyAccessible?: bool,
 *     ElasticIp?: string,
 *     EnhancedVpcRouting?: bool,
 *     MaintenanceTrackName?: string,
 *     Encrypted?: bool,
 *     KmsKeyId?: string,
 *     AvailabilityZoneRelocation?: bool,
 *     AvailabilityZone?: string,
 *     Port?: int,
 *     ManageMasterPassword?: bool,
 *     MasterPasswordSecretKmsKeyId?: string,
 *     IpAddressType?: string,
 *     MultiAZ?: bool,
 *     ExtraComputeForAutomaticOptimization?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyClusterDbRevision(array $args = [])
 * @phpstan-method \Aws\Result modifyClusterDbRevision(array{ClusterIdentifier?: string, RevisionTarget?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterDbRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterDbRevisionAsync(array{ClusterIdentifier?: string, RevisionTarget?: string, ...} $args = [])
 * @method \Aws\Result modifyClusterIamRoles(array $args = [])
 * @phpstan-method \Aws\Result modifyClusterIamRoles(array{
 *     ClusterIdentifier?: string,
 *     AddIamRoles?: list<string>,
 *     RemoveIamRoles?: list<string>,
 *     DefaultIamRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterIamRolesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterIamRolesAsync(array{
 *     ClusterIdentifier?: string,
 *     AddIamRoles?: list<string>,
 *     RemoveIamRoles?: list<string>,
 *     DefaultIamRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyClusterMaintenance(array $args = [])
 * @phpstan-method \Aws\Result modifyClusterMaintenance(array{
 *     ClusterIdentifier?: string,
 *     DeferMaintenance?: bool,
 *     DeferMaintenanceIdentifier?: string,
 *     DeferMaintenanceStartTime?: int|string|\DateTimeInterface,
 *     DeferMaintenanceEndTime?: int|string|\DateTimeInterface,
 *     DeferMaintenanceDuration?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterMaintenanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterMaintenanceAsync(array{
 *     ClusterIdentifier?: string,
 *     DeferMaintenance?: bool,
 *     DeferMaintenanceIdentifier?: string,
 *     DeferMaintenanceStartTime?: int|string|\DateTimeInterface,
 *     DeferMaintenanceEndTime?: int|string|\DateTimeInterface,
 *     DeferMaintenanceDuration?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyClusterParameterGroup(array{
 *     ParameterGroupName?: string,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         ApplyType?: 'dynamic'|'static',
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterParameterGroupAsync(array{
 *     ParameterGroupName?: string,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         ApplyType?: 'dynamic'|'static',
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result modifyClusterSnapshot(array{SnapshotIdentifier?: string, ManualSnapshotRetentionPeriod?: int, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterSnapshotAsync(array{SnapshotIdentifier?: string, ManualSnapshotRetentionPeriod?: int, Force?: bool, ...} $args = [])
 * @method \Aws\Result modifyClusterSnapshotSchedule(array $args = [])
 * @phpstan-method \Aws\Result modifyClusterSnapshotSchedule(array{ClusterIdentifier?: string, ScheduleIdentifier?: string, DisassociateSchedule?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterSnapshotScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterSnapshotScheduleAsync(array{ClusterIdentifier?: string, ScheduleIdentifier?: string, DisassociateSchedule?: bool, ...} $args = [])
 * @method \Aws\Result modifyClusterSubnetGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyClusterSubnetGroup(array{ClusterSubnetGroupName?: string, Description?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterSubnetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterSubnetGroupAsync(array{ClusterSubnetGroupName?: string, Description?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyCustomDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result modifyCustomDomainAssociation(array{CustomDomainName?: string, CustomDomainCertificateArn?: string, ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCustomDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCustomDomainAssociationAsync(array{CustomDomainName?: string, CustomDomainCertificateArn?: string, ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result modifyEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result modifyEndpointAccess(array{EndpointName?: string, VpcSecurityGroupIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyEndpointAccessAsync(array{EndpointName?: string, VpcSecurityGroupIds?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyEventSubscription(array $args = [])
 * @phpstan-method \Aws\Result modifyEventSubscription(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     SourceIds?: list<string>,
 *     EventCategories?: list<string>,
 *     Severity?: string,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array{
 *     SubscriptionName?: string,
 *     SnsTopicArn?: string,
 *     SourceType?: string,
 *     SourceIds?: list<string>,
 *     EventCategories?: list<string>,
 *     Severity?: string,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyIntegration(array $args = [])
 * @phpstan-method \Aws\Result modifyIntegration(array{IntegrationArn?: string, Description?: string, IntegrationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyIntegrationAsync(array{IntegrationArn?: string, Description?: string, IntegrationName?: string, ...} $args = [])
 * @method \Aws\Result modifyLakehouseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result modifyLakehouseConfiguration(array{
 *     ClusterIdentifier?: string,
 *     LakehouseRegistration?: 'Deregister'|'Register',
 *     CatalogName?: string,
 *     LakehouseIdcRegistration?: 'Associate'|'Disassociate',
 *     LakehouseIdcApplicationArn?: string,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyLakehouseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyLakehouseConfigurationAsync(array{
 *     ClusterIdentifier?: string,
 *     LakehouseRegistration?: 'Deregister'|'Register',
 *     CatalogName?: string,
 *     LakehouseIdcRegistration?: 'Associate'|'Disassociate',
 *     LakehouseIdcApplicationArn?: string,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyQev2IdcApplication(array $args = [])
 * @phpstan-method \Aws\Result modifyQev2IdcApplication(array{Qev2IdcApplicationArn?: string, IdcDisplayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyQev2IdcApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyQev2IdcApplicationAsync(array{Qev2IdcApplicationArn?: string, IdcDisplayName?: string, ...} $args = [])
 * @method \Aws\Result modifyRedshiftIdcApplication(array $args = [])
 * @phpstan-method \Aws\Result modifyRedshiftIdcApplication(array{
 *     RedshiftIdcApplicationArn?: string,
 *     IdentityNamespace?: string,
 *     IamRoleArn?: string,
 *     IdcDisplayName?: string,
 *     AuthorizedTokenIssuerList?: list<array{TrustedTokenIssuerArn?: string, AuthorizedAudiencesList?: list<string>, ...}>,
 *     ServiceIntegrations?: list<array{LakeFormation?: list<array>, S3AccessGrants?: list<array>, Redshift?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyRedshiftIdcApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyRedshiftIdcApplicationAsync(array{
 *     RedshiftIdcApplicationArn?: string,
 *     IdentityNamespace?: string,
 *     IamRoleArn?: string,
 *     IdcDisplayName?: string,
 *     AuthorizedTokenIssuerList?: list<array{TrustedTokenIssuerArn?: string, AuthorizedAudiencesList?: list<string>, ...}>,
 *     ServiceIntegrations?: list<array{LakeFormation?: list<array>, S3AccessGrants?: list<array>, Redshift?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result modifyScheduledAction(array{
 *     ScheduledActionName?: string,
 *     TargetAction?: array{
 *         ResizeCluster?: array{
 *             ClusterIdentifier?: string,
 *             ClusterType?: string,
 *             NodeType?: string,
 *             NumberOfNodes?: int,
 *             Classic?: bool,
 *             ReservedNodeId?: string,
 *             TargetReservedNodeOfferingId?: string,
 *             ...,
 *         },
 *         PauseCluster?: array{ClusterIdentifier?: string, ...},
 *         ResumeCluster?: array{ClusterIdentifier?: string, ...},
 *         ...,
 *     },
 *     Schedule?: string,
 *     IamRole?: string,
 *     ScheduledActionDescription?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Enable?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyScheduledActionAsync(array{
 *     ScheduledActionName?: string,
 *     TargetAction?: array{
 *         ResizeCluster?: array{
 *             ClusterIdentifier?: string,
 *             ClusterType?: string,
 *             NodeType?: string,
 *             NumberOfNodes?: int,
 *             Classic?: bool,
 *             ReservedNodeId?: string,
 *             TargetReservedNodeOfferingId?: string,
 *             ...,
 *         },
 *         PauseCluster?: array{ClusterIdentifier?: string, ...},
 *         ResumeCluster?: array{ClusterIdentifier?: string, ...},
 *         ...,
 *     },
 *     Schedule?: string,
 *     IamRole?: string,
 *     ScheduledActionDescription?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Enable?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifySnapshotCopyRetentionPeriod(array $args = [])
 * @phpstan-method \Aws\Result modifySnapshotCopyRetentionPeriod(array{ClusterIdentifier?: string, RetentionPeriod?: int, Manual?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifySnapshotCopyRetentionPeriodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifySnapshotCopyRetentionPeriodAsync(array{ClusterIdentifier?: string, RetentionPeriod?: int, Manual?: bool, ...} $args = [])
 * @method \Aws\Result modifySnapshotSchedule(array $args = [])
 * @phpstan-method \Aws\Result modifySnapshotSchedule(array{ScheduleIdentifier?: string, ScheduleDefinitions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifySnapshotScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifySnapshotScheduleAsync(array{ScheduleIdentifier?: string, ScheduleDefinitions?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyUsageLimit(array $args = [])
 * @phpstan-method \Aws\Result modifyUsageLimit(array{UsageLimitId?: string, Amount?: int, BreachAction?: 'disable'|'emit-metric'|'log', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyUsageLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyUsageLimitAsync(array{UsageLimitId?: string, Amount?: int, BreachAction?: 'disable'|'emit-metric'|'log', ...} $args = [])
 * @method \Aws\Result pauseCluster(array $args = [])
 * @phpstan-method \Aws\Result pauseCluster(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise pauseClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pauseClusterAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result purchaseReservedNodeOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseReservedNodeOffering(array{ReservedNodeOfferingId?: string, NodeCount?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseReservedNodeOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseReservedNodeOfferingAsync(array{ReservedNodeOfferingId?: string, NodeCount?: int, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result rebootCluster(array $args = [])
 * @phpstan-method \Aws\Result rebootCluster(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootClusterAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result registerNamespace(array $args = [])
 * @phpstan-method \Aws\Result registerNamespace(array{
 *     NamespaceIdentifier?: array{
 *         ServerlessIdentifier?: array{NamespaceIdentifier?: string, WorkgroupIdentifier?: string, ...},
 *         ProvisionedIdentifier?: array{ClusterIdentifier?: string, ...},
 *         ...,
 *     },
 *     ConsumerIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerNamespaceAsync(array{
 *     NamespaceIdentifier?: array{
 *         ServerlessIdentifier?: array{NamespaceIdentifier?: string, WorkgroupIdentifier?: string, ...},
 *         ProvisionedIdentifier?: array{ClusterIdentifier?: string, ...},
 *         ...,
 *     },
 *     ConsumerIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectDataShare(array $args = [])
 * @phpstan-method \Aws\Result rejectDataShare(array{DataShareArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectDataShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectDataShareAsync(array{DataShareArn?: string, ...} $args = [])
 * @method \Aws\Result resetClusterParameterGroup(array $args = [])
 * @phpstan-method \Aws\Result resetClusterParameterGroup(array{
 *     ParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         ApplyType?: 'dynamic'|'static',
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resetClusterParameterGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetClusterParameterGroupAsync(array{
 *     ParameterGroupName?: string,
 *     ResetAllParameters?: bool,
 *     Parameters?: list<array{
 *         ParameterName?: string,
 *         ParameterValue?: string,
 *         Description?: string,
 *         Source?: string,
 *         DataType?: string,
 *         AllowedValues?: string,
 *         ApplyType?: 'dynamic'|'static',
 *         IsModifiable?: bool,
 *         MinimumEngineVersion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resizeCluster(array $args = [])
 * @phpstan-method \Aws\Result resizeCluster(array{
 *     ClusterIdentifier?: string,
 *     ClusterType?: string,
 *     NodeType?: string,
 *     NumberOfNodes?: int,
 *     Classic?: bool,
 *     ReservedNodeId?: string,
 *     TargetReservedNodeOfferingId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resizeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resizeClusterAsync(array{
 *     ClusterIdentifier?: string,
 *     ClusterType?: string,
 *     NodeType?: string,
 *     NumberOfNodes?: int,
 *     Classic?: bool,
 *     ReservedNodeId?: string,
 *     TargetReservedNodeOfferingId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreFromClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreFromClusterSnapshot(array{
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     SnapshotClusterIdentifier?: string,
 *     Port?: int,
 *     AvailabilityZone?: string,
 *     AllowVersionUpgrade?: bool,
 *     ClusterSubnetGroupName?: string,
 *     PubliclyAccessible?: bool,
 *     OwnerAccount?: string,
 *     HsmClientCertificateIdentifier?: string,
 *     HsmConfigurationIdentifier?: string,
 *     ElasticIp?: string,
 *     ClusterParameterGroupName?: string,
 *     ClusterSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     AutomatedSnapshotRetentionPeriod?: int,
 *     ManualSnapshotRetentionPeriod?: int,
 *     KmsKeyId?: string,
 *     NodeType?: string,
 *     EnhancedVpcRouting?: bool,
 *     AdditionalInfo?: string,
 *     IamRoles?: list<string>,
 *     MaintenanceTrackName?: string,
 *     SnapshotScheduleIdentifier?: string,
 *     NumberOfNodes?: int,
 *     AvailabilityZoneRelocation?: bool,
 *     AquaConfigurationStatus?: 'auto'|'disabled'|'enabled',
 *     DefaultIamRoleArn?: string,
 *     ReservedNodeId?: string,
 *     TargetReservedNodeOfferingId?: string,
 *     Encrypted?: bool,
 *     ManageMasterPassword?: bool,
 *     MasterPasswordSecretKmsKeyId?: string,
 *     IpAddressType?: string,
 *     MultiAZ?: bool,
 *     CatalogName?: string,
 *     RedshiftIdcApplicationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreFromClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreFromClusterSnapshotAsync(array{
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     SnapshotClusterIdentifier?: string,
 *     Port?: int,
 *     AvailabilityZone?: string,
 *     AllowVersionUpgrade?: bool,
 *     ClusterSubnetGroupName?: string,
 *     PubliclyAccessible?: bool,
 *     OwnerAccount?: string,
 *     HsmClientCertificateIdentifier?: string,
 *     HsmConfigurationIdentifier?: string,
 *     ElasticIp?: string,
 *     ClusterParameterGroupName?: string,
 *     ClusterSecurityGroups?: list<string>,
 *     VpcSecurityGroupIds?: list<string>,
 *     PreferredMaintenanceWindow?: string,
 *     AutomatedSnapshotRetentionPeriod?: int,
 *     ManualSnapshotRetentionPeriod?: int,
 *     KmsKeyId?: string,
 *     NodeType?: string,
 *     EnhancedVpcRouting?: bool,
 *     AdditionalInfo?: string,
 *     IamRoles?: list<string>,
 *     MaintenanceTrackName?: string,
 *     SnapshotScheduleIdentifier?: string,
 *     NumberOfNodes?: int,
 *     AvailabilityZoneRelocation?: bool,
 *     AquaConfigurationStatus?: 'auto'|'disabled'|'enabled',
 *     DefaultIamRoleArn?: string,
 *     ReservedNodeId?: string,
 *     TargetReservedNodeOfferingId?: string,
 *     Encrypted?: bool,
 *     ManageMasterPassword?: bool,
 *     MasterPasswordSecretKmsKeyId?: string,
 *     IpAddressType?: string,
 *     MultiAZ?: bool,
 *     CatalogName?: string,
 *     RedshiftIdcApplicationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreTableFromClusterSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreTableFromClusterSnapshot(array{
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     SourceDatabaseName?: string,
 *     SourceSchemaName?: string,
 *     SourceTableName?: string,
 *     TargetDatabaseName?: string,
 *     TargetSchemaName?: string,
 *     NewTableName?: string,
 *     EnableCaseSensitiveIdentifier?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreTableFromClusterSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreTableFromClusterSnapshotAsync(array{
 *     ClusterIdentifier?: string,
 *     SnapshotIdentifier?: string,
 *     SourceDatabaseName?: string,
 *     SourceSchemaName?: string,
 *     SourceTableName?: string,
 *     TargetDatabaseName?: string,
 *     TargetSchemaName?: string,
 *     NewTableName?: string,
 *     EnableCaseSensitiveIdentifier?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resumeCluster(array $args = [])
 * @phpstan-method \Aws\Result resumeCluster(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeClusterAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result revokeClusterSecurityGroupIngress(array $args = [])
 * @phpstan-method \Aws\Result revokeClusterSecurityGroupIngress(array{
 *     ClusterSecurityGroupName?: string,
 *     CIDRIP?: string,
 *     EC2SecurityGroupName?: string,
 *     EC2SecurityGroupOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeClusterSecurityGroupIngressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeClusterSecurityGroupIngressAsync(array{
 *     ClusterSecurityGroupName?: string,
 *     CIDRIP?: string,
 *     EC2SecurityGroupName?: string,
 *     EC2SecurityGroupOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result revokeEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result revokeEndpointAccess(array{ClusterIdentifier?: string, Account?: string, VpcIds?: list<string>, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeEndpointAccessAsync(array{ClusterIdentifier?: string, Account?: string, VpcIds?: list<string>, Force?: bool, ...} $args = [])
 * @method \Aws\Result revokeSnapshotAccess(array $args = [])
 * @phpstan-method \Aws\Result revokeSnapshotAccess(array{
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     SnapshotClusterIdentifier?: string,
 *     AccountWithRestoreAccess?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeSnapshotAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeSnapshotAccessAsync(array{
 *     SnapshotIdentifier?: string,
 *     SnapshotArn?: string,
 *     SnapshotClusterIdentifier?: string,
 *     AccountWithRestoreAccess?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rotateEncryptionKey(array $args = [])
 * @phpstan-method \Aws\Result rotateEncryptionKey(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rotateEncryptionKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rotateEncryptionKeyAsync(array{ClusterIdentifier?: string, ...} $args = [])
 * @method \Aws\Result updatePartnerStatus(array $args = [])
 * @phpstan-method \Aws\Result updatePartnerStatus(array{
 *     AccountId?: string,
 *     ClusterIdentifier?: string,
 *     DatabaseName?: string,
 *     PartnerName?: string,
 *     Status?: 'Active'|'ConnectionFailure'|'Inactive'|'RuntimeFailure',
 *     StatusMessage?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePartnerStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePartnerStatusAsync(array{
 *     AccountId?: string,
 *     ClusterIdentifier?: string,
 *     DatabaseName?: string,
 *     PartnerName?: string,
 *     Status?: 'Active'|'ConnectionFailure'|'Inactive'|'RuntimeFailure',
 *     StatusMessage?: string,
 *     ...,
 * } $args = [])
 */
class RedshiftClient extends AwsClient {}
