<?php
namespace Aws\CloudFront;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudFront** service.
 *
 * @method \Aws\Result createCloudFrontOriginAccessIdentity(array $args = [])
 * @phpstan-method \Aws\Result createCloudFrontOriginAccessIdentity(array{CloudFrontOriginAccessIdentityConfig?: array{CallerReference?: string, Comment?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudFrontOriginAccessIdentityAsync(array{CloudFrontOriginAccessIdentityConfig?: array{CallerReference?: string, Comment?: string, ...}, ...} $args = [])
 * @method \Aws\Result createDistribution(array $args = [])
 * @phpstan-method \Aws\Result createDistribution(array{
 *     DistributionConfig?: array{
 *         CallerReference?: string,
 *         Aliases?: array{Quantity?: int, Items?: list<string>, ...},
 *         DefaultRootObject?: string,
 *         Origins?: array{Quantity?: int, Items?: list<array>, ...},
 *         OriginGroups?: array{Quantity?: int, Items?: list<array>, ...},
 *         DefaultCacheBehavior?: array{
 *             TargetOriginId?: string,
 *             TrustedSigners?: array,
 *             TrustedKeyGroups?: array,
 *             ViewerProtocolPolicy?: 'allow-all'|'https-only'|'redirect-to-https',
 *             AllowedMethods?: array,
 *             SmoothStreaming?: bool,
 *             Compress?: bool,
 *             LambdaFunctionAssociations?: array,
 *             FunctionAssociations?: array,
 *             FieldLevelEncryptionId?: string,
 *             RealtimeLogConfigArn?: string,
 *             CachePolicyId?: string,
 *             OriginRequestPolicyId?: string,
 *             ResponseHeadersPolicyId?: string,
 *             GrpcConfig?: array,
 *             ForwardedValues?: array,
 *             MinTTL?: int,
 *             DefaultTTL?: int,
 *             MaxTTL?: int,
 *             ...,
 *         },
 *         CacheBehaviors?: array{Quantity?: int, Items?: list<array>, ...},
 *         CustomErrorResponses?: array{Quantity?: int, Items?: list<array>, ...},
 *         Comment?: string,
 *         Logging?: array{Enabled?: bool, IncludeCookies?: bool, Bucket?: string, Prefix?: string, ...},
 *         PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *         Enabled?: bool,
 *         ViewerCertificate?: array{
 *             CloudFrontDefaultCertificate?: bool,
 *             IAMCertificateId?: string,
 *             ACMCertificateArn?: string,
 *             SSLSupportMethod?: 'sni-only'|'static-ip'|'vip',
 *             MinimumProtocolVersion?: 'SSLv3'|'TLSv1'|'TLSv1.1_2016'|'TLSv1.2_2018'|'TLSv1.2_2019'|'TLSv1.2_2021'|'TLSv1.2_2025'|'TLSv1.3_2025'|'TLSv1_2016',
 *             Certificate?: string,
 *             CertificateSource?: 'acm'|'cloudfront'|'iam',
 *             ...,
 *         },
 *         Restrictions?: array{GeoRestriction?: array, ...},
 *         WebACLId?: string,
 *         HttpVersion?: 'http1.1'|'http2'|'http2and3'|'http3',
 *         IsIPV6Enabled?: bool,
 *         ContinuousDeploymentPolicyId?: string,
 *         Staging?: bool,
 *         AnycastIpListId?: string,
 *         TenantConfig?: array{ParameterDefinitions?: list<array>, ...},
 *         ConnectionMode?: 'direct'|'tenant-only',
 *         ViewerMtlsConfig?: array{Mode?: 'optional'|'passthrough'|'required', TrustStoreConfig?: array, ...},
 *         ConnectionFunctionAssociation?: array{Id?: string, ...},
 *         CacheTagConfig?: array{HeaderName?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDistributionAsync(array{
 *     DistributionConfig?: array{
 *         CallerReference?: string,
 *         Aliases?: array{Quantity?: int, Items?: list<string>, ...},
 *         DefaultRootObject?: string,
 *         Origins?: array{Quantity?: int, Items?: list<array>, ...},
 *         OriginGroups?: array{Quantity?: int, Items?: list<array>, ...},
 *         DefaultCacheBehavior?: array{
 *             TargetOriginId?: string,
 *             TrustedSigners?: array,
 *             TrustedKeyGroups?: array,
 *             ViewerProtocolPolicy?: 'allow-all'|'https-only'|'redirect-to-https',
 *             AllowedMethods?: array,
 *             SmoothStreaming?: bool,
 *             Compress?: bool,
 *             LambdaFunctionAssociations?: array,
 *             FunctionAssociations?: array,
 *             FieldLevelEncryptionId?: string,
 *             RealtimeLogConfigArn?: string,
 *             CachePolicyId?: string,
 *             OriginRequestPolicyId?: string,
 *             ResponseHeadersPolicyId?: string,
 *             GrpcConfig?: array,
 *             ForwardedValues?: array,
 *             MinTTL?: int,
 *             DefaultTTL?: int,
 *             MaxTTL?: int,
 *             ...,
 *         },
 *         CacheBehaviors?: array{Quantity?: int, Items?: list<array>, ...},
 *         CustomErrorResponses?: array{Quantity?: int, Items?: list<array>, ...},
 *         Comment?: string,
 *         Logging?: array{Enabled?: bool, IncludeCookies?: bool, Bucket?: string, Prefix?: string, ...},
 *         PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *         Enabled?: bool,
 *         ViewerCertificate?: array{
 *             CloudFrontDefaultCertificate?: bool,
 *             IAMCertificateId?: string,
 *             ACMCertificateArn?: string,
 *             SSLSupportMethod?: 'sni-only'|'static-ip'|'vip',
 *             MinimumProtocolVersion?: 'SSLv3'|'TLSv1'|'TLSv1.1_2016'|'TLSv1.2_2018'|'TLSv1.2_2019'|'TLSv1.2_2021'|'TLSv1.2_2025'|'TLSv1.3_2025'|'TLSv1_2016',
 *             Certificate?: string,
 *             CertificateSource?: 'acm'|'cloudfront'|'iam',
 *             ...,
 *         },
 *         Restrictions?: array{GeoRestriction?: array, ...},
 *         WebACLId?: string,
 *         HttpVersion?: 'http1.1'|'http2'|'http2and3'|'http3',
 *         IsIPV6Enabled?: bool,
 *         ContinuousDeploymentPolicyId?: string,
 *         Staging?: bool,
 *         AnycastIpListId?: string,
 *         TenantConfig?: array{ParameterDefinitions?: list<array>, ...},
 *         ConnectionMode?: 'direct'|'tenant-only',
 *         ViewerMtlsConfig?: array{Mode?: 'optional'|'passthrough'|'required', TrustStoreConfig?: array, ...},
 *         ConnectionFunctionAssociation?: array{Id?: string, ...},
 *         CacheTagConfig?: array{HeaderName?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInvalidation(array $args = [])
 * @phpstan-method \Aws\Result createInvalidation(array{
 *     DistributionId?: string,
 *     InvalidationBatch?: array{Paths?: array{Quantity?: int, Items?: list<string>, ...}, CallerReference?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInvalidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInvalidationAsync(array{
 *     DistributionId?: string,
 *     InvalidationBatch?: array{Paths?: array{Quantity?: int, Items?: list<string>, ...}, CallerReference?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStreamingDistribution(array $args = [])
 * @phpstan-method \Aws\Result createStreamingDistribution(array{
 *     StreamingDistributionConfig?: array{
 *         CallerReference?: string,
 *         S3Origin?: array{DomainName?: string, OriginAccessIdentity?: string, ...},
 *         Aliases?: array{Quantity?: int, Items?: list<string>, ...},
 *         Comment?: string,
 *         Logging?: array{Enabled?: bool, Bucket?: string, Prefix?: string, ...},
 *         TrustedSigners?: array{Enabled?: bool, Quantity?: int, Items?: list<string>, ...},
 *         PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *         Enabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamingDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamingDistributionAsync(array{
 *     StreamingDistributionConfig?: array{
 *         CallerReference?: string,
 *         S3Origin?: array{DomainName?: string, OriginAccessIdentity?: string, ...},
 *         Aliases?: array{Quantity?: int, Items?: list<string>, ...},
 *         Comment?: string,
 *         Logging?: array{Enabled?: bool, Bucket?: string, Prefix?: string, ...},
 *         TrustedSigners?: array{Enabled?: bool, Quantity?: int, Items?: list<string>, ...},
 *         PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *         Enabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCloudFrontOriginAccessIdentity(array $args = [])
 * @phpstan-method \Aws\Result deleteCloudFrontOriginAccessIdentity(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCloudFrontOriginAccessIdentityAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteDistribution(array $args = [])
 * @phpstan-method \Aws\Result deleteDistribution(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDistributionAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteStreamingDistribution(array $args = [])
 * @phpstan-method \Aws\Result deleteStreamingDistribution(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStreamingDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStreamingDistributionAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result getCloudFrontOriginAccessIdentity(array $args = [])
 * @phpstan-method \Aws\Result getCloudFrontOriginAccessIdentity(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudFrontOriginAccessIdentityAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getCloudFrontOriginAccessIdentityConfig(array $args = [])
 * @phpstan-method \Aws\Result getCloudFrontOriginAccessIdentityConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudFrontOriginAccessIdentityConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudFrontOriginAccessIdentityConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getDistribution(array $args = [])
 * @phpstan-method \Aws\Result getDistribution(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getDistributionConfig(array $args = [])
 * @phpstan-method \Aws\Result getDistributionConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getInvalidation(array $args = [])
 * @phpstan-method \Aws\Result getInvalidation(array{DistributionId?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvalidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvalidationAsync(array{DistributionId?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result getStreamingDistribution(array $args = [])
 * @phpstan-method \Aws\Result getStreamingDistribution(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamingDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamingDistributionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getStreamingDistributionConfig(array $args = [])
 * @phpstan-method \Aws\Result getStreamingDistributionConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamingDistributionConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamingDistributionConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result listCloudFrontOriginAccessIdentities(array $args = [])
 * @phpstan-method \Aws\Result listCloudFrontOriginAccessIdentities(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCloudFrontOriginAccessIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCloudFrontOriginAccessIdentitiesAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listDistributions(array $args = [])
 * @phpstan-method \Aws\Result listDistributions(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByWebACLId(array $args = [])
 * @phpstan-method \Aws\Result listDistributionsByWebACLId(array{Marker?: string, MaxItems?: string, WebACLId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByWebACLIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByWebACLIdAsync(array{Marker?: string, MaxItems?: string, WebACLId?: string, ...} $args = [])
 * @method \Aws\Result listInvalidations(array $args = [])
 * @phpstan-method \Aws\Result listInvalidations(array{DistributionId?: string, Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvalidationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvalidationsAsync(array{DistributionId?: string, Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listStreamingDistributions(array $args = [])
 * @phpstan-method \Aws\Result listStreamingDistributions(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamingDistributionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamingDistributionsAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result updateCloudFrontOriginAccessIdentity(array $args = [])
 * @phpstan-method \Aws\Result updateCloudFrontOriginAccessIdentity(array{
 *     CloudFrontOriginAccessIdentityConfig?: array{CallerReference?: string, Comment?: string, ...},
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCloudFrontOriginAccessIdentityAsync(array{
 *     CloudFrontOriginAccessIdentityConfig?: array{CallerReference?: string, Comment?: string, ...},
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDistribution(array $args = [])
 * @phpstan-method \Aws\Result updateDistribution(array{
 *     DistributionConfig?: array{
 *         CallerReference?: string,
 *         Aliases?: array{Quantity?: int, Items?: list<string>, ...},
 *         DefaultRootObject?: string,
 *         Origins?: array{Quantity?: int, Items?: list<array>, ...},
 *         OriginGroups?: array{Quantity?: int, Items?: list<array>, ...},
 *         DefaultCacheBehavior?: array{
 *             TargetOriginId?: string,
 *             TrustedSigners?: array,
 *             TrustedKeyGroups?: array,
 *             ViewerProtocolPolicy?: 'allow-all'|'https-only'|'redirect-to-https',
 *             AllowedMethods?: array,
 *             SmoothStreaming?: bool,
 *             Compress?: bool,
 *             LambdaFunctionAssociations?: array,
 *             FunctionAssociations?: array,
 *             FieldLevelEncryptionId?: string,
 *             RealtimeLogConfigArn?: string,
 *             CachePolicyId?: string,
 *             OriginRequestPolicyId?: string,
 *             ResponseHeadersPolicyId?: string,
 *             GrpcConfig?: array,
 *             ForwardedValues?: array,
 *             MinTTL?: int,
 *             DefaultTTL?: int,
 *             MaxTTL?: int,
 *             ...,
 *         },
 *         CacheBehaviors?: array{Quantity?: int, Items?: list<array>, ...},
 *         CustomErrorResponses?: array{Quantity?: int, Items?: list<array>, ...},
 *         Comment?: string,
 *         Logging?: array{Enabled?: bool, IncludeCookies?: bool, Bucket?: string, Prefix?: string, ...},
 *         PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *         Enabled?: bool,
 *         ViewerCertificate?: array{
 *             CloudFrontDefaultCertificate?: bool,
 *             IAMCertificateId?: string,
 *             ACMCertificateArn?: string,
 *             SSLSupportMethod?: 'sni-only'|'static-ip'|'vip',
 *             MinimumProtocolVersion?: 'SSLv3'|'TLSv1'|'TLSv1.1_2016'|'TLSv1.2_2018'|'TLSv1.2_2019'|'TLSv1.2_2021'|'TLSv1.2_2025'|'TLSv1.3_2025'|'TLSv1_2016',
 *             Certificate?: string,
 *             CertificateSource?: 'acm'|'cloudfront'|'iam',
 *             ...,
 *         },
 *         Restrictions?: array{GeoRestriction?: array, ...},
 *         WebACLId?: string,
 *         HttpVersion?: 'http1.1'|'http2'|'http2and3'|'http3',
 *         IsIPV6Enabled?: bool,
 *         ContinuousDeploymentPolicyId?: string,
 *         Staging?: bool,
 *         AnycastIpListId?: string,
 *         TenantConfig?: array{ParameterDefinitions?: list<array>, ...},
 *         ConnectionMode?: 'direct'|'tenant-only',
 *         ViewerMtlsConfig?: array{Mode?: 'optional'|'passthrough'|'required', TrustStoreConfig?: array, ...},
 *         ConnectionFunctionAssociation?: array{Id?: string, ...},
 *         CacheTagConfig?: array{HeaderName?: string, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDistributionAsync(array{
 *     DistributionConfig?: array{
 *         CallerReference?: string,
 *         Aliases?: array{Quantity?: int, Items?: list<string>, ...},
 *         DefaultRootObject?: string,
 *         Origins?: array{Quantity?: int, Items?: list<array>, ...},
 *         OriginGroups?: array{Quantity?: int, Items?: list<array>, ...},
 *         DefaultCacheBehavior?: array{
 *             TargetOriginId?: string,
 *             TrustedSigners?: array,
 *             TrustedKeyGroups?: array,
 *             ViewerProtocolPolicy?: 'allow-all'|'https-only'|'redirect-to-https',
 *             AllowedMethods?: array,
 *             SmoothStreaming?: bool,
 *             Compress?: bool,
 *             LambdaFunctionAssociations?: array,
 *             FunctionAssociations?: array,
 *             FieldLevelEncryptionId?: string,
 *             RealtimeLogConfigArn?: string,
 *             CachePolicyId?: string,
 *             OriginRequestPolicyId?: string,
 *             ResponseHeadersPolicyId?: string,
 *             GrpcConfig?: array,
 *             ForwardedValues?: array,
 *             MinTTL?: int,
 *             DefaultTTL?: int,
 *             MaxTTL?: int,
 *             ...,
 *         },
 *         CacheBehaviors?: array{Quantity?: int, Items?: list<array>, ...},
 *         CustomErrorResponses?: array{Quantity?: int, Items?: list<array>, ...},
 *         Comment?: string,
 *         Logging?: array{Enabled?: bool, IncludeCookies?: bool, Bucket?: string, Prefix?: string, ...},
 *         PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *         Enabled?: bool,
 *         ViewerCertificate?: array{
 *             CloudFrontDefaultCertificate?: bool,
 *             IAMCertificateId?: string,
 *             ACMCertificateArn?: string,
 *             SSLSupportMethod?: 'sni-only'|'static-ip'|'vip',
 *             MinimumProtocolVersion?: 'SSLv3'|'TLSv1'|'TLSv1.1_2016'|'TLSv1.2_2018'|'TLSv1.2_2019'|'TLSv1.2_2021'|'TLSv1.2_2025'|'TLSv1.3_2025'|'TLSv1_2016',
 *             Certificate?: string,
 *             CertificateSource?: 'acm'|'cloudfront'|'iam',
 *             ...,
 *         },
 *         Restrictions?: array{GeoRestriction?: array, ...},
 *         WebACLId?: string,
 *         HttpVersion?: 'http1.1'|'http2'|'http2and3'|'http3',
 *         IsIPV6Enabled?: bool,
 *         ContinuousDeploymentPolicyId?: string,
 *         Staging?: bool,
 *         AnycastIpListId?: string,
 *         TenantConfig?: array{ParameterDefinitions?: list<array>, ...},
 *         ConnectionMode?: 'direct'|'tenant-only',
 *         ViewerMtlsConfig?: array{Mode?: 'optional'|'passthrough'|'required', TrustStoreConfig?: array, ...},
 *         ConnectionFunctionAssociation?: array{Id?: string, ...},
 *         CacheTagConfig?: array{HeaderName?: string, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStreamingDistribution(array $args = [])
 * @phpstan-method \Aws\Result updateStreamingDistribution(array{
 *     StreamingDistributionConfig?: array{
 *         CallerReference?: string,
 *         S3Origin?: array{DomainName?: string, OriginAccessIdentity?: string, ...},
 *         Aliases?: array{Quantity?: int, Items?: list<string>, ...},
 *         Comment?: string,
 *         Logging?: array{Enabled?: bool, Bucket?: string, Prefix?: string, ...},
 *         TrustedSigners?: array{Enabled?: bool, Quantity?: int, Items?: list<string>, ...},
 *         PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *         Enabled?: bool,
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStreamingDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStreamingDistributionAsync(array{
 *     StreamingDistributionConfig?: array{
 *         CallerReference?: string,
 *         S3Origin?: array{DomainName?: string, OriginAccessIdentity?: string, ...},
 *         Aliases?: array{Quantity?: int, Items?: list<string>, ...},
 *         Comment?: string,
 *         Logging?: array{Enabled?: bool, Bucket?: string, Prefix?: string, ...},
 *         TrustedSigners?: array{Enabled?: bool, Quantity?: int, Items?: list<string>, ...},
 *         PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *         Enabled?: bool,
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDistributionWithTags(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result createDistributionWithTags(array{
 *     DistributionConfigWithTags?: array{
 *         DistributionConfig?: array{
 *             CallerReference?: string,
 *             Aliases?: array,
 *             DefaultRootObject?: string,
 *             Origins?: array,
 *             OriginGroups?: array,
 *             DefaultCacheBehavior?: array,
 *             CacheBehaviors?: array,
 *             CustomErrorResponses?: array,
 *             Comment?: string,
 *             Logging?: array,
 *             PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *             Enabled?: bool,
 *             ViewerCertificate?: array,
 *             Restrictions?: array,
 *             WebACLId?: string,
 *             HttpVersion?: 'http1.1'|'http2'|'http2and3'|'http3',
 *             IsIPV6Enabled?: bool,
 *             ContinuousDeploymentPolicyId?: string,
 *             Staging?: bool,
 *             AnycastIpListId?: string,
 *             TenantConfig?: array,
 *             ConnectionMode?: 'direct'|'tenant-only',
 *             ViewerMtlsConfig?: array,
 *             ConnectionFunctionAssociation?: array,
 *             CacheTagConfig?: array,
 *             ...,
 *         },
 *         Tags?: array{Items?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDistributionWithTagsAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDistributionWithTagsAsync(array{
 *     DistributionConfigWithTags?: array{
 *         DistributionConfig?: array{
 *             CallerReference?: string,
 *             Aliases?: array,
 *             DefaultRootObject?: string,
 *             Origins?: array,
 *             OriginGroups?: array,
 *             DefaultCacheBehavior?: array,
 *             CacheBehaviors?: array,
 *             CustomErrorResponses?: array,
 *             Comment?: string,
 *             Logging?: array,
 *             PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *             Enabled?: bool,
 *             ViewerCertificate?: array,
 *             Restrictions?: array,
 *             WebACLId?: string,
 *             HttpVersion?: 'http1.1'|'http2'|'http2and3'|'http3',
 *             IsIPV6Enabled?: bool,
 *             ContinuousDeploymentPolicyId?: string,
 *             Staging?: bool,
 *             AnycastIpListId?: string,
 *             TenantConfig?: array,
 *             ConnectionMode?: 'direct'|'tenant-only',
 *             ViewerMtlsConfig?: array,
 *             ConnectionFunctionAssociation?: array,
 *             CacheTagConfig?: array,
 *             ...,
 *         },
 *         Tags?: array{Items?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStreamingDistributionWithTags(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result createStreamingDistributionWithTags(array{
 *     StreamingDistributionConfigWithTags?: array{
 *         StreamingDistributionConfig?: array{
 *             CallerReference?: string,
 *             S3Origin?: array,
 *             Aliases?: array,
 *             Comment?: string,
 *             Logging?: array,
 *             TrustedSigners?: array,
 *             PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *             Enabled?: bool,
 *             ...,
 *         },
 *         Tags?: array{Items?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamingDistributionWithTagsAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamingDistributionWithTagsAsync(array{
 *     StreamingDistributionConfigWithTags?: array{
 *         StreamingDistributionConfig?: array{
 *             CallerReference?: string,
 *             S3Origin?: array,
 *             Aliases?: array,
 *             Comment?: string,
 *             Logging?: array,
 *             TrustedSigners?: array,
 *             PriceClass?: 'None'|'PriceClass_100'|'PriceClass_200'|'PriceClass_All',
 *             Enabled?: bool,
 *             ...,
 *         },
 *         Tags?: array{Items?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result listTagsForResource(array{Resource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{Resource?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result tagResource(array{Resource?: string, Tags?: array{Items?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Resource?: string, Tags?: array{Items?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result untagResource(array{Resource?: string, TagKeys?: array{Items?: list<string>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{Resource?: string, TagKeys?: array{Items?: list<string>, ...}, ...} $args = [])
 * @method \Aws\Result deleteServiceLinkedRole(array $args = []) (supported in versions 2017-03-25)
 * @phpstan-method \Aws\Result deleteServiceLinkedRole(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceLinkedRoleAsync(array $args = []) (supported in versions 2017-03-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceLinkedRoleAsync(array{...} $args = [])
 * @method \Aws\Result createFieldLevelEncryptionConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result createFieldLevelEncryptionConfig(array{
 *     FieldLevelEncryptionConfig?: array{
 *         CallerReference?: string,
 *         Comment?: string,
 *         QueryArgProfileConfig?: array{ForwardWhenQueryArgProfileIsUnknown?: bool, QueryArgProfiles?: array, ...},
 *         ContentTypeProfileConfig?: array{ForwardWhenContentTypeIsUnknown?: bool, ContentTypeProfiles?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFieldLevelEncryptionConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createFieldLevelEncryptionConfigAsync(array{
 *     FieldLevelEncryptionConfig?: array{
 *         CallerReference?: string,
 *         Comment?: string,
 *         QueryArgProfileConfig?: array{ForwardWhenQueryArgProfileIsUnknown?: bool, QueryArgProfiles?: array, ...},
 *         ContentTypeProfileConfig?: array{ForwardWhenContentTypeIsUnknown?: bool, ContentTypeProfiles?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFieldLevelEncryptionProfile(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result createFieldLevelEncryptionProfile(array{
 *     FieldLevelEncryptionProfileConfig?: array{
 *         Name?: string,
 *         CallerReference?: string,
 *         Comment?: string,
 *         EncryptionEntities?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFieldLevelEncryptionProfileAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createFieldLevelEncryptionProfileAsync(array{
 *     FieldLevelEncryptionProfileConfig?: array{
 *         Name?: string,
 *         CallerReference?: string,
 *         Comment?: string,
 *         EncryptionEntities?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPublicKey(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result createPublicKey(array{
 *     PublicKeyConfig?: array{CallerReference?: string, Name?: string, EncodedKey?: string, Comment?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPublicKeyAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createPublicKeyAsync(array{
 *     PublicKeyConfig?: array{CallerReference?: string, Name?: string, EncodedKey?: string, Comment?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteFieldLevelEncryptionConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result deleteFieldLevelEncryptionConfig(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFieldLevelEncryptionConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFieldLevelEncryptionConfigAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteFieldLevelEncryptionProfile(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result deleteFieldLevelEncryptionProfile(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFieldLevelEncryptionProfileAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFieldLevelEncryptionProfileAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deletePublicKey(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result deletePublicKey(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePublicKeyAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePublicKeyAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result getFieldLevelEncryption(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result getFieldLevelEncryption(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFieldLevelEncryptionAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getFieldLevelEncryptionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getFieldLevelEncryptionConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result getFieldLevelEncryptionConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFieldLevelEncryptionConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getFieldLevelEncryptionConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getFieldLevelEncryptionProfile(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result getFieldLevelEncryptionProfile(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFieldLevelEncryptionProfileAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getFieldLevelEncryptionProfileAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getFieldLevelEncryptionProfileConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result getFieldLevelEncryptionProfileConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFieldLevelEncryptionProfileConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getFieldLevelEncryptionProfileConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getPublicKey(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result getPublicKey(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPublicKeyAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getPublicKeyAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getPublicKeyConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result getPublicKeyConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPublicKeyConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getPublicKeyConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result listFieldLevelEncryptionConfigs(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result listFieldLevelEncryptionConfigs(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFieldLevelEncryptionConfigsAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listFieldLevelEncryptionConfigsAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listFieldLevelEncryptionProfiles(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result listFieldLevelEncryptionProfiles(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFieldLevelEncryptionProfilesAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listFieldLevelEncryptionProfilesAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listPublicKeys(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result listPublicKeys(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPublicKeysAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listPublicKeysAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result updateFieldLevelEncryptionConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result updateFieldLevelEncryptionConfig(array{
 *     FieldLevelEncryptionConfig?: array{
 *         CallerReference?: string,
 *         Comment?: string,
 *         QueryArgProfileConfig?: array{ForwardWhenQueryArgProfileIsUnknown?: bool, QueryArgProfiles?: array, ...},
 *         ContentTypeProfileConfig?: array{ForwardWhenContentTypeIsUnknown?: bool, ContentTypeProfiles?: array, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFieldLevelEncryptionConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFieldLevelEncryptionConfigAsync(array{
 *     FieldLevelEncryptionConfig?: array{
 *         CallerReference?: string,
 *         Comment?: string,
 *         QueryArgProfileConfig?: array{ForwardWhenQueryArgProfileIsUnknown?: bool, QueryArgProfiles?: array, ...},
 *         ContentTypeProfileConfig?: array{ForwardWhenContentTypeIsUnknown?: bool, ContentTypeProfiles?: array, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFieldLevelEncryptionProfile(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result updateFieldLevelEncryptionProfile(array{
 *     FieldLevelEncryptionProfileConfig?: array{
 *         Name?: string,
 *         CallerReference?: string,
 *         Comment?: string,
 *         EncryptionEntities?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFieldLevelEncryptionProfileAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFieldLevelEncryptionProfileAsync(array{
 *     FieldLevelEncryptionProfileConfig?: array{
 *         Name?: string,
 *         CallerReference?: string,
 *         Comment?: string,
 *         EncryptionEntities?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePublicKey(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \Aws\Result updatePublicKey(array{
 *     PublicKeyConfig?: array{CallerReference?: string, Name?: string, EncodedKey?: string, Comment?: string, ...},
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePublicKeyAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePublicKeyAsync(array{
 *     PublicKeyConfig?: array{CallerReference?: string, Name?: string, EncodedKey?: string, Comment?: string, ...},
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateAlias(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result associateAlias(array{TargetDistributionId?: string, Alias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAliasAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAliasAsync(array{TargetDistributionId?: string, Alias?: string, ...} $args = [])
 * @method \Aws\Result associateDistributionTenantWebACL(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result associateDistributionTenantWebACL(array{Id?: string, WebACLArn?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDistributionTenantWebACLAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDistributionTenantWebACLAsync(array{Id?: string, WebACLArn?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result associateDistributionWebACL(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result associateDistributionWebACL(array{Id?: string, WebACLArn?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDistributionWebACLAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDistributionWebACLAsync(array{Id?: string, WebACLArn?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result copyDistribution(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result copyDistribution(array{
 *     PrimaryDistributionId?: string,
 *     Staging?: bool,
 *     IfMatch?: string,
 *     CallerReference?: string,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyDistributionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise copyDistributionAsync(array{
 *     PrimaryDistributionId?: string,
 *     Staging?: bool,
 *     IfMatch?: string,
 *     CallerReference?: string,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnycastIpList(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createAnycastIpList(array{
 *     Name?: string,
 *     IpCount?: int,
 *     Tags?: array{Items?: list<array>, ...},
 *     IpAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     IpamCidrConfigs?: list<array{
 *         Cidr?: string,
 *         IpamPoolArn?: string,
 *         AnycastIp?: string,
 *         Status?: 'advertised'|'advertising'|'deprovisioned'|'deprovisioning'|'failed-advertise'|'failed-deprovision'|'failed-provision'|'failed-withdraw'|'provisioned'|'provisioning'|'withdrawing'|'withdrawn',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnycastIpListAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnycastIpListAsync(array{
 *     Name?: string,
 *     IpCount?: int,
 *     Tags?: array{Items?: list<array>, ...},
 *     IpAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     IpamCidrConfigs?: list<array{
 *         Cidr?: string,
 *         IpamPoolArn?: string,
 *         AnycastIp?: string,
 *         Status?: 'advertised'|'advertising'|'deprovisioned'|'deprovisioning'|'failed-advertise'|'failed-deprovision'|'failed-provision'|'failed-withdraw'|'provisioned'|'provisioning'|'withdrawing'|'withdrawn',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCachePolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createCachePolicy(array{
 *     CachePolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         DefaultTTL?: int,
 *         MaxTTL?: int,
 *         MinTTL?: int,
 *         ParametersInCacheKeyAndForwardedToOrigin?: array{
 *             EnableAcceptEncodingGzip?: bool,
 *             EnableAcceptEncodingBrotli?: bool,
 *             HeadersConfig?: array,
 *             CookiesConfig?: array,
 *             QueryStringsConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCachePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createCachePolicyAsync(array{
 *     CachePolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         DefaultTTL?: int,
 *         MaxTTL?: int,
 *         MinTTL?: int,
 *         ParametersInCacheKeyAndForwardedToOrigin?: array{
 *             EnableAcceptEncodingGzip?: bool,
 *             EnableAcceptEncodingBrotli?: bool,
 *             HeadersConfig?: array,
 *             CookiesConfig?: array,
 *             QueryStringsConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createConnectionFunction(array{
 *     Name?: string,
 *     ConnectionFunctionConfig?: array{
 *         Comment?: string,
 *         Runtime?: 'cloudfront-js-1.0'|'cloudfront-js-2.0',
 *         KeyValueStoreAssociations?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     ConnectionFunctionCode?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionFunctionAsync(array{
 *     Name?: string,
 *     ConnectionFunctionConfig?: array{
 *         Comment?: string,
 *         Runtime?: 'cloudfront-js-1.0'|'cloudfront-js-2.0',
 *         KeyValueStoreAssociations?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     ConnectionFunctionCode?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnectionGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createConnectionGroup(array{
 *     Name?: string,
 *     Ipv6Enabled?: bool,
 *     Tags?: array{Items?: list<array>, ...},
 *     AnycastIpListId?: string,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionGroupAsync(array{
 *     Name?: string,
 *     Ipv6Enabled?: bool,
 *     Tags?: array{Items?: list<array>, ...},
 *     AnycastIpListId?: string,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContinuousDeploymentPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createContinuousDeploymentPolicy(array{
 *     ContinuousDeploymentPolicyConfig?: array{
 *         StagingDistributionDnsNames?: array{Quantity?: int, Items?: list<string>, ...},
 *         Enabled?: bool,
 *         TrafficConfig?: array{SingleWeightConfig?: array, SingleHeaderConfig?: array, Type?: 'SingleHeader'|'SingleWeight', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContinuousDeploymentPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createContinuousDeploymentPolicyAsync(array{
 *     ContinuousDeploymentPolicyConfig?: array{
 *         StagingDistributionDnsNames?: array{Quantity?: int, Items?: list<string>, ...},
 *         Enabled?: bool,
 *         TrafficConfig?: array{SingleWeightConfig?: array, SingleHeaderConfig?: array, Type?: 'SingleHeader'|'SingleWeight', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createDistributionTenant(array{
 *     DistributionId?: string,
 *     Name?: string,
 *     Domains?: list<array{Domain?: string, ...}>,
 *     Tags?: array{Items?: list<array>, ...},
 *     Customizations?: array{
 *         WebAcl?: array{Action?: 'disable'|'override', Arn?: string, ...},
 *         Certificate?: array{Arn?: string, ...},
 *         GeoRestrictions?: array{RestrictionType?: 'blacklist'|'none'|'whitelist', Locations?: list<string>, ...},
 *         ...,
 *     },
 *     Parameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ConnectionGroupId?: string,
 *     ManagedCertificateRequest?: array{
 *         ValidationTokenHost?: 'cloudfront'|'self-hosted',
 *         PrimaryDomainName?: string,
 *         CertificateTransparencyLoggingPreference?: 'disabled'|'enabled',
 *         ...,
 *     },
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createDistributionTenantAsync(array{
 *     DistributionId?: string,
 *     Name?: string,
 *     Domains?: list<array{Domain?: string, ...}>,
 *     Tags?: array{Items?: list<array>, ...},
 *     Customizations?: array{
 *         WebAcl?: array{Action?: 'disable'|'override', Arn?: string, ...},
 *         Certificate?: array{Arn?: string, ...},
 *         GeoRestrictions?: array{RestrictionType?: 'blacklist'|'none'|'whitelist', Locations?: list<string>, ...},
 *         ...,
 *     },
 *     Parameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ConnectionGroupId?: string,
 *     ManagedCertificateRequest?: array{
 *         ValidationTokenHost?: 'cloudfront'|'self-hosted',
 *         PrimaryDomainName?: string,
 *         CertificateTransparencyLoggingPreference?: 'disabled'|'enabled',
 *         ...,
 *     },
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createFunction(array{
 *     Name?: string,
 *     FunctionConfig?: array{
 *         Comment?: string,
 *         Runtime?: 'cloudfront-js-1.0'|'cloudfront-js-2.0',
 *         KeyValueStoreAssociations?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     FunctionCode?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createFunctionAsync(array{
 *     Name?: string,
 *     FunctionConfig?: array{
 *         Comment?: string,
 *         Runtime?: 'cloudfront-js-1.0'|'cloudfront-js-2.0',
 *         KeyValueStoreAssociations?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     FunctionCode?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInvalidationForDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createInvalidationForDistributionTenant(array{
 *     Id?: string,
 *     InvalidationBatch?: array{Paths?: array{Quantity?: int, Items?: list<string>, ...}, CallerReference?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInvalidationForDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createInvalidationForDistributionTenantAsync(array{
 *     Id?: string,
 *     InvalidationBatch?: array{Paths?: array{Quantity?: int, Items?: list<string>, ...}, CallerReference?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createKeyGroup(array{KeyGroupConfig?: array{Name?: string, Items?: list<string>, Comment?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeyGroupAsync(array{KeyGroupConfig?: array{Name?: string, Items?: list<string>, Comment?: string, ...}, ...} $args = [])
 * @method \Aws\Result createKeyValueStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createKeyValueStore(array{
 *     Name?: string,
 *     Comment?: string,
 *     ImportSource?: array{SourceType?: 'S3', SourceARN?: string, ...},
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeyValueStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeyValueStoreAsync(array{
 *     Name?: string,
 *     Comment?: string,
 *     ImportSource?: array{SourceType?: 'S3', SourceARN?: string, ...},
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMonitoringSubscription(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createMonitoringSubscription(array{
 *     DistributionId?: string,
 *     MonitoringSubscription?: array{
 *         RealtimeMetricsSubscriptionConfig?: array{RealtimeMetricsSubscriptionStatus?: 'Disabled'|'Enabled', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMonitoringSubscriptionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createMonitoringSubscriptionAsync(array{
 *     DistributionId?: string,
 *     MonitoringSubscription?: array{
 *         RealtimeMetricsSubscriptionConfig?: array{RealtimeMetricsSubscriptionStatus?: 'Disabled'|'Enabled', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOriginAccessControl(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createOriginAccessControl(array{
 *     OriginAccessControlConfig?: array{
 *         Name?: string,
 *         Description?: string,
 *         SigningProtocol?: 'sigv4',
 *         SigningBehavior?: 'always'|'never'|'no-override',
 *         OriginAccessControlOriginType?: 'lambda'|'mediapackagev2'|'mediastore'|'s3',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOriginAccessControlAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createOriginAccessControlAsync(array{
 *     OriginAccessControlConfig?: array{
 *         Name?: string,
 *         Description?: string,
 *         SigningProtocol?: 'sigv4',
 *         SigningBehavior?: 'always'|'never'|'no-override',
 *         OriginAccessControlOriginType?: 'lambda'|'mediapackagev2'|'mediastore'|'s3',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOriginRequestPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createOriginRequestPolicy(array{
 *     OriginRequestPolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         HeadersConfig?: array{
 *             HeaderBehavior?: 'allExcept'|'allViewer'|'allViewerAndWhitelistCloudFront'|'none'|'whitelist',
 *             Headers?: array,
 *             ...,
 *         },
 *         CookiesConfig?: array{CookieBehavior?: 'all'|'allExcept'|'none'|'whitelist', Cookies?: array, ...},
 *         QueryStringsConfig?: array{QueryStringBehavior?: 'all'|'allExcept'|'none'|'whitelist', QueryStrings?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOriginRequestPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createOriginRequestPolicyAsync(array{
 *     OriginRequestPolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         HeadersConfig?: array{
 *             HeaderBehavior?: 'allExcept'|'allViewer'|'allViewerAndWhitelistCloudFront'|'none'|'whitelist',
 *             Headers?: array,
 *             ...,
 *         },
 *         CookiesConfig?: array{CookieBehavior?: 'all'|'allExcept'|'none'|'whitelist', Cookies?: array, ...},
 *         QueryStringsConfig?: array{QueryStringBehavior?: 'all'|'allExcept'|'none'|'whitelist', QueryStrings?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createRealtimeLogConfig(array{
 *     EndPoints?: list<array{StreamType?: string, KinesisStreamConfig?: array, ...}>,
 *     Fields?: list<string>,
 *     Name?: string,
 *     SamplingRate?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createRealtimeLogConfigAsync(array{
 *     EndPoints?: list<array{StreamType?: string, KinesisStreamConfig?: array, ...}>,
 *     Fields?: list<string>,
 *     Name?: string,
 *     SamplingRate?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResponseHeadersPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createResponseHeadersPolicy(array{
 *     ResponseHeadersPolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         CorsConfig?: array{
 *             AccessControlAllowOrigins?: array,
 *             AccessControlAllowHeaders?: array,
 *             AccessControlAllowMethods?: array,
 *             AccessControlAllowCredentials?: bool,
 *             AccessControlExposeHeaders?: array,
 *             AccessControlMaxAgeSec?: int,
 *             OriginOverride?: bool,
 *             ...,
 *         },
 *         SecurityHeadersConfig?: array{
 *             XSSProtection?: array,
 *             FrameOptions?: array,
 *             ReferrerPolicy?: array,
 *             ContentSecurityPolicy?: array,
 *             ContentTypeOptions?: array,
 *             StrictTransportSecurity?: array,
 *             ...,
 *         },
 *         ServerTimingHeadersConfig?: array{Enabled?: bool, SamplingRate?: float, ...},
 *         CustomHeadersConfig?: array{Quantity?: int, Items?: list<array>, ...},
 *         RemoveHeadersConfig?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResponseHeadersPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createResponseHeadersPolicyAsync(array{
 *     ResponseHeadersPolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         CorsConfig?: array{
 *             AccessControlAllowOrigins?: array,
 *             AccessControlAllowHeaders?: array,
 *             AccessControlAllowMethods?: array,
 *             AccessControlAllowCredentials?: bool,
 *             AccessControlExposeHeaders?: array,
 *             AccessControlMaxAgeSec?: int,
 *             OriginOverride?: bool,
 *             ...,
 *         },
 *         SecurityHeadersConfig?: array{
 *             XSSProtection?: array,
 *             FrameOptions?: array,
 *             ReferrerPolicy?: array,
 *             ContentSecurityPolicy?: array,
 *             ContentTypeOptions?: array,
 *             StrictTransportSecurity?: array,
 *             ...,
 *         },
 *         ServerTimingHeadersConfig?: array{Enabled?: bool, SamplingRate?: float, ...},
 *         CustomHeadersConfig?: array{Quantity?: int, Items?: list<array>, ...},
 *         RemoveHeadersConfig?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createTrustStore(array{
 *     Name?: string,
 *     CaCertificatesBundleSource?: array{
 *         CaCertificatesBundleS3Location?: array{Bucket?: string, Key?: string, Region?: string, Version?: string, ...},
 *         ...,
 *     },
 *     UseClientCertificateOCSPEndpoint?: bool,
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrustStoreAsync(array{
 *     Name?: string,
 *     CaCertificatesBundleSource?: array{
 *         CaCertificatesBundleS3Location?: array{Bucket?: string, Key?: string, Region?: string, Version?: string, ...},
 *         ...,
 *     },
 *     UseClientCertificateOCSPEndpoint?: bool,
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcOrigin(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result createVpcOrigin(array{
 *     VpcOriginEndpointConfig?: array{
 *         Name?: string,
 *         Arn?: string,
 *         HTTPPort?: int,
 *         HTTPSPort?: int,
 *         OriginProtocolPolicy?: 'http-only'|'https-only'|'match-viewer',
 *         OriginSslProtocols?: array{Quantity?: int, Items?: list<'SSLv3'|'TLSv1'|'TLSv1.1'|'TLSv1.2'>, ...},
 *         ...,
 *     },
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcOriginAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcOriginAsync(array{
 *     VpcOriginEndpointConfig?: array{
 *         Name?: string,
 *         Arn?: string,
 *         HTTPPort?: int,
 *         HTTPSPort?: int,
 *         OriginProtocolPolicy?: 'http-only'|'https-only'|'match-viewer',
 *         OriginSslProtocols?: array{Quantity?: int, Items?: list<'SSLv3'|'TLSv1'|'TLSv1.1'|'TLSv1.2'>, ...},
 *         ...,
 *     },
 *     Tags?: array{Items?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAnycastIpList(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteAnycastIpList(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnycastIpListAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnycastIpListAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteCachePolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteCachePolicy(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCachePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCachePolicyAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteConnectionFunction(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionFunctionAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectionGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteConnectionGroup(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionGroupAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteContinuousDeploymentPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteContinuousDeploymentPolicy(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContinuousDeploymentPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContinuousDeploymentPolicyAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteDistributionTenant(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDistributionTenantAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteFunction(array{Name?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array{Name?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteKeyGroup(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeyGroupAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteKeyValueStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteKeyValueStore(array{Name?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeyValueStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeyValueStoreAsync(array{Name?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteMonitoringSubscription(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteMonitoringSubscription(array{DistributionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMonitoringSubscriptionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMonitoringSubscriptionAsync(array{DistributionId?: string, ...} $args = [])
 * @method \Aws\Result deleteOriginAccessControl(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteOriginAccessControl(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOriginAccessControlAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOriginAccessControlAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteOriginRequestPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteOriginRequestPolicy(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOriginRequestPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOriginRequestPolicyAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteRealtimeLogConfig(array{Name?: string, ARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRealtimeLogConfigAsync(array{Name?: string, ARN?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteResponseHeadersPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteResponseHeadersPolicy(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResponseHeadersPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResponseHeadersPolicyAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteTrustStore(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrustStoreAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcOrigin(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result deleteVpcOrigin(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcOriginAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcOriginAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result describeConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result describeConnectionFunction(array{Identifier?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionFunctionAsync(array{Identifier?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \Aws\Result describeFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result describeFunction(array{Name?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFunctionAsync(array{Name?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \Aws\Result describeKeyValueStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result describeKeyValueStore(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeyValueStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKeyValueStoreAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result disassociateDistributionTenantWebACL(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result disassociateDistributionTenantWebACL(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDistributionTenantWebACLAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDistributionTenantWebACLAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result disassociateDistributionWebACL(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result disassociateDistributionWebACL(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDistributionWebACLAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDistributionWebACLAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result getAnycastIpList(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getAnycastIpList(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnycastIpListAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnycastIpListAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getCachePolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getCachePolicy(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCachePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getCachePolicyAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getCachePolicyConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getCachePolicyConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCachePolicyConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getCachePolicyConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getConnectionFunction(array{Identifier?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionFunctionAsync(array{Identifier?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \Aws\Result getConnectionGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getConnectionGroup(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionGroupAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getConnectionGroupByRoutingEndpoint(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getConnectionGroupByRoutingEndpoint(array{RoutingEndpoint?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionGroupByRoutingEndpointAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionGroupByRoutingEndpointAsync(array{RoutingEndpoint?: string, ...} $args = [])
 * @method \Aws\Result getContinuousDeploymentPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getContinuousDeploymentPolicy(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContinuousDeploymentPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getContinuousDeploymentPolicyAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getContinuousDeploymentPolicyConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getContinuousDeploymentPolicyConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContinuousDeploymentPolicyConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getContinuousDeploymentPolicyConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getDistributionTenant(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionTenantAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getDistributionTenantByDomain(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getDistributionTenantByDomain(array{Domain?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionTenantByDomainAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionTenantByDomainAsync(array{Domain?: string, ...} $args = [])
 * @method \Aws\Result getFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getFunction(array{Name?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionAsync(array{Name?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \Aws\Result getInvalidationForDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getInvalidationForDistributionTenant(array{DistributionTenantId?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvalidationForDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvalidationForDistributionTenantAsync(array{DistributionTenantId?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result getKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getKeyGroup(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyGroupAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getKeyGroupConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getKeyGroupConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyGroupConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyGroupConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getManagedCertificateDetails(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getManagedCertificateDetails(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedCertificateDetailsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedCertificateDetailsAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getMonitoringSubscription(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getMonitoringSubscription(array{DistributionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMonitoringSubscriptionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getMonitoringSubscriptionAsync(array{DistributionId?: string, ...} $args = [])
 * @method \Aws\Result getOriginAccessControl(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getOriginAccessControl(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOriginAccessControlAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getOriginAccessControlAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getOriginAccessControlConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getOriginAccessControlConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOriginAccessControlConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getOriginAccessControlConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getOriginRequestPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getOriginRequestPolicy(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOriginRequestPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getOriginRequestPolicyAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getOriginRequestPolicyConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getOriginRequestPolicyConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOriginRequestPolicyConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getOriginRequestPolicyConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getRealtimeLogConfig(array{Name?: string, ARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getRealtimeLogConfigAsync(array{Name?: string, ARN?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getResponseHeadersPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getResponseHeadersPolicy(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResponseHeadersPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getResponseHeadersPolicyAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getResponseHeadersPolicyConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getResponseHeadersPolicyConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResponseHeadersPolicyConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getResponseHeadersPolicyConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getTrustStore(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrustStoreAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getVpcOrigin(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result getVpcOrigin(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVpcOriginAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise getVpcOriginAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result listAnycastIpLists(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listAnycastIpLists(array{Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnycastIpListsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnycastIpListsAsync(array{Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listCachePolicies(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listCachePolicies(array{Type?: 'custom'|'managed', Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCachePoliciesAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listCachePoliciesAsync(array{Type?: 'custom'|'managed', Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listConflictingAliases(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listConflictingAliases(array{DistributionId?: string, Alias?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConflictingAliasesAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listConflictingAliasesAsync(array{DistributionId?: string, Alias?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listConnectionFunctions(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listConnectionFunctions(array{Marker?: string, MaxItems?: int, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionFunctionsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionFunctionsAsync(array{Marker?: string, MaxItems?: int, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \Aws\Result listConnectionGroups(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listConnectionGroups(array{AssociationFilter?: array{AnycastIpListId?: string, ...}, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionGroupsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionGroupsAsync(array{AssociationFilter?: array{AnycastIpListId?: string, ...}, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listContinuousDeploymentPolicies(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listContinuousDeploymentPolicies(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContinuousDeploymentPoliciesAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listContinuousDeploymentPoliciesAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listDistributionTenants(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionTenants(array{
 *     AssociationFilter?: array{DistributionId?: string, ConnectionGroupId?: string, ...},
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionTenantsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionTenantsAsync(array{
 *     AssociationFilter?: array{DistributionId?: string, ConnectionGroupId?: string, ...},
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDistributionTenantsByCustomization(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionTenantsByCustomization(array{WebACLArn?: string, CertificateArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionTenantsByCustomizationAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionTenantsByCustomizationAsync(array{WebACLArn?: string, CertificateArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listDistributionsByAnycastIpListId(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByAnycastIpListId(array{Marker?: string, MaxItems?: string, AnycastIpListId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByAnycastIpListIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByAnycastIpListIdAsync(array{Marker?: string, MaxItems?: string, AnycastIpListId?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByCachePolicyId(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByCachePolicyId(array{Marker?: string, MaxItems?: string, CachePolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByCachePolicyIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByCachePolicyIdAsync(array{Marker?: string, MaxItems?: string, CachePolicyId?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByConnectionFunction(array{Marker?: string, MaxItems?: int, ConnectionFunctionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByConnectionFunctionAsync(array{Marker?: string, MaxItems?: int, ConnectionFunctionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByConnectionMode(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByConnectionMode(array{Marker?: string, MaxItems?: int, ConnectionMode?: 'direct'|'tenant-only', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByConnectionModeAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByConnectionModeAsync(array{Marker?: string, MaxItems?: int, ConnectionMode?: 'direct'|'tenant-only', ...} $args = [])
 * @method \Aws\Result listDistributionsByKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByKeyGroup(array{Marker?: string, MaxItems?: string, KeyGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByKeyGroupAsync(array{Marker?: string, MaxItems?: string, KeyGroupId?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByOriginRequestPolicyId(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByOriginRequestPolicyId(array{Marker?: string, MaxItems?: string, OriginRequestPolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByOriginRequestPolicyIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByOriginRequestPolicyIdAsync(array{Marker?: string, MaxItems?: string, OriginRequestPolicyId?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByOwnedResource(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByOwnedResource(array{ResourceArn?: string, Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByOwnedResourceAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByOwnedResourceAsync(array{ResourceArn?: string, Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByRealtimeLogConfig(array{Marker?: string, MaxItems?: string, RealtimeLogConfigName?: string, RealtimeLogConfigArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByRealtimeLogConfigAsync(array{Marker?: string, MaxItems?: string, RealtimeLogConfigName?: string, RealtimeLogConfigArn?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByResponseHeadersPolicyId(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByResponseHeadersPolicyId(array{Marker?: string, MaxItems?: string, ResponseHeadersPolicyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByResponseHeadersPolicyIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByResponseHeadersPolicyIdAsync(array{Marker?: string, MaxItems?: string, ResponseHeadersPolicyId?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByTrustStore(array{TrustStoreIdentifier?: string, Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByTrustStoreAsync(array{TrustStoreIdentifier?: string, Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listDistributionsByVpcOriginId(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDistributionsByVpcOriginId(array{Marker?: string, MaxItems?: string, VpcOriginId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionsByVpcOriginIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionsByVpcOriginIdAsync(array{Marker?: string, MaxItems?: string, VpcOriginId?: string, ...} $args = [])
 * @method \Aws\Result listDomainConflicts(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listDomainConflicts(array{
 *     Domain?: string,
 *     DomainControlValidationResource?: array{DistributionId?: string, DistributionTenantId?: string, ...},
 *     MaxItems?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainConflictsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainConflictsAsync(array{
 *     Domain?: string,
 *     DomainControlValidationResource?: array{DistributionId?: string, DistributionTenantId?: string, ...},
 *     MaxItems?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFunctions(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listFunctions(array{Marker?: string, MaxItems?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionsAsync(array{Marker?: string, MaxItems?: string, Stage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \Aws\Result listInvalidationsForDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listInvalidationsForDistributionTenant(array{Id?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvalidationsForDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvalidationsForDistributionTenantAsync(array{Id?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listKeyGroups(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listKeyGroups(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeyGroupsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeyGroupsAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listKeyValueStores(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listKeyValueStores(array{Marker?: string, MaxItems?: string, Status?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeyValueStoresAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeyValueStoresAsync(array{Marker?: string, MaxItems?: string, Status?: string, ...} $args = [])
 * @method \Aws\Result listOriginAccessControls(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listOriginAccessControls(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOriginAccessControlsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listOriginAccessControlsAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listOriginRequestPolicies(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listOriginRequestPolicies(array{Type?: 'custom'|'managed', Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOriginRequestPoliciesAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listOriginRequestPoliciesAsync(array{Type?: 'custom'|'managed', Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listRealtimeLogConfigs(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listRealtimeLogConfigs(array{MaxItems?: string, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRealtimeLogConfigsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listRealtimeLogConfigsAsync(array{MaxItems?: string, Marker?: string, ...} $args = [])
 * @method \Aws\Result listResponseHeadersPolicies(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listResponseHeadersPolicies(array{Type?: 'custom'|'managed', Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResponseHeadersPoliciesAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listResponseHeadersPoliciesAsync(array{Type?: 'custom'|'managed', Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listTrustStores(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listTrustStores(array{Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrustStoresAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrustStoresAsync(array{Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listVpcOrigins(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result listVpcOrigins(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcOriginsAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcOriginsAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result publishConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result publishConnectionFunction(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise publishConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise publishConnectionFunctionAsync(array{Id?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result publishFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result publishFunction(array{Name?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise publishFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise publishFunctionAsync(array{Name?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, PolicyDocument?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, PolicyDocument?: string, ...} $args = [])
 * @method \Aws\Result testConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result testConnectionFunction(array{
 *     Id?: string,
 *     IfMatch?: string,
 *     Stage?: 'DEVELOPMENT'|'LIVE',
 *     ConnectionObject?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise testConnectionFunctionAsync(array{
 *     Id?: string,
 *     IfMatch?: string,
 *     Stage?: 'DEVELOPMENT'|'LIVE',
 *     ConnectionObject?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result testFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result testFunction(array{
 *     Name?: string,
 *     IfMatch?: string,
 *     Stage?: 'DEVELOPMENT'|'LIVE',
 *     EventObject?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise testFunctionAsync(array{
 *     Name?: string,
 *     IfMatch?: string,
 *     Stage?: 'DEVELOPMENT'|'LIVE',
 *     EventObject?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAnycastIpList(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateAnycastIpList(array{
 *     Id?: string,
 *     IpAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     IpamCidrConfigs?: list<array{
 *         Cidr?: string,
 *         IpamPoolArn?: string,
 *         AnycastIp?: string,
 *         Status?: 'advertised'|'advertising'|'deprovisioned'|'deprovisioning'|'failed-advertise'|'failed-deprovision'|'failed-provision'|'failed-withdraw'|'provisioned'|'provisioning'|'withdrawing'|'withdrawn',
 *         ...,
 *     }>,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnycastIpListAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnycastIpListAsync(array{
 *     Id?: string,
 *     IpAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     IpamCidrConfigs?: list<array{
 *         Cidr?: string,
 *         IpamPoolArn?: string,
 *         AnycastIp?: string,
 *         Status?: 'advertised'|'advertising'|'deprovisioned'|'deprovisioning'|'failed-advertise'|'failed-deprovision'|'failed-provision'|'failed-withdraw'|'provisioned'|'provisioning'|'withdrawing'|'withdrawn',
 *         ...,
 *     }>,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCachePolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateCachePolicy(array{
 *     CachePolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         DefaultTTL?: int,
 *         MaxTTL?: int,
 *         MinTTL?: int,
 *         ParametersInCacheKeyAndForwardedToOrigin?: array{
 *             EnableAcceptEncodingGzip?: bool,
 *             EnableAcceptEncodingBrotli?: bool,
 *             HeadersConfig?: array,
 *             CookiesConfig?: array,
 *             QueryStringsConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCachePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCachePolicyAsync(array{
 *     CachePolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         DefaultTTL?: int,
 *         MaxTTL?: int,
 *         MinTTL?: int,
 *         ParametersInCacheKeyAndForwardedToOrigin?: array{
 *             EnableAcceptEncodingGzip?: bool,
 *             EnableAcceptEncodingBrotli?: bool,
 *             HeadersConfig?: array,
 *             CookiesConfig?: array,
 *             QueryStringsConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateConnectionFunction(array{
 *     Id?: string,
 *     IfMatch?: string,
 *     ConnectionFunctionConfig?: array{
 *         Comment?: string,
 *         Runtime?: 'cloudfront-js-1.0'|'cloudfront-js-2.0',
 *         KeyValueStoreAssociations?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     ConnectionFunctionCode?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionFunctionAsync(array{
 *     Id?: string,
 *     IfMatch?: string,
 *     ConnectionFunctionConfig?: array{
 *         Comment?: string,
 *         Runtime?: 'cloudfront-js-1.0'|'cloudfront-js-2.0',
 *         KeyValueStoreAssociations?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     ConnectionFunctionCode?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnectionGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateConnectionGroup(array{Id?: string, Ipv6Enabled?: bool, IfMatch?: string, AnycastIpListId?: string, Enabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionGroupAsync(array{Id?: string, Ipv6Enabled?: bool, IfMatch?: string, AnycastIpListId?: string, Enabled?: bool, ...} $args = [])
 * @method \Aws\Result updateContinuousDeploymentPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateContinuousDeploymentPolicy(array{
 *     ContinuousDeploymentPolicyConfig?: array{
 *         StagingDistributionDnsNames?: array{Quantity?: int, Items?: list<string>, ...},
 *         Enabled?: bool,
 *         TrafficConfig?: array{SingleWeightConfig?: array, SingleHeaderConfig?: array, Type?: 'SingleHeader'|'SingleWeight', ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContinuousDeploymentPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContinuousDeploymentPolicyAsync(array{
 *     ContinuousDeploymentPolicyConfig?: array{
 *         StagingDistributionDnsNames?: array{Quantity?: int, Items?: list<string>, ...},
 *         Enabled?: bool,
 *         TrafficConfig?: array{SingleWeightConfig?: array, SingleHeaderConfig?: array, Type?: 'SingleHeader'|'SingleWeight', ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateDistributionTenant(array{
 *     Id?: string,
 *     DistributionId?: string,
 *     Domains?: list<array{Domain?: string, ...}>,
 *     Customizations?: array{
 *         WebAcl?: array{Action?: 'disable'|'override', Arn?: string, ...},
 *         Certificate?: array{Arn?: string, ...},
 *         GeoRestrictions?: array{RestrictionType?: 'blacklist'|'none'|'whitelist', Locations?: list<string>, ...},
 *         ...,
 *     },
 *     Parameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ConnectionGroupId?: string,
 *     IfMatch?: string,
 *     ManagedCertificateRequest?: array{
 *         ValidationTokenHost?: 'cloudfront'|'self-hosted',
 *         PrimaryDomainName?: string,
 *         CertificateTransparencyLoggingPreference?: 'disabled'|'enabled',
 *         ...,
 *     },
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDistributionTenantAsync(array{
 *     Id?: string,
 *     DistributionId?: string,
 *     Domains?: list<array{Domain?: string, ...}>,
 *     Customizations?: array{
 *         WebAcl?: array{Action?: 'disable'|'override', Arn?: string, ...},
 *         Certificate?: array{Arn?: string, ...},
 *         GeoRestrictions?: array{RestrictionType?: 'blacklist'|'none'|'whitelist', Locations?: list<string>, ...},
 *         ...,
 *     },
 *     Parameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ConnectionGroupId?: string,
 *     IfMatch?: string,
 *     ManagedCertificateRequest?: array{
 *         ValidationTokenHost?: 'cloudfront'|'self-hosted',
 *         PrimaryDomainName?: string,
 *         CertificateTransparencyLoggingPreference?: 'disabled'|'enabled',
 *         ...,
 *     },
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDistributionWithStagingConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateDistributionWithStagingConfig(array{Id?: string, StagingDistributionId?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDistributionWithStagingConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDistributionWithStagingConfigAsync(array{Id?: string, StagingDistributionId?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result updateDomainAssociation(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateDomainAssociation(array{
 *     Domain?: string,
 *     TargetResource?: array{DistributionId?: string, DistributionTenantId?: string, ...},
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainAssociationAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainAssociationAsync(array{
 *     Domain?: string,
 *     TargetResource?: array{DistributionId?: string, DistributionTenantId?: string, ...},
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFunction(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateFunction(array{
 *     Name?: string,
 *     IfMatch?: string,
 *     FunctionConfig?: array{
 *         Comment?: string,
 *         Runtime?: 'cloudfront-js-1.0'|'cloudfront-js-2.0',
 *         KeyValueStoreAssociations?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     FunctionCode?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFunctionAsync(array{
 *     Name?: string,
 *     IfMatch?: string,
 *     FunctionConfig?: array{
 *         Comment?: string,
 *         Runtime?: 'cloudfront-js-1.0'|'cloudfront-js-2.0',
 *         KeyValueStoreAssociations?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     FunctionCode?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateKeyGroup(array{
 *     KeyGroupConfig?: array{Name?: string, Items?: list<string>, Comment?: string, ...},
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKeyGroupAsync(array{
 *     KeyGroupConfig?: array{Name?: string, Items?: list<string>, Comment?: string, ...},
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKeyValueStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateKeyValueStore(array{Name?: string, Comment?: string, IfMatch?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKeyValueStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKeyValueStoreAsync(array{Name?: string, Comment?: string, IfMatch?: string, ...} $args = [])
 * @method \Aws\Result updateOriginAccessControl(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateOriginAccessControl(array{
 *     OriginAccessControlConfig?: array{
 *         Name?: string,
 *         Description?: string,
 *         SigningProtocol?: 'sigv4',
 *         SigningBehavior?: 'always'|'never'|'no-override',
 *         OriginAccessControlOriginType?: 'lambda'|'mediapackagev2'|'mediastore'|'s3',
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOriginAccessControlAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOriginAccessControlAsync(array{
 *     OriginAccessControlConfig?: array{
 *         Name?: string,
 *         Description?: string,
 *         SigningProtocol?: 'sigv4',
 *         SigningBehavior?: 'always'|'never'|'no-override',
 *         OriginAccessControlOriginType?: 'lambda'|'mediapackagev2'|'mediastore'|'s3',
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOriginRequestPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateOriginRequestPolicy(array{
 *     OriginRequestPolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         HeadersConfig?: array{
 *             HeaderBehavior?: 'allExcept'|'allViewer'|'allViewerAndWhitelistCloudFront'|'none'|'whitelist',
 *             Headers?: array,
 *             ...,
 *         },
 *         CookiesConfig?: array{CookieBehavior?: 'all'|'allExcept'|'none'|'whitelist', Cookies?: array, ...},
 *         QueryStringsConfig?: array{QueryStringBehavior?: 'all'|'allExcept'|'none'|'whitelist', QueryStrings?: array, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOriginRequestPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOriginRequestPolicyAsync(array{
 *     OriginRequestPolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         HeadersConfig?: array{
 *             HeaderBehavior?: 'allExcept'|'allViewer'|'allViewerAndWhitelistCloudFront'|'none'|'whitelist',
 *             Headers?: array,
 *             ...,
 *         },
 *         CookiesConfig?: array{CookieBehavior?: 'all'|'allExcept'|'none'|'whitelist', Cookies?: array, ...},
 *         QueryStringsConfig?: array{QueryStringBehavior?: 'all'|'allExcept'|'none'|'whitelist', QueryStrings?: array, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateRealtimeLogConfig(array{
 *     EndPoints?: list<array{StreamType?: string, KinesisStreamConfig?: array, ...}>,
 *     Fields?: list<string>,
 *     Name?: string,
 *     ARN?: string,
 *     SamplingRate?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRealtimeLogConfigAsync(array{
 *     EndPoints?: list<array{StreamType?: string, KinesisStreamConfig?: array, ...}>,
 *     Fields?: list<string>,
 *     Name?: string,
 *     ARN?: string,
 *     SamplingRate?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResponseHeadersPolicy(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateResponseHeadersPolicy(array{
 *     ResponseHeadersPolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         CorsConfig?: array{
 *             AccessControlAllowOrigins?: array,
 *             AccessControlAllowHeaders?: array,
 *             AccessControlAllowMethods?: array,
 *             AccessControlAllowCredentials?: bool,
 *             AccessControlExposeHeaders?: array,
 *             AccessControlMaxAgeSec?: int,
 *             OriginOverride?: bool,
 *             ...,
 *         },
 *         SecurityHeadersConfig?: array{
 *             XSSProtection?: array,
 *             FrameOptions?: array,
 *             ReferrerPolicy?: array,
 *             ContentSecurityPolicy?: array,
 *             ContentTypeOptions?: array,
 *             StrictTransportSecurity?: array,
 *             ...,
 *         },
 *         ServerTimingHeadersConfig?: array{Enabled?: bool, SamplingRate?: float, ...},
 *         CustomHeadersConfig?: array{Quantity?: int, Items?: list<array>, ...},
 *         RemoveHeadersConfig?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResponseHeadersPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResponseHeadersPolicyAsync(array{
 *     ResponseHeadersPolicyConfig?: array{
 *         Comment?: string,
 *         Name?: string,
 *         CorsConfig?: array{
 *             AccessControlAllowOrigins?: array,
 *             AccessControlAllowHeaders?: array,
 *             AccessControlAllowMethods?: array,
 *             AccessControlAllowCredentials?: bool,
 *             AccessControlExposeHeaders?: array,
 *             AccessControlMaxAgeSec?: int,
 *             OriginOverride?: bool,
 *             ...,
 *         },
 *         SecurityHeadersConfig?: array{
 *             XSSProtection?: array,
 *             FrameOptions?: array,
 *             ReferrerPolicy?: array,
 *             ContentSecurityPolicy?: array,
 *             ContentTypeOptions?: array,
 *             StrictTransportSecurity?: array,
 *             ...,
 *         },
 *         ServerTimingHeadersConfig?: array{Enabled?: bool, SamplingRate?: float, ...},
 *         CustomHeadersConfig?: array{Quantity?: int, Items?: list<array>, ...},
 *         RemoveHeadersConfig?: array{Quantity?: int, Items?: list<array>, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateTrustStore(array{
 *     Id?: string,
 *     CaCertificatesBundleSource?: array{
 *         CaCertificatesBundleS3Location?: array{Bucket?: string, Key?: string, Region?: string, Version?: string, ...},
 *         ...,
 *     },
 *     UseClientCertificateOCSPEndpoint?: bool,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrustStoreAsync(array{
 *     Id?: string,
 *     CaCertificatesBundleSource?: array{
 *         CaCertificatesBundleS3Location?: array{Bucket?: string, Key?: string, Region?: string, Version?: string, ...},
 *         ...,
 *     },
 *     UseClientCertificateOCSPEndpoint?: bool,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVpcOrigin(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result updateVpcOrigin(array{
 *     VpcOriginEndpointConfig?: array{
 *         Name?: string,
 *         Arn?: string,
 *         HTTPPort?: int,
 *         HTTPSPort?: int,
 *         OriginProtocolPolicy?: 'http-only'|'https-only'|'match-viewer',
 *         OriginSslProtocols?: array{Quantity?: int, Items?: list<'SSLv3'|'TLSv1'|'TLSv1.1'|'TLSv1.2'>, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcOriginAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVpcOriginAsync(array{
 *     VpcOriginEndpointConfig?: array{
 *         Name?: string,
 *         Arn?: string,
 *         HTTPPort?: int,
 *         HTTPSPort?: int,
 *         OriginProtocolPolicy?: 'http-only'|'https-only'|'match-viewer',
 *         OriginSslProtocols?: array{Quantity?: int, Items?: list<'SSLv3'|'TLSv1'|'TLSv1.1'|'TLSv1.2'>, ...},
 *         ...,
 *     },
 *     Id?: string,
 *     IfMatch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyDnsConfiguration(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \Aws\Result verifyDnsConfiguration(array{Domain?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyDnsConfigurationAsync(array $args = []) (supported in versions 2020-05-31)
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyDnsConfigurationAsync(array{Domain?: string, Identifier?: string, ...} $args = [])
 */
class CloudFrontClient extends AwsClient
{
    /**
     * Create a signed Amazon CloudFront URL.
     *
     * This method accepts an array of configuration options:
     *
     * - url: (string)  URL of the resource being signed (can include query
     *   string and wildcards). For example: rtmp://s5c39gqb8ow64r.cloudfront.net/videos/mp3_name.mp3
     *   http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy: (string) JSON policy. Use this option when creating a signed
     *   URL for a custom policy.
     * - expires: (int) UTC Unix timestamp used when signing with a canned
     *   policy. Not required when passing a custom 'policy' option.
     * - key_pair_id: (string) The ID of the key pair used to sign CloudFront
     *   URLs for private distributions.
     * - private_key: (string) The filepath to the private key used to sign
     *   CloudFront URLs for private distributions.
     * - algorithm: (int|string) Algorithm (name or openssl constant) to be used.
     *   Defaults to SHA1. Supported algorithms are SHA1 and SHA256.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return string Signed URL with authentication parameters
     * @throws \InvalidArgumentException if url, key_pair_id, or private_key
     *     were not specified.
     * @link http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html
     */
    public function getSignedUrl(array $options)
    {
        foreach (['url', 'key_pair_id', 'private_key'] as $required) {
            if (!isset($options[$required])) {
                throw new \InvalidArgumentException("$required is required");
            }
        }

        $urlSigner = new UrlSigner(
            $options['key_pair_id'],
            $options['private_key'],
            $options['algorithm'] ?? Signer::DEFAULT_ALGORITHM,
        );

        return $urlSigner->getSignedUrl(
            $options['url'],
            isset($options['expires']) ? $options['expires'] : null,
            isset($options['policy']) ? $options['policy'] : null
        );
    }

    /**
     * Create a signed Amazon CloudFront cookie.
     *
     * This method accepts an array of configuration options:
     *
     * - url: (string)  URL of the resource being signed (can include query
     *   string and wildcards). For example: http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy: (string) JSON policy. Use this option when creating a signed
     *   URL for a custom policy.
     * - expires: (int) UTC Unix timestamp used when signing with a canned
     *   policy. Not required when passing a custom 'policy' option.
     * - key_pair_id: (string) The ID of the key pair used to sign CloudFront
     *   URLs for private distributions.
     * - private_key: (string) The filepath ot the private key used to sign
     *   CloudFront URLs for private distributions.
     * - algorithm: (int|string) OpenSSL signature algorithm constant (e.g.
     *   OPENSSL_ALGO_SHA1, OPENSSL_ALGO_SHA256) or algorithm name string
     *   (e.g. "sha256"). Defaults to OPENSSL_ALGO_SHA1.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return array Key => value pairs of signed cookies to set
     * @throws \InvalidArgumentException if url, key_pair_id, or private_key
     *     were not specified.
     * @link http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html
     */
    public function getSignedCookie(array $options)
    {
        foreach (['key_pair_id', 'private_key'] as $required) {
            if (!isset($options[$required])) {
                throw new \InvalidArgumentException("$required is required");
            }
        }

        $cookieSigner = new CookieSigner(
            $options['key_pair_id'],
            $options['private_key'],
            $options['algorithm'] ?? Signer::DEFAULT_ALGORITHM,
        );

        return $cookieSigner->getSignedCookie(
            isset($options['url']) ? $options['url'] : null,
            isset($options['expires']) ? $options['expires'] : null,
            isset($options['policy']) ? $options['policy'] : null
        );
    }
}
