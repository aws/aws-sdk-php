<?php
namespace Aws\VPCLattice;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon VPC Lattice** service.
 * @method \Aws\Result batchUpdateRule(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateRule(array{
 *     serviceIdentifier?: string,
 *     listenerIdentifier?: string,
 *     rules?: list<array{ruleIdentifier?: string, match?: array, priority?: int, action?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateRuleAsync(array{
 *     serviceIdentifier?: string,
 *     listenerIdentifier?: string,
 *     rules?: list<array{ruleIdentifier?: string, match?: array, priority?: int, action?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessLogSubscription(array $args = [])
 * @phpstan-method \Aws\Result createAccessLogSubscription(array{
 *     clientToken?: string,
 *     resourceIdentifier?: string,
 *     destinationArn?: string,
 *     serviceNetworkLogType?: 'RESOURCE'|'SERVICE',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessLogSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessLogSubscriptionAsync(array{
 *     clientToken?: string,
 *     resourceIdentifier?: string,
 *     destinationArn?: string,
 *     serviceNetworkLogType?: 'RESOURCE'|'SERVICE',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createListener(array $args = [])
 * @phpstan-method \Aws\Result createListener(array{
 *     serviceIdentifier?: string,
 *     name?: string,
 *     protocol?: 'HTTP'|'HTTPS'|'TLS_PASSTHROUGH',
 *     port?: int,
 *     defaultAction?: array{forward?: array{targetGroups?: list<array>, ...}, fixedResponse?: array{statusCode?: int, ...}, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createListenerAsync(array{
 *     serviceIdentifier?: string,
 *     name?: string,
 *     protocol?: 'HTTP'|'HTTPS'|'TLS_PASSTHROUGH',
 *     port?: int,
 *     defaultAction?: array{forward?: array{targetGroups?: list<array>, ...}, fixedResponse?: array{statusCode?: int, ...}, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createResourceConfiguration(array{
 *     name?: string,
 *     type?: 'ARN'|'CHILD'|'GROUP'|'SINGLE',
 *     portRanges?: list<string>,
 *     protocol?: 'TCP',
 *     resourceGatewayIdentifier?: string,
 *     resourceConfigurationGroupIdentifier?: string,
 *     resourceConfigurationDefinition?: array{
 *         dnsResource?: array{domainName?: string, ipAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...},
 *         ipResource?: array{ipAddress?: string, ...},
 *         arnResource?: array{arn?: string, ...},
 *         ...,
 *     },
 *     allowAssociationToShareableServiceNetwork?: bool,
 *     customDomainName?: string,
 *     groupDomain?: string,
 *     domainVerificationIdentifier?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceConfigurationAsync(array{
 *     name?: string,
 *     type?: 'ARN'|'CHILD'|'GROUP'|'SINGLE',
 *     portRanges?: list<string>,
 *     protocol?: 'TCP',
 *     resourceGatewayIdentifier?: string,
 *     resourceConfigurationGroupIdentifier?: string,
 *     resourceConfigurationDefinition?: array{
 *         dnsResource?: array{domainName?: string, ipAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...},
 *         ipResource?: array{ipAddress?: string, ...},
 *         arnResource?: array{arn?: string, ...},
 *         ...,
 *     },
 *     allowAssociationToShareableServiceNetwork?: bool,
 *     customDomainName?: string,
 *     groupDomain?: string,
 *     domainVerificationIdentifier?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceGateway(array $args = [])
 * @phpstan-method \Aws\Result createResourceGateway(array{
 *     clientToken?: string,
 *     name?: string,
 *     vpcIdentifier?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     ipAddressType?: 'DUALSTACK'|'IPV4'|'IPV6',
 *     ipv4AddressesPerEni?: int,
 *     resourceConfigDnsResolution?: 'IN_VPC'|'PUBLIC',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceGatewayAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     vpcIdentifier?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     ipAddressType?: 'DUALSTACK'|'IPV4'|'IPV6',
 *     ipv4AddressesPerEni?: int,
 *     resourceConfigDnsResolution?: 'IN_VPC'|'PUBLIC',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @phpstan-method \Aws\Result createRule(array{
 *     serviceIdentifier?: string,
 *     listenerIdentifier?: string,
 *     name?: string,
 *     match?: array{httpMatch?: array{method?: string, pathMatch?: array, headerMatches?: list<array>, ...}, ...},
 *     priority?: int,
 *     action?: array{forward?: array{targetGroups?: list<array>, ...}, fixedResponse?: array{statusCode?: int, ...}, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleAsync(array{
 *     serviceIdentifier?: string,
 *     listenerIdentifier?: string,
 *     name?: string,
 *     match?: array{httpMatch?: array{method?: string, pathMatch?: array, headerMatches?: list<array>, ...}, ...},
 *     priority?: int,
 *     action?: array{forward?: array{targetGroups?: list<array>, ...}, fixedResponse?: array{statusCode?: int, ...}, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @phpstan-method \Aws\Result createService(array{
 *     clientToken?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     customDomainName?: string,
 *     certificateArn?: string,
 *     authType?: 'AWS_IAM'|'NONE',
 *     idleTimeoutSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     customDomainName?: string,
 *     certificateArn?: string,
 *     authType?: 'AWS_IAM'|'NONE',
 *     idleTimeoutSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceNetwork(array $args = [])
 * @phpstan-method \Aws\Result createServiceNetwork(array{
 *     clientToken?: string,
 *     name?: string,
 *     authType?: 'AWS_IAM'|'NONE',
 *     tags?: array<string, string>,
 *     sharingConfig?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceNetworkAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     authType?: 'AWS_IAM'|'NONE',
 *     tags?: array<string, string>,
 *     sharingConfig?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceNetworkResourceAssociation(array $args = [])
 * @phpstan-method \Aws\Result createServiceNetworkResourceAssociation(array{
 *     clientToken?: string,
 *     resourceConfigurationIdentifier?: string,
 *     serviceNetworkIdentifier?: string,
 *     privateDnsEnabled?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceNetworkResourceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceNetworkResourceAssociationAsync(array{
 *     clientToken?: string,
 *     resourceConfigurationIdentifier?: string,
 *     serviceNetworkIdentifier?: string,
 *     privateDnsEnabled?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceNetworkServiceAssociation(array $args = [])
 * @phpstan-method \Aws\Result createServiceNetworkServiceAssociation(array{
 *     clientToken?: string,
 *     serviceIdentifier?: string,
 *     serviceNetworkIdentifier?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceNetworkServiceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceNetworkServiceAssociationAsync(array{
 *     clientToken?: string,
 *     serviceIdentifier?: string,
 *     serviceNetworkIdentifier?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceNetworkVpcAssociation(array $args = [])
 * @phpstan-method \Aws\Result createServiceNetworkVpcAssociation(array{
 *     clientToken?: string,
 *     serviceNetworkIdentifier?: string,
 *     vpcIdentifier?: string,
 *     privateDnsEnabled?: bool,
 *     securityGroupIds?: list<string>,
 *     tags?: array<string, string>,
 *     dnsOptions?: array{
 *         privateDnsPreference?: 'ALL_DOMAINS'|'SPECIFIED_DOMAINS_ONLY'|'VERIFIED_DOMAINS_AND_SPECIFIED_DOMAINS'|'VERIFIED_DOMAINS_ONLY',
 *         privateDnsSpecifiedDomains?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceNetworkVpcAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceNetworkVpcAssociationAsync(array{
 *     clientToken?: string,
 *     serviceNetworkIdentifier?: string,
 *     vpcIdentifier?: string,
 *     privateDnsEnabled?: bool,
 *     securityGroupIds?: list<string>,
 *     tags?: array<string, string>,
 *     dnsOptions?: array{
 *         privateDnsPreference?: 'ALL_DOMAINS'|'SPECIFIED_DOMAINS_ONLY'|'VERIFIED_DOMAINS_AND_SPECIFIED_DOMAINS'|'VERIFIED_DOMAINS_ONLY',
 *         privateDnsSpecifiedDomains?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTargetGroup(array $args = [])
 * @phpstan-method \Aws\Result createTargetGroup(array{
 *     name?: string,
 *     type?: 'ALB'|'INSTANCE'|'IP'|'LAMBDA',
 *     config?: array{
 *         port?: int,
 *         protocol?: 'HTTP'|'HTTPS'|'TCP',
 *         protocolVersion?: 'GRPC'|'HTTP1'|'HTTP2',
 *         ipAddressType?: 'IPV4'|'IPV6',
 *         vpcIdentifier?: string,
 *         healthCheck?: array{
 *             enabled?: bool,
 *             protocol?: 'HTTP'|'HTTPS'|'TCP',
 *             protocolVersion?: 'HTTP1'|'HTTP2',
 *             port?: int,
 *             path?: string,
 *             healthCheckIntervalSeconds?: int,
 *             healthCheckTimeoutSeconds?: int,
 *             healthyThresholdCount?: int,
 *             unhealthyThresholdCount?: int,
 *             matcher?: array,
 *             ...,
 *         },
 *         lambdaEventStructureVersion?: 'V1'|'V2',
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTargetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTargetGroupAsync(array{
 *     name?: string,
 *     type?: 'ALB'|'INSTANCE'|'IP'|'LAMBDA',
 *     config?: array{
 *         port?: int,
 *         protocol?: 'HTTP'|'HTTPS'|'TCP',
 *         protocolVersion?: 'GRPC'|'HTTP1'|'HTTP2',
 *         ipAddressType?: 'IPV4'|'IPV6',
 *         vpcIdentifier?: string,
 *         healthCheck?: array{
 *             enabled?: bool,
 *             protocol?: 'HTTP'|'HTTPS'|'TCP',
 *             protocolVersion?: 'HTTP1'|'HTTP2',
 *             port?: int,
 *             path?: string,
 *             healthCheckIntervalSeconds?: int,
 *             healthCheckTimeoutSeconds?: int,
 *             healthyThresholdCount?: int,
 *             unhealthyThresholdCount?: int,
 *             matcher?: array,
 *             ...,
 *         },
 *         lambdaEventStructureVersion?: 'V1'|'V2',
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessLogSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessLogSubscription(array{accessLogSubscriptionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessLogSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessLogSubscriptionAsync(array{accessLogSubscriptionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteAuthPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAuthPolicy(array{resourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAuthPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAuthPolicyAsync(array{resourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainVerification(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainVerification(array{domainVerificationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainVerificationAsync(array{domainVerificationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteListener(array $args = [])
 * @phpstan-method \Aws\Result deleteListener(array{serviceIdentifier?: string, listenerIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteListenerAsync(array{serviceIdentifier?: string, listenerIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceConfiguration(array{resourceConfigurationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceConfigurationAsync(array{resourceConfigurationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceEndpointAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceEndpointAssociation(array{resourceEndpointAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceEndpointAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceEndpointAssociationAsync(array{resourceEndpointAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceGateway(array{resourceGatewayIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceGatewayAsync(array{resourceGatewayIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{serviceIdentifier?: string, listenerIdentifier?: string, ruleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{serviceIdentifier?: string, listenerIdentifier?: string, ruleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @phpstan-method \Aws\Result deleteService(array{serviceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceAsync(array{serviceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceNetwork(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceNetwork(array{serviceNetworkIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceNetworkAsync(array{serviceNetworkIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceNetworkResourceAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceNetworkResourceAssociation(array{serviceNetworkResourceAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceNetworkResourceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceNetworkResourceAssociationAsync(array{serviceNetworkResourceAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceNetworkServiceAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceNetworkServiceAssociation(array{serviceNetworkServiceAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceNetworkServiceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceNetworkServiceAssociationAsync(array{serviceNetworkServiceAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceNetworkVpcAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceNetworkVpcAssociation(array{serviceNetworkVpcAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceNetworkVpcAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceNetworkVpcAssociationAsync(array{serviceNetworkVpcAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTargetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteTargetGroup(array{targetGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTargetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTargetGroupAsync(array{targetGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deregisterTargets(array $args = [])
 * @phpstan-method \Aws\Result deregisterTargets(array{targetGroupIdentifier?: string, targets?: list<array{id?: string, port?: int, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterTargetsAsync(array{targetGroupIdentifier?: string, targets?: list<array{id?: string, port?: int, ...}>, ...} $args = [])
 * @method \Aws\Result getAccessLogSubscription(array $args = [])
 * @phpstan-method \Aws\Result getAccessLogSubscription(array{accessLogSubscriptionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessLogSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessLogSubscriptionAsync(array{accessLogSubscriptionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getAuthPolicy(array $args = [])
 * @phpstan-method \Aws\Result getAuthPolicy(array{resourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAuthPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthPolicyAsync(array{resourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getDomainVerification(array $args = [])
 * @phpstan-method \Aws\Result getDomainVerification(array{domainVerificationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainVerificationAsync(array{domainVerificationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getListener(array $args = [])
 * @phpstan-method \Aws\Result getListener(array{serviceIdentifier?: string, listenerIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getListenerAsync(array{serviceIdentifier?: string, listenerIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getResourceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getResourceConfiguration(array{resourceConfigurationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceConfigurationAsync(array{resourceConfigurationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getResourceGateway(array $args = [])
 * @phpstan-method \Aws\Result getResourceGateway(array{resourceGatewayIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceGatewayAsync(array{resourceGatewayIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getRule(array $args = [])
 * @phpstan-method \Aws\Result getRule(array{serviceIdentifier?: string, listenerIdentifier?: string, ruleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuleAsync(array{serviceIdentifier?: string, listenerIdentifier?: string, ruleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getService(array $args = [])
 * @phpstan-method \Aws\Result getService(array{serviceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceAsync(array{serviceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getServiceNetwork(array $args = [])
 * @phpstan-method \Aws\Result getServiceNetwork(array{serviceNetworkIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceNetworkAsync(array{serviceNetworkIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getServiceNetworkResourceAssociation(array $args = [])
 * @phpstan-method \Aws\Result getServiceNetworkResourceAssociation(array{serviceNetworkResourceAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceNetworkResourceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceNetworkResourceAssociationAsync(array{serviceNetworkResourceAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getServiceNetworkServiceAssociation(array $args = [])
 * @phpstan-method \Aws\Result getServiceNetworkServiceAssociation(array{serviceNetworkServiceAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceNetworkServiceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceNetworkServiceAssociationAsync(array{serviceNetworkServiceAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getServiceNetworkVpcAssociation(array $args = [])
 * @phpstan-method \Aws\Result getServiceNetworkVpcAssociation(array{serviceNetworkVpcAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceNetworkVpcAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceNetworkVpcAssociationAsync(array{serviceNetworkVpcAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getTargetGroup(array $args = [])
 * @phpstan-method \Aws\Result getTargetGroup(array{targetGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTargetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTargetGroupAsync(array{targetGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listAccessLogSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listAccessLogSubscriptions(array{resourceIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessLogSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessLogSubscriptionsAsync(array{resourceIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDomainVerifications(array $args = [])
 * @phpstan-method \Aws\Result listDomainVerifications(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainVerificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainVerificationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listListeners(array $args = [])
 * @phpstan-method \Aws\Result listListeners(array{serviceIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listListenersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listListenersAsync(array{serviceIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listResourceConfigurations(array{
 *     resourceGatewayIdentifier?: string,
 *     resourceConfigurationGroupIdentifier?: string,
 *     domainVerificationIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceConfigurationsAsync(array{
 *     resourceGatewayIdentifier?: string,
 *     resourceConfigurationGroupIdentifier?: string,
 *     domainVerificationIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceEndpointAssociations(array $args = [])
 * @phpstan-method \Aws\Result listResourceEndpointAssociations(array{
 *     resourceConfigurationIdentifier?: string,
 *     resourceEndpointAssociationIdentifier?: string,
 *     vpcEndpointId?: string,
 *     vpcEndpointOwner?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceEndpointAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceEndpointAssociationsAsync(array{
 *     resourceConfigurationIdentifier?: string,
 *     resourceEndpointAssociationIdentifier?: string,
 *     vpcEndpointId?: string,
 *     vpcEndpointOwner?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceGateways(array $args = [])
 * @phpstan-method \Aws\Result listResourceGateways(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceGatewaysAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRules(array $args = [])
 * @phpstan-method \Aws\Result listRules(array{serviceIdentifier?: string, listenerIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesAsync(array{serviceIdentifier?: string, listenerIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceNetworkResourceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listServiceNetworkResourceAssociations(array{
 *     serviceNetworkIdentifier?: string,
 *     resourceConfigurationIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     includeChildren?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceNetworkResourceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceNetworkResourceAssociationsAsync(array{
 *     serviceNetworkIdentifier?: string,
 *     resourceConfigurationIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     includeChildren?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceNetworkServiceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listServiceNetworkServiceAssociations(array{
 *     serviceNetworkIdentifier?: string,
 *     serviceIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceNetworkServiceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceNetworkServiceAssociationsAsync(array{
 *     serviceNetworkIdentifier?: string,
 *     serviceIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceNetworkVpcAssociations(array $args = [])
 * @phpstan-method \Aws\Result listServiceNetworkVpcAssociations(array{serviceNetworkIdentifier?: string, vpcIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceNetworkVpcAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceNetworkVpcAssociationsAsync(array{serviceNetworkIdentifier?: string, vpcIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceNetworkVpcEndpointAssociations(array $args = [])
 * @phpstan-method \Aws\Result listServiceNetworkVpcEndpointAssociations(array{serviceNetworkIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceNetworkVpcEndpointAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceNetworkVpcEndpointAssociationsAsync(array{serviceNetworkIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceNetworks(array $args = [])
 * @phpstan-method \Aws\Result listServiceNetworks(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceNetworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceNetworksAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTargetGroups(array $args = [])
 * @phpstan-method \Aws\Result listTargetGroups(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     vpcIdentifier?: string,
 *     targetGroupType?: 'ALB'|'INSTANCE'|'IP'|'LAMBDA',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetGroupsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     vpcIdentifier?: string,
 *     targetGroupType?: 'ALB'|'INSTANCE'|'IP'|'LAMBDA',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTargets(array $args = [])
 * @phpstan-method \Aws\Result listTargets(array{
 *     targetGroupIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     targets?: list<array{id?: string, port?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetsAsync(array{
 *     targetGroupIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     targets?: list<array{id?: string, port?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAuthPolicy(array $args = [])
 * @phpstan-method \Aws\Result putAuthPolicy(array{resourceIdentifier?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAuthPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAuthPolicyAsync(array{resourceIdentifier?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{resourceArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{resourceArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result registerTargets(array $args = [])
 * @phpstan-method \Aws\Result registerTargets(array{targetGroupIdentifier?: string, targets?: list<array{id?: string, port?: int, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerTargetsAsync(array{targetGroupIdentifier?: string, targets?: list<array{id?: string, port?: int, ...}>, ...} $args = [])
 * @method \Aws\Result startDomainVerification(array $args = [])
 * @phpstan-method \Aws\Result startDomainVerification(array{clientToken?: string, domainName?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDomainVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDomainVerificationAsync(array{clientToken?: string, domainName?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccessLogSubscription(array $args = [])
 * @phpstan-method \Aws\Result updateAccessLogSubscription(array{accessLogSubscriptionIdentifier?: string, destinationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessLogSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessLogSubscriptionAsync(array{accessLogSubscriptionIdentifier?: string, destinationArn?: string, ...} $args = [])
 * @method \Aws\Result updateListener(array $args = [])
 * @phpstan-method \Aws\Result updateListener(array{
 *     serviceIdentifier?: string,
 *     listenerIdentifier?: string,
 *     defaultAction?: array{forward?: array{targetGroups?: list<array>, ...}, fixedResponse?: array{statusCode?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateListenerAsync(array{
 *     serviceIdentifier?: string,
 *     listenerIdentifier?: string,
 *     defaultAction?: array{forward?: array{targetGroups?: list<array>, ...}, fixedResponse?: array{statusCode?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResourceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateResourceConfiguration(array{
 *     resourceConfigurationIdentifier?: string,
 *     resourceConfigurationDefinition?: array{
 *         dnsResource?: array{domainName?: string, ipAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...},
 *         ipResource?: array{ipAddress?: string, ...},
 *         arnResource?: array{arn?: string, ...},
 *         ...,
 *     },
 *     allowAssociationToShareableServiceNetwork?: bool,
 *     portRanges?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceConfigurationAsync(array{
 *     resourceConfigurationIdentifier?: string,
 *     resourceConfigurationDefinition?: array{
 *         dnsResource?: array{domainName?: string, ipAddressType?: 'DUALSTACK'|'IPV4'|'IPV6', ...},
 *         ipResource?: array{ipAddress?: string, ...},
 *         arnResource?: array{arn?: string, ...},
 *         ...,
 *     },
 *     allowAssociationToShareableServiceNetwork?: bool,
 *     portRanges?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResourceGateway(array $args = [])
 * @phpstan-method \Aws\Result updateResourceGateway(array{resourceGatewayIdentifier?: string, securityGroupIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceGatewayAsync(array{resourceGatewayIdentifier?: string, securityGroupIds?: list<string>, ...} $args = [])
 * @method \Aws\Result updateRule(array $args = [])
 * @phpstan-method \Aws\Result updateRule(array{
 *     serviceIdentifier?: string,
 *     listenerIdentifier?: string,
 *     ruleIdentifier?: string,
 *     match?: array{httpMatch?: array{method?: string, pathMatch?: array, headerMatches?: list<array>, ...}, ...},
 *     priority?: int,
 *     action?: array{forward?: array{targetGroups?: list<array>, ...}, fixedResponse?: array{statusCode?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleAsync(array{
 *     serviceIdentifier?: string,
 *     listenerIdentifier?: string,
 *     ruleIdentifier?: string,
 *     match?: array{httpMatch?: array{method?: string, pathMatch?: array, headerMatches?: list<array>, ...}, ...},
 *     priority?: int,
 *     action?: array{forward?: array{targetGroups?: list<array>, ...}, fixedResponse?: array{statusCode?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateService(array $args = [])
 * @phpstan-method \Aws\Result updateService(array{
 *     serviceIdentifier?: string,
 *     certificateArn?: string,
 *     authType?: 'AWS_IAM'|'NONE',
 *     idleTimeoutSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceAsync(array{
 *     serviceIdentifier?: string,
 *     certificateArn?: string,
 *     authType?: 'AWS_IAM'|'NONE',
 *     idleTimeoutSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceNetwork(array $args = [])
 * @phpstan-method \Aws\Result updateServiceNetwork(array{serviceNetworkIdentifier?: string, authType?: 'AWS_IAM'|'NONE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceNetworkAsync(array{serviceNetworkIdentifier?: string, authType?: 'AWS_IAM'|'NONE', ...} $args = [])
 * @method \Aws\Result updateServiceNetworkVpcAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateServiceNetworkVpcAssociation(array{serviceNetworkVpcAssociationIdentifier?: string, securityGroupIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceNetworkVpcAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceNetworkVpcAssociationAsync(array{serviceNetworkVpcAssociationIdentifier?: string, securityGroupIds?: list<string>, ...} $args = [])
 * @method \Aws\Result updateTargetGroup(array $args = [])
 * @phpstan-method \Aws\Result updateTargetGroup(array{
 *     targetGroupIdentifier?: string,
 *     healthCheck?: array{
 *         enabled?: bool,
 *         protocol?: 'HTTP'|'HTTPS'|'TCP',
 *         protocolVersion?: 'HTTP1'|'HTTP2',
 *         port?: int,
 *         path?: string,
 *         healthCheckIntervalSeconds?: int,
 *         healthCheckTimeoutSeconds?: int,
 *         healthyThresholdCount?: int,
 *         unhealthyThresholdCount?: int,
 *         matcher?: array{httpCode?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTargetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTargetGroupAsync(array{
 *     targetGroupIdentifier?: string,
 *     healthCheck?: array{
 *         enabled?: bool,
 *         protocol?: 'HTTP'|'HTTPS'|'TCP',
 *         protocolVersion?: 'HTTP1'|'HTTP2',
 *         port?: int,
 *         path?: string,
 *         healthCheckIntervalSeconds?: int,
 *         healthCheckTimeoutSeconds?: int,
 *         healthyThresholdCount?: int,
 *         unhealthyThresholdCount?: int,
 *         matcher?: array{httpCode?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class VPCLatticeClient extends AwsClient {}
