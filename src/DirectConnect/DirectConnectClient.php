<?php
namespace Aws\DirectConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Direct Connect** service.
 *
 * @method \Aws\Result allocateConnectionOnInterconnect(array $args = [])
 * @method \Aws\Result allocatePrivateVirtualInterface(array $args = [])
 * @method \Aws\Result allocatePublicVirtualInterface(array $args = [])
 * @method \Aws\Result confirmConnection(array $args = [])
 * @method \Aws\Result confirmPrivateVirtualInterface(array $args = [])
 * @method \Aws\Result confirmPublicVirtualInterface(array $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @method \Aws\Result createInterconnect(array $args = [])
 * @method \Aws\Result createPrivateVirtualInterface(array $args = [])
 * @method \Aws\Result createPublicVirtualInterface(array $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @method \Aws\Result deleteInterconnect(array $args = [])
 * @method \Aws\Result deleteVirtualInterface(array $args = [])
 * @method \Aws\Result describeConnections(array $args = [])
 * @method \Aws\Result describeConnectionsOnInterconnect(array $args = [])
 * @method \Aws\Result describeInterconnects(array $args = [])
 * @method \Aws\Result describeLocations(array $args = [])
 * @method \Aws\Result describeVirtualGateways(array $args = [])
 * @method \Aws\Result describeVirtualInterfaces(array $args = [])
 */
class DirectConnectClient extends AwsClient {}
