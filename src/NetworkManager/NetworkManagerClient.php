<?php
namespace Aws\NetworkManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Network Manager** service.
 * @method \Aws\Result acceptAttachment(array $args = [])
 * @phpstan-method \Aws\Result acceptAttachment(array{AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptAttachmentAsync(array{AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result associateConnectPeer(array $args = [])
 * @phpstan-method \Aws\Result associateConnectPeer(array{GlobalNetworkId?: string, ConnectPeerId?: string, DeviceId?: string, LinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateConnectPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateConnectPeerAsync(array{GlobalNetworkId?: string, ConnectPeerId?: string, DeviceId?: string, LinkId?: string, ...} $args = [])
 * @method \Aws\Result associateCustomerGateway(array $args = [])
 * @phpstan-method \Aws\Result associateCustomerGateway(array{CustomerGatewayArn?: string, GlobalNetworkId?: string, DeviceId?: string, LinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCustomerGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateCustomerGatewayAsync(array{CustomerGatewayArn?: string, GlobalNetworkId?: string, DeviceId?: string, LinkId?: string, ...} $args = [])
 * @method \Aws\Result associateLink(array $args = [])
 * @phpstan-method \Aws\Result associateLink(array{GlobalNetworkId?: string, DeviceId?: string, LinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateLinkAsync(array{GlobalNetworkId?: string, DeviceId?: string, LinkId?: string, ...} $args = [])
 * @method \Aws\Result associateTransitGatewayConnectPeer(array $args = [])
 * @phpstan-method \Aws\Result associateTransitGatewayConnectPeer(array{
 *     GlobalNetworkId?: string,
 *     TransitGatewayConnectPeerArn?: string,
 *     DeviceId?: string,
 *     LinkId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTransitGatewayConnectPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateTransitGatewayConnectPeerAsync(array{
 *     GlobalNetworkId?: string,
 *     TransitGatewayConnectPeerArn?: string,
 *     DeviceId?: string,
 *     LinkId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnectAttachment(array $args = [])
 * @phpstan-method \Aws\Result createConnectAttachment(array{
 *     CoreNetworkId?: string,
 *     EdgeLocation?: string,
 *     TransportAttachmentId?: string,
 *     RoutingPolicyLabel?: string,
 *     Options?: array{Protocol?: 'GRE'|'NO_ENCAP', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectAttachmentAsync(array{
 *     CoreNetworkId?: string,
 *     EdgeLocation?: string,
 *     TransportAttachmentId?: string,
 *     RoutingPolicyLabel?: string,
 *     Options?: array{Protocol?: 'GRE'|'NO_ENCAP', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnectPeer(array $args = [])
 * @phpstan-method \Aws\Result createConnectPeer(array{
 *     ConnectAttachmentId?: string,
 *     CoreNetworkAddress?: string,
 *     PeerAddress?: string,
 *     BgpOptions?: array{PeerAsn?: int, ...},
 *     InsideCidrBlocks?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     SubnetArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectPeerAsync(array{
 *     ConnectAttachmentId?: string,
 *     CoreNetworkAddress?: string,
 *     PeerAddress?: string,
 *     BgpOptions?: array{PeerAsn?: int, ...},
 *     InsideCidrBlocks?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     SubnetArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @phpstan-method \Aws\Result createConnection(array{
 *     GlobalNetworkId?: string,
 *     DeviceId?: string,
 *     ConnectedDeviceId?: string,
 *     LinkId?: string,
 *     ConnectedLinkId?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAsync(array{
 *     GlobalNetworkId?: string,
 *     DeviceId?: string,
 *     ConnectedDeviceId?: string,
 *     LinkId?: string,
 *     ConnectedLinkId?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCoreNetwork(array $args = [])
 * @phpstan-method \Aws\Result createCoreNetwork(array{
 *     GlobalNetworkId?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     PolicyDocument?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCoreNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCoreNetworkAsync(array{
 *     GlobalNetworkId?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     PolicyDocument?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCoreNetworkPrefixListAssociation(array $args = [])
 * @phpstan-method \Aws\Result createCoreNetworkPrefixListAssociation(array{CoreNetworkId?: string, PrefixListArn?: string, PrefixListAlias?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCoreNetworkPrefixListAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCoreNetworkPrefixListAssociationAsync(array{CoreNetworkId?: string, PrefixListArn?: string, PrefixListAlias?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result createDevice(array $args = [])
 * @phpstan-method \Aws\Result createDevice(array{
 *     GlobalNetworkId?: string,
 *     AWSLocation?: array{Zone?: string, SubnetArn?: string, ...},
 *     Description?: string,
 *     Type?: string,
 *     Vendor?: string,
 *     Model?: string,
 *     SerialNumber?: string,
 *     Location?: array{Address?: string, Latitude?: string, Longitude?: string, ...},
 *     SiteId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeviceAsync(array{
 *     GlobalNetworkId?: string,
 *     AWSLocation?: array{Zone?: string, SubnetArn?: string, ...},
 *     Description?: string,
 *     Type?: string,
 *     Vendor?: string,
 *     Model?: string,
 *     SerialNumber?: string,
 *     Location?: array{Address?: string, Latitude?: string, Longitude?: string, ...},
 *     SiteId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDirectConnectGatewayAttachment(array $args = [])
 * @phpstan-method \Aws\Result createDirectConnectGatewayAttachment(array{
 *     CoreNetworkId?: string,
 *     DirectConnectGatewayArn?: string,
 *     RoutingPolicyLabel?: string,
 *     EdgeLocations?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAttachmentAsync(array{
 *     CoreNetworkId?: string,
 *     DirectConnectGatewayArn?: string,
 *     RoutingPolicyLabel?: string,
 *     EdgeLocations?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlobalNetwork(array $args = [])
 * @phpstan-method \Aws\Result createGlobalNetwork(array{Description?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlobalNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlobalNetworkAsync(array{Description?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createLink(array $args = [])
 * @phpstan-method \Aws\Result createLink(array{
 *     GlobalNetworkId?: string,
 *     Description?: string,
 *     Type?: string,
 *     Bandwidth?: array{UploadSpeed?: int, DownloadSpeed?: int, ...},
 *     Provider?: string,
 *     SiteId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLinkAsync(array{
 *     GlobalNetworkId?: string,
 *     Description?: string,
 *     Type?: string,
 *     Bandwidth?: array{UploadSpeed?: int, DownloadSpeed?: int, ...},
 *     Provider?: string,
 *     SiteId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSite(array $args = [])
 * @phpstan-method \Aws\Result createSite(array{
 *     GlobalNetworkId?: string,
 *     Description?: string,
 *     Location?: array{Address?: string, Latitude?: string, Longitude?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSiteAsync(array{
 *     GlobalNetworkId?: string,
 *     Description?: string,
 *     Location?: array{Address?: string, Latitude?: string, Longitude?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSiteToSiteVpnAttachment(array $args = [])
 * @phpstan-method \Aws\Result createSiteToSiteVpnAttachment(array{
 *     CoreNetworkId?: string,
 *     VpnConnectionArn?: string,
 *     RoutingPolicyLabel?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSiteToSiteVpnAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSiteToSiteVpnAttachmentAsync(array{
 *     CoreNetworkId?: string,
 *     VpnConnectionArn?: string,
 *     RoutingPolicyLabel?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTransitGatewayPeering(array $args = [])
 * @phpstan-method \Aws\Result createTransitGatewayPeering(array{
 *     CoreNetworkId?: string,
 *     TransitGatewayArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTransitGatewayPeeringAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTransitGatewayPeeringAsync(array{
 *     CoreNetworkId?: string,
 *     TransitGatewayArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTransitGatewayRouteTableAttachment(array $args = [])
 * @phpstan-method \Aws\Result createTransitGatewayRouteTableAttachment(array{
 *     PeeringId?: string,
 *     TransitGatewayRouteTableArn?: string,
 *     RoutingPolicyLabel?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTransitGatewayRouteTableAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTransitGatewayRouteTableAttachmentAsync(array{
 *     PeeringId?: string,
 *     TransitGatewayRouteTableArn?: string,
 *     RoutingPolicyLabel?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcAttachment(array $args = [])
 * @phpstan-method \Aws\Result createVpcAttachment(array{
 *     CoreNetworkId?: string,
 *     VpcArn?: string,
 *     SubnetArns?: list<string>,
 *     Options?: array{
 *         Ipv6Support?: bool,
 *         ApplianceModeSupport?: bool,
 *         DnsSupport?: bool,
 *         SecurityGroupReferencingSupport?: bool,
 *         ...,
 *     },
 *     RoutingPolicyLabel?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcAttachmentAsync(array{
 *     CoreNetworkId?: string,
 *     VpcArn?: string,
 *     SubnetArns?: list<string>,
 *     Options?: array{
 *         Ipv6Support?: bool,
 *         ApplianceModeSupport?: bool,
 *         DnsSupport?: bool,
 *         SecurityGroupReferencingSupport?: bool,
 *         ...,
 *     },
 *     RoutingPolicyLabel?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAttachment(array $args = [])
 * @phpstan-method \Aws\Result deleteAttachment(array{AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAttachmentAsync(array{AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectPeer(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectPeer(array{ConnectPeerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectPeerAsync(array{ConnectPeerId?: string, ...} $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{GlobalNetworkId?: string, ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{GlobalNetworkId?: string, ConnectionId?: string, ...} $args = [])
 * @method \Aws\Result deleteCoreNetwork(array $args = [])
 * @phpstan-method \Aws\Result deleteCoreNetwork(array{CoreNetworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCoreNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCoreNetworkAsync(array{CoreNetworkId?: string, ...} $args = [])
 * @method \Aws\Result deleteCoreNetworkPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteCoreNetworkPolicyVersion(array{CoreNetworkId?: string, PolicyVersionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCoreNetworkPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCoreNetworkPolicyVersionAsync(array{CoreNetworkId?: string, PolicyVersionId?: int, ...} $args = [])
 * @method \Aws\Result deleteCoreNetworkPrefixListAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteCoreNetworkPrefixListAssociation(array{CoreNetworkId?: string, PrefixListArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCoreNetworkPrefixListAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCoreNetworkPrefixListAssociationAsync(array{CoreNetworkId?: string, PrefixListArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDevice(array $args = [])
 * @phpstan-method \Aws\Result deleteDevice(array{GlobalNetworkId?: string, DeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeviceAsync(array{GlobalNetworkId?: string, DeviceId?: string, ...} $args = [])
 * @method \Aws\Result deleteGlobalNetwork(array $args = [])
 * @phpstan-method \Aws\Result deleteGlobalNetwork(array{GlobalNetworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlobalNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlobalNetworkAsync(array{GlobalNetworkId?: string, ...} $args = [])
 * @method \Aws\Result deleteLink(array $args = [])
 * @phpstan-method \Aws\Result deleteLink(array{GlobalNetworkId?: string, LinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLinkAsync(array{GlobalNetworkId?: string, LinkId?: string, ...} $args = [])
 * @method \Aws\Result deletePeering(array $args = [])
 * @phpstan-method \Aws\Result deletePeering(array{PeeringId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePeeringAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePeeringAsync(array{PeeringId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSite(array $args = [])
 * @phpstan-method \Aws\Result deleteSite(array{GlobalNetworkId?: string, SiteId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSiteAsync(array{GlobalNetworkId?: string, SiteId?: string, ...} $args = [])
 * @method \Aws\Result deregisterTransitGateway(array $args = [])
 * @phpstan-method \Aws\Result deregisterTransitGateway(array{GlobalNetworkId?: string, TransitGatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTransitGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterTransitGatewayAsync(array{GlobalNetworkId?: string, TransitGatewayArn?: string, ...} $args = [])
 * @method \Aws\Result describeGlobalNetworks(array $args = [])
 * @phpstan-method \Aws\Result describeGlobalNetworks(array{GlobalNetworkIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalNetworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGlobalNetworksAsync(array{GlobalNetworkIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateConnectPeer(array $args = [])
 * @phpstan-method \Aws\Result disassociateConnectPeer(array{GlobalNetworkId?: string, ConnectPeerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateConnectPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateConnectPeerAsync(array{GlobalNetworkId?: string, ConnectPeerId?: string, ...} $args = [])
 * @method \Aws\Result disassociateCustomerGateway(array $args = [])
 * @phpstan-method \Aws\Result disassociateCustomerGateway(array{GlobalNetworkId?: string, CustomerGatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCustomerGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateCustomerGatewayAsync(array{GlobalNetworkId?: string, CustomerGatewayArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateLink(array $args = [])
 * @phpstan-method \Aws\Result disassociateLink(array{GlobalNetworkId?: string, DeviceId?: string, LinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateLinkAsync(array{GlobalNetworkId?: string, DeviceId?: string, LinkId?: string, ...} $args = [])
 * @method \Aws\Result disassociateTransitGatewayConnectPeer(array $args = [])
 * @phpstan-method \Aws\Result disassociateTransitGatewayConnectPeer(array{GlobalNetworkId?: string, TransitGatewayConnectPeerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTransitGatewayConnectPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateTransitGatewayConnectPeerAsync(array{GlobalNetworkId?: string, TransitGatewayConnectPeerArn?: string, ...} $args = [])
 * @method \Aws\Result executeCoreNetworkChangeSet(array $args = [])
 * @phpstan-method \Aws\Result executeCoreNetworkChangeSet(array{CoreNetworkId?: string, PolicyVersionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeCoreNetworkChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeCoreNetworkChangeSetAsync(array{CoreNetworkId?: string, PolicyVersionId?: int, ...} $args = [])
 * @method \Aws\Result getConnectAttachment(array $args = [])
 * @phpstan-method \Aws\Result getConnectAttachment(array{AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectAttachmentAsync(array{AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result getConnectPeer(array $args = [])
 * @phpstan-method \Aws\Result getConnectPeer(array{ConnectPeerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectPeerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectPeerAsync(array{ConnectPeerId?: string, ...} $args = [])
 * @method \Aws\Result getConnectPeerAssociations(array $args = [])
 * @phpstan-method \Aws\Result getConnectPeerAssociations(array{GlobalNetworkId?: string, ConnectPeerIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectPeerAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectPeerAssociationsAsync(array{GlobalNetworkId?: string, ConnectPeerIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getConnections(array $args = [])
 * @phpstan-method \Aws\Result getConnections(array{
 *     GlobalNetworkId?: string,
 *     ConnectionIds?: list<string>,
 *     DeviceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionsAsync(array{
 *     GlobalNetworkId?: string,
 *     ConnectionIds?: list<string>,
 *     DeviceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCoreNetwork(array $args = [])
 * @phpstan-method \Aws\Result getCoreNetwork(array{CoreNetworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCoreNetworkAsync(array{CoreNetworkId?: string, ...} $args = [])
 * @method \Aws\Result getCoreNetworkChangeEvents(array $args = [])
 * @phpstan-method \Aws\Result getCoreNetworkChangeEvents(array{CoreNetworkId?: string, PolicyVersionId?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreNetworkChangeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCoreNetworkChangeEventsAsync(array{CoreNetworkId?: string, PolicyVersionId?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getCoreNetworkChangeSet(array $args = [])
 * @phpstan-method \Aws\Result getCoreNetworkChangeSet(array{CoreNetworkId?: string, PolicyVersionId?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreNetworkChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCoreNetworkChangeSetAsync(array{CoreNetworkId?: string, PolicyVersionId?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getCoreNetworkPolicy(array $args = [])
 * @phpstan-method \Aws\Result getCoreNetworkPolicy(array{CoreNetworkId?: string, PolicyVersionId?: int, Alias?: 'LATEST'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreNetworkPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCoreNetworkPolicyAsync(array{CoreNetworkId?: string, PolicyVersionId?: int, Alias?: 'LATEST'|'LIVE', ...} $args = [])
 * @method \Aws\Result getCustomerGatewayAssociations(array $args = [])
 * @phpstan-method \Aws\Result getCustomerGatewayAssociations(array{GlobalNetworkId?: string, CustomerGatewayArns?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomerGatewayAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomerGatewayAssociationsAsync(array{GlobalNetworkId?: string, CustomerGatewayArns?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getDevices(array $args = [])
 * @phpstan-method \Aws\Result getDevices(array{
 *     GlobalNetworkId?: string,
 *     DeviceIds?: list<string>,
 *     SiteId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDevicesAsync(array{
 *     GlobalNetworkId?: string,
 *     DeviceIds?: list<string>,
 *     SiteId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDirectConnectGatewayAttachment(array $args = [])
 * @phpstan-method \Aws\Result getDirectConnectGatewayAttachment(array{AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDirectConnectGatewayAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDirectConnectGatewayAttachmentAsync(array{AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result getLinkAssociations(array $args = [])
 * @phpstan-method \Aws\Result getLinkAssociations(array{GlobalNetworkId?: string, DeviceId?: string, LinkId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLinkAssociationsAsync(array{GlobalNetworkId?: string, DeviceId?: string, LinkId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getLinks(array $args = [])
 * @phpstan-method \Aws\Result getLinks(array{
 *     GlobalNetworkId?: string,
 *     LinkIds?: list<string>,
 *     SiteId?: string,
 *     Type?: string,
 *     Provider?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLinksAsync(array{
 *     GlobalNetworkId?: string,
 *     LinkIds?: list<string>,
 *     SiteId?: string,
 *     Type?: string,
 *     Provider?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getNetworkResourceCounts(array $args = [])
 * @phpstan-method \Aws\Result getNetworkResourceCounts(array{GlobalNetworkId?: string, ResourceType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkResourceCountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkResourceCountsAsync(array{GlobalNetworkId?: string, ResourceType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getNetworkResourceRelationships(array $args = [])
 * @phpstan-method \Aws\Result getNetworkResourceRelationships(array{
 *     GlobalNetworkId?: string,
 *     CoreNetworkId?: string,
 *     RegisteredGatewayArn?: string,
 *     AwsRegion?: string,
 *     AccountId?: string,
 *     ResourceType?: string,
 *     ResourceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkResourceRelationshipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkResourceRelationshipsAsync(array{
 *     GlobalNetworkId?: string,
 *     CoreNetworkId?: string,
 *     RegisteredGatewayArn?: string,
 *     AwsRegion?: string,
 *     AccountId?: string,
 *     ResourceType?: string,
 *     ResourceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getNetworkResources(array $args = [])
 * @phpstan-method \Aws\Result getNetworkResources(array{
 *     GlobalNetworkId?: string,
 *     CoreNetworkId?: string,
 *     RegisteredGatewayArn?: string,
 *     AwsRegion?: string,
 *     AccountId?: string,
 *     ResourceType?: string,
 *     ResourceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkResourcesAsync(array{
 *     GlobalNetworkId?: string,
 *     CoreNetworkId?: string,
 *     RegisteredGatewayArn?: string,
 *     AwsRegion?: string,
 *     AccountId?: string,
 *     ResourceType?: string,
 *     ResourceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getNetworkRoutes(array $args = [])
 * @phpstan-method \Aws\Result getNetworkRoutes(array{
 *     GlobalNetworkId?: string,
 *     RouteTableIdentifier?: array{
 *         TransitGatewayRouteTableArn?: string,
 *         CoreNetworkSegmentEdge?: array{CoreNetworkId?: string, SegmentName?: string, EdgeLocation?: string, ...},
 *         CoreNetworkNetworkFunctionGroup?: array{CoreNetworkId?: string, NetworkFunctionGroupName?: string, EdgeLocation?: string, ...},
 *         ...,
 *     },
 *     ExactCidrMatches?: list<string>,
 *     LongestPrefixMatches?: list<string>,
 *     SubnetOfMatches?: list<string>,
 *     SupernetOfMatches?: list<string>,
 *     PrefixListIds?: list<string>,
 *     States?: list<'ACTIVE'|'BLACKHOLE'>,
 *     Types?: list<'PROPAGATED'|'STATIC'>,
 *     DestinationFilters?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkRoutesAsync(array{
 *     GlobalNetworkId?: string,
 *     RouteTableIdentifier?: array{
 *         TransitGatewayRouteTableArn?: string,
 *         CoreNetworkSegmentEdge?: array{CoreNetworkId?: string, SegmentName?: string, EdgeLocation?: string, ...},
 *         CoreNetworkNetworkFunctionGroup?: array{CoreNetworkId?: string, NetworkFunctionGroupName?: string, EdgeLocation?: string, ...},
 *         ...,
 *     },
 *     ExactCidrMatches?: list<string>,
 *     LongestPrefixMatches?: list<string>,
 *     SubnetOfMatches?: list<string>,
 *     SupernetOfMatches?: list<string>,
 *     PrefixListIds?: list<string>,
 *     States?: list<'ACTIVE'|'BLACKHOLE'>,
 *     Types?: list<'PROPAGATED'|'STATIC'>,
 *     DestinationFilters?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getNetworkTelemetry(array $args = [])
 * @phpstan-method \Aws\Result getNetworkTelemetry(array{
 *     GlobalNetworkId?: string,
 *     CoreNetworkId?: string,
 *     RegisteredGatewayArn?: string,
 *     AwsRegion?: string,
 *     AccountId?: string,
 *     ResourceType?: string,
 *     ResourceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkTelemetryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkTelemetryAsync(array{
 *     GlobalNetworkId?: string,
 *     CoreNetworkId?: string,
 *     RegisteredGatewayArn?: string,
 *     AwsRegion?: string,
 *     AccountId?: string,
 *     ResourceType?: string,
 *     ResourceArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getRouteAnalysis(array $args = [])
 * @phpstan-method \Aws\Result getRouteAnalysis(array{GlobalNetworkId?: string, RouteAnalysisId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouteAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouteAnalysisAsync(array{GlobalNetworkId?: string, RouteAnalysisId?: string, ...} $args = [])
 * @method \Aws\Result getSiteToSiteVpnAttachment(array $args = [])
 * @phpstan-method \Aws\Result getSiteToSiteVpnAttachment(array{AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSiteToSiteVpnAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSiteToSiteVpnAttachmentAsync(array{AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result getSites(array $args = [])
 * @phpstan-method \Aws\Result getSites(array{GlobalNetworkId?: string, SiteIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSitesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSitesAsync(array{GlobalNetworkId?: string, SiteIds?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getTransitGatewayConnectPeerAssociations(array $args = [])
 * @phpstan-method \Aws\Result getTransitGatewayConnectPeerAssociations(array{
 *     GlobalNetworkId?: string,
 *     TransitGatewayConnectPeerArns?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayConnectPeerAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTransitGatewayConnectPeerAssociationsAsync(array{
 *     GlobalNetworkId?: string,
 *     TransitGatewayConnectPeerArns?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTransitGatewayPeering(array $args = [])
 * @phpstan-method \Aws\Result getTransitGatewayPeering(array{PeeringId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayPeeringAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTransitGatewayPeeringAsync(array{PeeringId?: string, ...} $args = [])
 * @method \Aws\Result getTransitGatewayRegistrations(array $args = [])
 * @phpstan-method \Aws\Result getTransitGatewayRegistrations(array{GlobalNetworkId?: string, TransitGatewayArns?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayRegistrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTransitGatewayRegistrationsAsync(array{GlobalNetworkId?: string, TransitGatewayArns?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getTransitGatewayRouteTableAttachment(array $args = [])
 * @phpstan-method \Aws\Result getTransitGatewayRouteTableAttachment(array{AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayRouteTableAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTransitGatewayRouteTableAttachmentAsync(array{AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result getVpcAttachment(array $args = [])
 * @phpstan-method \Aws\Result getVpcAttachment(array{AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVpcAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVpcAttachmentAsync(array{AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result listAttachmentRoutingPolicyAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAttachmentRoutingPolicyAssociations(array{CoreNetworkId?: string, AttachmentId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachmentRoutingPolicyAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachmentRoutingPolicyAssociationsAsync(array{CoreNetworkId?: string, AttachmentId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAttachments(array $args = [])
 * @phpstan-method \Aws\Result listAttachments(array{
 *     CoreNetworkId?: string,
 *     AttachmentType?: 'CONNECT'|'DIRECT_CONNECT_GATEWAY'|'SITE_TO_SITE_VPN'|'TRANSIT_GATEWAY_ROUTE_TABLE'|'VPC',
 *     EdgeLocation?: string,
 *     State?: 'AVAILABLE'|'CREATING'|'DELETING'|'FAILED'|'PENDING_ATTACHMENT_ACCEPTANCE'|'PENDING_NETWORK_UPDATE'|'PENDING_TAG_ACCEPTANCE'|'REJECTED'|'UPDATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachmentsAsync(array{
 *     CoreNetworkId?: string,
 *     AttachmentType?: 'CONNECT'|'DIRECT_CONNECT_GATEWAY'|'SITE_TO_SITE_VPN'|'TRANSIT_GATEWAY_ROUTE_TABLE'|'VPC',
 *     EdgeLocation?: string,
 *     State?: 'AVAILABLE'|'CREATING'|'DELETING'|'FAILED'|'PENDING_ATTACHMENT_ACCEPTANCE'|'PENDING_NETWORK_UPDATE'|'PENDING_TAG_ACCEPTANCE'|'REJECTED'|'UPDATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConnectPeers(array $args = [])
 * @phpstan-method \Aws\Result listConnectPeers(array{CoreNetworkId?: string, ConnectAttachmentId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectPeersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectPeersAsync(array{CoreNetworkId?: string, ConnectAttachmentId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCoreNetworkPolicyVersions(array $args = [])
 * @phpstan-method \Aws\Result listCoreNetworkPolicyVersions(array{CoreNetworkId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreNetworkPolicyVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoreNetworkPolicyVersionsAsync(array{CoreNetworkId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCoreNetworkPrefixListAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCoreNetworkPrefixListAssociations(array{CoreNetworkId?: string, PrefixListArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreNetworkPrefixListAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoreNetworkPrefixListAssociationsAsync(array{CoreNetworkId?: string, PrefixListArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCoreNetworkRoutingInformation(array $args = [])
 * @phpstan-method \Aws\Result listCoreNetworkRoutingInformation(array{
 *     CoreNetworkId?: string,
 *     SegmentName?: string,
 *     EdgeLocation?: string,
 *     NextHopFilters?: array<string, list<string>>,
 *     LocalPreferenceMatches?: list<string>,
 *     ExactAsPathMatches?: list<string>,
 *     MedMatches?: list<string>,
 *     CommunityMatches?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreNetworkRoutingInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoreNetworkRoutingInformationAsync(array{
 *     CoreNetworkId?: string,
 *     SegmentName?: string,
 *     EdgeLocation?: string,
 *     NextHopFilters?: array<string, list<string>>,
 *     LocalPreferenceMatches?: list<string>,
 *     ExactAsPathMatches?: list<string>,
 *     MedMatches?: list<string>,
 *     CommunityMatches?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCoreNetworks(array $args = [])
 * @phpstan-method \Aws\Result listCoreNetworks(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreNetworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoreNetworksAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOrganizationServiceAccessStatus(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationServiceAccessStatus(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationServiceAccessStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationServiceAccessStatusAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPeerings(array $args = [])
 * @phpstan-method \Aws\Result listPeerings(array{
 *     CoreNetworkId?: string,
 *     PeeringType?: 'TRANSIT_GATEWAY',
 *     EdgeLocation?: string,
 *     State?: 'AVAILABLE'|'CREATING'|'DELETING'|'FAILED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPeeringsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPeeringsAsync(array{
 *     CoreNetworkId?: string,
 *     PeeringType?: 'TRANSIT_GATEWAY',
 *     EdgeLocation?: string,
 *     State?: 'AVAILABLE'|'CREATING'|'DELETING'|'FAILED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putAttachmentRoutingPolicyLabel(array $args = [])
 * @phpstan-method \Aws\Result putAttachmentRoutingPolicyLabel(array{CoreNetworkId?: string, AttachmentId?: string, RoutingPolicyLabel?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAttachmentRoutingPolicyLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAttachmentRoutingPolicyLabelAsync(array{CoreNetworkId?: string, AttachmentId?: string, RoutingPolicyLabel?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result putCoreNetworkPolicy(array $args = [])
 * @phpstan-method \Aws\Result putCoreNetworkPolicy(array{
 *     CoreNetworkId?: string,
 *     PolicyDocument?: string,
 *     Description?: string,
 *     LatestVersionId?: int,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putCoreNetworkPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putCoreNetworkPolicyAsync(array{
 *     CoreNetworkId?: string,
 *     PolicyDocument?: string,
 *     Description?: string,
 *     LatestVersionId?: int,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{PolicyDocument?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{PolicyDocument?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerTransitGateway(array $args = [])
 * @phpstan-method \Aws\Result registerTransitGateway(array{GlobalNetworkId?: string, TransitGatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTransitGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerTransitGatewayAsync(array{GlobalNetworkId?: string, TransitGatewayArn?: string, ...} $args = [])
 * @method \Aws\Result rejectAttachment(array $args = [])
 * @phpstan-method \Aws\Result rejectAttachment(array{AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectAttachmentAsync(array{AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result removeAttachmentRoutingPolicyLabel(array $args = [])
 * @phpstan-method \Aws\Result removeAttachmentRoutingPolicyLabel(array{CoreNetworkId?: string, AttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAttachmentRoutingPolicyLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAttachmentRoutingPolicyLabelAsync(array{CoreNetworkId?: string, AttachmentId?: string, ...} $args = [])
 * @method \Aws\Result restoreCoreNetworkPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result restoreCoreNetworkPolicyVersion(array{CoreNetworkId?: string, PolicyVersionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreCoreNetworkPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreCoreNetworkPolicyVersionAsync(array{CoreNetworkId?: string, PolicyVersionId?: int, ...} $args = [])
 * @method \Aws\Result startOrganizationServiceAccessUpdate(array $args = [])
 * @phpstan-method \Aws\Result startOrganizationServiceAccessUpdate(array{Action?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startOrganizationServiceAccessUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startOrganizationServiceAccessUpdateAsync(array{Action?: string, ...} $args = [])
 * @method \Aws\Result startRouteAnalysis(array $args = [])
 * @phpstan-method \Aws\Result startRouteAnalysis(array{
 *     GlobalNetworkId?: string,
 *     Source?: array{TransitGatewayAttachmentArn?: string, IpAddress?: string, ...},
 *     Destination?: array{TransitGatewayAttachmentArn?: string, IpAddress?: string, ...},
 *     IncludeReturnPath?: bool,
 *     UseMiddleboxes?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRouteAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRouteAnalysisAsync(array{
 *     GlobalNetworkId?: string,
 *     Source?: array{TransitGatewayAttachmentArn?: string, IpAddress?: string, ...},
 *     Destination?: array{TransitGatewayAttachmentArn?: string, IpAddress?: string, ...},
 *     IncludeReturnPath?: bool,
 *     UseMiddleboxes?: bool,
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
 * @method \Aws\Result updateConnection(array $args = [])
 * @phpstan-method \Aws\Result updateConnection(array{
 *     GlobalNetworkId?: string,
 *     ConnectionId?: string,
 *     LinkId?: string,
 *     ConnectedLinkId?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionAsync(array{
 *     GlobalNetworkId?: string,
 *     ConnectionId?: string,
 *     LinkId?: string,
 *     ConnectedLinkId?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCoreNetwork(array $args = [])
 * @phpstan-method \Aws\Result updateCoreNetwork(array{CoreNetworkId?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCoreNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCoreNetworkAsync(array{CoreNetworkId?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateDevice(array $args = [])
 * @phpstan-method \Aws\Result updateDevice(array{
 *     GlobalNetworkId?: string,
 *     DeviceId?: string,
 *     AWSLocation?: array{Zone?: string, SubnetArn?: string, ...},
 *     Description?: string,
 *     Type?: string,
 *     Vendor?: string,
 *     Model?: string,
 *     SerialNumber?: string,
 *     Location?: array{Address?: string, Latitude?: string, Longitude?: string, ...},
 *     SiteId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeviceAsync(array{
 *     GlobalNetworkId?: string,
 *     DeviceId?: string,
 *     AWSLocation?: array{Zone?: string, SubnetArn?: string, ...},
 *     Description?: string,
 *     Type?: string,
 *     Vendor?: string,
 *     Model?: string,
 *     SerialNumber?: string,
 *     Location?: array{Address?: string, Latitude?: string, Longitude?: string, ...},
 *     SiteId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDirectConnectGatewayAttachment(array $args = [])
 * @phpstan-method \Aws\Result updateDirectConnectGatewayAttachment(array{AttachmentId?: string, EdgeLocations?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDirectConnectGatewayAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDirectConnectGatewayAttachmentAsync(array{AttachmentId?: string, EdgeLocations?: list<string>, ...} $args = [])
 * @method \Aws\Result updateGlobalNetwork(array $args = [])
 * @phpstan-method \Aws\Result updateGlobalNetwork(array{GlobalNetworkId?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlobalNetworkAsync(array{GlobalNetworkId?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateLink(array $args = [])
 * @phpstan-method \Aws\Result updateLink(array{
 *     GlobalNetworkId?: string,
 *     LinkId?: string,
 *     Description?: string,
 *     Type?: string,
 *     Bandwidth?: array{UploadSpeed?: int, DownloadSpeed?: int, ...},
 *     Provider?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLinkAsync(array{
 *     GlobalNetworkId?: string,
 *     LinkId?: string,
 *     Description?: string,
 *     Type?: string,
 *     Bandwidth?: array{UploadSpeed?: int, DownloadSpeed?: int, ...},
 *     Provider?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNetworkResourceMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkResourceMetadata(array{GlobalNetworkId?: string, ResourceArn?: string, Metadata?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkResourceMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkResourceMetadataAsync(array{GlobalNetworkId?: string, ResourceArn?: string, Metadata?: array<string, string>, ...} $args = [])
 * @method \Aws\Result updateSite(array $args = [])
 * @phpstan-method \Aws\Result updateSite(array{
 *     GlobalNetworkId?: string,
 *     SiteId?: string,
 *     Description?: string,
 *     Location?: array{Address?: string, Latitude?: string, Longitude?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSiteAsync(array{
 *     GlobalNetworkId?: string,
 *     SiteId?: string,
 *     Description?: string,
 *     Location?: array{Address?: string, Latitude?: string, Longitude?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVpcAttachment(array $args = [])
 * @phpstan-method \Aws\Result updateVpcAttachment(array{
 *     AttachmentId?: string,
 *     AddSubnetArns?: list<string>,
 *     RemoveSubnetArns?: list<string>,
 *     Options?: array{
 *         Ipv6Support?: bool,
 *         ApplianceModeSupport?: bool,
 *         DnsSupport?: bool,
 *         SecurityGroupReferencingSupport?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVpcAttachmentAsync(array{
 *     AttachmentId?: string,
 *     AddSubnetArns?: list<string>,
 *     RemoveSubnetArns?: list<string>,
 *     Options?: array{
 *         Ipv6Support?: bool,
 *         ApplianceModeSupport?: bool,
 *         DnsSupport?: bool,
 *         SecurityGroupReferencingSupport?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class NetworkManagerClient extends AwsClient {}
