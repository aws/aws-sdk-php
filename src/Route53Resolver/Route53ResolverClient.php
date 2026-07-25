<?php
namespace Aws\Route53Resolver;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Resolver** service.
 * @method \Aws\Result associateFirewallRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result associateFirewallRuleGroup(array{
 *     CreatorRequestId?: string,
 *     FirewallRuleGroupId?: string,
 *     VpcId?: string,
 *     Priority?: int,
 *     Name?: string,
 *     MutationProtection?: 'DISABLED'|'ENABLED',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFirewallRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFirewallRuleGroupAsync(array{
 *     CreatorRequestId?: string,
 *     FirewallRuleGroupId?: string,
 *     VpcId?: string,
 *     Priority?: int,
 *     Name?: string,
 *     MutationProtection?: 'DISABLED'|'ENABLED',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateResolverEndpointIpAddress(array $args = [])
 * @phpstan-method \Aws\Result associateResolverEndpointIpAddress(array{
 *     ResolverEndpointId?: string,
 *     IpAddress?: array{IpId?: string, SubnetId?: string, Ip?: string, Ipv6?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResolverEndpointIpAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateResolverEndpointIpAddressAsync(array{
 *     ResolverEndpointId?: string,
 *     IpAddress?: array{IpId?: string, SubnetId?: string, Ip?: string, Ipv6?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateResolverQueryLogConfig(array $args = [])
 * @phpstan-method \Aws\Result associateResolverQueryLogConfig(array{ResolverQueryLogConfigId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResolverQueryLogConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateResolverQueryLogConfigAsync(array{ResolverQueryLogConfigId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result associateResolverRule(array $args = [])
 * @phpstan-method \Aws\Result associateResolverRule(array{ResolverRuleId?: string, Name?: string, VPCId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResolverRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateResolverRuleAsync(array{ResolverRuleId?: string, Name?: string, VPCId?: string, ...} $args = [])
 * @method \Aws\Result batchCreateFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result batchCreateFirewallRule(array{
 *     CreateFirewallRuleEntries?: list<array{
 *         CreatorRequestId?: string,
 *         FirewallRuleGroupId?: string,
 *         FirewallDomainListId?: string,
 *         Priority?: int,
 *         Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *         BlockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *         BlockOverrideDomain?: string,
 *         BlockOverrideDnsType?: 'CNAME',
 *         BlockOverrideTtl?: int,
 *         Name?: string,
 *         FirewallDomainRedirectionAction?: 'INSPECT_REDIRECTION_DOMAIN'|'TRUST_REDIRECTION_DOMAIN',
 *         Qtype?: string,
 *         DnsThreatProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *         ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *         FirewallRuleType?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateFirewallRuleAsync(array{
 *     CreateFirewallRuleEntries?: list<array{
 *         CreatorRequestId?: string,
 *         FirewallRuleGroupId?: string,
 *         FirewallDomainListId?: string,
 *         Priority?: int,
 *         Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *         BlockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *         BlockOverrideDomain?: string,
 *         BlockOverrideDnsType?: 'CNAME',
 *         BlockOverrideTtl?: int,
 *         Name?: string,
 *         FirewallDomainRedirectionAction?: 'INSPECT_REDIRECTION_DOMAIN'|'TRUST_REDIRECTION_DOMAIN',
 *         Qtype?: string,
 *         DnsThreatProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *         ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *         FirewallRuleType?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteFirewallRule(array{
 *     DeleteFirewallRuleEntries?: list<array{
 *         FirewallRuleGroupId?: string,
 *         FirewallDomainListId?: string,
 *         FirewallThreatProtectionId?: string,
 *         Qtype?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteFirewallRuleAsync(array{
 *     DeleteFirewallRuleEntries?: list<array{
 *         FirewallRuleGroupId?: string,
 *         FirewallDomainListId?: string,
 *         FirewallThreatProtectionId?: string,
 *         Qtype?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateFirewallRule(array{
 *     UpdateFirewallRuleEntries?: list<array{
 *         FirewallRuleGroupId?: string,
 *         FirewallDomainListId?: string,
 *         FirewallThreatProtectionId?: string,
 *         Priority?: int,
 *         Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *         BlockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *         BlockOverrideDomain?: string,
 *         BlockOverrideDnsType?: 'CNAME',
 *         BlockOverrideTtl?: int,
 *         Name?: string,
 *         FirewallDomainRedirectionAction?: 'INSPECT_REDIRECTION_DOMAIN'|'TRUST_REDIRECTION_DOMAIN',
 *         Qtype?: string,
 *         DnsThreatProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *         ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *         FirewallRuleType?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateFirewallRuleAsync(array{
 *     UpdateFirewallRuleEntries?: list<array{
 *         FirewallRuleGroupId?: string,
 *         FirewallDomainListId?: string,
 *         FirewallThreatProtectionId?: string,
 *         Priority?: int,
 *         Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *         BlockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *         BlockOverrideDomain?: string,
 *         BlockOverrideDnsType?: 'CNAME',
 *         BlockOverrideTtl?: int,
 *         Name?: string,
 *         FirewallDomainRedirectionAction?: 'INSPECT_REDIRECTION_DOMAIN'|'TRUST_REDIRECTION_DOMAIN',
 *         Qtype?: string,
 *         DnsThreatProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *         ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *         FirewallRuleType?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFirewallDomainList(array $args = [])
 * @phpstan-method \Aws\Result createFirewallDomainList(array{CreatorRequestId?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallDomainListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFirewallDomainListAsync(array{CreatorRequestId?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result createFirewallRule(array{
 *     CreatorRequestId?: string,
 *     FirewallRuleGroupId?: string,
 *     FirewallDomainListId?: string,
 *     Priority?: int,
 *     Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     BlockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *     BlockOverrideDomain?: string,
 *     BlockOverrideDnsType?: 'CNAME',
 *     BlockOverrideTtl?: int,
 *     Name?: string,
 *     FirewallDomainRedirectionAction?: 'INSPECT_REDIRECTION_DOMAIN'|'TRUST_REDIRECTION_DOMAIN',
 *     Qtype?: string,
 *     DnsThreatProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *     ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *     FirewallRuleType?: array{
 *         PartnerThreatProtection?: array{Partner?: string, ...},
 *         FirewallAdvancedContentCategory?: array{Category?: string, ...},
 *         FirewallAdvancedThreatCategory?: array{Category?: string, ...},
 *         DnsThreatProtection?: array{Value?: string, ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFirewallRuleAsync(array{
 *     CreatorRequestId?: string,
 *     FirewallRuleGroupId?: string,
 *     FirewallDomainListId?: string,
 *     Priority?: int,
 *     Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     BlockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *     BlockOverrideDomain?: string,
 *     BlockOverrideDnsType?: 'CNAME',
 *     BlockOverrideTtl?: int,
 *     Name?: string,
 *     FirewallDomainRedirectionAction?: 'INSPECT_REDIRECTION_DOMAIN'|'TRUST_REDIRECTION_DOMAIN',
 *     Qtype?: string,
 *     DnsThreatProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *     ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *     FirewallRuleType?: array{
 *         PartnerThreatProtection?: array{Partner?: string, ...},
 *         FirewallAdvancedContentCategory?: array{Category?: string, ...},
 *         FirewallAdvancedThreatCategory?: array{Category?: string, ...},
 *         DnsThreatProtection?: array{Value?: string, ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFirewallRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result createFirewallRuleGroup(array{CreatorRequestId?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFirewallRuleGroupAsync(array{CreatorRequestId?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createOutpostResolver(array $args = [])
 * @phpstan-method \Aws\Result createOutpostResolver(array{
 *     CreatorRequestId?: string,
 *     Name?: string,
 *     InstanceCount?: int,
 *     PreferredInstanceType?: string,
 *     OutpostArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOutpostResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOutpostResolverAsync(array{
 *     CreatorRequestId?: string,
 *     Name?: string,
 *     InstanceCount?: int,
 *     PreferredInstanceType?: string,
 *     OutpostArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResolverEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createResolverEndpoint(array{
 *     CreatorRequestId?: string,
 *     Name?: string,
 *     SecurityGroupIds?: list<string>,
 *     Direction?: 'INBOUND'|'INBOUND_DELEGATION'|'OUTBOUND',
 *     IpAddresses?: list<array{SubnetId?: string, Ip?: string, Ipv6?: string, ...}>,
 *     OutpostArn?: string,
 *     PreferredInstanceType?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ResolverEndpointType?: 'DUALSTACK'|'IPV4'|'IPV6',
 *     Protocols?: list<'Do53'|'DoH'|'DoH-FIPS'>,
 *     RniEnhancedMetricsEnabled?: bool,
 *     TargetNameServerMetricsEnabled?: bool,
 *     Dns64Enabled?: bool,
 *     Ipv6InternetAccessEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResolverEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResolverEndpointAsync(array{
 *     CreatorRequestId?: string,
 *     Name?: string,
 *     SecurityGroupIds?: list<string>,
 *     Direction?: 'INBOUND'|'INBOUND_DELEGATION'|'OUTBOUND',
 *     IpAddresses?: list<array{SubnetId?: string, Ip?: string, Ipv6?: string, ...}>,
 *     OutpostArn?: string,
 *     PreferredInstanceType?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ResolverEndpointType?: 'DUALSTACK'|'IPV4'|'IPV6',
 *     Protocols?: list<'Do53'|'DoH'|'DoH-FIPS'>,
 *     RniEnhancedMetricsEnabled?: bool,
 *     TargetNameServerMetricsEnabled?: bool,
 *     Dns64Enabled?: bool,
 *     Ipv6InternetAccessEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResolverQueryLogConfig(array $args = [])
 * @phpstan-method \Aws\Result createResolverQueryLogConfig(array{
 *     Name?: string,
 *     DestinationArn?: string,
 *     CreatorRequestId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResolverQueryLogConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResolverQueryLogConfigAsync(array{
 *     Name?: string,
 *     DestinationArn?: string,
 *     CreatorRequestId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResolverRule(array $args = [])
 * @phpstan-method \Aws\Result createResolverRule(array{
 *     CreatorRequestId?: string,
 *     Name?: string,
 *     RuleType?: 'DELEGATE'|'FORWARD'|'RECURSIVE'|'SYSTEM',
 *     DomainName?: string,
 *     TargetIps?: list<array{
 *         Ip?: string,
 *         Port?: int,
 *         Ipv6?: string,
 *         Protocol?: 'Do53'|'DoH'|'DoH-FIPS',
 *         ServerNameIndication?: string,
 *         ...,
 *     }>,
 *     ResolverEndpointId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DelegationRecord?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResolverRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResolverRuleAsync(array{
 *     CreatorRequestId?: string,
 *     Name?: string,
 *     RuleType?: 'DELEGATE'|'FORWARD'|'RECURSIVE'|'SYSTEM',
 *     DomainName?: string,
 *     TargetIps?: list<array{
 *         Ip?: string,
 *         Port?: int,
 *         Ipv6?: string,
 *         Protocol?: 'Do53'|'DoH'|'DoH-FIPS',
 *         ServerNameIndication?: string,
 *         ...,
 *     }>,
 *     ResolverEndpointId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DelegationRecord?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteFirewallDomainList(array $args = [])
 * @phpstan-method \Aws\Result deleteFirewallDomainList(array{FirewallDomainListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallDomainListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFirewallDomainListAsync(array{FirewallDomainListId?: string, ...} $args = [])
 * @method \Aws\Result deleteFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result deleteFirewallRule(array{
 *     FirewallRuleGroupId?: string,
 *     FirewallDomainListId?: string,
 *     FirewallThreatProtectionId?: string,
 *     Qtype?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFirewallRuleAsync(array{
 *     FirewallRuleGroupId?: string,
 *     FirewallDomainListId?: string,
 *     FirewallThreatProtectionId?: string,
 *     Qtype?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteFirewallRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteFirewallRuleGroup(array{FirewallRuleGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFirewallRuleGroupAsync(array{FirewallRuleGroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteOutpostResolver(array $args = [])
 * @phpstan-method \Aws\Result deleteOutpostResolver(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOutpostResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOutpostResolverAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteResolverEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteResolverEndpoint(array{ResolverEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResolverEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResolverEndpointAsync(array{ResolverEndpointId?: string, ...} $args = [])
 * @method \Aws\Result deleteResolverQueryLogConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteResolverQueryLogConfig(array{ResolverQueryLogConfigId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResolverQueryLogConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResolverQueryLogConfigAsync(array{ResolverQueryLogConfigId?: string, ...} $args = [])
 * @method \Aws\Result deleteResolverRule(array $args = [])
 * @phpstan-method \Aws\Result deleteResolverRule(array{ResolverRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResolverRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResolverRuleAsync(array{ResolverRuleId?: string, ...} $args = [])
 * @method \Aws\Result disassociateFirewallRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result disassociateFirewallRuleGroup(array{FirewallRuleGroupAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFirewallRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFirewallRuleGroupAsync(array{FirewallRuleGroupAssociationId?: string, ...} $args = [])
 * @method \Aws\Result disassociateResolverEndpointIpAddress(array $args = [])
 * @phpstan-method \Aws\Result disassociateResolverEndpointIpAddress(array{
 *     ResolverEndpointId?: string,
 *     IpAddress?: array{IpId?: string, SubnetId?: string, Ip?: string, Ipv6?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResolverEndpointIpAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateResolverEndpointIpAddressAsync(array{
 *     ResolverEndpointId?: string,
 *     IpAddress?: array{IpId?: string, SubnetId?: string, Ip?: string, Ipv6?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateResolverQueryLogConfig(array $args = [])
 * @phpstan-method \Aws\Result disassociateResolverQueryLogConfig(array{ResolverQueryLogConfigId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResolverQueryLogConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateResolverQueryLogConfigAsync(array{ResolverQueryLogConfigId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateResolverRule(array $args = [])
 * @phpstan-method \Aws\Result disassociateResolverRule(array{VPCId?: string, ResolverRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResolverRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateResolverRuleAsync(array{VPCId?: string, ResolverRuleId?: string, ...} $args = [])
 * @method \Aws\Result getFirewallConfig(array $args = [])
 * @phpstan-method \Aws\Result getFirewallConfig(array{ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFirewallConfigAsync(array{ResourceId?: string, ...} $args = [])
 * @method \Aws\Result getFirewallDomainList(array $args = [])
 * @phpstan-method \Aws\Result getFirewallDomainList(array{FirewallDomainListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallDomainListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFirewallDomainListAsync(array{FirewallDomainListId?: string, ...} $args = [])
 * @method \Aws\Result getFirewallRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result getFirewallRuleGroup(array{FirewallRuleGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFirewallRuleGroupAsync(array{FirewallRuleGroupId?: string, ...} $args = [])
 * @method \Aws\Result getFirewallRuleGroupAssociation(array $args = [])
 * @phpstan-method \Aws\Result getFirewallRuleGroupAssociation(array{FirewallRuleGroupAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallRuleGroupAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFirewallRuleGroupAssociationAsync(array{FirewallRuleGroupAssociationId?: string, ...} $args = [])
 * @method \Aws\Result getFirewallRuleGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result getFirewallRuleGroupPolicy(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallRuleGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFirewallRuleGroupPolicyAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getOutpostResolver(array $args = [])
 * @phpstan-method \Aws\Result getOutpostResolver(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutpostResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOutpostResolverAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getResolverConfig(array $args = [])
 * @phpstan-method \Aws\Result getResolverConfig(array{ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverConfigAsync(array{ResourceId?: string, ...} $args = [])
 * @method \Aws\Result getResolverDnssecConfig(array $args = [])
 * @phpstan-method \Aws\Result getResolverDnssecConfig(array{ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverDnssecConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverDnssecConfigAsync(array{ResourceId?: string, ...} $args = [])
 * @method \Aws\Result getResolverEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getResolverEndpoint(array{ResolverEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverEndpointAsync(array{ResolverEndpointId?: string, ...} $args = [])
 * @method \Aws\Result getResolverQueryLogConfig(array $args = [])
 * @phpstan-method \Aws\Result getResolverQueryLogConfig(array{ResolverQueryLogConfigId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigAsync(array{ResolverQueryLogConfigId?: string, ...} $args = [])
 * @method \Aws\Result getResolverQueryLogConfigAssociation(array $args = [])
 * @phpstan-method \Aws\Result getResolverQueryLogConfigAssociation(array{ResolverQueryLogConfigAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigAssociationAsync(array{ResolverQueryLogConfigAssociationId?: string, ...} $args = [])
 * @method \Aws\Result getResolverQueryLogConfigPolicy(array $args = [])
 * @phpstan-method \Aws\Result getResolverQueryLogConfigPolicy(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigPolicyAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getResolverRule(array $args = [])
 * @phpstan-method \Aws\Result getResolverRule(array{ResolverRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverRuleAsync(array{ResolverRuleId?: string, ...} $args = [])
 * @method \Aws\Result getResolverRuleAssociation(array $args = [])
 * @phpstan-method \Aws\Result getResolverRuleAssociation(array{ResolverRuleAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverRuleAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverRuleAssociationAsync(array{ResolverRuleAssociationId?: string, ...} $args = [])
 * @method \Aws\Result getResolverRulePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResolverRulePolicy(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverRulePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverRulePolicyAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result importFirewallDomains(array $args = [])
 * @phpstan-method \Aws\Result importFirewallDomains(array{FirewallDomainListId?: string, Operation?: 'REPLACE', DomainFileUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importFirewallDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importFirewallDomainsAsync(array{FirewallDomainListId?: string, Operation?: 'REPLACE', DomainFileUrl?: string, ...} $args = [])
 * @method \Aws\Result listFirewallConfigs(array $args = [])
 * @phpstan-method \Aws\Result listFirewallConfigs(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallConfigsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFirewallDomainLists(array $args = [])
 * @phpstan-method \Aws\Result listFirewallDomainLists(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallDomainListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallDomainListsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFirewallDomains(array $args = [])
 * @phpstan-method \Aws\Result listFirewallDomains(array{FirewallDomainListId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallDomainsAsync(array{FirewallDomainListId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFirewallRuleGroupAssociations(array $args = [])
 * @phpstan-method \Aws\Result listFirewallRuleGroupAssociations(array{
 *     FirewallRuleGroupId?: string,
 *     VpcId?: string,
 *     Priority?: int,
 *     Status?: 'COMPLETE'|'DELETING'|'UPDATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallRuleGroupAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallRuleGroupAssociationsAsync(array{
 *     FirewallRuleGroupId?: string,
 *     VpcId?: string,
 *     Priority?: int,
 *     Status?: 'COMPLETE'|'DELETING'|'UPDATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFirewallRuleGroups(array $args = [])
 * @phpstan-method \Aws\Result listFirewallRuleGroups(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallRuleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallRuleGroupsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFirewallRuleTypes(array $args = [])
 * @phpstan-method \Aws\Result listFirewallRuleTypes(array{RuleType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallRuleTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallRuleTypesAsync(array{RuleType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFirewallRules(array $args = [])
 * @phpstan-method \Aws\Result listFirewallRules(array{
 *     FirewallRuleGroupId?: string,
 *     Priority?: int,
 *     Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallRulesAsync(array{
 *     FirewallRuleGroupId?: string,
 *     Priority?: int,
 *     Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOutpostResolvers(array $args = [])
 * @phpstan-method \Aws\Result listOutpostResolvers(array{OutpostArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOutpostResolversAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOutpostResolversAsync(array{OutpostArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResolverConfigs(array $args = [])
 * @phpstan-method \Aws\Result listResolverConfigs(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolverConfigsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResolverDnssecConfigs(array $args = [])
 * @phpstan-method \Aws\Result listResolverDnssecConfigs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverDnssecConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolverDnssecConfigsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResolverEndpointIpAddresses(array $args = [])
 * @phpstan-method \Aws\Result listResolverEndpointIpAddresses(array{ResolverEndpointId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverEndpointIpAddressesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolverEndpointIpAddressesAsync(array{ResolverEndpointId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResolverEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listResolverEndpoints(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolverEndpointsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResolverQueryLogConfigAssociations(array $args = [])
 * @phpstan-method \Aws\Result listResolverQueryLogConfigAssociations(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverQueryLogConfigAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolverQueryLogConfigAssociationsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResolverQueryLogConfigs(array $args = [])
 * @phpstan-method \Aws\Result listResolverQueryLogConfigs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverQueryLogConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolverQueryLogConfigsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResolverRuleAssociations(array $args = [])
 * @phpstan-method \Aws\Result listResolverRuleAssociations(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverRuleAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolverRuleAssociationsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResolverRules(array $args = [])
 * @phpstan-method \Aws\Result listResolverRules(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolverRulesAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putFirewallRuleGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result putFirewallRuleGroupPolicy(array{Arn?: string, FirewallRuleGroupPolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putFirewallRuleGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFirewallRuleGroupPolicyAsync(array{Arn?: string, FirewallRuleGroupPolicy?: string, ...} $args = [])
 * @method \Aws\Result putResolverQueryLogConfigPolicy(array $args = [])
 * @phpstan-method \Aws\Result putResolverQueryLogConfigPolicy(array{Arn?: string, ResolverQueryLogConfigPolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResolverQueryLogConfigPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResolverQueryLogConfigPolicyAsync(array{Arn?: string, ResolverQueryLogConfigPolicy?: string, ...} $args = [])
 * @method \Aws\Result putResolverRulePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResolverRulePolicy(array{Arn?: string, ResolverRulePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResolverRulePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResolverRulePolicyAsync(array{Arn?: string, ResolverRulePolicy?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateFirewallConfig(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallConfig(array{ResourceId?: string, FirewallFailOpen?: 'DISABLED'|'ENABLED'|'USE_LOCAL_RESOURCE_SETTING', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallConfigAsync(array{ResourceId?: string, FirewallFailOpen?: 'DISABLED'|'ENABLED'|'USE_LOCAL_RESOURCE_SETTING', ...} $args = [])
 * @method \Aws\Result updateFirewallDomains(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallDomains(array{FirewallDomainListId?: string, Operation?: 'ADD'|'REMOVE'|'REPLACE', Domains?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallDomainsAsync(array{FirewallDomainListId?: string, Operation?: 'ADD'|'REMOVE'|'REPLACE', Domains?: list<string>, ...} $args = [])
 * @method \Aws\Result updateFirewallRule(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallRule(array{
 *     FirewallRuleGroupId?: string,
 *     FirewallDomainListId?: string,
 *     FirewallThreatProtectionId?: string,
 *     Priority?: int,
 *     Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     BlockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *     BlockOverrideDomain?: string,
 *     BlockOverrideDnsType?: 'CNAME',
 *     BlockOverrideTtl?: int,
 *     Name?: string,
 *     FirewallDomainRedirectionAction?: 'INSPECT_REDIRECTION_DOMAIN'|'TRUST_REDIRECTION_DOMAIN',
 *     Qtype?: string,
 *     DnsThreatProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *     ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *     FirewallRuleType?: array{
 *         PartnerThreatProtection?: array{Partner?: string, ...},
 *         FirewallAdvancedContentCategory?: array{Category?: string, ...},
 *         FirewallAdvancedThreatCategory?: array{Category?: string, ...},
 *         DnsThreatProtection?: array{Value?: string, ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallRuleAsync(array{
 *     FirewallRuleGroupId?: string,
 *     FirewallDomainListId?: string,
 *     FirewallThreatProtectionId?: string,
 *     Priority?: int,
 *     Action?: 'ALERT'|'ALLOW'|'BLOCK',
 *     BlockResponse?: 'NODATA'|'NXDOMAIN'|'OVERRIDE',
 *     BlockOverrideDomain?: string,
 *     BlockOverrideDnsType?: 'CNAME',
 *     BlockOverrideTtl?: int,
 *     Name?: string,
 *     FirewallDomainRedirectionAction?: 'INSPECT_REDIRECTION_DOMAIN'|'TRUST_REDIRECTION_DOMAIN',
 *     Qtype?: string,
 *     DnsThreatProtection?: 'DGA'|'DICTIONARY_DGA'|'DNS_TUNNELING',
 *     ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM',
 *     FirewallRuleType?: array{
 *         PartnerThreatProtection?: array{Partner?: string, ...},
 *         FirewallAdvancedContentCategory?: array{Category?: string, ...},
 *         FirewallAdvancedThreatCategory?: array{Category?: string, ...},
 *         DnsThreatProtection?: array{Value?: string, ConfidenceThreshold?: 'HIGH'|'LOW'|'MEDIUM', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFirewallRuleGroupAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallRuleGroupAssociation(array{
 *     FirewallRuleGroupAssociationId?: string,
 *     Priority?: int,
 *     MutationProtection?: 'DISABLED'|'ENABLED',
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallRuleGroupAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallRuleGroupAssociationAsync(array{
 *     FirewallRuleGroupAssociationId?: string,
 *     Priority?: int,
 *     MutationProtection?: 'DISABLED'|'ENABLED',
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOutpostResolver(array $args = [])
 * @phpstan-method \Aws\Result updateOutpostResolver(array{Id?: string, Name?: string, InstanceCount?: int, PreferredInstanceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOutpostResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOutpostResolverAsync(array{Id?: string, Name?: string, InstanceCount?: int, PreferredInstanceType?: string, ...} $args = [])
 * @method \Aws\Result updateResolverConfig(array $args = [])
 * @phpstan-method \Aws\Result updateResolverConfig(array{ResourceId?: string, AutodefinedReverseFlag?: 'DISABLE'|'ENABLE'|'USE_LOCAL_RESOURCE_SETTING', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResolverConfigAsync(array{ResourceId?: string, AutodefinedReverseFlag?: 'DISABLE'|'ENABLE'|'USE_LOCAL_RESOURCE_SETTING', ...} $args = [])
 * @method \Aws\Result updateResolverDnssecConfig(array $args = [])
 * @phpstan-method \Aws\Result updateResolverDnssecConfig(array{ResourceId?: string, Validation?: 'DISABLE'|'ENABLE'|'USE_LOCAL_RESOURCE_SETTING', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverDnssecConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResolverDnssecConfigAsync(array{ResourceId?: string, Validation?: 'DISABLE'|'ENABLE'|'USE_LOCAL_RESOURCE_SETTING', ...} $args = [])
 * @method \Aws\Result updateResolverEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateResolverEndpoint(array{
 *     ResolverEndpointId?: string,
 *     Name?: string,
 *     ResolverEndpointType?: 'DUALSTACK'|'IPV4'|'IPV6',
 *     UpdateIpAddresses?: list<array{IpId?: string, Ipv6?: string, ...}>,
 *     Protocols?: list<'Do53'|'DoH'|'DoH-FIPS'>,
 *     RniEnhancedMetricsEnabled?: bool,
 *     TargetNameServerMetricsEnabled?: bool,
 *     Dns64Enabled?: bool,
 *     Ipv6InternetAccessEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResolverEndpointAsync(array{
 *     ResolverEndpointId?: string,
 *     Name?: string,
 *     ResolverEndpointType?: 'DUALSTACK'|'IPV4'|'IPV6',
 *     UpdateIpAddresses?: list<array{IpId?: string, Ipv6?: string, ...}>,
 *     Protocols?: list<'Do53'|'DoH'|'DoH-FIPS'>,
 *     RniEnhancedMetricsEnabled?: bool,
 *     TargetNameServerMetricsEnabled?: bool,
 *     Dns64Enabled?: bool,
 *     Ipv6InternetAccessEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResolverRule(array $args = [])
 * @phpstan-method \Aws\Result updateResolverRule(array{
 *     ResolverRuleId?: string,
 *     Config?: array{Name?: string, TargetIps?: list<array>, ResolverEndpointId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResolverRuleAsync(array{
 *     ResolverRuleId?: string,
 *     Config?: array{Name?: string, TargetIps?: list<array>, ResolverEndpointId?: string, ...},
 *     ...,
 * } $args = [])
 */
class Route53ResolverClient extends AwsClient {}
