<?php
namespace Aws\MailManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **MailManager** service.
 * @method \Aws\Result createAddonInstance(array $args = [])
 * @phpstan-method \Aws\Result createAddonInstance(array{
 *     ClientToken?: string,
 *     AddonSubscriptionId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAddonInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAddonInstanceAsync(array{
 *     ClientToken?: string,
 *     AddonSubscriptionId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAddonSubscription(array $args = [])
 * @phpstan-method \Aws\Result createAddonSubscription(array{ClientToken?: string, AddonName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAddonSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAddonSubscriptionAsync(array{ClientToken?: string, AddonName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createAddressList(array $args = [])
 * @phpstan-method \Aws\Result createAddressList(array{
 *     ClientToken?: string,
 *     AddressListName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAddressListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAddressListAsync(array{
 *     ClientToken?: string,
 *     AddressListName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAddressListImportJob(array $args = [])
 * @phpstan-method \Aws\Result createAddressListImportJob(array{
 *     ClientToken?: string,
 *     AddressListId?: string,
 *     Name?: string,
 *     ImportDataFormat?: array{ImportDataType?: 'CSV'|'JSON', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAddressListImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAddressListImportJobAsync(array{
 *     ClientToken?: string,
 *     AddressListId?: string,
 *     Name?: string,
 *     ImportDataFormat?: array{ImportDataType?: 'CSV'|'JSON', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createArchive(array $args = [])
 * @phpstan-method \Aws\Result createArchive(array{
 *     ClientToken?: string,
 *     ArchiveName?: string,
 *     Retention?: array{
 *         RetentionPeriod?: 'EIGHTEEN_MONTHS'|'EIGHT_YEARS'|'FIVE_YEARS'|'FOUR_YEARS'|'NINE_MONTHS'|'NINE_YEARS'|'ONE_YEAR'|'PERMANENT'|'SEVEN_YEARS'|'SIX_MONTHS'|'SIX_YEARS'|'TEN_YEARS'|'THIRTY_MONTHS'|'THREE_MONTHS'|'THREE_YEARS'|'TWO_YEARS',
 *         ...,
 *     },
 *     KmsKeyArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createArchiveAsync(array{
 *     ClientToken?: string,
 *     ArchiveName?: string,
 *     Retention?: array{
 *         RetentionPeriod?: 'EIGHTEEN_MONTHS'|'EIGHT_YEARS'|'FIVE_YEARS'|'FOUR_YEARS'|'NINE_MONTHS'|'NINE_YEARS'|'ONE_YEAR'|'PERMANENT'|'SEVEN_YEARS'|'SIX_MONTHS'|'SIX_YEARS'|'TEN_YEARS'|'THIRTY_MONTHS'|'THREE_MONTHS'|'THREE_YEARS'|'TWO_YEARS',
 *         ...,
 *     },
 *     KmsKeyArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIngressPoint(array $args = [])
 * @phpstan-method \Aws\Result createIngressPoint(array{
 *     ClientToken?: string,
 *     IngressPointName?: string,
 *     Type?: 'AUTH'|'MTLS'|'OPEN',
 *     RuleSetId?: string,
 *     TrafficPolicyId?: string,
 *     IngressPointConfiguration?: array{SmtpPassword?: string, SecretArn?: string, TlsAuthConfiguration?: array{TrustStore?: array, ...}, ...},
 *     NetworkConfiguration?: array{
 *         PublicNetworkConfiguration?: array{IpType?: 'DUAL_STACK'|'IPV4', ...},
 *         PrivateNetworkConfiguration?: array{VpcEndpointId?: string, ...},
 *         ...,
 *     },
 *     TlsPolicy?: 'FIPS'|'OPTIONAL'|'REQUIRED',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIngressPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIngressPointAsync(array{
 *     ClientToken?: string,
 *     IngressPointName?: string,
 *     Type?: 'AUTH'|'MTLS'|'OPEN',
 *     RuleSetId?: string,
 *     TrafficPolicyId?: string,
 *     IngressPointConfiguration?: array{SmtpPassword?: string, SecretArn?: string, TlsAuthConfiguration?: array{TrustStore?: array, ...}, ...},
 *     NetworkConfiguration?: array{
 *         PublicNetworkConfiguration?: array{IpType?: 'DUAL_STACK'|'IPV4', ...},
 *         PrivateNetworkConfiguration?: array{VpcEndpointId?: string, ...},
 *         ...,
 *     },
 *     TlsPolicy?: 'FIPS'|'OPTIONAL'|'REQUIRED',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRelay(array $args = [])
 * @phpstan-method \Aws\Result createRelay(array{
 *     ClientToken?: string,
 *     RelayName?: string,
 *     ServerName?: string,
 *     ServerPort?: int,
 *     Authentication?: array{SecretArn?: string, NoAuthentication?: array, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRelayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRelayAsync(array{
 *     ClientToken?: string,
 *     RelayName?: string,
 *     ServerName?: string,
 *     ServerPort?: int,
 *     Authentication?: array{SecretArn?: string, NoAuthentication?: array, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuleSet(array $args = [])
 * @phpstan-method \Aws\Result createRuleSet(array{
 *     ClientToken?: string,
 *     RuleSetName?: string,
 *     Rules?: list<array{Name?: string, Conditions?: list<array>, Unless?: list<array>, Actions?: list<array>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleSetAsync(array{
 *     ClientToken?: string,
 *     RuleSetName?: string,
 *     Rules?: list<array{Name?: string, Conditions?: list<array>, Unless?: list<array>, Actions?: list<array>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrafficPolicy(array $args = [])
 * @phpstan-method \Aws\Result createTrafficPolicy(array{
 *     ClientToken?: string,
 *     TrafficPolicyName?: string,
 *     PolicyStatements?: list<array{Conditions?: list<array>, Action?: 'ALLOW'|'DENY', ...}>,
 *     DefaultAction?: 'ALLOW'|'DENY',
 *     MaxMessageSizeBytes?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrafficPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrafficPolicyAsync(array{
 *     ClientToken?: string,
 *     TrafficPolicyName?: string,
 *     PolicyStatements?: list<array{Conditions?: list<array>, Action?: 'ALLOW'|'DENY', ...}>,
 *     DefaultAction?: 'ALLOW'|'DENY',
 *     MaxMessageSizeBytes?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAddonInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteAddonInstance(array{AddonInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAddonInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAddonInstanceAsync(array{AddonInstanceId?: string, ...} $args = [])
 * @method \Aws\Result deleteAddonSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteAddonSubscription(array{AddonSubscriptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAddonSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAddonSubscriptionAsync(array{AddonSubscriptionId?: string, ...} $args = [])
 * @method \Aws\Result deleteAddressList(array $args = [])
 * @phpstan-method \Aws\Result deleteAddressList(array{AddressListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAddressListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAddressListAsync(array{AddressListId?: string, ...} $args = [])
 * @method \Aws\Result deleteArchive(array $args = [])
 * @phpstan-method \Aws\Result deleteArchive(array{ArchiveId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteArchiveAsync(array{ArchiveId?: string, ...} $args = [])
 * @method \Aws\Result deleteIngressPoint(array $args = [])
 * @phpstan-method \Aws\Result deleteIngressPoint(array{IngressPointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIngressPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIngressPointAsync(array{IngressPointId?: string, ...} $args = [])
 * @method \Aws\Result deleteRelay(array $args = [])
 * @phpstan-method \Aws\Result deleteRelay(array{RelayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRelayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRelayAsync(array{RelayId?: string, ...} $args = [])
 * @method \Aws\Result deleteRuleSet(array $args = [])
 * @phpstan-method \Aws\Result deleteRuleSet(array{RuleSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleSetAsync(array{RuleSetId?: string, ...} $args = [])
 * @method \Aws\Result deleteTrafficPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteTrafficPolicy(array{TrafficPolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrafficPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrafficPolicyAsync(array{TrafficPolicyId?: string, ...} $args = [])
 * @method \Aws\Result deregisterMemberFromAddressList(array $args = [])
 * @phpstan-method \Aws\Result deregisterMemberFromAddressList(array{AddressListId?: string, Address?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterMemberFromAddressListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterMemberFromAddressListAsync(array{AddressListId?: string, Address?: string, ...} $args = [])
 * @method \Aws\Result getAddonInstance(array $args = [])
 * @phpstan-method \Aws\Result getAddonInstance(array{AddonInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAddonInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAddonInstanceAsync(array{AddonInstanceId?: string, ...} $args = [])
 * @method \Aws\Result getAddonSubscription(array $args = [])
 * @phpstan-method \Aws\Result getAddonSubscription(array{AddonSubscriptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAddonSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAddonSubscriptionAsync(array{AddonSubscriptionId?: string, ...} $args = [])
 * @method \Aws\Result getAddressList(array $args = [])
 * @phpstan-method \Aws\Result getAddressList(array{AddressListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAddressListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAddressListAsync(array{AddressListId?: string, ...} $args = [])
 * @method \Aws\Result getAddressListImportJob(array $args = [])
 * @phpstan-method \Aws\Result getAddressListImportJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAddressListImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAddressListImportJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result getArchive(array $args = [])
 * @phpstan-method \Aws\Result getArchive(array{ArchiveId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArchiveAsync(array{ArchiveId?: string, ...} $args = [])
 * @method \Aws\Result getArchiveExport(array $args = [])
 * @phpstan-method \Aws\Result getArchiveExport(array{ExportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArchiveExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArchiveExportAsync(array{ExportId?: string, ...} $args = [])
 * @method \Aws\Result getArchiveMessage(array $args = [])
 * @phpstan-method \Aws\Result getArchiveMessage(array{ArchivedMessageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArchiveMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArchiveMessageAsync(array{ArchivedMessageId?: string, ...} $args = [])
 * @method \Aws\Result getArchiveMessageContent(array $args = [])
 * @phpstan-method \Aws\Result getArchiveMessageContent(array{ArchivedMessageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArchiveMessageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArchiveMessageContentAsync(array{ArchivedMessageId?: string, ...} $args = [])
 * @method \Aws\Result getArchiveSearch(array $args = [])
 * @phpstan-method \Aws\Result getArchiveSearch(array{SearchId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArchiveSearchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArchiveSearchAsync(array{SearchId?: string, ...} $args = [])
 * @method \Aws\Result getArchiveSearchResults(array $args = [])
 * @phpstan-method \Aws\Result getArchiveSearchResults(array{SearchId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArchiveSearchResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArchiveSearchResultsAsync(array{SearchId?: string, ...} $args = [])
 * @method \Aws\Result getIngressPoint(array $args = [])
 * @phpstan-method \Aws\Result getIngressPoint(array{IngressPointId?: string, IncludeTrustStoreContents?: 'EXCLUDE'|'INCLUDE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIngressPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIngressPointAsync(array{IngressPointId?: string, IncludeTrustStoreContents?: 'EXCLUDE'|'INCLUDE', ...} $args = [])
 * @method \Aws\Result getMemberOfAddressList(array $args = [])
 * @phpstan-method \Aws\Result getMemberOfAddressList(array{AddressListId?: string, Address?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMemberOfAddressListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMemberOfAddressListAsync(array{AddressListId?: string, Address?: string, ...} $args = [])
 * @method \Aws\Result getRelay(array $args = [])
 * @phpstan-method \Aws\Result getRelay(array{RelayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelayAsync(array{RelayId?: string, ...} $args = [])
 * @method \Aws\Result getRuleSet(array $args = [])
 * @phpstan-method \Aws\Result getRuleSet(array{RuleSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuleSetAsync(array{RuleSetId?: string, ...} $args = [])
 * @method \Aws\Result getTrafficPolicy(array $args = [])
 * @phpstan-method \Aws\Result getTrafficPolicy(array{TrafficPolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrafficPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrafficPolicyAsync(array{TrafficPolicyId?: string, ...} $args = [])
 * @method \Aws\Result listAddonInstances(array $args = [])
 * @phpstan-method \Aws\Result listAddonInstances(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAddonInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAddonInstancesAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listAddonSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listAddonSubscriptions(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAddonSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAddonSubscriptionsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listAddressListImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listAddressListImportJobs(array{AddressListId?: string, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAddressListImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAddressListImportJobsAsync(array{AddressListId?: string, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listAddressLists(array $args = [])
 * @phpstan-method \Aws\Result listAddressLists(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAddressListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAddressListsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listArchiveExports(array $args = [])
 * @phpstan-method \Aws\Result listArchiveExports(array{ArchiveId?: string, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listArchiveExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArchiveExportsAsync(array{ArchiveId?: string, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listArchiveSearches(array $args = [])
 * @phpstan-method \Aws\Result listArchiveSearches(array{ArchiveId?: string, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listArchiveSearchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArchiveSearchesAsync(array{ArchiveId?: string, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listArchives(array $args = [])
 * @phpstan-method \Aws\Result listArchives(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listArchivesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArchivesAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listIngressPoints(array $args = [])
 * @phpstan-method \Aws\Result listIngressPoints(array{PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIngressPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIngressPointsAsync(array{PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMembersOfAddressList(array $args = [])
 * @phpstan-method \Aws\Result listMembersOfAddressList(array{
 *     AddressListId?: string,
 *     Filter?: array{AddressPrefix?: string, ...},
 *     NextToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersOfAddressListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembersOfAddressListAsync(array{
 *     AddressListId?: string,
 *     Filter?: array{AddressPrefix?: string, ...},
 *     NextToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRelays(array $args = [])
 * @phpstan-method \Aws\Result listRelays(array{PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRelaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRelaysAsync(array{PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRuleSets(array $args = [])
 * @phpstan-method \Aws\Result listRuleSets(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleSetsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTrafficPolicies(array $args = [])
 * @phpstan-method \Aws\Result listTrafficPolicies(array{PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrafficPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrafficPoliciesAsync(array{PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result registerMemberToAddressList(array $args = [])
 * @phpstan-method \Aws\Result registerMemberToAddressList(array{AddressListId?: string, Address?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerMemberToAddressListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerMemberToAddressListAsync(array{AddressListId?: string, Address?: string, ...} $args = [])
 * @method \Aws\Result startAddressListImportJob(array $args = [])
 * @phpstan-method \Aws\Result startAddressListImportJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAddressListImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAddressListImportJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result startArchiveExport(array $args = [])
 * @phpstan-method \Aws\Result startArchiveExport(array{
 *     ArchiveId?: string,
 *     Filters?: array{Include?: list<array>, Unless?: list<array>, ...},
 *     FromTimestamp?: int|string|\DateTimeInterface,
 *     ToTimestamp?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     ExportDestinationConfiguration?: array{S3?: array{S3Location?: string, ...}, ...},
 *     IncludeMetadata?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startArchiveExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startArchiveExportAsync(array{
 *     ArchiveId?: string,
 *     Filters?: array{Include?: list<array>, Unless?: list<array>, ...},
 *     FromTimestamp?: int|string|\DateTimeInterface,
 *     ToTimestamp?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     ExportDestinationConfiguration?: array{S3?: array{S3Location?: string, ...}, ...},
 *     IncludeMetadata?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startArchiveSearch(array $args = [])
 * @phpstan-method \Aws\Result startArchiveSearch(array{
 *     ArchiveId?: string,
 *     Filters?: array{Include?: list<array>, Unless?: list<array>, ...},
 *     FromTimestamp?: int|string|\DateTimeInterface,
 *     ToTimestamp?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startArchiveSearchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startArchiveSearchAsync(array{
 *     ArchiveId?: string,
 *     Filters?: array{Include?: list<array>, Unless?: list<array>, ...},
 *     FromTimestamp?: int|string|\DateTimeInterface,
 *     ToTimestamp?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopAddressListImportJob(array $args = [])
 * @phpstan-method \Aws\Result stopAddressListImportJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAddressListImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAddressListImportJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopArchiveExport(array $args = [])
 * @phpstan-method \Aws\Result stopArchiveExport(array{ExportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopArchiveExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopArchiveExportAsync(array{ExportId?: string, ...} $args = [])
 * @method \Aws\Result stopArchiveSearch(array $args = [])
 * @phpstan-method \Aws\Result stopArchiveSearch(array{SearchId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopArchiveSearchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopArchiveSearchAsync(array{SearchId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateArchive(array $args = [])
 * @phpstan-method \Aws\Result updateArchive(array{
 *     ArchiveId?: string,
 *     ArchiveName?: string,
 *     Retention?: array{
 *         RetentionPeriod?: 'EIGHTEEN_MONTHS'|'EIGHT_YEARS'|'FIVE_YEARS'|'FOUR_YEARS'|'NINE_MONTHS'|'NINE_YEARS'|'ONE_YEAR'|'PERMANENT'|'SEVEN_YEARS'|'SIX_MONTHS'|'SIX_YEARS'|'TEN_YEARS'|'THIRTY_MONTHS'|'THREE_MONTHS'|'THREE_YEARS'|'TWO_YEARS',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateArchiveAsync(array{
 *     ArchiveId?: string,
 *     ArchiveName?: string,
 *     Retention?: array{
 *         RetentionPeriod?: 'EIGHTEEN_MONTHS'|'EIGHT_YEARS'|'FIVE_YEARS'|'FOUR_YEARS'|'NINE_MONTHS'|'NINE_YEARS'|'ONE_YEAR'|'PERMANENT'|'SEVEN_YEARS'|'SIX_MONTHS'|'SIX_YEARS'|'TEN_YEARS'|'THIRTY_MONTHS'|'THREE_MONTHS'|'THREE_YEARS'|'TWO_YEARS',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIngressPoint(array $args = [])
 * @phpstan-method \Aws\Result updateIngressPoint(array{
 *     IngressPointId?: string,
 *     IngressPointName?: string,
 *     StatusToUpdate?: 'ACTIVE'|'CLOSED',
 *     RuleSetId?: string,
 *     TrafficPolicyId?: string,
 *     IngressPointConfiguration?: array{SmtpPassword?: string, SecretArn?: string, TlsAuthConfiguration?: array{TrustStore?: array, ...}, ...},
 *     TlsPolicy?: 'FIPS'|'OPTIONAL'|'REQUIRED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIngressPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIngressPointAsync(array{
 *     IngressPointId?: string,
 *     IngressPointName?: string,
 *     StatusToUpdate?: 'ACTIVE'|'CLOSED',
 *     RuleSetId?: string,
 *     TrafficPolicyId?: string,
 *     IngressPointConfiguration?: array{SmtpPassword?: string, SecretArn?: string, TlsAuthConfiguration?: array{TrustStore?: array, ...}, ...},
 *     TlsPolicy?: 'FIPS'|'OPTIONAL'|'REQUIRED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRelay(array $args = [])
 * @phpstan-method \Aws\Result updateRelay(array{
 *     RelayId?: string,
 *     RelayName?: string,
 *     ServerName?: string,
 *     ServerPort?: int,
 *     Authentication?: array{SecretArn?: string, NoAuthentication?: array, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRelayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRelayAsync(array{
 *     RelayId?: string,
 *     RelayName?: string,
 *     ServerName?: string,
 *     ServerPort?: int,
 *     Authentication?: array{SecretArn?: string, NoAuthentication?: array, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuleSet(array $args = [])
 * @phpstan-method \Aws\Result updateRuleSet(array{
 *     RuleSetId?: string,
 *     RuleSetName?: string,
 *     Rules?: list<array{Name?: string, Conditions?: list<array>, Unless?: list<array>, Actions?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleSetAsync(array{
 *     RuleSetId?: string,
 *     RuleSetName?: string,
 *     Rules?: list<array{Name?: string, Conditions?: list<array>, Unless?: list<array>, Actions?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrafficPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateTrafficPolicy(array{
 *     TrafficPolicyId?: string,
 *     TrafficPolicyName?: string,
 *     PolicyStatements?: list<array{Conditions?: list<array>, Action?: 'ALLOW'|'DENY', ...}>,
 *     DefaultAction?: 'ALLOW'|'DENY',
 *     MaxMessageSizeBytes?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrafficPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrafficPolicyAsync(array{
 *     TrafficPolicyId?: string,
 *     TrafficPolicyName?: string,
 *     PolicyStatements?: list<array{Conditions?: list<array>, Action?: 'ALLOW'|'DENY', ...}>,
 *     DefaultAction?: 'ALLOW'|'DENY',
 *     MaxMessageSizeBytes?: int,
 *     ...,
 * } $args = [])
 */
class MailManagerClient extends AwsClient {}
