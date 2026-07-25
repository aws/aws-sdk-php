<?php
namespace Aws\OpenSearchService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon OpenSearch Service** service.
 * @method \Aws\Result acceptInboundConnection(array $args = [])
 * @phpstan-method \Aws\Result acceptInboundConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptInboundConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptInboundConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \Aws\Result addDataSource(array $args = [])
 * @phpstan-method \Aws\Result addDataSource(array{
 *     DomainName?: string,
 *     Name?: string,
 *     DataSourceType?: array{S3GlueDataCatalog?: array{RoleArn?: string, ...}, ...},
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addDataSourceAsync(array{
 *     DomainName?: string,
 *     Name?: string,
 *     DataSourceType?: array{S3GlueDataCatalog?: array{RoleArn?: string, ...}, ...},
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addDirectQueryDataSource(array $args = [])
 * @phpstan-method \Aws\Result addDirectQueryDataSource(array{
 *     DataSourceName?: string,
 *     DataSourceType?: array{
 *         CloudWatchLog?: array{RoleArn?: string, ...},
 *         SecurityLake?: array{RoleArn?: string, ...},
 *         Prometheus?: array{RoleArn?: string, WorkspaceArn?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     OpenSearchArns?: list<string>,
 *     DataSourceAccessPolicy?: string,
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addDirectQueryDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addDirectQueryDataSourceAsync(array{
 *     DataSourceName?: string,
 *     DataSourceType?: array{
 *         CloudWatchLog?: array{RoleArn?: string, ...},
 *         SecurityLake?: array{RoleArn?: string, ...},
 *         Prometheus?: array{RoleArn?: string, WorkspaceArn?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     OpenSearchArns?: list<string>,
 *     DataSourceAccessPolicy?: string,
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{ARN?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{ARN?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result associatePackage(array $args = [])
 * @phpstan-method \Aws\Result associatePackage(array{
 *     PackageID?: string,
 *     DomainName?: string,
 *     PrerequisitePackageIDList?: list<string>,
 *     AssociationConfiguration?: array{KeyStoreAccessOption?: array{KeyAccessRoleArn?: string, KeyStoreAccessEnabled?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePackageAsync(array{
 *     PackageID?: string,
 *     DomainName?: string,
 *     PrerequisitePackageIDList?: list<string>,
 *     AssociationConfiguration?: array{KeyStoreAccessOption?: array{KeyAccessRoleArn?: string, KeyStoreAccessEnabled?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result associatePackages(array $args = [])
 * @phpstan-method \Aws\Result associatePackages(array{
 *     PackageList?: list<array{PackageID?: string, PrerequisitePackageIDList?: list<string>, AssociationConfiguration?: array, ...}>,
 *     DomainName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePackagesAsync(array{
 *     PackageList?: list<array{PackageID?: string, PrerequisitePackageIDList?: list<string>, AssociationConfiguration?: array, ...}>,
 *     DomainName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result attachDataSource(array $args = [])
 * @phpstan-method \Aws\Result attachDataSource(array{
 *     id?: string,
 *     dataSourceArn?: string,
 *     workspaceId?: string,
 *     workspaceConfiguration?: array{name?: string, workspaceType?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachDataSourceAsync(array{
 *     id?: string,
 *     dataSourceArn?: string,
 *     workspaceId?: string,
 *     workspaceConfiguration?: array{name?: string, workspaceType?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result authorizeVpcEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result authorizeVpcEndpointAccess(array{
 *     DomainName?: string,
 *     Account?: string,
 *     Service?: 'application.opensearchservice.amazonaws.com',
 *     ServiceOptions?: array{SupportedRegions?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeVpcEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeVpcEndpointAccessAsync(array{
 *     DomainName?: string,
 *     Account?: string,
 *     Service?: 'application.opensearchservice.amazonaws.com',
 *     ServiceOptions?: array{SupportedRegions?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelDomainConfigChange(array $args = [])
 * @phpstan-method \Aws\Result cancelDomainConfigChange(array{DomainName?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDomainConfigChangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelDomainConfigChangeAsync(array{DomainName?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result cancelServiceSoftwareUpdate(array $args = [])
 * @phpstan-method \Aws\Result cancelServiceSoftwareUpdate(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelServiceSoftwareUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelServiceSoftwareUpdateAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     clientToken?: string,
 *     name?: string,
 *     dataSources?: list<array{dataSourceArn?: string, dataSourceDescription?: string, iamRoleForDataSourceArn?: string, ...}>,
 *     iamIdentityCenterOptions?: array{
 *         enabled?: bool,
 *         iamIdentityCenterInstanceArn?: string,
 *         iamRoleForIdentityCenterApplicationArn?: string,
 *         ...,
 *     },
 *     appConfigs?: list<array{
 *         key?: 'opensearchDashboards.dashboardAdmin.groups'|'opensearchDashboards.dashboardAdmin.users',
 *         value?: string,
 *         ...,
 *     }>,
 *     tagList?: list<array{Key?: string, Value?: string, ...}>,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     dataSources?: list<array{dataSourceArn?: string, dataSourceDescription?: string, iamRoleForDataSourceArn?: string, ...}>,
 *     iamIdentityCenterOptions?: array{
 *         enabled?: bool,
 *         iamIdentityCenterInstanceArn?: string,
 *         iamRoleForIdentityCenterApplicationArn?: string,
 *         ...,
 *     },
 *     appConfigs?: list<array{
 *         key?: 'opensearchDashboards.dashboardAdmin.groups'|'opensearchDashboards.dashboardAdmin.users',
 *         value?: string,
 *         ...,
 *     }>,
 *     tagList?: list<array{Key?: string, Value?: string, ...}>,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{
 *     DomainName?: string,
 *     EngineVersion?: string,
 *     ClusterConfig?: array{
 *         InstanceType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         InstanceCount?: int,
 *         DedicatedMasterEnabled?: bool,
 *         ZoneAwarenessEnabled?: bool,
 *         ZoneAwarenessConfig?: array{AvailabilityZoneCount?: int, ...},
 *         DedicatedMasterType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         DedicatedMasterCount?: int,
 *         WarmEnabled?: bool,
 *         WarmType?: 'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         WarmCount?: int,
 *         ColdStorageOptions?: array{Enabled?: bool, ...},
 *         MultiAZWithStandbyEnabled?: bool,
 *         NodeOptions?: list<array>,
 *         ...,
 *     },
 *     EBSOptions?: array{
 *         EBSEnabled?: bool,
 *         VolumeType?: 'gp2'|'gp3'|'io1'|'standard',
 *         VolumeSize?: int,
 *         Iops?: int,
 *         Throughput?: int,
 *         ...,
 *     },
 *     AccessPolicies?: string,
 *     IPAddressType?: 'dualstack'|'ipv4',
 *     SnapshotOptions?: array{AutomatedSnapshotStartHour?: int, ...},
 *     VPCOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, EgressEnabled?: bool, ...},
 *     CognitoOptions?: array{Enabled?: bool, UserPoolId?: string, IdentityPoolId?: string, RoleArn?: string, ...},
 *     EncryptionAtRestOptions?: array{Enabled?: bool, KmsKeyId?: string, ...},
 *     NodeToNodeEncryptionOptions?: array{Enabled?: bool, ...},
 *     AdvancedOptions?: array<string, string>,
 *     LogPublishingOptions?: array<string, array{CloudWatchLogsLogGroupArn?: string, Enabled?: bool, ...}>,
 *     DomainEndpointOptions?: array{
 *         EnforceHTTPS?: bool,
 *         TLSSecurityPolicy?: 'Policy-Min-TLS-1-0-2019-07'|'Policy-Min-TLS-1-2-2019-07'|'Policy-Min-TLS-1-2-PFS-2023-10'|'Policy-Min-TLS-1-2-RFC9151-FIPS-2024-08',
 *         CustomEndpointEnabled?: bool,
 *         CustomEndpoint?: string,
 *         CustomEndpointCertificateArn?: string,
 *         ...,
 *     },
 *     AdvancedSecurityOptions?: array{
 *         Enabled?: bool,
 *         InternalUserDatabaseEnabled?: bool,
 *         MasterUserOptions?: array{MasterUserARN?: string, MasterUserName?: string, MasterUserPassword?: string, ...},
 *         SAMLOptions?: array{
 *             Enabled?: bool,
 *             Idp?: array,
 *             MasterUserName?: string,
 *             MasterBackendRole?: string,
 *             SubjectKey?: string,
 *             RolesKey?: string,
 *             SessionTimeoutMinutes?: int,
 *             ...,
 *         },
 *         JWTOptions?: array{Enabled?: bool, SubjectKey?: string, RolesKey?: string, JwksUrl?: string, PublicKey?: string, ...},
 *         IAMFederationOptions?: array{Enabled?: bool, SubjectKey?: string, RolesKey?: string, ...},
 *         AnonymousAuthEnabled?: bool,
 *         ...,
 *     },
 *     IdentityCenterOptions?: array{
 *         EnabledAPIAccess?: bool,
 *         IdentityCenterInstanceARN?: string,
 *         IdentityCenterInstanceRegion?: string,
 *         SubjectKey?: 'Email'|'UserId'|'UserName',
 *         RolesKey?: 'GroupId'|'GroupName',
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     AutoTuneOptions?: array{DesiredState?: 'DISABLED'|'ENABLED', MaintenanceSchedules?: list<array>, UseOffPeakWindow?: bool, ...},
 *     OffPeakWindowOptions?: array{Enabled?: bool, OffPeakWindow?: array{WindowStartTime?: array, ...}, ...},
 *     SoftwareUpdateOptions?: array{AutoSoftwareUpdateEnabled?: bool, UseLatestServiceSoftwareForBlueGreen?: bool, ...},
 *     AIMLOptions?: array{
 *         NaturalLanguageQueryGenerationOptions?: array{DesiredState?: 'DISABLED'|'ENABLED', ...},
 *         S3VectorsEngine?: array{Enabled?: bool, ...},
 *         ServerlessVectorAcceleration?: array{Enabled?: bool, ...},
 *         ...,
 *     },
 *     DeploymentStrategyOptions?: array{DeploymentStrategy?: 'CapacityOptimized'|'Default', ...},
 *     AutomatedSnapshotPauseOptions?: array{Enabled?: bool, StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UseCase?: 'MIXED'|'OBSERVABILITY'|'SEARCH'|'VECTOR',
 *     EngineMode?: 'GENERAL'|'OPTIMIZED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{
 *     DomainName?: string,
 *     EngineVersion?: string,
 *     ClusterConfig?: array{
 *         InstanceType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         InstanceCount?: int,
 *         DedicatedMasterEnabled?: bool,
 *         ZoneAwarenessEnabled?: bool,
 *         ZoneAwarenessConfig?: array{AvailabilityZoneCount?: int, ...},
 *         DedicatedMasterType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         DedicatedMasterCount?: int,
 *         WarmEnabled?: bool,
 *         WarmType?: 'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         WarmCount?: int,
 *         ColdStorageOptions?: array{Enabled?: bool, ...},
 *         MultiAZWithStandbyEnabled?: bool,
 *         NodeOptions?: list<array>,
 *         ...,
 *     },
 *     EBSOptions?: array{
 *         EBSEnabled?: bool,
 *         VolumeType?: 'gp2'|'gp3'|'io1'|'standard',
 *         VolumeSize?: int,
 *         Iops?: int,
 *         Throughput?: int,
 *         ...,
 *     },
 *     AccessPolicies?: string,
 *     IPAddressType?: 'dualstack'|'ipv4',
 *     SnapshotOptions?: array{AutomatedSnapshotStartHour?: int, ...},
 *     VPCOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, EgressEnabled?: bool, ...},
 *     CognitoOptions?: array{Enabled?: bool, UserPoolId?: string, IdentityPoolId?: string, RoleArn?: string, ...},
 *     EncryptionAtRestOptions?: array{Enabled?: bool, KmsKeyId?: string, ...},
 *     NodeToNodeEncryptionOptions?: array{Enabled?: bool, ...},
 *     AdvancedOptions?: array<string, string>,
 *     LogPublishingOptions?: array<string, array{CloudWatchLogsLogGroupArn?: string, Enabled?: bool, ...}>,
 *     DomainEndpointOptions?: array{
 *         EnforceHTTPS?: bool,
 *         TLSSecurityPolicy?: 'Policy-Min-TLS-1-0-2019-07'|'Policy-Min-TLS-1-2-2019-07'|'Policy-Min-TLS-1-2-PFS-2023-10'|'Policy-Min-TLS-1-2-RFC9151-FIPS-2024-08',
 *         CustomEndpointEnabled?: bool,
 *         CustomEndpoint?: string,
 *         CustomEndpointCertificateArn?: string,
 *         ...,
 *     },
 *     AdvancedSecurityOptions?: array{
 *         Enabled?: bool,
 *         InternalUserDatabaseEnabled?: bool,
 *         MasterUserOptions?: array{MasterUserARN?: string, MasterUserName?: string, MasterUserPassword?: string, ...},
 *         SAMLOptions?: array{
 *             Enabled?: bool,
 *             Idp?: array,
 *             MasterUserName?: string,
 *             MasterBackendRole?: string,
 *             SubjectKey?: string,
 *             RolesKey?: string,
 *             SessionTimeoutMinutes?: int,
 *             ...,
 *         },
 *         JWTOptions?: array{Enabled?: bool, SubjectKey?: string, RolesKey?: string, JwksUrl?: string, PublicKey?: string, ...},
 *         IAMFederationOptions?: array{Enabled?: bool, SubjectKey?: string, RolesKey?: string, ...},
 *         AnonymousAuthEnabled?: bool,
 *         ...,
 *     },
 *     IdentityCenterOptions?: array{
 *         EnabledAPIAccess?: bool,
 *         IdentityCenterInstanceARN?: string,
 *         IdentityCenterInstanceRegion?: string,
 *         SubjectKey?: 'Email'|'UserId'|'UserName',
 *         RolesKey?: 'GroupId'|'GroupName',
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     AutoTuneOptions?: array{DesiredState?: 'DISABLED'|'ENABLED', MaintenanceSchedules?: list<array>, UseOffPeakWindow?: bool, ...},
 *     OffPeakWindowOptions?: array{Enabled?: bool, OffPeakWindow?: array{WindowStartTime?: array, ...}, ...},
 *     SoftwareUpdateOptions?: array{AutoSoftwareUpdateEnabled?: bool, UseLatestServiceSoftwareForBlueGreen?: bool, ...},
 *     AIMLOptions?: array{
 *         NaturalLanguageQueryGenerationOptions?: array{DesiredState?: 'DISABLED'|'ENABLED', ...},
 *         S3VectorsEngine?: array{Enabled?: bool, ...},
 *         ServerlessVectorAcceleration?: array{Enabled?: bool, ...},
 *         ...,
 *     },
 *     DeploymentStrategyOptions?: array{DeploymentStrategy?: 'CapacityOptimized'|'Default', ...},
 *     AutomatedSnapshotPauseOptions?: array{Enabled?: bool, StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UseCase?: 'MIXED'|'OBSERVABILITY'|'SEARCH'|'VECTOR',
 *     EngineMode?: 'GENERAL'|'OPTIMIZED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIndex(array $args = [])
 * @phpstan-method \Aws\Result createIndex(array{DomainName?: string, IndexName?: string, IndexSchema?: array, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIndexAsync(array{DomainName?: string, IndexName?: string, IndexSchema?: array, ...} $args = [])
 * @method \Aws\Result createOutboundConnection(array $args = [])
 * @phpstan-method \Aws\Result createOutboundConnection(array{
 *     LocalDomainInfo?: array{AWSDomainInformation?: array{OwnerId?: string, DomainName?: string, Region?: string, ...}, ...},
 *     RemoteDomainInfo?: array{AWSDomainInformation?: array{OwnerId?: string, DomainName?: string, Region?: string, ...}, ...},
 *     ConnectionAlias?: string,
 *     ConnectionMode?: 'DIRECT'|'VPC_ENDPOINT',
 *     ConnectionProperties?: array{Endpoint?: string, CrossClusterSearch?: array{SkipUnavailable?: 'DISABLED'|'ENABLED', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOutboundConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOutboundConnectionAsync(array{
 *     LocalDomainInfo?: array{AWSDomainInformation?: array{OwnerId?: string, DomainName?: string, Region?: string, ...}, ...},
 *     RemoteDomainInfo?: array{AWSDomainInformation?: array{OwnerId?: string, DomainName?: string, Region?: string, ...}, ...},
 *     ConnectionAlias?: string,
 *     ConnectionMode?: 'DIRECT'|'VPC_ENDPOINT',
 *     ConnectionProperties?: array{Endpoint?: string, CrossClusterSearch?: array{SkipUnavailable?: 'DISABLED'|'ENABLED', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPackage(array $args = [])
 * @phpstan-method \Aws\Result createPackage(array{
 *     PackageName?: string,
 *     PackageType?: 'PACKAGE-CONFIG'|'PACKAGE-LICENSE'|'TXT-DICTIONARY'|'ZIP-PLUGIN',
 *     PackageDescription?: string,
 *     PackageSource?: array{S3BucketName?: string, S3Key?: string, ...},
 *     PackageConfiguration?: array{
 *         LicenseRequirement?: 'NONE'|'OPTIONAL'|'REQUIRED',
 *         LicenseFilepath?: string,
 *         ConfigurationRequirement?: 'NONE'|'OPTIONAL'|'REQUIRED',
 *         RequiresRestartForConfigurationUpdate?: bool,
 *         ...,
 *     },
 *     EngineVersion?: string,
 *     PackageVendingOptions?: array{VendingEnabled?: bool, ...},
 *     PackageEncryptionOptions?: array{KmsKeyIdentifier?: string, EncryptionEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPackageAsync(array{
 *     PackageName?: string,
 *     PackageType?: 'PACKAGE-CONFIG'|'PACKAGE-LICENSE'|'TXT-DICTIONARY'|'ZIP-PLUGIN',
 *     PackageDescription?: string,
 *     PackageSource?: array{S3BucketName?: string, S3Key?: string, ...},
 *     PackageConfiguration?: array{
 *         LicenseRequirement?: 'NONE'|'OPTIONAL'|'REQUIRED',
 *         LicenseFilepath?: string,
 *         ConfigurationRequirement?: 'NONE'|'OPTIONAL'|'REQUIRED',
 *         RequiresRestartForConfigurationUpdate?: bool,
 *         ...,
 *     },
 *     EngineVersion?: string,
 *     PackageVendingOptions?: array{VendingEnabled?: bool, ...},
 *     PackageEncryptionOptions?: array{KmsKeyIdentifier?: string, EncryptionEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createVpcEndpoint(array{
 *     DomainArn?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, EgressEnabled?: bool, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcEndpointAsync(array{
 *     DomainArn?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, EgressEnabled?: bool, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSource(array{DomainName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array{DomainName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteDirectQueryDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDirectQueryDataSource(array{DataSourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectQueryDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDirectQueryDataSourceAsync(array{DataSourceName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteInboundConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteInboundConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInboundConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInboundConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \Aws\Result deleteIndex(array $args = [])
 * @phpstan-method \Aws\Result deleteIndex(array{DomainName?: string, IndexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIndexAsync(array{DomainName?: string, IndexName?: string, ...} $args = [])
 * @method \Aws\Result deleteOutboundConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteOutboundConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOutboundConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOutboundConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \Aws\Result deletePackage(array $args = [])
 * @phpstan-method \Aws\Result deletePackage(array{PackageID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackageAsync(array{PackageID?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcEndpoint(array{VpcEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcEndpointAsync(array{VpcEndpointId?: string, ...} $args = [])
 * @method \Aws\Result deregisterCapability(array $args = [])
 * @phpstan-method \Aws\Result deregisterCapability(array{applicationId?: string, capabilityName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterCapabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterCapabilityAsync(array{applicationId?: string, capabilityName?: string, ...} $args = [])
 * @method \Aws\Result describeDataSourceAttachment(array $args = [])
 * @phpstan-method \Aws\Result describeDataSourceAttachment(array{id?: string, dataSourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSourceAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSourceAttachmentAsync(array{id?: string, dataSourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeDomain(array $args = [])
 * @phpstan-method \Aws\Result describeDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result describeDomainAutoTunes(array $args = [])
 * @phpstan-method \Aws\Result describeDomainAutoTunes(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainAutoTunesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainAutoTunesAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeDomainChangeProgress(array $args = [])
 * @phpstan-method \Aws\Result describeDomainChangeProgress(array{DomainName?: string, ChangeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainChangeProgressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainChangeProgressAsync(array{DomainName?: string, ChangeId?: string, ...} $args = [])
 * @method \Aws\Result describeDomainConfig(array $args = [])
 * @phpstan-method \Aws\Result describeDomainConfig(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainConfigAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result describeDomainHealth(array $args = [])
 * @phpstan-method \Aws\Result describeDomainHealth(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainHealthAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result describeDomainNodes(array $args = [])
 * @phpstan-method \Aws\Result describeDomainNodes(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainNodesAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result describeDomains(array $args = [])
 * @phpstan-method \Aws\Result describeDomains(array{DomainNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainsAsync(array{DomainNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeDryRunProgress(array $args = [])
 * @phpstan-method \Aws\Result describeDryRunProgress(array{DomainName?: string, DryRunId?: string, LoadDryRunConfig?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDryRunProgressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDryRunProgressAsync(array{DomainName?: string, DryRunId?: string, LoadDryRunConfig?: bool, ...} $args = [])
 * @method \Aws\Result describeInboundConnections(array $args = [])
 * @phpstan-method \Aws\Result describeInboundConnections(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInboundConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInboundConnectionsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInsightDetails(array $args = [])
 * @phpstan-method \Aws\Result describeInsightDetails(array{
 *     Entity?: array{Type?: 'Account'|'DomainName', Value?: string, ...},
 *     InsightId?: string,
 *     ShowHtmlContent?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInsightDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInsightDetailsAsync(array{
 *     Entity?: array{Type?: 'Account'|'DomainName', Value?: string, ...},
 *     InsightId?: string,
 *     ShowHtmlContent?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInstanceTypeLimits(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceTypeLimits(array{
 *     DomainName?: string,
 *     InstanceType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *     EngineVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceTypeLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceTypeLimitsAsync(array{
 *     DomainName?: string,
 *     InstanceType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *     EngineVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOutboundConnections(array $args = [])
 * @phpstan-method \Aws\Result describeOutboundConnections(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOutboundConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOutboundConnectionsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePackages(array $args = [])
 * @phpstan-method \Aws\Result describePackages(array{
 *     Filters?: list<array{
 *         Name?: 'EngineVersion'|'PackageID'|'PackageName'|'PackageOwner'|'PackageStatus'|'PackageType',
 *         Value?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePackagesAsync(array{
 *     Filters?: list<array{
 *         Name?: 'EngineVersion'|'PackageID'|'PackageName'|'PackageOwner'|'PackageStatus'|'PackageType',
 *         Value?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReservedInstanceOfferings(array $args = [])
 * @phpstan-method \Aws\Result describeReservedInstanceOfferings(array{ReservedInstanceOfferingId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedInstanceOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedInstanceOfferingsAsync(array{ReservedInstanceOfferingId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeReservedInstances(array $args = [])
 * @phpstan-method \Aws\Result describeReservedInstances(array{ReservedInstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedInstancesAsync(array{ReservedInstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeVpcEndpoints(array $args = [])
 * @phpstan-method \Aws\Result describeVpcEndpoints(array{VpcEndpointIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVpcEndpointsAsync(array{VpcEndpointIds?: list<string>, ...} $args = [])
 * @method \Aws\Result detachDataSource(array $args = [])
 * @phpstan-method \Aws\Result detachDataSource(array{id?: string, dataSourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachDataSourceAsync(array{id?: string, dataSourceArn?: string, ...} $args = [])
 * @method \Aws\Result dissociatePackage(array $args = [])
 * @phpstan-method \Aws\Result dissociatePackage(array{PackageID?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise dissociatePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise dissociatePackageAsync(array{PackageID?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result dissociatePackages(array $args = [])
 * @phpstan-method \Aws\Result dissociatePackages(array{PackageList?: list<string>, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise dissociatePackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise dissociatePackagesAsync(array{PackageList?: list<string>, DomainName?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getCapability(array $args = [])
 * @phpstan-method \Aws\Result getCapability(array{applicationId?: string, capabilityName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCapabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCapabilityAsync(array{applicationId?: string, capabilityName?: string, ...} $args = [])
 * @method \Aws\Result getCompatibleVersions(array $args = [])
 * @phpstan-method \Aws\Result getCompatibleVersions(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCompatibleVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCompatibleVersionsAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result getDataSource(array $args = [])
 * @phpstan-method \Aws\Result getDataSource(array{DomainName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSourceAsync(array{DomainName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getDefaultApplicationSetting(array $args = [])
 * @phpstan-method \Aws\Result getDefaultApplicationSetting(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDefaultApplicationSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDefaultApplicationSettingAsync(array{...} $args = [])
 * @method \Aws\Result getDirectQueryDataSource(array $args = [])
 * @phpstan-method \Aws\Result getDirectQueryDataSource(array{DataSourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDirectQueryDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDirectQueryDataSourceAsync(array{DataSourceName?: string, ...} $args = [])
 * @method \Aws\Result getDomainMaintenanceStatus(array $args = [])
 * @phpstan-method \Aws\Result getDomainMaintenanceStatus(array{DomainName?: string, MaintenanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainMaintenanceStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainMaintenanceStatusAsync(array{DomainName?: string, MaintenanceId?: string, ...} $args = [])
 * @method \Aws\Result getIndex(array $args = [])
 * @phpstan-method \Aws\Result getIndex(array{DomainName?: string, IndexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIndexAsync(array{DomainName?: string, IndexName?: string, ...} $args = [])
 * @method \Aws\Result getMigration(array $args = [])
 * @phpstan-method \Aws\Result getMigration(array{migrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMigrationAsync(array{migrationId?: string, ...} $args = [])
 * @method \Aws\Result getPackageVersionHistory(array $args = [])
 * @phpstan-method \Aws\Result getPackageVersionHistory(array{PackageID?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPackageVersionHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPackageVersionHistoryAsync(array{PackageID?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getUpgradeHistory(array $args = [])
 * @phpstan-method \Aws\Result getUpgradeHistory(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUpgradeHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUpgradeHistoryAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getUpgradeStatus(array $args = [])
 * @phpstan-method \Aws\Result getUpgradeStatus(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUpgradeStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUpgradeStatusAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result insightFeedback(array $args = [])
 * @phpstan-method \Aws\Result insightFeedback(array{
 *     Entity?: array{Type?: 'DomainName', Value?: string, ...},
 *     InsightId?: string,
 *     Thumbs?: 'Down'|'Up',
 *     FeedbackText?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise insightFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise insightFeedbackAsync(array{
 *     Entity?: array{Type?: 'DomainName', Value?: string, ...},
 *     InsightId?: string,
 *     Thumbs?: 'Down'|'Up',
 *     FeedbackText?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{
 *     nextToken?: string,
 *     statuses?: list<'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING'>,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{
 *     nextToken?: string,
 *     statuses?: list<'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING'>,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataSourceAttachments(array $args = [])
 * @phpstan-method \Aws\Result listDataSourceAttachments(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourceAttachmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourceAttachmentsAsync(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataSources(array $args = [])
 * @phpstan-method \Aws\Result listDataSources(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result listDirectQueryDataSources(array $args = [])
 * @phpstan-method \Aws\Result listDirectQueryDataSources(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDirectQueryDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDirectQueryDataSourcesAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDomainMaintenances(array $args = [])
 * @phpstan-method \Aws\Result listDomainMaintenances(array{
 *     DomainName?: string,
 *     Action?: 'REBOOT_NODE'|'RESTART_DASHBOARD'|'RESTART_SEARCH_PROCESS',
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PENDING'|'TIMED_OUT',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainMaintenancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainMaintenancesAsync(array{
 *     DomainName?: string,
 *     Action?: 'REBOOT_NODE'|'RESTART_DASHBOARD'|'RESTART_SEARCH_PROCESS',
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PENDING'|'TIMED_OUT',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDomainNames(array $args = [])
 * @phpstan-method \Aws\Result listDomainNames(array{EngineType?: 'Elasticsearch'|'OpenSearch', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainNamesAsync(array{EngineType?: 'Elasticsearch'|'OpenSearch', ...} $args = [])
 * @method \Aws\Result listDomainsForPackage(array $args = [])
 * @phpstan-method \Aws\Result listDomainsForPackage(array{PackageID?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsForPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsForPackageAsync(array{PackageID?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listInsights(array $args = [])
 * @phpstan-method \Aws\Result listInsights(array{
 *     Entity?: array{Type?: 'Account'|'DomainName', Value?: string, ...},
 *     TimeRange?: array{From?: int, To?: int, ...},
 *     SortOrder?: 'ASC'|'DESC',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInsightsAsync(array{
 *     Entity?: array{Type?: 'Account'|'DomainName', Value?: string, ...},
 *     TimeRange?: array{From?: int, To?: int, ...},
 *     SortOrder?: 'ASC'|'DESC',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInstanceTypeDetails(array $args = [])
 * @phpstan-method \Aws\Result listInstanceTypeDetails(array{
 *     EngineVersion?: string,
 *     DomainName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     RetrieveAZs?: bool,
 *     InstanceType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceTypeDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceTypeDetailsAsync(array{
 *     EngineVersion?: string,
 *     DomainName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     RetrieveAZs?: bool,
 *     InstanceType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMigrations(array $args = [])
 * @phpstan-method \Aws\Result listMigrations(array{applicationId?: string, status?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMigrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMigrationsAsync(array{applicationId?: string, status?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPackagesForDomain(array $args = [])
 * @phpstan-method \Aws\Result listPackagesForDomain(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPackagesForDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackagesForDomainAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listScheduledActions(array $args = [])
 * @phpstan-method \Aws\Result listScheduledActions(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduledActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduledActionsAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ARN?: string, ...} $args = [])
 * @method \Aws\Result listVersions(array $args = [])
 * @phpstan-method \Aws\Result listVersions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVersionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listVpcEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result listVpcEndpointAccess(array{DomainName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcEndpointAccessAsync(array{DomainName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listVpcEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listVpcEndpoints(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcEndpointsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listVpcEndpointsForDomain(array $args = [])
 * @phpstan-method \Aws\Result listVpcEndpointsForDomain(array{DomainName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcEndpointsForDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcEndpointsForDomainAsync(array{DomainName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result purchaseReservedInstanceOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseReservedInstanceOffering(array{ReservedInstanceOfferingId?: string, ReservationName?: string, InstanceCount?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseReservedInstanceOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseReservedInstanceOfferingAsync(array{ReservedInstanceOfferingId?: string, ReservationName?: string, InstanceCount?: int, ...} $args = [])
 * @method \Aws\Result putDefaultApplicationSetting(array $args = [])
 * @phpstan-method \Aws\Result putDefaultApplicationSetting(array{applicationArn?: string, setAsDefault?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDefaultApplicationSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDefaultApplicationSettingAsync(array{applicationArn?: string, setAsDefault?: bool, ...} $args = [])
 * @method \Aws\Result registerCapability(array $args = [])
 * @phpstan-method \Aws\Result registerCapability(array{applicationId?: string, capabilityName?: string, capabilityConfig?: array{aiConfig?: array, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerCapabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerCapabilityAsync(array{applicationId?: string, capabilityName?: string, capabilityConfig?: array{aiConfig?: array, ...}, ...} $args = [])
 * @method \Aws\Result rejectInboundConnection(array $args = [])
 * @phpstan-method \Aws\Result rejectInboundConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectInboundConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectInboundConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @phpstan-method \Aws\Result removeTags(array{ARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsAsync(array{ARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result revokeVpcEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result revokeVpcEndpointAccess(array{
 *     DomainName?: string,
 *     Account?: string,
 *     Service?: 'application.opensearchservice.amazonaws.com',
 *     ServiceOptions?: array{SupportedRegions?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeVpcEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeVpcEndpointAccessAsync(array{
 *     DomainName?: string,
 *     Account?: string,
 *     Service?: 'application.opensearchservice.amazonaws.com',
 *     ServiceOptions?: array{SupportedRegions?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result rollbackServiceSoftwareUpdate(array $args = [])
 * @phpstan-method \Aws\Result rollbackServiceSoftwareUpdate(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rollbackServiceSoftwareUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rollbackServiceSoftwareUpdateAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result startDomainMaintenance(array $args = [])
 * @phpstan-method \Aws\Result startDomainMaintenance(array{
 *     DomainName?: string,
 *     Action?: 'REBOOT_NODE'|'RESTART_DASHBOARD'|'RESTART_SEARCH_PROCESS',
 *     NodeId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDomainMaintenanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDomainMaintenanceAsync(array{
 *     DomainName?: string,
 *     Action?: 'REBOOT_NODE'|'RESTART_DASHBOARD'|'RESTART_SEARCH_PROCESS',
 *     NodeId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMigration(array $args = [])
 * @phpstan-method \Aws\Result startMigration(array{
 *     applicationId?: string,
 *     migrationOptions?: array{
 *         source?: array{datasourceArn?: string, ...},
 *         workspace?: array{workspaceId?: string, createWorkspace?: bool, name?: string, type?: string, ...},
 *         exportOptions?: array{types?: list<string>, objects?: list<array>, includeReferencesDeep?: bool, ...},
 *         conflictResolution?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMigrationAsync(array{
 *     applicationId?: string,
 *     migrationOptions?: array{
 *         source?: array{datasourceArn?: string, ...},
 *         workspace?: array{workspaceId?: string, createWorkspace?: bool, name?: string, type?: string, ...},
 *         exportOptions?: array{types?: list<string>, objects?: list<array>, includeReferencesDeep?: bool, ...},
 *         conflictResolution?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startServiceSoftwareUpdate(array $args = [])
 * @phpstan-method \Aws\Result startServiceSoftwareUpdate(array{DomainName?: string, ScheduleAt?: 'NOW'|'OFF_PEAK_WINDOW'|'TIMESTAMP', DesiredStartTime?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startServiceSoftwareUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startServiceSoftwareUpdateAsync(array{DomainName?: string, ScheduleAt?: 'NOW'|'OFF_PEAK_WINDOW'|'TIMESTAMP', DesiredStartTime?: int, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     id?: string,
 *     dataSources?: list<array{dataSourceArn?: string, dataSourceDescription?: string, iamRoleForDataSourceArn?: string, ...}>,
 *     appConfigs?: list<array{
 *         key?: 'opensearchDashboards.dashboardAdmin.groups'|'opensearchDashboards.dashboardAdmin.users',
 *         value?: string,
 *         ...,
 *     }>,
 *     iamIdentityCenterOptions?: array{
 *         enabled?: bool,
 *         iamIdentityCenterInstanceArn?: string,
 *         iamRoleForIdentityCenterApplicationArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     id?: string,
 *     dataSources?: list<array{dataSourceArn?: string, dataSourceDescription?: string, iamRoleForDataSourceArn?: string, ...}>,
 *     appConfigs?: list<array{
 *         key?: 'opensearchDashboards.dashboardAdmin.groups'|'opensearchDashboards.dashboardAdmin.users',
 *         value?: string,
 *         ...,
 *     }>,
 *     iamIdentityCenterOptions?: array{
 *         enabled?: bool,
 *         iamIdentityCenterInstanceArn?: string,
 *         iamRoleForIdentityCenterApplicationArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDataSource(array{
 *     DomainName?: string,
 *     Name?: string,
 *     DataSourceType?: array{S3GlueDataCatalog?: array{RoleArn?: string, ...}, ...},
 *     Description?: string,
 *     Status?: 'ACTIVE'|'DISABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array{
 *     DomainName?: string,
 *     Name?: string,
 *     DataSourceType?: array{S3GlueDataCatalog?: array{RoleArn?: string, ...}, ...},
 *     Description?: string,
 *     Status?: 'ACTIVE'|'DISABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDirectQueryDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDirectQueryDataSource(array{
 *     DataSourceName?: string,
 *     DataSourceType?: array{
 *         CloudWatchLog?: array{RoleArn?: string, ...},
 *         SecurityLake?: array{RoleArn?: string, ...},
 *         Prometheus?: array{RoleArn?: string, WorkspaceArn?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     OpenSearchArns?: list<string>,
 *     DataSourceAccessPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDirectQueryDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDirectQueryDataSourceAsync(array{
 *     DataSourceName?: string,
 *     DataSourceType?: array{
 *         CloudWatchLog?: array{RoleArn?: string, ...},
 *         SecurityLake?: array{RoleArn?: string, ...},
 *         Prometheus?: array{RoleArn?: string, WorkspaceArn?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     OpenSearchArns?: list<string>,
 *     DataSourceAccessPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainConfig(array $args = [])
 * @phpstan-method \Aws\Result updateDomainConfig(array{
 *     DomainName?: string,
 *     ClusterConfig?: array{
 *         InstanceType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         InstanceCount?: int,
 *         DedicatedMasterEnabled?: bool,
 *         ZoneAwarenessEnabled?: bool,
 *         ZoneAwarenessConfig?: array{AvailabilityZoneCount?: int, ...},
 *         DedicatedMasterType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         DedicatedMasterCount?: int,
 *         WarmEnabled?: bool,
 *         WarmType?: 'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         WarmCount?: int,
 *         ColdStorageOptions?: array{Enabled?: bool, ...},
 *         MultiAZWithStandbyEnabled?: bool,
 *         NodeOptions?: list<array>,
 *         ...,
 *     },
 *     EBSOptions?: array{
 *         EBSEnabled?: bool,
 *         VolumeType?: 'gp2'|'gp3'|'io1'|'standard',
 *         VolumeSize?: int,
 *         Iops?: int,
 *         Throughput?: int,
 *         ...,
 *     },
 *     SnapshotOptions?: array{AutomatedSnapshotStartHour?: int, ...},
 *     VPCOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, EgressEnabled?: bool, ...},
 *     CognitoOptions?: array{Enabled?: bool, UserPoolId?: string, IdentityPoolId?: string, RoleArn?: string, ...},
 *     AdvancedOptions?: array<string, string>,
 *     AccessPolicies?: string,
 *     IPAddressType?: 'dualstack'|'ipv4',
 *     LogPublishingOptions?: array<string, array{CloudWatchLogsLogGroupArn?: string, Enabled?: bool, ...}>,
 *     EncryptionAtRestOptions?: array{Enabled?: bool, KmsKeyId?: string, ...},
 *     DomainEndpointOptions?: array{
 *         EnforceHTTPS?: bool,
 *         TLSSecurityPolicy?: 'Policy-Min-TLS-1-0-2019-07'|'Policy-Min-TLS-1-2-2019-07'|'Policy-Min-TLS-1-2-PFS-2023-10'|'Policy-Min-TLS-1-2-RFC9151-FIPS-2024-08',
 *         CustomEndpointEnabled?: bool,
 *         CustomEndpoint?: string,
 *         CustomEndpointCertificateArn?: string,
 *         ...,
 *     },
 *     NodeToNodeEncryptionOptions?: array{Enabled?: bool, ...},
 *     AdvancedSecurityOptions?: array{
 *         Enabled?: bool,
 *         InternalUserDatabaseEnabled?: bool,
 *         MasterUserOptions?: array{MasterUserARN?: string, MasterUserName?: string, MasterUserPassword?: string, ...},
 *         SAMLOptions?: array{
 *             Enabled?: bool,
 *             Idp?: array,
 *             MasterUserName?: string,
 *             MasterBackendRole?: string,
 *             SubjectKey?: string,
 *             RolesKey?: string,
 *             SessionTimeoutMinutes?: int,
 *             ...,
 *         },
 *         JWTOptions?: array{Enabled?: bool, SubjectKey?: string, RolesKey?: string, JwksUrl?: string, PublicKey?: string, ...},
 *         IAMFederationOptions?: array{Enabled?: bool, SubjectKey?: string, RolesKey?: string, ...},
 *         AnonymousAuthEnabled?: bool,
 *         ...,
 *     },
 *     IdentityCenterOptions?: array{
 *         EnabledAPIAccess?: bool,
 *         IdentityCenterInstanceARN?: string,
 *         IdentityCenterInstanceRegion?: string,
 *         SubjectKey?: 'Email'|'UserId'|'UserName',
 *         RolesKey?: 'GroupId'|'GroupName',
 *         ...,
 *     },
 *     AutoTuneOptions?: array{
 *         DesiredState?: 'DISABLED'|'ENABLED',
 *         RollbackOnDisable?: 'DEFAULT_ROLLBACK'|'NO_ROLLBACK',
 *         MaintenanceSchedules?: list<array>,
 *         UseOffPeakWindow?: bool,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     DryRunMode?: 'Basic'|'Verbose',
 *     OffPeakWindowOptions?: array{Enabled?: bool, OffPeakWindow?: array{WindowStartTime?: array, ...}, ...},
 *     SoftwareUpdateOptions?: array{AutoSoftwareUpdateEnabled?: bool, UseLatestServiceSoftwareForBlueGreen?: bool, ...},
 *     AIMLOptions?: array{
 *         NaturalLanguageQueryGenerationOptions?: array{DesiredState?: 'DISABLED'|'ENABLED', ...},
 *         S3VectorsEngine?: array{Enabled?: bool, ...},
 *         ServerlessVectorAcceleration?: array{Enabled?: bool, ...},
 *         ...,
 *     },
 *     DeploymentStrategyOptions?: array{DeploymentStrategy?: 'CapacityOptimized'|'Default', ...},
 *     AutomatedSnapshotPauseOptions?: array{Enabled?: bool, StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UseCase?: 'MIXED'|'OBSERVABILITY'|'SEARCH'|'VECTOR',
 *     EngineMode?: 'GENERAL'|'OPTIMIZED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainConfigAsync(array{
 *     DomainName?: string,
 *     ClusterConfig?: array{
 *         InstanceType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         InstanceCount?: int,
 *         DedicatedMasterEnabled?: bool,
 *         ZoneAwarenessEnabled?: bool,
 *         ZoneAwarenessConfig?: array{AvailabilityZoneCount?: int, ...},
 *         DedicatedMasterType?: 'c4.2xlarge.search'|'c4.4xlarge.search'|'c4.8xlarge.search'|'c4.large.search'|'c4.xlarge.search'|'c5.18xlarge.search'|'c5.2xlarge.search'|'c5.4xlarge.search'|'c5.9xlarge.search'|'c5.large.search'|'c5.xlarge.search'|'c6g.12xlarge.search'|'c6g.2xlarge.search'|'c6g.4xlarge.search'|'c6g.8xlarge.search'|'c6g.large.search'|'c6g.xlarge.search'|'d2.2xlarge.search'|'d2.4xlarge.search'|'d2.8xlarge.search'|'d2.xlarge.search'|'i2.2xlarge.search'|'i2.xlarge.search'|'i3.16xlarge.search'|'i3.2xlarge.search'|'i3.4xlarge.search'|'i3.8xlarge.search'|'i3.large.search'|'i3.xlarge.search'|'m3.2xlarge.search'|'m3.large.search'|'m3.medium.search'|'m3.xlarge.search'|'m4.10xlarge.search'|'m4.2xlarge.search'|'m4.4xlarge.search'|'m4.large.search'|'m4.xlarge.search'|'m5.12xlarge.search'|'m5.24xlarge.search'|'m5.2xlarge.search'|'m5.4xlarge.search'|'m5.large.search'|'m5.xlarge.search'|'m6g.12xlarge.search'|'m6g.2xlarge.search'|'m6g.4xlarge.search'|'m6g.8xlarge.search'|'m6g.large.search'|'m6g.xlarge.search'|'or1.12xlarge.search'|'or1.16xlarge.search'|'or1.2xlarge.search'|'or1.4xlarge.search'|'or1.8xlarge.search'|'or1.large.search'|'or1.medium.search'|'or1.xlarge.search'|'r3.2xlarge.search'|'r3.4xlarge.search'|'r3.8xlarge.search'|'r3.large.search'|'r3.xlarge.search'|'r4.16xlarge.search'|'r4.2xlarge.search'|'r4.4xlarge.search'|'r4.8xlarge.search'|'r4.large.search'|'r4.xlarge.search'|'r5.12xlarge.search'|'r5.24xlarge.search'|'r5.2xlarge.search'|'r5.4xlarge.search'|'r5.large.search'|'r5.xlarge.search'|'r6g.12xlarge.search'|'r6g.2xlarge.search'|'r6g.4xlarge.search'|'r6g.8xlarge.search'|'r6g.large.search'|'r6g.xlarge.search'|'r6gd.12xlarge.search'|'r6gd.16xlarge.search'|'r6gd.2xlarge.search'|'r6gd.4xlarge.search'|'r6gd.8xlarge.search'|'r6gd.large.search'|'r6gd.xlarge.search'|'t2.medium.search'|'t2.micro.search'|'t2.small.search'|'t3.2xlarge.search'|'t3.large.search'|'t3.medium.search'|'t3.micro.search'|'t3.nano.search'|'t3.small.search'|'t3.xlarge.search'|'t4g.medium.search'|'t4g.small.search'|'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         DedicatedMasterCount?: int,
 *         WarmEnabled?: bool,
 *         WarmType?: 'ultrawarm1.large.search'|'ultrawarm1.medium.search'|'ultrawarm1.xlarge.search',
 *         WarmCount?: int,
 *         ColdStorageOptions?: array{Enabled?: bool, ...},
 *         MultiAZWithStandbyEnabled?: bool,
 *         NodeOptions?: list<array>,
 *         ...,
 *     },
 *     EBSOptions?: array{
 *         EBSEnabled?: bool,
 *         VolumeType?: 'gp2'|'gp3'|'io1'|'standard',
 *         VolumeSize?: int,
 *         Iops?: int,
 *         Throughput?: int,
 *         ...,
 *     },
 *     SnapshotOptions?: array{AutomatedSnapshotStartHour?: int, ...},
 *     VPCOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, EgressEnabled?: bool, ...},
 *     CognitoOptions?: array{Enabled?: bool, UserPoolId?: string, IdentityPoolId?: string, RoleArn?: string, ...},
 *     AdvancedOptions?: array<string, string>,
 *     AccessPolicies?: string,
 *     IPAddressType?: 'dualstack'|'ipv4',
 *     LogPublishingOptions?: array<string, array{CloudWatchLogsLogGroupArn?: string, Enabled?: bool, ...}>,
 *     EncryptionAtRestOptions?: array{Enabled?: bool, KmsKeyId?: string, ...},
 *     DomainEndpointOptions?: array{
 *         EnforceHTTPS?: bool,
 *         TLSSecurityPolicy?: 'Policy-Min-TLS-1-0-2019-07'|'Policy-Min-TLS-1-2-2019-07'|'Policy-Min-TLS-1-2-PFS-2023-10'|'Policy-Min-TLS-1-2-RFC9151-FIPS-2024-08',
 *         CustomEndpointEnabled?: bool,
 *         CustomEndpoint?: string,
 *         CustomEndpointCertificateArn?: string,
 *         ...,
 *     },
 *     NodeToNodeEncryptionOptions?: array{Enabled?: bool, ...},
 *     AdvancedSecurityOptions?: array{
 *         Enabled?: bool,
 *         InternalUserDatabaseEnabled?: bool,
 *         MasterUserOptions?: array{MasterUserARN?: string, MasterUserName?: string, MasterUserPassword?: string, ...},
 *         SAMLOptions?: array{
 *             Enabled?: bool,
 *             Idp?: array,
 *             MasterUserName?: string,
 *             MasterBackendRole?: string,
 *             SubjectKey?: string,
 *             RolesKey?: string,
 *             SessionTimeoutMinutes?: int,
 *             ...,
 *         },
 *         JWTOptions?: array{Enabled?: bool, SubjectKey?: string, RolesKey?: string, JwksUrl?: string, PublicKey?: string, ...},
 *         IAMFederationOptions?: array{Enabled?: bool, SubjectKey?: string, RolesKey?: string, ...},
 *         AnonymousAuthEnabled?: bool,
 *         ...,
 *     },
 *     IdentityCenterOptions?: array{
 *         EnabledAPIAccess?: bool,
 *         IdentityCenterInstanceARN?: string,
 *         IdentityCenterInstanceRegion?: string,
 *         SubjectKey?: 'Email'|'UserId'|'UserName',
 *         RolesKey?: 'GroupId'|'GroupName',
 *         ...,
 *     },
 *     AutoTuneOptions?: array{
 *         DesiredState?: 'DISABLED'|'ENABLED',
 *         RollbackOnDisable?: 'DEFAULT_ROLLBACK'|'NO_ROLLBACK',
 *         MaintenanceSchedules?: list<array>,
 *         UseOffPeakWindow?: bool,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     DryRunMode?: 'Basic'|'Verbose',
 *     OffPeakWindowOptions?: array{Enabled?: bool, OffPeakWindow?: array{WindowStartTime?: array, ...}, ...},
 *     SoftwareUpdateOptions?: array{AutoSoftwareUpdateEnabled?: bool, UseLatestServiceSoftwareForBlueGreen?: bool, ...},
 *     AIMLOptions?: array{
 *         NaturalLanguageQueryGenerationOptions?: array{DesiredState?: 'DISABLED'|'ENABLED', ...},
 *         S3VectorsEngine?: array{Enabled?: bool, ...},
 *         ServerlessVectorAcceleration?: array{Enabled?: bool, ...},
 *         ...,
 *     },
 *     DeploymentStrategyOptions?: array{DeploymentStrategy?: 'CapacityOptimized'|'Default', ...},
 *     AutomatedSnapshotPauseOptions?: array{Enabled?: bool, StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UseCase?: 'MIXED'|'OBSERVABILITY'|'SEARCH'|'VECTOR',
 *     EngineMode?: 'GENERAL'|'OPTIMIZED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIndex(array $args = [])
 * @phpstan-method \Aws\Result updateIndex(array{DomainName?: string, IndexName?: string, IndexSchema?: array, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIndexAsync(array{DomainName?: string, IndexName?: string, IndexSchema?: array, ...} $args = [])
 * @method \Aws\Result updatePackage(array $args = [])
 * @phpstan-method \Aws\Result updatePackage(array{
 *     PackageID?: string,
 *     PackageSource?: array{S3BucketName?: string, S3Key?: string, ...},
 *     PackageDescription?: string,
 *     CommitMessage?: string,
 *     PackageConfiguration?: array{
 *         LicenseRequirement?: 'NONE'|'OPTIONAL'|'REQUIRED',
 *         LicenseFilepath?: string,
 *         ConfigurationRequirement?: 'NONE'|'OPTIONAL'|'REQUIRED',
 *         RequiresRestartForConfigurationUpdate?: bool,
 *         ...,
 *     },
 *     PackageEncryptionOptions?: array{KmsKeyIdentifier?: string, EncryptionEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageAsync(array{
 *     PackageID?: string,
 *     PackageSource?: array{S3BucketName?: string, S3Key?: string, ...},
 *     PackageDescription?: string,
 *     CommitMessage?: string,
 *     PackageConfiguration?: array{
 *         LicenseRequirement?: 'NONE'|'OPTIONAL'|'REQUIRED',
 *         LicenseFilepath?: string,
 *         ConfigurationRequirement?: 'NONE'|'OPTIONAL'|'REQUIRED',
 *         RequiresRestartForConfigurationUpdate?: bool,
 *         ...,
 *     },
 *     PackageEncryptionOptions?: array{KmsKeyIdentifier?: string, EncryptionEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePackageScope(array $args = [])
 * @phpstan-method \Aws\Result updatePackageScope(array{PackageID?: string, Operation?: 'ADD'|'OVERRIDE'|'REMOVE', PackageUserList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePackageScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageScopeAsync(array{PackageID?: string, Operation?: 'ADD'|'OVERRIDE'|'REMOVE', PackageUserList?: list<string>, ...} $args = [])
 * @method \Aws\Result updateScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result updateScheduledAction(array{
 *     DomainName?: string,
 *     ActionID?: string,
 *     ActionType?: 'JVM_HEAP_SIZE_TUNING'|'JVM_YOUNG_GEN_TUNING'|'SERVICE_SOFTWARE_UPDATE',
 *     ScheduleAt?: 'NOW'|'OFF_PEAK_WINDOW'|'TIMESTAMP',
 *     DesiredStartTime?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduledActionAsync(array{
 *     DomainName?: string,
 *     ActionID?: string,
 *     ActionType?: 'JVM_HEAP_SIZE_TUNING'|'JVM_YOUNG_GEN_TUNING'|'SERVICE_SOFTWARE_UPDATE',
 *     ScheduleAt?: 'NOW'|'OFF_PEAK_WINDOW'|'TIMESTAMP',
 *     DesiredStartTime?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateVpcEndpoint(array{
 *     VpcEndpointId?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, EgressEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVpcEndpointAsync(array{
 *     VpcEndpointId?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, EgressEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result upgradeDomain(array $args = [])
 * @phpstan-method \Aws\Result upgradeDomain(array{
 *     DomainName?: string,
 *     TargetVersion?: string,
 *     PerformCheckOnly?: bool,
 *     AdvancedOptions?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise upgradeDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise upgradeDomainAsync(array{
 *     DomainName?: string,
 *     TargetVersion?: string,
 *     PerformCheckOnly?: bool,
 *     AdvancedOptions?: array<string, string>,
 *     ...,
 * } $args = [])
 */
class OpenSearchServiceClient extends AwsClient {}
