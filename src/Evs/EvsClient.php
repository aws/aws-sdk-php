<?php
namespace Aws\Evs;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic VMware Service** service.
 * @method \Aws\Result associateEipToVlan(array $args = [])
 * @phpstan-method \Aws\Result associateEipToVlan(array{clientToken?: string, environmentId?: string, vlanName?: string, allocationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateEipToVlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateEipToVlanAsync(array{clientToken?: string, environmentId?: string, vlanName?: string, allocationId?: string, ...} $args = [])
 * @method \Aws\Result createEntitlement(array $args = [])
 * @phpstan-method \Aws\Result createEntitlement(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     connectorId?: string,
 *     entitlementType?: 'WINDOWS_SERVER',
 *     vmIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEntitlementAsync(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     connectorId?: string,
 *     entitlementType?: 'WINDOWS_SERVER',
 *     vmIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     clientToken?: string,
 *     environmentName?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     serviceAccessSecurityGroups?: array{securityGroups?: list<string>, ...},
 *     vpcId?: string,
 *     serviceAccessSubnetId?: string,
 *     vcfVersion?: 'SELF_DEPLOYED'|'VCF-5.2.1'|'VCF-5.2.2',
 *     termsAccepted?: bool,
 *     initialVlans?: array{
 *         vmkManagement?: array{cidr?: string, ...},
 *         vmManagement?: array{cidr?: string, ...},
 *         vMotion?: array{cidr?: string, ...},
 *         vSan?: array{cidr?: string, ...},
 *         vTep?: array{cidr?: string, ...},
 *         edgeVTep?: array{cidr?: string, ...},
 *         nsxUplink?: array{cidr?: string, ...},
 *         hcx?: array{cidr?: string, ...},
 *         expansionVlan1?: array{cidr?: string, ...},
 *         expansionVlan2?: array{cidr?: string, ...},
 *         isHcxPublic?: bool,
 *         hcxNetworkAclId?: string,
 *         ...,
 *     },
 *     connectivityInfo?: array{privateRouteServerPeerings?: list<string>, ...},
 *     licenseInfo?: list<array{solutionKey?: string, vsanKey?: string, ...}>,
 *     hosts?: list<array{
 *         hostName?: string,
 *         keyName?: string,
 *         instanceType?: 'i4i.metal'|'i7i.metal-24xl',
 *         placementGroupId?: string,
 *         dedicatedHostId?: string,
 *         ...,
 *     }>,
 *     vcfHostnames?: array{
 *         vCenter?: string,
 *         nsx?: string,
 *         nsxManager1?: string,
 *         nsxManager2?: string,
 *         nsxManager3?: string,
 *         nsxEdge1?: string,
 *         nsxEdge2?: string,
 *         sddcManager?: string,
 *         cloudBuilder?: string,
 *         ...,
 *     },
 *     siteId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     clientToken?: string,
 *     environmentName?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     serviceAccessSecurityGroups?: array{securityGroups?: list<string>, ...},
 *     vpcId?: string,
 *     serviceAccessSubnetId?: string,
 *     vcfVersion?: 'SELF_DEPLOYED'|'VCF-5.2.1'|'VCF-5.2.2',
 *     termsAccepted?: bool,
 *     initialVlans?: array{
 *         vmkManagement?: array{cidr?: string, ...},
 *         vmManagement?: array{cidr?: string, ...},
 *         vMotion?: array{cidr?: string, ...},
 *         vSan?: array{cidr?: string, ...},
 *         vTep?: array{cidr?: string, ...},
 *         edgeVTep?: array{cidr?: string, ...},
 *         nsxUplink?: array{cidr?: string, ...},
 *         hcx?: array{cidr?: string, ...},
 *         expansionVlan1?: array{cidr?: string, ...},
 *         expansionVlan2?: array{cidr?: string, ...},
 *         isHcxPublic?: bool,
 *         hcxNetworkAclId?: string,
 *         ...,
 *     },
 *     connectivityInfo?: array{privateRouteServerPeerings?: list<string>, ...},
 *     licenseInfo?: list<array{solutionKey?: string, vsanKey?: string, ...}>,
 *     hosts?: list<array{
 *         hostName?: string,
 *         keyName?: string,
 *         instanceType?: 'i4i.metal'|'i7i.metal-24xl',
 *         placementGroupId?: string,
 *         dedicatedHostId?: string,
 *         ...,
 *     }>,
 *     vcfHostnames?: array{
 *         vCenter?: string,
 *         nsx?: string,
 *         nsxManager1?: string,
 *         nsxManager2?: string,
 *         nsxManager3?: string,
 *         nsxEdge1?: string,
 *         nsxEdge2?: string,
 *         sddcManager?: string,
 *         cloudBuilder?: string,
 *         ...,
 *     },
 *     siteId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentConnector(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentConnector(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     type?: 'OPERATIONS_MANAGER'|'SDDC_MANAGER'|'VCENTER',
 *     applianceFqdn?: string,
 *     secretIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentConnectorAsync(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     type?: 'OPERATIONS_MANAGER'|'SDDC_MANAGER'|'VCENTER',
 *     applianceFqdn?: string,
 *     secretIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentHost(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentHost(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     host?: array{
 *         hostName?: string,
 *         keyName?: string,
 *         instanceType?: 'i4i.metal'|'i7i.metal-24xl',
 *         placementGroupId?: string,
 *         dedicatedHostId?: string,
 *         ...,
 *     },
 *     esxVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentHostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentHostAsync(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     host?: array{
 *         hostName?: string,
 *         keyName?: string,
 *         instanceType?: 'i4i.metal'|'i7i.metal-24xl',
 *         placementGroupId?: string,
 *         dedicatedHostId?: string,
 *         ...,
 *     },
 *     esxVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteEntitlement(array $args = [])
 * @phpstan-method \Aws\Result deleteEntitlement(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     connectorId?: string,
 *     entitlementType?: 'WINDOWS_SERVER',
 *     vmIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEntitlementAsync(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     connectorId?: string,
 *     entitlementType?: 'WINDOWS_SERVER',
 *     vmIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{clientToken?: string, environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{clientToken?: string, environmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentConnector(array{clientToken?: string, environmentId?: string, connectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentConnectorAsync(array{clientToken?: string, environmentId?: string, connectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentHost(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentHost(array{clientToken?: string, environmentId?: string, hostName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentHostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentHostAsync(array{clientToken?: string, environmentId?: string, hostName?: string, ...} $args = [])
 * @method \Aws\Result disassociateEipFromVlan(array $args = [])
 * @phpstan-method \Aws\Result disassociateEipFromVlan(array{clientToken?: string, environmentId?: string, vlanName?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateEipFromVlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateEipFromVlanAsync(array{clientToken?: string, environmentId?: string, vlanName?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result getDepotUrl(array $args = [])
 * @phpstan-method \Aws\Result getDepotUrl(array{environmentId?: string, rotate?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDepotUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDepotUrlAsync(array{environmentId?: string, rotate?: bool, ...} $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result getVersions(array $args = [])
 * @phpstan-method \Aws\Result getVersions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVersionsAsync(array{...} $args = [])
 * @method \Aws\Result listEnvironmentConnectors(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentConnectors(array{nextToken?: string, maxResults?: int, environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentConnectorsAsync(array{nextToken?: string, maxResults?: int, environmentId?: string, ...} $args = [])
 * @method \Aws\Result listEnvironmentHosts(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentHosts(array{nextToken?: string, maxResults?: int, environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentHostsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentHostsAsync(array{nextToken?: string, maxResults?: int, environmentId?: string, ...} $args = [])
 * @method \Aws\Result listEnvironmentVlans(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentVlans(array{nextToken?: string, maxResults?: int, environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentVlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentVlansAsync(array{nextToken?: string, maxResults?: int, environmentId?: string, ...} $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     state?: list<'CREATED'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     state?: list<'CREATED'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVmEntitlements(array $args = [])
 * @phpstan-method \Aws\Result listVmEntitlements(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     environmentId?: string,
 *     connectorId?: string,
 *     entitlementType?: 'WINDOWS_SERVER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVmEntitlementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVmEntitlementsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     environmentId?: string,
 *     connectorId?: string,
 *     entitlementType?: 'WINDOWS_SERVER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEnvironmentConnector(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironmentConnector(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     connectorId?: string,
 *     applianceFqdn?: string,
 *     secretIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentConnectorAsync(array{
 *     clientToken?: string,
 *     environmentId?: string,
 *     connectorId?: string,
 *     applianceFqdn?: string,
 *     secretIdentifier?: string,
 *     ...,
 * } $args = [])
 */
class EvsClient extends AwsClient {}
