<?php
namespace Aws\DirectConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Direct Connect** service.
 *
 * @method \Aws\Result allocateConnectionOnInterconnect(array $args = [])
 * @method \GuzzleHttp\Promise\Promise allocateConnectionOnInterconnectAsync(array $args = [])
 * @method \Aws\Result allocatePrivateVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise allocatePrivateVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result allocatePublicVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise allocatePublicVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result confirmConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmConnectionAsync(array $args = [])
 * @method \Aws\Result confirmPrivateVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmPrivateVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result confirmPublicVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmPublicVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @method \Aws\Result createInterconnect(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createInterconnectAsync(array $args = [])
 * @method \Aws\Result createPrivateVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrivateVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result createPublicVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPublicVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @method \Aws\Result deleteInterconnect(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInterconnectAsync(array $args = [])
 * @method \Aws\Result deleteVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result describeConnections(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionsAsync(array $args = [])
 * @method \Aws\Result describeConnectionsOnInterconnect(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionsOnInterconnectAsync(array $args = [])
 * @method \Aws\Result describeInterconnects(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInterconnectsAsync(array $args = [])
 * @method \Aws\Result describeLocations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationsAsync(array $args = [])
 * @method \Aws\Result describeVirtualGateways(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualGatewaysAsync(array $args = [])
 * @method \Aws\Result describeVirtualInterfaces(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualInterfacesAsync(array $args = [])
 */
class DirectConnectClient extends AwsClient {}
