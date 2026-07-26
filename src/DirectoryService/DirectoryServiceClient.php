<?php
namespace Aws\DirectoryService;

use Aws\AwsClient;

/**
 * AWS Directory Service client
 *
 * @method \Aws\Result acceptSharedDirectory(array $args = [])
 * @phpstan-method \Aws\Result acceptSharedDirectory(array{SharedDirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptSharedDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptSharedDirectoryAsync(array{SharedDirectoryId?: string, ...} $args = [])
 * @method \Aws\Result addIpRoutes(array $args = [])
 * @phpstan-method \Aws\Result addIpRoutes(array{
 *     DirectoryId?: string,
 *     IpRoutes?: list<array{CidrIp?: string, CidrIpv6?: string, Description?: string, ...}>,
 *     UpdateSecurityGroupForDirectoryControllers?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addIpRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addIpRoutesAsync(array{
 *     DirectoryId?: string,
 *     IpRoutes?: list<array{CidrIp?: string, CidrIpv6?: string, Description?: string, ...}>,
 *     UpdateSecurityGroupForDirectoryControllers?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addRegion(array $args = [])
 * @phpstan-method \Aws\Result addRegion(array{
 *     DirectoryId?: string,
 *     RegionName?: string,
 *     VPCSettings?: array{VpcId?: string, SubnetIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addRegionAsync(array{
 *     DirectoryId?: string,
 *     RegionName?: string,
 *     VPCSettings?: array{VpcId?: string, SubnetIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addTagsToResource(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result cancelSchemaExtension(array $args = [])
 * @phpstan-method \Aws\Result cancelSchemaExtension(array{DirectoryId?: string, SchemaExtensionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelSchemaExtensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelSchemaExtensionAsync(array{DirectoryId?: string, SchemaExtensionId?: string, ...} $args = [])
 * @method \Aws\Result connectDirectory(array $args = [])
 * @phpstan-method \Aws\Result connectDirectory(array{
 *     Name?: string,
 *     ShortName?: string,
 *     Password?: string,
 *     Description?: string,
 *     Size?: 'Large'|'Small',
 *     ConnectSettings?: array{
 *         VpcId?: string,
 *         SubnetIds?: list<string>,
 *         CustomerDnsIps?: list<string>,
 *         CustomerDnsIpsV6?: list<string>,
 *         CustomerUserName?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NetworkType?: 'Dual-stack'|'IPv4'|'IPv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise connectDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise connectDirectoryAsync(array{
 *     Name?: string,
 *     ShortName?: string,
 *     Password?: string,
 *     Description?: string,
 *     Size?: 'Large'|'Small',
 *     ConnectSettings?: array{
 *         VpcId?: string,
 *         SubnetIds?: list<string>,
 *         CustomerDnsIps?: list<string>,
 *         CustomerDnsIpsV6?: list<string>,
 *         CustomerUserName?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NetworkType?: 'Dual-stack'|'IPv4'|'IPv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @phpstan-method \Aws\Result createAlias(array{DirectoryId?: string, Alias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAliasAsync(array{DirectoryId?: string, Alias?: string, ...} $args = [])
 * @method \Aws\Result createComputer(array $args = [])
 * @phpstan-method \Aws\Result createComputer(array{
 *     DirectoryId?: string,
 *     ComputerName?: string,
 *     Password?: string,
 *     OrganizationalUnitDistinguishedName?: string,
 *     ComputerAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComputerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComputerAsync(array{
 *     DirectoryId?: string,
 *     ComputerName?: string,
 *     Password?: string,
 *     OrganizationalUnitDistinguishedName?: string,
 *     ComputerAttributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConditionalForwarder(array $args = [])
 * @phpstan-method \Aws\Result createConditionalForwarder(array{
 *     DirectoryId?: string,
 *     RemoteDomainName?: string,
 *     DnsIpAddrs?: list<string>,
 *     DnsIpv6Addrs?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConditionalForwarderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConditionalForwarderAsync(array{
 *     DirectoryId?: string,
 *     RemoteDomainName?: string,
 *     DnsIpAddrs?: list<string>,
 *     DnsIpv6Addrs?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDirectory(array $args = [])
 * @phpstan-method \Aws\Result createDirectory(array{
 *     Name?: string,
 *     ShortName?: string,
 *     Password?: string,
 *     Description?: string,
 *     Size?: 'Large'|'Small',
 *     VpcSettings?: array{VpcId?: string, SubnetIds?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NetworkType?: 'Dual-stack'|'IPv4'|'IPv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDirectoryAsync(array{
 *     Name?: string,
 *     ShortName?: string,
 *     Password?: string,
 *     Description?: string,
 *     Size?: 'Large'|'Small',
 *     VpcSettings?: array{VpcId?: string, SubnetIds?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NetworkType?: 'Dual-stack'|'IPv4'|'IPv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHybridAD(array $args = [])
 * @phpstan-method \Aws\Result createHybridAD(array{SecretArn?: string, AssessmentId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createHybridADAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHybridADAsync(array{SecretArn?: string, AssessmentId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createLogSubscription(array $args = [])
 * @phpstan-method \Aws\Result createLogSubscription(array{DirectoryId?: string, LogGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLogSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLogSubscriptionAsync(array{DirectoryId?: string, LogGroupName?: string, ...} $args = [])
 * @method \Aws\Result createMicrosoftAD(array $args = [])
 * @phpstan-method \Aws\Result createMicrosoftAD(array{
 *     Name?: string,
 *     ShortName?: string,
 *     Password?: string,
 *     Description?: string,
 *     VpcSettings?: array{VpcId?: string, SubnetIds?: list<string>, ...},
 *     Edition?: 'Enterprise'|'Hybrid'|'Standard',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NetworkType?: 'Dual-stack'|'IPv4'|'IPv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMicrosoftADAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMicrosoftADAsync(array{
 *     Name?: string,
 *     ShortName?: string,
 *     Password?: string,
 *     Description?: string,
 *     VpcSettings?: array{VpcId?: string, SubnetIds?: list<string>, ...},
 *     Edition?: 'Enterprise'|'Hybrid'|'Standard',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NetworkType?: 'Dual-stack'|'IPv4'|'IPv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createSnapshot(array{DirectoryId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSnapshotAsync(array{DirectoryId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result createTrust(array $args = [])
 * @phpstan-method \Aws\Result createTrust(array{
 *     DirectoryId?: string,
 *     RemoteDomainName?: string,
 *     TrustPassword?: string,
 *     TrustDirection?: 'One-Way: Incoming'|'One-Way: Outgoing'|'Two-Way',
 *     TrustType?: 'External'|'Forest',
 *     ConditionalForwarderIpAddrs?: list<string>,
 *     ConditionalForwarderIpv6Addrs?: list<string>,
 *     SelectiveAuth?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrustAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrustAsync(array{
 *     DirectoryId?: string,
 *     RemoteDomainName?: string,
 *     TrustPassword?: string,
 *     TrustDirection?: 'One-Way: Incoming'|'One-Way: Outgoing'|'Two-Way',
 *     TrustType?: 'External'|'Forest',
 *     ConditionalForwarderIpAddrs?: list<string>,
 *     ConditionalForwarderIpv6Addrs?: list<string>,
 *     SelectiveAuth?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteADAssessment(array $args = [])
 * @phpstan-method \Aws\Result deleteADAssessment(array{AssessmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteADAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteADAssessmentAsync(array{AssessmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteConditionalForwarder(array $args = [])
 * @phpstan-method \Aws\Result deleteConditionalForwarder(array{DirectoryId?: string, RemoteDomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConditionalForwarderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConditionalForwarderAsync(array{DirectoryId?: string, RemoteDomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteDirectory(array $args = [])
 * @phpstan-method \Aws\Result deleteDirectory(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDirectoryAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result deleteLogSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteLogSubscription(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLogSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLogSubscriptionAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteSnapshot(array{SnapshotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array{SnapshotId?: string, ...} $args = [])
 * @method \Aws\Result deleteTrust(array $args = [])
 * @phpstan-method \Aws\Result deleteTrust(array{TrustId?: string, DeleteAssociatedConditionalForwarder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrustAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrustAsync(array{TrustId?: string, DeleteAssociatedConditionalForwarder?: bool, ...} $args = [])
 * @method \Aws\Result deregisterCertificate(array $args = [])
 * @phpstan-method \Aws\Result deregisterCertificate(array{DirectoryId?: string, CertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterCertificateAsync(array{DirectoryId?: string, CertificateId?: string, ...} $args = [])
 * @method \Aws\Result deregisterEventTopic(array $args = [])
 * @phpstan-method \Aws\Result deregisterEventTopic(array{DirectoryId?: string, TopicName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterEventTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterEventTopicAsync(array{DirectoryId?: string, TopicName?: string, ...} $args = [])
 * @method \Aws\Result describeADAssessment(array $args = [])
 * @phpstan-method \Aws\Result describeADAssessment(array{AssessmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeADAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeADAssessmentAsync(array{AssessmentId?: string, ...} $args = [])
 * @method \Aws\Result describeCAEnrollmentPolicy(array $args = [])
 * @phpstan-method \Aws\Result describeCAEnrollmentPolicy(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCAEnrollmentPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCAEnrollmentPolicyAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result describeCertificate(array $args = [])
 * @phpstan-method \Aws\Result describeCertificate(array{DirectoryId?: string, CertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificateAsync(array{DirectoryId?: string, CertificateId?: string, ...} $args = [])
 * @method \Aws\Result describeClientAuthenticationSettings(array $args = [])
 * @phpstan-method \Aws\Result describeClientAuthenticationSettings(array{DirectoryId?: string, Type?: 'SmartCard'|'SmartCardOrPassword', NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClientAuthenticationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClientAuthenticationSettingsAsync(array{DirectoryId?: string, Type?: 'SmartCard'|'SmartCardOrPassword', NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeConditionalForwarders(array $args = [])
 * @phpstan-method \Aws\Result describeConditionalForwarders(array{DirectoryId?: string, RemoteDomainNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConditionalForwardersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConditionalForwardersAsync(array{DirectoryId?: string, RemoteDomainNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeDirectories(array $args = [])
 * @phpstan-method \Aws\Result describeDirectories(array{DirectoryIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDirectoriesAsync(array{DirectoryIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeDirectoryDataAccess(array $args = [])
 * @phpstan-method \Aws\Result describeDirectoryDataAccess(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectoryDataAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDirectoryDataAccessAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result describeDomainControllers(array $args = [])
 * @phpstan-method \Aws\Result describeDomainControllers(array{DirectoryId?: string, DomainControllerIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainControllersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainControllersAsync(array{DirectoryId?: string, DomainControllerIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeEventTopics(array $args = [])
 * @phpstan-method \Aws\Result describeEventTopics(array{DirectoryId?: string, TopicNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventTopicsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventTopicsAsync(array{DirectoryId?: string, TopicNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeHybridADUpdate(array $args = [])
 * @phpstan-method \Aws\Result describeHybridADUpdate(array{
 *     DirectoryId?: string,
 *     UpdateType?: 'HybridAdministratorAccount'|'SelfManagedInstances',
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHybridADUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHybridADUpdateAsync(array{
 *     DirectoryId?: string,
 *     UpdateType?: 'HybridAdministratorAccount'|'SelfManagedInstances',
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLDAPSSettings(array $args = [])
 * @phpstan-method \Aws\Result describeLDAPSSettings(array{DirectoryId?: string, Type?: 'Client', NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLDAPSSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLDAPSSettingsAsync(array{DirectoryId?: string, Type?: 'Client', NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeRegions(array $args = [])
 * @phpstan-method \Aws\Result describeRegions(array{DirectoryId?: string, RegionName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegionsAsync(array{DirectoryId?: string, RegionName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeSettings(array $args = [])
 * @phpstan-method \Aws\Result describeSettings(array{
 *     DirectoryId?: string,
 *     Status?: 'Default'|'Failed'|'Requested'|'Updated'|'Updating',
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSettingsAsync(array{
 *     DirectoryId?: string,
 *     Status?: 'Default'|'Failed'|'Requested'|'Updated'|'Updating',
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSharedDirectories(array $args = [])
 * @phpstan-method \Aws\Result describeSharedDirectories(array{OwnerDirectoryId?: string, SharedDirectoryIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSharedDirectoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSharedDirectoriesAsync(array{OwnerDirectoryId?: string, SharedDirectoryIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeSnapshots(array{DirectoryId?: string, SnapshotIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array{DirectoryId?: string, SnapshotIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeTrusts(array $args = [])
 * @phpstan-method \Aws\Result describeTrusts(array{DirectoryId?: string, TrustIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustsAsync(array{DirectoryId?: string, TrustIds?: list<string>, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeUpdateDirectory(array $args = [])
 * @phpstan-method \Aws\Result describeUpdateDirectory(array{DirectoryId?: string, UpdateType?: 'NETWORK'|'OS'|'SIZE', RegionName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUpdateDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUpdateDirectoryAsync(array{DirectoryId?: string, UpdateType?: 'NETWORK'|'OS'|'SIZE', RegionName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result disableCAEnrollmentPolicy(array $args = [])
 * @phpstan-method \Aws\Result disableCAEnrollmentPolicy(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableCAEnrollmentPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableCAEnrollmentPolicyAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result disableClientAuthentication(array $args = [])
 * @phpstan-method \Aws\Result disableClientAuthentication(array{DirectoryId?: string, Type?: 'SmartCard'|'SmartCardOrPassword', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableClientAuthenticationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableClientAuthenticationAsync(array{DirectoryId?: string, Type?: 'SmartCard'|'SmartCardOrPassword', ...} $args = [])
 * @method \Aws\Result disableDirectoryDataAccess(array $args = [])
 * @phpstan-method \Aws\Result disableDirectoryDataAccess(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDirectoryDataAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableDirectoryDataAccessAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result disableLDAPS(array $args = [])
 * @phpstan-method \Aws\Result disableLDAPS(array{DirectoryId?: string, Type?: 'Client', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableLDAPSAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableLDAPSAsync(array{DirectoryId?: string, Type?: 'Client', ...} $args = [])
 * @method \Aws\Result disableRadius(array $args = [])
 * @phpstan-method \Aws\Result disableRadius(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableRadiusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableRadiusAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result disableSso(array $args = [])
 * @phpstan-method \Aws\Result disableSso(array{DirectoryId?: string, UserName?: string, Password?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableSsoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableSsoAsync(array{DirectoryId?: string, UserName?: string, Password?: string, ...} $args = [])
 * @method \Aws\Result enableCAEnrollmentPolicy(array $args = [])
 * @phpstan-method \Aws\Result enableCAEnrollmentPolicy(array{DirectoryId?: string, PcaConnectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableCAEnrollmentPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableCAEnrollmentPolicyAsync(array{DirectoryId?: string, PcaConnectorArn?: string, ...} $args = [])
 * @method \Aws\Result enableClientAuthentication(array $args = [])
 * @phpstan-method \Aws\Result enableClientAuthentication(array{DirectoryId?: string, Type?: 'SmartCard'|'SmartCardOrPassword', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableClientAuthenticationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableClientAuthenticationAsync(array{DirectoryId?: string, Type?: 'SmartCard'|'SmartCardOrPassword', ...} $args = [])
 * @method \Aws\Result enableDirectoryDataAccess(array $args = [])
 * @phpstan-method \Aws\Result enableDirectoryDataAccess(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDirectoryDataAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableDirectoryDataAccessAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result enableLDAPS(array $args = [])
 * @phpstan-method \Aws\Result enableLDAPS(array{DirectoryId?: string, Type?: 'Client', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableLDAPSAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableLDAPSAsync(array{DirectoryId?: string, Type?: 'Client', ...} $args = [])
 * @method \Aws\Result enableRadius(array $args = [])
 * @phpstan-method \Aws\Result enableRadius(array{
 *     DirectoryId?: string,
 *     RadiusSettings?: array{
 *         RadiusServers?: list<string>,
 *         RadiusServersIpv6?: list<string>,
 *         RadiusPort?: int,
 *         RadiusTimeout?: int,
 *         RadiusRetries?: int,
 *         SharedSecret?: string,
 *         AuthenticationProtocol?: 'CHAP'|'MS-CHAPv1'|'MS-CHAPv2'|'PAP',
 *         DisplayLabel?: string,
 *         UseSameUsername?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableRadiusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableRadiusAsync(array{
 *     DirectoryId?: string,
 *     RadiusSettings?: array{
 *         RadiusServers?: list<string>,
 *         RadiusServersIpv6?: list<string>,
 *         RadiusPort?: int,
 *         RadiusTimeout?: int,
 *         RadiusRetries?: int,
 *         SharedSecret?: string,
 *         AuthenticationProtocol?: 'CHAP'|'MS-CHAPv1'|'MS-CHAPv2'|'PAP',
 *         DisplayLabel?: string,
 *         UseSameUsername?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableSso(array $args = [])
 * @phpstan-method \Aws\Result enableSso(array{DirectoryId?: string, UserName?: string, Password?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSsoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableSsoAsync(array{DirectoryId?: string, UserName?: string, Password?: string, ...} $args = [])
 * @method \Aws\Result getDirectoryLimits(array $args = [])
 * @phpstan-method \Aws\Result getDirectoryLimits(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDirectoryLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDirectoryLimitsAsync(array{...} $args = [])
 * @method \Aws\Result getSnapshotLimits(array $args = [])
 * @phpstan-method \Aws\Result getSnapshotLimits(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSnapshotLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSnapshotLimitsAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result listADAssessments(array $args = [])
 * @phpstan-method \Aws\Result listADAssessments(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listADAssessmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listADAssessmentsAsync(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listCertificates(array $args = [])
 * @phpstan-method \Aws\Result listCertificates(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificatesAsync(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listIpRoutes(array $args = [])
 * @phpstan-method \Aws\Result listIpRoutes(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIpRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIpRoutesAsync(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listLogSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listLogSubscriptions(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLogSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLogSubscriptionsAsync(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listSchemaExtensions(array $args = [])
 * @phpstan-method \Aws\Result listSchemaExtensions(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchemaExtensionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemaExtensionsAsync(array{DirectoryId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceId?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result registerCertificate(array $args = [])
 * @phpstan-method \Aws\Result registerCertificate(array{
 *     DirectoryId?: string,
 *     CertificateData?: string,
 *     Type?: 'ClientCertAuth'|'ClientLDAPS',
 *     ClientCertAuthSettings?: array{OCSPUrl?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerCertificateAsync(array{
 *     DirectoryId?: string,
 *     CertificateData?: string,
 *     Type?: 'ClientCertAuth'|'ClientLDAPS',
 *     ClientCertAuthSettings?: array{OCSPUrl?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerEventTopic(array $args = [])
 * @phpstan-method \Aws\Result registerEventTopic(array{DirectoryId?: string, TopicName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerEventTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerEventTopicAsync(array{DirectoryId?: string, TopicName?: string, ...} $args = [])
 * @method \Aws\Result rejectSharedDirectory(array $args = [])
 * @phpstan-method \Aws\Result rejectSharedDirectory(array{SharedDirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectSharedDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectSharedDirectoryAsync(array{SharedDirectoryId?: string, ...} $args = [])
 * @method \Aws\Result removeIpRoutes(array $args = [])
 * @phpstan-method \Aws\Result removeIpRoutes(array{DirectoryId?: string, CidrIps?: list<string>, CidrIpv6s?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeIpRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeIpRoutesAsync(array{DirectoryId?: string, CidrIps?: list<string>, CidrIpv6s?: list<string>, ...} $args = [])
 * @method \Aws\Result removeRegion(array $args = [])
 * @phpstan-method \Aws\Result removeRegion(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeRegionAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromResource(array{ResourceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array{ResourceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result resetUserPassword(array $args = [])
 * @phpstan-method \Aws\Result resetUserPassword(array{DirectoryId?: string, UserName?: string, NewPassword?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetUserPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetUserPasswordAsync(array{DirectoryId?: string, UserName?: string, NewPassword?: string, ...} $args = [])
 * @method \Aws\Result restoreFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreFromSnapshot(array{SnapshotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreFromSnapshotAsync(array{SnapshotId?: string, ...} $args = [])
 * @method \Aws\Result shareDirectory(array $args = [])
 * @phpstan-method \Aws\Result shareDirectory(array{
 *     DirectoryId?: string,
 *     ShareNotes?: string,
 *     ShareTarget?: array{Id?: string, Type?: 'ACCOUNT', ...},
 *     ShareMethod?: 'HANDSHAKE'|'ORGANIZATIONS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise shareDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise shareDirectoryAsync(array{
 *     DirectoryId?: string,
 *     ShareNotes?: string,
 *     ShareTarget?: array{Id?: string, Type?: 'ACCOUNT', ...},
 *     ShareMethod?: 'HANDSHAKE'|'ORGANIZATIONS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startADAssessment(array $args = [])
 * @phpstan-method \Aws\Result startADAssessment(array{
 *     AssessmentConfiguration?: array{
 *         CustomerDnsIps?: list<string>,
 *         DnsName?: string,
 *         VpcSettings?: array{VpcId?: string, SubnetIds?: list<string>, ...},
 *         InstanceIds?: list<string>,
 *         SecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     DirectoryId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startADAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startADAssessmentAsync(array{
 *     AssessmentConfiguration?: array{
 *         CustomerDnsIps?: list<string>,
 *         DnsName?: string,
 *         VpcSettings?: array{VpcId?: string, SubnetIds?: list<string>, ...},
 *         InstanceIds?: list<string>,
 *         SecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     DirectoryId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSchemaExtension(array $args = [])
 * @phpstan-method \Aws\Result startSchemaExtension(array{
 *     DirectoryId?: string,
 *     CreateSnapshotBeforeSchemaExtension?: bool,
 *     LdifContent?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSchemaExtensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSchemaExtensionAsync(array{
 *     DirectoryId?: string,
 *     CreateSnapshotBeforeSchemaExtension?: bool,
 *     LdifContent?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result unshareDirectory(array $args = [])
 * @phpstan-method \Aws\Result unshareDirectory(array{DirectoryId?: string, UnshareTarget?: array{Id?: string, Type?: 'ACCOUNT', ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unshareDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unshareDirectoryAsync(array{DirectoryId?: string, UnshareTarget?: array{Id?: string, Type?: 'ACCOUNT', ...}, ...} $args = [])
 * @method \Aws\Result updateConditionalForwarder(array $args = [])
 * @phpstan-method \Aws\Result updateConditionalForwarder(array{
 *     DirectoryId?: string,
 *     RemoteDomainName?: string,
 *     DnsIpAddrs?: list<string>,
 *     DnsIpv6Addrs?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConditionalForwarderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConditionalForwarderAsync(array{
 *     DirectoryId?: string,
 *     RemoteDomainName?: string,
 *     DnsIpAddrs?: list<string>,
 *     DnsIpv6Addrs?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDirectorySetup(array $args = [])
 * @phpstan-method \Aws\Result updateDirectorySetup(array{
 *     DirectoryId?: string,
 *     UpdateType?: 'NETWORK'|'OS'|'SIZE',
 *     OSUpdateSettings?: array{OSVersion?: 'SERVER_2012'|'SERVER_2019', ...},
 *     DirectorySizeUpdateSettings?: array{DirectorySize?: 'Large'|'Small', ...},
 *     NetworkUpdateSettings?: array{NetworkType?: 'Dual-stack'|'IPv4'|'IPv6', CustomerDnsIpsV6?: list<string>, ...},
 *     CreateSnapshotBeforeUpdate?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDirectorySetupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDirectorySetupAsync(array{
 *     DirectoryId?: string,
 *     UpdateType?: 'NETWORK'|'OS'|'SIZE',
 *     OSUpdateSettings?: array{OSVersion?: 'SERVER_2012'|'SERVER_2019', ...},
 *     DirectorySizeUpdateSettings?: array{DirectorySize?: 'Large'|'Small', ...},
 *     NetworkUpdateSettings?: array{NetworkType?: 'Dual-stack'|'IPv4'|'IPv6', CustomerDnsIpsV6?: list<string>, ...},
 *     CreateSnapshotBeforeUpdate?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHybridAD(array $args = [])
 * @phpstan-method \Aws\Result updateHybridAD(array{
 *     DirectoryId?: string,
 *     HybridAdministratorAccountUpdate?: array{SecretArn?: string, ...},
 *     SelfManagedInstancesSettings?: array{CustomerDnsIps?: list<string>, InstanceIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHybridADAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHybridADAsync(array{
 *     DirectoryId?: string,
 *     HybridAdministratorAccountUpdate?: array{SecretArn?: string, ...},
 *     SelfManagedInstancesSettings?: array{CustomerDnsIps?: list<string>, InstanceIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNumberOfDomainControllers(array $args = [])
 * @phpstan-method \Aws\Result updateNumberOfDomainControllers(array{DirectoryId?: string, DesiredNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNumberOfDomainControllersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNumberOfDomainControllersAsync(array{DirectoryId?: string, DesiredNumber?: int, ...} $args = [])
 * @method \Aws\Result updateRadius(array $args = [])
 * @phpstan-method \Aws\Result updateRadius(array{
 *     DirectoryId?: string,
 *     RadiusSettings?: array{
 *         RadiusServers?: list<string>,
 *         RadiusServersIpv6?: list<string>,
 *         RadiusPort?: int,
 *         RadiusTimeout?: int,
 *         RadiusRetries?: int,
 *         SharedSecret?: string,
 *         AuthenticationProtocol?: 'CHAP'|'MS-CHAPv1'|'MS-CHAPv2'|'PAP',
 *         DisplayLabel?: string,
 *         UseSameUsername?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRadiusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRadiusAsync(array{
 *     DirectoryId?: string,
 *     RadiusSettings?: array{
 *         RadiusServers?: list<string>,
 *         RadiusServersIpv6?: list<string>,
 *         RadiusPort?: int,
 *         RadiusTimeout?: int,
 *         RadiusRetries?: int,
 *         SharedSecret?: string,
 *         AuthenticationProtocol?: 'CHAP'|'MS-CHAPv1'|'MS-CHAPv2'|'PAP',
 *         DisplayLabel?: string,
 *         UseSameUsername?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSettings(array $args = [])
 * @phpstan-method \Aws\Result updateSettings(array{DirectoryId?: string, Settings?: list<array{Name?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSettingsAsync(array{DirectoryId?: string, Settings?: list<array{Name?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result updateTrust(array $args = [])
 * @phpstan-method \Aws\Result updateTrust(array{TrustId?: string, SelectiveAuth?: 'Disabled'|'Enabled', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrustAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrustAsync(array{TrustId?: string, SelectiveAuth?: 'Disabled'|'Enabled', ...} $args = [])
 * @method \Aws\Result verifyTrust(array $args = [])
 * @phpstan-method \Aws\Result verifyTrust(array{TrustId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyTrustAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyTrustAsync(array{TrustId?: string, ...} $args = [])
 */
class DirectoryServiceClient extends AwsClient {}
