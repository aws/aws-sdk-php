<?php
namespace Aws\ElasticLoadBalancingV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Elastic Load Balancing** service.
 * @method \Aws\Result addListenerCertificates(array $args = [])
 * @phpstan-method \Aws\Result addListenerCertificates(array{ListenerArn?: string, Certificates?: list<array{CertificateArn?: string, IsDefault?: bool, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addListenerCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addListenerCertificatesAsync(array{ListenerArn?: string, Certificates?: list<array{CertificateArn?: string, IsDefault?: bool, ...}>, ...} $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{ResourceArns?: list<string>, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{ResourceArns?: list<string>, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result addTrustStoreRevocations(array $args = [])
 * @phpstan-method \Aws\Result addTrustStoreRevocations(array{
 *     TrustStoreArn?: string,
 *     RevocationContents?: list<array{S3Bucket?: string, S3Key?: string, S3ObjectVersion?: string, RevocationType?: 'CRL', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addTrustStoreRevocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTrustStoreRevocationsAsync(array{
 *     TrustStoreArn?: string,
 *     RevocationContents?: list<array{S3Bucket?: string, S3Key?: string, S3ObjectVersion?: string, RevocationType?: 'CRL', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createListener(array $args = [])
 * @phpstan-method \Aws\Result createListener(array{
 *     LoadBalancerArn?: string,
 *     Protocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     Port?: int,
 *     SslPolicy?: string,
 *     Certificates?: list<array{CertificateArn?: string, IsDefault?: bool, ...}>,
 *     DefaultActions?: list<array{
 *         Type?: 'authenticate-cognito'|'authenticate-oidc'|'fixed-response'|'forward'|'jwt-validation'|'redirect',
 *         TargetGroupArn?: string,
 *         AuthenticateOidcConfig?: array,
 *         AuthenticateCognitoConfig?: array,
 *         Order?: int,
 *         RedirectConfig?: array,
 *         FixedResponseConfig?: array,
 *         ForwardConfig?: array,
 *         JwtValidationConfig?: array,
 *         ...,
 *     }>,
 *     AlpnPolicy?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MutualAuthentication?: array{
 *         Mode?: string,
 *         TrustStoreArn?: string,
 *         IgnoreClientCertificateExpiry?: bool,
 *         TrustStoreAssociationStatus?: 'active'|'removed',
 *         AdvertiseTrustStoreCaNames?: 'off'|'on',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createListenerAsync(array{
 *     LoadBalancerArn?: string,
 *     Protocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     Port?: int,
 *     SslPolicy?: string,
 *     Certificates?: list<array{CertificateArn?: string, IsDefault?: bool, ...}>,
 *     DefaultActions?: list<array{
 *         Type?: 'authenticate-cognito'|'authenticate-oidc'|'fixed-response'|'forward'|'jwt-validation'|'redirect',
 *         TargetGroupArn?: string,
 *         AuthenticateOidcConfig?: array,
 *         AuthenticateCognitoConfig?: array,
 *         Order?: int,
 *         RedirectConfig?: array,
 *         FixedResponseConfig?: array,
 *         ForwardConfig?: array,
 *         JwtValidationConfig?: array,
 *         ...,
 *     }>,
 *     AlpnPolicy?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MutualAuthentication?: array{
 *         Mode?: string,
 *         TrustStoreArn?: string,
 *         IgnoreClientCertificateExpiry?: bool,
 *         TrustStoreAssociationStatus?: 'active'|'removed',
 *         AdvertiseTrustStoreCaNames?: 'off'|'on',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result createLoadBalancer(array{
 *     Name?: string,
 *     Subnets?: list<string>,
 *     SubnetMappings?: list<array{
 *         SubnetId?: string,
 *         AllocationId?: string,
 *         PrivateIPv4Address?: string,
 *         IPv6Address?: string,
 *         SourceNatIpv6Prefix?: string,
 *         ...,
 *     }>,
 *     SecurityGroups?: list<string>,
 *     Scheme?: 'internal'|'internet-facing',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Type?: 'application'|'gateway'|'network',
 *     IpAddressType?: 'dualstack'|'dualstack-without-public-ipv4'|'ipv4',
 *     CustomerOwnedIpv4Pool?: string,
 *     EnablePrefixForIpv6SourceNat?: 'off'|'on',
 *     IpamPools?: array{Ipv4IpamPoolId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoadBalancerAsync(array{
 *     Name?: string,
 *     Subnets?: list<string>,
 *     SubnetMappings?: list<array{
 *         SubnetId?: string,
 *         AllocationId?: string,
 *         PrivateIPv4Address?: string,
 *         IPv6Address?: string,
 *         SourceNatIpv6Prefix?: string,
 *         ...,
 *     }>,
 *     SecurityGroups?: list<string>,
 *     Scheme?: 'internal'|'internet-facing',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Type?: 'application'|'gateway'|'network',
 *     IpAddressType?: 'dualstack'|'dualstack-without-public-ipv4'|'ipv4',
 *     CustomerOwnedIpv4Pool?: string,
 *     EnablePrefixForIpv6SourceNat?: 'off'|'on',
 *     IpamPools?: array{Ipv4IpamPoolId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @phpstan-method \Aws\Result createRule(array{
 *     ListenerArn?: string,
 *     Conditions?: list<array{
 *         Field?: string,
 *         Values?: list<string>,
 *         HostHeaderConfig?: array,
 *         PathPatternConfig?: array,
 *         HttpHeaderConfig?: array,
 *         QueryStringConfig?: array,
 *         HttpRequestMethodConfig?: array,
 *         SourceIpConfig?: array,
 *         RegexValues?: list<string>,
 *         ...,
 *     }>,
 *     Priority?: int,
 *     Actions?: list<array{
 *         Type?: 'authenticate-cognito'|'authenticate-oidc'|'fixed-response'|'forward'|'jwt-validation'|'redirect',
 *         TargetGroupArn?: string,
 *         AuthenticateOidcConfig?: array,
 *         AuthenticateCognitoConfig?: array,
 *         Order?: int,
 *         RedirectConfig?: array,
 *         FixedResponseConfig?: array,
 *         ForwardConfig?: array,
 *         JwtValidationConfig?: array,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Transforms?: list<array{
 *         Type?: 'host-header-rewrite'|'url-rewrite',
 *         HostHeaderRewriteConfig?: array,
 *         UrlRewriteConfig?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleAsync(array{
 *     ListenerArn?: string,
 *     Conditions?: list<array{
 *         Field?: string,
 *         Values?: list<string>,
 *         HostHeaderConfig?: array,
 *         PathPatternConfig?: array,
 *         HttpHeaderConfig?: array,
 *         QueryStringConfig?: array,
 *         HttpRequestMethodConfig?: array,
 *         SourceIpConfig?: array,
 *         RegexValues?: list<string>,
 *         ...,
 *     }>,
 *     Priority?: int,
 *     Actions?: list<array{
 *         Type?: 'authenticate-cognito'|'authenticate-oidc'|'fixed-response'|'forward'|'jwt-validation'|'redirect',
 *         TargetGroupArn?: string,
 *         AuthenticateOidcConfig?: array,
 *         AuthenticateCognitoConfig?: array,
 *         Order?: int,
 *         RedirectConfig?: array,
 *         FixedResponseConfig?: array,
 *         ForwardConfig?: array,
 *         JwtValidationConfig?: array,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Transforms?: list<array{
 *         Type?: 'host-header-rewrite'|'url-rewrite',
 *         HostHeaderRewriteConfig?: array,
 *         UrlRewriteConfig?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTargetGroup(array $args = [])
 * @phpstan-method \Aws\Result createTargetGroup(array{
 *     Name?: string,
 *     Protocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     ProtocolVersion?: string,
 *     Port?: int,
 *     VpcId?: string,
 *     HealthCheckProtocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     HealthCheckPort?: string,
 *     HealthCheckEnabled?: bool,
 *     HealthCheckPath?: string,
 *     HealthCheckIntervalSeconds?: int,
 *     HealthCheckTimeoutSeconds?: int,
 *     HealthyThresholdCount?: int,
 *     UnhealthyThresholdCount?: int,
 *     Matcher?: array{HttpCode?: string, GrpcCode?: string, ...},
 *     TargetType?: 'alb'|'instance'|'ip'|'lambda',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IpAddressType?: 'ipv4'|'ipv6',
 *     TargetControlPort?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTargetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTargetGroupAsync(array{
 *     Name?: string,
 *     Protocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     ProtocolVersion?: string,
 *     Port?: int,
 *     VpcId?: string,
 *     HealthCheckProtocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     HealthCheckPort?: string,
 *     HealthCheckEnabled?: bool,
 *     HealthCheckPath?: string,
 *     HealthCheckIntervalSeconds?: int,
 *     HealthCheckTimeoutSeconds?: int,
 *     HealthyThresholdCount?: int,
 *     UnhealthyThresholdCount?: int,
 *     Matcher?: array{HttpCode?: string, GrpcCode?: string, ...},
 *     TargetType?: 'alb'|'instance'|'ip'|'lambda',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IpAddressType?: 'ipv4'|'ipv6',
 *     TargetControlPort?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrustStore(array $args = [])
 * @phpstan-method \Aws\Result createTrustStore(array{
 *     Name?: string,
 *     CaCertificatesBundleS3Bucket?: string,
 *     CaCertificatesBundleS3Key?: string,
 *     CaCertificatesBundleS3ObjectVersion?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrustStoreAsync(array{
 *     Name?: string,
 *     CaCertificatesBundleS3Bucket?: string,
 *     CaCertificatesBundleS3Key?: string,
 *     CaCertificatesBundleS3ObjectVersion?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteListener(array $args = [])
 * @phpstan-method \Aws\Result deleteListener(array{ListenerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteListenerAsync(array{ListenerArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result deleteLoadBalancer(array{LoadBalancerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoadBalancerAsync(array{LoadBalancerArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{RuleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{RuleArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSharedTrustStoreAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteSharedTrustStoreAssociation(array{TrustStoreArn?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSharedTrustStoreAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSharedTrustStoreAssociationAsync(array{TrustStoreArn?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTargetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteTargetGroup(array{TargetGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTargetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTargetGroupAsync(array{TargetGroupArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTrustStore(array $args = [])
 * @phpstan-method \Aws\Result deleteTrustStore(array{TrustStoreArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrustStoreAsync(array{TrustStoreArn?: string, ...} $args = [])
 * @method \Aws\Result deregisterTargets(array $args = [])
 * @phpstan-method \Aws\Result deregisterTargets(array{
 *     TargetGroupArn?: string,
 *     Targets?: list<array{Id?: string, Port?: int, AvailabilityZone?: string, QuicServerId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterTargetsAsync(array{
 *     TargetGroupArn?: string,
 *     Targets?: list<array{Id?: string, Port?: int, AvailabilityZone?: string, QuicServerId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAccountLimits(array $args = [])
 * @phpstan-method \Aws\Result describeAccountLimits(array{Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array{Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeCapacityReservation(array $args = [])
 * @phpstan-method \Aws\Result describeCapacityReservation(array{LoadBalancerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCapacityReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCapacityReservationAsync(array{LoadBalancerArn?: string, ...} $args = [])
 * @method \Aws\Result describeListenerAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeListenerAttributes(array{ListenerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeListenerAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeListenerAttributesAsync(array{ListenerArn?: string, ...} $args = [])
 * @method \Aws\Result describeListenerCertificates(array $args = [])
 * @phpstan-method \Aws\Result describeListenerCertificates(array{ListenerArn?: string, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeListenerCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeListenerCertificatesAsync(array{ListenerArn?: string, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeListeners(array $args = [])
 * @phpstan-method \Aws\Result describeListeners(array{LoadBalancerArn?: string, ListenerArns?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeListenersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeListenersAsync(array{LoadBalancerArn?: string, ListenerArns?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeLoadBalancerAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeLoadBalancerAttributes(array{LoadBalancerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancerAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoadBalancerAttributesAsync(array{LoadBalancerArn?: string, ...} $args = [])
 * @method \Aws\Result describeLoadBalancers(array $args = [])
 * @phpstan-method \Aws\Result describeLoadBalancers(array{LoadBalancerArns?: list<string>, Names?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoadBalancersAsync(array{LoadBalancerArns?: list<string>, Names?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeRules(array $args = [])
 * @phpstan-method \Aws\Result describeRules(array{ListenerArn?: string, RuleArns?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRulesAsync(array{ListenerArn?: string, RuleArns?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeSSLPolicies(array $args = [])
 * @phpstan-method \Aws\Result describeSSLPolicies(array{
 *     Names?: list<string>,
 *     Marker?: string,
 *     PageSize?: int,
 *     LoadBalancerType?: 'application'|'gateway'|'network',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSSLPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSSLPoliciesAsync(array{
 *     Names?: list<string>,
 *     Marker?: string,
 *     PageSize?: int,
 *     LoadBalancerType?: 'application'|'gateway'|'network',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{ResourceArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{ResourceArns?: list<string>, ...} $args = [])
 * @method \Aws\Result describeTargetGroupAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeTargetGroupAttributes(array{TargetGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTargetGroupAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTargetGroupAttributesAsync(array{TargetGroupArn?: string, ...} $args = [])
 * @method \Aws\Result describeTargetGroups(array $args = [])
 * @phpstan-method \Aws\Result describeTargetGroups(array{
 *     LoadBalancerArn?: string,
 *     TargetGroupArns?: list<string>,
 *     Names?: list<string>,
 *     Marker?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTargetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTargetGroupsAsync(array{
 *     LoadBalancerArn?: string,
 *     TargetGroupArns?: list<string>,
 *     Names?: list<string>,
 *     Marker?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTargetHealth(array $args = [])
 * @phpstan-method \Aws\Result describeTargetHealth(array{
 *     TargetGroupArn?: string,
 *     Targets?: list<array{Id?: string, Port?: int, AvailabilityZone?: string, QuicServerId?: string, ...}>,
 *     Include?: list<'All'|'AnomalyDetection'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTargetHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTargetHealthAsync(array{
 *     TargetGroupArn?: string,
 *     Targets?: list<array{Id?: string, Port?: int, AvailabilityZone?: string, QuicServerId?: string, ...}>,
 *     Include?: list<'All'|'AnomalyDetection'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTrustStoreAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeTrustStoreAssociations(array{TrustStoreArn?: string, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustStoreAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustStoreAssociationsAsync(array{TrustStoreArn?: string, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeTrustStoreRevocations(array $args = [])
 * @phpstan-method \Aws\Result describeTrustStoreRevocations(array{TrustStoreArn?: string, RevocationIds?: list<int>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustStoreRevocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustStoreRevocationsAsync(array{TrustStoreArn?: string, RevocationIds?: list<int>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeTrustStores(array $args = [])
 * @phpstan-method \Aws\Result describeTrustStores(array{TrustStoreArns?: list<string>, Names?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrustStoresAsync(array{TrustStoreArns?: list<string>, Names?: list<string>, Marker?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getTrustStoreCaCertificatesBundle(array $args = [])
 * @phpstan-method \Aws\Result getTrustStoreCaCertificatesBundle(array{TrustStoreArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrustStoreCaCertificatesBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrustStoreCaCertificatesBundleAsync(array{TrustStoreArn?: string, ...} $args = [])
 * @method \Aws\Result getTrustStoreRevocationContent(array $args = [])
 * @phpstan-method \Aws\Result getTrustStoreRevocationContent(array{TrustStoreArn?: string, RevocationId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrustStoreRevocationContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrustStoreRevocationContentAsync(array{TrustStoreArn?: string, RevocationId?: int, ...} $args = [])
 * @method \Aws\Result modifyCapacityReservation(array $args = [])
 * @phpstan-method \Aws\Result modifyCapacityReservation(array{
 *     LoadBalancerArn?: string,
 *     MinimumLoadBalancerCapacity?: array{CapacityUnits?: int, ...},
 *     ResetCapacityReservation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCapacityReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCapacityReservationAsync(array{
 *     LoadBalancerArn?: string,
 *     MinimumLoadBalancerCapacity?: array{CapacityUnits?: int, ...},
 *     ResetCapacityReservation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyIpPools(array $args = [])
 * @phpstan-method \Aws\Result modifyIpPools(array{
 *     LoadBalancerArn?: string,
 *     IpamPools?: array{Ipv4IpamPoolId?: string, ...},
 *     RemoveIpamPools?: list<'ipv4'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyIpPoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyIpPoolsAsync(array{
 *     LoadBalancerArn?: string,
 *     IpamPools?: array{Ipv4IpamPoolId?: string, ...},
 *     RemoveIpamPools?: list<'ipv4'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyListener(array $args = [])
 * @phpstan-method \Aws\Result modifyListener(array{
 *     ListenerArn?: string,
 *     Port?: int,
 *     Protocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     SslPolicy?: string,
 *     Certificates?: list<array{CertificateArn?: string, IsDefault?: bool, ...}>,
 *     DefaultActions?: list<array{
 *         Type?: 'authenticate-cognito'|'authenticate-oidc'|'fixed-response'|'forward'|'jwt-validation'|'redirect',
 *         TargetGroupArn?: string,
 *         AuthenticateOidcConfig?: array,
 *         AuthenticateCognitoConfig?: array,
 *         Order?: int,
 *         RedirectConfig?: array,
 *         FixedResponseConfig?: array,
 *         ForwardConfig?: array,
 *         JwtValidationConfig?: array,
 *         ...,
 *     }>,
 *     AlpnPolicy?: list<string>,
 *     MutualAuthentication?: array{
 *         Mode?: string,
 *         TrustStoreArn?: string,
 *         IgnoreClientCertificateExpiry?: bool,
 *         TrustStoreAssociationStatus?: 'active'|'removed',
 *         AdvertiseTrustStoreCaNames?: 'off'|'on',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyListenerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyListenerAsync(array{
 *     ListenerArn?: string,
 *     Port?: int,
 *     Protocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     SslPolicy?: string,
 *     Certificates?: list<array{CertificateArn?: string, IsDefault?: bool, ...}>,
 *     DefaultActions?: list<array{
 *         Type?: 'authenticate-cognito'|'authenticate-oidc'|'fixed-response'|'forward'|'jwt-validation'|'redirect',
 *         TargetGroupArn?: string,
 *         AuthenticateOidcConfig?: array,
 *         AuthenticateCognitoConfig?: array,
 *         Order?: int,
 *         RedirectConfig?: array,
 *         FixedResponseConfig?: array,
 *         ForwardConfig?: array,
 *         JwtValidationConfig?: array,
 *         ...,
 *     }>,
 *     AlpnPolicy?: list<string>,
 *     MutualAuthentication?: array{
 *         Mode?: string,
 *         TrustStoreArn?: string,
 *         IgnoreClientCertificateExpiry?: bool,
 *         TrustStoreAssociationStatus?: 'active'|'removed',
 *         AdvertiseTrustStoreCaNames?: 'off'|'on',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyListenerAttributes(array $args = [])
 * @phpstan-method \Aws\Result modifyListenerAttributes(array{ListenerArn?: string, Attributes?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyListenerAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyListenerAttributesAsync(array{ListenerArn?: string, Attributes?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result modifyLoadBalancerAttributes(array $args = [])
 * @phpstan-method \Aws\Result modifyLoadBalancerAttributes(array{LoadBalancerArn?: string, Attributes?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyLoadBalancerAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyLoadBalancerAttributesAsync(array{LoadBalancerArn?: string, Attributes?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result modifyRule(array $args = [])
 * @phpstan-method \Aws\Result modifyRule(array{
 *     RuleArn?: string,
 *     Conditions?: list<array{
 *         Field?: string,
 *         Values?: list<string>,
 *         HostHeaderConfig?: array,
 *         PathPatternConfig?: array,
 *         HttpHeaderConfig?: array,
 *         QueryStringConfig?: array,
 *         HttpRequestMethodConfig?: array,
 *         SourceIpConfig?: array,
 *         RegexValues?: list<string>,
 *         ...,
 *     }>,
 *     Actions?: list<array{
 *         Type?: 'authenticate-cognito'|'authenticate-oidc'|'fixed-response'|'forward'|'jwt-validation'|'redirect',
 *         TargetGroupArn?: string,
 *         AuthenticateOidcConfig?: array,
 *         AuthenticateCognitoConfig?: array,
 *         Order?: int,
 *         RedirectConfig?: array,
 *         FixedResponseConfig?: array,
 *         ForwardConfig?: array,
 *         JwtValidationConfig?: array,
 *         ...,
 *     }>,
 *     Transforms?: list<array{
 *         Type?: 'host-header-rewrite'|'url-rewrite',
 *         HostHeaderRewriteConfig?: array,
 *         UrlRewriteConfig?: array,
 *         ...,
 *     }>,
 *     ResetTransforms?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyRuleAsync(array{
 *     RuleArn?: string,
 *     Conditions?: list<array{
 *         Field?: string,
 *         Values?: list<string>,
 *         HostHeaderConfig?: array,
 *         PathPatternConfig?: array,
 *         HttpHeaderConfig?: array,
 *         QueryStringConfig?: array,
 *         HttpRequestMethodConfig?: array,
 *         SourceIpConfig?: array,
 *         RegexValues?: list<string>,
 *         ...,
 *     }>,
 *     Actions?: list<array{
 *         Type?: 'authenticate-cognito'|'authenticate-oidc'|'fixed-response'|'forward'|'jwt-validation'|'redirect',
 *         TargetGroupArn?: string,
 *         AuthenticateOidcConfig?: array,
 *         AuthenticateCognitoConfig?: array,
 *         Order?: int,
 *         RedirectConfig?: array,
 *         FixedResponseConfig?: array,
 *         ForwardConfig?: array,
 *         JwtValidationConfig?: array,
 *         ...,
 *     }>,
 *     Transforms?: list<array{
 *         Type?: 'host-header-rewrite'|'url-rewrite',
 *         HostHeaderRewriteConfig?: array,
 *         UrlRewriteConfig?: array,
 *         ...,
 *     }>,
 *     ResetTransforms?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyTargetGroup(array $args = [])
 * @phpstan-method \Aws\Result modifyTargetGroup(array{
 *     TargetGroupArn?: string,
 *     HealthCheckProtocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     HealthCheckPort?: string,
 *     HealthCheckPath?: string,
 *     HealthCheckEnabled?: bool,
 *     HealthCheckIntervalSeconds?: int,
 *     HealthCheckTimeoutSeconds?: int,
 *     HealthyThresholdCount?: int,
 *     UnhealthyThresholdCount?: int,
 *     Matcher?: array{HttpCode?: string, GrpcCode?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyTargetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyTargetGroupAsync(array{
 *     TargetGroupArn?: string,
 *     HealthCheckProtocol?: 'GENEVE'|'HTTP'|'HTTPS'|'QUIC'|'TCP'|'TCP_QUIC'|'TCP_UDP'|'TLS'|'UDP',
 *     HealthCheckPort?: string,
 *     HealthCheckPath?: string,
 *     HealthCheckEnabled?: bool,
 *     HealthCheckIntervalSeconds?: int,
 *     HealthCheckTimeoutSeconds?: int,
 *     HealthyThresholdCount?: int,
 *     UnhealthyThresholdCount?: int,
 *     Matcher?: array{HttpCode?: string, GrpcCode?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyTargetGroupAttributes(array $args = [])
 * @phpstan-method \Aws\Result modifyTargetGroupAttributes(array{TargetGroupArn?: string, Attributes?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyTargetGroupAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyTargetGroupAttributesAsync(array{TargetGroupArn?: string, Attributes?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result modifyTrustStore(array $args = [])
 * @phpstan-method \Aws\Result modifyTrustStore(array{
 *     TrustStoreArn?: string,
 *     CaCertificatesBundleS3Bucket?: string,
 *     CaCertificatesBundleS3Key?: string,
 *     CaCertificatesBundleS3ObjectVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyTrustStoreAsync(array{
 *     TrustStoreArn?: string,
 *     CaCertificatesBundleS3Bucket?: string,
 *     CaCertificatesBundleS3Key?: string,
 *     CaCertificatesBundleS3ObjectVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerTargets(array $args = [])
 * @phpstan-method \Aws\Result registerTargets(array{
 *     TargetGroupArn?: string,
 *     Targets?: list<array{Id?: string, Port?: int, AvailabilityZone?: string, QuicServerId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerTargetsAsync(array{
 *     TargetGroupArn?: string,
 *     Targets?: list<array{Id?: string, Port?: int, AvailabilityZone?: string, QuicServerId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeListenerCertificates(array $args = [])
 * @phpstan-method \Aws\Result removeListenerCertificates(array{ListenerArn?: string, Certificates?: list<array{CertificateArn?: string, IsDefault?: bool, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeListenerCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeListenerCertificatesAsync(array{ListenerArn?: string, Certificates?: list<array{CertificateArn?: string, IsDefault?: bool, ...}>, ...} $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @phpstan-method \Aws\Result removeTags(array{ResourceArns?: list<string>, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsAsync(array{ResourceArns?: list<string>, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result removeTrustStoreRevocations(array $args = [])
 * @phpstan-method \Aws\Result removeTrustStoreRevocations(array{TrustStoreArn?: string, RevocationIds?: list<int>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTrustStoreRevocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTrustStoreRevocationsAsync(array{TrustStoreArn?: string, RevocationIds?: list<int>, ...} $args = [])
 * @method \Aws\Result setIpAddressType(array $args = [])
 * @phpstan-method \Aws\Result setIpAddressType(array{LoadBalancerArn?: string, IpAddressType?: 'dualstack'|'dualstack-without-public-ipv4'|'ipv4', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setIpAddressTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIpAddressTypeAsync(array{LoadBalancerArn?: string, IpAddressType?: 'dualstack'|'dualstack-without-public-ipv4'|'ipv4', ...} $args = [])
 * @method \Aws\Result setRulePriorities(array $args = [])
 * @phpstan-method \Aws\Result setRulePriorities(array{RulePriorities?: list<array{RuleArn?: string, Priority?: int, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setRulePrioritiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setRulePrioritiesAsync(array{RulePriorities?: list<array{RuleArn?: string, Priority?: int, ...}>, ...} $args = [])
 * @method \Aws\Result setSecurityGroups(array $args = [])
 * @phpstan-method \Aws\Result setSecurityGroups(array{
 *     LoadBalancerArn?: string,
 *     SecurityGroups?: list<string>,
 *     EnforceSecurityGroupInboundRulesOnPrivateLinkTraffic?: 'off'|'on',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setSecurityGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setSecurityGroupsAsync(array{
 *     LoadBalancerArn?: string,
 *     SecurityGroups?: list<string>,
 *     EnforceSecurityGroupInboundRulesOnPrivateLinkTraffic?: 'off'|'on',
 *     ...,
 * } $args = [])
 * @method \Aws\Result setSubnets(array $args = [])
 * @phpstan-method \Aws\Result setSubnets(array{
 *     LoadBalancerArn?: string,
 *     Subnets?: list<string>,
 *     SubnetMappings?: list<array{
 *         SubnetId?: string,
 *         AllocationId?: string,
 *         PrivateIPv4Address?: string,
 *         IPv6Address?: string,
 *         SourceNatIpv6Prefix?: string,
 *         ...,
 *     }>,
 *     IpAddressType?: 'dualstack'|'dualstack-without-public-ipv4'|'ipv4',
 *     EnablePrefixForIpv6SourceNat?: 'off'|'on',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setSubnetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setSubnetsAsync(array{
 *     LoadBalancerArn?: string,
 *     Subnets?: list<string>,
 *     SubnetMappings?: list<array{
 *         SubnetId?: string,
 *         AllocationId?: string,
 *         PrivateIPv4Address?: string,
 *         IPv6Address?: string,
 *         SourceNatIpv6Prefix?: string,
 *         ...,
 *     }>,
 *     IpAddressType?: 'dualstack'|'dualstack-without-public-ipv4'|'ipv4',
 *     EnablePrefixForIpv6SourceNat?: 'off'|'on',
 *     ...,
 * } $args = [])
 */
class ElasticLoadBalancingV2Client extends AwsClient {}
