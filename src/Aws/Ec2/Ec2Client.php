<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Ec2;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Elastic Compute Cloud
 *
 * @method Model allocateAddress(array $args = array()) {@command Ec2 AllocateAddress}
 * @method Model associateAddress(array $args = array()) {@command Ec2 AssociateAddress}
 * @method Model associateDhcpOptions(array $args = array()) {@command Ec2 AssociateDhcpOptions}
 * @method Model attachVolume(array $args = array()) {@command Ec2 AttachVolume}
 * @method Model attachVpnGateway(array $args = array()) {@command Ec2 AttachVpnGateway}
 * @method Model authorizeSecurityGroupIngress(array $args = array()) {@command Ec2 AuthorizeSecurityGroupIngress}
 * @method Model bundleInstance(array $args = array()) {@command Ec2 BundleInstance}
 * @method Model cancelBundleTask(array $args = array()) {@command Ec2 CancelBundleTask}
 * @method Model confirmProductInstance(array $args = array()) {@command Ec2 ConfirmProductInstance}
 * @method Model copySnapshot(array $args = array()) {@command Ec2 CopySnapshot}
 * @method Model copyImage(array $args = array()) {@command Ec2 CopyImage}
 * @method Model createCustomerGateway(array $args = array()) {@command Ec2 CreateCustomerGateway}
 * @method Model createDhcpOptions(array $args = array()) {@command Ec2 CreateDhcpOptions}
 * @method Model createKeyPair(array $args = array()) {@command Ec2 CreateKeyPair}
 * @method Model createSecurityGroup(array $args = array()) {@command Ec2 CreateSecurityGroup}
 * @method Model createSnapshot(array $args = array()) {@command Ec2 CreateSnapshot}
 * @method Model createSubnet(array $args = array()) {@command Ec2 CreateSubnet}
 * @method Model createVolume(array $args = array()) {@command Ec2 CreateVolume}
 * @method Model createVpc(array $args = array()) {@command Ec2 CreateVpc}
 * @method Model createVpnConnection(array $args = array()) {@command Ec2 CreateVpnConnection}
 * @method Model createVpnGateway(array $args = array()) {@command Ec2 CreateVpnGateway}
 * @method Model deleteCustomerGateway(array $args = array()) {@command Ec2 DeleteCustomerGateway}
 * @method Model deleteDhcpOptions(array $args = array()) {@command Ec2 DeleteDhcpOptions}
 * @method Model deleteKeyPair(array $args = array()) {@command Ec2 DeleteKeyPair}
 * @method Model deleteSecurityGroup(array $args = array()) {@command Ec2 DeleteSecurityGroup}
 * @method Model deleteSnapshot(array $args = array()) {@command Ec2 DeleteSnapshot}
 * @method Model deleteSubnet(array $args = array()) {@command Ec2 DeleteSubnet}
 * @method Model deleteVolume(array $args = array()) {@command Ec2 DeleteVolume}
 * @method Model deleteVpc(array $args = array()) {@command Ec2 DeleteVpc}
 * @method Model deleteVpnConnection(array $args = array()) {@command Ec2 DeleteVpnConnection}
 * @method Model deleteVpnGateway(array $args = array()) {@command Ec2 DeleteVpnGateway}
 * @method Model deregisterImage(array $args = array()) {@command Ec2 DeregisterImage}
 * @method Model describeAccountAttributes(array $args = array()) {@command Ec2 DescribeAccountAttributes}
 * @method Model describeAddresses(array $args = array()) {@command Ec2 DescribeAddresses}
 * @method Model describeAvailabilityZones(array $args = array()) {@command Ec2 DescribeAvailabilityZones}
 * @method Model describeBundleTasks(array $args = array()) {@command Ec2 DescribeBundleTasks}
 * @method Model describeCustomerGateways(array $args = array()) {@command Ec2 DescribeCustomerGateways}
 * @method Model describeDhcpOptions(array $args = array()) {@command Ec2 DescribeDhcpOptions}
 * @method Model describeIdFormat(array $args = array()) {@command Ec2 DescribeIdFormat}
 * @method Model describeImageAttribute(array $args = array()) {@command Ec2 DescribeImageAttribute}
 * @method Model describeImages(array $args = array()) {@command Ec2 DescribeImages}
 * @method Model describeInstances(array $args = array()) {@command Ec2 DescribeInstances}
 * @method Model describeKeyPairs(array $args = array()) {@command Ec2 DescribeKeyPairs}
 * @method Model describeRegions(array $args = array()) {@command Ec2 DescribeRegions}
 * @method Model describeReservedInstances(array $args = array()) {@command Ec2 DescribeReservedInstances}
 * @method Model describeReservedInstancesModifications(array $args = array()) {@command Ec2 DescribeReservedInstancesModifications}
 * @method Model describeReservedInstancesOfferings(array $args = array()) {@command Ec2 DescribeReservedInstancesOfferings}
 * @method Model describeSecurityGroups(array $args = array()) {@command Ec2 DescribeSecurityGroups}
 * @method Model describeSnapshotAttribute(array $args = array()) {@command Ec2 DescribeSnapshotAttribute}
 * @method Model describeSnapshots(array $args = array()) {@command Ec2 DescribeSnapshots}
 * @method Model describeSubnets(array $args = array()) {@command Ec2 DescribeSubnets}
 * @method Model describeVolumeAttribute(array $args = array()) {@command Ec2 DescribeVolumeAttribute}
 * @method Model describeVolumes(array $args = array()) {@command Ec2 DescribeVolumes}
 * @method Model describeVolumeStatus(array $args = array()) {@command Ec2 DescribeVolumeStatus}
 * @method Model describeVpcAttribute(array $args = array()) {@command Ec2 DescribeVpcAttribute}
 * @method Model describeVpcs(array $args = array()) {@command Ec2 DescribeVpcs}
 * @method Model describeVpnConnections(array $args = array()) {@command Ec2 DescribeVpnConnections}
 * @method Model describeVpnGateways(array $args = array()) {@command Ec2 DescribeVpnGateways}
 * @method Model detachVolume(array $args = array()) {@command Ec2 DetachVolume}
 * @method Model detachVpnGateway(array $args = array()) {@command Ec2 DetachVpnGateway}
 * @method Model disassociateAddress(array $args = array()) {@command Ec2 DisassociateAddress}
 * @method Model enableVolumeIO(array $args = array()) {@command Ec2 EnableVolumeIO}
 * @method Model getConsoleOutput(array $args = array()) {@command Ec2 GetConsoleOutput}
 * @method Model getPasswordData(array $args = array()) {@command Ec2 GetPasswordData}
 * @method Model importKeyPair(array $args = array()) {@command Ec2 ImportKeyPair}
 * @method Model modifyIdFormat(array $args = array()) {@command Ec2 ModifyIdFormat}
 * @method Model modifyImageAttribute(array $args = array()) {@command Ec2 ModifyImageAttribute}
 * @method Model modifyReservedInstances(array $args = array()) {@command Ec2 ModifyReservedInstances}
 * @method Model modifySnapshotAttribute(array $args = array()) {@command Ec2 ModifySnapshotAttribute}
 * @method Model modifySubnetAttribute(array $args = array()) {@command Ec2 ModifySubnetAttribute}
 * @method Model modifyVolumeAttribute(array $args = array()) {@command Ec2 ModifyVolumeAttribute}
 * @method Model modifyVpcAttribute(array $args = array()) {@command Ec2 ModifyVpcAttribute}
 * @method Model monitorInstances(array $args = array()) {@command Ec2 MonitorInstances}
 * @method Model purchaseReservedInstancesOffering(array $args = array()) {@command Ec2 PurchaseReservedInstancesOffering}
 * @method Model rebootInstances(array $args = array()) {@command Ec2 RebootInstances}
 * @method Model registerImage(array $args = array()) {@command Ec2 RegisterImage}
 * @method Model releaseAddress(array $args = array()) {@command Ec2 ReleaseAddress}
 * @method Model resetImageAttribute(array $args = array()) {@command Ec2 ResetImageAttribute}
 * @method Model resetSnapshotAttribute(array $args = array()) {@command Ec2 ResetSnapshotAttribute}
 * @method Model revokeSecurityGroupIngress(array $args = array()) {@command Ec2 RevokeSecurityGroupIngress}
 * @method Model runInstances(array $args = array()) {@command Ec2 RunInstances}
 * @method Model terminateInstances(array $args = array()) {@command Ec2 TerminateInstances}
 * @method Model unmonitorInstances(array $args = array()) {@command Ec2 UnmonitorInstances}
 * @method Model createImage(array $args = array()) {@command Ec2 CreateImage}
 * @method Model startInstances(array $args = array()) {@command Ec2 StartInstances}
 * @method Model stopInstances(array $args = array()) {@command Ec2 StopInstances}
 * @method Model describeInstanceAttribute(array $args = array()) {@command Ec2 DescribeInstanceAttribute}
 * @method Model modifyInstanceAttribute(array $args = array()) {@command Ec2 ModifyInstanceAttribute}
 * @method Model resetInstanceAttribute(array $args = array()) {@command Ec2 ResetInstanceAttribute}
 * @method Model requestSpotInstances(array $args = array()) {@command Ec2 RequestSpotInstances}
 * @method Model describeSpotInstanceRequests(array $args = array()) {@command Ec2 DescribeSpotInstanceRequests}
 * @method Model cancelSpotInstanceRequests(array $args = array()) {@command Ec2 CancelSpotInstanceRequests}
 * @method Model describeSpotPriceHistory(array $args = array()) {@command Ec2 DescribeSpotPriceHistory}
 * @method Model createSpotDatafeedSubscription(array $args = array()) {@command Ec2 CreateSpotDatafeedSubscription}
 * @method Model describeSpotDatafeedSubscription(array $args = array()) {@command Ec2 DescribeSpotDatafeedSubscription}
 * @method Model deleteSpotDatafeedSubscription(array $args = array()) {@command Ec2 DeleteSpotDatafeedSubscription}
 * @method Model createPlacementGroup(array $args = array()) {@command Ec2 CreatePlacementGroup}
 * @method Model deletePlacementGroup(array $args = array()) {@command Ec2 DeletePlacementGroup}
 * @method Model describePlacementGroups(array $args = array()) {@command Ec2 DescribePlacementGroups}
 * @method Model createTags(array $args = array()) {@command Ec2 CreateTags}
 * @method Model describeTags(array $args = array()) {@command Ec2 DescribeTags}
 * @method Model deleteTags(array $args = array()) {@command Ec2 DeleteTags}
 * @method Model authorizeSecurityGroupEgress(array $args = array()) {@command Ec2 AuthorizeSecurityGroupEgress}
 * @method Model revokeSecurityGroupEgress(array $args = array()) {@command Ec2 RevokeSecurityGroupEgress}
 * @method Model createInternetGateway(array $args = array()) {@command Ec2 CreateInternetGateway}
 * @method Model describeInternetGateways(array $args = array()) {@command Ec2 DescribeInternetGateways}
 * @method Model deleteInternetGateway(array $args = array()) {@command Ec2 DeleteInternetGateway}
 * @method Model attachInternetGateway(array $args = array()) {@command Ec2 AttachInternetGateway}
 * @method Model detachInternetGateway(array $args = array()) {@command Ec2 DetachInternetGateway}
 * @method Model createRouteTable(array $args = array()) {@command Ec2 CreateRouteTable}
 * @method Model describeRouteTables(array $args = array()) {@command Ec2 DescribeRouteTables}
 * @method Model deleteRouteTable(array $args = array()) {@command Ec2 DeleteRouteTable}
 * @method Model associateRouteTable(array $args = array()) {@command Ec2 AssociateRouteTable}
 * @method Model replaceRouteTableAssociation(array $args = array()) {@command Ec2 ReplaceRouteTableAssociation}
 * @method Model disassociateRouteTable(array $args = array()) {@command Ec2 DisassociateRouteTable}
 * @method Model createRoute(array $args = array()) {@command Ec2 CreateRoute}
 * @method Model replaceRoute(array $args = array()) {@command Ec2 ReplaceRoute}
 * @method Model deleteRoute(array $args = array()) {@command Ec2 DeleteRoute}
 * @method Model createNetworkAcl(array $args = array()) {@command Ec2 CreateNetworkAcl}
 * @method Model describeNetworkAcls(array $args = array()) {@command Ec2 DescribeNetworkAcls}
 * @method Model deleteNetworkAcl(array $args = array()) {@command Ec2 DeleteNetworkAcl}
 * @method Model replaceNetworkAclAssociation(array $args = array()) {@command Ec2 ReplaceNetworkAclAssociation}
 * @method Model createNetworkAclEntry(array $args = array()) {@command Ec2 CreateNetworkAclEntry}
 * @method Model replaceNetworkAclEntry(array $args = array()) {@command Ec2 ReplaceNetworkAclEntry}
 * @method Model deleteNetworkAclEntry(array $args = array()) {@command Ec2 DeleteNetworkAclEntry}
 * @method Model describeInstanceStatus(array $args = array()) {@command Ec2 DescribeInstanceStatus}
 * @method Model reportInstanceStatus(array $args = array()) {@command Ec2 ReportInstanceStatus}
 * @method Model importInstance(array $args = array()) {@command Ec2 ImportInstance}
 * @method Model importVolume(array $args = array()) {@command Ec2 ImportVolume}
 * @method Model cancelConversionTask(array $args = array()) {@command Ec2 CancelConversionTask}
 * @method Model describeConversionTasks(array $args = array()) {@command Ec2 DescribeConversionTasks}
 * @method Model createNetworkInterface(array $args = array()) {@command Ec2 CreateNetworkInterface}
 * @method Model describeNetworkInterfaces(array $args = array()) {@command Ec2 DescribeNetworkInterfaces}
 * @method Model deleteNetworkInterface(array $args = array()) {@command Ec2 DeleteNetworkInterface}
 * @method Model attachNetworkInterface(array $args = array()) {@command Ec2 AttachNetworkInterface}
 * @method Model detachNetworkInterface(array $args = array()) {@command Ec2 DetachNetworkInterface}
 * @method Model describeNetworkInterfaceAttribute(array $args = array()) {@command Ec2 DescribeNetworkInterfaceAttribute}
 * @method Model modifyNetworkInterfaceAttribute(array $args = array()) {@command Ec2 ModifyNetworkInterfaceAttribute}
 * @method Model resetNetworkInterfaceAttribute(array $args = array()) {@command Ec2 ResetNetworkInterfaceAttribute}
 * @method Model describeExportTasks(array $args = array()) {@command Ec2 DescribeExportTasks}
 * @method Model createInstanceExportTask(array $args = array()) {@command Ec2 CreateInstanceExportTask}
 * @method Model cancelExportTask(array $args = array()) {@command Ec2 CancelExportTask}
 * @method Model assignPrivateIpAddresses(array $args = array()) {@command Ec2 AssignPrivateIpAddresses}
 * @method Model unassignPrivateIpAddresses(array $args = array()) {@command Ec2 UnassignPrivateIpAddresses}
 * @method Model cancelReservedInstancesListing(array $args = array()) {@command Ec2 CancelReservedInstancesListing}
 * @method Model createReservedInstancesListing(array $args = array()) {@command Ec2 CreateReservedInstancesListing}
 * @method Model describeReservedInstancesListings(array $args = array()) {@command Ec2 DescribeReservedInstancesListings}
 * @method Model enableVgwRoutePropagation(array $args = array()) {@command Ec2 EnableVgwRoutePropagation}
 * @method Model disableVgwRoutePropagation(array $args = array()) {@command Ec2 DisableVgwRoutePropagation}
 * @method Model createVpnConnectionRoute(array $args = array()) {@command Ec2 CreateVpnConnectionRoute}
 * @method Model deleteVpnConnectionRoute(array $args = array()) {@command Ec2 DeleteVpnConnectionRoute}
 * @method Model acceptVpcPeeringConnection(array $args = array()) {@command Ec2 AcceptVpcPeeringConnection}
 * @method Model createVpcPeeringConnection(array $args = array()) {@command Ec2 CreateVpcPeeringConnection}
 * @method Model deleteVpcPeeringConnection(array $args = array()) {@command Ec2 DeleteVpcPeeringConnection}
 * @method Model describeVpcPeeringConnections(array $args = array()) {@command Ec2 DescribeVpcPeeringConnections}
 * @method Model rejectVpcPeeringConnection(array $args = array()) {@command Ec2 RejectVpcPeeringConnection}
 * @method Model enableVpcClassicLink(array $args = array()) {@command Ec2 EnableVpcClassicLink}
 * @method Model disableVpcClassicLink(array $args = array()) {@command Ec2 DisableVpcClassicLink}
 * @method Model attachClassicLinkVpc(array $args = array()) {@command Ec2 AttachClassicLinkVpc}
 * @method Model detachClassicLinkVpc(array $args = array()) {@command Ec2 DetachClassicLinkVpc}
 * @method Model describeClassicLinkInstances(array $args = array()) {@command Ec2 DescribeClassicLinkInstances}
 * @method Model describeVpcClassicLink(array $args = array()) {@command Ec2 DescribeVpcClassicLink}
 * @method Model enableVpcClassicLinkDnsSupport(array $args = array()) {@command Ec2 EnableVpcClassicLinkDnsSupport}
 * @method Model disableVpcClassicLinkDnsSupport(array $args = array()) {@command Ec2 DisableVpcClassicLinkDnsSupport}
 * @method Model describeVpcClassicLinkDnsSupport(array $args = array()) {@command Ec2 DescribeVpcClassicLinkDnsSupport}
 * @method Model cancelImportTask(array $args = array()) {@command Ec2 CancelImportTask}
 * @method Model describeImportImageTasks(array $args = array()) {@command Ec2 DescribeImportImageTasks}
 * @method Model describeImportSnapshotTasks(array $args = array()) {@command Ec2 DescribeImportSnapshotTasks}
 * @method Model importImage(array $args = array()) {@command Ec2 ImportImage}
 * @method Model importSnapshot(array $args = array()) {@command Ec2 ImportSnapshot}
 * @method Model createVpcEndpoint(array $args = array()) {@command Ec2 CreateVpcEndpoint}
 * @method Model describeVpcEndpoints(array $args = array()) {@command Ec2 DescribeVpcEndpoints}
 * @method Model deleteVpcEndpoints(array $args = array()) {@command Ec2 DeleteVpcEndpoints}
 * @method Model modifyVpcEndpoint(array $args = array()) {@command Ec2 ModifyVpcEndpoint}
 * @method Model describeVpcEndpointServices(array $args = array()) {@command Ec2 DescribeVpcEndpointServices}
 * @method Model describePrefixLists(array $args = array()) {@command Ec2 DescribePrefixLists}
 * @method Model moveAddressToVpc(array $args = array()) {@command Ec2 MoveAddressToVpc}
 * @method Model restoreAddressToClassic(array $args = array()) {@command Ec2 RestoreAddressToClassic}
 * @method Model describeMovingAddresses(array $args = array()) {@command Ec2 DescribeMovingAddresses}
 * @method Model describeScheduledInstanceAvailability(array $args = array()) {@command Ec2 DescribeScheduledInstanceAvailability}
 * @method Model describeScheduledInstances(array $args = array()) {@command Ec2 DescribeScheduledInstances}
 * @method Model purchaseScheduledInstances(array $args = array()) {@command Ec2 PurchaseScheduledInstances}
 * @method Model runScheduledInstances(array $args = array()) {@command Ec2 RunScheduledInstances}
 * @method Model requestSpotFleet(array $args = array()) {@command Ec2 RequestSpotFleet}
 * @method Model describeSpotFleetRequests(array $args = array()) {@command Ec2 DescribeSpotFleetRequests}
 * @method Model describeSpotFleetInstances(array $args = array()) {@command Ec2 DescribeSpotFleetInstances}
 * @method Model cancelSpotFleetRequests(array $args = array()) {@command Ec2 CancelSpotFleetRequests}
 * @method Model describeSpotFleetRequestHistory(array $args = array()) {@command Ec2 DescribeSpotFleetRequestHistory}
 * @method Model modifySpotFleetRequest(array $args = array()) {@command Ec2 ModifySpotFleetRequest}
 * @method Model createFlowLogs(array $args = array()) {@command Ec2 CreateFlowLogs}
 * @method Model deleteFlowLogs(array $args = array()) {@command Ec2 DeleteFlowLogs}
 * @method Model describeFlowLogs(array $args = array()) {@command Ec2 DescribeFlowLogs}
 * @method Model allocateHosts(array $args = array()) {@command Ec2 AllocateHosts}
 * @method Model modifyInstancePlacement(array $args = array()) {@command Ec2 ModifyInstancePlacement}
 * @method Model modifyHosts(array $args = array()) {@command Ec2 ModifyHosts}
 * @method Model describeHosts(array $args = array()) {@command Ec2 DescribeHosts}
 * @method Model releaseHosts(array $args = array()) {@command Ec2 ReleaseHosts}
 * @method Model createNatGateway(array $args = array()) {@command Ec2 CreateNatGateway}
 * @method Model describeNatGateways(array $args = array()) {@command Ec2 DescribeNatGateways}
 * @method Model deleteNatGateway(array $args = array()) {@command Ec2 DeleteNatGateway}
 * @method waitUntilInstanceRunning(array $input) The input array uses the parameters of the DescribeInstances operation and waiter specific settings
 * @method waitUntilInstanceStopped(array $input) The input array uses the parameters of the DescribeInstances operation and waiter specific settings
 * @method waitUntilInstanceTerminated(array $input) The input array uses the parameters of the DescribeInstances operation and waiter specific settings
 * @method waitUntilExportTaskCompleted(array $input) The input array uses the parameters of the DescribeExportTasks operation and waiter specific settings
 * @method waitUntilExportTaskCancelled(array $input) The input array uses the parameters of the DescribeExportTasks operation and waiter specific settings
 * @method waitUntilSnapshotCompleted(array $input) The input array uses the parameters of the DescribeSnapshots operation and waiter specific settings
 * @method waitUntilSubnetAvailable(array $input) The input array uses the parameters of the DescribeSubnets operation and waiter specific settings
 * @method waitUntilVolumeAvailable(array $input) The input array uses the parameters of the DescribeVolumes operation and waiter specific settings
 * @method waitUntilVolumeInUse(array $input) The input array uses the parameters of the DescribeVolumes operation and waiter specific settings
 * @method waitUntilVolumeDeleted(array $input) The input array uses the parameters of the DescribeVolumes operation and waiter specific settings
 * @method waitUntilVpcAvailable(array $input) The input array uses the parameters of the DescribeVpcs operation and waiter specific settings
 * @method waitUntilVpnConnectionAvailable(array $input) The input array uses the parameters of the DescribeVpnConnections operation and waiter specific settings
 * @method waitUntilVpnConnectionDeleted(array $input) The input array uses the parameters of the DescribeVpnConnections operation and waiter specific settings
 * @method waitUntilBundleTaskComplete(array $input) The input array uses the parameters of the DescribeBundleTasks operation and waiter specific settings
 * @method waitUntilConversionTaskCompleted(array $input) The input array uses the parameters of the DescribeConversionTasks operation and waiter specific settings
 * @method waitUntilConversionTaskCancelled(array $input) The input array uses the parameters of the DescribeConversionTasks operation and waiter specific settings
 * @method waitUntilCustomerGatewayAvailable(array $input) The input array uses the parameters of the DescribeCustomerGateways operation and waiter specific settings
 * @method waitUntilConversionTaskDeleted(array $input) The input array uses the parameters of the DescribeCustomerGateways operation and waiter specific settings
 * @method ResourceIteratorInterface getDescribeAccountAttributesIterator(array $args = array()) The input array uses the parameters of the DescribeAccountAttributes operation
 * @method ResourceIteratorInterface getDescribeAddressesIterator(array $args = array()) The input array uses the parameters of the DescribeAddresses operation
 * @method ResourceIteratorInterface getDescribeAvailabilityZonesIterator(array $args = array()) The input array uses the parameters of the DescribeAvailabilityZones operation
 * @method ResourceIteratorInterface getDescribeBundleTasksIterator(array $args = array()) The input array uses the parameters of the DescribeBundleTasks operation
 * @method ResourceIteratorInterface getDescribeConversionTasksIterator(array $args = array()) The input array uses the parameters of the DescribeConversionTasks operation
 * @method ResourceIteratorInterface getDescribeCustomerGatewaysIterator(array $args = array()) The input array uses the parameters of the DescribeCustomerGateways operation
 * @method ResourceIteratorInterface getDescribeDhcpOptionsIterator(array $args = array()) The input array uses the parameters of the DescribeDhcpOptions operation
 * @method ResourceIteratorInterface getDescribeExportTasksIterator(array $args = array()) The input array uses the parameters of the DescribeExportTasks operation
 * @method ResourceIteratorInterface getDescribeImagesIterator(array $args = array()) The input array uses the parameters of the DescribeImages operation
 * @method ResourceIteratorInterface getDescribeInstanceStatusIterator(array $args = array()) The input array uses the parameters of the DescribeInstanceStatus operation
 * @method ResourceIteratorInterface getDescribeInstancesIterator(array $args = array()) The input array uses the parameters of the DescribeInstances operation
 * @method ResourceIteratorInterface getDescribeInternetGatewaysIterator(array $args = array()) The input array uses the parameters of the DescribeInternetGateways operation
 * @method ResourceIteratorInterface getDescribeKeyPairsIterator(array $args = array()) The input array uses the parameters of the DescribeKeyPairs operation
 * @method ResourceIteratorInterface getDescribeNetworkAclsIterator(array $args = array()) The input array uses the parameters of the DescribeNetworkAcls operation
 * @method ResourceIteratorInterface getDescribeNetworkInterfacesIterator(array $args = array()) The input array uses the parameters of the DescribeNetworkInterfaces operation
 * @method ResourceIteratorInterface getDescribePlacementGroupsIterator(array $args = array()) The input array uses the parameters of the DescribePlacementGroups operation
 * @method ResourceIteratorInterface getDescribeRegionsIterator(array $args = array()) The input array uses the parameters of the DescribeRegions operation
 * @method ResourceIteratorInterface getDescribeReservedInstancesIterator(array $args = array()) The input array uses the parameters of the DescribeReservedInstances operation
 * @method ResourceIteratorInterface getDescribeReservedInstancesListingsIterator(array $args = array()) The input array uses the parameters of the DescribeReservedInstancesListings operation
 * @method ResourceIteratorInterface getDescribeReservedInstancesOfferingsIterator(array $args = array()) The input array uses the parameters of the DescribeReservedInstancesOfferings operation
 * @method ResourceIteratorInterface getDescribeReservedInstancesModificationsIterator(array $args = array()) The input array uses the parameters of the DescribeReservedInstancesModifications operation
 * @method ResourceIteratorInterface getDescribeRouteTablesIterator(array $args = array()) The input array uses the parameters of the DescribeRouteTables operation
 * @method ResourceIteratorInterface getDescribeSecurityGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeSecurityGroups operation
 * @method ResourceIteratorInterface getDescribeSnapshotsIterator(array $args = array()) The input array uses the parameters of the DescribeSnapshots operation
 * @method ResourceIteratorInterface getDescribeSpotInstanceRequestsIterator(array $args = array()) The input array uses the parameters of the DescribeSpotInstanceRequests operation
 * @method ResourceIteratorInterface getDescribeSpotPriceHistoryIterator(array $args = array()) The input array uses the parameters of the DescribeSpotPriceHistory operation
 * @method ResourceIteratorInterface getDescribeSubnetsIterator(array $args = array()) The input array uses the parameters of the DescribeSubnets operation
 * @method ResourceIteratorInterface getDescribeTagsIterator(array $args = array()) The input array uses the parameters of the DescribeTags operation
 * @method ResourceIteratorInterface getDescribeVolumeStatusIterator(array $args = array()) The input array uses the parameters of the DescribeVolumeStatus operation
 * @method ResourceIteratorInterface getDescribeVolumesIterator(array $args = array()) The input array uses the parameters of the DescribeVolumes operation
 * @method ResourceIteratorInterface getDescribeVpcsIterator(array $args = array()) The input array uses the parameters of the DescribeVpcs operation
 * @method ResourceIteratorInterface getDescribeVpnConnectionsIterator(array $args = array()) The input array uses the parameters of the DescribeVpnConnections operation
 * @method ResourceIteratorInterface getDescribeVpnGatewaysIterator(array $args = array()) The input array uses the parameters of the DescribeVpnGateways operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-ec2.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.Ec2.Ec2Client.html API docs
 */
class Ec2Client extends AbstractClient
{
    const LATEST_API_VERSION = '2015-10-01';

    /**
     * Factory method to create a new AWS Elastic Compute Cloud client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/ec2-%s.php'
            ))
            ->build();

        $client->addSubscriber(new CopySnapshotListener());

        return $client;
    }
}
