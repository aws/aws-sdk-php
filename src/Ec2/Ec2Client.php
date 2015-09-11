<?php
namespace Aws\Ec2;

use Aws\AwsClient;
use Aws\Api\Service;
use Aws\Api\DocModel;
use Aws\Api\ApiProvider;

/**
 * Client used to interact with Amazon EC2.
 *
 * @method \Aws\Result acceptVpcPeeringConnection(array $args = [])
 * @method \Aws\Result allocateAddress(array $args = [])
 * @method \Aws\Result assignPrivateIpAddresses(array $args = [])
 * @method \Aws\Result associateAddress(array $args = [])
 * @method \Aws\Result associateDhcpOptions(array $args = [])
 * @method \Aws\Result associateRouteTable(array $args = [])
 * @method \Aws\Result attachClassicLinkVpc(array $args = [])
 * @method \Aws\Result attachInternetGateway(array $args = [])
 * @method \Aws\Result attachNetworkInterface(array $args = [])
 * @method \Aws\Result attachVolume(array $args = [])
 * @method \Aws\Result attachVpnGateway(array $args = [])
 * @method \Aws\Result authorizeSecurityGroupEgress(array $args = [])
 * @method \Aws\Result authorizeSecurityGroupIngress(array $args = [])
 * @method \Aws\Result bundleInstance(array $args = [])
 * @method \Aws\Result cancelBundleTask(array $args = [])
 * @method \Aws\Result cancelConversionTask(array $args = [])
 * @method \Aws\Result cancelExportTask(array $args = [])
 * @method \Aws\Result cancelImportTask(array $args = [])
 * @method \Aws\Result cancelReservedInstancesListing(array $args = [])
 * @method \Aws\Result cancelSpotFleetRequests(array $args = [])
 * @method \Aws\Result cancelSpotInstanceRequests(array $args = [])
 * @method \Aws\Result confirmProductInstance(array $args = [])
 * @method \Aws\Result copyImage(array $args = [])
 * @method \Aws\Result copySnapshot(array $args = [])
 * @method \Aws\Result createCustomerGateway(array $args = [])
 * @method \Aws\Result createDhcpOptions(array $args = [])
 * @method \Aws\Result createFlowLogs(array $args = [])
 * @method \Aws\Result createImage(array $args = [])
 * @method \Aws\Result createInstanceExportTask(array $args = [])
 * @method \Aws\Result createInternetGateway(array $args = [])
 * @method \Aws\Result createKeyPair(array $args = [])
 * @method \Aws\Result createNetworkAcl(array $args = [])
 * @method \Aws\Result createNetworkAclEntry(array $args = [])
 * @method \Aws\Result createNetworkInterface(array $args = [])
 * @method \Aws\Result createPlacementGroup(array $args = [])
 * @method \Aws\Result createReservedInstancesListing(array $args = [])
 * @method \Aws\Result createRoute(array $args = [])
 * @method \Aws\Result createRouteTable(array $args = [])
 * @method \Aws\Result createSecurityGroup(array $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @method \Aws\Result createSpotDatafeedSubscription(array $args = [])
 * @method \Aws\Result createSubnet(array $args = [])
 * @method \Aws\Result createTags(array $args = [])
 * @method \Aws\Result createVolume(array $args = [])
 * @method \Aws\Result createVpc(array $args = [])
 * @method \Aws\Result createVpcEndpoint(array $args = [])
 * @method \Aws\Result createVpcPeeringConnection(array $args = [])
 * @method \Aws\Result createVpnConnection(array $args = [])
 * @method \Aws\Result createVpnConnectionRoute(array $args = [])
 * @method \Aws\Result createVpnGateway(array $args = [])
 * @method \Aws\Result deleteCustomerGateway(array $args = [])
 * @method \Aws\Result deleteDhcpOptions(array $args = [])
 * @method \Aws\Result deleteFlowLogs(array $args = [])
 * @method \Aws\Result deleteInternetGateway(array $args = [])
 * @method \Aws\Result deleteKeyPair(array $args = [])
 * @method \Aws\Result deleteNetworkAcl(array $args = [])
 * @method \Aws\Result deleteNetworkAclEntry(array $args = [])
 * @method \Aws\Result deleteNetworkInterface(array $args = [])
 * @method \Aws\Result deletePlacementGroup(array $args = [])
 * @method \Aws\Result deleteRoute(array $args = [])
 * @method \Aws\Result deleteRouteTable(array $args = [])
 * @method \Aws\Result deleteSecurityGroup(array $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @method \Aws\Result deleteSpotDatafeedSubscription(array $args = [])
 * @method \Aws\Result deleteSubnet(array $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @method \Aws\Result deleteVolume(array $args = [])
 * @method \Aws\Result deleteVpc(array $args = [])
 * @method \Aws\Result deleteVpcEndpoints(array $args = [])
 * @method \Aws\Result deleteVpcPeeringConnection(array $args = [])
 * @method \Aws\Result deleteVpnConnection(array $args = [])
 * @method \Aws\Result deleteVpnConnectionRoute(array $args = [])
 * @method \Aws\Result deleteVpnGateway(array $args = [])
 * @method \Aws\Result deregisterImage(array $args = [])
 * @method \Aws\Result describeAccountAttributes(array $args = [])
 * @method \Aws\Result describeAddresses(array $args = [])
 * @method \Aws\Result describeAvailabilityZones(array $args = [])
 * @method \Aws\Result describeBundleTasks(array $args = [])
 * @method \Aws\Result describeClassicLinkInstances(array $args = [])
 * @method \Aws\Result describeConversionTasks(array $args = [])
 * @method \Aws\Result describeCustomerGateways(array $args = [])
 * @method \Aws\Result describeDhcpOptions(array $args = [])
 * @method \Aws\Result describeExportTasks(array $args = [])
 * @method \Aws\Result describeFlowLogs(array $args = [])
 * @method \Aws\Result describeImageAttribute(array $args = [])
 * @method \Aws\Result describeImages(array $args = [])
 * @method \Aws\Result describeImportImageTasks(array $args = [])
 * @method \Aws\Result describeImportSnapshotTasks(array $args = [])
 * @method \Aws\Result describeInstanceAttribute(array $args = [])
 * @method \Aws\Result describeInstanceStatus(array $args = [])
 * @method \Aws\Result describeInstances(array $args = [])
 * @method \Aws\Result describeInternetGateways(array $args = [])
 * @method \Aws\Result describeKeyPairs(array $args = [])
 * @method \Aws\Result describeMovingAddresses(array $args = [])
 * @method \Aws\Result describeNetworkAcls(array $args = [])
 * @method \Aws\Result describeNetworkInterfaceAttribute(array $args = [])
 * @method \Aws\Result describeNetworkInterfaces(array $args = [])
 * @method \Aws\Result describePlacementGroups(array $args = [])
 * @method \Aws\Result describePrefixLists(array $args = [])
 * @method \Aws\Result describeRegions(array $args = [])
 * @method \Aws\Result describeReservedInstances(array $args = [])
 * @method \Aws\Result describeReservedInstancesListings(array $args = [])
 * @method \Aws\Result describeReservedInstancesModifications(array $args = [])
 * @method \Aws\Result describeReservedInstancesOfferings(array $args = [])
 * @method \Aws\Result describeRouteTables(array $args = [])
 * @method \Aws\Result describeSecurityGroups(array $args = [])
 * @method \Aws\Result describeSnapshotAttribute(array $args = [])
 * @method \Aws\Result describeSnapshots(array $args = [])
 * @method \Aws\Result describeSpotDatafeedSubscription(array $args = [])
 * @method \Aws\Result describeSpotFleetInstances(array $args = [])
 * @method \Aws\Result describeSpotFleetRequestHistory(array $args = [])
 * @method \Aws\Result describeSpotFleetRequests(array $args = [])
 * @method \Aws\Result describeSpotInstanceRequests(array $args = [])
 * @method \Aws\Result describeSpotPriceHistory(array $args = [])
 * @method \Aws\Result describeSubnets(array $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @method \Aws\Result describeVolumeAttribute(array $args = [])
 * @method \Aws\Result describeVolumeStatus(array $args = [])
 * @method \Aws\Result describeVolumes(array $args = [])
 * @method \Aws\Result describeVpcAttribute(array $args = [])
 * @method \Aws\Result describeVpcClassicLink(array $args = [])
 * @method \Aws\Result describeVpcEndpointServices(array $args = [])
 * @method \Aws\Result describeVpcEndpoints(array $args = [])
 * @method \Aws\Result describeVpcPeeringConnections(array $args = [])
 * @method \Aws\Result describeVpcs(array $args = [])
 * @method \Aws\Result describeVpnConnections(array $args = [])
 * @method \Aws\Result describeVpnGateways(array $args = [])
 * @method \Aws\Result detachClassicLinkVpc(array $args = [])
 * @method \Aws\Result detachInternetGateway(array $args = [])
 * @method \Aws\Result detachNetworkInterface(array $args = [])
 * @method \Aws\Result detachVolume(array $args = [])
 * @method \Aws\Result detachVpnGateway(array $args = [])
 * @method \Aws\Result disableVgwRoutePropagation(array $args = [])
 * @method \Aws\Result disableVpcClassicLink(array $args = [])
 * @method \Aws\Result disassociateAddress(array $args = [])
 * @method \Aws\Result disassociateRouteTable(array $args = [])
 * @method \Aws\Result enableVgwRoutePropagation(array $args = [])
 * @method \Aws\Result enableVolumeIO(array $args = [])
 * @method \Aws\Result enableVpcClassicLink(array $args = [])
 * @method \Aws\Result getConsoleOutput(array $args = [])
 * @method \Aws\Result getPasswordData(array $args = [])
 * @method \Aws\Result importImage(array $args = [])
 * @method \Aws\Result importInstance(array $args = [])
 * @method \Aws\Result importKeyPair(array $args = [])
 * @method \Aws\Result importSnapshot(array $args = [])
 * @method \Aws\Result importVolume(array $args = [])
 * @method \Aws\Result modifyImageAttribute(array $args = [])
 * @method \Aws\Result modifyInstanceAttribute(array $args = [])
 * @method \Aws\Result modifyNetworkInterfaceAttribute(array $args = [])
 * @method \Aws\Result modifyReservedInstances(array $args = [])
 * @method \Aws\Result modifySnapshotAttribute(array $args = [])
 * @method \Aws\Result modifySubnetAttribute(array $args = [])
 * @method \Aws\Result modifyVolumeAttribute(array $args = [])
 * @method \Aws\Result modifyVpcAttribute(array $args = [])
 * @method \Aws\Result modifyVpcEndpoint(array $args = [])
 * @method \Aws\Result monitorInstances(array $args = [])
 * @method \Aws\Result moveAddressToVpc(array $args = [])
 * @method \Aws\Result purchaseReservedInstancesOffering(array $args = [])
 * @method \Aws\Result rebootInstances(array $args = [])
 * @method \Aws\Result registerImage(array $args = [])
 * @method \Aws\Result rejectVpcPeeringConnection(array $args = [])
 * @method \Aws\Result releaseAddress(array $args = [])
 * @method \Aws\Result replaceNetworkAclAssociation(array $args = [])
 * @method \Aws\Result replaceNetworkAclEntry(array $args = [])
 * @method \Aws\Result replaceRoute(array $args = [])
 * @method \Aws\Result replaceRouteTableAssociation(array $args = [])
 * @method \Aws\Result reportInstanceStatus(array $args = [])
 * @method \Aws\Result requestSpotFleet(array $args = [])
 * @method \Aws\Result requestSpotInstances(array $args = [])
 * @method \Aws\Result resetImageAttribute(array $args = [])
 * @method \Aws\Result resetInstanceAttribute(array $args = [])
 * @method \Aws\Result resetNetworkInterfaceAttribute(array $args = [])
 * @method \Aws\Result resetSnapshotAttribute(array $args = [])
 * @method \Aws\Result restoreAddressToClassic(array $args = [])
 * @method \Aws\Result revokeSecurityGroupEgress(array $args = [])
 * @method \Aws\Result revokeSecurityGroupIngress(array $args = [])
 * @method \Aws\Result runInstances(array $args = [])
 * @method \Aws\Result startInstances(array $args = [])
 * @method \Aws\Result stopInstances(array $args = [])
 * @method \Aws\Result terminateInstances(array $args = [])
 * @method \Aws\Result unassignPrivateIpAddresses(array $args = [])
 * @method \Aws\Result unmonitorInstances(array $args = [])
 */
class Ec2Client extends AwsClient
{
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerList()->appendInit(
                CopySnapshotMiddleware::wrap(
                    $this,
                    $args['endpoint_provider']
                ),
                'ec2.copy_snapshot'
            );
        };

        parent::__construct($args);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Several copy snapshot parameters are optional.
        $docs['shapes']['String']['refs']['CopySnapshotRequest$PresignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CopySnapshotRequest$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
