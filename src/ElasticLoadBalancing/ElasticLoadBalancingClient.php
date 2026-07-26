<?php
namespace Aws\ElasticLoadBalancing;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Elastic Load Balancing** service.
 *
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{LoadBalancerNames?: list<string>, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{LoadBalancerNames?: list<string>, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result applySecurityGroupsToLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result applySecurityGroupsToLoadBalancer(array{LoadBalancerName?: string, SecurityGroups?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise applySecurityGroupsToLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise applySecurityGroupsToLoadBalancerAsync(array{LoadBalancerName?: string, SecurityGroups?: list<string>, ...} $args = [])
 * @method \Aws\Result attachLoadBalancerToSubnets(array $args = [])
 * @phpstan-method \Aws\Result attachLoadBalancerToSubnets(array{LoadBalancerName?: string, Subnets?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachLoadBalancerToSubnetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachLoadBalancerToSubnetsAsync(array{LoadBalancerName?: string, Subnets?: list<string>, ...} $args = [])
 * @method \Aws\Result configureHealthCheck(array $args = [])
 * @phpstan-method \Aws\Result configureHealthCheck(array{
 *     LoadBalancerName?: string,
 *     HealthCheck?: array{Target?: string, Interval?: int, Timeout?: int, UnhealthyThreshold?: int, HealthyThreshold?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise configureHealthCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise configureHealthCheckAsync(array{
 *     LoadBalancerName?: string,
 *     HealthCheck?: array{Target?: string, Interval?: int, Timeout?: int, UnhealthyThreshold?: int, HealthyThreshold?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppCookieStickinessPolicy(array $args = [])
 * @phpstan-method \Aws\Result createAppCookieStickinessPolicy(array{LoadBalancerName?: string, PolicyName?: string, CookieName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppCookieStickinessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppCookieStickinessPolicyAsync(array{LoadBalancerName?: string, PolicyName?: string, CookieName?: string, ...} $args = [])
 * @method \Aws\Result createLBCookieStickinessPolicy(array $args = [])
 * @phpstan-method \Aws\Result createLBCookieStickinessPolicy(array{LoadBalancerName?: string, PolicyName?: string, CookieExpirationPeriod?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLBCookieStickinessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLBCookieStickinessPolicyAsync(array{LoadBalancerName?: string, PolicyName?: string, CookieExpirationPeriod?: int, ...} $args = [])
 * @method \Aws\Result createLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result createLoadBalancer(array{
 *     LoadBalancerName?: string,
 *     Listeners?: list<array{
 *         Protocol?: string,
 *         LoadBalancerPort?: int,
 *         InstanceProtocol?: string,
 *         InstancePort?: int,
 *         SSLCertificateId?: string,
 *         ...,
 *     }>,
 *     AvailabilityZones?: list<string>,
 *     Subnets?: list<string>,
 *     SecurityGroups?: list<string>,
 *     Scheme?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoadBalancerAsync(array{
 *     LoadBalancerName?: string,
 *     Listeners?: list<array{
 *         Protocol?: string,
 *         LoadBalancerPort?: int,
 *         InstanceProtocol?: string,
 *         InstancePort?: int,
 *         SSLCertificateId?: string,
 *         ...,
 *     }>,
 *     AvailabilityZones?: list<string>,
 *     Subnets?: list<string>,
 *     SecurityGroups?: list<string>,
 *     Scheme?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLoadBalancerListeners(array $args = [])
 * @phpstan-method \Aws\Result createLoadBalancerListeners(array{
 *     LoadBalancerName?: string,
 *     Listeners?: list<array{
 *         Protocol?: string,
 *         LoadBalancerPort?: int,
 *         InstanceProtocol?: string,
 *         InstancePort?: int,
 *         SSLCertificateId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoadBalancerListenersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoadBalancerListenersAsync(array{
 *     LoadBalancerName?: string,
 *     Listeners?: list<array{
 *         Protocol?: string,
 *         LoadBalancerPort?: int,
 *         InstanceProtocol?: string,
 *         InstancePort?: int,
 *         SSLCertificateId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLoadBalancerPolicy(array $args = [])
 * @phpstan-method \Aws\Result createLoadBalancerPolicy(array{
 *     LoadBalancerName?: string,
 *     PolicyName?: string,
 *     PolicyTypeName?: string,
 *     PolicyAttributes?: list<array{AttributeName?: string, AttributeValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoadBalancerPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoadBalancerPolicyAsync(array{
 *     LoadBalancerName?: string,
 *     PolicyName?: string,
 *     PolicyTypeName?: string,
 *     PolicyAttributes?: list<array{AttributeName?: string, AttributeValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result deleteLoadBalancer(array{LoadBalancerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoadBalancerAsync(array{LoadBalancerName?: string, ...} $args = [])
 * @method \Aws\Result deleteLoadBalancerListeners(array $args = [])
 * @phpstan-method \Aws\Result deleteLoadBalancerListeners(array{LoadBalancerName?: string, LoadBalancerPorts?: list<int>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoadBalancerListenersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoadBalancerListenersAsync(array{LoadBalancerName?: string, LoadBalancerPorts?: list<int>, ...} $args = [])
 * @method \Aws\Result deleteLoadBalancerPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteLoadBalancerPolicy(array{LoadBalancerName?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoadBalancerPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoadBalancerPolicyAsync(array{LoadBalancerName?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result deregisterInstancesFromLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result deregisterInstancesFromLoadBalancer(array{LoadBalancerName?: string, Instances?: list<array{InstanceId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterInstancesFromLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterInstancesFromLoadBalancerAsync(array{LoadBalancerName?: string, Instances?: list<array{InstanceId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result describeAccountLimits(array $args = [])
 * @phpstan-method \Aws\Result describeAccountLimits(array{Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array{Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeInstanceHealth(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceHealth(array{LoadBalancerName?: string, Instances?: list<array{InstanceId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceHealthAsync(array{LoadBalancerName?: string, Instances?: list<array{InstanceId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result describeLoadBalancerAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeLoadBalancerAttributes(array{LoadBalancerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancerAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoadBalancerAttributesAsync(array{LoadBalancerName?: string, ...} $args = [])
 * @method \Aws\Result describeLoadBalancerPolicies(array $args = [])
 * @phpstan-method \Aws\Result describeLoadBalancerPolicies(array{LoadBalancerName?: string, PolicyNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancerPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoadBalancerPoliciesAsync(array{LoadBalancerName?: string, PolicyNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeLoadBalancerPolicyTypes(array $args = [])
 * @phpstan-method \Aws\Result describeLoadBalancerPolicyTypes(array{PolicyTypeNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancerPolicyTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoadBalancerPolicyTypesAsync(array{PolicyTypeNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeLoadBalancers(array $args = [])
 * @phpstan-method \Aws\Result describeLoadBalancers(array{LoadBalancerNames?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoadBalancersAsync(array{LoadBalancerNames?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{LoadBalancerNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{LoadBalancerNames?: list<string>, ...} $args = [])
 * @method \Aws\Result detachLoadBalancerFromSubnets(array $args = [])
 * @phpstan-method \Aws\Result detachLoadBalancerFromSubnets(array{LoadBalancerName?: string, Subnets?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachLoadBalancerFromSubnetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachLoadBalancerFromSubnetsAsync(array{LoadBalancerName?: string, Subnets?: list<string>, ...} $args = [])
 * @method \Aws\Result disableAvailabilityZonesForLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result disableAvailabilityZonesForLoadBalancer(array{LoadBalancerName?: string, AvailabilityZones?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableAvailabilityZonesForLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableAvailabilityZonesForLoadBalancerAsync(array{LoadBalancerName?: string, AvailabilityZones?: list<string>, ...} $args = [])
 * @method \Aws\Result enableAvailabilityZonesForLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result enableAvailabilityZonesForLoadBalancer(array{LoadBalancerName?: string, AvailabilityZones?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableAvailabilityZonesForLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableAvailabilityZonesForLoadBalancerAsync(array{LoadBalancerName?: string, AvailabilityZones?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyLoadBalancerAttributes(array $args = [])
 * @phpstan-method \Aws\Result modifyLoadBalancerAttributes(array{
 *     LoadBalancerName?: string,
 *     LoadBalancerAttributes?: array{
 *         CrossZoneLoadBalancing?: array{Enabled?: bool, ...},
 *         AccessLog?: array{Enabled?: bool, S3BucketName?: string, EmitInterval?: int, S3BucketPrefix?: string, ...},
 *         ConnectionDraining?: array{Enabled?: bool, Timeout?: int, ...},
 *         ConnectionSettings?: array{IdleTimeout?: int, ...},
 *         AdditionalAttributes?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyLoadBalancerAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyLoadBalancerAttributesAsync(array{
 *     LoadBalancerName?: string,
 *     LoadBalancerAttributes?: array{
 *         CrossZoneLoadBalancing?: array{Enabled?: bool, ...},
 *         AccessLog?: array{Enabled?: bool, S3BucketName?: string, EmitInterval?: int, S3BucketPrefix?: string, ...},
 *         ConnectionDraining?: array{Enabled?: bool, Timeout?: int, ...},
 *         ConnectionSettings?: array{IdleTimeout?: int, ...},
 *         AdditionalAttributes?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerInstancesWithLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result registerInstancesWithLoadBalancer(array{LoadBalancerName?: string, Instances?: list<array{InstanceId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerInstancesWithLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerInstancesWithLoadBalancerAsync(array{LoadBalancerName?: string, Instances?: list<array{InstanceId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @phpstan-method \Aws\Result removeTags(array{LoadBalancerNames?: list<string>, Tags?: list<array{Key?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsAsync(array{LoadBalancerNames?: list<string>, Tags?: list<array{Key?: string, ...}>, ...} $args = [])
 * @method \Aws\Result setLoadBalancerListenerSSLCertificate(array $args = [])
 * @phpstan-method \Aws\Result setLoadBalancerListenerSSLCertificate(array{LoadBalancerName?: string, LoadBalancerPort?: int, SSLCertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setLoadBalancerListenerSSLCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setLoadBalancerListenerSSLCertificateAsync(array{LoadBalancerName?: string, LoadBalancerPort?: int, SSLCertificateId?: string, ...} $args = [])
 * @method \Aws\Result setLoadBalancerPoliciesForBackendServer(array $args = [])
 * @phpstan-method \Aws\Result setLoadBalancerPoliciesForBackendServer(array{LoadBalancerName?: string, InstancePort?: int, PolicyNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setLoadBalancerPoliciesForBackendServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setLoadBalancerPoliciesForBackendServerAsync(array{LoadBalancerName?: string, InstancePort?: int, PolicyNames?: list<string>, ...} $args = [])
 * @method \Aws\Result setLoadBalancerPoliciesOfListener(array $args = [])
 * @phpstan-method \Aws\Result setLoadBalancerPoliciesOfListener(array{LoadBalancerName?: string, LoadBalancerPort?: int, PolicyNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setLoadBalancerPoliciesOfListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setLoadBalancerPoliciesOfListenerAsync(array{LoadBalancerName?: string, LoadBalancerPort?: int, PolicyNames?: list<string>, ...} $args = [])
 */
class ElasticLoadBalancingClient extends AwsClient {}
