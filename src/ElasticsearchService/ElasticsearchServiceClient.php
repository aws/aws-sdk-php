<?php
namespace Aws\ElasticsearchService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elasticsearch Service** service.
 *
 * @method \Aws\Result acceptInboundCrossClusterSearchConnection(array $args = [])
 * @phpstan-method \Aws\Result acceptInboundCrossClusterSearchConnection(array{CrossClusterSearchConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptInboundCrossClusterSearchConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptInboundCrossClusterSearchConnectionAsync(array{CrossClusterSearchConnectionId?: string, ...} $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{ARN?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{ARN?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result associatePackage(array $args = [])
 * @phpstan-method \Aws\Result associatePackage(array{PackageID?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePackageAsync(array{PackageID?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result authorizeVpcEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result authorizeVpcEndpointAccess(array{DomainName?: string, Account?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeVpcEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeVpcEndpointAccessAsync(array{DomainName?: string, Account?: string, ...} $args = [])
 * @method \Aws\Result cancelDomainConfigChange(array $args = [])
 * @phpstan-method \Aws\Result cancelDomainConfigChange(array{DomainName?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDomainConfigChangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelDomainConfigChangeAsync(array{DomainName?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result cancelElasticsearchServiceSoftwareUpdate(array $args = [])
 * @phpstan-method \Aws\Result cancelElasticsearchServiceSoftwareUpdate(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelElasticsearchServiceSoftwareUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelElasticsearchServiceSoftwareUpdateAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result createElasticsearchDomain(array $args = [])
 * @phpstan-method \Aws\Result createElasticsearchDomain(array{
 *     DomainName?: string,
 *     ElasticsearchVersion?: string,
 *     ElasticsearchClusterConfig?: array{
 *         InstanceType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         InstanceCount?: int,
 *         DedicatedMasterEnabled?: bool,
 *         ZoneAwarenessEnabled?: bool,
 *         ZoneAwarenessConfig?: array{AvailabilityZoneCount?: int, ...},
 *         DedicatedMasterType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         DedicatedMasterCount?: int,
 *         WarmEnabled?: bool,
 *         WarmType?: 'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         WarmCount?: int,
 *         ColdStorageOptions?: array{Enabled?: bool, ...},
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
 *     SnapshotOptions?: array{AutomatedSnapshotStartHour?: int, ...},
 *     VPCOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
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
 *         AnonymousAuthEnabled?: bool,
 *         ...,
 *     },
 *     AutoTuneOptions?: array{DesiredState?: 'DISABLED'|'ENABLED', MaintenanceSchedules?: list<array>, ...},
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     DeploymentStrategyOptions?: array{DeploymentStrategy?: 'CapacityOptimized'|'Default', ...},
 *     AutomatedSnapshotPauseOptions?: array{Enabled?: bool, StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UseCase?: 'MIXED'|'OBSERVABILITY'|'SEARCH'|'VECTOR',
 *     EngineMode?: 'GENERAL'|'OPTIMIZED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createElasticsearchDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createElasticsearchDomainAsync(array{
 *     DomainName?: string,
 *     ElasticsearchVersion?: string,
 *     ElasticsearchClusterConfig?: array{
 *         InstanceType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         InstanceCount?: int,
 *         DedicatedMasterEnabled?: bool,
 *         ZoneAwarenessEnabled?: bool,
 *         ZoneAwarenessConfig?: array{AvailabilityZoneCount?: int, ...},
 *         DedicatedMasterType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         DedicatedMasterCount?: int,
 *         WarmEnabled?: bool,
 *         WarmType?: 'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         WarmCount?: int,
 *         ColdStorageOptions?: array{Enabled?: bool, ...},
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
 *     SnapshotOptions?: array{AutomatedSnapshotStartHour?: int, ...},
 *     VPCOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
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
 *         AnonymousAuthEnabled?: bool,
 *         ...,
 *     },
 *     AutoTuneOptions?: array{DesiredState?: 'DISABLED'|'ENABLED', MaintenanceSchedules?: list<array>, ...},
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     DeploymentStrategyOptions?: array{DeploymentStrategy?: 'CapacityOptimized'|'Default', ...},
 *     AutomatedSnapshotPauseOptions?: array{Enabled?: bool, StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UseCase?: 'MIXED'|'OBSERVABILITY'|'SEARCH'|'VECTOR',
 *     EngineMode?: 'GENERAL'|'OPTIMIZED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOutboundCrossClusterSearchConnection(array $args = [])
 * @phpstan-method \Aws\Result createOutboundCrossClusterSearchConnection(array{
 *     SourceDomainInfo?: array{OwnerId?: string, DomainName?: string, Region?: string, ...},
 *     DestinationDomainInfo?: array{OwnerId?: string, DomainName?: string, Region?: string, ...},
 *     ConnectionAlias?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOutboundCrossClusterSearchConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOutboundCrossClusterSearchConnectionAsync(array{
 *     SourceDomainInfo?: array{OwnerId?: string, DomainName?: string, Region?: string, ...},
 *     DestinationDomainInfo?: array{OwnerId?: string, DomainName?: string, Region?: string, ...},
 *     ConnectionAlias?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPackage(array $args = [])
 * @phpstan-method \Aws\Result createPackage(array{
 *     PackageName?: string,
 *     PackageType?: 'TXT-DICTIONARY',
 *     PackageDescription?: string,
 *     PackageSource?: array{S3BucketName?: string, S3Key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPackageAsync(array{
 *     PackageName?: string,
 *     PackageType?: 'TXT-DICTIONARY',
 *     PackageDescription?: string,
 *     PackageSource?: array{S3BucketName?: string, S3Key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createVpcEndpoint(array{
 *     DomainArn?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcEndpointAsync(array{
 *     DomainArn?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteElasticsearchDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteElasticsearchDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteElasticsearchDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteElasticsearchDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteElasticsearchServiceRole(array $args = [])
 * @phpstan-method \Aws\Result deleteElasticsearchServiceRole(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteElasticsearchServiceRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteElasticsearchServiceRoleAsync(array{...} $args = [])
 * @method \Aws\Result deleteInboundCrossClusterSearchConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteInboundCrossClusterSearchConnection(array{CrossClusterSearchConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInboundCrossClusterSearchConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInboundCrossClusterSearchConnectionAsync(array{CrossClusterSearchConnectionId?: string, ...} $args = [])
 * @method \Aws\Result deleteOutboundCrossClusterSearchConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteOutboundCrossClusterSearchConnection(array{CrossClusterSearchConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOutboundCrossClusterSearchConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOutboundCrossClusterSearchConnectionAsync(array{CrossClusterSearchConnectionId?: string, ...} $args = [])
 * @method \Aws\Result deletePackage(array $args = [])
 * @phpstan-method \Aws\Result deletePackage(array{PackageID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackageAsync(array{PackageID?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcEndpoint(array{VpcEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcEndpointAsync(array{VpcEndpointId?: string, ...} $args = [])
 * @method \Aws\Result describeDomainAutoTunes(array $args = [])
 * @phpstan-method \Aws\Result describeDomainAutoTunes(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainAutoTunesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainAutoTunesAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeDomainChangeProgress(array $args = [])
 * @phpstan-method \Aws\Result describeDomainChangeProgress(array{DomainName?: string, ChangeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainChangeProgressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainChangeProgressAsync(array{DomainName?: string, ChangeId?: string, ...} $args = [])
 * @method \Aws\Result describeElasticsearchDomain(array $args = [])
 * @phpstan-method \Aws\Result describeElasticsearchDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeElasticsearchDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeElasticsearchDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result describeElasticsearchDomainConfig(array $args = [])
 * @phpstan-method \Aws\Result describeElasticsearchDomainConfig(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeElasticsearchDomainConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeElasticsearchDomainConfigAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result describeElasticsearchDomains(array $args = [])
 * @phpstan-method \Aws\Result describeElasticsearchDomains(array{DomainNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeElasticsearchDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeElasticsearchDomainsAsync(array{DomainNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeElasticsearchInstanceTypeLimits(array $args = [])
 * @phpstan-method \Aws\Result describeElasticsearchInstanceTypeLimits(array{
 *     DomainName?: string,
 *     InstanceType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *     ElasticsearchVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeElasticsearchInstanceTypeLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeElasticsearchInstanceTypeLimitsAsync(array{
 *     DomainName?: string,
 *     InstanceType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *     ElasticsearchVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInboundCrossClusterSearchConnections(array $args = [])
 * @phpstan-method \Aws\Result describeInboundCrossClusterSearchConnections(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInboundCrossClusterSearchConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInboundCrossClusterSearchConnectionsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOutboundCrossClusterSearchConnections(array $args = [])
 * @phpstan-method \Aws\Result describeOutboundCrossClusterSearchConnections(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOutboundCrossClusterSearchConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOutboundCrossClusterSearchConnectionsAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePackages(array $args = [])
 * @phpstan-method \Aws\Result describePackages(array{
 *     Filters?: list<array{Name?: 'PackageID'|'PackageName'|'PackageStatus', Value?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePackagesAsync(array{
 *     Filters?: list<array{Name?: 'PackageID'|'PackageName'|'PackageStatus', Value?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReservedElasticsearchInstanceOfferings(array $args = [])
 * @phpstan-method \Aws\Result describeReservedElasticsearchInstanceOfferings(array{ReservedElasticsearchInstanceOfferingId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedElasticsearchInstanceOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedElasticsearchInstanceOfferingsAsync(array{ReservedElasticsearchInstanceOfferingId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeReservedElasticsearchInstances(array $args = [])
 * @phpstan-method \Aws\Result describeReservedElasticsearchInstances(array{ReservedElasticsearchInstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedElasticsearchInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedElasticsearchInstancesAsync(array{ReservedElasticsearchInstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeVpcEndpoints(array $args = [])
 * @phpstan-method \Aws\Result describeVpcEndpoints(array{VpcEndpointIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVpcEndpointsAsync(array{VpcEndpointIds?: list<string>, ...} $args = [])
 * @method \Aws\Result dissociatePackage(array $args = [])
 * @phpstan-method \Aws\Result dissociatePackage(array{PackageID?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise dissociatePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise dissociatePackageAsync(array{PackageID?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result getCompatibleElasticsearchVersions(array $args = [])
 * @phpstan-method \Aws\Result getCompatibleElasticsearchVersions(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCompatibleElasticsearchVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCompatibleElasticsearchVersionsAsync(array{DomainName?: string, ...} $args = [])
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
 * @method \Aws\Result listDomainNames(array $args = [])
 * @phpstan-method \Aws\Result listDomainNames(array{EngineType?: 'Elasticsearch'|'OpenSearch', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainNamesAsync(array{EngineType?: 'Elasticsearch'|'OpenSearch', ...} $args = [])
 * @method \Aws\Result listDomainsForPackage(array $args = [])
 * @phpstan-method \Aws\Result listDomainsForPackage(array{PackageID?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsForPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsForPackageAsync(array{PackageID?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listElasticsearchInstanceTypes(array $args = [])
 * @phpstan-method \Aws\Result listElasticsearchInstanceTypes(array{ElasticsearchVersion?: string, DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listElasticsearchInstanceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listElasticsearchInstanceTypesAsync(array{ElasticsearchVersion?: string, DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listElasticsearchVersions(array $args = [])
 * @phpstan-method \Aws\Result listElasticsearchVersions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listElasticsearchVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listElasticsearchVersionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPackagesForDomain(array $args = [])
 * @phpstan-method \Aws\Result listPackagesForDomain(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPackagesForDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackagesForDomainAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ARN?: string, ...} $args = [])
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
 * @method \Aws\Result purchaseReservedElasticsearchInstanceOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseReservedElasticsearchInstanceOffering(array{ReservedElasticsearchInstanceOfferingId?: string, ReservationName?: string, InstanceCount?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseReservedElasticsearchInstanceOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseReservedElasticsearchInstanceOfferingAsync(array{ReservedElasticsearchInstanceOfferingId?: string, ReservationName?: string, InstanceCount?: int, ...} $args = [])
 * @method \Aws\Result rejectInboundCrossClusterSearchConnection(array $args = [])
 * @phpstan-method \Aws\Result rejectInboundCrossClusterSearchConnection(array{CrossClusterSearchConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectInboundCrossClusterSearchConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectInboundCrossClusterSearchConnectionAsync(array{CrossClusterSearchConnectionId?: string, ...} $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @phpstan-method \Aws\Result removeTags(array{ARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsAsync(array{ARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result revokeVpcEndpointAccess(array $args = [])
 * @phpstan-method \Aws\Result revokeVpcEndpointAccess(array{DomainName?: string, Account?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeVpcEndpointAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeVpcEndpointAccessAsync(array{DomainName?: string, Account?: string, ...} $args = [])
 * @method \Aws\Result startElasticsearchServiceSoftwareUpdate(array $args = [])
 * @phpstan-method \Aws\Result startElasticsearchServiceSoftwareUpdate(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startElasticsearchServiceSoftwareUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startElasticsearchServiceSoftwareUpdateAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result updateElasticsearchDomainConfig(array $args = [])
 * @phpstan-method \Aws\Result updateElasticsearchDomainConfig(array{
 *     DomainName?: string,
 *     ElasticsearchClusterConfig?: array{
 *         InstanceType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         InstanceCount?: int,
 *         DedicatedMasterEnabled?: bool,
 *         ZoneAwarenessEnabled?: bool,
 *         ZoneAwarenessConfig?: array{AvailabilityZoneCount?: int, ...},
 *         DedicatedMasterType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         DedicatedMasterCount?: int,
 *         WarmEnabled?: bool,
 *         WarmType?: 'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         WarmCount?: int,
 *         ColdStorageOptions?: array{Enabled?: bool, ...},
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
 *     VPCOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     CognitoOptions?: array{Enabled?: bool, UserPoolId?: string, IdentityPoolId?: string, RoleArn?: string, ...},
 *     AdvancedOptions?: array<string, string>,
 *     AccessPolicies?: string,
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
 *         AnonymousAuthEnabled?: bool,
 *         ...,
 *     },
 *     NodeToNodeEncryptionOptions?: array{Enabled?: bool, ...},
 *     EncryptionAtRestOptions?: array{Enabled?: bool, KmsKeyId?: string, ...},
 *     AutoTuneOptions?: array{
 *         DesiredState?: 'DISABLED'|'ENABLED',
 *         RollbackOnDisable?: 'DEFAULT_ROLLBACK'|'NO_ROLLBACK',
 *         MaintenanceSchedules?: list<array>,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     DeploymentStrategyOptions?: array{DeploymentStrategy?: 'CapacityOptimized'|'Default', ...},
 *     AutomatedSnapshotPauseOptions?: array{Enabled?: bool, StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UseCase?: 'MIXED'|'OBSERVABILITY'|'SEARCH'|'VECTOR',
 *     EngineMode?: 'GENERAL'|'OPTIMIZED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateElasticsearchDomainConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateElasticsearchDomainConfigAsync(array{
 *     DomainName?: string,
 *     ElasticsearchClusterConfig?: array{
 *         InstanceType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         InstanceCount?: int,
 *         DedicatedMasterEnabled?: bool,
 *         ZoneAwarenessEnabled?: bool,
 *         ZoneAwarenessConfig?: array{AvailabilityZoneCount?: int, ...},
 *         DedicatedMasterType?: 'c4.2xlarge.elasticsearch'|'c4.4xlarge.elasticsearch'|'c4.8xlarge.elasticsearch'|'c4.large.elasticsearch'|'c4.xlarge.elasticsearch'|'c5.18xlarge.elasticsearch'|'c5.2xlarge.elasticsearch'|'c5.4xlarge.elasticsearch'|'c5.9xlarge.elasticsearch'|'c5.large.elasticsearch'|'c5.xlarge.elasticsearch'|'d2.2xlarge.elasticsearch'|'d2.4xlarge.elasticsearch'|'d2.8xlarge.elasticsearch'|'d2.xlarge.elasticsearch'|'i2.2xlarge.elasticsearch'|'i2.xlarge.elasticsearch'|'i3.16xlarge.elasticsearch'|'i3.2xlarge.elasticsearch'|'i3.4xlarge.elasticsearch'|'i3.8xlarge.elasticsearch'|'i3.large.elasticsearch'|'i3.xlarge.elasticsearch'|'m3.2xlarge.elasticsearch'|'m3.large.elasticsearch'|'m3.medium.elasticsearch'|'m3.xlarge.elasticsearch'|'m4.10xlarge.elasticsearch'|'m4.2xlarge.elasticsearch'|'m4.4xlarge.elasticsearch'|'m4.large.elasticsearch'|'m4.xlarge.elasticsearch'|'m5.12xlarge.elasticsearch'|'m5.2xlarge.elasticsearch'|'m5.4xlarge.elasticsearch'|'m5.large.elasticsearch'|'m5.xlarge.elasticsearch'|'r3.2xlarge.elasticsearch'|'r3.4xlarge.elasticsearch'|'r3.8xlarge.elasticsearch'|'r3.large.elasticsearch'|'r3.xlarge.elasticsearch'|'r4.16xlarge.elasticsearch'|'r4.2xlarge.elasticsearch'|'r4.4xlarge.elasticsearch'|'r4.8xlarge.elasticsearch'|'r4.large.elasticsearch'|'r4.xlarge.elasticsearch'|'r5.12xlarge.elasticsearch'|'r5.2xlarge.elasticsearch'|'r5.4xlarge.elasticsearch'|'r5.large.elasticsearch'|'r5.xlarge.elasticsearch'|'t2.medium.elasticsearch'|'t2.micro.elasticsearch'|'t2.small.elasticsearch'|'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         DedicatedMasterCount?: int,
 *         WarmEnabled?: bool,
 *         WarmType?: 'ultrawarm1.large.elasticsearch'|'ultrawarm1.medium.elasticsearch',
 *         WarmCount?: int,
 *         ColdStorageOptions?: array{Enabled?: bool, ...},
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
 *     VPCOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     CognitoOptions?: array{Enabled?: bool, UserPoolId?: string, IdentityPoolId?: string, RoleArn?: string, ...},
 *     AdvancedOptions?: array<string, string>,
 *     AccessPolicies?: string,
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
 *         AnonymousAuthEnabled?: bool,
 *         ...,
 *     },
 *     NodeToNodeEncryptionOptions?: array{Enabled?: bool, ...},
 *     EncryptionAtRestOptions?: array{Enabled?: bool, KmsKeyId?: string, ...},
 *     AutoTuneOptions?: array{
 *         DesiredState?: 'DISABLED'|'ENABLED',
 *         RollbackOnDisable?: 'DEFAULT_ROLLBACK'|'NO_ROLLBACK',
 *         MaintenanceSchedules?: list<array>,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     DeploymentStrategyOptions?: array{DeploymentStrategy?: 'CapacityOptimized'|'Default', ...},
 *     AutomatedSnapshotPauseOptions?: array{Enabled?: bool, StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     UseCase?: 'MIXED'|'OBSERVABILITY'|'SEARCH'|'VECTOR',
 *     EngineMode?: 'GENERAL'|'OPTIMIZED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePackage(array $args = [])
 * @phpstan-method \Aws\Result updatePackage(array{
 *     PackageID?: string,
 *     PackageSource?: array{S3BucketName?: string, S3Key?: string, ...},
 *     PackageDescription?: string,
 *     CommitMessage?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageAsync(array{
 *     PackageID?: string,
 *     PackageSource?: array{S3BucketName?: string, S3Key?: string, ...},
 *     PackageDescription?: string,
 *     CommitMessage?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateVpcEndpoint(array{
 *     VpcEndpointId?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVpcEndpointAsync(array{
 *     VpcEndpointId?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result upgradeElasticsearchDomain(array $args = [])
 * @phpstan-method \Aws\Result upgradeElasticsearchDomain(array{DomainName?: string, TargetVersion?: string, PerformCheckOnly?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise upgradeElasticsearchDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise upgradeElasticsearchDomainAsync(array{DomainName?: string, TargetVersion?: string, PerformCheckOnly?: bool, ...} $args = [])
 */
class ElasticsearchServiceClient extends AwsClient {}
