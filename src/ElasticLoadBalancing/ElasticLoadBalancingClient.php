<?php
namespace Aws\ElasticLoadBalancing;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Elastic Load Balancing** service.
 *
 * @method \Aws\Result addTags(array $args = [])
 * @method \Aws\Result applySecurityGroupsToLoadBalancer(array $args = [])
 * @method \Aws\Result attachLoadBalancerToSubnets(array $args = [])
 * @method \Aws\Result configureHealthCheck(array $args = [])
 * @method \Aws\Result createAppCookieStickinessPolicy(array $args = [])
 * @method \Aws\Result createLBCookieStickinessPolicy(array $args = [])
 * @method \Aws\Result createLoadBalancer(array $args = [])
 * @method \Aws\Result createLoadBalancerListeners(array $args = [])
 * @method \Aws\Result createLoadBalancerPolicy(array $args = [])
 * @method \Aws\Result deleteLoadBalancer(array $args = [])
 * @method \Aws\Result deleteLoadBalancerListeners(array $args = [])
 * @method \Aws\Result deleteLoadBalancerPolicy(array $args = [])
 * @method \Aws\Result deregisterInstancesFromLoadBalancer(array $args = [])
 * @method \Aws\Result describeInstanceHealth(array $args = [])
 * @method \Aws\Result describeLoadBalancerAttributes(array $args = [])
 * @method \Aws\Result describeLoadBalancerPolicies(array $args = [])
 * @method \Aws\Result describeLoadBalancerPolicyTypes(array $args = [])
 * @method \Aws\Result describeLoadBalancers(array $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @method \Aws\Result detachLoadBalancerFromSubnets(array $args = [])
 * @method \Aws\Result disableAvailabilityZonesForLoadBalancer(array $args = [])
 * @method \Aws\Result enableAvailabilityZonesForLoadBalancer(array $args = [])
 * @method \Aws\Result modifyLoadBalancerAttributes(array $args = [])
 * @method \Aws\Result registerInstancesWithLoadBalancer(array $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @method \Aws\Result setLoadBalancerListenerSSLCertificate(array $args = [])
 * @method \Aws\Result setLoadBalancerPoliciesForBackendServer(array $args = [])
 * @method \Aws\Result setLoadBalancerPoliciesOfListener(array $args = [])
 */
class ElasticLoadBalancingClient extends AwsClient {}
