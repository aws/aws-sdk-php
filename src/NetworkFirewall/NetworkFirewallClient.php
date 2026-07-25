<?php
namespace Aws\NetworkFirewall;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Network Firewall** service.
 * @method \Aws\Result acceptNetworkFirewallTransitGatewayAttachment(array $args = [])
 * @phpstan-method \Aws\Result acceptNetworkFirewallTransitGatewayAttachment(array{TransitGatewayAttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptNetworkFirewallTransitGatewayAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptNetworkFirewallTransitGatewayAttachmentAsync(array{TransitGatewayAttachmentId?: string, ...} $args = [])
 * @method \Aws\Result associateAvailabilityZones(array $args = [])
 * @phpstan-method \Aws\Result associateAvailabilityZones(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     AvailabilityZoneMappings?: list<array{AvailabilityZone?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAvailabilityZonesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAvailabilityZonesAsync(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     AvailabilityZoneMappings?: list<array{AvailabilityZone?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateFirewallPolicy(array $args = [])
 * @phpstan-method \Aws\Result associateFirewallPolicy(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, FirewallPolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFirewallPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFirewallPolicyAsync(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, FirewallPolicyArn?: string, ...} $args = [])
 * @method \Aws\Result associateSubnets(array $args = [])
 * @phpstan-method \Aws\Result associateSubnets(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     SubnetMappings?: list<array{SubnetId?: string, IPAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSubnetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSubnetsAsync(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     SubnetMappings?: list<array{SubnetId?: string, IPAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result attachRuleGroupsToProxyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result attachRuleGroupsToProxyConfiguration(array{
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     RuleGroups?: list<array{ProxyRuleGroupName?: string, InsertPosition?: int, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachRuleGroupsToProxyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachRuleGroupsToProxyConfigurationAsync(array{
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     RuleGroups?: list<array{ProxyRuleGroupName?: string, InsertPosition?: int, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContainerAssociation(array $args = [])
 * @phpstan-method \Aws\Result createContainerAssociation(array{
 *     ContainerAssociationName?: string,
 *     Description?: string,
 *     Type?: 'ECS'|'EKS',
 *     ContainerMonitoringConfigurations?: list<array{ClusterArn?: string, AttributeFilters?: list<array>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContainerAssociationAsync(array{
 *     ContainerAssociationName?: string,
 *     Description?: string,
 *     Type?: 'ECS'|'EKS',
 *     ContainerMonitoringConfigurations?: list<array{ClusterArn?: string, AttributeFilters?: list<array>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFirewall(array $args = [])
 * @phpstan-method \Aws\Result createFirewall(array{
 *     FirewallName?: string,
 *     FirewallPolicyArn?: string,
 *     VpcId?: string,
 *     SubnetMappings?: list<array{SubnetId?: string, IPAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...}>,
 *     DeleteProtection?: bool,
 *     SubnetChangeProtection?: bool,
 *     FirewallPolicyChangeProtection?: bool,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     EnabledAnalysisTypes?: list<'HTTP_HOST'|'TLS_SNI'>,
 *     TransitGatewayId?: string,
 *     AvailabilityZoneMappings?: list<array{AvailabilityZone?: string, ...}>,
 *     AvailabilityZoneChangeProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFirewallAsync(array{
 *     FirewallName?: string,
 *     FirewallPolicyArn?: string,
 *     VpcId?: string,
 *     SubnetMappings?: list<array{SubnetId?: string, IPAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...}>,
 *     DeleteProtection?: bool,
 *     SubnetChangeProtection?: bool,
 *     FirewallPolicyChangeProtection?: bool,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     EnabledAnalysisTypes?: list<'HTTP_HOST'|'TLS_SNI'>,
 *     TransitGatewayId?: string,
 *     AvailabilityZoneMappings?: list<array{AvailabilityZone?: string, ...}>,
 *     AvailabilityZoneChangeProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFirewallPolicy(array $args = [])
 * @phpstan-method \Aws\Result createFirewallPolicy(array{
 *     FirewallPolicyName?: string,
 *     FirewallPolicy?: array{
 *         StatelessRuleGroupReferences?: list<array>,
 *         StatelessDefaultActions?: list<string>,
 *         StatelessFragmentDefaultActions?: list<string>,
 *         StatelessCustomActions?: list<array>,
 *         StatefulRuleGroupReferences?: list<array>,
 *         StatefulDefaultActions?: list<string>,
 *         StatefulEngineOptions?: array{
 *             RuleOrder?: 'DEFAULT_ACTION_ORDER'|'STRICT_ORDER',
 *             StreamExceptionPolicy?: 'CONTINUE'|'DROP'|'REJECT',
 *             FlowTimeouts?: array,
 *             ...,
 *         },
 *         TLSInspectionConfigurationArn?: string,
 *         PolicyVariables?: array{RuleVariables?: array<string, array>, ...},
 *         EnableTLSSessionHolding?: bool,
 *         ...,
 *     },
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DryRun?: bool,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFirewallPolicyAsync(array{
 *     FirewallPolicyName?: string,
 *     FirewallPolicy?: array{
 *         StatelessRuleGroupReferences?: list<array>,
 *         StatelessDefaultActions?: list<string>,
 *         StatelessFragmentDefaultActions?: list<string>,
 *         StatelessCustomActions?: list<array>,
 *         StatefulRuleGroupReferences?: list<array>,
 *         StatefulDefaultActions?: list<string>,
 *         StatefulEngineOptions?: array{
 *             RuleOrder?: 'DEFAULT_ACTION_ORDER'|'STRICT_ORDER',
 *             StreamExceptionPolicy?: 'CONTINUE'|'DROP'|'REJECT',
 *             FlowTimeouts?: array,
 *             ...,
 *         },
 *         TLSInspectionConfigurationArn?: string,
 *         PolicyVariables?: array{RuleVariables?: array<string, array>, ...},
 *         EnableTLSSessionHolding?: bool,
 *         ...,
 *     },
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DryRun?: bool,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProxy(array $args = [])
 * @phpstan-method \Aws\Result createProxy(array{
 *     ProxyName?: string,
 *     NatGatewayId?: string,
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     ListenerProperties?: list<array{Port?: int, Type?: 'HTTP'|'HTTPS', ...}>,
 *     TlsInterceptProperties?: array{PcaArn?: string, TlsInterceptMode?: 'DISABLED'|'ENABLED', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProxyAsync(array{
 *     ProxyName?: string,
 *     NatGatewayId?: string,
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     ListenerProperties?: list<array{Port?: int, Type?: 'HTTP'|'HTTPS', ...}>,
 *     TlsInterceptProperties?: array{PcaArn?: string, TlsInterceptMode?: 'DISABLED'|'ENABLED', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProxyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createProxyConfiguration(array{
 *     ProxyConfigurationName?: string,
 *     Description?: string,
 *     RuleGroupNames?: list<string>,
 *     RuleGroupArns?: list<string>,
 *     DefaultRulePhaseActions?: array{
 *         PreDNS?: 'ALERT'|'ALLOW'|'DENY',
 *         PreREQUEST?: 'ALERT'|'ALLOW'|'DENY',
 *         PostRESPONSE?: 'ALERT'|'ALLOW'|'DENY',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProxyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProxyConfigurationAsync(array{
 *     ProxyConfigurationName?: string,
 *     Description?: string,
 *     RuleGroupNames?: list<string>,
 *     RuleGroupArns?: list<string>,
 *     DefaultRulePhaseActions?: array{
 *         PreDNS?: 'ALERT'|'ALLOW'|'DENY',
 *         PreREQUEST?: 'ALERT'|'ALLOW'|'DENY',
 *         PostRESPONSE?: 'ALERT'|'ALLOW'|'DENY',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProxyRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result createProxyRuleGroup(array{
 *     ProxyRuleGroupName?: string,
 *     Description?: string,
 *     Rules?: array{PreDNS?: list<array>, PreREQUEST?: list<array>, PostRESPONSE?: list<array>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProxyRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProxyRuleGroupAsync(array{
 *     ProxyRuleGroupName?: string,
 *     Description?: string,
 *     Rules?: array{PreDNS?: list<array>, PreREQUEST?: list<array>, PostRESPONSE?: list<array>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProxyRules(array $args = [])
 * @phpstan-method \Aws\Result createProxyRules(array{
 *     ProxyRuleGroupArn?: string,
 *     ProxyRuleGroupName?: string,
 *     Rules?: array{PreDNS?: list<array>, PreREQUEST?: list<array>, PostRESPONSE?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProxyRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProxyRulesAsync(array{
 *     ProxyRuleGroupArn?: string,
 *     ProxyRuleGroupName?: string,
 *     Rules?: array{PreDNS?: list<array>, PreREQUEST?: list<array>, PostRESPONSE?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result createRuleGroup(array{
 *     RuleGroupName?: string,
 *     RuleGroup?: array{
 *         RuleVariables?: array{IPSets?: array<string, array>, PortSets?: array<string, array>, ...},
 *         ReferenceSets?: array{IPSetReferences?: array<string, array>, ...},
 *         RulesSource?: array{
 *             RulesString?: string,
 *             RulesSourceList?: array,
 *             StatefulRules?: list<array>,
 *             StatelessRulesAndCustomActions?: array,
 *             ...,
 *         },
 *         StatefulRuleOptions?: array{RuleOrder?: 'DEFAULT_ACTION_ORDER'|'STRICT_ORDER', ...},
 *         ...,
 *     },
 *     Rules?: string,
 *     Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS',
 *     Description?: string,
 *     Capacity?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DryRun?: bool,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     SourceMetadata?: array{SourceArn?: string, SourceUpdateToken?: string, ...},
 *     AnalyzeRuleGroup?: bool,
 *     SummaryConfiguration?: array{RuleOptions?: list<'METADATA'|'MSG'|'SID'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleGroupAsync(array{
 *     RuleGroupName?: string,
 *     RuleGroup?: array{
 *         RuleVariables?: array{IPSets?: array<string, array>, PortSets?: array<string, array>, ...},
 *         ReferenceSets?: array{IPSetReferences?: array<string, array>, ...},
 *         RulesSource?: array{
 *             RulesString?: string,
 *             RulesSourceList?: array,
 *             StatefulRules?: list<array>,
 *             StatelessRulesAndCustomActions?: array,
 *             ...,
 *         },
 *         StatefulRuleOptions?: array{RuleOrder?: 'DEFAULT_ACTION_ORDER'|'STRICT_ORDER', ...},
 *         ...,
 *     },
 *     Rules?: string,
 *     Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS',
 *     Description?: string,
 *     Capacity?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DryRun?: bool,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     SourceMetadata?: array{SourceArn?: string, SourceUpdateToken?: string, ...},
 *     AnalyzeRuleGroup?: bool,
 *     SummaryConfiguration?: array{RuleOptions?: list<'METADATA'|'MSG'|'SID'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTLSInspectionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createTLSInspectionConfiguration(array{
 *     TLSInspectionConfigurationName?: string,
 *     TLSInspectionConfiguration?: array{ServerCertificateConfigurations?: list<array>, ...},
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTLSInspectionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTLSInspectionConfigurationAsync(array{
 *     TLSInspectionConfigurationName?: string,
 *     TLSInspectionConfiguration?: array{ServerCertificateConfigurations?: list<array>, ...},
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcEndpointAssociation(array $args = [])
 * @phpstan-method \Aws\Result createVpcEndpointAssociation(array{
 *     FirewallArn?: string,
 *     VpcId?: string,
 *     SubnetMapping?: array{SubnetId?: string, IPAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...},
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcEndpointAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcEndpointAssociationAsync(array{
 *     FirewallArn?: string,
 *     VpcId?: string,
 *     SubnetMapping?: array{SubnetId?: string, IPAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...},
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteContainerAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteContainerAssociation(array{ContainerAssociationName?: string, ContainerAssociationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContainerAssociationAsync(array{ContainerAssociationName?: string, ContainerAssociationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteFirewall(array $args = [])
 * @phpstan-method \Aws\Result deleteFirewall(array{FirewallName?: string, FirewallArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFirewallAsync(array{FirewallName?: string, FirewallArn?: string, ...} $args = [])
 * @method \Aws\Result deleteFirewallPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteFirewallPolicy(array{FirewallPolicyName?: string, FirewallPolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFirewallPolicyAsync(array{FirewallPolicyName?: string, FirewallPolicyArn?: string, ...} $args = [])
 * @method \Aws\Result deleteNetworkFirewallTransitGatewayAttachment(array $args = [])
 * @phpstan-method \Aws\Result deleteNetworkFirewallTransitGatewayAttachment(array{TransitGatewayAttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkFirewallTransitGatewayAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkFirewallTransitGatewayAttachmentAsync(array{TransitGatewayAttachmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteProxy(array $args = [])
 * @phpstan-method \Aws\Result deleteProxy(array{NatGatewayId?: string, ProxyName?: string, ProxyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProxyAsync(array{NatGatewayId?: string, ProxyName?: string, ProxyArn?: string, ...} $args = [])
 * @method \Aws\Result deleteProxyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteProxyConfiguration(array{ProxyConfigurationName?: string, ProxyConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProxyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProxyConfigurationAsync(array{ProxyConfigurationName?: string, ProxyConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteProxyRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteProxyRuleGroup(array{ProxyRuleGroupName?: string, ProxyRuleGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProxyRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProxyRuleGroupAsync(array{ProxyRuleGroupName?: string, ProxyRuleGroupArn?: string, ...} $args = [])
 * @method \Aws\Result deleteProxyRules(array $args = [])
 * @phpstan-method \Aws\Result deleteProxyRules(array{ProxyRuleGroupArn?: string, ProxyRuleGroupName?: string, Rules?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProxyRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProxyRulesAsync(array{ProxyRuleGroupArn?: string, ProxyRuleGroupName?: string, Rules?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteRuleGroup(array{RuleGroupName?: string, RuleGroupArn?: string, Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleGroupAsync(array{RuleGroupName?: string, RuleGroupArn?: string, Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS', ...} $args = [])
 * @method \Aws\Result deleteTLSInspectionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteTLSInspectionConfiguration(array{TLSInspectionConfigurationArn?: string, TLSInspectionConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTLSInspectionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTLSInspectionConfigurationAsync(array{TLSInspectionConfigurationArn?: string, TLSInspectionConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcEndpointAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcEndpointAssociation(array{VpcEndpointAssociationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcEndpointAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcEndpointAssociationAsync(array{VpcEndpointAssociationArn?: string, ...} $args = [])
 * @method \Aws\Result describeContainerAssociation(array $args = [])
 * @phpstan-method \Aws\Result describeContainerAssociation(array{ContainerAssociationName?: string, ContainerAssociationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContainerAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContainerAssociationAsync(array{ContainerAssociationName?: string, ContainerAssociationArn?: string, ...} $args = [])
 * @method \Aws\Result describeFirewall(array $args = [])
 * @phpstan-method \Aws\Result describeFirewall(array{FirewallName?: string, FirewallArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFirewallAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFirewallAsync(array{FirewallName?: string, FirewallArn?: string, ...} $args = [])
 * @method \Aws\Result describeFirewallMetadata(array $args = [])
 * @phpstan-method \Aws\Result describeFirewallMetadata(array{FirewallArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFirewallMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFirewallMetadataAsync(array{FirewallArn?: string, ...} $args = [])
 * @method \Aws\Result describeFirewallPolicy(array $args = [])
 * @phpstan-method \Aws\Result describeFirewallPolicy(array{FirewallPolicyName?: string, FirewallPolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFirewallPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFirewallPolicyAsync(array{FirewallPolicyName?: string, FirewallPolicyArn?: string, ...} $args = [])
 * @method \Aws\Result describeFlowOperation(array $args = [])
 * @phpstan-method \Aws\Result describeFlowOperation(array{
 *     FirewallArn?: string,
 *     AvailabilityZone?: string,
 *     VpcEndpointAssociationArn?: string,
 *     VpcEndpointId?: string,
 *     FlowOperationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlowOperationAsync(array{
 *     FirewallArn?: string,
 *     AvailabilityZone?: string,
 *     VpcEndpointAssociationArn?: string,
 *     VpcEndpointId?: string,
 *     FlowOperationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeLoggingConfiguration(array{FirewallArn?: string, FirewallName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoggingConfigurationAsync(array{FirewallArn?: string, FirewallName?: string, ...} $args = [])
 * @method \Aws\Result describeProxy(array $args = [])
 * @phpstan-method \Aws\Result describeProxy(array{ProxyName?: string, ProxyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProxyAsync(array{ProxyName?: string, ProxyArn?: string, ...} $args = [])
 * @method \Aws\Result describeProxyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeProxyConfiguration(array{ProxyConfigurationName?: string, ProxyConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProxyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProxyConfigurationAsync(array{ProxyConfigurationName?: string, ProxyConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result describeProxyRule(array $args = [])
 * @phpstan-method \Aws\Result describeProxyRule(array{ProxyRuleName?: string, ProxyRuleGroupName?: string, ProxyRuleGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProxyRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProxyRuleAsync(array{ProxyRuleName?: string, ProxyRuleGroupName?: string, ProxyRuleGroupArn?: string, ...} $args = [])
 * @method \Aws\Result describeProxyRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result describeProxyRuleGroup(array{ProxyRuleGroupName?: string, ProxyRuleGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProxyRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProxyRuleGroupAsync(array{ProxyRuleGroupName?: string, ProxyRuleGroupArn?: string, ...} $args = [])
 * @method \Aws\Result describeResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result describeResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result describeRuleGroup(array{
 *     RuleGroupName?: string,
 *     RuleGroupArn?: string,
 *     Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS',
 *     AnalyzeRuleGroup?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRuleGroupAsync(array{
 *     RuleGroupName?: string,
 *     RuleGroupArn?: string,
 *     Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS',
 *     AnalyzeRuleGroup?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRuleGroupMetadata(array $args = [])
 * @phpstan-method \Aws\Result describeRuleGroupMetadata(array{RuleGroupName?: string, RuleGroupArn?: string, Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuleGroupMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRuleGroupMetadataAsync(array{RuleGroupName?: string, RuleGroupArn?: string, Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS', ...} $args = [])
 * @method \Aws\Result describeRuleGroupSummary(array $args = [])
 * @phpstan-method \Aws\Result describeRuleGroupSummary(array{RuleGroupName?: string, RuleGroupArn?: string, Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuleGroupSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRuleGroupSummaryAsync(array{RuleGroupName?: string, RuleGroupArn?: string, Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS', ...} $args = [])
 * @method \Aws\Result describeTLSInspectionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeTLSInspectionConfiguration(array{TLSInspectionConfigurationArn?: string, TLSInspectionConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTLSInspectionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTLSInspectionConfigurationAsync(array{TLSInspectionConfigurationArn?: string, TLSInspectionConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result describeVpcEndpointAssociation(array $args = [])
 * @phpstan-method \Aws\Result describeVpcEndpointAssociation(array{VpcEndpointAssociationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcEndpointAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVpcEndpointAssociationAsync(array{VpcEndpointAssociationArn?: string, ...} $args = [])
 * @method \Aws\Result detachRuleGroupsFromProxyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result detachRuleGroupsFromProxyConfiguration(array{
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     RuleGroupNames?: list<string>,
 *     RuleGroupArns?: list<string>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detachRuleGroupsFromProxyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachRuleGroupsFromProxyConfigurationAsync(array{
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     RuleGroupNames?: list<string>,
 *     RuleGroupArns?: list<string>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateAvailabilityZones(array $args = [])
 * @phpstan-method \Aws\Result disassociateAvailabilityZones(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     AvailabilityZoneMappings?: list<array{AvailabilityZone?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAvailabilityZonesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAvailabilityZonesAsync(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     AvailabilityZoneMappings?: list<array{AvailabilityZone?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateSubnets(array $args = [])
 * @phpstan-method \Aws\Result disassociateSubnets(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSubnetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSubnetsAsync(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, SubnetIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getAnalysisReportResults(array $args = [])
 * @phpstan-method \Aws\Result getAnalysisReportResults(array{
 *     FirewallName?: string,
 *     AnalysisReportId?: string,
 *     FirewallArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnalysisReportResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnalysisReportResultsAsync(array{
 *     FirewallName?: string,
 *     AnalysisReportId?: string,
 *     FirewallArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnalysisReports(array $args = [])
 * @phpstan-method \Aws\Result listAnalysisReports(array{FirewallName?: string, FirewallArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnalysisReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnalysisReportsAsync(array{FirewallName?: string, FirewallArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listContainerAssociations(array $args = [])
 * @phpstan-method \Aws\Result listContainerAssociations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContainerAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContainerAssociationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFirewallPolicies(array $args = [])
 * @phpstan-method \Aws\Result listFirewallPolicies(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallPoliciesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFirewalls(array $args = [])
 * @phpstan-method \Aws\Result listFirewalls(array{NextToken?: string, VpcIds?: list<string>, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFirewallsAsync(array{NextToken?: string, VpcIds?: list<string>, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFlowOperationResults(array $args = [])
 * @phpstan-method \Aws\Result listFlowOperationResults(array{
 *     FirewallArn?: string,
 *     FlowOperationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AvailabilityZone?: string,
 *     VpcEndpointId?: string,
 *     VpcEndpointAssociationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowOperationResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowOperationResultsAsync(array{
 *     FirewallArn?: string,
 *     FlowOperationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AvailabilityZone?: string,
 *     VpcEndpointId?: string,
 *     VpcEndpointAssociationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFlowOperations(array $args = [])
 * @phpstan-method \Aws\Result listFlowOperations(array{
 *     FirewallArn?: string,
 *     AvailabilityZone?: string,
 *     VpcEndpointAssociationArn?: string,
 *     VpcEndpointId?: string,
 *     FlowOperationType?: 'FLOW_CAPTURE'|'FLOW_FLUSH',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowOperationsAsync(array{
 *     FirewallArn?: string,
 *     AvailabilityZone?: string,
 *     VpcEndpointAssociationArn?: string,
 *     VpcEndpointId?: string,
 *     FlowOperationType?: 'FLOW_CAPTURE'|'FLOW_FLUSH',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProxies(array $args = [])
 * @phpstan-method \Aws\Result listProxies(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProxiesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProxyConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listProxyConfigurations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxyConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProxyConfigurationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProxyRuleGroups(array $args = [])
 * @phpstan-method \Aws\Result listProxyRuleGroups(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxyRuleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProxyRuleGroupsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRuleGroups(array $args = [])
 * @phpstan-method \Aws\Result listRuleGroups(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Scope?: 'ACCOUNT'|'MANAGED',
 *     ManagedType?: 'ACTIVE_THREAT_DEFENSE'|'AWS_MANAGED_DOMAIN_LISTS'|'AWS_MANAGED_THREAT_SIGNATURES'|'PARTNER_MANAGED',
 *     SubscriptionStatus?: 'NOT_SUBSCRIBED'|'SUBSCRIBED',
 *     Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleGroupsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Scope?: 'ACCOUNT'|'MANAGED',
 *     ManagedType?: 'ACTIVE_THREAT_DEFENSE'|'AWS_MANAGED_DOMAIN_LISTS'|'AWS_MANAGED_THREAT_SIGNATURES'|'PARTNER_MANAGED',
 *     SubscriptionStatus?: 'NOT_SUBSCRIBED'|'SUBSCRIBED',
 *     Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTLSInspectionConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listTLSInspectionConfigurations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTLSInspectionConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTLSInspectionConfigurationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{NextToken?: string, MaxResults?: int, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{NextToken?: string, MaxResults?: int, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVpcEndpointAssociations(array $args = [])
 * @phpstan-method \Aws\Result listVpcEndpointAssociations(array{NextToken?: string, MaxResults?: int, FirewallArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcEndpointAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcEndpointAssociationsAsync(array{NextToken?: string, MaxResults?: int, FirewallArn?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result rejectNetworkFirewallTransitGatewayAttachment(array $args = [])
 * @phpstan-method \Aws\Result rejectNetworkFirewallTransitGatewayAttachment(array{TransitGatewayAttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectNetworkFirewallTransitGatewayAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectNetworkFirewallTransitGatewayAttachmentAsync(array{TransitGatewayAttachmentId?: string, ...} $args = [])
 * @method \Aws\Result startAnalysisReport(array $args = [])
 * @phpstan-method \Aws\Result startAnalysisReport(array{FirewallName?: string, FirewallArn?: string, AnalysisType?: 'HTTP_HOST'|'TLS_SNI', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAnalysisReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAnalysisReportAsync(array{FirewallName?: string, FirewallArn?: string, AnalysisType?: 'HTTP_HOST'|'TLS_SNI', ...} $args = [])
 * @method \Aws\Result startFlowCapture(array $args = [])
 * @phpstan-method \Aws\Result startFlowCapture(array{
 *     FirewallArn?: string,
 *     AvailabilityZone?: string,
 *     VpcEndpointAssociationArn?: string,
 *     VpcEndpointId?: string,
 *     MinimumFlowAgeInSeconds?: int,
 *     FlowFilters?: list<array{
 *         SourceAddress?: array,
 *         DestinationAddress?: array,
 *         SourcePort?: string,
 *         DestinationPort?: string,
 *         Protocols?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startFlowCaptureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFlowCaptureAsync(array{
 *     FirewallArn?: string,
 *     AvailabilityZone?: string,
 *     VpcEndpointAssociationArn?: string,
 *     VpcEndpointId?: string,
 *     MinimumFlowAgeInSeconds?: int,
 *     FlowFilters?: list<array{
 *         SourceAddress?: array,
 *         DestinationAddress?: array,
 *         SourcePort?: string,
 *         DestinationPort?: string,
 *         Protocols?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFlowFlush(array $args = [])
 * @phpstan-method \Aws\Result startFlowFlush(array{
 *     FirewallArn?: string,
 *     AvailabilityZone?: string,
 *     VpcEndpointAssociationArn?: string,
 *     VpcEndpointId?: string,
 *     MinimumFlowAgeInSeconds?: int,
 *     FlowFilters?: list<array{
 *         SourceAddress?: array,
 *         DestinationAddress?: array,
 *         SourcePort?: string,
 *         DestinationPort?: string,
 *         Protocols?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startFlowFlushAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFlowFlushAsync(array{
 *     FirewallArn?: string,
 *     AvailabilityZone?: string,
 *     VpcEndpointAssociationArn?: string,
 *     VpcEndpointId?: string,
 *     MinimumFlowAgeInSeconds?: int,
 *     FlowFilters?: list<array{
 *         SourceAddress?: array,
 *         DestinationAddress?: array,
 *         SourcePort?: string,
 *         DestinationPort?: string,
 *         Protocols?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAvailabilityZoneChangeProtection(array $args = [])
 * @phpstan-method \Aws\Result updateAvailabilityZoneChangeProtection(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     AvailabilityZoneChangeProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAvailabilityZoneChangeProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAvailabilityZoneChangeProtectionAsync(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     AvailabilityZoneChangeProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContainerAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateContainerAssociation(array{
 *     ContainerAssociationName?: string,
 *     ContainerAssociationArn?: string,
 *     Description?: string,
 *     Type?: 'ECS'|'EKS',
 *     ContainerMonitoringConfigurations?: list<array{ClusterArn?: string, AttributeFilters?: list<array>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContainerAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContainerAssociationAsync(array{
 *     ContainerAssociationName?: string,
 *     ContainerAssociationArn?: string,
 *     Description?: string,
 *     Type?: 'ECS'|'EKS',
 *     ContainerMonitoringConfigurations?: list<array{ClusterArn?: string, AttributeFilters?: list<array>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFirewallAnalysisSettings(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallAnalysisSettings(array{
 *     EnabledAnalysisTypes?: list<'HTTP_HOST'|'TLS_SNI'>,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallAnalysisSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallAnalysisSettingsAsync(array{
 *     EnabledAnalysisTypes?: list<'HTTP_HOST'|'TLS_SNI'>,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFirewallDeleteProtection(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallDeleteProtection(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, DeleteProtection?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallDeleteProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallDeleteProtectionAsync(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, DeleteProtection?: bool, ...} $args = [])
 * @method \Aws\Result updateFirewallDescription(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallDescription(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallDescriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallDescriptionAsync(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateFirewallEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallEncryptionConfiguration(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallEncryptionConfigurationAsync(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFirewallPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallPolicy(array{
 *     UpdateToken?: string,
 *     FirewallPolicyArn?: string,
 *     FirewallPolicyName?: string,
 *     FirewallPolicy?: array{
 *         StatelessRuleGroupReferences?: list<array>,
 *         StatelessDefaultActions?: list<string>,
 *         StatelessFragmentDefaultActions?: list<string>,
 *         StatelessCustomActions?: list<array>,
 *         StatefulRuleGroupReferences?: list<array>,
 *         StatefulDefaultActions?: list<string>,
 *         StatefulEngineOptions?: array{
 *             RuleOrder?: 'DEFAULT_ACTION_ORDER'|'STRICT_ORDER',
 *             StreamExceptionPolicy?: 'CONTINUE'|'DROP'|'REJECT',
 *             FlowTimeouts?: array,
 *             ...,
 *         },
 *         TLSInspectionConfigurationArn?: string,
 *         PolicyVariables?: array{RuleVariables?: array<string, array>, ...},
 *         EnableTLSSessionHolding?: bool,
 *         ...,
 *     },
 *     Description?: string,
 *     DryRun?: bool,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallPolicyAsync(array{
 *     UpdateToken?: string,
 *     FirewallPolicyArn?: string,
 *     FirewallPolicyName?: string,
 *     FirewallPolicy?: array{
 *         StatelessRuleGroupReferences?: list<array>,
 *         StatelessDefaultActions?: list<string>,
 *         StatelessFragmentDefaultActions?: list<string>,
 *         StatelessCustomActions?: list<array>,
 *         StatefulRuleGroupReferences?: list<array>,
 *         StatefulDefaultActions?: list<string>,
 *         StatefulEngineOptions?: array{
 *             RuleOrder?: 'DEFAULT_ACTION_ORDER'|'STRICT_ORDER',
 *             StreamExceptionPolicy?: 'CONTINUE'|'DROP'|'REJECT',
 *             FlowTimeouts?: array,
 *             ...,
 *         },
 *         TLSInspectionConfigurationArn?: string,
 *         PolicyVariables?: array{RuleVariables?: array<string, array>, ...},
 *         EnableTLSSessionHolding?: bool,
 *         ...,
 *     },
 *     Description?: string,
 *     DryRun?: bool,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFirewallPolicyChangeProtection(array $args = [])
 * @phpstan-method \Aws\Result updateFirewallPolicyChangeProtection(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     FirewallPolicyChangeProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallPolicyChangeProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFirewallPolicyChangeProtectionAsync(array{
 *     UpdateToken?: string,
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     FirewallPolicyChangeProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateLoggingConfiguration(array{
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     LoggingConfiguration?: array{LogDestinationConfigs?: list<array>, ...},
 *     EnableMonitoringDashboard?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLoggingConfigurationAsync(array{
 *     FirewallArn?: string,
 *     FirewallName?: string,
 *     LoggingConfiguration?: array{LogDestinationConfigs?: list<array>, ...},
 *     EnableMonitoringDashboard?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProxy(array $args = [])
 * @phpstan-method \Aws\Result updateProxy(array{
 *     NatGatewayId?: string,
 *     ProxyName?: string,
 *     ProxyArn?: string,
 *     ListenerPropertiesToAdd?: list<array{Port?: int, Type?: 'HTTP'|'HTTPS', ...}>,
 *     ListenerPropertiesToRemove?: list<array{Port?: int, Type?: 'HTTP'|'HTTPS', ...}>,
 *     TlsInterceptProperties?: array{PcaArn?: string, TlsInterceptMode?: 'DISABLED'|'ENABLED', ...},
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxyAsync(array{
 *     NatGatewayId?: string,
 *     ProxyName?: string,
 *     ProxyArn?: string,
 *     ListenerPropertiesToAdd?: list<array{Port?: int, Type?: 'HTTP'|'HTTPS', ...}>,
 *     ListenerPropertiesToRemove?: list<array{Port?: int, Type?: 'HTTP'|'HTTPS', ...}>,
 *     TlsInterceptProperties?: array{PcaArn?: string, TlsInterceptMode?: 'DISABLED'|'ENABLED', ...},
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProxyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateProxyConfiguration(array{
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     DefaultRulePhaseActions?: array{
 *         PreDNS?: 'ALERT'|'ALLOW'|'DENY',
 *         PreREQUEST?: 'ALERT'|'ALLOW'|'DENY',
 *         PostRESPONSE?: 'ALERT'|'ALLOW'|'DENY',
 *         ...,
 *     },
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxyConfigurationAsync(array{
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     DefaultRulePhaseActions?: array{
 *         PreDNS?: 'ALERT'|'ALLOW'|'DENY',
 *         PreREQUEST?: 'ALERT'|'ALLOW'|'DENY',
 *         PostRESPONSE?: 'ALERT'|'ALLOW'|'DENY',
 *         ...,
 *     },
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProxyRule(array $args = [])
 * @phpstan-method \Aws\Result updateProxyRule(array{
 *     ProxyRuleGroupName?: string,
 *     ProxyRuleGroupArn?: string,
 *     ProxyRuleName?: string,
 *     Description?: string,
 *     Action?: 'ALERT'|'ALLOW'|'DENY',
 *     AddConditions?: list<array{ConditionOperator?: string, ConditionKey?: string, ConditionValues?: list<string>, ...}>,
 *     RemoveConditions?: list<array{ConditionOperator?: string, ConditionKey?: string, ConditionValues?: list<string>, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxyRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxyRuleAsync(array{
 *     ProxyRuleGroupName?: string,
 *     ProxyRuleGroupArn?: string,
 *     ProxyRuleName?: string,
 *     Description?: string,
 *     Action?: 'ALERT'|'ALLOW'|'DENY',
 *     AddConditions?: list<array{ConditionOperator?: string, ConditionKey?: string, ConditionValues?: list<string>, ...}>,
 *     RemoveConditions?: list<array{ConditionOperator?: string, ConditionKey?: string, ConditionValues?: list<string>, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProxyRuleGroupPriorities(array $args = [])
 * @phpstan-method \Aws\Result updateProxyRuleGroupPriorities(array{
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     RuleGroups?: list<array{ProxyRuleGroupName?: string, NewPosition?: int, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxyRuleGroupPrioritiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxyRuleGroupPrioritiesAsync(array{
 *     ProxyConfigurationName?: string,
 *     ProxyConfigurationArn?: string,
 *     RuleGroups?: list<array{ProxyRuleGroupName?: string, NewPosition?: int, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProxyRulePriorities(array $args = [])
 * @phpstan-method \Aws\Result updateProxyRulePriorities(array{
 *     ProxyRuleGroupName?: string,
 *     ProxyRuleGroupArn?: string,
 *     RuleGroupRequestPhase?: 'POST_RES'|'PRE_DNS'|'PRE_REQ',
 *     Rules?: list<array{ProxyRuleName?: string, NewPosition?: int, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxyRulePrioritiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxyRulePrioritiesAsync(array{
 *     ProxyRuleGroupName?: string,
 *     ProxyRuleGroupArn?: string,
 *     RuleGroupRequestPhase?: 'POST_RES'|'PRE_DNS'|'PRE_REQ',
 *     Rules?: list<array{ProxyRuleName?: string, NewPosition?: int, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result updateRuleGroup(array{
 *     UpdateToken?: string,
 *     RuleGroupArn?: string,
 *     RuleGroupName?: string,
 *     RuleGroup?: array{
 *         RuleVariables?: array{IPSets?: array<string, array>, PortSets?: array<string, array>, ...},
 *         ReferenceSets?: array{IPSetReferences?: array<string, array>, ...},
 *         RulesSource?: array{
 *             RulesString?: string,
 *             RulesSourceList?: array,
 *             StatefulRules?: list<array>,
 *             StatelessRulesAndCustomActions?: array,
 *             ...,
 *         },
 *         StatefulRuleOptions?: array{RuleOrder?: 'DEFAULT_ACTION_ORDER'|'STRICT_ORDER', ...},
 *         ...,
 *     },
 *     Rules?: string,
 *     Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS',
 *     Description?: string,
 *     DryRun?: bool,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     SourceMetadata?: array{SourceArn?: string, SourceUpdateToken?: string, ...},
 *     AnalyzeRuleGroup?: bool,
 *     SummaryConfiguration?: array{RuleOptions?: list<'METADATA'|'MSG'|'SID'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleGroupAsync(array{
 *     UpdateToken?: string,
 *     RuleGroupArn?: string,
 *     RuleGroupName?: string,
 *     RuleGroup?: array{
 *         RuleVariables?: array{IPSets?: array<string, array>, PortSets?: array<string, array>, ...},
 *         ReferenceSets?: array{IPSetReferences?: array<string, array>, ...},
 *         RulesSource?: array{
 *             RulesString?: string,
 *             RulesSourceList?: array,
 *             StatefulRules?: list<array>,
 *             StatelessRulesAndCustomActions?: array,
 *             ...,
 *         },
 *         StatefulRuleOptions?: array{RuleOrder?: 'DEFAULT_ACTION_ORDER'|'STRICT_ORDER', ...},
 *         ...,
 *     },
 *     Rules?: string,
 *     Type?: 'STATEFUL'|'STATEFUL_DOMAIN'|'STATELESS',
 *     Description?: string,
 *     DryRun?: bool,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     SourceMetadata?: array{SourceArn?: string, SourceUpdateToken?: string, ...},
 *     AnalyzeRuleGroup?: bool,
 *     SummaryConfiguration?: array{RuleOptions?: list<'METADATA'|'MSG'|'SID'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSubnetChangeProtection(array $args = [])
 * @phpstan-method \Aws\Result updateSubnetChangeProtection(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, SubnetChangeProtection?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubnetChangeProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubnetChangeProtectionAsync(array{UpdateToken?: string, FirewallArn?: string, FirewallName?: string, SubnetChangeProtection?: bool, ...} $args = [])
 * @method \Aws\Result updateTLSInspectionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateTLSInspectionConfiguration(array{
 *     TLSInspectionConfigurationArn?: string,
 *     TLSInspectionConfigurationName?: string,
 *     TLSInspectionConfiguration?: array{ServerCertificateConfigurations?: list<array>, ...},
 *     Description?: string,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTLSInspectionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTLSInspectionConfigurationAsync(array{
 *     TLSInspectionConfigurationArn?: string,
 *     TLSInspectionConfigurationName?: string,
 *     TLSInspectionConfiguration?: array{ServerCertificateConfigurations?: list<array>, ...},
 *     Description?: string,
 *     EncryptionConfiguration?: array{KeyId?: string, Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_KMS', ...},
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 */
class NetworkFirewallClient extends AwsClient {}
