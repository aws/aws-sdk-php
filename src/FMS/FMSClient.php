<?php
namespace Aws\FMS;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Firewall Management Service** service.
 * @method \Aws\Result associateAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result associateAdminAccount(array{AdminAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAdminAccountAsync(array{AdminAccount?: string, ...} $args = [])
 * @method \Aws\Result associateThirdPartyFirewall(array $args = [])
 * @phpstan-method \Aws\Result associateThirdPartyFirewall(array{ThirdPartyFirewall?: 'FORTIGATE_CLOUD_NATIVE_FIREWALL'|'PALO_ALTO_NETWORKS_CLOUD_NGFW', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateThirdPartyFirewallAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateThirdPartyFirewallAsync(array{ThirdPartyFirewall?: 'FORTIGATE_CLOUD_NATIVE_FIREWALL'|'PALO_ALTO_NETWORKS_CLOUD_NGFW', ...} $args = [])
 * @method \Aws\Result batchAssociateResource(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateResource(array{ResourceSetIdentifier?: string, Items?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateResourceAsync(array{ResourceSetIdentifier?: string, Items?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDisassociateResource(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateResource(array{ResourceSetIdentifier?: string, Items?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateResourceAsync(array{ResourceSetIdentifier?: string, Items?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteAppsList(array $args = [])
 * @phpstan-method \Aws\Result deleteAppsList(array{ListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppsListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppsListAsync(array{ListId?: string, ...} $args = [])
 * @method \Aws\Result deleteNotificationChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteNotificationChannel(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotificationChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotificationChannelAsync(array{...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{PolicyId?: string, DeleteAllPolicyResources?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{PolicyId?: string, DeleteAllPolicyResources?: bool, ...} $args = [])
 * @method \Aws\Result deleteProtocolsList(array $args = [])
 * @phpstan-method \Aws\Result deleteProtocolsList(array{ListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProtocolsListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProtocolsListAsync(array{ListId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceSet(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceSet(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceSetAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result disassociateAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateAdminAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAdminAccountAsync(array{...} $args = [])
 * @method \Aws\Result disassociateThirdPartyFirewall(array $args = [])
 * @phpstan-method \Aws\Result disassociateThirdPartyFirewall(array{ThirdPartyFirewall?: 'FORTIGATE_CLOUD_NATIVE_FIREWALL'|'PALO_ALTO_NETWORKS_CLOUD_NGFW', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateThirdPartyFirewallAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateThirdPartyFirewallAsync(array{ThirdPartyFirewall?: 'FORTIGATE_CLOUD_NATIVE_FIREWALL'|'PALO_ALTO_NETWORKS_CLOUD_NGFW', ...} $args = [])
 * @method \Aws\Result getAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result getAdminAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdminAccountAsync(array{...} $args = [])
 * @method \Aws\Result getAdminScope(array $args = [])
 * @phpstan-method \Aws\Result getAdminScope(array{AdminAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdminScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdminScopeAsync(array{AdminAccount?: string, ...} $args = [])
 * @method \Aws\Result getAppsList(array $args = [])
 * @phpstan-method \Aws\Result getAppsList(array{ListId?: string, DefaultList?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppsListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppsListAsync(array{ListId?: string, DefaultList?: bool, ...} $args = [])
 * @method \Aws\Result getComplianceDetail(array $args = [])
 * @phpstan-method \Aws\Result getComplianceDetail(array{PolicyId?: string, MemberAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComplianceDetailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComplianceDetailAsync(array{PolicyId?: string, MemberAccount?: string, ...} $args = [])
 * @method \Aws\Result getNotificationChannel(array $args = [])
 * @phpstan-method \Aws\Result getNotificationChannel(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotificationChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotificationChannelAsync(array{...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{PolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{PolicyId?: string, ...} $args = [])
 * @method \Aws\Result getProtectionStatus(array $args = [])
 * @phpstan-method \Aws\Result getProtectionStatus(array{
 *     PolicyId?: string,
 *     MemberAccountId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getProtectionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProtectionStatusAsync(array{
 *     PolicyId?: string,
 *     MemberAccountId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getProtocolsList(array $args = [])
 * @phpstan-method \Aws\Result getProtocolsList(array{ListId?: string, DefaultList?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProtocolsListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProtocolsListAsync(array{ListId?: string, DefaultList?: bool, ...} $args = [])
 * @method \Aws\Result getResourceSet(array $args = [])
 * @phpstan-method \Aws\Result getResourceSet(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceSetAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getThirdPartyFirewallAssociationStatus(array $args = [])
 * @phpstan-method \Aws\Result getThirdPartyFirewallAssociationStatus(array{ThirdPartyFirewall?: 'FORTIGATE_CLOUD_NATIVE_FIREWALL'|'PALO_ALTO_NETWORKS_CLOUD_NGFW', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getThirdPartyFirewallAssociationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getThirdPartyFirewallAssociationStatusAsync(array{ThirdPartyFirewall?: 'FORTIGATE_CLOUD_NATIVE_FIREWALL'|'PALO_ALTO_NETWORKS_CLOUD_NGFW', ...} $args = [])
 * @method \Aws\Result getViolationDetails(array $args = [])
 * @phpstan-method \Aws\Result getViolationDetails(array{PolicyId?: string, MemberAccount?: string, ResourceId?: string, ResourceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getViolationDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getViolationDetailsAsync(array{PolicyId?: string, MemberAccount?: string, ResourceId?: string, ResourceType?: string, ...} $args = [])
 * @method \Aws\Result listAdminAccountsForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listAdminAccountsForOrganization(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAdminAccountsForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAdminAccountsForOrganizationAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAdminsManagingAccount(array $args = [])
 * @phpstan-method \Aws\Result listAdminsManagingAccount(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAdminsManagingAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAdminsManagingAccountAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAppsLists(array $args = [])
 * @phpstan-method \Aws\Result listAppsLists(array{DefaultLists?: bool, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppsListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppsListsAsync(array{DefaultLists?: bool, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listComplianceStatus(array $args = [])
 * @phpstan-method \Aws\Result listComplianceStatus(array{PolicyId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComplianceStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComplianceStatusAsync(array{PolicyId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDiscoveredResources(array $args = [])
 * @phpstan-method \Aws\Result listDiscoveredResources(array{MemberAccountIds?: list<string>, ResourceType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDiscoveredResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDiscoveredResourcesAsync(array{MemberAccountIds?: list<string>, ResourceType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMemberAccounts(array $args = [])
 * @phpstan-method \Aws\Result listMemberAccounts(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMemberAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMemberAccountsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProtocolsLists(array $args = [])
 * @phpstan-method \Aws\Result listProtocolsLists(array{DefaultLists?: bool, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProtocolsListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProtocolsListsAsync(array{DefaultLists?: bool, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listResourceSetResources(array $args = [])
 * @phpstan-method \Aws\Result listResourceSetResources(array{Identifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceSetResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceSetResourcesAsync(array{Identifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceSets(array $args = [])
 * @phpstan-method \Aws\Result listResourceSets(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceSetsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listThirdPartyFirewallFirewallPolicies(array $args = [])
 * @phpstan-method \Aws\Result listThirdPartyFirewallFirewallPolicies(array{
 *     ThirdPartyFirewall?: 'FORTIGATE_CLOUD_NATIVE_FIREWALL'|'PALO_ALTO_NETWORKS_CLOUD_NGFW',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listThirdPartyFirewallFirewallPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThirdPartyFirewallFirewallPoliciesAsync(array{
 *     ThirdPartyFirewall?: 'FORTIGATE_CLOUD_NATIVE_FIREWALL'|'PALO_ALTO_NETWORKS_CLOUD_NGFW',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result putAdminAccount(array{
 *     AdminAccount?: string,
 *     AdminScope?: array{
 *         AccountScope?: array{Accounts?: list<string>, AllAccountsEnabled?: bool, ExcludeSpecifiedAccounts?: bool, ...},
 *         OrganizationalUnitScope?: array{
 *             OrganizationalUnits?: list<string>,
 *             AllOrganizationalUnitsEnabled?: bool,
 *             ExcludeSpecifiedOrganizationalUnits?: bool,
 *             ...,
 *         },
 *         RegionScope?: array{Regions?: list<string>, AllRegionsEnabled?: bool, ...},
 *         PolicyTypeScope?: array{
 *             PolicyTypes?: list<'DNS_FIREWALL'|'IMPORT_NETWORK_FIREWALL'|'NETWORK_ACL_COMMON'|'NETWORK_FIREWALL'|'SECURITY_GROUPS_COMMON'|'SECURITY_GROUPS_CONTENT_AUDIT'|'SECURITY_GROUPS_USAGE_AUDIT'|'SHIELD_ADVANCED'|'THIRD_PARTY_FIREWALL'|'WAF'|'WAFV2'>,
 *             AllPolicyTypesEnabled?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAdminAccountAsync(array{
 *     AdminAccount?: string,
 *     AdminScope?: array{
 *         AccountScope?: array{Accounts?: list<string>, AllAccountsEnabled?: bool, ExcludeSpecifiedAccounts?: bool, ...},
 *         OrganizationalUnitScope?: array{
 *             OrganizationalUnits?: list<string>,
 *             AllOrganizationalUnitsEnabled?: bool,
 *             ExcludeSpecifiedOrganizationalUnits?: bool,
 *             ...,
 *         },
 *         RegionScope?: array{Regions?: list<string>, AllRegionsEnabled?: bool, ...},
 *         PolicyTypeScope?: array{
 *             PolicyTypes?: list<'DNS_FIREWALL'|'IMPORT_NETWORK_FIREWALL'|'NETWORK_ACL_COMMON'|'NETWORK_FIREWALL'|'SECURITY_GROUPS_COMMON'|'SECURITY_GROUPS_CONTENT_AUDIT'|'SECURITY_GROUPS_USAGE_AUDIT'|'SHIELD_ADVANCED'|'THIRD_PARTY_FIREWALL'|'WAF'|'WAFV2'>,
 *             AllPolicyTypesEnabled?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAppsList(array $args = [])
 * @phpstan-method \Aws\Result putAppsList(array{
 *     AppsList?: array{
 *         ListId?: string,
 *         ListName?: string,
 *         ListUpdateToken?: string,
 *         CreateTime?: int|string|\DateTimeInterface,
 *         LastUpdateTime?: int|string|\DateTimeInterface,
 *         AppsList?: list<array>,
 *         PreviousAppsList?: array<string, list<array>>,
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAppsListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAppsListAsync(array{
 *     AppsList?: array{
 *         ListId?: string,
 *         ListName?: string,
 *         ListUpdateToken?: string,
 *         CreateTime?: int|string|\DateTimeInterface,
 *         LastUpdateTime?: int|string|\DateTimeInterface,
 *         AppsList?: list<array>,
 *         PreviousAppsList?: array<string, list<array>>,
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putNotificationChannel(array $args = [])
 * @phpstan-method \Aws\Result putNotificationChannel(array{SnsTopicArn?: string, SnsRoleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putNotificationChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putNotificationChannelAsync(array{SnsTopicArn?: string, SnsRoleName?: string, ...} $args = [])
 * @method \Aws\Result putPolicy(array $args = [])
 * @phpstan-method \Aws\Result putPolicy(array{
 *     Policy?: array{
 *         PolicyId?: string,
 *         PolicyName?: string,
 *         PolicyUpdateToken?: string,
 *         SecurityServicePolicyData?: array{
 *             Type?: 'DNS_FIREWALL'|'IMPORT_NETWORK_FIREWALL'|'NETWORK_ACL_COMMON'|'NETWORK_FIREWALL'|'SECURITY_GROUPS_COMMON'|'SECURITY_GROUPS_CONTENT_AUDIT'|'SECURITY_GROUPS_USAGE_AUDIT'|'SHIELD_ADVANCED'|'THIRD_PARTY_FIREWALL'|'WAF'|'WAFV2',
 *             ManagedServiceData?: string,
 *             PolicyOption?: array,
 *             ...,
 *         },
 *         ResourceType?: string,
 *         ResourceTypeList?: list<string>,
 *         ResourceTags?: list<array>,
 *         ExcludeResourceTags?: bool,
 *         RemediationEnabled?: bool,
 *         DeleteUnusedFMManagedResources?: bool,
 *         IncludeMap?: array<string, list<string>>,
 *         ExcludeMap?: array<string, list<string>>,
 *         ResourceSetIds?: list<string>,
 *         PolicyDescription?: string,
 *         PolicyStatus?: 'ACTIVE'|'OUT_OF_ADMIN_SCOPE',
 *         ResourceTagLogicalOperator?: 'AND'|'OR',
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPolicyAsync(array{
 *     Policy?: array{
 *         PolicyId?: string,
 *         PolicyName?: string,
 *         PolicyUpdateToken?: string,
 *         SecurityServicePolicyData?: array{
 *             Type?: 'DNS_FIREWALL'|'IMPORT_NETWORK_FIREWALL'|'NETWORK_ACL_COMMON'|'NETWORK_FIREWALL'|'SECURITY_GROUPS_COMMON'|'SECURITY_GROUPS_CONTENT_AUDIT'|'SECURITY_GROUPS_USAGE_AUDIT'|'SHIELD_ADVANCED'|'THIRD_PARTY_FIREWALL'|'WAF'|'WAFV2',
 *             ManagedServiceData?: string,
 *             PolicyOption?: array,
 *             ...,
 *         },
 *         ResourceType?: string,
 *         ResourceTypeList?: list<string>,
 *         ResourceTags?: list<array>,
 *         ExcludeResourceTags?: bool,
 *         RemediationEnabled?: bool,
 *         DeleteUnusedFMManagedResources?: bool,
 *         IncludeMap?: array<string, list<string>>,
 *         ExcludeMap?: array<string, list<string>>,
 *         ResourceSetIds?: list<string>,
 *         PolicyDescription?: string,
 *         PolicyStatus?: 'ACTIVE'|'OUT_OF_ADMIN_SCOPE',
 *         ResourceTagLogicalOperator?: 'AND'|'OR',
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putProtocolsList(array $args = [])
 * @phpstan-method \Aws\Result putProtocolsList(array{
 *     ProtocolsList?: array{
 *         ListId?: string,
 *         ListName?: string,
 *         ListUpdateToken?: string,
 *         CreateTime?: int|string|\DateTimeInterface,
 *         LastUpdateTime?: int|string|\DateTimeInterface,
 *         ProtocolsList?: list<string>,
 *         PreviousProtocolsList?: array<string, list<string>>,
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putProtocolsListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProtocolsListAsync(array{
 *     ProtocolsList?: array{
 *         ListId?: string,
 *         ListName?: string,
 *         ListUpdateToken?: string,
 *         CreateTime?: int|string|\DateTimeInterface,
 *         LastUpdateTime?: int|string|\DateTimeInterface,
 *         ProtocolsList?: list<string>,
 *         PreviousProtocolsList?: array<string, list<string>>,
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourceSet(array $args = [])
 * @phpstan-method \Aws\Result putResourceSet(array{
 *     ResourceSet?: array{
 *         Id?: string,
 *         Name?: string,
 *         Description?: string,
 *         UpdateToken?: string,
 *         ResourceTypeList?: list<string>,
 *         LastUpdateTime?: int|string|\DateTimeInterface,
 *         ResourceSetStatus?: 'ACTIVE'|'OUT_OF_ADMIN_SCOPE',
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourceSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourceSetAsync(array{
 *     ResourceSet?: array{
 *         Id?: string,
 *         Name?: string,
 *         Description?: string,
 *         UpdateToken?: string,
 *         ResourceTypeList?: list<string>,
 *         LastUpdateTime?: int|string|\DateTimeInterface,
 *         ResourceSetStatus?: 'ACTIVE'|'OUT_OF_ADMIN_SCOPE',
 *         ...,
 *     },
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 */
class FMSClient extends AwsClient {}
