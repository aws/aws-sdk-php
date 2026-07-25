<?php
namespace Aws\Route53GlobalResolver;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Global Resolver** service.
 * @method \Aws\Result associateHostedZone(array $args = [])
 * @phpstan-method \Aws\Result associateHostedZone(array{hostedZoneId?: string, resourceArn?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateHostedZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateHostedZoneAsync(array{hostedZoneId?: string, resourceArn?: string, name?: string, ...} $args = [])
 * @method \Aws\Result batchCreateFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result batchCreateFirewallRule(array{
 *     firewallRules?: list<array{
 *         action?: 'ALERT'|'ALLOW'|'BLOCK',
 *         blockOverrideDnsType?: 'CNAME',
 *         blockOverrideDomain?: string,
 *         blockOverrideTtl?: int,
 *         blockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *         clientToken?: string,
 *         confidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *         description?: string,
 *         dnsAdvancedProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *         firewallDomainListId?: string,
 *         name?: string,
 *         priority?: int,
 *         dnsViewId?: string,
 *         qType?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateFirewallRuleAsync(array{
 *     firewallRules?: list<array{
 *         action?: 'ALERT'|'ALLOW'|'BLOCK',
 *         blockOverrideDnsType?: 'CNAME',
 *         blockOverrideDomain?: string,
 *         blockOverrideTtl?: int,
 *         blockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *         clientToken?: string,
 *         confidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *         description?: string,
 *         dnsAdvancedProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *         firewallDomainListId?: string,
 *         name?: string,
 *         priority?: int,
 *         dnsViewId?: string,
 *         qType?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteFirewallRule(array{firewallRules?: list<array{firewallRuleId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteFirewallRuleAsync(array{firewallRules?: list<array{firewallRuleId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchUpdateFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateFirewallRule(array{
 *     firewallRules?: list<array{
 *         action?: 'ALERT'|'ALLOW'|'BLOCK',
 *         blockOverrideDnsType?: 'CNAME',
 *         blockOverrideDomain?: string,
 *         blockOverrideTtl?: int,
 *         blockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *         confidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *         description?: string,
 *         dnsAdvancedProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *         firewallRuleId?: string,
 *         name?: string,
 *         priority?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateFirewallRuleAsync(array{
 *     firewallRules?: list<array{
 *         action?: 'ALERT'|'ALLOW'|'BLOCK',
 *         blockOverrideDnsType?: 'CNAME',
 *         blockOverrideDomain?: string,
 *         blockOverrideTtl?: int,
 *         blockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *         confidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *         description?: string,
 *         dnsAdvancedProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *         firewallRuleId?: string,
 *         name?: string,
 *         priority?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessSource(array $args = [])
 * @phpstan-method \Aws\Result createAccessSource(array{
 *     cidr?: string,
 *     clientToken?: string,
 *     ipAddressType?: 'IPV4'|'IPV6',
 *     name?: string,
 *     dnsViewId?: string,
 *     protocol?: 'DO53'|'DOH'|'DOT',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessSourceAsync(array{
 *     cidr?: string,
 *     clientToken?: string,
 *     ipAddressType?: 'IPV4'|'IPV6',
 *     name?: string,
 *     dnsViewId?: string,
 *     protocol?: 'DO53'|'DOH'|'DOT',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessToken(array $args = [])
 * @phpstan-method \Aws\Result createAccessToken(array{
 *     clientToken?: string,
 *     dnsViewId?: string,
 *     expiresAt?: int|string|\DateTimeInterface,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessTokenAsync(array{
 *     clientToken?: string,
 *     dnsViewId?: string,
 *     expiresAt?: int|string|\DateTimeInterface,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDNSView(array $args = [])
 * @phpstan-method \Aws\Result createDNSView(array{
 *     globalResolverId?: string,
 *     clientToken?: string,
 *     name?: string,
 *     dnssecValidation?: 'DISABLED'|'ENABLED',
 *     ednsClientSubnet?: 'DISABLED'|'ENABLED',
 *     firewallRulesFailOpen?: 'DISABLED'|'ENABLED',
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDNSViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDNSViewAsync(array{
 *     globalResolverId?: string,
 *     clientToken?: string,
 *     name?: string,
 *     dnssecValidation?: 'DISABLED'|'ENABLED',
 *     ednsClientSubnet?: 'DISABLED'|'ENABLED',
 *     firewallRulesFailOpen?: 'DISABLED'|'ENABLED',
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFirewallDomainList(array $args = [])
 * @phpstan-method \Aws\Result createFirewallDomainList(array{
 *     clientToken?: string,
 *     globalResolverId?: string,
 *     description?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallDomainListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFirewallDomainListAsync(array{
 *     clientToken?: string,
 *     globalResolverId?: string,
 *     description?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result createFirewallRule(array{
 *     action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     blockOverrideDnsType?: 'CNAME',
 *     blockOverrideDomain?: string,
 *     blockOverrideTtl?: int,
 *     blockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *     clientToken?: string,
 *     confidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *     description?: string,
 *     dnsAdvancedProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *     firewallDomainListId?: string,
 *     name?: string,
 *     priority?: int,
 *     dnsViewId?: string,
 *     qType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFirewallRuleAsync(array{
 *     action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     blockOverrideDnsType?: 'CNAME',
 *     blockOverrideDomain?: string,
 *     blockOverrideTtl?: int,
 *     blockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *     clientToken?: string,
 *     confidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *     description?: string,
 *     dnsAdvancedProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *     firewallDomainListId?: string,
 *     name?: string,
 *     priority?: int,
 *     dnsViewId?: string,
 *     qType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlobalResolver(array $args = [])
 * @phpstan-method \Aws\Result createGlobalResolver(array{
 *     clientToken?: string,
 *     description?: string,
 *     ipAddressType?: 'DUAL_STACK'|'IPV4',
 *     name?: string,
 *     observabilityRegion?: string,
 *     regions?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlobalResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlobalResolverAsync(array{
 *     clientToken?: string,
 *     description?: string,
 *     ipAddressType?: 'DUAL_STACK'|'IPV4',
 *     name?: string,
 *     observabilityRegion?: string,
 *     regions?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessSource(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessSource(array{accessSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessSourceAsync(array{accessSourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessToken(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessToken(array{accessTokenId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessTokenAsync(array{accessTokenId?: string, ...} $args = [])
 * @method \Aws\Result deleteDNSView(array $args = [])
 * @phpstan-method \Aws\Result deleteDNSView(array{dnsViewId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDNSViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDNSViewAsync(array{dnsViewId?: string, ...} $args = [])
 * @method \Aws\Result deleteFirewallDomainList(array $args = [])
 * @phpstan-method \Aws\Result deleteFirewallDomainList(array{firewallDomainListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallDomainListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFirewallDomainListAsync(array{firewallDomainListId?: string, ...} $args = [])
 * @method \Aws\Result deleteFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result deleteFirewallRule(array{firewallRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFirewallRuleAsync(array{firewallRuleId?: string, ...} $args = [])
 * @method \Aws\Result deleteGlobalResolver(array $args = [])
 * @phpstan-method \Aws\Result deleteGlobalResolver(array{globalResolverId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlobalResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlobalResolverAsync(array{globalResolverId?: string, ...} $args = [])
 * @method \Aws\Result disableDNSView(array $args = [])
 * @phpstan-method \Aws\Result disableDNSView(array{dnsViewId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDNSViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableDNSViewAsync(array{dnsViewId?: string, ...} $args = [])
 * @method \Aws\Result disassociateHostedZone(array $args = [])
 * @phpstan-method \Aws\Result disassociateHostedZone(array{hostedZoneId?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateHostedZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateHostedZoneAsync(array{hostedZoneId?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result enableDNSView(array $args = [])
 * @phpstan-method \Aws\Result enableDNSView(array{dnsViewId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDNSViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableDNSViewAsync(array{dnsViewId?: string, ...} $args = [])
 * @method \Aws\Result getAccessSource(array $args = [])
 * @phpstan-method \Aws\Result getAccessSource(array{accessSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessSourceAsync(array{accessSourceId?: string, ...} $args = [])
 * @method \Aws\Result getAccessToken(array $args = [])
 * @phpstan-method \Aws\Result getAccessToken(array{accessTokenId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessTokenAsync(array{accessTokenId?: string, ...} $args = [])
 * @method \Aws\Result getDNSView(array $args = [])
 * @phpstan-method \Aws\Result getDNSView(array{dnsViewId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDNSViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDNSViewAsync(array{dnsViewId?: string, ...} $args = [])
 * @method \Aws\Result getFirewallDomainList(array $args = [])
 * @phpstan-method \Aws\Result getFirewallDomainList(array{firewallDomainListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallDomainListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFirewallDomainListAsync(array{firewallDomainListId?: string, ...} $args = [])
 * @method \Aws\Result getFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result getFirewallRule(array{firewallRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFirewallRuleAsync(array{firewallRuleId?: string, ...} $args = [])
 * @method \Aws\Result getGlobalResolver(array $args = [])
 * @phpstan-method \Aws\Result getGlobalResolver(array{globalResolverId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlobalResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlobalResolverAsync(array{globalResolverId?: string, ...} $args = [])
 * @method \Aws\Result getHostedZoneAssociation(array $args = [])
 * @phpstan-method \Aws\Result getHostedZoneAssociation(array{hostedZoneAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHostedZoneAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHostedZoneAssociationAsync(array{hostedZoneAssociationId?: string, ...} $args = [])
 * @method \Aws\Result getManagedFirewallDomainList(array $args = [])
 * @phpstan-method \Aws\Result getManagedFirewallDomainList(array{managedFirewallDomainListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedFirewallDomainListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedFirewallDomainListAsync(array{managedFirewallDomainListId?: string, ...} $args = [])
 * @method \Aws\Result importFirewallDomains(array $args = [])
 * @phpstan-method \Aws\Result importFirewallDomains(array{domainFileUrl?: string, firewallDomainListId?: string, operation?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importFirewallDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importFirewallDomainsAsync(array{domainFileUrl?: string, firewallDomainListId?: string, operation?: string, ...} $args = [])
 * @method \Aws\Result listAccessSources(array $args = [])
 * @phpstan-method \Aws\Result listAccessSources(array{maxResults?: int, nextToken?: string, filters?: array<string, list<string>>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessSourcesAsync(array{maxResults?: int, nextToken?: string, filters?: array<string, list<string>>, ...} $args = [])
 * @method \Aws\Result listAccessTokens(array $args = [])
 * @phpstan-method \Aws\Result listAccessTokens(array{maxResults?: int, nextToken?: string, dnsViewId?: string, filters?: array<string, list<string>>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessTokensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessTokensAsync(array{maxResults?: int, nextToken?: string, dnsViewId?: string, filters?: array<string, list<string>>, ...} $args = [])
 * @method \Aws\Result listDNSViews(array $args = [])
 * @phpstan-method \Aws\Result listDNSViews(array{maxResults?: int, nextToken?: string, globalResolverId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDNSViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDNSViewsAsync(array{maxResults?: int, nextToken?: string, globalResolverId?: string, ...} $args = [])
 * @method \Aws\Result listFirewallDomainLists(array $args = [])
 * @phpstan-method \Aws\Result listFirewallDomainLists(array{maxResults?: int, nextToken?: string, globalResolverId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallDomainListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallDomainListsAsync(array{maxResults?: int, nextToken?: string, globalResolverId?: string, ...} $args = [])
 * @method \Aws\Result listFirewallDomains(array $args = [])
 * @phpstan-method \Aws\Result listFirewallDomains(array{maxResults?: int, nextToken?: string, firewallDomainListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallDomainsAsync(array{maxResults?: int, nextToken?: string, firewallDomainListId?: string, ...} $args = [])
 * @method \Aws\Result listFirewallRules(array $args = [])
 * @phpstan-method \Aws\Result listFirewallRules(array{maxResults?: int, nextToken?: string, dnsViewId?: string, filters?: array<string, list<string>>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallRulesAsync(array{maxResults?: int, nextToken?: string, dnsViewId?: string, filters?: array<string, list<string>>, ...} $args = [])
 * @method \Aws\Result listGlobalResolvers(array $args = [])
 * @phpstan-method \Aws\Result listGlobalResolvers(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGlobalResolversAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGlobalResolversAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listHostedZoneAssociations(array $args = [])
 * @phpstan-method \Aws\Result listHostedZoneAssociations(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostedZoneAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHostedZoneAssociationsAsync(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listManagedFirewallDomainLists(array $args = [])
 * @phpstan-method \Aws\Result listManagedFirewallDomainLists(array{maxResults?: int, nextToken?: string, managedFirewallDomainListType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedFirewallDomainListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedFirewallDomainListsAsync(array{maxResults?: int, nextToken?: string, managedFirewallDomainListType?: string, ...} $args = [])
 * @method \Aws\Result listSharedDNSViews(array $args = [])
 * @phpstan-method \Aws\Result listSharedDNSViews(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSharedDNSViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSharedDNSViewsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccessSource(array $args = [])
 * @phpstan-method \Aws\Result updateAccessSource(array{
 *     accessSourceId?: string,
 *     cidr?: string,
 *     ipAddressType?: 'IPV4'|'IPV6',
 *     name?: string,
 *     protocol?: 'DO53'|'DOH'|'DOT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessSourceAsync(array{
 *     accessSourceId?: string,
 *     cidr?: string,
 *     ipAddressType?: 'IPV4'|'IPV6',
 *     name?: string,
 *     protocol?: 'DO53'|'DOH'|'DOT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAccessToken(array $args = [])
 * @phpstan-method \Aws\Result updateAccessToken(array{accessTokenId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessTokenAsync(array{accessTokenId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result updateDNSView(array $args = [])
 * @phpstan-method \Aws\Result updateDNSView(array{
 *     dnsViewId?: string,
 *     name?: string,
 *     description?: string,
 *     dnssecValidation?: 'DISABLED'|'ENABLED',
 *     ednsClientSubnet?: 'DISABLED'|'ENABLED',
 *     firewallRulesFailOpen?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDNSViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDNSViewAsync(array{
 *     dnsViewId?: string,
 *     name?: string,
 *     description?: string,
 *     dnssecValidation?: 'DISABLED'|'ENABLED',
 *     ednsClientSubnet?: 'DISABLED'|'ENABLED',
 *     firewallRulesFailOpen?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFirewallDomains(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallDomains(array{domains?: list<string>, firewallDomainListId?: string, operation?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallDomainsAsync(array{domains?: list<string>, firewallDomainListId?: string, operation?: string, ...} $args = [])
 * @method \Aws\Result updateFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallRule(array{
 *     action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     blockOverrideDnsType?: 'CNAME',
 *     blockOverrideDomain?: string,
 *     blockOverrideTtl?: int,
 *     blockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *     clientToken?: string,
 *     confidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *     description?: string,
 *     dnsAdvancedProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *     firewallRuleId?: string,
 *     name?: string,
 *     priority?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallRuleAsync(array{
 *     action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     blockOverrideDnsType?: 'CNAME',
 *     blockOverrideDomain?: string,
 *     blockOverrideTtl?: int,
 *     blockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *     clientToken?: string,
 *     confidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *     description?: string,
 *     dnsAdvancedProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *     firewallRuleId?: string,
 *     name?: string,
 *     priority?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGlobalResolver(array $args = [])
 * @phpstan-method \Aws\Result updateGlobalResolver(array{
 *     globalResolverId?: string,
 *     name?: string,
 *     observabilityRegion?: string,
 *     description?: string,
 *     ipAddressType?: 'DUAL_STACK'|'IPV4',
 *     regions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlobalResolverAsync(array{
 *     globalResolverId?: string,
 *     name?: string,
 *     observabilityRegion?: string,
 *     description?: string,
 *     ipAddressType?: 'DUAL_STACK'|'IPV4',
 *     regions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHostedZoneAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateHostedZoneAssociation(array{hostedZoneAssociationId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHostedZoneAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHostedZoneAssociationAsync(array{hostedZoneAssociationId?: string, name?: string, ...} $args = [])
 */
class Route53GlobalResolverClient extends AwsClient {}
