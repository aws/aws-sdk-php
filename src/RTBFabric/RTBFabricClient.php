<?php
namespace Aws\RTBFabric;

use Aws\AwsClient;

/**
 * This client is used to interact with the **RTBFabric** service.
 * @method \Aws\Result acceptLink(array $args = [])
 * @phpstan-method \Aws\Result acceptLink(array{
 *     gatewayId?: string,
 *     linkId?: string,
 *     attributes?: array{responderErrorMasking?: list<array>, customerProvidedId?: string, ...},
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     timeoutInMillis?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptLinkAsync(array{
 *     gatewayId?: string,
 *     linkId?: string,
 *     attributes?: array{responderErrorMasking?: list<array>, customerProvidedId?: string, ...},
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     timeoutInMillis?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateCertificate(array $args = [])
 * @phpstan-method \Aws\Result associateCertificate(array{gatewayId?: string, acmCertificateArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateCertificateAsync(array{gatewayId?: string, acmCertificateArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createInboundExternalLink(array $args = [])
 * @phpstan-method \Aws\Result createInboundExternalLink(array{
 *     clientToken?: string,
 *     gatewayId?: string,
 *     attributes?: array{responderErrorMasking?: list<array>, customerProvidedId?: string, ...},
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInboundExternalLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInboundExternalLinkAsync(array{
 *     clientToken?: string,
 *     gatewayId?: string,
 *     attributes?: array{responderErrorMasking?: list<array>, customerProvidedId?: string, ...},
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLink(array $args = [])
 * @phpstan-method \Aws\Result createLink(array{
 *     gatewayId?: string,
 *     peerGatewayId?: string,
 *     attributes?: array{responderErrorMasking?: list<array>, customerProvidedId?: string, ...},
 *     httpResponderAllowed?: bool,
 *     tags?: array<string, string>,
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     timeoutInMillis?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLinkAsync(array{
 *     gatewayId?: string,
 *     peerGatewayId?: string,
 *     attributes?: array{responderErrorMasking?: list<array>, customerProvidedId?: string, ...},
 *     httpResponderAllowed?: bool,
 *     tags?: array<string, string>,
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     timeoutInMillis?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLinkRoutingRule(array $args = [])
 * @phpstan-method \Aws\Result createLinkRoutingRule(array{
 *     clientToken?: string,
 *     gatewayId?: string,
 *     linkId?: string,
 *     priority?: int,
 *     conditions?: array{
 *         hostHeader?: string,
 *         hostHeaderWildcard?: string,
 *         pathPrefix?: string,
 *         pathExact?: string,
 *         queryStringEquals?: array{key?: string, value?: string, ...},
 *         queryStringExists?: string,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLinkRoutingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLinkRoutingRuleAsync(array{
 *     clientToken?: string,
 *     gatewayId?: string,
 *     linkId?: string,
 *     priority?: int,
 *     conditions?: array{
 *         hostHeader?: string,
 *         hostHeaderWildcard?: string,
 *         pathPrefix?: string,
 *         pathExact?: string,
 *         queryStringEquals?: array{key?: string, value?: string, ...},
 *         queryStringExists?: string,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOutboundExternalLink(array $args = [])
 * @phpstan-method \Aws\Result createOutboundExternalLink(array{
 *     clientToken?: string,
 *     gatewayId?: string,
 *     attributes?: array{responderErrorMasking?: list<array>, customerProvidedId?: string, ...},
 *     publicEndpoint?: string,
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOutboundExternalLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOutboundExternalLinkAsync(array{
 *     clientToken?: string,
 *     gatewayId?: string,
 *     attributes?: array{responderErrorMasking?: list<array>, customerProvidedId?: string, ...},
 *     publicEndpoint?: string,
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRequesterGateway(array $args = [])
 * @phpstan-method \Aws\Result createRequesterGateway(array{
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     clientToken?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRequesterGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRequesterGatewayAsync(array{
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     clientToken?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResponderGateway(array $args = [])
 * @phpstan-method \Aws\Result createResponderGateway(array{
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     domainName?: string,
 *     port?: int,
 *     protocol?: 'HTTP'|'HTTPS',
 *     listenerConfig?: array{protocols?: list<'HTTP'|'HTTPS'>, ...},
 *     trustStoreConfiguration?: array{certificateAuthorityCertificates?: list<string>, ...},
 *     managedEndpointConfiguration?: array{
 *         autoScalingGroups?: array{autoScalingGroupNames?: list<string>, roleArn?: string, healthCheckConfig?: array, ...},
 *         eksEndpoints?: array{
 *             endpointsResourceName?: string,
 *             endpointsResourceNamespace?: string,
 *             clusterApiServerEndpointUri?: string,
 *             clusterApiServerCaCertificateChain?: string,
 *             clusterName?: string,
 *             roleArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     gatewayType?: 'EXTERNAL'|'INTERNAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResponderGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResponderGatewayAsync(array{
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     domainName?: string,
 *     port?: int,
 *     protocol?: 'HTTP'|'HTTPS',
 *     listenerConfig?: array{protocols?: list<'HTTP'|'HTTPS'>, ...},
 *     trustStoreConfiguration?: array{certificateAuthorityCertificates?: list<string>, ...},
 *     managedEndpointConfiguration?: array{
 *         autoScalingGroups?: array{autoScalingGroupNames?: list<string>, roleArn?: string, healthCheckConfig?: array, ...},
 *         eksEndpoints?: array{
 *             endpointsResourceName?: string,
 *             endpointsResourceNamespace?: string,
 *             clusterApiServerEndpointUri?: string,
 *             clusterApiServerCaCertificateChain?: string,
 *             clusterName?: string,
 *             roleArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     gatewayType?: 'EXTERNAL'|'INTERNAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteInboundExternalLink(array $args = [])
 * @phpstan-method \Aws\Result deleteInboundExternalLink(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInboundExternalLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInboundExternalLinkAsync(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \Aws\Result deleteLink(array $args = [])
 * @phpstan-method \Aws\Result deleteLink(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLinkAsync(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \Aws\Result deleteLinkRoutingRule(array $args = [])
 * @phpstan-method \Aws\Result deleteLinkRoutingRule(array{gatewayId?: string, linkId?: string, ruleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLinkRoutingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLinkRoutingRuleAsync(array{gatewayId?: string, linkId?: string, ruleId?: string, ...} $args = [])
 * @method \Aws\Result deleteOutboundExternalLink(array $args = [])
 * @phpstan-method \Aws\Result deleteOutboundExternalLink(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOutboundExternalLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOutboundExternalLinkAsync(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \Aws\Result deleteRequesterGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteRequesterGateway(array{gatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRequesterGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRequesterGatewayAsync(array{gatewayId?: string, ...} $args = [])
 * @method \Aws\Result deleteResponderGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteResponderGateway(array{gatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResponderGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResponderGatewayAsync(array{gatewayId?: string, ...} $args = [])
 * @method \Aws\Result disassociateCertificate(array $args = [])
 * @phpstan-method \Aws\Result disassociateCertificate(array{gatewayId?: string, acmCertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateCertificateAsync(array{gatewayId?: string, acmCertificateArn?: string, ...} $args = [])
 * @method \Aws\Result getCertificateAssociation(array $args = [])
 * @phpstan-method \Aws\Result getCertificateAssociation(array{gatewayId?: string, acmCertificateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCertificateAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCertificateAssociationAsync(array{gatewayId?: string, acmCertificateArn?: string, ...} $args = [])
 * @method \Aws\Result getInboundExternalLink(array $args = [])
 * @phpstan-method \Aws\Result getInboundExternalLink(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInboundExternalLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInboundExternalLinkAsync(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \Aws\Result getLink(array $args = [])
 * @phpstan-method \Aws\Result getLink(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLinkAsync(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \Aws\Result getLinkRoutingRule(array $args = [])
 * @phpstan-method \Aws\Result getLinkRoutingRule(array{gatewayId?: string, linkId?: string, ruleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkRoutingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLinkRoutingRuleAsync(array{gatewayId?: string, linkId?: string, ruleId?: string, ...} $args = [])
 * @method \Aws\Result getOutboundExternalLink(array $args = [])
 * @phpstan-method \Aws\Result getOutboundExternalLink(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOutboundExternalLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOutboundExternalLinkAsync(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \Aws\Result getRequesterGateway(array $args = [])
 * @phpstan-method \Aws\Result getRequesterGateway(array{gatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRequesterGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRequesterGatewayAsync(array{gatewayId?: string, ...} $args = [])
 * @method \Aws\Result getResponderGateway(array $args = [])
 * @phpstan-method \Aws\Result getResponderGateway(array{gatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResponderGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResponderGatewayAsync(array{gatewayId?: string, ...} $args = [])
 * @method \Aws\Result listCertificateAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCertificateAssociations(array{gatewayId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificateAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificateAssociationsAsync(array{gatewayId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listLinkRoutingRules(array $args = [])
 * @phpstan-method \Aws\Result listLinkRoutingRules(array{gatewayId?: string, linkId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLinkRoutingRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLinkRoutingRulesAsync(array{gatewayId?: string, linkId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listLinks(array $args = [])
 * @phpstan-method \Aws\Result listLinks(array{gatewayId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLinksAsync(array{gatewayId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listRequesterGateways(array $args = [])
 * @phpstan-method \Aws\Result listRequesterGateways(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRequesterGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRequesterGatewaysAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listResponderGateways(array $args = [])
 * @phpstan-method \Aws\Result listResponderGateways(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResponderGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResponderGatewaysAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result rejectLink(array $args = [])
 * @phpstan-method \Aws\Result rejectLink(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectLinkAsync(array{gatewayId?: string, linkId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateLink(array $args = [])
 * @phpstan-method \Aws\Result updateLink(array{
 *     gatewayId?: string,
 *     linkId?: string,
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     timeoutInMillis?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLinkAsync(array{
 *     gatewayId?: string,
 *     linkId?: string,
 *     logSettings?: array{applicationLogs?: array{sampling?: array, ...}, ...},
 *     timeoutInMillis?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLinkModuleFlow(array $args = [])
 * @phpstan-method \Aws\Result updateLinkModuleFlow(array{
 *     clientToken?: string,
 *     gatewayId?: string,
 *     linkId?: string,
 *     modules?: list<array{version?: string, name?: string, dependsOn?: list<string>, moduleParameters?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLinkModuleFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLinkModuleFlowAsync(array{
 *     clientToken?: string,
 *     gatewayId?: string,
 *     linkId?: string,
 *     modules?: list<array{version?: string, name?: string, dependsOn?: list<string>, moduleParameters?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLinkRoutingRule(array $args = [])
 * @phpstan-method \Aws\Result updateLinkRoutingRule(array{
 *     gatewayId?: string,
 *     linkId?: string,
 *     ruleId?: string,
 *     priority?: int,
 *     conditions?: array{
 *         hostHeader?: string,
 *         hostHeaderWildcard?: string,
 *         pathPrefix?: string,
 *         pathExact?: string,
 *         queryStringEquals?: array{key?: string, value?: string, ...},
 *         queryStringExists?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLinkRoutingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLinkRoutingRuleAsync(array{
 *     gatewayId?: string,
 *     linkId?: string,
 *     ruleId?: string,
 *     priority?: int,
 *     conditions?: array{
 *         hostHeader?: string,
 *         hostHeaderWildcard?: string,
 *         pathPrefix?: string,
 *         pathExact?: string,
 *         queryStringEquals?: array{key?: string, value?: string, ...},
 *         queryStringExists?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRequesterGateway(array $args = [])
 * @phpstan-method \Aws\Result updateRequesterGateway(array{clientToken?: string, gatewayId?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRequesterGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRequesterGatewayAsync(array{clientToken?: string, gatewayId?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateResponderGateway(array $args = [])
 * @phpstan-method \Aws\Result updateResponderGateway(array{
 *     domainName?: string,
 *     port?: int,
 *     protocol?: 'HTTP'|'HTTPS',
 *     listenerConfig?: array{protocols?: list<'HTTP'|'HTTPS'>, ...},
 *     trustStoreConfiguration?: array{certificateAuthorityCertificates?: list<string>, ...},
 *     managedEndpointConfiguration?: array{
 *         autoScalingGroups?: array{autoScalingGroupNames?: list<string>, roleArn?: string, healthCheckConfig?: array, ...},
 *         eksEndpoints?: array{
 *             endpointsResourceName?: string,
 *             endpointsResourceNamespace?: string,
 *             clusterApiServerEndpointUri?: string,
 *             clusterApiServerCaCertificateChain?: string,
 *             clusterName?: string,
 *             roleArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     gatewayId?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResponderGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResponderGatewayAsync(array{
 *     domainName?: string,
 *     port?: int,
 *     protocol?: 'HTTP'|'HTTPS',
 *     listenerConfig?: array{protocols?: list<'HTTP'|'HTTPS'>, ...},
 *     trustStoreConfiguration?: array{certificateAuthorityCertificates?: list<string>, ...},
 *     managedEndpointConfiguration?: array{
 *         autoScalingGroups?: array{autoScalingGroupNames?: list<string>, roleArn?: string, healthCheckConfig?: array, ...},
 *         eksEndpoints?: array{
 *             endpointsResourceName?: string,
 *             endpointsResourceNamespace?: string,
 *             clusterApiServerEndpointUri?: string,
 *             clusterApiServerCaCertificateChain?: string,
 *             clusterName?: string,
 *             roleArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     gatewayId?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 */
class RTBFabricClient extends AwsClient {}
