<?php
namespace Aws\GlobalAccelerator;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Global Accelerator** service.
 * @method \Aws\Result addCustomRoutingEndpoints(array $args = [])
 * @phpstan-method \Aws\Result addCustomRoutingEndpoints(array{
 *     EndpointConfigurations?: list<array{EndpointId?: string, AttachmentArn?: string, ...}>,
 *     EndpointGroupArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addCustomRoutingEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addCustomRoutingEndpointsAsync(array{
 *     EndpointConfigurations?: list<array{EndpointId?: string, AttachmentArn?: string, ...}>,
 *     EndpointGroupArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addEndpoints(array $args = [])
 * @phpstan-method \Aws\Result addEndpoints(array{
 *     EndpointConfigurations?: list<array{EndpointId?: string, Weight?: int, ClientIPPreservationEnabled?: bool, AttachmentArn?: string, ...}>,
 *     EndpointGroupArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addEndpointsAsync(array{
 *     EndpointConfigurations?: list<array{EndpointId?: string, Weight?: int, ClientIPPreservationEnabled?: bool, AttachmentArn?: string, ...}>,
 *     EndpointGroupArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result advertiseByoipCidr(array $args = [])
 * @phpstan-method \Aws\Result advertiseByoipCidr(array{Cidr?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise advertiseByoipCidrAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise advertiseByoipCidrAsync(array{Cidr?: string, ...} $args = [])
 * @method \Aws\Result allowCustomRoutingTraffic(array $args = [])
 * @phpstan-method \Aws\Result allowCustomRoutingTraffic(array{
 *     EndpointGroupArn?: string,
 *     EndpointId?: string,
 *     DestinationAddresses?: list<string>,
 *     DestinationPorts?: list<int>,
 *     AllowAllTrafficToEndpoint?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise allowCustomRoutingTrafficAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise allowCustomRoutingTrafficAsync(array{
 *     EndpointGroupArn?: string,
 *     EndpointId?: string,
 *     DestinationAddresses?: list<string>,
 *     DestinationPorts?: list<int>,
 *     AllowAllTrafficToEndpoint?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccelerator(array $args = [])
 * @phpstan-method \Aws\Result createAccelerator(array{
 *     Name?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4',
 *     IpAddresses?: list<string>,
 *     Enabled?: bool,
 *     IdempotencyToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAcceleratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAcceleratorAsync(array{
 *     Name?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4',
 *     IpAddresses?: list<string>,
 *     Enabled?: bool,
 *     IdempotencyToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCrossAccountAttachment(array $args = [])
 * @phpstan-method \Aws\Result createCrossAccountAttachment(array{
 *     Name?: string,
 *     Principals?: list<string>,
 *     Resources?: list<array{EndpointId?: string, Cidr?: string, Region?: string, ...}>,
 *     IdempotencyToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCrossAccountAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCrossAccountAttachmentAsync(array{
 *     Name?: string,
 *     Principals?: list<string>,
 *     Resources?: list<array{EndpointId?: string, Cidr?: string, Region?: string, ...}>,
 *     IdempotencyToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomRoutingAccelerator(array $args = [])
 * @phpstan-method \Aws\Result createCustomRoutingAccelerator(array{
 *     Name?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4',
 *     IpAddresses?: list<string>,
 *     Enabled?: bool,
 *     IdempotencyToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomRoutingAcceleratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomRoutingAcceleratorAsync(array{
 *     Name?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4',
 *     IpAddresses?: list<string>,
 *     Enabled?: bool,
 *     IdempotencyToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomRoutingEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result createCustomRoutingEndpointGroup(array{
 *     ListenerArn?: string,
 *     EndpointGroupRegion?: string,
 *     DestinationConfigurations?: list<array{FromPort?: int, ToPort?: int, Protocols?: list<'TCP'|'UDP'>, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomRoutingEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomRoutingEndpointGroupAsync(array{
 *     ListenerArn?: string,
 *     EndpointGroupRegion?: string,
 *     DestinationConfigurations?: list<array{FromPort?: int, ToPort?: int, Protocols?: list<'TCP'|'UDP'>, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomRoutingListener(array $args = [])
 * @phpstan-method \Aws\Result createCustomRoutingListener(array{
 *     AcceleratorArn?: string,
 *     PortRanges?: list<array{FromPort?: int, ToPort?: int, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomRoutingListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomRoutingListenerAsync(array{
 *     AcceleratorArn?: string,
 *     PortRanges?: list<array{FromPort?: int, ToPort?: int, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result createEndpointGroup(array{
 *     ListenerArn?: string,
 *     EndpointGroupRegion?: string,
 *     EndpointConfigurations?: list<array{EndpointId?: string, Weight?: int, ClientIPPreservationEnabled?: bool, AttachmentArn?: string, ...}>,
 *     TrafficDialPercentage?: float,
 *     HealthCheckPort?: int,
 *     HealthCheckProtocol?: 'HTTP'|'HTTPS'|'TCP',
 *     HealthCheckPath?: string,
 *     HealthCheckIntervalSeconds?: int,
 *     ThresholdCount?: int,
 *     IdempotencyToken?: string,
 *     PortOverrides?: list<array{ListenerPort?: int, EndpointPort?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointGroupAsync(array{
 *     ListenerArn?: string,
 *     EndpointGroupRegion?: string,
 *     EndpointConfigurations?: list<array{EndpointId?: string, Weight?: int, ClientIPPreservationEnabled?: bool, AttachmentArn?: string, ...}>,
 *     TrafficDialPercentage?: float,
 *     HealthCheckPort?: int,
 *     HealthCheckProtocol?: 'HTTP'|'HTTPS'|'TCP',
 *     HealthCheckPath?: string,
 *     HealthCheckIntervalSeconds?: int,
 *     ThresholdCount?: int,
 *     IdempotencyToken?: string,
 *     PortOverrides?: list<array{ListenerPort?: int, EndpointPort?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createListener(array $args = [])
 * @phpstan-method \Aws\Result createListener(array{
 *     AcceleratorArn?: string,
 *     PortRanges?: list<array{FromPort?: int, ToPort?: int, ...}>,
 *     Protocol?: 'TCP'|'UDP',
 *     ClientAffinity?: 'NONE'|'SOURCE_IP',
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createListenerAsync(array{
 *     AcceleratorArn?: string,
 *     PortRanges?: list<array{FromPort?: int, ToPort?: int, ...}>,
 *     Protocol?: 'TCP'|'UDP',
 *     ClientAffinity?: 'NONE'|'SOURCE_IP',
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccelerator(array $args = [])
 * @phpstan-method \Aws\Result deleteAccelerator(array{AcceleratorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAcceleratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAcceleratorAsync(array{AcceleratorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCrossAccountAttachment(array $args = [])
 * @phpstan-method \Aws\Result deleteCrossAccountAttachment(array{AttachmentArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCrossAccountAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCrossAccountAttachmentAsync(array{AttachmentArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomRoutingAccelerator(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomRoutingAccelerator(array{AcceleratorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomRoutingAcceleratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomRoutingAcceleratorAsync(array{AcceleratorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomRoutingEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomRoutingEndpointGroup(array{EndpointGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomRoutingEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomRoutingEndpointGroupAsync(array{EndpointGroupArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomRoutingListener(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomRoutingListener(array{ListenerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomRoutingListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomRoutingListenerAsync(array{ListenerArn?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpointGroup(array{EndpointGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointGroupAsync(array{EndpointGroupArn?: string, ...} $args = [])
 * @method \Aws\Result deleteListener(array $args = [])
 * @phpstan-method \Aws\Result deleteListener(array{ListenerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteListenerAsync(array{ListenerArn?: string, ...} $args = [])
 * @method \Aws\Result denyCustomRoutingTraffic(array $args = [])
 * @phpstan-method \Aws\Result denyCustomRoutingTraffic(array{
 *     EndpointGroupArn?: string,
 *     EndpointId?: string,
 *     DestinationAddresses?: list<string>,
 *     DestinationPorts?: list<int>,
 *     DenyAllTrafficToEndpoint?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise denyCustomRoutingTrafficAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise denyCustomRoutingTrafficAsync(array{
 *     EndpointGroupArn?: string,
 *     EndpointId?: string,
 *     DestinationAddresses?: list<string>,
 *     DestinationPorts?: list<int>,
 *     DenyAllTrafficToEndpoint?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deprovisionByoipCidr(array $args = [])
 * @phpstan-method \Aws\Result deprovisionByoipCidr(array{Cidr?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deprovisionByoipCidrAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deprovisionByoipCidrAsync(array{Cidr?: string, ...} $args = [])
 * @method \Aws\Result describeAccelerator(array $args = [])
 * @phpstan-method \Aws\Result describeAccelerator(array{AcceleratorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAcceleratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAcceleratorAsync(array{AcceleratorArn?: string, ...} $args = [])
 * @method \Aws\Result describeAcceleratorAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeAcceleratorAttributes(array{AcceleratorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAcceleratorAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAcceleratorAttributesAsync(array{AcceleratorArn?: string, ...} $args = [])
 * @method \Aws\Result describeCrossAccountAttachment(array $args = [])
 * @phpstan-method \Aws\Result describeCrossAccountAttachment(array{AttachmentArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCrossAccountAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCrossAccountAttachmentAsync(array{AttachmentArn?: string, ...} $args = [])
 * @method \Aws\Result describeCustomRoutingAccelerator(array $args = [])
 * @phpstan-method \Aws\Result describeCustomRoutingAccelerator(array{AcceleratorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomRoutingAcceleratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomRoutingAcceleratorAsync(array{AcceleratorArn?: string, ...} $args = [])
 * @method \Aws\Result describeCustomRoutingAcceleratorAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeCustomRoutingAcceleratorAttributes(array{AcceleratorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomRoutingAcceleratorAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomRoutingAcceleratorAttributesAsync(array{AcceleratorArn?: string, ...} $args = [])
 * @method \Aws\Result describeCustomRoutingEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result describeCustomRoutingEndpointGroup(array{EndpointGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomRoutingEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomRoutingEndpointGroupAsync(array{EndpointGroupArn?: string, ...} $args = [])
 * @method \Aws\Result describeCustomRoutingListener(array $args = [])
 * @phpstan-method \Aws\Result describeCustomRoutingListener(array{ListenerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomRoutingListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomRoutingListenerAsync(array{ListenerArn?: string, ...} $args = [])
 * @method \Aws\Result describeEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result describeEndpointGroup(array{EndpointGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointGroupAsync(array{EndpointGroupArn?: string, ...} $args = [])
 * @method \Aws\Result describeListener(array $args = [])
 * @phpstan-method \Aws\Result describeListener(array{ListenerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeListenerAsync(array{ListenerArn?: string, ...} $args = [])
 * @method \Aws\Result listAccelerators(array $args = [])
 * @phpstan-method \Aws\Result listAccelerators(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAcceleratorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAcceleratorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listByoipCidrs(array $args = [])
 * @phpstan-method \Aws\Result listByoipCidrs(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listByoipCidrsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listByoipCidrsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCrossAccountAttachments(array $args = [])
 * @phpstan-method \Aws\Result listCrossAccountAttachments(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCrossAccountAttachmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCrossAccountAttachmentsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCrossAccountResourceAccounts(array $args = [])
 * @phpstan-method \Aws\Result listCrossAccountResourceAccounts(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCrossAccountResourceAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCrossAccountResourceAccountsAsync(array{...} $args = [])
 * @method \Aws\Result listCrossAccountResources(array $args = [])
 * @phpstan-method \Aws\Result listCrossAccountResources(array{AcceleratorArn?: string, ResourceOwnerAwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCrossAccountResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCrossAccountResourcesAsync(array{AcceleratorArn?: string, ResourceOwnerAwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomRoutingAccelerators(array $args = [])
 * @phpstan-method \Aws\Result listCustomRoutingAccelerators(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomRoutingAcceleratorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomRoutingAcceleratorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomRoutingEndpointGroups(array $args = [])
 * @phpstan-method \Aws\Result listCustomRoutingEndpointGroups(array{ListenerArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomRoutingEndpointGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomRoutingEndpointGroupsAsync(array{ListenerArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomRoutingListeners(array $args = [])
 * @phpstan-method \Aws\Result listCustomRoutingListeners(array{AcceleratorArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomRoutingListenersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomRoutingListenersAsync(array{AcceleratorArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomRoutingPortMappings(array $args = [])
 * @phpstan-method \Aws\Result listCustomRoutingPortMappings(array{AcceleratorArn?: string, EndpointGroupArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomRoutingPortMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomRoutingPortMappingsAsync(array{AcceleratorArn?: string, EndpointGroupArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomRoutingPortMappingsByDestination(array $args = [])
 * @phpstan-method \Aws\Result listCustomRoutingPortMappingsByDestination(array{EndpointId?: string, DestinationAddress?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomRoutingPortMappingsByDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomRoutingPortMappingsByDestinationAsync(array{EndpointId?: string, DestinationAddress?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEndpointGroups(array $args = [])
 * @phpstan-method \Aws\Result listEndpointGroups(array{ListenerArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEndpointGroupsAsync(array{ListenerArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listListeners(array $args = [])
 * @phpstan-method \Aws\Result listListeners(array{AcceleratorArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listListenersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listListenersAsync(array{AcceleratorArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result provisionByoipCidr(array $args = [])
 * @phpstan-method \Aws\Result provisionByoipCidr(array{Cidr?: string, CidrAuthorizationContext?: array{Message?: string, Signature?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise provisionByoipCidrAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise provisionByoipCidrAsync(array{Cidr?: string, CidrAuthorizationContext?: array{Message?: string, Signature?: string, ...}, ...} $args = [])
 * @method \Aws\Result removeCustomRoutingEndpoints(array $args = [])
 * @phpstan-method \Aws\Result removeCustomRoutingEndpoints(array{EndpointIds?: list<string>, EndpointGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeCustomRoutingEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeCustomRoutingEndpointsAsync(array{EndpointIds?: list<string>, EndpointGroupArn?: string, ...} $args = [])
 * @method \Aws\Result removeEndpoints(array $args = [])
 * @phpstan-method \Aws\Result removeEndpoints(array{
 *     EndpointIdentifiers?: list<array{EndpointId?: string, ClientIPPreservationEnabled?: bool, ...}>,
 *     EndpointGroupArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeEndpointsAsync(array{
 *     EndpointIdentifiers?: list<array{EndpointId?: string, ClientIPPreservationEnabled?: bool, ...}>,
 *     EndpointGroupArn?: string,
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
 * @method \Aws\Result updateAccelerator(array $args = [])
 * @phpstan-method \Aws\Result updateAccelerator(array{
 *     AcceleratorArn?: string,
 *     Name?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4',
 *     IpAddresses?: list<string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAcceleratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAcceleratorAsync(array{
 *     AcceleratorArn?: string,
 *     Name?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4',
 *     IpAddresses?: list<string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAcceleratorAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateAcceleratorAttributes(array{
 *     AcceleratorArn?: string,
 *     FlowLogsEnabled?: bool,
 *     FlowLogsS3Bucket?: string,
 *     FlowLogsS3Prefix?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAcceleratorAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAcceleratorAttributesAsync(array{
 *     AcceleratorArn?: string,
 *     FlowLogsEnabled?: bool,
 *     FlowLogsS3Bucket?: string,
 *     FlowLogsS3Prefix?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCrossAccountAttachment(array $args = [])
 * @phpstan-method \Aws\Result updateCrossAccountAttachment(array{
 *     AttachmentArn?: string,
 *     Name?: string,
 *     AddPrincipals?: list<string>,
 *     RemovePrincipals?: list<string>,
 *     AddResources?: list<array{EndpointId?: string, Cidr?: string, Region?: string, ...}>,
 *     RemoveResources?: list<array{EndpointId?: string, Cidr?: string, Region?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCrossAccountAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCrossAccountAttachmentAsync(array{
 *     AttachmentArn?: string,
 *     Name?: string,
 *     AddPrincipals?: list<string>,
 *     RemovePrincipals?: list<string>,
 *     AddResources?: list<array{EndpointId?: string, Cidr?: string, Region?: string, ...}>,
 *     RemoveResources?: list<array{EndpointId?: string, Cidr?: string, Region?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCustomRoutingAccelerator(array $args = [])
 * @phpstan-method \Aws\Result updateCustomRoutingAccelerator(array{
 *     AcceleratorArn?: string,
 *     Name?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4',
 *     IpAddresses?: list<string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomRoutingAcceleratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomRoutingAcceleratorAsync(array{
 *     AcceleratorArn?: string,
 *     Name?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4',
 *     IpAddresses?: list<string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCustomRoutingAcceleratorAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateCustomRoutingAcceleratorAttributes(array{
 *     AcceleratorArn?: string,
 *     FlowLogsEnabled?: bool,
 *     FlowLogsS3Bucket?: string,
 *     FlowLogsS3Prefix?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomRoutingAcceleratorAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomRoutingAcceleratorAttributesAsync(array{
 *     AcceleratorArn?: string,
 *     FlowLogsEnabled?: bool,
 *     FlowLogsS3Bucket?: string,
 *     FlowLogsS3Prefix?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCustomRoutingListener(array $args = [])
 * @phpstan-method \Aws\Result updateCustomRoutingListener(array{ListenerArn?: string, PortRanges?: list<array{FromPort?: int, ToPort?: int, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomRoutingListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomRoutingListenerAsync(array{ListenerArn?: string, PortRanges?: list<array{FromPort?: int, ToPort?: int, ...}>, ...} $args = [])
 * @method \Aws\Result updateEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result updateEndpointGroup(array{
 *     EndpointGroupArn?: string,
 *     EndpointConfigurations?: list<array{EndpointId?: string, Weight?: int, ClientIPPreservationEnabled?: bool, AttachmentArn?: string, ...}>,
 *     TrafficDialPercentage?: float,
 *     HealthCheckPort?: int,
 *     HealthCheckProtocol?: 'HTTP'|'HTTPS'|'TCP',
 *     HealthCheckPath?: string,
 *     HealthCheckIntervalSeconds?: int,
 *     ThresholdCount?: int,
 *     PortOverrides?: list<array{ListenerPort?: int, EndpointPort?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEndpointGroupAsync(array{
 *     EndpointGroupArn?: string,
 *     EndpointConfigurations?: list<array{EndpointId?: string, Weight?: int, ClientIPPreservationEnabled?: bool, AttachmentArn?: string, ...}>,
 *     TrafficDialPercentage?: float,
 *     HealthCheckPort?: int,
 *     HealthCheckProtocol?: 'HTTP'|'HTTPS'|'TCP',
 *     HealthCheckPath?: string,
 *     HealthCheckIntervalSeconds?: int,
 *     ThresholdCount?: int,
 *     PortOverrides?: list<array{ListenerPort?: int, EndpointPort?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateListener(array $args = [])
 * @phpstan-method \Aws\Result updateListener(array{
 *     ListenerArn?: string,
 *     PortRanges?: list<array{FromPort?: int, ToPort?: int, ...}>,
 *     Protocol?: 'TCP'|'UDP',
 *     ClientAffinity?: 'NONE'|'SOURCE_IP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateListenerAsync(array{
 *     ListenerArn?: string,
 *     PortRanges?: list<array{FromPort?: int, ToPort?: int, ...}>,
 *     Protocol?: 'TCP'|'UDP',
 *     ClientAffinity?: 'NONE'|'SOURCE_IP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result withdrawByoipCidr(array $args = [])
 * @phpstan-method \Aws\Result withdrawByoipCidr(array{Cidr?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise withdrawByoipCidrAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise withdrawByoipCidrAsync(array{Cidr?: string, ...} $args = [])
 */
class GlobalAcceleratorClient extends AwsClient {}
