<?php
namespace Aws\DirectConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Direct Connect** service.
 *
 * @method \Aws\Result acceptDirectConnectGatewayAssociationProposal(array $args = [])
 * @phpstan-method \Aws\Result acceptDirectConnectGatewayAssociationProposal(array{
 *     directConnectGatewayId?: string,
 *     proposalId?: string,
 *     associatedGatewayOwnerAccount?: string,
 *     overrideAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptDirectConnectGatewayAssociationProposalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptDirectConnectGatewayAssociationProposalAsync(array{
 *     directConnectGatewayId?: string,
 *     proposalId?: string,
 *     associatedGatewayOwnerAccount?: string,
 *     overrideAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result allocateConnectionOnInterconnect(array $args = [])
 * @phpstan-method \Aws\Result allocateConnectionOnInterconnect(array{
 *     bandwidth?: string,
 *     connectionName?: string,
 *     ownerAccount?: string,
 *     interconnectId?: string,
 *     vlan?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise allocateConnectionOnInterconnectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise allocateConnectionOnInterconnectAsync(array{
 *     bandwidth?: string,
 *     connectionName?: string,
 *     ownerAccount?: string,
 *     interconnectId?: string,
 *     vlan?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result allocateHostedConnection(array $args = [])
 * @phpstan-method \Aws\Result allocateHostedConnection(array{
 *     connectionId?: string,
 *     ownerAccount?: string,
 *     bandwidth?: string,
 *     connectionName?: string,
 *     vlan?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise allocateHostedConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise allocateHostedConnectionAsync(array{
 *     connectionId?: string,
 *     ownerAccount?: string,
 *     bandwidth?: string,
 *     connectionName?: string,
 *     vlan?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result allocatePrivateVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result allocatePrivateVirtualInterface(array{
 *     connectionId?: string,
 *     ownerAccount?: string,
 *     newPrivateVirtualInterfaceAllocation?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         mtu?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         customerAddress?: string,
 *         tags?: list<array>,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise allocatePrivateVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise allocatePrivateVirtualInterfaceAsync(array{
 *     connectionId?: string,
 *     ownerAccount?: string,
 *     newPrivateVirtualInterfaceAllocation?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         mtu?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         customerAddress?: string,
 *         tags?: list<array>,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result allocatePublicVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result allocatePublicVirtualInterface(array{
 *     connectionId?: string,
 *     ownerAccount?: string,
 *     newPublicVirtualInterfaceAllocation?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         routeFilterPrefixes?: list<array>,
 *         tags?: list<array>,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise allocatePublicVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise allocatePublicVirtualInterfaceAsync(array{
 *     connectionId?: string,
 *     ownerAccount?: string,
 *     newPublicVirtualInterfaceAllocation?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         routeFilterPrefixes?: list<array>,
 *         tags?: list<array>,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result allocateTransitVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result allocateTransitVirtualInterface(array{
 *     connectionId?: string,
 *     ownerAccount?: string,
 *     newTransitVirtualInterfaceAllocation?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         mtu?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         tags?: list<array>,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise allocateTransitVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise allocateTransitVirtualInterfaceAsync(array{
 *     connectionId?: string,
 *     ownerAccount?: string,
 *     newTransitVirtualInterfaceAllocation?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         mtu?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         tags?: list<array>,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateConnectionWithLag(array $args = [])
 * @phpstan-method \Aws\Result associateConnectionWithLag(array{connectionId?: string, lagId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateConnectionWithLagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateConnectionWithLagAsync(array{connectionId?: string, lagId?: string, ...} $args = [])
 * @method \Aws\Result associateHostedConnection(array $args = [])
 * @phpstan-method \Aws\Result associateHostedConnection(array{connectionId?: string, parentConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateHostedConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateHostedConnectionAsync(array{connectionId?: string, parentConnectionId?: string, ...} $args = [])
 * @method \Aws\Result associateMacSecKey(array $args = [])
 * @phpstan-method \Aws\Result associateMacSecKey(array{connectionId?: string, secretARN?: string, ckn?: string, cak?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMacSecKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMacSecKeyAsync(array{connectionId?: string, secretARN?: string, ckn?: string, cak?: string, ...} $args = [])
 * @method \Aws\Result associateVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result associateVirtualInterface(array{virtualInterfaceId?: string, connectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateVirtualInterfaceAsync(array{virtualInterfaceId?: string, connectionId?: string, ...} $args = [])
 * @method \Aws\Result confirmConnection(array $args = [])
 * @phpstan-method \Aws\Result confirmConnection(array{connectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmConnectionAsync(array{connectionId?: string, ...} $args = [])
 * @method \Aws\Result confirmCustomerAgreement(array $args = [])
 * @phpstan-method \Aws\Result confirmCustomerAgreement(array{agreementName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmCustomerAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmCustomerAgreementAsync(array{agreementName?: string, ...} $args = [])
 * @method \Aws\Result confirmPrivateVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result confirmPrivateVirtualInterface(array{virtualInterfaceId?: string, virtualGatewayId?: string, directConnectGatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmPrivateVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmPrivateVirtualInterfaceAsync(array{virtualInterfaceId?: string, virtualGatewayId?: string, directConnectGatewayId?: string, ...} $args = [])
 * @method \Aws\Result confirmPublicVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result confirmPublicVirtualInterface(array{virtualInterfaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmPublicVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmPublicVirtualInterfaceAsync(array{virtualInterfaceId?: string, ...} $args = [])
 * @method \Aws\Result confirmTransitVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result confirmTransitVirtualInterface(array{virtualInterfaceId?: string, directConnectGatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmTransitVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmTransitVirtualInterfaceAsync(array{virtualInterfaceId?: string, directConnectGatewayId?: string, ...} $args = [])
 * @method \Aws\Result createBGPPeer(array $args = [])
 * @phpstan-method \Aws\Result createBGPPeer(array{
 *     virtualInterfaceId?: string,
 *     newBGPPeer?: array{
 *         asn?: int,
 *         asnLong?: int,
 *         authKey?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBGPPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBGPPeerAsync(array{
 *     virtualInterfaceId?: string,
 *     newBGPPeer?: array{
 *         asn?: int,
 *         asnLong?: int,
 *         authKey?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @phpstan-method \Aws\Result createConnection(array{
 *     location?: string,
 *     bandwidth?: string,
 *     connectionName?: string,
 *     lagId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     providerName?: string,
 *     requestMACSec?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAsync(array{
 *     location?: string,
 *     bandwidth?: string,
 *     connectionName?: string,
 *     lagId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     providerName?: string,
 *     requestMACSec?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDirectConnectGateway(array $args = [])
 * @phpstan-method \Aws\Result createDirectConnectGateway(array{
 *     directConnectGatewayName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     amazonSideAsn?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAsync(array{
 *     directConnectGatewayName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     amazonSideAsn?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDirectConnectGatewayAssociation(array $args = [])
 * @phpstan-method \Aws\Result createDirectConnectGatewayAssociation(array{
 *     directConnectGatewayId?: string,
 *     gatewayId?: string,
 *     addAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     virtualGatewayId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAssociationAsync(array{
 *     directConnectGatewayId?: string,
 *     gatewayId?: string,
 *     addAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     virtualGatewayId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDirectConnectGatewayAssociationProposal(array $args = [])
 * @phpstan-method \Aws\Result createDirectConnectGatewayAssociationProposal(array{
 *     directConnectGatewayId?: string,
 *     directConnectGatewayOwnerAccount?: string,
 *     gatewayId?: string,
 *     addAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     removeAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAssociationProposalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAssociationProposalAsync(array{
 *     directConnectGatewayId?: string,
 *     directConnectGatewayOwnerAccount?: string,
 *     gatewayId?: string,
 *     addAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     removeAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInterconnect(array $args = [])
 * @phpstan-method \Aws\Result createInterconnect(array{
 *     interconnectName?: string,
 *     bandwidth?: string,
 *     location?: string,
 *     lagId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     providerName?: string,
 *     requestMACSec?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInterconnectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInterconnectAsync(array{
 *     interconnectName?: string,
 *     bandwidth?: string,
 *     location?: string,
 *     lagId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     providerName?: string,
 *     requestMACSec?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLag(array $args = [])
 * @phpstan-method \Aws\Result createLag(array{
 *     numberOfConnections?: int,
 *     location?: string,
 *     connectionsBandwidth?: string,
 *     lagName?: string,
 *     connectionId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     childConnectionTags?: list<array{key?: string, value?: string, ...}>,
 *     providerName?: string,
 *     requestMACSec?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLagAsync(array{
 *     numberOfConnections?: int,
 *     location?: string,
 *     connectionsBandwidth?: string,
 *     lagName?: string,
 *     connectionId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     childConnectionTags?: list<array{key?: string, value?: string, ...}>,
 *     providerName?: string,
 *     requestMACSec?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPrivateVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result createPrivateVirtualInterface(array{
 *     connectionId?: string,
 *     newPrivateVirtualInterface?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         mtu?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         virtualGatewayId?: string,
 *         directConnectGatewayId?: string,
 *         tags?: list<array>,
 *         enableSiteLink?: bool,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrivateVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPrivateVirtualInterfaceAsync(array{
 *     connectionId?: string,
 *     newPrivateVirtualInterface?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         mtu?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         virtualGatewayId?: string,
 *         directConnectGatewayId?: string,
 *         tags?: list<array>,
 *         enableSiteLink?: bool,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPublicVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result createPublicVirtualInterface(array{
 *     connectionId?: string,
 *     newPublicVirtualInterface?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         routeFilterPrefixes?: list<array>,
 *         tags?: list<array>,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPublicVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPublicVirtualInterfaceAsync(array{
 *     connectionId?: string,
 *     newPublicVirtualInterface?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         routeFilterPrefixes?: list<array>,
 *         tags?: list<array>,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTransitVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result createTransitVirtualInterface(array{
 *     connectionId?: string,
 *     newTransitVirtualInterface?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         mtu?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         directConnectGatewayId?: string,
 *         tags?: list<array>,
 *         enableSiteLink?: bool,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTransitVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTransitVirtualInterfaceAsync(array{
 *     connectionId?: string,
 *     newTransitVirtualInterface?: array{
 *         virtualInterfaceName?: string,
 *         vlan?: int,
 *         asn?: int,
 *         asnLong?: int,
 *         mtu?: int,
 *         authKey?: string,
 *         amazonAddress?: string,
 *         customerAddress?: string,
 *         addressFamily?: 'ipv4'|'ipv6',
 *         directConnectGatewayId?: string,
 *         tags?: list<array>,
 *         enableSiteLink?: bool,
 *         rateLimit?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBGPPeer(array $args = [])
 * @phpstan-method \Aws\Result deleteBGPPeer(array{
 *     virtualInterfaceId?: string,
 *     asn?: int,
 *     asnLong?: int,
 *     customerAddress?: string,
 *     bgpPeerId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBGPPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBGPPeerAsync(array{
 *     virtualInterfaceId?: string,
 *     asn?: int,
 *     asnLong?: int,
 *     customerAddress?: string,
 *     bgpPeerId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{connectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{connectionId?: string, ...} $args = [])
 * @method \Aws\Result deleteDirectConnectGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteDirectConnectGateway(array{directConnectGatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectConnectGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDirectConnectGatewayAsync(array{directConnectGatewayId?: string, ...} $args = [])
 * @method \Aws\Result deleteDirectConnectGatewayAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteDirectConnectGatewayAssociation(array{associationId?: string, directConnectGatewayId?: string, virtualGatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectConnectGatewayAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDirectConnectGatewayAssociationAsync(array{associationId?: string, directConnectGatewayId?: string, virtualGatewayId?: string, ...} $args = [])
 * @method \Aws\Result deleteDirectConnectGatewayAssociationProposal(array $args = [])
 * @phpstan-method \Aws\Result deleteDirectConnectGatewayAssociationProposal(array{proposalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectConnectGatewayAssociationProposalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDirectConnectGatewayAssociationProposalAsync(array{proposalId?: string, ...} $args = [])
 * @method \Aws\Result deleteInterconnect(array $args = [])
 * @phpstan-method \Aws\Result deleteInterconnect(array{interconnectId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInterconnectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInterconnectAsync(array{interconnectId?: string, ...} $args = [])
 * @method \Aws\Result deleteLag(array $args = [])
 * @phpstan-method \Aws\Result deleteLag(array{lagId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLagAsync(array{lagId?: string, ...} $args = [])
 * @method \Aws\Result deleteVirtualInterface(array $args = [])
 * @phpstan-method \Aws\Result deleteVirtualInterface(array{virtualInterfaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVirtualInterfaceAsync(array{virtualInterfaceId?: string, ...} $args = [])
 * @method \Aws\Result describeConnectionLoa(array $args = [])
 * @phpstan-method \Aws\Result describeConnectionLoa(array{connectionId?: string, providerName?: string, loaContentType?: 'application/pdf', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionLoaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionLoaAsync(array{connectionId?: string, providerName?: string, loaContentType?: 'application/pdf', ...} $args = [])
 * @method \Aws\Result describeConnections(array $args = [])
 * @phpstan-method \Aws\Result describeConnections(array{connectionId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionsAsync(array{connectionId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeConnectionsOnInterconnect(array $args = [])
 * @phpstan-method \Aws\Result describeConnectionsOnInterconnect(array{interconnectId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionsOnInterconnectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionsOnInterconnectAsync(array{interconnectId?: string, ...} $args = [])
 * @method \Aws\Result describeCustomerMetadata(array $args = [])
 * @phpstan-method \Aws\Result describeCustomerMetadata(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomerMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomerMetadataAsync(array{...} $args = [])
 * @method \Aws\Result describeDirectConnectGatewayAssociationProposals(array $args = [])
 * @phpstan-method \Aws\Result describeDirectConnectGatewayAssociationProposals(array{
 *     directConnectGatewayId?: string,
 *     proposalId?: string,
 *     associatedGatewayId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectConnectGatewayAssociationProposalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDirectConnectGatewayAssociationProposalsAsync(array{
 *     directConnectGatewayId?: string,
 *     proposalId?: string,
 *     associatedGatewayId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDirectConnectGatewayAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeDirectConnectGatewayAssociations(array{
 *     associationId?: string,
 *     associatedGatewayId?: string,
 *     directConnectGatewayId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     virtualGatewayId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectConnectGatewayAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDirectConnectGatewayAssociationsAsync(array{
 *     associationId?: string,
 *     associatedGatewayId?: string,
 *     directConnectGatewayId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     virtualGatewayId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDirectConnectGatewayAttachments(array $args = [])
 * @phpstan-method \Aws\Result describeDirectConnectGatewayAttachments(array{directConnectGatewayId?: string, virtualInterfaceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectConnectGatewayAttachmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDirectConnectGatewayAttachmentsAsync(array{directConnectGatewayId?: string, virtualInterfaceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeDirectConnectGateways(array $args = [])
 * @phpstan-method \Aws\Result describeDirectConnectGateways(array{directConnectGatewayId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectConnectGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDirectConnectGatewaysAsync(array{directConnectGatewayId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeHostedConnections(array $args = [])
 * @phpstan-method \Aws\Result describeHostedConnections(array{connectionId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHostedConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHostedConnectionsAsync(array{connectionId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeInterconnectLoa(array $args = [])
 * @phpstan-method \Aws\Result describeInterconnectLoa(array{interconnectId?: string, providerName?: string, loaContentType?: 'application/pdf', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInterconnectLoaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInterconnectLoaAsync(array{interconnectId?: string, providerName?: string, loaContentType?: 'application/pdf', ...} $args = [])
 * @method \Aws\Result describeInterconnects(array $args = [])
 * @phpstan-method \Aws\Result describeInterconnects(array{interconnectId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInterconnectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInterconnectsAsync(array{interconnectId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeLags(array $args = [])
 * @phpstan-method \Aws\Result describeLags(array{lagId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLagsAsync(array{lagId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeLoa(array $args = [])
 * @phpstan-method \Aws\Result describeLoa(array{connectionId?: string, providerName?: string, loaContentType?: 'application/pdf', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoaAsync(array{connectionId?: string, providerName?: string, loaContentType?: 'application/pdf', ...} $args = [])
 * @method \Aws\Result describeLocations(array $args = [])
 * @phpstan-method \Aws\Result describeLocations(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationsAsync(array{...} $args = [])
 * @method \Aws\Result describeRouterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeRouterConfiguration(array{virtualInterfaceId?: string, routerTypeIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRouterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRouterConfigurationAsync(array{virtualInterfaceId?: string, routerTypeIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{resourceArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{resourceArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeVirtualGateways(array $args = [])
 * @phpstan-method \Aws\Result describeVirtualGateways(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVirtualGatewaysAsync(array{...} $args = [])
 * @method \Aws\Result describeVirtualInterfaces(array $args = [])
 * @phpstan-method \Aws\Result describeVirtualInterfaces(array{connectionId?: string, virtualInterfaceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualInterfacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVirtualInterfacesAsync(array{connectionId?: string, virtualInterfaceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateConnectionFromLag(array $args = [])
 * @phpstan-method \Aws\Result disassociateConnectionFromLag(array{connectionId?: string, lagId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateConnectionFromLagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateConnectionFromLagAsync(array{connectionId?: string, lagId?: string, ...} $args = [])
 * @method \Aws\Result disassociateMacSecKey(array $args = [])
 * @phpstan-method \Aws\Result disassociateMacSecKey(array{connectionId?: string, secretARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMacSecKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMacSecKeyAsync(array{connectionId?: string, secretARN?: string, ...} $args = [])
 * @method \Aws\Result listVirtualInterfaceTestHistory(array $args = [])
 * @phpstan-method \Aws\Result listVirtualInterfaceTestHistory(array{
 *     testId?: string,
 *     virtualInterfaceId?: string,
 *     bgpPeers?: list<string>,
 *     status?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualInterfaceTestHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVirtualInterfaceTestHistoryAsync(array{
 *     testId?: string,
 *     virtualInterfaceId?: string,
 *     bgpPeers?: list<string>,
 *     status?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startBgpFailoverTest(array $args = [])
 * @phpstan-method \Aws\Result startBgpFailoverTest(array{virtualInterfaceId?: string, bgpPeers?: list<string>, testDurationInMinutes?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startBgpFailoverTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBgpFailoverTestAsync(array{virtualInterfaceId?: string, bgpPeers?: list<string>, testDurationInMinutes?: int, ...} $args = [])
 * @method \Aws\Result stopBgpFailoverTest(array $args = [])
 * @phpstan-method \Aws\Result stopBgpFailoverTest(array{virtualInterfaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBgpFailoverTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBgpFailoverTestAsync(array{virtualInterfaceId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateConnection(array $args = [])
 * @phpstan-method \Aws\Result updateConnection(array{connectionId?: string, connectionName?: string, encryptionMode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionAsync(array{connectionId?: string, connectionName?: string, encryptionMode?: string, ...} $args = [])
 * @method \Aws\Result updateDirectConnectGateway(array $args = [])
 * @phpstan-method \Aws\Result updateDirectConnectGateway(array{directConnectGatewayId?: string, newDirectConnectGatewayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDirectConnectGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDirectConnectGatewayAsync(array{directConnectGatewayId?: string, newDirectConnectGatewayName?: string, ...} $args = [])
 * @method \Aws\Result updateDirectConnectGatewayAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateDirectConnectGatewayAssociation(array{
 *     associationId?: string,
 *     addAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     removeAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDirectConnectGatewayAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDirectConnectGatewayAssociationAsync(array{
 *     associationId?: string,
 *     addAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     removeAllowedPrefixesToDirectConnectGateway?: list<array{cidr?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLag(array $args = [])
 * @phpstan-method \Aws\Result updateLag(array{lagId?: string, lagName?: string, minimumLinks?: int, encryptionMode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLagAsync(array{lagId?: string, lagName?: string, minimumLinks?: int, encryptionMode?: string, ...} $args = [])
 * @method \Aws\Result updateVirtualInterfaceAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateVirtualInterfaceAttributes(array{
 *     virtualInterfaceId?: string,
 *     mtu?: int,
 *     enableSiteLink?: bool,
 *     virtualInterfaceName?: string,
 *     rateLimit?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVirtualInterfaceAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVirtualInterfaceAttributesAsync(array{
 *     virtualInterfaceId?: string,
 *     mtu?: int,
 *     enableSiteLink?: bool,
 *     virtualInterfaceName?: string,
 *     rateLimit?: string,
 *     ...,
 * } $args = [])
 */
class DirectConnectClient extends AwsClient {}
