<?php
namespace Aws\Lightsail;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lightsail** service.
 * @method \Aws\Result allocateStaticIp(array $args = [])
 * @phpstan-method \Aws\Result allocateStaticIp(array{staticIpName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise allocateStaticIpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise allocateStaticIpAsync(array{staticIpName?: string, ...} $args = [])
 * @method \Aws\Result attachCertificateToDistribution(array $args = [])
 * @phpstan-method \Aws\Result attachCertificateToDistribution(array{distributionName?: string, certificateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachCertificateToDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachCertificateToDistributionAsync(array{distributionName?: string, certificateName?: string, ...} $args = [])
 * @method \Aws\Result attachDisk(array $args = [])
 * @phpstan-method \Aws\Result attachDisk(array{diskName?: string, instanceName?: string, diskPath?: string, autoMounting?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachDiskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachDiskAsync(array{diskName?: string, instanceName?: string, diskPath?: string, autoMounting?: bool, ...} $args = [])
 * @method \Aws\Result attachInstancesToLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result attachInstancesToLoadBalancer(array{loadBalancerName?: string, instanceNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachInstancesToLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachInstancesToLoadBalancerAsync(array{loadBalancerName?: string, instanceNames?: list<string>, ...} $args = [])
 * @method \Aws\Result attachLoadBalancerTlsCertificate(array $args = [])
 * @phpstan-method \Aws\Result attachLoadBalancerTlsCertificate(array{loadBalancerName?: string, certificateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachLoadBalancerTlsCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachLoadBalancerTlsCertificateAsync(array{loadBalancerName?: string, certificateName?: string, ...} $args = [])
 * @method \Aws\Result attachStaticIp(array $args = [])
 * @phpstan-method \Aws\Result attachStaticIp(array{staticIpName?: string, instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachStaticIpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachStaticIpAsync(array{staticIpName?: string, instanceName?: string, ...} $args = [])
 * @method \Aws\Result closeInstancePublicPorts(array $args = [])
 * @phpstan-method \Aws\Result closeInstancePublicPorts(array{
 *     portInfo?: array{
 *         fromPort?: int,
 *         toPort?: int,
 *         protocol?: 'all'|'icmp'|'icmpv6'|'tcp'|'udp',
 *         cidrs?: list<string>,
 *         ipv6Cidrs?: list<string>,
 *         cidrListAliases?: list<string>,
 *         ...,
 *     },
 *     instanceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise closeInstancePublicPortsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise closeInstancePublicPortsAsync(array{
 *     portInfo?: array{
 *         fromPort?: int,
 *         toPort?: int,
 *         protocol?: 'all'|'icmp'|'icmpv6'|'tcp'|'udp',
 *         cidrs?: list<string>,
 *         ipv6Cidrs?: list<string>,
 *         cidrListAliases?: list<string>,
 *         ...,
 *     },
 *     instanceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copySnapshot(array $args = [])
 * @phpstan-method \Aws\Result copySnapshot(array{
 *     sourceSnapshotName?: string,
 *     sourceResourceName?: string,
 *     restoreDate?: string,
 *     useLatestRestorableAutoSnapshot?: bool,
 *     targetSnapshotName?: string,
 *     sourceRegion?: 'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-south-1'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-5'|'ca-central-1'|'eu-central-1'|'eu-north-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copySnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copySnapshotAsync(array{
 *     sourceSnapshotName?: string,
 *     sourceResourceName?: string,
 *     restoreDate?: string,
 *     useLatestRestorableAutoSnapshot?: bool,
 *     targetSnapshotName?: string,
 *     sourceRegion?: 'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-south-1'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-5'|'ca-central-1'|'eu-central-1'|'eu-north-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBucket(array $args = [])
 * @phpstan-method \Aws\Result createBucket(array{
 *     bucketName?: string,
 *     bundleId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     enableObjectVersioning?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBucketAsync(array{
 *     bucketName?: string,
 *     bundleId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     enableObjectVersioning?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBucketAccessKey(array $args = [])
 * @phpstan-method \Aws\Result createBucketAccessKey(array{bucketName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBucketAccessKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBucketAccessKeyAsync(array{bucketName?: string, ...} $args = [])
 * @method \Aws\Result createCertificate(array $args = [])
 * @phpstan-method \Aws\Result createCertificate(array{
 *     certificateName?: string,
 *     domainName?: string,
 *     subjectAlternativeNames?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCertificateAsync(array{
 *     certificateName?: string,
 *     domainName?: string,
 *     subjectAlternativeNames?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudFormationStack(array $args = [])
 * @phpstan-method \Aws\Result createCloudFormationStack(array{
 *     instances?: list<array{
 *         sourceName?: string,
 *         instanceType?: string,
 *         portInfoSource?: 'CLOSED'|'DEFAULT'|'INSTANCE'|'NONE',
 *         userData?: string,
 *         availabilityZone?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudFormationStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudFormationStackAsync(array{
 *     instances?: list<array{
 *         sourceName?: string,
 *         instanceType?: string,
 *         portInfoSource?: 'CLOSED'|'DEFAULT'|'INSTANCE'|'NONE',
 *         userData?: string,
 *         availabilityZone?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContactMethod(array $args = [])
 * @phpstan-method \Aws\Result createContactMethod(array{
 *     protocol?: 'Email'|'SMS',
 *     contactEndpoint?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactMethodAsync(array{
 *     protocol?: 'Email'|'SMS',
 *     contactEndpoint?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContainerService(array $args = [])
 * @phpstan-method \Aws\Result createContainerService(array{
 *     serviceName?: string,
 *     power?: 'large'|'medium'|'micro'|'nano'|'small'|'xlarge',
 *     scale?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     publicDomainNames?: array<string, list<string>>,
 *     deployment?: array{
 *         containers?: array<string, array>,
 *         publicEndpoint?: array{containerName?: string, containerPort?: int, healthCheck?: array, ...},
 *         ...,
 *     },
 *     privateRegistryAccess?: array{ecrImagePullerRole?: array{isActive?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContainerServiceAsync(array{
 *     serviceName?: string,
 *     power?: 'large'|'medium'|'micro'|'nano'|'small'|'xlarge',
 *     scale?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     publicDomainNames?: array<string, list<string>>,
 *     deployment?: array{
 *         containers?: array<string, array>,
 *         publicEndpoint?: array{containerName?: string, containerPort?: int, healthCheck?: array, ...},
 *         ...,
 *     },
 *     privateRegistryAccess?: array{ecrImagePullerRole?: array{isActive?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContainerServiceDeployment(array $args = [])
 * @phpstan-method \Aws\Result createContainerServiceDeployment(array{
 *     serviceName?: string,
 *     containers?: array<string, array{
 *         image?: string,
 *         command?: list<string>,
 *         environment?: array<string, string>,
 *         ports?: array<string, 'HTTP'|'HTTPS'|'TCP'|'UDP'>,
 *         ...,
 *     }>,
 *     publicEndpoint?: array{
 *         containerName?: string,
 *         containerPort?: int,
 *         healthCheck?: array{
 *             healthyThreshold?: int,
 *             unhealthyThreshold?: int,
 *             timeoutSeconds?: int,
 *             intervalSeconds?: int,
 *             path?: string,
 *             successCodes?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerServiceDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContainerServiceDeploymentAsync(array{
 *     serviceName?: string,
 *     containers?: array<string, array{
 *         image?: string,
 *         command?: list<string>,
 *         environment?: array<string, string>,
 *         ports?: array<string, 'HTTP'|'HTTPS'|'TCP'|'UDP'>,
 *         ...,
 *     }>,
 *     publicEndpoint?: array{
 *         containerName?: string,
 *         containerPort?: int,
 *         healthCheck?: array{
 *             healthyThreshold?: int,
 *             unhealthyThreshold?: int,
 *             timeoutSeconds?: int,
 *             intervalSeconds?: int,
 *             path?: string,
 *             successCodes?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContainerServiceRegistryLogin(array $args = [])
 * @phpstan-method \Aws\Result createContainerServiceRegistryLogin(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerServiceRegistryLoginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContainerServiceRegistryLoginAsync(array{...} $args = [])
 * @method \Aws\Result createDisk(array $args = [])
 * @phpstan-method \Aws\Result createDisk(array{
 *     diskName?: string,
 *     availabilityZone?: string,
 *     sizeInGb?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     addOns?: list<array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array,
 *         stopInstanceOnIdleRequest?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDiskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDiskAsync(array{
 *     diskName?: string,
 *     availabilityZone?: string,
 *     sizeInGb?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     addOns?: list<array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array,
 *         stopInstanceOnIdleRequest?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDiskFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createDiskFromSnapshot(array{
 *     diskName?: string,
 *     diskSnapshotName?: string,
 *     availabilityZone?: string,
 *     sizeInGb?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     addOns?: list<array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array,
 *         stopInstanceOnIdleRequest?: array,
 *         ...,
 *     }>,
 *     sourceDiskName?: string,
 *     restoreDate?: string,
 *     useLatestRestorableAutoSnapshot?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDiskFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDiskFromSnapshotAsync(array{
 *     diskName?: string,
 *     diskSnapshotName?: string,
 *     availabilityZone?: string,
 *     sizeInGb?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     addOns?: list<array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array,
 *         stopInstanceOnIdleRequest?: array,
 *         ...,
 *     }>,
 *     sourceDiskName?: string,
 *     restoreDate?: string,
 *     useLatestRestorableAutoSnapshot?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDiskSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createDiskSnapshot(array{
 *     diskName?: string,
 *     diskSnapshotName?: string,
 *     instanceName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDiskSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDiskSnapshotAsync(array{
 *     diskName?: string,
 *     diskSnapshotName?: string,
 *     instanceName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDistribution(array $args = [])
 * @phpstan-method \Aws\Result createDistribution(array{
 *     distributionName?: string,
 *     origin?: array{
 *         name?: string,
 *         regionName?: 'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-south-1'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-5'|'ca-central-1'|'eu-central-1'|'eu-north-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         protocolPolicy?: 'http-only'|'https-only',
 *         responseTimeout?: int,
 *         ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *         ...,
 *     },
 *     defaultCacheBehavior?: array{behavior?: 'cache'|'dont-cache', ...},
 *     cacheBehaviorSettings?: array{
 *         defaultTTL?: int,
 *         minimumTTL?: int,
 *         maximumTTL?: int,
 *         allowedHTTPMethods?: string,
 *         cachedHTTPMethods?: string,
 *         forwardedCookies?: array{option?: 'all'|'allow-list'|'none', cookiesAllowList?: list<string>, ...},
 *         forwardedHeaders?: array{
 *             option?: 'all'|'allow-list'|'none',
 *             headersAllowList?: list<'Accept'|'Accept-Charset'|'Accept-Datetime'|'Accept-Encoding'|'Accept-Language'|'Authorization'|'CloudFront-Forwarded-Proto'|'CloudFront-Is-Desktop-Viewer'|'CloudFront-Is-Mobile-Viewer'|'CloudFront-Is-SmartTV-Viewer'|'CloudFront-Is-Tablet-Viewer'|'CloudFront-Viewer-Country'|'Host'|'Origin'|'Referer'>,
 *             ...,
 *         },
 *         forwardedQueryStrings?: array{option?: bool, queryStringsAllowList?: list<string>, ...},
 *         ...,
 *     },
 *     cacheBehaviors?: list<array{path?: string, behavior?: 'cache'|'dont-cache', ...}>,
 *     bundleId?: string,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     certificateName?: string,
 *     viewerMinimumTlsProtocolVersion?: 'TLSv1.1_2016'|'TLSv1.2_2018'|'TLSv1.2_2019'|'TLSv1.2_2021',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDistributionAsync(array{
 *     distributionName?: string,
 *     origin?: array{
 *         name?: string,
 *         regionName?: 'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-south-1'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-5'|'ca-central-1'|'eu-central-1'|'eu-north-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         protocolPolicy?: 'http-only'|'https-only',
 *         responseTimeout?: int,
 *         ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *         ...,
 *     },
 *     defaultCacheBehavior?: array{behavior?: 'cache'|'dont-cache', ...},
 *     cacheBehaviorSettings?: array{
 *         defaultTTL?: int,
 *         minimumTTL?: int,
 *         maximumTTL?: int,
 *         allowedHTTPMethods?: string,
 *         cachedHTTPMethods?: string,
 *         forwardedCookies?: array{option?: 'all'|'allow-list'|'none', cookiesAllowList?: list<string>, ...},
 *         forwardedHeaders?: array{
 *             option?: 'all'|'allow-list'|'none',
 *             headersAllowList?: list<'Accept'|'Accept-Charset'|'Accept-Datetime'|'Accept-Encoding'|'Accept-Language'|'Authorization'|'CloudFront-Forwarded-Proto'|'CloudFront-Is-Desktop-Viewer'|'CloudFront-Is-Mobile-Viewer'|'CloudFront-Is-SmartTV-Viewer'|'CloudFront-Is-Tablet-Viewer'|'CloudFront-Viewer-Country'|'Host'|'Origin'|'Referer'>,
 *             ...,
 *         },
 *         forwardedQueryStrings?: array{option?: bool, queryStringsAllowList?: list<string>, ...},
 *         ...,
 *     },
 *     cacheBehaviors?: list<array{path?: string, behavior?: 'cache'|'dont-cache', ...}>,
 *     bundleId?: string,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     certificateName?: string,
 *     viewerMinimumTlsProtocolVersion?: 'TLSv1.1_2016'|'TLSv1.2_2018'|'TLSv1.2_2019'|'TLSv1.2_2021',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{domainName?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{domainName?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createDomainEntry(array $args = [])
 * @phpstan-method \Aws\Result createDomainEntry(array{
 *     domainName?: string,
 *     domainEntry?: array{
 *         id?: string,
 *         name?: string,
 *         target?: string,
 *         isAlias?: bool,
 *         type?: string,
 *         options?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainEntryAsync(array{
 *     domainName?: string,
 *     domainEntry?: array{
 *         id?: string,
 *         name?: string,
 *         target?: string,
 *         isAlias?: bool,
 *         type?: string,
 *         options?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGUISessionAccessDetails(array $args = [])
 * @phpstan-method \Aws\Result createGUISessionAccessDetails(array{resourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGUISessionAccessDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGUISessionAccessDetailsAsync(array{resourceName?: string, ...} $args = [])
 * @method \Aws\Result createInstanceSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createInstanceSnapshot(array{
 *     instanceSnapshotName?: string,
 *     instanceName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstanceSnapshotAsync(array{
 *     instanceSnapshotName?: string,
 *     instanceName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInstances(array $args = [])
 * @phpstan-method \Aws\Result createInstances(array{
 *     instanceNames?: list<string>,
 *     availabilityZone?: string,
 *     customImageName?: string,
 *     blueprintId?: string,
 *     bundleId?: string,
 *     userData?: string,
 *     keyPairName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     addOns?: list<array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array,
 *         stopInstanceOnIdleRequest?: array,
 *         ...,
 *     }>,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstancesAsync(array{
 *     instanceNames?: list<string>,
 *     availabilityZone?: string,
 *     customImageName?: string,
 *     blueprintId?: string,
 *     bundleId?: string,
 *     userData?: string,
 *     keyPairName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     addOns?: list<array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array,
 *         stopInstanceOnIdleRequest?: array,
 *         ...,
 *     }>,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInstancesFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createInstancesFromSnapshot(array{
 *     instanceNames?: list<string>,
 *     attachedDiskMapping?: array<string, list<array>>,
 *     availabilityZone?: string,
 *     instanceSnapshotName?: string,
 *     bundleId?: string,
 *     userData?: string,
 *     keyPairName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     addOns?: list<array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array,
 *         stopInstanceOnIdleRequest?: array,
 *         ...,
 *     }>,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     sourceInstanceName?: string,
 *     restoreDate?: string,
 *     useLatestRestorableAutoSnapshot?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstancesFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstancesFromSnapshotAsync(array{
 *     instanceNames?: list<string>,
 *     attachedDiskMapping?: array<string, list<array>>,
 *     availabilityZone?: string,
 *     instanceSnapshotName?: string,
 *     bundleId?: string,
 *     userData?: string,
 *     keyPairName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     addOns?: list<array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array,
 *         stopInstanceOnIdleRequest?: array,
 *         ...,
 *     }>,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     sourceInstanceName?: string,
 *     restoreDate?: string,
 *     useLatestRestorableAutoSnapshot?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKeyPair(array $args = [])
 * @phpstan-method \Aws\Result createKeyPair(array{keyPairName?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeyPairAsync(array{keyPairName?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result createLoadBalancer(array{
 *     loadBalancerName?: string,
 *     instancePort?: int,
 *     healthCheckPath?: string,
 *     certificateName?: string,
 *     certificateDomainName?: string,
 *     certificateAlternativeNames?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     tlsPolicyName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoadBalancerAsync(array{
 *     loadBalancerName?: string,
 *     instancePort?: int,
 *     healthCheckPath?: string,
 *     certificateName?: string,
 *     certificateDomainName?: string,
 *     certificateAlternativeNames?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     tlsPolicyName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLoadBalancerTlsCertificate(array $args = [])
 * @phpstan-method \Aws\Result createLoadBalancerTlsCertificate(array{
 *     loadBalancerName?: string,
 *     certificateName?: string,
 *     certificateDomainName?: string,
 *     certificateAlternativeNames?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoadBalancerTlsCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoadBalancerTlsCertificateAsync(array{
 *     loadBalancerName?: string,
 *     certificateName?: string,
 *     certificateDomainName?: string,
 *     certificateAlternativeNames?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRelationalDatabase(array $args = [])
 * @phpstan-method \Aws\Result createRelationalDatabase(array{
 *     relationalDatabaseName?: string,
 *     availabilityZone?: string,
 *     relationalDatabaseBlueprintId?: string,
 *     relationalDatabaseBundleId?: string,
 *     masterDatabaseName?: string,
 *     masterUsername?: string,
 *     masterUserPassword?: string,
 *     preferredBackupWindow?: string,
 *     preferredMaintenanceWindow?: string,
 *     publiclyAccessible?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRelationalDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRelationalDatabaseAsync(array{
 *     relationalDatabaseName?: string,
 *     availabilityZone?: string,
 *     relationalDatabaseBlueprintId?: string,
 *     relationalDatabaseBundleId?: string,
 *     masterDatabaseName?: string,
 *     masterUsername?: string,
 *     masterUserPassword?: string,
 *     preferredBackupWindow?: string,
 *     preferredMaintenanceWindow?: string,
 *     publiclyAccessible?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRelationalDatabaseFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createRelationalDatabaseFromSnapshot(array{
 *     relationalDatabaseName?: string,
 *     availabilityZone?: string,
 *     publiclyAccessible?: bool,
 *     relationalDatabaseSnapshotName?: string,
 *     relationalDatabaseBundleId?: string,
 *     sourceRelationalDatabaseName?: string,
 *     restoreTime?: int|string|\DateTimeInterface,
 *     useLatestRestorableTime?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRelationalDatabaseFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRelationalDatabaseFromSnapshotAsync(array{
 *     relationalDatabaseName?: string,
 *     availabilityZone?: string,
 *     publiclyAccessible?: bool,
 *     relationalDatabaseSnapshotName?: string,
 *     relationalDatabaseBundleId?: string,
 *     sourceRelationalDatabaseName?: string,
 *     restoreTime?: int|string|\DateTimeInterface,
 *     useLatestRestorableTime?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRelationalDatabaseSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createRelationalDatabaseSnapshot(array{
 *     relationalDatabaseName?: string,
 *     relationalDatabaseSnapshotName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRelationalDatabaseSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRelationalDatabaseSnapshotAsync(array{
 *     relationalDatabaseName?: string,
 *     relationalDatabaseSnapshotName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAlarm(array $args = [])
 * @phpstan-method \Aws\Result deleteAlarm(array{alarmName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAlarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAlarmAsync(array{alarmName?: string, ...} $args = [])
 * @method \Aws\Result deleteAutoSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteAutoSnapshot(array{resourceName?: string, date?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutoSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutoSnapshotAsync(array{resourceName?: string, date?: string, ...} $args = [])
 * @method \Aws\Result deleteBucket(array $args = [])
 * @phpstan-method \Aws\Result deleteBucket(array{bucketName?: string, forceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketAsync(array{bucketName?: string, forceDelete?: bool, ...} $args = [])
 * @method \Aws\Result deleteBucketAccessKey(array $args = [])
 * @phpstan-method \Aws\Result deleteBucketAccessKey(array{bucketName?: string, accessKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBucketAccessKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBucketAccessKeyAsync(array{bucketName?: string, accessKeyId?: string, ...} $args = [])
 * @method \Aws\Result deleteCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteCertificate(array{certificateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array{certificateName?: string, ...} $args = [])
 * @method \Aws\Result deleteContactMethod(array $args = [])
 * @phpstan-method \Aws\Result deleteContactMethod(array{protocol?: 'Email'|'SMS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactMethodAsync(array{protocol?: 'Email'|'SMS', ...} $args = [])
 * @method \Aws\Result deleteContainerImage(array $args = [])
 * @phpstan-method \Aws\Result deleteContainerImage(array{serviceName?: string, image?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContainerImageAsync(array{serviceName?: string, image?: string, ...} $args = [])
 * @method \Aws\Result deleteContainerService(array $args = [])
 * @phpstan-method \Aws\Result deleteContainerService(array{serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContainerServiceAsync(array{serviceName?: string, ...} $args = [])
 * @method \Aws\Result deleteDisk(array $args = [])
 * @phpstan-method \Aws\Result deleteDisk(array{diskName?: string, forceDeleteAddOns?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDiskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDiskAsync(array{diskName?: string, forceDeleteAddOns?: bool, ...} $args = [])
 * @method \Aws\Result deleteDiskSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteDiskSnapshot(array{diskSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDiskSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDiskSnapshotAsync(array{diskSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteDistribution(array $args = [])
 * @phpstan-method \Aws\Result deleteDistribution(array{distributionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDistributionAsync(array{distributionName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{domainName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainEntry(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainEntry(array{
 *     domainName?: string,
 *     domainEntry?: array{
 *         id?: string,
 *         name?: string,
 *         target?: string,
 *         isAlias?: bool,
 *         type?: string,
 *         options?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainEntryAsync(array{
 *     domainName?: string,
 *     domainEntry?: array{
 *         id?: string,
 *         name?: string,
 *         target?: string,
 *         isAlias?: bool,
 *         type?: string,
 *         options?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteInstance(array{instanceName?: string, forceDeleteAddOns?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceAsync(array{instanceName?: string, forceDeleteAddOns?: bool, ...} $args = [])
 * @method \Aws\Result deleteInstanceSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteInstanceSnapshot(array{instanceSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceSnapshotAsync(array{instanceSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result deleteKeyPair(array $args = [])
 * @phpstan-method \Aws\Result deleteKeyPair(array{keyPairName?: string, expectedFingerprint?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeyPairAsync(array{keyPairName?: string, expectedFingerprint?: string, ...} $args = [])
 * @method \Aws\Result deleteKnownHostKeys(array $args = [])
 * @phpstan-method \Aws\Result deleteKnownHostKeys(array{instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKnownHostKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKnownHostKeysAsync(array{instanceName?: string, ...} $args = [])
 * @method \Aws\Result deleteLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result deleteLoadBalancer(array{loadBalancerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoadBalancerAsync(array{loadBalancerName?: string, ...} $args = [])
 * @method \Aws\Result deleteLoadBalancerTlsCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteLoadBalancerTlsCertificate(array{loadBalancerName?: string, certificateName?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoadBalancerTlsCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoadBalancerTlsCertificateAsync(array{loadBalancerName?: string, certificateName?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deleteRelationalDatabase(array $args = [])
 * @phpstan-method \Aws\Result deleteRelationalDatabase(array{
 *     relationalDatabaseName?: string,
 *     skipFinalSnapshot?: bool,
 *     finalRelationalDatabaseSnapshotName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRelationalDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRelationalDatabaseAsync(array{
 *     relationalDatabaseName?: string,
 *     skipFinalSnapshot?: bool,
 *     finalRelationalDatabaseSnapshotName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteRelationalDatabaseSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteRelationalDatabaseSnapshot(array{relationalDatabaseSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRelationalDatabaseSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRelationalDatabaseSnapshotAsync(array{relationalDatabaseSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result detachCertificateFromDistribution(array $args = [])
 * @phpstan-method \Aws\Result detachCertificateFromDistribution(array{distributionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachCertificateFromDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachCertificateFromDistributionAsync(array{distributionName?: string, ...} $args = [])
 * @method \Aws\Result detachDisk(array $args = [])
 * @phpstan-method \Aws\Result detachDisk(array{diskName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachDiskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachDiskAsync(array{diskName?: string, ...} $args = [])
 * @method \Aws\Result detachInstancesFromLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result detachInstancesFromLoadBalancer(array{loadBalancerName?: string, instanceNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachInstancesFromLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachInstancesFromLoadBalancerAsync(array{loadBalancerName?: string, instanceNames?: list<string>, ...} $args = [])
 * @method \Aws\Result detachStaticIp(array $args = [])
 * @phpstan-method \Aws\Result detachStaticIp(array{staticIpName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachStaticIpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachStaticIpAsync(array{staticIpName?: string, ...} $args = [])
 * @method \Aws\Result disableAddOn(array $args = [])
 * @phpstan-method \Aws\Result disableAddOn(array{addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle', resourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableAddOnAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableAddOnAsync(array{addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle', resourceName?: string, ...} $args = [])
 * @method \Aws\Result downloadDefaultKeyPair(array $args = [])
 * @phpstan-method \Aws\Result downloadDefaultKeyPair(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise downloadDefaultKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise downloadDefaultKeyPairAsync(array{...} $args = [])
 * @method \Aws\Result enableAddOn(array $args = [])
 * @phpstan-method \Aws\Result enableAddOn(array{
 *     resourceName?: string,
 *     addOnRequest?: array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array{snapshotTimeOfDay?: string, ...},
 *         stopInstanceOnIdleRequest?: array{threshold?: string, duration?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableAddOnAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableAddOnAsync(array{
 *     resourceName?: string,
 *     addOnRequest?: array{
 *         addOnType?: 'AutoSnapshot'|'StopInstanceOnIdle',
 *         autoSnapshotAddOnRequest?: array{snapshotTimeOfDay?: string, ...},
 *         stopInstanceOnIdleRequest?: array{threshold?: string, duration?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportSnapshot(array $args = [])
 * @phpstan-method \Aws\Result exportSnapshot(array{sourceSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportSnapshotAsync(array{sourceSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result getActiveNames(array $args = [])
 * @phpstan-method \Aws\Result getActiveNames(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getActiveNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getActiveNamesAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getAlarms(array $args = [])
 * @phpstan-method \Aws\Result getAlarms(array{alarmName?: string, pageToken?: string, monitoredResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAlarmsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAlarmsAsync(array{alarmName?: string, pageToken?: string, monitoredResourceName?: string, ...} $args = [])
 * @method \Aws\Result getAutoSnapshots(array $args = [])
 * @phpstan-method \Aws\Result getAutoSnapshots(array{resourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutoSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutoSnapshotsAsync(array{resourceName?: string, ...} $args = [])
 * @method \Aws\Result getBlueprints(array $args = [])
 * @phpstan-method \Aws\Result getBlueprints(array{includeInactive?: bool, pageToken?: string, appCategory?: 'LfR', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlueprintsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlueprintsAsync(array{includeInactive?: bool, pageToken?: string, appCategory?: 'LfR', ...} $args = [])
 * @method \Aws\Result getBucketAccessKeys(array $args = [])
 * @phpstan-method \Aws\Result getBucketAccessKeys(array{bucketName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketAccessKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketAccessKeysAsync(array{bucketName?: string, ...} $args = [])
 * @method \Aws\Result getBucketBundles(array $args = [])
 * @phpstan-method \Aws\Result getBucketBundles(array{includeInactive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketBundlesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketBundlesAsync(array{includeInactive?: bool, ...} $args = [])
 * @method \Aws\Result getBucketMetricData(array $args = [])
 * @phpstan-method \Aws\Result getBucketMetricData(array{
 *     bucketName?: string,
 *     metricName?: 'BucketSizeBytes'|'NumberOfObjects',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     period?: int,
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketMetricDataAsync(array{
 *     bucketName?: string,
 *     metricName?: 'BucketSizeBytes'|'NumberOfObjects',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     period?: int,
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getBuckets(array $args = [])
 * @phpstan-method \Aws\Result getBuckets(array{bucketName?: string, pageToken?: string, includeConnectedResources?: bool, includeCors?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketsAsync(array{bucketName?: string, pageToken?: string, includeConnectedResources?: bool, includeCors?: bool, ...} $args = [])
 * @method \Aws\Result getBundles(array $args = [])
 * @phpstan-method \Aws\Result getBundles(array{includeInactive?: bool, pageToken?: string, appCategory?: 'LfR', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBundlesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBundlesAsync(array{includeInactive?: bool, pageToken?: string, appCategory?: 'LfR', ...} $args = [])
 * @method \Aws\Result getCertificates(array $args = [])
 * @phpstan-method \Aws\Result getCertificates(array{
 *     certificateStatuses?: list<'EXPIRED'|'FAILED'|'INACTIVE'|'ISSUED'|'PENDING_VALIDATION'|'REVOKED'|'VALIDATION_TIMED_OUT'>,
 *     includeCertificateDetails?: bool,
 *     certificateName?: string,
 *     pageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCertificatesAsync(array{
 *     certificateStatuses?: list<'EXPIRED'|'FAILED'|'INACTIVE'|'ISSUED'|'PENDING_VALIDATION'|'REVOKED'|'VALIDATION_TIMED_OUT'>,
 *     includeCertificateDetails?: bool,
 *     certificateName?: string,
 *     pageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCloudFormationStackRecords(array $args = [])
 * @phpstan-method \Aws\Result getCloudFormationStackRecords(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudFormationStackRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudFormationStackRecordsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getContactMethods(array $args = [])
 * @phpstan-method \Aws\Result getContactMethods(array{protocols?: list<'Email'|'SMS'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactMethodsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactMethodsAsync(array{protocols?: list<'Email'|'SMS'>, ...} $args = [])
 * @method \Aws\Result getContainerAPIMetadata(array $args = [])
 * @phpstan-method \Aws\Result getContainerAPIMetadata(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerAPIMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerAPIMetadataAsync(array{...} $args = [])
 * @method \Aws\Result getContainerImages(array $args = [])
 * @phpstan-method \Aws\Result getContainerImages(array{serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerImagesAsync(array{serviceName?: string, ...} $args = [])
 * @method \Aws\Result getContainerLog(array $args = [])
 * @phpstan-method \Aws\Result getContainerLog(array{
 *     serviceName?: string,
 *     containerName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     filterPattern?: string,
 *     pageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerLogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerLogAsync(array{
 *     serviceName?: string,
 *     containerName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     filterPattern?: string,
 *     pageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getContainerServiceDeployments(array $args = [])
 * @phpstan-method \Aws\Result getContainerServiceDeployments(array{serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerServiceDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerServiceDeploymentsAsync(array{serviceName?: string, ...} $args = [])
 * @method \Aws\Result getContainerServiceMetricData(array $args = [])
 * @phpstan-method \Aws\Result getContainerServiceMetricData(array{
 *     serviceName?: string,
 *     metricName?: 'CPUUtilization'|'MemoryUtilization',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     period?: int,
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerServiceMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerServiceMetricDataAsync(array{
 *     serviceName?: string,
 *     metricName?: 'CPUUtilization'|'MemoryUtilization',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     period?: int,
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getContainerServicePowers(array $args = [])
 * @phpstan-method \Aws\Result getContainerServicePowers(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerServicePowersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerServicePowersAsync(array{...} $args = [])
 * @method \Aws\Result getContainerServices(array $args = [])
 * @phpstan-method \Aws\Result getContainerServices(array{serviceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerServicesAsync(array{serviceName?: string, ...} $args = [])
 * @method \Aws\Result getCostEstimate(array $args = [])
 * @phpstan-method \Aws\Result getCostEstimate(array{
 *     resourceName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCostEstimateAsync(array{
 *     resourceName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDisk(array $args = [])
 * @phpstan-method \Aws\Result getDisk(array{diskName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDiskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDiskAsync(array{diskName?: string, ...} $args = [])
 * @method \Aws\Result getDiskSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getDiskSnapshot(array{diskSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDiskSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDiskSnapshotAsync(array{diskSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result getDiskSnapshots(array $args = [])
 * @phpstan-method \Aws\Result getDiskSnapshots(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDiskSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDiskSnapshotsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getDisks(array $args = [])
 * @phpstan-method \Aws\Result getDisks(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDisksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDisksAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getDistributionBundles(array $args = [])
 * @phpstan-method \Aws\Result getDistributionBundles(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionBundlesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionBundlesAsync(array{...} $args = [])
 * @method \Aws\Result getDistributionLatestCacheReset(array $args = [])
 * @phpstan-method \Aws\Result getDistributionLatestCacheReset(array{distributionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionLatestCacheResetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionLatestCacheResetAsync(array{distributionName?: string, ...} $args = [])
 * @method \Aws\Result getDistributionMetricData(array $args = [])
 * @phpstan-method \Aws\Result getDistributionMetricData(array{
 *     distributionName?: string,
 *     metricName?: 'BytesDownloaded'|'BytesUploaded'|'Http4xxErrorRate'|'Http5xxErrorRate'|'Requests'|'TotalErrorRate',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     period?: int,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionMetricDataAsync(array{
 *     distributionName?: string,
 *     metricName?: 'BytesDownloaded'|'BytesUploaded'|'Http4xxErrorRate'|'Http5xxErrorRate'|'Requests'|'TotalErrorRate',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     period?: int,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDistributions(array $args = [])
 * @phpstan-method \Aws\Result getDistributions(array{distributionName?: string, pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionsAsync(array{distributionName?: string, pageToken?: string, ...} $args = [])
 * @method \Aws\Result getDomain(array $args = [])
 * @phpstan-method \Aws\Result getDomain(array{domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainAsync(array{domainName?: string, ...} $args = [])
 * @method \Aws\Result getDomains(array $args = [])
 * @phpstan-method \Aws\Result getDomains(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getExportSnapshotRecords(array $args = [])
 * @phpstan-method \Aws\Result getExportSnapshotRecords(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportSnapshotRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportSnapshotRecordsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getInstance(array $args = [])
 * @phpstan-method \Aws\Result getInstance(array{instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceAsync(array{instanceName?: string, ...} $args = [])
 * @method \Aws\Result getInstanceAccessDetails(array $args = [])
 * @phpstan-method \Aws\Result getInstanceAccessDetails(array{instanceName?: string, protocol?: 'rdp'|'ssh', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceAccessDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceAccessDetailsAsync(array{instanceName?: string, protocol?: 'rdp'|'ssh', ...} $args = [])
 * @method \Aws\Result getInstanceMetricData(array $args = [])
 * @phpstan-method \Aws\Result getInstanceMetricData(array{
 *     instanceName?: string,
 *     metricName?: 'BurstCapacityPercentage'|'BurstCapacityTime'|'CPUUtilization'|'MetadataNoToken'|'NetworkIn'|'NetworkOut'|'StatusCheckFailed'|'StatusCheckFailed_Instance'|'StatusCheckFailed_System',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceMetricDataAsync(array{
 *     instanceName?: string,
 *     metricName?: 'BurstCapacityPercentage'|'BurstCapacityTime'|'CPUUtilization'|'MetadataNoToken'|'NetworkIn'|'NetworkOut'|'StatusCheckFailed'|'StatusCheckFailed_Instance'|'StatusCheckFailed_System',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getInstancePortStates(array $args = [])
 * @phpstan-method \Aws\Result getInstancePortStates(array{instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstancePortStatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstancePortStatesAsync(array{instanceName?: string, ...} $args = [])
 * @method \Aws\Result getInstanceSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getInstanceSnapshot(array{instanceSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceSnapshotAsync(array{instanceSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result getInstanceSnapshots(array $args = [])
 * @phpstan-method \Aws\Result getInstanceSnapshots(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceSnapshotsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getInstanceState(array $args = [])
 * @phpstan-method \Aws\Result getInstanceState(array{instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceStateAsync(array{instanceName?: string, ...} $args = [])
 * @method \Aws\Result getInstances(array $args = [])
 * @phpstan-method \Aws\Result getInstances(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstancesAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getKeyPair(array $args = [])
 * @phpstan-method \Aws\Result getKeyPair(array{keyPairName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyPairAsync(array{keyPairName?: string, ...} $args = [])
 * @method \Aws\Result getKeyPairs(array $args = [])
 * @phpstan-method \Aws\Result getKeyPairs(array{pageToken?: string, includeDefaultKeyPair?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyPairsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyPairsAsync(array{pageToken?: string, includeDefaultKeyPair?: bool, ...} $args = [])
 * @method \Aws\Result getLoadBalancer(array $args = [])
 * @phpstan-method \Aws\Result getLoadBalancer(array{loadBalancerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoadBalancerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoadBalancerAsync(array{loadBalancerName?: string, ...} $args = [])
 * @method \Aws\Result getLoadBalancerMetricData(array $args = [])
 * @phpstan-method \Aws\Result getLoadBalancerMetricData(array{
 *     loadBalancerName?: string,
 *     metricName?: 'ClientTLSNegotiationErrorCount'|'HTTPCode_Instance_2XX_Count'|'HTTPCode_Instance_3XX_Count'|'HTTPCode_Instance_4XX_Count'|'HTTPCode_Instance_5XX_Count'|'HTTPCode_LB_4XX_Count'|'HTTPCode_LB_5XX_Count'|'HealthyHostCount'|'InstanceResponseTime'|'RejectedConnectionCount'|'RequestCount'|'UnhealthyHostCount',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoadBalancerMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoadBalancerMetricDataAsync(array{
 *     loadBalancerName?: string,
 *     metricName?: 'ClientTLSNegotiationErrorCount'|'HTTPCode_Instance_2XX_Count'|'HTTPCode_Instance_3XX_Count'|'HTTPCode_Instance_4XX_Count'|'HTTPCode_Instance_5XX_Count'|'HTTPCode_LB_4XX_Count'|'HTTPCode_LB_5XX_Count'|'HealthyHostCount'|'InstanceResponseTime'|'RejectedConnectionCount'|'RequestCount'|'UnhealthyHostCount',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getLoadBalancerTlsCertificates(array $args = [])
 * @phpstan-method \Aws\Result getLoadBalancerTlsCertificates(array{loadBalancerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoadBalancerTlsCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoadBalancerTlsCertificatesAsync(array{loadBalancerName?: string, ...} $args = [])
 * @method \Aws\Result getLoadBalancerTlsPolicies(array $args = [])
 * @phpstan-method \Aws\Result getLoadBalancerTlsPolicies(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoadBalancerTlsPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoadBalancerTlsPoliciesAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getLoadBalancers(array $args = [])
 * @phpstan-method \Aws\Result getLoadBalancers(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoadBalancersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoadBalancersAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getOperation(array $args = [])
 * @phpstan-method \Aws\Result getOperation(array{operationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOperationAsync(array{operationId?: string, ...} $args = [])
 * @method \Aws\Result getOperations(array $args = [])
 * @phpstan-method \Aws\Result getOperations(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOperationsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getOperationsForResource(array $args = [])
 * @phpstan-method \Aws\Result getOperationsForResource(array{resourceName?: string, pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOperationsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOperationsForResourceAsync(array{resourceName?: string, pageToken?: string, ...} $args = [])
 * @method \Aws\Result getRegions(array $args = [])
 * @phpstan-method \Aws\Result getRegions(array{includeAvailabilityZones?: bool, includeRelationalDatabaseAvailabilityZones?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegionsAsync(array{includeAvailabilityZones?: bool, includeRelationalDatabaseAvailabilityZones?: bool, ...} $args = [])
 * @method \Aws\Result getRelationalDatabase(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabase(array{relationalDatabaseName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseAsync(array{relationalDatabaseName?: string, ...} $args = [])
 * @method \Aws\Result getRelationalDatabaseBlueprints(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseBlueprints(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseBlueprintsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseBlueprintsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getRelationalDatabaseBundles(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseBundles(array{pageToken?: string, includeInactive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseBundlesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseBundlesAsync(array{pageToken?: string, includeInactive?: bool, ...} $args = [])
 * @method \Aws\Result getRelationalDatabaseEvents(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseEvents(array{relationalDatabaseName?: string, durationInMinutes?: int, pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseEventsAsync(array{relationalDatabaseName?: string, durationInMinutes?: int, pageToken?: string, ...} $args = [])
 * @method \Aws\Result getRelationalDatabaseLogEvents(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseLogEvents(array{
 *     relationalDatabaseName?: string,
 *     logStreamName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     startFromHead?: bool,
 *     pageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseLogEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseLogEventsAsync(array{
 *     relationalDatabaseName?: string,
 *     logStreamName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     startFromHead?: bool,
 *     pageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRelationalDatabaseLogStreams(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseLogStreams(array{relationalDatabaseName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseLogStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseLogStreamsAsync(array{relationalDatabaseName?: string, ...} $args = [])
 * @method \Aws\Result getRelationalDatabaseMasterUserPassword(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseMasterUserPassword(array{relationalDatabaseName?: string, passwordVersion?: 'CURRENT'|'PENDING'|'PREVIOUS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseMasterUserPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseMasterUserPasswordAsync(array{relationalDatabaseName?: string, passwordVersion?: 'CURRENT'|'PENDING'|'PREVIOUS', ...} $args = [])
 * @method \Aws\Result getRelationalDatabaseMetricData(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseMetricData(array{
 *     relationalDatabaseName?: string,
 *     metricName?: 'CPUUtilization'|'DatabaseConnections'|'DiskQueueDepth'|'FreeStorageSpace'|'NetworkReceiveThroughput'|'NetworkTransmitThroughput',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseMetricDataAsync(array{
 *     relationalDatabaseName?: string,
 *     metricName?: 'CPUUtilization'|'DatabaseConnections'|'DiskQueueDepth'|'FreeStorageSpace'|'NetworkReceiveThroughput'|'NetworkTransmitThroughput',
 *     period?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRelationalDatabaseParameters(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseParameters(array{relationalDatabaseName?: string, pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseParametersAsync(array{relationalDatabaseName?: string, pageToken?: string, ...} $args = [])
 * @method \Aws\Result getRelationalDatabaseSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseSnapshot(array{relationalDatabaseSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseSnapshotAsync(array{relationalDatabaseSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result getRelationalDatabaseSnapshots(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabaseSnapshots(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabaseSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabaseSnapshotsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getRelationalDatabases(array $args = [])
 * @phpstan-method \Aws\Result getRelationalDatabases(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRelationalDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationalDatabasesAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result getSetupHistory(array $args = [])
 * @phpstan-method \Aws\Result getSetupHistory(array{resourceName?: string, pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSetupHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSetupHistoryAsync(array{resourceName?: string, pageToken?: string, ...} $args = [])
 * @method \Aws\Result getStaticIp(array $args = [])
 * @phpstan-method \Aws\Result getStaticIp(array{staticIpName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStaticIpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStaticIpAsync(array{staticIpName?: string, ...} $args = [])
 * @method \Aws\Result getStaticIps(array $args = [])
 * @phpstan-method \Aws\Result getStaticIps(array{pageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStaticIpsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStaticIpsAsync(array{pageToken?: string, ...} $args = [])
 * @method \Aws\Result importKeyPair(array $args = [])
 * @phpstan-method \Aws\Result importKeyPair(array{keyPairName?: string, publicKeyBase64?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importKeyPairAsync(array{keyPairName?: string, publicKeyBase64?: string, ...} $args = [])
 * @method \Aws\Result isVpcPeered(array $args = [])
 * @phpstan-method \Aws\Result isVpcPeered(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise isVpcPeeredAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise isVpcPeeredAsync(array{...} $args = [])
 * @method \Aws\Result openInstancePublicPorts(array $args = [])
 * @phpstan-method \Aws\Result openInstancePublicPorts(array{
 *     portInfo?: array{
 *         fromPort?: int,
 *         toPort?: int,
 *         protocol?: 'all'|'icmp'|'icmpv6'|'tcp'|'udp',
 *         cidrs?: list<string>,
 *         ipv6Cidrs?: list<string>,
 *         cidrListAliases?: list<string>,
 *         ...,
 *     },
 *     instanceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise openInstancePublicPortsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise openInstancePublicPortsAsync(array{
 *     portInfo?: array{
 *         fromPort?: int,
 *         toPort?: int,
 *         protocol?: 'all'|'icmp'|'icmpv6'|'tcp'|'udp',
 *         cidrs?: list<string>,
 *         ipv6Cidrs?: list<string>,
 *         cidrListAliases?: list<string>,
 *         ...,
 *     },
 *     instanceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result peerVpc(array $args = [])
 * @phpstan-method \Aws\Result peerVpc(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise peerVpcAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise peerVpcAsync(array{...} $args = [])
 * @method \Aws\Result putAlarm(array $args = [])
 * @phpstan-method \Aws\Result putAlarm(array{
 *     alarmName?: string,
 *     metricName?: 'BurstCapacityPercentage'|'BurstCapacityTime'|'CPUUtilization'|'ClientTLSNegotiationErrorCount'|'DatabaseConnections'|'DiskQueueDepth'|'FreeStorageSpace'|'HTTPCode_Instance_2XX_Count'|'HTTPCode_Instance_3XX_Count'|'HTTPCode_Instance_4XX_Count'|'HTTPCode_Instance_5XX_Count'|'HTTPCode_LB_4XX_Count'|'HTTPCode_LB_5XX_Count'|'HealthyHostCount'|'InstanceResponseTime'|'NetworkIn'|'NetworkOut'|'NetworkReceiveThroughput'|'NetworkTransmitThroughput'|'RejectedConnectionCount'|'RequestCount'|'StatusCheckFailed'|'StatusCheckFailed_Instance'|'StatusCheckFailed_System'|'UnhealthyHostCount',
 *     monitoredResourceName?: string,
 *     comparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     threshold?: float,
 *     evaluationPeriods?: int,
 *     datapointsToAlarm?: int,
 *     treatMissingData?: 'breaching'|'ignore'|'missing'|'notBreaching',
 *     contactProtocols?: list<'Email'|'SMS'>,
 *     notificationTriggers?: list<'ALARM'|'INSUFFICIENT_DATA'|'OK'>,
 *     notificationEnabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAlarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAlarmAsync(array{
 *     alarmName?: string,
 *     metricName?: 'BurstCapacityPercentage'|'BurstCapacityTime'|'CPUUtilization'|'ClientTLSNegotiationErrorCount'|'DatabaseConnections'|'DiskQueueDepth'|'FreeStorageSpace'|'HTTPCode_Instance_2XX_Count'|'HTTPCode_Instance_3XX_Count'|'HTTPCode_Instance_4XX_Count'|'HTTPCode_Instance_5XX_Count'|'HTTPCode_LB_4XX_Count'|'HTTPCode_LB_5XX_Count'|'HealthyHostCount'|'InstanceResponseTime'|'NetworkIn'|'NetworkOut'|'NetworkReceiveThroughput'|'NetworkTransmitThroughput'|'RejectedConnectionCount'|'RequestCount'|'StatusCheckFailed'|'StatusCheckFailed_Instance'|'StatusCheckFailed_System'|'UnhealthyHostCount',
 *     monitoredResourceName?: string,
 *     comparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     threshold?: float,
 *     evaluationPeriods?: int,
 *     datapointsToAlarm?: int,
 *     treatMissingData?: 'breaching'|'ignore'|'missing'|'notBreaching',
 *     contactProtocols?: list<'Email'|'SMS'>,
 *     notificationTriggers?: list<'ALARM'|'INSUFFICIENT_DATA'|'OK'>,
 *     notificationEnabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putInstancePublicPorts(array $args = [])
 * @phpstan-method \Aws\Result putInstancePublicPorts(array{
 *     portInfos?: list<array{
 *         fromPort?: int,
 *         toPort?: int,
 *         protocol?: 'all'|'icmp'|'icmpv6'|'tcp'|'udp',
 *         cidrs?: list<string>,
 *         ipv6Cidrs?: list<string>,
 *         cidrListAliases?: list<string>,
 *         ...,
 *     }>,
 *     instanceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putInstancePublicPortsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInstancePublicPortsAsync(array{
 *     portInfos?: list<array{
 *         fromPort?: int,
 *         toPort?: int,
 *         protocol?: 'all'|'icmp'|'icmpv6'|'tcp'|'udp',
 *         cidrs?: list<string>,
 *         ipv6Cidrs?: list<string>,
 *         cidrListAliases?: list<string>,
 *         ...,
 *     }>,
 *     instanceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rebootInstance(array $args = [])
 * @phpstan-method \Aws\Result rebootInstance(array{instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootInstanceAsync(array{instanceName?: string, ...} $args = [])
 * @method \Aws\Result rebootRelationalDatabase(array $args = [])
 * @phpstan-method \Aws\Result rebootRelationalDatabase(array{relationalDatabaseName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootRelationalDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootRelationalDatabaseAsync(array{relationalDatabaseName?: string, ...} $args = [])
 * @method \Aws\Result registerContainerImage(array $args = [])
 * @phpstan-method \Aws\Result registerContainerImage(array{serviceName?: string, label?: string, digest?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerContainerImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerContainerImageAsync(array{serviceName?: string, label?: string, digest?: string, ...} $args = [])
 * @method \Aws\Result releaseStaticIp(array $args = [])
 * @phpstan-method \Aws\Result releaseStaticIp(array{staticIpName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise releaseStaticIpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise releaseStaticIpAsync(array{staticIpName?: string, ...} $args = [])
 * @method \Aws\Result resetDistributionCache(array $args = [])
 * @phpstan-method \Aws\Result resetDistributionCache(array{distributionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetDistributionCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetDistributionCacheAsync(array{distributionName?: string, ...} $args = [])
 * @method \Aws\Result sendContactMethodVerification(array $args = [])
 * @phpstan-method \Aws\Result sendContactMethodVerification(array{protocol?: 'Email', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendContactMethodVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendContactMethodVerificationAsync(array{protocol?: 'Email', ...} $args = [])
 * @method \Aws\Result setIpAddressType(array $args = [])
 * @phpstan-method \Aws\Result setIpAddressType(array{
 *     resourceType?: 'Alarm'|'Bucket'|'Certificate'|'CloudFormationStackRecord'|'ContactMethod'|'ContainerService'|'Disk'|'DiskSnapshot'|'Distribution'|'Domain'|'ExportSnapshotRecord'|'Instance'|'InstanceSnapshot'|'KeyPair'|'LoadBalancer'|'LoadBalancerTlsCertificate'|'PeeredVpc'|'RelationalDatabase'|'RelationalDatabaseSnapshot'|'StaticIp',
 *     resourceName?: string,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     acceptBundleUpdate?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setIpAddressTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIpAddressTypeAsync(array{
 *     resourceType?: 'Alarm'|'Bucket'|'Certificate'|'CloudFormationStackRecord'|'ContactMethod'|'ContainerService'|'Disk'|'DiskSnapshot'|'Distribution'|'Domain'|'ExportSnapshotRecord'|'Instance'|'InstanceSnapshot'|'KeyPair'|'LoadBalancer'|'LoadBalancerTlsCertificate'|'PeeredVpc'|'RelationalDatabase'|'RelationalDatabaseSnapshot'|'StaticIp',
 *     resourceName?: string,
 *     ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *     acceptBundleUpdate?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setResourceAccessForBucket(array $args = [])
 * @phpstan-method \Aws\Result setResourceAccessForBucket(array{resourceName?: string, bucketName?: string, access?: 'allow'|'deny', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setResourceAccessForBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setResourceAccessForBucketAsync(array{resourceName?: string, bucketName?: string, access?: 'allow'|'deny', ...} $args = [])
 * @method \Aws\Result setupInstanceHttps(array $args = [])
 * @phpstan-method \Aws\Result setupInstanceHttps(array{
 *     instanceName?: string,
 *     emailAddress?: string,
 *     domainNames?: list<string>,
 *     certificateProvider?: 'LetsEncrypt',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setupInstanceHttpsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setupInstanceHttpsAsync(array{
 *     instanceName?: string,
 *     emailAddress?: string,
 *     domainNames?: list<string>,
 *     certificateProvider?: 'LetsEncrypt',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startGUISession(array $args = [])
 * @phpstan-method \Aws\Result startGUISession(array{resourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startGUISessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startGUISessionAsync(array{resourceName?: string, ...} $args = [])
 * @method \Aws\Result startInstance(array $args = [])
 * @phpstan-method \Aws\Result startInstance(array{instanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInstanceAsync(array{instanceName?: string, ...} $args = [])
 * @method \Aws\Result startRelationalDatabase(array $args = [])
 * @phpstan-method \Aws\Result startRelationalDatabase(array{relationalDatabaseName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startRelationalDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRelationalDatabaseAsync(array{relationalDatabaseName?: string, ...} $args = [])
 * @method \Aws\Result stopGUISession(array $args = [])
 * @phpstan-method \Aws\Result stopGUISession(array{resourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopGUISessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopGUISessionAsync(array{resourceName?: string, ...} $args = [])
 * @method \Aws\Result stopInstance(array $args = [])
 * @phpstan-method \Aws\Result stopInstance(array{instanceName?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopInstanceAsync(array{instanceName?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result stopRelationalDatabase(array $args = [])
 * @phpstan-method \Aws\Result stopRelationalDatabase(array{relationalDatabaseName?: string, relationalDatabaseSnapshotName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRelationalDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRelationalDatabaseAsync(array{relationalDatabaseName?: string, relationalDatabaseSnapshotName?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceName?: string, resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceName?: string, resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result testAlarm(array $args = [])
 * @phpstan-method \Aws\Result testAlarm(array{alarmName?: string, state?: 'ALARM'|'INSUFFICIENT_DATA'|'OK', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testAlarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testAlarmAsync(array{alarmName?: string, state?: 'ALARM'|'INSUFFICIENT_DATA'|'OK', ...} $args = [])
 * @method \Aws\Result unpeerVpc(array $args = [])
 * @phpstan-method \Aws\Result unpeerVpc(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unpeerVpcAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unpeerVpcAsync(array{...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceName?: string, resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceName?: string, resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBucket(array $args = [])
 * @phpstan-method \Aws\Result updateBucket(array{
 *     bucketName?: string,
 *     accessRules?: array{getObject?: 'private'|'public', allowPublicOverrides?: bool, ...},
 *     versioning?: string,
 *     readonlyAccessAccounts?: list<string>,
 *     accessLogConfig?: array{enabled?: bool, destination?: string, prefix?: string, ...},
 *     cors?: array{rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBucketAsync(array{
 *     bucketName?: string,
 *     accessRules?: array{getObject?: 'private'|'public', allowPublicOverrides?: bool, ...},
 *     versioning?: string,
 *     readonlyAccessAccounts?: list<string>,
 *     accessLogConfig?: array{enabled?: bool, destination?: string, prefix?: string, ...},
 *     cors?: array{rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBucketBundle(array $args = [])
 * @phpstan-method \Aws\Result updateBucketBundle(array{bucketName?: string, bundleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBucketBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBucketBundleAsync(array{bucketName?: string, bundleId?: string, ...} $args = [])
 * @method \Aws\Result updateContainerService(array $args = [])
 * @phpstan-method \Aws\Result updateContainerService(array{
 *     serviceName?: string,
 *     power?: 'large'|'medium'|'micro'|'nano'|'small'|'xlarge',
 *     scale?: int,
 *     isDisabled?: bool,
 *     publicDomainNames?: array<string, list<string>>,
 *     privateRegistryAccess?: array{ecrImagePullerRole?: array{isActive?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContainerServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContainerServiceAsync(array{
 *     serviceName?: string,
 *     power?: 'large'|'medium'|'micro'|'nano'|'small'|'xlarge',
 *     scale?: int,
 *     isDisabled?: bool,
 *     publicDomainNames?: array<string, list<string>>,
 *     privateRegistryAccess?: array{ecrImagePullerRole?: array{isActive?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDistribution(array $args = [])
 * @phpstan-method \Aws\Result updateDistribution(array{
 *     distributionName?: string,
 *     origin?: array{
 *         name?: string,
 *         regionName?: 'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-south-1'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-5'|'ca-central-1'|'eu-central-1'|'eu-north-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         protocolPolicy?: 'http-only'|'https-only',
 *         responseTimeout?: int,
 *         ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *         ...,
 *     },
 *     defaultCacheBehavior?: array{behavior?: 'cache'|'dont-cache', ...},
 *     cacheBehaviorSettings?: array{
 *         defaultTTL?: int,
 *         minimumTTL?: int,
 *         maximumTTL?: int,
 *         allowedHTTPMethods?: string,
 *         cachedHTTPMethods?: string,
 *         forwardedCookies?: array{option?: 'all'|'allow-list'|'none', cookiesAllowList?: list<string>, ...},
 *         forwardedHeaders?: array{
 *             option?: 'all'|'allow-list'|'none',
 *             headersAllowList?: list<'Accept'|'Accept-Charset'|'Accept-Datetime'|'Accept-Encoding'|'Accept-Language'|'Authorization'|'CloudFront-Forwarded-Proto'|'CloudFront-Is-Desktop-Viewer'|'CloudFront-Is-Mobile-Viewer'|'CloudFront-Is-SmartTV-Viewer'|'CloudFront-Is-Tablet-Viewer'|'CloudFront-Viewer-Country'|'Host'|'Origin'|'Referer'>,
 *             ...,
 *         },
 *         forwardedQueryStrings?: array{option?: bool, queryStringsAllowList?: list<string>, ...},
 *         ...,
 *     },
 *     cacheBehaviors?: list<array{path?: string, behavior?: 'cache'|'dont-cache', ...}>,
 *     isEnabled?: bool,
 *     viewerMinimumTlsProtocolVersion?: 'TLSv1.1_2016'|'TLSv1.2_2018'|'TLSv1.2_2019'|'TLSv1.2_2021',
 *     certificateName?: string,
 *     useDefaultCertificate?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDistributionAsync(array{
 *     distributionName?: string,
 *     origin?: array{
 *         name?: string,
 *         regionName?: 'ap-east-1'|'ap-northeast-1'|'ap-northeast-2'|'ap-south-1'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-5'|'ca-central-1'|'eu-central-1'|'eu-north-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *         protocolPolicy?: 'http-only'|'https-only',
 *         responseTimeout?: int,
 *         ipAddressType?: 'dualstack'|'ipv4'|'ipv6',
 *         ...,
 *     },
 *     defaultCacheBehavior?: array{behavior?: 'cache'|'dont-cache', ...},
 *     cacheBehaviorSettings?: array{
 *         defaultTTL?: int,
 *         minimumTTL?: int,
 *         maximumTTL?: int,
 *         allowedHTTPMethods?: string,
 *         cachedHTTPMethods?: string,
 *         forwardedCookies?: array{option?: 'all'|'allow-list'|'none', cookiesAllowList?: list<string>, ...},
 *         forwardedHeaders?: array{
 *             option?: 'all'|'allow-list'|'none',
 *             headersAllowList?: list<'Accept'|'Accept-Charset'|'Accept-Datetime'|'Accept-Encoding'|'Accept-Language'|'Authorization'|'CloudFront-Forwarded-Proto'|'CloudFront-Is-Desktop-Viewer'|'CloudFront-Is-Mobile-Viewer'|'CloudFront-Is-SmartTV-Viewer'|'CloudFront-Is-Tablet-Viewer'|'CloudFront-Viewer-Country'|'Host'|'Origin'|'Referer'>,
 *             ...,
 *         },
 *         forwardedQueryStrings?: array{option?: bool, queryStringsAllowList?: list<string>, ...},
 *         ...,
 *     },
 *     cacheBehaviors?: list<array{path?: string, behavior?: 'cache'|'dont-cache', ...}>,
 *     isEnabled?: bool,
 *     viewerMinimumTlsProtocolVersion?: 'TLSv1.1_2016'|'TLSv1.2_2018'|'TLSv1.2_2019'|'TLSv1.2_2021',
 *     certificateName?: string,
 *     useDefaultCertificate?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDistributionBundle(array $args = [])
 * @phpstan-method \Aws\Result updateDistributionBundle(array{distributionName?: string, bundleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDistributionBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDistributionBundleAsync(array{distributionName?: string, bundleId?: string, ...} $args = [])
 * @method \Aws\Result updateDomainEntry(array $args = [])
 * @phpstan-method \Aws\Result updateDomainEntry(array{
 *     domainName?: string,
 *     domainEntry?: array{
 *         id?: string,
 *         name?: string,
 *         target?: string,
 *         isAlias?: bool,
 *         type?: string,
 *         options?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainEntryAsync(array{
 *     domainName?: string,
 *     domainEntry?: array{
 *         id?: string,
 *         name?: string,
 *         target?: string,
 *         isAlias?: bool,
 *         type?: string,
 *         options?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInstanceMetadataOptions(array $args = [])
 * @phpstan-method \Aws\Result updateInstanceMetadataOptions(array{
 *     instanceName?: string,
 *     httpTokens?: 'optional'|'required',
 *     httpEndpoint?: 'disabled'|'enabled',
 *     httpPutResponseHopLimit?: int,
 *     httpProtocolIpv6?: 'disabled'|'enabled',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceMetadataOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInstanceMetadataOptionsAsync(array{
 *     instanceName?: string,
 *     httpTokens?: 'optional'|'required',
 *     httpEndpoint?: 'disabled'|'enabled',
 *     httpPutResponseHopLimit?: int,
 *     httpProtocolIpv6?: 'disabled'|'enabled',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLoadBalancerAttribute(array $args = [])
 * @phpstan-method \Aws\Result updateLoadBalancerAttribute(array{
 *     loadBalancerName?: string,
 *     attributeName?: 'HealthCheckPath'|'HttpsRedirectionEnabled'|'SessionStickinessEnabled'|'SessionStickiness_LB_CookieDurationSeconds'|'TlsPolicyName',
 *     attributeValue?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLoadBalancerAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLoadBalancerAttributeAsync(array{
 *     loadBalancerName?: string,
 *     attributeName?: 'HealthCheckPath'|'HttpsRedirectionEnabled'|'SessionStickinessEnabled'|'SessionStickiness_LB_CookieDurationSeconds'|'TlsPolicyName',
 *     attributeValue?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRelationalDatabase(array $args = [])
 * @phpstan-method \Aws\Result updateRelationalDatabase(array{
 *     relationalDatabaseName?: string,
 *     masterUserPassword?: string,
 *     rotateMasterUserPassword?: bool,
 *     preferredBackupWindow?: string,
 *     preferredMaintenanceWindow?: string,
 *     enableBackupRetention?: bool,
 *     disableBackupRetention?: bool,
 *     publiclyAccessible?: bool,
 *     applyImmediately?: bool,
 *     caCertificateIdentifier?: string,
 *     relationalDatabaseBlueprintId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRelationalDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRelationalDatabaseAsync(array{
 *     relationalDatabaseName?: string,
 *     masterUserPassword?: string,
 *     rotateMasterUserPassword?: bool,
 *     preferredBackupWindow?: string,
 *     preferredMaintenanceWindow?: string,
 *     enableBackupRetention?: bool,
 *     disableBackupRetention?: bool,
 *     publiclyAccessible?: bool,
 *     applyImmediately?: bool,
 *     caCertificateIdentifier?: string,
 *     relationalDatabaseBlueprintId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRelationalDatabaseParameters(array $args = [])
 * @phpstan-method \Aws\Result updateRelationalDatabaseParameters(array{
 *     relationalDatabaseName?: string,
 *     parameters?: list<array{
 *         allowedValues?: string,
 *         applyMethod?: string,
 *         applyType?: string,
 *         dataType?: string,
 *         description?: string,
 *         isModifiable?: bool,
 *         parameterName?: string,
 *         parameterValue?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRelationalDatabaseParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRelationalDatabaseParametersAsync(array{
 *     relationalDatabaseName?: string,
 *     parameters?: list<array{
 *         allowedValues?: string,
 *         applyMethod?: string,
 *         applyType?: string,
 *         dataType?: string,
 *         description?: string,
 *         isModifiable?: bool,
 *         parameterName?: string,
 *         parameterValue?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class LightsailClient extends AwsClient {}
